<?php

$host = "localhost";
$dbname = "ecommerce";
$username = "zaidali";
$password = "1234";

$mysqli = new mysqli(hostname: $host, 
                    username: $username, 
                    password: $password, 
                    database: $dbname);

if($mysqli->connect_errno) {
    die("Connection error: ".$mysqli->connect_error);
}

return $mysqli;
?>