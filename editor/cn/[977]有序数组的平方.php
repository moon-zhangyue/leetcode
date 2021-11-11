<?php
//给你一个按 非递减顺序 排序的整数数组 nums，返回 每个数字的平方 组成的新数组，要求也按 非递减顺序 排序。 
//
// 
// 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [-4,-1,0,3,10]
//输出：[0,1,9,16,100]
//解释：平方后，数组变为 [16,1,0,9,100]
//排序后，数组变为 [0,1,9,16,100] 
//
// 示例 2： 
//
// 
//输入：nums = [-7,-3,2,3,11]
//输出：[4,9,9,49,121]
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 10⁴ 
// -10⁴ <= nums[i] <= 10⁴ 
// nums 已按 非递减顺序 排序 
// 
//
// 
//
// 进阶： 
//
// 
// 请你设计时间复杂度为 O(n) 的算法解决本问题 
// 
// Related Topics 数组 双指针 排序 👍 342 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function sortedSquares($nums)
    {
        /*
         * 双指针
         * 两个指针分别指向位置 00 和 n-1n−1，每次比较两个指针对应的数，选择较大的那个逆序放入答案并移动指针。这种方法无需处理某一指针移动至边界的情况，
         * */
        //双指针
        $len = count($nums);

        $i = 0;
        $j = $pos = $len - 1;

        while ($i <= $j) {
            $i_sq = pow($nums[$i], 2); //$i ** 2;
            $j_sq = pow($nums[$j], 2);

            if ($i_sq < $j_sq) {
                $arr[$pos] = $j_sq;
                $j--;
            } else {
                $arr[$pos] = $i_sq;
                $i++;
            }
            $pos--;
        }
        return $arr;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
