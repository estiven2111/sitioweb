<?php 
session_start();
include('./template/cabecera.php'); 
include './config/verificar.php';
//ini_set('session.save_path', $_SERVER['USUARIO'] . '/sesiones');

?>

          <div class="col-md-12">
              
    <div class="jumbotron">
        <h1 class="display-3">Bienvenido Administrador</h1>
        <p class="lead">En esta sección podrás administrar la pagina, tus , pedidos y tus usuarios </p>
        <hr class="my-2">
        <p>Mas información</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="secciones/productos.php" role="button">Productos</a>
            <a class="btn btn-primary btn-lg" href="./secciones/pedidos.php" role="button">Pedidos</a>
            <a class="btn btn-primary btn-lg" href="./secciones/img.php" role="button">Imagenes</a>
        </p>
       </div>

    </div>

    <?php include('./template/pie.php'); ?>
      
