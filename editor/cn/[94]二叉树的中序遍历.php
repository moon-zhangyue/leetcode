<?php
//给定一个二叉树的根节点 root ，返回它的 中序 遍历。 
//
// 
//
// 示例 1： 
//
// 
//输入：root = [1,null,2,3]
//输出：[1,3,2]
// 
//
// 示例 2： 
//
// 
//输入：root = []
//输出：[]
// 
//
// 示例 3： 
//
// 
//输入：root = [1]
//输出：[1]
// 
//
// 示例 4： 
//
// 
//输入：root = [1,2]
//输出：[2,1]
// 
//
// 示例 5： 
//
// 
//输入：root = [1,null,2]
//输出：[1,2]
// 
//
// 
//
// 提示： 
//
// 
// 树中节点数目在范围 [0, 100] 内 
// -100 <= Node.val <= 100 
// 
//
// 
//
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？ 
// Related Topics 栈 树 深度优先搜索 二叉树 👍 1136 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{
    private $res = [];

    /**
     * @param TreeNode $root
     *
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        //中序遍历：按照访问左子树——根节点——右子树的方式遍历这棵树
        /*中序 左中右
        左递归, 直到左空节点
        输出中
        右递归, 直到右节点是空节点*/
        if ($root->left != null) {
            $this->inorderTraversal($root->left);
        }

        array_push($this->res, $root->val);

        if ($root->right != null) {
            $this->inorderTraversal($root->right);
        }

        return $this->res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
