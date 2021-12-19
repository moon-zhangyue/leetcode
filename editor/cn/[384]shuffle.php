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
    private $original = [];

    /**
     * @param Integer[] $nums
     */
    function __construct($nums)
    {
        $this->nums     = $nums;
        $this->original = $nums;
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
        for ($i = 0; $i < count($this->original); $i++) {
            $j = mt_rand($i, count($this->original) - 1); //mt_rand比rand快

            $exp = $this->original[$i];

            $this->original[$i] = $this->original[$j];
            $this->original[$j] = $exp;
        }

        return $this->original;
    }
}

$nums = [1, 2, 3];

$obj   = new Solution($nums);
$ret_1 = $obj->reset();
$ret_2 = $obj->shuffle();
var_dump($ret_1);
var_dump($ret_2);