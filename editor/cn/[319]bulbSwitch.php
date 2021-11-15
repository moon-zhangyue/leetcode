<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/15 9:18
 * Module: [319]bulbSwitch.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function bulbSwitch($n)
    {
        return floor(sqrt($n + 0.5));
    }
}