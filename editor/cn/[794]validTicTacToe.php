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
        $xCount = 0;
        $oCount = 0;
        foreach ($board as $key => $row) {
            for ($i = 0; $i < strlen($row); $i++) {
                $xCount = ($row{$i} === 'X') ? ($xCount + 1) : $xCount;
                $oCount = ($row{$i} === 'O') ? ($oCount + 1) : $oCount;
            }
        }
        if ($oCount != $xCount && $oCount !== $xCount - 1) {
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
            if ($p === $board[0][$i] && $p === $board[1][$i] && $p === $board[2][$i]) {
                return true;
            }
            if ($p === $board[$i][0] && $p === $board[$i][1] && $p === $board[$i][2]) {
                return true;
            }
        }
        if ($p === $board[0][0] && $p === $board[1][1] && $p === $board[2][2]) {
            return true;
        }
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