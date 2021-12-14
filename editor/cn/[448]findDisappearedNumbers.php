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
        $res = [];
        for ($i = 0; $i < count($nums); $i++) {
            $nums[abs($nums[$i]) - 1] = -abs($nums[abs($nums[$i]) - 1]);
        }

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] > 0) $res[] = $i + 1;
        }

        return $res;
    }
}

$nums  = [4, 3, 2, 7, 8, 2, 3, 1];
$nums  = [1,1];
$class = new Solution();
var_dump($class->findDisappearedNumbers($nums));