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

<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <div class="dropdown">
  
  <div class="container d-flex justify-content-between align-items-center">
   <h2 class="container mt-3"> Libros disponibles</h2>
   <div class="f">
   <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Filtrar por Categoria
  </button>
   </div>
   <div class="n">

   </div>
   </div>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Drama</a></li>
    <li><a class="dropdown-item" href="#">Romance</a></li>
    <li><a class="dropdown-item" href="#">Ciencia Ficcion</a></li>
    <li><a class="dropdown-item" href="#">Terror</a></li>
    <li><a class="dropdown-item" href="#">Comedia</a></li>
  </ul>
</div>
<table class="table container border mt-4">
<thead>
    <tr>
      <th scope="col">Titulo </th>
      <th scope="col">Autor</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
  require_once("../db/conexion.php");

$sql = mysqli_query($conexion, "SELECT * FROM book");


while ($rowt = mysqli_fetch_array($sql)) { ?>
    <?php if (mysqli_num_rows($sql) > 0) { ?>
      <tr>
      <th scope="row"><?php echo $rowt["title"] ?></th>
      <th scope="row"><?php echo $rowt["author"] ?></th>
      <th scope="row"><?php echo $rowt["description"] ?></th>
      <td>
        <a href="booking.php?id=<?php echo $rowt['id_book'] ?>" class="bg-primary text-white p-2 m-4 block decoration-none">Reservar</a>
      </td>
    </tr>
      <?php } else { ?>

<h2 class="text-center m-3">NO HAY LIBROS DISPONIBLES!!!</h2>

<?php } ?>
<?php }

?>
    
    
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>