<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";

$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php");


switch($accion){
   

       case "Agregar":

       $sentenciaSQL = $conexion->prepare("INSERT INTO imagen(imagen, descripcion) VALUES (:imagen, :descripcion);");
           
        $sentenciaSQL->bindparam(':descripcion',$txtDescripcion);
      
        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../../img-prod/".$nombreArchivo);
        }
  
        $sentenciaSQL->bindparam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();
       

        ?>  <meta http-equiv="refresh" content="0;url=./img.php"> <?php
       // header("Location:productos.php");
        break;

        
       

        
        

                case "Cancelar":
                ?>  <meta http-equiv="refresh" content="0;url=./img.php"> <?php
                //header("Location:productos.php");
               break;

               

                    case "Borrar":
                    
                    $sentenciaSQL= $conexion->prepare("SELECT * FROM imagen  WHERE id_img=:id");
                    $sentenciaSQL->bindparam(':id',$txtID);
                    $sentenciaSQL->execute();
                    $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                         var_dump($productos["imagen"]);
                    if(isset($productos['imagen']) && ($productos["imagen"]!="imagen.jpg")){

                        if(file_exists("../../img-prod/".$productos["imagen"])){

                        unlink("../../img-prod/".$productos["imagen"]);

                        }
                    }
                    $sentenciaSQL= $conexion->prepare("DELETE FROM imagen WHERE id_img=:id");
                    $sentenciaSQL->bindparam(':id',$txtID);
                    $sentenciaSQL->execute();
                   
                      ?> <meta http-equiv="refresh" content="0;url=./img.php">  <?php
                       //header("Location:./productos.php");
                   
                     break;


}
         

$sentenciaSQL= $conexion->prepare("SELECT * FROM imagen");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
