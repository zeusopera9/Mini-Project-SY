<?php

session_start();

require_once("php/CreateDb.php");
require_once("php/component.php");

$host = 'localhost';
$username = 'zaidali';
$password = '1234';
$database = 'ecommerce';

$connection = mysqli_connect($host, $username, $password, $database);
$conn = mysqli_connect($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create instance of CreateDb class
$db = new CreateDb("ecommerce", "prac_product");
$user_id = $_SESSION['user_id'];

// Retrieve all cart items for the user from the cart table
$query = "SELECT * FROM cart WHERE user_id = $user_id";
$result = mysqli_query($connection, $query);

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      while ($row = mysqli_fetch_assoc($result)){
          if($row["item_id"] == $_GET['id']){
            $query1 = "DELETE FROM cart WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id']."";
            mysqli_query($conn , $query1);
            echo "<script>window.location = 'cart.php'</script>";
            echo "<div class=\"alert alert-success\">
                  <strong>Success!</strong> Your item is successfully removed.
                  </div>";
          }
      }
  }
}

if (isset($_POST['plus'])){
  if ($_GET['action'] == 'remove'){
      while ($row = mysqli_fetch_assoc($result)){
          if($row["item_id"] == $_GET['id']){
              $query1 = "UPDATE cart SET quantity = quantity +1 WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id'].""; 
          mysqli_query($conn , $query1);
          echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}

if (isset($_POST['minus'])){
  if ($_GET['action'] == 'remove'){
      while ($row = mysqli_fetch_assoc($result)){
          if($row["item_id"] == $_GET['id']){
              $query1 = "UPDATE cart SET quantity = quantity -1 WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id'].""; 
          mysqli_query($conn , $query1);
          $update = "SELECT * FROM cart WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id'].""; 
          $result_update = mysqli_query($conn , $update);
          $row_update = mysqli_fetch_assoc($result_update);

          if ($row_update['quantity'] == 0)
          {
              $query1 = "DELETE FROM cart WHERE item_id = ".$row["item_id"]." and user_id = ".$_SESSION['user_id']."";

              mysqli_query($conn , $query1);
              echo "<script>window.location = 'cart.php'</script>";
          }
          echo "<script>window.location = 'cart.php'</script>";
          

          }
      }
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="styles.css">

  <style>
            .product img {
                width: 100%;
                height: auto;
                box-sizing: border-box;
                object-fit: cover;
            }

            #featured > div.row.mx-auto.container > nav > ul > li.page-item.active > a {
                background-color: black;
            }

            #featured > div.row.mx-auto.container > nav > ul > li:nth-child(n):hover>a {
                background-color: coral;
                color: white;
            }

            .pagination a {
                color: black;
            }

            .yellow-color {
                color:gold;
            }

            .modif {
              color:black;
            }

            .line {
              width: 100%;
              color: black;
            }



        </style>

  
</head>
<body class="bg-light">

  <?php 
    require_once("php/header.php");
  ?>

  <!-- What is to be displayed -->
  <div class="container-fluid" style="color:black">
    <div class="row px-5 pt-5 pb-2">
      <!-- Column for products -->
      <div class="col-md-7">
        <div class="shopping-cart">
          <h6 class="modif">My Cart</h6>
          <hr class="line">

          <?php
          
          $total = 0;
          $delivery = 12;
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $item_id = $row['item_id'];
                $item_query = "SELECT * FROM prac_product WHERE id = $item_id";
        
                $item_result = mysqli_query($conn, $item_query);
                $item = mysqli_fetch_assoc($item_result);
               
                echo cartElement($item['product_image'],$item['product_name'], $item['product_price'],  $item['id']);
                $total = $total + (int)$item['product_price'] * $row['quantity'];
                //echo $total;
          }
          }else {
            echo "<h5>Cart is empty</h5>";
          }

          

          ?>
          


          
        </div>
      </div>      
    </div>
    
    <div class="row px-5">
      <!-- Column for Price Calculation -->
      <div class="col-md-4 border rounded mt-5 bg-white h-25">
        <div class="pt-4">
          <h6 class="modif">PRICE DETAILS</h6>
          <hr class="line">
          <div class="row price-details">
            <div class="col-md-6">
              <?php
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                  $user_id = $_SESSION['user_id'];
                  $cart_query = "SELECT * FROM cart WHERE user_id = $user_id";
                  $cart_result = mysqli_query($conn, $cart_query);                
                  echo "<h6 class='modif'>Price </h6>";
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<h6 class='modif'>" . $item['item_name'] . " : " . $item['quantity'] . "</h6>";
                        echo "<h6 class='modif'>Price </h6>";
                    }
                  }
                  }else{
                      echo "<h6 class='modif'>Price</h6>";
                  }


              ?>
              <h6 class="modif">Delivery Charges</h6>
              <hr class="line">
              <h6 class="modif" id="amount-payable">Amount Payable</h6>
            </div>
            <div class="col-md-6">
              <h6 class="modif" id="total"><?php echo "$".(int)($total) ?></h6>
              <h6 class="text-success"><?php echo "FREE";?>
              </h6>
              <hr class="line">
              <h6 class="modif" id="amount-payable">
                <?php
                  echo "$".(int)($total);

                $_SESSION['total_price'] = (int)($total);
                 
                ?>

                
              </h6>

            </div>
          </div>
        </div>
        <form action="checkout.php">
          <input type="submit" value="Checkout" class="btn btn-primary btn-block mb-4" />
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
  integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
  crossorigin="anonymous"></script>

  

  
</body>
</html>