<?php 
	session_start();
	include('../../modules/conexion.php');
	include('../../fpdf/fpdf.php');
	$cedulaR = $_GET['cedula'];
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$nomina = utf8_decode("NÓMINA N°: ");
	$dia = utf8_decode("Día ");
	$retencion = utf8_decode("Retención S.S.O. 4%");
	$retencion2 = utf8_decode("Retención P. E. (P.F) 0.50%");
	$retencion3 = utf8_decode("Retención de FAOV 1%");

	$numero = "01";
class MiPDF extends FPDF {

		public function Header(){
			
			$this -> SetFont ('Arial', 'B', 7);
			$this -> SetXY (10, 8);

			$this -> Ln(2);
			$this -> Cell(190, 10, "REPUBLICA BOLIVARIANA DE VENEZUELA", 0 , 0 , 'C');
			$this -> Ln(3);
			$this -> Cell(190, 10, "MINISTERIO DEL PODER POPULAR PARA INDUSTRIAS", 0 , 0 , 'C');
			$this -> Ln(3);
			$this -> Cell(190, 10, 'JUNTA ADMINISTRATIVA TEMPORAL "CARTONAJES GRANICS" ', 0 , 0 , 'C');
			$this -> Ln(3);
			$this -> Cell(190, 10, "MARIARA - EDO. CARABOBO", 0 , 0 , 'C');
			$this -> SetX(162);
			$this -> Cell(2, 10, "RIF: G-20009977-1", 0 , 0 , 'L');
			$this -> Ln(3);
		
		}
	}

$mipdf = new MiPDF();

$mipdf -> addPage();
$mipdf -> SetFont ('Arial', 'B', 7);
$mipdf -> Cell(190, 10, "Comprobante de Pago", 0 , 0 , 'C');
$mipdf -> SetX(165);
$mipdf -> Cell(2, 10,$nomina.$numero, 0 , 0 , 'L');
$mipdf -> Ln(10);
if ($_SESSION['nomina'] == 'semanal') {
		$busquedaS = mysql_query("SELECT * from trab_sem WHERE cedula like '". $cedulaR."'")or die("No se conectoa la base");
	}
	elseif ($_SESSION['nomina'] == 'quincenal') {
		$busquedaS = mysql_query("SELECT * from trab_qui WHERE cedula like '". $cedulaR."'")or die("No se conecto ". $cedula);	
	}
	while ($redistros = mysql_fetch_array($busquedaS)) {
			
			$nombres = $redistros['nombres']; 
			$apellidos = $redistros['apellidos'];
			$cedula = $redistros['cedula']; 
			$fecha = $redistros['fecha'];
			$cargo = $redistros['cargo'];
			$area = $redistros['area'];
			$sueldo = $redistros['sueldo'];
			$horas_trabajadas = $redistros['horas_trabajadas'];
	}
//FORMULAS Y CLACULOS
	$semanal_calc = $sueldo / 4.28583;
	$semanal =number_format($semanal_calc, 2, '.', '');
	$diario_calc = $sueldo / 30;
	$diario = number_format($diario_calc, 2, '.', '');
	$hora_calc = $diario / 8;
	$hora = number_format($hora_calc, 2, '.', '');
	$cabeceraT = array(
	"Cant "," Concepto "," Costo "," Asignaciones "," Desucciones"
	);

$mipdf -> SetX(15);
$mipdf -> Cell(10, 10, "NOMBRE DEL TRABAJADOR: ", 0 , 0 , 'L');
$mipdf -> SetX(75);
$mipdf -> Cell(10, 10, $nombres." ".$apellidos, 0 , 0 , 'L');
$mipdf -> SetX(160);
$mipdf -> Cell(10, 10, "C.I.: " , 0 , 0 , 'L');
$mipdf -> SetX(180);
$mipdf -> Cell(10, 10, $cedula, 0 , 0 , 'L');

$mipdf -> Ln(4);

$mipdf -> SetX(15);
$mipdf -> Cell(10, 10, "FECHA DE INGRESO: ", 0 , 0 , 'L');
$mipdf -> SetX(75);
$mipdf -> Cell(10, 10, fechaNormal($fecha), 0 , 0 , 'L');
$mipdf -> SetX(120);
$mipdf -> Cell(10, 10, "AREA: ", 0 , 0 , 'L');
$mipdf -> SetX(130);
$mipdf -> Cell(10, 10, $area, 0 , 0 , 'L');
$mipdf -> SetX(160);
$mipdf -> Cell(10, 10, "CODIGO: " , 0 , 0 , 'L');
$mipdf -> SetX(188);
$mipdf -> Cell(10, 10, "11", 0 , 0 , 'L');

$mipdf -> Ln(5);
	$mipdf -> SetX(15);
	$mipdf -> Cell(10, 10, "SEMANA: ", 0 , 0 , 'L');
	$mipdf -> SetX(55);
	$mipdf -> Cell(10, 10, "PERIODO DEL ". fechaNormal($_SESSION['ii']). " AL ". fechaNormal($_SESSION['ff']), 0 , 0 , 'L');
	$mipdf -> SetX(120);
	$mipdf -> Cell(10, 10, "PERFIL: ", 0 , 0 , 'L');
	$mipdf -> SetX(130);
	$mipdf -> Cell(10, 10, "3", 0 , 0 , 'L');
	$mipdf -> SetX(160);
	$mipdf -> Cell(10, 10, "TURNO:", 0 , 0 , 'L');
	$mipdf -> SetX(181);
	$mipdf -> Cell(10, 10, "DIURNO", 0 , 0 , 'L');

		
	$mipdf -> Ln(10);
	$mipdf -> SetX(15);	
	$mipdf -> Cell( 50 , 7 , "MENSUAL: "." ".$sueldo , 1 , 0 , 'C');
	$mipdf -> Cell( 45 , 7 , "SEMANAL: "." ".$semanal , 1 , 0 , 'C');
	$mipdf -> Cell( 40 , 7 , "DIARIO: "." ".$diario , 1 , 0 , 'C');
	$mipdf -> Cell( 45 , 7 , "HORA: "." ".$hora , 1 , 0 , 'C');
			
	$mipdf -> Ln(5);
	$mipdf -> Ln(2);
	$mipdf -> SetX(15);
	$mipdf -> MultiCell( 180 , 5 , 
		"   Cant                            Concepto                               Costo                               Asignaciones                         Deducciones 
		  30                       Sueldo y Salarios                          ".$diario."                                   ".$sueldo."  
		  1                         Promedio descanso legal                1.00                                          -
		  0                         ".$dia ." compensatorio                      ".$diario."                                          -
		  0                         Bono Nocturno                                   -                                               -
		  0                         Recargo Domingo trab.                     -                                               -
		  0                         Hora Extra Diurna                             0.00                                          -
		  0                         Hora Extra Nocturna                         0.00                                          -
		  0                         H. Extra D. Domingo/Feriado           0.00                                          -
		  0                         H. Extra N. Domingo/Feriado           0.00                                          -
		                            Ausencia                                                                                                                                         0.00
		                            ".$retencion."                                                                                                                  259.00
		                            ".$retencion2."                                                                                                         32.44
		                            ".$retencion3."                                                                                                                70.28
		                            Anticipo de Quincena                                                                                                               2811.24
		                            Totales                                                                                            7028.29                              3173.45", 1 , 'J' , false);

	$mipdf -> SetX(15);
	$mipdf -> Cell( 180 , 7 , "NETO RECIBIDO:" , 1 , 0 , 'C');
	$mipdf -> SetX(180);
	$mipdf -> Cell(1, 10, "3854.64" , 0 , 0 , 'R');
	$mipdf -> Ln(7);
	$mipdf -> SetX(15);
	$mipdf -> MultiCell(180, 5, "                                                                                                                                                                     Recibe conforme
		                                                                                                                                                         ________________________ 
		                                                                                                                                               ".$nombres." ".$apellidos , 1 , 'J' , false);

	$mipdf -> Ln(10);
	$mipdf -> Write(100, "");
		
	


	

$mipdf -> Output();
?>