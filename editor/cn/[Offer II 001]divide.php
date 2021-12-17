<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/17 8:56
 * Module: [Offer 001]divide.php
 */
class Solution
{

    /**
     * @param Integer $a
     * @param Integer $b
     *
     * @return Integer
     */
    function divide(int $a, int $b): int
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

$a     = 7;
$b     = -3;
$a     = -2147483648;
$b     = -1;
$class = new Solution();
var_dump($class->divide($a, $b));