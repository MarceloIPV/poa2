/*==========================================
=            Selects superiores            =
==========================================*/

var superioresSelectsContratacionPublica=function(parametro1){
	

	let idUsuarioC=$("#idUsuarioC").val();

	indicador=57;
	

	$.ajax({

	  data: {indicador:indicador,idUsuarioC:idUsuarioC},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}


var superioresSelects__regresar__2023=function(parametro1){

	let idUsuarioC=$("#idUsuarioC").val();
	let idRolAd=$("#idRolAd").val();

	indicador=58;

	$.ajax({

	  data: {indicador:indicador,idUsuarioC:idUsuarioC,idRolAd:idRolAd},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

/*=====  End of Selects superiores  ======*/


	var agregarDatatablets__competencia__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
	$(parametro1).click(function (e){

		
  
		$(".contenedor__sueldos__salarios").html(" ");
  
		var paqueteDeDatos = new FormData();
  
		paqueteDeDatos.append('tipo','competencias__competencias__implementacion__tablas__2');
  
		paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
		paqueteDeDatos.append("anio2",parametro5);
		paqueteDeDatos.append("trimestres",$("#trimestreN").val());
  
		$.ajax({
  
			type:"POST",
			url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){
  
			$.getScript("layout/scripts/js/validacionBasica.js",function(){
  
				let elementos=JSON.parse(response);
  
				let indicadorInformacion2=elementos['indicadorInformacion2'];
				let indicadorInformacion3=elementos['indicadorInformacion3'];
  
			
				datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,"Reportes y Anexos","",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);
  
				if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
					$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");
					$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasCompetencia btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
					$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");
  
					const facturasCompetencia = [];

					for(z of indicadorInformacion2){
  
						$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+z.itemPreesupuestario+'</td><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.monto+'</td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasCompetencias/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');
						
						facturasCompetencia.push($("#filesFrontend").val()+"seguimiento/facturasCompetencias/"+z.documento);
  
					}	
					
					descargarPorZipArchivos($(".btnDescargarFacturasCompetencia"),facturasCompetencia,"FacturasCompetencia"+$("#trimestreN").val())
					
  
				}
  
				if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
					$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
					$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosCompetencia btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
					$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Documento</th></tr></table>");
  
					const documentosCompetencia = [];

					for(w of indicadorInformacion3){
  
						$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.itemPreesupuestario+'</td><td>'+w.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompetencia/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');
						
						documentosCompetencia.push($("#filesFrontend").val()+"seguimiento/otrosCompetencia/"+w.documento);
  
					}	
					
					descargarPorZipArchivos($(".btnDescargarDocumentosCompetencia"),documentosCompetencia,"DocumentosCompetencia"+$("#trimestreN").val())
					
  
				}
  
  
			});	
  
			},
			error:function(){
  
			}
					
		});	  	
  
	});
  
	}

	

	var agregarDatatablets__competencia__altos__formativos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','competencias__competencias__altos__altos__implementacion__tablas__2__formativos');

			paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
			paqueteDeDatos.append("anio2",parametro5);
			paqueteDeDatos.append("trimestres",$("#trimestreN").val());

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					let elementos=JSON.parse(response);

					let indicadorInformacion3=elementos['indicadorInformacion3'];


					if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosCompetenciaFormativo btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__sueldos'><tr><th>Evento</th><th>Documento</th></tr></table>");

						const documentosCompetencia = [];

						for(z of indicadorInformacion3){

							$(".contenido__tablas__facturas__sueldos").append('<tr><td>'+z.nombreEvento+'</a></td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompentencia_formativo/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');

							documentosCompetencia.push($("#filesFrontend").val()+"seguimiento/otrosCompentencia_formativo/"+z.documento);
  
						}	
						
						descargarPorZipArchivos($(".btnDescargarDocumentosCompetenciaFormativo"),documentosCompetencia,"DocumentosCompetencia"+$("#trimestreN").val())
					}


				}); 

				},
				error:function(){

				}
						
			});     

		});

		}

	var agregarDatatablets=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){
  
			$(parametro1).click(function (e){
	
				$(".contenedor__sueldos__salarios").html(" ");
	

				datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro6,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);
			});
	
	}


	var agregarDatatablets__indicadores2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);


		});

	}

	var agregarDatatablets__implementacion__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
			$(parametro1).click(function (e){

	
				$(".contenedor__sueldos__salarios").html(" ");
	
				var paqueteDeDatos = new FormData();
	
				paqueteDeDatos.append('tipo','competencia__implementacion__tablas__2');
	
				paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
				paqueteDeDatos.append("anio2",parametro5);
				paqueteDeDatos.append("trimestres",$("#trimestreN").val());
			
				$.ajax({
	
					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){
	
					$.getScript("layout/scripts/js/validacionBasica.js",function(){
	
						let elementos=JSON.parse(response);
	
						let indicadorInformacion2=elementos['indicadorInformacion2'];
						let indicadorInformacion3=elementos['indicadorInformacion3'];
	
						

						datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);
	
						if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
							$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");
							$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasImplementacion btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");
	
							const facturasImplementacion = [];
							
							for(z of indicadorInformacion2){
	
								$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+z.trimestre+'</td><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.monto+'</td></td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasImplementacion/'+z.documento+'" target="_blank">'+z.documento+'</a></tr>');
	
								facturasImplementacion.push($("#filesFrontend").val()+"seguimiento/facturasImplementacion/"+z.documento);

							}	
							descargarPorZipArchivos($(".btnDescargarFacturasImplementacion"),facturasImplementacion,"FacturasImplementacion"+$("#trimestreN").val())

	
						}
	
						if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
							$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
							$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosImplementacion btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Documento</th></tr></table>");
	
							const documentosImplementacion = [];

							for(w of indicadorInformacion3){
	
								$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.itemPreesupuestario+'</td><td>'+w.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosInstalaciones/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');

								documentosImplementacion.push($("#filesFrontend").val()+"seguimiento/otrosInstalaciones/"+w.documento);
	
							}		

							descargarPorZipArchivos($(".btnDescargarDocumentosImplementacion"),documentosImplementacion,"DocumentosImplementacion"+$("#trimestreN").val())

	
						}
	
	
					});	
	
					},
					error:function(){
	
					}
							
				});	  	
	
			});
	
	}
	
	var agregarDatatablets__competencia__altos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','competencias__competencias__altos__altos__implementacion__tablas__2');

			paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
			paqueteDeDatos.append("anio2",parametro5);
			paqueteDeDatos.append("trimestres",$("#trimestreN").val());

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					let elementos=JSON.parse(response);

					let indicadorInformacion3=elementos['indicadorInformacion3'];


					if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {

						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosCompetenciaAltoTecnico btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");

						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__sueldos'><tr><th>Evento</th><th>Documento</th></tr></table>");

						const documentosCompetenciaAltoTecnico = [];

						for(z of indicadorInformacion3){

							$(".contenido__tablas__facturas__sueldos").append('<tr><td>'+z.nombreEvento+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCompentencia_alto/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');

							documentosCompetenciaAltoTecnico.push($("#filesFrontend").val()+"seguimiento/otrosCompentencia_alto/"+z.documento);
						}                           

						descargarPorZipArchivos($(".btnDescargarDocumentosCompetenciaAltoTecnico"),documentosCompetenciaAltoTecnico,"DocumentosCompetenciaAltoRendimientoTecnico"+$("#trimestreN").val())
					}


				}); 

				},
				error:function(){

				}
						
			});     

		});

		}

	var agregarDatatablets__sueldos__salarios2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
			$(parametro1).click(function (e){
	
				$(".contenedor__sueldos__salarios").html(" ");
	
				var paqueteDeDatos = new FormData();
	
				paqueteDeDatos.append('tipo','sueldos__seguimientos__tablas__2');
	
				paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
				paqueteDeDatos.append("anio2",parametro5);
				paqueteDeDatos.append("trimestres",$("#trimestreN").val());
	
				$.ajax({
	
					type:"POST",
					url:"modelosBd/inserta/seleccionaAcciones.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){
	
					$.getScript("layout/scripts/js/validacionBasica.js",function(){
	
						let elementos=JSON.parse(response);
	
						let indicadorInformacion3=elementos['indicadorInformacion3'];
					
						datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);
	
	
						if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
	
							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__sueldos'><tr><th>Planilla</th><th>Rol</th><th>Comprobante</th><th>Mes</th></tr></table>");
	
							for(z of indicadorInformacion3){
	
								$(".contenido__tablas__facturas__sueldos").append('<tr><td><a href="'+$("#filesFrontend").val()+'seguimiento/planilla/'+z.planilla+'" target="_blank">'+z.planilla+'</a></td><td><a href="'+$("#filesFrontend").val()+'seguimiento/rol/'+z.rol+'" target="_blank">'+z.rol+'</a></td><td><a href="'+$("#filesFrontend").val()+'seguimiento/comprobante/'+z.comprobante+'" target="_blank">'+z.comprobante+'</a></td><td>'+z.mes+'</td></tr>');
	
							}							
	
						}
	
	
					});	
	
					},
					error:function(){
	
					}
							
				});	  	
	
			});
	
	}
	
	
	
	var agregarDatatablets__honorarios__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','honorarios__seguimientos__tablas__2');

			paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
			paqueteDeDatos.append("anio2",parametro5);
			paqueteDeDatos.append("trimestres",$("#trimestreN").val());

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					let elementos=JSON.parse(response);

					let indicadorInformacion2=elementos['indicadorInformacion2'];
					let indicadorInformacion3=elementos['indicadorInformacion3'];

					datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);

					if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasHonorarios btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Cédula</th><th>Nombre</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");

						const facturasHonorarios = [];

						for(z of indicadorInformacion2){

							$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+z.trimestre+'</td><td>'+z.mes+'</td><td>'+z.cedula+'</td><td>'+z.nombres+'</td><td>'+z.monto+'</td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasHonorarios/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');

							facturasHonorarios.push($("#filesFrontend").val()+"seguimiento/facturasHonorarios/"+z.documento);

						}		
						descargarPorZipArchivos($(".btnDescargarFacturasHonorarios"),facturasHonorarios,"FacturasHonorarios"+$("#trimestreN").val())


					}

					if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosHonorarios btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Cédula</th><th>Nombre</th><th>Documento</th></tr></table>");

						const documentosHonorarios = [];

						for(w of indicadorInformacion3){

							$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.cedula+'</td><td>'+w.nombres+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosHonorarios/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');

							documentosHonorarios.push($("#filesFrontend").val()+"seguimiento/otrosHonorarios/"+w.documento);

						}	
						
						descargarPorZipArchivos($(".btnDescargarDocumentosHonorarios"),documentosHonorarios,"DocumentosHonorarios"+$("#trimestreN").val())
						

					}


				});	

				},
				error:function(){

				}
						
			});	  	

		});

	}

	var agregarDatatablets__administrativos__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
			$(parametro1).click(function (e){
	
				$(".contenedor__sueldos__salarios").html(" ");
	
				var paqueteDeDatos = new FormData();
	
				paqueteDeDatos.append('tipo','administrativo__seguimientos__tablas__2');
	
				paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
				paqueteDeDatos.append("anio2",parametro5);
				paqueteDeDatos.append("trimestres",$("#trimestreN").val());
	
				$.ajax({
	
					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){
	
					$.getScript("layout/scripts/js/validacionBasica.js",function(){
	
						let elementos=JSON.parse(response);
	
						let indicadorInformacion2=elementos['indicadorInformacion2'];
						let indicadorInformacion3=elementos['indicadorInformacion3'];

						datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);
	
						if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
							$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");

							$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasAdministrativo btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");

							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");

							const facturasAdministrativos = [];

	
							for(z of indicadorInformacion2){
	
								$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+z.trimestre+'</td><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.monto+'</td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturas__administrativo/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');
								
								facturasAdministrativos.push($("#filesFrontend").val()+"seguimiento/facturas__administrativo/"+z.documento);
							}		
							
							console.log(facturasAdministrativos)

							descargarPorZipArchivos($(".btnDescargarFacturasAdministrativo"),facturasAdministrativos,"FacturasAdministrativo"+$("#trimestreN").val())
						}


						

						if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
	
							$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
							$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosAdministrativo btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Documento</th></tr></table>");

							const documentosAdministrativos = [];

							for(w of indicadorInformacion3){
	
								$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.itemPreesupuestario+'</td><td>'+w.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosHabilitantes__administrativo/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');
	
								documentosAdministrativos.push($("#filesFrontend").val()+"seguimiento/otrosHabilitantes__administrativo/"+w.documento);
							}							
	
							descargarPorZipArchivos($(".btnDescargarDocumentosAdministrativo"),documentosAdministrativos,"DocumentosAdministrativo"+$("#trimestreN").val())
						}
	
	
					});	
	
					},
					error:function(){
	
					}
							
				});	  	
	
			});
	
	}
	
	var agregarDatatablets__mantenimiento__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','mantenimiento__seguimientos__tablas__2');

			paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
			paqueteDeDatos.append("anio2",parametro5);
			paqueteDeDatos.append("trimestres",$("#trimestreN").val());

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					let elementos=JSON.parse(response);

					let indicadorInformacion2=elementos['indicadorInformacion2'];
					let indicadorInformacion3=elementos['indicadorInformacion3'];

					datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);

					if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasMantenimiento btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");

						const facturasMantenimiento = [];
						
						for(z of indicadorInformacion2){

							$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+z.trimestre+'</td><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombres+'</td><td>'+z.monto+'</td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasMantenimiento/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');

							facturasMantenimiento.push($("#filesFrontend").val()+"seguimiento/facturasMantenimiento/"+z.documento);
						}							

						descargarPorZipArchivos($(".btnDescargarFacturasMantenimiento"),facturasMantenimiento,"FacturasMantenimiento"+$("#trimestreN").val())
					}

					if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosMantenimiento btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Documento</th></tr></table>");

						const documentosMantenimiento = [];

						for(w of indicadorInformacion3){

							$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.itemPreesupuestario+'</td><td>'+w.nombres+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosMantenimiento/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');

							documentosMantenimiento.push($("#filesFrontend").val()+"seguimiento/otrosHabilitantes__administrativo/"+w.documento);

						}	
						
						descargarPorZipArchivos($(".btnDescargarDocumentosMantenimiento"),documentosMantenimiento,"DocumentosMantenimiento"+$("#trimestreN").val())

					}


				});	

				},
				error:function(){

				}
						
			});	  	

		});

	}

	var agregarDatatablets__capacitacion__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','capacitacion__seguimiento__tablas__ms__2');

			paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
			paqueteDeDatos.append("anio2",parametro5);
			paqueteDeDatos.append("trimestres",$("#trimestreN").val());

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					let elementos=JSON.parse(response);

					let indicadorInformacion2=elementos['indicadorInformacion2'];
					let indicadorInformacion3=elementos['indicadorInformacion3'];


					datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);

					if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasCapacitacion btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");

						const facturasCapacitacion = [];

						for(z of indicadorInformacion2){

							$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+z.trimestre+'</td><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombres+'</td><td>'+z.monto+'</td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasCapacitacion/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');
							
							facturasCapacitacion.push($("#filesFrontend").val()+"seguimiento/facturasCapacitacion/"+z.documento);

						}	
						
						descargarPorZipArchivos($(".btnDescargarFacturasCapacitacion"),facturasCapacitacion,"FacturasCapacitacion"+$("#trimestreN").val())
						

					}

					if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosCapacitacion btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Documento</th></tr></table>");

						const documentosCapacitacion = [];

						for(w of indicadorInformacion3){

							$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.itemPreesupuestario+'</td><td>'+w.nombres+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosCapacitacion/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');

							documentosCapacitacion.push($("#filesFrontend").val()+"seguimiento/otrosCapacitacion/"+w.documento);

						}
						descargarPorZipArchivos($(".btnDescargarDocumentosCapacitacion"),documentosCapacitacion,"DocumentosCapacitacion"+$("#trimestreN").val())


					}


				});	

				},
				error:function(){

				}
						
			});	  	

		});

		}

	var agregarDatatablets__recreativo__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
			$(parametro1).click(function (e){
	
				$(".contenedor__sueldos__salarios").html(" ");
	
				var paqueteDeDatos = new FormData();
	
				paqueteDeDatos.append('tipo','recreativos__seguimiento__tablas__2');
	
				paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
				paqueteDeDatos.append("anio2",parametro5);
				paqueteDeDatos.append("trimestres",$("#trimestreN").val());
	
				$.ajax({
	
					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){
	
					$.getScript("layout/scripts/js/validacionBasica.js",function(){
	
						let elementos=JSON.parse(response);
	
						let indicadorInformacion2=elementos['indicadorInformacion2'];
						let indicadorInformacion3=elementos['indicadorInformacion3'];
	
						datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);
	
						if (indicadorInformacion2!=null && indicadorInformacion2!=undefined && indicadorInformacion2!=" " && indicadorInformacion2!="") {
							$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Facturas</h4>");
							$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarFacturasRecreativo btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Monto</th><th>Numero de Factura</th><th>Fecha Factura</th><th>RUC</th><th>Autorización</th><th>Documento</th></tr></table>");

							const facturasRecreativo = [];
	
							for(z of indicadorInformacion2){
	
								$(".contenido__tablas__facturas__honorarios").append('<tr><td>'+z.trimestre+'</td><td>'+z.mes+'</td><td>'+z.itemPreesupuestario+'</td><td>'+z.nombreItem+'</td><td>'+z.monto+'</td><td>'+z.numeroFactura+'</td><td>'+z.fechaFactura+'</td><td>'+z.ruc+'</td><td>'+z.autorizacion+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/facturasRecreativo/'+z.documento+'" target="_blank">'+z.documento+'</a></td></tr>');
	
								facturasRecreativo.push($("#filesFrontend").val()+"seguimiento/facturasRecreativo/"+z.documento);
							}	
							
							descargarPorZipArchivos($(".btnDescargarFacturasRecreativo"),facturasRecreativo,"FacturasRecreativo"+$("#trimestreN").val())
	
						}
	
						if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
							$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
							$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosRecreativo btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
							$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Mes</th><th>Código del item</th><th>Item</th><th>Documento</th></tr></table>");

							const documentosRecreativo = [];
	
							for(w of indicadorInformacion3){
	
								$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.mes+'</td><td>'+w.itemPreesupuestario+'</td><td>'+w.nombreItem+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otrosRecreativo/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');
	
								documentosRecreativo.push($("#filesFrontend").val()+"seguimiento/otrosRecreativo/"+w.documento);
							}	
							
							descargarPorZipArchivos($(".btnDescargarDocumentosRecreativo"),documentosRecreativo,"DocumentosRecreativo"+$("#trimestreN").val())
	
						}
	
	
					});	
	
					},
					error:function(){
	
					}
							
				});	  	
	
			});
	
	}

	var agregarDatatablets__recreativo__tecnico__seguimientos2023=function(parametro1,parametro2,parametro3,parametro4,parametro5){
  
		$(parametro1).click(function (e){

			$(".contenedor__sueldos__salarios").html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','recreacion__seguimiento__documentos__tecnicos');

			paqueteDeDatos.append("idOrganismo",$("#idOrganismo").val());
			paqueteDeDatos.append("anio2",parametro5);
			paqueteDeDatos.append("trimestres",$("#trimestreN").val());

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					let elementos=JSON.parse(response);

					let indicadorInformacion3=elementos['indicadorInformacion3'];

					datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,"",[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);

					if (indicadorInformacion3!=null && indicadorInformacion3!=undefined && indicadorInformacion3!=" " && indicadorInformacion3!="") {
						$(".contenedor__sueldos__salarios").append("<h4 style='text-align:center' class='texto__evidenciales titulo__enfasis text-center'>Documentos de Respaldo</h4>");
						$(".contenedor__sueldos__salarios").append("<br><a class='btnDescargarDocumentosRecreativoTecnico btn btn-warning pointer__botones' >DESCARGAR TODO</a><br>");
						$(".contenedor__sueldos__salarios").append("<table class='contenido__tablas__facturas__honorarios1'><tr><th>Trimestre</th><th>Evento</th><th>Documento</th></tr></table>");

						const documentosRecreativo = [];

						for(w of indicadorInformacion3){

							$(".contenido__tablas__facturas__honorarios1").append('<tr><td>'+w.trimestre+'</td><td>'+w.nombreEvento+'</td><td><a href="'+$("#filesFrontend").val()+'seguimiento/otros__recreativos__tecnicos/'+w.documento+'" target="_blank">'+w.documento+'</a></td></tr>');

							documentosRecreativo.push($("#filesFrontend").val()+"seguimiento/otros__recreativos__tecnicos/"+w.documento);
						}	
						
						descargarPorZipArchivos($(".btnDescargarDocumentosRecreativoTecnico"),documentosRecreativo,"DocumentosRecreativo"+$("#trimestreN").val())

					}


				});	

				},
				error:function(){

				}
						
			});	  	

		});

}
	

	var seleccionTabsRecorrido=function(boton,idOrganismo,periodo){

        $(boton).on("click",function(e){

			var activeTabContent = $(boton).attr('area');

			$('#tabChange').val(activeTabContent);

			idOrganismoVALOR=$(idOrganismo).val()

			PeriodoValor=$(periodo).val()

            $(".cuerpo__contenedor__recorridos tr").remove();

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo','enviar__infor__data__seguimientos__recorridos');
	  
			paqueteDeDatos.append("idOrganismo",idOrganismoVALOR);
	  
			paqueteDeDatos.append("periodo", PeriodoValor);
	
			paqueteDeDatos.append("area",$('#tabChange').val());

            $.ajax({
        
                type:"POST",
                url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
                contentType: false,
                data:paqueteDeDatos,
                processData: false,
                cache: false, 
                async:false,
                success:function(response){
        
                $.getScript("layout/scripts/js/validacionBasica.js",function(){
                        
                    var elementos=JSON.parse(response);
        
                    var envio__informaciones=elementos['envio__informaciones'];
        
                    for (w of envio__informaciones) {
        
                        $(".cuerpo__contenedor__recorridos").append('<tr><td>'+w.fecha+'</td><td>'+w.tipo+'</td><td>'+w.estructura+'</td><td>'+w.usuarioActual+'</td><td>'+w.observacionesTecnicas+'</td></tr>')
        
                    }
        
                });
        
                },
                error:function(){
        
                }
                        
            });	

        });


	}

  /*=======================================
=            verificarSuspensionesOD             =
=======================================*/

var verificarSuspensionesOD=function(){

  		var paqueteDeDatos = new FormData();
  
        paqueteDeDatos.append('tipo',"seguimiento__pop_up_suspensiones");		
  
        
        $.ajax({
  
          type:"POST",
          url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
          contentType: false,
          data:paqueteDeDatos,
          processData: false,
          cache: false, 
		  async: false,
          success:function(response){
  
                  var elementos=JSON.parse(response);
  
                  var mensaje=elementos['mensaje'];
  
            if(mensaje==1){
				
				var confirm= alertify.confirm('','TRANSFERENCIA TEMPORALMENTE SUSPENDIDA',null,null).set('labels', {ok:'Confirmar'});   
				confirm.set({transition:'slide'});    
            }
  
          },
          error:function(){
  
          }
          
        });	
  
}
  

var funcion_Poas_Segumiento_Infra1=function(boton){

$(boton).on("click",function(e){

	e.preventDefault();

	$("#enviarTramite").hide();
	
	var idOrganismo=$(".idOrganismoM").val();

	var fisicamenteE=$("#fisicamenteE").val();

	var idRolAd=$("#idRolAd").val();

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo','informacioSubsess');

	paqueteDeDatos.append('idOrganismo',idOrganismo);

	paqueteDeDatos.append('fisicamenteE',fisicamenteE);

	paqueteDeDatos.append('idRolAd',idRolAd);


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

				var obtenerInformacion=elementos['obtenerInformacion'];
				var obtenerAcCa=elementos['obtenerAcCa'];
				var indicadorInformacion=elementos['indicadorInformacion'];

				$(".titulo__mS").text("Reporte POA");

				$(".contenedor__bodyCMatriz").append(' ');

				$(".elementosCreados__M").remove();

				$(".creados__letter").remove();


				$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa__na text-center creados__letter" style="font-weight:bold; font-size:15px;">Ver POA</div><div class="col col-6"><button class="ver__Tabla btn btn-primary creados__letter" style="cursor:pointer;"><i class="fas fa-eye icono__boton"></i></button></div>');



				$(".contenedor__bodyCMatriz").append('<button type="button" class="btn btn-success excelProyectos col col-1 elementosCreados__M"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button><table class="tabla__itemsM elementosCreados__M" style="margin-top:2em;" id="tablaPoaPrincipal"><thead><tr><th align="center">Actividad</th><th align="center">Item</th><th align="center">Enero</th><th align="center">Febrero</th><th align="center">Marzo</th><th align="center">Abril</th><th align="center">Mayo</th><th align="center">Junio</th><th align="center">Julio</th><th align="center">Agosto</th><th align="center">Septiembre</th><th align="center">Octubre</th><th align="center">Noviembre</th><th align="center">Diciembre</th><th align="center">Total</th></tr></thead></table><br><br>');

				$(".elementosCreados__M").hide();

				for (c of obtenerInformacion) {

					$(".tabla__itemsM").append('<tr><td>'+c.idActividades+"-"+c.nombreActividades+'</td><td>'+c.itemPreesupuestario+"-"+c.nombreItem+'</td><td><center>'+parseFloat(c.enero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.febrero).toFixed(2)+'</center></td><td><center>'+parseFloat(c.marzo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.abril).toFixed(2)+'</center></td><td><center>'+parseFloat(c.mayo).toFixed(2)+'</center></td><td><center>'+parseFloat(c.junio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.julio).toFixed(2)+'</center></td><td><center>'+parseFloat(c.agosto).toFixed(2)+'</center></td><td><center>'+parseFloat(c.septiembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.octubre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.noviembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.diciembre).toFixed(2)+'</center></td><td><center>'+parseFloat(c.totalSumaItem).toFixed(2)+'</center></td></tr>');


				}

				execelGenerados($(".excelProyectos"),"tablaPoaPrincipal","poa");

				verOjoContrasenas2($(".ver__Tabla"),$(".icono__boton"),$(".elementosCreados__M"),$(".letras__ver__poa"));

				if (!$(".sumado__indicadores").length > 0 ) {

					$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center sumado__indicadores" style="font-size:14px; font-weight:bold;">Indicadores</div><br><br>');

					$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center" style="font-weight:bold;">Actividad - indicador</div><div class="col col-2 text-center" style="font-weight:bold;">Primer trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Segundo Trimestre</div><div class="col col-1 text-center" style="font-weight:bold;">Tercer trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Cuarto trimestre</div><div class="col col-2 text-center" style="font-weight:bold;">Meta indicador</div>');


					for (z of indicadorInformacion) {

						$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center">'+z.indicador+'</div><div class="col col-2 text-center">'+z.primertrimestre+'</div><div class="col col-1 text-center">'+z.segundotrimestre+'</div><div class="col col-1 text-center">'+z.tercertrimestre+'</div><div class="col col-2 text-center">'+z.cuartotrimestre+'</div><div class="col col-2 text-center">'+z.metaindicador+'</div>');


					}               


					if (data[9]!=null && data[9]!="") {

						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;">Documentos anexos</div><br><br>');

						var arreglo = data[9].split("_________");

						for (var i = 0 ; i<arreglo.length; i++) {
							

							$(".contenedor__bodyCMatriz").append('<div class="col col-4 text-center"><a href="'+$("#filesFrontend").val()+'anexosPoa/'+arreglo[i]+'" target="_blank">'+arreglo[i]+'</a></div>');

						}


					}

				}

				if (obtenerAcCa!="") {

					if (!$("#rotulo__ac").length > 0 ) {


						$(".contenedor__bodyCMatriz").append('<div class="col col-12 text-center" style="font-size:14px; font-weight:bold;" id="rotulo__ac">ACTIVIDADES A ANALIZAR</div><br><br>');

					}

					for (d of obtenerAcCa) {

						if (!$(".ver__matrices"+d.idActividades).length > 0 ) {

							$(".contenedor__bodyCMatriz").append('<div class="col col-6 letras__ver__poa text-center" style="font-weight:bold; font-size:12px; ; margin-bottom:2em;">'+d.idActividades+"-"+d.nombreActividades+'</div><div class="col col-6"><button class="ver__matrices'+d.idActividades+' btn btn-info" attr="'+d.idActividades+'" style="cursor:pointer;"><i class="fas fa-eye icono__'+d.idActividades+'"></i></button></div><br><div class="col col-12 matrices__'+d.idActividades+' row"></div>');

							verOjoAjaxMatrices($(".ver__matrices"+d.idActividades),$(".icono__"+d.idActividades),$(".matrices__"+d.idActividades),d.idActividades,d.idOrganismo,$("#idRolAd").val(),$("#fisicamenteE").val());

						}

					}


				}

				


			});

		},
		error:function(){

		}
				
	});     



});

}


	/*=====  End of Indicadores - Estado de cuenta ======*/

  
	var funcion_Poas_Segumiento_Infra=function(boton,idDivModal,idtituloModal,titulo){

		$(boton).click(function(e) {
	
		  e.preventDefault();
	
		  $(idtituloModal).text(titulo);
	
		  var cuerpo = document.getElementById(idDivModal);
	
		  $("#"+idDivModal + " div").remove();
		 
	
		  cuerpo.insertAdjacentHTML('beforeend','<div><div id="poaInicialSeguimientoInfra" class="row d d-flex flex-column justify-content-center card mt-4"><div class="card-body row"><a class="card-title text-center titulo__enfasis pointer__botones" data-bs-toggle="modal" data-bs-target="#poa__indi" >POA</a></div></div><div class="row d d-flex flex-column justify-content-center card mt-4"><div id="mantenimientoSeguimientoInfra" class="card-body row"><a class="card-title text-center titulo__enfasis pointer__botones" data-bs-toggle="modal" data-bs-target="#mantenimiento__ll" >MANTENIMIENTO</a></div></div></div>');

		  agregarDatatablets__poa__seguimiento__infra__2023($("#poaInicialSeguimientoInfra"),"poa__inicial__poa__seguimiento__infra","POA","")
		  agregarDatatablets__poa__seguimiento__infra__2023($("#mantenimientoSeguimientoInfra"),"reporteria__mantenimiento__seguimiento__infra","MANTENIMOENTO","")
		});
	  }

	var agregarDatatablets__poa__seguimiento__infra__2023=function(parametro1,parametro3,parametro5,objetos){
  
		$(parametro1).click(function (e){
	
			$("#"+parametro3).DataTable().destroy();
	
			datatabletsSeguimientoRevisorVacio($("#"+parametro3),parametro3,parametro5,objetos,[$("#poaInfraSeguimiento").attr("idOrganismo"),$("#trimestreN").val(),parametro5],false);

		});
	
	}


	var funcion_click_boton_modal_docs_datatable_Infra=function(boton,idDivModal,idtituloModal,titulo,idTabla,idTbody,titulos, tipo,rutaDocumento ){

		$(boton).click(function (e){
	
			var idOrganismo = $("#idOrganismo").val();

			e.preventDefault();
	
			$(idtituloModal).text(titulo);
	
			var cuerpo = document.getElementById(idDivModal);
	
			$("#"+idDivModal + " div").remove();
	
			cuerpo.insertAdjacentHTML('beforeend','<div><centre><table id="'+idTabla+'"><thead><tr id="theadTabla"></tr></thead><tbody id="'+idTbody+'"></tbody></table></centre></div>');
		  
			var cuerpo1 = document.getElementById("theadTabla");
			for(let i=0;i<titulos.length;i++){
			  cuerpo1.insertAdjacentHTML('beforeend','<th><center>'+titulos[i]+'</center></th>');
			}
	
			var paqueteDeDatos = new FormData();
	
				paqueteDeDatos.append('tipo',tipo);
				paqueteDeDatos.append('idOrganismos',idOrganismo);
				
	
				$.ajax({
	
					type:"POST",
					url:"modelosBd/POA_SEGUIMIENTO_REVISOR/selector.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					async: false,
					success:function(response){
			 
	
				var elementos=JSON.parse(response);
	
					var getDocumentosinforme_ejecucion=elementos['getDocumentosinforme_ejecucion'];
					var getDocumentosRespaldo_Informe=elementos['getDocumentosRespaldo_Informe'];
					var getDocumentosOtros=elementos['getDocumentosOtros'];
					
					
					
				  
			   if(titulo=="Documentos Informe Ejecución"){
				for (l of getDocumentosinforme_ejecucion) {
					
					$("#"+idTbody).append('<tr class="fila__corresponsal fila__fac__"><td><a href="'+rutaDocumento+l.documento+'" target="_blank">'+l.documento+'</a></td><td>'+l.trimestre+'</td></tr>');
				}
			   }else if(titulo=="Documentos Respaldo Informe"){
				for (m of getDocumentosRespaldo_Informe) {
					
					$("#"+idTbody).append('<tr class="fila__corresponsal fila__fac__"><td><a href="'+rutaDocumento+m.documento+'" target="_blank">'+m.documento+'</a></td><td>'+m.trimestre+'</td></tr>');
				}
			   }else if(titulo=="Documentos Otros"){
				for (n of getDocumentosOtros) {
					
					$("#"+idTbody).append('<tr class="fila__corresponsal fila__fac__"><td><a href="'+rutaDocumento+n.documento+'" target="_blank">'+n.documento+'</a></td><td>'+n.trimestre+'</td></tr>');
				}
			   }
				
			  
			},
					error:function(){
	
			 
	
					}
						
				});
	
	
	
		   
	
		});
	}
	
	
  






	

	
	

	


  