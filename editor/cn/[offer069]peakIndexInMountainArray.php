<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/14 9:41
 * Module: [offer069]peakIndexInMountainArray.php
 */
class Solution
{

    /**
     * @param Integer[] $arr
     *
     * @return Integer
     */
    function peakIndexInMountainArray($arr)
    {
        $start = 0;
        $len   = count($arr);
        $end   = $len - 1;
        $res   = 0;
        while ($start < $end) {
            $mid = (int)(($end + $start) / 2);

            if ($arr[$mid] > $arr[$mid + 1]) {
                $res = $mid;
                $end = $mid;
            } else {
                $start = $mid + 1;
            }
        }
        return $res;
    }
}

$arr   = [18, 29, 38, 59, 98, 100, 99, 98, 90];
$class = new Solution();
var_dump($class->peakIndexInMountainArray($arr));