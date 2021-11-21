<?php
//请编写一个函数，用于 删除单链表中某个特定节点 。在设计函数时需要注意，你无法访问链表的头节点 head ，只能直接访问 要被删除的节点 。 
//
// 题目数据保证需要删除的节点 不是末尾节点 。 
//
// 
//
// 示例 1： 
//
// 
//输入：head = [4,5,1,9], node = 5
//输出：[4,1,9]
//解释：指定链表中值为 5 的第二个节点，那么在调用了你的函数之后，该链表应变为 4 -> 1 -> 9
// 
//
// 示例 2： 
//
// 
//输入：head = [4,5,1,9], node = 1
//输出：[4,5,9]
//解释：指定链表中值为 1 的第三个节点，那么在调用了你的函数之后，该链表应变为 4 -> 5 -> 9 
//
// 示例 3： 
//
// 
//输入：head = [1,2,3,4], node = 3
//输出：[1,2,4]
// 
//
// 示例 4： 
//
// 
//输入：head = [0,1], node = 0
//输出：[1]
// 
//
// 示例 5： 
//
// 
//输入：head = [-3,5,-99], node = -3
//输出：[5,-99]
// 
//
// 
//
// 提示： 
//
// 
// 链表中节点的数目范围是 [2, 1000] 
// -1000 <= Node.val <= 1000 
// 链表中每个节点的值都是唯一的 
// 需要删除的节点 node 是 链表中的一个有效节点 ，且 不是末尾节点 
// 
// Related Topics 链表 👍 999 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

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
        /*
         * 删除链表中的一个节点，常规的办法是找到待删除节点的上个节点，将其指向删除节点的下个节点；
但是本题只给了要删除的节点，因此，需要转换下思路：把当前节点后面的节点的值赋给当前节点，再把当前节点指向下下个节点。
能够这么做是因为题目中明确说明了，要删除的节点不会是最后一个节点，且每个节点的值是唯一的，在这个大前提下，才能这么做。
         * */
        //将节点后面的值赋给当前节点，删除当前节点的后面一个节点
        $node->val  = $node->next->val;
        $node->next = $node->next->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
