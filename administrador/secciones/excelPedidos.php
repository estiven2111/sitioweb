<?php

header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename= pedidos.xls");


?>

<table id="example" class="table table-bordered " style="vertical-align: middle;text-align: center;">
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

                $sentenciaSQL = $conexion->prepare("DELETE FROM pedidos WHERE id=:id");
                $sentenciaSQL->bindparam(':id', $txtID);
                $sentenciaSQL->execute();
                $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
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