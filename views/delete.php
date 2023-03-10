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

<?php
require_once("../db/conexion.php");
session_start();
$datos = $_SESSION['email'];
$sqli = mysqli_query($conexion, "SELECT * FROM user WHERE email='$datos'");
$row = mysqli_fetch_array($sqli);
$idperfil = $row['id'];
$idBook = $_GET["id"];

$sqli = mysqli_query($conexion, "DELETE FROM booking_book  WHERE id_user = $idperfil AND id_book = $idBook");

header("location: http://localhost/Biblioteca/views/Welcome.php");
?>