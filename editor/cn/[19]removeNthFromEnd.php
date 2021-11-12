<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/12 17:10
 * Module: [19]removeNthFromEnd.php
 */

class Solution
{

    /**
     * @param ListNode $head
     * @param Integer  $n
     *
     * @return ListNode
     */
    // 先后双指针
    function removeNthFromEnd($head, $n)
    {
        // 声明哑节点
        $dummy       = new ListNode(0);
        $dummy->next = $head;

        // 定义 先后指针
        $front = $head;
        $after = $dummy; // 这样是为了直接找到删除节点的前驱节点

        // after - front

        // front 先指针，首先前进n
        while ($n--) {
            $front = $front->next;
        }

        // after - 0 - 1 - 2 ... - n(front)  这个时候相隔 n个节点

        // front after 先后指针 再一起走
        while ($front != null) {
            $front = $front->next;
            $after = $after->next;
        }
        // after是 要删除节点的前驱节点
        $after->next = $after->next->next;
        return $dummy->next;
    }
}