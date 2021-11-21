<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/4 20:29
 * Module: isPerfectSquare.php
 */

class Solution
{

    /**
     * @param Integer $num
     *
     * @return Boolean
     */
    function isPerfectSquare($num)
    {
        $a = $num;
        while (true) {
            $b = floor(($a + $num / $a) / 2);
            if ($a - $b < 1e-6) {
                break;
            }
            $a = $b;
        }
        $sqr = $a;
        return $sqr * $sqr == $num;
    }
}

$class = new Solution();
var_dump($class->isPerfectSquare(17));