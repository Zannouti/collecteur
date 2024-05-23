<?php
// request for display events 
$select = "SELECT   TITRE, image,  date,  categorie from evenement inner join version on  version.ID_EVENT = evenement.ID_EVENT" ;
include "config/db.php";

$statment = $conn -> prepare($select);
$statment->execute();
$results = $statment -> fetchAll(PDO:: FETCH_ASSOC);












?>