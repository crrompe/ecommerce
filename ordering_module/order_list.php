</form>

<html>
<head>
	<meta charset="UTF-8">
	<title>View Order</title>
	<link rel="stylesheet" href="style.css">
	<style>
	table {
  		border-collapse: collapse;
 		width: 100%;
 	}

	th, td {
 	 	text-align: left;
 		padding: 8px;
	}

	th {
  		background-color: #555;
  		color: white;
		}

	tr:nth-child(even) {
 		 background-color: #f2f2f2;
		}
	</style>
	
</head>


<?php
include_once 'db_conn.php';
?>

<form>
<?php
// View the orders
$sql = "SELECT o.name, o.address, o.email, o.total, o.status, o.date_purchased_ts, o.order_id, 
			od.quantity, 
			p.prod_name, p.prod_price
	FROM orders o
	JOIN order_details od ON o.order_id = od.order_id
	JOIN products p ON od.prod_id = p.prod_id
	WHERE o.order_id";
	
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if ($result->num_rows > 0) {
	echo "<table>";
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Quantity</th>";
    echo "<th>Price</th>";
    echo "<th>Name</th>";
    echo "<th>Address</th>";
    echo "<th>Email</th>";
    echo "<th>Status</th>";
    echo "<th>Date Purchased</th>";
    echo "<th>Total Price</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
    	$product_total = $row['quantity'] * $row['prod_price'];

    	echo "<tr>";
        echo "<td>" . $row['prod_name'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['prod_price'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['date_purchased_ts'] . "</td>";
        echo "<td>" . $row['total'] . "</td>";
        echo "</tr>";
        // echo "Product: " . $row['prod_name'] . "<br>";
        // echo "Quantity: " . $row['quantity'] . "<br>";
        // echo "Price: " . $row['prod_price'] . "<br>";
        // echo "Name: " . $row['name'] . "<br>";
        // echo "Address: " . $row['address'] . "<br>";
        // echo "Email: " . $row['email'] . "<br><br>";
		// echo "Status: " . $row['status'] . "<br>";
        // echo "Date Purchased: " . $row['date_purchased_ts'] . "<br>";
		// echo "Total Price: " . $row['total'] . "<br><br>";
    }

    echo "</table>";
} else {
    echo "No orders found.";
}
?>
</form>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
		}
		.center {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 20vh;
		}
		.form {
			background-color: #fff;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}
		.btn {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 3px;
			font-size: 16px;
			cursor: pointer;
			transition: background-color 0.3s ease-in-out;
		}
		.btn:hover {
			background-color: #0062cc;
		}
	</style>
</head>
<body>
	<div class="center">
		<form action="index.php" method="post" class="form">
			<input type="submit" value="Buy Again" class="btn">
		</form>
	</div>
	<script src="js/bootstrap.js"></script>
</body>
</html>
