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
        //PHP超时
//        if ($a == PHP_INT_MIN && $b === -1) {//最大整数值  64位不可以用
//            return PHP_INT_MAX;
//        }
        if ($a == -2147483648 && $b === -1) {//最大整数值  64位不可以用
            return 2147483647;
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
}

$a     = 7;
$b     = -3;
$a     = -2147483648;
$b     = -1;
$a     = 2147483647;
$b     = 1;
$class = new Solution();
var_dump($class->divide($a, $b));