
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/tables.css">
<!--===============================================================================================-->
</head>
</html>
<?php
include("mysqlConnect.php");
if(isset($_POST['new'])){
    $idno = $_POST['new'];
    $updName =  $_POST['name'];
    $updAge =  $_POST['age'];
    $updGender =  $_POST['gender'];
    $updCity =  $_POST['city'];
    $flavour =  $_POST['flavour'];
    $updFlavour = implode(',',$flavour);
    $updEmail =  $_POST['email'];

    $connection = mysql::mysqlConnect();
    $sql = "update details set name='$updName',age='$updAge',gender='$updGender',city='$updCity',flavours='$updFlavour',email='$updEmail'  where idno='$idno'";
    mysqli_query($connection, $sql);
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
                         <td><?php echo $correctGender; ?></td><td><?php echo $correctCity; ?></td><td><?php echo $correctFlavour; ?></td><td><?php echo $correctEmail; ?></td><td>
                         <a href='button.php?id=<?php echo $idno; ?>'>Delete</a></td>
			 <td><a href='update.php?id=<?php echo $idno; ?>'>Update</a></td>
                         </tr>
                         
                  <?php
                     }
                      echo "</table>";
    }
    mysql::mysqlClose($connection);
    echo "<html><script>alert('updated');</script></html>";
}
?>
