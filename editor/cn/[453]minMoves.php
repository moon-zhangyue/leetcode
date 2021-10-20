<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/20 8:53
 * Module: [453]minMoves.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function minMoves($nums)
    {
        sort($nums);
        $min = $nums[0];

        $res = 0;
        for ($i = 1; $i < count($nums); $i++) {
            $res += $nums[$i] - $min;
        }

        return $res;
    }
}

$nums  = [1, 2, 3, 4];
$class = new Solution();
var_dump($class->minMoves($nums));