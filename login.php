<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require __DIR__ . "/database.php";

  $sql = sprintf("SELECT * FROM customer 
                  WHERE email = '%s'",
                  $mysqli->real_escape_string($_POST["Email"]));

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();

  if($user) {

    if(password_verify($_POST["Password"], $user["password_hash"])){
      
      session_start();
      $_SESSION["user_id"] = $user["contact_no"];
      if($user['type']=='admin') {
        header("Location: prac_admin_form.php");
      }
      else {
        header("Location: index.php");
      }

      
      exit;

    }
  }

  $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" contents="width=device-width, initial-scale=1.0">
        <title>Login</title>

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


        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
            <div class="container">
              <img src="img/logo1.png" alt="" width="40" height="40">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i id="bar" class="bi bi-list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                 
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="prac_shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                  </li>
              </div>
            </div>
        </nav>

        

        <section id="login-page" class="pt-5 mt-5">
          <?php if ($is_invalid): ?>
            <center><em>Invalid Login</em></center>
          <?php endif; ?>
          <form method="post" name="loginform">
            <!--Email Address-->
            <div class="container login pt-5">
                <div class="form-outline mb-4">
                    <input name="Email" id="email" class="form-control" required 
                    value="<?= htmlspecialchars($_POST["Email"] ?? "" ) ?>">
                    <label class="form-label" for="email">Email Address</label>
                </div>
    

                <!--Password-->    
                <div class="form-outline mb-4">
                    <input type="password" name="Password" id="Password" class="form-control" required>
                    <label class="form-label" for="Password">Password</label>
                </div>
        


                <!--Submit button-->
                <input type="submit" class="btn btn-primary btn-block mb-4" />

                <!--Register buttons-->
                <div class="text-center">
                    <p>Not a member? <a href="register.php"><span>Register</span></a></p>
                </div>

            </div>
          </form>
        </section>

        <footer class="mt-5 py-5">
          <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
              <img src="img/logo2.png" alt="">
              <p class="pt-3">Text for footer one</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
              <h5 class="pb-2">Featured</h5>
              <ul class="text-uppercase list-unstyled">
                <li><a href="#">men</a></li>
                <li><a href="#">women</a></li>
                <li><a href="#">boys</a></li>
                <li><a href="#">girls</a></li>
                <li><a href="#">new arrivals</a></li>
                <li><a href="#">shoes</a></li>
                <li><a href="#">clothes</a></li>
              </ul>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
              <h5 class="pb-2">Contact Us</h5>
              <div>
                <h6 class="text-uppercase ">Address</h6>
                <p>123 Street, City, pin</p>
              </div>
              <div>
                <h6 class="text-uppercase ">Contact</h6>
                <p>+0 123 456 7890</p>
              </div>
              <div>
                <h6 class="text-uppercase ">Email</h6>
                <p>sample@website.com</p>
              </div>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-12">
              <h5 class="pb-2">Instagram</h5>
              <ul class="text-uppercase list-unstyled">
                <div class="row">
                  <img class="img-fluid w-25 h-100 m-2" src="img/insta/1.jpg" alt="">
                  <img class="img-fluid w-25 h-100 m-2" src="img/insta/2.jpg" alt="">
                  <img class="img-fluid w-25 h-100 m-2" src="img/insta/3.jpg" alt="">
                  <img class="img-fluid w-25 h-100 m-2" src="img/insta/4.jpg" alt="">
                  <img class="img-fluid w-25 h-100 m-2" src="img/insta/5.jpg" alt="">
                </div>
            </div>
          </div>

          <div class="copyright mt-5">
            <div class="row container mx-auto">

              <div class="col-lg-3 col-md-6 col-12 mb-4">
                <img src="img/payment.png" alt="">
              </div>
              <div class="col-lg-3 col-md-6 col-12 text-nowrap mb-2">
                <p>Practice ecommerce copyright</p>
              </div>
              <div class="col-lg-3 col-md-6 col-12">
                <a href><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>
          </div>


        </footer>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
        crossorigin="anonymous"></script>
        <script src="myscript.js"></script>



    </body>
</html>