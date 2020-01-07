<?php
$name=$_POST["name"];
$password=$_POST["password"];

if(isset($name) && isset($password)){
echo "Successfull login";
}
else{
echo "Enter username and password";
}
?>
