<?php
//给你一个整数 n ，对于 0 <= i <= n 中的每个 i ，计算其二进制表示中 1 的个数 ，返回一个长度为 n + 1 的数组 ans 作为答案。 
//
//
// 
//
// 
// 
// 示例 1： 
//
// 
//输入：n = 2
//输出：[0,1,1]
//解释：
//0 --> 0
//1 --> 1
//2 --> 10
// 
//
// 示例 2： 
//
// 
//输入：n = 5
//输出：[0,1,1,2,1,2]
//解释：
//0 --> 0
//1 --> 1
//2 --> 10
//3 --> 11
//4 --> 100
//5 --> 101
// 
//
// 
//
// 提示： 
//
// 
// 0 <= n <= 10⁵ 
// 
//
// 
//
// 进阶： 
//
// 
// 很容易就能实现时间复杂度为 O(n log n) 的解决方案，你可以在线性时间复杂度 O(n) 内用一趟扫描解决此问题吗？ 
// 你能不使用任何内置函数解决此问题吗？（如，C++ 中的 __builtin_popcount ） 
// 
// 
// 
// Related Topics 位运算 动态规划 👍 854 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer[]
     */
    function countBits($n)
    {
        /*
         * 偶数的二进制1个数超级简单，因为偶数是相当于被某个更小的数乘2，乘2怎么来的？在二进制运算中，就是左移一位，也就是在低位多加1个0，那样就说明dp[i] = dp[i / 2]
奇数稍微难想到一点，奇数由不大于该数的偶数+1得到，偶数+1在二进制位上会发生什么？会在低位多加1个1，那样就说明dp[i] = dp[i-1] + 1，当然也可以写成dp[i] = dp[i / 2] + 1
         * */

        $ans = range(0, $n);
        for ($i = 0; $i <= $n; $i++) {
            if ($i % 2 == 0)
                $ans[$i] = (int)$ans[$i / 2];
            else
                $ans[$i] = (int)$ans[$i / 2] + 1;
        }
        return $ans;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
