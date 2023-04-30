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
$prod_price = $_POST['prod_price'];
$prod_img = "./upload/".$prod_id.".jpg";



// store data in database
$sql = "INSERT INTO prac_product (id, product_name, product_price, product_image)
        VALUES ('$prod_id', '$prod_nm', '$prod_price', '$prod_img')";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Entered Successfully, add the image on the next page')</script>";
  header("Location: admin_image.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);

?>