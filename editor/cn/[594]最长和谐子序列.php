<?php
//和谐数组是指一个数组里元素的最大值和最小值之间的差别 正好是 1 。 
//
// 现在，给你一个整数数组 nums ，请你在所有可能的子序列中找到最长的和谐子序列的长度。 
//
// 数组的子序列是一个由数组派生出来的序列，它可以通过删除一些元素或不删除元素、且不改变其余元素的顺序而得到。 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [1,3,2,2,5,2,3,7]
//输出：5
//解释：最长的和谐子序列是 [3,2,2,2,3]
// 
//
// 示例 2： 
//
// 
//输入：nums = [1,2,3,4]
//输出：2
// 
//
// 示例 3： 
//
// 
//输入：nums = [1,1,1,1]
//输出：0
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 2 * 10⁴ 
// -10⁹ <= nums[i] <= 10⁹ 
// 
// Related Topics 数组 哈希表 排序 👍 227 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function findLHS($nums)
    {
        //枚举法
        /*
         * 我们可以枚举数组中的每一个元素，对于当前枚举的元素 xx，它可以和 x + 1x+1 组成和谐子序列。我们只需要在数组中找出等于 xx 或 x + 1x+1 的元素个数，就可以得到以 xx 为最小值的和谐子序列的长度。

实际处理时，我们可以将数组按照从小到大进行排序，我们只需要依次找到相邻两个连续相同元素的子序列，检查该这两个子序列的元素的之差是否为 11。
利用类似与滑动窗口的做法，\textit{begin}begin 指向第一个连续相同元素的子序列的第一个元素，\textit{end}end 指向相邻的第二个连续相同元素的子序列的末尾元素，如果满足二者的元素之差为 11，则当前的和谐子序列的长度即为两个子序列的长度之和，等于 \textit{end} - \textit{begin} + 1end−begin+1。
         * */
        sort($nums);
        $left = 0;
        $res  = 0;

        for ($i = 0; $i < count($nums); $i++) {
            while ($nums[$i] - $nums[$left] > 1) {
                $left++;
            }
            if ($nums[$i] - $nums[$left] === 1) {
                $res = max($res, $i - $left + 1);
            }
        }

        return $res;

        //哈希表
    }
}
//leetcode submit region end(Prohibit modification and deletion)
