<?php
//给定一个非负整数 numRows，生成「杨辉三角」的前 numRows 行。 
//
// 在「杨辉三角」中，每个数是它左上方和右上方的数的和。 
//
// 
//
// 
//
// 示例 1: 
//
// 
//输入: numRows = 5
//输出: [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]
// 
//
// 示例 2: 
//
// 
//输入: numRows = 1
//输出: [[1]]
// 
//
// 
//
// 提示: 
//
// 
// 1 <= numRows <= 30 
// 
// Related Topics 数组 动态规划 👍 652 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $numRows
     *
     * @return Integer[][]
     */
    function generate($numRows)
    {
        //动态规划
        $array = [];
        for ($i = 0; $i < $numRows; $i++) {
            $arr = [];
            for ($j = 0; $j < $i + 1; $j++) {
                if ($i == 0) {
                    $arr = [1];
                } else {
                    $left  = isset($array[$i - 1][$j - 1]) ? $array[$i - 1][$j - 1] : 0; //左上角
                    $right = isset($array[$i - 1][$j]) ? $array[$i - 1][$j] : 0; //右上角
                    array_push($arr, $left + $right);
                }
            }

            $array[$i] = $arr;
        }

        return $array;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
