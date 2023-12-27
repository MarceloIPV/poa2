$(document).ready(function () {

	$.getScript("layout/scripts/js/ajax/datatablet.js", function () {

		$("#idModificacionesFechas").click(function (e) {

			datatablets($("#tabla__fechas__modificaciones"), "tabla__fechas__modificaciones", false, false, false, false, false, false, false);

		});

	});


	$.getScript("layout/scripts/js/disminucion/modificacionGlobalDisminicion.js", function () {

	honorarios_data($("#persona_honorarios_data"), ["cedula__origen", "cargo__origen", "tipo__cargo__origen", "tiempo__trabajo__meses__origen", "sueldo__salario__origen", "aporte__origen", "decimo__tercero__origen", "mensualiza__tercero__origen", "decimo__cuarto__origen", "mensualiza__cuarto__origen", "fondos__de__reserva__origen"], "completa__informacion__salarios");
    
    sueldos_honorarios_data($("#persona_honorarios_data"), $("#idOrganismoPrincipal").val());


	});

	});