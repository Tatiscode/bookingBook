<?php
// Se requiere de un inicio de sesion
session_start();
// Se llama la conexion de la db
require_once("../db/conexion.php");

$correo = $_POST['emailEnviar'];
$pass = $_POST['passwordEnviar'];

// Consulta a la base de datos 
$mysqSesion= mysqli_query($conexion,"SELECT * FROM user WHERE email='$correo' AND password='$pass'");

// Condicional if que evalua y muestra dos tipos de respuesta:error si no se encuentra un correo que conincida o login existoso
if(mysqli_num_rows($mysqSesion)>0){
    $_SESSION['email']=$correo;
    echo "EXITO_OK";
    exit();
}else{
    echo "NOT_EXITO";
    exit();
}


?>