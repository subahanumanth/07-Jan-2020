<?php
include("mysqlConnect.php");
if(isset($_POST['new'])) {
    $idno = $_POST['new'];
    $updName =  $_POST['name'];
    $updAge =  $_POST['age'];
    $updGender =  $_POST['gender'];
    $updCity =  $_POST['city'];
    $flavour =  $_POST['flavour'];
    $updFlavour = implode(',',$flavour);
    $updEmail =  $_POST['email'];

    echo $updName."\t".$updAge."\t".$updGender."\t".$updCity."\t".$updFlavour."\t".$updEmail."\t".$idno;

    $connection = mysql::mysqlConnect();
    $sql = "update test set name='$updName',age='$updAge',gender='$updGender',city='$updCity',flavours='$updFlavour',email='$updEmail'  where idno='$idno'";
    mysqli_query($connection, $sql);
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
    mysql::mysqlClose($connection);
}
?>
