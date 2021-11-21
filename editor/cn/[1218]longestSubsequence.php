<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/5 10:04
 * Module: [1218]longestSubsequence.php
 */

class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer   $difference
     *
     * @return Integer
     */
    function longestSubsequence($arr, $difference)
    {
        $dp = [];

        for ($i = 0; $i < count($arr); $i++) {
            $diff = 0;

            if (isset($dp[$arr[$i] - $difference])) {
                $diff = $dp[$arr[$i] - $difference];
            }
            $dp[$arr[$i]] = $diff + 1;
        }

        return max($dp);
    }
}


$arr        = [1, 5, 7, 8, 5, 3, 4, 2, 1];
$difference = -2;
$class      = new Solution();
var_dump($class->longestSubsequence($arr, $difference));