<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/25
 * Time: 14:05
 */

include_once "Common.php";

/**
 * 给定一个二叉树，返回它的中序 遍历。
 *
 *  示例:
 *
 *  输入: [1,null,2,3]
 *    1
 *     \
 *      2
 *     /
 *    3
 *
 * 输出: [1,3,2]
 *
 *  进阶: 递归算法很简单，你可以通过迭代算法完成吗？
 *
 *
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

$num = [1, 2, 3, 2, 3];
$result = removeElement($num, 1);
dd($result);

class Solution
{

    /**
     * 中序遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        $result = [];
        if (!empty($root)) {
            $stack = new SplStack();
            while (!$stack->isEmpty() || !empty($root)) {
                if (!empty($root)) {
                    //只要节点不为空，就先把左孩子全部压入栈中，满足，左中右的 遍历顺序
                    $stack->push($root);
                    $root = $root->left;
                } else {
                    //为空后，就弹出，把指针指向右孩子
                    $root = $stack->pop();
                    $result[] = $root->val;
                    $root = $root->right;
                }
            }
        }
        return $result;
    }
}