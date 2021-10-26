<?php
//给你两个 没有重复元素 的数组 nums1 和 nums2 ，其中nums1 是 nums2 的子集。 
//
// 请你找出 nums1 中每个元素在 nums2 中的下一个比其大的值。 
//
// nums1 中数字 x 的下一个更大元素是指 x 在 nums2 中对应位置的右边的第一个比 x 大的元素。如果不存在，对应位置输出 -1 。 
//
// 
//
// 示例 1: 
//
// 
//输入: nums1 = [4,1,2], nums2 = [1,3,4,2].
//输出: [-1,3,-1]
//解释:
//    对于 num1 中的数字 4 ，你无法在第二个数组中找到下一个更大的数字，因此输出 -1 。
//    对于 num1 中的数字 1 ，第二个数组中数字1右边的下一个较大数字是 3 。
//    对于 num1 中的数字 2 ，第二个数组中没有下一个更大的数字，因此输出 -1 。 
//
// 示例 2: 
//
// 
//输入: nums1 = [2,4], nums2 = [1,2,3,4].
//输出: [3,-1]
//解释:
//    对于 num1 中的数字 2 ，第二个数组中的下一个较大数字是 3 。
//    对于 num1 中的数字 4 ，第二个数组中没有下一个更大的数字，因此输出 -1 。
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums1.length <= nums2.length <= 1000 
// 0 <= nums1[i], nums2[i] <= 10⁴ 
// nums1和nums2中所有整数 互不相同 
// nums1 中的所有整数同样出现在 nums2 中 
// 
//
// 
//
// 进阶：你可以设计一个时间复杂度为 O(nums1.length + nums2.length) 的解决方案吗？ 
// Related Topics 栈 数组 哈希表 单调栈 👍 524 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     *
     * @return Integer[]
     */
    function nextGreaterElement($nums1, $nums2)
    {
        //一
        $arr = [];
        for ($i = 0; $i < count($nums1); $i++) {
            $start = array_search($nums1[$i], $nums2);
            for ($j = $start; $j < count($nums2); $j++) {
                if ($nums2[$j] > $nums1[$i]) {
                    $arr[$i] = $nums2[$j];
                    break;
                } else {
                    $arr[$i] = -1;
                }
            }
        }

        return $arr;

        //二 要求下一个更大的元素，就是用单调栈解
        $stack    = new SplStack();
        $nums2Len = sizeof($nums2);

        $arr = [];//保存nums2数组的next greater数组
        for ($i = $nums2Len - 1; $i >= 0; $i--) {//从后往前迭代
            while (!$stack->isEmpty() && $stack->top() <= $nums2[$i]) {
                $stack->pop();//出栈
            }
            $arr[$nums2[$i]] = $stack->isEmpty() ? -1 : $stack->top();//技巧，直接用值当键，因为题目说了没有重复元素，这样后面可以用O（1）的时间复杂度找到每个nums1数组元素对应的数据
            $stack->push($nums2[$i]);//入栈
        }

        $ret = [];//保存返回结果
        foreach ($nums1 as $v) {
            $ret[] = $arr[$v];
        }

        return $ret;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
