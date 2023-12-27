$(document).ready(function () {

/*===============================================
=            Selector con buscadores            =
===============================================*/

$('#organismosSegumiento').select2();

$('#empleado__origen').select2();

$('#eventos_intervencion__seleccion').select2();

$('#eventos_intervencion_o').select2();

$('#persona_sueldos_data').select2();

$('#persona_honorarios_data').select2();

/*=====  End of Selector con buscadores  ======*/


/*============================================
=            Eliminar los errores            =
============================================*/

var celularValidas=function(parametro1){

	$(parametro1).on('input', function (e){

		$(this).removeClass('error');

	});

}
celularValidas($(".campos__obligatorios"));



/*=====  End of Eliminar los errores  ======*/

/*====================================
=            Solo números            =
====================================*/

$(".solo__numero").on('input', function () {

	this.value = this.value.replace(/[^0-9]/g, '');

});


var funcion__solo__numero__montos=function(parametro1){
					
$(parametro1).keypress(function(event) {

var $this = $(this);
										    
if ((event.which != 46 || $this.val().indexOf('.') != -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
	event.preventDefault();
}

var text = $(this).val();

if ((event.which == 46) && (text.indexOf('.') == -1)) {

	setTimeout(function() {
		
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

	this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

});

}

funcion__solo__numero__montos($(".solo__numero__montos"));
funcion__solo__numero__montos($(".enlazados__sumas__de__modificaciones"));
funcion__solo__numero__montos($(".enlazados__desvinculaciones"));


$(".no__especiales").on('input', function () {

	this.value = this.value.replace(/^[^A-Za-z]+$/g, '');

});

/*=====  End of Solo números  ======*/

/*===============================================
=            Validación de célulares            =
===============================================*/

var celularValidas=function(parametro1){

	$(parametro1).click(function(){

		$(this).val('09');

	});


	$(parametro1).keyup(function(e){

	 	if($(this).val().length<=2){

	 		if(e.keyCode == 8){

	 			$(this).val('09');

	 		}

	 	}

	});

}


/*=====  End of Validación de célulares  ======*/


var reloadModalS=function(parametro1){

	$(parametro1).click(function(){

		location.reload();

	});

}

reloadModalS($(".reload__ModalesA"));

/*====================================
=            Convencional            =
====================================*/

var convencionalValidas=function(parametro1){

	$(parametro1).click(function(){

		$(this).val('0');

	});


	$(parametro1).keyup(function(e){

	 	if($(this).val().length<=2){

	 		if(e.keyCode == 8){

	 			$(this).val('02');

	 		}

	 	}

	});

}

convencionalValidas($("#telefonoOficinas"));
convencionalValidas($("#celularCiudadano"));

/*=====  End of Convencional  ======*/

/*=====================================================
=            Cerrar modal voluntariamentes            =
=====================================================*/

var cerrar__modalVolun=function(parametro1){

	$(parametro1).click(function(){

	  $("#modalEventos__editados").removeAttr('style');
	  $("#modalEventos__editados").removeAttr('aria-modal');
	  $("#modalEventos__editados").removeAttr('role');
	  $("#modalEventos__editados").attr('style','display: none;');
	  $("#modalEventos__editados").attr('aria-hidden','true');


	  $("#compensacionDModal").removeAttr('style');
	  $("#compensacionDModal").removeAttr('aria-modal');
	  $("#compensacionDModal").removeAttr('role');
	  $("#compensacionDModal").attr('style','display: none;');
	  $("#compensacionDModal").attr('aria-hidden','true');


	  $("#despidoInte").removeAttr('style');
	  $("#despidoInte").removeAttr('aria-modal');
	  $("#despidoInte").removeAttr('role');
	  $("#despidoInte").attr('style','display: none;');
	  $("#despidoInte").attr('aria-hidden','true');
	  
	  $("#reunciaVolunta").removeAttr('style');
	  $("#reunciaVolunta").removeAttr('aria-modal');
	  $("#reunciaVolunta").removeAttr('role');
	  $("#reunciaVolunta").attr('style','display: none;');
	  $("#reunciaVolunta").attr('aria-hidden','true');

	  $("#vacacionesNoGozadas").removeAttr('style');
	  $("#vacacionesNoGozadas").removeAttr('aria-modal');
	  $("#vacacionesNoGozadas").removeAttr('role');
	  $("#vacacionesNoGozadas").attr('style','display: none;');
	  $("#vacacionesNoGozadas").attr('aria-hidden','true');


	  $("body").removeAttr('style');
	  $("body").removeClass("modal-open");
	  $("body").removeAttr("data-bs-padding-right");
	  $("body").attr("data-bs-padding-right","17px");
	  $("body").attr("style","padding-right: 34px;");


	});

}

cerrar__modalVolun($(".closes__modales"));

var cerrar__modalVolun__2=function(parametro1){

	$(parametro1).click(function(){

	  $("#modalEventos__editados__3").removeAttr('style');
	  $("#modalEventos__editados__3").removeAttr('aria-modal');
	  $("#modalEventos__editados__3").removeAttr('role');
	  $("#modalEventos__editados__3").attr('style','display: none;');
	  $("#modalEventos__editados__3").attr('aria-hidden','true');
	  $("body").removeAttr('style');
	  $("body").removeClass("modal-open");
	  $("body").removeAttr("data-bs-padding-right");
	  $("body").attr("data-bs-padding-right","17px");
	  $("body").attr("style","padding-right: 34px;");

	});

}

cerrar__modalVolun__2($(".closes__modales__2"));


var cerrar__modalVolun__3=function(parametro1){

	$(parametro1).click(function(){

	  $("#modalEventos__editados__2").removeAttr('style');
	  $("#modalEventos__editados__2").removeAttr('aria-modal');
	  $("#modalEventos__editados__2").removeAttr('role');
	  $("#modalEventos__editados__2").attr('style','display: none;');
	  $("#modalEventos__editados__2").attr('aria-hidden','true');
	  $("body").removeAttr('style');
	  $("body").removeClass("modal-open");
	  $("body").removeAttr("data-bs-padding-right");
	  $("body").attr("data-bs-padding-right","17px");
	  $("body").attr("style","padding-right: 34px;");

	});

}

cerrar__modalVolun__3($(".closes__modales__3"));

/*=====  End of Cerrar modal voluntariamentes  ======*/


/*==========================================
=            Longitud elementos            =
==========================================*/

var longitudCaracteres=function(parametro1,parametro2,counter){

$(parametro1).keyup(function(e){

   if($(this).val().length > parametro2){

        $(this).val($(this).val().substr(0, parametro2));

        counter.html("Son máximo <strong>"+parametro2+" caracteres</strong>");

        counter.css("color","red");

    }else{

      // counter.html("<strong>"+$(this).val().length +"</strong>");

      counter.css("color","black");

      counter.css("font-size","10px");

    }


 });

}

longitudCaracteres($("#cedulaCiudadano"),10,$(".counter__Cedula"));
longitudCaracteres($("#rucOrganismo"),13,$(".counter__Ruc"));
// longitudCaracteres($("#cedulaRepresentante"),10,$(".counter__CedulaRepresentante"));
longitudCaracteres($("#telefonoOficinas"),10,$(".countertelefonoOficinas"));
longitudCaracteres($("#celularCiudadano"),10,$(".counterCelular__ciudadano"));
longitudCaracteres($("#cedulaInterventor"),10,$(".counterCelular__ciudadano"));
longitudCaracteres($("#rucOrganismo"),13,$(".counter__Ruc"));

/*=====  End of Longitud elementos  ======*/

/*==========================================
=            Caracteres minimos            =
==========================================*/

var longitudCaracteresMinimos=function(parametro1,parametro2,counter){

$(parametro1).blur(function(e){

   $(parametro1).removeClass("error2");

   if($(this).val().length < parametro2){

        $(this).val($(this).val().substr(0, parametro2));

        counter.html("Son mínimo <strong>"+parametro2+" caracteres</strong>");

        counter.css("color","blue");

    }else{

    	$(counter).html("");

    }

 });

$(parametro1).keyup(function(e){

   $(counter).html("");

});

}

longitudCaracteresMinimos($("#cedulaCiudadano"),10,$(".counter__CedulaMensajes"));
longitudCaracteresMinimos($("#celularCiudadano"),10,$(".counter__CelularMensajes"));
longitudCaracteresMinimos($("#cedulaRepresentante"),10,$(".counter__CedulaRepresentanteMensajes"));
longitudCaracteresMinimos($("#telefonoOficinas"),10,$(".counter__telefonoOficinasMensajes"));
longitudCaracteresMinimos($("#rucOrganismo"),13,$(".counter__rucOrganismoMensajes"));


/*=====  End of Caracteres minimos  ======*/


/*==========================================
=            Validar caracteres            =
==========================================*/

var validarCaracteres=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).keyup(function(e){ 

	 $(parametro3).removeClass('error2');

	 if (parametro2.test($(this).val().trim())){

	    	$(parametro3).html("");


	  }else {

	  		switch (parametro4) {

	  			case 0:
	  				$(parametro3).html("Por favor registre una dirección de correo electrónico válida a través de la cual el Ministerio del Deporte le remitirá información importante del proceso");
	  			break;

	  			case 1:
	  				$(parametro3).html("El usuario debe comenzar con letras y no debe tener caracteres especiales, debe tener un mínimo de 4 caracteres y máximo de 16 caracteres (Solo se acepta @,punto,- y _)");
	  			break;

	  			case 2:
	  				$(parametro3).html("La contraseña debe contener al menos 5 caracteres y un máximo de 15, una letra mayúscula, una letra minucula, un dígito, no caracteres especiales y espacios en blanco");
	  			break;

	  			case 3:
	  				$(parametro3).html("La contraseña debe comenzar con letras y no puede tener caracteres especiales y debe tener un mínimo de 5 caracteres y máximo de 16");
	  			break;

	  		}

	    	

	        $(parametro3).css("color","red");

	        $(parametro3).css("font-size","10px");

	  }


	 });

}

validarCaracteres($("#emailCiudadano"),/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,$(".counterCorreo__ciudadano"),0);
validarCaracteres($("#emailOrganismo"),/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,$(".counterCorreo__organismo"),0);
validarCaracteres($("#emailRepresentante"),/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,$(".counterCorreo__representante"),0);
validarCaracteres($("#passwordOrganismo"),/^[a-zA-Z0-9]{5,16}/,$(".counterPasswordValido__organismo"),3);
validarCaracteres($("#passwordOrganismoReset"),/^[a-zA-Z0-9]{5,16}/,$(".visualizar__error__password"),3);

/*=====  End of Validar caracteres  ======*/

/*================================
=            Checkbox            =
================================*/

var checkboxFunciones=function(parametro1,parametro2){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if (condicion) {

	      $(parametro2).show();


	    }else{

	      $(parametro2).hide();

	   }


	});


}
checkboxFunciones($("#generarFilasAcuerdo"),$(".acuerdo__responsabilidad__oculto"));
checkboxFunciones($("#generarFilasAcuerdoMinis"),$(".acuerdo__ministerial__oculto"));
checkboxFunciones($("#declaracionUso__seguimientos"),$(".enviador__seguiiento__refs"));
checkboxFunciones($("#seguimiento__tables"),$(".oculto__informacion"));
checkboxFunciones($(".catalogo__elect"),$(".catalogo__elect__texto"));
checkboxFunciones($(".catalogo__subasta"),$(".catalogo__subasta__texto"));
checkboxFunciones($(".catalogo__infima"),$(".catalogo__infima__texto"));
checkboxFunciones($(".catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
checkboxFunciones($("#seguimiento__tables_Contratacion_Publica"),$(".oculto__informacion_Contratacion_Publica"));
checkboxFunciones($(".catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
checkboxFunciones($(".catalogo__licitacion"),$(".catalogo__licitacion__texto"));
checkboxFunciones($(".catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
checkboxFunciones($(".catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
checkboxFunciones($(".catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
checkboxFunciones($(".catalogo__precioObras"),$(".catalogo__precioObras__texto"));
checkboxFunciones($(".catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
checkboxFunciones($(".catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
checkboxFunciones($(".catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));

checkboxFunciones($("#visualizar__informacionModificaciones"),$(".no__visible__modificaciones"));

/*=====  End of Checkbox  ======*/


/*=====================================================
=            Checkeds con obligatoriedades            =
=====================================================*/

var checkboxFunciones__obligatoriedades=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if ($(parametro3).text()=="Ningún documento seleccionado") {

			alertify.set("notifier","position", "top-center");
			alertify.notify("El documento de declaración es obligatorio", "error", 5, function(){});

			$(parametro1).prop("checked", false);


	    }else if (condicion) {

	      $(parametro2).show();

	      $(parametro1).attr('disabled','disabled');


	    }else{

	      $(parametro2).hide();

	   }


	});


}
checkboxFunciones__obligatoriedades($("#terminosCondiciones"),$(".contenidos__formularios__enviados"),$(".nombre__declaracionRecursos"));

/*=====  End of Checkeds con obligatoriedades  ======*/



/*==================================
=            Datepicker            =
==================================*/

var datepicker=function(parametro1){

/*========================================
=            Selección fechas            =
========================================*/
	
$(parametro1).datepicker({

	language: 'es',
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy/mm/dd', 
	yearRange: '-110:+100',

 });	
	
/*=====  End of Selección fechas  ======*/
		
/*===========================================
=            Regional datapicker            =
===========================================*/

$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '<Ant',
	nextText: 'Sig>',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
	weekHeader: 'Sm',
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};

$.datepicker.setDefaults($.datepicker.regional['es']);

/*=====  End of Regional datapicker  ======*/

}

// datepicker($("#fechaAcuerdoOrganismo"));
// datepicker($("#fechaAacuerdoMinisterial"));
// datepicker($("#fechaNacimientoPresidente"));

/*=====  End of Datepicker  ======*/

/*=============================================
=            Obtener datos del ruc            =
=============================================*/

var cedulaBuscadora=function(parametro1,parametro2,parametro3,parametro4){

$(parametro1).click(function(e){


	var paqueteDeDatos = new FormData();
	paqueteDeDatos.append('tipo',parametro4);

	var rucEnviado=$(parametro3[2]).val();

	paqueteDeDatos.append('rucOrganismo',rucEnviado);

	$(parametro1).hide();
	 	
	$(parametro2).html('<img src="images/reloadGit.webp" style="height:35px; margin-left: .5em; border-radius: .5em; cursor: pointer;">');


	$.ajax({

		type:"POST",
		url:"modelosBd/inserta/seleccionaAcciones.md.php",
		contentType: false,
		data:paqueteDeDatos,
		processData: false,
		cache: false,  
		success:function(response){

			var elementos=JSON.parse(response);
			var informacion__obtenidas=elementos['informacion__obtenidas'];

			if (informacion__obtenidas=="" || informacion__obtenidas==undefined || informacion__obtenidas==null || informacion__obtenidas==" ") {

				alertify.set("notifier","position", "top-center");
				alertify.notify("El ruc ingresado no se encuentra registrado en el aplicativo POA", "error", 10, function(){});

				$(parametro1).show();
				 	
				$(parametro2).html(' ');

	
			}else{


				$(parametro3[0]).show();
				$(parametro3[1]).show();
				$(parametro3[3]).show();
				$(parametro3[4]).show();
				$(parametro3[5]).show();

				for (c of informacion__obtenidas) {

					$(parametro3[0]).val(c.nombreOrganismo);
					$(parametro3[1]).val(c.idOrganismo);
					$(parametro3[3]).val(c.nombreProvincia);
					$(parametro3[4]).val(c.nombreCanton);
					$(parametro3[5]).val(c.nombreParroquia);

				}				

				$(parametro1).show();
				 	
				$(parametro2).html(' ');



			}

	    },
	    error:function(){
	    	
	    } 

	});

});

}

cedulaBuscadora($("#buscarRuc__i"),$(".reload__rucI"),[$("#nombreOrganismo__i"),$("#idOrganismo_i"),$("#rucOrganismo"),$("#provincia__i"),$("#canton__i"),$("#parroquia__i")],"ruc_i");

/*=====  End of Obtener datos del ruc  ======*/



/*======================================
=            Cédula validas            =
======================================*/

var cedulaBuscadora=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7){

$(parametro1).click(function(e){

	$(parametro1).hide();
	 	
	$(parametro2).html('<img src="images/reloadGit.webp" style="height:35px; margin-left: .5em; border-radius: .5em; cursor: pointer;">');

	$.ajax({

		url:"php/dinardap.php",
		type:"POST",
		dataType:"json",
		data:"cedula="+$(parametro3).val(),
		success:function(datos){

	    	if (datos==null) {
	                 
				alertify.set("notifier","position", "top-center");
				alertify.notify("La cédula ingresada no existe", "error", 5, function(){});

	        	$(parametro2).html('');

	        	$(parametro1).show();

	    	}else{

	            // recuperación de datos de la dinardap
	       		$(parametro4).val(datos.nombre);

	       		$(parametro7).val(datos.nombre)

	       		if (parametro5!=false) {

	                if(datos.sexo=="HOMBRE"){

	                	$(parametro5).val("MASCULINO");

	                }else{

	                	$(parametro5).val("FEMENINO");

	                }

		                  
		            $(parametro6).val(datos.fechaNacimiento);

		            $("#nombreCiudadano").val(datos.nombre);

		            $("#apellidoCiudadano").val(datos.nombre);

					/*=========================================
					=            Calculo de edades            =
					=========================================*/

					function calcularEdad(fecha) {

						var hoy = new Date();
						var cumpleanos = new Date(fecha);
						var edad = hoy.getFullYear() - cumpleanos.getFullYear();
						var m = hoy.getMonth() - cumpleanos.getMonth();

						if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
							edad--;
						}

						return edad;

					}

					var edadRealizables=calcularEdad(datos.fechaNacimiento);
						
					/*=====  End of Calculo de edades  ======*/


	            }

	            $(parametro2).html('');

	            $(parametro1).show();

	            $(parametro4).show();


	        }          
	               
	    },
	    error:function(response,status,error){
	    	alert("no encontrado");
	    } 

	});

});

}

cedulaBuscadora($("#buscarCedulaPresidente"),$(".reload__CedulasCiudadanos"),$("#cedulaCiudadano"),$("#nombreCiudadano"),$("#sexoCiudadano"),$("#fechaDeNacimientoCiudadano"),$("#apellidoCiudadano"));

cedulaBuscadora($("#buscar__CedulaPersonaContacto"),$(".reload__personaContacto"),$("#cedulaRepresentante"),$("#nombreRepresentante"),$("#sexoCiudadano"),$("#fechaDeNacimientoCiudadano"),$("#apellidoRepresentante"));

cedulaBuscadora($("#buscarCedulaRepresentanteEdicion"),$(".reload__CedulasCiudadanos"),$("#cedulaRepresentanteOrganismoDeportivo"),$("#representanteOrganismoDeportivo"),$("#sexoCiudadano"),$("#fechaDeNacimientoCiudadano"),$("#apellidoCiudadano"));

cedulaBuscadora($("#buscarCedulaPresidenteEdicion"),$(".reload__CedulasCiudadanos"),$("#cedulaPresidenteOrganismoDeportivo"),$("#presidenteOrganismoDeportivo"),$("#generoPresidente"),$("#fechaNacimientoPresidente"),$("#presidenteOrganismoDeportivoApe"));

cedulaBuscadora($("#buscarCedulaPresidenteEdicion"),$(".reload__CedulasCiudadanos"),$("#cedulaPresidenteOrganismoDeportivo"),$("#presidenteOrganismoDeportivo"),$("#generoPresidente"),$("#fechaNacimientoPresidente"),$("#presidenteOrganismoDeportivoApe"));

cedulaBuscadora($("#buscarCedula__i"),$(".reload__cedulas__i"),$("#cedulaInterventor"),$("#nombreInterventor__i"));

/*=====  End of Cédula validas  ======*/


/*=================================================
=            Generar contraseña vistas            =
=================================================*/

var verOjoContrasenas=function(parametro1,parametro2){

	$(parametro1).click(function(){
	
		var tipo=$(parametro2).attr('type');	

		if (tipo=="text") {


			$(this).addClass('fa-eye');

			$(this).removeClass('fa-eye-slash')

			$(parametro2).attr('type','password');


		}else{

			$(this).removeClass('fa-eye');

			$(this).addClass('fa-eye-slash');

			$(parametro2).attr('type','text');


		}


	});


}
verOjoContrasenas($("#ojo_icono"),$("#passwordOrganismoReset"));

/*=====  End of Generar contraseña vistas  ======*/

/*================================================
=             Agregar opciones mátriz            =
================================================*/

let contadorCrea__columnas__opciones=0;

var creacion__colulmnadas=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(){

		contadorCrea__columnas__opciones++;

		$(".contenedor__visualizar__matriz").hide();
	
		$(parametro2).append('<div class="row directivas__'+contadorCrea__columnas__opciones+'"><div class="col col-3 mt-2 directivas__'+contadorCrea__columnas__opciones+'">Escriba el nombre de la opción de la columna</div><div class="col col-8 mt-2 directivas__'+contadorCrea__columnas__opciones+'"><input type="text" plaecholder="Ingrese nombre de la opción" class="ancho__total__input opcion__select opcion__selects'+contadorCrea__columnas__opciones+'   enlaces__selectores'+parametro3+' opciones__agregadas__enlzadas" attr="'+parametro3+'"/></div><div class="col col-1 mt-2 directivas__'+contadorCrea__columnas__opciones+'"><a id="eliminarFas__'+contadorCrea__columnas__opciones+'" name="eliminarFas__'+contadorCrea__columnas__opciones+'" class="btn btn-danger" idContador="'+contadorCrea__columnas__opciones+'"><i class="fas fa-trash"></i></a></div></div>');

			$("#eliminarFas__"+contadorCrea__columnas__opciones).click(function(){

				let idContador=$(this).attr('idContador');

				$(".directivas__"+idContador).remove();

			});

			$(".opcion__selects"+contadorCrea__columnas__opciones).keyup(function(){

				$(".contenedor__visualizar__matriz").show();
		
			});


	});


}



/*=====  End of  Agregar opciones mátriz  ======*/



/*==================================================
=            Selectores de lineamientos        =
==================================================*/

let contadorCrea__columnas=0;


var selectores__lineas=function(parametro1,parametro2,parametro3){

	$(parametro1).change(function(){

		let numerador=0;
		let numerador2=0;

		contadorCrea__columnas++;

		$(".tipo__columna").each(function(index) {

			if($(this).val()==" "){

				numerador2++;

			}

		});

		if(numerador2>0){

			$(".contenedor__visualizar__matriz").hide();

		}else{

			$(".contenedor__visualizar__matriz").show();

		}


		$(".columnas__tomadas__cuenta").each(function(index) {

			if($(this).val()==" "){
				numerador++;
			}

		});


		if(numerador>0){

			alertify.set("notifier","position", "top-center");
			alertify.notify("Debe ingresar el nombre de columna antes de seleccionar el tipo", "error", 5, function(){});

			$(this).val(" ");

			$(".contenedor__visualizar__matriz").hide();

		}else if ($(this).val()=="selector") {

			$(parametro2).html(' ');

			$(parametro2).append('<div class="row"><div class="col col-3 mt-2">Escriba el nombre de la opción de la columna</div><div class="col col-8 mt-2"><input type="text" plaecholder="Ingrese nombre de la opción" class="ancho__total__input opcion__select opcion__selects'+contadorCrea__columnas+' enlaces__selectores'+parametro3+' opciones__agregadas__enlzadas" attr="'+parametro3+'"/></div><div class="col col-1 mt-2"><a id="agregarFas__'+contadorCrea__columnas+'" name="agregarFas__'+contadorCrea__columnas+'" class="btn btn-info" idContador="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></div></div>');

			creacion__colulmnadas($("#agregarFas__"+contadorCrea__columnas),parametro2,parametro3);

			$(".contenedor__visualizar__matriz").hide();

			$(".opcion__selects"+contadorCrea__columnas).keyup(function(){

				$(".contenedor__visualizar__matriz").show();
		
			});

		}else if($(this).val()=="formula"){


			if(numerador>0){

				alertify.set("notifier","position", "top-center");
				alertify.notify("Todas las columnas creadas deben tener un nombre para poder seleccionar la opción formula", "error", 5, function(){});

				$(this).val(" ")

			}else{

				$(parametro2).html(' ');

				$(parametro2).append('<table class="tabla__adheridas__'+contadorCrea__columnas+' col col-12"><tr><th colspan="2"><center>Columnas</th></center></tr></table>');

				let valorColumnaSe=$("#nombreConombre__columnas__"+parametro3).val();

				$(".columnas__tomadas__cuenta").each(function(index) {

					if($(this).val()!=" " && $(this).val()!=valorColumnaSe){

						$(".tabla__adheridas__"+contadorCrea__columnas).append('<tr><td  id="editables__'+$(this).val()+'__'+contadorCrea__columnas+'">'+$(this).val()+'</td><td class="text-left"><a class="btn btn-info agrega__botones'+contadorCrea__columnas+'" idContador="'+$(this).val()+'" idContador2="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></td></tr>');

					}

				});

				$(".tabla__adheridas__"+contadorCrea__columnas).append('<tr><th colspan="2"><center>Operadores</th></center></tr><tr><td id="editables__suma'+contadorCrea__columnas+'">Sumar (<i class="fa fa-plus" aria-hidden="true"></i>)</td><td><a class="btn btn-info agrega__botones'+contadorCrea__columnas+'" idContador="+" idContador2="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></td></tr><tr><td class="col col-4" id="editables__resta'+contadorCrea__columnas+'">Restar (<i class="fa fa-window-minimize" aria-hidden="true"></i>)</td><td class="col col-2 text-left"><a class="btn btn-info agrega__botones'+contadorCrea__columnas+'" idContador="-" idContador2="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></td></tr><tr><td class="col col-4" id="editables__multiplicacion'+contadorCrea__columnas+'">Multiplicar (*)</td><td class="col col-2 text-left"><a class="btn btn-info agrega__botones'+contadorCrea__columnas+'" idContador="*" idContador2="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></td></tr><tr><td class="col col-4" id="editables__division'+contadorCrea__columnas+'">Dividir (/)</td><td class="col col-2 text-left"><a class="btn btn-info agrega__botones'+contadorCrea__columnas+'" idContador="/" idContador2="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></td></tr><tr><td class="col col-4" id="editables__porcentajes'+contadorCrea__columnas+'">Porcentaje (%)</td><td class="col col-2 text-left"><a class="btn btn-info agrega__botones'+contadorCrea__columnas+'" idContador="%" idContador2="'+contadorCrea__columnas+'"><i class="fas fa-plus-circle"></i></a></td></tr><tr><th colspan="2">Fórmula resultante</th></tr><tr><td colspan="2"><center><input type="text" plaecholder="Ingrese nombre de la opción" class="ancho__total__input formula__total'+contadorCrea__columnas+' formulas__concatenadas formulas__adyacentes'+parametro3+' text-center enlaces__formulas'+parametro3+'" attr="'+parametro3+'" style="font-size:14px; font-weight:bold;"/></center></td></tr>');

					$(".agrega__botones"+contadorCrea__columnas).click(function(){

						let idContador=$(this).attr('idContador2');

						let valor=$(this).attr('idContador');

						let resultado=$(".formula__total"+contadorCrea__columnas).val();

						$(".formula__total"+contadorCrea__columnas).val(resultado+" "+valor);
		
					});
	

			}


		}else{

			$(parametro2).html(' ');

		}


	});


}
selectores__lineas($("#tipoColumnas"),$(".selector__alineados"),0);

/*=====  End of Selectores de lineamientos  ======*/



var funcion__cambio__de__numero=function(parametro1){

$(parametro1).on('click', function () {

	if ($(this).val()=="0") {

		$(this).val(" ");

	}

});

$(parametro1).on('blur', function () {

	if ($(this).val()==" " || $(this).val()=="") {

		$(this).val("0");

	}

});

}

funcion__cambio__de__numero($(".cambio__de__numero__f"));
funcion__cambio__de__numero($(".enlazados__sumas__de"));
funcion__cambio__de__numero($(".enlazados__sumas__de__modificaciones"));
funcion__cambio__de__numero($(".enlazados__sumas__de__modificaciones__bonificaciones"));
funcion__cambio__de__numero($(".enlazados__desvinculaciones"));
funcion__cambio__de__numero($(".solo__numero__montos"));

/*============================================
=             Crear dinamicamente            =
============================================*/

let contadorCrea=0;

var agregar__dinamicos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	$(parametro1).click(function(){

		contadorCrea++;

		if (parametro3=="nombre__columnas") {

			$(".contenedor__visualizar__matriz").hide();

			$(parametro2).append('<div class="row '+parametro3+"__"+contadorCrea+' mt-4 border__repentinos"><div class="col col-2 mt-2">Nombre columna:</div><div class="col col-3 mt-2 '+parametro3+"__"+contadorCrea+'"><input type="text" class="ancho__total__input '+parametro3+' obligatorios nombre__columnas columnas__tomadas__cuenta" id="nombreCo'+parametro3+"__"+contadorCrea+'" value=" " name="nombreCo'+parametro3+"__"+contadorCrea+'" placeholder="'+parametro4+'" attr="'+contadorCrea+'"/></div><div class="col col-2 mt-2 '+parametro3+"__"+contadorCrea+'">Tipo columna:</div><div class="col col-4 mt-2 '+parametro3+"__"+contadorCrea+'"><select class="tipo__columna ancho__total__input obligatorios" id="tipoColumnas'+contadorCrea+'" name="tipoColumnas'+contadorCrea+'" placeholder="'+parametro4+'" attr="'+contadorCrea+'"><option value=" ">--Seleccione tipo de columna--</option><option value="numerico">Númerico</option><option value="moneda">Moneda</option><option value="texto">Texto</option><option value="selector">Selector</option><option value="selectorPais">Selector de países</option><option value="formula">Formúla</option></select></div><div class="col col-1 mt-2 text-left"><a id="eliminar__'+parametro3+contadorCrea+'" name="eliminar__'+parametro3+contadorCrea+'" class="btn btn-danger" idContador="'+contadorCrea+'"><i class="fas fa-trash"></i></a></div><div class="rowses__'+contadorCrea+'"></div></div>');

			selectores__lineas($("#tipoColumnas"+contadorCrea),$(".rowses__"+contadorCrea),contadorCrea);

		}else{

			$(parametro2).append('<div class="col col-10 mt-2 '+parametro3+"__"+contadorCrea+'"><input type="text" class="ancho__total__input '+parametro3+' obligatorios" id="'+parametro3+"__"+contadorCrea+'" name="'+parametro3+"__"+contadorCrea+'" placeholder="'+parametro4+'"/></div><div class="col col-2 mt-2 '+parametro3+"__"+contadorCrea+'"><a id="eliminar__'+parametro3+contadorCrea+'" name="eliminar__'+parametro3+contadorCrea+'" class="btn btn-danger" idContador="'+contadorCrea+'"><i class="fas fa-trash"></i></a></div>');

		}
	
		
		$("#eliminar__"+parametro3+contadorCrea).click(function(){

			let idContador=$(this).attr('idContador');

			$("."+parametro3+"__"+idContador).remove();

		});


		if (parametro3=="codigo__proyecto") {

			$("."+parametro3).addClass('solo__numero');

		}


		$(".solo__numero").on('input', function () {

			this.value = this.value.replace(/[^0-9]/g, '');

		});



	});
	

}

agregar__dinamicos($("#agregar__especificos"),$(".contenedor__especificos"),"objetivo__especificos","Ingrese objetivo específico");
agregar__dinamicos($("#agregar__actividades__rubros"),$(".contenedor__activities"),"actividades__rubros","Ingrese actividad/rubro","matriz__auxiliar","Ingrese mátriz auxiliar");
agregar__dinamicos($("#agregar__matriz__auxiliar"),$(".contenedor__matriz__auxiliar"),"matriz__auxiliar","Ingrese mátriz auxiliar");
agregar__dinamicos($("#agregar__item"),$(".contenedor__item"),"items__proyecto","Ingrese ítem");
agregar__dinamicos($("#agregar__item__codigo"),$(".contenedor__item__presupuestario"),"codigo__proyecto","Ingrese código ítem presupuestario");
agregar__dinamicos($("#agregar__indicador"),$(".contenedor__indicador"),"indicador__proyecto","Ingrese indicador del proyecto");

agregar__dinamicos($("#agregar__columnas__paids"),$(".columnas__generadas__contenidos"),"nombre__columnas","Ingrese nombre de la columna");

/*=====  End of  Crear dinamicamente  ======*/

/*=============================================
=            Crear dinamicamente 2            =
=============================================*/

/*======================================
=            Proyectos paid            =
======================================*/

let contadorCrea2=0;
let banderaCrea=false;

var proyectos__Funcos=function(parametro1){

	indicador=47;

	let valoresAplicados=$("#parametrosTomarCuenta").val();

	$.ajax({

	  data: {indicador:indicador,valoresAplicados:valoresAplicados},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(modificas){

	  $(parametro1).html(modificas);

	}).fail(function(){});

}

proyectos__Funcos($("#proyectos__creados"));

var arrayGlobal = new Array(); 

var asignacion__valores=function(parametro1){

	$(parametro1).change(function(){

		arrayGlobal.push($(this).val());

		$("#parametrosTomarCuenta").val(arrayGlobal);

	});

}

asignacion__valores($("#proyectos__creados"));

/*=====  End of Proyectos paid  ======*/

/*============================================
=            Selección organismos            =
============================================*/

var organismos=function(parametro1){

	indicador=48;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(listar__lugar);

	}).fail(function(){

	  

	});


}

/*=====  End of Selección organismos  ======*/


/*==========================================
=            Agregar organismos            =
==========================================*/


var agregar__dinamicos2__organismos__traidos=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(){

		$(parametro3).after('<form class="row mt-4" id="federacionFomrulario'+parametro2+'"></div><div class="col col-4 negrilla__titulosEnlazados text-center">Organismo deportivo</div><div class="col col-4 negrilla__titulosEnlazados text-center">Monto</div><div class="col col-3 negrilla__titulosEnlazados text-center">Archivo</div><div class="col col-1 negrilla__titulosEnlazados text-center"></div><div class="row mt-4"><div class="col col-4"><select class="ancho__total__input" id="organismos__id'+parametro2+'" name="organismos__id'+parametro2+'"></select></div><div class="col col-4"><input type="text" class="ancho__total__input solo__numero__montos" id="montoOrganismo'+parametro2+'" name="montoOrganismo'+parametro2+'" placeholder="Ingrese el monto por favor"/></div><div class="col col-3"><input type="file" class="ancho__total__input" id="archivoOrganismo'+parametro2+'"/></div><div class="col col-1"><a id="guardarPaid'+parametro2+'" name="guardarPaid'+parametro2+'" class="btn btn-primary text-center"><i class="fas fa-save"></i></a></div></form>');

			organismos($("#organismos__id"+parametro2));

			inserta__proyecto__organismo($("#guardarPaid"+parametro2),$("#federacionFomrulario"+parametro2),$("#archivoOrganismo"+parametro2),parametro2);


	});

}


var agregar__dinamicos2__organismos=function(parametro1){

	$(parametro1).change(function(){

		let valor=$(this).val();

		$(parametro1).after('<div class="row mt-4" id="federacionFomrulario'+valor+'"><div class="col col-4 negrilla__titulosEnlazados">Agregar organismo deportivo</div><div class="col col-8 text-left"><a id="agregarOrga'+valor+'" name="agregarOrga'+valor+'" class="btn btn-info text-center"><i class="fas fa-plus-circle"></i></a></div></div>');

		$(parametro1).after('<form class="row mt-4" id="federacionFomrulario'+valor+'"></div><div class="col col-4 negrilla__titulosEnlazados text-center">Organismo deportivo</div><div class="col col-4 negrilla__titulosEnlazados text-center">Monto</div><div class="col col-3 negrilla__titulosEnlazados text-center">Archivo</div><div class="col col-1 negrilla__titulosEnlazados text-center"></div><div class="row mt-4"><div class="col col-4"><select class="ancho__total__input obligatorio" id="organismos__id'+valor+'" name="organismos__id'+valor+'"></select></div><div class="col col-4"><input type="text" class="ancho__total__input obligatorio solo__numero__montos" id="montoOrganismo'+valor+'" name="montoOrganismo'+valor+'" placeholder="Ingrese el monto por favor"/></div><div class="col col-3"><input type="file" class="ancho__total__input obligatorio" id="archivoOrganismo'+valor+'"/></div><div class="col col-1"><a id="guardarPaid'+valor+'" name="guardarPaid'+valor+'" class="btn btn-primary text-center"><i class="fas fa-save"></i></a></div></form>');

		agregar__dinamicos2__organismos__traidos($("#agregarOrga"+valor),valor,parametro1);

		organismos($("#organismos__id"+valor));

		inserta__proyecto__organismo($("#guardarPaid"+valor),$("#federacionFomrulario"+valor),$("#archivoOrganismo"+valor),valor);

		funcion__solo__numero__montos($(".solo__numero__montos"));

	});
	
}

agregar__dinamicos2__organismos($("#proyectos__creados"));


/*=====  End of Agregar organismos  ======*/


var agregar__dinamicos2=function(parametro1,parametro2){

	$(parametro1).click(function(){

		$.getScript("layout/scripts/js/validaGlobal.js",function(){

			$(".proyectos__creados").each(function(index) {
				if($(this).val()=="0"){
					banderaCrea=true;
				}else{
					banderaCrea=false;
				}
			});

			if (banderaCrea==false) {

				contadorCrea2++;
				
				$(parametro2).append('<div class="border__contenedor row mt-2 fila__paids'+contadorCrea2+'"><div class="col col-11 mt-2 fila__paids'+contadorCrea2+'"><select id="proyectos__creados'+contadorCrea2+'" name="proyectos__creados'+contadorCrea2+'" class="ancho__total__input proyectos__creados"></select></div><div class="col col-1 mt-2 fila__paids'+contadorCrea2+'"><a id="borrarPaids'+contadorCrea2+'" name="borrarPaids'+contadorCrea2+'" class="btn btn-danger text-center" idContador="'+contadorCrea2+'"><i class="fas fa-trash"></i></a></div></div>');

				proyectos__Funcos($("#proyectos__creados"+contadorCrea2));

				asignacion__valores($("#proyectos__creados"+contadorCrea2));

				agregar__dinamicos2__organismos($("#proyectos__creados"+contadorCrea2));

				$("#borrarPaids"+contadorCrea2).click(function(){

					let idContador=$(this).attr('idContador');

					$(".fila__paids"+idContador).remove();

				});

			}else{

				alertify.set("notifier","position", "top-center");
				alertify.notify("Es obligatorio seleccionar el proyecto antes de crear uno nuevo", "error", 5, function(){});

			}

		});

	});
	
}

agregar__dinamicos2($("#agregar__proyectos__paids"),$(".contenedor__paids"));

/*=====  End of Crear dinamicamente 2  ======*/

/*========================================
=            Agregar mátricez            =
========================================*/

var bloques__matricez=function(parametro1,parametro2){

	$(parametro1).click(function(){

		$.getScript("layout/scripts/js/validaGlobal.js",function(){

			$(parametro2).html(' ');

			$(parametro2).append('<table class="tabla__matriz__generadas"><thead><tr class="apertura__columnas"></tr></thead><tbody><tr class="cuerpo__columnas"></tr></tbody></table>');

			$(".nombre__columnas").each(function(index) {

				$(".apertura__columnas").append('<th><center>'+$(this).val()+'</center></th>');

			});


			$(".tipo__columna").each(function(index) {

				if($(this).val()=="numerico"){

					$(".cuerpo__columnas").append('<td><input type="text" class="solo__numero ancho__total__input" id="'+$(this).val()+'" value="0"/></td>');

				}else if($(this).val()=="moneda"){

					$(".cuerpo__columnas").append('<td><input type="text" class="solo__numero__montos ancho__total__input" id="'+$(this).val()+'" value="0"/></td>');

				}else if($(this).val()=="texto"){

					$(".cuerpo__columnas").append('<td><textarea class="ancho__total__input" id="'+$(this).val()+'"></textarea></td>');

				}else if($(this).val()=="selector"){

					let idContador=$(this).attr('attr');

					$(".cuerpo__columnas").append('<td><select class="ancho__total__input inicio__select__matriz un__indice'+idContador+'"></select></td>');


					$(".un__indice"+idContador).append('<option value=" ">--Seleccione una opción--</option>');

					$(".enlaces__selectores"+idContador).each(function(index) {

						$(".un__indice"+idContador).append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>');

					});

				}else if($(this).val()=="selectorPais"){

					$(".cuerpo__columnas").append('<td><select class="ancho__total__input selector__paises"></select></td>');

					var tipo__pais=function(parametro1){

						indicador=4;

						$.ajax({

						  data: {indicador:indicador},
					      dataType: 'html',
					      type:'POST',
						  url:'modelosBd/validaciones/selector.modelo.php'

						}).done(function(listar__lugar){

						  $(parametro1).html(listar__lugar);

						}).fail(function(){

						  

						});


					}

					tipo__pais($(".selector__paises"));

				}else if($(this).val()=="formula"){

					let idContador=$(this).attr('attr');

					let formula=$(".enlaces__formulas"+idContador).val();

					$(".cuerpo__columnas").append('<td><input type="text" class="solo__numero__montos ancho__total__input" id="'+$(this).val()+'" value="0"/><br><div style="display:flex; font-weight:bold; text-align:center; position:relative; left:42%;">'+formula+'</div></td>');

				}

				funcion__solo__numero__montos($(".solo__numero__montos"));

				$(".solo__numero").on('input', function () {

					this.value = this.value.replace(/[^0-9]/g, '');

				});

			});

		});

	});
	
}

bloques__matricez($("#visualiza__matricez"),$(".bloque__paid__matriz"));

/*=====  End of Agregar mátricez  ======*/


var sumarIndicadoresGlobal__principal=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro1).on('input', function () {

		var sum = 0;

		$(parametro1).each(function(){
		    sum += parseFloat($(this).val());
		});

		$(parametro2).val(sum.toFixed(2));

		if (parametro3==true && parseFloat($(parametro2).val())>parseFloat($(parametro4).val())) {

			$(parametro1).val(0);
			$(parametro2).val(0);

			alertify.set("notifier","position", "top-center");
			alertify.notify("El monto supera al asignado en bonifiación", "error", 10, function(){});

			$(parametro5).hide();

		}else if(parametro3==true && parseFloat($(parametro2).val())==parseFloat($(parametro4).val())){

			$(parametro5).show();

		}else if(parametro3==true && parseFloat($(parametro2).val())!=parseFloat($(parametro4).val())){

			$(parametro5).hide();

		}

	});

}

sumarIndicadoresGlobal__principal($(".suma__enlaces__desaucio"),$("#totalDesaucio"));
sumarIndicadoresGlobal__principal($(".suma__enlaces__despiIn"),$("#totalDespidoIntepes"));
sumarIndicadoresGlobal__principal($(".suma__enlaces__renunciaV"),$("#totalRenunciaVoluntaria"));
sumarIndicadoresGlobal__principal($(".suma__vacaciones__no__gozadas"),$("#totalVacacionesNo"));
sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes"),$("#montoEje__remanentes"));
sumarIndicadoresGlobal__principal($(".sumar__clases__remanentes"),$("#ejecutado__resumen"));
sumarIndicadoresGlobal__principal($(".enlazados__sumas__de__modificaciones"),$("#totalOrigen"),true,$("#totalOrigenBeneficios"),$(".oculto__tabla__destino__salarios"));
sumarIndicadoresGlobal__principal($(".enlazados__sumas__de__modificaciones__bonificaciones"),$("#totalOrigenBeneficios"));


var sumarIndicadoresGlobal__principal__desvinculaciones=function(parametro1,parametro2,parametro3){

	$(parametro1).on('input', function () {

		var sum = 0;

		$(parametro1).each(function(){
		    sum += parseFloat($(this).val());
		});

		if (parseFloat(sum)>parseFloat($(parametro3).val())) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("El monto supera al monto asignado en el orígen", "error", 10, function(){});

			$(parametro2).val(0);

			$(parametro1).val(0);

		}else{

			$(parametro2).val(sum.toFixed(2));

		}

	});

}

sumarIndicadoresGlobal__principal__desvinculaciones($(".enlazados__desvinculaciones"),$("#totalDesvinculacion__sumar"),$("#totalOrigen"));

var sumarIndicadoresGlobal__principal__modificaciones=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).on('input', function () {

		let sum = 0;

		sum=parseFloat($(parametro3).val()) - parseFloat($(this).val());

		if(parseFloat($(this).val())>parseFloat($(parametro3).val())){

			$(this).val(0);
			$(parametro2).val(0);
			$(parametro4).val(0);
			alertify.set("notifier","position", "top-center");
			alertify.notify("El monto supera al asignado para esta fecha", "error", 10, function(){});

		}else{

			$(parametro2).val(parseFloat(sum).toFixed(2));
		}

	});

}

sumarIndicadoresGlobal__principal__modificaciones($("#eneroOrigen"),$("#eneroOrigen__restando"),$("#enero__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#febreroOrigen"),$("#febreroOrigen__restando"),$("#febrero__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#marzoOrigen"),$("#marzoOrigen__restando"),$("#marzo__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#abrilOrigen"),$("#abrilOrigen__restando"),$("#abril__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#mayoOrigen"),$("#mayoOrigen__restando"),$("#mayo__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#junioOrigen"),$("#junioOrigen__restando"),$("#junio__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#julioOrigen"),$("#julioOrigen__restando"),$("#julio__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#agostoOrigen"),$("#agostoOrigen__restando"),$("#agosto__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#septiembreOrigen"),$("#septiembreOrigen__restando"),$("#septiembre__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#octubreOrigen"),$("#octubreOrigen__restando"),$("#octubre__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#noviembreOrigen"),$("#noviembreOrigen__restando"),$("#noviembre__origen"),$("#totalOrigen"));
sumarIndicadoresGlobal__principal__modificaciones($("#diciembreOrigen"),$("#diciembreOrigen__restando"),$("#diciembre__origen"),$("#totalOrigen"));

sumarIndicadoresGlobal__principal__modificaciones($("#salarioOrigen"),$("#salarioOrigen__restando"),$("#salario__origen"),$("#totalOrigenBeneficios"));
sumarIndicadoresGlobal__principal__modificaciones($("#aportePatronalOrigen"),$("#aportePatronalOrigen__restando"),$("#aportePatronal__origen"),$("#totalOrigenBeneficios"));
sumarIndicadoresGlobal__principal__modificaciones($("#decimoTerceroOrigen"),$("#decimoTerceroOrigen__restando"),$("#decimoTercero__origen"),$("#totalOrigenBeneficios"));
sumarIndicadoresGlobal__principal__modificaciones($("#decimoCuartoOrigen"),$("#decimoCuartoOrigen__restando"),$("#decimoCuarto__origen"),$("#totalOrigenBeneficios"));
sumarIndicadoresGlobal__principal__modificaciones($("#fondosDeReservaOrigen"),$("#fondosDeReservaOrigen__restando"),$("#fondosDeReserva__origen"),$("#totalOrigenBeneficios"));


/*=====================================================================
=            Actualización de información de años periodos            =
=====================================================================*/


let selector__index__principal__replicables=function(parametro1,parametro2){

	let indicadorAnio=$(parametro1).val();

	indicadorAnio=parseInt(indicadorAnio, 10);

	for (let i =2022; i <=indicadorAnio; i++) {

		if (i!=indicadorAnio) {

			let $option = $('<option />', {
			    text: i,
			    value: i,
			});

			$(parametro2).append($option);

		}

	}


}

selector__index__principal__replicables($("#anioActual__periodos"),$("#periodo__sueldosR"));
selector__index__principal__replicables($("#anioActual__periodos"),$("#periodo__honorarios"));

/*=====  End of Actualización de información de años periodos  ======*/


/*=====================================================
=            Replicar m+atrices necesarias            =
=====================================================*/

let replicar__poas__anios__anteriores=function(parametro1,parametro2,parametro3){

	$(parametro1).on('change', function () {

		let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
		let periodoIngresos=$(this).val();

		let paqueteDeDatos = new FormData();

		paqueteDeDatos.append('tipo',parametro2);
		paqueteDeDatos.append('idOrganismo',idOrganismoPrincipal);
		paqueteDeDatos.append('periodoIngresos',periodoIngresos);

		$.ajax({

			type:"POST",
			url:"modelosBd/inserta/seleccionaAcciones.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false,  
			success:function(response){

				var elementos=JSON.parse(response);
				var resultados=elementos['resultados'];

				if (resultados!="" && resultados!=" " && resultados!=null && resultados!=undefined) {

					$(parametro3).show();


					alertify.set("notifier","position", "top-center");
					alertify.notify("Puede proceder a replicar", "success", 10, function(){});

				}else{

					alertify.set("notifier","position", "top-center");
					alertify.notify("No puede replicar no existe información de esta mátriz para este período", "error", 10, function(){});

					$(parametro3).hide();

				}


		    },
		    error:function(){
		    	
		    } 

		});
		

	});

}

replicar__poas__anios__anteriores($("#periodo__sueldosR"),"sueldos__replicas",$("#replicar__salarios"));
replicar__poas__anios__anteriores($("#periodo__honorarios"),"honorarios__replicas",$("#replicar__honorariosR"));


/*=====  End of Replicar m+atrices necesarias  ======*/


/*============================================
=            Replicar información            =
============================================*/

let replicar__poas__anios__anteriores__enviados=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).on('click', function () {


		var confirm= alertify.confirm('¿Está seguro de replicar este cátalogo? Tomar en consideraciónque en el caso de existir información registrada en la mátriz de '+parametro4+' está sera sobrescrita por la nueva información','¿Está seguro de replicar este cátalogo? Tomar en consideraciónque en el caso de existir información registrada en la mátriz de '+parametro4+' está sera sobrescrita por la nueva información',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

		$(parametro1).hide();

		confirm.set({transition:'slide'});    

		confirm.set('onok', function(){ //callbak al pulsar botón positivo		


			let idOrganismoPrincipal=$("#idOrganismoPrincipal").val();
			let periodoIngresos=$(parametro3).val();
			let anioActual__periodos=$("#anioActual__periodos").val();

			let paqueteDeDatos = new FormData();

			paqueteDeDatos.append('tipo',parametro2);
			paqueteDeDatos.append('idOrganismo',idOrganismoPrincipal);
			paqueteDeDatos.append('periodoIngresos',periodoIngresos);
			paqueteDeDatos.append('anioActual__periodos',anioActual__periodos);

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

					if (mensaje==1) {

						alertify.set("notifier","position", "top-center");
						alertify.notify("Acción realizada correctamente", "success", 10, function(){});



				         window.setTimeout(function(){ 

				            location.reload();

				         } ,3000); 



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

replicar__poas__anios__anteriores__enviados($("#replicar__salarios"),"sueldos__replicas__enviados",$("#periodo__sueldosR"),"sueldos y salarios");
replicar__poas__anios__anteriores__enviados($("#replicar__honorariosR"),"honorarios__replicas__enviados",$("#periodo__honorarios"),"Honorarios");


/*=====  End of Replicar información  ======*/


var modal__credenciales__nuevos=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro1).on('click', function () {

		$(".bloques__registros").addClass('row');
		$(".contenedor__documentosConfidenciales").hide();
		$(".bloques__registros").show();

		$("#guardarAcuerdoConfidencialidad").hide();
		$("#guardarRegistroPoa").show();

	});

}

modal__credenciales__nuevos($("#registrosNuevos"));

var modal__credenciales__nuevos__dados__dados=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro1).on('click', function () {

		$(".bloques__registros").remove();
		$(".contenedor__documentosConfidenciales").show();

		$("#guardarAcuerdoConfidencialidad").show();
		$("#guardarRegistroPoa").hide();

	});

}
modal__credenciales__nuevos__dados__dados($("#olvido__cedenciales__les"));


/*=========================================================
=            Activar desactivar modificaciones            =
=========================================================*/

var cambiar__select__modificaciones=function(parametro1,parametro2,parametro3,parametro4,parametro5){

	$(parametro1).on('change', function () {

		if ($(this).val()=="no") {
			$(".necesita__editarse__sin__montos").show();
		}else{
			$(".necesita__editarse__sin__montos").hide();
		}

	});

}
cambiar__select__modificaciones($("#opcion__liberar__deportivas"));


/*=====  End of Activar desactivar modificaciones  ======*/


});