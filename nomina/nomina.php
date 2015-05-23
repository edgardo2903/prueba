<!DOCTYPE html>
<html>
	<?php
		session_start();
        include('../modules/conexion.php');
		if (isset($_SESSION['username'])) {
			if ($_SESSION['username'] == 'Nomina') {
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
        
        <title>Nómina</title>	   
        	   
        	    <link rel="stylesheet" href="../css/styles2.css">	

        	    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        	   
        	    <script >
        	    $(document).ready(function(){
        	    	
        	    });

        	    </script>

    </head>
    <header>
            <div id="logo">         
            </div>  
        </header>
    <body>
        <div class="encabezado">
        	<h1 class="grande float-center negro">NÓMINA</h1>
        	<h3 class="margen-cort lgrande float-center rojo"><span><?php echo $_SESSION['username'];?></span></h3>
        </div>
        <div class="container-fluid">
        <div class="row-fluid">
                
        
        <div id="menu">
   			<ul class="no_lista text-center inline-block">
            	<li ><a href='module_nomina/refresh.php'><span>Nómina Inicio</span></a>
                <?php if ($_SESSION['nomina'] == ''){ ?>

                    <li> <a href="#"id="nuevo-trabajador" >Ingresar Nuevo Trabajador</a> 

            		<li> <a href="trabajador.php">Buscar Trabajador</a> 
                <?php } ?>
  				<li ><a href="../modules/cerrar.php">Salir</a>
			
        	</ul>
        </div>
        <br><br>
            <?php 
                if ($_SESSION['nomina'] == 'semanal'){
                    ?>
                    <section>
                        <table border="0" align="center">
                            <tr>
                                <td width="500" class="rojo icono">INGRESA CEDULA O NOMBRE DE TRABAJADOR</td>
                                <td width="200"><input type="text" style="text-transform:uppercase" placeholder="Buscar Trabajador" id="bs-trab"/></td>
                            </tr>
                        </table>
                    </section>
                    <div class="registros" id="agrega-busqueda">
                        <table class="table table-striped table-condensed table-hover">
                            <tr>
                                <th width="550">APELLIDOS Y NOMBRES</th>
                                <th width="80">CÉDULA</th>
                                <th width="300">FECHA INGRESO</th>
                                <th width="400">CARGO</th>
                                <th width="50">ÁREA</th>
                                <th width="50">SUELDO</th>
                                <th width="30">PAGAR</th>
                                <th width="30">RECIBO</th>
                                
                            </tr>
                            <?php 
                                $registro = mysql_query("SELECT * FROM trab_sem ORDER BY apellidos ASC ")or die("No Conexion");
                                   
                                while($registro2 = mysql_fetch_array($registro)){
                                    $codigo=$registro2['cedula'];
                                    echo '<tr>
                                            <td width="750">'.$registro2['apellidos']." ".$registro2['nombres'].'</td>
                                            <td width="80">'.$registro2['cedula'].'</td>
                                            <td width="100">'.fechaNormal($registro2['fecha']).'</td>
                                            <td width="350">'.$registro2['cargo'].'</td>
                                            <td width="100">'.$registro2['area'].'</td>
                                            <td width="100">'.$registro2['sueldo'].'</td>
                                            <td width="30"><a href="javascript:pagarNomina('.$codigo.');"  class="glyphicon glyphicon-pencil"></a> </td> 
                                            <td width="30"><a href="javascript:reportePDF('.$codigo.');" class="glyphicon glyphicon-file"></a> </td>
                                        </tr>';     
                                }
                            ?>
                        </table>
                    </div>
                    <br><br><br>

                <?php 
                }
                elseif ($_SESSION['nomina'] == 'quincenal') {
                    ?>
                        <section>
                            <table border="0" align="center">
                                <tr>
                                    <td colspan="2"><input type="checkbox" readonly="readonly" style="visibility:hidden; height:5px;" id="activo" value="activo" name="activo" checked="checked" /></td>
                                    <td width="500" class="rojo icono">INGRESA CÉDULA O NOMBRE DEL TRABAJADOR</td>
                                    <td width="200"><input type="text" style="text-transform:uppercase" placeholder="Buscar Trabajador" id="bs-trab"/></td>
                                </tr>
                            </table>
                        </section>
                        <div class="registros" id="agrega-busqueda">
                            <table class="table table-striped table-condensed table-hover">
                                <tr>
                                    <th width="550">APELLIDOS Y NOMBRES</th>
                                    <th width="80">CÉDULA</th>
                                    <th width="300">FECHA INGRESO</th>
                                    <th width="400">CARGO</th>
                                    <th width="50">ÁREA</th>
                                    <th width="50">SUELDO</th>
                                    <th width="30">PAGAR</th>
                                    <th width="30">RECIBO</th>
                                </tr>
                                <?php 
                                $registro = mysql_query("SELECT * FROM trab_qui ORDER BY apellidos ASC ")or die("No Conexion");
                                while($registro2 = mysql_fetch_array($registro)){
                                    $codigo=$registro2['cedula'];
                                    echo '<tr>
                                            <td width="750">'.$registro2['apellidos']." ".$registro2['nombres'].'</td>
                                            <td width="80">'.$registro2['cedula'].'</td>
                                            <td width="100">'.fechaNormal($registro2['fecha']).'</td>
                                            <td width="350">'.$registro2['cargo'].'</td>
                                            <td width="100">'.$registro2['area'].'</td>
                                            <td width="100">'.$registro2['sueldo'].'</td>

                                          <td width="30"><a href="javascript:pagarNomina('.$codigo.');"  class="glyphicon glyphicon-pencil"></a> </td> 
                                            <td width="30"><a href="javascript:reportePDF('.$codigo.');" class="glyphicon glyphicon-file"></a> </td>
                                        </tr>';     
                                }
                                ?>
                            </table>
                        </div>
                        <br><br><br>
                    <?php
                }
                else{
                    ?>
                    <div id="nomina">
                    <h2 class="lgrande center negro" >NÓMINA CARTONAJES GRANICS</h2>
                    <br>
                
                    <form class="form espacio-abajo" role="form" method="post" action="module_nomina/nomina_b.php">
                        <div class="form-group icono ">
                            <label for="cargoN">NÓMINA SEMANAL:</label>
                            <input type="radio" name="nomina" value="semanal" >
                            <br>
                        </div>
                        <div class="form-group icono ">
                            <label for="cargoN">NÓMINA QUINCENAL:</label>
                            <input type="radio" name="nomina" value="quincenal">
                        </div>
                        <div class="form-group icono ">
                            <tr>
                                <td width="150">FECHA INICIO:<input id="#bd-desde" type="date" name="fi"/></td><br><br>
                           </tr>
                           <!-- <input type="text" readonly value="<?php $fecha //= date("d/M/y"; echo $fecha;?>" -->
                            <tr>
                                <td width="150">FECHA FIN:<input type="date" id="bd-hasta" name="ff"/></td>
                            </tr>
                        </div>
                        <div>
                            <button type="submit" id="enviar" name="actualizar" class="btn btn-primary">ENVIAR</button> 
                        </div>          
                        <br><br>
                    </form>
                    <br><br>

                </div>  
                <br><br>
                <?php } ?>
        <!-- MODAL PARA EL REGISTRO DE TRABAJADORES NUEVOS-->
        <div class="modal fade" id="nuevo_ingreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel2"><b>REGISTRAR UN TRABAJADOR NUEVO</b></h4>
                    </div>
                    <form id="formulario2" class="formulario" onsubmit="return ingresarTrabajador();" >
                        <div class="modal-body">
                            <table  border="0" width="100%">                            
                                 <tr>
                                    <td ><label for="nombres">PROCESO: </label></td>
                                    <td><input type="text" required="required" readonly="readonly" id="proceso" style="background: gray;" name="pro"/></td>

                                </tr>
                                <tr>                        
                                    <td ><label for="nombres">CÉDULA: </label></td>
                                    <td><input type="text" id="cedula" required="required" name="cedula" placeholder='12345678' maxlength="100"/></td>
                                </tr>
                                <tr>
                                    <td><label for="nombres">NOMBRES:</label></td>
                                    <td><input type="text" name="nombres" style="text-transform:uppercase" placeholder='PRIMERO SEGUNDO' id="nombres" required></td>
                                </tr>
                                <tr>
                                    <td><label for="apellidos">APELLIDOS:</label></td>
                                    <td><input type="text" style="text-transform:uppercase" name="apellidos" id="apellidos" placeholder='PRIMERO SEGUNDO' required></td>
                                </tr>
                                <tr>
                                    <td><label for="fecha">FECHA DE NACIMIENTO</label></td>
                                    <td><input name="fechaN" type="date" id="fechaN" required></td>
                                </tr>
                                <tr>
                                    <td><label for="cargo">CARGO</label></td>
                                    <td><input name="cargo" type="text" id="cargo" style="text-transform:uppercase" required></td>
                                </tr>
                                <tr>
                                    <td><label for="area">ÁREA DE TRABAJO</label></td>
                                    <td>
                                        <select name="area" id="area" class="area">
                                            <option value="">SELECCIONE</option>
                                            <option value="PRODUCCIÓN">PRODUCCIÓN</option>
                                            <option value="ALMACEN">ALMACEN</option>
                                            <option value="LIMPIEZA">LIMPIEZA</option>
                                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                        </select>
                                    </td>
                                 </tr>
                                  <tr>
                                    <td><label for="area">NÓMINA</label></td>
                                    <td>
                                        <select name="nomina">
                                            <option value="">SELECCIONE</option>
                                            <option value="SEMANAL">SEMANAL</option>
                                            <option value="QUINCENAL">QUINCENAL</option>
                                           
                                        </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><label for="sueldo">SUELDO MENSUAL</label></td>
                                    <td><input name="sueldo"placeholder="00.00" type="number" step="any" id="sueldo" required></td>
                                </tr>
                                <tr>
                                    <td><label for="fecha">FECHA DE INGRESO</label></td>
                                    <td><input name="fecha" type="date" id="fecha" required></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2">
                                        <div id="mensaje2"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="modal-footer">
                        
                            <input type="submit" value="REGISTRAR" class="btn btn-success" id="register"/>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!-- MODAL PARA RECIBOS DE PAGO-->
        <div class="modal fade" id="pagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel"><b> RECIBO DE PAGO DE: </b></h4>
                    </div>
                    <form id="formulario" class="formulario" onsubmit="return RegistrarPago();">
                        <div class="modal-body">
                            <table border="0" width="100%">
                                                     
                                 <tr>
                                    <td><input type="text" required="required" readonly="readonly" style="background: gray;" id="pro" name="pro"/></td>
                                    <td ><input type="text" required="required" readonly="readonly" style="background: gray;" id="sueld" name="sueld"/></td>
                                </tr>
                                                                         
                                <tr>
                                    <td class="negro btn btn-primary">ASIGNACIONES </td>
                                </tr>
                                <tr>
                                    <td><input type="number"  placeholder="HORAS EXTRAS DIURNOS FERIADOS" name="hedf" min="0"/></td>
                                    <td><input type="number"  placeholder="HORAS EXTRAS NOCTURNAS FERIADOS" name="henf" min="0"/></td>
                               </tr>
                               
                                <tr>
                                    <td><input type="number" placeholder="HORAS EXTRAS DIURNOS" name="hed" min="0"/></td>
                                    <td><input type="number" placeholder="HORAS EXTRAS NOCTURNAS"  name="hen" min="0"/></td>
                                </tr>
                          
                                <tr>
                                    <td><input type="number" placeholder="DÍAS BONO DE ASISTENCIA"  name="dba" min="0"/></td>
                                    <td><input type="number"  placeholder="HORAS BONO NOCTURNO" name="hbn" min="0"/></td>
                                </tr>
                                <tr>
                                    <td><input type="number" placeholder="HORAS DOMINGOS"  name="hdomingo" min="0"/></td>
                                    <td></td>
                                </tr>
                                  <tr>
                                    <td><input type="number" placeholder="DÍA COMPENSATORIO"  name="dc" min="0"/></td>
                                    <td><input type="number"  placeholder="DÍAS DE REPOSO" name="dr" Min="0"/></td>
                                </tr>
                                
                                <tr>
                                    <td class="negro btn btn-warning">DEDUCCIONES </td>
                                </tr>
                                
                                <tr>
                                     <td><input type="number"  placeholder="PRESTAMO PERSONAL" name="pp" /></td>
                                    <td><input type="number" placeholder="OTRAS DEDUCCIONES" name="od" /></td>
                                </tr>
                                <tr>
                                     <td><input type="number"  placeholder="NÚMERO DE INAISTENCIAS" name="ni"min="0"/></td>
                                    <td><input type="number" placeholder="DESCUENTO DE AUSENCIA" name="da" min="0"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                                </tr> 
                                <tr>
                                    <td colspan="2">
                                        <div id="mensaje"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    
                        <div class="modal-footer">
                            <input type="submit" value="REGISTRAR PAGO" class="btn btn-warning"  id="edi"/>
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
