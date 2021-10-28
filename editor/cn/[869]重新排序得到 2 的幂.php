<?php
//给定正整数 N ，我们按任何顺序（包括原始顺序）将数字重新排序，注意其前导数字不能为零。 
//
// 如果我们可以通过上述方式得到 2 的幂，返回 true；否则，返回 false。 
//
// 
//
// 
// 
//
// 示例 1： 
//
// 输入：1
//输出：true
// 
//
// 示例 2： 
//
// 输入：10
//输出：false
// 
//
// 示例 3： 
//
// 输入：16
//输出：true
// 
//
// 示例 4： 
//
// 输入：24
//输出：false
// 
//
// 示例 5： 
//
// 输入：46
//输出：true
// 
//
// 
//
// 提示： 
//
// 
// 1 <= N <= 10^9 
// 
// Related Topics 数学 计数 枚举 排序 👍 60 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $n
     *
     * @return Boolean
     */
    function reorderedPowerOf2($n)
    {
        //一 列出所有的10**9方内的可能值 排序
        $map = [];
        for ($i = 0; 2 ** $i <= 1e9; ++$i) {
            $str = str_split(2 ** $i);
            sort($str);
            $str = join('', $str);

            $map[$str] = 1;
        }
        $str = str_split($n);
        sort($str);
        $str = join('', $str);
        return isset($map[$str]);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
