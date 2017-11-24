$(document).ready(function() {

    $('#btn_ingresar_usuario').on('click', function() {
        $('#form-ingresar-usuario').validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                usuario: {
                    required: true,
                    minlength: 3,
                    maxlength: 45,
                    remote: {
                        url: 'aplication/enviar_usuario_valido.php',
                        type: "post"
                    }
                },
                clave: {
                    required: true,
                    minlength: 4,
                    maxlength: 150
                },
                confirm_clave: {
                    required: true,
                    minlength: 4,
                    maxlength: 150,
                    equalTo: '#clave'
                },
                pregunta: {
                    required: true,
                    minlength: 1,
                    maxlength: 254
                },
                respuesta: {
                    required: true,
                    minlength: 1,
                    maxlength: 254
                }
            },
            messages: {
                nombre: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 3',
                    maxlength: 'El número maximo de caracteres es 100'

                },
                usuario: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 3',
                    maxlength: 'El número maximo de caracteres es 45',
                    remote: 'Este usuario ya se encuentra registrado.'
                },
                clave: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 4',
                    maxlength: 'El número maximo de caracteres es 150'
                },
                confirm_clave: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 4',
                    maxlength: 'El número maximo de caracteres es 150',
                    equalTo: 'Las claves no coinciden'
                },
                pregunta: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 1',
                    maxlength: 'El número maximo de caracteres es 254'
                },
                respuesta: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 1',
                    maxlength: 'El número maximo de caracteres es 254'
                }
            }
        });
    });




    $("#btn_actualizar_usuario").on("click", function() {
        $("#form-actualizar-usuario").validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },

                pregunta: {
                    required: true,
                    minlength: 1,
                    maxlength: 254
                },
                respuesta: {
                    required: true,
                    minlength: 1,
                    maxlength: 254
                }
            },
            messages: {
                nombre: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 3',
                    maxlength: 'El número maximo de caracteres es 100'
                },
                pregunta: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 1',
                    maxlength: 'El número maximo de caracteres es 254'
                },
                respuesta: {
                    required: 'Este campo es obligatorio',
                    minlength: 'El número minimo de caracteres es 1',
                    maxlength: 'El número maximo de caracteres es 254'
                }
            }
        });
    });

});