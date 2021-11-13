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
     * @param Integer $n
     *
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $len             = 0;//链表长度
        $dummyHead       = new ListNode(null);//虚拟头结点
        $dummyHead->next = $head;
        while ($head) {//迭代求出长度
            $head = $head->next;
            $len++;
        }
        $head = $dummyHead;
        for ($i = 1; $i <= $len - $n; $i++) {//找到待删除节点的前一个节点
            $head = $head->next;
        }
        $head->next = $head->next->next;//删除节点
        return $dummyHead->next;
    }
}