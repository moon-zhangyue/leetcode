<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/25 9:09
 * Module: searchMatrix.php
 */

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer     $target
     *
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        $m = count($matrix); //行
        $n = count($matrix[0]); //列

        $x = 0; //初始第一行
        $y = $n - 1; //最后一列

        while ($x < $m && $y >= 0) {
            if ($matrix[$x][$y] === $target) {
                return true;
            } elseif ($matrix[$x][$y] > $target) {//左移一列
                $y--;
            } else { //下移一行;
                $x++;
            }
        }
        return false;
    }
}

$matrix = [[1, 4, 7, 11, 15], [2, 5, 8, 12, 19], [3, 6, 9, 16, 22], [10, 13, 14, 17, 24], [18, 21, 23, 26, 30]];
$target = 22;
$class  = new Solution();
var_dump($class->searchMatrix($matrix, $target));