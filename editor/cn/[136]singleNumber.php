<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/30 20:18
 * Module: [136]singleNumber.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function singleNumber($nums)
    {
        //位运算
        for ($i = 0, $a = 0; $i < count($nums); $i++) {
            $a ^= $nums[$i];
        }
        return $a;
    }
}