<?php
//将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 
//
// 
//
// 示例： 
//
// 输入：1->2->4, 1->3->4
//输出：1->1->2->3->4->4
// 
// Related Topics 链表 
// 👍 1270 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
//class ListNode
//{
//    public $val = 0;
//    public $next = null;
//
//    function __construct($val = 0, $next = null)
//    {
//        $this->val  = $val;
//        $this->next = $next;
//    }
//}

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
        //不可以这么写
//        $s = array_merge($l1, $l2);
//
//        asort($s);
//
//        return array_values($s);

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

$res = $obj->mergeTwoLists([1, 2, 4], [1, 3, 4]);

var_dump($res);
//leetcode submit region end(Prohibit modification and deletion)
