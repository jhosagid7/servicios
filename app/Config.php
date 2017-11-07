<?php

/*
 * Desarrollado por Ing. Jhonny pirela
     * Correo: jhosagid7@gmail.com
 * 
 */

ini_set('display_errors', 1);

date_default_timezone_set('America/Caracas');
setlocale(LC_TIME, 'spanish');

define('DS', DIRECTORY_SEPARATOR); //declaramos una constante y le agregamos la funcion Directory_SEPA...
define('ROOT', realpath(dirname(__FILE__)) . DS); //le asignamos la ruta apsoluta con la funcion rallpath(.... le desimos que es la ruta de las carpetas)
define('APP_PATH', ROOT . DS . 'app' . DS);


define('BASE_URL', 'http://localhost/servicios/');//esta ruta nos servira para incluir archivos del lado de las vistas(img...)


//ahora definimos unas variables que seran comunes en toda la aplicacion como
//el nombre de la compañia, el eslogan entre otros.

define('APP_NAME', 'Bomba el Indio');
define('APP_SLOGAN', 'EL exelencia y calidad...');
define('APP_COMPANIA', 'www.academiaweb.com.ve');
define('HASH_KEY', '53c0653c6d86e');//NOTA: UNA VEZ QUE HALLAMOS USADO ESTA LLAVE NO PODRA SER CAMBIADAS Y LAS CLAVES QUE SE HALLAN CREADO CON ESTA LLAVE SE PERDERAN



//definimos unas constantes para trabajar con la base de datos

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','servicio');
define('DB_CHAR','utf8');

try {
    

    
    require_once ('Database.php');

    



    

#####################################################################
//esto se carga con la funcion autoload de el archivo autoload.php
//creamos un objeto del registro

    
    



   
} catch (Exception $e) {
    echo $e->getMessage();


}