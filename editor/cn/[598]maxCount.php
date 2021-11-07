<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/7 11:17
 * Module: [598]范围求和.php
 */

class Solution
{

    /**
     * @param Integer     $m
     * @param Integer     $n
     * @param Integer[][] $ops
     *
     * @return Integer
     */
    function maxCount($m, $n, $ops)
    {
        $x_min = $m;
        $y_min = $n;
        foreach ($ops as $v) {
            $x_min = $v[0] > $x_min ? $x_min : $v[0];
            $y_min = $v[1] > $y_min ? $y_min : $v[1];
        }
        return $x_min * $y_min;
    }
}

$m          = 26;
$n          = 17;
$operations = [[20, 10], [26, 11], [2, 11], [4, 16], [2, 3], [23, 13], [7, 15], [11, 11], [25, 13], [11, 13], [13, 11], [13, 16], [26, 17]];
$class      = new Solution();
var_dump($class->maxCount($m, $n, $operations));