//https://www.hackerrank.com/challenges/pairs/problem

<?php

function pairs($k, $arr) {

    $number = count($arr);
    $result=0;
    for($i=0;$i<$number;$i++) {
        for($j=0;$j<$number;$j++) {
            if($arr[$i]-$arr[$j] == $k) {
                $result++;
            }
        }
    }
    return $result;
}
