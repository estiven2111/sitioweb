<?php
 date_default_timezone_set('America/Bogota');
 /*// // SELECT SUM(total) as totales from pedidos where Fecha_Pedido = '2021-09-24' or Fecha_Pedido = '2021-09-22' 
 include("./administrador/config/db.php");
 
 $sentenciaSQL = $conexion->prepare("SELECT SUM(total) as totales from pedidos where Fecha_Pedido = '2021-09-24'");
 
             $sentenciaSQL->execute();
             $lista = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
             //definir zona horaria en bogota colombia america latina
             date_default_timezone_set('America/Bogota');
             var_dump($lista);
             var_dump(date('d'));
             var_dump(date('w'));
             var_dump(date('z'));
             var_dump(date('r'));
             var_dump(date('g'));
             var_dump(date('e'));
             var_dump( getdate());
            
             if(date('w')=="1"){
                 $semanaSiguiente = time() + (7 * 24 * 60 * 60);
                 // 7 días; 24 horas; 60 minutos; 60 segundos
 echo 'Ahora:            '. date('Y-m-d') ."\n";
 echo 'Semana Siguiente: '. date('Y-m-d', $semanaSiguiente) ."\n";
 // o usar strtotime():
 echo 'Semana Siguiente: '. date('Y-m-d', strtotime('+1 week')) ."\n";
             }
 
 
 // obtener una semana completa
 $semanaSiguiente = time() + (7 * 24 * 60 * 60);
                    // 7 días; 24 horas; 60 minutos; 60 segundos
 echo 'Ahora:            '. date('Y-m-d') ."\n";
 echo 'Semana Siguiente: '. date('Y-m-d', $semanaSiguiente) ."\n";
 // o usar strtotime():
 echo 'Semana Siguiente: '. date('Y-m-d', strtotime('+1 week')) ."\n";
 
 $DateAndTime = date('m-d-Y h:i:s a', time());  
 
 echo "hora actual $DateAndTime";*/
 
 include("./administrador/config/db.php");
 $sentenciaSQL = $conexion->prepare("SELECT * FROM registro where fecha = '".date('Y-m-d')."';");
 $sentenciaSQL->execute();
 $total_diario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
 var_dump($total_diario);

 $sentenciaSQL = $conexion->prepare("SELECT SUM(total) as Diario from pedidos where Fecha_Pedido = '".date('Y-m-d')."';");
     $sentenciaSQL->execute();
     $total_diario1 = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
     $fecha=date('Y-m-d');
   $diario = $total_diario1[0]['Diario'];

 if($total_diario == false){
     echo "entro";
     /*$sentenciaSQL = $conexion->prepare("SELECT SUM(total) as Diario from pedidos where Fecha_Pedido = '".date('Y-m-d')."';");
     $sentenciaSQL->execute();
     $total_diario1 = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);*/
     var_dump($total_diario1);
 
    // INSERT INTO `registro` (`id`, `fecha`, `Diario`, `mes`, `anio`) VALUES (NULL, 'dfg', 'ew', 'we', 'we') 
   
   
 $sentenciaSQL = $conexion->prepare("INSERT INTO registro VALUES (NULL, '$fecha', '$diario', '', ''); ");
 $sentenciaSQL->execute();
 }else{
    echo "entro22222";
    /* $sentenciaSQL = $conexion->prepare("SELECT SUM(total) as Diario from pedidos where Fecha_Pedido = '".date('Y-m-d')."';");
     $sentenciaSQL->execute();
     $total_diario = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);*/
     $sentenciaSQL = $conexion->prepare("UPDATE registro SET Diario = '".$diario."' WHERE fecha = '".date('Y-m-d')."';");
     $sentenciaSQL->execute();
 }
 
 
 
 
           /*  $sentenciaSQL->execute();
             $lista1 = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
             var_dump($lista1);*/
 

?>