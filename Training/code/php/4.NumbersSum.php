<?php
/**
 * 求和为 s 的两个数字
 * 题目：输入一个递增排序的数组和一个数字 s，在数组中查找两个数，使得他们的和正好是S，
 * 如果有多对数字的和等于 s ，输出两个数的乘积最小的。
 */

/**
 * code
 * @param $array
 * @param $s
 * @return array
 */
function findNumbersWithSum($array, $s) {

	$map = [];
	foreach ($array as $value) {
		$map[$value] = $s - $value;
	}
	// 查找是否存在, 查找最小的
	$min = 0;
	$res = [];
	foreach ($map as $key => $value) {
		if (isset($map[$value])) {
			// 存在
			if (count($res) == 0) {
				$min = $value * $key;
				$res = [$value, $key];
			}else {
				if (($value * $key) <= $min) {
					$res = [$value, $key];
					$min = $value * $key;
				}
			}
		}
	}
	return $res;
}

// test
$arr = [1,2,3,4,5,6,7,8,9,10];
$res = findNumbersWithSum($arr, 10);
echo implode(",", $res)."\r\n";