<?php
if(isset($_POST['delete'])) {
            $idno = $_POST['delete'];
            echo $idno;
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
            $sql = "delete from test where idno=$idno";
            if(mysqli_query($connection,$sql)) {
                echo "deleted";
                $connection = mysqli_connect("localhost", "root", "aspire@123");
                mysqli_select_db($connection, "Data");
                $delete = "select *from test";
                $result = mysqli_query($connection,$delete);
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


?>
