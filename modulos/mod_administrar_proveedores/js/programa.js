$( document ).ready(function() {
	
		$('#btn_ingresar_proveedor').on('click', function(){
			$('#form-ingresar-proveedor').validate({
				rules:{
					nombre_prov: {
						required: true,
						minlength: 10,
						maxlength: 100
					},
					rif_prov: {
						required: true,
						minlength: 10,
						maxlength: 20
					},
					telefono_prov: {
						required: true,
						minlength: 10,
						maxlength: 15
					},
					direccion_prov: {
						required: true,
						minlength: 10,
						maxlength: 254
					}
					
				},
				messages:{
					nombre_prov:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 100'
					},
					rif_prov:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 20'
					},
					telefono_prov: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 15'
					},
					direccion_prov: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 254'
					}
				}
			});
		});
	
	
		
	
		$("#actualizar_proveedor").on("click", function(){
			$("#form-actualizar-proveedor").validate({
				rules:{
					nombre: {
						required: true,
						minlength: 3,
						maxlength: 7
					},
					
					pregunta: {
						required: true,
						minlength: 3,
						maxlength: 7
					},
					respuesta: {
						required: true,
						minlength: 3,
						maxlength: 7
					}
				},
				messages:{
					nombre:{
						required: 'Este campo es lo mejor',
						minlength: 'El número minimo de caracteres es 3',
						maxlength: 'El número maximo de caracteres es 7'
					},
					pregunta:{
						required: 'Este campo es lo mejor',
						minlength: 'El número minimo de caracteres es 3',
						maxlength: 'El número maximo de caracteres es 7'
					},
					respuesta:{
						required: 'Este campo es lo mejor',
						minlength: 'El número minimo de caracteres es 3',
						maxlength: 'El número maximo de caracteres es 7'
					}
				}
			});
		});
		
	});
	
	