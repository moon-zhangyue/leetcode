<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/9/13 10:56
 * Module: [670]maximumSwap.php
 */

class Solution
{

    /**
     * @param Integer $num
     *
     * @return Integer
     */
    function maximumSwap($num)
    {
        $num = (string)$num;

        if ($num == 0) {
            return $num;
        }

        $length = strlen($num);
        for ($i = 0; $i < $length - 1; $i++) {
            $max = $num[$i];
            for ($j = $i + 1; $j <= $length - 1; $j++) {
                if ($max <= $num[$j]) {
                    $max = $num[$j];
                    $key = $j;
                }
            }
            if ($max != $num[$i]) {
                $num[$key] = $num[$i];
                $num[$i]   = $max;

                return $num;
            }
        }

        return $num;
    }
}

$num   = 98368;
$num   = 1993;
$class = new Solution();
var_dump($class->maximumSwap($num));