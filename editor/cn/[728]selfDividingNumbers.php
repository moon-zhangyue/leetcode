<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/10/26 9:09
 * Module: [728]selfDividingNumbers.php
 */
class Solution
{

    /*
     * 遍历范围 [left,right] 内的所有整数，分别判断每个整数是否为自除数。

根据自除数的定义，如果一个整数不包含 00 且能被它包含的每一位数整除，则该整数是自除数。判断一个整数是否为自除数的方法是遍历整数的每一位，判断每一位数是否为 00 以及是否可以整除该整数。

遍历整数的每一位的方法是，每次将当前整数对 1010 取模即可得到当前整数的最后一位，然后将整数除以 1010。重复该操作，直到当前整数变成 00 时即遍历了整数的每一位。
     * */
    /**
     * @param Integer $left
     * @param Integer $right
     *
     * @return Integer[]
     */
    function selfDividingNumbers($left, $right)
    {
        $ans = [];
        for ($i = $left; $i <= $right; $i++) {
            if ($this->isSelfDividing($i)) {
                array_push($ans, $i);
            }
        }

        return $ans;
    }

    function isSelfDividing($num)
    {
        $temp = $num;
        while ($temp > 0) {
            $digit = $temp % 10;
            if ($digit === 0 || $num % $digit != 0) {
                return false;
            }
            $temp = floor($temp / 10);
        }

        return true;
    }
}

$left  = 1;
$right = 22;
$class = new Solution();
var_dump($class->selfDividingNumbers($left, $right));