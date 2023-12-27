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

	if (isset($_SESSION["idOrganismoSession"])) {
		$idOrganismoSession=$_SESSION["idOrganismoSession"];
	}

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {




		//******************************* Guardado info seleccionable infraestructura ********************************//


		case  "seguimiento__infraestructura_reporte":


			$arrayInformacion = json_decode($prametros);
			
			$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_reporte_infraestructura', array("`id_reporte_infraestructura`, ","`detalle`, ","`idOrganismo`, ","`idMantenimiento`, ","`fecha`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "guardar__archivos__paid__infraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

				$nombreDocumento=$nombreArchivo."__".$idOrganismoSession."__".$fecha_actual.".pdf";

				$direccion1=VARIABLE__BACKEND."paid/documentos__infraestructura/";

				

				if(rename($_FILES["nombreDocumento"]['tmp_name'],$direccion1.$nombreDocumento)){
					$mensaje=1;


					$inserta= $objeto->insertSingleRow('poa_paid_documentos_infraestructura',['documento','tipo','idOrganismo','idComponente','idRubro','perioIngreso','identificador','fecha'],array(':documento' => $nombreDocumento,':tipo' => $tipoInforme,':idOrganismo' => $idOrganismoSession,':idComponente' => $idComponente,':idRubro' => $idRubro,':perioIngreso' => $aniosPeriodos__ingesos,':fecha' => $fecha_actual,':identificador' => '2'));

				}else{
					$mensaje=0;
				}
   
		
				//unlink($direccion1.$nombreArchivo."__".$mesAnterior."__".$anioa.".pdf");
			

			
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "guardar__informe__obra__paid__infraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

				$nombreDocumentoGuardar=$nombreArchivo."__".$idOrganismoSession."__".$fecha_actual."__".$hora_actual2.".pdf";

				$direccion1=VARIABLE__BACKEND."paid/informes__infraestructura/";
				
				if(rename($_FILES["nombreDocumento"]['tmp_name'],$direccion1.$nombreDocumentoGuardar)){
					$mensaje=1;

					$inserta= $objeto->insertSingleRow('poa_paid_informes_infraestructura',['documento','valorTotal','idOrganismo','idComponente','idRubro','perioIngreso','identificador','fecha','tipo'],array(':documento' => $nombreDocumentoGuardar,':valorTotal' => $valorTotal,':idOrganismo' => $idOrganismoSession,':idComponente' => $idComponente,':idRubro' => $idRubro,':perioIngreso' => $aniosPeriodos__ingesos,':fecha' => $fecha_actual,':identificador' => '2',':tipo' => 'obra'));

				}else{
					$mensaje=0;
				}
   
			

			
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "guardar__informe__fiscalizacion__paid__infraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

				$nombreDocumento1=$nombreArchivo."__".$idOrganismoSession."__".$fecha_actual."__".$hora_actual2.".pdf";

				$direccion1=VARIABLE__BACKEND."paid/informes__infraestructura/";


				if(rename($_FILES["nombreDocumento"]['tmp_name'],$direccion1.$nombreDocumento1)){
					$mensaje=1;

					$inserta= $objeto->insertSingleRow('poa_paid_informes_infraestructura',['documento','valorTotal','idOrganismo','idComponente','idRubro','perioIngreso','identificador','fecha','tipo'],array(':documento' => $nombreDocumento1,':valorTotal' => $valorTotal,':idOrganismo' => $idOrganismoSession,':idComponente' => $idComponente,':idRubro' => $idRubro,':perioIngreso' => $aniosPeriodos__ingesos,':fecha' => $fecha_actual,':identificador' => '2',':tipo' => 'fiscalizacion'));

				}else{
					$mensaje=0;
				}
   
			

			
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "guardar__beneficiarios__infraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		
			$inserta= $objeto->insertSingleRow('poa_paid_beneficiarios_infraestructura',['rangoDesde','rangoHasta','masculino','femenino','mestizo','montubio','indigena','blanco','afro','totalBeneficiarios','idOrganismo','idComponente','idRubro','perioIngreso','identificador','fecha','tipo'],array(':rangoDesde' => $rangoDesde,':rangoHasta' => $rangoHasta,':masculino' => $masculino,':femenino' => $femenino,':mestizo' => $mestizo,':montubio' => $montubio,':indigena' => $indigena,':blanco' => $blanco,':afro' => $afro,':totalBeneficiarios' => $beneficiariosTotal,':idOrganismo' => $idOrganismoSession,':idComponente' => $idComponente,':idRubro' => $idRubro,':perioIngreso' => $aniosPeriodos__ingesos,':fecha' => $fecha_actual,':identificador' => '2',':tipo' => $tipoInforme));

			$mensaje=1;
				

			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "guardar__beneficiarios__adaptado__infraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		
			$inserta= $objeto->insertSingleRow('poa_paid_beneficiariosAdaptado_infraestructura',['rangoDesde','rangoHasta','masculino','femenino','mestizo','montubio','indigena','blanco','afro','visual','auditivo','multisensorial','intelectual','fisica','psiquica','totalBeneficiarios','idOrganismo','idComponente','idRubro','perioIngreso','identificador','fecha','tipo'],array(':rangoDesde' => $rangoDesde,':rangoHasta' => $rangoHasta,':masculino' => $masculino,':femenino' => $femenino,':mestizo' => $mestizo,':montubio' => $montubio,':indigena' => $indigena,':blanco' => $blanco,':afro' => $afro,':visual' => $visual,':auditivo' => $auditivo,':multisensorial' => $multisensorial,':intelectual' => $intelectual,':fisica' => $fisico,':psiquica' => $psiquico,':totalBeneficiarios' => $beneficiariosTotal,':idOrganismo' => $idOrganismoSession,':idComponente' => $idComponente,':idRubro' => $idRubro,':perioIngreso' => $aniosPeriodos__ingesos,':fecha' => $fecha_actual,':identificador' => '2',':tipo' => $tipoInforme));

			$mensaje=1;
				

			$jason['mensaje']=$mensaje;		
	 		

		break;


				

  } 
 
 
  echo json_encode($jason);