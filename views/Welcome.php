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
} else {

    $datos = $_SESSION['email'];
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
  <?php
    require_once("../db/conexion.php");
    $sqli = mysqli_query($conexion, "SELECT * FROM user WHERE email='$datos'");
    $row = mysqli_fetch_array($sqli);
    $idperfil = $row['id'];
    $sql2 = mysqli_query($conexion, "SELECT  COUNT(*) as id FROM booking_book bk INNER JOIN user u ON bk.id_user = u.id INNER JOIN book b ON bk.id_book = b.id_book WHERE u.id =$idperfil");
$rows = mysqli_fetch_array($sql2);
$idper = $rows['id'];
   
    ?>
    <div class="container my-4 d-flex justify-content-between">
      <div class="list_items d-flex flex-column">
        <span>Nombre: <?php  echo $row['name'] ?></span>
        <span>Reservas: <?php echo $idper ?> </span>
        <span><a href="close.php">Cerrar Sesion</a> </span>
      </div>
      <div class="imagen">
        <img src="dfdfd" alt="gfgfd">
      </div>
    </div>
   <div class="container d-flex justify-content-between align-items-center">
   <h2 class="container mt-3"> Mis Reservas</h2>
    <a href="http://localhost/Biblioteca/views/categorys.php" class="nav-link bg-primary p-1 text-white" >Reservar</a>
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

$sql = mysqli_query($conexion, "SELECT  b.* FROM booking_book bk INNER JOIN user u ON bk.id_user = u.id INNER JOIN book b ON bk.id_book = b.id_book WHERE u.id =$idperfil");


while ($rowt = mysqli_fetch_array($sql)) { ?>
    <?php if (mysqli_num_rows($sql) > 0) { ?>
      <tr>
      <th scope="row"><?php echo $rowt["title"] ?></th>
      <th scope="row"><?php echo $rowt["author"] ?></th>
      <th scope="row"><?php echo $rowt["description"] ?></th>
      <td>
        <a href="delete.php?id=<?php echo $rowt['id_book'] ?>" class="bg-danger text-white p-2 m-4 block decoration-none">Eliminar </a>
      </td>
    </tr>
      <?php } else { ?>

<h2 class="text-center m-3">No hay publicaciones</h2>

<?php } ?>
<?php }

?>
    
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>