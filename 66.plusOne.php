<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/28
 * Time: 15:30
 */


include_once "Common.php";


/**
 * 给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。
 *
 * 最高位数字存放在数组的首位， 数组中每个元素只存储一个数字。
 *
 * 你可以假设除了整数 0 之外，这个整数不会以零开头。
 *
 * 示例 1:
 *
 * 输入: [1,2,3]
 * 输出: [1,2,4]
 * 解释: 输入数组表示数字 123。
 *
 *
 * 示例 2:
 *
 * 输入: [4,3,2,1]
 * 输出: [4,3,2,2]
 * 解释: 输入数组表示数字 4321。
 *
 *
 */

$str    = [0];
$result = plusOne($str);
dd($result);

/**
 * @param Integer[] $digits
 * @return Integer[]
 */
function plusOne($digits) {
    if(empty($digits)){
        return [1];
    }
    $length = count($digits);
    for ($i = $length -1; $i >= 0; $i--){
        $addNumber = 0;
        if($i == $length -1){
            $addNumber = 1;
        }
        $singleValue = ($digits[$i] +$addNumber) % 10;
        $carry = floor(($digits[$i] + $addNumber)/10);
        $digits[$i] = $singleValue;
        if($i != 0){
            $digits[$i-1] += $carry;
        }elseif($carry){
            array_unshift($digits,1);
        }
    }
    return $digits;
}