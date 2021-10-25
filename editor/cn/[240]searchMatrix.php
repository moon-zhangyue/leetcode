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
        foreach ($matrix as $val) {
            $index = $this->search($val, $target);
            if ($index >= 0) {
                return true;
            }
        }
        return false;
    }

    function search($nums, $target)
    {
        $min = 0;
        $max = count($nums) - 1;

        while ($min <= $max) {
            $mid = floor(($max - $min) / 2) + $min;
            $num = $nums[$mid];

            if ($num === $target) {
                return $mid;
            } else if ($num > $target) {
                $max = $mid - 1;
            } else {
                $min = $mid + 1;
            }
        }
        return -1;
    }
}

$matrix = [[1, 4, 7, 11, 15], [2, 5, 8, 12, 19], [3, 6, 9, 16, 22], [10, 13, 14, 17, 24], [18, 21, 23, 26, 30]];
$target = 132;
$class  = new Solution();
var_dump($class->searchMatrix($matrix, $target));