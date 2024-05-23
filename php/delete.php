<?php
 require __DIR__ . "/../config/db.php"; 

$id=$_GET['id'];

$requet="DELETE FROM article where id_article=$id";
// $query=mysqli_query($conn,$requet);
$stmt=$conn->query($requet);
$stmt->execute();

if (isset($stmt)) {
    header("location:allAnnonces.php");
    
   }
else{
    echo"ERROR";
}

?>