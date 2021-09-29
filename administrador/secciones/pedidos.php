<?php
//session_start();
include("../config/verificar.php");
include("../template/cabecera.php");
?>
<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtfecha = (isset($_POST['txtIva'])) ? $_POST['txtIva'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "vacio";
$factura = "";
?>



<div class="col-md-12">
    <div class="table-responsive table-responsive-sm">
        <table id="example" class="table table-bordered " style="vertical-align: middle;text-align: center;">
            <?php
            $sentenciaSQL = $conexion->prepare("SELECT * FROM productos ORDER BY id ASC");
            $sentenciaSQL->execute();
            $listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <?php
                    $pru = "";
                    $nomarray = array();
                    $cont = 0;
                    foreach ($listaProductos as $Productos) {

                        $nomp = str_replace(' ', '_', $Productos);
                        $nomarray[$cont++] = $nomp['nombre'];
                    ?>
                        <th style=" width: 50px;  vertical-align: middle;text-align: center;"><?php echo $Productos['nombre'] ?> </th>
                    <?php } ?>
                    <th>PRECIO</th>
                    <th>FACTURA</th>
                    <th>FECHA PEDIDO</th>
                    <th>USUARIO</th>
                    <th>ACCIONES</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //*****************************************************
                $sentenciaSQL = $conexion->prepare("SELECT * FROM pedidos ");
                $sentenciaSQL->execute();
                $listaProducto = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                switch ($accion) {
                    case "Buscar":
                        if ($txtID != "" || $txtNombre != "" || $txtfecha != "") {
                            $sentenciaSQL = $conexion->prepare("SELECT * FROM pedidos WHERE usuario ='" . $txtNombre . "'or Fecha_Pedido='" . $txtfecha . "' or id = '" . $txtID . "';");
                            $sentenciaSQL->execute();
                            $listaProducto = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        }

                        break;
                    case "Seleccionar":

                        $sentenciaSQL = $conexion->prepare("SELECT * FROM pedidos WHERE id=:id");
                        $sentenciaSQL->bindparam(':id', $txtID);
                        $sentenciaSQL->execute();
                        $productossel = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
                        $factura = $productossel['Factura'];
                        $txtNombre = $productossel['usuario'];

                        $txtfecha = $productossel['Fecha_Pedido'];
                        break;
                    case "borrar":
                        $sentenciaSQL = $conexion->prepare("SELECT * FROM pedidos WHERE id=:id");
                        $sentenciaSQL->bindparam(':id', $txtID);
                        $sentenciaSQL->execute();
                        $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
                         var_dump($productos['Fecha_Pedido']);


                        $sentenciaSQL = $conexion->prepare("DELETE FROM pedidos WHERE id=:id");
                        $sentenciaSQL->bindparam(':id', $txtID);
                        $sentenciaSQL->execute();
                        $productos2 = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
                         

                        /** -----------------SUMAR PEDIDOS DIARIOS-----------------------------  */



                        $sentenciaSQL = $conexion->prepare("SELECT * FROM registro where fecha = '" . $productos['Fecha_Pedido'] . "';");
                        $sentenciaSQL->execute();
                        $total_diario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

                        $sentenciaSQL = $conexion->prepare("SELECT SUM(total) as Diario from pedidos where Fecha_Pedido = '" . $productos['Fecha_Pedido'] . "';");
                        $sentenciaSQL->execute();
                        $total_diario1 = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        $fecha = $productos['Fecha_Pedido'];
                        $diario = $total_diario1[0]['Diario'];

                        if ($total_diario == false) {
                            $sentenciaSQL = $conexion->prepare("INSERT INTO registro VALUES (NULL, '$fecha', '$diario', '', ''); ");
                            $sentenciaSQL->execute();
                        } else {
                            $sentenciaSQL = $conexion->prepare("UPDATE registro SET Diario = '" . $diario . "' WHERE fecha = '" . $productos['Fecha_Pedido'] . "';");
                            $sentenciaSQL->execute();
                        }
                ?>
                        <meta http-equiv="refresh" content="0;url=./pedidos.php">
                        <?php
                        break;


                    default:
                        break;
                }

                $con = 0;
                while ((COUNT($listaProducto) - 1) >= $con) {
                    $conp = 0;
                    $co = 0;
                    echo "<tr> ";
                    if ($con <= (COUNT($nomarray) - 1)) {
                        while ($conp <= (COUNT($listaProducto) - 1)) {
                            if ($co <= (COUNT($nomarray) - 1)) {
                        ?>

                                <td> <?php echo $listaProducto[$conp][$nomarray[$co]]; ?></td>
                            <?php
                                $co++;
                            } else {
                            ?>
                                <td><?php echo $listaProducto[$con]['total']; ?> </td>
                                <td><?php echo $listaProducto[$con]['id']; ?> </td>
                                <td><?php echo $listaProducto[$con]['Fecha_Pedido']; ?> </td>
                                <td><?php echo $listaProducto[$con]['usuario']; ?> </td>

                                <td>
                                    <form method="post">
                                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $listaProducto[$con]['id']; ?>" />
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                                        <input onclick="return confirm('ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?')" type="submit" name="accion" value="borrar" id="enviartt" class="btn btn-danger" />
                                </td>
                                </form>
                <?php
                                $co = 0;
                                $conp++;
                                $con++;
                                echo "</tr> ";
                            }
                        }
                    }
                }
                ?>

            </tbody>
        </table>
    </div>


</div>

<div class="col-md-12" style="text-align: center;">

    <div class="card">
        <div class="card-header">
            Datos de los productos
        </div>

        <div class="card-body">

            <?php

            if ($accion == 'Seleccionar') {
                $_SESSION['factura'] =  $factura;
                echo nl2br($factura);
                echo isset($_SESSION['factura']) ? "<br><br><a  class = 'btn btn-primary' href= '../../PDF/reporte.php?usu=1' target='blank' > DESCARGAR </a>" : "";
            }

            ?>
        </div>

        <a href="<?php echo $url; ?>/administrador/secciones/excelPedidos.php" target="blank" class="btn btn-primary btn-lg letra"> Descargar excel</a>

    </div>

</div>
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>

<script type="text/javascript" src="main.js"></script>

<?php include("../template/pie.php"); ?>