<?php include("../config/verificar.php"); 
include("../template/cabecera.php"); 
include("./imgback.php"); ?>


<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Datos de los productos
    </div>

    <div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class = "form-group">
<label for="txtID">ID:</label>
<input type="text" required readonly class="form-control" value="<?php echo $txtID ?>" name="txtID" id="txtID" placeholder="ID">
</div>

<div class = "form-group">
<label for="txtDescripcion">Descripcion:</label>
<input type="text" required class="form-control" value="<?php echo $txtDescripcion ?>" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion del producto">
</div>


<div class = "form-group">
<label for="txtImagen">Imagen:</label>

<br/>

<?php echo $txtImagen; ?>

<?php if($txtImagen!=""){ ?>

    <img class="img-thumbnail rounded" src="../../img-prod/<?php echo $txtImagen;?>" width="50" alt="" srcset="">
<?php  }  ?>



<input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen del producto">
</div>

<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion" <?php echo ($accion=="seleccionar")?"disabled":"";  ?> value="Agregar" class="btn btn-success">Agregar</button>
    <button type="submit" name="accion" <?php echo ($accion!="seleccionar")?"disabled":"";  ?> value="Modificar" class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion" <?php echo ($accion!="seleccionar")?"disabled":"";  ?> value="Cancelar" class="btn btn-info">Cancelar</button>
</div>



</form>

    </div>
    
    </div>

</div>

<div class="col-md-7">
    
<table class="table table-bordered ">
    <thead>
        <tr>
            <th>ID</th>
           <th>Imagen</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listaProductos as $productos) {?>
        <tr>
            <td><?php echo $productos['id_img']; ?></td>
           <td>
               <img src="../../img-prod/<?php echo $productos['imagen']; ?>" width="50" alt="" srcset="">
            </td>
             <td><?php echo $productos['descripcion']; ?></td>
                
        <td>
         <form method="post">

    <input type="hidden" name="txtID" id="txtID" value="<?php echo $productos['id_img']; ?>"/>
    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>


        </form>
        </td>
        </tr>
        
        <?php } ?>
     
    </tbody>
</table>


</div>


<?php include("../template/pie.php"); ?>

        }
