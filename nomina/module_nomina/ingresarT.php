<?php 
	session_start();
	include('../../modules/conexion.php');


	//Recibimos datos de usuario
	$nombres = strtoupper($_POST["nombres"]);
	$apellidos = strtoupper($_POST["apellidos"]);
	$cedula = $_POST["cedula"];
	$fecha = $_POST["fecha"];
	$cargo = strtoupper($_POST["cargo"]);
	$area = strtoupper($_POST["area"]);
	$sueldo = $_POST["sueldo"];
	$fechaN = $_POST["fechaN"];
	$nomina = strtoupper($_POST["nomina"]);
	$sueldo_dia = $sueldo / 30;
	
				
	if ($nomina == 'SEMANAL') {
		mysql_query("INSERT INTO trab_sem (idtrabajador, nombres, apellidos, fecha_N , cedula, fecha, cargo, area, sueldo, sueldo_dia) 
								VALUES (NULL,'$nombres','$apellidos','$fechaN','$cedula','$fecha','$cargo','$area','$sueldo','$sueldo_dia') ") or die("No se ha podido conectar a Nadaaa");
		
	
	} else {
		mysql_query("INSERT INTO trab_qui (idtrabajador, nombres, apellidos, fecha_N , cedula, fecha, cargo, area, sueldo, sueldo_dia) 
								VALUES (NULL,'$nombres','$apellidos','$fechaN','$cedula','$fecha','$cargo','$area','$sueldo','$sueldo_dia') ") or die("No se ha podido conectar a Nadaaa");
	
	}
	
		
		
		
?>