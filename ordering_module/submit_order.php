<?php
include_once 'db_conn.php';

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$products = $_POST['quantity'];

// Calculate order total
$total = 0;
foreach ($products as $id => $quantity) {
  $sql = "SELECT prod_price FROM products WHERE prod_id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $price = $row['prod_price'];
  $total += $price * $quantity;
}

// Insert order into database
$status = 'P'; // set status as 'P' for pending
$timestamp = date("Y-m-d H:i:s"); // get current timestamp
$sql = "INSERT INTO orders (name, address, email, total, status, date_purchased_ts) VALUES ('$name', '$address', '$email', $total, '$status', '$timestamp')";
mysqli_query($conn, $sql);
$order_id = mysqli_insert_id($conn);

// Insert order details into database
foreach ($products as $id => $quantity) {
  if ($quantity > 0) {
    $sql = "INSERT INTO order_details (order_id, prod_id, quantity) VALUES ($order_id, $id, $quantity)";
    mysqli_query($conn, $sql);
  }
}

// Close the database connection
$conn->close();
?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Submit Order</title>
	<link rel="stylesheet" href="style.css">
	<style>
		body {
  background-color: #F5F5F5;
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
  margin-top: 40px;
  margin-bottom: 20px;
  color: #007bff;
}

form {
  max-width: 600px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 20px;
}

input[type="submit"]:hover {
  background-color: #0069d9;
}

a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
	
</head>
<body>
	<h1>ORDER PLACED!</h1>
	<form action="order_list.php" method="post">
	<input type="submit" value="View Order">
	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>
