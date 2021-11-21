<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/1 15:05
 * Module: [122]maxProfit.php
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
        $max = 0;
        for ($i = 0; $i < count($prices) - 1; $i++) {
            if ($prices[$i + 1] > $prices[$i]) {
                $max += ($prices[$i + 1] - $prices[$i]);
            }
        }
        return $max;
    }
}

$prices = [7, 1, 5, 3, 6, 4];
$class  = new Solution();
var_dump($class->maxProfit($prices));