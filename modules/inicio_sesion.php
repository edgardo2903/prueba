<?php
	session_start();
	include('conexion.php');

	//Recibimos datos de usuario
	
	$usuario = $_POST["usuario"];
	$contrasena = $_POST["contrasena"];

	$validacion_user = mysql_query("SELECT user, password from usuario where user like '". $usuario."'");
	$user = mysql_fetch_row($validacion_user); //El primer dato seria [0]

	if ($user[0] == $usuario) {		
		
		if ($user[1]==$contrasena) {
			
			if ($user[0] == 'almacen'){
				$_SESSION['username'] = 'Almacen';
				?>
				<script type="text/javascript">
					window.location = "../almacen/almacen.php";				
				</script>
				<?php
			}
			elseif ($user[0] == 'produccion') {
				$_SESSION['username'] = 'Produccion';
				?>
				<script type="text/javascript">
					window.location = "../php/consultas.php";				
				</script>
				<?php
			}
			elseif ($user[0] == 'nomina') {
				$_SESSION['username'] = 'Nomina';
				?>
				<script type="text/javascript">
					window.location = "../nomina/nomina.php";				
				</script>
				<?php
			}
			elseif ($user[0] == 'usuario') {
				$_SESSION['username'] = 'Usuario';
				?>
				<script type="text/javascript">
					window.location = "../inicio/inicio.php";				
				</script>
				<?php
			}
		
		}
		else{

			?>
			<script type="text/javascript">
				alert("Contrasena InValida")
				window.location = "../index.php";
			</script>
			<?php
		}
	}
	
	else{

		?>
		<script type="text/javascript">
			alert("Usuario no encontrado, Verifica tu usuario")
			window.location = "../index.php";
		</script>
		<?php
	}
	
?>