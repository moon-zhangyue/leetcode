<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/22 14:05
 * Module: [40]combinationSum2.php
 */

class Solution
{
    protected $result = [];

    /**
     * @param Integer[] $candidates
     * @param Integer   $target
     *
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target)
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
            sort($list);
            if (!in_array($list, $this->result)) {
                $this->result[] = $list;
            }

            return;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            // 由于数字是排好序的，所以可以进行剪枝
            if ($target - $nums[$i] < 0) break;
            $list[] = $nums[$i];
            // 数字可重复使用
            $this->combine($nums, $target - $nums[$i], $list, $i);
            // 回溯
            array_pop($list);//将当前最后添加的数弹出
        }
    }
}

$candidates = [10, 1, 2, 7, 6, 1, 5];
$target     = 8;
$class      = new Solution();
echo '<pre/>';
print_r($class->combinationSum2($candidates, $target));
