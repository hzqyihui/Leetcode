<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        if(empty($head)){
            return null;
        }
        $slow = $fast = $head;
        while ($fast != null){
            if($fast->val != $slow->val){
                $slow->next = $fast;
                $slow = $slow->next;
            }
            $fast = $fast->next;
        }
        $slow->next = null;
        return $head;
    }
}