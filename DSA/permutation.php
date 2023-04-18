<?php
function permute(string &$str, int $left, int $right) {
    if ($left == $right) {
        echo $str . PHP_EOL;
    } else {
        for ($i = $left; $i <= $right; $i++) {
            swap($str, $left, $i);
            permute($str, $left + 1, $right);
            swap($str, $left, $i);
        }
    }
}
// Write a swap function


function swap(string &$str, int $left, int $right)
{
    $temp = $str[$left];
    $str[$left] = $str[$right];
    $str[$right] = $temp;
}

$str = 'ABC';
permute($str, 0, strlen($str) - 1);