<?php
	
	extract($_POST);

	require_once "../../config/config2.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/


    session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idOrganismoSession=$_SESSION["idOrganismoSession"];
    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

		case  "eliminar__items__financieros":
		
			 $conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query=" DELETE FROM poa_paid_programacion_financiera WHERE `idProgramacionFinanciera` = '$idProgramacionFinanciera';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
            
		break;

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Eventos >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidRubrosEventos":
		
			 $conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query=" DELETE FROM `poa_paid_eventos` WHERE `idEventos` = '$id';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
            
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Interdisciplinario >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidRubrosInterdisciplinario":
		
			 $conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query=" DELETE FROM `poa_paid_interdisciplinario` WHERE `idIterdisciplinario` = '$id';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
            
		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Necesidades Individuales >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidNecesidadesIndividuales1":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		   
		   $query=" DELETE FROM `poa_paid_necesidades_individuales` WHERE `idNecesidadesIndividuales` = '$id';";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;
		   
	   break;


	   //************************************ Necesidades Generales >***********************************+//
		case  "paidNecesidadesGenerales_":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		   
		   $query=" DELETE FROM `poa_paid_necesidades_generales` WHERE `idNecesidadesGenerales` = '$id';";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;
		   
	   break;

	   

	   case  "eliminar_catalogo_Contraloria_PaidAR":
		
		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	
	
		$query="  DELETE FROM poa_paid_catalogo_contraloria WHERE idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente ='$idComponentes' and idRubros='$idRubros' and idAsignacion ='$idAsignacion' and identificador ='$identificador' and idItem='$idItem';";
		$resultado= $conexionEstablecida->exec($query);

		$mensaje=1;
		$jason['mensaje']=$mensaje;

   		break;

    }

	echo json_encode($jason);   	