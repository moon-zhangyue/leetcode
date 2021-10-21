[LeetCode 415 字符串相加]: https://leetcode-cn.com/problems/add-strings/

思路
从后向前，对应的位置的数字相加，如果结果大于 9，需要进位

难点
进位处理
最高位进位处理
代码模板

```php
function addStrings($num1, $num2) {
    $len1 = strlen($num1);
    $len2 = strlen($num2);
    if ($len1 == 0) return $num2;
    if ($len2 == 0) return $num1;
    // 从最低位开始处理
    $i = $len1 - 1;
    $j = $len2 - 1;
    // 进位标记
    $carry = 0;
    $return = '';
    // 使用该判断条件，一次遍历处理完所有情况
    while ($i >= 0 || $j >= 0 || $carry) {
        $sum = $carry;
        if ($i >= 0) {
            $sum += substr($num1, $i, 1);
            $i--;
        }
        if ($j >= 0) {
            $sum += substr($num2, $j, 1);
            $j--;
        }
        // 进位处理
        $carry = floor($sum / 10);
        $return = $sum % 10 . $return;
    }
    return $return;
}
```

LeetCode 66 加一
此题是前一题的特例，可以理解为 第二个字符串为 '1'
直接上代码

```php
function plusOne($digits) {
    $len1 = count($digits);
    if ($len1 == 0) return [1];
    $carry = 0;
    $return = [];
    $i = $len1 - 1;
    // 只有一位
    $j = 0;
    while ($i >= 0 || $j >= 0 || $carry) {
        $sum = $carry;
        if ($i >= 0) {
            $sum += $digits[$i];
            $i--;
        }
        if ($j >= 0) {
            // 第二个字符串就是 "1"
            $sum += 1;
            $j--;
        }

        $carry = floor($sum / 10);
        array_unshift($return, $sum % 10);
    }
    return $return;
}
```

做一点简化处理

```PHP
function plusOne($digits) {
    $len1 = count($digits);
    if ($len1 == 0) return [1];
    $carry = 0;
    $return = [];
    $i = $len - 1;
    // 直接在最后一位加上
    $digits[$i]++;
    if ($digits[$i] <= 9) return $digits;
    while ($i >= 0 || $carry) {
        $sum = $carry;
        if ($i >= 0) {
            $sum += $digits[$i];
            $i--;
        }

        $carry = floor($sum / 10);
        array_unshift($return, $sum % 10);
    }
    return $return;
}
```

LeetCode 67 二进制求和
本题是十进制字符串的变种，稍微改动一下代码模板即可

```PHP
function addBinary($a, $b) {
    $len1 = strlen($a);
    $len2 = strlen($b);
    if ($len1 == 0) return $b;
    if ($len2 == 0) return $a;

    $return = '';
    $carry = 0;
    $i = $len1 - 1;
    $j = $len2 - 1;
    while ($i >= 0 || $j >= 0 || $carry) {
        $sum = $carry;
        if ($i >= 0) {
            $sum += substr($a, $i, 1);
            $i--;
        }
    
        if ($j >= 0) {
            $sum += substr($b, $j, 1);
            $j--;
        }
        
        // 进位处理，大于 2 就进一位
        $carry = $sum >= 2 ? 1 : 0;
        // 当前位剩余的只能是 0 或 1
        $return = ($sum & 1) . $return;
    }
    return $return;
}
```

LeetCode 989 数字形式的整数加法
与字符串形式的类似，直接上代码

```PHP
function addToArrayForm($A, $K) {
    $len1 = count($A);
    $len2 = strlen($K);
    if ($len1 == 0) return explode('', $K);
    if ($len2 == 0) return $A;
    
    $return = [];
    $carry = 0;
    $i = $len1 - 1;
    $j = $len2 - 1;
    while ($i >= 0 || $j >= 0 || $carry) {
        $sum = $carry;
        if ($i >= 0) {
            $sum += $A[$i];
            $i--;
        }
        if ($j >= 0) {
            $sum += substr($K, $j, 1);
            $j--;
        }
    
        $carry = floor($sum / 10);
        array_unshift($return, $sum % 10);
    }
    return $return;
}
```

LeetCode 2 两数相加
字符串改为链表形式，换汤不换药

```PHP
function addTwoNumbers($l1, $l2)
{
    if ($l1 === null) return $l2;
    if ($l2 === null) return $l1;
    $carry = 0;
    // 添加虚拟头结点，方便返回
    $dummyHead = new ListNode(0);
    $cur = $dummyHead;
    while ($l1 !== null || $l2 !== null || $carry) {
        $sum = $carry;
        if ($l1 !== null) {
            $sum += $l1->val;
            $l1 = $l1->next;
        }
        if ($l2 !== null) {
            $sum += $l2->val;
            $l2 = $l2->next;
        }

        $carry = floor($sum / 10);
        // 由于是逆序，将新节点挂在当前节点之后即可
        $cur->next = new ListNode($sum % 10);
        $cur = $cur->next;
    }
    
    return $dummyHead->next;

}
```

LeetCode 445 两数相加 II
是上一题的逆序版本，难度略有增加。
对于逆序处理，首先要想到栈

```PHP
function addTwoNumbers($l1, $l2)
{
    if ($l1 === null) return $l2;
    if ($l2 === null) return $l1;
    $stack1 = new SplStack();
    $stack2 = new SplStack();
    while ($l1 !== null) {
        $stack1->push($l1->val);
        $l1 = $l1->next;
    }
    while ($l2 !== null) {
        $stack2->push($l2->val);
        $l2 = $l2->next;
    }

    $carry = 0;
    $head = null;
    while (!$stack1->isEmpty() || !$stack2->isEmpty() || $carry > 0) {
        $sum = $carry;
        $sum += $stack1->isEmpty() ? 0 : $stack1->pop();
        $sum += $stack2->isEmpty() ? 0 : $stack2->pop();
        $node = new ListNode($sum % 10);
        $node->next = $head;
        $head = $node;
        $carry = floor($sum / 10);
    }
    return $head;

}
```

