<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/28
 * Time: 15:30
 */


include_once "Common.php";

//给定一个正整数 n，生成一个包含 1 到 n2 所有元素，且元素按顺时针顺序螺旋排列的正方形矩阵。
//
// 示例:
//
// 输入: 3
//输出:
//[
// [ 1, 2, 3 ],
// [ 8, 9, 4 ],
// [ 7, 6, 5 ]
//]
//

class Solution {

    /**
     * @param eger $n
     * @return eger[][]
     */
    function generateMatrix($n){
        $left = $up = 0;
        $right = $down = $n - 1;
        $result = [];
        $num = 1;
        $tar = $n * $n;
        while ($num <= $tar) {
            for ($i = 1; $i <= $right; $i++) $result[$up][$i] = $num++; // left to right.
            $up++;
            for ($i = $up; $i <= $down; $i++) $result[$i][$right] = $num++; // up to down.
            $right--;
            for ($i = $right; $i >= 1; $i--) $result[$down][$i] = $num++; // right to left.
            $down--;
            for ($i = $down; $i >= $up; $i--) $result[$i][$left] = $num++; // down to up.
            $left++;
        }
        return $result;
    }
}