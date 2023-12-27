<?php
	
	extract($_POST);

	
	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	require_once "../../config/config2.php";

	// require_once '../../PHPExcel/Classes/PHPExcel.php';

require_once '../../vendor/autoload.php';

    	
$archivo = $_FILES['documentoExcel']['tmp_name'];

use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load($archivo);
$sheet = $spreadsheet->getActiveSheet();
$cellValue = $sheet->getCell('A1')->getValue();

foreach ($sheet->getRowIterator() as $row) {
    foreach ($row->getCellIterator() as $cell) {
        // $cellValue = $cell->getValue();

        echo $cell->getColumn()."__".$cell->getValue();
       
    }
}




	// echo json_encode($jason);
