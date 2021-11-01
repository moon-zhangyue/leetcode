<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/1 15:06
 * Module: [121]maxProfit.php
 */
class Solution
{

    /**
     * @param Integer[] $prices
     *
     * @return Integer
     */
    function maxProfit($prices)
    {
        $min = $prices[0];
        $max = 0;
        foreach ($prices as $k => $v) {
            $min = $min > $v ? $v : $min;
            $max = $v - $min > $max ? $v - $min : $max;
        }

        return $max;
    }
}

$prices = [7, 1, 5, 3, 6, 4];
//$prices = [7, 6, 4, 3, 1];
//$prices = [1, 2];
$class = new Solution();
var_dump($class->maxProfit($prices));