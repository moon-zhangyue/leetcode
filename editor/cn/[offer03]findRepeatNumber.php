<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/13 13:50
 * Module: [offer03]findRepeatNumber.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function findRepeatNumber($nums)
    {
        $count = array_count_values($nums);
        foreach ($count as $k => $v) {
            if ($v > 1) {
                return $k;
            }
        }
        return 0;
    }
}

$exp   = [2, 3, 1, 0, 2, 5, 3];
$class = new Solution();
var_dump($class->findRepeatNumber($exp));