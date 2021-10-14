<?php
//给定一个字符串 s ，请你找出其中不含有重复字符的 最长子串 的长度。 
//
// 
//
// 示例 1: 
//
// 
//输入: s = "abcabcbb"
//输出: 3 
//解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
// 
//
// 示例 2: 
//
// 
//输入: s = "bbbbb"
//输出: 1
//解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
// 
//
// 示例 3: 
//
// 
//输入: s = "pwwkew"
//输出: 3
//解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
//     请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
// 
//
// 示例 4: 
//
// 
//输入: s = ""
//输出: 0
// 
//
// 
//
// 提示： 
//
// 
// 0 <= s.length <= 5 * 10⁴ 
// s 由英文字母、数字、符号和空格组成 
// 
// Related Topics 哈希表 字符串 滑动窗口 👍 6264 👎 0

/*
 * 一旦出现涉及次数,需要用到散列表
 * 构造子串,散列表存下标
 * 涉及子串,考虑滑动窗口
 * */

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    /**
     * @param String $s
     *
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        //①
        $lens = strlen($s);//总的字符串有多长
        $tmp  = '';       //用于存储子串  当前里面不会有重复的字符
        $len  = 0;        //最长子串的长度
        for ($i = 0; $i < $lens; $i++) {
            $re = strpos($tmp, $s[$i]);//判断 是否有重复的
            if (false !== $re) {//有重复
                $tmp .= $s[$i];//先追加上去 例如pww
                $tmp = substr($tmp, $re + 1);//从重复位置开始 截取后 pww=>w
            } else {//无重复字符
                $tmp .= $s[$i];//追加到后面
            }
            //每一次过去后，比较当前的tmp 与上一次的 len 谁更大
            $len = strlen($tmp) > $len ? strlen($tmp) : $len;
        }
        return $len;//最后返回的长度 不一定是$tmp

        //②
        $n = strlen($s);
        if ($n <= 1) return $n;
        // 维护一个滑动窗口，窗口内为无重复字符的最长子串
        // 以 pwwkew 为例，遍历整个字符串
        // left 为滑动窗口起点索引， i 为滑动窗口终点索引
        // hash 记录当前滑动窗口内的字母，键为 字母，值为 索引
        // 全局 max 记录窗口最大长度
        // left=i=0, 窗口内只有一个字母 p, length=1, hash=['p' => 0]
        // left=0, i=1, 索引 1 对应的字母 w 不在 hash 内，窗口向右滑动, length=2, hash=['p' => 0, 'w' => 1]
        // left=0, right=2, 索引 2 对应的字母 w 在 hash 内,窗口起点要更新为上一个 w 的索引的下一个位置,left=hash['w'] + 1.
        // 同时， hash['w'] 更新为新的索引 ，指向最后一个 w, hash=['p' => 0, 'w' => 2]
        $left = 0;
        $hash = [];
        $max  = 0;
        for ($i = 0; $i < $n; ++$i) {
            $char = $s[$i];
            if (isset($hash[$char])) {
                $left = max($left, $hash[$char] + 1);
            }

            // 提前结束遍历
            if ($left + $max >= $n) break;

            $hash[$char] = $i;
            $max         = max($max, $i - $left + 1);
        }

        return $max;

        //③
        //可以考虑从一个空字符串每次增加一个字符直到s结束,
        //当前字符为s[i],
        //left = max(left, last[s[i]]);获得的区间(left, i]是以s[i]结尾无重复字符的最长字串,
        //因为s[left]与s[i]是同一个字符,
        //减小left会有重复字符,
        //从0遍历到s.size()就取到了每个字符结尾的最长无重复字符字串,
        //ans记录其中的最大值,
        $last = array();
        $left = -1;
        $ans  = 0;
//        for ($i = 0; $i < 128; $i++) {
//            $last[$i] = -1;
//        }
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $left         = max($left, $last[$s[$i]]);
            $last[$s[$i]] = $i;
            $ans          = max($ans, $i - $left);
        }
        return $ans;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
