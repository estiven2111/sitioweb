<?php

/**$host="162.241.61.135";
$db="fabric42_fabricadelfrito";
$usuario="fabric42_TecnoEAM";
$contrasenia="E1020441estiven";**/

$host="localhost";
$db="fabricafrito";
$usuario="root";
$contrasenia="";

try {
    $conexion= new PDO("mysql:host=$host;dbname=$db",$usuario, $contrasenia);
    if ($conexion){ echo "";}
} catch (Exception $ex) {
    echo $ex->getMessage();
}


?>