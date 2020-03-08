<?php
/**
 * =====================================================================================
 *
 *        Filename: 相邻两数最大差值.php
 *
 *     Description:
 *
 *         Created: 2020-03-01 21:21:33
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";

$a = new SplStack();
$a->push(1);
$a->push(2);
$a->push(3);
print($a->pop()."\n");
dd($a->top());

$array = [1, 2, 4, 6, 3, 7, 2, 6, 5, 7, 1, 5, 9];
$res   = maxGap($array);
dd($res);

function maxGap($array)
{
    $length = count($array);
    if (empty($array) || $length < 2) {
        return 0;
    }
    $minNum = null;
    $maxNum = null;
    //迭代找出数组中最大最小值。
    for ($i = 0; $i < $length; $i++) {
        $minNum = min($minNum, $array[$i]);
        $maxNum = max($maxNum, $array[$i]);
    }
    if ($minNum == $maxNum) {
        //如果得到的最大值最小值相同，则是一堆相同的数，则差值为0
        return 0;
    }
    //$hasNum, $maxArray, $minArray 相同的下标，三者联合起来看，相当于就是一个桶
    $hasNum   = array_fill(0, $length + 1, false); // 标记各个桶是否加入了数据的。
    $maxArray = array_fill(0, $length + 1, 0);
    $minArray = array_fill(0, $length + 1, 0);
    $bid      = 0;
    for ($i = 0; $i < $length; $i++) {
        //$bid 代表 元素该进入哪个桶中
        $bid            = bucket($array[$i], $length, $minNum, $maxNum);
        $minArray[$bid] = $hasNum[$bid] ? min($minArray[$bid], $array[$i]) : $array[$i];
        $maxArray[$bid] = $hasNum[$bid] ? max($maxArray[$bid], $array[$i]) : $array[$i];
        $hasNum[$bid]   = true;
    }
    $result  = 0;
    $lastMax = $maxArray[0];
    for ($i = 1; $i <= $length; $i++) {
        if ($hasNum[$i]) {
            $result  = max($result, $minArray[$i] - $lastMax);
            $lastMax = $maxArray[$i];
        }
    }
    return $result;
}

/**
 * 找出数据对应的桶的下标是什么。
 * @param $number
 * @param $length
 * @param $min
 * @param $max
 * @return int
 */
function bucket($number, $length, $min, $max)
{
    return intval(($number - $min) * $length / ($max - $min));
}
