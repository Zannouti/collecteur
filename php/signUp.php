<?php
require __DIR__ . "/../config/db.php"; 



if (isset($_POST["signup"])){
    $nom =  $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM client WHERE email =  '$email' ";
    $nbrRows = $conn->query($sql)->rowCount();
    if ($nbrRows == 0){
        $insr ="INSERT INTO client (NOM,PRENOM,EMAIL,PASSWORD)
        VALUES ('$nom','$prenom','$email','$hashedPassword');";
        $result = $conn->exec($insr);
        //for check profil utilisateur   
    }
    else {
        echo 'Cet  email existe déjà!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>signup</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" name = "nom" placeholder = "nom">
    <input type="text" name = "prenom" placeholder = "prenom">
    <input type="email" name = "email" placeholder = "email">
    <input type="text" name = "password" placeholder = "password">
    <input type="submit" name = "signup" value = "sign up">
</form>
</body>
</html>