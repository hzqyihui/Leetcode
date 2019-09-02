<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/28
 * Time: 15:30
 */


include_once "Common.php";


/**
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 *
 * 示例 1:
 *
 * 输入: "abcabcbb"
 * 输出: 3
 * 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
 *
 *
 * 示例 2:
 *
 * 输入: "bbbbb"
 * 输出: 1
 * 解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
 *
 *
 * 示例 3:
 *
 * 输入: "pwwkew"
 * 输出: 3
 * 解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
 * 请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
 *
 */

$str = "abcabcbb";
$result = lengthOfLongestSubstring($str);
dd($result);

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s){
    if (empty($s)) {
        return 0;
    }
    $strArr = str_split($s);
    $length = strlen($s);
    $temp = [];
    $maxNumber = 0;
    $left = 0;
    for ($i = 0; $i < $length; $i++) {
        if (array_key_exists($strArr[$i], $temp)) {
            $left = max($left, $temp[$strArr[$i]] + 1);
        }
        $temp[$strArr[$i]] = $i;
        $maxNumber = max($maxNumber, $i - $left +1);
    }
    return $maxNumber;
}