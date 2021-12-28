<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/28 9:05
 * Module: [118]generate.php
 */

class Solution
{

    /**
     * @param Integer $numRows
     *
     * @return Integer[][]
     */
    function generate($numRows)
    {
        $array = [];
        for ($i = 0; $i < $numRows; $i++) {
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

        return $array;
    }
}

$numRows = 1;
$class   = new Solution();
var_dump($class->generate($numRows));