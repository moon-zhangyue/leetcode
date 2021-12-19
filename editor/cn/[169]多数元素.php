<?php
//给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数 大于 ⌊ n/2 ⌋ 的元素。 
//
// 你可以假设数组是非空的，并且给定的数组总是存在多数元素。 
//
// 
//
// 示例 1： 
//
// 
//输入：[3,2,3]
//输出：3 
//
// 示例 2： 
//
// 
//输入：[2,2,1,1,1,2,2]
//输出：2
// 
//
// 
//
// 进阶： 
//
// 
// 尝试设计时间复杂度为 O(n)、空间复杂度为 O(1) 的算法解决此问题。 
// 
// Related Topics 数组 哈希表 分治 计数 排序 👍 1230 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function majorityElement($nums)
    {
        //一
        $mid = count($nums) / 2;

        $arr = array_count_values($nums);

        foreach ($arr as $key => $value) {
            if ($value > $mid) {
                return $key;
            }
        }

        //二 取排序后的数组中间元素即可
        sort($nums);
        return $nums[floor(count($nums) / 2)];

        //三 内置函数
        $count = array_count_values($nums);
        return array_search(max($count), $count);

        //四 hash table
        $hash = [];
        foreach ($nums as $num) {
            if (!isset($hash[$num])) $hash[$num] = 0;
            $hash[$num]++;
        }
        return array_search(max($hash), $hash);

        //五 Stack 开心消消乐 使用一个辅助栈 栈为空则入栈，栈不为空，如果与栈顶元素不相同则出栈，最后栈顶元素就是要找的
        $stack = [];
        foreach ($nums as $num) {
            if (empty($stack) || end($stack) == $num) {
                $stack[] = $num;
            } else {
                array_pop($stack);
            }
        }

        return end($stack);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
