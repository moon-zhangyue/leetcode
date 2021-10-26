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
        $stack    = new SplStack();
        $nums2Len = sizeof($nums2);

        $arr = [];//保存nums2数组的next greater数组
        for ($i = $nums2Len - 1; $i >= 0; $i--) {//从后往前迭代
            while (!$stack->isEmpty() && $stack->top() <= $nums2[$i]) {
                $stack->pop();//出栈
            }
            $arr[$nums2[$i]] = $stack->isEmpty() ? -1 : $stack->top();//技巧，直接用值当键，因为题目说了没有重复元素，这样后面可以用O（1）的时间复杂度找到每个nums1数组元素对应的数据
            $stack->push($nums2[$i]);//入栈
        }

        $ret = [];//保存返回结果
        foreach ($nums1 as $v) {
            $ret[] = $arr[$v];
        }

        return $ret;
    }
}

$nums1 = [4, 1, 2];
$nums2 = [1, 3, 4, 2];
$class = new Solution();
var_dump($class->nextGreaterElement($nums1, $nums2));