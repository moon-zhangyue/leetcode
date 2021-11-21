<?php
//给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。 
//
// 示例: 
//
// 输入: [0,1,0,3,12]
//输出: [1,3,12,0,0] 
//
// 说明: 
//
// 
// 必须在原数组上操作，不能拷贝额外的数组。 
// 尽量减少操作次数。 
// 
// Related Topics 数组 双指针 👍 1293 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        foreach ($nums as $k => $v) {
            if ($v === 0) {
                array_push($nums, $v);
                unset($nums[$k]);
            }
        }

        return $nums;

        //双指针
        /*快指针R遍历数组，每次+1
快指针R指非0，慢指针L +1
快指针R指　0，慢指针L停在0
直到快指针R指非0，交换，慢指针L +1*/
        $left = 0;
        foreach ($nums as $right => $v) {
            if ($v) {
                if ($nums[$left] == 0) {
                    list($nums[$right], $nums[$left]) = array($nums[$left], $v);
                }
                $left++;
            }
        }

        //https://leetcode-cn.com/problems/move-zeroes/solution/sort-cha-ru-shuang-zhi-zhen-dao-xu-shun-xu-bian-li/
    }
}
//leetcode submit region end(Prohibit modification and deletion)
