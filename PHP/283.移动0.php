<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/25
 * Time: 14:05
 */

include_once "Common.php";

/**
 * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
 * 
 *  示例:
 * 
 *  输入: [0,1,0,3,12]
 * 输出: [1,3,12,0,0]
 * 
 *  说明:
 * 
 * 
 *  必须在原数组上操作，不能拷贝额外的数组。
 *  尽量减少操作次数。
 */

$num    = [0,1,0,12,3];
$result = moveZeroes($num);
dd($result);

/**
 * @param Integer[] $nums
 * @return NULL
 */
//function moveZeroes(&$nums) {
//    $originLength = count($nums);
//    $nums = array_filter($nums, function ($num){
//        return $num !== 0;
//    });
//    $newLength = count($nums);
//    for($i = 0; $i< $originLength - $newLength; $i++){
//        array_push($nums, 0);
//    }
//    return $nums;
//}

function moveZeroes(&$nums) {
    if(empty($nums)){
        return $nums;
    }
    $slow = $fast=0;
    while ($fast < count($nums)){
        if($nums[$fast] != 0){
            $nums[$slow] = $nums[$fast];
            $slow++;
        }
        $fast++;
    }
    for (;$slow<count($nums);$slow++){
        $nums[$slow] = 0;
    }
    return $nums;

}