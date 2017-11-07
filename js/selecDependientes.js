
//hacer que funcione con diferentes navegadores
function requerir(){
	try{
	req=new XMLHttpRequest();
	}catch(err1){
		try{
		req=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(err2){
			try{
			req=new ActiveXObject("Msxml2.XMLHTTP");
			}catch(err3){
			req= false;
			}
		}
	}
return req;
}


var peticion=requerir();

function llamarAjaxGETpro(){
var aleatorio=parseInt(Math.random()*999999999);
valor=document.getElementById("estado_cc").value;

var url="../../config/municipio.php?valor="+valor+"&r="+aleatorio;
peticion.open("GET",url,true);
peticion.onreadystatechange =respuestaAjaxpro;
peticion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
peticion.send(null);
}

function llamarAjaxGETdis(){
var aleatorio=parseInt(Math.random()*999999999);
valor=document.getElementById("municipio_cc").value;

var url="../../config/parroquia.php?valor="+valor+"&r="+aleatorio;
peticion.open("GET",url,true);
peticion.onreadystatechange =respuestaAjaxdis;
peticion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
peticion.send(null);
}

function llamarAjaxGETcoor(){
var aleatorio=parseInt(Math.random()*999999999);
valor=document.getElementById("codigo_Pto_Encuentro").value;

var url="../../config/coor.php?valor="+valor+"&r="+aleatorio;
peticion.open("GET",url,true);
peticion.onreadystatechange =respuestaAjaxcoor;
peticion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
peticion.send(null);
}

function respuestaAjaxpro(){

	if(peticion.readyState==4){
		if(peticion.status==200){
		//alert(peticion.responseText);
		document.getElementById("pro").innerHTML=peticion.responseText;
		}else{
		alert("ha ocurrido un error"+peticion.statusText);
		}
	}
}
function respuestaAjaxdis(){

	if(peticion.readyState==4){
		if(peticion.status==200){
		//alert(peticion.responseText);
		document.getElementById("dis").innerHTML=peticion.responseText;
		}else{
		alert("ha ocurrido un error"+peticion.statusText);
		}
	}
}

function respuestaAjaxcoor(){

	if(peticion.readyState==4){
		if(peticion.status==200){
		//alert(peticion.responseText);
		document.getElementById("coor").innerHTML=peticion.responseText;
		}else{
		alert("ha ocurrido un error"+peticion.statusText);
		}
	}
}




