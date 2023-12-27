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

	if (isset($_SESSION["fisicamenteEstructura"])) {
		$fisicamenteEstructura__reales=$_SESSION["fisicamenteEstructura"];
		$idUsuario__ingresos=$_SESSION["idUsuario"];
	}

    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

		
		case  "editarTipoInfraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_paid_tipo_infraestructura SET detalle='$detalle' WHERE id_tipo_infraestructura='$idtabla';";

			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "editarEstadoPropiedad":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_paid_estado_propiedad SET detalle='$detalle' WHERE id_estado_propiedad='$idtabla';";

			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		
    }
	

	

	echo json_encode($jason);

