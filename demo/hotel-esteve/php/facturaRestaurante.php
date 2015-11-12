<?php
session_start();
require('../pdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('FACTURA RESTAURANTE', true);
$pdf->SetFont('Arial','B',16);
$pdf->Image('../pdf/images/logo.jpg',70);
$pdf->Cell(0,10,'Factura',1,1,'C');
$pdf->Cell(0,10,'Reservador por '.$_SESSION["nombre"].' via web.',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'Nombre de la persona que recoge la reserva: '.$_POST["name"],0,1);
$pdf->Cell(0,10,'Apellidos: '.$_POST["lastName"],0,1);
$pdf->Cell(0,10,'DNI: '.$_POST["dni"],0,1);
$pdf->Cell(0,10,'Telefono: '.$_POST["tlf"],0,1);
$pdf->Cell(0,10,'',0,1);


$pdf->Cell(0,10,'Ciudad de reserva de la habitacion: '.$_POST["ciudad"],0,1);
if ( $_POST["ciudad"] == "BCN" ){
    $pdf->Cell(0,10,'Cantidad de menús reservados: '.$_POST["cantidadMenuBCN"],0,1);
}else if ( $_POST["ciudad"] == "COR" ){
    $pdf->Cell(0,10,'Cantidad de menús reservados: '.$_POST["cantidadMenuCOR"],0,1);
}



$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);

$pdf->Cell(0,10,'Puntos utilizados: '.$_POST["puntos"],0,1);
$pdf->Cell(0,10,'Puntos tras la reserva: '.$_POST["puntosPostReserva"],0,1);
$pdf->Cell(0,10,''.$_POST["euros"].' euros',0,1);
$pdf->Output();
?>