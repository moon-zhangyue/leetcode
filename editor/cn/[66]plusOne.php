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
    }

}

$nums  = [7, 2, 8, 5, 0, 9, 1, 2, 9, 5, 3, 6, 6, 7, 3, 2, 8, 4, 3, 7, 9, 5, 7, 7, 4, 7, 4, 9, 4, 7, 0, 1, 1, 1, 7, 4, 0, 0, 6];
$nums  = [1, 3, 4, 9, 9];
$class = new Solution();
var_dump($class->plusOne($nums));