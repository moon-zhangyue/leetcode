<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/10 9:11
 * Module: [169]majorityElement.php
 */


class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function majorityElement(array $nums): int
    {
        $mid = count($nums) / 2;

        $arr = array_count_values($nums);

        foreach ($arr as $key => $value) {
            if ($value > $mid) {
                return $key;
            }
        }
    }
}

$nums  = [2, 2, 1, 1, 1, 2, 2];
$class = new Solution();
var_dump($class->majorityElement($nums));