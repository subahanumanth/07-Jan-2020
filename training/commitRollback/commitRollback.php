<?php

$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
if($connection) {
echo "connected";
}
$values = [1,2,3,4,5,"",7,8,9,10];
for($i=0;$i<count($values);$i++) {
$query = "insert into person (age) values($values[$i])";
if(mysqli_query($connection, $query)){
continue;
} else {
exit();
}
}
