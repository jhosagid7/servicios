$(document).ready(function(){
	//Cargamos el ajax para traer los datos de la base de datos
	/* alert('hola') */
	$.ajax({
		type: 'POST',
		url: 'aplication/cargar_proveedor.php'/* ,
		data: {'peticion' : 'cargar_proveedor'} */
	})
	.done(function(Lista_proveedores){
		/* console.log(Lista_proveedores) */
		$('#prov_select').html(Lista_proveedores);
	})
	.fail(function(){
		console.log('Hubo un error al cargar la lista de Proveedores.')
	})

	//cuando cambie el valor
	$('#prov_select').on('change', function(){
		var id = $('#prov_select').val();
		if(id == 0){
			$("#inpRif").removeClass("col-md-12");
			$("#inpRif").addClass("col-md-9");
			$('#divPreRif').show();
		}else{
			$("#inpRif").removeClass("col-md-9");
			$("#inpRif").addClass("col-md-12");
			$('#divPreRif').hide();
		}
		
		
		/* alert(id) */
		$.ajax({
			type: 'POST',
			url: 'aplication/cargar_proveedor_id.php',
			data: {'id_proveedor' : id}
		})
		.done(function(Lista_proveedor){
			$('#nombre_prov').val('');
			
			
			$('#rif_prov').val('');
			$('#telefono_prov').val('');
			$('#direccion_prov').val('');
			console.log(Lista_proveedor)

			var proveedor = JSON.parse(Lista_proveedor);
			
			
			$('#nombre_prov').val(proveedor.data['nombre_prov']);
			$('#rif_prov').val(proveedor.data['nombre_prov']);
			$('#rif_prov').val(proveedor.data['rif_prov']);
			$('#telefono_prov').val(proveedor.data['telefono_prov']);
			$('#direccion_prov').val(proveedor.data['direccion_prov']);
			console.log(proveedor.data['nombre_prov'])
		})
		.fail(function(){
			console.log('Hubo un error al cargar la lista de Proveedores.')
		})
	})
})