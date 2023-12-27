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
	$idOrganismoSession=$_SESSION["idOrganismoSession"];
    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

	

	    case  "insertar__tipo__de__contratacion_paid":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO `poa_paid_catalogo_contraloria` ( `catalogo__elect`, `catalogo__subasta`, `catalogo__infima`, `catalogo__menorCuantia`, `catalogo__cotizacion`, `catalogo__licitacion`, `catalogo__menorCuantiaObras`, `catalogo__cotizacionObras`, `catalogo__licitacionObras`, `catalogo__precioObras`, `catalogo__contratacionDirecta`, `catalogo__contratacionListaCorta`, `catalogo__contratacionConcursoPu`, `catalogo__elect__texto`, `catalogo__subasta__texto`, `catalogo__infima__texto`, `catalogo__menorCuantia__texto`, `catalogo__cotizacion__texto`, `catalogo__licitacion__texto`, `catalogo__menorCuantiaObras__texto`, `catalogo__cotizacionObras__texto`, `catalogo__licitacionObras__texto`, `catalogo__precioObras__texto`, `catalogo__contratacionDirecta__texto`, `catalogo__contratacionListaCorta__texto`, `catalogo__contratacionConcursoPu__texto`, `noAplica__3`, `idOrganismo`, `perioIngreso`, `idComponente`, `idRubros`, `idAsignacion`, `identificador`, `idItem`) VALUES ( 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ','no', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$idComponentes', '$idRubros', '$idAsignacion', '$identificador', '$idItem');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		case  "guardar__recreativo__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_recreativo_tecnico', array("`idCompetenciaSeguimiento`, ","`idAdministrativo`, ","`trimestre`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`fechaInicioP`, ","`fechaInicioEjecutado`, ","`fechaFinP`, ","`fechaFinEjecutado`, ","`tipoEvento`, ","`eventoTareaE`, ","`nivel`, ","`total`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`perioIngreso`,","`beneficiariosHombres18`,","`beneficiariosMujeres18`,","`totalT18`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[18]', ","'$arrayInformacion[17]', ","'$arrayInformacion[19]', ","'$aniosPeriodos__ingesos',","'$arrayInformacion[20]',","'$arrayInformacion[21]',","'$arrayInformacion[22]'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;	


		

		

		




//*************************************************** ESTADO DE CUENTA **************************************//
		case  "guardar_estado_de_cuenta2023":
			$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
			$direccion1=VARIABLE__BACKEND."seguimiento/estadosCuenta/";
			$documento=$objeto->getEnviarPdf($_FILES["estado_cuenta"]['type'],$_FILES["estado_cuenta"]['size'],$_FILES["estado_cuenta"]['tmp_name'],$_FILES["estado_cuenta"]['name'],$direccion1,$nombre__archivo);
			
			// $inserta=$objeto->getInsertaNormal('poa_seguimiento_estado_cuenta', array("`id_estado_cuenta`, ","`idOrganismo`, ","`documento`, ","`fecha`, ","`hora`,","`trimestre`, ","`perioIngreso`"),array("'$idOrganismo', ","'$nombre__archivo', ","'$fecha_actual', ","'$hora_actual', ","'$trimestre', ","'$aniosPeriodos__ingesos'"));
			// $mensaje=1;
			// $jason['mensaje']=$mensaje;	

			$conexionRecuperada= new conexion();
	$conexionEstablecida=$conexionRecuperada->cConexion();			

		$query="INSERT INTO `poa_seguimiento_estado_cuenta`(`idOrganismo`, `documento`, `fecha`, `hora`, `trimestre`, `perioIngreso`) VALUES ('$idOrganismo','$nombre__archivo','$fecha_actual', '$hora_actual', '$trimestre','$aniosPeriodos__ingesos')";
	
	$resultado= $conexionEstablecida->exec($query);

	 $mensaje=1;
	 $jason['mensaje']=$mensaje;
		break;


//*************************************************** DECLARACION DE RECURSOS PUBLICOS **************************************//
		// case  "guardar_declaracion_recusos2023":
		// 	$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
		// 	$direccion1="../../documentos/seguimiento/declaracion_recursos_publicos/";
		// 	$documento=$objeto->getEnviarPdf($_FILES["declaracion_rp"]['type'],$_FILES["declaracion_rp"]['size'],$_FILES["declaracion_rp"]['tmp_name'],$_FILES["declaracion_rp"]['name'],$direccion1,$nombre__archivo);


		// 	$conexionRecuperada= new conexion();
		// 	$conexionEstablecida=$conexionRecuperada->cConexion();			
		// 	if($btnEnviar == 1){
		// 		$query="INSERT INTO `poa_seguimiento_declaracion`(`documento`, `idOrganismo`, `fecha`, `trimestre`, `perioIngreso`, `hora`) VALUES ('$nombre__archivo','$idOrganismo','$fecha_actual','$trimestre','$aniosPeriodos__ingesos','$hora_actual')";
		// 		//$query="INSERT INTO `poa_seguimiento_declaracion_recursos_publicos`(`documento`, `fecha`, `hora`, `trimestre`, `IdOrganismo`, `perioIngreso`) VALUES ('$nombre__archivo','$fecha_actual','$hora_actual','$trimestre','$idOrganismo','$aniosPeriodos__ingesos')";
			

		// 	$resultado= $conexionEstablecida->exec($query);

		// }
		// 	$mensaje=1;
		// 	$jason['mensaje']=$mensaje;	
		// break;

//******************************* Guardado de Indicadores (Meta Programado Meta ejecutado Doc Sustento) ********************************//
		case  "seguimiento__indicadores2023":
			$arrayInformacion = json_decode($prametros);

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idModificaIndicadores, a.documento FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$arrayInformacion[2]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.trimestre='$arrayInformacion[4]' and a.idActividad = '$arrayInformacion[3]';"); 

			$nombre__archivo=$fecha_actual."__".$arrayInformacion[2]."__".$arrayInformacion[3].".pdf";
			$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

			if (!empty($indicadorInformacion[0][idModificaIndicadores])){

				$elimina=$objeto->getElimina('poa_indicadores_seguimiento','idModificaIndicadores',$indicadorInformacion[0][idModificaIndicadores]);

				$nombreArchivo =$indicadorInformacion[0][documento];

				//unlink($direccion.$nombreArchivo);
			}

			// $documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

			$inserta=$objeto->getInsertaNormal('poa_indicadores_seguimiento', array("`idModificaIndicadores`, ","`totalProgramado`, ","`totalEjecutado`, ","`documento`, ","`idOrganismo`, ","`idActividad`, ","`trimestre`, ","`fecha`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "seguimiento__indicadores":

			$arrayInformacion = json_decode($prametros);

			$nombre__archivo=$fecha_actual."__".$arrayInformacion[2]."__".$arrayInformacion[3].".pdf";
			$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

			//$documento=$objeto->getEnviarPdf($_FILES["fileArchivoEvidencias"]['type'],$_FILES["fileArchivoEvidencias"]['size'],$_FILES["fileArchivoEvidencias"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion,$nombre__archivo);

			$inserta=$objeto->getInsertaNormal('poa_indicadores_seguimiento', array("`idModificaIndicadores`, ","`totalProgramado`, ","`totalEjecutado`, ","`documento`, ","`idOrganismo`, ","`idActividad`, ","`trimestre`, ","`fecha`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

//*************************************************** competencias_presupuestario__guardar **************************************//
		case  "competencias__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_competencias', array("`idCompetencias`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "competencias__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompetencia/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia', array("`idOtrosCompetencia`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "competencias__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasCompetencias/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_competencia', array("`idFacturaCompetencia`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		//*************************************************** capacitacion_presupuestario__guardar **************************************//
		case  "capacitacion__guardar":

			$arrayInformacion = json_decode($parametros);
		

			$inserta=$objeto->getInsertaNormal('poa_segimiento_capacitacion', array("`idCapacitacion`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));
		
		
			$mensaje=1;
		
			$jason['mensaje']=$mensaje;
		
		
		break;

		case  "capacitacion__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCapacitacion/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_capacitacion', array("`idOtrosCapacitacion`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "capacitacion__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasCapacitacion/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_capacitacion', array("`idFacturaCapacitacion`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__capacitacion__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCpacitacion_tecnico/";

			$nombre__archivo1=$arrayInformacion[4].$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_capacitacion_tecnico', array("`idOtrosCapacitacionTecnico`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		//*************************************************** mantenimeinto_presupuestario__guardar **************************************//

		case  "mantenimiento__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosMantenimiento/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_mantenimiento', array("`idOtrosMantenimiento`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "mantenimiento__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasMantenimiento/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_mantenimiento', array("`idFacturaMantenimiento`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "mantenimiento__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_mantenimiento', array("`idMantenimiento`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		//*************************************************** recreativo_presupuesto__guardar__otros **************************************//


		case  "recreativo__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosRecreativo/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_recreativo', array("`idOtrosRecreativo`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "recreativo__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_recreativos', array("`idRecreativos`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "recreativo__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasRecreativo/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_recreativo', array("`idFacturaRecreativo`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		//***************************************************implementacion_deportiva_presupuesto__guardar__otros **************************************//


		case  "implementacion__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosInstalaciones/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_instalaciones', array("`idOtrosInstalaciones`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "implementacion__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_implementacion', array("`idImplementacion`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "implementacion__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasImplementacion/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_instalaciones', array("`idFacturaInstalaciones`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		//***************************************************administrativo_presupuesto__guardar__otros **************************************//

		case  "otros__administrativas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_administrativos', array("`idOtrosAdministrativos`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
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



			$inserta=$objeto->getInsertaNormal('poa_seguimiento_administrativo', array("`idAdministrativoSegui`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`factura`, ","`otrosHabilitantes`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`perioIngreso`, ","`observaciones`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo1', ","'0', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos',","'$arrayInformacion[8]'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "facturas__administrativas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_administrativo', array("`idFacturaAdministrativos`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		//***************************************************insertar__tipo__de__contratacion_seguimiento **************************************//


		case  "insertar__tipo__de__contratacion_seguimiento":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
			$query="INSERT INTO `poa_catalogo_contraloria_seguimiento` (`catalogo__elect`, `catalogo__subasta`, `catalogo__infima`, `catalogo__menorCuantia`, `catalogo__cotizacion`, `catalogo__licitacion`, `catalogo__menorCuantiaObras`, `catalogo__cotizacionObras`, `catalogo__licitacionObras`, `catalogo__precioObras`, `catalogo__contratacionDirecta`, `catalogo__contratacionListaCorta`, `catalogo__contratacionConcursoPu`, `catalogo__elect__objeto`, `catalogo__elect__texto`, `catalogo__elect__cantidad`, `catalogo__elect__monto`, `catalogo__elect__proveedor`, `catalogo__elect__rucProveedor`, `catalogo__subasta__objeto`, `catalogo__subasta__texto`, `catalogo__subasta__cantidad`, `catalogo__subasta__monto`, `catalogo__subasta__proveedor`, `catalogo__subasta__rucProveedor`, `catalogo__infima__objeto`, `catalogo__infima__texto`, `catalogo__infima__cantidad`, `catalogo__infima__monto`, `catalogo__infima__proveedor`, `catalogo__infima__rucProveedor`, `catalogo__menorCuantia__objeto`, `catalogo__menorCuantia__texto`, `catalogo__menorCuantia__cantidad`, `catalogo__menorCuantia__monto`, `catalogo__menorCuantia__proveedor`, `catalogo__menorCuantia__rucProveedor`, `catalogo__cotizacion__objeto`, `catalogo__cotizacion__texto`, `catalogo__cotizacion__cantidad`, `catalogo__cotizacion__monto`, `catalogo__cotizacion__proveedor`, `catalogo__cotizacion__rucProveedor`, `catalogo__licitacion__objeto`, `catalogo__licitacion__texto`, `catalogo__licitacion__cantidad`, `catalogo__licitacion__monto`, `catalogo__licitacion__proveedor`, `catalogo__licitacion__rucProveedor`, `catalogo__menorCuantiaObras__objeto`, `catalogo__menorCuantiaObras__texto`, `catalogo__menorCuantiaObras__cantidad`, `catalogo__menorCuantiaObras__monto`, `catalogo__menorCuantiaObras__proveedor`, `catalogo__menorCuantiaObras__rucProveedor`, `catalogo__cotizacionObras__objeto`, `catalogo__cotizacionObras__texto`, `catalogo__cotizacionObras__cantidad`, `catalogo__cotizacionObras__monto`, `catalogo__cotizacionObras__proveedor`, `catalogo__cotizacionObras__rucProveedor`, `catalogo__licitacionObras__objeto`, `catalogo__licitacionObras__texto`, `catalogo__licitacionObras__cantidad`, `catalogo__licitacionObras__monto`, `catalogo__licitacionObras__proveedor`, `catalogo__licitacionObras__rucProveedor`, `catalogo__precioObras__objeto`, `catalogo__precioObras__texto`, `catalogo__precioObras__cantidad`, `catalogo__precioObras__monto`, `catalogo__precioObras__proveedor`, `catalogo__precioObras__rucProveedor`, `catalogo__contratacionDirecta__objeto`, `catalogo__contratacionDirecta__texto`, `catalogo__contratacionDirecta__cantidad`, `catalogo__contratacionDirecta__monto`, `catalogo__contratacionDirecta__proveedor`, `catalogo__contratacionDirecta__rucProveedor`, `catalogo__contratacionListaCorta__objeto`, `catalogo__contratacionListaCorta__texto`, `catalogo__contratacionListaCorta__cantidad`, `catalogo__contratacionListaCorta__monto`, `catalogo__contratacionListaCorta__proveedor`, `catalogo__contratacionListaCorta__rucProveedor`, `catalogo__contratacionConcursoPu__objeto`, `catalogo__contratacionConcursoPu__texto`, `catalogo__contratacionConcursoPu__cantidad`, `catalogo__contratacionConcursoPu__monto`, `catalogo__contratacionConcursoPu__proveedor`, `catalogo__contratacionConcursoPu__rucProveedor`, `idOrganismo`, `idItemCatalogo`, `perioIngreso`, `noAplica__3`, `idActividad`, `trimestre`) VALUES ('no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', ' ',' ',0,0,' ',0, ' ',' ',0,0,' ',0, ' ',' ',0,0,' ',0,' ', ' ',0,0,' ',0, ' ',' ',0,0,' ',0,' ', ' ',0,0,' ',0,' ', ' ',0,0,' ',0,' ', ' ',0,0, ' ',0,' ',' ',0,0,' ',0, ' ',' ',0,0,' ',0, ' ',' ',0,0,' ',0, ' ',' ',0,0,' ',0,' ', ' ',0,0,' ',0, '$idOrganismoSession', '$idItem', '$aniosPeriodos__ingesos', 'no', '$idActividad','$trimestre' );";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;
		
		//***************************************************registro__contratacion__seguimiento **************************************//


		case  "registro__contratacion__seguimiento":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
			$query="INSERT INTO `poa_registro_contratacion` ( `registra_Contratacion`, `justificacion`, `idOrganismo`, `idItemCatalogo`, `perioIngreso`, `idActividad`,`trimestre`) SELECT '$registro','$justificacion','$idOrganismoSession', '$idItem', '$aniosPeriodos__ingesos', '$actividad','$trimestre' WHERE NOT EXISTS (SELECT * FROM `poa_registro_contratacion`  WHERE idOrganismo = '$idOrganismoSession' AND idItemCatalogo='$idItem' AND perioIngreso='$aniosPeriodos__ingesos' and trimestre='$trimestre' ) ;";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//***************************************************ACTUALIZAR JURISDICCION **************************************//


		case  "actualizar_zona_jurisdiccion":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
			$query="UPDATE `poa_organismo_zonal` SET `nombreZonal`='PLANTA CENTRAL06'WHERE `idOrganismo` = '$idOrganismoSession';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//*************************************************** guardar__capacitacion__formativos **************************************//

		case  "guardar__capacitacion__formativos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_formativo', array("`idCompetenciaFormativo`, ","`evento`, ","`predicionResultados`, ","`oro`, ","`plata`, ","`bronce`, ","`total`, ","`cuarOc`, ","`analisis`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`fecha1`, ","`fecha2`, ","`fecha3`, ","`fecha4`, ","`perioIngreso`,","`beneficiariosHombres18`,","`beneficiariosMujeres18`,","`totalT18`"),array("'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[16]', ","'$arrayInformacion[6]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$arrayInformacion[22]', ","'$arrayInformacion[23]', ","'$aniosPeriodos__ingesos', ","'$arrayInformacion[24]', ","'$arrayInformacion[25]', ","'$arrayInformacion[26]'"));

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

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_mantenimiento_tecnico', array("`idMantenimientoTec`, ","`planificadoInicial`, ","`ejecutadoInicial`, ","`planificadoFinal`, ","`ejectuadoFinal`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`perioIngreso`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[6]', ","'$arrayInformacion[0]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		//***************************************************guardar__capacitacion__alto **************************************//

		case  "guardar__capacitacion__alto":

					// $inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_alto', array("`idCompetenciaAlto`, ","`idAdministrativo`, ","`trimestre`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`fechaInicioP`, ","`fechaInicioEjecutado`, ","`fechaFinP`, ","`fechaFinEjecutado`, ","`tipoEvento`, ","`eventoTareaE`, ","`nivel`, ","`total`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[16]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]'"));
		
		
					$arrayInformacion = json_decode($parametros);
		
					$inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_alto2', array("`idCompetenciaAltos`, ","`evento`, ","`predicionResultados`, ","`oro`, ","`plata`, ","`bronce`, ","`total`, ","`cuarOc`, ","`analisis`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`fecha1`, ","`fecha2`, ","`fecha3`, ","`fecha4`, ","`perioIngreso`"),array("'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[16]', ","'$arrayInformacion[6]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$arrayInformacion[22]', ","'$arrayInformacion[23]', ","'$aniosPeriodos__ingesos'"));
		
		
					$mensaje=1;
		
					$jason['mensaje']=$mensaje;
		
		break;
		
		//***************************************************guardar__Honorarios **************************************//
		
		case  "honorarios__guardar":
		
					$arrayInformacion = json_decode($parametros);
		
					$inserta=$objeto->getInsertaNormal('poa_seguimiento_honorarios', array("`idHonorariosSeguimientos`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idHonorarios`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));
		
		
					$mensaje=1;
					$jason['mensaje']=$mensaje;
		
		
		break;

		case  "honorarios__guardar__otros":
		
			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosHonorarios/";

			$nombre__archivo1=$arrayInformacion[5]."_00".$arrayInformacion[6]."_".$arrayInformacion[4]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_honorarios', array("`idOtrosHonorarios`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "honorarios__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasHonorarios/";

			$nombre__archivo1=$arrayInformacion[9]."_00".$arrayInformacion[10]."_Factura_".$arrayInformacion[3]."_".$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_honorarios', array("`idFacturaHonorarios`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;
		
		//***************************************************guardar__capacitacion__tecnicos **************************************//
		
		case  "guardar__capacitacion__tecnicos":
		
					$arrayInformacion = json_decode($parametros);
		
					if (empty($arrayInformacion[3])) {
						$arrayInformacion[3]='1990/09/18';
					}
		
		
					if (empty($arrayInformacion[4])) {
						$arrayInformacion[4]='1990/09/18';
					}
		
					$inserta=$objeto->getInsertaNormal('poa_seguimiento_capacitacion_tecnico', array("`idCapacitacionTec`, ","`planificadoInicial`, ","`ejecutadoInicial`, ","`planificadoFinal`, ","`ejectuadoFinal`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`perioIngreso`,","`capacitadores`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[6]', ","'$arrayInformacion[0]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$aniosPeriodos__ingesos',","'$arrayInformacion[15]'"));
		
					$mensaje=1;
		
					$jason['mensaje']=$mensaje;
		
		
		break;
		
		case  "otros__capacitacion__alto":
		
					$arrayInformacion = json_decode($parametros);
		
					$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompentencia_alto/";
		
					$nombre__archivo1=$arrayInformacion[4].$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";
		
					$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);
		
		
					$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia_alto', array("`idOtrosCompetenciasAltos`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
					
					$mensaje=1;
		
					$jason['mensaje']=$mensaje;
		
		
		break;
		
		case  "otros__mantenimientos__tecnicos":
		
					$arrayInformacion = json_decode($parametros);
		
					$direccion1=VARIABLE__BACKEND."seguimiento/otrosMantenimiento__tecnicos/";
		
					$nombre__archivo1=$arrayInformacion[4].$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";
		
					$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);
		
		
					$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_mantenimiento_tecnico', array("`idOtrosMantenimientoTecnico`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
					
					$mensaje=1;
		
					$jason['mensaje']=$mensaje;
		
		
		break;
		
		
		
		case  "otros__recreativo__tecnicos":
		
					$arrayInformacion = json_decode($parametros);
		
					$direccion1=VARIABLE__BACKEND."seguimiento/otros__recreativos__tecnicos/";
		
					$nombre__archivo1=$arrayInformacion[4].$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";
		
					$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);
		
		
					$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_recreativo_tecnicos', array("`idOtrosRT`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
					
					$mensaje=1;
		
					$jason['mensaje']=$mensaje;
		
		
		break;

		case  "otros__capacitacion__formativos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompentencia_formativo/";

			$nombre__archivo1=$arrayInformacion[4].$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia_formativos', array("`idOtrosCompetenciasTecnicas`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  COntratacion Recursos Publicos >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "guardar_declaracion_recusos":
		
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT documento, fecha, perioIngreso, trimestre as listaTrimestres FROM poa_seguimiento_declaracion WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre = '$trimestre' ORDER BY idDeclaracion DESC;");

			if($obtenerInformacion[0][documento] != null){

				$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_declaracion WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre = '$trimestre' ORDER BY idDeclaracion DESC;");

				$archivo = $obtenerInformacion[0][documento];

				$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_recursos_publicos/";

				unlink($direccion1.$archivo);

					$conexionRecuperada= new conexion();
					$conexionEstablecida=$conexionRecuperada->cConexion();	
					$query="DELETE FROM poa_seguimiento_declaracion WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre = '$trimestre'";		

					$resultado= $conexionEstablecida->exec($query);
			
					$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
					$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_recursos_publicos/";
					$documento=$objeto->getEnviarPdf($_FILES["declaracion_rp"]['type'],$_FILES["declaracion_rp"]['size'],$_FILES["declaracion_rp"]['tmp_name'],$_FILES["declaracion_rp"]['name'],$direccion1,$nombre__archivo);
				

					$conexionRecuperada= new conexion();
					$conexionEstablecida=$conexionRecuperada->cConexion();			
				
						$query="INSERT INTO `poa_seguimiento_declaracion`(`documento`, `idOrganismo`, `fecha`, `trimestre`, `perioIngreso`, `hora`) VALUES ('$nombre__archivo','$idOrganismo','$fecha_actual','$trimestre','$aniosPeriodos__ingesos','$hora_actual')";		
					
					$resultado= $conexionEstablecida->exec($query);
				
						
			}else{

					$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
					$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_recursos_publicos/";
					$documento=$objeto->getEnviarPdf($_FILES["declaracion_rp"]['type'],$_FILES["declaracion_rp"]['size'],$_FILES["declaracion_rp"]['tmp_name'],$_FILES["declaracion_rp"]['name'],$direccion1,$nombre__archivo);
				

					$conexionRecuperada= new conexion();
					$conexionEstablecida=$conexionRecuperada->cConexion();			
				
						$query="INSERT INTO `poa_seguimiento_declaracion`(`documento`, `idOrganismo`, `fecha`, `trimestre`, `perioIngreso`, `hora`) VALUES ('$nombre__archivo','$idOrganismo','$fecha_actual','$trimestre','$aniosPeriodos__ingesos','$hora_actual')";		
					
					$resultado= $conexionEstablecida->exec($query);

			}

				$mensaje=1;
				$jason['mensaje']=$mensaje;	


		break;	

	

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  COntratacion Publica >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "guardar_contratacion__publica":
			//var_dump("INFO");
			//var_dump($obtenerInformacion);
			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT documento, fecha, perioIngreso, trimestre as listaTrimestres2 FROM poa_seguimiento_declaracion_contratacion_publica WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre = '$trimestre' ORDER BY id_declaracion_contratacion_publica DESC;
			");

			if($obtenerInformacion[0][documento] != null){

				$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_declaracion_contratacion_publica WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre = '$trimestre' ORDER BY id_declaracion_contratacion_publica DESC;
				");
	
	
				$archivo = $obtenerInformacion[0][documento];
				
				$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_contratacion_publica/";
	
				unlink($direccion1.$archivo);
	
				$conexionRecuperada= new conexion();
				$conexionEstablecida=$conexionRecuperada->cConexion();	
					$query="DELETE FROM poa_seguimiento_declaracion_contratacion_publica WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre = '$trimestre'";		
	
					$resultado= $conexionEstablecida->exec($query);
			
				
					$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
					$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_contratacion_publica/";
					$documento=$objeto->getEnviarPdf($_FILES["declaracion_cp"]['type'],$_FILES["declaracion_cp"]['size'],$_FILES["declaracion_cp"]['tmp_name'],$_FILES["declaracion_cp"]['name'],$direccion1,$nombre__archivo);
					
					$conexionRecuperada= new conexion();
					$conexionEstablecida=$conexionRecuperada->cConexion();	
						
						$query="INSERT INTO `poa_seguimiento_declaracion_contratacion_publica`(`documento`, `fecha`, `hora`, `trimestre`, `IdOrganismo`, `perioIngreso`) VALUES ('$nombre__archivo','$fecha_actual','$hora_actual','$trimestre','$idOrganismo','$aniosPeriodos__ingesos')";
					
						$resultado= $conexionEstablecida->exec($query);
		
					
						
			}else{

					
				$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
				$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_contratacion_publica/";
				$documento=$objeto->getEnviarPdf($_FILES["declaracion_cp"]['type'],$_FILES["declaracion_cp"]['size'],$_FILES["declaracion_cp"]['tmp_name'],$_FILES["declaracion_cp"]['name'],$direccion1,$nombre__archivo);
				
				$conexionRecuperada= new conexion();
				$conexionEstablecida=$conexionRecuperada->cConexion();	
					
					$query="INSERT INTO `poa_seguimiento_declaracion_contratacion_publica`(`documento`, `fecha`, `hora`, `trimestre`, `IdOrganismo`, `perioIngreso`) VALUES ('$nombre__archivo','$fecha_actual','$hora_actual','$trimestre','$idOrganismo','$aniosPeriodos__ingesos')";
				
					$resultado= $conexionEstablecida->exec($query);

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;	

		break;	

		



  }

 
		
    

	echo json_encode($jason);

	