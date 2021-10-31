<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/31 10:47
 * Module: [500]findWords.php
 */
class Solution
{

    /**
     * @param String[] $words
     *
     * @return String[]
     */
    function findWords(array $words)
    {
        $rows = [
            10 => 'qwertyuiop',
            9  => 'asdfghjkl',
            7  => 'zxcvbnm'
        ];

        $res = [];

        foreach ($words as $word) {
            foreach ($rows as $len => $row) {
                if ($len == count(array_unique(str_split($row . strtolower($word))))) {
                    $res[] = $word;
                    break;
                }
            }
        }

        return $res;
    }
}

$words = ["Hello", "Alaska", "Dad", "Peace"];
$class = new Solution();
var_dump($class->findWords($words));