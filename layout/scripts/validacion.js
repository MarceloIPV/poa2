$(document).ready(function () {


/*=============================================
=            Estilos de formulario            =
=============================================*/

var estilosFormularios=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		if ($(parametro1).attr('placeholder')==parametro3) {

			$(parametro1).attr('placeholder'," ");
			$(parametro2).text(parametro3);
			$(parametro1).attr('style','text-align:left!important; margin-left:1em!important;');

		}

		$(".contenedor__negro").attr('style','height:350px!important;');

	});

}

estilosFormularios($("#username"),$(".usuario__indicada"),"Ingrese usuario");
estilosFormularios($("#password"),$(".contrasena__indicada"),"Ingrese contraseña");
estilosFormularios($("#cedulaCiudadano"),$(".cedulaRotulo"),"Cédula presidente del club");
estilosFormularios($("#nombreCiudadano"),$(".nombreRotulo"),"Nombre presidente del club");
estilosFormularios($("#apellidoCiudadano"),$(".apellidoRotulo"),"Apellido presidente del club");
estilosFormularios($("#sexoCiudadano"),$(".sexoRotulo"),"Género presidente del club");
estilosFormularios($("#fechaDeNacimientoCiudadano"),$(".fechaDeNacimientoRotulo"),"Fecha nacimiento presidente del club");
estilosFormularios($("#emailCiudadano"),$(".emailRotulo"),"Correo presidente del club");
estilosFormularios($("#celularCiudadano"),$(".celularRotulo"),"Teléfono");
estilosFormularios($("#rucOrganismo"),$(".rucRotulo"),"Ruc organismo deportivo");
estilosFormularios($("#nombreOrganismo"),$(".nombreOrganismoRotulo"),"Nombre organismo deportivo");
estilosFormularios($("#emailOrganismo"),$(".emailOrganismoRotulo"),"Correo");
estilosFormularios($("#direccionOrganismo"),$(".direccionOrgadireccionRotulo"),"Dirección organismo deportivo");
estilosFormularios($("#referenciaOrganismo"),$(".referenciaOrgadireccionRotulo"),"Referencia dirección organismo deportivo");
estilosFormularios($("#barrioOrganismo"),$(".barrioRotulo"),"Barrio organismo deportivo");
estilosFormularios($("#numeroAcuerdoOrganismo"),$(".numeroAcuerdoRotulo"),"Número de acuerdo ministerial organismo deportivo");
estilosFormularios($("#fechaAcuerdoOrganismo"),$(".fechaAcuerdoRotulo"),"Fecha de acuerdo ministerial organismo deportivo");
estilosFormularios($("#nombreOrganismoSegunAcuerdoOrganismo"),$(".nombreOrganismoSegunAcuerdoRotulo"),"Nombre del organismo deportivo según acuerdo ministerial");
estilosFormularios($("#cedulaRepresentante"),$(".cedulaRepresentanteRotulo"),"Cédula representante del club");
estilosFormularios($("#nombreRepresentante"),$(".nombreRepresentanteRotulo"),"Nombre representante legal del club");
estilosFormularios($("#apellidoRepresentante"),$(".apellidoRepresentanteRotulo"),"Apellido representante legal del club");
estilosFormularios($("#emailRepresentante"),$(".emailRepresentanteRotulo"),"Correo representante legal del club");
estilosFormularios($("#telefonoOficinas"),$(".telefonoOficinasRotulo"),"Teléfono");
estilosFormularios($("#passwordOrganismo"),$(".passwordRotulo"),"Contraseña del organismo deportivo (recordar que el usuario será el ruc del organismo deportivo)");

/*=====  End of Estilos de formulario  ======*/

/*================================================
=            Añadiendo clases activas            =
================================================*/

var clasesActivas=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		$(parametro1).addClass('active__form');
		$(parametro2).removeClass('active__form');

		if (parametro3==1) {
			$(parametro1).removeClass('active__form');
			$(".ingresar__clases").addClass('active__form');
		}

	});

}

clasesActivas($(".registro__clases"),$(".ingresar__clases"),0);
clasesActivas($(".cerrar__modalRegistros"),$(".registro__clases"),1);

/*=====  End of Añadiendo clases activas  ======*/

/*======================================
=            Modal estatico            =
======================================*/

var modalEstaticos=function(parametro1){

	$(parametro1).modal({backdrop: 'static', keyboard: false})

}

modalEstaticos($("#modalRegistros"));
modalEstaticos($("#orgaModalOrga"));

/*=====  End of Modal estatico  ======*/


/*=============================================
=            Archivo de asignación            =
=============================================*/

var archivoInputObteniendoValor=function(parametro1,parametro2,parametro3){

	$(parametro1).change(function(e){

		var documentoNombre = $(parametro1).val().replace(/^.*[\\\/]/, "");

		$(parametro2).text(documentoNombre);

		!function(parametroEnviado1,parametroEnviado2) {
            if (parametroEnviado1.files && parametroEnviado1.files[0]) {
                var concatenadorInput = new FileReader;
                concatenadorInput.onload = function(parametroEnviado1) {
                    $(parametroEnviado2).html("<embed src='" + parametroEnviado1.target.result + "' id='archivoEmbebido' name='archivoEmbebido' type='application/pdf' width='100%' height='100px'/>")
                }, concatenadorInput.readAsDataURL(parametroEnviado1.files[0])
            }
        }(this,parametro3);

	});

}

archivoInputObteniendoValor($("#acuerdoMinisterial"),$(".nombre__direccionAcuerdo"),$(".documento__embebido"));
archivoInputObteniendoValor($("#acuerdoDeConfidencialidad"),$(".nombre__direccionAcuerdoConfidencialidad"),$(".documento__embebidoConfidencialidad"));
archivoInputObteniendoValor($("#acuerdoMinisterialNuevo"),$(".nombre__direccionAcuerdoMinisterial"),$(".documento__embebidoMinisterial"));


archivoInputObteniendoValor($("#registroDirectorio"),$(".nombre__direccionRegistroDirectorio"),$(".documento__embebido"));

archivoInputObteniendoValor($("#registroNombramiento"),$(".nombre__registroNombramiento"),$(".documento__embebido"));

archivoInputObteniendoValor($("#registroVigenteN"),$(".nombre__registroNombramientoGeneral"),$(".documento__embebido"));

archivoInputObteniendoValor($("#resolucionInterveciones"),$(".nombre__IntervencionesOr"),$(".documento__embebido"));


archivoInputObteniendoValor($("#polizaVigencia"),$(".clase__polizaVigencia"),$("#visualizaPolizaOriginal"));
archivoInputObteniendoValor($("#caucionOriginal"),$(".clase__caucionOriginal"),$("#visualizaCausion"));
archivoInputObteniendoValor($("#copiaBancario"),$(".clase__copiaBancario"),$("#visualizacopiaBancario"));
archivoInputObteniendoValor($("#copiaRegistro__directorio"),$(".clase__copiaRegistro__directorio"),$("#visualiza__copiaRegistro__directorio"));
archivoInputObteniendoValor($("#copiaFinanciero"),$(".clase__copiaFinanciero"),$("#visualizaFinanciero"));
archivoInputObteniendoValor($("#copiaGeneral"),$(".clase__copiaGeneral"),$("#visualizaCopiaGeneral"));
archivoInputObteniendoValor($("#copiaIntervencion"),$(".clase__copiaIntervencion"),$("#visualiza__copiaIntervencion"));
archivoInputObteniendoValor($("#copiaEstatutos"),$(".clase__copiaEstatutos"),$("#visualiza__copiaEstatutos"));
archivoInputObteniendoValor($("#copiaRucA"),$(".clase__copiaRucA"),$("#visualiza__copiaRucA"));

/*=====  End of Archivo de asignación  ======*/

/*===========================================
=            Reemplazar archivos            =
===========================================*/

var archivoRemplazarArchivos=function(parametro1,parametro2){

	$(parametro1).change(function(e){

		e.preventDefault();	

		var confirm= alertify.confirm('','¿Está seguro de cambiar el acuerdo ministerial?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo

			var paqueteDeDatos = new FormData();

			var nombreDocumento=$(parametro1).attr('nombreDocumento');



			paqueteDeDatos.append('tipo','cambioDocumento');

			paqueteDeDatos.append('documentoReemplazo',$(parametro1)[0].files[0]);

			paqueteDeDatos.append('nombreDocumento',nombreDocumento);

			paqueteDeDatos.append('direccionDocumentos',parametro2);

			$.ajax({

			    type:"POST",
			    url:"modelosBd/inserta/inserta.md.php",
			    contentType: false,
			    data:paqueteDeDatos,
			    processData: false,
			    cache: false, 
		    	success:function(response){

	            	var elementos=JSON.parse(response);

	            	var mensaje=elementos['mensaje'];

					if(mensaje==1){

			            alertify.set("notifier","position", "top-center");
			            alertify.notify("Acción realizado correctamente", "success", 5, function(){});


			            window.setTimeout(function(){ 

			            	location.reload();

			            } ,5000); 

	            	}

				},
				error:function(){

				}
			
			});				


		});

		confirm.set('oncancel', function(){
		 //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Canceló el envío", "success", 1, function(){}); 

		}); 

	});

}

archivoRemplazarArchivos($("#acuerdoMinisterialNuevo"),"../../documentos/acuerdosMinisteriales/");

/*=====  End of Reemplazar archivos  ======*/

/*====================================
=            Cerrar modal            =
====================================*/

var cerrarModales=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		 $(parametro2).modal('toggle');

	});

}

cerrarModales($(".modalCerrar__modales"),$("#modalAprobar"));
cerrarModales($(".modal__administrativo"),$("#lineaPoliticaEdita"));


/*=====  End of Cerrar modal  ======*/

/*===========================================
=            Ocultando variables            =
===========================================*/

var ocultarVariables=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		$(parametro2).hide();
		$(parametro3).show();

		$(parametro3).modal('hide');

	});

}

ocultarVariables($("#agregarLineaP"),$(".contenedorLineaTabla"),$(".conjunto__validas"));
ocultarVariables($("#verLineaP"),$(".conjunto__validas"),$(".contenedorLineaTabla"));

ocultarVariables($("#verPrograma"),$(".conjunto__validas"),$(".contenedorProgramaTabla"));
ocultarVariables($("#agregarPrograma"),$(".contenedorProgramaTabla"),$(".conjunto__validas"));

ocultarVariables($("#verIndicadores"),$(".conjunto__validas"),$(".contenedorIndicadores"));
ocultarVariables($("#agregarIndicadores"),$(".contenedorIndicadores"),$(".conjunto__validas"));

ocultarVariables($("#verDeportes"),$(".conjunto__validas"),$(".contenedorDeportesTabla"));
ocultarVariables($("#agregarDeportes"),$(".contenedorDeportesTabla"),$(".conjunto__validas"));

ocultarVariables($("#verAlcance"),$(".conjunto__validas"),$(".contenedorAlcanceTabla"));
ocultarVariables($("#agregarAlcance"),$(".contenedorAlcanceTabla"),$(".conjunto__validas"));

ocultarVariables($("#verFinanciamiento"),$(".conjunto__validas"),$(".contenedorFinanciamientoTabla"));
ocultarVariables($("#agregarFinanciamiento"),$(".contenedorFinanciamientoTabla"),$(".conjunto__validas"));

ocultarVariables($("#verCargo"),$(".conjunto__validas"),$(".contenedorCargoTabla"));
ocultarVariables($("#agregarCargo"),$(".contenedorCargoTabla"),$(".conjunto__validas"));

ocultarVariables($("#verObjetivo"),$(".conjunto__validas"),$(".contenedorObjetivoTabla"));
ocultarVariables($("#agregarObjetivo"),$(".contenedorObjetivoTabla"),$(".conjunto__validas"));

ocultarVariables($("#verTipoOrganismo"),$(".conjunto__validas"),$(".contenedorTipoTabla"));
ocultarVariables($("#agregarTipoOrganismo"),$(".contenedorTipoTabla"),$(".conjunto__validas"));


ocultarVariables($("#verAreaAccion"),$(".conjunto__validas"),$(".contenedorAccionTabla"));
ocultarVariables($("#agregarAreaAccion"),$(".contenedorAccionTabla"),$(".conjunto__validas"));


ocultarVariables($("#verAreaEncargada"),$(".conjunto__validas"),$(".contenedorAreaEncargadaTabla"));
ocultarVariables($("#agregarAreaEncargada"),$(".contenedorAreaEncargadaTabla"),$(".conjunto__validas"));

ocultarVariables($("#verGrupoGasto"),$(".conjunto__validas"),$(".contenedorGrupoGasto"));
ocultarVariables($("#agregarGrupoGasto"),$(".contenedorGrupoGasto"),$(".conjunto__validas"));

ocultarVariables($("#verActividades"),$(".conjunto__validas"),$(".contenedorActividades"));
ocultarVariables($("#agregarActividades"),$(".contenedorActividades"),$(".conjunto__validas"));

ocultarVariables($("#verItemsAc"),$(".conjunto__validas"),$(".contenedorItemsTablaAc"));
ocultarVariables($("#agregarItemsAc"),$(".contenedorItemsTablaAc"),$(".conjunto__validas"));

ocultarVariables($("#verItems"),$(".conjunto__validas"),$(".contenedorItems"));
ocultarVariables($("#agregarItems"),$(".contenedorItems"),$(".conjunto__validas"));

/*=====  End of Ocultando variables  ======*/

/*=============================================
=            Reactivando variables            =
=============================================*/

var reactivandoVariablesCodigo=function(parametro1,parametro2,parametro3,parametro4){

	if($(parametro1).val()!="" && $(parametro1).val()!=null){

		$(parametro2).show();

		$(parametro3).val(parametro4);

	}else{

		$(parametro2).hide();

		$(parametro3).val("");

	}

}

reactivandoVariablesCodigo($("#poaActividad"),$("#tablaPoaInicial"),$("#tipoAsignacionRecursos"),1);

/*=====  End of Reactivando variables  ======*/


/*==============================
=            Reload            =
==============================*/

var reloadFuncion=function(parametro1){

	$(parametro1).click(function(e){

		location.reload();

	});

}

reloadFuncion($(".modales__reload"));
reloadFuncion($(".cerrar__reload__inicio"));

/*=====  End of Reload  ======*/


/*======================================
=            Abriendo menús            =
======================================*/

var cerrandoMenus=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		if ($(parametro1).find('.item__remplazoModales').hasClass("sub__menuElementos")) {

			$(parametro1).find('.item__remplazoModales').removeClass("sub__menuElementos");

			$(parametro1).find('.item__remplazoModales').html('<i class="fas fa-angle-left"></i>');

			$(parametro2).hide();

		}else{

			$(parametro1).find('.item__remplazoModales').addClass("sub__menuElementos");

			$(parametro1).find('.item__remplazoModales').html('<i class="fal fa-angle-down" style="font-weight:bold; white;"></i>');

			$(parametro2).show();

		}

		

	});

}

cerrandoMenus($(".primario__1"),$(".atado__1"));
cerrandoMenus($(".primario__2"),$(".atado__2"));
cerrandoMenus($(".primario__3"),$(".atado__3"));
cerrandoMenus($(".primario__4"),$(".atado__4"));
cerrandoMenus($(".primario__5"),$(".atado__5"));
cerrandoMenus($(".primario__6"),$(".atado__6"));
cerrandoMenus($(".primario__7"),$(".atado__7"));
cerrandoMenus($(".primario__8"),$(".atado__8"));
cerrandoMenus($(".primario__9"),$(".atado__9"));
cerrandoMenus($(".primario__10"),$(".atado__10"));
cerrandoMenus($(".primario__11"),$(".atado__11"));
cerrandoMenus($(".primario__12"),$(".atado__12"));
cerrandoMenus($(".primario__13"),$(".atado__13"));
cerrandoMenus($(".primario__14"),$(".atado__14"));
cerrandoMenus($(".primario__15"),$(".atado__15"));
cerrandoMenus($(".primario__16"),$(".atado__16"));
cerrandoMenus($(".primario__17"),$(".atado__17"));
cerrandoMenus($(".primario__18"),$(".atado__18"));
cerrandoMenus($(".primario__19"),$(".atado__19"));
cerrandoMenus($(".primario__20"),$(".atado__20"));


/*=====  End of Abriendo menús  ======*/


/*=======================================
=            Replicar codigo            =
=======================================*/

var replicarCodigo=function(parametro1,parametro2){

	$(parametro1).keyup(function(e){

		$(parametro2).val($(parametro1).val());

	});

}

replicarCodigo($("#emailOrganismo"),$("#emailCiudadano"));

replicarCodigo($("#emailOrganismo"),$("#correoPresidente"));

replicarCodigo($("#emailOrganismo"),$("#emailRepresentante"));

replicarCodigo($("#celularCiudadano"),$("#telefonoOficinas"));

replicarCodigo($("#direccionOrganismo"),$("#referenciaOrganismo"));

replicarCodigo($("#direccionOrganismo"),$("#barrioOrganismo"));

replicarCodigo($("#cedulaRepresentante"),$("#cedulaCiudadano"));

/*=====  End of Replicar codigo  ======*/

/*===========================================
=            Validación visibles            =
===========================================*/

var replicarCodigo=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		if($("#tiposOrganimosDeportivos").val()==""){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Seleccionar tipo organismo deportivo", "error", 5, function(){});

		}else{

			if($(this).hasClass("vista__tipos")){

				$(this).removeClass('vista__tipos');

				$(this).html('<i class="fas fa-eye icono__ojoTipo"></i>');

				$(parametro2).hide();

	    		
	   		}else{

				$(this).addClass('vista__tipos');

				$(this).html('<i class="fas fa-eye-slash"></i>');

				$(parametro2).show();

	   		}

		}

	});

}

replicarCodigo($(".ver__enlacesTipos"),$(".enlazados__tipoOrganismos"));

/*=====  End of Validación visibles  ======*/


/*==========================================
=            Asignacion selects           =
==========================================*/

var validarSelectsTiposOrganismos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9){

	$(parametro1).change(function(e){

		  $(parametro2).val($('option:selected', this).attr('idAreaAccion'));
		  $(parametro3).text($('option:selected', this).attr('accion'));

		  $(parametro6).val($('option:selected', this).attr('idObjetivos'));
		  $(parametro7).text($('option:selected', this).attr('nombreObjetivo'));

		  $(parametro4).val($('option:selected', this).attr('idLineas'));
		  $(parametro5).text($('option:selected', this).attr('nombreLinea'));

		  $(parametro8).val($('option:selected', this).attr('idAreaEncargada'));
		  $(parametro9).text($('option:selected', this).attr('nombreArea'));

	});

}

validarSelectsTiposOrganismos($("#tiposOrganimosDeportivos"),$("#areaDeAccion"),$(".area__accionRotulo"),$("#lineaPolitica"),$(".linea__politicaRotulo"),$("#objetivoEstategico"),$(".objetivo__estatrategicoRotulo"),$("#areaEncargada"),$(".area__encargadaRotulo"));

/*=====  End of Asignacion selects  ======*/

/*==============================================
=            Recuperar credenciales            =
==============================================*/

var recuperarCredenciales=function(parametro1){

	$(parametro1).click(function(e){

		$("#guardarRegistroPoa").hide();

	    $(".bloques__eliminados").html(' ');

	    $(".documentos__confidenciales").show();

	    $("#tituloModal").text(" ");

	    $("#tituloModal").html("Registrar contraseña");

	    $(".contenedor__documentosConfidenciales").addClass('d d-flex justify-content-center align-items-center');

	});

}

recuperarCredenciales($(".olvido__funciones"));

/*=====  End of Recuperar credenciales  ======*/

/*=============================================
=            Visualizar al cambiar            =
=============================================*/

var visualizarOpcionesCambiar=function(parametro1,parametro2){

	$(parametro1).change(function(e){

		if ($(this).val()==1) {

			$(parametro2).show();

		}else{

			$(parametro2).hide();

		}


	});

}

visualizarOpcionesCambiar($("#tipoAsignacionRecursos"),$("#tablaPoaInicial"));

/*=====  End of Visualizar al cambiar  ======*/


/*=========================================
=            Validacion change            =
=========================================*/

var visualizarOpciones=function(parametro1,parametro2,parametro3){

	$(parametro1).change(function(e){

		if ($(this).val()==parametro3) {

			$(parametro2).show();

		}else{

			$(parametro2).hide();

		}


	});

}

visualizarOpciones($("#tiposOrganimosDeportivos"),$(".registro__vigente__provincial"),57);

/*=====  End of Validacion change  ======*/

/*==============================================
=            Activar modal cargados            =
==============================================*/

var modalCargados=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		e.preventDefault();	

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','observasEstados');

		paqueteDeDatos.append('disgustador',parametro2);

		paqueteDeDatos.append('idOrganismos',parametro3);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				var elementos=JSON.parse(response);

				var informacion__obtenidas=elementos['informacion__obtenidas'];

				var contador=1;

				var bandera3=false;
				var bandera4=false;
				var bandera5=false;
				var bandera6=false;
				var bandera7=false;

				for (x of informacion__obtenidas) {

					if(parametro2=="subFisica"){

						if (contador==1) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La meta anual del indicador coincide  con el No. de eventos planificados  en el PDA</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if (contador==2) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Utiliza la sintaxis clara (verbos en infinitivo) para el registro de los eventos</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}
						
						if (contador==3) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el certificado de validación de eventos, registrados en el PDA suscrito por el director técnico metodológico (solo provinciales)</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==4) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Detalla satisfactoriamente la contratación o  adquisición de bienes o servicios orientados al fomento deportivo de acuerdo a la característica del deporte (implementación deportiva) con la debida justificación técnica</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==5) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">No se han incrementado nuevos puestos de trabajo de técnicos en relación de dependencia con respecto al POA OD 2021</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==6) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Justifica satisfactoriamente la contratación de personal técnico bajo la modalidad de contratos de servicios de honorarios profesionales</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==7) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">En caso que planifique bienes de larga duración presenta el informe justificado de acuerdo a la característica del deporte para implementación deportiva, equipos tecnológicos y electrónicos</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==8) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Planifica seguros contra accidentes, vida y de salud para los deportistas que participarán en los eventos deportivos</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==9) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Detalla las especificaciones de la implementación y equipamiento deportivo que sea adquirido por cada deporte beneficiario y demuestre la no duplicidad en el presente año fiscal</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==10) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y el Acuerdo Ministerial 457</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}


					}

					if(parametro2=="administrativo"){

						if (contador==1) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">etalla satisfactoriamente la contratación o adquisición de bienes o servicios</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if (contador==2) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Justifica satisfactoriamente la contratación o adquisición del bien o servicio</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}
						
						if (contador==3) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El monto total de la actividad 001 correspondientes a los grupos 53 y 57, no excede el valor total aprobado para esta misma actividad y grupo de gasto en el 2021</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==4) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Describe la actividad que justifica el pago de impuestos, tasas y contribuciones</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==5) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==6) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el reporte de inventarios de los vehículos, inmuebles, bienes de larga duración, bienes de control administrativo y existencias descargado de su sistema contable (donde conste toda la información financiera, fecha compra, descripción del bien, depreciación, valor en libros, saldos etc.) debidamente suscrito por el responsable financiero (contador/a) y el representante legal.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==7) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta Plan de mantenimiento de vehículos, bienes muebles e inmuebles, maquinaria y equipo debidamente suscrito por el representante legal.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==8) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta Declaración de Contrataciones y Adquisiciones donde conste el tipo de contratación pública de las actividades descritas en el POA y el trimestre en el que se contratará</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==9) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta Declaración de Contrataciones y Adquisiciones donde conste el tipo de contratación pública de las actividades descritas en el POA y el trimestre en el que se contratará</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==10) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el informe debidamente suscrito por el representante legal, en el que se detalle qué tipo de servicio de limpieza requiere contratar y los metros cuadrados de la infraestructura administrativa anexando documentos de respaldo</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}


					}

					if(parametro2=="talentoHumano"){

						if (contador==1) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La planificación del  indicador tiene coherencia con el nombre del indicador y  se encuentra redactado en número entero.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if (contador==2) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Ejecuta la Planificación anual del personal administrativo y de servicios amparado en el Código de Trabajo.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}
						
						if (contador==3) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Ejecuta la Planificación anual del personal administrativo, relacionado a Contratos Civiles de servicios profesionales.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==4) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El organismo deportivo no ha creado nuevos puestos de trabajo administrativos y de servicios respecto del POA 2021 (Acta de certificación  suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==5) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El organismo deportivo no ha incrementado  Contratos Civiles de servicios profesionales de personal administrativo,  respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==6) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El organismo deportivo no incrementa la masa salarial relacionada al personal administrativo y de servicios respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==7) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El organismo deportivo no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo, respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==8) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==9) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}


					}

					if(parametro2=="zonalE"){

						if (contador==1) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La planificación del indicador tiene coherencia con el nombre del indicador   de la actividad 002 y  se encuentra redactado con número entero.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if (contador==2) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Planifican únicamente gastos de rehabilitación, readecuación y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva<br>Anexo:Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}
						
						if (contador==3) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Dentro de la planificación, destinan recursos para gastos de rehabilitación, readecuación y/o mantenimiento de los escenarios deportivos que son propiedad del Ministerio del Deporte, precautelando su correcto uso y funcionamiento<br>Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad etc.).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==4) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Utiliza los ítems presupuestarios aprobados del anexo 1, para la contratación del bienes y servicios respecto al tipo de intervenciones aprobados para la  rehabilitación, readecuación  y/o mantenimiento.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==5) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Mantiene concordancia el nombre de la intervención para rehabilitación, readecuación y/o mantenimiento con el escenario deportivo a intervenir y, los bienes y servicios involucrados en la intervención.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==6) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el Informe justificativo del gasto para la contratación o  adquisición de bienes o servicios en escenarios deportivo respecto a Rehabilitación y readecuación incluye:<br>- Análisis de precios unitarios<br>-Presupuesto<br>-Planos y anexos gráficos (debidamente suscritos por el profesional en la rama-Registro fotográfico de la intervención a subsanar,<br>-Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==7) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto Mantenimiento incluye:<br>-Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 3 cotizaciones<br>-Registro fotográfico de la intervención a subsanar<br>-Documentación de la legalidad del predio; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

					}


					if(parametro2=="altoRendi"){

						if ($("#actividad3").val()!="" && $("#actividad3").val()!=null && $("#actividad3").val()!=undefined && contador==1) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">REGISTRA EN LA PROGRAMACION DEPORTIVA ANUAL ACTIVIDADES CORRESPONDIENTES A LA ACTIVIDAD 003 GASTOS EN TEMAS DE CAPACITACIÓN DEPORTIVA</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

							bandera3=true;

						}else if(bandera3==false){

							contador=3;

							bandera3=true;

						}


						if ($("#actividad3").val()!="" && $("#actividad3").val()!=null && $("#actividad3").val()!=undefined && contador==2) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">REGISTRA EVENTOS DE CAPACITACIÓN (TALLERES, SEMINARIOS, CONGRESOS, ETC) PARA PARA CIENCIAS APLICADAS DE MANERA PROGRESIVA ORIENTADOS A ATLETAS, FUERZA TÉCNICA, CIENCIAS APLICADAS, DIRECTIVOS Y PERSONAL DE JUZGAMIENTO</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad4").val()!="" && $("#actividad4").val()!=null && $("#actividad4").val()!=undefined && contador==3) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">REGISTRA LOS RECURSOS DESTINADOS PARA SUELDOS Y SALARIOS DE ENTRENADORES, EQUIPO TÉCNICO DE APOYO (MONITOR, INSTRUCTOR), EQUPO TÉCNICO DE CIENCIAS APLICADAS, Y ESTÁ ACORDE AL OBJETO DEL ORGANISMO DEPORTIVO</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

							bandera4=true;

						}else if(bandera4==false){

							contador=7;
							bandera4=true;

						}

		
						if ($("#actividad4").val()!="" && $("#actividad4").val()!=null && $("#actividad4").val()!=undefined && contador==4) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>NO SE HAN CREADO NUEVOS PUESTOS DE TRABAJO DE TÉCNICOS EN RELACIÓN AL POA OD 2021</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}
						

						if ($("#actividad4").val()!="" && $("#actividad4").val()!=null && $("#actividad4").val()!=undefined && contador==5) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">EL ORGANISMO DEPORTIVO NO INCREMENTA EL MONTO TOTAL DE HONORARIOS DEL PERSONAL TÉCNICO RESPECTO DEL POA OD 2021</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}	



						if ($("#actividad4").val()!="" && $("#actividad4").val()!=null && $("#actividad4").val()!=undefined && contador==6) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">LOS RECURSOS DESTINADOS PARA SUELDOS Y SALARIOS DE ENTRENADORES, EQUIPO TÉCNICO DE APOYO (MONITOR, INSTRUCTOR), EQUPO TÉCNICO DE CIENCIAS APLICADAS, ESTÁN ACORDE A LA PRIORIDAD DEPORTIVA DE LA INSITUCIÓN </td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==7) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">REGISTRA EN LAS ACTIVIDADES DEPORTIVAS CORRESPONDIENTES A LA ACTIVIDAD  CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO ACORDE A LA PRIORIDAD DE LA DISCIPLIAN DEPORTIVA</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

							bandera5=true;

						}else if(bandera5==false){

							contador=16;
							bandera5=true;

						}

						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==8) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">PRESENTA EL CERTIFICADO DE VALIDACIÓN DE EVENTOS, SUSCRITO POR EL DIRECTOR TÉCNICO METODOLÓGICO (SOLO PROVINCIALES)</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}


						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==9) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">LA PLANIFICACIÓN DEL INDICADOR COINCIDE CON LOS EVENTOS DEPORTIVOS PLANIFICADOS</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==10) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>UTILIZA LA SINTAXIS CLARA PARA EL REGISTRO DE LOS EVENTOS</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}	


						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==11) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>REGISTRA CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO PARA LA CATEGORÍA MENORES, PREJUVENIL, JUVENIL Y ABSOLUTO A NIVEL INTERNACIONAL</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==12) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>REGISTRA CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO PARA LA CATEGORÍA MENORES, PREJUVENIL, JUVENIL Y ABSOLUTO A NIVEL NACIONAL</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==13) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>UTILIZA RECURSOS PARA CUBRIR GASTOS AUTORIZADOS DE: PASAJES, ALIMENTACIÓN, HOSPEDAJE,  HIDRATACIÓN, MEDICINAS, ATENCIÓN MÉDICA, HONORARIOS DE ÁRBITROS Y JUECES, UNIFORMES, MOVILIZACIÓN INTERNA Y AL EXTERIOR DE LA DELEGACIÓN</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==14) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>UTILIZA RECURSOS PARA CUBRIR PAGOS POR CONCEPTO DE SEGUROS Y BONO DEPORTIVO EN CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO A NIVEL INTERNACIONAL</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}


						if ($("#actividad5").val()!="" && $("#actividad5").val()!=null && $("#actividad5").val()!=undefined && contador==15) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">LA PLANIFICACIÓN OPERATIVA ANUAL DEL ORGANISMO DEPORTIVO SE ENCUENTRA ENMARCADA EN LO ESTABLECIDO EN EL ACUERDO MINISTERIAL 456 Y EL ACUERDO MINISTERIAL 457.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}


						if ($("#actividad6").val()!="" && $("#actividad6").val()!=null && $("#actividad6").val()!=undefined && contador==16) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">REGISTRA EN LA PROGRAMACION DEPORTIVA ANUAL ACTIVIDADES  006 ACTIVIDADES RECREATIVAS</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

							bandera6=true;

						}else if(bandera6==false){

							contador=18;
							bandera6=true;

						}


						if ($("#actividad6").val()!="" && $("#actividad6").val()!=null && $("#actividad6").val()!=undefined && contador==17) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">UTILIZA RECURSOS PARA CUBRIR PAGOS POR CONCEPTO DE: MOVILIZACIÓN, ALIMENTACIÓN, HOSPEDAJE, INSCRIPCIONES, MEDICINAS, ATENCIÓN MÉDICA, HONORARIOS ÁRBITROS Y JUECES, INAUGURACIÓN Y CLAUSURA DEL EVENTO</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if ($("#actividad7").val()!="" && $("#actividad7").val()!=null && $("#actividad7").val()!=undefined && contador==18) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">EN EL CASO QUE PLANIFIQUE  IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO REGISTRA EL DETALLE Y CANTIDADES REQUERIDAS DE CADA  IMPLEMENTO Y EQUIPO DEPORTIVO.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

							bandera7=true;

						}else if(bandera7==false){

							contador=20;
							bandera7=true;

						}

						if ($("#actividad7").val()!="" && $("#actividad7").val()!=null && $("#actividad7").val()!=undefined && contador==19) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">UTILIZA  RECURSOS PARA LA COMPRA DE  IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO ACORDE A LA NORMATIVA TÉCNICA DE LAS DISCIPLINAS DEPORTIVAS</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}


						if (contador==20) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">LA PLANIFICACIÓN OPERATIVA ANUAL DEL ORGANISMO DEPORTIVO SE ENCUENTRA ENMARCADA EN LO ESTABLECIDO EN EL ACUERDO MINISTERIAL 456 Y EL ACUERDO MINISTERIAL 457.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}



					}


					if(parametro2=="zonalFinan"){

						if (contador==1) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el  Informe de justificación del gasto operativo y de mantenimiento en escenarios deportivos que debe contener el cuadro comparativo como estudio de mercado respaldado por 3 cotizaciones, el registro fotográfico, así como la documentación de la legalidad del predio.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');

						}

						if (contador==2) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Mantiene concordancia  la descripción del escenario o infraestructura y demás campos correspondiente a su mantenimiento</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}
						
						if (contador==3) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La descripción de materiales o servicios para el mantenimiento es completa y adecuada para el tipo de mantenimiento</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==4) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Detalla satisfactoriamente la contratación o  adquisición de bienes o servicios</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==5) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Justifica satisfactoriamente la contratación o adquisición del bien o servicio</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==6) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Describe satisfactoriamente los bienes y servicios que se adquirirán de acuerdo a su tipo o característica (contratación pública, pago de impuestos y tasas)</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==7) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">El monto de la contratación o adquisición del bien o servicio es igual o inferior al monto ejecutado el año anterior o el monto establecido en materia de contratación pública.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==8) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el reporte de inventarios de los vehículos, inmuebles, bienes de larga duración, bienes de control administrativo y existencias descargado de su sistema contable (donde conste toda la información financiera, fecha compra, descripción del bien, depreciación, valor en libros, saldos etc.) debidamente suscrito por el responsable financiero (contador/a) y el representante legal.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==9) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta Plan de mantenimiento de vehículos, bienes muebles e inmuebles, maquinaria y equipo debidamente suscrito por el representante legal.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}


						if (contador==10) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta Declaración de Contrataciones y Adquisiciones donde conste el tipo de contratación pública de las actividades descritas en el POA y el trimestre en el que se contratará.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}


						if (contador==11) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">>Presenta Informe de seguridad y riesgos de las instalaciones donde se describa los puntos de seguridad y vigilancia privada necesarios.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==12) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Presenta el informe debidamente suscrito por el representante legal, en el que se detalle qué tipo de servicio de limpieza requiere contratar y los metros cuadrados de la infraestructura administrativa anexando documentos de respaldo.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==13) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La planificación del  indicador tiene coherencia con el nombre del indicador y  se encuentra redactado en número entero.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==14) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Ejecuta la Planificación anual del personal administrativo y de servicios amparado en el Código de Trabajo.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==15) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Ejecuta la Planificación anual del personal administrativo, relacionado a Contratos Civiles de servicios profesionales.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==16) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La Organización Deportiva no ha creado nuevos puestos de trabajo administrativos y de servicios respecto del POA 2021 (Acta de certificación  suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==17) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La Organización Deportiva no ha incrementado  Contratos Civiles de servicios profesionales de personal administrativo,  respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==18) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La Organización Deportiva no incrementa la masa salarial relacionada al personal administrativo y de servicios respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==19) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">La Organización Deportiva no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo, respecto del POA 2021 (Acta de certificación suscrita por el responsable).</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==20) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}

						if (contador==21) {

							$(".body__observacionesContenidas").append('<tr><td align="center">'+contador+'</td><td align="left">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.</td><td>'+x.documento+'</td><td>'+x.observaciones+'</td></tr>');
							
						}


					}



					contador++;
				}

			},
			error:function(){

			}
				
		});				

	});

}

modalCargados($("#fisicaAbrir"),"subFisica",$("#elementoOrganismo").val());
modalCargados($("#altoAbir"),"altoRendi",$("#elementoOrganismo").val());
modalCargados($("#administrativoAbir"),"administrativo",$("#elementoOrganismo").val());
modalCargados($("#talentoHumanoAbir"),"talentoHumano",$("#elementoOrganismo").val());
modalCargados($("#infraestructuraAbir"),"zonalE",$("#elementoOrganismo").val());
modalCargados($("#zonalPuraAbir"),"zonalFinan",$("#elementoOrganismo").val());

/*=====  End of Activar modal cargados  ======*/



/*======================================================
=            Generar código de verificación            =
======================================================*/

var codigoVerificacion=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		e.preventDefault();	


		if ($("#usuarioOrganismos").val()=="") {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Debe ingresar obligatoriamente el usuario", "error", 1, function(){}); 


		}else{


			var confirm= alertify.confirm('','¿Está seguro de generar el código de verificación',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivo

				var paqueteDeDatos = new FormData();

			    var usuarioOrganismos=$("#usuarioOrganismos").val();

			    paqueteDeDatos.append('tipo','codigoVerificacion');

		 		paqueteDeDatos.append('usuarioOrganismos',usuarioOrganismos);

				$.ajax({

				    type:"POST",
				    url:"modelosBd/inserta/inserta.md.php",
				    contentType: false,
				    data:paqueteDeDatos,
				    processData: false,
				    cache: false, 
			    	success:function(response){

		            	var elementos=JSON.parse(response);

		            	var mensaje=elementos['mensaje'];

		            	if (mensaje==2) {

				            alertify.set("notifier","position", "top-center");
				            alertify.notify("Usuario no existe", "error", 5, function(){});


		            	}else if(mensaje==1){

				            alertify.set("notifier","position", "top-center");
				            alertify.notify("Se envió el correo con el código", "success", 5, function(){});

		            	}

					},
					error:function(){

					}
				
				});				


			});

			confirm.set('oncancel', function(){
			 //callbak al pulsar botón negativo
				alertify.set("notifier","position", "top-center");
				alertify.notify("Canceló el envío", "success", 1, function(){}); 

			}); 

		}

	});

}

codigoVerificacion($("#generarCodigoVerficacion"));

/*=====  End of Generar código de verificación  ======*/


/*========================================================
=            Validacion de aparecer elementos           =
========================================================*/

var aparecerElementosDinamicamente=function(parametro1,parametro2,parametro3,parametro4,parametro5){


if($(parametro5).val()!="" && $(parametro5).val()!=null && $(parametro5).val()!=undefined){

	$(parametro2).after('<tr><td colspan="6" style="color:#eceff1; font-weight:bold; font-size:25px!important;"><center>POA APROBADO</td></tr><tr><td colspan="6" style="color:#eceff1; font-weight:bold; font-size:14px!important;"><center><a href="registroTrasnferencia" style="color:#82b1ff; text-transform:uppercase;">Registrar documentación para acceder a la transferencia (Click aquí)</a></td></tr>');

}else if($(parametro4).val()=="A"){

	$(parametro2).after('<tr><td colspan="6" style="color:#eceff1; font-weight:bold; font-size:25px!important;"><center>POA OBSERVADO</td></tr><tr><td colspan="6" style="color:#eceff1; font-weight:bold; font-size:14px!important;"><center><a href="ventanaObservaciones">Ver observaciones</a></td></tr>');

	$(parametro2).after('<tr><td colspan="4"><center>Enviar el poa</td><td colspan="2"><button id="enviarObservacionesRealizadas" class="btn btn-primary"><i class="fas fa-share-square"></i></button></td></tr><tr class="head__anexos"><td colspan="2">Cargar anexo</td><td colspan="3"><input type="file" id="anexo" name="anexo" class="anexos__variantes"></td><td><button class="btn btn-warning" id="agregarAnexos"><i class="fas fa-plus-circle"></i></button></td></tr>');

	$.getScript("layout/scripts/js/validaGlobal.js",function(){

		crearFilasFiles($("#agregarAnexos"),$(".head__anexos"));

		cargarFileSevidor($("#anexo"),'../../documentos/anexosPoa/');

		enviarCorreosIniciales($("#enviarObservacionesRealizadas")," de enviar el poa con las observaciones realizadas","observacionesPoa","formulario__preliminarEnvio");

	});

}else if($(parametro3).val()=="A"){

	$(parametro2).after('<tr><td colspan="6" style="color:#eceff1; font-weight:bold; font-size:25px!important;"><center>POA ENVIADO</td></tr>');


	$(parametro2).after('<tr class="head__anexos"><td colspan="2">Cargar anexo</td><td colspan="3"><input type="file" id="anexo" name="anexo" class="anexos__variantes"></td><td><button class="btn btn-warning" id="agregarAnexos"><i class="fas fa-plus-circle"></i></button></td></tr>');

	$.getScript("layout/scripts/js/validaGlobal.js",function(){

		crearFilasFiles($("#agregarAnexos"),$(".head__anexos"));

		cargarFileSevidor($("#anexo"),'../../documentos/anexosPoa/');

		enviarCorreosIniciales($("#enviarObservacionesRealizadas")," de enviar el poa con las observaciones realizadas","observacionesPoa","formulario__preliminarEnvio");

	});


}else if (parseFloat($(parametro1).val())<=1) {

	$(parametro2).after('<tr><td colspan="4"><center>Enviar el poa</td><td colspan="2"><button id="enviarPreliminar" class="btn btn-primary"><i class="fas fa-share-square"></i></button></td></tr><tr class="head__anexos"><td colspan="2">Cargar anexo</td><td colspan="3"><input type="file" id="anexo" name="anexo" class="anexos__variantes"></td><td><button class="btn btn-warning" id="agregarAnexos"><i class="fas fa-plus-circle"></i></button></td></tr>');

	$.getScript("layout/scripts/js/validaGlobal.js",function(){

		crearFilasFiles($("#agregarAnexos"),$(".head__anexos"));

		cargarFileSevidor($("#anexo"),'../../documentos/anexosPoa/');


	});

}

}

aparecerElementosDinamicamente($("#despejar__montoP"),$(".monto__despejarEnvio"),$("#envioPreliminar"),$("#observacionOr"),$("#estadoFinal"));

/*=====  End of Validacion de aparecer elementos  ======*/


/*======================================
=            Modal estático            =
======================================*/

$('.modal__ItemsGrup').modal({backdrop: 'static', keyboard: false});

/*=====  End of Modal estático  ======*/


});

