<?php
//给你一个字符串 s，找到 s 中最长的回文子串。 
//
// 
//
// 示例 1： 
//
// 
//输入：s = "babad"
//输出："bab"
//解释："aba" 同样是符合题意的答案。
// 
//
// 示例 2： 
//
// 
//输入：s = "cbbd"
//输出："bb"
// 
//
// 示例 3： 
//
// 
//输入：s = "a"
//输出："a"
// 
//
// 示例 4： 
//
// 
//输入：s = "ac"
//输出："a"
// 
//
// 
//
// 提示： 
//
// 
// 1 <= s.length <= 1000 
// s 仅由数字和英文字母（大写和/或小写）组成 
// 
// Related Topics 字符串 动态规划 👍 4368 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        //中心扩散法
        $len = strlen($s);
        if ($len < 2) return $s;

        $max_len = 0;

        //从数组第一个记录起始位置，第二位记录长度
        $res = [];

        for ($i = 0; $i < $len - 1; $i++) {
            $odd  = $this->centerSpread($s, $i, $i);
            $even = $this->centerSpread($s, $i, $i + 1);
            $max  = $odd[1] > $even[1] ? $odd : $even;
            if ($max[1] > $max_len) {
                $res     = $max;
                $max_len = $max[1];
            }
        }
        return substr($s, $res[0], $max_len);
    }

    function centerSpread(string $s, int $left, int $right)
    {
        $len = strlen($s);
        while ($left >= 0 && $right < $len) {
            if ($s{$left} == $s{$right}) {
                $left--;  //left向前移动
                $right++; //right向后移动
            } else {
                break;
            }
        }
        return [$left + 1, $right - $left - 1];
    }
}
//leetcode submit region end(Prohibit modification and deletion)
