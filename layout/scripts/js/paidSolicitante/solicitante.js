function rubroGuardarNuevo() {

	var deporte = document.getElementById("deporte").value;
	var idModalidad = document.getElementById("idModalidad").value;
	var idNombres = document.getElementById("idNombres").value;
	var idprueba = document.getElementById("idprueba").value;
	var idategoria = document.getElementById("idategoria").value;
	var fechaInicio = document.getElementById("fechaInicio").value;
	var fechaFin = document.getElementById("fechaFin").value;
	var ciudad = document.getElementById("ciudad").value;
	var oficina = document.getElementById("oficina").value;
	var atletas = document.getElementById("atletas").value;
	var dias = document.getElementById("dias").value;
	var pax = document.getElementById("pax").value;
	var valorTotal = document.getElementById("valorTotal").value;
	var observaciones = document.getElementById("observaciones").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: {
				deporte: deporte, idModalidad: idModalidad, idNombres: idNombres, idprueba: idprueba, idategoria: idategoria, fechaInicio: fechaInicio, fechaFin: fechaFin, ciudad: ciudad
				, oficina: oficina, atletas: atletas, dias: dias, pax: pax, valorTotal: valorTotal, observaciones: observaciones
			},
			url: "controladores/paidSolicitante/rubrosGuardarNuevo.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		correcto();


	}
}








function rubroGuardarNuevoNecesidadesGenerales() {

	var modalidad = document.getElementById("modalidad").value;
	var articulo = document.getElementById("articulo").value;
	var cantidad = document.getElementById("cantidad").value;
	var valorUnitario = document.getElementById("valorUnitario").value;
	var valorTotal = document.getElementById("valorTotal").value;
	var sector = document.getElementById("sector").value;

	{
		var tabla = $.ajax({
			type: "post",
			data: { modalidad: modalidad, articulo: articulo, cantidad: cantidad, valorUnitario: valorUnitario, valorTotal: valorTotal, sector: sector },
			url: "controladores/paidSolicitante/rubrosGuardarNuevoNecesidadesGenerales.php",
			dataType: 'text',
			async: false,


		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		correcto();

	}
}







function rubroGuardarNuevoNecesidadesIndividuales() {

	var modalidad = document.getElementById("modalidad").value;
	var articulo = document.getElementById("articulo").value;
	var cantidad = document.getElementById("cantidad").value;
	var nombres = document.getElementById("nombres").value;
	var apellidos = document.getElementById("apellidos").value;
	var valorUnitario = document.getElementById("valorUnitario").value;
	var valorTotal = document.getElementById("valorTotal").value;
	var sector = document.getElementById("sector").value;

	{
		var tabla = $.ajax({
			type: "post",
			data: { modalidad: modalidad, articulo: articulo, nombres: nombres, apellidos: apellidos, cantidad: cantidad, valorUnitario: valorUnitario, valorTotal: valorTotal, sector: sector },
			url: "controladores/paidSolicitante/rubrosGuardarNuevoNecesidadesIndividuales.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		correcto();
	}
}


function interdisciplinarioGuardarNuevo() {

	var idModalidad = document.getElementById("idModalidad").value;
	var cedula = document.getElementById("cedula").value;
	var sexo = document.getElementById("sexo").value;
	var cargo = document.getElementById("cargo").value;
	var nombres = document.getElementById("nombres").value;
	var apellidos = document.getElementById("apellidos").value;
	var fechaInicio = document.getElementById("fechaInicio").value;
	var fechaFin = document.getElementById("fechaFin").value;
	var valorMes = document.getElementById("valorMes").value;
	var valorTotal = document.getElementById("valorTotal").value;
	var meses = document.getElementById("meses").value;
	var sector = document.getElementById("sector").value;

	{
		var tabla = $.ajax({
			type: "post",
			data: { idModalidad: idModalidad, cedula: cedula, sexo: sexo, cargo: cargo, nombres: nombres, apellidos: apellidos, fechaInicio: fechaInicio, fechaFin: fechaFin, valorMes: valorMes, meses: meses, valorTotal: valorTotal, sector: sector },
			url: "controladores/paidSolicitante/rubrosGuardarNuevoInterdisciplinario.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		correcto();
	}
}




function eventosDias() {
	var fechaInicio = document.getElementById("fechaInicio").value;
	var fechaFin = document.getElementById("fechaFin").value;
	fecha1 = new Date(fechaInicio);
	fecha2 = new Date(fechaFin);
	fechaDias = Date.parse(fecha2) - Date.parse(fecha1);
	fechasFinal = fechaDias / (1000 * 60 * 60 * 24);
	$(dias).val(fechasFinal);
}


function eventosNumeroAtletas() {
	var oficina = document.getElementById("oficina").value;
	var atletas = document.getElementById("atletas").value;
	numeroTotal = parseInt(oficina) + parseInt(atletas);

	$(pax).val(numeroTotal);

}

function funcionEliminarEvento() {
	alert('aqui');
}


function interdisciplinarioMeses() {
	var valorMes = document.getElementById("valorMes").value;
	var meses = document.getElementById("meses").value;
	numeroTotal = parseInt(valorMes) * parseInt(meses);

	$(valorTotal).val(numeroTotal);

}

function necesidadesIndividualesValorTotal() {
	var cantidad = document.getElementById("cantidad").value;
	var valorUnitario = document.getElementById("valorUnitario").value;
	numeroTotal = parseInt(cantidad) * parseInt(valorUnitario);

	$(valorTotal).val(numeroTotal);

}

function necesidadesGeneralesValorTotal() {
	var cantidad = document.getElementById("cantidad").value;
	var valorUnitario = document.getElementById("valorUnitario").value;
	numeroTotal = parseInt(cantidad) * parseInt(valorUnitario);

	$(valorTotal).val(numeroTotal);

}

function correcto() {
	alertify.set("notifier", "position", "top-center");
	alertify.notify("Registro realizado correctamente", "success", 5, function () { });
	window.setTimeout(function () {
		location.reload();
	}, 3000);
}





function encuentroActivoGuardarNuevo() {

	var idNombres = document.getElementById("idNombres").value;
	var sede = document.getElementById("sede").value;
	var instituciones = document.getElementById("instituciones").value;
	var fechaInicio = document.getElementById("fechaInicio").value;
	var fechaFin = document.getElementById("fechaFin").value;
	var deportes = document.getElementById("deportes").value;
	var categoria = document.getElementById("categoria").value;
	var damas = document.getElementById("damas").value;
	var caballeros = document.getElementById("caballeros").value;
	var entrenadores = document.getElementById("entrenadores").value;
	var valorTotal = document.getElementById("valorTotal").value;
	var observaciones = document.getElementById("observaciones").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: {
				idNombres: idNombres, sede: sede, instituciones: instituciones, fechaInicio: fechaInicio, fechaFin: fechaFin, deportes: deportes, categoria: categoria, damas: damas
				, caballeros: caballeros, entrenadores: entrenadores, valorTotal: valorTotal, observaciones: observaciones
			},
			url: "controladores/paidSolicitante/encuentroActivoGuardarNuevo.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		correcto();
	}
}



function generarPaidGeneral() {
	alert("d");

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "controladores/paidSolicitante/generarPaidGeneral.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("pdf").innerHTML = tabla;



	}
}





function generarIndicadores() {
	alert("d");

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "controladores/paidSolicitante/generarPaidGeneral.php",
			dataType: 'text',
			async: false
		}).responseText;


		document.getElementById("pdf").innerHTML = tabla;



	}
}




function veo() {
	alertify.set("notifier", "position", "top-center");
	alertify.notify("Se envió correctamente", "success", 5, function () { });
	window.setTimeout(function () {
		location.reload();
	}, 3000);
}



function respuesta(op) {

	if (op == 1) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se envió correctamente", "success", 5, function () { });
		window.setTimeout(function () {
			location.reload();
		}, 3000);
	}
	if (op == 0) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se envió correctamente", "success", 5, function () { });
		window.setTimeout(function () {
			location.reload();
		}, 3000);
	}
}


function rubrosAREnvio() {
	var tipo = 0;

	{
		var tabla = $.ajax({
			type: "post",
			data: { tipo: tipo },
			url: "controladores/paidSolicitante/rubrosEnvio.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		respuesta(tabla);

	}
}




function rubrosEAEnvio() {
	var tipo = 1;

	{
		var tabla = $.ajax({
			type: "post",
			data: { tipo: tipo },
			url: "controladores/paidSolicitante/rubrosEnvio.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		respuesta(tabla);

	}
}




function rubrosItemsCragar(items,montos) {
	{
		var tabla = $.ajax({
			type: "post",
			data: { items: items },
			url: "controladores/paidSolicitante/rubrosItemsCragar.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("rubrosItems").innerHTML = tabla;

	   $(valorAsignado).val(montos);

	}

}


function rubrospgTotal() {
	var totalr=0;
	var eneropg = document.getElementById("eneropg").value;
	var febreropg = document.getElementById("febreropg").value;
	var marzopg = document.getElementById("marzopg").value;
	var abrilpg = document.getElementById("abrilpg").value;
	var mayopg = document.getElementById("mayopg").value;
	var juniopg = document.getElementById("juniopg").value;
	var juliopg = document.getElementById("juliopg").value;
	var agostopg = document.getElementById("agostopg").value;
	var septiembrepg = document.getElementById("septiembrepg").value;
	var octubrepg = document.getElementById("octubrepg").value;
	var noviembrepg = document.getElementById("noviembrepg").value;
	var diciembrepg = document.getElementById("diciembrepg").value;

	var v2 = document.getElementById("valorFalta").value;
	var v1 = document.getElementById("totalProgramado").value;

		total = parseFloat(eneropg) + parseFloat(febreropg) + parseFloat(marzopg) + parseFloat(abrilpg) + parseFloat(mayopg) +
		parseFloat(juniopg) + parseFloat(juliopg) + parseFloat(agostopg) + parseFloat(septiembrepg) + parseFloat(octubrepg) +
		parseFloat(noviembrepg) + parseFloat(diciembrepg);

	$(totalProgramado).val(total);

	var v01=parseFloat(v1);
	var v02=parseFloat(v2);
	if (v01 > v02) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor programado supera el valor asignado.", "error", 5, function () { });
		$(eneropg).val(0);
		$(febreropg).val(0);
		$(marzopg).val(0);
		$(abrilpg).val(0);
		$(mayopg).val(0);
		$(juniopg).val(0);
		$(juliopg).val(0);
		$(agostopg).val(0);
		$(septiembrepg).val(0);
		$(octubrepg).val(0);
		$(noviembrepg).val(0);
		$(diciembrepg).val(0);
		

	}

}





function rubrospgiTotal() {
	var num1 = document.getElementById("eneropgi").value;
	var num2 = document.getElementById("febreropgi").value;
	var num3 = document.getElementById("marzopgi").value;
	var num4 = document.getElementById("abrilpgi").value;
	var num5 = document.getElementById("mayopgi").value;
	var num6 = document.getElementById("juniopgi").value;
	var num7 = document.getElementById("juliopgi").value;
	var num8 = document.getElementById("agostopgi").value;
	var num9 = document.getElementById("septiembrepgi").value;
	var num10 = document.getElementById("octubrepgi").value;
	var num11 = document.getElementById("noviembrepgi").value;
	var num12 = document.getElementById("diciembrepgi").value;
	totali = parseFloat(num1) + parseFloat(num2) + 
			 parseFloat(num3) + parseFloat(num4) + parseFloat(num5) +
		     parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + 
		     parseFloat(num9) + parseFloat(num10) +
	         parseFloat(num11) + parseFloat(num12);

	$(totalProgramadoi).val(totali);




	var v2 = document.getElementById("valorFalta").value;
	var v1 = document.getElementById("totalProgramado").value;

	var v01=parseFloat(v1);
	var v02=parseFloat(v2);
	if (v01 > v02) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor programado supera el valor asignado.", "error", 5, function () { });
	
		

	}

}



function guardarNuevoPaidGeneral() {
	var parametro1 = document.getElementById("eneropg").value;
	var parametro2 = document.getElementById("febreropg").value;
	var parametro3 = document.getElementById("marzopg").value;
	var parametro4 = document.getElementById("abrilpg").value;
	var parametro5 = document.getElementById("mayopg").value;
	var parametro6 = document.getElementById("juniopg").value;
	var parametro7 = document.getElementById("juliopg").value;
	var parametro8 = document.getElementById("agostopg").value;
	var parametro9 = document.getElementById("septiembrepg").value;
	var parametro10 = document.getElementById("octubrepg").value;
	var parametro11 = document.getElementById("noviembrepg").value;
	var parametro12 = document.getElementById("diciembrepg").value;

	var parametro13 = document.getElementById("programapg").value;
	var parametro14 = document.getElementById("componentespg").value;
	var parametro15 = document.getElementById("rubrospg").value;
	var parametro16 = document.getElementById("rubrospgitems").value;
	var parametro17 = document.getElementById("totalProgramado").value;

	var tipo = 0;

	{
		var tabla = $.ajax({
			type: "post",
			data: {
				parametro1: parametro1, parametro2: parametro2, parametro3: parametro3,
				parametro4: parametro4, parametro5: parametro5, parametro6: parametro6,
				parametro7: parametro7, parametro8: parametro8, parametro9: parametro9,
				parametro10: parametro10, parametro11: parametro11, parametro12: parametro12,
				parametro13: parametro13, parametro14: parametro14, parametro15: parametro15,
				parametro16: parametro16, parametro17: parametro17,tipo:tipo
			},
			url: "controladores/paidSolicitante/rubrosGuardarNuevoPaidGeneral.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		respuesta(tabla);
	}
}







function guardarNuevoPaidIndicadores() {
	var parametro1 = document.getElementById("eneropgi").value;
	var parametro2 = document.getElementById("febreropgi").value;
	var parametro3 = document.getElementById("marzopgi").value;
	var parametro4 = document.getElementById("abrilpgi").value;
	var parametro5 = document.getElementById("mayopgi").value;
	var parametro6 = document.getElementById("juniopgi").value;
	var parametro7 = document.getElementById("juliopgi").value;
	var parametro8 = document.getElementById("agostopgi").value;
	var parametro9 = document.getElementById("septiembrepgi").value;
	var parametro10 = document.getElementById("octubrepgi").value;
	var parametro11 = document.getElementById("noviembrepgi").value;
	var parametro12 = document.getElementById("diciembrepgi").value;

	var parametro13 = document.getElementById("programapgi").value;
	var parametro14 = document.getElementById("componentespgi").value;
	var parametro15 = document.getElementById("indicadorpgi").value;
	var parametro17 = document.getElementById("totalProgramadoi").value;
	var parametro18 = document.getElementById("beneficiopg1").value;

	var tipo = 0;
	{
		var tabla = $.ajax({
			type: "post",
			data: {
				parametro1: parametro1, parametro2: parametro2, parametro3: parametro3,
				parametro4: parametro4, parametro5: parametro5, parametro6: parametro6,
				parametro7: parametro7, parametro8: parametro8, parametro9: parametro9,
				parametro10: parametro10, parametro11: parametro11, parametro12: parametro12,
				parametro13: parametro13, parametro14: parametro14, parametro15: parametro15, 
				tipo: tipo,parametro17: parametro17,parametro18: parametro18
			},
			url: "controladores/paidSolicitante/rubrosGuardarNuevoPaidIndicadores.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data1").innerHTML = tabla;
		respuesta(tabla);
	}
}




function guardarNuevoPaidGeneralEA() {
	var parametro1 = document.getElementById("eneropg").value;
	var parametro2 = document.getElementById("febreropg").value;
	var parametro3 = document.getElementById("marzopg").value;
	var parametro4 = document.getElementById("abrilpg").value;
	var parametro5 = document.getElementById("mayopg").value;
	var parametro6 = document.getElementById("juniopg").value;
	var parametro7 = document.getElementById("juliopg").value;
	var parametro8 = document.getElementById("agostopg").value;
	var parametro9 = document.getElementById("septiembrepg").value;
	var parametro10 = document.getElementById("octubrepg").value;
	var parametro11 = document.getElementById("noviembrepg").value;
	var parametro12 = document.getElementById("diciembrepg").value;

	var parametro13 = document.getElementById("programapg").value;
	var parametro14 = document.getElementById("componentespg").value;
	var parametro15 = document.getElementById("rubrospg").value;
	var parametro16 = document.getElementById("rubrospgitems").value;
	var parametro17 = document.getElementById("totalProgramado").value;

	var tipo = 1;

	{
		var tabla = $.ajax({
			type: "post",
			data: {
				parametro1: parametro1, parametro2: parametro2, parametro3: parametro3,
				parametro4: parametro4, parametro5: parametro5, parametro6: parametro6,
				parametro7: parametro7, parametro8: parametro8, parametro9: parametro9,
				parametro10: parametro10, parametro11: parametro11, parametro12: parametro12,
				parametro13: parametro13, parametro14: parametro14, parametro15: parametro15,
				parametro16: parametro16, parametro17: parametro17,tipo:tipo
			},
			url: "controladores/paidSolicitante/rubrosGuardarNuevoPaidGeneral.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		respuesta(tabla);
		valorFalta(parametro15);
	}
}







function guardarNuevoPaidIndicadoresEA() {
	var parametro1 = document.getElementById("eneropgi").value;
	var parametro2 = document.getElementById("febreropgi").value;
	var parametro3 = document.getElementById("marzopgi").value;
	var parametro4 = document.getElementById("abrilpgi").value;
	var parametro5 = document.getElementById("mayopgi").value;
	var parametro6 = document.getElementById("juniopgi").value;
	var parametro7 = document.getElementById("juliopgi").value;
	var parametro8 = document.getElementById("agostopgi").value;
	var parametro9 = document.getElementById("septiembrepgi").value;
	var parametro10 = document.getElementById("octubrepgi").value;
	var parametro11 = document.getElementById("noviembrepgi").value;
	var parametro12 = document.getElementById("diciembrepgi").value;

	var parametro13 = document.getElementById("programapgi").value;
	var parametro14 = document.getElementById("componentespgi").value;
	var parametro15 = document.getElementById("indicadorpgi").value;
	var parametro17 = document.getElementById("totalProgramadoi").value;
	var parametro18 = document.getElementById("beneficiopg1").value;

	var tipo = 1;
	{
		var tabla = $.ajax({
			type: "post",
			data: {
				parametro1: parametro1, parametro2: parametro2, parametro3: parametro3,
				parametro4: parametro4, parametro5: parametro5, parametro6: parametro6,
				parametro7: parametro7, parametro8: parametro8, parametro9: parametro9,
				parametro10: parametro10, parametro11: parametro11, parametro12: parametro12,
				parametro13: parametro13, parametro14: parametro14, parametro15: parametro15, 
				tipo: tipo,parametro17: parametro17,parametro18: parametro18
			},
			url: "controladores/paidSolicitante/rubrosGuardarNuevoPaidIndicadores.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data1").innerHTML = tabla;
		respuesta(tabla);
	}
}


var valorFalta = function (parametro1,parametro2) {
		var paqueteDeDatos = new FormData();
		paqueteDeDatos.append("tipo", "valorFaltante");
		paqueteDeDatos.append("idRubros", parametro1);
		paqueteDeDatos.append("montos", parametro2);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAccionesSolcitante.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				var elementos = JSON.parse(response);
				var indicadorInformacion = elementos['obtenerInformacion'];

				for (z of indicadorInformacion) {				

					$("#valorFalta").val(z.valorFaltante);


					
				}

			},
			error: function () {

			}

		});



}


var rubrosEAobservador = function () {

	
		var paqueteDeDatos = new FormData();
		paqueteDeDatos.append('tipo', 'rubrosEAobservador');
		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAccionesSolcitante.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

			
				var elementos = JSON.parse(response);
				var indicadorInformacion = elementos['obtenerInformacion'];

					for (w of indicadorInformacion) {

						$(".observacion__1").text(w.opcion1);
						$(".observacion__2").text(w.opcion2);
						$(".observacion__3").text(w.opcion3);
						$(".observacion__4").text(w.opcion4);
						$(".observacion__5").text(w.opcion5);
						$(".observacion__6").text(w.opcion6);
						$(".observacion__7").text(w.opcion7);
						$(".observacion__8").text(w.opcion8);
						$(".observacion__9").text(w.opcion9);


						$(".comentario__1").text(w.comentario1);
						$(".comentario__2").text(w.comentario2);
						$(".comentario__3").text(w.comentario3);
						$(".comentario__4").text(w.comentario4);
						$(".comentario__5").text(w.comentario5);
						$(".comentario__6").text(w.comentario6);
						$(".comentario__7").text(w.comentario7);
						$(".comentario__8").text(w.comentario8);
						$(".comentario__9").text(w.comentario9);

					}


				

				

			},
			error: function () {

			}

		});


	

}




function verRubro1(id) {
	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "controladores/paidSolicitante/verRubro.php",
			dataType: 'text',
			async: false
		}).responseText;
		document.getElementById("data2").innerHTML = tabla;
	}
}


function verRubro2(id) {
	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "controladores/paidSolicitante/verRubro2.php",
			dataType: 'text',
			async: false
		}).responseText;
		document.getElementById("data2").innerHTML = tabla;
	}
}

function verRubro3(id) {
	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "controladores/paidSolicitante/verRubro3.php",
			dataType: 'text',
			async: false
		}).responseText;
		document.getElementById("data2").innerHTML = tabla;
	}
}

function verRubro4(id) {
	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "controladores/paidSolicitante/verRubro4.php",
			dataType: 'text',
			async: false
		}).responseText;
		document.getElementById("data2").innerHTML = tabla;
	}
}



function verPAIDG(id) {
	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "controladores/paidSolicitante/verPAIDG.php",
			dataType: 'text',
			async: false
		}).responseText;
		document.getElementById("data2").innerHTML = tabla;
	}
}