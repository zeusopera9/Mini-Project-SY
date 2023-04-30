<?php

session_start();
$iden = $_SESSION["user_id"];
$total_price = $_SESSION['total_price'];

if(empty($_POST["fname"]) || empty($_POST["lname"])) {
    die("Name is required");
}

if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}


// To start connection
$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO order_placed (iden, status, transport_id, customer_email, transporter_contact, cost) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$status = "Ordered";
$trid = 108;
$tremail = "zaidali.m@somaiya.edu";

$stmt->bind_param("isissi",
                $iden,
                $status,
                $trid,
                $_POST["Email"],
                $tremail,
                $total_price);

if($stmt->execute()) {
    //echo "Signup Successful";
    //echo '<script>alert("Signup Successful")</script>';
    header("Location: index.php");
    exit;
}
else {
    die($mysqli->error . " " . $mysqli->errno);
}
//print_r($_POST);
//var_dump($password_hash);
?>