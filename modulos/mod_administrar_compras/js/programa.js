$(document).ready(function () {
	//Cargamos el ajax para traer los datos de la base de datos

	$.ajax({
		type: 'POST',
		url: 'aplication/cargar_proveedor.php'
		
		})
		.done(function (Lista_proveedores) {
			/* console.log(Lista_proveedores) */
			$('#prov_select').html(Lista_proveedores);
		})
		.fail(function () {
			console.log('Hubo un error al cargar la lista de Proveedores.')
		})
	//Fin de la carga del ajax

	//Inico del evento del select #prov_select
	$('#prov_select').on('change', function () {
		var id = $('#prov_select').val();
		if (id == 0) {
			$("#inpRif").removeClass("col-md-12");
			$("#inpRif").addClass("col-md-9");
			$('#divPreRif').show();
		} else {
			$("#inpRif").removeClass("col-md-9");
			$("#inpRif").addClass("col-md-12");
			$('#divPreRif').hide();
		}
		//me trae los registros por id
		$.ajax({
				type: 'POST',
				url: 'aplication/cargar_proveedor_id.php',
				data: {
					'id': id
				}
			})
			.done(function (Lista_proveedor) {
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
				/* console.log(proveedor.data['nombre_prov']) */
			})
			.fail(function () {
				console.log('Hubo un error al cargar la lista de Proveedores.')
			})
	})
	//Fin del evento del select #prov_select
	
	//
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
	//

	// letras campo
	$('#monto_total_compra').keyup(function () {
		this.value = this.value.replace(/[^0-9.]/g, '');
	});

	$("#monto_total_compra").focus(function () {
		var PrecioUnitario = $('#precio_unit').val(),
			Cantidad = $('#cantidad').val(),
			monto_total_compra = '';

		monto_total_compra = parseFloat(PrecioUnitario) * parseFloat(Cantidad);
		$('#monto_total_compra').val(monto_total_compra.toFixed(2));

	})
	//

	//
	$('#precio_unit').keyup(function () {
		this.value = this.value.replace(/[^0-9.]/g, '');
	});

	$("#precio_unit").focusout(function () {
		var PrecioUnitario = $('#precio_unit').val();
		if (PrecioUnitario) {
			PrecioUnitario = parseFloat(PrecioUnitario);
			$('#precio_unit').val(PrecioUnitario.toFixed(2));
		} else {
			PrecioUnitario = 0;
			$('#precio_unit').val(PrecioUnitario.toFixed(2));
		}
	})
	//

	//
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

	//Funcion para utilizar expresiones regulares
	jQuery.validator.addMethod("expresion", function (value, element, param) {
		if (this.optional(element)) {
			return true;
		}
		if (typeof param === 'string') {
			param = new RegExp('^(?:' + param + ')$');
		}
		return param.test(value);
	}, "Invalid format.");
	//Fin de funcion para expreciones regulares

	//Comienso de validacion del formulario #form-ingresar-compras
	$('#btn_ingresar_compras').on('click', function () {
		$('#form-ingresar-compras').validate({
			rules: {
				nombre_prov: {
					required: true,
					minlength: 2,
					maxlength: 100,
					/* digits: true, */
					expresion: /^[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑ\'\"\s]+$/
				},
				rif_prov: {
					required: true,
					minlength: 6,
					maxlength: 20
				},
				telefono_prov: {
					required: true,
					minlength: 10,
					maxlength: 15,
					expresion: /^[0-9-()+]{3,20}/
				},
				direccion_prov: {
					required: true,
					minlength: 3,
					maxlength: 254
				},
				num_factura: {
					required: true,
					minlength: 3,
					maxlength: 45
				},
				producto: {
					required: true,
					minlength: 3,
					maxlength: 100
				},
				precio_unit: {
					required: true,
					maxlength: 20,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				},
				precio_venta: {
					required: true,
					minlength: 1,
					maxlength: 13,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				},
				cantidad: {
					required: true,
					minlength: 1,
					maxlength: 13,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				},
				monto_total_compra: {
					required: true,
					minlength: 1,
					maxlength: 13,
					expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
				}
			},
			messages: {
				nombre_prov: {
					required: 'El campo Nombre es Obligatorio.',
					minlength: 'Debe contener un minimo de 2 caracteres.',
					maxlength: 'Debe contener un maximo de 100 caracteres.',
					expresion: 'Solo debe contener caracteres latinos'
				},
				rif_prov: {
					required: 'El campo Rif es Obligatorio.',
					minlength: 'Debe contener un minimo de 6 caracteres.',
					maxlength: 'Debe contener un maximo de 20 caracteres.'
				},
				telefono_prov: {
					required: 'El campo Telefono es Obligatorio.',
					minlength: 'Debe contener un minimo de 10 caracteres.',
					maxlength: 'Debe contener un maximo de 15 caracteres.',
					expresion: 'El número de telefono tiene un formato invalido.'
				},
				direccion_prov: {
					required: 'El campo dirección es Obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 254 caracteres.'
				},
				num_factura: {
					required: 'El campo número de factura es Obligatorio.',
					minlength: 'Debe contener un minimo de 3 caracteres.',
					maxlength: 'Debe contener un maximo de 45 caracteres.'
				},
				producto: {
					required: 'El campo producto es Obligatorio.',
					minlength: 'Debe contener un minimo de 1 caracteres.',
					maxlength: 'Debe contener un maximo de 100 caracteres.'
				},
				precio_unit: {
					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 1 caracteres.',
					maxlength: 'Debe contener un maximo de 13 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				},
				precio_venta: {
					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 1 caracteres.',
					maxlength: 'Debe contener un maximo de 13 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				},
				cantidad: {
					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 1 caracteres.',
					maxlength: 'Debe contener un maximo de 13 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				},
				monto_total_compra: {
					required: 'Este campo es obligatorio.',
					minlength: 'Debe contener un minimo de 1 caracteres.',
					maxlength: 'Debe contener un maximo de 13 caracteres.',
					expresion: 'Solo debe contener números enteros o decimales'
				}
			}
		});
	});
	//Fin de Validacion del formulario #form-ingresar-compras
})