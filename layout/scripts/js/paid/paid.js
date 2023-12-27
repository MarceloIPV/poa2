$(document).ready(function () {

/*===========================================================
=            Enviar notificaciones del analistas            =
===========================================================*/

var aprobacion__final__tres__paid__analista__directores=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		e.preventDefault();

		//$(parametro1).hide();

		var confirm= alertify.confirm('¿Está seguro de enviar la información?','¿Está seguro de enviar la información?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo


		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','reasignacion__paid__users__recomendar__segundos__final__aprobacion__funcionarios__directores');

		let idOrganismo=$("#idOrganismoPaid").val();
		let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
		let fisicamenteE=$("#fisicamenteE").val();
		let idRolAd=$("#idRolAd").val();
		let observaciones=$("#observa__recomienda__directores__planificacion").val();


		paqueteDeDatos.append("idOrganismo",idOrganismo);
		paqueteDeDatos.append("etapa",6);
		paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
		paqueteDeDatos.append("observaciones",observaciones);

		paqueteDeDatos.append("idRolAd",idRolAd);
		paqueteDeDatos.append("fisicamenteE",fisicamenteE);


		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
							data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

			    let elementos=JSON.parse(response);

			    let mensaje=elementos['mensaje'];

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
		alertify.notify("Acción cancelada", "error", 2, function(){

			$(parametro1).show();

		}); 
	}); 		

});

}

aprobacion__final__tres__paid__analista__directores($("#guardarRecomendacion__director__planificacion__analista"));

/*=====  End of Enviar notificaciones del analistas  ======*/


/*===============================================
=            Observaciones notificar            =
===============================================*/

var notificar__observaciones__paid__organismo__deportivo=function(parametro1,parametro2){

$(parametro1).click(function(e){



	e.preventDefault();

	var confirm= alertify.confirm('¿Está seguro de enviar la observación?','¿Está seguro de enviar la observación?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo


	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','negacion__paid__director__organismos');

	let idOrganismo=$("#idOrganismoPaid").val();
	let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
			

	paqueteDeDatos.append("idOrganismo",idOrganismo);
	paqueteDeDatos.append("etapa",8);
	paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/insertaAcciones.md.php",
		contentType: false,
							data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			 let elementos=JSON.parse(response);

			 let mensaje=elementos['mensaje'];

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
		alertify.notify("Acción cancelada", "error", 2, function(){
		}); 
	}); 		


});


}

notificar__observaciones__paid__organismo__deportivo($("#enviarObservacionesOrganismoDeportivo"));

/*=====  End of Observaciones notificar  ======*/


/*===============================================
=            Observaciones notificar            =
===============================================*/

var notificar__observaciones__paid=function(parametro1,parametro2){

$(parametro1).click(function(e){



	e.preventDefault();

	var confirm= alertify.confirm('¿Está seguro de observar a la organización deportiva?','¿Está seguro de observar a la organización deportiva?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo


	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','negacion__paid__analista');

	let idOrganismo=$("#idOrganismoPaid").val();
	let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
	let observaciones__recomendaciones__recomiendas__negacion=$("#observaciones__recomendaciones__recomiendas__negacion").val();
			

	paqueteDeDatos.append("idOrganismo",idOrganismo);
	paqueteDeDatos.append("etapa",9);
	paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
	paqueteDeDatos.append("observaciones__recomendaciones__recomiendas__negacion",observaciones__recomendaciones__recomiendas__negacion);

	let other_data = $('#formReenvio__paid').serializeArray();

	$.each(other_data,function(key,input){
		paqueteDeDatos.append(input.name,input.value);
	});

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/insertaAcciones.md.php",
		contentType: false,
							data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			 let elementos=JSON.parse(response);

			 let mensaje=elementos['mensaje'];

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
		alertify.notify("Acción cancelada", "error", 2, function(){
		}); 
	}); 		


});


}

notificar__observaciones__paid($("#guardarNegacion__paid"));

/*=====  End of Observaciones notificar  ======*/


var aprobacion__final__tres__paid=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		e.preventDefault();

		//$(parametro1).hide();

		if ($("#resolucion__aprobacion").val()=="" || $("#resolucion__aprobacion").val()=="") {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar resolución de aprobación", "error", 5, function(){});

		}else{

			var confirm= alertify.confirm('¿Está seguro de enviar la información?','¿Está seguro de enviar la información?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivo


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','reasignacion__paid__users__recomendar__segundos__final__aprobacion');

			let idOrganismo=$("#idOrganismoPaid").val();
			let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
			let fisicamenteE=$("#fisicamenteE").val();
			let idRolAd=$("#idRolAd").val();
			let observaciones=$("#observaciones__recomendaciones__recomiendas__final").val();


			paqueteDeDatos.append("idOrganismo",idOrganismo);
			paqueteDeDatos.append("etapa",1);
			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
			paqueteDeDatos.append("observaciones",observaciones);

			paqueteDeDatos.append("idRolAd",idRolAd);
			paqueteDeDatos.append("fisicamenteE",fisicamenteE);

			paqueteDeDatos.append('resolucion__aprobacion', $('#resolucion__aprobacion')[0].files[0]);
			

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
							data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	let elementos=JSON.parse(response);

			    	let mensaje=elementos['mensaje'];

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
				alertify.notify("Acción cancelada", "error", 2, function(){

					$(parametro1).show();

				}); 
			}); 		


		}


	});

}

aprobacion__final__tres__paid($("#guardarRecomendacion__final__paid"));

/*=====================================
=            Recomiendas 2            =
=====================================*/

var reasignacion__paid__recomendacion__dos=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		e.preventDefault();

		//$(parametro1).hide();

		let fisicamenteE=$("#fisicamenteE").val();

		let atributo = $("#selectorUsuarios__asignar__contrarios option:selected").attr('attr');
		let atributo2 = $("#selectorUsuarios__asignar__contrarios__subsecretarias option:selected").attr('attr');
		let identificador=$("#identificador").val();

		$("#selectorUsuarios__asignar__plani__analistas").removeClass('error');
		$("#selectorUsuarios__asignar__plani__directores").removeClass('error');
		$("#selectorUsuarios__asignar__plani__coordinadores").removeClass('error');
		$("#selectorUsuarios__asignar__contrarios__subsecretarias").removeClass('error');
		$("#selectorUsuarios__asignar__contrarios").removeClass('error');


		if ($("#idRolAd").val()==3 && fisicamenteE==18 && ($("#selectorUsuarios__asignar__plani__analistas").val()=="" || $("#selectorUsuarios__asignar__plani__analistas").val()==" ")) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar el usuario a reasignar", "error", 5, function(){});

			$("#selectorUsuarios__asignar__plani__analistas").addClass('error');

		}else if($("#idRolAd").val()==2 && fisicamenteE==18 && ($("#selectorUsuarios__asignar__plani__directores").val()=="" || $("#selectorUsuarios__asignar__plani__directores").val()==" ")){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar el usuario a reasignar", "error", 5, function(){});

			$("#selectorUsuarios__asignar__plani__directores").addClass('error');

		}else if($("#idRolAd").val()==4 && fisicamenteE==3 && ($("#selectorUsuarios__asignar__plani__coordinadores").val()=="" || $("#selectorUsuarios__asignar__plani__coordinadores").val()==" ")){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar el usuario a reasignar", "error", 5, function(){});

			$("#selectorUsuarios__asignar__plani__coordinadores").addClass('error');


		}else if($("#idRolAd").val()==7 && ($("#selectorUsuarios__asignar__contrarios__subsecretarias").val()=="" || $("#selectorUsuarios__asignar__contrarios__subsecretarias").val()==" ")){


			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar el usuario a reasignar", "error", 5, function(){});

			$("#selectorUsuarios__asignar__contrarios__subsecretarias").addClass('error');


		}else if(($("#selectorUsuarios__asignar__contrarios").val()=="" || $("#selectorUsuarios__asignar__contrarios").val()==" ") && ($("#idRolAd").val()!=3 && fisicamenteE!=18) && (fisicamenteE!=18)  && ($("#idRolAd").val()!=4 && fisicamenteE!=3) && ($("#idRolAd").val()!=7)){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar el usuario a reasignar", "error", 5, function(){});

			$("#selectorUsuarios__asignar__contrarios").addClass('error');



		}else if(($("#archivoRecomendacion").val()=="" || $("#archivoRecomendacion").val()==" ") && atributo=="superior" && ($("#idRolAd").val()!=3 && fisicamenteE!=18) && (fisicamenteE!=18)  && ($("#idRolAd").val()!=4 && fisicamenteE!=3) && ($("#idRolAd").val()!=7)){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio cargar el informe con la firma", "error", 5, function(){});

			$("#selectorUsuarios__asignar__contrarios").addClass('error');


		}else if($("#idRolAd").val()==7 && ($("#archivoRecomendacion").val()=="" || $("#archivoRecomendacion").val()==" ") && atributo2=="superior"){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio cargar el informe con la firma", "error", 5, function(){});

			$("#selectorUsuarios__asignar__contrarios__subsecretarias").addClass('error');


		}else{	

			var confirm= alertify.confirm('¿Está seguro de enviar la información?','¿Está seguro de enviar la información?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivo


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','reasignacion__paid__users__recomendar__segundos');

			let idOrganismo=$("#idOrganismoPaid").val();
			let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
			
			let idRolAd=$("#idRolAd").val();
			let observaciones=$("#observaciones").val();

			if($("#idRolAd").val()==3 && fisicamenteE==18){

				let selectorUsuarios__asignar__contrarios=$("#selectorUsuarios__asignar__plani__analistas").val();
				paqueteDeDatos.append("selectorUsuarios__asignar__contrarios",selectorUsuarios__asignar__contrarios);

			}else if($("#idRolAd").val()==2 && fisicamenteE==18){

				let selectorUsuarios__asignar__contrarios=$("#selectorUsuarios__asignar__plani__directores").val();
				paqueteDeDatos.append("selectorUsuarios__asignar__contrarios",selectorUsuarios__asignar__contrarios);

			}else if($("#idRolAd").val()==4 && fisicamenteE==3){

				let selectorUsuarios__asignar__contrarios=$("#selectorUsuarios__asignar__plani__coordinadores").val();
				paqueteDeDatos.append("selectorUsuarios__asignar__contrarios",selectorUsuarios__asignar__contrarios);

			}else if ($("#idRolAd").val()==7) {

				let selectorUsuarios__asignar__contrarios=$("#selectorUsuarios__asignar__contrarios__subsecretarias").val();
				paqueteDeDatos.append("selectorUsuarios__asignar__contrarios",selectorUsuarios__asignar__contrarios);

				paqueteDeDatos.append('documentoFinal', $('#archivoRecomendacion')[0].files[0]);

			}else{

				let selectorUsuarios__asignar__contrarios=$("#selectorUsuarios__asignar__contrarios").val();
				paqueteDeDatos.append("selectorUsuarios__asignar__contrarios",selectorUsuarios__asignar__contrarios);

				paqueteDeDatos.append('documentoFinal', $('#archivoRecomendacion')[0].files[0]);

			}

			paqueteDeDatos.append("idOrganismo",idOrganismo);
			paqueteDeDatos.append("etapa",1);
			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
			paqueteDeDatos.append("observaciones",observaciones);

			paqueteDeDatos.append("idRolAd",idRolAd);
			paqueteDeDatos.append("fisicamenteE",fisicamenteE);
			paqueteDeDatos.append("identificador",identificador);
			

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
							data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	let elementos=JSON.parse(response);

			    	let mensaje=elementos['mensaje'];

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
				alertify.notify("Acción cancelada", "error", 2, function(){

					$(parametro1).show();

				}); 
			}); 		


		}

	});

}

reasignacion__paid__recomendacion__dos($("#guardarReasignacion__paid__recomendacion"));


/*=====  End of Recomiendas 2  ======*/



/*========================================================
=             Guardar asignaciones recomendar            =
========================================================*/

var reasignacion__paid__recomendacion=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		e.preventDefault();

		//$(parametro1).hide();

		if ($('#archivoRecomendacion').val()=="" || $('#archivoRecomendacion').val()==" ") {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio cargar el informe para recomendar", "error", 5, function(){});

		}else{

			var confirm= alertify.confirm('¿Está seguro de enviar la información?','¿Está seguro de enviar la información?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivoh


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','reasignacion__paid__users__recomendar');

			let idOrganismo=$("#idOrganismoPaid").val();
			let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
			let identificador=$("#identificador").val();
			let observaciones__recomendaciones__recomiendas=$("#observaciones__recomendaciones__recomiendas").val();

			paqueteDeDatos.append('documentoFinal', $('#archivoRecomendacion')[0].files[0]);

			paqueteDeDatos.append("idOrganismo",idOrganismo);
			paqueteDeDatos.append("etapa",1);
			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
			paqueteDeDatos.append("identificador",identificador);
			paqueteDeDatos.append("observaciones__recomendaciones__recomiendas",observaciones__recomendaciones__recomiendas);

			 let other_data = $('#formReenvio__paid').serializeArray();

			 $.each(other_data,function(key,input){
			    paqueteDeDatos.append(input.name,input.value);
			 });

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
							data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	let elementos=JSON.parse(response);

			    	let mensaje=elementos['mensaje'];

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
				alertify.notify("Acción cancelada", "error", 2, function(){

					$(parametro1).show();

				}); 
			}); 		

		}

	});

}

reasignacion__paid__recomendacion($("#guardarRecomendacion__paid"));

/*=====  End of  Guardar asignaciones recomendar  ======*/


/*============================================
=            Guardar asignaciones            =
============================================*/


var reasignacion__paid=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		$("#selectorUsuarios__asignar").removeClass('error');

		if ($("#selectorUsuarios__asignar").val()=="" || $("#selectorUsuarios__asignar").val()==" ") {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar el usuario a reasignar", "error", 5, function(){});

			$("#selectorUsuarios__asignar").addClass('error');

		}else{

			e.preventDefault();

			//$(parametro1).hide();

			var confirm= alertify.confirm('¿Está seguro de enviar la información?','¿Está seguro de enviar la información?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivo


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','reasignacion__paid__users');

			let idOrganismo=$("#idOrganismoPaid").val();
			let selectorUsuarios__asignar=$("#selectorUsuarios__asignar").val();
			let observaciones=$("#observaciones").val();
			let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();
			let identificador=$("#identificador").val();

			paqueteDeDatos.append("idOrganismo",idOrganismo);
			paqueteDeDatos.append("selectorUsuarios__asignar",selectorUsuarios__asignar);
			paqueteDeDatos.append("observaciones",observaciones);
			paqueteDeDatos.append("etapa",0);
			paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);

			paqueteDeDatos.append("identificador",identificador);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
							data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

			    	let elementos=JSON.parse(response);

			    	let mensaje=elementos['mensaje'];

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
				alertify.notify("Acción cancelada", "error", 2, function(){

					$(parametro1).show();

				}); 
			}); 		

		}


	});

}

reasignacion__paid($("#guardarReasignacion__paid"));

/*=====  End of Guardar asignaciones  ======*/


/*=============================================
=            Validaciones globales            =
=============================================*/

$.getScript("layout/scripts/js/validaGlobal.js",function(){

	sumarIndicadoresGlobal($(".enlaces__sumas"),$("#techo__presupuestario"));

});

/*=====  End of Validaciones globales  ======*/


/*=============================================
=            Reasignación Trámites           =
=============================================*/

$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

	var esconder__modales=function(parametro1,parametro2){

		$(parametro1).click(function(e){

			$(parametro2).hide();

		});

	}

	esconder__modales($(".modal__paid__escondidos"),$("#matrizPaidModales__revisor"));
	esconder__modales($(".modal__paid__escondidos"),$("#indicadoresPaidModales"));
	esconder__modales($(".modal__paid__escondidos"),$("#eventosPaidModales"));
	esconder__modales($(".modal__paid__escondidos"),$("#interdisiplinarioModal"));
	esconder__modales($(".modal__paid__escondidos"),$("#necesidadesIndividualesModal"));
	esconder__modales($(".modal__paid__escondidos"),$("#necesidadesGeneralesModal"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoModal"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoMedallas"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoHospAli"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoMatricesAux"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoPersonalTecnico"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoBonoDeportivo"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoUniformes"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoSeguros"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoTransporte"));
	esconder__modales($(".modal__paid__escondidos"),$("#ecuentroActivoPasajesAereos"));

	var mostrar__modales=function(parametro1,parametro2){

		$(parametro1).click(function(e){

			$(parametro2).show();

		});

	}

	mostrar__modales($("#idPaidGenera__tablets"),$("#matrizPaidModales__revisor"));
	mostrar__modales($("#idIndicadoresGenera__tablets"),$("#indicadoresPaidModales"));
	mostrar__modales($("#idVinculacionGenera__tablets"),$("#eventosPaidModales"));
	mostrar__modales($("#idInterdisciplinarioGenera__tablets"),$("#interdisiplinarioModal"));
	mostrar__modales($("#idIndividualesGenera__tablets"),$("#necesidadesIndividualesModal"));
	mostrar__modales($("#idVinculacionGenera__generales__tablets"),$("#necesidadesGeneralesModal"));
	mostrar__modales($("#idEncuentroActivoGenera__tablets"),$("#ecuentroActivoModal"));
	mostrar__modales($("#idEncuentroActivoMedallas__tablets"),$("#ecuentroActivoMedallas"));

	var agregarDatatablets=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function (e){

			datatablets($(parametro2),parametro3,[$("#idOrganismo__principalAsgnacion").val()],false,false,false,[false],[false],false);

		});

	}

	// agregarDatatablets($("#idPaidGenera__tablets"),$(".paidGeneral__revisor"),"paidGeneral__revisor");
	// agregarDatatablets($("#idVinculacionGenera__tablets"),$(".paidEventos__revisor"),"paidEventos__revisor");
	// agregarDatatablets($("#idInterdisciplinarioGenera__tablets"),$(".paidInterdiciplinarios__revisor"),"paidInterdiciplinarios__revisor");
	// agregarDatatablets($("#idIndividualesGenera__tablets"),$(".paidIndividuales__revisor"),"paidIndividuales__revisor");
	// agregarDatatablets($("#idVinculacionGenera__generales__tablets"),$(".paidNecesidadesGenerales__revisor"),"paidNecesidadesGenerales__revisor");
	// agregarDatatablets($("#idEncuentroActivoGenera__tablets"),$(".paidEncuentroAc__revisor"),"paidEncuentroAc__revisor");

	//agregarDatatablets($("#idIndicadoresGenera__tablets"),$(".paidIndicadores__revisor"),"paidIndicadores__revisor");


	//datatablets($("#paidGeneral__revisor"),"paidGeneral__revisor",false,false,false,false,false,false,false,false);

	//datatablets($("#organismoSubses__paid"),"organismoSubses__paid",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignarTramites__paid estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__reasignar__paid"],[false],[false],false);

	//datatablets($("#organismoSubses__paid__recomiendas__final__reporteria"),"organismoSubses__paid__recomiendas__final__reporteria",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignarTramites__paid__recomiendas__repor__final estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid__recomiendas__final__recomiendas'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__reasignar__paid__recomiendas__repoteria__recomiendas"],[false],[false],false);


	//datatablets($("#organismoSubses__paid__recomiendas"),"organismoSubses__paid__recomiendas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignarTramites__paid__recomiendas estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid__recomiendas'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__reasignar__paid__recomiendas"],[false],[false],false);

	datatablets($("#organismoSubses__paid__recomiendas__paid__planificacion"),"organismoSubses__paid__recomiendas__paid__planificacion",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignarTramites__paid__recomiendas estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid__recomiendas'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__reasignar__paid__recomiendas"],[false],[false],false);

	datatablets($("#organismoSubses__paid__negados__paid__planificacion"),"organismoSubses__paid__negados__paid__planificacion",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='negadosDirector__regresados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid__negados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__negar__paid__recomiendas"],[false],[false],false);

	datatablets($("#organismoSubses__paid__recomiendas__paid__planificacion__recomendacion__analistas"),"organismoSubses__paid__recomiendas__paid__planificacion__recomendacion__analistas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignarTramites__paid__recomiendas estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid__recomiendas'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__reasignar__paid__recomiendas"],[false],[false],false);

	datatablets($("#organismoSubses__paid__recomiendas__paid__planificacion__aprobados"),"organismoSubses__paid__recomiendas__paid__planificacion__aprobados",false,objetos([8],["enlace"],['documento'],["documentos/paid/oficioAprobacion/"],["documento"]),1,[false],false,false,false);

});

/*=====  End of Reasignación Trámites  ======*/


/*===========================================
=            Administración Paid            =
===========================================*/

$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

	datatablets($("#paid__general__paid"),"paid__general__paid",false,false,false,false,false,false,false);

	datatablets($("#asignarPresupuesto__paid__reporterias"),"asignarPresupuesto__paid__reporterias",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val(),$("#valorComparativo").val()],objetos([4,5],["enlace","chekeds__2__paids"],["documento",4],["documentos/paid/asignacion/",4],['documento',false]),1,false,false,false,false);

	datatablets($("#asignarPresupuesto__paid"),"asignarPresupuesto__paid",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val(),$("#valorComparativo").val()],objetos([5,6,7,8],["texto","texto","texto","boton","boton"],[7,8,9,"<center><button class='asignar__boton__paid estilo__botonDatatablets btn btn-primary' data-toggle='modal' data-target='#modalAsignarPre__paid'>Asignar</button><center>"],[false],[false]),1,["funcionObtenerOrganismos__paid","funcionEditarOrga"],[4,5],["idOrganismo","idOrganismo"],"asignar__boton");

	
	datatablets($("#tablaProgramas"),"tablaProgramas",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarPrograma estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#programaEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarPrograma estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarPrograma","eliminarPrograma"],["programaEdita","programaElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	


	datatablets($("#tablaItem__paid"),"tablaItem__paid",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([2,3],["boton","boton"],["<center><button class='editarItems estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#itemEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarItem estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarItems","eliminarItem"],["itemEdita","itemElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaEstrategicos"),"tablaEstrategicos",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarEstrategicos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#estrategicosEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarEstrategicos estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarEstrategicos","eliminarEstrategicos"],["estrategicosEdita","estrategicosElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	


	datatablets($("#tablaEncargada"),"tablaEncargada",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarEncargada estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#encargadaEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarEncargada estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarEncargada","eliminarEncargada"],["encargadaEdita","encargadaElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaAccion"),"tablaAccion",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarAccion estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#accionEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarAccion estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarAccion","eliminarAccion"],["accionEdita","accionElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaTipoOrganizacion"),"tablaTipoOrganizacion",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([3,4],["boton","boton"],["<center><button class='editarTipoOr estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#tipoOrEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarTipoOr estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarTipoOr","eliminarTipoOr"],["tipoOrEdita","tipoOrElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaIndicadores__paid"),"tablaIndicadores__paid",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarIndicador estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#indicadorEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarIndicador estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarIndicador","eliminarIndicador"],["indicadorEdita","indicadorElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaRubros"),"tablaRubros",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2,3],["boton","boton","boton"],["<center><a class='verItems estilo__botonDatatablets btn btn-warning pointer__botones' data-toggle='modal' data-target='#rubrosEditaModalAc'><i class='fas fa-eye'></i></a><center>","<center><button class='editarRubros estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#rubrosEditaModal'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarRubros estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__verItems__2","funcion__editar","funcion__datatabletsEliminar"],['verItems',"editarRubros","eliminarRubros"],['verItems',"rubrosEditaModal","rubrosElimina"],["edita","edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaComponente"),"tablaComponente",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,3,4],["boton","boton","boton"],["<center><a class='verRubrosC estilo__botonDatatablets btn btn-warning pointer__botones' data-toggle='modal' data-target='#rubrosEditaModalComponentes'><i class='fas fa-eye'></i></a><center>","<center><a class='editarComponente estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#componenteEdita'><i class='fas fa-user-edit'></i></a><center>","<center><a class='eliminarComponente estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>"],[false],[false]),-1,["funcion__verComponentes__156","funcion__editar__986","funcion__datatabletsEliminar___849"],["verRubrosC","editarComponente","eliminarComponente"],["verRubrosC","componenteEditad","componenteElimina"],["edita","elimina"],[1,0],['enviado','input__1']);


	datatablets($("#tabladeporte__paid"),"tabladeporte__paid",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarDeportePaid estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#deportePaidEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarDeportePaid estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarDeportePaid","eliminarDeportePaid"],["deportePaidEdita","deportePaidElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaModalidad"),"tablaModalidad",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarModalidad estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalidadEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarModalidad estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarModalidad","eliminarModalidad"],["modalidadEdita","modalidadElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaPrueba"),"tablaPrueba",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarPrueba estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#pruebaEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarPrueba estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarPrueba","eliminarPrueba"],["pruebaEdita","pruebaElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	

	datatablets($("#tablaCategoria"),"tablaCategoria",[$("#idUsuarioPrincipal").val(),$("#valorComparativo").val()],objetos([1,2],["boton","boton"],["<center><button class='editarCatgoria estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#categoriaEdita'><i class='fas fa-user-edit'></i></button><center>","<center><button class='eliminarCategoria estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></button><center>"],[false],[false]),-1,["funcion__editar","funcion__datatabletsEliminar"],["editarCatgoria","eliminarCategoria"],["categoriaEdita","categoriaElimina"],["edita","elimina"],[1,0],['enviado','input__1']);	


});

/*=====  End of Administración Paid  ======*/

/*================================================
=            Paid selector asignación            =
================================================*/

var visualizarOpcionesCambiar__paid=function(parametro1,parametro2){

	$(parametro1).change(function(e){

		if ($(this).val()=="0") {

			$(parametro2).hide();			

		}else{

			$(parametro2).show();

		}


	});

}

visualizarOpcionesCambiar__paid($("#selector__rubros"),$(".oculto__tabla__asignacion__paid"));

/*=====  End of Paid selector asignación  ======*/


/*============================================
=            Generar el nuevo pdf            =
============================================*/

var generarPdf__paids=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		

		e.preventDefault();

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','asignacion__paid__presupuestarias');

		let idOrganismo=$("#idOrganismo").val();

		let tipoPdf=$("#tipoPdf").val();

		let valorComparativo=$("#valorComparativo").val();

		let techo__presupuestario=$("#techo__presupuestario").val();

		paqueteDeDatos.append("idOrganismo",idOrganismo);
		paqueteDeDatos.append("tipoPdf",tipoPdf);
		paqueteDeDatos.append("valorComparativo",valorComparativo);
		paqueteDeDatos.append("techo__presupuestario",techo__presupuestario);
		paqueteDeDatos.append("inputAnio",$("#inputAnio").val());
		paqueteDeDatos.append("inputSerie",$("#inputSerie").val());
		paqueteDeDatos.append("inputDia",$("#inputDia").val());
		paqueteDeDatos.append("inputMes",$("#inputMes").val());
		paqueteDeDatos.append("inputAnioMemo",$("#inputAnioMemo").val());
		
		$(".enlaces__dedicados__paids").show();

		$.ajax({

			type:"POST",
			url:"modelosBd/pdf/pdf.modelo.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		    	let elementos=JSON.parse(response);

		    	let documentoPaids=elementos['documentoPaids'];


				alertify.set("notifier","position", "top-center");
				alertify.notify("Documento Generado satisfactoriamente", "success", 5, function(){});


			    $(".enlaces__dedicados__paids").attr("href","documentos/paid/asignacion/"+documentoPaids);

			    $(".enlaces__dedicados__paids").attr("target","_blank");

			    $("#texto__documentos").val(documentoPaids);

			    $("#guardarAsignacion__paid").show();


			},
			error:function(){

			}
				
		});	

	});

}

generarPdf__paids($("#generarPdf__asignacion__paid"));

/*=====  End of Generar el nuevo pdf  ======*/

/*==========================================
=            Enviar información            =
==========================================*/

function concatenarValores(parametro1){
	
	var array = new Array(); 

    $(parametro1).each(function(index) {

        array.push($(this).val());

    });

    return array;

}

function concatenarValores__attr(parametro1){
	
	var array = new Array(); 

    $(parametro1).each(function(index) {

        array.push($(this).attr('attr'));

    });

    return array;

}


function concatenarValores__attr__dos__componentes(parametro1){
	
	var array = new Array(); 

    $(parametro1).each(function(index) {

        array.push($(this).attr('attrcomponentes'));

    });

    return array;

}


var enviar__asignacion__paid=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		e.preventDefault();

		$(parametro1).hide();

		var confirm= alertify.confirm('¿Está seguro de la información ingresada?','¿Está seguro de la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

		let arrayAgrupados=concatenarValores($(".agrupados__valores__totales"));
		let arrayAgrupados__attr=concatenarValores__attr($(".agrupados__valores__totales"));
		let arrayAgrupados__attr__componentes=concatenarValores__attr__dos__componentes($(".agrupados__valores__totales"));


		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','notificacionEnviada__paid__asignacion');

		let idOrganismo=$("#idOrganismo").val();
		let valorComparativo=$("#valorComparativo").val();
		let techo__presupuestario=$("#techo__presupuestario").val();
		let texto__documentos=$("#texto__documentos").val();
		let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

		paqueteDeDatos.append("arrayAgrupados",JSON.stringify(arrayAgrupados));
		paqueteDeDatos.append("arrayAgrupados__attr",JSON.stringify(arrayAgrupados__attr));
		paqueteDeDatos.append("arrayAgrupados__attr__componentes",JSON.stringify(arrayAgrupados__attr__componentes));

		paqueteDeDatos.append("idOrganismo",idOrganismo);
		paqueteDeDatos.append("valorComparativo",valorComparativo);
		paqueteDeDatos.append("techo__presupuestario",techo__presupuestario);
		paqueteDeDatos.append("texto__documentos",texto__documentos);
		paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
		
		$(".enlaces__dedicados__paids").show();

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
						data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		    	let elementos=JSON.parse(response);

		    	let mensaje=elementos['mensaje'];

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
			alertify.notify("Acción cancelada", "error", 2, function(){

				$(parametro1).show();

			}); 
		}); 		

	});

}

enviar__asignacion__paid($("#guardarAsignacion__paid"));

/*=====  End of Enviar información  ======*/


/*=================================================
=            Enviar con checkeds paids           =
=================================================*/

var seguimiento__selectoresTotales=function(parametro1){

$(parametro1).click(function(){

	var array = new Array(); 

	$(".checkeds__seleccionables").each(function(index) {

		var condicion = $(this).is(":checked");

		if (condicion) {

			let idOrganismos=$(this).attr('idorganismos');

			 array.push(idOrganismos);

		}
		
	});


	if (array.length>0) {

		var confirm= alertify.confirm('¿Está seguro de la información ingresada?','¿Está seguro de la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

		let valorComparativo=$("#valorComparativo").val();


		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','desactualizar__asignacion__paids');

		paqueteDeDatos.append("arrayEnvios",JSON.stringify(array));

		paqueteDeDatos.append('valorComparativo',valorComparativo);


		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/insertaAcciones.md.php",
			contentType: false,
						data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

		    	let elementos=JSON.parse(response);

		    	let mensaje=elementos['mensaje'];

				if(mensaje==1){

				   	alertify.set("notifier","position", "top-center");
				    alertify.notify("Acción realizada correctamente", "success", 5, function(){});

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
			alertify.notify("Acción cancelada", "error", 2, function(){

				$(parametro1).show();

			}); 
		}); 		

	}else{


		alertify.set("notifier","position", "top-center");
		alertify.notify("Obligatorio dar check a un organismo que se desee volver a ingresar el presupuesto", "error", 5, function(){});

		$(parametro1).show();


	}

});


}
seguimiento__selectoresTotales($("#volverGenerar__paidAsignacion"));

/*=====  End of Enviar con checkeds paids  ======*/


});