<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/15 10:48
 * Module: [170]TwoSum3.php
 */

class TwoSum
{
    private $arr = [];

    /**
     */
    function __construct()
    {
//        $this->arr = [];
    }

    /**
     * @param Integer $number
     *
     * @return NULL
     */
    function add($number)
    {
        array_push($this->arr, $number);
//        var_dump($this->arr);
    }

    /**
     * @param Integer $value
     *
     * @return Boolean
     */
    function find($value)
    {
        $found = [];
        foreach ($this->arr as $key => $val) {
            $diff = $value - $val;

            if (!isset($found[$diff])) {
                $found[$val] = $key;
                continue;
            }

            return true;
        }
        return false;
    }
}

/**
 * Your TwoSum object will be instantiated and called as such:
 * $obj = TwoSum();
 * $obj->add($number);
 * $ret_2 = $obj->find($value);
 */

$obj = new TwoSum();
$obj->add(1);   // [] --> [1]
$obj->add(3);   // [1] --> [1,3]
$obj->add(5);   // [1,3] --> [1,3,5]

$res = $obj->find(4);  // 1 + 3 = 4，返回 true
var_dump($res);
$res = $obj->find(7);
var_dump($res);