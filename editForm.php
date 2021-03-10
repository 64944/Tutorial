<?php
include 'php/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<span>View Product</span>
<br>
<br>
	<?php
		$edit_id = $_GET['edit'];
		$sql = "SELECT * FROM product WHERE no = $edit_id";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
	?>
	<form name="editForm" action="php/edit.php" method="POST">
	<div> No: </div>
	<input name="No" type="text" value="<?php echo $row['No'] ?>" readonly> <br>
	<div> Product Name: </div>
	<input name="Name" type="text" value="<?php echo $row['Name'] ?>" required/> <br>
	<div> Price(RM): </div>
	<input name="Price" type="text" value="<?php echo $row['Price'] ?>" required/> <br>
	<div> Product Details: 
			<span style="font-size: 10px">(Maximum 100 characters)</span>
	</div>
	<textarea name="Details" id = "Details" rows="3" maxlength="100" required/><?php echo $row['Details'] ?></textarea>
	<div> Publish: </div>
	<input type="radio" name="Publish" value="Yes" <?php if($row['Publish'] == "Yes") echo "checked='true' ";?> >
	<label for="Yes">Yes</label><br>
	<input type="radio" name="Publish" value="No" <?php if($row['Publish'] == "No") echo "checked='true' ";?> >
	<label for="No">No</label> <br><br>
	<input id="edit" type="submit" value="Edit"/>
	<a href="datatable.php">Cancel</a>
	</form>
	<?php
		}
		} else {
			echo "0 results";
		}

		$conn->close();
	?>
	
</div>

</body>
</html>