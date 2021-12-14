<?php
//给你一个含 n 个整数的数组 nums ，其中 nums[i] 在区间 [1, n] 内。请你找出所有在 [1, n] 范围内但没有出现在 nums 中的数
//字，并以数组的形式返回结果。 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [4,3,2,7,8,2,3,1]
//输出：[5,6]
// 
//
// 示例 2： 
//
// 
//输入：nums = [1,1]
//输出：[2]
// 
//
// 
//
// 提示： 
//
// 
// n == nums.length 
// 1 <= n <= 10⁵ 
// 1 <= nums[i] <= n 
// 
//
// 进阶：你能在不使用额外空间且时间复杂度为 O(n) 的情况下解决这个问题吗? 你可以假定返回的数组不算在额外空间内。 
// Related Topics 数组 哈希表 👍 860 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function findDisappearedNumbers($nums)
    {
        //一
        return array_diff(range(1, count($nums), 1), $nums);

        //二
        /*
         * 正解：
2次遍历数组，第一次遍历把访问过的元素做一个标记(把数字映射到下标，加一个负号)，因为是按照有序下标访问的，故而第二次遍历的时候如果数不为负，说明该数对应的下标没被访问，下标即消失的数字。

数组：[3, 3, 2, 1, 4, 5, 6, 4]
下标：[0, 1, 2, 3, 4, 5, 6, 7]

注意：访问过后为负，在次访问依旧是负。所以取数之前需要abs: nums[abs(nums[abs(nums[$i]) - 1]
         * */
        $res = [];
        for ($i = 0; $i < count($nums); $i++) {
            $nums[abs($nums[$i]) - 1] = -abs($nums[abs($nums[$i]) - 1]);
        }

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] > 0) $res[] = $i + 1;
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
