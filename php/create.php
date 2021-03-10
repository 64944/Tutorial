<?php
include 'connect.php';

$name = $_POST['Name'];
$price = $_POST['Price'];
$details = $_POST['Details'];
$publish = $_POST['Publish'];

$home = '../datatable.php';

$sql = "INSERT INTO product(Name,Price,Details,Publish) 
VALUES ('$name','$price','$details','$publish')";
if ($conn->query($sql)){
	header("location: ../datatable.php");
}
	
else {
	echo "Error";
	echo "<a href='".$home."'>Back to Data Table</a>";
}

mysqli_close($conn);
?>