<?php
/**
 * Search Class Test
 */

include 'Search.php';

$sort = new Search();

// 顺序查找
echo "Sequence: ";
$data = [11, 4, 17, 889, 26, 28, 3, 72];
echo $sort->sequence($data, 4)."|";
echo $sort->sequence($data, 10)."|";
echo $sort->sequence($data, 3)."|";
echo "\r\n";

// 二分查找
$data = [1, 4, 7, 9, 26, 28, 33, 72];
echo "Binary: ";
echo $sort->binary($data, 4)."|";
echo $sort->binary($data, 10)."|";
echo $sort->binary($data, 33)."|";
echo "\r\n";

// 插值查找
echo "Interpolation: ";
$data = [1, 4, 7, 9, 26, 28, 33, 72];
echo $sort->interpolation($data, 4)."|";
echo $sort->interpolation($data, 19)."|";
echo $sort->interpolation($data, 72)."|";
echo "\r\n";

// 斐波那契查找
echo "Fibonacci: ";
$data = [1, 4, 7, 9, 26, 28, 33, 72];
echo $sort->fibonacci($data, 33)."|";
echo $sort->fibonacci($data, 19)."|";
echo $sort->fibonacci($data, 72)."|";
echo "\r\n";