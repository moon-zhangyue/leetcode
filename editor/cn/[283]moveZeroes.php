<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/12 8:45
 * Module: [283]moveZeroes.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return NULL
     */
    function moveZeroes(array &$nums): array
    {
        foreach ($nums as $k => $v) {
            if ($v === 0) {
                array_push($nums, 0);
                unset($nums[$k]);
            }
        }

        return $nums;
    }
}

$nums  = [0, 1, 0, 3, 12];
$class = new Solution();
var_dump($class->moveZeroes($nums));