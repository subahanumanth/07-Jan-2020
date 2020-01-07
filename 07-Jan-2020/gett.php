<?php
$name=$_GET["name"];
if(isset($name)){
echo "Welcome ".$name;
}
elseif(empty($name)){
echo "enter user name";
}
?>
