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
        $last = array();
        $left = -1; //起始位置
        $ans  = 0;
//        for ($i = 0; $i < 128; $i++) {
//            $last[$i] = -1;
//        }
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $left         = max($left, $last[$s[$i]]);
            $last[$s[$i]] = $i;
            $ans          = max($ans, $i - $left);
        }
        return $ans;
    }
}

$s     = 'pwwkew';
$class = new Solution();
var_dump($class->lengthOfLongestSubstring($s));