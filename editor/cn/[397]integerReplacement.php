<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/19 13:02
 * Module: [397]integerReplacement.php
 */

class Solution
{
    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function integerReplacement($n)
    {
        $res = 0;

        while ($n !== 1) {
            if ($n % 2 === 0) {
                $res++;
                $n = $n / 2;
            } elseif ($n % 4 === 1) {
                $res += 2;
                $n   = floor($n / 2);
            } else {
                if ($n === 3) {
                    $res += 2;
                    $n   = 1;
                } else {
                    $res += 2;
                    $n   = floor($n / 2) + 1;
                }
            }

        }

        return $res;
    }
}

$n     = 65535;
$class = new Solution();
var_dump($class->integerReplacement($n));
