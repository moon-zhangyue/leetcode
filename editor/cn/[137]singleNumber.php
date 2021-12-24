<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/24 8:53
 * Module: [137]singleNumber.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function singleNumber($nums)
    {
        $ones = 0;
        $twos = 0;
        foreach ($nums as $num) {
            $ones = $ones ^ $num & ~$twos;
            $twos = $twos ^ $num & ~$ones;
        }
        return $ones;
    }
}

$nums  = [0, 1, 0, 1, 0, 1, 99];
$class = new Solution();
var_dump($class->singleNumber($nums));