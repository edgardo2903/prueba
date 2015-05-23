<?php
include('../../modules/conexion.php');

$codigo = strtoupper($_POST['dato']);

//VERIFIFCA QUE EL CODIGO INGRESADO NO ESTE ASIGNADO YA A UN PRODUCTO PARA DAR UNA ALERTA ALA USUSARIO CON JQUERY

$valores = mysql_query("SELECT * FROM productos WHERE codigo = '$codigo'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['codigo'], 
				1 => $codigo,
				
				);
echo json_encode($datos);
?>
