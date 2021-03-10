<?php
include 'php/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Product</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="topdash" id="topdash">
		<span><a href="index.html">Website</a></span>
		<ul>
			<li><a href="datatable.php">Data Table</a></li>
			<li><a href="create.html">Add New Product</a></li>
			<li><a href="index.html">Logout</a></li>
		</ul>
	</div>

<!-- Output Result -->
<div class="body" id="body">
<span>View Product<a href="datatable.php" style="margin-left: 10%">Back</a></span>
<br>
<br>

	<?php
		$view_id = $_GET['view'];
		$sql = "SELECT * FROM product WHERE no = $view_id";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "No: ". $row["No"]. "<br>" ."Product Name: ". $row["Name"]. "<br>" . "Price: RM". $row["Price"]. "<br>" . "Details: ". $row["Details"]. "<br>" . "Publish: ". $row["Publish"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	?>
</div>

</body>
</html>