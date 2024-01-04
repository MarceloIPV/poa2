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
						$posicion = $row - 1;
						array_push($array__errorItem,"El ítem presupuestario columna A Fila ".$row ." no está registrado en la actividad ".$idActividad);
					}else{					

						array_push($array__success,$comparadorItem__financiero);
					}

					$sumadorTotal=0;
					$sumadorTotal=floatval($sheet->getCell("D".$row)->getValue()) + floatval($sheet->getCell("E".$row)->getValue()) + floatval($sheet->getCell("F".$row)->getValue()) + floatval($sheet->getCell("G".$row)->getValue()) + floatval($sheet->getCell("H".$row)->getValue()) + floatval($sheet->getCell("I".$row)->getValue()) + floatval($sheet->getCell("J".$row)->getValue()) + floatval($sheet->getCell("K".$row)->getValue()) + floatval($sheet->getCell("L".$row)->getValue()) +  floatval($sheet->getCell("M".$row)->getValue()) + floatval($sheet->getCell("N".$row)->getValue()) + floatval($sheet->getCell("O".$row)->getValue()) + floatval($sheet->getCell("P".$row)->getValue());

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
			

			for ($row = 2; $row <= $highestRow; $row++){ 

				array_push($idActividad__array, trim($sheet->getCell("A".$row)->getValue()));
				array_push($Item__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($nombreItem__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($nombreInfra__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($provincia__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($direccion__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($estado__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($tipoRecursos__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($tipoIntervencion__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($detallarTipo__intervencion__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($tipoMantenimiento__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($materiales__servicios__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($ultimoFecha__servicios__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($enero__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("P".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("Q".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("R".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("S".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("T".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("U".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("V".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("W".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("X".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("Y".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("Z".$row)->getValue()));
				

			}


			$jason['idActividad__array']=$idActividad__array;
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

