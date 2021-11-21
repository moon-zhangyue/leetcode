<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/12 15:23
 * Module: [557]reverseWords.php
 */

class Solution
{
    /**
     * @param String $s
     *
     * @return String
     */
    function reverseWords($s)
    {
        $arr = explode(' ',$s);

        foreach ($arr as $k => &$v) {
            $v = strrev($v);
        }

        return implode(' ', $arr);
    }
}

$s     = "Let's take LeetCode contest";
$class = new Solution();
var_dump($class->reverseWords($s));