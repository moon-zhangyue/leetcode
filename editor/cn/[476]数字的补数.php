<?php
//给你一个 正 整数 num ，输出它的补数。补数是对该数的二进制表示取反。 
//
// 
//
// 
// 
//
// 示例 1： 
//
// 
//输入：num = 5
//输出：2
//解释：5 的二进制表示为 101（没有前导零位），其补数为 010。所以你需要输出 2 。
// 
//
// 示例 2： 
//
// 
//输入：num = 1
//输出：0
//解释：1 的二进制表示为 1（没有前导零位），其补数为 0。所以你需要输出 0 。
// 
//
// 
//
// 提示： 
//
// 
// 给定的整数 num 保证在 32 位带符号整数的范围内。 
// num >= 1 
// 你可以假定二进制数不包含前导零位。 
// 本题与 1009 https://leetcode-cn.com/problems/complement-of-base-10-integer/ 相同 
// 
// Related Topics 位运算 👍 244 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $num
     *
     * @return Integer
     */
    function findComplement($num)
    {
        //一--循环迭代
        $exp = (string)base_convert($num, 10, 2);

        $str = '';
        for ($i = 0; $i < strlen($exp); $i++) {
            $a   = $exp{$i} == 1 ? 0 : 1;
            $str .= $a;
        }

        return base_convert($str, 2, 10);

        //二
        return pow(2, strlen(decbin($num))) - 1 - $num;

        //三-位运算
        /*通过右移1位来遍历二进制数位数。
            遍历的同时，定义一个二进制数$res，每位赋值1。
            按位异或，$res ^ $num就有取反的效果。*/
        $tmp = $num;
        $int = 0;

        while ($tmp) {
            $int = ($int << 1) + 1;
            $tmp >>= 1;
        }

        return $int ^ $num;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
