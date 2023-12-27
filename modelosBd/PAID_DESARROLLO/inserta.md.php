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

		case  "insertar__items__financieros":
			//parametro 1 nombre de la tabla que crearon
			//parametro 2 array de los campos sin incluir la llave ya que esta es autoincrementable
			//parametro 3 valor de los campos escribir tal como esta en la funcion

			//crear tabla que se llame poa_paid_programacion_financiera copia de poa_programacion_financiera


			//cambiar los datos de enero a total a double
			//eliminar campos que no sirvan
			//aumentar campos que se traen desde el axios
			//de enero a diciembre y a total enviar en cero

			//realizar insercion

			//cada vez que se realiza insercion enviar mensaje de notifiacion y limpiar el selector es  ponerlo denuevo en seleccione una opcion

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

		case  "insertar_eventos_juegos_nacionales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		   
		   $query="INSERT INTO `poa_paid_encuentroactivo` ( `nombres`, `sede`, `instituciones`, `fechaInicio`, `fechFin`, `deportes`, `categoria`, `mujeres`, `hombres`, `entrenadores`, `valorTotal`, `observaciones`, `idOrganismo`, `fecha`, `perioIngreso`) VALUES ('$nomEvento', '$sede', '$istParticipante', '$fechaInicio', '$fechaFin', '$nDeporte', '$Categoria', $nDMujeres, $nDVarones, $nEntrenadores, $valorTotal, '$observaciones', '$idOrganismoSession', '$fecha_actual', '$aniosPeriodos__ingesos');";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;
	   break;


	   case  "insertar__tipo__de__contratacion_paid":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO `poa_paid_catalogo_contraloria` ( `catalogo__elect`, `catalogo__subasta`, `catalogo__infima`, `catalogo__menorCuantia`, `catalogo__cotizacion`, `catalogo__licitacion`, `catalogo__menorCuantiaObras`, `catalogo__cotizacionObras`, `catalogo__licitacionObras`, `catalogo__precioObras`, `catalogo__contratacionDirecta`, `catalogo__contratacionListaCorta`, `catalogo__contratacionConcursoPu`, `catalogo__elect__texto`, `catalogo__subasta__texto`, `catalogo__infima__texto`, `catalogo__menorCuantia__texto`, `catalogo__cotizacion__texto`, `catalogo__licitacion__texto`, `catalogo__menorCuantiaObras__texto`, `catalogo__cotizacionObras__texto`, `catalogo__licitacionObras__texto`, `catalogo__precioObras__texto`, `catalogo__contratacionDirecta__texto`, `catalogo__contratacionListaCorta__texto`, `catalogo__contratacionConcursoPu__texto`, `noAplica__3`, `idOrganismo`, `perioIngreso`, `idComponente`, `idRubros`, `idAsignacion`, `identificador`, `idItem`) VALUES ( 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ','no', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$idComponentes', '$idRubros', '$idAsignacion', '$identificador', '$idItem');";
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

		

		case  "insertar_medallas_juegos_nacionales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO `poa_paid_medallas_convencional` ( `item`, `Deporte`, `cantidadMedallasOro`, `cantidadMedallasPlata`, `cantidadMedallasBronce`, `totalMedallas`, `valorUnitario`, `valorTotal`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`,`idComponente`,`idRubro`,`idEvento`) VALUES ( $item, '$deporte', $medallasOro, $medallasPlata, $medallasBronce, $cantMedallas, $valorUnitario, $valorTotal, '$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual','$idComponente','$idRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		case  "insertar_matrices_generales_juegos_nacionales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO `poa_paid_matrices_juegos_nacionales` ( `item`, `descripcion`, `cantidad`, `valorUnitario`, `valorTotal`, `nombreMatriz`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`,`idComponente`,`idRubro`,`idEvento`) VALUES ( $item, '$descripcion', $cantidad, $valorUnitario, $valorTotal, '$nombreMatriz','$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual','$idComponente','$idRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion Hosp Alim  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_matrices_Hospe_alim":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();			
			$query="INSERT INTO `poa_paid_juegos_nacionales_hosp_alim_hidr` (`id_item1`, `id_item2`, `provincia`, `nombre_deporte`, `nro_cupos`, `hosp_alim_hidr`, `dias`, `nombreMatriz`, `valor_total`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`, `id_componente`, `id_rubro`,`idEvento`) VALUES ('$item1', '$item2', '$deporte', '$deporte2', '$nroCupos', '$hospAlim', '$dias', '$nombreMatriz', '$valorTotal', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual', '$JuegosNacionalesIDComponentes', '$JuegosNacionalesIDRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);
			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion Hidr  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_matriz_Hid_DI":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();			
			$query="INSERT INTO `poa_paid_juegos_nacionales_hosp_alim_hidr` (`id_item1`, `provincia`, `nombre_deporte`, `nro_cupos`, `hosp_alim_hidr`, `dias`, `nombreMatriz`, `valor_total`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`, `id_componente`, `id_rubro`,`idEvento`) VALUES ('$item1', '$deporte', '$deporte2', '$nroCupos', '$hospAlim', '$dias', '$nombreMatriz', '$valorTotal', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual', '$JuegosNacionalesIDComponentes', '$JuegosNacionalesIDRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);
			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion PTC  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_datos_PTC":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();			
			$query="INSERT INTO `poa_paid_personal_tecnico_convensional` ( `id_item`, `deporte`, `jueces`, `nro_dias_jueces`, `comisionados`, `nro_dias_comisionados`, `p_apoyo`, `nro_dias_p_apoyo`, `valor_jueces`, `valor_comisionados`, `valor_p_apoyo`, `valorTotal`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`,`id_componente`, `id_rubro`,`idEvento`) VALUES ( '$item', '$deporte', '$jueces', '$nJueces', '$comision', '$nComision', '$pApoyo', '$nPApoyo', '$vJueces', '$vComision', '$vPApoyo', '$valorTotal', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual','$JuegosNacionalesIDComponentes', '$JuegosNacionalesIDRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
   		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion Uniformes  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_datos_deporte_adaptado":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();			
			$query="INSERT INTO `poa_paid_uniformes_adaptado` (`id_item`, `deporte`, `delegaciones`, `p_apoyo`, `v_unitario`, `valorTotal`, `idOrganismo`, `perioIngreso`, `identificador`, `id_componente`, `id_rubro`, `tipo`, `fecha`,`idEvento`) VALUES ('$item1','$deporte','$delegaciones','$pApoyo','$vUnitario','$valorTotal','$idOrganismoSession','$aniosPeriodos__ingesos','$identificador','$JuegosNacionalesIDComponentes','$JuegosNacionalesIDRubro','$nombreMatriz','$fecha_actual','$evento')";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
   		break;

		//----------------------------------- Insersion BONO DEPORTIVO  -----------------------------------------//
		case  "insertar_bono_deportivo_JN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="INSERT INTO poa_paid_bono_deportivo ( `IdItem`, `Deporte`, `nroDias`, `totalPersonas`, `valorBonoDiario`, `valorTotal`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`,`idComponente`,`idRubro`,`idEvento`) VALUES ('$item', '$deporte','$nroDias','$totalPersonal', '$valorBono', '$valorTotal', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual','$idComponente','$idRubro','$idEvento');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		
		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion Hosp Alim Juegos Ancestrales >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_matrices_Hospe_alim_JA":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();			
			$query="INSERT INTO `poa_paid_juegos_nacionales_hosp_alim_hidr` (`id_item1`, `id_item2`, `nombre_deporte`, `nro_cupos`, `hosp_alim_hidr`, `dias`, `nombreMatriz`, `valor_total`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`, `id_componente`, `id_rubro`,`idEvento`) VALUES ('$item1', '$item2', '$deporte', '$nroCupos', '$hospAlim', '$dias', '$nombreMatriz', '$valorTotal', '$idOrganismoSession', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual', '$JuegosNacionalesIDComponentes', '$JuegosNacionalesIDRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);
			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;


		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion SEGUROS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_seguro_desarrollo":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="INSERT INTO `poa_paid_seguros` (`item`, `Provincia`, `Deporte`, `cantidad`,`nroCupos`, `valorUnitario`, `valorTotal`, `idOrganismo`, `idComponente`, `idRubro`, `perioIngreso`, `identificador`, `fecha`,`idEvento`) VALUES ($item,  '$provincia','$deporte', $cantidad,$nroCupos, $valorUnitario, $valorTotal, '$idOrganismoSession','$idComponente','$idRubro', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual','$evento');			";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion TRANSPORTE >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_transporte_desarrollo":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="INSERT INTO `poa_paid_transporte` ( `item`, `Provincia`, `Deporte`, `cantidad`,`nroCupos`, `valorUnitario`, `valorTotal`, `idOrganismo`, `idComponente`, `idRubro`, `perioIngreso`, `identificador`, `fecha`,`idEvento`) VALUES ( $item,  '$provincia','$deporte',$cantidad,$nroCupos, $valorUnitario, $valorTotal, '$idOrganismoSession','$idComponente','$idRubro', '$aniosPeriodos__ingesos', '$identificador', '$fecha_actual','$evento');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insersion PASAJES AEREOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "insertar_datos_pasajes_aereos":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="INSERT INTO `poa_paid_pasajes_aereos`(`id_item`, `deporte`, `pasajes`, `n_deportistas`, `n_entrenadores`, `tota_personas`, `n_dias`, `valorTotal`, `idOrganismo`, `perioIngreso`, `identificador`, `fecha`, `id_componente`, `id_rubro`,`idEvento`) VALUES ('$item','$deporte','$pasajesaereos','$nDeportistas','$nEntrenadores','$numTotalPersonas','$nDias','$valorTotal','$idOrganismoSession','$aniosPeriodos__ingesos','$identificador','$fecha_actual','$JuegosNacionalesIDComponentes','$JuegosNacionalesIDRubro','$evento');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		case  "insertar_datos_evento_desarrollo":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="INSERT INTO `poa_paid_eventos_desarrollo` ( `nombre`, `sede`, `subsede`, `participantes`, `obj_general`, `obj_especificos`, `meta`, `deporte`, `modalidad`, `fecha_inicio`, `fecha_fin`, `idOrganismo`, `fecha`, `perioIngreso`, `id_componente`, `id_rubro`) VALUES ('$nombre', '$nombreSede', '$nombreSubsede', $nroParticipantes, '$obj_General', '$obj_Especificos', '$meta', '$deporte', '$modalidad', '$fechaInicioEvento', '$fechaFinEvento', '$idOrganismoSession', '$fecha_actual', '$aniosPeriodos__ingesos', '$JuegosNacionalesIDComponentes', '$JuegosNacionalesIDRubro');";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

		   

		   

    }

	echo json_encode($jason);