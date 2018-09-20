<?php
/**
 * 题目：输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。
 * https://www.cnblogs.com/Renyi-Fan/p/9054605.html
 */

/**
 * 利用位运算
 * @param int $n
 * @return int
 */
function oneNumber($n) {
	$count = 0;
	while ($n != 0) {
		$count++;
		$n = $n & ($n - 1);
	}
	return $count;
}

/**
 * PHP 中的整形是 32 位
 * @param  $n
 * @return int
 */
function oneNumber1($n) {
	$count = 0;
	for ($i = 0; $i < 32; $i++) {
		if (($n >> $i) & 1) {
			$count++;
		}
	}
	return $count;
}

// test
echo oneNumber(1674)."\r\n";
echo oneNumber1(1674)."\r\n";
