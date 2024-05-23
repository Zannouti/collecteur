<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo"please sign in";
    header("location:signin.php");
}

  else{
 require __DIR__ . "/../config/db.php"; 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>allAnnonce</title>
</head>
<body>
<?php
$requete = "SELECT * from article ";
    $stmt=$conn->query($requete);


    $stmt->execute();
    $result=$stmt->fetchAll(PDO:: FETCH_ASSOC);
    echo " <table  border='1'>";
    echo "<tr>";
    echo "<td>titre</td>";
    echo "<td>etat</td>";
    echo "<td>prix</td>";
    echo "<td>adress</td>";
    echo "<td>action</td>";
    echo "</tr>";

    foreach ($result as $key) {
        $id=$key["id_article"];
       echo "<tr>";
       echo "<td>.{$key["titre"]}.</td>";
       echo "<td>.{$key["etat"]}.</td>";
       echo "<td>.{$key["prix_pre_paye"]}.</td>";
       echo "<td>.{$key["adresse"]}.</td>";
       echo "<td> <a href='delete.php?id=".$id."'>Delete</a></td>";
       echo "<td> <a href='createAnnonce.php?id=".$id."'>update</a></td>";
       
    //    echo "<td> <a href='index.php?id= ".$id."'>update</a></td>";     
       echo "</tr>";
    }
    echo "</table>";
    ?>

</body>
</html>

<?php }?>