
<?php


session_start();
if (!isset($_SESSION["email"])) {
    echo"please sign in";
    header("location:signin.php");
}
else{

echo " <h1> votre informations personnelles </h1>";
echo "<h2> "."Identifiant : ". $_SESSION["ID"]."</h2>"."<br>";  
echo "<h2> "."Nom : ". $_SESSION["nom"]."</h2>"."<br>"; 
echo "<h2> "."Prenom : ". $_SESSION["prenom"]."</h2>"."<br>"; 
echo "<h2> "."address email : ". $_SESSION["email"]."</h2>"."<br>";

echo "<a href='logout.php'>Modifier<a/>";

echo "<a href='logout.php'>logout<a/>";

}
?>

    

