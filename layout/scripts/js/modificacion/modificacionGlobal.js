
/*===========================================
=            Funciones de reglas            =
===========================================*/

function validacionRegistro(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).val()=="" || $(this).val()=="0"){
	     	sumadorErrores++;
		}

	});

	if (sumadorErrores==0) {
		return true;
	}else{
		return false;
	}

}

var validacionRegistroMostrarErrores=function(parametro1){

	var sumadorErrores=0;

	$(parametro1).each(function(index) {

		if($(this).val()=="" || $(this).val()=="0"){
	    	$(this).addClass('error');
		}else{
	    	$(this).removeClass('error');
		}
	  
	});

}

/*=====  End of Funciones de reglas  ======*/


/*===============================================
=            Guardar exceles totales            =
===============================================*/

var guardarTotal__exceles=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10,parametro11,parametro12,parametro13,parametro14,parametro15,parametro16,parametro17,parametro18,parametro19,parametro20,parametro21,parametro22,parametro23,parametro24,parametro25,parametro26,parametro27,parametro28,parametro29,parametro30,parametro31,parametro32,parametro33,parametro34,parametro35,parametro36){

$(parametro1).click(function (e){

	$(parametro1).hide();

	var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

	confirm.set({transition:'slide'});  

	confirm.set('onok', function(){ 

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append("idOrganismo",parametro2);
	paqueteDeDatos.append("tipo",parametro3);


	let semestrePoaGeneral=$("#semestrePoaGeneral").val();
	let semestreIndicadores=$("#semestreIndicadores").val();
	let semestreSuministros=$("#semestreSuministros").val();
	let semestreSueldosSalarios=$("#semestreSueldosSalarios").val();
	let semestreDesvinculaciones=$("#semestreDesvinculaciones").val();
	let semestreHonorarios=$("#semestreHonorarios").val();
	let semestreMantenimiento=$("#semestreMantenimiento").val();
	let semestreAdministrativas=$("#semestreAdministrativas").val();
	let semestreActividad__3=$("#semestreActividad__3").val();
	let semestreActividad__5=$("#semestreActividad__5").val();
	let semestreActividad__6=$("#semestreActividad__6").val();
	let semestreActividad__7=$("#semestreActividad__7").val();


	if (parametro3=="poa__general__guardados") {

		paqueteDeDatos.append("idActividad__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("idItem__array",JSON.stringify(parametro5));

		paqueteDeDatos.append("enero__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro17));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("idActividad__escogidas",parametro19);
		paqueteDeDatos.append("semestrePoaGeneral",semestrePoaGeneral);

	}

	if (parametro3=="poa__suministros__guardados") {

		paqueteDeDatos.append("tipo__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("nombre__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("luz__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("agua__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("semestreSuministros",semestreSuministros);

	}



	if (parametro3=="indicadores__modificas__exceles") {

		paqueteDeDatos.append("idActividad__array__codigo",JSON.stringify(parametro4));
		paqueteDeDatos.append("primer__trimestre__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("segundo__trimestre__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("tercer__trimestre__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("cuarto__trimestre__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("meta__trimestre__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("semestreIndicadores",semestreIndicadores);

	}



	if (parametro3=="deportivas__modificas__exceles") {

		paqueteDeDatos.append("codigo__financiero__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("tipo__financiamiento_array",JSON.stringify(parametro5));
		paqueteDeDatos.append("evento__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("deporte__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("provincia__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("pais__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("alcance__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("fecha__inicio__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("fecha__fin__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("genero__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("categoria__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("numero__entrenadores__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("numero__atletas__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("total__array__beneficiarios",JSON.stringify(parametro17));
		paqueteDeDatos.append("beneficiarios__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("beneficiarios2__array",JSON.stringify(parametro19));
		paqueteDeDatos.append("justificacion__array",JSON.stringify(parametro20));
		paqueteDeDatos.append("cantidad__bienes__array",JSON.stringify(parametro21));
		paqueteDeDatos.append("detalle__adquisicion__array",JSON.stringify(parametro22));

		paqueteDeDatos.append("enero__array",JSON.stringify(parametro23));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro24));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro25));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro26));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro27));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro28));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro29));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro30));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro31));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro32));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro33));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro34));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro35));
		paqueteDeDatos.append("idActividad__escogidas",parametro36);

		if (parametro36=='3' || parametro36==3) {
			paqueteDeDatos.append("semestreActividad__de__actividades",semestreActividad__3);	
		}else if(parametro36=='5' || parametro36==5){
			paqueteDeDatos.append("semestreActividad__de__actividades",semestreActividad__5);	
		}else if(parametro36=='6' || parametro36==6){
			paqueteDeDatos.append("semestreActividad__de__actividades",semestreActividad__6);	
		}else if(parametro36=='7' || parametro36==7){
			paqueteDeDatos.append("semestreActividad__de__actividades",semestreActividad__7);	
		}

		

	}



	if (parametro3=="sueldo__salario__modificas__exceles") {

		paqueteDeDatos.append("idActividad__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("cedula__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("cargo__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("nombres__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("tipoCargo__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("tiempoTrabajo__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("sueldoSalario__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("aportePatronal__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("decimoTercer__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("mensualizaDecimoT__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("decimoCuarto__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("mensualizaDecimoC__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("fondosRe__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("enero__array",JSON.stringify(parametro17));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro19));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro20));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro21));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro22));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro23));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro24));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro25));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro26));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro27));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro28));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro29));
		paqueteDeDatos.append("semestreSueldosSalarios",semestreSueldosSalarios);	

	}


	if (parametro3=="sueldo__salario__modificas__exceles__desvinculaciones") {

		paqueteDeDatos.append("idActividad__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("cedula__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("cargo__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("nombres__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("tipoCargo__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("compensacionDesaucio__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("despidoIntes__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("reunciaVoluntaria__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("vacacionesNoGozadas__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("enero__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro17));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro19));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro20));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro21));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro22));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro23));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro24));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro25));
		paqueteDeDatos.append("semestreDesvinculaciones",semestreDesvinculaciones);	

	}

	if (parametro3=="honorarios__modificas__exceles") {

		paqueteDeDatos.append("idActividad__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("cedula__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("nombres__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("cargo__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("honorario__mensual",JSON.stringify(parametro8));
		paqueteDeDatos.append("enero__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro17));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro19));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro20));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro21));
		paqueteDeDatos.append("tipo__array",JSON.stringify(parametro22));
		paqueteDeDatos.append("semestreHonorarios",semestreHonorarios);	

	}
	
	if (parametro3=="mantenimiento__modificas__exceles") {

		paqueteDeDatos.append("idActividad__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("nombreInfra__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("provincia__codigo__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("direccion__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("estado__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("tipoRecursos__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("tipoIntervencion__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("detallarTipo__intervencion__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("tipoMantenimiento__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("materiales__servicios__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("enero__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro17));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro19));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro20));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro21));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro22));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro23));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro24));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro25));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro26));
		paqueteDeDatos.append("semestreMantenimiento",semestreMantenimiento);	

	}
	

	if (parametro3=="administrativo__modificas__exceles") {

		paqueteDeDatos.append("idActividad__array",JSON.stringify(parametro4));
		paqueteDeDatos.append("justificacion__array",JSON.stringify(parametro5));
		paqueteDeDatos.append("cantidad__array",JSON.stringify(parametro6));
		paqueteDeDatos.append("enero__array",JSON.stringify(parametro7));
		paqueteDeDatos.append("febrero__array",JSON.stringify(parametro8));
		paqueteDeDatos.append("marzo__array",JSON.stringify(parametro9));
		paqueteDeDatos.append("abril__array",JSON.stringify(parametro10));
		paqueteDeDatos.append("mayo__array",JSON.stringify(parametro11));
		paqueteDeDatos.append("junio__array",JSON.stringify(parametro12));
		paqueteDeDatos.append("julio__array",JSON.stringify(parametro13));
		paqueteDeDatos.append("agosto__array",JSON.stringify(parametro14));
		paqueteDeDatos.append("septiembre__array",JSON.stringify(parametro15));
		paqueteDeDatos.append("octubre__array",JSON.stringify(parametro16));
		paqueteDeDatos.append("noviembre__array",JSON.stringify(parametro17));
		paqueteDeDatos.append("diciembre__array",JSON.stringify(parametro18));
		paqueteDeDatos.append("total__array",JSON.stringify(parametro19));
		paqueteDeDatos.append("semestreAdministrativas",semestreAdministrativas);

	}

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

			if(mensaje==1){

				alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});

				window.setTimeout(function(){ 

				    location.reload();

				} ,5000); 

		    }

		},
		error:function(){

		}
					
	});					

	});  

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){

			$(parametro1).show();

		}); 
	}); 


});

}


/*=====  End of Guardar exceles totales  ======*/


/*=================================
=            Funciones            =
=================================*/


var honorarios = function (parametro1, parametro2, parametro3) {

	$(parametro1).on('change', function () {

		var paqueteDeDatos = new FormData();

		let idSueldos = $(this).val();

		paqueteDeDatos.append("tipo", parametro3);
		paqueteDeDatos.append("idSueldos", idSueldos);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				var elementos = JSON.parse(response);
				var indicadorInformacion = elementos['indicadorInformacion'];

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




				}

			},
			error: function () {

			}

		});

	});

}

var sueldos__y__salarios__asignacion = function (parametro1, parametro2, parametro3) {

	$(parametro1).on('change', function () {

		var paqueteDeDatos = new FormData();

		let idSueldos = $(this).val();

		paqueteDeDatos.append("tipo", parametro3);
		alert(parametro3);
		paqueteDeDatos.append("idSueldos", idSueldos);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				var elementos = JSON.parse(response);
				var indicadorInformacion = elementos['indicadorInformacion'];

				for (z of indicadorInformacion) {

					if (parametro3 == "completa__informacion__salarios") {

						$("#" + parametro2[0]).val(z.cedula);
						$("#" + parametro2[1]).val(z.cargo);
						$("#" + parametro2[2]).val(z.tipoCargo);
						$("#" + parametro2[3]).val(z.tiempoTrabajo);
						$("#" + parametro2[4]).val(parseFloat(z.sueldoSalario).toFixed(2));
						$("#" + parametro2[5]).val(parseFloat(z.aportePatronal).toFixed(2));
						$("#" + parametro2[6]).val(parseFloat(z.decimoTercera).toFixed(2));
						$("#" + parametro2[7]).val(z.mensualizaTercera);
						$("#" + parametro2[8]).val(parseFloat(z.decimoCuarta).toFixed(2));
						$("#" + parametro2[9]).val(z.menusalizaCuarta);
						$("#" + parametro2[10]).val(parseFloat(z.fondosReserva).toFixed(2));

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

	});

}

var elementos__completas=function(parametro1,parametro2,parametro3){

	$(parametro1).on('change', function () {

		var paqueteDeDatos = new FormData();

		let idSueldos=$(this).val();

		paqueteDeDatos.append("tipo",parametro3);
		paqueteDeDatos.append("idSueldos",idSueldos);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false, 
			success:function(response){

				var elementos=JSON.parse(response);
				var indicadorInformacion=elementos['indicadorInformacion'];	

				for (z of indicadorInformacion) {

					if (parametro3=="completa__informacion__salarios") {

						$("#"+parametro2[0]).val(z.cedula);
						$("#"+parametro2[1]).val(z.cargo);
						$("#"+parametro2[2]).val(z.tipoCargo);
						$("#"+parametro2[3]).val(z.tiempoTrabajo);
						$("#"+parametro2[4]).val(parseFloat(z.sueldoSalario).toFixed(2));
						$("#"+parametro2[5]).val(parseFloat(z.aportePatronal).toFixed(2));
						$("#"+parametro2[6]).val(parseFloat(z.decimoTercera).toFixed(2));
						$("#"+parametro2[7]).val(z.mensualizaTercera);
						$("#"+parametro2[8]).val(parseFloat(z.decimoCuarta).toFixed(2));
						$("#"+parametro2[9]).val(z.menusalizaCuarta);
						$("#"+parametro2[10]).val(parseFloat(z.fondosReserva).toFixed(2));

						$("#sueldo__salario__total__mensual__origen__disminucion").val(parseFloat(z.sueldoSalario).toFixed(2));
						$("#aporte__total__origen__disminucion").val(parseFloat(z.aportePatronal).toFixed(2));
						$("#decimo__tercero__total__origen__disminucion").val(parseFloat(z.decimoTercera).toFixed(2));
						$("#decimo__cuarto__total__origen__disminucion").val(parseFloat(z.decimoCuarta).toFixed(2));
						$("#fondos__de__reserva__total__origen__disminucion").val(parseFloat(z.fondosReserva).toFixed(2));

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
			error:function(){

			}
					
		});				

	});

}

var sumar__origenes=function(parametro1,parametro2,parametro3){

$(parametro1).on('input', function () {

	let sumar=0;

	sumar= parseFloat($(parametro2).val()) - parseFloat($(this).val());

	if (sumar<0) {

		$(parametro3).val(0);
		$(parametro1).val(0);

		alertify.set("notifier","position", "top-center");
		alertify.notify("No puede el monto ser mayor al planificado para el mes", "error", 5, function(){});

	}else{

		$(parametro3).val(sumar.toFixed(2));

	}

});

}


var sumar__origenes__2 = function (parametro1, parametro2, parametro3) {

	$(parametro1).on('input', function () {


		let sumar = 0;

		sumar = parseFloat($(parametro2).val()) - parseFloat($(this).val());

		if (sumar < 0) {

			$(parametro3).val(0);
			$(parametro1).val(0);


		} else {

			$(parametro3).val(sumar.toFixed(2));

		}

	});

}


var sumar__disminuye = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6) {
	let sumar = 0;

	$(parametro2).on('input', function () {
		sumar =
			parseFloat($(parametro2).val()) +
			parseFloat($(parametro3).val()) +
			parseFloat($(parametro4).val()) +
			parseFloat($(parametro5).val()) +
			parseFloat($(parametro6).val());

		$(parametro1).val(sumar.toFixed(2));

	});

	$(parametro3).on('input', function () {
		sumar =
			parseFloat($(parametro2).val()) +
			parseFloat($(parametro3).val()) +
			parseFloat($(parametro4).val()) +
			parseFloat($(parametro5).val()) +
			parseFloat($(parametro6).val());

		$(parametro1).val(sumar.toFixed(2));

	});

	$(parametro4).on('input', function () {
		sumar =
			parseFloat($(parametro2).val()) +
			parseFloat($(parametro3).val()) +
			parseFloat($(parametro4).val()) +
			parseFloat($(parametro5).val()) +
			parseFloat($(parametro6).val());

		$(parametro1).val(sumar.toFixed(2));

	});

	$(parametro5).on('input', function () {
		sumar =
			parseFloat($(parametro2).val()) +
			parseFloat($(parametro3).val()) +
			parseFloat($(parametro4).val()) +
			parseFloat($(parametro5).val()) +
			parseFloat($(parametro6).val());

		$(parametro1).val(sumar.toFixed(2));

	});

	$(parametro6).on('input', function () {
		sumar =
			parseFloat($(parametro2).val()) +
			parseFloat($(parametro3).val()) +
			parseFloat($(parametro4).val()) +
			parseFloat($(parametro5).val()) +
			parseFloat($(parametro6).val());

		$(parametro1).val(sumar.toFixed(2));

	});

}
var guardar__modif__2=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8,parametro9,parametro10,parametro11,parametro12,parametro13){

	$(parametro1).hide();

	var validador= validacionRegistro(parametro3);
	validacionRegistroMostrarErrores(parametro3);

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios (tener encuenta que los montos no pueden ser de ejecución 0.00)", "error", 5, function(){});

		$(parametro1).show();			

	}else{

		var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

		confirm.set({transition:'slide'});  

		confirm.set('onok', function(){ 

			var paqueteDeDatos = new FormData();
			paqueteDeDatos.append("tipo",parametro4);
			paqueteDeDatos.append("parametros",JSON.stringify(parametro2));

			if (parametro4=="guardar__modificas__principal__act") {

				let mesesSeleccionables__destino=parametro5;
				let monto__seleccionados__destino=parametro6;
				let disminucion__seleccionados__destino=parametro7;
				let total__disminucion__destino=parametro8;
				let actividad=parametro9;
				let item__modificaciones=parametro10;
				let justificacion=parametro12;
				let nombre__justificacion=parametro13;

				paqueteDeDatos.append("actividad",actividad);
				paqueteDeDatos.append("item__modificaciones",item__modificaciones);
				paqueteDeDatos.append("mesesSeleccionables__destino",mesesSeleccionables__destino);
				paqueteDeDatos.append("monto__seleccionados__destino",monto__seleccionados__destino);
				paqueteDeDatos.append("disminucion__seleccionados__destino",disminucion__seleccionados__destino);
				paqueteDeDatos.append("total__disminucion__destino",total__disminucion__destino);
				paqueteDeDatos.append('archivo1', $(parametro11)[0].files[0]);
				paqueteDeDatos.append("justificacion",justificacion);
				paqueteDeDatos.append("nombre__justificacion",nombre__justificacion);

			}

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

					if(mensaje==1){

				       alertify.set("notifier","position", "top-center");
				       alertify.notify("Registro realizado correctamente", "success", 2, function(){});

				       $(parametro3).val("0");

				       $(parametro1).show();

				       $(".tabla__destino__necesaria").hide();

		            }					

				},
				error:function(){

				}
					
			});					

		});  

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function(){

				$(parametro1).show();

			}); 
		}); 


	}	

}

var guardar__modif=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

$(parametro1).click(function (e){

	var validador= validacionRegistro(parametro3);
	validacionRegistroMostrarErrores(parametro3);

	if (validador==false) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Campos obligatorios (tener encuenta que los montos no pueden ser de ejecución 0.00)", "error", 5, function(){});

		$(parametro1).show();			

	}else{

		var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

		confirm.set({transition:'slide'});  

		confirm.set('onok', function(){ 

			var paqueteDeDatos = new FormData();
			paqueteDeDatos.append("tipo",parametro4);
			paqueteDeDatos.append("parametros",JSON.stringify(parametro2));

			if (parametro4=="guardar__modificas__director") {

				let permitidos=$(parametro5).val();
				let descripcion=$(parametro6).val();
				let origen=$(parametro1).attr('idActividadOrigen');
				let destino=$(parametro1).attr('idActividadDestino');

				paqueteDeDatos.append("permitido",permitidos);
				paqueteDeDatos.append("descripcion",descripcion);
				paqueteDeDatos.append("origen",origen);
				paqueteDeDatos.append("destino",destino);

			}

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

					if(mensaje==1){

				       alertify.set("notifier","position", "top-center");
				       alertify.notify("Registro realizado correctamente", "success", 5, function(){});

				       let permitidos=$(parametro5).val();

				       $("#"+parametro7+" option[value='"+permitidos+"']").remove();

				       $(parametro5).val(0);

				       $(parametro6).val(" ");

		            }					

				},
				error:function(){

				}
					
			});					

		});  

	}

});

}


var regresar__informacion__items__restringidos=function(parametro1,parametro2,parametro3,parametro4){

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo',parametro3);
	paqueteDeDatos.append('idOrigen',parametro1);
	paqueteDeDatos.append('idDestino',parametro2);

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

			$(parametro4).html(" ");


			for (z of indicadorInformacion) {

				$(parametro4).append('<tr class="fila__'+z.idActividadModificacion+'"><td>'+z.nombreItem+'</td><td>'+z.descripcion+'</td><td>'+z.funcionario+'</td><td>'+z.fecha+'</td><td>'+z.hora+'</td><td><nav class="btn-pluss-wrapper"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="eliminarInfor'+z.idActividadModificacion+'" name="eliminarInfor'+z.idActividadModificacion+'" idPrincipal="'+z.idActividadModificacion+'" idContador="'+z.idActividadModificacion+'" class="eliminar__ides"><i class="fa fa-trash" aria-hidden="true"></i></a></li></ul></div></nav></td></tr>');

					$("#eliminarInfor"+z.idActividadModificacion).click(function(e) {

						let idContador=$(this).attr('idContador');
						let idPrincipal=$(this).attr('idPrincipal');
										
						funcion__eliminar__general(idPrincipal,'eliminar__restricciones__modificas');

					}); 

			}



		},
		error:function(){

		}

	});		


}


var regresar__informacion__modificacion=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	var paqueteDeDatos = new FormData();

	paqueteDeDatos.append('tipo',parametro1);
	paqueteDeDatos.append('actividadP',parametro2);
	paqueteDeDatos.append('actividadB',parametro3);

	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false, 
		success:function(response){

			let elementos=JSON.parse(response);

			let listas=elementos['listas'];

			$(parametro6).html(listas);


		},
		error:function(){

		}

	});		


}

/*=====  End of Funciones  ======*/

/*=====================================================
=            Guardar modificaciones fechas            =
=====================================================*/

var guardar__informacion__fechas__modificaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	$(parametro1).click(function (e){

		var validador= validacionRegistro(parametro5);
		validacionRegistroMostrarErrores(parametro5);

		$(parametro1).hide();

		if (validador==false) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("Campos obligatorios (tener encuenta que los montos no pueden ser de ejecución 0.00)", "error", 5, function(){});

			$(parametro1).show();			

		}else{

			var paqueteDeDatos = new FormData();

			let fechaInicial=$(parametro2).val();
			let fechaFinal=$(parametro3).val();

			paqueteDeDatos.append('tipo',parametro6);
			paqueteDeDatos.append("fechaI",fechaInicial);
			paqueteDeDatos.append("fechaF",fechaFinal);
			paqueteDeDatos.append("idUsuario",parametro4);

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

					if(mensaje==1){

				       alertify.set("notifier","position", "top-center");
				       alertify.notify("Registro realizado correctamente", "success", 5, function(){});

						window.setTimeout(function(){ 

							location.reload();

						} ,5000); 

						$(parametro1).hide();


		            }					


				},
				error:function(){

				}

			});		

		}

	});	

}

/*=====  End of Guardar modificaciones fechas  ======*/

var selector__actividades____modificas=function(parametro1){

	indicador=1035;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(" ");

	  $(parametro1).html(listar__lugar);

	}).fail(function(){

	  

	});


}



var selector__actividades__items__modificas=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function (e){

		indicador=1034;

		let actividad__origen__modificaciones=$("#actividad__origen__modificaciones").val();

		$.ajax({

		  data: {indicador:indicador,idActividad:parametro2,actividad__origen__modificaciones:actividad__origen__modificaciones},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

		  $(parametro3).html(" ");

		  if($(parametro1).val()==0){

		  	$(parametro3).html(" ");

		  }else{

		  	$(parametro3).html(listar__lugar);

		  }

		}).fail(function(){

		  

		});

	});


}
