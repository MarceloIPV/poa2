<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	require_once "../../config/files.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	

	$hora_actual2= date('s');
	

	$hora__dos=date('H:i');

	$anioa=date('Y');

	//$anioa='2022';

	/*=====  End of Parametros Iniciales e ======*/
	
	session_start();

		
	$idOrganismoSession=$_SESSION["idOrganismoSession"];
	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	if (isset($_SESSION["fisicamenteEstructura"])) {
		$fisicamenteEstructura__reales=$_SESSION["fisicamenteEstructura"];
		$idUsuario__ingresos=$_SESSION["idUsuario"];
	}

	


	$objeto= new usuarioAcciones();


    function actualizarProgramacion__financiera($idFinanciero,$array){

		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

 		$query = $conexionEstablecida->prepare("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinanciero';");
		$query->execute();

		$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($resultado as $valor) {
			
			$eneroBase=$valor["enero"];
			$febreroBase=$valor["febrero"];
			$marzoBase=$valor["marzo"];
			$abrilBase=$valor["abril"];
			$mayoBase=$valor["mayo"];
			$junioBase=$valor["junio"];
			$julioBase=$valor["julio"];
			$agostoBase=$valor["agosto"];
			$septiembreBase=$valor["septiembre"];
			$octubreBase=$valor["octubre"];
			$noviembreBase=$valor["noviembre"];
			$diciembreBase=$valor["diciembre"];

		}

		$eneroResul=floatval($eneroBase) + floatval($array[0]);
		$febreroResul=floatval($febreroBase) + floatval($array[1]);
		$marzoResul=floatval($marzoBase) + floatval($array[2]);
		$abrilResul=floatval($abrilBase) + floatval($array[3]);
		$mayoResul=floatval($mayoBase) + floatval($array[4]);
		$junioResul=floatval($junioBase) + floatval($array[5]);
		$julioResul=floatval($julioBase) + floatval($array[6]);
		$agostoResul=floatval($agostoBase) + floatval($array[7]);
		$septiembreResul=floatval($septiembreBase) + floatval($array[8]);
		$octubreResul=floatval($octubreBase) + floatval($array[9]);
		$noviembreResul=floatval($noviembreBase) + floatval($array[10]);
		$diciembreResul=floatval($diciembreBase) + floatval($array[11]);

		$resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

		$queryActualizas="UPDATE poa_programacion_financiera SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',totalTotales='$resulResul',totalSumaItem='$resulResul' WHERE idProgramacionFinanciera='$idFinanciero';";

		$resultadoActualiza= $conexionEstablecida->exec($queryActualizas);


		return $resultadoActualiza;

	}	

    function sumarValoresMeses($idOrganismo,$idActividad,$periodo,$arrayItems,$array,$regimen,$arrayMensualiza){

        $conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();


 		$conexionEstablecida->exec("set names utf8");

 		$eneroResul=0;
 		$febreroResul=0;
 		$marzoResul=0;
 		$abrilResul=0;
 		$mayoResul=0;
 		$junioResul=0;
 		$julioResul=0;
 		$agostoResul=0;
 		$septiembreResul=0;
 		$octubreResul=0;
 		$noviembreResul=0;
 		$diciembreResul=0;
 		$resulResul=0;

        foreach ($arrayItems as $key => $itemP) {

            $query = $conexionEstablecida->prepare("SELECT a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='$itemP' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$periodo';");

		    $query->execute();

		    $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($resultado as $valor) {
                
                $eneroBase=$valor["enero"];
                $febreroBase=$valor["febrero"];
                $marzoBase=$valor["marzo"];
                $abrilBase=$valor["abril"];
                $mayoBase=$valor["mayo"];
                $junioBase=$valor["junio"];
                $julioBase=$valor["julio"];
                $agostoBase=$valor["agosto"];
                $septiembreBase=$valor["septiembre"];
                $octubreBase=$valor["octubre"];
                $noviembreBase=$valor["noviembre"];
                $diciembreBase=$valor["diciembre"];
                $idProgramacion=$valor["idProgramacionFinanciera"];

            }

			if($itemP == "510203"){


				if($arrayMensualiza[0] == "si"){
					$decimoTercer = round($array[3] / 12,2);

					$eneroResul=floatval($eneroBase) + floatval($decimoTercer);
					$febreroResul=floatval($febreroBase) + floatval($decimoTercer);
					$marzoResul=floatval($marzoBase) + floatval($decimoTercer);
					$abrilResul=floatval($abrilBase) + floatval($decimoTercer);
					$mayoResul=floatval($mayoBase) + floatval($decimoTercer);
					$junioResul=floatval($junioBase) + floatval($decimoTercer);
					$julioResul=floatval($julioBase) + floatval($decimoTercer);
					$agostoResul=floatval($agostoBase) + floatval($decimoTercer);
					$septiembreResul=floatval($septiembreBase) + floatval($decimoTercer);
					$octubreResul=floatval($octubreBase) + floatval($decimoTercer);
					$noviembreResul=floatval($noviembreBase) + floatval($decimoTercer);
					$diciembreResul=floatval($diciembreBase) + floatval($decimoTercer);
				}else{
					
					if($regimen == "Costa"){

						$eneroResul=floatval($eneroBase);
						$febreroResul=floatval($febreroBase);
						$marzoResul=floatval($marzoBase) + floatval($array[3]);
						$abrilResul=floatval($abrilBase);
						$mayoResul=floatval($mayoBase);
						$junioResul=floatval($junioBase);
						$julioResul=floatval($julioBase);
						$agostoResul=floatval($agostoBase);
						$septiembreResul=floatval($septiembreBase);
						$octubreResul=floatval($octubreBase);
						$noviembreResul=floatval($noviembreBase);
						$diciembreResul=floatval($diciembreBase);

					}else{

						$eneroResul=floatval($eneroBase);
						$febreroResul=floatval($febreroBase);
						$marzoResul=floatval($marzoBase);
						$abrilResul=floatval($abrilBase);
						$mayoResul=floatval($mayoBase);
						$junioResul=floatval($junioBase);
						$julioResul=floatval($julioBase);
						$agostoResul=floatval($agostoBase) + floatval($array[3]);
						$septiembreResul=floatval($septiembreBase);
						$octubreResul=floatval($octubreBase);
						$noviembreResul=floatval($noviembreBase);
						$diciembreResul=floatval($diciembreBase);
					}
					
				}
				

			}else if($itemP == "510204"){

				if($arrayMensualiza[1] == "si"){
					$decimoCuarto = round($array[4] / 12,2);

					$eneroResul=floatval($eneroBase) + floatval($decimoCuarto);
					$febreroResul=floatval($febreroBase) + floatval($decimoCuarto);
					$marzoResul=floatval($marzoBase) + floatval($decimoCuarto);
					$abrilResul=floatval($abrilBase) + floatval($decimoCuarto);
					$mayoResul=floatval($mayoBase) + floatval($decimoCuarto);
					$junioResul=floatval($junioBase) + floatval($decimoCuarto);
					$julioResul=floatval($julioBase) + floatval($decimoCuarto);
					$agostoResul=floatval($agostoBase) + floatval($decimoCuarto);
					$septiembreResul=floatval($septiembreBase) + floatval($decimoCuarto);
					$octubreResul=floatval($octubreBase) + floatval($decimoCuarto);
					$noviembreResul=floatval($noviembreBase) + floatval($decimoCuarto);
					$diciembreResul=floatval($diciembreBase) + floatval($decimoCuarto);
					
				}else{
					
					$eneroResul=floatval($eneroBase);
					$febreroResul=floatval($febreroBase);
					$marzoResul=floatval($marzoBase);
					$abrilResul=floatval($abrilBase);
					$mayoResul=floatval($mayoBase);
					$junioResul=floatval($junioBase);
					$julioResul=floatval($julioBase);
					$agostoResul=floatval($agostoBase);
					$septiembreResul=floatval($septiembreBase);
					$octubreResul=floatval($octubreBase);
					$noviembreResul=floatval($noviembreBase);
					$diciembreResul=floatval($diciembreBase) + floatval($array[4]);
					
				}

			}else{

				$eneroResul=floatval($eneroBase) + floatval($array[$key]);
				$febreroResul=floatval($febreroBase) + floatval($array[$key]);
				$marzoResul=floatval($marzoBase) + floatval($array[$key]);
				$abrilResul=floatval($abrilBase) + floatval($array[$key]);
				$mayoResul=floatval($mayoBase) + floatval($array[$key]);
				$junioResul=floatval($junioBase) + floatval($array[$key]);
				$julioResul=floatval($julioBase) + floatval($array[$key]);
				$agostoResul=floatval($agostoBase) + floatval($array[$key]);
				$septiembreResul=floatval($septiembreBase) + floatval($array[$key]);
				$octubreResul=floatval($octubreBase) + floatval($array[$key]);
				$noviembreResul=floatval($noviembreBase) + floatval($array[$key]);
				$diciembreResul=floatval($diciembreBase) + floatval($array[$key]);
			}

				
            $resulResul=floatval($eneroResul) + floatval($febreroResul) + floatval($marzoResul) + floatval($abrilResul) + floatval($mayoResul) + floatval($junioResul) + floatval($julioResul) + floatval($agostoResul) + floatval($septiembreResul) + floatval($octubreResul) + floatval($noviembreResul) + floatval($diciembreResul);

            $queryActualizas="UPDATE poa_programacion_financiera SET enero='$eneroResul',febrero='$febreroResul', marzo='$marzoResul', abril='$abrilResul', mayo='$mayoResul', junio='$junioResul', julio='$julioResul', agosto='$agostoResul', septiembre='$septiembreResul', octubre='$octubreResul', noviembre='$noviembreResul', diciembre='$diciembreResul',totalTotales='$resulResul',totalSumaItem='$resulResul' WHERE idProgramacionFinanciera='$idProgramacion';";

            $resultadoActualiza= $conexionEstablecida->exec($queryActualizas);


		     
        }

        return $resultadoActualiza;  

    }


    function verificaDecimos($decimoTercer,$divididosT,$mensualizaTercer){

        $dTercero = 0;

        if($mensualizaTercer == "si"){
            $dTercero = $divididosT;
        }else{
            $dTercero = $decimoTercer;
        }

        return $dTercero;

    }


    switch($tipo){

        case  "act__administrativas":

            $conexionRecuperada= new conexion();
            $conexionEstablecida=$conexionRecuperada->cConexion();


			$dataArray = json_decode($data);

            $item__array = $dataArray[0];
			$justificacion__array = $dataArray[1];
			$cantidad__array = $dataArray[2];
			$enero__array = $dataArray[3];
			$febrero__array = $dataArray[4];
			$marzo__array = $dataArray[5];
			$abril__array = $dataArray[6];
			$mayo__array = $dataArray[7];
			$junio__array = $dataArray[8];
			$julio__array = $dataArray[9];
			$agosto__array = $dataArray[10];
			$septiembre__array = $dataArray[11];
			$octubre__array = $dataArray[12];
			$noviembre__array = $dataArray[13];
			$diciembre__array = $dataArray[14];
			$total__array = $dataArray[15];
            $errores_array = array();

            $valor_Total = 0;
			
            for($i=0;$i<count($total__array);$i++){

                $valor_Total += $total__array[$i];
            
            }

            $inversion=$objeto->getObtenerInformacionGeneral("SELECT a.nombreInversion FROM poa_inversion AS a INNER JOIN poa_inversion_usuario AS b ON a.idInversion=b.idInversion WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$totalAsignado=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$sumar=round(floatval($totalAsignado[0][sumaItemTotal]) + floatval($valor_Total),2);

            if (floatval($sumar)>floatval($inversion[0][nombreInversion])) {

				$mensaje=3;

			}else if($valor_Total <= $inversion[0][nombreInversion]){
                for($i=0;$i<count($item__array);$i++){

                    $justificacion__array[$i]=filter_var($justificacion__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
    
                    $informacionObjeto__idItem=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_item WHERE itemPreesupuestario='$item__array[$i]';");
    
                    $informacionObjeto__idActividad=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idItem='".$informacionObjeto__idItem[0][idItem]."' AND idActividad='$idActividad' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");
        
                    $inserta=$objeto->insertSingleRow('poa_actividadesadministrativas',['justificacionActividad','cantidadBien','idProgramacionFinanciera','fecha','perioIngreso'],array(':justificacionActividad' => $justificacion__array[$i],':cantidadBien' => $cantidad__array[$i],':idProgramacionFinanciera' => $informacionObjeto__idActividad[0][idProgramacionFinanciera] ,':fecha' => $fecha_actual ,':perioIngreso' => $aniosPeriodos__ingesos));
    
    
                     $query2="UPDATE poa_programacion_financiera AS a SET a.enero='$enero__array[$i]',a.febrero='$febrero__array[$i]',a.marzo='$marzo__array[$i]',a.abril='$abril__array[$i]',a.mayo='$mayo__array[$i]',a.junio='$junio__array[$i]',a.julio='$julio__array[$i]',a.agosto='$agosto__array[$i]',a.septiembre='$septiembre__array[$i]',a.octubre='$octubre__array[$i]',a.noviembre='$noviembre__array[$i]',a.diciembre='$diciembre__array[$i]',a.totalSumaItem='$total__array[$i]',a.totalTotales='$total__array[$i]' WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND idProgramacionFinanciera='".$informacionObjeto__idActividad[0][idProgramacionFinanciera]."';";
    
                     $resultado= $conexionEstablecida->exec($query2);
    
    
                }

                $mensaje=1;
            }else{

                $mensaje=2;
            }
        
			$jason['mensaje']=$mensaje;

		break;

        case  "suminis__administrativas":

			$dataArray = json_decode($data);

			$tipo__array = $dataArray[0];
			$nombre__array = $dataArray[1];
			$luz__array = $dataArray[2];
			$agua__array = $dataArray[3];
			
            for($i=0;$i<count($tipo__array);$i++){

                $inserta=$objeto->insertSingleRow('poa_suministrosn',['tipo','nombreEscenario','idOrganismo','fecha','modifica','perioIngreso'],array(':tipo' => $tipo__array[$i],':nombreEscenario' => $nombre__array[$i],':idOrganismo' => $idOrganismoSession,':fecha' => $fecha_actual ,':modifica' => NULL,':perioIngreso' => $aniosPeriodos__ingesos));

                $maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idSumi) AS maximo FROM poa_suministrosn;");

                $maximo=$maximoProgramacion__financiera[0][maximo];

                $inserta=$objeto->insertSingleRow('poa_suministros',['luz','agua','idSumiN','perioIngreso'],array(':luz' => $luz__array[$i],':agua' => $agua__array[$i],':idSumiN' => $maximo ,':perioIngreso' => $aniosPeriodos__ingesos));

            }

			$mensaje=1;
			$jason['mensaje']=$mensaje;		


		break;

        case  "mantenimiento":

            $dataArray = json_decode($data);

            $item__array = $dataArray[0];
			$nombreInfra__array = $dataArray[1];
			$id__provincia__array = $dataArray[24];
			$direccion__array = $dataArray[3];
			$estado__array = $dataArray[4];
			$tipoRecursos__array = $dataArray[5];
			$tipoIntervencion__array = $dataArray[6];
			$detallarTipo__intervencion__array = $dataArray[7];
			$tipoMantenimiento__array = $dataArray[8];
			$materiales__servicios__array = $dataArray[9];
            $ultimoFecha__servicios__array = $dataArray[10];
			$enero__array = $dataArray[11];
			$febrero__array = $dataArray[12];
			$marzo__array = $dataArray[13];
			$abril__array = $dataArray[14];
			$mayo__array = $dataArray[15];
			$junio__array = $dataArray[16];
			$julio__array = $dataArray[17];
			$agosto__array = $dataArray[18];
			$septiembre__array = $dataArray[19];
			$octubre__array = $dataArray[20];
			$noviembre__array = $dataArray[21];
			$diciembre__array = $dataArray[22];
			$total__array = $dataArray[23];

            $valor_Total = 0;
			
            for($i=0;$i<count($total__array);$i++){

                $valor_Total += $total__array[$i];
            
            }

            $inversion=$objeto->getObtenerInformacionGeneral("SELECT a.nombreInversion FROM poa_inversion AS a INNER JOIN poa_inversion_usuario AS b ON a.idInversion=b.idInversion WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$totalAsignado=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$sumar=round(floatval($totalAsignado[0][sumaItemTotal]) + floatval($valor_Total),2);

            if (floatval($sumar)>floatval($inversion[0][nombreInversion])) {

				$mensaje=3;

			}else if($valor_Total <= $inversion[0][nombreInversion]){
                for($i=0;$i<count($item__array);$i++){

                    $informacionObjeto__idItem=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_item WHERE itemPreesupuestario='$item__array[$i]';");
    
                    $informacionObjeto__idActividad=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales FROM poa_programacion_financiera WHERE idItem='".$informacionObjeto__idItem[0][idItem]."' AND idActividad='$idActividad' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");
        
                    $inserta=$objeto->insertSingleRow('poa_mantenimiento',['nombreInfras','provincia','direccionCompleta','estado','tipoRecursos','tipoIntervencion','detallarTipoIn','tipoMantenimiento','materialesServicios','fechaUltimo','idProgramacionFinanciera','fecha','modifica','perioIngreso','idOrganismo','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','total'],array(':nombreInfras' => $nombreInfra__array[$i],':provincia' => $id__provincia__array[$i],':direccionCompleta' => $direccion__array[$i],':estado' => $estado__array[$i],':tipoRecursos' => $tipoRecursos__array[$i],':tipoIntervencion' => $tipoIntervencion__array[$i],':detallarTipoIn' => $detallarTipo__intervencion__array[$i],':tipoMantenimiento' => $tipoMantenimiento__array[$i],':materialesServicios' => $materiales__servicios__array[$i],':fechaUltimo' => $ultimoFecha__servicios__array[$i],':idProgramacionFinanciera' => $informacionObjeto__idActividad[0][idProgramacionFinanciera],':fecha' => $fecha_actual,':modifica' => NULL,':perioIngreso' => $aniosPeriodos__ingesos,':idOrganismo' => $idOrganismoSession,':enero' => $enero__array[$i],':febrero' => $febrero__array[$i],':marzo' => $marzo__array[$i],':abril' => $abril__array[$i],':mayo' => $mayo__array[$i],':junio' => $junio__array[$i],':julio' => $julio__array[$i],':agosto' => $agosto__array[$i],':septiembre' => $septiembre__array[$i],':octubre' => $octubre__array[$i],':noviembre' => $noviembre__array[$i],':diciembre' => $diciembre__array[$i],':total' => $total__array[$i]));    
    
                    $resultadoActualiza = actualizarProgramacion__financiera($informacionObjeto__idActividad[0][idProgramacionFinanciera],[$enero__array[$i],$febrero__array[$i],$marzo__array[$i],$abril__array[$i],$mayo__array[$i],$junio__array[$i],$julio__array[$i],$agosto__array[$i],$septiembre__array[$i],$octubre__array[$i],$noviembre__array[$i],$diciembre__array[$i]]);
    
   
                }
    
                $mensaje=1;
            }else{
                $mensaje=2;
            }
			
			$jason['mensaje']=$mensaje;	

		break;

        case  "act__deportivas":

			$dataArray = json_decode($data);

            $item__array=$dataArray[0];
			$evento__array=$dataArray[1];
			$tipoFinanciamiento__array=$dataArray[2];
			$id__deporte__array=$dataArray[32];	
			$id__provincia__array=$dataArray[33];
			$id__pais__array=$dataArray[34];
			$id__alcanse__array=$dataArray[35];
			$fechaInicio__array=$dataArray[7];
			$fechaFin__array=$dataArray[8];
			$genero__array=$dataArray[9];
			$categoria__array=$dataArray[10];
			$numeroEntrenadores__array=$dataArray[11];
			$numeroAtletas__array=$dataArray[12];
			$totalEntrenadoresAtletas__array=$dataArray[13];
			$mujeresB__array=$dataArray[14];
			$hombresB__array=$dataArray[15];
			$cantidad__array=$dataArray[16];
			$detalle__array=$dataArray[17];
			$justificacion__array=$dataArray[18];
			$enero__array=$dataArray[19];
			$febrero__array=$dataArray[20];
			$marzo__array=$dataArray[21];
			$abril__array=$dataArray[22];
			$mayo__array=$dataArray[23];
			$junio__array=$dataArray[24];
			$julio__array=$dataArray[25];
			$agosto__array=$dataArray[26];
			$septiembre__array=$dataArray[27];
			$octubre__array=$dataArray[28];
			$noviembre__array=$dataArray[29];
			$diciembre__array=$dataArray[30];
			$total__array=$dataArray[31];

            $valor_Total = 0;
			
            for($i=0;$i<count($total__array);$i++){

                $valor_Total += $total__array[$i];
            
            }

            $inversion=$objeto->getObtenerInformacionGeneral("SELECT a.nombreInversion FROM poa_inversion AS a INNER JOIN poa_inversion_usuario AS b ON a.idInversion=b.idInversion WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$totalAsignado=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$sumar=round(floatval($totalAsignado[0][sumaItemTotal]) + floatval($valor_Total),2);

            if (floatval($sumar)>floatval($inversion[0][nombreInversion])) {

				$mensaje=3;

			}else if($valor_Total <= $inversion[0][nombreInversion]){
                for($i=0;$i<count($item__array);$i++){

                    $informacionObjeto__idItem=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_item WHERE itemPreesupuestario='$item__array[$i]';");
    
                    $informacionObjeto__idActividad=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales FROM poa_programacion_financiera WHERE idItem='".$informacionObjeto__idItem[0][idItem]."' AND idActividad='$idActividad' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");
        
                    $inserta=$objeto->insertSingleRow('poa_actdeportivas',['tipoFinanciamiento','nombreEvento','Deporte','provincia','ciudadPais','alcance','fechaInicio','fechaFin','genero','categoria','numeroEntreandores','numeroAtletas','total','mBenefici','hBenefici','justificacionAd','canitdarBie','idProgramacionFinanciera','fecha','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','totalElem','detalleBien','modifica','perioIngreso'],array(':tipoFinanciamiento' => $tipoFinanciamiento__array[$i],':nombreEvento' => $evento__array[$i],':Deporte' => $id__deporte__array[$i],':provincia' => $id__provincia__array[$i],':ciudadPais' => $id__pais__array[$i],':alcance' => $id__alcanse__array[$i],':fechaInicio' => $fechaInicio__array[$i],':fechaFin' => $fechaFin__array[$i],':genero' => $genero__array[$i],':categoria' => $categoria__array[$i],':numeroEntreandores' => $numeroEntrenadores__array[$i],':numeroAtletas' => $numeroAtletas__array[$i],':total' => $totalEntrenadoresAtletas__array[$i],':mBenefici' => $mujeresB__array[$i],':hBenefici' => $hombresB__array[$i],':justificacionAd' => $justificacion__array[$i],':canitdarBie' => $cantidad__array[$i],':idProgramacionFinanciera' => $informacionObjeto__idActividad[0][idProgramacionFinanciera],':fecha' => $fecha_actual,':enero' => $enero__array[$i],':febrero' => $febrero__array[$i],':marzo' => $marzo__array[$i],':abril' => $abril__array[$i],':mayo' => $mayo__array[$i],':junio' => $junio__array[$i],':julio' => $julio__array[$i],':agosto' => $agosto__array[$i],':septiembre' => $septiembre__array[$i],':octubre' => $octubre__array[$i],':noviembre' => $noviembre__array[$i],':diciembre' => $diciembre__array[$i],':totalElem' => $total__array[$i],':detalleBien' => $detalle__array[$i],':modifica' => NULL,':perioIngreso' => $aniosPeriodos__ingesos));    
    
                    $resultadoActualiza = actualizarProgramacion__financiera($informacionObjeto__idActividad[0][idProgramacionFinanciera],[$enero__array[$i],$febrero__array[$i],$marzo__array[$i],$abril__array[$i],$mayo__array[$i],$junio__array[$i],$julio__array[$i],$agosto__array[$i],$septiembre__array[$i],$octubre__array[$i],$noviembre__array[$i],$diciembre__array[$i]]);
    
   
                }
    
                $mensaje=1;
            }else{
                $mensaje=2;
            }
			
			$jason['mensaje']=$mensaje;	

		break;


        case "honorarios":

            $dataArray = json_decode($data);

			$cedula__array = $dataArray[0];
			$nombres__array = $dataArray[1];
			$cargo__array = $dataArray[2];
            $tipo__array = $dataArray[3];
			$honorario__mensual = $dataArray[4];
			$enero__array = $dataArray[5];
			$febrero__array = $dataArray[6];
			$marzo__array = $dataArray[7];
			$abril__array = $dataArray[8];
			$mayo__array = $dataArray[9];
			$junio__array = $dataArray[10];
			$julio__array = $dataArray[11];
			$agosto__array = $dataArray[12];
			$septiembre__array = $dataArray[13];
			$octubre__array = $dataArray[14];
			$noviembre__array = $dataArray[15];
			$diciembre__array = $dataArray[16];
			$total__array = $dataArray[17];
			

            $valor_Total = 0;
			
            for($i=0;$i<count($total__array);$i++){

                $valor_Total += $total__array[$i];
            
            }

            $inversion=$objeto->getObtenerInformacionGeneral("SELECT a.nombreInversion FROM poa_inversion AS a INNER JOIN poa_inversion_usuario AS b ON a.idInversion=b.idInversion WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos';");

			$totalAsignado=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$sumar=round(floatval($totalAsignado[0][sumaItemTotal]) + floatval($valor_Total),2);

            if (floatval($sumar)>floatval($inversion[0][nombreInversion])) {

				$mensaje=3;

			}else if($valor_Total <= $inversion[0][nombreInversion]){
                for($i=0;$i<count($cedula__array);$i++){
    
                    $informacionObjeto__idActividad=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales FROM poa_programacion_financiera WHERE idItem='71' AND idActividad='$idActividad' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");
        
                    $inserta=$objeto->insertSingleRow('poa_honorarios2022',['cedula','nombres','cargo','honorarioMensual','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','total','idOrganismo','fecha','tipoCargo','idActividad','modifica','perioIngreso'],array(':cedula' => $cedula__array[$i],':nombres' => $nombres__array[$i],':cargo' => $cargo__array[$i],':honorarioMensual' => $honorario__mensual[$i],':enero' => $enero__array[$i],':febrero' => $febrero__array[$i],':marzo' => $marzo__array[$i],':abril' => $abril__array[$i],':mayo' => $mayo__array[$i],':junio' => $junio__array[$i],':julio' => $julio__array[$i],':agosto' => $agosto__array[$i],':septiembre' => $septiembre__array[$i],':octubre' => $octubre__array[$i],':noviembre' => $noviembre__array[$i],':diciembre' => $diciembre__array[$i],':total' => $total__array[$i],':idOrganismo' => $idOrganismoSession,':fecha' => $fecha_actual,':tipoCargo' => $tipo__array[$i],':idActividad' => $idActividad,':modifica' => NULL,':perioIngreso' => $aniosPeriodos__ingesos));    
    
                    $resultadoActualiza = actualizarProgramacion__financiera($informacionObjeto__idActividad[0][idProgramacionFinanciera],[$enero__array[$i],$febrero__array[$i],$marzo__array[$i],$abril__array[$i],$mayo__array[$i],$junio__array[$i],$julio__array[$i],$agosto__array[$i],$septiembre__array[$i],$octubre__array[$i],$noviembre__array[$i],$diciembre__array[$i]]);
    
   
                }
    
                $mensaje=1;
            }else{
                $mensaje=2;
            }
			
			$jason['mensaje']=$mensaje;	

        break;


        case "sueldos__salarios":

            $dataArray = json_decode($data);


			$cedula__array = $dataArray[0];
			$nombres__array = $dataArray[1];
			$cargo__array = $dataArray[2];
			$tipoCargo__array = $dataArray[3];
			$tiempoTrabajo__array = $dataArray[4];
			$sueldos__array = $dataArray[5];
			$aporte__array = $dataArray[6];
			$decimoTercero__array = $dataArray[7];
			$mensualizaDecimoTercero__array = $dataArray[8];
			$decimoCuarto__array = $dataArray[9];
			$mensualizaDecimoCuarta__array = $dataArray[10];
			$fondosDeReserva__array = $dataArray[11];
			$enero__array = $dataArray[12];
			$febrero__array = $dataArray[13];
			$marzo__array = $dataArray[14];
			$abril__array = $dataArray[15];
			$mayo__array = $dataArray[16];
			$junio__array = $dataArray[17];
			$julio__array = $dataArray[18];
			$agosto__array = $dataArray[19];
			$septiembre__array = $dataArray[20];
			$octubre__array = $dataArray[21];
			$noviembre__array = $dataArray[22];
			$diciembre__array = $dataArray[23];
			$total__array = $dataArray[24];


            $valor_Total = 0;
			
            for($i=0;$i<count($total__array);$i++){

                $valor_Total += $total__array[$i];
            
            }

            $inversion=$objeto->getObtenerInformacionGeneral("SELECT a.nombreInversion FROM poa_inversion AS a INNER JOIN poa_inversion_usuario AS b ON a.idInversion=b.idInversion WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos';");
	

            $regimen=$objeto->getObtenerInformacionGeneral("SELECT regimen FROM poa_organismo WHERE idOrganismo='$idOrganismoSession';");

            $regimenOrganismo = $regimen[0][regimen];

            if(empty($regimenOrganismo)){

                $mensaje = 4;

            }else{

                $totalAsignado=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$sumar=round(floatval($totalAsignado[0][sumaItemTotal]) + floatval($valor_Total),2);

                if (floatval($sumar)>floatval($inversion[0][nombreInversion])) {

					$mensaje=3;

				}else if($valor_Total <= $inversion[0][nombreInversion]){

                    for($i=0;$i<count($cedula__array);$i++){
    
                    
                        $inserta=$objeto->insertSingleRow('poa_sueldossalarios2022',['cedula','nombres','cargo','tipoCargo','tiempoTrabajo','sueldoSalario','aportePatronal','decimoTercera','mensualizaTercera','decimoCuarta','menusalizaCuarta','fondosReserva','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','total','idOrganismo','fecha','idActividad','modifica','perioIngreso'],array(':cedula' => $cedula__array[$i],':nombres' => $nombres__array[$i],':cargo' => $cargo__array[$i],':tipoCargo' => $tipoCargo__array[$i],':tiempoTrabajo' => $tiempoTrabajo__array[$i],':sueldoSalario' => $sueldos__array[$i],':aportePatronal' => $aporte__array[$i],':decimoTercera' => $decimoTercero__array[$i],':mensualizaTercera' => $mensualizaDecimoTercero__array[$i],':decimoCuarta' => $decimoCuarto__array[$i],':menusalizaCuarta' => $mensualizaDecimoCuarta__array[$i],':fondosReserva' => $fondosDeReserva__array[$i],':enero' => $enero__array[$i],':febrero' => $febrero__array[$i],':marzo' => $marzo__array[$i],':abril' => $abril__array[$i],':mayo' => $mayo__array[$i],':junio' => $junio__array[$i],':julio' => $julio__array[$i],':agosto' => $agosto__array[$i],':septiembre' => $septiembre__array[$i],':octubre' => $octubre__array[$i],':noviembre' => $noviembre__array[$i],':diciembre' => $diciembre__array[$i],':total' => $total__array[$i],':idOrganismo' => $idOrganismoSession,':fecha' => $fecha_actual,':idActividad' => $tipo__array[$i],':modifica' => NULL,':perioIngreso' => $aniosPeriodos__ingesos));  
                        
                        $valoresItem = array('510106', '510601', '510602','510203','510204');
                
                        sumarValoresMeses($idOrganismoSession,$idActividad,$aniosPeriodos__ingesos,$valoresItem,[$sueldos__array[$i],$aporte__array[$i],$fondosDeReserva__array[$i],$decimoTercero__array[$i],$decimoCuarto__array[$i]],$regimenOrganismo,[$mensualizaDecimoTercero__array[$i],$mensualizaDecimoCuarta__array[$i]]);

                    }
        
                    $mensaje=1;


                }else{

                    $mensaje=2;

                }

            }

                $jason['mensaje']=$mensaje;	

        break;

    }

    echo json_encode($jason);