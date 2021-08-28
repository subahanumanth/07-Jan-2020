//https://www.hackerrank.com/challenges/encryption/problem

function encryption($s) {
$encrypt = '';
$b=str_replace(' ','',$s);

$arr = [];
$root = strlen($b);
$q = sqrt($root);
$f = floor($q);
$c = ceil($q);
$r = 0;
for($i=0;$i<=$f;$i++) {
    for($j=0;$j<$c;$j++) {
        if(isset($b[$r])) {
            $arr[$i][$j] = $b[$r];
            $r++;
        }
    }
}
//print_r($arr);
for ($i = 0; $i < $c; $i++) {
    $value = array_column($arr, $i);
    $str = implode('', $value);
    $encrypt .= $str." ";
}
return $encrypt;
}
