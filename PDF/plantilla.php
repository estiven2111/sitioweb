<?php
/************************************************************
* Plantilla para encabezado y pie de página                 *
*                                                           *
* Fecha:    2021-02-09                                      *
* Autor:  Marko Robles                                      *
* Web:  www.codigosdeprogramacion.com                       *
************************************************************/

require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        if($_GET['usu']==2){
            $this->Image("../IMAGENES/fabrica.jpg", 68, 10, 80,30);
        }
       
        // Arial bold 15
        $this->SetFont("Arial", "B", 20);
        // Título
        $this->Cell(25);
        $this->Cell(145, 80, utf8_decode("FACTURACION FABRICA DEL FRITO"), 0, 0, "C");
        //Fecha
        $this->SetFont("Arial", "", 10);
        $this->Cell(25, 5, "Fecha: ". date("d/m/Y"), 0, 1, "C");
        // Salto de línea
        $this->Ln(50);
    }
    

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->setX(5);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}
