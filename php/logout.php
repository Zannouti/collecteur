<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php 
    session_unset();// remove all session variables
    session_destroy(); // destroy the session 
    
  header("location:signin.php");

     ?>
    
    
</body>
</html>