<?php
require('fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(100,10,'Reporte de clasificacion de peliculas ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(90, 10,'id', 1, 0, 'C', 0);
    $this->Cell(100, 10,'Clasificacion de la pelicula', 1, 1, 'C', 0);
    
}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
include("../src/php/database/connection.php");

 // mando a llamar la conexion establecida y la tabla que quiero mostrar
//require 'conex.php';
$consulta="SELECT * from clasificacion";
$resultado= mysqli_query($conection, $consulta);



$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
while($row=$resultado->fetch_assoc()){

    $pdf->Cell(90, 10, $row['idClasificacion'], 1, 0, 'C', 0);
    
    $pdf->Cell(100, 10, $row['nombreClasificacion'], 1, 1, 'C', 0);
    
    
    
    
 }
 
 

$pdf->Output();
?>