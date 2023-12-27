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
	$dateObjAsignacion   = DateTime::createFromFormat('!m', $mesAsignacion);
	$monthNameAsignacion = strftime('%B', $dateObjAsignacion->getTimestamp());
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



		$seguimiento__objetos__dimencionales=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,IFNULL((SELECT a1.idSeguimientoFinanciero FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3 LIMIT 1),0) AS idSeguimientoFinanciero,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS actividades,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a.idActividad=a1.idActividad GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a.idActividad=a1.idActividad GROUP BY a1.idActividad)) AS sumaPlanificacion,                                                                                    IF( (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND a1.perioIngreso=a.perioIngreso AND $constula2__3) IS NULL OR (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a1.estado='A' AND $constula2__3)=0,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad)),(SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a1.estado='A' AND $constula2__3)) AS programado,                                a.idActividad,IFNULL((SELECT ROUND(SUM(a1.planificado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3),0) AS planificado ,IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) AS ejecutado FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad;");

	}



	


	$usuarioUsados__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.PersonaACargo,b.descripcionPuestoInstitucional,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS nombreSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS apellidoSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.descripcionPuestoInstitucional, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 INNER JOIN th_puestoinstitucional AS a2 ON a1.puestoInstitucional=a2.id_PuestoInstitucional WHERE a1.id_usuario=a.PersonaACargo) AS cargoSuperior FROM th_usuario AS a INNER JOIN th_puestoinstitucional AS b ON a.puestoInstitucional=b.id_PuestoInstitucional WHERE a.id_usuario='$idUSeguimientos';");
	

		$indicadores__altos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

		$indicadores__altos2023=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,  (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores ON a1.idActividades=a.idActividad  WHERE a.idOrganismo='$idOrganismo'AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a2.nombreIndicador ORDER BY a.idActividad; ");


		

		
	/*=====  End of Seguimientos relativos  ======*/
	
	$horizontal=false;

	switch ($tipoPdf) {

		case "panel__documentos__modificacion":

			$idUsuarioSesiones=$_SESSION["idUsuario"];


			$funcionario=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreFuncionario,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS descripcionInfraestructurasF,(SELECT a1.id_FisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS idFisicamenteEstructuras FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioSesiones';");

			$director=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS nombreDirector,(SELECT a1.PersonaACargo FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS PersonaACargoDirector FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioSesiones';");
			$fecha__modificaciones=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_modificaciones_envio_inicial WHERE idModificacionDerfinitiva='$idTramite';");
			$fisicamenteEstructura=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.descripcionFisicamenteEstructura, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS departamento FROM th_usuario AS a INNER JOIN th_fisicamenteestructura AS b ON a.fisicamenteEstructura=b.id_FisicamenteEstructura WHERE a.id_usuario='$idUsuarioSesiones';");
			$cuantasModificaciones=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idOrganismo) AS contador FROM poa_modificaciones_envio_inicial WHERE idOrganismo='$idOrganismo' AND periodoIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			$modificacionesReferencias=$objeto->getObtenerInformacionGeneral("SELECT numeroQuipux,fechaQuipux FROM poa_modificaciones_envio_inicial WHERE idOrganismo='$idOrganismo' AND periodoIngreso='".$aniosPeriodos__ingesos."' AND numeroQuipux IS NOT NULL GROUP BY idOrganismo;");

			$informacionQuipux=$objeto->getObtenerInformacionGeneral("SELECT numeroOficioNoti,fecha FROM poa_documentofinal WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");

			$totalActividades=$objeto->getObtenerInformacionGeneral("SELECT idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades FROM poa_actividades;");



			$actividadSuma__m1=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='1' GROUP BY idOrganismo;");
			$actividadSuma__m2=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='2' GROUP BY idOrganismo;");
			$actividadSuma__m3=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='3' GROUP BY idOrganismo;");
			$actividadSuma__m4=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='4' GROUP BY idOrganismo;");
			$actividadSuma__m5=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='5' GROUP BY idOrganismo;");
			$actividadSuma__m6=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='6' GROUP BY idOrganismo;");
			$actividadSuma__m7=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalPlanifiacionOrigen) AS totalInicial FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite' AND periodoIngreso='$aniosPeriodos__ingesos' AND actividadDestino='7' GROUP BY idOrganismo;");

			$arrayFechas = explode("-", $informacionQuipux[0][fecha]);

			setlocale(LC_TIME, "spanish");

			$dateObjModificaciones   = DateTime::createFromFormat('!m', $arrayFechas[1]);
			$monthNameModificaciones = strftime('%B', $dateObjModificaciones->getTimestamp());



			$arrayFechas__2 = explode("-", $fecha__modificaciones[0][fecha]);

			setlocale(LC_TIME, "spanish");

			$dateObjModificaciones2   = DateTime::createFromFormat('!m', $arrayFechas__2[1]);
			$monthNameModificaciones2 = strftime('%B', $dateObjModificaciones2->getTimestamp());

		    function a_romano($integer, $upcase = true) 
		    {
		        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
		                       'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
		                       'V'=>5, 'IV'=>4, 'I'=>1);
		        $return = '';
		        while($integer > 0) 
		        {
		            foreach($table as $rom=>$arb) 
		            {
		                if($integer >= $arb)
		                {
		                    $integer -= $arb;
		                    $return .= $rom;
		                    break;
		                }
		            }
		        }
		        return $return;
		    }

		    $variableRomanos=a_romano($cuantasModificaciones[0][contador]).PHP_EOL;


			if ($tipoDocumento__D=="alto") {
				$parametro1="../../documentos/modificacion/informe/altoRendimiento/";
			}else if ($tipoDocumento__D=="formativo") {
				$parametro1="../../documentos/modificacion/informe/desarrollo/";
			}else if ($tipoDocumento__D=="infraestructura") {
				$parametro1="../../documentos/modificacion/informe/instalaciones/";
			}else if ($tipoDocumento__D=="planificacion") {
				$parametro1="../../documentos/modificacion/informe/planificacion/";
			}else if ($tipoDocumento__D=="administrativo") {
				$parametro1="../../documentos/modificacion/informe/administrativo/";
			}

			$parametro2="informeModificacion";	
			$parametro3=$idOrganismo."__".$fecha_actual."__".$aniosPeriodos__ingesos;

				$informacionObtenida=$objeto->getObtenerInformacionGeneral("SELECT a.idOrigenDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(f.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadOrigen,a.eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS itemPreesupuestarioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(g.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadDestino,a.eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS itemPreesupuestarioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,b.idActividad AS idOrigenActividad,c.idActividad AS idDestinoActividad,a.idFinancierioOrigen AS idMatrizOrigen, a.idFinancierioDestino AS idMatrizDestino,a.identificadorPaginaReal,a.idModificacionDerfinitiva,a.calificacion AS modificacionEstado,a.observaciones FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_programacion_financiera AS b ON b.idProgramacionFinanciera=a.idFinancierioOrigen INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=b.idItem INNER JOIN poa_item AS e ON e.idItem=c.idItem INNER JOIN poa_actividades AS f ON f.idActividades=b.idActividad INNER JOIN poa_actividades AS g ON g.idActividades=c.idActividad WHERE a.idModificacionDerfinitiva='$idTramite' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.estado IS NULL AND a.identificadorPaginaReal='diferentes' AND (a.actividadDestino='3' OR a.actividadDestino='4' OR a.actividadDestino='5' OR a.actividadDestino='6' OR a.actividadDestino='7');");

				$informacionObtenida__honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(UPPER(a1.nombreItem), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_item AS a1 WHERE a1.idItem='71') AS idFinancierioOrigen, (SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='71') AS itemPreesupuestarioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='71') AS idFinancierioDestino, (SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='71') AS itemPreesupuestarioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,b.idActividad AS idOrigenActividad,c.idActividad AS idDestinoActividad,a.idFinancierioOrigen AS idMatrizOrigen, a.idFinancierioDestino AS idMatrizDestino,a.identificadorPaginaReal,b.idHonorarios AS idHonorariosOrigen,c.idHonorarios AS idHonorariosDestino,a.idModificacionDerfinitiva,a.calificacion AS modificacionEstado,a.observaciones FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_honorarios2022 AS b ON a.idFinancierioOrigen=b.idHonorarios INNER JOIN poa_honorarios2022 AS c ON c.idHonorarios=a.eventosDestino WHERE a.idModificacionDerfinitiva='$idTramite' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.estado IS NULL AND a.identificadorPaginaReal='honorarios';");
	
				$informacionObtenida__honorarios__items=$objeto->getObtenerInformacionGeneral("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.cedula, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='71') AS idFinancierioOrigen,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='71') AS itemPreesupuestarioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.eventosDestino, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='71') AS idFinancierioDestino,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='71') AS itemPreesupuestarioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,b.idActividad AS idOrigenActividad,c.idActividad AS idDestinoActividad,a.idFinancierioOrigen AS idMatrizOrigen, a.idFinancierioDestino AS idMatrizDestino,a.identificadorPaginaReal,b.idHonorarios AS idHonorariosOrigen,a.idModificacionDerfinitiva,a.calificacion AS modificacionEstado,a.observaciones FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_honorarios2022 AS b ON a.idFinancierioOrigen=b.idHonorarios INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idModificacionDerfinitiva='$idTramite' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.estado IS NULL AND a.identificadorPaginaReal='honorarios__item';");

				$informacionObtenida__sueldos__salarios=$objeto->getObtenerInformacionGeneral("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='97') AS idFinancierioOrigen,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='97') AS itemPreesupuestarioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='97') AS idFinancierioDestino,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='97') AS itemPreesupuestarioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,b.idActividad AS idOrigenActividad,c.idActividad AS idDestinoActividad,a.idFinancierioOrigen AS idMatrizOrigen, a.idFinancierioDestino AS idMatrizDestino,a.identificadorPaginaReal,b.idSueldos AS idSueldosOrigen,c.idSueldos AS idSueldosDestino,a.idModificacionDerfinitiva,a.calificacion AS modificacionEstado,a.observaciones  FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idFinancierioOrigen=b.idSueldos INNER JOIN poa_sueldossalarios2022 AS c ON c.idSueldos=a.eventosDestino WHERE a.idModificacionDerfinitiva='$idTramite' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.estado IS NULL AND a.identificadorPaginaReal='sueldos';");

				$informacionObtenida__sueldos__items=$objeto->getObtenerInformacionGeneral("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.cedula, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='97') AS idFinancierioOrigen,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='97') AS itemPreesupuestarioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.eventosDestino, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='97') AS idFinancierioDestino,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='97') AS itemPreesupuestarioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,b.idActividad AS idOrigenActividad,c.idActividad AS idDestinoActividad,a.idFinancierioOrigen AS idMatrizOrigen, a.idFinancierioDestino AS idMatrizDestino,a.identificadorPaginaReal,b.idSueldos AS idSueldosOrigen,a.idModificacionDerfinitiva,a.calificacion AS modificacionEstado,a.observaciones FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idFinancierioOrigen=b.idSueldos INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idModificacionDerfinitiva='$idTramite' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.estado IS NULL AND a.identificadorPaginaReal='sueldos__item';");

				$informacionObtenida__desvinculaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem='97') AS idFinancierioOrigen,(SELECT a1.itemPreesupuestario FROM poa_item AS a1 WHERE a1.idItem='97') AS itemPreesupuestarioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a1 WHERE a1.idItem=a.eventosDestino) AS idFinancierioDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a1 WHERE a1.idItem=a.eventosDestino) AS itemPreesupuestarioDestino,a.eneroDestino,a.febreroDestino, a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,b.enero AS eneroDestino__sumando,b.febrero AS febreroDestino__sumando,b.marzo AS marzoDestino__sumando,b.abril AS abrilDestino__sumando,b.mayo AS mayoDestino__sumando,b.junio AS junioDestino__sumando,b.julio AS julioDestino__sumando,b.agosto AS agostoDestino__sumando,b.septiembre AS septiembreDestino__sumando,b.octubre AS octubreDestino__sumando,b.noviembre AS noviembreDestino__sumando,b.diciembre AS diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,b.idActividad AS idOrigenActividad,c.idActividad AS idDestinoActividad,a.idFinancierioOrigen AS idMatrizOrigen, a.idFinancierioDestino AS idMatrizDestino,a.identificadorPaginaReal,b.idSueldos AS idSueldosOrigen,a.idModificacionDerfinitiva,a.calificacion AS modificacionEstado,a.observaciones FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idFinancierioOrigen=b.idSueldos INNER JOIN poa_sueldossalarios2022 AS c ON c.idSueldos=a.eventosDestino INNER JOIN poa_item AS d ON d.idItem=a.idFinancierioDestino  WHERE a.idModificacionDerfinitiva='$idTramite' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.estado IS NULL AND a.identificadorPaginaReal='desvinculacion';");
		
			if($tipoDocumento__D=="administrativo"){

				$documentoCuerpo='


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">COORDINACIÓN GENERAL ADMINISTRATIVA FINANCIERA</th>

						</tr>

						<tr>

							<th align="center">DIRECCIÓN ADMINISTRATIVA</th>

						</tr>

						<tr>

							<th align="center">INFORME DE VIABILIDAD TÉCNICA DE LA MODIFICACIÓN A LA PLANIFICACIÓN</th>

						</tr>


						<tr>

							<th align="center">OPERATIVA ANUAL POA</th>

						</tr>

						<tr>

							<th align="center">ORGANIZACIONES DEPORTIVAS '.$aniosPeriodos__ingesos.'</th>

						</tr>

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								Fecha de elaboración: 

							</th>

							<td align="left">

								'.$dia.'-'.$monthName.'-'.$aniosPeriodos__ingesos.'

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								'.$informacionCompleto[0][nombreOrganismo].'

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El Acuerdo Ministerial 456 de 30 de diciembre de 2021 y sus modificaciones denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Artículo 35. De las modificaciones a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva. - Las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, podrán ser modificadas en los siguientes casos:

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								1. Modificación a la programación de las fechas en las cuales se planificó la ejecución de una actividad o componente;   
								
							</td>

						</tr>	


						<tr>

							<td align="justify">

								2. Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado a la citada actividad; y,   
								
							</td>

						</tr>	

						<tr>

							<td align="justify">

								3. Modificación de valores asignados entre actividades, siempre que no se sobrepase el techo presupuestario asignado a las planificaciones.   
								
							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Que una vez aprobadas las correspondientes planificaciones iniciales de las organizaciones deportivas, estas podrán modificarse a través del aplicativo informático definido para el efecto. 

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								En todos los casos, dichas modificaciones deberán ser registradas o aprobadas, según corresponda, previa la ejecución de las actividades. En los casos 1 y 2 del presente artículo, los criterios de registro o autorización de modificación por parte del Ministerio del Deporte deberán plantearse conforme los lineamientos emitidos para el efecto. Para el caso 3, las modificaciones deberán ser autorizadas por esta cartera de Estado.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Artículo 37. Del mecanismo de ingreso y recepción de las modificaciones y/o incrementos a las Planificaciones Operativas Anuales o a la Planificación Anual de inversión.- A través del aplicativo informático se procesarán los trámites de modificación y/o incremento a las Planificaciones Operativas Anuales y/o Planificaciones Anuales de Inversión Deportiva. Para tal efecto, se establecerán formularios y formatos sistematizados que permitan agilizar la carga en línea de la información.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Las solicitudes de modificación y/o incremento de las planificaciones, serán direccionadas por el aplicativo  informático a las máximas autoridades de las áreas técnicas, para que en el marco de sus competencias se proceda con el análisis correspondiente; esto es, a la Subsecretaría de Deporte del Alto Rendimiento, a  la Subsecretaría de Desarrollo de la Actividad Física, a la Coordinación de Administración e Infraestructura Deportiva, a la Coordinación General Administrativa Financiera, o a la Coordinación General de Planificación y Gestión Estratégica, según corresponda.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								A través del referido aplicativo informático, los titulares de las áreas referidas en el párrafo precedente emitirán un informe de viabilidad técnica a la modificación y/o incremento de las planificaciones presentadas por parte de las organizaciones deportivas.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Si durante la tramitación de la solicitud de modificación y/o incremento existieren observaciones o inconsistencias, o en su defecto falta de información, se consolidarán en un solo documento a través del/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte a fin de que se proceda con la correspondiente notificación a las organizaciones deportivas sobre los citados hallazgos.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Las subsanaciones deberán realizarse a través del aplicativo informático en el término de cinco (5) días contados a partir de la notificación, con el fin de que se realice el análisis de las mismas.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								En caso de que no se justifique lo observado o se mantengan las inconsistencias, el/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte, emitirá el informe correspondiente a través del cual se niegue la aprobación de la modificación y/o incremento a las planificaciones.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								DESARROLLO:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó la asignación Presupuestaria de $'.$fechaAsinacion[0][nombreInversion].'  a la '.$informacionCompleto[0][nombreOrganismo].' para la Planificación Operativa Anual POA '.$aniosPeriodos__ingesos.' con fecha '.$anio.'-'.$monthName.'-'.$dia.'. 

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								La '.$informacionCompleto[0][nombreOrganismo].', registró en el link para modificaciones movimientos correspondientes al POA '.$aniosPeriodos__ingesos.' a fin de que sean aprobadas las modificaciones.

							</td>

						</tr>	

					</table>

					<br>

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

						<thead>

							<tr>

								<th align="center">
									No
								</th>


								<th align="center">
									CONDICIÓN
								</th>


								<th align="center">
									CUMPLE 
								</th>

								<th align="center">
									OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA  
								</th>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td style="width:5%!important">
									1
								</td>


								<td>
									Registra movimientos correspondientes a la actividad 001
								</td>


								<td>
									'.$select__administrativo__0.'
								
								</td>

								<td>
									'.$text__administrativo__0.'
								</td>

							</tr>


							<tr>

								<td style="width:5%!important">
									2
								</td>


								<td>

									Registra movimientos correspondientes al Caso 1 de modificaciones y cumple los lineamientos 

								</td>
								<td>
									'.$select__administrativo__1.'
								
								</td>

								<td>
									'.$text__administrativo__1.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									3
								</td>


								<td>
									Registra movimientos correspondientes al Caso 2 de modificaciones (sin inclusión de nuevos ítems y/o tareas) y cumple los lineamientos

								</td>

								<td>
									'.$select__administrativo__2.'
								
								</td>

								<td>
									'.$text__administrativo__2.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									4
								</td>


								<td>
									Registra movimientos correspondientes al Caso 2 de modificaciones (con inclusión de nuevos ítems y/o tareas justificadamente) y cumple los lineamientos
								</td>

								<td>
									'.$select__administrativo__3.'
								
								</td>

								<td>
									'.$text__administrativo__3.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									5
								</td>


								<td>
									Justifica movimientos para trasladar recursos sobrantes de otras actividades hacia la actividad 001  (caso 3) y cumple los lineamientos
								</td>

								<td>
									'.$select__administrativo__4.'
								
								</td>

								<td>
									'.$text__administrativo__4.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									6
								</td>


								<td>
									Actualizada información de suministros de servicios básicos que cuentan con informe aprobado de la Coordinación General de Planificación y Gestión Estratégica
								</td>

								<td>
									'.$select__administrativo__5.'
								
								</td>

								<td>
									'.$text__administrativo__5.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									7
								</td>


								<td>
									No registra modificaciones para adquisición para bienes de larga duración con fines administrativos 
								</td>

								<td>
									'.$select__administrativo__6.'
								
								</td>

								<td>
									'.$text__administrativo__6.'
								</td>

							</tr>

						</tbody>

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								OBSERVACIONES ADICIONALES: 

							</th>


							<td style="width:5%!important">
								'.$observaciones__administrativo__0.'
							</td>


						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								CONCLUSIÓN:  

							</th>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Una vez que se ha revisado la información enviada por la Dirección de Planificación e Inversión del Ministerio del Deporte, se consigna el registro de información, en virtud de lo cual el presente documento podrá ser considerado como un elemento de opinión para la formación de la voluntad administrativa conforme lo determinado en el artículo 122 del Código Orgánico Administrativo.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad del Organismo Deportivo conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								La Organización Deportiva deberá cumplir con lo establecido en las Normas de Control Interno, Reglamento General Sustitutivo para la Administración, Utilización, Manejo y Control de los Bienes e Inventarios del Sector Público, Reglamento Sustitutivo para el Control de los Vehículos del Sector Público y demás normas emitidas por la Contraloría General del Estado.

							</td>

						</tr>	

					</table>

				';				

				$documentoCuerpo.='

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Elaborado por: 

							'.$funcionario[0][nombreFuncionario].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Revisado por: '.$altoRendimientoDirecciones__modficaciones.'

							'.$director[0][nombreDirector].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>


					<tr>

						<td colspan="2">

							Una vez realizada la revisión de la modificación realizada por la Organización Deportiva, por parte de la Dirección Administrativa, conforme la actividad 001 estipulada en los lineamientos del ciclo de planificación, esta Coordinación acepta los parámetros revisados por la dirección antes mencionada.

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Validado por: 

							'.$corFinan[0][nombreFinan].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					</table>

				';

			}else if($tipoDocumento__D=="alto"){

				if ($select__alto__0=="noCumple" || $select__alto__1=="noCumple" || $select__alto__2=="noCumple" || $select__alto__3=="noCumple") {
					$cumpleVariables="NO CUMPLE";
					$validasVariables="NO VALIDA";
				}else{
					$cumpleVariables="CUMPLE";
					$validasVariables="VALIDA";
				}

				$documentoCuerpo='


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO</th>

						</tr>

						<tr>

							<th align="center">'.$altoRendimientoDirecciones__modficaciones.'</th>

						</tr>

						<tr>

							<th align="center">INFORME DE VIABILIDAD TÉCNICA PARA LA MODIFICACIÓN DEL PLAN OPERATIVO</th>

						</tr>


						<tr>

							<th align="center">ANUAL '.$aniosPeriodos__ingesos.'</th>

						</tr>

						<tr>

							<th align="center">'.$informacionCompleto[0][nombreOrganismo].'</th>

						</tr>

						<tr>

							<th align="center">'.$variableRomanos.' MODIFICACIÓN</th>

						</tr>


					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								ANTECEDENTES:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

							
									Mediante resolución Nro.MD-DPI-'.$aniosPeriodos__ingesos.'-'.$resolucion__numero.', de fecha '.$dia__resolucion.' de '.$mes__resolucion.' de '.$aniosPeriodos__ingesos.', se le aprobó la Planificación Operativa Anual del Gasto Corriente correspondiente al ejercicio fiscal '.$mes__resolucion.' del/de la  '.$informacionCompleto[0][nombreOrganismo].'. 



							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Mediante Memorando Nro. MD-DDCAR-'.$aniosPeriodos__ingesos.'-'.$memorando__numero.'-MEM-EX de '.$dia__memorandum.' de '.$mes__memorandum.' del '.$aniosPeriodos__ingesos.', se designó a '.$funcionario[0][nombreFuncionario].', funcionario de la '.$altoRendimientoDirecciones__modficaciones.', como responsable de la '.$informacionCompleto[0][nombreOrganismo].' 

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Mediante memorando MD-DDCAR-'.$aniosPeriodos__ingesos.'-'.$memorando__numero__2.'-MEM, de fecha '.$dia__memorandum__2.' de '.$mes__memorandum__2.' de '.$aniosPeriodos__ingesos.', el Director de '.$altoRendimientoDirecciones__modficaciones.', informó a los funcionarios de las Direcciones de Deporte Convencional para el Alto Rendimiento y Dirección de Deporte para Personas con Discapacidad, la solicitud de validación y de registros emitidos por los Organismos Deportivos para modificación del POA.  
								
							</td>

						</tr>	

					</table>';

				if (!empty($modificacionesReferencias[0][numeroQuipux])) {
					
					$documentoCuerpo.='

						<table class="tabla__bordadaTresCD">

							<tr>

								<td align="justify">

									Mediante notificación Nro.'.$modificacionesReferencias[0][numeroQuipux].', de fecha '.$modificacionesReferencias[0][fechaQuipux].', se aprobó la Planificación Operativa Anual de Gasto Corriente correspondiente al ejercicio fiscal '.$aniosPeriodos__ingesos.' de la '.$informacionCompleto[0][nombreOrganismo].'. 
									
								</td>

							</tr>	

						</table>						

					';

				}


		$documentoCuerpo.='		

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="justify">

								BASE LEGAL:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="justify">

								<a style="text-decoration: underline!important;">CONSTITUCIÓN DE LA REPÚBLICA DEL ECUADOR</a>

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Que, el artículo 226 de la Constitución de la República del Ecuador, dispone: "Las instituciones del Estado, sus organismos, dependencias, las servidoras o servidores públicos y las personas que actúen en virtud de una potestad estatal ejercerán solamente las competencias y facultades que les sean atribuidas en la Constitución y la ley. Tendrán el deber de coordinar acciones para el cumplimiento de sus fines y hacer efectivo el goce y ejercicio de los derechos reconocidos en la Constitución."

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								<a style="text-decoration: underline!important;">REGLAMENTO SUSTITUTIVO AL REGLAMENTO GENERAL A LA LEY DEL DEPORTE, EDUCACIÓN FÍSICA Y RECREACIÓN.</a>

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Art. 64 del Reglamento Sustitutivo al Reglamento General a la Ley del Deporte, Educación Física y Recreación, establece “De la modificación del plan operativo anual: Las organizaciones deportivas podrán, en función de sus necesidades debidamente justificadas, modificar su plan operativo anual aprobado por el Ministerio Sectorial de conformidad con las disposiciones definidas por este último”.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								<a style="text-decoration: underline!important;">CÓDIGO ORGÁNICO DE PLANIFICACIÓN Y FINANZAS PÚBLICAS</a>

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Artículo 5.- Principios comunes. – (…); Sujeción a la planificación. - “La programación, formulación, aprobación, asignación, ejecución, seguimiento y evaluación del Presupuesto General del Estado, los demás presupuestos de las entidades públicas y todos los recursos públicos, se sujetarán a los lineamientos de la planificación del desarrollo de todos los niveles de gobierno, en observancia a lo dispuesto en los artículos 280 y 293 de la Constitución de la República”.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								<a style="text-decoration: underline!important;">ACUERDO MINISTERIAL NRO. 0456 DE 30 DE DICIEMBRE DEL 2021 Y SUS REFORMAS</a>

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El artículo 35 del Acuerdo Nro. 0456 y sus reformas indica: “Las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, podrán ser modificadas en los siguientes casos: 



							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								1.	Modificación a la programación de las fechas en las cuales se planificó la ejecución de una actividad o componente; 

							</td>

						</tr>	

						<tr>

							<td align="justify">

								2.	Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado a la citada actividad; y, 

							</td>

						</tr>	

						<tr>

							<td align="justify">

								3.	Modificación de valores asignados entre actividades, siempre que no se sobrepase el techo presupuestario asignado a las planificaciones. 

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Una vez aprobadas las correspondientes planificaciones iniciales de las organizaciones deportivas, éstas podrán modificarse a través del aplicativo informático definido para el efecto. En todos los casos, dichas modificaciones deberán ser registradas o aprobadas, según corresponda, previa la ejecución de las actividades (…)”. 

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								 En todos los casos, dichas modificaciones deberán ser registradas o aprobadas, según corresponda, previa la ejecución de las actividades (…)”. 

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								En los casos 1 y 2 del presente artículo, los criterios de registro o autorización de modificación por parte del Ministerio del Deporte deberán plantearse conforme los lineamientos emitidos para el efecto. Para el caso 3, las modificaciones deberán ser autorizadas por esta cartera de Estado.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Artículo 37. Del mecanismo de ingreso y recepción de las modificaciones y/o incrementos a las Planificaciones Operativas Anuales o a la Planificación Anual de Inversión. - A través del aplicativo informático se procesarán los trámites de modificación y/o incremento a las Planificaciones Operativas Anuales y/o Planificaciones Anuales de Inversión Deportiva. Para tal efecto, se establecerán formularios y formatos sistematizados que permitan agilizar la carga en línea de la información. 

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Las solicitudes de modificación y/o incremento de las planificaciones, serán direccionadas por el aplicativo informático a las máximas autoridades de las áreas técnicas, para que en el marco de sus competencias se proceda con el análisis correspondiente; esto es, a la Subsecretaría de Deporte del Alto Rendimiento, a la Subsecretaría de Desarrollo de la Actividad Física, a la Coordinación de Administración e Infraestructura Deportiva, a la Coordinación General Administrativa Financiera, o a la Coordinación General de Planificación y Gestión Estratégica, según corresponda.  

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								A través del referido aplicativo informático, los titulares de las áreas referidas en el párrafo precedente emitirán un informe de viabilidad técnica a la modificación y/o incremento de las planificaciones presentadas por parte de las organizaciones deportivas. Si durante la tramitación de la solicitud de modificación y/o incremento existieren observaciones o inconsistencias, o en su defecto falta de información, se consolidarán en un solo documento a través del/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte a fin de que se proceda con la correspondiente notificación a las organizaciones deportivas sobre los citados hallazgos. Las subsanaciones deberán realizarse a través del aplicativo informático en el término de cinco (5) días contados a partir de la notificación, con el fin de que se realice el análisis de las mismas. En caso de que no se justifique lo observado o se mantengan las inconsistencias, el/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte, emitirá el informe correspondiente a través del cual se niegue la aprobación de la modificación y/o incremento a las planificaciones.”

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								<a style="text-decoration: underline!important;">ACUERDO MINISTERIAL NRO. 0021 DE 31 DE ENERO DE 2023</a>

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Artículo 1.- Expídase los “Lineamientos de modificaciones e incrementos a las planificaciones anuales de las organizaciones deportivas 2023”, constante en el “Anexo 1” del presente Acuerdo Ministerial.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								3.	JUSTIFICACIÓN:

							</th>

						</tr>	

					</table>					

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El procedimiento que regula el ciclo de la planificación de las organizaciones deportivas, norma los requisitos y demás criterios que deberán cumplirse a fin de que las organizaciones deportivas contempladas en el artículo 135 de la Ley del Deporte, Educación Física y Recreación, a fin de que puedan contar con la aprobación de su planificación anual; acceso a asignaciones presupuestarias; autorización de modificaciones y/o incrementos; así como establecer los mecanismos de seguimiento y evaluación a la ejecución de las actividades planificadas. 

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								La Planificación Operativa Anual aprobada de las Organizaciones Deportivas, podrá modificarse conforme las actividades (capacitación deportiva o de recreación, operación deportiva, eventos de preparación y competencia, e implementación deportiva), de acuerdo a los lineamientos para la presentación de la planificación operativa anual 2023 de las Organizaciones Deportivas, establecida para el efecto.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								4.	DESARROLLO:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Acciones entre las Actividad 003-004-005-007: 

							</td>

						</tr>	

					</table>

					<br>

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

						<thead>

							<tr>

								<th align="center">
									No
								</th>


								<th align="center">
									CONDICIÓN
								</th>


								<th align="center">
									CUMPLE 
								</th>

								<th align="center">
									OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA  
								</th>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td style="width:5%!important">
									1
								</td>


								<td>
									O.D realiza modificación Caso 1.
									Modificación a la programación de las fechas en las cuales se planificó la ejecución de una actividad o componente; 

								</td>


								<td>
									'.$select__alto__0.'
								
								</td>

								<td>
									'.$text__alto__0.'
								</td>

							</tr>


							<tr>

								<td style="width:5%!important">
									2
								</td>


								<td>
									O.D realiza modificación Caso 2.
									Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado de las actividades 
									-Registro y validación

								</td>
								<td>
									'.$select__alto__1.'
								
								</td>

								<td>
									'.$text__alto__1.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									3
								</td>


								<td>
									O.D realiza modificación Caso 3
									Modificación de valores asignados entre actividades,
									siempre que no se sobrepase el techo presupuestario asignado a la -Aprobación
								</td>

								<td>
									'.$select__alto__2.'
								
								</td>

								<td>
									'.$text__alto__2.'
								</td>

							</tr>

							<tr>

								<td style="width:5%!important">
									4
								</td>


								<td>
									Presenta el Informe justificativo del gasto de los ítems de actividad
								</td>

								<td>
									'.$select__alto__3.'
								
								</td>

								<td>
									'.$text__alto__3.'
								</td>

							</tr>

						</tbody>

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								JUSTIFICACIÓN TÉCNICA DE LA/LAS MODIFICACIÓN :

							</th>

						</tr>	

					</table>					


					
					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								'.$justificacionTecnicaModificacione.'

							</td>

						</tr>	

					</table>					



					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								OBSERVACIONES ADICIONALES:  

							</th>

						</tr>	

						<tr>

							<td align="justify">

								'.$observaciones__altos.'

							</td>

						</tr>	

					</table>					


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								5.	CONCLUSIÓN:  

							</th>

						</tr>	

					</table>			

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								De la verificación realizada a la documentación e información presentada por la '.$informacionCompleto[0][nombreOrganismo].', se verifica que '.$cumpleVariables.' con los requisitos establecidos en los lineamientos correspondientes y por cuanto se  '.$validasVariables.' la información presentada por el organismo."

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Por tanto, se sugiere continuar con el trámite correspondiente a la Dirección de Planificación e Inversión.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Cabe enfatizar que los montos, información, documentación y demás insumos presentados por el organismo deportivo es de su exclusiva responsabilidad, existiendo por parte del área técnica una revisión documental con base en los requisitos, parámetros y plazos establecidos en el Acuerdo Ministerial 456 y los Lineamientos de Modificación e Incrementos a la Planificación Operativa Anual 2023 de las Organizaciones Deportivas. 

							</td>

						</tr>	

					</table>

				';



				$documentoCuerpo.='

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Elaborado por: Analista de la Dirección de '.$altoRendimientoDirecciones__modficaciones.'

							'.$funcionario[0][nombreFuncionario].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Revisado por: '.$altoRendimientoDirecciones__modficaciones.'

							'.$director[0][nombreDirector].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Validado por: 

							'.$subsesAlto__rendimiento__modificaciones[0][nombreSubsesA].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					</table>

				';

			}else if($tipoDocumento__D=="recreativo"){

				$documentoCuerpo='


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">SUBSECRETARIA DE DESARROLLO DE LA</th>

						</tr>

						<tr>

							<th align="center">ACTIVIDAD FÍSICA DIRECCIÓN DE RECREACIÓN</th>

						</tr>

					</table>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								DATOS INFORMATIVOS:

							</th>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								Nombre de la Organización Deportiva:  '.$informacionCompleto[0][nombreOrganismo].'

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								Modificación:  '.$variableRomanos ."-".$monthNameModificaciones2.'

							</th>

						</tr>	

					</table>


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								ANTECEDENTES:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

									Mediante Resolución Nro. '.$informacionQuipux[0][numeroOficioNoti].' de '.$arrayFechas[2].' de '.$monthNameModificaciones.' de '.$arrayFechas[0].', el Ministerio del Deporte emitió comunicó a '.$informacionCompleto[0][nombreOrganismo].', que la Planificación Operativa Anual '.$aniosPeriodos__ingesos.' del gasto corriente ha sido aprobado una vez que cumplió con los lineamientos definidos para la presentación de la Planificación Operativa Anual '.$aniosPeriodos__ingesos.' de las Organizaciones Deportivas. 


							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								BASE LEGAL:

							</th>

						</tr>	

						<tr>

							<th align="left">

								Ley del Deporte, Educación Física y Recreación:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Art. 13.- Del Ministerio. - El Ministerio Sectorial es el órgano rector y planificador del deporte, educación física y recreación; le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, las leyes, instrumentos internacionales y reglamentos aplicables.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Tendrá dos objetivos principales, la activación de la población para asegurar la salud de las y los ciudadanos y facilitar la consecución de logros deportivos a nivel nacional e internacional de las y los deportistas incluyendo, aquellos que tengan algún tipo de discapacidad.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Art. 14.- Funciones y atribuciones. - Las funciones y atribuciones del Ministerio son:

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								p) Dictar los reglamentos o instructivos técnicos y administrativos necesarios para el normal funcionamiento del deporte formativo, la educación física y recreación;

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Acuerdo Ministerial Nro.0456 de 30 de diciembre de 2021

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El Ministerio del Deporte expide el Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas.

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Acuerdo Ministerial Nro. 0157 de 29 de abril de 2022

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Esta Cartera de Estado emite la reforma el Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Acuerdo Ministerial 158 de 29 de abril de 2022

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El Ministerio del Deporte expide los “Lineamientos de modificaciones e incrementos a las planificaciones anuales de organizaciones deportivas '.$aniosPeriodos__ingesos.'.

							</td>

						</tr>	

					</table>

					<table style="margin-top:.5em; border-collapse: collapse; border:1px solid black; width:100%;" border="1">


						<thead>

							<tr>
											
								<th class="bg-warning" colspan="5" align="center"><center>ORÍGEN</center></th>
								<th colspan="5" align="center"><center>DESTINO</center></th>
								<th class="bg-warning" rowspan="2" align="center">Estado</th>
								<th class="bg-warning" rowspan="2" align="center">Observación</th>

							</tr>

							<tr>
											
								<th class="bg-warning" align="center">Act</th>
								<th class="bg-warning" align="center">Evento</th>
								<th class="bg-warning" align="center">Ítem</th>
								<th class="bg-warning" align="center">Mes</th>
								<th class="bg-warning" align="center">Monto</th>
								<th align="center">Act</th>
								<th align="center">Evento</th>
								<th align="center">Ítem</th>
								<th align="center">Mes</th>
								<th align="center">Monto</th>

							</tr>

						</thead>

						<tbody>

					';

					$contadorY=0;

					foreach ($actividadOrigen as $clave => $valor) {

						$contadorY++;
						
						$documentoCuerpo.='

							<tr>

								<td>'.$valor.'</td>
								<td>'.$eventoOrigen[$clave].'</td>
								<td>'.$itemOrigen[$clave].'</td>

								<td>

						';

							$array = explode(",", $mesOrigen[$clave]);

							foreach ($array as $value) {
								
								$documentoCuerpo.=$value."<br>";

							}

						$documentoCuerpo.='

								</td>

								<td>'.$totalOrigen[$clave].'</td>
								<td>'.$actividadDestino[$clave].'</td>
								<td>'.$eventoDestino[$clave].'</td>
								<td>'.$itemDestino[$clave].'</td>
								<td>

								';


							$array2 = explode(",", $mesDestino[$clave]);

							foreach ($array2 as $value2) {
								
								$documentoCuerpo.=$value2."<br>";

							}


						$documentoCuerpo.='	

							</td>

							<td>'.$totalDestino[$clave].'</td>
							<td>'.$aprobar__linea__5[$clave].'</td>
							<td>'.$observaciones__modificaciones__asignadas__5[$clave].'</td>

						</tr>


						';


					}


				$documentoCuerpo.='

					</tbody>

					</table>

					<br>
					<br>

					<table class="tabla__bordadaTresCD">


						<tr>

							<td align="justify">

								Conclusiones
							</td>

						</tr>	


						<tr>

							<td align="justify">

								'.$conclusiones__desarrollo.'
							</td>

						</tr>	

					</table>

				';

				$documentoCuerpo.='

								<br>

					<table class="tabla__bordadaTresCD">


						<tr>

							<td align="justify">

								Recomendaciones
							</td>

						</tr>	


						<tr>

							<td align="justify">

								'.$recomendaciones__desarrollo.'
							</td>

						</tr>	

					</table>

					<br>
					<br>

				';


				$documentoCuerpo.='

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Elaborado por: '.$funcionario[0][nombreFuncionario].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Revisado por: '.$director[0][nombreDirector].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Validado por: '.$subsesAcFi[0][nombreSubsesA].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>


					</table>

				';

			}else if($tipoDocumento__D=="formativo"){


				$documentoCuerpo='

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FÍSICA</th>

						</tr>

						<tr>

							<th align="center">DIRECCIÓN DE DEPORTE FORMATIVO Y EDUCACIÓN FÍSICA</th>

						</tr>

					</table>


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">INFORME TÉCNICO DE MODIFICACIÓN AL PLAN OPERATIVO ANUAL '.$aniosPeriodos__ingesos.'</th>

						</tr>

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								DATOS INFORMATIVOS:

							</th>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								Nombre de la Organización Deportiva:  '.$informacionCompleto[0][nombreOrganismo].'

							</th>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								Modificación:  '.$variableRomanos ."-".$monthNameModificaciones2.'

							</th>

						</tr>	

					</table>


					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								ANTECEDENTES:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

									Mediante Resolución Nro. '.$informacionQuipux[0][numeroOficioNoti].' de '.$arrayFechas[2].' de '.$monthNameModificaciones.' de '.$arrayFechas[0].', el Ministerio del Deporte emitió comunicó a '.$informacionCompleto[0][nombreOrganismo].', que la Planificación Operativa Anual '.$aniosPeriodos__ingesos.' del gasto corriente ha sido aprobado una vez que cumplió con los lineamientos definidos para la presentación de la Planificación Operativa Anual '.$aniosPeriodos__ingesos.' de las Organizaciones Deportivas. 


							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="left">

								BASE LEGAL:

							</th>

						</tr>	

						<tr>

							<th align="justify">

								Ley del Deporte, Educación Física y Recreación:

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Art. 13.- Del Ministerio. - El Ministerio Sectorial es el órgano rector y planificador del deporte, educación física y recreación; le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, las leyes, instrumentos internacionales y reglamentos aplicables.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Tendrá dos objetivos principales, la activación de la población para asegurar la salud de las y los ciudadanos y facilitar la consecución de logros deportivos a nivel nacional e internacional de las y los deportistas incluyendo, aquellos que tengan algún tipo de discapacidad.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Art. 14.- Funciones y atribuciones. - Las funciones y atribuciones del Ministerio son:

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								p) Dictar los reglamentos o instructivos técnicos y administrativos necesarios para el normal funcionamiento del deporte formativo, la educación física y recreación;

							</td>

						</tr>	

					</table>


					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="justify">

								Acuerdo Ministerial Nro.0456 de 30 de diciembre de 2021

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								El Ministerio del Deporte expide el Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas.
							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="justify">

								Acuerdo Ministerial Nro. 0157 de 29 de abril de 2022

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Esta Cartera de Estado emite la reforma el Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="justify">

								Circular Nro. MD-DPI-'.$aniosPeriodos__ingesos.'-0003-CIRC

							</th>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<td align="justify">

								Socialización de instructivo para presentación de modificaciones POA - PAID '.$aniosPeriodos__ingesos.' – Organizaciones Deportivas.

							</td>

						</tr>	

					</table>

					<br>

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="justify">

								DESARROLLO Y ANÁLISIS:

							</th>

						</tr>	

					</table>

					<table style="margin-top:.5em; border-collapse: collapse; border:1px solid black; width:100%;" border="1">


						<thead>

							<tr>
											
								<th class="bg-warning" colspan="5" align="center"><center>ORÍGEN</center></th>
								<th colspan="5" align="center"><center>DESTINO</center></th>
								<th class="bg-warning" rowspan="2" align="center">Estado</th>
								<th class="bg-warning" rowspan="2" align="center">Observación</th>

							</tr>

							<tr>
											
								<th class="bg-warning" align="center">Act</th>
								<th class="bg-warning" align="center">Evento</th>
								<th class="bg-warning" align="center">Ítem</th>
								<th class="bg-warning" align="center">Mes</th>
								<th class="bg-warning" align="center">Monto</th>
								<th align="center">Act</th>
								<th align="center">Evento</th>
								<th align="center">Ítem</th>
								<th align="center">Mes</th>
								<th align="center">Monto</th>

							</tr>

						</thead>

						<tbody>

					';

					$contadorY=0;

					foreach ($actividadOrigen as $clave => $valor) {

						$contadorY++;
						
						$documentoCuerpo.='

							<tr>

								<td>'.$valor.'</td>
								<td>'.$eventoOrigen[$clave].'</td>
								<td>'.$itemOrigen[$clave].'</td>

								<td>

						';

							$array = explode(",", $mesOrigen[$clave]);

							foreach ($array as $value) {
								
								$documentoCuerpo.=$value."<br>";

							}

						$documentoCuerpo.='

								</td>

								<td>'.$totalOrigen[$clave].'</td>
								<td>'.$actividadDestino[$clave].'</td>
								<td>'.$eventoDestino[$clave].'</td>
								<td>'.$itemDestino[$clave].'</td>
								<td>

								';


							$array2 = explode(",", $mesDestino[$clave]);

							foreach ($array2 as $value2) {
								
								$documentoCuerpo.=$value2."<br>";

							}


						$documentoCuerpo.='	

							</td>

							<td>'.$totalDestino[$clave].'</td>
							<td>'.$aprobar__linea__5[$clave].'</td>
							<td>'.$observaciones__modificaciones__asignadas__5[$clave].'</td>

						</tr>


						';


					}


				$documentoCuerpo.='

					</tbody>

					</table>

				<br>
				<br>

					<table class="tabla__bordadaTresCD">


						<tr>

							<td align="justify">

								Conclusiones
							</td>

						</tr>	


						<tr>

							<td align="justify">

								'.$conclusiones__desarrollo.'
							</td>

						</tr>	

					</table>

				';

				$documentoCuerpo.='

								<br>

					<table class="tabla__bordadaTresCD">


						<tr>

							<td align="justify">

								Recomendaciones
							</td>

						</tr>	


						<tr>

							<td align="justify">

								'.$recomendaciones__desarrollo.'
							</td>

						</tr>	

					</table>

					<br>
					<br>

				';

				$documentoCuerpo.='

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Elaborado por: '.$funcionario[0][nombreFuncionario].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>


					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Revisado por: '.$director[0][nombreDirector].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Validado por: '.$subsesAcFi[0][nombreSubsesA].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>



					</table>

				';


			}else if ($tipoDocumento__D=="planificacion") {
		
				$documentoCuerpo='

				<table class="tabla__bordadaTresCD">

					<tr>

						<th align="center">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA</th>

					</tr>

					<tr>

						<th align="center">DIRECCIÓN DE PLANIFICACIÓN E INVERSIÓN </th>

					</tr>

				</table>


				<table class="tabla__bordadaTresCD">

					<tr>

						<th align="center">INFORME DE VIABILIDAD TÉCNICA DE LA MODIFICACIÓN A LA PLANIFICACIÓN OPERATIVA ANUAL</th>

					</tr>

					<tr>

						<th align="center">POA ORGANIZACIONES DEPORTIVAS  '.$aniosPeriodos__ingesos.'</th>

					</tr>

				</table>

				<br>

				<table class="tabla__bordadaTresCD">

					<tr>


						<td align="left">

							<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$informacionCompleto[0][idInversion].'

						</td>

						<td align="right">

							<span class="enfacis__letras">Fecha de elaboración:</span>'.$dia.' de '. ucwords($monthName).' del '.$anio.' 

						</td>


					</tr>	

				</table>

				<br>

				<br>

				<table class="tabla__bordadaTresCD">

					<tr>


						<th align="left">

							ANTECEDENTE

						</th>

					<tr>	

				</table>				

				<br>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							El Acuerdo Ministerial Nro.0456 de 30 de diciembre de 2021 y sus reformas, emite el “PROCEDIMIENTO QUE REGULA EL CICLO DE PLAIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS”  

						</td>

					</tr>	

				</table>

				<br>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							Artículo 35. De las modificaciones a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva. - Las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, podrán ser modificadas en los siguientes casos:   

						</td>

					</tr>	

				</table>

				<br>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							1. Modificación a la programación de las fechas en las cuales se planificó la ejecución de una actividad o componente;   

						</td>

					</tr>	

					<tr>

						<td style="text-align:justify;">

							2. Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado a la citada actividad; y,    

						</td>

					</tr>	



					<tr>

						<td style="text-align:justify;">

							3. Modificación de valores asignados entre actividades, siempre que no se sobrepase el techo presupuestario asignado a las planificaciones.   

						</td>

					</tr>	
					

				</table>

				<br>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							Una vez aprobadas las correspondientes planificaciones iniciales de las organizaciones deportivas, estas podrán modificarse a través del aplicativo informático definido para el efecto. En todos los casos, dichas modificaciones deberán ser registradas o aprobadas, según corresponda, previa la ejecución de las actividades. En los casos 1 y 2 del presente artículo, los criterios de registro o autorización de modificación por parte del Ministerio del Deporte deberán plantearse conforme los lineamientos emitidos para el efecto. Para el caso 3, las modificaciones deberán ser autorizadas por esta cartera de Estado. 

						</td>

					</tr>	

				</table>

				<br>

				<table class="tabla__bordadaTresCD">

					<tr>


						<th align="left">

							DESARROLLO: 

						</th>

					<tr>	

				</table>	

				<br>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							La (Organización Deportiva), realiza la solicitud de modificación al POA '.$aniosPeriodos__ingesos.', con fecha '.$fecha__modificaciones[0][fecha].'. 

						</td>

					</tr>	

				</table>				

				<br>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							Una vez efectuado el análisis técnico correspondiente, la Dirección de Planificación e Inversión,con base en lo establecido en el artículo 64 del Reglamento Sustitutivo al Reglamento General ala Ley del Deporte, Educación Física y Recreación, determinó:  

						</td>

					</tr>	

				</table>

				</br>

				<table style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<thead>

						<tr>

							<th align="center">Actividad</th>
							<th align="center">Monto modificado</th>
							<th align="center">Estado modificado</th>
							<th align="center">Comentario</th>

						</tr>

					</thead>

					<tbody>

				';

				$actividadSuma__m1=$actividadSuma__m1[0][totalInicial];
				$actividadSuma__m2=$actividadSuma__m2[0][totalInicial];
				$actividadSuma__m3=$actividadSuma__m3[0][totalInicial];
				$actividadSuma__m4=$actividadSuma__m4[0][totalInicial];
				$actividadSuma__m5=$actividadSuma__m5[0][totalInicial];
				$actividadSuma__m6=$actividadSuma__m6[0][totalInicial];
				$actividadSuma__m7=$actividadSuma__m7[0][totalInicial];


				foreach ($totalActividades as $key => $value) {

					if ($value["idActividades"]==1 && !empty($actividadSuma__m1)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m1.'</td>
							<td align="center">'.$select__1.'</td>
							<td align="center">'.$texttarea__1.'</td>
						</tr>';

					}

					if ($value["idActividades"]==2 && !empty($actividadSuma__m2)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m2.'</td>
							<td align="center">'.$select__2.'</td>
							<td align="center">'.$texttarea__2.'</td>
						</tr>';

					}

					if ($value["idActividades"]==3 && !empty($actividadSuma__m3)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m3.'</td>
							<td align="center">'.$select__3.'</td>
							<td align="center">'.$texttarea__3.'</td>
						</tr>';

					}

					if ($value["idActividades"]==4 && !empty($actividadSuma__m4)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m4.'</td>
							<td align="center">'.$select__4.'</td>
							<td align="center">'.$texttarea__4.'</td>
						</tr>';

					}

					if ($value["idActividades"]==5 && !empty($actividadSuma__m5)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m5.'</td>
							<td align="center">'.$select__5.'</td>
							<td align="center">'.$texttarea__5.'</td>
						</tr>';

					}

					if ($value["idActividades"]==6 && !empty($actividadSuma__m6)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m6.'</td>
							<td align="center">'.$select__6.'</td>
							<td align="center">'.$texttarea__6.'</td>
						</tr>';

					}

					if ($value["idActividades"]==7 && !empty($actividadSuma__m7)) {

						$documentoCuerpo.='
						<tr>
							<td align="center">'.$value["idActividades"].' '.$value["nombreActividades"].'</td>
							<td align="center">'.$actividadSuma__m7.'</td>
							<td align="center">'.$select__7.'</td>
							<td align="center">'.$texttarea__7.'</td>
						</tr>';

					}					

	
				}

			$documentoCuerpo.='

					</tbody>

				</table>

				<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Elaborado por: 

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Revisado por: '.$director[0][nombreDirector].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Validado por: '.$cor__planificacion[0][nombreInsta].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

				</table>


				';

			}else if ($tipoDocumento__D=="infraestructura"){

				$documentoCuerpo='

				<table class="tabla__bordadaTresCD">

					<tr>
						<th align="center">INFORME DE VIABILIDAD TÉCNICA</th>
					</tr>

					<tr>
						<th align="center">MODIFICACIÓN A LA ACTIVIDAD 002 DEL PLAN OPERATIVO ANUAL  '.$aniosPeriodos__ingesos.' </th>
					</tr>

					<tr>
						<th align="center">'.$fisicamenteEstructura[0][departamento].'</th>
					</tr>

					<tr>
						<th align="center">'.$informacionCompleto[0][nombreOrganismo].'</th>
					</tr>

					<tr>
						<th align="center">'.$variableRomanos.' MODIFICACIÓN</th>
					</tr>

				</table>

				<table class="tabla__bordadaTresCD">

					<tr>


						<th align="left">

							I. ANTECEDENTES:

						</th>

					<tr>	

				</table>				
	

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							'.$nombreAntecedentes__te.'

						</td>

					</tr>	

				</table>

				<table class="tabla__bordadaTresCD">

					<tr>


						<th align="left">

							II. BASE LEGAL: 

						</th>

					<tr>	

				</table>		


				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							Que, el artículo 226 de la Constitución de la República del Ecuador, dispone: "Las instituciones del Estado, sus organismos, dependencias, las servidoras o servidores públicos y las personas que actúen en virtud de una potestad estatal ejercerán solamente las competencias y facultades que les sean atribuidas en la Constitución y la ley. Tendrán el deber de coordinar acciones para el cumplimiento de sus fines y hacer efectivo el goce y ejercicio de los derechos reconocidos en la Constitución." 

						</td>

					</tr>	

					<tr>

						<td style="text-align:justify;">

							Según el art. 64 del Reglamento Sustitutivo al Reglamento General a la Ley del Deporte, Educación Física y Recreación, establece “De la modificación del plan operativo anual: Las organizaciones deportivas podrán, en función de sus necesidades debidamente justificadas, modificar su plan operativo anual aprobado por el Ministerio Sectorial de conformidad con las disposiciones definidas por este último”. 

						</td>

					</tr>					

					<tr>

						<td style="text-align:justify;">

							Según el Art. 118 del Código Orgánico de Planificación y Finanzas Públicas, párrafo quinto, establece que: “Únicamente en caso de modificaciones presupuestarias en el Presupuesto General del Estado que impliquen incrementos en los presupuestos de inversión totales de una entidad ejecutora o la inclusión de nuevos programas y/o proyectos de inversión, se requerirá dictamen favorable de la Secretaría Nacional de Planificación y Desarrollo. En los demás casos, las modificaciones serán realizadas directamente por cada entidad ejecutora”. 

						</td>

					</tr>		


					<tr>

						<td style="text-align:justify;">

							El artículo 37 del Acuerdo Nro. 0456, que expide el procedimiento que regula el ciclo de la planificación delas organizaciones, menciona: “Las solicitudes de modificación y/o incremento de las planificaciones, serán direccionadas por el aplicativo informático a las máximas autoridades de las áreas técnicas, para que en el marco de sus competencias se proceda con el análisis correspondiente; esto es, a la Subsecretaría de Deporte del Alto Rendimiento, a la Subsecretaría de Desarrollo de la Actividad Física, a la Coordinación de Administración e Infraestructura Deportiva, a la Coordinación General Administrativa Financiera, o a la Coordinación General de Planificación y Gestión Estratégica, según corresponda”. 

						</td>

					</tr>	

					<tr>

						<td style="text-align:justify;">

							“A través del referido aplicativo informático, los titulares de las áreas referidas en el párrafo precedente, emitirán un informe de viabilidad técnica a la modificación y/o incremento de las planificaciones presentadas por parte de las organizaciones deportivas”. 

						</td>

					</tr>	

					<tr>

						<td style="text-align:justify;">

							El Artículo 1 del Acuerdo Nro. 0223 de 04 de agosto de 2022 que reforma el artículo 35 del Acuerdo Nro. 0456 indica: “Las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, podrán ser modificadas en los siguientes casos:  

						</td>

					</tr>	


					<tr>

						<td style="text-align:justify;">

							1. Modificación a la programación de las fechas en las cuales se planificó la ejecución de una actividad o componente;    

						</td>

					</tr>	

					<tr>

						<td style="text-align:justify;">

							2. Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado a la citada actividad; y,     

						</td>

					</tr>	


					<tr>

						<td style="text-align:justify;">

							3. Modificación de valores asignados entre actividades, siempre que no se sobrepase el techo presupuestario asignado a las planificaciones.   

						</td>

					</tr>	


					<tr>

						<td style="text-align:justify;">

							Una vez aprobadas las correspondientes planificaciones iniciales de las organizaciones deportivas, éstas podrán modificarse a través del aplicativo informático definido para el efecto. En todos los casos, dichas modificaciones deberán ser registradas o aprobadas, según corresponda, previa la ejecución de las actividades (…)”.    

						</td>

					</tr>	


					<tr>

						<td style="text-align:justify;">

							En los casos 1 y 2 del presente artículo, los criterios de registro o autorización de modificación por parte del Ministerio del Deporte deberán plantearse conforme los lineamientos emitidos para el efecto. Para el caso 3, las modificaciones deberán ser autorizadas por esta cartera de Estado.” 

						</td>

					</tr>	

					<tr>

						<td style="text-align:justify;">

							El Acuerdo Ministerial Nro. 0021 de 31 de enero de 2023, se expiden los “Lineamientos de modificaciones e incrementos a las planificaciones anuales de las organizaciones deportivas 2023”.  

						</td>

					</tr>	



				</table>

				<table class="tabla__bordadaTresCD">

					<tr>


						<th align="left">

							III. JUSTIFICACIÓN: 

						</th>

					<tr>	

				</table>		

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							En atención a los requerimientos que demanda el deporte y para el cumplimiento de objetivos institucionales, el Organismo Deportivo, solicita la aprobación de la ('.$variableRomanos.') modificación al POA '.$aniosPeriodos__ingesos.', mismo que tendrá el análisis en relación a las disposiciones establecidas en los Acuerdos Ministeriales Nro. 0021 y su anexo. 

						</td>

					</tr>	

				</table>

				<table class="tabla__bordadaTresCD">

					<tr>


						<th align="left">

							IV. DESARROLLO: 

						</th>

					</tr>	

					<tr>


						<th align="left">

							Actividad 002: Rehabilitación y /o Mantenimiento: 

						</th>

					</tr>	

				</table>		


				<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<thead>

						<tr>

							<th align="center">
								No
							</th>


							<th align="center">
								CONDICIÓN
							</th>


							<th align="center">
								CUMPLE 
							</th>

							<th align="center">
								OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA  
							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td style="width:5%!important">
								1
							</td>


							<td>
								Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado de la actividad 002  -Registro y validación 
							</td>


							<td>
								'.$select__infra__0.'
							
							</td>

							<td>
								'.$text__infra__0.'
							</td>

						</tr>


						<tr>

							<td style="width:5%!important">
								2
							</td>


							<td>
								Modificación de valores asignados entre actividades, siempre que no se sobrepase el techo presupuestario asignado a la --Aprobación  
							</td>
							<td>
								'.$select__infra__1.'
							
							</td>

							<td>
								'.$text__infra__1.'
							</td>

						</tr>

						<tr>

							<td style="width:5%!important">
								3
							</td>


							<td>
								Modificaciones que incrementen el monto total aprobado de la actividad 002:  Modificación entre actividades o, - Requerimiento adicional de recursos. 
							</td>

							<td>
								'.$select__infra__2.'
							
							</td>

							<td>
								'.$text__infra__2.'
							</td>

						</tr>

						<tr>

							<td style="width:5%!important">
								4
							</td>


							<td>
								La planificación del indicador tiene coherencia con el nombre del indicador de la actividad 002 y se encuentra redactado con número entero. 
							</td>

							<td>
								'.$select__infra__3.'
							
							</td>

							<td>
								'.$text__infra__3.'
							</td>

						</tr>

						<tr>

							<td style="width:5%!important">
								5
							</td>


							<td>
								Planifican únicamente intervenciones de rehabilitación, y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva. Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.). 
							</td>


							<td>
								'.$select__infra__4.'
							
							</td>

							<td>
								'.$text__infra__4.'
							</td>

						</tr>

						<tr>

							<td style="width:5%!important">
								6
							</td>


							<td>
								Dentro de la planificación, destinan recursos para gastos de rehabilitación, y/o mantenimiento de los escenarios deportivos que son propiedad del Ministerio del Deporte, precautelando su correcto uso y funcionamiento. Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad etc.). 
							</td>


							<td>
								'.$select__infra__5.'
							
							</td>

							<td>
								'.$text__infra__5.'
							</td>

						</tr>

						<tr>

							<td style="width:5%!important">
								7.1
							</td>


							<td>

								Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivo respecto a Rehabilitación incluye: 

								-Análisis de precios unitarios 

								-Presupuesto 
								-Planos y anexos gráficos (debidamente suscritos por el profesional en la rama 

								-Cronograma valorado. 

								-Especificaciones técnicas. 

								-Registro fotográfico de la intervención a subsanar. 
								-Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico). 

												 

								Para estudios y/o fiscalización: Certificado de no contar con técnicos afines a la contratación Justificación técnica indicando perfil profesional y experiencia requerida para la contratación; alcance de los trabajos, presupuesto estimado (Estudio de mercado), plazo. 
							</td>


							<td>
								'.$select__infra__6.'
							
							</td>

							<td>
								'.$text__infra__6.'
							</td>

						</tr>

						<tr>

							<td style="width:5%!important">
								7.2
							</td>


							<td>
								Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto Mantenimiento incluye: 

								-Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 2 cotizaciones 
								-Registro fotográfico de la intervención a subsanar 
								-Documentación de la legalidad del predio;  

												 

								Todo lo anterior, según corresponda, al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema mecánico, sistema eléctrico-electrónico)
							</td>


							<td>
								'.$select__infra__7.'
							
							</td>

							<td>
								'.$text__infra__7.'
							</td>

						</tr>


					</tbody>

				</table>

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="width:10%!important;">

							OBSERVACIONES ADICIONALES: 

						</td>

						<td style="width:10%!important;">

							'.$observaciones__0.'

						</td>


					</tr>

				</table>

				<table class="tabla__bordadaTresCD" style="margin-top:2em!important;">

					<tr>


						<th align="left">

							V. CONCLUSIÓN: 

						</th>

					<tr>	

				</table>									

				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							'.$cumple__NoCumpleInfras.'

						</td>

					</tr>	

				</table>


				<table class="tabla__bordadaTresCD">

					<tr>

						<td style="text-align:justify;">

							Cabe enfatizar que los montos, información, documentación y demás insumos presentados por el organismo deportivo es de su exclusiva responsabilidad, existiendo por parte de esta área técnica una revisión documental con base en los requisitos, parámetros y plazos establecidos en el Acuerdo Ministerial 456 y los Lineamientos de Modificación e Inc2rementos a la Planificación Operativa Anual 2023 de las Organizaciones Deportivas.  

						</td>

					</tr>	

				</table>

				</br>

				<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Elaborado por: '.$funcionario[0][nombreFuncionario].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Revisado por: '.$director[0][nombreDirector].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

					<tr>

						<td style="width:60%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							Validado por: '.$corInsta[0][nombreInsta].'

						</td>

						<td style="width:40%!important; padding-top:4em;padding-bottom:4em;paddin-left:1em;">

							

						</td>

					</tr>

				</table>

				';

			}else{
				$documentoCuerpo=$tipoDocumento__D;
			}
			

		break;


		case "informe__flujos__transferencias":

		/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."flujoTransferencia/";
			$parametro2="flujoTransferencia";	
			$parametro3=$idOrganismo."__".$fecha_actual."__".$aniosPeriodos__ingesos;

			$horizontal=true;

			

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();	



			/*=====  End of Generar pdf  ======*/

			$flujo__principal=$objeto->getObtenerInformacionGeneral("SELECT idFlujo,enero__transfer,febrero__transfer,marzo__transfer,abril__transfer,mayo__transfer,junio__transfer,julio__transfer,agosto__transfer,septiembre__transfer,octubre__transfer,noviembre__transfer,diciembre__transfer, total__transferidos__tra,monto__total__transfer__montoTrans__OD,enero__transfer__od,febrero__transfer__od,marzo__transfer__od,abril__transfer__od,mayo__transfer__od,junio__transfer__od,julio__transfer__od,agosto__transfer__od,septiembre__transfer__od,octubre__transfer__od,noviembre__transfer__od,diciembre__transfer__od,enero__transfer__od__organismo__cinco,febrero__transfer__od__organismo__cinco,marzo__transfer__od__organismo__cinco,abril__transfer__od__organismo__cinco,mayo__transfer__od__organismo__cinco,junio__transfer__od__organismo__cinco,julio__transfer__od__organismo__cinco,agosto__transfer__od__organismo__cinco,septiembre__transfer__od__organismo__cinco,octubre__transfer__od__organismo__cinco,noviembre__transfer__od__organismo__cinco,diciembre__transfer__od__organismo__cinco,cinco__total FROM poa_flujo_transferencia WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");

			$flujo__principal__remanentes=$objeto->getObtenerInformacionGeneral("SELECT total__totales__t__remanentes,anios__transferencias__remanentes,enero__remanentes,febrero__remanentes,marzo__remanentes,abril__remanentes,mayo__remanentes,junio__remanentes,julio__remanentes,agosto__remanentes,septiembre__remanentes,octubre__remanentes,noviembre__remanentes,diciembre__remanentes FROM poa_flujo_transferencia_remanentes WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idFlujo='".$flujo__principal[0][idFlujo]."';");


			$queryElimina2Actualizas="UPDATE poa_flujo_transferencia SET documento='$parametro3' WHERE idFlujo='".$flujo__principal[0][idFlujo]."';";
		 	$resultadoElimina2Actualizas= $conexionEstablecida->exec($queryElimina2Actualizas);

			$flujo__principal__remanentes__act=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.enero) AS enero, SUM(a.febrero) AS febrero, SUM(a.marzo) AS marzo, SUM(a.abril) AS abril, SUM(a.mayo) AS mayo, SUM(a.junio) AS junio, SUM(a.julio) AS julio, SUM(a.agosto) AS agosto, SUM(a.septiembre) AS septiembre, SUM(a.octubre) AS octubre, SUM(a.noviembre) AS noviembre, SUM(a.diciembre) AS diciembre, (SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a2.idInversion=a1.idInversion WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a2.idInversion DESC LIMIT 1) AS inversion FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");


			$actividad1__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='1' GROUP BY a.idOrganismo;");

			$nombre1__flujo=$actividad1__flujo[0][actividadesNombre];
			$rubro1__flujo=$actividad1__flujo[0][suma];

			
			$actividad2__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='2' GROUP BY a.idOrganismo;");

			$nombre2__flujo=$actividad2__flujo[0][actividadesNombre];
			$rubro2__flujo=$actividad2__flujo[0][suma];

			$actividad3__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='3' GROUP BY a.idOrganismo;");

			$nombre3__flujo=$actividad3__flujo[0][actividadesNombre];
			$rubro3__flujo=$actividad3__flujo[0][suma];



			$actividad4__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='4' GROUP BY a.idOrganismo;");

			$nombre4__flujo=$actividad4__flujo[0][actividadesNombre];
			$rubro4__flujo=$actividad4__flujo[0][suma];


			$actividad5__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='5' GROUP BY a.idOrganismo;");

			$nombre5__flujo=$actividad5__flujo[0][actividadesNombre];
			$rubro5__flujo=$actividad5__flujo[0][suma];


			$actividad6__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='6' GROUP BY a.idOrganismo;");

			$nombre6__flujo=$actividad6__flujo[0][actividadesNombre];
			$rubro6__flujo=$actividad6__flujo[0][suma];



			$actividad7__flujo=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadesNombre,ROUND(SUM(a.totalTotales),2) AS suma  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='7' GROUP BY a.idOrganismo;");

			$nombre7__flujo=$actividad7__flujo[0][actividadesNombre];
			$rubro7__flujo=$actividad7__flujo[0][suma];

			$inversion__flujos=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$inversionTotalesT=$inversion__flujos[0][nombreInversion];

			$documentoCuerpo="

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>

										<center>

											FLUJO DE TRANSFERENCIAS $aniosPeriodos__ingesos

										</center>

									</th>

								</tr>

								<tr>

									<th>

										<center>

											".$informacionCompleto[0][nombreOrganismo]."

										</center>

									</th>

								</tr>

							</table>

							<table class='table table-hover' border='1' style='margin-top:2em; width:100%;border-collapse: collapse!important;' cellpadding='5' style='font-size:10px!important;'>


								<tr>

									<th colspan='15'>

									<center>

										GASTO CORRIENTE 

									</center>

									</th>

								</tr>


								<tr>

									<th colspan='1'>

										DETALLE

									</th>


									<th colspan='1'>

										MONTO

									</th>


									<th colspan='1'>

										ENERO

									</th>


									<th colspan='1'>

										FEBRERO

									</th>


									<th colspan='1'>

										MARZO

									</th>


									<th colspan='1'>

										ABRIL

									</th>


									<th colspan='1'>

										MAYO

									</th>


									<th colspan='1'>

										JUNIO

									</th>


									<th colspan='1'>

										JULIO

									</th>


									<th colspan='1'>

										AGOSTO

									</th>


									<th colspan='1'>

										SEPTIEMBRE

									</th>


									<th colspan='1'>

										OCTUBRE

									</th>


									<th colspan='1'>

										NOVIEMBRE

									</th>


									<th colspan='1'>

										DICIEMBRE

									</th>


									<th colspan='1'>

										TOTAL

									</th>

								</tr>


								<tr>

									<th colspan='1'>

										PROGRAMACIÓN DE ASIGNACIÓN NOTIFICADA (SIN INCLUIR 5 X 1000)	

									</th>


									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][inversion]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][enero]."

									</th>
									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][febrero]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][marzo]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][abril]."

									</th>


									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][mayo]."

									</th>


									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][junio]."

									</th>


									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][julio]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][agosto]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][septiembre]."

									</th>


									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][octubre]."

									</th>


									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][noviembre]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][diciembre]."

									</th>

									<th colspan='1'>

										".$flujo__principal__remanentes__act[0][inversion]."

									</th>

								</tr>



								<tr>

									<th colspan='1'>

										FLUJO DE TRANSFERENCIA		

									</th>


									<th colspan='1'>

										".$flujo__principal[0][total__transferidos__tra]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][enero__transfer]."

									</th>
									<th colspan='1'>

										".$flujo__principal[0][febrero__transfer]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][marzo__transfer]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][abril__transfer]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][mayo__transfer]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][junio__transfer]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][julio__transfer]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][agosto__transfer]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][septiembre__transfer]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][octubre__transfer]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][noviembre__transfer]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][diciembre__transfer]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][total__transferidos__tra]."

									</th>

								</tr>";			


							foreach ($flujo__principal__remanentes as $valor) {
						
	$documentoCuerpo.=	"

								<tr>

									<th colspan='1'>

										DESCUENTO REMANENTE	 ".$valor[anios__transferencias__remanentes]."

									</th>


									<th colspan='1'>

										".$valor["total__totales__t__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["enero__remanentes"]."

									</th>
									<th colspan='1'>

										".$valor["febrero__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["marzo__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["abril__remanentes"]."

									</th>


									<th colspan='1'>

										".$valor["mayo__remanentes"]."

									</th>


									<th colspan='1'>

										".$valor["junio__remanentes"]."

									</th>


									<th colspan='1'>

										".$valor["julio__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["agosto__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["septiembre__remanentes"]."

									</th>


									<th colspan='1'>

										".$valor["octubre__remanentes"]."

									</th>


									<th colspan='1'>

										".$valor["noviembre__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["diciembre__remanentes"]."

									</th>

									<th colspan='1'>

										".$valor["total__totales__t__remanentes"]."

									</th>

								</tr>


							";


							}				

	$documentoCuerpo.=	"


								<tr>

									<th colspan='1'>

										MONTO A TRANSFERIR A ORGANISMO DEPORTIVO		

									</th>


									<th colspan='1'>

										".$flujo__principal[0][monto__total__transfer__montoTrans__OD]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][enero__transfer__od]."

									</th>
									<th colspan='1'>

										".$flujo__principal[0][febrero__transfer__od]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][marzo__transfer__od]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][abril__transfer__od]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][mayo__transfer__od]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][junio__transfer__od]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][julio__transfer__od]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][agosto__transfer__od]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][septiembre__transfer__od]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][octubre__transfer__od]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][noviembre__transfer__od]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][diciembre__transfer__od]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][monto__total__transfer__montoTrans__OD]."

									</th>

								</tr>
								<tr>

									<th colspan='2'>

										5 X MIL PARA CONTRALORÍA GENERAL DEL ESTADO		

									</th>


									<th colspan='1'>

										".$flujo__principal[0][enero__transfer__od__organismo__cinco]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][febrero__transfer__od__organismo__cinco]."

									</th>
									<th colspan='1'>

										".$flujo__principal[0][marzo__transfer__od__organismo__cinco]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][abril__transfer__od__organismo__cinco]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][mayo__transfer__od__organismo__cinco]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][junio__transfer__od__organismo__cinco]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][julio__transfer__od__organismo__cinco]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][agosto__transfer__od__organismo__cinco]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][septiembre__transfer__od__organismo__cinco]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][octubre__transfer__od__organismo__cinco]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][noviembre__transfer__od__organismo__cinco]."

									</th>


									<th colspan='1'>

										".$flujo__principal[0][diciembre__transfer__od__organismo__cinco]."

									</th>

									<th colspan='1'>

										".$flujo__principal[0][cinco__total]."

									</th>

								</tr>";



						$documentoCuerpo.=	"</table>

							<table class='table table-hover' border='1' style='margin-top:2em; width:100%;border-collapse: collapse!important;' cellpadding='5' style='font-size:10px!important;'>


								<tr>

									<th colspan='1'>

									<center>

										ACTIVIDADES

									</center>

									</th>

									<th colspan='1'>

									<center>

										MONTO EN DÓLARES	

									</center>

									</th>

									<th colspan='1'>

									<center>

										PORCENTAJE

									</center>

									</th>

								</tr>";

								if (!empty($nombre1__flujo)) {

									$formula1=0;

									$formula1=(floatval($rubro1__flujo) * 100)/$inversionTotalesT;

									
			$documentoCuerpo.="	

								<tr>

									<th colspan='1'>

									<center>

										".$nombre1__flujo."

									</center>

									</th>

									<th colspan='1'>

									<center>

										".$rubro1__flujo."	

									</center>

									</th>

									<th colspan='1'>

									<center>

										".round($formula1,2)."

									</center>

									</th>

								</tr>
							";


								}

								if (!empty($nombre2__flujo)) {


									$formula2=0;

									$formula2=(floatval($rubro2__flujo) * 100)/$inversionTotalesT;


									
			$documentoCuerpo.="	

								<tr>

									<th>

									<center>

										".$nombre2__flujo."

									</center>

									</th>

									<th>

									<center>

										".$rubro2__flujo."	

									</center>

									</th>

									<th>

									<center>

										".round($formula2,2)."

									</center>

									</th>

								</tr>
							";


								}


								if (!empty($nombre3__flujo)) {

									
									$formula3=0;

									$formula3=(floatval($rubro3__flujo) * 100)/$inversionTotalesT;

			$documentoCuerpo.="	

								<tr>

									<th>

									<center>

										".$nombre3__flujo."

									</center>

									</th>

									<th>

									<center>

										".$rubro3__flujo."	

									</center>

									</th>

									<th>

									<center>

										".round($formula3,2)."

									</center>

									</th>

								</tr>
							";


								}


								if (!empty($nombre4__flujo)) {



									$formula4=0;

									$formula4=(floatval($rubro4__flujo) * 100)/$inversionTotalesT;


									
			$documentoCuerpo.="	

								<tr>

									<th>

									<center>

										".$nombre4__flujo."

									</center>

									</th>

									<th>

									<center>

										".$rubro4__flujo."	

									</center>

									</th>

									<th>

									<center>

										".round($formula4,2)."

									</center>

									</th>

								</tr>
							";


								}




								if (!empty($nombre5__flujo)) {

									$formula5=0;

									$formula5=(floatval($rubro5__flujo) * 100)/$inversionTotalesT;

									
			$documentoCuerpo.="	

								<tr>

									<th>

									<center>

										".$nombre5__flujo."

									</center>

									</th>

									<th>

									<center>

										".$rubro5__flujo."	

									</center>

									</th>

									<th>

									<center>

										".round($formula5,2)."

									</center>

									</th>

								</tr>
							";


								}



								if (!empty($nombre6__flujo)) {

																		$formula6=0;

									$formula6=(floatval($rubro6__flujo) * 100)/$inversionTotalesT;

									
			$documentoCuerpo.="	

								<tr>

									<th>

									<center>

										".$nombre6__flujo."

									</center>

									</th>

									<th>

									<center>

										".$rubro6__flujo."	

									</center>

									</th>

									<th>

									<center>

										".round($formula6,2)."

									</center>

									</th>

								</tr>
							";


								}




								if (!empty($nombre7__flujo)) {

																		$formula7=0;

									$formula7=(floatval($rubro7__flujo) * 100)/$inversionTotalesT;


									
			$documentoCuerpo.="	

								<tr>

									<th>

									<center>

										".$nombre7__flujo."

									</center>

									</th>

									<th>

									<center>

										".$rubro7__flujo."	

									</center>

									</th>

									<th>

									<center>

										".round($formula7,2)."

									</center>

									</th>

								</tr>
							";


								}

	$documentoCuerpo.="	

						<tr>

							<th colspan='2' align='center'>
								TOTAL
							</th>	

							<th colspan='1' align='center'>
								".$inversionTotalesT."
							</th>	

						</tr>

	</table>

							";


		break;

		case "catalogoElectronico":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/catalogoInforme/";
			$parametro2="informeCatalogo";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/	



			// contadores
			$obtenerInformacion__1=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__elect='si' GROUP BY a.idOrganismo;");

			$obtenerInformacion__2=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__subasta='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__3=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__infima='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__4=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__menorCuantia='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__5=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__cotizacion='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__6=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__licitacion='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__7=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__menorCuantiaObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__8=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__cotizacionObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__9=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__licitacionObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__10=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__precioObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__11=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__contratacionDirecta='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__12=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__contratacionListaCorta='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__13=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__contratacionConcursoPu='si' GROUP BY a.idOrganismo;");

			if (empty($obtenerInformacion__1[0][contadorCatalogo])) {
				$jason['obtenerInformacion__1']=0;
			} else {
				$jason['obtenerInformacion__1']=$obtenerInformacion__1[0][contadorCatalogo];
			}
			
			if (empty($obtenerInformacion__2[0][contadorCatalogo])) {
				$jason['obtenerInformacion__2']=0;
			} else {
				$jason['obtenerInformacion__2']=$obtenerInformacion__2[0][contadorCatalogo];
			}
			
			if (empty($obtenerInformacion__3[0][contadorCatalogo])) {
				$jason['obtenerInformacion__3']=0;
			} else {
				$jason['obtenerInformacion__3']=$obtenerInformacion__3[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__4[0][contadorCatalogo])) {
				$jason['obtenerInformacion__4']=0;
			} else {
				$jason['obtenerInformacion__4']=$obtenerInformacion__4[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__5[0][contadorCatalogo])) {
				$jason['obtenerInformacion__5']=0;
			} else {
				$jason['obtenerInformacion__5']=$obtenerInformacion__5[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__6[0][contadorCatalogo])) {
				$jason['obtenerInformacion__6']=0;
			} else {
				$jason['obtenerInformacion__6']=$obtenerInformacion__6[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__7[0][contadorCatalogo])) {
				$jason['obtenerInformacion__7']=0;
			} else {
				$jason['obtenerInformacion__7']=$obtenerInformacion__7[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__8[0][contadorCatalogo])) {
				$jason['obtenerInformacion__8']=0;
			} else {
				$jason['obtenerInformacion__8']=$obtenerInformacion__8[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__9[0][contadorCatalogo])) {
				$jason['obtenerInformacion__9']=0;
			} else {
				$jason['obtenerInformacion__9']=$obtenerInformacion__9[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__10[0][contadorCatalogo])) {
				$jason['obtenerInformacion__10']=0;
			} else {
				$jason['obtenerInformacion__10']=$obtenerInformacion__10[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__11[0][contadorCatalogo])) {
				$jason['obtenerInformacion__11']=0;
			} else {
				$jason['obtenerInformacion__11']=$obtenerInformacion__11[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__12[0][contadorCatalogo])) {
				$jason['obtenerInformacion__12']=0;
			} else {
				$jason['obtenerInformacion__12']=$obtenerInformacion__12[0][contadorCatalogo];
			}
			

			if (empty($obtenerInformacion__13[0][contadorCatalogo])) {
				$jason['obtenerInformacion__13']=0;
			} else {
				$jason['obtenerInformacion__13']=$obtenerInformacion__13[0][contadorCatalogo];
			}
			

			// sumas
			$obtenerInformacion__sumas__1=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__elect='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__2=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__subasta='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__3=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__infima='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__4=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__menorCuantia='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__5=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__cotizacion='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__6=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__licitacion='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__7=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__menorCuantiaObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__8=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__cotizacionObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__9=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__licitacionObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__10=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__precioObras='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__11=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__contratacionDirecta='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__12=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__contratacionListaCorta='si' GROUP BY a.idOrganismo;");
			$obtenerInformacion__sumas__13=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.idOrganismo='$idOrganismo'AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.catalogo__contratacionConcursoPu='si' GROUP BY a.idOrganismo;");

			if (empty($obtenerInformacion__sumas__1[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__1']=0;
			} else {
				$jason['obtenerInformacion__sumas__1']=number_format($obtenerInformacion__sumas__1[0][sumadorTotales], 2, ',', '.');
			}
			
			if (empty($obtenerInformacion__sumas__2[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__2']=0;
			} else {
				$jason['obtenerInformacion__sumas__2']=number_format($obtenerInformacion__sumas__2[0][sumadorTotales], 2, ',', '.');
			}
			
			if (empty($obtenerInformacion__sumas__3[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__3']=0;
			} else {
				$jason['obtenerInformacion__sumas__3']=number_format($obtenerInformacion__sumas__3[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__4[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__4']=0;
			} else {
				$jason['obtenerInformacion__sumas__4']=number_format($obtenerInformacion__sumas__4[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__5[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__5']=0;
			} else {
				$jason['obtenerInformacion__sumas__5']=number_format($obtenerInformacion__sumas__5[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__6[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__6']=0;
			} else {
				$jason['obtenerInformacion__sumas__6']=number_format($obtenerInformacion__sumas__6[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__7[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__7']=0;
			} else {
				$jason['obtenerInformacion__sumas__7']=number_format($obtenerInformacion__sumas__7[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__8[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__8']=0;
			} else {
				$jason['obtenerInformacion__sumas__8']=number_format($obtenerInformacion__sumas__8[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__9[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__9']=0;
			} else {
				$jason['obtenerInformacion__sumas__9']=number_format($obtenerInformacion__sumas__9[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__10[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__10']=0;
			} else {
				$jason['obtenerInformacion__sumas__10']=number_format($obtenerInformacion__sumas__10[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__11[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__11']=0;
			} else {
				$jason['obtenerInformacion__sumas__11']=number_format($obtenerInformacion__sumas__11[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__12[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__12']=0;
			} else {
				$jason['obtenerInformacion__sumas__12']=number_format($obtenerInformacion__sumas__12[0][sumadorTotales], 2, ',', '.');
			}
			

			if (empty($obtenerInformacion__sumas__13[0][sumadorTotales])) {
				$jason['obtenerInformacion__sumas__13']=0;
			} else {
				$jason['obtenerInformacion__sumas__13']=number_format($obtenerInformacion__sumas__13[0][sumadorTotales], 2, ',', '.');
			}
			
			

			$sum1C=0;
			$sum2C=0;

			$sum1C=floatval($obtenerInformacion__1[0][contadorCatalogo]) + floatval($obtenerInformacion__2[0][contadorCatalogo]) + floatval($obtenerInformacion__3[0][contadorCatalogo]) + floatval($obtenerInformacion__4[0][contadorCatalogo]) + floatval($obtenerInformacion__5[0][contadorCatalogo]) + floatval($obtenerInformacion__6[0][contadorCatalogo]) + floatval($obtenerInformacion__7[0][contadorCatalogo]) + floatval($obtenerInformacion__8[0][contadorCatalogo]) + floatval($obtenerInformacion__9[0][contadorCatalogo]) + floatval($obtenerInformacion__10[0][contadorCatalogo]) + floatval($obtenerInformacion__11[0][contadorCatalogo]) + floatval($obtenerInformacion__12[0][contadorCatalogo]) + floatval($obtenerInformacion__13[0][contadorCatalogo]);

			$sum2C=floatval($obtenerInformacion__sumas__1[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__2[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__3[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__4[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__5[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__6[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__7[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__8[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__9[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__10[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__11[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__12[0][sumadorTotales]) + floatval($obtenerInformacion__sumas__13[0][sumadorTotales]);

			$documentoCuerpo="

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>

										<center>

											INFORME DE IDENTIFICACIÓN DE PROCEDIMIENTOS DE CONTRATACIÓN PÚBLICA

										</center>

									</th>

								</tr>

							</table>



							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>

											Antecedentes: 

									</th>

								</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td style='text-align:justify!important;'>

											Art. 1.- de la Ley Orgánica del Sistema Nacional de Contratación Pública, señala: “Esta Ley establece el Sistema Nacional de Contratación Pública y determina los principios y normas para regular los procedimientos de contratación para la adquisición o arrendamiento de bienes, ejecución de obras y prestación de servicios, incluidos los de consultoría, que realicen: (…) b) que posean o administren bienes, fondos, títulos, acciones, participaciones, activos, rentas, utilidades, excedentes, subvenciones y todos los derechos que pertenecen al Estado y a sus instituciones, sea cual fuere la fuente de la que procedan (…)”

									</td>

								</tr>

							</table>

						
							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

											Mediante Acuerdo Ministerial Nro. 0456, de 30 de diciembre de 2021, el Lcdo. Juan Sebastián Palacios Muñoz, Ministro del Deporte, expide el procedimiento que regula el Ciclo de Planificación de las Organizaciones Deportivas.

									</td>

								</tr>

							</table>


				
							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

											Mediante Acuerdo Ministerial Nro. 0157, de 29 de abril de 2022, la Lcda. María Belén Aguirre Crespo, Ministra del Deporte Subrogante, expide las reformas al Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021.

									</td>

								</tr>

							</table>


							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 0223, de 04 de agosto de 2022, el Lcdo. Juan Sebastián Palacios Muñoz, Ministro del Deporte, expide las reformas al Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021.

									</td>

								</tr>

							</table>



							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 0238, de 25 de agosto de 2022, el Lcdo. Juan Sebastián Palacios Muñoz, el Ministro del Deporte, expide las reformas al Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021.

									</td>

								</tr>

							</table>



							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 296 de 28 de noviembre de 2022, el Lcdo. Juan Sebastián Palacios Muñoz, Ministro del Deporte, expide las reformas al Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021.

									</td>

								</tr>

							</table>


							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 0318, de fecha 11 de diciembre de 2022, la Lic. María Belén Aguirre Crespo, Subsecretaría de Deporte y Actividad Física Subrogante, Delegada de La Máxima Autoridad, ACUERDA: “Artículo 1.- - Expídase los “Lineamientos para la presentación de la Planificación Operativa Anual correspondiente al año 2023, de las organizaciones deportivas”, constantes en el Anexo 1 del presente Acuerdo Ministerial”.

									</td>

								</tr>

							</table>


							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 0320, de fecha 15 de diciembre de 2022, el Lcdo. Juan Sebastián Palacios Muñoz, Ministro del Deporte, ACUERDA: “Reformar el Acuerdo Ministerial Nro. 0037, de 14 de febrero de 2022, Artículo 1.- Expídase la actualización de “Los Lineamientos para el seguimiento y evaluación de las Planificaciones Anuales de las Organizaciones Deportivas 2022”, constantes en el Anexo 1 del presente Acuerdo Ministerial”

									</td>

								</tr>

							</table>


							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 0321, de fecha 15 de diciembre de 2022, el Lcdo. Juan Sebastián Palacios Muñoz, Ministro del Deporte, ACUERDA: “Reformar el Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021”

									</td>

								</tr>

							</table>



							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										Mediante Acuerdo Ministerial Nro. 0322, de fecha 15 de diciembre de 2022, la Mgs. Emma Francisca Herdoíza Arboleda, Subsecretaría de Deporte y Actividad Física Subrogante, Delegada de La Máxima Autoridad, ACUERDA: “Artículo 1.- Expídase los “Lineamientos para la Presentación de la Planificación Anual de Inversión Deportiva 2023 de las Organizaciones Deportivas” constantes en el “Anexo 1” del presente Acuerdo Ministerial.”

									</td>

								</tr>

							</table>



							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>

										IDENTIFICACIÓN

									</th>

								</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<td>

										El Organismo Deportivo ha planificado realizar procedimientos de contratación pública conforme el siguiente detalle: 

									</td>

								</tr>

							</table>

							<table class='table table-hover' border='1' style='margin-top:2em; width:100%;border-collapse: collapse!important;' cellpadding='5'>

								<tr>

									<th colspan='3'>

										MATRIZ DE PROCEDIMIENTOS DE CONTRATACIÓN DE COMPRAS PUBLICAS POA 2023 

									</th>

								</tr>


								<tr>

									<th>

										Tipo de contratación

									</th>

									<th>

										Numero de contratación

									</th>


									<th>

										Monto $

									</th>

								</tr>


								<tr>

									<th>

										Catálogo Electrónico

									</th>

									<th>

										".$obtenerInformacion__1[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__1[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Subasta Inversa Electrónica

									</th>

									<th>

										".$obtenerInformacion__2[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__2[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Ínfima Cuantía

									</th>

									<th>

										".$obtenerInformacion__3[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__3[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Menor Cuantía

									</th>

									<th>

										".$obtenerInformacion__4[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__4[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Cotización

									</th>

									<th>

										".$obtenerInformacion__5[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__5[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Licitación

									</th>

									<th>

										".$obtenerInformacion__6[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__6[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Menor Cuantía

									</th>

									<th>

										".$obtenerInformacion__7[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__7[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Cotización
									</th>

									<th>

										".$obtenerInformacion__8[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__8[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Licitación

									</th>

									<th>

										".$obtenerInformacion__9[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__9[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Precio Fijo

									</th>

									<th>

										".$obtenerInformacion__10[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__10[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Contratación Directa

									</th>

									<th>

										".$obtenerInformacion__11[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__11[0][sumadorTotales]."

									</th>

								</tr>
								<tr>

									<th>

										Lista Corta

									</th>

									<th>

										".$obtenerInformacion__12[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__12[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Concurso Público

									</th>

									<th>

										".$obtenerInformacion__13[0][contadorCatalogo]."

									</th>


									<th>

										".$obtenerInformacion__sumas__13[0][sumadorTotales]."

									</th>

								</tr>

								<tr>

									<th>

										Total

									</th>

									<th>

										".$sum1C."

									</th>


									<th>

										".$sum2C."

									</th>

								</tr>


								";


			$documentoCuerpo.="</table>


							<table style='width:100%!important; margin-top:2em; text-align:justify;'>

								<tr>

									<td>

										Esta Coordinación, a través de la Dirección Administrativa ha identificado que ".strtoupper($informacionCompleto[0][nombreOrganismo])." planifica ejecutar procedimientos de contratación pública, que conforme la certificación declarada por el Organismo Deportivo, su ejecución en cada una de las fases se enmarca en lo establecido en la Normativa Vigente.

									</td>

								</tr>

							</table>


			";

			$documentoCuerpo.='


				<table class="tablas__bordes__necesarias" style="width:100%important;">

					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Analista 

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							

						</td>


					</tr>


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Director Administrativo 

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							

						</td>


					</tr>


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Coordinador General Administrativo Financiero

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							

						</td>


					</tr>



				</table>


			';




		break;

		case  "remanentes__organismos__2":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/remanentes/organismoRemanentes/";
			$parametro2="remanentes";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$informacion__general__remanentes=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_remanentes_informacion_organismo WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idInformacionGeneral DESC LIMIT 1;");

			$informacion__general__remanentes__pagar=$objeto->getObtenerInformacionGeneral("SELECT a.* FROM poa_remanentes_cuentas_pagar AS a INNER JOIN poa_remanentes_informacion_organismo AS b ON a.idInformacionGeneral=b.idInformacionGeneral WHERE b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$informacion__general__remanentes__anteriores=$objeto->getObtenerInformacionGeneral("SELECT a.* FROM poa_remanentes_anios_anteriores AS a INNER JOIN poa_remanentes_informacion_organismo AS b ON a.idInformacionGeneral=b.idInformacionGeneral WHERE b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$informacion__general__remanentes__paid=$objeto->getObtenerInformacionGeneral("SELECT a.* FROM poa_remanentes_paid AS a INNER JOIN poa_remanentes_informacion_organismo AS b ON a.idInformacionGeneral=b.idInformacionGeneral WHERE b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$inserta=$objeto->getInsertaNormal('poa_remanentes_documentos', array("`idDocumentoRe`, ","`documento`, ","`idOrganismo`, ","`fecha`, ","`perioIngreso`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$documentoCuerpo="

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>

										<center>

											".strtoupper($informacionCompleto[0][nombreOrganismo])."

										</center>

									</th>

								</tr>

								<tr>

									<th>

										<center>

											REPORTES REMANENTES $aniosPeriodos__ingesos

										</center>

									</th>

								</tr>

								<tr>

									<th>

										<center>

											$dia de $monthName del $anio

										</center>

									</th>

								</tr>

							</table>


							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th style='width:94%!important;'>

										Transferencias al OD ( valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución )

									</th>


									<td style='width:6%!important;'>

										".$informacion__general__remanentes[0][inp1]."

									</td>

								</tr>

								<tr>

									<th style='width:94%!important;'>

										Saldo Estado de Cuenta al 31 de  Diciembre

									</th>


									<td style='width:6%!important;'>

										".$informacion__general__remanentes[0][saldo__cuenta31]."

									</td>

								</tr>

								<tr>

									<th style='width:94%!important;'>

										Monto de autogestión que se registra en el estado de cuenta, más cheques girados y no cobrados de años anteriores

									</th>


									<td style='width:6%!important;'>

										".$informacion__general__remanentes[0][monto__autogestion__cuentas]."

									</td>

								</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th align='center'>

										REMANENTE POA

									</th>

								</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th style='width:70%!important;'>

										MONTO POA (Aprobado inicial + Incrementos)

									</th>


									<td style='width:30%!important;'>

										".$informacion__general__remanentes[0][monto__incrementosOriginal]."

									</td>

								</tr>

							</table>				

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th style='width:70%!important;'>

										MONTO EJECUTADO

									</th>


									<td style='width:30%!important;'>

										".$informacion__general__remanentes[0][montoEje__remanentes]."

									</td>

								</tr>

							</table>

							<table class='table table-hover' border='1' style='margin-top:2em; width:100%;border-collapse: collapse!important;' cellpadding='5'>

				                <thead>
				                 <tr>
				                    <th class='bg-warning' align='center'>Trimestre</th>
				                    <th class='bg-warning' align='center'>Monto</th>
				                  </tr>
				                </thead>

				                <tbody>
				                    <tr>
				                        <td align='center'>Primer trimestre</td>
				                        <td align='center'>
				                           ".$informacion__general__remanentes[0][ejecutado__primer]."
				                        </td>
				                    </tr>
				                    <tr>
				                        <td align='center'>Segundo trimestre</td>
				                        <td align='center'>
				                         	".$informacion__general__remanentes[0][ejecutado__segundo]."
				                        </td>
				                    </tr>
				                    <tr>
				                        <td align='center'>Tercer trimestre</td>
				                        <td align='center'>
				                          ".$informacion__general__remanentes[0][ejecutado__tercero]."
				                        </td>
				                    </tr>
				                    <tr>
				                        <td align='center'>Cuarto trimestre</td>
				                        <td align='center'>
				                           ".$informacion__general__remanentes[0][ejecutado__cuarto]."
				                        </td>
				                    </tr>
				                </tbody>

			            	</table>

							<table style='width:100%!important; margin-top:2em;'>

									<tr>

										<th style='width:40%!important;'>

											CUENTAS POR PAGAR

										</th>


										<td style='width:60%!important;'>

											".$informacion__general__remanentes[0][cuentasPagar__remanentes]."

										</td>

									</tr>

							</table>";

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();	


			$query="SELECT e.nombreActividades,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.montosCuentasPagar FROM poa_remanentes_cuentas_pagar AS a INNER JOIN poa_remanentes_informacion_organismo AS b ON a.idInformacionGeneral=b.idInformacionGeneral INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idProgramacionFinancieraCuentasPagar INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actividades AS e ON e.idActividades=c.idActividad WHERE b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);	

			if (!empty($informacion__general__remanentes__pagar[0][idCuentasPorPagar])) {
			
				$documentoCuerpo.=	"<table class='table table-hover' border='1' style='margin-top:2em; width:100%; border-collapse: collapse!important;' cellpadding='5'>

		                <thead>
		                 <tr>
		                  	<th class='bg-warning' align='center'>Actividad</th>
	                        <th class='bg-warning' align='center'>Item</th>
	                        <th class='bg-warning' align='center'>Descripción del Ítem</th>
	                        <th class='bg-warning' align='center'>Monto</th> 
		                  </tr>
		                </thead>

		                <tbody>";
	                

				while($registro = $resultado->fetch()) {

		             	
				        $documentoCuerpo.= "
				        	<tr>

				        		<td>

				        			".$registro['nombreActividades']."

				        		</td>

				        		<td>

				        			".$registro['itemPreesupuestario']."

				        		</td>

				        		<td>

				        			".$registro['nombreItem']."

				        		</td>

			        			<td>

				        			".$registro['montosCuentasPagar']."

				        		</td>

			            	</tr>

						";

				}

			$documentoCuerpo.= "

		        </tbody>

	          </table>";

			}

 			$documentoCuerpo.="

 					<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:40%!important;'>

								REMANENTE POA $aniosPeriodos__ingesos

							</th>


							<td style='width:60%!important;'>

								".$informacion__general__remanentes[0][remanentePoa__remanentes]."

							</td>

						</tr>

				</table> ";     


		             	
			$documentoCuerpo.= "<table style='width:100%!important; margin-top:2em;' cellpadding='5'>

									<tr>

										<th style='width:60%!important;'>

											REMANENTES POA AÑOS ANTERIORES PENDIENTES DE DESCONTAR

										</th>


										<td style='width:40%!important;'>

											".$informacion__general__remanentes[0][anios__anteriores]."

										</td>

									</tr>

							</table>";  


			$query="SELECT a.idAniosAnteriores,a.aniosAniosAnteriores,montosAniosAnteriores FROM poa_remanentes_anios_anteriores AS a INNER JOIN poa_remanentes_informacion_organismo AS b ON a.idInformacionGeneral=b.idInformacionGeneral WHERE b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);	

			if (!empty($informacion__general__remanentes__anteriores[0][idAniosAnteriores])) {


				$documentoCuerpo.="

		        	<table class='table table-hover' style='width:100%!important;border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

		                <thead>
		                    <tr>
			                    <th class='bg-warning' align='center' style='width:50%!important;'>Año</th>
			                    <th class='bg-warning' align='center' style='width:50%!important;'>Monto</th>
		                	</tr>
		                </thead>

		                <tbody>";



				while($registro = $resultado->fetch()) {


				        $documentoCuerpo.= "
				        	<tr>

				        		<td align='center'>

				        			".$registro['aniosAniosAnteriores']."

				        		</td>

				        		<td align='center'>

				        			".$registro['montosAniosAnteriores']."

				        		</td>

			            	</tr>

						";


				}

		        $documentoCuerpo.="    
		        		</tbody>

		            </table>";		

				
			}


 			$documentoCuerpo.="

 			<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:60%!important;'>

								MONTO REMANENTE PAID

							</th>


							<td style='width:40%!important;'>

								".$informacion__general__remanentes[0][remanentesPaid]."

							</td>

						</tr>

				</table>"; 


			$query="SELECT a.aniosPaid,a.convenioPaid,a.nombreProyectoPaid,a.montoPaid FROM poa_remanentes_paid AS a INNER JOIN poa_remanentes_informacion_organismo AS b ON a.idInformacionGeneral=b.idInformacionGeneral WHERE b.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);	


			if (!empty($informacion__general__remanentes__paid[0][idAniosPaid])) {


	            $documentoCuerpo.="


	            <table class='table table-hover' style='width:100%!important; border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

	                <thead>     

	                    <tr>
	                        <th class='bg-warning' align='center'>Año</th>
	                        <th class='bg-warning' align='center'>Instrumento de Asignación (Convenio / Acuerdo /  Proyecto u otros)</th>
	                        <th class='bg-warning' align='center'>Nombre del Proyecto</th>
	                        <th class='bg-warning' align='center'>Valor</th>
	                    </tr>
	                </thead>
	                <tbody>";


	             while($registro = $resultado->fetch()) {

				     $documentoCuerpo.= "
				        	<tr>

				        		<td align='center'>

				        			".$registro['aniosPaid']."

				        		</td align='center'>

				        		<td align='center'>

				        			".$registro['convenioPaid']."

				        		</td>

				        		<td align='center'>

				        			".$registro['nombreProyectoPaid']."

				        		</td>

				        		<td align='center'>

				        			".$registro['montoPaid']."

				        		</td>

			            	</tr>

						";

	             }

		       $documentoCuerpo.="

				 	</tbody>

				 </table>";

			}



	       $documentoCuerpo.="     

	       	<table class='table table-hover' style='width:100%!important; border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

	                <thead>   

	                    <tr>
	                        <th class='bg-warning' align='center' colspan='2'>VERIFICACIÓN UNO</th>
	                        <th class='bg-warning' align='center' colspan='2'>VERIFICACIÓN DOS</th>
	                    </tr>

	                </thead>

	                <tbody>
	         	
	                	<tr>

	                		<td>

	                			Transferencias al OD (valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución)

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][monto__resumen]."

	                		</td>


	                		<td>

	                			Estado de Cuenta al 31 de  Diciembre

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][cuenta__31__resumen__2]."

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Monto ejecutado

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][ejecutado__resumen]."

	                		</td>

	                		<td>

	                			Cuentas por pagar

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][cuentas__por__pagar__resumen__2]."

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Cuentas por pagar

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][cuentas__pagar__resumen]."

	                		</td>


	                		<td>

	                			Autogestión

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][autogestion__resumen__2]."

	                		</td>

	                	</tr>


	                	<tr>

	                		<td>

	                			Remanente POA $aniosPeriodos__ingesos

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][remanentes__resumen]."


	                		</td>

	                		<td>

	                			PAID 

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][paid__resumen__2]."

	                		</td>


	                	</tr>

	                	<tr>

	                		<td></td>
	                		<td></td>

	                		<td>

	                			Remanante años anteriores del POA

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][remanentes__anios__anteriores__resumen__2]."

	                		</td>


	                	</tr>

	                	<tr>

	                		<td></td>
	                		<td></td>

	                		<td>

	                			Remanente POA $aniosPeriodos__ingesos 

	                		</td>
	                		<td>

	                			".$informacion__general__remanentes[0][remanentes__poa__resumen__2]."

	                		</td>

	                	</tr>

	                </tbody>

	            </table>


 				<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:60%!important;'>

								MONTO A DESCONTAR ASIGNACIONES FUTURAS

							</th>


							<td style='width:40%!important;'>

								".$informacion__general__remanentes[0][asignaciones__futuras]."

							</td>

						</tr>

				</table>  

	            <table style='width:100%!important; border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

	                <tbody>

	         		    <tr>

		                	<td>

		                		REMANENTE POA $aniosPeriodos__ingesos 

		                	</td>
		                	<td>

		                		".$informacion__general__remanentes[0][remanentes__poa__resumen__futuro]."

		                	</td>

		            	</tr>

	         		    <tr>

		                	<td>

		                		REMANENTES POA AÑOS ANTERIORES PENDIENTES DE DESCONTAR

		                	</td>
		                	<td>
		                		
		                		".$informacion__general__remanentes[0][pendientes__descontar__anios__anteriores]."

		                	</td>

		            	</tr>


	                </tbody>

	            </table>

			";


		break;



		case  "remanentes__organismos":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/remanentes/organismoRemanentes/";
			$parametro2="remanentes";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			$inserta=$objeto->getInsertaNormal('poa_remanentes_documentos', array("`idDocumentoRe`, ","`documento`, ","`idOrganismo`, ","`fecha`, ","`perioIngreso`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$documentoCuerpo="

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							<center>

								".strtoupper($informacionCompleto[0][nombreOrganismo])."

							</center>

						</th>

					</tr>

					<tr>

						<th>

							<center>

								REPORTES REMANENTES $aniosPeriodos__ingesos

							</center>

						</th>

					</tr>

					<tr>

						<th>

							<center>

								$dia de $monthName del $anio

							</center>

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='width:94%!important;'>

							Transferencias al OD ( valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución )

						</th>


						<td style='width:6%!important;'>

							$inp1

						</td>

					</tr>

					<tr>

						<th style='width:94%!important;'>

							Saldo Estado de Cuenta al 31 de  Diciembre

						</th>


						<td style='width:6%!important;'>

							$saldo__cuenta31

						</td>

					</tr>

					<tr>

						<th style='width:94%!important;'>

							Monto de autogestión que se registra en el estado de cuenta, más cheques girados y no cobrados de años anteriores

						</th>


						<td style='width:6%!important;'>

							$monto__autogestion__cuentas

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th align='center'>

							REMANENTE POA

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='width:70%!important;'>

							MONTO POA (Aprobado inicial + Incrementos)

						</th>


						<td style='width:30%!important;'>

							$monto__incrementosOriginal

						</td>

					</tr>

				</table>				

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th style='width:70%!important;'>

							MONTO EJECUTADO

						</th>


						<td style='width:30%!important;'>

							$montoEje__remanentes

						</td>

					</tr>

				</table>

				<table class='table table-hover' border='1' style='margin-top:2em; width:100%;border-collapse: collapse!important;' cellpadding='5'>

	                <thead>
	                 <tr>
	                    <th class='bg-warning' align='center'>Trimestre</th>
	                    <th class='bg-warning' align='center'>Monto</th>
	                  </tr>
	                </thead>

	                <tbody>
	                    <tr>
	                        <td align='center'>Primer trimestre</td>
	                        <td align='center'>
	                           $ ".round($ejecutado__primer,2)."
	                        </td>
	                    </tr>
	                    <tr>
	                        <td align='center'>Segundo trimestre</td>
	                        <td align='center'>
	                           $ ".round($ejecutado__segundo,2)."
	                        </td>
	                    </tr>
	                    <tr>
	                        <td align='center'>Tercer trimestre</td>
	                        <td align='center'>
	                           $ ".round($ejecutado__tercero,2)." 
	                        </td>
	                    </tr>
	                    <tr>
	                        <td align='center'>Cuarto trimestre</td>
	                        <td align='center'>
	                           $ ".round($ejecutado__cuarto,2)."
	                        </td>
	                    </tr>
	                </tbody>

            	</table>

				<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:40%!important;'>

								CUENTAS POR PAGAR

							</th>


							<td style='width:60%!important;'>

								$cuentasPagar__remanentes

							</td>

						</tr>

				</table>";

			if (floatval($cuentasPagar__remanentes)>0) {

				$documentoCuerpo.=	"<table class='table table-hover' border='1' style='margin-top:2em; width:100%; border-collapse: collapse!important;' cellpadding='5'>

		                <thead>
		                 <tr>
		                  	<th class='bg-warning' align='center'>Actividad</th>
	                        <th class='bg-warning' align='center'>Item</th>
	                        <th class='bg-warning' align='center'>Descripción del Ítem</th>
	                        <th class='bg-warning' align='center'>Monto asignado</th>
	                        <th class='bg-warning' align='center'>Monto</th>
		                  </tr>
		                </thead>

		                <tbody>
		                	";

		             foreach ($monto as $clave => $valor) {
		             	
				        $documentoCuerpo.= "
				        	<tr>

				        		<td>

				        			".$nombreAct[$clave]."

				        		</td>

				        		<td>

				        			".$itemPresupuestarios[$clave]."

				        		</td>

				        		<td>

				        			".$nombreItems[$clave]."

				        		</td>

			        			<td>

				        			".$monto__totales[$clave]."

				        		</td>

			        			<td>

				        			".$monto[$clave]."

				        		</td>

			            	</tr>

						";

		             }

		        		

		        $documentoCuerpo.= "

		        		</tbody>

	            	</table>";

			}


 			$documentoCuerpo.="

 					<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:40%!important;'>

								REMANENTE POA $aniosPeriodos__ingesos

							</th>


							<td style='width:60%!important;'>

								$remanentePoa__remanentes

							</td>

						</tr>

				</table> ";         	

		             	
			 	$documentoCuerpo.= "<table style='width:100%!important; margin-top:2em;' cellpadding='5'>

									<tr>

										<th style='width:60%!important;'>

											REMANENTES POA AÑOS ANTERIORES PENDIENTES DE DESCONTAR

										</th>


										<td style='width:40%!important;'>

											$añosAnteriores

										</td>

									</tr>

							</table>";  


				if (!empty($selecionados__anios__montos)) {


				$documentoCuerpo.="

		        	<table class='table table-hover' style='width:100%!important;border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

		                <thead>
		                    <tr>
			                    <th class='bg-warning' align='center' style='width:50%!important;'>Año</th>
			                    <th class='bg-warning' align='center' style='width:50%!important;'>Monto</th>
		                	</tr>
		                </thead>

		                <tbody>";


		             foreach ($selecionados__anios__montos as $clave => $valor) {


				        $documentoCuerpo.= "
				        	<tr>

				        		<td align='center'>

				        			".$selecionados__anios__montos[$clave]."

				        		</td>

				        		<td align='center'>

				        			".$monto__soloNumerosMontos[$clave]."

				        		</td>

			            	</tr>

						";

		             }


		        $documentoCuerpo.="    
		        		</tbody>

		            </table>";		

				}

 			$documentoCuerpo.="

 			<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:60%!important;'>

								MONTO REMANENTE PAID

							</th>


							<td style='width:40%!important;'>

								$remanentesPaid

							</td>

						</tr>

				</table>"; 

			if (!empty($selecionados__anios__montos__paid)) {

	            $documentoCuerpo.="


	            <table class='table table-hover' style='width:100%!important; border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

	                <thead>     

	                    <tr>
	                        <th class='bg-warning' align='center'>Año</th>
	                        <th class='bg-warning' align='center'>Instrumento de Asignación (Convenio / Acuerdo /  Proyecto u otros)</th>
	                        <th class='bg-warning' align='center'>Nombre del Proyecto</th>
	                        <th class='bg-warning' align='center'>Valor</th>
	                    </tr>
	                </thead>
	                <tbody>";
	         	
		             foreach ($selecionados__anios__montos__paid as $clave => $valor) {
		             	
				        $documentoCuerpo.= "
				        	<tr>

				        		<td align='center'>

				        			".$selecionados__anios__montos__paid[$clave]."

				        		</td align='center'>

				        		<td align='center'>

				        			".$convenios[$clave]."

				        		</td>

				        		<td align='center'>

				        			".$nombreProyectos[$clave]."

				        		</td>

				        		<td align='center'>

				        			".$montos__paid[$clave]."

				        		</td>

			            	</tr>

						";

		             }


	             $documentoCuerpo.="

		             </tbody>

		            </table>";
		     }

	       $documentoCuerpo.="     

	       	<table class='table table-hover' style='width:100%!important; border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

	                <thead>   

	                    <tr>
	                        <th class='bg-warning' align='center' colspan='2'>VERIFICACIÓN UNO</th>
	                        <th class='bg-warning' align='center' colspan='2'>VERIFICACIÓN DOS</th>
	                    </tr>

	                </thead>

	                <tbody>
	         	
	                	<tr>

	                		<td>

	                			Transferencias al OD (valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución)

	                		</td>
	                		<td>

	                			$monto__resumen

	                		</td>


	                		<td>

	                			Estado de Cuenta al 31 de  Diciembre

	                		</td>
	                		<td>

	                			$cuenta__31__resumen__2

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Monto ejecutado

	                		</td>
	                		<td>

	                			$ejecutado__resumen

	                		</td>

	                		<td>

	                			Cuentas por pagar

	                		</td>
	                		<td>

	                			$cuentas__por__pagar__resumen__2

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Cuentas por pagar

	                		</td>
	                		<td>

	                			$cuentas__pagar__resumen

	                		</td>


	                		<td>

	                			Autogestión

	                		</td>
	                		<td>

	                			$autogestion__resumen__2

	                		</td>

	                	</tr>


	                	<tr>

	                		<td>

	                			Remanente POA $aniosPeriodos__ingesos

	                		</td>
	                		<td>

	                			$remanentes__resumen


	                		</td>

	                		<td>

	                			PAID 

	                		</td>
	                		<td>

	                			$paid__resumen__2

	                		</td>


	                	</tr>

	                	<tr>

	                		<td></td>
	                		<td></td>

	                		<td>

	                			Remanante años anteriores del POA

	                		</td>
	                		<td>

	                			$remanentes__anios__anteriores__resumen__2

	                		</td>


	                	</tr>

	                	<tr>

	                		<td></td>
	                		<td></td>

	                		<td>

	                			Remanente POA $aniosPeriodos__ingesos 

	                		</td>
	                		<td>

	                			$remanentes__poa__resumen__2

	                		</td>

	                	</tr>

	                </tbody>

	            </table>


 				<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th style='width:60%!important;'>

								MONTO A DESCONTAR ASIGNACIONES FUTURAS

							</th>


							<td style='width:40%!important;'>

								$asignaciones__futuras

							</td>

						</tr>

				</table>  

	            <table style='width:100%!important; border-collapse: collapse!important; margin-top:2em;' border='1' cellpadding='5'>

	                <tbody>

	         		    <tr>

		                	<td>

		                		REMANENTE POA $aniosPeriodos__ingesos 

		                	</td>
		                	<td>

		                		$remanentes__poa__resumen__futuro

		                	</td>

		            	</tr>

	         		    <tr>

		                	<td>

		                		REMANENTES POA AÑOS ANTERIORES PENDIENTES DE DESCONTAR

		                	</td>
		                	<td>
		                		
		                		$pendientes__descontar__anios__anteriores

		                	</td>

		            	</tr>


	                </tbody>

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

			$consultas__paidMaixmos=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idPoaInicial) AS maximoPaids FROM poa_preliminar_envio AND perioIngreso='$aniosPeriodos__ingesos';");

			$maximos=$consultas__paidMaixmos[0][maximoPaids];

			$asignacionOranismos=$objeto->getObtenerInformacionGeneral("SELECT monto,fecha FROM poa_paid_asignacion_dos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idAsignacion DESC LIMIT 1;");

			$organismo__envioFinal=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idTramitePaid DESC LIMIT 1;");

			$eventoSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoEvento FROM poa_paid_eventos WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'' GROUP BY idOrganismo;");
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

								SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO 

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
		

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							Decreto Ejecutivo 3 (24 de mayo de 2021). El Sr. Guillermo Lasso Mendoza - Presidente 
Constitucional de la República del Ecuador, decretó: Art. 1.- La Secretaría del Deporte se 
denominará Ministerio del Deporte. Esta entidad, con excepción del cambio de denominación, 
mantendrá la misma estructura legal constante en el Decreto Ejecutivo No. 438 publicado en el 
Suplemento del Registro Oficial Nro. 278 del 6 julio de 2018 y demás normativas vigentes. 


						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

						 
							Mediante oficio SNP-SPN-2021-1056-OF de 09 de diciembre de 2021, dirigido al Ministerio del Deporte, la Subsecretaría de Planificación Nacional, emitió el dictamen de prioridad para el proyecto 'Fortalecimiento del deporte de alto rendimiento del Ecuador' periodo 2022-2025. 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

						 
							".nl2br($especificar__textos)." 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:4em;'>

					<tr>

						<th>

								DESARROLLO


						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

							El deporte de alto rendimiento ecuatoriano ha tomado protagonismo en el país y en el mundo. Los resultados alcanzados en el último ciclo olímpico, paralímpico y sordolímpico comprometen a todo el ecosistema deportivo a actuar con eficiencia y responsabilidad, de cara a los siguientes ciclos: París 2024 y Los Ángeles 2028. 

						</td>

					</tr>

				</table>



				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

							Tras una exhaustiva evaluación de los modelos de gestión implementados a nivel nacional e 
internacional, el Plan de Alto Rendimiento del Ecuador establece un nuevo esquema de gestión 
por excelencia que pone en el centro del mismo al atleta como un ser humano y no como una 
máquina de producir medallas; que instaura un modelo desconcentrado, ordenado y eficiente 
entre el ente rector, es decir, el Ministerio del Deporte, y el resto de actores del ecosistema 
deportivo del país: Comités Olímpico y Paralímpico Ecuatoriano, federaciones ecuatorianas por 
deporte, federaciones deportivas provinciales, y las respectivas filiales de las mencionadas 
organizaciones deportivas; la academia, la empresa privada, agencias de cooperación 
internacional, organizaciones no gubernamentales, entre otros. 

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

							 Por otra parte, el deporte para personas con discapacidad supone el mayor acontecimiento médico social producido en el siglo XX en materia deportiva, cuyo origen es muy reciente, su evolución va desde la transformación como tratamiento correctivo para personas con discapacidad, hasta su conversión en movimiento de índole deportivo y competitivo a nivel mundial. Las grandes competiciones permiten avances en este sentido, como lo son los Juegos Paralímpicos y Sordolímpicos. 

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


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							Esta sinergia entre instituciones se coordina con una adecuada distribución de funciones entre el nivel Central o Ministerio del Deporte, a través de sus Direcciones de Deporte Convencional para el Alto Rendimiento y de Deporte Para Personas con Discapacidad, responsables de la política institucional, rectoría, administración, planificación y ejecución del presupuesto, y las organizaciones deportivas inmersas en el proyecto como ejecutores del presupuesto en la parte logística y encargados de la planificación en la parte técnica. 

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

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

				<table style='margin-top:2em; border-collapse: collapse; border:1px solid black; width:50%;' border='1'>

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
						   			Obsservaciones para la organización deportiva
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
						   		Se han creado nuevos puestos de trabajo de técnicos en relación al PAID OD anterior.
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
						   		Registra recursos destinados para sueldos y salarios de entrenadores, equipo técnico de apoyo (monitor, instructor), y está acorde al objeto del organismo deportivo.
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
						   		Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva.
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
						   		Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonatos acorde a los lineamientos del proyecto 'Fortalecimiento del deporte de alto rendimiento del Ecuador' a nivel nacional. 
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
						   		Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonatos acorde a los lineamientos del proyecto 'Fortalecimiento del deporte de alto rendimiento del Ecuador' a nivel internacional. 
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
						   		Utiliza recursos para cubrir gastos en evento de preparación y competencias autorizados en el 'Fortalecimiento del deporte de alto rendimiento del Ecuador' como : pasajes, alimentación, hospedaje, hidratación, seguro, medicinas, atención médica, movilización interna y al exterior de la delegación, Bono deportivo, hidratación, visa,  y otros que permita la normativa vigente. 
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

						<tr>

							<td>
						   		<center>
						   			7
						   		</center>
							</td>

							<td style='text-align:justify!important;'>
						   		La planificación operativa anual del organismo deportivo se encuentra enmarcada en lo establecido en la normativa vigente.
							</td>

							<td>
						   		<center>
						   			$deportiva__enmarcada__alto
						   		</center>
							</td>


							<td>
						   		<center>
						   			$deportiva__enmarcada__alto__text
						   		</center>
							</td>

						</tr>


						<tr>

							<td>
						   		<center>
						   			8
						   		</center>
							</td>

							<td style='text-align:justify!important;'>
						   		Utiliza recursos para cubrir gastos en necesidades generales e individuales, y registra el detalle de cantidades, artículos requeridos de cada implemento y equipo deportivo. 
							</td>

							<td>
						   		<center>
						   			$cubrir__necesedidades__alto
						   		</center>
							</td>


							<td>
						   		<center>
						   			$cubrir__necesedidades__alto__text
						   		</center>
							</td>

						</tr>

						<tr>

							<td>
						   		<center>
						   			9
						   		</center>
							</td>

							<td style='text-align:justify!important;'>
						   		La Planificación Anual de Inversión Deportiva de la Organización Deportiva se encuentra enmarcada en lo establecido en la normativa legal vigente. 
							</td>

							<td>
						   		<center>
						   			$planificacion__anual__alto
						   		</center>
							</td>


							<td>
						   		<center>
						   			$planificacion__anual__alto__text
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

							CONCLUSIÓN:  

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($concluciones__recomendaciones__recomiendas)." 

						</td>

					</tr>

				</table>



				<table style='width:100%; margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>

					<tr>
						<td style='width:50%!important; padding:2em;'>
							Elaborado por: <div>".$funcionario[0][nombreFuncionario]."</div>
						</td>
						<td>
							<center>
								
							</center>
						</td>
					</tr>


					<tr>
						<td style='width:50%!important; padding:2em;'>
							Revisado por:  <div>".$director[0][nombreDirector]."</div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>



					<tr>
						<td style='width:50%!important; padding:2em;'>
							Validado por:  <div>".$subsecretarios[0][nombreSubses]."</div>
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

			$encuentroActivoSumas=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(valorTotal),2) AS montoEncuentroActivo FROM poa_paid_encuentroactivo WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

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

								INFORME DE VIABILIDAD TÉCNICA DE LA PLANIFICACIÓN ANUAL DE INVERSIÓN DEPORTIVA PAID ORGANIZACIONES DEPORTIVAS $anio

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

						Conforme consta en el documento del proyecto de inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, el objetivo del referido proyecto es “Fomentar el buen uso del tiempo libre para mejorar la calidad de vida de la población.”; además los objetivos específicos son los siguientes: 		

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em;'>

					<tr>

						<td style='text-align:justify;'>

							<li style=' list-style-type: square; margin-left:4em;'>Ejecutar encuentros deportivos a nivel nacional que propicien la iniciación deportiva del país.</li>

						</td>

					</tr>



					<tr>

						<td style='text-align:justify;'>

							<li style=' list-style-type: square; margin-left:4em;'>Impulsar las competiciones deportivas en la población estudiantil del país.</li>

						</td>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							<li style=' list-style-type: square; margin-left:4em;'>Fomentar el deporte formativo en territorio para la identificación de talentos.</li>

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<li style=' list-style-type: square; margin-left:4em;'>Promover hábitos de vida saludable a través de la actividad física y la recreación.</li>

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							Los componentes del proyecto son:		

						</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:.5em;'>

					<tr>

						<td style='text-align:justify;'>

							<div style='margin-left:3em;'>1. Ejecutar encuentros deportivos a nivel nacional que propicien la iniciación deportiva del país.</div>

						</td>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							<div style='margin-left:3em;'>2. Impulsar las competiciones deportivas en la población estudiantil del país.</div>

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<div style='margin-left:3em;'>3. Fortalecer el Deporte Formativo en territorio para la identificación de talentos.</div>

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							<div style='margin-left:3em;'>4. Promover hábitos de vida saludable a través de la actividad física y la recreación.</div>

						</td>

					</tr>


				</table>				

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

						 
							El Proyecto emblemático “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022 – 2025”, constituye la base para el cumplimiento del deporte  como política de Estado, de acuerdo al Decreto Ejecutivo Nro. No. 375 de fecha 18 de marzo de 2022, en donde realiza esta declaración para promover la salud física y mental, el desarrollo social y económico, la seguridad, la integración comunitaria, la educación, la formación de niños y jóvenes. El objetivo, componentes y actividades se alinean al trabajo con despliegue territorial pensado desde esta Cartera de Estado. 		

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							En este sentido, el componente 4 “Promover hábitos de vida saludable a través de la actividad física y la recreación. Con fecha 14 de febrero de 2007, se creó el Ministerio del Deporte, mediante Decreto Ejecutivo.		

						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							No. 6, contenido en el Registro Oficial No. 22, en el cual se establece que es obligación del Estado, proteger, estimular y promover la cultura física, el deporte y la recreación, como actividades para la formación integral de las personas, auspiciando la preparación y participación de las y los deportistas en competencias nacionales e internacionales.	

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



				<table style='width:100%!important; margin-top:1em;'>

					<tr>

						<td style='text-align:justify;'>

							1. Ejecutar encuentros deportivos a nivel nacional que propicien la formación de deportistas para la reserva deportiva del país. 

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							2. Impulsar las competiciones deportivas en la población estudiantil del país. 

						</td>

					</tr>

					<tr>

						<td style='text-align:justify;'>

							3. Fomentar el deporte formativo en territorio para la identificación de talentos

						</td>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							4. Promover hábitos de vida saludable a través de la actividad física y la recreación. Mediante Memorando Nro. MD-SSAF-2022-0004-MEM de 04 de enero de 2022, la Subsecretaria de Desarrollo de la Actividad Física, designó a Guillermo Alejandro Sáenz Mejía, Director de Deporte Formativo y Educación Física, como Líder del Proyecto 'Encuentro Activo del Deporte Para el Desarrollo 2022-2025'

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

							En la disposición Transitoria Única del Acuerdo antes citado, menciona: <span style='font-weight:bold;'>“Con la finalidad de garantizar la correcta ejecución del proyecto de Inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, el Director/a de Deporte Formativo y Educación Física, en su calidad de Líder del Proyecto continuará ejecutando todas las gestiones técnicas, operativas, administrativas, económicas del referido proyecto hasta la contratación del/la Gerente del Proyecto. Además, los procedimientos de contratación pública, así como todos los instrumentos jurídicos suscritos en el marco del Proyecto de Inversión “ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025”, iniciados hasta antes de la entrada en vigencia de este Acuerdo Ministerial, se concluirán aplicando las normas que estuvieron vigentes al momento de s emisión”</span>.

						</td>

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

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<td style='text-align:justify;'>

							<span style='font-weight:bold!important;'>Proyecto</span>: 'ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO 2022-2025'

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
						   		Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva.
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
						   		Registra sus actividades en base a los requerimientos para la ejecución de los eventos deportivos.
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
						   		Establece sus actividades en base a lo necesario para generar procesos formativos. 
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
						   		Utiliza recursos para cubrir gastos en evento de preparación y competencias autorizados en el 'ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO ' como: pasajes, alimentación, hospedaje, hidratación, seguro, medicinas, atención médica, movilización interna y al exterior de la delegación, Bono deportivo, hidratación, visa,  y otros que permita la normativa vigente.
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
						   		La planificación operativa anual del organismo deportivo se encuentra enmarcada en lo establecido en la normativa vigente.
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

						<tr>

						 	<td>
						   		<center>
						   			6
						   		</center>
						 	</td>

						 	<td style='text-align:justify!important;'>
						   						Utiliza recursos para cubrir gastos en necesidades generales e individuales, y registra el detalle de cantidades, artículos requeridos de cada implemento y equipo deportivo. 
						 	</td>

						 	<td>
						   		<center>
									$recursos__desarrollo
						   		</center>
						 	</td>


						 	<td>
						   		<center>
						   			$recursos__desarrollo__text
						   		</center>
						 	</td>

						</tr>

						<tr>

							<td>
						   		<center>
						   			7
						   		</center>
							</td>

							<td style='text-align:justify!important;'>
						   		La Planificación Anual de Inversión Deportiva de la Organización Deportiva se encuentra enmarcada en lo establecido en la normativa legal vigente.
							</td>

							<td>
						   		<center>
						   			$anual__inversion__desarrollo
						   		</center>
							</td>


							<td>
						   		<center>
						   			$anual__inversion__desarrollo__text
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

							CONCLUSIÓN:  

						</th>

					</tr>


					<tr>

						<td style='text-align:justify;'>

							".nl2br($concluciones__recomendaciones__recomiendas)."

						</td>

					</tr>

				</table>



				<table style='width:100%; margin-top:2em; border-collapse: collapse; border:1px solid black;' border='1'>

					<tr>
						<td style='width:50%!important; padding:2em;'>
							Elaborado por: <div>".$funcionario[0][nombreFuncionario]."</div>
						</td>
						<td>
							<center>
								
							</center>
						</td>
					</tr>


					<tr>
						<td style='width:50%!important; padding:2em;'>
							Revisado por:  <div>".$director[0][nombreDirector]."</div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>



					<tr>
						<td style='width:50%!important; padding:2em;'>
							Validado por:  <div>".$subsecretarios[0][nombreSubses]."</div>
						</td>
						<td>
							<center>
									
							</center>
						</td>
					</tr>						

				</table>					

			";


		break;

		case  "asignacion__paid__presupuestarias":

			$contador__paid__asignaciones=$objeto->getObtenerInformacionGeneral("SELECT if(count(idPaidInversion) IS NOT NULL,count(idPaidInversion)+1,1) AS contadorDefinitivo FROM poa_paid_asignacion WHERE valor__comparativo='$valorComparativo' AND perioIngreso='$aniosPeriodos__ingesos';");

			$directorPlanificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreUsuario,c.descripcionFisicamenteEstructura,d.nombre FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");		
			
			

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."paid/asignacion/";
			$parametro2="paidAsignacionPresupuestaria";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			$formatter = new NumeroALetras();

			if ($valorComparativo==0){
				$subse__adquiridas="Subsecretaría de Deporte para el Alto Rendimiento";
			}else if($valorComparativo==1) {
				$subse__adquiridas="Subsecretaría de Desarrollo de la Actividad Física";
			}else{
				$subse__adquiridas="Coordinación de Administración e Infraestructura Deportiva";
			}
			
			//$formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
			$n = $techo__presupuestario;
			$izquierda = intval(floor($n));

			$derecha = intval(($n - floor($n)) * 100);

			$pos = strpos($techo__presupuestario,".01");


			if($derecha<1 && $pos === false){

				$asignadorReal=strtolower($formatter->toWords($techo__presupuestario));

				//$asignadorReal=$formatterES->format($izquierda) . " dólares con " . $formatterES->format($derecha);

			}else{

				//$asignadorReal=$formatterES->format($izquierda) . " dólares con " . $formatterES->format($derecha);

				$asignadorReal=strtolower($formatter->toWords($techo__presupuestario));

			}


			$inserta=$objeto->getInsertaNormal('poa_paid_documento_asignacion', array("`idDocumentosAsignacion`, ","`nombreDocumento`, ","`idOrganismo`, ","`fecha`, ","`perioIngreso`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			if($valorComparativo==2) {

				$documentoCuerpo="
					<br>
					<br>
					<br>
					<table>

						<thead>

							<tr>

								<th>Código:</th>
								<td>"."PAID-".$anio."-".$contador__paid__asignaciones[0][contadorDefinitivo]."</td>

							</tr>


							<tr>

								<th>Para:</th>
								<td>".$declaracionRepresentante[0][nombreResponsablePoa]." / ".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>

							</tr>


							<tr>

								<th>Asunto:</th>
								<td>NOTIFICACIÓN DE ASIGNACIÓN PAID ".$anio." - PROCESO DE INGRESO DE PLANIFICACIÓN  – ".strtoupper($informacionCompleto[0][nombreOrganismo]). " - PROYECTO OPTIMIZACIÓN DE INFRAESTRUCTURA A NIVEL NACIONAL</td>

							</tr>

						</thead>

					</table>

					<br>
					<br>


					<table>

						<thead>

							<tr>

								<th>De mi consideración:</th>

							</tr>

						</thead>

					</table>

					<br>


					<table>

						<tbody>

							<tr>

								<td style='text-align:justify;'>

								Conforme a lo establecido en el artículo 26 del Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus reformas “Notificación de asignaciones presupuestarias.-. <em>Una vez que el ente rector de la Economía y
								Finanzas Públicas defina el presupuesto otorgado al Ministerio del Deporte para el correspondiente ejercicio fiscal, y
								con base a la metodología establecida en el Modelo de Asignación Presupuestaria al que hace referencia el artículo 7
								del presente Acuerdo Ministerial, se establecerá y notificará el techo presupuestario asignado a cada organización
								deportiva. Dicho proceso estará a cargo de la Dirección de Planificación e Inversión del Ministerio del Deporte.
								Los techos presupuestarios por organización deportiva serán publicados en la página institucional del Ministerio del
								Deporte.</em>
								

								</td>

							</tr>

						</tbody>

					</table>


					<br>
					<table>

						<tbody>

							<tr>

								<td style='text-align:justify;'>

								Me permito comunicar que, mediante Memorando Nro. MD-CAID-".$inputAnio."-".$inputSerie."-MEM de ".$inputDia." de ".$inputMes." de ".$inputAnioMemo." la Coordinación de Administración de Infraestructura Deportiva, solicita se realice la notificación de la asignación correspondiente a la Planificación Anual de Inversión Deportiva del Proyecto de Inversión “Optimización de Infraestructura Deportiva a Nivel Nacional”.

								</td>

							</tr>

						</tbody>

					</table>
					<br>
					<table>

						<tbody>

							<tr>

								<td style='text-align:justify;'>


									Con estos antecedentes, comunico el monto correspondiente a la primera asignación de la Planificación Anual de  Inversión Deportiva, para el presente ejercicio fiscal (".$anio."), conforme la aplicación  del modelo de asignación del proyecto <em>“PROYECTO OPTIMIZACIÓN DE INFRAESTRUCTURA A NIVEL NACIONAL”</em> remitido por la Coordinación de Administración e Infraestructura Deportiva, por $ ".number_format($techo__presupuestario,2)." (".$asignadorReal." Dólares Americanos), sin incluir el valor del cinco por mil.


								</td>

							</tr>

						</tbody>

					</table>
					<br>
					<table>

						<tbody>

							<tr>

								<td style='text-align:justify;'>


									Se les recuerda que la Planificación Anual de Inversión Deportiva, deberá ser remitida mediante el aplicativo informático, registrando la información en los campos dispuestos para el efecto.


								</td>

							</tr>

						</tbody>

					</table>

					<br>
					<table>

						<tbody>

							<tr>

								<td style='text-align:justify;'>


									Particular que informo para los fines pertinentes.


								</td>

							</tr>

						</tbody>

					</table>


					<br>
					<br>
					<br>
					<br>

					<table>

						<tbody>

							<tr>

								<td style='text-align:justify; font-weight:bold!important;'>


									Atentamente,


								</td>

							</tr>

						</tbody>

					</table>

					<br>
					<br>

					<table>

						<tbody>

							<tr>

								<th style='text-align:justify; font-weight:bold!important;'>


									".$directorPlanificacion[0][nombreUsuario]."


								</th>

							</tr>

							<tr>

								<th style='text-align:justify; font-weight:bold!important;'>


									".$directorPlanificacion[0][nombre]." ".$directorPlanificacion[0][descripcionFisicamenteEstructura]."


								</th>

							</tr>

						</tbody>

					</table>

				";


			}else{
				$documentoCuerpo="
				<br>
				<br>
				<br>
				<table>

					<thead>

						<tr>

							<th>Código:</th>
							<td>"."PAID-".$anio."-".$contador__paid__asignaciones[0][contadorDefinitivo]."</td>

						</tr>


						<tr>

							<th>Para:</th>
							<td>".$declaracionRepresentante[0][nombreResponsablePoa]." / ".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>

						</tr>


						<tr>

							<th>Asunto:</th>
							<td>Notificación de Techo Presupuestario Planificación Anual de Inversión Deportiva ".$anio." – ".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>

						</tr>

					</thead>

				</table>

				<br>
				<br>


				<table>

					<thead>

						<tr>

							<th>De mi consideración:</th>

						</tr>

					</thead>

				</table>

				<br>


				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>

								El Art. 130 de la Ley del Deporte, Educación Física y Recreación menciona que la distribución de los fondos públicos a las organizaciones deportivas estará a cargo del Ministerio Sectorial y se realizará de acuerdo a su política, su presupuesto, la planificación anual aprobada enmarcada en el Plan Nacional del Buen Vivir y la Constitución.

							</td>

						</tr>

					</tbody>

				</table>



				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>

								Mediante Acuerdo Ministerial No.0456 de 30 de diciembre del 2021 el Ministerio del Deporte expidió el procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas, en el que establece el procedimiento para la elaboración y planificación de la Programación Operativa Anual, así como los techos presupuestarios para las organizaciones deportivas acorde al Modelo de Asignación Presupuestaria, la notificación de los techos estará a cargo de la Dirección de Planificación e Inversión del Ministerio y serán publicados en la página institucional.

							</td>

						</tr>

					</tbody>

				</table>



				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>


								Adicionalmente, con Acuerdo Nro. 0051 de 20 de febrero de 2022, se expidió el “Modelo de asignación presupuestaria de la Planificación Anual de Inversión Deportiva para las organizaciones pertenecientes al ".$subse__adquiridas." correspondiente al ejercicio fiscal 2022”.


							</td>

						</tr>

					</tbody>

				</table>

				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>


								La ".$subse__adquiridas.", comunicó la distribución y primera asignación presupuestaria de las organizaciones deportivas ".$aniosPeriodos__ingesos." para la elaboración y presentación de la Planificación Anual de Inversión Deportiva (PAID).


							</td>

						</tr>

					</tbody>

				</table>


				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>


								Con estos antecedentes, me permito notificar el monto correspondiente a la primera asignación de la Planificación Anual de Inversión Deportiva, para el presente ejercicio fiscal (".$aniosPeriodos__ingesos."), conforme el modelo de asignación de la ".$subse__adquiridas.", por $ ".number_format($techo__presupuestario,2)." (".$asignadorReal."), sin incluir el valor del cinco por mil.


							</td>

						</tr>

					</tbody>

				</table>

				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>


								Se les recuerda que la Planificación Anual de Inversión Deportiva, deberá ser remitida mediante el aplicativo informático, registrando la información en los campos dispuestos para el efecto.


							</td>

						</tr>

					</tbody>

				</table>


				<table>

					<tbody>

						<tr>

							<td style='text-align:justify;'>


								Particular que informo para los fines pertinentes.


							</td>

						</tr>

					</tbody>

				</table>


				<br>
				<br>
				<br>
				<br>

				<table>

					<tbody>

						<tr>

							<td style='text-align:justify; font-weight:bold!important;'>


								Atentamente,


							</td>

						</tr>

					</tbody>

				</table>

				<br>
				<br>

				<table>

					<tbody>

						<tr>

							<th style='text-align:justify; font-weight:bold!important;'>


								".$directorPlanificacion[0][nombreUsuario]."


							</th>

						</tr>

						<tr>

							<th style='text-align:justify; font-weight:bold!important;'>


								".$directorPlanificacion[0][nombre]." ".$directorPlanificacion[0][descripcionFisicamenteEstructura]."


							</th>

						</tr>

					</tbody>

				</table>

			";

			}

			

		break;

		case  "pdf__seguimientos__act__deportivas":


			/*===================================
			=            Generar pdf            =
			===================================*/

			if ($tipoAct=="Formativo") {
				$parametro1="../../documentos/seguimiento/informe__recreativos/";
			} else {
				$parametro1="../../documentos/seguimiento/informe__formativos/";
			}
			
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

				<table>

					<thead>

						<tr>

							<th style='width:10%!important;'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</th>


							<th style='width:80%!important;'>

								<center>
									
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$subsecretarias__escritas." -
									".$direccion__escritas."

								</center>

							</th>

							<th style='width:10%!important; display:flex!important;'>

								<image src='images/titulo__principis__ministerios.png'/>

							</th>

						</tr>

					</thead>

				</table>

				<table style='width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

							<div style='font-size:10px!important; padding:.5em; background:#1b5e20; color:white!important;'>

							REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - ORGANIZACIONES DEPORTIVAS - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> ( RSEP-<span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span>-<span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>)

							</div>

							</h1></center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							<h1 style='font-weight:bold;'>

							I PERÍODO EVALUADO

							</h1>

						</th>

						<th>

						AÑO

						</th>

						<td>

							".$periodo__evaluados__anuales."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th style='width:40%!important;'>

							NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style='width:60%!important;'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							RUC DE LA ORGANIZACIÓN:

						</th>

						<td>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							PRESIDENTE O REPRESENTANTE LEGAL:

						</th>

						<td>
							".$informacionCompletoDosI[0][nombreResponsablePoa]."
						</td>

					</tr>

					<tr>

						<th>

							CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							DIRECCIÓN COMPLETA:

						</th>

						<td>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							III. UBICACIÓN GEOGRÁFICA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							PROVINCIA

						</th>

						<td style='width:60%!important;'>
							".$provincia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							CANTÓN

						</th>

						<td>
							".$canton__organizacion__deportivas."
						</td>

					</tr>


					<tr>

						<th>

							PARROQUIA

						</th>

						<td>
							".$parroquia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							BARRIO

						</th>

						<td>
							".$barrio__organizacion__deportivas."
						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							 IV. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>	
							IV.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL
						</th>

					</tr>

					<tr>

						<td style='width:40%!important;'>	
							PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):
						</td>

						<td style='width:60%!important;'>	
							".$presupuesto__asignado__pais__altos."
						</td>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							IV.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>AVANCE DE METAS</center>

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

					<thead>

						<tr>

							<th>
								<center>ACTIVIDADES</center>
							</th>

							<th>
								<center>INDICADOR</center>
							</th>

							<th>
								<center>META PROGRAMADA</center>
							</th>

							<th>
								<center>RESULTADO ALCANZADO</center>
							</th>

							<th>
								<center>% DE CUMPLIMIENTO</center>
							</th>

						</tr>

					</thead>

					<tbody>";

					foreach ($indicadores__altos as $clave => $valor) {

						$percen=(floatval($valor[totalEjecutado])/floatval($valor[totalProgramado]))*100;

						if ($percen>=85) {
							
							$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

						}else if($percen>=70 && $percen<85){

							$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


						}else if($percen<70){

							$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


						}

					$documentoCuerpo.="

						<tr>

							<td><center>".$valor[nombreActividades]."</center></td>
							<td><center>".$valor[nombreIndicador]."</center></td>
							<td><center>".$valor[totalProgramado]."</center></td>
							<td><center>".$valor[totalEjecutado]."</center></td>
							<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."</center></td>

						</tr>	

					";

				}



				if ($porcentaje__c__eje__alto>=85) {
					
					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto>=70 && $porcentaje__c__eje__alto<85){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto<70){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}

				if ($porcentaje__c__eje__alto__parti>=85) {
					
					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto__parti>=70 && $porcentaje__c__eje__alto__parti<85){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto__parti<70){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}


				if ($porcentaje__c__implementacion__de__e__alto>=85) {
					
					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__implementacion__de__e__alto>=70 && $porcentaje__c__implementacion__de__e__alto<85){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__implementacion__de__e__alto<70){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}



				if ($porcentaje__c__beneficiarios__de__e__alto>=85) {
					
					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__beneficiarios__de__e__alto>=70 && $porcentaje__c__beneficiarios__de__e__alto<85){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__beneficiarios__de__e__alto<70){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}

				if ($porcentaje__c__preparacion__de__e__alto>=85) {
					
					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__preparacion__de__e__alto>=70 && $porcentaje__c__preparacion__de__e__alto<85){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__preparacion__de__e__alto<70){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}

				if ($tipoAct=="Formativo") {

					if ($porcentaje__c__beneficiarios__capa__de__e__alto>=85) {
						
						$div6="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__beneficiarios__capa__de__e__alto>=70 && $porcentaje__c__beneficiarios__capa__de__e__alto<85){

						$div6="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__beneficiarios__capa__de__e__alto<70){

						$div6="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}



					if ($porcentaje__c__even__prepa__capa__de__e__alto>=85) {
						
						$div7="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__even__prepa__capa__de__e__alto>=70 && $porcentaje__c__even__prepa__capa__de__e__alto<85){

						$div7="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__even__prepa__capa__de__e__alto<70){

						$div7="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}


				}


				$documentoCuerpo.="</tbody>

					<tfoot></tfoot>

				</table>				


				<table style='width:100%!important; margin-top:1em!important;'>

				<tr>

					<th>IV.III. OTROS ASPECTOS TÉCNICOS</th>

				</tr>

				</table>";

				if ($tipoAct=="Formativo") {

					$documentoCuerpo.="<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>
									<center>INDICADOR</center>
								</th>

								<th>
									<center>META PROGRAMADA</center>
								</th>


								<th>
									<center>META RESULTADO ALCANZADO</center>
								</th>


								<th>
									<center>% DE CUMPLIMIENTO</center>
								</th>

							</tr>

						</thead>

						<tbody class='cuerpo__indicadores__altos'>

							<tr>

								<td>Número de eventos ejecutados al trimestre:</td>
								<td>".$eventos__eje__alto."</td>
								<td>".$meta__eje__alto."</td>
								<td>

									".$div1." ".$porcentaje__c__eje__alto."
										
								</td>

							</tr>

							<tr>

								<td>Número de eventos en los que participa al trimestre:</td>
								<td>".$eventos__eje__alto__parti."</td>
								<td>".$meta__eje__alto__parti."</td>
								<td>

									".$div2." ".$porcentaje__c__eje__alto__parti."
															
								</td>

							</tr>

							<tr>

								<td>Número de beneficiarios atendidos en las actividades del fomento deportivo:</td>
								<td>".$implementacion__de__eje__alto__meta."</td>
								<td>".$implementacion__de__eje__alto__resultado."</td>
								<td>

									".$div3." ".$porcentaje__c__implementacion__de__e__alto."

								</td>

							</tr>

							<tr>

								<td>Número de actividades del fomento deportivo a las que se destina el recurso de operación deportiva:</td>
								<td>".$beneficiarios__de__eje__alto__meta."</td>
								<td>".$beneficiarios__de__eje__alto__resultado."</td>
								<td>
									
															
									".$div4." ".$porcentaje__c__beneficiarios__de__e__alto."
		
								</td>

							</tr>


							<tr>

								<td>Cantidad de implementación deportiva al I trimestre:</td>
								<td>".$preparacion__de__eje__alto__meta."</td>
								<td>".$preparacion__de__eje__alto__resultado."</td>
								<td>
									
									".$div5." ".$porcentaje__c__preparacion__de__e__alto."					

								</td>

							</tr>


							<tr>

								<td>Número de beneficiarios de capacitaciones deportivas:</td>
								<td>".$beneficiarios__capa__de__eje__alto__meta."</td>
								<td>".$beneficiarios__capa__de__eje__alto__resultado."</td>
								<td>
									
									".$div6." ".$porcentaje__c__beneficiarios__capa__de__e__alto."					

								</td>

							</tr>


							<tr>

								<td>Número de beneficiarios de eventos de preparación y competencias:</td>
								<td>".$beneficiarios__even__prepa__de__eje__alto__meta."</td>
								<td>".$beneficiarios__even__prepa__de__eje__alto__resultado."</td>
								<td>
									
									".$div7." ".$porcentaje__c__even__prepa__capa__de__e__alto."					

								</td>

							</tr>";


						if (!empty($indicadorArray)) {
									
							$indicadorArray__1 = explode(",", $indicadorArray);
							$metaProgramadaArray__1 = explode(",", $metaProgramadaArray);
							$metaResultadoArray__1 = explode(",", $metaResultadoArray);
							$porcentajeCumplimientoArray__1 = explode(",", $porcentajeCumplimientoArray);

							foreach ($indicadorArray__1 as $key => $value) {
								

								if ($porcentajeCumplimientoArray__1[$key]>=85) {
									
									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($porcentajeCumplimientoArray__1[$key]>=70 && $porcentajeCumplimientoArray__1[$key]<85){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($porcentajeCumplimientoArray__1[$key]<70){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}


								$documentoCuerpo.="

								<tr>

									<td>".$indicadorArray__1[$key]."</td>
									<td>".$metaProgramadaArray__1[$key]."</td>
									<td>".$metaResultadoArray__1[$key]."</td>
									<td>".$div1." ".$porcentajeCumplimientoArray__1[$key]."</td>

								</tr>

								";

							}

						}							

				$documentoCuerpo.="</tbody>

					</table>";

				}else{

					$documentoCuerpo.="<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>
									<center>INDICADOR</center>
								</th>

								<th>
									<center>META PROGRAMADA</center>
								</th>


								<th>
									<center>META RESULTADO ALCANZADO</center>
								</th>


								<th>
									<center>% DE CUMPLIMIENTO</center>
								</th>

							</tr>

						</thead>

						<tbody class='cuerpo__indicadores__altos'>

							<tr>

								<td>Número de eventos ejecutados al trimestre:</td>
								<td>".$eventos__eje__alto."</td>
								<td>".$meta__eje__alto."</td>
								<td>

									".$div1." ".$porcentaje__c__eje__alto."
										
								</td>

							</tr>

							<tr>

								<td>Número de eventos en los que participa al trimestre:</td>
								<td>".$eventos__eje__alto__parti."</td>
								<td>".$meta__eje__alto__parti."</td>
								<td>

									".$div2." ".$porcentaje__c__eje__alto__parti."
															
								</td>

							</tr>

							<tr>

								<td>Cantidad de implementación deportiva al I trimestre:</td>
								<td>".$implementacion__de__eje__alto__meta."</td>
								<td>".$implementacion__de__eje__alto__resultado."</td>
								<td>

									".$div3." ".$porcentaje__c__implementacion__de__e__alto."

								</td>

							</tr>

							<tr>

								<td>Número de beneficiarios de capacitaciones deportivas:</td>
								<td>".$beneficiarios__de__eje__alto__meta."</td>
								<td>".$beneficiarios__de__eje__alto__resultado."</td>
								<td>
									
															
									".$div4." ".$porcentaje__c__beneficiarios__de__e__alto."
		
								</td>

							</tr>


							<tr>

								<td>Número de beneficiarios de eventos de recreación:</td>
								<td>".$preparacion__de__eje__alto__meta."</td>
								<td>".$preparacion__de__eje__alto__resultado."</td>
								<td>
									
									".$div5." ".$porcentaje__c__preparacion__de__e__alto."					

								</td>

							</tr>";


						if (!empty($indicadorArray)) {
							
							$indicadorArray__1 = explode(",", $indicadorArray);
							$metaProgramadaArray__1 = explode(",", $metaProgramadaArray);
							$metaResultadoArray__1 = explode(",", $metaResultadoArray);
							$porcentajeCumplimientoArray__1 = explode(",", $porcentajeCumplimientoArray);

							foreach ($indicadorArray__1 as $key => $value) {
								

								if ($porcentajeCumplimientoArray__1[$key]>=85) {
									
									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($porcentajeCumplimientoArray__1[$key]>=70 && $porcentajeCumplimientoArray__1[$key]<85){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($porcentajeCumplimientoArray__1[$key]<70){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}


								$documentoCuerpo.="

								<tr>

									<td>".$indicadorArray__1[$key]."</td>
									<td>".$metaProgramadaArray__1[$key]."</td>
									<td>".$metaResultadoArray__1[$key]."</td>
									<td>".$div1." ".$porcentajeCumplimientoArray__1[$key]."</td>

								</tr>

								";

							}

						}							

				$documentoCuerpo.="</tbody>

					</table>";


				}



			if ($tipoAct=="Formativo") {

				$documentoCuerpo.="

					<table style='width:100%!important; margin-top:1em!important;'>

						<tr>

							<th>
								NÚMERO DE MEDALLAS ALCANZAS EN EL TRIMESTRE:
							</th>

						</tr>

					</table>

					<table style='width:100%!important; margin-top:.5em!important;'>

						<tr>

							<th>Oro</th>
							<td>".$oro__alto."</td>

							<th>Plata</th>
							<td>".$plata__alto."</td>

							<th>Bronce</th>
							<td>".$bronce__alto."</td>

						</tr>

					</table>";

			}else{

				$documentoCuerpo.="

					<table style='width:100%!important; margin-top:1em!important;'>

						<tr>

							<th>
								NÚMERO DE DISCIPLINAS :
							</th>

						</tr>

					</table>


					<table style='width:100%!important; margin-top:.5em!important;'>

						<tr>

							<th>HOMBRES</th>
							<td>".$hombres__alto."</td>

							<th>MUJERES</th>
							<td>".$mujeres__alto."</td>

							<th>PERSONAS CON DISCAPACIDAD</th>
							<td>".$personas__con__discapacidad__alto."</td>

						</tr>

					</table>";

			}


			$documentoCuerpo.="<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<th>
							PRESENTAN INFORMACIÓN:
						</th>

					</tr>

				</table>";

			if ($tipoAct=="Formativo") {

			$documentoCuerpo.="	

			<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>

								<center>DETALLE</center>

							</th>


							<th>

								<center>CUMPLE</center>

							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>
								Reporte de resultados deportivo obtenidos en los eventos en los que participaron:
							</td>

							<td>

								".$reporte__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Listados de asistencia de atletas suscrito por los entrenadores o coordinador técnico: 
							</td>

							<td>

								".$listados__tabla__alto."

							</td>

						</tr>


						<tr>

							<td>
								Registro fotográfico:
							</td>

							<td>

								".$informe__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Listado de asistentes de capacitaciones:
							</td>

							<td>

								".$registro__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Actas de entrega recepción de la implementación deportiva adquirida:
							</td>

							<td>

								".$asistentes__tabla__alto."

							</td>

						</tr>


						<tr>

							<td>
								Cumplimientos de los procesos de contratación del equipo técnico contratado en el trimestre:
							</td>

							<td>

								".$actas__tabla__alto."

							</td>

						</tr>

					</tbody>

				</table>";


			}else{

			$documentoCuerpo.="	

			<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>

								<center>DETALLE</center>

							</th>


							<th>

								<center>CUMPLE</center>

							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>
								Listados de participantes en eventos recreativos:
							</td>

							<td>

								".$reporte__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Registro fotográfico:
							</td>

							<td>

								".$listados__tabla__alto."

							</td>

						</tr>


						<tr>

							<td>
								Listado de asistentes de capacitaciones:
							</td>

							<td>

								".$informe__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Actas de entrega recepción de la implementación deportiva adquirida:
							</td>

							<td>

								".$registro__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Cumplimientos de los procesos de contratación del equipo técnico contratado en el trimestre:
							</td>

							<td>

								".$asistentes__tabla__alto."

							</td>

						</tr>


					</tbody>

				</table>";


			}

			$documentoCuerpo.="

			<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Observaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($observaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Recomendaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($recomendaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>ELABORADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
								<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>REVISADO Y APROBADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
								<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

				</table>

				";


		break;

		case  "pdf__seguimientos__act__deportivas2023":


			/*===================================
			=            Generar pdf            =
			===================================*/

			if ($tipoAct=="Formativo") {
				$parametro1="../../documentos/seguimiento/informe__recreativos/";
			} else {
				$parametro1="../../documentos/seguimiento/informe__formativos/";
			}
			
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
								
								".$subsecretarias__escritas." 
								<br>
								<br>
								".$direccion__escritas."

							</center>

						</th>

		

						<th colspan='1'>

							<img  src='../../images/titulo__principis__ministerios.png'/>

						</th>
					</tr>

							

				</table>

				<table style='width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

							<div style='font-size:10px!important; padding:.5em; background:#1b5e20; color:white!important;'>

							REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSET - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> - <span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>

							</div>

							</h1></center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							<h1 style='font-weight:bold;'>

							I EJERCICIO FISCAL

							</h1>

						</th>

						<th>

						AÑO

						</th>

						<td>

							".$periodo__evaluados__anuales."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th style='width:40%!important;'>

							NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							RUC DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							PRESIDENTE O REPRESENTANTE LEGAL:

						</th>

						<td style = 'background:#e8edff'>
							".$informacionCompletoDosI[0][nombreResponsablePoa]."
						</td>

					</tr>

					<tr>

						<th>

							CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							DIRECCIÓN COMPLETA:

						</th>

						<td style = 'background:#e8edff'>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							III. UBICACIÓN GEOGRÁFICA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							PROVINCIA

						</th>

						<td style = 'background:#e8edff'>
							".$provincia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							CANTÓN

						</th>

						<td style = 'background:#e8edff'>
							".$canton__organizacion__deportivas."
						</td>

					</tr>


					<tr>

						<th>

							PARROQUIA

						</th>

						<td style = 'background:#e8edff'>
							".$parroquia__organizacion__deportivas."
						</td>

					</tr>

				

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							 IV. ALINEACIÓN A LA PLANIFICACIÓN

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							ÁREA DE ACCIÓN:

						</th>

						<td style = 'background:#e8edff'>

						".$areaAccion."

						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							OBJETIVO ESTRATÉGICO INSTITUCIONAL

						</th>

						<td style = 'background:#e8edff'>

						".$objetivoS."

						</td>

					</tr>

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							 V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>	
							V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL
						</th>

					</tr>
					";
					$semestre;
					if($trimestre__evaluados__al == "I SEMESTRE"){
						$semestre = "Enero - Junio";
					}elseif($trimestre__evaluados__al == "II SEMESTRE"){
						$semestre = "Julio - Diciembre";
					}


					$documentoCuerpo.="

					<tr>

						<td style='width:40%!important;'>	
						<br>
						PERÍODO EVALUADO:
						</td>

						<td style = 'background:#e8edff'>	
						<br>
							".$semestre."
						</td>

					</tr>

					<tr>

						<td style='width:40%!important;'>	
							PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):
						</td>

						<td style = 'background:#e8edff'>	
							".$presupuesto__asignado__pais__altos."
						</td>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							V.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

						</th>

					</tr>

				</table>
				

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>AVANCE DE METAS</center>

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

					<thead>

						<tr>

							<th>
								<center>ACTIVIDADES</center>
							</th>

							<th>
								<center>INDICADOR</center>
							</th>

							<th>
								<center>META PLANIFICADA AL SEMESTRE (A)</center>
							</th>

							<th>
								<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
							</th>

							<th>
								<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
							</th>

						</tr>

					</thead>

					<tbody>";

					foreach ($indicadores__altos2023 as $clave1 => $valor1) {

						

							$percen=(floatval($valor1[totalEjecutado])/floatval($valor1[totalProgramado]))*100;

							if ($percen>=85) {
								
								$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

							}else if($percen>=70 && $percen<85){

								$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


							}else if($percen<70){

								$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


							}

							$documentoCuerpo.="

								<tr>
									<td><center>0".$valor1[idActividad]." - ".$valor1[nombreActividades]."</center></td>
									<td><center>".$valor1[nombreIndicador]."</center></td>
									<td><center>".$valor1[totalProgramado]."</center></td>
									<td><center>".$valor1[totalEjecutado]."</center></td>
									<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."</center></td>

								</tr>	

							";

						
					}

			


				if ($porcentaje__c__eje__alto>=85) {
					
					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto>=70 && $porcentaje__c__eje__alto<85){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto<70){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}

				if ($porcentaje__c__eje__alto__parti>=85) {
					
					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto__parti>=70 && $porcentaje__c__eje__alto__parti<85){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto__parti<70){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}


				if ($porcentaje__c__implementacion__de__e__alto>=85) {
					
					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__implementacion__de__e__alto>=70 && $porcentaje__c__implementacion__de__e__alto<85){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__implementacion__de__e__alto<70){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}



				if ($porcentaje__c__beneficiarios__de__e__alto>=85) {
					
					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__beneficiarios__de__e__alto>=70 && $porcentaje__c__beneficiarios__de__e__alto<85){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__beneficiarios__de__e__alto<70){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}

				if ($porcentaje__c__preparacion__de__e__alto>=85) {
					
					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__preparacion__de__e__alto>=70 && $porcentaje__c__preparacion__de__e__alto<85){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__preparacion__de__e__alto<70){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}

				if ($tipoAct=="Formativo") {

					if ($porcentaje__c__beneficiarios__capa__de__e__alto>=85) {
						
						$div6="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__beneficiarios__capa__de__e__alto>=70 && $porcentaje__c__beneficiarios__capa__de__e__alto<85){

						$div6="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__beneficiarios__capa__de__e__alto<70){

						$div6="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}



					if ($porcentaje__c__even__prepa__capa__de__e__alto>=85) {
						
						$div7="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__even__prepa__capa__de__e__alto>=70 && $porcentaje__c__even__prepa__capa__de__e__alto<85){

						$div7="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__even__prepa__capa__de__e__alto<70){

						$div7="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}


				}


				$documentoCuerpo.="</tbody>

					<tfoot></tfoot>

				</table>	
				
				<table style='width:60%!important; margin-top:1em!important;'>

						<tr>

							<th><div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div></th>

							<th>100% - 85%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
							</th>

							<th>84,99% - 70%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
							</th>
							<th>69,99% - 0%</th>
						</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

				<tr>

					<th>V.III. OTROS ASPECTOS TÉCNICOS</th>

				</tr>

				</table>";

				if ($tipoAct=="Formativo") {

					$documentoCuerpo.="<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>
									<center>INDICADOR</center>
								</th>

								<th>
									<center>META PLANIFICADA AL SEMESTRE (A)</center>
								</th>


								<th>
									<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
								</th>


								<th>
									<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
								</th>

							</tr>

						</thead>

						<tbody class='cuerpo__indicadores__altos'>";

						$indicadores__act3_7_for_recreativo_alto=$objeto->getObtenerInformacionGeneral("select (select coalesce(SUM(totalT)+SUM(totalT18),0) FROM poa_seguimiento_recreativo_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad6Registrado , (select coalesce(SUM(cantidadBienes),0) FROM poa_segimiento_capacitacion AS a1  WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad3Registrado, (select coalesce(SUM(total),0)  FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso='$aniosPeriodos__ingesos' and c.idOrganismo='$idOrganismo' AND c.idActividad = '3') as actividad3, (select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '7') as actividad7,(select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '6') as actividad6,  coalesce(SUM(a.cantidadBienes),0) actividad7Registrado  FROM poa_segimiento_implementacion AS a  WHERE a.idOrganismo='$idOrganismo'   AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;");

					
					foreach ($indicadores__act3_7_for_recreativo_alto as $clave1 => $valor1) {

						
						

						
							$percen=(floatval($valor1[actividad3Registrado])/floatval($valor1[actividad3]))*100;
							if (!is_nan($percen)) {
								if ($percen>=85) {
									
									$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen>=70 && $percen<85){

									$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen<70){

									$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$percen1=(floatval($valor1[actividad7Registrado])/floatval($valor1[actividad7]))*100;
							if (!is_nan($percen1)) {
								if ($percen1>=85) {
									
									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen1>=70 && $percen1<85){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen1<70){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$percen2=(floatval($valor1[actividad6Registrado])/floatval($valor1[actividad6]))*100;

							if (!is_nan($percen2)) {
								if ($percen2>=85) {
									
									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen2>=70 && $percen2<85){

									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen2<70){

									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$documentoCuerpo.="

								<tr>
									<td><center>Número de beneficiarios de capacitaciones deportivas:</center></td>
									<td><center>".$valor1[actividad3]."</center></td>
									<td><center>".$valor1[actividad3Registrado]."</center></td>
									<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."</center></td>

								</tr>	

								<tr>
										<td><center> Cantidad de implementación deportiva adquirida:</center></td>
										<td><center>".$valor1[actividad7]."</center></td>
										<td><center>".$valor1[actividad7Registrado]."</center></td>
										<td><center><span>".$div1."</span>&nbsp;&nbsp;".$percen1."%</center></td>
	
								</tr>	

							";

						
					}

						

							

					$documentoCuerpo.="</tbody>

					</table>
					
					<table style='width:60%!important; margin-top:1em!important;'>

						<tr>

							<th><div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div></th>

							<th>100% - 85%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
							</th>

							<th>84,99% - 70%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
							</th>
							<th>69,99% - 0%</th>
						</tr>

					</table>
					";

				}else{

					$documentoCuerpo.="<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>
									<center>INDICADOR</center>
								</th>

								<th>
									<center>META PLANIFICADA AL SEMESTRE (A)</center>
								</th>


								<th>
									<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
								</th>


								<th>
									<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
								</th>

							</tr>

						</thead>

						<tbody class='cuerpo__indicadores__altos'>";

						$indicadores__act3_7_for_recreativo_alto=$objeto->getObtenerInformacionGeneral("select (select coalesce(SUM(totalT)+SUM(totalT18),0) FROM poa_seguimiento_recreativo_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad6Registrado , (select coalesce(SUM(cantidadBienes),0) FROM poa_segimiento_capacitacion AS a1  WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad3Registrado, (select coalesce(SUM(total),0)  FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso='$aniosPeriodos__ingesos' and c.idOrganismo='$idOrganismo' AND c.idActividad = '3') as actividad3, (select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '7') as actividad7,(select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '6') as actividad6,  coalesce(SUM(a.cantidadBienes),0) actividad7Registrado  FROM poa_segimiento_implementacion AS a  WHERE a.idOrganismo='$idOrganismo'   AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;");

					
						foreach ($indicadores__act3_7_for_recreativo_alto as $clave1 => $valor1) {

							

							$percen=(floatval($valor1[actividad3Registrado])/floatval($valor1[actividad3]))*100;
							if (!is_nan($percen)) {
								if ($percen>=85) {
									
									$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen>=70 && $percen<85){

									$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen<70){

									$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$percen1=(floatval($valor1[actividad7Registrado])/floatval($valor1[actividad7]))*100;
							
							if (!is_nan($percen1)) {
								if ($percen1>=85) {
									
									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen1>=70 && $percen1<85){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen1<70){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$percen2=(floatval($valor1[actividad6Registrado])/floatval($valor1[actividad6]))*100;

							if (!is_nan($percen2)) {
								if ($percen2>=85) {
									
									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen2>=70 && $percen2<85){

									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen2<70){

									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

								$documentoCuerpo.="

									<tr>
										<td><center>Número de beneficiarios de capacitaciones deportivas:</center></td>
										<td><center>".$valor1[actividad3]."</center></td>
										<td><center>".$valor1[actividad3Registrado]."</center></td>
										<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."%</center></td>

									</tr>	

									<tr>
											<td><center> Cantidad de implementación deportiva adquirida:</center></td>
											<td><center>".$valor1[actividad7]."</center></td>
											<td><center>".$valor1[actividad7Registrado]."</center></td>
											<td><center><span>".$div1."</span>&nbsp;&nbsp;".$percen1."%</center></td>
		
									</tr>	

									<tr>
											<td><center> Cantidad de implementación deportiva adquirida:</center></td>
											<td><center>".$valor1[actividad6]."</center></td>
											<td><center>".$valor1[actividad6Registrado]."</center></td>
											<td><center><span>".$div2."</span>&nbsp;&nbsp;".$percen2."%</center></td>
		
									</tr>	

								";

							
						}


				$documentoCuerpo.="</tbody>

					</table>
					
					<table style='width:60%!important; margin-top:1em!important;'>

						<tr>

							<th><div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div></th>

							<th>100% - 85%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
							</th>

							<th>84,99% - 70%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
							</th>
							<th>69,99% - 0%</th>
						</tr>

					</table>
					";


				}



			if ($tipoAct=="Formativo") {

				$documentoCuerpo.="
					<table style='margin-top:.5em!important; width:100%!importan;'>

						
						<tr>

							<td style='width:40%!important;'>	
							<br>
							NÚMERO DE CAPACITADORES:
							</td>

							<td style = 'background:#e8edff'>	
							<br>
								".$numeroCapacitadores."
							</td>

						</tr>

						<tr>

							<td style='width:40%!important;'>	
								MONTO DE AUTOGESTIÓN REPORTADO AL SEMESTRE (USD):
							</td>

							<td style = 'background:#e8edff'>	
								".$presupuesto__autogestion__asignado__pais__altos."
							</td>

						</tr>";

						$porcentaje = ($presupuesto__autogestion__asignado__pais__altos * 100) / $presupuesto__asignado__pais__altos;
	
						$documentoCuerpo.="

						<tr>

							<td style='width:40%!important;'>	
								% DE AUTOGESTIÓN EN RELACIÓN AL PRESUPUESTO POA ASIGNADO:
							</td>

							<td style = 'background:#e8edff'>	
							". number_format((float)$porcentaje, 2, '.', '')." %
							</td>

						</tr>

					</table>

					<table style='width:100%!important; margin-top:1em!important;'>

						<tr>

							<th>
								NÚMERO DE MEDALLAS ALCANZAS EN EL TRIMESTRE:
							</th>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:30%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr >

								<th colspan='2'  style = 'background:#e8edff'>

									<center>NÚMERO DE MEDALLAS ALCANZAS EN EL TRIMESTRE:</center>

								</th>
			
							</tr>

							<tr>

								<th>

									<center>Oro</center>

								</th>
								<td>

									<center>".$oro__alto."</center>
								
								</td>

							</tr>

						</thead>

						<tbody>

							<tr>

						
								<th>

									<center>Plata</center>

								</th>


								<td>

									<center>".$plata__alto."</center>

								</td>

							

							</tr>

							<tr>

								<th>

									<center>Bronce</center>

								</th>
								<td>

									<center>".$bronce__alto."</center>
								
								</td>

							</tr>

							


						</tbody>

					</table>

				
					
					<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr >

								<th colspan='4'>

									<center>NÚMERO DE BENEFICIARIOS</center>

								</th>
			
							</tr>

							<tr>

								<th>

									<center>GRUPOS ETARIOS</center>

								</th>


								<th>

									<center>HOMBRES</center>

								</th>

								<th>

									<center>MUJERES</center>

								</th>

								<th>

									<center>TOTAL</center>

								</th>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td>De 5 a 17 años atendidos</td>
							
						
								<td>

									".$hombresB."

								</td>

								<td>

									".$mujeresB."

								</td>

								<td>

									".$totalB."

								</td>

							</tr>

							<tr>
								<td>De 18 a 69 años atendidos</td>

								<td>

									".$hombresB18."

								</td>

								<td>

									".$mujeresB18."

								</td>

								<td>

									".$totalB18."

								</td>

							</tr>


						</tbody>

					</table>";

			}else{

				$documentoCuerpo.="

					<table style='margin-top:.5em!important; width:100%!importan;'>

						
						<tr>

							<td style='width:40%!important;'>	
							<br>
							NÚMERO DE CAPACITADORES:
							</td>

							<td style = 'background:#e8edff'>	
							<br>
								".$numeroCapacitadores."
							</td>

						</tr>

						<tr>

							<td style='width:40%!important;'>	
								MONTO DE AUTOGESTIÓN REPORTADO AL SEMESTRE (USD):
							</td>

							<td style = 'background:#e8edff'>	
								".$presupuesto__autogestion__asignado__pais__altos."
							</td>

						</tr>

						";

						$porcentaje = ($presupuesto__autogestion__asignado__pais__altos * 100) / $presupuesto__asignado__pais__altos;
	
						$documentoCuerpo.="
						<tr>

							<td style='width:40%!important;'>	
								% DE AUTOGESTIÓN EN RELACIÓN AL PRESUPUESTO POA ASIGNADO:
							</td>

							<td style = 'background:#e8edff'>	
							". number_format((float)$porcentaje, 2, '.', '')." %
							</td>

						</tr>

					</table>

			
				<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr >

							<th colspan='4'>

								<center>NÚMERO DE BENEFICIARIOS</center>

							</th>
		
						</tr>

						<tr>

							<th>

								<center>GRUPOS ETARIOS</center>

							</th>


							<th>

								<center>HOMBRES</center>

							</th>

							<th>

								<center>MUJERES</center>

							</th>

							<th>

								<center>TOTAL</center>

							</th>

						</tr>

					</thead>

					<tbody>

							<tr>

								<td>De 5 a 17 años atendidos</td>
							
						
								<td>

									".$hombresB."

								</td>

								<td>

									".$mujeresB."

								</td>

								<td>

									".$totalB."

								</td>

							</tr>

							<tr>
								<td>De 18 a 69 años atendidos</td>

								<td>

									".$hombresB18."

								</td>

								<td>

									".$mujeresB18."

								</td>

								<td>

									".$totalB18."

								</td>

							</tr>


					</tbody>


				</table>";

			}


			$documentoCuerpo.="<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<th>
							PRESENTA INFORMACIÓN:
						</th>

					</tr>

				</table>";

			if ($tipoAct=="Formativo") {

			$documentoCuerpo.="	

			<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>

								<center>DETALLE</center>

							</th>


							<th>

								<center>CUMPLE</center>

							</th>

							<th>

								<center>OBSERVACIONES</center>

							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>
								Listado de asistentes de capacitaciones:
							</td>

							<td>

								".$listAsistCapForm__tabla__alto."

							</td>

							<td>

								".$listAsistCapForm__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Fotocopias de certificados de capacitaciones:
							</td>

							<td>

								".$fotCertifCapForm__tabla__alto."

							</td>

							<td>

								".$fotCertifCapForm__observaciones__alto."

							</td>

						</tr>


						<tr>

							<td>
							Registro fotográfico de capacitaciones:
							</td>

							<td>

								".$regFotCapaFrom__tabla__alto."

							</td>

							<td>

								".$regFotCapaFrom__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
								Hojas de vida de profesionales:
							</td>

							<td>

								".$cvForm__tabla__alto."

							</td>

							<td>

								".$cvForm__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Contrato de profesionales:
							</td>

							<td>

								".$contratosForm__tabla__alto."

							</td>

							<td>

								".$contratosForm__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Registro fotográfico de los eventos deportivos:
							</td>

							<td>

								".$registroFotEventoForm__tabla__alto."

							</td>

							<td>

								".$registroFotEventoForm__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Listados de asistencia de atletas suscrito por entrenador o coordinador técnico: 
							</td>

							<td>

								".$listadoAsistenciaAtl__tabla__alto."

							</td>

							<td>

								".$listadoAsistenciaAtl__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Orden de compra o de servicio de implementación deportiva:
							</td>

							<td>

								".$ordenCompraForm__tabla__alto."

							</td>

							<td>

								".$ordenCompraForm__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Actas de entrega recepción de la implementación deportiva adquirida:
							</td>

							<td>

								".$actasForm__tabla__alto."

							</td>

							<td>

								".$actasForm__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Factura de implementación deportiva:
							</td>

							<td>

								".$facturaForm__tabla__alto."

							</td>

							<td>

								".$facturaForm__observaciones__alto."

							</td>

						</tr>


					</tbody>

				</table>";


			}else{

			$documentoCuerpo.="	

			<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>

								<center>DETALLE</center>

							</th>


							<th>

								<center>CUMPLE</center>

							</th>

							<th>

								<center>OBSERVACIONES</center>

							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>
								Listado de asistentes de capacitaciones:
							</td>

							<td>

								".$listAsisCapRec__tabla__alto."

							</td>

							<td>

								".$listAsisCapRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Fotocopias de certificados de capacitaciones:
							</td>

							<td>

								".$fotCertCapRec__tabla__alto."

							</td>

							<td>

								".$fotCertCapRec__observaciones__alto."

							</td>

						</tr>


						<tr>

							<td>
							Registro fotográfico de capacitaciones:
							</td>

							<td>

								".$regFotCapRec__tabla__alto."

							</td>

							<td>

								".$regFotCapRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
								Hojas de vida de profesionales:
							</td>

							<td>

								".$cvRec__tabla__alto."

							</td>

							<td>

								".$cvRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Contrato de profesionales:
							</td>

							<td>

								".$contratoRec__tabla__alto."

							</td>

							<td>

								".$contratoRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Registro fotográfico de los eventos recreativos:
							</td>

							<td>

								".$regFotEvenRec__tabla__alto."

							</td>

							<td>

								".$regFotEvenRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Listado de participantes de eventos recreativos:
							</td>

							<td>

								".$listPartEven__tabla__alto."

							</td>

							<td>

								".$listPartEven__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Orden de compra o de servicio de implementación deportiva:
							</td>

							<td>

								".$ordCompRec__tabla__alto."

							</td>

							<td>

								".$ordCompRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Actas de entrega recepción de la implementación deportiva adquirida:
							</td>

							<td>

								".$actEntregaRec__tabla__alto."

							</td>

							<td>

								".$actEntregaRec__observaciones__alto."

							</td>

						</tr>

						<tr>

							<td>
							Factura de implementación deportiva:
							</td>

							<td>

								".$facturaRec__tabla__alto."

							</td>

							<td>

								".$facturaRec__observaciones__alto."

							</td>

						</tr>


					</tbody>

				</table>";


			}

			$documentoCuerpo.="

			<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Observaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($observaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Recomendaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($recomendaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>";

				if (strpos($direccion__escritas, "COORDINACIÓN") !== false){
					$documentoCuerpo.="
					<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>ELABORADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
									<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>REVISADO Y APROBADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
									<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
						
	
					</table>
	
					";

				}else{

					$documentoCuerpo.="
					<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>ELABORADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
									<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>REVISADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
									<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>";
						
						$sup = $usuarioUsados__seguimientos[0][PersonaACargo];
	
						$usuarioUsados__seguimientos2=$objeto->getObtenerInformacionGeneral("SELECT b.descripcionPuestoInstitucional,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS nombreSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS apellidoSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.descripcionPuestoInstitucional, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 INNER JOIN th_puestoinstitucional AS a2 ON a1.puestoInstitucional=a2.id_PuestoInstitucional WHERE a1.id_usuario=a.PersonaACargo) AS cargoSuperior FROM th_usuario AS a INNER JOIN th_puestoinstitucional AS b ON a.puestoInstitucional=b.id_PuestoInstitucional WHERE a.id_usuario='$sup';");
						
						$documentoCuerpo.="
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>APROBADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos2[0][nombreSuperior]." ".$usuarioUsados__seguimientos2[0][apellidoSuperior]."</div>
									<div>".$usuarioUsados__seguimientos2[0][cargoSuperior]."</div>
								
								</center>		
								
								
		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
	
						
	
					</table>
	
					";
				}




		break;



		case  "pdf__seguimientos__altos":


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/seguimiento/informeTecnico__seguimiento/";
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

				<table>

					<thead>

						<tr>

							<th style='width:10%!important;'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</th>


							<th style='width:80%!important;'>

								<center>
									
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$subsecretarias__escritas." -
									".$direccion__escritas."

								</center>
								
							</th>

							<th style='width:10%!important; display:flex!important;'>

								<image src='images/titulo__principis__ministerios.png'/>

							</th>

						</tr>

					</thead>

				</table>

				<table style='width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

							<div style='font-size:10px!important; padding:.5em; background:#1b5e20; color:white!important;'>

							REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - ORGANIZACIONES DEPORTIVAS - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> ( RSEP-<span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span>-<span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>)

							</div>

							</h1></center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							I PERÍODO EVALUADO

						</th>

						<th>

						AÑO

						</th>

						<td>

							".$periodo__evaluados__anuales."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th style='width:40%!important;'>

							NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style='width:60%!important;'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							RUC DE LA ORGANIZACIÓN:

						</th>

						<td>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							PRESIDENTE O REPRESENTANTE LEGAL:

						</th>

						<td>
							".$informacionCompletoDosI[0][nombreResponsablePoa]."
						</td>

					</tr>

					<tr>

						<th>

							CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							DIRECCIÓN COMPLETA:

						</th>

						<td>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							III. UBICACIÓN GEOGRÁFICA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							PROVINCIA

						</th>

						<td style='width:60%!important;'>
							".$provincia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							CANTÓN

						</th>

						<td>
							".$canton__organizacion__deportivas."
						</td>

					</tr>


					<tr>

						<th>

							PARROQUIA

						</th>

						<td>
							".$parroquia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							BARRIO

						</th>

						<td>
							".$barrio__organizacion__deportivas."
						</td>

					</tr>

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							IV. DATOS GENERALES DEL CONVENIO

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							NÚMERO DE CONVENIO:

						</th>

						<td style='width:60%!important;'>

						".$numeroConvenio__paid."

						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							ADMINISTRADOR DEL CONVENIO:

						</th>

						<td style='width:60%!important;'>

						".$administradorConvenio__paid."

						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							DOCUMENTO DE DESIGNACIÓN:

						</th>

						<td style='width:60%!important;'>

						".$documentoAsignacionConvenio__paid."

						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							 IV. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>	
							IV.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL
						</th>

					</tr>

					<tr>

						<td style='width:40%!important;'>	
							PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):
						</td>

						<td style='width:60%!important;'>	
							".$presupuesto__asignado__pais__altos."
						</td>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							IV.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>AVANCE DE METAS</center>

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

					<thead>

						<tr>

							<th>
								<center>ACTIVIDADES</center>
							</th>

							<th>
								<center>INDICADOR</center>
							</th>

							<th>
								<center>META PROGRAMADA</center>
							</th>

							<th>
								<center>RESULTADO ALCANZADO</center>
							</th>

							<th>
								<center>% DE CUMPLIMIENTO</center>
							</th>

						</tr>

					</thead>

					<tbody>";

					foreach ($indicadores__altos as $clave => $valor) {

						$percen=(floatval($valor[totalEjecutado])/floatval($valor[totalProgramado]))*100;

						if ($percen>=85) {
							
							$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

						}else if($percen>=70 && $percen<85){

							$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


						}else if($percen<70){

							$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


						}

					$documentoCuerpo.="

						<tr>

							<td><center>".$valor[nombreActividades]."</center></td>
							<td><center>".$valor[nombreIndicador]."</center></td>
							<td><center>".$valor[totalProgramado]."</center></td>
							<td><center>".$valor[totalEjecutado]."</center></td>
							<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."</center></td>

						</tr>	

					";

				}



				if ($porcentaje__c__eje__alto>=85) {
					
					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto>=70 && $porcentaje__c__eje__alto<85){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto<70){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}

				if ($porcentaje__c__eje__alto__parti>=85) {
					
					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto__parti>=70 && $porcentaje__c__eje__alto__parti<85){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto__parti<70){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}


				if ($porcentaje__c__implementacion__de__e__alto>=85) {
					
					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__implementacion__de__e__alto>=70 && $porcentaje__c__implementacion__de__e__alto<85){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__implementacion__de__e__alto<70){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}



				if ($porcentaje__c__beneficiarios__de__e__alto>=85) {
					
					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__beneficiarios__de__e__alto>=70 && $porcentaje__c__beneficiarios__de__e__alto<85){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__beneficiarios__de__e__alto<70){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}

				if ($porcentaje__c__preparacion__de__e__alto>=85) {
					
					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__preparacion__de__e__alto>=70 && $porcentaje__c__preparacion__de__e__alto<85){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__preparacion__de__e__alto<70){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}


				$documentoCuerpo.="</tbody>

					<tfoot></tfoot>

				</table>";				


			$documentoCuerpo.="<table style='width:100%!important; margin-top:1em!important;'>

				<tr>

					<th>IV.III. OTROS ASPECTOS TÉCNICOS</th>

				</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>
								<center>INDICADOR</center>
							</th>

							<th>
								<center>META PROGRAMADA</center>
							</th>


							<th>
								<center>META RESULTADO ALCANZADO</center>
							</th>


							<th>
								<center>% DE CUMPLIMIENTO</center>
							</th>

						</tr>

					</thead>

					<tbody class='cuerpo__indicadores__altos'>

						<tr>

							<td>Número de eventos ejecutados al trimestre:</td>
							<td>".$eventos__eje__alto."</td>
							<td>".$meta__eje__alto."</td>
							<td>

								".$div1." ".$porcentaje__c__eje__alto."
									
							</td>

						</tr>

						<tr>

							<td>Número de eventos en los que participa al trimestre:</td>
							<td>".$eventos__eje__alto__parti."</td>
							<td>".$meta__eje__alto__parti."</td>
							<td>

								".$div2." ".$porcentaje__c__eje__alto__parti."
														
							</td>

						</tr>

						<tr>

							<td>Cantidad de implementación deportiva al $implementacionNombreTrimestre</td>
							<td>".$implementacion__de__eje__alto__meta."</td>
							<td>".$implementacion__de__eje__alto__resultado."</td>
							<td>

								".$div3." ".$porcentaje__c__implementacion__de__e__alto."

							</td>

						</tr>

						<tr>

							<td>Número de beneficiarios de capacitaciones deportivas:</td>
							<td>".$beneficiarios__de__eje__alto__meta."</td>
							<td>".$beneficiarios__de__eje__alto__resultado."</td>
							<td>
								
														
								".$div4." ".$porcentaje__c__beneficiarios__de__e__alto."
	
							</td>

						</tr>


						<tr>

							<td>Número de beneficiarios de eventos de preparación y competencias:</td>
							<td>".$preparacion__de__eje__alto__meta."</td>
							<td>".$preparacion__de__eje__alto__resultado."</td>
							<td>
								
								".$div5." ".$porcentaje__c__preparacion__de__e__alto."					

							</td>

						</tr>";

						if (!empty($indicadorArray)) {
							
							$indicadorArray__1 = explode(",", $indicadorArray);
							$metaProgramadaArray__1 = explode(",", $metaProgramadaArray);
							$metaResultadoArray__1 = explode(",", $metaResultadoArray);
							$porcentajeCumplimientoArray__1 = explode(",", $porcentajeCumplimientoArray);

							foreach ($indicadorArray__1 as $key => $value) {
								

								if ($porcentajeCumplimientoArray__1[$key]>=85) {
									
									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($porcentajeCumplimientoArray__1[$key]>=70 && $porcentajeCumplimientoArray__1[$key]<85){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($porcentajeCumplimientoArray__1[$key]<70){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}


								$documentoCuerpo.="

								<tr>

									<td>".$indicadorArray__1[$key]."</td>
									<td>".$metaProgramadaArray__1[$key]."</td>
									<td>".$metaResultadoArray__1[$key]."</td>
									<td>".$div1." ".$porcentajeCumplimientoArray__1[$key]."</td>

								</tr>

								";

							}

						}

					
			$documentoCuerpo.="</tbody>

				</table>

				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<th>
							NÚMERO DE MEDALLAS ALCANZAS EN EL TRIMESTRE:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>Oro</th>
						<td>".$oro__alto."</td>

						<th>Plata</th>
						<td>".$plata__alto."</td>

						<th>Bronce</th>
						<td>".$bronce__alto."</td>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<th>
							PRESENTAN INFORMACIÓN:
						</th>

					</tr>

				</table>


				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>

								<center>DETALLE</center>

							</th>


							<th>

								<center>CUMPLE</center>

							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>
								Reporte de resultados deportivo obtenidos en los eventos en los que participaron:
							</td>

							<td>

								".$reporte__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Listados de asistencia de atletas suscrito por los entrenadores o coordinador técnico:
							</td>

							<td>

								".$listados__tabla__alto."

							</td>

						</tr>


						<tr>

							<td>
								Informe médico y disciplinario de atletas:
							</td>

							<td>

								".$informe__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Registro fotográfico:
							</td>

							<td>

								".$registro__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Listado de asistentes de capacitaciones:
							</td>

							<td>

								".$asistentes__tabla__alto."

							</td>

						</tr>


						<tr>

							<td>
								Actas de entrega recepción de la implementación deportiva adquirida:
							</td>

							<td>

								".$actas__tabla__alto."

							</td>

						</tr>

						<tr>

							<td>
								Cumplimientos de los procesos de contratación del equipo técnico contratado en el trimestre:
							</td>

							<td>

								".$cumplimientos__tabla__alto."

							</td>

						</tr>

					</tbody>

				</table>

				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Observaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($observaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Recomendaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($recomendaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>ELABORADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
								<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>REVISADO Y APROBADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
								<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

				</table>

				";


		break;


		case  "pdf__seguimientos":


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/seguimiento/informeTecnico__seguimiento/";
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

				<table>

					<thead>

						<tr>

							<th style='width:10%!important;'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</th>


							<th style='width:80%!important;'>

								<center>
									
									COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA
									DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS

								</center>

							</th>

							<th style='width:10%!important; display:flex!important;'>

								<image src='images/titulo__principis__ministerios.png'/>

							</th>

						</tr>

					</thead>

				</table>

				<table style='width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

							<div style='font-size:10px!important; padding:.5em; background:#0d47a1; color:white!important;'>

							REPORTE DE SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> ( RSEP-<span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span>-<span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>)

							</div>

							</h1></center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							I PERÍODO EVALUADO

						</th>

						<th>

						AÑO

						</th>

						<td>

							".$periodo__evaluados__anuales."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th style='width:40%!important;'>

							NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style='width:60%!important;'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							RUC DE LA ORGANIZACIÓN:

						</th>

						<td>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							PRESIDENTE O REPRESENTANTE LEGAL:

						</th>

						<td>
							".$informacionCompletoDosI[0][nombreResponsablePoa]."
						</td>

					</tr>

					<tr>

						<th>

							CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							DIRECCIÓN COMPLETA:

						</th>

						<td>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							III. UBICACIÓN GEOGRÁFICA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							PROVINCIA

						</th>

						<td style='width:60%!important;'>
							".$provincia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							CANTÓN

						</th>

						<td>
							".$canton__organizacion__deportivas."
						</td>

					</tr>


					<tr>

						<th>

							PARROQUIA

						</th>

						<td>
							".$parroquia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							BARRIO

						</th>

						<td>
							".$barrio__organizacion__deportivas."
						</td>

					</tr>


				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							IV. ALINEACIÓN A LA PLANIFICACIÓN 

						</th>

					</tr>

				</table>


				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							ÁREA DE ACCIÓN:

						</th>

						<td style='width:60%!important;'>

							".$area__de__accion__llamados."

						</td>

					</tr>


					<tr>

						<th>

							OBJETIVO ESTRATÉGICO INSTITUCIONAL:

						</th>

						<td>

							".$objetivo__institucional__estrategicos."

						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							V. SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

						</th>

					</tr>

				</table>


				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>

							V.I PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>

							PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

						</th>

						<td>".$presupuesto__segun__poas."</td>

						<th>

							PERÍODO EVALUADO:

						</th>

						<td>".$periodo__evaluado."</td>

					</tr>

					<tr>

						<th>

							MONTO TRANSFERIDO + REMANENTE:

						</th>

						<td>".$monto__transferido__rema."</td>

						<th>

							MONTO DE EJECUCIÓN REPORTADO AL SEMESTRE:

						</th>

						<td>".$monto__reportado__tri."</td>

					</tr>


					<tr>

						<th>

							MONTO PROGRAMADO A EJECUTAR AL SEMESTRE (USD):

						</th>

						<td>".$monto__ejecutado__trimestre."</td>

						<th>

							% DE AVANCE AL SEMESTRE:

						</th>

						<td>".$avance__trimestre__porcentaje." </td>

					</tr>


				</table>


				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>

							% EJECUCIÓN ESPERADA EN RELACIÓN AL MONTO TOTAL:

						</th>


						<th>

							% EJECUCIÓN OBTENIDO EN RELACIÓN AL MONTO TOTAL:

						</th>

					</tr>


					<tr>

						<td>

							I SEMESTRE: ".$segundo__esperado."

						</td>


				";

				if (!empty($segundo__ejecucion)) {
					
					$documentoCuerpo.="

						<td>

							I SEMESTRE: ".$segundo__ejecucion."

						</td>

					</tr>

					";

				}else{

					$documentoCuerpo.="

						<td></td>

					</tr>

					";

				}



				$documentoCuerpo.="

					<tr>

						<td>

							II SEMSESTRE: ".$cuarto__esperado."

						</td>

				";

				if (!empty($cuarto__ejecucion)) {
					
					$documentoCuerpo.="

						<td>

							II SEMSESTRE: ".$cuarto__ejecucion."

						</td>

					</tr>

					";

				}else{

					$documentoCuerpo.="

						<td></td>

					</tr>

					";

				}

				$esigetfetes=$objeto->getObtenerInformacionGeneral("SELECT esigeft FROM poa_trimestrales WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';");

				$documentoCuerpo.="</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							V.II. RESUMEN DE EJECUCIÓN PRESUPUESTARIA DEL POA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

								EJECUCIÓN PRESUPUESTARIA DEL POA 

							</center>
							
						</th>

					</tr>

				</table>

				<table class='col col-12' border='1' style='border-collapse: collapse; margin-top:2em!important;'>

					<thead>

						<tr>

							<th><center>ACTIVIDADES</center></th>
							<th style='display:none!important;'><center>MONTO PLANIFICADO POA</center></th>
							<th><center>MONTO PROGRAMADO A<br>EJECUTAR AL<br>SEMESTRE</center></th>
							<th><center>MONTO DE EJECUCIÓN<br>REPORTADO AL<br>SEMESTRE</center></th>
							<th><center>% DE AVANCE<br>AL SEMESTRE</center></th>";

				if ($esigetfetes[0][esigeft]=="si") {
					$documentoCuerpo.="<th><center>MONTO DE<br>EJECUCIÓN EN<br>e-SIGEF2</center></th>
					<th><center>% DE AVANCE<br>AL SEMESTRE<br>EN e-SIGEF2</center></th>";
				}

			



			$documentoCuerpo.="

						</tr>

					</thead>

					<tbody>



			";

			$array = explode (',',$arrayPorcen);
			$array1 = explode (',',$arrayEsigefts);
			$array2 = explode (',',$arrayPorcenEsigefts);
			$arrayPorcen__inicializados__array = explode (',',$arrayPorcen__inicializados);

			$arrayPorcenEsigefts__programados__array = explode (',',$arrayPorcenEsigefts__programados);


			foreach ($seguimiento__objetos__dimencionales as $clave => $valor) {

				if (!empty($arrayPorcen__inicializados)) {
					
					if ($arrayPorcen__inicializados__array[$clave]>=85) {
						
						$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($arrayPorcen__inicializados__array[$clave]>=70 && $arrayPorcen__inicializados__array[$clave]<85){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($arrayPorcen__inicializados__array[$clave]<70){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


					}
				

				}else{

					if ($array[$clave]>=85) {
						
						$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($array[$clave]>=70 && $array[$clave]<85){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($array[$clave]<70){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}	

				}



				if ($array2[$clave]>=85) {
					
					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($array2[$clave]>=70 && $array2[$clave]<85){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($array2[$clave]<70){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}

				$documentoCuerpo.="

					<tr>";

					if ($valor[actividades]=="OPERACIÓN Y FUNCIONAMIENTO DE ORGANIZACIONES DEPORTIVAS Y ESCENARIOS DEPORTIVOS" && $aniosPeriodos__ingesos=='2022') {
						$documentoCuerpo.=	"<td><center>GESTIÓN ADMINISTRATIVA Y FUNCIONAMIENTO DE ESCENARIOS DEPORTIVOS</center></td>";
					}else if($valor[actividades]=="CAPACITACIÃ“N DEPORTIVA O DE RECREACIÓN" && $aniosPeriodos__ingesos=='2022'){

						$documentoCuerpo.=	"<td><center>CAPACITACIÓN DEPORTIVA O RECREATIVA</center></td>";

					}else{
						$documentoCuerpo.=	"<td><center>".$valor[actividades]."</center></td>";
					}

				

				$documentoCuerpo.=	"	<td style='display:none!important;'><center>".$valor[sumaPlanificacion]."</center></td>";

				if (empty($arrayPorcenEsigefts__programados)) {
					$documentoCuerpo.="<td ><center>".$valor[programado]."</center></td>";
				}else{
					$documentoCuerpo.="<td ><center>".$arrayPorcenEsigefts__programados__array[$clave]."</center></td>";
				}

				


				$documentoCuerpo.="	<td><center>".$valor[ejecutado]."</center></td>";

						if (!empty($arrayPorcen__inicializados)) {

							if ($arrayPorcen__inicializados__array[$clave]=="NaN") {
								$documentoCuerpo.="<td><center>-</center></td>";
							}else{
								$documentoCuerpo.="<td><center><span>".$div."</span>&nbsp;&nbsp;".$arrayPorcen__inicializados__array[$clave]."</center></td>";
							}


						}else{

							if ($array[$clave]=="NaN") {
								$documentoCuerpo.="<td><center>-</center></td>";
							}else{
								$documentoCuerpo.="<td><center><span>".$div."</span>&nbsp;&nbsp;".$array[$clave]."</center></td>";
							}


						}

						if ($esigetfetes[0][esigeft]=="si") {

						$documentoCuerpo.="<td><center>".$array1[$clave]."</center></td><td><center><span>".$div2."</span>&nbsp;&nbsp;".$array2[$clave]."</center></td>";

						}

						$documentoCuerpo.="
					</tr>	

				";

			}


			$documentoCuerpo.="

					</tbody>

					<tfoot>

						<tr>

							<th><center>Total</center></th>
							<th style='display:none!important;'><center>".round($planificadoSas,2)."</center></th>
							<th><center>".number_format($programadoSas,2)."</center></th>
							<th><center>".number_format($ejecutadoSas,2)."</center></th>";

							if ($procentajeSas=="NaN") {

								$documentoCuerpo.="<th><center>-</center></th>";

							}else{

								$documentoCuerpo.="<th><center>".number_format($procentajeSas,2)."</center></th>";

							}
						

		if ($esigetfetes[0][esigeft]=="si") {

			$documentoCuerpo.=	"<th><center>".number_format($montosExig,2)."</center></th>
							<th><center>".number_format($procentajeExigefSas,2)."</center></th>";

		}					

		$documentoCuerpo.=	"</tr>

					</tfoot>


				</table>

			";

			$documentoCuerpo.="

				
				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='width:10%!important;'>

							OBSERVACIONES
									
						</th>

					</tr>

					<tr>

						<td style='width:90%!important; text-align:justify!important;'>

							".nl2br($observaciones__seguimientos__cuadros__pdf)."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='width:10%!important;'>

							RECOMENDACIONES
									
						</th>

					</tr>

					<tr>

						<td style='width:90%!important; text-align:justify!important;'>

							".nl2br($recomendaciones__seguimientos__cuadros__pdf)."

						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ 2023
									
						</td>

					</tr>


				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>ELABORADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
								<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>REVISADO Y APROBADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
								<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

				</table>

			";



		break;

		case  "documento__declaracion__seguimientos":


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/declaracionTerminos/";
			$parametro2="declaracion";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			if (isset($fechaEnviare)) {
				$fecha_actual=$fechaEnviare;
			}

			$documentoCuerpo='<br><br><table><thead><tr><th><center>DECLARACIÓN DE RESPONSABILIDAD DEL CORRECTO USO DEL RECURSO PÚBLICO Y ENTREGA DE INFORMACIÓN PARA EL SEGUIMIENTO Y EVALUACIÓN</center></th></tr></thead></table>';

			$declaracion__maximo=$objeto->getObtenerInformacionGeneral("SELECT MAX(idDeclaracion) AS maximo FROM poa_seguimiento_declaracion WHERE perioIngreso='$aniosPeriodos__ingesos';");

			$documentoCuerpo.='<br><br><table><thead>tr><th align="right"><div style="text-align:left!important;">Fecha: '.$fecha_actual.'</div></th></tr><tr><th align="right"><div style="text-align:right!important;  position:relative; left:400%!important;">Declaración Nro. '.$declaracion__maximo[0][maximo].'</div></th></tr></thead></table><br><br>';

			$documentoCuerpo.='<table><tr><th>Aplicativo de Seguimiento y Evaluación al POA</th></tr></table><br><br>';

			$documentoCuerpo.='<table><tr><th style="width:30%!important;">Organización Deportiva:</th><td>'.$informacionCompleto[0][nombreOrganismo].'</td></tr><tr><th style="width:30%!important;">Número de RUC:</th><td>'.$informacionCompleto[0][ruc].'</td></tr><tr><th style="width:30%!important;">Correo Electrónico:</th><td>'.$informacionCompleto[0][correo].'</td></tr></table><br><br>';

			if($trimestreEvaluador=="primerTrimestre") {
				$variableTrimestral="Primer Trimestre";
			}else if($trimestreEvaluador=="segundoTrimestre"){
				$variableTrimestral="Segundo Trimestre";
			}else if($trimestreEvaluador=="tercerTrimestre"){
				$variableTrimestral="Tercer Trimestre";
			}else if($trimestreEvaluador=="cuartoTrimestre"){
				$variableTrimestral="Cuarto Trimestre";
			}


			$documentoCuerpo.='<table><tr><td style="text-align:justify!important;"><span style="font-weight:bold!important;">'.$informacionCompleto[0][nombreOrganismo].'</span> en el marco del Ciclo de Planificación de las organizaciones deportivas, realiza la entrega de la información de seguimiento y evaluación del Período <span style="font-weight:bold!important;">'.$variableTrimestral.' '.$aniosPeriodos__ingesos.' </span>; y, en cumplimiento a los principios de ética, probidad, buena fe, respeto al ordenamiento jurídico y a la autoridad legítima, entre otros, que rigen los deberes de las personas y la relación entre éstas y la administración pública; así como a lo establecido en el artículo 10 de la Ley Orgánica para la Optimización y Eficiencia de Trámites Administrativos respecto a la veracidad de la información: “Las entidades reguladas por esta Ley presumirán que las declaraciones, documentos y actuaciones de las personas efectuadas en virtud de trámites administrativos son verdaderas, bajo aviso a la o al administrado de que, en caso de verificarse lo contrario, el trámite y resultado final de la gestión podrán ser negados y archivados, o los documentos emitidos carecerán de validez alguna, sin perjuicio de las sanciones y otros efectos jurídicos establecidos en la ley. El listado de actuaciones anuladas por la entidad en virtud de lo establecido en este inciso estará disponible para las demás entidades del Estado (...)”, DECLARA que realizó el correcto uso del recurso púbico, cumplió con los lineamientos establecidos por esta cartera de Estado, y que la información y documentación proporcionada como respaldo del gasto conforme el presupuesto entregado por el MINISTERIO DEL DEPORTE, es veraz, auténtica, legítima, fidedigna y apegada a la normativa legal vigente, información que podrá ser verificada por los entes de control, sin perjuicio de la responsabilidad penal prevista en el artículo 328 del Código Orgánico Integral Penal y sobre la base de esta declaración.</td></tr></table><br><br>';

				$documentoCuerpo.='<table><tr><td style="text-align:justify!important;">En ese sentido, reconoce y acepta que el MINISTERIO DEL DEPORTE realizará los reportes de seguimiento y evaluación trimestral e informe de evaluación anual sobre la base de la información presentada y cuyo contenido son de su exclusiva responsabilidad. Razón por la cual la DECLARANTE libra y exonera de toda responsabilidad al MINISTERIO DEL DEPORTE y a sus funcionarios por los actos que ejecuten con sustento en la información y documentación proporcionadas por ella, y personalmente asume toda aquella responsabilidad y consecuencias derivadas de esta. Las obligaciones establecidas en este párrafo se mantendrán vigentes aún después de terminado el acto requerido por la Declarante y prescribirán con sujeción a las normas aplicables.</td></tr></table><br><br>';

				$documentoCuerpo.='<table><tr><th style="text-align:justify!important;">Atentamente,</th></tr></table><br><br>';

				$documentoCuerpo.='<table><tr><th style="text-align:justify!important;">'.$declaracionRepresentante[0][nombreResponsablePoa].' DE LA ORGANIZACIÓN DEPORTIVA '.$informacionCompleto[0][nombreOrganismo].'</th></tr></table><br><br>';

			if (!isset($fechaEnviare)) {
				$inserta=$objeto->getInsertaNormal('poa_seguimiento_declaracion', array("`idDeclaracion`, ","`documento`, ","`idOrganismo`, ","`fecha`, ","`trimestre`, ","`perioIngreso`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$trimestreEvaluador', ","'$aniosPeriodos__ingesos'"));	
			}

		

		break;

		/************************************* CONTRATACION RECURSOS PUBLICOS 2023  ***************************************/
		case  "documento__declaracion__seguimientos2023":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/declaracionTerminos/";
			$parametro2="DeclaracionRecursosPublicos__".$idOrganismo."__".$fecha_actual;	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			$documentoCuerpo='<br><br><table><thead><tr><th><center>DECLARACIÓN DE RESPONSABILIDAD DEL CORRECTO USO DEL RECURSO PÚBLICO Y ENTREGA DE INFORMACIÓN PARA EL SEGUIMIENTO Y EVALUACIÓN</center></th></tr></thead></table>';

			$declaracion__maximo=$objeto->getObtenerInformacionGeneral("SELECT MAX(idDeclaracion) AS maximo FROM poa_seguimiento_declaracion WHERE perioIngreso='$aniosPeriodos__ingesos';");
			if ($trimestreEvaluadorDos=="primerTrimestre") {
				$indentificador="I";
			}else if($trimestreEvaluadorDos=="segundoTrimestre"){
				$indentificador="II";
			}else if($trimestreEvaluadorDos=="tercerTrimestre"){
				$indentificador="III";
			}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
				$indentificador="IV";
			}

			
			if($trimestreEvaluadorDos=="primerTrimestre") {
				$variableTrimestral="Primer Trimestre";
			}else if($trimestreEvaluadorDos=="segundoTrimestre"){
				$variableTrimestral="Segundo Trimestre";
			}else if($trimestreEvaluadorDos=="tercerTrimestre"){
				$variableTrimestral="Tercer Trimestre";
			}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
				$variableTrimestral="Cuarto Trimestre";
			}

			$documentoCuerpo.='
			                <br><br><br>
							<table>
								<thead>
									<tr>
										<th style="width:30%!important";>DECLARACIÓN NRO. Nro.</th>
										<td>'.$declaracion__maximo[0][maximo].'</td>
									</tr>
									<tr>
										<th style="width:30%!important;">Fecha:</th>
										<td>'.$fecha_actual.'</td> 
									</tr>
									<tr>
										<th style="width:30%!important;">Hora:</th>
										<td>'.$hora_actual.'</td> 
									</tr>
								</thead>
							</table>
							<br>

							<table style="width:100%!important; margin-top:2em;">
								<thead>
									<tr>
										<th >
											<center>
											APLICATIVO DE SEGUIMIENTO Y EVALUACIÓN AL POA '.$aniosPeriodos__ingesos.' 
											</center>
										</th>
									</tr>									
								</thead>
							</table>
							<br>

							<table style="width:100%!important; margin-top:2em;">
								<thead>
									<tr>
										<th style="width:30%!important";>ORGANIZACIÓN DEPORTIVA:</th>
										<td>'.strtoupper($informacionCompleto[0][nombreOrganismo]).'</td>
									</tr>
									<tr>
										<th style="width:30%!important;">NÚMERO DE RUC:</th>
										<td>'.$informacionCompleto[0][ruc].'</td> 
									</tr>
									<tr>
										<th style="width:30%!important;">CORREO ELECTRÓNICO:</th>
										<td>'.$informacionCompleto[0][correo].'</td> 
									</tr>
								</thead>
							</table>
							<br>

							<table style="width:100%!important; margin-top:1em;">
								<thead>
									<tr>
									<th style="width:30%!important;">PERÍODO REPORTADO:</th>
									<td>'.$indentificador.' TRIMESTRE '.$aniosPeriodos__ingesos.'</td> 
									</tr>									
								</thead>
							</table>
							<br><br><br>
			';
		
	
			$documentoCuerpo.='<table><tr><td style="text-align:justify!important;"><span style="font-weight:bold!important;">'.$informacionCompleto[0][nombreOrganismo].'</span> en el marco del Ciclo de Planificación de las organizaciones deportivas, realiza la entrega de la información de seguimiento y evaluación del Período <span style="font-weight:bold!important;">'.$variableTrimestral.' '.$anio.' </span>; y, en cumplimiento a los principios de ética, probidad, buena fe, respeto al ordenamiento jurídico y a la autoridad legítima, entre otros, que rigen los deberes de las personas y la relación entre éstas y la administración pública; así como a lo establecido en el artículo 10 de la Ley Orgánica para la Optimización y Eficiencia de Trámites Administrativos respecto a la veracidad de la información: “Las entidades reguladas por esta Ley presumirán que las declaraciones, documentos y actuaciones de las personas efectuadas en virtud de trámites administrativos son verdaderas, bajo aviso a la o al administrado de que, en caso de verificarse lo contrario, el trámite y resultado final de la gestión podrán ser negados y archivados, o los documentos emitidos carecerán de validez alguna, sin perjuicio de las sanciones y otros efectos jurídicos establecidos en la ley. El listado de actuaciones anuladas por la entidad en virtud de lo establecido en este inciso estará disponible para las demás entidades del Estado (...)”, DECLARA que realizó el correcto uso del recurso púbico, cumplió con los lineamientos establecidos por esta cartera de Estado, y que la información y documentación proporcionada como respaldo del gasto conforme el presupuesto entregado por el MINISTERIO DEL DEPORTE, es veraz, auténtica, legítima, fidedigna y apegada a la normativa legal vigente, información que podrá ser verificada por los entes de control, sin perjuicio de la responsabilidad penal prevista en el artículo 328 del Código Orgánico Integral Penal y sobre la base de esta declaración.</td></tr></table><br>';

			$documentoCuerpo.='<table><tr><td style="text-align:justify!important;">En ese sentido, reconoce y acepta que el MINISTERIO DEL DEPORTE realizará los reportes de seguimiento y evaluación semestral e informe de evaluación anual sobre la base de la información presentada y cuyo contenido son de exclusiva responsabilidad de la organización deportiva.</td></tr></table><br>
			';
			$documentoCuerpo.='<table><tr><td style="text-align:justify!important;">Razón por la cual la DECLARANTE libra y exonera de toda responsabilidad al MINISTERIO DEL DEPORTE y a sus funcionarios por los actos que ejecuten con sustento en la información y documentación proporcionadas por ella, y personalmente asume toda aquella responsabilidad y consecuencias derivadas de esta. Las obligaciones establecidas en este párrafo se mantendrán vigentes aún después de terminado el acto requerido por la Declarante y prescribirán con sujeción a las normas aplicables.</td></tr></table><br>
			';

			$documentoCuerpo.='
			<table style="width:100%!important">
				<tr>
					<td style="text-align:justify!important;">
						Atentamente,
					</td>
				</tr>
			</table>
			<br><br><br><br><br>';

			$documentoCuerpo.='
						
			<table style="width:100%!important; margin-top:2em;">
				<thead>
					<tr>						
						<td>Firma:_____________________________</td> 
					</tr>
					<tr>
						<td>'.$declaracionRepresentante[0][nombreResponsablePoa].'</td>
					</tr>
					<tr>						
						<td>'.strtoupper($informacionCompleto[0][nombreOrganismo]).'</td>
					</tr>
				</thead>
			</table>
			';


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_declaracion', array("`idDeclaracion`, ","`documento`, ","`idOrganismo`, ","`fecha`, ","`trimestre`, ","`perioIngreso`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$trimestreEvaluador', ","'$aniosPeriodos__ingesos'"));	

		break;


		/******************************************************************************************************************/

		/************************************* CONTRATACION PUBLICA 2023  ***************************************/
				/*=======================================================
			=            Generar pdf Contratacion Publica           =
			=========================================================*/
		case "contratacion_publica":
			$parametro1="../../documentos/catalogoInforme/";
			$parametro2="DeclaracionResponsabilidadProcedimientoContratacionPublica__".$idOrganismo."__".$fecha_actual;	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/	
			// contadores

			if ($trimestreEvaluadorDos=="primerTrimestre") {
				$indentificador="I";
			}else if($trimestreEvaluadorDos=="segundoTrimestre"){
				$indentificador="II";
			}else if($trimestreEvaluadorDos=="tercerTrimestre"){
				$indentificador="III";
			}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
				$indentificador="IV";
			}

			$obtenerInformacion__1=$objeto->getObtenerInformacionGeneral("SELECT COUNT(a.idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idItemCatalogo=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo'  AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo='$idOrganismo'AND catalogo__elect='si' GROUP BY a.idOrganismo;");
			
			
			$declaracion__maximo=$objeto->getObtenerInformacionGeneral("SELECT MAX(idDeclaracion) AS maximo FROM poa_seguimiento_declaracion WHERE perioIngreso='$aniosPeriodos__ingesos';");
			$declaracion__maximo2=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,a.idActividad,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.julio+a.agosto+a.septiembre AS tercerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoTercer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeTercer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoTercero FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad;");
				
		



			$documentoCuerpo.="

							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>

										<center>

											DECLARACIÓN DE RESPONSABILIDAD DE PROCEDIMIENTOS DE CONTRATACIÓN PÚBLICA

										</center>

									</th>

								</tr>

							</table>

							<br><br>
							<table>
								<thead>
									<tr>
										<th style='width:30%!important';>DECLARACIÓN NRO. Nro.</th>
										<td>".$declaracion__maximo[0][maximo]."</td>
									</tr>
									<tr>
										<th style='width:30%!important;'>Fecha:</th>
										<td>".$fecha_actual."</td> 
									</tr>
									<tr>
										<th style='width:30%!important;'>Hora:</th>
										<td>".$hora_actual."</td> 
									</tr>
								</thead>
							</table>
							<br>


							<table style='width:100%!important; margin-top:2em;'>

								<tr>

									<th>
										<center>

										APLICATIVO DE SEGUIMIENTO Y EVALUACIÓN AL POA".$aniosPeriodos__ingesos."

										</center>
									
									</th>

								</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<thead>
									<tr>
										<th style='width:30%!important';>ORGANIZACIÓN DEPORTIVA:</th>
										<td>".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>
									</tr>
									<tr>
										<th style='width:30%!important;'>NÚMERO DE RUC:</th>
										<td>".$informacionCompleto[0][ruc]."</td> 
									</tr>
									<tr>
										<th style='width:30%!important;'>CORREO ELECTRÓNICO:</th>
										<td>".$informacionCompleto[0][correo]."</td> 
									</tr>
								</thead>

							</table>
							<br>
						
							<table style='width:100%!important; margin-top:2em;'>

								<thead>
									<tr>
										<th style='width:30%!important';>PERÍODO REPORTADO:</th>
										<td>".$indentificador." TRIMESTRE ".$aniosPeriodos__ingesos."</td>
									</tr>
								</thead>

							</table>

				
							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										En mi calidad de representante legal de la <span style='font-weight:bold!important;'>".$informacionCompleto[0][nombreOrganismo]."</span> CERTIFICO que los procedimientos de contratación pública EJECUTADOS y detallados para la adquisición de bienes, contratación de servicios, consultorías y obras a financiados con recursos públicos se encuentran de conformidad a lo establecido en la Ley Orgánica del Sistema Nacional de Contratación Pública, su Reglamento General de aplicación, resoluciones expedidas por el SERCOP y demás normativa legal vigente. Además, CONFIRMO que esta Organización Deportiva cumple con lo establecido en las Normas de Control Interno, Reglamento General Sustitutivo para la Administración, Utilización, Manejo y Control de los Bienes e Inventarios del Sector Público, Reglamento Sustitutivo para el Control de los Vehículos del Sector Público y demás normas emitidas por la Contraloría General del Estado.
									</td>
								</tr>
							</table>
							
							";
							

			////////////////////////////////////////////////////////
		
			$documentoCuerpo .= "<table class='table table-hover' border='1' style='margin-top:2em; width:100%;border-collapse: collapse!important;' cellpadding='5'>";

			for ($i=1; $i < 8; $i++) { 

				$valoresCatalogoContraloriaCantidad = $objeto->getObtenerInformacionGeneral("SELECT SUM(a.catalogo__elect__cantidad) AS '0',SUM(a.catalogo__subasta__cantidad) AS '1',SUM(a.catalogo__infima__cantidad) AS '2',SUM(a.catalogo__menorCuantia__cantidad) AS '3',SUM(a.catalogo__cotizacion__cantidad) AS '4',SUM(a.catalogo__licitacion__cantidad) AS '5',SUM(a.catalogo__menorCuantiaObras__cantidad) AS '6',SUM(a.catalogo__cotizacionObras__cantidad) AS '7',SUM(a.catalogo__licitacionObras__cantidad) AS '8',SUM(a.catalogo__precioObras__cantidad) AS '9',SUM(a.catalogo__contratacionDirecta__cantidad) AS '10',SUM(a.catalogo__contratacionListaCorta__cantidad) AS '11',SUM(a.catalogo__contratacionConcursoPu__cantidad) AS '12',(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades FROM poa_catalogo_contraloria_seguimiento as a  WHERE a.idOrganismo='$idOrganismo' AND a.idActividad='$i' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.trimestre = '$trimestreEvaluadorDos';");

				$valoresCatalogoContraloriaMonto = $objeto->getObtenerInformacionGeneral("SELECT SUM(a.catalogo__elect__monto) AS '0',SUM(a.catalogo__subasta__monto) AS '1',SUM(a.catalogo__infima__monto) AS '2',SUM(a.catalogo__menorCuantia__monto) AS '3',SUM(a.catalogo__cotizacion__monto) AS '4',SUM(a.catalogo__Licitacion__monto) AS '5',SUM(a.catalogo__menorCuantiaObras__monto) AS '6',SUM(a.catalogo__cotizacionObras__monto) AS '7',SUM(a.catalogo__licitacionObras__monto) AS '8',SUM(a.catalogo__precioObras__monto) AS '9',SUM(a.catalogo__contratacionDirecta__monto) AS '10',SUM(a.catalogo__contratacionListaCorta__monto) AS '11',SUM(a.catalogo__contratacionConcursoPu__monto) AS '12',(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades FROM poa_catalogo_contraloria_seguimiento as a  WHERE a.idOrganismo='$idOrganismo' AND a.idActividad='$i' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.trimestre = '$trimestreEvaluadorDos';");


				$numFilas = count($valoresCatalogoContraloriaCantidad);
				$numColumnas = count($valoresCatalogoContraloriaCantidad[0]);

				if($valoresCatalogoContraloriaCantidad[0][nombreActividades] != ""){
					
					$documentoCuerpo .= "
						<tr style = 'background:#e8edff'><th colspan='4'>".$valoresCatalogoContraloriaCantidad[0][nombreActividades]."</th></tr>
						<tr style = 'background:#e8edff;width:100%!importan;'>
							<th style = 'background:#e8edff;width:100%!importan;' colspan='2'>Tipo Contratación</th>
							<th style = 'background:#e8edff;width:100%!importan;'>Cantidad</td>
							<th style = 'background:#e8edff;width:100%!importan;'>Monto</td>
						</tr>";
					$Total=0;
					$Total2=0;
					for ($fila = 0; $fila < $numFilas; $fila++) {
						for ($columna = 0; $columna < $numColumnas; $columna++) {
							
							if ($valoresCatalogoContraloriaCantidad[$fila][$columna] > 0 || $valoresCatalogoContraloriaMonto[$fila][$columna] > 0){
								$valor = obtenerValor($fila,$columna);

								$valor1 = $valoresCatalogoContraloriaCantidad[$fila][$columna];
								$valor2 = $valoresCatalogoContraloriaMonto[$fila][$columna];
								$documentoCuerpo .= "<tr>";
								$documentoCuerpo .= "<td colspan='2'>$valor</td>";
								$documentoCuerpo .= "<td>$valor1</td>";
								$documentoCuerpo .= "<td>$valor2</td>";
								$documentoCuerpo .= "</tr>";
								$Total += $valor1;
								$Total2 += $valor2;
							}
								
						}
					}

					$documentoCuerpo .= "<tr><td colspan='2'>Total</td><td>$Total</td><td>$Total2</td></tr>";
					
				}
			
			
			}

			$documentoCuerpo .= "</table>";
		

									$documentoCuerpo.='
									<br><br><br>
									<table>
										<tr>
											<td style="text-align:justify!important;">
											La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad de esta organización deportiva conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública.
											Lo antes mencionado en virtud de que recibimos recursos públicos.
											
											</td>
										</tr>
									</table>
									<br>
									<table>
										<tr>
											<td style="text-align:justify!important;">
												A través de lo reportado esta organización deportiva no incurre en la recurrencia de ínfimas cuantías y los procedimientos de contratación pública planificados se encuentran acorde con una misma naturaleza del gasto y montos anuales a contratarse. 
											</td>
										</tr>
									</table>
									<br>
									';
									$documentoCuerpo.='
									<table style="width:100%!important">
										<tr>
											<td style="text-align:justify!important;">
												Atentamente,
											</td>
										</tr>
									</table>
									<br>';
									$documentoCuerpo.='
									<br><br><br>			
									<table style="width:100%!important; margin-top:2em;">
										<thead>
											<tr>						
												<td>Firma:_____________________________</td> 
											</tr>
											<tr>
												<td>'.$declaracionRepresentante[0][nombreResponsablePoa].'</td>
											</tr>
											<tr>						
												<td>'.strtoupper($informacionCompleto[0][nombreOrganismo]).'</td>
											</tr>
										</thead>
									</table>
									<br><br><br><br>
									';

			

		break;


		/******************************************************************************************************************/

		case  "documento__seguimiento__final":

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/final__seguimiento/";
			$parametro2="finalSeguiiento";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/

			$auxiliar=" ";

			if ($trimestreEvaluadorDos=="primerTrimestre") {
				$indentificador="I";
			}else if($trimestreEvaluadorDos=="segundoTrimestre"){
				$indentificador="II";
			}else if($trimestreEvaluadorDos=="tercerTrimestre"){
				$indentificador="III";
			}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
				$indentificador="IV";
			}

			$documentoCuerpo='

				<table  border="1">

					<thead>

						<tr>

							<th style="font-size:12px;"><center>Actividad '.$indentificador.'</center></th>
							<th style="font-size:12px;"><center>Ítem '.$indentificador.'</center></th>
							<th style="font-size:12px;"><center>Planificado trimestre '.$indentificador.'</center></th>
							<th style="font-size:12px;"><center>Programado trimestre '.$indentificador.'</center></th>
							<th style="font-size:12px;"><center>Ejecutado trimestre '.$indentificador.'</center></th>
							<th style="font-size:12px;"><center>Porcentaje de avance % trimestre '.$indentificador.'</center></th>

						</tr>

					</thead>

					<tbody>


				';

				if($trimestreEvaluadorDos=="primerTrimestre") {

					foreach ($seguimiento__en as $clave => $valor) {

						$variableAr=$seguimiento__en[$clave][nombreActividades];

						$sumaPrimer =0;
						$sumaPrimer = floatval($seguimiento__en[$clave][sumaPrimerCapacitacion]) + floatval($seguimiento__en[$clave][sumaPrimerCompetencia]) + floatval($seguimiento__en[$clave][sumaPrimerImplementacion]) + floatval($seguimiento__en[$clave][sumaPrimerMantenimiento]) + floatval($seguimiento__en[$clave][sumaPrimerRecreacion]) + floatval($seguimiento__en[$clave][sumaPrimerRecreativos]) + floatval($seguimiento__en[$clave][sumaPrimerAdministrativo]);

						if(floatval($sumaPrimer)>0){

							$sumaPrimer=$sumaPrimer;

						}else{

							$sumaPrimer=0;

						}

						if (empty($seguimiento__en[$clave][programadoPrimer])) {
							$seguimiento__en[$clave][programadoPrimer]="0.00";
						}
						
						if (empty($seguimiento__en[$clave][porcentajePrimer])) {
							$seguimiento__en[$clave][porcentajePrimer]="0.00";
						}

						if ($auxiliar==$variableAr) {

							$documentoCuerpo.='<tr><td style="font-size:10px;"> </td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][primerTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoPrimer].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoPrimer], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajePrimer].'</center></td></tr>';
							$auxiliar=$variableAr;

						}else{

							$documentoCuerpo.='<tr><th style="font-size:10px;" colspan="1">'.$variableAr.'</th><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][primerTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoPrimer].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoPrimer], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajePrimer].'</center></td></tr>';
							$auxiliar=$variableAr;

						}
						

					}

				}else if($trimestreEvaluadorDos=="segundoTrimestre"){

					foreach ($seguimiento__en as $clave => $valor) {

						$variableAr=$seguimiento__en[$clave][nombreActividades];

						$sumaSegundo =0;
						$sumaSegundo = floatval($seguimiento__en[$clave][sumaSegundoCapacitacion]) + floatval($seguimiento__en[$clave][sumaSegundoCompetencia]) + floatval($seguimiento__en[$clave][sumaSegundoImplementacion]) + floatval($seguimiento__en[$clave][sumaSegundoMantenimiento]) + floatval($seguimiento__en[$clave][sumaSegundoRecreacion]) + floatval($seguimiento__en[$clave][sumaSegundoRecreativos]) + floatval($seguimiento__en[$clave][sumaSegundoAdministrativo]);

						if(floatval($sumaSegundo)>0){

							$sumaSegundo=$sumaSegundo;

						}else{

							$sumaSegundo=0;

						}

						if (empty($seguimiento__en[$clave][programadoSegundo])) {
							$seguimiento__en[$clave][programadoSegundo]="0.00";
						}
						
						if (empty($seguimiento__en[$clave][porcentajeSegundo])) {
							$seguimiento__en[$clave][porcentajeSegundo]="0.00";
						}

						if ($auxiliar==$variableAr) {

							$documentoCuerpo.='<tr><td style="font-size:10px;"> </td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][segundoTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoSegundo].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoSegundo], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajeSegundo].'</center></td></tr>';
							$auxiliar=$variableAr;

						}else{

							$documentoCuerpo.='<tr><th style="font-size:10px;" colspan="1">'.$variableAr.'</th><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][segundoTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoSegundo].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoSegundo], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajeSegundo].'</center></td></tr>';
							$auxiliar=$variableAr;

						}
						

					}


				}else if($trimestreEvaluadorDos=="tercerTrimestre"){

					foreach ($seguimiento__en as $clave => $valor) {

						$variableAr=$seguimiento__en[$clave][nombreActividades];

						$sumaTercer =0;
						$sumaTercer = floatval($seguimiento__en[$clave][sumaTercerCapacitacion]) + floatval($seguimiento__en[$clave][sumaTercerCompetencia]) + floatval($seguimiento__en[$clave][sumaTercerImplementacion]) + floatval($seguimiento__en[$clave][sumaTercerMantenimiento]) + floatval($seguimiento__en[$clave][sumaTercerRecreacion]) + floatval($seguimiento__en[$clave][sumaTercerRecreativos]) + floatval($seguimiento__en[$clave][sumaTercerAdministrativo]);

						if(floatval($sumaTercer)>0){

							$sumaTercer=$sumaTercer;

						}else{

							$sumaTercer=0;

						}

						if (empty($seguimiento__en[$clave][programadoTercer])) {
							$seguimiento__en[$clave][programadoTercer]="0.00";
						}
						
						if (empty($seguimiento__en[$clave][porcentajeTercer])) {
							$seguimiento__en[$clave][porcentajeTercer]="0.00";
						}

						if ($auxiliar==$variableAr) {

							$documentoCuerpo.='<tr><td style="font-size:10px;"> </td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][tercerTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoTercer].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoTercero], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajeTercer].'</center></td></tr>';
							$auxiliar=$variableAr;

						}else{

							$documentoCuerpo.='<tr><th style="font-size:10px;" colspan="1">'.$variableAr.'</th><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][tercerTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoTercer].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoTercero], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajeTercer].'</center></td></tr>';
							$auxiliar=$variableAr;

						}
						

					}

					
				}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
						

					foreach ($seguimiento__en as $clave => $valor) {

						$variableAr=$seguimiento__en[$clave][nombreActividades];

						$sumaCuarto =0;
						$sumaCuarto = floatval($seguimiento__en[$clave][sumaCuartoCapacitacion]) + floatval($seguimiento__en[$clave][sumaCuartoCompetencia]) + floatval($seguimiento__en[$clave][sumaCuartoImplementacion]) + floatval($seguimiento__en[$clave][sumaCuartoMantenimiento]) + floatval($seguimiento__en[$clave][sumaCuartoRecreacion]) + floatval($seguimiento__en[$clave][sumaCuartoRecreativos]) + floatval($seguimiento__en[$clave][sumaCuartoAdministrativo]);

						if(floatval($sumaCuarto)>0){

							$sumaCuarto=$sumaCuarto;

						}else{

							$sumaCuarto=0;

						}

						if (empty($seguimiento__en[$clave][programadoCuarto])) {
							$seguimiento__en[$clave][programadoCuarto]="0.00";
						}
						
						if (empty($seguimiento__en[$clave][porcentajeCuarto])) {
							$seguimiento__en[$clave][porcentajeCuarto]="0.00";
						}

						if ($auxiliar==$variableAr) {

							$documentoCuerpo.='<tr><td style="font-size:10px;"> </td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][cuartoTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoCuarto].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoCuarto], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajeCuarto].'</center></td></tr>';
							$auxiliar=$variableAr;

						}else{

							$documentoCuerpo.='<tr><th style="font-size:10px;" colspan="1">'.$variableAr.'</th><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][cuartoTrimestre],2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][programadoCuarto].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en[$clave][ejecutadoCuarto], 2).'</center></td><td style="font-size:10px;"><center>'.$seguimiento__en[$clave][porcentajeCuarto].'</center></td></tr>';
							$auxiliar=$variableAr;

						}
						

					}

					
				}

			$documentoCuerpo.='

					</tbody>

				</table>';

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_docuento_final', array("`idDocumento_seguimiento`, ","`documento`, ","`idOrganismo`, ","`fecha`, ","`perioIngreso`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));	


		break;

		case  "documento__seguimiento__final2": 
			
			/*===================================
			=            Generar pdf            =
			===================================*/

			// $parametro1="../../documentos/final__seguimiento/";
			// $parametro2="InformeFinalSeguimiento__".$idOrganismo."__".$fecha_actual."__".$hora_actual."__".$hora_actual2;	
			// $parametro3=$idOrganismo."__".$fecha_actual."__".$hora_actual."__".$hora_actual2;
			$parametro1=VARIABLE__BACKEND."final__seguimiento/";
			$parametro2=$idOrganismo."__"."finalSeguimiento"."__"."$trimestreEvaluadorDos"."__".$fecha_actual;	
			$parametro3=$idOrganismo."__"."finalSeguimiento"."__"."$trimestreEvaluadorDos"."__".$fecha_actual;
			/*=====  End of Generar pdf  ======*/
			
			$auxiliar=" ";

			if ($trimestreEvaluadorDos=="primerTrimestre") {
				$indentificador="I";
			}else if($trimestreEvaluadorDos=="segundoTrimestre"){
				$indentificador="II";
			}else if($trimestreEvaluadorDos=="tercerTrimestre"){
				$indentificador="III";
			}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
				$indentificador="IV";
			}

			
		
			$documentoCuerpo=' <div style="text-align:center!important;"><h1>RESUMEN DE EJECUCIÓN REPORTADA</h1>
			<h1>'.$indentificador.' TRIMESTRE '.$aniosPeriodos__ingesos.'</h1></div>

			<div style="text-align:justify!important;">
					<h2>FECHA:                   '.$fecha_actual.' </h2>
					<h2>ORGANIZACIÓN DEPORTIVA:  '.strtoupper($informacionCompleto[0][nombreOrganismo]).' </h2>  
					<h2>NÚMERO DE RUC:           '.$informacionCompleto[0][ruc].' </h2>
			</div>
		

				<table  border="1">
						<thead>
							<tr style = "background:#e8edff">
								<th style="font-size:12px;"><center>Actividad</center></th>
								<th style="font-size:12px;"><center>Ítem</center></th>
								<th style="font-size:12px;"><center>Planificado</center></th>							
								<th style="font-size:12px;"><center>Ejecutado</center></th>
								<th style="font-size:12px;"><center>Porcentaje de avance trimestral % </center></th>
							</tr>
						</thead>
					<tbody>
				';				

				
				if($trimestreEvaluadorDos!="") {
					$sumaTotalPlanificado1=0;
					$sumaTotalEjecutado1=0;

					foreach ($seguimiento__en2 as $clave => $valor) {

						$variableAr=$seguimiento__en2[$clave][nombreActividades];
						$sumaColumplanificadoValor=$seguimiento__en2[$clave][Trimestre];
						$sumaColumEjecutadoValor=$seguimiento__en2[$clave][ejecutadoPrimer];

						$sumaPrimer =0;
						$sumaPrimer = floatval($seguimiento__en2[$clave][sumaPrimerCapacitacion]) + floatval($seguimiento__en2[$clave][sumaPrimerCompetencia]) + floatval($seguimiento__en2[$clave][sumaPrimerImplementacion]) + floatval($seguimiento__en2[$clave][sumaPrimerMantenimiento]) + floatval($seguimiento__en2[$clave][sumaPrimerRecreacion]) + floatval($seguimiento__en2[$clave][sumaPrimerRecreativos]) + floatval($seguimiento__en2[$clave][sumaPrimerAdministrativo]);

						if(floatval($sumaPrimer)>0){

							$sumaPrimer=$sumaPrimer;

						}else{

							$sumaPrimer=0;

						}

						// if (empty($seguimiento__en2[$clave][programadoPrimer])) {
						// 	$seguimiento__en2[$clave][programadoPrimer]="0.00";
						// }
						
						// if (empty($seguimiento__en2[$clave][porcentajePrimer])) {
						// 	$seguimiento__en2[$clave][porcentajePrimer]="0.00";
						// }

						if ($auxiliar==$variableAr) {


							// if($seguimiento__en2[$clave][ejecutadoPrimer] == 0 || ( $seguimiento__en2[$clave][ejecutadoPrimer] == 0 && $seguimiento__en2[$clave][Trimestre] >= 0) || ( $seguimiento__en2[$clave][ejecutadoPrimer] == 0 && $seguimiento__en2[$clave][Trimestre] == 0)){
							// 	$totalPorcentajeAvance3_22 ="----";
							// }else{
							// 	$totalPorcentajeAvance3_22 = ($seguimiento__en2[$clave][ejecutadoPrimer]/$seguimiento__en2[$clave][Trimestre])*100;
							// }

							if($seguimiento__en2[$clave][Trimestre] > 0){
								
								$totalPorcentajeAvance3_22 = ($seguimiento__en2[$clave][ejecutadoPrimer]/$seguimiento__en2[$clave][Trimestre])*100;
							}else{
								$totalPorcentajeAvance3_22 ="----";
							}
						
							if ($seguimiento__en2[$clave][Trimestre] > 0) {
								
								if($totalPorcentajeAvance3_22>= 70){
									$coloresPorcentaje3='green';
								}else if ($totalPorcentajeAvance3_22>= 40 && $totalPorcentajeAvance3_22 < 70) {
									$coloresPorcentaje3='orange';
								}else if ($totalPorcentajeAvance3_22 < 40) {
									$coloresPorcentaje3='red';
								}
							}else{
								$coloresPorcentaje3='';
							}

							if($totalPorcentajeAvance3_22 >= 0){
								$signoPorcentaje = "%";
							}else{
								$signoPorcentaje = "";
							}

							$documentoCuerpo.='<tr><td style="font-size:10px;"> </td><td style="font-size:10px;"><center>'.$seguimiento__en2[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en2[$clave][Trimestre],2).'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en2[$clave][ejecutadoPrimer], 2).'</center></td>';

							if($seguimiento__en2[$clave][Trimestre] > 0){
								
								$documentoCuerpo.='<td style="font-size:10px;"><center><input type="text" class="input-circulo" readonly style="width: 1px; height: 1px; border-radius: 50%; border: none;padding: 8px;text-align: center; background:'.$coloresPorcentaje3.'">'.number_format($totalPorcentajeAvance3_22,2).'' .$signoPorcentaje.'</center></td></tr>';
							}else{
								$totalPorcentajeAvance3_22 ="----";
								$signoPorcentaje ="";
								$documentoCuerpo.='<td style="font-size:10px;"><center><input type="text" class="input-circulo" readonly style="width: 1px; height: 1px; border-radius: 50%; border: none;padding: 8px;text-align: center; background:'.$coloresPorcentaje3.'">'.$totalPorcentajeAvance3_22.'' .$signoPorcentaje.'</center></td></tr>';
							}
							$auxiliar=$variableAr;

						}else{

							
							
							if($seguimiento__en2[$clave][Trimestre] > 0){
					
								$totalPorcentajeAvance3_2 = ($seguimiento__en2[$clave][ejecutadoPrimer]/$seguimiento__en2[$clave][Trimestre])*100;

							}else{
								$totalPorcentajeAvance3_2 ="----";
							}

							if ($seguimiento__en2[$clave][Trimestre] > 0) {
								
								if($totalPorcentajeAvance3_2>= 70){
									$coloresPorcentaje3='green';
								}else if ($totalPorcentajeAvance3_2>= 40 && $totalPorcentajeAvance3_2 < 70) {
									$coloresPorcentaje3='orange';
								}else if ($totalPorcentajeAvance3_2 < 40) {
									$coloresPorcentaje3='red';
								}

							}else{
								$coloresPorcentaje3='';
							}

							if($totalPorcentajeAvance3_2 >= 0){
								$signoPorcentaje = "%";
							}else{
								$signoPorcentaje = "";
							}

							$sumaTotalPlanificado1BP = $seguimiento__en2[$i][Trimestre];
							$sumaTotalEjecutado1BE = $seguimiento__en2[$i][ejecutadoPrimer];

							$documentoCuerpo.='<tr><th style="font-size:10px;" colspan="1">'.$variableAr.'</th><td style="font-size:10px;"><center>'.$seguimiento__en2[$clave][nombreItem].'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en2[$clave][Trimestre],2).'</center></td><td style="font-size:10px;"><center>'.number_format($seguimiento__en2[$clave][ejecutadoPrimer], 2).'</center></td>';

							if($seguimiento__en2[$clave][Trimestre] > 0){
								
								$documentoCuerpo.='<td style="font-size:10px;"><center><input type="text" class="input-circulo" readonly style="width: 1px; height: 1px; border-radius: 50%; border: none;padding: 8px;text-align: center; background:'.$coloresPorcentaje3.'">'.number_format($totalPorcentajeAvance3_2, 2).'' .$signoPorcentaje.'</center></td></tr>';
							}else{
								$totalPorcentajeAvance3_2 ="----";
								$signoPorcentaje ="";
								$documentoCuerpo.='<td style="font-size:10px;"><center><input type="text" class="input-circulo" readonly style="width: 1px; height: 1px; border-radius: 50%; border: none;padding: 8px;text-align: center; background:'.$coloresPorcentaje3.'">'.$totalPorcentajeAvance3_2.'' .$signoPorcentaje.'</center></td></tr>';
							}

							$auxiliar=$variableAr;

						}
						$sumaTotalPlanificado1 += $sumaColumplanificadoValor;
						$sumaTotalEjecutado1 += $sumaColumEjecutadoValor;	

					}
					
					$totalPorcentajeAvance1 = ($sumaTotalEjecutado1/$sumaTotalPlanificado1)*100;
						
					


					if ($sumaTotalPlanificado1 > 0) {
						
						if($totalPorcentajeAvance1>= 70){
							$coloresPorcentaje3='green';
						}else if ($totalPorcentajeAvance1>= 40 && $totalPorcentajeAvance1 < 70) {
							$coloresPorcentaje3='orange';
						}else if ($totalPorcentajeAvance1 < 40) {
							$coloresPorcentaje3='red';
						}
					}else{
						$coloresPorcentaje3='';
					}

					if($totalPorcentajeAvance1 >= 0){
						$signoPorcentaje = "%";
					}else{
						$signoPorcentaje = "";
					}

					$documentoCuerpo.='<tr><th style="font-size:10px;" colspan="2"><span style="font-weight:bold!important;">'."TOTAL".'</span></th><td style="font-size:10px;"><center><span style="font-weight:bold!important;">'.number_format($sumaTotalPlanificado1,2).'</sapn></center></td><td style="font-size:10px;"><center><span style="font-weight:bold!important;">'.number_format($sumaTotalEjecutado1, 2).'</span></center></td>';


					if($sumaTotalPlanificado1 > 0){
						
						$documentoCuerpo.='<td style="font-size:10px;"><center><input type="text" class="input-circulo" readonly style="width: 1px; height: 1px; border-radius: 50%; border: none;padding: 8px;text-align: center; background:'.$coloresPorcentaje3.'"><span style="font-weight:bold!important;">'.number_format($totalPorcentajeAvance1, 2).''.$signoPorcentaje.'</span></center></td></tr>';
					}else{
						$totalPorcentajeAvance1 ="----";
						$signoPorcentaje ="";
						$documentoCuerpo.='<td style="font-size:10px;"><center><input type="text" class="input-circulo" readonly style="width: 1px; height: 1px; border-radius: 50%; border: none;padding: 8px;text-align: center; background:'.$coloresPorcentaje3.'">'.$totalPorcentajeAvance1.'' .$signoPorcentaje.'</center></td></tr>';
					}
				}
				
				$documentoCuerpo.='

					</tbody>

				</table>';
				
				if($btnEnviar == 1){

					$inserta=$objeto->getInsertaNormal('poa_seguimiento_docuento_final', array("`idDocumento_seguimiento`, ","`documento`, ","`idOrganismo`, ","`fecha`, ", "`perioIngreso`, ","`trimestre`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ", "'$aniosPeriodos__ingesos', ","'$trimestreEvaluadorDos'"));
				}

			// if($btnEnviar == 1){
			// 	$inserta=$objeto->getInsertaNormal('poa_seguimiento_docuento_final', array("`idDocumento_seguimiento`, ","`documento`, ","`idOrganismo`, ","`fecha`, ", "`perioIngreso`, ","`trimestre`"),array("'$parametro3.pdf', ","'$idOrganismo', ","'$fecha_actual', ", "'$aniosPeriodos__ingesos', ","'$trimestreEvaluadorDos'"));
			// }

			// $conexionRecuperada= new conexion();
			// $conexionEstablecida=$conexionRecuperada->cConexion();			
			// if($btnEnviar == 2){
			// 	$query="INSERT INTO `poa_seguimiento_docuento_final`(`documento`, `idOrganismo`, `fecha`, `trimestre`, `perioIngreso`) VALUES ('$parametro3.pdf','$idOrganismo','$fecha_actual','$trimestreEvaluadorDos','$aniosPeriodos__ingesos')";
			// }
			// $resultado= $conexionEstablecida->exec($query);
			//  $mensaje=1;
			//  $jason['mensaje']=$mensaje;

			

		break;

		case  "resolucionAprobacion":

			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center" style="font-weight:bold;">CONSIDERANDO: </th>

				</tr>

			</table>';

			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 226 de la Constitución de la República del Ecuador señala que: “Las instituciones del Estado, sus organismos, dependencias, las servidoras o servidores públicos y las personas que actúen en virtud de una potestad estatal ejercerán solamente las competencias y facultades que les sean atribuidas en la Constitución y la ley. Tendrán el deber de coordinar acciones para el cumplimiento de sus fines y hacer efectivo el goce y ejercicio de los derechos reconocidos en la Constitución”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el inciso segundo del artículo 297 de la Constitución de la República del Ecuador señala que: “Las instituciones y entidades que reciban o transfieran bienes o recursos públicos se someterán a las normas que las regulan y a los principios y procedimientos de transparencia, rendición de cuentas y control público.”; 

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 381 de Constitución de la República del Ecuador dispone:  “El Estado protegerá, promoverá y coordinará la cultura física que comprende el deporte, la educación física y la recreación, como actividades que contribuyen a la salud, formación y desarrollo integral de las personas; impulsará el acceso masivo al deporte y a las actividades deportivas a nivel formativo, barrial y parroquial; auspiciará la preparación y participación de los deportistas en competencias nacionales e internacionales, que incluyen los Juegos Olímpicos y Paraolímpicos; y fomentará la participación de las personas con discapacidad. El Estado garantizará los recursos y la infraestructura necesaria para estas actividades. Los recursos se sujetarán al control estatal, rendición de cuentas y deberán distribuirse en forma equitativa”; 

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 5 del Código Orgánico de Planificación y Finanzas Públicas establece: “Para la aplicación de las disposiciones contenidas en el presente Código, se observarán los siguientes principios: 1. Sujeción a la planificación. - “La programación, formulación, aprobación, asignación, ejecución, seguimiento y evaluación del Presupuesto General del Estado, los demás presupuestos de las entidades públicas y todos los recursos públicos, se sujetarán a los lineamientos de la planificación del desarrollo de todos los niveles de gobierno, en observancia a lo dispuesto en los artículos 280 y 293 de la Constitución de la República”; 

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 65 del Código Orgánico Administrativo señala: “La competencia es la medida en la que la Constitución y la ley habilitan a un órgano para obrar y cumplir sus fines, en razón de la materia, el territorio, el tiempo y el grado.”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 13 de la Ley del Deporte, Educación Física y Recreación establece: “El Ministerio Sectorial es el órgano rector y planificador del deporte, educación física y recreación y le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, leyes, instrumentos internacionales y reglamentos aplicables. (…)”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 14 de la Ley del Deporte, Educación Física y Recreación señala: "Las funciones y atribuciones del ministerio son: (...) c) Supervisar y evaluar a las organizaciones deportivas en el cumplimiento de esta Ley y en el correcto uso y destino de los recursos públicos que reciban del Estado, debiendo notificar a la Contraloría General del Estado en el ámbito de sus competencias”; 

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 19 de la  Ley del Deporte, Educación Física y Recreación  establece: "Las organizaciones deportivas que reciban recursos públicos, tendrán la obligación de presentar toda la información pertinente a su gestión financiera, técnica y administrativa al Ministerio Sectorial en el plazo que el reglamento determine”;

					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 23 de la Ley del Deporte, Educación Física y Recreación establece: "Las organizaciones deportivas reguladas en esta Ley, podrán implementar mecanismos para la obtención de recursos propios los mismos que deberán ser obligatoriamente reinvertidos en el deporte, educación física y/o recreación, así como también, en la construcción y mantenimiento de infraestructura. // Los recursos de autogestión generados por las organizaciones deportivas serán sujetos de auditoría privada anual y sus informes deberán ser remitidos durante el primer trimestre de cada año, los mismos que serán sujetos de verificación por parte del Ministerio Sectorial”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>,  el artículo 130 de la Ley del Deporte, Educación Física y Recreación indica: “(…) La distribución de los fondos públicos a las organizaciones deportivas estará a cargo del Ministerio Sectorial y se realizará de acuerdo a su política, su presupuesto, la planificación anual aprobada enmarcada en el Plan Nacional del Buen Vivir y la Constitución. // Para la asignación presupuestaria desde el deporte formativo hasta de alto rendimiento, se considerarán los siguientes criterios: calidad de gestión sustentada en una matriz de evaluación, que incluya resultados deportivos, impacto social del deporte y su potencial desarrollo, así como la naturaleza de cada organización. Para el caso de la provincia de Galápagos se considerará los costos por su ubicación geográfica. // Para la asignación presupuestaria a la educación física y recreación, se considerarán los siguientes criterios: de igualdad, número de beneficiarios potenciales, el índice de sedentarismo de la localidad y su nivel socioeconómico, así como la naturaleza de cada organización y la infraestructura no desarrollada. (...)”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>,  el artículo 134 de la Ley del Deporte, Educación Física y Recreación establece: "El Ministerio Sectorial realizará las transferencias a las organizaciones deportivas de forma mensual y de conformidad a la planificación anual previamente aprobada por el mismo, la política sectorial y el Plan Nacional de Desarrollo. (...)";

					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>,  el artículo 138 de la Ley del Deporte, Educación Física y Recreación indica: “Las organizaciones deportivas deberán presentar una evaluación semestral de su planificación anual de acuerdo a la metodología establecida por el Ministerio Sectorial y con los documentos y materiales que prueben la ejecución de los proyectos, en el plazo indicado por el mismo.";

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>,  el artículo 173 de la Ley del Deporte, Educación Física y Recreación establece: “Se contemplan tres tipos de sanciones económicas, a saber:
						<div></div>
						<div>a) Multas;</div>
						<div>b) Suspensión temporal de asignaciones presupuestarias; y,</div>
						<div>c) Retiro definitivo de asignaciones presupuestarias. </div>
						<div>
							No se podrá suspender temporal o definitivamente las asignaciones presupuestarias, sin que previamente se hayan aplicado las multas correspondientes; sin embargo, en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia.”;
						</div>

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>,  el artículo 66 del Reglamento Sustitutivo al Reglamento General de la Ley del Deporte, Educación Física y Recreación indica: “Las organizaciones deberán presentar a la Entidad Rectora del Deporte sus planificaciones, hasta 15 días luego de notificado el techo presupuestario por parte de la Entidad Rectora del Deporte”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>,  el artículo 1 del Decreto Ejecutivo Nro. 3 de 24 de mayo de 2021, se señala “La Secretaría del Deporte se denominará Ministerio del Deporte. Esta entidad, con excepción del cambio de denominación, mantendrá la misma estructura legal constante en el Decreto Ejecutivo No. 438 publicado en el Suplemento del Registro Oficial No. 278 del 6 de julio de 2018 y demás normativa vigente.”;

					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el Presidente Constitucional de la República del Ecuador con Decreto Ejecutivo Nro. 24 de 24 de mayo de 2021, designó al señor Juan Sebastián Palacios Muñoz como Ministro de Deporte;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, mediante resolución 7 publicada en el Registro Oficial 426 de 12 de febrero de 2019, Expide la REFORMA AL ESTATUTO ORGÁNICO DE GESTIÓN ORGANIZACIONAL POR PROCESOS DE LA SECRETARIA DEL DEPORTE publicado mediante Resolución No. 0034, expedida el 20 de junio de 2016, publicado en el Registro Oficial No. 808 de 29 de julio de 2016;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, mediante Resolución Nro. 030 de 29 de mayo de 2020, se expide las Reformas al Estatuto Orgánico de Gestión Organizacional por Procesos de esta entidad;
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 7 del Acuerdo Ministerial Nro. 0456 de 30 de diciembre del 2021 establece: “El Ministerio del Deporte definirá anualmente un Modelo de Asignación de recursos públicos para el financiamiento de la Planificación Operativa Anual de las organizaciones deportivas. // Este modelo contemplará la metodología, variables, indicadores, parámetros y demás criterios de asignación para determinar el porcentaje del recurso público que será distribuido entre todas las organizaciones deportivas que hayan obtenido la aprobación de su Planificación Operativa Anual. Dicho modelo deberá estar alineado con el Plan Decenal del Deporte Educación Física y Recreación, con los objetivos estratégicos institucionales del Ministerio del Deporte y con el Plan Nacional de Desarrollo, de conformidad con lo establecido en el artículo 130 de la Ley del Deporte, Educación Física y Recreación”;
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 12 del Acuerdo Ministerial Nro. 0456 de 30 de diciembre del 2021 establece: “El Ministerio del Deporte, definirá las políticas, instrumentos, actividades, formatos, ítems, requisitos y demás criterios técnicos, que deben ser considerados por parte de las organizaciones deportivas en el proceso de elaboración, presentación y aprobación de su Planificación Operativa Anual; así como, aquellos que deben observarse previa la realización de las transferencias de recursos públicos. (…)”; 
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 17 del Acuerdo Ministerial Nro. 0456 de 30 de diciembre del 2021 indica: “A través del aplicativo informático, y de contarse con los respectivos informes técnicos de viabilidad, el/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte, verificará que los informes citados en los artículos precedentes se encuentren debidamente motivados y suscritos. Hecho esto, emitirá las correspondientes resoluciones de aprobación a las Planificaciones Operativas Anuales de cada una de las organizaciones deportivas. Dichas resoluciones contendrán, entre otros aspectos, el flujo de transferencias presupuestarias a realizarse. (…)”;  
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el artículo 51 del Acuerdo Ministerial Nro. 0456 de 30 de diciembre del 2021 manifiesta: “Las organizaciones deportivas reportarán a través del aplicativo informático los remanentes hasta el 15 de enero de cada año.
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						El/la titular de la Dirección de Seguimiento, Planes, Programas y Proyectos del Ministerio del Deporte, procederá a revisar, analizar y consolidar la información reportada por las organizaciones deportivas. Hecho esto, generará un reporte consolidado de los remanentes, el cual será remitido a:

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						1. Al/la titular de la Dirección de Planificación e Inversión, a fin de que proceda a descontar los remanentes del POA de las asignaciones presupuestarias establecidas para las respectivas Planificaciones Operativas Anuales del ejercicio fiscal vigente; y,

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						2. A los titulares de las áreas técnicas, responsables de los proyectos de inversión a fin de que cuenten con un registro de los remanentes reportados por las organizaciones deportivas respecto a las Planificaciones Anuales de Inversión Deportiva. (…)”;

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, con memorando Nro. MD-DSPPP-2022-0107 MEM, de 10 de febrero de 2022, la Dirección de Seguimiento de Planes, Programas y Proyectos, notifica los saldos remanentes, a ser descontados a las organizaciones deportivas por concepto de gasto corriente en la Planificación Operativa Anual 2022 que sea aprobada;
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, con memorando Nro. MD-DSPPP-2022-0115-MEM, de 16 de febrero de 2022, la Dirección de Seguimiento de Planes, Programas y Proyectos, notifica el reporte de cumplimiento de entrega de información de evaluaciones al POA de las organizaciones deportivas por concepto de gasto corriente;
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, mediante Acción de Personal No. 0317-MD-DATH-2021 de 01 de julio de 2021, se nombra al Mgs. Cristian Gustavo Morales Valencia Director de Planificación e Inversión;
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el Estatuto Orgánico de Gestión organizacional por Procesos en el numeral 1.3.1.4.1. Gestión de Planificación e Inversión dentro de sus atribuciones y responsabilidades literal d) establece: “Aprobar las programaciones y reprogramaciones, del Plan Anual de Inversión y Plan Operativo Anual institucional y de organizaciones deportivas, según corresponda; así como emitir las certificaciones y avales.”; 
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, el Ministerio del Deporte, notifica el techo presupuestario a la '.$informacionCompleto[0][nombreDelOrganismoSegunAcuerdo].' con fecha '.$diaAsignacion.' de '.$monthNameAsignacion.' de '.$anioAsignacion.', mismo que con fecha '.$diaAsignacionDos.' de '.$monthNameAsignacionDos.' de '.$anioAsignacionDos.' realiza el registro y carga de la información correspondiente a la Planificación Operativa Anual en el Aplicativo desarrollado para el efecto.
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, con Memorando Nro. MD-DPI-2022-0233-MEM de 16 de febrero de 2022, la Dirección e Planificación e Inversión del Ministerio del Deporte, emite la Certificación POA 2022 Gasto Corriente '.$variableTipoOrganizacion.', correspondiente a las tareas: “Transferencia de recursos a '.$variableTipoOrganizacion.'” incluye el 5 por mil para la Contraloría General del Estado .”; 
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Que</span>, con Memorando Nro. MD-DF-2022-0193-MEM de 16 de febrero de 2022, la Dirección Financiera del Ministerio del Deporte, emite la certificación presupuestaria '.$variableTipoOrganizacion.', correspondiente a "Transferencia de recursos a '.$rotulo1.'" por el valor de $'.$valor1.' ('.$letras1.') y "Transferencias de recursos a '.$rotulo2.'" por el valor de $'.$valor2.' ('.$letras2.'), incluye el 5 por mil para la Contraloría General del Estado .”; 
					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						En ejercicio de las facultades y atribuciones determinadas en el Estatuto Orgánico de Gestión Organizacional por Procesos de esta Cartera de Estado y al Acuerdo Ministerial Nro. 0456 de 30 de diciembre del 2021,
					</td>

				</tr>

			</table>

			';


			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center" style="font-weight:bold;">RESUELVE: </th>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Artículo 1.- </span>, Aprobar la Planificación Operativa Anual del Gasto Corriente correspondiente al ejercicio fiscal 2022 de la '.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'.  Toda vez que, las Direcciones de la Subsecretaría de Deporte de Alto Rendimiento, Subsecretaría de Desarrollo de la Actividad Física, Coordinación de Administración e Infraestructura Deportiva, Coordinación General Administrativa Financiera y unidades de las Coordinaciones Zonales, en coordinación con la Dirección de Planificación e Inversión, han validado la información registrada por la organización deportiva en el Aplicativo POA, éste cumple con los lineamientos definidos para la aprobación de la  Planificación Operativa Anual 2022 del gasto corriente, de conformidad a los informes de revisión remitidos por las unidades involucradas en el proceso de aprobación del POA.; 
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Artículo 2.- </span>, La asignación presupuestaria aprobada para el ejercicio fiscal 2022 es de $ '.$fechaAsinacion[0][nombreInversion].' sin incluir el valor del cinco por mil, monto que, conforme a la información validada y aprobada, su Planificación Operativa Anual del Gasto Corriente se distribuye de acuerdo al siguiente detalle: 
					</td>

				</tr>

			</table>

			<br><br>

			<table class="tablas__bordes__necesarias">

				<thead>

					<tr>

						<th align="center">Actividades</th>
						<th align="center">Monto en dolares</th>

					</tr>


				</thead>

				<tbody>

					<tr>

						<td>GESTIÓN ADMINISTRATIVA Y FUNCIONAMIENTO DE ESCENARIOS DEPORTIVOS</td>
						<td>'.$actividad1[0][sumaItem].'</td>

					</tr>

					<tr>

						<td>MANTENIMIENTO DE ESCENARIOS E INFRAESTRUCTURA DEPORTIVA</td>
						<td>'.$actividad2[0][sumaItem].'</td>

					</tr>


					<tr>

						<td>CAPACITACIÓN DEPORTIVA O RECREATIVA</td>
						<td>'.$actividad3[0][sumaItem].'</td>

					</tr>

					<tr>

						<td>OPERACIÓN DEPORTIVA</td>
						<td>'.$actividad4[0][sumaItem].'</td>

					</tr>

					<tr>

						<td>EVENTOS DE PREPARACIÓN Y COMPETENCIA</td>
						<td>'.$actividad5[0][sumaItem].'</td>

					</tr>

					<tr>

						<td>ACTIVIDADES RECREATIVAS</td>
						<td>'.$actividad6[0][sumaItem].'</td>

					</tr>


					<tr>

						<td>IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO</td>
						<td>'.$actividad7[0][sumaItem].'</td>

					</tr>


					<tr>

						<td>Total</td>
						<td>'.$fechaAsinacion[0][nombreInversion].'</td>

					</tr>

				</tbody>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">Artículo 3.- </span>, El flujo correspondiente de asignación por la Planificación Operativa Anual del gasto corriente del ejercicio fiscal 2022 y una vez descontado el remanente validado por la Dirección de Seguimiento de Planes, Programas y Proyectos se conforma con el siguiente detalle:
					</td>

				</tr>

			</table>

			<br><br>

			<table class="tablas__bordes__necesarias">

				<thead>

					<tr>

						<th align="center" colspan="2">FLUJO APROBADO DE ASIGNACIÓN POA 2022</th>

					</tr>


				</thead>

				<tbody>

					<tr>

						<td>MONTO ASIGNADO</td>
						<td>'.$fechaAsinacion[0][nombreInversion].'</td>

					</tr>

					<tr>

						<td>5 X MIL CONTRALORIA</td>
						<td>'.$cincoMil.'</td>

					</tr>


					<tr>

						<td>MONTO SIN EL CINCO POR MIL</td>
						<td>'.$cincoMilDSin.'</td>

					</tr>

					<tr>

						<td>REMANENTE</td>
						<td>'.$remanentes.'</td>

					</tr>

					<tr>

						<td>MESES</td>
						<td>ASIGNACIÓN MENSUAL</td>

					</tr>

					<tr>

						<td>ENERO</td>
						<td>'.$enero[0][enero].'</td>

					</tr>

					<tr>

						<td>FEBRERO</td>
						<td>'.$febrero[0][febrero].'</td>

					</tr>


					<tr>

						<td>MARZO</td>
						<td>'.$marzo[0][marzo].'</td>

					</tr>


					<tr>

						<td>ABRIL</td>
						<td>'.$abril[0][abril].'</td>

					</tr>


					<tr>

						<td>MAYO</td>
						<td>'.$mayo[0][mayo].'</td>

					</tr>

					<tr>

						<td>JUNIO</td>
						<td>'.$junio[0][junio].'</td>

					</tr>


					<tr>

						<td>JULIO</td>
						<td>'.$julio[0][julio].'</td>

					</tr>

					<tr>

						<td>AGOSTO</td>
						<td>'.$agosto[0][agosto].'</td>

					</tr>

					<tr>

						<td>SEPTIEMBRE</td>
						<td>'.$septiembre[0][septiembre].'</td>

					</tr>


					<tr>

						<td>OCTUBRE</td>
						<td>'.$octubre[0][octubre].'</td>

					</tr>


					<tr>

						<td>NOVIEMBRE</td>
						<td>'.$noviembre[0][noviembre].'</td>

					</tr>

					<tr>

						<td>DICIEMBRE</td>
						<td>'.$diciembre[0][diciembre].'</td>

					</tr>

					<tr>

						<td>TOTAL</td>
						<td>'.$fechaAsinacion[0][nombreInversion].'</td>

					</tr>



				</tbody>

			</table>


			';


			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center" style="font-weight:bold;">DISPOSICIONES GENERALES</th>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">PRIMERA. -</span>, El manejo de los recursos públicos transferidos a la Organización Deportiva señalada en la presente resolución, estará sujeta a lo dispuesto en la normativa vigente que regula el manejo, uso y control de los recursos públicos.
					</td>

				</tr>

				<tr>

					<td style="text-align:justify;">

						Corresponderá a las unidades respectivas realizar el monitoreo, seguimiento y evaluación de la ejecución de los recursos económicos conforme a las actividades aprobadas por esta Cartera de Estado. Así mismo, de conformidad al artículo 138 de la Ley del Deporte, Educación Física y Recreación, la organización deportiva remitirá la evaluación semestral del POA en los plazos establecidos.
					</td>

				</tr>



			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">SEGUNDA. -</span>, La organización deportiva, posterior a la notificación de la presente resolución, deberá presentar al titular de la Dirección Financiera del Ministerio del Deporte los requisitos necesarios para la asignación del recurso, conforme lo establecido en el artículo 20 del Acuerdo Ministerial 0456 de 30 de diciembre del 2021, donde se establece la presentación de requisitos y trasferencia de recursos.
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">TERCERA. -</span>, Las Direcciones Técnicas del Ministerio del Deporte y Coordinaciones Zonales realizaran la solicitud de transferencia de los recursos asignados a las organizaciones deportivas según el cuadro adjunto:
					</td>

				</tr>

			</table>

			<br><br>


			<table class="tablas__bordes__necesarias">

				<thead>

					<tr>

						<th align="center">MINISTERIO DEL DEPORTE</th>
						<th align="center">TIPO DE ORGANISMO DEPORTIVO</th>

					</tr>


				</thead>

				<tbody>

					<tr>

						<td>Dirección de Deporte Formativo y Educación Física</td>
						<td>Federaciones deportivas provinciales, Federaciones deportivas estudiantiles, Federación Deportiva Nacional Estudiantil (FEDENAES) y Federación Deportiva Nacional de Ecuador (FEDENADOR).</td>

					</tr>

					<tr>

						<td>Deporte Convencional para el Alto Rendimiento</td>
						<td>Comité Olímpico Ecuatoriano (COE), Federación Deportiva Militar Ecuatoriana (FEDEME), Federación Deportiva Policial Ecuatoriana (FEDEPOE), Federaciones Ecuatorianas por Deporte</td>

					</tr>


					<tr>

						<td>Deporte Para Personas con Discapacidad</td>
						<td>Comité Paralímpico Ecuatoriano, Federación Ecuatoriana de Deportes para Personas con Discapacidad Intelectual (FEDEDI), Federación Ecuatoriana de Deportes para Personas con Discapacidad Visual ( FEDEDIV),  Federación Ecuatoriana de Deportes para Personas con Discapacidad Intelectual (FEDEPDAL) y Federación Ecuatoriana de Deportes para Personas con Discapacidad Física (FEDEPDIF) </td>

					</tr>

					<tr>

						<td>Dirección de Recreación</td>
						<td>Federación Nacional de Ligas Deportivas Barriales y Parroquiales del ecuador (FEDENALIGAS), Asociaciones de ligas barriales y parroquiales, Federaciones de ligas provinciales y cantonales, ligas deportivas barriales y parroquiales del Distrito Metropolitano de Quito</td>

					</tr>

					<tr>

						<td>Coordinaciones Zonales</td>
						<td>Ligas deportivas cantonales, Ligas Deportivas Barriales y Parroquiales</td>

					</tr>


				</tbody>

			</table>

			';


			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center" style="font-weight:bold;">DISPOSICIONES FINALES</th>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">PRIMERA. -</span> Encárguese a la Dirección de Planificación e Inversión la notificación de la presente resolución a la organización deportiva respectiva, a la (incluir direcciones técnicas), Coordinación General Administrativa Financiera y sus Direcciones, para el registro institucional de archivo y remitir al Registro Oficial para su publicación.
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">SEGUNDA. -</span> Encárguese a la Dirección de Comunicación Social, publique la presente resolución en la página web de la institución.
					</td>

				</tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span style="font-weight:bold;">TERCERA. -</span> El presente instrumento rige desde la suscripción sin perjuicio de la publicación en el Registro Oficial.
					</td>

				</tr>

			</table>
			<br><br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						Comuníquese y publíquese. –

					</td>

				</tr>

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">
	 
						Por delegación de la máxima autoridad.
						
					</td>

				</tr>

			</table>

			';



			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/resolucionAprobacion/";
			$parametro2="resolucionAprobacion";	
			$parametro3=$idOrganismo;
			
			/*=====  End of Generar pdf  ======*/
			
		break;	

		case "informeTecnico__planifiacion":

			$usuario__planificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioEn' ORDER BY a.id_usuario DESC LIMIT 1;");

			$inverion__ancladas=$objeto->getObtenerInformacionGeneral("SELECT b.fecha,b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$inverion__ancladas__dos=$objeto->getObtenerInformacionGeneral("SELECT a.fecha FROM poa_preliminar_envio AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo';");

			$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA DIRECCIÓN DE PLANIFICACIÓN E INVERSIÓN</th>

				</tr>


				<tr>

					<th align="center">INFORME DE VIABILIDAD TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL POA ORGANIZACIONES DEPORTIVAS  '.$aniosPeriodos__ingesos.'</th>

				</tr>

			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$informacionCompleto[0][idInversion].'

					</td>

					<td align="right">

						<span class="enfacis__letras">Fecha de elaboración:</span>'.$dia.' de '. ucwords($monthName).' del '.$anio.' 

					</td>


				</tr>	

			</table>

			<br>

			<br>


			<table class="tabla__bordadaTresCD">

				<tr>


					<th align="left">

						ANTECEDENTE

					</th>

				<tr>	

			</table>	


			<br>		

			<table class="tabla__bordadaTresCD">

				<tr>


					<th style="text-align:justify;">

						El Acuerdo Ministerial Nro.0296 de 28 de noviembre de 2022, reforma el Acuerdo Ministerial Nro.0456 de 30 de diciembre de 2021 denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

					</th>

				</tr>	

			</table>


			<br>		

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Artículo 5. De la Planificación anual de actividades deportivas: Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

					</td>

				</tr>

				<tr>


					<td style="text-align:justify;">

						Se entenderá como fomento deportivo todas aquellas actividades que coadyuban al desarrollo deportivo, en todos los niveles y son parte de este concepto los siguientes elementos:

					</td>

				</tr>


			</table>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						&nbsp;&nbsp;&nbsp;&nbsp;a.	Promoción del deporte, educación física y recreación;

					</td>

				</tr>	

				<tr>


					<td style="text-align:justify;">

						&nbsp;&nbsp;&nbsp;&nbsp;b.	Construcción, rehabilitación y mantenimiento de infraestructura deportiva; y,

					</td>

				</tr>	

				<tr>


					<td style="text-align:justify;">

						&nbsp;&nbsp;&nbsp;&nbsp;c.	Necesidades complementarias para su adecuado desarrollo.

					</td>

				</tr>	

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual y la Planificación Anual de Inversión Deportiva.

					</td>

				</tr>	

			</table>

			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Artículo 6. De La Planificación Operativa Anual (POA).- La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>

			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo. - Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación Administrativa, así como la continuidad en la preparación y competición de los atletas. Estas necesidades se detallan en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>

			</br>


			<table class="tabla__bordadaTresCD">

				<tr>


					<th align="left">

						DESARROLLO:

					</th>

				<tr>	

			</table>	

			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario por el monto de '.number_format((float)$informacionCompletoDosI[0][nombreInversion], 2, '.', '').' a la '.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].' para la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>	

			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						La '.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].' realiza la carga de Planificación Operativa Anual '.$aniosPeriodos__ingesos.' en el Aplicativo POA con fecha '.$inverion__ancladas__dos[0][fecha].'.

					</td>

				<tr>	

			</table>	


			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						En referencia a lo mencionado, la Dirección de Planificación e Inversión procede a realizar el siguiente análisis:

					</td>

				<tr>	

			</table>	


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center">N</th>
						<th  align="center">CONDICIÓN</th>
						<th  align="center">CUMPLE</th>
						<th  align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							El POA de la OD esta alineada al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.
						</td>
						<td>
							'.$plan__desecenal.'
						</td>
						<td>
							'.$plan__desecenal__texto.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							Ejecuta la Planificación anual del personal administrativo, de mantenimiento y técnicos y de servicios amparado en el Código de Trabajo.
						</td>
						<td>
							'.$planificacion__anual__administrativos.'
						</td>
						<td>
							'.$planificacion__anual__administrativos__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Ejecuta la Planificación anual del personal administrativo y técnicos, relacionado a Contratos Civiles de servicios profesionales.
						</td>
						<td>
							'.$planificacion__organismos__deportivos.'
						</td>
						<td>
							'.$planificacion__organismos__deportivos__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							La Organización Deportiva no ha creado nuevos puestos de trabajo administrativo, de mantenimiento y técnicos respecto del POA 2022
						</td>
						<td>
							'.$nuevos__puestos__trabajos.'
						</td>
						<td>
							'.$nuevos__puestos__trabajos__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							La Organización Deportiva no ha incrementado Contratos Civiles de servicios profesionales de personal administrativo y técnico respecto del POA 2022
						</td>
						<td>
							'.$increamentado__civiles.'
						</td>
						<td>
							'.$increamentado__civiles__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td align="left">
							La Organización Deportiva no incrementa la masa salarial relacionada al personal administrativo, de mantenimiento y técnicos de servicios respecto del POA 2022
						</td>
						<td>
							'.$deportiva__masa__salaria.'
						</td>
						<td>
							'.$deportiva__masa__salaria__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td align="left">
							La Organización Deportiva no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo y técnicos respecto del POA 2022
						</td>
						<td>
							'.$puesto__relacionado__honorarios.'
						</td>
						<td>
							'.$puesto__relacionado__honorarios__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td align="left">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte
						<td>
							'.$sueldos__totales.'
						</td>
						<td>
							'.$sueldos__totales__texto.'
						</td>
					</tr>
					<tr>
						<td align="center">9</td>
						<td align="left">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.
						<td>
							'.$suministros__informes.'
						</td>
						<td>
							'.$suministros__informes__texto.'
						</td>
					</tr>
				</tbody>
			</table>

			</br>

			<table class="tabla__bordadaTresCD" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES ADICIONALES: 

					</td>


					<td style="text-align:justify; width:70%!important;  padding-top:2em; padding-bottom:2em;">

						'.$observaAdicionales.'

					</td>

				</tr>

			</table>		


			</br>

			<table class="tabla__bordadaTresCD" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>


					<td style="text-align:justify; width:70%!important;  padding-top:2em; padding-bottom:2em;">

						'.$conlcusion.'

					</td>

				</tr>

			</table>				

			</br>
			</br>

			<table class="tablas__bordes__necesarias" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>


					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>


					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>


					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."planifiacionPdfGenerado/";
			$parametro2="planifiacionPdfGenerado";	
			$parametro3=$idOrganismo;
			
			/*=====  End of Generar pdf  ======*/

		break;

		case  "informeTecnico":


			$inverion__ancladas=$objeto->getObtenerInformacionGeneral("SELECT b.fecha,b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$inverion__ancladas__dos=$objeto->getObtenerInformacionGeneral("SELECT a.fecha FROM poa_preliminar_envio AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo';");

			if ($idUsuarioEn=="333" || $idUsuarioEn=="314") {

				$documentoCuerpo='

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FÍSICA</th>

						</tr>

					</table>';


			} else {

				$documentoCuerpo='

					<table class="tabla__bordadaTresCD">

						<tr>

							<th align="center">'.$subrectariaNombres.'</th>

						</tr>


						<tr>

							<th align="center">'.$funcionario[0][descripcionInfraestructurasF].'</th>

						</tr>

					</table>';


			}

			$documentoCuerpo.='<br>
			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">INFORME DE VIABILIDAD TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL POA </th>

				</tr>

				<tr>

					<th align="center">ORGANIZACIONES DEPORTIVAS  '.$aniosPeriodos__ingesos.'</th>

				</tr>

			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$informacionCompleto[0][idInversion].'

					</td>

					<td align="right">

						<span class="enfacis__letras">Fecha de elaboración:</span>'.$dia.' de '. ucwords($monthName).' del '.$anio.' 

					</td>


				</tr>	

			</table>

			<br>

			<br>


			<table class="tabla__bordadaTresCD">

				<tr>


					<th align="left">

						ANTECEDENTE

					</th>

				</tr>

			</table>	

			<br>		

			<table class="tabla__bordadaTresCD">

				<tr>


					<th style="text-align:justify;">

						El Acuerdo Ministerial 456 denominado <span style="font-style: oblique;">“PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS”</span> determina: 

					</th>

				</tr>	

			</table>

			<br>

			

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify; font-style: oblique;">

						<span class="enfacis__letras">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.
					</td>

				</tr>	

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify; font-style: oblique;">

						Se entenderá como fomento deportivo todas aquellas actividades que coadyuvan al desarrollo deportivo, en todos los niveles y son parte de este concepto los siguientes elementos:
					</td>

				</tr>	

			</table>	

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify; font-style: oblique;">

						a. Promoción del deporte, educación física y recreación;

					</td>

				</tr>	

				<tr>


					<td style="text-align:justify; font-style: oblique;">

						b. Construcción, rehabilitación y mantenimiento de infraestructura deportiva; y,
						
					</td>

				</tr>	

				<tr>


					<td style="text-align:justify; font-style: oblique;">

						c. Necesidades complementarias para su adecuado desarrollo.
						
					</td>

				</tr>	

			</table>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify; font-style: oblique;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos.

					</td>

				</tr>

			</table>			


			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify; font-style: oblique;">

						<span class="enfacis__letras">Artículo 6. La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contempla, la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así́ como, aquellas necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.
					</td>

				</tr>	

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify; font-style: oblique;">

						<span class="enfacis__letras">Artículo 8. De las actividades vinculadas al fomento deportivo, actividad física y recreación.- </span> Son actividades que garantizan la atención integral de los/as atletas en la etapa de desarrollo deportivo, formativo, base, proyección y perfeccionamiento, hasta alcanzar la maestría deportiva; con el objetivo de posicionar al sistema deportivo nacional, en las élites internacionales de cada deporte y/o eventos multideportivos. Asimismo, son actividades que coadyuvan a la masificación de la actividad física y la recreación. Se consideran parte de estas actividades, aquellas orientadas a promover y ejecutar capacitaciones, concentraciones, campamentos y/o base de entrenamientos, evaluaciones deportivas, campeonatos y/o selectivos, juegos, actividades recreativas, implementación y equipamiento deportivo, y otras definidas por el Ministerio del Deporte; así como, las relacionadas a financiar sueldos, salarios u honorarios profesionales de los cargos administrativos, de mantenimiento y técnicos que forman parte de la organización deportiva, entendido como parte de este, a todo el personal que trabaja en el proceso de preparación deportiva física, entrenamiento, servicios médicos, nutrición, psicología, y otros específicos relacionados a la particularidad de cada tipo de deporte o actividad física de los y las deportistas, así como al personal de apoyo que aporta para la operación de la organización deportiva y de los escenarios deportivos. Todo lo anterior, dando cumplimiento a los fines objetivos institucionales.



					</td>

				</tr>

				<tr>

					<td style="text-align:justify; font-style: oblique;">

						<span class="enfacis__letras">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.  </span> Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación administrativa, así como, la continuidad en la preparación y competición de los atletas. Estas necesidades se detallarán en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.

					</td>

				</tr>

			</table>	


			<br>
			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						<span class="enfacis__letras">DESARROLLO:</span>

					</td>

				</tr>

			</table>	

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de '.number_format((float)$informacionCompletoDosI[0][nombreInversion], 2, '.', '').' al organismo '.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].' para la Planificación Operativa Anual POA '.$anio.' con fecha '.$inverion__ancladas [0][fecha].'.

					</td>

				</tr>

			</table>



			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align:justify;">

						El organismo '.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'  realiza la carga de la Planificación Operativa Anual POA '.$anio.' con fecha '.$inverion__ancladas__dos[0][fecha].' en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 denominado: <span style="font-style: oblique;">“Procedimiento que regula el ciclo de planificación de las organizaciones deportivas”</span>.

					</td>

				</tr>

			</table>';


			if ($idUsuarioEn=="333" || $idUsuarioEn=="314") {

				$documentoCuerpo.='<table class="tabla__bordadaTresCD">

						<tr>

							<td style="text-align:justify;">

								En referencia a lo mencionado, la <span class="enfacis__letras">SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FÍSICA</span> procede a realizar el siguiente análisis:

							</td>

						</tr>

					</table>

					</br>
					</br>
					';

			}else if($fisicamenteEn=="cordinacionFinan"){


				$documentoCuerpo.='<table class="tabla__bordadaTresCD">

						<tr>

							<td style="text-align:justify;">

								En referencia a lo mencionado, la <span class="enfacis__letras">DIRECCIÓN ADMINISTRATIVA</span> procede a realizar el siguiente análisis:

							</td>

						</tr>

					</table>

					</br>
					</br>
					';

			}else{

				$documentoCuerpo.='<table class="tabla__bordadaTresCD">

						<tr>

							<td style="text-align:justify;">

								En referencia a lo mencionado, la <span class="enfacis__letras">'.$fisicamenteDireccion[0][descripcionFisicamenteEstructura].'</span> procede a realizar el siguiente análisis:

							</td>

						</tr>

					</table>

					</br>
					</br>
					';

			}

			if ($fisicamenteEn!=12 && $fisicamenteEn!=14) {

			$documentoCuerpo.='

			</br>
			</br>

				<table class="tablas__bordes__necesarias" style="margin-top:2em!important;">

					<thead>

						<tr style="padding:2em; background:#0d47a1; color:white;">

							<th align="center">N°</th>
							<th align="center">CONDICIÓN</th>
							<th align="center">CUMPLE</th>
							<th align="center">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>

						</tr>


					</thead>

					<tbody>';

			}

			if (($fisicamenteEn==12 || $fisicamenteEn==14 || $fisicamenteEn==27 || $fisicamenteEn==28 || $fisicamenteEn==29 || $fisicamenteEn==30 || $fisicamenteEn==31 || $fisicamenteEn==32 || $fisicamenteEn==33 || $fisicamenteEn==34) && $tipoDocumento!='zonalE') {
				
				$documentoCuerpo.='

					<table class="tablas__bordes__necesarias" style="margin-top:2em!important;">
				';


				if (!empty($salario3)) {
					
					$documentoCuerpo.='

						<tr style="padding:2em; background:#0d47a1; color:white;">

							<th colspan="3" rowspan="2" style="vertical-align:middle;">
								003 CAPACITACIÓN DEPORTIVA O RECREATIVA
							</th>

							<th colspan="1" rowspan="1" style="vertical-align:middle;">
								MONTO POA
							</th>

						</tr>

						<tr style="padding:2em; background:#0d47a1; color:white;">

							<th colspan="1" rowspan="1" style="vertical-align:middle;">
								'.$salario3.'
							</th>

						</tr>

						<tr style="padding:2em; background:#0d47a1; color:white;">

							<th>N°</th>
							<th align="center">ANÁLISIS DE LA CONDICIÓN</th>
							<th>CUMPLE</th>
							<th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br>DEPORTIVA<br>(MANDATORIA)</th>

						</tr>


						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">REGISTRA EN LA PROGRAMACION DEPORTIVA ANUAL ACTIVIDADES CORRESPONDIENTES A LA ACTIVIDAD 003 GASTOS EN TEMAS DE CAPACITACIÓN DEPORTIVA</td>
							<td align="center">'.$gastosCapacitacion.'</td>
							<td style="text-align:justify;">'.$text_gastosCapacitacion.'</td>

						</tr>


						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">REGISTRA EVENTOS DE CAPACITACIÓN (TALLERES, SEMINARIOS, CONGRESOS, ETC) PARA PARA CIENCIAS APLICADAS DE MANERA PROGRESIVA ORIENTADOS A ATLETAS, FUERZA TÉCNICA, CIENCIAS APLICADAS, DIRECTIVOS Y PERSONAL DE JUZGAMIENTO</td>
							<td align="center">'.$talleresSeminarios.'</td>
							<td style="text-align:justify;">'.$text_talleresSeminarios.'</td>

						</tr>


					';


				}


				if (!empty($salario4)) {
					
					$documentoCuerpo.='

						<tr>

							<th colspan="3" rowspan="2" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								004 OPERACIÓN DEPORTIVA
							</th>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								MONTO POA
							</th>

						</tr>

						<tr>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								'.$salario4.'
							</th>

						</tr>

						<tr>

							<th>N°</th>
							<th align="center">ANÁLISIS DE LA CONDICIÓN</th>
							<th>CUMPLE</th>
							<th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br>DEPORTIVA<br>(MANDATORIA)</th>

						</tr>


						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">REGISTRA LOS RECURSOS DESTINADOS PARA SUELDOS Y SALARIOS DE ENTRENADORES, EQUIPO TÉCNICO DE APOYO (MONITOR, INSTRUCTOR), EQUPO TÉCNICO DE CIENCIAS APLICADAS, Y ESTÁ ACORDE AL OBJETO DEL ORGANISMO DEPORTIVO</td>
							<td align="center">'.$recursosSueldos.'</td>
							<td style="text-align:justify;">'.$text_recursosSueldos.'</td>

						</tr>


						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">NO SE HAN CREADO NUEVOS PUESTOS DE TRABAJO DE TÉCNICOS EN RELACIÓN AL POA OD 2022</td>
							<td align="center">'.$noCreacionP.'</td>
							<td style="text-align:justify;">'.$text_noCreacionP.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">EL ORGANISMO DEPORTIVO NO INCREMENTA EL MONTO TOTAL DE HONORARIOS DEL PERSONAL TÉCNICO RESPECTO DEL POA OD 2022</td>
							<td align="center">'.$noIncrementaH.'</td>
							<td style="text-align:justify;">'.$text_noIncrementaH.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">LOS RECURSOS DESTINADOS PARA SUELDOS Y SALARIOS DE ENTRENADORES, EQUIPO TÉCNICO DE APOYO (MONITOR, INSTRUCTOR), EQUPO TÉCNICO DE CIENCIAS APLICADAS, ESTÁN ACORDE A LA PRIORIDAD DEPORTIVA DE LA INSITUCIÓN </td>
							<td align="center">'.$prioridadInstitucion.'</td>
							<td style="text-align:justify;">'.$text_prioridadInstitucion.'</td>

						</tr>


					';


				}

				if (!empty($salario5)) {
					
					$documentoCuerpo.='

						<tr>

							<th colspan="3" rowspan="2" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								005 EVENTOS DE PREPARACIÓN Y COMPETENCIA
							</th>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								MONTO POA
							</th>

						</tr>

						<tr>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								'.$salario5.'
							</th>

						</tr>

						<tr style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">

							<th>N°</th>
							<th align="center">ANÁLISIS DE LA CONDICIÓN</th>
							<th>CUMPLE</th>
							<th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br>DEPORTIVA<br>(MANDATORIA)</th>

						</tr>


						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">REGISTRA EN LAS ACTIVIDADES DEPORTIVAS CORRESPONDIENTES A LA ACTIVIDAD  CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO ACORDE A LA PRIORIDAD DE LA DISCIPLIAN DEPORTIVA</td>
							<td align="center">'.$registraConcentrado.'</td>
							<td style="text-align:justify;">'.$text_registraConcentrado.'</td>

						</tr>


						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">PRESENTA EL CERTIFICADO DE VALIDACIÓN DE EVENTOS, SUSCRITO POR EL DIRECTOR TÉCNICO METODOLÓGICO (SOLO PROVINCIALES)</td>
							<td align="center">'.$certificadoValidacion.'</td>
							<td style="text-align:justify;">'.$text_certificadoValidacion.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">LA PLANIFICACIÓN DEL INDICADOR COINCIDE CON LOS EVENTOS DEPORTIVOS PLANIFICADOS </td>
							<td align="center">'.$coincidePla.'</td>
							<td style="text-align:justify;">'.$text_coincidePla.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">UTILIZA LA SINTAXIS CLARA PARA EL REGISTRO DE LOS EVENTOS</td>
							<td align="center">'.$sintaxisClaraRe.'</td>
							<td style="text-align:justify;">'.$text_sintaxisClaraRe.'</td>

						</tr>


						<tr>

							<td align="center">5</td>
							<td style="text-align:justify;">REGISTRA CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO PARA LA CATEGORÍA MENORES, PREJUVENIL, JUVENIL Y ABSOLUTO A NIVEL INTERNACIONAL</td>
							<td align="center">'.$registraConcentradoA5Inter.'</td>
							<td style="text-align:justify;">'.$text_registraConcentradoA5Inter.'</td>

						</tr>



						<tr>

							<td align="center">6</td>
							<td style="text-align:justify;">REGISTRA CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO PARA LA CATEGORÍA MENORES, PREJUVENIL, JUVENIL Y ABSOLUTO A NIVEL NACIONAL</td>
							<td align="center">'.$registraConcentradoA5Nacio.'</td>
							<td style="text-align:justify;">'.$text_registraConcentradoA5Nacio.'</td>

						</tr>



						<tr>

							<td align="center">7</td>
							<td style="text-align:justify;">UTILIZA RECURSOS PARA CUBRIR GASTOS AUTORIZADOS DE: PASAJES, ALIMENTACIÓN, HOSPEDAJE,  HIDRATACIÓN, MEDICINAS, ATENCIÓN MÉDICA, HONORARIOS DE ÁRBITROS Y JUECES, UNIFORMES, MOVILIZACIÓN INTERNA Y AL EXTERIOR DE LA DELEGACIÓN</td>
							<td align="center">'.$gastosDelega.'</td>
							<td style="text-align:justify;">'.$text_gastosDelega.'</td>

						</tr>


						<tr>

							<td align="center">8</td>
							<td style="text-align:justify;">UTILIZA RECURSOS PARA CUBRIR PAGOS POR CONCEPTO DE SEGUROS Y BONO DEPORTIVO EN CONCENTRADO, CAMPAMENTO, BASE DE ENTRENAMIENTO, EVALUACIONES Y CAMPEONATO A NIVEL INTERNACIONAL</td>
							<td align="center">'.$segurosBonosI.'</td>
							<td style="text-align:justify;">'.$text_segurosBonosI.'</td>

						</tr>


						<tr>

							<td align="center">9</td>
							<td style="text-align:justify;">LA PLANIFICACIÓN OPERATIVA ANUAL DEL ORGANISMO DEPORTIVO SE ENCUENTRA ENMARCADA EN LO ESTABLECIDO EN EL ACUERDO MINISTERIAL 456 Y SUS REFORMAS.</td>
							<td align="center">'.$acuerdoC7.'</td>
							<td style="text-align:justify;">'.$text_acuerdoC7.'</td>

						</tr>




					';


				}


				if (!empty($salario6)) {
					
					$documentoCuerpo.='

						<tr>

							<th colspan="3" rowspan="2" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								006 ACTIVIDADES RECREATIVAS
							</th>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								MONTO POA
							</th>

						</tr>

						<tr>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								'.$salario6.'
							</th>

						</tr>

						<tr style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">

							<th>N°</th>
							<th align="center">ANÁLISIS DE LA CONDICIÓN</th>
							<th>CUMPLE</th>
							<th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br>DEPORTIVA<br>(MANDATORIA)</th>

						</tr>


						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">REGISTRA EN LA PROGRAMACION DEPORTIVA ANUAL ACTIVIDADES  006 ACTIVIDADES RECREATIVAS</td>
							<td align="center">'.$actividadesSe.'</td>
							<td style="text-align:justify;">'.$text_actividadesSe.'</td>

						</tr>


						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">UTILIZA RECURSOS PARA CUBRIR PAGOS POR CONCEPTO DE: MOVILIZACIÓN, ALIMENTACIÓN, HOSPEDAJE, INSCRIPCIONES, MEDICINAS, ATENCIÓN MÉDICA, HONORARIOS ÁRBITROS Y JUECES, INAUGURACIÓN Y CLAUSURA DEL EVENTO</td>
							<td align="center">'.$moMed.'</td>
							<td style="text-align:justify;">'.$text_moMed.'</td>

						</tr>


					';


				}



				if (!empty($salario7)) {
					
					$documentoCuerpo.='

						<tr>

							<th colspan="3" rowspan="2" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								007 IMPLEMENTACIÓN DEPORTIVA
							</th>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								MONTO POA
							</th>

						</tr>

						<tr>

							<th colspan="1" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								'.$salario7.'
							</th>

						</tr>

						<tr style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">

							<th>N°</th>
							<th align="center">ANÁLISIS DE LA CONDICIÓN</th>
							<th>CUMPLE</th>
							<th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br>DEPORTIVA<br>(MANDATORIA)</th>

						</tr>


						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">EN EL CASO QUE PLANIFIQUE  IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO REGISTRA EL DETALLE Y CANTIDADES REQUERIDAS DE CADA  IMPLEMENTO Y EQUIPO DEPORTIVO.</td>
							<td align="center">'.$implementaEqui.'</td>
							<td style="text-align:justify;">'.$text_implementaEqui.'</td>

						</tr>


						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">UTILIZA  RECURSOS PARA LA COMPRA DE  IMPLEMENTACIÓN Y EQUIPAMIENTO DEPORTIVO ACORDE A LA NORMATIVA TÉCNICA DE LAS DISCIPLINAS DEPORTIVAS</td>
							<td align="center">'.$comprasDisci.'</td>
							<td style="text-align:justify;">'.$text_comprasDisci.'</td>

						</tr>


					';


				}


				$documentoCuerpo.='

						<tr>

							<th colspan="4" rowspan="1" style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">
								CONDICIÓNES GENERALES
							</th>

	
						</tr>


						<tr style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">

							<th>N°</th>
							<th align="center">ANÁLISIS DE LA CONDICIÓN</th>
							<th>CUMPLE</th>
							<th>OBSERVACIONES PARA LA<br>ORGANIZACIÓN<br>DEPORTIVA<br>(MANDATORIA)</th>

						</tr>


						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">LA PLANIFICACIÓN OPERATIVA ANUAL DEL ORGANISMO DEPORTIVO SE ENCUENTRA ENMARCADA EN LO ESTABLECIDO EN EL ACUERDO MINISTERIAL 456 Y SUS REFORMAS.</td>
							<td align="center">'.$enmarcada456.'</td>
							<td style="text-align:justify;">'.$text_enmarcada456.'</td>

						</tr>

						<tr style="vertical-align:middle; padding:2em; background:#0d47a1; color:white;">

							<th>N°</th>
							<th colspan="2" align="center">RESUMEN DE PRESUPUESTO POR ACTIVIDAD</th>
							<th>MONTO POA</th>

						</tr>


				';

				if (!empty($salario3)) {

				$documentoCuerpo.='

					<tr>

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							003 
						</td>

	
						<td colspan="2" rowspan="1" style="vertical-align:middle;">
							CAPACITACIÓN DEPORTIVA O RECREATIVA
						</td>	

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							'.$salario3.'
						</td>	

					</tr>


				';

				}


				if (!empty($salario4)) {

				$documentoCuerpo.='

					<tr>

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							004
						</td>

	
						<td colspan="2" rowspan="1" style="vertical-align:middle;">
							OPERACIÓN DEPORTIVA
						</td>	

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							'.$salario4.'
						</td>	

					</tr>


				';

				}

				if (!empty($salario5)) {

				$documentoCuerpo.='

					<tr>

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							005
						</td>

	
						<td colspan="2" rowspan="1" style="vertical-align:middle;">
							EVENTOS DE PREPARACIÓN Y COMPETENCIA
						</td>	

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							'.$salario5.'
						</td>	

					</tr>


				';

				}

				if (!empty($salario6)) {

				$documentoCuerpo.='

					<tr>

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							006
						</td>

	
						<td colspan="2" rowspan="1" style="vertical-align:middle;">
							ACTIVIDADES RECREATIVAS
						</td>	

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							'.$salario6.'
						</td>	

					</tr>


				';

				}

				if (!empty($salario7)) {

				$documentoCuerpo.='

					<tr>

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							007
						</td>

	
						<td colspan="2" rowspan="1" style="vertical-align:middle;">
							IMPLEMENTACIÓN DEPORTIVA
						</td>	

						<td colspan="1" rowspan="1" style="vertical-align:middle;">
							'.$salario7.'
						</td>	

					</tr>


				';

				}


			}

			if ($fisicamenteEn==13 || $fisicamenteEn==19 || $fisicamenteEn==26 || $fisicamenteEn=="subsecretariaSubse") {

				if ($fisicamenteEn=="subsecretariaSubse") {
					$subsesCompara=true;
				}
				
				$documentoCuerpo.='

						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">La meta anual del indicador coincide  con el No. de eventos planificados  en el PDA</td>
							<td align="center">'.$numerosEventosPlanificadosPda.'</td>
							<td style="text-align:justify;">'.$text_numerosEventosPlanificadosPda.'</td>

						</tr>
			
						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">Utiliza la sintaxis clara (verbos en infinitivo) para el registro de los eventos</td>
							<td align="center">'.$sintaxis__clara.'</td>
							<td style="text-align:justify;">'.$text_sintaxis__clara.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">Presenta el certificado de validación de eventos, registrados en el PDA suscrito por el director técnico metodológico (solo provinciales)</td>
							<td align="center">'.$validacionEventos.'</td>
							<td style="text-align:justify;">'.$text_validacionEventos.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">Detalla satisfactoriamente la contratación o  adquisición de bienes o servicios orientados al fomento deportivo de acuerdo a la característica del deporte (implementación deportiva) con la debida justificación técnica</td>
							<td align="center">'.$detalleContratacion.'</td>
							<td style="text-align:justify;">'.$text_detalleContratacion.'</td>

						</tr>


						<tr>

							<td align="center">5</td>
							<td style="text-align:justify;">No se han incrementado nuevos puestos de trabajo de técnicos en relación de dependencia con respecto al POA OD 2022</td>
							<td align="center">'.$nuevosPuestos.'</td>
							<td style="text-align:justify;">'.$text_nuevosPuestos.'</td>

						</tr>

						<tr>

							<td align="center">6</td>
							<td style="text-align:justify;">Justifica satisfactoriamente la contratación de personal técnico bajo la modalidad de contratos de servicios de honorarios profesionales</td>
							<td align="center">'.$justificaTecnico.'</td>
							<td style="text-align:justify;">'.$text_justificaTecnico.'</td>

						</tr>

						<tr>

							<td align="center">7</td>
							<td style="text-align:justify;">En caso que planifique bienes de larga duración presenta el informe justificado de acuerdo a la característica del deporte para implementación deportiva, equipos tecnológicos y electrónicos</td>
							<td align="center">'.$bienesLarga.'</td>
							<td style="text-align:justify;">'.$text_bienesLarga.'</td>

						</tr>

						<tr>

							<td align="center">8</td>
							<td style="text-align:justify;">Planifica seguros contra accidentes, vida y de salud para los deportistas que participarán en los eventos deportivos.</td>
							<td align="center">'.$seguroAccidentes.'</td>
							<td style="text-align:justify;">'.$text_seguroAccidentes.'</td>

						</tr>

						<tr>

							<td align="center">9</td>
							<td style="text-align:justify;">Detalla las especificaciones de la implementación y equipamiento deportivo que sea adquirido por cada deporte beneficiario y demuestre la no duplicidad en el presente año fiscal.</td>
							<td align="center">'.$detalleImplementacion.'</td>
							<td style="text-align:justify;">'.$text_detalleImplementacion.'</td>

						</tr>


						<tr>

							<td align="center">10</td>
							<td style="text-align:justify;">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas.</td>
							<td align="center">'.$acuerdoEnmarcado.'</td>
							<td style="text-align:justify;">'.$text_acuerdoEnmarcado.'</td>

						</tr>



				';

			}


			if ($fisicamenteEn==5) {
				
				$documentoCuerpo.='

						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">Detalla satisfactoriamente el objeto de la adquisición de bienes o contratación de servicios</td>
							<td align="center">'.$detallaContratacion.'</td>
							<td style="text-align:justify;">'.$text_detallaContratacion.'</td>

						</tr>
			
						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">No se contempla financiamiento para pago de arreglos extrajudiciales, arrendamiento y licencias de uso de paquetes informáticos, Desarrollo, Actualización, Asistencia Técnica y Soporte de Sistemas Informáticos, dichos gastos deberán ser pagados con recursos de autogestión</td>
							<td align="center">'.$adquisicionBien.'</td>
							<td style="text-align:justify;">'.$text_adquisicionBien.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">Utiliza el ítem presupuestario acorde al objeto de la adquisición de bienes o contratación de servicios</td>
							<td align="center">'.$montoAc53.'</td>
							<td style="text-align:justify;">'.$text_montoAc53.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">Detalla satisfactoriamente la justificación para el pago de impuestos, tasas y contribuciones</td>
							<td align="center">'.$tasasContri.'</td>
							<td style="text-align:justify;">'.$text_tasasContri.'</td>

						</tr>


						<tr>

							<td align="center">5</td>
							<td style="text-align:justify;">El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión</td>
							<td align="center">'.$informeRemitido.'</td>
							<td style="text-align:justify;">'.$text_informeRemitido.'</td>

						</tr>


				';

			}


			if ($fisicamenteEn==7) {
				
				$documentoCuerpo.='

						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">La planificación del  indicador tiene coherencia con el nombre del indicador y  se encuentra redactado en número entero.</td>
							<td align="center">'.$coherenciaIndica.'</td>
							<td style="text-align:justify;">'.$text_coherenciaIndica.'</td>

						</tr>
			
						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">Ejecuta la Planificación anual del personal administrativo y de servicios amparado en el Código de Trabajo.</td>
							<td align="center">'.$codigoTrabajo.'</td>
							<td style="text-align:justify;">'.$text_codigoTrabajo.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">Ejecuta la Planificación anual del personal administrativo, relacionado a Contratos Civiles de servicios profesionales.</td>
							<td align="center">'.$ejecutaPlani.'</td>
							<td style="text-align:justify;">'.$text_ejecutaPlani.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">El organismo deportivo no ha creado nuevos puestos de trabajo administrativos y de servicios respecto del POA 2022 (Acta de certificación  suscrita por el responsable).</td>
							<td align="center">'.$nuevosPuestos.'</td>
							<td style="text-align:justify;">'.$text_nuevosPuestos.'</td>

						</tr>


						<tr>

							<td align="center">5</td>
							<td style="text-align:justify;">El organismo deportivo no ha incrementado  Contratos Civiles de servicios profesionales de personal administrativo,  respecto del POA 2022 (Acta de certificación suscrita por el responsable).</td>
							<td align="center">'.$incrementoCiviles.'</td>
							<td style="text-align:justify;">'.$text_incrementoCiviles.'</td>

						</tr>

						<tr>

							<td align="center">6</td>
							<td style="text-align:justify;">El organismo deportivo no incrementa la masa salarial relacionada al personal administrativo y de servicios respecto del POA 2022 (Acta de certificación suscrita por el responsable).</td>
							<td align="center">'.$masaSa.'</td>
							<td style="text-align:justify;">'.$text_masaSa.'</td>

						</tr>


						<tr>

							<td align="center">7</td>
							<td style="text-align:justify;">El organismo deportivo no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo, respecto del POA 2022 (Acta de certificación suscrita por el responsable).</td>
							<td align="center">'.$contratosCiviles.'</td>
							<td style="text-align:justify;">'.$text_contratosCiviles.'</td>

						</tr>

						<tr>

							<td align="center">8</td>
							<td style="text-align:justify;">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte.</td>
							<td align="center">'.$serviciosVeri.'</td>
							<td style="text-align:justify;">'.$text_serviciosVeri.'</td>

						</tr>


						<tr>

							<td align="center">9</td>
							<td style="text-align:justify;">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.</td>
							<td align="center">'.$planificoBienes.'</td>
							<td style="text-align:justify;">'.$text_planificoBienes.'</td>

						</tr>


				';

			}

			if ($fisicamenteEn==6 || $fisicamenteEn==15 || $fisicamenteEn==27 || $fisicamenteEn==28 || $fisicamenteEn==29 || $fisicamenteEn==30 || $fisicamenteEn==31 || $fisicamenteEn==32 || $fisicamenteEn==33) {

				if($fisicamenteEn==15 || $fisicamenteEn==27 || $fisicamenteEn==28 || $fisicamenteEn==29 || $fisicamenteEn==30 || $fisicamenteEn==31 || $fisicamenteEn==32 || $fisicamenteEn==33){

					$instaCompara=true;

				}
				
				$documentoCuerpo.='

						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">Declara toda la infraestructura deportiva a su cargo, adjuntando la legalidad respectiva.</td>
							<td align="center">'.$tieneCoherencia.'</td>
							<td style="text-align:justify;">'.$text_tieneCoherencia.'</td>

						</tr>
			
						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">La planificación del indicador tiene coherencia con el nombre del indicador de la actividad 002 y se encuentra redactado con número entero.</td>
							<td align="center">'.$gastosRea.'</td>
							<td style="text-align:justify;">'.$text_gastosRea.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">Planifican únicamente intervenciones de rehabilitación, y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.).</td>
							<td align="center">'.$dentroRecursos.'</td>
							<td style="text-align:justify;">'.$text_dentroRecursos.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">Utiliza los ítems presupuestarios aprobados del anexo XX, para la contratación de bienes y servicios respecto al tipo de intervenciones propuestas para la rehabilitación, y/o mantenimiento.</td>
							<td align="center">'.$itemsAnexo1.'</td>
							<td style="text-align:justify;">'.$text_itemsAnexo1.'</td>

						</tr>


						<tr>

							<td align="center">5</td>
							<td style="text-align:justify;">Mantiene concordancia el nombre de la intervención para rehabilitación, y/o mantenimiento con el escenario deportivo a intervenir y, los bienes y servicios involucrados en la intervención.</td>
							<td align="center">'.$interRea.'</td>
							<td style="text-align:justify;">'.$text_interRea.'</td>

						</tr>

						<tr>

							<td align="center">6</td>
							<td style="text-align:justify;">Mantiene concordancia el nombre de la intervención para rehabilitación, y/o mantenimiento con el escenario deportivo a intervenir y, los bienes y servicios involucrados en la intervención.</td>
							<td align="center">'.$justificacionOperativaIn.'</td>
							<td style="text-align:justify;">'.$text_justificacionOperativaIn.'</td>

						</tr>

						<tr>

							<td align="center">6.1</td>
							<td style="text-align:justify;">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivo respecto a Rehabilitación (Corresponde al área de Infraestructura)  incluye:-Análisis de precios unitarios-Presupuesto-Planos y anexos gráficos (debidamente suscritos por el profesional en la rama-Cronograma valorado.-Especificaciones técnicas.-Registro fotográfico de la intervención a subsanar.-Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores,cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico).Para estudios y/o fiscalización: Certificado de no contar con técnicos afines a la contratación Justificación técnica.Justificación técnica indicando perfil profesional y experiencia requerida para la contratación; alcance de los trabajos, presupuesto estimado (Estudio de mercado), plazo.
							</td>
							<td align="center">'.$justificacionOperativa.'</td>
							<td style="text-align:justify;">'.$text_justificacionOperativa.'</td>

						</tr>


						<tr>

							<td align="center">6.2</td>
							<td style="text-align:justify;">Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto Mantenimiento (Corresponde a la Dirección de Administración de Instalaciones Deportivas) incluye:-Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 2 cotizaciones-Registro fotográfico de la intervención a subsanar-Documentación de la legalidad del predio; según corresponda al tipo de intervención aprobada en los lineamientos 
							</td>
							<td align="center">'.$informeJus.'</td>
							<td style="text-align:justify;">'.$text_informeJus.'</td>

						</tr>


				';

			}


			if ($fisicamenteEn=="cordinacionFinan") {

				$finanCompara=true;
				
				$documentoCuerpo.='

						<tr>

							<td align="center">1</td>
							<td style="text-align:justify;">Detalla satisfactoriamente el objeto de la adquisición de bienes o contratación de servicios.</td>
							<td align="center">'.$gastoOperativo.'</td>
							<td style="text-align:justify;">'.$text_gastoOperativo.'</td>

						</tr>
			
						<tr>

							<td align="center">2</td>
							<td style="text-align:justify;">No se contempla financiamiento para pago de arreglos extrajudiciales, arrendamiento y licencias de uso de paquetes informáticos, Desarrollo, Actualización, Asistencia Técnica y Soporte de Sistemas Informáticos, dichos gastos deberán ser pagados con recursos de autogestión.</td>
							<td align="center">'.$descripcionCon.'</td>
							<td style="text-align:justify;">'.$text_descripcionCon.'</td>

						</tr>

						<tr>

							<td align="center">3</td>
							<td style="text-align:justify;">Utiliza el ítem presupuestario acorde al objeto de la adquisición de bienes o contratación de servicios.</td>
							<td align="center">'.$descripMate.'</td>
							<td style="text-align:justify;">'.$text_descripMate.'</td>

						</tr>

						<tr>

							<td align="center">4</td>
							<td style="text-align:justify;">Detalla satisfactoriamente la justificación para el pago de impuestos, tasas y contribuciones.</td>
							<td align="center">'.$adquiBienes.'</td>
							<td style="text-align:justify;">'.$text_adquiBienes.'</td>

						</tr>


						<tr>

							<td align="center">5</td>
							<td style="text-align:justify;">El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión.</td>
							<td align="center">'.$justificaCrea.'</td>
							<td style="text-align:justify;">'.$text_justificaCrea.'</td>

						</tr>


				';

			}



			$documentoCuerpo.='
					</tbody>

				</table>';


			if (!empty($observaAdicionales)) {

			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES ADICIONALES: 

					</td>


					<td style="text-align:justify; width:70%!important;  padding-top:2em; padding-bottom:2em;">

						'.$observaAdicionales.'

					</td>

				</tr>

			</table>				


			';

			}


			$documentoCuerpo.='

			<table class="tabla__bordadaTresCD" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>


					<td style="text-align:justify; width:70%!important;  padding-top:2em; padding-bottom:2em;">

						'.$conlcusion.'

					</td>

				</tr>

			</table>				


			';

			if ($fisicamenteEn==5) {
				

				$documentoCuerpo.='

				<table class="tabla__bordadaTresCD" style="width:100%important;">

					<tr>

						<td style="text-align:justify; width:30%!important;">

							Se deja constancia, que la Coordinación General Administrativa Financiera a través de las Dirección Administrativa se ha procedido a realizar la REVISIÓN de las actividades planificadas y detalladas como “necesidades complementarias para el adecuado desarrollo”, acorde a lo establecido en el Acuerdo        Ministerial Nro. 456 emitido el 30 de diciembre de 2021 y sus reformas y a los Lineamientos para la presentación de la Planificación Operativa Anual correspondiente al año 2023, de las organizaciones deportivas.

						</td>

					</tr>

				</table>				


				';



				$documentoCuerpo.='

				<table class="tabla__bordadaTresCD" style="width:100%important;">

					<tr>

						<td style="text-align:justify; width:30%!important;">

							La correcta ejecución de los recursos públicos financiados por parte del Ministerio del Deporte, para la adquisición de bienes, contratación de servicios, consultoría y obra; es de estricta responsabilidad del Organismo Deportivo conforme lo establecido en el artículo 1 literal b) de la Ley Orgánica del Sistema Nacional de Contratación Pública.

						</td>

					</tr>

				</table>	


				';

				$documentoCuerpo.='

				<table class="tabla__bordadaTresCD" style="width:100%important;">

					<tr>

						<td style="text-align:justify; width:30%!important;">

							La Organización Deportiva deberá cumplir con lo establecido en las Normas de Control Interno, Reglamento General Sustitutivo para la Administración, Utilización, Manejo y Control de los Bienes e Inventarios del Sector Público, Reglamento Sustitutivo para el Control de los Vehículos del Sector Público y demás normas emitidas por la Contraloría General del Estado.

						</td>

					</tr>

				</table>	


				';


				$documentoCuerpo.='

				<table class="tabla__bordadaTresCD" style="width:100%important;">

					<tr>

						<td style="text-align:justify; width:30%!important;">

							Previo al inicio de un procedimiento de contratación pública, así como para la aceptación de cualquier obligación que genere la erogación de recursos públicos, el Organismo deportivo deberá observar lo dispuesto en el Art. 115 y 101 establecido en el Código Orgánico de Planificación y Finanzas Públicas y su reglamento respectivamente.

						</td>

					</tr>

				</table>

				</br>
				</br>	


				';

			}

			if ($fisicamenteEn==5) {
				
				$asignador__elaborado="Revisado por: ";
				$asignador__validador="Revisado por: ";

			}else{

				$asignador__elaborado="Elaborado por: ";
				$asignador__validador="Aprobado por: ";

			}

			if ($fisicamenteEn==5) {
				
				$documentoCuerpo.='

				<table class="tablas__bordes__necesarias" style="width:100%important; margin-top:2em!important;">

					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							'.$asignador__elaborado.'

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							Firma

						</td>


					</tr>


					</table>

					';

			}

			if ($fisicamenteEn!=7 && $fisicamenteEn!=5) {
				
				$documentoCuerpo.='

				<table class="tablas__bordes__necesarias" style="width:100%important;">

					<tr>

						<td style="text-align:center; width:100%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras" colspan="2">

						'.$asignador__elaborado." ".$funcionario[0][nombreFuncionario].'

						</td>


					</tr>


					</table>

					';


			}

			if ($fisicamenteEn=="cordinacionFinan") {
			

			$documentoCuerpo.='

			<table class="tablas__bordes__necesarias" style="width:100%important;">


				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						Revisado por '.$director[0][nombreDirector].'

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						Firma

					</td>

				</tr>';

			}else if($idUsuarioEn=="333" || $idUsuarioEn=="314"){

				$documentoCuerpo.='

				<table class="tablas__bordes__necesarias" style="width:100%important;">


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Aprobado/validado por: '.$director[0][nombreDirector].'

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							Firma

						</td>

					</tr>';


			}else if ($fisicamenteEn==5) {

			$documentoCuerpo.='

			<table class="tablas__bordes__necesarias" style="width:100%important;">


				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						'.$asignador__validador.'

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						Firma

					</td>

				</tr>';

			}else if($fisicamenteEn==24 || $fisicamenteEn==12 || $fisicamenteEn==13 || $fisicamenteEn==25 || $fisicamenteEn==26 || $fisicamenteEn==19){

				$documentoCuerpo.='

				<table class="tablas__bordes__necesarias" style="width:100%important;">


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Aprobado por '.$director[0][nombreDirector].'

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							Firma

						</td>

					</tr>';

			}else if($idUsuarioEn=="333" || $idUsuarioEn=="314"){

				$documentoCuerpo.='

				<table class="tablas__bordes__necesarias" style="width:100%important;">


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Aprobado/validado por: '.$director[0][nombreDirector].'

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							Firma

						</td>

					</tr>';


			}else{

				$documentoCuerpo.='

				<table class="tablas__bordes__necesarias" style="width:100%important;">


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							'.$asignador__validador." ".$director[0][nombreDirector].'

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							Firma

						</td>

					</tr>';

			}




				$variableAprobacion="Validado por";


				if ($fisicamenteEn==5) {

					$documentoCuerpo.='

						<tr>

							<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" colspan="2">

								Una vez realizada la revisión de los gastos planificados por el Organismo Deportivo, por parte de la Dirección Administrativa, conforme la actividad 001 estipulada en los        lineamientos del ciclo de planificación, esta Coordinación acepta los parámetros revisados por la dirección antes mencionada.

							</td>

						</tr>';

				}

				if ($fisicamenteEn==5 || $fisicamenteEn==7) {

					$variableAprobacion="Validado por";

				}


				if ($fisicamenteEn=="cordinacionFinan" || $idUsuarioEn=="333" || $idUsuarioEn=="314") {



				}else if($fisicamenteEn==24 || $fisicamenteEn==12){


					$documentoCuerpo.='<tr>

							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Validado por'.$subsecretarios[0][nombreSubses].'

							</td>


							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Firma

							</td>

						</tr>

					</table>';

				}else if($fisicamenteEn==5){


					$documentoCuerpo.='<tr>

							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								'.$variableAprobacion.':

							</td>


							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Firma

							</td>

						</tr>

					</table>';

				}else if ($finanCompara==true) {

					$documentoCuerpo.='<tr>

							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Revisado por: '.$corFinan[0][nombreFinan].'

							</td>


							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Firma

							</td>

						</tr>

					</table>';

				}else if ($instaCompara==true) {

					$documentoCuerpo.='<tr>

							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Revisado por: '.$corInsta[0][nombreInsta].'

							</td>


							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Firma

							</td>

						</tr>

					</table>';					
					
				}else if ($subsesCompara==true) {

					$documentoCuerpo.='<tr>

							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Validado por: '.$subsesAcFi[0][nombreSubsesA].'

							</td>


							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Firma

							</td>

						</tr>

					</table>';	

				}else{

					$documentoCuerpo.='<tr>

							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								'.$variableAprobacion." ".$subsecretarios[0][nombreSubses].'

							</td>


							<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

								Firma

							</td>

						</tr>

					</table>';

				}

				if ($fisicamenteEn=="cordinacionFinan") {

					$documentoCuerpo.='


					<tr>

						<td colspan="2">

							Una vez realizada la revisión de los gastos planificados por el Organismo Deportivo, por parte de la Dirección Administrativa, conforme la actividad 001 estipulada en los lineamientos del ciclo de planificación, esta Coordinación acepta los parámetros revisados por la dirección antes mencionada.

						</td>


					</tr>';

					$documentoCuerpo.='


					<tr>

						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

							Revisado por '.$corFinan[0][nombreFinan].'

						</td>


						<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

							Firma

						</td>

					</tr>';


				}

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."informesTecnicos/";
			$parametro2="informeTecnico";	
			$parametro3="informeTecnico";
			
			/*=====  End of Generar pdf  ======*/

		break;


		case  "asignacionTecho":

			$formatter = new NumeroALetras();

			$inserta=$objeto->getInserta('poa_inversion', array("`idInversion`, ","`nombreInversion`, ","`estado`, ","`fecha`, ","`hora`, ","`inversionQueda`, ","`ejercicioFiscal`, ","`perioIngreso`"),array(":nombreInversion, ",":estado, ",":fecha, ",":hora, ",":inversionQueda, ",":ejercicioFiscal, ",":aniosPeriodos__ingesos"),array("$asignacionPresupuestaria","A","$fecha_actual","$hora_actual","$asignacionPresupuestaria","$periodoAsignacion-01-01","$aniosPeriodos__ingesos"),array(":nombreInversion",":estado",":fecha",":hora",":inversionQueda",":ejercicioFiscal",":aniosPeriodos__ingesos"));	
			
			$maximo=$objeto->getMaximoFuncion('idInversion','poa_inversion');	

			$inserta2=$objeto->getInserta('poa_inversion_usuario', array("`idInversionUsuario`, ","`idUsuario`, ","`idInversion`, ","`idOrganismo`, ","`perioIngreso`"),array(":idUsuario, ",":idInversion, ",":idOrganismo, ",":aniosPeriodos__ingesos"),array("$idUsuarioPrincipalDos","$maximo","$idOrganismo","$aniosPeriodos__ingesos"),array(":idUsuario",":idInversion",":idOrganismo",":aniosPeriodos__ingesos"));	

			$inserta3=$objeto->getInserta('poa_organismo_documento', array("`idOrganismoDocumento`, ","`direccionDelDocumento`, ","`fecha`, ","`hora`, ","`idUsuario`, ","`idOrganismo`, ","`numeroDeAcuerdo`, ","`perioIngreso`"),array(":direccionDelDocumento, ",":fecha, ",":hora, ",":idUsuario, ",":idOrganismo, ",":numeroDeAcuerdo, ",":aniosPeriodos__ingesos"),array("N/A","$fecha_actual","$hora_actual","$idUsuarioPrincipalDos","$idOrganismo","N/A","$aniosPeriodos__ingesos"),array(":direccionDelDocumento",":fecha",":hora",":idUsuario",":idOrganismo",":numeroDeAcuerdo",":aniosPeriodos__ingesos"));	

			$valores=array("periodo='$periodoAsignacion'");
			$actualiza2=$objeto->getActualiza("poa_organismo",$valores,"idOrganismo",$idOrganismo);

			/*===========================================
			=            Enviador de correos            =
			===========================================*/

			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.nombreOrganismo,b.email FROM poa_organismo AS a INNER JOIN poa_usuario AS b ON a.idUsuario=b.idUsuario WHERE a.idOrganismo='$idOrganismo';");

			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$obtenerInformacion[0][nombreOrganismo].'</span>&nbsp; fue asignado su presupuesto de '.$asignacionPresupuestaria.' para el periodo '.$periodoAsignacion.'.<br> El documento de asignación fue generado por favor ingresar al aplicativo con sus credenciales.</body></html>';

			$emailArray = array($obtenerInformacion[0][email]);
					
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);

			/*=====  End of Enviador de correos  ======*/

			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."asignacionRecursos/";
			$parametro2="asignacionTecho";	
			$parametro3=$maximo;
			
			/*=====  End of Generar pdf  ======*/
			
			/*========================================
			=            Cuerpo documetno            =
			========================================*/
			

			$formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
			$n = $asignacionPresupuestaria;
			$izquierda = intval(floor($n));

			$derecha = intval(($n - floor($n)) * 100);

			$pos = strpos($asignacionPresupuestaria,".01");


			if($derecha<1 && $pos === false){

				$asignadorReal=$formatterES->format($izquierda) . " CON " . $formatterES->format($derecha);

			}else{

				$asignadorReal=strtolower($formatter->toWords($asignacionPresupuestaria));

			}


			$documentoCuerpo='  

			<table class="tabla__bordadaTresCD">

				<tr>

					<td style="text-align: left;">

						<span class="enfacis__letras">Quito, '.$dia.' de '. ucwords($monthName).' del '.$anio.' </span>

					</td>

					<td style="text-align: right;">

						<span class="enfacis__letras">Código asignación:</span>'.$parametro3.'

					</td>

				<tr>		

			</table>


			<table class="tabla__bordada">

				<tr>

					<td>

						<span class="enfacis__letras">Para:</span> '.$informacionCompleto[0][nombreResponsablePoa].' / '.strtoupper($informacionCompleto[0][nombreOrganismo]).'

					</td>

				<tr>		

			</table>

			<table class="tabla__bordadaTresC">

				<tr>

					<td>

						<span class="enfacis__letras">De:</span> '.$directorConjunto[0][nombreDi].'

					</td>

				<tr>

			</table>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td>

						<span class="enfacis__letras">Asunto:</span> Notificación de Techo Presupuestario asignado – '.strtoupper($informacionCompleto[0][nombreOrganismo]).'

					</td>

				<tr>		

			</table>

			<br>
			<br>


			<table class="tabla__bordadaTresCD">

				<tr>

					<td>

						<span class="enfacis__letras">De mi consideración:</span>

					</td>

				<tr>		

			</table>


			<table class="tabla__bordadaTresCDE">

				<tr>

					<td class="justify__class">

						El Art. 130 de la Ley del Deporte, Educación Física y Recreación menciona, <span class="enfacis__letrasOblic">“Asignaciones.- De conformidad con el artículo 298 de la Constitución de la República quedan prohibidas todos las preasignaciones presupuestarias destinadas para el sector. La distribución de los fondos públicos a las organizaciones deportivas estará a cargo del Ministerio Sectorial y se realizará de acuerdo a su política, su presupuesto, la planificación anual aprobada enmarcada en el Plan Nacional del Buen Vivir y la Constitución. Para la asignación presupuestaria desde el deporte formativo hasta de alto rendimiento, se considerarán los siguientes criterios: calidad de gestión sustentada en una matriz de evaluación, que incluya resultados deportivos, impacto social del deporte y su potencial desarrollo, así como la naturaleza de cada organización. Para el caso de la provincia de Galápagos se considerará los costos por su ubicación geográfica. Para la asignación presupuestaria a la educación física y recreación, se considerarán los siguientes criterios: de igualdad, número de beneficiarios potenciales, el índice de sedentarismo de la localidad y su nivel socioeconómico, así como la naturaleza de cada organización y la infraestructura no desarrollada. En todos los casos prevalecerá lo dispuesto en el artículo 4 de esta Ley y su Reglamento”</span>.

					</td>

				<tr>		

			</table>

			<br>
			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td class="justify__class">

						Por otra parte, mediante Acuerdo Ministerial No.0456 de 30 de diciembre del 2021 se expide el procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas, en el que establece en la sección1- Procedimiento para la elaboración y Planificación de la Programación Operativa Anual <span class="enfacis__letrasOblic">“Art. 13. Notificación de techos presupuestarios.- Al inicio de cada año, una vez que el ente rector de la Economía y Finanzas Públicas defina el presupuesto otorgado al Ministerio del Deporte para el correspondiente ejercicio fiscal, y con base a la metodología establecida en el Modelo de Asignación Presupuestaria al que hace referencia el artículo 7 del presente Acuerdo Ministerial, se establecerá y notificará el techo presupuestario asignado a cada organización deportiva. Dicho proceso estará a cargo de la Dirección de Planificación e Inversión del Ministerio del Deporte. Los techos presupuestarios por organización deportiva serán publicados en la página institucional del Ministerio del Deporte”</span>.

					</td>

				<tr>		

			</table>

			<br>
			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td class="justify__class">

						Por lo expuesto me permito notificar la asignación presupuestaria correspondiente al gasto corriente, para el presente ejercicio fiscal, por el monto de $'.number_format((float)$asignacionPresupuestaria, 2, '.', '').' ('.$asignadorReal.' centavos), sin incluir el valor del cinco por mil.

					</td>

				<tr>		

			</table>


			<br>
			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td class="justify__class">

						Finalmente, se solicita continuar con el proceso de ingreso de información en el aplicativo conforme las directrices y lineamientos vigentes.

					</td>

				<tr>		

			</table>


			<br>
			<br>

			<table class="tabla__bordadaTresCD">

				<tr>

					<td class="justify__class">

						Con sentimientos de distinguida consideración	

					</td>

				<tr>		

			</table>



			';
			
			/*=====  End of Cuerpo documetno  ======*/
			


		break;	


		case  "documento__contratcion__publica__od": 

			$horizontal=true;


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/final__seguimiento/";
			$parametro2="ResumenContratacionPublicaSeguimiento__".$idOrganismo."__".$fecha_actual."__".$hora_actual."__".$hora_actual2;	
			$parametro3=$idOrganismo."__".$fecha_actual."__".$hora_actual."__".$hora_actual2;
			
			/*=====  End of Generar pdf  ======*/

			$auxiliar=" ";

			if ($trimestreEvaluadorDos=="primerTrimestre") {
				$indentificador="I";
			}else if($trimestreEvaluadorDos=="segundoTrimestre"){
				$indentificador="II";
			}else if($trimestreEvaluadorDos=="tercerTrimestre"){
				$indentificador="III";
			}else if($trimestreEvaluadorDos=="cuartoTrimestre"){
				$indentificador="IV";
			}

			
		
			$documentoCuerpo=" <div style='text-align:center!important;'><h1>RESUMEN DE CONTRATACIÓN PÚBLICA POR ITEMS</h1>
			<h1>".$indentificador." TRIMESTRE ".$aniosPeriodos__ingesos."</h1></div>

			<div style='text-align:justify!important;'>
					<h2>FECHA:                   ".$fecha_actual." </h2>
					<h2>ORGANIZACIÓN DEPORTIVA:  ".strtoupper($informacionCompleto[0][nombreOrganismo])." </h2>  
					<h2>NÚMERO DE RUC:           ".$informacionCompleto[0][ruc]." </h2>
			</div>



			
			

			<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

						<thead>

							<tr>

								<th>
									<center>CÓDIGO ACTIVIDAD</center>
								</th>

								<th>
									<center>ÍTEM</center>
								</th>

								<th>
									<center>DESCRIPCIÓN DEL ÍTEM</center>
								</th>

								<th>
									<center>TIPO DE CONTRATACIÓN</center>
								</th>

								<th>
									<center>OBJETO DE LA CONTRATACIÓN</center>
								</th>

								<th>
									<center>CANTIDAD DE LA CONTRATACIÓN </center>
								</th>

								<th>
									<center>MONTO DE LA CONTRATACIÓN </center>
								</th>

								<th>
									<center>PROVEEDOR </center>
								</th>

								<th>
									<center>RUC</center>
								</th>

								<th>
									<center>LINK DE LA PUBLICACIÓN EN EL PORTAL DE COMPRAS PÚBLICAS</center>
								</th>

							

							</tr>

						</thead>

						<tbody>";

						$indicadores__ContratacionPublicaInformeOD=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.trimestre='$trimestreEvaluadorDos' ORDER BY a.idActividad;");

						$contador=0;

						foreach ($indicadores__ContratacionPublicaInformeOD as $clave => $valor) {

							if($valor[catalogo__elect] == "si" ){
								$contador++;

								

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td>   <td><center>Catalogo Electrónico</center></td> <td><center>".$valor[catalogo__elect__objeto]."</center></td><td><center>".$valor[catalogo__elect__cantidad]."</center></td><td><center>".$valor[catalogo__elect__monto]."</center></td> <td><center>".$valor[catalogo__elect__proveedor]."</center></td> <td><center>".$valor[catalogo__elect__rucProveedor]."</center></td> <td><center>".$valor[catalogo__elect__texto]."</center></td> </tr>";
						
							}

							if($valor[catalogo__subasta] == "si" ){

								$contador++;

								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Subasta Inversa Electrónica</center></td><td><center>".$valor[catalogo__subasta__objeto]."</center></td> <td><center>".$valor[catalogo__subasta__cantidad]."</center></td><td><center>".$valor[catalogo__subasta__monto]."</center></td> <td><center>".$valor[catalogo__subasta__proveedor]."</center></td> <td><center>".$valor[catalogo__subasta__rucProveedor]."</center></td> <td><center>".$valor[catalogo__subasta__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__infima] == "si" ){

								$contador++;

								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Ínfima Cuantía</center></td><td><center>".$valor[catalogo__infima__objeto]."</center></td> <td><center>".$valor[catalogo__infima__cantidad]."</center></td> <td><center>".$valor[catalogo__infima__monto]."</center></td> <td><center>".$valor[catalogo__infima__proveedor]."</center></td> <td><center>".$valor[catalogo__infima__rucProveedor]."</center></td> <td><center>".$valor[catalogo__infima__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__menorCuantia] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Menor Cuantía Bienes</center></td> <td><center>".$valor[catalogo__menorCuantia__objeto]."</center></td><td><center>".$valor[catalogo__menorCuantia__cantidad]."</center></td><td><center>".$valor[catalogo__menorCuantia__monto]."</center></td> <td><center>".$valor[catalogo__menorCuantia__proveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantia__rucProveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantia__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__cotizacion] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Cotización Bienes</center></td> <td><center>".$valor[catalogo__cotizacion__objeto]."</center></td><td><center>".$valor[catalogo__cotizacion__cantidad]."</center></td><td><center>".$valor[catalogo__cotizacion__monto]."</center></td> <td><center>".$valor[catalogo__cotizacion__proveedor]."</center></td> <td><center>".$valor[catalogo__cotizacion__rucProveedor]."</center></td> <td><center>".$valor[catalogo__cotizacion__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__licitacion] == "si" ){

								$contador++;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Licitación Bienes</center></td> <td><center>".$valor[catalogo__licitacion__objeto]."</center></td><td><center>".$valor[catalogo__licitacion__cantidad]."</center></td> <td><center>".$valor[catalogo__licitacion__monto]."</center></td> <td><center>".$valor[catalogo__licitacion__proveedor]."</center></td> <td><center>".$valor[catalogo__licitacion__rucProveedor]."</center></td> <td><center>".$valor[catalogo__licitacion__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__menorCuantiaObras] == "si" ){

								$contador++;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Menor Cuantía Obras</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__objeto]."</center></td><td><center>".$valor[catalogo__menorCuantiaObras__cantidad]."</center></td><td><center>".$valor[catalogo__menorCuantiaObras__monto]."</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__proveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__cotizacionObras] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Cotización Obras</center></td> <td><center>".$valor[catalogo__cotizacionObras__objeto]."</center></td><td><center>".$valor[catalogo__cotizacionObras__cantidad]."</center></td><td><center>".$valor[catalogo__cotizacionObras__monto]."</center></td> <td><center>".$valor[catalogo__cotizacionObras__proveedor]."</center></td> <td><center>".$valor[catalogo__cotizacionObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__cotizacionObras__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__licitacionObras] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Licitación Obras</center></td> <td><center>".$valor[catalogo__licitacionObras__objeto]."</center></td><td><center>".$valor[catalogo__licitacionObras__cantidad]."</center></td><td><center>".$valor[catalogo__licitacionObras__monto]."</center></td> <td><center>".$valor[catalogo__licitacionObras__proveedor]."</center></td> <td><center>".$valor[catalogo__licitacionObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__licitacionObras__texto]."</center></td></tr>";
						
							}


							if($valor[catalogo__precioObras] == "si" ){
								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Precio Fijo Obras</center></td> <td><center>".$valor[catalogo__precioObras__objeto]."</center></td><td><center>".$valor[catalogo__precioObras__cantidad]."</center></td><td><center>".$valor[catalogo__precioObras__monto]."</center></td> <td><center>".$valor[catalogo__precioObras__proveedor]."</center></td> <td><center>".$valor[catalogo__precioObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__precioObras__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__contratacionDirecta] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Contratación Directa</center></td><td><center>".$valor[catalogo__contratacionDirecta__objeto]."</center></td><td><center>".$valor[catalogo__contratacionDirecta__cantidad]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__monto]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__proveedor]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__rucProveedor]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__texto]."</center></td></tr>";
						
							}

							if($valor[catalogo__contratacionListaCorta] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Lista Corta</center></td><td><center>".$valor[catalogo__contratacionListaCorta__objeto]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__cantidad]."</center></td><td><center>".$valor[catalogo__contratacionListaCorta__monto]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__proveedor]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__rucProveedor]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__texto]."</center></td> </tr>";
						
							}

							if($valor[catalogo__contratacionConcursoPu] == "si" ){

								$contador++;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>Concurso Público</center></td><td><center>".$valor[catalogo__contratacionConcursoPu__objeto]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__cantidad]."</center></td><td><center>".$valor[catalogo__contratacionConcursoPu__monto]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__proveedor]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__rucProveedor]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__texto]."</center></td></tr>";
						
							}


							$documentoCuerpo.="
							</tbody>
								";

						}

						$documentoCuerpo.="
					</table>";

			
		

				

		break;

		case  "pdf__seguimientos__Financiero":


			

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
				


						<th colspan='5'>

							<center>";

							if(substr($siglas__dinamicas__inputs,0, 2)=="DA"){
								$documentoCuerpo.="
								".$subsecretarias__escritas."
								 <br>
								 <br>
								".$direccion__escritas."";
							}else{
								$documentoCuerpo.="
									
								".$subsecretarias__escritas."
								";
							}


							$documentoCuerpo.="
							

							</center>

						</th>

		

						<th colspan='1'>

							<img  src='../../images/titulo__principis__ministerios.png'/>
							
						</th>
					</tr>

							

				</table>";

				
				if($tipoInforme=="actividades"){
					$documentoCuerpo.="
					<table style='width:100%!important;'>
	
						<tr>
	
							<th>
	
								<center> <h1 style='font-weight:900;'>
	
								<div style='font-size:10px!important; padding:.5em; background:#1b5e20; color:white!important;'>
	
								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSET - ".$siglas__dinamicas__inputs." - <span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>
								
								</div>
	
								</h1></center>
	
							</th>
	
						</tr>
	
					</table>
						<table style='width:100%!important; margin-top:2em;'>

							<tr>

								<th>

									I. EJERCICIO FISCAL

								</th>

								<th>

								AÑO

								</th>

								<td>

									".$periodo__evaluados__anuales1."

								</td>

							</tr>

						</table>

						<table style='margin-top:1em!important; width:100%!importan;'>

							<tr>

								<th>

									II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

								</th>

							</tr>

						</table>


						<table style='width:100%!important; margin-top:.5em!important;'>

							<tr>

								<th style='width:40%!important;'>

									NOMBRE DE LA ORGANIZACIÓN:

								</th>

								<td style = 'background:#e8edff'>
									".$nombre__organizacion__deportivas."
								</td>

							</tr>

							<tr>

								<th>

									RUC DE LA ORGANIZACIÓN:

								</th>

								<td style = 'background:#e8edff'>
									".$ruc__organizacion__deportivas."
								</td>

							</tr>

							<tr>

								<th>

									PRESIDENTE O REPRESENTANTE LEGAL:

								</th>

								<td style = 'background:#e8edff'>
									".$informacionCompletoDosI[0][nombreResponsablePoa]."
								</td>

							</tr>

							<tr>

								<th>

									CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

								</th>

								<td style = 'background:#e8edff'>
									".$correo__organizacion__deportivas."
								</td>

							</tr>

							<tr>

								<th>

									DIRECCIÓN COMPLETA:

								</th>

								<td style = 'background:#e8edff'>
									".$direccion__organizacion__deportivas."
								</td>

							</tr>


						</table>

						<table style='margin-top:1em!important; width:100%!importan;'>

							<tr>

								<th>

									III. UBICACIÓN GEOGRÁFICA

								</th>

							</tr>

						</table>

						<table style='margin-top:.5em!important; width:100%;'>

							<tr>

								<th style='width:40%!important;'>

									PROVINCIA

								</th>

								<td style = 'background:#e8edff'>
									".$provincia__organizacion__deportivas."
								</td>

							</tr>

							<tr>

								<th>

									CANTÓN

								</th>

								<td style = 'background:#e8edff'>
									".$canton__organizacion__deportivas."
								</td>

							</tr>


							<tr>

								<th>

									PARROQUIA

								</th>

								<td style = 'background:#e8edff'>
									".$parroquia__organizacion__deportivas."
								</td>

							</tr>


						</table>


						<table style='margin-top:1em!important; width:100%!importan;'>

							<tr>

								<th>

									IV. ALINEACIÓN A LA PLANIFICACIÓN

								</th>

							</tr>

						</table>

						<table style='margin-top:.5em!important; width:100%!importan;'>

							<tr>

								<th style='width:40%!important;'>

									ÁREA DE ACCIÓN:

								</th>

								<td style = 'background:#e8edff'>

								".$areaAccion."

								</td>

							</tr>

							<tr>

								<th style='width:40%!important;'>

									OBJETIVO ESTRATÉGICO INSTITUCIONAL

								</th>

								<td style = 'background:#e8edff'>

								".$objetivoS."

								</td>

							</tr>

						</table>

						<table style='margin-top:1em!important; width:100%!importan;'>

							<tr>

								<th>

									V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

								</th>

							</tr>

						</table>

						<table style='margin-top:.5em!important; width:100%!importan;'>

							<tr>

								<th>	
									V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL
								</th>

							</tr>";
							$semestre;
							if($trimestre__evaluados__al == "I SEMESTRE"){
								$semestre = "Enero - Junio";
							}elseif($trimestre__evaluados__al == "II SEMESTRE"){
								$semestre = "Julio - Diciembre";
							}


							$documentoCuerpo.="

							
							<tr>
								
								<td style='width:40%!important;'>	
									<br>
									PERÍODO EVALUADO:
								</td>

								<td style = 'background:#e8edff'>	
									<br>
									".$semestre."
								</td>

							</tr>

							<tr>

								<td style='width:40%!important;'>	
									PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):
								</td>

								<td style = 'background:#e8edff'>	
									".$presupuesto__asignado__pais__altos."
								</td>

							</tr>

						</table>
					";


					$documentoCuerpo.="

					<table style='margin-top:.5em!important; width:100%!important;'>

						<tr>

							<th>

								V.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

							</th>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:100%!important;'>

						<tr>

							<th>

								<center> <h1 style='font-weight:900;'>AVANCE DE METAS</h1></center>

							</th>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

						<thead>

							<tr>

								<th>
									<center>ACTIVIDADES</center>
								</th>

								<th>
									<center>INDICADOR</center>
								</th>

								<th>
									<center>META PLANIFICADA AL SEMESTRE (A)</center>
								</th>

								<th>
									<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
								</th>

								<th>
									<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
								</th>

							</tr>

						</thead>

						<tbody>";

						$indicadores__administrativos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores ON a1.idActividades=a.idActividad  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idActividad='1' GROUP BY a2.nombreIndicador ORDER BY a.idActividad;");

						foreach ($indicadores__administrativos as $clave => $valor) {

							$percen=(floatval($valor[totalEjecutado])/floatval($valor[totalProgramado]))*100;

							if ($percen>=85) {
								
								$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

							}else if($percen>=70 && $percen<85){

								$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


							}else if($percen<70){

								$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


							}

							$documentoCuerpo.="

							<tr>

							<td><center>".$valor[nombreActividades]."</center></td>
							<td><center>".$valor[nombreIndicador]."</center></td>
							<td><center>".$valor[totalProgramado]."</center></td>
							<td><center>".$valor[totalEjecutado]."</center></td>
							<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen." %</center></td>

							</tr>	

						";

					}



					if ($porcentaje__c__eje__alto>=85) {
						
						$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__eje__alto>=70 && $porcentaje__c__eje__alto<85){

						$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__eje__alto<70){

						$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


					}

					if ($porcentaje__c__eje__alto__parti>=85) {
						
						$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__eje__alto__parti>=70 && $porcentaje__c__eje__alto__parti<85){

						$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__eje__alto__parti<70){

						$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


					}


					if ($porcentaje__c__implementacion__de__e__alto>=85) {
						
						$div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__implementacion__de__e__alto>=70 && $porcentaje__c__implementacion__de__e__alto<85){

						$div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__implementacion__de__e__alto<70){

						$div3="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}



					if ($porcentaje__c__beneficiarios__de__e__alto>=85) {
						
						$div4="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__beneficiarios__de__e__alto>=70 && $porcentaje__c__beneficiarios__de__e__alto<85){

						$div4="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__beneficiarios__de__e__alto<70){

						$div4="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}

					if ($porcentaje__c__preparacion__de__e__alto>=85) {
						
						$div5="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($porcentaje__c__preparacion__de__e__alto>=70 && $porcentaje__c__preparacion__de__e__alto<85){

						$div5="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($porcentaje__c__preparacion__de__e__alto<70){

						$div5="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}


					$documentoCuerpo.="</tbody>

						<tfoot></tfoot>

					</table>";	


					$documentoCuerpo.=" 

					<table style='width:60%!important; margin-top:1em!important;'>

						<tr>

							<th><div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div></th>

							<th>100% - 85%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
							</th>

							<th>84,99% - 70%;</th>
							<th><div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
							</th>
							<th>69,99% - 0%</th>
						</tr>

					</table>

					<table style='width:100%!important; margin-top:1em!important;'>

						<tr>

							<th>
								V.IV. VERIFICACIÓN DE PRESENTACIÓN DE INFORMACIÓN:
							</th>

						</tr>

					</table>

					<table style='width:100%!important; margin-top:1em!important;'>

							<tr>
											
							<td style='width:40%!important;'>	
								<br>
								PAGO SERVICIO BÁSICOS:
							</td>
							</tr>

					</table>
				
				
					<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>

									<center>DESCRIPCIÓN JUSTIFICACIÓN / TAREA</center>

								</th>


								<th>

									<center>ÍTEMS</center>

								</th>

								<th>

									<center>ESTADO</center>

								</th>

								<th>

									<center>Nro. FACTURA / CUR</center>

								</th>

								<th>

									<center>MONTO OBSERVADO</center>

								</th>

								<th>

									<center>DETALLE DE OBSERVACIONES</center>

								</th>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td>
								Pago de agua potable
								</td>


								<td>
								530101
								</td>

								<td>

								".$reporteaguapotable."
									
								</td>

								<td>
								".$aguapotableFactura."
								</td>

								<td>
								".$aguapotableValor."
								</td>

								<td>
								".$aguapotableObservacion."
								</td>

							</tr>

							<tr>

								<td>
								Agua de riego
								</td>


								<td>
								530102
								</td>

								<td>

								".$reporteAguaRiego."
									
								</td>

								<td>
								".$aguaRiegoFactura."
								</td>

								<td>
								".$aguaRiegoValor."
								</td>

								<td>
								".$aguaRiegoObservacion."
								</td>

							</tr>

							<tr>

								<td>
								Pago de energía eléctrica 
								</td>


								<td>
								530104
								</td>

								<td>

								".$reporteEnergiaElec."
									
								</td>

								<td>
								".$energiaElecFactura."
								</td>

								<td>
								".$energiaElecValor."
								</td>

								<td>
								".$energiaElecObservacion."
								</td>

							</tr>

							<tr>

								<td>
								Telefonía fija 
								</td>


								<td>
								530105
								</td>

								<td>

								".$reporteTelefonia."
									
								</td>

								<td>
								".$telefoniaFactura."
								</td>

								<td>
								".$telefoniaValor."
								</td>

								<td>
								".$telefoniaObservacion."
								</td>

							</tr>


						</tbody>

					</table>

					<table style='width:100%!important; margin-top:1em!important;'>

							<tr>
											
							<td style='width:40%!important;'>	
								<br>
								OTROS PAGOS:
							</td>
							</tr>

					</table>
				
				
					<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>

									<center>DESCRIPCIÓN JUSTIFICACIÓN / TAREA</center>

								</th>


								<th>

									<center>ÍTEMS</center>

								</th>

								<th>

									<center>ESTADO</center>

								</th>

								<th>

									<center>Nro. FACTURA / CUR</center>

								</th>

								<th>

									<center>MONTO OBSERVADO</center>

								</th>

								<th>

									<center>DETALLE DE OBSERVACIONES</center>

								</th>

							</tr>

						</thead>

						<tbody>";

							if($trimestre__evaluados__al=="I SEMESTRE"){


								$indicadores__sinContratacionPublica=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'no' and (trimestre='primerTrimestre' or trimestre='segundoTrimestre') and idActividad='1' and a.idOrganismo='$idOrganismo' AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and a.perioIngreso='$periodo__evaluados__anuales1'");

							}else if($trimestre__evaluados__al=="II SEMESTRE"){

								$indicadores__sinContratacionPublica=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'no' and (trimestre='tercerTrimestre' or trimestre='cuartoTrimestre') and idActividad='1' and a.idOrganismo='$idOrganismo' AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and a.perioIngreso='$periodo__evaluados__anuales1'");

							}

							

							$contador=0;

							foreach ($indicadores__sinContratacionPublica as $clave => $valor) {

									$contador++;

									$pagosSinContratacionPublicaSelector = "pagosSinContratacionPublicaSelector" . $contador;
									$FacturaSinContratacionPublica = "FacturaSinContratacionPublica" . $contador;
									$ValorSinContratacionPublica = "ValorSinContratacionPublica" . $contador;
									$observacionSinContratacionPublica = "observacionSinContratacionPublica" . $contador;

									$documentoCuerpo.="<tr><td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td><td> <center>".$$pagosSinContratacionPublicaSelector."</center> </td> <td> <center>".$$FacturaSinContratacionPublica."</center> </td> <td> <center>".$$ValorSinContratacionPublica."</center> </td><td> <center>".$$observacionSinContratacionPublica."</center> </td></tr>";
						
							}

							$documentoCuerpo.="

						</tbody>

					</table>
					
					<table style='width:100%!important; margin-top:1em!important;'>

							<tr>
											
							<td style='width:40%!important;'>	
								<br>
								ADQUISICIÓN DE BIENES Y/O CONTRATACIÓN DE SERVICIO:
							</td>
							</tr>

					</table>
					
				
					<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr>

								<th>

									<center>DESCRIPCIÓN JUSTIFICACIÓN / TAREA</center>

								</th>


								<th>

									<center>ÍTEMS</center>

								</th>

								<th>

									<center>ESTADO</center>

								</th>

								<th>

									<center>Nro. FACTURA / CUR</center>

								</th>

								<th>

									<center>MONTO OBSERVADO</center>

								</th>

								<th>

									<center>DETALLE DE OBSERVACIONES</center>

								</th>

							</tr>

						</thead>

						<tbody>";

							if($trimestre__evaluados__al=="I SEMESTRE"){


								$indicadores__conContratacionPublica=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'si' and (trimestre='primerTrimestre'  or trimestre='segundoTrimestre') AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and idActividad='1' and a.idOrganismo='$idOrganismo' and a.perioIngreso='$periodo__evaluados__anualesContratacion1'");

							}else if($trimestre__evaluados__al=="II SEMESTRE"){

								$indicadores__conContratacionPublica=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'si' and (trimestre='tercerTrimestre' or trimestre='cuartoTrimestre') AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and idActividad='1' and a.idOrganismo='$idOrganismo' and a.perioIngreso='$periodo__evaluados__anualesContratacion1'");

							}

							

							$contador=0;

							foreach ($indicadores__conContratacionPublica as $clave => $valor) {

									$contador++;

									$pagosConContratacionPublicaSelector = "pagosConContratacionPublicaSelector" . $contador;
									$FacturaConContratacionPublica = "FacturaConContratacionPublica" . $contador;
									$ValorConContratacionPublica = "ValorConContratacionPublica" . $contador;
									$observacionConContratacionPublica = "observacionConContratacionPublica" . $contador;

									$documentoCuerpo.="<tr><td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td><td> <center>".$$pagosConContratacionPublicaSelector."</center> </td> <td> <center>".$$FacturaConContratacionPublica."</center> </td> <td> <center>".$$ValorConContratacionPublica."</center> </td><td> <center>".$$observacionConContratacionPublica."</center> </td></tr>";
						
							}

							$documentoCuerpo.="

						</tbody>

					</table>
				
				
					
						<table style='width:100%!important; margin-top:.5em!important;'>

								<tr>

									<th>
										Observaciones:
									</th>

								</tr>

						</table>


						<table style='width:100%!important; margin-top:1em!important;'>

								<tr>

									<td>
										".nl2br($observaciones__alto__seguis)."
									</td>

								</tr>

						</table>


						<table style='width:100%!important; margin-top:.5em!important;'>

								<tr>

									<th>
										Recomendaciones:
									</th>

								</tr>

						</table>


						<table style='width:100%!important; margin-top:1em!important;'>

								<tr>

									<td>
										".nl2br($recomendaciones__alto__seguis)."
									</td>

								</tr>

						</table>";


				




				}else{

					$horizontal=true;

					$documentoCuerpo.="
					<table style='width:100%!important;'>
	
						<tr>
	
							<th>
	
								<center> <h1 style='font-weight:900;'>
	
								<div style='font-size:10px!important; padding:.5em; background:#1b5e20; color:white!important;'>
	
								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSEPC - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> - <span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>
	
								</div>
	
								</h1></center>
	
							</th>
	
						</tr>
	
					</table>
					
					<table style='width:100%!important; margin-top:2em;'>

						<tr>

							<th>

								I. EJERCICIO FISCAL

							</th>

							<th>

							AÑO

							</th>

							<td>

								".$periodo__evaluados__anuales1."

							</td>

						</tr>

					</table>

					<table style='margin-top:1em!important; width:100%!importan;'>

						<tr>

							<th>

								II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

							</th>

						</tr>

					</table>


					<table style='width:100%!important; margin-top:.5em!important;'>

						<tr>

							<th style='width:40%!important;'>

								NOMBRE DE LA ORGANIZACIÓN:

							</th>

							<td style = 'background:#e8edff'>
								".$nombre__organizacion__deportivasContratacion."
							</td>

						</tr>

						<tr>

							<th>

								RUC DE LA ORGANIZACIÓN:

							</th>

							<td style = 'background:#e8edff'>
								".$ruc__organizacion__deportivasContratacion."
							</td>

						</tr>

						<tr>

							<th>

								PRESIDENTE O REPRESENTANTE LEGAL:

							</th>

							<td style = 'background:#e8edff'>
								".$informacionCompletoDosI[0][nombreResponsablePoa]."
							</td>

						</tr>

						<tr>

							<th>

								CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

							</th>

							<td style = 'background:#e8edff'>
								".$correo__organizacion__deportivasContratacion."
							</td>

						</tr>

						<tr>

							<th>

								DIRECCIÓN COMPLETA:

							</th>

							<td style = 'background:#e8edff'>
								".$direccion__organizacion__deportivasContratacion."
							</td>

						</tr>


					</table>

					<table style='margin-top:1em!important; width:100%!importan;'>

						<tr>

							<th>

								III. UBICACIÓN GEOGRÁFICA

							</th>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:100%;'>

						<tr>

							<th style='width:40%!important;'>

								PROVINCIA

							</th>

							<td style = 'background:#e8edff'>
								".$provincia__organizacion__deportivasContratacion."
							</td>

						</tr>

						<tr>

							<th>

								CANTÓN

							</th>

							<td style = 'background:#e8edff'>
								".$canton__organizacion__deportivasContratacion."
							</td>

						</tr>


						<tr>

							<th>

								PARROQUIA

							</th>

							<td style = 'background:#e8edff'>
								".$parroquia__organizacion__deportivasContratacion."
							</td>

						</tr>

						<tr>

							<th>

								BARRIO

							</th>

							<td style = 'background:#e8edff'>
								".$barrio__organizacion__deportivasContratacion."
							</td>

						</tr>

					</table>


					<table style='margin-top:1em!important; width:100%!importan;'>

						<tr>

							<th>

								IV. ALINEACIÓN A LA PLANIFICACIÓN

							</th>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:100%!importan;'>

						<tr>

							<th style='width:40%!important;'>

								ÁREA DE ACCIÓN:

							</th>

							<td style = 'background:#e8edff'>

							".$areaAccion."

							</td>

						</tr>

						<tr>

							<th style='width:40%!important;'>

								OBJETIVO ESTRATÉGICO INSTITUCIONAL

							</th>

							<td style = 'background:#e8edff'>

							".$objetivoS."

							</td>

						</tr>

					</table>

					<table style='margin-top:1em!important; width:100%!importan;'>

						<tr>

							<th>

								V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

							</th>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:100%!importan;'>

						<tr>

							<th>	
								V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL
							</th>

						</tr>";
						$semestre;
						if($trimestre__evaluados__al == "I SEMESTRE"){
							$semestre = "Enero - Junio";
						}elseif($trimestre__evaluados__al == "II SEMESTRE"){
							$semestre = "Julio - Diciembre";
						}


						$documentoCuerpo.="

						
						<tr>
							
							<td style='width:40%!important;'>	
								<br>
								PERÍODO EVALUADO:
							</td>

							<td style = 'background:#e8edff'>	
								<br>
								".$semestre."
							</td>

						</tr>

						<tr>

							<td style='width:40%!important;'>	
								PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):
							</td>

							<td style = 'background:#e8edff'>	
								".$presupuesto__asignado__pais__altosContratacion."
							</td>

						</tr>

					</table>

					<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

						<thead>
								<tr>

														<th colspan='4' style = 'background:#d0cece'>

															<center>PLANIFICADO</center>

														</th>

														<th colspan='6' style='background-color: #e8edff;'>

															<center>EJECUTADO</center>

														</th>

														<th colspan='4' style = 'background:#fce4d6'>

															<center>VERIFICACIÓN DE LA APLICACIÓN DE PROCEDIMIENTOS DE CONTRATACIÓN PÚBLICA</center>

														</th>

								</tr>

								<tr>

								<th style = 'background:#d0cece'>
									<center>CÓDIGO ACTIVIDAD</center>
								</th>

								<th style = 'background:#d0cece'>
									<center>ÍTEM</center>
								</th>

								<th style = 'background:#d0cece'>
									<center>DESCRIPCIÓN DEL ÍTEM</center>
								</th>

								

								<th style = 'background:#d0cece'>
									<center>MONTO PLANIFICADO</center>
								</th>

								

								<th style = 'background:#e8edff'>
									<center>TIPO DE CONTRATACIÓN</center>
								</th>

								<th style = 'background:#e8edff'>
									<center>OBJETO DE LA CONTRATACIÓN</center>
								</th>

								<th style = 'background:#e8edff'>
									<center>MONTO DE LA CONTRATACIÓN </center>
								</th>

								<th style = 'background:#e8edff'>
									<center>PROVEEDOR </center>
								</th>

								<th style = 'background:#e8edff'>
									<center>RUC</center>
								</th>

								<th style = 'background:#e8edff'>
									<center>LINK DE LA PUBLICACIÓN EN EL PORTAL DE COMPRAS PÚBLICAS</center>
								</th>

								<th style = 'background:#fce4d6'>
									<center>CUMPLE LOS MONTOS VIGENTES DE CONTRATACIÓN PUBLICA</center>
								</th>

								<th style = 'background:#fce4d6'>
									<center>EVIDENCIA DE RECURRENCIA DE ÍNFIMAS CUANTÍAS CON UNA MISMA NATURALEZA DEL GASTO</center>
								</th>

								<th style = 'background:#fce4d6'>
									<center> PROCEDIMIENTOS DE CONTRATACIÓN VERIFICADOS</center>
								</th>

								<th style = 'background:#fce4d6'>
									<center> OBSERVACIONES</center>
								</th>

							</tr>

						</thead>

						<tbody>";

						if($trimestre__evaluados__al=="I SEMESTRE"){


							$indicadores__ContratacionPublica=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem,c.totalSumaItem as planificado, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo INNER JOIN poa_programacion_financiera AS c on  a.perioIngreso=c.perioIngreso and a.idOrganismo = c.idOrganismo and a.idItemCatalogo=c.idItem and a.idActividad=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and (a.trimestre='primerTrimestre' or a.trimestre='segundoTrimestre') GROUP BY a.idItemCatalogo  ORDER BY a.idActividad;");

						}else if($trimestre__evaluados__al=="II SEMESTRE"){

							$indicadores__ContratacionPublica=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem,c.totalSumaItem as planificado, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo INNER JOIN poa_programacion_financiera AS c on  a.perioIngreso=c.perioIngreso and a.idOrganismo = c.idOrganismo and a.idItemCatalogo=c.idItem and a.idActividad=c.idActividad WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and (a.trimestre='tercerTrimestre' or a.trimestre='cuartoTrimestre') GROUP BY a.idItemCatalogo  ORDER BY a.idActividad;");

						}

						

						$contador=0;

						foreach ($indicadores__ContratacionPublica as $clave => $valor) {

							if($valor[catalogo__elect] == "si" ){
								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td> <td><center>Catalogo Electrónico</center></td> <td><center>".$valor[catalogo__elect__objeto]."</center></td> <td><center>".$valor[catalogo__elect__monto]."</center></td> <td><center>".$valor[catalogo__elect__proveedor]."</center></td> <td><center>".$valor[catalogo__elect__rucProveedor]."</center></td> <td><center>".$valor[catalogo__elect__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__subasta] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;

								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Subasta Inversa Electrónica</center></td> <td><center>".$valor[catalogo__subasta__objeto]."</center></td><td><center>".$valor[catalogo__subasta__monto]."</center></td> <td><center>".$valor[catalogo__subasta__proveedor]."</center></td> <td><center>".$valor[catalogo__subasta__rucProveedor]."</center></td> <td><center>".$valor[catalogo__subasta__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__infima] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Ínfima Cuantía</center></td> <td><center>".$valor[catalogo__infima__texto]."</center></td><td><center>".$valor[catalogo__infima__monto]."</center></td> <td><center>".$valor[catalogo__infima__proveedor]."</center></td> <td><center>".$valor[catalogo__infima__rucProveedor]."</center></td> <td><center>".$valor[catalogo__infima__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__menorCuantia] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;

								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Menor Cuantía Bienes</center></td> <td><center>".$valor[catalogo__menorCuantia__objeto]."</center></td><td><center>".$valor[catalogo__menorCuantia__monto]."</center></td> <td><center>".$valor[catalogo__menorCuantia__proveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantia__rucProveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantia__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__cotizacion] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Cotización Bienes</center></td><td><center>".$valor[catalogo__cotizacion__objeto]."</center></td> <td><center>".$valor[catalogo__cotizacion__monto]."</center></td> <td><center>".$valor[catalogo__cotizacion__proveedor]."</center></td> <td><center>".$valor[catalogo__cotizacion__rucProveedor]."</center></td> <td><center>".$valor[catalogo__cotizacion__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__licitacion] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Licitación Bienes</center></td> <td><center>".$valor[catalogo__licitacion__objeto]."</center></td><td><center>".$valor[catalogo__licitacion__monto]."</center></td> <td><center>".$valor[catalogo__licitacion__proveedor]."</center></td> <td><center>".$valor[catalogo__licitacion__rucProveedor]."</center></td> <td><center>".$valor[catalogo__licitacion__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__menorCuantiaObras] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Menor Cuantía Obras</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__objeto]."</center></td><td><center>".$valor[catalogo__menorCuantiaObras__monto]."</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__proveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__menorCuantiaObras__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__cotizacionObras] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Cotización Obras</center></td> <td><center>".$valor[catalogo__cotizacionObras__objeto]."</center></td><td><center>".$valor[catalogo__cotizacionObras__monto]."</center></td> <td><center>".$valor[catalogo__cotizacionObras__proveedor]."</center></td> <td><center>".$valor[catalogo__cotizacionObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__cotizacionObras__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__licitacionObras] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td> <td><center>Licitación Obras</center></td> <td><center>".$valor[catalogo__licitacionObras__objeto]."</center></td> <td><center>".$valor[catalogo__licitacionObras__monto]."</center></td> <td><center>".$valor[catalogo__licitacionObras__proveedor]."</center></td> <td><center>".$valor[catalogo__licitacionObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__licitacionObras__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}


							if($valor[catalogo__precioObras] == "si" ){
								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Precio Fijo Obras</center></td> <td><center>".$valor[catalogo__precioObras__objeto]."</center></td><td><center>".$valor[catalogo__precioObras__monto]."</center></td> <td><center>".$valor[catalogo__precioObras__proveedor]."</center></td> <td><center>".$valor[catalogo__precioObras__rucProveedor]."</center></td> <td><center>".$valor[catalogo__precioObras__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__contratacionDirecta] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Contratación Directa</center></td> <td><center>".$valor[catalogo__contratacionDirecta__objeto]."</center></td><td><center>".$valor[catalogo__contratacionDirecta__monto]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__proveedor]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__rucProveedor]."</center></td> <td><center>".$valor[catalogo__contratacionDirecta__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__contratacionListaCorta] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Lista Corta</center></td><td><center>".$valor[catalogo__contratacionListaCorta__objeto]."</center></td><td><center>".$valor[catalogo__contratacionListaCorta__monto]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__proveedor]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__rucProveedor]."</center></td> <td><center>".$valor[catalogo__contratacionListaCorta__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

							if($valor[catalogo__contratacionConcursoPu] == "si" ){

								$contador++;

								$cumpleMontoVigenteCP = "cumpleMontoVigenteCP" . $contador;
								$evidenciaRecurrenciaInfima = "evidenciaRecurrenciaInfima" . $contador;
								$procedimientosContratacionVer = "procedimientosContratacionVer" . $contador;
								$observacionCP = "observacionCP" . $contador;
								
								$documentoCuerpo.="<tr><td><center>".$valor[idActividad]."</center></td> <td><center>".$valor[itemPreesupuestario]."</center></td> <td><center>".$valor[nombreItem]."</center></td> <td><center>".$valor[planificado]."</center></td>  <td><center>Concurso Público</center></td><td><center>".$valor[catalogo__contratacionConcursoPu__objeto]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__monto]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__proveedor]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__rucProveedor]."</center></td> <td><center>".$valor[catalogo__contratacionConcursoPu__texto]."</center></td> <td> <center>".$$cumpleMontoVigenteCP."</center> </td> <td> <center>".$$evidenciaRecurrenciaInfima."</center> </td> <td> <center>".$$procedimientosContratacionVer."</center> </td><td> <center>".$$observacionCP."</center> </td></tr>";
						
							}

						}

						$documentoCuerpo.="

						</tbody>
								
					</table>

					<table style='width:100%!important; margin-top:.5em!important;'>

						<tr>

							<th>
								Observaciones:
							</th>

						</tr>

					</table>


					<table style='width:100%!important; margin-top:1em!important;'>

						<tr>

							<td>
								".nl2br($observaciones__alto__seguisContratacion)."
							</td>

						</tr>

					</table>


					<table style='width:100%!important; margin-top:.5em!important;'>

						<tr>

							<th>
								Recomendaciones:
							</th>

						</tr>

					</table>


					<table style='width:100%!important; margin-top:1em!important;'>

						<tr>

							<td>
								".nl2br($recomendaciones__alto__seguisContratacion)."
							</td>

						</tr>

					</table>

					";

				}

		
				$documentoCuerpo.="

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>";


				if (strpos($subsecretarias__escritas, "Coordinación") !== false){
					$documentoCuerpo.="
					<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>ELABORADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
									<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
									
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>REVISADO Y APROBADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
									<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
						
	
					</table>
	
					";

				}else{

					$documentoCuerpo.="
					<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>ELABORADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
									<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>REVISADO POR:</div>
									<br>
									<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
									<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
								
								</center>		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>";
						
						$sup = $usuarioUsados__seguimientos[0][PersonaACargo];
	
						$usuarioUsados__seguimientos2=$objeto->getObtenerInformacionGeneral("SELECT b.descripcionPuestoInstitucional,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS nombreSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS apellidoSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.descripcionPuestoInstitucional, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 INNER JOIN th_puestoinstitucional AS a2 ON a1.puestoInstitucional=a2.id_PuestoInstitucional WHERE a1.id_usuario=a.PersonaACargo) AS cargoSuperior FROM th_usuario AS a INNER JOIN th_puestoinstitucional AS b ON a.puestoInstitucional=b.id_PuestoInstitucional WHERE a.id_usuario='$sup';");
						
						$documentoCuerpo.="
	
						<tr>
	
							<th style='height:50px!important; width:50%!important;'>
	
								<center>
	
									<div>APROBADO POR: </div>
									<br>
									<div>".$usuarioUsados__seguimientos2[0][nombreSuperior]." ".$usuarioUsados__seguimientos2[0][apellidoSuperior]."</div>
									<div>".$usuarioUsados__seguimientos2[0][cargoSuperior]."</div>
								
								</center>		
								
								
		
	
							</th>
	
							<th style='height:50px!important; width:50%!important;'>
	
	
							</th>
	
						</tr>
	
						
	
					</table>

					
	
					";
				}


		break;

		case  "pdf__seguimientos__altos__2023":


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
									
							".$subsecretarias__escritas." -
							".$direccion__escritas."

							</center>

						</th>

		

						<th colspan='1'>

							<img  src='../../images/titulo__principis__ministerios.png'/>

						</th>
					</tr>

							

				</table>

				<table style='width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

							<div style='font-size:10px!important; padding:.5em; background:#1b5e20; color:white!important;'>

							REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSET - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> - <span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>

							</div>

							</h1></center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							I. EJERCICIO FISCAL

						</th>

						<th>

						AÑO

						</th>

						<td>

							".$periodo__evaluados__anuales."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th style='width:40%!important;'>

							NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							RUC DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							PRESIDENTE O REPRESENTANTE LEGAL:

						</th>

						<td style = 'background:#e8edff'>
							".$informacionCompletoDosI[0][nombreResponsablePoa]."
						</td>

					</tr>

					<tr>

						<th>

							CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							DIRECCIÓN COMPLETA:

						</th>

						<td style = 'background:#e8edff'>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							III. UBICACIÓN GEOGRÁFICA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%;'>

					<tr>

						<th style='width:40%!important;'>

							PROVINCIA

						</th>

						<td style = 'background:#e8edff'>
							".$provincia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							CANTÓN

						</th>

						<td style = 'background:#e8edff'>
							".$canton__organizacion__deportivas."
						</td>

					</tr>


					<tr>

						<th>

							PARROQUIA

						</th>

						<td style = 'background:#e8edff'>
							".$parroquia__organizacion__deportivas."
						</td>

					</tr>

					

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							IV. ALINEACIÓN A LA PLANIFICACIÓN

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							ÁREA DE ACCIÓN:

						</th>

						<td style = 'background:#e8edff'>

						".$areaAccion."

						</td>

					</tr>

					<tr>

						<th style='width:40%!important;'>

							OBJETIVO ESTRATÉGICO INSTITUCIONAL

						</th>

						<td style = 'background:#e8edff'>

						".$objetivoS."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							 V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>	
							V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL
						</th>

					</tr>";
					$semestre;
					if($trimestre__evaluados__al == "I SEMESTRE"){
						$semestre = "Enero - Junio";
					}elseif($trimestre__evaluados__al == "II SEMESTRE"){
						$semestre = "Julio - Diciembre";
					}


					$documentoCuerpo.="

					
					<tr>
						
						<td style='width:40%!important;'>	
							<br>
							PERÍODO EVALUADO:
						</td>

						<td style = 'background:#e8edff'>	
							<br>
							".$periodo__evaluado."
						</td>

					</tr>

					<tr>

						<td style='width:40%!important;'>	
							PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):
						</td>

						<td style = 'background:#e8edff'>	
							".$presupuesto__asignado__pais__altos."
						</td>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							V.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>AVANCE DE METAS</center>

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>

					<thead>

						<tr>

							<th>
								<center>ACTIVIDADES</center>
							</th>

							<th>
								<center>INDICADOR</center>
							</th>

							<th>
								<center>META PLANIFICADA AL SEMESTRE (A)</center>
							</th>

							<th>
								<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
							</th>

							<th>
								<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
							</th>

						</tr>

					</thead>

					<tbody>";

					foreach ($indicadores__altos2023 as $clave => $valor) {

						$percen=(floatval($valor[totalEjecutado])/floatval($valor[totalProgramado]))*100;

						if ($percen>=85) {
							
							$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

						}else if($percen>=70 && $percen<85){

							$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


						}else if($percen<70){

							$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


						}

					$documentoCuerpo.="

						<tr>

							<td><center>0".$valor[idActividad]." - ".$valor[nombreActividades]."</center></td>
							<td><center>".$valor[nombreIndicador]."</center></td>
							<td><center>".$valor[totalProgramado]."</center></td>
							<td><center>".$valor[totalEjecutado]."</center></td>
							<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."</center></td>

						</tr>	

					";

				}

				



				if ($porcentaje__c__eje__alto>=85) {
					
					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto>=70 && $porcentaje__c__eje__alto<85){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto<70){

					$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}

				if ($porcentaje__c__eje__alto__parti>=85) {
					
					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__eje__alto__parti>=70 && $porcentaje__c__eje__alto__parti<85){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__eje__alto__parti<70){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}


				if ($porcentaje__c__implementacion__de__e__alto>=85) {
					
					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__implementacion__de__e__alto>=70 && $porcentaje__c__implementacion__de__e__alto<85){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__implementacion__de__e__alto<70){

					$div3="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}



				if ($porcentaje__c__beneficiarios__de__e__alto>=85) {
					
					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__beneficiarios__de__e__alto>=70 && $porcentaje__c__beneficiarios__de__e__alto<85){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__beneficiarios__de__e__alto<70){

					$div4="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}

				if ($porcentaje__c__preparacion__de__e__alto>=85) {
					
					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($porcentaje__c__preparacion__de__e__alto>=70 && $porcentaje__c__preparacion__de__e__alto<85){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($porcentaje__c__preparacion__de__e__alto<70){

					$div5="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

				}


				$documentoCuerpo.="</tbody>

					<tfoot></tfoot>

				</table>

				<table style='width:60%!important; margin-top:1em!important;'>

					<tr>

						<th><div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div></th>

						<th>100% - 85%;</th>
						<th><div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
						</th>

						<th>84,99% - 70%;</th>
						<th><div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
						</th>
						<th>69,99% - 0%</th>
					</tr>

				</table>
							
				";				


				$documentoCuerpo.="<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<th>V.III. OTROS ASPECTOS TÉCNICOS</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>
								<center>INDICADOR</center>
							</th>

							<th>
								<center>META PLANIFICADA AL SEMESTRE (A)</center>
							</th>


							<th>
								<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
							</th>


							<th>
								<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
							</th>

						</tr>

					</thead>

					<tbody>";

					$indicadores__act3_7_for_recreativo_alto=$objeto->getObtenerInformacionGeneral("select (select coalesce(SUM(totalT)+SUM(totalT18),0) FROM poa_seguimiento_recreativo_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad6Registrado , (select coalesce(SUM(cantidadBienes),0) FROM poa_segimiento_capacitacion AS a1  WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad3Registrado, (select coalesce(SUM(total),0)  FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso='$aniosPeriodos__ingesos' and c.idOrganismo='$idOrganismo' AND c.idActividad = '3') as actividad3, (select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '7') as actividad7,(select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '6') as actividad6,  coalesce(SUM(a.cantidadBienes),0) actividad7Registrado  FROM poa_segimiento_implementacion AS a  WHERE a.idOrganismo='$idOrganismo'   AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;");

					
						foreach ($indicadores__act3_7_for_recreativo_alto as $clave1 => $valor1) {

							

							$percen=(floatval($valor1[actividad3Registrado])/floatval($valor1[actividad3]))*100;
							if (!is_nan($percen)) {
								if ($percen>=85) {
									
									$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen>=70 && $percen<85){

									$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen<70){

									$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$percen1=(floatval($valor1[actividad7Registrado])/floatval($valor1[actividad7]))*100;
							
							if (!is_nan($percen1)) {
								if ($percen1>=85) {
									
									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen1>=70 && $percen1<85){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen1<70){

									$div1="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

							$percen2=(floatval($valor1[actividad6Registrado])/floatval($valor1[actividad6]))*100;

							if (!is_nan($percen2)) {
								if ($percen2>=85) {
									
									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

								}else if($percen2>=70 && $percen2<85){

									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


								}else if($percen2<70){

									$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


								}
							}

								$documentoCuerpo.="

									<tr>
										<td><center>Número de beneficiarios de capacitaciones deportivas:</center></td>
										<td><center>".$valor1[actividad3]."</center></td>
										<td><center>".$valor1[actividad3Registrado]."</center></td>
										<td><center><span>".$div."</span>&nbsp;&nbsp;".$percen."%</center></td>

									</tr>	

									<tr>
											<td><center> Cantidad de implementación deportiva adquirida:</center></td>
											<td><center>".$valor1[actividad7]."</center></td>
											<td><center>".$valor1[actividad7Registrado]."</center></td>
											<td><center><span>".$div1."</span>&nbsp;&nbsp;".$percen1."%</center></td>
		
									</tr>	
								";

							
						}


					
				$documentoCuerpo.="</tbody>

				</table>


				<table style='width:60%!important; margin-top:1em!important;'>

					<tr>

						<th><div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div></th>

						<th>100% - 85%;</th>
						<th><div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
						</th>

						<th>84,99% - 70%;</th>
						<th><div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
						</th>
						<th>69,99% - 0%</th>
					</tr>

				</table>
				

				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>
						
						<td style='width:40%!important;'>	
							
							NÚMERO DE CAPACITADORES:
						</td>

						<td style = 'background:#e8edff'>	
							
							".$capacitadores."
						</td>

					</tr>

					<tr>

						<td style='width:40%!important;'>	
							MONTO DE AUTOGESTIÓN REPORTADO AL SEMESTRE (USD):
						</td>

						<td style = 'background:#e8edff'>	
							".$autogestion."
						</td>

					</tr>";

					$porcentaje = ($autogestion * 100) / $presupuesto__asignado__pais__altos;

					$documentoCuerpo.="<tr>

						<td style='width:40%!important;'>	
						% DE AUTOGESTIÓN EN RELACIÓN AL PRESUPUESTO POA ASIGNADO:
						</td>

						<td style = 'background:#e8edff'>	
							". number_format((float)$porcentaje, 2, '.', '')." %
						</td>

					</tr>
				</table>

				<table style='margin-top:.5em!important; width:30%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr >

								<th colspan='2'  style = 'background:#e8edff'>

									<center>NÚMERO DE MEDALLAS ALCANZAS EN EL TRIMESTRE:</center>

								</th>
			
							</tr>

							<tr>

								<th>

									<center>Oro</center>

								</th>
								<td>

									<center>".$oro__alto."</center>
								
								</td>

							</tr>

						</thead>

						<tbody>

							<tr>

						
								<th>

									<center>Plata</center>

								</th>


								<td>

									<center>".$plata__alto."</center>

								</td>

							

							</tr>

							<tr>

								<th>

									<center>Bronce</center>

								</th>
								<td>

									<center>".$bronce__alto."</center>
								
								</td>

							</tr>

							


						</tbody>

				</table>

				<table style='margin-top:.5em!important; width:50%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

						<thead>

							<tr >

								<th colspan='2'  style = 'background:#e8edff'>

									<center>NÚMERO DE  BENEFICIARIOS DE EVENTOS</center>

								</th>
			
							</tr>

							<tr>

								<th>

									<center>HOMBRES</center>

								</th>
								<td>

									<center>".$hombresB."</center>
								
								</td>

							</tr>

						</thead>

						<tbody>

							<tr>

						
								<th>

									<center>MUJERES</center>

								</th>


								<td>

									<center>".$mujeresB."</center>

								</td>

							

							</tr>

							


						</tbody>

				</table>

				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<th>
							V.IV. VERIFICACIÓN DE PRESENTACIÓN DE INFORMACIÓN:
						</th>

					</tr>

				</table>


				<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

					<thead>

						<tr>

							<th>

								<center>DETALLE</center>

							</th>


							<th>

								<center>CUMPLE</center>

							</th>

							<th>

								<center>OBSERVACIONES</center>

							</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>
								Listado de asistentes de capacitaciones:
							</td>

							<td>

								".$lisAsisCap__tabla__alto."

							</td>

							<td>

								".$lisAsisCap__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Fotocopias de certificados de capacitaciones:	
							</td>

							<td>

								".$fotCerCap__tabla__alto."

							</td>

							<td>

								".$fotCerCap__observ__alto."

							</td>

						</tr>


						<tr>

							<td>
							Registro fotográfico de capacitaciones:	
							</td>

							<td>

								".$regFotCap__tabla__alto."

							</td>

							<td>

								".$regFotCap__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Hojas de vida de profesionales:	
							</td>

							<td>

								".$cvProf__tabla__alto."

							</td>

							<td>

								".$cvProf__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Contrato de profesionales:	
							</td>

							<td>

								".$contProf__tabla__alto."

							</td>

							<td>

								".$contProf__observ__alto."

							</td>

						</tr>


						<tr>

							<td>
							Listados de asistencia de atletas suscrito por los entrenadores o coordinador técnico: 	
							</td>

							<td>

								".$listAsisAtlSusEnt__tabla__alto."

							</td>

							<td>

								".$listAsisAtlSusEnt__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Informe médico y disciplinario de atletas:	
							</td>

							<td>

								".$infMedico__tabla__alto."

							</td>

							<td>

								".$infMedico__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Registro fotográfico de los eventos deportivos:	
							</td>

							<td>

								".$regFotEvenDep__tabla__alto."

							</td>

							<td>

								".$regFotEvenDep__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Reporte de resultados deportivo obtenidos en los eventos en los que participaron:		
							</td>

							<td>

								".$repResDepObt__tabla__alto."

							</td>

							<td>

								".$repResDepObt__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Orden de compra o de servicio de implementación deportiva:		
							</td>

							<td>

								".$ordCompImpl__tabla__alto."

							</td>

							<td>

								".$ordCompImpl__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Actas de entrega recepción de la implementación deportiva adquirida:		
							</td>

							<td>

								".$actEntRecImp__tabla__alto."

							</td>

							<td>

								".$actEntRecImp__observ__alto."

							</td>

						</tr>

						<tr>

							<td>
							Factura de implementación deportiva:	
							</td>

							<td>

								".$factImpDep__tabla__alto."

							</td>

							<td>

								".$factImpDep__observ__alto."

							</td>

						</tr>

					</tbody>

				</table>

				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Observaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($observaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th>
							Recomendaciones:
						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:1em!important;'>

					<tr>

						<td>
							".nl2br($recomendaciones__alto__seguis)."
						</td>

					</tr>

				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ ".$anio."
									
						</td>

					</tr>


				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>ELABORADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
								<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>REVISADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
								<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>";

					$sup = $usuarioUsados__seguimientos[0][PersonaACargo];

					$usuarioUsados__seguimientos2=$objeto->getObtenerInformacionGeneral("SELECT b.descripcionPuestoInstitucional,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS nombreSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS apellidoSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.descripcionPuestoInstitucional, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 INNER JOIN th_puestoinstitucional AS a2 ON a1.puestoInstitucional=a2.id_PuestoInstitucional WHERE a1.id_usuario=a.PersonaACargo) AS cargoSuperior FROM th_usuario AS a INNER JOIN th_puestoinstitucional AS b ON a.puestoInstitucional=b.id_PuestoInstitucional WHERE a.id_usuario='$sup';");
					
					$documentoCuerpo.="

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>APROBADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos2[0][nombreSuperior]." ".$usuarioUsados__seguimientos2[0][apellidoSuperior]."</div>
								<div>".$usuarioUsados__seguimientos2[0][cargoSuperior]."</div>
							
							</center>		
							
							
	

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					

				</table>

				";


		break;


		case  "pdf__seguimientos2023":


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1="../../documentos/seguimiento/informeTecnico__seguimiento/";
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

				<table style='width:100%!important;'>

					<thead>

						<tr>



							<th >

									<center> 
									<h1 style='font-weight:900; text-align:center!important;'>
										COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA <br>
										DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS
									</h1>
									</center>

							</th>

					

						</tr>

					</thead>

				</table>

				<table style='width:100%!important;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

							<div style='font-size:10px!important; padding:.5em; background:#0d47a1; color:white!important;'>

							REPORTE DE SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA - RSEP - DSPPP - <span class='siglas__dinamicas' style='font-weight:bold;'>".$siglas__dinamicas__inputs."</span> - <span class='numerico__dinamicas'>".$numerico__dinamicas__inputs."</span>

							</div>

							</h1></center>

						</th>

					</tr>

				</table>

				<table style='width:100%!important; margin-top:2em;'>

					<tr>

						<th>

							I PERÍODO EVALUADO

						</th>

						<th>

						AÑO

						</th>

						<td style = 'background:#e8edff'>

							".$periodo__evaluados__anuales."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

						</th>

					</tr>

				</table>


				<table style='width:100%!important; margin-top:.5em!important;'>

					<tr>

						<th style='width:40%!important;'>

							NOMBRE DE LA ORGANIZACIÓN:

						</th>

						<td style='width:60%!important; background:#e8edff'>
							".$nombre__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							RUC DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$ruc__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							PRESIDENTE O REPRESENTANTE LEGAL:

						</th>

						<td style = 'background:#e8edff'>
							".$informacionCompletoDosI[0][nombreResponsablePoa]."
						</td>

					</tr>

					<tr>

						<th>

							CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

						</th>

						<td style = 'background:#e8edff'>
							".$correo__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							DIRECCIÓN COMPLETA:

						</th>

						<td style = 'background:#e8edff'>
							".$direccion__organizacion__deportivas."
						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							III. UBICACIÓN GEOGRÁFICA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							PROVINCIA

						</th>

						<td style='width:60%!important; background:#e8edff'>
							".$provincia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							CANTÓN

						</th>

						<td style = 'background:#e8edff'>
							".$canton__organizacion__deportivas."
						</td>

					</tr>


					<tr>

						<th>

							PARROQUIA

						</th>

						<td style = 'background:#e8edff'>
							".$parroquia__organizacion__deportivas."
						</td>

					</tr>

					<tr>

						<th>

							BARRIO

						</th>

						<td style = 'background:#e8edff'>
							".$barrio__organizacion__deportivas."
						</td>

					</tr>


				</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							IV. ALINEACIÓN A LA PLANIFICACIÓN 

						</th>

					</tr>

				</table>


				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th style='width:40%!important;'>

							ÁREA DE ACCIÓN:

						</th>

						<td style='width:60%!important; background:#e8edff'>

							".$area__de__accion__llamados."

						</td>

					</tr>


					<tr>

						<th>

							OBJETIVO ESTRATÉGICO INSTITUCIONAL:

						</th>

						<td style = 'background:#e8edff'>

							".$objetivo__institucional__estrategicos."

						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							V. SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

						</th>

					</tr>

				</table>


				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>

							V.I PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th >

							PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

						</th>

						<td style = 'background:#e8edff'>".$presupuesto__segun__poas."</td>

						<th>

							PERÍODO EVALUADO:

						</th >

						<td style = 'background:#e8edff'>".$periodo__evaluado."</td>

					</tr>

					<tr>

						<th>

							MONTO TRANSFERIDO + REMANENTE:

						</th>

						<td style = 'background:#e8edff'>".$monto__transferido__rema."</td>

						<th>

							MONTO DE EJECUCIÓN REPORTADO AL SEMESTRE:

						</th>

						<td style = 'background:#e8edff'>".$monto__reportado__tri."</td>

					</tr>


					<tr>

						<th>

							PRESUPUESTO PLANIFICADO A EJECUTARSE AL SEMESTRE (USD):

						</th>

						<td style = 'background:#e8edff'>".$monto__ejecutado__trimestre."</td>

						<th>

							% DE AVANCE AL SEMESTRE:

						</th>

						<td style = 'background:#e8edff'>".$avance__trimestre__porcentaje." </td>

					</tr>

					<tr>

						<th >

							% de ejecución esperada al semestre en relación al presupuesto anual:

						</th>

						";
						
					
						if (!empty($segundo__esperado)) {
							
							$documentoCuerpo.="

								<td style = 'background:#e8edff'>

									".$segundo__esperado."

								</td>

							

							";
						}else{

							$documentoCuerpo.="

								<td style = 'background:#e8edff'>
									".$cuarto__esperado."
								</td>

						}

							";

						}


					$documentoCuerpo.="
						<th>

							% de ejecución obtenida al semestre en relación al presupuesto anual:

						</th>";

						if (!empty($segundo__ejecucion)) {
					
							$documentoCuerpo.="
		
								<td style = 'background:#e8edff'>
		
									".$segundo__ejecucion."
		
								</td>
		
							
		
							";
		
						}else{
		
							$documentoCuerpo.="
		
								<td style = 'background:#e8edff'> 
									".$cuarto__ejecucion."
								</td>
		
							
		
							";
		
						}

					


				$documentoCuerpo.="</tr>
				";
			

				

				


				$esigetfetes=$objeto->getObtenerInformacionGeneral("SELECT esigeft FROM poa_trimestrales WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';");

				$documentoCuerpo.="</table>


				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th>

							V.II. RESUMEN DE EJECUCIÓN PRESUPUESTARIA DEL POA

						</th>

					</tr>

				</table>

				<table style='margin-top:.5em!important; width:100%!importan;'>

					<tr>

						<th>

							<center> <h1 style='font-weight:900;'>

								EJECUCIÓN PRESUPUESTARIA DEL POA 

							</center>
							
						</th>

					</tr>

				</table>

				<table class='col col-12' border='1' style='border-collapse: collapse; margin-top:2em!important;'>

					<thead>

						<tr>

							<th><center>ACTIVIDADES</center></th>
							<th style='display:none!important;'><center>MONTO PLANIFICADO POA</center></th>
							<th><center>MONTO PLANIFICADO AL SEMESTRE (A)</center></th>
							<th><center>MONTO DE EJECUCIÓN REPORTADO AL SEMESTRE (B)</center></th>
							<th><center>% DE AVANCE<br>AL SEMESTRE (B/A)</center></th>";

				if ($esigetfetes[0][esigeft]=="si") {
					$documentoCuerpo.="<th><center>MONTO DE<br>EJECUCIÓN EN<br>e-SIGEF2 (C)</center></th>
					<th><center>% DE AVANCE<br>AL SEMESTRE<br>EN e-SIGEF2 (C/A)</center></th>";
				}

			



			$documentoCuerpo.="

						</tr>

					</thead>

					<tbody>



			";

			$array = explode (',',$arrayPorcen);
			$array1 = explode (',',$arrayEsigefts);
			$array2 = explode (',',$arrayPorcenEsigefts);
			$arrayPorcen__inicializados__array = explode (',',$arrayPorcen__inicializados);

			$arrayPorcenEsigefts__programados__array = explode (',',$arrayPorcenEsigefts__programados);


			foreach ($seguimiento__objetos__dimencionales as $clave => $valor) {

				if (!empty($arrayPorcen__inicializados)) {
					
					if ($arrayPorcen__inicializados__array[$clave]>=85) {
						
						$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($arrayPorcen__inicializados__array[$clave]>=70 && $arrayPorcen__inicializados__array[$clave]<85){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($arrayPorcen__inicializados__array[$clave]<70){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


					}
				

				}else{

					if ($array[$clave]>=85) {
						
						$div="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

					}else if($array[$clave]>=70 && $array[$clave]<85){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


					}else if($array[$clave]<70){

						$div="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";

					}	

				}



				if ($array2[$clave]>=85) {
					
					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:green; height:15px!important; width:15px!important;'></div>";

				}else if($array2[$clave]>=70 && $array2[$clave]<85){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:yellow; height:15px!important; width:15px!important;'></div>";


				}else if($array2[$clave]<70){

					$div2="<div style='border-radius: 50%!important; margin-right:1em; background:red; height:15px!important; width:15px!important;'></div>";


				}

				$documentoCuerpo.="

					<tr>";

					if ($valor[actividades]=="OPERACIÓN Y FUNCIONAMIENTO DE ORGANIZACIONES DEPORTIVAS Y ESCENARIOS DEPORTIVOS" && $aniosPeriodos__ingesos=='2022') {
						$documentoCuerpo.=	"<td><center>GESTIÓN ADMINISTRATIVA Y FUNCIONAMIENTO DE ESCENARIOS DEPORTIVOS</center></td>";
					}else if($valor[actividades]=="CAPACITACIÃ“N DEPORTIVA O DE RECREACIÓN" && $aniosPeriodos__ingesos=='2022'){

						$documentoCuerpo.=	"<td><center>CAPACITACIÓN DEPORTIVA O RECREATIVA</center></td>";

					}else{
						$documentoCuerpo.=	"<td><center>".$valor[actividades]."</center></td>";
					}

				

				$documentoCuerpo.=	"	<td style='display:none!important;'><center>".$valor[sumaPlanificacion]."</center></td>";

				if (empty($arrayPorcenEsigefts__programados)) {
					$documentoCuerpo.="<td ><center>".$valor[programado]."</center></td>";
				}else{
					$documentoCuerpo.="<td ><center>".$arrayPorcenEsigefts__programados__array[$clave]."</center></td>";
				}

				


				$documentoCuerpo.="	<td><center>".$valor[ejecutado]."</center></td>";

						if (!empty($arrayPorcen__inicializados)) {

							if ($arrayPorcen__inicializados__array[$clave]=="NaN") {
								$documentoCuerpo.="<td><center>-</center></td>";
							}else{
								$documentoCuerpo.="<td><center><span>".$div."</span>&nbsp;&nbsp;".$arrayPorcen__inicializados__array[$clave]."</center></td>";
							}


						}else{

							if ($array[$clave]=="NaN") {
								$documentoCuerpo.="<td><center>-</center></td>";
							}else{
								$documentoCuerpo.="<td><center><span>".$div."</span>&nbsp;&nbsp;".$array[$clave]."</center></td>";
							}


						}

						if ($esigetfetes[0][esigeft]=="si") {

							if (empty($array1[$clave]) && empty($array2[$clave])){
								$array1[$clave] =0;
								$array2[$clave] =0;
							}
						$documentoCuerpo.="<td><center>".$array1[$clave]."</center></td>
						<td><center><span>".$div2."</span>&nbsp;&nbsp;".$array2[$clave]."</center></td>";

						}

						$documentoCuerpo.="
					</tr>	

				";

			}


			$documentoCuerpo.="

					</tbody>

					<tfoot>

						<tr>

							<th><center>Total</center></th>
							<th style='display:none!important;'><center>".round($planificadoSas,2)."</center></th>
							<th><center>".number_format($programadoSas,2)."</center></th>
							<th><center>".number_format($ejecutadoSas,2)."</center></th>";

							if ($procentajeSas=="NaN") {

								$documentoCuerpo.="<th><center>-</center></th>";

							}else{

								$documentoCuerpo.="<th><center>".number_format($procentajeSas,2)."</center></th>";

							}
						

			if ($esigetfetes[0][esigeft]=="si") {

				$documentoCuerpo.=	"<th><center>".number_format($montosExig,2)."</center></th>
								<th><center>".number_format($procentajeExigefSas,2)."</center></th>";

			}					

			$documentoCuerpo.=	"</tr>

					</tfoot>


				</table>

			";

			$documentoCuerpo.="

				
				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='width:10%!important;'>

							OBSERVACIONES
									
						</th>

					</tr>

					<tr>

						<td style='width:90%!important; text-align:justify!important;'>

							".nl2br($observaciones__seguimientos__cuadros__pdf)."

						</td>

					</tr>

				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='width:10%!important;'>

							RECOMENDACIONES
									
						</th>

					</tr>

					<tr>

						<td style='width:90%!important; text-align:justify!important;'>

							".nl2br($recomendaciones__seguimientos__cuadros__pdf)."

						</td>

					</tr>


				</table>

				<table style='margin-top:1em!important; width:100%!importan;'>

					<tr>

						<td style='width:100%!important; text-align:right;'>

							Fecha de emisión&nbsp;&nbsp; ".$dia."/ ".$mes."/ 2023
									
						</td>

					</tr>


				</table>


				<table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!importan;'>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>ELABORADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombre]." ".$usuarioUsados__seguimientos[0][apellido]."</div>
								<div>".$usuarioUsados__seguimientos[0][descripcionPuestoInstitucional]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

					</tr>

					<tr>

						<th style='height:50px!important; width:50%!important;'>

							<center>

								<div>REVISADO Y APROBADO POR:</div>
								<br>
								<div>".$usuarioUsados__seguimientos[0][nombreSuperior]." ".$usuarioUsados__seguimientos[0][apellidoSuperior]."</div>
								<div>".$usuarioUsados__seguimientos[0][cargoSuperior]."</div>
							
							</center>		

						</th>

						<th style='height:50px!important; width:50%!important;'>


						</th>

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

