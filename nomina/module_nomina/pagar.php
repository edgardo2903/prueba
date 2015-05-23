<?php
	session_start();
	include('../../modules/conexion.php');

$cedulaN = $_POST['id'];

//Lo que Hace es Buscar los datos del trabajador con la cedula indicaa

if ($_SESSION['nomina'] == 'semanal') {

	$valores = mysql_query("SELECT nombres, apellidos, cedula, sueldo, cargo from trab_sem where cedula like '". $cedulaN."'")or die("No se conecto");
	$valores2 = mysql_fetch_array($valores);

}
elseif ($_SESSION['nomina'] == 'quincenal') {
	$valores = mysql_query("SELECT nombres, apellidos, cedula, sueldo, cargo from trab_qui where cedula like '". $cedulaN."'")or die("No se conecto");
	$valores2 = mysql_fetch_array($valores);
}

$datos = array(
				0 => $valores2[0]." ".$valores2[1], 
				1 => $valores2[1], 
				2 => $valores2[2], 
				3 => "SUELDO MENSUAL (Bs):"." ".$valores2[3],
				4 => $valores2[4],
				5 => $valores2[3],
				
				);
echo json_encode($datos);
?>