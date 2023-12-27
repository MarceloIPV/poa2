function obtener_valor_mes(mes) {

	var idSueldos = document.getElementById("idSueldos").value;
	{
		var tabla = $.ajax({
			type: "post",
			data: { mes: mes, idSueldos: idSueldos },
			url: "controladores/modificaciones/modificacionesSueldosSalarios.php",
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
			url: "controladores/modificaciones/modificacionesMontos.php",
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
			url: "controladores/modificaciones/modificacionesSueldosSalariosDestino.php",
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
			url: "controladores/modificaciones/modificacionesOrigen.php",
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
			url: "controladores/modificaciones/destino.php",
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



}



function modificacion_sueldo_Salario_disminuyer_destino() {

	var actividad = document.getElementById("actividad__modificaciones__destino__new").value;
	var eventos = "ORGANIZACION  BASE DE ENTRENAMIENTO";
	var item = document.getElementById("item__modificaciones__destino__new").value;
	var meses = document.getElementById("meses").value;
	var monto = document.getElementById("monto__seleccionados__destino__new").value;

	var nombre = 'MOLINA GUTIERREZ ALEXANDRA DEL ROCIO';


	{
		var tabla = $.ajax({
			type: "post",
			data: { actividad: actividad, eventos: eventos, item: item, meses: meses, monto: monto, nombre: nombre },
			url: "controladores/modificaciones/guardar_disminucion_destino.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
		destino();
	}
}


function modificaciones_valores_disminuye(mes, idSueldos) {


	var aporte = document.getElementById("aporte__origen__disminucion").value;
	var sueldo = document.getElementById("sueldo__salario__disminucion").value;
	var fondosReserva = document.getElementById("fondos__de__reserva__disminucion").value;
	var decimoCuarta = document.getElementById("decimo__cuarto__disminucion").value;
	var decimoTercera = document.getElementById("decimo__tercero__disminucion").value;
	var justificacion = document.getElementById("origen_justificacion").value;
	var total = parseFloat(sueldo) + parseFloat(aporte) + parseFloat(fondosReserva) + parseFloat(decimoCuarta) + parseFloat(decimoTercera);
	{
		var tabla = $.ajax({
			type: "post",
			data: { mes: mes, sueldo: sueldo, idSueldos: idSueldos, fondosReserva: fondosReserva, aporte: aporte, decimoCuarta: decimoCuarta, decimoTercera: decimoTercera, justificacion: justificacion, total: total },
			url: "controladores/modificaciones/modificacionesGuardaDiminuye.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
		origen();
	}

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
			url: "controladores/modificaciones/combo_eventos.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("eventos").innerHTML = tabla;
		document.getElementById("data").innerHTML = "";

		document.getElementById("personal").innerHTML = "";
	}
}


function obtener_items() {

	var item = document.getElementById("item__modificaciones__destino__new").value;
	if (item == '15407') {

		{
			var tabla = $.ajax({
				type: "post",
				data: {},
				url: "controladores/modificaciones/combo_vacantes.php",
				dataType: 'text',
				async: false
			}).responseText;

			document.getElementById("personal").innerHTML = tabla;
		}
	}
	if (item == '16525') {

		{
			var tabla = $.ajax({
				type: "post",
				data: {},
				url: "controladores/modificaciones/combo_vacantes.php",
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
			url: "controladores/modificaciones/nuevo_personal.php",
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
			url: "controladores/modificaciones/modificacionesGuardaDiminuyeMontos.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("mensaje").innerHTML = tabla;
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
			url: "controladores/modificaciones/modificacionesMontosCambios.php",
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
			url: "controladores/modificaciones/modificacionesMontosCambiosVer.php",
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
			url: "controladores/modificaciones/modificacionesGuardaDiminuyeMontosEliminarOrigen.php",
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
			url: "controladores/modificaciones/modificacionesGuardaDiminuyeMontosReemplazo.php",
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
			url: "controladores/modificaciones/modificacionesGuardaReemplazo.php",
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
			url: "controladores/modificaciones/modificacionesGuardaReemplazo.php",
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
			url: "controladores/modificaciones/guardar_disminucion_monto.php",
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
			url: "controladores/modificaciones/destino.php",
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
			url: "controladores/modificaciones/nuevo_item.php",
			dataType: 'text',
			async: false
		}).responseText;

		document.getElementById("data").innerHTML = tabla;
	}
}


function nuevo_personal_dos() {
	alert("aqui2");
}



