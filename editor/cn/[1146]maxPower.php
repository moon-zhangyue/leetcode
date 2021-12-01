<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/1 9:42
 * Module: [1146]maxPower.php
 */
class Solution
{

    /**
     * @param String $s
     *
     * @return Integer
     */
    function maxPower($s)
    {
        $max  = 0;
        $left = '';
        $now  = 1;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s{$i} == $left) {
                $now++;
            } else {
                $left = $s{$i};
                $now  = 1;
            }
            $max = max($max, $now);
        }

        return $max;
    }
}

$s     = "tourist";
$s     = "triplepillooooow";
$s     = "hooraaaaaaaaaaay";
$class = new Solution();
var_dump($class->maxPower($s));