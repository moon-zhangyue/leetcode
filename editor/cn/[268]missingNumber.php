<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/9 11:25
 * Module: [258]missingNumber.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function missingNumber(array $nums)
    {
        $len = count($nums);

        for ($i = 0; $i < count($nums); $i++) {
            $len ^= ($i ^ $nums[$i]);
        }

        return $len;
    }
}

$nums  = [8, 6, 4, 2, 3, 5, 7, 0, 1];
$class = new Solution();
var_dump($class->missingNumber($nums));