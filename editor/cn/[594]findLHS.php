<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/20 10:33
 * Module: [594]findLHS.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function findLHS($nums)
    {
        $arr = array_count_values($nums);

        $res = 0;
        foreach ($arr as $k => $v) {
            if (array_key_exists($k + 1, $arr)) { //存在是当前k+1的 键
                $res = max($res, $v + $arr[$k + 1]);
            }
        }

        return $res;
    }
}

$nums  = [1, 3, 2, 2, 5, 2, 3, 7];
$class = new Solution();
var_dump($class->findLHS($nums));