<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/2 15:41
 * Module: [506]findRelativeRanks.php
 */

class Solution
{

    /**
     * @param Integer[] $score
     *
     * @return String[]
     */
    function findRelativeRanks($score)
    {
        $arr = array_flip($score);
        rsort($score);

        $ans = [];
        foreach ($score as $key => $value) {
            if ($key == 0) { //Gold Medal
                $ans[$arr[$value]] = 'Gold Medal';
            } elseif ($key == 1) { //Silver Medal
                $ans[$arr[$value]] = 'Silver Medal';
            } elseif ($key == 2) { //Bronze Medal
                $ans[$arr[$value]] = 'Bronze Medal';
            } else {
                $ans[$arr[$value]] = (string)($key + 1);
            }
        }

        ksort($ans);

        return $ans;
    }
}

$score = [10, 3, 8, 9, 4];
$class = new Solution();
var_dump($class->findRelativeRanks($score));