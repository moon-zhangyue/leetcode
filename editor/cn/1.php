<?php

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
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $Head = new ListNode(null);

        $cur = $Head;

        while ($l1 !== null && $l2 !== null) {
            if ($l1->val <= $l2->val) {
                $cur->next = $l1;
                $l1        = $l1->next;
            } else {
                $cur->next = $l2;
                $l2        = $l2->next;
            }
            $cur = $cur->next;
        }

        if ($l1 !== null) {
            $cur->next = $l1;
        } elseif ($l2 !== null) {
            $cur->next = $l2;
        }

        return $Head->next;
    }
}

$obj = new Solution();

$res = $obj->mergeTwoLists([1, 2, 4], [1, 3, 4, 6]);

var_dump($res);
