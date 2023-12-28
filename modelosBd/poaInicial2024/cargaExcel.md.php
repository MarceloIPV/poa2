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
	
	/*====================================
	=            Código items            =
	====================================*/
	
	switch ($tipo) {


		case "act__administrativas":

			$tipo__array=array();
			$nombre__array=array();
			$luz__array=array();
			$agua__array=array();

			for ($row = 2; $row <= $highestRow; $row++){ 

				array_push($tipo__array, trim($sheet->getCell("A".$row)->getValue()));
				array_push($nombre__array, trim($sheet->getCell("B".$row)->getValue()));
				

			}


			$jason['tipo__array']=$tipo__array;
			$jason['nombre__array']=$nombre__array;
			
			

		break;


	}

	$jason['banderaObligatorios']=$banderaObligatorios;


	echo json_encode($jason);
