<?php
require('../../fpdf/fpdf.php');
include('../../modules/conexion.php');
//Para mostrar las busqueda en un PDF
$area = utf8_decode("ÁREA");//palabras con acentos
$codigo = utf8_decode("CÓDIGO");

$producto = $_GET['producto']; //recibe el nombre del producto, categoria o codigo
if ($producto != undefined) { // condicional si se ha solicitado una busqueda de producto
		class MiPDF extends FPDF {

			public function Header(){
				$this -> Image("../../images/Logo.jpg",3,5,240,20);
				$this -> SetFont ('Arial', 'B', 10);
				$this -> Ln(10);
				$this -> Cell (190, 20,'MARIARA '.date('d-m-Y').'',0 , 0 , 'R');
				$this -> Ln(2);
				$this -> SetFont ('Arial', 'B', 15);
				$this -> Cell(190, 40, "REPORTES ALMACEN CARTONAJES GRANICS", 0 , 0 , 'C');
				$this -> Ln(30);
			}
		}
	$pdf = new MiPDF();
	$pdf->AddPage();
		$pdf->SetX(20); 
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(50, 8, 'NOMBRE DE PRODUCTO',1,0,'C');
		$pdf->Cell(20, 8, $codigo,1,0,'C');
		$pdf->Cell(50, 8, 'CATEGORIA',1,0,'C');
		$pdf->Cell(25, 8, 'STOCK',1,0,'C');
		$pdf->Cell(25, 8, 'UNIDAD',1,0,'C');
	
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		//CONSULTA
		$productos = mysql_query("SELECT * FROM productos WHERE producto LIKE '$producto%' OR categoria LIKE '$producto%' OR codigo LIKE '$producto%' ORDER BY stock desc")or die ("NO HAY CONEXION");

		while($productos2 = mysql_fetch_array($productos)){
			$pdf->SetX(20);
			$pdf->Cell(50, 8, $productos2['producto'],1,0,'C');
			$pdf->Cell(20, 8, $productos2['codigo'],1,0,'C');
			$pdf->Cell(50, 8, $productos2['categoria'],1,0,'C');
			
			$pdf->Cell(25, 8, $productos2['stock'],1,0,'C');
			$pdf->Cell(25, 8, $productos2['unidad'],1,0,'C');
	
			$pdf->Ln(8);
		}

	
}
else{ // si no se envio un producto, la busqueda poara mostrar en PDF es de fechas, aqui se reciben esos datos
	if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
		$desde = $_GET['desde'];
		$hasta = $_GET['hasta'];
		$active = $_GET['active'];

		$verDesde = date('d/m/Y', strtotime($desde));
		$verHasta = date('d/m/Y', strtotime($hasta));//cambio del formato de fecha
	}else{
		$desde = '1111-01-01';
		$hasta = '9999-12-30';

		$verDesde = '__/__/____';
		$verHasta = '__/__/____';
	}
		class MiPDF extends FPDF {

			public function Header(){
				$this -> Image("../../images/Logo.jpg",3,5,240,20);
				$this -> SetFont ('Arial', 'B', 10);
				$this -> Ln(10);
				$this -> Cell (190, 20,'MARIARA '.date('d-m-Y').'',0 , 0 , 'R');
				$this -> Ln(2);
				$this -> SetFont ('Arial', 'B', 15);
				$this -> Cell(190, 40, "REPORTES ALMACEN CARTONAJES GRANICS", 0 , 0 , 'C');
				$this -> Ln(30);
			}
		}
	$pdf = new MiPDF();
	$pdf->AddPage();

	$pdf->Cell(190, 8, 'DESDE: '.$verDesde.' HASTA: '.$verHasta,0, 0,'C');
	$pdf->Ln(23);
	$pdf->SetFont('Arial', 'B', 6);
	$pdf->Cell(18, 8, 'FECHA',1,0,'C');

	if ($active=="active") { // si es de ingresos la busquedas
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(30, 8, 'CATEGORIA',1,0,'C');
		$pdf->Cell(20, 8, $codigo,1,0,'C');
		$pdf->Cell(30, 8, 'PRODUCTO',1,0,'C');
		$pdf->Cell(15, 8, 'CATIDAD',1,0,'C');
		$pdf->Cell(15, 8, 'UNIDAD',1,0,'C');
		$pdf->Cell(15, 8, 'COSTO U',1,0,'C');
		$pdf->Cell(15, 8, 'COSTO T',1,0,'C');
		$pdf->Cell(15, 8, 'STOCK INI',1,0,'C');
		$pdf->Cell(15, 8, 'STOCK FIN',1,0,'C');
		$pdf->Ln(8);
		
		//CONSULTA
		$productos = mysql_query("SELECT * FROM ingresos WHERE fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC ")or die ("NO HAY CONEXION");

		while($productos2 = mysql_fetch_array($productos)){
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell(18, 8, fechaNormal($productos2['fecha']),1,0,'C');
			$pdf->Cell(30, 8, $productos2['categoria'],1,0,'C');
			$pdf->Cell(20, 8, $productos2['codigo'],1,0,'C');
			$pdf->Cell(30, 8, $productos2['producto'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['cantidad'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['unidad'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['costo_u'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['costo_t'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['st_I'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['st_F'],1,0,'C');

			$pdf->Ln(8);
		}

	}
	else{// si es de salidas la busqueda
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(25, 8, $area.' DESTINO',1,0,'C');
		$pdf->Cell(30, 8, 'CATEGORIA',1,0,'C');
		$pdf->Cell(20, 8, $codigo,1,0,'C');
		$pdf->Cell(30, 8, 'PRODUCTO',1,0,'C');
		$pdf->Cell(15, 8, 'CATIDAD',1,0,'C');
		$pdf->Cell(15, 8, 'UNIDAD',1,0,'C');
		$pdf->Cell(15, 8, 'STOCK INI',1,0,'C');
		$pdf->Cell(15, 8, 'STOCK FIN',1,0,'C');
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		//CONSULTA
		$productos = mysql_query("SELECT * FROM salida WHERE fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC ")or die ("NO HAY CONEXION");

		while($productos2 = mysql_fetch_array($productos)){
			$pdf->SetFont('Arial', '', 6);
			$pdf->Cell(18, 8, fechaNormal($productos2['fecha']),1,0,'C');
			$pdf->Cell(25, 8, $productos2['area_destino'],1,0,'C');
			$pdf->Cell(30, 8, $productos2['categoria'],1,0,'C');
			$pdf->Cell(20, 8, $productos2['codigo'],1,0,'C');
			$pdf->Cell(30, 8, $productos2['producto'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['cantidad'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['unidad'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['st_I'],1,0,'C');
			$pdf->Cell(15, 8, $productos2['st_F'],1,0,'C');

			$pdf->Ln(8);
		}
	}
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);

$pdf->Output();
?>