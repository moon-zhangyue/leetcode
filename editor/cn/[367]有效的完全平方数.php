<?php
//给定一个 正整数 num ，编写一个函数，如果 num 是一个完全平方数，则返回 true ，否则返回 false 。 
//
// 进阶：不要 使用任何内置的库函数，如 sqrt 。 
//
// 
//
// 示例 1： 
//
// 
//输入：num = 16
//输出：true
// 
//
// 示例 2： 
//
// 
//输入：num = 14
//输出：false
// 
//
// 
//
// 提示： 
//
// 
// 1 <= num <= 2^31 - 1 
// 
// Related Topics 数学 二分查找 👍 296 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $num
     *
     * @return Boolean
     */
    function isPerfectSquare($num)
    {
        //一 二分查找
        $l = 0;
        $r = $num;

        while ($l <= $r) {
            $mid = floor(($l + $r) / 2);
            $s   = $mid * $mid;

            if ($s < $num) {
                $l = $mid + 1;
            } elseif ($s > $num) {
                $r = $mid - 1;
            } else {
                return true;
            }
        }
        return false;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
