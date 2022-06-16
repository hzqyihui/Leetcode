<?php

include_once "../PHP/Common.php";

class Solution
{

    public function fibonacci($n)
    {
        $tmpArr = [];
        for ($i = 1; $i <= $n; $i++) {
            if ($i == 1 || $i == 2) {
                $tmpArr[$i] = 1;
            }else{
                $tmpArr[$i] = $tmpArr[$i-2] + $tmpArr[$i-1];
            }
        }
        return $tmpArr[$n];
    }

}

$a = new Solution();
$res = $a->fibonacci(11);

dd($res);