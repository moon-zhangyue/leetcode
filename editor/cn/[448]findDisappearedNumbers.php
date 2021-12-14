<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/14 9:43
 * Module: [448]findDisappearedNumbers.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function findDisappearedNumbers($nums)
    {
        return array_diff(range(1, count($nums), 1), $nums);
    }
}

$nums  = [4, 3, 2, 7, 8, 2, 3, 1];
$class = new Solution();
var_dump($class->findDisappearedNumbers($nums));