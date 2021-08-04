<?php
//给定一个包含非负整数的数组，你的任务是统计其中可以组成三角形三条边的三元组个数。
//
// 示例 1:
//
//
//输入: [2,2,3,4]
//输出: 3
//解释:
//有效的组合是:
//2,3,4 (使用第一个 2)
//2,3,4 (使用第二个 2)
//2,2,3
//
//
// 注意:
//
//
// 数组长度不超过1000。
// 数组里整数的范围为 [0, 1000]。
//
// Related Topics 贪心 数组 双指针 二分查找 排序
// 👍 235 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function triangleNumber($nums)
    {
        $len = count($nums);
        sort($nums); //升序排序, a<b<c,那么c+a>b和c+b>a一定成立,只需要确定a+b>c

        $count = 0;
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                $left  = $j + 1;
                $right = $len - 1;
                $k     = $j;
                while ($left <= $right) {
                    (int)$mid = floor(($left + $right) / 2);
                    if ($nums[$mid] < $nums[$i] + $nums[$j]) {
                        $k    = $mid;
                        $left = $mid + 1;
                    } else {
                        $right = $mid - 1;
                    }
                }
                $count += $k - $j;
            }
        }
        return $count;
    }
}

$class = new Solution();
$res   = $class->triangleNumber([2, 4, 4, 6, 8, 9]);
var_dump($res);
//leetcode submit region end(Prohibit modification and deletion)
