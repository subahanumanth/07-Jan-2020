//https://www.hackerrank.com/challenges/mini-max-sum/problem

<?php

function miniMaxSum($arr) {
    $result = [];
    for($i=0;$i<count($arr);$i++) {
        $temp = $arr[$i];
        unset($arr[$i]);
        array_push($result, array_sum($arr));
        array_push($arr, $temp);
    }

    echo min($result)." ".max($result);
}

