<?php

session_start();
$total_price = $_SESSION['total_price'];


?>



<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" contents="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="styles.css">

        <style>

            .login {
                border: 3px solid coral;
                border-radius: 10px;
                margin-top: 100px;
                width: 35%;
                background-color: black;
                color: white;
            }

            .login > a {
                color: black;
                text-decoration: underline;
                display: block;
            }


            


        </style>

    </head>
    <body>


        

        <section id="login-page" class="pt-5 mt-5 mb-5 w-50%">
          <form action="add-order.php" method="post" name="loginform" onsubmit="validation()" ">
            
            <div class="container login pt-5">
              <h3 style="text-align: center">Complete Your Order</h3>

                <!--Name-->
                <div class="row">
                    <div class="form-outline mb-4 col">
                        <input type="text" name="fname" id="fname" class="form-control" required>
                        <label class="form-label" for="fname">First Name</label>
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="lname" id="lname" class="form-control" required>
                        <label class="form-label" for="lname">Last Name</label>
                    </div>
                </div>

                <!--Phone Number-->
                <div class="form-outline mb-4">
                  <input type="tel" name="number" id="number" class="form-control" required>
                  <label class="form-label" for="number">Phone Number</label>
                </div>

                <!--Address-->
                <div class="form-outline mb-4">
                  <input type="text" name="address" id="address" class="form-control" required>
                  <label class="form-label" for="address">Residential Address</label>
                </div>

                <!--Email-->
                <div class="form-outline mb-4">
                    <input type="email" name="Email" id="Email" class="form-control" required>
                    <label class="form-label" for="Email">Email Address</label>
                </div>

                <!-- Payable Amount -->
                <div class="form-outline mb-4">
                  <h3>Total Payable Amount via COD</h3>
                  <?php echo "$".$total_price; ?>
                </div>

               
                <!--Submit button-->
                <input type="submit" class="btn btn-primary btn-block mb-4" />

                

            </div>
          </form>
        </section>

        


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
        crossorigin="anonymous"></script>
        <script src="myscript.js"></script>



    </body>
</html>