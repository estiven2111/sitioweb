<?php
session_start();
$_SESSION['USUARIO'] = "";
$_SESSION['alerta'] = "";
//$_SESSION['mail'] = "";
include("template/cabecera.php"); 
?>

<div class="">
    <h1 class="display-3">Contactanos</h1>
    <p class="lead"></p>
    <hr class="my-2">
    </br>
</div>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-10 col-sm-12">
                <div class="">
                    <a class="logo" href="index.html"><img src="IMAGENES/fabrica.jpg" alt="#" /></a>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="">
                    <div class="right_header_info letra" style="text-align:center;">
                        <ul>

                            <li class="dinone"><img style="margin-right: 15px;height: 80px;position: relative;top: 5px;" src="img/icono1.jpg" alt=""><a href="#"></br>lafabricadelfrito@gmail.com</a></li> </br>
                            <li class="dinone"><img style="margin-right: 15px;height: 80px;position: relative;top: 5px;" src="img/icono3.jpg" alt="">
                                <a href="https://www.google.com/maps/place/La+Fabrica+Del+Frito/@6.2439373,-75.5637075,16z/data=!4m5!3m4!1s0x8e4429dba2c6eb4f:0x907cf337ef7fd17d!8m2!3d6.2444146!4d-75.5595152?hl=es-CO">
                                </br>Medellin, Colombia</a>
                            </li> </br>
                            <li class="dinone"><img style="margin-right: 15px;height: 80px;position: relative;top: 5px;" src="IMAGENES/whatsapp.png" alt=""><a href="https://wa.link/aul37g"></br> Whatsapp</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="footer">
    <div class="container-fluid">
        <div style="display:flex; justify-content:center" class="row">
            <div class=" col-md-12">
                <h2 class="sena">Escribenos<strong class="white"> </strong></h2>
            </div>



            <div style="display:flex; justify-content:center; width:100%" class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                <form class="main_form" style=" padding: 20px;" action="correo.php" method="POST">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for=""></label>
                            <input class="form-control" placeholder="Nombre" type="text" name="Nombre">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for=""></label>
                            <input class="form-control" placeholder="Email" type="text" name="Email">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for=""></label>
                            <input class="form-control" placeholder="Telefono" type="text" name="Telefono">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for=""></label>
                            <textarea class="textarea form-control" placeholder="Mensaje" type="text" name="Mensaje"></textarea>
                        </div>
                        <div style="display:flex; justify-content:center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            <button style="margin:25px 0" class="btn btn-primary btn-lg">Enviar</button>
                        </div>
                    </div>
                </form>
                </br></br></br>
            
            </div>
            <div style="text-align: center; margin-bottom:30px;" class="letra">
                <?php 
                echo ((isset($_GET['env'])=="ok"))?"MENSAJE ENVIADO CON EXITO A LA FABRICA DEL FRITO NOS PONDREMOS EN CONTACTO": "";  
              
                ?>
           </div>

            <?php
            
            include("template/pie.php"); ?>