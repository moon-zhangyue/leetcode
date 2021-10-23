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
        $tmp = $num;
        $int = 0;

        while ($tmp) {
            $int = ($int << 1) + 1;
            $tmp >>= 1;
        }

        return $int ^ $num;
    }
}

$class = new Solution();
var_dump($class->findComplement(20161211));