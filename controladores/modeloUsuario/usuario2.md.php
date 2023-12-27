<?php

/*===================================================
=            Llamando Funciòn php mailer            =
===================================================*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
			
/*=====  End of Llamando Funciòn php mailer  ======*/


class usuarioAcciones{

	private static $baseInsercion="`ezonshar_mdepsaddb2`";

	public function getInserta($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$sql="INSERT INTO ".self::$baseInsercion.".".$parametro1."(";

 		for ($i=0; $i < count($parametro2); $i++) { 
 			
 			$sql.=$parametro2[$i];

 		}

 		$sql.=") VALUES (NULL,";

 		for ($i=0; $i < count($parametro3); $i++) { 

 			$sql.=$parametro3[$i];

 		}

 		$sql.=");";

 		$query = $conexionEstablecida->prepare($sql);

 		for ($z=0; $z < count($parametro4); $z++) { 

			$query->bindParam($parametro5[$z],$parametro4[$z],PDO::PARAM_STR);

 		}

 		$resultado=$query->execute();

 		return $resultado;

	}



	public function getEliminarNormal($parametro1,$parametro2){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$sql="DELETE FROM $parametro1 WHERE idInterventor='$parametro2';";
		$resultado= $conexionEstablecida->exec($sql);

 		return $resultado;

	}


	public function getInsertaNormal($parametro1,$parametro2,$parametro3){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$sql="INSERT INTO ".self::$baseInsercion.".".$parametro1."(";

 		for ($i=0; $i < count($parametro2); $i++) { 
 			
 			$sql.=$parametro2[$i];

 		}

 		$sql.=") VALUES (NULL,";

 		for ($i=0; $i < count($parametro3); $i++) { 

 			$sql.=$parametro3[$i];

 		}

 		$sql.=");";

		$resultado= $conexionEstablecida->exec($sql);

 		return $resultado;

	}

	public function getMaximoFuncion($parametro1,$parametro2){


		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		$query="SELECT MAX($parametro1) AS maximo FROM $parametro2;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$idMaximo=$registro['maximo'];

		}

		return $idMaximo;

	}

	public function getInsertaMaximos($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$sql="INSERT INTO ".self::$baseInsercion.".".$parametro1."(";

 		for ($i=0; $i < count($parametro2); $i++) { 
 			
 			$sql.=$parametro2[$i];

 		}

 		$sql.=") VALUES (NULL,";

 		for ($i=0; $i < count($parametro3); $i++) { 

 			$sql.=$parametro3[$i];

 		}

 		$sql.=");";


		$query="SELECT MAX($parametro7) AS maximo FROM $parametro6;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$idMaximo=$registro['maximo'];

		}


 		$query = $conexionEstablecida->prepare($sql);

 		for ($z=0; $z < count($parametro4); $z++) { 

 			if ($parametro4[$z]=="id") {
 				
 				$query->bindParam($parametro5[$z],$idMaximo,PDO::PARAM_STR);

 			}else{

 				$query->bindParam($parametro5[$z],$parametro4[$z],PDO::PARAM_STR);

 			}

 		}

 		$resultadoTotal=$query->execute();

 		return $resultadoTotal;

	}



	public function getActualiza($parametro1,$parametro2,$parametro3,$parametro4){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="UPDATE $parametro1 SET ";

		for ($i=0; $i < count($parametro2); $i++) { 

			$query.=$parametro2[$i];

		}

		$query.=" WHERE $parametro3=$parametro4;";

		$resultado= $conexionEstablecida->exec($query);

		return $resultado;



	}

	public function getActualiza__confirmado($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="UPDATE $parametro1 SET ";

		for ($i=0; $i < count($parametro2); $i++) { 

			$query.=$parametro2[$i];

		}

		$query.=" WHERE $parametro3='$parametro4' AND $parametro5='$parametro6';";

		$resultado= $conexionEstablecida->exec($query);

		return $resultado;



	}

	public function getElimina($parametro1,$parametro2,$parametro3){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="DELETE FROM $parametro1 WHERE $parametro2='$parametro3'";
		$resultado= $conexionEstablecida->exec($query);

		return $query;


	}

	public function getElimina__indices($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="DELETE FROM $parametro1 WHERE $parametro2='$parametro3' AND $parametro4='$parametro5'";
		$resultado= $conexionEstablecida->exec($query);

		return $query;


	}


	public function getBuscador($parametro1,$parametro2,$parametro3){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="SELECT $parametro2 AS buscado FROM $parametro1 WHERE $parametro2='$parametro3' LIMIT 1;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$buscado=$registro['buscado'];

		}

		if (!empty($buscado)) {
			return "no";
		}else{
			return "si";
		}

	}


	public function getBuscadorInicial($parametro1,$parametro2,$parametro3,$parametro4){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="SELECT $parametro1 AS buscado FROM $parametro2 WHERE $parametro3='$parametro4' LIMIT 1;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$buscado=$registro['buscado'];

		}

		return $buscado;

	}

	public function getBuscadorInicial2($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="SELECT $parametro1 AS buscado FROM $parametro2 WHERE $parametro3='$parametro4' AND $parametro5='$parametro6' LIMIT 1;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$buscado=$registro['buscado'];

		}

		return $query;

	}


	public function getBuscadorTotales($parametro1,$parametro2){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="SELECT $parametro1 FROM $parametro2";
		$resultado = $conexionEstablecida->query($query);

		return $resultado;


	}

	public function getDatatablets($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		$query=$parametro1;
		$resultado = $conexionEstablecida->query($query);

		if (!$resultado) {

			echo "error";
			
		}else{ 

			$arreglo=array();
			while($data=$resultado->fetch()){
				$arreglo["data"][]=$data;
			}

		}

		return $arreglo;


	}

	public function getDatatablets2($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

		$query=$parametro1;
		$resultado = $conexionEstablecida->query($query);

		if (!$resultado) {

			echo "error";
			
		}else{ 

			$arreglo=array();
			while($data=$resultado->fetch()){
				$arreglo["data"][]=$data;
			}

		}

		return $arreglo;


	}


	public function getEnviarPdf($tipo,$tamanio,$archivotmp,$archivotmpNombre,$parametro2,$parametro3){

		if($tipo=="application/pdf"){

			if(rename($archivotmp,$parametro2.$parametro3)){

				return "si";

			}else{

				return "nopdf";

			}

		}else{

			return "no";

		}

	}

	public function getEnviarCorreoDosParametros($parametro1,$parametro2,$parametro3){


		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {

			//Server settings
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'ministerioDeporte2021@gmail.com';                     // SMTP username
			$mail->Password   = 'qkcdcbkuankaxvmx';                            // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			$mail->CharSet = 'UTF-8';
			//Recipients
			$mail->setFrom($parametro3, 'POA');

			for ($i=0; $i < count($parametro1); $i++) { 
				
				$mail->addAddress($parametro1[$i]); 

			}

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Ministerio del deporte';
			$mail->Body = $parametro2; 

			return $mail->send();

		} catch (Exception $e) {
			
			return "no";

		}

	}


	public function getEnviarCorreo__atachmen($parametro1,$parametro2,$parametro3,$parametro4){


		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {

			//Server settings
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'ministerioDeporte2021@gmail.com';                     // SMTP username
			$mail->Password   = 'qkcdcbkuankaxvmx';                            // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			$mail->CharSet = 'UTF-8';
			//Recipients
			$mail->setFrom('ministerioDelDeporte@deporte.gob.ec', 'Ministerio del deporte');

			for ($i=0; $i < count($parametro1); $i++) { 
				
				$mail->addAddress($parametro1[$i]); 

			}

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Ministerio del deporte';
			$mail->Body = $parametro2; 

			$mail->addAttachment($parametro3); 

			$mail->addAttachment($parametro4);

			return $mail->send();

		} catch (Exception $e) {
			
			return "no";

		}

	}


	public function getEnviarCorreo($parametro1,$parametro2){


		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {

			//Server settings
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'ministerioDeporte2021@gmail.com';                     // SMTP username
			$mail->Password   = 'qkcdcbkuankaxvmx';                            // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			$mail->CharSet = 'UTF-8';
			//Recipients
			$mail->setFrom('ministerioDelDeporte@deporte.gob.ec', 'Ministerio del deporte');

			for ($i=0; $i < count($parametro1); $i++) { 
				
				$mail->addAddress($parametro1[$i]); 

			}

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Ministerio del deporte';
			$mail->Body = $parametro2; 

			return $mail->send();

		} catch (Exception $e) {
			
			return "no";

		}

	}

	public function getObtenerInformacionGeneral($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare($parametro1);
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	

	public function mesesSumarS($parametro1,$parametro2){

		$suma=0;

		$suma=round(floatval($parametro1) + floatval($parametro2),2);

		return $suma;

	}



	public function restarSumas($parametro1,$parametro2){

		$suma=0;

		$suma=round(floatval($parametro1) - floatval($parametro2),2);

		$suma=abs($suma);

		return $suma;

	}

	public function mesesSumarSTotal($parametro1,$parametro2){

		$suma=0;

		$suma=round(floatval($parametro1) + floatval($parametro2),2) * 12;

		return $suma;

	}

	public function getInformacionCompletaOrganismoDeportivoConsu($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreResponsablePoa, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreResponsablePoa,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreDelOrganismoSegunAcuerdo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreDelOrganismoSegunAcuerdo,a.correo,a.correoResponsablePoa,d.idInversion,d.nombreInversion,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.ruc,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nobreCompleto FROM poa_organismo AS a LEFT JOIN poa_usuario AS b ON a.idUsuario=b.idUsuario LEFT JOIN poa_inversion_usuario AS c ON c.idOrganismo=a.idOrganismo LEFT JOIN poa_inversion AS d ON d.idInversion=c.idInversion WHERE a.idOrganismo='$parametro1' GROUP BY c.idOrganismo ORDER BY d.idInversion DESC LIMIT 1;");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	


	public function getInformacionCompletaOrganismoDeportivoConsuDos($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.nombreResponsablePoa,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreDelOrganismoSegunAcuerdo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreDelOrganismoSegunAcuerdo,a.correo,a.correoResponsablePoa,(SELECT a2.idInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idInversionUsuario DESC LIMIT 1) AS idInversion,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idInversionUsuario DESC LIMIT 1) AS nombreInversion,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo FROM poa_organismo AS a INNER JOIN poa_usuario AS b ON a.idUsuario=b.idUsuario WHERE a.idOrganismo='$parametro1' GROUP BY a.idOrganismo;");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	


	public function getDirectorPlani(){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$query = $conexionEstablecida->prepare("SELECT CONCAT_WS(' ',a.nombre,a.apellido) AS nombreDi FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	

	function sumasdiasemana($fecha,$dias){

		$datestart= strtotime($fecha);

		$datesuma = 15 * 86400;

		$diasemana = date('N',$datestart);

		$totaldias = $diasemana+$dias;

		$findesemana = intval( $totaldias/5) *2 ; 

		$diasabado = $totaldias % 5 ; 

		if ($diasabado==6) $findesemana++;

		if ($diasabado==0) $findesemana=$findesemana-2;

		$total = (($dias+$findesemana) * 86400)+$datestart ; 

		$fechafinal = date('Y-m-d', $total);


		$firstDate  = new DateTime($fecha);
		$secondDate = new DateTime($fechafinal);

		$intvl = $firstDate->diff($secondDate);

		$contador=$intvl->d;

		$fechaAdicional=date('Y-m-d', $datestart);

		for ($i=0; $i < $contador; $i++) { 
			

			if ($fechaAdicional=="2022-04-15") {

				$mod_date2 = strtotime($fechafinal."+ 1 days");

				$fechafinal=date("Y-m-d",$mod_date2);
				
			}

			$mod_date = strtotime($fechaAdicional."+ 1 days");

			$fechaAdicional=date("Y-m-d",$mod_date);
			

		}

		return $fechafinal;
	 

	}

}