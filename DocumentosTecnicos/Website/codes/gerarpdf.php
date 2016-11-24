<?php
require('fpdf.php');

session_start();
$usuario = $_SESSION['usuario'];

mysql_connect('localhost', 'root', 'mechamoluiz');
mysql_select_db('Website');

$query_documentos = "SELECT * FROM Documentos WHERE usuario ='$usuario'";
$insert_documentos = mysql_query($query_documentos);
$query_plataformas = "SELECT * FROM Plataformas WHERE usuario ='$usuario'";
$insert_plataformas = mysql_query($query_plataformas);

$pdf = new FPDF();
$pdf->SetAuthor($usuario);
$pdf->SetTitle('Curriculo Lattes - Meu arquivo de informações');
$pdf->AddPage(); 
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(190,10,'Curriculo Lattes',1,0,'C');
$pdf->Ln();

$pdf->SetFont('Helvetica','B',20);
$pdf->Cell(40,10,'Documentos:');
$pdf->Ln();
while ($row = mysql_fetch_array($insert_documentos)) {
	$pdf->SetFont('Helvetica','B',14);
	$pdf->Cell(40,10,$row['titulo']);
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',12);
	$pdf->Cell(40,10,$row['texto']);
	$pdf->Ln();
}

$pdf->SetFont('Helvetica','B',20);
$pdf->Cell(40,10,'Plataformas:');
$pdf->Ln();
while ($row = mysql_fetch_array($insert_plataformas)) {
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(40,10,strtoupper($row['plataforma']) . ':');
	$pdf->SetFont('Helvetica','',12);
	$pdf->Cell(40,10,$row['url']);
	$pdf->Ln();
}

$pdf->Output();
?>