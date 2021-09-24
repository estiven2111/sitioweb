<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtIva=(isset($_POST['txtIva']))?$_POST['txtIva']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php");


switch($accion){
   

       case "Agregar":

        $sentenciaSQL = $conexion->prepare("INSERT INTO productos(nombre, iva, descripcion, precio, imagen) VALUES (:nombre, :iva, :descripcion, :precio, :imagen);");
        $sentenciaSQL->bindparam(':nombre',$txtNombre);
        $sentenciaSQL->bindparam(':iva',$txtIva);
        $sentenciaSQL->bindparam(':descripcion',$txtDescripcion);
        $sentenciaSQL->bindparam(':precio',$txtPrecio);
      
        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }
  
        $sentenciaSQL->bindparam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();
        $sentenciaSQL = $conexion->prepare("INSERT INTO imagen(imagen, descripcion) VALUES (:imagen, :descripcion);");
        $sentenciaSQL->bindparam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindparam(':descripcion',$txtDescripcion);
        $sentenciaSQL->execute(); 
        $agg = str_replace(' ', '_', $txtNombre);
       
        $sentenciaSQL= $conexion->prepare("ALTER TABLE Pedidos ADD  $agg  varchar (100)  ;");
        $sentenciaSQL->execute();

        ?>  <meta http-equiv="refresh" content="0;url=./productos.php"> <?php
       // header("Location:productos.php");
        break;

        
       

        case "Modificar":
            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos where nombre = $txtNombre");
             $sentenciaSQL->execute();
            $listaProductos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
             var_dump($listaProductos);
            $sentenciaSQL= $conexion->prepare("UPDATE  productos SET nombre=:nombre WHERE id=:id");
            $sentenciaSQL= $conexion->prepare("ALTER TABLE pedidos CHANGE apellido NVARCHAR(40)null");
            $sentenciaSQL->bindparam(':nombre',$txtNombre);
            $sentenciaSQL->bindparam(':id',$txtID);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("UPDATE  productos SET iva=:iva WHERE id=:id");
            $sentenciaSQL->bindparam(':iva',$txtIva);
            $sentenciaSQL->bindparam(':id',$txtID);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("UPDATE  productos SET descripcion=:descripcion WHERE id=:id");
            $sentenciaSQL->bindparam(':descripcion',$txtDescripcion);
            $sentenciaSQL->bindparam(':id',$txtID);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("UPDATE  productos SET precio=:precio WHERE id=:id");
            $sentenciaSQL->bindparam(':precio',$txtPrecio);
            $sentenciaSQL->bindparam(':id',$txtID);
            $sentenciaSQL->execute ();
 
            if($txtImagen!=""){

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
                $sentenciaSQL->bindparam(':id',$txtID);
                $sentenciaSQL->execute();
                $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($productos['imagen']) && ($productos["imagen"]!="imagen.jpg")){

                    if(file_exists("../../img/".$productos["imagen"])){

                    unlink("../../img/".$productos["imagen"]);
                    }
                }


            $sentenciaSQL= $conexion->prepare("UPDATE  productos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindparam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindparam(':id',$txtID);
            $sentenciaSQL->execute();
            }
               ?>  <meta http-equiv="refresh" content="0;url=./productos.php"> <?php 
            //header("Location:productos.php");
            break;
        

                case "Cancelar":
                ?>  <meta http-equiv="refresh" content="0;url=./productos.php"> <?php
                //header("Location:productos.php");
               break;

                case "Seleccionar":

                    $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE id=:id");
                    $sentenciaSQL->bindparam(':id',$txtID);
                    $sentenciaSQL->execute();
                    $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
          
                    
                    $txtNombre=$productos['nombre'];
                    $txtIva=$productos['iva'];
                    $txtDescripcion=$productos['descripcion'];
                    $txtPrecio=$productos['precio'];
                    $txtImagen=$productos['imagen'];


                    
                    break;

                    case "Borrar":

                    $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
                    $sentenciaSQL->bindparam(':id',$txtID);
                    $sentenciaSQL->execute();
                    $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                    if(isset($productos['imagen']) && ($productos["imagen"]!="imagen.jpg")){

                        if(file_exists("../../img/".$productos["imagen"])){

                        unlink("../../img/".$productos["imagen"]);

                        }
                    }

                    $sentenciaSQL= $conexion->prepare("SELECT nombre FROM productos WHERE id=:id");
                    $sentenciaSQL->bindparam(':id',$txtID);
                    $sentenciaSQL->execute();
                    $nomb=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                    
                    $nombre = $nomb['nombre'];
                    $borrar= str_replace(' ', '_', $nombre);
                    $sentenciaSQL= $conexion->prepare("ALTER TABLE pedidos drop $borrar ;");
                    $sentenciaSQL->execute();
                    $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE id=:id");
                    $sentenciaSQL->bindparam(':id',$txtID);
                    $sentenciaSQL->execute();
                   
                      ?>  <meta http-equiv="refresh" content="0;url=./productos.php"> <?php
                       //header("Location:./productos.php");
                  
                     break;


}
         

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>