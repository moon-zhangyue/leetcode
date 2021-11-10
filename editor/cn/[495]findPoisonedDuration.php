<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/10 17:29
 * Module: [495]findPoisonedDuration.php
 */

class Solution
{

    /**
     * @param Integer[] $timeSeries
     * @param Integer   $duration
     *
     * @return Integer
     */
    function findPoisonedDuration($timeSeries, $duration)
    {
        if ($duration == 0) {
            return 0;
        }
        $arr = [];
        foreach ($timeSeries as $k => $v) {
            $new_arr = range($v, $v + $duration - 1);

            $arr = array_merge($arr, $new_arr);
        }

        return count(array_flip($arr));
    }
}

$timeSeries = [1, 3, 4, 6];
$duration   = 2;
$class      = new Solution();
var_dump($class->findPoisonedDuration($timeSeries, $duration));