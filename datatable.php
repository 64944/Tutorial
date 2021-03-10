<?php
include 'php/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Table</title>
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
<span>Data Table</span>
<br>
<br>

Search Product: <input type="text" id="searchInput" onkeyup="search()" placeholder="No/Name" style="width: 30%;">
<br>
<br>
	<?php
		echo "<table id='productTable'>
		<tr>
		<th>Product No.</th>
		<th>Product Name</th>
		<th>Price(RM)</th>
		<th>Product Details</th>
		<th>Publish</th>
		<th>Actions</th>
		</tr>";

		$sql = "SELECT * FROM product";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['No'] . "</td>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td>" . $row['Price'] . "</td>";
				echo "<td>" . $row['Details'] . "</td>";
				echo "<td>" . $row['Publish'] . "</td>";
				echo "<td>" . "
					<a href='view.php?view=".$row['No']."'>View</a>
					<a href='editForm.php?edit=".$row['No']."'>Edit</a>
					<a href='php/delete.php?delete=".$row['No']."'>Delete</a>
				" . "</td>";
				echo "</tr>";
				}
				echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
	?>
</div>

<script>
function search() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    td1 = tr[i].getElementsByTagName("td")[1];
    if ( (td) || (td1) ){
      txtValue = td.textContent;
      txtValue1 = td1.textContent;
      if ((txtValue.toUpperCase().indexOf(filter) > -1) || (txtValue1.toUpperCase().indexOf(filter) > -1)) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>


</body>
</html>