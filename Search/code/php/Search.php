<?php
/**
 * 搜索算法实现
 * @author phachon@163.com
 */

class Search {

	public function __construct(){

	}

	/**
	 * 顺序查找
	 * @param array $data
	 * @param $key
	 * @return int
	 */
	public function sequence(array $data, $key) {
		$count = count($data);
		for ($i = 0; $i < $count; $i++) {
			if ($data[$i] == $key) {
				return $i;
			}
		}
		return -1;
	}

	/**
	 * 二分查找
	 * @param array $data 待查找的数组
	 * @param int $key 查找的数据
	 * @return float|int
	 */
	public function binary(array $data, $key) {
		$start = 0;
		$end = count($data) - 1;

		while ($start < $end) {
			$middle = floor(($start + $end) / 2);
			if ($key > $data[$middle]) {
				$start = $middle + 1;
			}else if ($key < $data[$middle]) {
				$end = $middle - 1;
			}else {
				return $middle;
			}
		}
		return -1;
	}

	/**
	 * 插值查找
	 * @param array $data
	 * @param $key
	 * @return float|int
	 */
	public function interpolation(array $data, $key) {
		$start = 0;
		$end = count($data) - 1;

		while ($start < $end) {
			$middle =  $start + ($end - $start) * intval(($key - $data[$start]) / ($data[$end] - $data[$start]));
			if ($key > $data[$middle]) {
				$start = $middle + 1;
			}else if ($key < $data[$middle]) {
				$end = $middle - 1;
			}else {
				return $middle;
			}
		}
		return -1;
	}

	/**
	 * 斐波那契查找
	 * @param array $data
	 * @param $key
	 * @return int|mixed
	 */
	public function fibonacci(array $data, $key) {
		$start = 0;
		$count = count($data);
		$end = $count - 1;

		// 构建斐波那契数组
		$fibo = [1, 1];
		for ($i = 2; $i < 20; $i++) {
			$fibo[$i] = $fibo[$i - 1]+$fibo[$i - 2];
		}

		// 查找 count 最接近的斐波那契数的位置
		for ($k = 0; $k < count($fibo); $k++) {
			if ($fibo[$k] > $count) {
				break;
			}
		}

		// 扩充数据, fibo[key] - 1 的长度
		for ($i = $count; $i < $fibo[$k] - 1; $i++) {
			$data[$i] = $data[$end];
		}

		// 比较数据
		while ($start <= $end) {
			$middle = $start + $fibo[$k - 1] - 1;
			if ($key > $data[$middle]) {
				$start = $middle + 1;
				$k -= 2;
			}else if($key < $data[$middle]) {
				$end = $middle - 1;
				$k -= 1;
			}else {
				if ($middle < $count) {
					return $middle;
				}else {
					return $count - 1;
				}
			}
		}

		return -1;
	}
}