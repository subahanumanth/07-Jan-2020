<?php
include("list.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/tables.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form form" action="rough.php" method="POST" name="validate" >
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="images/avatar-01.jpg" alt="AVATAR">
					</span>
					

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
                                                <span style="padding-left:245px; padding-up:400px; color:red;"><?php echo $error["name"];?></span>
						<input class="input100" id="name" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ""; ?>">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<span style="padding-left:245px; padding-up:400px; color:red;"><?php echo $error["age"]; ?></span>
						<input class="input100" type="text" id="age" type = "text" name="age" value="<?php echo isset($_POST['age']) ? $_POST['age'] : ""; ?>">
						<span class="focus-input100" data-placeholder="Age"></span>
					</div>
<span style=" padding-up:100px; padding-left:245px; padding-bottom:500px; color:red;"><?php echo $error["gender"]; ?></span>
                                        <div class="wrap-input100 validate-input m-b-50" data- validate="Enter password">

<label class="space" style="padding-left:150px; ">
<input type="radio" name="gender" value="male" <?php echo((isset($_POST['gender']) and $_POST['gender'] == "male") ?'checked="checked"':'') ; ?>>Male</label><br>

  <label style="padding-left:150px;  padding-bottom:50px; "><br>
<input type="radio" name="gender" value="female" <?php echo ((isset($_POST['gender']) and $_POST['gender'] == "female") ?'checked="checked"':'' ); ?>>Female</label>
                                        </div>

                                       <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
<label style="padding-left:130px;">
<select name="city"><?php echo sprintf("%s",$cityError);  ?>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Virudhunagar"){echo "selected";}  ?> >Virudhunagar</option>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Madurai"){echo "selected";}  ?> >Madurai</option>
<option <?php if(isset($_POST['city']) and $_POST['city'] == "Coimbatore"){echo "selected";}  ?> >Coimbatore</option>
</select>
</label>
                                       </div>

                                       <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
<span style="padding-left:245px; padding-up:400px;color:red;"><?php echo $error["flavour"]; ?></span>
<div style="padding-left:150px;">

<label class="main">Strawberry 
        <input type="checkbox" name="flavour[]" value= "strawberry" <?php if(isset($_POST['flavour']) and in_array("strawberry",$_POST['flavour'])) echo "checked='checked'"; ?> > 
        <span class="geekmark"></span> 
    </label><br> 
      
    <label class="main">Butterscotch 
        <input type="checkbox" name="flavour[]" value= "butterscotch" <?php if(isset($_POST['flavour']) and in_array("butterscotch",$_POST['flavour'])) echo "checked='checked'"; ?>>
        <span class="geekmark"></span> 
    </label> <br>
      
    <label class="main">Black Current
        <input type="checkbox" name="flavour[]" value= "black current" <?php if(isset($_POST['flavour']) and in_array("black current",$_POST['flavour'])) echo "checked='checked'"; ?>> 
        <span class="geekmark"></span> 
    </label> <br>
                                       </div>
                                       </div>
                                        <div class="wrap-input100 validate-input m-b-50">
						<span style="padding-left:245px; padding-up:400px; color:red;"><?php echo $error["email"]; ?></span>
 						
						<input class="input100" id="email" type="email" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
 

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" id = "submit" onclick="validateForm();">
							Submit
						</button>
					</div><br>
                                        <div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="cancel" onclick="reset()">
							Reset
						</button>
					</div>


					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
