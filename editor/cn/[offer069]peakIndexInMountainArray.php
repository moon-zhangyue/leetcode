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
        $arrs = $arr;
        sort($arr);
        $len = count($arr);
        return array_search($arr[$len - 1], $arrs);
    }
}