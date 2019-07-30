<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/25
 * Time: 10:42
 */

include_once "Common.php";

/**
 * 题目
 *
 * 给定两个字符串形式的非负整数 num1 和num2 ，计算它们的和。
 * 注意：
 *
 * num1 和num2 的长度都小于 5100.
 * num1 和num2 都只包含数字 0-9.
 * num1 和num2 都不包含任何前导零。
 * 你不能使用任何內建 BigInteger 库， 也不能直接将输入的字符串转换为整数形式。
 */

$num1 = '4544154156486646847864616841';
$num2 = '23423565467613488663427657353453453464564134123';
$result = addStrings($num1, $num2);
var_dump($result);

/**
 * @param String $num1
 * @param String $num2
 * @return String
 */
function addStrings($num1, $num2)
{
    $num1Size = strlen($num1);
    $num2Size = strlen($num2);
    //如果两个字符串位数不相同，则在位数小的字符串前面，以0来填充
    while ($num1Size > $num2Size) {
        $num2 = '0' . $num2;
        $num2Size = $num2Size + 1;
    }
    while ($num1Size < $num2Size) {
        $num1 = '0' . $num1;
        $num1Size = $num1Size + 1;
    }
    $result = str_split($num1);
    $carry = 0;
    for ($i = $num1Size - 1; $i >= 0; --$i) {
        $singleValue = $result[$i] + $num2[$i];
        $result[$i] = $singleValue % 10;
        $carry = floor($singleValue / 10);
        if ($i > 0) {
            $result[$i - 1] = $result[$i - 1] + $carry;
        }
    }
    if ($carry > 0) {
        $result = $carry . implode('', $result);
    }
    if (is_array($result)) {
        $result = implode('', $result);
    }
    return $result;
}