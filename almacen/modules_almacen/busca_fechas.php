<?php
include('../../modules/conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$active = $_POST['active'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==FAlSE){
	$desde = $hasta;
}

if(isset($hasta)==FALSE){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
if ($active=="active") {

	$registro = mysql_query("SELECT * FROM ingresos WHERE fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha DESC");

	//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX SI ES PARA INGRESOS

	echo '<table class="table table-striped table-condensed table-hover">
	        	<tr>
	            	<th >FECHA</th>
	                <th >FACTURA</th>
	                <th >PROVEEDOR</th>
	                <th >CATEGORIA</th>
	                <th >CÓDIGO</th>
	                <th >PRODUCTO</th>
	                <th >CANTIDAD</th>
	                <th >UNIDAD</th>
	                <th >COSTO UNIDAD</th>
	                <th >COSTO TOTAL</th>
	                <th >STOCK INICIAL</th>
	                <th >STOCK FINAL</th>
	            </tr>';
	if(mysql_num_rows($registro)>0){
		while($registro2 = mysql_fetch_array($registro)){
			echo '<tr>
					<td width="100">'.fechaNormal($registro2['fecha']).'</td>
	                <td width="200">'.$registro2['factura'].'</td>
	                <td width="150">'.$registro2['proveedor'].'</td>
	                <td width="150">'.$registro2['categoria'].'</td>
	                <td width="150">'.$registro2['codigo'].'</td>
	                <td width="200">'.$registro2['producto'].'</td>
	                <td width="150">'.$registro2['cantidad'].'</td>
	                <td width="150">'.$registro2['unidad'].'</td>
	                <td width="150">'.$registro2['costo_u'].'</td>
	                <td width="150">'.$registro2['costo_t'].'</td>
	                <td width="150">'.$registro2['st_I'].'</td>
	                <td width="150">'.$registro2['st_F'].'</td>	
				</tr>';
		}
	}else{
		echo '<tr>
					<td colspan="6">No se encontraron resultados</td>
				</tr>';
	}
	echo '</table>';
}
else{
 	

	$registro = mysql_query("SELECT * FROM salida WHERE fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha DESC");

	//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX SI ES PARA SALIDAS

	echo '<table class="table table-striped table-condensed table-hover">
	        	<tr>
	            	<th >FECHA</th>
					<th >ÁREA DESTINO</th>
					<th >CAREGORIA</th>
					<th >CÓDIGO</th>
					<th >PRODUCTO</th>
					<th >CANTIDAD</th>
					<th >UNIDAD</th>
					<th >STOCK INICIAL</th>
					<th >STOCK FINAL</th>
	            </tr>';
	if(mysql_num_rows($registro)>0){
		while($registro2 = mysql_fetch_array($registro)){
			echo '<tr>
					<td width="100">'.fechaNormal($registro2['fecha']).'</td>
	                <td width="200">'.$registro2['area_destino'].'</td>
	                <td width="150">'.$registro2['categoria'].'</td>
	                <td width="150">'.$registro2['codigo'].'</td>
	                <td width="200">'.$registro2['producto'].'</td>
	                <td width="150">'.$registro2['cantidad'].'</td>
	                <td width="150">'.$registro2['unidad'].'</td>
	                <td width="150">'.$registro2['st_I'].'</td>
	                <td width="150">'.$registro2['st_F'].'</td>
				</tr>';
		}
	}else{
		echo '<tr>
					<td colspan="6">No se encontraron resultados</td>
				</tr>';
	}
	echo '</table>';
}
$_SESSION['mov']=0;
?>