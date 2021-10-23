<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/14 11:11
 * Module: [2]addTwoNumbers.php
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

/**链表
 * Class Linklist
 * @package app\models
 */
class Linklist
{
    public $head;           //头节点(默认一个虚拟头节点)
    public $size;           //长度

    public function __construct()
    {
        $this->head = new ListNode();
        $this->size = 0;
    }

    //头插法
    public function addFirst($value)
    {
        try {
            $this->add(0, $value);
        } catch (Exception $e) {
        }
    }

    /**指定索引位置插入
     *
     * @param $index
     * @param $value
     *
     * @throws Exception
     */
    public function add($index, $value)
    {
        if ($index > $this->size) {
            throw new Exception('超过链表范围');
        }

        $prev = $this->head;

        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        $prev->next = new ListNode($value, $prev->next);

        $this->size++;
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
    function addTwoNumbers($l1, $l2)
    {
        $obj = null;

        $additional = 0;
        do {
            $value = $l1->val + $l2->val + $additional;
            if ($value < 10) {
                $additional = 0;
            } else {
                $value      -= 10;
                $additional = 1;
            }

            $tmp_obj = new ListNode($value);

            if (is_null($obj)) {
                $obj = $tmp_obj;
            } else {
                $next->next = $tmp_obj;
            }
            $next = $tmp_obj;

            $l1 = $l1->next;
            $l2 = $l2->next;

        } while ($l1 || $l2 || $additional);

        return $obj;
    }
}

$l1 = [9, 9, 9, 9, 9, 9, 9];
$l2 = [9, 9, 9, 9];

$node1 = new Linklist();
foreach ($l1 as $k => $v) {
    $node1->addFirst($v);
}

$node2 = new Linklist();
foreach ($l2 as $k => $v) {
    $node2->addFirst($v);
}
var_dump($node1);
var_dump($node2);

$class = new Solution();
var_dump($class->addTwoNumbers($node1, $node2));