<?php
session_start();
  require("../../connection/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
if(isset($_POST['registrarse'])){
	$nombre_usuario=$_POST['nombre_usuario'];
	$cedula=$_POST['cedula'];
	$edad=$_POST['edad'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$login=$_POST['login'];
	$clave=$_POST['clave'];
	$correo=$_POST['correo'];
	
	
	
	
	$encriptar=sha1($contrausuario1);

$sql4="SELECT * FROM usuarios WHERE cedula='$cedula'";	
$sql2="SELECT * FROM usuarios WHERE correo='$correo'";
$sql3="SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario'";

$result4=mysqli_query($con,$sql2);
$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);

$contar3=mysqli_num_rows($result4);
$contar1=mysqli_num_rows($result2);
$contar2=mysqli_num_rows($result3);

if($contar1==1){
	echo"<center>
	
	<p>
	<h3>Esta Direccion de correo ya esta registrada, favor ingrese otro Email.</h3>
	<p>
	<a href=http://localhost/farmauni/modulos/mod_administrador/registroclientes.php>Regresar</a>
	
	</center>
	
	
	";
	
	}
	if($contar3==1){
	echo"<center>
	
	<p>
	<h3>Este Numero de cedula ya esta registrada, favor verifique.</h3>
	<p>
	<a href=http://localhost/farmauni/modulos/mod_administrador/registroclientes.php>Regresar</a>
	
	</center>
	
	
	";
	
	}

if($contar1==1){
	echo"<center>
	
	<p>
	<h3>Esta Direccion de correo ya esta registrada, favor ingrese otro Email.</h3>
	<p>
	<a href=http://localhost/farmauni/modulos/mod_administrador/registroclientes.php>Regresar</a>
	
	</center>
	
	
	";
	
	}
	else if($contar2==1){
		echo"<center>
		
	<p>
		<h3>Este Nombre de usuario ya esta registrado, favor ingrese otro  Nombre.</h3>
		<p>
		<a href=http://localhost/farmauni/modulos/mod_administrador/registroclientes.php>Regresar</a>
		";
		
		}
		else{
$sql="INSERT INTO usuarios( id_usuario, nombre_usuario, cedula, edad, telefono, direccion, login, clave, correo, fecha_reg, rol, estado) VALUES ('', '$nombre_usuario', '$cedula', '$edad', '$telefono', '$direccion', '$login', '$clave', '$correo', NOW(), 2, 1)";
$result=mysqli_query($con,$sql);

$_SESSION['inicio_sesion']='dog';
header("location:http://localhost/farmauni/");
		}
}

?>

</body>
</html>
