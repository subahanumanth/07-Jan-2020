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
</html>
<?php
include("mysqlConnect.php");

            $idno = $_GET['id'];
            $connection = mysql::mysqlConnect();

            $sql = "delete from details where idno=$idno";
            if(mysqli_query($connection,$sql)) {
                $delete = "select *from details";
                $result = mysqli_query($connection,$delete);
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
                         <a href='delete.php?id=<?php echo $idno; ?>'>Delete</a></td>
                         <td><a href='update.php?id=<?php echo $idno; ?>'>Update</a></td>
                         </tr>
                         
                  <?php
                     }
                      echo "</table>";
            }
            mysql::mysqlClose($connection);
            echo "<html><script>alert('deleted');</script></html>";
}


?>
