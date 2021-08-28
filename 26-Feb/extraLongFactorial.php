//https://www.hackerrank.com/challenges/extra-long-factorials/problem

<?php

// Complete the extraLongFactorials function below.
function extraLongFactorials($n) {
    /* $a=1;
    while($n != 0) {
        $a = $a * $n;
        $n--;
    }
    */
    echo gmp_fact($n);
    //return $a;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

extraLongFactorials($n);

fclose($stdin);

