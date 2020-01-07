<?php
$expirytime=time()+86400;
setcookie("name","hanu",$expirytime);
setcookie("age","20",$expirytime);

echo $_COOKIE["name"];
?>
