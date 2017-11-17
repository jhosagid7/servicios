$( document ).ready(function() {
	
		$('#btn_ingresar_empresa').on('click', function(){
			$('#form-ingresar-empresa').validate({
				rules:{
					nombre_emp: {
						required: true,
						minlength: 10,
						maxlength: 150
					},
					rif_emp: {
						required: true,
						minlength: 8,
						maxlength: 15
					},
					direccion_emp: {
						required: true,
						minlength: 10,
						maxlength: 254
					},
					telefono_emp: {
						required: true,
						minlength: 8,
						maxlength: 15
					},
					correo_emp: {
						required: true,
						minlength: 10,
						maxlength: 100
					}

				},
				messages:{
					nombre_emp:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 150'
					},
					rif_emp:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 8',
						maxlength: 'El número maximo de caracteres es 15'
					},
					direccion_emp: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 254'
					},
					telefono_emp: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 8',
						maxlength: 'El número maximo de caracteres es 15'
					},
					correo_emp:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 100'
					}
				}
			});
		});
	
	
		
	
		$("#actualizar_usuario").on("click", function(){
			$("#form-actualizar-usuario").validate({
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
	
	