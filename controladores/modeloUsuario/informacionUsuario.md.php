<?php


class usuarioAcciones{

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


	public function getUrlDinamica($parametro1,$paraemtro2,$parametro3){

		$path = parse_url($paraemtro2, PHP_URL_PATH);

		$components = explode($parametro1, $path);

		$first_part = $components[1];

		if($first_part==$parametro3){
			return "active__menu";
		}else{
			return "noActive__menu";
		}

	}

	public function getUrlDinamicaUna($parametro1,$paraemtro2,$paraemtro3){

		$path = parse_url($paraemtro2, PHP_URL_PATH);

		$components = explode($parametro1, $path);

		$first_part = $components[1];

		if (in_array($first_part, $paraemtro3)) {

    		return "menu-open";

		}else{

			return "menu-openNo";

		}

	}

	public function getInformacionGeneral(){

		$idUsuario=$_SESSION["idUsuario"];
		$idRol=$_SESSION["idRol"];
		$tipo=$_SESSION["tipo"];

		$parametrosEnvio = array($idUsuario,$idRol,$tipo);

		return $parametrosEnvio;

	}



	public function getInformacionUsuarioPerfil($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		$query="SELECT CONCAT_WS(' ',nombre,apellido) AS nombreCompleto FROM poa_usuario WHERE idUsuario='$parametro1' LIMIT 1;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$nombreCompleto=$registro['nombreCompleto'];
			
		}

		return $nombreCompleto;

	}	


	public function getInformacionGeneralFun($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$query = $conexionEstablecida->prepare("SELECT a.fisicamenteEstructura,a.email,a.zonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$parametro1';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;


	}	

	public function getInformacionEmail($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		$query="SELECT email FROM poa_usuario WHERE idUsuario='$parametro1' LIMIT 1;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$email=$registro['email'];
			
		}

		return $email;

	}


	public function getInformacionOrganismoDeportivo($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

		$query="SELECT b.nombreOrganismo FROM poa_usuario AS a INNER JOIN poa_organismo AS b ON a.idUsuario=b.idUsuario WHERE a.idUsuario='$parametro1' LIMIT 1;";
		$resultado = $conexionEstablecida->query($query);

		while($registro = $resultado->fetch()) {

			$nombreOrganismo=$registro['nombreOrganismo'];
			
		}

		return $nombreOrganismo;

	}	


	public function getInformacionCompletaOrganismoDeportivo__2(){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		
		session_start();

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

 		$idUsuario=$_SESSION["idUsuario"];
		date_default_timezone_set("America/Guayaquil");

		$anioActual = date('Y');


 		$query = $conexionEstablecida->prepare("SELECT b.ruc,b.nombreOrganismo,b.correo,b.direccion,b.referenciaDireccion,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia) AS nombreProvincia,(SELECT a2.nombreCanton FROM in_md_canton AS a2 WHERE a2.idCanton=b.idCanton) AS nombreCanton,(SELECT a3.nombreParroquia FROM in_md_parroquia AS a3 WHERE a3.idParroquia=b.idParroquia) AS nombreParroquia,b.idProvincia,b.idCanton,b.idParroquia,b.barrioPoa,c.numeroDeAcuerdo,c.documento,c.fecha AS fechaAcuerdo,b.idOrganismo,a.cedula,a.nombre AS nombrePresidente,a.apellido AS apellidoPresidente, a.sexo AS sexoPresidente,a.fechaNacimiento AS fechaPresidente,a.email AS emailPresidente,a.telefono AS celularPresidente,b.cedulaResponsable,b.nombreResponsablePoa,b.correoResponsablePoa,b.telefonoOficina,a.idUsuario,d.nombreDocumentoDeAprobacion,b.activado,b.periodo,(SELECT a1.idInversion FROM poa_inversion AS a1 INNER JOIN poa_inversion_usuario AS a2 WHERE a1.idInversion=a2.idInversion AND a2.idOrganismo=b.idOrganismo ORDER BY a1.idInversion DESC LIMIT 1) AS idInversion,f.idTipoOrganismo FROM poa_usuario AS a INNER JOIN poa_organismo AS b ON a.idUsuario=b.idUsuario LEFT JOIN poa_organismo_acuerdo_ministerial AS c ON c.idOrganismo=b.idOrganismo LEFT JOIN poa_organismo_documento_aprobacion AS d ON d.idOrganismo=b.idOrganismo LEFT JOIN poa_competencia_organismo_competencia AS e ON e.idOrganismo=b.idOrganismo LEFT JOIN poa_tipo_organismo AS f ON f.idTipoOrganismo=e.idTipoOrganismo LEFT JOIN poa_inversion_usuario AS zL ON zL.idOrganismo=b.idOrganismo LEFT JOIN poa_inversion AS zL1 ON zL1.idInversion=zL.idInversion WHERE a.idUsuario='$idUsuario'  GROUP BY f.idTipoOrganismo ORDER BY f.idTipoOrganismo DESC LIMIT 1;");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	


	public function getInformacionCompletaOrganismoDeportivo(){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		
		session_start();

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

 		$idUsuario=$_SESSION["idUsuario"];
		date_default_timezone_set("America/Guayaquil");

		$anioActual = date('Y');


 		$query = $conexionEstablecida->prepare("SELECT b.ruc,b.nombreOrganismo,b.correo,b.direccion,b.referenciaDireccion,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia) AS nombreProvincia,(SELECT a2.nombreCanton FROM in_md_canton AS a2 WHERE a2.idCanton=b.idCanton) AS nombreCanton,(SELECT a3.nombreParroquia FROM in_md_parroquia AS a3 WHERE a3.idParroquia=b.idParroquia) AS nombreParroquia,b.idProvincia,b.idCanton,b.idParroquia,b.barrioPoa,c.numeroDeAcuerdo,c.documento,c.fecha AS fechaAcuerdo,b.idOrganismo,a.cedula,a.nombre AS nombrePresidente,a.apellido AS apellidoPresidente, a.sexo AS sexoPresidente,a.fechaNacimiento AS fechaPresidente,a.email AS emailPresidente,a.telefono AS celularPresidente,b.cedulaResponsable,b.nombreResponsablePoa,b.correoResponsablePoa,b.telefonoOficina,a.idUsuario,d.nombreDocumentoDeAprobacion,b.activado,b.periodo,(SELECT a1.idInversion FROM poa_inversion AS a1 INNER JOIN poa_inversion_usuario AS a2 WHERE a1.idInversion=a2.idInversion AND a2.idOrganismo=b.idOrganismo ORDER BY a1.idInversion DESC LIMIT 1) AS idInversion,f.idTipoOrganismo FROM poa_usuario AS a INNER JOIN poa_organismo AS b ON a.idUsuario=b.idUsuario INNER JOIN poa_organismo_acuerdo_ministerial AS c ON c.idOrganismo=b.idOrganismo LEFT JOIN poa_organismo_documento_aprobacion AS d ON d.idOrganismo=b.idOrganismo LEFT JOIN poa_competencia_organismo_competencia AS e ON e.idOrganismo=b.idOrganismo LEFT JOIN poa_tipo_organismo AS f ON f.idTipoOrganismo=e.idTipoOrganismo INNER JOIN poa_inversion_usuario AS zL ON zL.idOrganismo=b.idOrganismo INNER JOIN poa_inversion AS zL1 ON zL1.idInversion=zL.idInversion WHERE a.idUsuario='$idUsuario'  GROUP BY f.idTipoOrganismo ORDER BY f.idTipoOrganismo DESC LIMIT 1;");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	

	public function getObservacionesAprobacionUsuarios($parametro1){


		session_start();

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$query = $conexionEstablecida->prepare("SELECT idObservaciones,observacion,tipoObservacion FROM poa_observaciones WHERE idOrganismo='$parametro1' AND tipoObservacion='aprobacionUsuario' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idObservaciones DESC LIMIT 1;");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	

	public function getObtenerInformacionGeneral($parametro1){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();

 		$query = $conexionEstablecida->prepare($parametro1);
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		return $resultado;

	}	

	public function getRestar($parametro1,$parametro2){

		$restar=0;

		$restar=round(floatval($parametro1) - floatval($parametro2),2);

		return $restar;

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

}