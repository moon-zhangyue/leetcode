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
        $map  = [];//哈希查找表
        $cur  = $head;
        $prev = null;
        while ($cur != null) {
            if (!isset($map[$cur->val])) {//第一次出现
                $map[$cur->val] = 1;
                $prev           = $cur;
                $cur            = $cur->next;
            } else {  //已经出现过
                $prev->next = $cur->next;
                $cur        = $cur->next;
            }
        }

        return $head;
    }
}