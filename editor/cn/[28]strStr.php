<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/12 20:08
 * Module: strStr.php
 */

class Solution
{

    /**
     * @param String $haystack
     * @param String $needle
     *
     * @return Integer
     */
    function strStr($haystack, $needle)
    {
        if (strlen($needle) == 0) {
            return 0;
        }
        $res = strpos($haystack, $needle);
        if ($res === false) {
            $res = -1;
        }
        return $res;
    }
}