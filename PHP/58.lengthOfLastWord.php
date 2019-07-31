<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/28
 * Time: 15:30
 */


include_once "Common.php";


/**
 * 给定一个仅包含大小写字母和空格 ' ' 的字符串，返回其最后一个单词的长度。
 *
 * 如果不存在最后一个单词，请返回 0 。
 *
 * 说明：一个单词是指由字母组成，但不包含任何空格的字符串。
 *
 * 示例:
 *
 * 输入: "Hello World"
 * 输出: 5
 *
 */

$str    = "a ";
$result = lengthOfLastWord($str);
dd($result);

/**
 * @param String $s （解法1：自带函数）
 * @return Integer
 */
function lengthOfLastWord($s) {
    $array = array_filter(explode(' ', $s));
    return strlen(end($array));
}