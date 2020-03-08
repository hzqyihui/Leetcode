<?php
/**
 * =====================================================================================
 *
 *        Filename: 荷兰国旗问题.php
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

$array = [1,2,4,6,3,7,2,6,5,7,1,5,9];
$left = 0;
$right = count($array)-1;
$number = 2;
$res = Netherlands($array, $left, $right, $number);
dd($res);

/**
 * 给定一个数组arr，和一个数num，请把小于等于num的数放在数 组的左边，大于num的数放在数组的右边。
 * 要求额外空间复杂度O(1)，时间复杂度O(N)
 * 问题二（荷兰国旗问题）
 * 给定一个数组arr，和一个数num，请把小于num的数放在数组的 左边，等于num的数放在数组的中间，大于num的数放在数组的 右边。
 * 要求额外空间复杂度O(1)，时间复杂度O(N)
 * @param $array
 * @param $left
 * @param $right
 * @param $number
 * @return mixed
 */
function Netherlands($array, $left, $right, $number)
{
    //设定两个便捷，分别是Less 和 More
    $less    = $left - 1;
    $more    = $right + 1;
    $current = $left;
    while ($current < $more) {
        if ($array[$current] < $number) {
            //如果当前数据比number 小，则替换当前值与less后一个位置的数进行交换，并让less加一个位置
            swap($array, $current++, ++$less);
        }elseif ($array[$current] > $number){
            //如果当前值比number大，则交换当前值与More前面那个数，因为交换后，不知道后面那个数具体是什么，所以current不增加，进入下一轮比较
            swap($array, $current, --$more);
        }else{
            //如果相等，则不进行任何交换，直接指针往前移动
            $current++;
        }
    }
    return $array;
}

/**
 * 交换数据
 * @param $array
 * @param $one
 * @param $two
 */
function swap(&$array, $one, $two)
{
    $temp        = $array[$one];
    $array[$one] = $array[$two];
    $array[$two] = $temp;
}
