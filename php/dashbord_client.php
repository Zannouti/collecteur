<?php

session_start();
if (!isset($_SESSION["email"])) {
    echo"please sign in";
    header("location:signin.php");
}

  else{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Achat-Revente</title>
    <link rel="stylesheet" href="../assets/style.css"> 
</head>
<body>
   
    <main>
        <section>
            <h2></h2>
            <ul>
                <button><a href="createAnnonce.php">créer une annonce</a></button>
                <button><a href="profil.php">Mes info</a></button>
                <button><a href="allAnnonces.php">Mes annonces</a></button>
                <button><a href="logout.php">déconnection</a><button>
                <!-- Add more services as needed -->
            </ul>
        </section>

        
    </main>

    <footer>
    </footer>
</body>
</html>




<?php }?>
    