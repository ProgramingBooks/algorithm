<?php
/**
 * Sort Class Test
*/

include 'Sort.php';

function printArray($data) {
	echo implode(",", $data)."\r\n";
}

$data = [12, 8, 17, 889, 26, 28, 9, 37];

$sort = new Sort();
// 冒泡排序
printArray($sort->bubbling($data));
// 选择排序
printArray($sort->select($data));
// 直接插入排序
printArray($sort->insert($data));
// 快速排序
printArray($sort->quick($data));



