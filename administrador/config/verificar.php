<?php
session_start();
$url="http://".$_SERVER['HTTP_HOST']."/sitioweb/ingresar.php";//ingresar.php
$url1 ="http://".$_SERVER['REQUEST_URI'];
$host="localhost";
$db="db_fabricafrito";
$usuario="root";
$contrasenia="";

try {
    $conexion= new PDO("mysql:host=$host;dbname=$db",$usuario, $contrasenia);
    if ($conexion){ echo "";}
} catch (Exception $ex) {
    echo $ex->getMessage();
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = '".$_SESSION['USUARIO']."';");
$sentenciaSQL->execute();
$usuario = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



if (count($usuario) == 0) :?>
  
   <meta http-equiv="refresh" content="0;url=<?=$url?>"> 
    <?php endif?>