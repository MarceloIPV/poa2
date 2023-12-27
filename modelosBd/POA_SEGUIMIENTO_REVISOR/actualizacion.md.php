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

		case  "informacion__analistas__reasignar__seguimientos__altos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			if($fisicamenteEstructura__reales==2 || $fisicamenteEstructura__reales==23){
				$query="UPDATE poa_trimestrales SET financiero='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			}if($fisicamenteEstructura__reales==2 || $fisicamenteEstructura__reales==23){
				$query="UPDATE poa_trimestrales SET financiero='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			}else{
				$query="UPDATE poa_trimestrales SET financiero='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			}


			$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;
		
		case  "informacion__analistas__reasignar__seguimientos__ac__fisicas":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estadoF='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));



			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__analistas__reasignar__seguimientos__ac__fisicas__in":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$idUsuario=$_SESSION["idUsuario"];

			$obtenerInformacion__usens=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario' AND a.fisicamenteEstructura='1' AND b.id_rol='4';");

			$obtenerInformacion__rehabilitacion=$objeto->getObtenerInformacionGeneral("SELECT b.tipoIntervencion FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_seguimiento_otros_mantenimiento AS d ON d.idOrganismo=a.idOrganismo WHERE c.idOrganismo='$organismoOculto__modal' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.trimestre='$periodo' and b.tipoIntervencion like '%Rehabi%' GROUP BY a.mensualEjecutado limit 1");

			$obtenerInformacion__poatrimestral=$objeto->getObtenerInformacionGeneral("select * from poa_trimestrales where perioIngreso='$aniosPeriodos__ingesos'and tipoTrimestre = '$periodo' and idOrganismo='$organismoOculto__modal'");



			$data1=array();

			if (!empty($obtenerInformacion__usens[0][id_usuario])) {

				$arrayCadena = explode(",", $selects__superiores);

				if(empty($obtenerInformacion__rehabilitacion[0][tipoIntervencion]) && count($arrayCadena)>1){
					
					$mensaje=3;

				}else if(!empty($obtenerInformacion__rehabilitacion[0][tipoIntervencion]) && count($arrayCadena)!=2){
					
					$mensaje=4;
					
				}else{

					foreach ($arrayCadena as $clave => $valor) {

						$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$valor';");
	
						if ($obtenerInformacion[0][zonal]>1) {
							array_push($data1,1);
						}
	
	
					}
	
					$booleano=false;
	
					foreach ($data1 as $value) {
						
						if ($value==1) {
	
							$booleano=true;
							
						}
	
					}
	
	
					if ($booleano==true && count($arrayCadena)>1) {
						
						$mensaje=8;
						$jason['mensaje']=$mensaje;		
	
					}else{
	
						foreach ($arrayCadena as $clave => $valor) {
	
	
							$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$valor';");
	
	
							if ($obtenerInformacion[0][fisicamenteEstructura]==6) {
	
								$query="UPDATE poa_trimestrales SET estadoIn='$valor' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
								$resultado= $conexionEstablecida->exec($query);	
								
	
							}else{
	
	
								$query="UPDATE poa_trimestrales SET estadoI='$valor' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
								$resultado= $conexionEstablecida->exec($query);
								
	
							}
	
	
							$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$valor', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
	
						}
	
						$mensaje=1;
	
					}

				}

			}else {


				if (empty($obtenerInformacion__rehabilitacion[0][tipoIntervencion])) {
					if ($fisicamenteE==6) {
	
						$query="UPDATE poa_trimestrales SET estadoIn='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
						$resultado= $conexionEstablecida->exec($query);	
						
		
					}else{
		
		
						$query="UPDATE poa_trimestrales SET estadoI='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
						$resultado= $conexionEstablecida->exec($query);
						
		
					}
					
				}else {
					if ($fisicamenteE==6) {
	
						$query="UPDATE poa_trimestrales SET estadoIn='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
						$resultado= $conexionEstablecida->exec($query);	
						
		
					}else{
		
		
						$query="UPDATE poa_trimestrales SET estadoI='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
						$resultado= $conexionEstablecida->exec($query);
						
		
					}
				}
				

				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

							$mensaje=1;


			}
			


			$jason['mensaje']=$mensaje;		


		break;

		case  "informacion__coordinador__regresar__seguimientos__ac__fisicas__in__recomendado":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$idUsuario=$_SESSION["idUsuario"];

			$obtenerInformacion__usens=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario' AND a.fisicamenteEstructura='1' AND b.id_rol='4';");

			$obtenerInformacion__rehabilitacion=$objeto->getObtenerInformacionGeneral("SELECT b.tipoIntervencion FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_seguimiento_otros_mantenimiento AS d ON d.idOrganismo=a.idOrganismo WHERE c.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.trimestre='$periodo' and b.tipoIntervencion like '%Rehabi%' GROUP BY a.mensualEjecutado limit 1");

			$obtenerInformacion__poatrimestral=$objeto->getObtenerInformacionGeneral("select estadoInR,estadoIR from poa_trimestrales where perioIngreso='$aniosPeriodos__ingesos'and tipoTrimestre = '$periodo' and idOrganismo='$idOrganismo'");

			$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$selects__superiores';");

			if ($obtenerInformacion[0][fisicamenteEstructura]==6) {

				if($obtenerInformacion__poatrimestral[0][estadoInR]==$idUsuario){

					$query="UPDATE poa_trimestrales SET estadoInR='$selects__superiores' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);	

					$mensaje=1;
				}else{
					$mensaje=2;
					$jason['mensaje']=$mensaje;	
					break;
				}
				
				

			}else{

				if($obtenerInformacion__poatrimestral[0][estadoIR]==$idUsuario){
					$query="UPDATE poa_trimestrales SET estadoIR='$selects__superiores' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

					$mensaje=1;
				}else{
					$mensaje=2;
					$jason['mensaje']=$mensaje;	
					break;
				}
				
				

			}


			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$selects__superiores', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Devolver", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

			

			$jason['mensaje']=$mensaje;		


		break;

		case  "regreso__recomendado__seguimientos_Contratacion_Publica":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	
			
			 $fisicamenteE=strval($fisicamenteE);

	 		if (($idRol===2 ||$idRol==="2")) {
	 					
				$query="UPDATE poa_trimestrales SET financiero='$selects__superiores',financieroR=NULL WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		
			}else if (($idRol===4 ||$idRol==="4") && ($fisicamenteE===30 || $fisicamenteE==="30"|| $fisicamenteE===31 || $fisicamenteE==="31"||$fisicamenteE===32||$fisicamenteE==="32"||$fisicamenteE===33||$fisicamenteE==="33")){

				$query="UPDATE poa_trimestrales SET financiero='$selects__superiores',financieroR=NULL WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			}else{

	 			$query="UPDATE poa_trimestrales SET financieroR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}
	 			
	 		$resultado= $conexionEstablecida->exec($query);


	 		$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`', '`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios__i__nuevos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$idUsuario__ingresos';");
			$fisicamenteEstructura__recogido=$superior__inmediatos[0][fisicamenteEstructura];

			$superior__inmediatos__45=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$selects__superiores__regresar';");

			$zonal__usuario=$superior__inmediatos__45[0][zonal];

			$obtenerInformacion__rehabilitacion=$objeto->getObtenerInformacionGeneral("SELECT b.tipoIntervencion FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_seguimiento_otros_mantenimiento AS d ON d.idOrganismo=a.idOrganismo WHERE c.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.trimestre='$periodo' and b.tipoIntervencion like '%Rehabi%' GROUP BY a.mensualEjecutado limit 1");

			$obtenerInformacion__mantenimiento=$objeto->getObtenerInformacionGeneral("SELECT b.tipoIntervencion FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_seguimiento_otros_mantenimiento AS d ON d.idOrganismo=a.idOrganismo WHERE c.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.trimestre='$periodo' and b.tipoIntervencion like '%Manten%' GROUP BY a.mensualEjecutado limit 1");

			$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";
			$nombre__archivo2=$idOrganismo."__".$fecha_actual.".pdf";

			

			$nuevo__usuario=$objeto->getObtenerInformacionGeneral("SELECT zonal FROM th_usuario WHERE id_usuario='$idUsuario__ingresos';");

			$fisicamenteEstructura__recogido=$superior__inmediatos[0][fisicamenteEstructura];
			
			if (!empty($obtenerInformacion__rehabilitacion[0][tipoIntervencion]) && !empty($obtenerInformacion__mantenimiento[0][tipoIntervencion])) {
			
				
				$direccionInstalaciones=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";

				$direccionInfraestructuras=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";
				
				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado__infra"]['type'],$_FILES["informe__recomendado__infra"]['size'],$_FILES["informe__recomendado__infra"]['tmp_name'],$_FILES["informe__recomendado__infra"]['name'],$direccionInfraestructuras,$nombre__archivo2);

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado__instalaciones"]['type'],$_FILES["informe__recomendado__instalaciones"]['size'],$_FILES["informe__recomendado__instalaciones"]['tmp_name'],$_FILES["informe__recomendado__instalaciones"]['name'],$direccionInstalaciones,$nombre__archivo);

				
		 		$query="UPDATE poa_trimestrales SET estadoIR='T',  estadoInR='T' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				$resultado= $conexionEstablecida->exec($query);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioPrincipal' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


				 $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInstalaciones`,","`documentoInfras`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo2',","'$nombre__archivo'"));

				

			} else if (empty($obtenerInformacion__mantenimiento[0][tipoIntervencion])) {
	 				

				$direccionInstalaciones=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";


				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado__instalaciones"]['type'],$_FILES["informe__recomendado__instalaciones"]['size'],$_FILES["informe__recomendado__instalaciones"]['tmp_name'],$_FILES["informe__recomendado__instalaciones"]['name'],$direccionInstalaciones,$nombre__archivo);

				
		 		$query="UPDATE poa_trimestrales SET estadoInR='T' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioPrincipal' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInstalaciones`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo'"));



			}else if (empty($obtenerInformacion__rehabilitacion[0][tipoIntervencion])) {


				$direccionInfraestructuras=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado__infra"]['type'],$_FILES["informe__recomendado__infra"]['size'],$_FILES["informe__recomendado__infra"]['tmp_name'],$_FILES["informe__recomendado__infra"]['name'],$direccionInfraestructuras,$nombre__archivo2);

				
		 		$query="UPDATE poa_trimestrales SET estadoIR='T' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioPrincipal' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInfras`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo2'"));

				
			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__infras__59":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			if($fisicamenteE > 26 && $fisicamenteE < 34){
				
   
				$query="UPDATE poa_trimestrales SET estadoIR='$idUsuario__ingresos' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				$resultado= $conexionEstablecida->exec($query);
   
			   $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idUsuario__ingresos', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
   
			}else{

				$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
				$idVarEnvios=$usuarioEnvios[0][id_usuario];


				$query="UPDATE poa_trimestrales SET estadoIR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idVarEnvios', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

			}
	 		
			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			 if($fisicamenteE > 26 && $fisicamenteE < 34){

				$query="UPDATE poa_trimestrales SET estadoFR='$idUsuario__ingresos' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				$resultado= $conexionEstablecida->exec($query);

				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idUsuario__ingresos', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

				

			 }else{

				if ($tipos__nomenclaturas=="ALTO RENDIMIENTO") {
	 			
					$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
   
				}else{
   
					$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
   
				}
   
   
				$idVarEnvios=$usuarioEnvios[0][id_usuario];
   
   
				if ($tipos__nomenclaturas=="ALTO RENDIMIENTO") {
					
					$query="UPDATE poa_trimestrales SET estadoAlR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
   
				}else{
   
					$query="UPDATE poa_trimestrales SET estadoFR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
   
				}
   
				$resultado= $conexionEstablecida->exec($query);
   
			   $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idVarEnvios', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
   


			 }

	 		

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__financiero__59":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			if($fisicamenteE > 26 && $fisicamenteE < 34){
				
   
				$query="UPDATE poa_trimestrales SET financieroR='$idUsuario__ingresos' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				$resultado= $conexionEstablecida->exec($query);
   
			   $inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idUsuario__ingresos', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
   
			}else{

				$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='2' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
				$idVarEnvios=$usuarioEnvios[0][id_usuario];


				$query="UPDATE poa_trimestrales SET financieroR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idVarEnvios', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

			}
	 		
			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		
    }
	

	

	echo json_encode($jason);

