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

	if (isset($_SESSION["idOrganismoSession"])) {

		$idOrganismoSession=$_SESSION["idOrganismoSession"];

	}

    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

		
		case  "eliminarTipoInfraestructura":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			

			 $direccion1=VARIABLE__BACKEND."paid/informes__infraestructura/";

			$query="DELETE FROM poa_paid_informes_infraestructura WHERE idinformesInfraestructura='$idtabla';";
			
			if($tipoDocumento=="Obra"){

				$query1="DELETE FROM poa_paid_beneficiarios_infraestructura WHERE idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponente' and idRubro='$idRubro';";
			
				$query2="DELETE FROM poa_paid_beneficiariosAdaptado_infraestructura WHERE idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponente' and idRubro='$idRubro';";

				$resultado= $conexionEstablecida->exec($query1);
				$resultado= $conexionEstablecida->exec($query2);
			}
			

			$query3="DELETE FROM poa_paid_documentos_infraestructura WHERE idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponente' and idRubro='$idRubro' and tipo='$tipoDocumento';";

			

			$resultado= $conexionEstablecida->exec($query);
			$resultado= $conexionEstablecida->exec($query3);

			$mensaje=1;
			$jason['mensaje']=$mensaje;	
			
			unlink($direccion1.$documento);

		break;


		
    }
	

	

	echo json_encode($jason);

