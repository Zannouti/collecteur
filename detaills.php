<?php
include 'config/db.php';
include'./php/catchDetails.php';
$idVersion = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
  
    <?php $event = catchDetailsFun($conn, $idVersion);
    var_dump($event['TITRE']);
    var_dump($event['DATE']);
    ?>
    
    <div class="container">
  <div class="row align-items-start">
    <div class="col w-100">
    <img src="img/<?php echo $event['IMAGE']?>" alt="" class="w-100 h-auto" style="width:200px">
</div>
    <div class="col">
      <h2><?php echo $event['TITRE']?></h2>
      <h3><?php echo $event['DATE']?></h3>
      <p><?php echo $event['DESCRIPTION']?></p>
      <form action="" method="post">
      <div class="input-group mb-3">
            <input type="number" name="Normal" class="form-control" placeholder="Normal" aria-label="Normal" aria-describedby="basic-addon1">
    </div>
      <div class="input-group mb-3">
            <input type="number" name="Reduit" class="form-control" placeholder="Reduit" aria-label="Reduit" aria-describedby="basic-addon1">
    </div>
      <div class="input-group mb-3">
            <input type="submit" name="Reserver" class="form-control" value="Reserver">
    </div>
      </form>
    </div>

  </div>
</div>


<?php 
?>


    
</body>
</html>