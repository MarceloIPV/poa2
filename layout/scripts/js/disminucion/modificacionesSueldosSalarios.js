function obtener_valor_mes(mes) {

	var idSueldos = document.getElementById("idSueldos").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { mes: mes, idSueldos: idSueldos },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesSueldosSalarios.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
	}
}

function obtener_valor_mes_honorarios(mes) {

	var idHonorarios = document.getElementById("idHonorarios").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { mes: mes, idHonorarios: idHonorarios },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesMontos.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
	}
}




function obtener_destino() {

	var idSueldos = document.getElementById("idSueldos").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificacionesSueldosSalariosDestino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("destino").innerHTML = tabla;
	}
}

function origen() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificacionesOrigen.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}

function destino() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/destino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
	}
}



function obtener_valor_disminuir() {

	var sueldoDisminuye = document.getElementById("sueldo__salario__disminucion").value;
	var aporte = document.getElementById("aporte__origen__disminucion").value;
	var sueldo = document.getElementById("sueldo__salario__disminucion").value;
	var fondosReserva = document.getElementById("fondos__de__reserva__disminucion").value;
	var decimoCuarta = document.getElementById("decimo__cuarto__disminucion").value;
	var decimoTercera = document.getElementById("decimo__tercero__disminucion").value;
	var justificacion = document.getElementById("origen_justificacion").value;

	total = parseFloat(sueldoDisminuye) + parseFloat(aporte) + parseFloat(fondosReserva) + parseFloat(decimoCuarta) + parseFloat(decimoTercera);

	document.getElementById("demo").innerHTML = total;

	alertify.set("notifier", "position", "top-center");


}



function modificacion_sueldo_Salario_disminuyer_destino() {

	var actividad = document.getElementById("actividad__modificaciones__destino__new").value;
	var item = document.getElementById("item__modificaciones__destino__new").value;
	var codigo = document.getElementById("codigo__presupuestarios__destino__new").value;
	var meses = document.getElementById("meses").value;
	var monto = document.getElementById("monto__seleccionados__destino__new").value;
	var idOrigen = document.getElementById("idModificacionOrigen").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { actividad: actividad, item: item, codigo: codigo, meses: meses, monto: monto, idOrigen: idOrigen },
			url: "modelosBd/POA_MODIFICACIONES/guardar_disminucion_destino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
		destino_sueldo();
		origen_sueldo();
	}
}


function modificaciones_valores_disminuye_nuevo(mes, idSueldos) {


	var aporte = document.getElementById("aporte__origen__disminucion").value;
	var sueldo = document.getElementById("sueldo__salario__disminucion").value;
	var fondosReserva = document.getElementById("fondos__de__reserva__disminucion").value;
	var decimoCuarta = document.getElementById("decimo__cuarto__disminucion").value;
	var decimoTercera = document.getElementById("decimo__tercero__disminucion").value;
	var justificacion = document.getElementById("origen_justificacion").value;
	var total = parseFloat(sueldo) + parseFloat(aporte) + parseFloat(fondosReserva) + parseFloat(decimoCuarta) + parseFloat(decimoTercera);
	$("#mes_origen").val(mes);
	$("#monto_origen").val(total);

	$("#monto__seleccionados__destino__new2").val(total)


}



function obtener_eventos() {

	var actividad = document.getElementById("actividad__modificaciones__destino__new").value;

	if (actividad == '3' || actividad == '5' || actividad == '6' || actividad == '7') {
		carga_combo_actividades();

	} else {
		document.getElementById("eventos").innerHTML = "";
	}
}


function carga_combo_actividades() {
	var actividad = document.getElementById("actividad__modificaciones__destino__new").value;


	{
		var tabla = $.ajax({
			type: "post",
			data: { actividad: actividad },
			url: "modelosBd/POA_MODIFICACIONES/combo_eventos.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("eventos").innerHTML = tabla;
		document.getElementById("data").innerHTML = "";
		document.getElementById("personal").innerHTML = "";
	}
}


function obtener_items(id) {

	if (id == '1') {

		{
			var tabla = $.ajax({
				type: "post",
				data: {},
				url: "modelosBd/POA_MODIFICACIONES/combo_vacantes.php",
				dataType: 'text',
				async: false
			}).responseText;

			document.getElementById("personal").innerHTML = tabla;
		}
	}
	if (id == '2') {

		{
			var tabla = $.ajax({
				type: "post",
				data: {},
				url: "modelosBd/POA_MODIFICACIONES/combo_vacantes.php",
				dataType: 'text',
				async: false
			}).responseText;

			document.getElementById("personal").innerHTML = tabla;
		}
	}

}


function guardar_personal_nuevo() {

}


function nuevo_personal() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/nuevo_personal.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
	}
}


function ver() {

	$(cedula__origen).val(10);

}





function modificaciones_valores_disminuye_honorarios(mes, idHonorarios) {


	var sueldo_anterior = document.getElementById("sueldo_anterior").value;
	var sueldo_nuevo = document.getElementById("sueldo_nuevo").value;
	var justificacion = document.getElementById("justificacion").value;

	console.log(sueldo_anterior);
	console.log(sueldo_nuevo);
	if (sueldo_nuevo > sueldo_anterior) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Es valor a disminuir excede el monto actual.", "error", 5, function () { });
	} else {

		var tabla = $.ajax({
			type: "post",
			data: { mes: mes, sueldo: sueldo_nuevo, idHonorarios: idHonorarios, justificacion: justificacion },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaDiminuyeMontos.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("error").innerHTML = tabla;
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se guardo correctamente", "success", 5, function () { });

		honorarios();


	}

}


function honorarios() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificacionesMontosCambios.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("honorarios").innerHTML = tabla;
	}
}

function verHonorarios() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificacionesMontosCambiosVer.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("honorarios1").innerHTML = tabla;
	}
}

function eliminar_origen_monto(idMontos) {

	{
		var tabla = $.ajax({
			type: "post",
			data: { idMontos: idMontos },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaDiminuyeMontosEliminarOrigen.php",
			dataType: 'text',
			async: false
		}).responseText;

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se eliminó correctamente", "success", 5, function () { });
		document.getElementById("mensaje").innerHTML = tabla;

	}
}

function reemplazo() {

	var idHonorarios = document.getElementById("idHonorarios").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { idHonorarios: idHonorarios },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaDiminuyeMontosReemplazo.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;

	}
}

$(document).ready(function () {
	$('.js-example-basic-multiple').select2();
});


function guardar_reemplazo(nombre, cedula, idHonorarios) {

	{
		var tabla = $.ajax({
			type: "post",
			data: { nombre: nombre, cedula: cedula, idHonorarios: idHonorarios },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaReemplazo.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;

	}
}

function guardar_reemplazo2(idHonorarios) {

	var nombre = document.getElementById("nombre").value;
	var cedula = document.getElementById("cedula2").value;


	{
		var tabla = $.ajax({
			type: "post",
			data: { nombre: nombre, cedula: cedula, idHonorarios: idHonorarios },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaReemplazo.php",
			dataType: 'text',
			async: false
		}).responseText;
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se reemplazo correctamente", "success", 5, function () { });
		document.getElementById("mensaje").innerHTML = tabla;

	}
}


function modificacion_item_presupuestario() {

	var actividad = document.getElementById("actividad__modificaciones__destino__new").value;
	var item = document.getElementById("item__modificaciones__destino__new").value;
	var meses = document.getElementById("meses").value;
	var monto = document.getElementById("monto__seleccionados__destino__new").value;

	var codigo = document.getElementById("codigo__presupuestarios__destino__new").value;




	{
		var tabla = $.ajax({
			type: "post",
			data: { actividad: actividad, codigo: codigo, item: item, meses: meses, monto: monto },
			url: "modelosBd/POA_MODIFICACIONES/guardar_disminucion_monto.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
		destino();
	}
}



function destino_montos() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/destino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
	}
}

/******* */

function nuevo_item() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/nuevo_item.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
	}
}


function nuevo_personal() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/nuevo_personal.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
	}
}

function vacantes(idUsuario) {
	var tabla = $.ajax({
		type: "post",
		data: { idUsuario: idUsuario },
		url: "modelosBd/POA_MODIFICACIONES/vacantes.php",
		dataType: 'text',
		async: false
	}).responseText;

	document.getElementById("vacantes").innerHTML = tabla;
}


function recursos_sobrantes() {
	//alert("2");
}

function cumplimiento() {
	//alert("3");
}

function ver_items(idUsuario) {


	var item = document.getElementById("item__modificaciones__destino__new").value;
	var tipo = "";
	var tipoServicio = 0;
	//alert(item);
	//augua 15415
	//luz 15416
	if (item == 15415) {
		tipo = "Agua Potable";
		tipoServicio = 1;
		var tabla = $.ajax({
			type: "post",
			data: { idUsuario: idUsuario, tipo: tipo, tipoServicio: tipoServicio },
			url: "modelosBd/POA_MODIFICACIONES/suministros.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("suministros").innerHTML = tabla;
	} else if (item == 15416) {
		tipo = "Energía Eléctrica";
		tipoServicio = 2;
		var tabla = $.ajax({
			type: "post",
			data: { idUsuario: idUsuario, tipo: tipo, tipoServicio: tipoServicio },
			url: "modelosBd/POA_MODIFICACIONES/suministros.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("suministros").innerHTML = tabla;
	} else {
		document.getElementById("suministros").innerHTML = "";
	}




}


function nuevo_suministro(idUsuario, tipoServicio) {
	var tabla = $.ajax({
		type: "post",
		data: { idUsuario: idUsuario, tipoServicio: tipoServicio },
		url: "modelosBd/POA_MODIFICACIONES/nuevo_suministro.php",
		dataType: 'text',
		async: false
	}).responseText;

	document.getElementById("data").innerHTML = tabla;
}


function nuevo_suministro2(idUsuario, tipoServicio) {
	var tabla = $.ajax({
		type: "post",
		data: { idUsuario: idUsuario, tipoServicio: 2 },
		url: "modelosBd/POA_MODIFICACIONES/nuevo_suministro.php",
		dataType: 'text',
		async: false
	}).responseText;

	document.getElementById("data").innerHTML = tabla;
}



function suministros_guardar_nuevo(tipoServicio, idUsuario) {

	var tipo = document.getElementById("tipo").value;
	var nombre_escenario = document.getElementById("nombre_escenario").value;
	var suministro = document.getElementById("suministro").value;
	var tabla = $.ajax({
		type: "post",
		data: { tipo: tipo, nombre_escenario: nombre_escenario, suministro: suministro, idUsuario: idUsuario, tipoServicio: tipoServicio },
		url: "modelosBd/POA_MODIFICACIONES/suministros_guardar_nuevo.php",
		dataType: 'text',
		async: false
	}).responseText;

	document.getElementById("suministros").innerHTML = tabla;
	ver_items(idUsuario);
}


function modificacion_origen() {

	var actividad = document.getElementById("actividad__modificaciones__destino__new").value;
	var item = document.getElementById("item__modificaciones__destino__new").value;
	var meses = document.getElementById("meses").value;
	var monto = document.getElementById("monto__seleccionados__destino__new").value;
	var codigo = document.getElementById("codigo__presupuestarios__destino__new").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { actividad: actividad, codigo: codigo, item: item, meses: meses, monto: monto },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaOrigen.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("error").innerHTML = tabla;
		modificaciones_ver();
		modificaciones_ver2();
	}
}


function modificacion_destino1() {

	var actividad = document.getElementById("actividad__modificaciones__destino__new2_o").value;
	var item = document.getElementById("item__modificaciones__destino__new2_O").value;
	var meses = document.getElementById("meses2_o").value;
	var monto = document.getElementById("monto__seleccionados__destino__new2_O").value;
	var codigo = document.getElementById("codigo__presupuestarios__destino__new2_O").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { actividad: actividad, codigo: codigo, item: item, meses: meses, monto: monto },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaDestino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("error").innerHTML = tabla;
		modificaciones_ver();
		modificaciones_ver2();
	}
}

function modificaciones_ver() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificaciones_ver.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensajeOrigen").innerHTML = tabla;
	}
}

function modificaciones_ver2() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificaciones_ver_destino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensajeDestino").innerHTML = tabla;
	}
}



function ver_todo() {
	modificaciones_ver();
	modificaciones_ver2();
}


function graficas() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/graficas.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("graficas").innerHTML = tabla;
	}
}



function historial_sueldos_salarios() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/historial_sueldos_salarios.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}


function sueldo_eliminar(idModificacion) {
	alert(idModificacion);

}
function ver_monto() {

	$(sueldo__salario__disminucion).val(10);
}



function myFunction() {
	var sueldoDisminuye = document.getElementById("sueldo__salario__disminucion").value;
	var aporte = document.getElementById("aporte__origen__disminucion").value;
	var sueldo = document.getElementById("sueldo__salario__disminucion").value;
	var fondosReserva = document.getElementById("fondos__de__reserva__disminucion").value;
	var decimoCuarta = document.getElementById("decimo__cuarto__disminucion").value;
	var decimoTercera = document.getElementById("decimo__tercero__disminucion").value;
	var justificacion = document.getElementById("origen_justificacion").value;

	total = parseFloat(sueldoDisminuye) + parseFloat(aporte) + parseFloat(fondosReserva) + parseFloat(decimoCuarta) + parseFloat(decimoTercera);
	var x = document.getElementById("sueldo__salario__disminucion").value;
	document.getElementById("demo").innerHTML = total;
}

function valor1() {
	var parametro1 = document.getElementById("sueldo").value;
	var parametro2 = document.getElementById("sueldo__salario__disminucion").value;

	$(montoAsignadoOrigen).val(parametro1);
	if (parseFloat(parametro2) > parseFloat(parametro1)) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al origen.", "error", 5, function () { });
		$(sueldo__salario__disminucion).val(0);
	}

}


function valor2() {
	var parametro1 = document.getElementById("aporte__total__origen__disminucion").value;
	var parametro2 = document.getElementById("aporte__origen__disminucion").value;

	$(montoAsignadoOrigen).val(parametro1);
	if (parseFloat(parametro2) > parseFloat(parametro1)) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al origen.", "error", 5, function () { });
		$(aporte__origen__disminucion).val(0);
	}

}

function valor3() {
	var parametro1 = document.getElementById("decimo__tercero__total__origen__disminucion").value;
	var parametro2 = document.getElementById("decimo__tercero__disminucion").value;

	$(montoAsignadoOrigen).val(parametro1);
	if (parseFloat(parametro2) > parseFloat(parametro1)) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al origen.", "error", 5, function () { });
		$(decimo__tercero__disminucion).val(0);
	}

}

function valor4() {
	var parametro1 = document.getElementById("fondos__de__reserva__total__origen__disminucion").value;
	var parametro2 = document.getElementById("fondos__de__reserva__disminucion").value;

	$(montoAsignadoOrigen).val(parametro1);
	if (parseFloat(parametro2) > parseFloat(parametro1)) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al origen.", "error", 5, function () { });
		$(fondos__de__reserva__disminucion).val(0);
	}

}

function valor5() {
	var parametro1 = document.getElementById("decimo__cuarto__total__origen__disminucion").value;
	var parametro2 = document.getElementById("decimo__cuarto__disminucion").value;

	$(montoAsignadoOrigen).val(parametro1);
	if (parseFloat(parametro2) > parseFloat(parametro1)) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al origen.", "error", 5, function () { });
		$(decimo__cuarto__disminucion).val(0);
	}

}


function ver_item_trae() {
	var items = document.getElementById("item__modificaciones__destino__infraestructura").value;

	$(item2).val(items);

}

function pasar_valor(valor) {
	$(monto__seleccionados__destino__infraestructura).val(valor);
}

function pasar_valor1(valor) {
	$(monto__seleccionados__destino__new2_o).val(valor);
	$(monto__seleccionados__destino__new2).val(valor);
	$(monto__seleccionados__destino__new2_o1).val(valor);
}
function pasar_valor2(valor) {
	$(monto__seleccionados__destino__new2_o_i).val(valor);
	$(monto__seleccionados__destino__new2_o1).val(valor);

	$(monto__seleccionados__destino__new2_o1).val(valor);
}


function valorSuperior2() {
	var v1 = document.getElementById("monto__seleccionados__destino__new2_o_i").value;
	var v2 = document.getElementById("monto__seleccionados__destino__new2_o1").value;

	if (v1 > v2) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al original.", "error", 5, function () { });
	}
}

function valorSuperior() {
	var v1 = document.getElementById("monto__seleccionados__destino__new2_o").value;
	var v2 = document.getElementById("monto__seleccionados__destino__new2_o1").value;

	if (v1 > v2) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("El valor no debe ser mayor al original.", "error", 5, function () { });
	}
}


function origen_sueldo(id) {

	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesOrigen.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("origen_sueldo").innerHTML = tabla;
	}
}

function destino_sueldo() {

	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificacionesDestino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("destino_sueldo").innerHTML = tabla;
	}
}

function origen_destino_total(id, total) {
	$(monto__seleccionados__destino__new).val(total);
	$(idModificacionOrigen).val(id);
}

function sueldo_eliminar_destino(id) {

	{
		var tabla = $.ajax({
			type: "post",
			data: { id: id },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesDestinoEliminarSueldo.php",
			dataType: 'text',
			async: false
		}).responseText;

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se eliminó correctamente", "success", 5, function () { });
		document.getElementById("mensaje").innerHTML = tabla;

		origen_sueldo();
	}
}



function sueldo_eliminar_origen(idOrigen) {

	{
		var tabla = $.ajax({
			type: "post",
			data: { idOrigen: idOrigen },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesOrigenEliminarSueldo.php",
			dataType: 'text',
			async: false
		}).responseText;

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se eliminó correctamente", "success", 5, function () { });
		document.getElementById("mensaje").innerHTML = tabla;
		destino_sueldo();
		origen_sueldo();
	}
}

function tabla_total() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/tabla_total.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("tabla_total").innerHTML = tabla;
	}
}

function tabla_total_avances() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/tabla_total_avances.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("tabla_total_avances").innerHTML = tabla;
	}
}


function envio() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/modificacionesEnvioEjecutar.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
	}
}




function ver1() {

	var items = document.getElementById("actividad__modificaciones__destino__new").value;

	if (items == '1') {

		{
			var tabla = $.ajax({
				type: "post",
				data: {},
				url: "modelosBd/POA_MODIFICACIONES/combo_vacantes.php",
				dataType: 'text',
				async: false
			}).responseText;

			document.getElementById("personal").innerHTML = tabla;
		}
	}
	if (items == '4') {

		{
			var tabla = $.ajax({
				type: "post",
				data: {},
				url: "modelosBd/POA_MODIFICACIONES/combo_vacantes.php",
				dataType: 'text',
				async: false
			}).responseText;

			document.getElementById("personal").innerHTML = tabla;
		}
	}

}


function xx(id) {
	sueldos__y__salarios__asignacion('carga_personal_sueldos', id, 'completa__informacion__salarios');
}



var cargar_sueldos_honarios_act1 = function (id) {



	var paqueteDeDatos = new FormData();
	let idSueldos = id;
	var parametro3 = 'completa__informacion__salarios';
	paqueteDeDatos.append("tipo", parametro3);
	paqueteDeDatos.append("idSueldos", idSueldos);


	$.ajax({

		type: "POST",
		url: "modelosBd/inserta/modificacionesSueldosSalarios01.md.php",
		contentType: false,
		data: paqueteDeDatos,
		processData: false,
		cache: false,
		success: function (response) {

			var elementos = JSON.parse(response);
			var indicadorInformacion = elementos['indicadorInformacion'];

			for (z of indicadorInformacion) {

				if (parametro3 == "completa__informacion__salarios") {

					$("#idSueldos").val(z.idSueldos);
					$("#nombres_completos_origen").val(z.nombres);
					$("#cedula__origen").val(z.cedula);
					$("#cargo__origen").val(z.cargo);
					$("#tipo__cargo__origen").val(z.tipoCargo);
					$("#tiempo__trabajo__meses__origen").val(z.tiempoTrabajo);

					$("#mensualiza__tercero__origen").val(z.mensualizaTercera);
					$("#mensualiza__cuarto__origen").val(z.menusalizaCuarta);



					$("#idSueldos").val(idSueldos);
					$("#sueldo__salario__total__mensual__origen__disminucion").val(parseFloat(z.sueldoSalario).toFixed(2));
					$("#aporte__total__origen__disminucion").val(parseFloat(z.aportePatronal).toFixed(2));
					$valordecimoTercera = 0;
					$valordecimoCuarta = 0;
					$vTotal = 0;

					if (z.mensualizaTercera == 'si') {
						$valordecimoTercera = z.decimoTercera / 12;
						$("#decimo__tercero__total__origen__disminucion").val(parseFloat($valordecimoTercera).toFixed(2));
					} else if (z.mensualizaTercera == 'no') {
						$valordecimoTercera = 0;
						$("#decimo__tercero__total__origen__disminucion").val(parseFloat(0).toFixed(2));
					}

					if (z.menusalizaCuarta == 'si') {
						$valordecimoCuarta = z.decimoCuarta / 12;
						$("#decimo__cuarto__total__origen__disminucion").val(parseFloat($valordecimoCuarta).toFixed(2));
					} else if (z.menusalizaCuarta == 'no') {
						$valordecimoCuarta = 0;
						$("#decimo__cuarto__total__origen__disminucion").val(parseFloat(0).toFixed(2));
					}



					$vTotal = parseFloat(z.sueldoSalario) +
						parseFloat(z.aportePatronal) +
						$valordecimoTercera +
						parseFloat(z.fondosReserva) +
						$valordecimoCuarta;


					$("#sueldo__salario__mensual__origen__disminucion").val(parseFloat(0));
					$("#aporte__origen__disminucion").val(parseFloat(0));
					$("#decimo__tercero__origen__disminucion").val(parseFloat(0));
					$("#fondos__de__reserva__origen__disminucion").val(parseFloat(0));
					$("#decimo__cuarto__origen__disminucion").val(parseFloat(0));
					$("#total__disminucion").val(parseFloat(0));

					$("#fondos__de__reserva__total__origen__disminucion").val(parseFloat(z.fondosReserva).toFixed(2));
					$("#total__origen").val(parseFloat($vTotal).toFixed(2));
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

					$("#enero__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#febrero__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#marzo__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#abril__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#mayo__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#junio__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#julio__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#agosto__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#septiembre__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#octubre__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#noviembre__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));
					$("#diciembre__total__mensual__origen__disminucion").val(parseFloat(z.enero).toFixed(2));


				}

			}

		},
		error: function () {

		}

	});


}


function enviar_item(id) {

	$("#item_origen").val(id);
}



/*aqui */
function modificacion_destino() {

	var origen1 = document.getElementById("actividad__modificaciones__destino__new").value;
	var item1 = document.getElementById("item_origen").value;
	var mes1 = document.getElementById("mes_origen").value;
	var montoAsignadoOrigen = document.getElementById("montoAsignadoOrigen").value;
	var disminucionOrigen = document.getElementById("monto_origen").value;
	var totalOrigen = parseFloat(montoAsignadoOrigen) - parseFloat(disminucionOrigen);


	var origen2 = document.getElementById("actividad__modificaciones__destino__modificaciones2").value;
	var item2 = document.getElementById("codigo__presupuestarios__destino__new2").value;
	var mes2 = document.getElementById("meses2").value;
	var montoAsignadoDestino = document.getElementById("montoAsignadoDestino1").value;
	var aumentoDestino = document.getElementById("monto__seleccionados__destino__new2").value;
	var totalDestino = parseFloat(montoAsignadoDestino) + parseFloat(aumentoDestino);

	var idSueldos = document.getElementById("idSueldos").value;
	var justificacion = document.getElementById("origen_justificacion").value;


	{
		var tabla = $.ajax({
			type: "post",
			data: { idSueldos: idSueldos, origen1: origen1, montoAsignadoOrigen: montoAsignadoOrigen, disminucionOrigen: disminucionOrigen, totalOrigen: totalOrigen, item1: item1, mes1: mes1, origen2: origen2, item2: item2, mes2: mes2, aumentoDestino: aumentoDestino, montoAsignadoDestino: montoAsignadoDestino, totalDestino: totalDestino, justificacion: justificacion },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaDestino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se guardo correctamente", "success", 5, function () { });


	}

}


function valorCambio() {
	var parametro2 = document.getElementById("monto__seleccionados__destino__new2_o").value;

	$(monto__seleccionados__destino__new2).val(parametro2);
	$(monto__seleccionados__destino__new2).val(parametro2);


}


function valorCambio2() {
	var parametro2 = document.getElementById("monto__seleccionados__destino__new2_o_i").value;
	$(monto__seleccionados__destino__new2).val(parametro2);


}


function modificacion_destino_o() {

	var origen1 = document.getElementById("actividad__modificaciones__destino__modificaciones2_o_i").value;
	var item1 = document.getElementById("codigo__presupuestarios__destino__new2_o_i").value;
	var mes1 = document.getElementById("meses2_o_i").value;
	var monto1 = document.getElementById("monto__seleccionados__destino__new2_o_i").value;

	var origen2 = document.getElementById("actividad__modificaciones__destino__modificaciones2").value;
	var item2 = document.getElementById("codigo__presupuestarios__destino__new2").value;
	var mes2 = document.getElementById("meses2").value;
	var monto2 = document.getElementById("monto__seleccionados__destino__new2").value;

	var justificacion = document.getElementById("origen_justificacion").value;


	{
		var tabla = $.ajax({
			type: "post",
			data: { origen1: origen1, item1: item1, mes1: mes1, monto1: monto1, origen2: origen2, item2: item2, mes2: mes2, monto2: monto2, justificacion: justificacion },
			url: "modelosBd/POA_MODIFICACIONES/modificacionesGuardaDestino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se guardo correctamente", "success", 5, function () { });


	}

}




function historial_sueldos_salarios2() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/historial_sueldos_salarios2.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}



function historial_sueldos_salarios4() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/historial_sueldos_salarios4.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}



function historial_sueldos_salarios5() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/historial_sueldos_salarios5.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}


function historial_sueldos_salarios6() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/historial_sueldos_salarios6.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}


function historial_sueldos_salarios7() {
	{
		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/historial_sueldos_salarios6.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("origen").innerHTML = tabla;
	}
}




function cargar_nuevoevento() {

	var origen1 = document.getElementById("actividad__modificaciones__destino__modificaciones2").value;
	{

		var tabla = $.ajax({
			type: "post",
			data: {},
			url: "modelosBd/POA_MODIFICACIONES/boton_nuevo_item.php",
			dataType: 'text',
			cache: false,
			processData: false,
			async: false
		}).responseText;

		document.getElementById("ver11").innerHTML = tabla;
	}
}



function valor3() {

	$(sueldo__salario__disminucion).val('0');
	$(decimo__tercero__disminucion).val('0');
}


function guardar_desvinculacion() {


	var idSueldos = document.getElementById("idSueldos").value;
	var tipo_desvinculacion = document.getElementById("tipo_desvinculacion").value;
	var enero__despido = document.getElementById("enero__despido").value;
	var febrero__despido = document.getElementById("febrero__despido").value;
	var marzo__despido = document.getElementById("marzo__despido").value;
	var abril__despido = document.getElementById("abril__despido").value;
	var mayo__despido = document.getElementById("mayo__despido").value;
	var junio__despido = document.getElementById("junio__despido").value;
	var julio__despido = document.getElementById("julio__despido").value;
	var agosto__despido = document.getElementById("agosto__despido").value;
	var septiembre__despido = document.getElementById("septiembre__despido").value;
	var octubre__despido = document.getElementById("octubre__despido").value;
	var noviembre__despido = document.getElementById("noviembre__despido").value;
	var diciembre__despido = document.getElementById("diciembre__despido").value;
	var total__origen = document.getElementById("total__origen").value;

	var total;
	total = parseFloat(enero__despido) +
		parseFloat(febrero__despido) +
		parseFloat(marzo__despido) +
		parseFloat(abril__despido) +
		parseFloat(mayo__despido) +
		parseFloat(junio__despido) +
		parseFloat(julio__despido) +
		parseFloat(agosto__despido) +
		parseFloat(septiembre__despido) +
		parseFloat(octubre__despido) +
		parseFloat(noviembre__despido) +
		parseFloat(diciembre__despido);

	$(total__despido).val(total);
	if (total > total__origen) {
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Valor ingresado debe ser menor.", "error", 5, function () { });

	} else {
		var tabla = $.ajax({
			type: "post",
			data: {
				idSueldos: idSueldos,
				tipo_desvinculacion: tipo_desvinculacion,
				enero__despido: enero__despido,
				febrero__despido: febrero__despido,
				marzo__despido: marzo__despido,
				abril__despido: abril__despido,
				mayo__despido: mayo__despido,
				junio__despido: junio__despido,
				julio__despido: julio__despido,
				agosto__despido: agosto__despido,
				septiembre__despido: septiembre__despido,
				octubre__despido: octubre__despido,
				noviembre__despido: noviembre__despido,
				diciembre__despido: diciembre__despido,
				total: total
			},

			url: "modelosBd/POA_MODIFICACIONES/desvinculacion_guardar.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se guardo correctamente", "success", 5, function () { });
	}


}





var valor_itemPresupuestario = function () {
	var itemPreesupuestario = document.getElementById("codigo__presupuestarios__destino__new2").value;
	var idActividad = document.getElementById("actividad__modificaciones__destino__modificaciones2").value;
	var meses2 = document.getElementById("meses2").value;


	var paqueteDeDatos = new FormData();
	var parametro3 = 'completa__informacion__itemPresupuestario';
	paqueteDeDatos.append("tipo", parametro3);
	paqueteDeDatos.append("itemPreesupuestario", itemPreesupuestario);
	paqueteDeDatos.append("idActividad", idActividad);
	paqueteDeDatos.append("meses2", meses2);

	$.ajax({

		type: "POST",
		url: "modelosBd/inserta/modificacionesSueldosSalarios01.md.php",
		contentType: false,
		data: paqueteDeDatos,
		processData: false,
		cache: false,
		success: function (response) {

			var elementos = JSON.parse(response);
			var indicadorInformacion = elementos['indicadorInformacion'];

			for (z of indicadorInformacion) {

				if (parametro3 == "completa__informacion__itemPresupuestario") {

					$("#montoAsignadoDestino1").val(z.valorMes);


				}

			}

		},
		error: function () {

		}

	});


}





var valor_itemPresupuestario_todos = function () {
	var itemPreesupuestario = document.getElementById("codigo__presupuestarios__destino__new2").value;
	var idActividad = document.getElementById("actividad__modificaciones__destino__modificaciones2").value;
	var meses2 = document.getElementById("meses2").value;


	var paqueteDeDatos = new FormData();
	var parametro3 = 'completa__informacion__itemPresupuestario';
	paqueteDeDatos.append("tipo", parametro3);
	paqueteDeDatos.append("itemPreesupuestario", itemPreesupuestario);
	paqueteDeDatos.append("idActividad", idActividad);
	paqueteDeDatos.append("meses2", meses2);

	$.ajax({

		type: "POST",
		url: "modelosBd/inserta/modificacionesSueldosSalarios01.md.php",
		contentType: false,
		data: paqueteDeDatos,
		processData: false,
		cache: false,
		success: function (response) {

			var elementos = JSON.parse(response);
			var indicadorInformacion = elementos['indicadorInformacion'];

			for (z of indicadorInformacion) {

				if (parametro3 == "completa__informacion__itemPresupuestario") {

					$("#montoAsignadoDestino1").val(z.valorMes);


				}

			}

		},
		error: function () {

		}

	});


}



function modificacion_destino_todos() {

	var origen1 = document.getElementById("actividad__modificaciones__destino__modificaciones2_o").value;
	var item1 = document.getElementById("codigo__presupuestarios__destino__new2_o").value;
	var mes1 = document.getElementById("meses2_o").value;
	var montoAsignadoOrigen = document.getElementById("monto__seleccionados__destino__new2_o").value;
	var disminucionOrigen = document.getElementById("monto__seleccionados__destino__new2_o1").value;
	var totalOrigen = parseFloat(montoAsignadoOrigen) - parseFloat(disminucionOrigen);


	var origen2 = document.getElementById("actividad__modificaciones__destino__modificaciones2").value;
	var item2 = document.getElementById("codigo__presupuestarios__destino__new2").value;
	var mes2 = document.getElementById("meses2").value;
	var montoAsignadoDestino = document.getElementById("montoAsignadoDestino1").value;
	var aumentoDestino = document.getElementById("monto__seleccionados__destino__new2").value;
	var totalDestino = parseFloat(montoAsignadoDestino) + parseFloat(aumentoDestino);

	var idSueldos = '';
	var justificacion = document.getElementById("origen_justificacion").value;


	{
		var tabla = $.ajax({
			type: "post",
			data: { idSueldos: idSueldos, origen1: origen1, montoAsignadoOrigen: montoAsignadoOrigen, disminucionOrigen: disminucionOrigen, totalOrigen: totalOrigen, item1: item1, mes1: mes1, origen2: origen2, item2: item2, mes2: mes2, aumentoDestino: aumentoDestino, montoAsignadoDestino: montoAsignadoDestino, totalDestino: totalDestino, justificacion: justificacion },
			url: "modelosBd/inserta/modificacionesGuardaDestino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Se guardo correctamente", "success", 5, function () { });


	}

}