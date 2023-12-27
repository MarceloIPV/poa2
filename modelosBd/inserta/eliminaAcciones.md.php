<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	require_once "../../config/files.php";

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

		case  "eliminar__modificacion__linea__adminsitradores":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$elimina=$objeto->getElimina('poa_item_actividad_bloqueo','idBloqueo',$idEnvio);
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__modificacion__linea":

			// /*==============================
			// =            Orígen            =
			// ==============================*/
			
			// $informacionOrigen=$objeto->getObtenerInformacionGeneral("SELECT idOrigenDestino,actividadOrigen,eventosOrigen,idFinancierioOrigen,eneroOrigen,febreroOrigen,marzoOrigen,abrilOrigen,mayoOrigen,junioOrigen,julioOrigen,agostoOrigen,septiembreOrigen,octubreOrigen,noviembreOrigen,diciembreOrigen,totalOrigen,eneroOrigen__restando,febreroOrigen__restando,marzoOrigen__restando,abrilOrigen__restando,mayoOrigen__restando,junioOrigen__restando,julioOrigen__restando,agostoOrigen__restando,septiembreOrigen__restando,octubreOrigen__restando,noviembreOrigen__restando,diciembreOrigen__restando,salarioOrigen,aportePatronalOrigen,decimoTerceroOrigen,decimoCuartoOrigen,fondosDeReservaOrigen,identificadorPaginaReal,idOrganismo FROM poa_modificaciones_origen_destino WHERE idOrigenDestino='$idEnvio';");

			// if ($informacionOrigen[0][actividadOrigen]=="1") {
				
			// 	$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// }else if($informacionOrigen[0][actividadOrigen]=="2"){

			// 	$obtencionRetorno__mantenimiento=$objeto->actualizarProgramacion__matenimiento__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// 	$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// }else if($informacionOrigen[0][actividadOrigen]=="3" || $informacionOrigen[0][actividadOrigen]=="5" || $informacionOrigen[0][actividadOrigen]=="6" || $informacionOrigen[0][actividadOrigen]=="7" && ($informacionOrigen[0][actividadOrigen]=="4" && $informacionOrigen[0][identificadorPaginaReal]=="diferentes")){

			// 	$obtencionRetorno__actividadesDeportivas=$objeto->actualizarProgramacion__actividades__deportivas__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// 	$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// }else if($informacionOrigen[0][actividadOrigen]=="4" && ($informacionOrigen[0][identificadorPaginaReal]=="honorarios" || $informacionOrigen[0][identificadorPaginaReal]=="honorarios__item")){

			// 	$obtencionRetorno__honorarios=$objeto->actualizarProgramacion__actividades__deportivas__honorarios__origen($informacionOrigen[0][eventosOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// 	$informacioOrigen__llamada=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera AS idFinancierioOrigen  FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='71' AND perioIngreso='$aniosPeriodos__ingesos';");
				
			// 	$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacioOrigen__llamada[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);


			// }else if($informacionOrigen[0][actividadOrigen]=="4" && ($informacionOrigen[0][identificadorPaginaReal]=="sueldos" || $informacionOrigen[0][identificadorPaginaReal]=="sueldos__item" || $informacionOrigen[0][identificadorPaginaReal]=="desvinculacion")){

			// 	$obtencionRetorno__sueldos=$objeto->actualizarProgramacion__actividades__deportivas__sueldos__origen($informacionOrigen[0][eventosOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// 	/*======================================
			// 	=            Bonificaciones            =
			// 	======================================*/

			// 	/*=======================================
			// 	=            Aporte patronal            =
			// 	=======================================*/
				
			// 	$origen__aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='38' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$origen__aportePatronal__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='aporte' AND estado='origen';");
								
				
			// 	$obtencionRetornoAporte=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__aportePatronal[0][idProgramacionFinanciera],[$origen__aportePatronal__2[0][enero],$origen__aportePatronal__2[0][febrero],$origen__aportePatronal__2[0][marzo],$origen__aportePatronal__2[0][abril],$origen__aportePatronal__2[0][mayo],$origen__aportePatronal__2[0][junio],$origen__aportePatronal__2[0][julio],$origen__aportePatronal__2[0][agosto],$origen__aportePatronal__2[0][septiembre],$origen__aportePatronal__2[0][octubre],$origen__aportePatronal__2[0][noviembre],$origen__aportePatronal__2[0][diciembre]]);
				
			// 	/*=====  End of Aporte patronal  ======*/
				
			// 	/*============================================
			// 	=            Décimo tercer sueldo            =
			// 	============================================*/
								
			// 	$origen__tercer=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='53' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$origen__tercer__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='decimoTercer' AND estado='origen';");


			// 	$obtencionRetornoTercero=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__tercer[0][idProgramacionFinanciera],[$origen__tercer__2[0][enero],$origen__tercer__2[0][febrero],$origen__tercer__2[0][marzo],$origen__tercer__2[0][abril],$origen__tercer__2[0][mayo],$origen__tercer__2[0][junio],$origen__tercer__2[0][julio],$origen__tercer__2[0][agosto],$origen__tercer__2[0][septiembre],$origen__tercer__2[0][octubre],$origen__tercer__2[0][noviembre],$origen__tercer__2[0][diciembre]]);

				
			// 	/*=====  End of Décimo tercer sueldo  ======*/
				

			// 	/*=====================================
			// 	=            Décimo cuarto            =
			// 	=====================================*/
				
			// 	$origen__cuarto=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='52' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$origen__cuarto__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='decimoCuarto' AND estado='origen';");	


			// 	$obtencionRetornoCuarto=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__cuarto[0][idProgramacionFinanciera],[$origen__cuarto__2[0][enero],$origen__cuarto__2[0][febrero],$origen__cuarto__2[0][marzo],$origen__cuarto__2[0][abril],$origen__cuarto__2[0][mayo],$origen__cuarto__2[0][junio],$origen__cuarto__2[0][julio],$origen__cuarto__2[0][agosto],$origen__cuarto__2[0][septiembre],$origen__cuarto__2[0][octubre],$origen__cuarto__2[0][noviembre],$origen__cuarto__2[0][diciembre]]);			
				
			// 	/*=====  End of Décimo cuarto  ======*/
				

			// 	/*=========================================
			// 	=            Fondos de reserva            =
			// 	=========================================*/
				
								
			// 	$origen__fondos=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='65' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$origen__fondos__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");

			// 	$obtencionRetornoFondos=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__fondos[0][idProgramacionFinanciera],[$origen__fondos__2[0][enero],$origen__fondos__2[0][febrero],$origen__fondos__2[0][marzo],$origen__fondos__2[0][abril],$origen__fondos__2[0][mayo],$origen__fondos__2[0][junio],$origen__fondos__2[0][julio],$origen__fondos__2[0][agosto],$origen__fondos__2[0][septiembre],$origen__fondos__2[0][octubre],$origen__fondos__2[0][noviembre],$origen__fondos__2[0][diciembre]]);		

				
			// 	/*=====  End of Fondos de reserva  ======*/
				
				
			// 	/*================================
			// 	=            Salarios            =
			// 	================================*/
				
			// 	$origen__salarios=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='97' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$origen__salarios__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");


			// 	$obtencionRetornoSalarios=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__salarios[0][idProgramacionFinanciera],[$origen__salarios__2[0][enero],$origen__salarios__2[0][febrero],$origen__salarios__2[0][marzo],$origen__salarios__2[0][abril],$origen__salarios__2[0][mayo],$origen__salarios__2[0][junio],$origen__salarios__2[0][julio],$origen__salarios__2[0][agosto],$origen__salarios__2[0][septiembre],$origen__salarios__2[0][octubre],$origen__salarios__2[0][noviembre],$origen__salarios__2[0][diciembre]]);		

				
			// 	/*=====  End of Salarios  ======*/
				

			// 	/*=====  End of Bonificaciones  ======*/


			// }

			
			// /*=====  End of Orígen  ======*/
			

			// /*===============================
			// =            Destino            =
			// ===============================*/
			
			// $informacioDestino=$objeto->getObtenerInformacionGeneral("SELECT idOrigenDestino,actividadDestino,eventosDestino,idFinancierioDestino,eneroDestino,febreroDestino,marzoDestino,abrilDestino,mayoDestino,junioDestino,julioDestino,agostoDestino,septiembreDestino,octubreDestino,noviembreDestino,diciembreDestino,totalDestino,eneroDestino__sumando,febreroDestino__sumando,marzoDestino__sumando,abrilDestino__sumando,mayoDestino__sumando,junioDestino__sumando,julioDestino__sumando,agostoDestino__sumando,septiembreDestino__sumando,octubreDestino__sumando,noviembreDestino__sumando,diciembreDestino__sumando,sueldoDestino,aportePatronalDestino,decimoTerceraDestino,decimoCuartaDestino,fondosReservaDestino,identificadorPaginaReal,idOrganismo FROM poa_modificaciones_origen_destino WHERE idOrigenDestino='$idEnvio';");


			// if ($informacioDestino[0][actividadDestino]=="1") {
				
			// 	$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			// }else if($informacioDestino[0][actividadDestino]=="2"){

			// 	$obtencionRetorno__mantenimiento__destino=$objeto->actualizarProgramacion__matenimiento__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			// 	$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			// }else if($informacioDestino[0][actividadDestino]=="3" || $informacioDestino[0][actividadDestino]=="5" || $informacioDestino[0][actividadDestino]=="6" || $informacioDestino[0][actividadDestino]=="7" && ($informacioDestino[0][actividadDestino]=="4" && $informacioDestino[0][identificadorPaginaReal]=="diferentes")){

			// 	$obtencionRetorno__actividadesDeportivas__destino=$objeto->actualizarProgramacion__actividades__deportivas__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			// 	$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			// }else if($informacioDestino[0][actividadDestino]=="4" && ($informacioDestino[0][identificadorPaginaReal]=="honorarios" || $informacioDestino[0][identificadorPaginaReal]=="honorarios__item")){

			// 	$obtencionRetorno__honorarios__destino=$objeto->actualizarProgramacion__actividades__deportivas__honorarios__destino($informacioDestino[0][eventosDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			// 	$informacioDestino__llamada=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera AS idFinancierioDestino  FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='71' AND perioIngreso='$aniosPeriodos__ingesos';");

			// 	$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino__llamada[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);
				

			// }else if($informacioDestino[0][actividadDestino]=="4" && ($informacioDestino[0][identificadorPaginaReal]=="sueldos" || $informacioDestino[0][identificadorPaginaReal]=="sueldos__item" || $informacioDestino[0][identificadorPaginaReal]=="desvinculacion")){


			// 	$obtencionRetorno__sueldos=$objeto->actualizarProgramacion__actividades__deportivas__sueldos__destino($informacionOrigen[0][eventosOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			// 	/*======================================
			// 	=            Bonificaciones            =
			// 	======================================*/

			// 	/*=======================================
			// 	=            Aporte patronal            =
			// 	=======================================*/
				
			// 	$destino__aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='38' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$destino__aportePatronal__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='aporte' AND estado='origen';");
								
				
			// 	$obtencionRetornoAporte=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__aportePatronal[0][idProgramacionFinanciera],[$destino__aportePatronal__2[0][enero],$destino__aportePatronal__2[0][febrero],$destino__aportePatronal__2[0][marzo],$destino__aportePatronal__2[0][abril],$destino__aportePatronal__2[0][mayo],$destino__aportePatronal__2[0][junio],$destino__aportePatronal__2[0][julio],$destino__aportePatronal__2[0][agosto],$destino__aportePatronal__2[0][septiembre],$destino__aportePatronal__2[0][octubre],$destino__aportePatronal__2[0][noviembre],$destino__aportePatronal__2[0][diciembre]]);
				
			// 	/*=====  End of Aporte patronal  ======*/
				
			// 	/*============================================
			// 	=            Décimo tercer sueldo            =
			// 	============================================*/
								
			// 	$destino__tercer=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='53' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$destino__tercer__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='decimoTercer' AND estado='origen';");


			// 	$obtencionRetornoTercero=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__tercer[0][idProgramacionFinanciera],[$destino__tercer__2[0][enero],$destino__tercer__2[0][febrero],$destino__tercer__2[0][marzo],$destino__tercer__2[0][abril],$destino__tercer__2[0][mayo],$destino__tercer__2[0][junio],$destino__tercer__2[0][julio],$destino__tercer__2[0][agosto],$destino__tercer__2[0][septiembre],$destino__tercer__2[0][octubre],$destino__tercer__2[0][noviembre],$destino__tercer__2[0][diciembre]]);

				
			// 	/*=====  End of Décimo tercer sueldo  ======*/
				

			// 	/*=====================================
			// 	=            Décimo cuarto            =
			// 	=====================================*/
				
			// 	$destino__cuarto=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='52' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$destino__cuarto__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='decimoCuarto' AND estado='origen';");	


			// 	$obtencionRetornoCuarto=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__cuarto[0][idProgramacionFinanciera],[$destino__cuarto__2[0][enero],$destino__cuarto__2[0][febrero],$destino__cuarto__2[0][marzo],$destino__cuarto__2[0][abril],$destino__cuarto__2[0][mayo],$destino__cuarto__2[0][junio],$destino__cuarto__2[0][julio],$destino__cuarto__2[0][agosto],$destino__cuarto__2[0][septiembre],$destino__cuarto__2[0][octubre],$destino__cuarto__2[0][noviembre],$destino__cuarto__2[0][diciembre]]);			
				
			// 	/*=====  End of Décimo cuarto  ======*/
				

			// 	/*=========================================
			// 	=            Fondos de reserva            =
			// 	=========================================*/
				
								
			// 	$destino__fondos=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='65' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$destino__fondos__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");

			// 	$obtencionRetornoFondos=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__fondos[0][idProgramacionFinanciera],[$destino__fondos__2[0][enero],$destino__fondos__2[0][febrero],$destino__fondos__2[0][marzo],$destino__fondos__2[0][abril],$destino__fondos__2[0][mayo],$destino__fondos__2[0][junio],$destino__fondos__2[0][julio],$destino__fondos__2[0][agosto],$destino__fondos__2[0][septiembre],$destino__fondos__2[0][octubre],$destino__fondos__2[0][noviembre],$destino__fondos__2[0][diciembre]]);		

				
			// 	/*=====  End of Fondos de reserva  ======*/
				
				
			// 	/*================================
			// 	=            Salarios            =
			// 	================================*/
				
			// 	$destino__salarios=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='97' AND perioIngreso='$aniosPeriodos__ingesos';");
			// 	$destino__salarios__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");


			// 	$obtencionRetornoSalarios=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__salarios[0][idProgramacionFinanciera],[$destino__salarios__2[0][enero],$destino__salarios__2[0][febrero],$destino__salarios__2[0][marzo],$destino__salarios__2[0][abril],$destino__salarios__2[0][mayo],$destino__salarios__2[0][junio],$destino__salarios__2[0][julio],$destino__salarios__2[0][agosto],$destino__salarios__2[0][septiembre],$destino__salarios__2[0][octubre],$destino__salarios__2[0][noviembre],$destino__salarios__2[0][diciembre]]);		

				
			// 	/*=====  End of Salarios  ======*/
				

			// 	/*=====  End of Bonificaciones  ======*/

			// }
			

			// /*=====  End of Destino  ======*/
			

			$elimina=$objeto->getElimina('poa_modificaciones_origen_destino','idOrigenDestino',$idEnvio);
			$elimina2=$objeto->getElimina('poa_modificacion_bonificacion','idOrigenDestino',$idEnvio);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__componente__rubros__principales__s":

			$elimina2=$objeto->getElimina('poa_paid_componentes_rubros','idComponente',$idEnviado);
			$elimina=$objeto->getElimina('poa_paid_componentes','idComponentes',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemsPoaEliminas":

			$elimina=$objeto->getElimina('poa_programacion_financiera','idProgramacionFinanciera',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__componente__rubros__s":

			$elimina=$objeto->getElimina('poa_paid_componentes_rubros','idComponentesRubros',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminantes__mant__tenimientos":

			$informacion__obtenidas=$objeto->getObtenerInformacionGeneral("SELECT a.*,b.*,c.nombreItem,c.idItem,d.nombreProvincia FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN in_md_provincias AS d ON d.idProvincia=a.provincia WHERE a.idMantenimiento='$idMantenimiento';");

			$idItems__s=$informacion__obtenidas[0][idItem];

			$informacion__obtenidas__2=$objeto->getObtenerInformacionGeneral("SELECT a.*,b.*,c.nombreItem,c.idItem,d.nombreProvincia FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN in_md_provincias AS d ON d.idProvincia=a.provincia WHERE b.idItem='$idItems__s' AND b.idActividad='2' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$enero__r=floatval($informacion__obtenidas__2[0][enero]) - floatval($informacion__obtenidas[0][enero]);
			$febrero__r=floatval($informacion__obtenidas__2[0][febrero]) - floatval($informacion__obtenidas[0][febrero]);
			$marzo__r=floatval($informacion__obtenidas__2[0][marzo]) - floatval($informacion__obtenidas[0][marzo]);
			$abril__r=floatval($informacion__obtenidas__2[0][abril]) - floatval($informacion__obtenidas[0][abril]);
			$mayo__r=floatval($informacion__obtenidas__2[0][mayo]) - floatval($informacion__obtenidas[0][mayo]);
			$junio__r=floatval($informacion__obtenidas__2[0][junio]) - floatval($informacion__obtenidas[0][junio]);
			$julio__r=floatval($informacion__obtenidas__2[0][julio]) - floatval($informacion__obtenidas[0][julio]);
			$agosto__r=floatval($informacion__obtenidas__2[0][agosto]) - floatval($informacion__obtenidas[0][agosto]);
			$septiembre__r=floatval($informacion__obtenidas__2[0][septiembre]) - floatval($informacion__obtenidas[0][septiembre]);
			$octubre__r=floatval($informacion__obtenidas__2[0][octubre]) - floatval($informacion__obtenidas[0][octubre]);
			$noviembre__r=floatval($informacion__obtenidas__2[0][noviembre]) - floatval($informacion__obtenidas[0][noviembre]);
			$diciembre__r=floatval($informacion__obtenidas__2[0][diciembre]) - floatval($informacion__obtenidas[0][diciembre]);

			$totales__diferencias=floatval($informacion__obtenidas__2[0][totalTotales]) - floatval($informacion__obtenidas[0][totalTotales]);


			$valores=array("enero='$enero__r',febrero='$febrero__r',marzo='$marzo__r',abril='$abril__r',mayo='$mayo__r',junio='$junio__r',julio='$julio__r',agosto='$agosto__r',septiembre='$septiembre__r',octubre='$octubre__r',noviembre='$noviembre__r',diciembre='$diciembre__r',totalSumaItem='$totales__diferencias',totalTotales='$totales__diferencias'");
			$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$informacion__obtenidas__2[0][idProgramacionFinanciera]);


			$elimina=$objeto->getElimina('poa_mantenimiento','idMantenimiento',$idMantenimiento);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "rubrosElimina":

			$elimina=$objeto->getElimina('poa_paid_rubros','idRubros',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "categoriaElimina":

			$elimina=$objeto->getElimina('poa_paid_categoria','idCategoria',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "pruebaElimina":

			$elimina=$objeto->getElimina('poa_paid_prueba','idPrueba',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "modalidadElimina":

			$elimina=$objeto->getElimina('poa_paid_modalidad','idModalidad',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "deportePaidElimina":

			$elimina=$objeto->getElimina('poa_deporte','idDeporte',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemAcEliminaRubros":

			$elimina=$objeto->getElimina('poa_paid_rubros_items','idRubrosItems',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "indicadorElimina":

			$elimina=$objeto->getElimina('poa_paid_indicadores','idIndicadores',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrElimina":

			$elimina=$objeto->getElimina('poa_paid_tipo_organismo','idTipoOrganismo',$paid2);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "accionElimina":


			$elimina=$objeto->getElimina('poa_paid_area_accion','idAreaAccion',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "encargadaElimina":

			$elimina=$objeto->getElimina('poa_paid_areaencargada','idAreaEncargada',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		
		case  "estrategicosElimina":


			$elimina=$objeto->getElimina('poa_paid_objetivos_estrategicos','idObjetivoEstrategico',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemElimina":


			$elimina=$objeto->getElimina('poa_paid_item','idItem',$idEnviado2);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "componenteElimina":


			$elimina=$objeto->getElimina('poa_paid_componentes','idComponentes',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "programaElimina":


			$elimina=$objeto->getElimina('poa_paid_programa','idPrograma',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__otros__faltosf__ver":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_competencia_alto WHERE idOtrosCompetenciasAltos='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosCompentencia_alto/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_competencia_alto','idOtrosCompetenciasAltos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "eliminar__altos2__seguimiento":

			$elimina=$objeto->getElimina('poa_seguimiento_competencia_alto2','idCompetenciaAltos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__otros__tecnico__recreativos__tecnicos":

			$elimina=$objeto->getElimina('poa_seguimiento_otros_recreativo_tecnicos','idOtrosRT',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;
		

		case  "eliminar__otros__formativo__ver":

			$elimina=$objeto->getElimina('poa_seguimiento_otros_competencia_formativos','idOtrosCompetenciasTecnicas',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;
		
		
		case  "eliminar__otros__tecnico__capacitacion__ver":

			$elimina=$objeto->getElimina('poa_seguimiento_otros_capacitacion_tecnico','idOtrosCapacitacionTecnico',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;
		

		case  "eliminar__otros__mantenimiento__tecnicos__ver":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_mantenimiento_tecnico WHERE idOtrosMantenimientoTecnico='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosMantenimiento__tecnicos/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_mantenimiento_tecnico','idOtrosMantenimientoTecnico',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__poa__pda__admin__nuevo":



			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$arrayIndicador = array();


	 		$queryRe="SELECT nombreEvento FROM poa_actdeportivas WHERE idPda='$idPda';";
			$resultadoRe = $conexionEstablecida->query($queryRe);

			while($registroRe = $resultadoRe->fetch()) {

				$nombreEventoR=$registroRe['nombreEvento'];

			}		
			

	 		$query="SELECT b.idPda,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.total FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idOrganismo='$idOrganismoPrincipal' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idItem='$parametros' AND b.nombreEvento='$nombreEventoR' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {

				$enero=$registro['enero'];
				$febrero=$registro['febrero'];
				$marzo=$registro['marzo'];
				$abril=$registro['abril'];
				$mayo=$registro['mayo'];
				$junio=$registro['junio'];
				$idPda=$registro['idPda'];
				$julio=$registro['julio'];
				$agosto=$registro['agosto'];
				$septiembre=$registro['septiembre'];
				$octubre=$registro['octubre'];
				$noviembre=$registro['noviembre'];
				$diciembre=$registro['diciembre'];

			}		
			

	 		$query__2="SELECT b.idPda,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.total FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idOrganismo='$idOrganismoPrincipal' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idItem='$parametros' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado__2 = $conexionEstablecida->query($query__2);

			while($registro__2 = $resultado__2->fetch()) {

				$enero__2=$registro__2['enero'];
				$febrero__2=$registro__2['febrero'];
				$marzo__2=$registro__2['marzo'];
				$abril__2=$registro__2['abril'];
				$mayo__2=$registro__2['mayo'];
				$junio__2=$registro__2['junio'];
				$idPda__2=$registro__2['idPda'];
				$julio__2=$registro__2['julio'];
				$agosto__2=$registro__2['agosto'];
				$septiembre__2=$registro__2['septiembre'];
				$octubre__2=$registro__2['octubre'];
				$noviembre__2=$registro__2['noviembre'];
				$diciembre__2=$registro__2['diciembre'];
				
			}	

			$eneroFinal=floatval($enero__2)	- floatval($enero);
			$febreroFinal=floatval($febrero__2)	- floatval($febrero);
			$marzoFinal=floatval($marzo__2)	- floatval($marzo);
			$abrilFinal=floatval($abril__2)	- floatval($abril);
			$mayoFinal=floatval($mayo__2)	- floatval($mayo);
			$junioFinal=floatval($junio__2)	- floatval($junio);
			$julioFinal=floatval($julio__2)	- floatval($julio);
			$agostoFinal=floatval($agosto__2)	- floatval($agosto);
			$septiembreFinal=floatval($septiembre__2)	- floatval($septiembre);
			$octubreFinal=floatval($octubre__2)	- floatval($octubre);
			$noviembreFinal=floatval($noviembre__2)	- floatval($noviembre);
			$diciembreFinal=floatval($diciembre__2)	- floatval($diciembre);

			$totalDerfinitovos=floatval($eneroFinal) + floatval($febreroFinal) + floatval($marzoFinal) + floatval($abrilFinal) + floatval($mayoFinal) + floatval($junioFinal) + floatval($julioFinal) + floatval($agostoFinal) + floatval($septiembreFinal) + floatval($octubreFinal) + floatval($noviembreFinal) + floatval($diciembreFinal);


			// $query__querys="UPDATE poa_programacion_financiera SET enero='$eneroFinal', febrero='$febreroFinal', marzo='$marzoFinal', abril='$abrilFinal', mayo='$mayoFinal', junio='$junioFinal', julio='$julioFinal', agosto='$agostoFinal', septiembre='$septiembreFinal', octubre='$octubreFinal', noviembre='$noviembreFinal', diciembre='$diciembreFinal', totalTotales='$totalDerfinitovos', totalSumaItem='$totalDerfinitovos' WHERE idOrganismo='$idOrganismoPrincipal' AND idActividad='$idActividad' AND perioIngreso='$aniosPeriodos__ingesos';";
			// $query__querys__re= $conexionEstablecida->exec($query__querys);


			$eliminar__querys="DELETE FROM poa_actdeportivas WHERE idPda='$idPda';";
			$eliminar__querys__re= $conexionEstablecida->exec($eliminar__querys);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__poa__administrativos__nuevo":

			$elimina=$objeto->getElimina('poa_actividadesadministrativas','idActividadAd',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;




		case  "eliminar__poa__administrativos__nuevo__facturas__man":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_mantenimiento WHERE idFacturaMantenimiento='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturasMantenimiento/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_facturas_mantenimiento','idFacturaMantenimiento',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__poa__mantenenimientos__nuevo":

			$elimina=$objeto->getElimina('poa_segimiento_mantenimiento','idMantenimiento',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__poa__honorarios__nuevo":

			$elimina=$objeto->getElimina('poa_honorarios2022','idHonorarios',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__poa__sueldos__nuevo":

			$elimina=$objeto->getElimina('poa_sueldossalarios2022','idSueldos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__poa__items__nuevo":

			$elimina=$objeto->getElimina('poa_poainicial','idPoaEnviado',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__poa__ingresado__nuevo":

			$elimina=$objeto->getElimina('poa_programacion_financiera_dos','idProgramacionFinanciera',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__implementacion__seguimiento":

			$elimina=$objeto->getElimina('poa_segimiento_implementacion','idImplementacion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__implementacion__seguimmientos__facturas__CAPACI":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_capacitacion WHERE idFacturaCapacitacion='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturasCapacitacion/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}

			$elimina=$objeto->getElimina('poa_seguimiento_facturas_capacitacion','idFacturaCapacitacion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__otros__capacitacion__ver":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_capacitacion WHERE idOtrosCapacitacion='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosCapacitacion/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_capacitacion','idOtrosCapacitacion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__sueldos__salarios__seguimiento__comprobantes":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT planilla,rol,comprobante FROM poa_seguimiento__comprobante WHERE idComprobante__general='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/planilla/'.$consulta[0][planilla])) {
			  // echo "si";
			} else {
			  // echo "no";
			}

			if(unlink(VARIABLE__BACKEND.'seguimiento/rol/'.$consulta[0][rol])) {
			  // echo "si";
			} else {
			  // echo "no";
			}



			if(unlink(VARIABLE__BACKEND.'seguimiento/comprobante/'.$consulta[0][comprobante])) {
			  // echo "si";
			} else {
			  // echo "no";
			}



			$elimina=$objeto->getElimina('poa_seguimiento__comprobante','idComprobante__general',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__restricciones__modificas":

			$elimina=$objeto->getElimina('poa_modificacion_actividad_administra_origen','idActividadModificacion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__mantenimientos__tecnicos":

			$elimina=$objeto->getElimina('poa_seguimiento_mantenimiento_tecnico','idMantenimientoTec',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__modifica__act":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_modificacion_organismo_actividades WHERE idModificacionOr='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/justifiacionActPrincipal/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_modificacion_organismo_actividades','idModificacionOr',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__recreacion__seguimiento":

			$elimina=$objeto->getElimina('poa_seguimiento_recreativo_tecnico','idCompetenciaSeguimiento',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__capacitacion__seguimiento__2":

			$elimina=$objeto->getElimina('poa_segimiento_capacitacion','idCapacitacion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__capacitacion__seguimiento":

			$elimina=$objeto->getElimina('poa_seguimiento_capacitacion_tecnico','idCapacitacionTec',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__altos__seguimiento":

			$elimina=$objeto->getElimina('poa_seguimiento_competencia_alto2','idCompetenciaAltos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "eliminar__formativos__seguimiento":

			$elimina=$objeto->getElimina('poa_seguimiento_competencia_formativo','idCompetenciaFormativo',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__recreacion__seguimiento__2":

			$elimina=$objeto->getElimina('poa_segimiento_recreativos','idRecreativos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__implementacion__seguimmientos__facturas__RECREATIVOS":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_recreativo WHERE idFacturaRecreativo='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturasRecreativo/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}



			$elimina=$objeto->getElimina('poa_seguimiento_facturas_recreativo','idFacturaRecreativo',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__otros__recreativo":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_recreativo WHERE idOtrosRecreativo='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosRecreativo/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_recreativo','idOtrosRecreativo',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__otros__implementacion":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_instalaciones WHERE idOtrosInstalaciones='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosInstalaciones/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_instalaciones','idOtrosInstalaciones',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__implementacion__seguimmientos__facturas":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	



			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_instalaciones WHERE idFacturaInstalaciones='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturasImplementacion/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}

			$elimina=$objeto->getElimina('poa_seguimiento_facturas_instalaciones','idFacturaInstalaciones',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;
		

		case  "eliminar__implementacion__seguimiento":


			$elimina=$objeto->getElimina('poa_segimiento_implementacion','idImplementacion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__competencias__seguimmientos__otros":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_competencia WHERE idOtrosCompetencia='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosCompentencia_alto/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_competencia','idOtrosCompetencia',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__competencias__seguimmientos__facturas":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_competencia WHERE idFacturaCompetencia='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturasCompetencias/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}



			$elimina=$objeto->getElimina('poa_seguimiento_facturas_competencia','idFacturaCompetencia',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__competencias__seguimiento":


			$elimina=$objeto->getElimina('poa_segimiento_competencias','idCompetencias',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__autogestion":


			$elimina=$objeto->getElimina('poa_segimiento_montos_autogestion','idMontosAutoGestion',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__otros__honorarios":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_honorarios WHERE idOtrosHonorarios='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosHonorarios/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_honorarios','idOtrosHonorarios',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__facturas__honorarios":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_honorarios WHERE idFacturaHonorarios='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturasHonorarios/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}



			$elimina=$objeto->getElimina('poa_seguimiento_facturas_honorarios','idFacturaHonorarios',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__otros__competencia__s":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_competencia WHERE idOtrosCompetencia='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosCompetencia/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}



			$elimina=$objeto->getElimina('poa_seguimiento_otros_competencia','idOtrosCompetencia',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__otros__mantenimiento":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_mantenimiento WHERE idOtrosMantenimiento='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosMantenimiento/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_mantenimiento','idOtrosMantenimiento',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__otros__administrativos":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_otros_administrativos WHERE idOtrosAdministrativos='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/otrosHabilitantes__administrativo/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}


			$elimina=$objeto->getElimina('poa_seguimiento_otros_administrativos','idOtrosAdministrativos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__facturas__administrativos":


			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_facturas_administrativo WHERE idFacturaAdministrativos='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/facturas__administrativo/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}
			

			$elimina=$objeto->getElimina('poa_seguimiento_facturas_administrativo','idFacturaAdministrativos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminaresigeft":


			$elimina=$objeto->getElimina('poa_esigef','idEsigef',$idEsiget);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__adminsitrativos__seguimiento":


			$elimina=$objeto->getElimina('poa_seguimiento_administrativo','idAdministrativoSegui',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__honorarios__seguimiento":


			$elimina=$objeto->getElimina('poa_seguimiento_honorarios','idHonorariosSeguimientos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__sueldos__salarios__seguimiento":


			$elimina=$objeto->getElimina('poa_seguimiento_sueldos_salarios','idSueldosSeguimeintos',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminar__indicador__seguimiento":

			$consulta=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_indicadores_seguimiento WHERE idModificaIndicadores='$parametros';");

			if(unlink(VARIABLE__BACKEND.'seguimiento/indicadoresDocumento/'.$consulta[0][documento])) {
			  // echo "si";
			} else {
			  // echo "no";
			}

			$elimina=$objeto->getElimina('poa_indicadores_seguimiento','idModificaIndicadores',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminar__otros__estado_cuenta_indicadores":

			$elimina=$objeto->getElimina('poa_seguimiento_estado_cuenta','id_estado_cuenta',$parametros);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminarHonorarios":

			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='530606' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$honarios2=$objeto->getObtenerInformacionGeneral("SELECT enero AS ene2,febrero AS feb2,marzo AS mar2,abril AS abril2,mayo AS may2,junio AS junio2,julio AS julio2,agosto AS agosto2,septiembre AS septiembre2,octubre AS octubre2,noviembre AS noviembre2,diciembre AS diciembre2,total AS totalHono FROM poa_honorarios2022 WHERE idHonorarios='$idEnviado' AND perioIngreso='$aniosPeriodos__ingesos';");

			$sumarUniEnero=$objeto->restarSumas($honorarios[0][enero],$honarios2[0][ene2]);
			$sumarUniFebrero=$objeto->restarSumas($honorarios[0][febrero],$honarios2[0][feb2]);
			$sumarUniMarzo=$objeto->restarSumas($honorarios[0][marzo],$honarios2[0][mar2]);
			$sumarUniAbril=$objeto->restarSumas($honorarios[0][abril],$honarios2[0][abril2]);
			$sumarUniMayo=$objeto->restarSumas($honorarios[0][mayo],$honarios2[0][may2]);
			$sumarUniJunio=$objeto->restarSumas($honorarios[0][junio],$honarios2[0][junio2]);
			$sumarUniJulio=$objeto->restarSumas($honorarios[0][julio],$honarios2[0][julio2]);
			$sumarUniAgosto=$objeto->restarSumas($honorarios[0][agosto],$honarios2[0][agosto2]);
			$sumarUniSeptiembre=$objeto->restarSumas($honorarios[0][septiembre],$honarios2[0][septiembre2]);
			$sumarUniOctubre=$objeto->restarSumas($honorarios[0][octubre],$honarios2[0][octubre2]);
			$sumarUniNoviembre=$objeto->restarSumas($honorarios[0][noviembre],$honarios2[0][noviembre2]);
			$sumarUniDiciembre=$objeto->restarSumas($honorarios[0][diciembre],$honarios2[0][diciembre2]);
			

			$totalRestas=floatval($honorarios[0][totalTotales]) - floatval($honarios2[0][totalHono]);


			if ($totalRestas<=0) {
				$totalRestas=0;
			}


			$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$totalRestas',totalTotales='$totalRestas'");
			$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$honorarios[0][honorarios]);

			$elimina=$objeto->getElimina('poa_honorarios2022','idHonorarios',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminaPda":


			$mesesPda=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalElem FROM poa_actdeportivas WHERE idPda='$idEnviado' AND perioIngreso='$aniosPeriodos__ingesos';");

			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idProgramacionFinanciera='$idProgramacionFinanciera' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$sumarUniEnero=$objeto->restarSumas($honorarios[0][enero],$mesesPda[0][enero]);
			$sumarUniFebrero=$objeto->restarSumas($honorarios[0][febrero],$mesesPda[0][febrero]);
			$sumarUniMarzo=$objeto->restarSumas($honorarios[0][marzo],$mesesPda[0][marzo]);
			$sumarUniAbril=$objeto->restarSumas($honorarios[0][abril],$mesesPda[0][abril]);
			$sumarUniMayo=$objeto->restarSumas($honorarios[0][mayo],$mesesPda[0][mayo]);
			$sumarUniJunio=$objeto->restarSumas($honorarios[0][junio],$mesesPda[0][junio]);
			$sumarUniJulio=$objeto->restarSumas($honorarios[0][julio],$mesesPda[0][julio]);
			$sumarUniAgosto=$objeto->restarSumas($honorarios[0][agosto],$mesesPda[0][agosto]);
			$sumarUniSeptiembre=$objeto->restarSumas($honorarios[0][septiembre],$mesesPda[0][septiembre]);
			$sumarUniOctubre=$objeto->restarSumas($honorarios[0][octubre],$mesesPda[0][octubre]);
			$sumarUniNoviembre=$objeto->restarSumas($honorarios[0][noviembre],$mesesPda[0][noviembre]);
			$sumarUniDiciembre=$objeto->restarSumas($honorarios[0][diciembre],$mesesPda[0][diciembre]);

			$totalRestas= floatval($honorarios[0][totalSumaItem]) - floatval($mesesPda[0][totalElem]);

			if ($totalRestas<=0) {
				$totalRestas=0;
			}


			$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$totalRestas',totalTotales='$totalRestas'");
			$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$idProgramacionFinanciera);


			$elimina=$objeto->getElimina('poa_actdeportivas','idPda',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "eliminaSueldos":


			$salariosUnificados=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS salariosUnificados, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='510106' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS aportPatronal, a.enero AS eneroPa,a.febrero AS febreroP,a.marzo AS marzoP,a.abril AS abrilP,a.mayo AS mayoP,a.junio AS junioP,a.julio AS julioP,a.agosto AS agostoP,a.septiembre AS septiembreP,a.octubre AS octubreP,a.noviembre AS noviembreP,a.diciembre AS diciembreP,a.totalSumaItem AS totalSumaItemP,a.totalTotales AS totalTotalesP FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510601' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$fondoReserva=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS fondoReserva, a.enero AS eneroFondo,a.febrero AS febreroFondo,a.marzo AS marzoFondo,a.abril AS abrilFondo,a.mayo AS mayoFondo,a.junio AS junioFondo,a.julio AS julioFondo,a.agosto AS agostoFondo,a.septiembre AS septiembreFondo,a.octubre AS octubreFondo,a.noviembre AS noviembreFondo,a.diciembre AS diciembreFondo,a.totalSumaItem AS totalSumaItemFondo,a.totalTotales AS totalTotalesFondo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510602' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$decimoTercera=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS decimoTercero, a.enero AS eneroTercero,a.febrero AS febreroTercero,a.marzo AS marzoTercero,a.abril AS abrilTercero,a.mayo AS mayoTercero,a.junio AS junioTercero,a.julio AS julioTercero,a.agosto AS agostoTercero,a.septiembre AS septiembreTercero,a.octubre AS octubreTercero,a.noviembre AS noviembreTercero,a.diciembre AS diciembreTercero,a.totalSumaItem AS totalSumaItemTercero,a.totalTotales AS totalTotalesTercero FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510203' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$decimoCuarta=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS decimoCuarta, a.enero AS eneroCuarta,a.febrero AS febreroCuarta,a.marzo AS marzoCuarta,a.abril AS abrilCuarta,a.mayo AS mayoCuarta,a.junio AS junioCuarta,a.julio AS julioCuarta,a.agosto AS agostoCuarta,a.septiembre AS septiembreCuarta,a.octubre AS octubreCuarta,a.noviembre AS noviembreCuarta,a.diciembre AS diciembreCuarta,a.totalSumaItem AS totalSumaItemCuarta,a.totalTotales AS totalTotalesCuarta FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='510204' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$solicitante=$objeto->getObtenerInformacionGeneral("SELECT sueldoSalario,aportePatronal,decimoTercera,decimoCuarta,fondosReserva,mensualizaTercera,menusalizaCuarta FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND idSueldos='$idSueldos' AND perioIngreso='$aniosPeriodos__ingesos';");

			$organismoRegimen=$objeto->getObtenerInformacionGeneral("SELECT regimen FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

			/*==================================
			=            Unificados            =
			==================================*/
			

			$sumarUniEnero=$objeto->restarSumas($salariosUnificados[0][enero],$solicitante[0][sueldoSalario]);
			$sumarUniFebrero=$objeto->restarSumas($salariosUnificados[0][febrero],$solicitante[0][sueldoSalario]);
			$sumarUniMarzo=$objeto->restarSumas($salariosUnificados[0][marzo],$solicitante[0][sueldoSalario]);
			$sumarUniAbril=$objeto->restarSumas($salariosUnificados[0][abril],$solicitante[0][sueldoSalario]);
			$sumarUniMayo=$objeto->restarSumas($salariosUnificados[0][mayo],$solicitante[0][sueldoSalario]);
			$sumarUniJunio=$objeto->restarSumas($salariosUnificados[0][junio],$solicitante[0][sueldoSalario]);
			$sumarUniJulio=$objeto->restarSumas($salariosUnificados[0][julio],$solicitante[0][sueldoSalario]);
			$sumarUniAgosto=$objeto->restarSumas($salariosUnificados[0][agosto],$solicitante[0][sueldoSalario]);
			$sumarUniSeptiembre=$objeto->restarSumas($salariosUnificados[0][septiembre],$solicitante[0][sueldoSalario]);
			$sumarUniOctubre=$objeto->restarSumas($salariosUnificados[0][octubre],$solicitante[0][sueldoSalario]);
			$sumarUniNoviembre=$objeto->restarSumas($salariosUnificados[0][noviembre],$solicitante[0][sueldoSalario]);
			$sumarUniDiciembre=$objeto->restarSumas($salariosUnificados[0][diciembre],$solicitante[0][sueldoSalario]);	


			$totalRestas=$salariosUnificados[0][totalSumaItem] - ($solicitante[0][sueldoSalario] * 12);


			if ($totalRestas<0) {
				$totalRestas=0;
			}



			$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$totalRestas',totalTotales='$totalRestas'");
			$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$salariosUnificados[0][salariosUnificados]);

			
			/*=====  End of Unificados  ======*/
			

			/*=======================================
			=            Aporte patronal            =
			=======================================*/


			$sumarUniEneroApat=$objeto->restarSumas($aportePatronal[0][eneroPa],$solicitante[0][aportePatronal]);
			$sumarUniFebreroApat=$objeto->restarSumas($aportePatronal[0][febreroP],$solicitante[0][aportePatronal]);
			$sumarUniMarzoApat=$objeto->restarSumas($aportePatronal[0][marzoP],$solicitante[0][aportePatronal]);
			$sumarUniAbrilApat=$objeto->restarSumas($aportePatronal[0][abrilP],$solicitante[0][aportePatronal]);
			$sumarUniMayoApat=$objeto->restarSumas($aportePatronal[0][mayoP],$solicitante[0][aportePatronal]);
			$sumarUniJunioApat=$objeto->restarSumas($aportePatronal[0][junioP],$solicitante[0][aportePatronal]);
			$sumarUniJulioApat=$objeto->restarSumas($aportePatronal[0][julioP],$solicitante[0][aportePatronal]);
			$sumarUniAgostoApat=$objeto->restarSumas($aportePatronal[0][agostoP],$solicitante[0][aportePatronal]);
			$sumarUniSeptiembreApat=$objeto->restarSumas($aportePatronal[0][septiembreP],$solicitante[0][aportePatronal]);
			$sumarUniOctubreApat=$objeto->restarSumas($aportePatronal[0][octubreP],$solicitante[0][aportePatronal]);
			$sumarUniNoviembreApat=$objeto->restarSumas($aportePatronal[0][noviembreP],$solicitante[0][aportePatronal]);
			$sumarUniDiciembreApat=$objeto->restarSumas($aportePatronal[0][diciembreP],$solicitante[0][aportePatronal]);	


			$totalRestasApat=floatval($aportePatronal[0][totalSumaItemP]) - (floatval($aportePatronal[0][eneroPa]) * 12);

			if ($totalRestasApat<0) {
				$totalRestasApat=0;
			}


			$valores3=array("enero='$sumarUniEneroApat',febrero='$sumarUniFebreroApat',marzo='$sumarUniMarzoApat',abril='$sumarUniAbrilApat',mayo='$sumarUniMayoApat',junio='$sumarUniJunioApat',julio='$sumarUniJulioApat',agosto='$sumarUniAgostoApat',septiembre='$sumarUniSeptiembreApat',octubre='$sumarUniOctubreApat',noviembre='$sumarUniNoviembreApat',diciembre='$sumarUniDiciembreApat',totalSumaItem='$totalRestasApat',totalTotales='$totalRestasApat'");
			$actualiza3=$objeto->getActualiza("poa_programacion_financiera",$valores3,"idProgramacionFinanciera",$aportePatronal[0][aportPatronal]);	



			/*=====  End of Aporte patronal  ======*/
			

			/*=========================================
			=            Fondos de reserva            =
			=========================================*/


			$sumarUniEneroFondo=$objeto->restarSumas($fondoReserva[0][eneroFondo],$solicitante[0][fondosReserva]);
			$sumarUniFebreroFondo=$objeto->restarSumas($fondoReserva[0][febreroFondo],$solicitante[0][fondosReserva]);
			$sumarUniMarzoFondo=$objeto->restarSumas($fondoReserva[0][marzoFondo],$solicitante[0][fondosReserva]);
			$sumarUniAbrilFondo=$objeto->restarSumas($fondoReserva[0][abrilFondo],$solicitante[0][fondosReserva]);
			$sumarUniMayoFondo=$objeto->restarSumas($fondoReserva[0][mayoFondo],$solicitante[0][fondosReserva]);
			$sumarUniJunioFondo=$objeto->restarSumas($fondoReserva[0][junioFondo],$solicitante[0][fondosReserva]);
			$sumarUniJulioFondo=$objeto->restarSumas($fondoReserva[0][julioFondo],$solicitante[0][fondosReserva]);
			$sumarUniAgostoFondo=$objeto->restarSumas($fondoReserva[0][agostoFondo],$solicitante[0][fondosReserva]);
			$sumarUniSeptiembreFondo=$objeto->restarSumas($fondoReserva[0][septiembreFondo],$solicitante[0][fondosReserva]);
			$sumarUniOctubreFondo=$objeto->restarSumas($fondoReserva[0][octubreFondo],$solicitante[0][fondosReserva]);
			$sumarUniNoviembreFondo=$objeto->restarSumas($fondoReserva[0][noviembreFondo],$solicitante[0][fondosReserva]);
			$sumarUniDiciembreFondo=$objeto->restarSumas($fondoReserva[0][diciembreFondo],$solicitante[0][fondosReserva]);	


			$totalRestasFondos=floatval($fondoReserva[0][totalSumaItemFondo]) - (floatval($fondoReserva[0][eneroFondo]) * 12);

			if ($totalRestasFondos<0) {
				$totalRestasFondos=0;
			}

			$valores4=array("enero='$sumarUniEneroFondo',febrero='$sumarUniFebreroFondo',marzo='$sumarUniMarzoFondo',abril='$sumarUniAbrilFondo',mayo='$sumarUniMayoFondo',junio='$sumarUniJunioFondo',julio='$sumarUniJulioFondo',agosto='$sumarUniAgostoFondo',septiembre='$sumarUniSeptiembreFondo',octubre='$sumarUniOctubreFondo',noviembre='$sumarUniNoviembreFondo',diciembre='$sumarUniDiciembreFondo',totalSumaItem='$totalRestasFondos',totalTotales='$totalRestasFondos'");
			$actualiza4=$objeto->getActualiza("poa_programacion_financiera",$valores4,"idProgramacionFinanciera",$fondoReserva[0][fondoReserva]);

			


			/*=====  End of Fondos de reserva  ======*/

			/*======================================
			=            Decimo tercero            =
			======================================*/

			$obtenerDecimoTercero=floatval($solicitante[0][sueldoSalario]) / 12;
			
			if (floatval($decimoTercera[0][eneroTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniEnerTercero=$objeto->restarSumas($decimoTercera[0][eneroTercero],$obtenerDecimoTercero);

			}

			if (floatval($decimoTercera[0][febreroTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniFebrerTercero=$objeto->restarSumas($decimoTercera[0][febreroTercero],$obtenerDecimoTercero);

			}

			if (floatval($decimoTercera[0][marzoTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniMarzTercero=$objeto->restarSumas($decimoTercera[0][marzoTercero],$obtenerDecimoTercero);

			}
		
				
			if (floatval($decimoTercera[0][abrilTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniAbriTercero=$objeto->restarSumas($decimoTercera[0][abrilTercero],$obtenerDecimoTercero);

			}

		
			if (floatval($decimoTercera[0][mayoTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniMayTercero=$objeto->restarSumas($decimoTercera[0][mayoTercero],$obtenerDecimoTercero);

			}
		
			if (floatval($decimoTercera[0][junioTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniJuniTercero=$objeto->restarSumas($decimoTercera[0][junioTercero],$obtenerDecimoTercero);

			}

		
			if (floatval($decimoTercera[0][julioTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniJuliTercero=$objeto->restarSumas($decimoTercera[0][julioTercero],$obtenerDecimoTercero);

			}

		
			if (floatval($decimoTercera[0][agostoTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniAgostTercero=$objeto->restarSumas($decimoTercera[0][agostoTercero],$obtenerDecimoTercero);

			}

			if (floatval($decimoTercera[0][septiembreTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniSeptiembrTercero=$objeto->restarSumas($decimoTercera[0][septiembreTercero],$obtenerDecimoTercero);

			}
			

			if (floatval($decimoTercera[0][octubreTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniOctubrTercero=$objeto->restarSumas($decimoTercera[0][octubreTercero],$obtenerDecimoTercero);

			}

			
			if (floatval($decimoTercera[0][noviembreTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniNoviembrTercero=$objeto->restarSumas($decimoTercera[0][noviembreTercero],$obtenerDecimoTercero);

			}		
						
			
			if (floatval($decimoTercera[0][diciembreTercero])>0 && $solicitante[0][mensualizaTercera]=="si") {

				$sumarUniDiciembrTercero=$objeto->restarSumas($decimoTercera[0][diciembreTercero],$obtenerDecimoTercero);	


			}else if(floatval($decimoTercera[0][diciembreTercero])>0 && $solicitante[0][mensualizaTercera]=="no"){

				$sumarUniDiciembrTercero=$objeto->restarSumas($decimoTercera[0][diciembreTercero],$solicitante[0][sueldoSalario]);	

			}					
			
		

			$totalRestasTercero=floatval($decimoTercera[0][totalSumaItemTercero]) - floatval($solicitante[0][decimoTercera]);

			if ($totalRestasTercero<0) {
				$totalRestasTercero=0;
			}

			if ($solicitante[0][mensualizaTercera]=="si") {

				$valores5=array("enero='$sumarUniEnerTercero',febrero='$sumarUniFebrerTercero',marzo='$sumarUniMarzTercero',abril='$sumarUniAbriTercero',mayo='$sumarUniMayTercero',junio='$sumarUniJuniTercero',julio='$sumarUniJuliTercero',agosto='$sumarUniAgostTercero',septiembre='$sumarUniSeptiembrTercero',octubre='$sumarUniOctubrTercero',noviembre='$sumarUniNoviembrTercero',diciembre='$sumarUniDiciembrTercero',totalSumaItem='$totalRestasTercero',totalTotales='$totalRestasTercero'");
				
			}else{

				$valores5=array("diciembre='$sumarUniDiciembrTercero',totalSumaItem='$totalRestasTercero',totalTotales='$totalRestasTercero'");

			}

			
			$actualiza5=$objeto->getActualiza("poa_programacion_financiera",$valores5,"idProgramacionFinanciera",$decimoTercera[0][decimoTercero]);	

			
			/*=====  End of Decimo tercero  ======*/
			
			/*=====================================
			=            Decimo cuarto            =
			=====================================*/

			$obtenerDecimoCuarto=floatval(425.00) / 12;
			
			if (floatval($decimoCuarta[0][eneroCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniEnerCuarto=$objeto->restarSumas($decimoCuarta[0][eneroCuarta],$obtenerDecimoCuarto);
			
			}else{

				$sumarUniEnerCuarto=$decimoCuarta[0][eneroCuarta];

			}


			if (floatval($decimoCuarta[0][febreroCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniFebrerCuarto=$objeto->restarSumas($decimoCuarta[0][febreroCuarta],$obtenerDecimoCuarto);

			}else{

				$sumarUniFebrerCuarto=$decimoCuarta[0][febreroCuarta];

			}


			if (floatval($decimoCuarta[0][marzoCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniMarzCuarto=$objeto->restarSumas($decimoCuarta[0][marzoCuarta],$obtenerDecimoCuarto);
				
			}else if(floatval($decimoCuarta[0][marzoCuarta])>0 && $solicitante[0][menusalizaCuarta]=="no" && $organismoRegimen[0]["regimen"]=="Costa"){

				$sumarUniMarzCuarto=$objeto->restarSumas($decimoCuarta[0][marzoCuarta],$solicitante[0][decimoCuarta]);

			}else{

				$sumarUniMarzCuarto=$decimoCuarta[0][marzoCuarta];

			}



			if (floatval($decimoCuarta[0][abrilCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniAbriCuarto=$objeto->restarSumas($decimoCuarta[0][abrilCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniAbriCuarto=$decimoCuarta[0][abrilCuarta];

			}
			

			if (floatval($decimoCuarta[0][mayoCuarta])>0  && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniMayCuarto=$objeto->restarSumas($decimoCuarta[0][mayoCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniMayCuarto=$decimoCuarta[0][mayoCuarta];

			}


			if (floatval($decimoCuarta[0][junioCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniJuniCuarto=$objeto->restarSumas($decimoCuarta[0][junioCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniJuniCuarto=$decimoCuarta[0][junioCuarta];

			}
									
			
			if (floatval($decimoCuarta[0][julioCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniJuliCuarto=$objeto->restarSumas($decimoCuarta[0][julioCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniJuliCuarto=$decimoCuarta[0][julioCuarta];

			}



			
			if (floatval($decimoCuarta[0][agostoCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniAgostCuarto=$objeto->restarSumas($decimoCuarta[0][agostoCuarta],$obtenerDecimoCuarto);
				
			}else if(floatval($decimoCuarta[0][agostoCuarta])>0 && $solicitante[0][menusalizaCuarta]=="no" && ($organismoRegimen[0]["regimen"]=="Sierra" || $organismoRegimen[0]["regimen"]=="Amazonia")){

				$sumarUniAgostCuarto=$objeto->restarSumas($decimoCuarta[0][agostoCuarta],$solicitante[0][decimoCuarta]);

			}else{

				$sumarUniAgostCuarto=$decimoCuarta[0][agostoCuarta];

			}
			
			
			if (floatval($decimoCuarta[0][septiembreCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniSeptiembrCuarto=$objeto->restarSumas($decimoCuarta[0][septiembreCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniSeptiembrCuarto=$decimoCuarta[0][septiembreCuarta];

			}




			if (floatval($decimoCuarta[0][octubreCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniOctubrCuarto=$objeto->restarSumas($decimoCuarta[0][octubreCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniOctubrCuarto=$decimoCuarta[0][octubreCuarta];

			}
					

			if (floatval($decimoCuarta[0][noviembreCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniNoviembrCuarto=$objeto->restarSumas($decimoCuarta[0][noviembreCuarta],$obtenerDecimoCuarto);
				
			}else{

				$sumarUniNoviembrCuarto=$decimoCuarta[0][noviembreCuarta];

			}
								
			
			
			if (floatval($decimoCuarta[0][diciembreCuarta])>0 && $solicitante[0][menusalizaCuarta]=="si") {

				$sumarUniDiciembrCuarto=$objeto->restarSumas($decimoCuarta[0][diciembreCuarta],$obtenerDecimoCuarto);	
				
			}else{

				$sumarUniDiciembrCuarto=$decimoCuarta[0][diciembreCuarta];

			}
								

			$totalRestasCuarta=$decimoCuarta[0][totalSumaItemCuarta] - $solicitante[0][decimoCuarta];

			if ($totalRestasCuarta<0) {
				$totalRestasCuarta=0;
			}



			$valores6=array("enero='$sumarUniEnerCuarto',febrero='$sumarUniFebrerCuarto',marzo='$sumarUniMarzCuarto',abril='$sumarUniAbriCuarto',mayo='$sumarUniMayCuarto',junio='$sumarUniJuniCuarto',julio='$sumarUniJuliCuarto',agosto='$sumarUniAgostCuarto',septiembre='$sumarUniSeptiembrCuarto',octubre='$sumarUniOctubrCuarto',noviembre='$sumarUniNoviembrCuarto',diciembre='$sumarUniDiciembrCuarto',totalSumaItem='$totalRestasCuarta',totalTotales='$totalRestasCuarta'");
			$actualiza6=$objeto->getActualiza("poa_programacion_financiera",$valores6,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta]);		
		
			
			/*=====  End of Decimo cuarto  ======*/

						

			$elimina=$objeto->getElimina('poa_sueldossalarios2022','idSueldos',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;

		case  "eliminasItemsFin":


			$elimina=$objeto->getElimina('poa_programacion_financiera','idProgramacionFinanciera',$idEnviado2);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "eliminaSuministros":


			$elimina=$objeto->getElimina('poa_suministrosn','idSumi',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemsElimina":


			$elimina=$objeto->getElimina('poa_item','idItem',$idEnviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "actividadesElimina":


			$elimina=$objeto->getElimina('poa_actividades','idActividades',$idEnviado2);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "itemAcElimina":


			$elimina=$objeto->getElimina('poa_item_actividad','idActividadItem',$paid4);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "gastosElimina":


			$elimina=$objeto->getElimina('poa_clasificaciongastos','idClasificacionGastos',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "lineaElimina":


			$elimina=$objeto->getElimina('poa_linea_base','idLineas',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "programaElimina":


			$elimina=$objeto->getElimina('poa_programa','idPrograma',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "indicadoresElimina":


			$elimina=$objeto->getElimina('poa_indicadores','idIndicadores',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "deportesElimina":


			$elimina=$objeto->getElimina('poa_deporte','idDeporte',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "alcanceElimina":


			$elimina=$objeto->getElimina('poa_alcanse','idAlcanse',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoFiElimina":


			$elimina=$objeto->getElimina('poa_tipo','idTipo',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "cargoElimina":


			$elimina=$objeto->getElimina('poa_cargo','idCargo',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "objetivosElimina":


			$elimina=$objeto->getElimina('poa_objetivos','idObjetivos',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrganismoElimina":


			$elimina=$objeto->getElimina('poa_tipo_organismo','idTipoOrganismo',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "accionElimina":


			$elimina=$objeto->getElimina('poa_area_accion','idAreaAccion',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "areaEnElimina":


			$elimina=$objeto->getElimina('poa_areaEncargada','idAreaEncargada',$idEnviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

	}

	echo json_encode($jason);





