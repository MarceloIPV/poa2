<?php
	
	extract($_POST);

	require_once "../../config/config2.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');

	
	/*=====  End of Parametros Iniciales  ======*/
	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	$objeto= new usuarioAcciones();

	switch ($tipo) {



		case "completa__informacion__salarios":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.cedula,a.cargo,a.tipoCargo,a.tiempoTrabajo,a.sueldoSalario,a.aportePatronal,a.decimoTercera,a.mensualizaTercera,a.decimoCuarta,a.menusalizaCuarta,a.fondosReserva,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.total FROM poa_sueldossalarios2022 AS a WHERE a.idSueldos='$idSueldos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion']=$indicadorInformacion;

		break;	


	}

	echo json_encode($jason);



