<?php

session_start();
if (!isset($_SESSION['email'])) {


    echo "
        
        <script>
        alert('Debes Iniciar sesión');
        window.location = 'http://localhost/Biblioteca/views/login.php';
        </script>
        ";
    session_destroy();
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <!-- Card -->
<div class="card container mt-4" style="width: 18rem;">

<?php
require_once("../db/conexion.php");
$idB = $_GET['id'];
$sqli = mysqli_query($conexion, "SELECT * FROM book WHERE id_book=$idB");
$row = mysqli_fetch_array($sqli);
$idperfil = $row['id_book'];

?>
<div class="view overlay">
  <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).webp"
    alt="Card image cap">
  <a href="#!">
    <div class="mask rgba-white-slight"></div>
  </a>
</div>

<div class="card-body">
  <div class="card-title" >
    <h4>
    
  <?php echo $row["title"] ?></h4>
  <p class="card-text"><?php echo $row["description"]?></p>
  <a href="add.php?id=<?php echo $row["id_book"]?>" class="btn btn-primary">Reservar Libro</a>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>