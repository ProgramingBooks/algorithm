<?php
/**
 * redis 分布式锁测试
 */

include 'DistributedLock.php';

$host = "127.0.0.1";
$port = 6379;

$redis = new Redis();
$redis->connect($host, $port);

$lock = new DistributedLock($redis);
$start = time();
for ($i = 0; $i < 100000; $i++) {
	if ($lock->lock("age")) {
		$age = $redis->get("age");
		$age = $age + 1;
		$redis->set("age", $age);
		echo $redis->get("age")."\r\n";
		$lock->unlock("age");
	}
//	usleep(1000);
}
$end = time();
echo "time:".($end-$start)."\r\n";

