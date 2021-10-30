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
        $arr = [];
        foreach ($nums as $k => $v) {
            if (!array_key_exists($v, $arr)) {
                $arr[$v] = 1;
            } else {
                $arr[$v] = 2;
            }
        }

        $res = [];

        foreach ($arr as $key => $item) {
            if ($item == 1) {
                array_push($res, $key);
            }
        }

        return $res;
    }
}

$nums  = [1, 2, 1, 3, 2, 5];
$class = new Solution();
var_dump($class->singleNumber($nums));