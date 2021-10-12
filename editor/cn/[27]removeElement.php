<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/12 16:22
 * Module: [27]removeElement.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $val
     *
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        foreach ($nums as $k => $v) {
            if ($v == $val) {
                unset($nums[$k]);
            }
        }
        return count($nums);
    }
}