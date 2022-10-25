<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/10/25 8:39
 * Module: [796]rotateString.php
 */

class Solution
{

    /**
     * @param String $s
     * @param String $goal
     *
     * @return Boolean
     */
    function rotateString($s, $goal)
    {
        if (strlen($s) != strlen($goal)) {
            return false;
        }
        if (strstr($s . $s, $goal)) {
            return true;
        }
        return false;
    }
}