

<?php
/************************************************************
* Reporte en PDF con FPDF                                   *
*                                                           *
* Fecha:    2021-02-09                                      *
* Autor:  Marko Robles                                      *
* Web:  www.codigosdeprogramacion.com                       *
************************************************************/

//require "conexion.php";

session_start();
require "plantilla.php";

//if (!empty($_POST)) {

   
   /**$grado = mysqli_escape_string($mysqli, $_POST['grado']);

    $sql = "SELECT a.id, a.nombre, a.edad, a.matricula, a.correo, g.grado FROM alumnos AS a INNER JOIN grados AS g ON a.id_grado=g.id WHERE g.id = $grado";
    $resultado = $mysqli->query($sql);*/

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 15);
    $pdf->SetMargins(80,8,20);
    $Productos=$_SESSION['factura'];
    //echo nl2br("sun \n moon \n sun \n moon");
    $nomp = str_replace('', '', $Productos);
    //var_dump( nl2br($nomp));
   //$pdf->Cell(190, 5, $nomp, 1, 1, "C");
   //$pdf->SetXY(80, 30);
   $pdf->SetX(65);
   $pdf->Write(7,$nomp);
   
   //$pdf->SetXY(80, 30);
    
   // $pdf->Cell(190, 5,"DESCRIPCIONrt",1,1,'C');
    //$pdf->Ln(1);
    //$pdf->Cell(190, 5,'DESCRIPCION',1,1,'C');
    //$pdf->Ln(4);
    $pdf->Output("","Factura FabricaDelFrito",true);


   /**$pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(40, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(20, 5, "Edad", 1, 0, "C");
    $pdf->Cell(40, 5, "Matricula", 1, 0, "C");
    $pdf->Cell(30, 5, "Grado", 1, 0, "C");
    $pdf->Cell(50, 5, "Correo", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['id'], 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['nombre']), 1, 0, "C");
        $pdf->Cell(20, 5, $fila['edad'], 1, 0, "C");
        $pdf->Cell(40, 5, $fila['matricula'], 1, 0, "C");
        $pdf->Cell(30, 5, $fila['grado'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['correo'], 1, 1, "C");
    }

    $pdf->Output();*/ 
//}
