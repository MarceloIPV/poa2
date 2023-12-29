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

			for ($row = 2; $row <= $highestRow; $row++){ 

				array_push($item__array, trim($sheet->getCell("A".$row)->getValue()));
				array_push($justificacion__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($cantidad__array, trim($sheet->getCell("C".$row)->getValue()));

				array_push($enero__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($febrero__array, trim($sheet->getCell("E".$row)->getValue()));
				array_push($marzo__array, trim($sheet->getCell("F".$row)->getValue()));
				array_push($abril__array, trim($sheet->getCell("G".$row)->getValue()));
				array_push($mayo__array, trim($sheet->getCell("H".$row)->getValue()));
				array_push($junio__array, trim($sheet->getCell("I".$row)->getValue()));
				array_push($julio__array, trim($sheet->getCell("J".$row)->getValue()));
				array_push($agosto__array, trim($sheet->getCell("K".$row)->getValue()));
				array_push($septiembre__array, trim($sheet->getCell("L".$row)->getValue()));
				array_push($octubre__array, trim($sheet->getCell("M".$row)->getValue()));
				array_push($noviembre__array, trim($sheet->getCell("N".$row)->getValue()));
				array_push($diciembre__array, trim($sheet->getCell("O".$row)->getValue()));
				array_push($total__array, trim($sheet->getCell("P".$row)->getValue()));
				

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

			$item__array=array();
			$tipo__array=array();
			$nombre__array=array();
			$luz__array=array();
			$agua__array=array();

			

			for ($row = 2; $row <= $highestRow; $row++){ 

				array_push($item__array, trim($sheet->getCell("A".$row)->getValue()));
				array_push($tipo__array, trim($sheet->getCell("B".$row)->getValue()));
				array_push($nombre__array, trim($sheet->getCell("C".$row)->getValue()));
				array_push($luz__array, trim($sheet->getCell("D".$row)->getValue()));
				array_push($agua__array, trim($sheet->getCell("E".$row)->getValue()));

			}


			$jason['item__array']=$item__array;
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

		case "act_deportivas":

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

