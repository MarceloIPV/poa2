if (!$("#formularioActaFinal").length > 0 ) {


				$(".contenedor__bodyCMatriz").append('<form class="row" class="formularioActaFinal" id="formularioActaFinal"></form>');


				$("#guardaEnvio_coors").hide();


				$("#idOrganismo").val($(".idOrganismoM").val());


				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Ingresar número de resolución</div><div class='col col-8 text-left'><input type='text' id='numeroOficioNoti' name='numeroOficioNoti' style='margin-bottom:1em;'/></div>");

				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Techo notificado sin incluir descuentos</div><div class='col col-8 text-left'><input type='text' id='montoTechoSin' class='solo__numero__montos' name='montoTechoSin' style='margin-bottom:1em;'/></div>");

				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Fecha de Aprobación de la Resolución POA (Fecha del quipux de la resolución)</div><div class='col col-8 text-left'><input type='date' id='fecha__quipux' name='fecha__quipux' style='margin-bottom:1em;'/></div>");


				$("#formularioActaFinal").append("<input type='hidden' id='numeroNotificacion' name='numeroNotificacion' style='margin-bottom:1em;'/>");

				$("#formularioActaFinal").append("<div class='col col-4 text-right' style='font-weight:bold!important; margin-bottom:1em;'>Subir documento</div><div class='col col-8 text-left'><input type='file' id='archivoFinal' name='archivoFinal' style='margin-bottom:1em;'/></div>");

				$("#formularioActaFinal").append("<div class='col col-12 text-center'><button type='button' class='btn btn-warning' id='enviarFinal' style='margin-top:2em;margin-bottom:1em;'>Enviar</button></div><div class='reload__Enviosrealizados text-center'></div>");


				var enviarCorreosIniciales=function(parametro1,parametro2,parametro3,parametro4){

				$(parametro1).click(function (e){

					e.preventDefault();	

					$(parametro1).hide();

					$('.reload__Enviosrealizados').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


					if ($("#numeroOficioNoti").val()=="" || $("#archivoFinal").val()=="" || $("#montoTechoSin").val()=="" || $("#fecha__quipux").val()=="") {

						alertify.set("notifier","position", "top-center");
						alertify.notify("Campos obligatorios", "error", 5, function(){});

						$(parametro1).show();

						$('.reload__Enviosrealizados').html(' ');

					}else{	

						var confirm= alertify.confirm('¿Está seguro de '+parametro2+'?','¿Está seguro de '+parametro2+'?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

						confirm.set({transition:'slide'});    

						confirm.set('onok', function(){ //callbak al pulsar botón positivo
							  
							var paqueteDeDatos = new FormData();

							paqueteDeDatos.append('tipo',parametro3);		

							var other_data = $('.'+parametro4).serializeArray();

							var organismoIdPrin=$(".idOrganismoM").val();

							$.each(other_data,function(key,input){
								paqueteDeDatos.append(input.name,input.value);
							});

							let numeroOficioNoti= $("#numeroOficioNoti").val();
							let numeroNotificacion= $("#numeroNotificacion").val();
							let fecha__quipux= $("#fecha__quipux").val();
							let montoTechoSin= $("#montoTechoSin").val();

							paqueteDeDatos.append("numeroOficioNoti",numeroOficioNoti);

							paqueteDeDatos.append("numeroNotificacion",numeroNotificacion);

							paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);

							paqueteDeDatos.append("fecha__quipux",fecha__quipux);

							paqueteDeDatos.append("montoTechoSin",montoTechoSin);

							paqueteDeDatos.append('documentoFinal', $('#archivoFinal')[0].files[0]);

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

				enviarCorreosIniciales($("#enviarFinal")," de realizar la aprobaciòn del poa","poaFinales","formularioActaFinal");

				}