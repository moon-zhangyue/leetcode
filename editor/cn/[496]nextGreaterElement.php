<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/26 8:43
 * Module: [496]nextGreaterElement.php
 */
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     *
     * @return Integer[]
     */
    function nextGreaterElement($nums1, $nums2)
    {
        $arr = [];
        for ($i = 0; $i < count($nums1); $i++) {
            $start = array_search($nums1[$i], $nums2);
            for ($j = $start; $j < count($nums2); $j++) {
                if ($nums2[$j] > $nums1[$i]) {
                    $arr[$i] = $nums2[$j];
                    break;
                } else {
                    $arr[$i] = -1;
                }
            }
        }

        return $arr;
    }
}

$nums1 = [4, 1, 2];
$nums2 = [1, 3, 4, 2];
$class = new Solution();
var_dump($class->nextGreaterElement($nums1, $nums2));