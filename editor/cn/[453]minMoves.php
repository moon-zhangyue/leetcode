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
        $c   = count($nums);
        $sum = array_sum($nums);
        return $sum - min($nums) * $c;
    }
}

$nums  = [1, 2, 3, 4];
$class = new Solution();
var_dump($class->minMoves($nums));