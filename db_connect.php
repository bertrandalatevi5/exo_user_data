<?php
// connexion a la base de données

$serveurname = "localhost";
$username = "root";
$password = "";
$dbname = "siteweb";

$db_connect = mysqli_connect($serveurname , $username , $password , $dbname);

// verification de la connexion
  
if($db_connect){
    // echo "connexion reussie";
}
else{
    die("Connexion échouée" . mysqli_connect_error());
}

