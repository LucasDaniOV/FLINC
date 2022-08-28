<?php
require('../fpdf/fpdf.php');
require('../classes/class.aanbodDB.php');
$DB = new aanbodDB();
$aanbod = $DB->getAll();

class PDF extends FPDF {
    // Page header
    function Header() {
        // Logo
        $this->Image('../../img/Logo_Flinc.png',10,6,15);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,6,'Aangeboden voertuigen:',0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
// Instanciation of inherited class

$cellWidth = 17.27;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',7.5);

//Background color of header//
$pdf->SetFillColor(193,229,252);

$pdf->Cell($cellWidth,10,'Categorie',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Merk',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Naam',1,0,'C',true); 
$pdf->Cell($cellWidth,10,'Prijs',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Staat',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Transmissie',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Tellerstand',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Brandstof',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Verbruik',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Bouwjaar',1,0,'C',true);
$pdf->Cell($cellWidth,10,'Kleur',1,1,'C',true);


$pdf->SetFont('Arial','', 6);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

foreach($aanbod as $row) {
    $categorie = $row->categorie;
    $merk = $row->merk;
    $name = $row->naam;
    $prijs = $row->prijs;
    $staat = $row->staat;
    $transmissie = $row->transmissie;
    $tellerstand = $row->tellerstand;
    $brandstof = $row->brandstof;
    $verbruik = $row->verbruik;
    $bouwjaar = $row->bouwjaar;
    $kleur = $row->kleur;

    $pdf->Cell($cellWidth,10,$categorie,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$merk,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$name,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$prijs,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$staat,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$transmissie,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$tellerstand,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$brandstof,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$verbruik,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$bouwjaar,1,0,'C',$fill);
    $pdf->Cell($cellWidth,10,$kleur,1,1,'C',$fill);
    $fill = !$fill;
}


$pdf->Output();
