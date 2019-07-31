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
 * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 *
 * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
 *
 * 您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
 *
 * 示例：
 *
 * 输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 * 输出：7 -> 0 -> 8
 * 原因：342 + 465 = 807
 */
// Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

/**
 * 两数相加，第一种解法（已通过）
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function addTwoNumbersBackup($l1, $l2)
{
    $result = new ListNode(0);
    $nextRst = $result;
    $carry = $singleValue = 0;
    while (!empty($l1) || !empty($l2)) {
        $aValue = !empty($l1) ? $l1->val : 0;
        $bValue = !empty($l2) ? $l2->val : 0;
        $singleValue = ($aValue + $bValue + $carry) % 10;
        $carry = floor(($aValue + $bValue + $carry) / 10);
        $nextRst->next = new ListNode($singleValue);
        $nextRst = $nextRst->next;
        if (!empty($l1)) {
            $l1 = $l1->next;
        }
        if (!empty($l2)) {
            $l2 = $l2->next;
        }
    }
    if ($carry) {
        $nextRst->next = new ListNode($carry);
    }
    return $result->next;
}

/**
 * 两数相加，第二种解法（已通过）
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function addTwoNumbers($l1, $l2)
{
    //首先初始化一个新的链表，头结点设为0值，因为0代表着没值。
    $result = new ListNode(0);
    $nextRst = $result;
    //设立两个变量，一个是进位值$carry（只会有0和1），一个$singleValue是两个相同节点相加后模10后的值。
    $carry = $singleValue = 0;
    //对两个链表进行循环，只要有一个没有遍历完，都继续
    while (!empty($l1) || !empty($l2)) {
        //Step 1:分别把两个节点的值复制给对应变量
        $aValue = !empty($l1) ? $l1->val : 0;
        $bValue = !empty($l2) ? $l2->val : 0;
        //Step 2:两个值相加后加上进位值（也就是$carry，初次循环默认就是函数初始化时的0），最后模10
        $singleValue = ($aValue + $bValue + $nextRst->val) % 10;
        //Step 3:同上，只是这里计算进位值
        $carry = floor(($aValue + $bValue + $nextRst->val) / 10);
        //Step 4:把模10后的值，赋值给$nextRst当前节点的值，
        $nextRst->val = $singleValue;
        if (!empty($l1)) {
            $l1 = $l1->next;
        }
        if (!empty($l2)) {
            $l2 = $l2->next;
        }
        if (!empty($l1) || !empty($l2)) {
            //Step 5:把进位传给下一个节点的val值，备用（给Step 2，Step 3使用）
            $nextRst->next = new ListNode($carry);
            //Step 6:节点遍历
            $nextRst = $nextRst->next;
        }
    }
    if ($carry) {
        //此处判断的原因在于，当两个链表中最后一个节点相加完成后，仍然有进位，那就只能新增一个节点1了
        $nextRst->next = new ListNode($carry);
    }
    return $result;
}