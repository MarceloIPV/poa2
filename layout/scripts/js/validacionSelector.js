$(document).ready(function () {

/*=========================================
=            Valida Selectores            =
=========================================*/


var provincias=function(parametro1){

	indicador=1;

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

provincias($("#provinciaOrganismo"));

var organismos__seguimiento=function(parametro1){

	indicador=50;

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

organismos__seguimiento($("#organismosSegumiento"));


var cantones=function(parametro1,parametro2){

	$(parametro2).change(function(){

		$(".ocultos__origenesD").hide();

		indicador=2;

		provincia=$(this).val();

		$.ajax({

		  data: {indicador:indicador,provincia:provincia},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

		  $(parametro1).html(listar__lugar);

		}).fail(function(){

		  

		});


	});

}

cantones($("#cantonOrganismo"),$("#provinciaOrganismo"));


var parroquias=function(parametro1,parametro2){

	$(parametro2).change(function(){

		indicador=3;

		canton=$(this).val();

		$.ajax({

		  data: {indicador:indicador,canton:canton},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

		  $(parametro1).html(listar__lugar);

		}).fail(function(){

		  

		});


	});

}

parroquias($("#parroquiaOrganismo"),$("#cantonOrganismo"));


var provinciasDefault=function(parametro1,parametro2){


	indicador=1;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(listar__lugar);
	  $(parametro1).val(parametro2);

	}).fail(function(){

	  

	});

}

provinciasDefault($("#provinciaDatos"),$("#idPronvincia").val());


var cantonesDefault=function(parametro1,parametro2){

	indicador=5;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(listar__lugar);
	  $(parametro1).val(parametro2);

	}).fail(function(){

	  

	});

}

cantonesDefault($("#cantonDatos"),$("#idCanton").val());

var parroquiasDefault=function(parametro1,parametro2){

	indicador=6;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(listar__lugar);
	  $(parametro1).val(parametro2);

	}).fail(function(){

	  

	});

}

parroquiasDefault($("#parroquiaDatos"),$("#idParroquia").val());


var tipoOrganismos=function(parametro1){

	indicador=11;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);




	}).fail(function(){

	  

	});

}

tipoOrganismos($("#tiposOrganimosDeportivos"));



var tipoOrganismosDos=function(parametro1,parametro2){

	indicador=11;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);



	if ($(parametro2).val()!="") {

		$(parametro1).val(parametro2);

	}

	}).fail(function(){

	  

	});

}

tipoOrganismosDos($("#tiposOrganimosDeportivos__Group"),$("#tipoOrganismo").val());


var areaDeAccion=function(parametro1){

	indicador=8;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

areaDeAccion($(".select__1"));



var objetivosSelects=function(parametro1){

	indicador=9;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

objetivosSelects($(".select__2"));

var areaEncargadas=function(parametro1){

	indicador=10;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

areaEncargadas($(".select__3"));


var numerosPeriodos=function(parametro1){

	indicador=12;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

numerosPeriodos($(".periodoAsignacion"));

var gruposGastos=function(parametro1){

	indicador=13;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

gruposGastos($(".select__grupoG"));

var indicadoresS=function(parametro1){

	indicador=20;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

indicadoresS($(".select__indiCadores"));


var selectLineaPolitica=function(parametro1){

	indicador=15;

	$.ajax({

		data: {indicador:indicador},
		dataType: 'html',
		type:'POST',
		url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

		$(parametro1).html(listar__lugar);

	}).fail(function(){});

}

selectLineaPolitica($(".select__2Objetivos"));	

/*=====  End of Valida Selectores  ======*/



var tipoOrgaData=function(parametro1){

	indicador=11;

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

tipoOrgaData($(".select__tipoOrga"));

/*======================================
=            Modificaciones            =
======================================*/

var actividadesModificaciones=function(parametro1,parametro2){


	indicador=43;

	$.ajax({

	  data: {indicador:indicador,idOrganismo:parametro2},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(modificas){

	  $(parametro1).html(modificas);

	}).fail(function(){});

}

actividadesModificaciones($("#actividadesMo"),$("#organismoIdPrin").val());

/*=====  End of Modificaciones  ======*/


/*========================================
=            Modificaciones 2            =
========================================*/

var itemsModificaciones=function(parametro1,parametro2,parametro3){

	$(parametro1).change(function(){

		indicador=44;

		idActividades=$(this).val();

		$(parametro2).html("");

		$.ajax({

		  data: {indicador:indicador,idOrganismo:parametro3,idActividades:idActividades},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(modificas){

		  $(parametro2).html(modificas);

		}).fail(function(){});

	});

}

itemsModificaciones($("#actividadesMo"),$("#itemsMo"),$("#organismoIdPrin").val());

/*=====  End of Modificaciones 2  ======*/


/*==========================================
=            Areas responsables            =
==========================================*/

var areasresponsables__proyectos=function(parametro1,parametro2){


	indicador=45;

	$.ajax({

	  data: {indicador:indicador,idOrganismo:parametro2},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(modificas){

	  $(parametro1).html(modificas);

	}).fail(function(){});

}

areasresponsables__proyectos($("#area__responsable"),$("#organismoIdPrin").val());

/*=====  End of Areas responsables  ======*/

/*==================================================
=            Segun el estatus mencinado            =
==================================================*/

var proyectos__funcionarios=function(parametro1,parametro2){

	$(parametro1).change(function(){

		indicador=46;

		idFisicamente=$(this).val();

		$.ajax({

		  data: {indicador:indicador,idFisicamente:idFisicamente},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(modificas){

		  $(parametro2).html(modificas);

		}).fail(function(){});

	});

}

proyectos__funcionarios($("#area__responsable"),$("#lider__proyecto"));

/*=====  End of Segun el estatus mencinado  ======*/

/*==========================================
=            Segund lo referido            =
==========================================*/

var proyectos__accecibles=function(parametro1){

	indicador=49;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

proyectos__accecibles($("#proyectos__escogidos__activities"));

/*=====  End of Segund lo referido  ======*/

/*==========================================
=            Selects superiores    2        =
==========================================*/

var superioresSelects=function(parametro1){

	let idUsuarioC=$("#idUsuarioC").val();

	indicador=59;

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

superioresSelects($("#selects__superiores__subsess"));

/*=====  End of Selects superiores 2 ======*/


/*==========================================
=            Selects superiores            =
==========================================*/

var superioresSelects=function(parametro1){

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

superioresSelects($("#selects__superiores"));

/*=====  End of Selects superiores  ======*/

/*===================================================
=            Regresar superiores selects            =
===================================================*/

var superioresSelects__regresar=function(parametro1){

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

superioresSelects__regresar($("#selects__superiores__regresar"));

/*=====  End of Regresar superiores selects  ======*/

/*===============================================
=            Solo subsecretario alto            =
===============================================*/

var subsess__altos=function(parametro1){

	let idUsuarioC=$("#idUsuarioC").val();

	indicador=65;

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

subsess__altos($("#selects__superiores__regresar__coors"));



var subsess__subses__act__fisica=function(parametro1){

	let idUsuarioC=$("#idUsuarioC").val();

	indicador=66;

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

subsess__subses__act__fisica($("#selects__superiores__regresar__coors__acFisicas"));



var area__encargada__paid__s=function(parametro1){


	indicador=104;
	let variables=$("#valorComparativo").val();

	$.ajax({

	  data: {indicador:indicador,variables:variables},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

area__encargada__paid__s($(".input__2__tipoPaid"));


var area__paid__paid__s=function(parametro1){


	indicador=105;
	let variables=$("#valorComparativo").val();

	$.ajax({

	  data: {indicador:indicador,variables:variables},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

area__paid__paid__s($(".input__3__tipoPaid"));




var area__paid__paid__s__paid__rubros=function(parametro1){


	indicador=107;
	let variables=$("#valorComparativo").val();

	$.ajax({

	  data: {indicador:indicador,variables:variables},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

area__paid__paid__s__paid__rubros($(".input__2__rubroPaid"));



var area__paid__paid__s__paid__rubros__2=function(parametro1){


	indicador=108;
	let variables=$("#valorComparativo").val();

	$.ajax({

	  data: {indicador:indicador,variables:variables},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

area__paid__paid__s__paid__rubros__2($(".input__3__rubroPaid"));




var rubros__selector__asignacion__paid=function(parametro1){

	indicador=109;
	let variables=$("#valorComparativo").val();

	$.ajax({

	  data: {indicador:indicador,variables:variables},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

rubros__selector__asignacion__paid($("#selector__rubros"));


var asignacion__usuarios__re=function(parametro1){


	indicador=110;
	let idUsuario=$("#idUsuarioPrincipal").val();

	$.ajax({

	  data: {indicador:indicador,idUsuario:idUsuario},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

asignacion__usuarios__re($("#selectorUsuarios__asignar"));

var asignacion__usuarios__re__contrarios=function(parametro1){


	indicador=500;
	let idUsuario=$("#idUsuarioPrincipal").val();

	$.ajax({

	  data: {indicador:indicador,idUsuario:idUsuario},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

asignacion__usuarios__re__contrarios($("#selectorUsuarios__asignar__contrarios"));

var asignacion__usuarios__re__contrarios__subsecretarios=function(parametro1){


	indicador=501;
	let idUsuario=$("#idUsuarioPrincipal").val();

	$.ajax({

	  data: {indicador:indicador,idUsuario:idUsuario},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

asignacion__usuarios__re__contrarios__subsecretarios($("#selectorUsuarios__asignar__contrarios__subsecretarias"));



var asignacion__usuarios__re__contrarios__subsecretarios__directores=function(parametro1){


	indicador=510;
	let idUsuario=$("#idUsuarioPrincipal").val();

	$.ajax({

	  data: {indicador:indicador,idUsuario:idUsuario},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

asignacion__usuarios__re__contrarios__subsecretarios__directores($("#selectorUsuarios__asignar__plani__directores"));



var asignacion__usuarios__re__contrarios__subsecretarios__analistas=function(parametro1){


	indicador=511;
	let idUsuario=$("#idUsuarioPrincipal").val();

	$.ajax({

	  data: {indicador:indicador,idUsuario:idUsuario},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(lista_tipo__organismos){

	  $(parametro1).html(lista_tipo__organismos);


	}).fail(function(){

	  

	});

}

asignacion__usuarios__re__contrarios__subsecretarios__analistas($("#selectorUsuarios__asignar__plani__analistas"));

/*=====  End of Solo subsecretario alto  ======*/



});