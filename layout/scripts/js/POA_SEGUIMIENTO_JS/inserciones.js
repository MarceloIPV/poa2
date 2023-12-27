var funcion__guardado__matricez_Seguimiento2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11, parametro12, parametro13, parametro14, parametro15) {

	// $(parametro1).click(function(e) {

	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		//var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		//confirm.set({ transition: 'slide' });

	//	confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro8);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro3));


			if (parametro8 == "honorarios__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);
				paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
				paqueteDeDatos.append('archivo4', $(parametro7)[0].files[0]);

			}


			if (parametro8 == "administrativos__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				

			}

			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {
						console.log("HOLA SUCCESS");
						console.log(response);
					let elementos = JSON.parse(response);

					let mensaje = elementos['mensaje'];

					$(parametro13).remove();

					$(parametro14).remove();


					if (parametro3[12] == "Marzo" || parametro3[12] == "Junio" || parametro3[12] == "Septiembre" || parametro3[12] == "Diciembre" || parametro3[4] == "Marzo" || parametro3[4] == "Junio" || parametro3[4] == "Septiembre" || parametro3[4] == "Diciembre" || parametro15 == true) {

						$("#contadorIndicador").val(0);
						$("#contadorIndicador2").val(0);

						$(".modal__ItemsGrup").modal('hide');//ocultamos el modal
						$('.modal-backdrop').remove();//eliminamos el backdrop del modal

					}

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente escoger la siguiente pestaña", "success", 10, function () { });


					}

				},
				error: function () {

				}

			});

		//});


		// confirm.set('oncancel', function () { //callbak al pulsar botón negativo
		// 	alertify.set("notifier", "position", "top-center");
		// 	alertify.notify("Acción cancelada", "error", 1, function () {

		// 		$(parametro1).show();

		// 	});
		// });

	}

	// });

}

	/*=================================================================================================
	=               Guardar información ESTADO DE CUENTA - Ejecucion Presupuestaria                   =
	===================================================================================================*/
	
	var guardar_estado_cuenta2023=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){
			
			var validador= validacionRegistro(parametro2);
			validacionRegistroMostrarErrores(parametro2);

		
			if (validador==false) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Campos obligatorios", "error", 5, function(){});

				$(parametro1).show();			

			}else{

				var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

				confirm.set({transition:'slide'});  

				confirm.set('onok', function(){ 
				

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append("tipo","guardar_estado_de_cuenta2023"); 

					let idOrganismo=$("#organismoIdPrin").val();				
					let trimestre=$("#trimestreEvaluador").val();
					
					paqueteDeDatos.append("estado_cuenta",$(parametro3)[0].files[0]);					
					paqueteDeDatos.append("trimestre",trimestre);
					paqueteDeDatos.append("idOrganismo",idOrganismo);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO/inserta.md.php",
						contentType: false,
						data:paqueteDeDatos,
						processData: false,
						cache: false, 
						success:function(response){
							console.log("dentro de ajax");
							console.log(response);
							// alertify.set("notifier","position", "top-center");
							// alertify.notify("Registro realizado correctamente", "success", 5, function(){});

						   // $(parametro3).val("");
							$(parametro1).show();
							var elementos=JSON.parse(response);
												
			            	var mensaje=elementos['mensaje'];
							
							console.log("ESyo bajo mensaje")
							console.log(mensaje)
							if(mensaje==1){

					            alertify.set("notifier","position", "top-center");
					            alertify.notify("Registro realizado correctamente", "success", 5, function(){});

					           // $(parametro3).val("");
					            $(parametro1).hide();	
								//location.reload();
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


	
	/*=====  End of Guardar información  ======*/
	
	/*=======================================================================
	=               Guardar información ESTADO DE CUENTA INDICADORES                   =
	========================================================================*/
	
	var guardar_estado_cuenta_indicadores2023=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			var validador= validacionRegistro(parametro2);
			validacionRegistroMostrarErrores(parametro2);

		
			if (validador==false) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Campos obligatorios", "error", 5, function(){});

				$(parametro1).show();			

			}else{

				var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

				confirm.set({transition:'slide'});  

				confirm.set('onok', function(){ 
				

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append("tipo","guardar_estado_de_cuenta2023");

					let idOrganismo=$("#organismoIdPrin").val();				
					let trimestre=$("#trimestreEvaluador").val();
					
					paqueteDeDatos.append("estado_cuenta",$(parametro3)[0].files[0]);					
					paqueteDeDatos.append("trimestre",trimestre);
					paqueteDeDatos.append("idOrganismo",idOrganismo);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO/inserta.md.php",
						contentType: false,
						data:paqueteDeDatos,
						processData: false,
						cache: false, 
						success:function(response){
							console.log("dentro de ajax");

							var elementos=JSON.parse(response);
						
					
			            	var mensaje=elementos['mensaje'];

							
							if(mensaje==1){

					            alertify.set("notifier","position", "top-center");
					            alertify.notify("Registro realizado correctamente", "success", 5, function(){});

					           // $(parametro3).val("");
					            $(parametro1).show();	
								//location.reload();
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


	
	/*=====  End of Guardar información  ======*/

	/*==============================================
=            Funciones de guardados            =
==============================================*/

// var funcion__guardado__indicadores__general2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {
// 	// $(parametro1).click(function(e) {
// 		var metaProgramada = (parametro3[0]);
// 		var validador = false;
// 		if(metaProgramada == 0 ){	
// 			validador = true;
			
// 		}else{
// 			var sumadorErrores = 0;
// 			$(parametro2).each(function (index) {
// 				if ($(this).val() == "") {
// 					sumadorErrores++;
// 				}
// 			});
// 			if (sumadorErrores == 0) {
// 				validador = true;
// 			} else {
// 				validador = false;
// 			}			
			
// 		};

// 	validacionRegistroMostrarErrores2023(parametro3[0]);
// 		if (validador == false) {
// 			alertify.set("notifier", "position", "top-center");
// 			alertify.notify("Añadir documento de sustento", "error", 5, function () { });
// 			$(parametro1).show();

// 		} else {

// 		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

// 		confirm.set({ transition: 'slide' });

// 		confirm.set('onok', function () {

// 			var paqueteDeDatos = new FormData();

// 			paqueteDeDatos.append("tipo", parametro5);

// 			paqueteDeDatos.append("prametros", JSON.stringify(parametro3));

// 			if (parametro4 != false) {
// 				paqueteDeDatos.append('archivo', $(parametro4)[0].files[0]);
// 			}

// 			$.ajax({

// 				type: "POST",
// 				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
// 				contentType: false,
// 				data: paqueteDeDatos,
// 				processData: false,
// 				cache: false,
// 				success: function (response) {
// 					console.log("response")
// 					console.log(response)

// 					alertify.set("notifier", "position", "top-center");
// 					alertify.notify("Registro realizado correctamente", "success", 5, function () { });

					
					
// 					var elementos = JSON.parse(response);
// 					var mensaje = elementos['mensaje'];
// 					console.log("mensaje")
// 					console.log(mensaje)

// 					if (mensaje == 1) {
// 						alertify.set("notifier", "position", "top-center");
// 						alertify.notify("Registro realizado correctamente", "success", 5, function () { });

// 						$(parametro6).remove();
// 						$(parametro7).hide();

// 					}

// 				},
// 				error: function () {

// 				}

// 			});

// 		});


// 		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
// 			alertify.set("notifier", "position", "top-center");
// 			alertify.notify("Acción cancelada", "error", 1, function () {

// 				$(parametro1).show();

// 			});
// 		});

// 	}

// 	// });

// }

var funcion__guardado__general_estado_cuenta_indicadores2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {
	// $(parametro1).click(function(e) {
		$Valorcomparar = parametro3[0];
		$ValorExedido = parametro3[1];
 
		if($ValorExedido > $Valorcomparar){
			alertify.set("notifier","position", "top-center");
			alertify.notify("Valor supera la cantidad de META PROGRAMADA", "error", 5, function(){});	
		
		}else{
		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });
	
		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro5);

			paqueteDeDatos.append("prametros", JSON.stringify(parametro3));

			

			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {			
					
					var elementos = JSON.parse(response);
					var mensaje = elementos['mensaje'];
					console.log("mensaje")
					console.log(mensaje)

					if (mensaje == 1) {
						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 5, function () { });

						// $(parametro6).remove();
						// $(parametro7).hide();

					}

				},
				error: function () {

				}

			});

			$(parametro1).hide();
			$(parametro1).remove();
		});
	}

		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	

	// });

}
var funcion__guardado__indicadores__general2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6) {

	$Valorcomparar = parametro3[0];
	$ValorExedido = parametro3[1];

if($ValorExedido > $Valorcomparar){
	alertify.set("notifier","position", "top-center");
	alertify.notify("Valor supera la cantidad de META PROGRAMADA", "error", 5, function(){});
}else{
		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });
		
		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro4);

			paqueteDeDatos.append("prametros", JSON.stringify(parametro3));
	

			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {
				

							
					var elementos = JSON.parse(response);
					var mensaje = elementos['mensaje'];
					console.log("mensaje")
					console.log(mensaje)

					if (mensaje == 1) {
						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 5, function () { });

						//$(parametro6).remove();
						//$(parametro7).hide();

					}

				},
				error: function () {

				}

			});
			$(parametro1).hide();
			$(parametro1).remove();
		});
	}

		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});


}



/*=====  End of Funciones de guardados  ======*/

var funcion__agregar__filas_seguimiento_2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {


	var validador = validacionRegistro($(parametro3));
	validacionRegistroMostrarErrores($(parametro3));

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro4);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro2));

			paqueteDeDatos.append('archivo1', $(parametro7)[0].files[0]);

			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];


					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 10, function () { });
						
						$("." + parametro5 + parametro6).hide();


					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}

}

/*==============================================
= contrataciones__publicas_seguimiento         =
==============================================*/

var insertar__contrataciones__publicas_seguimiento_defecto=function(idItem,idActividad,trimestre){


    var paqueteDeDatos = new FormData();

    paqueteDeDatos.append('tipo','insertar__tipo__de__contratacion_seguimiento');		

    var other_data = $('#formulario__tipo__contrataciones').serializeArray();

    $.each(other_data,function(key,input){
        paqueteDeDatos.append(input.name,input.value);
    });


    paqueteDeDatos.append("idItem",idItem);
	paqueteDeDatos.append("idActividad",idActividad);
	paqueteDeDatos.append("trimestre",trimestre);
  
	

    axios({
        method: "post",
        url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {
        
        mensaje =response.data.mensaje;

        if (mensaje==1) {

            alertify.set("notifier","position", "top-center");
            alertify.notify("Registro realizado correctamente", "success", 3, function(){});

        }

    }).catch((error) => {
    
    });

}


var insertar__registro_contrataciones__publicas_seguimiento=function(idItem,registro,justificacion,trimestre,actividad){

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','registro__contratacion__seguimiento');		


	paqueteDeDatos.append("idItem",idItem);
	paqueteDeDatos.append("registro",registro)
	paqueteDeDatos.append("justificacion",justificacion)
	paqueteDeDatos.append("trimestre",trimestre)
	paqueteDeDatos.append("actividad",actividad)


	axios({
		method: "post",
		url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
		data: paqueteDeDatos,
		headers: { "Content-Type": "multipart/form-data" },
	}).then((response) => {

		mensaje =response.data.mensaje;

		console.log(response.data)

		if (mensaje==1) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Registro realizado correctamente", "success", 3, function(){});

		}

	}).catch((error) => {
	
	});


}

var insertar__registro_contrataciones__publicas_seguimiento2=function(boton,registro,justificacion){

	$(boton).click(function (e) {
		if($(justificacion).val()==""){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Necesita establecer un justificativo", "warning", 4, function(){});

		}else{

		

			var idItem = $(this).attr("idItem")
			var trimestre = $(this).attr("trimestre")
			var actividad = $(this).attr("actividad")

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','registro__contratacion__seguimiento');		


			paqueteDeDatos.append("idItem",idItem);
			paqueteDeDatos.append("registro",registro)
			paqueteDeDatos.append("justificacion",$(justificacion).val())
			paqueteDeDatos.append("trimestre",trimestre)
			paqueteDeDatos.append("actividad",actividad)

			axios({
				method: "post",
				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
				data: paqueteDeDatos,
				headers: { "Content-Type": "multipart/form-data" },
			}).then((response) => {
				
				mensaje =response.data.mensaje;

				console.log(response.data)

				if (mensaje==1) {

					alertify.set("notifier","position", "top-center");
					alertify.notify("Registro realizado correctamente", "success", 3, function(){});

				}

			}).catch((error) => {
			
			});

			$('#contrataciones__NoitemsSeguimiento').modal('hide');
		}	
	});

}

//*************************************************  Guardad Juricdiccion **************************************************//
var guardar_zonales_juridicciones=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(){

		$(parametro1).hide();

		var array = new Array(); 

		$("."+parametro3).each(function(index) {

			var condicion = $(this).is(":checked");

			   if (condicion) {

			   let idOrganismoVar=$(this).attr('idorganismos');

			   array.push(idOrganismoVar);

			}

		});

		if (array.length==0) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar por lo menos un organismo a bloquear del "+parametro2, "error", 5, function(){});

			$(parametro1).show();		    	

		}else{

		let letrero=$(this).attr('botonClass');

		if(letrero=="bloquear"){
			// var confirm= alertify.prompt('¿Está seguro222 de cerrar los organismos seleccionados? Ingresar motivo en caso de requerirlo','',null,null).set('labels', {ok:'ConfirmarDavidPACA', cancel:'Cancelar'});   
			
			// Crear un elemento select y opciones
				var selectElement = document.createElement('select');

				// Crear opciones
				var option1 = document.createElement('option');
				option1.value = 'da';
				option1.text = 'Opción 1';
				var option2 = document.createElement('option');
				option2.value = 'de';
				option2.text = 'Opción 2';
				var option3 = document.createElement('option');
				option3.value = 'di';
				option3.text = 'Opción 3';

				// Agregar las opciones al elemento select
				selectElement.appendChild(option1);
				selectElement.appendChild(option2);
				selectElement.appendChild(option3);

				// Mostrar el cuadro de diálogo personalizado
				var confirm = alertify.confirm('¿Está seguro de cerrar los organismos seleccionados?', function(e) {
				if (e) {
					// Obtener el valor seleccionado del select
					var selectedOption = selectElement.value;
					console.log('Opción seleccionada:', selectedOption);
				} else {
					console.log('Acción cancelada');
				}
				}).set('labels', {ok:'Confirmar', cancel:'Cancelar'}).setting('closable', false).setContent(selectElement);

		}else{
			var confirm= alertify.prompt('¿Está seguro de abrir los organismos seleccionados? Ingresar motivo obligatorio','',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		}

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(evt, value){ //callbak al pulsar botón positivo

			if (letrero!="bloquear" && value=="") {

			  alertify.set("notifier","position", "top-right");
			  alertify.notify("Es obligatorio ingresar el motivo", "error", 5, function(){});

			  $(parametro1).show();	

			}else{

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','guarda__seguimientos__bloqueos__cierres__periodos');	

				paqueteDeDatos.append("array",JSON.stringify(array));

				paqueteDeDatos.append('letrero',letrero);	

				paqueteDeDatos.append('identificador',parametro2);	

				paqueteDeDatos.append('motivo',value);	

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

			}

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
			$(parametro1).show();	
		}); 

		}

	});


}


var enviarCorreo2=function(parametro1){

	$(parametro1).click(function(){

	

	});


}

function enviarCorreo() {
	// Obtener los datos del formulario
	var nombre = document.getElementById('nombre').value;
	var correo = document.getElementById('correo').value;
	var mensaje = document.getElementById('mensaje').value;
  
	// Crear objeto FormData para enviar los datos al servidor
	var formData = new FormData();
	formData.append('nombre', nombre);
	formData.append('correo', correo);
	formData.append('mensaje', mensaje);
  
	// Realizar una llamada AJAX para enviar los datos al servidor
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'pruebaEnvioCorreo.view.php', true);
	xhr.onload = function() {
	  if (xhr.status === 200) {
		// La solicitud se completó correctamente
		var response = JSON.parse(xhr.responseText);
		if (response.success) {
		  // El correo se envió exitosamente
		  alert('El correo se envió correctamente.');
		} else {
		  // Ocurrió un error al enviar el correo
		  alert('Error al enviar el correo. Inténtelo de nuevo.');
		}
	  } else {
		// Ocurrió un error en la solicitud AJAX
		alert('Error en la solicitud AJAX. Inténtelo de nuevo.');
	  }
	};
	xhr.send(formData);
  }


  /*====================================================
=            Funciones guardados mátrices            =
====================================================*/

var funcion__guardado__matricez__sueldos__salarios = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11, parametro12, parametro13, parametro14, parametro15) {

	// $(parametro1).click(function(e) {
		//console.log("PARAMETRO #3");
		//console.log(parametro3);

	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		//var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		//confirm.set({ transition: 'slide' });

	//	confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro8);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro3));


			if (parametro8 == "honorarios__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);
				paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
				paqueteDeDatos.append('archivo4', $(parametro7)[0].files[0]);

			}


			if (parametro8 == "administrativos__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);

			}

			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {
						
					let elementos = JSON.parse(response);

					let mensaje = elementos['mensaje'];	

					$(parametro13).remove();

					$(parametro14).remove();


					if (parametro3[12] == "Marzo" || parametro3[12] == "Junio" || parametro3[12] == "Septiembre" || parametro3[12] == "Diciembre" || parametro3[4] == "Marzo" || parametro3[4] == "Junio" || parametro3[4] == "Septiembre" || parametro3[4] == "Diciembre" || parametro15 == true) {

						$("#contadorIndicador").val(0);
						$("#contadorIndicador2").val(0);

						//$(".modal__ItemsGrup").modal('hide');//ocultamos el modal
						//$('.modal-backdrop').remove();//eliminamos el backdrop del modal

					}

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 10, function () { });


					}

				},
				error: function () {

				}

			});
			
		//});


		// confirm.set('oncancel', function () { //callbak al pulsar botón negativo
		// 	alertify.set("notifier", "position", "top-center");
		// 	alertify.notify("Acción cancelada", "error", 1, function () {

		// 		$(parametro1).show();

		// 	});
		// });

	}

	// });

}

var funcion__guardado__matricez__sueldos__salarios_totales = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11, parametro12, parametro13, parametro14, parametro15) {

	// $(parametro1).click(function(e) {
		alert("¿Desea guardar la información?")
console.log("PARA2 n");
console.log(parametro2);
console.log("PARA3 n");
console.log(parametro3);

			 $(parametro1).show();



			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro7);

			paqueteDeDatos.append("parametro2", JSON.stringify(parametro2));


			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {
						//alert("HOLA SUCCESS");
					let elementos = JSON.parse(response);

					let mensaje = elementos['mensaje'];

					$(parametro13).remove();

					$(parametro14).remove();



					if (mensaje == 1) {

						// alertify.set("notifier", "position", "top-center");
						// alertify.notify("Registro realizado correctamente escoger la siguiente pestaña", "success", 10, function () { });


					}

				},
				error: function () {

				}

			});

	

}

/*=====  End of Funciones guardados mátrices  ======*/


var funcion__guardado__matricez = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11, parametro12, parametro13, parametro14, parametro15) {

	// $(parametro1).click(function(e) {
		//alert("GUARDADO ADENTRO")
	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro8);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro3));


			if (parametro8 == "honorarios__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);
				paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
				paqueteDeDatos.append('archivo4', $(parametro7)[0].files[0]);

			}


			if (parametro8 == "administrativos__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);

			}

			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {
						//alert("HOLA SUCCESS");
					let elementos = JSON.parse(response);

					let mensaje = elementos['mensaje'];

					$(parametro13).remove();

					$(parametro14).remove();


					if (parametro3[12] == "Marzo" || parametro3[12] == "Junio" || parametro3[12] == "Septiembre" || parametro3[12] == "Diciembre" || parametro3[4] == "Marzo" || parametro3[4] == "Junio" || parametro3[4] == "Septiembre" || parametro3[4] == "Diciembre" || parametro15 == true) {

						$("#contadorIndicador").val(0);
						$("#contadorIndicador2").val(0);

						//$(".modal__ItemsGrup").modal('hide');//ocultamos el modal
						//$('.modal-backdrop').remove();//eliminamos el backdrop del modal

					}

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente escoger la siguiente pestaña", "success", 10, function () { });


					}

				},
				error: function () {

				}

			});

		});


		// confirm.set('oncancel', function () { //callbak al pulsar botón negativo
		// 	alertify.set("notifier", "position", "top-center");
		// 	alertify.notify("Acción cancelada", "error", 1, function () {

		// 		$(parametro1).show();

		// 	});
		// });

	}

	// });

}

/*=====  End of Funciones guardados mátrices  ======*/

/*=====   Funciones guardados Facturas  ======*/

var funcion__guardar__Factura__2023 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {


	var validador = validacionRegistro($(parametro3));
	validacionRegistroMostrarErrores($(parametro3));

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro4);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro2));

			if (parametro7 != false) {

				paqueteDeDatos.append('archivo1', $(parametro7)[0].files[0]);

			}

			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO/inserta.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];


					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 10, function () { });

					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}

}

/*=====  End of Funciones guardados Facturas  ======*/


	/*================================================================================================
	=            Guardar información  Declaracion del correcto uso de los recursos publicos          =
	==================================================================================================*/
	var guardar__declaracion_recursos_publicos=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			var validador= validacionRegistro(parametro2);
			validacionRegistroMostrarErrores(parametro2);
		
			if (validador==false) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Campos obligatorios", "error", 5, function(){});

				$(parametro1).show();			

			}else{

				var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

				confirm.set({transition:'slide'});  

				confirm.set('onok', function(){ 
				

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append("tipo","guardar_declaracion_recusos");
					
					

					let idOrganismo=$("#organismoIdPrin").val();				
					let trimestre=$("#trimestreEvaluador").val();
					
					paqueteDeDatos.append("declaracion_rp",$(parametro3)[0].files[0]);					
					paqueteDeDatos.append("trimestre",trimestre);
					paqueteDeDatos.append("idOrganismo",idOrganismo);


					console.log("RECURSOS PUBLICOS");
					console.log("trimestre");
					console.log(trimestre);
					console.log("idOrganismo");
					console.log(idOrganismo);

				
				$.ajax({
					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO/inserta.md.php",
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
							
							$(parametro1).hide();
							
						}
						
					},
					error:function(){
					}
					
				});
										
						$(parametro3).prop("disabled", true);
						$(parametro1).hide();

							


					
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


	

	/*=====  Guardar información  Declaracion del correcto uso de los recursos publicos   ======*/

	/*================================================================================================
	=            Guardar información  Declaración de contratación pública          =
	==================================================================================================*/
	
	var guardar__declaracion_contratacion_publica=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			var validador= validacionRegistro(parametro2);
			validacionRegistroMostrarErrores(parametro2);
		
			if (validador==false) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Campos obligatorios", "error", 5, function(){});

				$(parametro1).show();			

			}else{

				var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

				confirm.set({transition:'slide'});  

				confirm.set('onok', function(){ 
				

					var paqueteDeDatos = new FormData();

					
					paqueteDeDatos.append("tipo","guardar_contratacion__publica");

					let idOrganismo=$("#organismoIdPrin").val();				
					let trimestre=$("#trimestreEvaluador").val();
					
					paqueteDeDatos.append("declaracion_cp",$(parametro3)[0].files[0]);					
					paqueteDeDatos.append("trimestre",trimestre);
					paqueteDeDatos.append("idOrganismo",idOrganismo);

										
										
											
											$.ajax({
												type:"POST",
												url:"modelosBd/POA_SEGUIMIENTO/inserta.md.php",
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
						
														$(parametro1).hide();	
													}
													
												},
												error:function(){
												}
												
											});
									
							
						
						
					$(parametro3).prop("disabled", true);
					$(parametro1).hide();

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

	
	/*=====  End of Guardar información  ======*/	