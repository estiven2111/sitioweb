<?php //session_start(); 
?>

<!DOCTYPE html>

<html>

<head>
  <title>FABRICADELFRITO</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel=" icon " type=" image/png " href="../../IMAGENES/pollo.ico">
  <meta name=" viewport " content=" width = device-width, user-scalable = no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0 ">
  <meta name=" keywords " content=" frituras, frito, cventa, empanada, pasteles, tortas, torta carne, hambre, comida ">
  <meta name=" description " content="empresa dedidcada ala venta de frituras de la mejor calidad">
  <meta name=" autor " content=" TecnoEAM">
  <meta name=" owner " content=" https://www.facebook.com/estiven.a.martinez ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/styles.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>

<body>
  <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/sitioWeb" ?>
  <div class="container" style="margin-bottom:50px">

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <!--****************************ELIMINAR SITIOWEB EN HREF PARA SERVIDOR***********************-->
        <a class="navbar-brand" href="<?php echo $url; ?>">FABRICA DEL FRITO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/secciones/usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/secciones/productos.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/secciones/pedidos.php">Pedidos</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/secciones/cerrar.php">Cerrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="<?php echo $url; ?>"> Ver sitio web </a>
            </li>
          </ul>

        </div>
      </div>
    </nav>

  </div>
  <div class="container">

    </br>
    </br>
    <div class="row">