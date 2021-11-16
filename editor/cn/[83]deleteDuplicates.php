<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/16 8:45
 * Module: [83]deleteDuplicates.php
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     *
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        $slow = $head;//慢指针
        $fast = $head->next;//快指针
        while ($fast != null) {
            if ($slow->val != $fast->val) {
                $slow      = $slow->next;//移动慢指针
                $slow->val = $fast->val;
            }
            $fast = $fast->next;//移动快指针
        }

        $slow->next = null;//断开后面的链接
        return $head;
    }
}