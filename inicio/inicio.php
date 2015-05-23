<!DOCTYPE html>
<html>
	<?php
		session_start();
        include('../modules/conexion.php');
		if (isset($_SESSION['username'])) {
			if ($_SESSION['username'] == 'Usuario') {
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
        
        <title>Inicio</title>	   
        	   
        	    <link rel="stylesheet" href="../css/styles2.css">	

        	    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        	   
        	    <script >
        	    $(document).ready(function(){
        	    	
        	    });

        	    </script>

    </head>
   
    <body>
        <div class="encabezado">
        	<h1 class="let_link float-center negro">SISTEMA DE ADMINISTRACION <br>DE ALMACEN - NOMINA</h1>
        	<h3 class="margen-cort lgrande float-center rojo"><span><?php echo $_SESSION['username'];?></span></h3>
        </div>
        <div class="container-fluid">
        <div class="row-fluid">
                
        
        <div id="menu">
   			<ul class="no_lista text-center inline-block">
            	<li class="active "><a class="glyphicon glyphicon-home"  href='module_nomina/refresh.php'><span> INICIO</span></a>
            	<li ><a href='module_nomina/refresh.php'><span>Nómina</span></a>
            		<ul>
					    <li><a href='sub_html/#'><span>SEMANAL</span></a>
					    <li><a href='sub_html/#'><span>QUINCENAL</span></a>
					            <!--*<ul>
					               <li><a href='#'><span>Sub Product</span></a></li>
					               <li class='last'><a href='#'><span>Sub Product</span></a></li>
					            </ul>***-->
					    </li>
					    <li><a href='sub_html/#'><span>TRABAJADOR</span></a></li>
					    
					</ul>
            	<li ><a href='module_nomina/refresh.php'><span>ALMACEN</span></a>
            		<ul>
            			<li><a href='sub_html/#'><span>PRODUCTOS</span></a></li>
					    <li><a href='sub_html/#'><span>SALIDA</span></a>
					    <li><a href='sub_html/#'><span>ENTRADAS</span></a></li>
					            
					</ul>

                
  				<li ><a href="../modules/cerrar.php">Salir</a>
			
        	</ul>
        </div>
        <br><br>
	           
	   <div id="fond" >
	   	
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
