<?php 
//session_start();
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
        <p class="lead" >
            <a style="margin: 10px 10px 0px 0px;" class="btn btn-primary btn-lg" href="secciones/productos.php" role="button">PRODUCTOS</a>
            <a style="margin: 10px 10px 0px 0px;" class="btn btn-primary btn-lg" href="./secciones/pedidos.php" role="button">PEDIDOS</a>
            <a style="margin: 10px 10px 0px 0px;" class="btn btn-primary btn-lg" href="./secciones/usuarios.php" role="button">USUARIOS</a>
            <a style="margin: 10px 10px 0px 0px;" class="btn btn-primary btn-lg" href="./secciones/Registros.php" role="button">REGISTROS</a>
        </p>
       </div>

    </div>

    <?php include('./template/pie.php'); ?>
      
