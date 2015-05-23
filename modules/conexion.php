<?php 
	// conexion a la base de dato
	
	
	mysql_connect("localhost","root","e19725326r") or die("No se ha podido conectar al servidor de la base de dato");

	mysql_select_db(granics) or die("No se ha podido conectar a la base de dato");

	//mysql_connect("mysql1.000webhost.com","a4283423_root","Cart0naj3s14") or die("No se ha podido conectar al servidor de la base de dato");

	//mysql_select_db(a4283423_granics) or die("No se ha podido conectar a la base de dato");

	function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
	}

 ?>

