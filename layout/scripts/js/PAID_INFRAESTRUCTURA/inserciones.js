var guardar_archivos_infraestructura=function(boton, archivo1,tipoInforme){

	$(boton).click(function(e){

		var pdfVal1 = $(archivo1).val();

		if(pdfVal1=='' ){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar archivos PDF", "error", 5, function(){});


		}else{


			var confirm= alertify.confirm('¿Está seguro de guardar el archivo?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'}); 

			confirm.set('onok', function(){ //callbak al pulsar botón positivo		
				
					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','guardar__archivos__paid__infraestructura');	

					paqueteDeDatos.append('nombreDocumento', $(archivo1)[0].files[0]);
					paqueteDeDatos.append('nombreArchivo', $(boton).attr("nombre"));
                    paqueteDeDatos.append('idComponente', $("#JuegosNacionalesIDCOMPONENTE").val());
                    paqueteDeDatos.append('idRubro', $("#JuegosNacionalesIDRUBRO").val());
                    paqueteDeDatos.append('tipoInforme', tipoInforme);

				
					
					console.log(paqueteDeDatos)

					$.ajax({
						type:"POST",
						url:"modelosBd/PAID_INFRAESTRUCTURA/inserta.md.php",
						contentType: false,
						data:paqueteDeDatos,
						processData: false,
						async: false,
						cache: false, 
						success:function(response){


						var elementos=JSON.parse(response);

						var mensaje=elementos['mensaje'];

						if(mensaje==1){

							alertify.set("notifier","position", "top-center");
							alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});
                            $(boton).hide()
							

						}else{
                            alertify.set("notifier","position", "top-center");
							alertify.notify("No se guardó el archivo", "warning", 5, function(){});
                        }

						

						},
						error:function(){

						}
							
					});	
					
					
				


				

			
			}); 

			confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
				alertify.set("notifier","position", "top-center");
				alertify.notify("Acción cancelada", "error", 1, function(){

					

				}); 
			}); 	

		}						

	});

}


var guardar_beneficiarios_infraestructura=function(rangoDesde,rangoHasta,masculino,femenino,mestizo,montubio,indigena,blanco,afro,visual,auditivo,multisensorial,intelectual,fisico,psiquico,beneficiariosTotal,tipo,tipoInforme){


		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo',tipo);	

		paqueteDeDatos.append('rangoDesde', rangoDesde);
		paqueteDeDatos.append('rangoHasta', rangoHasta);
		paqueteDeDatos.append('masculino', masculino);
		paqueteDeDatos.append('femenino', femenino);
		paqueteDeDatos.append('mestizo', mestizo);
		paqueteDeDatos.append('montubio', montubio);
		paqueteDeDatos.append('indigena', indigena);
		paqueteDeDatos.append('blanco', blanco);
		paqueteDeDatos.append('afro', afro);
		paqueteDeDatos.append('visual', visual);
		paqueteDeDatos.append('auditivo', auditivo);
		paqueteDeDatos.append('multisensorial', multisensorial);
		paqueteDeDatos.append('intelectual', intelectual);
		paqueteDeDatos.append('fisico', fisico);
		paqueteDeDatos.append('psiquico', psiquico);
		paqueteDeDatos.append('beneficiariosTotal', beneficiariosTotal);
		paqueteDeDatos.append('idComponente', $("#JuegosNacionalesIDCOMPONENTE").val());
		paqueteDeDatos.append('idRubro', $("#JuegosNacionalesIDRUBRO").val());
		paqueteDeDatos.append('tipoInforme', tipoInforme);


		$.ajax({
			type:"POST",
			url:"modelosBd/PAID_INFRAESTRUCTURA/inserta.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			async: false,
			cache: false, 
			success:function(response){


			var elementos=JSON.parse(response);

			var mensaje=elementos['mensaje'];

			if(mensaje==1){

				alertify.set("notifier","position", "top-center");
				alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});
				$(boton).hide()
				
			}

			},
			error:function(){

			}
				
		});	
					
}

var guardar_informe_Obra_infraestructura=function(boton, archivo1,tabla){

	$(boton).click(function(e){

		var pdfVal1 = $(archivo1).val();



		if(pdfVal1=='' ){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar archivos PDF", "error", 5, function(){});


		}else if(parseFloat($("#totalValores").val()) > parseFloat($("#MontoPorAsignarInfraestructura").attr("valor"))){
			alertify.set("notifier","position", "top-center");
			alertify.notify("TOTAL DE PROPUESTA DE FINANCIAMIENTO NO PUEDE SER MAYOR AL MONTO DEL RUBRO", "error", 7, function(){});

		}else{


			var confirm= alertify.confirm('¿Está seguro de guardar el archivo?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'}); 

			confirm.set('onok', function(){ //callbak al pulsar botón positivo	
				
				if(parseFloat($("#beneficiariosDirectos").val())>0){

					var sizeDirectos = parseFloat($("#beneficiariosDirectos").val());
		
					for( var i=1;i<=sizeDirectos;i++){
		
						if(parseFloat($("#total"+i).val()) != parseFloat($("#totalOculto"+i).val())){
							alertify.set("notifier","position", "top-center");
							alertify.notify("TOTAL BENEFICIARIOS MASCULINOS Y FEMENINOS EN LA FILA "+i+" NO CONCIDE CON TOTAL ETNICO", "error", 7, function(){});

							return;
						}
		
					}
					
		
				}
				
				if(parseFloat($("#beneficiariosAdaptado").val())>0){
		
					var sizeAdaptado = parseFloat($("#beneficiariosAdaptado").val());
		
					for( var i=1;i<=sizeAdaptado;i++){
		
						if((parseFloat($("#totalAdaptado"+i).val()) != parseFloat($("#totalOcultoAdaptado"+i).val())) || (parseFloat($("#totalAdaptadoOcultoDisca"+i).val()) != parseFloat($("#totalOcultoAdaptado"+i).val())) || (parseFloat($("#totalAdaptadoOcultoDisca"+i).val()) != parseFloat($("#totalAdaptado"+i).val()))){
							alertify.set("notifier","position", "top-center");
							alertify.notify("TOTAL BENEFICIARIOS ADAPTADO MASCULINOS Y FEMENINOS EN LA FILA "+i+" NO CONCIDE CON TOTAL ETNICO O TOTAL BENEFICIARIOS CON DISCAPACIDAD", "error", 9, function(){});

							return;
						}
		
					}
					
				}
				
					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','guardar__informe__obra__paid__infraestructura');	

					paqueteDeDatos.append('nombreDocumento', $(archivo1)[0].files[0]);
					paqueteDeDatos.append('nombreArchivo', 'informeObra');
                    paqueteDeDatos.append('idComponente', $("#JuegosNacionalesIDCOMPONENTE").val());
                    paqueteDeDatos.append('idRubro', $("#JuegosNacionalesIDRUBRO").val());
					paqueteDeDatos.append('valorTotal', $("#totalValores").val());
					

				
					
					console.log(paqueteDeDatos)

					$.ajax({
						type:"POST",
						url:"modelosBd/PAID_INFRAESTRUCTURA/inserta.md.php",
						contentType: false,
						data:paqueteDeDatos,
						processData: false,
						async: false,
						cache: false, 
						success:function(response){


						var elementos=JSON.parse(response);

						var mensaje=elementos['mensaje'];

						if(mensaje==1){

							alertify.set("notifier","position", "top-center");
							alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});
                            $(boton).hide()
							
							AsignarMontoPAIDInfraestructura("obtener_valor_total_paid_infraestructura");
							tabla.DataTable().ajax.reload();

							if(parseFloat($("#beneficiariosDirectos").val())>0){

								

								var sizeDirectos = parseFloat($("#beneficiariosDirectos").val());
								
								for( var i=1;i<=sizeDirectos;i++){
									
									guardar_beneficiarios_infraestructura($("#desdeEdad"+i).val(),$("#hastaEdad"+i).val(),$("#masculino"+i).val(),$("#femenino"+i).val(),$("#mestizo"+i).val(),$("#montubio"+i).val(),$("#indigena"+i).val(),$("#blanco"+i).val(),$("#afro"+i).val(),null,null,null,null,null,null,$("#total"+i).val(),"guardar__beneficiarios__infraestructura","beneficiariosDirectos");
								}
								
					
							}

							if(parseFloat($("#beneficiariosAdaptado").val())>0){
		
								var sizeAdaptado = parseFloat($("#beneficiariosAdaptado").val());
					
								for( var i=1;i<=sizeAdaptado;i++){
									guardar_beneficiarios_infraestructura($("#desdeEdadAdaptado"+i).val(),$("#hastaEdadAdaptado"+i).val(),$("#masculinoAdaptado"+i).val(),$("#femeninoAdaptado"+i).val(),$("#mestizoAdaptado"+i).val(),$("#montubioAdaptado"+i).val(),$("#indigenaAdaptado"+i).val(),$("#blancoAdaptado"+i).val(),$("#afroAdaptado"+i).val(),$("#visual"+i).val(),$("#auditiva"+i).val(),$("#multisensorial"+i).val(),$("#intelectual"+i).val(),$("#fisica"+i).val(),$("#psiquica"+i).val(),$("#totalAdaptado"+i).val(),"guardar__beneficiarios__adaptado__infraestructura","beneficiariosAdaptados");
								}
								
							}


						}else{
                            alertify.set("notifier","position", "top-center");
							alertify.notify("No se guardó el archivo", "warning", 5, function(){});
                        }

						

						},
						error:function(){

						}
							
					});	

			}); 

			confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
				alertify.set("notifier","position", "top-center");
				alertify.notify("Acción cancelada", "error", 1, function(){

					

				}); 
			}); 	

		}						

	});

}

var guardar_informe_fiscalizacion_infraestructura=function(boton, archivo1,tabla){

	$(boton).click(function(e){

		var pdfVal1 = $(archivo1).val();



		if(pdfVal1=='' ){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar archivos PDF", "error", 5, function(){});


		}else{


			var confirm= alertify.confirm('¿Está seguro de guardar el archivo?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'}); 

			confirm.set('onok', function(){ //callbak al pulsar botón positivo		
				
					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','guardar__informe__fiscalizacion__paid__infraestructura');	

					paqueteDeDatos.append('nombreDocumento', $(archivo1)[0].files[0]);
					paqueteDeDatos.append('nombreArchivo', 'informeFiscalizacion');
                    paqueteDeDatos.append('idComponente', $("#JuegosNacionalesIDCOMPONENTE").val());
                    paqueteDeDatos.append('idRubro', $("#JuegosNacionalesIDRUBRO").val());
					
					console.log(paqueteDeDatos)

					$.ajax({
						type:"POST",
						url:"modelosBd/PAID_INFRAESTRUCTURA/inserta.md.php",
						contentType: false,
						data:paqueteDeDatos,
						processData: false,
						async: false,
						cache: false, 
						success:function(response){


						var elementos=JSON.parse(response);

						var mensaje=elementos['mensaje'];

						if(mensaje==1){

							alertify.set("notifier","position", "top-center");
							alertify.notify("Acción realizada satisfactoriamente", "success", 5, function(){});
                            $(boton).hide()
							
							
							tabla.DataTable().ajax.reload();
 							
							window.setTimeout(function(){ 

				            	location.reload();

				            } ,5000); 

						}else{
                            alertify.set("notifier","position", "top-center");
							alertify.notify("No se guardó el archivo", "warning", 5, function(){});
                        }

						

						},
						error:function(){

						}
							
					});	
					
					
				


				

			
			}); 

			confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
				alertify.set("notifier","position", "top-center");
				alertify.notify("Acción cancelada", "error", 1, function(){

					

				}); 
			}); 	

		}						

	});

}