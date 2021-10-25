<?php
//编写一个高效的算法来搜索 m x n 矩阵 matrix 中的一个目标值 target 。该矩阵具有以下特性： 
//
// 
// 每行的元素从左到右升序排列。 
// 每列的元素从上到下升序排列。 
// 
//
// 
//
// 示例 1： 
//
// 
//输入：matrix = [[1,4,7,11,15],[2,5,8,12,19],[3,6,9,16,22],[10,13,14,17,24],[18,21
//,23,26,30]], target = 5
//输出：true
// 
//
// 示例 2： 
//
// 
//输入：matrix = [[1,4,7,11,15],[2,5,8,12,19],[3,6,9,16,22],[10,13,14,17,24],[18,21
//,23,26,30]], target = 20
//输出：false
// 
//
// 
//
// 提示： 
//
// 
// m == matrix.length 
// n == matrix[i].length 
// 1 <= n, m <= 300 
// -10⁹ <= matrix[i][j] <= 10⁹ 
// 每行的所有元素从左到右升序排列 
// 每列的所有元素从上到下升序排列 
// -10⁹ <= target <= 10⁹ 
// 
// Related Topics 数组 二分查找 分治 矩阵 👍 769 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer     $target
     *
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        //一 暴力查找
        foreach ($matrix as $k => $v) {
            foreach ($v as $key => $value) {
                if ($value == $target) {
                    return true;
                }
            }
        }
        return false;

        foreach ($matrix as $value) {
            if (in_array($target, $value)) {
                return true;
            }
        }
        return false;

        //二 二分查找
        foreach ($matrix as $val) {
            $index = $this->search($val, $target);
            if ($index >= 0) {
                return true;
            }
        }
        return false;
    }

    function search($nums, $target)
    {
        $min = 0;
        $max = count($nums) - 1;

        while ($min <= $max) {
            $mid = floor(($max - $min) / 2) + $min;
            $num = $nums[$mid];

            if ($num === $target) {
                return $mid;
            } else if ($num > $target) {
                $max = $mid - 1;
            } else {
                $min = $mid + 1;
            }
        }
        return -1;

    }
}
//leetcode submit region end(Prohibit modification and deletion)
