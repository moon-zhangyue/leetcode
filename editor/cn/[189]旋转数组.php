<?php
//给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。 
//
// 
//
// 进阶： 
//
// 
// 尽可能想出更多的解决方案，至少有三种不同的方法可以解决这个问题。 
// 你可以使用空间复杂度为 O(1) 的 原地 算法解决这个问题吗？ 
// 
//
// 
//
// 示例 1: 
//
// 
//输入: nums = [1,2,3,4,5,6,7], k = 3
//输出: [5,6,7,1,2,3,4]
//解释:
//向右旋转 1 步: [7,1,2,3,4,5,6]
//向右旋转 2 步: [6,7,1,2,3,4,5]
//向右旋转 3 步: [5,6,7,1,2,3,4]
// 
//
// 示例 2: 
//
// 
//输入：nums = [-1,-100,3,99], k = 2
//输出：[3,99,-1,-100]
//解释: 
//向右旋转 1 步: [99,-1,-100,3]
//向右旋转 2 步: [3,99,-1,-100] 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 2 * 10⁴ 
// -2³¹ <= nums[i] <= 2³¹ - 1 
// 0 <= k <= 10⁵ 
// 
//
// 
// 
// Related Topics 数组 数学 双指针 👍 1178 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     *
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $arr = [];
        $len = count($nums);
        for ($i = $len - 1; $i >= 0; $i--) {
            $arr[($i + $k) % $len] = $nums[$i];
        }
        ksort($arr);

        $nums = $arr;
        return $nums;

        //二
        /*
         * 通过数组翻转来实现；先翻转[0, n - k -1]范围的；再翻转[n - k, n - 1]范围的；最后在[0, n - 1]范围上再次翻转就可以得到结果。
         * */
    }
}
//leetcode submit region end(Prohibit modification and deletion)
