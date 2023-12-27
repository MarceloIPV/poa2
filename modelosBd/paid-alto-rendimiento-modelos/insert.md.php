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
    
	//=====  End of Parametros Iniciales  ======/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

		case  "insertar_items_financieros":
            
            $conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			 			
			$query="INSERT INTO poa_paid_programacion_financiera (`enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `idOrganismo`, `idItemSelector`, `idRubro`, `idComponente`, `identificador`, `idAsignacion`, `perioIngreso`, `fecha`) VALUES ( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $idOrganismoSession, $selector, $idRubros, $idComponentes, $identificador, $idAsignacion, $aniosPeriodos__ingesos, '$fecha_actual');";		
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			
			$jason['mensaje']=$mensaje;

		break;
		case  "insertar__indicadores_organismo_paid":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		   
		   $query="INSERT INTO poa_paid_indicadores_organismos (`primertrimestre`, `segundotrimestre`, `tercertrimestre`, `cuartotrimestre`, `metaindicador`, `idOrganismo`, `idIndicador`, `idComponente`, `identificador`, `perioIngreso`, `fecha`) VALUES ( 0, 0, 0, 0, 0, '$idOrganismoSession', '$idIndicadores', '$idComponentes','$identificador', '$aniosPeriodos__ingesos', '$fecha_actual');";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;
	   break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Eventos >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
	   case  "insertar_datos_eventos_table":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		   
		   $query="INSERT INTO `poa_paid_eventos`(`deporte`, `modalidad`, `nombreEvento`, `nombre_atletas`, `nombre_entrenadores`, `categoria`, `pais`, `sede`, `tipo_evento`, `fecha_inicio`, `fecha_fin`, `num_entrenador_ofi`, `num_atletas`, `num_dias`, `num_pax`, `alojamiento`, `alimentacion`, `hidratacion`, `transporte_aereo`, `transporte_terrestre`, `bono_deportivo_interal`, `inscripcion`, `visa`, `fondo_emergencia`, `especificos_deporte`, `valorTotal`, `Observaciones`, `idOrganismo`, `fecha`, `perioIngreso`, idComponente, idRubro) VALUES ('$deporteEV','$modalidadEV','$nombresEV','$nombresAtletasEV','$nombresEntrenadoresEV','$categoriaEV','$paisEV','$ciudadEV','$tipoEventoEV','$fechaInicioEV','$fechaFinEV','$numEntrenadoresEV','$numAtletasEV','$numDiasEV','$paxEV','$alojamientoEV','$alimentacionEV','$hidratacioEV','$tranporteAereoEV','$transporteTerresteEV','$bonoDeportivoEV','$inscripcionEV','$visaEV','$fondoEmergenciaEV','$especificosDeporteEV','$valorTotalEV','$ObservacionesEV','$idOrganismoSession','$fecha_actual','$aniosPeriodos__ingesos','$JuegosNacionalesIDComponentes','$JuegosNacionalesIDRubro');";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;
	   break;


		//************************NECESIDADES INDIVIDUALES***********************/

		case  "insertar_necesidades_individuales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO poa_paid_necesidades_individuales (`modalidad`, `nombres`, `apellidos`, `articulo`, `cantidad`, `valorUnitario`, `valorTotal`, `sector`, `idOrganismo`, `fecha`, `perioIngreso`,`idRubro`,`idComponente`) VALUES ('$modalidad', '$nombres','$apellidos','$articulo', '$cantidad', '$valorInd', '$valorTotal', '$sector', '$idOrganismoSession', '$fecha_actual', '$aniosPeriodos__ingesos','$idRubro','$idComponente');";
			$resultado= $conexionEstablecida->exec($query);
			$mensaje=1;
			$jason['mensaje']=$mensaje;
   		break;


		//************************ Interdisciplinario***********************//

		case  "insertar_datos_interdisciplinario_table":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

			
			$query="INSERT INTO `poa_paid_interdisciplinario`(`cedula`, `modalidad`, `sexo`, `cargo`, `nombres`, `apellidos`, `fechaInicio`, `fechaFin`, `valor`, `numeroMeses`, `valorTotal`, `sector`, `idOrganismo`, `fecha`, `perioIngreso`, idComponente, idRubro) VALUES ('$cedulaEI','$modalidadEI','$sexoEI','$cargoEI','$nombresEI','$apellidosEI','$fechaInicioEI','$fechaFinEI','$valorMesEI','$mesEI','$valorTotalEI','$sectorlEI','$idOrganismoSession','$fecha_actual','$aniosPeriodos__ingesos','$JuegosNacionalesIDComponentes','$JuegosNacionalesIDRubro');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
		break;


		case  "insertar__tipo__de__contratacion_paidAR":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO `poa_paid_catalogo_contraloria` ( `catalogo__elect`, `catalogo__subasta`, `catalogo__infima`, `catalogo__menorCuantia`, `catalogo__cotizacion`, `catalogo__licitacion`, `catalogo__menorCuantiaObras`, `catalogo__cotizacionObras`, `catalogo__licitacionObras`, `catalogo__precioObras`, `catalogo__contratacionDirecta`, `catalogo__contratacionListaCorta`, `catalogo__contratacionConcursoPu`, `catalogo__elect__texto`, `catalogo__subasta__texto`, `catalogo__infima__texto`, `catalogo__menorCuantia__texto`, `catalogo__cotizacion__texto`, `catalogo__licitacion__texto`, `catalogo__menorCuantiaObras__texto`, `catalogo__cotizacionObras__texto`, `catalogo__licitacionObras__texto`, `catalogo__precioObras__texto`, `catalogo__contratacionDirecta__texto`, `catalogo__contratacionListaCorta__texto`, `catalogo__contratacionConcursoPu__texto`, `noAplica__3`, `idOrganismo`, `perioIngreso`, `idComponente`, `idRubros`, `idAsignacion`, `identificador`, `idItem`) VALUES ( 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ','no', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$idComponentes', '$idRubros', '$idAsignacion', '$identificador', '$idItem');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//************************NECESIDADES Generales***********************/

		case  "insertar_necesidades_generales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
			$query="INSERT INTO poa_paid_necesidades_generales (`deporte`,`modalidad`, `articulo`, `cantidad`, `valorUnitario`, `valorTotal`, `sector`, `idOrganismo`, `fecha`, `perioIngreso`,`idRubro`,`idComponente`) VALUES ('$deporte','$modalidad', '$articulo', '$cantidad', '$valorInd', '$valorTotal', '$sector', '$idOrganismoSession', '$fecha_actual', '$aniosPeriodos__ingesos','$idRubro','$idComponente');";
			$resultado= $conexionEstablecida->exec($query);
			$mensaje=1;
			$jason['mensaje']=$mensaje;
   		break;

		   case  "insertar__datos__envio__paid":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO `poa_paid_envioinicial` (`idOrganismo`, `estado`, `fecha`, `identificador`, `perioIngreso`)SELECT '$idOrganismoSession', 'A', '$fecha_actual','$identificador', '$aniosPeriodos__ingesos' WHERE NOT EXISTS (SELECT * FROM poa_paid_envioinicial WHERE idOrganismo = '$idOrganismoSession' AND identificador='$identificador' AND estado = 'A' AND perioIngreso='$aniosPeriodos__ingesos');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;
		
    }

    echo json_encode($jason);