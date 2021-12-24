<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/24 8:53
 * Module: [137]singleNumber.php
 */
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function singleNumber($nums)
    {
        //最终的结果值
        $res = 0;
        //X64系统 int类型有64位，统计每一位1的个数
        for ($i = 0; $i < 64; $i++) {
            //统计第i位中1的个数
            $oneCount = 0;
            for ($j = 0; $j < count($nums); $j++) {
                $oneCount += ($nums[$j] >> $i) & 1;
            }
            //如果1的个数不是3的倍数，说明那个只出现一次的数的二进制位中在这一位是1
            if ($oneCount % 3 == 1)
                $res |= 1 << $i;
        }
        return $res;
    }
}

$nums = [0, 1, 0, 1, 0, 1, 99];
//$nums  = [-2,-2,1,1,4,1,4,4,-4,-2];
$class = new Solution();
var_dump($class->singleNumber($nums));