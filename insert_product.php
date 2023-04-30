<?php

// establish database connection
$servername = "localhost";
$username = "zaidali";
$password = "1234";
$dbname = "ecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get form data
$prod_id = $_POST['prod_id'];
$prod_nm = $_POST['prod_nm'];
$cost = $_POST['cost'];
$weight = $_POST['weight'];
$category = $_POST['category'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$seller = $_POST['seller'];



// store data in database
$sql = "INSERT INTO product (iden, nm, price, wt, category, descrip, quantity, seller_id)
        VALUES ('$prod_id', '$prod_nm', '$cost', '$weight', '$category', '$description', '$quantity', '$seller')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);




?>