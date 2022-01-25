<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/25 10:30
 * Module: [1688]numberOfMatches.php
 * 快乐存心底❤
 */

class Solution
{
    private $time;

    /**
     * @param Integer $n
     * @return Integer
     */
    function numberOfMatches($n)
    {
        if ($n <= 2) {
            $this->time += 1;
        } else {
            if ($n % 2 == 0) {//偶数
                $this->time = $this->time + ($n / 2);

                $this->numberOfMatches($n / 2);
            } else {
                $this->time = $this->time + floor($n / 2); //包含一只轮空队伍

                $this->numberOfMatches(ceil($n / 2));
            }
        }


        return (int)$this->time;
    }
}

$n     = 7;
$class = new Solution();
var_dump($class->numberOfMatches($n));