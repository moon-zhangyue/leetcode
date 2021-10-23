<?php
//给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。 
//
// 有效字符串需满足： 
//
// 
// 左括号必须用相同类型的右括号闭合。 
// 左括号必须以正确的顺序闭合。 
// 
//
// 注意空字符串可被认为是有效字符串。 
//
// 示例 1: 
//
// 输入: "()"
//输出: true
// 
//
// 示例 2: 
//
// 输入: "()[]{}"
//输出: true
// 
//
// 示例 3: 
//
// 输入: "(]"
//输出: false
// 
//
// 示例 4: 
//
// 输入: "([)]"
//输出: false
// 
//
// 示例 5: 
//
// 输入: "{[]}"
//输出: true 
// Related Topics 栈 字符串 
// 👍 1824 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    public $str_map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    public $stack;

    /**
     * @param String $s
     *
     * @return Boolean
     */

    function isValid($s)
    {
        //替换合格字符串
//        $s = str_replace(['()', '[]', '{}'], '', $s, $count); //替换合格的,再去判断剩余是否存在
//
//        if ($count == 0) {
//            return strlen($s) == 0;
//        } else {
//            return $this->isValid($s);
//        }

        //方法2 使用栈 PHP SplStack栈
        if (empty($s)) {
            return true;
        }

        //不是偶数,返回false
        if (strlen($s) % 2 != 0) {
            return false;
        }

        //定义一个栈
        $this->stack = new SplStack();

        //分割字符串为数组
        $arr = str_split($s);

        foreach ($arr as $value) {
            //当为左括号时,入栈 先出现的左括号,先进栈,后匹配
            if (!array_key_exists($value, $this->str_map)) {
                $this->stack->push($value);
            } else {
                //当为右括号时,如果栈不为空且与栈顶元素相匹配,栈顶元素出栈,否则返回false
                if (!$this->stack->isEmpty() && $this->str_map[$value] == $this->stack->top()) {
                    $this->stack->pop();
                } else {
                    return false;
                }
            }
        }

        //判断栈是否为空,为空返回true,否则返回false
        return $this->stack->isEmpty();
    }
}

$a = new Solution();

$a->isValid("[]()[");
//leetcode submit region end(Prohibit modification and deletion)
