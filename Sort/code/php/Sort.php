<?php
/**
 * 排序算法实现
 * @author phachon@163.com
 */

class Sort {

	/**
	 * Sort constructor.
	 */
	public function __construct() {}

	/**
	 * 选择排序
	 * @param array $data
	 * @return array
	 */
	public function select($data = array()) {
		$count = count($data);
		for ($i = 0; $i < $count; $i++) {
			// 每次都假设第一个位置为最小的元素
			$min = $i;
			for ($j = $i + 1; $j < $count; $j ++) {
				if ($data[$j] < $data[$min]) {
					$min = $j;
				}
			}
			// 判断最小的数是否还是 $i, 否则交换位置
			if ($min != $i) {
				$tmp = $data[$i];
				$data[$i] = $data[$min];
				$data[$min] = $tmp;
 			}
		}
		return $data;
	}

	/**
	 * 冒泡排序
	 * @param array $data
	 * @return array
	 */
	public function bubbling($data = array()) {
		$count = count($data);
		for ($i = 0; $i < $count; $i++) {
			for($j = 0; $j < $count - $i - 1; $j++) {
				if ($data[$j] > $data[$j + 1]) {
					$tmp = $data[$j + 1];
					$data[$j + 1] = $data[$j];
					$data[$j] = $tmp;
				}
			}
		}
		return $data;
	}

	/**
	 * 直接插入排序
	 * @param array $data
	 * @return array
	 */
	public function insert($data = array()) {
		$count = count($data);
		for ($i = 1; $i < $count; $i++) {
			$insert = $data[$i];
			for ($j = $i - 1; $j >= 0; $j--) {
				if ($insert < $data[$j]) {
					$data[$j+1] = $data[$j];
				}else {
					break;
				}
			}
			$data[$j+1] = $insert;
		}
		return $data;
	}

	/**
	 * 快速排序
	 * @param array $data
	 * @return array
	 */
	public function quick($data = array()) {
		$count = count($data);
		if(count($data) <= 1) {
			return $data;
		}
		// 基准数
		$key = $data[0];
		$bigList = [];
		$smallList = [];

		// 以基准数为界限分隔
		for ($i = 1; $i < $count; $i++) {
			if ($data[$i] > $key) {
				array_push($bigList, $data[$i]);
			}else {
				array_push($smallList, $data[$i]);
			}
		}

		$bigList = $this->quick($bigList);
		$smallList = $this->quick($smallList);

		return array_merge($smallList, array($key), $bigList);

	}
}