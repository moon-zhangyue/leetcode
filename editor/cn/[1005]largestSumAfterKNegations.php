<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/3 8:50
 * Module: [1005]largestSumAfterKNegations.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $k
     *
     * @return Integer
     */
    function largestSumAfterKNegations($nums, $k)
    {
        //贪心
        $abs_min = 100;
        $sum     = 0;
        for ($i = 0; $i < count($nums); $i++) {
            // 计算绝对值最小的值
            $abs_min = min(abs($nums[$i]), $abs_min);
            // 所有数字的和
            $sum += $nums[$i];
        }

        sort($nums);

        // 根据k，翻转nums[i]，并更新sum
        for ($i = 0; $i < count($nums) && $k; $i++, $k--) {
            if ($nums[$i] >= 0) {
                break;
            }

            $sum += 2 * abs($nums[$i]);
        }

        // 若k有剩余，且为奇数，减去其在sum中的值
        if ($k > 0 && ($k % 2 == 1)) {
            $sum -= 2 * $abs_min;
        }

        return $sum;
    }
}

$nums  = [2, -3, -1, 5, -4];
$k     = 2;
$class = new Solution();
var_dump($class->largestSumAfterKNegations($nums, $k));