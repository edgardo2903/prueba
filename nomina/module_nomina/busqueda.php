<?php
include('../../modules/conexion.php');

$dato = strtoupper($_POST['dato']);
$activo = $_POST['activo'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
if ($activo == 'activo') {
	$registro = mysql_query("SELECT * FROM trab_qui WHERE cedula LIKE '$dato%' OR nombres LIKE '$dato%' OR apellidos LIKE '$dato%' ORDER BY apellidos ASC");
}
else{

$registro = mysql_query("SELECT * FROM trab_sem WHERE cedula LIKE '$dato%' OR nombres LIKE '$dato%' OR apellidos LIKE '$dato%' ORDER BY apellidos ASC");
}
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
          		<th width="550">APELLIDOS Y NOMBRES</th>
                <th width="100">CÉDULA</th>
                <th width="150">FECHA INGRESO</th>
                <th width="300">CARGO</th>
                <th width="50">ÁREA</th>
                <th width="50">SUELDO</th>
	            <th width="30">PAGAR</th>
                <th width="30">RECIBO</th>
            </tr>';

	if(mysql_num_rows($registro)>0){

		while($registro2 = mysql_fetch_array($registro)){
			$codigo=$registro2['idproducto'];
			echo '<tr>
					<td width="550">'.$registro2['apellidos']." ".$registro2['nombres'].'</td>
	            	<td width="100">'.$registro2['cedula'].'</td>
	                <td width="150">'.fechaNormal($registro2['fecha']).'</td>
	                <td width="300">'.$registro2['cargo'].'</td>
	                <td width="100">'.$registro2['area'].'</td>
	                <td width="100">'.$registro2['sueldo'].'</td>

	        		<td width="30"><a href="javascript:pagarNomina('.$codigo.');"  class="glyphicon glyphicon-pencil"></a> </td> 
	        		<td width="30"><a href="javascript:reportePDF('.$codigo.');" class="glyphicon glyphicon-file"></a> </td>
				</tr>';
		}
	}else{
		echo '<tr>
					<td colspan="6">No se encontraron resultados</td>
				</tr>';
		}
		echo '</table>';

?>