<?php
	
	extract($_POST);


	
	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	require_once "../../config/config2.php";

	require_once '../../PHPExcel/Classes/PHPExcel.php';

	$archivo = $_FILES['documentoExcel']['tmp_name'];


	/*=======================================
	=            Excel generados            =
	=======================================*/

	$inputFileType = PHPExcel_IOFactory::identify($archivo);

	$objReader = PHPExcel_IOFactory::createReader($inputFileType);

	$objPHPExcel = $objReader->load($archivo);

	$sheet = $objPHPExcel->getSheet(0); 

	$highestRow = $sheet->getHighestRow(); 

	$highestColumn = $sheet->getHighestColumn();	
	
	/*=====  End of Excel generados  ======*/

	/*====================================
	=            Obligatorios            =
	====================================*/
	
	$banderaObligatorios=false;
	$obligatorios__exceles=array();

	
	/*=====  End of Obligatorios  ======*/

	/*==========================================
	=            Instanciar objetos            =
	==========================================*/
	
	$objeto= new usuarioAcciones();

	session_start();

	$idOrganismo = $_SESSION['idOrganismoSession'];
	$periodo_Traido = $_SESSION['selectorAniosA'];
	
	/*=====  End of Instanciar objetos  ======*/

	function itemEvaluador($itemPresupuestario,$idActividad,$idOrganismo,$periodo_Traido){

		$objeto= new usuarioAcciones();

		$informacionObjeto__idItem=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_item WHERE itemPreesupuestario='$itemPresupuestario';");

		$informacionObjeto__idActividad=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idItem='".$informacionObjeto__idItem[0][idItem]."' AND idActividad='$idActividad' AND idOrganismo='$idOrganismo' AND perioIngreso='$periodo_Traido';");

		return $informacionObjeto__idActividad[0][idProgramacionFinanciera];

	}
	
	function evaluacionMatrices($accionesMatriz,$aux,$valor,$comparadorItem__financiero){

		$objeto= new usuarioAcciones();

		switch ($accionesMatriz) {

			case 1:

				if ($aux==$valor) {
					return true;
				}else{
					return false;
				}

			break;

		}

	}

	function comparador__caracteres($valor, $arrayPermitidos){

		$valorMinusculas = strtolower($valor);
		$arrayEvaluador=array();

		foreach ($arrayPermitidos as $clave => $valor) {

			if (strpos($valorMinusculas,$clave)!==false) {
				array_push($arrayEvaluador,$valor);
			}

		}

		if (count($arrayEvaluador)>0) {
			return $arrayEvaluador[0];
		}else{
			return "no";
		}

		

	}

	function comparador__suedlosHonorarios($cedula, $tabla, $periodo){


		$objeto= new usuarioAcciones();

		$informacionObjeto__idItem=$objeto->getObtenerInformacionGeneral("SELECT cedula FROM $tabla WHERE cedula='$cedula' AND perioIngreso='$periodo';");

		if (empty($informacionObjeto__idItem[0][cedula])) {
			return 1;
		}else{
			return 0;
		}			

	}

	function consulta__selectComparador($tabla, $campoNombre,$idEntificador, $valor){


		$objeto= new usuarioAcciones();

		$arrayIdentificadores=array();


		$consulta__tipo=$objeto->getObtenerInformacionGeneral("SELECT $idEntificador, $campoNombre FROM $tabla WHERE $campoNombre LIKE '%$valor%' ORDER BY $idEntificador LIMIT 1 ;");

		array_push($arrayIdentificadores,$consulta__tipo[0][$idEntificador]);
		array_push($arrayIdentificadores,$consulta__tipo[0][$campoNombre]);

		return $arrayIdentificadores;		

	}
	
	function consulta__item__necesario($idOrganismo, $idActividad,$idItem, $perioIngreso){


		$objeto= new usuarioAcciones();

		$arrayIdentificadores=array();


		$consulta__item=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND idActividad='$idActividad' AND idItem='$idItem' AND perioIngreso='$perioIngreso';");

		if (empty($consulta__item[0][idProgramacionFinanciera])) {
			return "si";	
		}else{
			return "no";
		}


	}
	

	/*====================================
	=            Código items            =
	====================================*/

	$array__errorItem=array();
	$array__errorItemRepetido=array();

	$array__camposVacios=array();
	$array__errorCampoNoCorresponde=array();




	switch ($tipo) {


		case "act__administrativas":

			$item__array=array();
			$justificacion__array=array();
			$cantidad__array=array();
			$enero__array=array();
			$febrero__array=array();
			$marzo__array=array();
			$abril__array=array();
			$mayo__array=array();
			$junio__array=array();
			$julio__array=array();
			$agosto__array=array();
			$septiembre__array=array();
			$octubre__array=array();
			$noviembre__array=array();
			$diciembre__array=array();
			$total__array=array();		
			$idProgramacionFinanciera__array=array();

			$aux=0;	
			$contadorAux=0;

			for ($row = 2; $row <= $highestRow; $row++){ 

				if (is_null($sheet->getCell("A".$row)->getValue()) || is_null($sheet->getCell("B".$row)->getValue()) || is_null($sheet->getCell("C".$row)->getValue()) || is_null($sheet->getCell("D".$row)->getValue()) || is_null($sheet->getCell("E".$row)->getValue()) || is_null($sheet->getCell("F".$row)->getValue()) || is_null($sheet->getCell("G".$row)->getValue()) || is_null($sheet->getCell("H".$row)->getValue()) || is_null($sheet->getCell("I".$row)->getValue()) || is_null($sheet->getCell("J".$row)->getValue()) || is_null($sheet->getCell("K".$row)->getValue()) || is_null($sheet->getCell("L".$row)->getValue()) || is_null($sheet->getCell("M".$row)->getValue()) || is_null($sheet->getCell("N".$row)->getValue()) || is_null($sheet->getCell("O".$row)->getValue()) || is_null($sheet->getCell("P".$row)->getValue())) {

					if (is_null($sheet->getCell("A".$row)->getValue())) {
						array_push($array__camposVacios,"Columna A Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("B".$row)->getValue())) {
						array_push($array__camposVacios,"Columna B Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("C".$row)->getValue())) {
						array_push($array__camposVacios,"Columna C Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("D".$row)->getValue())) {
						array_push($array__camposVacios,"Columna D Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("E".$row)->getValue())) {
						array_push($array__camposVacios,"Columna E Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("F".$row)->getValue())) {
						array_push($array__camposVacios,"Columna F Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("G".$row)->getValue())) {
						array_push($array__camposVacios,"Columna G Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("H".$row)->getValue())) {
						array_push($array__camposVacios,"Columna H Fila ".$row." está vacía");
					}										


					if (is_null($sheet->getCell("I".$row)->getValue())) {
						array_push($array__camposVacios,"Columna I Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("J".$row)->getValue())) {
						array_push($array__camposVacios,"Columna J Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("K".$row)->getValue())) {
						array_push($array__camposVacios,"Columna K Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("L".$row)->getValue())) {
						array_push($array__camposVacios,"Columna L Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("M".$row)->getValue())) {
						array_push($array__camposVacios,"Columna M Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("N".$row)->getValue())) {
						array_push($array__camposVacios,"Columna N Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("O".$row)->getValue())) {
						array_push($array__camposVacios,"Columna O Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("P".$row)->getValue())) {
						array_push($array__camposVacios,"Columna P Fila ".$row." está vacía");
					}


				}else{

					$comparadorItem__financiero=itemEvaluador(trim($sheet->getCell("A".$row)->getValue()),$idActividad,$idOrganismo,$periodo_Traido);

					
					$itemRepetido=evaluacionMatrices($accionesMatriz,$aux,$sheet->getCell("A".$row)->getValue(),$comparadorItem__financiero);


					$aux=$sheet->getCell("A".$row)->getValue();

					if ($itemRepetido==true) {
						array_push($array__errorItemRepetido,"El ítem presupuestario columna A Fila ".$row ." ya se encuentra registrado en la actividad ".$idActividad);
					}

					if (empty($comparadorItem__financiero)) {
						array_push($array__errorItem,"El ítem presupuestario columna A Fila ".$row ." no está registrado en la actividad ".$idActividad);
					}

					$sumadorTotal=0;
					$sumadorTotal=floatval($sheet->getCell("D".$row)->getValue()) + floatval($sheet->getCell("E".$row)->getValue()) + floatval($sheet->getCell("F".$row)->getValue()) + floatval($sheet->getCell("G".$row)->getValue()) + floatval($sheet->getCell("H".$row)->getValue()) + floatval($sheet->getCell("I".$row)->getValue()) + floatval($sheet->getCell("J".$row)->getValue()) + floatval($sheet->getCell("K".$row)->getValue()) + floatval($sheet->getCell("L".$row)->getValue()) +  floatval($sheet->getCell("M".$row)->getValue()) + floatval($sheet->getCell("N".$row)->getValue()) + floatval($sheet->getCell("O".$row)->getValue());

					array_push($item__array, trim($sheet->getCell("A".$row)->getValue()));
					array_push($justificacion__array, trim($sheet->getCell("B".$row)->getValue()));
					array_push($cantidad__array, trim(floatval($sheet->getCell("C".$row)->getValue())));
					array_push($enero__array, trim(floatval($sheet->getCell("D".$row)->getValue())));
					array_push($febrero__array, floatval($sheet->getCell("E".$row)->getValue()));
					array_push($marzo__array, floatval($sheet->getCell("F".$row)->getValue()));
					array_push($abril__array, floatval($sheet->getCell("G".$row)->getValue()));
					array_push($mayo__array, floatval($sheet->getCell("H".$row)->getValue()));
					array_push($junio__array, floatval($sheet->getCell("I".$row)->getValue()));
					array_push($julio__array, floatval($sheet->getCell("J".$row)->getValue()));
					array_push($agosto__array, floatval($sheet->getCell("K".$row)->getValue()));
					array_push($septiembre__array, floatval($sheet->getCell("L".$row)->getValue()));
					array_push($octubre__array, floatval($sheet->getCell("M".$row)->getValue()));
					array_push($noviembre__array, floatval($sheet->getCell("N".$row)->getValue()));
					array_push($diciembre__array, floatval($sheet->getCell("O".$row)->getValue()));
					array_push($total__array, floatval($sumadorTotal));

				}

			}



			$jason['item__array']=$item__array;
			$jason['justificacion__array']=$justificacion__array;
			$jason['cantidad__array']=$cantidad__array;
			$jason['enero__array']=$enero__array;
			$jason['febrero__array']=$febrero__array;
			$jason['marzo__array']=$marzo__array;
			$jason['abril__array']=$abril__array;
			$jason['mayo__array']=$mayo__array;
			$jason['junio__array']=$junio__array;
			$jason['julio__array']=$julio__array;
			$jason['agosto__array']=$agosto__array;
			$jason['septiembre__array']=$septiembre__array;
			$jason['octubre__array']=$octubre__array;
			$jason['noviembre__array']=$noviembre__array;
			$jason['diciembre__array']=$diciembre__array;
			$jason['total__array']=$total__array;
			
			

		break;

		case "suminis__administrativas":

			$tipo__array=array();
			$nombre__array=array();
			$luz__array=array();
			$agua__array=array();

			

			for ($row = 2; $row <= $highestRow; $row++){ 

				if (is_null($sheet->getCell("A".$row)->getValue()) || is_null($sheet->getCell("B".$row)->getValue()) || is_null($sheet->getCell("C".$row)->getValue()) || is_null($sheet->getCell("D".$row)->getValue())) {


					if (is_null($sheet->getCell("A".$row)->getValue())) {
						array_push($array__camposVacios,"Columna A Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("B".$row)->getValue())) {
						array_push($array__camposVacios,"Columna B Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("C".$row)->getValue())) {
						array_push($array__camposVacios,"Columna C Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("D".$row)->getValue())) {
						array_push($array__camposVacios,"Columna D Fila ".$row." está vacía");
					}


				}else{

					$comparador__tipoSuministros=comparador__caracteres($sheet->getCell("A".$row)->getValue(),["escenario"=>"Escenario deportivo/residencia para fomento deportivo","adminis"=>"Administrativo"]);

					if ($comparador__tipoSuministros=="no") {
						array_push($array__errorCampoNoCorresponde,"Columna A Fila ".$row ." no posee el tipo de escenario deportivo: Escenario deportivo/residencia para fomento deportivo o Administrativo");
					}

					array_push($tipo__array, trim($comparador__tipoSuministros));
					array_push($nombre__array, trim($sheet->getCell("B".$row)->getValue()));
					array_push($luz__array, trim($sheet->getCell("C".$row)->getValue()));
					array_push($agua__array, trim($sheet->getCell("D".$row)->getValue()));

				}


			}

			$jason['tipo__array']=$tipo__array;
			$jason['nombre__array']=$nombre__array;
			$jason['luz__array']=$luz__array;
			$jason['agua__array']=$agua__array;
			
			

		break;

		case "mantenimiento":

			$idActividad__array=array();
			$Item__array=array();
			$nombreItem__array=array();
			$nombreInfra__array=array();
			$provincia__array=array();
			$provincia__codigo__array=array();
			$direccion__array=array();
			$estado__array=array();
			$tipoRecursos__array=array();
			$tipoIntervencion__array=array();
			$detallarTipo__intervencion__array=array();
			$tipoMantenimiento__array=array();
			$materiales__servicios__array=array();
			$ultimoFecha__servicios__array=array();
			$enero__array=array();
			$febrero__array=array();
			$marzo__array=array();
			$abril__array=array();
			$mayo__array=array();
			$junio__array=array();
			$julio__array=array();
			$agosto__array=array();
			$septiembre__array=array();
			$octubre__array=array();
			$noviembre__array=array();
			$diciembre__array=array();
			$total__array=array();	

			$id__provincia__array=array();		
			

			for ($row = 2; $row <= $highestRow; $row++){ 

				if (is_null($sheet->getCell("A".$row)->getValue()) || is_null($sheet->getCell("B".$row)->getValue()) || is_null($sheet->getCell("C".$row)->getValue()) || is_null($sheet->getCell("D".$row)->getValue()) || is_null($sheet->getCell("E".$row)->getValue()) || is_null($sheet->getCell("F".$row)->getValue()) || is_null($sheet->getCell("G".$row)->getValue()) || is_null($sheet->getCell("H".$row)->getValue()) || is_null($sheet->getCell("I".$row)->getValue()) || is_null($sheet->getCell("J".$row)->getValue()) || is_null($sheet->getCell("K".$row)->getValue()) || is_null($sheet->getCell("L".$row)->getValue()) || is_null($sheet->getCell("M".$row)->getValue()) || is_null($sheet->getCell("N".$row)->getValue()) || is_null($sheet->getCell("O".$row)->getValue()) || is_null($sheet->getCell("P".$row)->getValue())) {

					if (is_null($sheet->getCell("A".$row)->getValue())) {
						array_push($array__camposVacios,"Columna A Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("B".$row)->getValue())) {
						array_push($array__camposVacios,"Columna B Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("C".$row)->getValue())) {
						array_push($array__camposVacios,"Columna C Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("D".$row)->getValue())) {
						array_push($array__camposVacios,"Columna D Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("E".$row)->getValue())) {
						array_push($array__camposVacios,"Columna E Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("F".$row)->getValue())) {
						array_push($array__camposVacios,"Columna F Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("G".$row)->getValue())) {
						array_push($array__camposVacios,"Columna G Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("H".$row)->getValue())) {
						array_push($array__camposVacios,"Columna H Fila ".$row." está vacía");
					}										


					if (is_null($sheet->getCell("I".$row)->getValue())) {
						array_push($array__camposVacios,"Columna I Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("J".$row)->getValue())) {
						array_push($array__camposVacios,"Columna J Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("K".$row)->getValue())) {
						array_push($array__camposVacios,"Columna K Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("L".$row)->getValue())) {
						array_push($array__camposVacios,"Columna L Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("M".$row)->getValue())) {
						array_push($array__camposVacios,"Columna M Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("N".$row)->getValue())) {
						array_push($array__camposVacios,"Columna N Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("O".$row)->getValue())) {
						array_push($array__camposVacios,"Columna O Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("P".$row)->getValue())) {
						array_push($array__camposVacios,"Columna P Fila ".$row." está vacía");
					}


				}else{

					$comparadorItem__financiero=itemEvaluador(trim($sheet->getCell("A".$row)->getValue()),$idActividad,$idOrganismo,$periodo_Traido);

					if (empty($comparadorItem__financiero)) {
						array_push($array__errorItem,"El ítem presupuestario columna A Fila ".$row ." no está registrado en la actividad ".$idActividad);
					}		

					$provinciaEvaluador=consulta__selectComparador("in_md_provincias","nombreProvincia","idProvincia",trim($sheet->getCell("C".$row)->getValue()));

					if (is_null($provinciaEvaluador[0])) {
						array_push($array__errorCampoNoCorresponde,"Columna C Fila ".$row ." no posee una provincia correcta");
					}
			

					$sumadorTotal=0;
					$sumadorTotal=floatval($sheet->getCell("L".$row)->getValue()) + floatval($sheet->getCell("M".$row)->getValue()) + floatval($sheet->getCell("N".$row)->getValue()) + floatval($sheet->getCell("O".$row)->getValue()) + floatval($sheet->getCell("P".$row)->getValue()) + floatval($sheet->getCell("Q".$row)->getValue()) + floatval($sheet->getCell("R".$row)->getValue()) + floatval($sheet->getCell("S".$row)->getValue()) + floatval($sheet->getCell("T".$row)->getValue()) +  floatval($sheet->getCell("U".$row)->getValue()) + floatval($sheet->getCell("V".$row)->getValue()) + floatval($sheet->getCell("W".$row)->getValue());

					array_push($Item__array, trim($sheet->getCell("A".$row)->getValue()));
					array_push($nombreInfra__array, trim($sheet->getCell("B".$row)->getValue()));

					array_push($provincia__array, $provinciaEvaluador[1]);
					array_push($id__provincia__array, $provinciaEvaluador[0]);

					array_push($direccion__array, trim($sheet->getCell("D".$row)->getValue()));
					array_push($estado__array, trim($sheet->getCell("E".$row)->getValue()));
					array_push($tipoRecursos__array, trim($sheet->getCell("F".$row)->getValue()));
					array_push($tipoIntervencion__array, trim($sheet->getCell("G".$row)->getValue()));
					array_push($detallarTipo__intervencion__array, trim($sheet->getCell("H".$row)->getValue()));
					array_push($tipoMantenimiento__array, trim($sheet->getCell("I".$row)->getValue()));
					array_push($materiales__servicios__array, trim($sheet->getCell("J".$row)->getValue()));
					array_push($ultimoFecha__servicios__array, trim($sheet->getCell("K".$row)->getValue()));
					array_push($enero__array, floatval($sheet->getCell("L".$row)->getValue()));
					array_push($febrero__array, floatval($sheet->getCell("M".$row)->getValue()));
					array_push($marzo__array, floatval($sheet->getCell("N".$row)->getValue()));
					array_push($abril__array, floatval($sheet->getCell("O".$row)->getValue()));
					array_push($mayo__array, floatval($sheet->getCell("P".$row)->getValue()));
					array_push($junio__array, floatval($sheet->getCell("Q".$row)->getValue()));
					array_push($julio__array, floatval($sheet->getCell("R".$row)->getValue()));
					array_push($agosto__array, floatval($sheet->getCell("S".$row)->getValue()));
					array_push($septiembre__array, floatval($sheet->getCell("T".$row)->getValue()));
					array_push($octubre__array, floatval($sheet->getCell("U".$row)->getValue()));
					array_push($noviembre__array, floatval($sheet->getCell("V".$row)->getValue()));
					array_push($diciembre__array, floatval($sheet->getCell("W".$row)->getValue()));
					array_push($total__array, floatval($sumadorTotal));

				}
				

			}


			$jason['Item__array']=$Item__array;
			$jason['nombreItem__array']=$nombreItem__array;
			$jason['nombreInfra__array']=$nombreInfra__array;
			$jason['provincia__array']=$provincia__array;
			$jason['direccion__array']=$direccion__array;
			$jason['estado__array']=$estado__array;
			$jason['tipoRecursos__array']=$tipoRecursos__array;
			$jason['tipoIntervencion__array']=$tipoIntervencion__array;
			$jason['detallarTipo__intervencion__array']=$detallarTipo__intervencion__array;
			$jason['tipoMantenimiento__array']=$tipoMantenimiento__array;
			$jason['materiales__servicios__array']=$materiales__servicios__array;
			$jason['ultimoFecha__servicios__array']=$ultimoFecha__servicios__array;
			$jason['enero__array']=$enero__array;
			$jason['febrero__array']=$febrero__array;
			$jason['marzo__array']=$marzo__array;
			$jason['abril__array']=$abril__array;
			$jason['mayo__array']=$mayo__array;
			$jason['junio__array']=$junio__array;
			$jason['julio__array']=$julio__array;
			$jason['agosto__array']=$agosto__array;
			$jason['septiembre__array']=$septiembre__array;
			$jason['octubre__array']=$octubre__array;
			$jason['noviembre__array']=$noviembre__array;
			$jason['diciembre__array']=$diciembre__array;
			$jason['total__array']=$total__array;
			
			$jason['id__provincia__array']=$id__provincia__array;

		break;


		case "act__deportivas":

			$Item__array=array();
			$evento__array=array();
			$tipoFinanciamiento__array=array();
			$deporte__array=array();
			$provincia__array=array();
			$pais__array=array();
			$alcanse__array=array();
			$fechaInicio__array=array();
			$fechaFin__array=array();
			$genero__array=array();
			$categoria__array=array();
			$numeroEntrenadores__array=array();
			$numeroAtletas__array=array();
			$totalEntrenadoresAtletas__array=array();
			$mujeresB__array=array();
			$hombresB__array=array();
			$cantidad__array=array();
			$detalle__array=array();
			$justificacion__array=array();
			$enero__array=array();
			$febrero__array=array();
			$marzo__array=array();
			$abril__array=array();
			$mayo__array=array();
			$junio__array=array();
			$julio__array=array();
			$agosto__array=array();
			$septiembre__array=array();
			$octubre__array=array();
			$noviembre__array=array();
			$diciembre__array=array();
			$total__array=array();		

			$id__deporte__array=array();	
			$id__provincia__array=array();
			$id__pais__array=array();
			$id__alcanse__array=array();

			for ($row = 2; $row <= $highestRow; $row++){ 

				if (is_null($sheet->getCell("A".$row)->getValue()) || is_null($sheet->getCell("B".$row)->getValue()) || is_null($sheet->getCell("C".$row)->getValue()) || is_null($sheet->getCell("D".$row)->getValue()) || is_null($sheet->getCell("E".$row)->getValue()) || is_null($sheet->getCell("F".$row)->getValue()) || is_null($sheet->getCell("G".$row)->getValue()) || is_null($sheet->getCell("H".$row)->getValue()) || is_null($sheet->getCell("I".$row)->getValue()) || is_null($sheet->getCell("J".$row)->getValue()) || is_null($sheet->getCell("K".$row)->getValue()) || is_null($sheet->getCell("L".$row)->getValue()) || is_null($sheet->getCell("M".$row)->getValue()) || is_null($sheet->getCell("N".$row)->getValue()) || is_null($sheet->getCell("O".$row)->getValue()) || is_null($sheet->getCell("P".$row)->getValue()) || is_null($sheet->getCell("Q".$row)->getValue()) || is_null($sheet->getCell("R".$row)->getValue()) || is_null($sheet->getCell("S".$row)->getValue()) || is_null($sheet->getCell("T".$row)->getValue()) || is_null($sheet->getCell("U".$row)->getValue()) || is_null($sheet->getCell("V".$row)->getValue()) || is_null($sheet->getCell("W".$row)->getValue()) || is_null($sheet->getCell("X".$row)->getValue()) || is_null($sheet->getCell("Y".$row)->getValue()) || is_null($sheet->getCell("Z".$row)->getValue()) || is_null($sheet->getCell("AA".$row)->getValue()) || is_null($sheet->getCell("AB".$row)->getValue()) || is_null($sheet->getCell("AC".$row)->getValue()) || is_null($sheet->getCell("AD".$row)->getValue()) || is_null($sheet->getCell("AE".$row)->getValue()) || is_null($sheet->getCell("AF".$row)->getValue())) {

					if (is_null($sheet->getCell("A".$row)->getValue())) {
						array_push($array__camposVacios,"Columna A Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("B".$row)->getValue())) {
						array_push($array__camposVacios,"Columna B Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("C".$row)->getValue())) {
						array_push($array__camposVacios,"Columna C Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("D".$row)->getValue())) {
						array_push($array__camposVacios,"Columna D Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("E".$row)->getValue())) {
						array_push($array__camposVacios,"Columna E Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("F".$row)->getValue())) {
						array_push($array__camposVacios,"Columna F Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("G".$row)->getValue())) {
						array_push($array__camposVacios,"Columna G Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("H".$row)->getValue())) {
						array_push($array__camposVacios,"Columna H Fila ".$row." está vacía");
					}										


					if (is_null($sheet->getCell("I".$row)->getValue())) {
						array_push($array__camposVacios,"Columna I Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("J".$row)->getValue())) {
						array_push($array__camposVacios,"Columna J Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("K".$row)->getValue())) {
						array_push($array__camposVacios,"Columna K Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("L".$row)->getValue())) {
						array_push($array__camposVacios,"Columna L Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("M".$row)->getValue())) {
						array_push($array__camposVacios,"Columna M Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("N".$row)->getValue())) {
						array_push($array__camposVacios,"Columna N Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("O".$row)->getValue())) {
						array_push($array__camposVacios,"Columna O Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("P".$row)->getValue())) {
						array_push($array__camposVacios,"Columna P Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("Q".$row)->getValue())) {
						array_push($array__camposVacios,"Columna Q Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("R".$row)->getValue())) {
						array_push($array__camposVacios,"Columna R Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("S".$row)->getValue())) {
						array_push($array__camposVacios,"Columna S Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("T".$row)->getValue())) {
						array_push($array__camposVacios,"Columna T Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("U".$row)->getValue())) {
						array_push($array__camposVacios,"Columna U Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("V".$row)->getValue())) {
						array_push($array__camposVacios,"Columna V Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("W".$row)->getValue())) {
						array_push($array__camposVacios,"Columna W Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("X".$row)->getValue())) {
						array_push($array__camposVacios,"Columna X Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("Y".$row)->getValue())) {
						array_push($array__camposVacios,"Columna Y Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("Z".$row)->getValue())) {
						array_push($array__camposVacios,"Columna Z Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("AA".$row)->getValue())) {
						array_push($array__camposVacios,"Columna AA Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("AB".$row)->getValue())) {
						array_push($array__camposVacios,"Columna AB Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("AC".$row)->getValue())) {
						array_push($array__camposVacios,"Columna AC Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("AD".$row)->getValue())) {
						array_push($array__camposVacios,"Columna AD Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("AE".$row)->getValue())) {
						array_push($array__camposVacios,"Columna AE Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("AF".$row)->getValue())) {
						array_push($array__camposVacios,"Columna AF Fila ".$row." está vacía");
					}


				}else{

					$comparadorItem__financiero=itemEvaluador(trim($sheet->getCell("A".$row)->getValue()),$idActividad,$idOrganismo,$periodo_Traido);

					if (empty($comparadorItem__financiero)) {
						array_push($array__errorItem,"El ítem presupuestario columna A Fila ".$row ." no está registrado en la actividad ".$idActividad);
					}	

					$comparador__tipoFinanciamiento=comparador__caracteres($sheet->getCell("C".$row)->getValue(),["corrie"=>"corriente","auto"=>"autogestion"]);

					if ($comparador__tipoFinanciamiento=="no") {
						array_push($array__errorCampoNoCorresponde,"Columna C Fila ".$row ." no posee el tipo de financiamiento el cual debe ser Corriente o Autogestión");
					}				


					$deporteEvaluador=consulta__selectComparador("poa_deporte","nombreDeporte","idDeporte",trim($sheet->getCell("D".$row)->getValue()));

					if (is_null($deporteEvaluador[0])) {
						array_push($array__errorCampoNoCorresponde,"Columna D Fila ".$row ." no posee el tipo de deporte permitido");
					}

					$provinciaEvaluador=consulta__selectComparador("in_md_provincias","nombreProvincia","idProvincia",trim($sheet->getCell("E".$row)->getValue()));

					if (is_null($provinciaEvaluador[0])) {
						array_push($array__errorCampoNoCorresponde,"Columna E Fila ".$row ." no posee una provincia correcta");
					}

					$paisEvaluador=consulta__selectComparador("poa_pais","paisnombre","id",trim($sheet->getCell("F".$row)->getValue()));

					if (is_null($paisEvaluador[0])) {
						array_push($array__errorCampoNoCorresponde,"Columna F Fila ".$row ." no posee un nombre de país correcto");
					}



					$alcanseEvaluador=consulta__selectComparador("poa_alcanse","nombreAlcanse","idAlcanse",trim($sheet->getCell("G".$row)->getValue()));

					if (is_null($alcanseEvaluador[0])) {
						array_push($array__errorCampoNoCorresponde,"Columna G Fila ".$row ." no posee un alcance correcto los cuales pueden ser: INT, PRO, CAN, PAR, BAR/PAR, BAR, NAC, PROV, NAC");
					}

					$comparador__tipoGenero=comparador__caracteres($sheet->getCell("J".$row)->getValue(),["mascu"=>"Masculino","feme"=>"Femenino","ambas"=>"ambas"]);

					if ($comparador__tipoGenero=="no") {
						array_push($array__errorCampoNoCorresponde,"Columna J Fila ".$row ." no posee el género correcto que son: Masculino, Femenino o ambas");
					}		


					$sumadorTotal=0;
					$sumadorTotal=floatval($sheet->getCell("T".$row)->getValue()) + floatval($sheet->getCell("U".$row)->getValue()) + floatval($sheet->getCell("V".$row)->getValue()) + floatval($sheet->getCell("W".$row)->getValue()) + floatval($sheet->getCell("X".$row)->getValue()) + floatval($sheet->getCell("Y".$row)->getValue()) + floatval($sheet->getCell("Z".$row)->getValue()) + floatval($sheet->getCell("AA".$row)->getValue()) + floatval($sheet->getCell("AB".$row)->getValue()) +  floatval($sheet->getCell("AC".$row)->getValue()) + floatval($sheet->getCell("AD".$row)->getValue()) + floatval($sheet->getCell("AE".$row)->getValue());

					array_push($Item__array, trim($sheet->getCell("A".$row)->getValue()));
					array_push($evento__array, trim($sheet->getCell("B".$row)->getValue()));
					array_push($tipoFinanciamiento__array, trim($sheet->getCell("C".$row)->getValue()));
					array_push($id__deporte__array, $deporteEvaluador[0]);
					array_push($deporte__array, $deporteEvaluador[1]);
					array_push($provincia__array, $provinciaEvaluador[1]);
					array_push($id__provincia__array, $provinciaEvaluador[0]);
					array_push($pais__array, $paisEvaluador[1]);
					array_push($id__pais__array, $paisEvaluador[0]);
					array_push($alcanse__array, $alcanseEvaluador[1]);
					array_push($id__alcanse__array, $alcanseEvaluador[0]);
					array_push($fechaInicio__array, trim($sheet->getCell("H".$row)->getValue()));
					array_push($fechaFin__array, trim($sheet->getCell("I".$row)->getValue()));
					array_push($genero__array, $comparador__tipoGenero);
					array_push($categoria__array, trim($sheet->getCell("K".$row)->getValue()));
					array_push($numeroEntrenadores__array, trim($sheet->getCell("L".$row)->getValue()));
					array_push($numeroAtletas__array, trim($sheet->getCell("M".$row)->getValue()));
					array_push($totalEntrenadoresAtletas__array, trim($sheet->getCell("N".$row)->getValue()));
					array_push($mujeresB__array, trim($sheet->getCell("O".$row)->getValue()));
					array_push($hombresB__array, trim($sheet->getCell("P".$row)->getValue()));
					array_push($cantidad__array, trim($sheet->getCell("Q".$row)->getValue()));
					array_push($detalle__array, trim($sheet->getCell("R".$row)->getValue()));
					array_push($justificacion__array, trim($sheet->getCell("S".$row)->getValue()));
					array_push($enero__array, floatval($sheet->getCell("T".$row)->getValue()));
					array_push($febrero__array, floatval($sheet->getCell("U".$row)->getValue()));
					array_push($marzo__array, floatval($sheet->getCell("V".$row)->getValue()));
					array_push($abril__array, floatval($sheet->getCell("W".$row)->getValue()));
					array_push($mayo__array, floatval($sheet->getCell("X".$row)->getValue()));
					array_push($junio__array, floatval($sheet->getCell("Y".$row)->getValue()));
					array_push($julio__array, floatval($sheet->getCell("Z".$row)->getValue()));
					array_push($agosto__array, floatval($sheet->getCell("AA".$row)->getValue()));
					array_push($septiembre__array, floatval($sheet->getCell("AB".$row)->getValue()));
					array_push($octubre__array, floatval($sheet->getCell("AC".$row)->getValue()));
					array_push($noviembre__array, floatval($sheet->getCell("AD".$row)->getValue()));
					array_push($diciembre__array, floatval($sheet->getCell("AE".$row)->getValue()));
					array_push($total__array, floatval($sumadorTotal));

				}
				

			}


			$jason['Item__array']=$Item__array;
			$jason['evento__array']=$evento__array;
			$jason['tipoFinanciamiento__array']=$tipoFinanciamiento__array;
			$jason['deporte__array']=$deporte__array;
			$jason['provincia__array']=$provincia__array;
			$jason['pais__array']=$pais__array;
			$jason['alcanse__array']=$alcanse__array;
			$jason['fechaInicio__array']=$fechaInicio__array;
			$jason['fechaFin__array']=$fechaFin__array;
			$jason['genero__array']=$genero__array;
			$jason['categoria__array']=$categoria__array;
			$jason['numeroEntrenadores__array']=$numeroEntrenadores__array;
			$jason['numeroAtletas__array']=$numeroAtletas__array;
			$jason['totalEntrenadoresAtletas__array']=$totalEntrenadoresAtletas__array;
			$jason['mujeresB__array']=$mujeresB__array;
			$jason['hombresB__array']=$hombresB__array;
			$jason['cantidad__array']=$cantidad__array;
			$jason['detalle__array']=$detalle__array;
			$jason['justificacion__array']=$justificacion__array;
			$jason['enero__array']=$enero__array;
			$jason['febrero__array']=$febrero__array;
			$jason['marzo__array']=$marzo__array;
			$jason['abril__array']=$abril__array;
			$jason['mayo__array']=$mayo__array;
			$jason['junio__array']=$junio__array;
			$jason['julio__array']=$julio__array;
			$jason['agosto__array']=$agosto__array;
			$jason['septiembre__array']=$septiembre__array;
			$jason['octubre__array']=$octubre__array;
			$jason['noviembre__array']=$noviembre__array;
			$jason['diciembre__array']=$diciembre__array;
			$jason['total__array']=$total__array;

			$jason['id__deporte__array']=$id__deporte__array;
			$jason['id__provincia__array']=$id__provincia__array;
			$jason['id__pais__array']=$id__pais__array;
			$jason['id__alcanse__array']=$id__alcanse__array;
			

		break;


		case "sueldos__salarios":

			$cedula__array=array();
			$apellidos__array=array();
			$cargo__array=array();
			$tipoCargo__array=array();
			$tiempoTrabajo__array=array();
			$sueldos__array=array();
			$aporte__array=array();
			$decimoTercero__array=array();
			$mensualizaDecimoTercero__array=array();
			$decimoCuarto__array=array();
			$mensualizaDecimoCuarta__array=array();
			$fondosDeReserva__array=array();
			$enero__array=array();
			$febrero__array=array();
			$marzo__array=array();
			$abril__array=array();
			$mayo__array=array();
			$junio__array=array();
			$julio__array=array();
			$agosto__array=array();
			$septiembre__array=array();
			$octubre__array=array();
			$noviembre__array=array();
			$diciembre__array=array();
			$total__array=array();		
			

			for ($row = 2; $row <= $highestRow; $row++){ 

				if (is_null($sheet->getCell("A".$row)->getValue()) || is_null($sheet->getCell("B".$row)->getValue()) || is_null($sheet->getCell("C".$row)->getValue()) || is_null($sheet->getCell("D".$row)->getValue()) || is_null($sheet->getCell("E".$row)->getValue()) || is_null($sheet->getCell("F".$row)->getValue()) || is_null($sheet->getCell("G".$row)->getValue()) || is_null($sheet->getCell("H".$row)->getValue()) || is_null($sheet->getCell("I".$row)->getValue()) || is_null($sheet->getCell("J".$row)->getValue()) || is_null($sheet->getCell("K".$row)->getValue()) || is_null($sheet->getCell("L".$row)->getValue()) || is_null($sheet->getCell("M".$row)->getValue()) || is_null($sheet->getCell("N".$row)->getValue()) || is_null($sheet->getCell("O".$row)->getValue()) || is_null($sheet->getCell("P".$row)->getValue()) || is_null($sheet->getCell("Q".$row)->getValue()) || is_null($sheet->getCell("R".$row)->getValue()) || is_null($sheet->getCell("S".$row)->getValue()) || is_null($sheet->getCell("T".$row)->getValue()) || is_null($sheet->getCell("U".$row)->getValue()) || is_null($sheet->getCell("V".$row)->getValue()) || is_null($sheet->getCell("W".$row)->getValue()) || is_null($sheet->getCell("X".$row)->getValue()) || is_null($sheet->getCell("Y".$row)->getValue())) {

					if (is_null($sheet->getCell("A".$row)->getValue())) {
						array_push($array__camposVacios,"Columna A Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("B".$row)->getValue())) {
						array_push($array__camposVacios,"Columna B Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("C".$row)->getValue())) {
						array_push($array__camposVacios,"Columna C Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("D".$row)->getValue())) {
						array_push($array__camposVacios,"Columna D Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("E".$row)->getValue())) {
						array_push($array__camposVacios,"Columna E Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("F".$row)->getValue())) {
						array_push($array__camposVacios,"Columna F Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("G".$row)->getValue())) {
						array_push($array__camposVacios,"Columna G Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("H".$row)->getValue())) {
						array_push($array__camposVacios,"Columna H Fila ".$row." está vacía");
					}										


					if (is_null($sheet->getCell("I".$row)->getValue())) {
						array_push($array__camposVacios,"Columna I Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("J".$row)->getValue())) {
						array_push($array__camposVacios,"Columna J Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("K".$row)->getValue())) {
						array_push($array__camposVacios,"Columna K Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("L".$row)->getValue())) {
						array_push($array__camposVacios,"Columna L Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("M".$row)->getValue())) {
						array_push($array__camposVacios,"Columna M Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("N".$row)->getValue())) {
						array_push($array__camposVacios,"Columna N Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("O".$row)->getValue())) {
						array_push($array__camposVacios,"Columna O Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("P".$row)->getValue())) {
						array_push($array__camposVacios,"Columna P Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("Q".$row)->getValue())) {
						array_push($array__camposVacios,"Columna Q Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("R".$row)->getValue())) {
						array_push($array__camposVacios,"Columna R Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("S".$row)->getValue())) {
						array_push($array__camposVacios,"Columna S Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("T".$row)->getValue())) {
						array_push($array__camposVacios,"Columna T Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("U".$row)->getValue())) {
						array_push($array__camposVacios,"Columna U Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("V".$row)->getValue())) {
						array_push($array__camposVacios,"Columna V Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("W".$row)->getValue())) {
						array_push($array__camposVacios,"Columna W Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("X".$row)->getValue())) {
						array_push($array__camposVacios,"Columna X Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("Y".$row)->getValue())) {
						array_push($array__camposVacios,"Columna Y Fila ".$row." está vacía");
					}



				}else{


					$sumadorTotal=0;
					$sumadorTotal=floatval($sheet->getCell("M".$row)->getValue()) + floatval($sheet->getCell("N".$row)->getValue()) + floatval($sheet->getCell("O".$row)->getValue()) + floatval($sheet->getCell("P".$row)->getValue()) + floatval($sheet->getCell("Q".$row)->getValue()) + floatval($sheet->getCell("R".$row)->getValue()) + floatval($sheet->getCell("S".$row)->getValue()) + floatval($sheet->getCell("T".$row)->getValue()) + floatval($sheet->getCell("U".$row)->getValue()) + floatval($sheet->getCell("V".$row)->getValue()) + floatval($sheet->getCell("W".$row)->getValue()) + floatval($sheet->getCell("X".$row)->getValue());

					$comparador__tipoSueldosSalarios=comparador__caracteres($sheet->getCell("D".$row)->getValue(),["cnico"=>"Técnico","minis"=>"Administrativo","cenarios"=>"Mantenimiento de Escenarios deportivos","nimiento"=>"Mantenimiento"]);

					if ($comparador__tipoSueldosSalarios=="no") {
						array_push($array__errorCampoNoCorresponde,"Columna D Fila ".$row ." no posee el tipo de escenario deportivo: Técnico, Administrativo, Mantenimiento de Escenarios deportivos o Mantenimiento");
					}

					$comparador__personalSueldosSalarios=comparador__suedlosHonorarios($sheet->getCell("A".$row)->getValue(),"poa_sueldossalarios2022",$periodo_Traido);

					if ($comparador__personalSueldosSalarios==0) {
						array_push($array__errorCampoNoCorresponde,"Columna A Fila ".$row ." la cédula ".$sheet->getCell("A".$row)->getValue()." ya se encuentra registrada");
					}

					$fondoConsulta=consulta__item__necesario($idOrganismo,$idActividad,"65",$periodo_Traido);


					if ($fondoConsulta=="si") {
						array_push($array__errorCampoNoCorresponde,"Necesita ingresar el ítem Fondos de Reserva");
					}

					$salarioConsulta=consulta__item__necesario($idOrganismo,$idActividad,"97",$periodo_Traido);

					if ($salarioConsulta=="si") {
						array_push($array__errorCampoNoCorresponde,"Necesita ingresar el ítem Salarios Unificados");
					}

					$aporteConsulta=consulta__item__necesario($idOrganismo,$idActividad,"38",$periodo_Traido);

					if ($aporteConsulta=="si") {
						array_push($array__errorCampoNoCorresponde,"Necesita ingresar el ítem Aporte Patronal");
					}


					$decimoTercerConsulta=consulta__item__necesario($idOrganismo,$idActividad,"53",$periodo_Traido);

					if ($decimoTercerConsulta=="si") {
						array_push($array__errorCampoNoCorresponde,"Necesita ingresar el ítem Decimotercer Sueldo");
					}

					$decimoCuartoConsulta=consulta__item__necesario($idOrganismo,$idActividad,"52",$periodo_Traido);

					if ($decimoCuartoConsulta=="si") {
						array_push($array__errorCampoNoCorresponde,"Necesita ingresar el ítem Decimocuarto Sueldo");
					}

					array_push($cedula__array, trim($sheet->getCell("A".$row)->getValue()));
					array_push($apellidos__array, trim($sheet->getCell("B".$row)->getValue()));
					array_push($cargo__array, trim($sheet->getCell("C".$row)->getValue()));
					array_push($tipoCargo__array, trim($comparador__tipoSueldosSalarios));
					array_push($tiempoTrabajo__array, trim($sheet->getCell("E".$row)->getValue()));
					array_push($sueldos__array, trim($sheet->getCell("F".$row)->getValue()));
					array_push($aporte__array, trim($sheet->getCell("G".$row)->getValue()));
					array_push($decimoTercero__array, trim($sheet->getCell("H".$row)->getValue()));
					array_push($mensualizaDecimoTercero__array, trim($sheet->getCell("I".$row)->getValue()));
					array_push($decimoCuarto__array, trim($sheet->getCell("J".$row)->getValue()));
					array_push($mensualizaDecimoCuarta__array, trim($sheet->getCell("K".$row)->getValue()));
					array_push($fondosDeReserva__array, trim($sheet->getCell("L".$row)->getValue()));
					array_push($enero__array, floatval($sheet->getCell("M".$row)->getValue()));
					array_push($febrero__array, floatval($sheet->getCell("N".$row)->getValue()));
					array_push($marzo__array, floatval($sheet->getCell("O".$row)->getValue()));
					array_push($abril__array, floatval($sheet->getCell("P".$row)->getValue()));
					array_push($mayo__array, floatval($sheet->getCell("Q".$row)->getValue()));
					array_push($junio__array, floatval($sheet->getCell("R".$row)->getValue()));
					array_push($julio__array, floatval($sheet->getCell("S".$row)->getValue()));
					array_push($agosto__array, floatval($sheet->getCell("T".$row)->getValue()));
					array_push($septiembre__array, floatval($sheet->getCell("U".$row)->getValue()));
					array_push($octubre__array, floatval($sheet->getCell("V".$row)->getValue()));
					array_push($noviembre__array, floatval($sheet->getCell("W".$row)->getValue()));
					array_push($diciembre__array, floatval($sheet->getCell("X".$row)->getValue()));
					array_push($total__array, floatval($sumadorTotal));


				}
				

			}


			$jason['cedula__array']=$cedula__array;
			$jason['apellidos__array']=$apellidos__array;
			$jason['cargo__array']=$cargo__array;
			$jason['tipoCargo__array']=$tipoCargo__array;
			$jason['tiempoTrabajo__array']=$tiempoTrabajo__array;
			$jason['sueldos__array']=$sueldos__array;
			$jason['aporte__array']=$aporte__array;
			$jason['decimoTercero__array']=$decimoTercero__array;
			$jason['mensualizaDecimoTercero__array']=$mensualizaDecimoTercero__array;
			$jason['decimoCuarto__array']=$decimoCuarto__array;
			$jason['mensualizaDecimoCuarta__array']=$mensualizaDecimoCuarta__array;
			$jason['fondosDeReserva__array']=$fondosDeReserva__array;
			$jason['enero__array']=$enero__array;
			$jason['febrero__array']=$febrero__array;
			$jason['marzo__array']=$marzo__array;
			$jason['abril__array']=$abril__array;
			$jason['mayo__array']=$mayo__array;
			$jason['junio__array']=$junio__array;
			$jason['julio__array']=$julio__array;
			$jason['agosto__array']=$agosto__array;
			$jason['septiembre__array']=$septiembre__array;
			$jason['octubre__array']=$octubre__array;
			$jason['noviembre__array']=$noviembre__array;
			$jason['diciembre__array']=$diciembre__array;
			$jason['total__array']=$total__array;
			
			

		break;

		case "honorarios":

			$cedula__array=array();
			$nombres__array=array();
			$cargo__array=array();
			$tipoCargo__array=array();
			$honorarioMensual__array=array();
			$enero__array=array();
			$febrero__array=array();
			$marzo__array=array();
			$abril__array=array();
			$mayo__array=array();
			$junio__array=array();
			$julio__array=array();
			$agosto__array=array();
			$septiembre__array=array();
			$octubre__array=array();
			$noviembre__array=array();
			$diciembre__array=array();
			$total__array=array();		
			$idProgramacionFinanciera__array=array();

			$aux=0;	
			$contadorAux=0;

			for ($row = 2; $row <= $highestRow; $row++){ 

				if (is_null($sheet->getCell("A".$row)->getValue()) || is_null($sheet->getCell("B".$row)->getValue()) || is_null($sheet->getCell("C".$row)->getValue()) || is_null($sheet->getCell("D".$row)->getValue()) || is_null($sheet->getCell("E".$row)->getValue()) || is_null($sheet->getCell("F".$row)->getValue()) || is_null($sheet->getCell("G".$row)->getValue()) || is_null($sheet->getCell("H".$row)->getValue()) || is_null($sheet->getCell("I".$row)->getValue()) || is_null($sheet->getCell("J".$row)->getValue()) || is_null($sheet->getCell("K".$row)->getValue()) || is_null($sheet->getCell("L".$row)->getValue()) || is_null($sheet->getCell("M".$row)->getValue()) || is_null($sheet->getCell("N".$row)->getValue()) || is_null($sheet->getCell("O".$row)->getValue()) || is_null($sheet->getCell("P".$row)->getValue()) || is_null($sheet->getCell("Q".$row)->getValue()) || is_null($sheet->getCell("R".$row)->getValue())) {

					if (is_null($sheet->getCell("A".$row)->getValue())) {
						array_push($array__camposVacios,"Columna A Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("B".$row)->getValue())) {
						array_push($array__camposVacios,"Columna B Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("C".$row)->getValue())) {
						array_push($array__camposVacios,"Columna C Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("D".$row)->getValue())) {
						array_push($array__camposVacios,"Columna D Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("E".$row)->getValue())) {
						array_push($array__camposVacios,"Columna E Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("F".$row)->getValue())) {
						array_push($array__camposVacios,"Columna F Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("G".$row)->getValue())) {
						array_push($array__camposVacios,"Columna G Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("H".$row)->getValue())) {
						array_push($array__camposVacios,"Columna H Fila ".$row." está vacía");
					}										


					if (is_null($sheet->getCell("I".$row)->getValue())) {
						array_push($array__camposVacios,"Columna I Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("J".$row)->getValue())) {
						array_push($array__camposVacios,"Columna J Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("K".$row)->getValue())) {
						array_push($array__camposVacios,"Columna K Fila ".$row." está vacía");
					}


					if (is_null($sheet->getCell("L".$row)->getValue())) {
						array_push($array__camposVacios,"Columna L Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("M".$row)->getValue())) {
						array_push($array__camposVacios,"Columna M Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("N".$row)->getValue())) {
						array_push($array__camposVacios,"Columna N Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("O".$row)->getValue())) {
						array_push($array__camposVacios,"Columna O Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("P".$row)->getValue())) {
						array_push($array__camposVacios,"Columna P Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("Q".$row)->getValue())) {
						array_push($array__camposVacios,"Columna Q Fila ".$row." está vacía");
					}

					if (is_null($sheet->getCell("R".$row)->getValue())) {
						array_push($array__camposVacios,"Columna R Fila ".$row." está vacía");
					}

				}else{



					$sumadorTotal=0;
					$sumadorTotal=floatval($sheet->getCell("F".$row)->getValue()) + floatval($sheet->getCell("G".$row)->getValue()) + floatval($sheet->getCell("H".$row)->getValue()) + floatval($sheet->getCell("I".$row)->getValue()) + floatval($sheet->getCell("J".$row)->getValue()) + floatval($sheet->getCell("K".$row)->getValue()) + floatval($sheet->getCell("L".$row)->getValue()) + floatval($sheet->getCell("M".$row)->getValue()) + floatval($sheet->getCell("N".$row)->getValue()) +  floatval($sheet->getCell("O".$row)->getValue()) + floatval($sheet->getCell("P".$row)->getValue()) + floatval($sheet->getCell("Q".$row)->getValue());

					$comparador__tipoHonorarios=comparador__caracteres($sheet->getCell("D".$row)->getValue(),["nico"=>"Técnico","minis"=>"Administrativo"]);

					if ($comparador__tipoHonorarios=="no") {
						array_push($array__errorCampoNoCorresponde,"Columna D Fila ".$row ." no posee el tipo de escenario deportivo: Técnico o Administrativo");
					}

					$comparador__personalHonorarios=comparador__suedlosHonorarios($sheet->getCell("A".$row)->getValue(),"poa_honorarios2022",$periodo_Traido);

					if ($comparador__personalHonorarios==0) {
						array_push($array__errorCampoNoCorresponde,"Columna A Fila ".$row ." la cédula ".$sheet->getCell("A".$row)->getValue()." ya se encuentra registrada");
					}

					$honorariosConsulta=consulta__item__necesario($idOrganismo,$idActividad,"71",$periodo_Traido);

					if ($honorariosConsulta=="si") {
						array_push($array__errorCampoNoCorresponde,"Honorarios por Contratos Civiles de Servicios");
					}

					array_push($cedula__array, trim($sheet->getCell("A".$row)->getValue()));
					array_push($nombres__array, trim($sheet->getCell("B".$row)->getValue()));
					array_push($cargo__array, trim($sheet->getCell("C".$row)->getValue()));
					array_push($tipoCargo__array, trim($comparador__tipoHonorarios));
					array_push($honorarioMensual__array, trim(floatval($sheet->getCell("E".$row)->getValue())));
					array_push($enero__array, trim(floatval($sheet->getCell("F".$row)->getValue())));
					array_push($febrero__array, floatval($sheet->getCell("G".$row)->getValue()));
					array_push($marzo__array, floatval($sheet->getCell("H".$row)->getValue()));
					array_push($abril__array, floatval($sheet->getCell("I".$row)->getValue()));
					array_push($mayo__array, floatval($sheet->getCell("J".$row)->getValue()));
					array_push($junio__array, floatval($sheet->getCell("K".$row)->getValue()));
					array_push($julio__array, floatval($sheet->getCell("L".$row)->getValue()));
					array_push($agosto__array, floatval($sheet->getCell("M".$row)->getValue()));
					array_push($septiembre__array, floatval($sheet->getCell("N".$row)->getValue()));
					array_push($octubre__array, floatval($sheet->getCell("O".$row)->getValue()));
					array_push($noviembre__array, floatval($sheet->getCell("P".$row)->getValue()));
					array_push($diciembre__array, floatval($sheet->getCell("Q".$row)->getValue()));
					array_push($total__array, floatval($sumadorTotal));

				}

			}



			$jason['cedula__array']=$cedula__array;
			$jason['nombres__array']=$nombres__array;
			$jason['cargo__array']=$cargo__array;
			$jason['tipoCargo__array']=$tipoCargo__array;
			$jason['honorarioMensual__array']=$honorarioMensual__array;
			$jason['enero__array']=$enero__array;
			$jason['febrero__array']=$febrero__array;
			$jason['marzo__array']=$marzo__array;
			$jason['abril__array']=$abril__array;
			$jason['mayo__array']=$mayo__array;
			$jason['junio__array']=$junio__array;
			$jason['julio__array']=$julio__array;
			$jason['agosto__array']=$agosto__array;
			$jason['septiembre__array']=$septiembre__array;
			$jason['octubre__array']=$octubre__array;
			$jason['noviembre__array']=$noviembre__array;
			$jason['diciembre__array']=$diciembre__array;
			$jason['total__array']=$total__array;
			
			

		break;

	}

	$array__errorItem__string = implode(" ; ", $array__errorItem);
	$array__errorItemRepetido__string = implode(" ; ", $array__errorItemRepetido);
	$array__camposVacios__string = implode(" ; ", $array__camposVacios);
	$array__errorCampoNoCorresponde__string = implode(" ; ", $array__errorCampoNoCorresponde);


	$jason['array__errorItem__string']=$array__errorItem__string;
	$jason['array__errorItemRepetido__string']=$array__errorItemRepetido__string;
	$jason['array__camposVacios__string']=$array__camposVacios__string;
	$jason['array__errorCampoNoCorresponde__string']=$array__errorCampoNoCorresponde__string;

	echo json_encode($jason);

