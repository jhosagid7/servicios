$(document).ready(function () {
	//Cargamos el ajax para traer los datos de la base de datos
	/* alert('hola') */
	$.ajax({
			type: 'POST',
			url: 'aplication/cargar_productores.php'
			/* ,
					data: {'peticion' : 'cargar_proveedor'} */
		})
		.done(function (Lista_productores) {
			/* console.log(Lista_proveedores) */
			$('#prod_select').html(Lista_productores);
		})
		.fail(function () {
			console.log('Hubo un error al cargar la lista de Productores.')
		})

	//cuando cambie el valor
	$('#prod_select').on('change', function () {
		var id = $('#prod_select').val();
		if (id == 0) {
			$("#inpRif").removeClass("col-md-12");
			$("#inpRif").addClass("col-md-9");
			$('#divPreRif').show();
		} else {
			$("#inpRif").removeClass("col-md-9");
			$("#inpRif").addClass("col-md-12");
			$('#divPreRif').hide();
		}


		/* alert(id) */
		$.ajax({
				type: 'POST',
				url: 'aplication/cargar_productor_id.php',
				data: {
					'id': id
				}
			})
			.done(function (Lista_productor) {
				$('#nombre_empresa_prod').val('');
				$('#rif_prod').val('');
				$('#telefono_prod').val('');
				$('#direccion_prod').val('');
				console.log(Lista_productor)

				var productor = JSON.parse(Lista_productor);

				$('#nombre_empresa_prod').val(productor.data['nombre_empresa_prod']);
				$('#rif_prod').val(productor.data['rif_prod']);
				$('#telefono_prod').val(productor.data['telefono_prod']);
				$('#direccion_prod').val(productor.data['direccion_prod']);
				/* console.log(productor.data['nombre_prov']) */
			})
			.fail(function () {
				console.log('Hubo un error al cargar la lista de Productores.')
			})
	})

	$.ajax({
		type: 'POST',
		url: 'aplication/cargar_producto.php'
	})
	.done(function (Listar_productos) {
		console.log('listo');
		$('#produ_select').html(Listar_productos);
	})
	.fail(function () {
		console.log('error');
	})
//#################################################################################
	

	$('#produ_select').on('change', function () {
		var id = $('#produ_select').val();

		$.ajax({
			type: 'POST',
			url: 'aplication/cargar_producto_id.php',
			data: {
				'id': id
			}
		})
		.done(function (Listar_producto) {
			$('#producto').val('');
			var producto = JSON.parse(Listar_producto);

			$('#producto').val(producto.data['producto']);
		})
		.fail(function () {
			console.log('Hubo un error al cargar la lista de Producto.' + Listar_producto)
		})
	})

	$('#monto_total_venta').keyup(function () {
		this.value = this.value.replace(/[^0-9.]/g, '');
	});

	$("#monto_total_venta").focus(function () {
		var PrecioUnitario = $('#precio_unit').val(), 
			Cantidad = $('#cantidad').val(),
			monto_total_venta = '';

		monto_total_venta = parseFloat(PrecioUnitario) * parseFloat(Cantidad);
		$('#monto_total_venta').val(monto_total_venta.toFixed(2));

	})

	$('#precio_unit').keyup(function () {
		this.value = this.value.replace(/[^0-9.]/g, '');
	});

	$("#precio_unit").focusout(function () {
		var PrecioUnitario = $('#precio_unit').val();
		if (PrecioUnitario){
			PrecioUnitario = parseFloat(PrecioUnitario);
			$('#precio_unit').val(PrecioUnitario.toFixed(2));
		} else {
			PrecioUnitario = 0;
			$('#precio_unit').val(PrecioUnitario.toFixed(2));
		}
	})

	$('#precio_venta').keyup(function () {
		this.value = this.value.replace(/[^0-9.]/g, '');
	});

	$("#precio_venta").focusout(function () {
		var PrecioVenta = $('#precio_venta').val();
		if (PrecioVenta) {
			PrecioVenta = parseFloat(PrecioVenta);
			$('#precio_venta').val(PrecioVenta.toFixed(2));
		} else {
			PrecioVenta = 0;
			$('#precio_venta').val(PrecioVenta.toFixed(2));
		}
	})

	$('#cantidad').keyup(function () {
		this.value = this.value.replace(/[^0-9.]/g, '');
	});

	$("#cantidad").focusout(function () {
		var Cantidad = $('#cantidad').val();
		if (Cantidad) {
			Cantidad = parseFloat(Cantidad);
			$('#cantidad').val(Cantidad.toFixed(2));
		} else {
			Cantidad = 0;
			$('#cantidad').val(Cantidad.toFixed(2));
		}
	})

	

	

	
	jQuery.validator.addMethod("expresion", function (value, element, param) {
		if (this.optional(element)) {
			return true;
		}
		if (typeof param === 'string') {
			param = new RegExp('^(?:' + param + ')$');
		}
		return param.test(value);
	}, "Invalid format.");

	$('#btn_ingresar_ventas').on('click', function () {
		$('#form-ingresar-ventas').validate({
			rules:
			{
				nombre_empresa_prod: {
					required: true,
					minlength: 2,
					maxlength: 100,
					/* digits: true, */
					expresion: /^[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑ\'\"\s]+$/,
				},
				rif_prov: {
					required: true,

					minlength: 3,
					maxlength: 80,
					//expresion: /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
				},
				telefono_prov: {
					required: true,

					minlength: 3,
					maxlength: 80,
					expresion: /^[0-9-()+]{3,20}/
				},
				direccion_prov: {
					required: true,

					minlength: 3,
					maxlength: 80,
					//expresion: /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
				},
				num_factura: {
					required: true,

					minlength: 3,
					maxlength: 80,
					//expresion: /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
				},
				producto: {
					required: true,

					minlength: 3,
					maxlength: 80,
					//expresion: /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
				},
				precio_unit: {
					required: true,
					maxlength: 20,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				},
				precio_venta: {
					required: true,
					maxlength: 20,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				},
				cantidad: {
					required: true,

					minlength: 3,
					maxlength: 80,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				},
				monto_total_compra: {
					required: true,

					minlength: 3,
					maxlength: 80,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				}
			},
			messages:
			{
				nombre_prov: {
					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 2 caracteres.',
					maxlength: 'Debe contener un maximo de 4 caracteres.',
					/* digits: 'solo números', */
					expresion: 'Solo deben ser caracteres latinos'
				},
				rif_prov: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					//expresion: 'solo lo que yo quiera'
				},
				telefono_prov: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					expresion: 'solo lo que yo quiera'
				},
				direccion_prov: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					//expresion: ''
				},
				num_factura: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					//expresion: 'solo lo que yo quiera'
				},
				producto: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					//expresion: 'solo lo que yo quiera'
				},
				precio_unit: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				},
				precio_venta: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				},
				cantidad: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				},
				monto_total_compra: {

					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 80 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				}
			}
		});
	});
})