<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/12 16:26
 * Module: [876]middleNode.php
 */

class Solution
{

    /**
     * @param ListNode $head
     *
     * @return ListNode
     */
    function middleNode($head)
    {
        //快慢指针--用两个指针 slow 与 fast 一起遍历链表。slow 一次走一步，fast 一次走两步。那么当 fast 到达链表的末尾时，slow 必然位于中间
        $fast = $head;
        $slow = $head;
        while ($fast != null && $fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        return $slow;
    }
}