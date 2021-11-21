<?php


class Solution
{
    /**
     * @param Node $root
     * @return integer
     */
    function maxDepth($root)
    {
        if ($root === null) {
            return 0;
        }
        $max = 0;
        foreach ($root->children as $node) {
            $max = max($max, $this->maxDepth($node));
        }

        return $max + 1;
    }
}