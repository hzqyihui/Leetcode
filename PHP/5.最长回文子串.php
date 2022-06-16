<?php

/**
 * 给你一个字符串 s，找到 s 中最长的回文子串。
 *
 *  
 *
 * 示例 1：
 *
 * 输入：s = "babad"
 * 输出："bab"
 * 解释："aba" 同样是符合题意的答案。
 * 示例 2：
 *
 * 输入：s = "cbbd"
 * 输出："bb"
 *  
 *
 * 提示：
 *
 * 1 <= s.length <= 1000
 * s 仅由数字和英文字母组成
 */

$test = new Solution();
$s    = 'babad';
$test->longestPalindrome($s);

class Solution
{

    /**
     * @param  String  $s
     *
     * @return String
     */
    function longestPalindrome($s)
    {
        $str_arr = str_split($s);
        $result  = 0;
        for ($i = 0; $i < count($str_arr); $i++) {
            echo "Step 1:";
            $leng1 = $this->palindrome($s, $i, $i);
            echo "Step 2:";
            $leng2  = $this->palindrome($s, $i, $i + 1);
            $result = strlen($result) > strlen($leng1) ? $result : $leng1;
            $result = strlen($result) > strlen($leng2) ? $result : $leng2;
        }
        return $result;
    }

    function palindrome($s, $left, $right)
    {
        $str_arr = str_split($s);
        while ($left >= 0 && $right < count($str_arr) && $str_arr[$left] == $str_arr[$right]) {
            $right++;
            $left--;
        }
        echo 'left: ' . $left . "\n" . 'right:' . $right . "\n";
        return substr($s, $left + 1, $right - $left + 1);
    }
}