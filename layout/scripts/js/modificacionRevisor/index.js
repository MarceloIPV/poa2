$(document).ready(function () {

$(".alto__contenedor__visual").hide();
$(".desarrollo__contenedor__visual").hide();
$(".instalaciones__contenedor__visual").hide();
$(".administrativo__contenedor__visual").hide();
$(".planificacion__contenedor__visual").hide();

$.getScript("layout/scripts/js/modificacionRevisor/datatablets.js",function(){
	datatablets($("#reasignacionModificaciones"),"reasignacionModificaciones",1);
	datatablets($("#reasignacionModificaciones__recomendaciones"),"reasignacionModificaciones__recomendaciones",2);
	datatablets($("#reasignacionModificaciones__recomendaciones__planificacion"),"reasignacionModificaciones__recomendaciones__planificacion",3);
	datatablets($("#reasignacionModificaciones__recomendaciones__planificacion__recomendacion"),"reasignacionModificaciones__recomendaciones__planificacion__recomendacion",4);
	datatablets($("#reasignacionModificaciones__recomendaciones__planificacion__recomendacion__quipux"),"reasignacionModificaciones__recomendaciones__planificacion__recomendacion__quipux",5);
	datatablets__funcio__repor($("#reasignacionModificaciones__recomendaciones__planificacion__general__organismo__funcionario"),"reasignacionModificaciones__recomendaciones__planificacion__general__organismo__funcionario",1);

	datatablets__organismo($("#reasignacionModificaciones__recomendaciones__planificacion__general__organismo"),"reasignacionModificaciones__recomendaciones__planificacion__general__organismo",1);

	datatablets($("#reasignacionModificaciones__infra"),"reasignacionModificaciones__infra",1);
	datatablets($("#reasignacionModificaciones__subsess"),"reasignacionModificaciones__subsess",1);

	datatablets($("#reasignacionModificaciones__recomendaciones__infra"),"reasignacionModificaciones__recomendaciones__infra",2);
	datatablets($("#reasignacionModificaciones__recomendaciones__subsess"),"reasignacionModificaciones__recomendaciones__subsess",2);

	datatablets__simple__modificaciones($("#reporteriaDefinitiva__c__modificaciones"),"reporteriaDefinitiva__c__modificaciones");

	datatablets($("#reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales"),"reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales",6);

	datatablets__generales__envios($("#reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales__doces"),"reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales__doces");

	datatablets__generales__envios__organismos($("#reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales__doces__organismos"),"reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales__doces__organismos");

	funcion__recomendar__planificacion__administrador__modificaciones($("#reporteriaDefinitiva__c__modificaciones__administrador"));

});

$.getScript("layout/scripts/js/modificacionRevisor/insertar.js",function(){
	asignar__lineas__modificaciones($("#enviarModificacionesC"),"formularioConfiguracion");
	recomendar__analista__lineas__modificaciones($("#enviarModificacionesArecomienda"),"formularioConfiguracion");
	recomendar__lineas__modificaciones($("#enviarModificacionesCRecomienda"),"formularioConfiguracion");
	recomendar__lineas__modificaciones__planificacion($("#enviarModificacionesPlanificacionC"),"formularioConfiguracion");
	recomendar__lineas__modificaciones__planificacion__analistas($("#enviarModificacionesArecomiendaPLanificacionRecomienda"),"formularioConfiguracion");
	no__corresponde__tramites($("#noCorresponde"),"formularioConfiguracion");
	recomendar__lineas__modificaciones__planificacion__quipux($("#enviarRecomendacionConQuipux"),"formularioConfiguracion");

	/*=================================================================
	=            Insertar modificaciones guardados totales            =
	=================================================================*/
	
	enviar__modificaciones__globales__aprobadas($("#guardarDocu__altoRendimiento"),$("#documentoAltoRendimiento"),"Alto rendimiento","altoRendimiento","documentoAlto",$(".guardado__altoRendimiento"));
	
	enviar__modificaciones__globales__aprobadas($("#guardarDocu__subsecretariaFisica"),$("#documentoSubsecretariaFisica"),"Subsecretaría de desarrollo","desarrollo","documentoDesarrollo",$(".guardado__subsecretariFisica"));

	enviar__modificaciones__globales__aprobadas($("#guardarDocu__infraestructura"),$("#documentoInfraestructura"),"Infraestructura","infraestructura","documentoInfraestructura",$(".guardado__infraestructura"));

	enviar__modificaciones__globales__aprobadas($("#guardarDocu__instalaciones"),$("#documentoInstalaciones"),"Instalaciones","instalaciones","documentoInstalaciones",$(".guardado__instalaciones"));

	enviar__modificaciones__globales__aprobadas($("#guardarDocu__administrativoFinanciero"),$("#documentoAdministrativoFinanciero"),"Administrativo Financiero","administrativo","documentoAdministrativo",$(".guardado__administrativoFinanciero"));

	enviar__modificaciones__globales__aprobadas($("#guardarDocu__planificacion"),$("#documentoPlanificacion"),"Planificación","planificacion","documentoPlanificacion",$(".guardado__planificacion"));


	enviar__modificaciones__globales__aprobadas($("#guardarDocu__notificacion"),$("#documentoNotificacion"),"Notificación","notificaciones","documentoQuipu",$(".guardado__notificacion"));

	/*=====  End of Insertar modificaciones guardados totales  ======*/

	/*===============================
	=            Selects            =
	===============================*/
	
	cambiarSelects($("#correspondeAlto"),$(".alto__contenedor__visual"));
	cambiarSelects($("#correspondeDesarrollo"),$(".desarrollo__contenedor__visual"));
	cambiarSelects($("#correspondeInstalaciones"),$(".instalaciones__contenedor__visual"));
	cambiarSelects($("#correspondeAdministrativo"),$(".administrativo__contenedor__visual"));
	cambiarSelects($("#correspondePlanificacion"),$(".planificacion__contenedor__visual"));
	
	/*=====  End of Selects  ======*/
	

	guardar__guardado__general__dir__planificacion($("#guardarTotal__aprobadoModificaciones"));

});  



});
