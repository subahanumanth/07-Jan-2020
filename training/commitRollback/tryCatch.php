<?php

$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$start = "commit";
mysqli_query($connection, $start);

try{
if($connection) {
    echo "connected";
}
$values = [1,2,3,4,"hanu",6,7,8,9,10];
for($i=0;$i<count($values);$i++) {
    $query = "insert into person (age) values($values[$i])";
    if(mysqli_query($connection, $query)){
        echo "inserted".$i;
    } else {
        throw new exception("rollback");
    }
}
}

catch(exception $e) {
$rollback =  "rollback";
mysqli_query($connection, $rollback);
exit();

}
