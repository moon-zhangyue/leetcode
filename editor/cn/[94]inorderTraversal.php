<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/20 10:11
 * Module: [94]inorderTraversal.php
 */

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val   = $val;
        $this->left  = $left;
        $this->right = $right;
    }
}

class Solution
{

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