<?php
//存在一个按升序排列的链表，给你这个链表的头节点 head ，请你删除所有重复的元素，使每个元素 只出现一次 。 
//
// 返回同样按升序排列的结果链表。 
//
// 
//
// 示例 1： 
//
// 
//输入：head = [1,1,2]
//输出：[1,2]
// 
//
// 示例 2： 
//
// 
//输入：head = [1,1,2,3,3]
//输出：[1,2,3]
// 
//
// 
//
// 提示： 
//
// 
// 链表中节点数目在范围 [0, 300] 内 
// -100 <= Node.val <= 100 
// 题目数据保证链表已经按升序排列 
// 
// Related Topics 链表 👍 676 👎 0


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
class Solution
{

    /**
     * @param ListNode $head
     *
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        //一 O(n)空间
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

        //二 O(1)空间  快慢指针
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
//leetcode submit region end(Prohibit modification and deletion)
