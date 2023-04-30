<?php 

    session_start();
    if(isset($_SESSION["user_id"])) {
        session_destroy();
        header('location: index.php');
    }
    else {
        echo "<script>alert'Error while logging out')</script>";
    }

?>