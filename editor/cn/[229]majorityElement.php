<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/22 9:26
 * Module: [229]majorityElement.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function majorityElement(array $nums)
    {
        $num = count($nums) / 3;
        $res = [];
        $arr = array_count_values($nums);
        foreach ($arr as $k => $v) {
            if ($v > $num) {
                array_push($res, $k);
            }
        }

        return $res;
    }
}

$nums  = [1, 1, 1, 3, 3, 2, 2, 2];
//$nums  = [3, 2, 3];
$class = new Solution();
var_dump($class->majorityElement($nums));