<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/31 11:48
 * Module: [104]maxDepth.php
 */
class Solution
{

    /**
     * @param TreeNode $root
     *
     * @return Integer
     */
    function maxDepth($root)
    {
        if ($root === 0) return 0;

        $left  = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);

        return max($left, $right) + 1;
    }
}