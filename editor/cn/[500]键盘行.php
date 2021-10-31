<?php
//给你一个字符串数组 words ，只返回可以使用在 美式键盘 同一行的字母打印出来的单词。键盘如下图所示。 
//
// 美式键盘 中： 
//
// 
// 第一行由字符 "qwertyuiop" 组成。 
// 第二行由字符 "asdfghjkl" 组成。 
// 第三行由字符 "zxcvbnm" 组成。 
// 
//
// 
//
// 
//
// 示例 1： 
//
// 
//输入：words = ["Hello","Alaska","Dad","Peace"]
//输出：["Alaska","Dad"]
// 
//
// 示例 2： 
//
// 
//输入：words = ["omk"]
//输出：[]
// 
//
// 示例 3： 
//
// 
//输入：words = ["adsdf","sfd"]
//输出：["adsdf","sfd"]
// 
//
// 
//
// 提示： 
//
// 
// 1 <= words.length <= 20 
// 1 <= words[i].length <= 100 
// words[i] 由英文字母（小写和大写字母）组成 
// 
// Related Topics 数组 哈希表 字符串 👍 155 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
    class Solution
    {

        /**
         * @param String[] $words
         *
         * @return String[]
         */
        function findWords($words)
        {
            //一
            $arr = [
                'q' => 1,
                'w' => 1,
                'e' => 1,
                'r' => 1,
                't' => 1,
                'y' => 1,
                'u' => 1,
                'i' => 1,
                'o' => 1,
                'p' => 1,
                'a' => 2,
                's' => 2,
                'd' => 2,
                'f' => 2,
                'g' => 2,
                'h' => 2,
                'j' => 2,
                'k' => 2,
                'l' => 2,
                'z' => 3,
                'x' => 3,
                'c' => 3,
                'v' => 3,
                'b' => 3,
                'n' => 3,
                'm' => 3
            ];

            foreach ($words as $key => $val) {
                $val   = strtolower($val);
                $index = $arr[$val{0}];
                for ($i = 1; $i < strlen($val); $i++) {
                    if ($index != $arr[$val{$i}]) {
                        unset($words[$key]);
                        break;
                    }
                }
            }
            return $words;
        }
    }
//leetcode submit region end(Prohibit modification and deletion)
