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

		
	
    }

	echo json_encode($jason);