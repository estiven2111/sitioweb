<?php


include("../config/db.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios ORDER BY id ASC");
$sentenciaSQL->execute();
$listaUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= USUARIOS ".date('y-m-d').".xls");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


</head>

<body>
    <table class="table table-bordered" style="vertical-align: middle;text-align: center;">
        <thead>
            <tr style="vertical-align: middle;text-align: center;">
                <th>ID</th>
                <th>ROL</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Supervisor</th>
                <th>Negocio</th>
                <th>Sector</th>
                <th>Direccion</th>
                <th>Numero</th>
                <th>Horario Lun-Sab</th>
                <th>Horario Domingo</th>
                <th>Horario Festivo</th>
                <th>24 Horas</th>

            </tr>
        </thead>
        <tbody>


            <?php


            foreach ($listaUsuarios as $usuarios) { ?>
                <tr style="vertical-align: middle;text-align: center;">
                    <td><?php echo $usuarios['id']; ?></td>
                    <td><?php echo $usuarios['rol_usuario']; ?></td>
                    <td><?php echo $usuarios['usuario']; ?></td>
                    <td><?php echo $usuarios['contrasena']; ?></td>
                    <td><?php echo $usuarios['nom_supervisor']; ?></td>
                    <td><?php echo $usuarios['nom_negocio']; ?></td>
                    <td><?php echo $usuarios['sector']; ?></td>
                    <td><?php echo $usuarios['Direccion']; ?></td>
                    <td><?php echo $usuarios['num_contacto']; ?></td>

                    <td><?php echo $usuarios['hora_aper_lun_sab']; ?></td>
                    <td><?php echo $usuarios['hora_aper_domingo']; ?></td>
                    <td><?php echo $usuarios['hora_aper_festivos']; ?></td>
                    <td><?php echo $usuarios['apertura_24H']; ?></td>

                </tr>

            <?php } ?>

        </tbody>
    </table>
    <meta http-equiv="refresh" content="0;url=./usuarios.php">
</body>

</html>