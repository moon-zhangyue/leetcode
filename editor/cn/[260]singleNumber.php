<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/30 11:17
 * Module: [260]singleNumber.php
 */


class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function singleNumber($nums)
    {
        for ($i=0, $a = 0;$i<count($nums);$i++) {
            $a ^= $nums[$i];
        }
        return $a;
    }
}

$nums  = [1, 2, 1, 3, 2, 5];
$class = new Solution();
var_dump($class->singleNumber($nums));