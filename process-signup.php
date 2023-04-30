<?php

if(empty($_POST["fname"]) || empty($_POST["lname"])) {
    die("Name is required");
}

if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if(strlen($_POST["Password"]) < 6) {
    die("Password must be at least 6 characters");
}

if(!preg_match("/[a-z]/i", $_POST["Password"])) {
    die("Password must contain at least one letter");
}

if(!preg_match("/[0-9]/", $_POST["Password"])) {
    die("Password must contain at least one number");
}

if($_POST["Password"] !== $_POST["CPassword"]) {
    die("Passwords must match");
}

if(empty($_POST["user"])) {
    die("Select a user type");
}

$password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

// To start connection
$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO customer (contact_no, fname, lname, email, password_hash, address_cust, type)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("issssss",
                $_POST["number"],
                $_POST["fname"],
                $_POST["lname"],
                $_POST["Email"],
                $password_hash,
                $_POST["address"],
                $_POST['user']);

if($stmt->execute()) {
    //echo "Signup Successful";
    //echo '<script>alert("Signup Successful")</script>';
    header("Location: login.php");
    exit;
}
else {
    die($mysqli->error . " " . $mysqli->errno);
}
//print_r($_POST);
//var_dump($password_hash);
?>