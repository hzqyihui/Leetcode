<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if(empty($root)){
            return [];
        }
        $result = [];
        $queue = new SplQueue();
        $queue->push($root);
        while (!$queue->isEmpty()){
            $root = $queue->pop();
            $result[] = $root->val;
            if(!empty($root->left)){
                $queue->push($root->left);
            }
            if(!empty($root->right)){
                $queue->push($root->right);
            }
        }
        return $result;
    }

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder2($root) {
        if(empty($root)){
            return [];
        }

        $result = [];
        $queue = new SplQueue();
        $queue->push($root);
        while (!$queue->isEmpty()){
            $root = $queue->pop();
            $result[] = $root->val;
            if(!empty($root->left)){
                $queue->push($root->left);
            }
            if(!empty($root->right)){
                $queue->push($root->right);
            }
        }
        return $result;
    }
}


function BKDRHash($str)
{
    $seed = 131; // 31 131 1313 13131 131313 etc..
    $hash = 0;

    $cnt = strlen($str);

    for($i = 0; $i < $cnt; $i++)
    {

        $hash = ((floatval($hash * $seed) & 0x7FFFFFFF) + ord($str[$i])) & 0x7FFFFFFF;

    }
    return ($hash & 0x7FFFFFFF);
}


var_dump(BKDRHash("asrdtfbghsrtwbhrstbhsdertbhsrtybherstbhyerstghetyuiki8uk96"));