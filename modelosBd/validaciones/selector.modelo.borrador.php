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

 			// $conexionEstablecida->exec("set names utf8");

			session_start();

			$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

 			extract($_POST);

 			if ($indicador==1) {

	 			$query="SELECT DISTINCT idProvincia,nombreProvincia FROM in_md_provincias ORDER BY nombreProvincia;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige una provincia--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idProvincia"]."'>".utf8_decode(utf8_encode($registro["nombreProvincia"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==2){


 				$query="SELECT DISTINCT idCanton,nombreCanton FROM in_md_canton WHERE idProvincia='$provincia' ORDER BY nombreCanton;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un cantón-</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idCanton"]."'>".utf8_decode(utf8_encode($registro["nombreCanton"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==3){

 				$query="SELECT DISTINCT idParroquia,nombreParroquia FROM in_md_parroquia WHERE idCanton='$canton' ORDER BY nombreParroquia;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige una parroquia-</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idParroquia"]."'>".utf8_decode(utf8_encode($registro["nombreParroquia"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==4){

 				$query="SELECT id,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(paisnombre , 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Í'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'','') AS paisnombre  FROM poa_pais ORDER BY paisnombre;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un país-</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["id"]."'>".utf8_decode(utf8_encode($registro["paisnombre"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==5){

 				$query="SELECT DISTINCT idCanton,nombreCanton FROM in_md_canton ORDER BY nombreCanton;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un cantón-</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idCanton"]."'>".utf8_decode(utf8_encode($registro["nombreCanton"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==6){


 				$query="SELECT DISTINCT idParroquia,nombreParroquia FROM in_md_parroquia ORDER BY nombreParroquia;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige una parroquia-</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idParroquia"]."'>".utf8_decode(utf8_encode($registro["nombreParroquia"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==7){

 				$query="SELECT idLineas,nombreLinea FROM poa_linea_base WHERE estado='A' AND nombreLinea!='';";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige una línea política-</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idLineas"]."'>".utf8_decode(utf8_encode($registro["nombreLinea"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==8){

 				$query="SELECT idAreaAccion,accion FROM poa_area_accion WHERE estado='A' AND accion!='';";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige una àrea de acciòn--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idAreaAccion"]."'>".utf8_decode(utf8_encode($registro["accion"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==9){

 				$query="SELECT nombreObjetivo,idObjetivos FROM poa_objetivos WHERE estado='A';";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un objetivo--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idObjetivos"]."'>".utf8_decode(utf8_encode($registro["nombreObjetivo"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==10){

 				$query="SELECT idAreaEncargada,nombreArea FROM poa_areaencargada WHERE estado='A' ";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un área--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idAreaEncargada"]."'>".utf8_decode(utf8_encode($registro["nombreArea"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==11){

 				$query="SELECT a.idTipoOrganismo,a.nombreTipo,b.idAreaAccion,b.accion,c.idObjetivos,c.nombreObjetivo,e.idLineas,e.nombreLinea,f.idAreaEncargada,f.nombreArea FROM poa_tipo_organismo AS a INNER JOIN poa_area_accion AS b ON b.idAreaAccion=a.idAreaAccion INNER JOIN poa_objetivos AS c ON c.idObjetivos=a.idObjetivos INNER JOIN poa_objetivos_usuario AS d ON d.idObjetivos=c.idObjetivos LEFT JOIN poa_linea_base AS e ON e.idLineas=d.idLineaBase LEFT JOIN poa_areaencargada AS f ON f.idAreaEncargada=a.idAreaEncargada;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un tipo de organismo--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idTipoOrganismo"]."' idAreaAccion='".$registro["idAreaAccion"]."' accion='".$registro["accion"]."' idObjetivos='".$registro["idObjetivos"]."' nombreObjetivo='".$registro["nombreObjetivo"]."' idLineas='".$registro["idLineas"]."' nombreLinea='".$registro["nombreLinea"]."' idAreaEncargada='".$registro["idAreaEncargada"]."' nombreArea='".$registro["nombreArea"]."'>".utf8_decode(utf8_encode($registro["nombreTipo"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==12){

 				$sumador=2021;

			 	$listas="<option value=''>--Elige un periodo--</option>";

			 	for ($i=0; $i < 100; $i++) { 

			 		$sumador=$sumador+1;

			 		$listas.="<option value='".$sumador."'>".$sumador."</option>";

			 	}

			 	return $listas;


 			}else if($indicador==13){


 				$query="SELECT idClasificacionGastos,nombreClasificacionGastos FROM poa_clasificaciongastos";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un grupo de gasto--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idClasificacionGastos"]."'>".utf8_decode(utf8_encode($registro["nombreClasificacionGastos"]))."</option>";

			 	}

			 	return $listas;



 			}else if($indicador==14){

 				$array = [];

 				$query="SELECT c.idItem,c.nombreItem FROM poa_item_actividad AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_item AS c ON c.idItem=a.idItem WHERE a.idActividad='$elementos' GROUP BY c.idItem;";

			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {
			 	
			 		array_push($array, $registro["idItem"]);

			 	}

			 	$validaItem = implode(",",$array);  

			 	$listas="<option value=''>--Elige un item--</option>";

			 	if (count($array)>0) {
			 		$query2="SELECT idItem,nombreItem,itemPreesupuestario FROM poa_item WHERE idItem NOT IN ($validaItem) ORDER BY itemPreesupuestario ASC;";
			 	}else{
			 		$query2="SELECT idItem,nombreItem,itemPreesupuestario FROM poa_item  ORDER BY itemPreesupuestario ASC;";
			 	}


	 			

				$resultado2 = $conexionEstablecida->query($query2);

				while($registro2 = $resultado2->fetch()) {
				 	
					$listas.="<option value='".$registro2["idItem"]."'>".utf8_decode(utf8_encode("(".$registro2["itemPreesupuestario"].")".$registro2["nombreItem"]))."</option>";

				} 	

			 	return $listas;


 			}else if($indicador==15){

 				$query="SELECT idPrograma,nombrePrograma FROM poa_programa;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un programa--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idPrograma"]."'>".utf8_decode(utf8_encode($registro["nombrePrograma"]))."</option>";

			 	}

			 	return $listas;


 			}else if($indicador==16){

 				$query="SELECT idTipo,nombreTipo FROM poa_tipo WHERE estado='A' AND nombreTipo!='';";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un programa--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idTipo"]."'>".utf8_decode(utf8_encode($registro["nombreTipo"]))."</option>";

			 	}

			 	return $listas;

 			}else if($indicador==17){

 				$query="SELECT b.idPrograma,b.nombrePrograma FROM poa_objetivos_usuario AS a INNER JOIN poa_programa AS b ON a.idPrograma=b.idPrograma WHERE a.idObjetivos='$parametro2';";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un programa--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idPrograma"]."'>".utf8_decode(utf8_encode($registro["nombrePrograma"]))."</option>";

			 	}

			 	return $listas; 				

 			}else if($indicador==18){

 				$query="SELECT b.idPrograma,b.nombrePrograma FROM poa_objetivos_usuario AS a INNER JOIN poa_programa AS b ON a.idPrograma=b.idPrograma;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un programa--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idPrograma"]."'>".utf8_decode(utf8_encode($registro["nombrePrograma"]))."</option>";

			 	}

			 	return $listas; 				

 			}else if($indicador==19){

 				$arraySeleccionado = [];

 				$arrayItemsActividades=[];


 				$querySeleccionado="SELECT idItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idActividad='$elementos';";

			 	$resultadoSeleccionado = $conexionEstablecida->query($querySeleccionado);

			 	while($registroSeleccionado = $resultadoSeleccionado->fetch()) {
			 	
			 		array_push($arraySeleccionado, $registroSeleccionado["idItem"]);

			 	}


 				$querySeleccionadoSegus="SELECT idItem AS itemActEn FROM poa_item_actividad WHERE idActividad='$elementos';";

			 	$resultadoSeleccionadoSegus = $conexionEstablecida->query($querySeleccionadoSegus);

			 	while($registroSeleccionadoSegus = $resultadoSeleccionadoSegus->fetch()) {
			 	
			 		array_push($arrayItemsActividades, $registroSeleccionadoSegus["itemActEn"]);

			 	}

			 	if (count($arraySeleccionado)>0) {
			 		$validaItem = implode(",",$arraySeleccionado);  
			 	}


			 
			 	$validaItem2 = implode(",",$arrayItemsActividades);  



			 	$listas="<option value=''>--Elige un item usuario--</option>";

			 	if (count($arraySeleccionado)<=0 || count($arraySeleccionado)=="0") {
			 		$query2="SELECT idItem,nombreItem,itemPreesupuestario FROM poa_item WHERE idItem  IN($validaItem2) ORDER BY nombreItem;";
			 	}else{
			 		$query2="SELECT idItem,nombreItem,itemPreesupuestario FROM poa_item WHERE idItem NOT IN ($validaItem) AND idItem  IN($validaItem2) ORDER BY nombreItem;";
			 	}

				 $resultado2 = $conexionEstablecida->query($query2);

				 while($registro2 = $resultado2->fetch()) {
				 	
					$listas.="<option value='".$registro2["idItem"]."'>".utf8_decode(utf8_encode("(".$registro2["itemPreesupuestario"].") ".$registro2["nombreItem"]))."</option>";

				 } 	

				 return $listas;


 			}else if($indicador==20){


 				$query="SELECT idIndicadores,nombreIndicador FROM poa_indicadores;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Elige un indicador--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idIndicadores"]."'>".utf8_decode(utf8_encode($registro["nombreIndicador"]))."</option>";

			 	}

			 	return $listas; 

 			}else if($indicador==21){

 				$query="SELECT idDeporte,nombreDeporte FROM poa_deporte;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idDeporte"]."'>".utf8_decode(utf8_encode($registro["nombreDeporte"]))."</option>";

			 	}

			 	return $listas; 

 			}else if($indicador==22){

 				$query="SELECT id,paisnombre FROM poa_pais;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["id"]."'>".utf8_decode(utf8_encode($registro["paisnombre"]))."</option>";

			 	}

			 	return $listas; 

 			}else if($indicador==23){

 				$query="SELECT idAlcanse,nombreAlcanse FROM poa_alcanse;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {
			 	
			 		$listas.="<option value='".$registro["idAlcanse"]."'>".utf8_decode(utf8_encode($registro["nombreAlcanse"]))."</option>";

			 	}

			 	return $listas; 

 			}else if($indicador==24){

 				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (b.id_rol='4' AND a.zonal>1) OR (a.fisicamenteEstructura='24' AND b.id_rol='7') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==25){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";


			 	while($registro3 = $resultado3->fetch()) {


			 		$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
			 	

			 	}


			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==26){

 				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='26' AND b.id_rol='7') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	
			 	}

			 	return $listas; 

 			}else if($indicador==27){

 				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura,e.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_fisicamenteestructura AS e ON e.id_FisicamenteEstructura=a.fisicamenteEstructura  WHERE a.estadoUsuario='A' AND (b.id_rol='4' AND a.zonal>1 AND a.estadoUsuario='A') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' AND a.estadoUsuario='A' AND b.id_rol='2') AND a.estadoUsuario='A'  ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).") DIECCIÓN: ".$registro["descripcionFisicamenteEstructura"]."</option>";

			 	}

			 	return $listas; 

 			}else if($indicador==28){

 				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura,e.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_fisicamenteestructura AS e ON e.id_FisicamenteEstructura=a.fisicamenteEstructura  WHERE a.estadoUsuario='A' AND (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' OR (b.id_rol='4' AND a.zonal>1) ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).") DIECCIÓN: ".$registro["descripcionFisicamenteEstructura"]."</option>";

			 	}

			 	return $listas; 

 			}else if($indicador==29){

 				$conexionEstablecida->exec("set names utf8");

 				if ($identificador=="subses") {
 					
 					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='26' AND b.id_rol='7') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol DESC;";

 				}else{

 					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='1' AND b.id_rol='4') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol DESC;";

 				}

 				

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==30){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";


			 	while($registro3 = $resultado3->fetch()) {


			 		$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
			 	

			 	}


			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas;  				
 				
 			}else if($indicador==31){


 				$conexionEstablecida->exec("set names utf8");

 				if ($identificador=="subses") {
 					
 					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='26' AND b.id_rol='7') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol DESC;";

 				}else{

 					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='2' AND b.id_rol='4') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol DESC;";

 				}

 				

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";

			 	

			 	}

			 	return $listas; 

 			}else if($indicador==32){


 				$conexionEstablecida->exec("set names utf8");

 				if ($identificador=="subses") {
 					
 					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='26' AND b.id_rol='7') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol DESC;";

 				}else{

 					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.fisicamenteEstructura='26' AND b.id_rol='7') OR (a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.estadoUsuario='A' ORDER BY b.id_rol DESC;";

 				}

 				

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==33){

				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.zonal=1 AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario')  AND a.estadoUsuario='A' ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


 				$queryCoordinador="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4' AND a.fisicamenteEstructura='3';";

			 	$resultadoCoordinador = $conexionEstablecida->query($queryCoordinador);


 				$queryCoordinador__zonales="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4' AND a.zonal>1 ORDER BY a.zonal;";

			 	$resultadoCoordinador__zonales = $conexionEstablecida->query($queryCoordinador__zonales);			 	

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registroCoordinador = $resultadoCoordinador->fetch()) {

			 		$listas.="<option value='".$registroCoordinador["id_usuario"]."'>".utf8_decode(utf8_encode($registroCoordinador["nombreCompleto"])." (".utf8_encode($registroCoordinador["descripcionZonal"])).")"."</option>";
			 	
			 	}

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	while($registro__zonales = $resultadoCoordinador__zonales->fetch()) {

			 		$listas.="<option value='".$registro__zonales["id_usuario"]."'>".utf8_decode(utf8_encode($registro__zonales["nombreCompleto"])." (".utf8_encode($registro__zonales["descripcionZonal"])).")"."</option>";
			 	

			 	}
			 	

			 	return $listas; 

 			}else if($indicador==34){

				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.zonal=1 AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario')  AND a.estadoUsuario='A' OR (a.zonal>1 AND b.id_rol='4' AND a.estadoUsuario='A') ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


 				$queryCoordinador="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4'  AND a.fisicamenteEstructura='3';";

			 	$resultadoCoordinador = $conexionEstablecida->query($queryCoordinador);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registroCoordinador = $resultadoCoordinador->fetch()) {

			 		$listas.="<option value='".$registroCoordinador["id_usuario"]."'>".utf8_decode(utf8_encode($registroCoordinador["nombreCompleto"])." (".utf8_encode($registroCoordinador["descripcionZonal"])).")"."</option>";
			 	
			 	}

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==35){

				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.zonal=1 AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.fisicamenteEstructura='15' AND a.estadoUsuario='A' ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


 				$queryCoordinador="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4'  AND a.fisicamenteEstructura='3';";

			 	$resultadoCoordinador = $conexionEstablecida->query($queryCoordinador);




 				$queryCoordinador__zonales="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4' AND a.zonal>1 ORDER BY a.zonal;";

			 	$resultadoCoordinador__zonales = $conexionEstablecida->query($queryCoordinador__zonales);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registroCoordinador = $resultadoCoordinador->fetch()) {

			 		$listas.="<option value='".$registroCoordinador["id_usuario"]."'>".utf8_decode(utf8_encode($registroCoordinador["nombreCompleto"])." (".utf8_encode($registroCoordinador["descripcionZonal"])).")"."</option>";
			 	
			 	}

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	while($registro__zonales = $resultadoCoordinador__zonales->fetch()) {

			 		$listas.="<option value='".$registro__zonales["id_usuario"]."'>".utf8_decode(utf8_encode($registro__zonales["nombreCompleto"])." (".utf8_encode($registro__zonales["descripcionZonal"])).")"."</option>";
			 	

			 	}



			 	return $listas; 

 			}else if($indicador==36){

				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.zonal=1 AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.fisicamenteEstructura='7' AND a.estadoUsuario='A' ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


 				$queryCoordinador="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4'  AND a.fisicamenteEstructura='3';";

			 	$resultadoCoordinador = $conexionEstablecida->query($queryCoordinador);




 				$queryCoordinador__zonales="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4' AND a.zonal>1 ORDER BY a.zonal;";

			 	$resultadoCoordinador__zonales = $conexionEstablecida->query($queryCoordinador__zonales);


			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registroCoordinador = $resultadoCoordinador->fetch()) {

			 		$listas.="<option value='".$registroCoordinador["id_usuario"]."'>".utf8_decode(utf8_encode($registroCoordinador["nombreCompleto"])." (".utf8_encode($registroCoordinador["descripcionZonal"])).")"."</option>";
			 	
			 	}

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	while($registro__zonales = $resultadoCoordinador__zonales->fetch()) {

			 		$listas.="<option value='".$registro__zonales["id_usuario"]."'>".utf8_decode(utf8_encode($registro__zonales["nombreCompleto"])." (".utf8_encode($registro__zonales["descripcionZonal"])).")"."</option>";
			 	

			 	}


			 	return $listas; 

 			}else if($indicador==37){

				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.estadoUsuario='A' AND (a.zonal=1 AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario') AND a.fisicamenteEstructura='5' AND a.estadoUsuario='A' ORDER BY b.id_rol,a.zonal;";

			 	$resultado = $conexionEstablecida->query($query);


 				$queryCoordinador="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4'  AND a.fisicamenteEstructura='3';";

			 	$resultadoCoordinador = $conexionEstablecida->query($queryCoordinador);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	while($registroCoordinador = $resultadoCoordinador->fetch()) {

			 		$listas.="<option value='".$registroCoordinador["id_usuario"]."'>".utf8_decode(utf8_encode($registroCoordinador["nombreCompleto"])." (".utf8_encode($registroCoordinador["descripcionZonal"])).")"."</option>";
			 	
			 	}

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==38){

 				$conexionEstablecida->exec("set names utf8");


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";


			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";


			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==39){


 				$conexionEstablecida->exec("set names utf8");


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' AND a.estadoUsuario='A' AND a.fisicamenteEstructura='23' ORDER BY c.id_Zonal;";


			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";


			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==40){


 				$conexionEstablecida->exec("set names utf8");


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' AND a.estadoUsuario='A' AND a.fisicamenteEstructura='23' ORDER BY c.id_Zonal;";


			 	$resultado = $conexionEstablecida->query($query);



 				$queryCoordinador__zonales="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol WHERE a.estadoUsuario='A' AND b.id_rol='4' AND a.zonal>1 ORDER BY a.zonal;";

			 	$resultadoCoordinador__zonales = $conexionEstablecida->query($queryCoordinador__zonales);


			 	$listas="<option value='' class='text-center'>--Seleccione--</option>";

			 	$listas.=" <optgroup label = 'FUNCIONARIOS QUE PERTENECEN A LA DIRECCIÓN ADMINISTRATIVA' class='text-center'>";


			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	$listas.="</optgroup>";

			 	$listas.=" <optgroup label = 'COORDINACIONES ZONALES' class='text-center'>";

			 	while($registro__zonales = $resultadoCoordinador__zonales->fetch()) {

			 		$listas.="<option value='".$registro__zonales["id_usuario"]."'>".utf8_decode(utf8_encode($registro__zonales["nombreCompleto"])." (".utf8_encode($registro__zonales["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	$listas.="</optgroup>";			 	

			 	return $listas; 

 			}else if($indicador==41){

 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";
			 	$resultado = $conexionEstablecida->query($query);



 				$query__DOS="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE b.id_rol='2' AND a.fisicamenteEstructura='23' ORDER BY a.id_usuario DESC LIMIT 1";
			 	$resultado__DOS = $conexionEstablecida->query($query__DOS);



			 	$listas="<option value='' class='text-center'>--Seleccione--</option>";

			 	$listas.=" <optgroup label = 'DIRECTOR FINANCIERO (Seleccionar en caso de querer devolver el trámite)' class='text-center'>";

			 	while($registro__DOS = $resultado__DOS->fetch()) {


			 		$listas.="<option value='".$registro__DOS["id_usuario"]."'>".utf8_decode(utf8_encode($registro__DOS["nombreCompleto"])." (".utf8_encode($registro__DOS["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	$listas.=" <optgroup label = 'FUNCIONARIOS QUE PERTENECEN A LA COORDINACIÓN' class='text-center'>";

			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"]).")"."</option>";
			 	

			 	}

			 	return $listas; 


 			}else if($indicador==42){


 				$query="SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuario';";
			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {

			 		$idJefe=$registro["PersonaACargo"];
			 	
			 	}			 	


 				$query__DOS="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.id_usuario='$idJefe'";
			 	$resultado__DOS = $conexionEstablecida->query($query__DOS);


			 	$listas="<option value='' class='text-center'>--Seleccione--</option>";

			 	$listas.=" <optgroup label = 'SUPERIOR INMEDIATO (Seleccionar en caso de querer devolver el trámite)' class='text-center'>";

			 	while($registro__DOS = $resultado__DOS->fetch()) {


			 		$listas.="<option value='".$registro__DOS["id_usuario"]."'>".utf8_decode(utf8_encode($registro__DOS["nombreCompleto"])." (".utf8_encode($registro__DOS["descripcionZonal"])).")"."</option>";
			 	

			 	}

			 	return $listas; 


 			}else if($indicador==43){


 				$query="SELECT b.idActividades,b.nombreActividades,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY  a.idActividad;";
			 	$resultado = $conexionEstablecida->query($query);


			 	$listas="<option value='' class='text-center'>--Seleccione una actividad--</option>";


			 	while($registro = $resultado->fetch()) {


			 		$listas.="<option value='".$registro["idActividades"]."'>".$registro["nombreActividades"].""."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==44){


 				$query="SELECT c.idItem,c.nombreItem,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_item AS c ON c.idItem=a.idItem WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND idActividad='$idActividades';";
			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {


			 		$listas.="<div class='d d-flex'><div class='col col-10'>".$registro["nombreItem"]."</div><div class='col col-2'><input type='checkbox' class='check_modificaciones text-center' attr='".$registro["idProgramacionFinanciera"]."' nombreItems='".$registro["nombreItem"]."'></div></div>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==45){


 				$query="SELECT id_FisicamenteEstructura,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(descripcionFisicamenteEstructura, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS descripcionFisicamenteEstructura  FROM th_fisicamenteestructura WHERE estado='A' ORDER BY descripcionFisicamenteEstructura ASC;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='' class='text-center'>--Seleccione un área responsable--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_FisicamenteEstructura"]."'>".utf8_decode($registro["descripcionFisicamenteEstructura"])."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==46){

 				if ($idFisicamente==1 || $idFisicamente==2 || $idFisicamente==3 || $idFisicamente==27 || $idFisicamente==28 || $idFisicamente==29 || $idFisicamente==30 || $idFisicamente==31 || $idFisicamente==32 || $idFisicamente==33) {
 					
 					$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='$idFisicamente' AND a.estadoUsuario='A' LIMIT 1;";

 				}else if($idFisicamente==5){

 					$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='5' AND a.fisicamenteEstructura='$idFisicamente' AND a.estadoUsuario='A' LIMIT 1;";

 				}else if ($idFisicamente==24 || $idFisicamente==25 || $idFisicamente==26) {
 					
 					$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='$idFisicamente' AND a.estadoUsuario='A' LIMIT 1;";

 				}else{

 					$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='$idFisicamente' AND a.estadoUsuario='A' LIMIT 1;";

 				}

			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode($registro["nombreCompleto"])."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==47){

 				if (empty($valoresAplicados)) {
 					$query="SELECT idProyectoPaid,proyecto__inversion FROM poa_paid_proyecto;";
 				}else{
 					$query="SELECT idProyectoPaid,proyecto__inversion FROM poa_paid_proyecto WHERE idProyectoPaid NOT IN($valoresAplicados);";
 				}

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione un proyecto de inversión--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idProyectoPaid"]."'>".utf8_decode($registro["proyecto__inversion"])."</option>";
			 	

			 	}


			 	return $listas; 

 			}else if($indicador==48){

 				$query="SELECT idOrganismo,nombreOrganismo FROM poa_organismo;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='' class='text-center'>--Seleccione nombre del organismo deportivo--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idOrganismo"]."'>".utf8_decode($registro["nombreOrganismo"])."</option>";
			 	

			 	}


			 	return $listas; 

 			}else if($indicador==49){
 				
 				$query="SELECT idProyectoPaid,proyecto__inversion FROM poa_paid_proyecto;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione un proyecto de inversión--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idProyectoPaid"]."'>".utf8_decode($registro["proyecto__inversion"])."</option>";
			 	

			 	}


			 	return $listas; 

 			}else if($indicador==50){

 				$query="SELECT a.idOrganismo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo FROM poa_organismo AS a WHERE NOT EXISTS (SELECT t1.idEsigef FROM poa_esigef AS t1 WHERE t1.idOrganismo=a.idOrganismo) ORDER BY a.nombreOrganismo ASC;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='' class='text-center'>--Seleccione nombre del organismo deportivo--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idOrganismo"]."'>".$registro["nombreOrganismo"]."</option>";
			 	

			 	}


			 	return $listas; 

 			}else if($indicador==51){

 				$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idActividades"]."'>".$registro["nombreActividades"]."</option>";
			 	

			 	}


			 	return $listas; 

 			}else if($indicador==52){

				$query="SELECT a.idProgramacionFinanciera,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND (a.modifica='A' OR a.modifica IS NULL AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad') AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad';";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione ítem--</option>";

				while($registro = $resultado->fetch()) {

					echo  $registro["modifica"]."__cesar";

					if ($idActividad==1 && $registro["modifica"]=="E") {

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' attr='modifica__actividad__1' style='color:blue; font-weight:bold!important;'>".$registro["nombreItem"]." (ÍTEM CREADO)</option>";
						
					}else{

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' attr='false'>".$registro["nombreItem"]."</option>";

					}
					 	
				}

			 	return $listas; 

 			}else if($indicador==53){

 				if ($clave==true) {


 					$query2 = $conexionEstablecida->prepare("SELECT a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idProgramacionFinanciera='$idProgrmacionFinanciera';");
					$query2->execute();
					$resultado2 = $query2->fetchAll(\PDO::FETCH_ASSOC); 		
					$idItem__traidos=$resultado2[0][idItem];			
 					

 					$query = $conexionEstablecida->prepare("SELECT idActividadModificacion FROM poa_modificacion_actividad_administra_origen WHERE idActividadOrigen='$actividadOrigen' AND idActividadDestino='$actividad__modificaciones__destino' AND idItem='$idItem__traidos' ORDER BY idActividadModificacion DESC LIMIT 1;");
					$query->execute();
					$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

					if (!empty($resultado[0][idActividadModificacion])) {
				
						$listas=false;

					}else{

						$listas="<option value='0' class='text-center'>--Seleccione mes--</option>";

					 	$listas.="<option value='enero'>Enero</option>";
					 	$listas.="<option value='febrero'>Febrero</option>";
					 	$listas.="<option value='marzo'>Marzo</option>";
					 	$listas.="<option value='abril'>Abril</option>";
					 	$listas.="<option value='mayo'>Mayo</option>";
					 	$listas.="<option value='junio'>Junio</option>";
					 	$listas.="<option value='julio'>Julio</option>";
					 	$listas.="<option value='agosto'>Agosto</option>";
					 	$listas.="<option value='septiembre'>Septiembre</option>";
					 	$listas.="<option value='octubre'>Octubre</option>";
					 	$listas.="<option value='noviembre'>Noviembre</option>";
					 	$listas.="<option value='diciembre'>Diciembre</option>";

					}


 				}else{

				 	$listas="<option value='0' class='text-center'>--Seleccione mes--</option>";

				 	$listas.="<option value='enero'>Enero</option>";
				 	$listas.="<option value='febrero'>Febrero</option>";
				 	$listas.="<option value='marzo'>Marzo</option>";
				 	$listas.="<option value='abril'>Abril</option>";
				 	$listas.="<option value='mayo'>Mayo</option>";
				 	$listas.="<option value='junio'>Junio</option>";
				 	$listas.="<option value='julio'>Julio</option>";
				 	$listas.="<option value='agosto'>Agosto</option>";
				 	$listas.="<option value='septiembre'>Septiembre</option>";
				 	$listas.="<option value='octubre'>Octubre</option>";
				 	$listas.="<option value='noviembre'>Noviembre</option>";
				 	$listas.="<option value='diciembre'>Diciembre</option>";


 				}

			 	return $listas; 

 			}else if($indicador==54){


		 		$query = $conexionEstablecida->prepare("SELECT a.idProgramacionFinanciera,d.itemPreesupuestario FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem WHERE a.idProgramacionFinanciera='$idProgrmacionFinanciera';");
				$query->execute();

				$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);

			 	$listas=$resultado[0][itemPreesupuestario];

			 	return $listas; 

 			}else if($indicador==55){

				/*============================================
				=            Parametros Iniciales            =
				============================================*/
				
				date_default_timezone_set("America/Guayaquil");

				$fecha_actual = date('Y');
				
				/*=====  End of Parametros Iniciales  ======*/

 				$query = $conexionEstablecida->prepare("SELECT a.$mes FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$programacionFinanciera';");
				$query->execute();
				$resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
			 	$listas=$resultado[0][$mes];


 				$queryDisminucion= $conexionEstablecida->prepare("SELECT disminucionOrigen FROM poa_modificacion_organismo_actividades WHERE idFinancieroOrigen='$programacionFinanciera' AND YEAR(fecha)='$fecha_actual' AND mesOrigen='$mes' ORDER BY idModificacionOr DESC LIMIT 1;");
 				$queryDisminucion->execute();
				$resultadoDisminucion = $queryDisminucion->fetchAll(\PDO::FETCH_ASSOC);

				if (!empty($resultadoDisminucion[0][disminucionOrigen])) {
					
					$listas=floatval($listas) - floatval($resultadoDisminucion[0][disminucionOrigen]);

				}

 				$queryAumento= $conexionEstablecida->prepare("SELECT aumentoDestino FROM poa_modificacion_organismo_actividades WHERE idFinancieroDestino='$programacionFinanciera' AND YEAR(fecha)='$fecha_actual' AND mesDestino='$mes' ORDER BY idModificacionOr DESC LIMIT 1;");
 				$queryAumento->execute();
				$resultadoAumento = $queryAumento->fetchAll(\PDO::FETCH_ASSOC);


				if (!empty($resultadoAumento[0][aumentoDestino])) {
					
					$listas=floatval($listas) + floatval($resultadoAumento[0][aumentoDestino]);

				}


				if(floatval($listas)<0){

					$listas=0;

				}

			 	return $listas; 

 			}else if($indicador==56){

 				$query="SELECT idSueldos, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idSueldos"]."'>".$registro["nombres"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==57){

 				$query="SELECT c.nombre AS rol,a.id_usuario,a.zonal,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE a.PersonaACargo='$idUsuarioC'  OR (a.fisicamenteEstructura=27 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=28 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=29 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=30 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=31 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=32 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=33 AND b.id_rol=4 AND a.estadoUsuario='A') AND a.estadoUsuario='A' AND b.estado='A' ORDER BY b.id_rol;";
			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {

			 		if ($registro["zonal"]==1) {
			 			$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]." Cargo: ".$registro["rol"]."</option>";
			 		}else{
			 			$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]." Zonal: ".$registro["zonal"]." Cargo: ".$registro["rol"]."</option>";
			 		}

			 		
			 	
			 	}


 				// $query="SELECT id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario WHERE PersonaACargo='$idUsuarioC';";
			 	// $resultado = $conexionEstablecida->query($query);

			 	// $listas="<option value='0' class='text-center'>--Seleccione--</option>";

			 	// while($registro = $resultado->fetch()) {

			 	// 	$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]."</option>";
			 	

			 	// }

			 	return $listas; 

 			}else if($indicador==58){

 				session_start();
 				$idUsuario__ingresos=$_SESSION["idUsuario"];

 				$query2="SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario__ingresos' AND a.zonal>1 AND b.id_rol='4';";
			 	$resultado2 = $conexionEstablecida->query($query2);


			 	while($registro2 = $resultado2->fetch()) {

			 		$idUsuarios__reasignados=$registro2["id_usuario"];
			 	
			 	}


			 	$queryAumento= $conexionEstablecida->prepare("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuarioC';");
 				$queryAumento->execute();
				$resultadoAumento = $queryAumento->fetchAll(\PDO::FETCH_ASSOC);
				$idUsuarios__x=$resultadoAumento[0][PersonaACargo];

				$query3="SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.fisicamenteEstructura='20' AND b.id_rol='2' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
			 	$resultado3 = $conexionEstablecida->query($query3);


			 	while($registro3 = $resultado3->fetch()) {

			 		$idUsuarios__x__seguimientos=$registro3["id_usuario"];
			 	
			 	}

				if (!empty($idUsuarios__reasignados)) {
					$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A';";
				}else{

					if ($idRolAd==4) {
						
						$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarios__x__seguimientos' OR (a.zonal>1 AND b.id_rol='4' AND a.estadoUsuario='A');";

					}else{

						$query="SELECT id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario WHERE id_usuario='$idUsuarios__x' OR (id_usuario='$idUsuarios__x' AND zonal>1);";

					}

					
				}

				echo $query;

 				
			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==59){

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido,(SELECT a1.descripcionZonal FROM th_zonal AS a1 WHERE a1.id_Zonal=a.zonal) AS zonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE PersonaACargo='$idUsuarioC' OR (a.fisicamenteEstructura=27 AND b.id_rol=4) OR (a.fisicamenteEstructura=28 AND b.id_rol=4) OR (a.fisicamenteEstructura=29 AND b.id_rol=4) OR (a.fisicamenteEstructura=30 AND b.id_rol=4) OR (a.fisicamenteEstructura=31 AND b.id_rol=4) OR (a.fisicamenteEstructura=32 AND b.id_rol=4) OR (a.fisicamenteEstructura=33 AND b.id_rol=4) AND a.estadoUsuario='A' ORDER BY a.fisicamenteEstructura;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]." (".$registro["zonal"].") "."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==65){

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' AND b.estado='A' AND a.loginOne='1';";
			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==66){

 				$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='26' AND a.estadoUsuario='A' AND b.estado='A' AND a.loginOne='1';";
			 	$resultado = $conexionEstablecida->query($query);

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==100){

 				$query="SELECT idAreaEncargada,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreArea, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreArea FROM poa_paid_areaencargada WHERE identificador IS NULL OR identificador='$evaluador';";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Área encargada--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idAreaEncargada"]."'>".$registro["nombreArea"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==101){

 				$query="SELECT idAreaAccion,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS accion FROM poa_paid_area_accion WHERE identificador IS NULL OR identificador='$evaluador';";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Área de acción--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idAreaAccion"]."'>".$registro["accion"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==102){

 				$query="SELECT idComponentes,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreComponentes FROM poa_paid_componentes WHERE identificador='$evaluador';";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='' class='text-center'>--Componente--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idComponentes"]."'>".$registro["nombreComponentes"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==103){

 				$query="SELECT idIndicadores,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreIndicadores, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreIndicadores FROM poa_paid_indicadores WHERE identificador='$evaluador';";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='' class='text-center'>--Indicador--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idIndicadores"]."'>".$registro["nombreIndicadores"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==104){

 				$query="SELECT idAreaEncargada,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreArea, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreArea FROM poa_areaencargada WHERE identificador='$variables' OR identificador IS NULL;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Área encargada--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idAreaEncargada"]."'>".$registro["nombreArea"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==105){

 				$query="SELECT idAreaAccion,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS accion FROM poa_paid_area_accion WHERE identificador='$variables' OR identificador IS NULL;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Área de acción--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idAreaAccion"]."'>".$registro["accion"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==106){

 				$query="SELECT idItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS item FROM poa_item WHERE identificador='$variables' OR identificador IS NULL;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Ítem--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idItem"]."'>".$registro["item"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==107){

 				$query="SELECT idComponentes,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS componentes FROM poa_paid_componentes WHERE identificador='$variables' OR identificador IS NULL;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Componentes--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idComponentes"]."'>".$registro["componentes"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==108){

 				$query="SELECT idIndicadores,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreIndicadores, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreIndicadores FROM poa_paid_indicadores WHERE identificador='$variables' OR identificador IS NULL;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Indicadores--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idIndicadores"]."'>".$registro["nombreIndicadores"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==109){

 				$query="SELECT idRubros,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros WHERE identificador='$variables';";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione rubro--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idRubros"]."'>".$registro["nombreRubros"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==110){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	if ($id_rolActes!='7') {
			 		
			 		$listas.="<optgroup label='Devolver a'>";

				 	while($registro3 = $resultado3->fetch()) {


				 		$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	if ($id_rolActes!='3') {

				 	$listas.="<optgroup label='Asignar a'>";

				 	while($registro = $resultado->fetch()) {


				 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	return $listas; 

 			}else if($indicador==151){

			$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades FROM poa_poainicial AS z INNER JOIN poa_programacion_financiera AS a ON a.idActividad=z.idActividad  INNER JOIN poa_actividades AS b ON z.idActividad=b.idActividades  WHERE z.idOrganismo='$idOrganismo' AND z.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.modifica IS NULL OR a.modifica='A' OR a.modifica='E' AND z.idOrganismo='$idOrganismo' AND z.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos')  GROUP BY z.idActividad;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]."</option>";
				

			}


			return $listas; 

		}else if($indicador==152){

			$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idActividad = 2  group BY a.idActividad ;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				$listas.="<option value='".$registro["idActividades"]."'>".$registro["nombreActividades"]."</option>";
				

			}


			return $listas; 

		}else if($indicador==153){

			$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idActividad = 1 or a.idActividad = 2 or a.idActividad = 3 or a.idActividad = 4 or a.idActividad = 5 or a.idActividad = 6 or a.idActividad = 7  group BY a.idActividad ;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]."</option>";
				

			}


			return $listas; 

		}else if($indicador==200){
			
			$query="SELECT b.idPda,b.nombreEvento AS nombreEvento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento2  FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera 
			WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL OR b.modifica='E' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo') AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo'  group by b.nombreEvento asc;";

			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione evento--</option>";

			while($registro = $resultado->fetch()) {

				$listas.="<option value='".$registro["nombreEvento"]."'>".$registro["nombreEvento2"]."</option>";
				

			}


			return $listas; 

		}else if($indicador==201){
			
			$query="SELECT b.idMantenimiento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras, nombreInfras AS infrasNormal FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL  AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos') AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' group by nombreInfras asc;";
			$resultado = $conexionEstablecida->query($query);
		
			$listas="<option value='0' class='text-center'>--Seleccione infraestructura--</option>";

			while($registro = $resultado->fetch()) {

				$listas.="<option value='".$registro["infrasNormal"]."'>".$registro["nombreInfras"]."</option>";
				

			}


			return $listas; 

		}else if($indicador==202){
			
			$query="SELECT * FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera 
			WHERE  idActividad='$idActividad' and idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos'  and nombreEvento='$eventos_intervencion' group by idItem asc";
			$resultado = $conexionEstablecida->query($query);
		
			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				$idItem=$registro["idItem"];

				$query="SELECT * FROM poa_item where idItem=$idItem;";
				$resultado = $conexionEstablecida->query($query);
			
				$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";
	
				while($registro = $resultado->fetch()) {	
					$listas.="<option value='".$registro["itemPreesupuestario"]."'>".$registro["nombreItem"]."</option>";
				}
				

			}


			return $listas; 

		}else if($indicador==203){

			$query="SELECT * FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera 
			WHERE idActividad='$idActividad' and idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and nombreInfras='$eventos_intervencion' group by nombreInfras asc";
			
			$resultado = $conexionEstablecida->query($query);
		
			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				$idItem=$registro["idItem"];
				

				$query="SELECT * FROM poa_item where idItem=$idItem;";
				$resultado = $conexionEstablecida->query($query);
			
				$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";
	
				while($registro = $resultado->fetch()) {	
					$listas.="<option value='".$registro["itemPreesupuestario"]."'>".$registro["nombreItem"]."</option>";
				}
				

			}


			return $listas; 

		}else if($indicador==204){

			$query="SELECT * FROM poa_item where idItem=30;";
			
			$resultado = $conexionEstablecida->query($query);
		
			while($registro = $resultado->fetch()) {

				$listas=$registro["idItem"];

			}


			return $listas; 

		}else if($indicador==205){


			$query="SELECT * FROM poa_item where itemPreesupuestario=$idProgrmacionFinanciera1;";
			
			$resultado = $conexionEstablecida->query($query);
		
			while($registro = $resultado->fetch()) {

				$item=$registro["idItem"];

			}

			$query="SELECT count(*) as num from poa_modificacion_actividad_administra_origen  where idActividadOrigen=$origen1 and idActividadDestino=$idActividadDestino and idItem=$item ";
			//$query="SELECT count(*) as num from poa_modificacion_actividad_administra_origen  where idActividadOrigen=1 and idActividadDestino=7 and idItem=43 ";
		
			$resultado = $conexionEstablecida->query($query);
		
			while($registro = $resultado->fetch()) {

				$listas=$registro["num"];

			}




			return $listas; 

		}else if($indicador==500){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	if ($id_rolActes!='7') {
			 		
			 		$listas.="<optgroup label='Recomendar a'>";

				 	while($registro3 = $resultado3->fetch()) {


				 		$listas.="<option value='".$registro3["id_usuario"]."' attr='superior'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	if ($id_rolActes!='3') {

				 	$listas.="<optgroup label='Devolver a'>";

				 	while($registro = $resultado->fetch()) {


				 		$listas.="<option value='".$registro["id_usuario"]."' attr='no__superior'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	return $listas; 

 			}else if($indicador==501){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional  WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	$listas.="<optgroup label='Recomendar a'>";

				while($registro3 = $resultado3->fetch()) {

					$listas.="<option value='".$registro3["id_usuario"]."' attr='superior'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				}

				 $listas.="</optgroup>";

				 $listas.="<optgroup label='Devolver a'>";

				 while($registro = $resultado->fetch()) {


				 	$listas.="<option value='".$registro["id_usuario"]."' attr='no__superior'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 }

				 $listas.="</optgroup>";

			 	return $listas; 

 			}else if($indicador==502){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.idUsuario FROM poa_paid_reasignacion_seguimiento AS a INNER JOIN th_usuario_roles AS b ON a.idUsuario=b.id_usuario WHERE a.idOrganismo='$idOrganismoPaid' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.id_rol='7' ORDER BY a.idAsignacion DESC LIMIT 1;";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idUsuario__r=$registro2["idUsuario"];

			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional  WHERE a.id_usuario='$idUsuario__r' ORDER BY a.id_usuario DESC LIMIT 1;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' AND b.id_rol='2' AND a.fisicamenteEstructura='18' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	$listas.="<optgroup label='Devolver a'>";

				while($registro3 = $resultado3->fetch()) {

					$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				}

				 $listas.="</optgroup>";

				 $listas.="<optgroup label='Recomendar a'>";

				 while($registro = $resultado->fetch()) {


				 	$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 }

				 $listas.="</optgroup>";

			 	return $listas; 

 			}else if($indicador==510){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	if ($id_rolActes!='7') {
			 		
			 		$listas.="<optgroup label='Devoler a'>";

				 	while($registro3 = $resultado3->fetch()) {


				 		$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	if ($id_rolActes!='3') {

				 	$listas.="<optgroup label='Recomendar a'>";

				 	while($registro = $resultado->fetch()) {


				 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	return $listas; 

 			}else if($indicador==511){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	if ($id_rolActes!='7') {
			 		
			 		$listas.="<optgroup label='Devolver a'>";

				 	while($registro3 = $resultado3->fetch()) {


				 		$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	if ($id_rolActes!='3') {

				 	$listas.="<optgroup label='Recomendar a'>";

				 	while($registro = $resultado->fetch()) {


				 		$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 	}

				 	$listas.="</optgroup>";

			 	}

			 	return $listas; 

 			}else if($indicador==512){

 				$conexionEstablecida->exec("set names utf8");

 				$query="SELECT idTipoOrganismo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_tipo_organismo ;";
					$resultado = $conexionEstablecida->query($query);
			 

			 	$listas="<option value='0' class='text-center'>--Tipo organismo--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idTipoOrganismo"]."'>".$registro["nombreTipo"]."</option>";
				

				}


			 	return $listas; 

 			}else if($indicador==513){

				$query="SELECT idRDinamico,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreDinamico, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreDinamico FROM poa_paid_rubros_dinamicos ;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Matriz--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idRDinamico"]."'>".$registro["nombreDinamico"]."</option>";
				

				}

				return $listas; 

			}else if($indicador==1000){

				$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividades FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismoPrincipal' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Elegir una actividad--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idActividades"]."'>".$registro["actividades"]."</option>";
				

				}

				return $listas; 

			}else if($indicador==1001){

				$query="SELECT a.idProgramacionFinanciera,c.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividad,b.itemPreesupuestario,b.idItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS item,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_actividades AS c ON c.idActividades=a.idActividad WHERE a.idOrganismo='$idOrganismoPrincipal' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' GROUP BY a.idItem;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Elegir un Ítem--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idItem"]."' itemPresupuestario='".$registro["itemPreesupuestario"]."' nombreItem='".$registro["item"]."' nombreActividades='".$registro["actividad"]."' montoTotal='".$registro["totalTotales"]."' idProgramacionFinanciera='".$registro["idProgramacionFinanciera"]."'>".$registro["item"]."</option>";
				

				}

				return $listas; 

			}else if($indicador==1002){

 				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	$listas.="<optgroup label='Devolver a'>";

				 while($registro3 = $resultado3->fetch()) {


				 	$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				 }

				 $listas.="</optgroup>";


				 $listas.="<optgroup label='Asignar a'>";

				 while($registro = $resultado->fetch()) {


				 	$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 }

				 $listas.="</optgroup>";

			 	return $listas; 

 			}else if($indicador==1003){

 				$conexionEstablecida->exec("set names utf8");


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A';";

			 	$resultado = $conexionEstablecida->query($query);


 				$query2="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A';";

			 	$resultado2 = $conexionEstablecida->query($query2);


			 	$listas="<option value=''>--Seleccione--</option>";

			 	$listas.="<optgroup label='Devolver a'>";

				 while($registro = $resultado->fetch()) {


				 	$listas.="<option value='".$registro["id_usuario"]."' attr='devolver'>".utf8_decode(utf8_encode($registro["nombreCompleto"]))."</option>";
				 	

				 }

				 $listas.="</optgroup>";


				 $listas.="<optgroup label='Asignar a'>";

				 while($registro2 = $resultado2->fetch()) {


				 	$listas.="<option value='".$registro2["id_usuario"]."' attr='asignar'>".utf8_decode(utf8_encode($registro2["nombreCompleto"]))." </option>";
				 	

				 }

				 $listas.="</optgroup>";

			 	return $listas; 

 			}else if($indicador==1004){

 				$conexionEstablecida->exec("set names utf8");

				$conexionEstablecida->exec("set names utf8");

 				$query2="SELECT a.PersonaACargo,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';";
			 	$resultado2 = $conexionEstablecida->query($query2);

			 	while($registro2 = $resultado2->fetch()) {

			 		$idBuscadorDic=$registro2["PersonaACargo"];
			 		$id_rolActes=$registro2["id_rol"];
			 	
			 	}

			 	$query3="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT_WS(' ',a.nombre,a.apellido), 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol  WHERE a.id_usuario='$idBuscadorDic'  ORDER BY c.id_Zonal;";

			 	$resultado3 = $conexionEstablecida->query($query3);


 				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, CONCAT_WS('-',c.descripcionZonal,d.nombre) AS descripcionZonal,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal INNER JOIN th_roles AS d ON d.id_rol=b.id_rol INNER JOIN th_puestoinstitucional AS e ON e.id_PuestoInstitucional=a.puestoInstitucional WHERE a.estadoUsuario='A' AND a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario' OR a.PersonaACargo='$idUsuario' OR a.PersonaACargo2='$idUsuario'  AND a.estadoUsuario='A' ORDER BY c.id_Zonal;";

			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value=''>--Seleccione--</option>";

			 	$listas.="<optgroup label='Recomendar a'>";

				 while($registro3 = $resultado3->fetch()) {


				 	$listas.="<option value='".$registro3["id_usuario"]."'>".utf8_decode(utf8_encode($registro3["nombreCompleto"])." (".utf8_encode($registro3["descripcionZonal"])).")"."</option>";
				 	

				 }

				 $listas.="</optgroup>";


				 $listas.="<optgroup label='Devolver a'>";

				 while($registro = $resultado->fetch()) {


				 	$listas.="<option value='".$registro["id_usuario"]."'>".utf8_decode(utf8_encode($registro["nombreCompleto"])." (".utf8_encode($registro["descripcionZonal"])).")"."</option>";
				 	

				 }

				 $listas.="</optgroup>";

			 	return $listas; 
 
 			}else if($indicador==1005){

				$query="SELECT a.id_usuario,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A';";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Devolver a--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombreCompleto"]."</option>";
				

				}

				return $listas; 

			}else if($indicador==1006){

				$query="SELECT idRubros,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros WHERE identificador='$evaluador';";
				$resultado = $conexionEstablecida->query($query);

				$listas="";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idRubros"]."'>".$registro["nombreRubros"]."</option>";
				

				}

				return $listas; 


			}else if($indicador==1007){

				$query="SELECT idRubros,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros WHERE identificador='$evaluador';";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione un rubro--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idRubros"]."'>".$registro["nombreRubros"]."</option>";
				

				}

				return $listas; 


			}else if($indicador==1010){

				$data1=array();
							
				$queryBloqueos="SELECT idItemDestino FROM poa_item_actividad_bloqueo WHERE idActividadOrigen='$actividadOrigenes' AND idActividadDestino='$actividadDestinos';";
				$resultadoBloqueos = $conexionEstablecida->query($queryBloqueos);


				while($registroBloqueos = $resultadoBloqueos->fetch()) {
					
					array_push($data1, $registroBloqueos["idItemDestino"]);

				}


				if (count($data1)==0) {
					$cadena=0;
				}else{
					$cadena = implode(",", $data1);
				}



				$query="SELECT a.idProgramacionFinanciera, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=a.idItem INNER JOIN poa_actividades AS d ON d.idActividades=a.idActividad INNER JOIN poa_item_actividad AS l ON (l.idItem=c.idItem AND l.idActividad=d.idActividades) WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.nombreInfras='$nombreInfras' AND a.idItem NOT IN($cadena)  GROUP BY a.idItem;";
				$resultado = $conexionEstablecida->query($query);


				$listas="<option value='0' class='text-center'>--Seleccione un ítem--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idProgramacionFinanciera"]."'>".$registro["nombreItem"]."</option>";
				

				}

				return $listas; 


			}else if($indicador==1011){

				$data1=array();
							
				$queryBloqueos="SELECT idItemDestino FROM poa_item_actividad_bloqueo WHERE idActividadOrigen='$actividadOrigenes' AND idActividadDestino='$actividadDestinos';";
				$resultadoBloqueos = $conexionEstablecida->query($queryBloqueos);


				while($registroBloqueos = $resultadoBloqueos->fetch()) {
					
					array_push($data1, $registroBloqueos["idItemDestino"]);

				}


				if (count($data1)==0) {
					$cadena=0;
				}else{
					$cadena = implode(",", $data1);
				}

				$query="SELECT a.idProgramacionFinanciera, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=a.idItem INNER JOIN poa_actividades AS d ON d.idActividades=a.idActividad INNER JOIN poa_item_actividad AS l ON (l.idItem=c.idItem AND l.idActividad=d.idActividades) WHERE a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.nombreEvento='$nombreInfras' AND a.idItem NOT IN($cadena)  GROUP BY a.idItem;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione un ítem--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idProgramacionFinanciera"]."'>".$registro["nombreItem"]."</option>";
				

				}

				return $listas; 


			}else if($indicador==1012){

				$query="SELECT a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<table><thead><tr><th>Mes</th><th>Monto</th><th>Monto<br>-<br>Modificación</th><th>Modificación</th></tr></thead><tbody>";

				$sumaTotal=0;

				while($registro = $resultado->fetch()) {

					if (floatval($registro["enero"])<=0) {
						$listas.="<tr><td align='center'>Enero</td><td align='center'>".round($registro["enero"],2)."</td><td align='center'>".round($registro["enero"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Enero</td><td align='center'><input type='text' id='eneroItemMesInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["enero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='eneroItemMesOrigenDisminucion' value='".round($registro["enero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='eneroItemMes' value='0' style='widdth:100%!important;' attr='enero'/></td></tr>";
						$sumaTotal=floatval($registro["enero"])+$sumaTotal;
					}

					if (floatval($registro["febrero"])<=0) {
						$listas.="<tr><td align='center'>Febrero</td><td align='center'>".round($registro["febrero"],2)."</td><td align='center'>".round($registro["febrero"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Febrero</td><td align='center'><input type='text' id='febreroItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["febrero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='febreroItemMesOrigenDisminucion' value='".round($registro["febrero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='febreroItemMes' value='0' style='widdth:100%!important;' attr='febrero'/></td></tr>";
						$sumaTotal=floatval($registro["febrero"])+$sumaTotal;
					}

					if (floatval($registro["marzo"])<=0) {
						$listas.="<tr><td align='center'>Marzo</td><td align='center'>".round($registro["marzo"],2)."</td><td align='center'>".round($registro["marzo"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Marzo</td><td align='center'><input type='text' id='marzoItemMesInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["marzo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='marzoItemMesOrigenDisminucion' value='".round($registro["marzo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='marzoItemMes' value='0' style='widdth:100%!important;' attr='marzo'/></td></tr>";
						$sumaTotal=floatval($registro["marzo"])+$sumaTotal;
					}


					if (floatval($registro["abril"])<=0) {
						$listas.="<tr><td align='center'>Abril</td><td align='center'>".round($registro["abril"],2)."</td><td align='center'>".round($registro["abril"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Abril</td><td align='center'><input type='text' id='abrilItemMesInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["abril"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='abrilItemMesOrigenDisminucion' value='".round($registro["abril"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='abrilItemMes' value='0' style='widdth:100%!important;'  attr='abril'/></td></tr>";
						$sumaTotal=floatval($registro["abril"])+$sumaTotal;
					}


					if (floatval($registro["mayo"])<=0) {
						$listas.="<tr><td align='center'>Mayo</td><td align='center'>".round($registro["mayo"],2)."</td><td align='center'>".round($registro["mayo"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Mayo</td><td align='center'><input type='text' id='mayoItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["mayo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='mayoItemMesOrigenDisminucion' value='".round($registro["mayo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='mayoItemMes' value='0' style='widdth:100%!important;' attr='mayo'/></td></tr>";
						$sumaTotal=floatval($registro["mayo"])+$sumaTotal;
					}

					if (floatval($registro["junio"])<=0) {
						$listas.="<tr><td align='center'>Junio</td><td align='center'>".round($registro["junio"],2)."</td><td align='center'>".round($registro["junio"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Junio</td><td align='center'><input type='text' id='junioItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["junio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='junioItemMesOrigenDisminucion' value='".round($registro["junio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='junioItemMes' value='0' style='widdth:100%!important;' attr='junio'/></td></tr>";
						$sumaTotal=floatval($registro["junio"])+$sumaTotal;
					}

					if (floatval($registro["julio"])<=0) {
						$listas.="<tr><td align='center'>Julio</td><td align='center'>".round($registro["julio"],2)."</td><td align='center'>".round($registro["julio"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Julio</td><td align='center'><input type='text' id='julioItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["julio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='julioItemMesOrigenDisminucion' value='".round($registro["julio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='julioItemMes' value='0' style='widdth:100%!important;' attr='julio'/></td></tr>";
						$sumaTotal=floatval($registro["julio"])+$sumaTotal;
					}


					if (floatval($registro["agosto"])<=0) {
						$listas.="<tr><td align='center'>Agosto</td><td align='center'>".round($registro["agosto"],2)."</td><td align='center'>".round($registro["agosto"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Agosto</td><td align='center'><input type='text' id='agostoItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["agosto"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='agostoItemMesOrigenDisminucion' value='".round($registro["agosto"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='agostoItemMes' value='0' style='widdth:100%!important;' attr='agosto'/></td></tr>";
						$sumaTotal=floatval($registro["agosto"])+$sumaTotal;
					}

					if (floatval($registro["septiembre"])<=0) {
						$listas.="<tr><td align='center'>Septiembre</td><td align='center'>".round($registro["septiembre"],2)."</td><td align='center'>".round($registro["septiembre"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Septiembre</td><td align='center'><input type='text' id='septiembreItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["septiembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='septiembreItemMesOrigenDisminucion' value='".round($registro["septiembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='septiembreItemMes' value='0' style='widdth:100%!important;' attr='septiembre'/></td></tr>";
						$sumaTotal=floatval($registro["septiembre"])+$sumaTotal;
					}


					if (floatval($registro["octubre"])<=0) {
						$listas.="<tr><td align='center'>Octubre</td><td align='center'>".round($registro["octubre"],2)."</td><td align='center'>".round($registro["octubre"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Octubre</td><td align='center'><input type='text' id='octubreItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["octubre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='octubreItemMesOrigenDisminucion' value='".round($registro["octubre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='octubreItemMes' value='0' style='widdth:100%!important;' attr='octubre'/></td></tr>";
						$sumaTotal=floatval($registro["octubre"])+$sumaTotal;
					}

					if (floatval($registro["noviembre"])<=0) {
						$listas.="<tr><td align='center'>Noviembre</td><td align='center'>".round($registro["noviembre"],2)."</td><td align='center'>".round($registro["noviembre"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Noviembre</td><td align='center'><input type='text' id='noviembreItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["noviembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='noviembreItemMesOrigenDisminucion' value='".round($registro["noviembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='noviembreItemMes' value='0' style='widdth:100%!important;' attr='noviembre'/></td></tr>";
						$sumaTotal=floatval($registro["noviembre"])+$sumaTotal;
					}

					if (floatval($registro["diciembre"])<=0) {
						$listas.="<tr><td align='center'>Diciembre</td><td align='center'>".round($registro["diciembre"],2)."</td><td align='center'>".round($registro["diciembre"],2)."</td></tr>";
					}else{
						$listas.="<tr><td align='center'>Diciembre</td><td align='center'><input type='text' id='diciembreItemMesInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["diciembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='diciembreItemMesOrigenDisminucion' value='".round($registro["diciembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos cambio__de__numero__f' id='diciembreItemMes' value='0' style='widdth:100%!important;' attr='diciembre' /></td></tr>";
						$sumaTotal=floatval($registro["diciembre"])+$sumaTotal;
					}

					

				}



				$listas.="<tr><td align='center'>Total</td><td align='center'>".number_format($sumaTotal,2)."</td><td></td><td align='center'><input type='text' class='cambio__de__numero__f' id='totalMesAsignados' name='totalMesAsignados' value='0' style='widdth:100%!important; border:none!important;text-align:center;' readonly='readonly'/></td></tr>";

				$listas.="</tbody></table>";

				$listas.='
				<script>

					$.getScript("layout/scripts/js/validacionBasica.js",function(){

						$(".oculto__tabla__destino").show();

						funcion__solo__numero__montos($(".solo__numero__montos"));
						funcion__cambio__de__numero($(".cambio__de__numero__f"));

						var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

							$(parametro1).on("input", function () {

								if($(this).attr("attr")=="enero"){
									$("#eneroOrigen").val($(this).val());
								}else if($(this).attr("attr")=="febrero"){
									$("#febreroOrigen").val($(this).val());
								}else if($(this).attr("attr")=="marzo"){
									$("#marzoOrigen").val($(this).val());
								}else if($(this).attr("attr")=="abril"){
									$("#abrilOrigen").val($(this).val());
								}else if($(this).attr("attr")=="mayo"){
									$("#mayoOrigen").val($(this).val());
								}else if($(this).attr("attr")=="junio"){
									$("#junioOrigen").val($(this).val());
								}else if($(this).attr("attr")=="julio"){
									$("#julioOrigen").val($(this).val());
								}else if($(this).attr("attr")=="agosto"){
									$("#agostoOrigen").val($(this).val());
								}else if($(this).attr("attr")=="septiembre"){
									$("#septiembreOrigen").val($(this).val());
								}else if($(this).attr("attr")=="octubre"){
									$("#octubreOrigen").val($(this).val());
								}else if($(this).attr("attr")=="noviembre"){
									$("#noviembreOrigen").val($(this).val());
								}else if($(this).attr("attr")=="diciembre"){
									$("#diciembreOrigen").val($(this).val());
								}

								var sum = 0;
								$(parametro1).each(function(){
								    sum += parseFloat($(this).val());
								});
								$(parametro2).val(sum.toFixed(2));
								$("#totalOrigen").val(sum.toFixed(2));

							});

						}
						sumarIndicadoresGlobal__principal($(".solo__numero__montos"),$("#totalMesAsignados"));

					});

						var validador__monto__superior=function(parametro1,parametro2,parametro3,parametro4){

							$(parametro1).on("input", function () {

								let resta=0;

								if(parseFloat($(this).val())>parseFloat($(parametro2).val())){

									alertify.set("notifier", "position", "top-center");
									alertify.notify("Valor supera al monto del mes", "error", 5, function () { });
									$(this).val(0);
									$(parametro3).val($(parametro2).val());
								}else{

									resta=parseFloat($(parametro2).val()) - parseFloat($(this).val());

									$(parametro3).val(resta);
									$(parametro4).val(resta);

								}

							});

						}
						validador__monto__superior($("#eneroItemMes"),$("#eneroItemMesInicial"),$("#eneroItemMesOrigenDisminucion"),$("#eneroOrigen__restando"));
						validador__monto__superior($("#febreroItemMes"),$("#febreroItemMesInicial"),$("#febreroItemMesOrigenDisminucion"),$("#febreroOrigen__restando"));
						validador__monto__superior($("#marzoItemMes"),$("#marzoItemMesInicial"),$("#marzoItemMesOrigenDisminucion"),$("#marzoOrigen__restando"));
						validador__monto__superior($("#abrilItemMes"),$("#abrilItemMesInicial"),$("#abrilItemMesOrigenDisminucion"),$("#abrilOrigen__restando"));
						validador__monto__superior($("#mayoItemMes"),$("#mayoItemMesInicial"),$("#mayoItemMesOrigenDisminucion"),$("#mayoOrigen__restando"));
						validador__monto__superior($("#junioItemMes"),$("#junioItemMesInicial"),$("#junioItemMesOrigenDisminucion"),$("#junioOrigen__restando"));
						validador__monto__superior($("#julioItemMes"),$("#julioItemMesInicial"),$("#julioItemMesOrigenDisminucion"),$("#julioOrigen__restando"));
						validador__monto__superior($("#agostoItemMes"),$("#agostoItemMesInicial"),$("#agostoItemMesOrigenDisminucion"),$("#agostoOrigen__restando"));
						validador__monto__superior($("#septiembreItemMes"),$("#septiembreItemMesInicial"),$("#septiembreItemMesOrigenDisminucion"),$("#septiembreOrigen__restando"));
						validador__monto__superior($("#octubreItemMes"),$("#octubreItemMesInicial"),$("#octubreItemMesOrigenDisminucion"),$("#octubreOrigen__restando"));
						validador__monto__superior($("#noviembreItemMes"),$("#noviembreItemMesInicial"),$("#noviembreItemMesOrigenDisminucion"),$("#noviembreOrigen__restando"));
						validador__monto__superior($("#diciembreItemMes"),$("#diciembreItemMesInicial"),$("#diciembreItemMesOrigenDisminucion"),$("#diciembreOrigen__restando"));

				</script>';

				return $listas; 


			}else if($indicador==1014){

			$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo WHERE a.idActividad='1' OR a.idActividad='2' OR a.idActividad='3' OR a.idActividad='5' OR a.idActividad='6' OR a.idActividad='7' OR a.idActividad='4' GROUP BY a.idActividad;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]."</option>";
				

			}


			return $listas; 

		}else if($indicador==1016){

			$querySe="SELECT a.modifica FROM poa_programacion_financiera AS a WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
			$resultadoSe = $conexionEstablecida->query($querySe);

			while($registroSe = $resultadoSe->fetch()) {

				$modificaExe=$registroSe["modifica"];

			}

			if ($idActividad==1 && $modificaExe=="E") {
				$query="SELECT a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
			}else{
				$query="SELECT a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
			}

			$resultado = $conexionEstablecida->query($query);

	
			$listas="<option value='0' class='text-center'>--Seleccione el mes que desea asignar el valor--</option>";

	
			date_default_timezone_set("America/Guayaquil");
			$mes__actual = date('m');

			$mesEntero=intval($mes__actual);


			$listas="<table><thead><tr><th>Mes</th><th>Monto</th><th>Monto<br>+<br>Modificación</th><th>Modificación</th></tr></thead><tbody>";

			$sumaTotal=0;

			while($registro = $resultado->fetch()) {

				if ($mesEntero==2) {
					$listas.="<tr><td align='center'>Enero</td><td align='center'><input type='text' id='eneroItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["enero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='eneroItemMesDestinoSuma' value='".round($registro["enero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='eneroItemMesDestino' value='0' style='widdth:100%!important;' attr='enero'/></td></tr>";
					$sumaTotal=floatval($registro["enero"])+$sumaTotal;
				}else{
					$listas.="<tr style='display:none!important;'><td align='center'>Enero</td><td align='center'><input type='text' id='eneroItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["enero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='eneroItemMesDestinoSuma' value='".round($registro["enero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='eneroItemMesDestino' value='0' style='widdth:100%!important;' attr='enero'/></td></tr>";
					$sumaTotal=floatval($registro["enero"])+$sumaTotal;
					$listas.='
						<script>

							$("#eneroDestino__sumando").val($("#eneroItemMesDestinoSuma").val());

						</script>';


				}

				
				if ($mesEntero==2 || $mesEntero==3 || 6==6) {

					$listas.="<tr><td align='center'>Febrero</td><td align='center'><input type='text' id='febreroItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["febrero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='febreroItemMesDestinoSuma' value='".round($registro["febrero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='febreroItemMesDestino' value='0' style='widdth:100%!important;' attr='febrero'/></td></tr>";
					$sumaTotal=floatval($registro["febrero"])+$sumaTotal;
				}else{


					$listas.="<tr style='display:none;'><td align='center'>Febrero</td><td align='center'><input type='text' id='febreroItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["febrero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='febreroItemMesDestinoSuma' value='".round($registro["febrero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='febreroItemMesDestino' value='0' style='widdth:100%!important;' attr='febrero'/></td></tr>";
					$sumaTotal=floatval($registro["febrero"])+$sumaTotal;

					$listas.='
						<script>

							$("#febreroDestino__sumando").val($("#febreroItemMesDestinoSuma").val());

						</script>';


				}

				
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || 6==6) {

					$listas.="<tr><td align='center'>Marzo</td><td align='center'><input type='text' id='marzoItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["marzo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='marzoItemMesDestinoSuma' value='".round($registro["marzo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='marzoItemMesDestino' value='0' style='widdth:100%!important;' attr='marzo'/></td></tr>";
					$sumaTotal=floatval($registro["marzo"])+$sumaTotal;

				}else{

					$listas.="<tr style='display:none;'><td align='center'>Marzo</td><td align='center'><input type='text' id='marzoItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["marzo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='marzoItemMesDestinoSuma' value='".round($registro["marzo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='marzoItemMesDestino' value='0' style='widdth:100%!important;' attr='marzo'/></td></tr>";
					$sumaTotal=floatval($registro["marzo"])+$sumaTotal;


					$listas.='
						<script>

							$("#marzoDestino__sumando").val($("#marzoItemMesDestinoSuma").val());

						</script>';

				}


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || 6==6) {

					$listas.="<tr><td align='center'>Abril</td><td align='center'><input type='text' id='abrilItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["abril"],2)."'readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='abrilItemMesDestinoSuma' value='".round($registro["abril"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='abrilItemMesDestino' value='0' style='widdth:100%!important;'  attr='abril'/></td></tr>";
					$sumaTotal=floatval($registro["abril"])+$sumaTotal;

				}else{


					$listas.="<tr style='display:none;'><td align='center'>Abril</td><td align='center'><input type='text' id='abrilItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["abril"],2)."'readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='abrilItemMesDestinoSuma' value='".round($registro["abril"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='abrilItemMesDestino' value='0' style='widdth:100%!important;'  attr='abril'/></td></tr>";
					$sumaTotal=floatval($registro["abril"])+$sumaTotal;

					$listas.='
						<script>

							$("#abrilDestino__sumando").val($("#abrilItemMesDestinoSuma").val());

						</script>';


				}


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || 6==6) {

					$listas.="<tr><td align='center'>Mayo</td><td align='center'><input type='text' id='mayoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["mayo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='mayoItemMesDestinoSuma' value='".round($registro["mayo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='mayoItemMesDestino' value='0' style='widdth:100%!important;' attr='mayo'/></td></tr>";
					$sumaTotal=floatval($registro["mayo"])+$sumaTotal;

				}else{


					$listas.="<tr style='display:none;'><td align='center'>Mayo</td><td align='center'><input type='text' id='mayoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["mayo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='mayoItemMesDestinoSuma' value='".round($registro["mayo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='mayoItemMesDestino' value='0' style='widdth:100%!important;' attr='mayo'/></td></tr>";
					$sumaTotal=floatval($registro["mayo"])+$sumaTotal;

					$listas.='
						<script>

							$("#mayoDestino__sumando").val($("#mayoItemMesDestinoSuma").val());

						</script>';



				}


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || 6==6) {

					$listas.="<tr><td align='center'>Junio</td><td align='center'><input type='text' id='junioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["junio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='junioItemMesDestinoSuma' value='".round($registro["junio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='junioItemMesDestino' value='0' style='widdth:100%!important;' attr='junio'/></td></tr>";
					$sumaTotal=floatval($registro["junio"])+$sumaTotal;

				}else{

					$listas.="<tr style='display:none;'><td align='center'>Junio</td><td align='center'><input type='text' id='junioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["junio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='junioItemMesDestinoSuma' value='".round($registro["junio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='junioItemMesDestino' value='0' style='widdth:100%!important;' attr='junio'/></td></tr>";
					$sumaTotal=floatval($registro["junio"])+$sumaTotal;

					$listas.='
						<script>

							$("#junioDestino__sumando").val($("#junioItemMesDestinoSuma").val());

						</script>';

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7) {

					$listas.="<tr><td align='center'>Julio</td><td align='center'><input type='text' id='julioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["julio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='julioItemMesDestinoSuma' value='".round($registro["julio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='julioItemMesDestino' value='0' style='widdth:100%!important;' attr='julio'/></td></tr>";
					$sumaTotal=floatval($registro["julio"])+$sumaTotal;

				}else{

					$listas.="<tr style='display:none;'><td align='center'>Julio</td><td align='center'><input type='text' id='julioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["julio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='julioItemMesDestinoSuma' value='".round($registro["julio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='julioItemMesDestino' value='0' style='widdth:100%!important;' attr='julio'/></td></tr>";
					$sumaTotal=floatval($registro["julio"])+$sumaTotal;

					$listas.='
						<script>

							$("#julioDestino__sumando").val($("#julioItemMesDestinoSuma").val());

						</script>';

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8) {

					$listas.="<tr><td align='center'>Agosto</td><td align='center'><input type='text' id='agostoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["agosto"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='agostoItemMesDestinoSuma' value='".round($registro["agosto"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='agostoItemMesDestino' value='0' style='widdth:100%!important;' attr='agosto'/></td></tr>";
					$sumaTotal=floatval($registro["agosto"])+$sumaTotal;

				}else{

					$listas.="<tr style='display:none;'><td align='center'>Agosto</td><td align='center'><input type='text' id='agostoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["agosto"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='agostoItemMesDestinoSuma' value='".round($registro["agosto"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='agostoItemMesDestino' value='0' style='widdth:100%!important;' attr='agosto'/></td></tr>";
					$sumaTotal=floatval($registro["agosto"])+$sumaTotal;

					$listas.='
						<script>

							$("#agostoDestino__sumando").val($("#agostoItemMesDestinoSuma").val());

						</script>';


				}


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9) {

					$listas.="<tr><td align='center'>Septiembre</td><td align='center'><input type='text' id='septiembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["septiembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='septiembreItemMesDestinoSuma' value='".round($registro["septiembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='septiembreItemMesDestino' value='0' style='widdth:100%!important;' attr='septiembre'/></td></tr>";
					$sumaTotal=floatval($registro["septiembre"])+$sumaTotal;

				}else{

					$listas.="<tr style='display:none;'><td align='center'>Septiembre</td><td align='center'><input type='text' id='septiembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["septiembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='septiembreItemMesDestinoSuma' value='".round($registro["septiembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='septiembreItemMesDestino' value='0' style='widdth:100%!important;' attr='septiembre'/></td></tr>";
					$sumaTotal=floatval($registro["septiembre"])+$sumaTotal;					

					$listas.='
						<script>

							$("#septiembreDestino__sumando").val($("#septiembreItemMesDestinoSuma").val());

						</script>';


				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10) {

					$listas.="<tr><td align='center'>Octubre</td><td align='center'><input type='text' id='octubreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["octubre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='octubreItemMesDestinoSuma' value='".round($registro["octubre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='octubreItemMesDestino' value='0' style='widdth:100%!important;' attr='octubre'/></td></tr>";
					$sumaTotal=floatval($registro["octubre"])+$sumaTotal;

				}else{

					$listas.="<tr style='display:none;'><td align='center'>Octubre</td><td align='center'><input type='text' id='octubreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["octubre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='octubreItemMesDestinoSuma' value='".round($registro["octubre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='octubreItemMesDestino' value='0' style='widdth:100%!important;' attr='octubre'/></td></tr>";
					$sumaTotal=floatval($registro["octubre"])+$sumaTotal;

					$listas.='
						<script>

							$("#octubreDestino__sumando").val($("#octubreItemMesDestinoSuma").val());

						</script>';


				}
				
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11) {

					$listas.="<tr><td align='center'>Noviembre</td><td align='center'><input type='text' id='noviembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["noviembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='noviembreItemMesDestinoSuma' value='".round($registro["noviembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='noviembreItemMesDestino' value='0' style='widdth:100%!important;' attr='noviembre'/></td></tr>";
					$sumaTotal=floatval($registro["noviembre"])+$sumaTotal;

				}else{


					$listas.="<tr style='display:none;'><td align='center'>Noviembre</td><td align='center'><input type='text' id='noviembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["noviembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='noviembreItemMesDestinoSuma' value='".round($registro["noviembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='noviembreItemMesDestino' value='0' style='widdth:100%!important;' attr='noviembre'/></td></tr>";
					$sumaTotal=floatval($registro["noviembre"])+$sumaTotal;

					$listas.='
						<script>

							$("#noviembreDestino__sumando").val($("#noviembreItemMesDestinoSuma").val());

						</script>';


				}
					
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Diciembre</td><td align='center'><input type='text' id='diciembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["diciembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='diciembreItemMesDestinoSuma' value='".round($registro["diciembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='diciembreItemMesDestino' value='0' style='widdth:100%!important;' attr='diciembre' /></td></tr>";
					$sumaTotal=floatval($registro["diciembre"])+$sumaTotal;

				}else{

					$listas.="<tr><td align='center'>Diciembre</td><td align='center'><input type='text' id='diciembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["diciembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='diciembreItemMesDestinoSuma' value='".round($registro["diciembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='diciembreItemMesDestino' value='0' style='widdth:100%!important;' attr='diciembre' /></td></tr>";
					$sumaTotal=floatval($registro["diciembre"])+$sumaTotal;					


					$listas.='
						<script>

							$("#diciembreDestino__sumando").val($("#diciembreItemMesDestinoSuma").val());

						</script>';
					
				}

			}

			$listas.="<tr><td align='center'>Total</td><td align='center'>".number_format($sumaTotal,2)."</td><td></td><td align='center'><input type='text' class='cambio__de__numero__f__destino' id='totalMesAsignados__destinos' name='totalMesAsignados__destinos' value='0' style='widdth:100%!important; border:none!important;text-align:center;' readonly='readonly'/></td></tr>";

			$listas.="</tbody></table>";

			$listas.='
				<script>

					$.getScript("layout/scripts/js/validacionBasica.js",function(){

						$(".oculto__tabla__destino").show();

						funcion__solo__numero__montos($(".solo__numero__montos__destino"));
						funcion__cambio__de__numero($(".cambio__de__numero__f__destino"));

						var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

							$(parametro1).on("input", function () {

								if($(this).attr("attr")=="enero"){
									$("#eneroDestino").val($(this).val());
								}else if($(this).attr("attr")=="febrero"){
									$("#febreroDestino").val($(this).val());
								}else if($(this).attr("attr")=="marzo"){
									$("#marzoDestino").val($(this).val());
								}else if($(this).attr("attr")=="abril"){
									$("#abrilDestino").val($(this).val());
								}else if($(this).attr("attr")=="mayo"){
									$("#mayoDestino").val($(this).val());
								}else if($(this).attr("attr")=="junio"){
									$("#junioDestino").val($(this).val());
								}else if($(this).attr("attr")=="julio"){
									$("#julioDestino").val($(this).val());
								}else if($(this).attr("attr")=="agosto"){
									$("#agostoDestino").val($(this).val());
								}else if($(this).attr("attr")=="septiembre"){
									$("#septiembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="octubre"){
									$("#octubreDestino").val($(this).val());
								}else if($(this).attr("attr")=="noviembre"){
									$("#noviembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="diciembre"){
									$("#diciembreDestino").val($(this).val());
								}

								var sum = 0;
								$(parametro1).each(function(){
								    sum += parseFloat($(this).val());
								});
								$(parametro2).val(sum.toFixed(2));
								$("#totalDestino").val(sum.toFixed(2));

							});

						}
						sumarIndicadoresGlobal__principal($(".solo__numero__montos__destino"),$("#totalMesAsignados__destinos"));

					});

						var validador__monto__superior=function(parametro1,parametro2,parametro3,parametro4,parametro5){

							$(parametro1).on("input", function () {

								var sum2=0;

								$(".solo__numero__montos__destino").each(function(){
								    sum2 += parseFloat($(this).val());
								});

								let resta=0;

								if(parseFloat($(this).val())>parseFloat($(parametro2).val()) || parseFloat(sum2)>parseFloat($(parametro2).val())){

									alertify.set("notifier", "position", "top-center");
									alertify.notify("Valor supera al monto total asignado del orígen", "error", 5, function () { });
									$(this).val(0);
									$(parametro3).val($(parametro4).val());
								}else{

									resta=parseFloat($(this).val()) + parseFloat($(parametro4).val());

									$(parametro3).val(resta);
									$(parametro5).val(resta);

								}

							});

						}
						validador__monto__superior($("#eneroItemMesDestino"),$("#totalOrigen"),$("#eneroItemMesDestinoSuma"),$("#eneroItemMesDestinoInicial"),$("#eneroDestino__sumando"));
						validador__monto__superior($("#febreroItemMesDestino"),$("#totalOrigen"),$("#febreroItemMesDestinoSuma"),$("#febreroItemMesDestinoInicial"),$("#febreroDestino__sumando"));
						validador__monto__superior($("#marzoItemMesDestino"),$("#totalOrigen"),$("#marzoItemMesDestinoSuma"),$("#marzoItemMesDestinoInicial"),$("#marzoDestino__sumando"));
						validador__monto__superior($("#abrilItemMesDestino"),$("#totalOrigen"),$("#abrilItemMesDestinoSuma"),$("#abrilItemMesDestinoInicial"),$("#abrilDestino__sumando"));
						validador__monto__superior($("#mayoItemMesDestino"),$("#totalOrigen"),$("#mayoItemMesDestinoSuma"),$("#mayoItemMesDestinoInicial"),$("#mayoDestino__sumando"));
						validador__monto__superior($("#junioItemMesDestino"),$("#totalOrigen"),$("#junioItemMesDestinoSuma"),$("#junioItemMesDestinoInicial"),$("#junioDestino__sumando"));
						validador__monto__superior($("#julioItemMesDestino"),$("#totalOrigen"),$("#julioItemMesDestinoSuma"),$("#julioItemMesDestinoInicial"),$("#julioDestino__sumando"));
						validador__monto__superior($("#agostoItemMesDestino"),$("#totalOrigen"),$("#agostoItemMesDestinoSuma"),$("#agostoItemMesDestinoInicial"),$("#agostoDestino__sumando"));
						validador__monto__superior($("#septiembreItemMesDestino"),$("#totalOrigen"),$("#septiembreItemMesDestinoSuma"),$("#septiembreItemMesDestinoInicial"),$("#septiembreDestino__sumando"));
						validador__monto__superior($("#octubreItemMesDestino"),$("#totalOrigen"),$("#octubreItemMesDestinoSuma"),$("#octubreItemMesDestinoInicial"),$("#octubreDestino__sumando"));
						validador__monto__superior($("#noviembreItemMesDestino"),$("#totalOrigen"),$("#noviembreItemMesDestinoSuma"),$("#noviembreItemMesDestinoInicial"),$("#noviembreDestino__sumando"));
						validador__monto__superior($("#diciembreItemMesDestino"),$("#totalOrigen"),$("#diciembreItemMesDestinoSuma"),$("#diciembreItemMesDestinoInicial"),$("#diciembreDestino__sumando"));

				</script>';

			return $listas; 

		}else if($indicador==1017){

			$querySe="SELECT a.modifica FROM poa_programacion_financiera AS a WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
			$resultadoSe = $conexionEstablecida->query($querySe);

			while($registroSe = $resultadoSe->fetch()) {

				$modificaExe=$registroSe["modifica"];

			}

			if ($idActividad==1 && $modificaExe=="E") {
				$query="SELECT b.itemPreesupuestario FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";

			}else{

				$query="SELECT b.itemPreesupuestario FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";

			}

			$resultado = $conexionEstablecida->query($query);

	
			$listas="<option value='0' class='text-center'>--Seleccione el mes que desea asignar el valor--</option>";

			while($registro = $resultado->fetch()) {

				$valor=$registro["itemPreesupuestario"];

	
			}

			return $valor; 

		}else if($indicador==1018){
			
			$query="SELECT b.idPda,b.nombreEvento AS nombreEvento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento2,b.modifica  FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera 
			WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL OR b.modifica='E' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo') AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo'  group by b.nombreEvento asc;";

			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione evento--</option>";
			$listas.="<option value='eventoCrear' class='text-center'>".strtoupper("Crear evento</option>");

			while($registro = $resultado->fetch()) {

				if ($registro["modifica"]=="E") {
					$listas.="<option value='".$registro["nombreEvento"]."' style='color:blue; font-weight:bold!important;'>".strtoupper($registro["nombreEvento2"])." (EVENTO POR APROBAR)</option>";
				}else{
					$listas.="<option value='".$registro["nombreEvento"]."'>".strtoupper($registro["nombreEvento2"])."</option>";
				}

			}


			return $listas; 

		}else if($indicador==1019){
			
			$query="SELECT b.idMantenimiento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras, nombreInfras AS infrasNormal,b.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL OR b.modifica='E'  AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos') AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' group by nombreInfras asc;";
			$resultado = $conexionEstablecida->query($query);
		
			$listas="<option value='0' class='text-center'>--Seleccione infraestructura--</option>";
			$listas.="<option value='eventoCrear' class='text-center'>".strtoupper("Crear infraestructura</option>");

			while($registro = $resultado->fetch()) {

				if ($registro["modifica"]=="E") {

					$listas.="<option value='".$registro["infrasNormal"]."' style='color:blue; font-weight:bold!important;'>".$registro["nombreInfras"]." (Elmento creado)</option>";

				}else{

					$listas.="<option value='".$registro["infrasNormal"]."'>".$registro["nombreInfras"]."</option>";

				}

			}


			return $listas; 

		}else if($indicador==1020){

				$query="SELECT a.idProgramacionFinanciera,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem, a.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND (a.modifica='A' OR a.modifica IS NULL OR a.modifica='E' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad') AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad';";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione ítem--</option>";

				while($registro = $resultado->fetch()) {

					if ($registro["modifica"]=="E") {

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' style='color:blue; font-weight:bold!important;'>".$registro["nombreItem"]." (Elmento creado)</option>";

					}else{

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."'>".$registro["nombreItem"]."</option>";

					}
					 	
				}

			 	return $listas; 

 			}else if($indicador==1025){

				$data1=array();
							
				$queryBloqueos="SELECT idItemDestino FROM poa_item_actividad_bloqueo WHERE idActividadOrigen='$actividadOrigenes' AND idActividadDestino='$actividadDestinos';";
				$resultadoBloqueos = $conexionEstablecida->query($queryBloqueos);


				while($registroBloqueos = $resultadoBloqueos->fetch()) {
					
					array_push($data1, $registroBloqueos["idItemDestino"]);

				}


				if (count($data1)==0) {
					$cadena=0;
				}else{
					$cadena = implode(",", $data1);
				}


				$query="SELECT a.idItem,a.idProgramacionFinanciera,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem INNER JOIN poa_item_actividad AS l ON (l.idItem=d.idItem AND l.idActividad=b.idActividades)  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND (a.modifica='A' OR a.modifica IS NULL OR a.modifica='E' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad') AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idItem NOT IN($cadena) GROUP BY a.idItem;";
				$resultado = $conexionEstablecida->query($query);


				$listas="<option value='0' class='text-center'>--Seleccione ítem--</option>";

				while($registro = $resultado->fetch()) {

					if ($idActividad==1 && $registro["modifica"]=="E") {

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' style='color:blue; font-weight:bold!important;' attr__1='modifica__actividad__1'>".$registro["nombreItem"]." (ÍTEM CREADO)</option>";
						
					}else{

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' attr__1='false'>".$registro["nombreItem"]."</option>";

					}
					 	
				}

			 	return $listas; 

 			}else if($indicador==1026){

			$query="SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades  FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo WHERE a.idActividad='1' OR a.idActividad='2' OR a.idActividad='3' OR a.idActividad='4' OR a.idActividad='5' OR a.idActividad='6' OR a.idActividad='7' GROUP BY a.idActividad;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione actividad--</option>";

			while($registro = $resultado->fetch()) {

				if ($registro["idActividades"]==4 && $identificadorPaginaReal=="honorarios") {
					
					$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]." (HONORARIOS)</option>";

				}else if($registro["idActividades"]==4 && $identificadorPaginaReal=="sueldos"){

					$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]." (SUELDOS)</option>";

				}else{

					$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]."</option>";

				}

				
				

			}


			return $listas; 

		}else if($indicador==1027){

			$query="SELECT idHonorarios,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,modifica FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);
		
			$listas="<option value='0' class='text-center'>--Seleccione personal Honorarios--</option>";

			if($actividadOrigen!="honorariosD"){
				$listas.="<option value='eventoCrear' class='text-center'>".strtoupper("Crear personal (Honorarios)</option>");
			}

			if ($idActividad=="honorariosD") {
				$listas.="<option value='eventoCrear' class='text-center'>".strtoupper("Crear personal (Honorarios)</option>");
			}
			

			while($registro = $resultado->fetch()) {

				if ($registro["modifica"]=="E") {

					$listas.="<option value='".$registro["idHonorarios"]."' style='color:blue; font-weight:bold!important;'>".$registro["nombres"]." (Elmento creado)</option>";

				}else{

					$listas.="<option value='".$registro["idHonorarios"]."'>".$registro["nombres"]."</option>";

				}

			}


			return $listas; 			

		}else if($indicador==1028){

			$query="SELECT idSueldos,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,modifica FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado = $conexionEstablecida->query($query);
		
			$listas="<option value='0' class='text-center'>--Seleccione personal Sueldos y Salarios--</option>";
			if($actividadOrigen!="sueldosD"){
				$listas.="<option value='eventoCrear' class='text-center'>".strtoupper("Crear personal (Sueldos y Salarios)</option>");
			}

			while($registro = $resultado->fetch()) {

				if ($registro["modifica"]=="E") {

					$listas.="<option value='".$registro["idSueldos"]."' style='color:blue; font-weight:bold!important;'>".$registro["nombres"]." (Elmento creado)</option>";

				}else{

					$listas.="<option value='".$registro["idSueldos"]."'>".$registro["nombres"]."</option>";

				}

			}


			return $listas; 			

		}else if($indicador==1029){

				$query="SELECT a.idProgramacionFinanciera,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idItem='71' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idItem;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione un ítem--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idProgramacionFinanciera"]."'>".$registro["nombreItem"]."</option>";
				

				}

				return $listas; 


		}else if($indicador==1030){

			if ($identificadorSH=="honorarios" || $sincrono=="honorariosD") {

				if ($idHonorariosS=="eventoCrear") {

					$query__honorarios__realizados="SELECT MAX(idHonorarios) AS honoariosMaximo FROM poa_honorarios2022;";
					$resultado__honorarios__realizados = $conexionEstablecida->query($query__honorarios__realizados);

					while($registro__honorarios__resultados = $resultado__honorarios__realizados->fetch()) {
						$maximos=$registro__honorarios__resultados["honoariosMaximo"];
					}					

					$idHonorariosS=$maximos;

				}

				$query="SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idHonorarios='$idHonorariosS';";


			}else if($identificadorSH=="sueldos"  || $sincrono=="sueldosD"){


				if ($idHonorariosS=="eventoCrear") {

					$query__honorarios__realizados="SELECT MAX(idSueldos) AS honoariosMaximo FROM poa_sueldossalarios2022;";
					$resultado__honorarios__realizados = $conexionEstablecida->query($query__honorarios__realizados);

					while($registro__honorarios__resultados = $resultado__honorarios__realizados->fetch()) {
						$maximos=$registro__honorarios__resultados["honoariosMaximo"];
					}					

					$idHonorariosS=$maximos;

				}

				$query="SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idSueldos='$idHonorariosS';";

			}

			$resultado = $conexionEstablecida->query($query);

	
			$listas="<option value='0' class='text-center'>--Seleccione el mes que desea asignar el valor--</option>";

	
			date_default_timezone_set("America/Guayaquil");
			$mes__actual = date('m');

			$mesEntero=intval($mes__actual);


			$listas="<table><thead><tr><th>Mes</th><th>Monto</th><th>Monto<br>+<br>Modificación</th><th>Modificación</th></tr></thead><tbody>";

			$sumaTotal=0;

			while($registro = $resultado->fetch()) {

				// if ($mesEntero==2) {
					$listas.="<tr><td align='center'>Enero</td><td align='center'><input type='text' id='eneroItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["enero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='eneroItemMesDestinoSuma' value='".round($registro["enero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='eneroItemMesDestino' value='0' style='widdth:100%!important;' attr='enero'/></td></tr>";
					$sumaTotal=floatval($registro["enero"])+$sumaTotal;
				// }

				
				// if ($mesEntero==2 || $mesEntero==3) {

					$listas.="<tr><td align='center'>Febrero</td><td align='center'><input type='text' id='febreroItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["febrero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='febreroItemMesDestinoSuma' value='".round($registro["febrero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='febreroItemMesDestino' value='0' style='widdth:100%!important;' attr='febrero'/></td></tr>";
					$sumaTotal=floatval($registro["febrero"])+$sumaTotal;
				// }

				
				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4) {

					$listas.="<tr><td align='center'>Marzo</td><td align='center'><input type='text' id='marzoItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["marzo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='marzoItemMesDestinoSuma' value='".round($registro["marzo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='marzoItemMesDestino' value='0' style='widdth:100%!important;' attr='marzo'/></td></tr>";
					$sumaTotal=floatval($registro["marzo"])+$sumaTotal;

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5) {

					$listas.="<tr><td align='center'>Abril</td><td align='center'><input type='text' id='abrilItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["abril"],2)."'readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='abrilItemMesDestinoSuma' value='".round($registro["abril"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='abrilItemMesDestino' value='0' style='widdth:100%!important;'  attr='abril'/></td></tr>";
					$sumaTotal=floatval($registro["abril"])+$sumaTotal;

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6) {

					$listas.="<tr><td align='center'>Mayo</td><td align='center'><input type='text' id='mayoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["mayo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='mayoItemMesDestinoSuma' value='".round($registro["mayo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='mayoItemMesDestino' value='0' style='widdth:100%!important;' attr='mayo'/></td></tr>";
					$sumaTotal=floatval($registro["mayo"])+$sumaTotal;

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7) {

					$listas.="<tr><td align='center'>Junio</td><td align='center'><input type='text' id='junioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["junio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='junioItemMesDestinoSuma' value='".round($registro["junio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='junioItemMesDestino' value='0' style='widdth:100%!important;' attr='junio'/></td></tr>";
					$sumaTotal=floatval($registro["junio"])+$sumaTotal;

				// }

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8) {

					$listas.="<tr><td align='center'>Julio</td><td align='center'><input type='text' id='julioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["julio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='julioItemMesDestinoSuma' value='".round($registro["julio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='julioItemMesDestino' value='0' style='widdth:100%!important;' attr='julio'/></td></tr>";
					$sumaTotal=floatval($registro["julio"])+$sumaTotal;

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9) {

					$listas.="<tr><td align='center'>Agosto</td><td align='center'><input type='text' id='agostoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["agosto"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='agostoItemMesDestinoSuma' value='".round($registro["agosto"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='agostoItemMesDestino' value='0' style='widdth:100%!important;' attr='agosto'/></td></tr>";
					$sumaTotal=floatval($registro["agosto"])+$sumaTotal;

				}


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10) {

					$listas.="<tr><td align='center'>Septiembre</td><td align='center'><input type='text' id='septiembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["septiembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='septiembreItemMesDestinoSuma' value='".round($registro["septiembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='septiembreItemMesDestino' value='0' style='widdth:100%!important;' attr='septiembre'/></td></tr>";
					$sumaTotal=floatval($registro["septiembre"])+$sumaTotal;

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11) {

					$listas.="<tr><td align='center'>Octubre</td><td align='center'><input type='text' id='octubreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["octubre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='octubreItemMesDestinoSuma' value='".round($registro["octubre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='octubreItemMesDestino' value='0' style='widdth:100%!important;' attr='octubre'/></td></tr>";
					$sumaTotal=floatval($registro["octubre"])+$sumaTotal;

				}
				
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Noviembre</td><td align='center'><input type='text' id='noviembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["noviembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='noviembreItemMesDestinoSuma' value='".round($registro["noviembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='noviembreItemMesDestino' value='0' style='widdth:100%!important;' attr='noviembre'/></td></tr>";
					$sumaTotal=floatval($registro["noviembre"])+$sumaTotal;

				}
					
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Diciembre</td><td align='center'><input type='text' id='diciembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["diciembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='diciembreItemMesDestinoSuma' value='".round($registro["diciembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='diciembreItemMesDestino' value='0' style='widdth:100%!important;' attr='diciembre' /></td></tr>";
					$sumaTotal=floatval($registro["diciembre"])+$sumaTotal;

				}
				

			}

			$listas.="<tr><td align='center'>Total</td><td align='center'>".number_format($sumaTotal,2)."</td><td></td><td align='center'><input type='text' class='cambio__de__numero__f__destino' id='totalMesAsignados__destinos' name='totalMesAsignados__destinos' value='0' style='widdth:100%!important; border:none!important;text-align:center;' readonly='readonly'/></td></tr>";

			$listas.="</tbody></table>";

			$listas.='
				<script>

					$.getScript("layout/scripts/js/validacionBasica.js",function(){

						$(".oculto__tabla__destino").show();

						funcion__solo__numero__montos($(".solo__numero__montos__destino"));
						funcion__cambio__de__numero($(".cambio__de__numero__f__destino"));

						var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

							$(parametro1).on("input", function () {

								if($(this).attr("attr")=="enero"){
									$("#eneroDestino").val($(this).val());
								}else if($(this).attr("attr")=="febrero"){
									$("#febreroDestino").val($(this).val());
								}else if($(this).attr("attr")=="marzo"){
									$("#marzoDestino").val($(this).val());
								}else if($(this).attr("attr")=="abril"){
									$("#abrilDestino").val($(this).val());
								}else if($(this).attr("attr")=="mayo"){
									$("#mayoDestino").val($(this).val());
								}else if($(this).attr("attr")=="junio"){
									$("#junioDestino").val($(this).val());
								}else if($(this).attr("attr")=="julio"){
									$("#julioDestino").val($(this).val());
								}else if($(this).attr("attr")=="agosto"){
									$("#agostoDestino").val($(this).val());
								}else if($(this).attr("attr")=="septiembre"){
									$("#septiembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="octubre"){
									$("#octubreDestino").val($(this).val());
								}else if($(this).attr("attr")=="noviembre"){
									$("#noviembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="diciembre"){
									$("#diciembreDestino").val($(this).val());
								}

								var sum = 0;
								$(parametro1).each(function(){
								    sum += parseFloat($(this).val());
								});
								$(parametro2).val(sum.toFixed(2));
								$("#totalDestino").val(sum.toFixed(2));

							});

						}
						sumarIndicadoresGlobal__principal($(".solo__numero__montos__destino"),$("#totalMesAsignados__destinos"));

					});

						var validador__monto__superior=function(parametro1,parametro2,parametro3,parametro4,parametro5){

							$(parametro1).on("input", function () {

								var sum2=0;

								$(".solo__numero__montos__destino").each(function(){
								    sum2 += parseFloat($(this).val());
								});

								let resta=0;

								if(parseFloat($(this).val())>parseFloat($(parametro2).val()) || parseFloat(sum2)>parseFloat($(parametro2).val())){

									alertify.set("notifier", "position", "top-center");
									alertify.notify("Valor supera al monto total asignado del orígen", "error", 5, function () { });
									$(this).val(0);
									$(parametro3).val($(parametro4).val());
								}else{

									resta=parseFloat($(this).val()) + parseFloat($(parametro4).val());

									$(parametro3).val(resta);
									$(parametro5).val(resta);

								}

							});

						}
						validador__monto__superior($("#eneroItemMesDestino"),$("#totalOrigen"),$("#eneroItemMesDestinoSuma"),$("#eneroItemMesDestinoInicial"),$("#eneroDestino__sumando"));
						validador__monto__superior($("#febreroItemMesDestino"),$("#totalOrigen"),$("#febreroItemMesDestinoSuma"),$("#febreroItemMesDestinoInicial"),$("#febreroDestino__sumando"));
						validador__monto__superior($("#marzoItemMesDestino"),$("#totalOrigen"),$("#marzoItemMesDestinoSuma"),$("#marzoItemMesDestinoInicial"),$("#marzoDestino__sumando"));
						validador__monto__superior($("#abrilItemMesDestino"),$("#totalOrigen"),$("#abrilItemMesDestinoSuma"),$("#abrilItemMesDestinoInicial"),$("#abrilDestino__sumando"));
						validador__monto__superior($("#mayoItemMesDestino"),$("#totalOrigen"),$("#mayoItemMesDestinoSuma"),$("#mayoItemMesDestinoInicial"),$("#mayoDestino__sumando"));
						validador__monto__superior($("#junioItemMesDestino"),$("#totalOrigen"),$("#junioItemMesDestinoSuma"),$("#junioItemMesDestinoInicial"),$("#junioDestino__sumando"));
						validador__monto__superior($("#julioItemMesDestino"),$("#totalOrigen"),$("#julioItemMesDestinoSuma"),$("#julioItemMesDestinoInicial"),$("#julioDestino__sumando"));
						validador__monto__superior($("#agostoItemMesDestino"),$("#totalOrigen"),$("#agostoItemMesDestinoSuma"),$("#agostoItemMesDestinoInicial"),$("#agostoDestino__sumando"));
						validador__monto__superior($("#septiembreItemMesDestino"),$("#totalOrigen"),$("#septiembreItemMesDestinoSuma"),$("#septiembreItemMesDestinoInicial"),$("#septiembreDestino__sumando"));
						validador__monto__superior($("#octubreItemMesDestino"),$("#totalOrigen"),$("#octubreItemMesDestinoSuma"),$("#octubreItemMesDestinoInicial"),$("#octubreDestino__sumando"));
						validador__monto__superior($("#noviembreItemMesDestino"),$("#totalOrigen"),$("#noviembreItemMesDestinoSuma"),$("#noviembreItemMesDestinoInicial"),$("#noviembreDestino__sumando"));
						validador__monto__superior($("#diciembreItemMesDestino"),$("#totalOrigen"),$("#diciembreItemMesDestinoSuma"),$("#diciembreItemMesDestinoInicial"),$("#diciembreDestino__sumando"));

				</script>';

			return $listas; 

		}else if($indicador==1031){

			if ($identificadorSH=="honorarios" || $sincrono=="honorariosD") {

				if ($idHonorariosS=="eventoCrear") {

					$query__honorarios__realizados="SELECT MAX(idHonorarios) AS honoariosMaximo FROM poa_honorarios2022;";
					$resultado__honorarios__realizados = $conexionEstablecida->query($query__honorarios__realizados);

					while($registro__honorarios__resultados = $resultado__honorarios__realizados->fetch()) {
						$maximos=$registro__honorarios__resultados["honoariosMaximo"];
					}					

					$idHonorariosS=$maximos;

				}

				$query="SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idHonorarios='$idHonorariosS';";



			}else if($identificadorSH=="sueldos" || $sincrono=="sueldosD"){


				if ($idHonorariosS=="eventoCrear") {

					$query__honorarios__realizados="SELECT MAX(idSueldos) AS honoariosMaximo FROM poa_sueldossalarios2022;";
					$resultado__honorarios__realizados = $conexionEstablecida->query($query__honorarios__realizados);

					while($registro__honorarios__resultados = $resultado__honorarios__realizados->fetch()) {
						$maximos=$registro__honorarios__resultados["honoariosMaximo"];
					}					

					$idHonorariosS=$maximos;

				}

				$query="SELECT sueldoSalario,aportePatronal,decimoTercera,decimoCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idSueldos='$idHonorariosS';";
				$query2="SELECT sueldoSalario,aportePatronal,decimoTercera,decimoCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idSueldos='$idHonorariosS';";

			}

			$resultado = $conexionEstablecida->query($query);
			$resultado2 = $conexionEstablecida->query($query2);
		
			$listas="<option value='0' class='text-center'>--Seleccione el mes que desea asignar el valor--</option>";

	
			date_default_timezone_set("America/Guayaquil");
			$mes__actual = date('m');

			$mesEntero=intval($mes__actual);

			$sumadorTotal2=0;

			$listas="<div style='display:flex; flex-direction:column;'>";

			$listas.="<table><thead><tr><th colspan='4'>ASIGNACIÓN BONIFICACIONES</th></tr><tr><th>Mes</th><th>Monto</th><th>Monto<br>+<br>Modificación</th><th>Modificación</th></tr></thead><tbody>";

			while($registro2 = $resultado2->fetch()) {

				$listas.="<tr><td align='center'>Sueldos unificados</td><td align='center'><input type='text' id='sueldoItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro2["sueldoSalario"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='sueldoItemMesDestinoSuma' value='".round($registro2["sueldoSalario"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items__bonificacion solo__numero__montos__destino__bonificacion cambio__de__numero__f__destino__bonificacion' id='sueldoItemMesDestino' value='0' style='widdth:100%!important;' attr='sueldoSalario'/></td></tr>";

				$listas.="<tr><td align='center'>Aporte Patronal</td><td align='center'><input type='text' id='aportePatronalItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro2["aportePatronal"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='aportePatronalItemMesDestinoSuma' value='".round($registro2["aportePatronal"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items__bonificacion solo__numero__montos__destino__bonificacion cambio__de__numero__f__destino__bonificacion' id='aportePatronalItemMesDestino' value='0' style='widdth:100%!important;' attr='aportePatronal'/></td></tr>";

				$listas.="<tr><td align='center'>Décimo Tercera remuneración</td><td align='center'><input type='text' id='decimoTerceraItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro2["decimoTercera"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='decimoTerceraItemMesDestinoSuma' value='".round($registro2["decimoTercera"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items__bonificacion solo__numero__montos__destino__bonificacion cambio__de__numero__f__destino__bonificacion' id='decimoTerceraItemMesDestino' value='0' style='widdth:100%!important;' attr='decimoTercera'/></td></tr>";

				$listas.="<tr><td align='center'>Décimo cuarta remuneración</td><td align='center'><input type='text' id='decimoCuartaItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro2["decimoCuarta"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='decimoCuartaItemMesDestinoSuma' value='".round($registro2["decimoCuarta"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items__bonificacion solo__numero__montos__destino__bonificacion cambio__de__numero__f__destino__bonificacion' id='decimoCuartaItemMesDestino' value='0' style='widdth:100%!important;' attr='decimoCuarta'/></td></tr>";

				$listas.="<tr><td align='center'>Fondos de reserva</td><td align='center'><input type='text' id='fondosReservaItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro2["fondosReserva"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='fondosReservaItemMesDestinoSuma' value='".round($registro2["fondosReserva"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items__bonificacion solo__numero__montos__destino__bonificacion cambio__de__numero__f__destino__bonificacion' id='fondosReservaItemMesDestino' value='0' style='widdth:100%!important;' attr='fondosReserva'/></td></tr>";

				$sumadorTotal2=floatval($registro2["sueldoSalario"]) + floatval($registro2["aportePatronal"]) + floatval($registro2["decimoTercera"]) + floatval($registro2["decimoCuarta"]) + floatval($registro2["fondosReserva"]);

				$listas.="<tr><td align='center'>Total</td><td align='center'>".number_format($sumadorTotal2,2)."</td><td></td><td align='center'><input type='text' class='cambio__de__numero__f__destino' id='totalMesAsignados__destinos__bonificacion' name='totalMesAsignados__destinos__bonificacion' value='0' style='widdth:100%!important; border:none!important;text-align:center;' readonly='readonly'/></td></tr>";

			}

			$listas.="</tbody></table>";


			$listas.="<table><thead><tr><th colspan='4'>ASIGNACIÓN MENSUAL</th></tr><tr><th>Mes</th><th>Monto</th><th>Monto<br>+<br>Modificación</th><th>Modificación</th></tr></thead><tbody>";

			$sumaTotal=0;

			while($registro = $resultado->fetch()) {

				// if ($mesEntero==2) {
					$listas.="<tr><td align='center'>Enero</td><td align='center'><input type='text' id='eneroItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["enero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='eneroItemMesDestinoSuma' value='".round($registro["enero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='eneroItemMesDestino' value='0' style='widdth:100%!important;' attr='enero'/></td></tr>";
					$sumaTotal=floatval($registro["enero"])+$sumaTotal;
				// }

				
				// if ($mesEntero==2 || $mesEntero==3) {

					$listas.="<tr><td align='center'>Febrero</td><td align='center'><input type='text' id='febreroItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["febrero"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='febreroItemMesDestinoSuma' value='".round($registro["febrero"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='febreroItemMesDestino' value='0' style='widdth:100%!important;' attr='febrero'/></td></tr>";
					$sumaTotal=floatval($registro["febrero"])+$sumaTotal;
				// }

				
				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4) {

					$listas.="<tr><td align='center'>Marzo</td><td align='center'><input type='text' id='marzoItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["marzo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='marzoItemMesDestinoSuma' value='".round($registro["marzo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='marzoItemMesDestino' value='0' style='widdth:100%!important;' attr='marzo'/></td></tr>";
					$sumaTotal=floatval($registro["marzo"])+$sumaTotal;

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5) {

					$listas.="<tr><td align='center'>Abril</td><td align='center'><input type='text' id='abrilItemMesDestinoInicial' style='widdth:100%!important; border:none!important;text-align:center!important;' value='".round($registro["abril"],2)."'readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='abrilItemMesDestinoSuma' value='".round($registro["abril"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='abrilItemMesDestino' value='0' style='widdth:100%!important;'  attr='abril'/></td></tr>";
					$sumaTotal=floatval($registro["abril"])+$sumaTotal;

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6) {

					$listas.="<tr><td align='center'>Mayo</td><td align='center'><input type='text' id='mayoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["mayo"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='mayoItemMesDestinoSuma' value='".round($registro["mayo"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='mayoItemMesDestino' value='0' style='widdth:100%!important;' attr='mayo'/></td></tr>";
					$sumaTotal=floatval($registro["mayo"])+$sumaTotal;

				// }


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7) {

					$listas.="<tr><td align='center'>Junio</td><td align='center'><input type='text' id='junioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["junio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='junioItemMesDestinoSuma' value='".round($registro["junio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='junioItemMesDestino' value='0' style='widdth:100%!important;' attr='junio'/></td></tr>";
					$sumaTotal=floatval($registro["junio"])+$sumaTotal;

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8) {

					$listas.="<tr><td align='center'>Julio</td><td align='center'><input type='text' id='julioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["julio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='julioItemMesDestinoSuma' value='".round($registro["julio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='julioItemMesDestino' value='0' style='widdth:100%!important;' attr='julio'/></td></tr>";
					$sumaTotal=floatval($registro["julio"])+$sumaTotal;

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9) {

					$listas.="<tr><td align='center'>Agosto</td><td align='center'><input type='text' id='agostoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["agosto"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='agostoItemMesDestinoSuma' value='".round($registro["agosto"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='agostoItemMesDestino' value='0' style='widdth:100%!important;' attr='agosto'/></td></tr>";
					$sumaTotal=floatval($registro["agosto"])+$sumaTotal;

				}


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10) {

					$listas.="<tr><td align='center'>Septiembre</td><td align='center'><input type='text' id='septiembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["septiembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='septiembreItemMesDestinoSuma' value='".round($registro["septiembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='septiembreItemMesDestino' value='0' style='widdth:100%!important;' attr='septiembre'/></td></tr>";
					$sumaTotal=floatval($registro["septiembre"])+$sumaTotal;

				}

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11) {

					$listas.="<tr><td align='center'>Octubre</td><td align='center'><input type='text' id='octubreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["octubre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='octubreItemMesDestinoSuma' value='".round($registro["octubre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='octubreItemMesDestino' value='0' style='widdth:100%!important;' attr='octubre'/></td></tr>";
					$sumaTotal=floatval($registro["octubre"])+$sumaTotal;

				}
				
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Noviembre</td><td align='center'><input type='text' id='noviembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["noviembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='noviembreItemMesDestinoSuma' value='".round($registro["noviembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='noviembreItemMesDestino' value='0' style='widdth:100%!important;' attr='noviembre'/></td></tr>";
					$sumaTotal=floatval($registro["noviembre"])+$sumaTotal;

				}
					
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Diciembre</td><td align='center'><input type='text' id='diciembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["diciembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='diciembreItemMesDestinoSuma' value='".round($registro["diciembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='diciembreItemMesDestino' value='0' style='widdth:100%!important;' attr='diciembre' /></td></tr>";
					$sumaTotal=floatval($registro["diciembre"])+$sumaTotal;

				}
				

			}

			$listas.="<tr><td align='center'>Total</td><td align='center'>".number_format($sumaTotal,2)."</td><td></td><td align='center'><input type='text' class='cambio__de__numero__f__destino' id='totalMesAsignados__destinos' name='totalMesAsignados__destinos' value='0' style='widdth:100%!important; border:none!important;text-align:center;' readonly='readonly'/></td></tr>";

			$listas.="</tbody></table>";

			$listas.='
				<script>

					$.getScript("layout/scripts/js/validacionBasica.js",function(){

						$(".oculto__tabla__destino").show();

						funcion__solo__numero__montos($(".solo__numero__montos__destino"));
						funcion__cambio__de__numero($(".cambio__de__numero__f__destino"));
						funcion__solo__numero__montos($(".solo__numero__montos__destino__bonificacion"));
						funcion__cambio__de__numero($(".cambio__de__numero__f__destino__bonificacion"));

						var sumarIndicadoresGlobal__principal=function(parametro1,parametro2){

							$(parametro1).on("input", function () {

								if($(this).attr("attr")=="enero"){
									$("#eneroDestino").val($(this).val());
								}else if($(this).attr("attr")=="febrero"){
									$("#febreroDestino").val($(this).val());
								}else if($(this).attr("attr")=="marzo"){
									$("#marzoDestino").val($(this).val());
								}else if($(this).attr("attr")=="abril"){
									$("#abrilDestino").val($(this).val());
								}else if($(this).attr("attr")=="mayo"){
									$("#mayoDestino").val($(this).val());
								}else if($(this).attr("attr")=="junio"){
									$("#junioDestino").val($(this).val());
								}else if($(this).attr("attr")=="julio"){
									$("#julioDestino").val($(this).val());
								}else if($(this).attr("attr")=="agosto"){
									$("#agostoDestino").val($(this).val());
								}else if($(this).attr("attr")=="septiembre"){
									$("#septiembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="octubre"){
									$("#octubreDestino").val($(this).val());
								}else if($(this).attr("attr")=="noviembre"){
									$("#noviembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="diciembre"){
									$("#diciembreDestino").val($(this).val());
								}else if($(this).attr("attr")=="sueldoSalario"){
									$("#sueldoDestino").val($(this).val());
								}else if($(this).attr("attr")=="aportePatronal"){
									$("#aportePatronalDestino").val($(this).val());
								}else if($(this).attr("attr")=="decimoTercera"){
									$("#decimoTerceraDestino").val($(this).val());
								}else if($(this).attr("attr")=="decimoCuarta"){
									$("#decimoCuartaDestino").val($(this).val());
								}else if($(this).attr("attr")=="fondosReserva"){
									$("#fondosReservaDestino").val($(this).val());
								}

								var sum = 0;
								$(parametro1).each(function(){
								    sum += parseFloat($(this).val());
								});
								$(parametro2).val(sum.toFixed(2));
								$("#totalDestino").val(sum.toFixed(2));

							});

						}
						sumarIndicadoresGlobal__principal($(".solo__numero__montos__destino"),$("#totalMesAsignados__destinos"));
						sumarIndicadoresGlobal__principal($(".solo__numero__montos__destino__bonificacion"),$("#totalMesAsignados__destinos__bonificacion"));

					});

						var validador__monto__superior=function(parametro1,parametro2,parametro3,parametro4,parametro5){

							$(parametro1).on("input", function () {

								var sum2=0;

								$(".solo__numero__montos__destino").each(function(){
								    sum2 += parseFloat($(this).val());
								});

								let resta=0;

								if(parseFloat($(this).val())>parseFloat($(parametro2).val()) || parseFloat(sum2)>parseFloat($(parametro2).val())){

									alertify.set("notifier", "position", "top-center");
									alertify.notify("Valor supera al monto total asignado del orígen", "error", 5, function () { });
									$(this).val(0);
									$(parametro3).val($(parametro4).val());
								}else{

									resta=parseFloat($(this).val()) + parseFloat($(parametro4).val());

									$(parametro3).val(resta);
									$(parametro5).val(resta);

								}

							});

						}
						validador__monto__superior($("#eneroItemMesDestino"),$("#totalOrigen"),$("#eneroItemMesDestinoSuma"),$("#eneroItemMesDestinoInicial"),$("#eneroDestino__sumando"));
						validador__monto__superior($("#febreroItemMesDestino"),$("#totalOrigen"),$("#febreroItemMesDestinoSuma"),$("#febreroItemMesDestinoInicial"),$("#febreroDestino__sumando"));
						validador__monto__superior($("#marzoItemMesDestino"),$("#totalOrigen"),$("#marzoItemMesDestinoSuma"),$("#marzoItemMesDestinoInicial"),$("#marzoDestino__sumando"));
						validador__monto__superior($("#abrilItemMesDestino"),$("#totalOrigen"),$("#abrilItemMesDestinoSuma"),$("#abrilItemMesDestinoInicial"),$("#abrilDestino__sumando"));
						validador__monto__superior($("#mayoItemMesDestino"),$("#totalOrigen"),$("#mayoItemMesDestinoSuma"),$("#mayoItemMesDestinoInicial"),$("#mayoDestino__sumando"));
						validador__monto__superior($("#junioItemMesDestino"),$("#totalOrigen"),$("#junioItemMesDestinoSuma"),$("#junioItemMesDestinoInicial"),$("#junioDestino__sumando"));
						validador__monto__superior($("#julioItemMesDestino"),$("#totalOrigen"),$("#julioItemMesDestinoSuma"),$("#julioItemMesDestinoInicial"),$("#julioDestino__sumando"));
						validador__monto__superior($("#agostoItemMesDestino"),$("#totalOrigen"),$("#agostoItemMesDestinoSuma"),$("#agostoItemMesDestinoInicial"),$("#agostoDestino__sumando"));
						validador__monto__superior($("#septiembreItemMesDestino"),$("#totalOrigen"),$("#septiembreItemMesDestinoSuma"),$("#septiembreItemMesDestinoInicial"),$("#septiembreDestino__sumando"));
						validador__monto__superior($("#octubreItemMesDestino"),$("#totalOrigen"),$("#octubreItemMesDestinoSuma"),$("#octubreItemMesDestinoInicial"),$("#octubreDestino__sumando"));
						validador__monto__superior($("#noviembreItemMesDestino"),$("#totalOrigen"),$("#noviembreItemMesDestinoSuma"),$("#noviembreItemMesDestinoInicial"),$("#noviembreDestino__sumando"));
						validador__monto__superior($("#diciembreItemMesDestino"),$("#totalOrigen"),$("#diciembreItemMesDestinoSuma"),$("#diciembreItemMesDestinoInicial"),$("#diciembreDestino__sumando"));

						validador__monto__superior($("#sueldoItemMesDestino"),$("#totalOrigen"),$("#sueldoItemMesDestinoSuma"),$("#sueldoItemMesDestinoInicial"),$("#sueldoDestino__sumando"));
						validador__monto__superior($("#aportePatronalItemMesDestino"),$("#totalOrigen"),$("#aportePatronalItemMesDestinoSuma"),$("#aportePatronalItemMesDestinoInicial"),$("#aportePatronalDestino__sumando"));
						validador__monto__superior($("#decimoTerceraItemMesDestino"),$("#totalOrigen"),$("#decimoTerceraItemMesDestinoSuma"),$("#decimoTerceraItemMesDestinoInicial"),$("#decimoTerceraDestino__sumando"));
						validador__monto__superior($("#decimoCuartaItemMesDestino"),$("#totalOrigen"),$("#decimoCuartaItemMesDestinoSuma"),$("#decimoCuartaItemMesDestinoInicial"),$("#decimoCuartaDestino__sumando"));
						validador__monto__superior($("#fondosReservaItemMesDestino"),$("#totalOrigen"),$("#fondosReservaItemMesDestinoSuma"),$("#fondosReservaItemMesDestinoInicial"),$("#fondosReservaDestino__sumando"));

				</script>';

				$listas.="</div>";

			return $listas; 

		}else if($indicador==1032){

				$query="SELECT a.idProgramacionFinanciera,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem WHERE a.idOrganismo='1273' AND a.perioIngreso='2023' AND a.idActividad='1' AND (a.idOrganismo='1273' AND a.perioIngreso='2023' AND a.idActividad='1') AND a.idOrganismo='1273' AND a.perioIngreso='2023' AND a.idActividad='1';";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione ítem--</option>";

				while($registro = $resultado->fetch()) {

					if ($idActividad==1 && $registro["modifica"]=="E") {

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' attr='modifica__actividad__1' style='color:blue; font-weight:bold!important;'>".$registro["nombreItem"]." (ÍTEM CREADO)</option>";
						
					}else{

						$listas.="<option value='".$registro["idProgramacionFinanciera"]."' attr='false'>".$registro["nombreItem"]."</option>";

					}
					 	
				}

			 	return $listas; 			

		}else if($indicador==1033){

				$query="SELECT b.tipoIntervencion FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=a.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND b.nombreInfras='$nombreInfras' GROUP BY a.idItem;";
				$resultado = $conexionEstablecida->query($query);


				while($registro = $resultado->fetch()) {

					$listas=$registro["tipoIntervencion"];
				

				}

				return $listas; 

		}else if($indicador==1034){

				$query="SELECT a.idItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreImte,a.itemPreesupuestario FROM poa_item AS a INNER JOIN poa_item_actividad AS b ON a.idItem=b.idItem WHERE b.idActividad='$idActividad' AND NOT EXISTS (SELECT t.idActividadItem FROM poa_item_actividad_bloqueo AS t WHERE t.idActividadItem=b.idActividadItem AND t.idActividadDestino=b.idActividad AND t.idActividadOrigen='$actividad__origen__modificaciones') ORDER BY a.nombreItem;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione Ítem--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idItem"]."'>".$registro["nombreImte"]."(".$registro["itemPreesupuestario"].")"."</option>";
				

				}

				return $listas; 

		}else if($indicador==1035){

				$query="SELECT idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades FROM poa_actividades;";
				$resultado = $conexionEstablecida->query($query);

				$listas="<option value='0' class='text-center'>--Seleccione activídad--</option>";

				while($registro = $resultado->fetch()) {

					$listas.="<option value='".$registro["idActividades"]."'>".$registro["idActividades"].".- ".$registro["nombreActividades"]."</option>";
				

				}

				return $listas; 

		}

		}

	}


	echo lugar::lugarFuncion($indicador);

