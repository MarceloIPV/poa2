$(document).ready(function () {

	$(".main-footer").hide();


	function datatabletsConfiguration(tabla){

	var table=$(tabla).DataTable({

		"language":{
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "Cargando datos",
			"sEmptyTable":     "Cargando datos",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando datos",
			"oPaginate":{
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		dom: 'Bfrtip',
		buttons: [
			'excel'
		],
		"bLengthChange": false,
		"pagingType": "full_numbers",
		"Paginate": true,
		"pagingType": "full_numbers",
		"retrieve": true, 
		"paging":false, 
		"pageLength":false,
		});

		return table;

	}

var agregarDatatablets__enlaces__repor__funcionarios=function(parametro1){

$(parametro1).click(function (e){

	var table = datatabletsConfiguration($(".seguimiento__documentacionGenerada"));

	let idOrganismos=$("#idOrganismoPrincipal").val();

	let paqueteDeDatos = new FormData();
	paqueteDeDatos.append('tipo','selecciona__documentacion__generada');
	paqueteDeDatos.append('idOrganismos',idOrganismos);


	$.ajax({

		type:"POST",
		url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);
			let primerTrimestre=elementos['primerTrimestre'];
			let segundoTrimestre=elementos['segundoTrimestre'];
			let tercerTrimestre=elementos['tercerTrimestre'];
			let cuartoTrimestre=elementos['cuartoTrimestre'];

			// $(".seguimiento__documentacionGenerada").html(" ");

			for(x of primerTrimestre){

				table.row.add([

					x.perioIngreso,
					x.trimestre,
					'<center><form class="col col-12 enviador__seguiiento__refs text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"><input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="primerTrimestre"/><input type="hidden" id="idOrganismo" name="idOrganismo" value="'+$("#idOrganismoPrincipal").val()+'"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__declaracion__seguimientos" /><input type="hidden" id="fechaEnviare" name="fechaEnviare" value="'+x.fecha+'" /><button style="background:#006064; border-radius:.5em; text-color:white; pading:.2em;">Documento</button></form></center>'

				]).draw(false);

			}


			for(x of segundoTrimestre){

				table.row.add([

					x.perioIngreso,
					x.trimestre,
					'<center><form class="col col-12 enviador__seguiiento__refs text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"><input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="segundoTrimestre"/><input type="hidden" id="idOrganismo" name="idOrganismo" value="'+$("#idOrganismoPrincipal").val()+'"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__declaracion__seguimientos" /><input type="hidden" id="fechaEnviare" name="fechaEnviare" value="'+x.fecha+'" /><button style="background:#006064; border-radius:.5em; text-color:white; pading:.2em;">Documento</button></form></center>'

				]).draw(false);

			}


			for(x of tercerTrimestre){

				table.row.add([

					x.perioIngreso,
					x.trimestre,
					'<center><form class="col col-12 enviador__seguiiento__refs text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"><input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="tercerTrimestre"/><input type="hidden" id="idOrganismo" name="idOrganismo" value="'+$("#idOrganismoPrincipal").val()+'"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__declaracion__seguimientos" /><input type="hidden" id="fechaEnviare" name="fechaEnviare" value="'+x.fecha+'" /><button style="background:#006064; border-radius:.5em; text-color:white; pading:.2em;">Documento</button></form></center>'

				]).draw(false);

			}



			for(x of cuartoTrimestre){

				table.row.add([

					x.perioIngreso,
					x.trimestre,
					'<center><form class="col col-12 enviador__seguiiento__refs text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"><input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="cuartoTrimestre"/><input type="hidden" id="idOrganismo" name="idOrganismo" value="'+$("#idOrganismoPrincipal").val()+'"/><input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__declaracion__seguimientos" /><input type="hidden" id="fechaEnviare" name="fechaEnviare" value="'+x.fecha+'" /><button style="background:#006064; border-radius:.5em; text-color:white; pading:.2em;">Documento</button></form></center>'

				]).draw(false);

			}


		},
		error:function(){

		}
					
	});	

});

}

agregarDatatablets__enlaces__repor__funcionarios($("#documentacionGenerada__in")); 



	/*=================================================
	=            Convertir de html a excel            =
	=================================================*/
	
	var excelExportar__seguimientos=function(parametro1,parametro2,parametro3,parametro4){

		$(parametro1).click(function(){

		  var table = document.getElementById(parametro2); // id of table
		  var tableHTML = table.outerHTML;
		  var fileName = parametro4;

		  var msie = window.navigator.userAgent.indexOf("MSIE ");

		  // If Internet Explorer
		  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
		    dummyFrame.document.open('txt/html', 'replace');
		    dummyFrame.document.write(tableHTML);
		    dummyFrame.document.close();
		    dummyFrame.focus();
		    return dummyFrame.document.execCommand('SaveAs', true, fileName);
		  }else {
		    var a = document.createElement('a');
		    tableHTML = tableHTML.replace(/  /g, '').replace(/ /g, '%20'); // replaces spaces
		    a.href = 'data:application/vnd.ms-excel,' + tableHTML;
		    a.setAttribute('download', fileName);
		    document.body.appendChild(a);
		    a.click();
		    document.body.removeChild(a);
		  }


		});

	}

	excelExportar__seguimientos($("#exportar__indicadores"),"indicadores__seguimientos__2",false,"Indicadores");
	excelExportar__seguimientos($("#exportar__sueldos"),"sueldos__salarios__seguimientos__2",false,"Sueldos y salarios");
	excelExportar__seguimientos($("#exportar__administrativas"),"administrativos__seguimientos__2",false,"Administrativos");
	excelExportar__seguimientos($("#exportar__honorarios"),"honorarios__seguimientos__2",false,"Honorarios");
	excelExportar__seguimientos($("#exportar__mantenimiento"),"mantenimientos__seguimientos__2",false,"Mantenimiento");
	excelExportar__seguimientos($("#exportar__mantenimiento__tecnico"),"tecnico__mantenimientos__2",false,"Mantenimiento técnico");
	excelExportar__seguimientos($("#exportar__competencia"),"competencias__seguimientos__2",false,"Competencia");
	excelExportar__seguimientos($("#exportar__competenciaF"),"tecnico__formativos__2",false,"Competencia Formativo");
	excelExportar__seguimientos($("#exportar__altoRer"),"tecnico__formativos__altos__2",false,"Competencia alto rendimiento");
	excelExportar__seguimientos($("#exportar__capacitacion__tecnico"),"tecnico__capacitacion__2",false,"Capacitación técnico");
	excelExportar__seguimientos($("#exportar__capacitacion"),"capacitacion__seguimientos__2",false,"Capacitación");
	excelExportar__seguimientos($("#exportar__recreativo"),"recreativo__seguimientos__2",false,"Recreativo");
	excelExportar__seguimientos($("#exportar__recreativo__tecnicos"),"tecnico__recracion__2",false,"Recreativo técnico");
	excelExportar__seguimientos($("#exportar__implementacion"),"implementacion__seguimientos__2",false,"Implementación");

	/*=====  End of Convertir de html a excel  ======*/
	

	/*============================================
	=            Enviar justificación            =
	============================================*/
	
	var seguimiento__filas__ocultas__controles__justificacion=function(parametro1){

		$(parametro1).click(function(){

			if ($("#justificacion").val()=="" || $("#justificacion").val()==" ") {

	          alertify.set('notifier','position', 'top-center');
	          alertify.notify('Obligatorio ingresar la justificación', 'error', 5, function(){});				

			}else{

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','justificacion__seguimiento');

				let justificacion=$("#justificacion").val();

				let radio__control=$('input:radio[name=radio__control]:checked').val();

				let organismoIdPrin=$("#organismoIdPrin").val();

				paqueteDeDatos.append('justificacion',justificacion);

				paqueteDeDatos.append('radio__control',radio__control);

				paqueteDeDatos.append('organismoIdPrin',organismoIdPrin);

				$.ajax({

				    type:"POST",
				    url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

		});


	}
	seguimiento__filas__ocultas__controles__justificacion($("#enviarSolicitud__Control"));		
	
	/*=====  End of Enviar justificación  ======*/
	

	/*===============================================
	=            Mostrando filas ocultas            =
	===============================================*/
	
	var seguimiento__filas__ocultas__controles=function(parametro1){

		$(parametro1).click(function(){

			$(".oculto__justificacion__control__seguimiento").show();

		});


	}
	seguimiento__filas__ocultas__controles($(".radio__control"));		
	
	/*=====  End of Mostrando filas ocultas  ======*/
	
	/*=======================================
	=             CIERRE AÑO POA            =
	=======================================*/
	var seguimiento__selectoresTotalesEnviados__cerrar=function(parametro1,parametro2,parametro3){

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
		    	var confirm= alertify.prompt('¿Está seguro de cerrar los organismos seleccionados? Ingresar motivo en caso de requerirlo','',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
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
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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
	seguimiento__selectoresTotalesEnviados__cerrar($(".seleccionarTodos__enviar__1__periodos__cierres"),"poa","checkeds__seleccionables");		
	seguimiento__selectoresTotalesEnviados__cerrar($(".seleccionarTodos__enviar__2__periodos__cierres"),"paid","checkeds__seleccionables");

	seguimiento__selectoresTotalesEnviados__cerrar($(".seleccionarTodos__enviar__1__periodos__cierres__2"),"transferencias","checkeds__seleccionables__transferencias");	
	seguimiento__selectoresTotalesEnviados__cerrar($(".seleccionarTodos__enviar__1__periodos__cierres__3"),"modificaciones","checkeds__seleccionables__modificaciones");
	
	
	/*=====  End of  CIERRE AÑO POA  ======*/
	

	/*========================================================
	=            Bloquear elementos seleccionados            =
	========================================================*/
	
	var seguimiento__selectoresTotalesEnviados=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(){

			$(parametro1).hide();

			var array = new Array(); 

		    $(".checkeds__seleccionables").each(function(index) {

		    	if ($(this).attr('attr')==parametro2) {

			    	var condicion = $(this).is(":checked");

			     	if (condicion) {

				    	let idOrganismoVar=$(this).attr('idorganismos');

				        array.push(idOrganismoVar);

				    }

			   } 

		    });

		    if (array.length==0) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Es obligatorio seleccionar por lo menos un organismo a bloquear del "+parametro3, "error", 5, function(){});

				$(parametro1).show();		    	

		    }else{

		    let letrero=$(this).attr('botonClass');

		    if(letrero=="bloquear"){
		    	var confirm= alertify.confirm('','¿Está seguro de bloquear los organismos seleccionados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		    }else{
		    	var confirm= alertify.confirm('','¿Está seguro de desbloquear los organismos seleccionados?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   
		    }

			confirm.set({transition:'slide'});    

			confirm.set('onok', function(){ //callbak al pulsar botón positivo

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','guarda__seguimientos__bloqueos');	

				paqueteDeDatos.append("array",JSON.stringify(array));

				paqueteDeDatos.append('letrero',letrero);	

				paqueteDeDatos.append('identificador',parametro2);	

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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
				$(parametro1).show();	
			}); 

		    }

		});


	}
	seguimiento__selectoresTotalesEnviados($(".seleccionarTodos__enviar__1"),"primerTrimestre","Primer trimestre");	
	seguimiento__selectoresTotalesEnviados($(".seleccionarTodos__enviar__2"),"segundoTrimestre","Segundo trimestre");	
	seguimiento__selectoresTotalesEnviados($(".seleccionarTodos__enviar__3"),"tercerTrimestre","Tercero trimestre");	
	seguimiento__selectoresTotalesEnviados($(".seleccionarTodos__enviar__4"),"cuartoTrimestre","Cuarto trimestre");	
	
	/*=====  End of Bloquear elementos seleccionados  ======*/
	

	/*=========================================
	=            Seleccionar todos            =
	=========================================*/
	
	var seguimiento__selectoresTotales=function(parametro1,parametro2){

		$(parametro1).click(function(){

			$(".checkeds__seleccionables").each(function(index) {

				if ($(this).attr('attr')==parametro2) {

					$(this).attr('checked','checked');

				}
		
			});

		});


	}
	seguimiento__selectoresTotales($("#seleccionarTodos__1"),"primerTrimestre");
	seguimiento__selectoresTotales($("#seleccionarTodos__2"),"segundoTrimestre");
	seguimiento__selectoresTotales($("#seleccionarTodos__3"),"tercerTrimestre");
	seguimiento__selectoresTotales($("#seleccionarTodos__4"),"cuartoTrimestre");
	
	/*=====  End of Seleccionar todos  ======*/
	


	var seguimiento__selectoresTotales__segundazos=function(parametro1,parametro2){

		$(parametro1).click(function(){

			$(".checkeds__seleccionables").each(function(index) {

				$(this).attr('checked','checked');

			});

		});


	}
	seguimiento__selectoresTotales__segundazos($("#seleccionarTodos__1__segundasoz"));
	seguimiento__selectoresTotales__segundazos($("#seleccionarTodos__2__segundasos"));

	var seguimiento__selectoresTotales__segundazos__tercerazos=function(parametro1,parametro2){

		$(parametro1).click(function(){

			$(".checkeds__seleccionables__transferencias").each(function(index) {

				$(this).attr('checked','checked');

			});

		});


	}


	seguimiento__selectoresTotales__segundazos__tercerazos($("#seleccionarTodos__1__segundasoz__2"),$(".checkeds__seleccionables__transferencias"));


	var seguimiento__selectoresTotales__segundazos__cuartos=function(parametro1,parametro2){

		$(parametro1).click(function(){

			$(".checkeds__seleccionables__modificaciones").each(function(index) {

				$(this).attr('checked','checked');

			});

		});


	}

	seguimiento__selectoresTotales__segundazos__cuartos($("#seleccionarTodos__1__segundasoz__3"),$(".checkeds__seleccionables__modificaciones"));

	/*===================================
	=            Datatablets            =
	===================================*/

	$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

		datatablets($("#seguimiento__reportes__anexos__ejecuiones"),"seguimiento__reportes__anexos__ejecuiones",false,false,false,false,false,false,false);

		/*===================================================
		=            Selelctor change visualizar            =
		===================================================*/

		var selectores__lineas=function(parametro1,parametro2,parametro3){

			$(parametro1).change(function(){

				if ($(this).val()==0) {

					$(".tabla__ocultas__anexos__seguimientos").hide();

					$("#seguimiento__reportes__anexos").destroy();

				}else{

					$(".tabla__ocultas__anexos__seguimientos").show();

					$("#seguimiento__reportes__anexos").DataTable().destroy();

					datatablets($("#seguimiento__reportes__anexos"),"seguimiento__reportes__anexos",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val(),$(this).val()],objetos__realizados__dependientes([2,3,4,5,6,7,8,9,10],["boton","texto__separadores__2","boton","texto__separadores__2","boton","texto__separadores__2","boton","texto__separadores__2","texto"],["<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-info pointer__botones' idTrimestres='1' data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",2,"<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-warning pointer__botones' idTrimestres='2'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",3,"<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-info pointer__botones' idTrimestres='3'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",4,"<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-warning pointer__botones' idTrimestres='4'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",5,8],[false],[false],6),1,["funcion__reasignar__seguimientos__recorridos__anexos__reportes"],[false],[false],false);

					

				}

			});


		}
		selectores__lineas($("#selector__anios__se"));


		/*=====  End of Selelctor change visualizar  ======*/

		/*=============================================
		=            Reporteria documentos            =
		=============================================*/

		datatablets($("#documentos__verificasDocumentacion"),"documentos__verificasDocumentacion",false,objetos([7],["formularioAbscritos"],[8,9,10,11,12,13,0,1],[false],[false]),1,[false],false,false,false);
	

		/*=====  End of Reporteria documentos  ======*/
		

		/*=====================================================
		=            Reporteria totales organismos            =
		=====================================================*/
		
		datatablets($("#organismos__totalesVerificas"),"organismos__totalesVerificas",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([6,7,8,9],["enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2"],[6,7,8,9],[6,7,8,9],[false]),false,false,false,false,false);
		
		/*=====  End of Reporteria totales organismos  ======*/
		

		/*==========================================
		=            Control de cambios            =
		==========================================*/
		
		datatablets($("#seguimiento__controles__sujetados"),"seguimiento__controles__sujetados",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([5],["radioSelectes__2"],[5],[false],[false]),1,["funcion__control__de__cambios"],[false],[false],false);	
		
		/*=====  End of Control de cambios  ======*/
		

		/*================================
		=            Bloqueos            =
		================================*/
		
		datatablets($("#seguimiento__bloqueosTablaTrimestres"),"seguimiento__bloqueosTablaTrimestres",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([5,6,7,8,9,10,11,12],["texto__separadores__2","chekeds__2","texto__separadores__2","chekeds__2","texto__separadores__2","chekeds__2","texto__separadores__4","chekeds__2"],[6,5,7,5,8,5,9,5],[false],[false]),1,["funcion__bloqueos__seguimientos"],[false],[false],false);		

		datatablets($("#seguimiento__bloqueosTablaTrimestres__2"),"seguimiento__bloqueosTablaTrimestres__2",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([3,4,5,6,7,8,9,10,11],["texto__separadores__cierre__anio__fiscal","chekeds__2","motivo__adicional","texto__separadores__cierre__anio__fiscal","chekeds__2__1","motivo__adicional","texto__separadores__cierre__anio__fiscal","chekeds__2__2","motivo__adicional"],[6,5,7,5],[false],[false]),1,["funcion__bloqueos__seguimientos__2"],[false],[false],false,false,false,false);	


		datatablets($("#seguimiento__bloqueosTablaTrimestres__2__paid"),"seguimiento__bloqueosTablaTrimestres__2__paid",[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],objetos([3,4,5],["texto__separadores__cierre__anio__fiscal__2","chekeds__2","motivo__adicional__2"],[6,5,7,5],[false],[false]),1,["funcion__bloqueos__seguimientos__2"],[false],[false],false,false,false,false);	
		
		/*=====  End of Bloqueos  ======*/
		


		datatablets($("#seguimiento__recorridos__tablas"),"seguimiento__recorridos__tablas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignar__seguimientos__recorridos__boton estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__recorridos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__recorridos"],[false],[false],false);

		datatablets($("#seguimiento__tablas__remanentes"),"seguimiento__tablas__remanentes",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([5],["boton"],["<center><button class='remantes__asignados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarRemanentes__asignados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__remanentes__asignados"],[false],[false],false);
	
		datatablets($("#seguimiento__tablas"),"seguimiento__tablas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([5,7,8,9],["texto","texto","texto","boton"],[19,17,20,"<center><button class='reasignarTramites__seguimientos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos"],[false],[false],false);

		datatablets($("#seguimiento__tablas__alto__rendimientos"),"seguimiento__tablas__alto__rendimientos",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([5,7],["texto","boton"],[18,"<center><button class='reasignarTramites__seguimientosAltos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__altos"],[false],[false],false);

		datatablets($("#seguimiento__tablas__acFisica__rendimientos"),"seguimiento__tablas__acFisica__rendimientos",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([5,7,8],["texto","texto","boton"],[19,20,"<center><button class='reasignarTramites__seguimientosActividad estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__actividad__fisica'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__actividad__fisica"],[false],[false],false);

		datatablets($("#seguimiento__tablas__alto__rendimientos__recomendados"),"seguimiento__tablas__alto__rendimientos__recomendados",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([2,3],["texto","boton"],[4,"<center><button class='reasignarTramites__seguimientosAltos__recomendados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altosRecomendados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__altos__recomendados"],[false],[false],false);

		datatablets($("#seguimiento__tablas__fisica__rendimientos__recomendados"),"seguimiento__tablas__fisica__rendimientos__recomendados",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([2,3,4],["texto","texto","boton"],[5,6,"<center><button class='reasignarTramites__seguimientosAltos__recomendados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altosRecomendados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__altos__recomendados__formaRe"],[false],[false],false);

		datatablets($("#seguimiento__tablas__seguimientos__recomendados"),"seguimiento__tablas__seguimientos__recomendados",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([2,3,4],["texto","texto","boton"],[5,6,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__SeguimientosRecomendados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe"],[false],[false],false);

		datatablets($("#seguimiento__tablas__acFisica__rendimientos__ins"),"seguimiento__tablas__acFisica__rendimientos__ins",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([5,7],["texto","boton"],[19,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados__insta estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__actividad__fisica__ins'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins"],[false],[false],false);

		datatablets($("#seguimiento__tablas__seguimientos__recomendados__instalaciones"),"seguimiento__tablas__seguimientos__recomendados__instalaciones",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([2,3,4],["texto","texto","boton"],[5,6,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados__instalaciones estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__SeguimientosRecomendados__instaslaciones'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones"],[false],[false],false);


		datatablets($("#seguimiento__tablas__seguimientos__recomendados__instalaciones__reales"),"seguimiento__tablas__seguimientos__recomendados__instalaciones__reales",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([2,3,4],["texto","texto","boton"],[5,6,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados__instalaciones estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__SeguimientosRecomendados__instaslaciones'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones__reales"],[false],[false],false);

	});

	/*=====  End of Datatablets  ======*/

	/*=====================================================================
	=            Enviar al orgnaismo deportivos seguimientos 2            =
	=====================================================================*/
	
		var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24__recomiendas__recomiendas=function(parametro1){

		$(parametro1).click(function(e){


			var pdfVal = $('#informe__recomendado').val();

			if (pdfVal=='') {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el informe firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios__organismos__definitivos');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let nombre__archivo=$("#nombreDocumento").val();
		
		
					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("nombre__archivo",nombre__archivo);

					paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24__recomiendas__recomiendas($("#enviar__orgnaismosDeportivos"));			
	
	/*=====  End of Enviar al orgnaismo deportivos seguimientos 2  ======*/
	
		var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24__recomiendas__directores__i=function(parametro1){

		$(parametro1).click(function(e){


			var pdfVal = $('#informe__recomendado').val();

			if (pdfVal=='' && 4>5) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios__i__nuevos');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let nombre__archivo=$("#nombre__archivo").val();
					let selects__superiores__regresar=$("#selects__superiores__regresar").val();
					let idUsuarioPrincipal=$("#idUsuarioPrincipal").val();

					paqueteDeDatos.append("idUsuarioPrincipal",idUsuarioPrincipal);
		
					paqueteDeDatos.append("selects__superiores__regresar",selects__superiores__regresar);

					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("nombre__archivo",nombre__archivo);


					if ($('#informe__recomendado').val()!=" " && $('#informe__recomendado').val()!="" && $('#informe__recomendado').val()!=undefined && $('#informe__recomendado').val()!=null) {
						paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);
						paqueteDeDatos.append('informe__recomendado__validador', 'si');
					}else{
						paqueteDeDatos.append('informe__recomendado__validador', 'no');
					}


					if ($('#informe__recomendado__instalaciones').val()!=" " && $('#informe__recomendado__instalaciones').val()!="" && $('#informe__recomendado__instalaciones').val()!=undefined && $('#informe__recomendado__instalaciones').val()!=null) {
						paqueteDeDatos.append('informe__recomendado__instalaciones', $('#informe__recomendado__instalaciones')[0].files[0]);
						paqueteDeDatos.append('informe__recomendado__instalaciones__validador', 'si');
					}else{
						paqueteDeDatos.append('informe__recomendado__instalaciones__validador', 'no');
					}
					

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24__recomiendas__directores__i($("#recomienda__coordinai__directores"));		
	

	/*====================================================================
	=            Enviar recomendaciones infras a seguimientos            =
	====================================================================*/
	
		var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24__recomiendas=function(parametro1){

		$(parametro1).click(function(e){


			var pdfVal = $('#informe__recomendado').val();

			if (pdfVal=='') {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let nombre__archivo=$("#nombre__archivo").val();

					let evaluador__movimientos=$("#evaluador__movimientos").val();
		
		
					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("nombre__archivo",nombre__archivo);

					paqueteDeDatos.append("evaluador__movimientos",evaluador__movimientos);

					paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24__recomiendas($("#enviar__orgnaismosDeportivos__infraestructuras"));		
	
	
	/*=====  End of Enviar recomendaciones infras a seguimientos  ======*/
	


	/*=================================================
	=            Devolver infraestructuras            =
	=================================================*/
	
		var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24=function(parametro1){

		$(parametro1).click(function(e){


				var confirm= alertify.confirm('¿Está seguro de regresar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let selects__superiores=$("#selects__superiores").val();
		
		
					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("selects__superiores",selects__superiores);
					paqueteDeDatos.append("periodo",periodo);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real__infra__24($("#devolver__altosReComendados__f__r__s__infraestructuras"));			
	
	/*=====  End of Devolver infraestructuras  ======*/
	

	/*====================================================
	=            Regresar actividades fisicas            =
	====================================================*/
	
		var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real=function(parametro1){

		$(parametro1).click(function(e){


				var confirm= alertify.confirm('¿Está seguro de regresar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let selects__superiores=$("#selects__superiores").val();
		
		
					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("selects__superiores",selects__superiores);
					paqueteDeDatos.append("periodo",periodo);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);
					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__real($("#devolver__altosReComendados__f__r__s"));		
	
	/*=====  End of Regresar actividades fisicas  ======*/
	
	/*================================================
	=            Regrsar infraestructuras            =
	================================================*/
	
	
	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__59__in=function(parametro1){

		$(parametro1).click(function(e){


				var confirm= alertify.confirm('¿Está seguro de regresar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos__infras__59');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let tipos__nomenclaturas=$("#tipos__nomenclaturas").val();
		
		
					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("tipos__nomenclaturas",tipos__nomenclaturas);
					paqueteDeDatos.append("periodo",periodo);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);
					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);


					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos__59__in($("#regresar__areas__tecnicas__seguimientos__infraens__2"));			
	
	/*=====  End of Regrsar infraestructuras  ======*/
	


	/*====================================
	=            Regresar al áreas técnicas            =
	====================================*/
	
	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos=function(parametro1){

		$(parametro1).click(function(e){


				var confirm= alertify.confirm('¿Está seguro de regresar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivo

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__seguimientos__seguimientos');	

					let idOrganismo=$("#organismoOculto__modal").val();
					let periodo=$("#periodo").val();
					let tipos__nomenclaturas=$("#tipos__nomenclaturas").val();
		
		
					paqueteDeDatos.append("idOrganismo",idOrganismo);
					paqueteDeDatos.append("tipos__nomenclaturas",tipos__nomenclaturas);
					paqueteDeDatos.append("periodo",periodo);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);
					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__seguimientos__segumientos($("#regresar__areas__tecnicas__seguimientos"));		
	
	/*=====  End of Regresar al áreas técnicas  ======*/
	

	/*=================================================================
	=            Recomendar recomendados actividad fisicas            =
	=================================================================*/
	
	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__f__r=function(parametro1){

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

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__f__r');	

					let selects__superiores=$(".selects__superiores__regresar").val();
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
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__f__r($("#recomendar__altosRe__recomendados__f__r"));		
	
	/*=====  End of Recomendar recomendados actividad fisicas  ======*/
	

	/*===================================================
	=            Recomendar infraestructuras            =
	===================================================*/
	
	
	var no__corresponde__tramite__infras=function(parametro1){

		$(parametro1).click(function(e){

		var pdfVal = $('#informe__recomendado').val();


			var confirm= alertify.confirm('¿Está seguro de asignar como no corresponde el trámite?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 

			confirm.set('onok', function(){ //callbak al pulsar botón positivo

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__infrases__no__corresponde');	

				let organismoOculto__modal=$("#idOrganismo").val();
				let periodo=$("#periodo").val();
				let idRol=$("#idRolAd").val();
				let idUsuarios=$("#idUsuarioC").val();


				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);
				paqueteDeDatos.append("idRol",idRol);
				paqueteDeDatos.append("idUsuarios",idUsuarios);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);
					
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);

				paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	no__corresponde__tramite__infras($("#no__correspondeA"));


	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__infraest=function(parametro1){

		$(parametro1).click(function(e){

			var pdfVal = $('#informe__recomendado').val();

			if (pdfVal=='') {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Obligatorio cargar el archivo firmado", "error", 5, function(){});

			}else{

				var confirm= alertify.confirm('¿Está seguro de recomendar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

				$(this).hide();

				confirm.set({transition:'slide'}); 


				confirm.set('onok', function(){ //callbak al pulsar botón positivod

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append('tipo','recomienda__recomendado__seguimientos__infrases');	

					let organismoOculto__modal=$("#idOrganismo").val();
					let periodo=$("#periodo").val();
					let idRol=$("#idRolAd").val();
					let idUsuarios=$("#idUsuarioC").val();


					paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
					paqueteDeDatos.append("periodo",periodo);
					paqueteDeDatos.append("idRol",idRol);
					paqueteDeDatos.append("idUsuarios",idUsuarios);

					let observacionesReasignaciones=$("#observacionesReasignaciones").val();
					paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

					
					let fisicamenteE=$("#fisicamenteE").val();
					paqueteDeDatos.append("fisicamenteE",fisicamenteE);

					if ($('#informe__recomendado').val()!=" " && $('#informe__recomendado').val()!="" && $('#informe__recomendado').val()!=undefined && $('#informe__recomendado').val()!=null) {
						paqueteDeDatos.append('informe__recomendado', $('#informe__recomendado')[0].files[0]);
						paqueteDeDatos.append('informe__recomendado__validador', 'si');
					}else{
						paqueteDeDatos.append('informe__recomendado__validador', 'no');
					}


					if ($('#informe__recomendado__instalaciones').val()!=" " && $('#informe__recomendado__instalaciones').val()!="" && $('#informe__recomendado__instalaciones').val()!=undefined && $('#informe__recomendado__instalaciones').val()!=null) {
						paqueteDeDatos.append('informe__recomendado__instalaciones', $('#informe__recomendado__instalaciones')[0].files[0]);
						paqueteDeDatos.append('informe__recomendado__instalaciones__validador', 'si');
					}else{
						paqueteDeDatos.append('informe__recomendado__instalaciones__validador', 'no');
					}
					


					

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados__infraest($("#recomendar__infraes"));		
	
	/*=====  End of Recomendar infraestructuras  ======*/
	

	/*=====================================================
	=            Recomendar recomendados altos            =
	=====================================================*/
	
	var informacion__analistas__reasignar__regresar__alto__recomendar__recomendados=function(parametro1){

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

					let selects__superiores=$(".selects__superiores__regresar").val();
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
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__recomendar__recomendados($("#recomendar__altosRe__recomendados"));	
	
	/*=====  End of Recomendar recomendados altos  ======*/
	

	/*============================================================================
	=            Devolver información recomendada actividades físicas            =
	============================================================================*/
	
	
	var informacion__analistas__reasignar__regresar__alto__regresar__recomendados__act__f__r=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de regresar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','regreso__recomendado__seguimientos__r__f');	

				let selects__superiores=$(".selects__superiores").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();
				let periodo=$("#periodo").val();
				let idRol=$("#idRolAd").val();


				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);
				paqueteDeDatos.append("idRol",idRol);



				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);


				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);



				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__regresar__recomendados__act__f__r($("#devolver__altosReComendados__f__r"));		
	
	/*=====  End of Devolver información recomendada actividades físicas  ======*/
	

	/*==============================================================
	=            Devolver informacion recomendada altos            =
	==============================================================*/
	
	var informacion__analistas__reasignar__regresar__alto__regresar__recomendados=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de regresar la información de seguimiento?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','regreso__recomendado__seguimientos');	

				let selects__superiores=$(".selects__superiores").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();
				let periodo=$("#periodo").val();
				let idRol=$("#idRolAd").val();


				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);
				paqueteDeDatos.append("idRol",idRol);


				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);
				
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto__regresar__recomendados($("#devolver__altosReComendados"));	
	
	/*=====  End of Devolver informacion recomendada altos  ======*/
	
	/*==========================================================
	=            Insertar seguimientos seguimientos            =
	==========================================================*/
	
		var informacion__seguimiento__recomendadas__analistas__segimientos=function(parametro1){

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

						paqueteDeDatos.append('tipo','recomendacion__tecnicos__aanalistas__seguimientos');	

					    var other_data = $('.formulario__intervencion__eliminar').serializeArray();

					    $.each(other_data,function(key,input){
					        paqueteDeDatos.append(input.name,input.value);
					    });

					    paqueteDeDatos.append('archivoSubido__seguimientos', $('#archivoSubido__seguimientos')[0].files[0]);

						let fisicamenteE=$("#fisicamenteE").val();
						paqueteDeDatos.append("fisicamenteE",fisicamenteE);

						$.ajax({

							type:"POST",
							url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

		informacion__seguimiento__recomendadas__analistas__segimientos($("#recomendar__seguimientos"));			
	
	/*=====  End of Insertar seguimientos seguimientos  ======*/
	

		/*========================================================
		=            Insertar seguimiento definitivos            =
		========================================================*/
	
		var informacion__seguimiento__recomendadas=function(parametro1){

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

					    paqueteDeDatos.append('archivoSubido__seguimientos', $('#archivoSubido__seguimientos')[0].files[0]);

						let fisicamenteE=$("#fisicamenteE").val();
						paqueteDeDatos.append("fisicamenteE",fisicamenteE);

						$.ajax({

							type:"POST",
							url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

		informacion__seguimiento__recomendadas($("#recomendarAltos"));			
			
		/*=====  End of Insertar seguimiento definitivos  ======*/
		

		/*===============================================
		=            Colores con porcentajes            =
		===============================================*/

		var porcentajes__colores=function(parametro1,parametro2,parametro3,parametro4){

			$(parametro1).on('input', function (e){

				let porcentaje=0;

				porcentaje=(parseFloat($(parametro2).val())/parseFloat($(parametro1).val())) * 100;

				$(parametro3).val(parseFloat(porcentaje).toFixed(2));


				if (parseFloat(porcentaje).toFixed(2)>=85) {

					$(parametro4).attr('style','border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;');

				}else if (parseFloat(porcentaje).toFixed(2)>=70 && parseFloat(porcentaje).toFixed(2)<85) {

					$(parametro4).attr('style','border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;');

				}else if (parseFloat(porcentaje).toFixed(2)<70) {

					$(parametro4).attr('style','border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;');

				}


			});

		}


		var porcentajes__colores__dos=function(parametro1,parametro2,parametro3,parametro4){

			$(parametro1).on('input', function (e){

				let porcentaje=0;

				porcentaje=(parseFloat($(parametro1).val())/parseFloat($(parametro2).val())) * 100;

				$(parametro3).val(parseFloat(porcentaje).toFixed(2));


				if (parseFloat(porcentaje).toFixed(2)>=85) {

					$(parametro4).attr('style','border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;');

				}else if (parseFloat(porcentaje).toFixed(2)>=70 && parseFloat(porcentaje).toFixed(2)<85) {

					$(parametro4).attr('style','border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;');

				}else if (parseFloat(porcentaje).toFixed(2)<70) {

					$(parametro4).attr('style','border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;');

				}


			});

		}

		porcentajes__colores($("#eventos__eje__alto"),$("#meta__eje__alto"),$("#porcentaje__c__eje__alto"),$(".porcentaje__eventos__e"));
		porcentajes__colores__dos($("#meta__eje__alto"),$("#eventos__eje__alto"),$("#porcentaje__c__eje__alto"),$(".porcentaje__eventos__e"));

		porcentajes__colores($("#eventos__eje__alto__parti"),$("#meta__eje__alto__parti"),$("#porcentaje__c__eje__alto__parti"),$(".porcentaje__eventos__e__parti"));
		porcentajes__colores__dos($("#meta__eje__alto__parti"),$("#eventos__eje__alto__parti"),$("#porcentaje__c__eje__alto__parti"),$(".porcentaje__eventos__e__parti"));


		porcentajes__colores($("#implementacion__de__eje__alto__meta"),$("#implementacion__de__eje__alto__resultado"),$("#porcentaje__c__implementacion__de__e__alto"),$(".porcentaje__implementacion__de__e"));
		porcentajes__colores__dos($("#implementacion__de__eje__alto__resultado"),$("#implementacion__de__eje__alto__meta"),$("#porcentaje__c__implementacion__de__e__alto"),$(".porcentaje__implementacion__de__e"));

		porcentajes__colores($("#beneficiarios__de__eje__alto__meta"),$("#beneficiarios__de__eje__alto__resultado"),$("#porcentaje__c__beneficiarios__de__e__alto"),$(".porcentaje__beneficiarios__de__e"));
		porcentajes__colores__dos($("#beneficiarios__de__eje__alto__resultado"),$("#beneficiarios__de__eje__alto__meta"),$("#porcentaje__c__beneficiarios__de__e__alto"),$(".porcentaje__beneficiarios__de__e"));


		porcentajes__colores($("#preparacion__de__eje__alto__meta"),$("#preparacion__de__eje__alto__resultado"),$("#porcentaje__c__preparacion__de__e__alto"),$(".porcentaje__preparacion__de__e"));
		porcentajes__colores__dos($("#preparacion__de__eje__alto__resultado"),$("#preparacion__de__eje__alto__meta"),$("#porcentaje__c__preparacion__de__e__alto"),$(".porcentaje__preparacion__de__e"));


		porcentajes__colores($("#beneficiarios__capa__de__eje__alto__meta"),$("#beneficiarios__capa__de__eje__alto__resultado"),$("#porcentaje__c__beneficiarios__capa__de__e__alto"),$(".porcentaje__beneficiarios__capa__de__e"));
		porcentajes__colores__dos($("#beneficiarios__capa__de__eje__alto__resultado"),$("#beneficiarios__capa__de__eje__alto__meta"),$("#porcentaje__c__beneficiarios__capa__de__e__alto"),$(".porcentaje__beneficiarios__capa__de__e"));

		porcentajes__colores($("#beneficiarios__even__prepa__de__eje__alto__meta"),$("#beneficiarios__even__prepa__de__eje__alto__resultado"),$("#porcentaje__c__even__prepa__capa__de__e__alto"),$(".porcentaje__beneficiarios__even__prepa__de__e"));
		porcentajes__colores__dos($("#beneficiarios__even__prepa__de__eje__alto__resultado"),$("#beneficiarios__even__prepa__de__eje__alto__meta"),$("#porcentaje__c__even__prepa__capa__de__e__alto"),$(".porcentaje__beneficiarios__even__prepa__de__e"));



		porcentajes__colores($(".eventos__eje__alto"),$(".meta__eje__alto"),$(".porcentaje__c__eje__alto"),$(".porcentaje__eventos__e"));
		porcentajes__colores__dos($(".meta__eje__alto"),$(".eventos__eje__alto"),$(".porcentaje__c__eje__alto"),$(".porcentaje__eventos__e"));

		porcentajes__colores($(".eventos__eje__alto__parti"),$(".meta__eje__alto__parti"),$(".porcentaje__c__eje__alto__parti"),$(".porcentaje__eventos__e__parti"));
		porcentajes__colores__dos($(".meta__eje__alto__parti"),$(".eventos__eje__alto__parti"),$(".porcentaje__c__eje__alto__parti"),$(".porcentaje__eventos__e__parti"));


		porcentajes__colores($(".implementacion__de__eje__alto__meta"),$(".implementacion__de__eje__alto__resultado"),$(".porcentaje__c__implementacion__de__e__alto"),$(".porcentaje__implementacion__de__e"));
		porcentajes__colores__dos($(".implementacion__de__eje__alto__resultado"),$(".implementacion__de__eje__alto__meta"),$(".porcentaje__c__implementacion__de__e__alto"),$(".porcentaje__implementacion__de__e"));

		porcentajes__colores($(".beneficiarios__de__eje__alto__meta"),$(".beneficiarios__de__eje__alto__resultado"),$(".porcentaje__c__beneficiarios__de__e__alto"),$(".porcentaje__beneficiarios__de__e"));
		porcentajes__colores__dos($(".beneficiarios__de__eje__alto__resultado"),$(".beneficiarios__de__eje__alto__meta"),$(".porcentaje__c__beneficiarios__de__e__alto"),$(".porcentaje__beneficiarios__de__e"));


		porcentajes__colores($(".preparacion__de__eje__alto__meta"),$(".preparacion__de__eje__alto__resultado"),$(".porcentaje__c__preparacion__de__e__alto"),$(".porcentaje__preparacion__de__e"));
		porcentajes__colores__dos($(".preparacion__de__eje__alto__resultado"),$(".preparacion__de__eje__alto__meta"),$(".porcentaje__c__preparacion__de__e__alto"),$(".porcentaje__preparacion__de__e"));


		porcentajes__colores($(".beneficiarios__capa__de__eje__alto__meta"),$(".beneficiarios__capa__de__eje__alto__resultado"),$(".porcentaje__c__beneficiarios__capa__de__e__alto"),$(".porcentaje__beneficiarios__capa__de__e"));
		porcentajes__colores__dos($(".beneficiarios__capa__de__eje__alto__resultado"),$(".beneficiarios__capa__de__eje__alto__meta"),$(".porcentaje__c__beneficiarios__capa__de__e__alto"),$(".porcentaje__beneficiarios__capa__de__e"));

		porcentajes__colores($(".beneficiarios__even__prepa__de__eje__alto__meta"),$(".beneficiarios__even__prepa__de__eje__alto__resultado"),$(".porcentaje__c__even__prepa__capa__de__e__alto"),$(".porcentaje__beneficiarios__even__prepa__de__e"));
		porcentajes__colores__dos($(".beneficiarios__even__prepa__de__eje__alto__resultado"),$(".beneficiarios__even__prepa__de__eje__alto__meta"),$(".porcentaje__c__even__prepa__capa__de__e__alto"),$(".porcentaje__beneficiarios__even__prepa__de__e"));



		/*=====  End of Colores con porcentajes  ======*/


	/*=============================================================
	=            Agregar nuevos filares de indicadores           =
	=============================================================*/
	
	let idContador__filares=0;

	var agregar__indicadores__areas__tecnicas=function(parametro1,parametro2){

		$(parametro1).click(function(e){

			$.getScript("layout/scripts/js/validacionBasica.js",function(){
			
				idContador__filares++;

				$(parametro2).append('<tr class="fila__indicadores'+idContador__filares+'"><td><input type="text" id="indicador__'+idContador__filares+'" name="indicador__'+idContador__filares+'" class="ancho__total__input indicador__conjunto"></td><td><input type="text" id="metaProgramada'+idContador__filares+'" name="metaProgramada'+idContador__filares+'" class="ancho__total__input metaProgramada__conjunto solo__numero cambio__de__numero__f" value="0"/></td><td><input type="text" id="metaResultado'+idContador__filares+'" name="metaResultado'+idContador__filares+'" class="ancho__total__input metaResultado__conjunto solo__numero cambio__de__numero__f" value="0"/></td><td><div style="display:flex;"><div class="porcentajesDivs__'+idContador__filares+'"></div><input type="text" id="porcentajeCumplimientos'+idContador__filares+'" name="porcentajeCumplimientos'+idContador__filares+'" class="ancho__total__input procentajesNan__conjunto solo__numero cambio__de__numero__f" value="0" readonly=""/><a class="btn btn-danger" id="eliminarIndicadores'+idContador__filares+'" idContador="'+idContador__filares+'"><i class="fa fa-trash" aria-hidden="true"></i></a></div></td><tr>');

				porcentajes__colores($("#metaResultado"+idContador__filares),$("#metaProgramada"+idContador__filares),$("#porcentajeCumplimientos"+idContador__filares),$(".porcentajesDivs__"+idContador__filares));
				porcentajes__colores__dos($("#metaProgramada"+idContador__filares),$("#metaResultado"+idContador__filares),$("#porcentajeCumplimientos"+idContador__filares),$(".porcentajesDivs__"+idContador__filares));

				$("#indicador__"+idContador__filares).on('input', function () {

					let indicador = new Array();

					$(".indicador__conjunto").each(function(){
					    indicador.push($(this).val());
					});			

					$("#indicadorArray").val(indicador);		

					let metaProgramada = new Array();
					let metaPorcentajes= new Array();

					$(".metaProgramada__conjunto").each(function(){
					    metaProgramada.push($(this).val());
					});			


					$(".procentajesNan__conjunto").each(function(){
					    metaPorcentajes.push($(this).val());
					});			


					$("#metaProgramadaArray").val(metaProgramada);		
					$("#porcentajeCumplimientoArray").val(metaPorcentajes);		


				});

				$("#metaProgramada"+idContador__filares).on('input', function () {

					let metaProgramada = new Array();
					let metaPorcentajes= new Array();

					$(".metaProgramada__conjunto").each(function(){
					    metaProgramada.push($(this).val());
					});			


					$(".procentajesNan__conjunto").each(function(){
					    metaPorcentajes.push($(this).val());
					});			


					$("#metaProgramadaArray").val(metaProgramada);		
					$("#porcentajeCumplimientoArray").val(metaPorcentajes);	

					let indicador = new Array();

					$(".indicador__conjunto").each(function(){
					    indicador.push($(this).val());
					});			

					$("#indicadorArray").val(indicador);		

				});


				$("#metaResultado"+idContador__filares).on('input', function () {

					let metaProgramada = new Array();
					let metaPorcentajes= new Array();

					$(".metaResultado__conjunto").each(function(){
					    metaProgramada.push($(this).val());
					});			


					$(".procentajesNan__conjunto").each(function(){
					    metaPorcentajes.push($(this).val());
					});			


					$("#metaResultadoArray").val(metaProgramada);		
					$("#porcentajeCumplimientoArray").val(metaPorcentajes);	

					let indicador = new Array();

					$(".indicador__conjunto").each(function(){
					    indicador.push($(this).val());
					});			

					$("#indicadorArray").val(indicador);						

				});


				$("#eliminarIndicadores"+idContador__filares).click(function(e){

					let idContador=$(this).attr('idContador');

					$(".fila__indicadores"+idContador).remove();

					$("#indicadorArray").val("");		
					$("#metaProgramadaArray").val("");		
					$("#metaResultadoArray").val("");		
					$("#porcentajeCumplimientoArray").val("");	

				});

			});

		});

	}

	agregar__indicadores__areas__tecnicas($("#agregar__indicadoresOtros"),$(".cuerpo__indicadores__altos"));
	agregar__indicadores__areas__tecnicas($("#agregar__indicadoresOtros__formativos"),$(".cuerpo__indicadores__altos"));		
	
	/*=====  End of Agregar nuevos filares de indicadores  ======*/
	

	
	/*====================================================
	=            Regresar actividades físicas            =
	====================================================*/
	
	var informacion__analistas__reasignar__regresar__alto=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos__ac__fisicas');	

				let selects__superiores__regresar=$(".selects__superiores__regresar").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();
				let periodo=$("#periodo").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores__regresar);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);


				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);


				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto($("#regresarSeguimientos__a__actividad__fisicas"));	
	
	/*=====  End of Regresar actividades físicas  ======*/
	

	/*================================
	=            Ingresfr            =
	================================*/
	
	
	var informacion__analistas__reasignar__altos__infra__in__regresa=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos__ac__fisicas__in');	

				let selects__superiores=$(".selects__superiores__regresar").val();
				let organismoOculto__modal=$("#idOrganismo").val();
				let periodo=$("#periodo").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);




				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__altos__infra__in__regresa($("#regresarSeguimientos__a__actividad__fisicas__in"));


	var informacion__analistas__reasignar__altos__infra__in=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos__ac__fisicas__in');	

				let selects__superiores=$(".selects__superiores").val();
				let organismoOculto__modal=$("#idOrganismo").val();
				let periodo=$("#periodo").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);


				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){


			            var elementos=JSON.parse(response);

			            var mensaje=elementos['mensaje'];

			          	if(mensaje==8){

							alertify.set("notifier","position", "top-center");
							alertify.notify("En caso de enviar a zonal debe enviar unicamente a zonal", "error", 5, function(){});

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

	informacion__analistas__reasignar__altos__infra__in($("#reasignarSeguimientos__a__actividad__fisicas__in"));	
	
	/*=====  End of Ingresfr  ======*/
	

	/*==============================================================
	=            Enviar información actividades físicas            =
	==============================================================*/
	
	var informacion__analistas__reasignar__altos=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos__ac__fisicas');	

				let selects__superiores=$(".selects__superiores").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();
				let periodo=$("#periodo").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);

				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				let idUsuarioC=$("#idUsuarioC").val();
				paqueteDeDatos.append("idUsuarioC",idUsuarioC);				

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__altos($("#reasignarSeguimientos__a__actividad__fisicas"));
			
	
	/*=====  End of Enviar información actividades físicas  ======*/
	

	/*================================================
	=            Regresar analistas altos            =
	================================================*/
	
	var informacion__analistas__reasignar__regresar__alto=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos__altos');	

				let selects__superiores__regresar=$(".selects__superiores__regresar").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();
				let periodo=$("#periodo").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores__regresar);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);


				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);


				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar__alto($("#regresarSeguimientos__a__alto__rendimiento"));
	
	/*=====  End of Regresar analistas altos  ======*/
	

	/*====================================================
	=            Enviar información analistas            =
	====================================================*/
	
	var informacion__analistas__reasignar__altos=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos__altos');	

				let selects__superiores=$(".selects__superiores").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();
				let periodo=$("#periodo").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);
				paqueteDeDatos.append("periodo",periodo);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__altos($("#reasignarSeguimientos__a__alto__rendimiento"));
		
	
	/*=====  End of Enviar información analistas  ======*/
	

	/*=================================================
	=             Regresar documentaciones            =
	=================================================*/
	
	var informacion__analistas__reasignar__regresar=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos');	

				let selects__superiores__regresar=$("#selects__superiores__regresar").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores__regresar);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);
				
				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);

				
				let periodo=$("#periodo").val();
				paqueteDeDatos.append("periodo",periodo);


				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar__regresar($("#regresarSeguimientos__a"));
	
	/*=====  End of  Regresar documentaciones  ======*/
	

	/*========================================
	=  Enviar información de analistas       =
	========================================*/
	
	var informacion__analistas__reasignar=function(parametro1){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo			

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','informacion__analistas__reasignar__seguimientos');	

				let selects__superiores=$("#selects__superiores").val();
				let organismoOculto__modal=$("#organismoOculto__modal").val();

				paqueteDeDatos.append("selects__superiores",selects__superiores);
				paqueteDeDatos.append("organismoOculto__modal",organismoOculto__modal);

				let observacionesReasignaciones=$("#observacionesReasignaciones").val();
				paqueteDeDatos.append("observacionesReasignaciones",observacionesReasignaciones);

				let idUsuarioC=$("#idUsuarioC").val();
				paqueteDeDatos.append("idUsuarioC",idUsuarioC);


				let periodo=$("#periodo").val();
				paqueteDeDatos.append("periodo",periodo);


				let fisicamenteE=$("#fisicamenteE").val();
				paqueteDeDatos.append("fisicamenteE",fisicamenteE);


				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	informacion__analistas__reasignar($("#reasignarSeguimientos__a"));
	
	/*=====  End of Enviar información de analistas  ======*/
	

	/*===========================================
	=            Guardar información            =
	===========================================*/
	
	var guardar__sueldos__separados=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

		$(parametro1).click(function(e){

			var validador= validacionRegistro(parametro2);
			validacionRegistroMostrarErrores(parametro2);

			$(parametro1).hide();	

			if (validador==false) {

				alertify.set("notifier","position", "top-center");
				alertify.notify("Campos obligatorios", "error", 5, function(){});

				$(parametro1).show();			

			}else{

				var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

				confirm.set({transition:'slide'});  

				confirm.set('onok', function(){ 
				

					var paqueteDeDatos = new FormData();

					paqueteDeDatos.append("tipo",parametro7);

					let idOrganismo=$("#organismoIdPrin").val();

					let mesPlan=$("#mesPlanificaciones").val();
					let trimestre=$("#trimestreEvaluador").val();

					paqueteDeDatos.append("rol__de__pagos",$(parametro3)[0].files[0]);
					paqueteDeDatos.append("planilla__iess",$(parametro4)[0].files[0]);
					paqueteDeDatos.append("comprobante__pagos",$(parametro5)[0].files[0]);
					paqueteDeDatos.append("mesPla",mesPlan);
					paqueteDeDatos.append("trimestre",trimestre);
					paqueteDeDatos.append("idOrganismo",idOrganismo);

					$.ajax({

						type:"POST",
						url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

					            $(parametro3).val("");
					            $(parametro4).val("");
					            $(parametro5).val("");
					            $("#mesPlanificaciones").val(0);

					            $(parametro1).show();	

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

	guardar__sueldos__separados($("#guardarMes__sueld"),$(".obligatorios__suel__meses"),$("#rol__pago__iess"),$("#planilla__iess"),$("#comprobante__pago"),$("#mesPlanificaciones").val(),"guardar__mes__organismo__sueldos");
	
	/*=====  End of Guardar información  ======*/
	

	/*===============================================
	=            Cambiar el seguimientos            =
	===============================================*/

	var visualizarOpcionesCambiar=function(parametro1,parametro2,parametro3,parametro4){

		$(parametro1).change(function(e){

			if ($(this).val()==1) {


				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','seguimiento__guardables__seleccionables');	

				let organismoIdPrin=$("#organismoIdPrin").val();
				let trimestreEvaluador=$("#trimestreEvaluador").val();

				paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);
				paqueteDeDatos.append("trimestreEvaluador",trimestreEvaluador);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

					    let elementos=JSON.parse(response);
					    let llamada=elementos['llamada'];

					    $(parametro2).show();

					    if (llamada=="si") {

					    	$(".contenedor__seguimiento__con").show();
					    	$(".contenedor__seguimiento__sin").hide();

					    	$("#finalizarSeguimiento").html('Volver a cargar información&nbsp;&nbsp;<i class="fa fa-reply-all" aria-hidden="true"></i>');

					    	funcion__cargas__dinamicas($(".informacion__fin__registradas"),"selecciona__acciones__seguimiento__final__matriz",organismoIdPrin,trimestreEvaluador);

					    }else{

					    	$(".contenedor__seguimiento__con").hide();
					    	$(".contenedor__seguimiento__sin").show();
					    	$(".contenedor__seguiiento__con").hide();


					    	$("#finalizarSeguimiento").html('Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i>');

					    }

					});

					},
					error:function(){

					}
							
				});						

			}else{

				$(parametro2).hide();

			}


		});

	}

	visualizarOpcionesCambiar($("#tipo__cambiosSeguimientos"),$(".contenidos__formularios__enviados"));

	/*=====  End of Cambiar el seguimientos  ======*/

	/*====================================
	=            Autogestión            =
	====================================*/
	
	var autogestion__matriz=function(parametro1,parametro2,parametro3,parametro4){

		$(parametro3).click(function(e) {

			$(".contenedor__tabla__autogestion").html(" ");

			$(".contenedor__tabla__autogestion").append("<table id='id__tablas__autogestionables'><thead><tr><tr><td colspan='4'><center><a class='btn btn-primary' id='exportar__autogestiones'>Exportar a excel</a></center></td></tr><th colspan='3'>Agregar una nueva autogestión</th><th colspan='1'><a id='agregar__auto' class='btn btn-warning'><i class='fa fa-plus' aria-hidden='true'></i></a></th></tr><tr><th style='font-size:10px; width:15%;'>DETALLE DE AUTOGESTIÓN</th><th style='font-size:10px; width:15%;'>MONTO DE AUTOGESTIÓN</th><th style='font-size:10px; width:15%; display:none!important'>BIEN O SERVICIO OBTENIDO CON AUTOGESTIÓN</th><th style='font-size:10px; width:15%;'>DETALLE DE REINVERSIÓN EN EL DEPORTE, EDUCACIÓN FÍSICA Y/O RECREACIÓN</th><th style='font-size:10px; width:15%;'>Acciones</th></tr></thead><tbody class='cuerpo__matriz__autogestion__edicion'></tbody><tfoot><tr><td colspan='3'><center>Total autogestión</center></td><td colspan='2'><center><input type='text' id='totalTotales__au' class='ancho__total__input' value='0.00' readonly='' style='border:none!important;'></center></td></tr><tr><td colspan='1'><center>Monto poa</center></td><td><center><input type='text' id='montoPoa' class='ancho__total__input' readonly='' style='border:none!important;'></center></td><td><center>% de Autogestión</center></td><td><center><input type='text' id='autogestionPoa__por' class='ancho__total__input' readonly='' style='border:none!important;'></center></td></tr></tfoot></table>");

			$(".contenedor__tabla__autogestion").append("<table id='id__tablas__autogestionables__2' style='display:none!important;'><thead><tr><th style='font-size:10px; width:15%;'>DETALLE DE AUTOGESTION</th><th style='font-size:10px; width:15%;'>MONTO DE AUTOGESTION</th><th style='font-size:10px; width:15%;'>DETALLE DE REINVERSION EN EL DEPORTE, EDUCACION FISICA Y/O RECREACION</th></tr></thead><tbody class='cuerpo__matriz__autogestion__edicion__2'></tbody></table>");
				

			$("#cuerpo__matriz__autogestion").remove();

			$(".cuerpo__matriz__autogestion__edicion").before("<tbody id='cuerpo__matriz__autogestion'></tbody>");

			$(".cuerpo__matriz__autogestion__edicion__2").html(" ");

			let contado3=0;

			let paqueteDeDatos2 = new FormData();
			paqueteDeDatos2.append('tipo','autogestionDeportiva__selects');
			paqueteDeDatos2.append("idOrganismos",parametro2);
			paqueteDeDatos2.append("trimestre",parametro4);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos2,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){


					let elementos=JSON.parse(response);
					let indicadorH=elementos['indicadorH'];	
					let autogestionV=elementos['autogestionV'];
					let inversioDos=elementos['inversioDos'];

					let indicadorInformacion3=elementos['indicadorInformacion3'];

					/*===================================================================
					=            Preguntar cuando se alinea a la autogestión            =
					===================================================================*/


					
					if (indicadorH==true) {

						$("#autogestionSelect").val(autogestionV);

						if (autogestionV=="no") {

							$(".contenedor__tabla__autogestion").attr('style','display:none!important;');

						}else{


							$(".contenedor__tabla__autogestion").removeAttr('style');

						}

					}				
					
					/*=====  End of Preguntar cuando se alinea a la autogestión  ======*/
					

					/*========================================================
					=            Realizar la asignación de montos            =
					========================================================*/
					
					$("#montoPoa").val(parseFloat(inversioDos).toFixed(2));

					monto__porcentajesD($("#totalTotales__au"),$("#montoPoa"),$("#autogestionPoa__por"));

					if (!$("#detalleAutoges__0").length> 0 && indicadorInformacion3=="") {

						$("#cuerpo__matriz__autogestion").append('<tr><td><textarea id="detalleAutoges__0" class="ancho__total__input obligatorios alineados__des__0 sin__bordes__0"></textarea></td><td><input type="text" id="montoAutogestion__0" class="ancho__total__input solo__numeros__montos enlaces__sumas__autogestion obligatorios alineados__des__0 sin__bordes__0" value="0"/></td><td style="display:none!important;"><input type="text" id="bienServicio__0" class="ancho__total__input  alineados__des__0"></td><td><textarea type="text" id="detalleReinver__0" class="ancho__total__input obligatorios alineados__des__0 sin__bordes__0"></textarea></td><td><nav class="btn-pluss-wrapper nav__dist__0 nav__dist__primario"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardar__auto__0" name="guardar__auto__0"  class="guardar__autos" idContador="0"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');	


					}


					funcion__solo__numero__montos($(".solo__numeros__montos"));
					funcion__solo__numero($(".solo__numeros"));

					funcion__cambio__de__numero($("#montoAutogestion__0"));

					funcion__sumador__real__sn($(".enlaces__sumas__autogestion"),$("#totalTotales__au"),$("#montoPoa"),$("#autogestionPoa__por"));

					$("#guardar__auto__0").click(function(e) {

						$("#guardar__auto__0").hide();


						funcion__guardado__matricez($("#guardar__auto__0"),$(".obligatorios"),[parametro2,$("#detalleAutoges__0").val(),$("#montoAutogestion__0").val(),$("#bienServicio__0").val(),$("#detalleReinver__0").val(),parametro4],false,false,false,false,"autogestion__guardados",false,false,$(".nav__dist__primario"),$(".sin__bordes__0"));

						

					}); 
					
					/*=====  End of Realizar la asignación de montos  ======*/
					
					/*==================================
					=            Rellenando            =
					==================================*/

					if (indicadorInformacion3!="" && indicadorInformacion3!=undefined && indicadorInformacion3!=null) {

						for (z of indicadorInformacion3) {

							$(".cuerpo__matriz__autogestion__edicion").append('<tr class="parametro__filas'+z.idMontosAutoGestion+'"><td>'+z.detalleAu+'</td><td>'+new Intl.NumberFormat('de-DE').format(z.montoAu)+'<input type="hidden" value="'+z.montoAu+'" class="enlaces__sumas__autogestion" style="border:none;" readonly=""/></td><td style="display:none!important;">'+z.bienSer+'</td><td>'+z.detalleDos+'</td><td><nav class="btn-pluss-wrapper nav__dist__0"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminar'+z.idMontosAutoGestion+'" name="eliminar'+z.idMontosAutoGestion+'" idPrincipal="'+z.idMontosAutoGestion+'" idContador="'+z.idMontosAutoGestion+'" class="btn btn-red"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

							$(".cuerpo__matriz__autogestion__edicion__2").append('<tr class="parametro__filas'+z.idMontosAutoGestion+'"><td>'+z.detalleAu+'</td><td>'+new Intl.NumberFormat('de-DE').format(z.montoAu)+'</td><td>'+z.detalleDos+'</td></tr>');

							$("#eliminar"+z.idMontosAutoGestion).click(function(event) {

								let idContador=$(this).attr('idContador');

								funcion__eliminar__general(idContador,'eliminar__autogestion');

							});	

							funcion__sumador__real__sn__n($(".enlaces__sumas__autogestion"),$("#totalTotales__au"),$("#montoPoa"),$("#autogestionPoa__por"));



						}	

					}
				
					/*=====  End of Rellenando  ======*/


					
					excelExportar__seguimientos($("#exportar__autogestiones"),"id__tablas__autogestionables__2",false,"Autogestión");	

					/*=================================================
					=            Agregar valores definidos        =
					=================================================*/

					

					$("#agregar__auto").click(function(event) {

						contado3++;	

						$("#cuerpo__matriz__autogestion").append('<tr class="fila__autogestion__filas'+contado3+contado3+'"><td><textarea id="detalleAutoges__'+contado3+'" class="ancho__total__input obligatorios'+contado3+' alineados__des__'+contado3+' sin__bordes__secun__'+contado3+'"></textarea></td><td><input type="text" id="montoAutogestion__'+contado3+'" class="ancho__total__input solo__numeros__montos enlaces__sumas__autogestion obligatorios'+contado3+'s alineados__des__'+contado3+' sin__bordes__secun__'+contado3+'" value="0"/></td><td style="display:none!important;"><input type="text" id="bienServicio__'+contado3+'" class="ancho__total__input  alineados__des__'+contado3+'"></td><td><textarea type="text" id="detalleReinver__'+contado3+'" class="ancho__total__input obligatorios'+contado3+'  alineados__des__'+contado3+' sin__bordes__secun__'+contado3+'"></textarea></td><td><nav class="btn-pluss-wrapper otrosHabilitantes'+contado3+' nav__dist__primario__'+contado3+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardar__u'+contado3+'" name="guardar__u'+contado3+'" idPrincipal="'+contado3+'" idContador="'+contado3+'" class="editar__ides" idContador2="'+contado3+'"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li><li><a style="cursor:pointer;" id="eliminarResul'+contado3+'" name="eliminarResul'+contado3+'" idPrincipal="'+contado3+'" idContador="'+contado3+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');
		

						funcion__solo__numero__montos($(".solo__numeros__montos"));
						funcion__solo__numero($(".solo__numeros"));

						funcion__cambio__de__numero($("#montoAutogestion__"+contado3));

						funcion__sumador__real__sn($(".enlaces__sumas__autogestion"),$("#totalTotales__au"),$("#montoPoa"),$("#autogestionPoa__por"));


						$("#guardar__u"+contado3).click(function(e) {

							let idContador=$(this).attr('idContador');

							$("#guardar__u"+contado3).hide();

							funcion__guardado__matricez($("#guardar__u"+idContador),$(".obligatorios"+idContador),[parametro2,$("#detalleAutoges__"+idContador).val(),$("#montoAutogestion__"+idContador).val(),$("#bienServicio__"+idContador).val(),$("#detalleReinver__"+idContador).val(),parametro4],false,false,false,false,"autogestion__guardados",false,false,$(".nav__dist__primario__"+idContador),$(".sin__bordes__secun__"+idContador));

							

						}); 



						$("#eliminarResul"+contado3).click(function(e) {

							let idContador=$(this).attr('idContador');

							funcion__eliminarFilas($(".fila__autogestion__filas"+idContador+idContador));

						}); 


					}); 
					
					/*=====  End of Agregar valores definidos  ======*/
					

					/*==============================================
					=            Inserción autogesti9ón            =
					==============================================*/

					$("#autogestionSelect").change(function(e) {

						if ($(this).val()==0) {

							alertify.set("notifier","position", "top-center");
							alertify.notify("Es obligatorio escoger una opción", "success", 5, function(){});

							$(".contenedor__tabla__autogestion").attr('style','display:none!important;');

						}else{

							var confirm= alertify.confirm('¿Está seguro de la opción seleccionada?','¿Está seguro de la opción seleccionada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

							confirm.set({transition:'slide'});  

							confirm.set('onok', function(){ //callbak al pulsar botón positivo

								var paqueteDeDatos = new FormData();

								let autogestionSelect=$("#autogestionSelect").val();

								paqueteDeDatos.append('tipo','autogestionDeportiva');
								paqueteDeDatos.append("idOrganismos",parametro2);
								paqueteDeDatos.append("autogestionSelect",autogestionSelect);
								paqueteDeDatos.append("trimestre",parametro4);

								$.ajax({

									type:"POST",
									url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
									contentType: false,
									data:paqueteDeDatos,
									processData: false,
									cache: false, 
									success:function(response){

										let elementos=JSON.parse(response);
										let indicadorH=elementos['indicadorH'];	
										let autogestionV=elementos['autogestionV'];	

										alertify.set("notifier","position", "top-center");
										alertify.notify("Asignación realizada correctamente", "success", 5, function(){});


										if($("#autogestionSelect").val()=="no"){

											$(".contenedor__tabla__autogestion").attr('style','display:none!important;');

										}else{

											$(".contenedor__tabla__autogestion").removeAttr('style');

										}

									},
									error:function(){

									}
											
								});	

							}); 		
							

							confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
								alertify.set("notifier","position", "top-center");
								alertify.notify("Acción cancelada", "error", 1, function(){

									$(".contenedor__tabla__autogestion").html(" ");
									$("#autogestionSelect").val('0');

								}); 
							}); 		

						}

					});						
					
					
					/*=====  End of Inserción autogesti9ón  ======*/

				});	

				},
				error:function(){}
									
			});	

		});			

	}

	autogestion__matriz($(".contenedor__tabla__autogestion"),$("#organismoIdPrin").val(),$("#idAutogestionS"),$("#trimestreEvaluador").val());				
	
	/*=====  End of Autogestión  ======*/
	

	/*======================================
	=            Implementación            =
	======================================*/
	
	var implementacion__checkeds=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__implementacion__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__instalaciones__tecnicos'+z.idPda+'"><td><center>'+z.itemPreesupuestario+'</center></td><td>'+z.nombreItem+'</td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.detalleBien+'</td><td>'+z.justificacionAd+'</td><td>'+z.canitdarBie+'</td><td><center><input type="checkbox" id="checkedsinstalaciones'+z.idPda+'" name="checkedsinstalaciones'+z.idPda+'" class="checkeds__instalaciones"/></center></td></tr>');


	 							checkeds__recorridos__general($(".checkedsinstalaciones"),$("#checkedsinstalaciones"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'implementacion__guardar','implementacion__guardar__facturas','implementacion__guardar__otros',1,425);
							// }


							$(".filaIndicadora__instalaciones__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	implementacion__checkeds($(".body__implementacion__tablas"),$("#organismoIdPrin").val(),$("#idImplementacionS"),$(".contenedor__pestanas__implementacion"),$("#trimestreEvaluador").val());			
		
	
	/*=====  End of Implementación  ======*/
	

	/*==========================================
	=            Recreativo Técnico            =
	==========================================*/
	var recreativo__tecnicos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__recreativas');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__recreativos__tecnicos'+z.idPda+'"><td><center>'+z.nombreDeporte+'</center></td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.paisNombre+'</td><td>'+z.nombreAlcanse+'</td><td>'+z.genero+'</td><td>'+z.categoria+'</td><td>'+z.numeroEntreandores+'</td><td>'+z.numeroAtletas+'</td><td>'+z.total+'</td><td>'+z.mBenefici+'</td><td>'+z.hBenefici+'</td><td><center><input type="checkbox" id="checkeds__recreativo__tecnico'+z.idPda+'" name="checkeds__recreativo__tecnico'+z.idPda+'" class="checkeds__recreativo__tecnico"/></center></td></tr>');


	 							checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__recreativo__tecnico"),$("#checkeds__recreativo__tecnico"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'recreativo__guardar','recreativo__guardar__facturas','recreativo__guardar__otros','otros__recreativo__tecnicos','guardar__recreativo__tecnicos',4);	

							// }


							$(".filaIndicadora__recreativos__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	recreativo__tecnicos($(".body__recreativo__tecnico__tablas"),$("#organismoIdPrin").val(),$("#idRecreativaTecnicoS"),$(".contenedor__pestanas__tecnico__recreativo"),$("#trimestreEvaluador").val());		
	
	
	/*=====  End of Recreativo Técnico  ======*/
	
	/*==================================
	=            Recreativo            =
	==================================*/
	
	var recreativo__checkeds=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__recreacion__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idPda+'"><td><center>'+z.itemPreesupuestario+'</center></td><td>'+z.nombreItem+'</td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.detalleBien+'</td><td>'+z.justificacionAd+'</td><td>'+z.canitdarBie+'</td><td><center><input type="checkbox" id="checkedsrecreativos'+z.idPda+'" name="checkedsrecreativos'+z.idPda+'" class="checkeds__recreativos"/></center></td></tr>');


	 							checkeds__recorridos__general($(".checkeds__recreativos"),$("#checkedsrecreativos"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'recreativo__guardar','recreativo__guardar__facturas','recreativo__guardar__otros',1);
							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	recreativo__checkeds($(".body__recreativo__tablas"),$("#organismoIdPrin").val(),$("#idRecreativaS"),$(".contenedor__pestanas__recreativo"),$("#trimestreEvaluador").val());			
	
	/*=====  End of Recreativo  ======*/
	

	/*========================================
	=            Competencia alto            =
	========================================*/

	var capacitacion__alto=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__tecnico__seguis__altos');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idPda+'"><td><center>'+z.nombreDeporte+'</center></td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.paisNombre+'</td><td>'+z.nombreAlcanse+'</td><td>'+z.genero+'</td><td>'+z.categoria+'</td><td>'+z.numeroEntreandores+'</td><td>'+z.numeroAtletas+'</td><td>'+z.total+'</td><td>'+z.mBenefici+'</td><td>'+z.hBenefici+'</td><td><center><input type="checkbox" id="checkeds__competencia__alto'+z.idPda+'" name="checkeds__competencia__alto'+z.idPda+'" class="checkeds__competencia__alto"/></center></td></tr>');


	 							checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__competencia__alto"),$("#checkeds__competencia__alto"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__alto','guardar__capacitacion__alto',80);	

							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	capacitacion__alto($(".body__competencia__alto__tablas"),$("#organismoIdPrin").val(),$("#idCompetencia__altoRenS"),$(".contenedor__pestanas__competencia__alto"),$("#trimestreEvaluador").val());		

	/*=====  End of Competencia alto  ======*/


	/*=============================================
	=            Competencia formativa            =
	=============================================*/
	
	var capacitacion__formativo=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__tecnico__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idPda+'"><td><center>'+z.nombreEvento+'</center></td><td>'+z.nombreDeporte+'</td><td>'+z.nombreProvincia+'</td><td>'+z.paisNombre+'</td><td>'+z.genero+'</td><td>'+z.categoria+'</td><td>'+z.numeroEntreandores+'</td><td>'+z.numeroAtletas+'</td><td>'+z.total+'</td><td>'+z.mBenefici+'</td><td>'+z.hBenefici+'</td><td><center><input type="checkbox" id="checkeds__competencia__formativas'+z.idPda+'" name="checkeds__competencia__formativas'+z.idPda+'" class="checkeds__competencia__formativas"/></center></td></tr>');


	 							checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__competencia__formativas"),$("#checkeds__competencia__formativas"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__formativos','guardar__capacitacion__formativos',2);	

							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	capacitacion__formativo($(".body__competencia__formativa__tablas"),$("#organismoIdPrin").val(),$("#idCompetencia__FormativaS"),$(".contenedor__pestanas__competencia__formativas"),$("#trimestreEvaluador").val());		
	
	/*=====  End of Competencia formativa  ======*/
	
	/*===================================
	=            Competencia            =
	===================================*/
	
	var actividades__deportivas__competencia=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__competencias__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idPda+'"><td><center>'+z.itemPreesupuestario+'</center></td><td>'+z.nombreItem+'</td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.detalleBien+'</td><td>'+z.justificacionAd+'</td><td>'+z.canitdarBie+'</td><td><center><input type="checkbox" id="checkedsCompetencias'+z.idPda+'" name="checkedsCompetencias'+z.idPda+'" class="checkeds__Competencias"/></center></td></tr>');


	 							checkeds__recorridos__general($(".checkeds__Competencias"),$("#checkedsCompetencias"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'competencias__guardar','competencias__guardar__facturas','competencias__guardar__otros',1);	

							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	actividades__deportivas__competencia($(".body__competencia__tablas"),$("#organismoIdPrin").val(),$("#idCompetenciaS"),$(".contenedor__pestanas__competencia"),$("#trimestreEvaluador").val());				
	
	/*=====  End of Competencia  ======*/
	

	/*=============================================
	=             Capacitación técnica            =
	=============================================*/
	
	var mantenimiento__capacitacion__tecnico=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__tecnico__seguis__capacitacion');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idPda+'"><td><center>'+z.nombreEvento+'</center></td><td>'+z.nombreDeporte+'</td><td>'+z.nombreProvincia+'</td><td>'+z.paisNombre+'</td><td>'+z.genero+'</td><td>'+z.categoria+'</td><td>'+z.numeroEntreandores+'</td><td>'+z.numeroAtletas+'</td><td>'+z.total+'</td><td>'+z.mBenefici+'</td><td>'+z.hBenefici+'</td><td><center><input type="checkbox" id="checkeds__cpacitacion__tecnicas'+z.idPda+'" name="checkeds__cpacitacion__tecnicas'+z.idPda+'" class="checkeds__cpacitaciones__tecnicas"/></center></td></tr>');


	 							checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__cpacitaciones__tecnicas"),$("#checkeds__cpacitacion__tecnicas"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros','otros__capacitacion__tecnicos','guardar__capacitacion__tecnicos',1);	

							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	mantenimiento__capacitacion__tecnico($(".body__capacitacion__tecnica__tablas"),$("#organismoIdPrin").val(),$("#idCapacitacionTecnicoS"),$(".contenedor__pestanas__capacitacion__tecnicos__tecnicos"),$("#trimestreEvaluador").val());			
	
	/*=====  End of  Capacitación técnica  ======*/
	

	/*====================================
	=            Capacitación            =
	====================================*/
	
	var mantenimiento__capacitacion=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idPda+'"><td><center>'+z.itemPreesupuestario+'</center></td><td>'+z.nombreItem+'</td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.detalleBien+'</td><td>'+z.justificacionAd+'</td><td>'+z.canitdarBie+'</td><td><center><input type="checkbox" id="checkeds__cpacitacion'+z.idPda+'" name="checkeds__cpacitacion'+z.idPda+'" class="checkeds__cpacitaciones"/></center></td></tr>');


	 							checkeds__recorridos__general($(".checkeds__cpacitaciones"),$("#checkeds__cpacitacion"+z.idPda),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idPda,$(parametro1),$(parametro4),[z.idPda,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'capacitacion__guardar','capacitacion__guardar__facturas','capacitacion__guardar__otros',1,158);	

							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idPda).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	mantenimiento__capacitacion($(".body__capacitacion__tablas"),$("#organismoIdPrin").val(),$("#idCapacitacionS"),$(".contenedor__pestanas__capacitacion__tecnicos"),$("#trimestreEvaluador").val());			
	
	/*=====  End of Capacitación  ======*/
	

	/*===========================================================
	=            Actividades mantenimientos tecnicos            =
	===========================================================*/

	var mantenimiento__seguimientos__tecnicos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','mantenimiento__seguis__tecnicos');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}

							// if (z.mes!=parametro5) {


								$(parametro1).append('<tr class="filaIndicadora__mantenimiento__tecnicos'+z.idMantenimiento+'"><td><center>'+z.nombreInfras+'</center></td><td>'+z.provincia+'</td><td>'+z.direccionCompleta+'</td><td>'+z.estado+'</td><td>'+z.tipoRecursos+'</td><td>'+z.tipoIntervencion+'</td><td>'+z.detallarTipoIn+'</td><td>'+z.tipoMantenimiento+'</td><td>'+z.materialesServicios+'</td><td>'+z.fechaUltimo+'</td><td><center><input type="checkbox" id="checked__tecnicos'+z.idMantenimiento+'" name="checked__tecnicos'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento__checked"/></center></td></tr>');


	 							checkeds__recorridos__general__tecnicos__matenimientos($(".checkeds__dinamicos__mantenimiento__checked"),$("#checked__tecnicos"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados,z.fechaInicio,z.fechaFin],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros','otros__mantenimientos__tecnicos','filaIndicadora__administra',105);	

							// }


							$(".filaIndicadora__mantenimiento__tecnicos"+z.idMantenimiento).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	mantenimiento__seguimientos__tecnicos($(".body__mantenimiento__tecnicos__tablas"),$("#organismoIdPrin").val(),$("#idMantenimientoTecnicoS"),$(".contenedor__pestanas__mantenimientos__tecnicos"),$("#trimestreEvaluador").val());		
	
	
	/*=====  End of Actividades mantenimientos tecnicos  ======*/
	

	/*=================================================
	=            Actividades mantenimiento            =
	=================================================*/
	
	var mantenimiento__seguimientos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','mantenimiento__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}


							// if (z.mes!=equiparable) {

								$(parametro1).append('<tr class="filaIndicadora__mantenimiento'+z.idMantenimiento+'"><td><center>'+z.itemPreesupuestario+'</center></td><td>'+z.nombreItem+'</td><td>'+z.nombreInfras+'</td><td>'+z.tipoIntervencion+'</td><td>'+z.detallarTipoIn+'</td><td>'+z.tipoMantenimiento+'</td><td>'+z.materialesServicios+'</td><td><center><input type="checkbox" id="checked'+z.idMantenimiento+'" name="checked'+z.idMantenimiento+'" class="checkeds__dinamicos__mantenimiento"/></center></td></tr>');


	 							checkeds__recorridos__general($(".checkeds__dinamicos__mantenimiento"),$("#checked"+z.idMantenimiento),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idMantenimiento,$(parametro1),$(parametro4),[z.idMantenimiento,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'mantenimiento__guardar','mantenimiento__guardar__facturas','mantenimiento__guardar__otros',false,125);	

							// }

							$(".filaIndicadora__mantenimiento"+z.idMantenimiento).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	mantenimiento__seguimientos($(".body__mantenimiento__tablas"),$("#organismoIdPrin").val(),$("#idMantenimientoS"),$(".contenedor__pestanas__mantenimientos"),$("#trimestreEvaluador").val());			
	
	/*=====  End of Actividades mantenimiento  ======*/
	

	/*===================================================
	=            Actividades administrativas            =
	===================================================*/
	
	var administrativas__seguimientos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','administrativos__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}


							// if (z.mes!=equiparable) {

								$(parametro1).append('<tr class="filaIndicadora__administra'+z.idActividadAd+'"><td><center>'+z.itemPreesupuestario+'</center></td><td>'+z.nombreItem+'</td><td>'+z.justificacionActividad+'</td><td>'+z.cantidadBien+'</td><td><center><input type="checkbox" id="checked'+z.idActividadAd+'" name="checked'+z.idActividadAd+'" class="checkeds__dinamicos__administrativos"/></center></td></tr>');

								checkeds__recorridos__general($(".checkeds__dinamicos__administrativos"),$("#checked"+z.idActividadAd),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idActividadAd,$(parametro1),$(parametro4),[z.idActividadAd,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'administrativos__seguimientos','facturas__administrativas','otros__administrativas');	

							// }

							$(".filaIndicadora__administra"+z.idActividadAd).show();

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	administrativas__seguimientos($(".body__adminsitrativas__tablas"),$("#organismoIdPrin").val(),$("#idAdministrativoS"),$(".contenedor__pestanas__administrativas"),$("#trimestreEvaluador").val());			
	
	/*=====  End of Actividades administrativas  ======*/
	

	/*==================================
	=            Honorarios            =
	==================================*/
		
	var honorarios__seguimientos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','honorarios__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						let contador=0;

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;
							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;
								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;
								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;
								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;
								equiparable="Diciembre";

							}


							// if (z.mes!=equiparable) {

								contador++;

								$(parametro1).append('<tr class="filaIndicadoraHonorarios'+z.idHonorarios+'"><td><center>'+contador+'</center></td><td>'+z.nombres+'</td><td>'+z.cedula+'</td><td>'+z.cargo+'</td><td>'+z.honorarioMensual+'</td><td>'+z.tipoCargo+'</td><td><center><input type="checkbox" id="checkedHonorarios'+z.idHonorarios+'" name="checkedHonorarios'+z.idHonorarios+'" class="checkeds__dinamicos__honorarios"/></center></td></tr>');


	 							checkeds__recorridos__general($(".checkeds__dinamicos__honorarios"),$("#checkedHonorarios"+z.idHonorarios),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idHonorarios,$(parametro1),$(parametro4),[z.idHonorarios,z.totalTotales,valor1,valor2,valor3,z.totalTotales,z.esigef,z.totalCompletados],'honorarios__guardar','honorarios__guardar__facturas','honorarios__guardar__otros',false,126);	

							// }

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	honorarios__seguimientos($(".body__honorarios__tablas"),$("#organismoIdPrin").val(),$("#idHonorariosS"),$(".contenedor__pestanas__honorarios"),$("#trimestreEvaluador").val());			
		
	/*=====  End of Honorarios  ======*/


	/*===========================================
	=             Sueldos y salarios            =
	===========================================*/
	
	var sueldos__salarios__seguimientos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','sueldos__salarios__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);

			if (parametro5=="primerTrimestre") {
				paqueteDeDatos.append('mes','marzo');
			}else if (parametro5=="segundoTrimestre") {
				paqueteDeDatos.append('mes','junio');
			}else if (parametro5=="tercerTrimestre") {
				paqueteDeDatos.append('mes','septiembre');
			}else if (parametro5=="cuartoTrimestre") {
				paqueteDeDatos.append('mes','diciembre');
			}


			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						let contador=0;

						for (z of indicadorInformacion) {

							let valor1=0;
							let valor2=0;
							let valor3=0;


							let valor1__desahucio=0;
							let valor2__desahucio=0;
							let valor3__desahucio=0;

							let valor1__despido=0;
							let valor2__despido=0;
							let valor3__despido=0;

							let valor1__renuncia=0;
							let valor2__renuncia=0;
							let valor3__renuncia=0;

							let valor1__compensacion=0;
							let valor2__compensacion=0;
							let valor3__compensacion=0;

							let equiparable=" ";

							if (parametro5=="primerTrimestre") {

								valor1=z.enero;
								valor2=z.febrero;
								valor3=z.marzo;

								if (z.eneroDesahucio==null) {

									valor1__desahucio=0;
									valor2__desahucio=0;
									valor3__desahucio=0;	

								}else{

									valor1__desahucio=z.eneroDesahucio;
									valor2__desahucio=z.febreroDesahucio;
									valor3__desahucio=z.marzoDesahucio;	

								}

								if (z.eneroDespido==null) {

									valor1__despido=0;
									valor2__despido=0;
									valor3__despido=0;	

								}else{

									valor1__despido=z.eneroDespido;
									valor2__despido=z.febreroDespido;
									valor3__despido=z.marzoDespido;	

								}



								if (z.eneroRenuncia==null) {

									valor1__renuncia=0;
									valor2__renuncia=0;
									valor3__renuncia=0;	

								}else{

									valor1__renuncia=z.eneroRenuncia;
									valor2__renuncia=z.febreroRenuncia;
									valor3__renuncia=z.marzoRenuncia;	

								}


								if (z.eneroCompensacion==null) {

									valor1__compensacion=0;
									valor2__compensacion=0;
									valor3__compensacion=0;	

								}else{

									valor1__compensacion=z.eneroCompensacion;
									valor2__compensacion=z.febreroCompensacion;
									valor3__compensacion=z.marzoCompensacion;	

								}


								equiparable="Marzo";

							}else if (parametro5=="segundoTrimestre") {

								valor1=z.abril;
								valor2=z.mayo;
								valor3=z.junio;


								if (z.eneroDesahucio==null) {

									valor1__desahucio=0;
									valor2__desahucio=0;
									valor3__desahucio=0;	

								}else{

									valor1__desahucio=z.abrilDesahucio;
									valor2__desahucio=z.mayoDesahucio;
									valor3__desahucio=z.junioDesahucio;	

								}

								if (z.eneroDespido==null) {

									valor1__despido=0;
									valor2__despido=0;
									valor3__despido=0;	

								}else{

									valor1__despido=z.abrilDespido;
									valor2__despido=z.mayoDespido;
									valor3__despido=z.junioDespido;		

								}



								if (z.eneroRenuncia==null) {

									valor1__renuncia=0;
									valor2__renuncia=0;
									valor3__renuncia=0;	

								}else{

		
									valor1__renuncia=z.abrilRenuncia;
									valor2__renuncia=z.mayoRenuncia;
									valor3__renuncia=z.junioRenuncia;	

								}


								if (z.eneroCompensacion==null) {

									valor1__compensacion=0;
									valor2__compensacion=0;
									valor3__compensacion=0;	

								}else{

			
									valor1__compensacion=z.abrilCompensacion;
									valor2__compensacion=z.mayoCompensacion;
									valor3__compensacion=z.junioCompensacion;	

								}



								equiparable="Junio";

							}else if (parametro5=="tercerTrimestre") {

								valor1=z.julio;
								valor2=z.agosto;
								valor3=z.septiembre;


								if (z.eneroDesahucio==null) {

									valor1__desahucio=0;
									valor2__desahucio=0;
									valor3__desahucio=0;	

								}else{

									valor1__desahucio=z.julioDesahucio;
									valor2__desahucio=z.agostoDesahucio;
									valor3__desahucio=z.septiembreDesahucio;

								}

								if (z.eneroDespido==null) {

									valor1__despido=0;
									valor2__despido=0;
									valor3__despido=0;	

								}else{

									valor1__despido=z.julioDespido;
									valor2__despido=z.agostoDespido;
									valor3__despido=z.septiembreDespido;

								}



								if (z.eneroRenuncia==null) {

									valor1__renuncia=0;
									valor2__renuncia=0;
									valor3__renuncia=0;	

								}else{

									
									valor1__renuncia=z.julioRenuncia;
									valor2__renuncia=z.agostoRenuncia;
									valor3__renuncia=z.septiembreRenuncia;		


								}


								if (z.eneroCompensacion==null) {

									valor1__compensacion=0;
									valor2__compensacion=0;
									valor3__compensacion=0;	

								}else{

			
									valor1__compensacion=z.julioCompensacion;
									valor2__compensacion=z.agostoCompensacion;
									valor3__compensacion=z.septiembreCompensacion;	


								}
														


								equiparable="Septiembre";

							}else if (parametro5=="cuartoTrimestre") {

								valor1=z.octubre;
								valor2=z.noviembre;
								valor3=z.diciembre;

	
								if (z.eneroDesahucio==null) {

									valor1__desahucio=0;
									valor2__desahucio=0;
									valor3__desahucio=0;	

								}else{

									valor1__desahucio=z.octubreDesahucio;
									valor2__desahucio=z.noviembreDesahucio;
									valor3__desahucio=z.diciembreDesahucio;	

								}

								if (z.eneroDespido==null) {

									valor1__despido=0;
									valor2__despido=0;
									valor3__despido=0;	

								}else{

									valor1__despido=z.octubreDespido;
									valor2__despido=z.noviembreDespido;
									valor3__despido=z.diciembreDespido;		

								}



								if (z.eneroRenuncia==null) {

									valor1__renuncia=0;
									valor2__renuncia=0;
									valor3__renuncia=0;	

								}else{

									
									valor1__renuncia=z.octubreRenuncia;
									valor2__renuncia=z.noviembreRenuncia;
									valor3__renuncia=z.diciembreRenuncia;		


								}


								if (z.eneroCompensacion==null) {

									valor1__compensacion=0;
									valor2__compensacion=0;
									valor3__compensacion=0;	

								}else{

			
									valor1__compensacion=z.octubreCompensacion;
									valor2__compensacion=z.noviembreCompensacion;
									valor3__compensacion=z.diciembreCompensacion;	


								}



								equiparable="Diciembre";

							}


							// if (z.mes!=equiparable) {

								contador++;

								$(parametro1).append('<tr class="filaIndicadora'+z.idSueldos+'"><td><center>'+contador+'</center></td><td>'+z.nombres+'</td><td>'+z.cedula+'</td><td>'+z.cargo+'</td><td>'+z.tipoCargo+'</td><td>'+z.tiempoTrabajo+'</td><td><center><input type="checkbox" id="checked'+z.idSueldos+'" name="checked'+z.idSueldos+'" class="checkeds__dinamicos__sueldos__salarios"/></center></td></tr>');


	 							checkeds__recorridos__sueldos__salarios($(".checkeds__dinamicos__sueldos__salarios"),$("#checked"+z.idSueldos),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idSueldos,$(parametro1),$(parametro4),[z.idSueldos,z.sueldoSalario,z.aportePatronal,z.decimoTercera,z.decimoCuarta,z.fondosReserva,valor1,valor2,valor3,z.total,valor1__desahucio,valor2__desahucio,valor3__desahucio,valor1__despido,valor2__despido,valor3__despido,valor1__renuncia,valor2__renuncia,valor3__renuncia,valor1__compensacion,valor2__compensacion,valor3__compensacion]);	

							// }
						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	sueldos__salarios__seguimientos($(".body__sueldos__salarios__tablas"),$("#organismoIdPrin").val(),$("#idSueldosS"),$(".contenedor__pestanas"),$("#trimestreEvaluador").val());	
	
	/*=====  End of  Sueldos y salarios  ======*/
	

	/*===================================
	=            Indicadores           =
	===================================*/
	
	var indicadores__funcionales=function(parametro1,parametro2,parametro3){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');
			$(".oculto__trimestrales").hide();

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','indicadores__funcionales__seguimientos');
			paqueteDeDatos.append('idOrganismos',parametro2);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						for (z of indicadorInformacion) {

							let trimestresV="";

							if($("#trimestreEvaluador").val()=="primerTrimestre"){
								trimestresV=z.primertrimestre;
							}else if($("#trimestreEvaluador").val()=="segundoTrimestre"){
								trimestresV=z.segundotrimestre;
							}else if($("#trimestreEvaluador").val()=="tercerTrimestre"){
								trimestresV=z.tercertrimestre;
							}else if($("#trimestreEvaluador").val()=="cuartoTrimestre"){
								trimestresV=z.cuartotrimestre;
							}

							// if (parseFloat(trimestresV)>0) {

								$(parametro1).append('<tr class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.idActividades+'</center></td><td>'+z.nombreActividades+'</td><td>'+z.indicador+'</td><td><center><input type="checkbox" id="idActi'+z.idActividades+'" name="idActi'+z.idActividades+'" class="checkeds__dinamicos__indicadores"/></center></td></tr>');

								checkeds__recorridos($(".checkeds__dinamicos__indicadores"),$("#idActi"+z.idActividades),$("#contadorIndicador"),$(".oculto__trimestrales"),$(".contenedor__trimestres"),[z.idActividades,z.nombreActividades,z.indicador,trimestresV,z.metaindicador],parametro2,$("#trimestreEvaluador").val());

							// }
 					

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	indicadores__funcionales($(".body__indicadores__tablas"),$("#organismoIdPrin").val(),$("#idIndicadores"));
	
	/*=====  End of Indicadores  ======*/

	/*=========================================
	=            Tablas ejecutadas            =
	=========================================*/
	
	var indicadores__funcionales=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro1).click(function(e) {

			$(parametro2).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro5);
			paqueteDeDatos.append('idOrganismos',parametro3);
			paqueteDeDatos.append('trimestres',parametro4);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_2022/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						$(".fila__corresponsal").remove()

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];

						if (parametro5=="sueldos__seguimientos__tablas") {

							$(".cuerpo__sueldos__slaraios__seguimientos__2").html(" ");

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__corresponsal fila__'+z.idSueldosSeguimeintos+'"><td><center>'+z.mes+'</center></td><td><center>'+z.cedula+'</center></td><td><center>'+z.tipoCargo+'</center></td><td><center>'+z.nombres+'</center></td><td><input type="text" id="sueldoProgramado'+z.idSueldosSeguimeintos+'" name="sueldoProgramado'+z.idSueldosSeguimeintos+'" value="'+z.sueldoSalarioPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__sueldo'+z.idSueldosSeguimeintos+'"><input type="text" id="sueldoEjecutado'+z.idSueldosSeguimeintos+'" name="sueldoEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.sueldoSalarioEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__sueldos'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="aporteProgramado'+z.idSueldosSeguimeintos+'" name="aporteProgramado'+z.idSueldosSeguimeintos+'" value="'+z.aporteIessPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__aporte'+z.idSueldosSeguimeintos+'"><input type="text" id="aporteEjecutado'+z.idSueldosSeguimeintos+'" name="aporteEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.aporteIessEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__aporte'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="decimoTercerProgramado'+z.idSueldosSeguimeintos+'" name="decimoTercerProgramado'+z.idSueldosSeguimeintos+'" value="'+z.decimoTerceroPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__decimoTercer'+z.idSueldosSeguimeintos+'"><input type="text" id="decimoTercerEjecutado'+z.idSueldosSeguimeintos+'" name="decimoTercerEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.decimoTerceroEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__decimoTercer'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="decimoCuartoProgramado'+z.idSueldosSeguimeintos+'" name="decimoCuartoProgramado'+z.idSueldosSeguimeintos+'" value="'+z.decimoCuartoPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__decimoCuarto'+z.idSueldosSeguimeintos+'"><input type="text" id="decimoCuartoEjecutado'+z.idSueldosSeguimeintos+'" name="decimoCuartoEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.decimoCuartoEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__decimoCuarto'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="fondosReservaProgramado'+z.idSueldosSeguimeintos+'" name="fondosReservaProgramado'+z.idSueldosSeguimeintos+'" value="'+z.fondosReservasPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__fondo'+z.idSueldosSeguimeintos+'"><input type="text" id="fondosReservaEjecutado'+z.idSueldosSeguimeintos+'" name="fondosReservaEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.fondosReservasEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__fondosReservas'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="editarInfor'+z.idSueldosSeguimeintos+'" name="editarInfor'+z.idSueldosSeguimeintos+'" idPrincipal="'+z.idSueldosSeguimeintos+'" idContador="'+z.idSueldosSeguimeintos+'" class="editar__ides"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><li><a style="cursor:pointer;" id="eliminarInfor'+z.idSueldosSeguimeintos+'" name="eliminarInfor'+z.idSueldosSeguimeintos+'" idPrincipal="'+z.idSueldosSeguimeintos+'" idContador="'+z.idSueldosSeguimeintos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__sueldos__slaraios__seguimientos__2").append('<tr><td><center>'+z.mes+'</center></td><td><center>'+z.cedula+'</center></td><td><center>'+z.tipoCargo+'</center></td><td><center>'+z.nombres+'</center></td><td>'+z.sueldoSalarioPlanificado+'</td><td>'+z.sueldoSalarioEjecutado+'</td><td>'+z.aporteIessPlanificado+'</td><td>'+z.aporteIessEjecutado+'</td><td>'+z.decimoTerceroPlanificado+'</td><td>'+z.decimoTerceroEjecutado+'</td><td>'+z.decimoCuartoPlanificado+'</td><td>'+z.decimoCuartoEjecutado+'</td><td>'+z.fondosReservasPlanificado+'</td><td>'+z.fondosReservasEjecutado+'</td></tr>');

									funcion__cambio__de__numero($("#sueldoEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#aporteEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#decimoTercerEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#decimoCuartoEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#fondosReservaEjecutado"+z.idSueldosSeguimeintos));

									funcion__solo__numero__montos($(".solo__numeros__montos"));

									funcion_porcentajes__colores__auto__ejecutables($("#sueldoEjecutado"+z.idSueldosSeguimeintos),$("#sueldoProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__sueldo"+z.idSueldosSeguimeintos),$(".rotulo__sueldos"+z.idSueldosSeguimeintos));

									funcion_porcentajes__colores__auto__ejecutables($("#aporteEjecutado"+z.idSueldosSeguimeintos),$("#aporteProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__aporte"+z.idSueldosSeguimeintos),$(".rotulo__aporte"+z.idSueldosSeguimeintos));

									funcion_porcentajes__colores__auto__ejecutables($("#decimoTercerEjecutado"+z.idSueldosSeguimeintos),$("#decimoTercerProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__decimoTercer"+z.idSueldosSeguimeintos),$(".rotulo__decimoTercer"+z.idSueldosSeguimeintos));

									funcion_porcentajes__colores__auto__ejecutables($("#decimoCuartoEjecutado"+z.idSueldosSeguimeintos),$("#decimoCuartoProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__decimoCuarto"+z.idSueldosSeguimeintos),$(".rotulo__decimoCuarto"+z.idSueldosSeguimeintos));

									funcion_porcentajes__colores__auto__ejecutables($("#fondosReservaEjecutado"+z.idSueldosSeguimeintos),$("#fondosReservaProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__fondo"+z.idSueldosSeguimeintos),$(".rotulo__fondosReservas"+z.idSueldosSeguimeintos));



									funcion_porcentajes__colores($("#sueldoEjecutado"+z.idSueldosSeguimeintos),$("#sueldoProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__sueldo"+z.idSueldosSeguimeintos),$(".rotulo__sueldos"+z.idSueldosSeguimeintos),4888888888889);

									funcion_porcentajes__colores($("#aporteEjecutado"+z.idSueldosSeguimeintos),$("#aporteProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__aporte"+z.idSueldosSeguimeintos),$(".rotulo__aporte"+z.idSueldosSeguimeintos),4888888888889);

									funcion_porcentajes__colores($("#decimoTercerEjecutado"+z.idSueldosSeguimeintos),$("#decimoTercerProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__decimoTercer"+z.idSueldosSeguimeintos),$(".rotulo__decimoTercer"+z.idSueldosSeguimeintos),4888888888889);

									funcion_porcentajes__colores($("#decimoCuartoEjecutado"+z.idSueldosSeguimeintos),$("#decimoCuartoProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__decimoCuarto"+z.idSueldosSeguimeintos),$(".rotulo__decimoCuarto"+z.idSueldosSeguimeintos),4888888888889);

									funcion_porcentajes__colores($("#fondosReservaEjecutado"+z.idSueldosSeguimeintos),$("#fondosReservaProgramado"+z.idSueldosSeguimeintos).val(),$(".celda__fondo"+z.idSueldosSeguimeintos),$(".rotulo__fondosReservas"+z.idSueldosSeguimeintos),4888888888889);

									$("#eliminarInfor"+z.idSueldosSeguimeintos).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
										
										funcion__eliminar__general(idPrincipal,'eliminar__sueldos__salarios__seguimiento');

									}); 

									$(".cuerpo__sueldos__slaraios__seguimientos__desvinculaciones").append('<tr class="fila__corresponsal fila__desvinculacion__'+z.idSueldosSeguimeintos+'"><td><center>'+z.mes+'</center></td><td><center>'+z.cedula+'</center></td><td><center>'+z.tipoCargo+'</center></td><td><center>'+z.nombres+'</center></td><td><input type="text" id="desaucioProgramado'+z.idSueldosSeguimeintos+'" name="desaucioProgramado'+z.idSueldosSeguimeintos+'" value="'+z.compensacionDeshaucioProgramado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__desaucio'+z.idSueldosSeguimeintos+'"><input type="text" id="desaucioEjecutado'+z.idSueldosSeguimeintos+'" name="desaucioEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.compensacionDeshaucioEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__desaucio'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="despidoProgramado'+z.idSueldosSeguimeintos+'" name="despidoProgramado'+z.idSueldosSeguimeintos+'" value="'+z.despidoIntepestivoProgramado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__despido'+z.idSueldosSeguimeintos+'"><input type="text" id="despidoEjecutado'+z.idSueldosSeguimeintos+'" name="despidoEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.despidoIntepestivoEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__despido'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="renunciaProgramado'+z.idSueldosSeguimeintos+'" name="renunciaProgramado'+z.idSueldosSeguimeintos+'" value="'+z.reunciaVoluntariaProgramado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__renuncia'+z.idSueldosSeguimeintos+'"><input type="text" id="renunciaEjecutado'+z.idSueldosSeguimeintos+'" name="renunciaEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.renunciaVoluntariaEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__renuncia'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="vacacionesProgramado'+z.idSueldosSeguimeintos+'" name="vacacionesProgramado'+z.idSueldosSeguimeintos+'" value="'+z.vacacionesProgramado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__vacaciones'+z.idSueldosSeguimeintos+'"><input type="text" id="vacacionesEjecutado'+z.idSueldosSeguimeintos+'" name="vacacionesEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.vacionesEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__vacaciones'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="editarInforDesvinculaciones'+z.idSueldosSeguimeintos+'" name="editarInforDesvinculaciones'+z.idSueldosSeguimeintos+'" idPrincipal="'+z.idSueldosSeguimeintos+'" idContador="'+z.idSueldosSeguimeintos+'" class="editar__ides"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

									funcion__cambio__de__numero($("#desaucioEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#despidoEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#renunciaEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#vacacionesEjecutado"+z.idSueldosSeguimeintos));

									funcion__solo__numero__montos($(".solo__numeros__montos"));


									$("#editarInforDesvinculaciones"+z.idSueldosSeguimeintos).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
																			
										funcion__editar__general($("#editarInforDesvinculaciones"+idContador),$(".obligatorios__nos"+idContador),"editar__sueldos__salarios__desvinculaciones",[idPrincipal,$("#desaucioEjecutado"+idContador).val(),$("#despidoEjecutado"+idContador).val(),$("#renunciaEjecutado"+idContador).val(),$("#vacacionesEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],false,false,false);

									}); 


									$("#editarInfor"+z.idSueldosSeguimeintos).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
										
										funcion__editar__general($("#editarInfor"+idContador),$(".obligatorios__nos"+idContador),"editar__sueldos__salarios",[idPrincipal,$("#sueldoEjecutado"+idContador).val(),$("#aporteEjecutado"+idContador).val(),$("#decimoTercerEjecutado"+idContador).val(),$("#decimoCuartoEjecutado"+idContador).val(),$("#fondosReservaEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],false,false,false);

									}); 

									
							}

							var indicadorInformacion2=elementos['indicadorInformacion2'];

							if (indicadorInformacion2!="" && indicadorInformacion2!=null) {

								for(d of indicadorInformacion2){

									$(".cuerpo__sueldos__edis__com").append('<tr class="fila__corresponsal fila__'+d.idComprobante__general+'"><td><a href="'+$("#filesFrontend").val()+'seguimiento/planilla/'+d.planilla+'" target="_blank">'+d.planilla+'</a></td><td><a href="'+$("#filesFrontend").val()+'seguimiento/rol/'+d.rol+'" target="_blank">'+d.rol+'</a></td><td><a href="'+$("#filesFrontend").val()+'seguimiento/comprobante/'+d.comprobante+'" target="_blank">'+d.comprobante+'</a></td><td><center>'+d.mes+'</center></td><td><center>'+d.trimestre+'</center></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__s'+d.idComprobante__general+'" name="eliminarInfor'+d.idComprobante__general+'" idPrincipal="'+d.idComprobante__general+'" idContador="'+d.idComprobante__general+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

									$("#eliminarInfor__s"+d.idComprobante__general).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
												
										funcion__eliminar__general(idPrincipal,'eliminar__sueldos__salarios__seguimiento__comprobantes');

									}); 


								}


							}else{

								$("#comprobantes__sueldos__salarios").hide();

							}


						}

						if (parametro5=="indicadores__seguimientos__tablas") {

							$(".cuerpo__indicadores__seguimientos__2").html(" ");

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__corresponsal fila__'+z.idModificaIndicadores+'"><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+z.totalProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+z.totalEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><center><input type="file" id="documentoSustento'+z.idActividades+'" name="documentoSustento'+z.idActividades+'" class="ancho__total__input" /><div class="documento__seguimiento'+z.idActividades+'"></div></center></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="editarInfor'+z.idActividades+'" name="editarInfor'+z.idActividades+'" idPrincipal="'+z.idModificaIndicadores+'" idContador="'+z.idActividades+'" class="editar__ides"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><li><a style="cursor:pointer;" id="eliminarInfor'+z.idActividades+'" name="eliminarInfor'+z.idActividades+'" idPrincipal="'+z.idModificaIndicadores+'" idContador="'+z.idActividades+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


								$(".cuerpo__indicadores__seguimientos__2").append('<tr><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td>'+z.totalProgramado+'</td><td>'+z.totalEjecutado+'</td></tr>');

								$(".documento__seguimiento"+z.idActividades).append('<a href="'+$("#filesFrontend").val()+'seguimiento/indicadoresDocumento/'+z.documento+'" target="_blank" class="text-center">'+z.documento+'</a>');

								funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));

								funcion__solo__numero($(".solo__numeros"));

								funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),4888888888889);

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades));

								$("#editarInfor"+z.idActividades).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__editar__general($("#editarInfor"+idContador),$(".obligatorios"+idContador),"editar__indicadores",[idPrincipal,$("#totalEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],$("#documentoSustento"+idContador));

								}); 


								$("#eliminarInfor"+z.idActividades).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__indicador__seguimiento');

								}); 

							}

						}

						if (parametro5=="honorarios__seguimientos__tablas") {


							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							if (indicadorInformacion3!=null && indicadorInformacion3!="") {

								for (l of indicadorInformacion3) {

									$(".otros__honorarios").append('<tr class="fila__corresponsal fila__otros__'+l.idOtrosHonorarios+'"><td>'+l.nombres+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosHonorarios/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosHonorarios+'" name="eliminarInfor__otros'+l.idOtrosHonorarios+'" idPrincipal="'+l.idOtrosHonorarios+'" idContador="'+l.idOtrosHonorarios+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosHonorarios).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__honorarios');

										}); 				

								}

							}else{

								$("#otros__honorarios__edicion").hide();

							}

							if (indicadorInformacion2!=null && indicadorInformacion2!="") {

								for (c of indicadorInformacion2) {
									
									$(".factureros__honorarios").append('<tr class="fila__corresponsal fila__fac__'+c.idFacturaHonorarios+'"><td>'+c.nombres+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasHonorarios/'+c.documento+'" target="_blank">'+c.documento+'</a></td><td>'+c.numeroFactura+'</td><td>'+c.fechaFactura+'</td><td>'+c.ruc+'</td><td>'+c.autorizacion+'</td><td>'+c.monto+'</td><td>'+c.mes+'</td><td>'+c.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros__hono'+c.idFacturaHonorarios+'" name="eliminarInfor__factureros__hono'+c.idFacturaHonorarios+'" idPrincipal="'+c.idFacturaHonorarios+'" idContador="'+c.idFacturaHonorarios+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


										$("#eliminarInfor__factureros__hono"+c.idFacturaHonorarios).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__facturas__honorarios');

										}); 

								}

							}else{

								$("#honorarios__facturas__edicion").hide();

							}

							$(".cuerpo__honorarios__seguimientos__2").html(' ');

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__corresponsal fila__'+z.idHonorariosSeguimientos+'"><td>'+z.mes+'</td><td>'+z.cedula+'</td><td>'+z.cargo+'</td><td>'+z.nombres+'</td><td><input type="text" id="mensualProgramado'+z.idHonorariosSeguimientos+'" name="mensualProgramado'+z.idHonorariosSeguimientos+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idHonorariosSeguimientos+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idHonorariosSeguimientos+'"><input type="text" id="mensualEjecutado'+z.idHonorariosSeguimientos+'" name="mensualEjecutado'+z.idHonorariosSeguimientos+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idHonorariosSeguimientos+'" /><div class="rotulo'+z.idHonorariosSeguimientos+'" style="text-align:center; widht:100%;"></div></td><td>'+z.observaciones+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idHonorariosSeguimientos+'" name="eliminarInfor'+z.idHonorariosSeguimientos+'" idPrincipal="'+z.idHonorariosSeguimientos+'" idContador="'+z.idHonorariosSeguimientos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__honorarios__seguimientos__2").append('<tr><td>'+z.mes+'</td><td>'+z.cedula+'</td><td>'+z.cargo+'</td><td>'+z.nombres+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td><td>'+z.observaciones+'</td></tr>');

								if (z.facturas!='no' && z.facturas!=undefined && z.facturas!=null) {

									$(".documento__factura"+z.idHonorariosSeguimientos).append('<a href="documentos/seguimiento/facturas/'+z.facturas+'" target="_blank" class="text-center">'+z.facturas+'</a>');

								}else{
									$(".documento__factura"+z.idHonorariosSeguimientos).append('N/A');
								}

								
								if (z.cheques!='no' && z.cheques!=undefined && z.cheques!=null) {
									
									$(".documento__cheque"+z.idHonorariosSeguimientos).append('<a href="documentos/seguimiento/cheques/'+z.cheques+'" target="_blank" class="text-center">'+z.cheques+'</a>');
									
								}else{
									$(".documento__cheque"+z.idHonorariosSeguimientos).append('N/A');
								}


								if (z.ruc!='no' && z.ruc!=undefined && z.ruc!=null) {
									
									$(".documento__ruc"+z.idHonorariosSeguimientos).append('<a href="documentos/seguimiento/ruc/'+z.ruc+'" target="_blank" class="text-center">'+z.ruc+'</a>');
									
								}else{
									$(".documento__ruc"+z.idHonorariosSeguimientos).append('N/A');
								}


								if (z.otrosHabilitantes!='no' && z.otrosHabilitantes!=undefined && z.otrosHabilitantes!=null) {
									
									$(".documento__otrosHa"+z.idHonorariosSeguimientos).append('<a href="documentos/seguimiento/otrosHabilitantes/'+z.otrosHabilitantes+'" target="_blank" class="text-center">'+z.otrosHabilitantes+'</a>');
									
								}else{
									$(".documento__otrosHa"+z.idHonorariosSeguimientos).append('N/A');
								}

								funcion_porcentajes__colores($("#mensualEjecutado"+z.idHonorariosSeguimientos),$("#mensualProgramado"+z.idHonorariosSeguimientos).val(),$(".celdas"+z.idHonorariosSeguimientos),$(".rotulo"+z.idHonorariosSeguimientos),4888888888889);

								funcion_porcentajes__colores__auto__ejecutables($("#mensualEjecutado"+z.idHonorariosSeguimientos),$("#mensualProgramado"+z.idHonorariosSeguimientos).val(),$(".celdas"+z.idHonorariosSeguimientos),$(".rotulo"+z.idHonorariosSeguimientos));

								$("#editarInfor"+z.idHonorariosSeguimientos).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__editar__general($("#editarInfor"+idContador),$(".obligatorios"+idContador),"editar__honorarios",[idPrincipal,$("#mensualEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],$("#factura"+idContador),$("#cheque"+idContador),$("#ruc"+idContador),$("#otrosHa"+idContador));

								}); 


								$("#eliminarInfor"+z.idHonorariosSeguimientos).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__honorarios__seguimiento');

								}); 


							}

						}


						if (parametro5=="administrativo__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							if (indicadorInformacion3!=null && indicadorInformacion3!="") {

								for (l of indicadorInformacion3) {

									$(".otros__administrativos").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosAdministrativos+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosHabilitantes__administrativo/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosAdministrativos+'" name="eliminarInfor__otros'+l.idOtrosAdministrativos+'" idPrincipal="'+l.idOtrosAdministrativos+'" idContador="'+l.idOtrosAdministrativos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosAdministrativos).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__administrativos');

										}); 				

								}

							}else{

								$("#otros__editas__administativos").hide();

							}

							if (indicadorInformacion2!=null && indicadorInformacion2!="") {

								for (l of indicadorInformacion2) {
									
									$(".factureros__administrativos").append('<tr class="fila__corresponsal fila__fac__'+l.idFacturaAdministrativos+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturas__administrativo/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.numeroFactura+'</td><td>'+l.fechaFactura+'</td><td>'+l.ruc+'</td><td>'+l.autorizacion+'</td><td>'+l.monto+'</td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros'+l.idFacturaAdministrativos+'" name="eliminarInfor__factureros'+l.idFacturaAdministrativos+'" idPrincipal="'+l.idFacturaAdministrativos+'" idContador="'+l.idFacturaAdministrativos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


										$("#eliminarInfor__factureros"+l.idFacturaAdministrativos).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__facturas__administrativos');

										}); 

								}

							}else{

								$("#administrativos__editares").hide();

							}

							$(".cuerpo__administrativo__seguimientos__2").html(' ');

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idAdministrativoSegui+' fila__corresponsal"><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td><input type="text" id="totalProgramado'+z.idAdministrativoSegui+'" name="totalProgramado'+z.idAdministrativoSegui+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idAdministrativoSegui+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idAdministrativoSegui+'"><input type="text" id="totalEjecutado'+z.idAdministrativoSegui+'" name="totalEjecutado'+z.idAdministrativoSegui+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idAdministrativoSegui+'" readonly=""/><div class="rotulo'+z.idAdministrativoSegui+'" style="text-align:center; widht:100%;"></div></td><td>'+z.observaciones+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idAdministrativoSegui+'" name="eliminarInfor'+z.idAdministrativoSegui+'" idPrincipal="'+z.idAdministrativoSegui+'" idContador="'+z.idAdministrativoSegui+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__administrativo__seguimientos__2").append('<tr><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td><td>'+z.observaciones+'</td></tr>');


								if (z.factura!='no' && z.factura!=undefined && z.factura!=null) {

									$(".documento__factura"+z.idAdministrativoSegui).append('<a href="'+$("#filesFrontend").val()+'seguimiento/facturas__administrativo/'+z.factura+'" target="_blank" class="text-center">'+z.factura+'</a>');

								}else{
									$(".documento__factura"+z.idAdministrativoSegui).append('N/A');
								}

								
								if (z.otrosHabilitantes!='no' && z.otrosHabilitantes!=undefined && z.otrosHabilitantes!=null) {
									
									$(".documento__Otros"+z.idAdministrativoSegui).append('<a href="'+$("#filesFrontend").val()+'seguimiento/otrosHabilitantes__administrativo/'+z.otrosHabilitantes+'" target="_blank" class="text-center">'+z.otrosHabilitantes+'</a>');
									
								}else{
									$(".documento__Otros"+z.idAdministrativoSegui).append('N/A');
								}



								funcion__cambio__de__numero($("#totalEjecutado"+z.idAdministrativoSegui));

								funcion__solo__numero($(".solo__numeros"));

								funcion_porcentajes__colores($("#totalEjecutado"+z.idAdministrativoSegui),$("#totalProgramado"+z.idAdministrativoSegui).val(),$(".celdas"+z.idAdministrativoSegui),$(".rotulo"+z.idAdministrativoSegui),4888888888889);

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idAdministrativoSegui),$("#totalProgramado"+z.idAdministrativoSegui).val(),$(".celdas"+z.idAdministrativoSegui),$(".rotulo"+z.idAdministrativoSegui));


								$("#editarInfor"+z.idAdministrativoSegui).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__editar__general($("#editarInfor"+idContador),$(".obligatorios"+idContador),"editar__indicadores",[idPrincipal,$("#totalEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],$("#documentoFactura"+idContador),$("#documentoOtros"+idContador));

								}); 



								$("#eliminarInfor"+z.idAdministrativoSegui).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__adminsitrativos__seguimiento');

								}); 


							}

						}


						if (parametro5=="competencia__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__competencia__administrativos__2").html(' ');

							if(indicadorInformacion3!=null && indicadorInformacion3!=""){

								for (l of indicadorInformacion3) {

									$(".otros__competencia").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCompetencia+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompetencia/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCompetencia+'" name="eliminarInfor__otros'+l.idOtrosCompetencia+'" idPrincipal="'+l.idOtrosCompetencia+'" idContador="'+l.idOtrosCompetencia+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCompetencia).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__competencia__s');

										}); 				

								}

							}else{

								$("#otros__competencias__us").hide();

							}

							if(indicadorInformacion2!=null && indicadorInformacion2!=""){

								for (l of indicadorInformacion2) {
									
									$(".factureros__administrativos").append('<tr class="fila__corresponsal fila__fac__'+l.idFacturaCompetencia+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasCompetencias/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.numeroFactura+'</td><td>'+l.fechaFactura+'</td><td>'+l.ruc+'</td><td>'+l.autorizacion+'</td><td>'+l.monto+'</td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros__competencias'+l.idFacturaCompetencia+'" name="eliminarInfor__factureros__competencias'+l.idFacturaCompetencia+'" idPrincipal="'+l.idFacturaCompetencia+'" idContador="'+l.idFacturaCompetencia+'" class="eliminar__ides eliminarIdes__competencia"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

									$(".eliminarIdes__competencia").click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
											
										funcion__eliminar__general(idPrincipal,'eliminar__competencias__seguimmientos__facturas');

									}); 


								}

							}else{

								$("#facturas__seguimientos__competencias__u").hide();

							}

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idCompetencias+' fila__corresponsal"><td>'+z.mes+'</td><td>'+z.nombreEvento+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td><input type="text" id="totalProgramado'+z.idCompetencias+'" name="totalProgramado'+z.idCompetencias+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCompetencias+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idCompetencias+'"><input type="text" id="totalEjecutado'+z.idCompetencias+'" name="totalEjecutado'+z.idCompetencias+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCompetencias+'" readonly=""/><div class="rotulo'+z.idCompetencias+'" style="text-align:center; widht:100%;"></div></td><td>'+z.observaciones+'</td><td>'+z.cantidadBienes+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__competencia'+z.idCompetencias+'" name="eliminarInfor__competencia'+z.idCompetencias+'" idPrincipal="'+z.idCompetencias+'" idContador="'+z.idCompetencias+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__competencia__administrativos__2").append('<tr><td>'+z.mes+'</td><td>'+z.nombreEvento+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td><td>'+z.observaciones+'</td><td>'+z.cantidadBienes+'</td></tr>');

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idCompetencias),$("#totalProgramado"+z.idCompetencias).val(),$(".celdas"+z.idCompetencias),$(".rotulo"+z.idCompetencias));

								$("#eliminarInfor__competencia"+z.idCompetencias).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__competencias__seguimiento');

								}); 


							}

						}


						if (parametro5=="mantenimiento__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__mantenimiento__seguimientos__2").html(' ');

							if(indicadorInformacion3!=null && indicadorInformacion3!=""){

								for (l of indicadorInformacion3) {

									$(".otros__mantenimiento").append('<tr class="fila__corresponsal fila__otros__'+l.idOtrosMantenimiento+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosMantenimiento/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros__mantenimiento'+l.idOtrosMantenimiento+'" name="eliminarInfor__otros__mantenimiento'+l.idOtrosMantenimiento+'" idPrincipal="'+l.idOtrosMantenimiento+'" idContador="'+l.idOtrosMantenimiento+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros__mantenimiento"+l.idOtrosMantenimiento).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__mantenimiento');

										}); 				

								}

							}else{

								$(".tabla__mantenimiento__otros__principales").hide();

							}

							if(indicadorInformacion2!=null && indicadorInformacion2!=""){

								for (l of indicadorInformacion2) {
									
									$(".factureros__mantenimiento").append('<tr class="fila__corresponsal fila__fac__'+l.idFacturaMantenimiento+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasMantenimiento/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.numeroFactura+'</td><td>'+l.fechaFactura+'</td><td>'+l.ruc+'</td><td>'+l.autorizacion+'</td><td>'+l.monto+'</td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros'+l.idFacturaMantenimiento+'" name="eliminarInfor__factureros'+l.idFacturaMantenimiento+'" idPrincipal="'+l.idFacturaMantenimiento+'" idContador="'+l.idFacturaMantenimiento+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


										$("#eliminarInfor__factureros"+l.idFacturaMantenimiento).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__poa__administrativos__nuevo__facturas__man');

										}); 

								}

							}else{

								$(".tabla__mantenimiento__principal").hide();
								
							}

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis'+z.idMantenimiento+' fila__corresponsal"><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.detallarTipoIn+'</td><td><input type="text" id="totalProgramado'+z.idMantenimiento+'" name="totalProgramado'+z.idMantenimiento+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idMantenimiento+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idMantenimiento+'"><input type="text" id="totalEjecutado'+z.idMantenimiento+'" name="totalEjecutado'+z.idMantenimiento+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idMantenimiento+'" readonly=""/><div class="rotulo'+z.idMantenimiento+'" style="text-align:center; widht:100%;"></div></td><td>'+z.observaciones+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idMantenimiento+'" name="eliminarInfor'+z.idMantenimiento+'" idPrincipal="'+z.idMantenimiento+'" idContador="'+z.idMantenimiento+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


								$(".cuerpo__mantenimiento__seguimientos__2").append('<tr><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.detallarTipoIn+'</td><td>'+z.provincias+'</td><td>'+z.direccionCompleta+'</td><td>'+z.estado+'</td><td>'+z.tipoMantenimiento+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td><td>'+z.observaciones+'</td></tr>');

								if (z.factura!='no' && z.factura!=undefined && z.factura!=null) {

									$(".documento__factura"+z.idMantenimiento).append('<a href="'+$("#filesFrontend").val()+'seguimiento/facturas__administrativo/'+z.factura+'" target="_blank" class="text-center">'+z.factura+'</a>');

								}else{
									$(".documento__factura"+z.idMantenimiento).append('N/A');
								}

								
								if (z.otrosHabilitantes!='no' && z.otrosHabilitantes!=undefined && z.otrosHabilitantes!=null) {
									
									$(".documento__Otros"+z.idMantenimiento).append('<a href="'+$("#filesFrontend").val()+'seguimiento/otrosHabilitantes__administrativo/'+z.otrosHabilitantes+'" target="_blank" class="text-center">'+z.otrosHabilitantes+'</a>');
									
								}else{
									$(".documento__Otros"+z.idMantenimiento).append('N/A');
								}



								funcion__cambio__de__numero($("#totalEjecutado"+z.idMantenimiento));

								funcion__solo__numero($(".solo__numeros"));

								funcion_porcentajes__colores($("#totalEjecutado"+z.idMantenimiento),$("#totalProgramado"+z.idMantenimiento).val(),$(".celdas"+z.idMantenimiento),$(".rotulo"+z.idMantenimiento),4888888888889);

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idMantenimiento),$("#totalProgramado"+z.idMantenimiento).val(),$(".celdas"+z.idMantenimiento),$(".rotulo"+z.idMantenimiento));


								$("#editarInfor"+z.idMantenimiento).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');

									$(".fila__seguis"+idContador).remove();
									
									funcion__editar__general($("#editarInfor"+idContador),$(".obligatorios"+idContador),"editar__indicadores",[idPrincipal,$("#totalEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],$("#documentoFactura"+idContador),$("#documentoOtros"+idContador));

								}); 



								$("#eliminarInfor"+z.idMantenimiento).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');

									$(".fila__seguis"+idContador).remove();
									
									funcion__eliminar__general(idContador,'eliminar__poa__mantenenimientos__nuevo');

								}); 


							}

						}

						if (parametro5=="competencia__implementacion__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__competencia__implementaciones__2").html(' ');

							if (indicadorInformacion3!=null && indicadorInformacion3!="") {

								for (l of indicadorInformacion3) {

									$(".otros__implementacion").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosInstalaciones+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="documentos/seguimiento/otrosInstalaciones/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosInstalaciones+'" name="eliminarInfor__otros'+l.idOtrosInstalaciones+'" idPrincipal="'+l.idOtrosInstalaciones+'" idContador="'+l.idOtrosInstalaciones+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$(".eliminar__ides").click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__implementacion');

										}); 				

								}

							}else{

								$("#otros__implementaciones__ver").hide();

							}


							if (indicadorInformacion2!=null && indicadorInformacion2!="") {

								for (l of indicadorInformacion2) {
									
									$(".factureros__implementacion").append('<tr class="fila__corresponsal fila__fac__'+l.idFacturaInstalaciones+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="documentos/seguimiento/facturasImplementacion/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.numeroFactura+'</td><td>'+l.fechaFactura+'</td><td>'+l.ruc+'</td><td>'+l.autorizacion+'</td><td>'+l.monto+'</td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros__competencias'+l.idFacturaInstalaciones+'" name="eliminarInfor__factureros__competencias'+l.idFacturaInstalaciones+'" idPrincipal="'+l.idFacturaInstalaciones+'" idContador="'+l.idFacturaInstalaciones+'" class="eliminar__ides eliminarIdes__competencia"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

									$(".eliminarIdes__competencia").click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
											
										funcion__eliminar__general(idPrincipal,'eliminar__implementacion__seguimmientos__facturas');

									}); 


								}

							}else{

								$("#factureros__implementarciones__ver").hide();

							}



							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idImplementacion+' fila__corresponsal"><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td><input type="text" id="totalProgramado'+z.idImplementacion+'" name="totalProgramado'+z.idImplementacion+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idImplementacion+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idImplementacion+'"><input type="text" id="totalEjecutado'+z.idImplementacion+'" name="totalEjecutado'+z.idImplementacion+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idImplementacion+'" readonly=""/><div class="rotulo'+z.idImplementacion+'" style="text-align:center; widht:100%;"></div></td><td>'+z.observaciones+'</td><td>'+z.cantidadBienes+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__competencia'+z.idImplementacion+'" name="eliminarInfor__competencia'+z.idImplementacion+'" idPrincipal="'+z.idImplementacion+'" idContador="'+z.idImplementacion+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__competencia__implementaciones__2").append('<tr><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td><td>'+z.observaciones+'</td><td>'+z.cantidadBienes+'</td></tr>');

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idImplementacion),$("#totalProgramado"+z.idImplementacion).val(),$(".celdas"+z.idImplementacion),$(".rotulo"+z.idImplementacion));

								$("#eliminarInfor__competencia"+z.idImplementacion).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__implementacion__seguimiento');

								}); 


							}

						}

						if (parametro5=="capacitacion__seguimiento__tablas__ms") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__capacitacion__vs__2").html(' ');


							if (indicadorInformacion3!=null && indicadorInformacion3!="") {

								for (l of indicadorInformacion3) {

									$(".otros__implementacion").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCapacitacion+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCapacitacion/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCapacitacion+'" name="eliminarInfor__otros'+l.idOtrosCapacitacion+'" idPrincipal="'+l.idOtrosCapacitacion+'" idContador="'+l.idOtrosCapacitacion+'" class="eliminar__ides eliminas__ides__capac"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$(".eliminas__ides__capac").click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__capacitacion__ver');

										}); 				

								}

							}else{

								$("#capacitacion__otros__ver").hide();

							}

							if (indicadorInformacion2!=null && indicadorInformacion2!="") {

								for (l of indicadorInformacion2) {
									
									$(".factureros__implementacion").append('<tr class="fila__corresponsal fila__fac__'+l.idFacturaCapacitacion+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasCapacitacion/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.numeroFactura+'</td><td>'+l.fechaFactura+'</td><td>'+l.ruc+'</td><td>'+l.autorizacion+'</td><td>'+l.monto+'</td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros__competencias'+l.idFacturaCapacitacion+'" name="eliminarInfor__factureros__competencias'+l.idFacturaCapacitacion+'" idPrincipal="'+l.idFacturaCapacitacion+'" idContador="'+l.idFacturaCapacitacion+'" class="eliminar__ides eliminarIdes__competencia"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

									$(".eliminarIdes__competencia").click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
											
										funcion__eliminar__general(idPrincipal,'eliminar__implementacion__seguimmientos__facturas__CAPACI');

									}); 


								}

							}else{

								$("#capacitacion__factureros__v").hide();

							}


							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idCapacitacion+' fila__corresponsal"><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td><input type="text" id="totalProgramado'+z.idCapacitacion+'" name="totalProgramado'+z.idCapacitacion+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCapacitacion+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idCapacitacion+'"><input type="text" id="totalEjecutado'+z.idCapacitacion+'" name="totalEjecutado'+z.idCapacitacion+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idCapacitacion+'" readonly=""/><div class="rotulo'+z.idCapacitacion+'" style="text-align:center; widht:100%;"></div></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__competencia'+z.idCapacitacion+'" name="eliminarInfor__competencia'+z.idCapacitacion+'" idPrincipal="'+z.idCapacitacion+'" idContador="'+z.idCapacitacion+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__capacitacion__vs__2").append('<tr><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td></tr>');

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idCapacitacion),$("#totalProgramado"+z.idCapacitacion).val(),$(".celdas"+z.idCapacitacion),$(".rotulo"+z.idCapacitacion));

								$("#eliminarInfor__competencia"+z.idCapacitacion).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__capacitacion__seguimiento__2');

								}); 


							}

						}

						if (parametro5=="recreativos__seguimiento__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							for (l of indicadorInformacion3) {

								$(".otros__recreativos").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosRecreativo+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="documentos/seguimiento/otrosRecreativo/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosRecreativo+'" name="eliminarInfor__otros'+l.idOtrosRecreativo+'" idPrincipal="'+l.idOtrosRecreativo+'" idContador="'+l.idOtrosRecreativo+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
								

									$("#eliminarInfor__otros"+l.idOtrosRecreativo).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
										
										funcion__eliminar__general(idPrincipal,'eliminar__otros__recreativo');

									}); 				

							}

							for (l of indicadorInformacion2) {
								
								$(".factureros__recreativos").append('<tr class="fila__corresponsal fila__fac__'+l.idFacturaRecreativo+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="documentos/seguimiento/facturasRecreativo/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.numeroFactura+'</td><td>'+l.fechaFactura+'</td><td>'+l.ruc+'</td><td>'+l.autorizacion+'</td><td>'+l.monto+'</td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__factureros__competencias'+l.idFacturaRecreativo+'" name="eliminarInfor__factureros__competencias'+l.idFacturaRecreativo+'" idPrincipal="'+l.idFacturaRecreativo+'" idContador="'+l.idFacturaRecreativo+'" class="eliminar__ides eliminarIdes__recreativo"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".eliminarIdes__recreativo").click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
										
									funcion__eliminar__general(idPrincipal,'eliminar__implementacion__seguimmientos__facturas__RECREATIVOS');

								}); 


							}

							$(".cuerpo__recreativo__segumientos__2").html(' ');


							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idRecreativos+' fila__corresponsal"><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td><input type="text" id="totalProgramado'+z.idRecreativos+'" name="totalProgramado'+z.idRecreativos+'" value="'+z.mensualProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idRecreativos+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idRecreativos+'"><input type="text" id="totalEjecutado'+z.idRecreativos+'" name="totalEjecutado'+z.idRecreativos+'" value="'+z.mensualEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idRecreativos+'" readonly=""/><div class="rotulo'+z.idRecreativos+'" style="text-align:center; widht:100%;"></div></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__competencia'+z.idRecreativos+'" name="eliminarInfor__competencia'+z.idRecreativos+'" idPrincipal="'+z.idRecreativos+'" idContador="'+z.idRecreativos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__recreativo__segumientos__2").append('<tr><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td></tr>');

								funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idRecreativos),$("#totalProgramado"+z.idRecreativos).val(),$(".celdas"+z.idRecreativos),$(".rotulo"+z.idRecreativos));

								$("#eliminarInfor__competencia"+z.idRecreativos).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__recreacion__seguimiento__2');

								}); 


							}

						}



						if (parametro5=="recreativos__formativo__seguimiento") {
							$(".cuerpo__formativos__2").html(' ');

							var indicadorInformacion3=elementos['indicadorInformacion3'];

							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".formativo__otros__tecnicos__cuerpo").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCompetenciasTecnicas+'"><td><a href="documentos/seguimiento/otrosCompentencia_formativo/'+l.documento+'" target="_blank">'+l.documento+'</a></td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCompetenciasTecnicas+'" name="eliminarInfor__otros'+l.idOtrosCompetenciasTecnicas+'" idPrincipal="'+l.idOtrosCompetenciasTecnicas+'" idContador="'+l.idOtrosCompetenciasTecnicas+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCompetenciasTecnicas).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__formativo__ver');

										}); 				

								}

							}else{

								$(".formativo__otros__tecnicos").hide();

							}

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idCompetenciaFormativo+' fila__corresponsal"><td>'+z.nombreEvento+'</td><td>'+z.oro+'</td><td>'+z.plata+'</td><td>'+z.bronce+'</td><td>'+z.total+'</td><td>'+z.cuarOc+'</td><td>'+z.analisis+'</td><td>'+z.beneficiariosMujeres+'</td><td>'+z.beneficiariosHombres+'</td><td>'+z.totalT+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td><td>'+z.observacionesTecnicas+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__formativo'+z.idCompetenciaFormativo+'" name="eliminarInfor__formativo'+z.idCompetenciaFormativo+'" idPrincipal="'+z.idCompetenciaFormativo+'" idContador="'+z.idCompetenciaFormativo+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__formativos__2").append('<tr><td>'+z.nombreEvento+'</td><td>'+z.oro+'</td><td>'+z.plata+'</td><td>'+z.bronce+'</td><td>'+z.total+'</td><td>'+z.cuarOc+'</td><td>'+z.analisis+'</td><td>'+z.beneficiariosMujeres+'</td><td>'+z.beneficiariosHombres+'</td><td>'+z.totalT+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td><td>'+z.observacionesTecnicas+'</td></tr>');

								$("#eliminarInfor__formativo"+z.idCompetenciaFormativo).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__formativos__seguimiento');

								}); 


							}

						}


						if (parametro5=="recreativos__altos__seguimiento") {


							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__altos__2").html(' ');


							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".alto__otros__tecnicos__cuerpo").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCompetenciasAltos+'"><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompentencia_alto/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCompetenciasAltos+'" name="eliminarInfor__otros'+l.idOtrosCompetenciasAltos+'" idPrincipal="'+l.idOtrosCompetenciasAltos+'" idContador="'+l.idOtrosCompetenciasAltos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCompetenciasAltos).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__faltosf__ver');

										}); 				

								}

							}else{

								$(".alto__otros__tecnicos").hide();

							}

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idCompetenciaAltos+' fila__corresponsal"><td>'+z.nombreEvento+'</td><td>'+z.oro+'</td><td>'+z.plata+'</td><td>'+z.bronce+'</td><td>'+z.total+'</td><td>'+z.cuarOc+'</td><td>'+z.analisis+'</td><td>'+z.beneficiariosMujeres+'</td><td>'+z.beneficiariosHombres+'</td><td>'+z.totalT+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idCompetenciaAltos+'" name="eliminarInfor__alto'+z.idCompetenciaAltos+'" idPrincipal="'+z.idCompetenciaAltos+'" idContador="'+z.idCompetenciaAltos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__altos__2").append('<tr class="fila__seguis__administrativos'+z.idCompetenciaAltos+' fila__corresponsal"><td>'+z.nombreEvento+'</td><td>'+z.oro+'</td><td>'+z.plata+'</td><td>'+z.bronce+'</td><td>'+z.total+'</td><td>'+z.cuarOc+'</td><td>'+z.analisis+'</td><td>'+z.beneficiariosMujeres+'</td><td>'+z.beneficiariosHombres+'</td><td>'+z.totalT+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td></tr>');

								$("#eliminarInfor__alto"+z.idCompetenciaAltos).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');

									$(".fila__seguis__administrativos"+idContador).remove();
									
									funcion__eliminar__general(idPrincipal,'eliminar__altos__seguimiento');

								}); 


							}

						}



						if (parametro5=="mantenimiento__tecnicos__seguimiento__tablas") {

							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__mantenimiento__tecnicos__2").html(' ');

							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".otros__mantenimiento__tecnicos").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosMantenimientoTecnico+'"><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosMantenimiento__tecnicos/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosMantenimientoTecnico+'" name="eliminarInfor__otros'+l.idOtrosMantenimientoTecnico+'" idPrincipal="'+l.idOtrosMantenimientoTecnico+'" idContador="'+l.idOtrosMantenimientoTecnico+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosMantenimientoTecnico).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__mantenimiento__tecnicos__ver');

										}); 				

								}

							}else{

								$(".mantenimiento__items__evolutivos__tecnicos").hide();

							}


							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idMantenimientoTec+' fila__corresponsal"><td>'+z.detallarTipoIn+'</td><td>'+z.planificadoInicial+'</td><td>'+z.ejecutadoInicial+'</td><td>'+z.planificadoFinal+'</td><td>'+z.ejectuadoFinal+'</td><td>'+z.porcentaje+'</td><td>'+z.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__mantenimiento__tecnicos'+z.idMantenimientoTec+'" name="eliminarInfor__mantenimiento__tecnicos'+z.idMantenimientoTec+'" idPrincipal="'+z.idMantenimientoTec+'" idContador="'+z.idMantenimientoTec+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__mantenimiento__tecnicos__2").append('<tr><td>'+z.detallarTipoIn+'</td><td>'+z.provincias+'</td><td>'+z.direccionCompleta+'</td><td>'+z.estado+'</td><td>'+z.tipoMantenimiento+'</td><td>'+z.mensualProgramado+'</td><td>'+z.mensualEjecutado+'</td><td>'+z.observaciones+'</td><td>'+z.planificadoInicial+'</td><td>'+z.ejecutadoInicial+'</td><td>'+z.planificadoFinal+'</td><td>'+z.ejectuadoFinal+'</td><td>'+z.porcentaje+'</td><td>'+z.trimestre+'</td></tr>');

								$("#eliminarInfor__mantenimiento__tecnicos"+z.idMantenimientoTec).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__mantenimientos__tecnicos');

								}); 


							}

						}



						if (parametro5=="capacitacion__seguimiento__tablas") {


							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__capacitacion__2").html(' ');


							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".otros__capacitacion__tecnicos").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCapacitacionTecnico+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.idOtrosCapacitacionTecnico+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCpacitacion_tecnico/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCapacitacionTecnico+'" name="eliminarInfor__otros'+l.idOtrosCapacitacionTecnico+'" idPrincipal="'+l.idOtrosCapacitacionTecnico+'" idContador="'+l.idOtrosCapacitacionTecnico+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCapacitacionTecnico).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');

											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__tecnico__capacitacion__ver');

										}); 				

								}

							}else{

								$(".tabla__capacitacion__tecnicos").hide();

							}							

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idCapacitacionTec+' fila__corresponsal"><td>'+z.nombreEvento+'</td><td>'+z.planificadoInicial+'</td><td>'+z.ejecutadoInicial+'</td><td>'+z.planificadoFinal+'</td><td>'+z.ejectuadoFinal+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idCapacitacionTec+'" name="eliminarInfor__alto'+z.idCapacitacionTec+'" idPrincipal="'+z.idCapacitacionTec+'" idContador="'+z.idCapacitacionTec+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__capacitacion__2").append('<tr class="fila__seguis__administrativos'+z.idCapacitacionTec+' fila__corresponsal"><td>'+z.nombreEvento+'</td><td>'+z.planificadoInicial+'</td><td>'+z.ejecutadoInicial+'</td><td>'+z.planificadoFinal+'</td><td>'+z.ejectuadoFinal+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td></tr>');

								$("#eliminarInfor__alto"+z.idCapacitacionTec).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__capacitacion__seguimiento');

								}); 


							}

						}


						if (parametro5=="recreacion__seguimiento__tablas") {


							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__recreacion__2").html(' ');

							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".recreativo__otros__tecnicos__cuerpo").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosRT+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otros__recreativos__tecnicos/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.mes+'</td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosRT+'" name="eliminarInfor__otros'+l.idOtrosRT+'" idPrincipal="'+l.idOtrosRT+'" idContador="'+l.idOtrosRT+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosRT).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__tecnico__recreativos__tecnicos');

										}); 				

								}

							}else{

								$(".recreativo__otros__tecnicos__si").hide();

							}

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__seguis__administrativos'+z.idCompetenciaSeguimiento+' fila__corresponsal"><td>'+z.nombreEvento+'</td><td>'+z.fechaInicioP+'</td><td>'+z.fechaInicioEjecutado+'</td><td>'+z.fechaFinP+'</td><td>'+z.fechaFinEjecutado+'</td><td>'+z.beneficiariosHombres+'</td><td>'+z.beneficiariosMujeres+'</td><td>'+z.totalT+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__alto'+z.idCompetenciaSeguimiento+'" name="eliminarInfor__alto'+z.idCompetenciaSeguimiento+'" idPrincipal="'+z.idCompetenciaSeguimiento+'" idContador="'+z.idCompetenciaSeguimiento+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__recreacion__2").append('<tr><td>'+z.nombreEvento+'</td><td>'+z.fechaInicioP+'</td><td>'+z.fechaInicioEjecutado+'</td><td>'+z.fechaFinP+'</td><td>'+z.fechaFinEjecutado+'</td><td>'+z.beneficiariosHombres+'</td><td>'+z.beneficiariosMujeres+'</td><td>'+z.totalT+'</td><td>'+z.tipoOrganizacion+'</td><td>'+z.trimestre+'</td></tr>');

								$("#eliminarInfor__alto"+z.idCompetenciaSeguimiento).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__recreacion__seguimiento');

								}); 


							}

						}



					});		

				},
				error:function(){

				}
					
			});		

		});			

	}	

	indicadores__funcionales($("#idIndicadoresME"),$(".cuerpo__indicadores__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'indicadores__seguimientos__tablas');

	indicadores__funcionales($("#idSueldosME"),$(".cuerpo__sueldos__slaraios__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'sueldos__seguimientos__tablas');

	indicadores__funcionales($("#idhonorariosME"),$(".cuerpo__honorarios__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'honorarios__seguimientos__tablas');

	indicadores__funcionales($("#idAdministrativoME"),$(".cuerpo__administrativo__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'administrativo__seguimientos__tablas');


	indicadores__funcionales($("#idMantenimientoME"),$(".cuerpo__mantenimiento__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'mantenimiento__seguimientos__tablas');

	indicadores__funcionales($("#idCompetenciaME"),$(".cuerpo__competencia__administrativos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'competencia__seguimientos__tablas');
	

	indicadores__funcionales($("#idImplementacionME"),$(".cuerpo__competencia__implementaciones"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'competencia__implementacion__tablas');


	indicadores__funcionales($("#idRecreativaME"),$(".cuerpo__recreativo__segumientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__seguimiento__tablas');


	indicadores__funcionales($("#idCompetencia__formativaME"),$(".cuerpo__formativos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__formativo__seguimiento');


	indicadores__funcionales($("#idCompetencia__altoRenME"),$(".cuerpo__altos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__altos__seguimiento');


	indicadores__funcionales($("#idCapacitacionTecnicoME"),$(".cuerpo__capacitacion"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'capacitacion__seguimiento__tablas');


	indicadores__funcionales($("#idRecreativaTecnicoME"),$(".cuerpo__recreacion"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreacion__seguimiento__tablas');


	indicadores__funcionales($("#idMantenimientoTecnicoME"),$(".cuerpo__mantenimiento__tecnicos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'mantenimiento__tecnicos__seguimiento__tablas');


	indicadores__funcionales($("#idCapacitacionME"),$(".cuerpo__capacitacion__vs"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'capacitacion__seguimiento__tablas__ms');

	/*=====  End of Tablas ejecutadas  ======*/
	
	/*=======================================
	=            Reporte de monto programado            =
	=======================================*/
	
	var carga__finalizada__segientos=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de la acción realizada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','guardar__seguimiento__estados');	

				let organismoIdPrin=$("#organismoIdPrin").val();
				let trimestreEvaluador=$("#trimestreEvaluador").val();

				paqueteDeDatos.append("organismoIdPrin",organismoIdPrin);
				paqueteDeDatos.append("trimestreEvaluador",trimestreEvaluador);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){

						$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						    let elementos=JSON.parse(response);
						    let llamada=elementos['llamada'];

						    alertify.set("notifier","position", "top-center");
						    alertify.notify("Acción realizada", "success", 5, function(){});

						    if (llamada=="si") {

						    	$(".contenedor__seguimiento__sin").hide();
						    	$(".contenedor__seguimiento__con").show();

								$("#finalizarSeguimiento").html('Volver a cargar información&nbsp;&nbsp;<i class="fa fa-reply-all" aria-hidden="true"></i>');

								funcion__cargas__dinamicas($(".informacion__fin__registradas"),"selecciona__acciones__seguimiento__final__matriz",organismoIdPrin,trimestreEvaluador);


						    }else{

						    	$(".contenedor__seguimiento__con").hide();
						    	$(".contenedor__seguimiento__sin").show();
						    	$(".contenedor__seguiiento__con").hide();

						    	$("#finalizarSeguimiento").html('Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i>');

						    }

					    }); 
    
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

	carga__finalizada__segientos($("#finalizarSeguimiento"));
	
	/*=====  End of Reporte de monto programado  ======*/
	
	/*=================================================================
	=            Enviar infor al ministerio de seguimiento            =
	=================================================================*/
	
	var carga__ministerio__seguimiento=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			var confirm= alertify.confirm('¿Está seguro de enviar la información de seguimiento ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

			$(this).hide();

			confirm.set({transition:'slide'}); 


			confirm.set('onok', function(){ //callbak al pulsar botón positivo

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','guardar__seguimiento__totales');	

				paqueteDeDatos.append("organismoIdPrin",parametro2);
				paqueteDeDatos.append("trimestreEvaluador",parametro3);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_2022/insertaAcciones.md.php",
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

	carga__ministerio__seguimiento($("#enviarFinal__ref"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val());	
	
	/*=====  End of Enviar infor al ministerio de seguimiento  ======*/
	
	/*===========================================
	=            Checked declaracion           =
	===========================================*/
	
	
	var cehckeds__declaraciones=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			var condicion = $(this).is(":checked");

			 if (condicion) {

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo','guardar__seguimiento__totales');

				let organismo__usados=$("#organismo__usados").val();	

				let trimestreEvaluador=$("#trimestreEvaluador").val();

				paqueteDeDatos.append("trimestreEvaluador",trimestreEvaluador);

				paqueteDeDatos.append("idOrganismo",organismo__usados);

				paqueteDeDatos.append("tipoPdf","documento__declaracion__seguimientos");

				$.ajax({

					type:"POST",
					url:"modelosBd/pdf/pdf.modelo.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){


    
					},
					error:function(){

					}
							
				});	

			}

		});

	}

	cehckeds__declaraciones($("#declaracionUso__seguimientos"));	
		
	
	/*=====  End of Checked declaracion  ======*/
	

});