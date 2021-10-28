<?php

/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/28 8:55
 * Module: [869]reorderedPowerOf2.php
 */
class Solution
{

    /**
     * @param eger $n
     *
     * @return Boolean
     */
    function reorderedPowerOf2($n)
    {
        $map = array(
            1           => 1,
            2           => 1,
            4           => 1,
            8           => 1,
            16          => 1,
            23          => 1,
            46          => 1,
            128         => 1,
            256         => 1,
            125         => 1,
            '0124'      => 1,
            '0248'      => 1,
            '0469'      => 1,
            1289        => 1,
            13468       => 1,
            23678       => 1,
            35566       => 1,
            '011237'    => 1,
            122446      => 1,
            224588      => 1,
            '0145678'   => 1,
            '0122579'   => 1,
            '0134449'   => 1,
            '0368888'   => 1,
            11266777    => 1,
            23334455    => 1,
            '01466788'  => 1,
            112234778   => 1,
            234455668   => 1,
            '012356789' => 1);

        $str = str_split($n);
        sort($str);
        $str = join('', $str);

        return isset($map[$str]);
    }
}

$class = new Solution();
var_dump($class->reorderedPowerOf2(4096));