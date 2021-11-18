<?php
//假设你正在爬楼梯。需要 n 阶你才能到达楼顶。 
//
// 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？ 
//
// 注意：给定 n 是一个正整数。 
//
// 示例 1： 
//
// 输入： 2
//输出： 2
//解释： 有两种方法可以爬到楼顶。
//1.  1 阶 + 1 阶
//2.  2 阶 
//
// 示例 2： 
//
// 输入： 3
//输出： 3
//解释： 有三种方法可以爬到楼顶。
//1.  1 阶 + 1 阶 + 1 阶
//2.  1 阶 + 2 阶
//3.  2 阶 + 1 阶
// 
// Related Topics 记忆化搜索 数学 动态规划 👍 2006 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function climbStairs($n)
    {
        //一  通用公式
        $sqrt5 = sqrt(5);
        $fibn  = pow((1 + $sqrt5) / 2, $n + 1) - pow((1 - $sqrt5) / 2, $n + 1);
        return round($fibn / $sqrt5);

        //动态规划  斐波那契
        /*
         * 本问题其实常规解法可以分成多个子问题，爬第n阶楼梯的方法数量，等于 2 部分之和
爬上 n-1 阶楼梯的方法数量。因为再爬1阶就能到第n阶
爬上 n-2 阶楼梯的方法数量，因为再爬2阶就能到第n阶
所以我们得到公式 dp[n] = dp[n-1] + dp[n-2]
同时需要初始化 dp[0]=1和 dp[1]=1
时间复杂度：O(n)
         * */

        //二
        if ($n == 1) return 1;
        if ($n == 2) return 2;

        return $this->climbStairs($n - 1) + $this->climbStairs($n - 2);

        //三
        $arr    = [];//n>0
        $arr[1] = 1;
        $arr[2] = 2;
        for ($i = 3; $i <= $n; $i++) {
            $arr[$i] = $arr[$i - 1] + $arr[$i - 2];//状态转移
        }
        return $arr[$n];
    }
}
//leetcode submit region end(Prohibit modification and deletion)
