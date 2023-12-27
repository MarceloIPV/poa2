
/*==================================
=            Selectores            =
==================================*/
var sueldos__salarios = function (parametro1, parametro2) {

	indicador = 56;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}


var actividades__selector = function (parametro1, parametro2) {

	indicador = 51;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}

var items__selector__dos = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		indicador = 52;

		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones").val();

		$.ajax({

			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			if (listar__lugar == false) {

				$("#actividad__modificaciones__destino").val("0");

				alertify.set("notifier", "position", "top-center");
				alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

			} else {

				$(parametro2).html(listar__lugar);

			}

		}).fail(function () {



		});


	});


}


var items__selector__tres__destino__sueldos = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		indicador = 53001;

		idProgrmacionFinanciera = $(this).val();

		actividadOrigen = $("#actividad__modificaciones").val();

		actividad__modificaciones__destino = $("#actividad__modificaciones__destino").val();

		let mesOrigen__enviado = $("#mesesSeleccionables").val();


		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera: idProgrmacionFinanciera, indicador: indicador, actividadOrigen: actividadOrigen, clave: parametro5, actividad__modificaciones__destino: actividad__modificaciones__destino, mesOrigen__enviado: mesOrigen__enviado },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			if (listar__lugar == false) {

				$("#item__modificaciones__destino").val("0");

				$("#item__modificaciones__destino__new").val("0");
				alertify.set("notifier", "position", "top-center");
				//alertify.notify("Ítem restringido", "error", 5, function () { });

				//$("#mesesSeleccionables__destino").html(" ");

			} else {

				$(parametro2).html(listar__lugar);

			}


		}).fail(function () {



		});

	});


	$(parametro1).change(function () {

		indicador = 54;

		idProgrmacionFinanciera = $(this).val();

		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera: idProgrmacionFinanciera, indicador: indicador },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$(parametro3).val(listar__lugar);


		}).fail(function () {



		});

	});

}

var items__selector__tres = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		indicador = 53;

		idProgrmacionFinanciera = $(this).val();

		actividadOrigen = $("#actividad__modificaciones").val();

		actividad__modificaciones__destino = $("#actividad__modificaciones__destino").val();

		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera: idProgrmacionFinanciera, indicador: indicador, actividadOrigen: actividadOrigen, clave: parametro5, actividad__modificaciones__destino: actividad__modificaciones__destino },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			if (listar__lugar == false) {

				$("#item__modificaciones__destino").val("0");

				alertify.set("notifier", "position", "top-center");
				alertify.notify("Ítem restringido", "error", 5, function () { });

				$("#mesesSeleccionables__destino").html(" ");

			} else {

				$(parametro2).html(listar__lugar);

			}


		}).fail(function () {



		});

	});


	$(parametro1).change(function () {

		indicador = 54;

		idProgrmacionFinanciera = $(this).val();

		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera: idProgrmacionFinanciera, indicador: indicador },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$(parametro3).val(listar__lugar);


		}).fail(function () {



		});

	});

}


var items__selector__cuatro = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		indicador = 55;

		mes = $(this).val();
		programacionFinanciera = $(parametro3).val();
		let mesOrigenes = $("#mesesSeleccionables").val();

		$.ajax({

			data: { programacionFinanciera: programacionFinanciera, mes: mes, indicador: indicador, mesOrigenes: mesOrigenes, indicadorClave: parametro5 },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$(parametro2).val(listar__lugar);

			$(".tabla__destino__necesaria").show();

			if (parametro5 == true) {

				let sumador = 0;

				$("#disminucion__seleccionados__destino").val($("#disminucion__seleccionados").val());

				sumador = parseFloat($("#disminucion__seleccionados__destino").val()) + parseFloat($("#monto__seleccionados__destino").val());

				$("#total__disminucion__destino").val(sumador.toFixed(2));


			}


		}).fail(function () {



		});

	});

}

var deportes__function = function (parametro1) {

	indicador = 21;

	$.ajax({

		data: { indicador: indicador },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}

var provincias__function = function (parametro1) {

	indicador = 1;

	$.ajax({

		data: { indicador: indicador },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}



/*=====  End of Selectores  ======*/


/*===========================================================
=            Sacando monto en base a porcentajes            =
===========================================================*/

var monto__porcentajesD = function (parametro1, parametro2, parametro3) {

	let porcentajes = 0;
	porcentajes = (parseFloat($(parametro1).val()) / parseFloat($(parametro2).val())) * 100;

	$(parametro3).val(porcentajes);

}


/*=====  End of Sacando monto en base a porcentajes  ======*/


/*=============================================
=            Funciones retornables            =
=============================================*/

function validacionRegistro(parametro1) {

	var sumadorErrores = 0;

	$(parametro1).each(function (index) {

		if ($(this).val() == "") {
			sumadorErrores++;
		}

	});

	if (sumadorErrores == 0) {
		return true;
	} else {
		return false;
	}

}

var validacionRegistroMostrarErrores = function (parametro1) {

	var sumadorErrores = 0;

	$(parametro1).each(function (index) {

		if ($(this).val() == "") {
			$(this).addClass('error');
		} else {
			$(this).removeClass('error');
		}

	});

}

var funcion__solo__numero = function (parametro1) {

	$(parametro1).on('input', function () {

		this.value = this.value.replace(/[^0-9]/g, '');

	});

}

var funcion__solo__numero__montos = function (parametro1) {

	$(parametro1).keypress(function (event) {

		var $this = $(this);

		if ((event.which != 46 || $this.val().indexOf('.') != -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
			event.preventDefault();
		}

		var text = $(this).val();

		if ((event.which == 46) && (text.indexOf('.') == -1)) {

			setTimeout(function () {

				if ($this.val().substring($this.val().indexOf('.')).length > 3) {

					$this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
				}

			}, 1);
		}

		if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2)) {
			event.preventDefault();
		}

	});

	$(parametro1).on('input', function () {

		this.value = this.value.replace(/[^0-9,.]/g, '').replace(',', '.');

	});

}

var funcion__cambio__de__numero = function (parametro1) {

	$(parametro1).on('click', function () {

		if ($(this).val() == "0") {

			$(this).val(" ");

		}

	});

	$(parametro1).on('blur', function () {

		if ($(this).val() == " " || $(this).val() == "") {

			$(this).val("0");

		}

	});

}

/*===========================================
=            Creación de modales            =
===========================================*/

var funcion__creando__modal = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11, parametro12, parametro13, parametro14) {

	/*=====================================
	=            Creando modal            =
	=====================================*/

	$(parametro1).append("<div class='modal fade modal__ItemsGrup' id='" + parametro2 + "' aria-hidden='true'><div class='modal-dialog'><form class='modal-content formulario__seguimiento__totales'><div class='modal-header row'> <div class='col col-11 text-center'> <h5 class='modal-title'>" + parametro3 + "</h5> </div> <div class='col col-1'> <button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button></div></div><div class='modal-body row'><div class='col col-4'>Planificado " + parametro4 + " trimestre</div><div class='col col-8'><input type='text' id='" + parametro6[0] + "' class='ancho__total__input sumador__item__" + parametro5 + "' readonly='' style='color:#616161;border:1px solid #EEEEEE!important;'/></div><div class='col col-4'>Programado " + parametro4 + " trimestre</div><div class='col col-8'><input type='text' id='" + parametro6[1] + "' class='ancho__total__input sumador__item__" + parametro5 + " solo__numero__montos'/></div><div class='col col-4'>Ejecutado " + parametro4 + " trimestre</div><div class='col col-8'><input type='text' id='" + parametro6[2] + "' class='ancho__total__input sumador__item__" + parametro5 + "' readonly=''style='color:#616161;border:1px solid #EEEEEE!important;'/></div><div class='col col-4'>Porcentaje de avance % " + parametro4 + " trimestre</div><div class='col col-8'><input type='text' id='" + parametro6[3] + "' class='ancho__total__input sumador__item__" + parametro5 + "' readonly='' style='color:#616161;border:1px solid #EEEEEE!important;'/></div><div class='col col-12 text-center'><a class='btn btn-primary' id=" + parametro8 + " idContador='" + parametro5 + "'><i class='fa fa-floppy-o' aria-hidden='true'></i></a></div></div></form></div></div>");

	/*=====  End of Creando modal  ======*/


	$(parametro11).on('click', function () {

		var paqueteDeDatos = new FormData();

		let idOrganismo = $("#organismoIdPrin").val();

		paqueteDeDatos.append("tipo", "selecciona__separados__contenedores__de__items");
		paqueteDeDatos.append("item", parametro12);
		paqueteDeDatos.append("idOrganismo", idOrganismo);
		paqueteDeDatos.append("trimestreEvaluador", parametro13);
		paqueteDeDatos.append("idActividad", parametro14);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				let elementos = JSON.parse(response);

				let variable__asignados = elementos['variable__asignados'];
				let programados = elementos['programados'];
				let porcentaje = elementos['porcentaje'];

				/*====================================
				=            Asignaciones            =
				====================================*/

				funcion__solo__numero__montos($(".solo__numero__montos"));

				funcion__cambio__de__numero($("#" + parametro6[1]));


				$("#" + parametro6[0]).val(parseFloat(parametro7[0]).toFixed(2));


				if (programados != "" && programados != null && programados != undefined) {

					$("#" + parametro6[1]).val(parseFloat(programados).toFixed(2));

				} else {

					$("#" + parametro6[1]).val(parseFloat(parametro7[0]).toFixed(2));

				}

				if (isNaN(variable__asignados)) {

					$("#" + parametro6[2]).val(0);

				} else {

					$("#" + parametro6[2]).val(parseFloat(variable__asignados).toFixed(2));

				}


				if (porcentaje != "" && porcentaje != null && porcentaje != undefined) {

					$("#" + parametro6[3]).val(porcentaje);

				} else {

					$("#" + parametro6[3]).val(porcentaje);

				}


				/*=====  End of Asignaciones  ======*/


				/*==============================================
				=            Porcentajes calculados            =
				==============================================*/

				$("#" + parametro6[1]).on('input', function () {

					if (parseFloat($(this).val()) > parseFloat(parametro10) && 8>9) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("No puede ser mayor al monto total del ítem que es " + parametro10, "error", 5, function () { });

						$(this).val(0);

					} else {

						let porcentajes = 0;

						porcentajes = (parseFloat($("#" + parametro6[2]).val()) / parseFloat($("#" + parametro6[1]).val())) * 100;

						porcentajes = parseInt(porcentajes, 10);

						$("#" + parametro6[3]).val(porcentajes);


						if (porcentajes >= 85) {
							$("#" + parametro6[3]).attr('style', 'background:green; color:black;');
						} else if (porcentajes >= 70 && porcentajes < 85) {
							$("#" + parametro6[3]).attr('style', 'background:yellow; color:black;');
						} else if (porcentajes < 70) {
							$("#" + parametro6[3]).attr('style', 'background:red; color:black;');
						}


					}


				});

				/*=====  End of Porcentajes calculados  ======*/

				/*======================================
				=            Auto ejecución            =
				======================================*/

				let porcentajes = 0;

				porcentajes = (parseFloat($("#" + parametro6[2]).val()) / parseFloat($("#" + parametro6[1]).val())) * 100;

				porcentajes = parseInt(porcentajes, 10);

				if (isNaN(porcentajes)) {
					$("#" + parametro6[3]).val(0);
				} else {
					$("#" + parametro6[3]).val(porcentajes);
				}




				if (porcentajes >= 85) {
					$("#" + parametro6[3]).attr('style', 'background:green; color:black;');
				} else if (porcentajes >= 70 && porcentajes < 85) {
					$("#" + parametro6[3]).attr('style', 'background:yellow; color:black;');
				} else if (porcentajes < 70) {
					$("#" + parametro6[3]).attr('style', 'background:red; color:black;');
				}

				/*=====  End of Auto ejecución  ======*/


				/*===============================
				=            Guardar            =
				===============================*/

				$("#" + parametro8).click(function (e) {

					let idContador = $(this).attr('idContador');

					funcion__guardado__matricez($("#" + parametro8), $(".obligatorios"), [idContador, $("#organismoIdPrin").val(), parametro9, $("#" + parametro6[1]).val(), $("#" + parametro6[3]).val(), parametro12, $("#" + parametro6[0]).val(), $("#" + parametro6[2]).val(), parametro14], false, false, false, false, "enviar__programaciones__seguimientos");


				});

				/*=====  End of Guardar  ======*/

			},
			error: function () {

			}

		});

	});

}

/*=====  End of Creación de modales  ======*/


var funcion_porcentajes__colores__montos = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9) {

	$(parametro1).on('input', function () {

		let porcentajes = 0;

		$(parametro4).text(' ');

		porcentajes = (parseFloat($(parametro1).val()) / parseFloat(parametro2)) * 100;

		if (parseFloat(parametro2) == 0) {

			$(parametro4).text(" ");

		} else if (parseFloat($(parametro1).val()) <= parseFloat(parametro5) || 5<6) {

			if (parseInt(porcentajes, 10) >= 85) {
				$(parametro6).attr('style', 'background:green; color:black;');
			} else if (parseInt(porcentajes, 10) >= 70 && parseInt(porcentajes, 10) < 85) {
				$(parametro6).attr('style', 'background:yellow; color:black;');
			} else if (parseInt(porcentajes, 10) < 70) {
				$(parametro6).attr('style', 'background:red; color:black;');
			}

			$(parametro4).text(parseInt(porcentajes, 10) + "%");

		} else {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("No puede ser mayor al monto total que es " + parametro5, "error", 5, function () { });
			$(parametro6).val(0);
			$(parametro1).val(0);

		}

		let totalidad = $(parametro7).val();

		let totalidadRe = 0;
		totalidadRe = parseFloat($("#mensualEjecutado" + parametro8).val()) + parseFloat($("#mensualEjecutado__2" + parametro8).val()) + parseFloat($("#mensualEjecutado__3" + parametro8).val());


		let restadorRe = 0;
		restadorRe = parseFloat(totalidad) - parseFloat(totalidadRe);

		if (parseFloat(restadorRe) < 0 && 6>9) {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("La cantidad no puede ser mayor a la cantidad restante", "error", 5, function () { });

			$(this).val(0);

		} else {

			$(parametro9).val(parseFloat(restadorRe).toFixed(2));

		}


	});

}

var funcion_porcentajes__fechas__porcentajes = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		let porcentajes = 0;

		let fecha1 = $(parametro2).val();
		let fecha2 = $(parametro3).val();

		let fechaInicio = moment(fecha1);
		let fechaFin = moment(fecha2);

		let diferencias = fechaFin.diff(fechaInicio, 'days');

		let fecha1Segundo = $(parametro1).val();
		let fecha2Segundo = $(parametro4).val();

		let fechaInicioSegundo = moment(fecha1Segundo);
		let fechaFinSegundo = moment(fecha2Segundo);

		let diferencias2 = fechaInicioSegundo.diff(fechaFinSegundo, 'days');


		if (diferencias == "0" || diferencias2 == "0") {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("Las fechas planificadas y ejecutadas no deben ser iguales", "error", 5, function () { });

			$(this).val(" ");

		} else {

			porcentajes = (parseFloat(diferencias2) / parseFloat(diferencias)) * 100;

			porcentajes = parseInt(porcentajes, 10);

			if (parseInt(porcentajes, 10) >= 85) {
				$(parametro5).attr('style', 'background:green; color:black;');
			} else if (parseInt(porcentajes, 10) >= 70 && parseInt(porcentajes, 10) < 85) {
				$(parametro5).attr('style', 'background:yellow; color:black;');
			} else if (parseInt(porcentajes, 10) < 70) {
				$(parametro5).attr('style', 'background:red; color:black;');
			}

			$(parametro5).val(porcentajes);

		}

	});

}


var funcion_porcentajes__fechas = function (parametro1, parametro2) {

	$(parametro2).change(function () {

		let fecha1 = $(parametro1).val();
		let fecha2 = $(parametro2).val();

		let fechaInicio = moment(fecha1);
		let fechaFin = moment(fecha2);


		if (fechaFin < fechaInicio) {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("La fecha ingresada no debe ser menor a la fecha inicial planificada", "error", 5, function () { });

			$(this).val(" ");

		}


	});

}


var funcion_porcentajes__colores = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6) {

	$(parametro1).on('input', function () {

		let porcentajes = 0;

		$(parametro4).text(' ');

		porcentajes = (parseFloat($(parametro1).val()) / parseFloat(parametro2)) * 100;

		if (porcentajes == NaN) {

			$(parametro4).text(" ");

		} else if (parseFloat($(parametro1).val()) <= parseFloat(parametro5) || parametro6 == 1 || 5<6) {

			if (parseInt(porcentajes, 10) >= 85) {
				$(parametro3).attr('style', 'background:green; color:black;');
			} else if (parseInt(porcentajes, 10) >= 70 && parseInt(porcentajes, 10) < 85) {
				$(parametro3).attr('style', 'background:yellow; color:black;');
			} else if (parseInt(porcentajes, 10) < 70) {
				$(parametro3).attr('style', 'background:red; color:black;');
			}

			$(parametro4).text(parseInt(porcentajes, 10) + "%");

		} else {

			$(parametro1).val(0);
			alertify.set("notifier", "position", "top-center");
			alertify.notify("No puede ser mayor al monto total que es " + parametro5, "error", 5, function () { });


		}



	});

}

var funcion_porcentajes__colores__auto__ejecutables = function (parametro1, parametro2, parametro3, parametro4) {

	let porcentajes = 0;

	$(parametro4).text(' ');

	porcentajes = (parseFloat($(parametro1).val()) / parseFloat(parametro2)) * 100;

	if (porcentajes == NaN) {

		$(parametro4).text(" ");

	} else if (parseInt(porcentajes, 10) >= 85) {
		$(parametro3).attr('style', 'background:green; color:black;');
	} else if (parseInt(porcentajes, 10) >= 70 && parseInt(porcentajes, 10) < 85) {
		$(parametro3).attr('style', 'background:yellow; color:black;');
	} else if (parseInt(porcentajes, 10) < 70) {
		$(parametro3).attr('style', 'background:red; color:black;');
	}

	$(parametro4).text(parseInt(porcentajes, 10) + "%");

}


/*=====  End of Funciones retornables  ======*/

/*===============================
=            Agregar            =
===============================*/

var funcion__agregarFilas = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).append('<tr class="fila__' + parametro5 + parametro3 + parametro4 + '"></tr>');

	for (let i = 0; i < parametro2.length; i++) {
		$(".fila__" + parametro5 + parametro3 + parametro4).append(parametro2[i]);
	}

}

var funcion__eliminarFilas = function (parametro1) {

	$(parametro1).remove();

}

/*=====  End of Agregar  ======*/

/*==============================================
=            Sumar sin alternativas            =
==============================================*/


var funcion__sumador__real__sn__n = function (parametro1, parametro2, parametro3, parametro4) {

	let sum = 0;
	let porcentajes = 0;

	$(parametro1).each(function () {

		sum += parseFloat($(this).val());

	});

	$(parametro2).val(parseFloat(sum).toFixed(2));

	porcentajes = (parseFloat($(parametro2).val()) / parseFloat($(parametro3).val())) * 100;

	$(parametro4).val(parseInt(porcentajes, 10));

}



var funcion__sumador__real__sn = function (parametro1, parametro2, parametro3, parametro4) {


	$(parametro1).on('input', function () {

		let sum = 0;
		let porcentajes = 0;

		$(parametro1).each(function () {

			sum += parseFloat($(this).val());

		});

		$(parametro2).val(parseFloat(sum).toFixed(2));



		porcentajes = (parseFloat($(parametro2).val()) / parseFloat($(parametro3).val())) * 100;

		$(parametro4).val(parseFloat(porcentajes).toFixed(2));


	});

}


/*=====  End of Sumar sin alternativas  ======*/


/*==================================
=            Sumar real            =
==================================*/

var funcion__sumador__real = function (parametro1, parametro2, parametro3) {

	$(parametro1).on('input', function () {

		let sum = 0;

		$(parametro3).each(function () {

			sum += parseFloat($(this).val());

		});

		$(parametro2).val(sum.toFixed(2));


	});

}


/*=====  End of Sumar real  ======*/


/*=============================
=            Sumar            =
=============================*/

var funcion__sumador__eventos = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6) {

	$(parametro1).on('input', function () {

		let sum = 0;
		let sumadorE = 0;

		$(parametro3).each(function () {

			sum += parseFloat($(this).val());

		});

		$(parametro2).val(sum.toFixed(2));

		let totalidad = $(parametro4).val();

		let totalidadRe = 0;
		totalidadRe = parseFloat($("#mensualEjecutado" + parametro5).val()) + parseFloat($("#mensualEjecutado__2" + parametro5).val()) + parseFloat($("#mensualEjecutado__3" + parametro5).val());

		let restadorRe = 0;
		restadorRe = parseFloat(totalidad) - parseFloat(totalidadRe);

		if (parseFloat(restadorRe) < 0 && 6>9) {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("La cantidad no puede ser mayor a la cantidad restante", "error", 5, function () { });

			$(this).val(0);

		} else {

			$(parametro6).val(parseFloat(restadorRe).toFixed(2));

		}


	});

}

/*=====  End of Sumar  ======*/


/*==================================
=            Acordiones            =
==================================*/

var acordion__general = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8) {

	let rotulos = new Array();

	$(parametro7).html(' ');

	if (parametro2 == "primerTrimestre") {
		rotulos = ['Enero', 'Febrero', 'Marzo'];
	} else if (parametro2 == "segundoTrimestre") {
		rotulos = ['Abril', 'Mayo', 'Junio'];
	} else if (parametro2 == "tercerTrimestre") {
		rotulos = ['Julio', 'Agosto', 'Septiembre'];
	} else if (parametro2 == "cuartoTrimestre") {
		rotulos = ['Octubre', 'Noviembre', 'Diciembre'];
	}

	if (parametro8 == 0) {

		$(parametro1).append('<div class="col col-12 contenedor__navasrotulo contenedor__general__total"><ul class="nav nav-tabs nav-tabs-dropdown" id="myTab" role="tablist"><li class="nav-item bases__rotulo"><a aria-controls="rotulo" aria-selected="true" class="nav-link active show" data-toggle="tab" href="#rotulo" id="rotulo-tab" role="tab">Ejecución</a></li></ul><div class="tab-content py-4 bg-white" id="myTabContent"> <div aria-labelledby="rotulo-tab" class="container tab-pane fade active show" id="rotulo" role="tabpanel"></div></div>');

		$("#rotulo").append(parametro4);


	} else {

		$(parametro1).append('<div class="col col-12 contenedor__navas' + rotulos[0] + ' contenedor__general__total"><ul class="nav nav-tabs nav-tabs-dropdown" id="myTab" role="tablist"><li class="nav-item bases__' + rotulos[0] + '"><a aria-controls="' + rotulos[0] + '" aria-selected="true" class="nav-link active show" data-toggle="tab" href="#' + rotulos[0] + '" id="' + rotulos[0] + '-tab" role="tab">' + rotulos[0] + '</a></li><li class="nav-item"><a aria-controls="' + rotulos[1] + '" aria-selected="false" class="nav-link" data-toggle="tab" href="#' + rotulos[1] + '" id="' + rotulos[1] + '-tab" role="tab">' + rotulos[1] + '</a></li><li class="nav-item"><a aria-controls="' + rotulos[2] + '" aria-selected="false" class="nav-link" data-toggle="tab" href="#' + rotulos[2] + '" id="' + rotulos[2] + '-tab" role="tab">' + rotulos[2] + '</a></li></ul><div class="tab-content py-4 bg-white" id="myTabContent"> <div aria-labelledby="' + rotulos[0] + '-tab" class="container tab-pane fade active show" id="' + rotulos[0] + '" role="tabpanel"></div><div aria-labelledby="' + rotulos[1] + '-tab" class="container tab-pane fade" id="' + rotulos[1] + '" role="tabpanel"></div><div aria-labelledby="' + rotulos[2] + '-tab" class="container tab-pane fade" id="' + rotulos[2] + '" role="tabpanel"></div></div>');

		$("#" + rotulos[0]).append(parametro4);
		$("#" + rotulos[1]).append(parametro5);
		$("#" + rotulos[2]).append(parametro6);

	}


	/*==========================================
	=            Acordion activados            =
	==========================================*/
	//open and close tab menu
	$('.nav-tabs-dropdown')
		.on("click", "li:not('.active') a", function (event) {
			$(this).closest('ul').removeClass("open");
		})
		.on("click", "li.active a", function (event) {
			$(this).closest('ul').toggleClass("open");
		});


	/*=====  End of Acordion activados  ======*/


}

/*=====  End of Acordiones  ======*/

/*====================================================
=            Funciones guardados mátrices            =
====================================================*/

var funcion__guardado__matricez = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8, parametro9, parametro10, parametro11, parametro12, parametro13, parametro14, parametro15) {

	// $(parametro1).click(function(e) {

	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro8);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro3));


			if (parametro8 == "honorarios__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);
				paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
				paqueteDeDatos.append('archivo4', $(parametro7)[0].files[0]);

			}


			if (parametro8 == "administrativos__seguimientos") {

				paqueteDeDatos.append('archivo1', $(parametro4)[0].files[0]);
				paqueteDeDatos.append('archivo2', $(parametro5)[0].files[0]);

			}

			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					let elementos = JSON.parse(response);

					let mensaje = elementos['mensaje'];

					$(parametro13).remove();

					$(parametro14).remove();


					if (parametro3[12] == "Marzo" || parametro3[12] == "Junio" || parametro3[12] == "Septiembre" || parametro3[12] == "Diciembre" || parametro3[4] == "Marzo" || parametro3[4] == "Junio" || parametro3[4] == "Septiembre" || parametro3[4] == "Diciembre" || parametro15 == true) {

						$("#contadorIndicador").val(0);
						$("#contadorIndicador2").val(0);

						$(".modal__ItemsGrup").modal('hide');//ocultamos el modal
						$('.modal-backdrop').remove();//eliminamos el backdrop del modal

					}

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente escoger la siguiente pestaña", "success", 10, function () { });


					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}

	// });

}

/*=====  End of Funciones guardados mátrices  ======*/


/*==========================================
=            Guardado separados            =
==========================================*/

var funcion__agregar__filas__2 = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {


	var validador = validacionRegistro($(parametro3));
	validacionRegistroMostrarErrores($(parametro3));

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro4);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro2));

			if (parametro7 != false) {

				paqueteDeDatos.append('archivo1', $(parametro7)[0].files[0]);

			}

			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];


					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 10, function () { });

					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}

}



var funcion__agregar__filas = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {


	var validador = validacionRegistro($(parametro3));
	validacionRegistroMostrarErrores($(parametro3));

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar los información ingresada?', '¿Está seguro de guardar los información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {


			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro4);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro2));

			paqueteDeDatos.append('archivo1', $(parametro7)[0].files[0]);

			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];


					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 10, function () { });

						$("." + parametro5 + parametro6).hide();


					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}

}


/*=====  End of Guardado separados  ======*/


/*==============================================
=            Funciones de guardados            =
==============================================*/

var funcion__guardado__general = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7) {

	// $(parametro1).click(function(e) {

	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);

	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro5);

			paqueteDeDatos.append("prametros", JSON.stringify(parametro3));

			if (parametro4 != false) {
				paqueteDeDatos.append('archivo', $(parametro4)[0].files[0]);
			}

			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro realizado correctamente", "success", 5, function () { });

						$(parametro6).remove();
						$(parametro7).hide();

					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}

	// });

}


/*=====  End of Funciones de guardados  ======*/

/*==============================================
=            Funciones de ediciones            =
==============================================*/

var funcion__editar__general = function (parametro1, parametro2, parametro3, parametro4, parametro5, parametro6, parametro7, parametro8) {


	var validador = validacionRegistro(parametro2);
	validacionRegistroMostrarErrores(parametro2);


	if (validador == false) {

		alertify.set("notifier", "position", "top-center");
		alertify.notify("Campos obligatorios", "error", 5, function () { });

		$(parametro1).show();

	} else {

		var confirm = alertify.confirm('¿Está seguro de guardar la información ingresada?', '¿Está seguro de guardar la información ingresada?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

		confirm.set({ transition: 'slide' });

		confirm.set('onok', function () {

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append("tipo", parametro3);

			paqueteDeDatos.append("parametros", JSON.stringify(parametro4));

			if (parametro3 == "editar__indicadores") {

				if ($(parametro5).val() != "" && $(parametro5).val() != undefined) {
					paqueteDeDatos.append('archivo', $(parametro5)[0].files[0]);
					paqueteDeDatos.append('archivo2', 'si');
				} else {
					paqueteDeDatos.append('archivo2', 'no');
				}

			}


			if (parametro3 == "editar__honorarios") {


				if ($(parametro5).val() != "" && $(parametro5).val() != undefined) {
					paqueteDeDatos.append('archivo', $(parametro5)[0].files[0]);
					paqueteDeDatos.append('archivo2', 'si');
				} else {
					paqueteDeDatos.append('archivo2', 'no');
				}



				if ($(parametro6).val() != "" && $(parametro6).val() != undefined) {
					paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
					paqueteDeDatos.append('archivo4', 'si');
				} else {
					paqueteDeDatos.append('archivo4', 'no');
				}


				if ($(parametro7).val() != "" && $(parametro7).val() != undefined) {
					paqueteDeDatos.append('archivo5', $(parametro7)[0].files[0]);
					paqueteDeDatos.append('archivo6', 'si');
				} else {
					paqueteDeDatos.append('archivo6', 'no');
				}


				if ($(parametro8).val() != "" && $(parametro8).val() != undefined) {
					paqueteDeDatos.append('archivo7', $(parametro8)[0].files[0]);
					paqueteDeDatos.append('archivo8', 'si');
				} else {
					paqueteDeDatos.append('archivo8', 'no');
				}

			}



			if (parametro3 == "editar__indicadores") {


				if ($(parametro5).val() != "" && $(parametro5).val() != undefined) {
					paqueteDeDatos.append('archivo', $(parametro5)[0].files[0]);
					paqueteDeDatos.append('archivo2', 'si');
				} else {
					paqueteDeDatos.append('archivo2', 'no');
				}



				if ($(parametro6).val() != "" && $(parametro6).val() != undefined) {
					paqueteDeDatos.append('archivo3', $(parametro6)[0].files[0]);
					paqueteDeDatos.append('archivo4', 'si');
				} else {
					paqueteDeDatos.append('archivo4', 'no');
				}


			}


			$.ajax({

				type: "POST",
				url: "modelosBd/inserta/insertaAcciones.md.php",
				contentType: false,
				data: paqueteDeDatos,
				processData: false,
				cache: false,
				success: function (response) {

					var elementos = JSON.parse(response);

					var mensaje = elementos['mensaje'];

					if (mensaje == 1) {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Registro actualizado correctamente", "success", 5, function () { });

					}

				},
				error: function () {

				}

			});

		});


		confirm.set('oncancel', function () { //callbak al pulsar botón negativo
			alertify.set("notifier", "position", "top-center");
			alertify.notify("Acción cancelada", "error", 1, function () {

				$(parametro1).show();

			});
		});

	}


}


/*=====  End of Funciones de ediciones  ======*/

/*=============================================
=            Funciones de eliminar            =
=============================================*/

var funcion__eliminar__general = function (parametro1, parametro2, parametro3) {

	var confirm = alertify.confirm('¿Está seguro de eliminar el registro?', null, null).set('labels', { ok: 'Confirmar', cancel: 'Cancelar' });

	confirm.set({ transition: 'slide' });

	confirm.set('onok', function () {

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append("tipo", parametro2);

		paqueteDeDatos.append("parametros", parametro1);

		$.ajax({

			type: "POST",
			url: "modelosBd/inserta/eliminaAcciones.md.php",
			contentType: false,
			data: paqueteDeDatos,
			processData: false,
			cache: false,
			success: function (response) {

				var elementos = JSON.parse(response);

				var mensaje = elementos['mensaje'];

				if (mensaje == 1) {

					alertify.set("notifier", "position", "top-center");
					alertify.notify("Registro eliminado correctamente", "success", 5, function () { });

					$(".fila__" + parametro1).remove();
					$(".fila__fac__" + parametro1).remove();
					$(".fila__otros__" + parametro1).remove();
					$(".parametro__filas" + parametro1).remove();
					$(".fila__seguis__administrativos" + parametro1).remove();
					$(".fila__otros__administrativos__" + parametro1).remove();

				}

			},
			error: function () {

			}

		});

	});

	confirm.set('oncancel', function () { //callbak al pulsar botón negativo
		alertify.set("notifier", "position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function () { });
	});

}

/*=====  End of Funciones de eliminar  ======*/
var actividades__selector__modificaciones = function (parametro1, parametro2) {

	indicador = 151;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}

var actividades__selector__modificaciones__destino = function (parametro1, parametro2,parametro3) {

	if (parametro3=="honorarios" || parametro3=="sueldos") {
		indicador = 1026;
	}else{
		indicador = 1014;
	}

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		if (parametro3=="honorarios") {
			$(parametro1).html(listar__lugar);
			$(parametro1).append("<option value='sueldosD'>4.-SUELDOS Y SALARIOS</option>");
		}else if(parametro3=="sueldos"){
			$(parametro1).html(listar__lugar);
			$(parametro1).append("<option value='honorariosD'>4.-HONORARIOS</option>");
		}else{
			$(parametro1).html(listar__lugar);
		}

		

	}).fail(function () { });

}



var items__selector__dos__modificaciones = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		indicador = 1032;

		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones").val();

		$.ajax({

			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			if (listar__lugar == false) {

				$("#actividad__modificaciones__destino").val("0");
				$("#actividad__modificaciones__destino__new").val("0");
				$("#actividad__modificaciones__destino__new2").val("0");

				alertify.set("notifier", "position", "top-center");
				alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

			} else {

				if ($(parametro1).val()==1) {
					$(parametro2).html(listar__lugar);
				}else{
					$(parametro2).html(" ");
				}
				
			}

		}).fail(function () {



		});


	});


}



var actividades__selector__infraestructura = function (parametro1, parametro2) {

	indicador = 152;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}


var actividades__selector__todos = function (parametro1, parametro2) {

	indicador = 153;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}


var eventosEnvio__informacion__items = function (selector, actividad, idOrganismo, item, codigo) {

$(selector).change(function () {

	$(item).html(" ");
	$(codigo).html(" ");
	$(".oculto__tabla__destino").hide();

	if ($("#actividad__modificaciones").val()==2) {

		indicador = 1010;
		$.ajax({
			data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones").val(), indicador: indicador,nombreInfras:$(this).val()},
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {

			$(item).html(listar__lugar);

		}).fail(function () {});

	}

	if ($("#actividad__modificaciones").val()==3 || $("#actividad__modificaciones").val()==5 || $("#actividad__modificaciones").val()==6 || $("#actividad__modificaciones").val()==7) {

		indicador = 1011;
		$.ajax({
			data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones").val(), indicador: indicador,nombreInfras:$(this).val()},
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {

			$(item).html(listar__lugar);

		}).fail(function () {});

	}

});

}


var eventosEnvio__informacion__items__destino = function (selector, actividad, idOrganismo, item, codigo,comparador) {

$(selector).change(function () {

	$(item).html(" ");
	$(codigo).html(" ");

	$(".body__actividadesEs__modificaciones__insertar").html(" ");

	$("#tablaPoaInicial__dos__items").hide();

	$(".formulario__etiquetado__envios__actividad__1").hide();

	if (($("#actividad__modificaciones__destinos").val()==4 && comparador=="sueldos")  || $("#actividad__modificaciones__destinos").val()=="sueldosD") {

		let textos=$('#eventos_intervencion__seleccion option:selected').text();

		if(textos=="vacante" || textos=="VACANTE"){

			$(".formulario__etiquetado__envios").show();

			$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

				segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar__honorarios"),"actividadesPoas__modificaciones",4,"sueldos","modificar",$(selector).val());

			});

			indicador = 1031;

			if ($("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="sueldosD") {
				comparador="sueldos";
			}

			$.ajax({

				data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idHonorariosS:$("#eventos_intervencion__seleccion").val(),identificadorSH:"sueldos",sincrono:$("#actividad__modificaciones__destino__modificaciones2__seleccion").val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'

			}).done(function (listar__lugar) {

				$("#meses2__seleccion").html(listar__lugar);

			}).fail(function () {});

		}else if ($(this).val()=="eventoCrear") {

			$(".formulario__etiquetado__envios").show();

			$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

				segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar__honorarios"),"actividadesPoas__modificaciones",4,"sueldos","crear",$(selector).val());

			});

		}else{

			$(".formulario__etiquetado__envios").hide();

			$(".body__actividadesEs__modificaciones__insertar").html(" ");

			indicador = 1031;

			$.ajax({

				data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idHonorariosS:$("#eventos_intervencion__seleccion").val(),identificadorSH:"sueldos",sincrono:$("#actividad__modificaciones__destino__modificaciones2__seleccion").val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'

			}).done(function (listar__lugar) {

				$("#meses2__seleccion").html(listar__lugar);

			}).fail(function () {});

		}

	}


	if (($("#actividad__modificaciones__destinos").val()==4 && comparador=="honorarios")  || $("#actividad__modificaciones__destinos").val()=="honorariosD") {

		let textos=$('#eventos_intervencion__seleccion option:selected').text();

		if(textos=="vacante" || textos=="VACANTE"){

			$(".formulario__etiquetado__envios").show();

			$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

				segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar__honorarios"),"actividadesPoas__modificaciones",4,"honorarios","modificar",$(selector).val());

			});

			indicador = 1029;
			
			$.ajax({
				data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones__destinos").val(), indicador: indicador,nombreInfras:$(this).val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'
			}).done(function (listar__lugar) {

				$(item).html(listar__lugar);

			}).fail(function () {});

		}else if ($(this).val()=="eventoCrear") {

			$(".formulario__etiquetado__envios").show();

			$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

				segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar__honorarios"),"actividadesPoas__modificaciones",4,"honorarios","crear",$(selector).val());

			});

		}else{

			$(".formulario__etiquetado__envios").hide();

			$(".body__actividadesEs__modificaciones__insertar").html(" ");

			indicador = 1029;
			$.ajax({
				data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones__destinos").val(), indicador: indicador,nombreInfras:$(this).val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'
			}).done(function (listar__lugar) {

				$(item).html(listar__lugar);

			}).fail(function () {});

		}

	}


	if ($("#actividad__modificaciones__destinos").val()==2) {

		if ($(this).val()=="eventoCrear") {

			$(".formulario__etiquetado__envios").show();

			$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

				segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",$("#actividad__modificaciones__destino__modificaciones2__seleccion").val());

			});

		}else{


			$(".body__actividadesEs__modificaciones__insertar").html(" ");

			indicador = 1010;
			$.ajax({
				data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones__destinos").val(), indicador: indicador,nombreInfras:$(this).val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'
			}).done(function (listar__lugar) {

				$(item).html(listar__lugar);

			}).fail(function () {});

			indicador = 1033;
			$.ajax({
				data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones__destinos").val(), indicador: indicador,nombreInfras:$(this).val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'
			}).done(function (listar__lugar) {

				$("#tipoIntervencion").val(listar__lugar);

			}).fail(function () {});

			$(".ocultar__fila__eventos__dos__intervenci").show();



		}

	}

	if ($("#actividad__modificaciones__destinos").val()==3 || $("#actividad__modificaciones__destinos").val()==5 || $("#actividad__modificaciones__destinos").val()==6 || $("#actividad__modificaciones__destinos").val()==7) {

		if ($(this).val()=="eventoCrear") {

			$(".formulario__etiquetado__envios").show();


			$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

				segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",$("#actividad__modificaciones__destino__modificaciones2__seleccion").val());

			});

		}else{

			$(".formulario__etiquetado__envios").hide();

			$(".body__actividadesEs__modificaciones__insertar").html(" ");

			indicador = 1011;
			$.ajax({
				data: { idOrganismo: idOrganismo, idActividad: $("#actividad__modificaciones__destinos").val(), indicador: indicador,nombreInfras:$(this).val()},
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'
			}).done(function (listar__lugar) {

				$(item).html(listar__lugar);

			}).fail(function () {});

		}

	}

});

}

var item_presupuestario_o__meses__autocompletados = function (selector, meses,idOrganismo) {

$(selector).change(function () {

	idActividad = $(this).val();

	indicador = 1012;

	$(".oculto__tabla__destino").hide();

	$.ajax({

		data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idActividad:$("#actividad__modificaciones__destino__modificaciones2_o").val()},
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(meses).html(listar__lugar);

	}).fail(function () {});


	indicador = 1017;
	$.ajax({

		data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idActividad:$("#actividad__modificaciones__destino__modificaciones2_o").val()},
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$("#codigo__presupuestarios__destino__new2_o").val(listar__lugar);

	}).fail(function () {});


	if ($("#actividad__modificaciones__destino__modificaciones2_o").val()!=2) {

		$("#actividad__modificaciones__destino__modificaciones2__seleccion option[value='2']").hide();

	}else{

		$("#actividad__modificaciones__destino__modificaciones2__seleccion option[value='2']").show();

	}

});

}

var item_presupuestario_o__meses__autocompletados__destino = function (selector, meses,idOrganismo,parametro4) {

$(selector).change(function () {

	idActividad = $(this).val();

	let selectables = $('#item__modificaciones__destino__modificaciones2__seleccion option:selected').attr('attr__1');


	if ((parametro4=="honorarios" || parametro4=="sueldos") && ($("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="4" || $("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="honorariosD" || $("#actividad__modificaciones__destino__modificaciones2__seleccion").val()=="sueldosD")) {

		indicador = 1030;

		$.ajax({

			data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idHonorariosS:$("#eventos_intervencion__seleccion").val(),identificadorSH:parametro4,sincrono:$("#actividad__modificaciones__destino__modificaciones2__seleccion").val()},
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$(meses).html(listar__lugar);

		}).fail(function () {});

		indicador = 1017;
		$.ajax({

			data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idActividad:$("#actividad__modificaciones__destinos").val()},
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$("#codigo__presupuestarios__destino__new2__seleccion").val(listar__lugar);

		}).fail(function () {});


	}else if (selectables=='modifica__actividad__1') {

		$(".formulario__etiquetado__envios").hide();

		$("#tablaPoaInicial__dos__items").show();

		$(".formulario__etiquetado__envios__actividad__1").show();

		$.getScript("layout/scripts/js/modificacion/modificacionEdicionInsercion.js",function(){

			segmentosJsAjax($(".body__actividadesEs__modificaciones__insertar"),"actividadesPoas__modificaciones",$("#actividad__modificaciones__destino__modificaciones2__seleccion").val());

		});

		$("#codigo__presupuestarios__destino__new2__seleccion").val(" ");
		$("#meses2__seleccion").html(" ");

	}else{

		$(".formulario__etiquetado__envios").hide();

		$("#tablaPoaInicial__dos__items").hide();

		$(".formulario__etiquetado__envios__actividad__1").hide();


		indicador = 1016;

		$.ajax({

			data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idActividad:$("#actividad__modificaciones__destinos").val()},
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$(meses).html(listar__lugar);

		}).fail(function () {});

		indicador = 1017;
		$.ajax({

			data: {idOrganismo: idOrganismo, indicador: indicador, item:$(this).val(),idActividad:$("#actividad__modificaciones__destinos").val()},
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$("#codigo__presupuestarios__destino__new2__seleccion").val(listar__lugar);

		}).fail(function () {});

	}

});

}

var meses__destinoPresupuestos = function (selector,idOrganismo) {

$(selector).change(function () {

	let sumador=0;

	let idProgrmacionFinanciera = $('#meses2__seleccion option:selected').attr('attr');
	let mes = $('#meses2__seleccion option:selected').attr('attr2');
	let valor = $('#meses2__seleccion option:selected').attr('value');
	let valorOrigen=$("#totalOrigen").val();
	$("#monto__seleccionados__destino__new2").val(valor);
	sumador=parseFloat(valor)+parseFloat(valorOrigen);
	$("#montoAsignadoDestino1").val(sumador);

});
}

var items__selector__dos__eventosIntervenciones = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

$(parametro1).change(function () {

	idActividad = $(this).val();

	$(parametro2).html(" ");

	$("#codigo__presupuestarios__destino__new2_o").val(" ");

	$("#codigo__presupuestarios__destino__new2_o").html(" ");

	$("#meses2_o").html(" ");

	$("#actividad__modificaciones").val(idActividad);

	$("#eventos_intervencion_o").html(" ");

	$(".ocultar__fila__eventos").hide();

	$(".oculto__tabla__destino").hide();

	if (idActividad == 3 || idActividad == 5 || idActividad == 6 || idActividad == 7) {

		indicador = 200;
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones").val();
		console.log(parametro3);
		console.log(idActividad);
		$.ajax({

			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			if (listar__lugar!=undefined && listar__lugar!=null && listar__lugar!="" && listar__lugar!=" ") {
				$(parametro2).html(listar__lugar);
				$(".ocultar__fila__eventos").show();
				$(".texto__columna__eventos").text("Eventos/ Intervención");
			}else{
				alertify.set("notifier", "position", "top-center");
				alertify.notify("No existen eventos para esta actividad", "error", 5, function () { });
			}
			
		}).fail(function () {});
	}


	if (idActividad == 2) {

		indicador = 201;
		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones").val();
		console.log(parametro3);
		console.log(idActividad);
		$.ajax({
			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {
			$(parametro2).html(listar__lugar);
			$(".ocultar__fila__eventos").show();
			$(".texto__columna__eventos").text("Infraestructura");
		}).fail(function () {});
	}

	if (idActividad == 1) {
		$("#eventos_intervencion").val("sin");
		$(".ocultar__fila__eventos").hide();
	}

});

}

var items__selector__dos__eventosIntervenciones__destino = function (parametro1, parametro2, parametro3, parametro4, parametro5,parametro6) {

$(parametro1).change(function () {

	idActividad = $(this).val();

	$(parametro2).html(" ");

	$("#codigo__presupuestarios__destino__new2__seleccion").val(" ");

	$("#codigo__presupuestarios__destino__new2__seleccion").html(" ");

	$("#meses2__seleccion").html(" ");

	$("#actividad__modificaciones__destino__modificaciones2__seleccion").val(idActividad);

	$("#eventos_intervencion__seleccion").html(" ");

	$(".ocultar__fila__eventos__dos").hide();

	$("#item__modificaciones__destino__modificaciones2__seleccion").html(" ");

	$("#actividad__modificaciones__destinos").val(idActividad);

	$(".body__actividadesEs__modificaciones__insertar").html(" ");

	$("#tablaPoaInicial__dos__items").hide();

	$(".formulario__etiquetado__envios__actividad__1").hide();

	$(".body__actividadesEs__modificaciones__insertar__honorarios").html(" ");

	if (idActividad == 3 || idActividad == 5 || idActividad == 6 || idActividad == 7) {

		indicador = 1018;
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();
		console.log(parametro3);
		console.log(idActividad);
		$.ajax({

			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			if (listar__lugar!=undefined && listar__lugar!=null && listar__lugar!="" && listar__lugar!=" ") {
				$(parametro2).html(listar__lugar);
				$(".ocultar__fila__eventos__dos").show();
				$(".texto__columna__eventos__dos").text("Eventos/ Intervención");
			}else{
				alertify.set("notifier", "position", "top-center");
				alertify.notify("No existen eventos para esta actividad", "error", 5, function () { });
			}
				
		}).fail(function () {});

	}


	if (idActividad == 2) {

		indicador = 1019;
		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();
		$.ajax({
			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {
			$(parametro2).html(listar__lugar);
			$(".ocultar__fila__eventos__dos").show();
			$(".texto__columna__eventos__dos").text("Infraestructura");
		}).fail(function () {});
	}


	if(idActividad == "sueldosD"){

		indicador = 1028;
		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();
		$.ajax({
			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {
			$(parametro2).html(listar__lugar);
			$(".ocultar__fila__eventos__dos").show();
			$(".texto__columna__eventos__dos").text("Sueldos");
		}).fail(function () {});

		$(".oculto__items__sueldos").hide();

	}else if (idActividad == 4 && parametro6=="honorarios") {

		indicador = 1027;
		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();
		$.ajax({
			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {
			$(parametro2).html(listar__lugar);
			$(".ocultar__fila__eventos__dos").show();
			$(".texto__columna__eventos__dos").text("Honorarios");
		}).fail(function () {});

	}else{
		$(".oculto__items__sueldos").show();
	}

	if(idActividad == "honorariosD"){

		indicador = 1027;
		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();
		$.ajax({
			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {
			$(parametro2).html(listar__lugar);
			$(".ocultar__fila__eventos__dos").show();
			$(".texto__columna__eventos__dos").text("Honorarios");
		}).fail(function () {});

	}else if (idActividad == 4 && parametro6=="sueldos") {

		indicador = 1028;
		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();
		$.ajax({
			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'
		}).done(function (listar__lugar) {
			$(parametro2).html(listar__lugar);
			$(".ocultar__fila__eventos__dos").show();
			$(".texto__columna__eventos__dos").text("Sueldos");
		}).fail(function () {});

		$(".oculto__items__sueldos").hide();
	}else{
		$(".oculto__items__sueldos").show();
	}

	if (idActividad == 1) {

		indicador = 1025;

		idActividad = $(this).val();
		validador = parametro4;
		actividadOrigen = $("#actividad__modificaciones__destinos").val();

		$.ajax({

			data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {

			$("#item__modificaciones__destino__modificaciones2__seleccion").html(listar__lugar);
			$(".ocultar__fila__eventos__dos").hide();

		}).fail(function () {});

	}

});

}


var item_eventos_intervencion1 = function (parametro1, parametro2) {

	indicador = 202;

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}




var item_eventos_intervencion = function (parametro1, parametro2, parametro3, parametro4, parametro5) {

	$(parametro1).change(function () {

		idActividad = $("#actividad__modificaciones__destino__modificaciones2").val();


		if (idActividad == 2) {

			indicador = 203;

			validador = parametro4;
			actividadOrigen = $("#actividad__modificaciones").val();

			eventos_intervencion = $(this).val();

			$.ajax({

				data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen, eventos_intervencion: eventos_intervencion },
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'

			}).done(function (listar__lugar) {

				if (listar__lugar == false) {

					$("#actividad__modificaciones__destino").val("0");
					alertify.set("notifier", "position", "top-center");
					alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

				}else if (actividadOrigen==1){

					$(parametro2).html(listar__lugar);

				}

			}).fail(function () {



			});

		}



		if (idActividad == 3 || idActividad == 5 || idActividad == 6 || idActividad == 7) {

			indicador = 202;

			validador = parametro4;
			actividadOrigen = $("#actividad__modificaciones").val();

			eventos_intervencion = $(this).val();

			$.ajax({

				data: { idOrganismo: parametro3, idActividad: idActividad, indicador: indicador, validador: validador, actividadOrigen: actividadOrigen, eventos_intervencion: eventos_intervencion },
				dataType: 'html',
				type: 'POST',
				url: 'modelosBd/validaciones/selector.modelo.php'

			}).done(function (listar__lugar) {

				if (listar__lugar == false) {

					$("#actividad__modificaciones__destino").val("0");
					alertify.set("notifier", "position", "top-center");
					alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

				} else {

					$(parametro2).html(listar__lugar);

				}

			}).fail(function () {



			});

		}
	});


}







var item_presupuestario = function (parametro1, parametro2, parametro3, parametro4, parametro5) {



	$(parametro1).change(function () {
		idActividadOrigen = $("#actividad__modificaciones__destino__new").val();

		origen1 = $("#actividad__modificaciones__destino__new").val();
		idActividadDestino = $("#actividad__modificaciones__destino__modificaciones2").val();
		itemOrigen = $("#item_origen").val();
		itemDestino = $("#codigo__presupuestarios__destino__new2").val();
		idProgrmacionFinanciera1 = $(this).val();

		if (idActividadOrigen = idActividadDestino && itemOrigen == idProgrmacionFinanciera1) {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("No se puede trasladar valores a la misma actividad e item", "error", 5, function () { });
		}

		$("#codigo__presupuestarios__destino__new2").val(idProgrmacionFinanciera1);

		indicador = 205;
		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera1: idProgrmacionFinanciera1, indicador: indicador, parametro4: parametro4, idActividadOrigen: idActividadOrigen, idActividadDestino: idActividadDestino, origen1: origen1 },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {
			console.log("--*", listar__lugar);

			if (listar__lugar >= 1) {
				$("#actividad__modificaciones__destino__modificaciones2").val("0");
				$("#eventos_intervencion").val("0");
				$("#item__modificaciones__destino__modificaciones2").val("0");
				$("#codigo__presupuestarios__destino__new2").val("0");

				alertify.set("notifier", "position", "top-center");
				alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

			}
			/*
						if (listar__lugar == false) {
			
							$("#actividad__modificaciones__destino").val("0");
							alertify.set("notifier", "position", "top-center");
							alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });
			
						} else {
			
							$(parametro2).html(listar__lugar);
			
						}
			
			
			*/

		}).fail(function () {



		});

	});



}



var item_presupuestario_o = function (parametro1, parametro2, parametro3, parametro4, parametro5) {



	$(parametro1).change(function () {
		idActividadOrigen = $("#actividad__modificaciones__destino__new").val();

		origen1 = $("#actividad__modificaciones__destino__new").val();
		idActividadDestino = $("#actividad__modificaciones__destino__modificaciones2").val();
		itemOrigen = $("#item_origen").val();
		itemDestino = $("#codigo__presupuestarios__destino__new2").val();
		idProgrmacionFinanciera1 = $(this).val();

		if (idActividadOrigen = idActividadDestino && itemOrigen == idProgrmacionFinanciera1) {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("No se puede trasladar valores a la misma actividad e item", "error", 5, function () { });
		}

		$("#codigo__presupuestarios__destino__new2_o").val(idProgrmacionFinanciera1);

		indicador = 205;
		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera1: idProgrmacionFinanciera1, indicador: indicador, parametro4: parametro4, idActividadOrigen: idActividadOrigen, idActividadDestino: idActividadDestino, origen1: origen1 },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {
			console.log("--*", listar__lugar);

			if (listar__lugar >= 1) {
				$("#actividad__modificaciones__destino__modificaciones2").val("0");
				$("#eventos_intervencion").val("0");
				$("#item__modificaciones__destino__modificaciones2").val("0");
				$("#codigo__presupuestarios__destino__new2").val("0");

				alertify.set("notifier", "position", "top-center");
				alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

			}


		}).fail(function () {



		});

	});



}





var item_presupuestario_o_i = function (parametro1, parametro2, parametro3, parametro4, parametro5) {



	$(parametro1).change(function () {
		idActividadOrigen = $("#actividad__modificaciones__destino__new").val();

		origen1 = $("#actividad__modificaciones__destino__new").val();
		idActividadDestino = $("#actividad__modificaciones__destino__modificaciones2").val();
		itemOrigen = $("#item_origen").val();
		itemDestino = $("#codigo__presupuestarios__destino__new2").val();
		idProgrmacionFinanciera1 = $(this).val();

		if (idActividadOrigen = idActividadDestino && itemOrigen == idProgrmacionFinanciera1) {

			alertify.set("notifier", "position", "top-center");
			alertify.notify("No se puede trasladar valores a la misma actividad e item", "error", 5, function () { });
		}

		$("#codigo__presupuestarios__destino__new2_o_i").val(idProgrmacionFinanciera1);

		indicador = 205;
		$.ajax({

			data: { idOrganismo: parametro4, idProgrmacionFinanciera1: idProgrmacionFinanciera1, indicador: indicador, parametro4: parametro4, idActividadOrigen: idActividadOrigen, idActividadDestino: idActividadDestino, origen1: origen1 },
			dataType: 'html',
			type: 'POST',
			url: 'modelosBd/validaciones/selector.modelo.php'

		}).done(function (listar__lugar) {
			console.log("--*", listar__lugar);

			if (listar__lugar >= 1) {
				$("#actividad__modificaciones__destino__modificaciones2").val("0");
				$("#eventos_intervencion").val("0");
				$("#item__modificaciones__destino__modificaciones2").val("0");
				$("#codigo__presupuestarios__destino__new2").val("0");

				alertify.set("notifier", "position", "top-center");
				alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });

			}
			/*
						if (listar__lugar == false) {
			
							$("#actividad__modificaciones__destino").val("0");
							alertify.set("notifier", "position", "top-center");
							alertify.notify("No se puede trasladar valores a esta actividad", "error", 5, function () { });
			
						} else {
			
							$(parametro2).html(listar__lugar);
			
						}
			
			
			*/

		}).fail(function () {



		});

	});



}




var actividades__selector__sueldosSalarios = function (parametro1, parametro2) {

	indicador = 56

	$.ajax({

		data: { indicador: indicador, idOrganismo: parametro2 },
		dataType: 'html',
		type: 'POST',
		url: 'modelosBd/validaciones/selector.modelo.php'

	}).done(function (listar__lugar) {

		$(parametro1).html(listar__lugar);

	}).fail(function () { });

}



var sueldos__y__salarios__asignacion = function (parametro1, parametro2, parametro3) {

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
						$("#diciembre__origen").val(parseFloat(z.noviembre).toFixed(2));
						$("#total__origen").val(parseFloat(z.total).toFixed(2));

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
