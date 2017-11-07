<?php
session_start();
 
 session_destroy();
  //devuelvo al usuario al formulario
  header("Location: http://localhost/servicios");
  /*
  echo "<script type='text/javascript'> window.location='index.php'; </script>'";
  */
?>