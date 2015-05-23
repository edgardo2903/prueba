<!DOCTYPE html>
<html>
	<?php
		session_start();
		if (isset($_SESSION['username'])) {
			if ($_SESSION['username'] == 'Almacen') {
				
	
	?>
	
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="../favicom/favicon2.ico">
        <link href="../css/estilo.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicom/favicon2.ico">
        <script src="../js/jquery.js" script type="text/javascript"></script>
        <script src="../js/myjava.js" script type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.min.js script type="text/javascript""></script>
        <script src="../bootstrap/js/bootstrap.js" script type="text/javascript"></script>
        <title>Almacen</title>	   
        	   
        	    <link rel="stylesheet" href="../css/styles2.css">	

        	    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        	   
        	    <script >
        	    $(document).ready(function(){
        	    	/*$('.glyphicon-pencil').mouseover(function(){
        	    		$(this).text("Salida de Producto")
        	    		$('.glyphicon-check').hide()
        	    	})
        	    	$('.glyphicon-pencil').mouseout(function(){
        	    		$(this).text("")
        	    		$('.glyphicon-check').show()
        	    	})
        	    	$('.glyphicon-check').mouseover(function(){
        	    		$(this).text("Ingresar Producto")
        	    		$('.glyphicon-pencil').hide()
        	    	})
        	    	$('.glyphicon-check').mouseout(function(){
        	    		$(this).text("")
        	    		$('.glyphicon-pencil').show()
        	    	})*/
        	    });

        	    </script>

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
        <div class="container-fluid">
        <div class="row-fluid">
                
        
        <div id="menu">
   			<ul class="no_lista text-center inline-block">
            	<li> <a href="#"id="nuevo-producto" >Ingresar Producto</a> 
        		<li> <a href="entradas.php">Entradas</a> 
                <li> <a href="salidas.php" >Salidas</a> 
  				<li ><a href="../modules/cerrar.php">Salir</a>
			
        	</ul>
        </div>
           <br><br>
            <section>
            <table border="0" align="center">
            	<tr>
                    <td width="200"><a target="_blank" href="modules_almacen/inv_pdf.php" class="btn btn-danger">INVENTARIO EN PDF</a></td>
                    <td width="500" class="rojo icono">INGRESA NOMBRE O CÓDIGO DEL PRODUCTO</td>
                	<td width="200"><input type="text" style="text-transform:uppercase" placeholder="Buscar producto" id="bs-prod"/></td>
                    
                    
                    <td width="200"><a href="javascript:busquedaPDF();" class="btn btn-success">BUSQUEDA A PDF</a></td>
                </tr>
            </table>
            </section>
            <div class="registros" id="agrega-registros">
            	
            </div>
            <br><br><br>
            
            
            <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
            <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel"><b>MOVIMIENTOS DE PRODUCTO</b></h4>
                    </div>
                    <form id="formulario" class="formulario" onsubmit="return agregaRegistro();" >
                    <div class="modal-body">
        				<table id="tabla" border="0" width="100%">
                       		 <tr>
                                <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" style="visibility:hidden; height:5px;"/></td>
                            </tr>
                             <tr>
                            	<td width="100"> <label>PROCESO: </label></td>
                                <td><input type="text" required="required" style="background: gray;" readonly="readonly" id="pro" name="pro"/></td>
                            	
                            	<td ><label>CÓDIGO: </label></td>
                            	<td><input type="text" required="required" style="background: gray;" name="codigo" readonly="readonly" id="codigo" maxlength="100"/></td>
                                
                            </tr>
                            <tr>
                            	<td><label>PRODUCTO: </label></td>
                                <td><input type="text" required="required" style="background: gray;" name="nombre" readonly="readonly" id="nombre" maxlength="100"/></td>
                            	
                           
                            	<td><label>CATEGORÍA:</label> </td>
                            	<td><input type="text" required="required" style="background: gray;" name="categoria" readonly="readonly" id="categoria" maxlength="100"/></td>

                            </tr>
                            <tr>
                            	<td id="stocktd"><label>STOCK: </label></td>
                                <td><input type="" required="required" name="stock" style="background: gray;" readonly="readonly" id="stock"/></td>
                            
                            	<td><label>UNIDAD:</label> </td>
                                <td><input type="text"  required="required" style="background: gray;" name="unidad" readonly="readonly" id="unidad"/></td>
                            </tr>
                            <tr>
                                <td><label>CANTIDAD:</label> </td>
                            	<td><input type="number" min="0" placeholder="Cantidad" step="any"  required="required" name="cantidad" id="cantidad"/></td>
                            	<td id="costotd" ><label>COSTO:</label> </td>
                                <td id="destinotd" ><label >DESTINO:</label> </td>
                            	<td id="costo"><input type="number" min="0"  step="any"  placeholder="Costo 00.00" name="costo" /></td>
                                <td id="destino"><input type="text" placeholder="Destino" style="text-transform:uppercase" name="destino" /></td>
                                          
                            	
                            </tr>
                              <tr>
                            	<td id="proveedortd"> <label>PROVEEDOR: </label></td>
                        <td id="proveedor"><input type="text" style="text-transform:uppercase" name="proveedor" /></td>
                    
                            	<td id="facturatd"><label>FACTURA:</label> </td>
                                <td id="factura"><input type="text" style="text-transform:uppercase" name="factura" /></td>
                            </tr>
                            <tr>
                            	<td colspan="2">
                                	<div id="mensaje"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="modal-footer">
                    
                    	<input type="submit" value="INGRESAR PRODUCTO" class="btn btn-success" id="reg"/>
                        <input type="submit" value="REGISTRAR SALIDA" class="btn btn-warning"  id="edi"/>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              
        <!-- MODAL PARA EL REGISTRO DE PRODUCTOS NUEVOS-->
            <div class="modal fade" id="nuevo_ingreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel2"><b>REGISTRAR UN PRODUCTO NUEVO</b></h4>
                    </div>
                    <form id="formulario2" class="formulario" onsubmit="return ingresarNuevo();" >
                    <div class="modal-body">
        				<table  border="0" width="100%">
                       		
                             <tr>
                            	<td > <label>PROCESO: </label></td>
                                <td><input type="text" required="required" style="background: gray;" readonly="readonly" id="proceso" name="pro"/></td>

                            </tr>
        	                <tr>                    	
                            	<td ><label>CÓDIGO: </label></td>
                            	<td><input type="text" id="codg" required="required"  name="codigo" placeholder='" USAR MAYÚSCULAS "' maxlength="100"/></td>
                            </tr>
                            <tr>
                            	<td><label>PRODUCTO: </label></td>
                                <td><input type="text" required="required" style="text-transform:uppercase" name="nombre" maxlength="100"/></td>
                           	</tr>
                            <tr> 	
                           
                            	<td><label>CATEGORÍA:</label> </td>
                            	<td><select name="categoria">
                                    <option value="">SELECCIONE</option>
        							<option value="CARTON">CARTON</option>
        							<option value="PAPEL MEDIM">PAPEL MEDIM</option>
        							<option value="PAPEL MICRO">PAPEL MICRO</option>
        							<option value="PAPEL LINER">PAPEL LINER</option>
        							<option value="PAPEL MICRO LINER">PAPEL MICRO LINER</option>		
        							<option value="INSUMOS Y PEGAS">INSUMOS Y PEGAS</option>
        							<option value="HERRAMIENTAS">HERRAMIENTAS</option>
        							<option value="MATERIAL DE LIMPIEZA">MATERIAL DE LIMPIEZA</option>
        						</select></td>

                            </tr>
                            <tr>
                            	<td><label>UNIDAD:</label> </td>
                            	<td><select name="unidad" >
                                    <option value="">SELECCIONE</option>                           
        							<option value="U">UNIDAD</option>							
        							<option value="KG">KILOGRAMOS</option>
        							<option value="L">LITROS</option>	
        							<option value="M">METROS</option>
        						</select></td>
                               
                            </tr>
                            <tr>
                            	<td><input type="number" min="0" placeholder="CANTIDAD" step="any"  required="required" name="cantidad" /></td>
                            	
                            	<td ><input type="number" min="0"  step="any"  placeholder="COSTO 00.00" name="costo" /></td>
                            </tr>
                            
                              <tr>
                            	<td ><input type="text" name="proveedor" style="text-transform:uppercase" placeholder="Proveedor"/></td>
                           
                            	<td ><input type="text" name="factura" style="text-transform:uppercase" placeholder="Factura" /></td>
                            </tr>
                            <tr>
                            	<td colspan="2">
                                	<div id="mensaje2"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="modal-footer">
                    
                    	<input type="submit" value="INGRESAR PRODUTO NUEVO" class="btn btn-success" id="register"/>
                        
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              

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
