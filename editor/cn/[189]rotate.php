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
        $len = count($nums);
        if (0 == ($k %= $len)) {
            return $nums;
        }
        for($i=0;)

    }

}

$nums  = [1, 2, 3, 4, 5, 6, 7];
$k     = 3;
$class = new Solution();
var_dump($class->rotate($nums, $k));