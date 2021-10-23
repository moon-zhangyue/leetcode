<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/12 14:55
 * Module: [26]removeDuplicates.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        //①
//        $nums = array_unique($nums);

        //②
        $len    = sizeof($nums);
        $k      = 0;
        $repeat = 0;
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] == $nums[$k] && $i != $k) {
                $repeat++;
            } else if ($nums[$i] != $nums[$k] && $repeat) {
                $nums[++$k] = $nums[$i];
                $repeat     = 1;
            } else if ($nums[$i] != $nums[$k] && !$repeat) {
                $k++;
            }
        }

        return $k + 1;

        //③
//        $len = sizeof($nums);
//        $k   = 0;
//        $val = $nums[0];
//        for ($i = 0; $i < $len; $i++) {
//            if ($val != $nums[$i]) {
//                $val = $nums[$i];//新的不重复的值
//                list($nums[$k + 1], $nums[$i]) = [$nums[$i], $nums[$k + 1]];//将该新出现值放在前面未重复的值的后一位
//                $k++;
//            }
//        }
//
//        return $k + 1;

        //④ 快慢指针
//        $numsLen = sizeof($nums);
//        $slow    = 0;//慢指针
//        $fast    = 1;//快指针
//        while ($fast < $numsLen) {
//            if ($nums[$slow] != $nums[$fast]) {
//                $nums[++$slow] = $nums[$fast];//移动慢指针，并且赋值
//            }
//            $fast++;//每一步都移动快指针
//        }
//
//        return $slow + 1;
    }
}

$nums  = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
$class = new Solution();
$class->removeDuplicates($nums);