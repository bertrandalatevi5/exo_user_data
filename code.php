<?php
session_start();
require_once 'db_connect.php';
$error = $data = [];

// modification
if(isset($_POST['update'])){
    // verification de l'id
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($db_connect, $_POST['id']);
    }
    else{
        $_SESSION['error'] = "erreur";
        header("location: view.php");
        
    }

   // nom
   if(empty($_POST['nom']))
   {
       $error += ['nom' => "veuillez saisir votre nom."] ;
   }else{
       $nom = mysqli_real_escape_string ($db_connect, $_POST['nom']);
       $data += ['nom' => $nom];
   }

    // prénom
    if(empty($_POST['prenom']))
    {
        $error += ['prenom' => "veuillez saisir votre prénom."] ;
    }else{
        $prenom = mysqli_real_escape_string ($db_connect, $_POST['prenom']);
        $data += ['prenom' => $prenom];
    }

   // email
   if(empty($_POST['email']))
   {
       $error += ['email' => "Veuillez saisir votre adresse e-mail."] ;
   }
   //format de email
   elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
   {
       $error += ['email' => "adresse e-mail invalid."] ;
   }
   else{
       $email = mysqli_real_escape_string ($db_connect, $_POST['email']);
       $data += ['email' => $email];
   }
   
   // address
   if(empty($_POST['address']))
   {
       $error += ['address' => "veuillez saisir votre address."] ;
   }else{
       $address = mysqli_real_escape_string ($db_connect, $_POST['address']);
       $data += ['address' => $address];
   }

   //  telephone
   if(empty($_POST['telephone']))
   {
       $error += ['telephone' => "veuillez saisir un numero de telephone."] ;
   }else{
       $telephone = mysqli_real_escape_string ($db_connect, $_POST['telephone']);
       $data += ['telephone' => $telephone];
   }
   //mot de passe
   if(!empty($_POST['password']))
   {

       if(strlen($_POST['password']) < 8)
       {
           $error += ['password' => "le mot de passe ne doit pas être inferieur à 8 caractères."] ;
       }
       else{
           $password = mysqli_real_escape_string ($db_connect, $_POST['password']);
           $data += ['password' => $password];
       }
   }
   //partie image
   // var_dump($_FILES['image']['type']);
   if($_FILES['image']['name'] != "")
   {
        $tmp = $_FILES['image']["tmp_name"];
        $imageName = date('y-m-d') . "_"  .$_FILES['image']['name'];
        $folder = "image/".$imageName;
        $filetype = pathinfo($folder,PATHINFO_EXTENSION);
        // extensions autorisées
        $allow_ext = ["jpg", 'png', 'jpeg'];
        if(!in_array($filetype, $allow_ext))
        {
            $error += ["image"=> "seul les fichiers 'jpg', 'png' et 'jpeg' "];
        }
   }
    // insertion a la db
    if(empty($error)){
       
        // verification si l'utilisateur existe
        $user_id = $_SESSION['user']['id'];
        $query = "SELECT * from users where id= '$user_id'";
        $query_run = mysqli_query($db_connect, $query);
        if(mysqli_num_rows($query_run) > 0)
        {
            $user = mysqli_fetch_assoc($query_run);
            $imagePath = "image/".$user['image'];
            
            if($_FILES['image']['name'] == "")
            {
                //garder l'ancienne image
                $imageName = $user['image'];
            }else{
                //supprimer l'ancienne image
                unlink($imagePath);
                //uploader la nouvelle image
                move_uploaded_file($tmp, $folder);
            }

            // mettre a jour
            $password = password_hash($password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users set nom ='$nom', prenom = '$prenom', email = '$email', address = '$address', telephone = '$telephone',
            password = '$password', image = '$imageName' where id = '$user_id'";
            if(mysqli_query ($db_connect, $update_query)) 
            {
                    $_SESSION['message'] =" Modification effectuée avec succès !!!";
                    header("location: profile.php?id=$user_id");
                    
            }  
            else  {
                $_SESSION['error'] = "Erreur lors de la mise à jour.";
                header("location: update.php");
                exit();
            }
        }
        else{
            $_SESSION['error'] = "Utilisateur non trouvé.";
            header("location: update.php");
            exit();
        }
        
    }else{
        $_SESSION ['error' ] = $error;
        $_SESSION ['data' ] = $data;
        header("location: update.php");
    }   
}

// insertion
if(isset($_POST['create']))
{
    // nom
    if(empty($_POST['nom']))
    {
        $error += ['nom' => "veuillez saisir votre nom."] ;
    }else{
        $nom = mysqli_real_escape_string ($db_connect, $_POST['nom']);
        $data += ['nom' => $nom];
    }

     // prénom
     if(empty($_POST['prenom']))
     {
         $error += ['prenom' => "veuillez saisir votre prénom."] ;
     }else{
         $prenom = mysqli_real_escape_string ($db_connect, $_POST['prenom']);
         $data += ['prenom' => $prenom];
     }

    // email
    if(empty($_POST['email']))
    {
        $error += ['email' => "Veuillez saisir votre adresse e-mail."] ;
    }
    //format de email
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $error += ['email' => "adresse e-mail invalid."] ;
    }
    else{
        $email = mysqli_real_escape_string ($db_connect, $_POST['email']);
        $data += ['email' => $email];
    }
    // vérifier si l'email existe deja
    $email = mysqli_real_escape_string ($db_connect, $_POST['email']);
    $query_email_verify = "SELECT * from users where email = '$email' ";
    $result = mysqli_query($db_connect, $query_email_verify);
    // var_dump(mysqli_num_rows($result) > 0);
    if(mysqli_num_rows($result) >0)
    {
        $error += ['email' => "ce email existe deja."] ;
    }
    
    // address
    if(empty($_POST['address']))
    {
        $error += ['address' => "veuillez saisir votre address."] ;
    }else{
        $address = mysqli_real_escape_string ($db_connect, $_POST['address']);
        $data += ['address' => $address];
    }

    //  telephone
    if(empty($_POST['telephone']))
    {
        $error += ['telephone' => "veuillez saisir un numero de telephone."] ;
    }else{
        $telephone = mysqli_real_escape_string ($db_connect, $_POST['telephone']);
        $data += ['telephone' => $telephone];
    }
    //mot de passe
    if(empty($_POST['password']))
    {
        $error += ['password' => "Veuillez saisir un mot de passe."] ;
    }
    elseif(strlen($_POST['password']) < 8)
    {
        $error += ['password' => "le mot de passe ne doit pas être inferieur à 8 caractères."] ;
    }
    else{
        $password = mysqli_real_escape_string ($db_connect, $_POST['password']);
        $data += ['password' => $password];
    }
    //partie image
    // var_dump($_FILES['image']['type']);
    if($_FILES['image']['type'] == "")
    {
        $error += ["image" => "veuillez choisir une photo de profil"];
    }else{
        $tmp = $_FILES['image']["tmp_name"];
        $imageName = date('y-m-d') . "_"  .$_FILES['image']['name'];
        $folder = "image/".$imageName;
        $filetype = pathinfo($folder,PATHINFO_EXTENSION);

    }
    if (empty($error)) {
        // Move the uploaded file to the desired folder
        if (move_uploaded_file($tmp, $folder)) {
            // Your insertion code goes here
            $tmp = $_FILES['image']["tmp_name"];
            $imageName = date('y-m-d') . "_"  .$_FILES['image']['name'];
            $folder = "image/".$imageName;
            $filetype = pathinfo($folder,PATHINFO_EXTENSION);
        } else {
            $error += ["image" => "Erreur lors du téléchargement de l'image."];
        }
    }
    
    // extensions autorisées
    $allow_ext = ["jpg", 'png', 'jpeg'];
    if(!in_array($filetype, $allow_ext))
    {
        $error += ["image"=> "seul les fichiers 'jpg', 'png' et 'jpeg' "];
    }

    // insertion a la db
    if(empty($error)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = ("INSERT into users (nom, prenom, email, address, telephone, password, image) values ('$nom', '$prenom', '$email', '$address', '$telephone', '$password', '$imageName')");
   
        if(mysqli_query ($db_connect, $query)) 
        {
                $_SESSION['message'] ="Inscription réussie. Connectez-vous!";
                header('location: connexion.php');
                
        }  
        else  {
                echo "Erreur " ;
        }
        
    }else{
        $_SESSION ['error' ] = $error;
        $_SESSION ['data' ] = $data;
        header('location: inscription.php');
    }
}

// connexion
if(isset($_POST["login"]))
{
    // email
    if(empty($_POST['email']))
    {
        $error += ['email' => "Veuillez saisir votre adresse e-mail."] ;
    }
    //format de email
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $error += ['email' => "adresse e-mail invalid."] ;
    }
    

    //mot de passe
    if(empty($_POST['password']))
    {
        $error += ['password' => "Veuillez saisir votre mot de passe."] ;
    }

    if(empty($error)){
        $email = mysqli_real_escape_string ($db_connect, $_POST['email']);
        $password = mysqli_real_escape_string ($db_connect, $_POST['password']);
    
    
        $query = "SELECT * from users where email = '$email' ";
        $result = mysqli_query($db_connect, $query);

        if(mysqli_num_rows($result) >0)
        {
            $user = mysqli_fetch_assoc($result);
            if(password_verify($password, $user['password']))
            {
                $_SESSION['user'] = $user;
                header('location: view.php');
            }else
            {
                echo "<h2>email ou mot de passe invalid</h2>";
            }
        } else{
            echo "Aucune information trouvée";
        }

    }
    else{
        $_SESSION ['error' ] = $error;
        $_SESSION ['data' ] = $data;
        header('location: connexion.php');
    }
}

?>