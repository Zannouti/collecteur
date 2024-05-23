<?php
 
if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $statement = $conn->prepare("SELECT TITRE, image, date, categorie FROM evenement INNER JOIN version ON version.ID_EVENT = evenement.ID_EVENT WHERE TITRE LIKE '%$str%' ");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
}
foreach ( $results as $key) {
      echo "<div class='card' >";
     echo "<img src='img/{$key ['image']}' alt='Card 3 Image'>";
     echo "<div class='card-content'>";
     echo "<h2>{$key['TITRE']}</h2>";
     echo "<p>".$key['categorie']."<p>";
     echo "<p>".$key['date']."</p>";
      echo "<a href='#' class='card-button'>J'achete</a>"; 
      echo "</div>";
      echo "</div>";

}






?>