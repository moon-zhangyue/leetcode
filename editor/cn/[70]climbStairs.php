<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/18 10:30
 * Module: [70]climbStairs.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function climbStairs($n)
    {
        $sqrt5 = sqrt(5);
        $fibn  = pow((1 + $sqrt5) / 2, $n + 1) - pow((1 - $sqrt5) / 2, $n + 1);
        return round($fibn / $sqrt5);
    }
}