<?php
if (!empty($_POST)) {
  session_start();



  include("../administrador/config/db.php");
  $sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
  $sentenciaSQL->execute();
  $listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  $alerta = array();
  foreach ($listaProductos as $Productos) {

    $nomp2 = str_replace(' ', '_', $Productos);

    if ((int)$_POST[$nomp2['nombre']] != 0) {
      $alerta[$nomp2['nombre']] = "";
    } else {
      $alerta[$nomp2['nombre']] = "este producto no entrara en su pedido";
    }
    $_SESSION['alerta'] = $alerta;
  }

  enviodatos();
}

function enviodatos()
{



  include("../administrador/config/db.php");
  $sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
  $sentenciaSQL->execute();
  $listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

  $alerta = array();
  $num_prod = count($listaProductos);
  $con = 0;


  $cadena = "";
  $totalprod = 0;
  $totalprecio = 0;
  $cadenacant = "";
  foreach ($listaProductos as $Productos) {
    $nomp = str_replace(' ', '_', $Productos);


    if (!empty($_POST[$nomp['nombre']]) || $_POST[$nomp['nombre']] == 0) {
      /**verifico datos de los input */


      /**creo una cadena datos nombre con los datos de la tabla productos para hacer el insert */
      $con++;
      if ($con != ($num_prod)) {
        $cadena = $cadena . $nomp['nombre'] . ",";
      } else {
        $cadena = $cadena . $nomp['nombre'];
      }

      if ($con != ($num_prod)) {
        $cadenacant = $cadenacant . $_POST[$nomp['nombre']] . ",";
      } else {
        $cadenacant = $cadenacant . $_POST[$nomp['nombre']];
      }

      /**creo una cadena datos input con los datos de la tabla productos para hacer el insert */
      $totalprod = ($totalprod + $_POST[$nomp['nombre']]);
      /**tomo los datos de los input para sumar la cantidad de productos del pedido*/
      if ((int)$_POST[$nomp['nombre']] != 0) {
        /**realizo la suma y multiplicacion del precio total */
        $totalprecio = $totalprecio + ((float)$Productos['precio'] * $_POST[$nomp['nombre']]);
      }
    }
  }

  $ususario = $_SESSION['USUARIO'];


  if (!empty($_POST)) {

    $sentenciaSQL = $conexion->prepare("INSERT INTO pedidos VALUES (NULL,'$ususario',CURRENT_DATE, $totalprod, $totalprecio,'', $cadenacant);");
    $sentenciaSQL->execute();

    $sentenciaSQL = $conexion->prepare("SELECT * FROM pedidos;");
    $sentenciaSQL->execute();
    $num_fac = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    $tfact = COUNT($num_fac) - 1;

    if (empty($num_fac[0]['id'])) {
      $num_fac[0]['id'] = "0";
    }
    $factura = "****** FACTURA NUMERO  " . $num_fac[$tfact]['id'] . " ****** <br> <br>" . "Fecha Pedido  " . date("d") . "/" . date("m") . "/" . date("y") . "<br> USUARIO  " . $_SESSION['USUARIO'] . "<br><br><br>";
    //$factura = "****** FACTURA NUMERO  " . $num_fac[$tfact]['id'] . " ****** \n\r" . "Fecha Pedido  " . date("d") . "/" . date("m") . "/" . date("y") . "<br> USUARIO  " . $_SESSION['USUARIO'] . "\n\r";
    foreach ($listaProductos as $imprimir) {
      $nomp1 = str_replace(' ', '_', $imprimir);
      if ((int)$_POST[$nomp1['nombre']] != 0) {
        $factura = $factura . "" . $imprimir['nombre'] . " = " . $_POST[$nomp1['nombre']] . "<br>";
         //$factura = $factura . "" . $imprimir['nombre'] . " = " . $_POST[$nomp1['nombre']] . "\n\r";
      }
    }

    // echo "nombre $cadena <br>";
    // echo "cantidad $cadenacant <br>";
    // echo "total productos $totalprod <br>";
    $factura = $factura . "totla precio = $totalprecio <br><br><br>";
    //$factura = $factura . "totla precio = $totalprecio \n\r";
    // echo "nombre usu ".$_SESSION['USUARIO'];

    $_SESSION['factura'] = $factura;
    $txtfact = (int)$num_fac[$tfact]['id'];

    $sentenciaSQL = $conexion->prepare("UPDATE pedidos SET factura = '$factura' where id = $txtfact ;");
    $sentenciaSQL->execute();

?>
    <meta http-equiv="refresh" content="0;url=./pedidos.php">
<?php

  }
}



?>