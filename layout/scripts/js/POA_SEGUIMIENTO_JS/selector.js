var Selector_otros_Honorarios_Poa_Seguimiento = function (tipo,documento,idActividad,trimestre) {
	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append("tipo", tipo);
	paqueteDeDatos.append("documento", documento);
	paqueteDeDatos.append("idActividad", idActividad);
	paqueteDeDatos.append("trimestre", trimestre);

		$.ajax({

			type:"POST",
			url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			async:false,
			success:function(response){

				let elementos=JSON.parse(response);

				if(elementos.informacion[0] ==""){

				}else{
					console.log("sadasd")
					console.log(elementos.informacion[0].idOtrosHonorarios)
					
					$("#datosHonorarios").val(elementos.informacion[0].idOtrosHonorarios)
				}

				
				
				
			},
			error:function(){

			}
			
		});	
	
};

	/*===================================
	=            Indicadores           =
	===================================*/
	
	var indicadores__seguimientos2023=function(parametro1,parametro2,parametro3,tipo,trimestre){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');
			$(".oculto__trimestrales").hide();

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',tipo);
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', trimestre);
			
			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
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

							if(z.totalEjecutado==null){
								z.totalEjecutado =0;
							}				
									
									
							
									
									$(parametro1).append('<tr id="filaIndicadora"class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.idActividades+'</center></td><td>'+z.nombreActividades+'</td><td>'+z.indicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+z.trimestre+'" class="solo__numeros ancho__total__input text-center obligatorios" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+z.totalEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios" /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><a id="guardar'+z.idActividades+'" parametro7="'+parametro2+'" parametro8="'+$("#trimestreEvaluador").val()+'" name="guardar'+z.idActividades+'" idContador="'+z.idActividades+'" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td></tr>');	
									// }
								

									funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));
									funcion__solo__numero($(".solo__numeros"));							 
									//funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),z.metaindicador);
									
								 	$("#guardar"+z.idActividades).click(function(e) {

									let idContador=$(this).attr('idContador');
									let parametro7=$(this).attr('parametro7');
									let parametro8=$(this).attr('parametro8');

									console.log(idContador,parametro7,parametro8)
									
									funcion__guardado__indicadores__general2023($("#guardar"+idContador),$(".obligatorios"+idContador),[$("#totalProgramado"+idContador).val(),$("#totalEjecutado"+idContador).val(),parametro7,idContador,parametro8],"seguimiento__indicadores2023",$(".filaIndicadora"+idContador),$(".oculto__trimestrales"));

									}); 
							// }
 					

						}


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

/*=====  End of Indicadores  ======*/

/*=======================================
=			SUELDOS Y SALARIOS			=
========================================*/	
var sueldos__salarios__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro3).click(function(e) {

		$(parametro1).html(' ');

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','mostrar__sueldos__salarios__seguimiento__2023');
		paqueteDeDatos.append('idOrganismos',parametro2);
		paqueteDeDatos.append('trimestre', parametro5);

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
			url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){				

				$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
						var elementos=JSON.parse(response);
						var indicadorInformacion=elementos['indicadorInformacion'];
					//let contador=0;
					
					//console.log(indicadorInformacion)
					// for (z of indicadorInformacion) {

					// 	let valor1=0;
					// 	let valor2=0;
					// 	let valor3=0;

					// 	let valor1__desahucio=0;
					// 	let valor2__desahucio=0;
					// 	let valor3__desahucio=0;

					// 	let valor1__despido=0;
					// 	let valor2__despido=0;
					// 	let valor3__despido=0;

					// 	let valor1__renuncia=0;
					// 	let valor2__renuncia=0;
					// 	let valor3__renuncia=0;

					// 	let valor1__compensacion=0;
					// 	let valor2__compensacion=0;
					// 	let valor3__compensacion=0;

					// 	let equiparable=" ";

					// 	if (parametro5=="primerTrimestre") {
					// 		valor1=z.enero;
					// 		valor2=z.febrero;
					// 		valor3=z.marzo;

					// 		if (z.eneroDesahucio==null) {
					// 			valor1__desahucio=0;
					// 			valor2__desahucio=0;
					// 			valor3__desahucio=0;	
					// 		}else{
					// 			valor1__desahucio=z.eneroDesahucio;
					// 			valor2__desahucio=z.febreroDesahucio;
					// 			valor3__desahucio=z.marzoDesahucio;
					// 		}

					// 		if (z.eneroDespido==null) {
					// 			valor1__despido=0;
					// 			valor2__despido=0;
					// 			valor3__despido=0;	
					// 		}else{
					// 			valor1__despido=z.eneroDespido;
					// 			valor2__despido=z.febreroDespido;
					// 			valor3__despido=z.marzoDespido;	
					// 		}

					// 		if (z.eneroRenuncia==null) {
					// 			valor1__renuncia=0;
					// 			valor2__renuncia=0;
					// 			valor3__renuncia=0;	
					// 		}else{
					// 			valor1__renuncia=z.eneroRenuncia;
					// 			valor2__renuncia=z.febreroRenuncia;
					// 			valor3__renuncia=z.marzoRenuncia;	
					// 		}

					// 		if (z.eneroCompensacion==null) {
					// 			valor1__compensacion=0;
					// 			valor2__compensacion=0;
					// 			valor3__compensacion=0;	
					// 		}else{
					// 			valor1__compensacion=z.eneroCompensacion;
					// 			valor2__compensacion=z.febreroCompensacion;
					// 			valor3__compensacion=z.marzoCompensacion;
					// 		}
					// 		equiparable="Marzo";

					// 	}else if (parametro5=="segundoTrimestre") {
					// 		valor1=z.abril;
					// 		valor2=z.mayo;
					// 		valor3=z.junio;

					// 		if (z.eneroDesahucio==null) {
					// 			valor1__desahucio=0;
					// 			valor2__desahucio=0;
					// 			valor3__desahucio=0;	
					// 		}else{
					// 			valor1__desahucio=z.abrilDesahucio;
					// 			valor2__desahucio=z.mayoDesahucio;
					// 			valor3__desahucio=z.junioDesahucio;	
					// 		}

					// 		if (z.eneroDespido==null) {
					// 			valor1__despido=0;
					// 			valor2__despido=0;
					// 			valor3__despido=0;	
					// 		}else{
					// 			valor1__despido=z.abrilDespido;
					// 			valor2__despido=z.mayoDespido;
					// 			valor3__despido=z.junioDespido;
					// 		}

					// 		if (z.eneroRenuncia==null) {
					// 			valor1__renuncia=0;
					// 			valor2__renuncia=0;
					// 			valor3__renuncia=0;	
					// 		}else{	
					// 			valor1__renuncia=z.abrilRenuncia;
					// 			valor2__renuncia=z.mayoRenuncia;
					// 			valor3__renuncia=z.junioRenuncia;
					// 		}

					// 		if (z.eneroCompensacion==null) {
					// 			valor1__compensacion=0;
					// 			valor2__compensacion=0;
					// 			valor3__compensacion=0;	
					// 		}else{		
					// 			valor1__compensacion=z.abrilCompensacion;
					// 			valor2__compensacion=z.mayoCompensacion;
					// 			valor3__compensacion=z.junioCompensacion;	
					// 		}
					// 		equiparable="Junio";

					// 	}else if (parametro5=="tercerTrimestre") {
					// 		valor1=z.julio;
					// 		valor2=z.agosto;
					// 		valor3=z.septiembre;

					// 		if (z.eneroDesahucio==null) {
					// 			valor1__desahucio=0;
					// 			valor2__desahucio=0;
					// 			valor3__desahucio=0;	
					// 		}else{
					// 			valor1__desahucio=z.julioDesahucio;
					// 			valor2__desahucio=z.agostoDesahucio;
					// 			valor3__desahucio=z.septiembreDesahucio;
					// 		}

					// 		if (z.eneroDespido==null) {
					// 			valor1__despido=0;
					// 			valor2__despido=0;
					// 			valor3__despido=0;	
					// 		}else{
					// 			valor1__despido=z.julioDespido;
					// 			valor2__despido=z.agostoDespido;
					// 			valor3__despido=z.septiembreDespido;
					// 		}

					// 		if (z.eneroRenuncia==null) {
					// 			valor1__renuncia=0;
					// 			valor2__renuncia=0;
					// 			valor3__renuncia=0;	
					// 		}else{								
					// 			valor1__renuncia=z.julioRenuncia;
					// 			valor2__renuncia=z.agostoRenuncia;
					// 			valor3__renuncia=z.septiembreRenuncia;	
					// 		}

					// 		if (z.eneroCompensacion==null) {
					// 			valor1__compensacion=0;
					// 			valor2__compensacion=0;
					// 			valor3__compensacion=0;	
					// 		}else{		
					// 			valor1__compensacion=z.julioCompensacion;
					// 			valor2__compensacion=z.agostoCompensacion;
					// 			valor3__compensacion=z.septiembreCompensacion;	
					// 		}
					// 		equiparable="Septiembre";

					// 	}else if (parametro5=="cuartoTrimestre") {
					// 		valor1=z.octubre;
					// 		valor2=z.noviembre;
					// 		valor3=z.diciembre;

					// 		if (z.eneroDesahucio==null) {
					// 			valor1__desahucio=0;
					// 			valor2__desahucio=0;
					// 			valor3__desahucio=0;	
					// 		}else{
					// 			valor1__desahucio=z.octubreDesahucio;
					// 			valor2__desahucio=z.noviembreDesahucio;
					// 			valor3__desahucio=z.diciembreDesahucio;	
					// 		}

					// 		if (z.eneroDespido==null) {
					// 			valor1__despido=0;
					// 			valor2__despido=0;
					// 			valor3__despido=0;	
					// 		}else{
					// 			valor1__despido=z.octubreDespido;
					// 			valor2__despido=z.noviembreDespido;
					// 			valor3__despido=z.diciembreDespido;	
					// 		}

					// 		if (z.eneroRenuncia==null) {
					// 			valor1__renuncia=0;
					// 			valor2__renuncia=0;
					// 			valor3__renuncia=0;	
					// 		}else{								
					// 			valor1__renuncia=z.octubreRenuncia;
					// 			valor2__renuncia=z.noviembreRenuncia;
					// 			valor3__renuncia=z.diciembreRenuncia;	
					// 		}

					// 		if (z.eneroCompensacion==null) {
					// 			valor1__compensacion=0;
					// 			valor2__compensacion=0;
					// 			valor3__compensacion=0;	
					// 		}else{		
					// 			valor1__compensacion=z.octubreCompensacion;
					// 			valor2__compensacion=z.noviembreCompensacion;
					// 			valor3__compensacion=z.diciembreCompensacion;	
					// 		}
					// 		equiparable="Diciembre";
					// 	}

					// 	if (z.mes!=equiparable) {
					// 		$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatables3.js", function() {
					// 		datatableSeguimiento1.row.add([
					// 			z.idSueldos,
					// 			contador,
					// 			z.nombres,
					// 			z.cargo,
					// 			z.tipoCargo,
					// 			z.tiempoTrabajo,
					// 			<input type="checkbox" id="checked'+z.idSueldos+'" name="checked'+z.idSueldos+'" class="checkeds__dinamicos__sueldos__salarios"/>,
					// 		  ]).draw(true);			
					// 	});
					// 		contador++;
					// 		$(parametro1).append('<tr class="filaIndicadora'+z.idSueldos+'"><td><center>'+contador+'</center></td><td>'+z.nombres+'</td><td>'+z.cedula+'</td><td>'+z.cargo+'</td><td>'+z.tipoCargo+'</td><td>'+z.tiempoTrabajo+'</td><td><center><input type="checkbox" id="checked'+z.idSueldos+'" name="checked'+z.idSueldos+'" class="checkeds__dinamicos__sueldos__salarios"/></center></td></tr>');

					// 		checkeds__recorridos__sueldos__salarios2023($(".checkeds__dinamicos__sueldos__salarios"),$("#checked"+z.idSueldos),$("#contadorIndicador2"),$("#trimestreEvaluador").val(),z.idSueldos,$(parametro1),$(parametro4),[z.idSueldos,z.sueldoSalario,z.aportePatronal,z.decimoTercera,z.decimoCuarta,z.fondosReserva,valor1,valor2,valor3,z.total,valor1__desahucio,valor2__desahucio,valor3__desahucio,valor1__despido,valor2__despido,valor3__despido,valor1__renuncia,valor2__renuncia,valor3__renuncia,valor1__compensacion,valor2__compensacion,valor3__compensacion,z.mensualizaTercera,z.mensualizaCuarta,z.nombres]);	
					// 	}

						
					// }
					// var table = datatabletsConfiguration($("#dt_sueldos_salarios_EP"));
					// visualizar__actividades__sueldos_salarios(indicadorInformacion,table,parametro5,parametro1,parametro4);

						var table = datatabletsConfiguration($("#dt_sueldos_salarios_EP"),"004 - Operación deportiva - Sueldos y salarios");
							
						visualizar__actividades__sueldos_salarios(indicadorInformacion,table,parametro5,parametro1,parametro4);

					});

				});		
			},
			error:function(){
			}				
		});		
	});			
}


	/*===================================================
	=            Contratación Publica POA            =
	===================================================*/
	
	var obtenerContratacionPublicaPoaSeguimiento = function (tipo,idItem,idActividad,trimestre) {

		
	
		let paqueteDeDatos = new FormData();

		paqueteDeDatos.append("tipo", tipo);
		paqueteDeDatos.append("idItem", idItem);
		paqueteDeDatos.append("idActividad",idActividad);
		paqueteDeDatos.append("trimestre",trimestre);

		axios({
			method: "post",
			url: "modelosBd/POA_SEGUIMIENTO/selector.md.php",
			data: paqueteDeDatos,
			headers: { "Content-Type": "multipart/form-data" },
		}).then((response) => {

			

			var z = response.data.envio__informaciones;

			console.log(z.length)
			
			if(z.length < 1){

			   
				insertar__contrataciones__publicas_seguimiento_defecto(idItem,idActividad,trimestre);

				obtenerContratacionPublicaPoaSeguimiento2("obtener_contratacion_Publica_Seguimiento",idItem,idActividad,trimestre);

		
			}else{

				
				
			var tabla = document.getElementById('divContratacionPublicaSeguimiento');

			for (z of response.data.envio__informaciones) {

				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios normalizados</div>');
				
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');
				
				

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Catálogo Electrónico</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__elect" name="catalogo__elect" class="catalogo__elect checkeds enlazados__checkeds__contratos" value="catalogo__elect" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__elect__cantidad" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__elect__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__elect__monto" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__elect__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__elect__proveedor" name="catalogo__elect__proveedor" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" minlength="13" maxlength="13" id="catalogo__elect__rucProveedor" name="catalogo__elect__rucProveedor" class="catalogo__elect__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__elect__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__elect__texto" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__texto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__elect__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__elect__objeto" name="catalogo__elect__objeto" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Subasta Inversa Electrónica</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__subasta" name="catalogo__subasta" class="catalogo__subasta checkeds enlazados__checkeds__contratos" value="catalogo__subasta" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__subasta__cantidad" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__subasta__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__subasta__monto" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__subasta__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea style="width: 100%" id="catalogo__subasta__proveedor" name="catalogo__subasta__proveedor" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__subasta__rucProveedor" name="catalogo__subasta__rucProveedor" class="catalogo__subasta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__subasta__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea style="width: 100%" id="catalogo__subasta__texto" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__subasta__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__subasta__objeto" name="catalogo__subasta__objeto" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Ínfima Cuantía</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__infima" name="catalogo__infima" class="catalogo__infima checkeds enlazados__checkeds__contratos" value="catalogo__infima" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__infima__cantidad" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__infima__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__infima__monto" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__infima__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__infima__proveedor" name="catalogo__infima__proveedor" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__infima__rucProveedor" name="catalogo__infima__rucProveedor" class="catalogo__infima__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__infima__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__infima__texto" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__infima__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__infima__objeto" name="catalogo__infima__objeto" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__objeto+'</textarea></div>');


				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios no normalizados</div>');
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Menor Cuantía</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__menorCuantia" name="catalogo__menorCuantia" class="catalogo__menorCuantia checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantia" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantia__cantidad" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantia__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantia__monto" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantia__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__menorCuantia__proveedor" name="catalogo__menorCuantia__proveedor" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text"  maxlength="13" id="catalogo__menorCuantia__rucProveedor" name="catalogo__menorCuantia__rucProveedor" class="catalogo__menorCuantia__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantia__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__menorCuantia__texto" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__menorCuantia__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__menorCuantia__objeto" name="catalogo__menorCuantia__objeto" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Cotización</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__cotizacion" name="catalogo__cotizacion" class="catalogo__cotizacion checkeds enlazados__checkeds__contratos" value="catalogo__cotizacion" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacion__cantidad" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacion__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacion__monto" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacion__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__cotizacion__proveedor" name="catalogo__cotizacion__proveedor" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__cotizacion__rucProveedor" name="catalogo__cotizacion__rucProveedor" class="catalogo__cotizacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacion__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__cotizacion__texto" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__cotizacion__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__cotizacion__objeto" name="catalogo__cotizacion__objeto" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Licitación</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__licitacion" name="catalogo__licitacion" class="catalogo__licitacion checkeds enlazados__checkeds__contratos" value="catalogo__licitacion" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacion__cantidad" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacion__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacion__monto" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacion__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__licitacion__proveedor" name="catalogo__licitacion__proveedor" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__licitacion__rucProveedor" name="catalogo__licitacion__rucProveedor" class="catalogo__licitacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacion__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__licitacion__texto" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__licitacion__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__licitacion__objeto" name="catalogo__licitacion__objeto" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Obras</div>');
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Menor Cuantía</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__menorCuantiaObras" name="catalogo__menorCuantiaObras" class="catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantiaObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantiaObras__cantidad" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantiaObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantiaObras__monto" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantiaObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__menorCuantiaObras__proveedor" name="catalogo__menorCuantiaObras__proveedor" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__menorCuantiaObras__rucProveedor" name="catalogo__menorCuantiaObras__rucProveedor" class="catalogo__menorCuantiaObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantiaObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__menorCuantiaObras__texto" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__menorCuantiaObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__menorCuantiaObras__objeto" name="catalogo__menorCuantiaObras__objeto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Cotización</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__cotizacionObras" name="catalogo__cotizacionObras" class="catalogo__cotizacionObras checkeds enlazados__checkeds__contratos" value="catalogo__cotizacionObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacionObras__cantidad" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacionObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacionObras__monto" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacionObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__cotizacionObras__proveedor" name="catalogo__cotizacionObras__proveedor" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__cotizacionObras__rucProveedor" name="catalogo__cotizacionObras__rucProveedor" class="catalogo__cotizacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacionObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__cotizacionObras__texto" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__cotizacionObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__cotizacionObras__objeto" name="catalogo__cotizacionObras__objeto" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Licitación</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__licitacionObras" name="catalogo__licitacionObras" class="catalogo__licitacionObras checkeds enlazados__checkeds__contratos" value="catalogo__licitacionObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacionObras__cantidad" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacionObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacionObras__monto" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacionObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__licitacionObras__proveedor" name="catalogo__licitacionObras__proveedor" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__licitacionObras__rucProveedor" name="catalogo__licitacionObras__rucProveedor" class="catalogo__licitacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacionObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__licitacionObras__texto" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__licitacionObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__licitacionObras__objeto" name="catalogo__licitacionObras__objeto" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Precio Fijo</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__precioObras" name="catalogo__precioObras" class="catalogo__precioObras checkeds enlazados__checkeds__contratos" value="catalogo__precioObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__precioObras__cantidad" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__precioObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__precioObras__monto" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__precioObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__precioObras__proveedor" name="catalogo__precioObras__proveedor" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__precioObras__rucProveedor" name="catalogo__precioObras__rucProveedor" class="catalogo__precioObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__precioObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__precioObras__texto" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__licitacionObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__precioObras__objeto" name="catalogo__precioObras__objeto" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__objeto+'</textarea></div>');


				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Consultoría</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Contratación Directa</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__contratacionDirecta" name="catalogo__contratacionDirecta" class="catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionDirecta" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionDirecta__cantidad" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto solo__numero__montos" value="'+z.catalogo__contratacionDirecta__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionDirecta__monto" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto solo__numero__montos" value="'+z.catalogo__contratacionDirecta__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__contratacionDirecta__proveedor" name="catalogo__contratacionDirecta__proveedor" class="ancho__total__textareas catalogo__contratacionDirecta__texto">'+z.catalogo__contratacionDirecta__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__contratacionDirecta__rucProveedor" name="catalogo__contratacionDirecta__rucProveedor" class="ancho__total__textareas catalogo__contratacionDirecta__texto solo__numero__montos" value="'+z.catalogo__contratacionDirecta__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__contratacionDirecta__texto" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto">'+z.catalogo__contratacionDirecta__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__contratacionDirecta__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__contratacionDirecta__objeto" name="catalogo__contratacionDirecta__objeto" class="catalogo__contratacionDirecta__texto ancho__total__textareas">'+z.catalogo__contratacionDirecta__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Lista Corta</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__contratacionListaCorta" name="catalogo__contratacionListaCorta" class="catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionListaCorta" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionListaCorta__cantidad" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionListaCorta__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionListaCorta__monto" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionListaCorta__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__contratacionListaCorta__proveedor" name="catalogo__contratacionListaCorta__proveedor" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__contratacionListaCorta__rucProveedor" name="catalogo__contratacionListaCorta__rucProveedor" class="catalogo__contratacionListaCorta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionListaCorta__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__contratacionListaCorta__texto" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__contratacionListaCorta__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__contratacionListaCorta__objeto" name="catalogo__contratacionListaCorta__objeto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Concurso Público</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__contratacionConcursoPu" name="catalogo__contratacionConcursoPu" class="catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos" value="catalogo__contratacionConcursoPu" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionConcursoPu__cantidad" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionConcursoPu__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionConcursoPu__monto" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionConcursoPu__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__contratacionConcursoPu__proveedor" name="catalogo__contratacionConcursoPu__proveedor" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas">'+z.catalogo__contratacionConcursoPu__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__contratacionConcursoPu__rucProveedor" name="catalogo__contratacionConcursoPu__rucProveedor" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionConcursoPu__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__contratacionConcursoPu__texto" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas">'+z.catalogo__contratacionConcursoPu__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__contratacionConcursoPu__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__contratacionConcursoPu__objeto" name="catalogo__contratacionConcursoPu__objeto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas">'+z.catalogo__contratacionConcursoPu__objeto+'</textarea></div>');

				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-12 d d-flex justify-content-center flex-wrap"><a type="button" class="btn btn-primary  left__margen boton__enlacesOcultos" id="guardarCatalogoContraloriaDesarrollo" name="guardarIndicadoresDesarrollo" idpaidindicador="6288">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>');
				

				checkCatalogoContraloria__desdeBase(z.catalogo__elect,$("#catalogo__elect"), $(".catalogo__elect__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__subasta,$("#catalogo__subasta"), $(".catalogo__subasta__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__infima,$("#catalogo__infima"),$(".catalogo__infima__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantia,$("#catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__cotizacion,$("#catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__licitacion,$("#catalogo__licitacion"),$(".catalogo__licitacion__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantiaObras,$("#catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__cotizacionObras,$("#catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__licitacionObras,$("#catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__precioObras,$("#catalogo__precioObras"),$(".catalogo__precioObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__contratacionDirecta,$("#catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__contratacionListaCorta,$("#catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__contratacionConcursoPu,$("#catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));
				checkCatalogoContraloria__desdeBase(z.noAplica__3,$("#noAplica__3"),$(""));

			 
				
				$("#inputIdItem" ).val(z.idCatalogo);
				$("#guardarCatalogoContraloriaDesarrollo" ).attr('idCatalogo',z.idCatalogo);

				
			
				checkboxFunciones($(".catalogo__elect"),$(".catalogo__elect__texto"));
				checkboxFunciones($(".catalogo__subasta"),$(".catalogo__subasta__texto"));
				checkboxFunciones($(".catalogo__infima"),$(".catalogo__infima__texto"));
				checkboxFunciones($(".catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
				checkboxFunciones($(".catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
				checkboxFunciones($(".catalogo__licitacion"),$(".catalogo__licitacion__texto"));
				checkboxFunciones($(".catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
				checkboxFunciones($(".catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
				checkboxFunciones($(".catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
				checkboxFunciones($(".catalogo__precioObras"),$(".catalogo__precioObras__texto"));
				checkboxFunciones($(".catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
				checkboxFunciones($(".catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
				checkboxFunciones($(".catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));

				funcion__solo__numero__montos($(".solo__numero__montos"));
				   funcion__cambio__de__numero($(".solo__numero__montos"));

				insertar__contrataciones__publicas_seguimiento($("#guardarCatalogoContraloriaDesarrollo"));

			}

			}

		}).catch((error) => {



		});

	

}

var obtenerContratacionPublicaPoaSeguimiento2 = function (tipo,idItem,idActividad,trimestre) {


	let paqueteDeDatos = new FormData();

	paqueteDeDatos.append("tipo", tipo);
	paqueteDeDatos.append("idItem", idItem);
	paqueteDeDatos.append("idActividad",idActividad);
	paqueteDeDatos.append("trimestre",trimestre);

	axios({
		method: "post",
		url: "modelosBd/POA_SEGUIMIENTO/selector.md.php",
		data: paqueteDeDatos,
		headers: { "Content-Type": "multipart/form-data" },
	}).then((response) => {


		var tabla = document.getElementById('divContratacionPublicaSeguimiento');

			for (z of response.data.envio__informaciones) {

			   
				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios normalizados</div>');
				
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');
				
				

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Catálogo Electrónico</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__elect" name="catalogo__elect" class="catalogo__elect checkeds enlazados__checkeds__contratos" value="catalogo__elect" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__elect__cantidad" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__elect__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__elect__monto" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__elect__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__elect__proveedor" name="catalogo__elect__proveedor" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" minlength="13" maxlength="13" id="catalogo__elect__rucProveedor" name="catalogo__elect__rucProveedor" class="catalogo__elect__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__elect__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__elect__texto" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__texto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__elect__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__elect__objeto" name="catalogo__elect__objeto" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Subasta Inversa Electrónica</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__subasta" name="catalogo__subasta" class="catalogo__subasta checkeds enlazados__checkeds__contratos" value="catalogo__subasta" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__subasta__cantidad" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__subasta__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__subasta__monto" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__subasta__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea style="width: 100%" id="catalogo__subasta__proveedor" name="catalogo__subasta__proveedor" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__subasta__rucProveedor" name="catalogo__subasta__rucProveedor" class="catalogo__subasta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__subasta__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea style="width: 100%" id="catalogo__subasta__texto" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__subasta__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__subasta__objeto" name="catalogo__subasta__objeto" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Ínfima Cuantía</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__infima" name="catalogo__infima" class="catalogo__infima checkeds enlazados__checkeds__contratos" value="catalogo__infima" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__infima__cantidad" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__infima__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__infima__monto" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__infima__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__infima__proveedor" name="catalogo__infima__proveedor" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__infima__rucProveedor" name="catalogo__infima__rucProveedor" class="catalogo__infima__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__infima__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__infima__texto" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__infima__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__infima__objeto" name="catalogo__infima__objeto" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__objeto+'</textarea></div>');


				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios no normalizados</div>');
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Menor Cuantía</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__menorCuantia" name="catalogo__menorCuantia" class="catalogo__menorCuantia checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantia" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantia__cantidad" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantia__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantia__monto" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantia__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__menorCuantia__proveedor" name="catalogo__menorCuantia__proveedor" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text"  maxlength="13" id="catalogo__menorCuantia__rucProveedor" name="catalogo__menorCuantia__rucProveedor" class="catalogo__menorCuantia__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantia__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__menorCuantia__texto" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__menorCuantia__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__menorCuantia__objeto" name="catalogo__menorCuantia__objeto" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Cotización</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__cotizacion" name="catalogo__cotizacion" class="catalogo__cotizacion checkeds enlazados__checkeds__contratos" value="catalogo__cotizacion" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacion__cantidad" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacion__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacion__monto" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacion__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__cotizacion__proveedor" name="catalogo__cotizacion__proveedor" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__cotizacion__rucProveedor" name="catalogo__cotizacion__rucProveedor" class="catalogo__cotizacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacion__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__cotizacion__texto" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__cotizacion__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__cotizacion__objeto" name="catalogo__cotizacion__objeto" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Licitación</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__licitacion" name="catalogo__licitacion" class="catalogo__licitacion checkeds enlazados__checkeds__contratos" value="catalogo__licitacion" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacion__cantidad" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacion__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacion__monto" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacion__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__licitacion__proveedor" name="catalogo__licitacion__proveedor" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__licitacion__rucProveedor" name="catalogo__licitacion__rucProveedor" class="catalogo__licitacion__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacion__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__licitacion__texto" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__licitacion__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__licitacion__objeto" name="catalogo__licitacion__objeto" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Obras</div>');
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Menor Cuantía</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__menorCuantiaObras" name="catalogo__menorCuantiaObras" class="catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantiaObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantiaObras__cantidad" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantiaObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__menorCuantiaObras__monto" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantiaObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__menorCuantiaObras__proveedor" name="catalogo__menorCuantiaObras__proveedor" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__menorCuantiaObras__rucProveedor" name="catalogo__menorCuantiaObras__rucProveedor" class="catalogo__menorCuantiaObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__menorCuantiaObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__menorCuantiaObras__texto" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__menorCuantiaObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__menorCuantiaObras__objeto" name="catalogo__menorCuantiaObras__objeto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Cotización</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__cotizacionObras" name="catalogo__cotizacionObras" class="catalogo__cotizacionObras checkeds enlazados__checkeds__contratos" value="catalogo__cotizacionObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacionObras__cantidad" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacionObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__cotizacionObras__monto" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacionObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__cotizacionObras__proveedor" name="catalogo__cotizacionObras__proveedor" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__cotizacionObras__rucProveedor" name="catalogo__cotizacionObras__rucProveedor" class="catalogo__cotizacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__cotizacionObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__cotizacionObras__texto" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__cotizacionObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__cotizacionObras__objeto" name="catalogo__cotizacionObras__objeto" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Licitación</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__licitacionObras" name="catalogo__licitacionObras" class="catalogo__licitacionObras checkeds enlazados__checkeds__contratos" value="catalogo__licitacionObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacionObras__cantidad" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacionObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__licitacionObras__monto" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacionObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__licitacionObras__proveedor" name="catalogo__licitacionObras__proveedor" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__licitacionObras__rucProveedor" name="catalogo__licitacionObras__rucProveedor" class="catalogo__licitacionObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__licitacionObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__licitacionObras__texto" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__licitacionObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__licitacionObras__objeto" name="catalogo__licitacionObras__objeto" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Precio Fijo</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__precioObras" name="catalogo__precioObras" class="catalogo__precioObras checkeds enlazados__checkeds__contratos" value="catalogo__precioObras" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__precioObras__cantidad" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__precioObras__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__precioObras__monto" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__precioObras__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__precioObras__proveedor" name="catalogo__precioObras__proveedor" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__precioObras__rucProveedor" name="catalogo__precioObras__rucProveedor" class="catalogo__precioObras__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__precioObras__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__precioObras__texto" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__licitacionObras__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__precioObras__objeto" name="catalogo__precioObras__objeto" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__objeto+'</textarea></div>');


				tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Consultoría</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Nombre</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Check</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Cantidad</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-center">Monto</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">Proveedor</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-center">RUC</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-center">Link C.P.</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Contratación Directa</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__contratacionDirecta" name="catalogo__contratacionDirecta" class="catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionDirecta" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionDirecta__cantidad" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto solo__numero__montos" value="'+z.catalogo__contratacionDirecta__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionDirecta__monto" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto solo__numero__montos" value="'+z.catalogo__contratacionDirecta__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__contratacionDirecta__proveedor" name="catalogo__contratacionDirecta__proveedor" class="ancho__total__textareas catalogo__contratacionDirecta__texto">'+z.catalogo__contratacionDirecta__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__contratacionDirecta__rucProveedor" name="catalogo__contratacionDirecta__rucProveedor" class="ancho__total__textareas catalogo__contratacionDirecta__texto solo__numero__montos" value="'+z.catalogo__contratacionDirecta__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__contratacionDirecta__texto" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto">'+z.catalogo__contratacionDirecta__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__contratacionDirecta__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__contratacionDirecta__objeto" name="catalogo__contratacionDirecta__objeto" class="catalogo__contratacionDirecta__texto ancho__total__textareas">'+z.catalogo__contratacionDirecta__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Lista Corta</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__contratacionListaCorta" name="catalogo__contratacionListaCorta" class="catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionListaCorta" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionListaCorta__cantidad" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionListaCorta__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionListaCorta__monto" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionListaCorta__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__contratacionListaCorta__proveedor" name="catalogo__contratacionListaCorta__proveedor" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__contratacionListaCorta__rucProveedor" name="catalogo__contratacionListaCorta__rucProveedor" class="catalogo__contratacionListaCorta__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionListaCorta__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__contratacionListaCorta__texto" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__contratacionListaCorta__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__contratacionListaCorta__objeto" name="catalogo__contratacionListaCorta__objeto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__objeto+'</textarea></div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col col-2">Concurso Público</div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="checkbox" id="catalogo__contratacionConcursoPu" name="catalogo__contratacionConcursoPu" class="catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos" value="catalogo__contratacionConcursoPu" /></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionConcursoPu__cantidad" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionConcursoPu__cantidad+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-1 text-left"><input type="text" id="catalogo__contratacionConcursoPu__monto" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionConcursoPu__monto+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><textarea id="catalogo__contratacionConcursoPu__proveedor" name="catalogo__contratacionConcursoPu__proveedor" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas">'+z.catalogo__contratacionConcursoPu__proveedor+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="text" maxlength="13" id="catalogo__contratacionConcursoPu__rucProveedor" name="catalogo__contratacionConcursoPu__rucProveedor" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas solo__numero__montos" value="'+z.catalogo__contratacionConcursoPu__rucProveedor+'"></input></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-3 text-left"><textarea id="catalogo__contratacionConcursoPu__texto" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas">'+z.catalogo__contratacionConcursoPu__texto+'</textarea></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-right"><span class="catalogo__contratacionConcursoPu__texto">Objeto de la Contratación</span></div>');
				tabla.insertAdjacentHTML('beforeend','<div class="col col-6" style="font-weight:bold; text-align:center;"><textarea id="catalogo__contratacionConcursoPu__objeto" name="catalogo__contratacionConcursoPu__objeto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas">'+z.catalogo__contratacionConcursoPu__objeto+'</textarea></div>');

				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-12 d d-flex justify-content-center flex-wrap"><a type="button" class="btn btn-primary  left__margen boton__enlacesOcultos" id="guardarCatalogoContraloriaDesarrollo" name="guardarIndicadoresDesarrollo" idpaidindicador="6288">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>');
				

				checkCatalogoContraloria__desdeBase(z.catalogo__elect,$("#catalogo__elect"), $(".catalogo__elect__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__subasta,$("#catalogo__subasta"), $(".catalogo__subasta__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__infima,$("#catalogo__infima"),$(".catalogo__infima__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantia,$("#catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__cotizacion,$("#catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__licitacion,$("#catalogo__licitacion"),$(".catalogo__licitacion__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantiaObras,$("#catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__cotizacionObras,$("#catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__licitacionObras,$("#catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__precioObras,$("#catalogo__precioObras"),$(".catalogo__precioObras__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__contratacionDirecta,$("#catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__contratacionListaCorta,$("#catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
				checkCatalogoContraloria__desdeBase(z.catalogo__contratacionConcursoPu,$("#catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));
				checkCatalogoContraloria__desdeBase(z.noAplica__3,$("#noAplica__3"),$(""));

				$("#inputIdItem" ).val(z.idCatalogo);
				$("#guardarCatalogoContraloriaDesarrollo" ).attr('idCatalogo',z.idCatalogo);
			
				checkboxFunciones($(".catalogo__elect"),$(".catalogo__elect__texto"));
				checkboxFunciones($(".catalogo__subasta"),$(".catalogo__subasta__texto"));
				checkboxFunciones($(".catalogo__infima"),$(".catalogo__infima__texto"));
				checkboxFunciones($(".catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
				checkboxFunciones($(".catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
				checkboxFunciones($(".catalogo__licitacion"),$(".catalogo__licitacion__texto"));
				checkboxFunciones($(".catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
				checkboxFunciones($(".catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
				checkboxFunciones($(".catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
				checkboxFunciones($(".catalogo__precioObras"),$(".catalogo__precioObras__texto"));
				checkboxFunciones($(".catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
				checkboxFunciones($(".catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
				checkboxFunciones($(".catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));

				funcion__solo__numero__montos($(".solo__numero__montos"));
				   funcion__cambio__de__numero($(".solo__numero__montos"));

				insertar__contrataciones__publicas_seguimiento($("#guardarCatalogoContraloriaDesarrollo"));

			}

	   
		

	}).catch((error) => {



	});


}
	/*===================================================
	=          NO  Contratación Publica POA            =
	===================================================*/
	
	var noContratacionPublicaPoaSeguimiento = function (idItem,trimestre,actividad) {

		$('#divNoContratacionPublicaSeguimiento div').remove();

			var tabla = document.getElementById('divNoContratacionPublicaSeguimiento');

				tabla.insertAdjacentHTML('beforeend','<div class="col-sm-6" centre>Ingrese Justificación para No Contratación</div>');

				tabla.insertAdjacentHTML('beforeend','<div class="col-sm-12"><textarea id="justificacion_no_contratacion" name="justificacion_no_contratacion" class="justificacion_no_contratacion" style="width:100%;"></textarea></div>');
				
				tabla.insertAdjacentHTML('beforeend','<div class="col col-12 d d-flex justify-content-center flex-wrap"><a type="button" class="btn btn-primary  left__margen boton__enlacesOcultos"  id="guardarNoContratacion" name="guardarNoContratacion" idpaidindicador="6288">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>');
			
				$("#guardarNoContratacion").attr("idItem",idItem);
				$("#guardarNoContratacion").attr("trimestre",trimestre);
				$("#guardarNoContratacion").attr("actividad",actividad);

				insertar__registro_contrataciones__publicas_seguimiento2($("#guardarNoContratacion"),"No",$("#justificacion_no_contratacion"));

	}

	/*===================================
	=            JURISDICCION           =
	===================================*/
	
	// var guardar_zonales_juridicciones1=function(parametro1,parametro2,parametro3,tipo){

	// 	$(parametro3).click(function(e) {

	// 		$(parametro1).html(' ');
	// 		$(".oculto__trimestrales").hide();

	// 		var paqueteDeDatos = new FormData();

	// 		paqueteDeDatos.append('tipo',tipo);
	// 		paqueteDeDatos.append('idOrganismos',parametro2);

	// 		$.ajax({

	// 			type:"POST",
	// 			url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
	// 			contentType: false,
	// 			data:paqueteDeDatos,
	// 			processData: false,
	// 			cache: false, 
	// 			success:function(response){

	// 				$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

	// 					var elementos=JSON.parse(response);

	// 					var indicadorInformacion=elementos['indicadorInformacion'];

	// 					for (z of indicadorInformacion) {

	// 						let trimestresV="";

	// 						if($("#trimestreEvaluador").val()=="primerTrimestre"){
	// 							trimestresV=z.primertrimestre;
	// 						}else if($("#trimestreEvaluador").val()=="segundoTrimestre"){
	// 							trimestresV=z.segundotrimestre;
	// 						}else if($("#trimestreEvaluador").val()=="tercerTrimestre"){
	// 							trimestresV=z.tercertrimestre;
	// 						}else if($("#trimestreEvaluador").val()=="cuartoTrimestre"){
	// 							trimestresV=z.cuartotrimestre;
	// 						}
				
	// 							//$(parametro1).append('<tr class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.idActividades+'</center></td><td>'+z.nombreActividades+'</td><td>'+z.indicador+'</td><td><center><input type="checkbox" id="idActi'+z.idActividades+'" name="idActi'+z.idActividades+'" class="checkeds__dinamicos__indicadores"/></center></td></tr>');
	// 							//checkeds__recorridos($(".checkeds__dinamicos__indicadores"),$("#idActi"+z.idActividades),$("#contadorIndicador"),$(".oculto__trimestrales"),$(".contenedor__trimestres"),[z.idActividades,z.nombreActividades,z.indicador,trimestresV,z.metaindicador],parametro2,$("#trimestreEvaluador").val());
								
	// 							 $(parametro1).append('<tr id="filaIndicadora"class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.idActividades+'</center></td><td>'+z.nombreActividades+'</td><td>'+z.indicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+trimestresV+'" class="solo__numeros ancho__total__input text-center obligatorios" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+trimestresV+'" class="solo__numeros ancho__total__input text-center obligatorios" /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><input type="file" accept="application/pdf" id="documentoSustento'+z.idActividades+'" name="documentoSustento'+z.idActividades+'" class="ancho__total__input obligatorios'+z.idActividades+'" /></td><td><a id="guardar'+z.idActividades+'" parametro7="'+parametro2+'" parametro8="'+$("#trimestreEvaluador").val()+'" name="guardar'+z.idActividades+'" idContador="'+z.idActividades+'" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td></tr>');								 
				

	// 							 funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));
	// 							 funcion__solo__numero($(".solo__numeros"));							 
	// 							 //funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),z.metaindicador);
								
	// 							 $("#guardar"+z.idActividades).click(function(e) {

	// 								let idContador=$(this).attr('idContador');
	// 								let parametro7=$(this).attr('parametro7');
	// 								let parametro8=$(this).attr('parametro8');

	// 								console.log(idContador,parametro7,parametro8)
									
	// 								funcion__guardado__general2023($("#guardar"+idContador),$(".obligatorios"+idContador),[$("#totalProgramado"+idContador).val(),$("#totalEjecutado"+idContador).val(),parametro7,idContador,parametro8],$("#documentoSustento"+idContador),"seguimiento__indicadores2023",$(".filaIndicadora"+idContador),$(".oculto__trimestrales"));

	// 							}); 
	// 						// }
 					

	// 					}


	// 				});		

	// 			},
	// 			error:function(){

	// 			}
					
	// 		});		

	// 	});			

	// }

/*=====  End of Indicadores  ======*/

/*==========================================
=            PRESUPUESTARIO           =
==========================================*/


/*====================================
=            Capacitación            =
====================================*/

var mantenimiento__capacitacion_PRESUPUESTARIO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro3).click(function(e) {

		$(parametro1).html(' ');

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','deportivas__tecnico__seguis');
		paqueteDeDatos.append('idOrganismos',parametro2);
		paqueteDeDatos.append('trimestre', parametro5);

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
			url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

					
					$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];
						
						var table = datatabletsConfiguration($("#dt_segui_capacitacion_deportiva_recreacion1"),"003 - Capacitación deportiva o de recreación - Ejecución presupuestaria");
						
						visualizar__actividades__mantenimiento__capacitacion_PRESUPUESTARIO(indicadorInformacion,table,parametro5,parametro1,parametro4)



					});	

				

				});		

			},
			error:function(){

			}
				
		});		

	});			

}


/*=====  End of Capacitación  ======*/


/*===================================
=            Competencia            =
===================================*/

var actividades__deportivas__competencia_PRESUPUESTARIO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro3).click(function(e) {

		$(parametro1).html(' ');

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','deportivas__competencias__seguis');
		paqueteDeDatos.append('idOrganismos',parametro2);
		paqueteDeDatos.append('trimestre', parametro5);

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
			url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

					
					$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];
						
						var table = datatabletsConfiguration($("#dt_segui_eventos_prepa_competencia"),"005 - Eventos de preparación y competencia - Ejecución presupuestaria");
						
						visualizar__actividades__competencia_PRESUPUESTARIO(indicadorInformacion,table,parametro5,parametro1,parametro4)



					});	
					
				});		

			},
			error:function(){

			}
				
		});		

	});			

}


/*=====  End of Competencia  ======*/

/*=================================================
	=            Actividades mantenimiento            =
	=================================================*/
	
	var mantenimiento__seguimientos_PRESUPUESTARIO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','mantenimiento__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

					

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){

							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							
							var table = datatabletsConfiguration($("#dt_segui_mantenimiento_EP"),"002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria");
							
							visualizar__actividades__mantenimiento_presupuestario(indicadorInformacion,table,parametro5,parametro1,parametro4)

	
	
						});	


						


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}


	/*=====  End of Actividades mantenimiento  ======*/
	

/*==================================
	=            Recreativo            =
	==================================*/
	
	var recreativo__checkeds_PRESUPUESTARIO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__recreacion__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){

							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							
							var table = datatabletsConfiguration($("#dt_segui_acti_recreaticas1"),"006 - Actividades recreativas - Ejecución presupuestaria");
							
							visualizar__actividades__recreativo_PRESUPUESTARIO(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	

					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	
	/*=====  End of Recreativo  ======*/
	


	/*===================================================
	=            Actividades administrativas            =
	===================================================*/
	
	var administrativas__seguimientos_PRESUPUESTARIO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','administrativos__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){

							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							
							var table = datatabletsConfiguration($("#dt_segui_administrativo_AP2023"),"001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria");
							
							visualizar__actividades__administrativas_PRESUPUESTARIO(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	
	/*=====  End of Actividades administrativas  ======*/


	/*==================================
	=            Honorarios            =
	==================================*/
		
	var honorarios__seguimientos_TECNICO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','honorarios__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){
					

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){


							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);

								var indicadorInformacion=elementos['indicadorInformacion'];
								
								var table = datatabletsConfiguration($("#dt_segui_honorarios"),"004 - Operación deportiva - Honorarios");
								
								visualizar__actividades__honorarios__seguimientos_TECNICO(indicadorInformacion,table,parametro5,parametro1,parametro4)
	
							});	
	

					});		

				},
				error:function(){

				}
					
			});		

		});			

	}


	/*=====  End of Honorarios  ======*/

		/*======================================
	=            Implementación            =
	======================================*/
	
	var implementacion__checkeds_TECNICO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__implementacion__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							
							var table = datatabletsConfiguration($("#dt_segui_implementacion_deportiva"),"007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica");
							
							visualizar__actividades__implementacion_TECNICO(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	


					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	
	
	/*=====  End of Implementación  ======*/

	/*===========================================================
	=            Actividades mantenimientos tecnicos            =
	===========================================================*/

	var mantenimiento__seguimientos__tecnicos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','mantenimiento__seguis__tecnicos');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
	
							
							var table = datatabletsConfiguration($("#dt_segui_mantenimiento_escenarios_IT"),"002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica");
							
							visualizar__actividades__mantenimiento_TECNICO(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	

					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	
	
	/*=====  End of Actividades mantenimientos tecnicos  ======*/
	

		/*========================================
	=            Competencia alto            =
	========================================*/

	var capacitacion__alto_TECNICO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__tecnico__seguis__altos');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						


						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							console.log(indicadorInformacion)
							
							var table = datatabletsConfiguration($("#dt_segui_alto_rendimiento"),"005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica");
							
							visualizar__actividades__capacitacion__alto_TECNICO1(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	
					});		

				},
				error:function(){

				}
					
			});		

		});			

	}


	/*=====  End of Competencia alto  ======*/

	/*=============================================
	=             Capacitación técnica            =
	=============================================*/
	
	var mantenimiento__capacitacion__tecnico=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__tecnico__seguis__capacitacion');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							console.log(indicadorInformacion)
							
							var table = datatabletsConfiguration($("#dt_segui_capacitacion_deportiva_recreacion"),"003 - Capacitación deportiva o de recreación - Información técnica");
							
							visualizar__actividades__capacitacion__tecnico(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	
					});		

				},
				error:function(){

				}
					
			});		

		});			

	}

	
	/*=====  End of  Capacitación técnica  ======*/


	
	/*=============================================
	=            Competencia formativa            =
	=============================================*/
	
	var capacitacion__formativo_TECNICO=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro3).click(function(e) {

			$(parametro1).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','deportivas__tecnico__tecnico__seguis');
			paqueteDeDatos.append('idOrganismos',parametro2);
			paqueteDeDatos.append('trimestre', parametro5);

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
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						

						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							console.log(indicadorInformacion)
							
							var table = datatabletsConfiguration($("#dt_segui_deporte_formativo"),"005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica");
							
							visualizar__actividades__formativo_TECNICO(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	

					
					});		

				},
				error:function(){

				}
					
			});		

		});			

	}


	/*=====  End of Competencia formativa  ======*/

/*==========================================
=            Recreativo Técnico            =
==========================================*/
var recreativo__tecnicos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro3).click(function(e) {

		$(parametro1).html(' ');

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo','deportivas__tecnico__recreativas');
		paqueteDeDatos.append('idOrganismos',parametro2);
		paqueteDeDatos.append('trimestre', parametro5);

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
			url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){



						$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
							var elementos=JSON.parse(response);

							var indicadorInformacion=elementos['indicadorInformacion'];
							console.log(indicadorInformacion)
							
							var table = datatabletsConfiguration($("#dt_segui_acti_recreaticas2"),"006 - Actividades recreativas - Información técnica");
							
							visualizar__actividades__recreativo__tecnicos(indicadorInformacion,table,parametro5,parametro1,parametro4)

						});	
				});		

			},
			error:function(){

			}
				
		});		

	});			

}



/*=========================================
=            Tablas visores_actividades            =
=========================================*/
	
var visores_actividades_seguimiento2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro1).click(function(e) {

			$(parametro2).html(' ');

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro5);
			paqueteDeDatos.append('idOrganismos',parametro3);
			paqueteDeDatos.append('trimestres',parametro4);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				async: false,
				success:function(response){

					$.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

						$(".fila__corresponsal").remove()

						var elementos=JSON.parse(response);

						var indicadorInformacion=elementos['indicadorInformacion'];
						
						if (parametro5=="sueldos__seguimientos__tablas") {

							$(".cuerpo__sueldos__slaraios__seguimientos__2").html(" ");

							for (z of indicadorInformacion) {

								$(parametro2).append('<tr class="fila__corresponsal fila__'+z.idSueldosSeguimeintos+'"><td><center>'+z.mes+'</center></td><td><center>'+z.cedula+'</center></td><td><center>'+z.tipoCargo+'</center></td><td><center>'+z.nombres+'</center></td><td><input type="text" id="sueldoProgramado'+z.idSueldosSeguimeintos+'" name="sueldoProgramado'+z.idSueldosSeguimeintos+'" value="'+z.sueldoSalarioPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__sueldo'+z.idSueldosSeguimeintos+'"><input type="text" id="sueldoEjecutado'+z.idSueldosSeguimeintos+'" name="sueldoEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.sueldoSalarioEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__sueldos'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="aporteProgramado'+z.idSueldosSeguimeintos+'" name="aporteProgramado'+z.idSueldosSeguimeintos+'" value="'+z.aporteIessPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__aporte'+z.idSueldosSeguimeintos+'"><input type="text" id="aporteEjecutado'+z.idSueldosSeguimeintos+'" name="aporteEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.aporteIessEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__aporte'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="decimoTercerProgramado'+z.idSueldosSeguimeintos+'" name="decimoTercerProgramado'+z.idSueldosSeguimeintos+'" value="'+z.decimoTerceroPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__decimoTercer'+z.idSueldosSeguimeintos+'"><input type="text" id="decimoTercerEjecutado'+z.idSueldosSeguimeintos+'" name="decimoTercerEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.decimoTerceroEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__decimoTercer'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="decimoCuartoProgramado'+z.idSueldosSeguimeintos+'" name="decimoCuartoProgramado'+z.idSueldosSeguimeintos+'" value="'+z.decimoCuartoPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__decimoCuarto'+z.idSueldosSeguimeintos+'"><input type="text" id="decimoCuartoEjecutado'+z.idSueldosSeguimeintos+'" name="decimoCuartoEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.decimoCuartoEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__decimoCuarto'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><input type="text" id="fondosReservaProgramado'+z.idSueldosSeguimeintos+'" name="fondosReservaProgramado'+z.idSueldosSeguimeintos+'" value="'+z.fondosReservasPlanificado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'" style="border:none;" disabled="disabled"/></td><td class="celda__fondo'+z.idSueldosSeguimeintos+'"><input type="text" id="fondosReservaEjecutado'+z.idSueldosSeguimeintos+'" name="fondosReservaEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.fondosReservasEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__fondosReservas'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><center>'+z.compensacionDeshaucioProgramado+'</center></td><td class="celda__fondo'+z.idSueldosSeguimeintos+'"><input type="text" id="compensacionDeshaucioEjecutado'+z.idSueldosSeguimeintos+'" name="compensacionDeshaucioEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.compensacionDeshaucioEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__fondosReservas'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><center>'+z.despidoIntepestivoProgramado+'</center></td><td class="celda__fondo'+z.idSueldosSeguimeintos+'"><input type="text" id="despidoIntepestivoEjecutado'+z.idSueldosSeguimeintos+'" name="despidoIntepestivoEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.despidoIntepestivoEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__fondosReservas'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><center>'+z.reunciaVoluntariaProgramado+'</center></td><td class="celda__fondo'+z.idSueldosSeguimeintos+'"><input type="text" id="renunciaVoluntariaEjecutado'+z.idSueldosSeguimeintos+'" name="renunciaVoluntariaEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.renunciaVoluntariaEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__fondosReservas'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td><td><center>'+z.vacacionesProgramado+'</center></td><td class="celda__fondo'+z.idSueldosSeguimeintos+'"><input type="text" id="vacionesEjecutado'+z.idSueldosSeguimeintos+'" name="vacionesEjecutado'+z.idSueldosSeguimeintos+'" value="'+z.vacionesEjecutado+'" class="solo__numeros__montos ancho__total__input text-center obligatorios'+z.idSueldosSeguimeintos+'"/><div class="rotulo__fondosReservas'+z.idSueldosSeguimeintos+'" style="text-align:center; widht:100%;"></div></td>              <td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="editarInfor'+z.idSueldosSeguimeintos+'" name="editarInfor'+z.idSueldosSeguimeintos+'" idPrincipal="'+z.idSueldosSeguimeintos+'" idContador="'+z.idSueldosSeguimeintos+'" class="editar__ides"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><li><a style="cursor:pointer;" id="eliminarInfor'+z.idSueldosSeguimeintos+'" name="eliminarInfor'+z.idSueldosSeguimeintos+'" idPrincipal="'+z.idSueldosSeguimeintos+'" idContador="'+z.idSueldosSeguimeintos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(".cuerpo__sueldos__slaraios__seguimientos__2").append('<tr><td><center>'+z.mes+'</center></td><td><center>'+z.cedula+'</center></td><td><center>'+z.tipoCargo+'</center></td><td><center>'+z.nombres+'</center></td><td>'+z.sueldoSalarioPlanificado+'</td><td>'+z.sueldoSalarioEjecutado+'</td><td>'+z.aporteIessPlanificado+'</td><td>'+z.aporteIessEjecutado+'</td><td>'+z.decimoTerceroPlanificado+'</td><td>'+z.decimoTerceroEjecutado+'</td><td>'+z.decimoCuartoPlanificado+'</td><td>'+z.decimoCuartoEjecutado+'</td><td>'+z.fondosReservasPlanificado+'</td><td>'+z.fondosReservasEjecutado+'</td>          <td>'+z.compensacionDeshaucioProgramado+'</td><td>'+z.compensacionDeshaucioEjecutado+'</td><td>'+z.despidoIntepestivoProgramado+'</td><td>'+z.despidoIntepestivoEjecutado+'</td><td>'+z.reunciaVoluntariaProgramado+'</td><td>'+z.renunciaVoluntariaEjecutado+'</td><td>'+z.vacacionesProgramado+'</td><td>'+z.vacionesEjecutado+'</td></tr>');

									funcion__cambio__de__numero($("#sueldoEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#aporteEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#decimoTercerEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#decimoCuartoEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#fondosReservaEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#compensacionDeshaucioEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#despidoIntepestivoEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#renunciaVoluntariaEjecutado"+z.idSueldosSeguimeintos));
									funcion__cambio__de__numero($("#vacionesEjecutado"+z.idSueldosSeguimeintos));
									
									funcion__solo__numero__montos($(".solo__numeros__montos"));

									$("#eliminarInfor"+z.idSueldosSeguimeintos).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
										
										funcion__eliminar__general(idPrincipal,'eliminar__sueldos__salarios__seguimiento');

									}); 

									$("#editarInforDesvinculaciones"+z.idSueldosSeguimeintos).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');
																			
										funcion__editar__general($("#editarInforDesvinculaciones"+idContador),$(".obligatorios__nos"+idContador),"editar__sueldos__salarios__desvinculaciones",[idPrincipal,$("#compensacionDeshaucioEjecutado"+idContador).val(),$("#despidoIntepestivoEjecutado"+idContador).val(),$("#renunciaVoluntariaEjecutado"+idContador).val(),$("#vacionesEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],false,false,false);

										

									}); 


									$("#editarInfor"+z.idSueldosSeguimeintos).click(function(e) {

										let idContador=$(this).attr('idContador');
										let idPrincipal=$(this).attr('idPrincipal');

										funcion__editar__general__seguimiento__2023($("#editarInfor"+idContador),$(".obligatorios__nos"+idContador),"editar__sueldos__salarios__visores",[idPrincipal,$("#sueldoEjecutado"+idContador).val(),$("#aporteEjecutado"+idContador).val(),$("#decimoTercerEjecutado"+idContador).val(),$("#decimoCuartoEjecutado"+idContador).val(),$("#fondosReservaEjecutado"+idContador).val(),$("#compensacionDeshaucioEjecutado"+idContador).val(),$("#despidoIntepestivoEjecutado"+idContador).val(),$("#renunciaVoluntariaEjecutado"+idContador).val(),$("#vacionesEjecutado"+idContador).val(),idContador,$("#organismoIdPrin").val()],false,false,false);

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
								//*****  INDICADORES  ***** */
								// $(parametro2).append('<tr class="fila__corresponsal fila__'+z.idModificaIndicadores+'"><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+z.totalProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+z.totalEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" disabled="disabled /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><center><input type="file" id="documentoSustento'+z.idActividades+'" name="documentoSustento'+z.idActividades+'" class="ancho__total__input" /><div class="documento__seguimiento'+z.idActividades+'"></div></center></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="editarInfor'+z.idActividades+'" name="editarInfor'+z.idActividades+'" idPrincipal="'+z.idModificaIndicadores+'" idContador="'+z.idActividades+'" class="editar__ides"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><li><a style="cursor:pointer;" id="eliminarInfor'+z.idActividades+'" name="eliminarInfor'+z.idActividades+'" idPrincipal="'+z.idModificaIndicadores+'" idContador="'+z.idActividades+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

								$(parametro2).append('<tr class="fila__corresponsal fila__'+z.idModificaIndicadores+'"><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+z.totalProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+z.totalEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" disabled="disabled /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idActividades+'" name="eliminarInfor'+z.idActividades+'" idPrincipal="'+z.idModificaIndicadores+'" idContador="'+z.idActividades+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


								$(".cuerpo__indicadores__seguimientos__2").append('<tr><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td>'+z.totalProgramado+'</td><td>'+z.totalEjecutado+'</td></tr>');

								$(".documento__seguimiento"+z.idActividades).append('<a href="'+$("#filesFrontend").val()+'seguimiento/indicadoresDocumento/'+z.documento+'" target="_blank" class="text-center">'+z.documento+'</a>');

								funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));

								funcion__solo__numero($(".solo__numeros"));

								funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),4888888888889);

								//funcion_porcentajes__colores__auto__ejecutables($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades));

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


						if (parametro5=="indicadores__seguimientos__tablas_estado_cuenta") {

							$(".cuerpo__indicadores__seguimientos_estado_cuenta").html(" ");

							for (z of indicadorInformacion) {
								
								$(parametro2).append('<tr class="fila__corresponsal fila__'+z.idModificaIndicadores+'"><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+z.totalProgramado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+z.totalEjecutado+'" class="solo__numeros ancho__total__input text-center obligatorios'+z.idActividades+'" disabled="disabled /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idActividades+'" name="eliminarInfor'+z.idActividades+'" idPrincipal="'+z.idModificaIndicadores+'" idContador="'+z.idActividades+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');


								$(".cuerpo__indicadores__seguimientos__2").append('<tr><td>'+z.idActividades+'</td><td>'+z.nombreActividades+'</td><td>'+z.nombreIndicador+'</td><td>'+z.totalProgramado+'</td><td>'+z.totalEjecutado+'</td></tr>');

								$(".documento__seguimiento"+z.idActividades).append('<a href="'+$("#filesFrontend").val()+'seguimiento/indicadoresDocumento/'+z.documento+'" target="_blank" class="text-center">'+z.documento+'</a>');

								funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));

								funcion__solo__numero($(".solo__numeros"));

								funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),4888888888889);

							

								$("#eliminarInfor"+z.idActividades).click(function(e) {

									let idContador=$(this).attr('idContador');
									let idPrincipal=$(this).attr('idPrincipal');
									
									funcion__eliminar__general(idPrincipal,'eliminar__indicador__seguimiento');

								}); 

							}

						}




						if (parametro5=="indicadores__seguimientos__tablas_estado_cuenta") {

							var indicadorInformacion2=elementos['indicadorInformacion2']; 
							
							console.log("VER INDICADOR NRO 2");
							console.log(indicadorInformacion2);
							if (indicadorInformacion2!=null && indicadorInformacion2!="") {

								for (l of indicadorInformacion2) {

									$(".cuerpo__indicadores__seguimientos__2__estado__cuenta").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.id_estado_cuenta+'"><td>'+l.fecha+'</td><td>'+l.trimestre+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/estadosCuenta//'+l.documento+'" target="_blank">'+l.documento+'</a></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.id_estado_cuenta+'" name="eliminarInfor__otros'+l.id_estado_cuenta+'" idPrincipal="'+l.id_estado_cuenta+'" idContador="'+l.id_estado_cuenta+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.id_estado_cuenta).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__estado_cuenta_indicadores');

										}); 				

								}

							}else{

								$("#indicadores__seguimientos__2__estado_cuenta").hide();

							}

					
							

						}




						if (parametro5=="honorarios__seguimientos__tablas") {


							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							

								$("#otros__honorarios__edicion").hide();

							

								$("#honorarios__facturas__edicion").hide();

							

							$(".cuerpo__honorarios__seguimientos__2").html(' ');

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#honorarios__seguimientos"),"004 - Operación deportiva - Honorarios");
								
								visor__actividades__honorarios(indicadorInformacion,table)
	
							});	

						}


						if (parametro5=="administrativo__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2']; 
							var indicadorInformacion3=elementos['indicadorInformacion3'];
							var indicadorInformacion4=elementos['indicadorInformacion4'];

							
							$("#otros__editas__administativos").hide();

							
							$("#administrativos__editares").hide();

							

							$(".cuerpo__administrativo__seguimientos tr").remove();

							
							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#administrativos__seguimientos"),"001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria");
								
								visor__actividades__administrativas__presupuestario(indicadorInformacion,table)
	
							});	

						}


						if (parametro5=="administrativo__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2']; 
							var indicadorInformacion3=elementos['indicadorInformacion3'];
							var indicadorInformacion4=elementos['indicadorInformacion4'];

							if (indicadorInformacion4!=null && indicadorInformacion4!="") {
								
							//********  ESTADO CUENTA  ******* */
								for (l of indicadorInformacion4) {

									$(".carga_datos_estado_cuenta_EP").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.id_estado_cuenta+'"><td>'+l.fecha+'</td><td>'+l.trimestre+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/estadosCuenta//'+l.documento+'" target="_blank">'+l.documento+'</a></td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.id_estado_cuenta+'" name="eliminarInfor__otros'+l.id_estado_cuenta+'" idPrincipal="'+l.id_estado_cuenta+'" idContador="'+l.id_estado_cuenta+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.id_estado_cuenta).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__estado_cuenta');

										}); 
														

								}

							}else{

								$("#estado_de_ceunta_EP").hide();

							}

					
							

						}


						if (parametro5=="competencia__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__competencia__administrativos__2").html(' ');



								$("#otros__competencias__us").hide();

							

								$("#facturas__seguimientos__competencias__u").hide();

							

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#competencias__seguimientos"),"005 - Eventos de preparación y competencia - Ejecución presupuestaria");
								
								visor__actividades__competencia_presupuestario(indicadorInformacion,table)
	
							});	

						}


						if (parametro5=="mantenimiento__seguimientos__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__mantenimiento__seguimientos__2").html(' ');

							

								$(".tabla__mantenimiento__otros__principales").hide();

							

								$(".tabla__mantenimiento__principal").hide();
								
							

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#administrativos__seguimientosMantenimiento"),"002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria");
								
								visor__actividades__mantenimiento__presupuestario(indicadorInformacion,table)
	
							});	


							

						}

						if (parametro5=="competencia__implementacion__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__competencia__implementaciones__2").html(' ');

							

								$("#otros__implementaciones__ver").hide();

								$("#factureros__implementarciones__ver").hide();


							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#implementacion__seguimientos"),"007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica");
								
								visor__actividades__implementacion_presupuestario(indicadorInformacion,table)
	
							});	

							

						}

						if (parametro5=="capacitacion__seguimiento__tablas__ms") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__capacitacion__vs__2").html(' ');


								$("#capacitacion__otros__ver").hide();

								$("#capacitacion__factureros__v").hide();

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#capacitacion__seguimientos"),"003 - Capacitación deportiva o de recreación - Ejecución presupuestaria");
								
								visor__actividades__capacitacion__presupuestario(indicadorInformacion,table)
	
							});	

						}

						if (parametro5=="recreativos__seguimiento__tablas") {

							var indicadorInformacion2=elementos['indicadorInformacion2'];
							var indicadorInformacion3=elementos['indicadorInformacion3'];


							$(".cuerpo__recreativo__segumientos__2").html(' ');

							$("#tabla__recreativas__ocultas__factureros").hide();

							$("#tabla__recreativas__ocultas").hide();

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#recreativo__seguimientos"),"006 - Actividades recreativas - Ejecución presupuestaria");
								
								visor__actividades__recreativo_presupuestario(indicadorInformacion,table)
	
							});	

						}



						if (parametro5=="recreativos__formativo__seguimiento") {
							$(".cuerpo__formativos__2").html(' ');

							var indicadorInformacion3=elementos['indicadorInformacion3'];

							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".formativo__otros__tecnicos__cuerpo").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCompetenciasTecnicas+'"><td>'+l.nombreEvento+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompentencia_formativo/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCompetenciasTecnicas+'" name="eliminarInfor__otros'+l.idOtrosCompetenciasTecnicas+'" idPrincipal="'+l.idOtrosCompetenciasTecnicas+'" idContador="'+l.idOtrosCompetenciasTecnicas+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCompetenciasTecnicas).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__formativo__ver');

										}); 				

								}

							}else{

								$(".formativo__otros__tecnicos").hide();

							}

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#tecnico__formativos"),"005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica ");
								
								visor__recreativo_formativo_Tecnica(indicadorInformacion,table)
	
							});	

							

						}


						if (parametro5=="recreativos__altos__seguimiento") {


							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__altos__2").html(' ');


							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".alto__otros__tecnicos__cuerpo").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCompetenciasAltos+'"><td>'+l.nombreEvento+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompentencia_alto/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCompetenciasAltos+'" name="eliminarInfor__otros'+l.idOtrosCompetenciasAltos+'" idPrincipal="'+l.idOtrosCompetenciasAltos+'" idContador="'+l.idOtrosCompetenciasAltos+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCompetenciasAltos).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__faltosf__ver');

										}); 				

								}

							}else{

								$(".alto__otros__tecnicos").hide();

							}

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#tecnico__altos"),"005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica");
								
								visor__recreativo_alto_Tecnica(indicadorInformacion,table)
	
							});	

						}



						if (parametro5=="mantenimiento__tecnicos__seguimiento__tablas") {

							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__mantenimiento__tecnicos__2").html(' ');

							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".otros__mantenimiento__tecnicos").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosMantenimientoTecnico+'"><td>'+l.nombreInfras+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosMantenimiento__tecnicos/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosMantenimientoTecnico+'" name="eliminarInfor__otros'+l.idOtrosMantenimientoTecnico+'" idPrincipal="'+l.idOtrosMantenimientoTecnico+'" idContador="'+l.idOtrosMantenimientoTecnico+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosMantenimientoTecnico).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__mantenimiento__tecnicos__ver');

										}); 				

								}

							}else{

								$(".mantenimiento__items__evolutivos__tecnicos").hide();

							}

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#tecnico__mantenimientos"),"002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica");
								
								visor__mantenimiento_Tecnica(indicadorInformacion,table)
	
							});	

							

						}



						if (parametro5=="capacitacion__seguimiento__tablas") {


							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__capacitacion__2").html(' ');


							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".otros__capacitacion__tecnicos").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosCapacitacionTecnico+'"><td>'+l.itemPreesupuestario+'</td><td>'+l.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCpacitacion_tecnico/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosCapacitacionTecnico+'" name="eliminarInfor__otros'+l.idOtrosCapacitacionTecnico+'" idPrincipal="'+l.idOtrosCapacitacionTecnico+'" idContador="'+l.idOtrosCapacitacionTecnico+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosCapacitacionTecnico).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');

											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__tecnico__capacitacion__ver');

										}); 				

								}

							}else{

								$(".tabla__capacitacion__tecnicos").hide();

							}	
							
							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#capacitacion__seguimientos__tecnico"),"003 - Capacitación deportiva o de recreación - Información Técnica");
								
								visor__capacitacion_Tecnica(indicadorInformacion,table)
	
							});	

							

						}


						if (parametro5=="recreacion__seguimiento__tablas") {


							var indicadorInformacion3=elementos['indicadorInformacion3'];

							$(".cuerpo__recreacion__2").html(' ');

							if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!="") {


								for (l of indicadorInformacion3) {

									$(".recreativo__otros__tecnicos__cuerpo").append('<tr class="fila__corresponsal fila__otros__administrativos__'+l.idOtrosRT+'"><td>'+l.nombreEvento+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otros__recreativos__tecnicos/'+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor__otros'+l.idOtrosRT+'" name="eliminarInfor__otros'+l.idOtrosRT+'" idPrincipal="'+l.idOtrosRT+'" idContador="'+l.idOtrosRT+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');			
									

										$("#eliminarInfor__otros"+l.idOtrosRT).click(function(e) {

											let idContador=$(this).attr('idContador');
											let idPrincipal=$(this).attr('idPrincipal');
											
											funcion__eliminar__general(idPrincipal,'eliminar__otros__tecnico__recreativos__tecnicos');

										}); 				

								}

							}else{

								$(".recreativo__otros__tecnicos__si").hide();

							}

							$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatabletsAdaptacion.js",function(){
	
								var elementos=JSON.parse(response);
	
								var indicadorInformacion=elementos['indicadorInformacion'];
								console.log(indicadorInformacion)
								
								var table = datatabletsConfiguration($("#tecnico__recracion"),"006 - Actividades recreativas - Información técnica");
								
								visor__recreativo_Tecnica(indicadorInformacion,table)
	
							});	

							

							

						}



					});		

				},
				error:function(){

				}
					
			});		

		});			

}	

