<?php 
session_start();
$_SESSION['USUARIO'] = "";
$_SESSION['alerta'] = "";
include("template/cabecera.php"); ?>

<div class="yellow_bg">
    <div class="container center">
        <div class="row">
            <div class="">
                <div class="title">

                    <h1>Nuestros Productos</h1>


                </div>


            </div>


        </div>

    </div>
</br>
</br>
</div>






<?php
include("administrador/config/db.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($listaProductos as $producto)   {  ?>
    <?php if($producto['imagen'] != "imagen.jpg") :?>
    <div class="col-lg-3 col-xs-8 col-sm-6">
        <div class="card">
          
            <img class="card-img-top" src="./img/<?php  echo $producto['imagen']; ?>" alt="" style="height:300px">
           
            <div class="card-body">
                <h4 style="color: black;" class="card-title"><?php echo $producto['nombre']; ?></h4>

            </div>


        </div>
</br>
</br>
    </div>
    <?php endif?>
<?php } ?>


<fooetr style="text-align:center;">

<div class="row">
    <div class="col-12">
        <div class="img-box">
           <img src="IMAGENES/fabrica.jpg" alt="" style="height:500px; width:70% " />
        </div>
    </div>

    
        <div class="col-12">
            <div class="footer_logo">
                <a href="index.html"><img src="" alt="" /></a>
            </div>
            </br>
        </div>

        <div class=" col-12">
                    <a class="btn btn-primary btn-lg" href="<?php echo $url; ?>/contacto.php">Contactos</a>
             
        </div>

    </div>
</fooetr>






    <?php include("template/pie.php"); ?>