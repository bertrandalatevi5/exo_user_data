<?php
 session_start();
 $error_nom = $error_prenom = $error_email = $error_address = $error_telephone = $error_password = $error_image = "";
 $nom = $prenom = $email = $address = $telephone= $password = $image = "";
 
 if(isset($_SESSION['error']))
 {
    if(isset($_SESSION['error']['nom'])){
        $error_nom = $_SESSION['error']['nom'];
    }
    if(isset($_SESSION['error']['prenom'])){
        $error_prenom = $_SESSION['error']['prenom'];
    }
    if(isset($_SESSION['error']['email'])){
        $error_email = $_SESSION['error']['email'];
    }
    if(isset($_SESSION['error']['address'])){
        $error_address = $_SESSION['error']['address'];
    }
    if(isset($_SESSION['error']['telephone'])){
        $error_telephone = $_SESSION['error']['telephone'];
    }
    if(isset($_SESSION['error']['password'])){
        $error_password = $_SESSION['error']['password'];
    }
    if(isset($_SESSION['error']['image'])){
        $error_image = $_SESSION['error']['image'];
    }
 }

 if(isset($_SESSION['data']))
 {
    if(isset($_SESSION['data']['nom'])){
        $nom = $_SESSION['data']['nom'];
    }
    if(isset($_SESSION['data']['prenom'])){
        $prenom = $_SESSION['data']['prenom'];
    }
    if(isset($_SESSION['data']['email'])){
        $email = $_SESSION['data']['email'];
    }
    if(isset($_SESSION['data']['address'])){
        $address = $_SESSION['data']['address'];
    }
    if(isset($_SESSION['data']['telephone'])){
        $telephone = $_SESSION['data']['telephone'];
    }
    if(isset($_SESSION['data']['password'])){
        $password = $_SESSION['data']['password'];
    }
    if(isset($_SESSION['data']['image'])){
        $image = $_SESSION['data']['image'];
    }
 }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@0;1&family=Roboto&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- header -->
    <?php include('header.php');?>
    <!-- contenu -->
    <main>
      <section>
        <div class="container">
          <div class="col-md-8 mx-auto my-auto">
              <div class="card my-5 mx-auto shadow">
                  <div class="card-body mb-3">
                      <h3 class="mb-5 text-center fw-bold">Sign Up</h3>
                      
                      <form class="row g-3" action="code.php" method="post" enctype="multipart/form-data">
                          <div class="col-md-6 mb-2">
                              <input type="text" class="form-control" placeholder="Nom" name="nom" value ="<?= $nom?>" id="name">
                              <span class="text-danger"><?= $error_nom?></span>
                          </div>
                          <div class="col-md-6 mb-2">
                              <input type="text" class="form-control" placeholder="Prénom" name="prenom" value ="<?= $prenom?>" id="prenom">
                              <span class="text-danger"><?= $error_prenom?></span>
                          </div>
                          <div class="col-md-12 mb-2">
                              <input type="email" class="form-control" placeholder="Enter your email" name="email" value ="<?= $email?>" id="email">
                              <span class="text-danger"><?= $error_email?></span>
                          </div>
                          <div class="col-md-6 mb-2">
                              <input type="text" class="form-control" placeholder="Address" name="address" value ="<?= $address?>" id="address">
                              <span class="text-danger"><?= $error_address?></span>
                          </div>
                          <div class="col-md-6 mb-2">
                              <input type="number" class="form-control" placeholder="Télephone" name="telephone" value ="<?= $telephone?>" id="telephone">
                              <span class="text-danger"><?= $error_telephone?></span>
                          </div>
                          <div class="col-md-12 mb-2">
                              <input type="password" class="form-control" placeholder="Enter your password" name="password" value ="<?= $password?>" id="password">
                              <span class="text-danger"><?= $error_password?></span>
                          </div>
                          <div class="col-md-12 mb-2">
                              <span class="input-group-text bg-secondary text-white" id="basic-addon1">Choose a profile picture</span>
                              <input type="file" class="form-control" name="image" value ="<?= $imageName?>">
                              <span class="text-danger"><?= $error_image?></span>
                          </div>
                          
                          <div class="col-12 mb-3">
                              <button type="submit" name="create" class="btn btn-danger w-100">Sign Up</button>
                          </div>
                          <div class="mb-4 text-center">
                              <label for="href">Already have an account?</label>
                              <a href="connexion.php" class="">Sign In</a>
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
        .card{
            margin-top: 100px !important;
            margin-bottom: 100px !important;
        }
        .text-danger{
            font-size: 15px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php unset($_SESSION['error']);unset($_SESSION['data'])?>