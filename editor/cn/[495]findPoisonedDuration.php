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
        $time = 0;

        for ($i = 0; $i < count($timeSeries); $i++) {
            if ($i == 0) {
                $time = $duration;
            } elseif ($timeSeries[$i] - $timeSeries[$i - 1] >= $duration) { //上次中毒已结束
                $time += $duration;
            } else { //上次中毒未结束
                $time += ($timeSeries[$i] - $timeSeries[$i - 1]);
            }
        }

        return $time;
    }
}

$timeSeries = [1, 3, 4, 6];
$duration   = 2;
$class      = new Solution();
var_dump($class->findPoisonedDuration($timeSeries, $duration));