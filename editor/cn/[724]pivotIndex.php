<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/19 下午3:47
 * Module: pivotIndex.php
 * Please No Garbage Code!
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex(array $nums): int
    {
        $left  = 0;
        $right = array_sum($nums);
        for ($i = 0; $i < count($nums); $i++) {
            if ($i != 0) {
                $left = $left + $nums[$i - 1];
            }

            $right = $right - $nums[$i];
            if ($left === $right) {
                return $i;
            }
        }
        return -1;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
$nums = [1, 7, 3, 6, 5, 6];
$nums  = [2, 1, -1];
$class = new Solution();
var_dump($class->pivotIndex($nums));