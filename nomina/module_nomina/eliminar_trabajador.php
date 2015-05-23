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








<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM productos WHERE id_prod = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM productos ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
				<td>'.$registro2['tipo_prod'].'</td>
				<td>S/. '.$registro2['precio_unit'].'</td>
				<td>S/. '.$registro2['precio_dist'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>