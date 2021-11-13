<?php
//给你两个字符串 s1 和 s2 ，写一个函数来判断 s2 是否包含 s1 的排列。如果是，返回 true ；否则，返回 false 。 
//
// 换句话说，s1 的排列之一是 s2 的 子串 。 
//
// 
//
// 示例 1： 
//
// 
//输入：s1 = "ab" s2 = "eidbaooo"
//输出：true
//解释：s2 包含 s1 的排列之一 ("ba").
// 
//
// 示例 2： 
//
// 
//输入：s1= "ab" s2 = "eidboaoo"
//输出：false
// 
//
// 
//
// 提示： 
//
// 
// 1 <= s1.length, s2.length <= 10⁴ 
// s1 和 s2 仅包含小写字母 
// 
// Related Topics 哈希表 双指针 字符串 滑动窗口 👍 487 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        //一 滑动窗口
        $needs  = str_split($s1);
        $needs  = array_count_values($needs);//初始化need窗口
        $window = [];
        foreach (array_keys($needs) as $k => $v) {//初始化window窗口
            $window[$v] = 0;
        }

        $left  = 0;//滑动左指针
        $right = 0;//滑动右指针
        $valid = 0;
        $s2Len = strlen($s2);
        while ($right < $s2Len) {
            $c = $s2[$right];
            $right++;//移动右指针
            if (isset($needs[$c])) {
                $window[$c]++;
                if ($needs[$c] == $window[$c]) {
                    $valid++;
                }
            }
            if (($right - $left) >= strlen($s1)) {//需要滑动窗口
                if ($valid == sizeof($needs)) {//找到答案
                    return true;
                }
                $d = $s2[$left];
                $left++;//移动左指针
                if (isset($needs[$d])) {
                    if ($needs[$d] == $window[$d]) {
                        $valid--;
                    }
                    $window[$d]--;
                }
            }

        }
        return false;

        /*解题思路
PHP内建的count_chars($string, $mode)有计算字串中每个字符出现次数并弹回结果的功能，直接使用就结束了
根据不同的 mode，count_chars() 返回下列不同的结果：
0 - 以所有的每个字节值作为键名，出现次数作为值的数组。
1 - 与 0 相同，但只列出出现次数大于零的字节值。
2 - 与 0 相同，但只列出出现次数等于零的字节值。
3 - 返回由所有使用了的字节值组成的字符串。
4 - 返回由所有未使用的字节值组成的字符串。*/
        $size1 = strlen($s1);
        $size2 = strlen($s2);

        if ($size1 > $size2) return false;

        $s1_array = count_chars($s1, 1);//返回s1每个字符出现次数的数组，index为该字符的ascii值

        //循环至长字串减去短字串的位置即可
        $start = 0;//从长字串中截取子字串的开始位置
        while ($start <= $size2 - $size1) {
            $sub_str      = substr($s2, $start, $size1);//长字串中的子字串
            $substr_array = count_chars($sub_str, 1);
            if ($s1_array == $substr_array) return true;
            $start++;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
