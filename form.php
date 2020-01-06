<?php
if(isset($_POST["submit"])){
$username=$_POST["name"];
$password=$_POST["password"];
if($username=="hanu" && $password=="1234"){
echo "Welcome {$_POST["name"]}";
}
else{
echo "user doesn't exist";
}
}
else{
echo "Login";
}
?>
<html>
<body>
<form action="form.php" method="POST">
Username : <input type="text" name="name"><br><br>
Password : <input type="password" name="password"><br><br>
<input type="submit" name="submit">
</form>
</body>
</html>
