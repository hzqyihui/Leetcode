//给定一个二叉树和一个目标和，找到所有从根节点到叶子节点路径总和等于给定目标和的路径。 
//
// 说明: 叶子节点是指没有子节点的节点。 
//
// 示例: 
//给定如下二叉树，以及目标和 sum = 22， 
//
//               5
//             / \
//            4   8
//           /   / \
//          11  13  4
//         /  \    / \
//        7    2  5   1
// 
//
// 返回: 
//
// [
//   [5,4,11,2],
//   [5,8,4,5]
//]
// 
//

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer[][]
     */
    function pathSum($root, $sum) {
        if(empty($root)){
        $result = [];
        $this->helper($root, $sum, [], $result);
        return $result;
    }

    function helper($root, $sum, $list, &$result){
        if(empty($root)){
            return [];
        }
        array_push($list, $root->val);
        if(empty($root->left) && empty($root->right) && $sum == $root->val){
            array_push($result, $list);
        }
        $this->helper($root->left, $sum-$root->val, $list, $result);
        $this->helper($root->right, $sum-$root->val, $list, $result);
        array_pop($list);
    }


}