<?php
/**
 * =====================================================================================
 *
 *        Filename: interview.php
 *
 *     Description:
 *
 *         Created: 2020-02-12 22:22:19
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";
// 这里不是很懂，不知道为什么 $var2 会变成2
/*$GLOBALS['var1'] = 5;
$var2 = 1;
function get_value(){
    global $var2;
    $var1 = 0;
    return $var2++;
}
get_value();
echo $var1;
echo $var2;*/


function get_arr(&$arr){
    unset($arr[0]);
}
$arr1 = array(1, 2);
$arr2 = array(1, 2);
get_arr($arr1);
get_arr($arr2);
echo count($arr1);
echo count($arr2);