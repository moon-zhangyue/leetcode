<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/18 8:48
 * Module: [563]findTilt.php
 */

class Solution
{
    private $sum = 0;

    /**
     * @param TreeNode $root
     *
     * @return Integer
     */
    function findTilt($root)
    {
        $this->add($root);

        return $this->sum;
    }

    //当前节点和其所有子节点的和
    function add($node)
    {
        if ($node === null) {
            return 0;
        }
        $left  = $this->add($node->left);
        $right = $this->add($node->right);

        $this->sum += abs($left - $right); //加上 当前节点的坡度 之和
        return $left + $right + $node->val;
    }
}