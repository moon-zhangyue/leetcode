<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/31 11:43
 * Module: [101]isSymmetric.php
 */
class Solution
{

    /**
     * @param TreeNode $root
     *
     * @return Boolean
     */
    public function isSymmetric($root)
    {
        return $this->check($root, $root);
    }

    private function check($left, $right)
    {
        if ($left === null && $right === null) return true;
        if ($left === null || $right === null) return false;
        if ($left->val !== $right->val) return false;

        return $this->check($left->left, $right->right)
            && $this->check($left->right, $right->left);
    }
}