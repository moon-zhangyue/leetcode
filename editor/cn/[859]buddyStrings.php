<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/23 8:46
 * Module: [859]buddyStrings.php
 */

class Solution
{

    /**
     * @param String $s
     * @param String $goal
     *
     * @return Boolean
     */
    function buddyStrings(string $s, string $goal): bool
    {
        if (strlen($s) != strlen($goal)) {
            return false;
        }

        //存字符出现次数
        $arr = [];
        //A与B不同的字符
        $s_diff    = [];
        $goal_diff = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] != $goal[$i]) {
                array_push($s_diff, $s[$i]);
                array_push($goal_diff, $goal[$i]);
            }
            $arr[$s[$i]] = isset($arr[$s[$i]]) ? $arr[$s[$i]] + 1 : 1;
        }
        //A与B相同
        if (empty($s_diff)) {
            //有某个字符 >= 2,只用直接调换相同的2个数就可
            if (max($arr) >= 2) {
                return true;
            } else {
                return false;
            }
        } elseif (count($s_diff) == 2) {
            //AB不同且不同的个数 == 2，则排序比较是否相同
            sort($goal_diff);
            sort($s_diff);
            if ($s_diff == $goal_diff) {
                return true;
            }
        }
        return false;
    }
}

$s     = "aaaaaaabc";
$goal  = "aaaaaaacb";
$class = new Solution();
var_dump($class->buddyStrings($s, $goal));