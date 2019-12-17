//Corriendo funciones al cargar pantalla
var debug=1;
//cualquier mamada
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

$(document).ready(function(){
	AltoPantalla();
	altoporciento();
	anchoporciento();
	cuadrar();
	altomitad();
	AltoTo();
});
function AltoTo(){
	$('.altoto').each(function(){
		if($(this).data('alto')){
			var alto=($('#'+$(this).data('element')).height()*($(this).data('alto')/100));
			$(this).css('height',alto+'px');	
		}
	});
}

function Altomapa(element){
	$('#mapa').each(function(){
		var alto=($(this).parent().height()*(97/100));
		console.log($(this).parent().height());
		console.log(alto);
		$(this).css('height',alto+'px');	
		
	});
}

function AltoPantalla(){
	//console.log($('.nav-bar').height());
	$('#content-wrapper').css('height',($( window ).height()-$('.nav-bar').height())+'px');
	$('.content-body').css('height',($('#content-wrapper').height()-$('.content-header').height()-$('.content-footer').height())+'px');
}


function altoporciento(){
	
	$('.alto').each(function(){
		if($(this).data('alto')){
			var alto=($(this).parent().height()*($(this).data('alto')/100));
			$(this).css('height',alto+'px');	
		}
	});

}

function anchoporciento(){
	
	$('.ancho').each(function(){
		if($(this).data('ancho')){	
			var ancho=($(this).parent().width()*($(this).data('ancho')/100));		
			$(this).css('width',ancho+'px');	
		}
	});

}

function cuadrar(){
	
	$('.cuadrar').each(function(){
		if($(this).data('alto')){	
			var alto=($(this).parent().height()*($(this).data('alto')/100));		
			$(this).css('width',alto+'px');
			$(this).css('height',alto+'px');
			$(this).css('margin','0px');	
		}

		if($(this).data('ancho')){	
			var ancho=($(this).parent().width()*($(this).data('ancho')/100));	
			$(this).css('width',ancho+'px');
			$(this).css('height',ancho+'px');
			$(this).css('margin','0px');	
		}
	});

}



function altomitad(){
	
	$('.altomitad').each(function(){
		if($(this).data('ancho')){	
			var ancho=($(this).parent().width()*($(this).data('ancho')/100));	
			$(this).css('width',ancho+'px');
			$(this).css('height',(ancho/2)+'px');	
		}
	});

}

function CopiaAlto(de,a){

	var alto=$('#'+de).height();
	$('#'+a).css('height',alto+'px');	
	

}
	
$(document).ready(function(){
	$( "#form-login" ).submit(function( event ) {
		event.preventDefault();
		if($('#user').val() != "" && $('#pass').val() != "" ){
			var data=JSON.parse('{}');
			data.user=$('#user').val();
			data.pass=$('#pass').val();
			var res = JSON.parse(Conexion("api/IngresarWeb",JSON.stringify(data)));
			if(res.response=="1"){
				window.location.replace("panel/index.php");
			}else{
				alert(res.porque);
			}
			
		}else{
			alert("Debe llenar el formulario");
		}
	});


	$( "#form-registro" ).submit(function( event ) {
		event.preventDefault();
		if($('#mail').val() != "" && $('#nombre').val() && $('#telefono').val() != "" && $('#user').val() != "" && $('#pass').val() != "" && $('#pass2').val() != "" ){
			if($('#pass').val() == $('#pass2').val()){
				var data='{"mail":"'+$('#mail').val()+'","nombre":"'+$('#nombre').val()+'","telefono":"'+$('#telefono').val()+'","user":"'+$('#user').val()+'","pass":"'+$('#pass').val()+'","pass2":"'+$('#pass2').val()+'"}';
				
				var res = JSON.parse(Conexion("api/RegistrarCliente",data));
				if(res.response=="1"){
					alert("Registro exitoso.");
					window.location.replace("index.php");
				}else{
					alert(res.porque);
				}
			}else{
				alert("Las contraseñas no coinciden.");
			}
			
			
		}else{
			alert("Debe llenar el formulario");
		}
	});
	
});

function Redireccion(url){
	window.location.replace(url);
}


function AvatarDef(){
	return 'https://cdn.pixabay.com/photo/2017/01/25/17/35/picture-2008484_960_720.png';
}

function OpenClosNav(){

	if($('#sidebar').attr('class')=='sidebar-close'){
		$('#sidebar').attr('class','sidebar-open');
		$('#content-wrapper').attr('class','content-wrapper-open');
	}else{
		$('#sidebar').attr('class','sidebar-close');
		$('#content-wrapper').attr('class','content-wrapper-close');
	}
	
}

//No mover por que saca el nivel de bateria y datos del usuario al tiempo que pinta tarjetas de usuario tanto como pinta la Última localizacion de el usuario
function Location_gps(){
	var location_gps="";
    $("#content").html('<div id="mapa" style="height: 1px; width: 100%; position: relative; outline: none;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"></div>');
	Altomapa();

      var  fecha='';
      var  id_usuario='';
      var data='{"id_usuario":"'+id_usuario+'","fecha":"'+fecha+'"}';

      var obj=JSON.parse(Conexion("../api/GetGps",data));

      if(typeof (obj[0].lat)=="undefined" || typeof(obj[0].lon)=="undefined"){
            location_gps=result;
           
      }else{

       
        var map = L.map('mapa').setView([obj[0].lat, obj[0].lon], 21);
        var GRaster = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{subdomains:['mt0','mt1','mt2','mt3']});
		var OSMRoads =  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        L.control.locate().addTo(map);
	    L.control.layers({
		    'Satelite image' :GRaster,
		    'Road maps':OSMRoads
	    }).addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
        var latlngs = [];
       
        var tarjeta="";

        for(var i in obj){
         

          var tag =obj[i].nombre+"<br>"+obj[i].fecha;
           
          L.marker([obj[i].lat, obj[i].lon]).addTo(map).bindPopup(tag).openPopup();

            //diseño var latlngs = [[37, -109.05],[41, -109.03],[41, -102.05],[37, -102.04]];
          latlngs[i] = [obj[i].lat,obj[i].lon];
        	
	        tarjeta+='<div class="media border-round margin-top-15 ">';
			tarjeta+='<div class="media-left">';
			tarjeta+='<img src="'+obj[i].foto+'" class="media-object img-circle" style="width:80px; height:80px;"> ';
			tarjeta+='</div>';
			tarjeta+='<div class="media-body">';
			tarjeta+='<div style="height:50px;"><span class="bold">'+obj[i].nombre+'</span></div>';
			//tarjeta+='<div  class="">Última Ubicación'+obj[i].fecha+'</div>';
			tarjeta+='<div class="controls">';
			tarjeta+='<a title="Última ubicación." onclick="GetGpsNow(\''+obj[i].id_usuario+'\')" href="#" class="btn btn-default btn-xs"><img src="iconcolor/map-marker-green.png" ></img></a>';
			tarjeta+='<a title="Recorrido por fecha" onclick="TrazarHoy(\''+obj[i].id_usuario+'\')" href="#" class="btn btn-default btn-xs"><img src="iconcolor/route.png" ></img></a>';
			var img_bateria="0";

			if(obj[i].nivel_bateria!="NA" ){
				if((obj[i].nivel_bateria*1)>0 && (obj[i].nivel_bateria*1)<=25){
				img_bateria="25";
				}
				if((obj[i].nivel_bateria*1)>26 && (obj[i].nivel_bateria*1)<=50){
					img_bateria="50";
				}
				if((obj[i].nivel_bateria*1)>51 && (obj[i].nivel_bateria*1)<=75){
					img_bateria="75";
				}
				if((obj[i].nivel_bateria*1)>76 && (obj[i].nivel_bateria*1)<=100){
					img_bateria="100";
				}
			}else{
				img_bateria="100";
			}

			
			tarjeta+='<a title="'+obj[i].nivel_bateria+'%" onclick="" href="#" class="btn btn-default btn-xs"><img src="iconcolor/'+img_bateria+'.png" ></img></a>';
			tarjeta+='<a title="Avance" onclick="" href="#" class="btn btn-default btn-xs"><img src="iconcolor/reportes.png" ></img></a>';
			tarjeta+='</div>';
			tarjeta+='</div>';
			tarjeta+='</div>';

			

        }

         
        $('#content-equipo').html(tarjeta);         

		
        
         //L.polyline(latlngs, {color: 'red'}).addTo(map);
       

                        
      }

     
    
}


function GetGpsNow(id_usuario){
	var location_gps="";
    $("#content").html('<div id="mapa" style="height: 1px; width: 100%; position: relative; outline: none;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"></div>');
	Altomapa();

      var fecha=$('#fecha').val();
      var id_usuario=id_usuario;
      var data='{"id_usuario":"'+id_usuario+'","fecha":"'+fecha+'"}';

      var obj=JSON.parse(Conexion("../api/GetGpsNow",data));

      if(typeof (obj[0].lat)=="undefined" || typeof(obj[0].lon)=="undefined"){
            location_gps=result;
           
      }else{

       
        var map = L.map('mapa').setView([obj[0].lat, obj[0].lon], 21);
        var GRaster = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{subdomains:['mt0','mt1','mt2','mt3']});
		var OSMRoads =  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        L.control.locate().addTo(map);
	    L.control.layers({
		    'Satelite image' :GRaster,
		    'Road maps':OSMRoads
	    }).addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
        var latlngs = [];

       

        for(var i in obj){
         

          var tag =obj[i].nombre+"<br>"+obj[i].fecha;
           
          L.marker([obj[i].lat, obj[i].lon]).addTo(map).bindPopup(tag).openPopup();

            //diseño var latlngs = [[37, -109.05],[41, -109.03],[41, -102.05],[37, -102.04]];
          latlngs[i] = [obj[i].lat,obj[i].lon];
        	

        }

                        
      }

     
	    
}


function TrazarHoy(id_usuario){
	var location_gps="";
    $("#content").html('<div id="mapa" style="height: 1px; width: 100%; position: relative; outline: none;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"></div>');
	Altomapa();

    if(id_usuario!=""){

      var  fecha=$('#fecha').val();
      var  id_usuario=id_usuario;
      var data='{"id_usuario":"'+id_usuario+'","fecha":"'+fecha+'"}';

      var obj=JSON.parse(Conexion("../api/GetGps",data));

      if(typeof (obj[0].lat)=="undefined" || typeof(obj[0].lon)=="undefined"){
            location_gps=result;
           
      }else{

       
        var map = L.map('mapa').setView([obj[0].lat, obj[0].lon], 21);
        var GRaster = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{subdomains:['mt0','mt1','mt2','mt3']});
		var OSMRoads =  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        L.control.locate().addTo(map);
	    L.control.layers({
		    'Satelite image' :GRaster,
		    'Road maps':OSMRoads
	    }).addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
        var latlngs = [];
        $html_usuarios='<option value=""></option>';
        var tarjeta="";

        var inicioflag = L.icon({
		    iconUrl: 'images/misimagenes/greenflag.png',
		    //shadowUrl: 'leaf-shadow.png',

		    iconSize:     [40, 40], // size of the icon
		   /* shadowSize:   [50, 64], // size of the shadow
		    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
		    shadowAnchor: [4, 62],  // the same for the shadow
		    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
		    */
		});

		var finflag = L.icon({
		    iconUrl: 'images/misimagenes/cuadrosflag.png',
		    //shadowUrl: 'leaf-shadow.png',

		    iconSize:     [40, 40], // size of the icon
		    /*shadowSize:   [50, 64], // size of the shadow
		    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
		    shadowAnchor: [4, 62],  // the same for the shadow
		    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
		    */
		});

        for(var i in obj){
          
          if(!$html_usuarios.includes('<option value="'+obj[i].id_usuario+'">'+obj[i].nombre+'</option>')){
          	$html_usuarios += '<option value="'+obj[i].id_usuario+'">'+obj[i].nombre+'</option>';
          }
            


          var tag =obj[i].nombre+"<br>"+obj[i].fecha;
          console.log(i);
          if(i==(obj.length-1)){
          	console.log(i);
          	L.marker([obj[i].lat, obj[i].lon],{icon:inicioflag}).addTo(map).bindPopup(tag).openPopup();
          }else if(i==0){
          	console.log(i);
          	L.marker([obj[i].lat, obj[i].lon],{icon:finflag}).addTo(map).bindPopup(tag).openPopup();
          }else if( i > 0 && i < (obj.length-1) ){
          	L.marker([obj[i].lat, obj[i].lon]).addTo(map).bindPopup(tag).openPopup();
          }
           
          

            //diseño var latlngs = [[37, -109.05],[41, -109.03],[41, -102.05],[37, -102.04]];
          latlngs[i] = [obj[i].lat,obj[i].lon];
        	
	        
            

        }
         
         L.polyline(latlngs, {color: 'red'}).addTo(map);
                    
      }

     
    }
    
}

function AgregarUsuario(){
	CargarFormulario();
	CargarBotonesUsu();
	$('.modal-title').html('<i class="fas fa-user-edit"></i> Agregar Usuario');
}

function CargarBotonesUsu(){
	var html='<button id="enviar" type="button" class="btn btn-primary" onclick="Agregar_Usuario();">Enviar</button>';
    html+='<button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
    $('#modal-footer').html(html);
}

function CargarBotonesEdiUsu(id_usuario){
	var html='<button id="enviar" type="button" class="btn btn-primary" onclick="Actualizar_Usuario(\''+id_usuario+'\');">Actualizar</button>';
    html+='<button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
    $('#modal-footer').html(html);
}

function Agregar_Usuario(){
	var foto64=$('#foto64').val();
	var nombre=$('#nombre').val();
	var mail=$('#mail').val();
	var telefono=$('#telefono').val();
	var user=$('#user').val();
	var pass=$('#pass').val();
	if((foto64.length*nombre.length*user.length*pass.length*telefono.length*mail.length)!=0){
		var data='{"foto64":"'+foto64+'","nombre":"'+nombre+'","user":"'+user+'","pass":"'+pass+'","telefono":"'+telefono+'","mail":"'+mail+'"}';
		
		var obj=JSON.parse(Conexion('../api/CargarUsuario',data));
		if(obj.response=="1"){
			
			$('#modal').modal('hide');
			CargarBrigada(ref);
		}else{
			alert(obj.porque);
			
		}
		
	}else{
		alert("¡Debe llenar todos los campos!");
	}
	
}

function Actualizar_Usuario(id_usuario){
	var foto64=$('#foto64').val();
	var nombre=$('#nombre').val();
	var mail=$('#mail').val();
	var telefono=$('#telefono').val();
	var user=$('#user').val();
	var pass=$('#pass').val();
	if((nombre.length*user.length*pass.length*telefono.length*mail.length)!=0){
		var data='{"id_usuario":"'+id_usuario+'","foto64":"'+foto64+'","nombre":"'+nombre+'","user":"'+user+'","pass":"'+pass+'","telefono":"'+telefono+'","mail":"'+mail+'"}';
		
		var obj=JSON.parse(Conexion('../api/ActualizarUsuario',data));
		if(obj.response=="1"){
			
			$('#modal').modal('hide');
			CargarBrigada(ref);
		}else{
			alert(obj.porque);
			
		}
		
	}else{
		alert("¡Debe llenar todos los campos!");
	}
	
}

function CargarBrigada(id_coordinador){
	$('#list').html('');
	var data='{"id_coordinador":"'+id_coordinador+'"}';
	var obj=JSON.parse(Conexion("../api/GetBrigada",data));
	for(var i in obj){

	    var tag='<li>';
	    tag +='<form action="perfil.php" method="post" id="'+obj[i].id_usuario+'" >';//<i class="fas fa-ellipsis-v"></i>
	    
	    
	    tag +='<div class="dropdown">';
	    tag +='<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="close"><i class="fa fa-ellipsis-v"></i></button>';
		
		tag +='<div class="dropdown-menu">';
		tag +='<div class="drop-option with-bborder"><a onclick="EditarUsuario(\''+obj[i].id_usuario+'\');" data-toggle="modal" data-target="#modal" href="#">Editar</a></div>';
		tag +='<div class="drop-option "><a onclick="EliminarUsuario(\''+obj[i].id_usuario+'\',\''+obj[i].nombre+'\');" href="#">Borrar</a></div>';
		tag +='</div>';
		tag +='</div>';
	    tag +='<img style="cursor: pointer;" src="'+obj[i].foto+'" alt="User Image" width="128" heigth="128" onclick="Perfil(this);"" data-id="'+obj[i].id_usuario+'" >';
	    tag +='<span class="users-list-name" >'+obj[i].nombre+'</span>';
	    tag +='<span class="users-list-phone" >'+obj[i].telefono+'</span>';
	    tag +='<input type="text" style="display:none;" name="id" value="'+obj[i].id_usuario+'" />';
	    tag +='</form>';
	    tag +='</li>';
	    $('#list').append(tag);
	}
}

function EditarUsuario(id_usuario){
	CargarFormulario();
	CargarBotonesEdiUsu(id_usuario);
	$('.modal-title').html('<i class="fas fa-user-edit"></i> Editar Usuario');

	var data='{"id_usuario":"'+id_usuario+'"}';
	var obj=JSON.parse(Conexion("../api/GetPerfil",data));
	
	$('#preview').attr('src',obj[0].foto);
	$('#nombre').val(obj[0].nombre);
	$('#mail').val(obj[0].mail);
	$('#telefono').val(obj[0].telefono);
	$('#user').val(obj[0].user);
	$('#pass').val(obj[0].pass);
}

function EliminarUsuario(id_usuario,nombre){
	if(confirm('Esta seguro que desea borrar a '+nombre+'?' )){
		var data='{"id_usuario":"'+id_usuario+'"}';		
		var obj=JSON.parse(Conexion('../api/BorrarUsuario',data));

		if(obj.response=="1"){
			alert(nombre+" se elimino correctamente.");			
			CargarBrigada(ref);
		}else{
			alert(obj.porque);
			
		}
	}
}




function AgregarCoordinador(){
	CargarFormulario();
	CargarBotonesCoo();
	$('.modal-title').html('<i class="fas fa-user-edit"></i> Agregar Coordinador');
}

function CargarBotonesCoo(){
	var html='<button id="enviar" type="button" class="btn btn-primary" onclick="Agregar_Coordinador();">Enviar</button>';
    html+='<button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
    $('#modal-footer').html(html);
}

function CargarBotonesEdiCoo(id_coordinador){
	var html='<button id="enviar" type="button" class="btn btn-primary" onclick="Actualizar_Coordinador(\''+id_coordinador+'\');">Actualizar</button>';
    html+='<button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
    $('#modal-footer').html(html);
}

function Agregar_Coordinador(){
	var foto64=$('#foto64').val();
	var nombre=$('#nombre').val();
	var mail=$('#mail').val();
	var telefono=$('#telefono').val();
	var user=$('#user').val();
	var pass=$('#pass').val();
	if((foto64.length*nombre.length*user.length*pass.length*telefono.length*mail.length)!=0){
		var data='{"foto64":"'+foto64+'","nombre":"'+nombre+'","user":"'+user+'","pass":"'+pass+'","telefono":"'+telefono+'","mail":"'+mail+'"}';
		
		var obj=JSON.parse(Conexion('../api/CargarCoordinador',data));
		if(obj.response=="1"){
			
			$('#modal').modal('hide');
			CargarCoordinador(ref);
		}else{
			alert(obj.porque);
			
		}
		
	}else{
		alert("¡Debe llenar todos los campos!");
	}
	
}

function Actualizar_Coordinador(id_coordinador){
	var foto64=$('#foto64').val();
	var nombre=$('#nombre').val();
	var mail=$('#mail').val();
	var telefono=$('#telefono').val();
	var user=$('#user').val();
	var pass=$('#pass').val();
	if((nombre.length*user.length*pass.length*telefono.length*mail.length)!=0){
		var data='{"id_coordinador":"'+id_coordinador+'","foto64":"'+foto64+'","nombre":"'+nombre+'","user":"'+user+'","pass":"'+pass+'","telefono":"'+telefono+'","mail":"'+mail+'"}';
		
		var obj=JSON.parse(Conexion('../api/ActualizarCoordinador',data));
		if(obj.response=="1"){
			
			$('#modal').modal('hide');
			CargarCoordinador(ref);
		}else{
			alert(obj.porque);			
		}
		
	}else{
		alert("¡Debe llenar todos los campos!");
	}
	
}


function CargarCoordinador(id_cliente){
	$('#list').html('');
	var data='{"id_cliente":"'+id_cliente+'"}';
	var obj=JSON.parse(Conexion("../api/GetCoordinadores",data));
	for(var i in obj){

	    var tag='<li>';
	    tag +='<form action="perfil.php" method="post" id="'+obj[i].id_coordinador+'" >';//<i class="fas fa-ellipsis-v"></i>
	    
	    
	    tag +='<div class="dropdown">';
	    tag +='<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="close"><i class="fa fa-ellipsis-v"></i></button>';
		
		tag +='<div class="dropdown-menu">';
		tag +='<div class="drop-option with-bborder"><a onclick="EditarCoordinador(\''+obj[i].id_coordinador+'\');" data-toggle="modal" data-target="#modal" href="#">Editar</a></div>';
		tag +='<div class="drop-option "><a onclick="EliminarCoordinador(\''+obj[i].id_coordinador+'\',\''+obj[i].nombre+'\');" href="#">Borrar</a></div>';
		tag +='</div>';
		tag +='</div>';
	    tag +='<img style="cursor: pointer;" src="'+obj[i].foto+'" alt="User Image" width="128" heigth="128" onclick="Perfil(this);"" data-id="'+obj[i].id_coordinador+'" >';
	    tag +='<span class="users-list-name" >'+obj[i].nombre+'</span>';
	    tag +='<span class="users-list-phone" >'+obj[i].telefono+'</span>';
	    tag +='<input type="text" style="display:none;" name="id" value="'+obj[i].id_coordinador+'" />';
	    tag +='</form>';
	    tag +='</li>';
	    $('#list').append(tag);
	}
}


function EditarCoordinador(id_coordinador){
	CargarFormulario();
	CargarBotonesEdiCoo(id_coordinador);
	$('#modal-title').html('<i class="fas fa-user-edit"></i> Editar Coordinador');

	var data='{"id_usuario":"'+id_coordinador+'"}';
	var obj=JSON.parse(Conexion("../api/GetPerfil",data));
	
	$('#preview').attr('src',obj[0].foto);
	$('#nombre').val(obj[0].nombre);
	$('#mail').val(obj[0].mail);
	$('#telefono').val(obj[0].telefono);
	$('#user').val(obj[0].user);
	$('#pass').val(obj[0].pass);
}

function EliminarCoordinador(id_coordinador,nombre){
	if(confirm('Esta seguro que desea borrar a '+nombre+'?' )){
		var data='{"id_coordinador":"'+id_coordinador+'"}';		
		var obj=JSON.parse(Conexion('../api/BorrarCoordinador',data));

		if(obj.response=="1"){
			alert(nombre+" se elimino correctamente.");			
			CargarCoordinador(ref);
		}else{
			alert(obj.porque);
			
		}
	}
}


function Filtro(este){
	
	var buscar=$(este).val().toLowerCase();	
	$('.users-list-name').each(function(){
		$(this).parent().parent().css({"display": "none"});
		if($(this).html().toLowerCase().includes(buscar)  ){

		  $(this).parent().parent().css({"display": ""});

		}

	});
}

function FiltroRefacciones(este){
	
    var value = $(este).val().toLowerCase();
    $("#table_refacciones tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
}


function FiltroInventario(este){
	
    var value = $(este).val().toLowerCase();
    $("#table_inventario tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
}

function FiltroVentas(este){
	
    var value = $(este).val().toLowerCase();
    $("#table_ventas tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
}
function Perfil(este){
	$('#'+$(este).data('id')).submit();
}

function CargarPerfil(id_usuario){
	var data='{"id_usuario":"'+id_usuario+'"}';
	var obj=JSON.parse(Conexion("../api/GetPerfil",data));
	$('#foto').attr('src',obj[0].foto);
	$('#nombre').html(obj[0].nombre);
	$('#mail').html(obj[0].mail);
	$('#telefono').html(obj[0].telefono);
	$('#user').html(obj[0].user);
	$('#pass').html(obj[0].pass);
	
}

//Variable para solo refrescar cuando sea diferente
var obj_comp;
function Rastreando(id_usuario){
	var data='{"id_usuario":"'+id_usuario+'"}';
	obj_temp=Conexion("../api/Rastreando",data)
	var obj=JSON.parse(obj_temp);
	if(obj_temp!=obj_comp){
		Mapear(obj);
		obj_comp=obj_temp;
	}
	
}

function Mapear(obj,polyline=true){
	var location_gps="";
	$("#content").html('<div id="mapa" style="height: 1px; width: 100%; position: relative; outline: none;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"></div>');
	Altomapa();

	if(typeof (obj[0].lat)=="undefined" || typeof(obj[0].lon)=="undefined"){
	    location_gps=result;
	       
	}else{

		var map = L.map('mapa').setView([obj[0].lat, obj[0].lon], 21);
		var GRaster = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{subdomains:['mt0','mt1','mt2','mt3']});
		var OSMRoads =  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
		L.control.locate().addTo(map);
	    L.control.layers({
		    'Satelite image' :GRaster,
		    'Road maps':OSMRoads
	    }).addTo(map);

	    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(map);

	    
	    var latlngs = [];
	    for(var i in obj){
	     
	     var tag =obj[i].nombre+"<br>"+obj[i].fecha;
	       
	      L.marker([obj[i].lat, obj[i].lon]).addTo(map).bindPopup(tag).openPopup();

	        //diseño var latlngs = [[37, -109.05],[41, -109.03],[41, -102.05],[37, -102.04]];
	      latlngs[i] = [obj[i].lat,obj[i].lon];
	    
	        

	    }
	   

	    if(polyline){      
	      L.polyline(latlngs, {color: 'red'}).addTo(map);
	    }	                    
	}

     
    
}

function myTimer() {
  var d = new Date();
  $('#tiempo').html( d.toLocaleTimeString());
}

function CargarImagen(este){
	$('#foto').click();
}

function VerImagen(este){
	 if (este.files && este.files[0]) {
	 	var reader = new FileReader();

	    reader.onload = function (e) {
	        $('#preview').attr('src', e.target.result);

	        var pre64=e.target.result.split(',');
	        $('#foto64').val(pre64[1]);
	    }
	    reader.readAsDataURL(este.files[0]);
	}else{
		$('#preview').attr('src',AvatarDef());
		$('#foto64').val('');
	}
	
}

function CargarFormulario(){
	$('#Box-Body').html(LeerArchivo('formularios/FormUsuario.php'));
}

function LeerArchivo(nombre){
	var stringData = $.ajax({
	    url: nombre  ,
	    async: false
	 }).responseText;
	return stringData;
}

function Clock(){
	$('#time').html(Time());
}

function Time(){
	var date = new Date();

	var year = date.getFullYear();
	var month = date.getMonth() + 1;
	var day = date.getDate();

	var hours = date.getHours();
	var minutes = date.getMinutes();
	var seconds = date.getSeconds();

	return year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
}

function Pagar(tipo){
	if(tipo==2){

		var monto ='0.01';
		paypal.Buttons({
		    createOrder: function(datapp, actions) {
		      // This function sets up the details of the transaction, including the amount and line item details.
		      return actions.order.create({
		        purchase_units: [{
		          amount: {
		            value: monto
		          }
		        }]
		      });
		    },
		    onApprove: function(datapp, actions) {
		      // This function captures the funds from the transaction.
		      return actions.order.capture().then(function(details) {
		        // This function shows a transaction Info message to your buyer.        
		        var data='{"monto":"'+monto+'","id_pago":"'+details.id+'","id_payer":"'+details.payer.payer_id+'","status":"'+details.status+'"}';
				var obj=JSON.parse(Conexion("../api/GuardaPago",data));
				if(obj.response=="1"){
					alert('Gracias por realizar tu pago.');
					GetPagos();
				}else{
					alert(obj.porque);
				}
		      });
		    }
		  }).render('#paypal-button-container');
  		//This function displays Smart Payment Buttons on your web page.
	}else{
		window.location.replace("index.php");
	}
	
}

function GetPagos(){
	var data='{}';
	var obj=JSON.parse(Conexion("../api/GetPagos",data));
	var html='<table class="table table-striped">';
	html+='<thead> <tr> <th>#</th> <th>Nombre</th> <th>Id_pago</th> <th>monto</th> <th>status</th> </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+i+'</th>';
		html+=' <td>'+obj[i].nombre+'</td>';
		html+=' <td>'+obj[i].id_pago+'</td>';
		html+=' <td>'+obj[i].monto+'</td>';
		html+=' <td>'+obj[i].status+'</td> </tr>';
	}
	html+='</tbody></table>';

	$('#pagos').html(html);
}

function CrearEncuesta(){
	var titulo=$('#Etitulo').val();
	if(titulo.length!=0){
		var data='{"titulo":"'+titulo+'"}';
		var obj=JSON.parse(Conexion("../api/CargarEncuesta",data));
		if(obj.response=="1"){
			GetEncuestas();
			EditarEncuesta(obj.id_encuesta,titulo);
		}else{
			alert(obj.porque);		
		}
	}else{
	 	alert('Debe Ingreasar un titulo.');		
	}
	
}

var IdEditandoEncuesta='';
function EditarEncuesta(id_encuesta,titulo){
	IdEditandoEncuesta=id_encuesta;
	$('#ModalHoja').modal();
	$('#titulo').text(titulo);
	console.log(titulo);
	CargarBarraHerramientas();
	RefrescarVistaEncuesta(id_encuesta);
}

function GetEncuestas(){
	var data='{}';
	var obj=JSON.parse(Conexion("../api/GetEncuestas",data));

	var html='<table class="table table-striped">';
	html+='<thead> <tr> <th>#</th> <th>Título</th> <th>Hecha por</th> <th>Fecha</th> <th>Acciones</th> </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th> <td>'+obj[i].titulo+'</td>';
		html+='<td>'+obj[i].nombre+'</td> <td>'+obj[i].fecha+'</td>';
		html+='<td><button onclick="EditarEncuesta(\''+obj[i].id_encuesta+'\',\''+obj[i].titulo+'\');" class="btn btn-primary btn-sm margin-left-5" ><i class="fas fa-pen"></i></button>';
		html+='<button onclick="BorraEncuesta(\''+obj[i].id_encuesta+'\',\''+obj[i].titulo+'\');" class="btn btn-danger btn-sm margin-left-5" ><i class="fas fa-times"></i></button></td> </tr>';
	}
	html+='</tbody></table>';

	$('#tab_encuestas').html(html);
}

function BorraEncuesta(id_encuesta,titulo){
	if (confirm('Esta seguro que desea borrar la encuesta: '+titulo+'?' )) {
		var data='{"id_encuesta":"'+id_encuesta+'"}';
		var obj=JSON.parse(Conexion("../api/BorrarEncuesta",data));
		if(obj.response=="1"){
			alert("Se elimino correctamente.");			
			GetEncuestas();
		}else{
			alert(obj.porque);
			
		}
	}
	
}

function CargarBarraHerramientas(){
	$('.barra_h').html(LeerArchivo('controles/BarraHerramientas.php'));
} 

function closemodal(modal){
	$('#'+modal).modal('toggle');
}


//Creando tipo de pregunta
var TipodePregunta=0;
function CargarPreguntaAbierta(){
	$('#titulo-preguntas').html('Pregunta Abierta');
	$('#modal-pregunta-body').html(LeerArchivo('formularios/FormPreguntaAbierta.php'));
	TipodePregunta=1;
}

function CargarMultiple(){
	$('#titulo-preguntas').html('Selección');
	$('#modal-pregunta-body').html(LeerArchivo('formularios/FormMulti.php'));
	inputMas=1;
	TipodePregunta=2;
}

function CargarRadio(){
	$('#titulo-preguntas').html('Selección');
	$('#modal-pregunta-body').html(LeerArchivo('formularios/FormMulti.php'));
	inputMas=1;
	TipodePregunta=3;
}

function CargarUbicaion(){
	$('#titulo-preguntas').html('Ubicación');
	$('#modal-pregunta-body').html(LeerArchivo('formularios/FormPreguntaUbicacion.php'));
	TipodePregunta=4;
}

function CargarSelect(){
	$('#titulo-preguntas').html('Selección');
	$('#modal-pregunta-body').html(LeerArchivo('formularios/FormMulti.php'));
	inputMas=1;
	TipodePregunta=5;
}

var inputMas=1;
function InputMenos(){
	
	var ultimo = $('#conte_input').children().last();
	if (ultimo.children().attr('id') != "i0") {
		ultimo.remove();
		inputMas--;
	}
}

var inputMas=1;
function InputMas(){
	var contenedor = $('#conte_input');
	html='<div class=" margin-top-15">';
	html+='<input name="io" id="i'+inputMas+'" class="form-control"  type="text" placeholder="Opción '+(1+inputMas)+'">';
	html+='</div>';
	contenedor.append(html);
	inputMas++;

}
var tituloencuesta='';
function RefrescarVistaEncuesta(id_encuesta){
	
	$('.encuesta-body').html('');
	data='{"id_encuesta":"'+id_encuesta+'"}'
	var obj=JSON.parse(Conexion("../api/GetPreguntas",data));

	for(var i in obj){
		console.log(obj[i]);
		var html='';
		switch(obj[i].tipo){
			case"1":
				html='<div class="margin-top-55">';
				html +='<p><b>'+obj[i].pregunta+'</b><button class="close" onclick="BorrarPregunta(\''+obj[i].id_pregunta+'\');">×</button></p>';
				html +='</div>';
			break;

			case"2":
				html='<div class="pregunta"><p><b>'+obj[i].pregunta+'</b><button class="close" onclick="BorrarPregunta(\''+obj[i].id_pregunta+'\');">×</button></p>';
				var extra = JSON.parse(obj[i].extra);
				for(var j in extra){
					html+='<div>';
					html +='<label>'+extra[j].texto+'&nbsp;<input type="checkbox" >';
					html +='</label>';
					html +='</div></div>';
				}
			break;

			case"3":
				html='<div class="pregunta"><p><b>'+obj[i].pregunta+'</b><button class="close" onclick="BorrarPregunta(\''+obj[i].id_pregunta+'\');">×</button></p>';
				var extra = JSON.parse(obj[i].extra);
				for(var j in extra){
					html+='<div>';
					html +='<label>'+extra[j].texto+'&nbsp;<input type="radio" >';
					html +='</label>';
					html +='</div></div>';
				}
			break;

			case"4":
				html +='<div class="pregunta"><p><b>'+obj[i].pregunta+'</b><button class="close" onclick="BorrarPregunta(\''+obj[i].id_pregunta+'\');">×</button></p>';
				html +='<img src="images/misimagenes/mapamundi.jpg"  width="300px"></div>';
			break;

			case"5":
				html='<div class="pregunta"><p><b>'+obj[i].pregunta+'</b><button class="close" onclick="BorrarPregunta(\''+obj[i].id_pregunta+'\');">×</button></p>';
				var extra = JSON.parse(obj[i].extra);
				html+='<div><select>';
				for(var j in extra){
					
					html +='<option value="'+extra[j].texto+'">'+extra[j].texto+'</option>';
					
				}
				html +='</select></div>';

			break;

		}
		$('.encuesta-body').append(html);
	}
	
}

var ordenpregunta = 0;
function CargarPregunta(){
	var data="";
	var temp=[];
	var extra="";
	var pregunta="";
	switch(TipodePregunta){
		case 1:
		pregunta=$('[name="pa"]').val();
		
		break;
/*
		case 2:
		pregunta=$('[name="pa"]').val();
			$('[name="pc"]').each(function(){
				temp.push('{"texto":"'+$(this).val()+'"}');

			});
		break;

		case 3:
		pregunta=$('[name="pa"]').val();
			$('[name="pr"]').each(function(){
				temp.push('{"texto":"'+$(this).val()+'"}');
			});

		break;*/

		case 4:
			pregunta='Localización';
		break;

		default:
			pregunta=$('[name="pa"]').val();
			$('[name="io"]').each(function(){
				temp.push('{"texto":"'+$(this).val()+'"}');
			});

		break;
	}
	extra=temp.join(',');
	data='{"id_encuesta":"'+IdEditandoEncuesta+'","pregunta":"'+pregunta+'","extra":['+extra+'],"tipo":"'+TipodePregunta+'","orden":"'+ordenpregunta+'"}';
	var obj=JSON.parse(Conexion("../api/CargarPregunta",data));
	if(obj.response=="1"){			
		RefrescarVistaEncuesta(IdEditandoEncuesta);
	}else{
		alert(obj.porque);
		
	}
	
	ordenpregunta ++;
}


function BorrarPregunta(id_pregunta){
	if(confirm('Esta seguro de borrar la pregunta?' )){
		var data='{"id_pregunta":"'+id_pregunta+'"}';
		var obj=JSON.parse(Conexion("../api/BorrarPregunta",data));
		if(obj.response=='1'){
			RefrescarVistaEncuesta(IdEditandoEncuesta);
		}else{
			alert(obj.porque);
		}
	}
}

function AvanceporEncuesta(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetAvance/PorEncuesta",data));

	var html='<table class="table table-striped">';
	html+='<thead> <tr>';
		html+=' <th>#</th>';
		html+=' <th>Título</th>';
		//html+=' <th>Fecha</th>';
		html+=' <th>Avance</th>';
		html+=' </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th>';
		html+='<td>'+obj[i].titulo+'</td>';
		//html+='<td>'+obj[i].fecha+'</td>';
		html+='<td>'+obj[i].avance+'</td>';
		
		html+='</tr>';
	}
	html+='</tbody></table>';

	$('#tab_encuesta').html(html);				
}

function GetAvance(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetAvance/Avance",data));

	var html='<table class="table table-striped">';
	html+='<thead> <tr>';
		html+=' <th>#</th>';
		html+=' <th>Nombre</th>';
		html+=' <th>Título</th>';
		//html+=' <th>Fecha</th>';
		html+=' <th>Avance</th>';
		html+=' </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th>';
		html+='<td>'+obj[i].nombre+'</td>';
		html+='<td>'+obj[i].titulo+'</td>';
		//html+='<td>'+obj[i].fecha+'</td>';
		html+='<td>'+obj[i].avance+'</td>';
		
		html+='</tr>';
	}
	html+='</tbody></table>';

	$('#tab_avance').html(html);				
}

function GetAvanceHistorico(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetAvance/Historico",data));

	var html='<table class="table table-striped">';
	html+='<thead> <tr> <th>#</th>';
		html+=' <th>Nombre</th>';
		//html+=' <th>Fecha</th>';
		html+=' <th>Avance</th>';
		html+=' </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th>';
		html+='<td>'+obj[i].nombre+'</td>';
		//html+='<td>'+obj[i].fecha+'</td>';
		html+='<td>'+obj[i].avance+'</td>';
		
		html+='</tr>';
	}
	html+='</tbody></table>';

	$('#tab_avance_historico').html(html);				
}


function GraficarAvance(){

	var colores=['#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d6de'];
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetAvance/Historico",data));
	var lista=$('#lista_avance');
	lista.html();

	 //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChart       = new Chart(pieChartCanvas);
    var PieData        = [];
    for (var i in obj) {
    	lista.append('<div style="font-size:11px; " ><font style=" color:'+colores[i]+';"><i class="fas fa-square"></i></font> '+obj[i].nombre+'</div>');
    	PieData.push({
        value    : obj[i].avance*1,
        color    : colores[i],
        highlight: '#f56954',
        label    : obj[i].nombre
      });
    }

    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
}


function PieChart2(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetAvance/Historico",data));
	var lista=$('#lista_avance');
	lista.html();

	
    var Labels= [];
    var PieData= [];
    var Color= ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"];
    for (var i in obj) {
    	lista.append('<div style="font-size:11px; " ><font style=" color:'+Color[i]+';"><i class="fas fa-square"></i></font> '+obj[i].nombre+'</div>');
    	PieData.push(obj[i].avance*1);
        Labels.push(obj[i].nombre);
    }

	new Chart(document.getElementById("pieChart"), {
    type: 'pie',
    data: {
      labels: Labels,
      visible: false,
      datasets: [{
        label: "Population (millions)",
        backgroundColor: Color,
        data: PieData
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Avance por grupo'
      }
    }
});
}



///Nuevo taller

function CargarRefaccion(){
	var codigo=$('#codigo').val();
	var descripcion=$('#descripcion').val();
	var modelo=$('#modelo').val();
	if(codigo.length!=0 && descripcion.length!=0 && modelo.length!=0){
		var data='{"codigo":"'+codigo+'","descripcion":"'+descripcion+'","modelo":"'+modelo+'"}';
		var obj=JSON.parse(Conexion("../api/CargarRefaccion",data));
		if(obj.response=="1"){
			GetRefacciones();
		}else{
			alert(obj.porque);		
		}
	}else{
	 	alert('Debe Ingreasar los campos.');		
	}
	
}


function GetRefacciones(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetRefacciones",data));

	var html='<table class="table table-striped" id="table_refacciones">';
	html+='<thead> <tr>';
		html+=' <th>#</th>';
		html+=' <th>Código</th>';
		html+=' <th>descripción</th>';
		html+=' <th>Modelo</th>';
		html+=' </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th>';
		html+='<td>'+obj[i].codigo+'</td>';
		html+='<td>'+obj[i].descripcion+'</td>';
		html+='<td>'+obj[i].modelo+'</td>';
		
		html+='</tr>';
	}
	html+='</tbody></table>';

	$('#tab_refacciones').html(html);				
}


//Cargar inventario en select
function GetRefaccionesSelect(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetRefacciones",data));

	var html='';
	html+='<option value="0">--Seleccionar--</option>';
	for (var i in obj) {		
		html+='<option value="'+obj[i].id_refaccion+'">'+obj[i].descripcion+'</option>';
		
	}

	$('#id_refaccion').html(html);				
}



function CargarInventario(){
	var id_refaccion=$('#id_refaccion').val();
	var precio_entrada=$('#precio_entrada').val();
	var precio_salida=$('#precio_salida').val();
	if(id_refaccion!=0 && precio_entrada.length!=0 && precio_salida.length!=0){
		var data='{"id_refaccion":"'+id_refaccion+'","precio_entrada":"'+precio_entrada+'","precio_salida":"'+precio_salida+'"}';
		var obj=JSON.parse(Conexion("../api/CargarInventario",data));
		if(obj.response=="1"){
			GetInventario();
		}else{
			alert(obj.porque);		
		}
	}else{
	 	alert('Debe Ingreasar los campos.');		
	}
	
}

function GetInventario(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetInventario/Inventario",data));

	var html='<table class="table table-striped" id="table_inventario">';
	html+='<thead> <tr>';
		html+=' <th>#</th>';
		html+=' <th>Descripción</th>';
		html+=' <th>Entrada</th>';
		html+=' </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th>';
		html+='<td>'+obj[i].descripcion+'</td>';
		html+='<td>$'+obj[i].entrada+'</td>';
		html+='</tr>';
	}
	html+='</tbody></table>';

	$('#tab_inventario').html(html);				
}

function GetVentas(){
	var data='{}';
	var obj = JSON.parse(Conexion("../api/GetInventario/Ventas",data));

	var html='<table class="table table-striped" id="table_ventas">';
	html+='<thead> <tr>';
		html+=' <th>#</th>';
		html+=' <th>Descripción</th>';
		html+=' <th>Entrada</th>';
		html+=' <th>Salida</th>';
		html+=' <th>Ganacia</th>';
		html+=' </tr> </thead><tbody>';
	for (var i in obj) {
		html+='<tr> <th scope="row">'+((i*1)+1)+'</th>';
		html+='<td>'+obj[i].descripcion+'</td>';
		html+='<td>$'+obj[i].entrada+'</td>';
		html+='<td>$'+obj[i].salida+'</td>';
		html+='<td>$'+(Math.round((parseFloat(obj[i].salida)-parseFloat(obj[i].entrada))*100)/100)+'</td>';		
		html+='</tr>';
	}
	html+='</tbody></table>';

	$('#tab_ventas').html(html);				
}