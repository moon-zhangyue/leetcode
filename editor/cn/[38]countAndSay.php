<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/15 10:28
 * Module: [38]countAndSay.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return String
     */
    function countAndSay($n)
    {
        $str = '1';
        for ($i = 2; $i <= $n; $i++) {
            $sb    = [];
            $start = 0;//起始位置
            $pos   = 0;//

            while ($pos < strlen($str)) {
                //开始统计每一个数字重复次数的起始-重点位置
                while ($pos < strlen($str) && $str[$pos] === $str[$start]) {
                    $pos++;
                }
                //($pos - $start)--该数字重复的次数,$str{$start}--该数字
                array_push($sb, ($pos - $start) . $str{$start});
                $start = $pos;//数字变化位置,重新开始统计下一个数字
            }
            $str = (string)implode('', $sb);
        }

        return $str;
    }
}

$class = new Solution();
var_dump($class->countAndSay(5));