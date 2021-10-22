<?php
//给定一个大小为 n 的整数数组，找出其中所有出现超过 ⌊ n/3 ⌋ 次的元素。
//
// 
//
// 
//
// 示例 1： 
//
// 
//输入：[3,2,3]
//输出：[3] 
//
// 示例 2： 
//
// 
//输入：nums = [1]
//输出：[1]
// 
//
// 示例 3： 
//
// 
//输入：[1,1,1,3,3,2,2,2]
//输出：[1,2] 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 5 * 10⁴ 
// -10⁹ <= nums[i] <= 10⁹ 
// 
//
// 
//
// 进阶：尝试设计时间复杂度为 O(n)、空间复杂度为 O(1)的算法解决此问题。 
// Related Topics 数组 哈希表 计数 排序 👍 437 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function majorityElement(array $nums)
    {
        $list = $arr = [];
        $num  = count($nums) / 3;
        foreach ($nums as $v) {
            if (array_key_exists($v, $list)) {
                $list[$v]++;
            } else {
                $list[$v] = 1;
            }
        }
        foreach ($list as $a => $b) {
            if ($b > $num) {
                array_push($arr, $a);
            }
        }

        return $arr;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
