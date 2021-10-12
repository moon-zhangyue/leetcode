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
        $len1 = strlen($haystack);
        $len2 = strlen($needle);

        if ($len2 == 0) {
            return 0;
        }
        for ($i = 0; $i < $len1; $len1++) {
            if ($haystack{$i} == $needle{0}) {//查询第一次出现的位置 截取对应长度的字符 比较
                $strleng = substr($haystack, $i, $len2);

                if ($strleng === $needle) {
                    return $i;
                }
            }
        }
        return -1;
    }
}