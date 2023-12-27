
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

					$(".regimenValidas").before('<table><tr><td colspan="4" style="text:justify;">INSTRUCCIONES:- Registre el detalle de los rubros destinados a cubrir los salarios del personal administrativo y  de mantenimiento (ACTIVIDAD 001) y técnico (ACTIVIDAD 004) de la organización deportiva que se encuentren en relación de dependencia. - El valor total de esta matriz deberá coincidir con el monto total registrado en la hoja “POA” respecto de los ítems presupuestarios: 510106 “Salarios unificados”, 510203 “Decimotercer sueldo”, 510204 “Decimocuarto sueldo”, 510601 “Aporte patronal” y 510602 “Fondos de reserva”. La planificación del decimo cuarta remuneración en la región Sierra y Amazonia se realizara para el mes de agosto y en la región Costa  para el mes de marzo.NOTA: En esta hoja no se deberá incluir las obligaciones de las personas contratadas o por contratar con la modalidad de servicios profesionales.</td></tr><tr><td colspan="2" style="font-weight:bold;">REGIMEN ESCOLAR</td><td colspan="2"><select class="ancho__total__input regimenSuelDos" id="regimenSuelDos" idOrganismo="'+idOrganismo+'"><option value="">--Seleccione--</option><option value="Costa">Costa</option><option value="Sierra">Sierra</option><option value="Amazonia">Amazonia</option></select></td></tr></table>');

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

						funcionSoloNumeros($(".clase__suministros"+sumadorSuministros));
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


						var sumadorSueldosSalarios=0;

						$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+sumadorSueldosSalarios+' tr__enlaces'+sumadorSueldosSalarios+'"><td><center><input type="text" class="cedulaP'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="cedulaP'+sumadorSueldosSalarios+'" style="width:150px!important;" value="vacante"/></center></td><td><center><input type="text" class="apellidosNom'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimesReal'+sumadorSueldosSalarios+'" id="apellidosNom'+sumadorSueldosSalarios+'" style="width:150px!important;" value="vacante"/></center></td><td><center><input type="text" class="cargo'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="cargo'+sumadorSueldosSalarios+'" style="width:150px!important;"/></center></td><td><center><select class="tipoCargo'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="tipoCargo'+sumadorSueldosSalarios+'" style="width:150px!important;"></select></center></td><td><center><input type="text" class="tiempoMeses'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimesReal'+sumadorSueldosSalarios+'" id="tiempoMeses'+sumadorSueldosSalarios+'" style="width:50px!important;" value="0"/></center></td><td><center><input type="text" class="sueldoMensual'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="sueldoMensual'+sumadorSueldosSalarios+'"/></center></td><td><center><input type="text" class="aporteIess'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" id="aporteIess'+sumadorSueldosSalarios+'" value="0.00"/></center></td><td><center><input type="text" class="decimoTercera'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="decimoTercera'+sumadorSueldosSalarios+'"/></center></td><td><center><select class="mensualizaTercera'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="mensualizaTercera'+sumadorSueldosSalarios+'"><option value="">--Seleccione--</option><option value="si">Si</option><option value="no">No</option></select></center></td><td><center><input type="text" class="decimoCuarta'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="decimoCuarta'+sumadorSueldosSalarios+'"/></center></td><td><center><select class="mensualizaCuarta'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+'" id="mensualizaCuarta'+sumadorSueldosSalarios+'"><option value="">--Seleccione--</option><option value="si">Si</option><option value="no">No</option></select></center></td><td><center><input type="text" class="fondosDeReservas'+sumadorSueldosSalarios+' ancho__total__input obligatorios'+sumadorSueldosSalarios+' cambiador__unanimes'+sumadorSueldosSalarios+'" value="0.00" id="fondosDeReservas'+sumadorSueldosSalarios+'"/></center></td></tr>');		

							/*===========================================
							=            Acciones realizadas            =
							===========================================*/
							
							consultaDinardap($(".cedulaP"+sumadorSueldosSalarios),[$(".apellidosNom"+sumadorSueldosSalarios)]);

							if (idActividad==1) {

								$(".tipoCargo"+sumadorSueldosSalarios).html('<option value="">--Seleccione--</option><option value="Administrativo">Administrativo</option><option value="Mantenimiento">Mantenimiento</option><option value="Mantenimiento de Escenarios deportivos">Mantenimiento de Escenarios deportivos</option>');

							}else{

								$(".tipoCargo"+sumadorSueldosSalarios).html('<option value="Técnico">Técnico</option>');

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

						for (clw of obtenerInformacion) {

							$(".cuerpoMatriz"+parametro5).append('<tr class="item__PreEdit'+clw.idSueldos+' tr__enlaces'+parametro5+'"><td><center><input type="text" class="input__act" value="'+clw.cedula+'" attrF="'+clw.idSueldos+'" attr="cedula"/></center></td><td><center><input type="text" class="input__act" value="'+clw.nombres+'" attrF="'+clw.idSueldos+'" attr="nombres"/></center></td><td><center><input type="text" class="input__act" value="'+clw.cargo+'" attrF="'+clw.idSueldos+'" attr="cargo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.tipoCargo+'" attrF="'+clw.idSueldos+'" attr="tipoCargo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.tiempoTrabajo+'" attrF="'+clw.idSueldos+'" attr="tiempoTrabajo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.sueldoSalario+'" attrF="'+clw.idSueldos+'" attr="sueldoSalario"/></center></td><td><center><input type="text" class="input__act" value="'+clw.aportePatronal+'" attrF="'+clw.idSueldos+'" attr="aportePatronal"/></center></td><td><center><input type="text" class="input__act" value="'+clw.decimoTercera+'" attrF="'+clw.idSueldos+'" attr="decimoTercera"/></center></td><td><center><input type="text" class="input__act" value="'+clw.mensualizaTercera+'" attrF="'+clw.idSueldos+'" attr="mensualizaTercera"/></center></td><td><center><input type="text" class="input__act" value="'+clw.decimoCuarta+'" attrF="'+clw.idSueldos+'" attr="decimoCuarta"/></center></td><td><center><input type="text" class="input__act" value="'+clw.menusalizaCuarta+'" attrF="'+clw.idSueldos+'" attr="menusalizaCuarta"/></center></td><td><center><input type="text" class="input__act" value="'+clw.fondosReserva+'" attrF="'+clw.idSueldos+'" attr="fondosReserva"/></center></td><td><center><input type="text" class="input__act" value="'+clw.enero+'" attrF="'+clw.idSueldos+'" attr="enero"/></center></td><td><center><input type="text" class="input__act" value="'+clw.febrero+'" attrF="'+clw.idSueldos+'" attr="febrero"/></center></td><td><center><input type="text" class="input__act" value="'+clw.marzo+'" attrF="'+clw.idSueldos+'" attr="marzo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.abril+'" attrF="'+clw.idSueldos+'" attr="abril"/></center></td><td><center><input type="text" class="input__act" value="'+clw.mayo+'" attrF="'+clw.idSueldos+'" attr="mayo"/></center></td><td><center><input type="text" class="input__act" value="'+clw.junio+'" attrF="'+clw.idSueldos+'" attr="junio"/></center></td><td><center><input type="text" class="input__act" value="'+clw.julio+'" attrF="'+clw.idSueldos+'" attr="julio"/></center></td><td><center><input type="text" class="input__act" value="'+clw.agosto+'" attrF="'+clw.idSueldos+'" attr="agosto"/></center></td><td><center><input type="text" class="input__act" value="'+clw.septiembre+'" attrF="'+clw.idSueldos+'" attr="septiembre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.octubre+'" attrF="'+clw.idSueldos+'" attr="octubre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.noviembre+'" attrF="'+clw.idSueldos+'" attr="noviembre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.diciembre+'" attrF="'+clw.idSueldos+'" attr="diciembre"/></center></td><td><center><input type="text" class="input__act" value="'+clw.total+'" attrF="'+clw.idSueldos+'" attr="total"/></center></td><td><center><button class="eliminarFilaEdit'+clw.idSueldos+' btn btn-danger" attrF="'+clw.idSueldos+'" attr="'+clw.idSueldos+'"><i class="fas fa-trash"></i></button></center></td></tr>');	
							edicionesOnlines($(".input__act"),"poa_sueldossalarios2022","idSueldos");
		

							eliminarEdit($(".eliminarFilaEdit"+clw.idSueldos),$(".item__PreEdit"+clw.idSueldos),"eliminaSueldos",clw.idSueldos,false,idActividad);

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

								$(".tipoCargo"+sumadorHonorarios).html('<option value="Administrativo">Administrativo</option>');

							}else{

								$(".tipoCargo"+sumadorHonorarios).html('<option value="Técnico">Técnico</option>');

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
						
						/*=====  End of Actualiza  ======*/



					break;



				}

				// ocultar__enPreliminar($("#envioPreliminar"));
				
				/*=====  End of Creando elementos dinamicos  ======*/
				
				for(var w=0; w<arrayInformacionSecond.length;w++){

					for (c of arrayInformacionSecond[w]) {
													   	
				  		switch (parametro6) {


				  			case "actividad__administrativa":


								$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+c.idProgramacionFinanciera+' tr__enlaces'+parametro5+'"><td><center>'+c.itemPreesupuestario+'</center></td><td><center>'+c.nombreItem+'</center></td><td><center><textarea class="justificacionAdquisi'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="justificacionAdquisi'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><input type="text" class="cantidadBien__servicios'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="cantidadBien__servicios'+c.idProgramacionFinanciera+'"/></center></td></tr>');

								funcionSoloNumeros($(".cantidadBien__servicios"+c.idProgramacionFinanciera));

								if (c.justificacionBien!=null && c.justificacionBien!="") {

									$("#justificacionAdquisi"+c.idProgramacionFinanciera).val(c.justificacionBien);
									$("#cantidadBien__servicios"+c.idProgramacionFinanciera).val(c.cantidadBien);

								}


				  			break;



				  			case "poa__actividadesDeportivas":


								$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+c.idProgramacionFinanciera+' tr__enlaces'+parametro5+'"><td><center>'+c.itemPreesupuestario+'</center></td><td><center>'+c.nombreItem+'</center></td><td><center><select class="tipoFinanciamiento'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="tipoFinanciamiento'+c.idProgramacionFinanciera+'"><option value="">--Seleccione--</option><option value="corriente">Corriente</option><option value="autogestion">Autogestión</option></select></center></td><td><center><input type="text" class="nombreEvento'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="nombreEvento'+c.idProgramacionFinanciera+'"/></center></td><td><center><select class="deporteEvento'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="deporteEvento'+c.idProgramacionFinanciera+'"></select></center></td><td><center><select class="provinciaE'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="provinciaE'+c.idProgramacionFinanciera+'"></select></center></td><td><center><select class="ciudadPais'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="ciudadPais'+c.idProgramacionFinanciera+'"></select></center></td><td><center><select class="alcanceE'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="alcanceE'+c.idProgramacionFinanciera+'"></select></center></td><td><center><input type="date" class="fechaInicio'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="fechaInicio'+c.idProgramacionFinanciera+'"/></center></td><td><center><input type="date" class="fechaFin'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="fechaFin'+c.idProgramacionFinanciera+'"/></center></td><td><center><select class="genero'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="genero'+c.idProgramacionFinanciera+'"><option value="">--Escoger gégnero--</option><option value="masculino">Masculino</option><option value="femenino">Femenino</option><option value="ambas">ambas</option></select></center></td><td><center><input type="text" class="categoriaE'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="categoriaE'+c.idProgramacionFinanciera+'"/></center></td><td><center><input type="text" class="numeroEntrenadoresO'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+' entre__sumas'+c.idProgramacionFinanciera+' inputs__c'+c.idProgramacionFinanciera+'" id="numeroEntrenadoresO'+c.idProgramacionFinanciera+'" value="0"/></center></td><td><center><input type="text" class="numeroAtletas'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+' entre__sumas'+c.idProgramacionFinanciera+' inputs__c'+c.idProgramacionFinanciera+'" id="numeroAtletas'+c.idProgramacionFinanciera+'" value="0"/></center></td><td><center><input type="text" class="total'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="total'+c.idProgramacionFinanciera+'" readonly="" value="0"/></center></td><td><center><input type="text" class="mujeresBeneficiarios'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+' inputs__c'+c.idProgramacionFinanciera+'" value="0" id="mujeresBeneficiarios'+c.idProgramacionFinanciera+'"/></center></td><td><center><input type="text" class="hombresBeneficiarios'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+' inputs__c'+c.idProgramacionFinanciera+'" value="0" id="hombresBeneficiarios'+c.idProgramacionFinanciera+'"/></center></td><td><center><textarea class="detalle__nuevo'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="detalle__nuevo'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><textarea class="justificacionAdquisi'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="justificacionAdquisi'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><input type="text" class="cantidadBien__servicios'+c.idProgramacionFinanciera+' ancho__total__input obligatorios'+c.idProgramacionFinanciera+'" id="cantidadBien__servicios'+c.idProgramacionFinanciera+'"/></center></td><td><center><input type="text" class="enero'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="febrero'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="marzo'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="abril'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'"value="0.00"/></center></td><td><center><input type="text" class="mayo'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="junio'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="julio'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="agosto'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'"value="0.00"/></center></td><td><center><input type="text" class="septiembre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="octubre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="noviembre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="diciembre'+c.idProgramacionFinanciera+' ancho__total__input meses__atados'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00"/></center></td><td><center><input type="text" class="totalSumaItem'+c.idProgramacionFinanciera+' ancho__total__input  meses__atadosAjax'+c.idProgramacionFinanciera+'  meses__atadosAjax'+c.idProgramacionFinanciera+'" value="0.00" readonly="readonly"/></center></td><td><center class="d d-flex justify-content-center align-items-center"><button class="agregarDeportivas'+c.idProgramacionFinanciera+' btn btn-info"><i class="fas fa-plus-circle"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="guardarMatriz'+c.idProgramacionFinanciera+'" tipo="poaAdministrativo" idProgramacionFinanciera="'+c.idProgramacionFinanciera+'" class="btn btn-primary mt-2" idOrganismo="'+idOrganismo+'" idActividad="'+idActividad+'" idItem="'+c.idItem+'"><i class="fas fa-save"></i></button><div class="reload__'+c.idProgramacionFinanciera+'"></div></center></td></tr>');


								funcionSoloNumeros($(".inputs__c"+c.idProgramacionFinanciera));
								cambiantesNum($(".inputs__c"+c.idProgramacionFinanciera));

								sumarIndicadoresGlobalNormal($(".entre__sumas"+c.idProgramacionFinanciera),$(".total"+c.idProgramacionFinanciera));

								tipoDeporte($(".deporteEvento"+c.idProgramacionFinanciera));
								provincias($(".provinciaE"+c.idProgramacionFinanciera));
								pais($(".ciudadPais"+c.idProgramacionFinanciera));
								alcance($(".alcanceE"+c.idProgramacionFinanciera));


								solo__numero__montosEscritura($(".meses__atados"+c.idProgramacionFinanciera));
								solo__numero__montos($(".meses__atados"+c.idProgramacionFinanciera));

								sumarIndicadoresGlobal($(".meses__atados"+c.idProgramacionFinanciera),$(".totalSumaItem"+c.idProgramacionFinanciera));

								cambiantesInputs($(".meses__atados"+c.idProgramacionFinanciera));

								segmentosAcDeportivas($(".agregarDeportivas"+c.idProgramacionFinanciera),$(".cuerpoMatriz"+parametro5),[idOrganismo,idActividad,c.idItem],c.itemPreesupuestario,c.nombreItem,parametro5,c.idProgramacionFinanciera);



								if (c.idProgramacionFinanciera2!="" && c.idProgramacionFinanciera2!=null && c.idProgramacionFinanciera2!=undefined) {

									var provinciaIdArray = c.provinciaId.split("---");
									var ciudadPaisIdArray = c.ciudadPaisId.split("---");
									var alcanceIdArray = c.alcanceId.split("---");

									var deporteArray = c.Deporte.split("---");

									var idProgramacionFinanciera2Array = c.idProgramacionFinanciera2.split("---");
									var idPda = c.idPda.split("---");
									var tipoFinanciamiento = c.tipoFinanciamiento.split("---");
									var nombreEvento = c.nombreEvento.split("---");
									var deporte = c.deporte.split("---");
									var provincia = c.provincia.split("---");
									var ciudadPais = c.ciudadPais.split("---");
									if (c.alcanceFuncion!=null) {
										var alcanceArray = c.alcanceFuncion.split("---");
									}else{
										var alcanceArray = "INT";
									}
									
									var fechaInicio = c.fechaInicio.split("---");
									var fechaFin = c.fechaFin.split("---");
									var genero = c.genero.split("---");
									var categoria = c.categoria.split("---");
									var numeroEntreandores = c.numeroEntreandores.split("---");
									var numeroAtletas = c.numeroAtletas.split("---");
									var total = c.total.split("---");
									var mBenefici = c.mBenefici.split("---");
									var hBenefici = c.hBenefici.split("---");
									var justificacionAd = c.justificacionAd.split("---");
									var canitdarBie = c.canitdarBie.split("---");
									var enero = c.enero.split("---");
									var febrero = c.febrero.split("---");
									var marzo = c.marzo.split("---");
									var abril = c.abril.split("---");
									var mayo = c.mayo.split("---");
									var junio = c.junio.split("---");
									var julio = c.julio.split("---");
									var agosto = c.agosto.split("---");
									var septiembre = c.septiembre.split("---");
									var octubre = c.octubre.split("---");
									var noviembre = c.noviembre.split("---");
									var diciembre = c.diciembre.split("---");
									var totalElem = c.totalElem.split("---");
									var detalleBien = c.detalleBien.split("---");

									for (var i =0; i < idProgramacionFinanciera2Array.length; i++) {

										if (c.idProgramacionFinanciera==idProgramacionFinanciera2Array[i]) {
											$(".cuerpoMatriz"+parametro5).append('<tr><th style="color:black; font-size:12px;">CÓDIGO ÍTEM</th><th style="color:black; font-size:12px;">ÍTEM</th><th style="color:black; font-size:12px;">TIPO DE FINANCIAMIENTO</th><th style="color:black; font-size:12px;">NOMBRE DEL EVENTO</th><th style="color:black; font-size:12px;">DEPORTE</th><th style="color:black; font-size:12px;">PROVINCIA</th><th style="color:black; font-size:12px;">SEDE CIUDAD - PAIS	</th><th style="color:black; font-size:12px;">ALCANCE</th><th style="color:black; font-size:12px;">FECHA INICIO</th><th style="color:black; font-size:12px;">FECHA FIN</th><th style="color:black; font-size:12px;">GÉNERO</th><th style="color:black; font-size:12px;">CATEGORÍA</th><th style="color:black; font-size:12px;">No.ENTRENADORES OFICIALES</th><th style="color:black; font-size:12px;">No. ATLETAS</th><th style="color:black; font-size:12px;">TOTAL</th><th style="color:black; font-size:12px;">MUJERES (BENEFICIARIOS)</th><th style="color:black; font-size:12px;">HOMBRES (BENEFICIARIOS)</th><th style="color:black; font-size:12px;">Detalle lo que el organismo va a adquirir</th><th style="color:black; font-size:12px;">Justificación de la adquisición del bien o servicio</th><th style="color:black; font-size:12px;">Cantidad del bien o servicio a adquirir</th><th style="color:black; font-size:12px;">Enero</th><th style="color:black; font-size:12px;">Febrero</th><th style="color:black; font-size:12px;">Marzo</th><th style="color:black; font-size:12px;">Abril</th><th style="color:black; font-size:12px;">Mayo</th><th style="color:black; font-size:12px;">Junio</th><th style="color:black; font-size:12px;">Julio</th><th style="color:black; font-size:12px;">Agosto</th><th style="color:black; font-size:12px;">Septiembre</th><th style="color:black; font-size:12px;">Octubre</th><th style="color:black; font-size:12px;">Noviembre</th><th style="color:black; font-size:12px;">Diciembre</th><th style="color:black; font-size:12px;">Total</th></tr><tr class="fila__pda'+idPda[i]+'"><td>'+c.itemPreesupuestario+'</td><td>'+c.nombreItem+'</td><td><select style="border:none;" class="input__act" id="tipoFinan'+idPda[i]+'" attrF="'+idPda[i]+'" attr="tipoFinanciamiento" value="'+tipoFinanciamiento[i]+'"><option value="corriente">Corriente</option><option value="autogestion">Autogestión</option></select></td><td><input type="text" style="border:none;" class="input__act" value="'+nombreEvento[i]+'" attrF="'+idPda[i]+'" attr="nombreEvento"/></td><td><select style="border:none;" class="input__act" attrF="'+idPda[i]+'" attr="Deporte" id="deporte'+idPda[i]+'"></select></td><td><select style="border:none;" class="input__act" attrF="'+idPda[i]+'" attr="provincia" id="provincia'+idPda[i]+'"></select></td><td><select style="border:none;" class="input__act" attrF="'+idPda[i]+'" attr="ciudadPais" id="ciudaPais'+idPda[i]+'"></select></td><td><select type="text" style="border:none;" class="input__act" attrF="'+idPda[i]+'" attr="alcance" id="alcance'+idPda[i]+'"></select></td><td><input type="text" style="border:none;" class="input__act" value="'+fechaInicio[i]+'" attrF="'+idPda[i]+'" attr="fechaInicio"/></td><td><input type="text" style="border:none;" class="input__act" value="'+fechaFin[i]+'" attrF="'+idPda[i]+'" attr="fechaFin"/></td><td><input type="text" style="border:none;" class="input__act" value="'+genero[i]+'" attrF="'+idPda[i]+'" attr="genero"/></td><td><input type="text" style="border:none;" class="input__act" value="'+categoria[i]+'" attrF="'+idPda[i]+'" attr="categoria"/></td><td><input type="text" style="border:none;" class="input__act" value="'+numeroEntreandores[i]+'" attrF="'+idPda[i]+'" attr="numeroEntreandores"/></td><td><input type="text" style="border:none;" class="input__act" value="'+numeroAtletas[i]+'" attrF="'+idPda[i]+'" attr="numeroAtletas"/></td><td><input type="text" style="border:none;" class="input__act" value="'+total[i]+'" attrF="'+idPda[i]+'" attr="total"/></td><td><input type="text" style="border:none;" class="input__act" value="'+mBenefici[i]+'" attrF="'+idPda[i]+'" attr="mBenefici"/></td><td><input type="text" style="border:none;" class="input__act" value="'+hBenefici[i]+'" attrF="'+idPda[i]+'" attr="hBenefici"/></td><td><input type="text" style="border:none;" class="input__act" value="'+detalleBien[i]+'" attrF="'+idPda[i]+'" attr="detalleBien"/></td><td><input type="text" style="border:none;" class="input__act" value="'+justificacionAd[i]+'" attrF="'+idPda[i]+'" attr="justificacionAd"/></td><td><input type="text" style="border:none;" class="input__act" value="'+canitdarBie[i]+'" attrF="'+idPda[i]+'" attr="canitdarBie"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(enero[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="enero"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(febrero[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="febrero"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(marzo[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="marzo"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(abril[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="abril"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(mayo[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="mayo"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(junio[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="junio"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(julio[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="julio"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(agosto[i]).toFixed(2)+'" /attrF="'+idPda[i]+'" attr="agosto"></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(septiembre[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="septiembre" /></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(octubre[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="octubre"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(noviembre[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="noviembre"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(diciembre[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="diciembre"/></td><td><input type="text" style="border:none;" class="input__act" value="'+parseFloat(totalElem[i]).toFixed(2)+'" attrF="'+idPda[i]+'" attr="totalElem"/></td><td><center><button class="eliminarPda'+idPda[i]+' btn btn-danger" attrF="'+idPda[i]+'" attr="'+idPda[i]+'"><i class="fas fa-trash"></i></button></center></td></tr>');


											$("#tipoFinan"+idPda[i]).val(tipoFinanciamiento[i]);

											tipoDeporte($("#deporte"+idPda[i]),deporteArray[i]);

											provincias($("#provincia"+idPda[i]),provinciaIdArray[i]);
											pais($("#ciudaPais"+idPda[i]),ciudadPaisIdArray[i]);
											alcance($("#alcance"+idPda[i]),alcanceIdArray[i]);

											edicionesOnlines($(".input__act"),"poa_actdeportivas","idPda");


											eliminarEdit($(".eliminarPda"+idPda[i]),$(".fila__pda"+idPda[i]),"eliminaPda",idPda[i],c.idProgramacionFinanciera);

										}
		
										
									}


								}



				  			break;

				  			case "poa__mantenimiento":

								$(".cuerpoMatriz"+parametro5).append('<tr class="item__Pre'+c.idProgramacionFinanciera+' tr__enlaces'+parametro5+'"><td><center>'+c.itemPreesupuestario+'</center></td><td><center>'+c.nombreItem+'</center></td><td><center><textarea class="nombreEscenario'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="nombreEscenario'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><select class="provinciaE'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="provinciaE'+c.idProgramacionFinanciera+'"></select></center></td><td><center><textarea class="direccionCompleta'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="direccionCompleta'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><select class="estadoM'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="estadoM'+c.idProgramacionFinanciera+'"><option value="">--Seleccione--</option><option value="propia">Propia</option><option value="ministerioDeporte">Del ministerio del deporte</option></select></center></td><td><center><select class="tipoRecuersos'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="tipoRecuersos'+c.idProgramacionFinanciera+'"><option value="">--Seleccione--</option><option value="recursosPublicos">Recursos públicos</option><option value="autogestion">Recursos de autogestión</option><option value="otras">Otras fuentes de financiamiento</option></select></center></td><td><center><select class="tipoInversion'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="tipoInversion'+c.idProgramacionFinanciera+'"><option value="gastosMantenimiento">Gastos por mantenimiento de insfraestructura</option></select></center></td><td><center><select class="tipoIntervencion'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="tipoIntervencion'+c.idProgramacionFinanciera+'"><option value="">--Seleccione--</option><option value="fachadasExteriores">Fachadas exteriores</option><option value="interiores">Interiores</option><option value="cubiertas">Cubiertas</option><option value="pisosInteriores">Pisos interiores</option><option value="pisosExteriores">Pisos exteriores</option><option value="pisicinas">Piscinas</option><option value="isntalacionesHi">Instalaciones Hidrosanitarias de las edificaciones deportivas</option><option value="sistemaElectrico">Sistema Eléctrico</option></select></center></td><td><center><select class="tipoMantenimiento'+c.idProgramacionFinanciera+' ancho__total__input__selects obligatorios'+c.idProgramacionFinanciera+'" id="tipoMantenimiento'+c.idProgramacionFinanciera+'"><option value="">--Seleccione--</option><option value="preventivo">Preventivo</option><option value="correctivo">Correctivo</option></select></center></td><td><center><textarea class="materialesServicios'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+'" id="materialesServicios'+c.idProgramacionFinanciera+'"></textarea></center></td><td><center><input type="date" class="fecha__ultimo'+c.idProgramacionFinanciera+' ancho__total__textareas obligatorios'+c.idProgramacionFinanciera+' ancho__total__input" id="fecha__ultimo'+c.idProgramacionFinanciera+'" /></center></td></tr>');

									

									if (c.nombresInfras!=null && c.nombresInfras!="") {

										$("#nombreEscenario"+c.idProgramacionFinanciera).val(c.nombresInfras);	
										$("#direccionCompleta"+c.idProgramacionFinanciera).val(c.direccionCompleta);	
										$("#estadoM"+c.idProgramacionFinanciera).val(c.estado);	
										$("#tipoRecuersos"+c.idProgramacionFinanciera).val(c.tipoRecursos);		
										$("#tipoInversion"+c.idProgramacionFinanciera).val(c.tipoInvercion);	
										$("#tipoIntervencion"+c.idProgramacionFinanciera).val(c.detallarTipoIn);	
										$("#tipoMantenimiento"+c.idProgramacionFinanciera).val(c.tipoMantenimiento);
										$("#materialesServicios"+c.idProgramacionFinanciera).val(c.materialesServicios);	
										$("#fecha__ultimo"+c.idProgramacionFinanciera).val(c.fechaUltimo);	

										provincias($(".provinciaE"+c.idProgramacionFinanciera),c.provinciaMantenimiento);							

									}else{

										provincias($(".provinciaE"+c.idProgramacionFinanciera));

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

				  			$('.item__Pre'+c.idProgramacionFinanciera).append('<center><button id="guardarMatriz'+c.idProgramacionFinanciera+'" tipo="poaAdministrativo" idProgramacionFinanciera="'+c.idProgramacionFinanciera+'" class="btn btn-primary mt-2" idOrganismo="'+idOrganismo+'" idActividad="'+idActividad+'" idItem="'+c.idItem+'"><i class="fas fa-save"></i></button><div class="reload__'+c.idProgramacionFinanciera+'"></div></center>');

				  		}

				  		

				  		switch (parametro6) {

				  			case "actividad__administrativa":

				  				guardarElementosGeneral($("#guardarMatriz"+c.idProgramacionFinanciera),c.idProgramacionFinanciera,"actividadesAdministrativas",$(".reload__"+c.idProgramacionFinanciera));

				  			break;

				  			case "poa__actividadesDeportivas":
				  			
				  				guardarElementosGeneral($("#guardarMatriz"+c.idProgramacionFinanciera),c.idProgramacionFinanciera,"actividadesDeportivades",$(".reload__"+c.idProgramacionFinanciera));

				  			break;

				  			case "poa__mantenimiento":
				  			
				  				guardarElementosGeneral($("#guardarMatriz"+c.idProgramacionFinanciera),c.idProgramacionFinanciera,"mantenimientoAc",$(".reload__"+c.idProgramacionFinanciera));

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

