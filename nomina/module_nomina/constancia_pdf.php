<?php 
	session_start();
	include('../../modules/conexion.php');
	include('../../fpdf/fpdf.php');
	$busquedaS = mysql_query("SELECT nombres, apellidos, cedula, fecha, cargo, area, sueldo from trab_sem WHERE cedula like '". $_SESSION['cedula']."'")or die("No se conecto");
		while ($semanales = mysql_fetch_array($busquedaS)) {
			
			$nombres = $semanales[0]; 
			$apellidos = $semanales[1];
			$cedula = $semanales[2]; 
			$fecha = $semanales[3];
			$cargo = $semanales[4];
			$area = $semanales[5];
			$sueldo = $semanales[6];

		}		
	
	$busquedaA = mysql_query("SELECT nombres, apellidos, cedula, fecha, cargo, area, sueldo from trab_qui WHERE cedula like '". $_SESSION['cedula']."'")or die("No se conecto".$cedula);	
		
		while ($semanales = mysql_fetch_array($busquedaA)) {
				
				$nombres = $semanales[0]; 
				$apellidos = $semanales[1];
				$cedula = $semanales[2]; 
				$fecha = $semanales[3];
				$cargo = $semanales[4];
				$area = $semanales[5];
				$sueldo = $semanales[6];
			
		}
	$nomina = utf8_decode("NÓMINA");
	$cedula_cento = utf8_decode("Cédula");
	$numero = utf8_decode("número");
	$continuacion = utf8_decode("continuación");
	$informacion = utf8_decode("información");



class MiPDF extends FPDF {

		public function Header(){
			//$this -> SetMargins(30, 25 , 40);
			$this->SetY(15);
			$this->SetX(50);
			$this -> SetAutoPageBreak(true,25);
			$this -> Image("../../images/Logo.jpg",3,5,240,20);
			$this -> SetFont ('Arial', 'B', 10);
			$this -> Ln(10);
			
			$this -> SetFont ('Arial', 'U', 14);
			$this -> Cell(190, 40, "Constancia de Trabajo", 0 , 0 , 'C');
			$this -> Ln(15);
			
		}
	}

$cabeceraT = array(
	"Nombres","Apellidos","cedula","Fecha","Cargo","Area","Sueldo"
	);
$mipdf = new MiPDF('P','mm','A4');

$mipdf -> addPage();

$mipdf ->  SetFont ('Arial', '', 12);
$mipdf -> SetX(50);
$mipdf -> Ln(15);
$mipdf -> MultiCell(190, 10, 'Mostra estoy muchas cosas mas, de nuevo una agina mas larga que lo de costmbre
				segui escribiejhdo akfhoeshvj<jgaiugsdohrjhjguzfigfg guagrufbsteuyuwhuahfiguiHIHHDOHHSHGhhHGJHDOHRGUHIIhioahhighhuhj
				zofnjhjfhsduhfuiguigufiguiwurufhfewydjgu9gu9ru9hirrrihiahe' , 0 , 'J' , false);

	
$mipdf -> Output();
?>