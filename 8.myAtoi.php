<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/28
 * Time: 15:30
 */


include_once "Common.php";


/**
 * 请你来实现一个 atoi 函数，使其能将字符串转换成整数。
 *
 * 首先，该函数会根据需要丢弃无用的开头空格字符，直到寻找到第一个非空格的字符为止。
 *
 *
 * 当我们寻找到的第一个非空字符为正或者负号时，则将该符号与之后面尽可能多的连续数字组合起来，作为该整数的正负号；假如第一个非空字符是数字，则直接将其与之后连续的数字字符组合起来，形成整数。
 *
 * 该字符串除了有效的整数部分之后也可能会存在多余的字符，这些字符可以被忽略，它们对于函数不应该造成影响。
 *
 * 注意：假如该字符串中的第一个非空格字符不是一个有效整数字符、字符串为空或字符串仅包含空白字符时，则你的函数不需要进行转换。
 *
 * 在任何情况下，若函数不能进行有效的转换时，请返回 0。
 *
 * 说明：
 *
 * 假设我们的环境只能存储 32 位大小的有符号整数，那么其数值范围为 [−2^31,  2^31 − 1]。如果数值超过这个范围，qing返回
 * INT_MAX (2^31 − 1) 或 INT_MIN (−2^31) 。
 *
 * 示例 1:
 *
 * 输入: "42"
 * 输出: 42
 *
 *
 * 示例 2:
 *
 * 输入: "   -42"
 * 输出: -42
 * 解释: 第一个非空白字符为 '-', 它是一个负号。
 * 我们尽可能将负号与后面所有连续出现的数字组合起来，最后得到 -42 。
 *
 *
 * 示例 3:
 *
 * 输入: "4193 with words"
 * 输出: 4193
 * 解释: 转换截止于数字 '3' ，因为它的下一个字符不为数字。
 *
 *
 * 示例 4:
 *
 * 输入: "words and 987"
 * 输出: 0
 * 解释: 第一个非空字符是 'w', 但它不是数字或正、负号。
 * ⁠    因此无法执行有效的转换。
 *
 * 示例 5:
 *
 * 输入: "-91283472332"
 * 输出: -2147483648
 * 解释: 数字 "-91283472332" 超过 32 位有符号整数范围。
 * 因此返回 INT_MIN (−2^31) 。
 *
 *
 */

$str    = "3.114";
$result = myAtoi($str);
dd($result);

/**
 * @param String $str
 * @return Integer
 */
function myAtoi($str)
{
    $str    = trim($str);
    $length = strlen($str);
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        if ($i == 0 && $str[$i] != '-' && $str[$i] != '+' && !is_numeric($str[$i])) {
            //Step 1: 当第一个字符不为正负号或非数字，则直接返回0
            return 0;
        }
        if ($i == 0 && ($str[$i] == '-' || $str[$i] == '+' || is_numeric($str[$i]))) {
            //Step 2: 如果第一个字符是正负号或数字，则直接链接字符串
            $result .= $str[$i];
        }
        if ($i > 0) {
            if ($i == 1) {
                //在经过Step1, Step 2后，第一个字符要么是数字，要么就是正负号，则直接进行连接，这就可能后面连续都是0，这个放在后续处理
                if (is_numeric($str[$i]) && (is_numeric($str[$i - 1]) || $str[$i - 1] == '-' || $str[$i - 1] == '+')) {
                    $result .= $str[$i];
                } else {
                    break;
                }
            } else {
                //在下标1过了后，就只需要判断当前下标和前一个下标对应值是否为数字即可，直接进行连接。
                if (is_numeric($str[$i]) && is_numeric($str[$i - 1])) {
                    $result .= $str[$i];
                } else {
                    break;
                }
            }
        }
    }
    if (isset($result[0]) && $result[0] == '+') {
        $result = substr($result, 1);
    }
    if (isset($result[0]) && $result[0] == '-') {
        $result = substr($result, 1);
        $result = ltrim($result, '0');
        $result = '-'.$result;
    }
    $result = ltrim($result, '0');
//    $result = intval($result);
    (empty($result) || $result == '-') && $result = 0;
    if (is_numeric($result)) {
        $result > pow(2, 31)-1 && $result = pow(2, 31)-1;
        $result < pow(-2, 31) && $result = pow(-2, 31);
    }
    return $result;
}