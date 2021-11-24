<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/24 17:45
 * Module: [695]maxAreaOfIsland.php
 */

class Solution
{

    /**
     * @param Integer[][] $grid
     *
     * @return Integer
     */
    function maxAreaOfIsland(array $grid)
    {
        $max = 0;

        for ($i = 0; $i != count($grid); $i++) {
            for ($j = 0; $j != count($grid[0]); $j++) {
                $max = max($max, $this->dfs($grid, $i, $j));
            }
        }

        return $max;
    }

    function dfs($grid, $i, $j): int
    {
        if ($i < 0 || $j < 0 || $i == count($grid) || $j == count($grid[0]) || $grid[$i][$j] != 1) {
            return 0;
        }
        $grid[$i][$i] = 0;  //已经访问过的点就置为0,避免重复访问
        $di           = [0, 0, 1, -1];
        $dj           = [1, -1, 0, 0];
        $max          = 1;
        for ($index = 0; $index != 4; $index++) {
            $next_i = $i + $di[$index];
            $next_j = $j + $dj[$index];
            $max    += $this->dfs($grid, $next_i, $next_j);
        }
        return $max;
    }
}

$grid  = [[0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0], [0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0], [0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 1,
    0, 0], [0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0], [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0]];
$class = new Solution();
var_dump($class->maxAreaOfIsland($grid));