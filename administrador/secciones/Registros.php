<?php
//session_start();
include("../config/verificar.php");
include("../template/cabecera.php");
include("./productosback.php");
?>
<div class="col-md-4"></div>

<div class="col-md-5">

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

<div class="col-md-3"></div>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>

<script type="text/javascript" src="main.js"></script>

<?php include("../template/pie.php"); ?>

}