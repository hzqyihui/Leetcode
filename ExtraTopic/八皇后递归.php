<?php
/**
 * =====================================================================================
 *
 *        Filename: 八皇后递归.php
 *
 *     Description: 八皇后问题就是， 在一个8X8的棋盘上， 在第每一行都摆放一个皇后（国际象棋），然后，让该位置所在的行，列，左右斜线都没有
 *                  相应的棋子， 因为皇后很厉害，符合以上规则的都可以被它吃掉。这样摆放，一共有多少种摆法。
 *
 *         Created: 2020-02-18 22:22:51
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
include_once "Common.php";

// 多少种方式
global $countNumber;


/**
 *
 * @param $row  int 当前皇后所处的行数
 * @param $column Int 当前皇后所处的列数
 * @param $array array 二维数组棋盘
 * @return bool
 */
function notDangerous($row, $column, $array)
{
    //第1步：判断同一列是否有棋子。（无需判断同一行是否有，因为按照我们的逻辑，只会在一行摆放一个皇后）
    for ($j = 0; $j < 8; $j++) {
        if ($array[$j][$column] == 1) {
            //差点上了这里一个大当， 我这里要比的是 相同列，不同行的。所以变化的应该是 第一个下标。刚开始写 写成了第二个下标
            //如果这一列下，除了自己外，还有别的棋子，则危险
            return false;
        }
    }

    //第2步：判断斜线，斜线需要分成，左上，左下，右上，右下来分别进行判断。
    //2.1, 左上， 行数列数，都减小
    for ($i = $row, $j = $column; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    //2.2, 左下， 行数增大， 列数减小
    for ($i = $row, $j = $column; $i < 8 && $j >= 0; $i++, $j--) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    //2.3, 右上， 行数减小， 列数增大
    for ($i = $row, $j = $column; $i >= 0 && $j < 8; $i--, $j++) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    //2.4, 右下， 行数增大， 列数增大
    for ($i = $row, $j = $column; $i < 8 && $j < 8; $i++, $j++) {
        if ($array[$i][$j] == 1) {
            return false;
        }
    }
    return true;
}

/**
 * 八皇后排布
 * @param int $row 表示起始行，
 * @param int $column 表示共有多少列
 * @param array $array 二维数组
 */
function EightQueen($row = 0, $column = 0, $array = [])
{
    $i          = $j = 0;
    $printArray = []; //改变了 仅仅 因为 需要打印，所以弄了个新变量，也可以不用
    //第一步：用原数组初始化一个二维数组, 用户向用户展示棋盘的
    for ($i = 0; $i < 8; $i++) {
        for ($j = 0; $j < 8; $j++) {
            $printArray[$i][$j] = $array[$i][$j];
        }
    }
    if ($row == 8) {
        for ($i = 0; $i < 8; $i++) {
            for ($j = 0; $j < 8; $j++) {
                printf("%d ", $printArray[$i][$j]);
            }
            printf("\n");
        }
        printf("\n");
        //已经到了下标为8的时候了，则代表之前所有的摆放都是可行的，所以countNumber加一
        $GLOBALS['countNumber']++;
    } else {
        //第二步：设置皇后位置
        for ($j = 0; $j < $column; $j++) {
            if (notDangerous($row, $j, $printArray)) {
                //这段代码非常重要。需要好好理解下。没有这段代码，就是错误的。
                //
                for ($n = 0; $n < 8; $n++) {
                    $printArray[$row][$n] = 0;
                }
                $printArray[$row][$j] = 1;
                EightQueen($row + 1, $column, $printArray);
            }
        }
    }

}

$tempArray = [];
//第一步：初始化一个二维数组
for ($i = 0; $i < 8; $i++) {
    for ($j = 0; $j < 8; $j++) {
        $tempArray[$i][$j] = 0;
    }
}
EightQueen(0, 8, $tempArray);
echo $countNumber;