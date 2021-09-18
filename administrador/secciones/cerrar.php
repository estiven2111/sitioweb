<?php

session_start();
session_destroy();
//header('Location:../../ingresar.php');
$_SESSION['USUARIO'] = "";
 ?>  <meta http-equiv="refresh" content="0;url=../../ingresar.php"> <?php
?>