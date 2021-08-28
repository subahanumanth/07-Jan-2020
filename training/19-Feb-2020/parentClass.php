<?php
include("autoload.php");
class name extends gender{
    public $age;
    public function displayAge() {
        echo "your age is 20";
    }
}

$obj = new gender();
$obj->display();
