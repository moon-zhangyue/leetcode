<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/13 上午11:58
 * Module: [567]checkInclusion.php
 * Please No Garbage Code!
 */
class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     *
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $needs  = str_split($s1);
        $needs  = array_count_values($needs);//初始化need窗口
        $window = [];
        foreach (array_keys($needs) as $k => $v) {//初始化window窗口
            $window[$v] = 0;
        }

        $left  = 0;//滑动左指针
        $right = 0;//滑动右指针
        $valid = 0;
        $s2Len = strlen($s2);
        while ($right < $s2Len) {
            $c = $s2[$right];
            $right++;//移动右指针
            if (isset($needs[$c])) {
                $window[$c]++;
                if ($needs[$c] == $window[$c]) {
                    $valid++;
                }
            }
            if (($right - $left) >= strlen($s1)) {//需要滑动窗口
                if ($valid == sizeof($needs)) {//找到答案
                    return true;
                }
                $d = $s2[$left];
                $left++;//移动左指针
                if (isset($needs[$d])) {
                    if ($needs[$d] == $window[$d]) {
                        $valid--;
                    }
                    $window[$d]--;
                }
            }

        }
        return false;
    }
}

$s1    = "ab";
$s2    = "eidbaooo";
$class = new Solution();
var_dump($class->checkInclusion($s1, $s2));