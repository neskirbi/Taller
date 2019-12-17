//Corriendo funciones al cargar pantalla
var debug=1;

function Conexion(url,data){
	if(debug==1){
		console.log("S: "+data);
	}
	
	var respuesta="";
	respuesta = $.ajax({
	  	type: "POST",   
	    url: url,
	    data:{data:data},   
	    async: false
	}).done(function(result) {
	  //return result;
	}).responseText;
	if(debug==1){
		console.log("R: "+respuesta);
	}
	return respuesta;
	
}

function Ingresar(){
	if($('#user').val() != "" && $('#pass').val() != "" ){
		var data=JSON.parse('{}');
		data.user=$('#user').val();
		data.pass=$('#pass').val();
		var res = JSON.parse(Conexion("api/Ingresar",JSON.stringify(data)));
		if(res.response=="1"){
			window.location.replace("panel/index.php");
		}else{
			alert(res.porque);
		}
		
	}else{
		alert("Debe llenar el formulario");
	}
}
