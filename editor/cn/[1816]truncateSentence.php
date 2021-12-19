<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/6 9:07
 * Module: [1816]truncateSentence.php
 */

class Solution
{

    /**
     * @param String  $s
     * @param Integer $k
     *
     * @return String
     */
    function truncateSentence($s, $k)
    {
        return implode(' ', array_slice(explode(' ', $s), 0, $k));
    }
}

$s     = "What is the solution to this problem";
$k     = 4;
$class = new Solution();
var_dump($class->truncateSentence($s, $k));