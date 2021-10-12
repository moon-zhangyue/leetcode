<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/10/12 14:55
 * Module: [26]removeDuplicates.php
 */

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $nums = array_unique($nums);

        var_dump($nums);
    }
}

//leetcode submit region end(Prohibit modification and deletion)


$nums  = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
$class = new Solution();
$class->removeDuplicates($nums);