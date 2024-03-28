<?php 
        session_start();
        require_once "db_connect.php";
        $message = "";
        if(isset($_SESSION['message']))
        {
            $message = $_SESSION['message'];
        }

        // Vérifiez si l'utilisateur est connecté
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];

            if (!isset($_GET['id'])) {
                header("Location: profile.php?id=$user_id");
                exit();
            }
            $query = "SELECT * from users where id= '$user_id'";
            $query_run = mysqli_query($db_connect, $query);
            if(mysqli_num_rows($query_run) > 0)
            {
                $user = mysqli_fetch_array($query_run);
            }
            
        } else {
            header("location: index.php");
            exit();
        }
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
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
          <div class="col-md-12 mx-auto my-auto">
              <div class="card my-5 mx-auto shadow">
                    <h5>
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
                    </h5>
                    <div class="card-header">
                        <h4>
                            Information sur <small class="fw-bold"><i><?= $user['prenom']?></i></small>
                        </h4>
                    </div>
                    <div class="card-body mb-3">
                      <div class="row">
                          <div class="col-md-4 mb-3">
                              <img src="image/<?= $user['image']?>" alt="" class="img-thumbnail objet-fit-cover" style="height: 300px; width:300px;">
                          </div>
                          <div class="col-md-8">
                              <h2 class="fw-bold"><?= $user['nom']?> <?= $user['prenom']?>
                                  <a href="update.php" class="me-2 float-end" title="Modifier le profile"><i class="fa-solid fa-pen-to-square"></i></a>
                              </h2>
                              <table class="table">
                                  <tbody>
                                      <tr>
                                          <th scope="row">Nom</th>
                                          <td><?= $user['nom']?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Prénoms</th>
                                          <td><?= $user['prenom']?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Email</th>
                                          <td><?= $user['email']?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Address</th>
                                          <td><?= $user['address']?></td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Phone</th>
                                          <td><?= $user['telephone']?></td>
                                      </tr>
                                  </tbody>
                              </table>
                              <a href="index.php" class="btn btn-danger">Retour</a>
                          </div>
                      </div>
                    </div>
              </div>
              <div class="col-md-12 mb-5">
                  <h4 style="color: #ff7a00;">About me</h4>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia deserunt quo ad repudiandae nobis voluptas dolor quibusdam temporibus. Expedita quo aliquid ullam totam aliquam praesentium dignissimos dolor sapiente tempora ipsum.</p>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam nihil nesciunt, doloremque dicta vero, adipisci libero, fuga veniam officia iure accusamus. Maiores corporis eveniet optio beatae magni voluptatibus iure veritatis.</p>
                  <h4 style="color: #ff7a00;">Skills</h4>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia deserunt quo ad repudiandae nobis voluptas dolor quibusdam temporibus. Expedita quo aliquid ullam totam aliquam praesentium dignissimos dolor sapiente tempora ipsum.</p>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam nihil nesciunt, doloremque dicta vero, adipisci libero, fuga veniam officia iure accusamus. Maiores corporis eveniet optio beatae magni voluptatibus iure veritatis.</p>
              </div>
              <div class="col-md-12 text-center about">
              <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
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
        }
        .about{
            margin-bottom: 100px !important;
        }
    </style>               
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php unset($_SESSION['error']);unset($_SESSION['data'])?>