<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/18 10:30
 * Module: [70]climbStairs.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function climbStairs($n)
    {
        $dp=[];//状态转移数组，n是正整数，所以没有dp[0]
        $dp[1]=1;
        $dp[2]=2;
        for($i=3;$i<=$n;$i++){
            $dp[$i]=$dp[$i-1]+$dp[$i-2];//状态转移
        }
        return $dp[$n];
    }
}

$n     = 10;
$class = new Solution();
var_dump($class->climbStairs($n));