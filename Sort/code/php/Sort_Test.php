<?php
/**
 * Sort Class Test
*/

include 'Sort.php';
include 'LinkedNode.php';

function printArray($data) {
	echo implode(",", $data)."\r\n";
}

$data = [11, 4, 17, 889, 26, 28, 3, 72];

$sort = new Sort();

// 冒泡排序
printArray($sort->bubbling($data));

// 选择排序
printArray($sort->select($data));

// 直接插入排序
printArray($sort->insert($data));

// 二分插入排序
printArray($sort->binaryInsert($data));

// 快速排序
printArray($sort->quick($data));

// 归并排序
printArray($sort->merge($data));

// 希尔排序
printArray($sort->shell($data));

// 计数排序
printArray($sort->count($data));

// 桶排序
printArray($sort->bucket($data));

// 基数排序
printArray($sort->radix($data));


