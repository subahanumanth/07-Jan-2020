<?php
$namesAndAges=array("hanu"=>"20","bharath"=>21,"shyam"=>"23","siva"=>"20");
foreach($namesAndAges as $key=>$value){
echo "Key is : {$key}"." "."value is : {$value}"."  ";
}


$games=array(212,423,5,342,53,4423,3425);
sort($games);
rsort($games);
$b=count($games);

for($i=0;$i<$b;$i++){
echo $games[$i]." ";
}
?>
