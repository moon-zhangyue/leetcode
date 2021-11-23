<?php
//给你两个字符串 s 和 goal ，只要我们可以通过交换 s 中的两个字母得到与 goal 相等的结果，就返回 true ；否则返回 false 。 
//
// 交换字母的定义是：取两个下标 i 和 j （下标从 0 开始）且满足 i != j ，接着交换 s[i] 和 s[j] 处的字符。 
//
// 
// 例如，在 "abcd" 中交换下标 0 和下标 2 的元素可以生成 "cbad" 。 
// 
//
// 
//
// 示例 1： 
//
// 
//输入：s = "ab", goal = "ba"
//输出：true
//解释：你可以交换 s[0] = 'a' 和 s[1] = 'b' 生成 "ba"，此时 s 和 goal 相等。 
//
// 示例 2： 
//
// 
//输入：s = "ab", goal = "ab"
//输出：false
//解释：你只能交换 s[0] = 'a' 和 s[1] = 'b' 生成 "ba"，此时 s 和 goal 不相等。 
//
// 示例 3： 
//
// 
//输入：s = "aa", goal = "aa"
//输出：true
//解释：你可以交换 s[0] = 'a' 和 s[1] = 'a' 生成 "aa"，此时 s 和 goal 相等。
// 
//
// 示例 4： 
//
// 
//输入：s = "aaaaaaabc", goal = "aaaaaaacb"
//输出：true
// 
//
// 
//
// 提示： 
//
// 
// 1 <= s.length, goal.length <= 2 * 10⁴ 
// s 和 goal 由小写英文字母组成 
// 
// Related Topics 哈希表 字符串 👍 172 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String $s
     * @param String $goal
     *
     * @return Boolean
     */
    function buddyStrings($s, $goal)
    {
        if (strlen($s) != strlen($goal)) {
            return false;
        }

        //存字符出现次数
        $arr = [];
        //A与B不同的字符
        $s_diff    = [];
        $goal_diff = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] != $goal[$i]) {
                array_push($s_diff, $s[$i]);
                array_push($goal_diff, $goal[$i]);
            }
            $arr[$s[$i]] = isset($arr[$s[$i]]) ? $arr[$s[$i]] + 1 : 1;
        }
        //A与B相同
        if (empty($s_diff)) {
            //有某个字符 >= 2,只用直接调换相同的2个数就可
            if (max($arr) >= 2) {
                return true;
            } else {
                return false;
            }
        } elseif (count($s_diff) == 2) {
            //AB不同且不同的个数 == 2，则排序比较是否相同
            sort($goal_diff);
            sort($s_diff);
            if ($s_diff == $goal_diff) {
                return true;
            }
        }
        return false;

        //双指针 --- 超时
        for ($i = 0; $i < strlen($s); $i++) {
            $j = 0;
            while ($j < strlen($s)) {
                $str = $s;

                $exp     = $str{$i};
                $str{$i} = $str{$j};
                $str{$j} = $exp;

                if ($str === $goal && $j !== $i) {
                    return true;
                }

                $j++;
            }
        }

        return false;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
