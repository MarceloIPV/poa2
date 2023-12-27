<?php
	
	extract($_POST);

	require_once "../../config/config2.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');

	session_start();

	/*=====  End of Parametros Iniciales  ======*/
	
	require_once "../../config/files.php";

	$objeto= new usuarioAcciones();

	switch ($tipo) {


		case  "paidorganismos":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			$nombreDocumentos=$fecha_actual."__".$organismos__id.".pdf";

			$direccionDocumentos="../../documentos/presupuestoPaidOrganismos/";

			$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccionDocumentos,$nombreDocumentos);

			$inserta=$objeto->getInsertaNormal('poa_paid_proyecto_organismo', array("`idProyectoOrganismo`, ","`idOrganismo`, ","`monto`, ","`archivo`, ","`fecha`, ","`hora`, ","`idProyecto`, ","`perioIngreso`"),array("'$organismos__id', ","'$montoOrganismo', ","'$nombreDocumentos', ","'$fecha_actual', ","'$hora_actual', ","'$idProyecto', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "terminar__documento__tramite__quipux":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			$valores=array("rechazo='M'");
			$actualiza=$objeto->getActualiza__confirmado("poa_financiero_documentos",$valores,"idOrganismo",$idOrganismo,"perioIngreso",$aniosPeriodos__ingesos);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "regresar__documento__tramite__quipux":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			$valores=array("rechazo='T'");
			$actualiza=$objeto->getActualiza__confirmado("poa_financiero_documentos",$valores,"idOrganismo",$idOrganismo,"perioIngreso",$aniosPeriodos__ingesos);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "edicionDocumentoAprobacion":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			$valores=array("nombreDocumentoDeAprobacion='$nombreArchivo'");
			$actualiza=$objeto->getActualiza__confirmado("poa_organismo_documento_aprobacion",$valores,"idOrganismo",$idOrganismo,"perioIngreso",$aniosPeriodos__ingesos);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "edicion":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			
			$valores=array("correo='$emailOrganismo',","direccion='$direccionOrganismo',","referenciaDireccion='$referenciaDireccionOrganismo',","idProvincia='$provinciaDatos',","idCanton='$cantonDatos',","idParroquia='$parroquiaDatos',","barrioPoa='$barrioOrganismo'");
			$actualiza=$objeto->getActualiza("poa_organismo",$valores,"idOrganismo",$idOrganismo);

			$valores2=array("numeroDeAcuerdo='$numeroAcuerdoMinisterial',","fecha='$fechaAacuerdoMinisterial'");
			$actualiza2=$objeto->getActualiza("poa_organismo_acuerdo_ministerial",$valores2,"idOrganismo",$idOrganismo);

			$valores3=array("cedula='$cedulaPresidenteOrganismoDeportivo',","nombre='$presidenteOrganismoDeportivo',","apellido='$presidenteOrganismoDeportivoApe',","sexo='$generoPresidente',","fechaNacimiento='$fechaNacimientoPresidente',","email='$correoPresidente',","telefono='$celularRepresentante'");
			$actualiza3=$objeto->getActualiza("poa_usuario",$valores3,"idUsuario",$idUsuario);

			$valores4=array("cedulaResponsable='$cedulaRepresentanteOrganismoDeportivo',","nombreResponsablePoa='$representanteOrganismoDeportivo',","correoResponsablePoa='$correoRepresentante',","telefonoOficina='$celularRepresentante'");
			$actualiza4=$objeto->getActualiza("poa_organismo",$valores4,"idOrganismo",$idOrganismo);

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();

			$query="SELECT idTipoOrganismo FROM poa_competencia_organismo_competencia WHERE idOrganismo='$idOrganismo'";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {

				$idTipoOrganismo=$registro['idTipoOrganismo'];

			}

			if (empty($idTipoOrganismo)) {
				
		 		$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_competencia_organismo_competencia` (`idCompetenciaOrganismo`, `idTipoOrganismo`, `idObjetivos`, `objetivoEscrito`, `programaPoa`, `idOrganismo`, `fecha`, `hora`, `cumplimientoMetasRemanentes`, `cumplimientoMetasPresentaInformacion`, `cumplimientoObjetivos`, `remanentes`, `cumplimientoDeInformacion`, `objetivosObservaciones`, `nombreUsuario`, `rolUsuario`, `fechaRegistroComentario`, `cumplimientoObjetivosTecnico`, `objetivosObservacionesTecnico`, `nombreUsuarioTecnico`, `rolUsuarioTecnico`, `fechaRegistroComentarioTecnico`, `cumplimientoObjetivosMantenimiento`, `objetivosObservacionesMantenimiento`, `nombreUsuarioMantenimiento`, `rolUsuarioMantenimiento`, `fechaRegistroComentarioMantenimiento`, `cumplimientoObjetivosPresentacionATiempo`, `montoDeRemantentesPresentados`, `objetivosObservacionesPresentacion`, `objetivosMontosDeRemanentesObservaciones`, `perioIngreso`) VALUES (NULL, '$tiposOrganimosDeportivos__Group', 6, NULL, NULL, '$idOrganismo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$aniosPeriodos__ingesos');";
				$resultado= $conexionEstablecida->exec($query);


			}else{

		 		$query="UPDATE poa_competencia_organismo_competencia SET idTipoOrganismo='$tiposOrganimosDeportivos__Group' WHERE idOrganismo='$idOrganismo';";
				$resultado= $conexionEstablecida->exec($query);
			}



			// $inserta=$objeto->getInsertaNormal('poa_competencia_organismo_competencia', array("`idCompetenciaOrganismo`, ","`idObjetivos`, ","`idTipoOrganismo`, ","`fecha`, ","`idOrganismo`"),array("6, ","'$tiposOrganimosDeportivos', ","'$fecha_actual', ","'$idOrganismo'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "subirDocumentos__quipux__transferencias":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			$nombreQuipux=$fecha_actual."__".$idOrganismo.".pdf";

			$direccionDocumentos=VARIABLE__BACKEND."quipux__transferencia/";


			$inserta=$objeto->getInsertaNormal('poa_quipuxdocumento', array("`idQuipux`, ","`documentoQuipux`, ","`fecha`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombreQuipux', ","'$fecha_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

			$documento=$objeto->getEnviarPdf($_FILES["documentoReemplazo"]['type'],$_FILES["documentoReemplazo"]['size'],$_FILES["documentoReemplazo"]['tmp_name'],$_FILES["documentoReemplazo"]['name'],$direccionDocumentos,$nombreQuipux);

			$valores2=array("rechazo='F'");

			$actualiza2=$objeto->getActualiza__confirmado("poa_financiero_documentos",$valores2,"idOrganismo",$idOrganismo,"perioIngreso",$aniosPeriodos__ingesos);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "subirDocumentos":

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

			$maximo=$objeto->getMaximoFuncion('idAnexos','poa_anexos2022');	

			$fe=$maximo;

			$documentosDir=VARIABLE__BACKEND."anexosPoa/";

			$inserta=$objeto->getInsertaNormal('poa_anexos2022', array("`idAnexos`, ","`nombreAnexo`, ","`idOrganismo`, ","`fecha`, ","`perioIngreso`"),array("'$organismoIdPrin"."__"."$fe.pdf', ","'$organismoIdPrin', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$documento=$objeto->getEnviarPdf($_FILES["documentoReemplazo"]['type'],$_FILES["documentoReemplazo"]['size'],$_FILES["documentoReemplazo"]['tmp_name'],$_FILES["documentoReemplazo"]['name'],$documentosDir,$organismoIdPrin."__".$fe.".pdf");

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case "cambioDocumento":

			$documento=$objeto->getEnviarPdf($_FILES["documentoReemplazo"]['type'],$_FILES["documentoReemplazo"]['size'],$_FILES["documentoReemplazo"]['tmp_name'],$_FILES["documentoReemplazo"]['name'],$direccionDocumentos,$nombreDocumento.$fecha_actual.".pdf");

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "codigoVerificacion":

				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();

				$query="SELECT b.idOrganismo,a.idUsuario,a.usuario,b.nombreOrganismo,a.email FROM poa_usuario AS a INNER JOIN poa_organismo AS b ON a.idUsuario=b.idUsuario WHERE a.usuario='$usuarioOrganismos';";
				$resultado = $conexionEstablecida->query($query);

				while($registro = $resultado->fetch()) {

					$idOrganismo=$registro['idOrganismo'];

					$idUsuario=$registro['idUsuario'];

					$usuario=$registro['usuario'];

					$nombreOrganismo=$registro['nombreOrganismo'];

					$email=$registro['email'];

				}

				if (empty($idOrganismo)) {
					
					$mensaje=2;
					$jason['mensaje']=$mensaje;

				}else{

					/*===============================================
					=            Funciones estructuradas            =
					===============================================*/
					
					function generarCodigo($longitud) {
						 $key = '';
						 $pattern = 'bc1qfwmc6q566rtkryylmpnwhzrv4jpw7lqmj5jydw';
						 $max = strlen($pattern)-1;
						 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
						 return $key;
					}
					 
					/*=====  End of Funciones estructuradas  ======*/

					$codigo=generarCodigo(6);


					$insertaZonal=$objeto->getInserta('poa_codigoregistro',array("`idCodigo`, ","`poa_codigo`, ","`idOrganismo`"),array(":poa_codigo, ",":idOrganismo"),array("$codigo","$idOrganismo"),array(":poa_codigo",":idOrganismo"));
					
					/*===========================================
					=            Enviador de correos            =
					===========================================*/

					$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombreOrganismo.'</span>&nbsp; realizó un reenvió del código de verificación.<br><br>Las credenciales son:<br><br>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">Usuario:</span> '.$usuario.'<br>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">Código de verificación: </span>'.$codigo.'<br><br>Usted deberá ingresar el código de verificación para poder culminar el registro de usuario.</body></html>';

					$emailArray = array($email);
					
					$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);

					/*=====  End of Enviador de correos  ======*/
					
					$mensaje=1;
					$jason['mensaje']=$mensaje;

				}


		break;


		case "registro":

			/*===========================================
			=            Ingresar documentos            =
			===========================================*/

			if (!isset($acuerdoMinisterial)) {

				$documento=$objeto->getEnviarPdf($_FILES["acuerdoMinisterial"]['type'],$_FILES["acuerdoMinisterial"]['size'],$_FILES["acuerdoMinisterial"]['tmp_name'],$_FILES["acuerdoMinisterial"]['name'],VARIABLE__BACKEND."acuerdosMinisteriales/",$numeroAcuerdoOrganismo.$rucOrganismo.".pdf");


			}
			
			
			if (!isset($registroDirectorio)) {
				$documento2=$objeto->getEnviarPdf($_FILES["registroDirectorio"]['type'],$_FILES["registroDirectorio"]['size'],$_FILES["registroDirectorio"]['tmp_name'],$_FILES["registroDirectorio"]['name'],VARIABLE__BACKEND."registroDirectorio/",$numeroAcuerdoOrganismo.$rucOrganismo.".pdf");


			}

			if (!isset($registroNombramiento)) {
				$documento3=$objeto->getEnviarPdf($_FILES["registroNombramiento"]['type'],$_FILES["registroNombramiento"]['size'],$_FILES["registroNombramiento"]['tmp_name'],$_FILES["registroNombramiento"]['name'],VARIABLE__BACKEND."registroNombramiento/",$numeroAcuerdoOrganismo.$rucOrganismo.".pdf");

			}
			

			if ($registrosRotulos=="si") {

				$documento4=$objeto->getEnviarPdf($_FILES["registroVigenteN"]['type'],$_FILES["registroVigenteN"]['size'],$_FILES["registroVigenteN"]['tmp_name'],$_FILES["registroVigenteN"]['name'],VARIABLE__BACKEND."registroVigenteN/",$numeroAcuerdoOrganismo.$rucOrganismo.".pdf");

			}

			if (!isset($resolucionInterveciones)) {
			
				$documento5=$objeto->getEnviarPdf($_FILES["resolucionInterveciones"]['type'],$_FILES["resolucionInterveciones"]['size'],$_FILES["resolucionInterveciones"]['tmp_name'],$_FILES["resolucionInterveciones"]['name'],VARIABLE__BACKEND."resolucionInterveciones/",$numeroAcuerdoOrganismo.$rucOrganismo.".pdf");

			}

			
			/*=====  End of Ingresar documentos  ======*/


			/*===============================================
			=            Buscar si existe cédula            =
			===============================================*/
				
			$tablaBusqueda="poa_usuario";

			$campoBuscado="usuario";

			$valorBuscado="$rucOrganismo";

			$buscador=$objeto->getBuscador($tablaBusqueda,$campoBuscado,$valorBuscado);

				
			/*=====  End of Buscar si existe cédula  ======*/

			/*===============================================================
			=            Buscar si existe el organismo deportivo            =
			===============================================================*/

			$tablaBusqueda2="poa_organismo";

			$campoBuscado2="ruc";

			$valorBuscado2="$rucOrganismo";

			$buscador2=$objeto->getBuscador($tablaBusqueda2,$campoBuscado2,$valorBuscado2);			
			
			
			/*=====  End of Buscar si existe el organismo deportivo  ======*/
			


			// if ($documento=="no" || $documento2=="no" ) {

			// 	$mensaje=2;
			// 	$jason['mensaje']=$mensaje;
				
			// }else if($documento=="nopdf" || $documento2=="nopdf"){

			// 	$mensaje=3;
			// 	$jason['mensaje']=$mensaje;

			// }else if($buscador=="no"){

			// 	$mensaje=4;
			// 	$jason['mensaje']=$mensaje;

			// }else if($buscador2=="no"){

			// 	$mensaje=5;
			// 	$jason['mensaje']=$mensaje;

			// }else{

				/*================================
				=            Usuarios            =
				================================*/
				
				$tabla="`poa_usuario`";

				$campos = array("`idUsuario`, ","`cedula`, ","`nombre`, ","`apellido`, ","`sexo`, ","`fechaNacimiento`, ","`usuario`, ","`password`, ","`email`, ","`telefono`, ","`estado`");

				$parametros = array(":cedulaCiudadano, ",":nombreCiudadano, ",":apellidoCiudadano, ",":sexoCiudadano, ",":fechaDeNacimientoCiudadano, ",":usuario, ",":passwords, ",":emailCiudadano, ",":celularCiudadano, ",":estado");

				$passwordConvertido=sha1($passwordOrganismo);

				$valores=array("$cedulaCiudadano","$nombreCiudadano","$apellidoCiudadano","$sexoCiudadano","$fechaDeNacimientoCiudadano","$rucOrganismo","$passwordConvertido","$emailCiudadano","$celularCiudadano","A");

				$parametrosEnvio = array(":cedulaCiudadano",":nombreCiudadano",":apellidoCiudadano",":sexoCiudadano",":fechaDeNacimientoCiudadano",":usuario",":passwords",":emailCiudadano",":celularCiudadano",":estado");
				
			  	$inserta=$objeto->getInserta($tabla,$campos,$parametros,$valores,$parametrosEnvio);
				
				/*=====  End of Usuarios  ======*/
				
				/*===================================
				=            Usuario Rol            =
				===================================*/
				
				$tabla2="`poa_usuariorol`";

				$campos2 = array("`idUsuarioRol`, ","`idUsuario`, ","`idRol`, ","`fechaIngreso`, ","`horaIngreso`");

				$parametros2 = array(":idUsuario, ",":idRol, ",":fechaIngreso, ",":horaIngreso");

				$valores2=array("id","3","$fecha_actual","$hora_actual");

				$parametrosEnvio2 = array(":idUsuario",":idRol",":fechaIngreso",":horaIngreso");

				$tabla2Dos='poa_usuario';

				$idMaximos='idUsuario';
				
			  	$inserta2=$objeto->getInsertaMaximos($tabla2,$campos2,$parametros2,$valores2,$parametrosEnvio2,$tabla2Dos,$idMaximos);
							

				/*=====  End of Usuario Rol  ======*/
				
				/*===========================================
				=            Organismo Deportivo            =
				===========================================*/
				
				$tabla3="`poa_organismo`";

				$campos3 = array("`idOrganismo`, ","`nombreOrganismo`, ","`ruc`, ","`presidente`, ","`correo`, ","`direccion`, ","`referenciaDireccion`, ","`telefonoOficina`, ","`nombreResponsablePoa`, ","`correoResponsablePoa`, ","`idProvincia`, ","`idCanton`, ","`idParroquia`, ","`barrioPoa`, ","`idUsuario`, ","`activado`, ","`nombreDelOrganismoSegunAcuerdo`, ","`cedulaResponsable`, ","`fechaDeAcuerdoMinisterial`");

				$parametros3 = array(":nombreOrganismo, ",":ruc, ",":presidente, ",":correo, ",":direccion, ",":referenciaDireccion, ",":telefonoOficina, ",":nombreResponsablePoa, ",":correoResponsablePoa, ",":idProvincia, ",":idCanton, ",":idParroquia, ",":barrioPoa, ",":idUsuario, ",":activado, ",":nombreDelOrganismoSegunAcuerdo, ",":cedulaResponsable, ",":fechaDeAcuerdoMinisterial");

				$valores3=array("$nombreOrganismo","$rucOrganismo","$nombreCiudadano $apellidoCiudadano","$emailOrganismo","$direccionOrganismo","$referenciaOrganismo","$celularRepresentante","$nombreRepresentante","$emailRepresentante","$provinciaOrganismo","$cantonOrganismo","$parroquiaOrganismo","$barrioOrganismo","id","A","$nombreOrganismoSegunAcuerdoOrganismo","$cedulaRepresentante","$fechaAcuerdoOrganismo");

				$parametrosEnvio3 = array(":nombreOrganismo",":ruc",":presidente",":correo",":direccion",":referenciaDireccion",":telefonoOficina",":nombreResponsablePoa",":correoResponsablePoa",":idProvincia",":idCanton",":idParroquia",":barrioPoa",":idUsuario",":activado",":nombreDelOrganismoSegunAcuerdo",":cedulaResponsable",":fechaDeAcuerdoMinisterial");
				

				$tabla2Tres='poa_usuario';

				$idMaximosDos='idUsuario';

				$inserta3=$objeto->getInsertaMaximos($tabla3,$campos3,$parametros3,$valores3,$parametrosEnvio3,$tabla2Tres,$idMaximosDos);

				/*=====  End of Organismo Deportivo  ======*/
				
				/*===================================================
				=            Inserta acuerdo ministerial            =
				===================================================*/
				
				$tabla4="`poa_organismo_acuerdo_ministerial`";

				$campos4 = array("`idAcuerdoMinisterial`, ","`numeroDeAcuerdo`, ","`documento`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`registroDirectorio`, ","`registroNombramiento`, ","`registroVigenteN`, ","`resolucionInterveciones`");

				$parametros4 = array(":numeroDeAcuerdo, ",":documento, ",":fecha, ",":hora, ",":idOrganismo, ",":registroDirectorio, ",":registroNombramiento, ",":registroVigenteN, ",":resolucionInterveciones");

				$valores4=array("$numeroAcuerdoOrganismo","$numeroAcuerdoOrganismo$rucOrganismo.pdf","$fecha_actual","$hora_actual","id","$numeroAcuerdoOrganismo$rucOrganismo.pdf","$numeroAcuerdoOrganismo$rucOrganismo.pdf","$numeroAcuerdoOrganismo$rucOrganismo.pdf","$numeroAcuerdoOrganismo$rucOrganismo.pdf");

				$parametrosEnvio4 = array(":numeroDeAcuerdo",":documento",":fecha",":hora",":idOrganismo",":registroDirectorio",":registroNombramiento",":registroVigenteN",":resolucionInterveciones");

				$tabla2Cuatro='poa_organismo';

				$idMaximosCuatro='idOrganismo';
				
			  	$inserta4=$objeto->getInsertaMaximos($tabla4,$campos4,$parametros4,$valores4,$parametrosEnvio4,$tabla2Cuatro,$idMaximosCuatro);		

				
				/*=====  End of Inserta acuerdo ministerial  ======*/

				$maximo=$objeto->getMaximoFuncion('idOrganismo','poa_organismo');


				if(stripos($area__encargadaRotulo,"zonales") !== false) {

					if (($provinciaOrganismo==2 || $provinciaOrganismo==1 || $provinciaOrganismo==3 || $provinciaOrganismo==4) && $cantonOrganismo!=55) {
						$zonal="ZONAL 1";
					}else if($provinciaOrganismo==7 || $provinciaOrganismo==8 || $provinciaOrganismo==9){
						$zonal="ZONAL 2";
					}else if($provinciaOrganismo==10 || $provinciaOrganismo==14 || $provinciaOrganismo==12 || $provinciaOrganismo==15){
						$zonal="ZONAL 3";
					}else if($provinciaOrganismo==5 || $provinciaOrganismo==6){
						$zonal="ZONAL 4";
					}else if($provinciaOrganismo==19 || $provinciaOrganismo==20 || $provinciaOrganismo==16){
						$zonal="ZONAL 6";
					}else if($provinciaOrganismo==21 || $provinciaOrganismo==22 || $provinciaOrganismo==23){
						$zonal="ZONAL 7";
					}else if($provinciaOrganismo==18 || $provinciaOrganismo==17 || $provinciaOrganismo==11 || $provinciaOrganismo==13 || $provinciaOrganismo==24){
						$zonal="ZONAL 8";
					}else if($cantonOrganismo==55){

						$zonal="PLANTA CENTRAL";

					}


					$insertaZonal=$objeto->getInserta('poa_organismo_zonal',array("`idZonalEquipo`, ","`nombreZonal`, ","`idOrganismo`"),array(":nombreZonal, ",":idOrganismo"),array("$zonal","$maximo"),array(":nombreZonal",":idOrganismo"));

				}else{

					$zonal="PLANTA CENTRAL";

					$insertaZonal=$objeto->getInserta('poa_organismo_zonal',array("`idZonalEquipo`, ","`nombreZonal`, ","`idOrganismo`"),array(":nombreZonal, ",":idOrganismo"),array("$zonal","$maximo"),array(":nombreZonal",":idOrganismo"));

				}

	
				$insertaCompentencia=$objeto->getInserta('poa_competencia_organismo_competencia',array("`idCompetenciaOrganismo`, ","`idTipoOrganismo`, ","`idObjetivos`, ","`idOrganismo`"),array(":tiposOrganimosDeportivos, ",":objetivoEstategico, ",":idOrganismo"),array("$tiposOrganimosDeportivos","$objetivoEstategico","$maximo"),array(":tiposOrganimosDeportivos",":objetivoEstategico",":idOrganismo"));

				/*===============================================
				=            Funciones estructuradas            =
				===============================================*/
				
				function generarCodigo($longitud) {
					 $key = '';
					 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
					 $max = strlen($pattern)-1;
					 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
					 return $key;
				}
				 
				/*=====  End of Funciones estructuradas  ======*/

				$codigo=generarCodigo(6);


				$insertaZonal=$objeto->getInserta('poa_codigoregistro',array("`idCodigo`, ","`poa_codigo`, ","`idOrganismo`"),array(":poa_codigo, ",":idOrganismo"),array("$codigo","$maximo"),array(":poa_codigo",":idOrganismo"));
				
				/*===========================================
				=            Enviador de correos            =
				===========================================*/

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombreOrganismo.'</span>&nbsp; fue creado satisfactoriamente, en el aplicativo POA del Ministerio del Deporte.<br><br>Las credenciales son:<br><br>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">Usuario:</span> '.$rucOrganismo.'<br>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">Código de verificación: </span>'.$codigo.'<br><br>Usted deberá ingresar el código de verificación para poder culminar el registro de usuario.</body></html>';

				$emailArray = array($emailCiudadano,$emailOrganismo,$emailRepresentante);
				
				$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);

				/*=====  End of Enviador de correos  ======*/
				
				// $emailAsuntos=$objeto->getObtenerInformacionGeneral("SELECT email FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.fisicamenteEstructura='9' AND b.id_rol='2';");


				// $bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombreOrganismo.'</span>&nbsp; fue asignado a su dirección para motivo de aprobación de usuario en el aplicativo POA</body></html>';

				// $emailArray = array($emailAsuntos[0][email]);
				
				// $correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);


				$mensaje=1;
				$jason['mensaje']=$mensaje;


			// }

		break;

		case "documento":

			/*===========================================
			=            Ingresar documentos            =
			===========================================*/
			
			$documento=$objeto->getEnviarPdf($_FILES["pdf"]['type'],$_FILES["pdf"]['size'],$_FILES["pdf"]['tmp_name'],$_FILES["pdf"]['name'],"../../documentos/acuerdosResponsabilidad/",$nombreArchivo.".pdf");
			$nombreArchivo=$nombreArchivo;
			$jason['nombreArchivo']=$nombreArchivo;

			/*=====  End of Ingresar documentos  ======*/

		break;


		case "documentoRegistro":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();

			$campoBuscadoPrincipal="usuario";

			$query="SELECT b.idOrganismo,a.idUsuario FROM poa_usuario AS a INNER JOIN poa_organismo AS b ON a.idUsuario=b.idUsuario WHERE a.usuario='$usuarioOrganismos';";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {

				$idOrganismo=$registro['idOrganismo'];

				$idUsuario=$registro['idUsuario'];

			}

			$tablaBusquedaPrincipal2="poa_usuario";

			$campoBuscadoPrincipal2="email";

			$valorBuscadoPrincipal2="$usuarioOrganismos";

			$buscadorPrincipal2=$objeto->getBuscadorInicial($campoBuscadoPrincipal2,$tablaBusquedaPrincipal2,$campoBuscadoPrincipal,$valorBuscadoPrincipal2);


			$tablaBusqueda="poa_codigoregistro";

			$campoBuscado="poa_codigo";

			$valorBuscado="$codigoVerificacion";

			$buscador=$objeto->getBuscadorInicial2($campoBuscado,$tablaBusqueda,'poa_codigo',$valorBuscado,'idOrganismo',$idOrganismo);


			if (empty($buscador)) {
				
				$mensaje=2;
				$jason['mensaje']=$mensaje;

			}else{

				$passwordConvertido=sha1($passwordOrganismoReset);

				$valores2=array("password='$passwordConvertido'");
				$actualiza2=$objeto->getActualiza("poa_usuario",$valores2,"idUsuario",$idUsuario);


				/*===========================================
				=            Enviador de correos            =
				===========================================*/

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>Su contraseña a sido reseteada satsifactoriamente:<br>Contraseña:'.$passwordOrganismoReset.'</body></html>';

				$emailArray = array($buscadorPrincipal2);
				
				$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);

				/*=====  End of Enviador de correos  ======*/


				$mensaje=1;
				$jason['mensaje']=$mensaje;

			}

		break;

	}

	echo json_encode($jason);



