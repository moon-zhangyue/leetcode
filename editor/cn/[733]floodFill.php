<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/11/14 10:41
 * Module: [733]floodFill.php
 */

class Solution
{

    /**
     * @param Integer[][] $image
     * @param Integer     $sr
     * @param Integer     $sc
     * @param Integer     $newColor
     *
     * @return Integer[][]
     */
    public $row;
    public $col;
    public $originColor;

    function floodFill(array $image, int $sr, int $sc, int $newColor): array
    {
        $this->row         = count($image);//列
        $this->col         = count($image[0]); //行
        $this->originColor = $image[$sr][$sc];//原始颜色

        if ($this->originColor == $newColor) {
            return $image;//和原来的颜色相同就不修改,否则相同的颜色可以一直改,会死循环
        }
        $this->dfs($image, $sr, $sc, $newColor);
        return $image;
    }

    protected function dfs(&$image, $sr, $sc, $newColor)
    {
        //上下左右和原始颜色相同的格子就需要被染成新颜色
        if ($sr >= $this->row || $sr < 0 || $sc >= $this->col || $sc < 0 || $image[$sr][$sc] != $this->originColor) {
            return;
        }

        $image[$sr][$sc] = $newColor;

        $this->dfs($image, $sr + 1, $sc, $newColor);//右
        $this->dfs($image, $sr - 1, $sc, $newColor);//左
        $this->dfs($image, $sr, $sc + 1, $newColor);//下
        $this->dfs($image, $sr, $sc - 1, $newColor);//上
    }
}

$image    = [[1, 1, 1, 1], [1, 1, 0, 1], [1, 0, 1, 1]];
$sr       = 1; //x
$sc       = 1; //y
$newColor = 2;
$class    = new Solution();
var_dump($class->floodFill($image, $sr, $sc, $newColor));