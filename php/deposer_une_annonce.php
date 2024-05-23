<?php



session_start();
if (!isset($_SESSION["email"])) {
    echo"please sign in";
    header("location:signin.php");
}

  else{ ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deposer une annonce</title>
</head>
<body>
    <h3>Bonjour!</h3>
    <p>Connectez-vous ou créez un compte pour déposer votre annonce.</p>
    <button><a href="signin.php">me connecter</a></button>
    <button><a href="signUp.php">créer un compte</a></button>
</body>
</html>

<?php }?>
