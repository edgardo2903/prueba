<?php 
	session_start();
	include('../../modules/conexion.php');

	$_SESSION['nomina']= "";
		?>				
			<script type="text/javascript">	
				window.location = "../nomina.php";
			</script>
	