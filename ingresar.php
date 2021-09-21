<?php include("template/cabecera.php"); ?>


<?php
session_start();
$_SESSION['USUARIO'] = "";
$_SESSION['alerta'] = "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";
$txtContrasenia = (isset($_POST['txtContrasenia'])) ? $_POST['txtContrasenia'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

echo nl2br("sun \n \n moon \n  \nsun \n moon");
include("administrador/config/db.php");


switch ($accion) {

    case "ingresar":

        $sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = '" . $txtCorreo . "' and contrasena= '" . $txtContrasenia . "';");
        $sentenciaSQL->execute();
        $usuario = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



        if (count($usuario) > 0) {



            if ($usuario[0]['rol_usuario'] == 1) { ?>

                <meta http-equiv="refresh" content="0;url=administrador/inicio.php">
            <?php $_SESSION['USUARIO'] = $txtCorreo;
            } else {  ?>
                <meta http-equiv="refresh" content="0;url=Cliente/pedidos.php">
<?php
                $_SESSION['USUARIO'] = $txtCorreo;
            }
        }
        break;
}

?>

<div class="login">

    <div class=" justify-content-center m-3">
        <div class="col-md-12 card">
            <div class="card-header">
                Ingresar

            </div>
            <div class="card-body m-3">
                <form method="POST">

                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="txtCorreo" placeholder="Escribe tu usuario">

                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" class="form-control" name="txtContrasenia" placeholder="Escribe tu contraseña">
                    </div>
                    <div class="d-flex justify-content-center m-3">
                        <button type="submit" name="accion" value="ingresar" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
                

            </div>

        </div>

    </div>

</div>