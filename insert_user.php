<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "zaidali", "1234", "ecommerce");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        if(isset($first_name) || isset($last_name) || isset($pass) || isset($email) || isset($user_type)){
            $first_name =  $_POST['fname'];
            $last_name = $_POST['lname'];
            $pass = $_POST['Password'];
            $email = $_POST['Email'];
            $user_type = $_POST['user'];
               
            // Performing insert query execution
            // here our table name is college
            $sql = "INSERT INTO customer  VALUES ('9594',
                  '$first_name','RSV','$email','$pass')";
               
            if(mysqli_query($conn, $sql)){
                  echo "<h3>data stored in a database successfully."
                     . " Please browse your localhost php my admin"
                     . " to view the updated data</h3>";
            } else{
                  echo "ERROR: Hush! Sorry $sql. "
                     . mysqli_error($conn);
            }
        }
        
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>