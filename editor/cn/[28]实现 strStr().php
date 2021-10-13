<?php
//实现 strStr() 函数。 
//
// 给你两个字符串 haystack 和 needle ，请你在 haystack 字符串中找出 needle 字符串出现的第一个位置（下标从 0 开始）。如
//果不存在，则返回 -1 。 
//
// 
//
// 说明： 
//
// 当 needle 是空字符串时，我们应当返回什么值呢？这是一个在面试中很好的问题。 
//
// 对于本题而言，当 needle 是空字符串时我们应当返回 0 。这与 C 语言的 strstr() 以及 Java 的 indexOf() 定义相符。 
//
// 
//
// 示例 1： 
//
// 
//输入：haystack = "hello", needle = "ll"
//输出：2
// 
//
// 示例 2： 
//
// 
//输入：haystack = "aaaaa", needle = "bba"
//输出：-1
// 
//
// 示例 3： 
//
// 
//输入：haystack = "", needle = ""
//输出：0
// 
//
// 
//
// 提示： 
//
// 
// 0 <= haystack.length, needle.length <= 5 * 10⁴ 
// haystack 和 needle 仅由小写英文字符组成 
// 
// Related Topics 双指针 字符串 字符串匹配 👍 1066 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String $haystack
     * @param String $needle
     *
     * @return Integer
     */
    function strStr($haystack, $needle)
    {
        //极易超时 官方js写法就很快
//        $n = strlen($haystack);
//        $m = strlen($needle);
//
//        if ($m == 0) {
//            return 0;
//        }
//
//        parse_str($needle, $pi);
//        $j = 0;
//        for ($i = 0; $i < $m; $i++) {
//            while ($j > 0 && $needle{$i} !== $needle{$j}) {
//                $j = $pi[$j - 1];
//            }
//            if ($needle{$i} == $needle{$j}) {
//                $j++;
//            }
//            $pi[$i] = $j;
//        }
//        $j = 0;
//        for ($i = 0; $i < $n; $i++) {
//            while ($j > 0 && $haystack{$i} != $needle{$j}) {
//                $j = $pi[$j - 1];
//            }
//            if ($haystack[$i] == $needle[$j]) {
//                $j++;
//            }
//            if ($j === $m) {
//                return $i - $m + 1;
//            }
//        }
//        return -1;

        /*第一次写用官方的双指针法直接超时了
然后想了下，这个每次可以从子串头尾的位置同时比较，头尾有一个不一样，直接来下一波
这样的优化 是针对子串后半部分如果不一样的话 会非常明显*/

        $left_h = 0;
        if ($needle == '') {
            return 0;
        }
        while ($left_h <= strlen($haystack) - strlen($needle)) {
            $left_n  = 0;
            $right_h = $left_h + strlen($needle) - 1;
            $right_n = strlen($needle) - 1;
            $p       = $left_h;
            while (true) {
                if (($haystack[$p] != $needle[$left_n]) || ($haystack[$right_h] != $needle[$right_n])) {
                    break;
                }
                $p++;
                $left_n++;
                $right_h--;
                $right_n--;

                if ($p > $right_h) {
                    return $left_h;
                }
            }
            $left_h++;

        }
        return -1;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
