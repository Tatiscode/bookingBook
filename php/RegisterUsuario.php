<?php

require("../db/conexion.php");
//Captura y envia los datos por medio de el metodo POST
if (isset($_POST['nombreEnviar']) && isset($_POST['passwordEnviar']) && isset($_POST['emailEnviar'])) {
    //Verifica que los campos esten digilenciados 
    if ($_POST['nombreEnviar'] !== ""  && $_POST['passwordEnviar'] !== "" && $_POST['emailEnviar'] !== "") {
        // Asigancion de expresiones regulares
        if (!preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',
        $_POST['emailEnviar'])) {
            echo "";
           
    }
    if (!preg_match('/^.{2,40}$/',
    $_POST['nombreEnviar'])) {
        echo "errorComentario";
        exit();
}

$emailEnviar=$_POST['emailEnviar'];
$nombreEnviar = $_POST['nombreEnviar'];
$passwordEnviar =$_POST['passwordEnviar'];
$ip= $_SERVER['SERVER_ADDR'];
$navegandor= $_SERVER[ 'HTTP_USER_AGENT'];
$sqlDatos= "INSERT INTO user(name, email, password)
-- Envio de datos de registro a la db 
Values('$nombreEnviar','$emailEnviar','$passwordEnviar')";
$verificar= mysqli_query($conexion,$sqlDatos);
if (!$verificar) {
    echo "error";
    exit();
}else{
    echo "POST200";
    exit();
}

    }else{
        echo "campos_vacios";
    }
    
}


?>