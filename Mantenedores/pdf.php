<?php
header("Content-Type: text/html;charset=utf-8");
require("fpdf/fpdf.php");
require("conexion_p.php");

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('fpdf/municipalidad1.png', 80, 10, 30);
        $this->Ln(20);
        $this->SetFont('Courier', 'B', 40);
        $this->Cell(190, 40, 'Reporte de Solicitud', 0, 1, 'C');
        $this->SetFont('Courier', 'B', 13);
        $this->Cell(40);
        $this->Ln(1);
    }

    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-40);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(185, 10, utf8_decode('Firma'),0,0,'C',0);
        $this->Ln(10);
        $this->Ln(10);
        $this->Cell(185, 10, utf8_decode('Municipalidad de Concepción'), 0, 0, 'C', 0);
        $this->Ln(10);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

$codigo = $_GET['codigo'];

$consulta = "SELECT * FROM solicitud WHERE codigo_solicitud = $codigo";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
while ($row = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(10, 10, $pdf->Write(10, utf8_decode("Código: " . $row['Codigo_solicitud'])), 0, 0, 'L', 0);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, $pdf->Write(10,utf8_decode("Código departamento: " . $row['Codigo_dep'])), 0, 0, 'L', 0);
    $pdf->Ln(10);
    $pdf->Cell(45, 10, $pdf->Write(10,utf8_decode("Rut: " . $row['Rut_persona'])), 0, 0, 'L', 0);
    $pdf->Ln(10);
    $pdf->Cell(45, 10, $pdf->Write(10,utf8_decode("Tipo: " . $row['Tipo_solicitud'])), 0, 0, 'L', 0);
    $pdf->Ln(10);
    $pdf->Cell(45, 10, $pdf->Write(10,utf8_decode("Estado: " . $row['Estado_solicitud'])), 0, 0, 'L', 0);
    $pdf->Ln(10);
    $pdf->Cell(45, 10, $pdf->Write(10,utf8_decode("Fecha de creación: " . $row['Creada_solicitud'])), 0, 0, 'L', 0);
    $pdf->Ln(10);
    $pdf->Cell(45, 10, $pdf->Write(10,utf8_decode("Descripción: " . $row['Descripcion_solicitud'])), 0, 0, 'L', 0);
}
$pdf->Image('fpdf/firma.png', 55, 220, 100);
$pdf->Output();
