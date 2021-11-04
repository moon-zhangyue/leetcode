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
        $l = 0;
        $r = $num;

        while ($l <= $r) {
            $mid = floor(($l + $r) / 2);
            $s   = $mid * $mid;

            if ($s < $num) {
                $l = $mid + 1;
            } elseif ($s > $num) {
                $r = $mid - 1;
            } else {
                return true;
            }
        }
        return false;
    }
}

$class = new Solution();
var_dump($class->isPerfectSquare(17));