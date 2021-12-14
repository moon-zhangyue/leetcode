<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/14 10:31
 * Module: [338]countBits.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer[]
     */
    function countBits($n)
    {
        $ans = range(0, $n);
        for ($i = 0; $i <= $n; $i++) {
            if ($i % 2 == 0)
                $ans[$i] = (int)$ans[$i / 2];
            else
                $ans[$i] = (int)$ans[$i / 2] + 1;
        }
        return $ans;
    }
}

$n     = 5;
$class = new Solution();
var_dump($class->countBits($n));