<?php
/**
 * 位运算：不用加减乘除号实现加减乘除方法
 * https://blog.csdn.net/YPJMFC/article/details/78246971
 */

/**
 * 题目：写一个函数，求两个整数之和，要求在函数体内不得使用+、-、*、/ 四则运算符号。
 * @param $n1
 * @param $n2
 * @return int
 */
function operation_add($n1, $n2) {
	if ($n2 == 0) {
		return $n1;
	}
	$tmp1 = $n1 ^ $n2;
	$tmp2 = ($n1 & $n2) << 1;
	return operation_add($tmp1, $tmp2);
}

/**
 * 减法
 * @param $n1
 * @param $n2
 * @return int
 */
function operation_subs($n1, $n2) {

	// 先求补码：按位取反再加一
	$tmp = operation_add(~$n2, 1);
	return operation_add($n1, $tmp);
}

/**
 * 乘法
 * @param $n1
 * @param $n2
 * @return int
 */
function operation_multiply($n1, $n2) {

	// n1 的绝对值
	$n1Tmp = $n1 > 0 ? $n1 : operation_add(~$n1, 1);
	$n2Tmp = $n2 > 0 ? $n2 : operation_add(~$n2, 1);

	$res = 0;
	$count = 0;
	while ($count < $n1Tmp) {
		$res = operation_add($res, $n2Tmp);
		$count = operation_add($count, 1);
	}
	if (($n1 ^ $n2) < 0) {
		$res = operation_add(~$res, 1);
	}

	return $res;
}

/**
 * 乘法2
 * @param $n1
 * @param $n2
 * @return int
 */
function operation_multiply2($n1, $n2) {

	// n1 的绝对值
	$n1Tmp = $n1 > 0 ? $n1 : operation_add(~$n1, 1);
	$n2Tmp = $n2 > 0 ? $n2 : operation_add(~$n2, 1);

	$res = 0;
	while ($n2Tmp > 0) {
		// 获取每一位
		if (($n2Tmp & 0x1) > 0) {
			$res = operation_add($res, $n1Tmp);
		}

		$n2Tmp = $n2Tmp >> 1;
		$n1Tmp = $n1Tmp << 1;
	}
	// 判断符号
	if (($n1 ^ $n2) < 0) {
		$res = operation_add(~$res, 1);
	}

	return $res;
}

/**
 * 除法取商
 * @param $n1
 * @param $n2
 * @return int
 */
function operation_divide($n1, $n2) {

	// 取绝对值
	$n1Tmp = ($n1 > 0) ? $n1 : operation_add(~$n1, 1);
	$n2Tmp = ($n2 > 0) ? $n2 : operation_add(~$n2, 1);

	$q = 0; // 商
	while ($n1Tmp >= $n2Tmp) {
		$q = operation_add($q, 1);
		$n1Tmp = operation_subs($n1Tmp, $n2Tmp);
	}

	// 商的符号
	if (($n1 ^ $n2) < 0) {
		$q = operation_add(~$q, 1);
	}
	return $q;
}

/**
 * 取余
 * @param $n1
 * @param $n2
 * @return int
 */
function operation_residual($n1, $n2) {

	$n1Tmp = ($n1 > 0) ? $n1 : operation_add(~$n1, 1);
	$n2Tmp = ($n2 > 0) ? $n2 : operation_add(~$n2, 1);

	while ($n1Tmp >= $n2Tmp) {
		$n1Tmp = operation_subs($n1Tmp, $n2Tmp);
	}

	// 判断余数的符号
	$s = ($n2 > 0) ? $n1Tmp : operation_subs(~$n1Tmp, 1);
	return $s;
}

// test
echo "110 + 18 = ".operation_add(110, 18)."\r\n";
echo "110 - 18 = ".operation_subs(110, 18)."\r\n";
echo "110 * 18 = ".operation_multiply(110, 18)."\r\n";
echo "110 * 18 = ".operation_multiply2(110, 18)."\r\n";
echo "110 / 18 = ".operation_divide(110, 18)."\r\n";
echo "110 % 18 = ".operation_residual(110, 18)."\r\n";