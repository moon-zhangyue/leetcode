<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/19 9:41
 * Module: maxSubArray.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $n   = sizeof($nums);
        $tmp = 0;
        $max = $nums[0];
        for ($i = 0; $i < $n; $i++) {
            $tmp += $nums[$i];
            if ($tmp < $nums[$i]) {
                $tmp = $nums[$i];
            }
            if ($max < $tmp) {
                $max = $tmp;
            }
        }
        return $max;
    }
}

$nums  = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$class = new Solution();
var_dump($class->maxSubArray($nums));