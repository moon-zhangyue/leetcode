<?php
//给定一个数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。 
//
// candidates 中的每个数字在每个组合中只能使用一次。 
//
// 注意：解集不能包含重复的组合。 
//
// 
//
// 示例 1: 
//
// 
//输入: candidates = [10,1,2,7,6,1,5], target = 8,
//输出:
//[
//[1,1,6],
//[1,2,5],
//[1,7],
//[2,6]
//] 
//
// 示例 2: 
//
// 
//输入: candidates = [2,5,2,1,2], target = 5,
//输出:
//[
//[1,2,2],
//[5]
//] 
//
// 
//
// 提示: 
//
// 
// 1 <= candidates.length <= 100 
// 1 <= candidates[i] <= 50 
// 1 <= target <= 30 
// 
// Related Topics 数组 回溯 👍 770 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    protected $result = [];

    /**
     * @param Integer[] $candidates
     * @param Integer   $target
     *
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target)
    {
        if ($target <= 0) return [];
        sort($candidates);
        $this->combine($candidates, $target, [], 0);
        return $this->result;
    }

    private function combine($nums, $target, $list, $start)
    {
        // terminator
        if ($target < 0) return;
        if ($target == 0) {
            $this->result[] = $list;
            return;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            // 第一次剪枝，因为数组排好序了，小的数字都得不到结果，大的数字就没有必要计算了
            if ($target - $nums[$i] < 0) break;
            // 第二次剪枝，如示例 [1,1,2,5,6]，遍历到第二个分支时，[1,2], [1,5], [1,6], [1,2,5], [1,2,6], [1,5,6]
            // 这样的子树下的所有情况在第一次遍历时都已覆盖，无需再重复计算
            if ($i > $start) {
                if ($nums[$i] == $nums[$i - 1]) continue;
            }
            $list[] = $nums[$i];
            $this->combine($nums, $target - $nums[$i], $list, $i + 1);
            array_pop($list);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
