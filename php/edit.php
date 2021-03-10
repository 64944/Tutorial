<?php
include 'connect.php';

$no = $_POST['No'];
$name = $_POST['Name'];
$price = $_POST['Price'];
$details = $_POST['Details'];
$publish = $_POST['Publish'];


$sql = "UPDATE product
SET Name = '$name', Price = '$price', Details = '$details', Publish = '$publish'
WHERE no = '$no'";

if ($conn->query($sql)){
	header("location: ../datatable.php");
}
else {
	echo "Error";
}

mysqli_close($conn);
?>
