<?php

$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
mysqli_begin_transaction($connection);

try{

$values = [1,2,3,4,5,6,7,8,9,10];
for($i=0;$i<count($values);$i++) {
    $query = "insert into person (age) values($values[$i])";
    if(mysqli_query($connection, $query)){
        echo "inserted".$i;
    } else {
        throw new exception();
    }
}
}

catch(exception $e) {

if(mysqli_rollback($connection)) {
echo "rollbacked";
}

}
