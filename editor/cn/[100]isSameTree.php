<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/27 9:59
 * Module: [100]isSameTree.php
 */

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

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     *
     * @return Boolean
     */
    function isSameTree($p, $q)
    {
        if ($p === null && $p === null) {
            return true;;
        } elseif ($p == null || $q == null) {
            return false;
        } elseif ($p->val != $q->val) {
            return false;
        }

        //左右子树同时为真,才为真
        return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}