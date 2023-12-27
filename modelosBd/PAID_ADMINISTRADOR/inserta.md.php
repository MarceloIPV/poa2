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



		case  "recomienda__recomendado__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	
			

	 		if ($idRol==4 || $idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

	 			$query="UPDATE poa_trimestrales SET estadoAlR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


	 		}else{

				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


	 			$query="UPDATE poa_trimestrales SET estadoAlR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));



	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos__formativo":

			$conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			
			if($tipoAct == "FORMATIVO"){
				if ($idRol==4 || $idRol==2) {
					 
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
				 }else{
			
					
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");
			
					 $idDirector__Seguis=$director__seguimientos[0][id_usuario];
			
			
					 $query="UPDATE poa_trimestrales SET estadoFR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
			
				 }
			}else{
				if ($idRol==4 || $idRol==2) {
					 
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
				 }else{
			
					
					$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";
			
					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);
			
					 $director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");
			
					 $idDirector__Seguis=$director__seguimientos[0][id_usuario];
			
			
					 $query="UPDATE poa_trimestrales SET estadoFR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			
					 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			
			
			
				 }
			}
			 
				 
			 
			$resultado= $conexionEstablecida->exec($query);
			
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		
			 
			
		break;

		case  "tipoInfraestructuraInserta":


			$inserta= $objeto->insertSingleRow('poa_paid_tipo_infraestructura',['detalle','fecha','hora','estado','perioIngreso','idUsuario','identificador'],array(':detalle' => $agregado,':fecha' => $fecha_actual,':hora' => $hora_actual,':estado' => 'A',':perioIngreso' => $aniosPeriodos__ingesos,':idUsuario' => $idUsuarioPrincipal,':identificador' => '2'));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoEstadoPropiedadInserta":


			$inserta= $objeto->insertSingleRow('poa_paid_estado_propiedad',['detalle','fecha','hora','estado','perioIngreso','idUsuario','identificador'],array(':detalle' => $agregado,':fecha' => $fecha_actual,':hora' => $hora_actual,':estado' => 'A',':perioIngreso' => $aniosPeriodos__ingesos,':idUsuario' => $idUsuarioPrincipal,':identificador' => '2'));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

				

  } 
 
 
  echo json_encode($jason);