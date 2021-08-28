<?php
include("list.php");
?>

<html>
<form action="<?php if(isset($_POST['submit'])){if(is_null($nameError)){echo 'simple.php';}elseif(is_string($nameError)){echo 'new.php';}}  ?>" method="POST" name="validate" class="form">
Name : <input id="name" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ""; ?>"><?php echo sprintf("%s",$nameError); ?><br><br>
Age : <input id="age" type = "text" name="age" value="<?php echo isset($_POST['age']) ? $_POST['age'] : ""; ?>"><?php echo sprintf("%s",$ageError);  ?><br><br>
Gender : <?php echo sprintf("%s",$genderError);  ?>
<input type="radio" name="gender" value="male" <?php echo((isset($_POST['gender']) and $_POST['gender'] == "male") ?'checked="checked"':'') ; ?>>Male
<input type="radio" name="gender" value="female" <?php echo ((isset($_POST['gender']) and $_POST['gender'] == "female") ?'checked="checked"':'' ); ?>>Female<br><br>
City : <select name="city"><?php echo sprintf("%s",$cityError);  ?>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Virudhunagar"){echo "selected";}  ?> >Virudhunagar</option>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Madurai"){echo "selected";}  ?> >Madurai</option>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Coimbatore"){echo "selected";}  ?> >Coimbatore</option>
</select><br><br>
Flavours :<?php echo sprintf("%s",$flavourError);  ?> <br><br>
<input type="checkbox" name="flavour[]" value= "strawberry" <?php if(isset($_POST['flavour']) and in_array("strawberry",$_POST['flavour'])) echo "checked='checked'"; ?> >Strawberry<br>
<input type="checkbox" name="flavour[]" value= "butterscotch" <?php if(isset($_POST['flavour']) and in_array("butterscotch",$_POST['flavour'])) echo "checked='checked'"; ?>>Butterscotch<br>
<input type="checkbox" name="flavour[]" value= "black current" <?php if(isset($_POST['flavour']) and in_array("black current",$_POST['flavour'])) echo "checked='checked'"; ?>>Black Current<br><br>
Email ID :
<input id="email" type="email" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>"><?php echo sprintf("%s",$emailError);  ?><br><br>
<button type="submit" name="submit" id = "submit" onclick="validateForm();">submit</button>
<button type="submit" name="cancel" onclick="reset()">Reset</button>

</form>

<script src="form.js"></script>
</html>
