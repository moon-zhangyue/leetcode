<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/13 8:56
 * Module: [5]longestPalindrome.php
 */

class Solution
{

    /**
     * @param String $s
     *
     * @return String
     */
    function longestPalindrome($s)
    {
        $len = strlen($s);
        if ($len < 2) return $s;

        $max_len = 0;

        //从数组第一个记录起始位置，第二位记录长度
        $res = [];

        for ($i = 0; $i < $len - 1; $i++) {
            $odd  = $this->centerSpread($s, $i, $i);
            $even = $this->centerSpread($s, $i, $i + 1);
            $max  = $odd[1] > $even[1] ? $odd : $even;
            if ($max[1] > $max_len) {
                $res     = $max;
                $max_len = $max[1];
            }
        }
        return substr($s, $res[0], $max_len);
    }

    function centerSpread(string $s, int $left, int $right)
    {
        $len = strlen($s);
        while ($left >= 0 && $right < $len) {
            if ($s{$left} == $s{$right}) {
                $left--;  //left向前移动
                $right++; //right向后移动
            } else {
                break;
            }
        }
        return [$left + 1, $right - $left - 1];
    }
}

//$s     = "babad";
$s     = "cbbd";
$class = new Solution();
var_dump($class->longestPalindrome($s));