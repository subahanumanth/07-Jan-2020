
<?php
if(isset($_POST["submit"])){
print_r($_FILES["file"]);
echo $_FILES['the_file']['name'];
if(move_uploaded_file($_FILES["file"]["tmp_name"],"/Documents/serverUploads/")) {
echo "uploaded";
} else {
echo "not uploaded";
}
}
?>

<html>
<form method="POST" enctype="multipart/form-data">
<input type="file" name="the_file">
<input type="submit" name="submit">
</form>
</html>

