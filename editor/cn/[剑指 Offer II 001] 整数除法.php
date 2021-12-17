<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/17 8:55
 * Module: [剑指 Offer II 001] 整数除法.php
 */


class Solution
{
//（凡是 不能用乘除法，或者要求优化 乘除法的性能问题，都可以优先考虑 位运算）
    /**
     * @param Integer $a
     * @param Integer $b
     *
     * @return Integer
     */
    function divide(int $a, int $b): int
    {
        /*
         * 一个很直观的想法是基于减法实现除法。例如，为了求 19/2 可以从 19 中不断减去 2，那么减去 9 个 2 以后就剩下 1，可以得到 19/2 = 9，但是效率很低，当被除数是 n,除数是 1 的时候，算法复杂度最差为 O(n)。如果将上述解法做一些调整，当被除数大于除数时，继续判断是不是大于除数的 2 倍？ 4 倍？ 8 倍？....如果被除数大于除数的 2^k 倍，那么将被除数减去除数的 2^ k 倍，之后再重复以上步骤。

举个例子 19/2，19 大于 2，也大于 4 (2 * 2 ^ (1))，也大于 8 (2 * 2 ^ (2))，也大于 16 (2 * 2 ^ (3))，但是小于 32 (2 * 2 ^ (4))，于是将 19 - 16 得到 3，并记录此时的答案 8，此时被除数变为 3，除数还是 2，重复上述结果得到此时答案为 1，剩下被除数 1，已经小于 2，最终结果为 8 + 1 = 9。算法复杂度为 O(logn)。

上述分析过程都是基于被除数和除数都是正整数，如果存在负整数则可以将他们先转化为正整数进行计算，最后根据符号调整结果。但是对于 32 位 int 来讲，最大的正数为 2^31-1,最小的负数为 -2^31,如果将负数转化为正数会溢出，所以可以将正数都转化为负数计算，核心部分就是对两个负数进行除法，返回的结果可以用无符号数返回，最后进行正负号调整。另外所有的结果中存在一种情况无法用 int 表示结果，那就是被除数为 -2^31，除数为 -1，这时候直接特殊判断输出 INT_MAX 就行。
         * */
        //PHP超时
        if ($a == PHP_INT_MAX && $b === -1) {//最大整数值
            return PHP_INT_MAX;
        }
        $negative = 2; //被除数
        if ($a > 0) {
            $negative--;
            $a = -$a;
        }
        if ($b > 0) {
            $negative--;
            $b = -$b;
        }
        $res = $this->divideCore($a, $b);
        return $negative == 1 ? -$res : $res;
    }

    function divideCore(int $a, int $b)
    {
        $ret = 0;
        // 注意a, b都是负数，所以a <= b就是还可以继续除
        while ($a <= $b) {
            $value = $b;
            $quo   = 1;
            while ($value >= 0xc0000000 && $a <= $value + $value) {
                $quo   += $quo;
                $value += $value;
            }
            $ret += $quo;
            $a   -= $value;
        }
        return $ret;
    }


    //位运算
    /*
     * 根据 两数 正负号，生成flag的值，以便结果的正负号处理
给 两数 取绝对值
剪枝，若 当前被除数 小于 当前除数，则返回0
循环计算 结果的绝对值
创建一个变量shift，记录 当前左移位数
若 当前除数 小于 当前被除数，一直左移 当前除数，直到 当前除数 大于等于 当前被除数
记录 当前shift的值，并根据当前shift的值，计算 下一轮循环中的 除数 和 被除数
根据计算的结果 和 flag，返回正确的结果
（凡是 不能用乘除法，或者要求优化 乘除法的性能问题，都可以优先考虑 位运算）
     * */
    function divides(int $a, int $b): int
    {
        if ($a == -2147483648 && $b == -1) { //此处不用PHP_INT_MIN和PHP_INT_MAX  因为是64位系统
            return 2147483647;
        }

        //判断是否同号，同号结果为正数
        $flag = false;
        if (($a < 0 && $b < 0) || ($a > 0 && $b > 0)) {
            $flag = true;
        }

        $dividend = $a > 0 ? -$a : $a; //被除数
        $divisor  = $b > 0 ? -$b : $b; //除数
        if ($dividend > $divisor) {
            return 0;
        }
        //计算结果的绝对值
        $res   = 0;
        $shift = 31;
        while ($dividend <= $divisor) {
            while ($dividend > $divisor << $shift) {
                $shift--;
            }
            $dividend -= $divisor << $shift;
            $res      += 1 << $shift;
        }

        return $flag ? $res : -$res;
    }
}