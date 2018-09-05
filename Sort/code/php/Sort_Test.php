<?php
/**
 * Sort Class Test
*/

include 'Sort.php';
include 'LinkedNode.php';

function arrayToStr($data) {
	return implode(",", $data);
}

$data = [11, 4, 17, 889, 26, 28, 3, 72];

$sort = new Sort();

// 冒泡排序
echo "Bubbling sort: ".arrayToStr($sort->bubbling($data))."\r\n";

// 选择排序
echo "Select sort: ".arrayToStr($sort->select($data))."\r\n";

// 直接插入排序
echo "Insert sort: ".arrayToStr($sort->insert($data))."\r\n";

// 二分插入排序
echo "BinaryInsert sort: ".arrayToStr($sort->binaryInsert($data))."\r\n";

// 快速排序
echo "Quick sort: ".arrayToStr($sort->quick($data))."\r\n";

// 归并排序
echo "Merge sort: ".arrayToStr($sort->merge($data))."\r\n";

// 希尔排序
echo "Shell sort: ".arrayToStr($sort->shell($data))."\r\n";

// 计数排序
echo "Count sort: ".arrayToStr($sort->count($data))."\r\n";

// 桶排序
echo "Bucket sort: ".arrayToStr($sort->bucket($data))."\r\n";

// 基数排序
echo "Radix sort: ".arrayToStr($sort->radix($data))."\r\n";


