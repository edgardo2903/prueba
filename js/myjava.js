$(function(){
	$('#bd-desde').on('change', function(){ // Para buscar por fechas "desde"
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var active = $('#active').val();

		var url = '../almacen/modules_almacen/busca_fechas.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta+'&active='+active,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){ // Para buscar por fechas "desde"
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var active = $('#active').val();
		var url = '../almacen/modules_almacen/busca_fechas.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta+'&active='+active,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#nuevo-producto').on('click',function(){ // Abre el modal para un nuevo Producto
		
		$('#formulario2')[0].reset();
		$('#proceso').val('PRODUCTO NUEVO');
		
		$('#nuevo_ingreso').modal({
			show:true,
			backdrop:'static'
		});

		
	});
	$('#nuevo-trabajador').on('click',function(){ // Abre el modal para un nuevo trabajador
		
		$('#formulario2')[0].reset();
		$('#proceso').val('NUEVO TRABAJADOR');
		
		$('#nuevo_ingreso').modal({
			show:true,
			backdrop:'static'
		});

		
	});
		
	$('#bs-prod').on('keyup',function(){ // Para Realizar la busqueda de Productos
		var dato = $('#bs-prod').val();
		var url = '../almacen/modules_almacen/busca_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	$('#bs-trab').on('keyup',function(){ // Para Realizar la busqueda de trabajador
		var dato = $('#bs-trab').val();
		var url = '../nomina/module_nomina/busqueda.php';
		var activo = $('#activo').val();
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato+'&activo='+activo,
		success: function(datos){
			$('#agrega-busqueda').html(datos);
		}
	});
	return false;
	});
	$('#bs-trabajador').on('keyup',function(){ // Para Realizar la busqueda de trabajador
		var dato = $('#bs-trabajador').val();
		var url = '../nomina/module_nomina/buscar.php';
	
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-busqueda').html(datos);
		}
	});
	return false;
	});

	$('#codg').on('keyup',function(){ // Para Verificar si el codigo ya esta registrado a la hora de agregar un nuevo producto
		var dato = $('#codg').val();
		var url = '../almacen/modules_almacen/verificar_cod.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(valores){
			var datos = eval(valores);
			if (datos[0]==dato) {
				$('#mensaje2').addClass('error').html('CÓDIGO YA SE ENUENTRA REGISTRADO ').show(200);
			}
			else {
				$('#mensaje2').addClass('error').html('Codigo ya esta Registrado ').hide();
			}
		}
	});
	return false;
	});
});


//Me la copie de la funcion agregarRegistros..!!
function RegistrarPago(){ // LLena o envia los datos al module de nomina que se encarga de registrar pagos
	if (true) {};
	var url = '../nomina/module_nomina/registrarpagos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro exitoso').show(300).delay(2500).hide(300);
			$(' #pagar ').fadeOut(2000);
			$(' #pagar ').modal('hide');
		}
	});
	return false;
}


//Me la copie de editarProduct
function pagarNomina(id){ //Abre el modal para pagar la nomina pasando la cedula como id del trabajador
	$('#formulario')[0].reset();
	var url = '../nomina/module_nomina/pagar.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#edi').show();
				$('#pro').val(datos[0]);
				$('#apel').val(datos[1]);
				$('#id-prod').val(id);
				$('#sueld').val(datos[3]);
				$('#pagar').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function actualizar(id){ //Actualizacion de trabajador y eliminacion si es el caso..!!
	$('#formularioA')[0].reset();
	var url = '../nomina/module_nomina/actualizaT.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#edi').show();
				$('#pro').val('ACTUALIZACION');
				$('#nombres').val(datos[0]);;
				$('#cedula').val(id);
				$('#sueld').val(datos[5]);
				$('#cargo').val(datos[4]);
				$('#actualizacion').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function reportePDF(id){
	var cedula = id;
	window.open('module_nomina/recibo_pdf.php?cedula='+cedula);
}

function constancia(cedula){
	var id = cedula;
	window.open('module_nomina/constancia_pdf.php?cedula='+id);
}

function busquedaPDF(){
	var producto = $('#bs-prod').val();
	var active = $('#active').val();
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('modules_almacen/busqueda.php?desde='+desde+'&hasta='+hasta+'&active='+active+'&producto='+producto);

}

function ingresarNuevo(){ // Pasa los datos al module ques se encarga de registrar un nuevo produco por 1ra vez
		
		var url = '../almacen/modules_almacen/entrada_producto.php';
		$.ajax({
			type:'POST',
			url:url,
			data:$('#formulario2').serialize(),
			success: function(registro){
				$('#formulario2')[0].reset();
				$('#agrega-registros').html(registro);
				$(' #nuevo_ingreso ').fadeOut(2000);
				$(' #nuevo_ingreso ').modal('hide');
				return false;
				
			}
		});
	
	return false;
}

function ingresarTrabajador(){ // Pasa los datos al module ques se encarga de registrar un nuevo produco por 1ra vez
		
		var url = '../nomina/module_nomina/ingresarT.php';
		$.ajax({
			type:'POST',
			url:url,
			data:$('#formulario2').serialize(),
			success: function(registro){
				$('#formulario2')[0].reset();
				$(' #nuevo_ingreso ').fadeOut(2000);
				$(' #nuevo_ingreso ').modal('hide');
				return false;
				
			}
		});
	
	return false;
}



function agregaRegistro(){ // se encarga de hacer las entradas o salidas
	if ( $('#pro').val() != 'SALIDA') { 
		var url = '../almacen/modules_almacen/entrada_producto.php';
		$.ajax({
			type:'POST',
			url:url,
			data:$('#formulario').serialize(),
			success: function(registro){
				$('#formulario')[0].reset();
				$('#mensaje').addClass('bien').html('Operación completada con exito').show(200).delay(2500).hide(200);
				$('#agrega-registros').html(registro);
				$(' #registra-producto ').fadeOut(2000);
				$(' #registra-producto ').modal('hide');
				return false;
				
			}
		});
	}
	else{
		var uno = $('#stock').val() - $('#cantidad').val();
		if (uno < 0) {
			$('#mensaje').addClass('error').html('No Hay suficiente '+$('#nombre').val()+" en el Almacen "+$('#stock').val()+" < "+$('#cantidad').val()).show().delay(2500).hide(200);
		}
		else{
			var url = '../almacen/modules_almacen/entrada_producto.php';
			$.ajax({
				type:'POST',
				url:url,
				data:$('#formulario').serialize(),
				success: function(registro){
					$('#formulario')[0].reset();
					$('#mensaje').addClass('bien').html('Operación completada con exito').show(200).delay(2500).hide(200);
					$('#agrega-registros').html(registro);
					$(' #registra-producto ').fadeOut(2000);
					$(' #registra-producto ').modal('hide');
					return false;
					
				}
			});
		};

		
	};
	return false;
}

function eliminarProducto(id){// No usado todavia pero es para eliminar
	var url = '../php/elimina_producto.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function selectProducto(id){ //llena los datos y muestra el formulario para salidas de productos
	$('#formulario')[0].reset();
	var url = '../almacen/modules_almacen/date_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				
				
				$('#destino').show();
				$('#destinotd').show();
				$('#costo').hide();
				$('#costotd').hide();
				$('#proveedor').hide();
				$('#proveedortd').hide();
				$('#factura').hide();
				$('#facturatd').hide();
				
				$('#pro').val('SALIDA');
				$('#id-prod').val(id);
				$('#nombre').val(datos[0]);
				$('#codigo').val(datos[1]);
				$('#categoria').val(datos[2]);
				$('#stock').val(datos[3]);
				$('#unidad').val(datos[4]);
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function ingresoProducto(id){ //llena los datos y muestra el formulario para Ingresos de productos
	$('#formulario')[0].reset();
	var url = '../almacen/modules_almacen/date_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').show();
				$('#edi').hide();
				$('#destino').hide();
				$('#costo').show();
				$('#destinotd').hide();
				$('#costotd').show();

				$('#proveedor').show();
				$('#proveedortd').show();
				$('#factura').show();
				$('#facturatd').show();

				$('#pro').val('INGRESAR');
				$('#id-prod').val(id);
				$('#nombre').val(datos[0]);
				$('#codigo').val(datos[1]);
				$('#categoria').val(datos[2]);
				$('#stock').val(datos[3]);
				$('#unidad').val(datos[4]);
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


