<?php

class Validation {

  private $request;
  private $a;

  function __construct($pass=[],$pass1=[],$new) {
      $this->request = $pass;
      $this->a = $pass1;
  }

  function validate() {

    if(isset($this->request['submit'])) {
        if (!empty($this->request['name']) and preg_match("/^[a-zA-Z ]*$/", $this->request['name']) and strlen($this->request['name'])>3 and strlen($this->request['name'])<10 and ctype_alpha($this->request['name'])) {
            $this->a['name'] = $this->request['name'];
        } else {
            $GLOBALS['nameError'] = " *Enter Valid Name";
        }


        if (!empty($this->request['age']) and ctype_digit($this->request['age'])) {
            $this->a['age'] = $this->request['age'];
        } else {
            $GLOBALS['ageError'] = " *Enter Valid Age";
        }

        if (!empty($this->request['gender'])) {
            $this->a['gender'] = $this->request['gender'];
        } else {
              $GLOBALS['genderError'] = " *Select Gender";
        }

        if (!empty($this->request['city'])) {
            $this->a['city'] = $this->request['city'];
        } else {
            $GLOBALS['cityError'] = " *Select City";
        }

        if (!empty($this->request['flavour'])) {
            $this->a['flavour'] = $this->request['flavour'];
        } else {
            $GLOBALS['flavourError'] = " *Select Flavour";
        }

        if (!empty($this->request['email']) and filter_var($this->request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->a['email'] = $this->request['email'];
        } else {
            $GLOBALS['emailError'] = " *Enter Valid Email ID";
        }
        if($GLOBALS['nameError'] == "" and $GLOBALS['ageError'] == "" and $GLOBALS['genderError'] == "" and $GLOBALS['cityError'] == "" and $GLOBALS['flavourError'] == "" and $GLOBALS['emailError'] == "") {
            echo "inserted";
            print_r($this->a);
            $dbServerName = "localhost";
            $dbUserName = "root";
            $dbPassword = "aspire@123";
            $dbName = "Data";

            $connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

            if($connection) {
                echo "database connected";
            } else {
                echo "not connected";
            }
            mysqli_select_db($connection,"Data");

            $name = mysqli_real_escape_string($connection,$this->a['name']);
            $age = mysqli_real_escape_string($connection,$this->a['age']);
            $gender = $this->a['gender'];
            $city = $this->a['city'];
            $flavour = implode(',',$this->a['flavour']);
            $email = mysqli_real_escape_string($connection,$this->a['email']);

            $sqlQuery = "insert into test (name, age, gender, city, flavours, email) values ('$name', '$age', '$gender', '$city', '$flavour', '$email')";
            if(!mysqli_query($connection,$sqlQuery)) {
                echo "not inserted";
            } else {
                echo "inserted"."<html><br><br></html>";
                $connection = mysqli_connect("localhost", "root", "aspire@123");
                mysqli_select_db($connection, "Data");
                $sql = "select *from test";
                $result = mysqli_query($connection,$sql);
                $rows = mysqli_num_rows($result);
                if($rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $idno = $row['idno'];
                        $names = $row['name'];
                        $ages = $row['age'];
                        $genders = $row['gender'];
                        $citys = $row['city'];
                        $flavourss = $row['flavours'];
                        $emails = $row['email'];
                        echo "<table border='1'  style='border-collapse: collapse;'><tr><td>$idno</td><td>$names</td><td>$ages</td><td>$genders</td><td>$citys</td><td>$flavourss</td><td>$emails</td></tr></table>"."<br>"."<html> <form method='POST' action='button.php'>
                         <button type='submit' name='delete' value='$idno'>Delete</button> </form><form action='update.php'
                         method='POST'><button type='submit' name='update' value='$idno'>Update</button> </form> <br><br> </html>";
                    }
                }
            }
        }
     }
}
}


$obj = new Validation($_POST,array());
$obj->validate();

?>
