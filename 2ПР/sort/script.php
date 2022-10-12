<?php

function selectionSort($arr)
{
    $len = count($arr);
    $newarr = [];
    for ($i = 0; $i < $len; $i++) {
        $val = max($arr);
        array_unshift($newarr, $val);
        unset($arr[array_search($val, $arr)]);
    }
    return $newarr;
}
