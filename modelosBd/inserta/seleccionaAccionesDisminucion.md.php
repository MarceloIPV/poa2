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

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	$objeto= new usuarioAcciones();

	switch ($tipo) {


		case "desvinculacion__origen":

			$desahucio__informacion=$objeto->getObtenerInformacionGeneral("SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idSueldos' AND opcion='desahucio';");

			$despido__informacion=$objeto->getObtenerInformacionGeneral("SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idSueldos' AND opcion='despido';");

			$renuncia__informacion=$objeto->getObtenerInformacionGeneral("SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idSueldos' AND opcion='renuncia';");


			$compensacion__informacion=$objeto->getObtenerInformacionGeneral("SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idSueldos' AND opcion='compensaciÃ³n';");

			$informacionBasica__desvinculacion=$objeto->getObtenerInformacionGeneral("SELECT idSueldos AS idHonorarios,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,idOrganismo,fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(tipoCargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS tipoCargo,idActividad,modifica,perioIngreso,tiempoTrabajo,mensualizaTercera,menusalizaCuarta,sueldoSalario,aportePatronal,decimoTercera,decimoCuarta,fondosReserva,(SELECT a1.regimen FROM poa_organismo AS a1 WHERE a1.idOrganismo=poa_sueldossalarios2022.idOrganismo LIMIT 1) AS regimen FROM poa_sueldossalarios2022 WHERE idSueldos='$idSueldos' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY nombres;");


			$jason['desahucio__informacion']=$desahucio__informacion;
			$jason['despido__informacion']=$despido__informacion;
			$jason['renuncia__informacion']=$renuncia__informacion;
			$jason['compensacion__informacion']=$compensacion__informacion;
			$jason['informacionBasica__desvinculacion']=$informacionBasica__desvinculacion;
		

		break;	


		case "completa_informacion_salarios_data":
			$sql="SELECT idHonorarios,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,idOrganismo,fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(tipoCargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS tipoCargo,idActividad,modifica,perioIngreso FROM poa_honorarios2022 WHERE idHonorarios='$idSueldos';";

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);

			$jason['indicadorInformacion']=$indicadorInformacion;
		

		break;	

		case "completa_informacion_honorarios_data":


			$data1=array();
			$dataBloqueos=array();

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT idActividadDestino  FROM  poa_item_actividad_bloqueo WHERE idActividadOrigen='4'  GROUP BY idActividadDestino;");

		 	foreach ($informacion as $value) {
		 		array_push($data1, $value["idActividadDestino"]);
		 	}



		 	foreach ($data1 AS $value2) {

		 		$informacionBloqueo=$objeto->getObtenerInformacionGeneral("SELECT COUNT(b.idActividad) AS contadorBloqueos FROM poa_item AS a INNER JOIN poa_item_actividad AS b ON a.idItem=b.idItem INNER JOIN poa_item_actividad_bloqueo AS t ON t.idActividadItem=b.idActividadItem WHERE b.idActividad='$value2' GROUP BY b.idActividad ORDER BY a.idItem;");

		 		$informacionActividades=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idActividadItem) AS contadorActividades FROM poa_item_actividad WHERE idActividad='$value2' GROUP BY idActividad;");

				if(intval($informacionBloqueo[0][contadorBloqueos])==intval($informacionActividades[0][contadorActividades])){
					array_push($dataBloqueos, $value2);
				}

		 	}

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT idHonorarios,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,idOrganismo,fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(tipoCargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS tipoCargo,idActividad,modifica,perioIngreso FROM poa_honorarios2022 WHERE idHonorarios='$idSueldos' AND perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion']=$indicadorInformacion;
			$jason['dataBloqueos']=$dataBloqueos;

		break;	

		case "completa_informacion_sueldos_data":

			$data1=array();
			$dataBloqueos=array();

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT idActividadDestino  FROM  poa_item_actividad_bloqueo WHERE idActividadOrigen='4'  GROUP BY idActividadDestino;");

		 	foreach ($informacion as $value) {
		 		array_push($data1, $value["idActividadDestino"]);
		 	}



		 	foreach ($data1 AS $value2) {

		 		$informacionBloqueo=$objeto->getObtenerInformacionGeneral("SELECT COUNT(b.idActividad) AS contadorBloqueos FROM poa_item AS a INNER JOIN poa_item_actividad AS b ON a.idItem=b.idItem INNER JOIN poa_item_actividad_bloqueo AS t ON t.idActividadItem=b.idActividadItem WHERE b.idActividad='$value2' GROUP BY b.idActividad ORDER BY a.idItem;");

		 		$informacionActividades=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idActividadItem) AS contadorActividades FROM poa_item_actividad WHERE idActividad='$value2' GROUP BY idActividad;");

				if(intval($informacionBloqueo[0][contadorBloqueos])==intval($informacionActividades[0][contadorActividades])){
					array_push($dataBloqueos, $value2);
				}

		 	}


			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT idSueldos AS idHonorarios,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,idOrganismo,fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(tipoCargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS tipoCargo,idActividad,modifica,perioIngreso,tiempoTrabajo,mensualizaTercera,menusalizaCuarta,sueldoSalario,aportePatronal,decimoTercera,decimoCuarta,fondosReserva,(SELECT a1.regimen FROM poa_organismo AS a1 WHERE a1.idOrganismo=poa_sueldossalarios2022.idOrganismo LIMIT 1) AS regimen FROM poa_sueldossalarios2022 WHERE idSueldos='$idSueldos' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY nombres;");

			$jason['indicadorInformacion']=$indicadorInformacion;

			$jason['dataBloqueos']=$dataBloqueos;

		break;		

	}

	echo json_encode($jason);





