<?php 
	session_start();
	include('../../modules/conexion.php');

	$dato = strtoupper($_POST['dato']);
	if ($dato != "") {

		$registro = mysql_query("SELECT * FROM trab_qui WHERE cedula LIKE '$dato%' OR nombres LIKE '$dato%' OR apellidos LIKE '$dato%' ORDER BY apellidos ASC");
		$registroS = mysql_query("SELECT * FROM trab_sem WHERE cedula LIKE '$dato%' OR nombres LIKE '$dato%' OR apellidos LIKE '$dato%' ORDER BY apellidos ASC");

		//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

		echo '<table class="table table-striped table-condensed table-hover">
	        	<tr>
	          		<th width="950">APELLIDOS Y NOMBRES</th>
	                <th width="80">CÉDULA</th>
	                <th width="300">FECHA INGRESO</th>
	                <th width="400">CARGO</th>
	                <th width="50">SUELDO</th>
		            <th width="40">CONSTANCIA</th>
	                <th width="40">ACTUALIZAR</th>
	            </tr>';
       
		
		if(mysql_num_rows($registro)>0){
			while($registro2 = mysql_fetch_array($registro)){
				$codigo=$registro2['cedula'];
				echo '<tr>
						<td width="950">'.$registro2['apellidos']." ".$registro2['nombres'].'</td>
		            	<td width="80">'.$registro2['cedula'].'</td>
		                <td width="100">'.fechaNormal($registro2['fecha']).'</td>
		                <td width="450">'.$registro2['cargo'].'</td>
		                <td width="50">'.$registro2['sueldo'].'</td>
		        		<td width="20"><a href="javascript:constancia('.$codigo.');"  class="glyphicon glyphicon-save"></a> </td> 
		        		<td width="20"><a href="javascript:actualizar('.$codigo.');" class="glyphicon glyphicon-edit"></a> </td>
					</tr>';
			}
		}
		elseif (mysql_num_rows($registroS)>0) {
			while($registro21 = mysql_fetch_array($registroS)){
				$codigo=$registro21['cedula'];
				echo '<tr>
						<td width="950">'.$registro21['apellidos']." ".$registro21['nombres'].'</td>
		            	<td width="80">'.$registro21['cedula'].'</td>
		                <td width="100">'.fechaNormal($registro21['fecha']).'</td>
		                <td width="450">'.$registro21['cargo'].'</td>
		                <td width="50">'.$registro21['sueldo'].'</td>
		        		<td width="30"><a href="javascript:constancia('.$codigo.');"  class="glyphicon glyphicon-save"></a> </td> 
		        		<td width="30"><a href="javascript:actualizar('.$codigo.');" class="glyphicon glyphicon-edit"></a> </td>
					</tr>';
			}
		}
		else{
			echo '<tr>
					<td colspan="2">No se encontraron resultados</td>
				</tr>';
			}
		echo '</table>';
	}
	else{
		echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
          		<th width="550">APELLIDOS Y NOMBRES</th>
                <th width="100">CÉDULA</th>
                <th width="250">FECHA INGRESO</th>
                <th width="300">CARGO</th>
                <th width="50">ÁREA</th>
                <th width="50">SUELDO</th>
	            <th width="30">CONSTANCIA</th>
                <th width="30">ACTUALIZAR</th>
            </tr>';
            echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
		
		echo '</table>';

	}

	
?>