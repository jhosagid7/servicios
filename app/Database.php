<?php

/*
  Document   : Database
  Created on : 08/07/2014, 05:23:00 PM
  Author     : Jhonny Sagid Pirela Pineda
  Correo     : jhosagid7@gmil.com
  Description:

 */

class Database extends PDO
{
    public function __construct() {
        parent::__construct(
                'mysql:host=' . DB_HOST .
                ';dbname=' . DB_NAME,
                DB_USER, 
                DB_PASS, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR
                    ));
                
    }
}

?>
