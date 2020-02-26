//https://www.hackerrank.com/challenges/plus-minus/problem

<?php

function plusMinus($arr) {

$positive=0;
$negative=0;
$neutral=0;
$c = count($arr);
for($i=0;$i<count($arr);$i++) {
    if($arr[$i]>0) {
        $positive++;
    } else if($arr[$i]<0) {
        $negative++;
    } else {
        $neutral++;
    }
}
$positiveFraction = $positive/(count($arr));
$negativeFraction = $negative/(count($arr));
$neutralFraction = $neutral/(count($arr));

echo number_format($positiveFraction,6)."\n";
echo number_format($negativeFraction,6)."\n";
echo number_format($neutralFraction,6);
}
