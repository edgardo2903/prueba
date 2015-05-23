<!DOCTYPE html>
<html>
	<?php
        include('../modules/conexion.php');
		session_start();
		if (isset($_SESSION['username'])) {
			if ($_SESSION['username'] == 'Almacen') {
                $_SESSION['mov']=1;
				
	?>
	
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="../favicom/favicon2.ico">
        <link href="../css/estilo.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../js/myjava.js"></script>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <title>Almacen</title>	   
    	   
    	    <link rel="stylesheet" href="../css/styles2.css">	

    	    <meta http-equiv="X-UA-Compatible" content="IE=edge">   

    </head>
    <header>
            <div id="logo">         
            </div>  
        </header>
    <body>
        <div class="encabezado">
        	<h1 class="grande float-center negro">Almacen</h1>
        	<h3 class="margen-cort lgrande float-center rojo"><span><?php echo $_SESSION['username'];?></span></h3>
        </div>
        <div id="menu">
    			<ul class="no_lista text-center inline-block">
    				
    				<li> <a href="almacen.php">Volver al Inicio</a> 
                    <li> <a href="entradas.php">Entradas</a> 
                    <li> <a href="salidas.php" >Salidas</a> 

    				<li ><a href="../modules/cerrar.php">Salir</a>

    				
    			</ul>
    		</div>
       <br><br>
        <section>
        <table border="0" align="center">
        	<tr><td width="200"><a target="_blank" href="modules_almacen/inv_pdf.php" class="btn btn-danger">Inventario en PDF</a></td>
            	<td>Desde </td> <td><input type="date" id="bd-desde"/></td>
                <td colspan="2"><input type="checkbox" readonly="readonly" style="visibility:hidden; height:5px;" id="active" value="active" name="active" checked="checked" /></td>
                <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><input type="date" id="bd-hasta"/></td>
                <td width="100"></td>
                
                <td width="200"><a href="javascript:busquedaPDF();" class="btn btn-success">BUSQUEDA A PDF</a></td>
            </tr>
        </table>
        </section>
        <div class="registros" id="agrega-registros">
        	<table class="table table-striped table-condensed table-hover">
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
                </tr>
                <?php 

    				
    					$registro = mysql_query("SELECT * FROM ingresos ORDER BY fecha desc");
    					while($registro2 = mysql_fetch_array($registro)){
    						$_SESSION['mov']=1;
    						echo '<tr>
    								<td>'.fechaNormal($registro2['fecha']).'</td>
                                    <td>'.$registro2['factura'].'</td>
                                    <td>'.$registro2['proveedor'].'</td>
                                    <td>'.$registro2['categoria'].'</td>
                                    <td>'.$registro2['codigo'].'</td>
                                    <td>'.$registro2['producto'].'</td>
                                    <td>'.$registro2['cantidad'].'</td>
                                    <td>'.$registro2['unidad'].'</td>
                                    <td>'.$registro2['costo_u'].'</td>
                                    <td>'.$registro2['costo_t'].'</td>
                                    <td>'.$registro2['st_I'].'</td>
                                    <td>'.$registro2['st_F'].'</td>
                                    
    							</tr>';		
    					}
    			?>
            </table>
        </div>
        <br><br><br>

    </body>
</html>
    
<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert("No esras Autorizado para Ingresar")
			window.location = "../index.php";
		</script>
		<?php
	}
}
else {
	?>
	<script type="text/javascript">
		alert("Inicia Sesion para ingresar")
		window.location = "../index.php";
	</script>
	<?php
	}
?>
