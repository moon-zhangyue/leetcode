<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/22 15:07
 * Module: [384]shuffle.php
 */
class Solution
{
    private $nums = [];

    /**
     * @param Integer[] $nums
     */
    function __construct($nums)
    {
        $this->nums = $nums;
    }

    /**
     * @return Integer[]
     */
    function reset()
    {
        return $this->nums;
    }

    /**
     * @return Integer[]
     */
    function shuffle()
    {
        $arr = $this->nums;

        shuffle($arr);

        return $arr;
    }
}

$nums = [1, 2, 3];

$obj   = new Solution($nums);
$ret_1 = $obj->reset();
$ret_2 = $obj->shuffle();
var_dump($ret_1);
var_dump($ret_2);