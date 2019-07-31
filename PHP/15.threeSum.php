<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/26
 * Time: 15:30
 */


include_once "Common.php";

/**
 *
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。
 *
 * 注意：答案中不可以包含重复的三元组。
 *
 * 例如, 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 *
 * 满足要求的三元组集合为：
 * [
 * [-1, 0, 1],
 * [-1, -1, 2]
 * ]
 */

$a = [-1, -3, -2, 4, 0];
sort($a);
dd($a);

/**
 * @param Integer[] $nums
 * @return Integer[][]
 */
function threeSum($nums)
{
    $length = count($nums);
    sort($nums);
    if ($length < 3) {
        return [];
    }
    for ($i = 0; $i < $length; $i++) {

    }
}