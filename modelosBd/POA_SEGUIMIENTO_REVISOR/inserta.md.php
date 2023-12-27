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
	

	
    session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

	
		case  "recomendacion__tecnicos":

			$nombre__archivo=$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUSeguimientos';");

			$super__var=$superior__inmediatos[0][PersonaACargo];

			if ($rotulo__recomendado=="alto__rendimientos") {

				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","' ', ","' ', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","' ', ","' ', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","' ', ","' ', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","'$cumplimientos__tabla__alto', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado', ","'$aniosPeriodos__ingesos'"));

				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoAl='T',estadoAlR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);
		

			}else if($rotulo__recomendado=="formativo"){

				$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","'$beneficiarios__capa__de__eje__alto__meta', ","'$beneficiarios__even__prepa__de__eje__alto__meta', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","'$beneficiarios__capa__de__eje__alto__resultado', ","'$beneficiarios__even__prepa__de__eje__alto__resultado', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","'$porcentaje__c__beneficiarios__capa__de__e__alto', ","'$porcentaje__c__even__prepa__capa__de__e__alto', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado', ","'$aniosPeriodos__ingesos'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoF='T',estadoFR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);
				
			}else if($rotulo__recomendado=="contratacionPublica"){


				$nombre__archivo1="Actividad1__".$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";
				$nombre__archivo2="ContratacionPublica__".$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";

				$direccion1=VARIABLE__BACKEND."seguimiento/informes__contratacion/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo1);

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos2"]['type'],$_FILES["archivoSubido__seguimientos2"]['size'],$_FILES["archivoSubido__seguimientos2"]['tmp_name'],$_FILES["archivoSubido__seguimientos2"]['name'],$direccion1,$nombre__archivo2);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","'$beneficiarios__capa__de__eje__alto__meta', ","'$beneficiarios__even__prepa__de__eje__alto__meta', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","'$beneficiarios__capa__de__eje__alto__resultado', ","'$beneficiarios__even__prepa__de__eje__alto__resultado', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","'$porcentaje__c__beneficiarios__capa__de__e__alto', ","'$porcentaje__c__even__prepa__capa__de__e__alto', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo1', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'Actividad1', ","'$aniosPeriodos__ingesos'"));

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","'$beneficiarios__capa__de__eje__alto__meta', ","'$beneficiarios__even__prepa__de__eje__alto__meta', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","'$beneficiarios__capa__de__eje__alto__resultado', ","'$beneficiarios__even__prepa__de__eje__alto__resultado', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","'$porcentaje__c__beneficiarios__capa__de__e__alto', ","'$porcentaje__c__even__prepa__capa__de__e__alto', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","' ', ","' ', ","'$observaciones__alto__seguisContratacion', ","'$recomendaciones__alto__seguisContratacion', ","'$nombre__archivo2', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'ContratacionPublica', ","'$aniosPeriodos__ingesos'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET financiero='0',financieroR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				

				$resultado= $conexionEstablecida->exec($query);
				
			}else{

				$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","' ', ","' ', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","' ', ","' ', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","' ', ","' ', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$hombres__alto', ","'$mujeres__alto', ","'$personas__con__discapacidad__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","' ', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado', ","'$aniosPeriodos__ingesos'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET financiero='T',financieroR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$super__var', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observaciones__alto__seguis', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "recomienda__recomendado__seguimientos_ccontratacion_publica":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		if ($idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__contratacion/";

				$documento=$objeto->getEnviarPdf($_FILES["documentos__tecnicos_actividad1"]['type'],$_FILES["documentos__tecnicos_actividad1"]['size'],$_FILES["documentos__tecnicos_actividad1"]['tmp_name'],$_FILES["documentos__tecnicos_actividad1"]['name'],$direccion1,$nombreDocumentoactividad1);

				$documento1=$objeto->getEnviarPdf($_FILES["documentos__tecnicos_Contratacion"]['type'],$_FILES["documentos__tecnicos_Contratacion"]['size'],$_FILES["documentos__tecnicos_Contratacion"]['tmp_name'],$_FILES["documentos__tecnicos_Contratacion"]['name'],$direccion1,$nombreDocumentoContratacion);

	 			 $query="UPDATE poa_trimestrales SET financieroR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 			 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


	 		}else{

				$direccion1=VARIABLE__BACKEND."seguimiento/informes__contratacion/";

				$documento=$objeto->getEnviarPdf($_FILES["documentos__tecnicos_actividad1"]['type'],$_FILES["documentos__tecnicos_actividad1"]['size'],$_FILES["documentos__tecnicos_actividad1"]['tmp_name'],$_FILES["documentos__tecnicos_actividad1"]['name'],$direccion1,$nombreDocumentoactividad1);

				$documento1=$objeto->getEnviarPdf($_FILES["documentos__tecnicos_Contratacion"]['type'],$_FILES["documentos__tecnicos_Contratacion"]['size'],$_FILES["documentos__tecnicos_Contratacion"]['tmp_name'],$_FILES["documentos__tecnicos_Contratacion"]['name'],$direccion1,$nombreDocumentoContratacion);
				
		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");
				
		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


				 $query="UPDATE poa_trimestrales SET financieroR='0' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				 

				$insercion="INSERT INTO `ezonshar_mdepsaddb`.`poa_seguimiento_recomienda_tecnicos` (`idFuncionario`, `idOrganismo`, `fecha`, `hora`, `trimestre`, `observacionesTecnicas`, `tipo`, `fisicamente`, `perioIngreso`) VALUES ( '$idDirector__Seguis', '$organismoOculto__modal', '$fecha_actual', '$hora_actual', '$periodo', '$observacionesReasignaciones', 'Recomendado', '$fisicamenteE', '$aniosPeriodos__ingesos');";

				$resultado1= $conexionEstablecida->exec($insercion);

	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;




		case  "guardar__archivos__transferencia":

			

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			if($mes == "Enero" || $mes == "Julio"){

				$nombre__archivo1=$nombreArchivo."__".$mes."__".$anioa.".csv";
				
   
				$direccion1=VARIABLE__BACKEND."seguimiento/documentos_transferencia/";
   
				$documento=$objeto->getEnviarEXCELCSV($_FILES["nombreDocumentoactividad1"]['type'],$_FILES["nombreDocumentoactividad1"]['size'],$_FILES["nombreDocumentoactividad1"]['tmp_name'],$_FILES["nombreDocumentoactividad1"]['name'],$direccion1,$nombre__archivo1);
   

				
			}else{
				$nombre__archivo1=$nombreArchivo."__".$mes."__".$anioa.".csv";

   
				$direccion1=VARIABLE__BACKEND."seguimiento/documentos_transferencia/";
   
				$documento=$objeto->getEnviarEXCELCSV($_FILES["nombreDocumentoactividad1"]['type'],$_FILES["nombreDocumentoactividad1"]['size'],$_FILES["nombreDocumentoactividad1"]['tmp_name'],$_FILES["nombreDocumentoactividad1"]['name'],$direccion1,$nombre__archivo1);

				unlink($direccion1.$nombreArchivo."__".$mesAnterior."__".$anioa.".csv");
			}



			// $direccion1="../../documentos/seguimiento/documentos_transferencia/";

			// $documento=$objeto->getEnviarPdf($_FILES["documentos__tecnicos_actividad1"]['type'],$_FILES["documentos__tecnicos_actividad1"]['size'],$_FILES["documentos__tecnicos_actividad1"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumentoactividad1);

			// $documento1=$objeto->getEnviarPdf($_FILES["documentos__tecnicos_Contratacion"]['type'],$_FILES["documentos__tecnicos_Contratacion"]['size'],$_FILES["documentos__tecnicos_Contratacion"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumentoContratacion);

	 			

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "insertar__archivos__transferencia":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

			$nombre__archivo1=$nombreArchivo."__".$mes."__".$anioa.".csv";

			$direccion1=VARIABLE__BACKEND."seguimiento/documentos_transferencia/". $nombre__archivo1;

	
			if($nombreArchivo == "Bancos"){

					$sql="DELETE FROM poa_seguimiento_bancos";
							
					$resultado= $conexionEstablecida->exec($sql);

				 // Open uploaded CSV file with read-only mode
					$csvFile = fopen($direccion1, 'r');

					// Skip the first line
					fgetcsv($csvFile);
			
					// Parse data from CSV file line by line        
					while (($getData = fgetcsv($csvFile, 10000, ";")) !== FALSE)
					{

						// Get row data
						$nit = $getData[19];
						$nomBeneficiario = $getData[20];  
						$cur = $getData[9]; 
						$entidad = $getData[5];
						$entidad1=$getData[6];
						$entidad2=$getData[7];   
						$cuentaMonetariaDestino = $getData[15];   
						 
						$nombreEntidadBancaria = $getData[27];   
						$fechaConfirmacion = $getData[26];   

						$monto = $getData[16]; 
						$monto =str_replace(",", ".", "$monto");

					
						if (!strstr($fechaConfirmacion, '/')) {
							$fechaConfirmacion = '1';
						}

						if(strlen($nit) == 12){
							$nit = "0".$nit;
						}
			
						$insercion="INSERT INTO `ezonshar_mdepsaddb`.`poa_seguimiento_bancos` ( `nit`, `nomBeneficiario`, `cur`, `entidad`, `cuentaMonetariaDestino`, `nombreEntidadBancaria`, `fechaConfirmacion`, `monto`) VALUES ( '$nit', '$nomBeneficiario', $cur, CONCAT ( $entidad,'-', IF($entidad1<10, CONCAT ('000', $entidad1),$entidad1), '-',CONCAT ('000', $entidad2 )), '$cuentaMonetariaDestino', '$nombreEntidadBancaria',  IF($fechaConfirmacion = '1', null,STR_TO_DATE(REPLACE('$fechaConfirmacion','/',' '), '%d %m %Y')),$monto); ";

						
						$resultado1= $conexionEstablecida->exec($insercion);

						}
						
					
			
					// Close opened CSV file
					fclose($csvFile);

			
				
			}else{
				$sql="DELETE FROM poa_seguimiento_transferencias";
							
					$resultado= $conexionEstablecida->exec($sql);

				$csvFile = fopen($direccion1, 'r');

					// Skip the first line
					fgetcsv($csvFile);
			
					// Parse data from CSV file line by line        
					while (($getData = fgetcsv($csvFile, 10000, ";")) !== FALSE)
					{
						// Get row data
						$nit = $getData[8];
						$cur = $getData[3]; 
						$entidad = $getData[1];   
						$nombreEntidad = $getData[2];   
						$nomBeneficiario = $getData[20];   
						$descripcion = $getData[9];   
						$monto = $getData[13];   
						$fechaPago = $getData[19];   
						$anio = $getData[0]; 
						$estado = $getData[10]; 
						$monto =str_replace(",", ".", "$monto");
					
						if(strlen($nit) == 12){
							$nit = "0".$nit;
						}
			
						$insercion="INSERT INTO `poa_seguimiento_transferencias` (`nit`, `cur`, `entidad`, `nombreEntidad`, `estado`, `nomBeneficiario`, `descripcion`, `monto`, `fechaPago`, `anio`) VALUES ('$nit', $cur, '$entidad', '$nombreEntidad', '$estado', '$nomBeneficiario', '$descripcion', $monto, STR_TO_DATE(REPLACE('$fechaPago','/',' '), '%d %m %Y'), $anio);";

						
						$resultado1= $conexionEstablecida->exec($insercion);

						}
						
					
			
					// Close opened CSV file
					fclose($csvFile);
				
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;	

		break;



		//******************************* Guardado info seleccionable infraestructura ********************************//


		case  "seguimiento__infraestructura_reporte":
			
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			$arrayInformacion = json_decode($prametros);
			
			$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

			$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT detalle FROM poa_seguimiento_reporte_infraestructura WHERE idOrganismo = '$arrayInformacion[1]' AND perioIngreso='$aniosPeriodos__ingesos' AND idMantenimiento='$arrayInformacion[2]' AND trimestre='$arrayInformacion[3]';");
				
			if (!empty($select_ifExist[0][detalle])) {
				
				$query="UPDATE `poa_seguimiento_reporte_infraestructura` SET  `detalle` = '$arrayInformacion[0]' WHERE idOrganismo = '$arrayInformacion[1]' AND perioIngreso='$aniosPeriodos__ingesos' AND idMantenimiento='$arrayInformacion[2]' AND trimestre='$arrayInformacion[3]';";
				
				$resultado= $conexionEstablecida->exec($query);
				

			}else{

				$objeto->insertSingleRow('poa_seguimiento_reporte_infraestructura',['detalle','idOrganismo','idMantenimiento','fecha','perioIngreso','trimestre'],array(':detalle' => $arrayInformacion[0],':idOrganismo' => $arrayInformacion[1],':idMantenimiento' => $arrayInformacion[2],':fecha' => $fecha_actual,':perioIngreso' => $aniosPeriodos__ingesos,':trimestre' => $arrayInformacion[3]));
				
			}

			

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		//******************************* Guardado fechas plazos ********************************//


		case  "guarda__seguimientos__plazos":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			$arrayD = json_decode($array);

			if ($trimestre=="primerTrimestre") {
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";		
			}else if($trimestre=="tercerTrimestre"){
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";		
			}else if($trimestre=="cuartoTrimestre"){
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";		
			}


			foreach ($arrayD as $clave => $valor) {

				
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos__seguimientos FROM poa_seguimiento_plazos WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");
				
				if (!empty($select_ifExist[0][idPlazos__seguimientos])) {
					
					$query="UPDATE `poa_seguimiento_plazos` SET  `$columnaFecha` = '$fecha' , `$columnaEstado` = '$estado', `fecha`='$fecha_actual' WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso` ) VALUES ('$fecha','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos' ) ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				
				
			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		//******************************* Guardado fechas plazos personal ********************************//


		case  "guarda__seguimientos__plazos__personal":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			if ($trimestre=="primerTrimestre") {
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
				$columnaDocumento="documentoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";	
				$columnaDocumento="documentoTrimestre2";	
			}else if($trimestre=="tercerTrimestre"){
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";	
				$columnaDocumento="documentoTrimestre3";	
			}else if($trimestre=="cuartoTrimestre"){
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";	
				$columnaDocumento="documentoTrimestre4";	
			}

			$nombre__archivo1=$tipoDocumento."__".$idOrganismo."__".$trimestre."__".$fecha_actual."__".$hora_actual2."__".$aniosPeriodos__ingesos.".pdf";
				
			$direccion1=VARIABLE__BACKEND."seguimiento/documentos_plazos/";
			
			$documento=$objeto->getEnviarPdf($_FILES["nombreDocumentoactividad1"]['type'],$_FILES["nombreDocumentoactividad1"]['size'],$_FILES["nombreDocumentoactividad1"]['tmp_name'],$_FILES["nombreDocumentoactividad1"]['name'],$direccion1,$nombre__archivo1);
			
		
			$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos__seguimientos,$columnaEstado, $columnaDocumento FROM poa_seguimiento_plazos WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");
			
			if (!empty($select_ifExist[0][idPlazos__seguimientos])) {
				
				$documentoHistorico = $select_ifExist[0][$columnaDocumento];
				$estadoHistorico = $select_ifExist[0][$columnaEstado];
				
				$query="UPDATE `poa_seguimiento_plazos` SET  `$columnaFecha` = '$fecha' , `$columnaEstado` = '$tipoDocumento', `$columnaDocumento` = '$nombre__archivo1', `fecha`='$fecha_actual' WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
				
				$resultado= $conexionEstablecida->exec($query);

				$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estadoHistorico','$documentoHistorico','$trimestre','$idOrganismo','$aniosPeriodos__ingesos' )  ;";

				$resultado= $conexionEstablecida->exec($query);
				

			}else{
				$query="INSERT INTO `poa_seguimiento_plazos` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso`, `$columnaDocumento` ) VALUES ('$fecha','$tipoDocumento','$fecha_actual','$idOrganismo','$aniosPeriodos__ingesos','$nombre__archivo1' ) ;";

				$resultado= $conexionEstablecida->exec($query);
				
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		//******************************* Guardado estado plazos ********************************//


		case  "guarda__seguimientos__plazos__estado":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			$arrayD = json_decode($array);

			if ($trimestre=="primerTrimestre") {
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
				$columnaDocumento="documentoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";	
				$columnaDocumento="documentoTrimestre2";	
			}else if($trimestre=="tercerTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";	
				$columnaDocumento="documentoTrimestre3";	
			}else if($trimestre=="cuartoTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";	
				$columnaDocumento="documentoTrimestre4";	
			}


			foreach ($arrayD as $clave => $valor) {

				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos, $columnaEstado, $columnaDocumento FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");
			
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$documentoHistorico = $select_ifExist[0][$columnaDocumento];
					$estadoHistorico = $select_ifExist[0][$columnaEstado];

					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `fecha`='$fecha_actual' , `$columnaDocumento`=NULL WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estadoHistorico','$documentoHistorico','$trimestre','$valor','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso` ) VALUES ('$fecha_actual','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos' ) ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				foreach ($arrayNombreODCuartoTrimestre as $clave => $valor1) {
					$odSuspendidas .= "<span style='font-weight:bold;'>$valor1</span><br>";
				}

				$select_ifExist1=$objeto->getObtenerInformacionGeneral("SELECT $columnaFecha FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND $columnaEstado='SUSPENSION' AND perioIngreso='$aniosPeriodos__ingesos';");

	
				$select_nombre=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreOrganismo FROM poa_organismo WHERE idOrganismo = '$valor'");

				$valor1=$select_nombre[0][nombreOrganismo];
				$fechaSuspension=$select_ifExist1[0][$columnaFecha];

				$odSuspendidas = "<span style='font-weight:bold;'>$valor1</span><br>";


				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br>La Ley del Deporte, Educación Física y Recreación, en el Título XVI De las Sanciones, establece lo siguiente:<br><br><br>"Art. 166.- Del incumplimiento y Tipos de Sanciones.- El incumplimiento de las disposiciones consagradas en la presente Ley por parte de los dirigentes, autoridades, técnicos en general, así como las y los deportistas, dará lugar a que el Ministerio Sectorial, respetando el debido proceso, imponga las siguientes sanciones:<br> 1.	Amonestación<br>2.	Sanción económica;<br> 3.	Suspensión temporal;<br> 4.	Suspensión definitiva; y,<br> 5.	Limitación, reducción o cancelación de los estímulos concedidos.<br><br> Art. 173.- De la Sanción Económica.- Se contemplan tres tipos de sanciones económicas, a saber:<br> 1.	Multas<br>2.	Suspensión temporal de asignaciones presupuestarias; y,<br>3.	Retiro definitivo de asignaciones presupuestarias.<br><br> (...) <u>en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia".</u><br><br> El Informe Nro. DPO-0009-2019 emitido por la Contraloría General del Estado, correspondiente al "Examen especial a las transferencias, uso, liquidación y control de los recursos financieros entregados a las Ligas Deportivas de la provincia de Orellana por el Ministerio del Deporte", en su recomendación 5, establece lo siguiente:<br><br> “Previo a realizar las transferencias económicas a los Organismos Deportivos solicitará al Coordinador Zonal, remita el detalle de los Organismos Deportivos que no cumplieron con la presentación de la información para el seguimiento y evaluación de los POAS, a fin de suspender oportunamente las transferencias de los recursos financieros, hasta que presenten la documentación completa para el seguimiento y evaluación”. <br><br>Mediante Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus modificaciones, se expide "El Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas", y se establece lo siguiente:<br><br> "Artículo 43. Incumplimiento en la presentación de información.- En el caso de que las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta que las organizaciones deportivas presenten lo requerido".<br><br>El "Procedimiento de Seguimiento y Evaluación a las Planificaciones Operativas Anuales de las Organizaciones Deportivas", emitido en mayo de 2023, establece en la actividad 10: "Si la organización deportiva no reportó en el plazo establecido, se notificará la suspensión temporal de las transferencias que corresponda según el flujo de POA aprobado".<br><br> En este sentido, se solicitó a las siguientes organizaciones deportivas cargar la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.'</span>, hasta el <span style="font-weight:bold;">'.$fecha_actual.'</span>; sin embargo, en cumplimiento a la normativa legal vigente, y una vez fenecidos los plazos establecidos para la presentación de información, se observa que no han remitido la información requerida:<br><br>  <span style="font-weight:bold;">'.$odSuspendidas.'</span><br><br>Por lo expuesto, se solicita que, en el ámbito de sus competencias, se realice la suspensión temporal de transferencias de recursos financieros correspondientes al POA 2023.<br><br>Particular que comunico para los fines pertinentes.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de suspensión temporal de transferencia de recursos financieros correspondientes al POA $aniosPeriodos__ingesos");	

				
			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "guarda__seguimientos__plazos__estado_documentos":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			$arrayD = json_decode($array);

			if ($trimestre=="primerTrimestre") {
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
				$columnaDocumento="documentoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";	
				$columnaDocumento="documentoTrimestre2";	
			}else if($trimestre=="tercerTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";	
				$columnaDocumento="documentoTrimestre3";	
			}else if($trimestre=="cuartoTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";	
				$columnaDocumento="documentoTrimestre4";	
			}

			

			$nombre__archivo1=$estado."__".$trimestre."__".$fecha_actual."__".$hora_actual2."__".$aniosPeriodos__ingesos.".pdf";
				
   
			$direccion1=VARIABLE__BACKEND."seguimiento/documentos_plazos/";

			$documento=$objeto->getEnviarPdf($_FILES["nombreDocumentoactividad1"]['type'],$_FILES["nombreDocumentoactividad1"]['size'],$_FILES["nombreDocumentoactividad1"]['tmp_name'],$_FILES["nombreDocumentoactividad1"]['name'],$direccion1,$nombre__archivo1);

			foreach ($arrayD as $clave => $valor) {

				
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos, $columnaEstado, $columnaDocumento FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");

				$select_ifExist1=$objeto->getObtenerInformacionGeneral("SELECT $columnaFecha FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND $columnaEstado='SUSPENSION' AND perioIngreso='$aniosPeriodos__ingesos';");

	
				$select_nombre=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreOrganismo FROM poa_organismo WHERE idOrganismo = '$valor'");

				$valor1=$select_nombre[0][nombreOrganismo];
				$fechaSuspension=$select_ifExist1[0][$columnaFecha];

				$odSuspendidas = "<span style='font-weight:bold;'>$valor1</span><br>";
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$documentoHistorico = $select_ifExist[0][$columnaDocumento];
					$estadoHistorico = $select_ifExist[0][$columnaEstado];

					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `$columnaDocumento` = '$nombre__archivo1', `fecha`='$fecha_actual' WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estadoHistorico','$documentoHistorico','$trimestre','$valor','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso`, `$columnaDocumento` ) VALUES('$fecha_actual','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos','$nombre__archivo1' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				if($estado=="REACTIVACION"){

	
						$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante notificación por correo electrónico emitido el <span style="font-weight:bold;">'.$fechaSuspension.'</span>, en cumplimiento a la normativa legal vigente, se remitió el detalle de las organizaciones deportivas que no habían remitido la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.' </span>; y se solicitó, en el ámbito de sus competencias, se realice la suspensión temporal de transferencias de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.'. <br><br> En este sentido, y una vez que se ha identificado que la <span style="font-weight:bold;">'.$odSuspendidas.' </span> ha remitido la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.' </span>, me permito solicitar se realice la reactivación de las transferencias de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.' de mencionada organización deportiva, conforme lo establecido en la normativa<br><br>Particular que comunico para los fines pertinentes.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
					
	
						//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
						$emailArray = array("miperez@deporte.gob.ec");
							
						$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de reactivación de transferencia de recursos financieros correspondientes al POA $aniosPeriodos__ingesos");	
	
					
	
					
				}else if($estado=="AJUSTE"){

					
					$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus modificaciones, se expide  <i>"El Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas"</i>, y se establece lo siguiente:<br><br> "<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta que las organizaciones deportivas presenten lo requerido".<br><br>   "<span style="font-weight:bold;">Artículo 44. De la reactivación de las transferencias.-</span> La organización deportiva podrá solicitar la reactivación de las transferencias de recursos, siempre y cuando dicha petición se efectúe hasta los quince primeros días del mes siguiente en el cual se configuró el incumplimiento, y que haya reportado a través del aplicativo informático la información señalada en el artículo 42 del presente Acuerdo Ministerial. En cuyo caso, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera la verificación del cumplimiento de las obligaciones de la organización deportiva y solicitará la reactivación de las transferencias.<br><br><u>En caso de que las organizaciones deportivas no presenten la información en los tiempos y formatos establecidos en el párrafo precedente, la Dirección de Seguimiento de Planes, Programas y Proyectos, solicitará a la Dirección de Planificación e Inversión, se revise la planificación de las organizaciones deportivas y se ajuste las actividades a los meses restantes del ejercicio fiscal, sin que pueda reclamarse la asignación retroactiva de valores (...)"</u><br><br> Mediante correo electrónico se comunicó a la organización deportiva, respecto a la suspensión temporal de transferencias de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.', debido a que fenecidos los plazos establecidos para la presentación de información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">'.$semestre.' '.$aniosPeriodos__ingesos.' </span>, no se identificó el reporte respectivo; y, se otorgó como fecha máxima para la presentación de mencionada información, el <span style="font-weight:bold;">'.$fechaSuspension.'</span><br><br> Por lo expuesto, en cumplimiento a la normativa legal vigente, me permito indicar que, una vez que se ha verificado que las organizaciones deportivas detalladas en el documento adjunto, no han remitido la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al  <span style="font-weight:bold;">'.$semestre.' '.$aniosPeriodos__ingesos.' </span> en el aplicativo, se solicita se revise la Planificación Operativa Anual '.$aniosPeriodos__ingesos.' de la <span style="font-weight:bold;">'.$odSuspendidas.' </span>, y se ajusten las actividades a los meses restantes del ejercicio fiscal, conforme lo establecido en el artículo 44 del Acuerdo Ministerial Nro. 0456 y sus reformas.<br><br> Con sentimientos de distinguida consideración.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
					
	
					//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
					$emailArray = array("miperez@deporte.gob.ec");
						
					$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de revisión de la Planificación Operativa Anual $aniosPeriodos__ingesos y ajuste de las actividades POA $aniosPeriodos__ingesos por suspensión de transferencias");	
				}

				
				
			}

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "guarda__seguimientos__plazos__estado__suspenciones__automaticas":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			$arrayOrganismoPrimerTrimestreD = json_decode($arrayOrganismoPrimerTrimestre);
			$arrayOrganismoSegundoTrimestreD = json_decode($arrayOrganismoSegundoTrimestre);
			$arrayOrganismoTercerTrimestreD = json_decode($arrayOrganismoTercerTrimestre);
			$arrayOrganismoCuartoTrimestreD = json_decode($arrayOrganismoCuartoTrimestre);

			$arrayCorreoPrimerTrimestreD = json_decode($arrayCorreoPrimerTrimestre);
			$arrayCorreoSegundoTrimestreD = json_decode($arrayCorreoSegundoTrimestre);
			$arrayCorreoTercerTrimestreD = json_decode($arrayCorreoTercerTrimestre);
			$arrayCorreoCuartoTrimestreD = json_decode($arrayCorreoCuartoTrimestre);

			$arrayNombreODPrimerTrimestre = json_decode($arrayNombreODPrimerTrimestre);
			$arrayNombreODSegundoTrimestre = json_decode($arrayNombreODSegundoTrimestre);
			$arrayNombreODTercerTrimestre = json_decode($arrayNombreODTercerTrimestre);
			$arrayNombreODCuartoTrimestre = json_decode($arrayNombreODCuartoTrimestre);

			$arrayFechaPrimerTrimestre = json_decode($arrayFechaPrimerTrimestre);
			$arrayFechaSegundoTrimestre = json_decode($arrayFechaSegundoTrimestre);
			$arrayFechaTercerTrimestre = json_decode($arrayFechaTercerTrimestre);
			$arrayFechaCuartoTrimestre = json_decode($arrayFechaCuartoTrimestre);

			if ($trimestre=="primerTrimestre") {
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";		
			}else if($trimestre=="tercerTrimestre"){
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";		
			}else if($trimestre=="cuartoTrimestre"){
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";		
			}

			$i = 0;
			foreach ($arrayOrganismoPrimerTrimestreD as $clave => $valor) {

				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
				$columnaDocumento="documentoTrimestre1";
				
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `fecha`='$fecha_actual', `$columnaDocumento`=NULL WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso` ) VALUES ('$fecha_actual','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos' ) ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaPrimerTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoPrimerTrimestreD[$i]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del I Semestre del POA $aniosPeriodos__ingesos");	

				$i++;
				
			}

			$j=0;
			foreach ($arrayOrganismoSegundoTrimestreD as $clave => $valor) {

				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";
				$columnaDocumento="documentoTrimestre2";

				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `fecha`='$fecha_actual', `$columnaDocumento`=NULL WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso` ) VALUES ('$fecha_actual','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos' ) ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaPrimerTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoSegundoTrimestreD[$j]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del I Semestre del POA $aniosPeriodos__ingesos");	

				$j++;
				
			}

			$k=0;
			foreach ($arrayOrganismoTercerTrimestreD as $clave => $valor) {

				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";	
				$columnaDocumento="documentoTrimestre3";
				
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `fecha`='$fecha_actual',`$columnaDocumento`=NULL WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso` ) VALUES ('$fecha_actual','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos' ) ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaPrimerTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoTercerTrimestreD[$k]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del I Semestre del POA $aniosPeriodos__ingesos");	

				$k++;

				
				
			}

			$l=0;
			foreach ($arrayOrganismoCuartoTrimestreD as $clave => $valor) {

				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";
				$columnaDocumento="documentoTrimestre4";
				
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos';");
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `fecha`='$fecha_actual',`$columnaDocumento`=NULL WHERE idOrganismo = '$valor' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso` ) VALUES ('$fecha_actual','$estado','$fecha_actual','$valor','$aniosPeriodos__ingesos' ) ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">'.$trimestre.' '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaPrimerTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del I Semestre del POA $aniosPeriodos__ingesos");	

				$l++;
				
				
			}

			if(count($arrayNombreODPrimerTrimestre)  > 0){

				foreach ($arrayNombreODPrimerTrimestre as $clave => $valor1) {
					$odSuspendidas .= "<span style='font-weight:bold;'>$valor1</span><br>";
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br>La Ley del Deporte, Educación Física y Recreación, en el Título XVI De las Sanciones, establece lo siguiente:<br><br><br>"Art. 166.- Del incumplimiento y Tipos de Sanciones.- El incumplimiento de las disposiciones consagradas en la presente Ley por parte de los dirigentes, autoridades, técnicos en general, así como las y los deportistas, dará lugar a que el Ministerio Sectorial, respetando el debido proceso, imponga las siguientes sanciones:<br> 1.	Amonestación<br>2.	Sanción económica;<br> 3.	Suspensión temporal;<br> 4.	Suspensión definitiva; y,<br> 5.	Limitación, reducción o cancelación de los estímulos concedidos.<br><br> Art. 173.- De la Sanción Económica.- Se contemplan tres tipos de sanciones económicas, a saber:<br> 1.	Multas<br>2.	Suspensión temporal de asignaciones presupuestarias; y,<br>3.	Retiro definitivo de asignaciones presupuestarias.<br><br> (...) <u>en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia".</u><br><br> El Informe Nro. DPO-0009-2019 emitido por la Contraloría General del Estado, correspondiente al "Examen especial a las transferencias, uso, liquidación y control de los recursos financieros entregados a las Ligas Deportivas de la provincia de Orellana por el Ministerio del Deporte", en su recomendación 5, establece lo siguiente:<br><br> “Previo a realizar las transferencias económicas a los Organismos Deportivos solicitará al Coordinador Zonal, remita el detalle de los Organismos Deportivos que no cumplieron con la presentación de la información para el seguimiento y evaluación de los POAS, a fin de suspender oportunamente las transferencias de los recursos financieros, hasta que presenten la documentación completa para el seguimiento y evaluación”. <br><br>Mediante Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus modificaciones, se expide "El Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas", y se establece lo siguiente:<br><br> "Artículo 43. Incumplimiento en la presentación de información.- En el caso de que las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta que las organizaciones deportivas presenten lo requerido".<br><br>El "Procedimiento de Seguimiento y Evaluación a las Planificaciones Operativas Anuales de las Organizaciones Deportivas", emitido en mayo de 2023, establece en la actividad 10: "Si la organización deportiva no reportó en el plazo establecido, se notificará la suspensión temporal de las transferencias que corresponda según el flujo de POA aprobado".<br><br> En este sentido, se solicitó a las siguientes organizaciones deportivas cargar la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">I Trimestre '.$aniosPeriodos__ingesos.'</span>, hasta el <span style="font-weight:bold;">'.$arrayFechaPrimerTrimestre[0].'</span>; sin embargo, en cumplimiento a la normativa legal vigente, y una vez fenecidos los plazos establecidos para la presentación de información, se observa que no han remitido la información requerida:<br><br>  <span style="font-weight:bold;">'.$odSuspendidas.'</span><br><br>Por lo expuesto, se solicita que, en el ámbito de sus competencias, se realice la suspensión temporal de transferencias de recursos financieros correspondientes al POA 2023.<br><br>Particular que comunico para los fines pertinentes.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de suspensión temporal de transferencia de recursos financieros correspondientes al POA $aniosPeriodos__ingesos");	


			}

			if(count($arrayNombreODSegundoTrimestre) > 0){

				foreach ($arrayNombreODSegundoTrimestre as $clave => $valor1) {
					$odSuspendidas .= "<span style='font-weight:bold;'>$valor1</span><br>";
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br>La Ley del Deporte, Educación Física y Recreación, en el Título XVI De las Sanciones, establece lo siguiente:<br><br><br>"Art. 166.- Del incumplimiento y Tipos de Sanciones.- El incumplimiento de las disposiciones consagradas en la presente Ley por parte de los dirigentes, autoridades, técnicos en general, así como las y los deportistas, dará lugar a que el Ministerio Sectorial, respetando el debido proceso, imponga las siguientes sanciones:<br> 1.	Amonestación<br>2.	Sanción económica;<br> 3.	Suspensión temporal;<br> 4.	Suspensión definitiva; y,<br> 5.	Limitación, reducción o cancelación de los estímulos concedidos.<br><br> Art. 173.- De la Sanción Económica.- Se contemplan tres tipos de sanciones económicas, a saber:<br> 1.	Multas<br>2.	Suspensión temporal de asignaciones presupuestarias; y,<br>3.	Retiro definitivo de asignaciones presupuestarias.<br><br> (...) <u>en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia".</u><br><br> El Informe Nro. DPO-0009-2019 emitido por la Contraloría General del Estado, correspondiente al "Examen especial a las transferencias, uso, liquidación y control de los recursos financieros entregados a las Ligas Deportivas de la provincia de Orellana por el Ministerio del Deporte", en su recomendación 5, establece lo siguiente:<br><br> “Previo a realizar las transferencias económicas a los Organismos Deportivos solicitará al Coordinador Zonal, remita el detalle de los Organismos Deportivos que no cumplieron con la presentación de la información para el seguimiento y evaluación de los POAS, a fin de suspender oportunamente las transferencias de los recursos financieros, hasta que presenten la documentación completa para el seguimiento y evaluación”. <br><br>Mediante Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus modificaciones, se expide "El Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas", y se establece lo siguiente:<br><br> "Artículo 43. Incumplimiento en la presentación de información.- En el caso de que las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta que las organizaciones deportivas presenten lo requerido".<br><br>El "Procedimiento de Seguimiento y Evaluación a las Planificaciones Operativas Anuales de las Organizaciones Deportivas", emitido en mayo de 2023, establece en la actividad 10: "Si la organización deportiva no reportó en el plazo establecido, se notificará la suspensión temporal de las transferencias que corresponda según el flujo de POA aprobado".<br><br> En este sentido, se solicitó a las siguientes organizaciones deportivas cargar la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">II Trimestre '.$aniosPeriodos__ingesos.'</span>, hasta el <span style="font-weight:bold;">'.$arrayFechaSegundoTrimestre[0].'</span>; sin embargo, en cumplimiento a la normativa legal vigente, y una vez fenecidos los plazos establecidos para la presentación de información, se observa que no han remitido la información requerida:<br><br>  <span style="font-weight:bold;">'.$odSuspendidas.'</span><br><br>Por lo expuesto, se solicita que, en el ámbito de sus competencias, se realice la suspensión temporal de transferencias de recursos financieros correspondientes al POA 2023.<br><br>Particular que comunico para los fines pertinentes.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de suspensión temporal de transferencia de recursos financieros correspondientes al POA $aniosPeriodos__ingesos");	

			}

			if(count($arrayNombreODTercerTrimestre) > 0){

				foreach ($arrayNombreODTercerTrimestre as $clave => $valor1) {
					$odSuspendidas .= "<span style='font-weight:bold;'>$valor1</span><br>";
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br>La Ley del Deporte, Educación Física y Recreación, en el Título XVI De las Sanciones, establece lo siguiente:<br><br><br>"Art. 166.- Del incumplimiento y Tipos de Sanciones.- El incumplimiento de las disposiciones consagradas en la presente Ley por parte de los dirigentes, autoridades, técnicos en general, así como las y los deportistas, dará lugar a que el Ministerio Sectorial, respetando el debido proceso, imponga las siguientes sanciones:<br> 1.	Amonestación<br>2.	Sanción económica;<br> 3.	Suspensión temporal;<br> 4.	Suspensión definitiva; y,<br> 5.	Limitación, reducción o cancelación de los estímulos concedidos.<br><br> Art. 173.- De la Sanción Económica.- Se contemplan tres tipos de sanciones económicas, a saber:<br> 1.	Multas<br>2.	Suspensión temporal de asignaciones presupuestarias; y,<br>3.	Retiro definitivo de asignaciones presupuestarias.<br><br> (...) <u>en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia".</u><br><br> El Informe Nro. DPO-0009-2019 emitido por la Contraloría General del Estado, correspondiente al "Examen especial a las transferencias, uso, liquidación y control de los recursos financieros entregados a las Ligas Deportivas de la provincia de Orellana por el Ministerio del Deporte", en su recomendación 5, establece lo siguiente:<br><br> “Previo a realizar las transferencias económicas a los Organismos Deportivos solicitará al Coordinador Zonal, remita el detalle de los Organismos Deportivos que no cumplieron con la presentación de la información para el seguimiento y evaluación de los POAS, a fin de suspender oportunamente las transferencias de los recursos financieros, hasta que presenten la documentación completa para el seguimiento y evaluación”. <br><br>Mediante Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus modificaciones, se expide "El Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas", y se establece lo siguiente:<br><br> "Artículo 43. Incumplimiento en la presentación de información.- En el caso de que las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta que las organizaciones deportivas presenten lo requerido".<br><br>El "Procedimiento de Seguimiento y Evaluación a las Planificaciones Operativas Anuales de las Organizaciones Deportivas", emitido en mayo de 2023, establece en la actividad 10: "Si la organización deportiva no reportó en el plazo establecido, se notificará la suspensión temporal de las transferencias que corresponda según el flujo de POA aprobado".<br><br> En este sentido, se solicitó a las siguientes organizaciones deportivas cargar la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">III Trimestre '.$aniosPeriodos__ingesos.'</span>, hasta el <span style="font-weight:bold;">'.$arrayFechaTercerTrimestre[0].'</span>; sin embargo, en cumplimiento a la normativa legal vigente, y una vez fenecidos los plazos establecidos para la presentación de información, se observa que no han remitido la información requerida:<br><br>  <span style="font-weight:bold;">'.$odSuspendidas.'</span><br><br>Por lo expuesto, se solicita que, en el ámbito de sus competencias, se realice la suspensión temporal de transferencias de recursos financieros correspondientes al POA 2023.<br><br>Particular que comunico para los fines pertinentes.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de suspensión temporal de transferencia de recursos financieros correspondientes al POA $aniosPeriodos__ingesos");	

			}

			if(count($arrayNombreODCuartoTrimestre) > 0){

				foreach ($arrayNombreODCuartoTrimestre as $clave => $valor1) {
					$odSuspendidas .= "<span style='font-weight:bold;'>$valor1</span><br>";
				}

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br>La Ley del Deporte, Educación Física y Recreación, en el Título XVI De las Sanciones, establece lo siguiente:<br><br><br>"Art. 166.- Del incumplimiento y Tipos de Sanciones.- El incumplimiento de las disposiciones consagradas en la presente Ley por parte de los dirigentes, autoridades, técnicos en general, así como las y los deportistas, dará lugar a que el Ministerio Sectorial, respetando el debido proceso, imponga las siguientes sanciones:<br> 1.	Amonestación<br>2.	Sanción económica;<br> 3.	Suspensión temporal;<br> 4.	Suspensión definitiva; y,<br> 5.	Limitación, reducción o cancelación de los estímulos concedidos.<br><br> Art. 173.- De la Sanción Económica.- Se contemplan tres tipos de sanciones económicas, a saber:<br> 1.	Multas<br>2.	Suspensión temporal de asignaciones presupuestarias; y,<br>3.	Retiro definitivo de asignaciones presupuestarias.<br><br> (...) <u>en el caso en que la organización deportiva no haya registrado su directorio en el Ministerio Sectorial, no haya presentado el plan operativo anual dentro del plazo establecido en la presente Ley, o la información anual requerida, se suspenderá de manera inmediata y sin más trámite las transferencias, hasta que se subsane dicha inobservancia".</u><br><br> El Informe Nro. DPO-0009-2019 emitido por la Contraloría General del Estado, correspondiente al "Examen especial a las transferencias, uso, liquidación y control de los recursos financieros entregados a las Ligas Deportivas de la provincia de Orellana por el Ministerio del Deporte", en su recomendación 5, establece lo siguiente:<br><br> “Previo a realizar las transferencias económicas a los Organismos Deportivos solicitará al Coordinador Zonal, remita el detalle de los Organismos Deportivos que no cumplieron con la presentación de la información para el seguimiento y evaluación de los POAS, a fin de suspender oportunamente las transferencias de los recursos financieros, hasta que presenten la documentación completa para el seguimiento y evaluación”. <br><br>Mediante Acuerdo Ministerial Nro. 0456 de 30 de diciembre de 2021 y sus modificaciones, se expide "El Procedimiento que regula el Ciclo de la Planificación de las Organizaciones Deportivas", y se establece lo siguiente:<br><br> "Artículo 43. Incumplimiento en la presentación de información.- En el caso de que las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias hasta que las organizaciones deportivas presenten lo requerido".<br><br>El "Procedimiento de Seguimiento y Evaluación a las Planificaciones Operativas Anuales de las Organizaciones Deportivas", emitido en mayo de 2023, establece en la actividad 10: "Si la organización deportiva no reportó en el plazo establecido, se notificará la suspensión temporal de las transferencias que corresponda según el flujo de POA aprobado".<br><br> En este sentido, se solicitó a las siguientes organizaciones deportivas cargar la información para el seguimiento y evaluación de la Planificación Operativa Anual correspondiente al <span style="font-weight:bold;">IV Trimestre '.$aniosPeriodos__ingesos.'</span>, hasta el <span style="font-weight:bold;">'.$arrayFechaCuartoTrimestre[0].'</span>; sin embargo, en cumplimiento a la normativa legal vigente, y una vez fenecidos los plazos establecidos para la presentación de información, se observa que no han remitido la información requerida:<br><br>  <span style="font-weight:bold;">'.$odSuspendidas.'</span><br><br>Por lo expuesto, se solicita que, en el ámbito de sus competencias, se realice la suspensión temporal de transferencias de recursos financieros correspondientes al POA 2023.<br><br>Particular que comunico para los fines pertinentes.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
				$emailArray = array("miperez@deporte.gob.ec");
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de suspensión temporal de transferencia de recursos financieros correspondientes al POA $aniosPeriodos__ingesos");	

			}



			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		//******************************* Notificar Correo Plazos ********************************//
		case  "notificar__correos__plazos__ODS":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			$arrayOrganismoPrimerTrimestreD = json_decode($arrayOrganismoPrimerTrimestre);
			$arrayOrganismoSegundoTrimestreD = json_decode($arrayOrganismoSegundoTrimestre);
			$arrayOrganismoTercerTrimestreD = json_decode($arrayOrganismoTercerTrimestre);
			$arrayOrganismoCuartoTrimestreD = json_decode($arrayOrganismoCuartoTrimestre);

			$arrayFechaPrimerTrimestreD = json_decode($arrayFechaPrimerTrimestre);
			$arrayFechaSegundoTrimestreD = json_decode($arrayFechaSegundoTrimestre);
			$arrayFechaTercerTrimestreD = json_decode($arrayFechaTercerTrimestre);
			$arrayFechaCuartoTrimestreD = json_decode($arrayFechaCuartoTrimestre);

			$i=0;
			foreach ($arrayOrganismoPrimerTrimestreD as $clave => $valor) {

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">I Trimestre '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaPrimerTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($correoEnviar);
				$emailArray = array($valor);
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del I Semestre del POA $aniosPeriodos__ingesos");		

				$i++;
			}

			$j=0;
			foreach ($arrayOrganismoSegundoTrimestreD as $clave => $valor) {

				
				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">II Trimestre '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaSegundoTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($correoEnviar);
				$emailArray = array($valor);
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del I Semestre del POA $aniosPeriodos__ingesos");		

				$j++;
				
				
			}

			$k=0;
			foreach ($arrayOrganismoTercerTrimestreD as $clave => $valor) {

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">III Trimestre '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaTercerTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($correoEnviar);
				$emailArray = array($valor);
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del II Semestre del POA $aniosPeriodos__ingesos");		

				$k++;

				
				
			}

			$l=0;
			foreach ($arrayOrganismoCuartoTrimestreD as $clave => $valor) {

				$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<center><span style="font-weight:bold; text-align: center;">COMUNICADO</span></center><br><br>Se recuerda a las organizaciones deportivas que, en cumplimiento a lo establecido en el Acuerdo Ministerial Nro. 0456 y sus modificaciones, y a las notificaciones realizadas mediante oficio y correo electrónico, la información correspondiente al <span style="font-weight:bold;">IV Trimestre '.$aniosPeriodos__ingesos.'</span>, debe ser cargada en el aplicativo informático hasta el <span style="font-weight:bold;">'.$arrayFechaCuartoTrimestreD[$i].'</span><br><br>Cabe indicar que el artículo 43 de mencionado acuerdo, establece: “<span style="font-weight:bold;">Artículo 43. Incumplimiento en la presentación de información.-</span> En el caso de que <u>las organizaciones deportivas no presenten la información para el proceso de seguimiento y evaluación a través de las herramientas y términos definidos en los lineamientos, el/la titular de la Dirección de Seguimiento de Planes, Programas y Proyectos notificará al/la titular de la Dirección Financiera los hallazgos y solicitará la suspensión temporal de las transferencias</u> hasta que las organizaciones deportivas presenten lo requerido”. <br><br>Es importante señalar que, la calidad y veracidad de la información reportada es de exclusiva responsabilidad de la organización deportiva.<br><br>Gracias por su atención.<br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

				//$emailArray = array($correoEnviar);
				$emailArray = array($valor);
					
				$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Recordatorio de Presentación de Información de Seguimiento y Evaluación del II Semestre del POA $aniosPeriodos__ingesos");		

				$l++;

				
				
			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "guarda__seguimientos__estado__ajustado__planificacion_documentos":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			

			if ($trimestre=="primerTrimestre") {
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
				$columnaDocumento="documentoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";	
				$columnaDocumento="documentoTrimestre2";	
			}else if($trimestre=="tercerTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";	
				$columnaDocumento="documentoTrimestre3";	
			}else if($trimestre=="cuartoTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";	
				$columnaDocumento="documentoTrimestre4";	
			}

			

			$nombre__archivo1=$estado."__".$trimestre."__".$fecha_actual."__".$hora_actual2."__".$aniosPeriodos__ingesos.".pdf";
				
   
			$direccion1=VARIABLE__BACKEND."seguimiento/documentos_plazos/";

			$documento=$objeto->getEnviarPdf($_FILES["nombreDocumentoactividad1"]['type'],$_FILES["nombreDocumentoactividad1"]['size'],$_FILES["nombreDocumentoactividad1"]['tmp_name'],$_FILES["nombreDocumentoactividad1"]['name'],$direccion1,$nombre__archivo1);

		

				
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos, $columnaEstado, $columnaDocumento FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");

				$select_ifExist1=$objeto->getObtenerInformacionGeneral("SELECT $columnaFecha FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$idOrganismo' AND $columnaEstado='SUSPENSION' AND perioIngreso='$aniosPeriodos__ingesos';");

	
				$select_nombre=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreOrganismo FROM poa_organismo WHERE idOrganismo = '$idOrganismo'");

				$valor1=$select_nombre[0][nombreOrganismo];
				$fechaSuspension=$select_ifExist1[0][$columnaFecha];

				$odSuspendidas = "<span style='font-weight:bold;'>$valor1</span><br>";
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$documentoHistorico = $select_ifExist[0][$columnaDocumento];
					$estadoHistorico = $select_ifExist[0][$columnaEstado];

					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `$columnaDocumento` = '$nombre__archivo1', `fecha`='$fecha_actual' WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estadoHistorico','$documentoHistorico','$trimestre','$idOrganismo','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estado','$nombre__archivo1','$trimestre','$idOrganismo','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso`, `$columnaDocumento` ) VALUES('$fecha_actual','$estado','$fecha_actual','$idOrganismo','$aniosPeriodos__ingesos','$nombre__archivo1' )  ;";

					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estado','$nombre__archivo1','$trimestre','$idOrganismo','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

						if($estado=="AJUSTADO"){
							$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante notificación por correo electrónico emitido se procedio al ajuste de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.' de  la <span style="font-weight:bold;">'.$odSuspendidas.' </span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';

							$asunto="Ajuste de recursos financieros correspondientes al POA $aniosPeriodos__ingesos";

						}else if($estado=="SUSPENDIDO"){
							$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante notificación por correo electrónico emitido se procedio a la suspensión de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.' de  la <span style="font-weight:bold;">'.$odSuspendidas.' </span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';

							$asunto="Suspensión de recursos financieros correspondientes al POA $aniosPeriodos__ingesos";

						}else{
							$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante notificación por correo electrónico emitido se procedio a la reactivación de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.' de  la <span style="font-weight:bold;">'.$odSuspendidas.' </span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';

							$asunto="Reactivación de recursos financieros correspondientes al POA $aniosPeriodos__ingesos";
						}
						
					
	
						//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
						$emailArray = array("miperez@deporte.gob.ec");
							
						$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,$asunto);	
	
					
	
					
				

				
				
			

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "guarda__seguimientos__estado__reactivado__suspendido__planificacion_documentos":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();

			

			if ($trimestre=="primerTrimestre") {
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre1";
				$columnaEstado="estadoTrimestre1";
				$columnaDocumento="documentoTrimestre1";
			}else if($trimestre=="segundoTrimestre"){
				$semestre="I Semestre";
				$columnaFecha="fechaTrimestre2";
				$columnaEstado="estadoTrimestre2";	
				$columnaDocumento="documentoTrimestre2";	
			}else if($trimestre=="tercerTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre3";
				$columnaEstado="estadoTrimestre3";	
				$columnaDocumento="documentoTrimestre3";	
			}else if($trimestre=="cuartoTrimestre"){
				$semestre="II Semestre";
				$columnaFecha="fechaTrimestre4";
				$columnaEstado="estadoTrimestre4";	
				$columnaDocumento="documentoTrimestre4";	
			}

			
				$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos, $columnaEstado, $columnaDocumento FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");

				$select_ifExist1=$objeto->getObtenerInformacionGeneral("SELECT $columnaFecha FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$idOrganismo' AND $columnaEstado='SUSPENSION' AND perioIngreso='$aniosPeriodos__ingesos';");

	
				$select_nombre=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreOrganismo FROM poa_organismo WHERE idOrganismo = '$idOrganismo'");

				$valor1=$select_nombre[0][nombreOrganismo];
				$fechaSuspension=$select_ifExist1[0][$columnaFecha];

				$odSuspendidas = "<span style='font-weight:bold;'>$valor1</span><br>";
				
				if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
					$documentoHistorico = $select_ifExist[0][$columnaDocumento];
					$estadoHistorico = $select_ifExist[0][$columnaEstado];

					$query="UPDATE `poa_seguimiento_plazos_estado_transferencia` SET  `$columnaFecha` = '$fecha_actual' , `$columnaEstado` = '$estado', `$columnaDocumento` = '', `fecha`='$fecha_actual' WHERE idOrganismo = '$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'  ;";
					
					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fechaSuspension','$estadoHistorico','$documentoHistorico','$trimestre','$idOrganismo','$aniosPeriodos__ingesos' );";

					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estado','$trimestre','$idOrganismo','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					

				}else{
					$query="INSERT INTO `poa_seguimiento_plazos_estado_transferencia` ( `$columnaFecha`, `$columnaEstado`, `fecha`, `idOrganismo`, `perioIngreso`, `$columnaDocumento` ) VALUES('$fecha_actual','$estado','$fecha_actual','$idOrganismo','$aniosPeriodos__ingesos', null );";

					$resultado= $conexionEstablecida->exec($query);

					$query="INSERT INTO `poa_seguimiento_plazos_historico` ( `fechaRegistro`, `estado`, `documento`, `trimestre`, `idOrganismo`, `perioIngreso` ) VALUES('$fecha_actual','$estado', null ,'$trimestre','$idOrganismo','$aniosPeriodos__ingesos' )  ;";

					$resultado= $conexionEstablecida->exec($query);
					
				}

						 if($estado=="SUSPENDIDO"){
							$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante notificación por correo electrónico emitido se procedio a la suspensión de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.' de  la <span style="font-weight:bold;">'.$odSuspendidas.' </span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';

							$asunto="Suspensión de recursos financieros correspondientes al POA $aniosPeriodos__ingesos";

						}else{
							$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'De mi consideración:<br><br> Mediante notificación por correo electrónico emitido se procedio a la reactivación de recursos financieros correspondientes al POA '.$aniosPeriodos__ingesos.' de  la <span style="font-weight:bold;">'.$odSuspendidas.' </span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';

							$asunto="Reactivación de recursos financieros correspondientes al POA $aniosPeriodos__ingesos";
						}
						
					
	
						//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
						$emailArray = array("miperez@deporte.gob.ec");
							
						$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,$asunto);	
	

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "recomienda__recomendado__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	
			

	 		if ($idRol==4 || $idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

	 			$query="UPDATE poa_trimestrales SET estadoAlR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


	 		}else{

				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


	 			$query="UPDATE poa_trimestrales SET estadoAlR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));



	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos__formativo":

			$conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			
			if($tipoAct == "FORMATIVO"){
				if ( $idRol==2) {
					 
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
				 }else{
			
					
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");
			
					 $idDirector__Seguis=$director__seguimientos[0][id_usuario];
			
			
					 $query="UPDATE poa_trimestrales SET estadoFR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
			
				 }
			}else{
				if ( $idRol==2) {
					 
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
				 }else{
			
					
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");
			
					 $idDirector__Seguis=$director__seguimientos[0][id_usuario];
			
			
					 $query="UPDATE poa_trimestrales SET estadoFR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
			
				 }
			}
			 
				 
			 
			$resultado= $conexionEstablecida->exec($query);
			
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		
			 
			
		break;

		case  "seguimiento__control__cambios":
			
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$query="UPDATE poa_seguimiento_control_cambios SET estado='$radiosValues',horas='0', observaciones='$motivo' WHERE idSeguimientoCambio='$idSeguimientoCmabios' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);		

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		
			$informacion__usuarios=$objeto->getObtenerInformacionGeneral("SELECT correo,nombreOrganismo FROM poa_organismo WHERE idOrganismo='$idOrganismo';");	

			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA SEGUIMIENTO</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">DSPPP,</span><br><br>Revisa POA Seguimiento: Control de cambios referente a tu solicitud de habilitación de trimestres se encuentra Habilitado</body></html>';

			//$emailArray = array($arrayCorreoCuartoTrimestreD[$l]);
			$emailArray = array($correo);
					
			$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Solicitud de habilitación de trimestres POA SEGUIMIENTO $aniosPeriodos__ingesos");	

	 		
			
		break;


		case  "insertar__remanentes__administrador":


			$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

		   $inserta=$objeto->getInsertaNormal('poa_remanentes_monto_asignacion', array("`idRemanentes`, ","`monto__incrementoRemantes`, ","`archivo__saldoEstados`, ","`monto__autogestion`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$monto__incrementoRemantes', ","'$nombre__archivo', ","'$monto__autogestion', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));	

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;

	   break;	
				

  } 
 
 
  echo json_encode($jason);