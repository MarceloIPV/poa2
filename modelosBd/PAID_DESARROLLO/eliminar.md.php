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

		case  "paidJuegosNacionales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		   
		   $query=" DELETE FROM poa_paid_encuentroactivo WHERE `idEncuentroActivo` = '$id';";
		   $resultado= $conexionEstablecida->exec($query);

		   $mensaje=1;
		   $jason['mensaje']=$mensaje;
		   
	   break;

	  
	   	case  "eliminar_catalogo_Contraloria_Paid":
		
				$conexionRecuperada= new conexion();
				$conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query="  DELETE FROM poa_paid_catalogo_contraloria WHERE idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente ='$idComponentes' and idRubros='$idRubros' and idAsignacion ='$idAsignacion' and identificador ='$identificador' and idItem='$idItem';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
	   
   		break;

		case  "paidMedallasJuegosNacionales":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_medallas_convencional WHERE `idMedallas` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		
		case  "paidAdecentameintoJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidBienesJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidMedicinasJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query="  DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidAlqEquiposJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidComEquiposJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidLogEventosJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidPublicidadJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

		case  "paidAcreditacionesJN":
		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_matrices_juegos_nacionales WHERE `idMatriz` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;
		
		break;

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP ALIM DI >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidHospAlimDI":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP ALIM DC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidHospAlimDC":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP HIDR DI>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidHidratacionDI":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP HIDR DC>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidHidratacionDC":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP HIDR DC>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidHidratacionDC":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< PTC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidJuegosNacionalesPTC":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_personal_tecnico_convensional WHERE `id_personal_tecnico_convensional` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Uniformes Adaptado >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidUniformes":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query="DELETE FROM poa_paid_uniformes_adaptado WHERE `id_uniformes_adaptado` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Uniformes Adaptado >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidIndumentariaPApoyo":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query="DELETE FROM poa_paid_uniformes_adaptado WHERE `id_uniformes_adaptado` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;

//--------------------------------------Bono Deportivo----------------------------------------------
		case "paidBonoDeportivoJuegosNacionales":

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query="DELETE FROM poa_paid_bono_deportivo  WHERE `idBonoDeportivo` = '$id';";
			$resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;	
		break;

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP ALIM Juegos Ancestrales>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidDeporteDelegacionHospAlimJA":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HIDR Juegos Ancestrales>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidDeporteDelegacionHidrJA":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOSP ALIM DI >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidHospAlimJA":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE `id_juegos_nacionales_hosp_alim_hidr` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Seguro >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidSeguroDeporte":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_seguros WHERE `idSeguro` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;

		case  "paidSeguroProvincia":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_seguros WHERE `idSeguro` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Transporte >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidTransporteDeporte":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_transporte WHERE `idTransporte` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;

		case  "paidTransporteProvincia":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_transporte WHERE `idTransporte` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< PASAJES AEREOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case  "paidPasajesAereos":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_pasajes_aereos WHERE `id_pasajes_aereos` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;

		case  "paidEventosDesarrollo":		
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
		
		    $query=" DELETE FROM poa_paid_eventos_desarrollo WHERE `idEvento` = '$id';";
		    $resultado= $conexionEstablecida->exec($query);

		    $mensaje=1;
			$jason['mensaje']=$mensaje;		
		break;
	   
    }

	

	echo json_encode($jason);