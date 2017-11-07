//script Desarrollado por Jhonny Pirela


$(function(){
    //Valores que le asignamos a los values de los imput para lograr el efecto de que halla un texto de ejemplo en los input
    var valores_filas = {
            //id                   :  value
            'unidad-gestion'       : 'Unidad de gestion',
            'cargo'                : 'Cargo',
            'nombre'               : 'Primer Nombre',
            'apellido'             : 'Primer Apellido',
            'cedula'               : 'Tu Numero de Cedula',
            'telefono'               : 'Numero de telefono fijo',
            'celular'             : 'Numero de telefono Movil',
            'email'               : 'Tu Correo Electronico'
            
            
            
            
    };


    //Aqui es donde se focaliza el valor de los input o el valor de que asignamos arriba en la variable valor de las filas
    $('input#unidad-gestion').inputfocus({ value: valores_filas['unidad-gestion'] });
    $('input#cargo').inputfocus({ value: valores_filas['cargo'] });
    $('input#nombre').inputfocus({ value: valores_filas['nombre'] });
    $('input#apellido').inputfocus({ value: valores_filas['apellido'] });
    $('input#cedula').inputfocus({ value: valores_filas['cedula'] });
    $('input#telefono').inputfocus({ value: valores_filas['telefono'] });
    $('input#celular').inputfocus({ value: valores_filas['celular'] });
    $('input#email').inputfocus({ value: valores_filas['email'] });
    
    
    




    //Reestablecemos la barra de progreso en 0
    $('#progreso').css('width','0');
    $('#progreso_texto').html('0% Completado');

    //primer_stado
    $('form').submit(function(){ return false; });
    $('#submit_primer_stado').click(function(){
        //removemos las clases
        $('#primer_stado input').removeClass('error').removeClass('valid');

        //chequeamos que los input no esten vacios
        var fields = $('#primer_stado input[type=text], #primer_stado input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==valores_filas[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#pass').val() != $('#cpass').val() ) {
                    $('primer_stado input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                
                //preparamos el ultimo_estado para cargar las variables que se van a mostrar antes de enviar el form
        var fields = new Array(
            $('#nombre_cc').val(),
            $('#AvCalleNcasa_cc').val()+ ' Sector ' + $('#sector_cc').val()+ ' de ' + $('#nombre_comunidad_cc').val(),
            $('#parroquia_cc').val(),
            $('#ciudad_cc').val(),
            $('#municipio_cc').val(),
            $('#estado_cc').val(),
            $('#estatus_cc').val()
            
            
             
        );
      var tr = $('#ultimo_stado tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
                //actualizamos la barra de progreso
                $('#progreso_texto').html('33% Completado');
        $('#progreso').css('width','113px');
                
                //estado del eslider o como se van a intercanviar
                $('#primer_stado').slideUp();
                $('#segundo_stado').slideDown(); 
                
            }               
        } else return false;
    
        
    });
    
    
    $('#submit_segundo_stado').click(function(){
        //removemos las clases
        $('#segundo_stado input').removeClass('error').removeClass('valid');

        //chequeamos que los input no esten vacios
        var fields = $('#segundo_stado input[type=text], #segundo_stado input[type=password]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==valores_filas[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
            if( $('#pass').val() != $('#cpass').val() ) {
                    $('segundo_stado input[type=password]').each(function(){
                        $(this).removeClass('valid').addClass('error');
                        $(this).effect("shake", { times:3 }, 50);
                    });
                    
                    return false;
            } else {   
                
                //preparamos el ultimo_estado para cargar las variables que se van a mostrar antes de enviar el form
        var fields = new Array(
            $('#nombre_cc').val(),
            $('#AvCalleNcasa_cc').val()+ ' Sector ' + $('#sector_cc').val()+ ' de ' + $('#nombre_comunidad_cc').val(),
            $('#parroquia_cc').val(),
            $('#ciudad_cc').val(),
            $('#municipio_cc').val(),
            $('#estado_cc').val(),
            $('#estatus_cc').val()
            
            
             
        );
      var tr = $('#ultimo_stado tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
                //actualizamos la barra de progreso
                $('#progreso_texto').html('66% Completado');
        $('#progreso').css('width','226px');
                
                //estado del eslider o como se van a intercanviar
                $('#segundo_stado').slideUp();
                $('#tercer_stado').slideDown(); 
                
            }               
        } else return false;
    
        
    });



    $('#submit_tercer_stado').click(function(){
        //removemos las clases
        $('#tercer_stado input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#tercer_stado input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==valores_filas[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
            
                //preparamos para cargar las variables que se van a mostrar antes de enviar el form esto en el ultimo_estado
        var fields = new Array(
            ' CC_00' + $('#cod_cc').val(),
            $('#unidad-gestion').val(),
            $('#cargo').val(),
            $('#cargo_comuna').val(),
            $('#cedula').val(),
            $('#nombre').val(),
            $('#apellido').val(),
            $('#telefono').val(),
            $('#celular').val(),
            $('#email').val()
            
        );
        var tr = $('#ultimo_stado tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                //actualizamos la barra de progreso
                $('#progreso_texto').html('100% Completado');
        $('#progreso').css('width','339px');
                
                //estado del slide o como se van a intercanviar
                $('#tercer_stado').slideUp();
                $('#ultimo_stado').slideDown();     
        } else return false;

    });


    $('#submit_third').click(function(){
        //actualizamos la barra de progreso
        $('#progreso_texto').html('100% Completado');
        $('#progreso').css('width','339px');

        //preparamos para cargar las variables que se van a mostrar antes de enviar el form esto en el ultimo_estado
        var fields = new Array(
            $('#nombre_cc').val(),
            $('#pass').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#ultimo_stado tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //estado del slide
        $('#third_step').slideUp();
        $('#ultimo_stado').slideDown();            
    });


    $('#submit_ultimo_stado').click(function(){
        //enviamos los datos al servidor
        //y le pasamos un alert para dar informacion de la transaccion
        
        document.forms.form_cc.submit();
        //luego le mandamos un confirm para redirigirlo a la pagina de administrador o para incertar mas datos en la pagina add_consejo_comunal
//        if(confirm("¿si desea agregar otro consejo cumunal?")) {
//window.location = "add_consejo_c.php"
//
//}else{
//    window.location = "administrador.php"
//}
////         window.location = "add_consejo_c.php";
  });

});