

/*========================================================
=            Insertar seguimiento definitivos            =
========================================================*/
	
var informacion__seguimiento__recomendadas_Contratacion_Publica=function(parametro1){

	$(parametro1).click(function(e){

		var pdfVal = $('#archivoSubido__seguimientos').val();

		if(pdfVal==''){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});


		}else{


			var confirm= alertify.confirm('¿Está seguro de recomendar?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','recomendacion__tecnicos');	

				var other_data = $('.formulario__intervencion__eliminar').serializeArray();

				$.each(other_data,function(key,input){
					paqueteDeDatos.append(input.name,input.value);
				});

				paqueteDeDatos.append('archivoSubido__seguimientos', $('#archivoSubido__actividad1')[0].files[0]);
				paqueteDeDatos.append('archivoSubido__seguimientos2', $('#archivoSubido__ContratacionPublica')[0].files[0]);

				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);


				console.log(paqueteDeDatos)

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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

	
	
/*=====  End of Insertar seguimiento definitivos  ======*/


/*=====================================================
=            Recomendar recomendados altos            =
=====================================================*/
	
	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados_Contratacion_Publica=function(parametro1){

		$(parametro1).click(function(e){

			var pdfVal1 = $('#informe__recomendado_actividad1').val();
			var pdfVal = $('#informe__recomendado_contratacion').val();
			
			

			if (($("#idRolAd").val()==4 || $("#idRolAd").val()==2) && pdfVal=='' && pdfVal1=='') {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de recomendar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos_ccontratacion_publica');	

					let selects__superiores=$(".selects__superiores__regresar").val();
					let organismoOculto__modal=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();

					let idRol=$("#idRolAd").val();

					let idUsuarios=$("#idUsuarioC").val();

	

					let nombreDocumentoactividad1=$("#nombreDocumento_actividad1").val();
					let nombreDocumentoContratacion=$("#nombreDocumento_Contratacion").val();

					paqueteDeDatos.append("selects__superiores",selects__superiores);
					paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("idRol",idRol);
					paqueteDeDatos.append("idUsuarios",idUsuarios);
					paqueteDeDatos.append("nombreDocumentoactividad1",nombreDocumentoactividad1);
					paqueteDeDatos.append("nombreDocumentoContratacion",nombreDocumentoContratacion);

					paqueteDeDatos.append('documentos__tecnicos_Contratacion', $('#informe__recomendado_contratacion')[0].files[0]);
					paqueteDeDatos.append('documentos__tecnicos_actividad1', $('#informe__recomendado_actividad1')[0].files[0]);


					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);



					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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

	
	
/*=====  End of Recomendar recomendados altos  ======*/

var funcion__guardado__reporte_infraestructura = function (parametro1, parametro2, parametro3) {
//alert("INFRA")
	//$Valorcomparar = parametro3[0];
	//$ValorExedido = parametro3[1];

	console.log("parametro2");
	console.log(parametro2);
	
		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });
		
		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro3);

			paqueteDeDatos.append("prametros", JSON.stringify(parametro2));
	

			$.ajax({

				type: "POST",
				url: "modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {	
					// let elementos = JSON.parse(response);

					// let mensaje = elementos['mensaje'];
					var elementos = JSON.parse(response);
					var mensaje = elementos['mensaje'];


					if (mensaje == 1) {
						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 5, function () { });
						//$(parametro1).hide();
						//$(parametro1).remove();
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


/*========================================================
=            Insertar archivos transferencia         =
========================================================*/
	
var guardar_archivos_trasferencias=function(boton, archivo1,nombreArchivo){

	$(boton).click(function(e){

		var pdfVal1 = $(archivo1).val();

		if(pdfVal1=='' ){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Obligatorio cargar archivos EXCEL Y CSV", "error", 5, function(){});


		}else{


			var confirm= alertify.confirm('¿Está seguro de guardar los archivos?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'}); 

			confirm.set('onok', function(){ //callbak al pulsar botón positivo		
				
				var currentDate = new Date();

			
				// Get the day of the month (1 - 31)
				var currentDayOfMonth = currentDate.getDate();

				// Get the month (0 - January, 1 - February, ..., 11 - December)
				var currentMonth = currentDate.getMonth();

				var monthsOfYear = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

				// Get the human-readable strings for the current day and month
			
				var currentMonthString = monthsOfYear[currentMonth];

				var mesAnterior = monthsOfYear[currentMonth-1];

				
				if( parseFloat(currentDayOfMonth) > 30){
					alertify.set("notifier","position", "top-center");
					alertify.notify("La Fecha Máxima De Carga Es El 15 De Cada Mes", "error", 6, function(){});
				}else{

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','guardar__archivos__transferencia');	

				

					paqueteDeDatos.append('nombreDocumentoactividad1', $(archivo1)[0].files[0]);
					paqueteDeDatos.append('mes', currentMonthString);
					paqueteDeDatos.append('nombreArchivo', nombreArchivo);
					paqueteDeDatos.append('mesAnterior', mesAnterior);
					
					console.log(paqueteDeDatos)

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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

							

						}

						

						},
						error:function(){

						}
							
					});	
					
					insertar_informacion_trasferencias( currentMonthString,nombreArchivo);
				}


				

			
			}); 

			confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
				alertify.set("notifier","position", "top-center");
				alertify.notify("Acción cancelada", "error", 1, function(){

					

				}); 
			}); 	

		}						

	});

}

	
	
/*=====  End of Insertar seguimiento definitivos  ======*/

/*========================================================
=            Insertar archivos transferencia         =
========================================================*/
	
var insertar_informacion_trasferencias=function( mes,nombreArchivo){

	
		var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','insertar__archivos__transferencia');	

					paqueteDeDatos.append('mes', mes);
					paqueteDeDatos.append('nombreArchivo', nombreArchivo);
					

		

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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

			

	

}

/*=====  End of Insertar seguimiento definitivos  ======*/

var seguimiento__insertarFechaPlazosTodos=function(boton,fechaInput){

	$(boton).click(function(){

		$(boton).hide();

		var trimestre = $(boton).attr('trimestre');

		var fecha = $(fechaInput).val();

		var array = new Array(); 

		var table = $('#seguimiento__PlazosTablaTrimestres').DataTable();

		for(let i=0;i<table.data().count();i++ ){
			var rows = table.row( i ).data()

			array.push(rows[10])
		}


		var confirm= alertify.confirm('¿Desea Guardar la Fecha Ingresada?','¿Desea Guardar la Fecha Ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','guarda__seguimientos__plazos');	

			paqueteDeDatos.append("array",JSON.stringify(array));

			paqueteDeDatos.append('trimestre',trimestre);	
			paqueteDeDatos.append('fecha',fecha);	
			paqueteDeDatos.append('estado','Inicial');	

			$.ajax({
				
				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
			$(boton).show();	
		}); 

		

	});


}


/*====================================
=            insertar fecha plazos individuales            =
====================================*/
    
var funcion__editar_fecha_plazos_individuales=function(tbody,tabla){

    
    $(tbody).on("click","button.seguimiento_guardar_plazo_individual",function(e){

        e.preventDefault();

        var trimestre = $(this).attr("trimestre")

        let data=tabla.DataTable().row($(this).parents("tr")).data();

        console.log(data);

		$("#idOrganismo").val(data[10])
		$("#trimestre").val(trimestre)
		if(trimestre =="primerTrimestre"){
			$("#fechaModificacion").val($("#fechaPlazo1erTrimestre"+data[10]).val())
		}else if(trimestre =="segundoTrimestre"){
			$("#fechaModificacion").val($("#fechaPlazo2doTrimestre"+data[10]).val())
		}else if(trimestre =="tercerTrimestre"){
			$("#fechaModificacion").val($("#fechaPlazo3erTrimestre"+data[10]).val())
		}else if(trimestre =="cuartoTrimestre"){
			$("#fechaModificacion").val($("#fechaPlazo4toTrimestre"+data[10]).val())
		}
		

    });
        
}

var seguimiento__insertarPlazosPersonal=function(boton){

	$(boton).click(function(){

	
		var fecha = $("#fechaModificacion").val();
		var trimestre = $("#trimestre").val();
		var idOrganismo = $("#idOrganismo").val();

		if( $('#selectorPlazosPersonal').val() == "incidencia"){
			var tipoDocumento = $("#selectorPlazosPersonal").val();
			
		}else if( $('#selectorPlazosPersonal').val() == "prorroga"){
			var tipoDocumento = $("#selectorPlazosPersonal").val();
			
		}
		
		

		var confirm= alertify.confirm('¿Desea Guardar la Fecha Ingresada?','¿Desea Guardar la Fecha Ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','guarda__seguimientos__plazos__personal');	

			paqueteDeDatos.append('trimestre',trimestre);	
			paqueteDeDatos.append('fecha',fecha);	
			paqueteDeDatos.append('idOrganismo',idOrganismo);	
			paqueteDeDatos.append('tipoDocumento',tipoDocumento);	
			paqueteDeDatos.append('nombreDocumentoactividad1', $("#archivoPlazosPersonal")[0].files[0]);

			$.ajax({
				
				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
			
		}); 

		

	});


}

var seguimiento__insertarPlazosEstados=function(parametro1){

	$(parametro1).click(function(){

		trimestre = $(this).attr('trimestre');
		estado = $(this).attr('estado');
		

		var array = new Array(); 

		$(".checkeds__seleccionables__estado__plazos").each(function(index) {

			if ($(this).attr('attr')==trimestre) {

				var condicion = $(this).is(":checked");

				 if (condicion) {

					let idOrganismoVar=$(this).attr('idOrganismos');

					

					array.push(idOrganismoVar);

				}

		   } 

		});

		if (array.length==0) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar por lo menos un organismo a realizar "+estado +" del "+trimestre, "error", 5, function(){});

		}else{

		let letrero=$(this).attr('botonClass');

		
			var confirm= alertify.confirm('','¿Está seguro de realizar '+estado +' de los organismos seleccionados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','guarda__seguimientos__plazos__estado');	

			paqueteDeDatos.append("array",JSON.stringify(array));

			paqueteDeDatos.append('estado',estado);	

			paqueteDeDatos.append('trimestre',trimestre);	

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
				
		}); 

		}

	});


}


var funcion__insertar_estado_plazos_modal=function(boton){

    
    $(boton).click(function(){

		var trimestre = $(this).attr("trimestre")
		var estado = $(this).attr("estado");

			$("#trimestre").val(trimestre)
		
			$("#estado").val(estado)
		
		

    });
        
}

var seguimiento__insertarPlazosEstados_Documentos=function(parametro1){

	$(parametro1).click(function(){

		var trimestre = $("#trimestre").val();
		var estado = $("#estado").val();
		
		var array = new Array(); 

		$(".checkeds__seleccionables__estado__plazos").each(function(index) {

			if ($(this).attr('attr')==trimestre) {

				var condicion = $(this).is(":checked");

				 if (condicion) {

					let idOrganismoVar=$(this).attr('idOrganismos');

					

					array.push(idOrganismoVar);

				}

		   } 

		});

		if (array.length==0) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Es obligatorio seleccionar por lo menos un organismo a realizar "+estado +" del "+trimestre, "error", 5, function(){});

		}else{

		var confirm= alertify.confirm('','¿Está seguro de realizar '+estado +' de los organismos seleccionados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','guarda__seguimientos__plazos__estado_documentos');	

			paqueteDeDatos.append("array",JSON.stringify(array));

			paqueteDeDatos.append('estado',estado);	

			paqueteDeDatos.append('trimestre',trimestre);	

			paqueteDeDatos.append('nombreDocumentoactividad1', $("#archivoPlazosPersonal")[0].files[0]);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
				
		}); 

		}

	});


}


var seguimiento__insertarPlazosSuspension=function(parametro1){

	$(parametro1).click(function(){

		var arrayOrganismoPrimerTrimestre = new Array(); 
		var arrayOrganismoSegundoTrimestre = new Array(); 
		var arrayOrganismoTercerTrimestre = new Array(); 
		var arrayOrganismoCuartoTrimestre = new Array(); 

		var arrayCorreoPrimerTrimestre = new Array(); 
		var arrayCorreoSegundoTrimestre = new Array(); 
		var arrayCorreoTercerTrimestre = new Array(); 
		var arrayCorreoCuartoTrimestre = new Array(); 

		var arrayNombreODPrimerTrimestre = new Array(); 
		var arrayNombreODSegundoTrimestre = new Array(); 
		var arrayNombreODTercerTrimestre = new Array(); 
		var arrayNombreODCuartoTrimestre = new Array(); 

		var arrayFechaPrimerTrimestre = new Array(); 
		var arrayFechaSegundoTrimestre = new Array(); 
		var arrayFechaTercerTrimestre = new Array(); 
		var arrayFechaCuartoTrimestre = new Array(); 
	

		var table = $('#reactivaciones_suspenciones_plazos').DataTable();

		for(let i=0;i<table.data().count();i++ ){

			var rows = table.row( i ).data()

			if(i==0){
				console.log(table.row( i ).data())
			}

			const today = new Date();
                        
			const fecha1= new Date(rows[10])
			const fecha2= new Date(rows[17])
			const fecha3= new Date(rows[24])
			const fecha4= new Date(rows[31])

			const timeDifference = fecha1 - today;
			const timeDifference2 = fecha2 - today;
			const timeDifference3 = fecha3 - today;
			const timeDifference4 = fecha4 - today;

			const daysDifference1 = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));
			const daysDifference2 = Math.ceil(timeDifference2 / (1000 * 60 * 60 * 24));
			const daysDifference3 = Math.ceil(timeDifference3 / (1000 * 60 * 60 * 24));
			const daysDifference4 = Math.ceil(timeDifference4 / (1000 * 60 * 60 * 24));

			if(((rows[8]!=null) && (rows[10]!=null) && (rows[8] > rows[10]) && rows[12]==null) || ((rows[8]==null) && (rows[10]!=null) && (daysDifference1 < 0) && rows[12]==null)){
				
				arrayOrganismoPrimerTrimestre.push(rows[35])
				arrayCorreoPrimerTrimestre.push(rows[5])
				arrayNombreODPrimerTrimestre.push(rows[2])
				arrayFechaPrimerTrimestre.push(rows[10])
				
				
			}
			if(((rows[15]!=null) && (rows[17]!=null) && (rows[15] > rows[17]) && rows[19]==null) || ((rows[15]==null) && (rows[17]!=null) && (daysDifference2 < 0) && rows[19]==null)){
				
				arrayOrganismoSegundoTrimestre.push(rows[35])
				arrayCorreoSegundoTrimestre.push(rows[5])
				arrayNombreODSegundoTrimestre.push(rows[2])
				arrayFechaSegundoTrimestre.push(rows[17])
			}
			if(((rows[22]!=null) && (rows[24]!=null) && (rows[22] > rows[24]) && rows[26]==null) || ((rows[22]==null) && (rows[24]!=null) && (daysDifference3 < 0) && rows[26]==null)){
				
				arrayOrganismoTercerTrimestre.push(rows[35])
				arrayCorreoTercerTrimestre.push(rows[5])
				arrayNombreODTercerTrimestre.push(rows[2])
				arrayFechaTercerTrimestre.push(rows[24])
				
			}
			if(((rows[29]!=null) && (rows[31]!=null) && (rows[29] > rows[31]) && rows[33]==null) || ((rows[29]==null) && (rows[31]!=null) && (daysDifference4 < 0) && rows[33]==null) ){
				
				arrayOrganismoCuartoTrimestre.push(rows[35])
				arrayCorreoCuartoTrimestre.push(rows[5])
				arrayNombreODCuartoTrimestre.push(rows[2])
				arrayFechaCuartoTrimestre.push(rows[31])
			}
		
			
		}

		
		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','guarda__seguimientos__plazos__estado__suspenciones__automaticas');	

		paqueteDeDatos.append("arrayOrganismoPrimerTrimestre",JSON.stringify(arrayOrganismoPrimerTrimestre));
	
		paqueteDeDatos.append("arrayOrganismoSegundoTrimestre",JSON.stringify(arrayOrganismoSegundoTrimestre));
		
		paqueteDeDatos.append("arrayOrganismoTercerTrimestre",JSON.stringify(arrayOrganismoTercerTrimestre));

		paqueteDeDatos.append("arrayOrganismoCuartoTrimestre",JSON.stringify(arrayOrganismoCuartoTrimestre));

		paqueteDeDatos.append("arrayCorreoPrimerTrimestre",JSON.stringify(arrayCorreoPrimerTrimestre));
	
		paqueteDeDatos.append("arrayCorreoSegundoTrimestre",JSON.stringify(arrayCorreoSegundoTrimestre));
		
		paqueteDeDatos.append("arrayCorreoTercerTrimestre",JSON.stringify(arrayCorreoTercerTrimestre));

		paqueteDeDatos.append("arrayCorreoCuartoTrimestre",JSON.stringify(arrayCorreoCuartoTrimestre));

		paqueteDeDatos.append("arrayNombreODPrimerTrimestre",JSON.stringify(arrayNombreODPrimerTrimestre));
	
		paqueteDeDatos.append("arrayNombreODSegundoTrimestre",JSON.stringify(arrayNombreODSegundoTrimestre));
		
		paqueteDeDatos.append("arrayNombreODTercerTrimestre",JSON.stringify(arrayNombreODTercerTrimestre));

		paqueteDeDatos.append("arrayNombreODCuartoTrimestre",JSON.stringify(arrayNombreODCuartoTrimestre));

		paqueteDeDatos.append("arrayFechaPrimerTrimestre",JSON.stringify(arrayFechaPrimerTrimestre));
	
		paqueteDeDatos.append("arrayFechaSegundoTrimestre",JSON.stringify(arrayFechaSegundoTrimestre));
		
		paqueteDeDatos.append("arrayFechaTercerTrimestre",JSON.stringify(arrayFechaTercerTrimestre));

		paqueteDeDatos.append("arrayFechaCuartoTrimestre",JSON.stringify(arrayFechaCuartoTrimestre));

		paqueteDeDatos.append("estado","SUSPENSION");


		$.ajax({

			type:"POST",
			url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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


}

/*====================================
=           notificarFechasPlazos          =
====================================*/

var seguimiento__notificarFechasPlazos=function(parametro1){

	$(parametro1).click(function(){

		var arrayOrganismoPrimerTrimestre = new Array(); 
		var arrayOrganismoSegundoTrimestre = new Array(); 
		var arrayOrganismoTercerTrimestre = new Array(); 
		var arrayOrganismoCuartoTrimestre = new Array(); 
		var arrayFechaPrimerTrimestre = new Array(); 
		var arrayFechaSegundoTrimestre = new Array(); 
		var arrayFechaTercerTrimestre = new Array(); 
		var arrayFechaCuartoTrimestre = new Array(); 
	

		var table = $('#reactivaciones_suspenciones_plazos').DataTable();

		for(let i=0;i<table.data().count();i++ ){

			var rows = table.row( i ).data()
			
			const fechaActual = new Date();

			// Calculate the time difference in milliseconds

			let fecha1trismetre=new Date(rows[10]);
			let fecha2trismetre=new Date(rows[17]);
			let fecha3trismetre=new Date(rows[24]);
			let fecha4trismetre=new Date(rows[31]);

			const fechaPrimerTrimestre = fecha1trismetre - fechaActual;
			const fechaSegundoTrimestre = fecha2trismetre - fechaActual;
			const fechaTercerTrimestre = fecha3trismetre - fechaActual;
			const fechaCuartoTrimestre = fecha4trismetre - fechaActual;

			// Convert milliseconds to days

			const diferenciaDias1 = Math.ceil(fechaPrimerTrimestre / (1000 * 60 * 60 * 24));
			const diferenciaDias2 = Math.ceil(fechaSegundoTrimestre / (1000 * 60 * 60 * 24));
			const diferenciaDias3 = Math.ceil(fechaTercerTrimestre / (1000 * 60 * 60 * 24));
			const diferenciaDias4 = Math.ceil(fechaCuartoTrimestre / (1000 * 60 * 60 * 24));

			if((rows[10]!=null) && (diferenciaDias1==10 || diferenciaDias1==20)){
				arrayOrganismoPrimerTrimestre.push(rows[5])
				arrayFechaPrimerTrimestre.push(rows[10])

			}
			if((rows[17]!=null) && (diferenciaDias2==10 || diferenciaDias2==20) ){
				
				arrayOrganismoSegundoTrimestre.push(rows[5])
				arrayFechaSegundoTrimestre.push(rows[17])
			}
			if((rows[24]!=null) && (diferenciaDias3==10 || diferenciaDias3==20) ){
				
				arrayOrganismoTercerTrimestre.push(rows[5])
				arrayFechaTercerTrimestre.push(rows[24])
				
			}
			if((rows[31]!=null) && (diferenciaDias4==10 || diferenciaDias4==20)){
				
				arrayOrganismoCuartoTrimestre.push(rows[5])
				arrayFechaCuartoTrimestre.push(rows[31])
				
			}
		
			
		}

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','notificar__correos__plazos__ODS');	

		paqueteDeDatos.append("arrayOrganismoPrimerTrimestre",JSON.stringify(arrayOrganismoPrimerTrimestre));
	
		paqueteDeDatos.append("arrayOrganismoSegundoTrimestre",JSON.stringify(arrayOrganismoSegundoTrimestre));
		
		paqueteDeDatos.append("arrayOrganismoTercerTrimestre",JSON.stringify(arrayOrganismoTercerTrimestre));

		paqueteDeDatos.append("arrayOrganismoCuartoTrimestre",JSON.stringify(arrayOrganismoCuartoTrimestre));

		paqueteDeDatos.append("arrayFechaPrimerTrimestre",JSON.stringify(arrayFechaPrimerTrimestre));
	
		paqueteDeDatos.append("arrayFechaSegundoTrimestre",JSON.stringify(arrayFechaSegundoTrimestre));
		
		paqueteDeDatos.append("arrayFechaTercerTrimestre",JSON.stringify(arrayFechaTercerTrimestre));

		paqueteDeDatos.append("arrayFechaCuartoTrimestre",JSON.stringify(arrayFechaCuartoTrimestre));

		
		$.ajax({

			type:"POST",
			url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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


}


/*=====  End of Insertar seguimiento definitivos  ======*/

/*====================================
=           notificar_plazos_planificacion_financiero          =
====================================*/
    
var funcion__ajustado_planificacion_financiero=function(tbody,tabla){

    
    $(tbody).on("click","button.seguimiento_notificar_plazos_planificacion_financiero",function(e){

        e.preventDefault();

        var trimestre = $(this).attr("trimestre")
		var estado = $(this).attr("estado")

        let data=tabla.DataTable().row($(this).parents("tr")).data();

		$("#trimestre").val(trimestre)
		$("#estado").val(estado)
		$("#idOrganismo").val(data[43])

    });
        
}

/*====================================
=           notificar_plazos_planificacion_financiero          =
====================================*/
    
var funcion__reactivado__suspendido_planificacion_financiero=function(tbody,tabla){

    
    $(tbody).on("click","button.seguimiento_notificar_plazos_planificacion_financiero",function(e){

        e.preventDefault();

        var trimestre = $(this).attr("trimestre")
		var estado = $(this).attr("estado")

        let data=tabla.DataTable().row($(this).parents("tr")).data();

		var idOrganismo = data[43]

		var confirm= alertify.confirm('','¿Está seguro de determinar valor '+estado +' al organismos seleccionados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','guarda__seguimientos__estado__reactivado__suspendido__planificacion_documentos');	

			paqueteDeDatos.append("idOrganismo",idOrganismo);

			paqueteDeDatos.append('estado',estado);	

			paqueteDeDatos.append('trimestre',trimestre);	


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
				
		}); 


    });
        
}


var seguimiento__insertarEstado_Ajustado_Planificacion_Documentos=function(parametro1){

	$(parametro1).click(function(){

		var trimestre = $("#trimestre").val();
		var estado = $("#estado").val();
		var idOrganismo = $("#idOrganismo").val();
		

		var confirm= alertify.confirm('','¿Está seguro de determinar valor '+estado +' al organismos seleccionados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','guarda__seguimientos__estado__ajustado__planificacion_documentos');	

			paqueteDeDatos.append("idOrganismo",idOrganismo);

			paqueteDeDatos.append('estado',estado);	

			paqueteDeDatos.append('trimestre',trimestre);	

			paqueteDeDatos.append('nombreDocumentoactividad1', $("#archivoPlazosPersonal")[0].files[0]);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
			alertify.notify("Canceló el envío", "error", 5, function(){}); 
				
		}); 

		

	});


}


/*=====  End of Insertar seguimiento definitivos  ======*/



/*=====================================================
	=            Recomendar recomendados altos            =
	=====================================================*/
	
	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados2023=function(parametro1){

		$(parametro1).click(function(e){

			var pdfVal = $('#informe__recomendado').val();

			if (($("#idRolAd").val()==4 || $("#idRolAd").val()==2) && pdfVal=='') {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de recomendar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos');	

					if($(".selects__superiores__regresar").val() != undefined){
						var selects__superiores=$(".selects__superiores__regresar").val();
					}else{
						var selects__superiores='1'
					}

					
					let organismoOculto__modal=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();

					let idRol=$("#idRolAd").val();

					let idUsuarios=$("#idUsuarioC").val();

					let nombreDocumento=$("#nombreDocumento").val();

					paqueteDeDatos.append("selects__superiores",selects__superiores);
					paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("idRol",idRol);
					paqueteDeDatos.append("idUsuarios",idUsuarios);
					paqueteDeDatos.append("nombreDocumento",nombreDocumento);

					paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);


					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);



					$.ajax({
					
						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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

	
	
	/*=====  End of Recomendar recomendados altos  ======*/




	/*=====================================================
	=            Recomendar recomendados altos            =
	=====================================================*/
	
	var informacion__analistas__reasignar__regresar__formRec__recomendar__recomendados2023=function(parametro1){

		$(parametro1).click(function(e){

			var pdfVal = $('#informe__recomendado').val();

			if (($("#idRolAd").val()==4 || $("#idRolAd").val()==2) && pdfVal=='') {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de recomendar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__formativo');	

					if($(".selects__superiores__regresar").val() != undefined){
						var selects__superiores=$(".selects__superiores__regresar").val();
					}else{
						var selects__superiores='1'
					}

					
					let organismoOculto__modal=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();

					let idRol=$("#idRolAd").val();

					let idUsuarios=$("#idUsuarioC").val();

					let nombreDocumento=$("#nombreDocumento").val();

					paqueteDeDatos.append("selects__superiores",selects__superiores);
					paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("idRol",idRol);
					paqueteDeDatos.append("idUsuarios",idUsuarios);
					paqueteDeDatos.append("nombreDocumento",nombreDocumento);
					paqueteDeDatos.append("tipoAct",$("#tipo").val());

					

					paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);


					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);



					$.ajax({
					
						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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

	
	
	/*=====  End of Recomendar recomendados altos  ======*/



	/*===========================================================
=            Insertar remanentes administradores            =
===========================================================*/

var enviar__remanentes__admini2023=function(parametro1,parametro2,parametro3){

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

				var valor1= parseFloat($("#monto__incrementoRemantes").val() );
				var valor2 = parseFloat($("#monto__descuentoRemantes").val() );

				
				var suma = parseFloat(valor1+valor2).toFixed(2);
				let monto__incrementoRemantes=suma;
				let monto__autogestion=$("#monto__autogestion").val();
	
				paqueteDeDatos.append('archivo', $("#archivo__saldoEstados")[0].files[0]);
				paqueteDeDatos.append('monto__incrementoRemantes',monto__incrementoRemantes);
				paqueteDeDatos.append('monto__autogestion',monto__autogestion);
	
	
				$.ajax({
	
					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_REVISOR/inserta.md.php",
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
					$('.reload__Enviosrealizados').html(' ');
	
				}); 
			}); 
	
	
		// }
	
	
	});
	
	}
	
	
	
	/*=====  End of Insertar remanentes administradores  ======*/