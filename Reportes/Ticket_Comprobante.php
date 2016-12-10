<?php

require('fpdf/fpdf.php');
require('../conexion.php');
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}



function Header()
{
	$this->SetXY(10, 10);
    //$this->SetFont('Arial','B',10);
    //$this->SetFillColor(2,157,116);//Fondo verde de celda
    //$this->SetTextColor(240, 255, 240); //Letra color blanco
	$this->SetFont('Arial','',10);
	$this->Text(20,14,utf8_decode('Ticket-Comprobante'),0,'C', 0);
	//$this->Image('reparacion.png',170,-10,40,50);
	$this->Ln(10);
}

function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,utf8_decode('Ticket-Comprobante'),0,0,'L');

}

}


	//para datos de la persona encabezado
	$equipo= $_GET['id'];
	//$con = new DB;
	//$pacientes = $con->conectar();	
	
	$strConsulta = "select * from equipo join persona on RELA_PERSONA = ID_PERSONA WHERE ID_EQUIPO = '".$equipo."';";
	
	$equipo = mysql_query($strConsulta);
	
	$fila = mysql_fetch_array($equipo);

	$pdf=new PDF('L','mm','Letter');
	
	$pdf->AddPage('P','Letter');
	$pdf->SetFont('Times','B',16);
	$pdf->Ln(10);
	$pdf->Cell(0,18,'Comprobante',0,1,'C');
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(0);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,8,utf8_decode('Dirección: Fotheringham N°: 2165'));
	$pdf->Cell(250,8,utf8_decode('Fecha: ').$fila['PERSONA_FEC_ALTA'],0,0,'C');
	$pdf->Ln(5);
	$pdf->Cell(40,8,utf8_decode('Tel/Cel:  (037)-4429030'));
	$pdf->Ln(10);
	$pdf->Cell(40,8,utf8_decode('Cliente: ' .$fila['PERSONA_APELLIDO'] . ', ' .$fila['PERSONA_NOMBRE']));
	$pdf->Ln(10);
	$pdf->Cell(40,8,utf8_decode('Obs: ' .$fila['OBSERVACION']));
	$pdf->Ln(20);
	$pdf->Cell(40,8,utf8_decode('================================================================================'));
	$pdf->Ln(20);

	//$pdf->AddPage('P','Letter');
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(0,18,'Comprobante',0,1,'C');
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(0);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,8,utf8_decode('Dirección: Fotheringham N°: 2165'));
	$pdf->Cell(250,8,utf8_decode('Fecha: ').$fila['PERSONA_FEC_ALTA'],0,0,'C');
	$pdf->Ln(5);
	$pdf->Cell(40,8,utf8_decode('Tel/Cel:  (037)-4429030'));
	$pdf->Ln(10);
	$pdf->Cell(40,8,utf8_decode('Cliente: ' .$fila['PERSONA_APELLIDO'] . ', ' .$fila['PERSONA_NOMBRE']));
	$pdf->Ln(10);
	$pdf->Cell(40,8,utf8_decode('Obs: ' .$fila['OBSERVACION']));
	


$pdf->Output('Diagnostico de Equipo','I');
?>