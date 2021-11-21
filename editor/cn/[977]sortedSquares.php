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
    function sortedSquares(array $nums): int
    {
        //双指针
        $len = count($nums);

        $i = 0;
        $j = $pos = $len - 1;

        while ($i <= $j) {
            if (pow($nums[$i], 2) < pow($nums[$j], 2)) {
                $arr[$pos] = pow($nums[$j], 2);
                $j--;
            } else {
                $arr[$pos] = pow($nums[$i], 2);
                $i++;
            }
            $pos--;
        }
        sort($arr);
        return $arr;
    }
}

$nums  = [-4, -1, 0, 3, 5];
$class = new Solution();
var_dump($class->sortedSquares($nums));