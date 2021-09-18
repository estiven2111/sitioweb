<?php 
session_start();
//session_destroy();
$_SESSION['USUARIO']="";
include("./template/cabecera.php"); ?>



    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"  style="width: 80%; margin:auto;" >
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Img_Fabrica/PPAL.jpg" class="d-block" alt="..." style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/empanadas_3_tipos.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/empanada_arroz_carne.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/empanadas_paisa.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/empanadas_papa_carne.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/pastel_solo_pollo.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/croqueta_pollo-torta_carne.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/palito_queso-panzerotti.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/PRE_pastel_solo_pollo-palito_queso.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
            <div class="carousel-item">
                <img src="Img_Fabrica/PRE_panzerotti-empanada.jpg" class="d-block" alt="..."style="height: 900px; width: 100%;">
            </div>
        </div>
        <button  class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button style="color: black;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



<div class="about">
    <div class="container" >
        <div class="row">
            <div class="col-12" style="margin-top:30px;">
                <div class="title" style="  width:100%;">
                    <i><img src="img/logo.jpg" alt="#"style="height: 100px; width: 100%;" /></i>
                    <h2>Somos fabricantes.</h2>
                    <span>Somos mayoristas, distribuidores del gran sabor en Medellin.
                        <br> Visitanos en el centro de la ciudad, y disfruta de nuestros productos.
                    </span>
                </div>
            </div>
        </div>

        </br></br></br>

        <div class="row d-flex justify-content-center m-5">
            <div class="col-12">
                <div class="" style="display: flex; flex-direction: column; align-items: center;">
                    <h3>Tradición</h3>
                    <p>Mas de 70 puntos en la Ciudad de Medellin compran nuestros productos,
                     Somos fabricantes<br> de todo tipo de pasteles, gran variedad de sabores,
                      palitos de queso y más, Si quieres<br> conocer mas de nosoros, dale click al siguiente Boton. </p>
                    <a class="btn btn-primary btn-lgbtn btn" href="./contacto.php">Contactanos <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>


        </div>
    </div>
</div>

<?php include("template/pie.php"); ?>