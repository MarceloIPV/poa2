<?php

	require_once '../../PHPExcel-1.8/Classes/PHPExcel.php';

	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();


	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	extract($_POST);

	$variableT__array = json_decode($variableT);
	$nombreCons__array = json_decode($nombreCons);

	$eneroOrigen__array = json_decode($eneroOrigen);
	$febreroOrigen__array = json_decode($febreroOrigen);
	$marzoOrigen__array = json_decode($marzoOrigen);
	$abrilOrigen__array = json_decode($abrilOrigen);
	$mayoOrigen__array = json_decode($mayoOrigen);
	$junioOrigen__array = json_decode($junioOrigen);
	$julioOrigen__array = json_decode($julioOrigen);
	$agostoOrigen__array = json_decode($agostoOrigen);
	$septiembreOrigen__array = json_decode($septiembreOrigen);
	$noviemgreOrigen__array = json_decode($noviemgreOrigen);
	$diciembreOrigen__array = json_decode($diciembreOrigen);



	$objPHPExcel = new PHPExcel();

	$objPHPExcel->getProperties()->setCreator("Ministerio del Deporte")->setTitle("Modificaciones");

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'IdFinanciero');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Ítem');

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setVisible(false);

	$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setWrapText(true);

	$complemento=2;


	if(!empty($variableT__array)){

		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'ENERO ORÍGEN');

	}else{

		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setVisible(false);

	}


	for ($i=0; $i < count($variableT__array); $i++) { 
		
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$complemento, $variableT__array[$i])->setCellValue('B'.$complemento,$nombreCons__array[$i]);


		if(!empty($variableT__array)){

			$fisicamenteDireccion=$objeto->getObtenerInformacionGeneral("SELECT a.enero FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$variableT__array[$i]' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$complemento, $fisicamenteDireccion[0][enero]);


		}


		$complemento++;

	}

	$complementoDestino=10;


	for ($i=0; $i < count($variableT__array); $i++) { 
		
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$complementoDestino, $variableT__array[$i])->setCellValue('B'.$complementoDestino,$nombreCons__array[$i]);



		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$complementoDestino, 0);


		$complementoDestino++;

	}



	$objPHPExcel->getActiveSheet()->setTitle('Hoja Poa');
	$objPHPExcel->setActiveSheetIndex(0);

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 

	$objWriter->save("excelPoa/test1.xls");

