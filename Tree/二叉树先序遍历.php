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
     * 先序遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        $result = [];
        if (!empty($root)) {
            $stack = new SplStack();
            //一开始把根节点压到栈里，
            $stack->push($root);
            while (!$stack->isEmpty()) {
                //只要栈不为空，把栈顶弹出来，
                $cur = $stack->pop();
                $result[] = $cur->value;
                //先压右孩子， 因为前序是 根 左 右 的顺序， 所以先压右，再压左，弹出的时候才好保持顺序
                if (!empty($cur->right)) {
                    $stack->push($cur->right);
                }
                if (!empty($cur->left)) {
                    $stack->push($cur->left);
                }
            }
        }
        return $result;
    }
}