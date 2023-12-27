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

	//$anio='2022';

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	
	
	/*=====  End of Parametros Iniciales  ======*/

	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	if(isset($_SESSION["idUsuario"])){
		$idFuncionario=$_SESSION["idUsuario"];
	}
	

	$objeto= new usuarioAcciones();


	function obtenerValor($posicion,$posicion2) {
		if ($posicion == 0 && $posicion2 == 0) {
			return "Catálogo Electrónico";
		} elseif ($posicion == 0 && $posicion2 == 1) {
			return "Subasta Inversa Electrónica";
		} elseif ($posicion == 0 && $posicion2 == 2) {
			return "Infima Cuantía";
		} elseif ($posicion == 0 && $posicion2 == 3) {
			return "Menor Cuantía";
		} elseif ($posicion == 0 && $posicion2 == 4) {
			return "Cotización";
		} elseif ($posicion == 0 && $posicion2 == 5) {
			return "Licitación";
		} elseif ($posicion == 0 && $posicion2 == 6) {
			return "Menor Cuantía Obras";
		} elseif ($posicion == 0 && $posicion2 == 7) {
			return "Cotización Obras";
		} elseif ($posicion == 0 && $posicion2 == 8) {
			return "Licitación Obras";
		} elseif ($posicion == 0 && $posicion2 == 9) {
			return "Precio Fijo";
		} elseif ($posicion == 0 && $posicion2 == 10) {
			return "Contratación Directa";
		} elseif ($posicion == 0 && $posicion2 == 11) {
			return "Lista Corta";
		} elseif ($posicion == 0 && $posicion2 == 12) {
			return "Concurso Público";
		}
	}

	switch ($tipo) {


		case  "actividadesPoa__incrementos":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$informacionSeleccionada=$objeto->getObtenerInformacionGeneral("SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_indicadores AS a1 WHERE a1.idIndicadores=b.idLineaPolitica) AS indicador FROM poa_poainicial AS z INNER JOIN poa_programacion_financiera AS a ON a.idActividad=z.idActividad  INNER JOIN poa_actividades AS b ON z.idActividad=b.idActividades  WHERE z.idOrganismo='$idOrganismoSession' AND z.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND z.idActividad!='4' AND a.idActividad!='4' AND z.idActividad!='1' AND a.idActividad!='1' AND z.idActividad!='2' AND a.idActividad!='2' AND (a.modifica IS NULL OR a.modifica='A' AND z.idOrganismo='$idOrganismoSession' AND z.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND z.idActividad>=5)  GROUP BY z.idActividad;");

			

			$obtenerInformacion2=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_poainicial WHERE idOrganismo='$idOrganismoPrincipal' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idActividad ORDER BY idActividad ASC;");

			$obtenerInformacion3=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismoPrincipal' AND perioIngreso='$aniosPeriodos__ingesos'  GROUP BY idActividad ORDER BY idActividad ASC;");

	
			$jason['obtenerInformacion3']=$obtenerInformacion3;
			$jason['obtenerInformacion2']=$obtenerInformacion2;
			$jason['informacionSeleccionada']=$informacionSeleccionada;


		break;

		case  "actividadesPoas__Incrementos__Creacion":

			$informacionSeleccionada=$objeto->getObtenerInformacionGeneral("SELECT a.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_indicadores AS a1 WHERE a1.idIndicadores=a.idLineaPolitica) AS indicador FROM poa_actividades AS a ORDER BY a.idActividades ASC;");

			$obtenerInformacion2=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_poainicial WHERE idOrganismo='$idOrganismoPrincipal' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idActividad ORDER BY idActividad ASC;");

			$obtenerInformacion3=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismoPrincipal' AND perioIngreso='$aniosPeriodos__ingesos'  GROUP BY idActividad ORDER BY idActividad ASC;");

	
			$jason['obtenerInformacion3']=$obtenerInformacion3;
			$jason['obtenerInformacion2']=$obtenerInformacion2;
			$jason['informacionSeleccionada']=$informacionSeleccionada;


		break;

		case "poa_aprobado_sin_cambios":
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio, a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,b.itemPreesupuestario AS subsecretaria,b.itemPreesupuestario FROM poa_programacion_financiera_incremento AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idActividad ASC;");

			$obtenerInformacionPre=$objeto->getObtenerInformacionGeneral("SELECT a1.subsecretaria FROM poa_preliminar_envio AS a1 WHERE a1.idOrganismo='$idOrganismo' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idPoaInicial DESC LIMIT 1;");

			$obtenerInformacionPeriodos=$objeto->getObtenerInformacionGeneral("SELECT periodo FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

			$obtenerInformacionObservaciones=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.observaciones, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS observaciones,CONCAT_WS(' ',b.nombre,b.apellido) AS nombreCompleto FROM poa_observacionesenviadas AS a INNER JOIN th_usuario AS b ON a.idUsuario=b.id_usuario WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			/*====================================
			=             Actividades            =
			====================================*/
			
			$actividad3=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad3 FROM poa_programacion_financiera_incremento WHERE idOrganismo='$idOrganismo' AND idActividad='3' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad4=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad4 FROM poa_programacion_financiera_incremento WHERE idOrganismo='$idOrganismo' AND idActividad='4' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad5=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad5 FROM poa_programacion_financiera_incremento WHERE idOrganismo='$idOrganismo' AND idActividad='5' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad6=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad6 FROM poa_programacion_financiera_incremento WHERE idOrganismo='$idOrganismo' AND idActividad='6' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad7=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad7 FROM poa_programacion_financiera_incremento WHERE idOrganismo='$idOrganismo' AND idActividad='7' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			
			/*=====  End of  Actividades  ======*/
			

			if($fisicamenteE==18 || $fisicamenteE==20 || $fisicamenteE==27 || $fisicamenteE==28 || $fisicamenteE==29 || $fisicamenteE==30 || $fisicamenteE==31 || $fisicamenteE==32 || $fisicamenteE==33 || $fisicamenteE==34 || $idRolAd=="1"){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera_incremento AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");


			}else if ($fisicamenteE==26 || $fisicamenteE==24 || $fisicamenteE=="12" || $fisicamenteE=="13" || $fisicamenteE=="14" || $fisicamenteE=="19" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13") {
				
				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera_incremento AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='3' OR a.idActividad='4' OR a.idActividad='5' OR a.idActividad='6' OR a.idActividad='7') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");


			}else if($fisicamenteE==1 || $fisicamenteE==6 || $fisicamenteE==15 || $fisicamenteE==27 || $fisicamenteE==28 || $fisicamenteE==29 || $fisicamenteE==30 || $fisicamenteE==31 || $fisicamenteE==32 || $fisicamenteE==33){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera_incremento AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='2') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");

			}else if($fisicamenteE==2 || $fisicamenteE==23 || $fisicamenteE==5 || $fisicamenteE==7){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera_incremento AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='1') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");

			}

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("(SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='1' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.metaindicador>0  ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='2' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='3' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='4' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='5' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos'  ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='6' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='7' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1);");


			$obtenerAcCa__reinstala=$objeto->getObtenerInformacionGeneral("SELECT instalacionesE,instalacionesE2,documentoInfraestructura,documentoInstalaciones,documentoSubsess,documentoAdministrativo,documentoCompras FROM poa_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo';");

			$instalacionesE__variables=$obtenerAcCa__reinstala[0][instalacionesE];
			$instalacionesE2__variables=$obtenerAcCa__reinstala[0][instalacionesE2];
			$documentosInfra__variables=$obtenerAcCa__reinstala[0][documentoInfraestructura];
			$documentosInstala__variables=$obtenerAcCa__reinstala[0][documentoInstalaciones];

			$documentoAdministrativo=$obtenerAcCa__reinstala[0][documentoAdministrativo];
			$documentoSubsess=$obtenerAcCa__reinstala[0][documentoSubsess];
			$documentoCompras=$obtenerAcCa__reinstala[0][documentoCompras];

			$jason['documentoAdministrativo']=$documentoAdministrativo;
			$jason['documentoSubsess']=$documentoSubsess;
			$jason['documentoCompras']=$documentoCompras;

			$jason['instalacionesE__variables']=$instalacionesE__variables;
			$jason['instalacionesE2__variables']=$instalacionesE2__variables;


			$jason['documentosInfra__variables']=$documentosInfra__variables;
			$jason['documentosInstala__variables']=$documentosInstala__variables;

			$jason['obtenerAcCa']=$obtenerAcCa;


			$jason['indicadorInformacion']=$indicadorInformacion;
			
			$jason['obtenerInformacion']=$obtenerInformacion;
			

			$jason['obtenerInformacionPre']=$obtenerInformacionPre;

			$jason['obtenerInformacionObservaciones']=$obtenerInformacionObservaciones;

			/*===================================
			=            Actividades            =
			===================================*/
			
			$jason['actividad3']=$actividad3;
			$jason['actividad4']=$actividad4;
			$jason['actividad5']=$actividad5;
			$jason['actividad6']=$actividad6;
			$jason['actividad7']=$actividad7;
			
			/*=====  End of Actividades  ======*/
			

		break;


		case "matricesDatos":
			if ($idActividad==3 || $idActividad==5 || $idActividad==6 || $idActividad==7) {
				
				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT b.idActividad FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera_incremento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='$idActividad' AND b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idOrganismo LIMIT 1;");

				$mensajeActividad="actDeportivas";

			}else if($idActividad==1){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo LIMIT 1;");

				

				$obtenerAcCahHono=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo LIMIT 1;");

			
				$obtenerAcAdmini=$objeto->getObtenerInformacionGeneral("SELECT a.idActividadAd FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera_incremento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='$idActividad' AND b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idOrganismo LIMIT 1;");

				$obtenerSuministros=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_suministrosn WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");


				if (!empty($obtenerAcCa[0][idActividad])) {
					
					$mensajeActividad="sueldos__salarios";

				}else{

					$mensajeActividad=false;

				}



				if (!empty($obtenerSuministros[0][idOrganismo])) {
					
					$jason['obtenerSuministros']=$obtenerSuministros;
					$mensajeSuministros="suministros";

				}else{

					$mensajeSuministros=false;

				}

				if (!empty($obtenerAcAdmini[0][idActividadAd])) {
					
					$jason['obtenerAcAdmini']=$obtenerAcAdmini;
					$mensajeAdministrativas="administrativas";

				}else{

					$mensajeAdministrativas=false;

				}


				// if (!empty($obtenerAcCahHono[0][idActividad])) {
					
				// 	$jason['obtenerAcCahHono']=$obtenerAcCahHono;
				// 	$mensajeActividadH="honorarios";

				// }else{

				// 	$mensajeActividadH=false;

				// }
				

			}else if($idActividad==4){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo LIMIT 1;");

				$mensajeActividad="sueldos__salarios";

				$obtenerAcCahHono=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo LIMIT 1;");



				if (!empty($obtenerAcCa[0][idActividad])) {
					
					$mensajeActividad="sueldos__salarios";

				}else{

					$mensajeActividad=false;

				}


				if (!empty($obtenerAcCahHono)) {
					
					$jason['obtenerAcCahHono']=$obtenerAcCahHono;
					$mensajeActividadH="honorarios";

				}else{

					$mensajeActividadH=false;

				}

			}else if($idActividad==2){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT b.idActividad FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera_incremento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='$idActividad' AND b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

				$mensajeActividad="mantenimiento";

			}


			$jason['mensajeSuministros']=$mensajeSuministros;

			$jason['mensajeAdministrativas']=$mensajeAdministrativas;

			$jason['mensajeActividadH']=$mensajeActividadH;

			$jason['mensajeActividad']=$mensajeActividad;

			$jason['obtenerAcCa']=$obtenerAcCa;

		break;

		case  "contratacionPublica":

			$fisicamenteEstructura__ingresos = $_SESSION["fisicamenteEstructura"];

			if ($fisicamenteEstructura__ingresos == 5 || $fisicamenteEstructura__ingresos == 2) {


				// contadores
				$contadorCatalogoContraloria = $objeto->getObtenerInformacionGeneral("SELECT SUM(CASE WHEN a.catalogo__elect = 'si' THEN 1 ELSE 0 END) AS '0',SUM(CASE WHEN a.catalogo__subasta = 'si' THEN 1 ELSE 0 END) AS '1',SUM(CASE WHEN a.catalogo__infima = 'si' THEN 1 ELSE 0 END) AS '2',SUM(CASE WHEN a.catalogo__menorCuantia = 'si' THEN 1 ELSE 0 END) AS '3',SUM(CASE WHEN a.catalogo__cotizacion = 'si' THEN 1 ELSE 0 END) AS '4',SUM(CASE WHEN a.catalogo__licitacion = 'si' THEN 1 ELSE 0 END) AS '5',SUM(CASE WHEN a.catalogo__menorCuantiaObras = 'si' THEN 1 ELSE 0 END) AS '6',SUM(CASE WHEN a.catalogo__cotizacionObras = 'si' THEN 1 ELSE 0 END) AS '7',SUM(CASE WHEN a.catalogo__licitacionObras = 'si' THEN 1 ELSE 0 END) AS '8',SUM(CASE WHEN a.catalogo__precioObras = 'si' THEN 1 ELSE 0 END) AS '9',SUM(CASE WHEN a.catalogo__contratacionDirecta = 'si' THEN 1 ELSE 0 END) AS '10',SUM(CASE WHEN a.catalogo__contratacionListaCorta = 'si' THEN 1 ELSE 0 END) AS '11',SUM(CASE WHEN a.catalogo__contratacionConcursoPu = 'si' THEN 1 ELSE 0 END) AS '12'  FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera_incremento AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos';");


				// sumas
				$contadorCatalogoContraloriaMontos = $objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(CASE WHEN a.catalogo__elect = 'si' THEN b.totalTotales ELSE 0 END),2) AS '0',ROUND(SUM(CASE WHEN a.catalogo__subasta = 'si' THEN b.totalTotales ELSE 0 END),2) AS '1',ROUND(SUM(CASE WHEN a.catalogo__infima = 'si' THEN b.totalTotales ELSE 0 END),2) AS '2',ROUND(SUM(CASE WHEN a.catalogo__menorCuantia = 'si' THEN b.totalTotales ELSE 0 END),2) AS '3',ROUND(SUM(CASE WHEN a.catalogo__cotizacion = 'si' THEN b.totalTotales ELSE 0 END),2) AS '4',ROUND(SUM(CASE WHEN a.catalogo__licitacion = 'si' THEN b.totalTotales ELSE 0 END),2) AS '5',ROUND(SUM(CASE WHEN a.catalogo__menorCuantiaObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '6',ROUND(SUM(CASE WHEN a.catalogo__cotizacionObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '7',ROUND(SUM(CASE WHEN a.catalogo__licitacionObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '8',ROUND(SUM(CASE WHEN a.catalogo__precioObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '9',ROUND(SUM(CASE WHEN a.catalogo__contratacionDirecta = 'si' THEN b.totalTotales ELSE 0 END),2) AS '10',ROUND(SUM(CASE WHEN a.catalogo__contratacionListaCorta = 'si' THEN b.totalTotales ELSE 0 END),2) AS '11',ROUND(SUM(CASE WHEN a.catalogo__contratacionConcursoPu = 'si' THEN b.totalTotales ELSE 0 END),2) AS '12' FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera_incremento AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;");


			} else {

				// contadores
				$contadorCatalogoContraloria = $objeto->getObtenerInformacionGeneral("SELECT SUM(CASE WHEN a.catalogo__elect = 'si' THEN 1 ELSE 0 END) AS '0',SUM(CASE WHEN a.catalogo__subasta = 'si' THEN 1 ELSE 0 END) AS '1',SUM(CASE WHEN a.catalogo__infima = 'si' THEN 1 ELSE 0 END) AS '2',SUM(CASE WHEN a.catalogo__menorCuantia = 'si' THEN 1 ELSE 0 END) AS '3',SUM(CASE WHEN a.catalogo__cotizacion = 'si' THEN 1 ELSE 0 END) AS '4',SUM(CASE WHEN a.catalogo__licitacion = 'si' THEN 1 ELSE 0 END) AS '5',SUM(CASE WHEN a.catalogo__menorCuantiaObras = 'si' THEN 1 ELSE 0 END) AS '6',SUM(CASE WHEN a.catalogo__cotizacionObras = 'si' THEN 1 ELSE 0 END) AS '7',SUM(CASE WHEN a.catalogo__licitacionObras = 'si' THEN 1 ELSE 0 END) AS '8',SUM(CASE WHEN a.catalogo__precioObras = 'si' THEN 1 ELSE 0 END) AS '9',SUM(CASE WHEN a.catalogo__contratacionDirecta = 'si' THEN 1 ELSE 0 END) AS '10',SUM(CASE WHEN a.catalogo__contratacionListaCorta = 'si' THEN 1 ELSE 0 END) AS '11',SUM(CASE WHEN a.catalogo__contratacionConcursoPu = 'si' THEN 1 ELSE 0 END) AS '12'  FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera_incremento AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.idActividad='$idActividad' AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos';");


				$contadorCatalogoContraloriaMontos = $objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(CASE WHEN a.catalogo__elect = 'si' THEN b.totalTotales ELSE 0 END),2) AS '0',ROUND(SUM(CASE WHEN a.catalogo__subasta = 'si' THEN b.totalTotales ELSE 0 END),2) AS '1',ROUND(SUM(CASE WHEN a.catalogo__infima = 'si' THEN b.totalTotales ELSE 0 END),2) AS '2',ROUND(SUM(CASE WHEN a.catalogo__menorCuantia = 'si' THEN b.totalTotales ELSE 0 END),2) AS '3',ROUND(SUM(CASE WHEN a.catalogo__cotizacion = 'si' THEN b.totalTotales ELSE 0 END),2) AS '4',ROUND(SUM(CASE WHEN a.catalogo__licitacion = 'si' THEN b.totalTotales ELSE 0 END),2) AS '5',ROUND(SUM(CASE WHEN a.catalogo__menorCuantiaObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '6',ROUND(SUM(CASE WHEN a.catalogo__cotizacionObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '7',ROUND(SUM(CASE WHEN a.catalogo__licitacionObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '8',ROUND(SUM(CASE WHEN a.catalogo__precioObras = 'si' THEN b.totalTotales ELSE 0 END),2) AS '9',ROUND(SUM(CASE WHEN a.catalogo__contratacionDirecta = 'si' THEN b.totalTotales ELSE 0 END),2) AS '10',ROUND(SUM(CASE WHEN a.catalogo__contratacionListaCorta = 'si' THEN b.totalTotales ELSE 0 END),2) AS '11',ROUND(SUM(CASE WHEN a.catalogo__contratacionConcursoPu = 'si' THEN b.totalTotales ELSE 0 END),2) AS '12' FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.idActividad='$idActividad' AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;");

			}


			$documentoCuerpo = "<table class='valores__adicionales' id='valores__adicionales'>";

			$numFilas = count($contadorCatalogoContraloria);
			$numColumnas = count($contadorCatalogoContraloria[0]);


			$documentoCuerpo .= "
					<tr>
						<th align='center'>Tipo Contratación</th>
						<th align='center'>Número de contratación</td>
						<th align='center'>Monto</td>
					</tr>";
				$Total=0;
				$Total2=0;
				for ($fila = 0; $fila < $numFilas; $fila++) {
					for ($columna = 0; $columna < $numColumnas; $columna++) {
						
						if ($contadorCatalogoContraloria[$fila][$columna] > 0 || $contadorCatalogoContraloriaMontos[$fila][$columna] > 0){
							$valor = obtenerValor($fila,$columna);

							$valor1 = $contadorCatalogoContraloria[$fila][$columna];
							$valor2 = $contadorCatalogoContraloriaMontos[$fila][$columna];
							$documentoCuerpo .= "<tr>";
							$documentoCuerpo .= "<td align='center'>$valor</td>";
							$documentoCuerpo .= "<td align='center'>$valor1</td>";
							$documentoCuerpo .= "<td align='center'>$valor2</td>";
							$documentoCuerpo .= "</tr>";
						}

						
							
					}
				}
		

					$documentoCuerpo .= "</table>";

					$jason['tabla']=$documentoCuerpo;

		break;


		case  "honorarios":

			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT idHonorarios,cedula,nombres,cargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,honorarioMensual,tipoCargo FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND modifica IS NULL AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idHonorarios;");

			$jason['obtenerInformacion']=$obtenerInformacion;
			$jason['idActividad']=$idActividad;

		break;

		case  "sueldosSalarios":

			$arrayInformacionE=array();
			$arrayInformacionA=array();

			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT idSueldos,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND modifica IS NULL AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY cedula ORDER BY idSueldos;");


			$regimen=$objeto->getObtenerInformacionGeneral("SELECT regimen FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

			$jason['regimen']=$regimen;

			$jason['obtenerInformacion']=$obtenerInformacion;
			$jason['idActividad']=$idActividad;

		break;

		case  "administrativas":

			
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.justificacionActividad, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividadesadministrativas AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera ORDER BY a1.idActividadAd DESC LIMIT 1) AS justificacionActividad, (SELECT a1.cantidadBien FROM poa_actividadesadministrativas AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera ORDER BY a1.idActividadAd DESC LIMIT 1) AS cantidadBien,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.noviembre,b.octubre,b.diciembre,b.totalTotales FROM poa_actividadesadministrativas AS a INNER JOIN poa_incrementos_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$idOrganismo' AND b.idActividad='$idActividad' AND a.modifica IS NULL AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera;");

			$jason['obtenerInformacion']=$obtenerInformacion;

		break;	

		case  "mantenimiento":

			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS nombreInfras,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 INNER JOIN poa_mantenimiento AS a2 ON a2.provincia=a1.idProvincia WHERE a2.idProgramacionFinanciera=b.idProgramacionFinanciera LIMIT 1) AS nombreProvincia,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS direccionCompleta,(SELECT a1.estado FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS estado,(SELECT a1.tipoRecursos FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS tipoRecursos,(SELECT a1.tipoIntervencion FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS tipoIntervencion,(SELECT a1.detallarTipoIn FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS detallarTipoIn,(SELECT a1.tipoMantenimiento FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS tipoMantenimiento, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.materialesServicios, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS materialesServicios,(SELECT a1.fechaUltimo FROM poa_mantenimiento AS a1 WHERE a1.idProgramacionFinanciera=b.idProgramacionFinanciera ORDER BY a1.idMantenimiento DESC LIMIT 1) AS fechaUltimo,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.totalTotales FROM poa_programacion_financiera_incremento AS b INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN poa_mantenimiento AS zL ON zL.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismo' AND b.idActividad='$idActividad' AND zL.modifica IS NULL AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY zL.idProgramacionFinanciera ORDER BY zL.idMantenimiento;");

			$jason['obtenerInformacion']=$obtenerInformacion;

		break;	

		case  "actDeportivasIns":

			
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte LIMIT 1) AS Deporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.paisnombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS ciudadPais,IF((SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) IS NULL, 'INT',(SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance)) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.justificacionAd, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detalleBien,a.canitdarBie,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.detalleBien, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  justificacionAd,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem AS totalTotales FROM poa_programacion_financiera_incremento AS b INNER JOIN poa_actdeportivas AS a  ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$idOrganismo' AND b.idActividad='$idActividad' AND a.modifica IS NULL AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idItem;");

			$jason['obtenerInformacion']=$obtenerInformacion;

		break;	

		case  "suminitrosAEe":

			$arrayInformacionE=array();
			$arrayInformacionA=array();

			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idSumi,a.tipo,a.nombreEscenario,GROUP_CONCAT(b.luz SEPARATOR '---') AS energia,GROUP_CONCAT(b.agua SEPARATOR '---') AS agua FROM poa_suministrosn AS a INNER JOIN poa_suministros AS b ON a.idSumi=b.idSumiN WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idSumi;");


			$regimen=$objeto->getObtenerInformacionGeneral("SELECT regimen FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

			$jason['regimen']=$regimen;


			$jason['obtenerInformacion']=$obtenerInformacion;
			$jason['idActividad']=$idActividad;

		break;

		case "observacionesReasignaciones":
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',nombre,apellido) FROM th_usuario AS a WHERE a.id_usuario = b.idFuncionario LIMIT 1) AS nombre,b.observacionesTecnicas FROM poa_incrementos_recomienda_tecnicos AS b WHERE b.idOrganismo = '$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.tipoE='$tipoE' AND b.observacionesTecnicas != '';");

			$jason['obtenerInformacion']=$obtenerInformacion;

		break;

		case "informacionPoaIncrementos":
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio, a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,b.itemPreesupuestario AS subsecretaria,b.itemPreesupuestario FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idActividad ASC;");

			$obtenerInformacionPre=$objeto->getObtenerInformacionGeneral("SELECT a1.subsecretaria FROM poa_preliminar_envio AS a1 WHERE a1.idOrganismo='$idOrganismo' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idPoaInicial DESC LIMIT 1;");

			$obtenerInformacionPeriodos=$objeto->getObtenerInformacionGeneral("SELECT periodo FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

			$obtenerInformacionObservaciones=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.observaciones, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS observaciones,CONCAT_WS(' ',b.nombre,b.apellido) AS nombreCompleto FROM poa_observacionesenviadas AS a INNER JOIN th_usuario AS b ON a.idUsuario=b.id_usuario WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			/*====================================
			=             Actividades            =
			====================================*/
			
			$actividad3=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad3 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='3' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad4=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad4 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='4' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad5=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad5 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='5' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad6=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad6 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='6' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad7=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad7 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='7' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			
			/*=====  End of  Actividades  ======*/
			

			if($fisicamenteE==18 || $fisicamenteE==20 || $fisicamenteE==27 || $fisicamenteE==28 || $fisicamenteE==29 || $fisicamenteE==30 || $fisicamenteE==31 || $fisicamenteE==32 || $fisicamenteE==33 || $fisicamenteE==34 || $idRolAd=="1"){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");


			}else if ($fisicamenteE==26 || $fisicamenteE==24 || $fisicamenteE=="12" || $fisicamenteE=="13" || $fisicamenteE=="14" || $fisicamenteE=="19" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13") {
				
				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='3' OR a.idActividad='4' OR a.idActividad='5' OR a.idActividad='6' OR a.idActividad='7') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");


			}else if($fisicamenteE==1 || $fisicamenteE==6 || $fisicamenteE==15 || $fisicamenteE==27 || $fisicamenteE==28 || $fisicamenteE==29 || $fisicamenteE==30 || $fisicamenteE==31 || $fisicamenteE==32 || $fisicamenteE==33){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='2') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");

			}else if($fisicamenteE==2 || $fisicamenteE==23 || $fisicamenteE==5 || $fisicamenteE==7){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='1') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");

			}

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("(SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='1' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.metaindicador>0  ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='2' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='3' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='4' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='5' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos'  ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='6' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='7' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1);");


			$obtenerAcCa__reinstala=$objeto->getObtenerInformacionGeneral("SELECT instalacionesE,instalacionesE2,documentoInfraestructura,documentoInstalaciones,documentoSubsess,documentoAdministrativo,documentoCompras FROM poa_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo';");

			$obtenerAnexos = $objeto->getObtenerInformacionGeneral("SELECT nombreAnexo  FROM poa_anexos2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'
			");

			$instalacionesE__variables=$obtenerAcCa__reinstala[0][instalacionesE];
			$instalacionesE2__variables=$obtenerAcCa__reinstala[0][instalacionesE2];
			$documentosInfra__variables=$obtenerAcCa__reinstala[0][documentoInfraestructura];
			$documentosInstala__variables=$obtenerAcCa__reinstala[0][documentoInstalaciones];

			$documentoAdministrativo=$obtenerAcCa__reinstala[0][documentoAdministrativo];
			$documentoSubsess=$obtenerAcCa__reinstala[0][documentoSubsess];
			$documentoCompras=$obtenerAcCa__reinstala[0][documentoCompras];

			$jason['documentoAdministrativo']=$documentoAdministrativo;
			$jason['documentoSubsess']=$documentoSubsess;
			$jason['documentoCompras']=$documentoCompras;

			$jason['instalacionesE__variables']=$instalacionesE__variables;
			$jason['instalacionesE2__variables']=$instalacionesE2__variables;


			$jason['documentosInfra__variables']=$documentosInfra__variables;
			$jason['documentosInstala__variables']=$documentosInstala__variables;

			$jason['obtenerAcCa']=$obtenerAcCa;

			$jason['obtenerAnexos']=$obtenerAnexos;


			$jason['indicadorInformacion']=$indicadorInformacion;
			
			$jason['obtenerInformacion']=$obtenerInformacion;
			

			$jason['obtenerInformacionPre']=$obtenerInformacionPre;

			$jason['obtenerInformacionObservaciones']=$obtenerInformacionObservaciones;

			/*===================================
			=            Actividades            =
			===================================*/
			
			$jason['actividad3']=$actividad3;
			$jason['actividad4']=$actividad4;
			$jason['actividad5']=$actividad5;
			$jason['actividad6']=$actividad6;
			$jason['actividad7']=$actividad7;
			
			/*=====  End of Actividades  ======*/
		break;

		case "informacionPoaAprobado":
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio, a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,b.itemPreesupuestario AS subsecretaria,b.itemPreesupuestario FROM poa_incrementos_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idActividad ASC;");

			$obtenerInformacionPre=$objeto->getObtenerInformacionGeneral("SELECT a1.subsecretaria FROM poa_preliminar_envio AS a1 WHERE a1.idOrganismo='$idOrganismo' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idPoaInicial DESC LIMIT 1;");

			$obtenerInformacionPeriodos=$objeto->getObtenerInformacionGeneral("SELECT periodo FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

			$obtenerInformacionObservaciones=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.observaciones, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS observaciones,CONCAT_WS(' ',b.nombre,b.apellido) AS nombreCompleto FROM poa_observacionesenviadas AS a INNER JOIN th_usuario AS b ON a.idUsuario=b.id_usuario WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			/*====================================
			=             Actividades            =
			====================================*/
			
			$actividad3=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad3 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='3' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad4=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad4 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='4' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad5=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad5 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='5' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad6=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad6 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='6' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$actividad7=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS totalActividad7 FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='7' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			
			/*=====  End of  Actividades  ======*/
			

			if($fisicamenteE==18 || $fisicamenteE==20 || $fisicamenteE==27 || $fisicamenteE==28 || $fisicamenteE==29 || $fisicamenteE==30 || $fisicamenteE==31 || $fisicamenteE==32 || $fisicamenteE==33 || $fisicamenteE==34 || $idRolAd=="1"){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_incrementos_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");


			}else if ($fisicamenteE==26 || $fisicamenteE==24 || $fisicamenteE=="12" || $fisicamenteE=="13" || $fisicamenteE=="14" || $fisicamenteE=="19" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13" || $fisicamenteE=="13") {
				
				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_incrementos_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='3' OR a.idActividad='4' OR a.idActividad='5' OR a.idActividad='6' OR a.idActividad='7') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");


			}else if($fisicamenteE==1 || $fisicamenteE==6 || $fisicamenteE==15 || $fisicamenteE==27 || $fisicamenteE==28 || $fisicamenteE==29 || $fisicamenteE==30 || $fisicamenteE==31 || $fisicamenteE==32 || $fisicamenteE==33){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_incrementos_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='2') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");

			}else if($fisicamenteE==2 || $fisicamenteE==23 || $fisicamenteE==5 || $fisicamenteE==7){

				$obtenerAcCa=$objeto->getObtenerInformacionGeneral("SELECT c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.idOrganismo FROM poa_incrementos_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' AND (a.idActividad='1') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad ASC;");

			}

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("(SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='1' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.metaindicador>0  ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='2' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='3' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='4' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='5' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos'  ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='6' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='7' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1);");


			$obtenerAcCa__reinstala=$objeto->getObtenerInformacionGeneral("SELECT instalacionesE,instalacionesE2,documentoInfraestructura,documentoInstalaciones,documentoSubsess,documentoAdministrativo,documentoCompras FROM poa_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo';");

			$obtenerAnexos = $objeto->getObtenerInformacionGeneral("SELECT nombreAnexo  FROM poa_anexos2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'
			");

			$instalacionesE__variables=$obtenerAcCa__reinstala[0][instalacionesE];
			$instalacionesE2__variables=$obtenerAcCa__reinstala[0][instalacionesE2];
			$documentosInfra__variables=$obtenerAcCa__reinstala[0][documentoInfraestructura];
			$documentosInstala__variables=$obtenerAcCa__reinstala[0][documentoInstalaciones];

			$documentoAdministrativo=$obtenerAcCa__reinstala[0][documentoAdministrativo];
			$documentoSubsess=$obtenerAcCa__reinstala[0][documentoSubsess];
			$documentoCompras=$obtenerAcCa__reinstala[0][documentoCompras];

			$jason['documentoAdministrativo']=$documentoAdministrativo;
			$jason['documentoSubsess']=$documentoSubsess;
			$jason['documentoCompras']=$documentoCompras;

			$jason['instalacionesE__variables']=$instalacionesE__variables;
			$jason['instalacionesE2__variables']=$instalacionesE2__variables;


			$jason['documentosInfra__variables']=$documentosInfra__variables;
			$jason['documentosInstala__variables']=$documentosInstala__variables;

			$jason['obtenerAcCa']=$obtenerAcCa;

			$jason['obtenerAnexos']=$obtenerAnexos;


			$jason['indicadorInformacion']=$indicadorInformacion;
			
			$jason['obtenerInformacion']=$obtenerInformacion;
			

			$jason['obtenerInformacionPre']=$obtenerInformacionPre;

			$jason['obtenerInformacionObservaciones']=$obtenerInformacionObservaciones;

			/*===================================
			=            Actividades            =
			===================================*/
			
			$jason['actividad3']=$actividad3;
			$jason['actividad4']=$actividad4;
			$jason['actividad5']=$actividad5;
			$jason['actividad6']=$actividad6;
			$jason['actividad7']=$actividad7;
			
			/*=====  End of Actividades  ======*/
		break;

		case "verificaInformes_Areas":

			$informe = $objeto->getObtenerInformacionGeneral("SELECT documentoAlto,documentoDesarrollo,documentoInstalaciones,documentoAdministrativo,documentoPlanificacion,documentoInfraestructura FROM poa_incrementos_preliminar_envio WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idPoaIncremento = '$idPoaIncremento';");
						
			$jason['informe']=$informe;

		break;

		case "verificaObservacionPlanificacion":

			$observacion = $objeto->getObtenerInformacionGeneral("SELECT a.observacionesPlanificacion AS observacion,b.idTramite,b.estado FROM poa_incrementos_preliminar_envio AS a LEFT JOIN poa_incrementos_observaciones AS b ON a.idPoaIncremento=b.idTramite WHERE a.idOrganismo = '$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idPoaIncremento = '$idPoaIncremento' GROUP BY b.idObservacion DESC LIMIT 1;");
						
			$jason['observacion']=$observacion;

		break;

		case "verificaObservacionOrganismo":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$observacionOrganismo = $objeto->getObtenerInformacionGeneral("SELECT a.idObservacion,a.fechaEnvioObservacion,a.fechaFinObservacion,a.observacion,a.documentoObservacion FROM poa_incrementos_observaciones AS a INNER JOIN poa_incrementos_preliminar_envio AS b ON a.idTramite=b.idPoaIncremento AND b.activo=a.estado WHERE b.idOrganismo = '$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.estado = 'A';");
						
			$jason['observacionOrganismo']=$observacionOrganismo;

		break;

		case "datosOrganismoInstalacionesIncrementos":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$datosOrganismo = $objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,a.ruc,b.numeroDeAcuerdo,b.fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS representante, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS('--',a.direccion,a.referenciaDireccion,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a.idProvincia=a1.idProvincia LIMIT 1)), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS direccionCompleta,a.correo,a.idOrganismo FROM poa_organismo AS a INNER JOIN poa_organismo_acuerdo_ministerial AS b ON a.idOrganismo=b.idOrganismo WHERE a.idOrganismo='$idOrganismoSession';");


			$datosMatriz = $objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras,b.idActividad,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(act.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS act WHERE act.idActividades=d.idActividad LIMIT 1) AS nombreActividad,c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE zL.provincia=a1.idProvincia LIMIT 1) AS nombreProvincia,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  AS direccionCompleta,zL.estado  AS estado,zL.tipoRecursos AS tipoRecursos,zL.tipoIntervencion AS tipoIntervencion,zL.detallarTipoIn AS detallarTipoIn,zL.tipoMantenimiento AS tipoMantenimiento, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.materialesServicios, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS materialesServicios,zL.fechaUltimo AS fechaUltimo,d.eneroP,d.febreroP,d.marzoP,d.abrilP,d.mayoP,d.junioP,d.julioP,d.agostoP,d.septiembreP,d.octubreP,d.noviembreP,d.diciembreP,d.totalP,d.totalIncrementoEje,d.idTramiteIncremento FROM poa_programacion_financiera AS b INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN poa_mantenimiento AS zL ON zL.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_incrementos_tramites AS d ON d.nombreInfra = zl.nombreInfras AND d.idItemProF=zl.idProgramacionFinanciera WHERE d.idActividad='2' AND d.perioIngreso='$aniosPeriodos__ingesos' AND d.estado != 'I' AND d.idOrganismo='$idOrganismoSession'  ORDER BY  d.idTramiteIncremento DESC LIMIT 1;");


			$datosIndicador = $objeto->getObtenerInformacionGeneral("SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,CONCAT_WS(' ',(SELECT CONCAT_WS('.- ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS b1 ON a1.idLineaPolitica=b1.idIndicadores WHERE a1.idActividades=b.idActividades LIMIT 1)) AS indicador,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='2' AND a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1");

									
			$jason['datosOrganismo']=$datosOrganismo;
			$jason['datosMatriz']=$datosMatriz;
			$jason['datosIndicador']=$datosIndicador;


		break;


	}

	echo json_encode($jason);





