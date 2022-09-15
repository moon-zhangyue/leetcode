<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/11 9:18
 * Module: [119]getRow.php
 * 快乐存心底❤
 */

class Solution
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex)
    {
        //动态规划
        $array = [];
        for ($i = 0; $i < $rowIndex + 1; $i++) {
            $arr = [];
            for ($j = 0; $j < $i + 1; $j++) {
                if ($i == 0) {
                    $arr = [1];
                } else {
                    $left  = isset($array[$i - 1][$j - 1]) ? $array[$i - 1][$j - 1] : 0; //左上角
                    $right = isset($array[$i - 1][$j]) ? $array[$i - 1][$j] : 0; //右上角
                    array_push($arr, $left + $right);
                }
            }

            $array[$i] = $arr;
        }

        return $array[$rowIndex];
    }
}

$rowIndex = 3;
$class    = new Solution();
var_dump($class->getRow($rowIndex));