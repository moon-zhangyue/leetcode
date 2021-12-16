<?php
//给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有和为 0 且不重
//复的三元组。 
//
// 注意：答案中不可以包含重复的三元组。 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [-1,0,1,2,-1,-4]
//输出：[[-1,-1,2],[-1,0,1]]
// 
//
// 示例 2： 
//
// 
//输入：nums = []
//输出：[]
// 
//
// 示例 3： 
//
// 
//输入：nums = [0]
//输出：[]
// 
//
// 
//
// 提示： 
//
// 
// 0 <= nums.length <= 3000 
// -10⁵ <= nums[i] <= 10⁵ 
// 
// Related Topics 数组 双指针 排序 👍 4092 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

class Solution
{
    //php执行时间较长
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
            $low  = $start;
            $high = $len - 1;

            while ($low < $high) {
                $sum   = $nums[$low] + $nums[$high];
                $left  = $nums[$low];
                $right = $nums[$high];
                if ($sum < $target) {
                    while ($low < $high && $nums[$low] == $left) $low++;
                } else if ($sum > $target) {
                    while ($low < $high && $nums[$high] == $right) $high--;
                } else {
                    array_push($res, [$low => $left, $high => $right]); //$left和$right的key肯定不同
                    while ($low < $high && $nums[$low] == $left) $low++;
                    while ($low < $high && $nums[$high] == $right) $high--;
                }
            }
        } else {
            //n>2,递归计算(n-1)Sum的结果
            //n > 2 时，递归计算 (n-1)Sum 的结果
            for ($i = $start; $i < $len; $i++) {
                $sub = $this->nSumTarget($nums, $n - 1, $i + 1, $target - $nums[$i]);
                foreach ($sub as $arr) {
                    // (n-1)Sum 加上 $nums[i] 就是 nSum
                    if (!array_key_exists($i, $arr)) {
                        $arr += [$i => $nums[$i]];
                        sort($arr); //一维数组排序完全相同,方便去重
                        array_push($res, $arr);
                        $res = array_unique($res, SORT_REGULAR); //去重
                    }
                }
                while ($i < $len - 1 && $nums[$i] == $nums[$i + 1]) $i++;
            }
        }
        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
