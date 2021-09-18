<?php
session_start();
//session_destroy();
$_SESSION['USUARIO'] = "";
$_SESSION['alerta'] = "";
include("template/cabecera.php"); ?>
<div class="jumbotron">
    <h1 class="display-3">La fabrica del frito</h1>
    <p class="lead"></p>
    <hr class="my-2">
</br>
</div>


<div class="container">
    <div class="row">
        <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12" style="text-align:justify;">
            <p>Somos una empresa con una gran trayectoria, dedicados a distribuir productos como Empanadas, Pasteles, Palitos de queso y mas;
                con una gran variedad de sabores que nos identifican con sabores unicos e inigualables, distrubuyendo en gran parte de la ciudad de Medellín
                productos fritos y pre fritos, dando opciones a nuestros clientes de adquirir nuestros productos.
                Si deseas disfrutar de nuestros sabores puedes encontrarnos en el barrio Boston, cerca al tran via.
                Si deseas comprar al por mayor comunicate con nosotros, esteremos encantados de llevarte nuestros productos a la puerte de tu negocio.
            </p>
        </div>
        <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12" >
        <div style="height: 300px; width: 100%;">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="IMAGENES/pedidos.jpg" class="d-block" alt="..." style="height: 300px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="IMAGENES/fabrica.jpg" class="d-block" alt="..." style="height: 300px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="IMAGENES/carta.jpg" class="d-block" alt="..." style="height: 300px; width: 100%;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
</div>

        </div>
        </br></br> </br></br>
    </div>
    
</div>



            <?php include("template/pie.php"); ?>