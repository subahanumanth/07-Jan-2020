<?php
$names=array(
array("hanu",20,36),
array("bharath",21,21),
array("shyam",22,47)
);

$number=count($names);

for($i=0;$i<3;$i++){
	for($j=0;$j<3;$j++){
		echo $names[$i][$j]." ";
}
}
?>

