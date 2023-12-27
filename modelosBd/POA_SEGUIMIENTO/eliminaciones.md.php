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

	    case  "eliminar__contratacion_publica_seguimiento":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="DELETE FROM poa_catalogo_contraloria_seguimiento WHERE idItemCatalogo='$idItem' and trimestre='$trimestre' and idOrganismo ='$idOrganismo' and perioIngreso='$aniosPeriodos__ingesos' and idActividad ='$actividad'";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

        case  "eliminar_registro_contratacion_publica":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	

		
			$query="DELETE FROM poa_registro_contratacion WHERE idItemCatalogo='$idItem' and trimestre='$trimestre' and idOrganismo ='$idOrganismo' and perioIngreso='$aniosPeriodos__ingesos' and idActividad ='$actividad'";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

   		break;

	

  }

 
		
    

	echo json_encode($jason);

	