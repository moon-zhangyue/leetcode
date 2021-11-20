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
        sort($nums);
        $left = 0;
        $res  = 0;

        for ($i = 0; $i < count($nums); $i++) {
            while ($nums[$i] - $nums[$left] > 1) {
                $left++;
            }
            if ($nums[$i] - $nums[$left] === 1) {
                $res = max($res, $i - $left + 1);
            }
        }

        return $res;
    }
}

$nums  = [1, 3, 2, 2, 5, 2, 3, 7];
$class = new Solution();
var_dump($class->findLHS($nums));