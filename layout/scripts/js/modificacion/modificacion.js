$(document).ready(function () {


	$("#desvinculacion__modificaciones").change(function(e){

		if ($(this).val()=="0") {
			$(".oculto__tabla__destino__origen__desvinculacion").hide();
		}else{
			$(".oculto__tabla__destino__origen__desvinculacion").show();
		}

	});



var funcion__sumador__desvinculacion__origen=function(parametro1,parametro2,parametro3){
					
	$(parametro1).on('click', function () {

		let sumadorDesaucio=0;
		let sumadorDespido=0;
		let sumadorRenuncia=0;
		let sumadorVacaciones=0;

		$(".origen__desahucio__ingresar__clase").each(function(index) {
			sumadorDesaucio=parseFloat(sumadorDesaucio)+parseFloat($(this).val());
		});


		$(".origen__despido__intenpestivo__ingresar__clase").each(function(index) {
			sumadorDespido=parseFloat(sumadorDespido)+parseFloat($(this).val());
		});



		$(".origen__renunia__voluntaria__ingresar__clase").each(function(index) {
			sumadorRenuncia=parseFloat(sumadorRenuncia)+parseFloat($(this).val());
		});


		$(".origen__vacaciones__no__gozadas__ingresar__clase").each(function(index) {
			sumadorVacaciones=parseFloat(sumadorVacaciones)+parseFloat($(this).val());
		});

		$("#total__origen__compensacion").val(parseFloat(sumadorDesaucio).toFixed(2));
		$("#total__origen__despido__intempestivo").val(parseFloat(sumadorDespido).toFixed(2));
		$("#total__origen__renuncia__voluntaria").val(parseFloat(sumadorRenuncia).toFixed(2));
		$("#total__origen__vacaciones__no__gozadas").val(parseFloat(sumadorVacaciones).toFixed(2));

		let sumadorDeTotales=sumadorDesaucio+sumadorDespido+sumadorRenuncia+sumadorVacaciones;

		$("#totalOrigen").val(parseFloat(sumadorDeTotales).toFixed(2));

		$(".oculto__tabla__destino__salarios__origen__desvinculaciones").show();

	});

}

funcion__sumador__desvinculacion__origen($("#calcularTotalesOrigen__desvinculacion"));

var funcion__actualizador__desvinculaciones=function(parametro1,parametro2,parametro3){
					
	$(parametro1).on('input', function () {

		let restadores=0;

		restadores=parseFloat($(parametro2).val()) - parseFloat($(this).val());

		if (restadores<0) {

			$(parametro3).val(0);

			alertify.set("notifier","position", "top-center");
			alertify.notify("El valor ingresado supera al valor restante", "error", 10, function(){}); 

			$(this).val(0);

			$(parametro3).val(parseFloat($(parametro2).val()).toFixed(2));

		}else{

			$(parametro3).val(parseFloat(restadores).toFixed(2));

		}

	});

}

/*=================================
=            Deshaucio            =
=================================*/

funcion__actualizador__desvinculaciones($("#enero__origen__desahucio__ingresar"),$("#enero__origen__desahucio"),$("#enero__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#febrero__origen__desahucio__ingresar"),$("#febrero__origen__desahucio"),$("#febrero__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#marzo__origen__desahucio__ingresar"),$("#marzo__origen__desahucio"),$("#marzo__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#abril__origen__desahucio__ingresar"),$("#abril__origen__desahucio"),$("#abril__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#mayo__origen__desahucio__ingresar"),$("#mayo__origen__desahucio"),$("#mayo__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#junio__origen__desahucio__ingresar"),$("#junio__origen__desahucio"),$("#junio__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#julio__origen__desahucio__ingresar"),$("#julio__origen__desahucio"),$("#julio__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#agosto__origen__desahucio__ingresar"),$("#agosto__origen__desahucio"),$("#agosto__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#septiembre__origen__desahucio__ingresar"),$("#septiembre__origen__desahucio"),$("#septiembre__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#octubre__origen__desahucio__ingresar"),$("#octubre__origen__desahucio"),$("#octubre__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#noviembre__origen__desahucio__ingresar"),$("#noviembre__origen__desahucio"),$("#noviembre__origen__desahucio__restante"));
funcion__actualizador__desvinculaciones($("#diciembre__origen__desahucio__ingresar"),$("#diciembre__origen__desahucio"),$("#diciembre__origen__desahucio__restante"));


/*=====  End of Deshaucio  ======*/

/*===============================
=            Despido            =
===============================*/

funcion__actualizador__desvinculaciones($("#enero__origen__despido__intenpestivo__ingresar"),$("#enero__origen__despido__intenpestivo"),$("#enero__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#febrero__origen__despido__intenpestivo__ingresar"),$("#febrero__origen__despido__intenpestivo"),$("#febrero__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#marzo__origen__despido__intenpestivo__ingresar"),$("#marzo__origen__despido__intenpestivo"),$("#marzo__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#abril__origen__despido__intenpestivo__ingresar"),$("#abril__origen__despido__intenpestivo"),$("#abril__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#mayo__origen__despido__intenpestivo__ingresar"),$("#mayo__origen__despido__intenpestivo"),$("#mayo__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#junio__origen__despido__intenpestivo__ingresar"),$("#junio__origen__despido__intenpestivo"),$("#junio__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#julio__origen__despido__intenpestivo__ingresar"),$("#julio__origen__despido__intenpestivo"),$("#julio__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#agosto__origen__despido__intenpestivo__ingresar"),$("#agosto__origen__despido__intenpestivo"),$("#agosto__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#septiembre__origen__despido__intenpestivo__ingresar"),$("#septiembre__origen__despido__intenpestivo"),$("#septiembre__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#octubre__origen__despido__intenpestivo__ingresar"),$("#octubre__origen__despido__intenpestivo"),$("#octubre__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#noviembre__origen__despido__intenpestivo__ingresar"),$("#noviembre__origen__despido__intenpestivo"),$("#noviembre__origen__despido__intenpestivo__restante"));
funcion__actualizador__desvinculaciones($("#diciembre__origen__despido__intenpestivo__ingresar"),$("#diciembre__origen__despido__intenpestivo"),$("#diciembre__origen__despido__intenpestivo__restante"));


/*=====  End of Despido  ======*/


/*===========================================
=            Renuncia voluntaria            =
===========================================*/

funcion__actualizador__desvinculaciones($("#enero__origen__renunia__voluntaria__ingresar"),$("#enero__origen__renunia__voluntaria"),$("#enero__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#febrero__origen__renunia__voluntaria__ingresar"),$("#febrero__origen__renunia__voluntaria"),$("#febrero__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#marzo__origen__renunia__voluntaria__ingresar"),$("#marzo__origen__renunia__voluntaria"),$("#marzo__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#abril__origen__renunia__voluntaria__ingresar"),$("#abril__origen__renunia__voluntaria"),$("#abril__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#mayo__origen__renunia__voluntaria__ingresar"),$("#mayo__origen__renunia__voluntaria"),$("#mayo__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#junio__origen__renunia__voluntaria__ingresar"),$("#junio__origen__renunia__voluntaria"),$("#junio__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#julio__origen__renunia__voluntaria__ingresar"),$("#julio__origen__renunia__voluntaria"),$("#julio__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#agosto__origen__renunia__voluntaria__ingresar"),$("#agosto__origen__renunia__voluntaria"),$("#agosto__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#septiembre__origen__renunia__voluntaria__ingresar"),$("#septiembre__origen__renunia__voluntaria"),$("#septiembre__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#octubre__origen__renunia__voluntaria__ingresar"),$("#octubre__origen__renunia__voluntaria"),$("#octubre__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#noviembre__origen__renunia__voluntaria__ingresar"),$("#noviembre__origen__renunia__voluntaria"),$("#noviembre__origen__renunia__voluntaria__restante"));
funcion__actualizador__desvinculaciones($("#diciembre__origen__renunia__voluntaria__ingresar"),$("#diciembre__origen__renunia__voluntaria"),$("#diciembre__origen__renunia__voluntaria__restante"));

/*=====  End of Renuncia voluntaria  ======*/

/*=============================================
=            Vacaciones no gozadas            =
=============================================*/

funcion__actualizador__desvinculaciones($("#enero__origen__vacaciones__no__gozadas__ingresar"),$("#enero__origen__vacaciones__no__gozadas"),$("#enero__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#febrero__origen__vacaciones__no__gozadas__ingresar"),$("#febrero__origen__vacaciones__no__gozadas"),$("#febrero__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#marzo__origen__vacaciones__no__gozadas__ingresar"),$("#marzo__origen__vacaciones__no__gozadas"),$("#marzo__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#abril__origen__vacaciones__no__gozadas__ingresar"),$("#abril__origen__vacaciones__no__gozadas"),$("#abril__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#mayo__origen__vacaciones__no__gozadas__ingresar"),$("#mayo__origen__vacaciones__no__gozadas"),$("#mayo__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#junio__origen__vacaciones__no__gozadas__ingresar"),$("#junio__origen__vacaciones__no__gozadas"),$("#junio__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#julio__origen__vacaciones__no__gozadas__ingresar"),$("#julio__origen__vacaciones__no__gozadas"),$("#julio__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#agosto__origen__vacaciones__no__gozadas__ingresar"),$("#agosto__origen__vacaciones__no__gozadas"),$("#agosto__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#septiembre__origen__vacaciones__no__gozadas__ingresar"),$("#septiembre__origen__vacaciones__no__gozadas"),$("#septiembre__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#octubre__origen__vacaciones__no__gozadas__ingresar"),$("#octubre__origen__vacaciones__no__gozadas"),$("#octubre__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#noviembre__origen__vacaciones__no__gozadas__ingresar"),$("#noviembre__origen__vacaciones__no__gozadas"),$("#noviembre__origen__vacaciones__no__gozadas__restante"));
funcion__actualizador__desvinculaciones($("#diciembre__origen__vacaciones__no__gozadas__ingresar"),$("#diciembre__origen__vacaciones__no__gozadas"),$("#diciembre__origen__vacaciones__no__gozadas__restante"));

/*=====  End of Vacaciones no gozadas  ======*/


/*===========================================================
=            Modificaciones sumatores originales            =
===========================================================*/

var calculas__modificaciones__d=function(boton){

	$(boton).on('click', function (e){

		let sumadores=0;

		sumadores=parseFloat($("#total__origen__patronal__totales__ingresados").val()) + parseFloat($("#total__origen__decimo__tercero__totales__ingresados").val()) + parseFloat($("#total__origen__decimo__cuarto__totales__ingresados").val()) + parseFloat($("#total__origen__fondos__de__reserva__totales__ingresados").val()) + parseFloat($("#total__origen__salarios__totales__ingresados").val());

		$("#totalOrigen").val(parseFloat(sumadores).toFixed(2));

		$(".oculto__tabla__destino__salarios").show();


	});

}
calculas__modificaciones__d($("#calcularTotales"));

var sumarSueldosModificaciones=function(ingresar,origen__dato,restante__dato,clase__origen,total__fila,total__fila__u,total__fila__u__restantante,clase__origen__total,total__asignados,total__rescatado,clase__origen__dos){

	$(ingresar).on('blur', function (e){

		let restadorIndividuales=0;
		let sumadorClases=0;
		let restaFilas__u=0;
		let sumadorClases2=0;
		let sumatoresTotalesIngresos=0;

		sumadorIndividuales=parseFloat($(origen__dato).val()) - parseFloat($(this).val());


		if (parseFloat($(this).val())>$(restante__dato).val()) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("El valor "+$(ingresar).val()+" supera al valor restante que es "+$(restante__dato).val(), "error", 10, function(){}); 

			$(this).val(0);

			$(restante__dato).val($(origen__dato).val());


			$(clase__origen).each(function(index) {
				sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
			});

			$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

			
			$(total__fila__u__restantante).val(parseFloat(total__fila__u).toFied(2));

			$(clase__origen__total).each(function(index) {
				sumadorClases2=parseFloat(sumadorClases2)+parseFloat($(this).val());
			});

			$(total__asignados).val(parseFloat(sumadorClases2).toFixed(2));



			$(total__rescatado).val(0);

		}else{

			$(restante__dato).val(sumadorIndividuales);

			
			$(clase__origen).each(function(index) {
				sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
			});

			$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

			

			restaFilas__u=parseFloat($(total__fila__u).val()) - parseFloat($(this).val());

			$(total__fila__u__restantante).val(parseFloat(restaFilas__u).toFixed(2));

			$(clase__origen__total).each(function(index) {
				sumadorClases2=parseFloat(sumadorClases2)+parseFloat($(this).val());
			});

			$(total__asignados).val(parseFloat(sumadorClases2).toFixed(2));


			$(clase__origen__dos).each(function(index) {
				sumatoresTotalesIngresos=parseFloat(sumatoresTotalesIngresos)+parseFloat($(this).val());
			});

			$(total__rescatado).val(parseFloat(sumatoresTotalesIngresos).toFixed(2));

		}

	});

}

/*=======================================
=            Aporte patronal            =
=======================================*/

sumarSueldosModificaciones($("#enero__origen__aporte__patronal__ingresar"),$("#enero__origen__aporte__patronal"),$("#enero__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#enero__origen"),$("#enero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#febrero__origen__aporte__patronal__ingresar"),$("#febrero__origen__aporte__patronal"),$("#febrero__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#febrero__origen"),$("#febrero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#marzo__origen__aporte__patronal__ingresar"),$("#marzo__origen__aporte__patronal"),$("#marzo__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#marzo__origen"),$("#marzo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#abril__origen__aporte__patronal__ingresar"),$("#abril__origen__aporte__patronal"),$("#abril__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#abril__origen"),$("#abril__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#mayo__origen__aporte__patronal__ingresar"),$("#mayo__origen__aporte__patronal"),$("#mayo__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#mayo__origen"),$("#mayo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#junio__origen__aporte__patronal__ingresar"),$("#junio__origen__aporte__patronal"),$("#junio__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#junio__origen"),$("#junio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#julio__origen__aporte__patronal__ingresar"),$("#julio__origen__aporte__patronal"),$("#julio__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#julio__origen"),$("#julio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#agosto__origen__aporte__patronal__ingresar"),$("#agosto__origen__aporte__patronal"),$("#agosto__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#agosto__origen"),$("#agosto__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#septiembre__origen__aporte__patronal__ingresar"),$("#septiembre__origen__aporte__patronal"),$("#septiembre__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#septiembre__origen"),$("#septiembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#octubre__origen__aporte__patronal__ingresar"),$("#octubre__origen__aporte__patronal"),$("#octubre__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#octubre__origen"),$("#octubre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#noviembre__origen__aporte__patronal__ingresar"),$("#noviembre__origen__aporte__patronal"),$("#noviembre__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#noviembre__origen"),$("#noviembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));
sumarSueldosModificaciones($("#diciembre__origen__aporte__patronal__ingresar"),$("#diciembre__origen__aporte__patronal"),$("#diciembre__origen__aporte__patronal__restante"),$(".origen__aporte__patronal__restante__clase"),$("#total__origen__patronal__totales__ingresados"),$("#diciembre__origen"),$("#diciembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__patronal__totales__ingresados"),$(".origen__aporte__patronal__ingresar__clase"));

/*=====  End of Aporte patronal  ======*/

/*============================================
=            Décimo tercer sueldo            =
============================================*/

sumarSueldosModificaciones($("#enero__origen__decimo__tercero__ingresar"),$("#enero__origen__decimo__tercero"),$("#enero__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#enero__origen"),$("#enero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#febrero__origen__decimo__tercero__ingresar"),$("#febrero__origen__decimo__tercero"),$("#febrero__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#febrero__origen"),$("#febrero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#marzo__origen__decimo__tercero__ingresar"),$("#marzo__origen__decimo__tercero"),$("#marzo__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#marzo__origen"),$("#marzo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#abril__origen__decimo__tercero__ingresar"),$("#abril__origen__decimo__tercero"),$("#abril__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#abril__origen"),$("#abril__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#mayo__origen__decimo__tercero__ingresar"),$("#mayo__origen__decimo__tercero"),$("#mayo__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#mayo__origen"),$("#mayo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#junio__origen__decimo__tercero__ingresar"),$("#junio__origen__decimo__tercero"),$("#junio__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#junio__origen"),$("#junio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#julio__origen__decimo__tercero__ingresar"),$("#julio__origen__decimo__tercero"),$("#julio__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#julio__origen"),$("#julio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#agosto__origen__decimo__tercero__ingresar"),$("#agosto__origen__decimo__tercero"),$("#agosto__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#agosto__origen"),$("#agosto__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#septiembre__origen__decimo__tercero__ingresar"),$("#septiembre__origen__decimo__tercero"),$("#septiembre__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#septiembre__origen"),$("#septiembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#octubre__origen__decimo__tercero__ingresar"),$("#octubre__origen__decimo__tercero"),$("#octubre__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#octubre__origen"),$("#octubre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#noviembre__origen__decimo__tercero__ingresar"),$("#noviembre__origen__decimo__tercero"),$("#noviembre__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#noviembre__origen"),$("#noviembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));
sumarSueldosModificaciones($("#diciembre__origen__decimo__tercero__ingresar"),$("#diciembre__origen__decimo__tercero"),$("#diciembre__origen__decimo__tercero__restante"),$(".origen__decimo__tercero__restante__clase"),$("#total__origen__decimo__tercero__totales__ingresados"),$("#diciembre__origen"),$("#diciembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__tercero__totales__ingresados"),$(".origen__decimo__tercero__ingresar__clase"));

/*=====  End of Décimo tercer sueldo  ======*/

/*=====================================
=            Décimo cuarto            =
=====================================*/

sumarSueldosModificaciones($("#enero__origen__decimo__cuarto__ingresar"),$("#enero__origen__decimo__cuarto"),$("#enero__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#enero__origen"),$("#enero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#febrero__origen__decimo__cuarto__ingresar"),$("#febrero__origen__decimo__cuarto"),$("#febrero__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#febrero__origen"),$("#febrero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#marzo__origen__decimo__cuarto__ingresar"),$("#marzo__origen__decimo__cuarto"),$("#marzo__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#marzo__origen"),$("#marzo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#abril__origen__decimo__cuarto__ingresar"),$("#abril__origen__decimo__cuarto"),$("#abril__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#abril__origen"),$("#abril__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#mayo__origen__decimo__cuarto__ingresar"),$("#mayo__origen__decimo__cuarto"),$("#mayo__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#mayo__origen"),$("#mayo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#junio__origen__decimo__cuarto__ingresar"),$("#junio__origen__decimo__cuarto"),$("#junio__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#junio__origen"),$("#junio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#julio__origen__decimo__cuarto__ingresar"),$("#julio__origen__decimo__cuarto"),$("#julio__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#julio__origen"),$("#julio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#agosto__origen__decimo__cuarto__ingresar"),$("#agosto__origen__decimo__cuarto"),$("#agosto__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#agosto__origen"),$("#agosto__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#septiembre__origen__decimo__cuarto__ingresar"),$("#septiembre__origen__decimo__cuarto"),$("#septiembre__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#septiembre__origen"),$("#septiembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#octubre__origen__decimo__cuarto__ingresar"),$("#octubre__origen__decimo__cuarto"),$("#octubre__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#octubre__origen"),$("#octubre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#noviembre__origen__decimo__cuarto__ingresar"),$("#noviembre__origen__decimo__cuarto"),$("#noviembre__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#noviembre__origen"),$("#noviembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));
sumarSueldosModificaciones($("#diciembre__origen__decimo__cuarto__ingresar"),$("#diciembre__origen__decimo__cuarto"),$("#diciembre__origen__decimo__cuarto__restante"),$(".origen__decimo__cuarto__restante__clase"),$("#total__origen__decimo__cuarto__totales__ingresados"),$("#diciembre__origen"),$("#diciembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__decimo__cuarto__totales__ingresados"),$(".origen__decimo__cuarto__ingresar__clase"));


/*=====  End of Décimo cuarto  ======*/


/*=========================================
=            Fondos de reserva            =
=========================================*/

sumarSueldosModificaciones($("#enero__origen__fondos__de__reserva__ingresar"),$("#enero__origen__fondos__de__reserva"),$("#enero__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#enero__origen"),$("#enero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#febrero__origen__fondos__de__reserva__ingresar"),$("#febrero__origen__fondos__de__reserva"),$("#febrero__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#febrero__origen"),$("#febrero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#marzo__origen__fondos__de__reserva__ingresar"),$("#marzo__origen__fondos__de__reserva"),$("#marzo__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#marzo__origen"),$("#marzo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#abril__origen__fondos__de__reserva__ingresar"),$("#abril__origen__fondos__de__reserva"),$("#abril__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#abril__origen"),$("#abril__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#mayo__origen__fondos__de__reserva__ingresar"),$("#mayo__origen__fondos__de__reserva"),$("#mayo__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#mayo__origen"),$("#mayo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#junio__origen__fondos__de__reserva__ingresar"),$("#junio__origen__fondos__de__reserva"),$("#junio__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#junio__origen"),$("#junio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#julio__origen__fondos__de__reserva__ingresar"),$("#julio__origen__fondos__de__reserva"),$("#julio__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#julio__origen"),$("#julio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#agosto__origen__fondos__de__reserva__ingresar"),$("#agosto__origen__fondos__de__reserva"),$("#agosto__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#agosto__origen"),$("#agosto__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#septiembre__origen__fondos__de__reserva__ingresar"),$("#septiembre__origen__fondos__de__reserva"),$("#septiembre__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#septiembre__origen"),$("#septiembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#octubre__origen__fondos__de__reserva__ingresar"),$("#octubre__origen__fondos__de__reserva"),$("#octubre__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#octubre__origen"),$("#octubre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#noviembre__origen__fondos__de__reserva__ingresar"),$("#noviembre__origen__fondos__de__reserva"),$("#noviembre__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#noviembre__origen"),$("#noviembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));
sumarSueldosModificaciones($("#diciembre__origen__fondos__de__reserva__ingresar"),$("#diciembre__origen__fondos__de__reserva"),$("#diciembre__origen__fondos__de__reserva__restante"),$(".origen__fondos__de__reserva__restante__clase"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$("#diciembre__origen"),$("#diciembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__fondos__de__reserva__totales__ingresados"),$(".origen__fondos__de__reserva__ingresar__clase"));


/*=====  End of Fondos de reserva  ======*/

/*================================
=            Salarios            =
================================*/

sumarSueldosModificaciones($("#enero__origen__salarios__ingresar"),$("#enero__origen__salarios"),$("#enero__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#enero__origen"),$("#enero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#febrero__origen__salarios__ingresar"),$("#febrero__origen__salarios"),$("#febrero__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#febrero__origen"),$("#febrero__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#marzo__origen__salarios__ingresar"),$("#marzo__origen__salarios"),$("#marzo__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#marzo__origen"),$("#marzo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#abril__origen__salarios__ingresar"),$("#abril__origen__salarios"),$("#abril__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#abril__origen"),$("#abril__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#mayo__origen__salarios__ingresar"),$("#mayo__origen__salarios"),$("#mayo__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#mayo__origen"),$("#mayo__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#junio__origen__salarios__ingresar"),$("#junio__origen__salarios"),$("#junio__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#junio__origen"),$("#junio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#julio__origen__salarios__ingresar"),$("#julio__origen__salarios"),$("#julio__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#julio__origen"),$("#julio__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#agosto__origen__salarios__ingresar"),$("#agosto__origen__salarios"),$("#agosto__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#agosto__origen"),$("#agosto__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#septiembre__origen__salarios__ingresar"),$("#septiembre__origen__salarios"),$("#septiembre__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#septiembre__origen"),$("#septiembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#octubre__origen__salarios__ingresar"),$("#octubre__origen__salarios"),$("#octubre__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#octubre__origen"),$("#octubre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#noviembre__origen__salarios__ingresar"),$("#noviembre__origen__salarios"),$("#noviembre__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#noviembre__origen"),$("#noviembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));
sumarSueldosModificaciones($("#diciembre__origen__salarios__ingresar"),$("#diciembre__origen__salarios"),$("#diciembre__origen__salarios__restante"),$(".origen__salarios__restante__clase"),$("#total__origen__salarios__totales__ingresados"),$("#diciembre__origen"),$("#diciembre__origen__restante"),$(".origen__restante__clase"),$("#total__origen__n__a"),$("#total__origen__salarios__totales__ingresados"),$(".origen__salarios__ingresar__clase"));

/*=====  End of Salarios  ======*/


/*=====  End of Modificaciones sumatores originales  ======*/


	/*======================================
	=            Modificaciones            =
	======================================*/
	
	var realizar__sumas__modificaciones__ajax=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro1).on('change', function () {

			let item=$(this).val();

			var idSueldos=$(parametro4).val();
			
			if ($(parametro5).val()=="49") {
				var opcion="desahucio";
			}else if($(parametro5).val()=="156"){
				var opcion="despido";
			}else if($(parametro5).val()=="94"){
				var opcion="renuncia";
			}else if($(parametro5).val()=="50"){
				var opcion="compensaciÃ³n";
			}

			

			let paqueteDeDatos = new FormData();
			paqueteDeDatos.append("tipo","items__desvinculaciones__modificaciones");
			paqueteDeDatos.append("item",item);
			paqueteDeDatos.append("mes",parametro3);
			paqueteDeDatos.append("idSueldos",idSueldos);
			paqueteDeDatos.append("opcion",opcion);

			$.ajax({

				type:"POST",
				url:"modelosBd/POA_MODIFICACIONES/seleccionaModificaciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					let elementos=JSON.parse(response);
					let mesObtenido=elementos['mesObtenido'];

					if (mesObtenido!="" && mesObtenido!=" " && mesObtenido!=null && mesObtenido!=undefined) {
						$(parametro2).val(mesObtenido);
					}else{
						$(parametro2).val(0);
					}

					


				},
				error:function(){

				}

			});	


		});

	}
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#eneroDesvinculacion__sumando__monto__inicial"),"enero",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));	
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#febreroDesvinculacion__sumando__monto__inicial"),"febrero",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#marzoDesvinculacion__sumando__monto__inicial"),"marzo",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#abrilDesvinculacion__sumando__monto__inicial"),"abril",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#mayoDesvinculacion__sumando__monto__inicial"),"mayo",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#junioDesvinculacion__sumando__monto__inicial"),"junio",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#julioDesvinculacion__sumando__monto__inicial"),"julio",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#agostoDesvinculacion__sumando__monto__inicial"),"agosto",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#septiembreDesvinculacion__sumando__monto__inicial"),"septiembre",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#octubreDesvinculacion__sumando__monto__inicial"),"octubre",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#noviembreDesvinculacion__sumando__monto__inicial"),"noviembre",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#diciembreDesvinculacion__sumando__monto__inicial"),"diciembre",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));
	realizar__sumas__modificaciones__ajax($("#desvinculacion__modificaciones"),$("#totalDesvinculacion__sumar__monto__inicial"),"totalTotales",$("#persona_sueldos_data"),$("#desvinculacion__modificaciones"));

	/*=====  End of Modificaciones  ======*/
	

	/*=================================================
	=            Modificaciones necesarias            =
	=================================================*/
	
	var realizar__sumas__modificaciones=function(parametro1,parametro2,parametro3){

		$(parametro3).on('input', function () {
		
			let sumatores=0;

			sumatores=parseFloat($(parametro1).val()) + parseFloat($(this).val());
			$(parametro2).val(sumatores);

		});


	}
	realizar__sumas__modificaciones($("#eneroDesvinculacion__sumando__monto__inicial"),$("#eneroDesvinculacion__sumando__modificado"),$("#eneroDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#febreroDesvinculacion__sumando__monto__inicial"),$("#febreroDesvinculacion__sumando__modificado"),$("#febreroDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#marzoDesvinculacion__sumando__monto__inicial"),$("#marzoDesvinculacion__sumando__modificado"),$("#marzoDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#abrilDesvinculacion__sumando__monto__inicial"),$("#abrilDesvinculacion__sumando__modificado"),$("#abrilDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#mayoDesvinculacion__sumando__monto__inicial"),$("#mayoDesvinculacion__sumando__modificado"),$("#mayoDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#junioDesvinculacion__sumando__monto__inicial"),$("#junioDesvinculacion__sumando__modificado"),$("#junioDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#julioDesvinculacion__sumando__monto__inicial"),$("#julioDesvinculacion__sumando__modificado"),$("#julioDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#agostoDesvinculacion__sumando__monto__inicial"),$("#agostoDesvinculacion__sumando__modificado"),$("#agostoDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#septiembreDesvinculacion__sumando__monto__inicial"),$("#septiembreDesvinculacion__sumando__modificado"),$("#septiembreDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#octubreDesvinculacion__sumando__monto__inicial"),$("#octubreDesvinculacion__sumando__modificado"),$("#octubreDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#noviembreDesvinculacion__sumando__monto__inicial"),$("#noviembreDesvinculacion__sumando__modificado"),$("#noviembreDesvinculacion__sumando"));
	realizar__sumas__modificaciones($("#diciembreDesvinculacion__sumando__monto__inicial"),$("#diciembreDesvinculacion__sumando__modificado"),$("#diciembreDesvinculacion__sumando"));

	
	/*=====  End of Modificaciones necesarias  ======*/
	

	/*===================================
	=            Datatablets            =
	===================================*/
	
	$.getScript("layout/scripts/js/ajax/datatablet.js",function(){

		$("#idModificacionesFechas").click(function (e){
			datatablets($("#tabla__fechas__modificaciones"),"tabla__fechas__modificaciones",false,false,false,false,false,false,false);
		});

	});
	
	/*=====  End of Datatablets  ======*/
	


	$.getScript("layout/scripts/js/validacionesGenerales.js",function(){

		/*================================================
		=            Modificaciones iniciales            =
		================================================*/
		

		funcion__cambio__de__numero($("#disminucion__seleccionados"));
		funcion__cambio__de__numero($("#disminucion__seleccionados__destino"));

		funcion__solo__numero__montos($("#disminucion__seleccionados"));
		funcion__solo__numero__montos($("#disminucion__seleccionados__destino"));

		/*==============================
		=            Orígen            =
		==============================*/

		// let actividad__modificaciones=$("#actividad__modificaciones").val();
		let actividad__modificaciones=$("#actividad__modificaciones").val();
		
		actividades__selector($("#actividad__modificaciones"),$("#idOrganismoPrincipal").val());
		items__selector__dos($("#actividad__modificaciones"),$("#item__modificaciones"),$("#idOrganismoPrincipal").val(),false,actividad__modificaciones);
		items__selector__tres($("#item__modificaciones"),$("#mesesSeleccionables"),$("#codigo__presupuestarios"),$("#idOrganismoPrincipal").val());
		items__selector__cuatro($("#mesesSeleccionables"),$("#monto__seleccionados"),$("#item__modificaciones"),$("#idOrganismoPrincipal").val(),false);

		
		/*=====  End of Orígen  ======*/
		
		/*===============================
		=            Destino            =
		===============================*/

		actividades__selector($("#actividad__modificaciones__destino"), $("#idOrganismoPrincipal").val());
		actividades__selector($("#actividad__modificaciones__destino__new"), $("#idOrganismoPrincipal").val());


		actividades__selector($("#actividad__modificaciones__destino__new2"), $("#idOrganismoPrincipal").val());
		items__selector__dos($("#actividad__modificaciones__destino"), $("#item__modificaciones__destino"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__tres($("#item__modificaciones__destino"), $("#mesesSeleccionables__destino"), $("#codigo__presupuestarios__destino"), $("#idOrganismoPrincipal").val(), true);


		items__selector__dos($("#actividad__modificaciones__destino__new"), $("#item__modificaciones__destino__new"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__dos($("#actividad__modificaciones__destino__new2"), $("#item__modificaciones__destino__new2"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);

		items__selector__tres__destino__sueldos($("#item__modificaciones__destino__new"), $("#mesesSeleccionables__destino__new"), $("#codigo__presupuestarios__destino__new"), $("#idOrganismoPrincipal").val(), true);
		items__selector__tres__destino__sueldos($("#item__modificaciones__destino__new2"), $("#mesesSeleccionables__destino__new"), $("#codigo__presupuestarios__destino__new2"), $("#idOrganismoPrincipal").val(), true);

		items__selector__cuatro($("#mesesSeleccionables__destino"), $("#monto__seleccionados__destino"), $("#item__modificaciones__destino"), $("#idOrganismoPrincipal").val(), true);


		actividades__selector($("#actividad__modificaciones__destino__newinf"), $("#idOrganismoPrincipal").val());
		
		
		/*=====  End of Destino  ======*/		
		
		/*=====  End of Modificaciones iniciales  ======*/
		

		/*=========================================================
		=            Modificaciones sueldos y salarios            =
		=========================================================*/
		
		/*==============================
		=            Orígen            =
		==============================*/
		
		sueldos__salarios($("#empleado__origen"),$("#idOrganismoPrincipal").val());
		
		/*=====  End of Orígen  ======*/
		
		
		/*=====  End of Modificaciones sueldos y salarios  ======*/
		

		actividades__selector__todos($("#actividad__modificaciones__destino__modificaciones2"), $("#idOrganismoPrincipal").val());
		items__selector__dos__modificaciones($("#actividad__modificaciones__destino__modificaciones2"), $("#item__modificaciones__destino__modificaciones2"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__dos__eventosIntervenciones($("#actividad__modificaciones__destino__modificaciones2"), $("#eventos_intervencion"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__tres__destino__sueldos($("#actividad__modificaciones__destino__modificaciones2"), $("#mesesSeleccionables__destino__new"), $("#codigo__presupuestarios__destino__modificaciones"), $("#idOrganismoPrincipal").val(), true);
		item_eventos_intervencion($("#eventos_intervencion"), $("#item__modificaciones__destino__modificaciones2"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		item_presupuestario($("#item__modificaciones__destino__modificaciones2"), $("#codigo__presupuestarios__destino__new2"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);


		actividades__selector__infraestructura($("#actividad__modificaciones__destino__modificaciones2_o_i"), $("#idOrganismoPrincipal").val());
		items__selector__dos__modificaciones($("#actividad__modificaciones__destino__modificaciones2_o_i"), $("#item__modificaciones__destino__modificaciones2_o_i"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__dos__eventosIntervenciones($("#actividad__modificaciones__destino__modificaciones2_o_i"), $("#eventos_intervencion_o_i"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__tres__destino__sueldos($("#actividad__modificaciones__destino__modificaciones2_o_i"), $("#mesesSeleccionables__destino__new_o_i"), $("#codigo__presupuestarios__destino__modificaciones_o_i"), $("#idOrganismoPrincipal").val(), true);
		
		item_presupuestario_o_i($("#item__modificaciones__destino__modificaciones2_o_i"), $("#codigo__presupuestarios__destino__new2_o_i"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);

		actividades__selector__modificaciones($("#actividad__modificaciones__destino__modificaciones2_o"), $("#idOrganismoPrincipal").val());
		items__selector__dos__modificaciones($("#actividad__modificaciones__destino__modificaciones2_o"), $("#item__modificaciones__destino__modificaciones2_o"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__dos__eventosIntervenciones($("#actividad__modificaciones__destino__modificaciones2_o"), $("#eventos_intervencion_o"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		items__selector__tres__destino__sueldos($("#actividad__modificaciones__destino__modificaciones2_o"), $("#mesesSeleccionables__destino__new_o"), $("#codigo__presupuestarios__destino__modificaciones_o"), $("#idOrganismoPrincipal").val(), true);
		
		

		/*==========================================
		=            Ejecutador eventos            =
		==========================================*/

		// item_presupuestario_o($("#item__modificaciones__destino__modificaciones2_o"), $("#codigo__presupuestarios__destino__new2_o"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		
		if ($("#identificadorPagina").val()=="1") {

			eventosEnvio__informacion__items($("#eventos_intervencion_o"), actividad__modificaciones, $("#idOrganismoPrincipal").val(), $("#item__modificaciones__destino__modificaciones2_o"),$("#codigo__presupuestarios__destino__new2_o"));
			item_presupuestario_o__meses__autocompletados($("#item__modificaciones__destino__modificaciones2_o"), $("#meses2_o"), $("#idOrganismoPrincipal").val());

		}else{

			item_eventos_intervencion($("#eventos_intervencion_o"), $("#item__modificaciones__destino__modificaciones2_o"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
			item_eventos_intervencion($("#eventos_intervencion_o"), $("#item__modificaciones__destino__modificaciones2_o_i"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones);
		
		}
		
		/*=====  End of Ejecutador eventos  ======*/

		/*===================================
		=            Destino dos            =
		===================================*/

		if ($("#identificadorPaginaReal").val()=="honorarios") {

			actividades__selector__modificaciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#idOrganismoPrincipal").val(),"honorarios");

		}else if($("#identificadorPaginaReal").val()=="sueldos"){

			actividades__selector__modificaciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#idOrganismoPrincipal").val(),"sueldos");

		}else if($("#identificadorPaginaReal").val()=="origenDesvinculacion"){

			actividades__selector__modificaciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#idOrganismoPrincipal").val(),"origenDesvinculacion");

		}else{

			actividades__selector__modificaciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#idOrganismoPrincipal").val(),"N/A");

		}
		
		
		if ($("#identificadorPaginaReal").val()=="honorarios") {

			items__selector__dos__eventosIntervenciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#eventos_intervencion__seleccion"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones,"honorarios");

		}else if($("#identificadorPaginaReal").val()=="sueldos"){

			items__selector__dos__eventosIntervenciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#eventos_intervencion__seleccion"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones,"sueldos");

		}else{

			items__selector__dos__eventosIntervenciones__destino($("#actividad__modificaciones__destino__modificaciones2__seleccion"), $("#eventos_intervencion__seleccion"), $("#idOrganismoPrincipal").val(), true, actividad__modificaciones,"N/A");

		}

		if ($("#identificadorPaginaReal").val()=="honorarios") {

			eventosEnvio__informacion__items__destino($("#eventos_intervencion__seleccion"), actividad__modificaciones, $("#idOrganismoPrincipal").val(), $("#item__modificaciones__destino__modificaciones2__seleccion"),$("#codigo__presupuestarios__destino__new2__seleccion"),"honorarios");

		}else if($("#identificadorPaginaReal").val()=="sueldos"){

			eventosEnvio__informacion__items__destino($("#eventos_intervencion__seleccion"), actividad__modificaciones, $("#idOrganismoPrincipal").val(), $("#item__modificaciones__destino__modificaciones2__seleccion"),$("#codigo__presupuestarios__destino__new2__seleccion"),"sueldos");

		}else{

			eventosEnvio__informacion__items__destino($("#eventos_intervencion__seleccion"), actividad__modificaciones, $("#idOrganismoPrincipal").val(), $("#item__modificaciones__destino__modificaciones2__seleccion"),$("#codigo__presupuestarios__destino__new2__seleccion"),"varios");

		}

		

		if ($("#identificadorPaginaReal").val()=="honorarios") {

			item_presupuestario_o__meses__autocompletados__destino($("#item__modificaciones__destino__modificaciones2__seleccion"), $("#meses2__seleccion"), $("#idOrganismoPrincipal").val(),"honorarios");

		}else if($("#identificadorPaginaReal").val()=="sueldos"){

			item_presupuestario_o__meses__autocompletados__destino($("#item__modificaciones__destino__modificaciones2__seleccion"), $("#meses2__seleccion"), $("#idOrganismoPrincipal").val(),"sueldos");

		}else{

			item_presupuestario_o__meses__autocompletados__destino($("#item__modificaciones__destino__modificaciones2__seleccion"), $("#meses2__seleccion"), $("#idOrganismoPrincipal").val(),"otros");

		}
		
		


		meses__destinoPresupuestos($("#meses2__seleccion"), $("#idOrganismoPrincipal").val());
		
		/*=====  End of Destino dos  ======*/
		
		

		//desvinculación//
		actividades__selector__sueldosSalarios($("#personal1"), $("#idOrganismoPrincipal").val());
		sueldos__y__salarios__asignacion($("#personal1"), ["cedula__origen", "cargo__origen", "tipo__cargo__origen", "tiempo__trabajo__meses__origen", "sueldo__salario__origen", "aporte__origen", "decimo__tercero__origen", "mensualiza__tercero__origen", "decimo__cuarto__origen", "mensualiza__cuarto__origen", "fondos__de__reserva__origen"], "completa__informacion__salarios");

		

	});	


	$.getScript("layout/scripts/js/modificacion/modificacionGlobal.js",function(){

		/*=======================================
		=             Administración           =
		=======================================*/
		
		$("#tipo__bloqueo__modificaciones").change(function (e) {

			let tipo__bloqueo__modificaciones=$(this).val();

			if (tipo__bloqueo__modificaciones=="actividad") {
				$(".actividades__ocultas__modificaciones").show();
				$(".item__ocultas__modificaciones").hide();
				selector__actividades__items__modificas($("#tipo__bloqueo__modificaciones"),0,$("#item__origen__modificaciones"));
				selector__actividades__items__modificas($("#tipo__bloqueo__modificaciones"),0,$("#item__destino__modificaciones"));
				$(".destino__items__actividades").hide();
			}else if(tipo__bloqueo__modificaciones=="item"){
				$(".actividades__ocultas__modificaciones").show();
				$(".item__ocultas__modificaciones").show();
			}else if(tipo__bloqueo__modificaciones=="actividadItem"){
				$(".actividades__ocultas__modificaciones").show();
				$(".item__ocultas__modificaciones").show();
				$(".item__solitario__origen").hide();
				selector__actividades__items__modificas($("#tipo__bloqueo__modificaciones"),0,$("#item__origen__modificaciones"));
				$(".destino__items__actividades").hide();
			}else{
				$(".actividades__ocultas__modificaciones").hide();
				$(".item__ocultas__modificaciones").hide();
				$("#item__origen__modificaciones").html(" ");
				$("#item__destino__modificaciones").html(" ");
				selector__actividades__items__modificas($("#tipo__bloqueo__modificaciones"),0,$("#item__origen__modificaciones"));
				selector__actividades__items__modificas($("#tipo__bloqueo__modificaciones"),0,$("#item__destino__modificaciones"));
				$(".destino__items__actividades").hide();
			}

			selector__actividades____modificas($("#actividad__origen__modificaciones"));
			selector__actividades____modificas($("#actividad__destino__modificaciones"));

		});


		$("#actividad__origen__modificaciones").change(function (e) {

			selector__actividades__items__modificas($("#actividad__origen__modificaciones"),$(this).val(),$("#item__origen__modificaciones"));

			$(".origen__act__dep").text("ACTÍVIDAD ORÍGEN");

			let textoOrigenes=$('select[name="actividad__origen__modificaciones"] option:selected').text();

			$(".origen__act__dep__nombre__act").text(textoOrigenes);

			$("#tabla__origen__datatablets_wrapper").remove();
			$("#tabla__origen__datatablets").remove();

			$(".origen__items__actividades").append('<table id="tabla__origen__datatablets" style="width:100%;"><thead><tr><th>Actívidad<br>Orígen</th><th>Ítem<br>Orígen</th><th>Actívidad<br>Destino</th><th>Ítem<br>Destino</th><th style="width:10%;">Eliminar</th></tr></thead></table>');

			if ($(this).val()!="0" && $(this).val()!=0) {

				$(".origen__items__actividades").show();

				let paqueteDeDatos = new FormData();
				let idActividad=$(this).val();
				paqueteDeDatos.append("tipo","actividades__configuracion__administrador");
				paqueteDeDatos.append("idActividad",idActividad);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_MODIFICACIONES_REVISOR/insertar.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){

					$.getScript("layout/scripts/js/modificacion/tramitesModificacionesValidaciones.js",function(){

						let elementos=JSON.parse(response);
						let informacionObtenida=elementos['informacion'];


						var table = datatabletsConfiguration($("#tabla__origen__datatablets"));

						visualizar__actividades__admin__items(informacionObtenida,table);


					});	

					},
					error:function(){

					}

				});	

			}else{

				$(".origen__items__actividades").hide();

			}


		});
		
		$("#actividad__destino__modificaciones").change(function (e) {

			selector__actividades__items__modificas($("#actividad__destino__modificaciones"),$(this).val(),$("#item__destino__modificaciones"));

			$(".destino__act__dep").text("ACTÍVIDAD DESTINO");

			let textoOrigenes=$('select[name="actividad__destino__modificaciones"] option:selected').text();
			$(".destino__act__dep__nombre__act").text(textoOrigenes);


			$("#tabla__destino__datatablets_wrapper").remove();
			$("#tabla__destino__datatablets").remove();

			$(".destino__items__actividades").append('<table id="tabla__destino__datatablets" style="width:100%;"><thead><tr><th>Actívidad<br>Orígen</th><th>Ítem<br>Orígen</th><th>Actívidad<br>Destino</th><th>Ítem<br>Destino</th><th style="width:10%;">Eliminar</th></tr></thead></table>');

			if ($("#tipo__bloqueo__modificaciones").val()=="actividad"){
				$("#guardar__modifiAdministrador").show();
			}else{
				$(".destino__items__actividades").hide();
			}

			
			if ($(this).val()!="0" && $(this).val()!=0) {

				$(".destino__items__actividades").show();

				let paqueteDeDatos = new FormData();
				let idActividad=$(this).val();
				let actividad__origen__modificaciones=$("#actividad__origen__modificaciones").val();

				paqueteDeDatos.append("tipo","actividades__configuracion__administrador");
				paqueteDeDatos.append("idActividad",idActividad);
				paqueteDeDatos.append("actividad__origen__modificaciones",actividad__origen__modificaciones);

				$.ajax({

					type:"POST",
					url:"modelosBd/POA_MODIFICACIONES_REVISOR/insertar.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){

					$.getScript("layout/scripts/js/modificacion/tramitesModificacionesValidaciones.js",function(){

						let elementos=JSON.parse(response);
						let informacionObtenida=elementos['informacion'];


						var table = datatabletsConfiguration($("#tabla__destino__datatablets"));

						visualizar__actividades__admin__items__2(informacionObtenida,table);


					});	

					},
					error:function(){

					}

				});	

			}else{

				$(".destino__items__actividades").hide();

			}


		});

		$("#item__destino__modificaciones").change(function (e) {

			$(".destino__items__actividades").show();

		});

		/*=====  End of  Administración  ======*/
		

		/*======================================
		=            Sumar orígenes            =
		======================================*/
		
		sumar__origenes($("#disminucion__seleccionados"),$("#monto__seleccionados"),$("#total__disminucion__origen"));



		sumar__origenes($("#sueldo__salario__mensual__origen__disminucion"),$("#sueldo__salario__origen"),$("#sueldo__salario__total__mensual__origen__disminucion"));



		sumar__origenes($("#aporte__origen__disminucion"),$("#aporte__origen"),$("#aporte__total__origen__disminucion"));

		sumar__origenes($("#decimo__tercero__origen__disminucion"),$("#decimo__tercero__origen"),$("#decimo__tercero__total__origen__disminucion"));

		sumar__origenes($("#decimo__cuarto__origen__disminucion"),$("#decimo__cuarto__origen"),$("#decimo__cuarto__total__origen__disminucion"));

		sumar__origenes($("#fondos__de__reserva__origen__disminucion"),$("#fondos__de__reserva__origen"),$("#fondos__de__reserva__total__origen__disminucion"));


		sumar__origenes($("#enero__origen__disminucion"),$("#enero__origen"),$("#enero__total__mensual__origen__disminucion"));

		sumar__origenes($("#febrero__origen__disminucion"),$("#febrero__origen"),$("#febrero__total__mensual__origen__disminucion"));

		sumar__origenes($("#marzo__origen__disminucion"),$("#marzo__origen"),$("#marzo__total__mensual__origen__disminucion"));

		sumar__origenes($("#abril__origen__disminucion"),$("#abril__origen"),$("#abril__total__mensual__origen__disminucion"));

		sumar__origenes($("#mayo__origen__disminucion"),$("#mayo__origen"),$("#mayo__total__mensual__origen__disminucion"));

		sumar__origenes($("#junio__origen__disminucion"),$("#junio__origen"),$("#junio__total__mensual__origen__disminucion"));

		sumar__origenes($("#julio__origen__disminucion"),$("#julio__origen"),$("#julio__total__mensual__origen__disminucion"));

		sumar__origenes($("#agosto__origen__disminucion"),$("#agosto__origen"),$("#agosto__total__mensual__origen__disminucion"));

		sumar__origenes($("#septiembre__origen__disminucion"),$("#septiembre__origen"),$("#septiembre__total__mensual__origen__disminucion"));

		sumar__origenes($("#octubre__origen__disminucion"),$("#octubre__origen"),$("#octubre__total__mensual__origen__disminucion"));

		sumar__origenes($("#noviembre__origen__disminucion"),$("#noviembre__origen"),$("#noviembre__total__mensual__origen__disminucion"));

		sumar__origenes($("#diciembre__origen__disminucion"),$("#diciembre__origen"),$("#diciembre__total__mensual__origen__disminucion"));
		
		/*=====  End of Sumar orígenes  ======*/
		
		/*===============================================
		=            Guardar primeros montos            =
		===============================================*/

		$("#guardarModificacion__act").click(function (e){
		
			guardar__modif__2($("#guardarModificacion__act"),[$("#idOrganismoPrincipal").val(),$("#actividad__modificaciones").val(),$("#item__modificaciones").val(),$("#mesesSeleccionables").val(),$("#monto__seleccionados").val(),$("#disminucion__seleccionados").val(),$("#total__disminucion__origen").val()],$(".obligatorios"),"guardar__modificas__principal__act",$("#mesesSeleccionables__destino").val(),$("#monto__seleccionados__destino").val(),$("#disminucion__seleccionados__destino").val(),$("#total__disminucion__destino").val(),$("#actividad__modificaciones__destino").val(),$("#item__modificaciones__destino").val(),$("#documentoJustificacion"),$("#justificacion__modificaciones").val(),$(".nombre__justificacion").text());

		});

		$("#guardarModificacion__act_sueldo").click(function (e) {

			guardar__modif__2($("#guardarModificacion__act"), [$("#idOrganismoPrincipal").val(), $("#actividad__modificaciones__destino__new").val(), $("#item_origen").val(), $("#mes_origen").val(), $("#monto_origen").val(), $("#monto_origen").val(), $("#monto_origen").val()], $(".obligatorios"), "guardar__modificas__principal__act", $("#meses2").val(), $("#monto__seleccionados__destino__new2").val(), $("#monto__seleccionados__destino__new2").val(), $("#monto__seleccionados__destino__new2").val(), $("#actividad__modificaciones__destino__modificaciones2").val(), $("#codigo__presupuestarios__destino__new2").val(), $("#documentoJustificacion"), $("#origen_justificacion").val(), $(".nombre__justificacion").text());

		});
		
		/*=====  End of Guardar primeros montos  ======*/
		
		/*===================================================================
		=            Localizar información de sueldos y salarios            =
		===================================================================*/
		
		elementos__completas($("#empleado__origen"),["cedula__origen","cargo__origen","tipo__cargo__origen","tiempo__trabajo__meses__origen","sueldo__salario__origen","aporte__origen","decimo__tercero__origen","mensualiza__tercero__origen","decimo__cuarto__origen","mensualiza__cuarto__origen","fondos__de__reserva__origen"],"completa__informacion__salarios");
		

		guardar__informacion__fechas__modificaciones($("#guardar__fechas__modificaciones"),$("#fecha__inicial__modificacion"),$("#fecha__final__modificacion"),$("#idUsuarioPrincipal").val(),$(".obligatorios__fechas__m"),"informacion__fechas__modificaciones");

		/*=====  End of Localizar información de sueldos y salarios  ======*/

		sueldos__y__salarios__asignacion($("#empleado__origen"), ["cedula__origen", "cargo__origen", "tipo__cargo__origen", "tiempo__trabajo__meses__origen", "sueldo__salario__origen", "aporte__origen", "decimo__tercero__origen", "mensualiza__tercero__origen", "decimo__cuarto__origen", "mensualiza__cuarto__origen", "fondos__de__reserva__origen"], "completa__informacion__salarios");

		sueldos__y__salarios__asignacion($("#empleado__origen__new"), ["cedula__destino", "cargo__origen__new", "tipo__cargo__origen__new", "tiempo__trabajo__meses__origen__new"], "completa__informacion__salarios");
		sueldos__y__salarios__asignacion($("#empleado__origen__sueldos"), ["cedula__origen__sueldos", "cargo__origen", "tipo__cargo__origen", "tiempo__trabajo__meses__origen", "sueldo__salario__origen", "aporte__origen", "decimo__tercero__origen", "mensualiza__tercero__origen", "decimo__cuarto__origen", "mensualiza__cuarto__origen", "fondos__de__reserva__origen"], "completa__informacion__salarios");

				/*=========================================================
		=            Modificaciones sueldos y salarios            =
		=========================================================*/

		/*==============================
		=            Orígen            =
		==============================*/

		sueldos__salarios($("#empleado__origen"), $("#idOrganismoPrincipal").val());
		sueldos__salarios($("#empleado__origen__new"), $("#idOrganismoPrincipal").val());

		sueldos__salarios($("#empleado__origen__sueldos"), $("#idOrganismoPrincipal").val());

		/*=====  End of Orígen  ======*/


		/*=====  End of Modificaciones sueldos y salarios  ======*/



	});	

	/*==========================================
	=            Modificaciones ver            =
	==========================================*/

	var editas__modificaciones__2022=function(parametro1,parametro2,parametro3,parametro4,paraemtro5,parametro6){

		$(parametro1).click(function(e){


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro3);

			paqueteDeDatos.append('idOrganismo', parametro4); 

			paqueteDeDatos.append('idActividad', paraemtro5); 

			if (parametro6==1) {
				paqueteDeDatos.append('especificidad', "si");
			}else{
				paqueteDeDatos.append('especificidad', "no");
			}

			

			$(parametro2).html(" ");

			$(".tabla__especificas").remove();

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

					let elementos=JSON.parse(response);

					let indicadorInformacion=elementos['indicadorInformacion'];


					if (parametro3=="exel__poas__capacitacion__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Ítem</th><th>Deporte</th><th>Tipo financiamiento</th><<th>Evento</th><th>Fecha inicio</th><th>Fecha fin</th><th>Genero</th><th>Categoría<th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idPda+'"><td>'+z.item+'</td><td>'+z.deporte+'</td><td>'+z.tipoFinanciamiento+'</td><td>'+z.nombreEvento+'</td><td>'+z.fechaInicio+'</td><td>'+z.fechaFin+'</td><td>'+z.genero+'</td><td>'+z.categoria+'</td><td>'+parseFloat(z.enero).toFixed(2)+'</td><td>'+parseFloat(z.febrero).toFixed(2)+'</td><td>'+parseFloat(z.marzo).toFixed(2)+'</td><td>'+parseFloat(z.abril).toFixed(2)+'</td><td>'+parseFloat(z.mayo).toFixed(2)+'</td><td>'+parseFloat(z.junio).toFixed(2)+'</td><td>'+parseFloat(z.julio).toFixed(2)+'</td><td>'+parseFloat(z.agosto).toFixed(2)+'</td><td>'+parseFloat(z.septiembre).toFixed(2)+'</td><td>'+parseFloat(z.octubre).toFixed(2)+'</td><td>'+parseFloat(z.noviembre).toFixed(2)+'</td><td>'+parseFloat(z.diciembre).toFixed(2)+'</td><td>'+parseFloat(z.totalTotales).toFixed(2)+'</td></tr>');

						}


					}



					if (parametro3=="exel__poas__administrativo__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Justificación</th><th>Cantidad</th><th>Ítem</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idActividadAd+'"><td>'+z.justificacionActividad+'</td><td>'+z.cantidadBien+'</td><td>'+z.nombreItem+'</td><td>'+z.enero+'</td><td>'+z.febrero+'</td><td>'+z.marzo+'</td><td>'+z.abril+'</td><td>'+z.mayo+'</td><td>'+z.junio+'</td><td>'+z.julio+'</td><td>'+z.agosto+'</td><td>'+z.septiembre+'</td><td>'+z.octubre+'</td><td>'+z.noviembre+'</td><td>'+z.diciembre+'</td><td>'+z.totalTotales+'</td></tr>');

						}


					}

					if (parametro3=="exel__poas__mantenimiento__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Infraestructura</th><th>Dirección</th><th>Estado</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idMantenimiento+'"><td>'+z.nombreInfras+'</td><td>'+z.direccionCompleta+'</td><td>'+z.estado+'</td><td>'+z.enero+'</td><td>'+z.febrero+'</td><td>'+z.marzo+'</td><td>'+z.abril+'</td><td>'+z.mayo+'</td><td>'+z.junio+'</td><td>'+z.julio+'</td><td>'+z.agosto+'</td><td>'+z.septiembre+'</td><td>'+z.octubre+'</td><td>'+z.noviembre+'</td><td>'+z.diciembre+'</td><td>'+z.totalTotales+'</td></tr>');

						}


					}

					if (parametro3=="exel__poas__honorarios__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Cédula</th><th>Nombre</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idHonorarios+'"><td>'+z.cedula+'</td><td>'+z.nombres+'</td>><td>'+z.enero+'</td><td>'+z.febrero+'</td><td>'+z.marzo+'</td><td>'+z.abril+'</td><td>'+z.mayo+'</td><td>'+z.junio+'</td><td>'+z.julio+'</td><td>'+z.agosto+'</td><td>'+z.septiembre+'</td><td>'+z.octubre+'</td><td>'+z.noviembre+'</td><td>'+z.diciembre+'</td><td>'+z.total+'</td></tr>');


						}


					}

					if (parametro3=="exel__poas__sueldos__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Cédula</th><th>Nombre</th><th>Tipo cargo</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idSueldos+'"><td>'+z.cedula+'</td><td>'+z.nombres+'</td><td>'+z.tipoCargo+'</td><td>'+z.enero+'</td><td>'+z.febrero+'</td><td>'+z.marzo+'</td><td>'+z.abril+'</td><td>'+z.mayo+'</td><td>'+z.junio+'</td><td>'+z.julio+'</td><td>'+z.agosto+'</td><td>'+z.septiembre+'</td><td>'+z.octubre+'</td><td>'+z.noviembre+'</td><td>'+z.diciembre+'</td><td>'+z.total+'</td></tr>');


						}


					}

					if (parametro3=="exel__poas__sueldos__ver__desvinculaciones") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Cédula</th><th>Nombre</th><th>Tipo cargo</th><th>Tipo de desvinculación</th><th>Monto de desvinculación</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idDesvinculacion+'"><td>'+z.cedula+'</td><td>'+z.nombres+'</td><td>'+z.tipoCargo+'</td><td>'+z.opcion+'</td><td>'+z.montoDesvinculacion+'</td><td>'+z.enero+'</td><td>'+z.febreo+'</td><td>'+z.marzo+'</td><td>'+z.abril+'</td><td>'+z.mayo+'</td><td>'+z.junio+'</td><td>'+z.julio+'</td><td>'+z.agosto+'</td><td>'+z.septiembre+'</td><td>'+z.octubre+'</td><td>'+z.noviembre+'</td><td>'+z.diciembre+'</td><td>'+z.total+'</td></tr>');


						}


					}


					if (parametro3=="exel__poas__items__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><thead><tr><th>Actividad</th><th>Primer trimestre</th><th>Segundo trimestre</th><th>Tercer trimestre</th><th>Cuarto trimestre</th><th>Meta indicador</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idPoaEnviado+'"><td>'+z.actividad+'</td><td>'+z.primertrimestre+'</td><td>'+z.segundotrimestre+'</td><td>'+z.tercertrimestre+'</td><td>'+z.cuartotrimestre+'</td><td>'+z.metaindicador+'</td>/tr>');

						}

					}

					if (parametro3=="exel__poas__generales__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><table class="tabla__especificas"><thead><tr><th>Actividad</th><th>Ítem</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						let contador=0;

						for (z of indicadorInformacion) {

							contador++;

							$(".cuerpo__tablas").append('<tr class="fila__'+z.idProgramacionFinanciera+'"><td>'+contador+".- "+z.nombreActividad+'</td><td>'+z.nombreItem+'</td><td>'+z.enero+'</td><td>'+z.febrero+'</td><td>'+z.marzo+'</td><td>'+z.abril+'</td><td>'+z.mayo+'</td><td>'+z.junio+'</td><td>'+z.julio+'</td><td>'+z.agosto+'</td><td>'+z.septiembre+'</td><td>'+z.octubre+'</td><td>'+z.noviembre+'</td><td>'+z.diciembre+'</td><td>'+z.totalTotales+'</td></tr>');

						}						

					}

					if (parametro3=="exel__poas__suministros__ver") {

						$(parametro2).append('<div style="overflow: scroll!important; width:100%;"><table class="tabla__especificas" style="width:100%!important;"><table class="tabla__especificas"><thead><tr><th>Tipo</th><th>Escenario</th><th>Luz</th><th>Agua</th></tr></thead><tbody class="cuerpo__tablas"></tbody></table></div>');

						for (z of indicadorInformacion) {

							$(".cuerpo__tablas").append('<tr class="fila__'+z.tipo+'"><td>'+z.tipo+'</td><td>'+z.nombreEscenario+'</td><td>'+z.luz+'</td><td>'+z.agua+'</td></tr>');

						}						

					}


						
				},
				error:function(){

				}

			});



		});

	}
	
	editas__modificaciones__2022($("#ver__excel__poa__general"),$(".visualizador__informacion__ediciones__poa"),"exel__poas__generales__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__general__anterior"),$(".visualizador__informacion__ediciones__poa__anterior"),"exel__poas__generales__ver",$("#organismoIdPrin").val(),false,1);


	editas__modificaciones__2022($("#ver__excel__poa__indicadores"),$(".visualizador__informacion__ediciones__item"),"exel__poas__items__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__indicadores__anterior"),$(".visualizador__informacion__ediciones__item__anterior"),"exel__poas__items__ver",$("#organismoIdPrin").val(),false,1);


	editas__modificaciones__2022($("#ver__excel__poa__seuldos"),$(".visualizador__informacion__ediciones__sueldos"),"exel__poas__sueldos__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__seuldos__anterior"),$(".visualizador__informacion__ediciones__sueldos__anterior"),"exel__poas__sueldos__ver",$("#organismoIdPrin").val(),false,1);


	editas__modificaciones__2022($("#ver__excel__poa__seuldos__desvinculaciones"),$(".visualizador__informacion__ediciones__sueldos__desvinculaciones"),"exel__poas__sueldos__ver__desvinculaciones",$("#organismoIdPrin").val(),false);
	editas__modificaciones__2022($("#ver__excel__poa__seuldos__desvinculaciones__anterior"),$(".visualizador__informacion__ediciones__sueldos__desvinculaciones__anterior"),"exel__poas__sueldos__ver__desvinculaciones",$("#organismoIdPrin").val(),false);



	editas__modificaciones__2022($("#ver__excel__poa__honorarios"),$(".visualizador__informacion__ediciones__honorarios"),"exel__poas__honorarios__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__honorarios__anterior"),$(".visualizador__informacion__ediciones__honorarios__anterior"),"exel__poas__honorarios__ver",$("#organismoIdPrin").val(),false,1);



	editas__modificaciones__2022($("#ver__excel__poa__mantenimiento"),$(".visualizador__informacion__ediciones__mantenimiento"),"exel__poas__mantenimiento__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__mantenimiento__anterior"),$(".visualizador__informacion__ediciones__mantenimiento__anterior"),"exel__poas__mantenimiento__ver",$("#organismoIdPrin").val(),false,1);



	editas__modificaciones__2022($("#ver__excel__poa__suministros"),$(".visualizador__informacion__ediciones__suministros"),"exel__poas__suministros__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__suministros__anterior"),$(".visualizador__informacion__ediciones__suministros__anterior"),"exel__poas__suministros__ver",$("#organismoIdPrin").val(),false,1);



	editas__modificaciones__2022($("#ver__excel__poa__administrativas"),$(".visualizador__informacion__ediciones__administrativo"),"exel__poas__administrativo__ver",$("#organismoIdPrin").val(),false,0);
	editas__modificaciones__2022($("#ver__excel__poa__administrativas__anterior"),$(".visualizador__informacion__ediciones__administrativo__anterior"),"exel__poas__administrativo__ver",$("#organismoIdPrin").val(),false,1);



	editas__modificaciones__2022($("#ver__excel__poa__capacitacion"),$(".visualizador__informacion__ediciones__capacitacion"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),3,0);
	editas__modificaciones__2022($("#ver__excel__poa__capacitacion__anterior"),$(".visualizador__informacion__ediciones__capacitacion__anterior"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),3,1);


	editas__modificaciones__2022($("#ver__excel__poa__competencia"),$(".visualizador__informacion__ediciones__competencia"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),5,0);
	editas__modificaciones__2022($("#ver__excel__poa__competencia__anterior"),$(".visualizador__informacion__ediciones__competencia__anterior"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),5,1);


	editas__modificaciones__2022($("#ver__excel__poa__recreativas"),$(".visualizador__informacion__ediciones__recreativas"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),6,0);
	editas__modificaciones__2022($("#ver__excel__poa__recreativas__anterior"),$(".visualizador__informacion__ediciones__recreativas__anterior"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),6,1);



	editas__modificaciones__2022($("#ver__excel__poa__implementacion"),$(".visualizador__informacion__ediciones__implementacion"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),7,0);
	editas__modificaciones__2022($("#ver__excel__poa__implementacion__anterior"),$(".visualizador__informacion__ediciones__implementacion__anterior"),"exel__poas__capacitacion__ver",$("#organismoIdPrin").val(),7,1);


	/*=====  End of Modificaciones ver  ======*/
	
	/*========================================================
	=            Ocutlar al enviar modificaciones            =
	========================================================*/
	
	var oculta__enviado__modificaciones=function(parametro1,parametro2){

		if ($(parametro1).val()==1) {

			$(parametro2).hide();

		}

	}

	oculta__enviado__modificaciones($("#variable__2022"),$(".ocultar__enviado__elementos"));
	
	/*=====  End of Ocutlar al enviar modificaciones  ======*/
	

	/*====================================
	=            Excel nuevos            =
	====================================*/

	var vuelve__seleccionas__documentos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

		$(parametro1).click(function(e){

			$(parametro2).html(" ");
			$(parametro3).show();
			$(parametro4).val("");
			$(parametro5).hide();

		});

	}

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__sueldos"),$(".visualizador__sueldos__y__salarios"),$("#guardar__excel__sueldos__salarios"),$("#archivo__sueldos__salarios"),$("#visualizador__sueldos__y__salarios__con"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__sueldos__desvinculaciones"),$(".visualizador__sueldos__y__salarios__desvinculaciones"),$("#guardar__excel__sueldos__salarios__desvinculaciones"),$("#archivo__sueldos__salarios__desvinculaciones"),$("#visualizador__sueldos__y__salarios__con__desvinculaciones"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__honorarios"),$(".visualizador__honorarios"),$("#guardar__excel__honorarios"),$("#archivo__honorarios"),$("#visualizador__honorarios__con"));
	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__mantenimiento"),$(".visualizador__mantenimiento"),$("#guardar__excel__mantenimiento"),$("#archivo__mantenimiento"),$("#visualizador__mantenimiento__con"));
	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__administrativo"),$(".visualizador__administrativos"),$("#guardar__excel__administrativo"),$("#archivo__administrativo"),$("#visualizador__administrativo__con"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__actividades__deportivas"),$(".visualizador__actividades__deportivas"),$("#guardar__excel__actividades__deportivas"),$("#archivo__actividades__deportivas"),$("#visualizador__actividades__deportivas__con"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__indicadores"),$(".visualizador__indicadores"),$("#guardar__excel__indicadores"),$("#archivo__indicadores"),$("#visualizador_indicadores__con"));
	
	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__actividades__deportivas__competencia"),$(".visualizador__actividades__deportivas__competencia"),$("#guardar__excel__actividades__deportivas__competencia"),$("#archivo__actividades__deportivas__competencia"),$("#visualizador__actividades__deportivas__con__competencia"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__actividades__deportivas__recreativo"),$(".visualizador__actividades__deportivas__recreativo"),$("#guardar__excel__actividades__deportivas__recreativo"),$("#archivo__actividades__deportivas__recreativo"),$("#visualizador__actividades__deportivas__con__recreativo"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__actividades__deportivas__implementaciones"),$(".visualizador__actividades__deportivas__implementaciones"),$("#guardar__excel__actividades__deportivas__implementaciones"),$("#archivo__actividades__deportivas__implementaciones"),$("#visualizador__actividades__deportivas__con__implementaciones"));

	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__poa__general"),$(".visualizador__poa__general"),$("#guardar__excel__poa__general"),$("#archivo__poa__general"),$("#visualizador__poa__general__con"));


	vuelve__seleccionas__documentos($("#vuelvesSeleccionas__suministros"),$(".visualizador__suministros"),$("#guardar__excel__suministros"),$("#archivo__suministros"),$("#visualizador_suministros__con"));

	var modificaciones__llamar__excel__documentos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

		$(parametro1).click(function(e){

			$(parametro1).hide();

			if ($(parametro5)[0].files.length === 0) {
               
				alertify.set("notifier","position", "top-center");
				alertify.notify("Es obligatorio cargar el excel", "error", 5, function(){});

				$(parametro1).show();

            }else{

				var paqueteDeDatos = new FormData();

				paqueteDeDatos.append('tipo',parametro3);

				paqueteDeDatos.append('documentoExcel', $(parametro5)[0].files[0]); 

				paqueteDeDatos.append('idOrganismo', parametro4); 

				$.ajax({

					type:"POST",
					url:"modelosBd/inserta/seleccionaAccionesExcel.md.php",
					contentType: false,
					data:paqueteDeDatos,
					processData: false,
					cache: false, 
					success:function(response){

						let elementos=JSON.parse(response);

						let banderaObligatorios=elementos['banderaObligatorios'];

						if (banderaObligatorios==true) {

							let obligatorios__falla=elementos['obligatorios__falla'];

							alertify.set("notifier","position", "top-center");
							alertify.notify(obligatorios__falla, "error", 15, function(){});
							$(parametro5).val("");
							$(parametro1).show();

						}else{

							$(parametro6).show();

							if (parametro3=="indicadores__excel") {

								$(parametro2).html(" ");

								let idActividad__array=elementos['idActividad__array'];
								let idActividad__array__codigo=elementos['idActividad__array__codigo'];
								let primer__trimestre__array=elementos['primer__trimestre__array'];
								let segundo__trimestre__array=elementos['segundo__trimestre__array'];
								let tercer__trimestre__array=elementos['tercer__trimestre__array'];
								let cuarto__trimestre__array=elementos['cuarto__trimestre__array'];
								let meta__trimestre__array=elementos['meta__trimestre__array'];


								for (let i =0; i<idActividad__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+idActividad__array[i]+'</center></td><td><center>'+primer__trimestre__array[i]+'</center></td><td><center>'+segundo__trimestre__array[i]+'</center></td><td><center>'+tercer__trimestre__array[i]+'</center></td><td><center>'+cuarto__trimestre__array[i]+'</center></td><td><center>'+meta__trimestre__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__indicadores"),$("#organismoIdPrin").val(),"indicadores__modificas__exceles",idActividad__array__codigo,primer__trimestre__array,segundo__trimestre__array,tercer__trimestre__array,cuarto__trimestre__array,meta__trimestre__array);
							}




							if (parametro3=="actividades__deportivas__excel") {

								$(parametro2).html(" ");

								let codigo__financiero__array=elementos['codigo__financiero__array'];
								let itemPalabra__array=elementos['itemPalabra__array'];
								let idActividad__array=elementos['idActividad__array'];
								let tipo__financiamiento_array=elementos['tipo__financiamiento_array'];
								let evento__array=elementos['evento__array'];
								let deporte__array=elementos['deporte__array'];
								let provincia__array=elementos['provincia__array'];
								let pais__array=elementos['pais__array'];
								let alcance__array=elementos['alcance__array'];
								let fecha__inicio__array=elementos['fecha__inicio__array'];
								let fecha__fin__array=elementos['fecha__fin__array'];
								let genero__array=elementos['genero__array'];
								let categoria__array=elementos['categoria__array'];
								let numero__entrenadores__array=elementos['numero__entrenadores__array'];
								let numero__atletas__array=elementos['numero__atletas__array'];
								let total__array__beneficiarios=elementos['total__array'];
								let beneficiarios__array=elementos['beneficiarios__array'];
								let beneficiarios2__array=elementos['beneficiarios2__array'];
								let justificacion__array=elementos['justificacion__array'];
								let cantidad__bienes__array=elementos['cantidad__bienes__array'];
								let detalle__adquisicion__array=elementos['detalle__adquisicion__array'];

								let total__array__beneficiarios__2=elementos['total__array__beneficiarios__2'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];

								for (let i =0; i<codigo__financiero__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+itemPalabra__array[i]+'</center></td></td><td><center>'+tipo__financiamiento_array[i]+'</center></td><td><center>'+evento__array[i]+'</center></td><td><center>'+deporte__array[i]+'</center></td><td><center>'+provincia__array[i]+'</center></td><td><center>'+pais__array[i]+'</center></td><td><center>'+alcance__array[i]+'</center></td><td><center>'+fecha__inicio__array[i]+'</center></td><td><center>'+fecha__fin__array[i]+'</center></td><td><center>'+genero__array[i]+'</center></td><td><center>'+categoria__array[i]+'</center></td><td><center>'+numero__entrenadores__array[i]+'</center></td><td><center>'+numero__atletas__array[i]+'</center></td><td><center>'+total__array__beneficiarios__2[i]+'</center></td><td><center>'+beneficiarios__array[i]+'</center></td><td><center>'+beneficiarios2__array[i]+'</center></td><td><center>'+justificacion__array[i]+'</center></td><td><center>'+cantidad__bienes__array[i]+'</center></td><td><center>'+detalle__adquisicion__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
									
								}

								if (parametro7==3) {

									guardarTotal__exceles($("#guardar__actividades__deportivas"),$("#organismoIdPrin").val(),"deportivas__modificas__exceles",codigo__financiero__array,tipo__financiamiento_array,evento__array,deporte__array,provincia__array,pais__array,alcance__array,fecha__inicio__array,fecha__fin__array,genero__array,categoria__array,numero__entrenadores__array,numero__atletas__array,total__array__beneficiarios__2,beneficiarios__array,beneficiarios2__array,justificacion__array,cantidad__bienes__array,detalle__adquisicion__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array,parametro7);

								}else if(parametro7==5){

									guardarTotal__exceles($("#guardar__actividades__deportivas__competencia"),$("#organismoIdPrin").val(),"deportivas__modificas__exceles",codigo__financiero__array,tipo__financiamiento_array,evento__array,deporte__array,provincia__array,pais__array,alcance__array,fecha__inicio__array,fecha__fin__array,genero__array,categoria__array,numero__entrenadores__array,numero__atletas__array,total__array__beneficiarios__2,beneficiarios__array,beneficiarios2__array,justificacion__array,cantidad__bienes__array,detalle__adquisicion__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array,parametro7);

								}else if(parametro7==6){

									guardarTotal__exceles($("#guardar__actividades__deportivas__recreativo"),$("#organismoIdPrin").val(),"deportivas__modificas__exceles",codigo__financiero__array,tipo__financiamiento_array,evento__array,deporte__array,provincia__array,pais__array,alcance__array,fecha__inicio__array,fecha__fin__array,genero__array,categoria__array,numero__entrenadores__array,numero__atletas__array,total__array__beneficiarios__2,beneficiarios__array,beneficiarios2__array,justificacion__array,cantidad__bienes__array,detalle__adquisicion__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array,parametro7);

								}else if(parametro7==7){

									guardarTotal__exceles($("#guardar__actividades__deportivas__implementaciones"),$("#organismoIdPrin").val(),"deportivas__modificas__exceles",codigo__financiero__array,tipo__financiamiento_array,evento__array,deporte__array,provincia__array,pais__array,alcance__array,fecha__inicio__array,fecha__fin__array,genero__array,categoria__array,numero__entrenadores__array,numero__atletas__array,total__array__beneficiarios__2,beneficiarios__array,beneficiarios2__array,justificacion__array,cantidad__bienes__array,detalle__adquisicion__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array,parametro7);

								}

								
							}



							if (parametro3=="administrativos__excel") {

								$(parametro2).html(" ");

								let nombreItem__array=elementos['nombreItem__array'];
								let idActividad__array=elementos['idActividad__array'];
								let justificacion__array=elementos['justificacion__array'];
								let cantidad__array=elementos['cantidad__array'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];

								for (let i =0; i<nombreItem__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+nombreItem__array[i]+'</center></td><td><center>'+justificacion__array[i]+'</center></td><td><center>'+cantidad__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__administrativo"),$("#organismoIdPrin").val(),"administrativo__modificas__exceles",idActividad__array,justificacion__array,cantidad__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array);
							}


							if (parametro3=="mantenimiento__excel") {

								$(parametro2).html(" ");

								let nombreItem__array=elementos['nombreItem__array'];
								let idActividad__array=elementos['idActividad__array'];
								let nombreInfra__array=elementos['nombreInfra__array'];
								let provincia__array=elementos['provincia__array'];
								let provincia__codigo__array=elementos['provincia__codigo__array'];
								let direccion__array=elementos['direccion__array'];
								let estado__array=elementos['estado__array'];
								let tipoRecursos__array=elementos['tipoRecursos__array'];
								let tipoIntervencion__array=elementos['tipoIntervencion__array'];
								let detallarTipo__intervencion__array=elementos['detallarTipo__intervencion__array'];
								let tipoMantenimiento__array=elementos['tipoMantenimiento__array'];
								let materiales__servicios__array=elementos['materiales__servicios__array'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];
								let ultimoFecha__servicios__array=elementos['ultimoFecha__servicios__array'];

								for (let i =0; i<nombreItem__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+nombreItem__array[i]+'</center></td><td><center>'+nombreInfra__array[i]+'</center></td><td><center>'+provincia__array[i]+'</center></td><td><center>'+direccion__array[i]+'</center></td><td><center>'+estado__array[i]+'</center></td><td><center>'+tipoRecursos__array[i]+'</center></td><td><center>'+tipoIntervencion__array[i]+'</center></td><td><center>'+detallarTipo__intervencion__array[i]+'</center></td><td><center>'+tipoMantenimiento__array[i]+'</center></td><td><center>'+materiales__servicios__array[i]+'</center></td><td><center>'+ultimoFecha__servicios__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__mantenimiento"),$("#organismoIdPrin").val(),"mantenimiento__modificas__exceles",idActividad__array,nombreInfra__array,provincia__codigo__array,direccion__array,estado__array,tipoRecursos__array,tipoIntervencion__array,detallarTipo__intervencion__array,tipoMantenimiento__array,materiales__servicios__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array,ultimoFecha__servicios__array);
							}


							if (parametro3=="honorarios__excel") {

								$(parametro2).html(" ");

								let idActividad__array=elementos['idActividad__array'];
								let cedula__array=elementos['cedula__array'];
								let nombres__array=elementos['nombres__array'];
								let cargo__array=elementos['cargo__array'];
								let honorarioMensual__array=elementos['honorarioMensual__array'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];
								let tipo__array=elementos['tipo__array'];

								for (let i =0; i<idActividad__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+idActividad__array[i]+'</center></td><td><center>'+cedula__array[i]+'</center></td><td><center>'+nombres__array[i]+'</center></td><td><center>'+cargo__array[i]+'</center></td><td><center>'+honorarioMensual__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__honorarios"),$("#organismoIdPrin").val(),"honorarios__modificas__exceles",idActividad__array,cedula__array,nombres__array,cargo__array,honorarioMensual__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array,tipo__array);

							}


							if (parametro3=="sueldos__salarios__excel") {

								$(parametro2).html(" ");

								let idActividad__array=elementos['idActividad__array'];
								let cedula__array=elementos['cedula__array'];
								let cargo__array=elementos['cargo__array'];
								let nombres__array=elementos['nombres__array'];
								let tipoCargo__array=elementos['tipoCargo__array'];
								let tiempoTrabajo__array=elementos['tiempoTrabajo__array'];
								let sueldoSalario__array=elementos['sueldoSalario__array'];
								let aportePatronal__array=elementos['aportePatronal__array'];
								let decimoTercer__array=elementos['decimoTercer__array'];
								let mensualizaDecimoT__array=elementos['mensualizaDecimoT__array'];
								let decimoCuarto__array=elementos['decimoCuarto__array'];
								let mensualizaDecimoC__array=elementos['mensualizaDecimoC__array'];
								let fondosRe__array=elementos['fondosRe__array'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];

								for (let i =0; i<idActividad__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+idActividad__array[i]+'</center></td><td><center>'+cedula__array[i]+'</center></td><td><center>'+cargo__array[i]+'</center></td><td><center>'+nombres__array[i]+'</center></td><td><center>'+tipoCargo__array[i]+'</center></td><td><center>'+tiempoTrabajo__array[i]+'</center></td><td><center>'+sueldoSalario__array[i]+'</center></td><td><center>'+aportePatronal__array[i]+'</center></td><td><center>'+decimoTercer__array[i]+'</center></td><td><center>'+mensualizaDecimoT__array[i]+'</center></td><td><center>'+decimoCuarto__array[i]+'</center></td><td><center>'+mensualizaDecimoC__array[i]+'</center></td><td><center>'+fondosRe__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__sueldosSalarios"),$("#organismoIdPrin").val(),"sueldo__salario__modificas__exceles",idActividad__array,cedula__array,cargo__array,nombres__array,tipoCargo__array,tiempoTrabajo__array,sueldoSalario__array,aportePatronal__array,decimoTercer__array,mensualizaDecimoT__array,decimoCuarto__array,mensualizaDecimoC__array,fondosRe__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array);

							}

							if (parametro3=="sueldos__salarios__desvinculaciones__excel") {

								$(parametro2).html(" ");

								let idActividad__array=elementos['idActividad__array'];
								let cedula__array=elementos['cedula__array'];
								let cargo__array=elementos['cargo__array'];
								let nombres__array=elementos['nombres__array'];
								let tipoCargo__array=elementos['tipoCargo__array'];
								let compensacionDesaucio__array=elementos['compensacionDesaucio__array'];
								let despidoIntes__array=elementos['despidoIntes__array'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];

								let arrayErroresSumas=elementos['arrayErroresSumas'];

								if (arrayErroresSumas.length>0) {

         
									alertify.set("notifier","position", "top-center");
									alertify.notify("Las cédulas: "+arrayErroresSumas+" no están registradas favor registrarlas en sueldos y salarios", "error", 5, function(){});

									$(parametro1).show();
									$(".visualizador__sueldos__y__salarios__desvinculaciones").html(" ");
									$("#guardar__excel__sueldos__salarios__desvinculaciones").show();
									$("#archivo__sueldos__salarios__desvinculaciones").val("");
									$("#visualizador__sueldos__y__salarios__con__desvinculaciones").hide();


								}else{

									for (let i =0; i<idActividad__array.length; i++) {

										$(parametro2).append('<tr><td><center>'+idActividad__array[i]+'</center></td><td><center>'+cedula__array[i]+'</center></td><td><center>'+cargo__array[i]+'</center></td><td><center>'+nombres__array[i]+'</center></td><td><center>'+tipoCargo__array[i]+'</center></td><td><center>'+compensacionDesaucio__array[i]+'</center></td><td><center>'+despidoIntes__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
										
									}

									guardarTotal__exceles($("#guardar__sueldosSalarios__desvinculaciones"),$("#organismoIdPrin").val(),"sueldo__salario__modificas__exceles__desvinculaciones",idActividad__array,cedula__array,cargo__array,nombres__array,tipoCargo__array,compensacionDesaucio__array,despidoIntes__array,false,false,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array);

								}

	
							}


							if (parametro3=="poa__general__excel") {

								$(parametro2).html(" ");

								let idActividad__array=elementos['idActividad__array'];
								let nombreActividad__array=elementos['nombreActividad__array'];
								let idItem__array=elementos['idItem__array'];
								let nombreItem__array=elementos['nombreItem__array'];
								let codigo__presupues_array=elementos['codigo__presupues_array'];
								let enero__array=elementos['enero__array'];
								let febrero__array=elementos['febrero__array'];
								let marzo__array=elementos['marzo__array'];
								let abril__array=elementos['abril__array'];
								let mayo__array=elementos['mayo__array'];
								let junio__array=elementos['junio__array'];
								let julio__array=elementos['julio__array'];
								let agosto__array=elementos['agosto__array'];
								let septiembre__array=elementos['septiembre__array'];
								let octubre__array=elementos['octubre__array'];
								let noviembre__array=elementos['noviembre__array'];
								let diciembre__array=elementos['diciembre__array'];
								let total__array=elementos['total__array'];

								for (let i =0; i<nombreActividad__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+nombreActividad__array[i]+'</center></td><td><center>'+nombreItem__array[i]+'</center></td><td><center>'+enero__array[i]+'</center></td><td><center>'+febrero__array[i]+'</center></td><td><center>'+marzo__array[i]+'</center></td><td><center>'+abril__array[i]+'</center></td><td><center>'+mayo__array[i]+'</center></td><td><center>'+junio__array[i]+'</center></td><td><center>'+julio__array[i]+'</center></td><td><center>'+agosto__array[i]+'</center></td><td><center>'+septiembre__array[i]+'</center></td><td><center>'+octubre__array[i]+'</center></td><td><center>'+noviembre__array[i]+'</center></td><td><center>'+diciembre__array[i]+'</center></td><td><center>'+total__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__poa__general"),$("#organismoIdPrin").val(),"poa__general__guardados",idActividad__array,idItem__array,enero__array,febrero__array,marzo__array,abril__array,mayo__array,junio__array,julio__array,agosto__array,septiembre__array,octubre__array,noviembre__array,diciembre__array,total__array);

							}


							if (parametro3=="suministros__excel") {

								$(parametro2).html(" ");

								let tipo__array=elementos['tipo__array'];
								let nombre__array=elementos['nombre__array'];
								let luz__array=elementos['luz__array'];
								let agua__array=elementos['agua__array'];


								for (let i =0; i<tipo__array.length; i++) {

									$(parametro2).append('<tr><td><center>'+tipo__array[i]+'</center></td><td><center>'+nombre__array[i]+'</center></td><td><center>'+luz__array[i]+'</center></td><td><center>'+agua__array[i]+'</center></td></tr>');
									
								}

								guardarTotal__exceles($("#guardar__suministros"),$("#organismoIdPrin").val(),"poa__suministros__guardados",tipo__array,nombre__array,luz__array,agua__array);

							}

						}
						
					},
					error:function(){

					}

				});

            }

		});

	}

	modificaciones__llamar__excel__documentos($("#guardar__excel__sueldos__salarios"),$(".visualizador__sueldos__y__salarios"),"sueldos__salarios__excel",$("#organismoIdPrin").val(),$("#archivo__sueldos__salarios"),$("#visualizador__sueldos__y__salarios__con"));

	modificaciones__llamar__excel__documentos($("#guardar__excel__sueldos__salarios__desvinculaciones"),$(".visualizador__sueldos__y__salarios__desvinculaciones"),"sueldos__salarios__desvinculaciones__excel",$("#organismoIdPrin").val(),$("#archivo__sueldos__salarios__desvinculaciones"),$("#visualizador__sueldos__y__salarios__con__desvinculaciones"));


	modificaciones__llamar__excel__documentos($("#guardar__excel__honorarios"),$(".visualizador__honorarios"),"honorarios__excel",$("#organismoIdPrin").val(),$("#archivo__honorarios"),$("#visualizador__honorarios__con"));
	

	modificaciones__llamar__excel__documentos($("#guardar__excel__mantenimiento"),$(".visualizador__mantenimiento"),"mantenimiento__excel",$("#organismoIdPrin").val(),$("#archivo__mantenimiento"),$("#visualizador__mantenimiento__con"));
	

	modificaciones__llamar__excel__documentos($("#guardar__excel__administrativo"),$(".visualizador__administrativos"),"administrativos__excel",$("#organismoIdPrin").val(),$("#archivo__administrativo"),$("#visualizador__administrativo__con"));


	modificaciones__llamar__excel__documentos($("#guardar__excel__actividades__deportivas"),$(".visualizador__actividades__deportivas"),"actividades__deportivas__excel",$("#organismoIdPrin").val(),$("#archivo__actividades__deportivas"),$("#visualizador__actividades__deportivas__con"),3);

	modificaciones__llamar__excel__documentos($("#guardar__excel__indicadores"),$(".visualizador__indicadores"),"indicadores__excel",$("#organismoIdPrin").val(),$("#archivo__indicadores"),$("#visualizador_indicadores__con"));


	modificaciones__llamar__excel__documentos($("#guardar__excel__actividades__deportivas__competencia"),$(".visualizador__actividades__deportivas__competencia"),"actividades__deportivas__excel",$("#organismoIdPrin").val(),$("#archivo__actividades__deportivas__competencia"),$("#visualizador__actividades__deportivas__con__competencia"),5);

	modificaciones__llamar__excel__documentos($("#guardar__excel__actividades__deportivas__recreativo"),$(".visualizador__actividades__deportivas__recreativo"),"actividades__deportivas__excel",$("#organismoIdPrin").val(),$("#archivo__actividades__deportivas__recreativo"),$("#visualizador__actividades__deportivas__con__recreativo"),6);

	modificaciones__llamar__excel__documentos($("#guardar__excel__actividades__deportivas__implementaciones"),$(".visualizador__actividades__deportivas__implementaciones"),"actividades__deportivas__excel",$("#organismoIdPrin").val(),$("#archivo__actividades__deportivas__implementaciones"),$("#visualizador__actividades__deportivas__con__implementaciones"),7);

	modificaciones__llamar__excel__documentos($("#guardar__excel__poa__general"),$(".visualizador__poa__general"),"poa__general__excel",$("#organismoIdPrin").val(),$("#archivo__poa__general"),$("#visualizador__poa__general__con"));


	modificaciones__llamar__excel__documentos($("#guardar__excel__suministros"),$(".visualizador__suministros"),"suministros__excel",$("#organismoIdPrin").val(),$("#archivo__suministros"),$("#visualizador_suministros__con"));

	/*=====  End of Excel nuevos  ======*/
	

	var modificaciones__llamar__configuraciones=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			$(parametro2).html(" ");

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro3);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/modificacion/modificacionGlobal.js",function(){

					var elementos=JSON.parse(response);

					var indicadorInformacion=elementos['indicadorInformacion'];

					let arrayModiciacion=Object.values(indicadorInformacion);

					let contador=arrayModiciacion.length;

					let contador2=0;
		
					for (z of indicadorInformacion) {

						$(parametro2).append("<table id='actividadT__"+z.idActividades+"' style='width:100%!important;'><thead><tr><th rowspan='1' style='width:20%!important;'><center>Orígen</center></th><th rowspan='1' colspan='3'><center>Destino</center></th><th rowspan='2' colspan='1' style='width:35%!important;vertical-align:middle;'><center>Descripción</center></th><th rowspan='2' colspan='1' style='width:5%!important;vertical-align:middle;'><center>Guardar</center></th></tr><tr><th style='width:20%!important;'><center>Actividad</center></th><th style='width:20%!important;'><center>Actividad</center></th><th style='width:35%!important;'><center>Ítem</center></th><th style='width:5%!important;'><center>Ítems<br>restringidos</center></th></tr></thead><tbody class='body__act__"+z.idActividades+"'></tbody></table>");


						for (x of indicadorInformacion) {

							contador2++;

							if (!$("#actividad__mo"+z.idActividades).length > 0 ) {

								$(".body__act__"+z.idActividades).append('<tr><td id="actividad__mo'+z.idActividades+'" rowspan="'+contador+'" style="vertical-align:middle;">'+z.idActividades+".- "+z.nombreActividades+'</td><td>'+x.idActividades+".- "+x.nombreActividades+'</td><td><select id="items__act'+contador2+'" class="ancho__total__input obligatorios__admin__modificaciones'+contador2+'"></select></td><td><center><a class="btn btn-warning" id="itemsEs__'+contador2+'" idOrigen="'+z.idActividades+'" idDestino="'+x.idActividades+'" data-bs-toggle="modal" data-bs-target="#modal__itemsRestringidos"><i class="fa fa-eye" aria-hidden="true"></i></a></center></td><td><textarea id="descripcion__'+contador2+'" class="ancho__total__input obligatorios__admin__modificaciones'+contador2+'"></textarea></td><td><center><a class="btn btn-primary" id="guardar__actm'+contador2+'" idActividadOrigen="'+z.idActividades+'" idActividadDestino="'+x.idActividades+'"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></center></td></tr>');

							}else{

								$(".body__act__"+z.idActividades).append('<tr><td>'+x.idActividades+".- "+x.nombreActividades+'</td><td><select id="items__act'+contador2+'" class="ancho__total__input obligatorios__admin__modificaciones'+contador2+'"></select></td><td><center><a class="btn btn-warning" id="itemsEs__'+contador2+'" idOrigen="'+z.idActividades+'" idDestino="'+x.idActividades+'" data-bs-toggle="modal" data-bs-target="#modal__itemsRestringidos"><i class="fa fa-eye" aria-hidden="true"></i></a></center></td><td><textarea id="descripcion__'+contador2+'" class="ancho__total__input obligatorios__admin__modificaciones'+contador2+'"></textarea></td><td><center><a class="btn btn-primary" id="guardar__actm'+contador2+'" idActividadOrigen="'+z.idActividades+'" idActividadDestino="'+x.idActividades+'"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></center></td></tr>');

							}


							// $('#items__act'+contador2).select2();

							$("#itemsEs__"+contador2).click(function (e){

								let idOrigen=$(this).attr('idOrigen');
								let idDestino=$(this).attr('idDestino');

								regresar__informacion__items__restringidos(idOrigen,idDestino,"selecciona__restricciones",$(".filas__restricciones__modificaciones"));

							});

							regresar__informacion__modificacion("actividades__conjuntas",z.idActividades,x.idActividades,$("#permitdos"+contador2),$("#descripcion__"+contador2),$("#items__act"+contador2));

							guardar__modif($("#guardar__actm"+contador2),[$("#idUsuarioPrincipal").val()],$(".obligatorios__admin__modificaciones"+contador2),"guardar__modificas__director",$("#items__act"+contador2),$("#descripcion__"+contador2),"items__act"+contador2);

						}

					}

				

				});

				},
				error:function(){

				}

			});

		});

	}

	modificaciones__llamar__configuraciones($("#idModificacionesActividades"),$(".body__modificaciones__actividades"),"modificacion__actividades");



	var llamarEditar__modificaciones=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			$(parametro2).html(" ");

			var paqueteDeDatos = new FormData();

			let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();

			paqueteDeDatos.append('tipo',parametro3);
			paqueteDeDatos.append('idOrganismoPrincipal',idOrganismoPrincipal);

			$.ajax({

				type:"POST",
				url:"modelosBd/inserta/seleccionaAcciones.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){

				$.getScript("layout/scripts/js/modificacion/modificacionGlobal.js",function(){

				var elementos=JSON.parse(response);

				var indicadorInformacion=elementos['indicadorInformacion'];				

				if (parametro3=="selecciona__modificas__act") {

					for (z of indicadorInformacion) {
					
						$(parametro2).append('<tr class="fila__'+z.idModificacionOr+'"><td>'+z.actividadOrigen+'</td><td>'+z.itemOrigen+'</td><td>'+z.codigoItemOrigen+'</td><td>'+z.mesOrigen+'</td><td>'+z.montoAsignadoOrigen+'</td><td>'+z.disminucionOrigen+'</td><td>'+z.totalOrigen+'</td><td>'+z.actividadDestino+'</td><td>'+z.itemDestino+'</td><td>'+z.codigoItemDestino+'</td><td>'+z.mesDestino+'</td><td>'+z.montoAsignadoDestino+'</td><td>'+z.aumentoDestino+'</td><td>'+z.totalDestino+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idModificacionOr+'" name="eliminarInfor'+z.idModificacionOr+'" idPrincipal="'+z.idModificacionOr+'" idContador="'+z.idModificacionOr+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>')

						$("#eliminarInfor"+z.idModificacionOr).click(function(e) {

							let idContador=$(this).attr('idContador');
							let idPrincipal=$(this).attr('idPrincipal');
										
							funcion__eliminar__general(idPrincipal,'eliminar__modifica__act');

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

	llamarEditar__modificaciones($("#idmodificacionMontosME"),$(".ediciones__modificaciones"),"selecciona__modificas__act");


});