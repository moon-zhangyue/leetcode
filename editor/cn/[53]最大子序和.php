<?php
//给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [-2,1,-3,4,-1,2,1,-5,4]
//输出：6
//解释：连续子数组 [4,-1,2,1] 的和最大，为 6 。
// 
//
// 示例 2： 
//
// 
//输入：nums = [1]
//输出：1
// 
//
// 示例 3： 
//
// 
//输入：nums = [0]
//输出：0
// 
//
// 示例 4： 
//
// 
//输入：nums = [-1]
//输出：-1
// 
//
// 示例 5： 
//
// 
//输入：nums = [-100000]
//输出：-100000
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 10⁵ 
// -10⁴ <= nums[i] <= 10⁴ 
// 
//
// 
//
// 进阶：如果你已经实现复杂度为 O(n) 的解法，尝试使用更为精妙的 分治法 求解。 
// Related Topics 数组 分治 动态规划 👍 3849 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function maxSubArray($nums)
    {
        //贪心算法
        $maxNum = $nums[0];                             // 最大和先记为数组第一个数；
        $tmp    = $nums[0];                                // 子串序列和，从第一个数开始；

        foreach ($nums as $k => $v) {
            if ($k === 0) {                               // 因为数组第一个数已经取出，所以跳过；
                continue;
            }

            if ($tmp > 0) {                               // 如果（子串序列和）大于0，说明此时子串序列可以继续往后加；
                $tmp = $tmp + $v;                       // 子串继续 + 下个数
            } else {
                $tmp = $v;                              // 如果（子串序列和）小于0，则当前位置开始取新的（子串序列和）
            }
            //$maxNum = max([$maxNum,$tmp]);              // 把当前最大值，和当前（字串序列和）比，取最大值
            $maxNum = $maxNum > $tmp ? $maxNum : $tmp;    // 三目运算比上面的内置函数快；
        }
        return $maxNum;

        //动态规划 --若前一个元素大于0,则将其加到当前元素上
        function maxSubArray($nums)
        {
            $n   = sizeof($nums);
            $tmp = 0;
            $max = $nums[0];
            for ($i = 0; $i < $n; $i++) {
                $tmp += $nums[$i];
                if ($tmp < $nums[$i]) {//说明字符串和 $tmp为负数 舍弃
                    $tmp = $nums[$i];
                }
                if ($max < $tmp) {
                    $max = $tmp;
                }
            }
            return $max;
        }

        //动态规划 --若前一个元素大于0,则将其加到当前元素上
        $numsLen = sizeof($nums);
        $dp      = [];//状态转移数组
        $dp[0]   = $nums[0];
        for ($i = 1; $i < $numsLen; $i++) {
            $dp[$i] = $dp[$i - 1] < 0 ? $nums[$i] : $dp[$i - 1] + $nums[$i];//状态转移
        }

        return max($dp);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
