<?php
/**
 * =====================================================================================
 *
 *        Filename: N年母牛递归.php
 *
 *     Description: 汉诺塔就是，三根柱子， 第一根上放着从上到下，从小到大的盘子， 需要把第一根上的所有盘子，借助第二根移动到第三根上（大小顺序
 *                  不变）。且每次只能移动一个盘子，且必须保证每根柱子上都是大在下，小在上的原则摆放。
 *
 *         Created: 2020-02-18 22:22:51
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */

function Bull($year, $bullNumber)
{
    if ($year == 1 || $year == 2 || $year == 3) {
        return 2;  //一年后，两只母牛， 一个母牛生了一个母牛
    }
    $bullNumber = $year - 3 + $bullNumber;
    return $bullNumber + Bull($year - 1, $bullNumber);
}

function Bull2($year)
{
    if (in_array($year, [1, 2, 3, 4])) {
        return $year;  //一年后，两只母牛， 一个母牛生了一个母牛
    }
    return Bull2($year - 1) + Bull2($year - 3);
}

function Bull3($year)
{
    $result = [];
    for ($i = 1; $i <= $year; $i++) {
        if (in_array($i, [1, 2, 3, 4])) {
            $result[$i] = $i;
        } else {
            $result[$i] = $result[$i - 1] + $result[$i - 3];
        }
    }
    return $result[$year];
}

$bullNumber = Bull3(6);
printf("母牛的总个数%d\n", $bullNumber);