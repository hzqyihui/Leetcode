<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/26
 * Time: 15:30
 */


include_once "Common.php";


/**
 * 给定两个二进制字符串，返回他们的和（用二进制表示）。
 *
 * 输入为非空字符串且只包含数字 1 和 0。
 *
 * 示例 1:
 *
 * 输入: a = "11", b = "1"
 * 输出: "100"
 * 示例 2:
 *
 * 输入: a = "1010", b = "1011"
 * 输出: "10101"
 */

/**
 * @param String $a
 * @param String $b
 * @return String
 */
function addBinary($a, $b)
{
    $aSize = strlen($a);
    $bSize = strlen($b);
    //Step 1:计算出每个字符串的长度后，进行比较，以0来填充字符串确保两个字符串位数相同
    while ($aSize > $bSize) {
        $b = '0' . $b;
        ++$bSize;
    }
    while ($aSize < $bSize) {
        $a = '0' . $a;
        ++$aSize;
    }
    for ($i = $aSize - 1; $i >= 0; $i--) {
        //Step 2: 经Step 1后，两字符串位数已经相同，$aSize-1后的下标即为最后一位数的下标，即从末位开始进行相加
        $a[$i] = $a[$i] + $b[$i];
        if ($i != 0) {
            //当下标没有到第一个字符的时候，判断相加之和是否大于1，大于1则需要进位
            if ($a[$i] > 1) {
                //把相加之和取模2后的值赋值给当前下标对应值
                $a[$i] = $a[$i] % 2;
                //顺便把前一个下标对应值先加一个进位，这样在下一轮循环的时候，该值已为最新值了
                $a[$i - 1] = $a[$i - 1] + 1;
            }
        } else {
            //由于下标0比较特殊，可能两数相加后，会产生一个位数大1的数，则需要再连接一个字符1在字符串前，最后才是正确结果。
            if ($a[$i] > 1) {
                $a[$i] = $a[$i] % 2;
                $a = '1' . $a;
            }
        }
    }
    return $a;
}