<?php
 session_start();
  require("conexion.php");
if(isset($_POST['iniciar_sesion'])){
	if($_POST['usermail']!="" && $_POST['userpass']!=""){
		
	$mail1=$_POST['usermail'];
	$pass1=$_POST['userpass'];
	
	
	$consultax="SELECT * FROM registrousuarios WHERE correo_usuario='$mail1' AND Contra_usuario='$pass1'";
	$resultado1=mysqli_query($con,$consultax);
	$countx=mysqli_num_rows($resultado1);
	
	if($countx==1){
		$_SESSION['inicio_sesion']='dog';
        header("location:inicio.php");
		}
		
	else{
		echo" <center> 
		
		
		
		<img src=img1/logo.png >
	<p>
		<h3>contaseña o correo incorrectos</h3>
		<h5>Asegurese de estar ya registrado</h5>
		<p>
		<a href=index.html>Regresar</a></center>"
		;
		
		}
	}
}

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>