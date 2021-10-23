<?php
//给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。
//
// 请必须使用时间复杂度为 O(log n) 的算法。 
//
// 
//
// 示例 1: 
//
// 
//输入: nums = [1,3,5,6], target = 5
//输出: 2
// 
//
// 示例 2: 
//
// 
//输入: nums = [1,3,5,6], target = 2
//输出: 1
// 
//
// 示例 3: 
//
// 
//输入: nums = [1,3,5,6], target = 7
//输出: 4
// 
//
// 示例 4: 
//
// 
//输入: nums = [1,3,5,6], target = 0
//输出: 0
// 
//
// 示例 5: 
//
// 
//输入: nums = [1], target = 0
//输出: 0
// 
//
// 
//
// 提示: 
//
// 
// 1 <= nums.length <= 10⁴ 
// -10⁴ <= nums[i] <= 10⁴ 
// nums 为无重复元素的升序排列数组 
// -10⁴ <= target <= 10⁴ 
// 
// Related Topics 数组 二分查找 👍 1127 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $target
     *
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        //一
        $len = count($nums);

        if ($target > $nums[$len - 1]) {
            return $len;
        }
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] == $target) {
                return $i;
            }
            if ($i < $len - 1 && $nums[$i] < $target && $nums[$i + 1] > $target) {
                return $i + 1;
            }
        }
        return 0;

        //二
        $nums[] = $target;
        sort($nums);
        return array_search($target, $nums);

        //三 时间复杂度O(logn) 必然使用二分查找
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
//leetcode submit region end(Prohibit modification and deletion)
