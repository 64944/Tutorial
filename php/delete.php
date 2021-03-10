<?php
include 'connect.php';

$delete_id = $_GET['delete'];

$sql = "DELETE FROM product WHERE no = '$delete_id'";

$delete = mysqli_query($conn,$sql);

if($delete)
	{
		header("location: ../datatable.php");
	}
	
else
	{
		echo "Error";
	}

mysqli_close($conn);
?>