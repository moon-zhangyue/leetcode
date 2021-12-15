<?php
//给定一个二叉树，检查它是否是镜像对称的。 
//
// 
//
// 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。 
//
//     1
//   / \
//  2   2
// / \ / \
//3  4 4  3
// 
//
// 
//
// 但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的: 
//
//     1
//   / \
//  2   2
//   \   \
//   3    3
// 
//
// 
//
// 进阶： 
//
// 你可以运用递归和迭代两种方法解决这个问题吗？ 
// Related Topics 树 深度优先搜索 广度优先搜索 
// 👍 889 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     *
     * @return Boolean
     */
    function isSymmetric($root)
    {
        /*
         * 递归算法的三个要素
            确定递归函数的参数和返回值
            确定哪些参数是递归的过程中需要处理的，那么就在递归函数里加上这个参数， 并且还要明确每次递归的返回值是什么进而确定递归函数的返回类型。

            确定终止条件
            写完了递归算法，运行的时候，经常会遇到栈溢出的错误，就是没写终止条件或者终止条件写的不对，操作系统也是用一个栈的结构来保存每一层递归的信息，如果递归没有终止，操作系统的内存栈必然就会溢出。

            确定单层递归的逻辑
            确定每一层递归需要处理的信息。在这里也就会重复调用自己来实现递归的过程。
         *
         * */
        return $this->check($root, $root);
    }

    private function check($left, $right)
    {
        if ($left === null && $right === null) {
            return true;
        }
        if ($left === null || $right === null) {
            return false;
        }
        if ($left->val !== $right->val) {
            return false;
        }

        return $this->check($left->left, $right->right)
            && $this->check($left->right, $right->left);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
