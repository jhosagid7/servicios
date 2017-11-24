$( document ).ready(function() {
	
		$('#btn_ingresar_proveedor').on('click', function(){
			$('#form-ingresar-proveedor').validate({
				rules:{
					nombre_prov: {
						required: true,
						minlength: 10,
						maxlength: 100
					},
					nombre_prov: {
						required: true,
						minlength: 3,
						maxlength: 45,
						remote: {
							url: 'aplication/enviar_nombre_proveedor_valido.php',
							type: "post"
						}
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
	
	
		
	
		$("#btn_actualizar_proveedor").on("click", function(){
			$("#form-actualizar-proveedor").validate({
				rules:{
					nombre_prov: {
						required: true,
						minlength: 3,
						maxlength: 7
					},
					
					telefono_prov: {
						required: true,
						minlength: 3,
						maxlength: 7
					},
					direccion_prov: {
						required: true,
						minlength: 3,
						maxlength: 7
					}
				},
				messages:{
					nombre_prov:{
						required: 'Este campo es obligatorio',
						minlength: 'El número minimo de caracteres es 10',
						maxlength: 'El número maximo de caracteres es 100'
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
		
	});
	
	