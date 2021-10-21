<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/21 9:51
 * Module: [66]plusOne.php
 */

class Solution
{

    /**
     * @param Integer[] $digits
     *
     * @return Integer[]
     */
    function plusOne($digits)
    {
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

$nums  = [7, 2, 8, 5, 0, 9, 1, 2, 9, 5, 3, 6, 6, 7, 3, 2, 8, 4, 3, 7, 9, 5, 7, 7, 4, 7, 4, 9, 4, 7, 0, 1, 1, 1, 7, 4, 0, 0, 6];
$nums  = [1, 3, 4, 9, 9];
$class = new Solution();
var_dump($class->plusOne($nums));