<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/9/25
 * Time: 13:34
 */
include_once "Common.php";

class A {
    public static function fooStatic() {
        static::who();
    }
    public static function who() {
        echo __CLASS__."aaa\n";
    }
}
class B extends A {
    public static function testStatic() {
        A::fooStatic();
        B::fooStatic();
        C::fooStatic();
        parent::fooStatic();
        self::fooStatic();
    }
    public static function who() {
        echo __CLASS__."bbb\n";
    }
}
class C extends B {
    public static function who() {
        echo __CLASS__."ccc\n";
    }
}
C::testStatic();



