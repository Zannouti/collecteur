<?php
$servername = "127.0.0.1";
$username = "root";
$password = ""; 

try {
    $conn = new PDO("mysql:host=$servername;port=3307;dbname=projet_finale", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>