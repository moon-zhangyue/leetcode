<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/9/14 20:41
 * Module: [1619]trimMean.php
 */

class Solution
{

    /**
     * @param Integer[] $arr
     *
     * @return Float
     */
    function trimMean($arr)
    {
        sort($arr);
        $len = count($arr);
        $key = round($len * 0.05);

        return array_sum(array_slice(array_slice($arr, $key), 0, -$key)) / ($len - $key * 2);
    }
}

$arr = [1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3];
$arr = [6, 2, 7, 5, 1, 2, 0, 3, 10, 2, 5, 0, 5, 5, 0, 8, 7, 6, 8, 0];
$arr = [6, 0, 7, 0, 7, 5, 7, 8, 3, 4, 0, 7, 8, 1, 6, 8, 1, 1, 2, 4, 8, 1, 9, 5, 4, 3, 8, 5, 10, 8, 6, 6, 1, 0, 6, 10, 8, 2, 3, 4];

$class = new Solution();
var_dump($class->trimMean($arr));