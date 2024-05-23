<?php
require __DIR__ . "/../config/db.php"; 
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM client WHERE EMAIL='$email'";
    $res = $conn->query($sql);
    if ($res->rowCount() > 0) {

        $hashedPassword = $res->fetchAll(PDO::FETCH_ASSOC);

        echo "<br>";
        // Verification de la password
        
        
        if (password_verify($password, $hashedPassword[0]["password"])) {

        session_start();
            $_SESSION["ID"] =$hashedPassword[0]["id"];
            $_SESSION["nom"] =$hashedPassword[0]["nom"];
            $_SESSION["prenom"] =$hashedPassword[0]["prenom"];
            $_SESSION["email"] =$hashedPassword[0]["email"];
            header("Location:dashbord_client.php");

        }
        else{
            echo "Mot de passe incorrecte";
        }
    }
    else {
        echo "utilisateur introuvable";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" placeholder="email" >
        <input type="password" name="password" placehplder="password">
        <button type="submit" name="login" >Submit</button>
    </form>
</body>
</html>