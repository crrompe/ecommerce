<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ordering Module</title>
	<link rel="stylesheet" href="style.css">
	<style> 
		/* Apply a general style to all divs */
div {
  display: inline-block;
  width: 30%;
  margin: 20px;
  padding: 20px;
  box-sizing: border-box;
  border: 1px solid black;
}

/* Clear the float after the third div */
div:nth-child(3n+1) {
  clear: left;
}

/* Set the width of the container */
body {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

/* Set the background color and font */
body {
  background-color: #f7f7f7;
  font-family: Arial, sans-serif;
  font-size: 16px;
}

/* Style the headings */
h1, h2 {
  margin-top: 0;
}

/* Style the "Buy Now" button */
button {
  display: block;
  margin: 20px auto 0;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button a {
  color: #fff;
  text-decoration: none;
}

/* Style the button when hovered or focused */
button:hover, button:focus {
  background-color: #0069d9;
  outline: none;
}

/* Style the price */
p {
  margin: 0;
  font-size: 20px;
  font-weight: bold;
}

</style>

</head>
<body>
	<h1>Products</h1>

	<?php

include_once 'db_conn.php';

	$query = "SELECT * FROM products";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<div>';
			echo '<h2>' . $row['prod_name'] . '</h2>';
			echo '<p>Price: ₱' . $row['prod_price'] . '</p>';
			echo '<button><a href="order_form.php?product_id=' . $row['prod_id'] . '">Buy Now</a></button>';
			echo '</div>';
		}
	}

	// Close the database connection
	mysqli_close($conn);
	?>

</body>
<script src="js/bootstrap.js"></script>
</html>
