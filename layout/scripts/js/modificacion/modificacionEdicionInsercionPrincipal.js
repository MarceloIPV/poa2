
$(document).ready(function () {

$.getScript("layout/scripts/js/modificacion/validacionSegmentosInsertar.js",function(){

var segmentosJsAjax=function(parametro1,parametro2){

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append("tipo",parametro2);
	var idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
	paqueteDeDatos.append('idOrganismoPrincipal', idOrganismoPrincipal);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

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
		   		
		   		
		   		$(parametro1).append('<tr class="fila__ac'+x.idActividades+' checkeds__indicadores"><td style="font-weight:bold;"><center>0'+x.idActividades+'</center></td><td><center>'+x.nombreActividades+'</center></td><td><center>'+x.indicador+'</center></td><td class="filaIn__'+x.idActividades+'"><center><input type="checkbox" data-bs-toggle="modal"  data-bs-target="#modalActividad'+x.idActividades+'" id="crear'+x.idActividades+'" /></center></td></tr>');	

		   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

		   			//$(".filaIn__"+x.idActividades).append('Puede visualizar la información en su reportería');

		   			//$("#crear"+x.idActividades).remove();

		   		}

		   		
		   		/*=====  End of creación de las filas de la tabla por cada actividad  ======*/
		   		

		   		/*==========================================
		   		=            Asignar el checked            =
		   		==========================================*/
		   		
				if(idx != -1) {
					
					$("#crear"+x.idActividades).attr('checked','checked');

					$("#insertar"+x.idActividades).hide();

					$(".fila__ac"+x.idActividades).append('<td class="filaAc_'+x.idActividades+'"><center><input type="checkbox" data-bs-toggle="modal" data-bs-target="#modalActividadItem'+x.idActividades+'" id="crearItemAc'+x.idActividades+'"/></center></td>');

					$(".itemsContents"+x.idActividades).append('<input type="hidden" id="idActividad'+x.idActividades+'" name="idActividad'+x.idActividades+'" value="'+x.idActividades+'">');


			   		if (($("#estadoFinal").val()!="" &&  $("#estadoFinal").val()!=undefined && $("#estadoFinal").val()!=null  && $("#estadoFinal").val()!=" " && $("#organismoIdPrin").val()!="1158" && $("#organismoIdPrin").val()!="1353" && $("#organismoIdPrin").val()!="1539" && $("#organismoIdPrin").val()!="1641" && $("#organismoIdPrin").val()!="1276" && $("#organismoIdPrin").val()!="1346" && $("#organismoIdPrin").val()!="1168" && $("#organismoIdPrin").val()!="1574" && $("#organismoIdPrin").val()!="1524" && $("#organismoIdPrin").val()!="1169" )) {

			   			//$(".filaAc_"+x.idActividades).append('Puede visualizar la información en su reportería');

			   			//$("#crearItemAc"+x.idActividades).remove();

			   		}


					bandera=true;

					if (idx2 != -1) {

						$("#crearItemAc"+x.idActividades).attr('checked','checked');


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


					   		datatablets($("#tablaItemsAcModificaInsertas"+parametro2),"tablaItemsAcModificaInsertas"+parametro2,[$("#organismoIdPrin").val(),parametro2],objetos([15,16],["boton","boton"],["<center><a class='itemsEscogidosEliminar estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>","<center><a class='itemsEscogidosEditar estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarMesesItems'><i class='fas fa-user-edit'></i></a><center>"],[false],[false]),-1,["funcion__datatabletsEliminar__modificaciones__en","funcion__editarNue"],["itemsEscogidosEliminar","itemsEscogidosEditar"],["itemsPoaEliminas","itemsPoaEditas"],["elimina","edita"]);

						
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
		   	
		   	

		},
		error:function(){

		}
				
	});	

}

segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas");

});	

});