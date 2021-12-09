<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2021/12/9 10:49
 * Module: [794]validTicTacToe.php
 */

class Solution
{

    /**
     * @param String[] $board
     *
     * @return Boolean
     */
    function validTicTacToe($board)
    {
        //O为后手
        $xCount = 0;
        $oCount = 0;
        foreach ($board as $key => $row) { //统计所有的X 和 O的数量
            for ($i = 0; $i < strlen($row); $i++) {
                $xCount = ($row{$i} === 'X') ? ($xCount + 1) : $xCount;
                $oCount = ($row{$i} === 'O') ? ($oCount + 1) : $oCount;
            }
        }
        if ($oCount != $xCount && $oCount !== $xCount - 1) {//O和X不等 并且 O没有比X小1
            return false;
        }
        if ($this->win($board, 'X') && $oCount !== $xCount - 1) {
            return false;
        }
        if ($this->win($board, 'O') && $oCount !== $xCount) {
            return false;
        }
        return true;
    }

    function win($board, $p)
    {
        for ($i = 0; $i < 3; ++$i) {
            //三连
            if ($p === $board[0][$i] && $p === $board[1][$i] && $p === $board[2][$i]) {
                return true;
            }
            if ($p === $board[$i][0] && $p === $board[$i][1] && $p === $board[$i][2]) {
                return true;
            }
        }
        //斜连
        if ($p === $board[0][0] && $p === $board[1][1] && $p === $board[2][2]) {
            return true;
        }
        //斜连
        if ($p === $board[0][2] && $p === $board[1][1] && $p === $board[2][0]) {
            return true;
        }
        return false;
    }
}

//$board = ["XOX", " X ", "   "];
$board = ["XOX", "O O", "XOX"];
$class = new Solution();
var_dump($class->validTicTacToe($board));