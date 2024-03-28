<?php
require_once "db_connect.php";
session_start();
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}


?>

<header>
        <!--navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="#"><span><</span>Freedy<span class="land">wolf></span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <?php  if (isset($_SESSION['user'])) :?>
                    <li class="nav-item">
                      <a class="nav-link" href="profile.php">Mon Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>

                  <?php else : ?>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php#about">About</a>
                    </li>
                  <?php  endif?>

                  
                </ul>
    
              </div>
            </div>
        </nav>
</header>