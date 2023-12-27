<?php

define('CONTROLADOR7', '../../conexion/');

require_once CONTROLADOR7.'conexion.php';

extract($_POST);

class lugar{

	public static function lugarFuncion($indicador){
		
		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

 			// $conexionEstablecida->exec("set names utf8");

		session_start();

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		extract($_POST);

		if ($indicador==1) {

			$query="SELECT idHonorarios, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione--</option>";

			while($registro = $resultado->fetch()) {
				$listas.="<option value='".$registro["idHonorarios"]."'>".$registro["nombres"]."</option>";					
			}

			return $listas; 


		}else if($indicador==2){


			$query="SELECT idSueldos AS idHonorarios, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione--</option>";

			while($registro = $resultado->fetch()) {
				$listas.="<option value='".$registro["idHonorarios"]."'>".$registro["nombres"]."</option>";					
			}

			return $listas; 


		}

	}
}

echo lugar::lugarFuncion($indicador);

