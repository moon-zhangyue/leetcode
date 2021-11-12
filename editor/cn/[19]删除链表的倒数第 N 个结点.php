<?php
//给你一个链表，删除链表的倒数第 n 个结点，并且返回链表的头结点。 
//
// 
//
// 示例 1： 
//
// 
//输入：head = [1,2,3,4,5], n = 2
//输出：[1,2,3,5]
// 
//
// 示例 2： 
//
// 
//输入：head = [1], n = 1
//输出：[]
// 
//
// 示例 3： 
//
// 
//输入：head = [1,2], n = 1
//输出：[1]
// 
//
// 
//
// 提示： 
//
// 
// 链表中结点的数目为 sz 
// 1 <= sz <= 30 
// 0 <= Node.val <= 100 
// 1 <= n <= sz 
// 
//
// 
//
// 进阶：你能尝试使用一趟扫描实现吗？ 
// Related Topics 链表 双指针 👍 1646 👎 0


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
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    // 先后双指针
    function removeNthFromEnd($head, $n) {
        // 声明哑节点
        $dummy = new ListNode(0);
        $dummy->next = $head;

        // 定义 先后指针
        $front = $head;
        $after = $dummy; // 这样是为了直接找到删除节点的前驱节点

        // after - front

        // front 先指针，首先前进n
        while($n--) {
            $front = $front->next;
        }

        // after - 0 - 1 - 2 ... - n(front)  这个时候相隔 n个节点

        // front after 先后指针 再一起走
        while($front != null) {
            $front = $front->next;
            $after = $after->next;
        }
        // after是 要删除节点的前驱节点
        $after->next = $after->next->next;
        return $dummy->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
