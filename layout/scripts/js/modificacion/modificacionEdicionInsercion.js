var segmentosJsAjax=function(parametro1,parametro2,idActividad,parametro3,parametro4,parametro5){

	var paqueteDeDatos = new FormData();

	$(parametro1).html(" ");

	paqueteDeDatos.append("tipo",parametro2);
	var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
	paqueteDeDatos.append('idOrganismoPrincipal', idOrganismoPrincipal);
	paqueteDeDatos.append('idActividad', idActividad);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			$.getScript("layout/scripts/js/modificacion/validacionSegmentosInsertar.js",function(){

		   	var elementos=JSON.parse(response);

		   	/*=================================================
		   	=            Llamar variables del json            =
		   	=================================================*/
		   	
		   	var informacionSeleccionada=elementos['informacionSeleccionada'];
		   	var obtenerInformacion2=elementos['obtenerInformacion2'];
		   	var obtenerInformacion3=elementos['obtenerInformacion3'];	

		   	var obtenerInformacionItems=elementos['obtenerInformacionItems'];

		   	/*=====  End of Llamar variables del json  ======*/

		   	/*==========================================================================
		   	=            declararcion de array y asingacion de valores json            =
		   	==========================================================================*/
		   	
		   	var array = new Array(); 
		   	var array2 = new Array(); 


		   	for (z of obtenerInformacion2) {

		   		array.push(z.idActividad);

		   	}

		   	for (y of obtenerInformacion3) {

		   		array2.push(y.idActividad);

		   	}
		   	
		   	var idAc1 = array2.indexOf("1");
		   	var idAc2 = array2.indexOf("4");

		   	if (idAc1 != -1) {

		   		array2.push("4");

		   	}


		   	if (idAc2 != -1) {

		   		array2.push("1");

		   	}


		   	/*=====  End of declararcion de array y asingacion de valores json  ======*/
		   	

		   	var bandera=false;
		   	var bandera2=false;

		   	/*=========================================================
		   	=            recorriendo y creando los modales            =
		   	=========================================================*/
		   	
		   	for (x of informacionSeleccionada) {


		   		/*==============================================
		   		=            Ocultar tabla de items            =
		   		==============================================*/
		   		
		   		$(".contenedorItemsC"+x.idActividades).hide();
		   		
		   		/*=====  End of Ocultar tabla de items  ======*/
		   		
		   		/*=====================================================================
		   		=            Buscar indice de array para abir los checkeds            =
		   		=====================================================================*/

		   		//esto se realiza con la finalidad de activar o no el chequed dependiendo si la actividad coincide con el valor resultante
		   		
		   		var idx = array.indexOf(x.idActividades);
				var idx2 = array2.indexOf(x.idActividades);
		   		
		   		/*=====  End of Buscar indice de array para abir los checkeds  ======*/

		   		/*============================================================================
		   		=            creación de las filas de la tabla por cada actividad            =
		   		============================================================================*/
		   		
		   		$(parametro1).append('<tr class="fila__ac'+x.idActividades+' checkeds__indicadores"></tr>');	
		   		
		   		/*=====  End of creación de las filas de la tabla por cada actividad  ======*/
		   		

		   		/*==========================================
		   		=            Asignar el checked            =
		   		==========================================*/
		   		
				if(idx != -1) {
					
					$("#crear"+x.idActividades).attr('checked','checked');

					$("#insertar"+x.idActividades).hide();


					$(".itemsContents"+x.idActividades).append('<input type="hidden" id="idActividad'+x.idActividades+'" name="idActividad'+x.idActividades+'" value="'+x.idActividades+'">');


			   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

			   			//$(".filaAc_"+x.idActividades).append('Puede visualizar la información en su reportería');

			   			//$("#crearItemAc"+x.idActividades).remove();

			   		}


					bandera=true;

					if (idx2 != -1) {

						$("#crearItemAc"+x.idActividades).attr('checked','checked');

						var paqueteDeDatos = new FormData();

						var idOrganismo=$("#organismoIdPrin").val();

						paqueteDeDatos.append("tipo","gruposItems");
						paqueteDeDatos.append("idActividades",x.idActividades);
						paqueteDeDatos.append("idOrganismoPrincipal",idOrganismo);
					
						$.ajax({

						    type:"POST",
						    url:"modelosBd/inserta/seleccionaAcciones.md.php",
						    contentType: false,
						    data:paqueteDeDatos,
						    processData: false,
						    cache: false, 
					    	success:function(response){

				            	var elementos=JSON.parse(response);

				            	var idActividades=elementos['idActividades'];

				            	var arrayGrupo51=elementos['arrayGrupo51'];
				            	var arrayGrupo53=elementos['arrayGrupo53'];
				            	var arrayGrupo57=elementos['arrayGrupo57'];
				            	var arrayGrupo58=elementos['arrayGrupo58'];
				            	var arrayGrupo84=elementos['arrayGrupo84'];

				            	var arrayAguaLuz=elementos['arrayAguaLuz'];

				            	var arrayGrupoHonorarios=elementos['arrayGrupoHonorarios'];

				            	var obtenerInformacionItems=elementos['obtenerInformacionItems'];


				            	/*=====================================
				            	=            Items totales            =
				            	=====================================*/
				            	var array3 = new Array(); 

				            	for (xcl of obtenerInformacionItems) {

							   		array3.push(xcl.idItem);

							   	}
				            	/*=====  End of Items totales  ======*/

				            	var headMeses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];


				            	if (idActividades==1 || idActividades==4) {

				            		$(".fila__ac"+idActividades).append('<td><center class="fila__actividad1'+idActividades+'"></div>');
				            		
				            	}


				            	if (idActividades==1 && (arrayGrupo53.length>0 || arrayGrupo58.length>0 || arrayGrupo57.length>0)) {

				            		var arrayMatriz = arrayGrupo53.concat(arrayGrupo57);

				            		$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><a class="col-12 enlaceMatriz__administrativos'+idActividades+'" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz__administrativos'+idActividades+'">Actividad Administrativa</a></div>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/modificacion/modificacionPoaConstruccionInsertar.js",function(){

				            			let itemEnviados=$("#item__modificaciones__destino__modificaciones2__seleccion").val();
				            		
										enlacesMatriz($(".enlaceMatriz__administrativos"+idActividades),['CÓDIGO ÍTEM','ÍTEM','Justificación de la adquisición del bien o servicio','Cantidad del bien o servicio a adquirir',"Guardar"],headMeses,'Total programación financiera',idActividades,"actividad__administrativa",true,itemEnviados);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/
				            		
				            	}


				            	if ((idActividades==4) && (arrayGrupo51.length>0) && (parametro3=="sueldos") && $("#identificadorPaginaReal").val()!="diferentes") {

				            		var arrayMatriz = arrayGrupo51;

				            		

				            		if ($("#eventos_intervencion__seleccion").val()=="eventoCrear") {

				            			$(".creador__modificador__acciones").remove();

				            			$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center crear__acciones__eventos"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz__SueldosSalarios'+idActividades+'">SUELDOS Y SALARIOS</a></div>');


				            		}else{

				            			$(".crear__acciones__eventos").remove();

				            			$("#eventos_intervencion__seleccion").before('<br><div class="row d d-flex justify-content-center creador__modificador__acciones" style="margin-bottom:1em;"><a class="col-12  btn btn-primary" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz__SueldosSalarios'+idActividades+'">SUELDOS Y SALARIOS</a></div>');

				            		}


				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/modificacion/modificacionPoaConstruccionInsertar.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz__SueldosSalarios"+idActividades),['No. Cédula de ciudadanía / pasaporte','Apellidos y Nombres','Cargo','Tipo de cargo','Tiempo de trabajo (en meses)','Salario Mensual','Aporte patronal','Décimo tercer sueldo','Mensualización Decimotercera remuneración','Décimo cuarto sueldo','Mensualización Decimocuarta remuneración','Fondos de reserva'],headMeses,'Total',idActividades,"sueldos__salarios",true,parametro4,parametro5);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/

				            	}


				            	if ((idActividades==4) && (arrayGrupoHonorarios.length>0 && parametro3=="honorarios") && $("#identificadorPaginaReal").val()!="diferentes") {

				            		var arrayMatriz = arrayGrupoHonorarios;

				            		$(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz__honorarios'+idActividades+'">HONORARIOS</a></div>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/


				            		$.getScript("layout/scripts/js/modificacion/modificacionPoaConstruccionInsertar.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz__honorarios"+idActividades),['No. Cédula de ciudadanía / pasaporte','Apellidos y Nombres','Cargo','Tipo de cargo','Honorario mensual (Incluido el IVA)'],headMeses,'TOTAL',idActividades,"honorarios__s",true,parametro4,parametro5);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/

				            	}



			            		if (idActividades==1 && arrayAguaLuz.length>0) {


									// $(".fila__actividad1"+idActividades).append('<br><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+arrayMatriz+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatrizSuministro'+idActividades+'">Suministros</a></div>');
				            		
				            	}

				            	/*==================================================
				            	=            Cuando el poa esta enviado            =
				            	==================================================*/

						   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

						   			//$(".fila__actividad1"+idActividades).empty();

						   			//$(".fila__actividad1"+idActividades).append('Puede visualizar la información en su reportería');

						   			
						   		}				            	
							            	
				            	
				            	/*=====  End of Cuando el poa esta enviado  ======*/
				            	

				            	if ((idActividades==3 || idActividades==5 || idActividades==6 || idActividades==7 && $("#identificadorPaginaReal").val()=="diferentes") || (idActividades==3 || idActividades==5 || idActividades==6 || idActividades==7 && $("#identificadorPaginaReal").val()=="honorarios") || (idActividades==3 || idActividades==5 || idActividades==6 || idActividades==7 && $("#identificadorPaginaReal").val()=="sueldos") && idActividades!=2) {

				            		$(".fila__ac"+idActividades).append('<td class="act3__'+idActividades+'"><center><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+array3+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz'+idActividades+'">Actividades Deportivas</a></div></center></td>');

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/modificacion/modificacionPoaConstruccionInsertar.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz"+idActividades),['CÓDIGO ÍTEM','ÍTEM','TIPO DE FINANCIAMIENTO','NOMBRE DEL EVENTO','DEPORTE','PROVINCIA','SEDE CIUDAD -  PAIS','ALCANCE','FECHA INICIO','FECHA FIN','GÉNERO','CATEGORÍA','No.<br>ENTRENADORES OFICIALES','No. ATLETAS','TOTAL','MUJERES (BENEFICIARIOS)','HOMBRES (BENEFICIARIOS)','Detalle lo que el organismo va a adquirir','Justificación de la adquisición del bien o servicio','Cantidad del bien o servicio a adquirir'],headMeses,'Total Programación Financiera',idActividades,"poa__actividadesDeportivas",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/

							   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

							   			//$(".act3__"+idActividades).empty();

							   			//$(".act3__"+idActividades).append('<center>Puede visualizar la Finformación en su reportería</center>');

							   			
							   		}				            	
								            	


				            	}


				            	if (idActividades==2) {


				            		$(".fila__ac"+idActividades).append('<td class="filaA2__'+idActividades+'"><center><div class="row d d-flex justify-content-center;"><a class="col-12" style="color:white; cursor:pointer; text-transform:uppercase;" attr="'+array3+'" idOrganismo="'+$("#organismoIdPrin").val()+'" idActividad="'+idActividades+'" data-bs-toggle="modal" data-bs-target="#modalMatriz'+idActividades+'" id="enlaceMatriz'+idActividades+'">MANTENIMIENTO</a></div></center></td>');

					            		$("#enlaceMatriz1").remove();
					            		$("#enlaceMatriz3").remove();
					            		$("#enlaceMatriz4").remove();
					            		$("#enlaceMatriz5").remove();
					            		$("#enlaceMatriz6").remove();
					            		$("#enlaceMatriz7").remove();

				            		/*================================================================
				            		=            Añadir valores a modal y construir tabla            =
				            		================================================================*/

				            		$.getScript("layout/scripts/js/modificacion/modificacionPoaConstruccionInsertar.js",function(){
				            		
										enlacesMatriz($("#enlaceMatriz"+idActividades),['Nombre de la infraestructura o escenario deportivo','Provincia','Dirección completa','Estado','Tipo de recursos con los que se construyó','Tipo de Intervención','Detallar el tipo de intervención que se ha planificado realizar','Tipo de Mantenimiento','Materiales o Servicios a requerir para el mantenimiento','Fecha de últipo mantenimiento realizado'],false,'',idActividades,"poa__mantenimiento",true);

									});

												            		
				            		/*=====  End of Añadir valores a modal y construir tabla  ======*/
							   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

							   			//$(".filaA2__"+idActividades).empty();

							   			//$(".filaA2__"+idActividades).append('<center>Puede visualizar la información en su reportería</center>');

							   			
							   		}				            	
								            	


				            	}



	
							},
							error:function(){

							}
						
						});	

						bandera2=true;

					}

									
				}   		
		   		
		   		/*=====  End of Asignar el checked  ======*/

		   		/*======================================================================================================
		   		=            Añadiendo clases para despues sumar en la parte de programación de indicadores            =
		   		======================================================================================================*/

				$(".primerTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);
				$(".segundoTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);
				$(".tercerTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);
				$(".cuartoTrimestre"+x.idActividades).addClass('unanimes__clases'+x.idActividades);		   		
		   		
		   		
		   		/*=====  End of Añadiendo clases para despues sumar en la parte de programación de indicadores  ======*/
		   		
		   		/*===============================================
		   		=            Añadiendo incluir ceros            =
		   		===============================================*/
		   		

				incluirCeros($(".primerTrimestre"+x.idActividades));
				incluirCeros($(".segundoTrimestre"+x.idActividades));
				incluirCeros($(".tercerTrimestre"+x.idActividades));
				incluirCeros($(".cuartoTrimestre"+x.idActividades));		   		
		   		
		   		/*=====  End of Añadiendo incluir ceros  ======*/
		   		
		   		/*=========================================
		   		=            Sumar indicadores            =
		   		=========================================*/
		   		
		   		sumarIndicadores($(".unanimes__clases"+x.idActividades),$(".metaAnualIndicador"+x.idActividades));
		   		
		   		/*=====  End of Sumar indicadores  ======*/
		   		
		   		/*==============================================
		   		=            Actualizar información            =
		   		==============================================*/
		   		

		   		selectObjetivosEstrategicos($("#crear"+x.idActividades),$(".objetivoEstaregicoSelect"+x.idActividades),x.idActividades,$(".idAtributoEscondido"));

				obteniendoInputEscondido($(".botonAcbotonItems"+x.idActividades),x.idActividades,$(".idAtributoEscondido"));

		   		selectObjetivosPrincipal($("#crear"+x.idActividades),$(".objetivoPrincipalSelect"+x.idActividades));
		   		programasPrincipal($("#crear"+x.idActividades),$(".programaSelect"+x.idActividades));


		   		selectPrograma($(".objetivoPrincipalSelect"+x.idActividades),$(".programaSelect"+x.idActividades));
		   		

		   		guardarElementos($("#insertar"+x.idActividades),$(".formModalActividades"+x.idActividades),$(".reload__EnviosrealizadosAc"),"poaOrganismo",x.idActividades);

		   		actualizaInfor($("#crear"+x.idActividades),"actividadesUso",$(".idOrganismo"),x.idActividades,$(".formModalActividades"+x.idActividades),[$(".primerTrimestre"+x.idActividades),$(".segundoTrimestre"+x.idActividades),$(".tercerTrimestre"+x.idActividades),$(".cuartoTrimestre"+x.idActividades),$(".metaAnualIndicador"+x.idActividades)]);
		   		
		   		
		   		/*=====  End of Actualizar información  ======*/

		   		/*=========================================
		   		=            Información items            =
		   		=========================================*/

		   		// crear items
		   		
		   		segmentosJs($("#agregarItems"+x.idActividades),$(".itemsContents"+x.idActividades),["select"],[19],10,"agregarItesOrganismosPre",x.idActividades);	

		   		// ver items

		   		// tablasJs($("#verItemsActividades"+x.idActividades));


		   		if ($("#envioPreliminar").val()=="A") {

		   			// $("#agregarItems"+x.idActividades).hide();
		   			
		   		}

		   		
		   		/*=====  End of Información items  ======*/
		   		
		   		/*=======================================
		   		=            Ocultar mostrar            =
		   		=======================================*/

				var ocultarVariables=function(parametro1,parametro2,parametro3,parametro4){

					$(parametro1).click(function(e){

						$(parametro2).hide();
						$(parametro3).show();

					});

				}

				ocultarVariables($("#verItemsActividades"+x.idActividades),$(".unanimeEl__"+x.idActividades),$(".contenedorItemsC"+x.idActividades),true);
				ocultarVariables($("#agregarItems"+x.idActividades),$(".contenedorItemsC"+x.idActividades),$(".unanimeEl__"+x.idActividades),false);
		   		
		   		
		   		
		   		/*=====  End of Ocultar mostrar  ======*/

		   		/*=====================================================
		   		=            Eviatar el cambio del checked            =
		   		=====================================================*/
		   		
		   		var evitarCambioChecked=function(parametro1,parametro2){

					$(parametro1).click(function(e){

						e.preventDefault();

					});

				}

				evitarCambioChecked($("#crearItemAc"+x.idActividades));	
				evitarCambioChecked($("#crear"+x.idActividades));			   		
		   		
		   		/*=====  End of Eviatar el cambio del checked  ======*/
		   		
		   		/*==================================================
		   		=            Datatablets items anidados            =
		   		==================================================*/


		   		var presionarItemsFuncion=function(parametro1,parametro2){

					$(parametro1).click(function(e){

						$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

							$("#tablaItemsAc"+parametro2).dataTable().fnDestroy();


					   		if ($("#envioPreliminar").val()=="A") {

					   			// datatablets($("#tablaItemsAc"+parametro2),"tablaItemsAc"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones' style='display:none;'><i class='fas fa-trash'></i></a><center>"," "],[false],[false]),-1,["funcion__datatabletsEliminar"],["itemsEscogidosEliminar"],["itemsPoaEliminas"],["elimina"]);

					   			datatablets($("#tablaItemsAcModificaInsertas"+parametro2),"tablaItemsAcModificaInsertas"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>","<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>"],[false],[false]),-1,["funcion__datatabletsEliminar","funcion__editarNue"],["itemsEscogidosEliminar","itemsEscogidosEditar"],["itemsPoaEliminas","itemsPoaEditas"],["elimina","edita"]);

					   			
					   		}else{

					   			datatablets($("#tablaItemsAcModificaInsertas"+parametro2),"tablaItemsAcModificaInsertas"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>","<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>"],[false],[false]),-1,["funcion__datatabletsEliminar","funcion__editarNue"],["itemsEscogidosEliminar","itemsEscogidosEditar"],["itemsPoaEliminas","itemsPoaEditas"],["elimina","edita"]);


					   		}

						
						});

					});

				}

				presionarItemsFuncion($("#verItemsActividades"+x.idActividades),x.idActividades);
		   		
		   		/*=====  End of Datatablets items anidados  ======*/
		   		

			}	

			if(bandera==false){

				$(".columna__item").hide();

			}else{

				$(".columna__item").show();

			}		

			if (bandera2==false) {

				$(".columna__matricez").hide();

			}else{

				$(".columna__matricez").show();

			}
		   	
		   	
		   	/*=====  End of recorriendo y creando los modales  ======*/


		   	/*===============================
		   	=            Ocultar            =
		   	===============================*/
		   	
		   	// $.getScript("layout/scripts/js/validaGlobal.js",function(){
		   	// 	ocultar__enPreliminar($("#envioPreliminar"));

		   	// });	
		   	
		   	/*=====  End of Ocultar  ======*/
		   	
			});			   	

		},
		error:function(){

		}
				
	});	

}






