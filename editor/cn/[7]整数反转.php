<?php
//给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。 
//
// 示例 1: 
//
// 输入: 123
//输出: 321
// 
//
// 示例 2: 
//
// 输入: -123
//输出: -321
// 
//
// 示例 3: 
//
// 输入: 120
//输出: 21
// 
//
// 注意: 
//
// 假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−231, 231 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。 
// Related Topics 数学 
// 👍 1996 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
//        $max = pow(2, 31) - 1;
//        $min = pow(-2, 31);

//        $x   = (string)$x;
//        $res = strstr($x, '-');
//        if ($res) {//存在-
//            $x = 0 - (int)strrev($res);
//        } else {
//            $x = (int)strrev($x);
//        }
//
//        if ($x > $max || $x < $min) {
//            return 0;
//        }
//        return $x;

        $f    = $x < 0 ? '-' : '';
        $x    = abs($x) . '';
        $len  = strlen($x) - 1;
        $half = floor($len / 2);
        for ($i = 0; $i <= $len; $i++) {
            $target     = $len - $i;
            $tmp        = $x[$target];
            $x[$target] = $x[$i];
            $x[$i]      = $tmp;
            if ($i == $half) {
                break; //至此已完成整个字符串字符的位置替换
            }
        }
        $x = intval($f . $x);
        if ($x > 2147483647  || $x < -2147483646) {
            return 0;
        } else {
            return $x;
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)

$a = new Solution();
$a->reverse(1);