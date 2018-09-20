<?php
/**
 * 短路求值问题
 * 题目：求1+2+3+...+n，要求不能使用乘除法、for、while、if、else、switch、case等关键字及条件判断语句。
 * 利用短路求值原理
 * （A?B:C）。
 */

/**
 * 利用短路求值原理解决
 * @param $n
 * @return int
 */
function solution($n) {
	$res = $n;
	($n > 1) && $res += solution($n-1);
	return $res;

}

// test
echo solution(10)."\r\n";