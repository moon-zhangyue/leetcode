<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/29 15:14
 * Module: [335]isSelfCrossing.php
 */
class Solution
{

    /**
     * @param Integer[] $distance
     *
     * @return Boolean
     */
    function isSelfCrossing($distance)
    {
        $len = count($distance);

        if ($len < 4) {
            return false;
        }

        for ($i = 3; $i < $len; $i++) {
            if ($distance[$i] >= $distance[$i - 2] && $distance[$i - 1] <= $distance[$i - 3]) {
                return true;
            }

            if ($distance[$i - 1] <= $distance[$i - 3] && $distance[$i - 2] <= $distance[$i]) {
                return true;
            }
            if ($i > 3 && $distance[$i - 1] == $distance[$i - 3] && $distance[$i] + $distance[$i - 4] ==
                $distance[$i - 2]) {
                return true;
            }
            if ($i > 4 && $distance[$i] + $distance[$i - 4] >= $distance[$i - 2] && $distance[$i - 1] >= $distance[$i
                - 3] - $distance[$i - 5] && $distance[$i - 1] <= $distance[$i - 3] && $distance[$i - 2] >=
                $distance[$i - 4] &&
                $distance[$i - 3] >= $distance[$i - 5]) {
                return true;
            }

        }
        return false;
    }
}

$distance = [2, 1, 1, 2];
$distance = [1, 2, 3, 4];
$distance = [1, 1, 1, 1];
$class    = new Solution();
var_dump($class->isSelfCrossing($distance));