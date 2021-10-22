<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/22 9:26
 * Module: [229]majorityElement.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function majorityElement(array $nums)
    {
        //摩尔投票法
        /* 时间复杂度：O(n)O(n)，其中 nn 为数组的长度。
空间复杂度：O(1)O(1)，只需要常数个元素用来存储关键元素和统计次数即可。*/
        $element1 = 0;
        $element2 = 0;
        $vote1    = 0;
        $vote2    = 0;

        foreach ($nums as $num) {
            if ($vote1 > 0 && $num === $element1) { //如果该元素为第一个元素，则计数加1
                $vote1++;
            } elseif ($vote2 > 0 && $num === $element2) { //如果该元素为第二个元素，则计数加1
                $vote2++;
            } elseif ($vote1 === 0) { // 选择第一个元素
                $element1 = $num;
                $vote1++;
            } elseif ($vote2 === 0) { // 选择第二个元素
                $element2 = $num;
                $vote2++;
            } else { //如果三个元素均不相同，则相互抵消1次
                $vote1--;
                $vote2--;
            }
        }

        $cnt1 = 0;
        $cnt2 = 0;
        foreach ($nums as $num) {
            if ($vote1 > 0 && $num === $element1) {
                $cnt1++;
            }
            if ($vote2 > 0 && $num === $element2) {
                $cnt2++;
            }
        }

        // 检测元素出现的次数是否满足要求
        $ans = [];
        if ($vote1 > 0 && $cnt1 > count($nums) / 3) {
            array_push($ans, $element1);
        }
        if ($vote2 > 0 && $cnt2 > count($nums) / 3) {
            array_push($ans, $element2);
        }

        return $ans;
    }
}

//$nums = [1, 1, 1, 3, 3, 2, 2, 2];
$nums  = [3, 2, 3];
$class = new Solution();
var_dump($class->majorityElement($nums));