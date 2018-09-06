<?php
/**
 * Search Class Test
*/

include 'Search.php';

$data = [11, 4, 17, 889, 26, 28, 3, 72];

$sort = new Search();

// 二分查找
echo $sort->binary($data, 4)."\r\n";
echo $sort->binary($data, 10)."\r\n";



