<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/2 10:06
 * Module: [237]deleteNode.php
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{
    /**
     * @param ListNode $node
     *
     * @return
     */
    function deleteNode($node)
    {
        //将节点后面的值赋给当前节点，删除当前节点的后面一个节点
        $node->val  = $node->next->val;
        $node->next = $node->next->next;
    }
}