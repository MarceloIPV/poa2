$(document).ready(function () {

function validacionRegistro(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).val()==""){
	     	sumadorErrores++;
		}

	});

	if (sumadorErrores==0) {
		return true;
	}else{
		return false;
	}

}

function concatenarValores(parametro1){
	
	var array = new Array(); 

    $(parametro1).each(function(index) {

        array.push($(this).val());

    });

    return array;

}


var validacionRegistroMostrarErrores=function(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).val()==""){
	    	$(this).addClass('error');
		}else{
	    	$(this).removeClass('error');
		}
	  
	});

}

var validacionRecorrerChekeds=function(parametro1){

	var condicion = $(parametro1).is(":checked");

	if (condicion) {
		return "si";
	}else{
		return "no";
	}

}



function validacionRegistro__retornables(parametro1){

	var condicion = $(parametro1).is(":checked");

	if (condicion) {
		return "si";
	}else{
		return "no";
	}

}

var fechasActuales=function(parametro1){

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();

	$(parametro1).val(yyyy+'-'+mm+'-'+dd);

}

fechasActuales($("#fechaPrincipalJ"));



var insertaValidaciones__parametros__contrataciones=function(parametro1){

$(parametro1).click(function (e){

	e.preventDefault();	

	var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','insertar__tipo__de__contratacion');		

		var other_data = $('#formulario__tipo__contrataciones').serializeArray();

		$.each(other_data,function(key,input){
			paqueteDeDatos.append(input.name,input.value);
		});

		let idItemCatalogo=$("#idItemCatalogo__2").val();
		let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

		let catalogo__elect__texto=$("#catalogo__elect__texto").val();
		let catalogo__subasta__texto=$("#catalogo__subasta__texto").val();
		let catalogo__infima__texto=$("#catalogo__infima__texto").val();
		let catalogo__menorCuantia__texto=$("#catalogo__menorCuantia__texto").val();
		let catalogo__cotizacion__texto=$("#catalogo__cotizacion__texto").val();
		let catalogo__licitacion__texto=$("#catalogo__licitacion__texto").val();
		let catalogo__menorCuantiaObras__texto=$("#catalogo__menorCuantiaObras__texto").val();
		let catalogo__cotizacionObras__texto=$("#catalogo__cotizacionObras__texto").val();
		let catalogo__licitacionObras__texto=$("#catalogo__licitacionObras__texto").val();
		let catalogo__precioObras__texto=$("#catalogo__precioObras__texto").val();
		let catalogo__contratacionDirecta__texto=$("#catalogo__contratacionDirecta__texto").val();
		let catalogo__contratacionListaCorta__texto=$("#catalogo__contratacionListaCorta__texto").val();
		let catalogo__contratacionConcursoPu__texto=$("#catalogo__contratacionConcursoPu__texto").val();

		paqueteDeDatos.append("idActividad",1);
		paqueteDeDatos.append("catalogo__elect__texto",catalogo__elect__texto);
		paqueteDeDatos.append("catalogo__subasta__texto",catalogo__subasta__texto);
		paqueteDeDatos.append("catalogo__infima__texto",catalogo__infima__texto);
		paqueteDeDatos.append("catalogo__menorCuantia__texto",catalogo__menorCuantia__texto);
		paqueteDeDatos.append("catalogo__cotizacion__texto",catalogo__cotizacion__texto);
		paqueteDeDatos.append("catalogo__licitacion__texto",catalogo__licitacion__texto);
		paqueteDeDatos.append("catalogo__menorCuantiaObras__texto",catalogo__menorCuantiaObras__texto);
		paqueteDeDatos.append("catalogo__cotizacionObras__texto",catalogo__cotizacionObras__texto);
		paqueteDeDatos.append("catalogo__licitacionObras__texto",catalogo__licitacionObras__texto);
		paqueteDeDatos.append("catalogo__precioObras__texto",catalogo__precioObras__texto);
		paqueteDeDatos.append("catalogo__contratacionDirecta__texto",catalogo__contratacionDirecta__texto);
		paqueteDeDatos.append("catalogo__contratacionListaCorta__texto",catalogo__contratacionListaCorta__texto);
		paqueteDeDatos.append("catalogo__contratacionConcursoPu__texto",catalogo__contratacionConcursoPu__texto);


		paqueteDeDatos.append("idItemCatalogo",idItemCatalogo);
		paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);

		let catalogo__elect=validacionRegistro__retornables($("#catalogo__elect"));
		paqueteDeDatos.append("catalogo__elect",catalogo__elect);

		let catalogo__subasta=validacionRegistro__retornables($("#catalogo__subasta"));
		paqueteDeDatos.append("catalogo__subasta",catalogo__subasta);

		let catalogo__infima=validacionRegistro__retornables($("#catalogo__infima"));
		paqueteDeDatos.append("catalogo__infima",catalogo__infima);

		let catalogo__menorCuantia=validacionRegistro__retornables($("#catalogo__menorCuantia"));
		paqueteDeDatos.append("catalogo__menorCuantia",catalogo__menorCuantia);

		let catalogo__cotizacion=validacionRegistro__retornables($("#catalogo__cotizacion"));
		paqueteDeDatos.append("catalogo__cotizacion",catalogo__cotizacion);

		let catalogo__licitacion=validacionRegistro__retornables($("#catalogo__licitacion"));
		paqueteDeDatos.append("catalogo__licitacion",catalogo__licitacion);

		let catalogo__menorCuantiaObras=validacionRegistro__retornables($("#catalogo__menorCuantiaObras"));
		paqueteDeDatos.append("catalogo__menorCuantiaObras",catalogo__menorCuantiaObras);

		let catalogo__cotizacionObras=validacionRegistro__retornables($("#catalogo__cotizacionObras"));
		paqueteDeDatos.append("catalogo__cotizacionObras",catalogo__cotizacionObras);

		let catalogo__licitacionObras=validacionRegistro__retornables($("#catalogo__licitacionObras"));
		paqueteDeDatos.append("catalogo__licitacionObras",catalogo__licitacionObras);

		let catalogo__precioObras=validacionRegistro__retornables($("#catalogo__precioObras"));
		paqueteDeDatos.append("catalogo__precioObras",catalogo__precioObras);

		let catalogo__contratacionDirecta=validacionRegistro__retornables($("#catalogo__contratacionDirecta"));
		paqueteDeDatos.append("catalogo__contratacionDirecta",catalogo__contratacionDirecta);

		let catalogo__contratacionListaCorta=validacionRegistro__retornables($("#catalogo__contratacionListaCorta"));
		paqueteDeDatos.append("catalogo__contratacionListaCorta",catalogo__contratacionListaCorta);

		let catalogo__contratacionConcursoPu=validacionRegistro__retornables($("#catalogo__contratacionConcursoPu"));
		paqueteDeDatos.append("catalogo__contratacionConcursoPu",catalogo__contratacionConcursoPu);

		let noAplica__3=validacionRegistro__retornables($("#noAplica__3"));
		paqueteDeDatos.append("noAplica__3",noAplica__3);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		    	var elementos=JSON.parse(response);

		    	var mensaje=elementos['mensaje'];

		   		alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});


			},
			error:function(){

			}
				
		});	

	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){}); 
	}); 

});

}
insertaValidaciones__parametros__contrataciones($("#guardarContrataciones__publicas"));



var insertaValidaciones__parametros__contrataciones__2=function(parametro1){

$(parametro1).click(function (e){

	e.preventDefault();	

	var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','insertar__tipo__de__contratacion');		

		var other_data = $('#formulario__tipo__contrataciones').serializeArray();

		$.each(other_data,function(key,input){
			paqueteDeDatos.append(input.name,input.value);
		});

		let idItemCatalogo=$("#idItemCatalogo").val();
		let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

		let catalogo__elect__texto=$("#catalogo__elect__texto__2").val();
		let catalogo__subasta__texto=$("#catalogo__subasta__texto__2").val();
		let catalogo__infima__texto=$("#catalogo__infima__texto__2").val();
		let catalogo__menorCuantia__texto=$("#catalogo__menorCuantia__texto__2").val();
		let catalogo__cotizacion__texto=$("#catalogo__cotizacion__texto__2").val();
		let catalogo__licitacion__texto=$("#catalogo__licitacion__texto__2").val();
		let catalogo__menorCuantiaObras__texto=$("#catalogo__menorCuantiaObras__texto__2").val();
		let catalogo__cotizacionObras__texto=$("#catalogo__cotizacionObras__texto__2").val();
		let catalogo__licitacionObras__texto=$("#catalogo__licitacionObras__texto__2").val();
		let catalogo__precioObras__texto=$("#catalogo__precioObras__texto__2").val();
		let catalogo__contratacionDirecta__texto=$("#catalogo__contratacionDirecta__texto__2").val();
		let catalogo__contratacionListaCorta__texto=$("#catalogo__contratacionListaCorta__texto__2").val();
		let catalogo__contratacionConcursoPu__texto=$("#catalogo__contratacionConcursoPu__texto__2").val();

		paqueteDeDatos.append("idActividad",2);

		paqueteDeDatos.append("catalogo__elect__texto",catalogo__elect__texto);
		paqueteDeDatos.append("catalogo__subasta__texto",catalogo__subasta__texto);
		paqueteDeDatos.append("catalogo__infima__texto",catalogo__infima__texto);
		paqueteDeDatos.append("catalogo__menorCuantia__texto",catalogo__menorCuantia__texto);
		paqueteDeDatos.append("catalogo__cotizacion__texto",catalogo__cotizacion__texto);
		paqueteDeDatos.append("catalogo__licitacion__texto",catalogo__licitacion__texto);
		paqueteDeDatos.append("catalogo__menorCuantiaObras__texto",catalogo__menorCuantiaObras__texto);
		paqueteDeDatos.append("catalogo__cotizacionObras__texto",catalogo__cotizacionObras__texto);
		paqueteDeDatos.append("catalogo__licitacionObras__texto",catalogo__licitacionObras__texto);
		paqueteDeDatos.append("catalogo__precioObras__texto",catalogo__precioObras__texto);
		paqueteDeDatos.append("catalogo__contratacionDirecta__texto",catalogo__contratacionDirecta__texto);
		paqueteDeDatos.append("catalogo__contratacionListaCorta__texto",catalogo__contratacionListaCorta__texto);
		paqueteDeDatos.append("catalogo__contratacionConcursoPu__texto",catalogo__contratacionConcursoPu__texto);


		paqueteDeDatos.append("idItemCatalogo",idItemCatalogo);
		paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);

		let catalogo__elect=validacionRegistro__retornables($("#catalogo__elect__2"));
		paqueteDeDatos.append("catalogo__elect",catalogo__elect);

		let catalogo__subasta=validacionRegistro__retornables($("#catalogo__subasta__2"));
		paqueteDeDatos.append("catalogo__subasta",catalogo__subasta);

		let catalogo__infima=validacionRegistro__retornables($("#catalogo__infima__2"));
		paqueteDeDatos.append("catalogo__infima",catalogo__infima);

		let catalogo__menorCuantia=validacionRegistro__retornables($("#catalogo__menorCuantia__2"));
		paqueteDeDatos.append("catalogo__menorCuantia",catalogo__menorCuantia);

		let catalogo__cotizacion=validacionRegistro__retornables($("#catalogo__cotizacion__2"));
		paqueteDeDatos.append("catalogo__cotizacion",catalogo__cotizacion);

		let catalogo__licitacion=validacionRegistro__retornables($("#catalogo__licitacion__2"));
		paqueteDeDatos.append("catalogo__licitacion",catalogo__licitacion);

		let catalogo__menorCuantiaObras=validacionRegistro__retornables($("#catalogo__menorCuantiaObras__2"));
		paqueteDeDatos.append("catalogo__menorCuantiaObras",catalogo__menorCuantiaObras);

		let catalogo__cotizacionObras=validacionRegistro__retornables($("#catalogo__cotizacionObras__2"));
		paqueteDeDatos.append("catalogo__cotizacionObras",catalogo__cotizacionObras);

		let catalogo__licitacionObras=validacionRegistro__retornables($("#catalogo__licitacionObras__2"));
		paqueteDeDatos.append("catalogo__licitacionObras",catalogo__licitacionObras);

		let catalogo__precioObras=validacionRegistro__retornables($("#catalogo__precioObras__2"));
		paqueteDeDatos.append("catalogo__precioObras",catalogo__precioObras);

		let catalogo__contratacionDirecta=validacionRegistro__retornables($("#catalogo__contratacionDirecta__2"));
		paqueteDeDatos.append("catalogo__contratacionDirecta",catalogo__contratacionDirecta);

		let catalogo__contratacionListaCorta=validacionRegistro__retornables($("#catalogo__contratacionListaCorta__2"));
		paqueteDeDatos.append("catalogo__contratacionListaCorta",catalogo__contratacionListaCorta);

		let catalogo__contratacionConcursoPu=validacionRegistro__retornables($("#catalogo__contratacionConcursoPu__2"));
		paqueteDeDatos.append("catalogo__contratacionConcursoPu",catalogo__contratacionConcursoPu);

		let noAplica__3=validacionRegistro__retornables($("#noAplica__3"));
		paqueteDeDatos.append("noAplica__3",noAplica__3);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		    	var elementos=JSON.parse(response);

		    	var mensaje=elementos['mensaje'];

		   		alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});


			},
			error:function(){

			}
				
		});	

	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){}); 
	}); 

});

}
insertaValidaciones__parametros__contrataciones__2($("#guardarContrataciones__publicas__2"));

var insertaValidaciones__parametros__contrataciones__3=function(parametro1){

$(parametro1).click(function (e){

	e.preventDefault();	

	var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','insertar__tipo__de__contratacion');		

		var other_data = $('#formulario__tipo__contrataciones').serializeArray();

		$.each(other_data,function(key,input){
			paqueteDeDatos.append(input.name,input.value);
		});

		let idItemCatalogo=$("#idItemCatalogo__3").val();
		let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

		

		let catalogo__elect__texto=$("#catalogo__elect__texto__3").val();
		let catalogo__subasta__texto=$("#catalogo__subasta__texto__3").val();
		let catalogo__infima__texto=$("#catalogo__infima__texto__3").val();
		let catalogo__menorCuantia__texto=$("#catalogo__menorCuantia__texto__3").val();
		let catalogo__cotizacion__texto=$("#catalogo__cotizacion__texto__3").val();
		let catalogo__licitacion__texto=$("#catalogo__licitacion__texto__3").val();
		let catalogo__menorCuantiaObras__texto=$("#catalogo__menorCuantiaObras__texto__3").val();
		let catalogo__cotizacionObras__texto=$("#catalogo__cotizacionObras__texto__3").val();
		let catalogo__licitacionObras__texto=$("#catalogo__licitacionObras__texto__3").val();
		let catalogo__precioObras__texto=$("#catalogo__precioObras__texto__3").val();
		let catalogo__contratacionDirecta__texto=$("#catalogo__contratacionDirecta__texto__3").val();
		let catalogo__contratacionListaCorta__texto=$("#catalogo__contratacionListaCorta__texto__3").val();
		let catalogo__contratacionConcursoPu__texto=$("#catalogo__contratacionConcursoPu__texto__3").val();

		let idActividadContraloria=$("#actividadGeneral__id").val();

		paqueteDeDatos.append("idActividad",idActividadContraloria);

		paqueteDeDatos.append("catalogo__elect__texto",catalogo__elect__texto);
		paqueteDeDatos.append("catalogo__subasta__texto",catalogo__subasta__texto);
		paqueteDeDatos.append("catalogo__infima__texto",catalogo__infima__texto);
		paqueteDeDatos.append("catalogo__menorCuantia__texto",catalogo__menorCuantia__texto);
		paqueteDeDatos.append("catalogo__cotizacion__texto",catalogo__cotizacion__texto);
		paqueteDeDatos.append("catalogo__licitacion__texto",catalogo__licitacion__texto);
		paqueteDeDatos.append("catalogo__menorCuantiaObras__texto",catalogo__menorCuantiaObras__texto);
		paqueteDeDatos.append("catalogo__cotizacionObras__texto",catalogo__cotizacionObras__texto);
		paqueteDeDatos.append("catalogo__licitacionObras__texto",catalogo__licitacionObras__texto);
		paqueteDeDatos.append("catalogo__precioObras__texto",catalogo__precioObras__texto);
		paqueteDeDatos.append("catalogo__contratacionDirecta__texto",catalogo__contratacionDirecta__texto);
		paqueteDeDatos.append("catalogo__contratacionListaCorta__texto",catalogo__contratacionListaCorta__texto);
		paqueteDeDatos.append("catalogo__contratacionConcursoPu__texto",catalogo__contratacionConcursoPu__texto);


		paqueteDeDatos.append("idItemCatalogo",idItemCatalogo);
		paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);

		let catalogo__elect=validacionRegistro__retornables($("#catalogo__elect__3"));
		paqueteDeDatos.append("catalogo__elect",catalogo__elect);

		let catalogo__subasta=validacionRegistro__retornables($("#catalogo__subasta__3"));
		paqueteDeDatos.append("catalogo__subasta",catalogo__subasta);

		let catalogo__infima=validacionRegistro__retornables($("#catalogo__infima__3"));
		paqueteDeDatos.append("catalogo__infima",catalogo__infima);

		let catalogo__menorCuantia=validacionRegistro__retornables($("#catalogo__menorCuantia__3"));
		paqueteDeDatos.append("catalogo__menorCuantia",catalogo__menorCuantia);

		let catalogo__cotizacion=validacionRegistro__retornables($("#catalogo__cotizacion__3"));
		paqueteDeDatos.append("catalogo__cotizacion",catalogo__cotizacion);

		let catalogo__licitacion=validacionRegistro__retornables($("#catalogo__licitacion__3"));
		paqueteDeDatos.append("catalogo__licitacion",catalogo__licitacion);

		let catalogo__menorCuantiaObras=validacionRegistro__retornables($("#catalogo__menorCuantiaObras__3"));
		paqueteDeDatos.append("catalogo__menorCuantiaObras",catalogo__menorCuantiaObras);

		let catalogo__cotizacionObras=validacionRegistro__retornables($("#catalogo__cotizacionObras__3"));
		paqueteDeDatos.append("catalogo__cotizacionObras",catalogo__cotizacionObras);

		let catalogo__licitacionObras=validacionRegistro__retornables($("#catalogo__licitacionObras__3"));
		paqueteDeDatos.append("catalogo__licitacionObras",catalogo__licitacionObras);

		let catalogo__precioObras=validacionRegistro__retornables($("#catalogo__precioObras__3"));
		paqueteDeDatos.append("catalogo__precioObras",catalogo__precioObras);

		let catalogo__contratacionDirecta=validacionRegistro__retornables($("#catalogo__contratacionDirecta__3"));
		paqueteDeDatos.append("catalogo__contratacionDirecta",catalogo__contratacionDirecta);

		let catalogo__contratacionListaCorta=validacionRegistro__retornables($("#catalogo__contratacionListaCorta__3"));
		paqueteDeDatos.append("catalogo__contratacionListaCorta",catalogo__contratacionListaCorta);

		let catalogo__contratacionConcursoPu=validacionRegistro__retornables($("#catalogo__contratacionConcursoPu__3"));
		paqueteDeDatos.append("catalogo__contratacionConcursoPu",catalogo__contratacionConcursoPu);


		let noAplica__3=validacionRegistro__retornables($("#noAplica__3"));
		paqueteDeDatos.append("noAplica__3",noAplica__3);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		    	var elementos=JSON.parse(response);

		    	var mensaje=elementos['mensaje'];

		   		alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});


			},
			error:function(){

			}
				
		});	

	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){}); 
	}); 

});

}
insertaValidaciones__parametros__contrataciones__3($("#guardarContrataciones__publicas__3"));

var insertaValidaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10){

$(parametro1).click(function (e){

	e.preventDefault();	

	$(".boton__enlacesOcultos").hide();

	$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	if (parametro3=="prompt") {

	    alertify.prompt('¿Está seguro de '+parametro2+'?', '', function(evt, value){ 

	       if (value=="") {

	          evt.cancel = true;

	          alertify.set('notifier','position', 'top-center');
	          alertify.notify('Es necesario ingresar la observación', 'error', 5, function(){});

	       }else{

			    var paqueteDeDatos = new FormData();

			    paqueteDeDatos.append('tipo','enviarDesicion');

			    var other_data = $('#'+parametro10).serializeArray();

			    $.each(other_data,function(key,input){
			        paqueteDeDatos.append(input.name,input.value);
			    });

			    var arrayValores = new Array(); 

			    $("#comentarioNecesario").val(value);

			    for (var i =0; i< parametro9.length ; i++) {
			    	
			    	if (parametro9[i]=="input") {

			    		var variableInput=$("#"+parametro8[i]).val();

			    		arrayValores.push(variableInput);

			    	}else{

			    		arrayValores.push(parametro8[i]);


			    	}

			    }
			 
				paqueteDeDatos.append("tabla",parametro4);
				paqueteDeDatos.append("campos",JSON.stringify(parametro5));
				paqueteDeDatos.append("parametros",JSON.stringify(parametro6));
				paqueteDeDatos.append("valores",JSON.stringify(arrayValores));
				paqueteDeDatos.append("parametrosEnvio",JSON.stringify(parametro7));

				$.ajax({

				    type:"POST",
				    url:"modelosBd/inserta/insertaAcciones.md.php",
				    contentType: false,
				    data:paqueteDeDatos,
				    processData: false,
				    cache: false, 
			    	success:function(response){

		            	var elementos=JSON.parse(response);

		            	var mensaje=elementos['mensaje'];

						if(mensaje==1){

				            alertify.set("notifier","position", "top-center");
				            alertify.notify("Registro realizado correctamente", "success", 5, function(){});


				            window.setTimeout(function(){ 

				            	location.reload();

				            } ,5000); 

		            	}

					},
					error:function(){

					}
				
				});	


	       }	    	

	    }, function(){ 

	         alertify.set("notifier","position", "top-center");
	         alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();

				$('.reload__Enviosrealizados').html(' ');

	         });

	    });

	}else{

		var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro4);		

			var other_data = $('#'+parametro8).serializeArray();

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
			});

			var emailPrincipal=$("#emailPrincipal").val();
			var nombrePrincipalU=$("#nombrePrincipalU").val();
			var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

			paqueteDeDatos.append("emailPrincipal",emailPrincipal);
			paqueteDeDatos.append("tabla",parametro5);
			paqueteDeDatos.append("valoresArray",JSON.stringify(parametro6));
			paqueteDeDatos.append("idBuscado",parametro7);
			paqueteDeDatos.append("nombrePrincipalU",nombrePrincipalU);
			paqueteDeDatos.append("idOrganismoPrincipal",idOrganismoPrincipal);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

		          	var elementos=JSON.parse(response);

		          	var mensaje=elementos['mensaje'];

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Registro realizado correctamente", "success", 5, function(){});

				   	 	window.setTimeout(function(){ 

				        	location.reload();

				    	} ,5000); 

		          	}

				},
				error:function(){

				}
				
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 

	}


});

}
insertaValidaciones($("#generarNegacion"),"negar la solicitud. Escribir la razón de negación","prompt",'poa_observaciones',['`idObservaciones`, `observacion`, `tipoObservacion`, `idOrganismo`, `fecha`, `estado`'],[':observacion, ',':tipoObservacion, ',':idOrganismo, ',':fecha, ',':estado'],[':observacion',':tipoObservacion',':idOrganismo',':fecha',':estado'],['comentarioNecesario','aprobacionUsuario','enviado','fechaPrincipalJ','A'],['input','texto','input','input','texto'],"formularioAprobacion");

insertaValidaciones($("#generarAprobacion"),"aprobar la solicitud.","confirm","aprobarSolicitudUsuario",'poa_organismo',['D'],'idOrganismo',"formularioAprobacion");


insertaValidaciones($("#respuestaAprobacion")," de haber realizado las correcciones sugeridas","confirm","aprobacionUsuarioR",'poa_observaciones',['C'],'idOrganismo',"observacionesForm");



var insertaValidacionesDos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

$(parametro1).click(function (e){

	$(".boton__enlacesOcultos").hide();

	$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


	var validador= validacionRegistro($(".campos__obligatorios"));
	validacionRegistroMostrarErrores($(".campos__obligatorios"));

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(".boton__enlacesOcultos").show();

		$('.reload__Enviosrealizados').html(' ');	

		e.preventDefault();		

	}else{	

		alertify.set("notifier","position", "top-center");
		alertify.notify("Asignación realizada correctamente", "success", 5, function(){});

		window.setTimeout(function(){ 

				location.reload();

		} ,5000); 		

	}

});

}

insertaValidacionesDos($("#insertarAsignacion")," de la información ingresada","confirm","asignacionPresupuestos","formAsignar");


/*=========================================
=            Enviar documentos            =
=========================================*/

var documentosFinancieros=function(parametro1,parametro2,parametro3){

$(parametro1).click(function (e){

	var validador= validacionRegistro($(".obligatorios__archivos"));
	validacionRegistroMostrarErrores($(".obligatorios__archivos"));



	$(parametro1).hide();
	$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Todos los documentos con * son obligatorios", "error", 5, function(){});

		$(parametro1).show();
		$('.reload__Enviosrealizados').html(' ');

	}else{

		var confirm= alertify.confirm('¿Está seguro de enviar los documentos para ser válidados?','¿Está seguro de enviar los documentos para ser válidados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo		


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro3);	

			let idOrganismo=$("#organismoIdPrin").val();
			paqueteDeDatos.append('idOrganismo',idOrganismo);	

			for (var i=0; i<parametro2.length;i++) {

				if ($(parametro2[i]).val()=="texto") {

					paqueteDeDatos.append('archivo'+i, $(parametro2[i]).val());

				}else{

					paqueteDeDatos.append('archivo'+i, $(parametro2[i])[0].files[0]);

				}	

				
			}

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAccionesDos.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

		          	var elementos=JSON.parse(response);

		          	var mensaje=elementos['mensaje'];

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Registro realizado satisfactoriamente", "success", 5, function(){});

				   	 	window.setTimeout(function(){ 

				        	location.reload();

				    	} ,5000); 

		          	}

				},
				error:function(){

				}
				
			});	


		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(parametro1).show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 


	}


});

}

documentosFinancieros($("#enviarTramitesFinancieros"),[$("#polizaVigencia"),$("#caucionOriginal"),$("#copiaBancario"),$("#copiaRegistro__directorio"),$("#copiaFinanciero"),$("#copiaGeneral"),$("#copiaIntervencion"),$("#copiaEstatutos"),$("#copiaRucA")],"asignarDocus__financieros");

/*=====  End of Enviar documentos  ======*/



/*=======================================
=            Enviar correos             =
=======================================*/

var enviarCorreosIniciales=function(parametro1,parametro2,parametro3,parametro4){

$(parametro1).click(function (e){

	e.preventDefault();	

	$(".boton__enlacesOcultos").hide();

	$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var validador= validacionRegistro($(".campos__obligatorios"));
	validacionRegistroMostrarErrores($(".campos__obligatorios"));

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(".boton__enlacesOcultos").show();

		$('.reload__Enviosrealizados').html(' ');

	}else{	

		var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro3);		

			var other_data = $('.'+parametro4).serializeArray();

			var organismoIdPrin=$("#organismoIdPrin").val();

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
			});

			paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAccionesDos.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

		          	var elementos=JSON.parse(response);

		          	var mensaje=elementos['mensaje'];

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

				   	 	window.setTimeout(function(){ 

				        	location.reload();

				    	} ,5000); 

		          	}

				},
				error:function(){

				}
				
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 

	}

});

}

enviarCorreosIniciales($("#enviarMensajeCon")," de enviar el mensaje","mensajeContacto","formInforOrganismos");
enviarCorreosIniciales($("#enviarPreliminar")," de enviar el poa preliminar","preliminarPoa","formulario__preliminarEnvio");
enviarCorreosIniciales($("#guardarInfor__i")," de crear la intervención","intervencion","formulario__intervencion");


/*=====  End of Enviar correos   ======*/

/*==========================================
=            Enviar información            =
==========================================*/

var ediciones__conArchivos=function(parametro1,parametro2,parametro3,parametro4){

$(parametro1).click(function (e){

	e.preventDefault();	

	$(".boton__enlacesOcultos").hide();

	$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var validador= validacionRegistro($(".campos__obligatorios"));
	validacionRegistroMostrarErrores($(".campos__obligatorios"));

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(".boton__enlacesOcultos").show();

		$('.reload__Enviosrealizados').html(' ');

	}else{	

		var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
			  
			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro3);		

			var other_data = $('.'+parametro4).serializeArray();

			var organismoIdPrin=$("#organismoIdPrin").val();

			$.each(other_data,function(key,input){
				paqueteDeDatos.append(input.name,input.value);
			});

			paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);

			paqueteDeDatos.append('documentoFinal', $('#documentos__nue')[0].files[0]);

			if ($('#documentos__nue')[0].files[0]!="" && $('#documentos__nue')[0].files[0]!=undefined) {
				paqueteDeDatos.append('estaDocumento','si');
			}else{
				paqueteDeDatos.append('estaDocumento','no');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAccionesDos.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

		          	var elementos=JSON.parse(response);

		          	var mensaje=elementos['mensaje'];

					if(mensaje==1){

				    	alertify.set("notifier","position", "top-center");
				    	alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

				   	 	window.setTimeout(function(){ 

				        	location.reload();

				    	} ,5000); 

		          	}

				},
				error:function(){

				}
				
			});	

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(".boton__enlacesOcultos").show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 

	}

});

}

ediciones__conArchivos($("#editarInfor")," de editar la información","editasInfor__final","form__editarInfors");

/*=====  End of Enviar información  ======*/


var eliminar__datosI=function(parametro1,parametro2,parametro3){

$(parametro1).click(function (e){

	e.preventDefault();	

	$(parametro1).hide();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo',parametro3);	

	let organismoId=$("#organismoId").val();

	paqueteDeDatos.append("organismoId",organismoId);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/insertaAccionesDos.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

		     var elementos=JSON.parse(response);

		     var mensaje=elementos['mensaje'];

			if(mensaje==1){

				alertify.set("notifier","position", "top-center");
				alertify.notify("Eliminación realizada satisfactoriamente", "success", 5, function(){});

				window.setTimeout(function(){ 

					location.reload();

				} ,5000); 

		     }

		},
		error:function(){

		}
				
	});	


});

}

eliminar__datosI($("#eliminarInfor")," de eliminar la intervención","eliminar_intervencion");


var documentos__finan__rectificados=function(parametro1,parametro2){

$(parametro1).click(function (e){


	e.preventDefault();	

	$(parametro1).hide();

	var confirm= alertify.confirm('¿Está seguro de enviar el archivo seleccionado?','¿Está seguro de enviar el archivo seleccionado?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','rectificacion__docus__financieros');	

		let organismoId=$("#organismoIdPrin").val();

		let tipologia=$(parametro1).attr('attr');



		paqueteDeDatos.append("organismoId",organismoId);
		paqueteDeDatos.append("tipologia",tipologia);
		paqueteDeDatos.append("archivo",$('#'+parametro2)[0].files[0]);


		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAccionesDos.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

			     var elementos=JSON.parse(response);

			     var mensaje=elementos['mensaje'];

				if(mensaje==2){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Obligatorio cargar archivo", "error", 5, function(){});

					$(parametro1).show();

			    }

				if(mensaje==1){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

					window.setTimeout(function(){ 

						location.reload();

					} ,5000); 

			     }		    

			},
			error:function(){

			}
					
		});	

	}); 

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){

			$(parametro1).show();

		}); 
	}); 

});

}

documentos__finan__rectificados($("#guardarRechazo__poliza"),"polizaVigencia");
documentos__finan__rectificados($("#guardarRechazoCaucion"),"caucionOriginal");
documentos__finan__rectificados($("#guardarRechazoCertificado__bancario"),"copiaBancario");
documentos__finan__rectificados($("#guardarRechazoCopia__registroD"),"copiaRegistro__directorio");
documentos__finan__rectificados($("#guardarRechazoVisualiza__financiero"),"copiaFinanciero");
documentos__finan__rectificados($("#guardarRechazo__copiaAdmin__general"),"copiaGeneral");
documentos__finan__rectificados($("#guardarRechazo__copia__intervencion"),"copiaIntervencion");
documentos__finan__rectificados($("#guardarRechazo__copia__acuerdo__registro"),"copiaEstatutos");
documentos__finan__rectificados($("#guardarRechazo__copia__acuerdo__registro__ruc"),"copiaRucA");

/*==============================================================
=            Ingresar informaciòn tabla de formulas            =
==============================================================*/

function formulasConcatenar__unicos__valores(parametro1){
	
	let array = new Array(); 

	let bandera=false;

	let attr=0;

    $(parametro1).each(function(index) {

    	array.push($(this).val()+"___"+$(this).attr('attr'));

    });

    return array;

}


var funcion__tabla__formulas__envios=function(parametro1){

$(parametro1).click(function (e){


	e.preventDefault();	

	// $(parametro1).hide();

	var validador= validacionRegistro($(".obligatorios"));
	validacionRegistroMostrarErrores($(".obligatorios"));

	let opciones__agregadas__enlzadas = formulasConcatenar__unicos__valores($(".opciones__agregadas__enlzadas"));
	let formulas__concatenadas = formulasConcatenar__unicos__valores($(".formulas__concatenadas"));


	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(parametro1).show();

	}else{

		var confirm= alertify.confirm('¿Está seguro de guardar la mátriz?','¿Está seguro de guardar la mátriz?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','matrices__guardas');	

			let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
			let proyectos__escogidos__activities=$("#proyectos__escogidos__activities").val();
			let actividades__rubros=$("#actividades__rubros").val();
			let matriz__auxiliar=$("#matriz__auxiliar").val();

			let nombre__columnas = concatenarValores($(".nombre__columnas"));
			let tipo__columna = concatenarValores($(".tipo__columna"));

			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
			paqueteDeDatos.append("proyectos__escogidos__activities",proyectos__escogidos__activities);
			paqueteDeDatos.append("actividades__rubros",actividades__rubros);
			paqueteDeDatos.append("matriz__auxiliar",matriz__auxiliar);
			paqueteDeDatos.append("nombre__columnas",JSON.stringify(nombre__columnas));
			paqueteDeDatos.append("tipo__columna",JSON.stringify(tipo__columna));

			paqueteDeDatos.append("opciones__agregadas__enlzadas",JSON.stringify(opciones__agregadas__enlzadas));
			paqueteDeDatos.append("formulas__concatenadas",JSON.stringify(formulas__concatenadas));

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				     var elementos=JSON.parse(response);

				     var mensaje=elementos['mensaje'];

					if(mensaje==1){

						alertify.set("notifier","position", "top-center");
						alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

						window.setTimeout(function(){ 

							location.reload();

						} ,5000); 

				     }		    

				},
				error:function(){

				}
						
			});	

		}); 

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(parametro1).show();

			}); 
		}); 

	}


});

}

funcion__tabla__formulas__envios($("#guardaMatriz__enlaces"));

/*=====  End of Ingresar informaciòn tabla de formulas  ======*/

/*=================================================
=            guardar organismos esigef            =
=================================================*/

var funcion__organismos__esigef=function(parametro1){

$(parametro1).click(function (e){


	e.preventDefault();	

	$(parametro1).hide();

	var validador= validacionRegistro($(".obligatorios"));
	validacionRegistroMostrarErrores($(".obligatorios"));

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(parametro1).show();

	}else{

		var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','esigef');	

			let organismosSegumiento=$("#organismosSegumiento").val();
			let idUsuarioC=$("#idUsuarioC").val();

			paqueteDeDatos.append("organismosSegumiento",organismosSegumiento);
			paqueteDeDatos.append("idUsuarioC",idUsuarioC);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				     var elementos=JSON.parse(response);

				     var mensaje=elementos['mensaje'];

					if(mensaje==1){

						alertify.set("notifier","position", "top-center");
						alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

						window.setTimeout(function(){ 

							location.reload();

						} ,5000); 

				     }		    

				},
				error:function(){

				}
						
			});	

		}); 

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(parametro1).show();

			}); 
		}); 

	}


});

}

funcion__organismos__esigef($("#agregarOrganismoEsigef"));

/*=====  End of guardar organismos esigef  ======*/

/*==============================================================
=            Enviar información modificaciones 2022            =
==============================================================*/

var enviar__poa__2022__mod=function(parametro1){

$(parametro1).click(function (e){

	e.preventDefault();	

	$(this).hide();

	var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','ingreso__modificaciones__2022');	

		let idOrganismo=$("#organismoIdPrin").val();

		paqueteDeDatos.append("idOrganismos",idOrganismo);


		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				var elementos=JSON.parse(response);

				var mensaje=elementos['mensaje'];

				if(mensaje==1){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

					window.setTimeout(function(){ 

						location.reload();

					} ,5000); 

				}		    

			},
				error:function(){

			}
							
		});	

	}); 

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){

			$(parametro1).show();

		}); 
	}); 

});

}

enviar__poa__2022__mod($("#enviarModificas__2022"));

/*=====  End of Enviar información modificaciones 2022  ======*/

/*=======================================
=            Acciones nuevas            =
=======================================*/

var enviar__ediciones__montos__eventuales=function(parametro1,parametro2,parametro3){

$(parametro1).click(function (e){

	e.preventDefault();	

	let suma=0;

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','editar__eventos__inicial__tables__dos');	

	let idOrganismo=$("#organismoIdPrin").val();

	paqueteDeDatos.append("idOrganismos",idOrganismo); 

	let enero=$('input[name="enero__2"]').val();
	let febrero=$('input[name="febrero__2"]').val();
	let marzo=$('input[name="marzo__2"]').val();
	let abril=$('input[name="abril__2"]').val();
	let mayo=$('input[name="mayo__2"]').val();
	let junio=$('input[name="junio__2"]').val();
	let julio=$('input[name="julio__2"]').val();
	let agosto=$('input[name="agosto__2"]').val();
	let septiembre=$('input[name="septiembre__2"]').val();
	let octubre=$('input[name="octubre__2"]').val();
	let noviembre=$('input[name="noviembre__2"]').val();
	let diciembre=$('input[name="diciembre__2"]').val();
	let totalSumatoriasMontos__dos=$('input[name="totalSumatoriasMontos__dos"]').val();


	paqueteDeDatos.append("enero",enero);
	paqueteDeDatos.append("febrero",febrero);
	paqueteDeDatos.append("marzo",marzo);
	paqueteDeDatos.append("abril",abril);
	paqueteDeDatos.append("mayo",mayo);
	paqueteDeDatos.append("junio",junio);
	paqueteDeDatos.append("julio",julio);
	paqueteDeDatos.append("agosto",agosto);
	paqueteDeDatos.append("septiembre",septiembre);
	paqueteDeDatos.append("octubre",octubre);
	paqueteDeDatos.append("noviembre",noviembre);
	paqueteDeDatos.append("diciembre",diciembre);
	paqueteDeDatos.append("totalSumatoriasMontos__dos",totalSumatoriasMontos__dos);

	paqueteDeDatos.append("proyectoHidden",$('#proyectoHidden').prop('value'));

	var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/insertaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

				var elementos=JSON.parse(response);

				var mensaje=elementos['mensaje'];

				if(mensaje==1){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});


				}	

		},
		error:function(){

		}
								
	});	

}); 

confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
	alertify.set("notifier","position", "top-center");
	alertify.notify("Acción cancelada", "error", 1, function(){

		$(parametro1).show();

	}); 
}); 		

});

}

enviar__ediciones__montos__eventuales($("#editar__principal__eventos__necesarios__montos__dos"));


/*=====  End of Acciones nuevas  ======*/

/*===========================================================
=            Insertar remanentes administradores            =
===========================================================*/

var enviar__remanentes__admini=function(parametro1,parametro2,parametro3){

$(parametro1).click(function (e){

	var validador= validacionRegistro($(".obligatorios__elementos"));
	validacionRegistroMostrarErrores($(".obligatorios__elementos"));

	$(parametro1).hide();

	// if (validador==false) {

	// 	alertify.set("notifier","position", "top-center");
	// 	alertify.notify("Todos los campos son obligatorios", "error", 5, function(){});

	// 	$(parametro1).show();

	// }else{

		var confirm= alertify.confirm('¿Está seguro de realizar el registro?','¿Está seguro de realizar el registro?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo		


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','insertar__remanentes__administrador');	

			let idOrganismo=$("#organismoIdPrin__realizados").val();
			paqueteDeDatos.append('idOrganismo',idOrganismo);	

			let monto__incrementoRemantes=$("#monto__incrementoRemantes").val();
			let monto__autogestion=$("#monto__autogestion").val();


			paqueteDeDatos.append('archivo', $("#archivo__saldoEstados")[0].files[0]);
			paqueteDeDatos.append('monto__incrementoRemantes',monto__incrementoRemantes);
			paqueteDeDatos.append('monto__autogestion',monto__autogestion);


			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){


				var elementos=JSON.parse(response);

				var mensaje=elementos['mensaje'];

				if(mensaje==1){

					alertify.set("notifier","position", "top-center");
					alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});

				    window.setTimeout(function(){ 

				    	location.reload();

				    } ,5000); 

				}	

				},
				error:function(){

				}
				
			});	


		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(parametro1).show();
				$('.reload__Enviosrealizados').html(' ');

			}); 
		}); 


	// }


});

}

enviar__remanentes__admini($("#enviarRemanentes__administrador"));

/*=====  End of Insertar remanentes administradores  ======*/



});