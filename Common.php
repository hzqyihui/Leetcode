<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/25
 * Time: 13:43
 */


/**
 * 打印参数并停止代码执行
 *
 * @param $param
 */
function dd($param){
    var_dump($param);die;
}