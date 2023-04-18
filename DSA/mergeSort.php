<?php

//function merge($left, $right)
//{
//    $result = [];
//    while (count($left) > 0 && count($right) > 0) {
//        if ($left[0] <= $right[0]) {
//            $result[] = array_shift($left);
//        } else {
//            $result[] = array_shift($right);
//        }
//    }
//    while (count($left) > 0) {
//        $result[] = array_shift($left);
//    }
//    while (count($right) > 0) {
//        $result[] = array_shift($right);
//    }
//    return $result;
//}
//function mergeSorting($arr)
//{
//    if (count($arr) == 1) {
//        return $arr;
//    }
//    $mid = count($arr) / 2;
//    $left = array_slice($arr, 0, $mid);
//    $right = array_slice($arr, $mid);
//    $left = mergeSorting($left);
//    $right = mergeSorting($right);
//    return merge($left, $right);
//}
function merge1(&$arr, $left, $mid, $right) : array {

    $leftArr = [];
    $rightArr = [];
    $n1 = $mid - $left + 1;
    $n2 = $right - $mid;
    for ($i = 0; $i < $n1; $i++) {
        $leftArr[] = $arr[$left + $i];
    }
    for ($i = 0; $i < $n2; $i++) {
        $rightArr[] = $arr[$mid + 1 + $i];
    }
    $i = 0;
    $j = 0;
    $k = $left;
    while ($i < $n1 && $j < $n2) {
        if ($leftArr[$i] <= $rightArr[$j]) {
            $arr[$k++] = $leftArr[$i++];
        } else {
            $arr[$k++] = $rightArr[$j++];
        }
    }
    while ($i < $n1) {
        $arr[$k++] = $leftArr[$i++];
    }
    while ($j < $n2) {
        $arr[$k++] = $rightArr[$j++];
    }
    unset($leftArr);
    unset($rightArr);
    return $arr;
}
function mergeSort(&$arr, $left, $right) : array
{
    if ($left >= $right) {
        return $arr;
    }
    $mid = $left + (int)(($right - $left)/2);
    mergeSort($arr, $left, $mid);
    mergeSort($arr, $mid+1, $right);
    return merge1($arr, $left, $mid, $right);
}

$arr = [30, 22, 55, 2, 39, 40];
$arr = mergeSort($arr, 0, count($arr) - 1);
//$arr = mergeSorting($arr);
echo implode(', ', $arr);
// Path: DSA\mergeSort.php