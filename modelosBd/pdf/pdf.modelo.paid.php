<?php
	
	ob_start(); 

	extract($_POST);

	require_once "../../config/config2.php";

	require_once "../../modelosBd/convertirLetras/NumeroALetras.php";

	require_once "../../config/files.php";

	use Luecano\NumeroALetras\NumeroALetras;

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

	$informacionCompleto=$objeto->getInformacionCompletaOrganismoDeportivoConsu($idOrganismo);
	$informacionCompletoDosI=$objeto->getInformacionCompletaOrganismoDeportivoConsuDos($idOrganismo);


	$directorConjunto=$objeto->getDirectorPlani();

	$fisicamenteDireccion=$objeto->getObtenerInformacionGeneral("SELECT descripcionFisicamenteEstructura FROM th_fisicamenteestructura WHERE id_FisicamenteEstructura='$fisicamenteEn';");

	function validacionVariableTrimestre($trimestre) {
		$valorTrimestres = array(
			"primerTrimestre" => "a.enero+a.febrero+a.marzo AS Trimestre",
			"segundoTrimestre" => "a.abril+a.mayo+a.junio AS Trimestre",
			"tercerTrimestre" => "a.julio+a.agosto+a.septiembre AS Trimestre",
			"cuartoTrimestre" => "a.octubre+a.noviembre+a.diciembre AS Trimestre"
		);
	
		if (array_key_exists($trimestre, $valorTrimestres)) {
			return $valorTrimestres[$trimestre];
		} else {
			return "";
		}
	}

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

	$funcionario=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',a.nombre,a.apellido) AS nombreFuncionario,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS descripcionInfraestructurasF,(SELECT a1.id_FisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS idFisicamenteEstructuras FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioEn';");

	$director=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS nombreDirector,(SELECT a1.PersonaACargo FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS PersonaACargoDirector FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioEn';");

	if (isset($idOrganismo)) {
		$fecha__anios__periodos=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_preliminar_envio WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");
	}

	$subsecretarios=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',nombre,apellido) AS nombreSubses FROM th_usuario WHERE id_usuario='".$director[0][PersonaACargoDirector]."';");

	if ($tipoPdf!="asignacionTecho" && $tipoPdf!="asignacion__paid__presupuestarias") {

	$finanCompara=false;
	$instaCompara=false;
	$subsesCompara=false;

	/*=====================================================
	=            Rangos ministerio del deporte            =
	=====================================================*/
	
	$corInsta=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorPlanificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreUsuario,c.descripcionFisicamenteEstructura,d.nombre FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$corFinan=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreFinan FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='2' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$subsesAcFi=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


	$subsesAlto__rendimiento__modificaciones=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


	/*=====================================
	=            Planificación            =
	=====================================*/
	
	$cor__planificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$dir__planificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


	/*=====  End of Planificación  ======*/
	

	$preliminarEnvio=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_preliminar_envio WHERE idOrganismo='$idOrganismo';");

	$fechaAsinacion=$objeto->getObtenerInformacionGeneral("SELECT fecha,nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idInversionUsuario DESC;");

	$tipoOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND (b.nombreTipo LIKE '%ecuatorianas por%' OR b.nombreTipo LIKE '%pico Ecuatoriano%'  OR b.nombreTipo LIKE '%Federaciones Ecuatorianas de Deporte Adaptado%' OR b.nombreTipo LIKE '%Militar Ecuatoriana%' OR b.nombreTipo LIKE '%Policial Ecuatoriana%' OR b.nombreTipo LIKE '%discapacidad%' OR b.nombreTipo LIKE '%adaptado%');");

	$tipoOrganismoDiscapaci=$objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%adaptado%' OR b.nombreTipo LIKE '%discapa%';");

	$tipoOrganismoFormativo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%deportivas provinciales%' OR b.nombreTipo LIKE '%deportivas estudiantiles%' OR b.nombreTipo LIKE '%deportivas estudiantiles%' OR b.nombreTipo LIKE '%ecuador%';");

	$tipoOrganismoAltoRendimiento=$objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%Ecuatoriano%' OR b.nombreTipo LIKE '%Ecuatoriana%' OR b.nombreTipo LIKE '%ecuatorianas%' OR b.nombreTipo LIKE '%por deporte%';");

	$tipoOrganismoRecreativo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%Ligas Deportivas Barriales y Parroquiales del ecuador%' OR b.nombreTipo LIKE '%Asociaciones de ligas barriales y parroquiales%' OR b.nombreTipo LIKE '%Federaciones de ligas provinciales y cantonales, ligas deportivas barriales y parroquiales del Distrito Metropolitano de Quito%';");

	$tipoOrganismoZonales=$objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%deportivas cantonales%' OR b.nombreTipo LIKE '%Deportivas Barriales y Parroquiales%';");


	/*================================================
	=            Suma actividades e itmes            =
	================================================*/
	
	$actividad1=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='1' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad2=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='2' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad3=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='3' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad4=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='4' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad5=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='5' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad6=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='6' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad7=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='7' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	
	/*=====  End of Suma actividades e itmes  ======*/


	/*==================================
	=            Suma meses            =
	==================================*/
	
	$enero=$objeto->getObtenerInformacionGeneral("SELECT SUM(enero) AS enero FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$febrero=$objeto->getObtenerInformacionGeneral("SELECT SUM(febrero) AS febrero FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$marzo=$objeto->getObtenerInformacionGeneral("SELECT SUM(marzo) AS marzo FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$abril=$objeto->getObtenerInformacionGeneral("SELECT SUM(abril) AS abril FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$mayo=$objeto->getObtenerInformacionGeneral("SELECT SUM(mayo) AS mayo FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$junio=$objeto->getObtenerInformacionGeneral("SELECT SUM(junio) AS junio FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$julio=$objeto->getObtenerInformacionGeneral("SELECT SUM(julio) AS julio FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$agosto=$objeto->getObtenerInformacionGeneral("SELECT SUM(agosto) AS agosto FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$septiembre=$objeto->getObtenerInformacionGeneral("SELECT SUM(septiembre) AS septiembre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$octubre=$objeto->getObtenerInformacionGeneral("SELECT SUM(octubre) AS octubre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$noviembre=$objeto->getObtenerInformacionGeneral("SELECT SUM(noviembre) AS noviembre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	$diciembre=$objeto->getObtenerInformacionGeneral("SELECT SUM(diciembre) AS diciembre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
	
	/*=====  End of Suma meses  ======*/
	
	


	if(!empty($tipoOrganismoDiscapaci[0][nombreTipo])){

		$variableDireccion_c="organizaciones deportivas de Deporte Adaptado para personas con discapacidad";

	}else if(!empty($tipoOrganismoFormativo[0][nombreTipo])){

		$variableDireccion_c="organizaciones deportivas de Deporte formativo";

	}else if(!empty($tipoOrganismoAltoRendimiento[0][nombreTipo])){

		$variableDireccion_c="organizaciones deportivas de Alto rendimiento";

	}else if(!empty($tipoOrganismoRecreativo[0][nombreTipo])){

		$variableDireccion_c="organizaciones deportivas de Recreación";

	}else{

		$variableDireccion_c="organizaciones zonales";

	}


	if (!empty($tipoOrganismo[0][nombreTipo])) {
		$variableTipoOrganizacion="para la Dirección de Deporte Convencional para el Alto Rendimiento y Dirección de Deporte para Personas con Discapacidad";
	}else{
		$variableTipoOrganizacion="para la Dirección de Deporte Formativo y Educación física y Dirección de Recreación";
	}


	/*=====  End of Rangos ministerio del deporte  ======*/

	$arrayAsignacion = explode("-", $fechaAsinacion[0][fecha]);

	setlocale(LC_TIME, "spanish");
	
	$anioAsignacion = date($arrayAsignacion[0]);
	$mesAsignacion=date($arrayAsignacion[1]);
	$diaAsignacion=date($arrayAsignacion[2]);	


	setlocale(LC_TIME, "spanish");

	$arrayAsignacionDos = explode("-", $preliminarEnvio[0][fecha]);
	
	$anioAsignacionDos = date($arrayAsignacionDos[0]);
	$mesAsignacionDos=date($arrayAsignacionDos[1]);
	$dateObjAsignacionDos   = DateTime::createFromFormat('!m', $mesAsignacionDos);

	if (!empty($dateObjAsignacionDos)) {

		$monthNameAsignacionDos = strftime('%B', $dateObjAsignacionDos->getTimestamp());
		$diaAsignacionDos=date($arrayAsignacionDos[2]);	

	}


	if ($funcionario[0][idFisicamenteEstructuras]=="13" OR $funcionario[0][idFisicamenteEstructuras]=="19") {
		
		$subrectariaNombres="SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FÍSICA";

	}else if($funcionario[0][idFisicamenteEstructuras]=="12" OR $funcionario[0][idFisicamenteEstructuras]=="14"){

		$subrectariaNombres="SUBSECRETARIA DE DEPORTE DE ALTO RENDIMIENTO";

		if ($funcionario[0][idFisicamenteEstructuras]=="12") {

			$altoRendimientoDirecciones__modficaciones="DIRECCIÓN DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO";

		}else if($funcionario[0][idFisicamenteEstructuras]=="14"){

			$altoRendimientoDirecciones__modficaciones="DIRECCIÓN DE DEPORTE PARA PERSONAS CON DISCAPACIDAD";

		}
		
	}else if($funcionario[0][idFisicamenteEstructuras]=="5" OR $funcionario[0][idFisicamenteEstructuras]=="7"){

		$subrectariaNombres="COORDINACIÓN GENERAL ADMINISTRATIVA FINANCIERA";

	}else if($funcionario[0][idFisicamenteEstructuras]=="6" OR $funcionario[0][idFisicamenteEstructuras]=="15"){
		
		$subrectariaNombres="COORDINACION DE ADMINISTRACION E INFRAESTRUCTURA DEPORTIVA";

	}


	}


	/*==============================
	=            Fechas            =
	==============================*/
	
	setlocale(LC_TIME, "spanish");

	$anio = date('Y');

	//$anio="2022";

	$anio__acutal=date('m');

	$mes=date('m');

	$dateObj   = DateTime::createFromFormat('!m', $mes);
	$monthName = strftime('%B', $dateObj->getTimestamp());

	$dia=date('d');		
	
	/*=====  End of Fechas  ======*/
	
	/*====================================
	=            Seguimientos            =
	====================================*/

	$seguimiento__en__financieros__dos=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera_dos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' LIMIT 1;");

	if (!empty($seguimiento__en__financieros__dos[0][idProgramacionFinanciera])) {

		if($trimestreEvaluadorDos=="primerTrimestre") {

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.enero+a.febrero+a.marzo AS primerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoPrimer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajePrimer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoPrimer FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="segundoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.abril+a.mayo+a.junio AS segundoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoSegundo,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeSegundo,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoSegundo FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");


		}else if($trimestreEvaluadorDos=="tercerTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.julio+a.agosto+a.septiembre AS tercerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoTercer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeTercer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoTercero FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="cuartoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.octubre+a.noviembre+a.diciembre AS cuartoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoCuarto,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeCuarto,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoCuarto FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}


	} else {


		if($trimestreEvaluadorDos=="primerTrimestre") {

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.enero+a.febrero+a.marzo AS primerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoPrimer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajePrimer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoPrimer FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="segundoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.abril+a.mayo+a.junio AS segundoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoSegundo,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeSegundo,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoSegundo FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");


		}else if($trimestreEvaluadorDos=="tercerTrimestre"){


			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.julio+a.agosto+a.septiembre AS tercerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoTercer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeTercer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoTercero FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="cuartoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.octubre+a.noviembre+a.diciembre AS cuartoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoCuarto,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeCuarto,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoCuarto FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");


		}

	}

/************************  RESUMEN EJECUCION VALORES EJECUTADOS  ***********************************/
$seguimiento__actividad_honorarios=$objeto->getObtenerInformacionGeneral("SELECT a1.nombreActividades FROM poa_actividades AS a1 WHERE a1.idActividades = 4 LIMIT 1;");	


if($trimestreEvaluadorDos!="") {

	$trimestreMeses = validacionVariableTrimestre($trimestreEvaluadorDos);
	$seguimiento__en2=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,$trimestreMeses FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

	$jsonOriginal=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,$trimestreMeses FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		 $i = 0;
	 $jsonNuevo = [];

	foreach ($jsonOriginal as $result) {
		$jsonNuevo[$i]["idProgramacionFinanciera"] = $result["idProgramacionFinanciera"];
		$jsonNuevo[$i]["nombreActividades"] = $result["nombreActividades"];

		$originalString = $result["nombreItem"];
		$posicionGuion = strpos($originalString, "-") + 1;
		$valorDespuesDelGuion = substr($originalString, $posicionGuion);

		$originalStringActividad = $result["nombreActividades"];
		$posicionGuionActividad = strpos($originalStringActividad, "-") + 1;
		$valorDespuesDelGuionActividad = substr($originalStringActividad, $posicionGuionActividad);
		$valorNActividad = strstr($originalStringActividad, '-', true);
        $valorNItem = strstr($originalString, '-', true);
	
		 $query1 = "SELECT IFNULL(SUM(a2.mensualEjecutado),0) AS menEjecutado FROM poa_seguimiento_administrativo AS a2 INNER JOIN poa_actividadesadministrativas AS a1 ON a2.idAdministrativo=a1.idActividadAd INNER JOIN poa_programacion_financiera AS b ON a1.idProgramacionFinanciera = b.idProgramacionFinanciera INNER JOIN poa_item AS c ON b.idItem=c.idItem INNER JOIN poa_actividades as d ON d.idActividades=b.idActividad WHERE a2.idOrganismo = '$idOrganismo' AND a2.trimestre='$trimestreEvaluadorDos' AND a2.perioIngreso = '$aniosPeriodos__ingesos' AND d.idActividades='$valorNActividad' AND c.itemPreesupuestario='$valorNItem';";

		$query2 = "SELECT IFNULL(SUM(bss.aporteIessEjecutado),0) AS menEjecutado, dss.idItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;";

	
		$query3="SELECT IFNULL(SUM(b.mensualEjecutado), 0) AS menEjecutado,e.idActividades FROM poa_seguimiento_honorarios as b INNER JOIN poa_honorarios2022 as a ON a.idHonorarios = b.idHonorarios INNER JOIN poa_programacion_financiera as c ON a.idActividad=c.idActividad AND b.idOrganismo=c.idOrganismo AND b.perioIngreso=c.perioIngreso INNER JOIN poa_item as d ON c.idItem = d.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE b.idOrganismo='$idOrganismo' AND b.trimestre='$trimestreEvaluadorDos' AND b.perioIngreso='$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';";

		$query4 = "SELECT IFNULL(SUM(a.mensualEjecutado), 0) AS menEjecutado FROM poa_segimiento_competencias AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';";

		$query5 = "SELECT IFNULL(SUM(a.mensualEjecutado), 0) AS menEjecutado FROM poa_segimiento_recreativos AS a   INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';";

		$query6 = "SELECT IFNULL(SUM(a.mensualEjecutado), 0) AS menEjecutado  FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem INNER JOIN poa_actividades as f ON f.idActividades=c.idActividad WHERE c.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND f.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';";


		$query7="SELECT IFNULL(SUM(a.mensualEjecutado), 0) AS menEjecutado FROM poa_segimiento_capacitacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND d.itemPreesupuestario='$valorNItem' AND e.idActividades='$valorNActividad';";

		$query8 = "SELECT IFNULL(SUM(a.mensualEjecutado), 0) AS menEjecutado FROM poa_segimiento_implementacion AS a   INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';";


		$a=$objeto->getObtenerInformacionGeneral($query1);
		$b=$objeto->getObtenerInformacionGeneral($query2);
		$c=$objeto->getObtenerInformacionGeneral($query3);
		$d=$objeto->getObtenerInformacionGeneral($query4);
		$e=$objeto->getObtenerInformacionGeneral($query5);
		$f=$objeto->getObtenerInformacionGeneral($query6);
		$g=$objeto->getObtenerInformacionGeneral($query7);
		$h=$objeto->getObtenerInformacionGeneral($query8);
	
		if($a[0]["menEjecutado"]>0){

			$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(a2.mensualEjecutado) AS menEjecutado FROM poa_seguimiento_administrativo AS a2 INNER JOIN poa_actividadesadministrativas AS a1 ON a2.idAdministrativo=a1.idActividadAd INNER JOIN poa_programacion_financiera AS b ON a1.idProgramacionFinanciera = b.idProgramacionFinanciera INNER JOIN poa_item AS c ON b.idItem=c.idItem INNER JOIN poa_actividades as d ON d.idActividades=b.idActividad WHERE a2.idOrganismo = '$idOrganismo' AND a2.trimestre='$trimestreEvaluadorDos' AND a2.perioIngreso = '$aniosPeriodos__ingesos' AND d.idActividades='$valorNActividad' AND c.itemPreesupuestario='$valorNItem';");
			$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
		}else{	
			if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 38){
				$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.aporteIessEjecutado) AS menEjecutado FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;");
				$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
			}else {
				if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 52){
					$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.decimoCuartoEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;");
					$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
				}else{
					if ($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 53){
						$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.decimoTerceroEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso; 
						");
						$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
					}else{
						if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 65){
							$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.fondosReservasEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;");
							$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
						}else{
							if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 97){
								$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.sueldosalarioEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;");
								$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
							}else{
								if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 49){
									$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.compensacionDeshaucioEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;");
									$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
								}else{
									if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 50){
										$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.vacionesEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;
										");
										$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
									}else{
										if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 94){
											$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.renunciaVoluntariaEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;"); 
											$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];

										}else{
											if($b[0]["menEjecutado"]>0 && $b[0]["idItem"] == 156){
												$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(bss.despidoIntepestivoEjecutado) AS menEjecutado, dss.nombreItem FROM poa_sueldossalarios2022 AS ass INNER JOIN poa_seguimiento_sueldos_salarios AS bss ON ass.idSueldos = bss.idSueldosSalarios INNER JOIN poa_programacion_financiera AS css ON bss.idOrganismo = css.idOrganismo INNER JOIN poa_item AS dss ON css.idItem = dss.idItem INNER JOIN poa_actividades as e ON e.idActividades=css.idActividad WHERE bss.idOrganismo = '$idOrganismo' AND bss.periodo = '$trimestreEvaluadorDos' AND  bss.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND dss.itemPreesupuestario='$valorNItem' AND ass.idActividad = css.idActividad AND css.perioIngreso = bss.perioIngreso;"); 
												$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
											}else{
												if($e[0]["menEjecutado"]>0){
													$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.mensualEjecutado) AS menEjecutado FROM poa_segimiento_recreativos AS a   INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';");
													$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
												}else{
													if($f[0]["menEjecutado"]>0){
														$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.mensualEjecutado) AS menEjecutado  FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem INNER JOIN poa_actividades as f ON f.idActividades=c.idActividad WHERE c.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND f.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';");
														$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
													}else{
														if($g[0]["menEjecutado"]>0){
															$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.mensualEjecutado) AS menEjecutado FROM poa_segimiento_capacitacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND d.itemPreesupuestario='$valorNItem' AND e.idActividades='$valorNActividad';");
															$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
														}else{
															if($h[0]["menEjecutado"]>0){
																$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.mensualEjecutado) AS menEjecutado FROM poa_segimiento_implementacion AS a   INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';");
																$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
															}else{
																if($c[0]["menEjecutado"]>0 || $c[0]["idActividades"] == 4){
																	//$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT IFNULL(SUM(h2.mensualEjecutado), 0) AS menEjecutado, h4.nombreItem FROM poa_honorarios2022 AS h1 INNER JOIN poa_seguimiento_honorarios AS h2 ON h1.idHonorarios = h2.idHonorarios INNER JOIN poa_programacion_financiera AS h3 ON h2.idOrganismo = h3.IdOrganismo INNER JOIN poa_item AS h4 ON h3.idItem = h4.idItem WHERE h2.idOrganismo = '$idOrganismo' AND h2.trimestre = '$trimestreEvaluadorDos' AND h2.perioIngreso = '$aniosPeriodos__ingesos' AND h4.nombreItem LIKE '%$valorDespuesDelGuion%' AND h1.idActividad = h3.idActividad");
																	$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(b.mensualEjecutado) AS menEjecutado FROM poa_seguimiento_honorarios as b INNER JOIN poa_honorarios2022 as a ON a.idHonorarios = b.idHonorarios INNER JOIN poa_programacion_financiera as c ON a.idActividad=c.idActividad AND b.idOrganismo=c.idOrganismo AND b.perioIngreso=c.perioIngreso INNER JOIN poa_item as d ON c.idItem = d.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE b.idOrganismo='$idOrganismo' AND b.trimestre='$trimestreEvaluadorDos' AND b.perioIngreso='$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';");
																	$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
																}else{
																	if($d[0]["menEjecutado"]>0){
																		// $Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(ev1.mensualEjecutado) AS menEjecutado FROM poa_segimiento_competencias AS ev1 INNER JOIN poa_programacion_financiera AS ev2 ON ev1.idOrganismo = ev2.idOrganismo INNER JOIN poa_item AS ev4 ON ev2.idItem=ev4.idItem WHERE ev1.idOrganismo = '$idOrganismo' AND trimestre='$trimestreEvaluadorDos' AND ev1.perioIngreso = '$aniosPeriodos__ingesos' AND ev4.nombreItem LIKE '%$valorDespuesDelGuion%'");
																		// $jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
																		
																		$Actividad001=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.mensualEjecutado) AS menEjecutado FROM poa_segimiento_competencias AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades as e ON e.idActividades=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestreEvaluadorDos' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND e.idActividades='$valorNActividad' AND d.itemPreesupuestario='$valorNItem';");
																		$jsonNuevo[$i]["ejecutadoPrimer"] = $Actividad001[0]["menEjecutado"];
																	}else{
																		$jsonNuevo[$i]["ejecutadoPrimer"] = 0;
																	}	
																}	
															}
														}
													}
												}
											}
										}
										
									}
								}
							}
						}
					}
				}
			}
		}
	
		 $jsonNuevo[$i]["nombreItem"] = $result["nombreItem"];
		 $jsonNuevo[$i]["Trimestre"] = $result["Trimestre"];
		//  $jsonNuevo[$i]["programadoPrimer"] = $result["programadoPrimer"];
		// $jsonNuevo[$i]["porcentajePrimer"] = $result["porcentajePrimer"];
						
		 $i=$i+1;				
	 }
	 $seguimiento__en2 = $jsonNuevo;
}

/***************************************************************************************************/
	
	


	$declaracionRepresentante=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreResponsablePoa, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreResponsablePoa FROM poa_organismo WHERE idOrganismo='$idOrganismo';");

	/*=====  End of Seguimientos  ======*/
	
	/*==============================================
	=            Seguimientos relativos            =
	==============================================*/

	if (isset($periodo)) {

		if ($periodo=="primerTrimestre" OR $periodo=="segundoTrimestre") {
			$sumaSemestrales="SUM(a1.enero)+SUM(a1.febrero)+SUM(a1.marzo)+SUM(a1.abril)+SUM(a1.mayo)+SUM(a1.junio)";
		}else if($periodo=="cuartoTrimestre" OR $periodo=="tercerTrimestre"){
			$sumaSemestrales="SUM(a1.julio)+SUM(a1.agosto)+SUM(a1.septiembre)+SUM(a1.octubre)+SUM(a1.noviembre)+SUM(a1.diciembre)";
		}

		if ($periodo=="primerTrimestre") {
			$constula2__3="a1.trimestre='primerTrimestre'";
		}else if($periodo=="segundoTrimestre"){
			$constula2__3="(a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre')";
		}else if($periodo=="tercerTrimestre"){
			$constula2__3="(a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre')";
		}else if($periodo=="cuartoTrimestre"){
			$constula2__3="(a1.trimestre='cuartoTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='tercerTrimestre')";
		}			

		if ($periodo=="primerTrimestre") {
			$constula2__3__periodo="a1.periodo='primerTrimestre'";
		}else if($periodo=="segundoTrimestre"){
			$constula2__3__periodo="(a1.periodo='segundoTrimestre' OR a1.periodo='primerTrimestre')";
		}else if($periodo__periodo=="tercerTrimestre"){
			$constula2__3__periodo="(a1.periodo='tercerTrimestre' OR a1.periodo='primerTrimestre' OR a1.periodo='segundoTrimestre')";
		}else if($periodo=="cuartoTrimestre"){
			$constula2__3__periodo="(a1.periodo='cuartoTrimestre' OR a1.periodo='primerTrimestre' OR a1.periodo='segundoTrimestre' OR a1.periodo='tercerTrimestre')";
		}			



		$seguimiento__objetos__dimencionales=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,IFNULL((SELECT a1.idSeguimientoFinanciero FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3 LIMIT 1),0) AS idSeguimientoFinanciero,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS actividades,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad GROUP BY a1.idActividad)) AS sumaPlanificacion,IF((SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3) IS NULL OR (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3)=0,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad GROUP BY a1.idActividad)),(SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3)) AS programado,a.idActividad,IFNULL((SELECT ROUND(SUM(a1.planificado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3),0) AS planificado,IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idActividad),0) AS ejecutado FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad;");

	}



	


	$usuarioUsados__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.PersonaACargo,b.descripcionPuestoInstitucional,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS nombreSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS apellidoSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.descripcionPuestoInstitucional, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 INNER JOIN th_puestoinstitucional AS a2 ON a1.puestoInstitucional=a2.id_PuestoInstitucional WHERE a1.id_usuario=a.PersonaACargo) AS cargoSuperior FROM th_usuario AS a INNER JOIN th_puestoinstitucional AS b ON a.puestoInstitucional=b.id_PuestoInstitucional WHERE a.id_usuario='$idUSeguimientos';");
	

		$indicadores__altos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

		$indicadores__altos2023=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,  (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores ON a1.idActividades=a.idActividad  WHERE a.idOrganismo='$idOrganismo'AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a2.nombreIndicador ORDER BY a.idActividad; ");


		

		
	/*=====  End of Seguimientos relativos  ======*/
	
	$horizontal=false;

	switch ($tipoPdf) {

		case  "pdf__informe__obra__infraestructura__2023":


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/seguimiento/informeTecnico__seguimiento/";
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

			
				<table style='width:100%'>

					<tr>
						<th colspan='1'>

							<img  src='../../images/titulo__ministerio__deporte.png'/>

						</th>
				


						<th colspan='7'>

							<center>
									
							INFORME JUSTICATIVO DEL REQUERIMIENTO PARA OPTIMIZACIÓN DE INFRAESTRUCTURA DEPORTIVA

							</center>

						</th>

		

						<th colspan='1'>

							<img  src='../../images/titulo__principis__ministerios.png'/>

						</th>
					</tr>

							

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							1.	DATOS GENERALES DEL OBJETO DE FINANCIAMIENTO

						</th>

		

					</tr>

				</table>

				<hr>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;1.1 NOMBRE DEL OBJETO DE FINANCIAMIENTO:

						</th>

		

					</tr>

					<tr>

						<td style = 'background:#e8edff'>

							".$objetoFinanciamiento."

						</td>

		

					</tr>

					<tr>

						<th style='width:100%!important;'>

						&nbsp;1.2 INFORMACIÓN GENERAL DE LA ORGANIZACIÓN DEPORTIVA/ ENTIDAD EJECUTORA:

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='width:100%!important;'>

						&nbsp;&nbsp;1.2.1 Datos de la organización deportiva:

						</th>



					</tr>

				</table>

				<table style='width:100%!important; margin-top:.5em!important;'>
					

					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;RUC DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;NÚMERO Y FECHA DE ACUERDO MINISTERIAL:

						</th>

						<td style = 'background:#e8edff'>
							".$acuerdo__ministerial__organizacion__deportivas."
						</td>

					</tr>

					

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='width:100%!important;'>

						&nbsp;&nbsp;1.2.2 Datos del representante legal de la organización deportiva entidad ejecutora:

						</th>

		

					</tr>

				</table>

				<table style='width:100%!important; margin-top:.5em!important;'>
					

					
					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;NOMBRES Y APELLIDOS:

						</th>

						<td style = 'background:#e8edff'>
							".$presidente__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;DIRECCIÓN COMPLETA:

						</th>

						<td style = 'background:#e8edff'>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th style='width:50%!important;'>

							&nbsp;&nbsp;CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;TELÉFONO CELULAR:

						</th>

						<td style = 'background:#e8edff'>
							".$telCelInfra."
						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							&nbsp;&nbsp;TELÉFONO CONVENCIONAL:

						</th>

						<td style = 'background:#e8edff'>
							".$telConInfra."
						</td>

					</tr>

					

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;1.3 PROPUESTA DE FINANCIAMIENTO E INVERSIÓN:

						</th>

		

					</tr>


				</table>

				<table style='width:50%!important; margin-left:3em!important; border-collapse: collapse;' border='1'>

						<thead>

							<tr >

								<th colspan='1'  style = 'background:#e8edff'>

									<center>DETALLE</center>

								</th>

								<th colspan='1'  style = 'background:#e8edff'>

									<center>VALOR</center>

								</th>
			
							</tr>

							<tr>

								<th>

									<center>OBRA</center>

								</th>
								<td>

									<center>".$valorObra."</center>
								
								</td>

							</tr>

						</thead>

						<tbody>

							<tr>

						
								<th>

									<center>FISCALIZACIÓN (Si aplica)</center>

								</th>


								<td>

									<center>".$valorFiscalizacion."</center>

								</td>

							

							</tr>

							<tr>

							<th>

								<center>TOTAL</center>

							</th>
							<td>

								<center>".$totalValores."</center>
							
							</td>

							</tr>

							


						</tbody>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;1.4 FECHA DE EJECUCIÓN:

						</th>

		

					</tr>


				</table>

				<table style='width:100%!important; margin-top:.5em!important;'>
					

					<tr>

						<th style='width:25%!important;'>

							&nbsp;&nbsp;Fecha Inicio:

						</th>

						<td style = 'background:#e8edff'>
							".$fechaInicioInfra."
						</td>

					

						<th style='width:25%!important;'>

							&nbsp;&nbsp;Fecha Término:

						</th>

						<td style = 'background:#e8edff'>
							".$fechaFinInfra."
						</td>

					</tr>

					
					

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;1.5 COBERTURA Y LOCALIZACIÓN:

						</th>

		

					</tr>


				</table>

				<table style='width:100%!important; margin-left:3em!important; border-collapse: collapse;' border='1'>

						<thead>

							<tr>

								<th>

									<center>PAÍS</center>

								</th>
								<td>

									<center>".$selector__paises."</center>
								
								</td>

							</tr>

					

							<tr>

						
								<th>

									<center>PROVINCIA</center>

								</th>


								<td>

									<center>".$provincia__Datos."</center>

								</td>

							

							</tr>

							<tr>

							<th>

								<center>CANTÓN</center>

							</th>
							<td>

								<center>".$canton__Datos."</center>
							
							</td>

							</tr>

							<tr>

							<th>

								<center>PARROQUIA / COMUNIDAD</center>

							</th>
							<td>

								<center>".$parroquia__Datos."</center>
							
							</td>

							</tr>

							<tr>

							<th>

								<center>UBICACIÓN ESPECÍFICA (Nombre del coliseo, estadio, otros, si aplica)</center>

							</th>
							<td>

								<center>".$ubicacionEspecifica."</center>
							
							</td>

							</tr>

							<tr>

							<th>

								<center>UBICACIÓN GEOGRÁFICA</center>

							</th>
							<td>

								<center>".$ubicacionGeografica."</center>
							
							</td>

							</tr>

							


						</tbody>

				</table>

				

				<br>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							2. CARACTERIZACIÓN DEL OBJETO DE FINANCIAMIENTO

						</th>

		

					</tr>

				</table>

				<hr>
				
				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;2.1 ANÁLISIS DE LA SITUACIÓN ACTUAL (DIAGNÓSTICO):

						</th>

		

					</tr>

					<tr>

						<td style = 'background:#e8edff'>

							".$analisisSituacion."

						</td>

		

					</tr>

					<tr>

						<th>

						&nbsp;2.2 ANTECEDENTES:

						</th>

		

					</tr>

					<tr>

						<td style = 'background:#e8edff'>

							".$antecedentes."

						</td>

		

					</tr>


					<tr>

						<th>

						&nbsp;2.3 ARTICULACIÓN NORMATIVA:

						</th>

		

					</tr>

					<tr>

						<th>

						&nbsp;&nbsp;2.3.1 Articulación con la Constitución del Ecuador:

						</th>

		

					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						Art. 24.- Las personas tienen derecho a la recreación y al esparcimiento, a la práctica del deporte y al tiempo libre.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 280.- dispone que el Plan Nacional de Desarrollo (PND) es el instrumento al que se sujetarán las políticas, programas y proyectos públicos; la programación y ejecución del presupuesto del Estado; y, la inversión y la asignación de los recursos públicos. 
						
						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 292.- menciona que el Presupuesto General del Estado (PGE) es el instrumento para la determinación y gestión de los ingresos y egresos del Estado, e incluye a todo el sector público, con excepción de: seguridad social, banca pública, empresas públicas y gobiernos autónomos descentralizados. 
						
						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 293.- establece que la formulación y ejecución del PGE se sujetarán al PND. 
						
						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 294.- indica que la Función Ejecutiva elaborará cada año la proforma presupuestaria anual y la programación presupuestaria cuatrianual, las cuales se presentarán a la Asamblea Nacional para su aprobación sesenta días antes del inicio del año fiscal respectivo; y, que su formulación y ejecución deben sujetarse al PND
						
						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 381.- El Estado protegerá, promoverá y coordinará la Cultura Física que comprende el Deporte, la Educación Física y la Recreación, como actividades que contribuyen a la salud, formación y desarrollo integral de las personas; impulsará el acceso masivo al deporte y a las actividades deportivas a nivel formativo, barrial y parroquial; auspiciará la preparación y participación de los deportistas en competencias nacionales e internacionales, que incluyen los Juegos Olímpico y Paraolímpico; y fomentará la participación de las personas con discapacidad.
						El Estado garantizará los recursos y la infraestructura necesaria para estas actividades. Los recursos se sujetarán al control estatal, rendición de cuentas y deberán distribuirse en forma equitativa.
						
						<br>
						
						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>

						<th>

						&nbsp;&nbsp;2.3.2 Articulación con la Ley del Deporte, Educación Física y Recreación y su Reglamento:

						</th>

		

					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						Art. 3.- De la práctica del deporte, educación física y recreación. - La práctica del deporte, educación física y recreación debe ser libre y voluntaria y constituye un derecho fundamental y parte de la formación integral de las personas. Serán protegidas por todas las Funciones del Estado.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						Art. 11.- De la práctica del deporte, educación física y recreación. - Es derecho de las y los ciudadanos practicar deporte, realizar educación física y acceder a la recreación, sin discrimen alguno de acuerdo a la Constitución de la República y a la presente Ley.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 13.- señala lo siguiente: Del Ministerio.- “El Ministerio Sectorial es el órgano rector y planificador del Deporte, Educación Física y Recreación; le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, las leyes, instrumentos internacionales y reglamentos aplicables.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Tendrá dos objetivos principales, la activación de la población para asegurar la salud de las y los ciudadanos y facilitar la consecución de logros deportivos a nivel nacional e internacional de las y los deportistas incluyendo, aquellos que tengan algún tipo de discapacidad.”

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 14.- Funciones y atribuciones. - Las funciones y atribuciones del Ministerio son:
						Literal k) Coordinar las obras de infraestructura pública para el deporte, la educación física y la recreación, así como mantener adecuadamente la infraestructura a su cargo, para lo cual podrá adoptar las medidas administrativas, técnicas y económicas necesarias, en coordinación con los gobiernos autónomos descentralizados.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>		
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 33.- Federaciones Deportivas Provinciales.- Las Federaciones Deportivas Provinciales cuyas sedes son las capitales de provincia, son las organizaciones que planifican, fomentan, controlan y coordinan las actividades de las asociaciones deportivas provinciales y ligas deportivas cantonales, quienes conforman su Asamblea General. 

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>		
					<tr>
						<td style='text-align:justify!important;'> 

						A través de su departamento técnico metodológico coadyuvarán al desarrollo de los deportes a cargo de las asociaciones deportivas provinciales y ligas deportivas cantonales, respetando la normativa técnica dictada por las Federaciones Ecuatorianas por Deporte y el Ministerio Sectorial. En los casos pertinentes de acuerdo a sus objetivos, coordinarán con las organizaciones barriales y parroquiales, urbanas y rurales, sus actividades de acuerdo a la planificación aprobada por el Ministerio Sectorial.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>			
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 104.- El Ministerio Sectorial financiará o auspiciará proyectos y programas que fomenten el deporte, educación física, recreación y las prácticas deportivas ancestrales, por medio de personas naturales y/o jurídicas, organizaciones públicas, mixtas o privadas, siempre que los proyectos y programas no tengan fines de lucro.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>				
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 130.- De conformidad con el artículo 298 de la Constitución de la República quedan prohibidas todas las pre asignaciones presupuestarias destinadas para el sector. La distribución de los fondos públicos a las organizaciones deportivas estará a cargo del Ministerio Sectorial y se realizará de acuerdo a su política, su presupuesto, la planificación anual aprobada enmarcada en el Plan Nacional del Buen Vivir y la Constitución. Para la asignación presupuestaria desde el deporte formativo hasta de alto rendimiento, se considerarán los siguientes criterios: calidad de gestión sustentada en una matriz de evaluación, que incluya resultados deportivos, impacto social del deporte y su potencial desarrollo, así como la naturaleza de cada organización. Para el caso de la provincia de Galápagos se considerará los costos por su ubicación geográfica… En todos los casos prevalecerá lo dispuesto en el artículo 4 de esta Ley y su Reglamento.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>					
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 137.- Los programas o proyectos financiados con fondos públicos deberán estar alineados con el Plan Nacional de Desarrollo y a la política establecida por el Ministerio Sectorial.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>						
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 139.- La planificación, diseño, construcción, optimización y uso comunitario de las instalaciones públicas para el deporte, educación física y recreación a nivel nacional, financiadas con fondos del Estado, deberá realizarse, basada en las normas o reglamentaciones deportivas y medidas oficiales que rigen nacional e internacionalmente, así como tomando las medidas de gestión de riesgos, bajo los más altos parámetros de prevención de riesgos sísmicos, con los que se autorizará la edificación, reparación, transformación de cualquier obra pública o privada del ámbito deportivo.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>						
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 85 del Reglamento de la Ley del Deporte, Financiamiento.- Para análisis de la viabilidad de financiamiento de infraestructura con fondos del Ministerio Sectorial, los solicitantes deberán presentar un estudio que determine la factibilidad y el potencial uso que la población pueda hacer de dicha instalación y deberán adjuntar la documentación en los términos previstos por el Ministerio Sectorial.

						
						</td>
					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>

						<th>

						&nbsp;&nbsp;2.3.3	Articulación con el Reglamento General del Código Orgánico de Planificación y Finanzas Públicas:

						</th>

		

					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>

						<tr>
							<td style='text-align:justify!important;'> 
							
							Art. 40.- Sistema Integrado de Planificación e Inversión Pública. (…) Cada una de las entidades deberá mantener debidamente archivados todos los documentos de soporte y serán responsables administrativa, civil y penalmente por las solicitudes realizadas con base en formación imprecisa o falsa suministrada a través del sistema. 
							</td>
						</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						El sistema incluirá un banco de proyectos de inversión que contendrá la información necesaria para la planificación, seguimiento y evaluación, conforme a los procedimientos y directrices establecidas por el ente rector de la planificación, bajo los principios de seguridad y transparencia, en coordinación con el ente rector de las finanzas públicas.
						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						

						Las entidades que reciban recursos del Presupuesto General del Estado, a través de programas y proyectos de inversión, serán responsables por la veracidad, confiabilidad e ingreso oportuno de la información al Sistema Integrado de Planificación e Inversión Pública. 

					</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Para tal efecto esta información deberá ser validada por la máxima autoridad de la institución, o su delegado a través de los procedimientos que establezca para el efecto el ente rector de la planificación nacional (…).

					</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Art. 47.- establece a la priorización de proyectos como el logro o concreción de los objetivos del PND. Para este efecto las instituciones del sector público deberán identificar, definir y desarrollar programas y proyectos de inversión en función de las necesidades levantadas, a través de la planificación institucional. El ente rector de la planificación analizará, validará y priorizará estas propuestas para su posterior inclusión dentro del PAI y PGE. 

					</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						El artículo 106 indica que la actualización de dictamen de prioridad procederá en los siguientes casos: 

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						<blockquote>•	Por solicitud de la entidad para la alineación a un nuevo Plan Nacional de Desarrollo.  </blockquote>

						<blockquote>•	Por solicitud de la entidad por el incremento del monto global inicial de la inversión más allá de un 5%. </blockquote>

						<blockquote>•	De oficio por parte del ente rector de planificación por motivos de racionalización del uso de los recursos públicos.</blockquote>

					</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Se aclara en este mismo artículo que, las instituciones no podrán solicitar la modificación de los programas y/o proyectos respecto a sus objetivos y componentes. Sin embargo, durante el proceso de actualización las metas propuestas pueden ser incrementadas o su redacción modificada para una mayor claridad. Finalizado el periodo de vigencia de la prioridad o actualización, la entidad deberá proceder con el cierre y/o baja según corresponda.

						</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						En el caso de que el ente rector de planificación de oficio proceda con la actualización de la priorización de los programas y proyectos de inversión, será con base en la información de gestión reportada por las entidades en los sistemas de planificación y finanzas públicas, así como también información que se solicite directamente a las entidades ejecutoras. 
						
					</td>
					</tr>
				</table>
				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						Durante este proceso el ente rector de planificación, en coordinación con la entidad proponente del programa y/o proyecto y el ente rector de las finanzas públicas, podrá realizar ajustes a los componentes, objetivos, metas, monto global y cronograma valorado. De considerarlo pertinente, el ente rector de planificación podrá disponer a las entidades el inicio del proceso de cierre o baja del programa o proyecto, según corresponda.
						
						
						</td>
					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>

						<th>

						&nbsp;&nbsp;2.3.4 Articulación del objeto de financiamiento con el Plan Nacional de Desarrollo “Plan de Creación de Oportunidades 2021-2025  
						</th>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						Objetivo 6. Garantizar el derecho a la salud integral, gratuita y de calidad
						
						
						</td>
					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						Política:
						<br>
						<br>
						6.7 Fomentar el tiempo libre dedicado a actividades físicas que contribuyan a mejorar la salud de la población.

						
						
						</td>
					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						
						Metas:
						<br>
						<br>
						6.7.1. Reducir la prevalencia de actividad física insuficiente en la población de niñas, niños y jóvenes (5-17 años) del 88,21% al 83,21%.

						</td>
					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 
						
						6.7.2. Reducir la prevalencia de actividad física insuficiente en la población adulta (18-69 años) del 17,80% al 13,00%.
						</td>
					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>

						<th>

						&nbsp;&nbsp;2.3.5	Articulación del objeto de financiamiento con los objetivos estratégicos institucionales:

						</th>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>

						<th>

						&nbsp;&nbsp;a)	Objetivo estratégico institucional 3: Incrementar la infraestructura deportiva con condiciones óptimas a nivel nacional.

						</th>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;2.4	JUSTIFICACIÓN

						</th>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<td style = 'background:#e8edff'>

							".$justificacion."

						</td>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;2.5 OBJETIVO GENERAL Y OBJETIVOS ESPECÍFICOS

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>		

					<tr>

						<th>

						&nbsp;&nbsp;2.5.1	Objetivo general o propósito

						</th>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					

					<tr>

						<td style = 'background:#e8edff'>

							".$objetivoGeneral."

						</td>

		

					</tr>

					
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;&nbsp;2.5.2	Objetivos Específicos

						</th>

		

					</tr>

					
				</table>


				<table style='margin-top:1em!important; width:100%!important;'>

					

					<tr>

						<td style = 'background:#e8edff'>

							".$objetivosEspecificos."

						</td>

		

					</tr>

					
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;2.6 META DEL OBJETO DE FINANCIAMIENTO

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<td style = 'background:#e8edff'>

							".$metaObjeto."

						</td>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;2.7	IDENTIFICACIÓN Y CARACTERIZACIÓN DE LA POBLACIÓN BENEFICIARIA:

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;&nbsp;2.7.1 Beneficiarios Directos

						</th>

		

					</tr>

				

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>
					<tr>
						<td style='text-align:justify!important;'> 

						Son las personas que se benefician directamente de la ejecución del objeto de financiamiento. Ejemplo: deportistas, estudiantes, ciudadanía en general en el rango de edad de 5 a 69 años.						
						</td>
					</tr>
				</table>


				<table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

					<thead>

						<tr>

								

								<th colspan='2' style='background-color: #7d818c;'>

								<center>RANGO</center>

								</th>

								<th colspan='2' style='background-color: #85AFA1;'>

								<center>SEXO</center>

								</th>

								<th colspan='5' style='background-color: #8D85AF;'>

								<center>ETNIA</center>

								</th>

								<th colspan='1' >

									<center>BENEFICIARIOS</center>

								</th>

						</tr>

						<tr>

							

							<th style='background-color: #7d818c;'>
								<center>DESDE</center>
							</th>


							<th style='background-color: #7d818c;'>
								<center>HASTA</center>
							</th>


							<th style='background-color: #85AFA1;'>
								<center>MASCULINO</center>
							</th>

							<th style='background-color: #85AFA1;'>
								<center>FEMENINO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>MESTIZO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>MONTUBIO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>INDIGENA</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>BLANCO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>AFRO</center>
							</th>

							<th >

									<center>DIRECTOS </center>

							</th>

						</tr>

					</thead>

					<tbody>";

					
					for($i = 1; $i <= $beneficiariosDirectos; $i++) {

						
						$desdeEdad = "desdeEdad" . $i;
						$hastaEdad = "hastaEdad" . $i;
						$masculino = "masculino" . $i;
						$femenino = "femenino" . $i;
						$mestizo = "mestizo" . $i;
						$montubio = "montubio" . $i;
						$indigena = "indigena" . $i;
						$blanco = "blanco" . $i;
						$afro = "afro" . $i;
						
						$total = "total" . $i;

						$documentoCuerpo.="

						<tr>

							
							<td><center>".$$desdeEdad."</center></td>
							<td><center>".$$hastaEdad."</center></td>
							<td><center>".$$masculino."</center></td>
							<td><center>".$$femenino."</center></td>
							<td><center>".$$mestizo."</center></td>
							<td><center>".$$montubio."</center></td>
							<td><center>".$$indigena."</center></td>
							<td><center>".$$blanco."</center></td>
							<td><center>".$$afro."</center></td>
							<td><center>".$$total."</center></td>
						</tr>	

						";
						
					}

					$documentoCuerpo.="
					</tbody>

					

				</table>

				
							
				";		
				
				if($registroDeporteAdaptadoPaid==="check"){

					$documentoCuerpo.="
					
					<table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

						<thead>

						<tr>

							<th colspan='2' style='background-color: #7d818c;'>

							<center>RANGO</center>

							</th>

							<th colspan='2' style='background-color: #85AFA1;'>

							<center>SEXO</center>

							</th>

							<th colspan='5' style='background-color: #8D85AF;'>

							<center>ETNIA</center>

							</th>

							

						</tr>


						<tr>

							<th style='background-color: #7d818c;'>
								<center>DESDE</center>
							</th>


							<th style='background-color: #7d818c;'>
								<center>HASTA</center>
							</th>


							<th style='background-color: #85AFA1;'>
								<center>MASCULINO</center>
							</th>

							<th style='background-color: #85AFA1;'>
								<center>FEMENINO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>MESTIZO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>MONTUBIO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>INDIGENA</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>BLANCO</center>
							</th>

							<th style='background-color: #8D85AF;'>
								<center>AFRO</center>
							</th>

							

							
						</tr>

						</thead>

						<tbody>";

						
						for($k = 1; $k <= $beneficiariosAdaptado; $k++) {

							$desdeEdadAdaptado = "desdeEdadAdaptado" . $k;
							$hastaEdadAdaptado = "hastaEdadAdaptado" . $k;
							$masculinoAdaptado = "masculinoAdaptado" . $k;
							$femeninoAdaptado = "femeninoAdaptado" . $k;
							$mestizoAdaptado = "mestizoAdaptado" . $k;
							$montubioAdaptado = "montubioAdaptado" . $k;
							$indigenaAdaptado = "indigenaAdaptado" . $k;
							$blancoAdaptado = "blancoAdaptado" . $k;
							$afroAdaptado = "afroAdaptado" . $k;
							
							

							$documentoCuerpo.="

							<tr>
								<td><center>".$$desdeEdadAdaptado."</center></td>
								<td><center>".$$hastaEdadAdaptado."</center></td>
								<td><center>".$$masculinoAdaptado."</center></td>
								<td><center>".$$femeninoAdaptado."</center></td>
								<td><center>".$$mestizoAdaptado."</center></td>
								<td><center>".$$montubioAdaptado."</center></td>
								<td><center>".$$indigenaAdaptado."</center></td>
								<td><center>".$$blancoAdaptado."</center></td>
								<td><center>".$$afroAdaptado."</center></td>
								
								
							</tr>	

							";
							
						}

						$documentoCuerpo.="
						</tbody>

						

					</table>


					<table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

						<thead>

						<tr>

							

							<th colspan='6' style='background-color: #7d818c;'>

							<center>TIPO DISCAPACIDAD</center>

							</th>

							<th colspan='1' >

								<center>BENEFICIARIOS </center>

							</th>

						</tr>


						<tr>

							

							<th style='background-color: #7d818c;'>
								<center>VISUAL</center>
							</th>


							<th style='background-color: #7d818c;'>
								<center>AUDITIVA</center>
							</th>

							<th style='background-color: #7d818c;'>
								<center>MULTISENSORIAL</center>
							</th>


							<th style='background-color: #7d818c;'>
								<center>INTELECTUAL</center>
							</th>

							<th style='background-color: #7d818c;'>
								<center>FÍSICA</center>
							</th>


							<th style='background-color: #7d818c;'>
								<center>PSIQUICA</center>
							</th>

							<th>
								<center>DIRECTOS</center>
							</th>

						</tr>

						</thead>

						<tbody>";

						
						for($k = 1; $k <= $beneficiariosAdaptado; $k++) {

							$visual = "visual" . $k;
							$auditiva = "auditiva" . $k;
							$multisensorial = "multisensorial" . $k;
							$intelectual = "intelectual" . $k;
							$fisica = "fisica" . $k;
							$psiquica = "psiquica" . $k;
							$totalAdaptado = "totalAdaptado" . $k;
							

							$documentoCuerpo.="

							<tr>
								
								<td><center>".$$visual."</center></td>
								<td><center>".$$auditiva."</center></td>
								<td><center>".$$multisensorial."</center></td>
								<td><center>".$$intelectual."</center></td>
								<td><center>".$$fisica."</center></td>
								<td><center>".$$psiquica."</center></td>
								<td><center>".$$totalAdaptado."</center></td>
								
							</tr>	

							";
							
						}

						$documentoCuerpo.="
						</tbody>

						

					</table>

					
								
					";	

				}


				$documentoCuerpo.="

				<table style='margin-top:1em!important; width:100%!important;'>

					

					<tr>

						<th>

						&nbsp;&nbsp;2.7.2	Beneficiarios Indirectos

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>
						<td style='text-align:justify!important;'> 

						Son aquellas personas que se benefician de forma indirecta con el desarrollo del objeto de financiamiento. Ejemplo: delegados y/o población que se ubican en zonas de influencia del objeto de financiamiento.				
						</td>
					</tr>

				

				</table>

				<table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

						<thead>

							<tr>

								<th  >

									<center>BENEFICIARIOS INDIRECTOS</center>

								</th>

								<th >

									<center>TOTAL</center>

								</th>

								<th >

									<center>JUSTIFICACIÓN CUANTITATIVA</center>

								</th>

							</tr>

						</thead>

						<tbody>";

						
						for($j = 1; $j <= $beneficiariosIndirectos; $j++) {

							$beneficiariosIndirectos__ = "beneficiariosIndirectos__" . $j;
							$totalIndirectos = "totalIndirectos" . $j;
							$justificacionCuantitativa = "justificacionCuantitativa" . $j;
							
							

							$documentoCuerpo.="

							<tr>

								<td><center>".$$beneficiariosIndirectos__."</center></td>
								<td><center>".$$totalIndirectos."</center></td>
								<td><center>".$$justificacionCuantitativa."</center></td>

							</tr>	

							";

						}

						$documentoCuerpo.="
						</tbody>

						

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							3.	OBJETO DE FINANCIAMIENTO

						</th>

		

					</tr>

				</table>

				<hr>
				
				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;3.1	ASPECTO JURÍDICO:

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;&nbsp;3.1.1 Situación Legal del Predio:

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<td style = 'background:#e8edff'>

							".$situacionLegal."

						</td>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;&nbsp;3.1.2 Aprobación Municipal de planos y permiso de construcción:

						</th>

		

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<td style = 'background:#e8edff'>

							".$aprobacionMunicipal."

						</td>

		

					</tr>
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;3.2 DISEÑOS DEFINITIVOS:

						</th>

		

					</tr>

					
				</table>

				<table style='width:100%!important; margin-left:3em!important; border-collapse: collapse;' border='1'>

						<thead>

							<tr>

								<th style='width:40%!important;'> 

									<center>3.2.1	PLANOS CON FIRMAS DE RESPONSABILIDAD DE PROFESIONALES</center>

								</th>
								<td>

									<center>".$planosInput."</center>
								
								</td>

							</tr>

					

							<tr>

						
								<th style='width:40%!important;'>

									<center>3.2.2	ESPECIFICACIONES TÉCNICAS</center>

								</th>


								<td>

									<center>".$especificacionTecnicaInput."</center>

								</td>

							

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>3.2.3	PRESUPUESTO REFERENCIAL</center>

							</th>
							<td>

								<center>".$presupuestoReferencialInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>3.2.4	ANÁLISIS DE PRECIOS UNITARIOS </center>

							</th>
							<td>

								<center>".$analisisPreciosInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>3.2.5	CRONOGRAMA VALORADO DE EJECUCIÓN </center>

							</th>
							<td>

								<center>".$cronogramaValoradoInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>3.2.6	CÁLCULOS DE VOLÚMENES DE OBRA</center>

							</th>
							<td>

								<center>".$calculoVolumenesInput."</center>
							
							</td>

							</tr>

							


						</tbody>

				</table>



				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						&nbsp;3.3 PROPUESTA DE USO DE IMAGEN CORPORATIVA

						</th>

		

					</tr>

					<tr>

						<td style = 'background:#e8edff'>

							".$propuestaImagenCorporativa."

						</td>

		

					</tr>

					
				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>
						<th>

						
						FIRMA DE RESPONSABILIDAD:
						
						</th>

		

					</tr>

				

					
				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<br>
								<br>
								<div>".$presidente__organizacion__deportivas."</div>
								<div>Representante Legal de la Entidad Solicitante</div>
								<br>
								<br>
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<br>
								<br>
								<div>".$nombreProfesionalTecnico."</div>
								<div>Profesional Técnico Responsable</div>
								<br>
								<br>
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

				</table>

				";


		break;

		case  "pdf__informe__fiscalizacion__infraestructura__2023":


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/seguimiento/informeTecnico__seguimiento/";
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

			
				<table style='width:100%'>

					<tr>
						<th colspan='1'>

							<img  src='../../images/titulo__ministerio__deporte.png'/>

						</th>
				


						<th colspan='7'>

							<center>
									
							Informe de justificación del requerimiento para optimización de infraestructura deportiva FISCALIZACIÓN

							</center>

						</th>

		

						<th colspan='1'>

							<img  src='../../images/titulo__principis__ministerios.png'/>

						</th>
					</tr>

							

				</table>

				<table style='width:100%!important; margin-top:.5em!important;'>
					

					<tr>

						<th style='width:40%!important;' class='text-center'>
							<center>
							ORGANISMO DEPORTIVO:
							</center>
						</th>

						<td style = 'background:#e8edff'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					

					

				</table>


				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th style='width:40%!important;'>

						Nombre de la Intervención: 

						</th>

						<td style = 'background:#e8edff'>
						".$nombreIntervencion."
						</td>

					</tr>

					

				</table>

				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th style='width:40%!important;'>

							<blockquote>
							•	Propiedad del Escenario deportivo
							</blockquote>
						
						</th>

						<td style = 'background:#e8edff'>
						".$propiedadEscenario."
						</td>

					</tr>
					<tr>

						<th style='width:40%!important;'>

						<blockquote>
							•	Tipo de gasto
						</blockquote>
						


						</th>

						<td style = 'background:#e8edff'>
						".$tipoGasto."
						</td>

					</tr>
					<tr>

						<th style='width:40%!important;'>
						<blockquote>
						•	Justificación
						</blockquote>

						</th>

						<td style = 'background:#e8edff'>
						".$justificacion."
						</td>

					</tr>
					

					<tr>

						<th style='width:40%!important;'>

						<blockquote>
						•	Productos
						</blockquote>


						</th>

						<td style = 'background:#e8edff'>
						".$productos."
						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

						<blockquote>
						•	Número de beneficiarios 
						</blockquote>


						</th>

						<td style = 'background:#e8edff'>
						".$numeroBeneficiarios."
						</td>

					</tr>

					

				</table>


				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>

						<th>

						Anexos

						</th>

		

					</tr>

					
				</table>

				<table style='width:100%!important; margin-left:3em!important; border-collapse: collapse;' border='1'>

						<thead>

							<tr>

								<th style='width:40%!important;'>

									<center>PRESUPUESTO</center>

								</th>
								<td>

									<center>".$presupuestoFiscalizacionInput."</center>
								
								</td>

							</tr>

							<tr>

								<th style='width:40%!important;'>

									<center>CERTIFICADO DE NO DISPONER TÉCNICOS AFINES</center>

								</th>
								<td>

									<center>".$certificadoNoTecnicosInput."</center>
								
								</td>

							</tr>

					

							<tr>

						
								<th style='width:40%!important;'>

									<center>DECLARACIÓN DE REVISIÓN Y VALIDACIÓN DE ESTUDIOS DEFINITIVOS</center>

								</th>


								<td>

									<center>".$declaracionRevisionValidacionInput."</center>

								</td>

							

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>DECLARACIÓN DE AUTORIZACIÓN PARA LA REALIZACIÓN DE LA INTERVENCIÓN Y COMPROMISO DE RECEPCIÓN</center>

							</th>
							<td>

								<center>".$declaracionAutorizacionIntervencionInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>ESTUDIO DE MERCADO</center>

							</th>
							<td>

								<center>".$estudioMercadoInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>COPIA CERTIFICADA DEL PREDIO</center>

							</th>
							<td>

								<center>".$copiaPredioInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>ACUERDO MINISTERIAL CON EL CUAL SE APROBÓ Y REFORMO EL ESTADO</center>

							</th>
							<td>

								<center>".$acuerdoMinisterialInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>REGISTRO DE DIRECTORIO DE LA OD</center>

							</th>
							<td>

								<center>".$registroDirectorioInput."</center>
							
							</td>

							</tr>

							<tr>

							<th style='width:40%!important;'>

								<center>RESOLUCIONES DE INTERVENCIONES DE OD</center>

							</th>
							<td>

								<center>".$resolucionIntervencionInput."</center>
							
							</td>

							</tr>

							


						</tbody>

				</table>



				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>


				<table style='margin-top:1em!important; width:100%!important;'>

					<tr>
						<th>

						
						FIRMA DE RESPONSABILIDAD:
						
						</th>

		

					</tr>

				

					
				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								
								<div>ELABORADO POR</div>
								<br>
								<div>".$nombreProfesionalTecnico."</div>
								<div>Responsable de la elaboración del PAID - OD</div>
								
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								
								<div>APROBADO POR</div>
								<br>
								<div>".$presidente__organizacion__deportivas."</div>
								<div>Representante Legal ($nombre__organizacion__deportivas) - OD</div>
								
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

				</table>

				";


		break;

		case  "paid__informe__alto__tecnico":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/paid/informes__altos__generados/";
			$parametro2="paidInformeTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			$consultas__paidMaixmos=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idPoaInicial) AS maximoPaids FROM poa_preliminar_envio;");

			$maximos=$consultas__paidMaixmos[0][maximoPaids];

			$asignacionOranismos=$objeto->getObtenerInformacionGeneral("SELECT monto,fecha FROM poa_paid_asignacion_dos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idAsignacion DESC LIMIT 1;");

			$organismo__envioFinal=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idTramitePaid DESC LIMIT 1;");

			$eventoSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoEvento FROM poa_paid_eventos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$interdiciplinarioSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoInterdiciplinario FROM poa_paid_interdisciplinario WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$necesidadesGeneralesSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoNecesidadesGenerales FROM poa_paid_necesidades_generales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$necesidadesIndividualesSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoNecesidadesIndividuales FROM poa_paid_necesidades_individuales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$sumare=0;

			$sumare=floatval($eventoSumas[0][montoEvento]) + floatval($interdiciplinarioSumas[0][montoInterdiciplinario]) + floatval($necesidadesGeneralesSumas[0][montoNecesidadesGenerales]) + floatval($necesidadesIndividualesSumas[0][montoNecesidadesIndividuales]);

			$documentoCuerpo="

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							<center>

								PAID

							</center>

						</th>

					</tr>

					<tr>

						<th>

							<center>

								SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO 

							</center>

						</th>

					</tr>

					<tr>

						<th>

							<center>

								DIRECCIÓN DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO 

							</center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<th>

							<center>

								INFORME DE VIABILIDAD TÉCNICA DE LA PLANIFICACIÓN ANUAL DE INVERSIÓN DEPORTIVA PAID ORGANIZACIONES DEPORTIVAS  $aniosPeriodos__ingesos

							</center>

						</th>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<th>

							<center>

								".strtoupper($informacionCompleto[0][nombreOrganismo])."

							</center>

						</th>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<th>

							<center>

								Numeración y/o Codificación:

							</center>

						</th>

						<td>

							<center>

								".$maximos."-".$anio."

							</center>

						</td>


						<th>

							<center>

								  Fecha de Elaboración:

							</center>

						</th>

						<td>

							<center>

								$fecha_actual

							</center>

						</td>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:4em;'>

					<tr>

						<th>

								ANTECEDENTE


						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							Con fecha 14 de febrero de 2007, se creó el Ministerio del Deporte, mediante Decreto Ejecutivo No. 6, contenido en el Registro Oficial No. 22, en el cual se establece que es obligación del Estado, proteger, estimular y promover la cultura física, el deporte y la recreación, como actividades para la formación integral de las personas, auspiciando la preparación y participación de las y los deportistas en competencias nacionales e internacionales. 


						</td>

					</tr>
				</table>
				
				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

							Mediante Decreto Ejecutivo Nro. 3 de 24 de mayo de 2021, el Sr. Guillermo Lasso Mendoza – Presidente Constitucional de la República del Ecuador, decretó: “Art. 1.- La Secretaría del Deporte se denominará Ministerio del Deporte. Esta entidad, con excepción del cambio de denominación, mantendrá la misma estructura legal constante en el Decreto Ejecutivo No. 438 publicado en el Suplemento del Registro Oficial Nro. 278 del 6 julio de 2018 y demás normativas vigentes.”.  


						</td>
					</tr>
				</table>					
					
				<table style='width:100%!important; margin-top:1em;'>					
					<tr>

							<td style='text-align:justify; margin-top:1em;'>

													
							Mediante Decreto Ejecutivo No. 24 de 24 de mayo de 2021, el Sr. Guillermo Lasso Presidente de la República, designó como Ministro del Deporte al Lcdo. Sebastián Palacios. 

							</td>

					</tr>
				</table>	

				<table style='width:100%!important; margin-top:1em;'>	
					<tr style='height:30em;'>

							<td style='text-align:justify;'>

													
							Mediante oficio SNP-SPN-2021-1056-OF de 09 de diciembre de 2021, dirigido al Ministerio del Deporte, la Subsecretaría de Planificación Nacional, emitió el dictamen de prioridad para el proyecto “Fortalecimiento del deporte de alto rendimiento del Ecuador” periodo 2022-2025. 

							</td>

					</tr>
				</table>
				
				<table style='width:100%!important; margin-top:1em;'>
					<tr style='height:30em;'>

							<td style='text-align:justify;'>

													
							Mediante memorando Nro. MD-DPI-2021-3176-MEM de fecha 13 de diciembre de 2021, el Director de Planificación e Inversión, comunica al Subsecretario del Deporte de Alto Rendimiento el dictamen de prioridad para el proyecto “Fortalecimiento del deporte de alto rendimiento del Ecuador” periodo 2022- 2025, tiene signado el CUP: 91480000.0000.387211 - Ministerio del Deporte. 

							</td>

					</tr>
				</table>
					

				<table style='width:100%!important; margin-top:1em;'>
					<tr>

							<td style='text-align:justify; '>

													
							Mediante ACUERDO MINISTERIAL Nro. 0041, de 06 de marzo de 2023, se ACUERDA: Artículo 1.- Expídase el “Modelo de asignación presupuestaria de la Planificación Anual de Inversión Deportiva para las organizaciones pertenecientes al Alto Rendimiento correspondiente al ejercicio fiscal 2023”, constante en el “Anexo 1” del presente acuerdo. 

							</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

								<th>

										JUSTIFICACIÓN


								</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

								<td style='text-align:justify;'>

								El deporte de alto rendimiento ecuatoriano ha tomado protagonismo en el país y en el mundo. Los resultados alcanzados en el último ciclo olímpico, paralímpico y sordolímpico comprometen a todo el ecosistema deportivo a actuar con eficiencia y responsabilidad, de cara a los siguientes ciclos: París 2024, Los Ángeles 2028 y Tokio 2025 (ciclo sordolímpico).

								</td>

					</tr>

				</table>



				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Tras una exhaustiva evaluación de los modelos de gestión implementados a nivel nacional e internacional, el Plan de Alto Rendimiento del Ecuador establece un nuevo esquema de gestión por excelencia que pone en el centro del mismo al atleta como un ser humano y no como una máquina de producir medallas; que instaura un modelo desconcentrado, ordenado y eficiente entre el ente rector, es decir, el Ministerio del Deporte, y el resto de actores del ecosistema deportivo del país: Comités Olímpico y Paralímpico Ecuatoriano, federaciones ecuatorianas por deporte, federaciones deportivas provinciales, y las respectivas filiales de las mencionadas organizaciones deportivas; la academia, la empresa privada, agencias de cooperación internacional, organizaciones no gubernamentales, entre otros.

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Por otra parte, es importante recalcar que el 2023 es considerado el año pre Olímpico y Paralímpico donde se dan eventos de clasificación directa y eventos de acumulación de puntos al ranking Olímpico y Paralímpico. Por tal motivo, la asignación de recursos a las organizaciones deportivas inmersas en el proyecto de Alto Rendimiento - FDARE, es de alta importancia ya que contribuirán al cumplimiento de las planificaciones anuales de inversión deportiva y así cumplir los objetivos deportivos propuestos como país. 

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						El deporte para personas con discapacidad supone el mayor acontecimiento médico social producido en el siglo XX en materia deportiva, cuyo origen es muy reciente, su evolución va desde la transformación como tratamiento correctivo para personas con discapacidad, hasta su conversión en movimiento de índole deportivo y competitivo a nivel mundial. Las grandes competiciones permiten avances en este sentido, como lo son los Juegos Paralímpicos y Sordolímpicos. 

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						En el mundo organizacional público y privado, se han creado organismos deportivos, sin fines de lucro, con el objeto de incentivar una gestión de calidad para el mejoramiento del rendimiento deportivo de deportistas con y sin discapacidad. 
						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Esta sinergia entre instituciones se coordina con una adecuada distribución de funciones entre el nivel Central o Ministerio del Deporte, a través de sus Direcciones de Deporte Convencional para el Alto Rendimiento y de Deporte Para Personas con Discapacidad, responsables de la política institucional, rectoría, administración, planificación y ejecución del presupuesto, y las organizaciones deportivas inmersas en el proyecto como ejecutores del presupuesto en la parte logística y encargados de la planificación en la parte técnica. 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Con el Oficio Nro. SNP-SPN-2021-1056-OF de 09 de diciembre de 2021, la Subsecretaría de Planificación Nacional emite dictamen de prioridad de acuerdo al siguiente detalle: 

						</td>

					</tr>

				</table>




				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Proyecto</span>: 'Fortalecimiento del deporte de alto rendimiento del Ecuador'

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Período</span>: 2022-2025

						</td>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>CUP</span>: 91480000.0000.387211

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Monto Total</span>: USD 59.207.787,49 financiados con recursos fiscales de acuerdo a lo indicado por el Ministerio del Deporte en el documento del cronograma valorado del proyecto. de acuerdo al siguiente detalle:

						</td>

					</tr>

				</table>

				
				<table style=' margin: 2em auto; border-collapse: collapse; border:1px solid black; width:50%;' border='1'>

					<tr>

						<td style='font-weight:bold;'>
							<center>
								Año
							</center>
						</td>

						<td style='font-weight:bold;'>
							<center>
								Total USD 
							</center>
						</td>

					</tr>

					<tr>

						<td>
							<center>
								2022
							</center>
						</td>

						<td>
							<center>
								5.500.000,00  
							</center>
						</td>
						
					</tr>

					<tr>

						<td>
							<center>
								2023
							</center>
						</td>

						<td>
							<center>
								17.376.100,00 
							</center>
						</td>
						
					</tr>

					<tr>

						<td>
							<center>
								2024
							</center>
						</td>

						<td>
							<center>
								17.897.383,00  
							</center>
						</td>
						
					</tr>


					<tr>

						<td>
							<center>
								2025
							</center>
						</td>

						<td>
							<center>
								18.434.304,49  
							</center>
						</td>
						
					</tr>

					<tr>

						<td>
							<center>
								2025
							</center>
						</td>

						<td>
							<center>
								18.434.304,49  
							</center>
						</td>
						
					</tr>

					<tr>

						<td style='font-weight:bold;'>
							<center>
								Total
							</center>
						</td>

						<td style='font-weight:bold;'>
							<center>
								59.207.787,49 
							</center>
						</td>

					</tr>

				</table>
			

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style='font-weight:bold;'>$".number_format($asignacionOranismos[0][monto])." a la Federación ".strtoupper($informacionCompleto[0][nombreOrganismo])."</span> para la Planificación Anual de Inversión Deportiva PAID $anio con fecha ".$asignacionOranismos[0][fecha].", con el siguiente desglose en los rubros previstos del Proyecto de Inversión: 

						</td>

					</tr>


				</table>

				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black; width:100%!important;' border='1'>

					<tr>

						<th>

							<center>

								N.

							</center>

						</th>

						<th>

							<center>

								Organización deportiva

							</center>

						</th>

						<th>

							<center>

								Eventos

							</center>

						</th>


						<th>

							<center>

								Equipo Interdisciplinario 

							</center>

						</th>


						<th>

							<center>

								Necesidades generales 

							</center>

						</th>


						<th>

							<center>

								Necesidades individuales

							</center>

						</th>

						<th>

							<center>

								Total

							</center>

						</th>

					</tr>

					<tr>

						<td>
							<center>
								1
							</center>
						</td>


						<td>
							<center>
								".strtoupper($informacionCompleto[0][nombreOrganismo])."
							</center>
						</td>

						<td>
							<center>
								".$eventoSumas[0][montoEvento]."
							</center>
						</td>

						<td>
							<center>
								".$interdiciplinarioSumas[0][montoInterdiciplinario]."
							</center>
						</td>
						
						<td>
							<center>
								".$necesidadesGeneralesSumas[0][montoNecesidadesGenerales]."
							</center>
						</td>

						<td>
							<center>
								".$necesidadesIndividualesSumas[0][montoNecesidadesIndividuales]."
							</center>
						</td>						

						<td>
							<center>
								".round($sumare,2)."
							</center>
						</td>

					</tr>	


				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							La ".strtoupper($informacionCompleto[0][nombreOrganismo])." realiza la carga de la Planificación Anual de Inversión Deportiva PAID $anio con fecha ".$organismo__envioFinal[0][fecha].", remite a esta Cartera de Estado, la Matriz de programación PAID y las matrices auxiliares de rubros PAID, en cumplimiento a lo establecido en el artículo 
							27 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.  

						</td>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							En referencia a lo mencionado, <span style='font-weight:bold;'>la Dirección de Deporte de Alto Rendimiento</span>, procede a realizar el siguiente análisis: 

						</td>

					</tr>


				</table>

				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>

					<thead>

						<tr>

						 	<th>
						   		<center>
						   			N-
						   		</center>
						 	</th>

						  	<th>
						   		<center>
						   			Condición
						   		</center>
						  	</th>


						  	<th>
						   		<center>
						   			Cumple (Si/No/N-A)
						   		</center>
						  	</th>


						   	<th>
						   		<center>
						   			Observaciones para la organización deportiva
						   		</center>
						   	</th>

						</tr>

					</thead>

					<tbody>

						 <tr>

						  	<td>
						   		<center>
						   			1
						   		</center>
						  	</td>

						   	<td style='text-align:justify!important;'>
							   tiliza recursos para cubrir gastos en eventos de preparación y competencia autorizados en el proyecto “Fortalecimiento del deporte de alto rendimiento del Ecuador” 
						   	</td>

						   	<td>
						   		<center>
									$puestos__alto
						   		</center>
						   	</td>

						   <td>
						   		<center>
						   			$puestos__alto__text
						   		</center>
						   </td>

						</tr>

						<tr>

						   	<td>
						   		<center>
						   			2
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   Planifica rubros para la contratación del Equipo Interdisciplinario bajo servicios profesionales, autorizados en la normativa legal vigente. 
						   	</td>

						   	<td>
						   		<center>
						   			$recursos__destinados__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$recursos__destinados__alto__text
						   		</center>
						   	</td>

						</tr>

						<tr>

						   	<td>
						   		<center>
						   			3
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   Utiliza recursos para cubrir gastos en necesidades, (Generales e individuales); autorizados en el proyecto “Fortalecimiento del deporte de alto rendimiento del Ecuador” 
						   	</td>

						   	<td>
						   		<center>
						   			$campamento__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$campamento__alto__text
						   		</center>
						   	</td>

						</tr>

						<tr>

						   	<td>
						   		<center>
						   			4
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   La planificación anual de inversión deportiva del organismo deportivo se encuentra enmarcada en lo establecido en la normativa legal vigente. 
						   	</td>

						   	<td>
						   		<center>
									$campamento__evaluaciones__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$campamento__evaluaciones__alto__text
						   		</center>
						   	</td>

						 </tr>

						 <tr>

						   	<td>
						   		<center>
						   			5
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   El organismo deportivo cumple con la no duplicidad de eventos.
						   	</td>

						   	<td>
						   		<center>
						   			$evaluaciones__campamento__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$evaluaciones__campamento__alto__text
						   		</center>
						   	</td>

						 </tr>

						<tr>

						 	<td>
						   		<center>
						   			6
						   		</center>
						 	</td>

						 	<td style='text-align:justify!important;'>
							 El organismo deportivo cumple con la concordancia en la planificación de PAID.
						 	</td>

						 	<td>
						   		<center>
									$recursos__gastos__alto
						   		</center>
						 	</td>


						 	<td>
						   		<center>
						   			$recursos__gastos__alto__text
						   		</center>
						 	</td>

						</tr>

							

					</tbody>

				</table>		

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='text-align:justify;'>

							OBSERVACIONES ADICIONALES

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($observaciones__recomendaciones__recomiendas)."

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='text-align:justify;'>

							CONCLUSIONES:  

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($concluciones__recomendaciones__recomiendas)." 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='text-align:justify;'>

							RECOMENDACIONES:  

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($concluciones__recomendaciones__recomiendas1)." 

						</td>

					</tr>

				</table>



				<table style='width:100%; margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>

					<tr>
						<td style='width:50%!important; padding:2em;'>
							Elaborado por: <div>".$funcionario[0][nombreFuncionario]."</div>
							<div><span style='font-weight:bold;'>Analista de la Dirección de Deporte Convencional para el Alto Rendimiento.</span> </div>
						</td>
						<td>
							<center>
								
							</center>
						</td>
					</tr>


					<tr>
						<td style='width:50%!important; padding:2em;'>
							Revisado por:  <div>".$director[0][nombreDirector]."</div>
							<div><span style='font-weight:bold;'>Director(a) de Deporte Convencional para el Alto Rendimiento. </span></div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>



					<tr>
						<td style='width:50%!important; padding:2em;'>
							Validado por:  <div>".$subsecretarios[0][nombreSubses]."</div>
							<div><span style='font-weight:bold;'>Subsecretario de Deporte de Alto Rendimiento.</span> </div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>						

				</table>					

			";


		break;


		case  "paid__informe__desarrollo__tecnico":

			/*===================================
			=            Generar pdf            =
			===================================*/
		
			$parametro1="../../documentos/paid/informes__desarrollo__generados/";
			$parametro2="paidInformeTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/
		
			$consultas__paidMaixmos=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idPoaInicial) AS maximoPaids FROM poa_preliminar_envio;");
		
			$maximos=$consultas__paidMaixmos[0][maximoPaids];
		
			$asignacionOranismos=$objeto->getObtenerInformacionGeneral("SELECT monto,fecha FROM poa_paid_asignacion_dos WHERE idOrganismo='$idOrganismo' ORDER BY idAsignacion DESC LIMIT 1;");
		
			$organismo__envioFinal=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo' AND estado='A' ORDER BY idTramitePaid DESC LIMIT 1;");
		
			$eventoSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoEvento FROM poa_paid_eventos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$interdiciplinarioSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoInterdiciplinario FROM poa_paid_interdisciplinario WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$necesidadesGeneralesSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoNecesidadesGenerales FROM poa_paid_necesidades_generales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$necesidadesIndividualesSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoNecesidadesIndividuales FROM poa_paid_necesidades_individuales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
		
			$encuentroActivoSumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as montoEncuentroActivo 
				FROM (
					SELECT valorTotal FROM poa_paid_medallas_convencional where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 
					UNION ALL
					SELECT valorTotal FROM poa_paid_matrices_juegos_nacionales where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 
					UNION ALL
					SELECT valorTotal FROM poa_paid_seguros where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 
					UNION ALL
					SELECT valorTotal FROM poa_paid_transporte where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 
					UNION ALL
					SELECT valorTotal FROM poa_paid_bono_deportivo where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 

					UNION ALL
					SELECT valorTotal FROM poa_paid_personal_tecnico_convensional where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and id_rubro='$idRubro' and id_componente='$idComponente'

					UNION ALL
					SELECT valor_total FROM poa_paid_juegos_nacionales_hosp_alim_hidr where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 

					UNION ALL
					SELECT valorTotal FROM poa_paid_pasajes_aereos where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 
					UNION ALL
					SELECT valorTotal FROM poa_paid_uniformes_adaptado where idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' 

				) as CombinedTable ");
		
			$documentoCuerpo="
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th>
		
							<center>
		
								SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FÍSICA 
		
							</center>
		
						</th>
		
					</tr>
		
					<tr>
		
						<th>
		
							<center>
		
								".strtoupper($funcionario[0][descripcionInfraestructurasF])."
		
							</center>
		
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:1em;'>
		
					<tr>
		
						<th>
		
							<center>
		
								INFORME DE TÉCNICO DE APROBACIÓN AL PLAN ANUAL DE INVERSIÓN DEPORTIVA PAID ORGANIZACIONES DEPORTIVAS $anio
		
							</center>
		
						</th>
		
					</tr>
		
		
				</table>
		
		
				<table style='width:100%!important; margin-top:1em;'>
		
					<tr>
		
						<th>
		
							<center>
		
								Numeración y/o Codificación:
		
							</center>
		
						</th>
		
						<td>
		
							<center>
		
								".$maximos."-".$anio."
		
							</center>
		
						</td>
		
		
						<th>
		
							<center>
		
								  Fecha de Elaboración:
		
							</center>
		
						</th>
		
						<td>
		
							<center>
		
								$fecha_actual
		
							</center>
		
						</td>
		
					</tr>
		
		
				</table>
		
				<table style='width:100%!important; margin-top:4em;'>
		
					<tr>
		
						<th>
		
		
								DATOS INFORMATIVOS
		
		
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							<span style='font-weight:bold!important;'>Proyecto</span>: 'ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025'
		
						</td>
		
					</tr>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							<span style='font-weight:bold!important;'>Período</span>: 2022-2025
		
						</td>
		
					</tr>
		
		
				</table>
		
				<table style='width:100%!important; margin-top:4em;'>
		
					<tr>
		
						<th>
		
		
								ANTECEDENTE
		
		
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						El Acuerdo Ministerial 456 denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS
						ORGANIZACIONES DEPORTIVAS” determina:
		 
						
		
						</td>
		
					</tr>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						Se entenderá como fomento deportivo todas aquellas actividades que coadyuvan al desarrollo deportivo, en todos los niveles y son parte de este concepto los siguientes elementos:
						
		
						</td>
		
					</tr>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						Artículo 5. De la Planificación anual de actividades deportivas: Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.
		 
						
		
						</td>
		
					</tr>
		
				</table>
		
		
				<table style='width:100%!important; margin-top:.5em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							<div style='margin-left:3em;'>a. Promoción del deporte, educación física y recreación;</div>
		
						</td>
		
					</tr>
		
		
		
					<tr>
		
						<td style='text-align:justify;'>
		
							<div style='margin-left:3em;'>b. Construcción, rehabilitación y mantenimiento de infraestructura deportiva; y,</div>
		
						</td>
		
					</tr>
		
		
					<tr>
		
						<td style='text-align:justify;'>
		
							<div style='margin-left:3em;'>c. Necesidades complementarias para su adecuado desarrollo.</div>
		
						</td>
		
					</tr>
		
					
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos.		
		
						</td>
		
					</tr>
					<tr>
		
						<td style='text-align:justify;'>
		
						Artículo 22. De la Planificación Anual de Inversión Deportiva. - Constituye una herramienta que permite estructurar el conjunto de actividades vinculadas a los programas y/o proyectos de inversión que el Ministerio del Deporte cuenta en su Plan Anual, los cuales serán definidos por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte.		
		
						</td>
		
					</tr>
					<tr>
		
						<td style='text-align:justify;'>
		
						Las actividades que se incluyan en la Planificación Anual de Inversión Deportiva guardarán relación con los componentes establecidos en cada programa y/o proyecto de inversión aprobado por la Secretaría Nacional de Planificación. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.		
		
						</td>
		
					</tr>
					<tr>
		
						<td style='text-align:justify;'>
		
						La Planificación Anual de Inversión Deportiva será financiada a través del recurso de gasto no permanente.
		
		
						</td>
		
					</tr>
		
				</table>
		
		
				<table style='width:100%!important; margin-top:5em;'>
		
					<tr>
		
						<th>
		
								DESARROLLO
		
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:1em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							Mediante Oficio Nro. SNP-SPN-2021-1254-OF de 28 de diciembre de 2021, el Subsecretario de Planificación Nacional de la Secretaría Nacional de Planificación, emitió dictamen de prioridad para el proyecto 'Encuentro Activo del Deporte Para el Desarrollo 2022-2025', con CUP 91480000.0000.387225 del Ministerio del Deporte, periodo 2022- 2025.	
		
						</td>
		
					</tr>
		
				</table>
		
		
				<table style='width:100%!important; margin-top:1em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							El Proyecto de Inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, tiene como objetivo general el fomentar el buen uso del tiempo libre para mejorar la calidad de vida de la población. El Proyecto antes citado, tiene como objetivos secundarios:
		
						</td>
		
					</tr>
		
				</table>
		
		
		
				<table style='width:100%!important; margin-top:.5em;'>
				
		
					<tr>
		
						<td style='text-align:justify;'>
		
						<div style=' margin-left:4em;'>1. Ejecutar encuentros deportivos a nivel nacional que propicien la formación de deportistas para la reserva deportiva del país. </div>
		
		
		
		
						</td>
		
					</tr>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						<div style='  margin-left:4em;'>2. Impulsar las competiciones deportivas en la población estudiantil del país. </l>
		
						
						</td>
		
					</tr>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						<div style='  margin-left:4em;'>3. Fomentar el deporte formativo en territorio para la identificación de talentos</li>
		
						
		
						</td>
						
					</tr>
		
		
					<tr>
		
						<td style='text-align:justify;'>
							<div style='  margin-left:4em;'>4. Promover hábitos de vida saludable a través de la actividad física y la recreación. Mediante Memorando Nro. MD-SSAF-2022-0004-MEM de 04 de enero de 2022, la Subsecretaria de Desarrollo de la Actividad Física, designó a Guillermo Alejandro Sáenz Mejía, Director de Deporte Formativo y Educación Física, como Líder del Proyecto 'Encuentro Activo del Deporte Para el Desarrollo 2022-2025'</div>
		
		
		
						</td>
		
					</tr>
				
				</table>
		
				<table style='width:100%!important; margin-top:1em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							Mediante Acuerdo Ministerial No. 257 de 30 de septiembre de 2022, se calificó como Emblemático el Proyecto de Inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, con CUP: 91480000.0000.387225 del Ministerio de Deporte. 
		
						</td>
		
					</tr>
		
				</table>
		
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							En la disposición Transitoria Única del Acuerdo antes citado, menciona: <span style='font-weight:bold;'>“Con la finalidad de garantizar la correcta ejecución del proyecto de Inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, el Director/a de Deporte Formativo y Educación Física, en su calidad de Líder del Proyecto continuará ejecutando todas las gestiones técnicas, operativas, administrativas, económicas del referido proyecto hasta la contratación del/la Gerente del Proyecto. Además, los procedimientos de contratación pública, así como todos los instrumentos jurídicos suscritos en el marco del Proyecto de Inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, iniciados hasta antes de la entrada en vigencia de este Acuerdo Ministerial, se concluirán aplicando las normas que estuvieron vigentes al momento de su emisión”</span>.
		
						</td>
		
					</tr>
		
				</table>
		
		
				
		
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de ".number_format($asignacionOranismos[0][monto])." a la Federación <span style='font-weight:bold;'>".strtoupper($informacionCompleto[0][nombreOrganismo])."</span> para la Planificación Anual de Inversión Deportiva PAID $anio con fecha ".$asignacionOranismos[0][fecha].", con el siguiente desglose en los rubros previstos del Proyecto de Inversión: 
		
						</td>
		
					</tr>
		
				</table>
		
				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black; width:100%!important;' border='1'>
		
					<tr>
		
						<th>
		
							<center>
		
								N.
		
							</center>
		
						</th>
		
						<th>
		
							<center>
		
								Organización deportiva
		
							</center>
		
						</th>
		
						<th>
		
							<center>
		
								Juegos nacionales
		
							</center>
		
						</th>
		
						<th>
		
							<center>
		
								Total
		
							</center>
		
						</th>
		
					</tr>
		
					<tr>
		
						<td>
							<center>
								1
							</center>
						</td>
		
		
						<td>
							<center>
								".strtoupper($informacionCompleto[0][nombreOrganismo])."
							</center>
						</td>
		
						<td>
							<center>
								".$encuentroActivoSumas[0][montoEncuentroActivo]."
							</center>
						</td>
		
						<td>
							<center>
								".$encuentroActivoSumas[0][montoEncuentroActivo]."
							</center>
						</td>
		
					</tr>	
		
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							La Federación ".strtoupper($informacionCompleto[0][nombreOrganismo])." realiza la carga de la Planificación Anual de Inversión Deportiva PAID $anio con fecha ".$organismo__envioFinal[0][fecha]." en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 y sus reformas denominado: “Procedimiento que regula el ciclo de planificación de las organizaciones deportivas”. 
		
						</td>
		
					</tr>
		
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							En referencia a lo mencionado, la Dirección <span style='font-weight:bold;'>".strtoupper($funcionario[0][descripcionInfraestructurasF])."</span> procede a realizar el siguiente análisis: 
		
						</td>
		
					</tr>
		
		
				</table>
		
		
		
				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>
		
					<thead>
		
						<tr>
		
							 <th>
								   <center>
									   N-
								   </center>
							 </th>
		
							  <th>
								   <center>
									   Condición
								   </center>
							  </th>
		
		
							  <th>
								   <center>
									   Cumple (Si/No/N-A)
								   </center>
							  </th>
		
		
							   <th>
								   <center>
									   Observaciones para la organización deportiva
								   </center>
							   </th>
		
						</tr>
		
					</thead>
		
					<tbody>
		
						 <tr>
		
							  <td>
								   <center>
									   1
								   </center>
							  </td>
		
							   <td style='text-align:justify!important;'>
							   Utiliza recursos para cubrir gastos autorizados en los componentes citados en el proyecto de inversión “Encuentro activo del deporte para el desarrollo 2022-2025”.	
							   </td>
		
							   <td>
								   <center>
									$deportivas__desarrollo
								   </center>
							   </td>
		
						   <td>
								   <center>
									   $deportivas__desarrollo__text
								   </center>
						   </td>
		
						</tr>
		
						<tr>
		
							   <td>
								   <center>
									   2
								   </center>
							   </td>
		
							   <td style='text-align:justify!important;'>
							   Utiliza recursos para cubrir gastos en necesidades, (Generales e individuales); autorizados en el proyecto “Encuentro activo del deporte para el desarrollo 2022-2025”.	
							   </td>
		
							   <td>
								   <center>
									   $campamento__desarrollo
								   </center>
							   </td>
		
		
							   <td>
								   <center>
									   $campamento__desarrollo__text
								   </center>
							   </td>
		
						</tr>
		
						<tr>
		
							   <td>
								   <center>
									   3
								   </center>
							   </td>
		
							   <td style='text-align:justify!important;'>
							   La planificación anual de inversión deportiva de la organización deportiva se encuentra enmarcada en lo establecido en la normativa legal vigente.
							   </td>
		
							   <td>
								   <center>
									   $procesos__desarrollo
								   </center>
							   </td>
		
		
							   <td>
								   <center>
									   $procesos__desarrollo__text
								   </center>
							   </td>
		
						</tr>
		
						<tr>
		
							   <td>
								   <center>
									   4
								   </center>
							   </td>
		
							   <td style='text-align:justify!important;'>
							   La organización deportiva cumple con la NO duplicidad de eventos.
							   </td>
		
							   <td>
								   <center>
									$gastos__evento__desarrollo
								   </center>
							   </td>
		
		
							   <td>
								   <center>
									   $gastos__evento__desarrollo__text
								   </center>
							   </td>
		
						 </tr>
		
						 <tr>
		
							   <td>
								   <center>
									   5
								   </center>
							   </td>
		
							   <td style='text-align:justify!important;'>
							   La organización deportiva cumple con la concordancia en la planificación de PAID.
							   </td>
		
							   <td>
								   <center>
									   $operativa__anual__desarrollo
								   </center>
							   </td>
		
		
							   <td>
								   <center>
									   $operativa__anual__desarrollo__text
								   </center>
							   </td>
		
						 </tr>
		
						
					</tbody>
		
				</table>	
				
				<table style='width:100%!important; margin-top:5em;'>
		
					<tr>
		
						<th>
		
								Contraparte
		
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<td style='text-align:justify;'>
		
							La ".strtoupper($informacionCompleto[0][nombreOrganismo])." como contraparte a la transferencia realizada por esta Cartera de Estado, facilitará los escenarios deportivos para la ejecución de diferentes disciplinas deportivas. 
		
		
						</td>
		
					</tr>
		
					<tr>
		
						<td style='text-align:justify;'>
		
						La ".strtoupper($informacionCompleto[0][nombreOrganismo])." deberá publicar y promover el nombre del <span style='font-weight:bold!important;'>Ministerio del Deporte</span> en cada una de las actividades previstas en la ejecución de los juegos, además de incorporar y hacer constar el nombre y logotipo de esta institución en los diferentes actos protocolarios.
					
		
		
						</td>
		
					</tr>
					
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th>
		
						OBLIGACIONES Y RESPONSABILIDADES DE LAS PARTES
		
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th>
		
						DEL MINISTERIO DEL DEPORTE
		
						</th>
		
					</tr>
		
				</table>
		
				
		
				<table style='width:100%!important; margin-top:.2em;'>
		
					<tr $obligacionesMinisterio__checked1>
		
						<td >
		
						<li style=' list-style-type: disc; margin-left:4em;'>Transferir a la " .strtoupper($informacionCompleto[0][nombreOrganismo]). ", la cantidad de USD ".$encuentroActivoSumas[0][montoEncuentroActivo].", para la ejecución del evento denominado “Juegos Nacionales”, una vez que la " .strtoupper($informacionCompleto[0][nombreOrganismo]). ", cumpla con el acuerdo 456, sus reformas y demás normativa legal vigente para este fin.</li>
		
		
						</td>
		
					</tr>
		
					<tr  $obligacionesMinisterio__checked2>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Verificar el cumplimiento del proyecto presentado por la " .strtoupper($informacionCompleto[0][nombreOrganismo]). ", conforme lo establecido en la normativa legal vigente. </li>
		
		
						</td>
		
					</tr>
		
					<tr  $obligacionesMinisterio__checked3>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Conformar el congreso técnico de los juegos deportivos nacionales, mismo que se encargará del desarrollo operativo técnico de los juegos considerando las obligaciones establecidas en la “Carta Fundamental de los Juegos Deportivos Nacionales” o en su defecto, en el instrumento que estuviese vigente a la fecha de ejecución de las actividades.</li>
		
						
						</td>
		
					</tr>
		
		
					<tr  $obligacionesMinisterio__checked4>
		
						<td style='text-align:justify;'>
						<li style=' list-style-type: disc; margin-left:4em;'>Realizar el seguimiento y control a la ejecución de los “Juegos Nacionales”, a través de las direcciones competentes.</li>
		
						
						</td>
		
					</tr>
		
					<tr  $obligacionesMinisterio__checked5>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Velar por el correcto uso del presupuesto asignado y aprobado para la ejecución de “Juegos Nacionales”, acorde a la normativa vigente.</li>
		
		
						</td>
		
					</tr>
		
					<tr  $obligacionesMinisterio__checked6>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Realizar la evaluación del informe técnico, económico, disciplinario, medico presentado por el organismo deportivo en los plazos establecidos, a través de las áreas competentes.</li>
		
		
		
						</td>
		
					</tr>

					<tr $obligacionesMinisterioAdicionalcheck>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>$obligacionesMinisterioAdicional</li>
		
		
		
						</td>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th>
		
						DE LA ORGANIZACIÓN DEPORTIVA
						</th>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:1em;'>
		
					<tr $obligacionesOD__checked1>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>La " .strtoupper($informacionCompleto[0][nombreOrganismo]). ", será la responsable de la ejecución de los “Juegos Nacionales”.</li>
		
						
		
						</td>
						
					</tr>
		
					<tr $obligacionesOD__checked2>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>La " .strtoupper($informacionCompleto[0][nombreOrganismo]). " deberá ejecutar únicamente los recursos aprobados en el este Informe Técnico.</li>
		
		
		
						</td>
		
					</tr>
		
					<tr $obligacionesOD__checked3>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Informar al Ministerio del Deporte las novedades técnicas y administrativas de los “Juegos Nacionales”.</li>
		
		
						</td>
		
					</tr>
		
		
					<tr $obligacionesOD__checked4>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Llevar un registro de resultado de las competiciones realizadas en los “Juegos Nacionales”.</li>
		
		
						</td>
		
					</tr>
		
					<tr $obligacionesOD__checked5>
		
						<td style='text-align:justify;'>
						
						<li style=' list-style-type: disc; margin-left:4em;'>La " .strtoupper($informacionCompleto[0][nombreOrganismo]). " una vez finalizada la ejecución de los “Juegos Nacionales”, en un plazo máximo de 30 días deberá presentar al Ministerio del Deporte un informe Técnico, Económico y Disciplinario del evento con los justificativos de gasto correspondientes.</li>
		
						
		
						</td>
		
					</tr>
		
					<tr $obligacionesOD__checked6>
		
						<td style='text-align:justify;'>
						<li style=' list-style-type: disc; margin-left:4em;'>El organismo deportivo deberá dar cumplimiento obligatorio a las normas constitucionales y legales vigentes que regulen el correcto uso y administración de recursos públicos, esto sin perjuicio de las directrices adicionales que puedan ser emitidas por el Administrador o las direcciones involucradas en el proceso de transferencia de recursos, esto amparado en el artículo 14, literal p) de la Ley del Deporte y el artículo 9 del Reglamento General Ley del Deporte, Educación Física y Recreación.</li>
		
						
		
						</td>
		
					</tr>
		
					<tr $obligacionesOD__checked7>
		
						<td style='text-align:justify;'>
						<li style=' list-style-type: disc; margin-left:4em;'>Informar al Ministerio del Deporte a través de una solicitud escrita, todo tipo de requerimiento que implique cambio técnico, presupuestario y/o administrativo distinto a lo establecido en el informe técnico.</li>
		
		
						</td>
		
					</tr>
		
					<tr $obligacionesOD__checked8>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>Promover y publicitar los nombres y logos de los “Juegos Nacionales” y del Ministerio del Deporte, en cada una de las actividades planificadas, una vez aprobados por la Dirección de Comunicación Social del Ministerio del Deporte.</li>
		
		
		
						</td>
		
					</tr>

					<tr $obligacionesODAdicionalcheck>
		
						<td style='text-align:justify;'>
		
						<li style=' list-style-type: disc; margin-left:4em;'>$obligacionesODAdicional</li>
		
		
		
						</td>
		
					</tr>
		
				</table>
		
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th style='text-align:justify;'>
		
							OBSERVACIONES ADICIONALES
		
						</th>
		
					</tr>
		
		
					<tr>
		
						<td style='text-align:justify;'>
		
							 ".nl2br($observaciones__recomendaciones__recomiendas)."
		
						</td>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th style='text-align:justify;'>
		
							CONCLUSIONES:  
		
						</th>
		
					</tr>
		
		
					<tr>
		
						<td style='text-align:justify;'>
		
							".nl2br($concluciones__recomendaciones__recomiendas)."
		
						</td>
		
					</tr>
		
				</table>
		
				<table style='width:100%!important; margin-top:2em;'>
		
					<tr>
		
						<th style='text-align:justify;'>
		
							RECOMENDACIONES:  
		
						</th>
		
					</tr>
		
		
					<tr>
		
						<td style='text-align:justify;'>
		
							".nl2br($concluciones__recomendaciones__recomiendas1)."
		
						</td>
		
					</tr>
		
				</table>
		
		
		
				<table style='width:100%; margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>
		
					<tr>
						<td style='width:50%!important; padding:2em;'>
							Elaborado por: <div>".$funcionario[0][nombreFuncionario]."</div>
							<div><span style='font-weight:bold;'>Analista de Deportes</span></div>
							</td>
							
						<td>
							<center>
								
							</center>
						</td>
					</tr>
		
		
					<tr>
						<td style='width:50%!important; padding:2em;'>
							Revisado por:  <div>".$director[0][nombreDirector]."</div>
							<div><span style='font-weight:bold;'>Director/a de Deporte Formativo y Educación Física</span></div>
						</td>
						<td>
							<center>
								
							</center>
						</td>
					</tr>
		
		
		
					<tr>
						<td style='width:50%!important; padding:2em;'>
							Validado por:  <div>".$subsecretarios[0][nombreSubses]."</div>
							<div><span style='font-weight:bold;'>Subsecretario/a de Desarrollo de la Actividad Física</span></div>
						</td>
						<td>
							<center>
								
							</center>
						</td>
					</tr>						
		
				</table>					
		
			";
		
		
		break;


		case  "paid__informe__infraestructura__tecnico":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/paid/informes__altos__generados/";
			$parametro2="paidInformeTecnicosInfraestructura";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			$consultas__paidMaixmos=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idPoaInicial) AS maximoPaids FROM poa_preliminar_envio;");

			$maximos=$consultas__paidMaixmos[0][maximoPaids];

			$asignacionOranismos=$objeto->getObtenerInformacionGeneral("SELECT monto,fecha FROM poa_paid_asignacion_dos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idAsignacion DESC LIMIT 1;");

			$organismo__envioFinal=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idTramitePaid DESC LIMIT 1;");

			$eventoSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoEvento FROM poa_paid_eventos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$interdiciplinarioSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoInterdiciplinario FROM poa_paid_interdisciplinario WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$necesidadesGeneralesSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoNecesidadesGenerales FROM poa_paid_necesidades_generales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$necesidadesIndividualesSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoNecesidadesIndividuales FROM poa_paid_necesidades_individuales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$sumare=0;

			$sumare=floatval($eventoSumas[0][montoEvento]) + floatval($interdiciplinarioSumas[0][montoInterdiciplinario]) + floatval($necesidadesGeneralesSumas[0][montoNecesidadesGenerales]) + floatval($necesidadesIndividualesSumas[0][montoNecesidadesIndividuales]);

			$documentoCuerpo="

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							<center>

								PAID

							</center>

						</th>

					</tr>

					<tr>

						<th>

							<center>

							COORDINACIÓN DE ADMINISTRACION E INFRAESTRUCTURA DEPORTIVA

							</center>

						</th>

					</tr>

					<tr>

						<th>

							<center>

							DIRECCIÓN DE INFRAESTRUCTURA DEPORTIVA

							</center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<th>

							<center>

								INFORME DE VIABILIDAD TÉCNICA DE LA PLANIFICACIÓN ANUAL DE INVERSIÓN DEPORTIVA PAID ORGANIZACIONES DEPORTIVAS  $aniosPeriodos__ingesos

							</center>

						</th>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<th>

							<center>

								".strtoupper($informacionCompleto[0][nombreOrganismo])."

							</center>

						</th>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<th>

							<center>

								Numeración y/o Codificación:

							</center>

						</th>

						<td>

							<center>

								".$maximos."-".$anio."

							</center>

						</td>


						<th>

							<center>

								  Fecha de Elaboración:

							</center>

						</th>

						<td>

							<center>

								$fecha_actual

							</center>

						</td>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:4em;'>

					<tr>

						<th>

								ANTECEDENTE


						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							Con fecha 14 de febrero de 2007, se creó el Ministerio del Deporte, mediante Decreto Ejecutivo No. 6, contenido en el Registro Oficial No. 22, en el cual se establece que es obligación del Estado, proteger, estimular y promover la cultura física, el deporte y la recreación, como actividades para la formación integral de las personas, auspiciando la preparación y participación de las y los deportistas en competencias nacionales e internacionales. 


						</td>

					</tr>
				</table>
				
				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

							Mediante Decreto Ejecutivo Nro. 3 de 24 de mayo de 2021, el Sr. Guillermo Lasso Mendoza – Presidente Constitucional de la República del Ecuador, decretó: “Art. 1.- La Secretaría del Deporte se denominará Ministerio del Deporte. Esta entidad, con excepción del cambio de denominación, mantendrá la misma estructura legal constante en el Decreto Ejecutivo No. 438 publicado en el Suplemento del Registro Oficial Nro. 278 del 6 julio de 2018 y demás normativas vigentes.”.  


						</td>
					</tr>
				</table>					
					
				<table style='width:100%!important; margin-top:1em;'>					
					<tr>

							<td style='text-align:justify; margin-top:1em;'>

													
							Mediante Decreto Ejecutivo No. 24 de 24 de mayo de 2021, el Sr. Guillermo Lasso Presidente de la República, designó como Ministro del Deporte al Lcdo. Sebastián Palacios. 

							</td>

					</tr>
				</table>	

				<table style='width:100%!important; margin-top:1em;'>	
					<tr style='height:30em;'>

							<td style='text-align:justify;'>

													
							Mediante oficio SNP-SPN-2021-1056-OF de 09 de diciembre de 2021, dirigido al Ministerio del Deporte, la Subsecretaría de Planificación Nacional, emitió el dictamen de prioridad para el proyecto “Fortalecimiento del deporte de alto rendimiento del Ecuador” periodo 2022-2025. 

							</td>

					</tr>
				</table>
				
				<table style='width:100%!important; margin-top:1em;'>
					<tr style='height:30em;'>

							<td style='text-align:justify;'>

													
							Mediante memorando Nro. MD-DPI-2021-3176-MEM de fecha 13 de diciembre de 2021, el Director de Planificación e Inversión, comunica al Subsecretario del Deporte de Alto Rendimiento el dictamen de prioridad para el proyecto “Fortalecimiento del deporte de alto rendimiento del Ecuador” periodo 2022- 2025, tiene signado el CUP: 91480000.0000.387211 - Ministerio del Deporte. 

							</td>

					</tr>
				</table>
					

				<table style='width:100%!important; margin-top:1em;'>
					<tr>

							<td style='text-align:justify; '>

													
							Mediante ACUERDO MINISTERIAL Nro. 0041, de 06 de marzo de 2023, se ACUERDA: Artículo 1.- Expídase el “Modelo de asignación presupuestaria de la Planificación Anual de Inversión Deportiva para las organizaciones pertenecientes al Alto Rendimiento correspondiente al ejercicio fiscal 2023”, constante en el “Anexo 1” del presente acuerdo. 

							</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

								<th>

										JUSTIFICACIÓN


								</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

								<td style='text-align:justify;'>

								El deporte de alto rendimiento ecuatoriano ha tomado protagonismo en el país y en el mundo. Los resultados alcanzados en el último ciclo olímpico, paralímpico y sordolímpico comprometen a todo el ecosistema deportivo a actuar con eficiencia y responsabilidad, de cara a los siguientes ciclos: París 2024, Los Ángeles 2028 y Tokio 2025 (ciclo sordolímpico).

								</td>

					</tr>

				</table>



				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Tras una exhaustiva evaluación de los modelos de gestión implementados a nivel nacional e internacional, el Plan de Alto Rendimiento del Ecuador establece un nuevo esquema de gestión por excelencia que pone en el centro del mismo al atleta como un ser humano y no como una máquina de producir medallas; que instaura un modelo desconcentrado, ordenado y eficiente entre el ente rector, es decir, el Ministerio del Deporte, y el resto de actores del ecosistema deportivo del país: Comités Olímpico y Paralímpico Ecuatoriano, federaciones ecuatorianas por deporte, federaciones deportivas provinciales, y las respectivas filiales de las mencionadas organizaciones deportivas; la academia, la empresa privada, agencias de cooperación internacional, organizaciones no gubernamentales, entre otros.

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Por otra parte, es importante recalcar que el 2023 es considerado el año pre Olímpico y Paralímpico donde se dan eventos de clasificación directa y eventos de acumulación de puntos al ranking Olímpico y Paralímpico. Por tal motivo, la asignación de recursos a las organizaciones deportivas inmersas en el proyecto de Alto Rendimiento - FDARE, es de alta importancia ya que contribuirán al cumplimiento de las planificaciones anuales de inversión deportiva y así cumplir los objetivos deportivos propuestos como país. 

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						El deporte para personas con discapacidad supone el mayor acontecimiento médico social producido en el siglo XX en materia deportiva, cuyo origen es muy reciente, su evolución va desde la transformación como tratamiento correctivo para personas con discapacidad, hasta su conversión en movimiento de índole deportivo y competitivo a nivel mundial. Las grandes competiciones permiten avances en este sentido, como lo son los Juegos Paralímpicos y Sordolímpicos. 

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						En el mundo organizacional público y privado, se han creado organismos deportivos, sin fines de lucro, con el objeto de incentivar una gestión de calidad para el mejoramiento del rendimiento deportivo de deportistas con y sin discapacidad. 
						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Esta sinergia entre instituciones se coordina con una adecuada distribución de funciones entre el nivel Central o Ministerio del Deporte, a través de sus Direcciones de Deporte Convencional para el Alto Rendimiento y de Deporte Para Personas con Discapacidad, responsables de la política institucional, rectoría, administración, planificación y ejecución del presupuesto, y las organizaciones deportivas inmersas en el proyecto como ejecutores del presupuesto en la parte logística y encargados de la planificación en la parte técnica. 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

						Con el Oficio Nro. SNP-SPN-2021-1056-OF de 09 de diciembre de 2021, la Subsecretaría de Planificación Nacional emite dictamen de prioridad de acuerdo al siguiente detalle: 

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Proyecto</span>: 'Optimización de Infraestructura Deportiva a Nivel Nacional'

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Período</span>: 2022-2025

						</td>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>CUP</span>: 91480000.0000.387211

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Monto Total</span>: USD 59.207.787,49 financiados con recursos fiscales de acuerdo a lo indicado por el Ministerio del Deporte en el documento del cronograma valorado del proyecto. de acuerdo al siguiente detalle:

						</td>

					</tr>

				</table>

				
				<table style=' margin: 2em auto; border-collapse: collapse; border:1px solid black; width:50%;' border='1'>

					<tr>

						<td style='font-weight:bold;'>
							<center>
								Año
							</center>
						</td>

						<td style='font-weight:bold;'>
							<center>
								Total USD 
							</center>
						</td>

					</tr>

					<tr>

						<td>
							<center>
								2022
							</center>
						</td>

						<td>
							<center>
								5.500.000,00  
							</center>
						</td>
						
					</tr>

					<tr>

						<td>
							<center>
								2023
							</center>
						</td>

						<td>
							<center>
								17.376.100,00 
							</center>
						</td>
						
					</tr>

					<tr>

						<td>
							<center>
								2024
							</center>
						</td>

						<td>
							<center>
								17.897.383,00  
							</center>
						</td>
						
					</tr>


					<tr>

						<td>
							<center>
								2025
							</center>
						</td>

						<td>
							<center>
								18.434.304,49  
							</center>
						</td>
						
					</tr>

					<tr>

						<td>
							<center>
								2025
							</center>
						</td>

						<td>
							<center>
								18.434.304,49  
							</center>
						</td>
						
					</tr>

					<tr>

						<td style='font-weight:bold;'>
							<center>
								Total
							</center>
						</td>

						<td style='font-weight:bold;'>
							<center>
								59.207.787,49 
							</center>
						</td>

					</tr>

				</table>
			

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style='font-weight:bold;'>$".number_format($asignacionOranismos[0][monto])." a la Federación ".strtoupper($informacionCompleto[0][nombreOrganismo])."</span> para la Planificación Anual de Inversión Deportiva PAID $anio con fecha ".$asignacionOranismos[0][fecha].", con el siguiente desglose en los rubros previstos del Proyecto de Inversión: 

						</td>

					</tr>


				</table>

				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black; width:100%!important;' border='1'>

					<tr>

						<th>

							<center>

								N.

							</center>

						</th>

						<th>

							<center>

								Organización Deportiva

							</center>

						</th>

						<th>

							<center>

								Obra

							</center>

						</th>

						<th>

							<center>

								Total

							</center>

						</th>

					</tr>

					<tr>

						<td>
							<center>
								1
							</center>
						</td>


						<td>
							<center>
								".strtoupper($informacionCompleto[0][nombreOrganismo])."
							</center>
						</td>

						<td>
							<center>
								".$eventoSumas[0][montoEvento]."
							</center>
						</td>

						<td>
							<center>
								".round($sumare,2)."
							</center>
						</td>

					</tr>	


				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							La ".strtoupper($informacionCompleto[0][nombreOrganismo])." realiza la carga de la Planificación Anual de Inversión Deportiva PAID $anio con fecha ".$organismo__envioFinal[0][fecha].", remite a esta Cartera de Estado, la Matriz de programación PAID y las matrices auxiliares de rubros PAID, en cumplimiento a lo establecido en el artículo 
							27 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.  

						</td>

					</tr>


				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							En referencia a lo mencionado, la <span style='font-weight:bold;'> DIRECCIÓN DE INFRAESTRUCTURA DEPORTIVA</span>, procede a realizar el siguiente análisis: 

						</td>

					</tr>


				</table>

				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>

					<thead>

						<tr>

						 	<th>
						   		<center>
						   			N-
						   		</center>
						 	</th>

						  	<th>
						   		<center>
						   			Condición
						   		</center>
						  	</th>


						  	<th>
						   		<center>
						   			Cumple (Si/No/N-A)
						   		</center>
						  	</th>


						   	<th>
						   		<center>
						   			Observaciones para la organización deportiva
						   		</center>
						   	</th>

						</tr>

					</thead>

					<tbody>

						 <tr>

						  	<td>
						   		<center>
						   			1
						   		</center>
						  	</td>

						   	<td style='text-align:justify!important;'>
							   Presenta el Informe de justificación del requerimiento para optimización de infraestructura deportiva 
							   <br>
								•	Estudio de mercado
								<br>
								•	Presupuesto referencial actualizado
								<br>
								•	Análisis de precios unitarios
								<br>
								•	Cronograma valorado de ejecución
								<br>
								•	Especificaciones técnicas
								<br>
								•	Planos y anexos gráficos (debidamente suscritos por un profesional en la rama)
								<br>
								•	Registro fotográfico 
								<br>

						   	</td>

						   	<td>
						   		<center>
									$puestos__alto
						   		</center>
						   	</td>

						   <td>
						   		<center>
						   			$puestos__alto__text
						   		</center>
						   </td>

						</tr>

						<tr>

						   	<td>
						   		<center>
						   			2
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   Declaración debidamente suscrita por el representante de la Organización Deportiva, entidad ejecutora, de que ha recibido, revisado y validado la documentación técnica para la ejecución del proyecto 
						   	</td>

						   	<td>
						   		<center>
						   			$recursos__destinados__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$recursos__destinados__alto__text
						   		</center>
						   	</td>

						</tr>

						<tr>

						   	<td>
						   		<center>
						   			3
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   Declaración debidamente suscrita por el representante de la Organización Deportiva administradora y/o propietaria del bien inmueble, en la que expresa su autorización para la realización de la intervención propuesta y su compromiso para la recepción de la misma
						   	</td>

						   	<td>
						   		<center>
						   			$campamento__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$campamento__alto__text
						   		</center>
						   	</td>

						</tr>

						<tr>

						   	<td>
						   		<center>
						   			4
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   Informe de Justificación del requerimiento de fiscalización para optimización de infraestructura deportiva.
						   	</td>

						   	<td>
						   		<center>
									$campamento__evaluaciones__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$campamento__evaluaciones__alto__text
						   		</center>
						   	</td>

						 </tr>

						 <tr>

						   	<td>
						   		<center>
						   			5
						   		</center>
						   	</td>

						   	<td style='text-align:justify!important;'>
							   Documentos de la legalidad del predio
						   	</td>

						   	<td>
						   		<center>
						   			$evaluaciones__campamento__alto
						   		</center>
						   	</td>


						   	<td>
						   		<center>
						   			$evaluaciones__campamento__alto__text
						   		</center>
						   	</td>

						 </tr>

					</tbody>

				</table>		

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='text-align:justify;'>

							OBSERVACIONES ADICIONALES

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($observaciones__recomendaciones__recomiendas)."

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='text-align:justify;'>

							CONCLUSIONES:  

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($concluciones__recomendaciones__recomiendas)." 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='text-align:justify;'>

							RECOMENDACIONES:  

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($concluciones__recomendaciones__recomiendas1)." 

						</td>

					</tr>

				</table>



				<table style='width:100%; margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>

					<tr>
						<td style='width:50%!important; padding:2em;'>
							Elaborado por: <div>".$funcionario[0][nombreFuncionario]."</div>
							<div><span style='font-weight:bold;'>Analista de la Dirección de Infraestructura Deportiva.</span> </div>
						</td>
						<td>
							<center>
								
							</center>
						</td>
					</tr>


					<tr>
						<td style='width:50%!important; padding:2em;'>
							Revisado por:  <div>".$director[0][nombreDirector]."</div>
							<div><span style='font-weight:bold;'>Director(a) de Infraestructura Deportiva. </span></div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>



					<tr>
						<td style='width:50%!important; padding:2em;'>
							Validado por:  <div>".$subsecretarios[0][nombreSubses]."</div>
							<div><span style='font-weight:bold;'>Coordinador(a) de Administración e Infraestructura Deportiva.</span> </div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>						

				</table>					

			";


		break;

	



	}


?>

<html>

   <head>

      <link href="../../layout/styles/css/estilosPdf.css" rel="stylesheet" type="text/css" media="all">

   </head>

   <body>

   <?php if ($aniosPeriodos__ingesos == "2022") { ?>
		<div id="" style="position: relative; left: 10%;">
			<img src="../../images/headerPdf.png" />
		</div>

		<div id="footer">
			<img src="../../images/footer.png"/>
		</div> 
   <?php }else{ ?>
		<div id="" style="position: relative; left: 10%;">
		<img style=" width:20%!important; margin-bottom:2em!important;" src="../../images/headerPdf2.png" />
		</div>

		<div id="footer">
	   		<img style=" width:100%!important; margin-top:0em!important; margin-bottom:0em!important;" src="../../images/footer2.png"/>
     	</div>
   <?php } ?>
		 	

		<div id="content">

			<?=$documentoCuerpo?>

		</div>

	</body>

</html>

<?php

include_once "../../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

if ($horizontal==true) {
	// Definimos el tamaño y orientación del papel que queremos.h
	$dompdf->setPaper('A3', 'landscape');
}



$dompdf->loadHtml(ob_get_clean());

$dompdf->render();

$canvas = $dompdf->get_canvas(); 
$canvas->page_text(510, 12, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
$canvas->page_text(54, 778, "", "helvetica", 8, array(0,0,0)); //footer

$contenido = $dompdf->output();

$nombreDelDocumento =$parametro1.$parametro3.".pdf";

$bytes = file_put_contents($nombreDelDocumento, $contenido);


if ($tipoPdf!="asignacion__paid__presupuestarias") {

	$dompdf->stream($parametro2);	

}else{

	$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT nombreDocumento FROM poa_paid_documento_asignacion WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDocumentosAsignacion DESC;");
	$documentoPaids=$envio__informaciones[0][nombreDocumento];
	$jason['documentoPaids']=$documentoPaids;

	echo json_encode($jason);

}

