<?php
//给定一个由 整数 组成的 非空 数组所表示的非负整数，在该数的基础上加一。 
//
// 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。 
//
// 你可以假设除了整数 0 之外，这个整数不会以零开头。 
//
// 
//
// 示例 1： 
//
// 
//输入：digits = [1,2,3]
//输出：[1,2,4]
//解释：输入数组表示数字 123。
// 
//
// 示例 2： 
//
// 
//输入：digits = [4,3,2,1]
//输出：[4,3,2,2]
//解释：输入数组表示数字 4321。
// 
//
// 示例 3： 
//
// 
//输入：digits = [0]
//输出：[1]
// 
//
// 
//
// 提示： 
//
// 
// 1 <= digits.length <= 100 
// 0 <= digits[i] <= 9 
// 
// Related Topics 数组 数学 👍 790 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $digits
     * 动态规划题目
     *
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $length   = sizeof($digits); //数组长度
        $currentI = $length - 1; //需要加1的位置默认为最后一位

        for ($i = $length - 1; $i >= 0; $i--) {
            if ($currentI == $i && $digits[$i] + 1 == 10) {
                $digits[$i] = 0;

                if ($i > 0) {
                    $currentI--;
                } else {
                    array_unshift($digits, 1);//数组开头加个1
                }
            } else if ($currentI == $i && $digits[$i] + 1 < 10) {
                $digits[$i] += 1;
                break;
            }
        }
        return $digits;

        //套用公式
        $len = count($digits);
        if ($len == 0) return [1];

        $carry  = 0;//向前一位进位
        $return = [];
        $i      = $len - 1;

        $digits[$i]++; // 直接在最后一位加上

        if ($digits[$i] <= 9) return $digits;
        while ($i >= 0 || $carry) {
            $sum = $carry;
            if ($i >= 0) {
                $sum += $digits[$i];//加上进位值
                $i--;
            }

            $carry = floor($sum / 10);//四舍五入向下取一
            array_unshift($return, $sum % 10);//$sum非10就直接把该值加入,是10就加入0
        }
        return $return;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
