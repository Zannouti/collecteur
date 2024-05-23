<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["ID"];
    // $_SESSION["email"]=$_POST["email"];
    // $_SESSION["email"]=$_POST["email"];
    var_dump( $_SESSION["email"]);

    header("location:profil.php");

    ?>
</body>
</html>