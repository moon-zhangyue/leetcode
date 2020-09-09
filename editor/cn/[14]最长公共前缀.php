<?php
//编写一个函数来查找字符串数组中的最长公共前缀。 
//
// 如果不存在公共前缀，返回空字符串 ""。 
//
// 示例 1: 
//
// 输入: ["flower","flow","flight"]
//输出: "fl"
// 
//
// 示例 2: 
//
// 输入: ["dog","racecar","car"]
//输出: ""
//解释: 输入不存在公共前缀。
// 
//
// 说明: 
//
// 所有输入只包含小写字母 a-z 。 
// Related Topics 字符串 
// 👍 1245 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        $n = count($strs);
        if ($n == 0) return '';
        if ($n == 1) return $strs[0];

        $first = strlen($strs[0]);

        $res = '';

        for ($i = 0; $i < $first; $i++) {
            $char = substr($strs[0], $i, 1);
            for ($k = 1; $k < $n; $k++) {
                // 比第一个字符串短或者同位置的字符不相同，直接返回
                if (substr($strs[$k], $i, 1) === false || substr($strs[$k], $i, 1) != $char) {
                    return $res;
                }
            }

            $res .= $char;
        }
        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
