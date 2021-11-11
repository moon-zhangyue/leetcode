<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/11 8:50
 * Module: [704]search.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $target
     *
     * @return Integer
     */
    function search(array $nums, int $target)
    {
        $start = 0;
        $end   = count($nums);

        $mid = floor(($start + $end) / 2);

        for ($i = $start; $i < $end; $i++) {
            if ($nums[$i] > $target) {
                $end = $mid --;
            } elseif ($nums[$i] < $target) {
                $start = $mid ++;
            } else {
                return $i;
            }
        }
        return -1;
    }
}

$target = 14;
$nums   = [1, 2, 3, 5, 7, 8, 9, 11, 13, 14, 16, 23, 32, 42];

$class = new Solution();
var_dump($class->search($nums, $target));