<?php

extract($_POST);


define('CONTROLADOR7', '../../conexion/');

require_once CONTROLADOR7.'conexion.php';

require_once "../../config/config2.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$anio = date('Y');

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	
	
	/*=====  End of Parametros Iniciales  ======*/
	

	session_start();
	$idOrganismo= $_SESSION["idOrganismoSession"];
	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$objeto= new usuarioAcciones();

	switch ($tipo) {


		case  "valorFaltante":


		$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT ($montos - sum(valorTotal)) as valorFaltante FROM poa_paid_general where idOrganismo='$idOrganismo' and idRubros=$idRubros and perioIngreso='$aniosPeriodos__ingesos';");

		$jason['obtenerInformacion']=$obtenerInformacion;

		break;	


		


		case  "rubrosEAobservador":

		$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT opcion1,opcion2,opcion3,opcion4,opcion5,opcion6,opcion7,opcion8,opcion9,opcion10,comentario1,comentario2,comentario3,comentario4,comentario5,comentario6,comentario7,comentario8,comentario9,comentario10,idTipo FROM poa_paid_comentarios_observaciones WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idComentarios DESC LIMIT 1;");
		$jason['obtenerInformacion']=$obtenerInformacion;

		break;	

	}

	echo json_encode($jason);





