<html>
<link rel="stylesheet" href="css/tables.css">
</html>
<?php
include("mysqlConnect.php");
$connection = mysql::mysqlConnect();
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
            echo "<tr><td>$idno</td><td>$correctName</td><td>$correctAge</td>
            <td>$correctGender</td><td>$correctCity</td><td>$correctFlavour</td><td>$correctEmail</td></tr>";
        }
        echo "</table>";
    }
    mysql::mysqlClose($connection);
?>
