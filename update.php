<?php
 session_start();
 require_once 'db_connect.php';
 $error_nom = $error_prenom = $error_email = $error_address = $error_telephone = $error_password = $error_image = "";
 $nom = $prenom = $email = $address = $telephone= $password = $image = "";
 
    // Vérifiez si l'utilisateur est connecté
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];

        if (!isset($_GET['id'])) {
            header("Location: update.php?id=$user_id");
            exit();
        }
        $query = "SELECT * from users where id= '$user_id'";
        $query_run = mysqli_query($db_connect, $query);
        if(mysqli_num_rows($query_run) > 0)
        {
            $user = mysqli_fetch_array($query_run);
        }
        
    } else {
        header("location: view.php");
        exit();
    }

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
    <title>Update</title>
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
            <div class="container-xl">
                <form class="row" action="code.php" method= "post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <!-- Profile picture card-->
                        <div class="card mb-3 shadow">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <img class="img-account-profile rounded-circle mb-2" src="image/<?= $user['image']?>" alt="">
                                <h5 class="fw-bold"><?= $user['nom']?> <?= $user['prenom']?></h5>
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <button class="btn btn-danger" type="button">Upload new image
                                    <span class="text-danger"><?= $error_image?></span>
                                    <input class="form-control" type="file" name="image" value="<?= $user['image']?>" for="form">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!-- Account details card-->
                        <div class="card shadow">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6 mb-2">
                                        <label class="small mb-1" for="inputFirstName">Nom</label>
                                        <input class="form-control" id="inputFirstName" name="nom" value="<?= $user['nom']?>" type="text">
                                        <span class="text-danger"><?= $error_nom?></span>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="small mb-1" for="inputLastName">Prénom</label>
                                        <input class="form-control" id="inputLastName" name="prenom" value="<?= $user['prenom']?>" type="text">
                                        <span class="text-danger"><?= $error_prenom?></span>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="small mb-1" for="inputEmail">Email address</label>
                                        <input class="form-control" id="inputEmail" name="email" value="<?= $user['email']?>" type="text">
                                        <span class="text-danger"><?= $error_email?></span>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="small mb-1" for="inputAddress">Address</label>
                                        <input class="form-control" id="inputAddress" name="address" value="<?= $user['address']?>" type="text">
                                        <span class="text-danger"><?= $error_address?></span>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="small mb-1" for="inputTelephone">Télephone</label>
                                        <input class="form-control" id="inputTelephone" name="telephone" value="<?= $user['telephone']?>" type="number">
                                        <span class="text-danger"><?= $error_telephone?></span>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="small mb-1" for="inputPassword">Change Password</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password">
                                        <span class="text-danger"><?= $error_password?></span>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="small mb-1" for="inputPassword">Confirm Password</label>
                                        <input class="form-control" id="inputPassword" name="password-cofirm" type="password">
                                        <span class="text-danger"><?= $error_password?></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $user['id']?>">
                                    <div class="col-12 mb-3">
                                        <a href="profile.php" class="btn btn-danger">Retour</a>
                                        <button type="submit" name="update" class="btn btn-danger float-end">Save changes</button>
                                    </div>
        
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- footer -->
    <?php include('footer.php'); ?>
    <style>
        .container-xl{
            margin-top: 100px !important;
            margin-bottom: 100px !important;
        }
 
        .img-account-profile {
            height: 10rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        .card .card-header {
            font-weight: 500;
        }
        .card-header {
            padding: 10px;
            background-color: rgba(33, 40, 50, 0.03);
        }
        .text-danger{
            font-size: 15px;
        }
    </style>               
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php unset($_SESSION['error']);unset($_SESSION['data'])?>