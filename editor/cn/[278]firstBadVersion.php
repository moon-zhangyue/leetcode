<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/11 9:17
 * Module: [278]firstBadVersion.php
 */
class Solution extends VersionControl
{
    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function firstBadVersion(int $n)
    {
        $start = 1;
        $end   = $n;

        while ($start < $end) {
            $mid = $start + ($end - $start) / 2;

            if ($this->isBadVersion($mid)) {// 答案在区间 [left, mid] 中
                $end = $mid;
            } else {
                $start = $mid++; // 答案在区间 [mid+1, right] 中
            }
        }

        return $start;  // 此时有 left == right，区间缩为一个点，即为答案
    }
}