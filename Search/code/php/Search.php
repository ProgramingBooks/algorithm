<?php
/**
 * 搜索算法实现
 * @author phachon@163.com
 */

class Search {

	public function __construct(){

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
}