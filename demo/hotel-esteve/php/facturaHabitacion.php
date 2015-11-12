<?php
session_start();
require('../pdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('FACTURA TEST', true);
$pdf->SetFont('Arial','B',16);
$pdf->Image('../pdf/images/logo.jpg',70);
$pdf->Cell(0,10,'Factura',1,1,'C');
$pdf->Cell(0,10,'Reservador por '.$_SESSION["nombre"].' via web.',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'Nombre de la persona que recoge la reserva: '.$_POST["name"],0,1);
$pdf->Cell(0,10,'Apellidos: '.$_POST["lastName"],0,1);
$pdf->Cell(0,10,'DNI: '.$_POST["dni"],0,1);
$pdf->Cell(0,10,'Telefono: '.$_POST["tlf"],0,1);
$pdf->Cell(0,10,'Fecha de entrada: '.$_POST["fechaEntrada"],0,1);
$pdf->Cell(0,10,'Fecha de salida: '.$_POST["fechaSalida"],0,1);
$pdf->Cell(0,10,'Ciudad de reserva de la habitacion: '.$_POST["ciudad"],0,1);
if($_POST["ciudad"] == "COR"){
    $pdf->Cell(0,10,'',0,1);
    $pdf->Cell(0,10,'Tipo de habitacion: '.$_POST["habitacionCOR"],0,1);
    $pdf->Cell(0,10,'Servicios contratados: ',0,1);
    if(isset($_POST["servicioCOR"])){
        $pdf->Cell(0,10,'      -> Servicio de habitaciones',0,1);
    }
}else{
    $pdf->Cell(0,10,'',0,1);
    $pdf->Cell(0,10,'Tipo de habitacion: '.$_POST["habitacionBCN"],0,1);
    $pdf->Cell(0,10,'Servicios contratados: ',0,1);
    if(isset($_POST["servicioBCN"])){
        $pdf->Cell(0,10,'      -> Servicio de habitaciones',0,1);
    }
    if(isset($_POST["gymBCN"])){
        $pdf->Cell(0,10,'      -> Gimansio',0,1);
    }
    if(isset($_POST["saunaBCN"])){
        $pdf->Cell(0,10,'      -> Sauna',0,1);
    }
    if(isset($_POST["piscinaBCN"])){
        $pdf->Cell(0,10,'      -> Piscina',0,1);
    }
    
}
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);

$pdf->Cell(0,10,'Puntos utilizados: '.$_POST["puntos"],0,1);
$pdf->Cell(0,10,'Puntos tras la reserva: '.$_POST["puntosPostReserva"],0,1);
$pdf->Cell(0,10,''.$_POST["euros"].' euros',0,1);
$pdf->Output();
?>