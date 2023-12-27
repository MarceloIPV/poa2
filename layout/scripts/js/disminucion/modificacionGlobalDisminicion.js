


var honorarios_data = function (parametro1, parametro2, parametro3) {

	$(parametro1).on('change', function () {

		var paqueteDeDatos = new FormData();

		let idSueldos = $(this).val();

		paqueteDeDatos.append("tipo", parametro3);
		paqueteDeDatos.append("idSueldos", idSueldos);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAccionesDisminucion.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				var elementos = JSON.parse(response);
				var indicadorInformacion = elementos['indicadorInformacion'];
				var dataBloqueos=elementos['dataBloqueos'];

				if (dataBloqueos!="" && dataBloqueos!=" " && dataBloqueos!=null && dataBloqueos!=undefined) {

					for (var i = 0; i < dataBloqueos.length; i++) {
						$("#actividad__modificaciones__destino__modificaciones2__seleccion option[value='"+dataBloqueos[i]+"']").hide();
					}

				}

				for (z of indicadorInformacion) {
					$("#cedula").val(z.cedula);
					$("#cargo").val(z.cargo);
					$("#tipo__cargo").val(z.tipoCargo);
					$("#honorarioMensual").val(z.honorarioMensual);
					$("#idHonorarios").val(z.idHonorarios);
					$("#enero__origen").val(parseFloat(z.enero).toFixed(2));
					$("#febrero__origen").val(parseFloat(z.febrero).toFixed(2));
					$("#marzo__origen").val(parseFloat(z.marzo).toFixed(2));
					$("#abril__origen").val(parseFloat(z.abril).toFixed(2));
					$("#mayo__origen").val(parseFloat(z.mayo).toFixed(2));
					$("#junio__origen").val(parseFloat(z.junio).toFixed(2));
					$("#julio__origen").val(parseFloat(z.julio).toFixed(2));
					$("#agosto__origen").val(parseFloat(z.agosto).toFixed(2));
					$("#septiembre__origen").val(parseFloat(z.septiembre).toFixed(2));
					$("#octubre__origen").val(parseFloat(z.octubre).toFixed(2));
					$("#noviembre__origen").val(parseFloat(z.noviembre).toFixed(2));
					$("#diciembre__origen").val(parseFloat(z.diciembre).toFixed(2));
					$("#total__origen").val(parseFloat(z.total).toFixed(2));

					$("#eneroOrigen__restando").val(parseFloat(z.enero).toFixed(2));
					$("#febreroOrigen__restando").val(parseFloat(z.febrero).toFixed(2));
					$("#marzoOrigen__restando").val(parseFloat(z.marzo).toFixed(2));
					$("#abrilOrigen__restando").val(parseFloat(z.abril).toFixed(2));
					$("#mayoOrigen__restando").val(parseFloat(z.mayo).toFixed(2));
					$("#junioOrigen__restando").val(parseFloat(z.junio).toFixed(2));
					$("#julioOrigen__restando").val(parseFloat(z.julio).toFixed(2));
					$("#agostoOrigen__restando").val(parseFloat(z.agosto).toFixed(2));
					$("#septiembreOrigen__restando").val(parseFloat(z.septiembre).toFixed(2));
					$("#octubreOrigen__restando").val(parseFloat(z.octubre).toFixed(2));
					$("#noviembreOrigen__restando").val(parseFloat(z.noviembre).toFixed(2));
					$("#diciembreOrigen__restando").val(parseFloat(z.diciembre).toFixed(2));
					
				}

				$(".oculto__tabla__destino").show();

			},
			error: function () {

			}

		});

	});

}


$("#persona_sueldos_data__origen__desvinculacion").on('change', function () {

	var paqueteDeDatos = new FormData();

	let idSueldos = $(this).val();

	paqueteDeDatos.append("tipo", "desvinculacion__origen");
	paqueteDeDatos.append("idSueldos", idSueldos);

	$.ajax({

		type: "POST",
		url: "modelosBd/inserta/seleccionaAccionesDisminucion.md.php",
		contentType: false,
		data: paqueteDeDatos,
		processData: false,
		cache: false,
		success: function (response) {

			var elementos = JSON.parse(response);
			var desahucio__informacion = elementos['desahucio__informacion'];
			var despido__informacion = elementos['despido__informacion'];
			var renuncia__informacion = elementos['renuncia__informacion'];
			var compensacion__informacion = elementos['compensacion__informacion'];

			var informacionBasica__desvinculacion = elementos['informacionBasica__desvinculacion'];


			for (a of informacionBasica__desvinculacion) {

				/*=======================================
				=            Datos generales            =
				=======================================*/

				$("#cedula").val(a.cedula);
				$("#cargo").val(a.cargo);
				$("#tipo__cargo").val(a.tipoCargo);
				$("#honorarioMensual").val(a.tiempoTrabajo);
				$("#mensualizaDecimoTercero").val(a.mensualizaTercera);
				$("#mensualizaDecimoCuarto").val(a.menusalizaCuarta);					
					
					
				/*=====  End of Datos generales  ======*/

			}

			if (desahucio__informacion=="" || desahucio__informacion==" " || desahucio__informacion==undefined || desahucio__informacion==null) {

				$("#enero__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#abril__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#junio__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#julio__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__desahucio").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__desahucio").val(parseFloat(0).toFixed(2));

				$("#enero__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#abril__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#junio__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#julio__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__desahucio__restante").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__desahucio__restante").val(parseFloat(0).toFixed(2));


			}else{

				for (b of desahucio__informacion) {
					
					$("#enero__origen__desahucio").val(parseFloat(b.enero).toFixed(2));
					$("#febrero__origen__desahucio").val(parseFloat(b.febrero).toFixed(2));
					$("#marzo__origen__desahucio").val(parseFloat(b.marzo).toFixed(2));
					$("#abril__origen__desahucio").val(parseFloat(b.abril).toFixed(2));
					$("#mayo__origen__desahucio").val(parseFloat(b.mayo).toFixed(2));
					$("#junio__origen__desahucio").val(parseFloat(b.junio).toFixed(2));
					$("#julio__origen__desahucio").val(parseFloat(b.julio).toFixed(2));
					$("#agosto__origen__desahucio").val(parseFloat(b.agosto).toFixed(2));
					$("#septiembre__origen__desahucio").val(parseFloat(b.septiembre).toFixed(2));
					$("#octubre__origen__desahucio").val(parseFloat(b.octubre).toFixed(2));
					$("#noviembre__origen__desahucio").val(parseFloat(b.noviembre).toFixed(2));
					$("#diciembre__origen__desahucio").val(parseFloat(b.diciembre).toFixed(2));

					$("#enero__origen__desahucio__restante").val(parseFloat(b.enero).toFixed(2));
					$("#febrero__origen__desahucio__restante").val(parseFloat(b.febrero).toFixed(2));
					$("#marzo__origen__desahucio__restante").val(parseFloat(b.marzo).toFixed(2));
					$("#abril__origen__desahucio__restante").val(parseFloat(b.abril).toFixed(2));
					$("#mayo__origen__desahucio__restante").val(parseFloat(b.mayo).toFixed(2));
					$("#junio__origen__desahucio__restante").val(parseFloat(b.junio).toFixed(2));
					$("#julio__origen__desahucio__restante").val(parseFloat(b.julio).toFixed(2));
					$("#agosto__origen__desahucio__restante").val(parseFloat(b.agosto).toFixed(2));
					$("#septiembre__origen__desahucio__restante").val(parseFloat(b.septiembre).toFixed(2));
					$("#octubre__origen__desahucio__restante").val(parseFloat(b.octubre).toFixed(2));
					$("#noviembre__origen__desahucio__restante").val(parseFloat(b.noviembre).toFixed(2));
					$("#diciembre__origen__desahucio__restante").val(parseFloat(b.diciembre).toFixed(2));

				}

			}

			if (despido__informacion=="" || despido__informacion==" " || despido__informacion==undefined || despido__informacion==null) {

				$("#enero__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#abril__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#junio__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#julio__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__despido__intenpestivo").val(parseFloat(0).toFixed(2));

				$("#enero__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#abril__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#junio__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#julio__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__despido__intenpestivo__restante").val(parseFloat(0).toFixed(2));


			}else{

				for (c of despido__informacion) {
					
					$("#enero__origen__despido__intenpestivo").val(parseFloat(c.enero).toFixed(2));
					$("#febrero__origen__despido__intenpestivo").val(parseFloat(c.febrero).toFixed(2));
					$("#marzo__origen__despido__intenpestivo").val(parseFloat(c.marzo).toFixed(2));
					$("#abril__origen__despido__intenpestivo").val(parseFloat(c.abril).toFixed(2));
					$("#mayo__origen__despido__intenpestivo").val(parseFloat(c.mayo).toFixed(2));
					$("#junio__origen__despido__intenpestivo").val(parseFloat(c.junio).toFixed(2));
					$("#julio__origen__despido__intenpestivo").val(parseFloat(c.julio).toFixed(2));
					$("#agosto__origen__despido__intenpestivo").val(parseFloat(c.agosto).toFixed(2));
					$("#septiembre__origen__despido__intenpestivo").val(parseFloat(c.septiembre).toFixed(2));
					$("#octubre__origen__despido__intenpestivo").val(parseFloat(c.octubre).toFixed(2));
					$("#noviembre__origen__despido__intenpestivo").val(parseFloat(c.noviembre).toFixed(2));
					$("#diciembre__origen__despido__intenpestivo").val(parseFloat(c.diciembre).toFixed(2));

					$("#enero__origen__despido__intenpestivo__restante").val(parseFloat(c.enero).toFixed(2));
					$("#febrero__origen__despido__intenpestivo__restante").val(parseFloat(c.febrero).toFixed(2));
					$("#marzo__origen__despido__intenpestivo__restante").val(parseFloat(c.marzo).toFixed(2));
					$("#abril__origen__despido__intenpestivo__restante").val(parseFloat(c.abril).toFixed(2));
					$("#mayo__origen__despido__intenpestivo__restante").val(parseFloat(c.mayo).toFixed(2));
					$("#junio__origen__despido__intenpestivo__restante").val(parseFloat(c.junio).toFixed(2));
					$("#julio__origen__despido__intenpestivo__restante").val(parseFloat(c.julio).toFixed(2));
					$("#agosto__origen__despido__intenpestivo__restante").val(parseFloat(c.agosto).toFixed(2));
					$("#septiembre__origen__despido__intenpestivo__restante").val(parseFloat(c.septiembre).toFixed(2));
					$("#octubre__origen__despido__intenpestivo__restante").val(parseFloat(c.octubre).toFixed(2));
					$("#noviembre__origen__despido__intenpestivo__restante").val(parseFloat(c.noviembre).toFixed(2));
					$("#diciembre__origen__despido__intenpestivo__restante").val(parseFloat(c.diciembre).toFixed(2));

				}

			}

			if (renuncia__informacion=="" || renuncia__informacion==" " || renuncia__informacion==undefined || renuncia__informacion==null) {

				$("#enero__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#abril__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#junio__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#julio__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__renunia__voluntaria").val(parseFloat(0).toFixed(2));

				$("#enero__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#abril__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#junio__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#julio__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__renunia__voluntaria__restante").val(parseFloat(0).toFixed(2));


			}else{

				for (d of renuncia__informacion) {
					
					$("#enero__origen__renunia__voluntaria").val(parseFloat(d.enero).toFixed(2));
					$("#febrero__origen__renunia__voluntaria").val(parseFloat(d.febrero).toFixed(2));
					$("#marzo__origen__renunia__voluntaria").val(parseFloat(d.marzo).toFixed(2));
					$("#abril__origen__renunia__voluntaria").val(parseFloat(d.abril).toFixed(2));
					$("#mayo__origen__renunia__voluntaria").val(parseFloat(d.mayo).toFixed(2));
					$("#junio__origen__renunia__voluntaria").val(parseFloat(d.junio).toFixed(2));
					$("#julio__origen__renunia__voluntaria").val(parseFloat(d.julio).toFixed(2));
					$("#agosto__origen__renunia__voluntaria").val(parseFloat(d.agosto).toFixed(2));
					$("#septiembre__origen__renunia__voluntaria").val(parseFloat(d.septiembre).toFixed(2));
					$("#octubre__origen__renunia__voluntaria").val(parseFloat(d.octubre).toFixed(2));
					$("#noviembre__origen__renunia__voluntaria").val(parseFloat(d.noviembre).toFixed(2));
					$("#diciembre__origen__renunia__voluntaria").val(parseFloat(d.diciembre).toFixed(2));

					$("#enero__origen__renunia__voluntaria__restante").val(parseFloat(d.enero).toFixed(2));
					$("#febrero__origen__renunia__voluntaria__restante").val(parseFloat(d.febrero).toFixed(2));
					$("#marzo__origen__renunia__voluntaria__restante").val(parseFloat(d.marzo).toFixed(2));
					$("#abril__origen__renunia__voluntaria__restante").val(parseFloat(d.abril).toFixed(2));
					$("#mayo__origen__renunia__voluntaria__restante").val(parseFloat(d.mayo).toFixed(2));
					$("#junio__origen__renunia__voluntaria__restante").val(parseFloat(d.junio).toFixed(2));
					$("#julio__origen__renunia__voluntaria__restante").val(parseFloat(d.julio).toFixed(2));
					$("#agosto__origen__renunia__voluntaria__restante").val(parseFloat(d.agosto).toFixed(2));
					$("#septiembre__origen__renunia__voluntaria__restante").val(parseFloat(d.septiembre).toFixed(2));
					$("#octubre__origen__renunia__voluntaria__restante").val(parseFloat(d.octubre).toFixed(2));
					$("#noviembre__origen__renunia__voluntaria__restante").val(parseFloat(d.noviembre).toFixed(2));
					$("#diciembre__origen__renunia__voluntaria__restante").val(parseFloat(d.diciembre).toFixed(2));

				}

			}

			if (compensacion__informacion=="" || compensacion__informacion==" " || compensacion__informacion==undefined || compensacion__informacion==null) {

				$("#enero__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#abril__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#junio__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#julio__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__vacaciones__no__gozadas").val(parseFloat(0).toFixed(2));

				$("#enero__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#febrero__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#marzo__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#abril__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#mayo__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#junio__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#julio__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#agosto__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#septiembre__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#octubre__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#noviembre__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));
				$("#diciembre__origen__vacaciones__no__gozadas__restante").val(parseFloat(0).toFixed(2));


			}else{

				for (e of compensacion__informacion) {
					
					$("#enero__origen__vacaciones__no__gozadas").val(parseFloat(e.enero).toFixed(2));
					$("#febrero__origen__vacaciones__no__gozadas").val(parseFloat(e.febrero).toFixed(2));
					$("#marzo__origen__vacaciones__no__gozadas").val(parseFloat(e.marzo).toFixed(2));
					$("#abril__origen__vacaciones__no__gozadas").val(parseFloat(e.abril).toFixed(2));
					$("#mayo__origen__vacaciones__no__gozadas").val(parseFloat(e.mayo).toFixed(2));
					$("#junio__origen__vacaciones__no__gozadas").val(parseFloat(e.junio).toFixed(2));
					$("#julio__origen__vacaciones__no__gozadas").val(parseFloat(e.julio).toFixed(2));
					$("#agosto__origen__vacaciones__no__gozadas").val(parseFloat(e.agosto).toFixed(2));
					$("#septiembre__origen__vacaciones__no__gozadas").val(parseFloat(e.septiembre).toFixed(2));
					$("#octubre__origen__vacaciones__no__gozadas").val(parseFloat(e.octubre).toFixed(2));
					$("#noviembre__origen__vacaciones__no__gozadas").val(parseFloat(e.noviembre).toFixed(2));
					$("#diciembre__origen__vacaciones__no__gozadas").val(parseFloat(e.diciembre).toFixed(2));

					$("#enero__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.enero).toFixed(2));
					$("#febrero__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.febrero).toFixed(2));
					$("#marzo__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.marzo).toFixed(2));
					$("#abril__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.abril).toFixed(2));
					$("#mayo__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.mayo).toFixed(2));
					$("#junio__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.junio).toFixed(2));
					$("#julio__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.julio).toFixed(2));
					$("#agosto__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.agosto).toFixed(2));
					$("#septiembre__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.septiembre).toFixed(2));
					$("#octubre__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.octubre).toFixed(2));
					$("#noviembre__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.noviembre).toFixed(2));
					$("#diciembre__origen__vacaciones__no__gozadas__restante").val(parseFloat(e.diciembre).toFixed(2));

				}

			}


		},
		error: function () {

		}

	});


});

var honorarios_data_sueldos = function (parametro1, parametro2, parametro3) {

	$(parametro1).on('change', function () {

		var paqueteDeDatos = new FormData();

		let idSueldos = $(this).val();

		paqueteDeDatos.append("tipo", parametro3);
		paqueteDeDatos.append("idSueldos", idSueldos);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAccionesDisminucion.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				var elementos = JSON.parse(response);
				var indicadorInformacion = elementos['indicadorInformacion'];
				var dataBloqueos=elementos['dataBloqueos'];

				if (dataBloqueos!="" && dataBloqueos!=" " && dataBloqueos!=null && dataBloqueos!=undefined) {

					for (var i = 0; i < dataBloqueos.length; i++) {
						$("#actividad__modificaciones__destino__modificaciones2__seleccion option[value='"+dataBloqueos[i]+"']").hide();
					}

				}

				for (z of indicadorInformacion) {

					/*=======================================
					=            Datos generales            =
					=======================================*/

					$("#cedula").val(z.cedula);
					$("#cargo").val(z.cargo);
					$("#tipo__cargo").val(z.tipoCargo);
					$("#honorarioMensual").val(z.tiempoTrabajo);
					$("#mensualizaDecimoTercero").val(z.mensualizaTercera);
					$("#mensualizaDecimoCuarto").val(z.menusalizaCuarta);					
					
					
					/*=====  End of Datos generales  ======*/

					/*=============================================================
					=            Asignación de bonificaciones en meses            =
					=============================================================*/

					let divididosTercero=parseFloat(z.decimoTercera)/12;
					let divididosCuarto=parseFloat(z.decimoCuarta)/12;

					if (parseFloat(z.enero)==0) {

						$("#enero__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#enero__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#enero__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#enero__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#enero__origen__decimo__tercero").val(0);
						$("#enero__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#enero__origen__salarios").val(parseFloat(0).toFixed(2));
						
						$("#enero__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#enero__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#enero__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#enero__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#enero__origen__decimo__tercero__restante").val(0);
						$("#enero__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#enero__origen__salarios__restante").val(parseFloat(0).toFixed(2));						

					}else{

						$("#enero__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#enero__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#enero__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#enero__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#enero__origen__decimo__tercero").val(0);
						$("#enero__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#enero__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));
						
						$("#enero__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#enero__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#enero__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#enero__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#enero__origen__decimo__tercero__restante").val(0);
						$("#enero__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#enero__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}
					

					if (parseFloat(z.febrero)==0) {

						$("#febrero__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#febrero__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#febrero__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#febrero__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#febrero__origen__decimo__tercero").val(0);
						$("#febrero__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#febrero__origen__salarios").val(parseFloat(0).toFixed(2));

						$("#febrero__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#febrero__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#febrero__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#febrero__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#febrero__origen__decimo__tercero__restante").val(0);
						$("#febrero__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#febrero__origen__salarios__restante").val(parseFloat(0).toFixed(2));


					}else{

						$("#febrero__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#febrero__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#febrero__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#febrero__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#febrero__origen__decimo__tercero").val(0);
						$("#febrero__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#febrero__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));

						$("#febrero__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#febrero__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#febrero__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#febrero__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#febrero__origen__decimo__tercero__restante").val(0);
						$("#febrero__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#febrero__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));


					}

					if (parseFloat(z.marzo)==0) {

						$("#marzo__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#marzo__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)) : $("#marzo__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#marzo__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#marzo__origen__decimo__tercero").val(0);
						$("#marzo__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#marzo__origen__salarios").val(parseFloat(0).toFixed(2));

						$("#marzo__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#marzo__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)) : $("#marzo__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#marzo__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#marzo__origen__decimo__tercero__restante").val(0);
						$("#marzo__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#marzo__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{

						$("#marzo__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#marzo__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto").val(parseFloat(z.decimoCuarta).toFixed(2)) : $("#marzo__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#marzo__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#marzo__origen__decimo__tercero").val(0);
						$("#marzo__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#marzo__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));

						$("#marzo__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#marzo__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto__restante").val(parseFloat(z.decimoCuarta).toFixed(2)) : $("#marzo__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#marzo__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#marzo__origen__decimo__tercero__restante").val(0);
						$("#marzo__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#marzo__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}


					if (parseFloat(z.abril)==0) {

						$("#abril__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#abril__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#abril__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#abril__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#abril__origen__decimo__tercero").val(0);
						$("#abril__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#abril__origen__salarios").val(parseFloat(0).toFixed(2));

						$("#abril__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#abril__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#abril__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#abril__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#abril__origen__decimo__tercero__restante").val(0);
						$("#abril__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#abril__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{

						$("#abril__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#abril__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#abril__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#abril__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#abril__origen__decimo__tercero").val(0);
						$("#abril__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#abril__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));

						$("#abril__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#abril__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#abril__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#abril__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#abril__origen__decimo__tercero__restante").val(0);
						$("#abril__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#abril__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}

					if (parseFloat(z.mayo)==0) {


						$("#mayo__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#mayo__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#mayo__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#mayo__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#mayo__origen__decimo__tercero").val(0);
						$("#mayo__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#mayo__origen__salarios").val(parseFloat(0).toFixed(2));

						$("#mayo__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#mayo__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#mayo__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#mayo__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#mayo__origen__decimo__tercero__restante").val(0);
						$("#mayo__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#mayo__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{


						$("#mayo__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#mayo__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#mayo__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#mayo__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#mayo__origen__decimo__tercero").val(0);
						$("#mayo__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#mayo__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));

						$("#mayo__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#mayo__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#mayo__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#mayo__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#mayo__origen__decimo__tercero__restante").val(0);
						$("#mayo__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#mayo__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}

					if(parseFloat(z.junio)==0){

						$("#junio__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#junio__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#junio__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#junio__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#junio__origen__decimo__tercero").val(0);
						$("#junio__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#junio__origen__salarios").val(parseFloat(0).toFixed(2));


						$("#junio__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#junio__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#junio__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#junio__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#junio__origen__decimo__tercero__restante").val(0);
						$("#junio__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#junio__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{

						$("#junio__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#junio__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#junio__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#junio__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#junio__origen__decimo__tercero").val(0);
						$("#junio__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#junio__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#junio__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#junio__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#junio__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#junio__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#junio__origen__decimo__tercero__restante").val(0);
						$("#junio__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#junio__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));


					}


					if(parseFloat(z.julio)==0){

						$("#julio__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#julio__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#julio__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#julio__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#julio__origen__decimo__tercero").val(0);
						$("#julio__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#julio__origen__salarios").val(parseFloat(0).toFixed(2));


						$("#julio__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#julio__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#julio__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#julio__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#julio__origen__decimo__tercero__restante").val(0);
						$("#julio__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#julio__origen__salarios__restante").val(parseFloat(0).toFixed(2));


					}else{

						$("#julio__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#julio__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#julio__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#julio__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#julio__origen__decimo__tercero").val(0);
						$("#julio__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#julio__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#julio__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#julio__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#julio__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#julio__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#julio__origen__decimo__tercero__restante").val(0);
						$("#julio__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#julio__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));


					}


					if(parseFloat(z.agosto)==0){

						$("#agosto__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#agosto__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)) : $("#agosto__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#agosto__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#agosto__origen__decimo__tercero").val(0);
						$("#agosto__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#agosto__origen__salarios").val(parseFloat(0).toFixed(2));


						$("#agosto__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#agosto__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)) : $("#agosto__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#agosto__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#agosto__origen__decimo__tercero__restante").val(0);
						$("#agosto__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#agosto__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{

						$("#agosto__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#agosto__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto").val(parseFloat(z.decimoCuarta).toFixed(2)) : $("#agosto__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#agosto__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#agosto__origen__decimo__tercero").val(0);
						$("#agosto__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#agosto__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#agosto__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#agosto__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto__restante").val(parseFloat(z.decimoCuarta).toFixed(2)) : $("#agosto__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#agosto__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#agosto__origen__decimo__tercero__restante").val(0);
						$("#agosto__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#agosto__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}

					if(parseFloat(z.septiembre)==0){

						$("#septiembre__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#septiembre__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#septiembre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#septiembre__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#septiembre__origen__decimo__tercero").val(0);
						$("#septiembre__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#septiembre__origen__salarios").val(parseFloat(0).toFixed(2));


						$("#septiembre__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#septiembre__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#septiembre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#septiembre__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#septiembre__origen__decimo__tercero__restante").val(0);
						$("#septiembre__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#septiembre__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{

						$("#septiembre__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#septiembre__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#septiembre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#septiembre__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#septiembre__origen__decimo__tercero").val(0);
						$("#septiembre__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#septiembre__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#septiembre__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#septiembre__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#septiembre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#septiembre__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#septiembre__origen__decimo__tercero__restante").val(0);
						$("#septiembre__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#septiembre__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));						

					}

					if(parseFloat(z.octubre)==0){


						$("#octubre__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#octubre__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#octubre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#octubre__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#octubre__origen__decimo__tercero").val(0);
						$("#octubre__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#octubre__origen__salarios").val(parseFloat(0).toFixed(2));



						$("#octubre__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#octubre__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#octubre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#octubre__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#octubre__origen__decimo__tercero__restante").val(0);
						$("#octubre__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#octubre__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{


						$("#octubre__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#octubre__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#octubre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#octubre__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#octubre__origen__decimo__tercero").val(0);
						$("#octubre__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#octubre__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));



						$("#octubre__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#octubre__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#octubre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#octubre__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#octubre__origen__decimo__tercero__restante").val(0);
						$("#octubre__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#octubre__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}


					if(parseFloat(z.noviembre)==0){

						$("#noviembre__origen__aporte__patronal").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#noviembre__origen__decimo__cuarto").val(parseFloat(0).toFixed(2)):$("#noviembre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#noviembre__origen__decimo__tercero").val(parseFloat(0).toFixed(2)):$("#noviembre__origen__decimo__tercero").val(0);
						$("#noviembre__origen__fondos__de__reserva").val(parseFloat(0).toFixed(2));
						$("#noviembre__origen__salarios").val(parseFloat(0).toFixed(2));


						$("#noviembre__origen__aporte__patronal__restante").val(parseFloat(0).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#noviembre__origen__decimo__cuarto__restante").val(parseFloat(0).toFixed(2)):$("#noviembre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#noviembre__origen__decimo__tercero__restante").val(parseFloat(0).toFixed(2)):$("#noviembre__origen__decimo__tercero__restante").val(0);
						$("#noviembre__origen__fondos__de__reserva__restante").val(parseFloat(0).toFixed(2));
						$("#noviembre__origen__salarios__restante").val(parseFloat(0).toFixed(2));

					}else{

						$("#noviembre__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#noviembre__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#noviembre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#noviembre__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#noviembre__origen__decimo__tercero").val(0);
						$("#noviembre__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#noviembre__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#noviembre__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#noviembre__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#noviembre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#noviembre__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#noviembre__origen__decimo__tercero__restante").val(0);
						$("#noviembre__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#noviembre__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}

					if(parseFloat(z.diciembre)==0){

						$("#diciembre__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#diciembre__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#diciembre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#diciembre__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#diciembre__origen__decimo__tercero").val(parseFloat(z.decimoTercera).toFixed(2));
						$("#diciembre__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#diciembre__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#diciembre__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#diciembre__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#diciembre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#diciembre__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#diciembre__origen__decimo__tercero__restante").val(parseFloat(z.decimoTercera).toFixed(2));
						$("#diciembre__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#diciembre__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}else{

						$("#diciembre__origen__aporte__patronal").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#diciembre__origen__decimo__cuarto").val(parseFloat(divididosCuarto).toFixed(2)):$("#diciembre__origen__decimo__cuarto").val(0);
						z.mensualizaTercera=='si' ? $("#diciembre__origen__decimo__tercero").val(parseFloat(divididosTercero).toFixed(2)):$("#diciembre__origen__decimo__tercero").val(parseFloat(z.decimoTercera).toFixed(2));
						$("#diciembre__origen__fondos__de__reserva").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#diciembre__origen__salarios").val(parseFloat(z.sueldoSalario).toFixed(2));


						$("#diciembre__origen__aporte__patronal__restante").val(parseFloat(z.aportePatronal).toFixed(2));
						z.menusalizaCuarta=='si' ? $("#diciembre__origen__decimo__cuarto__restante").val(parseFloat(divididosCuarto).toFixed(2)):$("#diciembre__origen__decimo__cuarto__restante").val(0);
						z.mensualizaTercera=='si' ? $("#diciembre__origen__decimo__tercero__restante").val(parseFloat(divididosTercero).toFixed(2)):$("#diciembre__origen__decimo__tercero__restante").val(parseFloat(z.decimoTercera).toFixed(2));
						$("#diciembre__origen__fondos__de__reserva__restante").val(parseFloat(z.fondosReserva).toFixed(2));
						$("#diciembre__origen__salarios__restante").val(parseFloat(z.sueldoSalario).toFixed(2));

					}

					/*=====  End of Asignación de bonificaciones en meses  ======*/
					
					
					/*==============================================
					=            Asignación de recursos            =
					==============================================*/
					
					let sumatores=0;

					sumatores=parseFloat(z.sueldoSalario)+parseFloat(z.aportePatronal)+parseFloat(z.decimoTercera)+parseFloat(z.decimoCuarta)+parseFloat(z.fondosReserva);

					$("#total__origenBeneficios").val(parseFloat(sumatores).toFixed(2));

					let sumatoreEnero=0;
					let sumatoreFebrero=0;
					let sumatoreMarzo=0;
					let sumatoreAbril=0;
					let sumatoreMayo=0;
					let sumatoreJunio=0;
					let sumatoreJulio=0;
					let sumatoreAgosto=0;
					let sumatoreSeptiembre=0;
					let sumatoreOctubre=0;
					let sumatoreNoviembre=0;
					let sumatoreDiciembre=0;

					sumatoreEnero=parseFloat($("#enero__origen__aporte__patronal").val()) +  parseFloat($("#enero__origen__decimo__tercero").val())  +  parseFloat($("#enero__origen__decimo__cuarto").val()) +  parseFloat($("#enero__origen__fondos__de__reserva").val()) +  parseFloat($("#enero__origen__salarios").val());
					sumatoreFebrero=parseFloat($("#febrero__origen__aporte__patronal").val()) +  parseFloat($("#febrero__origen__decimo__tercero").val())  +  parseFloat($("#febrero__origen__decimo__cuarto").val()) +  parseFloat($("#febrero__origen__fondos__de__reserva").val()) +  parseFloat($("#febrero__origen__salarios").val());
					sumatoreMarzo=parseFloat($("#marzo__origen__aporte__patronal").val()) +  parseFloat($("#marzo__origen__decimo__tercero").val())  +  parseFloat($("#marzo__origen__decimo__cuarto").val()) +  parseFloat($("#marzo__origen__fondos__de__reserva").val()) +  parseFloat($("#marzo__origen__salarios").val());
					sumatoreAbril=parseFloat($("#abril__origen__aporte__patronal").val()) +  parseFloat($("#abril__origen__decimo__tercero").val())  +  parseFloat($("#abril__origen__decimo__cuarto").val()) +  parseFloat($("#abril__origen__fondos__de__reserva").val()) +  parseFloat($("#abril__origen__salarios").val());
					sumatoreMayo=parseFloat($("#mayo__origen__aporte__patronal").val()) +  parseFloat($("#mayo__origen__decimo__tercero").val())  +  parseFloat($("#mayo__origen__decimo__cuarto").val()) +  parseFloat($("#mayo__origen__fondos__de__reserva").val()) +  parseFloat($("#mayo__origen__salarios").val());
					sumatoreJunio=parseFloat($("#junio__origen__aporte__patronal").val()) +  parseFloat($("#junio__origen__decimo__tercero").val())  +  parseFloat($("#junio__origen__decimo__cuarto").val()) +  parseFloat($("#junio__origen__fondos__de__reserva").val()) +  parseFloat($("#junio__origen__salarios").val());
					sumatoreJulio=parseFloat($("#julio__origen__aporte__patronal").val()) +  parseFloat($("#julio__origen__decimo__tercero").val())  +  parseFloat($("#julio__origen__decimo__cuarto").val()) +  parseFloat($("#julio__origen__fondos__de__reserva").val()) +  parseFloat($("#julio__origen__salarios").val());
					sumatoreAgosto=parseFloat($("#agosto__origen__aporte__patronal").val()) +  parseFloat($("#agosto__origen__decimo__tercero").val())  +  parseFloat($("#agosto__origen__decimo__cuarto").val()) +  parseFloat($("#agosto__origen__fondos__de__reserva").val()) +  parseFloat($("#agosto__origen__salarios").val());
					sumatoreSeptiembre=parseFloat($("#septiembre__origen__aporte__patronal").val()) +  parseFloat($("#septiembre__origen__decimo__tercero").val())  +  parseFloat($("#septiembre__origen__decimo__cuarto").val()) +  parseFloat($("#septiembre__origen__fondos__de__reserva").val()) +  parseFloat($("#septiembre__origen__salarios").val());
					sumatoreOctubre=parseFloat($("#octubre__origen__aporte__patronal").val()) +  parseFloat($("#octubre__origen__decimo__tercero").val())  +  parseFloat($("#octubre__origen__decimo__cuarto").val()) +  parseFloat($("#octubre__origen__fondos__de__reserva").val()) +  parseFloat($("#octubre__origen__salarios").val());
					sumatoreNoviembre=parseFloat($("#noviembre__origen__aporte__patronal").val()) +  parseFloat($("#noviembre__origen__decimo__tercero").val())  +  parseFloat($("#noviembre__origen__decimo__cuarto").val()) +  parseFloat($("#noviembre__origen__fondos__de__reserva").val()) +  parseFloat($("#noviembre__origen__salarios").val());
					sumatoreDiciembre=parseFloat($("#diciembre__origen__aporte__patronal").val()) +  parseFloat($("#diciembre__origen__decimo__tercero").val())  +  parseFloat($("#diciembre__origen__decimo__cuarto").val()) +  parseFloat($("#diciembre__origen__fondos__de__reserva").val()) +  parseFloat($("#diciembre__origen__salarios").val());

					$("#idHonorarios").val(z.idHonorarios);
					$("#enero__origen").val(parseFloat(sumatoreEnero).toFixed(2));
					$("#febrero__origen").val(parseFloat(sumatoreFebrero).toFixed(2));
					$("#marzo__origen").val(parseFloat(sumatoreMarzo).toFixed(2));
					$("#abril__origen").val(parseFloat(sumatoreAbril).toFixed(2));
					$("#mayo__origen").val(parseFloat(sumatoreMayo).toFixed(2));
					$("#junio__origen").val(parseFloat(sumatoreJunio).toFixed(2));
					$("#julio__origen").val(parseFloat(sumatoreJulio).toFixed(2));
					$("#agosto__origen").val(parseFloat(sumatoreAgosto).toFixed(2));
					$("#septiembre__origen").val(parseFloat(sumatoreSeptiembre).toFixed(2));
					$("#octubre__origen").val(parseFloat(sumatoreOctubre).toFixed(2));
					$("#noviembre__origen").val(parseFloat(sumatoreNoviembre).toFixed(2));
					$("#diciembre__origen").val(parseFloat(sumatoreDiciembre).toFixed(2));
					$("#total__origen").val(parseFloat(z.total).toFixed(2));

					
					$("#enero__origen__restante").val(parseFloat(sumatoreEnero).toFixed(2));
					$("#febrero__origen__restante").val(parseFloat(sumatoreFebrero).toFixed(2));
					$("#marzo__origen__restante").val(parseFloat(sumatoreMarzo).toFixed(2));
					$("#abril__origen__restante").val(parseFloat(sumatoreAbril).toFixed(2));
					$("#mayo__origen__restante").val(parseFloat(sumatoreMayo).toFixed(2));
					$("#junio__origen__restante").val(parseFloat(sumatoreJunio).toFixed(2));
					$("#julio__origen__restante").val(parseFloat(sumatoreJulio).toFixed(2));
					$("#agosto__origen__restante").val(parseFloat(sumatoreAgosto).toFixed(2));
					$("#septiembre__origen__restante").val(parseFloat(sumatoreSeptiembre).toFixed(2));
					$("#octubre__origen__restante").val(parseFloat(sumatoreOctubre).toFixed(2));
					$("#noviembre__origen__restante").val(parseFloat(sumatoreNoviembre).toFixed(2));
					$("#diciembre__origen__restante").val(parseFloat(sumatoreDiciembre).toFixed(2));
					

					/*=====  End of Asignación de recursos  ======*/
					
				}

				$(".oculto__tabla__destino").show();


				/*==================================================
				=            Obteniendo datas iniciales            =
				==================================================*/
				var sumarSueldosModificaciones__auto__llamados=function(clase__origen,total__fila){

					let sumadorClases=0;

					$(clase__origen).each(function(index) {
						sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
					});

					$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

				}

				sumarSueldosModificaciones__auto__llamados($(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal"));
				sumarSueldosModificaciones__auto__llamados($(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero"));	
				sumarSueldosModificaciones__auto__llamados($(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto"));	
				sumarSueldosModificaciones__auto__llamados($(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva"));	
				sumarSueldosModificaciones__auto__llamados($(".origen__salarios__restante__clase"),$("#total__origen__salarios"));					
				
				
				/*=====  End of Obteniendo datas iniciales  ======*/
				

			},
			error: function () {

			}

		});



				/*==================================================
				=            Obteniendo datas iniciales            =
				==================================================*/
				
				var sumarSueldosModificaciones__auto__llamados=function(clase__origen,total__fila,selector){

					$(selector).on('change', function (e){

						let sumadorClases=0;

						$(clase__origen).each(function(index) {
							sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
						});

						$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

					});

				}

				sumarSueldosModificaciones__auto__llamados($(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal"),$("#persona_sueldos_data"));				
				
				
				/*=====  End of Obteniendo datas iniciales  ======*/
				

	});

}


var sueldos_honorarios_data = function (parametro1, parametro2) {

	indicador = 1;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selectorDisminucion.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);


	}).fail(function () { });

}



var sueldos_sueldos_data = function (parametro1, parametro2) {

	indicador = 2;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selectorDisminucion.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);


	}).fail(function () { });

}
