<?php 
	session_start();
	include('../../modules/conexion.php');

	$_SESSION['nomina']= $_POST['nomina'];
	$_SESSION['fi']= $_POST['fi'];
	$_SESSION['ff']= $_POST['ff'];

	
	if ($_SESSION['nomina']) {
		?>				
			<script type="text/javascript">	
				window.location = "../nomina.php";
			</script>
		<?php
	}
	else {

		?>				
			<script type="text/javascript">	
				alert("Debes Seleccionar una Nomina")
				window.location = "../nomina.php";
			</script>
		<?php
	}

 ?>