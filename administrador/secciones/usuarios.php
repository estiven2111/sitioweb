<?php
//session_start();
include("../template/cabecera.php");
include("../config/verificar.php");

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtContrasenia = (isset($_POST['txtContrasenia'])) ? $_POST['txtContrasenia'] : "";
$txtRol_usuario = (isset($_POST['txtRol_usuario'])) ? $_POST['txtRol_usuario'] : "";
$txtSupervisor = (isset($_POST['txtSupervisor'])) ? $_POST['txtSupervisor'] : "";
$txtNegocio = (isset($_POST['txtNegocio'])) ? $_POST['txtNegocio'] : "";
$txtSector = (isset($_POST['txtSector'])) ? $_POST['txtSector'] : "";
$txtDir = (isset($_POST['txtDir'])) ? $_POST['txtDir'] : "";
$txtNumero = (isset($_POST['txtNumero'])) ? $_POST['txtNumero'] : "";


$txtLSA = (isset($_POST['txtLSA'])) ? $_POST['txtLSA'] : "";
$txtLSC = (isset($_POST['txtLSC'])) ? $_POST['txtLSC'] : "";
$txtDA = (isset($_POST['txtDA'])) ? $_POST['txtDA'] : "";
$txtDC = (isset($_POST['txtDC'])) ? $_POST['txtDC'] : "";
$txtFA = (isset($_POST['txtFA'])) ? $_POST['txtFA'] : "";
$txtFC = (isset($_POST['txtFC'])) ? $_POST['txtFC'] : "";
$txtTD = (isset($_POST['txtTD'])) ? $_POST['txtTD'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

/* $aper_lun_sab = $txtLSA."--".$txtLSC;
  $aper_Dom = $txtDA."--".$txtDC;
  $aper_Fes = $txtFA."--".$txtFC; */
//var_dump((int)$txtRol_usuario, $txtNombre, $txtContrasenia, $txtSupervisor, $txtNegocio, $txtNumero, $txtSector, $aper_lun_sab, $aper_Dom, $aper_Fes, $txtTD );

include("../config/db.php");



switch ($accion) {


    case "Agregar":

      
        $sentenciaSQL = $conexion->prepare("SELECT usuario FROM usuarios where usuario = '$txtNombre' ");
        $sentenciaSQL->execute();
        $usuarios = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        if ($usuarios['usuario']) {
            echo '<script> alert("EL NOMBRE DE USUARIO YA ESTA EN USO");</script>';
        }else{
            $aper_lun_sab = $txtLSA."--".$txtLSC;
            $aper_Dom = $txtDA."--".$txtDC;
            $aper_Fes = $txtFA."--".$txtFC;
  
            $sentenciaSQL = $conexion->prepare("INSERT INTO usuarios VALUES (null,".(int)$txtRol_usuario.", '$txtNombre', '$txtContrasenia', '$txtSupervisor', '$txtNegocio', '$txtNumero', '$txtSector','$txtDir' ,'$aper_lun_sab', '$aper_Dom', '$aper_Fes', '$txtTD' );");
            
            $sentenciaSQL->execute();
        }


       


        //header("Location:usuarios.php");
        break;


    case "Modificar":

        $sentenciaSQL = $conexion->prepare("UPDATE  usuario SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindparam(':nombre', $txtNombre);
        $sentenciaSQL->bindparam(':id', $txtID);
        $sentenciaSQL->execute();


        $sentenciaSQL = $conexion->prepare("UPDATE  usuario SET contraseña=:contraseña WHERE id=:id");
        $sentenciaSQL->bindparam(':contraseña', $txtContrasenia);
        $sentenciaSQL->bindparam(':id', $txtID);
        $sentenciaSQL->execute();


        //header("Location:usuarios.php");
        break;


    case "Cancelar":

        //header("Location:usuarios.php");
        break;

    case "Seleccionar":

        $sentenciaSQL = $conexion->prepare("SELECT * FROM usuario WHERE id=:id");
        $sentenciaSQL->bindparam(':id', $txtID);
        $sentenciaSQL->execute();
        $usuarios = $sentenciaSQL->fetch(PDO::FETCH_LAZY);


        $txtNombre = $usuarios['nombre'];
        $txtContrasenia = $usuarios['contraseña'];

        break;

    case "Borrar":


        
        $sentenciaSQL = $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
        $sentenciaSQL->bindparam(':id', $txtID);
        $sentenciaSQL->execute();

        //header("Location:usuarios.php");

        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listaUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>



<div class=" justify-content-center">
    <div class="" style="margin-bottom: 30px;">

        <div class="card-header">
            Registrar usuarios
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-lg-6 col-xs-12">

                        <div class="form-group">
                            <label>Rol Usuario :</label>
                            <select name="txtRol_usuario">
                                <option value="2">usuario</option>
                                <option value="1">administrador</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="txtNombre" required="required" placeholder="Escribe nombre usuario">

                        </div>


                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="text" class="form-control" name="txtContrasenia" required="required" placeholder="Escribe la contraseña">
                        </div>

                        <div class="form-group">
                            <label>Supervisor:</label>
                            <input type="text" class="form-control" name="txtSupervisor" placeholder="Escribe el nombre del supervisor">
                        </div>

                        <div class="form-group">
                            <label>negocio:</label>
                            <input type="text" class="form-control" name="txtNegocio" placeholder="Escribe el nombre del negocio">
                        </div>

                        <div class="form-group">
                            <label>Sector:</label>
                            <input type="text" class="form-control" name="txtSector" placeholder="Enque sector estas ubicado">
                        </div>

                        <div class="form-group">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="txtDir" placeholder="Direccion Del Negocio">
                        </div>

                        <div class="form-group">
                            <label>Numero Contacto:</label>
                            <input type="text" class="form-control" name="txtNumero" placeholder="Escribe un numero de contacto">
                        </div>

                    </div>

                    <div class="col-6 col-sm-6  col-md-6 col-lg-3 col-xs-3" style=" border:2px solid gray; text-align: center; padding-top: 30px;">

                        <fieldset>
                            <!-- HORARIOS DIAS LUNES A SABADO -->
                            <legend>Horario Lunes a Sabado</legend>
                            <div class="form-group" style=" justify-content: center">
                                <label>APERTURA :</label><br>
                                <select name="txtLSA" required="">
                                    <option value="No">No</option>
                                    <option value="05:00 AM">05:00 AM</option>
                                    <option value="06:00 AM">06:00 AM</option>
                                    <option value="07:00 AM">07:00 AM</option>
                                    <option value="08:00 AM">08:00 AM</option>
                                    <option value="09:00 AM">09:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 AM">12:00 AM</option>
                                </select>
                                <br>
                                <label>CIERRE :</label><br>
                                <select name="txtLSC">
                                    <option value="No">No</option>
                                    <option value="03:00 PM">03:00 PM</option>
                                    <option value="04:00 PM">04:00 PM</option>
                                    <option value="05:00 PM">05:00 PM</option>
                                    <option value="06:00 PM">06:00 PM</option>
                                    <option value="07:00 PM">07:00 PM</option>
                                    <option value="08:00 PM">08:00 PM</option>
                                    <option value="09:00 PM">09:00 PM</option>
                                    <option value="10:00 PM">10:00 PM</option>
                                </select>

                            </div>

                        </fieldset>

                        <fieldset>
                            <!-- HORARIOS DIAS DOMINGO -->
                            <legend>Horario Domingo</legend>
                            <div class="form-group">
                                <label>APERTURA :</label><br>
                                <select name="txtDA">
                                    <option value="No">No</option>
                                    <option value="05:00 AM">05:00 AM</option>
                                    <option value="06:00 AM">06:00 AM</option>
                                    <option value="07:00 AM">07:00 AM</option>
                                    <option value="08:00 AM">08:00 AM</option>
                                    <option value="09:00 AM">09:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 AM">12:00 AM</option>
                                </select>
                                <br>
                                <label>CIERRE :</label><br>
                                <select name="txtDC">
                                    <option value="No">No</option>
                                    <option value="03:00 PM">03:00 PM</option>
                                    <option value="04:00 PM">04:00 PM</option>
                                    <option value="05:00 PM">05:00 PM</option>
                                    <option value="06:00 PM">06:00 PM</option>
                                    <option value="07:00 PM">07:00 PM</option>
                                    <option value="08:00 PM">08:00 PM</option>
                                    <option value="09:00 PM">09:00 PM</option>
                                    <option value="10:00 PM">10:00 PM</option>
                                </select>

                            </div>
                    </div>
                    <div class="col-6 col-sm-6  col-md-6 col-lg-3 col-xs-3 " style=" border:2px solid gray; text-align: center; padding-top: 30px;">
                        </fieldset>

                        <fieldset>
                            <!-- HORARIOS DIAS FESTIVOS -->
                            <legend>Horario Festivos</legend>
                            <div class="form-group">
                                <label>APERTURA :</label><br>
                                <select name="txtFA">
                                    <option value="No">No</option>
                                    <option value="05:00 AM">05:00 AM</option>
                                    <option value="06:00 AM">06:00 AM</option>
                                    <option value="07:00 AM">07:00 AM</option>
                                    <option value="08:00 AM">08:00 AM</option>
                                    <option value="09:00 AM">09:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 AM">12:00 AM</option>
                                </select>
                                <br>
                                <label>CIERRE :</label><br>
                                <select name="txtFC">
                                    <option value="No">No</option>
                                    <option value="03:00 PM">03:00 PM</option>
                                    <option value="04:00 PM">04:00 PM</option>
                                    <option value="05:00 PM">05:00 PM</option>
                                    <option value="06:00 PM">06:00 PM</option>
                                    <option value="07:00 PM">07:00 PM</option>
                                    <option value="08:00 PM">08:00 PM</option>
                                    <option value="09:00 PM">09:00 PM</option>
                                    <option value="10:00 PM">10:00 PM</option>
                                </select>

                            </div>

                        </fieldset>

                        <fieldset>
                            <!-- TODOS LOS DIAS -->
                            <legend>Todos Los Dias</legend>
                            <div class="form-group">
                                <label>24 Horas</label><br>
                                <select name="txtTD">
                                    <option value="No">No</option>
                                    <option value="SI">SI</option>
                                </select>


                            </div>


                        </fieldset>

                    </div>


                    <div style="margin: 50px; text-align: center; ">
                        <button type="submit" name="accion" value="Agregar" class="btn btn-primary" style="width: 200px; text-align: center;">Registrar</button>
                    </div>

                </div>

            </form>





        </div>

    </div>

    <div class="col-12">
        <div class="table-responsive table-responsive-sm">
            <table id="example" class="table table-bordered " style="vertical-align: middle;text-align: center;">
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($listaUsuarios as $usuarios) { ?>
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



                            <td>
                                <form method="post">

                                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $usuarios['id']; ?>" />
                                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                                    <input onclick="return confirm('ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?')"  
                                    type="submit" name="accion" value="Borrar" class="btn btn-danger" />


                                </form>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>

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
