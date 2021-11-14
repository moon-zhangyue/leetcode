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
        $needs  = str_split($s1);//字符串切片成数组
        $needs  = array_count_values($needs);//初始化need窗口  统计值的次数
        $window = [];
        foreach (array_keys($needs) as $v) {//初始化window窗口--返回键
            $window[$v] = 0;
        }

        $left  = 0;//滑动左指针
        $right = 0;//滑动右指针
        $valid = 0;
        $s2Len = strlen($s2);
        while ($right < $s2Len) {
            $c = $s2[$right];
            $right++;//移动右指针

            if (isset($needs[$c])) {//当前字母是否在子串中存在
                $window[$c]++;
                if ($needs[$c] == $window[$c]) {
                    $valid++; //目标字母连续出现个数
                }
            }
            if (($right - $left) >= strlen($s1)) {//需要滑动窗口,重新开始
                if ($valid == sizeof($needs)) {//找到答案
                    return true;
                }
                $d = $s2[$left];
                $left++;//向右移动左指针

                if (isset($needs[$d])) {
                    if ($needs[$d] == $window[$d]) { //该值存在子串中,但是左右指针超出子串长度
                        $valid--; //目标字母连续出现个数 -1
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