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

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idOrganismoSession=$_SESSION["idOrganismoSession"];
    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

		case  "actualiza__items__financieros":
		
			 $conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query="UPDATE poa_paid_programacion_financiera SET `enero` = $enero, `febrero` = $febrero, `marzo` = $marzo, `abril` = $abril, `mayo` = $mayo, `junio` = $junio, `julio` = $julio, `agosto` = $agosto, `septiembre` = $septiembre, `octubre` = $octubre, `noviembre` = $noviembre, `diciembre` = $diciembre, `totalSumaItem` = $total,`fecha` = '$fecha_actual' WHERE `idProgramacionFinanciera` = $idProgramacionFinanciera;";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
		break;

		case  "actualiza__indicadores__paid":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		   
		   $query="UPDATE poa_paid_indicadores_organismos SET `primertrimestre` = $primerTrimestre, `segundotrimestre` = $segundoTrimestre, `tercertrimestre` = $tercerTrimestre, `cuartotrimestre` = $cuartoTrimestre, `metaindicador` = $totalIndicador, `fecha` = '$fecha_actual' WHERE `idPaidIndicador` = $idPaidIndicador;";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;

	   break;

	   case  "actualiza__catalogoContraloria__paidAR":
		
		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	
	
		$query="UPDATE `poa_paid_catalogo_contraloria` SET `catalogo__elect` = '$catalogo__elect', `catalogo__subasta` = '$catalogo__subasta', `catalogo__infima` = '$catalogo__infima', `catalogo__menorCuantia` = '$catalogo__menorCuantia', `catalogo__cotizacion` = '$catalogo__cotizacion', `catalogo__licitacion` = '$catalogo__licitacion', `catalogo__menorCuantiaObras` = '$catalogo__menorCuantiaObras', `catalogo__cotizacionObras` = '$catalogo__cotizacionObras', `catalogo__licitacionObras` = '$catalogo__licitacionObras', `catalogo__precioObras` = '$catalogo__precioObras', `catalogo__contratacionDirecta` = '$catalogo__contratacionDirecta', `catalogo__contratacionListaCorta` = '$catalogo__contratacionListaCorta', `catalogo__contratacionConcursoPu` = '$catalogo__contratacionConcursoPu', `catalogo__elect__texto` = '$catalogo__elect__texto', `catalogo__subasta__texto` = '$catalogo__subasta__texto', `catalogo__infima__texto` = '$catalogo__infima__texto', `catalogo__menorCuantia__texto` = '$catalogo__menorCuantia__texto', `catalogo__cotizacion__texto` = '$catalogo__cotizacion__texto', `catalogo__licitacion__texto` = '$catalogo__licitacion__texto', `catalogo__menorCuantiaObras__texto` = '$catalogo__menorCuantiaObras__texto', `catalogo__cotizacionObras__texto` = '$catalogo__cotizacionObras__texto', `catalogo__licitacionObras__texto` = '$catalogo__licitacionObras__texto', `catalogo__precioObras__texto` = '$catalogo__precioObras__texto', `catalogo__contratacionDirecta__texto` = '$catalogo__contratacionDirecta__texto', `catalogo__contratacionListaCorta__texto` = '$catalogo__contratacionListaCorta__texto', `catalogo__contratacionConcursoPu__texto` = '$catalogo__contratacionConcursoPu__texto', `noAplica__3` = '$noAplica__3' WHERE `idCatalogo` = $idCatalogo";
		
		$resultado= $conexionEstablecida->exec($query);

		$mensaje=1;
		$jason['mensaje']=$mensaje;

	break;

    }

	

	echo json_encode($jason);