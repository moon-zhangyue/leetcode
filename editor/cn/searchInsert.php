<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/17 17:37
 * Module: searchInsert.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $target
     *
     * @return Integer
     */
    function searchInsert(array $nums, int $target): int
    {
        $n = count($nums);
        if ($target < $nums[0]) return 0;
        if ($target > end($nums)) return $n;

        $l = 0;
        $r = $n - 1;
        while ($l < $r) {
            $mid = $l + floor(($r - $l) / 2);
            if ($nums[$mid] === $target) return $mid;
            // 当中间元素严格小于目标元素时，肯定不是解
            if ($nums[$mid] < $target) {
                // 下一轮搜索区间是 [mid+1, right]
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
        }

        return $l;
    }
}