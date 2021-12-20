<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/20 下午6:22
 * Module: [Offer II 081]combinationSum.php
 * Please No Garbage Code!
 */
class Solution
{
    protected $result = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
        if ($target <= 0) return [];
        sort($candidates);
        $this->combine($candidates, $target, [], 0);
        return $this->result;
    }

    private function combine($nums, $target, $list, $start)
    {
        // terminator
        if ($target < 0) return;
        if ($target == 0) {
            $this->result[] = $list;
            return;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            // 由于数字是排好序的，所以可以进行剪枝
            if ($target - $nums[$i] < 0) break;
            $list[] = $nums[$i];
            // 数字可重复使用
            $this->combine($nums, $target - $nums[$i], $list, $i);
            // 回溯
            array_pop($list);
        }
    }
}