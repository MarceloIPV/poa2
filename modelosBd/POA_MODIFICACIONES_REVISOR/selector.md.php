<?php

define('CONTROLADOR7', '../../conexion/');

require_once CONTROLADOR7.'conexion.php';

extract($_POST);

class lugar{

	public static function lugarFuncion($indicador){
			
		$conexionRecuperada= new conexion();
 		$conexionEstablecida=$conexionRecuperada->cConexion();	


		/*============================================
		=            Parametros Iniciales            =
		============================================*/
			
		date_default_timezone_set("America/Guayaquil");

		$fecha_actual = date('Y-m-d');

		$hora_actual= date('H:i:s');	

		$hora_actual2= date('s');
			

		$hora__dos=date('H:i');

		$anioa=date('Y');

		/*=====  End of Parametros Iniciales  ======*/

		session_start();

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
		$idUsuario=$_SESSION["idUsuario"];

 		extract($_POST);

 		if ($indicador==1) {

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.estadoUsuario='A' AND (a.fisicamenteEstructura='15' OR a.fisicamenteEstructura='6' AND b.id_rol='2') OR (a.zonal>2 AND b.id_rol='4' AND a.estadoUsuario='A') ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);


			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==2){

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.fisicamenteEstructura='5' AND b.id_rol='2' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige--</option>";

			$listas.="<optgroup label='Asignar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==3){

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND (a.fisicamenteEstructura='12' OR a.fisicamenteEstructura='14' AND b.id_rol='2') AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige--</option>";

			$listas.="<optgroup label='Asignar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==4){

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' OR (a.zonal>2 AND b.id_rol='4' AND a.estadoUsuario='A')  AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige--</option>";

			$listas.="<optgroup label='Asignar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==5){


	 		$query2="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
			$resultado2 = $conexionEstablecida->query($query2);
			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
			 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.estadoUsuario='A' AND (a.puestoInstitucional>=11 AND a.puestoInstitucional<=64) ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas.="<optgroup label='Reasignar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==6){


	 		$query2="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
			$resultado2 = $conexionEstablecida->query($query2);
			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
			 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}


			return $listas;

 		}else if($indicador==7){

	 		$query2="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
			$resultado2 = $conexionEstablecida->query($query2);

			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Recomendar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
			 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==8){

	 		$query2="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
			$resultado2 = $conexionEstablecida->query($query2);

			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Recomendar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
			 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}


			return $listas;

 		}else if($indicador==9){

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Asignar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==10){

 			$query2="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
				$resultado2 = $conexionEstablecida->query($query2);

				$listas="<option value=''>--Elige--</option>";
				$listas.="<optgroup label='Regresar a' class='text-center'>";

				while($registro2 = $resultado2->fetch()) {
					 	
					$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

				}


	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);
			$listas.="<optgroup label='Asignar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==11){

	 		$query="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}else if($indicador==12){

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige solo en caso de querer devolver (en caso de recomendar enviar vacío)--</option>";
			$listas.="<optgroup label='Devolver a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;
 		}else if($indicador==13){

 			 $query2="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
			$resultado2 = $conexionEstablecida->query($query2);

			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Recomendar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
				 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);
			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;
 		}else if($indicador==14){

 			 $query2="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
			$resultado2 = $conexionEstablecida->query($query2);

			$listas="<option value=''>--Elige solo en caso de querer devolver (en caso de finalizar enviar vacío)--</option>";
			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
				 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}


			return $listas;

 		}else if($indicador==15){


	 		$query2="SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario,(SELECT CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS nombre,(SELECT a2.descripcionZonal FROM th_usuario AS a1 INNER JOIN th_zonal AS a2 ON a2.id_Zonal=a1.zonal WHERE a.PersonaACargo=a1.id_usuario) AS descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario';";
			$resultado2 = $conexionEstablecida->query($query2);
			$listas="<option value=''>--Elige--</option>";
			$listas.="<optgroup label='Recomendar a' class='text-center'>";

			while($registro2 = $resultado2->fetch()) {
			 	
				$listas.="<option value='".$registro2["id_usuario"]."'>".utf8_decode(utf8_encode($registro2["nombre"]))." (".utf8_decode(utf8_encode($registro2["descripcionZonal"])).")</option>";

			}

	 		$query="SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON a.zonal=c.id_Zonal WHERE a.PersonaACargo='$idUsuario' AND a.estadoUsuario='A' ORDER BY c.descripcionZonal;";
			$resultado = $conexionEstablecida->query($query);

			$listas.="<optgroup label='Regresar a' class='text-center'>";

			while($registro = $resultado->fetch()) {
			 	
				$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombre"]))." (".utf8_decode(utf8_encode($registro["descripcionZonal"])).")</option>";

			}

			return $listas;

 		}


	}

}

echo lugar::lugarFuncion($indicador);