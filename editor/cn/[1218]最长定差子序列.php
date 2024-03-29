<?php
//给你一个整数数组 arr 和一个整数 difference，请你找出并返回 arr 中最长等差子序列的长度，该子序列中相邻元素之间的差等于 
//difference 。 
//
// 子序列 是指在不改变其余元素顺序的情况下，通过删除一些元素或不删除任何元素而从 arr 派生出来的序列。 
//
// 
//
// 示例 1： 
//
// 
//输入：arr = [1,2,3,4], difference = 1
//输出：4
//解释：最长的等差子序列是 [1,2,3,4]。 
//
// 示例 2： 
//
// 
//输入：arr = [1,3,5,7], difference = 1
//输出：1
//解释：最长的等差子序列是任意单个元素。
// 
//
// 示例 3： 
//
// 
//输入：arr = [1,5,7,8,5,3,4,2,1], difference = -2
//输出：4
//解释：最长的等差子序列是 [7,5,3,1]。
// 
//
// 
//
// 提示： 
//
// 
// 1 <= arr.length <= 10⁵ 
// -10⁴ <= arr[i], difference <= 10⁴ 
// 
// Related Topics 数组 哈希表 动态规划 👍 112 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
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
        //动态规划
        $dp = [];//hash表  储存表示到该元素时能累积形成的等差数组个数

        for ($i = 0; $i < count($arr); $i++) {
            $diff = 0;//等差数组元素个数

            if (isset($dp[$arr[$i] - $difference])) {
                $diff = $dp[$arr[$i] - $difference]; //该等差数组上一个值时的 等差数组个数
            }
            $dp[$arr[$i]] = $diff + 1; //累积到当前数据时,该数组所在等差数组的元素个数
        }

        return max($dp);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
