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
     * @param Integer $k
     *
     * @return Array
     */
    function rotate(&$nums, $k)
    {
        $nums = array_reverse($nums);
        $len  = count($nums);

        if ($len <= 1) {
            return $nums;
        }

        //然后分别移位0-（k-1）和k-end
        for ($i = 0, $r = $k - 1; $i < $r; $i++, $r--) {
            $tmp      = $nums[$i];
            $nums[$i] = $nums[$r];
            $nums[$r] = $tmp;
        }
        for ($l = $k, $r = $len - 1; $l < $r; $l++, $r--) {
            $tmp      = $nums[$l];
            $nums[$l] = $nums[$r];
            $nums[$r] = $tmp;
        }

        return $nums;
    }

}

$nums  = [1, 2, 3, 4, 5, 6, 7];
$k     = 3;
$class = new Solution();
var_dump($class->rotate($nums, $k));