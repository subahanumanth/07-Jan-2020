<?php
$a=5;
$b=7;
function add(){
$GLOBALS['z']=$GLOBALS['a']+$GLOBALS['b'];
echo "addition is : ".$GLOBALS['z'];
}

add();

?>
