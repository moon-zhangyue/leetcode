<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/10/20 14:37
 * Module: [441]arrangeCoins.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function arrangeCoins($n)
    {
        $left  = 1;
        $right = $n;
        while ($left < $right) {
            $mid = floor(($right - $left + 1) / 2) + $left;
            if ($mid * ($mid + 1) <= 2 * $n) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }
        return $left;

        /*if ($n == 1) return 1;
        for ($i = 1; $i <= $n; $i++) {
            $sum = (1 + $i) * $i / 2;
            if ($sum > $n) return $i - 1;
        }
        return false;*/
    }
}

$n     = 8;
$calss = new Solution;
var_dump($calss->arrangeCoins($n));