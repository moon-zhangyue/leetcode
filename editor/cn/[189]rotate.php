<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/2 10:23
 * Module: [189]rotate.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $k
     *
     * @return Array
     */
    function rotate(&$nums, $k)
    {
        $k %= count($nums);

        $this->reverse($nums, 0, count($nums) - 1);
        $this->reverse($nums, 0, $k - 1);
        $this->reverse($nums, $k, count($nums) - 1);

        return $nums;
    }


    function reverse($nums, $start, $end)
    {
        while ($start < $end) {
            $temp         = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end]   = $temp;

            $start += 1;
            $end   -= 1;
        }

        return $nums;
    }
}

$nums  = [1, 2, 3, 4, 5, 6, 7];
$k     = 3;
$class = new Solution();
var_dump($class->rotate($nums, $k));