<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/15 10:28
 * Module: [38]countAndSay.php
 */

class Solution
{

    /**
     * @param Integer $n
     *
     * @return String
     */
    function countAndSay($n)
    {
        $str = '1';
        for ($i = 2; $i <= $n; $i++) {
            $sb    = [];
            $start = 0;
            $pos   = 0;

            while ($pos < strlen($str)) {
                while ($pos < strlen($str) && $str[$pos] === $str[$start]) {
                    $pos++;
                }
                array_push($sb, ($pos - $start) . $str{$start});
                $start = $pos;
            }
            $str = (string)implode('', $sb);
        }

        return $str;
    }
}

$class = new Solution();
var_dump($class->countAndSay(5));