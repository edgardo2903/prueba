<?php
include('../../modules/conexion.php');

$id = $_POST['id'];

//Busca los datos en la base de datos para mostrarlos en el formulario a la hora de ingresar o dar salida a un producto

$valores = mysql_query("SELECT * FROM productos WHERE idproducto = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['producto'], 
				1 => $valores2['codigo'], 
				2 => $valores2['categoria'], 
				3 => $valores2['stock'],
				4 => $valores2['unidad'],
				);
echo json_encode($datos); // Metodo usado para enviar los datos
?>

