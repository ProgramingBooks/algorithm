<?php
/**
 * 构建乘积数组
 * 给定一个数组 A [0,1,...,n-1], 请构建一个数组 B[0,1,...,n-1],
 * 其中B中的元素B[i] = A[0]*A[1]*...*A[i-1]*A[i+1]*...*A[n-1]。
 * 不能使用除法。
 */


/**
 * 构建乘积数组
 * @param $numberArr
 * @return array
 */
function makeMultiplyArray($numberArr) {
	$res = [];
	for ($i = 0; $i < count($numberArr); $i++) {
		$tmp = $numberArr[$i];
		$numberArr[$i] = 1;
		$item = 1;
		for ($j = 0; $j < count($numberArr); $j++) {
			$item *= $numberArr[$j];
		}
		array_push($res, $item);
		$numberArr[$i] = $tmp;
	}
	return $res;
}

/**
 * 构建乘积数组2
 * @param $numberArr
 * @return array
 */
function makeMultiplyArray2($numberArr) {
	$res = [];
	for ($i = 0; $i < count($numberArr); $i++) {
		$item = 1;
		for ($j = 0; $j < $i; $j++) {
			$item *= $numberArr[$j];
		}
		for ($z = $i+1; $z < count($numberArr); $z++) {
			$item *= $numberArr[$z];
		}
		array_push($res, $item);
	}
	return $res;
}

// test
$arr = [1, 2, 3, 4, 5, 6, 7, 8];
$newArr = makeMultiplyArray($arr);
echo implode(",", $newArr)."\r\n";

$newArr = makeMultiplyArray2($arr);
echo implode(",", $newArr)."\r\n";