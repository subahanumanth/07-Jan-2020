<html>
<link rel='stylesheet' href='css/tables.css'>
</html>
<?php

include("mysqlConnect.php");

class Validation {

  private $details;
  public $correctDetails;
  public $error;

  function __construct($detailArray=[]) {
      $this->details = $detailArray;
   }

  function validate() {
    global $nameError;
    global $ageError;
    global $genderError;
    global $cityError;
    global $flavourError;
    global $emailError;

    if(isset($this->details['submit'])) {
        if (!empty($this->details['name']) and preg_match("/^[a-zA-Z ]*$/", $this->details['name']) and strlen($this->details['name'])>3 and strlen($this->details['name'])<10 and ctype_alpha($this->details['name'])) {
            $this->correctDetails['name'] = $this->details['name'];
        } else {
            $this->error["name"] = " *Enter Valid Name";
        }


        if (!empty($this->details['age']) and ctype_digit($this->details['age'])) {
            $this->correctDetails['age'] = $this->details['age'];
        } else {
            $this->error["age"] = " *Enter Valid Age";
        }

        if (!empty($this->details['gender'])) {
            $this->correctDetails['gender'] = $this->details['gender'];
        } else {
              $this->error["gender"] = " *Select Gender";
        }

        if (!empty($this->details['city'])) {
            $this->correctDetails['city'] = $this->details['city'];
        } else {
            $this->error["city"] = " *Select City";
        }

        if (!empty($this->details['flavour'])) {
            $this->correctDetails['flavour'] = $this->details['flavour'];
        } else {
            $this->error["flavour"] = " *Select Flavour";
        }

        if (!empty($this->details['email']) and filter_var($this->details['email'], FILTER_VALIDATE_EMAIL)) {
            $this->correctDetails['email'] = $this->details['email'];
        } else {
            $this->error["email"] = " *Enter Valid Email ID";
        }
        if($this->error["name"] == "" and $this->error["age"] == "" and $this->error["gender"] == "" and $this->error["city"] == "" and $this->error["flavour"] == "" and $this->error["email"] == "") {
            echo "<html><script>alert('Inserted Successfully');</script></html>";
            $this->insertValues();
  //          header("Location:/simple.php");
        } else {
            echo "not";
//            header("Location:/new.php");
        }
     }
        return $this->error;
  }

  function insertValues() {

      $connection = mysql::mysqlConnect();

      $name = mysqli_real_escape_string($connection,$this->correctDetails['name']);
      $age = mysqli_real_escape_string($connection,$this->correctDetails['age']);
      $gender = $this->correctDetails['gender'];
      $city = $this->correctDetails['city'];
      $flavour = implode(',',$this->correctDetails['flavour']);
      $email = mysqli_real_escape_string($connection,$this->correctDetails['email']);

      $sqlQuery = "insert into details (name, age, gender, city, flavours, email) values ('$name', '$age', '$gender', '$city', '$flavour', '$email')";
      mysqli_query($connection,$sqlQuery);
      mysql::mysqlClose($connection); 
      $this->display();
  }

  function display() {
                $connection = mysql::mysqlConnect();
                $sql = "select *from details";
                $result = mysqli_query($connection,$sql);
                $rows = mysqli_num_rows($result);
                if($rows > 0) {
                    echo "<table id='customers' border='1'  style='border-collapse: collapse;'>";
                    while($row = mysqli_fetch_assoc($result)) {
                        $idno = $row['idno'];
                        $correctName = $row['name'];
                        $correctAge = $row['age'];
                        $correctGender = $row['gender'];
                        $correctCity = $row['city'];
                        $correctFlavour = $row['flavours'];
                        $correctEmail = $row['email'];
                        ?>
                        
                        <tr><td><?php echo $idno; ?></td><td><?php echo $correctName; ?></td><td><?php echo $correctAge; ?></td>
                         <td><?php echo $correctGender; ?></td><td><?php echo $correctCity; ?></td><td><?php echo $correctFlavour; ?></td><td><?php echo $correctEmail; ?></td>
                         <td><a href='button.php?id=<?php echo $idno; ?>'>Delete</a></td>
                         <td><a href='update.php?id=<?php echo $idno; ?>'>Update</a></td>
                         </tr>
                         
                  <?php
                     }
                      echo "</table>";
                }
            mysql::mysqlClose($connection);
 }
}

$obj = new Validation($_POST);
$error = $obj->validate();

?>

