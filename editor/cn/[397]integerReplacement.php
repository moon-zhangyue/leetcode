<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/19 13:02
 * Module: [397]integerReplacement.php
 */

class Solution
{
    /**
     * @param Integer $n
     *
     * @return Integer
     */
    function integerReplacement($n)
    {
        if ($n === 1) {
            return 0;
        }

        if($n%2==0){
            return 1+$this->integerReplacement($n/2);
        }else{
            return 1+min($this->integerReplacement($n+1),$this->integerReplacement($n-1));
        }
    }
}

$n     = 65535;
$class = new Solution();
var_dump($class->integerReplacement($n));
