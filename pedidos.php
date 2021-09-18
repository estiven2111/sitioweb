<?php 
session_start();
session_destroy();
$_SESSION['USUARIO'] = "";
$_SESSION['alerta'] = "";
include("template/cabecera.php");?>


<div class="jumbotron">
    <h1 class="display-3">Pedidosss</h1>
    <p class="lead">Realiza tus pedidos en esta sección</p>
    <hr class="my-2">
    <p></p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Ir a productos</a>
    </p>
</div>

<div class="row justify-content-center">
    <div class="col-md-5 card">
        <div class="card-header">
            Realiza tus pedidos
        </div>
        <div class="card-body">
            <form method="POST">

                <div class="form-group">
                    <label>Nombre producto:</label>
                    <input type="text" class="form-control" name="txtNombre" placeholder="Escribe nombre del producto">

                </div>

                <div class="form-group">
                    <label>Cantidad:</label>
                    <input type="text" class="form-control" name="txtCorreo" placeholder="Escribe la cantidad">

                </div>

                <div class="form-group">
                    <label>Nombre cliente:</label>
                    <input type="text" class="form-control" name="txtContrasenia" placeholder="Escribe la contraseña">
                </div>

                <div class="form-group">
                    <label>Direccion:</label>
                    <input type="text" class="form-control" name="txtContrasenia" placeholder="Escribe la contraseña">
                </div>

                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="int" class="form-control" name="txtContrasenia" placeholder="Escribe la contraseña">
                </div>

                

                <button type="submit" name="accion" value="Agregar" class="btn btn-primary">Pedir</button>
            </form>



        </div>

    </div>






<?php include("template/pie.php");?>