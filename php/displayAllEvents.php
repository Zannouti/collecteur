<?php
// require "config/db.php";
require __DIR__ . "/../config/db.php"; 
// request for display events 
$select = "SELECT   TITRE, image,  date,  categorie,ID_VERSION from evenement inner join version on  version.ID_EVENT = evenement.ID_EVENT  " ;

$statment = $conn->prepare($select);
$statment->execute();
$results = $statment -> fetchAll(PDO:: FETCH_ASSOC);

foreach ($results as $key ) {
    echo "<div class='card'>";
    echo "<img src='img/{$key['image']}' alt='Card 3 Image'>";
    echo "<h2>".$key['TITRE']."</h2";
    echo "<h4>".$key['categorie']."</h4>";
    echo "<p>".$key['date']."</p>";
    echo "<a href='detaills.php?id=".$key['ID_VERSION']."' class='card-button'>J'achete</a>";
    echo "</div>"; 
}

?>