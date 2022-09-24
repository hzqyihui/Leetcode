<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root)
    {
        $result = $this->isB($root);
        return $result[0];
    }

    /**
     * @param TreeNode $root
     * @return array
     */
    function isB($root)
    {
        if (empty($root)) {
            return [true, 0];
        }
        $leftData = $this->isB($root->left);
        if (!$leftData[0]) {
            return [false, 0];
        }
        $rightData = $this->isB($root->right);
        if (!$rightData[0]) {
            return [false, 0];
        }
        if (abs($leftData[1] - $rightData[1]) > 1) {
            return [false, 0];
        }
        return [true, max($leftData[1], $rightData[1]) + 1];

    }
}