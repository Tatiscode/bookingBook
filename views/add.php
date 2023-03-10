<?php

session_start();

// if que se encarga de validar de que si no hay un inicio de sesion previo no se puede acceder a esta vista
if (!isset($_SESSION['email'])) {
    echo "
        
        <script>
        alert('Debes Iniciar sesión');
        window.location = 'http://localhost/Biblioteca/views/login.php';
        </script>
        ";
    session_destroy();
    exit();
}else{

}

?>


<?php

// Lama la conexion de la db, se requiere de una sesion iniciada, y ejecuta colsultas sobre las tablas involucradas para reservar un libro
require_once("../db/conexion.php");
session_start();
$datos = $_SESSION['email'];
$sqli = mysqli_query($conexion, "SELECT * FROM user WHERE email='$datos'");
$row = mysqli_fetch_array($sqli);
$idperfil = $row['id'];

$idProduct = $_GET["id"];
$sqli2 = mysqli_query($conexion, "SELECT * FROM  book  WHERE id_book = $idProduct ");
$row2 = mysqli_fetch_array($sqli2);
$idCategory = $row2["id_category"];
echo $idCategory;
$sqlDatos= "INSERT INTO booking_book(id_category,id_user,id_book)
Values('$idCategory','$idperfil','$idProduct')";
$verificar= mysqli_query($conexion,$sqlDatos);
header("location: http://localhost/Biblioteca/views/Welcome.php");
?>
