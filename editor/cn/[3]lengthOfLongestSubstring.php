<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/14 14:20
 * Module: [3]lengthOfLongestSubstring.php
 */
class Solution
{

    /**
     * @param String $s
     *
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $n = strlen($s);
        if ($n <= 1) {
            return $n;
        }

        $left = 0;
        $hash = [];
        $max  = 0;

        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];

            if (isset($hash[$char])) {
                $left = max($left, $hash[$char] + 1);
            }

            // 提前结束遍历
            if ($left + $max >= $n) break;

            $hash[$char] = $i;

            $max = max($max, $i - $left + 1);
        }

        return $max;
    }
}

$s     = 'pwwkew';
$class = new Solution();
var_dump($class->lengthOfLongestSubstring($s));