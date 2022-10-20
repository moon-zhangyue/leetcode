<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/10/20 14:28
 * Module: [292]canWinNim.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return Boolean
     */
    function canWinNim($n)
    {
        return $n % 4 != 0;
    }
}

$n     = 10;
$class = new Solution();
var_dump($class->canWinNim($n));