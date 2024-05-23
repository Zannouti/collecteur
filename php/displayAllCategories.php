<?php


// $query="SELECT categorie 
// evenement
// order by categorie
// ";
// $categories = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
// var_dump($categories);


// $query = "SELECT categorie FROM evenement ORDER BY categorie";
// $categories = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
// var_dump($categories);

$sql = "SELECT distinct evenement.CATEGORIE
        FROM evenement
        ORDER BY evenement.CATEGORIE;";
$categories = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);


?>