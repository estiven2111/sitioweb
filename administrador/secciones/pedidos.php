<?php
session_start();
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
        <table id="example" class="table table-bordered ">
            <?php
            $sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
            $sentenciaSQL->execute();
            $listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <thead>
                <tr>
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
                    <th style=" width: 80px; vertical-align: middle;text-align: center;">PRECIO</th>
                    <th style=" width: 80px; vertical-align: middle;text-align: center;">FACTURA</th>
                    <th style=" width: 100px; vertical-align: middle;text-align: center;">FECHA PEDIDO</th>
                    <th style=" width: 50px; vertical-align: middle;text-align: center;">USUARIO</th>
                    <th style=" width: 150px; vertical-align: middle;text-align: center;">ACCIONES</th>

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

                        $sentenciaSQL = $conexion->prepare("DELETE FROM pedidos WHERE id=:id");
                        $sentenciaSQL->bindparam(':id', $txtID);
                        $sentenciaSQL->execute();
                        $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
                ?>
                        <meta http-equiv="refresh" content="0;url=./consulta.php">
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
                                <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['total']; ?> </td>
                                <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['id']; ?> </td>
                                <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['Fecha_Pedido']; ?> </td>
                                <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['usuario']; ?> </td>

                                <td>
                                    <form method="post">
                                        <input type="hidden" style="vertical-align: middle;text-align: center;" name="txtID" id="txtID" value="<?php echo $listaProducto[$con]['id']; ?>" />
                                        <input type="submit" style="vertical-align: middle;text-align: center;" name="accion" value="Seleccionar" class="btn btn-primary" />
                                        <input onclick="return confirm('ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?')" 
                                        type="submit" style="vertical-align: middle;text-align: center;" name="accion" value="borrar" id="enviar" class="btn btn-danger" />
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
            echo $factura;
            ?>
        </div>

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