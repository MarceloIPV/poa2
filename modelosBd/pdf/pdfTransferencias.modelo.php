<?php
	
	ob_start(); 

	extract($_POST);

	require_once "../../config/config2.php";

	require_once "../../modelosBd/convertirLetras/NumeroALetras.php";

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


	$funcionario=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',a.nombre,a.apellido) AS nombreFuncionario,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS descripcionInfraestructurasF,(SELECT a1.id_FisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS idFisicamenteEstructuras FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioEn';");

	$director=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS nombreDirector,(SELECT a1.PersonaACargo FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS PersonaACargoDirector FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioEn';");

	if (isset($idOrganismo)) {
		$fecha__anios__periodos=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_preliminar_envio WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");
	}

	$subsecretarios=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',nombre,apellido) AS nombreSubses FROM th_usuario WHERE id_usuario='".$director[0][PersonaACargoDirector]."';");

	if ($tipoPdf!="asignacionTecho") {

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


	/*=====================================
	=            Planificación            =
	=====================================*/
	
	$cor__planificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$dir__planificacion=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


	/*=====  End of Planificación  ======*/
	

	$preliminarEnvio=$objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_preliminar_envio WHERE idOrganismo='$idOrganismo';");

	$fechaAsinacion=$objeto->getObtenerInformacionGeneral("SELECT fecha,nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo';");

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

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.abril+a.mayo+a.junio AS segundoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoSegundo,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeSegundo,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoSegundo FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");


		}else if($trimestreEvaluadorDos=="tercerTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.julio+a.agosto+a.septiembre AS tercerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoTercer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeTercer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoTercero FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="cuartoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.octubre+a.noviembre+a.diciembre AS cuartoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoCuarto,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeCuarto,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoCuarto FROM poa_programacion_financiera_dos AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}


	} else {


		if($trimestreEvaluadorDos=="primerTrimestre") {

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.enero+a.febrero+a.marzo AS primerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoPrimer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajePrimer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoPrimer FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="segundoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.abril+a.mayo+a.junio AS segundoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoSegundo,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeSegundo,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoSegundo FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");


		}else if($trimestreEvaluadorDos=="tercerTrimestre"){


			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.julio+a.agosto+a.septiembre AS tercerTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoTercer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeTercer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoTercero FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");

		}else if($trimestreEvaluadorDos=="cuartoTrimestre"){

			$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,(SELECT CONCAT_WS('-',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS nombreActividades, (SELECT CONCAT_WS('-',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE a1.idItem=a.idItem LIMIT 1) AS nombreItem,a.octubre+a.noviembre+a.diciembre AS cuartoTrimestre,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoCuarto,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeCuarto,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND (a1.trimestre='cuartoTrimestre' OR a1.trimestre='tercerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoCuarto FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");


		}

	}
	


	$declaracionRepresentante=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreResponsablePoa, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreResponsablePoa FROM poa_organismo WHERE idOrganismo='$idOrganismo';");
	
	//$seguimiento__en=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,CONCAT_WS('-',c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreActividades,CONCAT_WS('-',b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem,a.enero+a.febrero+a.marzo AS primerTrimestre,a.abril+a.mayo+a.junio AS segundoTrimestre, a.julio+a.agosto+a.septiembre AS tercerTrimestre, a.octubre+a.noviembre+a.diciembre AS cuartoTrimestre,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerCapacitacion, (SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerCompetencia,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerImplementacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b1 ON a1.idAdministrativo=b1.idMantenimiento WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerMantenimiento,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerRecreacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerRecreativos,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b1 ON a1.idAdministrativo=b1.idActividadAd WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaPrimerAdministrativo,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoCapacitacion, (SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoCompetencia,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoImplementacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b1 ON a1.idAdministrativo=b1.idMantenimiento WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoMantenimiento,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoRecreacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoRecreativos,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b1 ON a1.idAdministrativo=b1.idActividadAd WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaSegundoAdministrativo,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroCapacitacion, (SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroCompetencia,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroImplementacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b1 ON a1.idAdministrativo=b1.idMantenimiento WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroMantenimiento,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroRecreacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroRecreativos,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b1 ON a1.idAdministrativo=b1.idActividadAd WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='tercerTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaTerceroAdministrativo,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoCapacitacion, (SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoCompetencia,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoImplementacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b1 ON a1.idAdministrativo=b1.idMantenimiento WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoMantenimiento,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreacion AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoRecreacion,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b1 ON a1.idAdministrativo=b1.idPda WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoRecreativos,(SELECT if(SUM(a1.mensualEjecutado) IS NULL,0,SUM(a1.mensualEjecutado)) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b1 ON a1.idAdministrativo=b1.idActividadAd WHERE b1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' GROUP BY a1.idOrganismo LIMIT 1) AS sumaCuartoAdministrativo,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoPrimer,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajePrimer,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoSegundo,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeSegundo,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='trimestreEvaluador' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoTercero,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='trimestreEvaluador' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeTercero,(SELECT a1.programado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programadoCuarto,(SELECT a1.porcentaje FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS porcentajeCuarto,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='primerTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoPrimer,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='segundoTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoSegundo,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='trimestreEvaluador' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoTercero,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND a1.trimestre='cuartoTrimestre' ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutadoCuarto FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismo' GROUP BY a.idActividad,a.idItem ORDER BY a.idActividad;");
	
	/*=====  End of Seguimientos  ======*/
	
	/*==============================================
	=            Seguimientos relativos            =
	==============================================*/

	if (isset($periodo)) {

		if ($periodo=="primerTrimestre" OR $periodo=="segundoTrimestre") {
			$sumaSemestrales="SUM(a1.enero)+SUM(a1.febrero)+SUM(a1.marzo)+SUM(a1.abril)+SUM(a1.mayo)+SUM(a1.junio)";
		}else if($periodo=="segundoTrimestre"){
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



	


	$usuarioUsados__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT b.descripcionPuestoInstitucional,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS nombreSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS apellidoSuperior,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.descripcionPuestoInstitucional, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM th_usuario AS a1 INNER JOIN th_puestoinstitucional AS a2 ON a1.puestoInstitucional=a2.id_PuestoInstitucional WHERE a1.id_usuario=a.PersonaACargo) AS cargoSuperior FROM th_usuario AS a INNER JOIN th_puestoinstitucional AS b ON a.puestoInstitucional=b.id_PuestoInstitucional WHERE a.id_usuario='$idUSeguimientos';");
	

		$indicadores__altos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");


	/*=====  End of Seguimientos relativos  ======*/

?>


<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdfd
require_once '../../dompdf/autoload.inc.php';

// llamar libreria dompdf
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdfSegunderos = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.h
$pdfSegunderos->setPaper('A3', 'landscape');
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdfSegunderos->load_html(ob_get_clean());
 
// Renderizamos el documento PDF.
$pdfSegunderos->render();


$canvasSegunderos = $pdfSegunderos->get_canvas(); 
$canvasSegunderos->page_text(52, 32, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
$canvasSegunderos->page_text(52, 778, "Código de Programa/Proyecto: ".$codigoProyectoPdf, "helvetica", 8, array(0,0,0)); //footer

   
// obtener el valor generado
$pdfGeneeradoSegunderosPdf= $pdfSegunderos->output();


$parametro3=$idOrganismo."__".$fecha_actual."__".$aniosPeriodos__ingesos;

$documentoProyectoSegunderosPdf = fopen("../../documentos/flujoTransferencia/".$parametro3.".pdf","a");

fwrite($documentoProyectoSegunderosPdf,$pdfGeneeradoSegunderosPdf);


?>