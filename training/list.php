<?php
include("mysqlConnect.php");

class Validation {

  private $request;
  public $a;

  function __construct($pass=[]) {
      $this->request = $pass;
   }

  function validate() {
    global $nameError;
    global $ageError;
    global $genderError;
    global $cityError;
    global $flavourError;
    global $emailError;
    global $f;

    if(isset($this->request['submit'])) {
        if (!empty($this->request['name']) and preg_match("/^[a-zA-Z ]*$/", $this->request['name']) and strlen($this->request['name'])>3 and strlen($this->request['name'])<10 and ctype_alpha($this->request['name'])) {
            $this->a['name'] = $this->request['name'];
        } else {
            $nameError = " *Enter Valid Name";
        }


        if (!empty($this->request['age']) and ctype_digit($this->request['age'])) {
            $this->a['age'] = $this->request['age'];
        } else {
            $ageError = " *Enter Valid Age";
        }

        if (!empty($this->request['gender'])) {
            $this->a['gender'] = $this->request['gender'];
        } else {
              $genderError = " *Select Gender";
        }

        if (!empty($this->request['city'])) {
            $this->a['city'] = $this->request['city'];
        } else {
            $cityError = " *Select City";
        }

        if (!empty($this->request['flavour'])) {
            $this->a['flavour'] = $this->request['flavour'];
        } else {
            $flavourError = " *Select Flavour";
        }

        if (!empty($this->request['email']) and filter_var($this->request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->a['email'] = $this->request['email'];
        } else {
            $emailError = " *Enter Valid Email ID";
        }
        if($nameError == "" and $ageError == "" and $genderError == "" and $cityError == "" and $flavourError == "" and $emailError == "") {
            echo "inserted";
            print_r($this->a);
            $this->insertValues();
  //          header("Location:/simple.php");
        } else {
            echo "not";
//            header("Location:/new.php");
        }
     }
  }

  function insertValues() {

      $connection = mysql::mysqlConnect();

      $name = mysqli_real_escape_string($connection,$this->a['name']);
      $age = mysqli_real_escape_string($connection,$this->a['age']);
      $gender = $this->a['gender'];
      $city = $this->a['city'];
      $flavour = implode(',',$this->a['flavour']);
      $email = mysqli_real_escape_string($connection,$this->a['email']);

      $sqlQuery = "insert into test (name, age, gender, city, flavours, email) values ('$name', '$age', '$gender', '$city', '$flavour', '$email')";
      mysqli_query($connection,$sqlQuery);
      mysql::mysqlClose($connection); 
  }
}

$obj = new Validation($_POST);
$obj->validate();

?>
