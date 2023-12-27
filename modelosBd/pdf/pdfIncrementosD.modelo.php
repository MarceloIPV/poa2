<?php

ob_start();

extract($_POST);

require_once "../../config/config2.php";

require_once "../../modelosBd/convertirLetras/NumeroALetras.php";

require_once "../../config/files.php";

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();

			$formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);

			if(isset($montoIngresadoModificacion__incrementos)){
				$n = $montoIngresadoModificacion__incrementos;
			$izquierda = intval(floor($n));

			$derecha = intval(($n - floor($n)) * 100);

			$pos = strpos($montoIngresadoModificacion__incrementos,".01");


			if($derecha<1 && $pos === false){

				$numeroLetras=$formatterES->format($izquierda) . " dólares con " . $formatterES->format($derecha)." centavos";

			}else{

				$numeroLetras1=strtolower($formatter->toWords($montoIngresadoModificacion__incrementos));

				$posicionIntermedia=strpos($numeroLetras1,"con");
				$primeraParte = substr($numeroLetras1,0,$posicionIntermedia);
				$segundaParte = substr($numeroLetras1,$posicionIntermedia);
				$numeroLetras= $primeraParte ."dólares ".$segundaParte." centavos";

			}
			}
			

/*============================================
	=            Parametros Iniciales            =
	============================================*/

date_default_timezone_set("America/Guayaquil");

$fecha_actual = date('Y-m-d');

$fechaActualFormato = date('d \d\e F \d\e\l Y');

$hora_actual = date('H:i:s');

$hora_actual2 = date('s');
/*=====  End of Parametros Iniciales  ======*/


session_start();

$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];

$objeto = new usuarioAcciones();

if(isset($idOrganismo__m2)){
	$idOrganismo = $idOrganismo__m2;
}else{
	$idOrganismo = $idOrganismo__m;
}

if(isset($tipoPdf2)){
	$tipoPdf = $tipoPdf2;
}else{
	$tipoPdf = $tipoPdf;
}


$informacionCompleto = $objeto->getInformacionCompletaOrganismoDeportivoConsu($idOrganismo);
$informacionCompletoDosI = $objeto->getInformacionCompletaOrganismoDeportivoConsuDos($idOrganismo);

// $directorConjunto = $objeto->getDirectorPlani();


// $funcionario = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',a.nombre,a.apellido) AS nombreFuncionario,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS descripcionInfraestructurasF,(SELECT a1.id_FisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura LIMIT 1) AS idFisicamenteEstructuras FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioEn';");

// $director = $objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS nombreDirector,(SELECT a1.PersonaACargo FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo LIMIT 1) AS PersonaACargoDirector FROM th_usuario AS a WHERE a.id_usuario='$idUsuarioEn';");

if(isset($idUsuario)){
	$nombreUsuarioAnalista = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',a.nombre,a.apellido) AS nombreUsuario,c.nombre AS cargo, d.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c on c.id_rol = b.id_rol INNER JOIN th_fisicamenteestructura as d on d.id_FisicamenteEstructura = a.fisicamenteEstructura  WHERE a.id_usuario='$idUsuario';
	");
}



$directorPlanificacionN =$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',a.nombre,a.apellido) AS nombres,b.descripcionFisicamenteEstructura,d.nombre FROM th_usuario AS a INNER JOIN th_fisicamenteestructura AS b ON a.fisicamenteEstructura=b.id_FisicamenteEstructura INNER JOIN th_usuario_roles AS c ON c.id_usuario=a.id_usuario INNER JOIN th_roles AS d ON d.id_rol=c.id_rol WHERE a.fisicamenteEstructura='18' AND c.id_rol='2' AND a.estadoUsuario='A';");

// if (isset($idOrganismo)) {
// 	$fecha__anios__periodos = $objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_preliminar_envio WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");
// }

// $subsecretarios=$objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',nombre,apellido) AS nombreSubses FROM th_usuario WHERE id_usuario='".$director[0][PersonaACargoDirector]."';");

// if ($tipoPdf != "asignacionTecho" && $tipoPdf != "asignacion__paid__presupuestarias") {

// 	$finanCompara = false;
// 	$instaCompara = false;
// 	$subsesCompara = false;

// 	/*=====================================================
// 	=            Rangos ministerio del deporte            =
// 	=====================================================*/

	

	

	

	//Subsecretarios
	$subsesAcFi = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$subsesAlto = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesAlto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	//Coordinadores

	$corFinan = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreFinan FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='2' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$corInfra = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInfra FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$corPlani = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombrePlani FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


	//Directores

	$directorPlanificacion = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreUsuario,c.descripcionFisicamenteEstructura,d.nombre FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
	
	$directorRecreacion = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='19' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorDiscapacidad = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorAlto = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='12' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorFormativo = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='13' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


	$directorInfra = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='15' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorInsta = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='6' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorAdministrativo = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='5' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorPlanificacion2 = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreSubsesA FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='5' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$nombresInfra = $objeto->getObtenerInformacionGeneral("SELECT c.descripcionFisicamenteEstructura AS nombreCor FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario = b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' UNION SELECT c.descripcionFisicamenteEstructura AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario = b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE b.id_rol='2' AND a.fisicamenteEstructura='6' AND a.estadoUsuario='A' UNION SELECT c.descripcionFisicamenteEstructura AS nombreInfra FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario = b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE b.id_rol='2' AND a.fisicamenteEstructura='15' AND a.estadoUsuario='A';
	");

	$fechaEnvioIncremento = $objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_incrementos_preliminar_envio WHERE idPoaIncremento = '$idPoaIncremento' AND idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");


	if(isset($informeVTipo)){
		if($informeVTipo == "observaciones"){
			$tituloInforme = "INFORME DE OBSERVACIONES DEL INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA ORGANIZACIONES DEPORTIVAS ".$aniosPeriodos__ingesos;

		}else{
			$tituloInforme = "INFORME DE VIABILIDAD TÉCNICA DEL INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA ORGANIZACIONES DEPORTIVAS ".$aniosPeriodos__ingesos;
		}
	}
// 	/*=====================================
// 	=            Planificación            =
// 	=====================================*/

// 	$cor__planificacion = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

// 	$dir__planificacion = $objeto->getObtenerInformacionGeneral("SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreInsta FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");


// 	/*=====  End of Planificación  ======*/


// 	$preliminarEnvio = $objeto->getObtenerInformacionGeneral("SELECT fecha FROM poa_preliminar_envio WHERE idOrganismo='$idOrganismo';");

// 	$fechaAsinacion = $objeto->getObtenerInformacionGeneral("SELECT fecha,nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idInversionUsuario DESC;");

// 	$tipoOrganismo = $objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND (b.nombreTipo LIKE '%ecuatorianas por%' OR b.nombreTipo LIKE '%pico Ecuatoriano%'  OR b.nombreTipo LIKE '%Federaciones Ecuatorianas de Deporte Adaptado%' OR b.nombreTipo LIKE '%Militar Ecuatoriana%' OR b.nombreTipo LIKE '%Policial Ecuatoriana%' OR b.nombreTipo LIKE '%discapacidad%' OR b.nombreTipo LIKE '%adaptado%');");

// 	$tipoOrganismoDiscapaci = $objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%adaptado%' OR b.nombreTipo LIKE '%discapa%';");

// 	$tipoOrganismoFormativo = $objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%deportivas provinciales%' OR b.nombreTipo LIKE '%deportivas estudiantiles%' OR b.nombreTipo LIKE '%deportivas estudiantiles%' OR b.nombreTipo LIKE '%ecuador%';");

// 	$tipoOrganismoAltoRendimiento = $objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%Ecuatoriano%' OR b.nombreTipo LIKE '%Ecuatoriana%' OR b.nombreTipo LIKE '%ecuatorianas%' OR b.nombreTipo LIKE '%por deporte%';");

// 	$tipoOrganismoRecreativo = $objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%Ligas Deportivas Barriales y Parroquiales del ecuador%' OR b.nombreTipo LIKE '%Asociaciones de ligas barriales y parroquiales%' OR b.nombreTipo LIKE '%Federaciones de ligas provinciales y cantonales, ligas deportivas barriales y parroquiales del Distrito Metropolitano de Quito%';");

// 	$tipoOrganismoZonales = $objeto->getObtenerInformacionGeneral("SELECT b.nombreTipo FROM poa_competencia_organismo_competencia AS a INNER JOIN poa_tipo_organismo AS b ON a.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismo' AND b.nombreTipo LIKE '%deportivas cantonales%' OR b.nombreTipo LIKE '%Deportivas Barriales y Parroquiales%';");


// 	/*================================================
// 	=            Suma actividades e itmes            =
// 	================================================*/

	$actividad1 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='1' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad2 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='2' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad3 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='3' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad4 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='4' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad5 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='5' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad6 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='6' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

	$actividad7 = $objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='7' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

// 	/*=====  End of Suma actividades e itmes  ======*/


// 	/*==================================
// 	=            Suma meses            =
// 	==================================*/

// 	$enero = $objeto->getObtenerInformacionGeneral("SELECT SUM(enero) AS enero FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$febrero = $objeto->getObtenerInformacionGeneral("SELECT SUM(febrero) AS febrero FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$marzo = $objeto->getObtenerInformacionGeneral("SELECT SUM(marzo) AS marzo FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$abril = $objeto->getObtenerInformacionGeneral("SELECT SUM(abril) AS abril FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$mayo = $objeto->getObtenerInformacionGeneral("SELECT SUM(mayo) AS mayo FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$junio = $objeto->getObtenerInformacionGeneral("SELECT SUM(junio) AS junio FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$julio = $objeto->getObtenerInformacionGeneral("SELECT SUM(julio) AS julio FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$agosto = $objeto->getObtenerInformacionGeneral("SELECT SUM(agosto) AS agosto FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$septiembre = $objeto->getObtenerInformacionGeneral("SELECT SUM(septiembre) AS septiembre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$octubre = $objeto->getObtenerInformacionGeneral("SELECT SUM(octubre) AS octubre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$noviembre = $objeto->getObtenerInformacionGeneral("SELECT SUM(noviembre) AS noviembre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
// 	$diciembre = $objeto->getObtenerInformacionGeneral("SELECT SUM(diciembre) AS diciembre FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

// 	/*=====  End of Suma meses  ======*/




// 	if (!empty($tipoOrganismoDiscapaci[0][nombreTipo])) {

// 		$variableDireccion_c = "organizaciones deportivas de Deporte Adaptado para personas con discapacidad";
// 	} else if (!empty($tipoOrganismoFormativo[0][nombreTipo])) {

// 		$variableDireccion_c = "organizaciones deportivas de Deporte formativo";
// 	} else if (!empty($tipoOrganismoAltoRendimiento[0][nombreTipo])) {

// 		$variableDireccion_c = "organizaciones deportivas de Alto rendimiento";
// 	} else if (!empty($tipoOrganismoRecreativo[0][nombreTipo])) {

// 		$variableDireccion_c = "organizaciones deportivas de Recreación";
// 	} else {

// 		$variableDireccion_c = "organizaciones zonales";
// 	}


// 	if (!empty($tipoOrganismo[0][nombreTipo])) {
// 		$variableTipoOrganizacion = "para la Dirección de Deporte Convencional para el Alto Rendimiento y Dirección de Deporte para Personas con Discapacidad";
// 	} else {
// 		$variableTipoOrganizacion = "para la Dirección de Deporte Formativo y Educación física y Dirección de Recreación";
// 	}


// 	/*=====  End of Rangos ministerio del deporte  ======*/

// 	$arrayAsignacion = explode("-", $fechaAsinacion[0][fecha]);

// 	setlocale(LC_TIME, "spanish");

// 	$anioAsignacion = date($arrayAsignacion[0]);
// 	$mesAsignacion = date($arrayAsignacion[1]);
// 	$dateObjAsignacion   = DateTime::createFromFormat('!m', $mesAsignacion);
// 	$monthNameAsignacion = strftime('%B', $dateObjAsignacion->getTimestamp());
// 	$diaAsignacion = date($arrayAsignacion[2]);


// 	setlocale(LC_TIME, "spanish");

// 	$arrayAsignacionDos = explode("-", $preliminarEnvio[0][fecha]);

// 	$anioAsignacionDos = date($arrayAsignacionDos[0]);
// 	$mesAsignacionDos = date($arrayAsignacionDos[1]);
// 	$dateObjAsignacionDos   = DateTime::createFromFormat('!m', $mesAsignacionDos);

// 	if (!empty($dateObjAsignacionDos)) {

// 		$monthNameAsignacionDos = strftime('%B', $dateObjAsignacionDos->getTimestamp());
// 		$diaAsignacionDos = date($arrayAsignacionDos[2]);
// 	}


// 	if ($funcionario[0][idFisicamenteEstructuras] == "13" or $funcionario[0][idFisicamenteEstructuras] == "19") {

// 		$subrectariaNombres = "SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FÍSICA";
// 	} else if ($funcionario[0][idFisicamenteEstructuras] == "12" or $funcionario[0][idFisicamenteEstructuras] == "14") {

// 		$subrectariaNombres = "SUBSECRETARIA DE DEPORTE DE ALTO RENDIMIENTO";

// 		if ($funcionario[0][idFisicamenteEstructuras] == "12") {

// 			$altoRendimientoDirecciones__modficaciones = "DIRECCIÓN DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO";
// 		} else if ($funcionario[0][idFisicamenteEstructuras] == "14") {

// 			$altoRendimientoDirecciones__modficaciones = "DIRECCIÓN DE DEPORTE PARA PERSONAS CON DISCAPACIDAD";
// 		}
// 	} else if ($funcionario[0][idFisicamenteEstructuras] == "5" or $funcionario[0][idFisicamenteEstructuras] == "7") {

// 		$subrectariaNombres = "COORDINACIÓN GENERAL ADMINISTRATIVA FINANCIERA";
// 	} else if ($funcionario[0][idFisicamenteEstructuras] == "6" or $funcionario[0][idFisicamenteEstructuras] == "15") {

// 		$subrectariaNombres = "COORDINACION DE ADMINISTRACION E INFRAESTRUCTURA DEPORTIVA";
// 	}else if($funcionario[0][idFisicamenteEstructuras] == "18"){
// 		$DireccionPlanificacion = "DIRECCIÓN DE PLANIFICACIÓN E INVERSIÓN";
// 	}
// }

$inverion__ancladas=$objeto->getObtenerInformacionGeneral("SELECT b.fecha,b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.estado='I' ORDER BY a.idInversionUsuario DESC;");

$inverion__ancladas__dos=$objeto->getObtenerInformacionGeneral("SELECT a.fecha FROM poa_preliminar_envio AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo';");

$inversion__maximo = $objeto->getObtenerInformacionGeneral("SELECT MAX(idInversion) AS maximo FROM poa_inversion WHERE perioIngreso='$aniosPeriodos__ingesos';");

$inversion__maximo = $objeto->getObtenerInformacionGeneral("SELECT MAX(idInversion) AS maximo FROM poa_inversion WHERE perioIngreso='$aniosPeriodos__ingesos';");

$codigoInformes = $objeto->getObtenerInformacionGeneral("SELECT a2.idInversion,a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo='$idOrganismo' AND a2.estado='A' ORDER BY a1.idInversionUsuario DESC LIMIT 1
");

/*==============================
	=            Fechas            =
	==============================*/

setlocale(LC_TIME, "spanish");

$anio = date('Y');

//$anio="2022";

$anio__acutal = date('m');

$mes = date('m');

$dateObj   = DateTime::createFromFormat('!m', $mes);
$monthName = strftime('%B', $dateObj->getTimestamp());

$dia = date('d');

/*=====  End of Fechas  ======*/


/*====== funciones =========*/

function fechaQuipuxLetras($fechaQuipux){
    setlocale(LC_TIME, 'es_ES.utf-8', 'es_ES', 'es');

    // Convierte la fecha a un formato de palabras
    $fechaEnPalabras = strftime("%d de %B de %Y", strtotime($fechaQuipux));

    // Muestra la fecha en palabras
   return $fechaEnPalabras;
}

/*====== end funciones =========*/


$horizontal = false;

switch ($tipoPdf) {


	case "informeNotificacion__Incrementos__Decrementos": 

		if ($tipoInforme == "incremento") {
			$tipoInformeA = "Incremento";
			$tipoInformeT = "INCREMENTO";

			$documentoCuerpo .= "
							<table style='width:100%!important; margin-top:2em;'>

								<tr style='width: 100%;'>

									<th style='width: 100%;'>
								
										<div style='width: 100%;
										margin: 0;
										padding: 0;
										text-align: center;'>
        									<div style='float: left;
											width: 50%;
											text-align: left;
											margin-left: 0px;'>
												<span style='font-weight: bold;!important'>Quito," . $dia . " de ".$monthName." del ".$aniosPeriodos__ingesos."</span>
        									</div>
        									<div style='float: right;
											width: 50%;
											text-align: right;
											margin-right: 0px;'>
												<span style='font-weight: bold;!important'>Código Asignación: ".$dia."_".$mes."_".$anio."_".$inversion__maximo[0][maximo]."_INC</span>
        									</div>
    									</div>
									</th>
								
								</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<thead>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>Para:</span>" . $informacionCompleto[0][nombreResponsablePoa] ."/".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>
										
									</tr>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>De:</span>" . $directorPlanificacionN[0][nombres] ."</td>
									 
									</tr>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>Asunto:</span>   NOTIFICACIÓN DE ". $tipoInformeT." AL TECHO DE ASIGNACIÓN POA ".$aniosPeriodos__ingesos." - ".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>
										
									</tr>
									
								</thead>

							</table>
							<br>
						
							<table style='width:100%!important; margin-top:2em;'>

								<thead>
									<tr>
										<th style='width:30%!important';>De mi consideración:</th>
									</tr>
								</thead>

							</table>

				
							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										El Art. 130 de la Ley del Deporte, Educación Física y Recreación menciona, “Asignaciones. - De conformidad con el artículo 298 de la Constitución de la República quedan prohibidas todas las preasignaciones presupuestarias destinadas para el sector. La distribución de los fondos públicos a las organizaciones deportivas estará a cargo del Ministerio Sectorial y se realizará de acuerdo a su política, su presupuesto, la planificación anual aprobada enmarcada en el Plan Nacional del Buen Vivir y la Constitución. Para la asignación presupuestaria desde el deporte formativo hasta de alto rendimiento, se considerarán los siguientes criterios: calidad de gestión sustentada en una matriz de evaluación, que incluya resultados deportivos, impacto social del deporte y su potencial desarrollo, así como la naturaleza de cada organización. Para el caso de la provincia de Galápagos se considerará los costos por su ubicación geográfica. Para la asignación presupuestaria a la educación física y recreación, se considerarán los siguientes criterios: de igualdad, número de beneficiarios potenciales, el índice de sedentarismo de la localidad y su nivel socioeconómico, así como la naturaleza de cada organización y la infraestructura no desarrollada. En todos los casos prevalecerá lo dispuesto en el artículo 4 de esta Ley y su Reglamento”. 
									</td>
								</tr>
                                
							</table>
							
							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										Por otra parte, mediante Acuerdo Ministerial Nro. 0456 DE 30 DE DICIEMBRE DE 2021y sus reformas de emite el “PROCEDIMIENTO QUE REGULA EL CICLO DE LA PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS”, en el que establece el CAPÍTULO I DE LAS MODIFICACIONES Y/O INCREMENTOS PRESUPUESTARIO, “Artículo 36. De los incrementos presupuestarios a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva. - Las organizaciones deportivas podrán solicitar incrementos a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, siempre y cuando la actividad y/o ítem a incrementarse no haya sido contemplada en la planificación inicial aprobada, y la misma se encuentre enmarcada en los objetivos del Ministerio del Deporte. Para tal efecto, la organización deportiva deberá solicitar el incremento de recursos conforme los lineamientos que establezca el Ministerio del Deporte durante el ejercicio fiscal
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										“Artículo 37. Del mecanismo de ingreso y recepción de las modificaciones y/o incrementos a las Planificaciones Operativas Anuales o a la Planificación Anual de Inversión. - A través del aplicativo informático se procesarán los trámites de modificación y/o incremento a las Planificaciones Operativas Anuales y/o Planificaciones Anuales de Inversión Deportiva. Para tal efecto, se establecerán formularios y formatos sistematizados que permitan agilizar la carga en línea de la información”
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										“Las solicitudes de modificación y/o incremento de las planificaciones, serán direccionadas por el aplicativo informático a las máximas autoridades de las áreas técnicas, para que en el marco de sus competencias se proceda con el análisis correspondiente; esto es, a la Subsecretaría de Deporte del Alto Rendimiento, a la Subsecretaría de Desarrollo de la Actividad Física, a la Coordinación de Administración e Infraestructura Deportiva, a la Coordinación General Administrativa Financiera, o a la Coordinación General de Planificación y Gestión Estratégica, según corresponda”. A través del referido aplicativo informático, los titulares de las áreas referidas en el párrafo precedente emitirán un informe de viabilidad técnica a la modificación y/o incremento de las planificaciones presentadas por parte de las organizaciones deportivas”
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										“Si durante la tramitación de la solicitud de modificación y/o incremento existieren observaciones o inconsistencias, o en su defecto falta de información, se consolidarán en un solo documento a través del/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte a fin de que se proceda con la correspondiente notificación a las organizaciones deportivas sobre los citados hallazgos”. Las subsanaciones deberán realizarse a través del aplicativo informático en el término de cinco (5) días contados a partir de la notificación, con el fin de que se realice el análisis de las mismas.
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										En caso de que no se justifique lo observado o se mantengan las inconsistencias, el/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte, emitirá el informe correspondiente a través del cual se niegue la aprobación de la modificación y/o incremento a las planificaciones” 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										Por lo expuesto me permito notificar el incremento a la asignación presupuestaria correspondiente al gasto corriente, para el presente ejercicio fiscal, por el monto de <span style='font-weight: bold;!important'>$ ".$montoIngresadoModificacion__incrementos."(".$numeroLetras.")</span>, sin incluir el valor del cinco por mil.  
									</td>
								</tr>		
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td>
										Finalmente, se solicita continuar con el proceso de ingreso de información en el aplicativo conforme las directrices y lineamientos vigentes. 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td>
										Con sentimientos de distinguida consideración. 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td>
										Atentamente, 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:8em;'>
								<tr>
									<td>
										Mgs. Cristian Gustavo Morales Valencia
									</td>
								</tr>
								<tr>
									<td>
										<span style='font-weight: bold;!important'>DIRECTOR DE PLANIFICACIÓN E INVERSIÓN.</span> 
									</td>
								</tr>			
							</table>
							";

		} else if ($tipoInforme == "decremento") {
			$tipoInformeA = "Decremento";
			$tipoInformeT = "DECREMENTO";

			$documentoCuerpo .= "
							<table style='width:100%!important; margin-top:2em;'>

							<tr style='width: 100%;'>

								<th style='width: 100%;'>
							
									<div style='width: 100%;
									margin: 0;
									padding: 0;
									text-align: center;'>
										<div style='float: left;
										width: 50%;
										text-align: left;
										margin-left: 0px;'>
											<span style='font-weight: bold;!important'>Quito," . $dia . " de ".$monthName." del ".$aniosPeriodos__ingesos."</span>
										</div>
										<div style='float: right;
										width: 50%;
										text-align: right;
										margin-right: 0px;'>
											<span style='font-weight: bold;!important'>Código Asignación: ".$dia."_".$mes."_".$anio."_".$inversion__maximo[0][maximo]."_DEC</span>
										</div>
									</div>
								</th>
						
							</tr>

							</table>

							<table style='width:100%!important; margin-top:2em;'>

								<thead>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>Para:</span>   " . $informacionCompleto[0][nombreResponsablePoa] ."/".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>
				
									</tr>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>De:</span>" . $directorPlanificacionN[0][nombres] ."</td>
					
									</tr>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>Asunto:</span>   Notificación de aplicación del Art.44 del Acuerdo Ministerial 456 y sus reformas - Modificación asignación POA ".$aniosPeriodos__ingesos." - ".strtoupper($informacionCompleto[0][nombreOrganismo])."</td>
									
									</tr>
									
								</thead>

							</table>
							<br>
						
							<table style='width:100%!important; margin-top:2em;'>

								<thead>
									<tr>
										<th style='width:30%!important';>De mi consideración:</th>
									</tr>
								</thead>

							</table>

				
							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										El Art. 130 de la Ley del Deporte, Educación Física y Recreación menciona, “Asignaciones. - De conformidad con el artículo 298 de la Constitución de la República quedan prohibidas todas las preasignaciones presupuestarias destinadas para el sector. La distribución de los fondos públicos a las organizaciones deportivas estará a cargo del Ministerio Sectorial y se realizará de acuerdo a su política, su presupuesto, la planificación anual aprobada enmarcada en el Plan Nacional del Buen Vivir y la Constitución. Para la asignación presupuestaria desde el deporte formativo hasta de alto rendimiento, se considerarán los siguientes criterios: calidad de gestión sustentada en una matriz de evaluación, que incluya resultados deportivos, impacto social del deporte y su potencial desarrollo, así como la naturaleza de cada organización. Para el caso de la provincia de Galápagos se considerará los costos por su ubicación geográfica. Para la asignación presupuestaria a la educación física y recreación, se considerarán los siguientes criterios: de igualdad, número de beneficiarios potenciales, el índice de sedentarismo de la localidad y su nivel socioeconómico, así como la naturaleza de cada organización y la infraestructura no desarrollada. En todos los casos prevalecerá lo dispuesto en el artículo 4 de esta Ley y su Reglamento”. 
									</td>
								</tr>
                                
							</table>
							
							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										Por otra parte, mediante Acuerdo Ministerial Nro. 0456 DE 30 DE DICIEMBRE DE 2021y sus reformas de emite el “PROCEDIMIENTO QUE REGULA EL CICLO DE LA PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS”, en el que establece el CAPÍTULO I DE LAS MODIFICACIONES Y/O INCREMENTOS PRESUPUESTARIO, “Artículo 36. De los incrementos presupuestarios a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva. - Las organizaciones deportivas podrán solicitar incrementos a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, siempre y cuando la actividad y/o ítem a incrementarse no haya sido contemplada en la planificación inicial aprobada, y la misma se encuentre enmarcada en los objetivos del Ministerio del Deporte. Para tal efecto, la organización deportiva deberá solicitar el incremento de recursos conforme los lineamientos que establezca el Ministerio del Deporte durante el ejercicio fiscal
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										La Ley del Deporte, Educación Física y Recreación Título XVI De las Sanciones. 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										“Art. 166.- Del incumplimiento y Tipos de Sanciones.- El incumplimiento de las disposiciones consagradas en la presente Ley por parte de los dirigentes, autoridades, técnicos en general, así como las y los deportistas, dará lugar a que el Ministerio Sectorial, respetando el debido proceso, imponga las siguientes sanciones : 1. Amonestación; 2. Sanción económica; 3. Suspensión temporal; 4. Suspensión definitiva; y, 5. Limitación, reducción o cancelación de los estímulos concedidos.
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
									Art. 173.- De la Sanción Económica.- Se contemplan tres tipos de sanciones económicas, a saber: 1. Multas; 2. Suspensión temporal de asignaciones presupuestarias; y, 3. Retiro definitivo de asignaciones presupuestarias. (...) en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia”. (énfasis añadido) El Informe Nro. DPO-0009-2019 emitido por la Contraloría General del Estado “Examen especial a las transferencias, uso, liquidación y control de los recursos financieros entregados a las Ligas Deportivas de la provincia de Orellana por el Ministerio del Deporte” En la recomendación 5, establece que: “Previo a realizar las transferencias económicas a los Organismos Deportivos solicitará al Coordinador Zonal, remita el detalle de los Organismos Deportivos que no cumplieron con la presentación de la información para el seguimiento y evaluación de los POAS, a fin de suspender oportunamente las transferencias de los recursos financieros, hasta que presenten la documentación completa para el seguimiento y evaluación”. 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										Artículo 43. Incumplimiento en la presentación de información.- En el caso de que las  organizaciones deportivas no presenten la información para el proceso de seguimiento y  evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la  Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta  que las organizaciones deportivas presenten lo requerido.  
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										Artículo 44. De la reactivación de las transferencias. - La organización deportiva podrá solicitar la reactivación de las transferencias de recursos, siempre y cuando dicha petición se efectúe hasta los quince primeros días del mes siguiente en el cual se configuró el incumplimiento, y que haya reportado a través del aplicativo informático la información señalada en el artículo 42 del presente Acuerdo Ministerial. En cuyo caso, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera la verificación del cumplimiento de las obligaciones de la organización deportiva y solicitará la reactivación de las transferencias.   
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										En caso de que las organizaciones deportivas no presenten la información en los tiempos y  formatos establecidos en el párrafo precedente, la Dirección de Seguimiento de Planes,  Programas y Proyectos, solicitará a la Dirección de Planificación e Inversión, se revise la  planificación de las organizaciones deportivas y se ajuste las actividades a los meses restantes del  ejercicio fiscal, sin que pueda reclamarse la asignación retroactiva de valores.    
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td style='text-align:justify!important;'>
										Por lo expuesto, me permito notificar la asignación presupuestaria correspondiente al gasto corriente, para el presente ejercicio fiscal, por el monto de <span style='font-weight: bold;!important'>$ ".$montoIngresadoModificacion__incrementos."(".$numeroLetras.")</span>, sin incluir el valor del cinco por mil,considerando la reducción conforme a la aplicación del artículo 44 del Acuerdo Ministerial Nro.
										0456 de 30 de diciembre de 2021 y sus reformas.   
									</td>
								</tr>	
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								
								<tr>
									<td>
										Finalmente, se solicita realizar un ajuste a las actividades, ajustando al monto de la
										nueva asignación, considerando eventos, tareas y/o intervenciones que no hayan sido ejecutadas. 
									</td>
								</tr>
											
							</table>

							<table style='width:100%!important; margin-top:2em;'>
								
								<tr>
									<td>
										Con sentimientos de distinguida consideración. 
									</td>
								</tr>			
							</table>


							<table style='width:100%!important; margin-top:2em;'>
								<tr>
									<td>
										Atentamente, 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:8em;'>
								<tr>
									<td>
										Mgs. Cristian Gustavo Morales Valencia
									</td>
								</tr>			
								<tr>
									<td>
										<span style='font-weight: bold;!important'>DIRECTOR DE PLANIFICACIÓN E INVERSIÓN.</span> 
									</td>
								</tr>			
							</table>
							";			
		}

		$parametro1 = VARIABLE__BACKEND . "incrementosDecrementos/notificacion".$tipoInformeA."/";
		$parametro2 = $idOrganismo . "__" . "Notificacion" . $tipoInformeA . "__" . $fecha_actual . "__" . $hora_actual2;
		$parametro3 = $idOrganismo . "__" . "Notificacion" . $tipoInformeA . "__" . $fecha_actual . "__" . $hora_actual2;


	break;

	case "Certificado__No__Recurso":

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

			$parametro1="../../documentos/seguimiento/informeTecnico__seguimiento/";
			$parametro2="seguimientoInformesTecnicos";	
			$parametro3=$idOrganismo."__".$fecha_actual;
	break;

	case "Certificado__No__Recursos":

		// $fechaQuipuxInforme = fechaQuipuxLetras($fechaQuipux);
		$fechaQuipuxInforme = fechaQuipuxLetras("2023-11-13");

		$documentoCuerpo .= "
							<table style='width:100%!important; margin-top:2em; font-size:1.2em !important;'>

							<tr style='width: 100%;'>

								<th style='width: 100%;'>
							
									<div style='width: 100%;
									margin: 0;
									padding: 0;
									text-align: center;'>
										<div style='float: left;
										width: 50%;
										text-align: left;
										margin-left: 0px;'>
											<span style='font-weight: bold;!important'>Quito," . $dia . " de ".$monthName." del ".$aniosPeriodos__ingesos."</span>
										</div>
										<div style='float: right;
										width: 50%;
										text-align: right;
										margin-right: 0px;'>
											<span style='font-weight: bold;!important'>Código Asignación: ".$dia."_".$mes."_".$anio."_".$inversion__maximo[0][maximo]."</span>
										</div>
									</div>
								</th>
						
							</tr>

							</table>

							<table style='width:100%!important; margin-top:4em; font-size:1.2em !important;'>

								<thead>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>Para:</span> Sr. Lcdo. Raul Esteban Iturralde Vásconez / DIRECTOR DE RECREACIÓN</td>
				
									</tr>

									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>De:</span>" . $directorPlanificacionN[0][nombres] ."</td>
					
									</tr>
									
								</thead>

							</table>

							<table style='width:100%!important; margin-top:2em; font-size:1.2em !important;'>

								<thead>
									<tr>
										<td style='width:30%!important;'><span style='font-weight: bold;!important'>Asunto:</span> Certificación de no existir recurso del POA ".$aniosPeriodos__ingesos." de la ".$nombreEvento."</td>
							
									</tr>
								</thead>

							</table>
						
							<table style='width:100%!important; margin-top:2em;font-size:1.2em !important;'>

								<thead>
									<tr>
										<th style='width:30%!important';>De mi consideración:</th>
									</tr>
								</thead>

							</table>

				
							<table style='width:100%!important; margin-top:2em;font-size:1.2em !important;'>
								<tr>
									<td style='text-align:justify!important;'>
										En atención al Memorando ".$numeroMemo.", de ".$fechaQuipuxInforme.", mediante el cual la". $nombreDireccion ." solicita “... se emita la certificación de no duplicidad de ".$informacionCompleto[0][nombreOrganismo]. ", toda vez que está dirección a verificado la no duplicidad de los eventos del organismo deportivo en mención”.  
									</td>
								</tr>
                                
							</table>
							
							<table style='width:100%!important; margin-top:2em; font-size:1.2em !important;'>
								<tr>
									<td style='text-align:justify!important;'>
										Considerando lo señalado en el Memorando referido, y toda vez que, la".$nombreDireccion."ha verificado la no duplicidad de los eventos, me permito certificar que ".$valorCertificacion." existe recursos públicos del POA/PAID  ".$aniosPeriodos__ingesos." del organismo en cuestión, para la asignación de recursos correspondiente a “".$nombreEvento."” 
									</td>
								</tr>			
							</table>

							
							<table style='width:100%!important; margin-top:2em; font-size:1.2em !important;'>
								
								<tr>
									<td>
										Con sentimientos de distinguida consideración. 
									</td>
								</tr>			
							</table>


							<table style='width:100%!important; margin-top:2em; font-size:1.2em !important;'>
								<tr>
									<td>
										Atentamente, 
									</td>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:8em;color:#240bb4!important;font-style: italic;!important'>
								<tr>
									<th>
										Documento firmado electrónicamente 
									</th>
								</tr>			
							</table>

							<table style='width:100%!important; margin-top:1em;font-size:1.2em !important;'>
								<tr>
									<td>
										Mgs. Cristian Gustavo Morales Valencia
									</td>
								</tr>			
								<tr>
									<td>
										<span style='font-weight: bold;!important'>DIRECTOR DE PLANIFICACIÓN E INVERSIÓN.</span> 
									</td>
								</tr>			
							</table>
							";	
							
			$parametro1=VARIABLE__BACKEND."planifiacionPdfGeneradoIncremento/";
			$parametro2="InformeNoRecursos";	
			$parametro3=$idOrganismo;
	break;

	case "Informe__Incremento__Instalaciones":

		$documentoCuerpo.='


					<table style="margin-top:4em!important; font-size: 1.3em!important;" align="center">

						<tr>

							<th align="center">SUBSECRETARÍA DE DESARROLLO DE LA <br> ACTIVIDAD FÍSICA</th>

						</tr>

					</table>

					<table style="margin-top:2em!important;font-size: 1.3em!important;" align="center">

						<tr>

							<th align="center">COORDINACIÓN DE ADMINISTRACIÓN E <br> INFRAESTRUCTURA DEPORTIVA</th>

						</tr>

					</table>


					<table style="margin-top:2em!important;font-size: 1.3em!important;" align="center">

						<tr>
							<th align="center">DIRECCIÓN DE ADMINISTRACIÓN DE INSTALACIONES <br> DEPORTIVAS</th>
						</tr>

					</table>


					<table style="margin-top:2em!important;font-size: 1.3em!important;" align="center">
						<tr>

							<th align="center">'.$tituloInforme.'</th>

						</tr>

					</table>

					<br>

					<table style="width:100%!important; margin-top:2em;font-size: 1.1em!important;">

						<tr>

							<td align="justify">

								“Describir el nombre de la intervención de mantenimiento propuesta por el OD” 

							</td>

						</tr>	

						<br>

						<tr>
							<th align="center">
								Fecha del informe: '.$fecha_actual.'
							</th>
						</tr>
					</table>

					<br>

					<table style="width:100%!important; margin-top:2em; font-size: 1.3em!important;">

						<tr>

							<th align="center">

								ACTIVIDAD 002

							</th>

						</tr>
						
						<tr>

							<th align="center">

								"Nombre del Organismo Deportivo"

							</th>

						</tr>

					</table>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<table style="width:100%!important; margin-top:1em!important;">

						<tr>

							<td>1</td>

							<th align="left">

								DATOS GENERALES DEL OBJETO DE FINANCIAMIENTO

							</th>

						</tr>	

					</table>

					<table style="width:100%!important; margin-top:2em!important;">

						<tr>

							<th align="left">

								1.1. NOMBRE DEL OBJETO DE FINANCIAMIENTO (INTERVENCIÓN A REALIZAR   
								
							</th>

						</tr>	


						<tr>

							<td align="justify">
							
								llenar
								
							</td>

						</tr>	

					</table>


					<table style="width:100%!important; margin-top:2em!important;">

						<tr>

							<th align="left">

								1.2 INFORMACIÓN GENERAL DEL ORGANISMO DEPORTIVO/ ENTIDAD BENEFICIARIA

							</th>

						</tr>	

					</table>


					<table style="width:100%!important; margin-top:2em!important;">

						<tr>

							<th align="left" style="margin-left:20px!important;">

								1.2.1 Datos del organismo deportivo / entidad solicitante

							</th>

						</tr>
						
						
						<br>


						<tr>

							<th align="left" style="margin-left:40px!important;width:40%!important;">

								-  Nombre:

							</th>

							<td align="left" style="width:60%!important;">

								llenar

							</td>

						</tr>	

						<tr>

							<th align="left" style="margin-left:40px!important;width:40%!important;">

								-  RUC:

							</th>

							<td align="left" style="width:60%!important;">

								llenar

							</td>

						</tr>
						
						<tr>

							<th align="left" style="margin-left:20px!important;width:40%!important;">

								1.2.2 Número y fecha del Acuerdo Ministerial:

							</th>

							<td style="width:60%!important;">
								llenar
							</td>

						</tr>

						<tr>

							<th align="left" style="margin-left:20px!important;width:60%!important;">

								1.2.3 Datos del representante legal de la entidad solicitante:

							</th>

						</tr>

						<tr>

							<th align="left" style="margin-left:40px!important;width:40%!important;">

								-  Nombres y apellidos:

							</th>

							<td align="left" style="width:60%!important;">

								llenar

							</td>

						</tr>

						
						<br>
						
						<tr>

							<th align="left" style="margin-left:40px!important;width:40%!important;">

								-  Dirección:

							</th>

							<td align="left" style="width:60%!important;">

								llenar

							</td>

						</tr>

						<br>

						<tr>

							<th align="left" style="margin-left:40px!important;width:40%!important;">

								-  Correo electrónico:

							</th>

							<td align="left" style="width:60%!important;">

								llenar

							</td>

						</tr>

						<br>

						<tr>

							<th align="left" style="margin-left:40px!important;width:40%!important;">

								-  Teléfono convencional y celular

							</th>

							
							<td align="left" style="width:60%!important;">

								llenar

							</td>

						</tr>

					</table>


					<table style="width:100%!important; margin-top:2em!important;">

						<tr>

							<th align="left">

								1.3 MONTO DE FINANCIAMIENTO

							</th>

						</tr>
						
						<tr>
							<td align="justify">
								El Organismo Deportivo solicita el recurso para incremento del POA Corriente 2022 en la actividad 002, de conformidad al siguiente detalle:
							</td>
						</tr>

					</table>


					<br>

					<table style="margin-top:2em!important; width:60%!important; border-collapse: collapse;" border="1" align="center" class="table table-hover">

						<thead>

							<tr style="background:#e8edff;">

								<th align="center">
									INSTITUCIÓN
								</th>


								<th align="center">
									APORTE USD $
								</th>


								<th align="center">
									PORCENTAJE % 
								</th>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td>
									Ministerio del Deporte
								</td>


								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

							</tr>


							<tr>

								<td>

									Ministerio del Deporte <br>

									5x1000 Contraloría General <br>
									
									del Estado 

								</td>

								<td align="center">
									llenar
								
								</td>

								<td align="center">
									llenar
								</td>

							</tr>

							<tr>

								<td>
									Autogestión (Organismo

									Deportivo)

								</td>

								<td align="center">
									LLENAR
								
								</td>

								<td align="center"
									llenar
								</td>

							</tr>

							<tr style="background:#e8edff">

								<td align="center">
									Total
								</td>

								<td align="center">
									llenar
								
								</td>

								<td align="center">
									llenar
								</td>

							</tr>

							

						</tbody>

					</table>';



				$documentoCuerpo .='
					
					<table style="margin-top:2em!important; width:100%!important;">

						<tr>
							<th align="left">
								1.4 FECHA DE EJECUCIÓN
							</th>
						</tr>
						<tr>
							
							<td align="justify">

								El objeto de financiamiento “nombre de la intervención” del (detallar el escenario deportivo) de la (llenar nombre del organismo deportivo)” tendrá un tiempo de ejecución de (LLENAR) días, contados a partir de la firma del documento habilitante. Dentro de la matriz de incremento al POA y hoja auxiliar de mantenimiento o rehabilitación el Organismo Deportivo detalla el recurso para el mes de (LLENAR) 20XX.

							</td>

						</tr>	

					</table>

					<br>

					<table style="margin-top:2em!important; width:100%!important;">

						<tr>
							<th align="left">
								1.5 COBERTURA Y LOCALIZACIÓN
							</th>
						</tr>
						<tr>
							
							<td align="justify">

								El Organismo Deportivo solicita recursos para mantenimiento o rehabilitación, en la actividad 002

							</td>

						</tr>	

					</table>

					<br>

					<table style="margin-top:2em!important; width:50%!important; border-collapse: collapse;" border="1" align="center">


						<tbody>

							<tr style="background:#e8edff;">

								<td style="width:30%!important;background:#e8edff;">
									País:
								</td>


								<td align="left" style="width:70%!important;background:#e8edff;">
									llenar
								</td>

							</tr>


							<tr>

								<td style="width:30%!important;">
									Provincia
								</td>

								<td align="left" style="width:70%!important;">
									llenar
								
								</td>

							</tr>

							<tr>

								<td style="width:30%!important;background:#e8edff;">
									Cantón
								</td>

								<td align="left" style="width:70%!important;background:#e8edff;">
									LLENAR
								
								</td>

							</tr>

							<tr>

								<td style="width:30%!important;">
									Parroquia / Comunidad
								</td>

								<td align="left" style="width:70%!important;">
									llenar
								
								</td>

							</tr>

							<tr>

								<td style="width:30%!important;background:#e8edff;">
									Ubicación específica <br>(Nombre del coliseo,<br> estadio, otros, si aplica)
								</td>

								<td align="left" style="width:70%!important;background:#e8edff;">
									llenar
								
								</td>

							</tr>
							

						</tbody>

					</table>

					<table style="margin-top:2em!important; width:100%!important;">

						<tr>

							<th align="left">

								1.6. IDENTIFICACIÓN Y CARACTERIZACIÓN DE LA POBLACIÓN BENEFICIARIA

							</th>

						</tr>
						
						<tr>

							<th align="left" style="margin-left:20px!important;">

								1.6.1. Beneficiarios Directos

							</th>

						</tr>
						<tr>

							<td align="left" style="margin-left:40px!important;">

								Son las personas que se beneficiaran directamente de la ejecución del objeto de financiamiento, en este caso se refiere a (LLENAR)

							</td>

						</tr>

					</table>

					<br>

					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

						<thead>

							<tr>

								<th align="center" rowspan="3" style="background:#498CCA;">
									BENEFICIARIOS DIRECTOS
								</th>


								<th align="center" rowspan="2" colspan="2" style="background:#498CCA;">
									RANGO DE EDAD
								</th>


								<th align="center" rowspan="2" colspan="2" style="background:#498CCA;">
									SEXO 
								</th>

								<th align="center" rowspan="2" colspan="3" style="background:#498CCA;">
									ETNIA  
								</th>

								<th align="center" rowspan="3" style="background:#498CCA;">
									TOTAL  
								</th>

							</tr>

						</thead>

						<tbody>

							<tr>
								
							</tr>
							<tr>

								<th align="center" style="background:#e8edff;">
									Desde
								</th>


								<th align="center" style="background:#e8edff;">
									Hasta
								</th>

								<th align="center" style="background:#e8edff;">
									Masculino
								</th>

								<th align="center" style="background:#e8edff;">
									Femenino
								</th>

								<th align="center" style="background:#e8edff;">
									Mestizo
								</th>

								<th align="center" style="background:#e8edff;">
									Blanco
								</th>

								<th align="center" style="background:#e8edff;">
									Afro
								</td>

							</tr>


							<tr>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>

								<td align="center">
									llenar
								</td>
							</tr>

						</tbody>

					</table>

					<br>

					<table style="margin-top:2em!important; width:100%!important;" align="center">
						
						<tr>

							<th align="left" style="margin-left:20px!important">

								1.6.2. Beneficiarios Indirectos

							</th>

						</tr>

					</table>

					<table style="margin-top:2em!important; width:60%!important; border-collapse: collapse;" border="1" align="center">

						<tbody>';

						if(!empty($registro)) {

							$documentoCuerpo.= '
								   <tr>
	   
								   	<td style="width:40%!important;">
								  	 Ministerio del Deporte
							   		</td>


									<td align="center" style="width:20%!important;">
										llenar
									</td>

									<td align="center" style="width:40%!important;">
										llenar
									</td>
	   
								   </tr>
	   
							   ';
	   
						}


					$documentoCuerpo.='

					

				 	</tbody>

				 </table>';
							

				 $documentoCuerpo.='
					<table style="margin-top:2em!important; width:100%!important;">

						<tr>

							<th align="left">

								2 CARACTERIZACIÓN DEL OBJETO DE FINANCIAMIENTO: 

							</th>

						</tr>	

					</table>

					<br>

					<table style="margin-top:2em!important; width:100%!important;">

						<tr>

							<th align="left">

							2.1 ANTECEDENTES  

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:20px!important">
								llenar
							</td>
						</tr>

						
						<tr>

							<th align="left">

							2.2 ARTICULACIÓN NORMATIVA  

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:20px!important">
								llenar
							</td>
						</tr>
						
						<tr>

							<th align="left">

							2.3 JUSTIFICACIÓN  

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:20px!important">
								llenar
							</td>
						</tr>

						<tr>

							<th align="left">

							2.4 OBJETIVO GENERAL Y OBJETIVOS ESPECÍFICOS 

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:20px!important">
								llenar
							</td>
						</tr>

						<tr>

							<th align="left" style="margin-left:20px!important">

							2.4.1 Objetivo general o propósito 

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:40px!important">
								llenar
							</td>
						</tr>

						<tr>

							<th align="left" style="margin-left:20px!important">

							2.4.2 Objetivos Específicos

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:40px!important">
								llenar
							</td>
						</tr>

						<tr>

							<th align="left" style="margin-left:20px!important">

							2.4.3 META E INDICADOR DEL OBJETO DE FINANCIAMIENTO 

							</th>

						</tr>
						
						<tr>
							<td align="justify" style="margin-left:40px!important">
								llenar
							</td>
						</tr>

					</table>';


					$documentoCuerpo.='
					
					<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">

						<tr>

							<th align="center" colspan="8" style = "background:#A6D69D;">

								Matriz de Destino (RECURSOS)

							</th>

						</tr>
						
						<tr>
							<th align="center" style="background:#C8CBC8;" >
								N°
							</th>

							<th align="center" style="background:#C8CBC8;">
								Programa
							</th>

							<th colspan="2" align="center" style="background:#C8CBC8;">
								Nombre de la Actividad
							</th>

							<th align="center" style="background:#C8CBC8;">
								Código Ítem Presupuestario
							</th>

							<th align="center" style="background:#C8CBC8;">
								Nombre del ítem Presupuestario
							</th>

							<th align="center" style="background:#C8CBC8;">
								Programación Financiera/DIC 
							</th>

							<th align="center" style="background:#C8CBC8;">
								Total Programado
							</th>
						</tr>

						<tbody>';
						if(!empty($registro)) {

							$documentoCuerpo.= '
								<tr>
	   
								   	<td>
								  	 1
							   		</td>


									<td align="center">
										Fortalecimiento del deporte nacional
									</td>

									<td align="center">
										002 
									</td>
									<td align="center">
										MANTENIMIENTO DE ESCENARIOS E INFRAESTRUCTURA DEPORTIVA
									</td>

									<td align="center">
										530606
									</td>

									<td align="center">
										Honorarios
									</td>

									<td align="center">
										Llenar $xxxx
									</td>

									<td align="center">
										Llenar $xxxx
									</td>

	   							</tr>
	   
							';
	   
						}


						$documentoCuerpo.='

							<tr>
								<td colspan="7" align="center" style = "background:#A6D69D;">TOTAL INCREMENTO SIN INCLUIR EL 5X1000</td>
								<td style = "background:#A6D69D;">llenar $xxxx</td>
							</tr>
						</tbody>

				 	</table>';				
						
						
						
				$documentoCuerpo.='

				<table class="col col-12" style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1" align="center">
					
						<tr>
							<th colspan="9" align="center" style = "background:#A6D69D;">Matriz de Destino (Indicadores)</th>
						</tr>
						<tr>
							<th rowspan="2" align="center" style="background:#C8CBC8;">
								N°
							</th>
							<th rowspan="2" align="center" style="background:#C8CBC8;">
								Programa
							</th>
							<th colspan="2" rowspan="2" align="center" style="background:#C8CBC8;">
								Nombre de la Actividad	
							</th>
							<th rowspan="2" align="center" style="background:#C8CBC8;">
								Indicador
							</th>
							<th align="center" style="background:#C8CBC8;">
								Programación Mensual Meta / DIC
							</th>
							<th rowspan="2" align="center" style="background:#C8CBC8;">
								Meta Anual del indicador
							</th>
							<th colspan="2" colspan="2" align="center" style="background:#C8CBC8;">
								Beneficiarios
							</th>
						</tr>
						<tr>

							<td>
								<th>Masculino</th>
								<th>Femenino</th>
							</td>
							
						</tr>

					<tbody>';

						
					if(!empty($registro)) {

						$documentoCuerpo.= '
							<tr>
   
								   <td>
								   1
								   </td>


									<td align="center">
										Fortalecimiento del deporte nacional
									</td>

									<td align="center">
										002 
									</td>

									<td align="center">
										MANTENIMIENTO DE ESCENARIOS E INFRAESTRUCTURA DEPORTIVA
									</td>

									<td align="center">
										Llenar
									</td>

									<td align="center">
										(DETALLAR EN NUMERO ENTERO)
									</td>

									<td align="center">
										(DETALLAR EN NUMERO ENTERO)
									</td>

									<td align="center">
										DETALLAR CANTIDAD
									</td>

									<td align="center">
										DETALLAR CANTIDAD
									</td>
							</tr>
   
						';
   
					}


					$documentoCuerpo.='
					</tbody>

				 </table>';
				 
				 


				 $documentoCuerpo.='	
				 
				 
					<table style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">
						<thead>
							<tr>
								<th align="center" style="width: 20%!important;">Ítem</th>
								<th align="center">Nombre <br> Infraestructura <br> deportiva</th>
								<th align="center">Provincia</th>
								<th align="center">Dirección completa</th>
								<th align="center">Estado</th>
								<th align="center">Tipo de recursos con los que se construyó</th>
								<th align="center">Materiales<br>servicios a <br> requerir para el <br> mantenimient</th>
								<th align="center">Diciembre</th>
								<th align="center">TOTAL</th>
								<td rowspan="2">Propuesta <br> de <br> incremento <br> para análisis y <br> aprobación</td>
							</tr>

						</thead>

						<tbody>';


						if(!empty($registro)) {

							$documentoCuerpo.= '
								
								<tr>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
								</tr>';

						}
						
						
						$documentoCuerpo.='
						</tbody>
					</table>

				';				

				$documentoCuerpo.='


					<table style="margin-top:2em!important; width:100%!important;">
						<tr>
							<th>
							3. OBJETO DE FINANCIAMIENTO
							</th>
						</tr>
					</table>

					<table style="margin-top:2em!important; width:100%!important;">

						<tbody>

						<tr>
							<th>
								3.1 ASPECTO JURÍDICO
							</th>
						</tr>

						<tr>
							<th style="margin-left:20px!important;">
								3.1.1 Escenario deportivo (Nombre del escenario deportivo que realizará la intervención)
							</th>
						</tr>
						<tr>
							<td style="margin-left:40px!important;" align="justify">
								Desarrllar
							</td>
						</tr>

						<tr>
							<th style="margin-left:20px!important;">
								3.1.2 Situación Legal del escenario deportivo (Requisito Obligatorio)
							</th>
						</tr>
						<tr>
							<td style="margin-left:40px!important;" align="justify">
								Desarrllar
							</td>
						</tr>

						<tr>
							<th style="margin-left:20px!important;">
								3.1.3 Aprobación Municipal de planos y permiso de construcción (Requisito Condicionado)
							</th>
						</tr>
						
				';

						if(!empty($registro)){
							
							$documentoCuerpo.='

								<tr>
									<td style="margin-left:40px!important;">
										N/A para mantenimiento
									</td>
								</tr>

								<tr>
									<td style="margin-left:40px!important;">
										Aplica para rehabilitación: 
									</td>
								</tr>

								<tr>
									<td style="margin-left:40px!important;" align="justify">
										Desarrollar 
									</td>
								</tr>
							
							';
						}
					
						$documentoCuerpo.='
						</tbody>
					</table>
			
					<table style="margin-top:2em!important; width:100%!important;">
						<tr>
							<th>
							3.2 ESPECIFICACIONES TECNICAS
							</th>
						</tr>

						<tr>
							<th style="margin-left:20px!important;width:100%!important;">
								3.2.1 Tipo de gasto
							</th>

						</tr>

						<tr>
							<td align="justify"  style="margin-left:40px!important;width:100%!important;">
								(Detallar acorde a los lineamientos de la actividad 002)
							</td>
						</tr>
						<tr>
							<th style="margin-left:20px!important;width:100%!important;">
								3.2.2 Tipo de Intervención del gasto:
							</th>

						</tr>

						<tr>
							<td align="justify"  style="margin-left:40px!important;width:100%!important;">
								(Detallar acorde a los lineamientos de la actividad 002)
							</td>
						</tr>

						<tr>
							<th style="margin-left:20px!important;width:100%!important;">
								3.2.3 Planos y anexos gráficos:debidamente suscritos por el profesional en la rama
							</th>
						</tr>

						<tr>
							<td style="margin-left:40px!important;">
								N/A para mantenimiento
							</td>
						</tr>

						<tr>
							<td style="margin-left:40px!important;">
								Aplica para rehabilitación: 
							</td>
						</tr>

						<tr>
							<td style="margin-left:40px!important;" align="justify">
								Desarrollar 
							</td>
						</tr>
						
						<tr>
							<th style="margin-left:20px!important;width:60%!important;">
								3.2.4 Contemplar parámetros de accesibilidad:
							</th>
						</tr>

						<tr>
							<td style="margin-left:40px!important;">
								N/A para mantenimiento
							</td>
						</tr>

						<tr>
							<td style="margin-left:40px!important;">
								Aplica para rehabilitación: 
							</td>
						</tr>

						<tr>
							<td style="margin-left:40px!important;" align="justify">
								Desarrollar 
							</td>
						</tr>

						<tr>
							<th style="margin-left:20px!important;width:60%!important;">
								3.2.5 Registro fotográfico de la intervención a subsanar:
							</th>
						</tr>

						<tr>
							<td style="margin-left:20px!important;" align="justify">
								Desarrollar 
							</td>
						</tr>

					</table>

					<table style="margin-top:2em!important; width:100%!important;">
						<tr>
							<th>
							3.3 PRESUPUESTO REFERENCIAL
							</th>
						</tr>

						<tr>
							<th style="margin-left:20px!important;width:100%!important;">
								3.3.1 Por rehabilitación o readecuación:
							</th>
						</tr>

						<tr>
							<td style="margin-left:40px!important;" align="justify">
								Desarrollar 
							</td>
						</tr>

						<tr>
							<th style="margin-left:20px!important;width:100%!important;">
								3.3.2 Por mantenimiento
							</th>
						</tr>

					</table>
					

					<table style="margin-top:2em!important; width:100%!important; border-collapse: collapse;" border="1">
						<thead>
							<tr>
								<th align="center" style="width: 20%!important;">Intervención a realizar</th>
								<th align="center">Materiales o Servicios a requerir para el mantenimiento</th>
								<th align="center">Código Ítem</th>
								<th align="center">Nombre del ítem</th>
								<th align="center">COTIZACIÓN 1</th>
								<th align="center">COTIZACIÓN 2</th>
								<th align="center">COTIZACIÓN 3</th>
							</tr>

						</thead>

						<tbody>';


						if(!empty($registro)) {

							$documentoCuerpo.= '
								
								<tr>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
								</tr>';

						}
						
						
						$documentoCuerpo.='

						<tr>
							<td colspan="4" align="center">TOTAL</td>
							<td align="center">llenar $xxxx</td>
							<td align="center">llenar $xxxx</td>
							<td align="center">llenar $xxxx</td>
						</tr>
					</tbody>

				 </table>';	

				$documentoCuerpo.='	


				<table style="margin-top:2em!important; width:100%!important;">
						<tr>
							<th>
							3.4 PROPUESTA DE USO DE IMAGEN CORPORATIVA
							</th>
						</tr>

						<tr>
							<td style="margin-left:20px!important;" align="justify">
								Desarrollar 
							</td>
						</tr>

				</table>

				<table style="margin-top:2em!important; width:100%!important;">
	
						<tr>
							<th>
							3.5 MANTENIMIENTO PREVENTIVO VALORADO
							</th>
						</tr>

						<tr>
							<td style="margin-left:20px!important;" align="justify">
								La descripción del punto es la forma precautelar que la inversión realizada continue con acciones de mantenimiento preventivos en el escenario a intervenir, siendo necesario detallar las actividades su periodicidad y el costo que esto representa, tanto en horas hombre o costos adicionales. 
							</td>
						</tr>

				</table>


				<table style="margin-top:2em!important; width:80%!important; border-collapse: collapse;" border="1" align="center">
						<thead>
							<tr>
								<th align="center">Describir las acciones a realizar para conservar el escenario que fue intervenido</th>
								<th align="center">Detallar la periodicidad (anual, semestral, anual) del mantenimiento a la intervención</th>
								<th align="center">Detallar el recurso económico; las horas hombr</th>
							</tr>

						</thead>

						<tbody>';


						if(!empty($registro)) {

							$documentoCuerpo.= '
								
								<tr>
									<td align="center">1</td>
									<td align="center">1</td>
									<td align="center">1</td>
								</tr>';

						}


						$documentoCuerpo.='
					</tbody>

				</table>';
				
			$documentoCuerpo.='
				<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

					$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

					$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

					$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>
			</table>
				
				<table style="margin-top:2em!important;">
					<thead>
						<tr>
							<th>
								4. CONCLUSIONES:
							</th>	
						</tr>
					</thead>

					<tbody>';


						if(!empty($registro)) {

							$documentoCuerpo.= '
								
								<tr>
									<td align="justify">- fghj</td>
								</tr>';

						}


						$documentoCuerpo.='
					</tbody>

				</table>

				<br>
				
				<span style="font-weight: bold!important;">FIRMA DE RESPONSABILIDAD:</span>

				<br>

				<table style="width:90%!important; border-collapse: collapse;" border="1" align="center">

					<tr>

						<td style="width:50%!important;margin-left:1.2em!important;">

							
							<div style="font-weight: bold!important;">Elaborado por: </div>
							<br><br><br><br><br><br><br>
							<div><span style="font-weight: bold!important;">Nombre: </span> '.$funcionario[0][nombreFuncionario].'</div>	
							<div>Analista '.$funcionario[0][nombreFuncionario].'</div>


						</td>

						<td style="width:50%!important;margin-left:1.2em!important;">

							<div style="font-weight: bold!important;">Aprobado por: </div>
							<br><br><br><br><br><br>
							<div style="font-weight: bold!important;">Ing. '.$funcionario[0][nombreFuncionario].'</div>
							<div>Director de Administración de Instalaciones Deportivas</div>
							<div>O <br> Director de Infraestructura Deportiva</div>
							<br>
						</td>

					</tr>

					<tr>

						<td colspan="2">

							<center>
								<div style="font-weight: bold!important;">Validado por: </div>
								<br><br><br><br><br><br>
								<div style="font-weight: bold!important;">Nombre: XXXX</div>
								<div> <span style="font-weight: bold!important;">Cargo: </span> Coordinador de Administración e Infraestructura Deportiva</div>
							</center>

						</td>

					</tr>

					</table>

			';


				$parametro1 = VARIABLE__BACKEND . "incrementosDecrementos/notificacion"."/";
						$parametro2 = "CertificacionNoRecurso" . $fecha_actual . "__" . $hora_actual2;
						$parametro3 = "CertificacionNoRecurso" . $fecha_actual . "__" . $hora_actual2;
	break;

	case "Informe__Incremento__Planificacion":

		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA DIRECCIÓN DE PLANIFICACIÓN E INVERSIÓN</th>

				</tr>


				<tr>

					<th align="center"> '.$tituloInforme.'</th>

				</tr>

			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$codigoInformes[0][idInversion].'

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

						El Acuerdo Ministerial Nro.0296 de 28 de noviembre de 2022, reforma el Acuerdo Ministerial Nro.0456 de 30 de diciembre de 2021 denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

					</td>

				</tr>	

			</table>


			<br>		

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

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

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.- </span>Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación Administrativa, así como la continuidad en la preparación y competición de los atletas. Estas necesidades se detallan en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left" style="font-weight: bold!important;">

						DESARROLLO:

					</th>

				<tr>	

			</table>	

			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>	

			</br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						La '.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].' realiza la carga de Incremento a la Planificación Operativa Anual '.$aniosPeriodos__ingesos.' en el Aplicativo POA con fecha '.$fechaEnvioIncremento[0][fecha].'.

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
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							El POA de la OD esta alineada al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td>
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							Ejecuta la Planificación anual del personal administrativo, de mantenimiento y técnicos y de servicios amparado en el Código de Trabajo.
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td>
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Ejecuta la Planificación anual del personal administrativo y técnicos, relacionado a Contratos Civiles de servicios profesionales.
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td>
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							La Organización Deportiva no ha creado nuevos puestos de trabajo administrativo, de mantenimiento y técnicos respecto del POA 2022
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td>
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							La Organización Deportiva no ha incrementado Contratos Civiles de servicios profesionales de personal administrativo y técnico respecto del POA 2022
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td>
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td align="left">
							La Organización Deportiva no incrementa la masa salarial relacionada al personal administrativo, de mantenimiento y técnicos de servicios respecto del POA 2022
						</td>
						<td>
							'.$selectCondicion6.'
						</td>
						<td>
							'.$observacionesReasignaciones6.'
						</td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td align="left">
							La Organización Deportiva no incrementa presupuesto relacionado a honorarios para Contratos Civiles de servicios profesionales de personal administrativo y técnicos respecto del POA 2022
						</td>
						<td>
							'.$selectCondicion7.'
						</td>
						<td>
							'.$observacionesReasignaciones7.'
						</td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td align="left">Si planificó servicios básicos verificar que en la matriz de suministro el número de suministro cuente con informe de aprobación del Ministerio del Deporte
						<td>
							'.$selectCondicion8.'
						</td>
						<td>
							'.$observacionesReasignaciones8.'
						</td>
					</tr>
					<tr>
						<td align="center">9</td>
						<td align="left">En caso que planifique seguros de bienes y vehículos presenta el listado de bienes o vehículos con la respectiva cobertura.
						<td>
							'.$selectCondicion9.'
						</td>
						<td>
							'.$observacionesReasignaciones9.'
						</td>
					</tr>
				</tbody>
			</table>

			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>
			</table>

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES ADICIONALES: 

					</td>

				</tr>
				
				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$observacionesReasignaciones.'

					</td>
				</tr>
			</table>		


			</br>

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>
				</tr>

				<tr>
							
					<td style="text-align:justify; width:100%!important;">

						'.$conclusionesReasignaciones.'

					</td>
				</tr>

			</table>				

			</br>
			</br>

			<table class="tablas__bordes__necesarias" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>
						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>
					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>
						<br>
						<div>'.$directorPlanificacion[0][nombreUsuario].'</div>
						<div>DIRECTOR/A DE PLANIFICACION E INVERSION</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>
						<br>
						<div>'.$corPlani[0][nombrePlani].'</div>
						<div>COORDINADOR/A GENERAL DE PLANIFICACION Y GESTION ESTRATEGICA</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."planifiacionPdfGeneradoIncremento/";
			$parametro2="InformeViabilidadPlanificacion";	
			$parametro3=$idOrganismo;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case "Informe__Incremento__AltoRendimiento":

		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">SUBSECRETARIA DE DEPORTE DE ALTO RENDIMIENTO </th>

				</tr>

				<tr>

					<th align="center">DIRECCION DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO</th>

				</tr>


				<tr>

					<th align="center">DIRECCIÓN DE DEPORTE PARA PERSONAS CON DISCAPACIDAD</th>

				</tr>

			</table>

			<br>

			<table>
				<tr>

					<th align="center">'.$tituloInforme.'</th>

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
	

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

					</td>

				</tr>

				<tr>


					<td style="text-align:justify;">

						Se entenderá como fomento deportivo todas aquellas actividades que coadyuban al desarrollo deportivo, en todos los niveles y son parte de este concepto los siguientes elementos:

					</td>

				</tr>


			</table>

			<table  style="margin-top:2em!important;">

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

			<br></br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual y la Planificación Anual de Inversión Deportiva.

					</td>

				</tr>	

			</table>

			</br></br>

			<table style="margin-top: 2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top: 2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 8. De las actividades vinculadas a la promoción del deporte, educación física y recreación.- </span>Son actividades que garantizan la atención integral de los/as atletas en la etapa de desarrollo deportivo, formativo, base, proyección y perfeccionamiento, hasta alcanzar la maestría deportiva; con el objetivo de posicionar al sistema deportivo nacional, en las élites internacionales de cada deporte y/o eventos multideportivos. Asimismo, son actividades que coadyuvan a la masificación de la actividad física y la recreación. Se consideran parte de estas actividades, aquellas orientadas a promover y ejecutar capacitaciones, concentraciones, campamentos y/o base de entrenamientos, evaluaciones deportivas, campeonatos y/o selectivos, juegos, actividades recreativas, implementación y equipamiento deportivo, y otras definidas por el Ministerio del Deporte; así como, las relacionadas a financiar sueldos, salarios u honorarios profesionales de los cargos administrativos, de mantenimiento y técnicos que forman parte de la organización deportiva, entendido como parte de este, a todo el personal que trabaja en el proceso de preparación deportiva física, entrenamiento, servicios médicos, nutrición, psicología, y otros específicos relacionados a la particularidad de cada tipo de deporte o actividad física de los y las deportistas, así como al personal de apoyo que aporta para la operación de la organización deportiva y de los escenarios deportivos. Todo lo anterior, dando cumplimiento a los fines objetivos institucionales.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top: 2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.- </span>Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación Administrativa, así como la continuidad en la preparación y competición de los atletas. Estas necesidades se detallan en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top: 2em!important;">

				<tr>


					<th align="left" style="font-weight: bold!important;">

						DESARROLLO:

					</th>

				<tr>	

			</table>	

			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>	


			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						La <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span>  realiza la carga de la Planificación Operativa Anual POA '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas__dos[0][fecha].' en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.

					</td>

				<tr>	

			</table>	


			</br></br>

			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						En referencia a lo mencionado, la '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].' procede a realizar el siguiente análisis:

					</td>

				<tr>	

			</table>	


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="center" colspan="3" rowspan="2">005 EVENTOS DE PREPARACIÓN Y COMPETENCIAS </th>
							<th>
								MONTO POA
							</th>
					</tr>
					<tr>
						<th>
							$'.number_format((float)$actividad5[0][sumaItem], 2, '.', '').'
						</th>
					</tr>
					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva .
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td>
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							La planificación del indicador coincide con los eventos deportivos planificados.
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td>
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Utiliza la sintaxis clara para el registro de los eventos.
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td>
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel internacional 
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td>
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel nacional 
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td>
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td align="left">
							Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna y al exterior de la delegación 
						</td>
						<td>
							'.$selectCondicion6.'
						</td>
						<td>
							'.$observacionesReasignaciones6.'
						</td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td align="left">
							Utiliza recursos para cubrir pagos por concepto de seguros y bono deportivo en concentrado, campamento, base de entrenamiento, evaluaciones y campeonato a nivel internacional 
						</td>
						<td>
							'.$selectCondicion7.'
						</td>
						<td>
							'.$observacionesReasignaciones7.'
						</td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td align="left">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas
						</td>   
						<td>
							'.$selectCondicion8.'
						</td>
						<td>
							'.$observacionesReasignaciones8.'
						</td>
					</tr>
					
				</tbody>
			</table>

			<br>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="left" colspan="4">CONDICIONES GENERALES </th>
					</tr>
					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas. 
						</td>
						<td>
							'.$selectCondicion9.'
						</td>
						<td>
							'.$observacionesReasignaciones9.'
						</td>
					</tr>

					<tr>
						<th  align="center">N</th>
						<th  align="center">RESUMEN DE PRESUPUESTO POR ACTIVIDAD</th>
						<th  align="center"></th>
						<th  align="center">MONTO POA </th>
					</tr>
					<tr>
						<td align="center">005</td>
						<td align="left">Evento de Preparación y Competencia</td>
						<td></td>
						<td align="center">$ '.number_format((float)$actividad5[0][sumaItem], 2, '.', '').'</td>
					</tr>
				</tbody>
			</table>
			
			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>
			</table>

			<table class="tabla__bordadaTresCD" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>

				</tr>

				<tr>
							
					<td style="text-align:justify; width:100%!important;">

						'.$conclusionesReasignaciones.'

					</td>
				</tr>

			</table>				

			<table class="tablas__bordes__necesarias" style="width:100%important;margin-top:2em!important">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>

						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>
					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>
						<br>
						<div>'.$directorAlto[0][nombreSubsesA].'</div>
						<div>DIRECTOR/A DE DEPORTE CONVENCIONAL PARA EL ALTO RENDIMIENTO</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>

						<br>
						<div>'.$subsesAlto[0][nombreSubsesAlto].'</div>
						<div>SUBSECRETARIO/A DE DEPORTE DE ALTO RENDIMIENTO</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/alto";
			$parametro2=$idOrganismo."_"."InformeViabilidadAlto"."_".$dia."_".$mes."_".$anio;	
			$parametro3=$idOrganismo."_"."InformeViabilidadAlto"."_".$dia."_".$mes."_".$anio;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case "Informe__Incremento__Administrativo":

		// $conclusionesAd = explode("\n",$conclusionesReasignaciones);

		
		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">COORDINACIÓN GENERAL ADMINISTRATIVA FINANCIERA <br> 
					DIRECCION ADMINISTRATIVA </th>

				</tr>


				<tr>

					<th align="center">'.$tituloInforme.'</th>

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

						Nombre de la Organización Deportiva:

					</th>

					<td align="left">
						'.strtoupper($informacionCompleto[0][nombreOrganismo]).'
					</td>

				<tr>	

			</table>	


			<br>		

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						El Acuerdo Ministerial Nro.0296 de 28 de noviembre de 2022, reforma el Acuerdo Ministerial Nro.0456 de 30 de diciembre de 2021 denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

					</td>

				</tr>	

			</table>
	

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

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

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos. 

					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.- </span>Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación Administrativa, así como la continuidad en la preparación y competición de los atletas. Estas necesidades se detallan en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>


			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 36. De los incrementos presupuestarios a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva.- </span>Las organizaciones deportivas podrán solicitar incrementos a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, siempre y cuando la actividad y/o ítem a incrementarse no haya sido contemplada en la planificación inicial aprobada, y la misma se encuentre enmarcada en los objetivos del Ministerio del Deporte. Para tal efecto, la organización deportiva deberá solicitar el incremento de recursos conforme los lineamientos que establezca el Ministerio del Deporte durante el ejercicio fiscal.</span>

					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 35. De las modificaciones a las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva.- </span>Las Planificaciones Operativas Anuales y Planificaciones Anuales de Inversión Deportiva aprobadas, podrán ser modificadas en los siguientes casos: </span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 37. Del mecanismo de ingreso y recepción de las modificaciones y/o incrementos a las Planificaciones Operativas Anuales o a la Planificación Anual de inversión.- </span>A través del aplicativo informático se procesarán los trámites de modificación y/o incremento a las Planificaciones Operativas Anuales y/o Planificaciones Anuales de Inversión Deportiva. Para tal efecto, se establecerán formularios y formatos sistematizados que permitan agilizar la carga en línea de la información.</span>

					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Las solicitudes de modificación y/o incremento de las planificaciones, serán direccionadas por el aplicativo  informático a las máximas autoridades de las áreas técnicas, para que en el marco de sus competencias se proceda con el análisis correspondiente; esto es, a la Subsecretaría de Deporte del Alto Rendimiento, a  la Subsecretaría de Desarrollo de la Actividad Física, a la Coordinación de Administración e Infraestructura Deportiva, a la Coordinación General Administrativa Financiera, o a la Coordinación General de Planificación y Gestión Estratégica, según corresponda.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">A través del referido aplicativo informático, los titulares de las áreas referidas en el párrafo precedente emitirán un informe de viabilidad técnica a la modificación y/o incremento de las planificaciones presentadas por parte de las organizaciones deportivas.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Si durante la tramitación de la solicitud de modificación y/o incremento existieren observaciones o inconsistencias, o en su defecto falta de información, se consolidarán en un solo documento a través del/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte a fin de que se proceda con la correspondiente notificación a las organizaciones deportivas sobre los citados hallazgos.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Las subsanaciones deberán realizarse a través del aplicativo informático en el término de cinco (5) días contados a partir de la notificación, con el fin de que se realice el análisis de las mismas.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">En caso de que no se justifique lo observado o se mantengan las inconsistencias, el/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte, emitirá el informe correspondiente a través del cual se niegue la aprobación de la modificación y/o incremento a las planificaciones.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 38. De la verificación de financiamiento para incrementos.- </span>Para el caso de las solicitudes de incrementos a las Planificaciones Operativas Anuales o Planificaciones Anuales de  Inversión Deportiva, adicional a lo mencionado en el artículo precedente, las áreas técnicas responsables del análisis del incremento deberán solicitar al/la titular de la Coordinación General de Planificación y Gestión Estratégica la verificación de la disponibilidad de fondos. Hecho esto, y de contar con la verificación respectiva, se continuará con el proceso de análisis del incremento.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 39. De la aprobación de la modificación y/o incremento.- </span>A través de la herramienta informática, y de contarse con los respectivos informes técnicos de viabilidad, el/la titular de la Dirección de Planificación e Inversión del Ministerio del Deporte emitirá las correspondientes resoluciones modificatorias a las Planificaciones Operativas Anuales o Planificaciones Anuales de Inversión Deportiva, según corresponda. Las citadas resoluciones deberán ser notificadas a los representantes legales de las organizaciones deportivas, así como a las áreas del Ministerio del Deporte intervinientes en el proceso; entre ellas, a la Dirección Financiera a fin de que se considere los criterios modificados y/o incrementos para la realización de las transferencias, así como el cumplimiento de los requisitos establecidos para el efecto.</span>
					</td>

				</tr>	

			</table>

			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<th align="left" style="font-weight: bold!important;">

						DESARROLLO:

					</th>

				<tr>	

			</table>	
			
			<table style="width:100%!important; margin-top:2em;">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>	


			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						La <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span>  registró en el link para incrementos al POA '.$aniosPeriodos__ingesos.' a fin de que sean aprobados conforme lo establecido en la normativa legal vigente.

					</td>

				<tr>	

			</table>	


			</br>

			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						En referencia se procede a realizar el siguiente análisis:

					</td>

				<tr>	

			</table>	


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							Detalla satisfactoriamente el objeto de la adquisición de bienes o contratación de servicios.
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td>
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							No se contempla financiamiento para pago de arreglos extrajudiciales, arrendamiento y licencias de uso de paquetes informáticos, Desarrollo, Actualización, Asistencia Técnica y Soporte de Sistemas Informáticos, dichos gastos deberán ser pagados con recursos de autogestión.
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td>
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Utiliza el ítem presupuestario acorde al objeto de la adquisición de bienes o contratación de servicios.
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td>
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							Detalla satisfactoriamente la justificación para el pago de impuestos, tasas y contribuciones 
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td>
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							El pago de cada suministro de servicios básicos descrito, se encuentra en el informe aprobado del Ministerio del Deporte remitido por la Dirección de Planificación e Inversión.
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td>
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					
				</tbody>
			</table>

			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>

			</table>


			<table class="tabla__bordadaTresCD" style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES ADICIONALES: 

					</td>

				</tr>
				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$observacionesReasignaciones.'

					</td>
				</tr>
			</table>		


			<table class="tabla__bordadaTresCD" style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>

				</tr>

			</table>';


			foreach ($conclusionesAd as $clave => $valor) {
					
				$documentoCuerpo.='
					<table style="margin-top:0.8em!important;width:100%important;">

						<tr>
							<td style="text-align:justify; width:100%!important;"> - '.$valor.'</td>
						</tr>

					</table>
				';
			}
			
			
		$documentoCuerpo.='
			<table class="tablas__bordes__necesarias" style="width:100%important;margin-top:2em!important">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>

						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>
						
						<br>
						<div>'.$directorAdministrativo[0][nombreSubsesA].'</div>
						<div>DIRECTOR/A ADMINISTRATIVO</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td colspan="2" align="left">
						Una vez realizada la revisión del incremento realizado por la Organización Deportiva, por parte de la Dirección Administrativa, conforme la actividad 001 estipulada en los lineamientos del ciclo de planificación, esta Coordinación acepta los parámetros revisados por la dirección antes mencionada. 
					</td>

				</tr>
				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>

						<br>
						<div>'.$subsesAlto[0][nombreSubsesAlto].'</div>
						<div>COORDINADOR/A GENERAL ADMINISTRATIVO FINANCIERO</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/informeViabilidad/administrativo";
			$parametro2=$idOrganismo."_"."InformeViabilidadAdministrativo"."_".$dia."_".$mes."_".$anio;	
			$parametro3=$idOrganismo."_"."InformeViabilidadAdministrativo"."_".$dia."_".$mes."_".$anio;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case "Informe__Incremento__TecnicoFormativo":

		
		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FÍSICA <br> DIRECCION DE DEPORTE FOMATIVO Y EDUCACIÓN FÍSICA</th>

				</tr>
				
			</table>

			<table style="margin-top:2em!important;">

				<tr>

					<th align="center">'.$tituloInforme.'</th>

				</tr>


			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$codigoInformes[0][idInversion].'

					</td>

					<td align="right">

						<span class="enfacis__letras">Fecha de elaboración:</span>'.$dia.' de '. ucwords($monthName).' del '.$anio.' 

					</td>


				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						ANTECEDENTE

					</th>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						El Acuerdo Ministerial 456 y sus reformas denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

					</td>

				</tr>

			</table>

			<table style="margin-top:2em!important;">

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

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos.

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 8. De las actividades vinculadas a la promoción del deporte, educación física y recreación.- </span>Son actividades que garantizan la atención integral de los/as atletas en la etapa de desarrollo deportivo, formativo, base, proyección y perfeccionamiento, hasta alcanzar la maestría deportiva; con el objetivo de posicionar al sistema deportivo nacional, en las élites internacionales de cada deporte y/o eventos multideportivos. Asimismo, son actividades que coadyuvan a la masificación de la actividad física y la recreación. Se consideran parte de estas actividades, aquellas orientadas a promover y ejecutar capacitaciones, concentraciones, campamentos y/o base de entrenamientos, evaluaciones deportivas, campeonatos y/o selectivos, juegos, actividades recreativas, implementación y equipamiento deportivo, y otras definidas por el Ministerio del Deporte; así como, las relacionadas a financiar sueldos, salarios u honorarios profesionales de los cargos administrativos, de mantenimiento y técnicos que forman parte de la organización deportiva, entendido como parte de este, a todo el personal que trabaja en el proceso de preparación deportiva física, entrenamiento, servicios médicos, nutrición, psicología, y otros específicos relacionados a la particularidad de cada tipo de deporte o actividad física de los y las deportistas, así como al personal de apoyo que aporta para la operación de la organización deportiva y de los escenarios deportivos. Todo lo anterior, dando cumplimiento a los fines objetivos institucionales.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.– </span>Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación administrativa, así como, la continuidad en la preparación y competición de los atletas. Estas necesidades se detallarán en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">2.3.2 Articulación con la Ley del Deporte, Educación Física y Recreación</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:1em!important;">

				<tr>


					<td style="text-align:justify;">

						El Estado Ecuatoriano le ha dado un mayor grado de importancia a la práctica del deporte, a educación física y la recreación, estableciéndolo como un derecho fundamental el cual debe ser garantizado bajo el principio de inclusión. <br>

						<span style="font-weight:  bold!important;">Art. 3.- </span>“De la práctica del deporte, educación física y recreación. - La práctica del deporte, educación física y recreación debe ser libre y voluntaria y constituye un derecho fundamental y parte de la formación integral de las personas. Serán protegidas por todas las Funciones del Estado

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art. 11.- </span>“De la práctica del deporte, educación física y recreación. - Es derecho de las y los ciudadanos practicar deporte, realizar educación física y acceder a la recreación, sin discrimen alguno de acuerdo a la Constitución de la República y a la presente Ley”

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art. 14.- </span>“Funciones y atribuciones. - Las funciones y atribuciones del Ministerio son:

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Literal a). - </span>Proteger, propiciar, estimular, promover, coordinar, planificar, fomentar, desarrollar y evaluar el deporte, educación física y recreación de toda la población, incluidos las y los ecuatorianos que viven en el exterior;

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art. 89.- </span>“De la recreación. - La recreación comprenderá todas las actividades físicas lúdicas que empleen al tiempo libre de una manera planificada, buscando un equilibrio biológico y social en la consecución de una mejor salud y calidad de vida. Estas actividades incluyen las organizadas y ejecutadas por el deporte barrial y parroquial, urbano y rural”

					</td>

				</tr>	

			</table>
			
			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art 95.-  </span>“Objetivo del deporte barrial y parroquial, urbano y rural. - El deporte barrial y parroquial, urbano y rural, es el conjunto de actividades recreativas y la práctica deportiva masiva que tienen como finalidad motivar la organización y participación de las y los ciudadanos de los barrios y parroquias, urbanas y rurales, a fin de lograr su formación integral y mejorar su calidad de vida.

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">2.3.3  </span>Articulación del requerimiento de financiamiento con el Plan Nacional de Desarrollo 21-25 el requerimiento de financiamiento se articula:
					</td>

					<td>
						<span style="font-weight:  bold!important;">Objetivo 6. </span>Garantizar el derecho a la salud integral, gratuita y de calidad.
					</td>
				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Política  </span>
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">6.7  </span>Fomentar el tiempo libre dedicado a actividades físicas que contribuyan a mejorar la salud de la población.
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">2.3.4  </span>Articulación con los objetivos estratégicos institucionales.
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">a) Objetivo estratégico institucional 4: </span>Reducir la prevalencia de actividad física insuficiente en la población.
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left" style="font-weight: bold!important;">

						DESARROLLO:

					</th>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.


					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						La <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span>  realiza la carga de la Planificación Operativa Anual POA '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas__dos[0][fecha].' en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.

					</td>

				<tr>	

			</table>	


			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						Nombre del proyecto:

					</th>

					<td align="left">
						'.$nombreProyecto.'
					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						Objetivo General:

					</th>

					<td align="left">
						'.$objetivoGeneral.'
					</td>

				<tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						Objetivos específico:

					</th>

					<td align="left">
						'.$objetivoEspecifico.'
					</td>

				<tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						En referencia a lo mencionado, la '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].' procede a realizar el siguiente análisis:

					</td>

				<tr>	

			</table>	


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="center" colspan="3" rowspan="2">Descripción de Actividades</th>
							<th>
								MONTO POA
							</th>
					</tr>
					<tr>
						<th>
							$'.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'
						</th>
					</tr>
					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							Registra en las actividades correspondientes organización de campeonatos, eventos , participación en eventos nacionales e internacionales, implementación deportiva acorde a la prioridad de la disciplina deportiva.
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							La planificación del indicador coincide con los eventos deportivos planificados
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Utiliza la sintaxis clara para el registro de los eventos
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							Registra juzgamiento para el evento o campeonato provincial o naciona. 
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							Utiliza para la atención de delegados extranjeros y nacionales, deportistas, entrenadores, cuerpo técnico que representa al país 
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td align="left">
							Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna de la delegación. 
						</td>
						<td>
							'.$selectCondicion6.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones6.'
						</td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td align="left">
							Utiliza recursos para cubrir pagos por concepto de seguros en los campeonatos, bonos deportivos 
						</td>
						<td>
							'.$selectCondicion7.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones7.'
						</td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td align="left">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas  
						<td>
							'.$selectCondicion8.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones8.'
						</td>
					</tr>
					
				</tbody>
			</table>

			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>

			</table>

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES: 

					</td>

				</tr>

				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$observacionesReasignaciones.'

					</td>
				</tr>

			</table>		

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIONES:

					</td>

				</tr>
				
				<tr>
							
					<td style="text-align:justify; width:100%!important;">

						'.$conclusionesReasignaciones.'

					</td>
				</tr>

			</table>				


			<table class="tablas__bordes__necesarias" style="width:100%important;margin-top:2em!important;">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>
						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>
						<br>
						<div>'.$directorFormativo[0][nombreSubsesA].'</div>
						<div>DIRECTOR/A DE DEPORTE FOMATIVO Y EDUCACIÓN FÍSICA</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>
						<br>
						<div>'.$subsesAcFi[0][nombreSubsesA].'</div>
						<div>SUBSECRETARIO/A DE DESARROLLO DE LA ACTIVIDAD FISICA</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/desarrollo";
			$parametro2=$idOrganismo."_"."InformeViabilidadFormativo"."_".$dia."_".$mes."_".$anio;	
			$parametro3=$idOrganismo."_"."InformeViabilidadFormativo"."_".$dia."_".$mes."_".$anio;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case "Informe__Incremento__TecnicoDiscapacidad":

		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">SUBSECRETARIA DE DEPORTE DE ALTO RENDIMIENTO </th>

				</tr>

				<tr>

					<th align="center">DIRECCIÓN DE DEPORTE PARA PERSONAS CON DISCAPACIDAD</th>

				</tr>

			</table>

			<br>

			<table>
				<tr>

					<th align="center">'.$tituloInforme.'</th>

				</tr>
			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$codigoInformes[0][idInversion].'

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

						El Acuerdo Ministerial 456 y sus reformas denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

					</td>

				</tr>

				<tr>


					<td style="text-align:justify;">

						Se entenderá como fomento deportivo todas aquellas actividades que coadyuban al desarrollo deportivo, en todos los niveles y son parte de este concepto los siguientes elementos:

					</td>

				</tr>


			</table>

			<table style="margin-top:2em!important;">

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

			<br></br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos.

					</td>

				</tr>	

			</table>


			<table style="margin-top: 2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top: 2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 8. De las actividades vinculadas a la promoción del deporte, educación física y recreación.- </span>Son actividades que garantizan la atención integral de los/as atletas en la etapa de desarrollo deportivo, formativo, base, proyección y perfeccionamiento, hasta alcanzar la maestría deportiva; con el objetivo de posicionar al sistema deportivo nacional, en las élites internacionales de cada deporte y/o eventos multideportivos. Asimismo, son actividades que coadyuvan a la masificación de la actividad física y la recreación. Se consideran parte de estas actividades, aquellas orientadas a promover y ejecutar capacitaciones, concentraciones, campamentos y/o base de entrenamientos, evaluaciones deportivas, campeonatos y/o selectivos, juegos, actividades recreativas, implementación y equipamiento deportivo, y otras definidas por el Ministerio del Deporte; así como, las relacionadas a financiar sueldos, salarios u honorarios profesionales de los cargos administrativos, de mantenimiento y técnicos que forman parte de la organización deportiva, entendido como parte de este, a todo el personal que trabaja en el proceso de preparación deportiva física, entrenamiento, servicios médicos, nutrición, psicología, y otros específicos relacionados a la particularidad de cada tipo de deporte o actividad física de los y las deportistas, así como al personal de apoyo que aporta para la operación de la organización deportiva y de los escenarios deportivos. Todo lo anterior, dando cumplimiento a los fines objetivos institucionales.</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top: 2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.- </span>Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación Administrativa, así como la continuidad en la preparación y competición de los atletas. Estas necesidades se detallan en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top: 2em!important;">

				<tr>


					<th align="left" style="font-weight: bold!important;">

						DESARROLLO:

					</th>

				<tr>	

			</table>	


			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

					El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>

			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						La <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span>  realiza la carga de la Planificación Operativa Anual POA '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas__dos[0][fecha].' en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.

					</td>

				<tr>	

			</table>	


			<table style="margin-top: 2em!important;">

				<tr>


					<td align="left">

						En referencia a lo mencionado, la '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].' procede a realizar el siguiente análisis:

					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<th style="text-align:justify;">

						Fecha de ejecución:

					</th>

				</tr>	

				<tr>


					<th style="text-align:justify;">

						Cobertura

					</th>

				</tr>	

				<tr>


					<th style="text-align:justify;">

						Justificación:

					</th>

				</tr>	

				<tr>


					<th style="text-align:justify;">

						Beneficiarios:

					</th>

				</tr>	

			</table>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="center" colspan="3" rowspan="2">005 EVENTOS DE PREPARACIÓN Y COMPETENCIAS </th>
							<th>
								MONTO POA
							</th>
					</tr>
					<tr>
						<th>
							$'.number_format((float)$actividad5[0][sumaItem], 2, '.', '').'
						</th>
					</tr>
					<tr>
					<th  align="center" style="width:10%!important">N</th>
					<th  align="center"  style="width:40%!important">CONDICIÓN</th>
					<th  align="center" style="width:20%!important">CUMPLE</th>
					<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva en el incremento.
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td>
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							La planificación del indicador coincide con los eventos deportivos planificados en el incremento.
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td>
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Utiliza la sintaxis clara para el registro de los eventos en el incremento.
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td>
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel internacional en el incremento.
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td>
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							Registra concentrado, campamento, base de entrenamiento, evaluaciones y campeonato para la categoría menores, prejuveniles, juvenil y absoluto a nivel nacional en el incremento.
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td>
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td align="left">
							Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna y al exterior de la delegación en el incremento. 
						</td>
						<td>
							'.$selectCondicion6.'
						</td>
						<td>
							'.$observacionesReasignaciones6.'
						</td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td align="left">
							Utiliza recursos para cubrir pagos por concepto de seguros y bono deportivo en concentrado, campamento, base de entrenamiento, evaluaciones y campeonato a nivel internacional en el incremento. 
						</td>
						<td>
							'.$selectCondicion7.'
						</td>
						<td>
							'.$observacionesReasignaciones7.'
						</td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td align="left">
							La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas en el incremento.
						</td> 
						<td>
							'.$selectCondicion8.'
						</td>
						<td>
							'.$observacionesReasignaciones8.'
						</td>
					</tr>
					
				</tbody>
			</table>


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="left" colspan="4">CONDICIONES GENERALES </th>
					</tr>
					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas. 
						</td>
						<td>
							'.$selectCondicion9.'
						</td>
						<td>
							'.$observacionesReasignaciones9.'
						</td>
					</tr>

					<tr>
						<th  align="center">N</th>
						<th  align="center">RESUMEN DE PRESUPUESTO POR ACTIVIDAD</th>
						<th  align="center"></th>
						<th  align="center">MONTO POA </th>
					</tr>
					<tr>
						<td align="center">005</td>
						<td align="left">Evento de Preparación y Competencia</td>
						<td></td>
						<td align="center">$ '.number_format((float)$actividad5[0][sumaItem], 2, '.', '').'</td>
					</tr>
				</tbody>
			</table>

			<table style="margin-top:2em!important;">
				<tr>
					<th>
						SEGUIMIENTO Y EVALUACIÓN AL INCREMENTO POA:
					</th>
				</tr>
				<tr>
					<td>
						(Detallar las acciones específicas tanto para el seguimiento como para la evaluación del objeto de financiamiento por parte de la entidad beneficiaria.)
					</td>
				</tr>
			</table>

			<table style="margin-top:1em!important;width:100%important;">
				<tr>
					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						Recomendaciones Seguimiento:

					</td>
				</tr>

				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$RecomendacionesSeguimiento.'

					</td>
				</tr>
				<br><br>
				<tr>
					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						Recomendaciones Evaluación:

					</td>
				</tr>

				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$RecomendacionesEvaluacion.'

					</td>
				</tr>	

			</table>
			
			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>
			</table>

			<table class="tabla__bordadaTresCD" style="width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>


				</tr>

				<tr>
							
					<td style="text-align:justify; width:100%!important;">

						'.$conclusionesReasignaciones.'

					</td>
				</tr>

			</table>				

			<table class="tablas__bordes__necesarias" style="width:100%important;margin-top:2em!important">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>

						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>
						<br>
						<div>'.$directorDiscapacidad[0][nombreSubsesA].'</div>
						<div>DIRECTOR/A DE DEPORTE PARA PERSONAS CON DISCAPACIDAD</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>
						<br>
						<div>'.$subsesAlto[0][nombreSubsesAlto].'</div>
						<div>SUBSECRETARIO/A DE DEPORTE DE ALTO RENDIMIENTO</div>
					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/alto";
			$parametro2=$idOrganismo."_"."InformeViabilidadDiscapacidad"."_".$dia."_".$mes."_".$anio;	
			$parametro3=$idOrganismo."_"."InformeViabilidadDiscapacidad"."_".$dia."_".$mes."_".$anio;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case "Informe__Incremento__TecnicoRecreacion":

		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FÍSICA <br> DIRECCION DE RECREACIÓN</th>

				</tr>
				
			</table>

			<table style="margin-top:2em!important;">

				<tr>

					<th align="center">'.$tituloInforme.'</th>

				</tr>


			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$codigoInformes[0][idInversion].'

					</td>

					<td align="right">

						<span class="enfacis__letras">Fecha de elaboración:</span>'.$dia.' de '. ucwords($monthName).' del '.$anio.' 

					</td>


				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						ANTECEDENTE

					</th>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						El Acuerdo Ministerial 456 y sus reformas denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS” determina:

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

					</td>

				</tr>

			</table>

			<table style="margin-top:2em!important;">

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

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos.

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 8. De las actividades vinculadas a la promoción del deporte, educación física y recreación.- </span>Son actividades que garantizan la atención integral de los/as atletas en la etapa de desarrollo deportivo, formativo, base, proyección y perfeccionamiento, hasta alcanzar la maestría deportiva; con el objetivo de posicionar al sistema deportivo nacional, en las élites internacionales de cada deporte y/o eventos multideportivos. Asimismo, son actividades que coadyuvan a la masificación de la actividad física y la recreación. Se consideran parte de estas actividades, aquellas orientadas a promover y ejecutar capacitaciones, concentraciones, campamentos y/o base de entrenamientos, evaluaciones deportivas, campeonatos y/o selectivos, juegos, actividades recreativas, implementación y equipamiento deportivo, y otras definidas por el Ministerio del Deporte; así como, las relacionadas a financiar sueldos, salarios u honorarios profesionales de los cargos administrativos, de mantenimiento y técnicos que forman parte de la organización deportiva, entendido como parte de este, a todo el personal que trabaja en el proceso de preparación deportiva física, entrenamiento, servicios médicos, nutrición, psicología, y otros específicos relacionados a la particularidad de cada tipo de deporte o actividad física de los y las deportistas, así como al personal de apoyo que aporta para la operación de la organización deportiva y de los escenarios deportivos. Todo lo anterior, dando cumplimiento a los fines objetivos institucionales.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 10. De las necesidades complementarias para su adecuado desarrollo.– </span>Son actividades que se orientan a cubrir las necesidades particulares que tiene cada deporte, modalidad y disciplina, mismas que garanticen su funcionamiento y operación administrativa, así como, la continuidad en la preparación y competición de los atletas. Estas necesidades se detallarán en las planificaciones de cada deporte y organización, de conformidad con los lineamientos expedidos por el Ministerio del Deporte.</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">2.3.2 Articulación con la Ley del Deporte, Educación Física y Recreación</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:1em!important;">

				<tr>


					<td style="text-align:justify;">

						El Estado Ecuatoriano le ha dado un mayor grado de importancia a la práctica del deporte, a educación física y la recreación, estableciéndolo como un derecho fundamental el cual debe ser garantizado bajo el principio de inclusión. <br>

						<span style="font-weight:  bold!important;">Art. 3.- </span>“De la práctica del deporte, educación física y recreación. - La práctica del deporte, educación física y recreación debe ser libre y voluntaria y constituye un derecho fundamental y parte de la formación integral de las personas. Serán protegidas por todas las Funciones del Estado

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art. 11.- </span>“De la práctica del deporte, educación física y recreación. - Es derecho de las y los ciudadanos practicar deporte, realizar educación física y acceder a la recreación, sin discrimen alguno de acuerdo a la Constitución de la República y a la presente Ley”

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art. 14.- </span>“Funciones y atribuciones. - Las funciones y atribuciones del Ministerio son:

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Literal a). - </span>Proteger, propiciar, estimular, promover, coordinar, planificar, fomentar, desarrollar y evaluar el deporte, educación física y recreación de toda la población, incluidos las y los ecuatorianos que viven en el exterior;

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art. 89.- </span>“De la recreación. - La recreación comprenderá todas las actividades físicas lúdicas que empleen al tiempo libre de una manera planificada, buscando un equilibrio biológico y social en la consecución de una mejor salud y calidad de vida. Estas actividades incluyen las organizadas y ejecutadas por el deporte barrial y parroquial, urbano y rural”

					</td>

				</tr>	

			</table>
			
			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Art 95.-  </span>“Objetivo del deporte barrial y parroquial, urbano y rural. - El deporte barrial y parroquial, urbano y rural, es el conjunto de actividades recreativas y la práctica deportiva masiva que tienen como finalidad motivar la organización y participación de las y los ciudadanos de los barrios y parroquias, urbanas y rurales, a fin de lograr su formación integral y mejorar su calidad de vida.

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">2.3.3  </span>Articulación del requerimiento de financiamiento con el Plan Nacional de Desarrollo 21-25 el requerimiento de financiamiento se articula:
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">
				<tr>
					<td>
						<span style="font-weight:  bold!important;">Objetivo 6. </span>Garantizar el derecho a la salud integral, gratuita y de calidad.
					</td>
				</tr>
			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">Política  </span>
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">6.7  </span>Fomentar el tiempo libre dedicado a actividades físicas que contribuyan a mejorar la salud de la población.
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">2.3.4  </span>Articulación con los objetivos estratégicos institucionales.
					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-weight:  bold!important;">a) Objetivo estratégico institucional 4: </span>Reducir la prevalencia de actividad física insuficiente en la población.
					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<th align="left" style="font-weight: bold!important;">

						DESARROLLO:

					</th>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						La <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span>  realiza la carga de la Planificación Operativa Anual POA '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas__dos[0][fecha].' en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.

					</td>

				<tr>	

			</table>	


			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						Nombre del proyecto:

					</th>

					<td align="left">
						'.$nombreProyecto.'
					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						Objetivo General:

					</th>

					<td align="left">
						'.$objetivoGeneral.'
					</td>

				<tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th align="left">

						Objetivos específico:

					</th>

					<td align="left">
						'.$objetivoEspecifico.'
					</td>

				<tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						En referencia a lo mencionado, la '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].' procede a realizar el siguiente análisis:

					</td>

				<tr>	

			</table>	


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="center" colspan="3" rowspan="2">Descripción de Actividades</th>
							<th>
								MONTO POA
							</th>
					</tr>
					<tr>
						<th>
							$'.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'
						</th>
					</tr>
					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							Registra en las actividades correspondientes organización de campeonatos, eventos , participación en eventos nacionales e internacionales, implementación deportiva acorde a la prioridad de la disciplina deportiva.
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							La planificación del indicador coincide con los eventos deportivos planificados
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Utiliza la sintaxis clara para el registro de los eventos
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							Registra juzgamiento para el evento o campeonato provincial o naciona. 
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							Utiliza para la atención de delegados extranjeros y nacionales, deportistas, entrenadores, cuerpo técnico que representa al país 
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					<tr>
						<td align="center">6</td>
						<td align="left">
							Utiliza recursos para cubrir gastos autorizados de: pasajes, alimentación, hospedaje, hidratación, medicinas, atención médica, honorarios de árbitros y jueces, uniformes, movilización interna de la delegación. 
						</td>
						<td>
							'.$selectCondicion6.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones6.'
						</td>
					</tr>
					<tr>
						<td align="center">7</td>
						<td align="left">
							Utiliza recursos para cubrir pagos por concepto de seguros en los campeonatos, bonos deportivos 
						</td>
						<td>
							'.$selectCondicion7.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones7.'
						</td>
					</tr>
					<tr>
						<td align="center">8</td>
						<td align="left">La Planificación Operativa Anual del Organismo Deportivo se encuentra enmarcada en lo establecido en el Acuerdo Ministerial 456 y sus reformas  
						<td>
							'.$selectCondicion8.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones8.'
						</td>
					</tr>
					
				</tbody>
			</table>

			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>
			</table>

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES: 

					</td>


				</tr>
				
				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$observacionesReasignaciones.'

					</td>
				</tr>
			</table>		

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIONES:

					</td>

				</tr>

				<tr>
							
					<td style="text-align:justify; width:100%!important;">

						'.$conclusionesReasignaciones.'

					</td>
				</tr>

			</table>				


			<table class="tablas__bordes__necesarias" style="width:100%important;margin-top:2em!important;">

				<tr>
					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>
						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>
					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

					

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Revisado por:</div>
						<br>
						<div>'.$directorRecreacion[0][nombreSubsesA].'</div>
						<div>DIRECTOR/A DE RECREACIÓN</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

						

					</td>

				</tr>

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Validado por:</div>

						<br>
						<div>'.$subsesAcFi[0][nombreSubsesA].'</div>
						<div>SUBSECRETARIO/A DE DESARROLLO DE LA ACTIVIDAD FISICA</div>

					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>	

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/recreacion";
			$parametro2=$idOrganismo."_"."InformeViabilidadRecreacion"."_".$dia."_".$mes."_".$anio;	
			$parametro3=$idOrganismo."_"."InformeViabilidadRecreacion"."_".$dia."_".$mes."_".$anio;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case "Informe__Incremento__TecnicoInfraestructura":

		$documentoCuerpo='

			<table class="tabla__bordadaTresCD">

				<tr>

					<th align="center">COORDINACIÓN DE ADMINISTRACIÓN E INFRAESTRUCTURA DEPORTIVA</th>

				</tr>
				
			</table>

			<table style="margin-top:2em!important;">

				<tr>

					<th align="center">'.$tituloInforme.'</th>

				</tr>


			</table>

			<table style="margin-top:2em!important;">

				<tr>

					<th align="left" style="width: 40%!important;">
						ORGANISMO DEPORTIVO:
					</th>
					<td align="left" style="width: 60%!important;">
						'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'
					</td>

				</tr>


			</table>

			<br>

			<table class="tabla__bordadaTresCD">

				<tr>


					<td align="left">

						<span class="enfacis__letras">Numeración y/o Codificación:</span>'.$codigoInformes[0][idInversion].'

					</td>

					<td align="right">

						<span class="enfacis__letras">Fecha de elaboración:</span>'.$dia.' de '. ucwords($monthName).' del '.$anio.' 

					</td>


				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<th>I.</th>
					<th align="left">

						BASE LEGAL:

					</th>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						El Acuerdo Ministerial 0296, de 28 de noviembre de 2022 que reforma el Acuerdo Ministerial Nro. 456 denominado “PROCEDIMIENTO QUE REGULA EL CICLO DE PLANIFICACIÓN DE LAS ORGANIZACIONES DEPORTIVAS”, determina: 

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 5. De la Planificación anual de actividades deportivas:</span> Comprende el conjunto de actividades vinculadas al deporte, actividad física y/o recreación que las organizaciones deportivas ejecutarán dentro del correspondiente ejercicio fiscal, financiadas con recursos públicos, orientadas al cumplimiento de objetivos y metas propias, articuladas al Plan Decenal del Deporte Educación Física y Recreación, a la Planificación Estratégica Institucional del Ministerio del Deporte y al Plan Nacional de Desarrollo.</span>

					</td>

				</tr>

			</table>

			<table style="margin-top:2em!important;">

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

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						La Planificación Anual de Actividades Deportivas estará compuesta por la Planificación Operativa Anual la cual será ejecutada dentro del correspondiente ejercicio fiscal; y la Planificación Anual de Inversión Deportiva la cual será ejecutada en cumplimiento al plazo establecido en el correspondiente instrumento legal a través del cual se regule la transferencia de recursos.

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 6. De La Planificación Operativa Anual (POA).- </span>La Planificación Operativa Anual (POA) constituye una herramienta que permite estructurar el conjunto de actividades y/o tareas vinculadas al fomento deportivo que contemplan la promoción del deporte, educación física y recreación; rehabilitación, y/o mantenimiento de los escenarios e infraestructura deportiva; así como, aquellos necesidades complementarias para su adecuado desarrollo, las cuales serán definidas por la organización deportiva conforme los lineamientos generados para el efecto por el Ministerio del Deporte para el correspondiente ejercicio fiscal. Su fin es contribuir al cumplimiento de los objetivos y metas propios, los institucionales y los del Plan Nacional de Desarrollo.</span>

					</td>

				</tr>	

			</table>


			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight:  bold!important;">Artículo 9. De las actividades relacionadas a la rehabilitación y mantenimiento de infraestructura deportiva.- </span>El Ministerio del Deporte podrá asignar recursos públicos para la rehabilitación y mantenimiento de infraestructura deportiva, de acuerdo a los lineamientos que para tal efecto se expidan. </span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;">Para tal efecto, se considerarán las siguientes definiciones: </span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight: bold!important;">a) Rehabilitación:</span> Conjunto de actividades para la optimización y mejora física de infraestructura deportiva existente. El término cubre la rehabilitación de la infraestructura in situ, así como sus etapas de planificación y seguimiento, (…) </span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						<span style="font-style: oblique;"><span style="font-weight: bold!important;">b) Mantenimiento: </span>Corresponde a todas aquellas actividades que se relacionan con el cuidado y conservación del escenario deportivo, tanto de manera preventiva como correctiva y que están direccionadas a su óptimo estado, funcionamiento y prolongar su vida útil. (…)</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						El Acuerdo Ministerial Nro. 0318 la Lic. María Belén Aguirre Crespo Subsecretaria de Deporte y Actividad Física delegada de la máxima autoridad, en el Artículo 1 manifiesta: <span style="font-style: oblique;">“Expídase los <span style="font-weight: bold!important;font-style: oblique;">“Lineamientos para la presentación de la Planificación Operativa Anual correspondiente al año 2023, de las organizaciones deportivas”</span>, constantes en el Anexo 1 del presente Acuerdo Ministerial.</span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td style="text-align:justify;">

						El anexo 1 del referido instrumento jurídico, determina en el punto 5 las actividades a ser consideradas para la Planificación Operativa Anual; planteado la Actividad 002 como <span style="font-style: oblique;">“MANTENIMIENTO DE ESCENARIOS E INFRAESTRUCTURA DEPORTIVA” </span>

					</td>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>

					<th>II.</th>
					<th style="text-align:justify;">

						DESARROLLO: 

					</th>

				</tr>	

			</table>

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						El Ministerio del Deporte por medio de la Dirección de Planificación e Inversión notificó el Techo Presupuestario de <span style="font-weight: bold!important;">$ '.number_format((float)$inverion__ancladas[0][nombreInversion], 2, '.', '').'</span> a la <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span> para que se presente al Ministerio del Deporte la Planificación Operativa Anual POA  '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas[0][fecha].'.

					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						La <span style="font-weight: bold!important;">'.$informacionCompletoDosI[0][nombreDelOrganismoSegunAcuerdo].'</span>  realiza la carga de la Planificación Operativa Anual POA '.$aniosPeriodos__ingesos.' con fecha '.$inverion__ancladas__dos[0][fecha].' en cumplimiento a lo establecido en el artículo 15 del Acuerdo Ministerial 456 y sus reformas denominado: “Del mecanismo de ingreso y recepción de las Planificaciones Operativas Anuales”.

					</td>

				<tr>	

			</table>	

			<table style="margin-top:2em!important;">

				<tr>


					<td align="left">

						En referencia a lo mencionado, la '.$nombresInfra[0][nombreCor].' a través de las Direcciones, DIRECCION DE ADMINISTRACION DE INSTALACIONES DEPORTIVAS y/o DIRECCION DE INFRAESTRUCTURA DEPORTIVA, procedió con el ANÁLISIS de las intervenciones planificados por los Organismos Deportivos en atención a los lineamientos, conforme el siguiente detalle:

					</td>

				<tr>	

			</table>	


			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
							<th align="center" colspan="4">DESARROLLO DEL ANALISIS</th>
					</tr>

					<tr>
						<th  align="center" style="width:10%!important">N</th>
						<th  align="center"  style="width:40%!important">CONDICIÓN</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:30%!important">OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="left">
							Declara toda la infraestructura deportiva <br> a su cargo, adjuntando la legalidad <br> respectiva. 
						</td>
						<td>
							'.$selectCondicion1.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones1.'
						</td>
					</tr>

					<tr>
						<td align="center">2</td>
						<td align="left">
							La planificación del indicador tiene <br> coherencia con el nombre del indicador de <br> la actividad 002 y se encuentra redactado <br> con número entero 
						</td>
						<td>
							'.$selectCondicion2.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones2.'
						</td>
					</tr>
					<tr>
						<td align="center">3</td>
						<td align="left">
							Planifican únicamente intervenciones de <br> rehabilitación, y/o mantenimiento en <br> aquellos escenarios deportivos que sean <br> propiedad de la organización deportiva <br> 
							Anexo: Documentación de la legalidad del <br> predio (escritura, certificado de propiedad, <br> etc.). <br>
							Dentro de la planificación, destinan <br> recursos para gastos de rehabilitación, y/o <br> mantenimiento de los escenarios <br> deportivos que son propiedad del <br> Ministerio del Deporte, precautelando su <br> correcto uso y funcionamiento. <br>
							Anexo: Documentación de la legalidad del <br> predio (escritura, certificado de propiedad, <br> etc.), 
						</td>
						<td>
							'.$selectCondicion3.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones3.'
						</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td align="left">
							Utiliza los ítems presupuestarios aprobados <br> del anexo XX, para la contratación de <br> bienes y servicios respecto al tipo de <br> intervenciones propuestas para la <br> rehabilitación, y/o mantenimiento   
						</td>
						<td>
							'.$selectCondicion4.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones4.'
						</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td align="left">
							Mantiene concordancia el nombre de la <br> intervención para rehabilitación, y/o <br> mantenimiento con el escenario deportivo <br> a intervenir y, los bienes y servicios <br> involucrados en la intervención. 
						</td>
						<td>
							'.$selectCondicion5.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones5.'
						</td>
					</tr>
					<tr>
						<td align="center">6.1</td>
						<td align="left">
							Presenta el Informe justificativo del gasto <br> para la contratación o adquisición de <br> bienes o servicios en escenarios deportivo <br> respecto a <span style="font-weight:bold !important;">Rehabilitación (Corresponde al <br> área de Infraestructura)</span> incluye: <br>
							-Análisis de precios unitarios <br>
							-Presupuesto <br>
							-Planos y anexos gráficos (debidamente <br> suscritos por el profesional en la rama <br>
							-Cronograma valorado. <br>
							-Especificaciones técnicas. <br>
							-Registro fotográfico de la intervención <br> a subsanar. 
							-Contemplar parámetros de accesibilidad <br> universal; según corresponda al tipo de <br> intervención aprobada en los lineamientos <br>(fachadas exteriores, interiores, <br>
							cubierta, pisos interiores, pisos exteriores, <br> piscinas, instalaciones hidrosanitarias de las <br> edificaciones deportivas, sistema <br> eléctrico-electrónico). 
							Para estudios y/o fiscalización: Certificado <br> de no contar con técnicos afines a la <br> contratación Justificación técnica. 
							Justificación técnica indicando perfil <br> profesional y experiencia requerida para la <br> contratación; alcance de los trabajos, <br> presupuesto estimado (Estudio de <br> mercado), plazo.  
						</td>
						<td>
							'.$selectCondicion6.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones6.'
						</td>
					</tr>
					<tr>
						<td align="center">6.2</td>
						<td align="left">
							Presenta el Informe justificativo del gasto <br> para la contratación o adquisición de <br> bienes o servicios en escenarios deportivos <br> respecto <span style="font-weight:bold!important;">Mantenimiento (Corresponde a la <br> Dirección de Administración de <br> Instalaciones Deportivas)</span>incluye: 
							-Cuadro comparativo como estudio de <br> mercado con análisis de precios unitarios <br> respaldado por 2 cotizaciones 
							-Registro fotográfico de la intervención a <br> subsanar 
							-Documentación de la legalidad del predio; <br> según corresponda al tipo de intervención <br> aprobada en los lineamientos   
						</td>
						<td>
							'.$selectCondicion7.'
						</td>
						<td align="justify">
							'.$observacionesReasignaciones7.'
						</td>
					</tr>
					
				</tbody>
			</table>

			<br>

			<p style="font-weight: bold!important;">Cumplimiento de requisitos:</p>

			<table class="col col-12 tablas__bordes__necesarias" style="margin-top:2em!important;">

				<thead>
					<tr>
						<th  align="center" style="width:40%!important">REQUISITO</th>
						<th  align="center" style="width:20%!important">CUMPLE</th>
						<th  align="center" style="width:40%!important">N°de Memorando</th>
					</tr>
				</thead>

				<tbody>';

				$arrayRequisito=array("Solicitud de revisión de no duplicidad","Emisión de Certificado de no duplicidad","Reporte de convenios por liquidar","Confirmación de disponibilidad de fondos","Estatus legal vigente","Certificación presupuestaria","Certificación POA");

				$arrayCumple = array($memoCumple1,$memoCumple2,$memoCumple3,$memoCumple4,$memoCumple5,$memoCumple6,$memoCumple7);

				$arrayMemo = array($nombreMemo1,$nombreMemo2,$nombreMemo3,$nombreMemo4,$nombreMemo5,$nombreMemo6,$nombreMemo7);

					$longitud = count($arrayRequisito);

					for ($i = 0; $i < $longitud; $i++) {
	
						$documentoCuerpo.='
						<tr>
							<td align="center">'.$arrayRequisito[$i].'</td>
							<td align="center">
							'.$arrayCumple[$i].'
							</td>
							<td align="center">
							'.$arrayMemo[$i].'
							</td>
						</tr>';
					}

	$documentoCuerpo.='</tbody>

			</table>

			<table style="margin-top:2em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						OBSERVACIONES ADICIONALES: 

					</td>

				</tr>

				<tr>
					<td style="text-align:justify; width:100%!important;">

						'.$observacionesReasignaciones.'

					</td>
				</tr>

			</table>		

			<table style="margin-top:1em!important;width:100%important;">

				<tr>

					<td style="text-align:justify; width:30%!important;  padding-top:2em; padding-bottom:2em;" class="enfacis__letras">

						CONCLUSIÓN:

					</td>

				</tr>
			</table>';
			
			foreach ($conclusionesAd as $clave => $valor) {
					
				$documentoCuerpo.='
					<table style="margin-top:0.8em!important;width:100%important;">

						<tr>
							<td style="text-align:justify; width:100%!important;"> - '.$valor.'</td>
						</tr>

					</table>
				';
			}


		$documentoCuerpo.='
			<br>

			<span>FIRMA PLANTA CENTRAL</span>

			<table class="tablas__bordes__necesarias" style="width:100%important;margin-top:2em!important;">

				<tr>

					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;" class="enfacis__letras">

						<div>Elaborado por:</div>
						<br>
						<div>'.$nombreUsuarioAnalista[0][nombreUsuario].'</div>
						<div> ANALISTA DE LA '.$nombreUsuarioAnalista[0][descripcionFisicamenteEstructura].'</div>		
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

						<div>Aprobado por:</div>


					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>
			
			<br>
			
			<span style="width:100%important;">FIRMA COORDINACIONES ZONALES</span>
			
			<br>

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

						<div>Aprobado por:</div>


					</td>


					<td style="text-align:justify; width:50%!important;  padding-top:4em; padding-bottom:4em;"  class="enfacis__letras">

				

					</td>

				</tr>


			</table>

			';


			/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/instalaciones";
			$parametro2=$idOrganismo."_"."InformeViabilidadInstalaciones"."_".$dia."_".$mes."_".$anio;	
			$parametro3=$idOrganismo."_"."InformeViabilidadInstalaciones"."_".$dia."_".$mes."_".$anio;
			
			/*=====  End of Generar pdf  ======*/

	break;

	case  "Informe__instalaciones__Incremento":


		$infoOrganismo = $objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,a.ruc,b.numeroDeAcuerdo,b.fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS representante, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS('--',a.direccion,a.referenciaDireccion,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a.idProvincia=a1.idProvincia LIMIT 1)), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS direccionCompleta,a.correo,a.idOrganismo FROM poa_organismo AS a INNER JOIN poa_organismo_acuerdo_ministerial AS b ON a.idOrganismo=b.idOrganismo WHERE a.idOrganismo='$idOrganismo';");


		/*===================================
			=            Generar pdf            =
			===================================*/

			$parametro1=VARIABLE__BACKEND."incrementosDecrementos/proyecto";
			$parametro2="Instalaciones__Organismo"."__".$idOrganismo."__".$fecha_actual;	
			$parametro3=$idOrganismo."__".$fecha_actual;
			
			/*=====  End of Generar pdf  ======*/


			$documentoCuerpo="

			
			<table class='col col-12' style='width:100%'>

			<tr>
			  
		
		
			  <th colspan='7'>
		
				<center>
					
				Formulario para la presentación del objeto de financiamiento para Incremento de recursos
				<br> 
				ORGANISMO DEPORTIVO
				<br>"
		
				.$infoOrganismo[0][nombre].
		
				"</center>
		
			  </th>
		
		
		
			</tr>
		
				
		
		  </table>
		
		
		  <table class='col col-12 mt-5' style='width:100%'>
		
			<tr>
			  
		
		
			  <th>
		
				<center>LOGO DEL ORGANISMO</center>
		
			  </th>
		
		
		
			</tr>
		
				
		
		  </table>
		
		  <table class='col col-12 mt-2' style='width:100%'>
		
			<tr>
			  
		
		
			  <th>
		
				<center>Nombre de la intervención:</center>
		
			  </th>
		
			  <td>
				".$objetoFinanciamiento."
			  </td>
		
		
		
			</tr>
		
				
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
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
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
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
				".$infoOrganismo[0][nombre]."
			  </td>
		
			</tr>
		
			<tr>
		
			  <th style='width:40%!important;'>
		
				&nbsp;&nbsp;RUC DE LA ORGANIZACIÓN:
		
			  </th>
		
			  <td style = 'background:#e8edff'>
				".$infoOrganismo[0][ruc]."
			  </td>
		
			</tr>
		
			<tr>
		
			  <th style='width:40%!important;'>
		
				&nbsp;&nbsp;NÚMERO Y FECHA DE ACUERDO MINISTERIAL:
		
			  </th>
		
			  <td style = 'background:#e8edff'>
				".$infoOrganismo[0][numeroDeAcuerdo]."
			  </td>
			  <td style = 'background:#e8edff'>
				".$infoOrganismo[0][fecha]."
			  </td>
		
			</tr>
		
			
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
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
				".$infoOrganismo[0][representante]."
			  </td>
		
			</tr>
		
			<tr>
		
			  <th style='width:40%!important;'>
		
				&nbsp;&nbsp;DIRECCIÓN COMPLETA:
		
			  </th>
		
			  <td style = 'background:#e8edff'>
				".$infoOrganismo[0][direccionCompleta]."
			  </td>
		
			</tr>
		
			<tr>
		
			  <th style='width:50%!important;'>
		
				&nbsp;&nbsp;CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:
		
			  </th>
		
			  <td style = 'background:#e8edff'>
				".$infoOrganismo[0][correo]."
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
		
					<center>Institucion</center>
		
				  </th>
		
				  <th colspan='1'  style = 'background:#e8edff'>
		
					<center>Aporte USD $</center>
		
				  </th>

				  <th style = 'background:#e8edff'>
		
					<center>Porcentaje %</center>
		
				  </th>
		
				</tr>
		
			  </thead>
		
			  <tbody>
		
				<tr>
		
			  
				  <th>
		
					<center>Ministerio del Deporte</center>
		
				  </th>
		
		
				  <td>
		
					<center>".$ministerioAporte."</center>
		
				  </td>
		
				  <td>
				  
				  	<center>".$ministerioPorcentaje."</center>

				  </td>
		
				</tr>
		
				<tr>
		
				<th>
		
				  <center>Ministerio del Deporte

				  5x1000 Contraloría General
				  
				  del Estado</center>
		
				</th>
				<td>
		
				  <center>".$contraloria."</center>
				
				</td>
				<td>
		
				  <center>".$contraloriaPorcentaje."</center>
				
				</td>


		
				</tr>

				<tr>
		
				<th>
		
				  <center>Autogestión (Organismo

				  Deportivo)</center>
		
				</th>

				<td>
		
				  <center>".$autogestion."</center>
				
				</td>

				<td>
		
				  <span> </span>
				
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
		
				  <th style='width:50%!important;'>
		
					<center>PAÍS</center>
		
				  </th>
				  <td>
		
					<center>".$selector__paises."</center>
				  
				  </td>
		
				</tr>
		
			
		
				<tr>
		
			  
				  <th style='width:50%!important;'
		
					<center>PROVINCIA</center>
		
				  </th>
		
		
				  <td>
		
					<center>".$provincia__Datos."</center>
		
				  </td>
		
				
		
				</tr>
		
				<tr>
		
				<th style='width:50%!important;'>
		
				  <center>CANTÓN</center>
		
				</th>
				<td>
		
				  <center>".$canton__Datos."</center>
				
				</td>
		
				</tr>
		
				<tr>
		
				<th style='width:50%!important;'>
		
				  <center>PARROQUIA / COMUNIDAD</center>
		
				</th>
				<td>
		
				  <center>".$parroquia__Datos."</center>
				
				</td>
		
				</tr>
		
				<tr>
		
				<th style='width:50%!important;'>
		
				  <center>UBICACIÓN ESPECÍFICA (Nombre del coliseo, estadio, otros, si aplica)</center>
		
				</th>
				<td>
		
				  <center>".$ubicacionEspecifica."</center>
				
				</td>
		
				</tr>
		
				<tr>
		
				<th style='width:50%!important;'>
		
				  <center>UBICACIÓN GEOGRÁFICA</center>
		
				</th>
				<td>
		
				  <center>".$ubicacionGeografica."</center>
				
				</td>
		
				</tr>
		
				
		
		
			  </tbody>
		
		  </table>
		
		  
		
		  <br>
		
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
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
		
			  <th style='margin-top:1em!important; width:100%!important;'>
		
			  &nbsp;2.2 ARTICULACIÓN NORMATIVA:
		
			  </th>
		
		
		
			</tr>
		
			<tr>
		
			  <th>
		
			  &nbsp;&nbsp;2.2.1 Articulación con la Constitución del Ecuador:
		
			  </th>
		
		
		
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
			  <td style='text-align:justify!important;'> 
			  
			  Art. 381 determina que.- “El Estado protegerá, promoverá y coordinará la Cultura Física que comprende el Deporte, la Educación Física y la Recreación, como actividades que contribuyen a la salud, formación y desarrollo integral de las personas; impulsará el acceso masivo al deporte y a las actividades deportivas a nivel formativo, barrial y parroquial; auspiciará la preparación y participación de los deportistas en competencias nacionales e internacionales, que incluyen los Juegos Olímpico y Paraolímpico; y fomentará la participación de las personas con discapacidad.
			  </td>
		
			</tr>
		
			<br>
		
			<tr>
			  <td style='text-align:justify!important;'>
		
				El Estado garantizará los recursos y la infraestructura necesaria para estas actividades. Los recursos se sujetarán al control estatal, rendición de cuentas y deberán distribuirse en forma equitativa”.
			
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
		
			<tr>
		
			  <th>
		
			  &nbsp;&nbsp;2.2.2 Articulación con la Ley del Deporte, Educación Física y Recreación
		
			  </th>
		
		
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
			  <td>
				Señalar el Art y literal que ampara la Ley del Deporte, Educación Física a la ejecución del Objeto de financiamiento. Ejemplo:
			  </td>
			</tr>
		
			<tr>
			  <td style='text-align:justify!important;'> 
			  
			  Art. 13, señala lo siguiente: Del Ministerio. - “El Ministerio Sectorial es el órgano rector y planificador del Deporte, Educación Física y Recreación; le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, las leyes, instrumentos internacionales y reglamentos aplicables.
		
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
		
			  Art. 14, Las funciones y atribuciones del Ministerio son: literal a) “Proteger, propiciar, estimular, promover, coordinar, planificar, fomentar, desarrollar y evaluar el Deporte, Educación Física y Recreación de toda la población, incluido las y los ecuatorianos que viven en el exterior”; g) Aprobar los objetos de financiamientos o programas de las organizaciones deportivas contempladas en esta Ley que se financien con recursos públicos no contemplados en el plan operativo anual”.
			  
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
			  <td style='text-align:justify!important;'> 
		
			  Art. 85 Reglamento Ley del Deporte, Para análisis de la viabilidad de financiamiento de infraestructura con fondos del Ministerio Sectorial, los solicitantes deberán presentar un estudio que determine la factibilidad y el potencial uso que la población pueda hacer de dicha instalación y deberán adjuntar la documentación en los términos previstos por el Ministerio Sectorial. 
			  
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
		
			<tr>
		
			  <th style='text-align:justify!important;'>
		
			  &nbsp;&nbsp;2.2.3 Articulación con el Código Orgánico de Planificación y Finanzas Públicas. - (Acuerdo Ministerial 447, Registro Oficial Suplemento 259 de 24 de enero 2008, Ultima modificación: 16-abr-2013, Estado: Vigente)
		
			  </th>
		
			</tr>
			
		  </table>
		
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
		
			  <th>
		
			  &nbsp;&nbsp;2.2.4 Articulación del objeto de financiamiento con el Plan Nacional de Desarrollo “Plan de Creación de Oportunidades 2021-2025  
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
			  <td style='text-align:justify!important;'> 
			  
			  6.7.3. Reducir el tiempo de comportamiento sedentario en un día normal de 120 minutos a 114 minutos en la población de niñas, niños y jóvenes (5-17 años)
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
			  <td style='text-align:justify!important;'> 
			  
			  6.7.4. Reducir el tiempo de comportamiento sedentario en un día normal de 150 minutos a 143 minutos en la población adulta (18-69 años).
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
			  <td style='text-align:justify!important;'> 
			  
			  Objetivo 7. Potenciar las capacidades de la ciudadanía y promover una educación innovadora, inclusiva y de calidad en todos los niveles
			  
			  
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
			  <td style='text-align:justify!important;'> 
			  
			  Politicas: 7.5 Impulsar la excelencia deportiva con igualdad de oportunidades, pertinencia territorial e infraestructura deportiva de calidad.
			  </td>
			</tr>
		  </table>
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
			  <td style='text-align:justify!important;'> 
			  
			  Metas: 7.5.1. Incrementar el porcentaje de atletas con discapacidad de alto rendimiento del 10,66% al 11,31%
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
			<tr>
		
			  <th>
		
			  &nbsp;&nbsp;2.2.5	Articulación del objeto de financiamiento con los objetivos estratégicos institucionales:
		
			  </th>
		
		
		
			</tr>
		  </table>
		
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
		
			  <th>
		
			  &nbsp;2.3	JUSTIFICACIÓN
		
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
		
			  &nbsp;2.4 OBJETIVO GENERAL Y OBJETIVOS ESPECÍFICOS
		
			  </th>
		
		
		
			</tr>
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>		
		
			<tr>
		
			  <th>
		
			  &nbsp;&nbsp;2.4.1	Objetivo general o propósito
		
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
		
			  &nbsp;&nbsp;2.4.2	Objetivos Específicos
		
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
		
			  &nbsp;2.5 META DEL OBJETO DE FINANCIAMIENTO
		
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
		
				MATRICES DESTINO DE RECURSOS E INDICADORES
		
			  </th>
		
			</tr>
		
		  </table>
		
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
		
			  <th>
		
			  &nbsp;2.5 IDENTIFICACIÓN Y CARACTERIZACIÓN DE LA POBLACIÓN BENEFICIARIA:
		
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
		
			  Son las personas que se benefician directamente de la ejecución del objeto de financiamiento. Ejemplo: deportistas, estudiantes.						
			  </td>
			</tr>
		  </table>
		
		  <table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>
		
			<thead style = 'background:#e8edff!important;'>
		
			  <tr>
		
				  
		
				  <th colspan='1' style='background-color: #e8edff;'>
		
				  <center>N°</center>
		
				  </th>
		
				  <th colspan='2' style='background-color: #e8edff;'>
		
				  <center>Apellidos y Nombres</center>
		
				  </th>
		
				  <th colspan='2' style='background-color: #e8edff;'>
		
				  <center>N°. Cédula de ciudadanía</center>
		
				  </th>
		
				  <th colspan='3' style='background-color: #e8edff;'>
		
					<center>Cargo</center>
		
				  </th>
		
				  <th colspan='2' style='background-color: #e8edff;'>
		
					<center>Tipo de Cargo</center>
		
				  </th>
		
			  </tr>
		
			</thead>
		
			<tbody>";
		
			$nombre = count($nombresB);
		
			for($i = 0; $i < $nombre; $i++) {
		
			  $valor = $i+1;
		
			  $documentoCuerpo.="
		
			  <tr>
				<td colspan='1'><center>".$valor."</center></td>
				<td colspan='2'><center>".$nombresB[$i]."</center></td>
				<td colspan='2'><center>".$cedulaB[$i]."</center></td>
				<td colspan='3'><center>".$cargoB[$i]."</center></td>
				<td colspan='2'><center>".$tipoB[$i]."</center></td>
			  </tr>	
		
			  ";
			  
			}
		
			$documentoCuerpo.="
			</tbody>
		
			
		
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
		
			
			$edad = count($desdeEdad);
		
			for($i = 0; $i < $edad; $i++) {
		
		
			  $documentoCuerpo.="
		
			  <tr>
				<td colspan='1'><center>".$desdeEdad[$i]."</center></td>
				<td colspan='1'><center>".$hastaEdad[$i]."</center></td>
				<td colspan='1'><center>".$masculino[$i]."</center></td>
				<td colspan='1'><center>".$femenino[$i]."</center></td>
				<td colspan='1'><center>".$mestizo[$i]."</center></td>
				<td colspan='1'><center>".$montubio[$i]."</center></td>
				<td colspan='1'><center>".$indigena[$i]."</center></td>
				<td colspan='1'><center>".$blanco[$i]."</center></td>
				<td colspan='1'><center>".$afro[$i]."</center></td>
				<td colspan='1'><center>".$total[$i]."</center></td>
			  </tr>	
		
			  ";
			  
			}
		
			$documentoCuerpo.="
			</tbody>
		
			
		
		  </table>
		
		  
				
		  ";		
		  
		
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
		
			  
			$ind = count($indirecto);
		
			for($i = 0; $i < $ind; $i++) {
		
			  $documentoCuerpo.="
		
			  <tr>
				<td colspan='1'><center>".$indirecto[$i]."</center></td>
				<td colspan='1'><center>".$totalI[$i]."</center></td>
				<td colspan='1'><center>".$justificacion[$i]."</center></td>
			  </tr>	
		
			  ";
			  
			}
		
			$documentoCuerpo.="
			</tbody>
		
			  
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
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
		
			  &nbsp;&nbsp;3.1.1 Escenario deportivo (Nombre del escenario deportivo que realizará la intervención):
		
			  </th>
		
		
		
			</tr>
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
		
			  <td style = 'background:#e8edff'>
		
				".$nombreInfra."
		
			  </td>
		
		
		
			</tr>
		  </table>
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
		
			  <th>
		
			  &nbsp;&nbsp;3.1.2 Situación Legal del escenario deportivo (Requisito Obligatorio):
		
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
		
			  &nbsp;&nbsp;3.1.3 Aprobación Municipal de planos y permiso de construcción (Requisito Condicionado):
		
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
		
			  &nbsp;3.2 ESPECIFICACIONES TECNICAS:
		
			  </th>
		
		
		
			</tr>
		
			
		  </table>
		
		  <table style='width:100%!important;'>
				
				<tr>
		
					<th>
			
					3.2.1	Tipo de gasto: Seleccionar el tipo de gasto: Por mantenimiento de infraestructura deportiva
			
					</th>

				</tr>

				<tr>
					<td align='justify' style = 'background:#e8edff'>
			
					".$selectTipoGasto."
				
					</td>
				
				</tr>
				
		
				
		
				<tr>
					<th style='margin-top:1em!important; width:100%!important;'>
			
					3.2.2	Tipo de Intervención del gasto
		
					</th>
				
				</tr>
		
				<tr>
					<td align='justify' style = 'background:#e8edff'>
			
					".$tipoIntervencion."
				
					</td>
				</tr>
				
				<tr>
					<th>
			
					3.2.3	Planos y anexos gráficos: (debidamente suscritos por el profesional en la rama, aplica para rehabilitación únicamente

					</th>
				</tr>

				<tr>
					<td align='justify' style = 'background:#e8edff'>
			
					".$planoAnexo."
				
					</td>
				</tr>
		
		
				<tr>
					<th >
			
					3.2.4	Contemplar parámetros de accesibilidad:
		
					</th>
				</tr>
		
				
				<tr>
					<td align='justify' style = 'background:#e8edff'>
			
					".$parametrosAccesibilidad."
				
					</td>
				</tr>

				<tr>
					<th >
			
					3.2.5	Registro fotográfico de la intervención a subsanar:
		
					</th>
				</tr>
				
				<tr>
					<td align='justify' style = 'background:#e8edff'>
			
					".$registroFotografico."
					
					</td>
		
				</tr>
		
		
		  </table>
		
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
		
			  <th>
		
			  &nbsp;3.3 PRESUPUESTO REFERENCIAL
		
			  </th>
		
		
		
			</tr>
		
		
			<tr>
		
			  <th>
		
			  &nbsp;3.3.1 Por rehabilitación
		
			  </th>
		
		
		
			</tr>
			<tr>
		
			  <th>
		
			  &nbsp;Análisis de precios unitarios para rehabilitación, readecuación: (debe de contemplar los gastos directos e indirectos) N/A
		
			  </th>
		
		
		
			</tr>
		
			<tr>
		
			  <td style = 'background:#e8edff'>
		
				".$preciosUnitarios."
		
			  </td>
		
		
		
			</tr>
			<tr>
		
			  <th>
		
			  &nbsp;Presupuesto: (valor referencial) N/A
		
			  </th>
		
		
		
			</tr>
		
			<tr>
		
			  <td style = 'background:#e8edff'>
		
				".$presupuestoReferencial."
		
			  </td>
		
		
		
			</tr>
			<tr>
		
			  <th>
		
			  &nbsp;Cálculos de Volúmenes de Obra N/A
		
			  </th>
		
		
		
			</tr>
		
			<tr>
		
			  <td style = 'background:#e8edff'>
		
				".$volumenesObra."
		
			  </td>
		
		
		
			</tr>
		
			<tr>
		
			  <th>
		
			  &nbsp;3.3.2 Por mantenimiento
		
			  </th>
		
		
		
			</tr>
			<tr>
		
			  <th>
		
			  &nbsp;Estudio de mercado para mantenimiento: (acorde a los bienes y/o servicios detallar el cuadro comparativo de mínimo 2 cotizaciones y respaldar con las 2 cotizaciones):
		
			  </th>
		
		
		
			</tr>
		
			
		  </table>
		
		  <table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>
		
			  <thead>
		
				<tr>
		
				  <th  >
		
					<center>Intervención a realizar</center>
		
				  </th>
		
				  <th >
		
					<center>Materiales o Servicios a requerir para el mantenimiento</center>
		
				  </th>
		
				  <th >
		
					<center>Código Ítem</center>
		
				  </th>
				  <th >
		
					<center>Nombre del ítem </center>
		
				  </th>
				  <th >
		
					<center>Monto Proveedor 1</center>
		
				  </th>
				  <th >
		
					<center>Monto Proveedor 2</center>
		
				  </th>
		
				</tr>
		
			  </thead>
		
			  <tbody>";
		
			  
			
		
			$documentoCuerpo.="
			</tbody>
		
			<tfoot>
			  <tr><th colspan='4'>Total</th>
				<td colspan='1'>".$totalProveedor1."</td>
				<td colspan='1'>".$totalProveedor2."</td>
			  </tr>
			</tfoot>
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
			  <td style='text-align:justify!important;'>
		
			  Nota: Si el Organismo deportivo va a realizar un servicio las cotizaciones o proformas deben estar enmarcadas en un servicio, usando el ítem adecuado. Si el Organismo deportivo va a realizar la compra de materiales, las cotizaciones o proformas deben estar enmarcada en materiales.
			  
			  </td>
		
			</tr>
		
			<tr style='text-align:justify!important;'>El detalle de la intervención a realizar debe estar en coherencia con lo declarado 3.2.2.</tr>
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
		  <tr>
		
			<th>
		
			&nbsp;3.3 PROPUESTA DE USO DE IMAGEN CORPORATIVA
		
			</th>
		
		
		
		  </tr>
		  <tr>
		
			<td>
		
			Ejemplo: La imagen institucional de la secretaria de Deporte será difundida mediante un letrero en el ingreso del escenario deportivo con medidas de 1.22 m x 2.44 m.
		
			</td>
		
		
		
		  </tr>
		
		  <tr>
			<td style='text-align:justify!important;'>
			  ".$propuestaImagenCorporativa."
			</td>
		  </tr>
		
		  </table>
		
		
		  <table style='margin-left:0!important; width:100%!important; border-collapse: collapse; margin-top:1em!important;' border='1'>
		
			  <thead>
		
				<tr>
		
				  <th  >
		
					<center>Actividad</center>
		
				  </th>
		
				  <th >
		
					<center>Perioricidad</center>
		
				  </th>
		
				  <th >
		
					<center>Costo</center>
		
				  </th>
				  
				</tr>
		
			  </thead>
		
			  <tbody>";
		
			  
			$actividad = count($actividadM);
		
			for($i = 0; $i < $actividad; $i++) {
		
			  
		
			  $documentoCuerpo.="
		
			  <tr>
				<td colspan='1'><center>".$actividadM[$i]."</center></td>
				<td colspan='1'><center>".$periodicidadM[$i]."</center></td>
				<td colspan='1'><center>".$costoM[$i]."</center></td>
			  </tr>	
		
			  ";
			  
			}
		
			$documentoCuerpo.="
			</tbody>
		
		  </table>
		  
		
		  <table style='margin-left:0!important; width:100%!important; margin-top:1em!important;'>
		
			  <thead>
		
				<tr>
		
				  <th>
		
					4. Anexos
		
				  </th>
								  
				</tr>
		
			  </thead>
		
			  <tbody>";
		
			  if($escrituraP != "" || $escrituraP != null){
				$escrituraP = "- Copia de la escritura pública del predio";
			  }else{
				$escrituraP = "";
			  }
			  if($comodato != "" || $comodato != null){
				$comodato = "- Copia del comodato perpetuo";
			  }else{
				$comodato = "";
			  }
			  if($arrendamiento != "" || $arrendamiento != null){
				$arrendamiento = "- Copia de contrato de arrendamiento";
			  }else{
				$arrendamiento = "";
			  }
			  if($estudioMercado != "" || $estudioMercado != null){
				$estudioMercado = "- Estudio de mercado para mantenimiento con respaldo de Tres cotizaciones";
			  }else{
				$estudioMercado = "";
			  }
			  if($registroFoto != "" || $registroFoto != null){
				$registroFoto = "- Registro fotográfico de la intervención a subsanar";
			  }else{
				$registroFoto = "";
			  }
			  if($matrizDestinoIn != "" || $matrizDestinoIn != null){
				$matrizDestinoIn = "- Matriz de destino incrementos de recursos Organismos Deportivo";
			  }else{
				$matrizDestinoIn = "";
			  }
			  if($auxiliarMantenimiento != "" || $auxiliarMantenimiento != null){
				$auxiliarMantenimiento = "- Hoja auxiliar de mantenimiento";
			  }else{
				$auxiliarMantenimiento = "";
			  }
			  
		
			  $documentoCuerpo.="
		
			  <tr>
				<td>".$escrituraP."</td>
			  </tr>	
			  <tr>
				<td>".$comodato."</td>
			  </tr>	
			  <tr>
				<td>".$arrendamiento."</td>
			  </tr>	
			  <tr>
				<td>".$estudioMercado."</td>
			  </tr>	
			  <tr>
				<td>".$registroFoto."</td>
			  </tr>	
			  <tr>
				<td>".$matrizDestinoIn."</td>
			  </tr>	
			  <tr>
				<td>".$auxiliarMantenimiento."</td>
			  </tr>	
		
			  ";
		
			$documentoCuerpo.="
			</tbody>
		
		  </table>
		
		  <table style='margin-top:1em!important; width:100%!important;'>
		
			<tr>
			  <th>
		
			  
			  FIRMA DE RESPONSABILIDAD:
			  
			  </th>
		
		
		
			</tr>
		
		  
		
			
		  </table>
		
		
		  <table border='1' style='border-collapse: collapse; margin-top:2em!important; margin-top:1em!important; width:100%!important;'>
		
			<tr>
		
			  <th style='height:50px!important; width:50%!important;'>
		
				<center>
		
				  <br>
				  <br>
				  <div>".$infoOrganismo[0][representante]."</div>
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
			<img src="../../images/footer.png" />
		</div>
	<?php } else { ?>
		<div id="" style="position: relative; left: 10%;">
			<img style=" width:20%!important; margin-bottom:2em!important;" src="../../images/headerPdf2.png" />
		</div>

		<div id="footer">
			<img style=" width:100%!important; margin-top:0em!important; margin-bottom:0em!important;" src="../../images/footer2.png" />
		</div>
	<?php } ?>


	<div id="content">

		<?= $documentoCuerpo ?>

	</div>

</body>

</html>

<?php

include_once "../../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

if ($horizontal == true) {
	// Definimos el tamaño y orientación del papel que queremos.h
	$dompdf->setPaper('A3', 'landscape');
}



$dompdf->loadHtml(ob_get_clean());

$dompdf->render();

$canvas = $dompdf->get_canvas();
$canvas->page_text(510, 12, "Página {PAGE_NUM} de {PAGE_COUNT}", "helvetica", 8, array(0, 0, 0)); //header//header
$canvas->page_text(54, 778, "", "helvetica", 8, array(0, 0, 0)); //footer

$contenido = $dompdf->output();

$nombreDelDocumento = $parametro1  .$parametro3 . ".pdf";

$bytes = file_put_contents($nombreDelDocumento, $contenido);


if ($tipoPdf != "") {

	$dompdf->stream($parametro2);
}
