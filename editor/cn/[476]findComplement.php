<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/18 10:24
 * Module: [476]findComplement.php
 */
class Solution
{

    /**
     * @param Integer $num
     *
     * @return Integer
     */
    function findComplement($num)
    {
        return pow(2, strlen(decbin($num))) - 1 - $num;
    }
}

$class = new Solution();
var_dump($class->findComplement(20161211));