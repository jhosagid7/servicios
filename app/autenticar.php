<?php
/*AUTOR: 	OCTAVIO TOVAR
CODIGO: autenticaCliente.php
ACCION: AUTENTICACION DE USUARIOS DE DESDE EL FORMULARIO index.html Y DA PASO AL MENU DEL ADMINISTRADOR administrador.html*/
//print_r($_POST); exit;
//Activando conexi�n
    require_once "../connection/conexion.php";
 //Definici�n de P�gina de Inicio del Sitio
   $sPaginaInicioSitio="../modulos/mod_administrador/administrador.php"; // Aqui se llama al Menu del Administrador
   $sPaginaInicioSitio2="../modulos/mod_usuario/usuario.php";  // Aqui se redirecciona al menu del usuario
 
//Iniciando sesi�n
      global $_SESSION;
      session_start();
     // session_register('claveusuario');
     // session_register('privilegio');
        
//Verificar autenticidad de usuario
      $loginFailed= true;
// Inicializar bandera de NO autenticaci�n de usuario
//Validaci�n de usuario por BD

if (isset($_POST['iniciar_sesion'])) {
    // print_r($_POST); exit;
    if ($_POST['usuario']!="" && $_POST['pass']!="") {
        // echo 'ok'; exit;
        $user=$_POST['usuario'];
        $pass1=$_POST['pass'];
        $mysqli = getConn();
        $query = "SELECT * FROM usuario WHERE usuario='$user' AND clave='$pass1'";
        $resultado1 = $mysqli->query($query);
        $countx=mysqli_num_rows($resultado1);
        $dato = $resultado1->fetch_array(MYSQLI_ASSOC);

        if ($countx==1) {
            //usuario v�lido
                //$_SESSION["correo"]=$dato["correo"];
                //$_SESSION["id_usuario"]=$dato["id_usuario"];
                $_SESSION["nombre"]=$dato["nombre"];
                                $_SESSION["login"]=$dato["usuario"];
                                //$_SESSION["clave"]= $_POST["password"];
                $_SESSION["privilegio"]= $dato["privilegio"];
                $loginFailed = false;
            if (isset($_GET["From"])) {
                $redirectPage= str_replace("*", "&", $_POST["From"]);
            }
                
            if ($_SESSION["privilegio"] !="Administrador") {
                $redirectPage= $sPaginaInicioSitio2;
            } else {
                $redirectPage= $sPaginaInicioSitio;
            }
        } else {
            /*echo "Tu no tienes permisos para accesar al Sistema, dir�jase al Administrador...<a     href='cuerpo.html'>  Salir</a>";*/

            header("location: error.html");
            echo" <center> 
		
		
		
		<img src=img1/logo.png >
	<p>
		<h3>contaseña o correo incorrectos</h3>
		<h5>Asegurese de estar ya registrado</h5>
		<p>
		<a href=index.html>Regresar</a></center>";
        }
    }
}

//Redireccionar usuario
if (!$loginFailed) {
    header("Location: $redirectPage");
    exit;
}
