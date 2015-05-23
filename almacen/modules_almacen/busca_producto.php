<?php
include('../../modules/conexion.php');

$dato = strtoupper($_POST['dato']);

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM productos WHERE producto LIKE '$dato%' OR categoria LIKE '$dato%' OR codigo LIKE '$dato%' ORDER BY stock desc");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">NOMBRE</th>
                <th width="200">CÓDIGO</th>
                <th width="150">CATEGORIA</th>
                <th width="150">STOCK</th>
                <th width="150">UNIDAD</th>
                <th width="50">SALIDA</th>
                <th width="50">INGRESAR</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		$codigo=$registro2['idproducto'];
		echo '<tr>
				<td>'.$registro2['producto'].'</td>
				<td>'.$registro2['codigo'].'</td>
				<td> '.$registro2['categoria'].'</td>
				<td>'.$registro2['stock'].'</td>
				<td>'.$registro2['unidad'].'</td>
				<td><a href="javascript:selectProducto('.$codigo.');" class="glyphicon glyphicon-pencil"></a></td>
								<td><a href="javascript:ingresoProducto('.$codigo.');" class="glyphicon glyphicon-check"> </a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>