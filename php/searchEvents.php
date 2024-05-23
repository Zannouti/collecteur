<?php
include "config/db.php";
$sql="SELECT *
from evenement INNER JOIN version on version.ID_EVENT = evenement.ID_EVENT
WHERE DATE > curdate()";
$params=[];
if (!empty($_POST['categorie'])) {
    $sql .= " AND  categorie = :category";
    $params['category'] = $_POST['categorie'];
}
if(!empty($_POST['search'])) {
  $sql.=" AND TITRE LIKE:search";
  $params['search']="%".$_POST['search']."%";
}
if(!empty($_POST['startDate']) && !empty($_POST['endDate'])) {
  $sql.=" AND Date BETWEEN :startdate AND : enddate";
  $params['startdate']=$_POST['startDate'];
  $params['endate']=$_POST['endDate'];
}
print_r($sql);
$statement = $conn->prepare($sql);
$statement->execute([
  "search"=>"%ee%"
]);
//requête préparée avec des paramètres liés (:category, :search, :startdate, :enddate)
$eventsData = $statement ->fetch(PDO::FETCH_ASSOC); 
var_dump($eventsData);
?>