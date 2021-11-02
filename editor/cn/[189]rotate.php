<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/2 10:23
 * Module: [189]rotate.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $k
     *
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $arr = [];
        $len = count($nums);
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($i + $k >= $len) {
                $arr[$i + $k - $len] = $nums[$i];
            } else {
                $arr[$i + $k] = $nums[$i];
            }
        }
        ksort($arr);
        return $arr;
    }
}

$nums  = [1, 2, 3, 4, 5, 6, 7];
$k     = 3;
$class = new Solution();
var_dump($class->rotate($nums, $k));