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

	private static $baseInsercion="`ezonshar_mdepsaddb`";

	public function insertSingleRow($tabla,$campos,$task) {

		$conexionRecuperada= new Conexion();
	 	$conexionEstablecida=$conexionRecuperada->cConexion();

	 	try{

			$sql = "INSERT INTO $tabla (";
			$contador1=0;

		    foreach ($campos as $key => $valor) {

		    	$contador1++;

		    	if ($contador1==count($campos)) {
		       		$sql.=" `".$valor."`";
		    	}else{
		       		$sql.=" `".$valor."`, ";
		    	}

		    }

		    $sql.=") VALUES (";

		    $contador2=0;

		    foreach ($campos as $key => $valor) {

		    	$contador2++;

		    	if ($contador2==count($campos)) {
		       		$sql.=" :".$valor."";
		    	}else{
		       		$sql.=" :".$valor.", ";
		    	}
		        	
		    }

		    $sql.=");";

		    $resultado = $conexionEstablecida->prepare($sql);

		    return $resultado->execute($task);

		}catch(PDOException $e){

		    echo "ERROR: " . $e->getMessage();

		}

    }

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


	public function get__obtengoInformacion__modiIngresadas(){


		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
		$idOrganismoSession=$_SESSION["idOrganismoSession"];

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$query = $conexionEstablecida->prepare("SELECT estado FROM poa_modificaciones_envio_inicial WHERE idOrganismo='$idOrganismoSession' AND periodoIngreso='$aniosPeriodos__ingesos';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	


	public function get__idOrganismo__sesiones(){

		$idOrganismoSession=$_SESSION["idOrganismoSession"];

		return $idOrganismoSession;

	}

	public function get__obtener__Selector__anios(){

		$selectorAnios=$_SESSION["selectorAniosA"];

		return $selectorAnios;

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

	public function getActualiza__confirmado__2($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="UPDATE $parametro1 SET ";

		for ($i=0; $i < count($parametro2); $i++) { 

			$query.=$parametro2[$i];

		}

		$query.=" WHERE $parametro3='$parametro4' AND $parametro5='$parametro6' AND $parametro7='$parametro8';";

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

	public function getElimina__indices__dos($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


		$query="DELETE FROM $parametro1 WHERE $parametro2='$parametro3' AND $parametro4='$parametro5' AND $parametro6='$parametro7';";
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
			$mail->Password   = 'flloexddodrdqusj';                            // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			$mail->CharSet = 'UTF-8';
			//Recipients
			$mail->setFrom('ministerioDeporte2021@gmail.com', 'POA');

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
			$mail->Password   = 'flloexddodrdqusj';                            // SMTP password
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
			$mail->Username   = 'ministerioDeporte2021@gmail.com';                     // SMTP usernamed
			$mail->Password   = 'flloexddodrdqusj';                            // SMTP password
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


	public function getObtenerModificaciones__origen($parametro1,$parametro2){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare($parametro1);
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];
			$totalBase=$valor["total"];

		}

		$eneroBase= floatval($eneroBase) - floatval($parametro2[0]);
		$febreroBase= floatval($febreroBase) - floatval($parametro2[1]);
		$marzoBase= floatval($marzoBase) - floatval($parametro2[2]);
		$abrilBase= floatval($abrilBase) - floatval($parametro2[3]);
		$mayoBase= floatval($mayoBase) - floatval($parametro2[4]);
		$junioBase= floatval($junioBase) - floatval($parametro2[5]);
		$julioBase= floatval($julioBase) - floatval($parametro2[6]);
		$agostoBase= floatval($agostoBase) - floatval($parametro2[7]);
		$septiembreBase= floatval($septiembreBase) - floatval($parametro2[8]);
		$octubreBase= floatval($octubreBase) - floatval($parametro2[9]);
		$noviembreBase= floatval($noviembreBase) - floatval($parametro2[10]);
		$diciembreBase= floatval($diciembreBase) - floatval($parametro2[11]);
		$totalBase= floatval($totalBase) - floatval($parametro2[12]);

		array_push($data1, $eneroBase);
		array_push($data1, $febreroBase);
		array_push($data1, $marzoBase);
		array_push($data1, $abrilBase);
		array_push($data1, $mayoBase);
		array_push($data1, $junioBase);
		array_push($data1, $julioBase);
		array_push($data1, $agostoBase);
		array_push($data1, $septiembreBase);
		array_push($data1, $octubreBase);
		array_push($data1, $noviembreBase);
		array_push($data1, $diciembreBase);
		array_push($data1, $totalBase);


		return $data1;

	}	

	public function getObtenerModificaciones__destino($parametro1,$parametro2){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare($parametro1);
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];
			$totalBase=$valor["total"];

		}

		$eneroBase= floatval($eneroBase) + floatval($parametro2[0]);
		$febreroBase= floatval($febreroBase) + floatval($parametro2[1]);
		$marzoBase= floatval($marzoBase) + floatval($parametro2[2]);
		$abrilBase= floatval($abrilBase) + floatval($parametro2[3]);
		$mayoBase= floatval($mayoBase) + floatval($parametro2[4]);
		$junioBase= floatval($junioBase) + floatval($parametro2[5]);
		$julioBase= floatval($julioBase) + floatval($parametro2[6]);
		$agostoBase= floatval($agostoBase) + floatval($parametro2[7]);
		$septiembreBase= floatval($septiembreBase) + floatval($parametro2[8]);
		$octubreBase= floatval($octubreBase) + floatval($parametro2[9]);
		$noviembreBase= floatval($noviembreBase) + floatval($parametro2[10]);
		$diciembreBase= floatval($diciembreBase) + floatval($parametro2[11]);
		$totalBase= floatval($totalBase) + floatval($parametro2[12]);

		array_push($data1, $eneroBase);
		array_push($data1, $febreroBase);
		array_push($data1, $marzoBase);
		array_push($data1, $abrilBase);
		array_push($data1, $mayoBase);
		array_push($data1, $junioBase);
		array_push($data1, $julioBase);
		array_push($data1, $agostoBase);
		array_push($data1, $septiembreBase);
		array_push($data1, $octubreBase);
		array_push($data1, $noviembreBase);
		array_push($data1, $diciembreBase);
		array_push($data1, $totalBase);


		return $data1;

	}	

	public function actualizarProgramacion__financiera__modificaciones__origen($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) + floatval($array[0]);
		$febreroResul=floatval($febreroBase) + floatval($array[1]);
		$marzoResul=floatval($marzoBase) + floatval($array[2]);
		$abrilResul=floatval($abrilBase) + floatval($array[3]);
		$mayoResul=floatval($mayoBase) + floatval($array[4]);
		$junioResul=floatval($junioBase) + floatval($array[5]);
		$julioResul=floatval($julioBase) + floatval($array[6]);
		$agostoResul=floatval($agostoBase) + floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) + floatval($array[8]);
		$octubreResul=floatval($octubreBase) + floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) + floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) + floatval($array[11]);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_programacion_financiera SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',totalTotales='$resulResul',totalSumaItem='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__financiera__modificaciones__destino($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) - floatval($array[0]);
		$febreroResul=floatval($febreroBase) - floatval($array[1]);
		$marzoResul=floatval($marzoBase) - floatval($array[2]);
		$abrilResul=floatval($abrilBase) - floatval($array[3]);
		$mayoResul=floatval($mayoBase) - floatval($array[4]);
		$junioResul=floatval($junioBase) - floatval($array[5]);
		$julioResul=floatval($julioBase) - floatval($array[6]);
		$agostoResul=floatval($agostoBase) - floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) - floatval($array[8]);
		$octubreResul=floatval($octubreBase) - floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) - floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) - floatval($array[11]);

		$eneroResul=abs($eneroResul);
		$febreroResul=abs($febreroResul);
		$marzoResul=abs($marzoResul);
		$abrilResul=abs($abrilResul);
		$mayoResul=abs($mayoResul);
		$junioResul=abs($junioResul);
		$julioResul=abs($julioResul);
		$agostoResul=abs($agostoResul);
		$septiembreResul=abs($septiembreResul);
		$octubreResul=abs($octubreResul);
		$noviembreResul=abs($noviembreResul);
		$diciembreResul=abs($diciembreResul);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_programacion_financiera SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',totalTotales='$resulResul',totalSumaItem='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	


	public function actualizarProgramacion__matenimiento__modificaciones__origen($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_mantenimiento WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) + floatval($array[0]);
		$febreroResul=floatval($febreroBase) + floatval($array[1]);
		$marzoResul=floatval($marzoBase) + floatval($array[2]);
		$abrilResul=floatval($abrilBase) + floatval($array[3]);
		$mayoResul=floatval($mayoBase) + floatval($array[4]);
		$junioResul=floatval($junioBase) + floatval($array[5]);
		$julioResul=floatval($julioBase) + floatval($array[6]);
		$agostoResul=floatval($agostoBase) + floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) + floatval($array[8]);
		$octubreResul=floatval($octubreBase) + floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) + floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) + floatval($array[11]);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_mantenimiento SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__matenimiento__modificaciones__destino($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_mantenimiento WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) - floatval($array[0]);
		$febreroResul=floatval($febreroBase) - floatval($array[1]);
		$marzoResul=floatval($marzoBase) - floatval($array[2]);
		$abrilResul=floatval($abrilBase) - floatval($array[3]);
		$mayoResul=floatval($mayoBase) - floatval($array[4]);
		$junioResul=floatval($junioBase) - floatval($array[5]);
		$julioResul=floatval($julioBase) - floatval($array[6]);
		$agostoResul=floatval($agostoBase) - floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) - floatval($array[8]);
		$octubreResul=floatval($octubreBase) - floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) - floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) - floatval($array[11]);

		$eneroResul=abs($eneroResul);
		$febreroResul=abs($febreroResul);
		$marzoResul=abs($marzoResul);
		$abrilResul=abs($abrilResul);
		$mayoResul=abs($mayoResul);
		$junioResul=abs($junioResul);
		$julioResul=abs($julioResul);
		$agostoResul=abs($agostoResul);
		$septiembreResul=abs($septiembreResul);
		$octubreResul=abs($octubreResul);
		$noviembreResul=abs($noviembreResul);
		$diciembreResul=abs($diciembreResul);


		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_mantenimiento SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__actividades__deportivas__modificaciones__origen($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_actdeportivas WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) + floatval($array[0]);
		$febreroResul=floatval($febreroBase) + floatval($array[1]);
		$marzoResul=floatval($marzoBase) + floatval($array[2]);
		$abrilResul=floatval($abrilBase) + floatval($array[3]);
		$mayoResul=floatval($mayoBase) + floatval($array[4]);
		$junioResul=floatval($junioBase) + floatval($array[5]);
		$julioResul=floatval($julioBase) + floatval($array[6]);
		$agostoResul=floatval($agostoBase) + floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) + floatval($array[8]);
		$octubreResul=floatval($octubreBase) + floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) + floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) + floatval($array[11]);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_actdeportivas SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	


	public function actualizarProgramacion__actividades__deportivas__modificaciones__destino($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_actdeportivas WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) - floatval($array[0]);
		$febreroResul=floatval($febreroBase) - floatval($array[1]);
		$marzoResul=floatval($marzoBase) - floatval($array[2]);
		$abrilResul=floatval($abrilBase) - floatval($array[3]);
		$mayoResul=floatval($mayoBase) - floatval($array[4]);
		$junioResul=floatval($junioBase) - floatval($array[5]);
		$julioResul=floatval($julioBase) - floatval($array[6]);
		$agostoResul=floatval($agostoBase) - floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) - floatval($array[8]);
		$octubreResul=floatval($octubreBase) - floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) - floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) - floatval($array[11]);

		$eneroResul=abs($eneroResul);
		$febreroResul=abs($febreroResul);
		$marzoResul=abs($marzoResul);
		$abrilResul=abs($abrilResul);
		$mayoResul=abs($mayoResul);
		$junioResul=abs($junioResul);
		$julioResul=abs($julioResul);
		$agostoResul=abs($agostoResul);
		$septiembreResul=abs($septiembreResul);
		$octubreResul=abs($octubreResul);
		$noviembreResul=abs($noviembreResul);
		$diciembreResul=abs($diciembreResul);


		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_actdeportivas SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__actividades__deportivas__honorarios__origen($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_honorarios2022 WHERE idHonorarios='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) + floatval($array[0]);
		$febreroResul=floatval($febreroBase) + floatval($array[1]);
		$marzoResul=floatval($marzoBase) + floatval($array[2]);
		$abrilResul=floatval($abrilBase) + floatval($array[3]);
		$mayoResul=floatval($mayoBase) + floatval($array[4]);
		$junioResul=floatval($junioBase) + floatval($array[5]);
		$julioResul=floatval($julioBase) + floatval($array[6]);
		$agostoResul=floatval($agostoBase) + floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) + floatval($array[8]);
		$octubreResul=floatval($octubreBase) + floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) + floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) + floatval($array[11]);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_honorarios2022 SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idHonorarios='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__actividades__deportivas__honorarios__destino($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_honorarios2022 WHERE idHonorarios='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) - floatval($array[0]);
		$febreroResul=floatval($febreroBase) - floatval($array[1]);
		$marzoResul=floatval($marzoBase) - floatval($array[2]);
		$abrilResul=floatval($abrilBase) - floatval($array[3]);
		$mayoResul=floatval($mayoBase) - floatval($array[4]);
		$junioResul=floatval($junioBase) - floatval($array[5]);
		$julioResul=floatval($julioBase) - floatval($array[6]);
		$agostoResul=floatval($agostoBase) - floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) - floatval($array[8]);
		$octubreResul=floatval($octubreBase) - floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) - floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) - floatval($array[11]);

		$eneroResul=abs($eneroResul);
		$febreroResul=abs($febreroResul);
		$marzoResul=abs($marzoResul);
		$abrilResul=abs($abrilResul);
		$mayoResul=abs($mayoResul);
		$junioResul=abs($junioResul);
		$julioResul=abs($julioResul);
		$agostoResul=abs($agostoResul);
		$septiembreResul=abs($septiembreResul);
		$octubreResul=abs($octubreResul);
		$noviembreResul=abs($noviembreResul);
		$diciembreResul=abs($diciembreResul);


		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_honorarios2022 SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idHonorarios='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__actividades__deportivas__sueldos__origen($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) + floatval($array[0]);
		$febreroResul=floatval($febreroBase) + floatval($array[1]);
		$marzoResul=floatval($marzoBase) + floatval($array[2]);
		$abrilResul=floatval($abrilBase) + floatval($array[3]);
		$mayoResul=floatval($mayoBase) + floatval($array[4]);
		$junioResul=floatval($junioBase) + floatval($array[5]);
		$julioResul=floatval($julioBase) + floatval($array[6]);
		$agostoResul=floatval($agostoBase) + floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) + floatval($array[8]);
		$octubreResul=floatval($octubreBase) + floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) + floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) + floatval($array[11]);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_sueldossalarios2022 SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idSueldos='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	

	public function actualizarProgramacion__actividades__deportivas__sueldos__destino($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$data1=array();

 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) - floatval($array[0]);
		$febreroResul=floatval($febreroBase) - floatval($array[1]);
		$marzoResul=floatval($marzoBase) - floatval($array[2]);
		$abrilResul=floatval($abrilBase) - floatval($array[3]);
		$mayoResul=floatval($mayoBase) - floatval($array[4]);
		$junioResul=floatval($junioBase) - floatval($array[5]);
		$julioResul=floatval($julioBase) - floatval($array[6]);
		$agostoResul=floatval($agostoBase) - floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) - floatval($array[8]);
		$octubreResul=floatval($octubreBase) - floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) - floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) - floatval($array[11]);

		$eneroResul=abs($eneroResul);
		$febreroResul=abs($febreroResul);
		$marzoResul=abs($marzoResul);
		$abrilResul=abs($abrilResul);
		$mayoResul=abs($mayoResul);
		$junioResul=abs($junioResul);
		$julioResul=abs($julioResul);
		$agostoResul=abs($agostoResul);
		$septiembreResul=abs($septiembreResul);
		$octubreResul=abs($octubreResul);
		$noviembreResul=abs($noviembreResul);
		$diciembreResul=abs($diciembreResul);


		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_sueldossalarios2022 SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',total='$resulResul' WHERE idSueldos='$idFinanciero';";

		$resultadoActualizas= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualizas;

	}	


	public function actualizar__desvinculaciones__origen($idSueldos,$desaucioArray,$despidoArray,$renunciaArray,$vacacionesArray,$obtenMaximo__origen){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		date_default_timezone_set("America/Guayaquil");

		$fecha_actual = date('Y-m-d');
		$hora_actual= date('H:i:s');	

		/*================================
		=            Desaucio            =
		================================*/
		
 		$query__desaucio = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='desahucio' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__desaucio->execute();

		$resultado__desaucio = $query__desaucio->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__desaucio as $valor__desaucio) {
			
			$eneroBase__desaucio=$valor__desaucio["enero"];
			$febreroBase__desaucio=$valor__desaucio["febrero"];
			$marzoBase__desaucio=$valor__desaucio["marzo"];
			$abrilBase__desaucio=$valor__desaucio["abril"];
			$mayoBase__desaucio=$valor__desaucio["mayo"];
			$junioBase__desaucio=$valor__desaucio["junio"];
			$julioBase__desaucio=$valor__desaucio["julio"];
			$agostoBase__desaucio=$valor__desaucio["agosto"];
			$septiembreBase__desaucio=$valor__desaucio["septiembre"];
			$octubreBase__desaucio=$valor__desaucio["octubre"];
			$noviembreBase__desaucio=$valor__desaucio["noviembre"];
			$diciembreBase__desaucio=$valor__desaucio["diciembre"];

		}	

		if (empty($eneroBase__desaucio)) {

			$queryDesvinculacion__desaucio="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__desaucio= $conexionEstablecida->exec($queryDesvinculacion__desaucio);			
			
 
	 		$query__desaucio = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='desahucio' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__desaucio->execute();

			$resultado__desaucio = $query__desaucio->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__desaucio as $valor__desaucio) {
				
				$eneroBase__desaucio=$valor__desaucio["enero"];
				$febreroBase__desaucio=$valor__desaucio["febrero"];
				$marzoBase__desaucio=$valor__desaucio["marzo"];
				$abrilBase__desaucio=$valor__desaucio["abril"];
				$mayoBase__desaucio=$valor__desaucio["mayo"];
				$junioBase__desaucio=$valor__desaucio["junio"];
				$julioBase__desaucio=$valor__desaucio["julio"];
				$agostoBase__desaucio=$valor__desaucio["agosto"];
				$septiembreBase__desaucio=$valor__desaucio["septiembre"];
				$octubreBase__desaucio=$valor__desaucio["octubre"];
				$noviembreBase__desaucio=$valor__desaucio["noviembre"];
				$diciembreBase__desaucio=$valor__desaucio["diciembre"];

			}	


		}	

		$queryBonificacionInsertas="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $desaucioArray[0], $desaucioArray[1], $desaucioArray[2], $desaucioArray[3], $desaucioArray[4], $desaucioArray[5], $desaucioArray[6], $desaucioArray[7], $desaucioArray[8], $desaucioArray[9], $desaucioArray[10], $desaucioArray[11],$obtenMaximo__origen , 'desahucio', 'origen');";
		$resultadoBonificacionInsertas= $conexionEstablecida->exec($queryBonificacionInsertas);		
		
		
		$resultado__v__desaucio__enero=floatval($eneroBase__desaucio) - floatval($desaucioArray[0]);
		$resultado__v__desaucio__febrero=floatval($febreroBase__desaucio) - floatval($desaucioArray[1]);
		$resultado__v__desaucio__marzo=floatval($marzoBase__desaucio) - floatval($desaucioArray[2]);
		$resultado__v__desaucio__abril=floatval($abrilBase__desaucio) - floatval($desaucioArray[3]);
		$resultado__v__desaucio__mayo=floatval($mayoBase__desaucio) - floatval($desaucioArray[4]);
		$resultado__v__desaucio__junio=floatval($junioBase__desaucio) - floatval($desaucioArray[5]);
		$resultado__v__desaucio__julio=floatval($julioBase__desaucio) - floatval($desaucioArray[6]);
		$resultado__v__desaucio__agosto=floatval($agostoBase__desaucio) - floatval($desaucioArray[7]);
		$resultado__v__desaucio__septiembre=floatval($septiembreBase__desaucio) - floatval($desaucioArray[8]);
		$resultado__v__desaucio__octubre=floatval($octubreBase__desaucio) - floatval($desaucioArray[9]);
		$resultado__v__desaucio__noviembre=floatval($noviembreBase__desaucio) - floatval($desaucioArray[10]);
		$resultado__v__desaucio__diciembre=floatval($diciembreBase__desaucio) - floatval($desaucioArray[11]);

		$queryDesvinculacionUpdate="UPDATE poa_desvinculacion SET enero='$resultado__v__desaucio__enero', febreo='$resultado__v__desaucio__febrero', marzo='$resultado__v__desaucio__marzo', abril='$resultado__v__desaucio__abril', mayo='$resultado__v__desaucio__mayo', junio='$resultado__v__desaucio__junio', julio='$resultado__v__desaucio__julio', agosto='$resultado__v__desaucio__agosto', septiembre='$resultado__v__desaucio__septiembre', octubre='$resultado__v__desaucio__octubre', noviembre='$resultado__v__desaucio__noviembre', diciembre='$resultado__v__desaucio__diciembre' WHERE idSueldos='$idSueldos' AND opcion='desahucio';";
		$resultadoDesvinculacionUpdate= $conexionEstablecida->exec($queryDesvinculacionUpdate);	


 		
 		$query__desaucio__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='49' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__desaucio__financiero->execute();

		$resultado__desaucio__financiero = $query__desaucio__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__desaucio__financiero as $resultado__desaucio__financiero) {
			
			$eneroBase__desaucio__financiero=$resultado__desaucio__financiero["enero"];
			$febreroBase__desaucio__financiero=$resultado__desaucio__financiero["febrero"];
			$marzoBase__desaucio__financiero=$resultado__desaucio__financiero["marzo"];
			$abrilBase__desaucio__financiero=$resultado__desaucio__financiero["abril"];
			$mayoBase__desaucio__financiero=$resultado__desaucio__financiero["mayo"];
			$junioBase__desaucio__financiero=$resultado__desaucio__financiero["junio"];
			$julioBase__desaucio__financiero=$resultado__desaucio__financiero["julio"];
			$agostoBase__desaucio__financiero=$resultado__desaucio__financiero["agosto"];
			$septiembreBase__desaucio__financiero=$resultado__desaucio__financiero["septiembre"];
			$octubreBase__desaucio__financiero=$resultado__desaucio__financiero["octubre"];
			$noviembreBase__desaucio__financiero=$resultado__desaucio__financiero["noviembre"];
			$diciembreBase__desaucio__financiero=$resultado__desaucio__financiero["diciembre"];

		}	

		if (empty($eneroBase__desaucio__financiero)) {

			$queryDesvinculacion__desaucio__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 49, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__desaucio__financiero= $conexionEstablecida->exec($queryDesvinculacion__desaucio__financiero);			
				
	 		$query__desaucio__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='49' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__desaucio__financiero->execute();

			$resultado__desaucio__financiero = $query__desaucio__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__desaucio__financiero as $resultado__desaucio__financiero) {
				
				$idProbramacionFinancieraBase__desaucio__financiero=$resultado__desaucio__financiero["enero"];
				$eneroBase__desaucio__financiero=$resultado__desaucio__financiero["enero"];
				$febreroBase__desaucio__financiero=$resultado__desaucio__financiero["febrero"];
				$marzoBase__desaucio__financiero=$resultado__desaucio__financiero["marzo"];
				$abrilBase__desaucio__financiero=$resultado__desaucio__financiero["abril"];
				$mayoBase__desaucio__financiero=$resultado__desaucio__financiero["mayo"];
				$junioBase__desaucio__financiero=$resultado__desaucio__financiero["junio"];
				$julioBase__desaucio__financiero=$resultado__desaucio__financiero["julio"];
				$agostoBase__desaucio__financiero=$resultado__desaucio__financiero["agosto"];
				$septiembreBase__desaucio__financiero=$resultado__desaucio__financiero["septiembre"];
				$octubreBase__desaucio__financiero=$resultado__desaucio__financiero["octubre"];
				$noviembreBase__desaucio__financiero=$resultado__desaucio__financiero["noviembre"];
				$diciembreBase__desaucio__financiero=$resultado__desaucio__financiero["diciembre"];

			}	

			
		}


		$resultado__v__desaucio__enero__financiero=floatval($eneroBase__desaucio__financiero) - floatval($desaucioArray[0]);
		$resultado__v__desaucio__febrero__financiero=floatval($febreroBase__desaucio__financiero) - floatval($desaucioArray[1]);
		$resultado__v__desaucio__marzo__financiero=floatval($marzoBase__desaucio__financiero) - floatval($desaucioArray[2]);
		$resultado__v__desaucio__abril__financiero=floatval($abrilBase__desaucio__financiero) - floatval($desaucioArray[3]);
		$resultado__v__desaucio__mayo__financiero=floatval($mayoBase__desaucio__financiero) - floatval($desaucioArray[4]);
		$resultado__v__desaucio__junio__financiero=floatval($junioBase__desaucio__financiero) - floatval($desaucioArray[5]);
		$resultado__v__desaucio__julio__financiero=floatval($julioBase__desaucio__financiero) - floatval($desaucioArray[6]);
		$resultado__v__desaucio__agosto__financiero=floatval($agostoBase__desaucio__financiero) - floatval($desaucioArray[7]);
		$resultado__v__desaucio__septiembre__financiero=floatval($septiembreBase__desaucio__financiero) - floatval($desaucioArray[8]);
		$resultado__v__desaucio__octubre__financiero=floatval($octubreBase__desaucio__financiero) - floatval($desaucioArray[9]);
		$resultado__v__desaucio__noviembre__financiero=floatval($noviembreBase__desaucio__financiero) - floatval($desaucioArray[10]);
		$resultado__v__desaucio__diciembre__financiero=floatval($diciembreBase__desaucio__financiero) - floatval($desaucioArray[11]);

		$queryDesvinculacionUpdate__financiero="UPDATE poa_programacion_financiera SET enero='$resultado__v__desaucio__enero__financiero', febrero='$resultado__v__desaucio__febrero__financiero', marzo='$resultado__v__desaucio__marzo__financiero', abril='$resultado__v__desaucio__abril__financiero', mayo='$resultado__v__desaucio__mayo__financiero', junio='$resultado__v__desaucio__junio__financiero', julio='$resultado__v__desaucio__julio__financiero', agosto='$resultado__v__desaucio__agosto__financiero', septiembre='$resultado__v__desaucio__septiembre__financiero', octubre='$resultado__v__desaucio__octubre__financiero', noviembre='$resultado__v__desaucio__noviembre__financiero', diciembre='$resultado__v__desaucio__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__desaucio__financiero';";
		$resultadoDesvinculacionUpdate__financiero= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero);	

		/*=====  End of Desaucio  ======*/

		/*===============================
		=            Despido            =
		===============================*/
		
		$query__despido = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='despido' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__despido->execute();

		$resultado__despido = $query__despido->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__despido as $valor__despido) {
			
			$eneroBase__despido=$valor__despido["enero"];
			$febreroBase__despido=$valor__despido["febrero"];
			$marzoBase__despido=$valor__despido["marzo"];
			$abrilBase__despido=$valor__despido["abril"];
			$mayoBase__despido=$valor__despido["mayo"];
			$junioBase__despido=$valor__despido["junio"];
			$julioBase__despido=$valor__despido["julio"];
			$agostoBase__despido=$valor__despido["agosto"];
			$septiembreBase__despido=$valor__despido["septiembre"];
			$octubreBase__despido=$valor__despido["octubre"];
			$noviembreBase__despido=$valor__despido["noviembre"];
			$diciembreBase__despido=$valor__despido["diciembre"];

		}	

		if (empty($eneroBase__despido)) {

			$queryDesvinculacion__despido="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__despido= $conexionEstablecida->exec($queryDesvinculacion__despido);			
			
 
	 		$query__despido = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='despido' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__despido->execute();

			$resultado__despido = $query__despido->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__despido as $valor__despido) {
				
				$eneroBase__despido=$valor__despido["enero"];
				$febreroBase__despido=$valor__despido["febrero"];
				$marzoBase__despido=$valor__despido["marzo"];
				$abrilBase__despido=$valor__despido["abril"];
				$mayoBase__despido=$valor__despido["mayo"];
				$junioBase__despido=$valor__despido["junio"];
				$julioBase__despido=$valor__despido["julio"];
				$agostoBase__despido=$valor__despido["agosto"];
				$septiembreBase__despido=$valor__despido["septiembre"];
				$octubreBase__despido=$valor__despido["octubre"];
				$noviembreBase__despido=$valor__despido["noviembre"];
				$diciembreBase__despido=$valor__despido["diciembre"];

			}	


		}	

		$queryBonificacionInsertas__despido="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $despidoArray[0], $despidoArray[1], $despidoArray[2], $despidoArray[3], $despidoArray[4], $despidoArray[5], $despidoArray[6], $despidoArray[7], $despidoArray[8], $despidoArray[9], $despidoArray[10], $despidoArray[11],$obtenMaximo__origen , 'despido', 'origen');";
		$resultadoBonificacionInsertas__despido= $conexionEstablecida->exec($queryBonificacionInsertas__despido);		
		
		
		$resultado__v__despido__enero=floatval($eneroBase__despido) - floatval($despidoArray[0]);
		$resultado__v__despido__febrero=floatval($febreroBase__despido) - floatval($despidoArray[1]);
		$resultado__v__despido__marzo=floatval($marzoBase__despido) - floatval($despidoArray[2]);
		$resultado__v__despido__abril=floatval($abrilBase__despido) - floatval($despidoArray[3]);
		$resultado__v__despido__mayo=floatval($mayoBase__despido) - floatval($despidoArray[4]);
		$resultado__v__despido__junio=floatval($junioBase__despido) - floatval($despidoArray[5]);
		$resultado__v__despido__julio=floatval($julioBase__despido) - floatval($despidoArray[6]);
		$resultado__v__despido__agosto=floatval($agostoBase__despido) - floatval($despidoArray[7]);
		$resultado__v__despido__septiembre=floatval($septiembreBase__despido) - floatval($despidoArray[8]);
		$resultado__v__despido__octubre=floatval($octubreBase__despido) - floatval($despidoArray[9]);
		$resultado__v__despido__noviembre=floatval($noviembreBase__despido) - floatval($despidoArray[10]);
		$resultado__v__despido__diciembre=floatval($diciembreBase__despido) - floatval($despidoArray[11]);

		$queryDesvinculacionUpdate__despido="UPDATE poa_desvinculacion SET enero='$resultado__v__despido__enero', febreo='$resultado__v__despido__febrero', marzo='$resultado__v__despido__marzo', abril='$resultado__v__despido__abril', mayo='$resultado__v__despido__mayo', junio='$resultado__v__despido__junio', julio='$resultado__v__despido__julio', agosto='$resultado__v__despido__agosto', septiembre='$resultado__v__despido__septiembre', octubre='$resultado__v__despido__octubre', noviembre='$resultado__v__despido__noviembre', diciembre='$resultado__v__despido__diciembre' WHERE idSueldos='$idSueldos' AND opcion='despido';";
		$resultadoDesvinculacionUpdate__despido= $conexionEstablecida->exec($queryDesvinculacionUpdate__despido);	


 		
 		$query__despido__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='156' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__despido__financiero->execute();

		$resultado__despido__financiero = $query__despido__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__despido__financiero as $resultado__despido__financiero) {
			
			$idProbramacionFinancieraBase__despido__financiero__despido=$resultado__despido__financiero["enero"];
			$eneroBase__despido__financiero=$resultado__despido__financiero["enero"];
			$febreroBase__despido__financiero=$resultado__despido__financiero["febrero"];
			$marzoBase__despido__financiero=$resultado__despido__financiero["marzo"];
			$abrilBase__despido__financiero=$resultado__despido__financiero["abril"];
			$mayoBase__despido__financiero=$resultado__despido__financiero["mayo"];
			$junioBase__despido__financiero=$resultado__despido__financiero["junio"];
			$julioBase__despido__financiero=$resultado__despido__financiero["julio"];
			$agostoBase__despido__financiero=$resultado__despido__financiero["agosto"];
			$septiembreBase__despido__financiero=$resultado__despido__financiero["septiembre"];
			$octubreBase__despido__financiero=$resultado__despido__financiero["octubre"];
			$noviembreBase__despido__financiero=$resultado__despido__financiero["noviembre"];
			$diciembreBase__despido__financiero=$resultado__despido__financiero["diciembre"];

		}	

		if (empty($eneroBase__despido__financiero)) {

			$queryDesvinculacion__despido__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 156, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__despido__financiero= $conexionEstablecida->exec($queryDesvinculacion__despido__financiero);			
				
	 		$query__despido__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='156' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__despido__financiero->execute();

			$resultado__despido__financiero = $query__despido__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__despido__financiero as $resultado__despido__financiero) {
				
				$idProbramacionFinancieraBase__despido__financiero__despido=$resultado__despido__financiero["enero"];
				$eneroBase__despido__financiero=$resultado__despido__financiero["enero"];
				$febreroBase__despido__financiero=$resultado__despido__financiero["febrero"];
				$marzoBase__despido__financiero=$resultado__despido__financiero["marzo"];
				$abrilBase__despido__financiero=$resultado__despido__financiero["abril"];
				$mayoBase__despido__financiero=$resultado__despido__financiero["mayo"];
				$junioBase__despido__financiero=$resultado__despido__financiero["junio"];
				$julioBase__despido__financiero=$resultado__despido__financiero["julio"];
				$agostoBase__despido__financiero=$resultado__despido__financiero["agosto"];
				$septiembreBase__despido__financiero=$resultado__despido__financiero["septiembre"];
				$octubreBase__despido__financiero=$resultado__despido__financiero["octubre"];
				$noviembreBase__despido__financiero=$resultado__despido__financiero["noviembre"];
				$diciembreBase__despido__financiero=$resultado__despido__financiero["diciembre"];

			}	

			
		}


		$resultado__v__despido__enero__financiero=floatval($eneroBase__despido__financiero) - floatval($despidoArray[0]);
		$resultado__v__despido__febrero__financiero=floatval($febreroBase__despido__financiero) - floatval($despidoArray[1]);
		$resultado__v__despido__marzo__financiero=floatval($marzoBase__despido__financiero) - floatval($despidoArray[2]);
		$resultado__v__despido__abril__financiero=floatval($abrilBase__despido__financiero) - floatval($despidoArray[3]);
		$resultado__v__despido__mayo__financiero=floatval($mayoBase__despido__financiero) - floatval($despidoArray[4]);
		$resultado__v__despido__junio__financiero=floatval($junioBase__despido__financiero) - floatval($despidoArray[5]);
		$resultado__v__despido__julio__financiero=floatval($julioBase__despido__financiero) - floatval($despidoArray[6]);
		$resultado__v__despido__agosto__financiero=floatval($agostoBase__despido__financiero) - floatval($despidoArray[7]);
		$resultado__v__despido__septiembre__financiero=floatval($septiembreBase__despido__financiero) - floatval($despidoArray[8]);
		$resultado__v__despido__octubre__financiero=floatval($octubreBase__despido__financiero) - floatval($despidoArray[9]);
		$resultado__v__despido__noviembre__financiero=floatval($noviembreBase__despido__financiero) - floatval($despidoArray[10]);
		$resultado__v__despido__diciembre__financiero=floatval($diciembreBase__despido__financiero) - floatval($despidoArray[11]);

		$queryDesvinculacionUpdate__financiero__despido="UPDATE poa_programacion_financiera SET enero='$resultado__v__despido__enero__financiero', febrero='$resultado__v__despido__febrero__financiero', marzo='$resultado__v__despido__marzo__financiero', abril='$resultado__v__despido__abril__financiero', mayo='$resultado__v__despido__mayo__financiero', junio='$resultado__v__despido__junio__financiero', julio='$resultado__v__despido__julio__financiero', agosto='$resultado__v__despido__agosto__financiero', septiembre='$resultado__v__despido__septiembre__financiero', octubre='$resultado__v__despido__octubre__financiero', noviembre='$resultado__v__despido__noviembre__financiero', diciembre='$resultado__v__despido__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__despido__financiero__despido';";
		$resultadoDesvinculacionUpdate__financiero__despido= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero__despido);			
		
		/*=====  End of Despido  ======*/
		
		/*================================
		=            Renuncia            =
		================================*/
		
		$query__renuncia = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='renuncia' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__renuncia->execute();

		$resultado__renuncia = $query__renuncia->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__renuncia as $valor__renuncia) {
			
			$eneroBase__renuncia=$valor__renuncia["enero"];
			$febreroBase__renuncia=$valor__renuncia["febrero"];
			$marzoBase__renuncia=$valor__renuncia["marzo"];
			$abrilBase__renuncia=$valor__renuncia["abril"];
			$mayoBase__renuncia=$valor__renuncia["mayo"];
			$junioBase__renuncia=$valor__renuncia["junio"];
			$julioBase__renuncia=$valor__renuncia["julio"];
			$agostoBase__renuncia=$valor__renuncia["agosto"];
			$septiembreBase__renuncia=$valor__renuncia["septiembre"];
			$octubreBase__renuncia=$valor__renuncia["octubre"];
			$noviembreBase__renuncia=$valor__renuncia["noviembre"];
			$diciembreBase__renuncia=$valor__renuncia["diciembre"];

		}	

		if (empty($eneroBase__renuncia)) {

			$queryDesvinculacion__renuncia="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__renuncia= $conexionEstablecida->exec($queryDesvinculacion__renuncia);			
			
 
	 		$query__renuncia = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='renuncia' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__renuncia->execute();

			$resultado__renuncia = $query__renuncia->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__renuncia as $valor__renuncia) {
				
				$eneroBase__renuncia=$valor__renuncia["enero"];
				$febreroBase__renuncia=$valor__renuncia["febrero"];
				$marzoBase__renuncia=$valor__renuncia["marzo"];
				$abrilBase__renuncia=$valor__renuncia["abril"];
				$mayoBase__renuncia=$valor__renuncia["mayo"];
				$junioBase__renuncia=$valor__renuncia["junio"];
				$julioBase__renuncia=$valor__renuncia["julio"];
				$agostoBase__renuncia=$valor__renuncia["agosto"];
				$septiembreBase__renuncia=$valor__renuncia["septiembre"];
				$octubreBase__renuncia=$valor__renuncia["octubre"];
				$noviembreBase__renuncia=$valor__renuncia["noviembre"];
				$diciembreBase__renuncia=$valor__renuncia["diciembre"];

			}	


		}	

		$queryBonificacionInsertas__renuncia="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $renunciaArray[0], $renunciaArray[1], $renunciaArray[2], $renunciaArray[3], $renunciaArray[4], $renunciaArray[5], $renunciaArray[6], $renunciaArray[7], $renunciaArray[8], $renunciaArray[9], $renunciaArray[10], $renunciaArray[11],$obtenMaximo__origen , 'renuncia', 'origen');";
		$resultadoBonificacionInsertas__renuncia= $conexionEstablecida->exec($queryBonificacionInsertas__renuncia);		
		
		
		$resultado__v__renuncia__enero=floatval($eneroBase__renuncia) - floatval($renunciaArray[0]);
		$resultado__v__renuncia__febrero=floatval($febreroBase__renuncia) - floatval($renunciaArray[1]);
		$resultado__v__renuncia__marzo=floatval($marzoBase__renuncia) - floatval($renunciaArray[2]);
		$resultado__v__renuncia__abril=floatval($abrilBase__renuncia) - floatval($renunciaArray[3]);
		$resultado__v__renuncia__mayo=floatval($mayoBase__renuncia) - floatval($renunciaArray[4]);
		$resultado__v__renuncia__junio=floatval($junioBase__renuncia) - floatval($renunciaArray[5]);
		$resultado__v__renuncia__julio=floatval($julioBase__renuncia) - floatval($renunciaArray[6]);
		$resultado__v__renuncia__agosto=floatval($agostoBase__renuncia) - floatval($renunciaArray[7]);
		$resultado__v__renuncia__septiembre=floatval($septiembreBase__renuncia) - floatval($renunciaArray[8]);
		$resultado__v__renuncia__octubre=floatval($octubreBase__renuncia) - floatval($renunciaArray[9]);
		$resultado__v__renuncia__noviembre=floatval($noviembreBase__renuncia) - floatval($renunciaArray[10]);
		$resultado__v__renuncia__diciembre=floatval($diciembreBase__renuncia) - floatval($renunciaArray[11]);

		$queryDesvinculacionUpdate__renuncia="UPDATE poa_desvinculacion SET enero='$resultado__v__renuncia__enero', febreo='$resultado__v__renuncia__febrero', marzo='$resultado__v__renuncia__marzo', abril='$resultado__v__renuncia__abril', mayo='$resultado__v__renuncia__mayo', junio='$resultado__v__renuncia__junio', julio='$resultado__v__renuncia__julio', agosto='$resultado__v__renuncia__agosto', septiembre='$resultado__v__renuncia__septiembre', octubre='$resultado__v__renuncia__octubre', noviembre='$resultado__v__renuncia__noviembre', diciembre='$resultado__v__renuncia__diciembre' WHERE idSueldos='$idSueldos' AND opcion='renuncia';";
		$resultadoDesvinculacionUpdate__renuncia= $conexionEstablecida->exec($queryDesvinculacionUpdate__renuncia);	


 		
 		$query__renuncia__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='94' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__renuncia__financiero->execute();

		$resultado__renuncia__financiero = $query__renuncia__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__renuncia__financiero as $resultado__renuncia__financiero) {
			
			$idProbramacionFinancieraBase__renuncia__financiero__renuncia=$resultado__renuncia__financiero["enero"];
			$eneroBase__renuncia__financiero=$resultado__renuncia__financiero["enero"];
			$febreroBase__renuncia__financiero=$resultado__renuncia__financiero["febrero"];
			$marzoBase__renuncia__financiero=$resultado__renuncia__financiero["marzo"];
			$abrilBase__renuncia__financiero=$resultado__renuncia__financiero["abril"];
			$mayoBase__renuncia__financiero=$resultado__renuncia__financiero["mayo"];
			$junioBase__renuncia__financiero=$resultado__renuncia__financiero["junio"];
			$julioBase__renuncia__financiero=$resultado__renuncia__financiero["julio"];
			$agostoBase__renuncia__financiero=$resultado__renuncia__financiero["agosto"];
			$septiembreBase__renuncia__financiero=$resultado__renuncia__financiero["septiembre"];
			$octubreBase__renuncia__financiero=$resultado__renuncia__financiero["octubre"];
			$noviembreBase__renuncia__financiero=$resultado__renuncia__financiero["noviembre"];
			$diciembreBase__renuncia__financiero=$resultado__renuncia__financiero["diciembre"];

		}	

		if (empty($eneroBase__renuncia__financiero)) {

			$queryDesvinculacion__renuncia__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 94, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__renuncia__financiero= $conexionEstablecida->exec($queryDesvinculacion__renuncia__financiero);			
				
	 		$query__renuncia__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='94' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__renuncia__financiero->execute();

			$resultado__renuncia__financiero = $query__renuncia__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__renuncia__financiero as $resultado__renuncia__financiero) {
				
				$idProbramacionFinancieraBase__renuncia__financiero__renuncia=$resultado__renuncia__financiero["enero"];
				$eneroBase__renuncia__financiero=$resultado__renuncia__financiero["enero"];
				$febreroBase__renuncia__financiero=$resultado__renuncia__financiero["febrero"];
				$marzoBase__renuncia__financiero=$resultado__renuncia__financiero["marzo"];
				$abrilBase__renuncia__financiero=$resultado__renuncia__financiero["abril"];
				$mayoBase__renuncia__financiero=$resultado__renuncia__financiero["mayo"];
				$junioBase__renuncia__financiero=$resultado__renuncia__financiero["junio"];
				$julioBase__renuncia__financiero=$resultado__renuncia__financiero["julio"];
				$agostoBase__renuncia__financiero=$resultado__renuncia__financiero["agosto"];
				$septiembreBase__renuncia__financiero=$resultado__renuncia__financiero["septiembre"];
				$octubreBase__renuncia__financiero=$resultado__renuncia__financiero["octubre"];
				$noviembreBase__renuncia__financiero=$resultado__renuncia__financiero["noviembre"];
				$diciembreBase__renuncia__financiero=$resultado__renuncia__financiero["diciembre"];

			}	

			
		}


		$resultado__v__renuncia__enero__financiero=floatval($eneroBase__renuncia__financiero) - floatval($renunciaArray[0]);
		$resultado__v__renuncia__febrero__financiero=floatval($febreroBase__renuncia__financiero) - floatval($renunciaArray[1]);
		$resultado__v__renuncia__marzo__financiero=floatval($marzoBase__renuncia__financiero) - floatval($renunciaArray[2]);
		$resultado__v__renuncia__abril__financiero=floatval($abrilBase__renuncia__financiero) - floatval($renunciaArray[3]);
		$resultado__v__renuncia__mayo__financiero=floatval($mayoBase__renuncia__financiero) - floatval($renunciaArray[4]);
		$resultado__v__renuncia__junio__financiero=floatval($junioBase__renuncia__financiero) - floatval($renunciaArray[5]);
		$resultado__v__renuncia__julio__financiero=floatval($julioBase__renuncia__financiero) - floatval($renunciaArray[6]);
		$resultado__v__renuncia__agosto__financiero=floatval($agostoBase__renuncia__financiero) - floatval($renunciaArray[7]);
		$resultado__v__renuncia__septiembre__financiero=floatval($septiembreBase__renuncia__financiero) - floatval($renunciaArray[8]);
		$resultado__v__renuncia__octubre__financiero=floatval($octubreBase__renuncia__financiero) - floatval($renunciaArray[9]);
		$resultado__v__renuncia__noviembre__financiero=floatval($noviembreBase__renuncia__financiero) - floatval($renunciaArray[10]);
		$resultado__v__renuncia__diciembre__financiero=floatval($diciembreBase__renuncia__financiero) - floatval($renunciaArray[11]);

		$queryDesvinculacionUpdate__financiero__renuncia="UPDATE poa_programacion_financiera SET enero='$resultado__v__renuncia__enero__financiero', febrero='$resultado__v__renuncia__febrero__financiero', marzo='$resultado__v__renuncia__marzo__financiero', abril='$resultado__v__renuncia__abril__financiero', mayo='$resultado__v__renuncia__mayo__financiero', junio='$resultado__v__renuncia__junio__financiero', julio='$resultado__v__renuncia__julio__financiero', agosto='$resultado__v__renuncia__agosto__financiero', septiembre='$resultado__v__renuncia__septiembre__financiero', octubre='$resultado__v__renuncia__octubre__financiero', noviembre='$resultado__v__renuncia__noviembre__financiero', diciembre='$resultado__v__renuncia__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__renuncia__financiero__renuncia';";
		$resultadoDesvinculacionUpdate__financiero__renuncia= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero__renuncia);	
		
		/*=====  End of Renuncia  ======*/
		
		/*=============================================
		=            Vacaciones no gozadas            =
		=============================================*/
		
		$query__vacaciones = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion LIKE 'compensac%' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__vacaciones->execute();

		$resultado__vacaciones = $query__vacaciones->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__vacaciones as $valor__vacaciones) {
			
			$eneroBase__vacaciones=$valor__vacaciones["enero"];
			$febreroBase__vacaciones=$valor__vacaciones["febrero"];
			$marzoBase__vacaciones=$valor__vacaciones["marzo"];
			$abrilBase__vacaciones=$valor__vacaciones["abril"];
			$mayoBase__vacaciones=$valor__vacaciones["mayo"];
			$junioBase__vacaciones=$valor__vacaciones["junio"];
			$julioBase__vacaciones=$valor__vacaciones["julio"];
			$agostoBase__vacaciones=$valor__vacaciones["agosto"];
			$septiembreBase__vacaciones=$valor__vacaciones["septiembre"];
			$octubreBase__vacaciones=$valor__vacaciones["octubre"];
			$noviembreBase__vacaciones=$valor__vacaciones["noviembre"];
			$diciembreBase__vacaciones=$valor__vacaciones["diciembre"];

		}	

		if (empty($eneroBase__vacaciones)) {

			$queryDesvinculacion__vacaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__vacaciones= $conexionEstablecida->exec($queryDesvinculacion__vacaciones);			
			
 
	 		$query__vacaciones = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion LIKE 'compensac%' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__vacaciones->execute();

			$resultado__vacaciones = $query__vacaciones->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__vacaciones as $valor__vacaciones) {
				
				$eneroBase__vacaciones=$valor__vacaciones["enero"];
				$febreroBase__vacaciones=$valor__vacaciones["febrero"];
				$marzoBase__vacaciones=$valor__vacaciones["marzo"];
				$abrilBase__vacaciones=$valor__vacaciones["abril"];
				$mayoBase__vacaciones=$valor__vacaciones["mayo"];
				$junioBase__vacaciones=$valor__vacaciones["junio"];
				$julioBase__vacaciones=$valor__vacaciones["julio"];
				$agostoBase__vacaciones=$valor__vacaciones["agosto"];
				$septiembreBase__vacaciones=$valor__vacaciones["septiembre"];
				$octubreBase__vacaciones=$valor__vacaciones["octubre"];
				$noviembreBase__vacaciones=$valor__vacaciones["noviembre"];
				$diciembreBase__vacaciones=$valor__vacaciones["diciembre"];

			}	


		}	

		$queryBonificacionInsertas__vacaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $vacacionesArray[0], $vacacionesArray[1], $vacacionesArray[2], $vacacionesArray[3], $vacacionesArray[4], $vacacionesArray[5], $vacacionesArray[6], $vacacionesArray[7], $vacacionesArray[8], $vacacionesArray[9], $vacacionesArray[10], $vacacionesArray[11],$obtenMaximo__origen , 'compensacion', 'origen');";
		$resultadoBonificacionInsertas__vacaciones= $conexionEstablecida->exec($queryBonificacionInsertas__vacaciones);		
		
		
		$resultado__v__vacaciones__enero=floatval($eneroBase__vacaciones) - floatval($vacacionesArray[0]);
		$resultado__v__vacaciones__febrero=floatval($febreroBase__vacaciones) - floatval($vacacionesArray[1]);
		$resultado__v__vacaciones__marzo=floatval($marzoBase__vacaciones) - floatval($vacacionesArray[2]);
		$resultado__v__vacaciones__abril=floatval($abrilBase__vacaciones) - floatval($vacacionesArray[3]);
		$resultado__v__vacaciones__mayo=floatval($mayoBase__vacaciones) - floatval($vacacionesArray[4]);
		$resultado__v__vacaciones__junio=floatval($junioBase__vacaciones) - floatval($vacacionesArray[5]);
		$resultado__v__vacaciones__julio=floatval($julioBase__vacaciones) - floatval($vacacionesArray[6]);
		$resultado__v__vacaciones__agosto=floatval($agostoBase__vacaciones) - floatval($vacacionesArray[7]);
		$resultado__v__vacaciones__septiembre=floatval($septiembreBase__vacaciones) - floatval($vacacionesArray[8]);
		$resultado__v__vacaciones__octubre=floatval($octubreBase__vacaciones) - floatval($vacacionesArray[9]);
		$resultado__v__vacaciones__noviembre=floatval($noviembreBase__vacaciones) - floatval($vacacionesArray[10]);
		$resultado__v__vacaciones__diciembre=floatval($diciembreBase__vacaciones) - floatval($vacacionesArray[11]);

		$queryDesvinculacionUpdate__vacaciones="UPDATE poa_desvinculacion SET enero='$resultado__v__vacaciones__enero', febreo='$resultado__v__vacaciones__febrero', marzo='$resultado__v__vacaciones__marzo', abril='$resultado__v__vacaciones__abril', mayo='$resultado__v__vacaciones__mayo', junio='$resultado__v__vacaciones__junio', julio='$resultado__v__vacaciones__julio', agosto='$resultado__v__vacaciones__agosto', septiembre='$resultado__v__vacaciones__septiembre', octubre='$resultado__v__vacaciones__octubre', noviembre='$resultado__v__vacaciones__noviembre', diciembre='$resultado__v__vacaciones__diciembre' WHERE idSueldos='$idSueldos' AND opcion LIKE 'compensac%';";
		$resultadoDesvinculacionUpdate__vacaciones= $conexionEstablecida->exec($queryDesvinculacionUpdate__vacaciones);	


 		
 		$query__vacaciones__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='50' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__vacaciones__financiero->execute();

		$resultado__vacaciones__financiero = $query__vacaciones__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__vacaciones__financiero as $resultado__vacaciones__financiero) {
			
			$idProbramacionFinancieraBase__vacaciones__financiero__vacaciones=$resultado__vacaciones__financiero["enero"];
			$eneroBase__vacaciones__financiero=$resultado__vacaciones__financiero["enero"];
			$febreroBase__vacaciones__financiero=$resultado__vacaciones__financiero["febrero"];
			$marzoBase__vacaciones__financiero=$resultado__vacaciones__financiero["marzo"];
			$abrilBase__vacaciones__financiero=$resultado__vacaciones__financiero["abril"];
			$mayoBase__vacaciones__financiero=$resultado__vacaciones__financiero["mayo"];
			$junioBase__vacaciones__financiero=$resultado__vacaciones__financiero["junio"];
			$julioBase__vacaciones__financiero=$resultado__vacaciones__financiero["julio"];
			$agostoBase__vacaciones__financiero=$resultado__vacaciones__financiero["agosto"];
			$septiembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["septiembre"];
			$octubreBase__vacaciones__financiero=$resultado__vacaciones__financiero["octubre"];
			$noviembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["noviembre"];
			$diciembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["diciembre"];

		}	

		if (empty($eneroBase__vacaciones__financiero)) {

			$queryDesvinculacion__vacaciones__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 50, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__vacaciones__financiero= $conexionEstablecida->exec($queryDesvinculacion__vacaciones__financiero);			
				
	 		$query__vacaciones__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='50' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__vacaciones__financiero->execute();

			$resultado__vacaciones__financiero = $query__vacaciones__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__vacaciones__financiero as $resultado__vacaciones__financiero) {
				
				$idProbramacionFinancieraBase__vacaciones__financiero__vacaciones=$resultado__vacaciones__financiero["enero"];
				$eneroBase__vacaciones__financiero=$resultado__vacaciones__financiero["enero"];
				$febreroBase__vacaciones__financiero=$resultado__vacaciones__financiero["febrero"];
				$marzoBase__vacaciones__financiero=$resultado__vacaciones__financiero["marzo"];
				$abrilBase__vacaciones__financiero=$resultado__vacaciones__financiero["abril"];
				$mayoBase__vacaciones__financiero=$resultado__vacaciones__financiero["mayo"];
				$junioBase__vacaciones__financiero=$resultado__vacaciones__financiero["junio"];
				$julioBase__vacaciones__financiero=$resultado__vacaciones__financiero["julio"];
				$agostoBase__vacaciones__financiero=$resultado__vacaciones__financiero["agosto"];
				$septiembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["septiembre"];
				$octubreBase__vacaciones__financiero=$resultado__vacaciones__financiero["octubre"];
				$noviembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["noviembre"];
				$diciembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["diciembre"];

			}	

			
		}


		$resultado__v__vacaciones__enero__financiero=floatval($eneroBase__vacaciones__financiero) - floatval($vacacionesArray[0]);
		$resultado__v__vacaciones__febrero__financiero=floatval($febreroBase__vacaciones__financiero) - floatval($vacacionesArray[1]);
		$resultado__v__vacaciones__marzo__financiero=floatval($marzoBase__vacaciones__financiero) - floatval($vacacionesArray[2]);
		$resultado__v__vacaciones__abril__financiero=floatval($abrilBase__vacaciones__financiero) - floatval($vacacionesArray[3]);
		$resultado__v__vacaciones__mayo__financiero=floatval($mayoBase__vacaciones__financiero) - floatval($vacacionesArray[4]);
		$resultado__v__vacaciones__junio__financiero=floatval($junioBase__vacaciones__financiero) - floatval($vacacionesArray[5]);
		$resultado__v__vacaciones__julio__financiero=floatval($julioBase__vacaciones__financiero) - floatval($vacacionesArray[6]);
		$resultado__v__vacaciones__agosto__financiero=floatval($agostoBase__vacaciones__financiero) - floatval($vacacionesArray[7]);
		$resultado__v__vacaciones__septiembre__financiero=floatval($septiembreBase__vacaciones__financiero) - floatval($vacacionesArray[8]);
		$resultado__v__vacaciones__octubre__financiero=floatval($octubreBase__vacaciones__financiero) - floatval($vacacionesArray[9]);
		$resultado__v__vacaciones__noviembre__financiero=floatval($noviembreBase__vacaciones__financiero) - floatval($vacacionesArray[10]);
		$resultado__v__vacaciones__diciembre__financiero=floatval($diciembreBase__vacaciones__financiero) - floatval($vacacionesArray[11]);

		$queryDesvinculacionUpdate__financiero__vacaciones="UPDATE poa_programacion_financiera SET enero='$resultado__v__vacaciones__enero__financiero', febrero='$resultado__v__vacaciones__febrero__financiero', marzo='$resultado__v__vacaciones__marzo__financiero', abril='$resultado__v__vacaciones__abril__financiero', mayo='$resultado__v__vacaciones__mayo__financiero', junio='$resultado__v__vacaciones__junio__financiero', julio='$resultado__v__vacaciones__julio__financiero', agosto='$resultado__v__vacaciones__agosto__financiero', septiembre='$resultado__v__vacaciones__septiembre__financiero', octubre='$resultado__v__vacaciones__octubre__financiero', noviembre='$resultado__v__vacaciones__noviembre__financiero', diciembre='$resultado__v__vacaciones__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__vacaciones__financiero__vacaciones';";
		$resultadoDesvinculacionUpdate__financiero__vacaciones= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero__vacaciones);	
		
		/*=====  End of Vacaciones no gozadas  ======*/
		
		
		return $queryDesvinculacionUpdate;

	}		

	public function actualizar__desvinculaciones__destino($idSueldos,$desaucioArray,$despidoArray,$renunciaArray,$vacacionesArray,$obtenMaximo__origen){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		date_default_timezone_set("America/Guayaquil");

		$fecha_actual = date('Y-m-d');
		$hora_actual= date('H:i:s');	

		/*================================
		=            Desaucio            =
		================================*/
		
 		$query__desaucio = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='desahucio' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__desaucio->execute();

		$resultado__desaucio = $query__desaucio->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__desaucio as $valor__desaucio) {
			
			$eneroBase__desaucio=$valor__desaucio["enero"];
			$febreroBase__desaucio=$valor__desaucio["febrero"];
			$marzoBase__desaucio=$valor__desaucio["marzo"];
			$abrilBase__desaucio=$valor__desaucio["abril"];
			$mayoBase__desaucio=$valor__desaucio["mayo"];
			$junioBase__desaucio=$valor__desaucio["junio"];
			$julioBase__desaucio=$valor__desaucio["julio"];
			$agostoBase__desaucio=$valor__desaucio["agosto"];
			$septiembreBase__desaucio=$valor__desaucio["septiembre"];
			$octubreBase__desaucio=$valor__desaucio["octubre"];
			$noviembreBase__desaucio=$valor__desaucio["noviembre"];
			$diciembreBase__desaucio=$valor__desaucio["diciembre"];

		}	

		if (empty($eneroBase__desaucio)) {

			$queryDesvinculacion__desaucio="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__desaucio= $conexionEstablecida->exec($queryDesvinculacion__desaucio);			
			
 
	 		$query__desaucio = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='desahucio' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__desaucio->execute();

			$resultado__desaucio = $query__desaucio->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__desaucio as $valor__desaucio) {
				
				$eneroBase__desaucio=$valor__desaucio["enero"];
				$febreroBase__desaucio=$valor__desaucio["febrero"];
				$marzoBase__desaucio=$valor__desaucio["marzo"];
				$abrilBase__desaucio=$valor__desaucio["abril"];
				$mayoBase__desaucio=$valor__desaucio["mayo"];
				$junioBase__desaucio=$valor__desaucio["junio"];
				$julioBase__desaucio=$valor__desaucio["julio"];
				$agostoBase__desaucio=$valor__desaucio["agosto"];
				$septiembreBase__desaucio=$valor__desaucio["septiembre"];
				$octubreBase__desaucio=$valor__desaucio["octubre"];
				$noviembreBase__desaucio=$valor__desaucio["noviembre"];
				$diciembreBase__desaucio=$valor__desaucio["diciembre"];

			}	


		}	

		$queryBonificacionInsertas="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $desaucioArray[0], $desaucioArray[1], $desaucioArray[2], $desaucioArray[3], $desaucioArray[4], $desaucioArray[5], $desaucioArray[6], $desaucioArray[7], $desaucioArray[8], $desaucioArray[9], $desaucioArray[10], $desaucioArray[11],$obtenMaximo__origen , 'desahucio', 'destino');";
		$resultadoBonificacionInsertas= $conexionEstablecida->exec($queryBonificacionInsertas);		
		
		
		$resultado__v__desaucio__enero=floatval($eneroBase__desaucio) + floatval($desaucioArray[0]);
		$resultado__v__desaucio__febrero=floatval($febreroBase__desaucio) + floatval($desaucioArray[1]);
		$resultado__v__desaucio__marzo=floatval($marzoBase__desaucio) + floatval($desaucioArray[2]);
		$resultado__v__desaucio__abril=floatval($abrilBase__desaucio) + floatval($desaucioArray[3]);
		$resultado__v__desaucio__mayo=floatval($mayoBase__desaucio) + floatval($desaucioArray[4]);
		$resultado__v__desaucio__junio=floatval($junioBase__desaucio) + floatval($desaucioArray[5]);
		$resultado__v__desaucio__julio=floatval($julioBase__desaucio) + floatval($desaucioArray[6]);
		$resultado__v__desaucio__agosto=floatval($agostoBase__desaucio) + floatval($desaucioArray[7]);
		$resultado__v__desaucio__septiembre=floatval($septiembreBase__desaucio) + floatval($desaucioArray[8]);
		$resultado__v__desaucio__octubre=floatval($octubreBase__desaucio) + floatval($desaucioArray[9]);
		$resultado__v__desaucio__noviembre=floatval($noviembreBase__desaucio) + floatval($desaucioArray[10]);
		$resultado__v__desaucio__diciembre=floatval($diciembreBase__desaucio) + floatval($desaucioArray[11]);

		$queryDesvinculacionUpdate="UPDATE poa_desvinculacion SET enero='$resultado__v__desaucio__enero', febreo='$resultado__v__desaucio__febrero', marzo='$resultado__v__desaucio__marzo', abril='$resultado__v__desaucio__abril', mayo='$resultado__v__desaucio__mayo', junio='$resultado__v__desaucio__junio', julio='$resultado__v__desaucio__julio', agosto='$resultado__v__desaucio__agosto', septiembre='$resultado__v__desaucio__septiembre', octubre='$resultado__v__desaucio__octubre', noviembre='$resultado__v__desaucio__noviembre', diciembre='$resultado__v__desaucio__diciembre' WHERE idSueldos='$idSueldos' AND opcion='desahucio';";
		$resultadoDesvinculacionUpdate= $conexionEstablecida->exec($queryDesvinculacionUpdate);	


 		
 		$query__desaucio__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='49' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__desaucio__financiero->execute();

		$resultado__desaucio__financiero = $query__desaucio__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__desaucio__financiero as $resultado__desaucio__financiero) {
			
			$eneroBase__desaucio__financiero=$resultado__desaucio__financiero["enero"];
			$febreroBase__desaucio__financiero=$resultado__desaucio__financiero["febrero"];
			$marzoBase__desaucio__financiero=$resultado__desaucio__financiero["marzo"];
			$abrilBase__desaucio__financiero=$resultado__desaucio__financiero["abril"];
			$mayoBase__desaucio__financiero=$resultado__desaucio__financiero["mayo"];
			$junioBase__desaucio__financiero=$resultado__desaucio__financiero["junio"];
			$julioBase__desaucio__financiero=$resultado__desaucio__financiero["julio"];
			$agostoBase__desaucio__financiero=$resultado__desaucio__financiero["agosto"];
			$septiembreBase__desaucio__financiero=$resultado__desaucio__financiero["septiembre"];
			$octubreBase__desaucio__financiero=$resultado__desaucio__financiero["octubre"];
			$noviembreBase__desaucio__financiero=$resultado__desaucio__financiero["noviembre"];
			$diciembreBase__desaucio__financiero=$resultado__desaucio__financiero["diciembre"];

		}	

		if (empty($eneroBase__desaucio__financiero)) {

			$queryDesvinculacion__desaucio__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 49, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__desaucio__financiero= $conexionEstablecida->exec($queryDesvinculacion__desaucio__financiero);			
				
	 		$query__desaucio__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='49' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__desaucio__financiero->execute();

			$resultado__desaucio__financiero = $query__desaucio__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__desaucio__financiero as $resultado__desaucio__financiero) {
				
				$idProbramacionFinancieraBase__desaucio__financiero=$resultado__desaucio__financiero["enero"];
				$eneroBase__desaucio__financiero=$resultado__desaucio__financiero["enero"];
				$febreroBase__desaucio__financiero=$resultado__desaucio__financiero["febrero"];
				$marzoBase__desaucio__financiero=$resultado__desaucio__financiero["marzo"];
				$abrilBase__desaucio__financiero=$resultado__desaucio__financiero["abril"];
				$mayoBase__desaucio__financiero=$resultado__desaucio__financiero["mayo"];
				$junioBase__desaucio__financiero=$resultado__desaucio__financiero["junio"];
				$julioBase__desaucio__financiero=$resultado__desaucio__financiero["julio"];
				$agostoBase__desaucio__financiero=$resultado__desaucio__financiero["agosto"];
				$septiembreBase__desaucio__financiero=$resultado__desaucio__financiero["septiembre"];
				$octubreBase__desaucio__financiero=$resultado__desaucio__financiero["octubre"];
				$noviembreBase__desaucio__financiero=$resultado__desaucio__financiero["noviembre"];
				$diciembreBase__desaucio__financiero=$resultado__desaucio__financiero["diciembre"];

			}	

			
		}


		$resultado__v__desaucio__enero__financiero=floatval($eneroBase__desaucio__financiero) + floatval($desaucioArray[0]);
		$resultado__v__desaucio__febrero__financiero=floatval($febreroBase__desaucio__financiero) + floatval($desaucioArray[1]);
		$resultado__v__desaucio__marzo__financiero=floatval($marzoBase__desaucio__financiero) + floatval($desaucioArray[2]);
		$resultado__v__desaucio__abril__financiero=floatval($abrilBase__desaucio__financiero) + floatval($desaucioArray[3]);
		$resultado__v__desaucio__mayo__financiero=floatval($mayoBase__desaucio__financiero) + floatval($desaucioArray[4]);
		$resultado__v__desaucio__junio__financiero=floatval($junioBase__desaucio__financiero) + floatval($desaucioArray[5]);
		$resultado__v__desaucio__julio__financiero=floatval($julioBase__desaucio__financiero) + floatval($desaucioArray[6]);
		$resultado__v__desaucio__agosto__financiero=floatval($agostoBase__desaucio__financiero) + floatval($desaucioArray[7]);
		$resultado__v__desaucio__septiembre__financiero=floatval($septiembreBase__desaucio__financiero) + floatval($desaucioArray[8]);
		$resultado__v__desaucio__octubre__financiero=floatval($octubreBase__desaucio__financiero) + floatval($desaucioArray[9]);
		$resultado__v__desaucio__noviembre__financiero=floatval($noviembreBase__desaucio__financiero) + floatval($desaucioArray[10]);
		$resultado__v__desaucio__diciembre__financiero=floatval($diciembreBase__desaucio__financiero) + floatval($desaucioArray[11]);

		$queryDesvinculacionUpdate__financiero="UPDATE poa_programacion_financiera SET enero='$resultado__v__desaucio__enero__financiero', febrero='$resultado__v__desaucio__febrero__financiero', marzo='$resultado__v__desaucio__marzo__financiero', abril='$resultado__v__desaucio__abril__financiero', mayo='$resultado__v__desaucio__mayo__financiero', junio='$resultado__v__desaucio__junio__financiero', julio='$resultado__v__desaucio__julio__financiero', agosto='$resultado__v__desaucio__agosto__financiero', septiembre='$resultado__v__desaucio__septiembre__financiero', octubre='$resultado__v__desaucio__octubre__financiero', noviembre='$resultado__v__desaucio__noviembre__financiero', diciembre='$resultado__v__desaucio__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__desaucio__financiero';";
		$resultadoDesvinculacionUpdate__financiero= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero);	

		/*=====  End of Desaucio  ======*/

		/*===============================
		=            Despido            =
		===============================*/
		
		$query__despido = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='despido' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__despido->execute();

		$resultado__despido = $query__despido->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__despido as $valor__despido) {
			
			$eneroBase__despido=$valor__despido["enero"];
			$febreroBase__despido=$valor__despido["febrero"];
			$marzoBase__despido=$valor__despido["marzo"];
			$abrilBase__despido=$valor__despido["abril"];
			$mayoBase__despido=$valor__despido["mayo"];
			$junioBase__despido=$valor__despido["junio"];
			$julioBase__despido=$valor__despido["julio"];
			$agostoBase__despido=$valor__despido["agosto"];
			$septiembreBase__despido=$valor__despido["septiembre"];
			$octubreBase__despido=$valor__despido["octubre"];
			$noviembreBase__despido=$valor__despido["noviembre"];
			$diciembreBase__despido=$valor__despido["diciembre"];

		}	

		if (empty($eneroBase__despido)) {

			$queryDesvinculacion__despido="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__despido= $conexionEstablecida->exec($queryDesvinculacion__despido);			
			
 
	 		$query__despido = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='despido' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__despido->execute();

			$resultado__despido = $query__despido->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__despido as $valor__despido) {
				
				$eneroBase__despido=$valor__despido["enero"];
				$febreroBase__despido=$valor__despido["febrero"];
				$marzoBase__despido=$valor__despido["marzo"];
				$abrilBase__despido=$valor__despido["abril"];
				$mayoBase__despido=$valor__despido["mayo"];
				$junioBase__despido=$valor__despido["junio"];
				$julioBase__despido=$valor__despido["julio"];
				$agostoBase__despido=$valor__despido["agosto"];
				$septiembreBase__despido=$valor__despido["septiembre"];
				$octubreBase__despido=$valor__despido["octubre"];
				$noviembreBase__despido=$valor__despido["noviembre"];
				$diciembreBase__despido=$valor__despido["diciembre"];

			}	


		}	

		$queryBonificacionInsertas__despido="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $despidoArray[0], $despidoArray[1], $despidoArray[2], $despidoArray[3], $despidoArray[4], $despidoArray[5], $despidoArray[6], $despidoArray[7], $despidoArray[8], $despidoArray[9], $despidoArray[10], $despidoArray[11],$obtenMaximo__origen , 'despido', 'destino');";
		$resultadoBonificacionInsertas__despido= $conexionEstablecida->exec($queryBonificacionInsertas__despido);		
		
		
		$resultado__v__despido__enero=floatval($eneroBase__despido) + floatval($despidoArray[0]);
		$resultado__v__despido__febrero=floatval($febreroBase__despido) + floatval($despidoArray[1]);
		$resultado__v__despido__marzo=floatval($marzoBase__despido) + floatval($despidoArray[2]);
		$resultado__v__despido__abril=floatval($abrilBase__despido) + floatval($despidoArray[3]);
		$resultado__v__despido__mayo=floatval($mayoBase__despido) + floatval($despidoArray[4]);
		$resultado__v__despido__junio=floatval($junioBase__despido) + floatval($despidoArray[5]);
		$resultado__v__despido__julio=floatval($julioBase__despido) + floatval($despidoArray[6]);
		$resultado__v__despido__agosto=floatval($agostoBase__despido) + floatval($despidoArray[7]);
		$resultado__v__despido__septiembre=floatval($septiembreBase__despido) + floatval($despidoArray[8]);
		$resultado__v__despido__octubre=floatval($octubreBase__despido) + floatval($despidoArray[9]);
		$resultado__v__despido__noviembre=floatval($noviembreBase__despido) + floatval($despidoArray[10]);
		$resultado__v__despido__diciembre=floatval($diciembreBase__despido) + floatval($despidoArray[11]);

		$queryDesvinculacionUpdate__despido="UPDATE poa_desvinculacion SET enero='$resultado__v__despido__enero', febreo='$resultado__v__despido__febrero', marzo='$resultado__v__despido__marzo', abril='$resultado__v__despido__abril', mayo='$resultado__v__despido__mayo', junio='$resultado__v__despido__junio', julio='$resultado__v__despido__julio', agosto='$resultado__v__despido__agosto', septiembre='$resultado__v__despido__septiembre', octubre='$resultado__v__despido__octubre', noviembre='$resultado__v__despido__noviembre', diciembre='$resultado__v__despido__diciembre' WHERE idSueldos='$idSueldos' AND opcion='despido';";
		$resultadoDesvinculacionUpdate__despido= $conexionEstablecida->exec($queryDesvinculacionUpdate__despido);	


 		
 		$query__despido__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='156' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__despido__financiero->execute();

		$resultado__despido__financiero = $query__despido__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__despido__financiero as $resultado__despido__financiero) {
			
			$idProbramacionFinancieraBase__despido__financiero__despido=$resultado__despido__financiero["enero"];
			$eneroBase__despido__financiero=$resultado__despido__financiero["enero"];
			$febreroBase__despido__financiero=$resultado__despido__financiero["febrero"];
			$marzoBase__despido__financiero=$resultado__despido__financiero["marzo"];
			$abrilBase__despido__financiero=$resultado__despido__financiero["abril"];
			$mayoBase__despido__financiero=$resultado__despido__financiero["mayo"];
			$junioBase__despido__financiero=$resultado__despido__financiero["junio"];
			$julioBase__despido__financiero=$resultado__despido__financiero["julio"];
			$agostoBase__despido__financiero=$resultado__despido__financiero["agosto"];
			$septiembreBase__despido__financiero=$resultado__despido__financiero["septiembre"];
			$octubreBase__despido__financiero=$resultado__despido__financiero["octubre"];
			$noviembreBase__despido__financiero=$resultado__despido__financiero["noviembre"];
			$diciembreBase__despido__financiero=$resultado__despido__financiero["diciembre"];

		}	

		if (empty($eneroBase__despido__financiero)) {

			$queryDesvinculacion__despido__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 156, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__despido__financiero= $conexionEstablecida->exec($queryDesvinculacion__despido__financiero);			
				
	 		$query__despido__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='156' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__despido__financiero->execute();

			$resultado__despido__financiero = $query__despido__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__despido__financiero as $resultado__despido__financiero) {
				
				$idProbramacionFinancieraBase__despido__financiero__despido=$resultado__despido__financiero["enero"];
				$eneroBase__despido__financiero=$resultado__despido__financiero["enero"];
				$febreroBase__despido__financiero=$resultado__despido__financiero["febrero"];
				$marzoBase__despido__financiero=$resultado__despido__financiero["marzo"];
				$abrilBase__despido__financiero=$resultado__despido__financiero["abril"];
				$mayoBase__despido__financiero=$resultado__despido__financiero["mayo"];
				$junioBase__despido__financiero=$resultado__despido__financiero["junio"];
				$julioBase__despido__financiero=$resultado__despido__financiero["julio"];
				$agostoBase__despido__financiero=$resultado__despido__financiero["agosto"];
				$septiembreBase__despido__financiero=$resultado__despido__financiero["septiembre"];
				$octubreBase__despido__financiero=$resultado__despido__financiero["octubre"];
				$noviembreBase__despido__financiero=$resultado__despido__financiero["noviembre"];
				$diciembreBase__despido__financiero=$resultado__despido__financiero["diciembre"];

			}	

			
		}


		$resultado__v__despido__enero__financiero=floatval($eneroBase__despido__financiero) + floatval($despidoArray[0]);
		$resultado__v__despido__febrero__financiero=floatval($febreroBase__despido__financiero) + floatval($despidoArray[1]);
		$resultado__v__despido__marzo__financiero=floatval($marzoBase__despido__financiero) + floatval($despidoArray[2]);
		$resultado__v__despido__abril__financiero=floatval($abrilBase__despido__financiero) + floatval($despidoArray[3]);
		$resultado__v__despido__mayo__financiero=floatval($mayoBase__despido__financiero) + floatval($despidoArray[4]);
		$resultado__v__despido__junio__financiero=floatval($junioBase__despido__financiero) + floatval($despidoArray[5]);
		$resultado__v__despido__julio__financiero=floatval($julioBase__despido__financiero) + floatval($despidoArray[6]);
		$resultado__v__despido__agosto__financiero=floatval($agostoBase__despido__financiero) + floatval($despidoArray[7]);
		$resultado__v__despido__septiembre__financiero=floatval($septiembreBase__despido__financiero) + floatval($despidoArray[8]);
		$resultado__v__despido__octubre__financiero=floatval($octubreBase__despido__financiero) + floatval($despidoArray[9]);
		$resultado__v__despido__noviembre__financiero=floatval($noviembreBase__despido__financiero) + floatval($despidoArray[10]);
		$resultado__v__despido__diciembre__financiero=floatval($diciembreBase__despido__financiero) + floatval($despidoArray[11]);

		$queryDesvinculacionUpdate__financiero__despido="UPDATE poa_programacion_financiera SET enero='$resultado__v__despido__enero__financiero', febrero='$resultado__v__despido__febrero__financiero', marzo='$resultado__v__despido__marzo__financiero', abril='$resultado__v__despido__abril__financiero', mayo='$resultado__v__despido__mayo__financiero', junio='$resultado__v__despido__junio__financiero', julio='$resultado__v__despido__julio__financiero', agosto='$resultado__v__despido__agosto__financiero', septiembre='$resultado__v__despido__septiembre__financiero', octubre='$resultado__v__despido__octubre__financiero', noviembre='$resultado__v__despido__noviembre__financiero', diciembre='$resultado__v__despido__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__despido__financiero__despido';";
		$resultadoDesvinculacionUpdate__financiero__despido= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero__despido);			
		
		/*=====  End of Despido  ======*/
		
		/*================================
		=            Renuncia            =
		================================*/
		
		$query__renuncia = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='renuncia' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__renuncia->execute();

		$resultado__renuncia = $query__renuncia->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__renuncia as $valor__renuncia) {
			
			$eneroBase__renuncia=$valor__renuncia["enero"];
			$febreroBase__renuncia=$valor__renuncia["febrero"];
			$marzoBase__renuncia=$valor__renuncia["marzo"];
			$abrilBase__renuncia=$valor__renuncia["abril"];
			$mayoBase__renuncia=$valor__renuncia["mayo"];
			$junioBase__renuncia=$valor__renuncia["junio"];
			$julioBase__renuncia=$valor__renuncia["julio"];
			$agostoBase__renuncia=$valor__renuncia["agosto"];
			$septiembreBase__renuncia=$valor__renuncia["septiembre"];
			$octubreBase__renuncia=$valor__renuncia["octubre"];
			$noviembreBase__renuncia=$valor__renuncia["noviembre"];
			$diciembreBase__renuncia=$valor__renuncia["diciembre"];

		}	

		if (empty($eneroBase__renuncia)) {

			$queryDesvinculacion__renuncia="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__renuncia= $conexionEstablecida->exec($queryDesvinculacion__renuncia);			
			
 
	 		$query__renuncia = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='renuncia' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__renuncia->execute();

			$resultado__renuncia = $query__renuncia->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__renuncia as $valor__renuncia) {
				
				$eneroBase__renuncia=$valor__renuncia["enero"];
				$febreroBase__renuncia=$valor__renuncia["febrero"];
				$marzoBase__renuncia=$valor__renuncia["marzo"];
				$abrilBase__renuncia=$valor__renuncia["abril"];
				$mayoBase__renuncia=$valor__renuncia["mayo"];
				$junioBase__renuncia=$valor__renuncia["junio"];
				$julioBase__renuncia=$valor__renuncia["julio"];
				$agostoBase__renuncia=$valor__renuncia["agosto"];
				$septiembreBase__renuncia=$valor__renuncia["septiembre"];
				$octubreBase__renuncia=$valor__renuncia["octubre"];
				$noviembreBase__renuncia=$valor__renuncia["noviembre"];
				$diciembreBase__renuncia=$valor__renuncia["diciembre"];

			}	


		}	

		$queryBonificacionInsertas__renuncia="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $renunciaArray[0], $renunciaArray[1], $renunciaArray[2], $renunciaArray[3], $renunciaArray[4], $renunciaArray[5], $renunciaArray[6], $renunciaArray[7], $renunciaArray[8], $renunciaArray[9], $renunciaArray[10], $renunciaArray[11],$obtenMaximo__origen , 'renuncia', 'destino');";
		$resultadoBonificacionInsertas__renuncia= $conexionEstablecida->exec($queryBonificacionInsertas__renuncia);		
		
		
		$resultado__v__renuncia__enero=floatval($eneroBase__renuncia) + floatval($renunciaArray[0]);
		$resultado__v__renuncia__febrero=floatval($febreroBase__renuncia) + floatval($renunciaArray[1]);
		$resultado__v__renuncia__marzo=floatval($marzoBase__renuncia) + floatval($renunciaArray[2]);
		$resultado__v__renuncia__abril=floatval($abrilBase__renuncia) + floatval($renunciaArray[3]);
		$resultado__v__renuncia__mayo=floatval($mayoBase__renuncia) + floatval($renunciaArray[4]);
		$resultado__v__renuncia__junio=floatval($junioBase__renuncia) + floatval($renunciaArray[5]);
		$resultado__v__renuncia__julio=floatval($julioBase__renuncia) + floatval($renunciaArray[6]);
		$resultado__v__renuncia__agosto=floatval($agostoBase__renuncia) + floatval($renunciaArray[7]);
		$resultado__v__renuncia__septiembre=floatval($septiembreBase__renuncia) + floatval($renunciaArray[8]);
		$resultado__v__renuncia__octubre=floatval($octubreBase__renuncia) + floatval($renunciaArray[9]);
		$resultado__v__renuncia__noviembre=floatval($noviembreBase__renuncia) + floatval($renunciaArray[10]);
		$resultado__v__renuncia__diciembre=floatval($diciembreBase__renuncia) + floatval($renunciaArray[11]);

		$queryDesvinculacionUpdate__renuncia="UPDATE poa_desvinculacion SET enero='$resultado__v__renuncia__enero', febreo='$resultado__v__renuncia__febrero', marzo='$resultado__v__renuncia__marzo', abril='$resultado__v__renuncia__abril', mayo='$resultado__v__renuncia__mayo', junio='$resultado__v__renuncia__junio', julio='$resultado__v__renuncia__julio', agosto='$resultado__v__renuncia__agosto', septiembre='$resultado__v__renuncia__septiembre', octubre='$resultado__v__renuncia__octubre', noviembre='$resultado__v__renuncia__noviembre', diciembre='$resultado__v__renuncia__diciembre' WHERE idSueldos='$idSueldos' AND opcion='renuncia';";
		$resultadoDesvinculacionUpdate__renuncia= $conexionEstablecida->exec($queryDesvinculacionUpdate__renuncia);	


 		
 		$query__renuncia__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='94' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__renuncia__financiero->execute();

		$resultado__renuncia__financiero = $query__renuncia__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__renuncia__financiero as $resultado__renuncia__financiero) {
			
			$idProbramacionFinancieraBase__renuncia__financiero__renuncia=$resultado__renuncia__financiero["enero"];
			$eneroBase__renuncia__financiero=$resultado__renuncia__financiero["enero"];
			$febreroBase__renuncia__financiero=$resultado__renuncia__financiero["febrero"];
			$marzoBase__renuncia__financiero=$resultado__renuncia__financiero["marzo"];
			$abrilBase__renuncia__financiero=$resultado__renuncia__financiero["abril"];
			$mayoBase__renuncia__financiero=$resultado__renuncia__financiero["mayo"];
			$junioBase__renuncia__financiero=$resultado__renuncia__financiero["junio"];
			$julioBase__renuncia__financiero=$resultado__renuncia__financiero["julio"];
			$agostoBase__renuncia__financiero=$resultado__renuncia__financiero["agosto"];
			$septiembreBase__renuncia__financiero=$resultado__renuncia__financiero["septiembre"];
			$octubreBase__renuncia__financiero=$resultado__renuncia__financiero["octubre"];
			$noviembreBase__renuncia__financiero=$resultado__renuncia__financiero["noviembre"];
			$diciembreBase__renuncia__financiero=$resultado__renuncia__financiero["diciembre"];

		}	

		if (empty($eneroBase__renuncia__financiero)) {

			$queryDesvinculacion__renuncia__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 94, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__renuncia__financiero= $conexionEstablecida->exec($queryDesvinculacion__renuncia__financiero);			
				
	 		$query__renuncia__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='94' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__renuncia__financiero->execute();

			$resultado__renuncia__financiero = $query__renuncia__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__renuncia__financiero as $resultado__renuncia__financiero) {
				
				$idProbramacionFinancieraBase__renuncia__financiero__renuncia=$resultado__renuncia__financiero["enero"];
				$eneroBase__renuncia__financiero=$resultado__renuncia__financiero["enero"];
				$febreroBase__renuncia__financiero=$resultado__renuncia__financiero["febrero"];
				$marzoBase__renuncia__financiero=$resultado__renuncia__financiero["marzo"];
				$abrilBase__renuncia__financiero=$resultado__renuncia__financiero["abril"];
				$mayoBase__renuncia__financiero=$resultado__renuncia__financiero["mayo"];
				$junioBase__renuncia__financiero=$resultado__renuncia__financiero["junio"];
				$julioBase__renuncia__financiero=$resultado__renuncia__financiero["julio"];
				$agostoBase__renuncia__financiero=$resultado__renuncia__financiero["agosto"];
				$septiembreBase__renuncia__financiero=$resultado__renuncia__financiero["septiembre"];
				$octubreBase__renuncia__financiero=$resultado__renuncia__financiero["octubre"];
				$noviembreBase__renuncia__financiero=$resultado__renuncia__financiero["noviembre"];
				$diciembreBase__renuncia__financiero=$resultado__renuncia__financiero["diciembre"];

			}	

			
		}


		$resultado__v__renuncia__enero__financiero=floatval($eneroBase__renuncia__financiero) + floatval($renunciaArray[0]);
		$resultado__v__renuncia__febrero__financiero=floatval($febreroBase__renuncia__financiero) + floatval($renunciaArray[1]);
		$resultado__v__renuncia__marzo__financiero=floatval($marzoBase__renuncia__financiero) + floatval($renunciaArray[2]);
		$resultado__v__renuncia__abril__financiero=floatval($abrilBase__renuncia__financiero) + floatval($renunciaArray[3]);
		$resultado__v__renuncia__mayo__financiero=floatval($mayoBase__renuncia__financiero) + floatval($renunciaArray[4]);
		$resultado__v__renuncia__junio__financiero=floatval($junioBase__renuncia__financiero) + floatval($renunciaArray[5]);
		$resultado__v__renuncia__julio__financiero=floatval($julioBase__renuncia__financiero) + floatval($renunciaArray[6]);
		$resultado__v__renuncia__agosto__financiero=floatval($agostoBase__renuncia__financiero) + floatval($renunciaArray[7]);
		$resultado__v__renuncia__septiembre__financiero=floatval($septiembreBase__renuncia__financiero) + floatval($renunciaArray[8]);
		$resultado__v__renuncia__octubre__financiero=floatval($octubreBase__renuncia__financiero) + floatval($renunciaArray[9]);
		$resultado__v__renuncia__noviembre__financiero=floatval($noviembreBase__renuncia__financiero) + floatval($renunciaArray[10]);
		$resultado__v__renuncia__diciembre__financiero=floatval($diciembreBase__renuncia__financiero) + floatval($renunciaArray[11]);

		$queryDesvinculacionUpdate__financiero__renuncia="UPDATE poa_programacion_financiera SET enero='$resultado__v__renuncia__enero__financiero', febrero='$resultado__v__renuncia__febrero__financiero', marzo='$resultado__v__renuncia__marzo__financiero', abril='$resultado__v__renuncia__abril__financiero', mayo='$resultado__v__renuncia__mayo__financiero', junio='$resultado__v__renuncia__junio__financiero', julio='$resultado__v__renuncia__julio__financiero', agosto='$resultado__v__renuncia__agosto__financiero', septiembre='$resultado__v__renuncia__septiembre__financiero', octubre='$resultado__v__renuncia__octubre__financiero', noviembre='$resultado__v__renuncia__noviembre__financiero', diciembre='$resultado__v__renuncia__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__renuncia__financiero__renuncia';";
		$resultadoDesvinculacionUpdate__financiero__renuncia= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero__renuncia);	
		
		/*=====  End of Renuncia  ======*/
		
		/*=============================================
		=            Vacaciones no gozadas            =
		=============================================*/
		
				$query__vacaciones = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion LIKE 'compensac%' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__vacaciones->execute();

		$resultado__vacaciones = $query__vacaciones->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__vacaciones as $valor__vacaciones) {
			
			$eneroBase__vacaciones=$valor__vacaciones["enero"];
			$febreroBase__vacaciones=$valor__vacaciones["febrero"];
			$marzoBase__vacaciones=$valor__vacaciones["marzo"];
			$abrilBase__vacaciones=$valor__vacaciones["abril"];
			$mayoBase__vacaciones=$valor__vacaciones["mayo"];
			$junioBase__vacaciones=$valor__vacaciones["junio"];
			$julioBase__vacaciones=$valor__vacaciones["julio"];
			$agostoBase__vacaciones=$valor__vacaciones["agosto"];
			$septiembreBase__vacaciones=$valor__vacaciones["septiembre"];
			$octubreBase__vacaciones=$valor__vacaciones["octubre"];
			$noviembreBase__vacaciones=$valor__vacaciones["noviembre"];
			$diciembreBase__vacaciones=$valor__vacaciones["diciembre"];

		}	

		if (empty($eneroBase__vacaciones)) {

			$queryDesvinculacion__vacaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', 'desahucio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__vacaciones= $conexionEstablecida->exec($queryDesvinculacion__vacaciones);			
			
 
	 		$query__vacaciones = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion LIKE 'compensac%' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__vacaciones->execute();

			$resultado__vacaciones = $query__vacaciones->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__vacaciones as $valor__vacaciones) {
				
				$eneroBase__vacaciones=$valor__vacaciones["enero"];
				$febreroBase__vacaciones=$valor__vacaciones["febrero"];
				$marzoBase__vacaciones=$valor__vacaciones["marzo"];
				$abrilBase__vacaciones=$valor__vacaciones["abril"];
				$mayoBase__vacaciones=$valor__vacaciones["mayo"];
				$junioBase__vacaciones=$valor__vacaciones["junio"];
				$julioBase__vacaciones=$valor__vacaciones["julio"];
				$agostoBase__vacaciones=$valor__vacaciones["agosto"];
				$septiembreBase__vacaciones=$valor__vacaciones["septiembre"];
				$octubreBase__vacaciones=$valor__vacaciones["octubre"];
				$noviembreBase__vacaciones=$valor__vacaciones["noviembre"];
				$diciembreBase__vacaciones=$valor__vacaciones["diciembre"];

			}	


		}	

		$queryBonificacionInsertas__vacaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $vacacionesArray[0], $vacacionesArray[1], $vacacionesArray[2], $vacacionesArray[3], $vacacionesArray[4], $vacacionesArray[5], $vacacionesArray[6], $vacacionesArray[7], $vacacionesArray[8], $vacacionesArray[9], $vacacionesArray[10], $vacacionesArray[11],$obtenMaximo__origen , 'compensacion', 'destino');";
		$resultadoBonificacionInsertas__vacaciones= $conexionEstablecida->exec($queryBonificacionInsertas__vacaciones);		
		
		
		$resultado__v__vacaciones__enero=floatval($eneroBase__vacaciones) + floatval($vacacionesArray[0]);
		$resultado__v__vacaciones__febrero=floatval($febreroBase__vacaciones) + floatval($vacacionesArray[1]);
		$resultado__v__vacaciones__marzo=floatval($marzoBase__vacaciones) + floatval($vacacionesArray[2]);
		$resultado__v__vacaciones__abril=floatval($abrilBase__vacaciones) + floatval($vacacionesArray[3]);
		$resultado__v__vacaciones__mayo=floatval($mayoBase__vacaciones) + floatval($vacacionesArray[4]);
		$resultado__v__vacaciones__junio=floatval($junioBase__vacaciones) + floatval($vacacionesArray[5]);
		$resultado__v__vacaciones__julio=floatval($julioBase__vacaciones) + floatval($vacacionesArray[6]);
		$resultado__v__vacaciones__agosto=floatval($agostoBase__vacaciones) + floatval($vacacionesArray[7]);
		$resultado__v__vacaciones__septiembre=floatval($septiembreBase__vacaciones) + floatval($vacacionesArray[8]);
		$resultado__v__vacaciones__octubre=floatval($octubreBase__vacaciones) + floatval($vacacionesArray[9]);
		$resultado__v__vacaciones__noviembre=floatval($noviembreBase__vacaciones) + floatval($vacacionesArray[10]);
		$resultado__v__vacaciones__diciembre=floatval($diciembreBase__vacaciones) + floatval($vacacionesArray[11]);

		$queryDesvinculacionUpdate__vacaciones="UPDATE poa_desvinculacion SET enero='$resultado__v__vacaciones__enero', febreo='$resultado__v__vacaciones__febrero', marzo='$resultado__v__vacaciones__marzo', abril='$resultado__v__vacaciones__abril', mayo='$resultado__v__vacaciones__mayo', junio='$resultado__v__vacaciones__junio', julio='$resultado__v__vacaciones__julio', agosto='$resultado__v__vacaciones__agosto', septiembre='$resultado__v__vacaciones__septiembre', octubre='$resultado__v__vacaciones__octubre', noviembre='$resultado__v__vacaciones__noviembre', diciembre='$resultado__v__vacaciones__diciembre' WHERE idSueldos='$idSueldos' AND opcion LIKE 'compensac%';";
		$resultadoDesvinculacionUpdate__vacaciones= $conexionEstablecida->exec($queryDesvinculacionUpdate__vacaciones);	


 		
 		$query__vacaciones__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='50' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
		$query__vacaciones__financiero->execute();

		$resultado__vacaciones__financiero = $query__vacaciones__financiero->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__vacaciones__financiero as $resultado__vacaciones__financiero) {
			
			$idProbramacionFinancieraBase__vacaciones__financiero__vacaciones=$resultado__vacaciones__financiero["enero"];
			$eneroBase__vacaciones__financiero=$resultado__vacaciones__financiero["enero"];
			$febreroBase__vacaciones__financiero=$resultado__vacaciones__financiero["febrero"];
			$marzoBase__vacaciones__financiero=$resultado__vacaciones__financiero["marzo"];
			$abrilBase__vacaciones__financiero=$resultado__vacaciones__financiero["abril"];
			$mayoBase__vacaciones__financiero=$resultado__vacaciones__financiero["mayo"];
			$junioBase__vacaciones__financiero=$resultado__vacaciones__financiero["junio"];
			$julioBase__vacaciones__financiero=$resultado__vacaciones__financiero["julio"];
			$agostoBase__vacaciones__financiero=$resultado__vacaciones__financiero["agosto"];
			$septiembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["septiembre"];
			$octubreBase__vacaciones__financiero=$resultado__vacaciones__financiero["octubre"];
			$noviembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["noviembre"];
			$diciembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["diciembre"];

		}	

		if (empty($eneroBase__vacaciones__financiero)) {

			$queryDesvinculacion__vacaciones__financiero="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, ".$_SESSION["idOrganismoSession"].", 50, 4, NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, 2022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultadoDesvinculacion__vacaciones__financiero= $conexionEstablecida->exec($queryDesvinculacion__vacaciones__financiero);			
				
	 		$query__vacaciones__financiero = $conexionEstablecida->prepare("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='50' AND idOrganismo='".$_SESSION["idOrganismoSession"]."' AND perioIngreso='".$_SESSION["selectorAniosA"]."';");
			$query__vacaciones__financiero->execute();

			$resultado__vacaciones__financiero = $query__vacaciones__financiero->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__vacaciones__financiero as $resultado__vacaciones__financiero) {
				
				$idProbramacionFinancieraBase__vacaciones__financiero__vacaciones=$resultado__vacaciones__financiero["enero"];
				$eneroBase__vacaciones__financiero=$resultado__vacaciones__financiero["enero"];
				$febreroBase__vacaciones__financiero=$resultado__vacaciones__financiero["febrero"];
				$marzoBase__vacaciones__financiero=$resultado__vacaciones__financiero["marzo"];
				$abrilBase__vacaciones__financiero=$resultado__vacaciones__financiero["abril"];
				$mayoBase__vacaciones__financiero=$resultado__vacaciones__financiero["mayo"];
				$junioBase__vacaciones__financiero=$resultado__vacaciones__financiero["junio"];
				$julioBase__vacaciones__financiero=$resultado__vacaciones__financiero["julio"];
				$agostoBase__vacaciones__financiero=$resultado__vacaciones__financiero["agosto"];
				$septiembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["septiembre"];
				$octubreBase__vacaciones__financiero=$resultado__vacaciones__financiero["octubre"];
				$noviembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["noviembre"];
				$diciembreBase__vacaciones__financiero=$resultado__vacaciones__financiero["diciembre"];

			}	

			
		}


		$resultado__v__vacaciones__enero__financiero=floatval($eneroBase__vacaciones__financiero) + floatval($vacacionesArray[0]);
		$resultado__v__vacaciones__febrero__financiero=floatval($febreroBase__vacaciones__financiero) + floatval($vacacionesArray[1]);
		$resultado__v__vacaciones__marzo__financiero=floatval($marzoBase__vacaciones__financiero) + floatval($vacacionesArray[2]);
		$resultado__v__vacaciones__abril__financiero=floatval($abrilBase__vacaciones__financiero) + floatval($vacacionesArray[3]);
		$resultado__v__vacaciones__mayo__financiero=floatval($mayoBase__vacaciones__financiero) + floatval($vacacionesArray[4]);
		$resultado__v__vacaciones__junio__financiero=floatval($junioBase__vacaciones__financiero) + floatval($vacacionesArray[5]);
		$resultado__v__vacaciones__julio__financiero=floatval($julioBase__vacaciones__financiero) + floatval($vacacionesArray[6]);
		$resultado__v__vacaciones__agosto__financiero=floatval($agostoBase__vacaciones__financiero) + floatval($vacacionesArray[7]);
		$resultado__v__vacaciones__septiembre__financiero=floatval($septiembreBase__vacaciones__financiero) + floatval($vacacionesArray[8]);
		$resultado__v__vacaciones__octubre__financiero=floatval($octubreBase__vacaciones__financiero) + floatval($vacacionesArray[9]);
		$resultado__v__vacaciones__noviembre__financiero=floatval($noviembreBase__vacaciones__financiero) + floatval($vacacionesArray[10]);
		$resultado__v__vacaciones__diciembre__financiero=floatval($diciembreBase__vacaciones__financiero) + floatval($vacacionesArray[11]);

		$queryDesvinculacionUpdate__financiero__vacaciones="UPDATE poa_programacion_financiera SET enero='$resultado__v__vacaciones__enero__financiero', febrero='$resultado__v__vacaciones__febrero__financiero', marzo='$resultado__v__vacaciones__marzo__financiero', abril='$resultado__v__vacaciones__abril__financiero', mayo='$resultado__v__vacaciones__mayo__financiero', junio='$resultado__v__vacaciones__junio__financiero', julio='$resultado__v__vacaciones__julio__financiero', agosto='$resultado__v__vacaciones__agosto__financiero', septiembre='$resultado__v__vacaciones__septiembre__financiero', octubre='$resultado__v__vacaciones__octubre__financiero', noviembre='$resultado__v__vacaciones__noviembre__financiero', diciembre='$resultado__v__vacaciones__diciembre__financiero' WHERE idProgramacionFinanciera='$idProbramacionFinancieraBase__vacaciones__financiero__vacaciones';";
		$resultadoDesvinculacionUpdate__financiero__vacaciones= $conexionEstablecida->exec($queryDesvinculacionUpdate__financiero__vacaciones);	
		
		/*=====  End of Vacaciones no gozadas  ======*/
		
		
		return $queryDesvinculacionUpdate;

	}		
	
	public function actualizar__desvinculaciones__destino__sin($idSueldos,$arrayEnviado,$obtenMaximo__origen,$letrero){


		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		date_default_timezone_set("America/Guayaquil");

		$fecha_actual = date('Y-m-d');
		$hora_actual= date('H:i:s');	

		/*================================
		=            Desaucio            =
		================================*/
		
 		$query__desaucio = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='$letrero' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
		$query__desaucio->execute();

		$resultado__desaucio = $query__desaucio->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado__desaucio as $valor__desaucio) {
			
			$eneroBase__desaucio=$valor__desaucio["enero"];
			$febreroBase__desaucio=$valor__desaucio["febrero"];
			$marzoBase__desaucio=$valor__desaucio["marzo"];
			$abrilBase__desaucio=$valor__desaucio["abril"];
			$mayoBase__desaucio=$valor__desaucio["mayo"];
			$junioBase__desaucio=$valor__desaucio["junio"];
			$julioBase__desaucio=$valor__desaucio["julio"];
			$agostoBase__desaucio=$valor__desaucio["agosto"];
			$septiembreBase__desaucio=$valor__desaucio["septiembre"];
			$octubreBase__desaucio=$valor__desaucio["octubre"];
			$noviembreBase__desaucio=$valor__desaucio["noviembre"];
			$diciembreBase__desaucio=$valor__desaucio["diciembre"];

		}	

		if (empty($eneroBase__desaucio)) {

			$queryDesvinculacion__desaucio="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`) VALUES (NULL, '$idSueldos', '".$_SESSION["idOrganismoSession"]."', '$letrero', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'A', '$fecha_actual', '0', '0', '".$_SESSION["selectorAniosA"]."');";
			$resultadoDesvinculacion__desaucio= $conexionEstablecida->exec($queryDesvinculacion__desaucio);			
			
 
	 		$query__desaucio = $conexionEstablecida->prepare("SELECT enero,febreo AS febrero, marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE opcion='$letrero' AND perioIngreso='".$_SESSION["selectorAniosA"]."' AND idSueldos='".$idSueldos."';");
			$query__desaucio->execute();

			$resultado__desaucio = $query__desaucio->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($resultado__desaucio as $valor__desaucio) {
				
				$eneroBase__desaucio=$valor__desaucio["enero"];
				$febreroBase__desaucio=$valor__desaucio["febrero"];
				$marzoBase__desaucio=$valor__desaucio["marzo"];
				$abrilBase__desaucio=$valor__desaucio["abril"];
				$mayoBase__desaucio=$valor__desaucio["mayo"];
				$junioBase__desaucio=$valor__desaucio["junio"];
				$julioBase__desaucio=$valor__desaucio["julio"];
				$agostoBase__desaucio=$valor__desaucio["agosto"];
				$septiembreBase__desaucio=$valor__desaucio["septiembre"];
				$octubreBase__desaucio=$valor__desaucio["octubre"];
				$noviembreBase__desaucio=$valor__desaucio["noviembre"];
				$diciembreBase__desaucio=$valor__desaucio["diciembre"];

			}	


		}	

		$queryBonificacionInsertas="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, $arrayEnviado[0], $arrayEnviado[1], $arrayEnviado[2], $arrayEnviado[3], $arrayEnviado[4], $arrayEnviado[5], $arrayEnviado[6], $arrayEnviado[7], $arrayEnviado[8], $arrayEnviado[9], $arrayEnviado[10], $arrayEnviado[11],$obtenMaximo__origen , '$letrero', 'destino');";
		$resultadoBonificacionInsertas= $conexionEstablecida->exec($queryBonificacionInsertas);		
		
		
		$resultado__v__desaucio__enero=floatval($eneroBase__desaucio) + floatval($arrayEnviado[0]);
		$resultado__v__desaucio__febrero=floatval($febreroBase__desaucio) + floatval($arrayEnviado[1]);
		$resultado__v__desaucio__marzo=floatval($marzoBase__desaucio) + floatval($arrayEnviado[2]);
		$resultado__v__desaucio__abril=floatval($abrilBase__desaucio) + floatval($arrayEnviado[3]);
		$resultado__v__desaucio__mayo=floatval($mayoBase__desaucio) + floatval($arrayEnviado[4]);
		$resultado__v__desaucio__junio=floatval($junioBase__desaucio) + floatval($arrayEnviado[5]);
		$resultado__v__desaucio__julio=floatval($julioBase__desaucio) + floatval($arrayEnviado[6]);
		$resultado__v__desaucio__agosto=floatval($agostoBase__desaucio) + floatval($arrayEnviado[7]);
		$resultado__v__desaucio__septiembre=floatval($septiembreBase__desaucio) + floatval($arrayEnviado[8]);
		$resultado__v__desaucio__octubre=floatval($octubreBase__desaucio) + floatval($arrayEnviado[9]);
		$resultado__v__desaucio__noviembre=floatval($noviembreBase__desaucio) + floatval($arrayEnviado[10]);
		$resultado__v__desaucio__diciembre=floatval($diciembreBase__desaucio) + floatval($arrayEnviado[11]);

		$queryDesvinculacionUpdate="UPDATE poa_desvinculacion SET enero='$resultado__v__desaucio__enero', febreo='$resultado__v__desaucio__febrero', marzo='$resultado__v__desaucio__marzo', abril='$resultado__v__desaucio__abril', mayo='$resultado__v__desaucio__mayo', junio='$resultado__v__desaucio__junio', julio='$resultado__v__desaucio__julio', agosto='$resultado__v__desaucio__agosto', septiembre='$resultado__v__desaucio__septiembre', octubre='$resultado__v__desaucio__octubre', noviembre='$resultado__v__desaucio__noviembre', diciembre='$resultado__v__desaucio__diciembre' WHERE idSueldos='$idSueldos' AND opcion='$letrero';";
		$resultadoDesvinculacionUpdate= $conexionEstablecida->exec($queryDesvinculacionUpdate);	


		/*=====  End of Desaucio  ======*/


		return $queryDesvinculacionUpdate;


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

	public function getInformacion__modificaciones__enviadas__selector__infraestructura($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(f.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadOrigen,a.eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(g.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadDestino,a.eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_programacion_financiera AS b ON b.idProgramacionFinanciera=a.idFinancierioOrigen INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=b.idItem INNER JOIN poa_item AS e ON e.idItem=c.idItem INNER JOIN poa_actividades AS f ON f.idActividades=b.idActividad INNER JOIN poa_actividades AS g ON g.idActividades=a.actividadDestino WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.actividadDestino='2' AND a.identificadorPaginaReal='diferentes';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}


	public function getInformacion__modificaciones__enviadas__selector__administrativo($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(f.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadOrigen,a.eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(g.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadDestino,a.eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_programacion_financiera AS b ON b.idProgramacionFinanciera=a.idFinancierioOrigen INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=b.idItem INNER JOIN poa_item AS e ON e.idItem=c.idItem INNER JOIN poa_actividades AS f ON f.idActividades=b.idActividad INNER JOIN poa_actividades AS g ON g.idActividades=a.actividadDestino WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.actividadDestino='1' AND a.identificadorPaginaReal='diferentes';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}

	public function getInformacion__modificaciones__enviadas__selector__desarrollos__varios($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(f.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadOrigen,a.eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(g.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadDestino,a.eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_programacion_financiera AS b ON b.idProgramacionFinanciera=a.idFinancierioOrigen INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=b.idItem INNER JOIN poa_item AS e ON e.idItem=c.idItem INNER JOIN poa_actividades AS f ON f.idActividades=b.idActividad INNER JOIN poa_actividades AS g ON g.idActividades=a.actividadDestino WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND (a.actividadDestino='3' OR a.actividadDestino='4' OR a.actividadDestino='5' OR a.actividadDestino='6' OR a.actividadDestino='7') AND a.identificadorPaginaReal='diferentes';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}

	public function getInformacion__modificaciones__enviadas__selector__desarrollos__honorarios($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_honorarios2022 AS b ON a.idFinancierioOrigen=b.idHonorarios INNER JOIN poa_honorarios2022 AS c ON c.idHonorarios=a.eventosDestino WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.identificadorPaginaReal='honorarios';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}


	public function getInformacion__modificaciones__enviadas__selector__desarrollos__honorarios__items($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.cedula, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.eventosDestino, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_honorarios2022 AS b ON a.idFinancierioOrigen=b.idHonorarios INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.identificadorPaginaReal='honorarios__item';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}

	public function getInformacion__modificaciones__enviadas__selector__desarrollos__sueldos__salarios($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idFinancierioOrigen=b.idSueldos INNER JOIN poa_sueldossalarios2022 AS c ON c.idSueldos=a.eventosDestino WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.identificadorPaginaReal='sueldos';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}


	public function getInformacion__modificaciones__enviadas__selector__desarrollos__sueldos__salarios__items($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.cedula, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.eventosDestino, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioDestino,a.eneroDestino,a.febreroDestino,a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.eneroDestino__sumando,a.febreroDestino__sumando,a.marzoDestino__sumando,a.abrilDestino__sumando,a.mayoDestino__sumando,a.junioDestino__sumando,a.julioDestino__sumando,a.agostoDestino__sumando,a.septiembreDestino__sumando,a.octubreDestino__sumando,a.noviembreDestino__sumando,a.diciembreDestino__sumando,a.idOrganismo,a.fecha,documento,a.justificacion,a.tipoTramite,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,c.enero As eneroDestino__destino,c.febrero AS febreroDestino__destino,c.marzo AS marzoDestino__destino,c.abril AS abrilDestino__destino,c.mayo AS mayoDestino__destino,c.junio AS junioDestino__destino,c.julio AS julioDestino__destino,c.agosto AS agostoDestino__destino,c.septiembre AS septiembreDestino__destino,c.octubre AS octubreDestino__destino,c.noviembre AS noviembreDestino__destino,c.diciembre AS diciembreDestino__destino,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idFinancierioOrigen=b.idSueldos INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=a.idFinancierioDestino INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idModificacionDerfinitiva='$parametro1' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.identificadorPaginaReal='sueldos__item';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}

	public function getInformacion__modificaciones__enviadas__selector__desarrollos__desvinculaciones($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$conexionEstablecida->exec("set names utf8");

 		$query = $conexionEstablecida->prepare("SELECT a.idOrigenDestino,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadOrigen) AS actividadOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS eventosOrigen,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS idFinancierioOrigen,a.eneroOrigen,a.febreroOrigen,marzoOrigen,a.abrilOrigen,mayoOrigen,a.junioOrigen,a.julioOrigen,agostoOrigen,a.septiembreOrigen,a.octubreOrigen,a.noviembreOrigen,a.diciembreOrigen,a.totalOrigen,a.eneroOrigen__restando,a.febreroOrigen__restando,a.marzoOrigen__restando,a.abrilOrigen__restando,a.mayoOrigen__restando,a.junioOrigen__restando,a.julioOrigen__restando,a.agostoOrigen__restando,a.septiembreOrigen__restando,a.octubreOrigen__restando,a.noviembreOrigen__restando,a.diciembreOrigen__restando,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_actividades AS a1 WHERE a1.idActividades=a.actividadDestino) AS actividadDestino,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.eneroDestino,a.febreroDestino, a.marzoDestino,a.abrilDestino,a.mayoDestino,a.junioDestino,a.julioDestino,a.agostoDestino,a.septiembreDestino,a.octubreDestino,a.noviembreDestino,a.diciembreDestino,a.totalDestino,a.identificadorPaginaReal,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,IFNULL(a.calificacion,'VALIDADO') AS modificacionEstado,a.observaciones,a.calificacion FROM poa_modificaciones_origen_destino AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idFinancierioOrigen=b.idSueldos INNER JOIN poa_sueldossalarios2022 AS c ON c.idSueldos=a.eventosDestino INNER JOIN poa_item AS d ON d.idItem=a.idFinancierioDestino  WHERE a.idModificacionDerfinitiva='$idLinea' AND a.periodoIngreso='$aniosPeriodos__ingesos' AND a.identificadorPaginaReal='desvinculacion';");
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

	public function getEnviarEXCELCSV($tipo,$tamanio,$archivotmp,$archivotmpNombre,$parametro2,$parametro3){

		

		if(rename($archivotmp,$parametro2.$parametro3)){

			return "si";

		}else{

			return "noxlsxcsv";

		}

	
	}


	public function getEnviarCorreoDosParametros2023($parametro1,$parametro2,$asunto){


		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {

			//Server settings
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = 'distribucion@deporte.gob.ec';                     // SMTP username
				$mail->Password   =  'Pr0t3cc10NM1nD3p1811$$';                            // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


				$mail->CharSet = 'UTF-8';
				//Recipients
				$mail->setFrom('distribucion@deporte.gob.ec', 'Ministerio del Deporte');

			for ($i=0; $i < count($parametro1); $i++) { 
				
				$mail->addAddress($parametro1[$i]); 

			}

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $asunto;
			$mail->Body = $parametro2; 

			return $mail->send();

		} catch (Exception $e) {
			
			return "no";

		}

	}

}