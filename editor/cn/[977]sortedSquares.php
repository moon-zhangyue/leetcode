<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/11 9:47
 * Module: [977]sortedSquares.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function sortedSquares(array $nums)
    {
        //双指针
        $len = count($nums);

        $i = 0;
        $j = $pos = $len - 1;

        while ($i <= $j) {
            $i_sq = pow($nums[$i], 2); //$i ** 2;
            $j_sq = pow($nums[$j], 2);

            if ($i_sq < $j_sq) {
                $arr[$pos] = $j_sq;
                $j--;
            } else {
                $arr[$pos] = $i_sq;
                $i++;
            }
            $pos--;
        }
        return $arr;
    }
}

$nums  = [-4, -1, 0, 3, 5];
$class = new Solution();
var_dump($class->sortedSquares($nums));