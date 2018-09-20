<?php
/**
 * 题目：在一个字符串(1 <= 字符串长度 <= 10000，全部由字母组成) 中找到第一个只出现一次的字符, 并返回它的位置
 * @author phachon
 */

/**
 * code
 * @param $str
 * @return int|mixed
 */
function findStrOnce($str) {
	if (strlen($str) == 0) {
		return -1;
	}
	$position = [];
	$number = [];

	for ($i = 0; $i < strlen($str); $i++) {
		if (isset($number[$str[$i]])) {
			$number[$str[$i]] ++;
		}else {
			$number[$str[$i]] = 1;
			$position[$str[$i]] = $i;
		}
	}
	foreach ($number as $key => $value) {
		if ($value == 1) {
			return $position[$key];
		}
	}
	return -1;
}

// test
$str = "qwertyuiopsdfghjkwertyuisdfghjkwertyucvb";
echo findStrOnce($str)."\r\n";