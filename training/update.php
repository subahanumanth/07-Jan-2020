<?php
include("mysqlConnect.php");
if(isset($_POST['update'])) {
    $idno = $_POST['update'];
    $connect = mysql::mysqlConnect();
    $query = "select *from test where idno = $idno";
    $query1 = mysqli_query($connect,$query);
    $rows = mysqli_num_rows($query1);
    if($rows > 0) {
        while($row = mysqli_fetch_assoc($query1)) {
            $idnum = $row['idno'];
            $name = $row['name'];
            $age = $row['age'];
            $gender = $row['gender'];
            $city = $row['city'];
            $flavours = $row['flavours'];
            $flavour = explode(',',$flavours);
            $email = $row['email'];
            echo $name."\t".$age."\t".$gender."\t".$city."\t".$flavour."\t".$email."\n";
        }
    }
}
?>

<html>
<form action="final.php"  method="POST" name="validate" class="form" onsubmit="validateForm();">
Name : <input id="name" type="text" name="name" value="<?php echo isset($_POST['update']) ? $name : ""; ?>"><?php echo sprintf("%s",$nameError); ?><br><br>
Age : <input id="age" type = "text" name="age" value="<?php echo isset($_POST['update']) ? $age: ""; ?>"><?php echo sprintf("%s",$ageError);  ?><br><br>
Gender : <?php echo sprintf("%s",$genderError);  ?>
<input type="radio" name="gender" value="male" <?php echo((isset($_POST['gender']) and $_POST['gender'] == "male") ?'checked="checked"':'') ; echo((isset($_POST['update']) and $gender == "male") ?'checked="checked"':'') ;  ?>>Male
<input type="radio" name="gender" value="female" <?php echo ((isset($_POST['gender']) and $_POST['gender'] == "female") ?'checked="checked"':'' ); echo((isset($_POST['update']) and $gender == "female") ?'checked="checked"':'') ;  ?>>Female<br><br>
City : <select name="city"><?php echo sprintf("%s",$cityError);  ?>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Virudhunagar"){echo "selected";}  if(isset($_POST['update']) and $city == "Virudhunagar"){echo "selected";}  ?> >Virudhunagar</option>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Madurai"){echo "selected";}  if(isset($_POST['update']) and $city == "Madurai"){echo "selected";}  ?> >Madurai</option>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Coimbatore"){echo "selected";} if(isset($_POST['update']) and $city == "Coimbatore"){echo "selected";}  ?> >Coimbatore</option>
</select><br><br>
Flavours :<?php echo sprintf("%s",$flavourError);  ?> <br><br>
<input type="checkbox" name="flavour[]" value= "strawberry" <?php if(isset($_POST['flavour']) and in_array("strawberry",$_POST['flavour'])) echo "checked='checked'";  if(isset($_POST['update']) and in_array("strawberry",$flavour)) echo "checked='checked'";  ?> >Strawberry<br>
<input type="checkbox" name="flavour[]" value= "butterscotch" <?php if(isset($_POST['flavour']) and in_array("butterscotch",$_POST['flavour'])) echo "checked='checked'";  if(isset($_POST['update']) and in_array("butterscotch",$flavour)) echo "checked='checked'";   ?>>Butterscotch<br>
<input type="checkbox" name="flavour[]" value= "black current" <?php if(isset($_POST['flavour']) and in_array("black current",$_POST['flavour'])) echo "checked='checked'";   if(isset($_POST['update']) and in_array("black current",$flavour)) echo "checked='checked'";  ?>>Black Current<br><br>
Email ID :
<input id="email" type="email" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} if(isset($_POST['update'])) {echo $email;}  ?>"><?php echo sprintf("%s",$emailError);  ?><br><br>
<button type="submit" name="new" id = "submit" value="<?php echo $idnum; ?>">submit</button>
</form>

<script src="form.js"></script>
</html>
