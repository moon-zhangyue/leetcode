<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/23 15:46
 * Module: constructRectangle.php
 */

class Solution
{

    /**
     * @param Integer $area
     *
     * @return Integer[]
     */
    function constructRectangle(int $area)
    {
        $w = floor(sqrt($area));

        while ($area % $w !== 0) {
            $w--;
        }

        return [floor($area / $w), $w];
    }
}

$area  = 10;
$class = new Solution();
var_dump($class->constructRectangle($area));