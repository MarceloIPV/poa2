<?php
	
	extract($_POST);
		
	session_start();

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

 
   $idOrganismoSession = $_SESSION["idOrganismoSession"];
	
	/*=====  End of Parametros Iniciales  ======*/


	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	$objeto= new usuarioAcciones();

	switch ($tipo) {



		case "completa__informacion__salarios":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idSueldos,a.nombres,a.cedula,a.cargo,a.tipoCargo,a.tiempoTrabajo,a.sueldoSalario,a.aportePatronal,a.decimoTercera,a.mensualizaTercera,a.decimoCuarta,a.menusalizaCuarta,a.fondosReserva,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.total FROM poa_sueldossalarios2022 AS a WHERE a.idSueldos='$idSueldos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion']=$indicadorInformacion;

		break;	

		case "completa__informacion__itemPresupuestario":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT $meses2 as valorMes FROM poa_programacion_financiera where idOrganismo='$idOrganismoSession' and idActividad='$idActividad' and idProgramacionFinanciera='$itemPreesupuestario' AND perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion']=$indicadorInformacion;

		break;	



	}

	echo json_encode($jason);





