<?php
//给你一个整数数组 nums ，设计算法来打乱一个没有重复元素的数组。 
//
// 实现 Solution class: 
//
// 
// Solution(int[] nums) 使用整数数组 nums 初始化对象 
// int[] reset() 重设数组到它的初始状态并返回 
// int[] shuffle() 返回数组随机打乱后的结果 
// 
//
// 
//
// 示例： 
//
// 
//输入
//["Solution", "shuffle", "reset", "shuffle"]
//[[[1, 2, 3]], [], [], []]
//输出
//[null, [3, 1, 2], [1, 2, 3], [1, 3, 2]]
//
//解释
//Solution solution = new Solution([1, 2, 3]);
//solution.shuffle();    // 打乱数组 [1,2,3] 并返回结果。任何 [1,2,3]的排列返回的概率应该相同。例如，返回 [3, 
//1, 2]
//solution.reset();      // 重设数组到它的初始状态 [1, 2, 3] 。返回 [1, 2, 3]
//solution.shuffle();    // 随机返回数组 [1, 2, 3] 打乱后的结果。例如，返回 [1, 3, 2]
// 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 200 
// -10⁶ <= nums[i] <= 10⁶ 
// nums 中的所有元素都是 唯一的 
// 最多可以调用 5 * 10⁴ 次 reset 和 shuffle 
// 
// Related Topics 数组 数学 随机化 👍 175 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    private $nums = [];

    /**
     * @param Integer[] $nums
     */
    function __construct($nums)
    {
        $this->nums = $nums;
    }

    /**
     * @return Integer[]
     */
    function reset()
    {
        return $this->nums;
    }

    /**
     * @return Integer[]
     */
    function shuffle()
    {
        $arr = $this->nums;

        shuffle($arr);

        return $arr;
    }

    //洗牌算法
    /*
考虑通过调整 waiting 的实现方式以优化方法一。
我们可以在移除 waiting 的第 k 个元素时，将第 k 个元素与数组的最后 1 个元素交换，然后移除交换后数组的最后 1 个元素，这样我们只需要 O(1)的时间复杂度即可完成移除第 k 个元素的操作。此时，被移除的交换后数组的最后 1 个元素即为我们根据随机下标获取的元素。
在此基础上，我们也可以不移除最后 1 个元素，而直接将其作为乱序后的结果，并更新待乱序数组的长度，从而实现数组的原地乱序。因为我们不再需要从数组中移除元素，所以也可以将第 k 个元素与第 1 个元素交换。
具体地，实现算法如下：
设待原地乱序的数组 nums。
循环 n次，在第 i 次循环中（0≤i<n）：
在 [i,n)中随机抽取一个下标 j；
将第 i 个元素与第 j 个元素交换。
其中数组中的nums[i...n−1] 的部分为待乱序的数组，其长度为 n-i;nums[0...i−1] 的部分为乱序后的数组，其长度为 i。
     * */
    /*
     * 复杂度分析
时间复杂度：
初始化：O(n)，其中 nn 为数组中的元素数量。我们需要 O(n) 来初始化 original。
reset：O(n)。我们需要 O(n) 将 original 复制到 nums。
\shuffle：O(n)。我们只需要遍历 n 个元素即可打乱数组。
空间复杂度：O(n)。记录初始状态需要存储 n 个元素。
     * */
    private $nums = [];
    private $original = [];

    /**
     * @param Integer[] $nums
     */
    function __construct($nums)
    {
        $this->nums     = $nums;
        $this->original = $nums;
    }

    /**
     * @return Integer[]
     */
    function reset()
    {
        return $this->nums;
    }

    /**
     * @return Integer[]
     */
    function shuffle()
    {
        for ($i = 0; $i < count($this->original); $i++) {
            $j = mt_rand($i, count($this->original) - 1); //mt_rand比rand快

            $exp = $this->original[$i];

            $this->original[$i] = $this->original[$j];
            $this->original[$j] = $exp;
        }

        return $this->original;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($nums);
 * $ret_1 = $obj->reset();
 * $ret_2 = $obj->shuffle();
 */
//leetcode submit region end(Prohibit modification and deletion)
