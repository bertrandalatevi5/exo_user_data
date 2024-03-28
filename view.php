<?php
require_once "db_connect.php";
session_start();
if(!isset($_SESSION['user'])){
    header("location: home.php");
}
else
{
    $user = $_SESSION['user'];
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
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
            <div class="card my-5 mx-auto shadow">
                <div class="card-header">
                   
                    <div class="alert alert-success">
                        <h3 class="fw-bold">Bienvenue <?= $user['prenom']?> <?= $user['nom']?> !!!</h3>  
                    </div>
                    <div>
                        <p class="">Cliquez pour voir votre profil</p>
                        <a href="profile.php" class="btn btn-danger">Voir mon profil</a>
                    </div>
                   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium harum modi esse non est accusamus eveniet, tenetur, illum error veritatis. Odit, saepe. Libero dignissimos velit numquam nesciunt vel nobis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, ullam facilis! Laborum laudantium cumque nobis reprehenderit repellat provident, enim ea omnis autem eos inventore non harum, vero atque suscipit culpa.
                        </p>
                        </div>
                        <div class="col-12 mb-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium harum modi esse non est accusamus eveniet, tenetur, illum error veritatis. Odit, saepe. Libero dignissimos velit numquam nesciunt vel nobis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, ullam facilis! Laborum laudantium cumque nobis reprehenderit repellat provident, enim ea omnis autem eos inventore non harum, vero atque suscipit culpa.
                        </p>
                        </div>
                        <div class="col-12 mb-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium harum modi esse non est accusamus eveniet, tenetur, illum error veritatis. Odit, saepe. Libero dignissimos velit numquam nesciunt vel nobis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, ullam facilis! Laborum laudantium cumque nobis reprehenderit repellat provident, enim ea omnis autem eos inventore non harum, vero atque suscipit culpa.
                        </p>
                        </div>
                        <div class="col-12 mb-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium harum modi esse non est accusamus eveniet, tenetur, illum error veritatis. Odit, saepe. Libero dignissimos velit numquam nesciunt vel nobis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, ullam facilis! Laborum laudantium cumque nobis reprehenderit repellat provident, enim ea omnis autem eos inventore non harum, vero atque suscipit culpa.
                        </p>
                        </div>
                        <div class="col-12 mb-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium harum modi esse non est accusamus eveniet, tenetur, illum error veritatis. Odit, saepe. Libero dignissimos velit numquam nesciunt vel nobis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, ullam facilis! Laborum laudantium cumque nobis reprehenderit repellat provident, enim ea omnis autem eos inventore non harum, vero atque suscipit culpa.
                        </p>
                        </div>
                        <div class="col-12 mb-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium harum modi esse non est accusamus eveniet, tenetur, illum error veritatis. Odit, saepe. Libero dignissimos velit numquam nesciunt vel nobis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, ullam facilis! Laborum laudantium cumque nobis reprehenderit repellat provident, enim ea omnis autem eos inventore non harum, vero atque suscipit culpa.
                        </p>
                        </div>
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
            margin-bottom: 500px !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>