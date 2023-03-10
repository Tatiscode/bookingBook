<?php

//Cierre de sesion

session_start();
if(isset($_SESSION['email'])){

    session_destroy();
    header("location: http://localhost/Biblioteca/views/login.php");
}


?>