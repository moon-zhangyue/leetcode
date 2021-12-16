<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/16 9:32
 * Module: [15]threeSum.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        if (empty($nums)) return $nums;
        if (count($nums) === 1 && $nums[0] === 0) return [];

        sort($nums);

        // n 为 3，从 nums[0] 开始计算和为 0 的三元组
        return $this->nSumTarget($nums, 3, 0, 0);
    }

    /* 注意：调用这个函数之前一定要先给 nums 排序 */
    // n 填写想求的是几数之和，start 从哪个索引开始计算（一般填 0），target 填想凑出的目标和
    function nSumTarget(array $nums, int $n, int $start, int $target): array
    {
        $len = count($nums);
        $res = [];
        // 至少是 2Sum，且数组大小不应该小于 n
        if ($n < 2 || $len < $n) return $res;
        // 2Sum 是 base case
        if ($n === 2) {
            //双指针
            $low  = $nums[0];
            $high = $nums[$len - 1];

            while ($low < $high) {
                $sum   = $nums[$low] + $nums[$high];
                $left  = $nums[$low];
                $right = $nums[$high];
                if ($sum < $target) {
                    while ($low < $high && $nums[$low] == $left) $low++;
                } else if ($sum > $target) {
                    while ($low < $high && $nums[$high] == $right) $high--;
                } else {
                    array_push($res, [$left, $right]);
                    while ($low < $high && $nums[$low] == $left) $low++;
                    while ($low < $high && $nums[$high] == $right) $high--;
                }
            }
        } else {
            //n>2,递归计算(n-1)Sum的结果
            // n > 2 时，递归计算 (n-1)Sum 的结果
            for ($i = $start; $i < $len; $i++) {
                $sub = $this->nSumTarget($nums, $n - 1, $i + 1, $target - $nums[$i]);
                foreach ($sub as $arr) {
                    // (n-1)Sum 加上 $nums[i] 就是 nSum
                    array_push($arr, $nums[$i]);
                    array_push($res, $arr);
                }
                while ($i < $len - 1 && $nums[$i] == $nums[$i + 1]) $i++;
            }
        }
        return $res;
    }
}

$nums  = [-1, 0, 1, 2, -1, -4];
$class = new Solution();
var_dump($class->threeSum($nums));