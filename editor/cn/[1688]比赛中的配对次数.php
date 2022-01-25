<?php
//给你一个整数 n ，表示比赛中的队伍数。比赛遵循一种独特的赛制： 
//
// 
// 如果当前队伍数是 偶数 ，那么每支队伍都会与另一支队伍配对。总共进行 n / 2 场比赛，且产生 n / 2 支队伍进入下一轮。 
// 如果当前队伍数为 奇数 ，那么将会随机轮空并晋级一支队伍，其余的队伍配对。总共进行 (n - 1) / 2 场比赛，且产生 (n - 1) / 2 + 1
// 支队伍进入下一轮。 
// 
//
// 返回在比赛中进行的配对次数，直到决出获胜队伍为止。 
//
// 
//
// 示例 1： 
//
// 输入：n = 7
//输出：6
//解释：比赛详情：
//- 第 1 轮：队伍数 = 7 ，配对次数 = 3 ，4 支队伍晋级。
//- 第 2 轮：队伍数 = 4 ，配对次数 = 2 ，2 支队伍晋级。
//- 第 3 轮：队伍数 = 2 ，配对次数 = 1 ，决出 1 支获胜队伍。
//总配对次数 = 3 + 2 + 1 = 6
// 
//
// 示例 2： 
//
// 输入：n = 14
//输出：13
//解释：比赛详情：
//- 第 1 轮：队伍数 = 14 ，配对次数 = 7 ，7 支队伍晋级。
//- 第 2 轮：队伍数 = 7 ，配对次数 = 3 ，4 支队伍晋级。 
//- 第 3 轮：队伍数 = 4 ，配对次数 = 2 ，2 支队伍晋级。
//- 第 4 轮：队伍数 = 2 ，配对次数 = 1 ，决出 1 支获胜队伍。
//总配对次数 = 7 + 3 + 2 + 1 = 13
// 
//
// 
//
// 提示： 
//
// 
// 1 <= n <= 200 
// 
// Related Topics 数学 模拟 
// 👍 54 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    private $time = 0;

    /**
     * @param Integer $n
     * @return Integer
     */
    function numberOfMatches($n)
    {
        if ($n == 2) {
            $this->time += 1;
        } elseif ($n == 1) {
            return 0;
        } else {
            if ($n % 2 == 0) {//偶数
                $this->time = $this->time + ($n / 2);

                $this->numberOfMatches($n / 2);
            } else {
                $this->time = $this->time + floor($n / 2); //包含一只轮空队伍

                $this->numberOfMatches(ceil($n / 2));
            }
        }


        return (int)$this->time;
    }
}

$n     = 1;
$class = new Solution();
var_dump($class->numberOfMatches($n));
//leetcode submit region end(Prohibit modification and deletion)
