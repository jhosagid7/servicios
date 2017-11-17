$(document).ready(function() {
    var stock;
    //Cargamos el ajax para traer los datos de la base de datos
    /* alert('hola') */
    $.ajax({
            type: 'POST',
            url: 'aplication/cargar_productores.php'
                /* ,
                		data: {'peticion' : 'cargar_proveedor'} */
        })
        .done(function(Lista_productores) {
            /* console.log(Lista_proveedores) */
            $('#prod_select').html(Lista_productores);
        })
        .fail(function() {
            console.log('Hubo un error al cargar la lista de Productores.')
        })

    //cuando cambie el valor
    $('#prod_select').on('change', function() {
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
            .done(function(Lista_productor) {
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
            .fail(function() {
                console.log('Hubo un error al cargar la lista de Productores.')
            })
    })

    $.ajax({
            type: 'POST',
            url: 'aplication/cargar_producto.php'
        })
        .done(function(Listar_productos) {
            console.log('listo');
            $('#produ_select').html(Listar_productos);
        })
        .fail(function() {
            console.log('error');
        })
        //#################################################################################


    $('#produ_select').on('change', function() {
        var id = $('#produ_select').val();

        $.ajax({
                type: 'POST',
                url: 'aplication/cargar_producto_id.php',
                data: {
                    'id': id
                }
            })
            .done(function(Listar_producto) {
                $('#btn_ingresar_ventas').removeAttr("disabled");
                $('#mensaje_warning').hide();
                $('#mensaje_error').hide();
                $('#producto').val('');
                $('#precio_unit').val('');
                var producto = JSON.parse(Listar_producto),
                    limite_stock = producto.data['limite_stock'];
                stock = producto.data['stock'];
                //TODO: pendiente validar
                //alert(stock + ' ' + limite_stock);

                if (parseInt(stock) < parseInt(limite_stock)) {
                    if (parseInt(stock) == 0) {

                        $('#mensaje_error').show(120);
                        $('#mensaje_error').html('No hay producto para realizar la venta. El stock actual es: ' + parseInt(stock));
                        $('#btn_ingresar_ventas').attr('disabled', 'disabled');
                    } else {
                        $('#mensaje_warning').show(120);
                        $('#mensaje_warning').html('Ha exedido el limite maximo del stock. El stock actual es: ' + parseInt(stock));
                        $('#producto').val(producto.data['producto']);
                        $('#precio_unit').val(parseFloat(producto.data['precio_venta']).toFixed(2));
                    }

                } else {
                    $('#producto').val(producto.data['producto']);
                    $('#precio_unit').val(parseFloat(producto.data['precio_venta']).toFixed(2));
                }

            })
            .fail(function() {
                console.log('Hubo un error al cargar la lista de Producto.' + Listar_producto)
            })
    })

    $('#monto_total_venta').keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#monto_total_venta").focus(function() {
        var PrecioUnitario = $('#precio_unit').val(),
            Cantidad = $('#cantidad').val(),
            monto_total_venta = '';

        monto_total_venta = parseFloat(PrecioUnitario) * parseFloat(Cantidad);
        $('#monto_total_venta').val(monto_total_venta.toFixed(2));

    })

    $('#precio_unit').keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#precio_unit").focusout(function() {
        var PrecioUnitario = $('#precio_unit').val();
        if (PrecioUnitario) {
            PrecioUnitario = parseFloat(PrecioUnitario);
            $('#precio_unit').val(PrecioUnitario.toFixed(2));
        } else {
            PrecioUnitario = 0;
            $('#precio_unit').val(PrecioUnitario.toFixed(2));
        }
    })

    /* $('#precio_venta').keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#precio_venta").focusout(function() {
        var PrecioVenta = $('#precio_venta').val();
        if (PrecioVenta) {
            PrecioVenta = parseFloat(PrecioVenta);
            $('#precio_venta').val(PrecioVenta.toFixed(2));
        } else {
            PrecioVenta = 0;
            $('#precio_venta').val(PrecioVenta.toFixed(2));
        }
    }) */

    $('#cantidad').keyup(function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#cantidad").focusout(function() {
        $('#btn_ingresar_ventas').removeAttr("disabled");
        $('#mensaje_error_cantidad').hide();
        var Cantidad = $('#cantidad').val();
        if (Cantidad) {
            Cantidad = parseInt(Cantidad);
            if (Cantidad > stock) {
                $('#btn_ingresar_ventas').attr('disabled', 'disabled');
                $('#cantidad').val('').focus();
                $('#mensaje_error_cantidad').show();
                $('#mensaje_error_cantidad').html('el stock es: ' + stock + ' y la cantidad es: ' + Cantidad + ' No se puede exeder el limite de stock');
            }
            $('#cantidad').val(Cantidad);
        } else {
            Cantidad = 0;
            $('#cantidad').val(Cantidad);
        }
    })

    jQuery.validator.addMethod("expresion", function(value, element, param) {
        if (this.optional(element)) {
            return true;
        }
        if (typeof param === 'string') {
            param = new RegExp('^(?:' + param + ')$');
        }
        return param.test(value);
    }, "Invalid format.");

    $('#btn_ingresar_ventas').on('click', function() {
        $('#form-ingresar-ventas').validate({
            rules: {
                nombre_empresa_prod: {
                    required: true,
                    minlength: 20,
                    maxlength: 100,
                    /* digits: true, */
                    expresion: /^[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑ\'\"\s]+$/,
                },
                rif_prod: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                telefono_prod: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                    expresion: /^[0-9-()+]{3,20}/
                },
                direccion_prod: {
                    required: true,
                    minlength: 3,
                    maxlength: 254,
                },
                producto: {
                    required: true,
                    minlength: 3,
                    maxlength: 100,
                },
                precio_unit: {
                    required: true,
                    maxlength: 20,
                    expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
                },
                cantidad: {
                    required: true,
                    minlength: 1,
                    maxlength: 13,
                    expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
                },
                monto_total_venta: {
                    required: true,
                    minlength: 1,
                    maxlength: 13,
                    expresion: /[-+]?([0-9]*\.[0-9]+|[0-9]+)/
                }
            },
            messages: {
                nombre_empresa_prod: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 20 caracteres.',
                    maxlength: 'Debe contener un maximo de 100 caracteres.',
                    expresion: 'Solo deben ser caracteres latinos'
                },
                rif_prod: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 6 caracteres.',
                    maxlength: 'Debe contener un maximo de 20 caracteres.'
                },
                telefono_prod: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 10 caracteres.',
                    maxlength: 'Debe contener un maximo de 15 caracteres.',
                    expresion: 'El número de telefono tiene un formato invalido.'
                },
                direccion_prod: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 3 caracteres.',
                    maxlength: 'Debe contener un maximo de 254 caracteres.',
                },
                producto: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 1 caracteres.',
                    maxlength: 'Debe contener un maximo de 100 caracteres.',
                },
                precio_unit: {
                    required: 'Este campo es obligatorio.',
                    maxlength: 'Debe contener un maximo de 13 caracteres.',
                    expresion: 'Solo debe contener números enteros o decimales'
                },
                cantidad: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 1 caracter.',
                    maxlength: 'Debe contener un maximo de 13 caracteres.',
                    expresion: 'Solo debe contener números enteros o decimales'
                },
                monto_total_venta: {
                    required: 'Este campo es obligatorio.',
                    minlength: 'Debe contener un minimo de 1 caracter.',
                    maxlength: 'Debe contener un maximo de 13 caracteres.',
                    expresion: 'Solo debe contener números enteros o decimales'
                }
            }
        });
    });
})