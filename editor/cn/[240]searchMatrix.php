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
        foreach ($matrix as $k => $v) {
            foreach ($v as $key => $value) {
                if ($value == $target) {
                    return true;
                }
            }
        }
        return false;
    }
}

$matrix = [[1, 4, 7, 11, 15], [2, 5, 8, 12, 19], [3, 6, 9, 16, 22], [10, 13, 14, 17, 24], [18, 21, 23, 26, 30]];
$target = 23;
$class  = new Solution();
var_dump($class->searchMatrix($matrix, $target));