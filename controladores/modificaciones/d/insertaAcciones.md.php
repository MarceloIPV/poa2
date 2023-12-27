<?php
	
	extract($_POST);

	require_once "../../config/config2.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	

	$hora_actual2= date('s');
	

	$hora__dos=date('H:i');

	$anioa=date('Y');

	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$query="UPDATE poa_trimestrales SET estadoI='$selects__superiores',estadoIR=NULL WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$query="UPDATE poa_trimestrales SET estado='$selects__superiores',estadoR=NULL WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__infras__59":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='15' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
	 		$idVarEnvios=$usuarioEnvios[0][id_usuario];


	 		$query="UPDATE poa_trimestrales SET estadoIR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
	 		$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		if ($tipos__nomenclaturas=="ALTO RENDIMIENTO") {
	 			
	 			$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	 		}else{

	 			$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	 		}


	 		$idVarEnvios=$usuarioEnvios[0][id_usuario];


	 		if ($tipos__nomenclaturas=="ALTO RENDIMIENTO") {
	 			
	 			$query="UPDATE poa_trimestrales SET estadoAlR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoFR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}

	 		$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "recomienda__recomendado__seguimientos__f__r":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		if ($idRol==4 || $idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

	 			$query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`"),array("'$idUsuarios', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo'"));

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoFR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;




		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 				
			$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

			$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

	 		$query="UPDATE poa_trimestrales SET estadoIR='T' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "recomienda__recomendado__seguimientos__infrases":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$nombre__archivo=$organismoOculto__modal."__".$idUsuarios."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuarios';");

			$super__var=$superior__inmediatos[0][PersonaACargo];

	 				
			$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

			$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

	 		$query="UPDATE poa_trimestrales SET estadoI='T',estadoIR='$super__var' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`tipoE`, ","`documentoInfras`"),array("'$idUsuarios', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'INFRA', ","'$nombre__archivo'"));

	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		if ($idRol==4 || $idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

	 			$query="UPDATE poa_trimestrales SET estadoAlR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`"),array("'$idUsuarios', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo'"));

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoAlR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "regreso__recomendado__seguimientos__r__f":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();		

	 		if ($idRol==7) {
	 					
	 			$query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoF='$selects__superiores',estadoFR=NULL WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}
	 			
	 		$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "regreso__recomendado__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();		

	 		if ($idRol==7) {
	 					
	 			$query="UPDATE poa_trimestrales SET estadoAlR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoAl='$selects__superiores',estadoAlR=NULL WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

	 		}
	 			
	 		$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "recomendacion__tecnicos__aanalistas__seguimientos":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$nombre__archivo=$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUSeguimientos';");

			$super__var=$superior__inmediatos[0][PersonaACargo];

			$direccion1=VARIABLE__BACKEND."seguimiento/informesSeguimientos/";

			$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);	
			
			$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico_seguimientos', array("`idSeguimientosRecomendadosTe`, ","`esigeftArrays`, ","`porcentajeEsigeftArrays`, ","`observaciones`, ","`recomendaciones`, ","`remanentes`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`documentos`"),array("'$arrayEsigefts', ","'$arrayPorcenEsigefts', ","'$observaciones__seguimientos__cuadros__pdf', ","'$recomendaciones__seguimientos__cuadros__pdf', ","'$monto__transferido__rema', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$nombre__archivo'"));


			$query4="UPDATE poa_trimestrales SET estado='T',estadoR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

			$resultado4= $conexionEstablecida->exec($query4);


			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`tipoE`"),array("'$idUSeguimientos', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'SEGUIMIENTO'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "recomendacion__tecnicos":

			$nombre__archivo=$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUSeguimientos';");

			$super__var=$superior__inmediatos[0][PersonaACargo];

			if ($rotulo__recomendado=="alto__rendimientos") {

				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","' ', ","' ', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","' ', ","' ', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","' ', ","' ', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","'$cumplimientos__tabla__alto', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado'"));

				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoAl='T',estadoAlR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
				$resultado= $conexionEstablecida->exec($query);
		

			}else if($rotulo__recomendado=="formativo"){

				$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","'$beneficiarios__capa__de__eje__alto__meta', ","'$beneficiarios__even__prepa__de__eje__alto__meta', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","'$beneficiarios__capa__de__eje__alto__resultado', ","'$beneficiarios__even__prepa__de__eje__alto__resultado', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","'$porcentaje__c__beneficiarios__capa__de__e__alto', ","'$porcentaje__c__even__prepa__capa__de__e__alto', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoF='T',estadoFR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
				$resultado= $conexionEstablecida->exec($query);

			}else{

				$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","' ', ","' ', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","' ', ","' ', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","' ', ","' ', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$hombres__alto', ","'$mujeres__alto', ","'$personas__con__discapacidad__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","' ', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoF='T',estadoFR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";
				$resultado= $conexionEstablecida->exec($query);

			}
			
			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`"),array("'$idUSeguimientos', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__analistas__reasignar__seguimientos__ac__fisicas__in":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estadoI='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "informacion__analistas__reasignar__seguimientos__ac__fisicas":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estadoF='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__analistas__reasignar__seguimientos__altos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estadoAl='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND YEAR(fecha)='$anioa';";

			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "informacion__analistas__reasignar__seguimientos":


			$valores2=array("estado='$selects__superiores'");
			$actualiza2=$objeto->getActualiza("poa_trimestrales",$valores2,"idOrganismo",$organismoOculto__modal);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "ingreso__modificaciones__2022":


			$inserta=$objeto->getInsertaNormal('poa_modificacion_2022', array("`idModificacion`, ","`idOrganismo`, ","`fecha`, ","`hora`"),array("'$idOrganismos', ","'$fecha_actual', ","'$hora_actual'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "guardar__mes__organismo__sueldos":


			$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__".$mesPla.".pdf";

			$direccion1=VARIABLE__BACKEND."seguimiento/planilla/";
			$direccion2=VARIABLE__BACKEND."seguimiento/rol/";
			$direccion3=VARIABLE__BACKEND."seguimiento/comprobante/";


			$documento=$objeto->getEnviarPdf($_FILES["planilla__iess"]['type'],$_FILES["planilla__iess"]['size'],$_FILES["planilla__iess"]['tmp_name'],$_FILES["planilla__iess"]['name'],$direccion1,$nombre__archivo);
			$documento=$objeto->getEnviarPdf($_FILES["rol__de__pagos"]['type'],$_FILES["rol__de__pagos"]['size'],$_FILES["rol__de__pagos"]['tmp_name'],$_FILES["rol__de__pagos"]['name'],$direccion2,$nombre__archivo);
			$documento=$objeto->getEnviarPdf($_FILES["comprobante__pagos"]['type'],$_FILES["comprobante__pagos"]['size'],$_FILES["comprobante__pagos"]['tmp_name'],$_FILES["comprobante__pagos"]['name'],$direccion3,$nombre__archivo);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento__comprobante', array("`idComprobante__general`, ","`idOrganismo`, ","`planilla`, ","`rol`, ","`comprobante`, ","`mes`, ","`fecha`, ","`hora`, ","`trimestre`"),array("'$idOrganismo', ","'$nombre__archivo', ","'$nombre__archivo', ","'$nombre__archivo', ","'$mesPla', ","'$fecha_actual', ","'$hora_actual', ","'$trimestre'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__fechas__modificaciones":


			$inserta=$objeto->getInsertaNormal('poa_modificacion__fechas', array("`idModificacionesFechas`, ","`fechaInicioM`, ","`fechaFinM`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`trimestre`"),array("'$fechaI', ","'$fechaF', ","'$idUsuario', ","'$fecha_actual', ","'$hora_actual', ","'$trimestre'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "indicadores__modificas__exceles":


			$idActividad__array__codigo = json_decode($idActividad__array__codigo);
			$primer__trimestre__array = json_decode($primer__trimestre__array);
			$segundo__trimestre__array = json_decode($segundo__trimestre__array);
			$tercer__trimestre__array = json_decode($tercer__trimestre__array);
			$cuarto__trimestre__array = json_decode($cuarto__trimestre__array);
			$meta__trimestre__array = json_decode($meta__trimestre__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();
		
 			$query="DELETE FROM poa_poainicial WHERE idOrganismo='$idOrganismo' AND modifica='A'";
			$resultado= $conexionEstablecida->exec($query);


			for($i=0;$i<count($idActividad__array__codigo);$i++){

				$inserta=$objeto->getInsertaNormal('poa_poainicial', array("`idPoaEnviado`, ","`primertrimestre`, ","`segundotrimestre`, ","`tercertrimestre`, ","`cuartotrimestre`, ","`metaindicador`, ","`fecha`, ","`idActividad`, ","`idOrganismo`, ","`modifica`"),array("'$primer__trimestre__array[$i]', ","'$segundo__trimestre__array[$i]', ","'$tercer__trimestre__array[$i]', ","'$cuarto__trimestre__array[$i]', ","'$meta__trimestre__array[$i]', ","'$fecha_actual', ","'$idActividad__array__codigo[$i]', ","'$idOrganismo', ","'A'"));


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "poa__suministros__guardados":

			$tipo__array = json_decode($tipo__array);
			$nombre__array = json_decode($nombre__array);
			$luz__array = json_decode($luz__array);
			$agua__array = json_decode($agua__array);


			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();
		

			$query="DELETE a.* FROM poa_suministros AS a INNER JOIN poa_suministrosn AS b ON a.idSuministros=b.idSumi WHERE b.idOrganismo='$idOrganismo' AND b.modifica='A';";
			$resultado= $conexionEstablecida->exec($query);

 			$query="DELETE FROM poa_suministrosn WHERE idOrganismo='$idOrganismo' AND modifica='A'";
			$resultado= $conexionEstablecida->exec($query);

			for($i=0;$i<count($tipo__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_suministrosn', array("`idSumi`, ","`tipo`, ","`nombreEscenario`, ","`idOrganismo`, ","`fecha`, ","`modifica`"),array("'$tipo__array[$i]', ","'$nombre__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A'"));


				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idSumi) AS maximo FROM poa_suministrosn;");

				$maximo=$maximoProgramacion__financiera[0][maximo];

				$inserta=$objeto->getInsertaNormal('poa_suministros', array("`idSuministros`, ","`luz`, ","`agua`, ","`idSumiN`"),array("'$luz__array[$i]', ","'$agua__array[$i]', ","'$maximo'"));

			}
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		


		break;

		case  "poa__general__guardados":

			$idActividad__array = json_decode($idActividad__array);
			$idItem__array = json_decode($idItem__array);

			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);

			$elimina=$objeto->getElimina('poa_programacion_financiera_dos','idOrganismo',$idOrganismo);

			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera_dos', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A', ","'$idItem__array[$i]', ","'$idActividad__array[$i]'"));

			}
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		


		break;


		case  "deportivas__modificas__exceles":

			$codigo__financiero__array = json_decode($codigo__financiero__array);
			$tipo__financiamiento_array = json_decode($tipo__financiamiento_array);
			$evento__array = json_decode($evento__array);
			$deporte__array = json_decode($deporte__array);
			$provincia__array = json_decode($provincia__array);
			$pais__array = json_decode($pais__array);
			$alcance__array = json_decode($alcance__array);
			$fecha__inicio__array = json_decode($fecha__inicio__array);
			$fecha__fin__array = json_decode($fecha__fin__array);
			$genero__array = json_decode($genero__array);
			$categoria__array = json_decode($categoria__array);
			$numero__entrenadores__array = json_decode($numero__entrenadores__array);
			$numero__atletas__array = json_decode($numero__atletas__array);
			$total__array__beneficiarios = json_decode($total__array__beneficiarios);
			$beneficiarios__array = json_decode($beneficiarios__array);
			$beneficiarios2__array = json_decode($beneficiarios2__array);
			$justificacion__array = json_decode($justificacion__array);
			$cantidad__bienes__array = json_decode($cantidad__bienes__array);
			$detalle__adquisicion__array = json_decode($detalle__adquisicion__array);


			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();
		
 			$query="DELETE FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND modifica='A' AND idActividad='$idActividad__escogidas';";
			$resultado= $conexionEstablecida->exec($query);


 			$query2="DELETE b.* FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idOrganismo='$idOrganismo' AND b.modifica='A' AND a.idActividad='$idActividad__escogidas';";
			$resultado2= $conexionEstablecida->exec($query2);

			for($i=0;$i<count($codigo__financiero__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'B', ","'$codigo__financiero__array[$i]', ","'$idActividad__escogidas'"));

				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idProgramacionFinanciera) AS maximo FROM poa_programacion_financiera;");

				$maximo=$maximoProgramacion__financiera[0][maximo];

				$inserta2=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`fecha`, ","`modifica`, ","`detalleBien`"),array("'$tipo__financiamiento_array[$i]', ","'$evento__array[$i]', ","'$deporte__array[$i]', ","'$provincia__array[$i]', ","'$pais__array[$i]', ","'$alcance__array[$i]', ","'$fecha__inicio__array[$i]', ","'$fecha__fin__array[$i]', ","'$genero__array[$i]', ","'$categoria__array[$i]', ","'$numero__entrenadores__array[$i]', ","'$numero__atletas__array[$i]', ","'$total__array__beneficiarios[$i]', ","'$beneficiarios__array[$i]', ","'$beneficiarios2__array[$i]', ","'$justificacion__array[$i]', ","'$cantidad__bienes__array[$i]', ","'$maximo', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$fecha_actual', ","'A', ","'$detalle__adquisicion__array[$i]'"));


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "administrativo__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$justificacion__array = json_decode($justificacion__array);
			$cantidad__array = json_decode($cantidad__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);
		
			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();

 			$query="DELETE FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND modifica='A';";
			$resultado= $conexionEstablecida->exec($query);


 			$query2="DELETE b.* FROM poa_programacion_financiera AS a INNER JOIN poa_actividadesadministrativas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idOrganismo='$idOrganismo' AND b.modifica='A';";
 			$resultado2= $conexionEstablecida->exec($query2);

			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'B', ","'$idActividad__array[$i]', ","'1'"));

				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idProgramacionFinanciera) AS maximo FROM poa_programacion_financiera;");

				$maximo=$maximoProgramacion__financiera[0][maximo];


				$inserta2=$objeto->getInsertaNormal('poa_actividadesadministrativas', array("`idActividadAd`, ","`justificacionActividad`, ","`cantidadBien`, ","`idProgramacionFinanciera`, ","`fecha`, ","`modifica`"),array("'$justificacion__array[$i]', ","'$cantidad__array[$i]', ","'$maximo', ","'$fecha_actual', ","'A'"));


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;



		case  "mantenimiento__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$nombreInfra__array = json_decode($nombreInfra__array);
			$provincia__codigo__array = json_decode($provincia__codigo__array);
			$direccion__array = json_decode($direccion__array);
			$estado__array = json_decode($estado__array);
			$tipoRecursos__array = json_decode($tipoRecursos__array);
			$tipoIntervencion__array = json_decode($tipoIntervencion__array);
			$detallarTipo__intervencion__array = json_decode($detallarTipo__intervencion__array);
			$tipoMantenimiento__array = json_decode($tipoMantenimiento__array);
			$materiales__servicios__array = json_decode($materiales__servicios__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query="DELETE FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND modifica='A';";
			$resultado= $conexionEstablecida->exec($query);


 			$query2="DELETE b.* FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idOrganismo='$idOrganismo' AND b.modifica='A';";
 			$resultado2= $conexionEstablecida->exec($query2);


			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'B', ","'$idActividad__array[$i]', ","'2'"));


				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idProgramacionFinanciera) AS maximo FROM poa_programacion_financiera;");

				$maximo=$maximoProgramacion__financiera[0][maximo];


				$inserta2=$objeto->getInsertaNormal('poa_mantenimiento', array("`idMantenimiento`, ","`nombreInfras`, ","`provincia`, ","`direccionCompleta`, ","`estado`, ","`tipoRecursos`, ","`tipoIntervencion`, ","`detallarTipoIn`, ","`tipoMantenimiento`, ","`materialesServicios`, ","`idProgramacionFinanciera`, ","`fecha`, ","`modifica`"),array("'$nombreInfra__array[$i]', ","'$provincia__codigo__array[$i]', ","'$direccion__array[$i]', ","'$estado__array[$i]', ","'$tipoRecursos__array[$i]', ","'$tipoIntervencion__array[$i]', ","'$detallarTipo__intervencion__array[$i]', ","'$tipoMantenimiento__array[$i]', ","'$materiales__servicios__array[$i]', ","'$maximo', ","'$fecha_actual', ","'A'"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "honorarios__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$cedula__array = json_decode($cedula__array);
			$nombres__array = json_decode($nombres__array);
			$cargo__array = json_decode($cargo__array);
			$honorario__mensual = json_decode($honorario__mensual);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query="DELETE FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND modifica='A';";
			$resultado= $conexionEstablecida->exec($query);



			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_honorarios2022', array("`idHonorarios`, ","`idActividad`, ","`cedula`, ","`nombres`, ","`cargo`, ","`honorarioMensual`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`modifica`"),array("'$idActividad__array[$i]', ","'$cedula__array[$i]', ","'$nombres__array[$i]', ","'$cargo__array[$i]', ","'$honorario__mensual[$i]', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A'"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;



		case  "sueldo__salario__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$cedula__array = json_decode($cedula__array);
			$cargo__array = json_decode($cargo__array);
			$nombres__array = json_decode($nombres__array);
			$tipoCargo__array = json_decode($tipoCargo__array);
			$tiempoTrabajo__array = json_decode($tiempoTrabajo__array);
			$sueldoSalario__array = json_decode($sueldoSalario__array);
			$aportePatronal__array = json_decode($aportePatronal__array);
			$decimoTercer__array = json_decode($decimoTercer__array);
			$mensualizaDecimoT__array = json_decode($mensualizaDecimoT__array);
			$decimoCuarto__array = json_decode($decimoCuarto__array);
			$mensualizaDecimoC__array = json_decode($mensualizaDecimoC__array);
			$fondosRe__array = json_decode($fondosRe__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);


			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query="DELETE FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND modifica='A';";
			$resultado= $conexionEstablecida->exec($query);



			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_sueldossalarios2022', array("`idSueldos`, ","`idActividad`, ","`cedula`, ","`cargo`, ","`nombres`, ","`tipoCargo`, ","`tiempoTrabajo`, ","`sueldoSalario`, ","`aportePatronal`, ","`decimoTercera`, ","`mensualizaTercera`, ","`decimoCuarta`, ","`menusalizaCuarta`, ","`fondosReserva`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`modifica`"),array("'$idActividad__array[$i]', ","'$cedula__array[$i]', ","'$cargo__array[$i]', ","'$nombres__array[$i]', ","'$tipoCargo__array[$i]', ","'$tiempoTrabajo__array[$i]', ","'$sueldoSalario__array[$i]', ","'$aportePatronal__array[$i]', ","'$decimoTercer__array[$i]', ","'$mensualizaDecimoT__array[$i]', ","'$decimoCuarto__array[$i]', ","'$mensualizaDecimoC__array[$i]', ","'$fondosRe__array[$i]', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A'"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "guardar__modificas__principal__act":

			$arrayInformacion = json_decode($parametros);
			echo $arrayInformacion ;

			if (strpos($nombre__justificacion, "documento seleccionado") !== false) {

				$nombre="N/A";
					
			}else{

				$nombre=$fecha_actual."__".$hora_actual2."__".$arrayInformacion[0]."pdf";
				$direccion1="../../documentos/modificacion/justifiacionActPrincipal/";
				$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre);
				
			}



			$inserta=$objeto->getInsertaNormal('poa_modificacion_organismo_actividades', array("`idModificacionOr`, ","`idOrganismo`, ","`actividadOrigen`, ","`idFinancieroOrigen`, ","`mesOrigen`, ","`montoAsignadoOrigen`, ","`disminucionOrigen`, ","`totalOrigen`, ","`actividadDestino`, ","`idFinancieroDestino`, ","`mesDestino`, ","`montoAsignadoDestino`, ","`aumentoDestino`, ","`totalDestino`, ","`fecha`, ","`hora`, ","`documentoJ`, ","`justificacion`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$actividad', ","'$item__modificaciones', ","'$mesesSeleccionables__destino', ","'$monto__seleccionados__destino', ","'$disminucion__seleccionados__destino', ","'$total__disminucion__destino', ","'$fecha_actual', ","'$hora_actual', ","'$nombre', ","'$justificacion'"));

			$mensaje=1;
			$jason['mensaje']=$arrayInformacion;		

		break;


		case  "guardar__modificas__director":

			$arrayInformacion = json_decode($parametros);

			$descripcion=filter_var($descripcion, FILTER_SANITIZE_MAGIC_QUOTES);

			$inserta=$objeto->getInsertaNormal('poa_modificacion_actividad_administra_origen', array("`idActividadModificacion`, ","`idActividadOrigen`, ","`idActividadDestino`, ","`idUsuario`, ","`idItem`, ","`fecha`, ","`hora`, ","`descripcion`, ","`estado`"),array("'$origen', ","'$destino', ","'$arrayInformacion[0]', ","'$permitido', ","'$fecha_actual', ","'$hora_actual', ","'$descripcion', ","'A'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "guardar__seguimiento__totales":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT correo,nombreOrganismo FROM poa_organismo WHERE idOrganismo='$organismoIdPrin';");

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_docuento_final WHERE idOrganismo='$organismoIdPrin' ORDER BY idDocumento_seguimiento DESC;");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_declaracion WHERE idOrganismo='$organismoIdPrin' ORDER BY idDeclaracion DESC LIMIT 1;");

			$indicadorInformacion4=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_esigef WHERE idOrganismo='$organismoIdPrin';");

			if (!empty($indicadorInformacion4[0][idOrganismo])) {
				$varEsi="si";
			}else{
				$varEsi="no";
			}


			/*=============================
			=            Email            =
			=============================*/
			

			if($trimestreEvaluador=="primerTrimestre") {
				$variableTrimestral="Primer Trimestre";
			}else if($trimestreEvaluador=="segundoTrimestre"){
				$variableTrimestral="Segundo Trimestre";
			}else if($trimestreEvaluador=="tercerTrimestre"){
				$variableTrimestral="Tercer Trimestre";
			}else if($trimestreEvaluador=="cuartoTrimestre"){
				$variableTrimestral="Cuarto Trimestre";
			}


			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Ministerio del Deporte, confirma que el día '.$fecha_actual.', a las '.$hora__dos.', fue recibida la información de seguimiento y evaluación al POA correspondiente a:<br><br><div style="font-weight;">Período:'.$variableTrimestral.' '.$anioa.'</div></body></html>';

			$emailArray = array($indicadorInformacion[0][correo]);

			$documentoE=$indicadorInformacion2[0][documento];

			$documentoE2=$indicadorInformacion3[0][documento];

			$correosEnviados=$objeto->getEnviarCorreo__atachmen($emailArray,$bodyMensaje,"../../documentos/final__seguimiento/$documentoE","../../documentos/declaracionTerminos/$documentoE2");

			$inserta=$objeto->getInsertaNormal('poa_trimestrales', array("`idEnviadorTrimestres`, ","`tipoTrimestre`, ","`fecha`, ","`idOrganismo`, ","`esigeft`"),array("'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$varEsi'"));	
			
			
			/*=====  End of Email  ======*/	

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "enviar__programaciones__seguimientos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_reporteria', array("`idSeguimientoFinanciero`, ","`programado`, ","`porcentaje`, ","`idProgramacionFinanciera`, ","`idOrganismo`, ","`trimestre`, ","`fecha`, ","`idItem`, ","`planificado`, ","`ejecutado`"),array("'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]'"));				

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "guardar__seguimiento__estados":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT llamada FROM poa_segimiento_confirmado WHERE idOrganismo='$organismoIdPrin' AND trimestre='$trimestreEvaluador';");


			if (!empty($indicadorInformacion[0][llamada])) {
			
				if ($indicadorInformacion[0][llamada]=='si') {
					$valores=array("llamada='no'");
				}else{
					$valores=array("llamada='si'");
				}

				$actualiza=$objeto->getActualiza__confirmado("poa_segimiento_confirmado",$valores,"idOrganismo",$organismoIdPrin,"trimestre",$trimestreEvaluador);


			}else{

				$inserta=$objeto->getInsertaNormal('poa_segimiento_confirmado', array("`idTipoLlamada`, ","`llamada`, ","`trimestre`, ","`fecha`, ","`idOrganismo`"),array("'si', ","'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin'"));				

			}

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT llamada FROM poa_segimiento_confirmado WHERE idOrganismo='$organismoIdPrin' AND trimestre='$trimestreEvaluador';");


			$llamada=$indicadorInformacion2[0][llamada];
			$jason['llamada']=$llamada;

		break;


		case  "autogestion__guardados":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_montos_autogestion', array("`idMontosAutoGestion`, ","`detalleAu`, ","`montoAu`, ","`bienSer`, ","`detalleDos`, ","`trimestre`, ","`fecha`, ","`idOrganismo`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$arrayInformacion[0]'"));	

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "autogestionDeportiva":


			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT idAutogestion,autogestion FROM poa_seguimiento_autogestion WHERE idOrganismo='$idOrganismos' AND trimestre='$trimestre';");
			$indicadorH=false;

			if (!empty($indicadorInformacion[0][idAutogestion])) {
			
				$indicadorH=true;

				$valores=array("autogestion='$autogestionSelect'");
				$actualiza=$objeto->getActualiza__confirmado("poa_seguimiento_autogestion",$valores,"idOrganismo",$idOrganismos,"trimestre",$trimestre);

			}else{

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_autogestion', array("`idAutogestion`, ","`autogestion`, ","`trimestre`, ","`fecha`, ","`hora`, ","`idOrganismo`"),array("'$autogestionSelect', ","'$trimestre', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismos'"));				

			}

			$autogestionV =$indicadorInformacion[0][autogestion];

			$jason['indicadorH']=$indicadorH;
			$jason['autogestionV']=$autogestionV;


		break;

		case  "implementacion__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosInstalaciones/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_instalaciones', array("`idOtrosInstalaciones`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "implementacion__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasImplementacion/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_instalaciones', array("`idFacturaInstalaciones`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "implementacion__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_implementacion', array("`idImplementacion`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "guardar__recreativo__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_recreativo_tecnico', array("`idCompetenciaSeguimiento`, ","`idAdministrativo`, ","`trimestre`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`fechaInicioP`, ","`fechaInicioEjecutado`, ","`fechaFinP`, ","`fechaFinEjecutado`, ","`tipoEvento`, ","`eventoTareaE`, ","`nivel`, ","`total`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[16]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;		

		case  "recreativo__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosRecreativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_recreativo', array("`idOtrosRecreativo`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "recreativo__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasRecreativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_recreativo', array("`idFacturaRecreativo`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "recreativo__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_recreativos', array("`idRecreativos`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "otros__recreativo__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otros__recreativos__tecnicos/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_recreativo_tecnicos', array("`idOtrosRT`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "otros__capacitacion__alto":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompentencia_alto/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia_alto', array("`idOtrosCompetenciasAltos`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "guardar__capacitacion__alto":

			// $inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_alto', array("`idCompetenciaAlto`, ","`idAdministrativo`, ","`trimestre`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`fechaInicioP`, ","`fechaInicioEjecutado`, ","`fechaFinP`, ","`fechaFinEjecutado`, ","`tipoEvento`, ","`eventoTareaE`, ","`nivel`, ","`total`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[16]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]'"));


			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_alto2', array("`idCompetenciaAltos`, ","`evento`, ","`predicionResultados`, ","`oro`, ","`plata`, ","`bronce`, ","`total`, ","`cuarOc`, ","`analisis`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`fecha1`, ","`fecha2`, ","`fecha3`, ","`fecha4` "),array("'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[16]', ","'$arrayInformacion[6]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$arrayInformacion[22]', ","'$arrayInformacion[23]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;

		break;		



		case  "eventos__resultados":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_resultados_alto', array("`idResultados`, ","`idPda`, ","`trimestre`, ","`idOrganismo`, ","`deportes`, ","`modalidad`, ","`tipoPrueba`, ","`marcaAlcanzada`, ","`convocatoriaJuegos`, ","`genero`, ","`categoriaDeportiva`, ","`nombres`, ","`apellidos`, ","`provinciaRe`, ","`fecha`, ","`hora`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$fecha_actual', ","'$hora_actual'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__capacitacion__formativos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompentencia_formativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia_formativos', array("`idOtrosCompetenciasTecnicas`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "guardar__capacitacion__formativos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_formativo', array("`idCompetenciaFormativo`, ","`evento`, ","`predicionResultados`, ","`oro`, ","`plata`, ","`bronce`, ","`total`, ","`cuarOc`, ","`analisis`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`fecha1`, ","`fecha2`, ","`fecha3`, ","`fecha4` "),array("'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[16]', ","'$arrayInformacion[6]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$arrayInformacion[22]', ","'$arrayInformacion[23]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;		


		case  "competencias__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompetencia/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia', array("`idOtrosCompetencia`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "competencias__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasCompetencias/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_competencia', array("`idFacturaCompetencia`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "competencias__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_competencias', array("`idCompetencias`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__capacitacion__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCpacitacion_tecnico/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_capacitacion_tecnico', array("`idOtrosCapacitacionTecnico`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "guardar__capacitacion__tecnicos":

			$arrayInformacion = json_decode($parametros);

			if (empty($arrayInformacion[3])) {
				$arrayInformacion[3]='1990/09/18';
			}


			if (empty($arrayInformacion[4])) {
				$arrayInformacion[4]='1990/09/18';
			}

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_capacitacion_tecnico', array("`idCapacitacionTec`, ","`planificadoInicial`, ","`ejecutadoInicial`, ","`planificadoFinal`, ","`ejectuadoFinal`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[6]', ","'$arrayInformacion[0]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "capacitacion__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCapacitacion/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_capacitacion', array("`idOtrosCapacitacion`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "capacitacion__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasCapacitacion/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_capacitacion', array("`idFacturaCapacitacion`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "capacitacion__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_capacitacion', array("`idCapacitacion`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "filaIndicadora__administra":

			$arrayInformacion = json_decode($parametros);

			if (empty($arrayInformacion[3])) {
				$arrayInformacion[3]='1990/09/18';
			}


			if (empty($arrayInformacion[4])) {
				$arrayInformacion[4]='1990/09/18';
			}

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_mantenimiento_tecnico', array("`idMantenimientoTec`, ","`planificadoInicial`, ","`ejecutadoInicial`, ","`planificadoFinal`, ","`ejectuadoFinal`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[6]', ","'$arrayInformacion[0]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__mantenimientos__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosMantenimiento__tecnicos/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_mantenimiento_tecnico', array("`idOtrosMantenimientoTecnico`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "mantenimiento__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_mantenimiento', array("`idMantenimiento`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "mantenimiento__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosMantenimiento/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_mantenimiento', array("`idOtrosMantenimiento`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "mantenimiento__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasMantenimiento/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_mantenimiento', array("`idFacturaMantenimiento`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "esigef":

			$inserta=$objeto->getInsertaNormal('poa_esigef', array("`idEsigef`, ","`idOrganismo`, ","`idUsuario`, ","`activo`, ","`fecha`"),array("'$organismosSegumiento', ","'$idUsuarioC', ","'A', ","'$fecha_actual'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "otros__administrativas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_administrativos', array("`idOtrosAdministrativos`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "facturas__administrativas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_administrativo', array("`idFacturaAdministrativos`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "administrativos__seguimientos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";
			$direccion2=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

			if (isset($archivo1)) {

				$nombre__archivo1="no";

			}else{

				$nombre__archivo1=$fecha_actual."__".$arrayInformacion[3]."__".$hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);

			}

			if (isset($archivo2)) {
				
				$nombre__archivo2="no";

			}else{

				$nombre__archivo2=$fecha_actual."__".$arrayInformacion[3]."__".$hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["archivo2"]['type'],$_FILES["archivo2"]['size'],$_FILES["archivo2"]['tmp_name'],$_FILES["archivo2"]['name'],$direccion2,$nombre__archivo2);

			}



			$inserta=$objeto->getInsertaNormal('poa_seguimiento_administrativo', array("`idAdministrativoSegui`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`factura`, ","`otrosHabilitantes`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo1', ","'$nombre__archivo2', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "honorarios__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosHonorarios/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_honorarios', array("`idOtrosHonorarios`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "honorarios__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasHonorarios/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_honorarios', array("`idFacturaHonorarios`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "honorarios__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_honorarios', array("`idHonorariosSeguimientos`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idHonorarios`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case  "editar__indicadores":

			$arrayInformacion = json_decode($parametros);

			if ($archivo2!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

				$valores2=array("factura='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza("poa_seguimiento_administrativo",$valores2,"idAdministrativoSegui",$arrayInformacion[0]);

			}


			if ($archivo4!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo3"]['type'],$_FILES["archivo3"]['size'],$_FILES["archivo3"]['tmp_name'],$_FILES["archivo3"]['name'],$direccion,$nombre__archivo);

				$valores2=array("otrosHabilitantes='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza("poa_seguimiento_administrativo",$valores2,"idAdministrativoSegui",$arrayInformacion[0]);
				
			}

			$valores=array("mensualEjecutado='$arrayInformacion[1]'");

			$actualiza=$objeto->getActualiza("poa_seguimiento_administrativo",$valores,"idAdministrativoSegui",$arrayInformacion[0]);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;




		case  "editar__honorarios":

			$arrayInformacion = json_decode($parametros);

			if ($archivo2!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/facturas/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

				$valores2=array("facturas='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0]);

			}


			if ($archivo4!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/cheques/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo3"]['type'],$_FILES["archivo3"]['size'],$_FILES["archivo3"]['tmp_name'],$_FILES["archivo3"]['name'],$direccion,$nombre__archivo);

				$valores2=array("cheques='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0]);
				
			}

			if ($archivo6!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/ruc/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo5"]['type'],$_FILES["archivo5"]['size'],$_FILES["archivo5"]['tmp_name'],$_FILES["archivo5"]['name'],$direccion,$nombre__archivo);

				$valores2=array("ruc='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0]);
				
			}

			if ($archivo8!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/otrosHabilitantes/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo7"]['type'],$_FILES["archivo7"]['size'],$_FILES["archivo7"]['tmp_name'],$_FILES["archivo7"]['name'],$direccion,$nombre__archivo);

				$valores2=array("otrosHabilitantes='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0]);
				
			}


			$valores=array("mensualEjectuado='$arrayInformacion[1]'");

			$actualiza=$objeto->getActualiza("poa_seguimiento_honorarios",$valores,"idHonorariosSeguimientos",$arrayInformacion[0]);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "editar__sueldos__salarios":

			$arrayInformacion = json_decode($parametros);

			$valores=array("sueldoSalarioEjecutado='$arrayInformacion[1]',aporteIessEjecutado='$arrayInformacion[2]',decimoTerceroEjecutado='$arrayInformacion[3]',decimoCuartoEjecutado='$arrayInformacion[4]',fondosReservasEjecutado='$arrayInformacion[5]'");

			$actualiza=$objeto->getActualiza("poa_seguimiento_sueldos_salarios",$valores,"idSueldosSeguimeintos",$arrayInformacion[0]);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "sueldos__salarios__seguimientos":

			$arrayInformacion = json_decode($parametros);

			$nombre__archivo=$fecha_actual."__".$arrayInformacion[11]."__".$hora_actual2.".pdf";


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_sueldos_salarios', array("`idSueldosSeguimeintos`, ","`sueldoSalarioPlanificado`, ","`sueldoSalarioEjecutado`, ","`aporteIessPlanificado`, ","`aporteIessEjecutado`, ","`decimoTerceroPlanificado`, ","`decimoTerceroEjecutado`, ","`decimoCuartoPlanificado`, ","`decimoCuartoEjecutado`, ","`fondosReservasPlanificado`, ","`fondosReservasEjecutado`, ","`idOrganismo`, ","`idSueldosSalarios`, ","`fecha`, ","`hora`, ","`planilla`, ","`comprobante`, ","`rol`, ","`mes`, ","`periodo`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$fecha_actual', ","'$hora_actual', ","'$nombre__archivo', ","'$nombre__archivo', ","'$nombre__archivo', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]'"));

			if ($arrayInformacion[13]=="primerTrimestre") {

				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='primerTrimestre' AND mes='Enero' AND mes='Febrero' AND mes='Marzo';");

			}else if ($arrayInformacion[13]=="segundoTrimestre") {

				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='segundoTrimestre' AND mes='Abril' AND mes='Mayo' AND mes='Junio';");
		
				
			}if ($arrayInformacion[13]=="tercerTrimestre") {
				
				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='tercerTrimestre' AND mes='Julio' AND mes='Agosto' AND mes='Septiembre';");

			}if ($arrayInformacion[13]=="cuartoTrimestre") {
				
				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='cuartoTrimestre' AND mes='Octubre' AND mes='Noviembre' AND mes='Diciembre';");			

			}

			if (empty($consultas[0][idSueldosSeguimeintos])) {
				$consultas="no";
			}else{
				$consultas="si";
			}

			
			$mensaje=1;

			$jason['mensaje']=$mensaje;
			$jason['consultas']=$consultas;


		break;

		case  "editar__indicadores":

			$arrayInformacion = json_decode($parametros);

			if($archivo2!="no"){

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[3]."__".$arrayInformacion[2].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

				$valores=array("totalEjecutado='$arrayInformacion[1]', documento='$nombre__archivo'");

				$actualiza=$objeto->getActualiza("poa_indicadores_seguimiento",$valores,"idModificaIndicadores",$arrayInformacion[0]);


			}else{

				$valores=array("totalEjecutado='$arrayInformacion[1]'");

				$actualiza=$objeto->getActualiza("poa_indicadores_seguimiento",$valores,"idModificaIndicadores",$arrayInformacion[0]);


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "seguimiento__indicadores":

			$arrayInformacion = json_decode($prametros);

			$nombre__archivo=$fecha_actual."__".$arrayInformacion[2]."__".$arrayInformacion[3].".pdf";
			$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

			$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

			$inserta=$objeto->getInsertaNormal('poa_indicadores_seguimiento', array("`idModificaIndicadores`, ","`totalProgramado`, ","`totalEjecutado`, ","`documento`, ","`idOrganismo`, ","`idActividad`, ","`trimestre`, ","`fecha`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$fecha_actual'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "matrices__guardas":

			$nombre__columnas = json_decode($nombre__columnas);
			$tipo__columna = json_decode($tipo__columna);

			$opciones__agregadas__enlzadas = json_decode($opciones__agregadas__enlzadas);
			$formulas__concatenadas = json_decode($formulas__concatenadas);

			$inserta=$objeto->getInsertaNormal('poa_paid_matriz', array("`idMatriz`, ","`idUsuario`, ","`proyectos__escogidos__activities`, ","`actividades__rubros`, ","`matriz__auxiliar`, ","`fecha`, ","`hora`"),array("'$idUsuarioPrincipal', ","'$proyectos__escogidos__activities', ","'$actividades__rubros', ","'$matriz__auxiliar', ","'$fecha_actual', ","'$hora_actual'"));

			$maximo=$objeto->getMaximoFuncion('idMatriz','poa_paid_matriz');


			for ($i=0; $i < count($tipo__columna); $i++) { 


				$inserta2=$objeto->getInsertaNormal('poa_paid_matriz_actividad', array("`idActividadMatriz`, ","`nombre__columnas`, ","`tipo__columna`, ","`idMatriz`, ","`fecha`, ","`hora`, ","`idUsuario`"),array("'$nombre__columnas[$i]', ","'$tipo__columna[$i]', ","'$maximo', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal'"));

				$maximo2E=$objeto->getMaximoFuncion('idActividadMatriz','poa_paid_matriz_actividad');

				if ($tipo__columna[$i]=="selector") {
					
					for ($z=0; $z < count($opciones__agregadas__enlzadas); $z++) { 
						
						$arrayExplode=explode('___', $opciones__agregadas__enlzadas[$z]);

						if ($arrayExplode[1]==$i) {
							
							$inserta2=$objeto->getInsertaNormal('poa_paid_matriz_actividad_select', array("`idMatrizSelect`, ","`idActividadMatriz`, ","`opcion`, ","`fecha`, ","`hora`, ","`idUsuario`"),array("'$maximo2E', ","'$arrayExplode[0]', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal'"));

						}

					}

				}


				if ($tipo__columna[$i]=="formula") {
					
					for ($z=0; $z < count($formulas__concatenadas); $z++) { 
						
						$arrayExplode=explode('___', $formulas__concatenadas[$z]);

						if ($arrayExplode[1]==$i) {
							
							$inserta2=$objeto->getInsertaNormal('poa_paid_matriz_actividad_formulas', array("`idMatrizFormula`, ","`idActividadMatriz`, ","`formula`, ","`fecha`, ","`hora`, ","`idUsuario`"),array("'$maximo2E', ","'$formulas__concatenadas[0]', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal'"));

						}

					}

				}
					
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "proyecto__paid":

			$objetivo__especificos = json_decode($objetivo__especificos);
			$items__proyecto = json_decode($items__proyecto);
			$codigo__proyecto = json_decode($codigo__proyecto);
			$indicador__proyecto = json_decode($indicador__proyecto);

			$inserta=$objeto->getInsertaNormal('poa_paid_proyecto', array("`idProyectoPaid`, ","`programa__creado`, ","`proyecto__inversion`, ","`codigo__proyecto`, ","`fecha__inicioProyecto`, ","`fecha__finProyecto`, ","`area__responsable`, ","`lider__proyecto`, ","`cup__proyecto`, ","`objetivos__proyectos`, ","`general__proyecto`, ","`idUsuario`, ","`fecha`, ","`hora`"),array("'$progra__creado', ","'$proyecto__inversion', ","'$codigo__proyecto__solo', ","'$fecha__inicioProyecto', ","'$fecha__finProyecto', ","'$area__responsable', ","'$lider__proyecto', ","'$cup__proyecto', ","'$objetivos__proyectos', ","'$general__proyecto', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual'"));

			$maximo=$objeto->getMaximoFuncion('idProyectoPaid','poa_paid_proyecto');

			$data1=array();

			array_push($data1, count($objetivo__especificos));

			array_push($data1, count($items__proyecto));
			array_push($data1, count($codigo__proyecto));
			array_push($data1, count($indicador__proyecto));


			for ($i=0; $i < max($data1); $i++) { 

				if (empty($objetivo__especificos[$i])) {
					$obEspecifico=NULL;
				}else{
					$obEspecifico=$objetivo__especificos[$i];
				}


				if (empty($items__proyecto[$i])) {
					$itemsPro=NULL;
				}else{
					$itemsPro=$items__proyecto[$i];
				}

				if (empty($codigo__proyecto[$i])) {
					$codigoProye=NULL;
				}else{
					$codigoProye=$codigo__proyecto[$i];
				}


				if (empty($indicador__proyecto[$i])) {
					$indicadorPro=NULL;
				}else{
					$indicadorPro=$indicador__proyecto[$i];
				}


				$inserta2=$objeto->getInsertaNormal('poa_paid_proyecto_enlace', array("`idElementosProyecto`, ","`objetivo__especificos`, ","`actividades__rubros`, ","`matriz__auxiliar`, ","`campo__columna`, ","`items__proyecto`, ","`codigo__proyecto`, ","`indicador__proyecto`, ","`idProyectoPaid`, ","`fecha`, ","`hora`, ","`idUsuario`"),array("'$obEspecifico', ","NULL, ","NULL, ","NULL, ","'$itemsPro', ","'$codigoProye', ","'$indicadorPro', ","'$maximo', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal'"));
					
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "honorarios":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' ORDER BY b.idInversion DESC LIMIT 1;");

			$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' GROUP BY idOrganismo;");

			$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]),2);	


			if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

				$mensaje=20;
					
			}else{

				$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='530606' AND a.idOrganismo='$idOrganismo' AND idActividad='$idActividad';");

				if (empty($honorarios[0][honorarios])) {
					
					$mensaje=105;

				}else{


						$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$mesesArray[0]);
						$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$mesesArray[1]);
						$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$mesesArray[2]);
						$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$mesesArray[3]);
						$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mesesArray[4]);
						$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$mesesArray[5]);
						$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$mesesArray[6]);
						$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$mesesArray[7]);
						$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$mesesArray[8]);
						$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$mesesArray[9]);
						$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$mesesArray[10]);
						$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$mesesArray[11]);
						$totalUnificado=floatval($mesesArray[12]) + floatval($honorarios[0][totalSumaItem]);



					$valoresHonorarios=array("enero='$sumarUniEnero', febrero='$sumarUniFebrero', marzo='$sumarUniMarzo', abril='$sumarUniAbril', mayo='$sumarUniMayo', junio='$sumarUniJunio', julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre', totalSumaItem='$totalUnificado', totalTotales='$totalUnificado'");
					$actualizaUnificados=$objeto->getActualiza("poa_programacion_financiera",$valoresHonorarios,"idProgramacionFinanciera",$honorarios[0][honorarios]);

		
					$inserta=$objeto->getInsertaNormal('poa_honorarios2022', array("`idHonorarios`, ","`cedula`, ","`nombres`, ","`cargo`, ","`tipoCargo`, ","`honorarioMensual`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`idActividad`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$mesesArray[0]', ", "'$mesesArray[1]', ", "'$mesesArray[2]', ", "'$mesesArray[3]', ", "'$mesesArray[4]', ", "'$mesesArray[5]', ", "'$mesesArray[6]', ", "'$mesesArray[7]', ", "'$mesesArray[8]', ", "'$mesesArray[9]', ", "'$mesesArray[10]', ", "'$mesesArray[11]', ", "'$mesesArray[12]', ", "'$idOrganismo', ", "'$fecha_actual', ", "'$idActividad'"));

					$mensaje=1;

				}

			}

			$jason['mensaje']=$mensaje;

		break;		



		case  "sueldosSalarios":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$salariosUnificados=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS salariosUnificados, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='510106' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad';");

			$aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS aportPatronal, a.enero AS eneroPa,a.febrero AS febreroP,a.marzo AS marzoP,a.abril AS abrilP,a.mayo AS mayoP,a.junio AS junioP,a.julio AS julioP,a.agosto AS agostoP,a.septiembre AS septiembreP,a.octubre AS octubreP,a.noviembre AS noviembreP,a.diciembre AS diciembreP,a.totalSumaItem AS totalSumaItemP,a.totalTotales AS totalTotalesP FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510601' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad';");

			$fondoReserva=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS fondoReserva, a.enero AS eneroFondo,a.febrero AS febreroFondo,a.marzo AS marzoFondo,a.abril AS abrilFondo,a.mayo AS mayoFondo,a.junio AS junioFondo,a.julio AS julioFondo,a.agosto AS agostoFondo,a.septiembre AS septiembreFondo,a.octubre AS octubreFondo,a.noviembre AS noviembreFondo,a.diciembre AS diciembreFondo,a.totalSumaItem AS totalSumaItemFondo,a.totalTotales AS totalTotalesFondo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510602' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad';");


			$decimoTercera=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS decimoTercero, a.enero AS eneroTercero,a.febrero AS febreroTercero,a.marzo AS marzoTercero,a.abril AS abrilTercero,a.mayo AS mayoTercero,a.junio AS junioTercero,a.julio AS julioTercero,a.agosto AS agostoTercero,a.septiembre AS septiembreTercero,a.octubre AS octubreTercero,a.noviembre AS noviembreTercero,a.diciembre AS diciembreTercero,a.totalSumaItem AS totalSumaItemTercero,a.totalTotales AS totalTotalesTercero FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510203' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad';");

			$decimoCuarta=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS decimoCuarta, a.enero AS eneroCuarta,a.febrero AS febreroCuarta,a.marzo AS marzoCuarta,a.abril AS abrilCuarta,a.mayo AS mayoCuarta,a.junio AS junioCuarta,a.julio AS julioCuarta,a.agosto AS agostoCuarta,a.septiembre AS septiembreCuarta,a.octubre AS octubreCuarta,a.noviembre AS noviembreCuarta,a.diciembre AS diciembreCuarta,a.totalSumaItem AS totalSumaItemCuarta,a.totalTotales AS totalTotalesCuarta FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='510204' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad';");


			if (empty($salariosUnificados[0][salariosUnificados]) || empty($aportePatronal[0][aportPatronal]) || empty($fondoReserva[0][fondoReserva]) || empty($decimoTercera[0][decimoTercero]) || empty($decimoCuarta[0][decimoCuarta])) {
				
				$mensaje=25;

			}else{

				/*===========================================
				=       Sumadores Salarios Unificados   =
				===========================================*/
				
				$sumarUniEnero=$objeto->mesesSumarS($salariosUnificados[0][enero],$valoresArray[5]);
				$sumarUniFebrero=$objeto->mesesSumarS($salariosUnificados[0][febrero],$valoresArray[5]);
				$sumarUniMarzo=$objeto->mesesSumarS($salariosUnificados[0][marzo],$valoresArray[5]);
				$sumarUniAbril=$objeto->mesesSumarS($salariosUnificados[0][abril],$valoresArray[5]);
				$sumarUniMayo=$objeto->mesesSumarS($salariosUnificados[0][mayo],$valoresArray[5]);
				$sumarUniJunio=$objeto->mesesSumarS($salariosUnificados[0][junio],$valoresArray[5]);
				$sumarUniJulio=$objeto->mesesSumarS($salariosUnificados[0][julio],$valoresArray[5]);
				$sumarUniAgosto=$objeto->mesesSumarS($salariosUnificados[0][agosto],$valoresArray[5]);
				$sumarUniSeptiembre=$objeto->mesesSumarS($salariosUnificados[0][septiembre],$valoresArray[5]);
				$sumarUniOctubre=$objeto->mesesSumarS($salariosUnificados[0][octubre],$valoresArray[5]);
				$sumarUniNoviembre=$objeto->mesesSumarS($salariosUnificados[0][noviembre],$valoresArray[5]);
				$sumarUniDiciembre=$objeto->mesesSumarS($salariosUnificados[0][diciembre],$valoresArray[5]);
				$totalUnificado=floatval($valoresArray[5] *12) + floatval($salariosUnificados[0][totalSumaItem]);

				/*=====  End of Sumadores Salarios Unificados ======*/

				/*=======================================
				=            Aporte patronal            =
				=======================================*/
				
				$sumarPatronal=$objeto->mesesSumarS($aportePatronal[0][eneroPa],$valoresArray[6]);
				$totalPatronal=$sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal +  $aportePatronal[0][totalSumaItemP];			
				
				/*=====  End of Aporte patronal  ======*/
				

				/*========================================
				=            Fondo de reserva            =
				========================================*/
				
				$sumarReserva=$objeto->mesesSumarS($fondoReserva[0][eneroFondo],$valoresArray[11]);
				$totalReserva=$sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $fondoReserva[0][totalSumaItemFondo];		
				
				/*=====  End of Fondo de reserva  ======*/
				

				$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' ORDER BY b.idInversion DESC LIMIT 1;");

				$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' GROUP BY idOrganismo;");

				$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]),2);	


				if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

					$mensaje=20;
					$jason['sumar']=$sumar;
					
				}else{

					$regimen=$objeto->getObtenerInformacionGeneral("SELECT regimen FROM poa_organismo WHERE idOrganismo='$idOrganismo';");


					$valoresUnificados=array("enero='$sumarUniEnero', febrero='$sumarUniFebrero', marzo='$sumarUniMarzo', abril='$sumarUniAbril', mayo='$sumarUniMayo', junio='$sumarUniJunio', julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre', totalSumaItem='$totalUnificado', totalTotales='$totalUnificado'");


					$actualizaUnificados=$objeto->getActualiza("poa_programacion_financiera",$valoresUnificados,"idProgramacionFinanciera",$salariosUnificados[0][salariosUnificados]);

					$aportePatronalDef=0;

					$aportePatronalDef=floatval($sumarPatronal) * 12;

					$valoresPatronal=array("enero='$sumarPatronal', febrero='$sumarPatronal', marzo='$sumarPatronal', abril='$sumarPatronal', mayo='$sumarPatronal', junio='$sumarPatronal', julio='$sumarPatronal',agosto='$sumarPatronal',septiembre='$sumarPatronal',octubre='$sumarPatronal',noviembre='$sumarPatronal',diciembre='$sumarPatronal', totalSumaItem='$aportePatronalDef', totalTotales='$aportePatronalDef'");
					$actualizaPatronal=$objeto->getActualiza("poa_programacion_financiera",$valoresPatronal,"idProgramacionFinanciera",$aportePatronal[0][aportPatronal]);

					$sumaReservasF=0;
				
					$sumaReservasF=floatval($sumarReserva) * 12;

					$valoresFondoR=array("enero='$sumarReserva', febrero='$sumarReserva', marzo='$sumarReserva', abril='$sumarReserva', mayo='$sumarReserva', junio='$sumarReserva', julio='$sumarReserva',agosto='$sumarReserva',septiembre='$sumarReserva',octubre='$sumarReserva',noviembre='$sumarReserva',diciembre='$sumarReserva', totalSumaItem='$sumaReservasF', totalTotales='$sumaReservasF'");
					$actualizaFondoR=$objeto->getActualiza("poa_programacion_financiera",$valoresFondoR,"idProgramacionFinanciera",$fondoReserva[0][fondoReserva]);

					$regimenInstanciado=$regimen[0][regimen];

					if ($valoresArray[10]=="no") {


						if ($regimenInstanciado=="Costa") {

							$resultantesCuartos=floatval($decimoCuarta[0][marzoCuarta]) + floatval($valoresArray[9]);

							$totalDecimoCuarto= floatval($decimoCuarta[0][totalSumaItemCuarta]) + ($valoresArray[9]);

							$valoresCuarta=array("marzo='$resultantesCuartos', totalSumaItem='$totalDecimoCuarto', totalTotales='$totalDecimoCuarto'");
							$actualizaCuarta=$objeto->getActualiza("poa_programacion_financiera",$valoresCuarta,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta]);



						}else{

							$resultantesCuartos=floatval($decimoCuarta[0][agostoCuarta]) + floatval($valoresArray[9]);

							$totalDecimoCuarto= floatval($decimoCuarta[0][totalSumaItemCuarta]) + ($valoresArray[9]);

							$valoresCuarta=array("agosto='$resultantesCuartos', totalSumaItem='$totalDecimoCuarto', totalTotales='$totalDecimoCuarto'");
							$actualizaCuarta=$objeto->getActualiza("poa_programacion_financiera",$valoresCuarta,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta]);


						}


					}else{

						$obtenerDecimoCuarto=floatval(425.00) / 12;

						$sumarUniEneroCuarto=$objeto->mesesSumarS($decimoCuarta[0][eneroCuarta],$obtenerDecimoCuarto);
						$sumarUniFebreroCuarto=$objeto->mesesSumarS($decimoCuarta[0][febreroCuarta],$obtenerDecimoCuarto);
						$sumarUniMarzoCuarto=$objeto->mesesSumarS($decimoCuarta[0][marzoCuarta],$obtenerDecimoCuarto);
						$sumarUniAbrilCuarto=$objeto->mesesSumarS($decimoCuarta[0][abrilCuarta],$obtenerDecimoCuarto);
						$sumarUniMayoCuarto=$objeto->mesesSumarS($decimoCuarta[0][mayoCuarta],$obtenerDecimoCuarto);
						$sumarUniJunioCuarto=$objeto->mesesSumarS($decimoCuarta[0][junioCuarta],$obtenerDecimoCuarto);
						$sumarUniJulioCuarto=$objeto->mesesSumarS($decimoCuarta[0][julioCuarta],$obtenerDecimoCuarto);
						$sumarUniAgostoCuarto=$objeto->mesesSumarS($decimoCuarta[0][agostoCuarta],$obtenerDecimoCuarto);
						$sumarUniSeptiembreCuarto=$objeto->mesesSumarS($decimoCuarta[0][septiembreCuarta],$obtenerDecimoCuarto);
						$sumarUniOctubreCuarto=$objeto->mesesSumarS($decimoCuarta[0][octubreCuarta],$obtenerDecimoCuarto);
						$sumarUniNoviembreCuarto=$objeto->mesesSumarS($decimoCuarta[0][noviembreCuarta],$obtenerDecimoCuarto);
						$sumarUniDiciembreCuarto=$objeto->mesesSumarS($decimoCuarta[0][diciembreCuarta],$obtenerDecimoCuarto);

						$totalDecimoCuarto= floatval($decimoCuarta[0][totalSumaItemCuarta]) + ($valoresArray[9]);


						$valoresCuarta=array("enero='$sumarUniEneroCuarto', febrero='$sumarUniFebreroCuarto', marzo='$sumarUniMarzoCuarto', abril='$sumarUniAbrilCuarto', mayo='$sumarUniMayoCuarto', junio='$sumarUniJunioCuarto', julio='$sumarUniJulioCuarto',agosto='$sumarUniAgostoCuarto',septiembre='$sumarUniSeptiembreCuarto',octubre='$sumarUniOctubreCuarto',noviembre='$sumarUniNoviembreCuarto',diciembre='$sumarUniDiciembreCuarto', totalSumaItem='$totalDecimoCuarto', totalTotales='$totalDecimoCuarto'");
						$actualizaCuarta=$objeto->getActualiza("poa_programacion_financiera",$valoresCuarta,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta]);


					}


					if ($valoresArray[8]=="no") {


						$totalDecimoTercero=$decimoTercera[0][totalSumaItemTercero] + $valoresArray[7];

						$resultantesTerceros=floatval($decimoTercera[0][diciembreTercero]) + floatval($valoresArray[7]);

						$valoresTercero=array("diciembre='$resultantesTerceros', totalSumaItem='$totalDecimoTercero', totalTotales='$totalDecimoTercero'");
						$actualizaTercero=$objeto->getActualiza("poa_programacion_financiera",$valoresTercero,"idProgramacionFinanciera",$decimoTercera[0][decimoTercero]);


					}else{

						$obtenerDecimoTercero=floatval($valoresArray[7]) / 12;


						$sumarUniEneroTercero=$objeto->mesesSumarS($decimoTercera[0][eneroTercero],$obtenerDecimoTercero);
						$sumarUniFebreroTercero=$objeto->mesesSumarS($decimoTercera[0][febreroTercero],$obtenerDecimoTercero);
						$sumarUniMarzoTercero=$objeto->mesesSumarS($decimoTercera[0][marzoTercero],$obtenerDecimoTercero);
						$sumarUniAbrilTercero=$objeto->mesesSumarS($decimoTercera[0][abrilTercero],$obtenerDecimoTercero);
						$sumarUniMayoTercero=$objeto->mesesSumarS($decimoTercera[0][mayoTercero],$obtenerDecimoTercero);
						$sumarUniJunioTercero=$objeto->mesesSumarS($decimoTercera[0][junioTercero],$obtenerDecimoTercero);
						$sumarUniJulioTercero=$objeto->mesesSumarS($decimoTercera[0][julioTercero],$obtenerDecimoTercero);
						$sumarUniAgostoTercero=$objeto->mesesSumarS($decimoTercera[0][agostoTercero],$obtenerDecimoTercero);
						$sumarUniSeptiembreTercero=$objeto->mesesSumarS($decimoTercera[0][septiembreTercero],$obtenerDecimoTercero);
						$sumarUniOctubreTercero=$objeto->mesesSumarS($decimoTercera[0][octubreTercero],$obtenerDecimoTercero);
						$sumarUniNoviembreTercero=$objeto->mesesSumarS($decimoTercera[0][noviembreTercero],$obtenerDecimoTercero);
						$sumarUniDiciembreTercero=$objeto->mesesSumarS($decimoTercera[0][diciembreTercero],$obtenerDecimoTercero);

						$totalDecimoTercero=$decimoTercera[0][totalSumaItemTercero] + $valoresArray[7];

						$valoresTercero=array("enero='$sumarUniEneroTercero', febrero='$sumarUniFebreroTercero', marzo='$sumarUniMarzoTercero', abril='$sumarUniAbrilTercero', mayo='$sumarUniMayoTercero', junio='$sumarUniJunioTercero', julio='$sumarUniJulioTercero',agosto='$sumarUniAgostoTercero',septiembre='$sumarUniSeptiembreTercero',octubre='$sumarUniOctubreTercero',noviembre='$sumarUniNoviembreTercero',diciembre='$sumarUniDiciembreTercero', totalSumaItem='$totalDecimoTercero', totalTotales='$totalDecimoTercero'");
						$actualizaTercero=$objeto->getActualiza("poa_programacion_financiera",$valoresTercero,"idProgramacionFinanciera",$decimoTercera[0][decimoTercero]);


					}
					


					$inserta=$objeto->getInsertaNormal('poa_sueldossalarios2022', array("`idSueldos`, ","`cedula`, ","`nombres`, ","`cargo`, ","`tipoCargo`, ","`tiempoTrabajo`, ","`sueldoSalario`, ","`aportePatronal`, ","`decimoTercera`, ","`mensualizaTercera`, ","`decimoCuarta`, ","`menusalizaCuarta`, ","`fondosReserva`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`idActividad`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$valoresArray[5]', ", "'$valoresArray[6]', ", "'$valoresArray[7]', ", "'$valoresArray[8]', ", "'$valoresArray[9]', ", "'$valoresArray[10]', ", "'$valoresArray[11]', ", "'$mesesArray[0]', ", "'$mesesArray[1]', ", "'$mesesArray[2]', ", "'$mesesArray[3]', ", "'$mesesArray[4]', ", "'$mesesArray[5]', ", "'$mesesArray[6]', ", "'$mesesArray[7]', ", "'$mesesArray[8]', ", "'$mesesArray[9]', ", "'$mesesArray[10]', ", "'$mesesArray[11]', ", "'$mesesArray[12]', ", "'$idOrganismo', ", "'$fecha_actual', ", "'$idActividad'"));



					$mensaje=1;

					

					$jason['sumar']=$sumar;

				}


			}

			
			$jason['mensaje']=$mensaje;

		break;		


		case  "regimen":

			$valores=array("regimen='$idValor'");
			$actualiza=$objeto->getActualiza("poa_organismo",$valores,"idOrganismo",$idOrganismo);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "suministrosAE":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);
			$suministrosArray = json_decode($suministrosArray);
			$valoresSArray = json_decode($valoresSArray);

			$inserta=$objeto->getInsertaNormal('poa_suministrosn', array("`idSumi`, ","`tipo`, ","`nombreEscenario`, ","`idOrganismo`, ","`fecha`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$idOrganismo', ","'$fecha_actual'"));

			$maximo=$objeto->getMaximoFuncion('idSumi','poa_suministrosn');

				for ($i=0; $i < count($suministrosArray); $i++) { 

					if ($suministrosArray[$i]=="energia") {

						$inserta=$objeto->getInsertaNormal('poa_suministros', array("`idSuministros`, ","`luz`, ","`agua`, ","`idSumiN`"),array("'$valoresSArray[$i]', ","'N/A', ","'$maximo'"));

					}else{

						$inserta=$objeto->getInsertaNormal('poa_suministros', array("`idSuministros`, ","`luz`, ","`agua`, ","`idSumiN`"),array("'N/A', ","'$valoresSArray[$i]', ","'$maximo'"));

					}
					
				}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "mantenimientoAc":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' ORDER BY b.idInversion DESC LIMIT 1;");

			$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' GROUP BY idOrganismo;");


			$restarAntiguo=$objeto->getObtenerInformacionGeneral("SELECT totalSumaItem AS sumaAntiguo FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idProgramacionFinanciera';");

			$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]) - floatval($restarAntiguo[0][sumaAntiguo]),2);


			if (floatval($mesesArray[12])<=0) {

				$mensaje=21;

			}else if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

				$mensaje=20;

			}else{

				$valores=array("enero='$mesesArray[0]',febrero='$mesesArray[1]',marzo='$mesesArray[2]',abril='$mesesArray[3]',mayo='$mesesArray[4]',junio='$mesesArray[5]',julio='$mesesArray[6]',agosto='$mesesArray[7]',septiembre='$mesesArray[8]',octubre='$mesesArray[9]',noviembre='$mesesArray[10]',diciembre='$mesesArray[11]',totalSumaItem='$mesesArray[12]',totalTotales='$mesesArray[12]'");

				$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$idProgramacionFinanciera);

				$inserta=$objeto->getInsertaNormal('poa_mantenimiento', array("`idMantenimiento`, ","`nombreInfras`, ","`provincia`, ","`direccionCompleta`, ","`estado`, ","`tipoRecursos`, ","`tipoIntervencion`, ","`detallarTipoIn`, ","`tipoMantenimiento`, ","`materialesServicios`, ","`fechaUltimo`, ","`idProgramacionFinanciera`, ","`fecha`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$valoresArray[5]', ", "'$valoresArray[6]', ", "'$valoresArray[7]', ", "'$valoresArray[8]', ", "'$valoresArray[9]', ","'$idProgramacionFinanciera', ","'$fecha_actual'"));

				$mensaje=1;

			}			

			$jason['mensaje']=$mensaje;
			$jason['sumar']=$sumar;

		break;


		case  "actividadesDeportivades":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);


			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idProgramacionFinanciera='$idProgramacionFinanciera' AND a.idOrganismo='$idOrganismo';");

			$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$mesesArray[0]);
			$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$mesesArray[1]);
			$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$mesesArray[2]);
			$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$mesesArray[3]);
			$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mesesArray[4]);
			$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$mesesArray[5]);
			$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$mesesArray[6]);
			$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$mesesArray[7]);
			$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$mesesArray[8]);
			$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$mesesArray[9]);
			$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$mesesArray[10]);
			$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$mesesArray[11]);
			$sumar=floatval($mesesArray[12]) + $honorarios[0][totalTotales];





			$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' ORDER BY b.idInversion DESC LIMIT 1;");

			$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' GROUP BY idOrganismo;");

			// $sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]),2);


			if (floatval($mesesArray[12])<=0) {

				$mensaje=21;

			}else if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion]) && $valoresArray[1]=="autogestion") {

				$mensaje=20;

			}else{

				$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$valoresArray[5]', ", "'$valoresArray[6]', ", "'$valoresArray[7]', ", "'$valoresArray[8]', ", "'$valoresArray[9]', ", "'$valoresArray[10]', ", "'$valoresArray[11]', ", "'$valoresArray[12]', ","'$valoresArray[13]', ","'$valoresArray[14]', ","'$valoresArray[15]', ","'$valoresArray[16]', ","'$valoresArray[17]', ","'$idProgramacionFinanciera', ","'$fecha_actual', ","'$mesesArray[0]', ","'$mesesArray[1]', ","'$mesesArray[2]', ","'$mesesArray[3]', ","'$mesesArray[4]', ","'$mesesArray[5]', ","'$mesesArray[6]', ","'$mesesArray[7]', ","'$mesesArray[8]', ","'$mesesArray[9]', ","'$mesesArray[10]', ","'$mesesArray[11]', ","'$mesesArray[12]'"));


				if ($valoresArray[1]!="autogestion") {

					$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$sumar',totalTotales='$sumar'");

					$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$idProgramacionFinanciera);

				}

				$mensaje=1;

			}			

			$jason['mensaje']=$mensaje;
			$jason['sumar']=$sumar;

		break;

		case  "actividadesAdministrativas":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' ORDER BY b.idInversion DESC LIMIT 1;");

			$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' GROUP BY idOrganismo;");

			$restarAntiguo=$objeto->getObtenerInformacionGeneral("SELECT totalSumaItem AS sumaAntiguo FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idProgramacionFinanciera';");

			$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]) - floatval($restarAntiguo[0][sumaAntiguo]),2);


			if (floatval($mesesArray[12])<=0) {

				$mensaje=21;

			}else if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

				$mensaje=20;

			}else{

				$valores=array("enero='$mesesArray[0]',febrero='$mesesArray[1]',marzo='$mesesArray[2]',abril='$mesesArray[3]',mayo='$mesesArray[4]',junio='$mesesArray[5]',julio='$mesesArray[6]',agosto='$mesesArray[7]',septiembre='$mesesArray[8]',octubre='$mesesArray[9]',noviembre='$mesesArray[10]',diciembre='$mesesArray[11]',totalSumaItem='$mesesArray[12]',totalTotales='$mesesArray[12]'");

				$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$idProgramacionFinanciera);

				$inserta=$objeto->getInsertaNormal('poa_actividadesadministrativas', array("`idActividadAd`, ","`justificacionActividad`, ","`cantidadBien`, ","`idProgramacionFinanciera`, ","`fecha`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$idProgramacionFinanciera', ","'$fecha_actual'"));

				$mensaje=1;

			}			

			$jason['mensaje']=$mensaje;
			$jason['sumar']=$sumar;

		break;

		case  "itemsCiudadanosPre":

			$sumar=0;

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalSumaItem`, ","`totalTotales`, ","`idOrganismo`, ","`idItem`, ","`idActividad`, " ,"`fecha`"),array("'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'$idOrganismoPrincipal', ","'$arrayInformacion[0]', ","'$actividadEnvidada', ","'$fecha_actual'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "poaOrganismo":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_poainicial', array("`idPoaEnviado`, ","`primertrimestre`, ","`segundotrimestre`, ","`tercertrimestre`, ","`idOrganismo`, ","`fecha`, ","`idActividad`, ","`cuartotrimestre`, ","`metaindicador`"),array(":idObjetivoEstrategico, ",":idObjetivo, ",":idPrograma, ",":idOrganismo, ",":fecha, ",":idActividad, ",":cuartotrimestre, ",":metaindicador"),array("$arrayInformacion[2]","$arrayInformacion[3]","$arrayInformacion[4]","$arrayInformacion[0]","$fecha_actual","$arrayInformacion[1]","$arrayInformacion[5]","$arrayInformacion[6]"),array(":idObjetivoEstrategico",":idObjetivo",":idPrograma",":idOrganismo",":fecha",":idActividad",":cuartotrimestre",":metaindicador"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "agregarItemsInserta":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_item', array("`idItem`, ","`nombreItem`, ","`fecha`, ","`hora`, ","`itemPreesupuestario`"),array(":nombreItem, ",":fecha, ",":hora, ",":itemPreesupuestario"),array("$arrayInformacion[0]","$fecha_actual","$hora_actual","$arrayInformacion[1]"),array(":nombreItem",":fecha",":hora",":itemPreesupuestario"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "editarCorreoOrga":

			$arrayInformacion = json_decode($arrayInformacion);

			$idUsuario=$objeto->getBuscadorInicial("idUsuario","poa_organismo",'idOrganismo',$arrayInformacion[0]);
			

			$valores2=array("correo='$arrayInformacion[1]',correoResponsablePoa='$arrayInformacion[1]'");
			$actualiza2=$objeto->getActualiza("poa_organismo",$valores2,"idOrganismo",$arrayInformacion[0]);

			$valores2=array("email='$arrayInformacion[1]'");
			$actualiza2=$objeto->getActualiza("poa_usuario",$valores2,"idUsuario",$idUsuario);

			$valores3=array("idTipoOrganismo='$arrayInformacion[2]'");
			$actualiza3=$objeto->getActualiza("poa_competencia_organismo_competencia",$valores3,"idOrganismo",$arrayInformacion[0]);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	


		case  "itemsPrincipalActualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$valores2=array("nombreItem='$arrayInformacion[1]',itemPreesupuestario='$arrayInformacion[2]'");
			$actualiza2=$objeto->getActualiza("poa_item",$valores2,"idItem",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "actividadesActualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$valores2=array("idActividades='$inputActividades',nombreActividades='$input__1',idClasificacionGastos='$select__grupoG',idLineaPolitica='$select__indiCadores'");
			$actualiza2=$objeto->getActualiza("poa_actividades",$valores2,"idActividades",$arrayInformacion[4]);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "grupoGastoActualiza":

			$valores2=array("nombreClasificacionGastos='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_clasificaciongastos",$valores2,"idClasificacionGastos",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "lineaBaseActualiza":

			$valores2=array("nombreLinea='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_linea_base",$valores2,"idLineas",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "programaActualiza":

			$valores2=array("nombrePrograma='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_programa",$valores2,"idPrograma",$enviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "indicadoresActualiza":

			$valores2=array("nombreIndicador='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_indicadores",$valores2,"idIndicadores",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "deportesActualiza":

			$valores2=array("nombreDeporte='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_deporte",$valores2,"idDeporte",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "alcanceActualiza":

			$valores2=array("nombreAlcanse='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_alcanse",$valores2,"idAlcanse",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "tipoFinanActualiza":

			$valores2=array("nombreTipo='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_tipo",$valores2,"idTipo",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "cargosActualiza":

			$valores2=array("nombreCargo='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_cargo",$valores2,"idCargo",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "objetivosActualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$valores2=array("nombreObjetivo='$arrayInformacion[1]'");
			$actualiza2=$objeto->getActualiza("poa_objetivos",$valores2,"idObjetivos",$arrayInformacion[0]);

			$valores3=array("idPrograma='$arrayInformacion[2]'");
			$actualiza3=$objeto->getActualiza("poa_objetivos_usuario",$valores3,"idObjetivos",$arrayInformacion[0]);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrganismoActualiza":

			$valores2=array("nombreTipo='$input__1',idAreaAccion='$select__1',idObjetivos='$select__2',idAreaEncargada='$select__3'");
			$actualiza2=$objeto->getActualiza("poa_tipo_organismo",$valores2,"idTipoOrganismo",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "areaAccionActualiza":

			$valores2=array("accion='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_area_accion",$valores2,"idAreaAccion",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "areaEncargadaActualiza":

			$valores2=array("nombreArea='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_areaEncargada",$valores2,"idAreaEncargada",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "lineaPolitica":

			$inserta=$objeto->getInserta('poa_linea_base', array("`idLineas`, ","`nombreLinea`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idLineas','poa_linea_base');

			$inserta2=$objeto->getInserta('poa_linea_base_usuario',array("`idLineaBaseUsuario`, ","`idUsuario`, ","`idLineaBase`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "programaInserta":

			$inserta=$objeto->getInserta('poa_programa', array("`idPrograma`, ","`nombrePrograma`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idPrograma','poa_programa');

			$inserta2=$objeto->getInserta('poa_programa_usuario',array("`idProgramaUsuarion`, ","`idUsuario`, ","`idPrograma`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "indicadoresInserta":

			$inserta=$objeto->getInserta('poa_indicadores', array("`idIndicadores`, ","`nombreIndicador`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idIndicadores','poa_indicadores');

			$inserta2=$objeto->getInserta('poa_indicadores_usuario',array("`idIndicadorUsuario`, ","`idUsuario`, ","`idIndicador`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "deportesInserta":

			$inserta=$objeto->getInserta('poa_deporte', array("`idDeporte`, ","`nombreDeporte`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idDeporte','poa_deporte');

			$inserta2=$objeto->getInserta('poa_deporte_usuario',array("`idDeporteUsuario`, ","`idUsuario`, ","`idDeporte`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "alcanseInserta":

			$inserta=$objeto->getInserta('poa_alcanse', array("`idAlcanse`, ","`nombreAlcanse`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idAlcanse','poa_alcanse');

			$inserta2=$objeto->getInserta('poa_alcanse_usuario',array("`idAlcanseUsuario`, ","`idUsuario`, ","`idAlcanse`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "financiamientoInserta":

			$inserta=$objeto->getInserta('poa_tipo', array("`idTipo`, ","`nombreTipo`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idTipo','poa_tipo');

			$inserta2=$objeto->getInserta('poa_tipo_usuario',array("`idTipoUsuario`, ","`idUsuario`, ","`idTipo`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "cargoInserta":

			$inserta=$objeto->getInserta('poa_cargo', array("`idCargo`, ","`nombreCargo`, ","`fecha`, ","`hora`, ","`usado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idCargo','poa_cargo');

			$inserta2=$objeto->getInserta('poa_cargo_usuario',array("`idCargoUsuario`, ","`idUsuario`, ","`idCargo`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "objetivoInserta":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_objetivos', array("`idObjetivos`, ","`nombreObjetivo`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$arrayInformacion[0]","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idObjetivos','poa_objetivos');

			$inserta2=$objeto->getInserta('poa_objetivos_usuario',array("`idObjetivosUsuario`, ","`idUsuario`, ","`idObjetivos`, ","`idPrograma`"),array(":idUsuario, ",":idLineaBase, ",":argumento"),array("$idUsuarioPrincipal","$maximo","$arrayInformacion[1]"),array(":idUsuario",":idLineaBase",":argumento"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		

		case  "actividadInserta":

			$arrayCheckeds = json_decode($arrayCheckeds);

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_actividades', array("`idActividades`, ","`nombreActividades`, ","`fecha`, ","`hora`, ","`idClasificacionGastos`, ","`idLineaPolitica`"),array(":nombreActividades, ",":fecha, ",":hora, ",":idClasificacionGastos, ",":idLineaPolitica"),array("$arrayInformacion[0]","$fecha_actual","$hora_actual","$arrayInformacion[1]","$arrayInformacion[2]"),array(":nombreActividades",":fecha",":hora",":idClasificacionGastos",":idLineaPolitica"));

			$maximo=$objeto->getMaximoFuncion('idActividades','poa_actividades');

			$inserta2=$objeto->getInserta('poa_actividades_usuario',array("`idActividadesUsuario`, ","`idUsuario`, ","`idActividades`"),array(":idUsuario, ",":idActividades"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idActividades"));

			for ($i=0; $i < count($arrayCheckeds); $i++) { 

				$inserta3=$objeto->getInserta('poa_item_actividad',array("`idActividadItem`, ","`idActividad`, ","`idItem`, ","`fecha`, ","`hora`"),array(":idActividad, ",":idItem, ",":fecha, ",":hora"),array("$maximo","$arrayCheckeds[$i]","$fecha_actual","$hora_actual"),array(":idActividad",":idItem",":fecha",":hora"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrganismoInserta":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_tipo_organismo', array("`idTipoOrganismo`, ","`nombreTipo`, ","`estado`, ","`idAreaAccion`, ","`idObjetivos`, ","`idAreaEncargada`"),array(":nombreTipo, ",":estado, ",":idAreaAccion, ",":idObjetivos, ",":idAreaEncargada"),array("$arrayInformacion[0]","A","$arrayInformacion[1]","$arrayInformacion[2]","$arrayInformacion[3]"),array(":nombreTipo",":estado",":idAreaAccion",":idObjetivos",":idAreaEncargada"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "areaAccionInserta":

			$inserta=$objeto->getInserta('poa_area_accion', array("`idAreaAccion`, ","`accion`, ","`estado`"),array(":accion, ",":estado"),array("$agregado","A"),array(":accion",":estado"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "areaEncargadaInserta":

			$inserta=$objeto->getInserta('poa_areaEncargada', array("`idAreaEncargada`, ","`nombreArea`, ","`estado`"),array(":accion, ",":estado"),array("$agregado","A"),array(":accion",":estado"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "grupoGastoInserta":

			$inserta=$objeto->getInserta('poa_clasificaciongastos', array("`idClasificacionGastos`, ","`nombreClasificacionGastos`, ","`estado`, ","`fecha`, ","`hora`"),array(":nombreClasificacionGastos, ",":estado, ",":fecha, ",":hora"),array("$agregado","A","$fecha_actual","$hora_actual"),array(":nombreClasificacionGastos",":estado",":fecha",":hora"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemActividadInserta":

			$arrayInformacion=json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_item_actividad', array("`idActividadItem`, ","`idActividad`, ","`idItem`, ","`fecha`, ","`hora`"),array(":idActividad, ",":idItem, ",":fecha, ",":hora"),array("$elemento__escondidoI","$arrayInformacion[0]","$fecha_actual","$hora_actual"),array(":idActividad",":idItem",":fecha",":hora"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "enviarDesicion":

			$tabla=$tabla;
			$campos=json_decode($campos);
			$parametros=json_decode($parametros);
			$valores=json_decode($valores);
			$parametrosEnvio =json_decode($parametrosEnvio);
			$inserta=$objeto->getInserta($tabla,$campos,$parametros,$valores,$parametrosEnvio);

			$tablaBusqueda="poa_organismo";

			$campoBuscado="correo";

			$valorBuscado="$enviado";

			$buscador=$objeto->getBuscadorInicial($campoBuscado,$tablaBusqueda,'idOrganismo',$valorBuscado);


			/*=============================
			=            Email            =
			=============================*/
			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; fue puesto en observación para la aprobación de usuario. Esperar respuesta del ministerio del deporte.</body></html>';

			$emailArray = array($emailPrincipal);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			
			/*=====  End of Email  ======*/


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "aprobarSolicitudUsuario":

			$valores=array("activado='D'");
			$actualiza=$objeto->getActualiza("poa_organismo",$valores,"idOrganismo",$enviado);


			$valores2=array("estado='S'");
			$actualiza2=$objeto->getActualiza("poa_observaciones",$valores2,"idOrganismo",$enviado);


			$tablaBusqueda="poa_organismo";

			$campoBuscado="correo";

			$valorBuscado="$enviado";

			$buscador=$objeto->getBuscadorInicial($campoBuscado,$tablaBusqueda,'idOrganismo',$valorBuscado);

			/*=============================
			=            Email            =
			=============================*/
			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; fue aprobado el usuario, debe esperar de asignación de presupuesto para poder continuar. Esperar respuesta del ministerio del deporte.</body></html>';

			$emailArray = array($emailPrincipal);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			
			/*=====  End of Email  ======*/

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "aprobacionUsuarioR":


			$valores2=array("estado='C'");
			$actualiza2=$objeto->getActualiza("poa_observaciones",$valores2,"idOrganismo",$idOrganismoPrincipal);


			/*=============================
			=            Email            =
			=============================*/
			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; envió las rectificaciones de aprobación de usuario. Esperar respuesta del ministerio del deporte.</body></html>';

			$emailArray = array($emailPrincipal);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			
			/*=====  End of Email  ======*/
			

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


	}

	echo json_encode($jason);





