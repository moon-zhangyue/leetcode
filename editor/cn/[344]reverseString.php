<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/12 10:56
 * Module: [344]reverseString.php
 */

class Solution
{

    /**
     * @param String[] $s
     *
     * @return NULL
     */
    function reverseString(&$s)
    {
        $i = 0;
        $j = count($s) - 1;
        while ($i < $j) {
            $ex    = $s[$i];
            $s[$i] = $s[$j];
            $s[$j] = $ex;

            $i++;
            $j--;
        }

        return $s;
    }
}
$s     = ["h", "e", "l", "l", "o"];
$class = new Solution();
var_dump($class->reverseString($s));
