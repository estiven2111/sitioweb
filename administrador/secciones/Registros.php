<?php
//session_start();

include("../config/verificar.php");
include("../template/cabecera.php");
include("./productosback.php");
?>

<div class="row" style="margin-bottom: 50px;">


    <div class="col-md-12">

        <div class="card">
            <div class="card-header" style="text-align: center;">
                VENTAS DIARIAS
            </div>

            <div class="card-body">
                <div class="table-responsive table-responsive-sm">
                    <table id="example" class="table table-bordered ">
                        <thead>
                            <tr style="vertical-align: middle;text-align: center;">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>TOTAL DIARIO</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sentenciaSQL = $conexion->prepare("SELECT * FROM registro");
                            $sentenciaSQL->execute();
                            $totalDiario = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($totalDiario as $totalDiario) { ?>
                                <tr style="vertical-align: middle;text-align: center;">
                                    <td><?php echo $totalDiario['id']; ?></td>
                                    <td><?php echo $totalDiario['fecha']; ?></td>
                                    <td><?php echo $totalDiario['Diario']; ?></td>


                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>


</div>

<div class="row">
    <div class="col-12" style="text-align: center;">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                VERIFICAR VENTAS EN RANGO DE FECHAS
            </div>

            <div class="card-body">

                <form method="POST">
                    <div class="row" style="text-align: center;">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <label>DESDE FECHA INICIO</label>
                            <input type="date" name="inicio" id="start" style="margin: 20px;">
                        </div>
                        <div class="col-4">
                            <label>HASTA FECHA FIN</label>
                            <input type="date" name="fin" id="end" style="margin: 20px;">
                        </div>
                        <div class="col-2"></div>
                    </div>


                    <br><br>
                    <input type="submit" name="accion" value="Consultar" class="btn btn-primary" />
                </form>

                <?php
                if (isset($_POST['accion'])) {


                    $feInicio = (isset($_POST['inicio'])) ? $_POST['inicio'] : "";
                    $feFin = (isset($_POST['fin'])) ? $_POST['fin'] : "";

                    $sentenciaSQL = $conexion->prepare("SELECT SUM(total) as Diario from pedidos where Fecha_Pedido BETWEEN '$feInicio' AND '$feFin' ");
                    $sentenciaSQL->execute();
                    $total_rango = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

                ?>
                    <div class="table-responsive table-responsive-sm">
                        <table id="example" class="table table-bordered ">
                            <thead>
                                <tr style="vertical-align: middle;text-align: center;">
                                    <th>TOTAL ENTRE FECHA <?php echo $_POST['inicio'] . " Y LA FECHA " . $_POST['fin']; ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                foreach ($total_rango as $total_rango) { ?>
                                    <tr style="vertical-align: middle;text-align: center;">
                                        <td style="font-size: 50px;"><?php echo "Se Realizaron Ventas Por Un Valor Total De <b>$" . $total_rango['Diario'] . "</b>"; ?></td>


                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                <?php
                } ?>

            </div>
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