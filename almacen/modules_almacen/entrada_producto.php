<?php 
	session_start();
	include('../../modules/conexion.php');

	//Recibimos datos de usuario y los transforma a mayuscula
	$proceso = strtoupper($_POST['pro']);
	$factura = strtoupper($_POST["factura"]);
	$proveedor = strtoupper($_POST["proveedor"]);
	$producto = strtoupper($_POST["nombre"]);
	$cantidad = $_POST["cantidad"];
	$unidad = $_POST["unidad"];
	$costo_u = $_POST["costo"];
	$fecha = date('Y-m-d');
	$stock = $_POST["stock"];
	$codigo = strtoupper($_POST["codigo"]);
	$categoria = strtoupper($_POST["categoria"]);
	$destino = strtoupper($_POST["destino"]);

	
	
	$costo_t = $costo_u * $cantidad;
			
	//Valida la accion a ejecutar para hacer la insercion en la base de datos
	
	if ($proceso == 'INGRESAR') {
		$stock_new = $stock + $cantidad;	
		mysql_query("INSERT INTO ingresos (idingreso,fecha,factura,proveedor,categoria,codigo,producto,cantidad,unidad,costo_u,costo_t,st_I,st_F) VALUES (NULL,'$fecha','$factura','$proveedor','$categoria','$codigo','$producto','$cantidad', '$unidad','$costo_u','$costo_t','$stock','$stock_new') ")or die ("No se establecio la conexon");
		
		mysql_query("UPDATE productos SET stock ='$stock_new', precio = '$costo_u'  WHERE codigo = '$codigo'")or die ("No se establecio la conexon");
	}
	elseif ($proceso=="SALIDA"){

		$stock_new = $stock - $cantidad;
		mysql_query("INSERT INTO salida (idsalida,fecha,area_destino,categoria,codigo,producto,cantidad,unidad,st_I,st_F) VALUES (NULL,'$fecha','$destino','$categoria','$codigo','$producto','$cantidad','$unidad','$stock','$stock_new') ");
		mysql_query("UPDATE productos SET stock ='$stock_new' WHERE codigo = '$codigo'")or die ("No se establecio la conexion");
			
	}
	else {
		mysql_query("INSERT INTO ingresos (idingreso,fecha,factura,proveedor,categoria,codigo,producto,cantidad,unidad,costo_u,costo_t,st_I,st_F) VALUES (NULL,'$fecha','$factura','$proveedor','$categoria','$codigo','$producto','$cantidad', '$unidad','$costo_u','$costo_t','0','$cantidad') ")or die ("No se establecio la conexon");
		
		mysql_query("INSERT INTO productos VALUES (NULL,'$categoria','$codigo','$producto','$cantidad', '$unidad','$costo_u')")or die ("No se establecio la conexon");

	}
			
// para recargar automaticamente la pagina con ajax
	$registro = mysql_query("SELECT * FROM productos ORDER BY stock desc");
		echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Codigo</th>
                <th width="150">Categoria</th>
                <th width="150">Stock</th>
                <th width="150">Unidad</th>
                <th width="50">Salida</th>
                <th width="50">Ingresar</th>
            </tr>';

					while($registro2 = mysql_fetch_array($registro)){
						$codigo=$registro2['idproducto'];
						echo '<tr>
								<td>'.$registro2['producto'].'</td>
                                <td>'.$registro2['codigo'].'</td>
                                <td>'.$registro2['categoria'].'</td>
                                <td>'.$registro2['stock'].'</td>
                                <td>'.$registro2['unidad'].'</td>

								<td><a href="javascript:selectProducto('.$codigo.');" class="glyphicon glyphicon-pencil"></a></td>
								<td><a href="javascript:ingresoProducto('.$codigo.');" class="glyphicon glyphicon-check"> </a></td>
							</tr>';		
					}
		
	
?>