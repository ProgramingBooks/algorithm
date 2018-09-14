<?php
/**
 * 利用 Redis 实现分布式锁
 * @author: phachon@163.com
 */

class DistributedLock {

	/**
	 * 锁 key 前缀
	 * @var string
	 */
	private $_keyPrefix = "DistributedLock:";

	/**
	 * 锁抢占失败后，是否重试
	 * @var bool
	 */
	private $_isRetry = true;

	/**
	 * 重试间隔时间 us 微妙, 默认为 10 ms
	 * @var int
	 */
	private $_retrySleepTime = 10000;

	/**
	 * 重试最大次数, 0 表示一直重试
	 * @var int
	 */
	private $_retryMaxNumber = 0;

	/**
	 * 锁的过期时间, 单位 ms
	 * @var int
	 */
	private $_expiredTime = 10;

	/**
	 * redis 操作对象
	 * @var null
	 */
	private $_redisInstance = null;

	/**
	 * DistributedLock constructor.
	 * @param $redis
	 * @throws Exception
	 */
	public function __construct($redis) {
		if (!$redis) {
			throw new Exception("redis object is error");
		}
		$this->_redisInstance = $redis;
	}

	/**
	 * 设置 redis 对象
	 */
	public function setRedis() {

	}

	/**
	 * 设置锁的 key 前缀
	 */
	public function keyPrefix($prefix) {
		$this->_keyPrefix = $prefix ? $prefix : $this->_keyPrefix;
		return $this;
	}

	/**
	 * set retry
	 * @param $isRetry
	 * @param $sleepTime
	 * @param $maxNumber
	 * @return DistributedLock
	 */
	public function setRetry($isRetry, $sleepTime, $maxNumber = 0) {
		$this->_isRetry = $isRetry ? true : false;
		if ($this->_isRetry) {
			$this->_retrySleepTime = $sleepTime ? $sleepTime : $this->_retrySleepTime;
			$this->_retryMaxNumber = $maxNumber;
		}
		return $this;
	}

	/**
	 * 锁过期时间
	 * @param $expired
	 * @return DistributedLock
	 */
	public function expiredTime($expired) {
		$this->_expiredTime = $expired ? $expired : $this->_expiredTime;
		return $this;
	}

	/**
	 * 获取锁的 key 前缀
	 * @return string
	 */
	public function getKeyPrefix() {
		return $this->_keyPrefix;
	}

	/**
	 * 获取锁的 redis key
	 * @param $key
	 * @return string
	 */
	public function getRedisKey($key) {
		return $this->_keyPrefix.$key;
	}

	/**
	 * 获取锁的最大重试次数
	 */
	public function getRetryMaxNumber() {
		return $this->_retryMaxNumber;
	}

	/**
	 * get lock
	 * @param $key
	 * @return bool
	 */
	public function lock($key) {
		$lockKey = $this->getRedisKey($key);

		$retryNumber = 0;
		while (true) {
			$nowTime = $this->_microTime();

			// check setnx
			$ok = $this->_redisInstance->setnx($lockKey, $nowTime + $this->_expiredTime);
			if ($ok) {
				return true;
			}

			// check value
			$currentTime = $this->_redisInstance->get($lockKey);
			if ($currentTime < $nowTime) {
				$oldTime = $this->_redisInstance->getset($lockKey, $nowTime + $this->_expiredTime);
				if ($oldTime == $nowTime) {
					return true;
				}
			}

			// is retry
			if ($this->_isRetry && ($retryNumber < $this->_retryMaxNumber || $this->_retryMaxNumber == 0)) {
				$retryNumber++;
				usleep($this->_retrySleepTime);
			}else {
				break;
			}
		}
		return false;
	}

	/**
	 * unlock
	 * @param $key
	 */
	public function unlock($key) {
		$lockKey = $this->getRedisKey($key);
		if ($this->_redisInstance->ttl($lockKey)) {
			//del key
			method_exists($this->_redisInstance, 'del') ? $this->_redisInstance->del($lockKey) : $this->_redisInstance->delete($lockKey);
		}
	}

	/**
	 * 获取毫秒时间戳
	 */
	public function _microTime() {
		list ($s1, $s2) = explode(' ', microtime());
		$currentTime = (float) sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
		return $currentTime;
	}
}