<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/12 9:02
 * Module: [167]twoSum.php
 */

class Solution
{

    /**
     * @param Integer[] $numbers
     * @param Integer   $target
     *
     * @return Integer[]
     */
    function twoSum(array $numbers, int $target): array
    {
        $arr = [];
        for ($i = 0; $i < count($numbers); $i++) {
            if ($numbers[$i] >= $target) {
                break;
            }
            $a = $numbers[$i];

            for ($j = $i + 1; $j < count($numbers); $j++) {
                if ($a + $numbers[$j] == $target) {
                    $arr = [$i, $j];
                }
            }
        }

        return $arr;
    }
}

$numbers = [2, 7, 11, 15];
$target  = 9;
$class   = new Solution();
var_dump($class->twoSum($numbers, $target));