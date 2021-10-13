<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/12 16:56
 * Module: [28]strStr.php
 */

class Solution
{

    /**
     * @param String $haystack
     * @param String $needle
     *
     * @return Integer
     */
    function strStr($haystack, $needle)
    {
//        $len   = strlen($haystack);
//        $ckLen = strlen($needle);
//        if (0 == $ckLen) {
//            return 0;
//        }
//        for ($i = $j = 0; $i < $len; $i++) {
//            //判断是否与比较字符串中($needle)的首字符相同
//            if ($haystack[$k = $i] == $needle[$j = 0]) {
//                $idx = -1;
//                //逐个字符比较
//                while (++$j < $ckLen && ++$k < $len) {
//                    $str = $haystack[$k];
//                    if ($idx < 0 && $needle[0] == $str) {
//                        $idx = $k;
//                    }//保存下次比较的起始下标
//                    if ($needle[$j] != $str) {
//                        break;
//                    }//字符不同就结束比较
//                }
//                if ($j == $ckLen) {
//                    return $i;//返回找到$needle字符串的起始下标
//                } else if ($k == $len) {
//                    break;
//                }
//                //$needle字符串长度超出$haystack字符串的剩余长度
//                if ($idx > $i) {
//                    $i = $idx - 1;
//                }//设置下次比较的起始下标
//            }
//        }
//        return -1;

//        $len   = strlen($haystack);
//        $ckLen = strlen($needle);
//        if (0 == $ckLen) {
//            return 0;
//        }
//        for ($i = 0; $i + $ckLen <= $len; $i++) {
//            for ($j = 0; $j < $ckLen; $j++) {
//                if ($haystack[$i + $j] != $needle[$j]) {
//                    break;
//                }
//                if ($j == $ckLen - 1) {
//                    return $i;
//                }
//            }
//        }
//        return -1;

//        $len   = strlen($haystack);
//        $ckLen = strlen($needle);
//        if (0 == $ckLen) {
//            return 0;
//        }
//        for ($i = 0; $i + $ckLen <= $len; $i++) {
//            if ($haystack[$i] != $needle[0]) {
//                continue;
//            }
//            if ($needle == substr($haystack, $i, $ckLen)) {
//                return $i;
//            }
//        }
//        return -1;

        $left_h = 0;
        if ($needle == '') {
            return 0;
        }
        while ($left_h <= strlen($haystack) - strlen($needle)) {
            $left_n  = 0;
            $right_h = $left_h + strlen($needle) - 1;
            $right_n = strlen($needle) - 1;
            $p       = $left_h;
            while (true) {
                if (($haystack[$p] != $needle[$left_n]) || ($haystack[$right_h] != $needle[$right_n])) {
                    break;
                }
                $p++;
                $left_n++;
                $right_h--;
                $right_n--;

                if ($p > $right_h) {
                    return $left_h;
                }
            }
            $left_h++;

        }
        return -1;
    }
}

set_time_limit(0);
$haystack = 'mississippi';
$needle   = 'issip';
$class    = new Solution();
var_dump($class->strStr($haystack, $needle));