<?php
session_start();
require_once "db_connect.php";
$error_email = $error_password = "";
$email = $password = "";
$message = "";

if(isset($_SESSION['message']))
{
    $message = $_SESSION['message'];
}

if(isset($_SESSION['error']))
 {
    if(isset($_SESSION['error']['email'])){
        $error_email = $_SESSION['error']['email'];
    }
    if(isset($_SESSION['error']['password'])){
        $error_password = $_SESSION['error']['password'];
    }
 }

 if(isset($_SESSION['data']))
 {
    if(isset($_SESSION['data']['email'])){
        $email = $_SESSION['data']['email'];
    }
    if(isset($_SESSION['data']['password'])){
        $password = $_SESSION['data']['password'];
    }
 }


?>







<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@0;1&family=Roboto&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- header -->
    <?php include('header.php'); ?>
    <!-- contenu -->
    <main>
      <section>
        <div class="container">
            <div class="card-header">
                        <?php
                        if($message !=null)
                        {
                        ?>
                            <div class="alert alert-success">
                                <h5>
                                    <?=$message?>
                                </h5>
                            </div>
                        <?php
                        unset($_SESSION['message']);
                        }
                        ?>
            </div>
            <div class="card-body">
                <div class="row gy-4 mt-5 mb-5 align-items-center">
                    <div class="text col-12 col-md-6 rounded-3 shadow">
                        <div class="text-center">
                            <h2 class="fw-bold">Welcome Back!!</h2>
                            <h3 class="fw-bold">Sign In Now!</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt voluptate</p>
                            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i>  </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 bg-white p-5 rounded-3 shadow">
                        <h3 class="mb-5 text-center fw-bold">Sign In</h3>
                        <form action="code.php" method="post">
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" value ="<?= $email?>" placeholder="Enter your email" aria-label="email" aria-describedby="basic-addon1">
                                <span class="text-danger"><?= $error_email?></span>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" value ="<?= $password?>" placeholder="Enter your password" aria-label="password" aria-describedby="basic-addon1">
                                <span class="text-danger"><?= $error_password?></span>
                            </div>
                            <div class="mb-5 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                <a href="" class="float-end">Forgot password?</a>
                            </div>
                            <div class="mb-4">
                                <button type="submit" name="login" class="btn btn-danger w-100">Sign In</button>
                            </div>
                            <div class="mb-5 text-center">
                                <label for="href">Don't have an account?</label>
                                <a href="inscription.php" class="">Sign Up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>  
    </main>
    <!-- footer -->
    <?php include('footer.php'); ?>
    <style>
       .text{
        background: url(oiseau.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: white;
        height: 460px;
        display: flex;
        justify-content: center;
        align-items: center;
       } 
       .text h2{
        font-size: 45px;
        color: #ff7a00;
       }
       .text h3{
        font-size: 30px;
        }
       .text p{
        max-width: 350px;
       }
       .text a{
        color: white;
        height: 30px;
        width: 50px;
        text-align: center;
        margin: 20px;
        font-size: 20px;
       }
       .text a:hover{
        color: black;
       }
       section .container{
        margin-top: 100px !important;
        margin-bottom: 100px !important;
       }
       .col-md-7{
        height: 500px;
       }
       .text-danger{
            font-size: 15px;
        }
        
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php unset($_SESSION['error']);unset($_SESSION['data'])?>