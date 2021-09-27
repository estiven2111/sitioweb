<?php

header("Content-Type:application/xls");
header(" Content-Disposition: attachment; filename= excelusuarios.xls");


?>

<table id="example" class="table table-bordered " >
                <thead>
                    <tr style="vertical-align: middle;text-align: center;">
                        <th >ID</th>
                        <th >ROL</th>
                        <th >Usuario</th>
                        <th >Contraseña</th>
                        <th >Supervisor</th>
                        <th >Negocio</th>
                        <th >Sector</th>
                        <th >Numero</th>
                        <th >Horario Lun-Sab</th>
                        <th >Horario Domingo</th>
                        <th >Horario Festivo</th>
                        <th >24 Horas</th>
                        <th >Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($listaUsuarios as $usuarios) { ?>
                        <tr style="vertical-align: middle;text-align: center;">
                        <td ><?php echo $usuarios['id']; ?></td>
                            <td ><?php echo $usuarios['rol_usuario']; ?></td>
                            <td ><?php echo $usuarios['usuario']; ?></td>
                            <td ><?php echo $usuarios['contrasena']; ?></td>
                            <td ><?php echo $usuarios['nom_supervisor']; ?></td>
                            <td ><?php echo $usuarios['nom_negocio']; ?></td>
                            <td ><?php echo $usuarios['sector']; ?></td>
                            <td ><?php echo $usuarios['num_contacto']; ?></td>

                            <td ><?php echo $usuarios['hora_aper_lun_sab']; ?></td>
                            <td ><?php echo $usuarios['hora_aper_domingo']; ?></td>
                            <td ><?php echo $usuarios['hora_aper_festivos']; ?></td>
                            <td ><?php echo $usuarios['apertura_24H']; ?></td>



                            <td>
                                <form method="post">

                                    <input  type="hidden" name="txtID" id="txtID" value="<?php echo $usuarios['id']; ?>" />
                                    <input  type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                                    <input  onclick="return confirm('ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?')"  
                                    type="submit" name="accion" value="Borrar" class="btn btn-danger" />


                                </form>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>