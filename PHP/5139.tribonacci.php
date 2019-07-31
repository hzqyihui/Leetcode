<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/28
 * Time: 15:30
 */


include_once "Common.php";


/**
 * 泰波那契序列 Tn 定义如下：
 *
 * T0 = 0, T1 = 1, T2 = 1, 且在 n >= 0 的条件下 Tn+3 = Tn + Tn+1 + Tn+2
 *
 * 给你整数 n，请返回第 n 个泰波那契数 Tn 的值。
 *
 * 示例 1：
 *
 * 输入：n = 4
 * 输出：4
 * 解释：
 * T_3 = 0 + 1 + 1 = 2
 * T_4 = 1 + 1 + 2 = 4
 *
 * 示例 2：
 *
 * 输入：n = 25
 * 输出：1389537
 *
 *
 * 提示：
 *
 * 0 <= n <= 37
 * 答案保证是一个 32 位整数，即 answer <= 2^31 - 1
 */

$n = 25;
$testInstance = new Solution();
$result = $testInstance->tribonacci($n);
dd($result);


class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n)
    {
        if ($n == 0 || $n == 1 || $n == 2) {
            $result = 0;
            ($n == 1 || $n == 2) && $result = 1;
            return $result;
        }
        if ($n < 6) {
            $temp1 = $this->tribonacci($n - 1);
            $temp2 = $this->tribonacci($n - 2);
            $temp3 = $this->tribonacci($n - 3);
            return $temp1 + $temp2 + $temp3;
        }
        $temp1 = 7 * $this->tribonacci($n - 4);
        $temp2 = 6 * $this->tribonacci($n - 5);
        $temp3 = 4 * $this->tribonacci($n - 6);
        return $temp1 + $temp2 + $temp3;
    }
}