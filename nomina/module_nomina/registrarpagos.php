<?php 
	session_start();
	include('../../modules/conexion.php');
	$cedula = $_POST['id-prod'];
	$hedf = $_POST['hedf'];
	$henf = $_POST['henf'];
	$hed = $_POST['hed'];
	$hen = $_POST['hen'];
	$dba = $_POST['dba'];
	$hbn = $_POST['hbn'];
	$hdomingo = $_POST['hdomingo'];
	$dc = $_POST['dc'];
	$dr = $_POST['dr'];
	$pp = $_POST['pp'];
	$od = $_POST['od'];
	$ni = $_POST['ni'];
	$da = $_POST['da'];

	#$fecha = date('Y-m-d');

	if ($_SESSION['nomina'] == 'semanal') {

		mysql_query("UPDATE trab_sem SET hedf = '$hedf', henf = '$henf', hed = '$hed', hen = '$hen', dba = '$dba', hbn = '$hbn', hdomingo = '$hdomingo', dc = '$dc', dr = '$dr', pp = '$pp', od = '$od', ni = '$ni', da = '$da' WHERE cedula = '". $cedula."'")or die("No se conecto");

	}
	elseif ($_SESSION['nomina'] == 'quincenal') {

		mysql_query("UPDATE trab_qui SET hedf = '$hedf', henf = '$henf', hed = '$hed', hen = '$hen', dba = '$dba', hbn = '$hbn', hdomingo = '$hdomingo', dc = '$dc', dr = '$dr', pp = '$pp', od = '$od', ni = '$ni', da = '$da' WHERE cedula = '". $cedula."'")or die("No se conecto");
	}


?>