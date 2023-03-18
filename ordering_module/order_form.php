<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Order Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }

    h1 {
      text-align: center;
      margin-top: 40px;
      margin-bottom: 20px;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    input[type="number"] {
      width: 60px;
      padding: 5px;
      border: 1px solid #ddd;
      border-radius: 3px;
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"], input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0069d9;
    }
  </style>
</head>
<body>
  <h1>Order Form</h1>

<?php
include_once 'db_conn.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Create order form
echo '<form action="submit_order.php" method="post">';
echo '<table>';
echo '<tr><th>Product</th><th>Quantity</th><th>Price</th></tr>';

while ($row = mysqli_fetch_assoc($result)) {
  echo '<tr>';
  echo '<td>' . $row["prod_name"] . '</td>';
  echo '<td><input type="number" name="quantity[' . $row["prod_id"] . ']" value="0"></td>';
  echo '<td>₱' . $row["prod_price"] . '</td>';
  echo '</tr>';
}

echo '</table>';

echo '<p>Please add your details here to proceed with your order: </p>';

echo '<label for="name">Name:</label>';
echo '<input type="text" name="name" required>';

echo '<label for="address">Address:</label>';
echo '<input type="text" name="address" required>';

echo '<label for="email">Email:</label>';
echo '<input type="email" name="email" required>';

echo '<input type="submit" value="Submit Order">';
echo '</form>';

mysqli_close($conn);
?>

</body>
</html>