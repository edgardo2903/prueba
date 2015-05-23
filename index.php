<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8"> <!--Letra en español para acentos-->
		<meta name="viewport" content="width=device-widht, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet"  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">  <!-- Para enlazar CSS en linea-->
		<link rel="stylesheet" href="css/main.css"> <!-- Para enlazar CSS local-->
		<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'> <!-- Para enlazar tipo de letra en linea-->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="js/js1.js"></script>

		<title>Sistema</title>	   
	   
	    <link rel="stylesheet" href="css/styles2.css">	

	    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
	   
	    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	    <script src="js/script.js"></script>

				
	</head>
<!--
	<header>
		<div id="logo">			
		</div>	
	</header>-->
	<body id="todo">	
	<br>
		<div class="center blanco ">
			<h1 class="lgrande">SISTEMA DE ADMINISTRACION <br>DE ALMACEN - NOMINA</h1>
		</div>
		
		<div id="usuario">
			<form class="vistfont" role="form" method="post" action="modules/inicio_sesion.php">
					   					
				<br>
				<strong class='let_link' >INGRESAR AL SISTEMA</strong>
				<br><br>
				<TABLE class='ver'>
				
				<div class="form-group vistfont">
				<tr>						
					<th><label for="nombre">USUARIO:</label></th>
					<th><input type="text" id="nombre" name= "usuario" placeholder="Usuario/Departamento" required></th>
				</tr>
				</div>
				
					
				<div class="form-group vistfont">
				<tr>						
					<th><label for="password">CLAVE: </label></th>
					<th><input type="password"  name= "contrasena" id="password" placeholder="**********" required></th>
				</tr>
				</div>	
				</TABLE>
				<input type="submit" class="btn btn-primary" value="Entrar"><br><br>
											
			</form>

		</div><br>
		<div class="center">
			<strong> USUARIO: usuario</strong><br>
			<strong> CLAVE: usuario</strong><br>
			<br><br>
		</div>
		<div class="azules rojo center bordes_redondos">

			<strong> SISTEMA DESARROLLADO POR: ING. EDGAR NIEVES</strong><br>
			<strong> TELF: 04162416347 CORREO: edgardo.2903@gmail.com</strong><br>

		</div>
	</body>
</html>

