<?php

include("../administrador/config/verificar.php");
include("template/cabecera.php");
//include ('./correo.php');

?>



<div class="jumbotron" style="text-align: center;   border: 1px solid #156785; ">
    <h1 class="display-3">PLATAFORMA DE PEDIDOS</h1>
    <p class="lead"></p>
    <hr class="my-2">
    <?php
    //include("../administrador/config/verificar.php");
    include("../administrador/config/db.php");
    //include("./pedidosCod.php");

    ?>
    <div class="row">
        <div class="col-sm-5">

            <div class="card" style="width: 100%;">
                <img src="../IMAGENES/pedidos.jpg" class="card-img-top" style="height: 400px;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">POR FAVOR REALIZA TU PEDIDO</p>
                </div>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="table-responsive position-relative" style=" justify-content: center">
                <table class="table table-bordered" style="width: auto;">
                    <thead>
                        <tr style="vertical-align: middle;text-align: center;">
                            <th>PRODUCTO</th>
                            <th>VALOR UNITARIO</th>
                            <th>CANTIDAD</th>

                        </tr>
                    </thead>
                    <tbody>

                        <form action="pedidoscod.php" method="POST" enctype="multipart/form-data">
                            <?php
                            $sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
                            $sentenciaSQL->execute();
                            $listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                            if (!empty($listaProductos)) :
                                foreach ($listaProductos as $Productos) : ?>
                                    <div class="form-group">
                                        <tr style="vertical-align: middle;text-align: center;">
                                            <?php
                                            $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE nombre = '" . $Productos['nombre'] . "';");
                                            $sentenciaSQL->execute();
                                            $pre_prod = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                                            $nom = str_replace(' ', '_', $Productos['nombre']);
                                            ?>
                                            <td><?php echo $Productos['nombre']; ?></td>
                                            <td><?php echo  $pre_prod[0]['precio'];; ?></td>
                                            <td><input style="vertical-align: middle;text-align: center;" type="text" required="" autofocus='autofocus' class="form-control" name="<?php echo $nom ?>" id="txtID" placeholder="Llene la cantidad" pattern='[0-9]+' />
                                                <p style="color: red; font-size: 12px;"> <?php echo !empty($_SESSION['alerta'][$nom]) ?  $_SESSION['alerta'][$nom] : ""; ?></p>
                                            </td>
                                        </tr>
                                    </div>
                            <?php endforeach;
                            endif;

                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <input type="submit" onclick="mostrar" name="ENVIAR" value="ENVIAR" class="btn btn-primary" />
    </form>
    <div style="text-align: center; border: 5px solid black; width: 50%; margin: 30px auto 30px auto; background: gray;">
        <p ><?php echo isset($_SESSION['factura']) ? nl2br($_SESSION['factura']) : "";?></p> 
         <?php
        echo isset($_SESSION['factura']) ? "<br><br><a  class = 'btn btn-primary' href= '../PDF/reporte.php?usu=2' > DESCARGAR </a>" : "";
        echo isset($_SESSION['mail']) ? "<br><br>" . $_SESSION['mail'] : "";

        //echo "<br><br>".$_SESSION['mail'];


        ?>

    </div>
</div>
</div>


<?php

include("template/pie.php");
?>