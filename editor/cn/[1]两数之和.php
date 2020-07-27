<?php
//给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。 
//
// 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。 
//
// 
//
// 示例: 
//
// 给定 nums = [2, 7, 11, 15], target = 9
//
//因为 nums[0] + nums[1] = 2 + 7 = 9
//所以返回 [0, 1]
// 
// Related Topics 数组 哈希表 
// 👍 8584 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {

        if (!is_array($nums)) {
            return false;
        }
        if (!is_int($target)) {
            return false;
        }
        foreach ($nums as $key => $val) {
            foreach ($nums as $k => $v) {
                if ($val + $v == $target && $key != $k) {
                    return [$key, $k];
                }
            }
        }
    }
}

$nums   = [3, 2, 4];
$target = 6;

$model = new Solution();
$res   = $model->twoSum($nums, $target);
var_dump($res);

//leetcode submit region end(Prohibit modification and deletion)
