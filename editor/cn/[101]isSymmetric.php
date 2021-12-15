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
        //迭代
        if ($root === null) return true;
        if ($root->left === null && $root->right === null) return true;
        if ($root->left === null || $root->right === null) return false;

        $queue = new SplQueue();
        $queue->enqueue($root->left);
        $queue->enqueue($root->right);

        // 首先从队列中拿出两个节点 (left 和 right) 比较
        // 将 left 的 left 节点和 right 的 right 节点放入队列
        // 将 left 的 right 节点和 right 的 left 节点放入队列
        // 时间复杂度是 O(n), 复杂度是 O(n)
        while ($queue->count() > 1) {
            $left  = $queue->dequeue();
            $right = $queue->dequeue();
            if ($left->val !== $right->val) return false;

            if ($left->left !== null) {
                if ($right->right === null) return false;
                $queue->enqueue($left->left);
                $queue->enqueue($right->right);
            } elseif ($right->right !== null) {
                return false;
            }

            if ($left->right !== null) {
                if ($right->left === null) return false;
                $queue->enqueue($left->right);
                $queue->enqueue($right->left);
            } elseif ($right->left !== null) {
                return false;
            }
        }

        return $queue->isEmpty();
    }
}