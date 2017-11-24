$( document ).ready(function() {
	
		$('#btn_ingresar_productor').on('click', function(){
			$('#form-ingresar-productor').validate({
				rules:{
					nombre_empresa_prod: {
						required: true,
						minlength: 10,
						maxlength: 100
					},
					nombre_empresa_prod: {
						required: true,
						minlength: 3,
						maxlength: 45,
						remote: {
							url: 'aplication/enviar_nombre_empresa_productor_valido.php',
							type: "post"
						}
					},
					rif_prod: {
						required: true,
						minlength: 10,
						maxlength: 20
					},
					telefono_prod: {
						required: true,
						minlength: 10,
						maxlength: 15
					},
					direccion_prod: {
						required: true,
						minlength: 10,
						maxlength: 254
					}
					
				},
				messages:{
					nombre_empresa_prod:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 100'
					},
					rif_prod:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 20'
					},
					telefono_prod: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 15'
					},
					direccion_prod: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 254'
					}
				}
			});
		});
	
	
		
	
		$("#btn_actualizar_productor").on("click", function(){
			$("#form-actualizar-productor").validate({
				rules:{
					nombre_empresa_prod: {
						required: true,
						minlength: 10,
						maxlength: 100
					},
					telefono_prod: {
						required: true,
						minlength: 10,
						maxlength: 15
					},
					direccion_prod: {
						required: true,
						minlength: 10,
						maxlength: 254
					}
				},
				messages:{
					nombre_empresa_prod:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 100'
					},
					telefono_prod: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 15'
					},
					direccion_prod: {
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 254'
					}
				}
			});
		});
		
	});
	
	