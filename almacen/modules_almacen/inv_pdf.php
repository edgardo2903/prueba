<?php 
	session_start();
	include('../../modules/conexion.php');
	include('../../fpdf/fpdf.php');

	class MiPDF extends FPDF {

		public function Header(){
			$this -> Image("../../images/Logo.jpg",3,5,240,20);
			$this -> SetFont ('Arial', 'B', 10);
			$this -> Ln(10);
			$this -> Cell (190, 20,'Mariara '.date('d-m-Y').'',0 , 0 , 'R');
			$this -> Ln(2);
			$this -> SetFont ('Arial', 'B', 20);
			$this -> Cell(190, 40, "Inventario General de Almacen Cartonajes Granics", 0 , 0 , 'C');
			$this -> Ln(30);
		}
	}

$cabeceraT = array(
	"Categoria","Codigo","Producto","Stock","Unidad"
	);

$mipdf = new MiPDF();

$mipdf -> addPage();

for ($i=0; $i < count($cabeceraT); $i++) { 
	
	$mipdf -> SetFont('Arial','B', 12);

	$mipdf -> Cell(38 , 10 ,$cabeceraT[$i],1,0,'C');
} 
$mipdf -> Ln(10);

	$inventario = mysql_query("SELECT categoria, codigo, producto, stock, unidad FROM productos");

	while ($datos = mysql_fetch_array($inventario)) {
	
		$mipdf -> SetFont('Arial','', 10);
		$categoria = $datos[0]; 
		$codigo = $datos[1];
		$producto = $datos[2]; 
		$stock = $datos[3];
		$unidad = $datos[4];

		$mipdf -> Cell( 38 , 10 , $categoria , 1 , 0 , 'C');
		$mipdf -> Cell( 38 , 10 , $codigo , 1 , 0 , 'C');
		$mipdf -> Cell( 38 , 10 , $producto , 1 , 0 , 'C');
		$mipdf -> Cell( 38 , 10 , $stock , 1 , 0 , 'C');
		$mipdf -> Cell( 38 , 10 , $unidad , 1 , 0 , 'C');
		$mipdf -> Ln(10);
	}	

	

$mipdf -> Output();
?>