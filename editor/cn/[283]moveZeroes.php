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
        $left  = 0;
        foreach ($nums as $right => $v) {
            if ($v) {
                if ($nums[$left] == 0) {
                    list($nums[$right], $nums[$left]) = array($nums[$left], $v);
                }
                $left++;
            }
        }
    }
}

$nums  = [0, 1, 0, 3, 12];
$class = new Solution();
var_dump($class->moveZeroes($nums));