
var asignandoValores__contrataciones=function(parametro1){

	$(parametro1).click(function(){

		let attr=$(this).attr('attr');

		let actividad=$(this).attr('actividad');

		$("#idItemCatalogo").val(attr);

		$("#idItemCatalogo__2").val(attr);


	});

}

var enlacesMatriz=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

	$(parametro1).click(function (e){

		var matrizD=$(this).attr('attr');

		var arrayMatrizD = matrizD.split(",");

		var idOrganismo=$(this).attr('idOrganismo');

		var idActividad=$(this).attr('idActividad');
					
		var paqueteDeDatos = new FormData();

		if (parametro6=="suministros") {

			paqueteDeDatos.append("tipo","suminitrosAEe");

		}else if(parametro6=="sueldos__salarios"){

			paqueteDeDatos.append("tipo","sueldosSalarios");

		}else if(parametro6=="honorarios__s"){

			paqueteDeDatos.append("tipo","honorarios");

		}else if(parametro6=="poa__actividadesDeportivas"){

			paqueteDeDatos.append("tipo","actividadesDepor");

		}else{

			paqueteDeDatos.append("tipo","matricez");

		}

		paqueteDeDatos.append('arrayMatrizD', JSON.stringify(arrayMatrizD));

		paqueteDeDatos.append('idOrganismo', idOrganismo);

		paqueteDeDatos.append('idActividad', idActividad);

		paqueteDeDatos.append('tipo2', parametro6);

		$("#actividadGeneral__id").val(idActividad);
		
		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				$.getScript("layout/scripts/js/validaGlobal.js",function(){

					var elementos=JSON.parse(response);

					var arrayInformacionSecond=elementos['arrayInformacion'];

					var idActividad=elementos['idActividad'];
					var idItem=elementos['idItem'];

					$("#actividad__determinantes").val(parametro5);

					if (parametro6=="actividad__administrativa") {

						var arrayAc_administrativas=elementos['arrayAc_administrativas'];

					}

					$(".th_enlaces"+parametro5).remove();
					$(".tr__enlaces"+parametro5).remove();


				/*=====================================
				=            Contruye head            =
				=====================================*/

				if (parametro6=="sueldos__salarios") {

					/*==============================================
					=            Añadiendo para regimen            =
					==============================================*/
							
					$("table").addClass('regimenValidas');
							
					/*=====  End of Añadiendo para regimen  ======*/


					var regimen=elementos['regimen'];


					$(".overflow__c__2").append('<table class="regimen__entendidos"><tr><td colspan="4" style="text:justify;">INSTRUCCIONES:- Registre el detalle de los rubros destinados a cubrir los salarios del personal administrativo y  de mantenimiento (ACTIVIDAD 001) y técnico (ACTIVIDAD 004) de la organización deportiva que se encuentren en relación de dependencia. - El valor total de esta matriz deberá coincidir con el monto total registrado en la hoja “POA” respecto de los ítems presupuestarios: 510106 “Salarios unificados”, 510203 “Decimotercer sueldo”, 510204 “Decimocuarto sueldo”, 510601 “Aporte patronal” y 510602 “Fondos de reserva”. La planificación del decimo cuarta remuneración en la región Sierra y Amazonia se realizara para el mes de agosto y en la región Costa  para el mes de marzo.NOTA: En esta hoja no se deberá incluir las obligaciones de las personas contratadas o por contratar con la modalidad de servicios profesionales.</td></tr><tr><td colspan="2" style="font-weight:bold;">REGIMEN ESCOLAR</td><td colspan="2"><select class="ancho__total__input regimenSuelDos" id="regimenSuelDos" idOrganismo="'+idOrganismo+'"><option value="">--Seleccione--</option><option value="Costa">Costa</option><option value="Sierra">Sierra</option><option value="Amazonia">Amazonia</option></select></td></tr></table>');

					regimenChange($(".regimenSuelDos"));

					for (clwo of regimen) {

						if (clwo.regimen!=null && clwo.regimen!="") {

							$(".regimenSuelDos").val(clwo.regimen);
							$(".regimenValidas").show();

						}else{

							$(".regimenValidas").hide();

						}
							

					}

				}

				if (parametro6!="poa__actividadesDeportivas") {

					
					for (var a=0;a<parametro2.length;a++) {
												   		
						$(".tablaHead"+parametro5).append('<th class="th_enlaces'+parametro5+' header" scope="col">'+parametro2[a]+'</th>');

					}

					if (parametro3!=false) {

						for (var b=0;b<parametro3.length;b++) {
													   		
							$(".tablaHead"+parametro5).append('<th class="th_enlaces'+parametro5+' header" scope="col">'+parametro3[b]+'</th>');

						}			

						$(".tablaHead"+parametro5).append('<th class="th_enlaces'+parametro5+' header" scope="col">'+parametro4+'</th>');

					}

					$(".tablaHead"+parametro5).append('<th class="th_enlaces'+parametro5+' header" scope="col">Guardar</th>');


				}

				/*=====  End of Contruye head h ======*/


				/*===================================================
				=            Creando elementos dinamicos            =
				===================================================*/
				
				switch (parametro6) {


					case "suministros":

						var sumadorSuministros=0;

						$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+sumadorSuministros+' tr__enlaces'+parametro5+'"><td><center><select class="tipoHoja'+sumadorSuministros+' ancho__total__input obligatorios'+sumadorSuministros+'" id="tipoHoja'+sumadorSuministros+'"><option value="">--Seleccione--</option><option value="Escenario deportivo/residencia para fomento deportivo">Escenario deportivo/residencia para fomento deportivo</option><option value="Administrativo">Administrativo</option></select></center></td><td><center><textarea class="nombreEscenarioD'+sumadorSuministros+' ancho__total__textareas obligatorios'+sumadorSuministros+'" id="nombreEscenarioD'+sumadorSuministros+'"></textarea></center></td><td><input type="text" class="suministroE'+sumadorSuministros+'  obligatorios'+sumadorSuministros+' ancho__total__input clase__suministros'+sumadorSuministros+'" attr="energia" value="0"/>&nbsp;&nbsp;<button class="agregarE'+sumadorSuministros+' btn btn-warning mt-2" style="position:relative; left:20%!important;">Agregar</button><div class="agregadosElec'+sumadorSuministros+'"></div></td><td><input type="text" class="suministroA'+sumadorSuministros+'  obligatorios'+sumadorSuministros+' ancho__total__input clase__suministros'+sumadorSuministros+'" attr="agua" value="0"/>&nbsp;&nbsp;<button class="agregarA'+sumadorSuministros+' btn btn-primary mt-2" style="position:relative; left:20%!important;">Agregar</button><div class="agregadosAg'+sumadorSuministros+'"></div></td></tr>');

						segmentosAnadidos($(".agregarE"+sumadorSuministros),$(".agregadosElec"+sumadorSuministros),"input",["obligatorios",sumadorSuministros,"energia","atadoEnergia"]);

						segmentosAnadidos($(".agregarA"+sumadorSuministros),$(".agregadosAg"+sumadorSuministros),"input",["obligatorios",sumadorSuministros,"agua","atadoGua"]);

						$('.item__Pre'+sumadorSuministros).append('<td><center style="display:flex;align-items:center;"><button class="agregarFilasS'+sumadorSuministros+' btn btn-info"><i class="fas fa-plus-circle"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="guardarMatriz'+sumadorSuministros+'" tipo="poaAdministrativo" idProgramacionFinanciera="'+sumadorSuministros+'" class="btn btn-primary mt-2" idOrganismo="'+idOrganismo+'" idActividad="'+idActividad+'" ><i class="fas fa-save"></i></button><div class="reload__'+sumadorSuministros+'"></div></center></td>');


						/*=========================================
						=            Creando segmentos            =
						=========================================*/

						// funcionSoloNumeros($(".clase__suministros"+sumadorSuministros));
						cambiantesNum($(".clase__suministros"+sumadorSuministros));
						
						segmentosSuministros($(".agregarFilasS"+sumadorSuministros),$(".cuerpoMatriz"+parametro5),[idOrganismo,idActividad]);
						
						/*=====  End of Creando segmentos  ======*/
						
						
						guardarElementosGeneral($("#guardarMatriz"+sumadorSuministros),sumadorSuministros,"suministrosAE",$(".reload__"+sumadorSuministros));

						/*=================================
						=            Actualiza            =
						=================================*/
						
						var obtenerInformacion=elementos['obtenerInformacion'];

						for (clw of obtenerInformacion) {

							$(".cuerpoMatriz"+parametro5).append('<tr class="item__PreEdit'+clw.idSumi+' tr__enlaces'+parametro5+'"><td><center>'+clw.tipo+'</center></td><td><center>'+clw.nombreEscenario+'</center></td><td class="filaLuzE'+clw.idSumi+'"></td><td class="filaAguaE'+clw.idSumi+'"></div></td><td><center><button class="eliminarFilaEdit'+clw.idSumi+' btn btn-danger" attr="'+clw.idSumi+'"><i class="fas fa-trash"></i></button></center></td></tr>');		
							
							var arrayEnergia = clw.energia.split("---");	

							for(var wEner=0; wEner<arrayEnergia.length;wEner++){

								if (arrayEnergia[wEner]!="N/A") {
									$(".filaLuzE"+clw.idSumi).append('<div class="center">'+arrayEnergia[wEner]+'</div>');
								}

							}	

							var arrayAgua = clw.agua.split("---");


							for(var wAgua=0; wAgua<arrayAgua.length;wAgua++){

								if (arrayAgua[wAgua]!="N/A") {
									$(".filaAguaE"+clw.idSumi).append('<div class="center">'+arrayAgua[wAgua]+'</div>');
								}

							}	

							eliminarEdit($(".eliminarFilaEdit"+clw.idSumi),$(".item__PreEdit"+clw.idSumi),"eliminaSuministros",clw.idSumi);

						}
						
						/*=====  End of Actualiza  ======*/

					break;

					case "sueldos__salarios":

						$(".unico__tablas_r").remove();
						$(".unico__tablas_r__2").remove();
						
						var sumadorSueldosSalarios=0;

						$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+sumadorSueldosSalarios+' tr__enlaces'+sumadorSueldosSalarios+'"><td><center><input type="text" class="cedulaP'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="cedulaP'+sumadorSueldosSalarios+'" style="width:150px!important;" value="vacante"/></center></td><td><center><input type="text" class="apellidosNom'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimesReal'+sumadorSueldosSalarios+'" id="apellidosNom'+sumadorSueldosSalarios+'" style="width:150px!important;" value="vacante"/></center></td><td><center><input type="text" class="cargo'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="cargo'+sumadorSueldosSalarios+'" style="width:150px!important;"/></center></td><td><center><select class="tipoCargo'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="tipoCargo'+sumadorSueldosSalarios+'" style="width:150px!important;"></select></center></td><td><center><input type="text" class="tiempoMeses'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimesReal'+sumadorSueldosSalarios+'" id="tiempoMeses'+sumadorSueldosSalarios+'" style="width:50px!important;" value="0"/></center></td><td><center><input type="text" class="sueldoMensual'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="sueldoMensual'+sumadorSueldosSalarios+'"/></center></td><td><center><input type="text" class="aporteIess'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" id="aporteIess'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="decimoTercera'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="decimoTercera'+sumadorSueldosSalarios+'"/></center></td><td><center><select class="mensualizaTercera'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="mensualizaTercera'+sumadorSueldosSalarios+'"><option value="">--Seleccione--</option><option value="si">Si</option><option value="no">No</option></select></center></td><td><center><input type="text" class="decimoCuarta'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="decimoCuarta'+sumadorSueldosSalarios+'"/></center></td><td><center><select class="mensualizaCuarta'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="mensualizaCuarta'+sumadorSueldosSalarios+'"><option value="">--Seleccione--</option><option value="si">Si</option><option value="no">No</option></select></center></td><td><center><input type="text" class="fondosDeReservas'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="fondosDeReservas'+sumadorSueldosSalarios+'"/></center></td><td><a class="btn btn-info pointer__botones compensacionB" data-toggle="modal" data-target="#compensacionDModal"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><a class="btn btn-info pointer__botones despidoB" data-toggle="modal" data-target="#compensacionDModal"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><a class="btn btn-info pointer__botones renunciaB" data-toggle="modal" data-target="#compensacionDModal"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><a class="btn btn-info pointer__botones vacacionesB" data-toggle="modal" data-target="#compensacionDModal"><i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>');		



							var desconpensacion__4=function(parametro1){

								$(parametro1).click(function(){

									$(".desaucio__tablas").hide();
									$(".despido__tablas").hide();
									$(".renuncia__tablas").hide();
									$(".vacacionesNoGo__tablas").show();

									$(".titulo__descompensacion").text("Compensación por Vacaciones no Gozadas por Cesación de Funciones");

								});

							}

							desconpensacion__4($(".vacacionesB"));

							var desconpensacion__3=function(parametro1){

								$(parametro1).click(function(){

									$(".desaucio__tablas").hide();
									$(".despido__tablas").hide();
									$(".renuncia__tablas").show();
									$(".vacacionesNoGo__tablas").hide();

									$(".titulo__descompensacion").text("Por Renuncia Voluntaria");

								});

							}

							desconpensacion__3($(".renunciaB"));

							var desconpensacion__2=function(parametro1){

								$(parametro1).click(function(){

									$(".desaucio__tablas").hide();
									$(".despido__tablas").show();
									$(".renuncia__tablas").hide();
									$(".vacacionesNoGo__tablas").hide();

									$(".titulo__descompensacion").text("Despido Intempestivo");

								});

							}

							desconpensacion__2($(".despidoB"));


							var desconpensacion__1=function(parametro1){

								$(parametro1).click(function(){

									$(".desaucio__tablas").show();
									$(".despido__tablas").hide();
									$(".renuncia__tablas").hide();
									$(".vacacionesNoGo__tablas").hide();

									$(".titulo__descompensacion").text("Compensación por Desahucio");

								});

							}

							desconpensacion__1($(".compensacionB"));


							/*===========================================
							=            Acciones realizadas            =
							===========================================*/
							
							consultaDinardap($(".cedulaP"+sumadorSueldosSalarios),[$(".apellidosNom"+sumadorSueldosSalarios)]);

							if (idActividad==1) {

								$(".tipoCargo"+sumadorSueldosSalarios).html('<option value="">--Seleccione--</option><option value="Administrativo">Administrativo</option><option value="Mantenimiento">Mantenimiento</option><option value="Mantenimiento de Escenarios deportivos">Mantenimiento de Escenarios deportivos</option><option value="Técnico">Técnico</option>');

							}else{

								$(".tipoCargo"+sumadorSueldosSalarios).html('<option value="">--Seleccione--</option><option value="Administrativo">Administrativo</option><option value="Mantenimiento">Mantenimiento</option><option value="Mantenimiento de Escenarios deportivos">Mantenimiento de Escenarios deportivos</option><option value="Técnico">Técnico</option>');

							}



							cambiantesNum($(".cambiador__unanimesReal"+sumadorSueldosSalarios));
							funcionSoloNumeros($(".cambiador__unanimesReal"+sumadorSueldosSalarios));

							solo__numero__montosEscritura($(".cambiador__unanimes"+sumadorSueldosSalarios));
							solo__numero__montos($(".cambiador__unanimes"+sumadorSueldosSalarios));
							cambiantesInputs($(".cambiador__unanimes"+sumadorSueldosSalarios));

							/*=====  End of Acciones realizadas  ======*/


						
						$('.item__Pre'+sumadorSueldosSalarios).append('<td><center><input type="text" class="enero'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="febrero'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="marzo'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="abril'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="mayo'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="junio'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="julio'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="agosto'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="septiembre'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="octubre'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="noviembre'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="diciembre'+sumadorSueldosSalarios+' ancho__total__input meses__atados'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="totalSumaItem'+sumadorSueldosSalarios+' ancho__total__input  meses__atadosAjax'+sumadorSueldosSalarios+'  meses__atadosAjax'+sumadorSueldosSalarios+'" value="0.00" /></center></td>');

							solo__numero__montosEscritura($(".meses__atadosAjax"+sumadorSueldosSalarios));
							solo__numero__montos($(".meses__atadosAjax"+sumadorSueldosSalarios));
							cambiantesInputs($(".meses__atadosAjax"+sumadorSueldosSalarios));


						$('.item__Pre'+sumadorSueldosSalarios).append('<td><center style="display:flex;align-items:center;"><button class="agregarSueldos'+sumadorSueldosSalarios+' btn btn-info"><i class="fas fa-plus-circle"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="guardarMatriz'+sumadorSueldosSalarios+'" tipo="poaAdministrativo" idProgramacionFinanciera="'+sumadorSueldosSalarios+'" class="btn btn-primary mt-2" idOrganismo="'+idOrganismo+'" idActividad="'+idActividad+'" ><i class="fas fa-save"></i></button><div class="reload__'+sumadorSueldosSalarios+'"></div></center></td>');


							/*================================
							=            Acciones            =
							================================*/
							
							calculaFomrulas($(".sueldoMensual"+sumadorSueldosSalarios),$(".tiempoMeses"+sumadorSueldosSalarios),[$(".aporteIess"+sumadorSueldosSalarios),$(".fondosDeReservas"+sumadorSueldosSalarios),$(".decimoTercera"+sumadorSueldosSalarios),$(".decimoCuarta"+sumadorSueldosSalarios)],$(".regimenSuelDos"),$(".mensualizaTercera"+sumadorSueldosSalarios),$(".mensualizaCuarta"+sumadorSueldosSalarios),sumadorSueldosSalarios);
							
							/*=====  End of Acciones  ======*/
							
							segmentosSueldosSalarios($(".agregarSueldos"+sumadorSueldosSalarios),$(".cuerpoMatriz"+parametro5),[idOrganismo,idActividad]);


						guardarElementosGeneral($("#guardarMatriz"+sumadorSueldosSalarios),sumadorSueldosSalarios,"sueldosSalarios",$(".reload__"+sumadorSueldosSalarios));



						/*=================================
						=            Actualiza            =
						=================================*/
						var obtenerInformacion=elementos['obtenerInformacion'];

						if (obtenerInformacion!=null && obtenerInformacion!=" " && obtenerInformacion!="" && obtenerInformacion!=undefined) {

							$("#tabla__sueldos__salarios__tablas").show();


							$(".sueldos__salarios__editados").append('<tr><th colspan="32" class="th_enlaces1 header" style="background-color: #37474f; color:white;">PERSONAL INGRESADO</th></tr>');

							$(".sueldos__salarios__editados").append('<tr><td><input type="text" id="marcador__psiciones" class="ancho__total__input marcador__psiciones" placeholder="Cédula a editar"/></td><td colspan="1" class="th_enlaces1 header"><a class="btn btn-primary obtner__registrosA">BUSCAR REGISTRO</a></td></tr>');

							$(".marcador__psiciones").on('input', function () {

								$("#planificados__ocultos").val($(this).val());

							});


							$(".obtner__registrosA").click(function(){

								var paqueteDeDatos__suel = new FormData();

								paqueteDeDatos__suel.append('idOrganismo', idOrganismo);

								paqueteDeDatos__suel.append('idActividad', idActividad);

								$(".sueldos__salarios__editados").append(" ");

								$(".eliminados__filas__d").remove();


								let marcador__psiciones=$("#planificados__ocultos").val();

								paqueteDeDatos__suel.append('tipo', 'sueldosSalarios__26');

								paqueteDeDatos__suel.append('marcador__psiciones', marcador__psiciones);
								
								$.ajax({

									type:"POST",
									url:"modelosBd/inserta/seleccionaAcciones.md.php",
									contentType: false,
									data:paqueteDeDatos__suel,
									processData: false,
									cache: false, 
									success:function(response){			

										var elementos=JSON.parse(response);					

										var obtenerInformacion=elementos['obtenerInformacion'];

										$(".sueldos__salarios__editados").append(" ");

										$(".eliminados__filas__d").remove();


										for (clw of obtenerInformacion) {

											$(".sueldos__salarios__editados").append('<tr class="item__PreEdit'+clw.idSueldos+' tr__enlaces'+parametro5+' eliminados__filas__d"><td><center><input type="text" class="input__act" value="'+clw.cedula+'" attrF="'+clw.idSueldos+'" attr="cedula"/></center></td><td><center><input type="text" class="input__act" value="'+clw.nombres+'" attrF="'+clw.idSueldos+'" attr="nombres"/></center></td><td><center><input type="text" class="input__act" value="'+clw.cargo+'" attrF="'+clw.idSueldos+'" attr="cargo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.tipoCargo+'" attrF="'+clw.idSueldos+'" attr="tipoCargo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.tiempoTrabajo+'" attrF="'+clw.idSueldos+'" attr="tiempoTrabajo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.sueldoSalario+'" attrF="'+clw.idSueldos+'" attr="sueldoSalario"/></center></td><td><center><input type="text" class="input__act" value="'+clw.aportePatronal+'" attrF="'+clw.idSueldos+'" attr="aportePatronal"/></center></td><td><center><input type="text" class="input__act" value="'+clw.decimoTercera+'" attrF="'+clw.idSueldos+'" attr="decimoTercera"/></center></td><td><center><input type="text" class="input__act" value="'+clw.mensualizaTercera+'" attrF="'+clw.idSueldos+'" attr="mensualizaTercera"/></center></td><td><center><input type="text" class="input__act" value="'+clw.decimoCuarta+'" attrF="'+clw.idSueldos+'" attr="decimoCuarta"/></center></td><td><center><input type="text" class="input__act" value="'+clw.menusalizaCuarta+'" attrF="'+clw.idSueldos+'" attr="menusalizaCuarta"/></center></td><td><center><input type="text" class="input__act" value="'+clw.fondosReserva+'" attrF="'+clw.idSueldos+'" attr="fondosReserva"/></center></td><td><a class="btn btn-info pointer__botones compensacionBEditar'+clw.idSueldos+'" data-toggle="modal" data-target="#compensacionDModalEditar"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><a class="btn btn-info pointer__botones despidoBEditar'+clw.idSueldos+'" data-toggle="modal" data-target="#compensacionDModalEditar"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><a class="btn btn-info pointer__botones renunciaBEditar'+clw.idSueldos+'" data-toggle="modal" data-target="#compensacionDModalEditar"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><a class="btn btn-info pointer__botones vacacionesBEditar'+clw.idSueldos+'" data-toggle="modal" data-target="#compensacionDModalEditar"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td><center><input type="text" class="input__act" value="'+clw.enero+'" attrF="'+clw.idSueldos+'" attr="enero"/></center></td><td><center><input type="text" class="input__act" value="'+clw.febrero+'" attrF="'+clw.idSueldos+'" attr="febrero"/></center></td><td><center><input type="text" class="input__act" value="'+clw.marzo+'" attrF="'+clw.idSueldos+'" attr="marzo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.abril+'" attrF="'+clw.idSueldos+'" attr="abril"/></center></td><td><center><input type="text" class="input__act" value="'+clw.mayo+'" attrF="'+clw.idSueldos+'" attr="mayo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.junio+'" attrF="'+clw.idSueldos+'" attr="junio"/></center></td><td><center><input type="text" class="input__act" value="'+clw.julio+'" attrF="'+clw.idSueldos+'" attr="julio"/></center></td><td><center><input type="text" class="input__act" value="'+clw.agosto+'" attrF="'+clw.idSueldos+'" attr="agosto"/></center></td><td><center><input type="text" class="input__act" value="'+clw.septiembre+'" attrF="'+clw.idSueldos+'" attr="septiembre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.octubre+'" attrF="'+clw.idSueldos+'" attr="octubre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.noviembre+'" attrF="'+clw.idSueldos+'" attr="noviembre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.diciembre+'" attrF="'+clw.idSueldos+'" attr="diciembre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.total+'" attrF="'+clw.idSueldos+'" attr="total"/></center></td><td><center><button class="eliminarFilaEdit'+clw.idSueldos+' btn btn-danger" attrF="'+clw.idSueldos+'" attr="'+clw.idSueldos+'"><i class="fas fa-trash"></i></button></center></td></tr>');	
											edicionesOnlines($(".input__act"),"poa_sueldossalarios2022","idSueldos");


											var desconpensacion__4=function(parametro1){

												$(parametro1).click(function(){

													$(".desaucio__tablasEditar").hide();
													$(".despido__tablasEditar").hide();
													$(".renuncia__tablasEditar").hide();
													$(".vacacionesNoGo__tablasEditar").show();

													$(".titulo__descompensacionEditar").text("Compensación por Vacaciones no Gozadas por Cesación de Funciones");

													var compensacion=elementos['compensacion'];

													let compensacionAlerta=0;

													if (compensacion!=null && compensacion!=undefined && compensacion!="" && compensacion!=" ") {

														compensacionAlerta=1;

														for(x of compensacion){

															$("#eneroVacacionesNoGEdita").val(x.enero);
															$("#febreroVacacionesNoGEdita").val(x.febreo);
															$("#marzoVacacionesNoGEdita").val(x.marzo);
															$("#abrilVacacionesNoGEdita").val(x.abril);
															$("#mayoVacacionesNoGEdita").val(x.mayo);
															$("#junioVacacionesNoGEdita").val(x.junio);
															$("#julioVacacionesNoGEdita").val(x.julio);
															$("#agostoVacacionesNoGEdita").val(x.agosto);
															$("#septiembreVacacionesNoGEdita").val(x.septiembre);
															$("#octubreVacacionesNoGEdita").val(x.octubre);
															$("#noviembreVacacionesNoGEdita").val(x.noviembre);
															$("#diciembreVacacionesNoGEdita").val(x.diciembre);
															$("#totalVacacionesNoEdita").val(x.total);

														}

														$("#idSueldosDE").val(x.idSueldos);
														$("#desvinculacionE").val(x.idDesvinculacion);
														$("#desvinculacionEOrganismo").val(x.idOrganismo);
														$("#identificadorDE").val(compensacionAlerta);


													}



												});

											}

											desconpensacion__4($(".vacacionesBEditar"+clw.idSueldos));

											var desconpensacion__3=function(parametro1){

												$(parametro1).click(function(){

													$(".desaucio__tablasEditar").hide();
													$(".despido__tablasEditar").hide();
													$(".renuncia__tablasEditar").show();
													$(".vacacionesNoGo__tablasEditar").hide();

													$(".titulo__descompensacionEditar").text("Por Renuncia Voluntaria");


													var renuncia=elementos['renuncia'];

													let renunciaAlerta=0;

													if (renuncia!=null && renuncia!=undefined && renuncia!="" && renuncia!=" ") {

														renunciaAlerta=1;

														for(x of renuncia){

															$("#eneroRenunciaVEdita").val(x.enero);
															$("#febreroRenunciaVEdita").val(x.febreo);
															$("#marzoRenunciaVEdita").val(x.marzo);
															$("#abrilRenunciaVEdita").val(x.abril);
															$("#mayoRenunciaVEdita").val(x.mayo);
															$("#junioRenunciaVEdita").val(x.junio);
															$("#julioRenunciaVEdita").val(x.julio);
															$("#agostoRenunciaVEdita").val(x.agosto);
															$("#septiembreRenunciaVEdita").val(x.septiembre);
															$("#octubreRenunciaVEdita").val(x.octubre);
															$("#noviembreRenunciaVEdita").val(x.noviembre);
															$("#diciembreRenunciaVEdita").val(x.diciembre);
															$("#totalRenunciaVoluntariaEdita").val(x.total);

														}

														$("#idSueldosDE").val(x.idSueldos);
														$("#desvinculacionE").val(x.idDesvinculacion);
														$("#desvinculacionEOrganismo").val(x.idOrganismo);
														$("#identificadorDE").val(renunciaAlerta);

													}


												});

											}

											desconpensacion__3($(".renunciaBEditar"+clw.idSueldos));

											var desconpensacion__2=function(parametro1){

												$(parametro1).click(function(){

													$(".desaucio__tablasEditar").hide();
													$(".despido__tablasEditar").show();
													$(".renuncia__tablasEditar").hide();
													$(".vacacionesNoGo__tablasEditar").hide();

													$(".titulo__descompensacionEditar").text("Despido Intempestivo");


													var despido=elementos['despido'];

													let despidoAlerta=0;

													if (despido!=null && despido!=undefined && despido!="" && despido!=" ") {

														despidoAlerta=1;

														for(x of despido){

															$("#eneroDespidoIEdita").val(x.enero);
															$("#febreroDespidoIEdita").val(x.febreo);
															$("#marzoDespidoIEdita").val(x.marzo);
															$("#abrilDespidoIEdita").val(x.abril);
															$("#mayoDespidoIEdita").val(x.mayo);
															$("#junioDespidoIEdita").val(x.junio);
															$("#julioDespidoIEdita").val(x.julio);
															$("#agostoDespidoIEdita").val(x.agosto);
															$("#septiembreDespidoIEdita").val(x.septiembre);
															$("#octubreDespidoIEdita").val(x.octubre);
															$("#noviembreDespidoIEdita").val(x.noviembre);
															$("#diciembreDespidoIEdita").val(x.diciembre);
															$("#totalDespidoIntepesEdita").val(x.total);

														}

														$("#idSueldosDE").val(x.idSueldos);
														$("#desvinculacionE").val(x.idDesvinculacion);
														$("#desvinculacionEOrganismo").val(x.idOrganismo);
														$("#identificadorDE").val(despidoAlerta);


													}


												});

											}

											desconpensacion__2($(".despidoBEditar"+clw.idSueldos));


											var desconpensacion__1=function(parametro1){

												$(parametro1).click(function(){

													$(".desaucio__tablasEditar").show();
													$(".despido__tablasEditar").hide();
													$(".renuncia__tablasEditar").hide();
													$(".vacacionesNoGo__tablasEditar").hide();

													$(".titulo__descompensacionEditar").text("Compensación por Desahucio");

													var desahucio=elementos['desahucio'];

													let desaucioAlerta=0;

													if (desahucio!=null && desahucio!=undefined && desahucio!="" && desahucio!=" ") {

														desaucioAlerta=1;

														for(x of desahucio){

															$("#eneroDesaucioEdita").val(x.enero);
															$("#febreroDesaucioEdita").val(x.febreo);
															$("#marzoDesaucioEdita").val(x.marzo);
															$("#abrilDesaucioEdita").val(x.abril);
															$("#mayoDesaucioEdita").val(x.mayo);
															$("#junioDesaucioEdita").val(x.junio);
															$("#julioDesaucioEdita").val(x.julio);
															$("#agostoDesaucioEdita").val(x.agosto);
															$("#septiembreDesaucioEdita").val(x.septiembre);
															$("#octubreDesaucioEdita").val(x.octubre);
															$("#noviembreDesaucioEdita").val(x.noviembre);
															$("#diciembreDesaucioEdita").val(x.diciembre);
															$("#totalDesaucioEdita").val(x.total);

														}

														$("#idSueldosDE").val(x.idSueldos);
														$("#desvinculacionE").val(x.idDesvinculacion);
														$("#desvinculacionEOrganismo").val(x.idOrganismo);
														$("#identificadorDE").val(desaucioAlerta);

													}

													guardar__desvinculacionesEditadas($("#editarDesaucios"),[$("#idSueldosDE").val(),$("#desvinculacionE").val(),$("#desvinculacionEOrganismo").val(),$("#identificadorDE").val(),'desahucio',$("#eneroDesaucioEdita").val(),$("#febreroDesaucioEdita").val(),$("#marzoDesaucioEdita").val(),$("#abrilDesaucioEdita").val(),$("#mayoDesaucioEdita").val(),$("#junioDesaucioEdita").val(),$("#julioDesaucioEdita").val(),$("#agostoDesaucioEdita").val(),$("#septiembreDesaucioEdita").val(),$("#octubreDesaucioEdita").val(),$("#noviembreDesaucioEdita").val(),$("#diciembreDesaucioEdita").val(),$("#totalDesaucioEdita").val()]);

												});

											}

											desconpensacion__1($(".compensacionBEditar"+clw.idSueldos));											
					
											eliminarEdit($(".eliminarFilaEdit"+clw.idSueldos),$(".item__PreEdit"+clw.idSueldos),"eliminaSueldos",clw.idSueldos,false,idActividad);

										}

								    },
								    error:function(){
								    	
								    } 

								});


							});

							$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

								$(".encontrar__tablas").html(" ");


								$(".encontrar__tablas").append("<table class='col col-12 mt-4 cell-border table table-striped tabla__sueldos__salarios__tablas' id='tabla__sueldos__salarios__tablas'><thead><tr><th class='bg-warning'><center>Cédula</center></th><th class='bg-warning'><center>Nombre</center></th><th class='bg-warning'><center>Cargo</center></th><th class='bg-warning'><center>Tipo cargo</center></th><th class='bg-warning'><center>Tiempo trabajo</center></th><th class='bg-warning'><center>Sueldo salario</center></th><th class='bg-warning'><center>Aporte patronal iess</center></th><th class='bg-warning'><center>Decimo tercero</center></th><th class='bg-warning'><center>Mensualiza décimo tercero</center></th><th class='bg-warning'><center>Décimo cuarto</center></th><th class='bg-warning'><center>Mensualiza décimo cuarto</center></th><th class='bg-warning'><center>Fondos de reserva</center></th><th class='bg-warning'><center>Enero</center></th><th class='bg-warning'><center>Febrero</center></th><th class='bg-warning'><center>Marzo</center></th><th class='bg-warning'><center>Abril</center></th><th class='bg-warning'><center>Mayo</center></th><th class='bg-warning'><center>Junio</center></th><th class='bg-warning'><center>Julio</center></th><th class='bg-warning'><center>Agosto</center></th><th class='bg-warning'><center>Septiembre</center></th><th class='bg-warning'><center>Octubre</center></th><th class='bg-warning'><center>Noviembre</center></th><th class='bg-warning'><center>Diciembre</center></th><th class='bg-warning'><center>Total</center></th></tr></thead></table>");

								datatablets($(".tabla__sueldos__salarios__tablas"),"tabla__sueldos__salarios__tablas",[idOrganismo],false,false,false,false,false,false);


							});


						}
						
						/*=====  End of Actualiza  ======*/

						
					break;

					case "honorarios__s":


						var sumadorHonorarios=0;


						$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+sumadorHonorarios+' tr__enlaces'+sumadorHonorarios+'"><td><center><input type="text" class="cedulaP'+sumadorHonorarios+' ancho__total__input obligatorios'+sumadorHonorarios+'" id="cedulaP'+sumadorHonorarios+'" style="width:150px!important;" value="vacante"/></center></td><td><center><input type="text" class="apellidosNom'+sumadorHonorarios+' ancho__total__input obligatorios'+sumadorHonorarios+'" id="apellidosNom'+sumadorHonorarios+'" style="width:150px!important;" value="vacante"/></center></td><td><center><input type="text" class="cargo'+sumadorHonorarios+' ancho__total__input obligatorios'+sumadorHonorarios+'" id="cargo'+sumadorHonorarios+'" style="width:150px!important;"/></center></td><td><center><select class="tipoCargo'+sumadorHonorarios+' ancho__total__input obligatorios'+sumadorHonorarios+'" id="tipoCargo'+sumadorHonorarios+'" style="width:150px!important;"></select></center></td><td><center><input type="text" class="honorarioMensual'+sumadorHonorarios+' ancho__total__input obligatorios'+sumadorHonorarios+' cambiador__unanimes'+sumadorHonorarios+'" value="0.00" id="honorarioMensual'+sumadorHonorarios+'" style="width:150px!important;"/></center></td></tr>');		

							/*===========================================
							=            Acciones realizadas            =
							===========================================*/
							
							consultaDinardap($(".cedulaP"+sumadorHonorarios),[$(".apellidosNom"+sumadorHonorarios)]);

							if (idActividad==1) {

								$(".tipoCargo"+sumadorHonorarios).append('<option value="Administrativo">Administrativo</option>');
								$(".tipoCargo"+sumadorHonorarios).append('<option value="Técnico">Técnico</option>');

							}else{

								$(".tipoCargo"+sumadorHonorarios).append('<option value="Técnico">Técnico</option>');
								$(".tipoCargo"+sumadorHonorarios).append('<option value="Administrativo">Administrativo</option>');

							}



							cambiantesNum($(".cambiador__unanimesReal"+sumadorHonorarios));
							funcionSoloNumeros($(".cambiador__unanimesReal"+sumadorHonorarios));

							solo__numero__montosEscritura($(".cambiador__unanimes"+sumadorHonorarios));
							solo__numero__montos($(".cambiador__unanimes"+sumadorHonorarios));
							cambiantesInputs($(".cambiador__unanimes"+sumadorHonorarios));

							/*=====  End of Acciones realizadas  ======*/


						
						$('.item__Pre'+sumadorHonorarios).append('<td><center><input type="text" class="enero'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="febrero'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="marzo'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="abril'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="mayo'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="junio'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="julio'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="agosto'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="septiembre'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="octubre'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="noviembre'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="diciembre'+sumadorHonorarios+' ancho__total__input meses__atados'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00"/></center></td><td><center><input type="text" class="totalSumaItem'+sumadorHonorarios+' ancho__total__input  meses__atadosAjax'+sumadorHonorarios+'  meses__atadosAjax'+sumadorHonorarios+'" value="0.00" /></center></td>');

							solo__numero__montosEscritura($(".meses__atadosAjax"+sumadorHonorarios));
							solo__numero__montos($(".meses__atadosAjax"+sumadorHonorarios));
							cambiantesInputs($(".meses__atadosAjax"+sumadorHonorarios));

						sumarIndicadoresGlobal($(".meses__atados"+sumadorHonorarios),$(".totalSumaItem"+sumadorHonorarios));


						$('.item__Pre'+sumadorHonorarios).append('<td><center style="display:flex;align-items:center;"><button class="agregarHonorarios'+sumadorHonorarios+' btn btn-info"><i class="fas fa-plus-circle"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="guardarMatriz'+sumadorHonorarios+'" tipo="poaAdministrativo" idProgramacionFinanciera="'+sumadorHonorarios+'" class="btn btn-primary mt-2" idOrganismo="'+idOrganismo+'" idActividad="'+idActividad+'" ><i class="fas fa-save"></i></button><div class="reload__'+sumadorHonorarios+'"></div></center></td>');

						guardarElementosGeneral($("#guardarMatriz"+sumadorHonorarios),sumadorHonorarios,"honorarios",$(".reload__"+sumadorHonorarios));


						segmentosHonorarios($(".agregarHonorarios"+sumadorHonorarios),$(".cuerpoMatriz"+parametro5),[idOrganismo,idActividad]);

						/*=================================
						=            Actualiza            =
						=================================*/
						
						var obtenerInformacion=elementos['obtenerInformacion'];

						for (clw of obtenerInformacion) {

							$(".cuerpoMatriz"+parametro5).append('<tr class="item__PreEdit'+clw.idHonorarios+' tr__enlaces'+parametro5+'"><td><center><input type="text" value="'+clw.cedula+'" class="input__act" attr="cedula" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.nombres+'" class="input__act" attr="nombres" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.cargo+'" class="input__act" attr="cargo" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.tipoCargo+'" class="input__act" attr="tipoCargo" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.honorarioMensual+'" class="input__act" attr="honorarioMensual" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.enero+'" class="input__act" attr="enero" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.febrero+'" class="input__act" attr="febrero" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.marzo+'" class="input__act" attr="marzo" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.abril+'" class="input__act" attr="abril" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.mayo+'" class="input__act" attr="mayo" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.junio+'" class="input__act" attr="junio" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.julio+'" class="input__act" attr="julio" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.agosto+'" class="input__act" attr="agosto" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.septiembre+'" class="input__act" attr="septiembre" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.octubre+'" class="input__act" attr="octubre" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.noviembre+'" class="input__act" attr="noviembre" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.diciembre+'" class="input__act" attr="diciembre" attrF="'+clw.idHonorarios+'" ></center></td><td><center><input type="text" value="'+clw.total+'" class="input__act" attr="total" attrF="'+clw.idHonorarios+'" ></center></td><td><center><button class="eliminarFilaEdit'+clw.idHonorarios+' btn btn-danger" attr="'+clw.idHonorarios+'"><i class="fas fa-trash"></i></button></center></td></tr>');	

							edicionesOnlines($(".input__act"),"poa_honorarios2022","idHonorarios");	
							

							eliminarEdit($(".eliminarFilaEdit"+clw.idHonorarios),$(".item__PreEdit"+clw.idHonorarios),"eliminarHonorarios",clw.idHonorarios,false,idActividad);

						}
						
						/*=====  End of Actualizad  ======*/



					break;

					case "poa__mantenimiento":

						let obtenerInformacion__2=elementos['obtenerInformacion__2'];
						let obtenerInformacion__mantenimientos=elementos['obtenerInformacion__mantenimientos'];

						$(".cuerpoMatriz2").append('<tr class="item__Pre tr__enlaces"><td><center><textarea class="nombreEscenario ancho__total__textareas obligatorios" id="nombreEscenario"></textarea></center></td><td><center><select class="provinciaE ancho__total__input__selects obligatorios" id="provinciaE"></select></center></td><td><center><textarea class="direccionCompleta ancho__total__textareas obligatorios" id="direccionCompleta"></textarea></center></td><td><center><select class="estadoM ancho__total__input__selects obligatorios" id="estadoM"><option value="">--Seleccione--</option><option value="propia">Propia</option><option value="ministerioDeporte">Del ministerio del deporte</option></select></center></td><td><center><select class="tipoRecuersos ancho__total__input__selects obligatorios" id="tipoRecuersos"><option value="">--Seleccione--</option><option value="recursosPublicos">Recursos públicos</option><option value="autogestion">Recursos de autogestión</option><option value="otras">Otras fuentes de financiamiento</option></select></center></td><td><center><select class="tipoInversion ancho__total__input__selects obligatorios" id="tipoInversion"><option value="gastosMantenimiento">Gastos por mantenimiento de insfraestructura</option><option value="Gastos de rehabilitacion">Gastos de rehabilitación</option></select></center></td><td><center><select class="tipoIntervencion ancho__total__input__selects obligatorios" id="tipoIntervencion"><option value="">--Seleccione--</option><option value="fachadasExteriores">Fachadas exteriores</option><option value="interiores">Interiores</option><option value="cubiertas">Cubiertas</option><option value="pisosInteriores">Pisos interiores</option><option value="pisosExteriores">Pisos exteriores</option><option value="pisicinas">Piscinas</option><option value="isntalacionesHi">Instalaciones Hidrosanitarias de las edificaciones deportivas</option><option value="sistemaElectrico">Sistema Eléctrico</option><option value="sistemaMecanico">Sistema Mecanico</option></select></center></td><td><center><select class="tipoMantenimiento ancho__total__input__selects obligatorios" id="tipoMantenimiento"><option value="">--Seleccione--</option><option value="preventivo">Preventivo</option><option value="correctivo">Correctivo</option></select></center></td><td><center><textarea class="materialesServicios ancho__total__textareas obligatorios" id="materialesServicios"></textarea></center></td><td><center><input type="date" class="fecha__ultimo ancho__total__textareas obligatorios ancho__total__input" id="fecha__ultimo" /></center></td><td><button id="guardarMatriz" tipo="poaAdministrativo" class="btn btn-primary mt-2"><i class="fas fa-save"></i></button><div class="reload"></div></center></td></tr>');

						provincias($(".provinciaE"));


						if (obtenerInformacion__2=="0" || obtenerInformacion__2==0) {

							$(".mantenimientos__necesarios__1").append("<tr  class='fila__automatica__selecciones'><td coslpan='1'><select id='selector__enviador__items' class='ancho__total__input__selects obligatorios selector__enviador__items'><option value='0'>--Seleccione una opción--</option></select></td><td class='finalizar__finalizados'><a class='btn btn-primary finalizar__total'>FINALIZAR</a></td></tr>");

							for(x of obtenerInformacion__mantenimientos){


								$(".nombreEscenario").val(x.nombreInfras);
								$(".direccionCompleta").val(x.direccionCompleta);
								$(".estadoM").val(x.estado);
								$(".tipoRecuersos").val(x.tipoRecursos);
								$(".tipoInversion").val(x.tipoIntervencion);
								$(".tipoIntervencion").val(x.detallarTipoIn);
								$(".tipoMantenimiento").val(x.tipoMantenimiento);
								$(".materialesServicios").val(x.materialesServicios);
								$(".fecha__ultimo").val(x.fechaUltimo);

								provincias($(".provinciaE"),x.provincia);

								$("#guardarMatriz").hide();

							}

						}else{

							$(".mantenimientos__necesarios__1").append("<tr style='display:none;' class='fila__automatica__selecciones'><td coslpan='1'><select id='selector__enviador__items' class='ancho__total__input__selects obligatorios selector__enviador__items'><option value='0'>--Seleccione una opción--</option></select></td><td class='finalizar__finalizados' style='display:none!important;'><a class='btn btn-primary finalizar__total'>FINALIZAR</a></td></tr>");

						}


						for(let w=0; w<arrayInformacionSecond.length;w++){

							for (c of arrayInformacionSecond[w]) {

								$(".selector__enviador__items").append("<option value='"+c.idItem+"__"+c.nombreItem+"' attr='"+c.nombreItem+"'>"+c.nombreItem+" ("+c.itemPreesupuestario+")"+"</option>")

							}

						}


						$(".finalizar__finalizados").on('click', function () {

							let paqueteDeDatos = new FormData();

							paqueteDeDatos.append('tipo','finalizar__mantenimientos__elegidos');

							let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();	

							paqueteDeDatos.append('idOrganismoPrincipal',idOrganismoPrincipal);

							$.ajax({

								type:"POST",
								url:"modelosBd/inserta/insertaAcciones.md.php",
								contentType: false,
								data:paqueteDeDatos,
								processData: false,
								cache: false,  
								success:function(response){

							      	$("#nombreEscenario").val(" ");
							      	$("#provinciaE").val(" ");
							      	$("#direccionCompleta").val(" ");
							      	$("#estadoM").val(" ");
							      	$("#tipoRecuersos").val(" ");
							      	$("#tipoInversion").val(" ");
							      	$("#tipoIntervencion").val(" ");
							      	$("#tipoMantenimiento").val(" ");
							      	$("#materialesServicios").val(" ");
							      	$("#fecha__ultimo").val(" ");

							      	$(".enero").val("0");
							      	$(".febrero").val("0");
							      	$(".marzo").val("0");
							      	$(".abril").val("0");
							      	$(".mayo").val("0");
							      	$(".junio").val("0");
							      	$(".julio").val("0");
							      	$(".agosto").val("0");
							      	$(".septiembre").val("0");
							      	$(".octubre").val("0");
							      	$(".noviembre").val("0");
							      	$(".diciembre").val("0");
							      	$(".totalSumaItem").val("0");

									alertify.set("notifier","position", "top-center");
									alertify.notify("Se realizó el registro de la infraestructura satisfactoriamente", "success", 5, function(){});
													
									$("#guardarMatriz").show();

									$(".fila__automatica__selecciones").remove();


								 },
								 error:function(){
								    	
								 } 

							});

						});


						var cambios__mantenimientos=function(parametro1){

							$(parametro1).change(function(e){

								let idItem=$(this).val();

								let arrayItems=idItem.split("__");

								if ($(this).val()=="0") {

									alertify.set("notifier","position", "top-center");
									alertify.notify("Se debe escoger un Ítem presupuestario", "error", 4, function(){});	

									$(parametro1).val(0);							

								}else{

									$(".mantenimientos__necesarios__1").append('<tr class="filas__man'+arrayItems[0]+'"><td>Ítem</td><td>Enero</td><td>Febero</td><td>Marzo</td><td>Abril</td><td>Mayo</td><td>Junio</td><td>Julio</td><td>Agosto</td><td>Septiembre</td><td>Octubre</td><td>Noviembre</td><td>Diciembre</td><td>Total</td><td>Guardar</td><td>Eliminar</td></tr><tr class="filas__man'+arrayItems[0]+'"><td>'+arrayItems[1]+'<input type="hidden" id="item__'+arrayItems[0]+'" name="item__'+arrayItems[0]+'" class="item__'+arrayItems[0]+'" value="'+arrayItems[0]+'"/></td><td><center><input type="text" id="enero'+arrayItems[0]+'" class="enero'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="enero__2'+arrayItems[0]+'" class="enero__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="febrero'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0" /><input type="hidden" id="febrero__2'+arrayItems[0]+'" class="febrero__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="marzo'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0" /><input type="hidden" id="marzo__2'+arrayItems[0]+'" class="marzo__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="abril'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="abril__2'+arrayItems[0]+'" class="abril__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="mayo'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0" /><input type="hidden" id="mayo__2'+arrayItems[0]+'" class="mayo__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="junio'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="junio__2'+arrayItems[0]+'" class="junio__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="julio'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0" /><input type="hidden" id="julio__2'+arrayItems[0]+'" class="julio__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="agosto'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="agosto__2'+arrayItems[0]+'" class="agosto__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="septiembre'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0" /><input type="hidden" id="septiembre__2'+arrayItems[0]+'" class="septiembre__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="octubre'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="octubre__2'+arrayItems[0]+'" class="octubre__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="noviembre'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="noviembre__2'+arrayItems[0]+'" class="noviembre__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="diciembre'+arrayItems[0]+' ancho__total__input meses__atados'+arrayItems[0]+'  meses__atadosAjax" value="0"/><input type="hidden" id="diciembre__2'+arrayItems[0]+'" class="diciembre__2'+arrayItems[0]+' ancho__total__input" value="0"/></center></td><td><center><input type="text" class="totalSumaItem'+arrayItems[0]+' ancho__total__input meses__atadosAjax" readonly="readonly" value="0"/></center></td><td><a id="guardarMatriz__m'+arrayItems[0]+'" class="guardarMatriz__m'+arrayItems[0]+' btn btn-primary mt-2" idContador="'+arrayItems[0]+'"><i class="fas fa-save"></i></a></td><td><a class="btn btn-danger eliminar__'+arrayItems[0]+'" id="eliminar__'+arrayItems[0]+'" idContador="'+arrayItems[0]+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');


										cambiantesInputs($(".meses__atados"+arrayItems[0]));
										solo__numero__montosEscritura($(".meses__atados"+arrayItems[0]));
										solo__numero__montos($(".meses__atados"+arrayItems[0]));
										
										sumarIndicadoresGlobal($(".meses__atados"+arrayItems[0]),$(".totalSumaItem"+arrayItems[0]));



										$(".eliminar__"+arrayItems[0]).on('click', function () {

											let idContador=$(this).attr('idContador');

											$(".filas__man"+idContador).remove();										
												

										});

										var input__modales=function(parametro1,parametro2){

											$(parametro1).on('input', function () {

												$(parametro2).val($(this).val());

											});

										}

										input__modales($(".enero"+arrayItems[0]),$(".enero__2"+arrayItems[0]));
										input__modales($(".febrero"+arrayItems[0]),$(".febrero__2"+arrayItems[0]));
										input__modales($(".marzo"+arrayItems[0]),$(".marzo__2"+arrayItems[0]));
										input__modales($(".abril"+arrayItems[0]),$(".abril__2"+arrayItems[0]));
										input__modales($(".mayo"+arrayItems[0]),$(".mayo__2"+arrayItems[0]));
										input__modales($(".junio"+arrayItems[0]),$(".junio__2"+arrayItems[0]));
										input__modales($(".julio"+arrayItems[0]),$(".julio__2"+arrayItems[0]));
										input__modales($(".agosto"+arrayItems[0]),$(".agosto__2"+arrayItems[0]));
										input__modales($(".septiembre"+arrayItems[0]),$(".septiembre__2"+arrayItems[0]));
										input__modales($(".octubre"+arrayItems[0]),$(".octubre__2"+arrayItems[0]));
										input__modales($(".noviembre"+arrayItems[0]),$(".noviembre__2"+arrayItems[0]));
										input__modales($(".diciembre"+arrayItems[0]),$(".diciembre__2"+arrayItems[0]));

										$(".guardarMatriz__m"+arrayItems[0]).on('click', function () {

											var paqueteDeDatos = new FormData();

											paqueteDeDatos.append('tipo','insertar__mantenimiento__unitarios');		


											let idContador=$(this).attr('idContador');

											let item=$(".item__"+idContador).val();			
											let enero=$(".enero__2"+idContador).val();		
											let febrero=$(".febrero__2"+idContador).val();		
											let marzo=$(".marzo__2"+idContador).val();		
											let abril=$(".abril__2"+idContador).val();		
											let mayo=$(".mayo__2"+idContador).val();		
											let junio=$(".junio__2"+idContador).val();						
											let julio=$(".julio__2"+idContador).val();		
											let agosto=$(".agosto__2"+idContador).val();		
											let septiembre=$(".septiembre__2"+idContador).val();		
											let octubre=$(".octubre__2"+idContador).val();		
											let noviembre=$(".noviembre__2"+idContador).val();		
											let diciembre=$(".diciembre__2"+idContador).val();		
											let totalSumaItem=$(".totalSumaItem"+idContador).val();		
											let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();	

											paqueteDeDatos.append("item",item);
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
											paqueteDeDatos.append("totalSumaItem",totalSumaItem);
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

											   		alertify.set("notifier","position", "top-center");
													alertify.notify("Registro realizado correctamente", "success", 5, function(){});

													$(".filas__man"+idContador).remove();	

													$(".finalizar__finalizados").removeAttr('style');


												},
												error:function(){

												}
													
											});	


										});


										$(parametro1).val(0);	


								}

							});

						}

						cambios__mantenimientos($(".selector__enviador__items"));



						$(".mantenimientos__necesarios").append("<tr><td colspan='1'><center><a class='btn btn-warning visualizar__totales__mantenimientos' id='visualizar__totales__mantenimientos' attr='1'>Ver&nbsp;&nbsp;<i class='fa fa-eye eyes__cambiantes' aria-hidden='true'></i></a></center></td></tr>");


						$(".visualizar__totales__mantenimientos").on('click', function () {

							if ($(this).attr('attr')=="1") {

								$(".eyes__cambiantes").removeClass('fa');
								$(".eyes__cambiantes").removeClass('fa-eye');

								$(".eyes__cambiantes").addClass('fa');
								$(".eyes__cambiantes").addClass('fa-eye-slash');

								$(this).removeAttr('attr');
								$(this).attr('attr','2');


								var paqueteDeDatos = new FormData();

								paqueteDeDatos.append('tipo','mantenimiento__id__enviados');

								paqueteDeDatos.append('idOrganismo',idOrganismo);

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

										let cuentas=0;

										for (x of informacion__obtenidas) {  

											cuentas++;

											if (cuentas==1 || cuentas==10 || cuentas==20 || cuentas==30 || cuentas==40 || cuentas==50 || cuentas==60) {


												$(".mantenimientos__necesarios__2").append("<tr class='filas__editables__"+x.idMantenimiento+"'><td class='bg-warning'>Ítem</td><td class='bg-warning'>Nombre de la infraestructura o escenario deportivo</td><td class='bg-warning'>Provincia</td><td class='bg-warning'>Dirección completa</td><td class='bg-warning'>Estado</td><td class='bg-warning'>Tipo de recursos con los que se construyó</td><td class='bg-warning'>Tipo de Intervención</td><td class='bg-warning'>Detallar el tipo de intervención que se ha planificado realizar</td><td class='bg-warning'>Tipo de Mantenimiento</td><td class='bg-warning'>Materiales o Servicios a requerir para el mantenimiento</td><td class='bg-warning'>Fecha de últipo mantenimiento realizado</td><td class='bg-warning'>Enero</td><td class='bg-warning'>Febero</td><td class='bg-warning'>Marzo</td><td class='bg-warning'>Abril</td><td class='bg-warning'>Mayo</td><td class='bg-warning'>Junio</td><td class='bg-warning'>Julio</td><td class='bg-warning'>Agosto</td><td class='bg-warning'>Septiembre</td><td class='bg-warning'>Octubre</td><td class='bg-warning'>Noviembre</td><td class='bg-warning'>Diciembre</td><td class='bg-warning'>Total</td><td class='bg-warning'>Eliminar</td></tr>");

											}

											if (x.eneroP!=null && x.eneroP!=" " && x.eneroP!="" && x.eneroP!=undefined) {

												$(".mantenimientos__necesarios__2").append("<tr class='filas__editables__"+x.idMantenimiento+"'><td>"+x.nombreItem+"</td><td>"+x.nombreInfras+"</td><td>"+x.nombreProvincia+"</td><td>"+x.direccionCompleta+"</td><td>"+x.estado+"</td><td>"+x.tipoRecursos+"</td><td>"+x.tipoIntervencion+"</td><td>"+x.detallarTipoIn+"</td><td>"+x.tipoMantenimiento+"</td><td>"+x.materialesServicios+"</td><td>"+x.fechaUltimo+"</td><td>"+x.eneroP+"</td><td>"+x.febreroP+"</td><td>"+x.marzoP+"</td><td>"+x.abrilP+"</td><td>"+x.mayoP+"</td><td>"+x.junioP+"</td><td>"+x.julioP+"</td><td>"+x.agostoP+"</td><td>"+x.septiembreP+"</td><td>"+x.octubreP+"</td><td>"+x.noviembreP+"</td><td>"+x.diciembreP+"</td><td>"+x.totalP+"</td><td><a class='btn btn-danger eliminar__"+x.idMantenimiento+"' id='eliminar__"+x.idMantenimiento+"' idContador='"+x.idMantenimiento+"'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>");

											}else{
												$(".mantenimientos__necesarios__2").append("<tr class='filas__editables__"+x.idMantenimiento+"'><td>"+x.nombreItem+"</td><td>"+x.nombreInfras+"</td><td>"+x.nombreProvincia+"</td><td>"+x.direccionCompleta+"</td><td>"+x.estado+"</td><td>"+x.tipoRecursos+"</td><td>"+x.tipoIntervencion+"</td><td>"+x.detallarTipoIn+"</td><td>"+x.tipoMantenimiento+"</td><td>"+x.materialesServicios+"</td><td>"+x.fechaUltimo+"</td><td>"+x.enero+"</td><td>"+x.febrero+"</td><td>"+x.marzo+"</td><td>"+x.abril+"</td><td>"+x.mayo+"</td><td>"+x.junio+"</td><td>"+x.julio+"</td><td>"+x.agosto+"</td><td>"+x.septiembre+"</td><td>"+x.octubre+"</td><td>"+x.noviembre+"</td><td>"+x.diciembre+"</td><td>"+x.totalTotales+"</td><td><a class='btn btn-danger eliminar__"+x.idMantenimiento+"' id='eliminar__"+x.idMantenimiento+"' idContador='"+x.idMantenimiento+"'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>");
											}

											

											$(".eliminar__"+x.idMantenimiento).on('click', function () {

												let idContador=$(this).attr('idContador');

												let paqueteDeDatos = new FormData();

												paqueteDeDatos.append('tipo',"eliminantes__mant__tenimientos");
												paqueteDeDatos.append('idMantenimiento',idContador);

												$.ajax({

													type:"POST",
													url:"modelosBd/inserta/eliminaAcciones.md.php",
													contentType: false,
													data:paqueteDeDatos,
													processData: false,
													cache: false,  
													success:function(response){


														alertify.set("notifier","position", "top-center");
														alertify.notify("Registro eliminado", "success", 4, function(){});	


														$(".filas__editables__"+idContador).remove();

												    },
												    error:function(){
												    	
												    } 

												});												
												

											});


										}


								    },
								    error:function(){
								    	
								    } 

								});

							}else{



								$(".eyes__cambiantes").removeClass('fa');
								$(".eyes__cambiantes").removeClass('fa-eye-slash');

								$(".eyes__cambiantes").addClass('fa');
								$(".eyes__cambiantes").addClass('fa-eye');

								$(this).attr('attr','1');

								$(".mantenimientos__necesarios__2").html(" ");


							}

						});



					break;

				}

				// ocultar__enPreliminar($("#envioPreliminar"));
				
				/*=====  End of Creando elementos dinamicos  ======*/
				
				for(var w=0; w<arrayInformacionSecond.length;w++){

					for (c of arrayInformacionSecond[w]) {
													   	
				  		switch (parametro6) {


				  			case "actividad__administrativa":


								$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+c.idProgramacionFinanciera+' tr__enlaces'+parametro5+'"><td><center>'+c.itemPreesupuestario+'</center></td><td><center>'+c.nombreItem+'</center></td><td><center><textarea class="justificacionAdquisi'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="justificacionAdquisi'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><input type="text" class="cantidadBien__servicios'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="cantidadBien__servicios'+c.idProgramacionFinanciera+'"/></center></td><td><center><a class="btn btn-primary tipoContratacion__Guardar'+c.idItem+'" data-bs-toggle="modal" data-bs-target="#contrataciones__variables" id="tipoContratacion__Guardar" attr="'+c.idItem+'">Contratación</a></center></td></tr>');

								asignandoValores__contrataciones($(".tipoContratacion__Guardar"+c.idItem));

								tipo__contratacion__encargada($(".tipoContratacion__Guardar"+c.idItem),idOrganismo,$(".tipoContratacion__Guardar"+c.idItem).attr('attr'),"");

								funcionSoloNumeros($(".cantidadBien__servicios"+c.idProgramacionFinanciera));

								if (c.justificacionBien!=null && c.justificacionBien!="") {

									$("#justificacionAdquisi"+c.idProgramacionFinanciera).val(c.justificacionBien);
									$("#cantidadBien__servicios"+c.idProgramacionFinanciera).val(c.cantidadBien);

								}


				  			break;



				  			case "poa__actividadesDeportivas":

				  				$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

									datatablets($("#tabla__eventos__ingresados"),"tabla__eventos__ingresados",[$("#idOrganismoPrincipal").val(),idActividad],objetos([1,2],["boton","boton","boton"],["<center><button class='asignar__boton__paid estilo__botonDatatablets btn btn-warning pointer__botones' data-toggle='modal' data-target='#modalEventos__editados'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;Ver</button><center>","<center><button class='asignar__boton__paid__2 estilo__botonDatatablets btn btn-warning pointer__botones' data-toggle='modal' data-target='#modalEventos__editados__2'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;Ver</button><center>"],[false],[false]),1,["funcionObtenerOrganismos__eventos__organismos","funcionObtenerOrganismos__eventos__organismos__2"],[false],[false],false);


				  				});

				  				$(".eliminar__en__etapas__b").remove();

				  				let envio__informaciones=elementos['envio__informaciones'];

				  				for(var w=0; w<arrayInformacionSecond.length;w++){

					  				for(x of arrayInformacionSecond[w]){

					  					let $option = $('<option />', {
											text: x.nombreItem,
											value: x.idItem+"__"+x.nombreItem,
										});

					  					$(".items__escogidos").prepend($option);


					  				}

				  				}

				  				$(".finalizar__global__act").on('click', function () {

									let paqueteDeDatos = new FormData();

									let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

									paqueteDeDatos.append('tipo','finalizar__act__deportivas');
									paqueteDeDatos.append('idOrganismoPrincipal',idOrganismoPrincipal);

									$(this).hide();

									$.ajax({

										type:"POST",
										url:"modelosBd/inserta/insertaAcciones.md.php",
										contentType: false,
										data:paqueteDeDatos,
										processData: false,
										cache: false,  
										success:function(response){

								            alertify.set("notifier","position", "top-center");
								            alertify.notify("Evento registrado satisfactoriamente", "success", 5, function(){});


								            window.setTimeout(function(){ 

								            	location.reload();

								            } ,2000); 

									    },
									    error:function(){
									    	
									    } 

									});									


								});

				  				
				  				ocultar__eventos__con($(".regresar__escoger__eventos"),$(".unico__tablas_r__2"),$(".unico__tablas_r"));

				  				enviar__eventos__totales($(".editar__principal__eventos"),"editar__eventos__inicial","formMatriz"+parametro5,$(".unico__tablas_r"),$(".unico__tablas_r__2"));


				  				enviar__eventos__totales__doceavos($(".editar__principal__eventos__necesarios"),"editar__eventos__inicial__tables","formulario__reconsiliados__n");

					  			funcionSoloNumeros($(".solo__numeros"));
								cambiantesNum($(".solo__numeros"));

								cambiantesInputs($(".solo__numeros"));

								sumarIndicadoresGlobalNormal($(".entre__sumas"),$(".total"));

								sumarIndicadoresGlobalNormal($(".enlazados__sumas__de"),$(".totalSumatoriasMontos"));

								agregar__en__contenedores($(".items__escogidos"),parametro5);

				  				if (envio__informaciones!=null && envio__informaciones!="" && envio__informaciones!=" " && envio__informaciones!=undefined) {

				  					/*======================================================
				  					=            LLenando campos de información            =
				  					======================================================*/
				  					
				  					for (x of envio__informaciones) {

				  						$(".proyecto").val(x.nombreEvento);
				  						$(".tipoFinanciamiento").val(x.tipoFinanciamiento);
				  						$(".deporte").val(x.Deporte);
				  						$(".provinciaE").val(x.provincia);
				  						$(".ciudadPais").val(x.ciudadPais);
				  						$(".alcanceE").val(x.alcance);
				  						$(".fecha__inicio").val(x.fechaInicio);
				  						$(".fecha__fin").val(x.fechaFin);
				  						$(".genero").val(x.genero);
				  						$(".categoria").val(x.categoria);
				  						$(".numero__entrenadores").val(x.numeroEntreandores);
				  						$(".numero__atletas").val(x.numeroAtletas);
				  						$(".total").val(x.total);
				  						$(".mujeresBeneficiarios").val(x.mBenefici);
				  						$(".hombresBeneficiarios").val(x.hBenefici);
				  						$(".cantidadBienAquirir").val(x.canitdarBie);
				  						$(".detalleOrganismoAd").val(x.detalleBien);
				  						$(".justificacionAdquisBien").val(x.justificacionAd);

					  					tipoDeporte($(".deporte"),x.Deporte);
					  					provincias($(".provinciaE"),x.provincia);
										pais($(".ciudadPais"),x.ciudadPais);
										alcance($(".alcanceE"),x.alcance);	

										$(".nombre__evento__definidos").html('EVENTO '+x.nombreEvento);			  						

				  					}
				  					
				  					/*=====  End of LLenando campos de información  ======*/

				  					$(".unico__tablas_r__2").show();	

				  				}else{


									tipoDeporte($(".deporte"));
									provincias($(".provinciaE"));
									pais($(".ciudadPais"));
									alcance($(".alcanceE"));

				  					$(".unico__tablas_r").show();

									enviar__eventos__totales($(".guardar__principal__eventos"),"guardar__eventos__inicial","formMatriz"+parametro5,$(".unico__tablas_r"),$(".unico__tablas_r__2"));

				  				}


				  			break;

				  		}

				  		if (parametro7==true) {

				  			if (!$(".enero"+c.idProgramacionFinanciera).length > 0 ) {

					  			if (parametro6=="poa__actividadesDeportivas") {



					  			}else{


									$('.item__Pre'+c.idProgramacionFinanciera).append('<td><center><input type="text" class="enero'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.enero+'"/></center></td><td><center><input type="text" class="febrero'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.febrero+'"/></center></td><td><center><input type="text" class="marzo'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.marzo+'"/></center></td><td><center><input type="text" class="abril'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.abril+'"/></center></td><td><center><input type="text" class="mayo'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.mayo+'"/></center></td><td><center><input type="text" class="junio'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.junio+'"/></center></td><td><center><input type="text" class="julio'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.julio+'"/></center></td><td><center><input type="text" class="agosto'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.agosto+'"/></center></td><td><center><input type="text" class="septiembre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.septiembre+'"/></center></td><td><center><input type="text" class="octubre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.octubre+'"/></center></td><td><center><input type="text" class="noviembre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.noviembre+'"/></center></td><td><center><input type="text" class="diciembre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.diciembre+'"/></center></td><td><center><input type="text" class="totalSumaItem'+c.idProgramacionFinanciera+' ancho__total__input  meses__atadosAjax'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="'+c.totalSumaItem+'" readonly="readonly"/></center></td>');

					  			}


								solo__numero__montosEscritura($(".meses__atados"+c.idProgramacionFinanciera));
								solo__numero__montos($(".meses__atados"+c.idProgramacionFinanciera));

								sumarIndicadoresGlobal($(".meses__atados"+c.idProgramacionFinanciera),$(".totalSumaItem"+c.idProgramacionFinanciera));

								cambiantesInputs($(".meses__atados"+c.idProgramacionFinanciera));

							}

				  		}

				  		if (parametro6=="poa__actividadesDeportivas") {



				  		}else{

				  			if (!$("#guardarMatriz"+c.idProgramacionFinanciera).length > 0 ) {

				  				$('.item__Pre'+c.idProgramacionFinanciera).append('<center><button id="guardarMatriz'+c.idProgramacionFinanciera+'" tipo="poaAdministrativo" idProgramacionFinanciera="'+c.idProgramacionFinanciera+'" class="btn btn-primary mt-2" idOrganismo="'+idOrganismo+'" idActividad="'+idActividad+'" idItem="'+c.idItem+'"><i class="fas fa-save"></i></button><div class="reload__'+c.idProgramacionFinanciera+'"></div></center>');

							}

				  		}


				  		switch (parametro6) {

				  			case "actividad__administrativa":

				  				guardarElementosGeneral($("#guardarMatriz"+c.idProgramacionFinanciera),c.idProgramacionFinanciera,"actividadesAdministrativas",$(".reload__"+c.idProgramacionFinanciera));

				  			break;

				  			case "poa__actividadesDeportivas":
				  			
				  				guardarElementosGeneral($("#guardarMatriz"+c.idProgramacionFinanciera),c.idProgramacionFinanciera,"actividadesDeportivades",$(".reload__"+c.idProgramacionFinanciera));

				  			break;

				  			case "poa__mantenimiento":
				  			
				  				guardarElementosGeneral__mantenimientos($("#guardarMatriz"),idOrganismo,"mantenimientoAc",$(".reload"));

				  			break;


				  		}

				  		// ocultar__enPreliminar($("#envioPreliminar"));


		  			}

				}

				});


			},

			error:function(){

			}
													
		});	

	});	

}

