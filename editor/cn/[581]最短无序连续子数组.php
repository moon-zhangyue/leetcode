<?php
//给你一个整数数组 nums ，你需要找出一个 连续子数组 ，如果对这个子数组进行升序排序，那么整个数组都会变为升序排序。 
//
// 请你找出符合题意的 最短 子数组，并输出它的长度。 
//
// 
//
// 
// 
// 示例 1： 
//
// 
//输入：nums = [2,6,4,8,10,9,15]
//输出：5
//解释：你只需要对 [6, 4, 8, 10, 9] 进行升序排序，那么整个表都会变为升序排序。
// 
//
// 示例 2： 
//
// 
//输入：nums = [1,2,3,4]
//输出：0
// 
//
// 示例 3： 
//
// 
//输入：nums = [1]
//输出：0
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 104 
// -105 <= nums[i] <= 105 
// 
//
// 
//
// 进阶：你可以设计一个时间复杂度为 O(n) 的解决方案吗？ 
// 
// 
// Related Topics 栈 贪心 数组 双指针 排序 单调栈 
// 👍 647 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findUnsortedSubarray($nums)
    {
        $arr = $nums;
        sort($nums);
        if ($nums == $arr) {
            return 0;
        }
        $start    = 0;
        $end      = 0;
        $is_start = $is_end = false;
        foreach ($arr as $k => $v) {
            if ($v != $nums[$k]) {
                if ($is_start == false) {
                    $start    = $k;
                    $is_start = true;
                }
                $is_end = false;
            } else {
                if ($is_end == false) {
                    $end    = $k;
                    $is_end = true;
                }
            }
        }
        $len = count($arr);
        if ($arr[$len - 1] != $nums[$len - 1]) {
            $end = $len;
        }
        return $end - $start;
    }
}

$a   = new Solution();
$res = $a->findUnsortedSubarray([1,3,2,4,5]);
var_dump($res);
//leetcode submit region end(Prohibit modification and deletion)
