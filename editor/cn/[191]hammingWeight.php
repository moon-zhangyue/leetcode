<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/28 11:00
 * Module: [191]hammingWeight.php
 */

class Solution
{
    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function hammingWeight($n)
    {
        $bStr = decbin($n);
        $arr  = str_split($bStr);
        $r    = array_count_values($arr);
        return isset($r[1]) ? $r[1] : 0;
    }
}