<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" contents="width=device-width, initial-scale=1.0">
        <title>ADD PRODUCT</title>

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
                    <a class="nav-link" href="shop.html">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                  </li>
              </div>
            </div>
        </nav>

        <section id="add_prod_form" class="pt-5 mt-5 mb-5 w-50%">
          <form action="prac_insert_product.php" method="post" name="add_prod_form">
            
            <div class="container login pt-5">

                <!--Product ID and name-->
                <div class="row">
                    <div class="form-outline mb-4 col">
                        <input type="text" name="prod_id" id="prod_id" class="form-control" required>
                        <label class="form-label" for="prod_id">Product ID</label>
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="prod_nm" id="prod_nm" class="form-control" required>
                        <label class="form-label" for="prod_nm">Produt Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="form-outline mb-4 col">
                        <input type="text" name="prod_price" id="prod_price" class="form-control" required>
                        <label class="form-label" for="prod_price">Product Price (in USD)</label>
                    </div>
                </div>
                
                <!-- <div class="row px-4">
                    <label for="fileSelect">FileName:</label><br>
                    <input type="file" name="photo" id="fileSelect">
                    <input type="submit" name="submit" value="Upload">
                    <p><strong>Note:</strong>Only .jpg, .jpeg, .gif, .png formats are allowed to a max size of 5MB</p>
                </div> -->

                <!-- File uploading for the product image -->
                <div class="row"></div>

                  

                
                
                <!--Submit button-->
                <input type="submit" class="btn btn-primary btn-block mb-4" />

            </div>
          </form>

          <style>
            .center {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 200px;
              
            }
          </style>

          <div class="container center">
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
            <a href="logout.php" class="btn">Logout</a>
          </div>
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