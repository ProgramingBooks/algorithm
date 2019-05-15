<?php
/**
 * 输入：abcdef,
 * abcdef -> defabc
 */

function leftShiftOne($str = '') {
    
    if ($str == '') {
        return "";
    }
    $len = strlen($str);
    $t = $str[0];
    for ($i = 1; $i < $len; $i++) {
        $str[$i - 1] = $str[$i];
        // echo $str."\r\n";
    }
    $str[$len - 1] = $t;

    return $str;
}

function moveStr($str = '', $n = 0) {

    while ($n--) {
        $str = leftShiftOne($str);
    }
    return $str;
}

$str = "abcdef";

echo moveStr($str, 0)."\r\n";
