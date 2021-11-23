<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/23 8:46
 * Module: [859]buddyStrings.php
 */

class Solution
{

    /**
     * @param String $s
     * @param String $goal
     *
     * @return Boolean
     */
    function buddyStrings(string $s, string $goal): bool
    {
        for ($i = 0; $i < strlen($s); $i++) {
            $j = 0;
            while ($j < strlen($s)) {
                $str = $s;

                $exp     = $str{$i};
                $str{$i} = $str{$j};
                $str{$j} = $exp;

                if ($str === $goal && $j !== $i) {
                    return true;
                }

                $j++;
            }
        }

        return false;
    }
}

$s     = "aaaaaaabc";
$goal  = "aaaaaaacb";
$class = new Solution();
var_dump($class->buddyStrings($s, $goal));