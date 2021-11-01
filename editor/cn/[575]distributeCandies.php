<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/1 13:22
 * Module: distributeCandies.php
 */
class Solution
{

    /**
     * @param Integer[] $candyType
     *
     * @return Integer
     */
    function distributeCandies($candyType)
    {
        $half = count($candyType) / 2;
        $kind = count(array_unique($candyType));
        return $half >= $kind ? $kind : $half;
    }
}

$candyType = [1, 1, 2, 2, 3, 3];
$candyType = [1, 1, 2, 3];
$class     = new Solution();
var_dump($class->distributeCandies($candyType));