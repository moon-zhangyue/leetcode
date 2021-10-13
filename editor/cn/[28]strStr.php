<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/12 16:56
 * Module: [28]strStr.php
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
        $n = strlen($haystack);
        $m = strlen($needle);

        if ($m == 0) {
            return 0;
        }

        parse_str($needle, $pi);
        $j = 0;
        for ($i = 0; $i < $m; $i++) {
            while ($j > 0 && $needle{$i} !== $needle{$j}) {
                $j = $pi[$j - 1];
            }
            if ($needle{$i} == $needle{$j}) {
                $j++;
            }
            $pi[$i] = $j;
        }
        $j = 0;
        for ($i = 0; $i < $n; $i++) {
            while ($j > 0 && $haystack{$i} != $needle{$j}) {
                $j = $pi[$j - 1];
            }
            if ($haystack[$i] == $needle[$j]) {
                $j++;
            }
            if ($j === $m) {
                return $i - $m + 1;
            }
        }
        return -1;
    }
}
set_time_limit(0);
$haystack = 'mississippi';
$needle   = 'issip';
$class    = new Solution();
var_dump($class->strStr($haystack, $needle));