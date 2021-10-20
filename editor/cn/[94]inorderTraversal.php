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
        /*迭代解法
        设置一个栈保存迭代路径

        树不为空或栈不为空, 执行以下语句, 否则终止,返回
        左子树不为空,进栈,继续找左子树, 直到左子树为空
        左子树为空, 开始退栈, 并输出中序
        找右子树
        重复 1 - 3
        */
        if ($root == null) {
            return [];
        }
        $stack = [];
        $curr  = $root;
        $res   = [];
        while ($curr || $stack) {
            if ($curr != null) { // 左子树遍历, null结束
                $stack[] = $curr; //入栈,保存轨迹
                $curr    = $curr->left;   //找下个左子树
            } else {
                $curr  = array_pop($stack);//左推展
                $res[] = $curr->val; //输出中序
                $curr  = $curr->right; //找下个右子树
            }
        }
        return $res;
    }
}