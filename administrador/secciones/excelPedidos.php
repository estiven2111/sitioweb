<?php
include("../config/db.php");
header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename= PEDIDOS ".date('y-m-d').".xls");


?>

<table class="table table-bordered" style="vertical-align: middle;text-align: center;">
    <?php
    $sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
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

        </tr >
    </thead>
    <tbody style="vertical-align: middle;text-align: center;">
        <?php
        $sentenciaSQL = $conexion->prepare("SELECT * FROM pedidos ");
        $sentenciaSQL->execute();
        $listaProducto = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        
        $con = 0;
        while ((COUNT($listaProducto) - 1) >= $con) {
            $conp = 0;
            $co = 0;
            echo "<tr> ";
            if ($con <= (COUNT($nomarray) - 1)) {
                while ($conp <= (COUNT($listaProducto) - 1)) {
                    if ($co <= (COUNT($nomarray) - 1)) {
                ?>

                        <td style="vertical-align: middle;text-align: center;"> <?php echo $listaProducto[$conp][$nomarray[$co]]; ?></td>
                    <?php
                        $co++;
                    } else {
                    ?>
                        <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['total']; ?> </td>
                        <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['id']; ?> </td>
                        <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['Fecha_Pedido']; ?> </td>
                        <td style="vertical-align: middle;text-align: center;"><?php echo $listaProducto[$con]['usuario']; ?> </td>

                        
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