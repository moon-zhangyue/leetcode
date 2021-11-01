<?php
//给定一个整数数组 nums，其中恰好有两个元素只出现一次，其余所有元素均出现两次。 找出只出现一次的那两个元素。你可以按 任意顺序 返回答案。 
//
// 
//
// 进阶：你的算法应该具有线性时间复杂度。你能否仅使用常数空间复杂度来实现？ 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [1,2,1,3,2,5]
//输出：[3,5]
//解释：[5, 3] 也是有效的答案。
// 
//
// 示例 2： 
//
// 
//输入：nums = [-1,0]
//输出：[-1,0]
// 
//
// 示例 3： 
//
// 
//输入：nums = [0,1]
//输出：[1,0]
// 
//
// 提示： 
//
// 
// 2 <= nums.length <= 3 * 10⁴ 
// -2³¹ <= nums[i] <= 2³¹ - 1 
// 除两个只出现一次的整数外，nums 中的其他数字都出现两次 
// 
// Related Topics 位运算 数组 👍 486 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    function singleNumber($nums)
    {
        //一遍历 hash表
        $arr = [];
        foreach ($nums as $k => $v) {
            if (!array_key_exists($v, $arr)) {
                $arr[$v] = 1;
            } else {
                $arr[$v] = 2;
            }
        }

        $res = [];

        foreach ($arr as $key => $item) {
            if ($item == 1) {
                array_push($res, $key);
            }
        }

        return $res;

        //位运算
        /*
         *  时间复杂度：O(n)O(n)，其中 nn 是数组 \textit{nums}nums 的长度。
            空间复杂度：O(1)O(1)。*/
        //题中：有两个不重复数a，b。把a，b分到两组就转化成了每个数组只有一个不重复数
        for ($i = 0, $a = 0; $i < count($nums); $i++) {
            $a ^= $nums[$i]; //相同的数 异或后的结果是 0; 最终$a 是a和b的异或结果
        }

        $k   = $a & (-$a); //按位与  二进制 全1为1，否则为0 //$a 各位取反，再加1。【mask】000 011，==》 【-mask】111 101
        //【$a】& 【-$a】===> $a 为1的最低位，其余位是0
        //再将 nums 和$k ，与运算分成两组
        $res = [];
        foreach ($nums as $num) {
            if (($num & $k) == 0) {
                $res[0] ^= $num;
            } else {
                $res[1] ^= $num;
            }
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
