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
                
  				<li ><a href="../modules/cerrar.php">Salir</a>
			
        	</ul>
        </div>
        <br><br>
            <section>
                <table border="0" align="center">
                    <tr>
                        <td width="500" class="rojo icono">INGRESA CEDULA O NOMBRE DE TRABAJADOR</td>
                        <td width="200"><input type="text" style="text-transform:uppercase" placeholder="Buscar Trabajador" id="bs-trabajador"/></td>
                    </tr>
                </table>
            </section>
                    <div class="registros" id="agrega-busqueda">
                       
                    </div>
                    <br><br><br>

        <!-- MODAL PARA ACTUALIZAR TRABAJADORES -->
        <div class="modal fade" id="actualizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel2"><b>ACTUAALIZACIÓN DE DATOS</b></h4>
                    </div>
                    <form id="formularioA" class="formulario" onsubmit="return ingresarTrabajador();" >
                        <div class="modal-body">
                            <table  border="0" width="100%">                            
                                 <tr>
                                    <td ><label for="nombres">PROCESO: </label></td>
                                    <td><input type="text" required="required" readonly="readonly" id="pro" style="background: green;" name="pro"/></td>

                                </tr>
                                <tr>                        
                                    <td ><label for="nombres">CÉDULA: </label></td>
                                    <td><input type="text" id="cedula" required="required" readonly="readonly" style="background: gray;" name="cedula" placeholder='12345678' maxlength="100"/></td>
                                </tr>
                                <tr>
                                    <td><label for="nombres">TRABAJADOR:</label></td>
                                    <td><input type="text" name="nombres"  readonly="readonly" style="background: gray;" id="nombres" required></td>
                                </tr>
                               
                                <tr>
                                    <td><label for="cargo">CARGO</label></td>
                                    <td><input name="cargo" type="text" id="cargo" style="text-transform:uppercase" required></td>
                                </tr>
                               
                                 <tr>
                                    <td><label for="sueldo">SUELDO MENSUAL</label></td>
                                    <td><input name="sueldo"placeholder="00.00" type="number" step="any" id="sueldo" required></td>
                                </tr>
                            
                                
                                <tr>
                                    <td colspan="2">
                                        <div id="mensaje2"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="modal-footer">
                        
                            <input type="submit" value="ACTUALIZAR" class="btn btn-success" id="register"/>
                            <input type="submit" value="ELIMINAR" class="btn btn-danger" id="eliminar"/>
                            
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
