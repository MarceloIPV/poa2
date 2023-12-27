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

 				$query="SELECT idSueldos, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY nombres ASC;";
			 	$resultado = $conexionEstablecida->query($query);

			 	$listas="<option value='0' class='text-center'>--Seleccione--</option>";

			 	while($registro = $resultado->fetch()) {

			 		$listas.="<option value='".$registro["idSueldos"]."'>".$registro["nombres"]."</option>";
			 	

			 	}

			 	return $listas; 

 			}else if($indicador==57){

				$query="SELECT c.nombre AS rol,a.id_usuario,a.zonal,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellido, d.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol  INNER JOIN th_zonal AS d on a.zonal=d.id_Zonal WHERE a.PersonaACargo='$idUsuarioC' OR (a.fisicamenteEstructura=26 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=27 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=28 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=29 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=30 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=31 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=32 AND b.id_rol=4 AND a.estadoUsuario='A') OR (a.fisicamenteEstructura=33 AND b.id_rol=4 AND a.estadoUsuario='A') AND a.estadoUsuario='A' AND b.estado='A' ORDER BY b.id_rol;";
				$resultado = $conexionEstablecida->query($query);

				while($registro = $resultado->fetch()) {

					if ($registro["zonal"]==1) {
						$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]." Cargo: ".$registro["rol"]."</option>";
					}else{
						$listas.="<option value='".$registro["id_usuario"]."'>".$registro["nombre"]." ".$registro["apellido"]." ".$registro["descripcionZonal"]." Cargo: ".$registro["rol"]."</option>";
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

				if($variables != null){
					$query="SELECT idAreaEncargada,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreArea, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreArea FROM poa_paid_areaencargada WHERE identificador='$variables' OR identificador IS NULL;";
					$resultado = $conexionEstablecida->query($query);
				}else{
					$query="SELECT idAreaEncargada,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreArea, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreArea FROM poa_paid_areaencargada WHERE identificador='$evaluador' OR identificador IS NULL;";
					$resultado = $conexionEstablecida->query($query);
				}

				

			
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

				if ($idActividad==2) {

					$query="SELECT b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND b.nombreInfras='$eventos_intervencion_o'  LIMIT 1;";

				}else if($idActividad==3 || $idActividad==5 || $idActividad==6 || $idActividad==7){

					$query="SELECT b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND b.nombreEvento='$eventos_intervencion_o'  LIMIT 1;";

				}else{

					$query="SELECT a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad'  LIMIT 1;";
					
				}

				
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

			if ($idActividad==2) {
				
				if ($idActividad==1 && $modificaExe=="E") {
					$query="SELECT ROUND(b.enero,2) AS enero,ROUND(b.febrero,2) AS febrero,ROUND(b.marzo,2) AS marzo,ROUND(b.abril,2) AS abril,ROUND(b.mayo,2) AS mayo,ROUND(b.junio,2) AS junio,ROUND(b.julio,2) AS julio,ROUND(b.agosto,2) AS agosto,ROUND(b.septiembre,2) AS septiembre,ROUND(b.octubre,2) AS octubre,ROUND(b.noviembre,2) AS noviembre,ROUND(b.diciembre,2) AS diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' AND b.nombreInfras='$eventos_intervencion_o' LIMIT 1;";
				}else{
					$query="SELECT ROUND(b.enero,2) AS enero,ROUND(b.febrero,2) AS febrero,ROUND(b.marzo,2) AS marzo,ROUND(b.abril,2) AS abril,ROUND(b.mayo,2) AS mayo,ROUND(b.junio,2) AS junio,ROUND(b.julio,2) AS julio,ROUND(b.agosto,2) AS agosto,ROUND(b.septiembre,2) AS septiembre,ROUND(b.octubre,2) AS octubre,ROUND(b.noviembre,2) AS noviembre,ROUND(b.diciembre,2) AS diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' AND b.nombreInfras='$eventos_intervencion_o' LIMIT 1;";
				}
					

			}else if($idActividad==3 || $idActividad==5 || $idActividad==6 || $idActividad==7){

				if ($idActividad==1 && $modificaExe=="E") {
					$query="SELECT ROUND(b.enero,2) AS enero,ROUND(b.febrero,2) AS febrero,ROUND(b.marzo,2) AS marzo,ROUND(b.abril,2) AS abril,ROUND(b.mayo,2) AS mayo,ROUND(b.junio,2) AS junio,ROUND(b.julio,2) AS julio,ROUND(b.agosto,2) AS agosto,ROUND(b.septiembre,2) AS septiembre,ROUND(b.octubre,2) AS octubre,ROUND(b.noviembre,2) AS noviembre,ROUND(b.diciembre,2) AS diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' AND b.nombreEvento='$eventos_intervencion_o' AND a.idProgramacionFinanciera='$item__modificaciones__destino__modificaciones2__seleccion: ' LIMIT 1;";
				}else{
					$query="SELECT ROUND(b.enero,2) AS enero,ROUND(b.febrero,2) AS febrero,ROUND(b.marzo,2) AS marzo,ROUND(b.abril,2) AS abril,ROUND(b.mayo,2) AS mayo,ROUND(b.junio,2) AS junio,ROUND(b.julio,2) AS julio,ROUND(b.agosto,2) AS agosto,ROUND(b.septiembre,2) AS septiembre,ROUND(b.octubre,2) AS octubre,ROUND(b.noviembre,2) AS noviembre,ROUND(b.diciembre,2) AS diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' AND b.nombreEvento='$eventos_intervencion_o' AND a.idProgramacionFinanciera='$item__modificaciones__destino__modificaciones2__seleccion: ' LIMIT 1;";
				}

			}else{

				if ($idActividad==1 && $modificaExe=="E") {
					$query="SELECT ROUND(a.enero,2) AS enero,ROUND(a.febrero,2) AS febrero,ROUND(a.marzo,2) AS marzo,ROUND(a.abril,2) AS abril,ROUND(a.mayo,2) AS mayo,ROUND(a.junio,2) AS junio,ROUND(a.julio,2) AS julio,ROUND(a.agosto,2) AS agosto,ROUND(a.septiembre,2) AS septiembre,ROUND(a.octubre,2) AS octubre,ROUND(a.noviembre,2) AS noviembre,ROUND(a.diciembre,2) AS diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a WHERE a.idItem='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
				}else{
					$query="SELECT ROUND(a.enero,2) AS enero,ROUND(a.febrero,2) AS febrero,ROUND(a.marzo,2) AS marzo,ROUND(a.abril,2) AS abril,ROUND(a.mayo,2) AS mayo,ROUND(a.junio,2) AS junio,ROUND(a.julio,2) AS julio,ROUND(a.agosto,2) AS agosto,ROUND(a.septiembre,2) AS septiembre,ROUND(a.octubre,2) AS octubre,ROUND(a.noviembre,2) AS noviembre,ROUND(a.diciembre,2) AS diciembre,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$item' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismo' LIMIT 1;";
				}


			}


			$resultado = $conexionEstablecida->query($query);

	
			$listas="<option value='0' class='text-center'>--Seleccione el mes que desea asignar el valor--</option>";

	
			date_default_timezone_set("America/Guayaquil");
			$mes__actual = date('m');

			$mesEntero=intval($mes__actual);


			$listas="<table><thead><tr><th>Mes</th><th>Monto</th><th>Monto<br>+<br>Modificación</th><th>Modificación</th></tr></thead><tbody>";

			$sumaTotal=0;

			while($registro = $resultado->fetch()) {

				if ($mesEntero==2 || 6==6) {
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

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || 6==6) {

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

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || 6==6) {

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


				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || 6==6) {

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

				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || 6==6) {

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
				
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || 6==6) {

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
					
				if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12 || 6==6) {

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

								sum2=parseFloat(sum2).toFixed(2);

								let resta=0;

								resta=parseFloat($(this).val()) + parseFloat($(parametro4).val());

								$(parametro3).val(parseFloat(resta).toFixed(2));
								$(parametro5).val(resta);


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
			WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos'  AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismo'  group by b.nombreEvento asc ORDER BY b.nombreEvento;";

			$resultado = $conexionEstablecida->query($query);

			$listas="<option value='0' class='text-center'>--Seleccione evento--</option>";
			$listas.="<option value='eventoCrear' class='text-center' style='font-weight:bold!important;'>".strtoupper("Crear evento</option>");

			while($registro = $resultado->fetch()) {

				if ($registro["modifica"]=="E") {
					$listas.="<option value='".$registro["nombreEvento"]."'>".strtoupper($registro["nombreEvento2"])."</option>";
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

			if($actividadOrigen!="honorariosD" && $identificadorPaginaReal!="diferentes" && $identificadorPaginaReal!="origenDesvinculacion"){
				$listas.="<option value='eventoCrear' class='text-center'>".strtoupper("Crear personal (Honorarios)</option>");
			}

			if ($idActividad=="honorariosD" && $identificadorPaginaReal!="diferentes" && $identificadorPaginaReal!="origenDesvinculacion") {
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
			if($identificadorPaginaReal!="diferentes" && $identificadorPaginaReal!="origenDesvinculacion"){
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

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8) {

					$listas.="<tr><td align='center'>Julio</td><td align='center'><input type='text' id='julioItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["julio"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='julioItemMesDestinoSuma' value='".round($registro["julio"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='julioItemMesDestino' value='0' style='widdth:100%!important;' attr='julio'/></td></tr>";
					$sumaTotal=floatval($registro["julio"])+$sumaTotal;

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9) {

					$listas.="<tr><td align='center'>Agosto</td><td align='center'><input type='text' id='agostoItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["agosto"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='agostoItemMesDestinoSuma' value='".round($registro["agosto"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='agostoItemMesDestino' value='0' style='widdth:100%!important;' attr='agosto'/></td></tr>";
					$sumaTotal=floatval($registro["agosto"])+$sumaTotal;

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10) {

					$listas.="<tr><td align='center'>Septiembre</td><td align='center'><input type='text' id='septiembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["septiembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='septiembreItemMesDestinoSuma' value='".round($registro["septiembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='septiembreItemMesDestino' value='0' style='widdth:100%!important;' attr='septiembre'/></td></tr>";
					$sumaTotal=floatval($registro["septiembre"])+$sumaTotal;

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11) {

					$listas.="<tr><td align='center'>Octubre</td><td align='center'><input type='text' id='octubreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["octubre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='octubreItemMesDestinoSuma' value='".round($registro["octubre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='octubreItemMesDestino' value='0' style='widdth:100%!important;' attr='octubre'/></td></tr>";
					$sumaTotal=floatval($registro["octubre"])+$sumaTotal;

				// }
				
				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Noviembre</td><td align='center'><input type='text' id='noviembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["noviembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='noviembreItemMesDestinoSuma' value='".round($registro["noviembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='noviembreItemMesDestino' value='0' style='widdth:100%!important;' attr='noviembre'/></td></tr>";
					$sumaTotal=floatval($registro["noviembre"])+$sumaTotal;

				// }
					
				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.="<tr><td align='center'>Diciembre</td><td align='center'><input type='text' id='diciembreItemMesDestinoInicial' style='widdth:100%!important;border:none!important;text-align:center!important;' value='".round($registro["diciembre"],2)."' readonly='readonly' style='border:none!important'/></td><td align='center'><input type='text' id='diciembreItemMesDestinoSuma' value='".round($registro["diciembre"],2)."' style='widdth:100%!important;'  disabled='disabled'/></td><td align='center'><input type='text' class='enlazados__numeros__items solo__numero__montos__destino cambio__de__numero__f__destino' id='diciembreItemMesDestino' value='0' style='widdth:100%!important;' attr='diciembre' /></td></tr>";
					$sumaTotal=floatval($registro["diciembre"])+$sumaTotal;

				// }
				

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

			$listas='<table class="col col-12 tabla__sueldos__anadidos"> <thead> <tr> <th align="center">Mes</th> <th align="center">Aporte</br>patronal</th> <th align="center">Décimo</br>Tercero</th> <th align="center">Décimo</br>Cuarto</th> <th align="center">Fondos</br>de</br>reserva</th> <th align="center">Salario</th> <th align="center">Salario<br>+<br>Bonificación</th> </tr> </thead> <tbody>';

			$sumaTotal=0;

			while($registro = $resultado->fetch()) {

				// if ($mesEntero==2) {

					$listas.='<tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Enero (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td align="center">Enero (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Enero (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__enero__destino" value="0"/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__enero__destino" value="0"/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__enero__destino" value="0"/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__enero__destino" value="0"/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="enero__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__enero__destino" value="0"/> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Febrero (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Febrero (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Febrero (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__febrero__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__febrero__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__febrero__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__febrero__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="febrero__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__febrero__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Marzo (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Marzo (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Marzo (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__marzo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__marzo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__marzo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__marzo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="marzo__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__marzo__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr> ';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Abril (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Abril (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Abril (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__abril__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__abril__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__abril__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__abril__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="abril__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__abril__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Mayo (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Mayo (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Mayo (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__mayo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__mayo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__mayo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__mayo__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="mayo__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__mayo__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7) {

					$listas.='<tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Junio (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Junio (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Junio (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__junio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__junio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__junio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__junio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="junio__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__junio__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';


				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8) {

					$listas.='<tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Julio (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Julio (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Julio (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__julio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__julio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__julio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__julio__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="julio__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__julio__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }


				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9) {

					$listas.='<tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Agosto (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Agosto (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Agosto (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__agosto__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__agosto__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__agosto__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__agosto__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="agosto__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__agosto__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Septiembre (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Septiembre (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Septiembre (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__septiembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__septiembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__septiembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__septiembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="septiembre__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__septiembre__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11) {


					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Octubre (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Octubre (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Octubre (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__octubre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__octubre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__octubre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__octubre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="octubre__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__octubre__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Noviembre (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Noviembre (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Noviembre (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__noviembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__noviembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__noviembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__noviembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="noviembre__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__noviembre__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				// if ($mesEntero==2 || $mesEntero==3 || $mesEntero==4 || $mesEntero==5 || $mesEntero==6 || $mesEntero==7 || $mesEntero==8 || $mesEntero==9 || $mesEntero==10 || $mesEntero==11 || $mesEntero==12) {

					$listas.=' <tr> <td class="vertical__aign" style="font-weight:bold;"> <center>Diciembre (Monto inicial)</center> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__aporte__patronal__destino" class="ancho__total__input form-control origen__aporte__patronal__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__decimo__tercero__destino" class="ancho__total__input form-control origen__decimo__tercero__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__decimo__cuarto__destino" class="ancho__total__input form-control origen__decimo__cuarto__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__fondos__de__reserva__destino" class="ancho__total__input form-control origen__fondos__de__reserva__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__salarios__destino" class="ancho__total__input form-control origen__salarios__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__destino" class="ancho__total__input obligatorios__2 form-control origen__clase__destino" readonly=""/> </td> </tr> <tr> <td>Diciembre (Monto restante)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__aporte__patronal__restante__destino" class="ancho__total__input form-control origen__aporte__patronal__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__decimo__tercero__restante__destino" class="ancho__total__input form-control origen__decimo__tercero__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__decimo__cuarto__restante__destino" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__fondos__de__reserva__restante__destino" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__salarios__restante__destino" class="ancho__total__input form-control origen__salarios__restante__clase__destino" readonly=""/> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__restante__destino" class="ancho__total__input obligatorios__2 form-control origen__restante__clase__destino" readonly=""/> </td> </tr> <tr> <td>Diciembre (Monto modificado)</td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__aporte__patronal__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase__destino enlace__diciembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__decimo__tercero__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase__destino enlace__diciembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__decimo__cuarto__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase__destino enlace__diciembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__fondos__de__reserva__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase__destino enlace__diciembre__destino" value="0" /> </td> <td style="font-weight:bold;"> <input style="font-size:10px!important;" id="diciembre__origen__salarios__ingresar__destino" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase__destino enlace__diciembre__destino" value="0" /> </td> <td style="font-weight:bold;"></td> </tr>';

				// }

				$listas.=' <tr> <th></th> <th>Aporte patronal</th> <th>Décimo tercero</th> <th>Décimo cuarto</th> <th>Fondos de reserva</th> <th>Sueldo</th> <th>Total Modificación</th> </tr> <tr> <td class="vertical__aign" style="font-weight: bold;"> <center>Total Modificación</center> </td> <td> <input style="font-size:10px!important;" id="total__origen__patronal__totales__ingresados__destino" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0" /> </td> <td> <input style="font-size:10px!important;" id="total__origen__decimo__tercero__totales__ingresados__destino" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/> </td> <td> <input style="font-size:10px!important;" id="total__origen__decimo__cuarto__totales__ingresados__destino" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/> </td> <td> <input style="font-size:10px!important;" id="total__origen__fondos__de__reserva__totales__ingresados__destino" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/> </td> <td> <input style="font-size:10px!important;" id="total__origen__salarios__totales__ingresados__destino" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/> </td> <td> <div style="display:flex; flex-direction: column;"> <input style="font-size:10px!important;" id="totalMesAsignados__destinos" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/> <button type="button" id="calcularTotales__destino" name="calcularTotales__destino" class="btn btn-primary">Calcular</button> </div> </td> <td> </td> </tr>';

			}

			$listas.='</tbody></table>';

			$listas.='
			<script>

				$.getScript("layout/scripts/js/validacionBasica.js",function(){

					funcion__solo__numero__montos($(".solo__numero__montos"));
					funcion__cambio__de__numero($(".solo__numero__montos"));

					var paqueteDeDatos = new FormData();

					let idSueldos = '.$idHonorariosS.';

					paqueteDeDatos.append("tipo", "completa_informacion_sueldos_data");
					paqueteDeDatos.append("idSueldos", idSueldos);

					$.ajax({

						type: "POST",
						url: "modelosBd/inserta/seleccionaAccionesDisminucion.md.php",
						contentType: false,
						data: paqueteDeDatos,
						processData: false,
						cache: false,
						success: function (response) {

							var elementos = JSON.parse(response);
							var indicadorInformacion = elementos["indicadorInformacion"];
							var dataBloqueos=elementos["dataBloqueos"];

							for (z of indicadorInformacion) {


								let divididosTercero=parseFloat(z.decimoTercera)/12;
								let divididosCuarto=parseFloat(z.decimoCuarta)/12;
								
								if(parseFloat(z.enero)==0){

									$("#enero__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#enero__origen__decimo__cuarto__destino").val(0):$("#enero__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#enero__origen__decimo__tercero__destino").val(0):$("#enero__origen__decimo__tercero__destino").val(0);
									$("#enero__origen__fondos__de__reserva__destino").val(0);
									$("#enero__origen__salarios__destino").val(0);
									
									$("#enero__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#enero__origen__decimo__cuarto__restante__destino").val(0):$("#enero__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#enero__origen__decimo__tercero__restante__destino").val(0):$("#enero__origen__decimo__tercero__restante__destino").val(0);
									$("#enero__origen__fondos__de__reserva__restante__destino").val(0);
									$("#enero__origen__salarios__restante__destino").val(0);


								}else{

									$("#enero__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#enero__origen__decimo__cuarto__destino").val(divididosCuarto):$("#enero__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#enero__origen__decimo__tercero__destino").val(divididosTercero):$("#enero__origen__decimo__tercero__destino").val(0);
									$("#enero__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#enero__origen__salarios__destino").val(z.sueldoSalario);
									
									$("#enero__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#enero__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#enero__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#enero__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#enero__origen__decimo__tercero__restante__destino").val(0);
									$("#enero__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#enero__origen__salarios__restante__destino").val(z.sueldoSalario);



								}

								if(parseFloat(z.febrero)==0){


									$("#febrero__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#febrero__origen__decimo__cuarto__destino").val(0):$("#febrero__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#febrero__origen__decimo__tercero__destino").val(0):$("#febrero__origen__decimo__tercero__destino").val(0);
									$("#febrero__origen__fondos__de__reserva__destino").val(0);
									$("#febrero__origen__salarios__destino").val(0);

									$("#febrero__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#febrero__origen__decimo__cuarto__restante__destino").val(0):$("#febrero__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#febrero__origen__decimo__tercero__restante__destino").val(0):$("#febrero__origen__decimo__tercero__restante__destino").val(0);
									$("#febrero__origen__fondos__de__reserva__restante__destino").val(0);
									$("#febrero__origen__salarios__restante__destino").val(0);

								}else{


									$("#febrero__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#febrero__origen__decimo__cuarto__destino").val(divididosCuarto):$("#febrero__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#febrero__origen__decimo__tercero__destino").val(divididosTercero):$("#febrero__origen__decimo__tercero__destino").val(0);
									$("#febrero__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#febrero__origen__salarios__destino").val(z.sueldoSalario);

									$("#febrero__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#febrero__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#febrero__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#febrero__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#febrero__origen__decimo__tercero__restante__destino").val(0);
									$("#febrero__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#febrero__origen__salarios__restante__destino").val(z.sueldoSalario);

								}

								if(parseFloat(z.marzo)==0){

									$("#marzo__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#marzo__origen__decimo__cuarto__destino").val(0): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto__destino").val(z.decimoCuarta) : $("#marzo__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#marzo__origen__decimo__tercero__destino").val(0):$("#marzo__origen__decimo__tercero__destino").val(0);
									$("#marzo__origen__fondos__de__reserva__destino").val(0);
									$("#marzo__origen__salarios__destino").val(0);

									$("#marzo__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#marzo__origen__decimo__cuarto__restante__destino").val(0): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto__restante__destino").val(z.decimoCuarta) : $("#marzo__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#marzo__origen__decimo__tercero__restante__destino").val(0):$("#marzo__origen__decimo__tercero__restante__destino").val(0);
									$("#marzo__origen__fondos__de__reserva__restante__destino").val(0);
									$("#marzo__origen__salarios__restante__destino").val(0);

								}else{

									$("#marzo__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#marzo__origen__decimo__cuarto__destino").val(divididosCuarto): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto__destino").val(z.decimoCuarta) : $("#marzo__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#marzo__origen__decimo__tercero__destino").val(divididosTercero):$("#marzo__origen__decimo__tercero__destino").val(0);
									$("#marzo__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#marzo__origen__salarios__destino").val(z.sueldoSalario);

									$("#marzo__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#marzo__origen__decimo__cuarto__restante__destino").val(divididosCuarto): z.regimen=="Costa" ? $("#marzo__origen__decimo__cuarto__restante__destino").val(z.decimoCuarta) : $("#marzo__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#marzo__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#marzo__origen__decimo__tercero__restante__destino").val(0);
									$("#marzo__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#marzo__origen__salarios__restante__destino").val(z.sueldoSalario);									

								}

								if(parseFloat(z.abril)==0){

									$("#abril__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#abril__origen__decimo__cuarto__destino").val(0):$("#abril__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#abril__origen__decimo__tercero__destino").val(0):$("#abril__origen__decimo__tercero__destino").val(0);
									$("#abril__origen__fondos__de__reserva__destino").val(0);
									$("#abril__origen__salarios__destino").val(0);

									$("#abril__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#abril__origen__decimo__cuarto__restante__destino").val(0):$("#abril__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#abril__origen__decimo__tercero__restante__destino").val(0):$("#abril__origen__decimo__tercero__restante__destino").val(0);
									$("#abril__origen__fondos__de__reserva__restante__destino").val(0);
									$("#abril__origen__salarios__restante__destino").val(0);

								}else{

									$("#abril__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#abril__origen__decimo__cuarto__destino").val(divididosCuarto):$("#abril__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#abril__origen__decimo__tercero__destino").val(divididosTercero):$("#abril__origen__decimo__tercero__destino").val(0);
									$("#abril__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#abril__origen__salarios__destino").val(z.sueldoSalario);

									$("#abril__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#abril__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#abril__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#abril__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#abril__origen__decimo__tercero__restante__destino").val(0);
									$("#abril__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#abril__origen__salarios__restante__destino").val(z.sueldoSalario);


								}

								if(parseFloat(z.mayo)==0){


									$("#mayo__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#mayo__origen__decimo__cuarto__destino").val(0):$("#mayo__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#mayo__origen__decimo__tercero__destino").val(0):$("#mayo__origen__decimo__tercero__destino").val(0);
									$("#mayo__origen__fondos__de__reserva__destino").val(0);
									$("#mayo__origen__salarios__destino").val(0);

									$("#mayo__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#mayo__origen__decimo__cuarto__restante__destino").val(0):$("#mayo__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#mayo__origen__decimo__tercero__restante__destino").val(0):$("#mayo__origen__decimo__tercero__restante__destino").val(0);
									$("#mayo__origen__fondos__de__reserva__restante__destino").val(0);
									$("#mayo__origen__salarios__restante__destino").val(0);

								}else{

									$("#mayo__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#mayo__origen__decimo__cuarto__destino").val(divididosCuarto):$("#mayo__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#mayo__origen__decimo__tercero__destino").val(divididosTercero):$("#mayo__origen__decimo__tercero__destino").val(0);
									$("#mayo__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#mayo__origen__salarios__destino").val(z.sueldoSalario);

									$("#mayo__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#mayo__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#mayo__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#mayo__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#mayo__origen__decimo__tercero__restante__destino").val(0);
									$("#mayo__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#mayo__origen__salarios__restante__destino").val(z.sueldoSalario);

								}

								if(parseFloat(z.junio)==0){

									$("#junio__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#junio__origen__decimo__cuarto__destino").val(0):$("#junio__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#junio__origen__decimo__tercero__destino").val(0):$("#junio__origen__decimo__tercero__destino").val(0);
									$("#junio__origen__fondos__de__reserva__destino").val(0);
									$("#junio__origen__salarios__destino").val(0);


									$("#junio__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#junio__origen__decimo__cuarto__restante__destino").val(0):$("#junio__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#junio__origen__decimo__tercero__restante__destino").val(0):$("#junio__origen__decimo__tercero__restante__destino").val(0);
									$("#junio__origen__fondos__de__reserva__restante__destino").val(0);
									$("#junio__origen__salarios__restante__destino").val(0);


								}else{

									$("#junio__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#junio__origen__decimo__cuarto__destino").val(divididosCuarto):$("#junio__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#junio__origen__decimo__tercero__destino").val(divididosTercero):$("#junio__origen__decimo__tercero__destino").val(0);
									$("#junio__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#junio__origen__salarios__destino").val(z.sueldoSalario);


									$("#junio__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#junio__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#junio__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#junio__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#junio__origen__decimo__tercero__restante__destino").val(0);
									$("#junio__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#junio__origen__salarios__restante__destino").val(z.sueldoSalario);


								}

								if(parseFloat(z.junio)==0){

									$("#julio__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#julio__origen__decimo__cuarto__destino").val(0):$("#julio__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#julio__origen__decimo__tercero__destino").val(0):$("#julio__origen__decimo__tercero__destino").val(0);
									$("#julio__origen__fondos__de__reserva__destino").val(0);
									$("#julio__origen__salarios__destino").val(0);


									$("#julio__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#julio__origen__decimo__cuarto__restante__destino").val(0):$("#julio__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#julio__origen__decimo__tercero__restante__destino").val(0):$("#julio__origen__decimo__tercero__restante__destino").val(0);
									$("#julio__origen__fondos__de__reserva__restante__destino").val(0);
									$("#julio__origen__salarios__restante__destino").val(0);



								}else{

									$("#julio__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#julio__origen__decimo__cuarto__destino").val(divididosCuarto):$("#julio__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#julio__origen__decimo__tercero__destino").val(divididosTercero):$("#julio__origen__decimo__tercero__destino").val(0);
									$("#julio__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#julio__origen__salarios__destino").val(z.sueldoSalario);


									$("#julio__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#julio__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#julio__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#julio__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#julio__origen__decimo__tercero__restante__destino").val(0);
									$("#julio__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#julio__origen__salarios__restante__destino").val(z.sueldoSalario);

								}

								if(parseFloat(z.agosto)==0){

									$("#agosto__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#agosto__origen__decimo__cuarto__destino").val(0): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto__destino").val(z.decimoCuarta) : $("#agosto__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#agosto__origen__decimo__tercero__destino").val(0):$("#agosto__origen__decimo__tercero__destino").val(0);
									$("#agosto__origen__fondos__de__reserva__destino").val(0);
									$("#agosto__origen__salarios__destino").val(0);


									$("#agosto__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#agosto__origen__decimo__cuarto__restante__destino").val(0): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto__restante__destino").val(z.decimoCuarta) : $("#agosto__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#agosto__origen__decimo__tercero__restante__destino").val(0):$("#agosto__origen__decimo__tercero__restante__destino").val(0);
									$("#agosto__origen__fondos__de__reserva__restante__destino").val(0);
									$("#agosto__origen__salarios__restante__destino").val(0);

								}else{

									$("#agosto__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#agosto__origen__decimo__cuarto__destino").val(divididosCuarto): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto__destino").val(z.decimoCuarta) : $("#agosto__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#agosto__origen__decimo__tercero__destino").val(divididosTercero):$("#agosto__origen__decimo__tercero__destino").val(0);
									$("#agosto__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#agosto__origen__salarios__destino").val(z.sueldoSalario);


									$("#agosto__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#agosto__origen__decimo__cuarto__restante__destino").val(divididosCuarto): z.regimen=="Amazonia" || z.regimen=="Sierra"  ? $("#agosto__origen__decimo__cuarto__restante__destino").val(z.decimoCuarta) : $("#agosto__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#agosto__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#agosto__origen__decimo__tercero__restante__destino").val(0);
									$("#agosto__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#agosto__origen__salarios__restante__destino").val(z.sueldoSalario);


								}

								if(parseFloat(z.septiembre)==0){

									$("#septiembre__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#septiembre__origen__decimo__cuarto__destino").val(0):$("#septiembre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#septiembre__origen__decimo__tercero__destino").val(0):$("#septiembre__origen__decimo__tercero__destino").val(0);
									$("#septiembre__origen__fondos__de__reserva__destino").val(0);
									$("#septiembre__origen__salarios__destino").val(0);


									$("#septiembre__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#septiembre__origen__decimo__cuarto__restante__destino").val(0):$("#septiembre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#septiembre__origen__decimo__tercero__restante__destino").val(0):$("#septiembre__origen__decimo__tercero__restante__destino").val(0);
									$("#septiembre__origen__fondos__de__reserva__restante__destino").val(0);
									$("#septiembre__origen__salarios__restante__destino").val(0);



								}else{

									$("#septiembre__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#septiembre__origen__decimo__cuarto__destino").val(divididosCuarto):$("#septiembre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#septiembre__origen__decimo__tercero__destino").val(divididosTercero):$("#septiembre__origen__decimo__tercero__destino").val(0);
									$("#septiembre__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#septiembre__origen__salarios__destino").val(z.sueldoSalario);


									$("#septiembre__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#septiembre__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#septiembre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#septiembre__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#septiembre__origen__decimo__tercero__restante__destino").val(0);
									$("#septiembre__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#septiembre__origen__salarios__restante__destino").val(z.sueldoSalario);


								}


								if(parseFloat(z.octubre)==0){


									$("#octubre__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#octubre__origen__decimo__cuarto__destino").val(0):$("#octubre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#octubre__origen__decimo__tercero__destino").val(0):$("#octubre__origen__decimo__tercero__destino").val(0);
									$("#octubre__origen__fondos__de__reserva__destino").val(0);
									$("#octubre__origen__salarios__destino").val(0);



									$("#octubre__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#octubre__origen__decimo__cuarto__restante__destino").val(0):$("#octubre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#octubre__origen__decimo__tercero__restante__destino").val(0):$("#octubre__origen__decimo__tercero__restante__destino").val(0);
									$("#octubre__origen__fondos__de__reserva__restante__destino").val(0);
									$("#octubre__origen__salarios__restante__destino").val(0);


								}else{

									$("#octubre__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#octubre__origen__decimo__cuarto__destino").val(divididosCuarto):$("#octubre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#octubre__origen__decimo__tercero__destino").val(divididosTercero):$("#octubre__origen__decimo__tercero__destino").val(0);
									$("#octubre__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#octubre__origen__salarios__destino").val(z.sueldoSalario);



									$("#octubre__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#octubre__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#octubre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#octubre__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#octubre__origen__decimo__tercero__restante__destino").val(0);
									$("#octubre__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#octubre__origen__salarios__restante__destino").val(z.sueldoSalario);									

								}


								if(parseFloat(z.noviembre)==0){

									$("#noviembre__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#noviembre__origen__decimo__cuarto__destino").val(0):$("#noviembre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#noviembre__origen__decimo__tercero__destino").val(0):$("#noviembre__origen__decimo__tercero__destino").val(0);
									$("#noviembre__origen__fondos__de__reserva__destino").val(0);
									$("#noviembre__origen__salarios__destino").val(0);


									$("#noviembre__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#noviembre__origen__decimo__cuarto__restante__destino").val(0):$("#noviembre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#noviembre__origen__decimo__tercero__restante__destino").val(0):$("#noviembre__origen__decimo__tercero__restante__destino").val(0);
									$("#noviembre__origen__fondos__de__reserva__restante__destino").val(0);
									$("#noviembre__origen__salarios__restante__destino").val(0);

								}else{

									$("#noviembre__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#noviembre__origen__decimo__cuarto__destino").val(divididosCuarto):$("#noviembre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#noviembre__origen__decimo__tercero__destino").val(divididosTercero):$("#noviembre__origen__decimo__tercero__destino").val(0);
									$("#noviembre__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#noviembre__origen__salarios__destino").val(z.sueldoSalario);


									$("#noviembre__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#noviembre__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#noviembre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#noviembre__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#noviembre__origen__decimo__tercero__restante__destino").val(0);
									$("#noviembre__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#noviembre__origen__salarios__restante__destino").val(z.sueldoSalario);


								}

								if(parseFloat(z.diciembre)==0){

									$("#diciembre__origen__aporte__patronal__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#diciembre__origen__decimo__cuarto__destino").val(0):$("#diciembre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#diciembre__origen__decimo__tercero__destino").val(0):$("#diciembre__origen__decimo__tercero__destino").val(z.decimoTercera);
									$("#diciembre__origen__fondos__de__reserva__destino").val(0);
									$("#diciembre__origen__salarios__destino").val(0);


									$("#diciembre__origen__aporte__patronal__restante__destino").val(0);
									z.menusalizaCuarta=="si" ? $("#diciembre__origen__decimo__cuarto__restante__destino").val(0):$("#diciembre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#diciembre__origen__decimo__tercero__restante__destino").val(0):$("#diciembre__origen__decimo__tercero__restante__destino").val(z.decimoTercera);
									$("#diciembre__origen__fondos__de__reserva__restante__destino").val(0);
									$("#diciembre__origen__salarios__restante__destino").val(0);


								}else{

									$("#diciembre__origen__aporte__patronal__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#diciembre__origen__decimo__cuarto__destino").val(divididosCuarto):$("#diciembre__origen__decimo__cuarto__destino").val(0);
									z.mensualizaTercera=="si" ? $("#diciembre__origen__decimo__tercero__destino").val(divididosTercero):$("#diciembre__origen__decimo__tercero__destino").val(z.decimoTercera);
									$("#diciembre__origen__fondos__de__reserva__destino").val(z.fondosReserva);
									$("#diciembre__origen__salarios__destino").val(z.sueldoSalario);


									$("#diciembre__origen__aporte__patronal__restante__destino").val(z.aportePatronal);
									z.menusalizaCuarta=="si" ? $("#diciembre__origen__decimo__cuarto__restante__destino").val(divididosCuarto):$("#diciembre__origen__decimo__cuarto__restante__destino").val(0);
									z.mensualizaTercera=="si" ? $("#diciembre__origen__decimo__tercero__restante__destino").val(divididosTercero):$("#diciembre__origen__decimo__tercero__restante__destino").val(z.decimoTercera);
									$("#diciembre__origen__fondos__de__reserva__restante__destino").val(z.fondosReserva);
									$("#diciembre__origen__salarios__restante__destino").val(z.sueldoSalario);

								}


								
								let sumatores=0;


								let sumatoreEnero=0;
								let sumatoreFebrero=0;
								let sumatoreMarzo=0;
								let sumatoreAbril=0;
								let sumatoreMayo=0;
								let sumatoreJunio=0;
								let sumatoreJulio=0;
								let sumatoreAgosto=0;
								let sumatoreSeptiembre=0;
								let sumatoreOctubre=0;
								let sumatoreNoviembre=0;
								let sumatoreDiciembre=0;

							sumatoreEnero=parseFloat($("#enero__origen__aporte__patronal__destino").val()) +  parseFloat($("#enero__origen__decimo__tercero__destino").val())  +  parseFloat($("#enero__origen__decimo__cuarto__destino").val()) +  parseFloat($("#enero__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#enero__origen__salarios__destino").val());
							sumatoreFebrero=parseFloat($("#febrero__origen__aporte__patronal__destino").val()) +  parseFloat($("#febrero__origen__decimo__tercero__destino").val())  +  parseFloat($("#febrero__origen__decimo__cuarto__destino").val()) +  parseFloat($("#febrero__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#febrero__origen__salarios__destino").val());
							sumatoreMarzo=parseFloat($("#marzo__origen__aporte__patronal__destino").val()) +  parseFloat($("#marzo__origen__decimo__tercero__destino").val())  +  parseFloat($("#marzo__origen__decimo__cuarto__destino").val()) +  parseFloat($("#marzo__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#marzo__origen__salarios__destino").val());
							sumatoreAbril=parseFloat($("#abril__origen__aporte__patronal__destino").val()) +  parseFloat($("#abril__origen__decimo__tercero__destino").val())  +  parseFloat($("#abril__origen__decimo__cuarto__destino").val()) +  parseFloat($("#abril__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#abril__origen__salarios__destino").val());
							sumatoreMayo=parseFloat($("#mayo__origen__aporte__patronal__destino").val()) +  parseFloat($("#mayo__origen__decimo__tercero__destino").val())  +  parseFloat($("#mayo__origen__decimo__cuarto__destino").val()) +  parseFloat($("#mayo__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#mayo__origen__salarios__destino").val());
							sumatoreJunio=parseFloat($("#junio__origen__aporte__patronal__destino").val()) +  parseFloat($("#junio__origen__decimo__tercero__destino").val())  +  parseFloat($("#junio__origen__decimo__cuarto__destino").val()) +  parseFloat($("#junio__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#junio__origen__salarios__destino").val());
							sumatoreJulio=parseFloat($("#julio__origen__aporte__patronal__destino").val()) +  parseFloat($("#julio__origen__decimo__tercero__destino").val())  +  parseFloat($("#julio__origen__decimo__cuarto__destino").val()) +  parseFloat($("#julio__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#julio__origen__salarios__destino").val());
							sumatoreAgosto=parseFloat($("#agosto__origen__aporte__patronal__destino").val()) +  parseFloat($("#agosto__origen__decimo__tercero__destino").val())  +  parseFloat($("#agosto__origen__decimo__cuarto__destino").val()) +  parseFloat($("#agosto__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#agosto__origen__salarios__destino").val());
							sumatoreSeptiembre=parseFloat($("#septiembre__origen__aporte__patronal__destino").val()) +  parseFloat($("#septiembre__origen__decimo__tercero__destino").val())  +  parseFloat($("#septiembre__origen__decimo__cuarto__destino").val()) +  parseFloat($("#septiembre__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#septiembre__origen__salarios__destino").val());
							sumatoreOctubre=parseFloat($("#octubre__origen__aporte__patronal__destino").val()) +  parseFloat($("#octubre__origen__decimo__tercero__destino").val())  +  parseFloat($("#octubre__origen__decimo__cuarto__destino").val()) +  parseFloat($("#octubre__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#octubre__origen__salarios__destino").val());
							sumatoreNoviembre=parseFloat($("#noviembre__origen__aporte__patronal__destino").val()) +  parseFloat($("#noviembre__origen__decimo__tercero__destino").val())  +  parseFloat($("#noviembre__origen__decimo__cuarto__destino").val()) +  parseFloat($("#noviembre__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#noviembre__origen__salarios__destino").val());
							sumatoreDiciembre=parseFloat($("#diciembre__origen__aporte__patronal__destino").val()) +  parseFloat($("#diciembre__origen__decimo__tercero__destino").val())  +  parseFloat($("#diciembre__origen__decimo__cuarto__destino").val()) +  parseFloat($("#diciembre__origen__fondos__de__reserva__destino").val()) +  parseFloat($("#diciembre__origen__salarios__destino").val());



				
								$("#enero__origen__destino").val(parseFloat(sumatoreEnero).toFixed(2));
								$("#febrero__origen__destino").val(parseFloat(sumatoreFebrero).toFixed(2));
								$("#marzo__origen__destino").val(parseFloat(sumatoreMarzo).toFixed(2));
								$("#abril__origen__destino").val(parseFloat(sumatoreAbril).toFixed(2));
								$("#mayo__origen__destino").val(parseFloat(sumatoreMayo).toFixed(2));
								$("#junio__origen__destino").val(parseFloat(sumatoreJunio).toFixed(2));
								$("#julio__origen__destino").val(parseFloat(sumatoreJulio).toFixed(2));
								$("#agosto__origen__destino").val(parseFloat(sumatoreAgosto).toFixed(2));
								$("#septiembre__origen__destino").val(parseFloat(sumatoreSeptiembre).toFixed(2));
								$("#octubre__origen__destino").val(parseFloat(sumatoreOctubre).toFixed(2));
								$("#noviembre__origen__destino").val(parseFloat(sumatoreNoviembre).toFixed(2));
								$("#diciembre__origen__destino").val(parseFloat(sumatoreDiciembre).toFixed(2));
								$("#total__origen__destino").val(parseFloat(z.total).toFixed(2));

								
								$("#enero__origen__restante__destino").val(parseFloat(sumatoreEnero).toFixed(2));
								$("#febrero__origen__restante__destino").val(parseFloat(sumatoreFebrero).toFixed(2));
								$("#marzo__origen__restante__destino").val(parseFloat(sumatoreMarzo).toFixed(2));
								$("#abril__origen__restante__destino").val(parseFloat(sumatoreAbril).toFixed(2));
								$("#mayo__origen__restante__destino").val(parseFloat(sumatoreMayo).toFixed(2));
								$("#junio__origen__restante__destino").val(parseFloat(sumatoreJunio).toFixed(2));
								$("#julio__origen__restante__destino").val(parseFloat(sumatoreJulio).toFixed(2));
								$("#agosto__origen__restante__destino").val(parseFloat(sumatoreAgosto).toFixed(2));
								$("#septiembre__origen__restante__destino").val(parseFloat(sumatoreSeptiembre).toFixed(2));
								$("#octubre__origen__restante__destino").val(parseFloat(sumatoreOctubre).toFixed(2));
								$("#noviembre__origen__restante__destino").val(parseFloat(sumatoreNoviembre).toFixed(2));
								$("#diciembre__origen__restante__destino").val(parseFloat(sumatoreDiciembre).toFixed(2));
								
								
							}

							$(".oculto__tabla__destino").show();


							var sumarSueldosModificaciones__auto__llamados=function(clase__origen,total__fila){

								let sumadorClases=0;

								$(clase__origen).each(function(index) {
									sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
								});

								$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

							}

							sumarSueldosModificaciones__auto__llamados($(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__destino"));
							sumarSueldosModificaciones__auto__llamados($(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__destino"));	
							sumarSueldosModificaciones__auto__llamados($(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__destino"));	
							sumarSueldosModificaciones__auto__llamados($(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__destino"));	
							sumarSueldosModificaciones__auto__llamados($(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__destino"));					

							

						},
						error: function () {

						}

					});

					var calculas__modificaciones__destino=function(boton){

						$(boton).on("click", function (e){

							let sumadores=0;

							sumadores=parseFloat($("#total__origen__patronal__totales__ingresados__destino").val()) + parseFloat($("#total__origen__decimo__tercero__totales__ingresados__destino").val()) + parseFloat($("#total__origen__decimo__cuarto__totales__ingresados__destino").val()) + parseFloat($("#total__origen__fondos__de__reserva__totales__ingresados__destino").val()) + parseFloat($("#total__origen__salarios__totales__ingresados__destino").val());

							$("#totalMesAsignados__destinos").val(parseFloat(sumadores).toFixed(2));

						});

					}
					calculas__modificaciones__destino($("#calcularTotales__destino"));

					var sumarSueldosModificaciones__destino=function(ingresar,origen__dato,restante__dato,clase__origen,total__fila,total__fila__u,total__fila__u__restantante,clase__origen__total,total__asignados,total__rescatado,clase__origen__dos){

						$(ingresar).on("blur", function (e){

							let restadorIndividuales=0;
							let sumadorClases=0;
							let restaFilas__u=0;
							let sumadorClases2=0;
							let sumatoresTotalesIngresos=0;

							sumadorIndividuales=parseFloat($(origen__dato).val()) + parseFloat($(this).val());


							if (parseFloat($(this).val())>$("#totalOrigen").val()) {

								alertify.set("notifier","position", "top-center");
								alertify.notify("El valor supera al valor total de asignación que es "+$("#totalOrigen").val(), "error", 10, function(){}); 

								$(this).val(0);

								$(restante__dato).val($(origen__dato).val());


								$(clase__origen).each(function(index) {
									sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
								});

								$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

								
								$(total__fila__u__restantante).val(parseFloat(total__fila__u).toFied(2));

								$(clase__origen__total).each(function(index) {
									sumadorClases2=parseFloat(sumadorClases2)+parseFloat($(this).val());
								});

								$(total__asignados).val(parseFloat(sumadorClases2).toFixed(2));



								$(total__rescatado).val(0);

							}else{

								$(restante__dato).val(sumadorIndividuales);

								
								$(clase__origen).each(function(index) {
									sumadorClases=parseFloat(sumadorClases)+parseFloat($(this).val());
								});

								$(total__fila).val(parseFloat(sumadorClases).toFixed(2));

								

								restaFilas__u=parseFloat($(total__fila__u).val()) + parseFloat($(this).val());

								$(total__fila__u__restantante).val(parseFloat(restaFilas__u).toFixed(2));

								$(clase__origen__total).each(function(index) {
									sumadorClases2=parseFloat(sumadorClases2)+parseFloat($(this).val());
								});

								$(total__asignados).val(parseFloat(sumadorClases2).toFixed(2));


								$(clase__origen__dos).each(function(index) {
									sumatoresTotalesIngresos=parseFloat(sumatoresTotalesIngresos)+parseFloat($(this).val());
								});

								$(total__rescatado).val(parseFloat(sumatoresTotalesIngresos).toFixed(2));

							}

						});

					}


					sumarSueldosModificaciones__destino($("#enero__origen__aporte__patronal__ingresar__destino"),$("#enero__origen__aporte__patronal__destino"),$("#enero__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#enero__origen__destino"),$("#enero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#febrero__origen__aporte__patronal__ingresar__destino"),$("#febrero__origen__aporte__patronal__destino"),$("#febrero__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#febrero__origen__destino"),$("#febrero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#marzo__origen__aporte__patronal__ingresar__destino"),$("#marzo__origen__aporte__patronal__destino"),$("#marzo__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#marzo__origen__destino"),$("#marzo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#abril__origen__aporte__patronal__ingresar__destino"),$("#abril__origen__aporte__patronal__destino"),$("#abril__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#abril__origen__destino"),$("#abril__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#mayo__origen__aporte__patronal__ingresar__destino"),$("#mayo__origen__aporte__patronal__destino"),$("#mayo__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#mayo__origen__destino"),$("#mayo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#junio__origen__aporte__patronal__ingresar__destino"),$("#junio__origen__aporte__patronal__destino"),$("#junio__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#junio__origen__destino"),$("#junio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#julio__origen__aporte__patronal__ingresar__destino"),$("#julio__origen__aporte__patronal__destino"),$("#julio__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#julio__origen__destino"),$("#julio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#agosto__origen__aporte__patronal__ingresar__destino"),$("#agosto__origen__aporte__patronal__destino"),$("#agosto__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#agosto__origen__destino"),$("#agosto__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#septiembre__origen__aporte__patronal__ingresar__destino"),$("#septiembre__origen__aporte__patronal__destino"),$("#septiembre__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#septiembre__origen__destino"),$("#septiembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#octubre__origen__aporte__patronal__ingresar__destino"),$("#octubre__origen__aporte__patronal__destino"),$("#octubre__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#octubre__origen__destino"),$("#octubre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#noviembre__origen__aporte__patronal__ingresar__destino"),$("#noviembre__origen__aporte__patronal__destino"),$("#noviembre__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#noviembre__origen__destino"),$("#noviembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#diciembre__origen__aporte__patronal__ingresar__destino"),$("#diciembre__origen__aporte__patronal__destino"),$("#diciembre__origen__aporte__patronal__restante__destino"),$(".origen__aporte__patronal__restante__clase__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$("#diciembre__origen__destino"),$("#diciembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__patronal__totales__ingresados__destino"),$(".origen__aporte__patronal__ingresar__clase__destino"));


					sumarSueldosModificaciones__destino($("#enero__origen__decimo__tercero__ingresar__destino"),$("#enero__origen__decimo__tercero__destino"),$("#enero__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#enero__origen__destino"),$("#enero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#febrero__origen__decimo__tercero__ingresar__destino"),$("#febrero__origen__decimo__tercero__destino"),$("#febrero__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#febrero__origen__destino"),$("#febrero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#marzo__origen__decimo__tercero__ingresar__destino"),$("#marzo__origen__decimo__tercero__destino"),$("#marzo__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#marzo__origen__destino"),$("#marzo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#abril__origen__decimo__tercero__ingresar__destino"),$("#abril__origen__decimo__tercero__destino"),$("#abril__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#abril__origen__destino"),$("#abril__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#mayo__origen__decimo__tercero__ingresar__destino"),$("#mayo__origen__decimo__tercero__destino"),$("#mayo__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#mayo__origen__destino"),$("#mayo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#junio__origen__decimo__tercero__ingresar__destino"),$("#junio__origen__decimo__tercero__destino"),$("#junio__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#junio__origen__destino"),$("#junio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#julio__origen__decimo__tercero__ingresar__destino"),$("#julio__origen__decimo__tercero__destino"),$("#julio__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#julio__origen__destino"),$("#julio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#agosto__origen__decimo__tercero__ingresar__destino"),$("#agosto__origen__decimo__tercero__destino"),$("#agosto__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#agosto__origen__destino"),$("#agosto__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#septiembre__origen__decimo__tercero__ingresar__destino"),$("#septiembre__origen__decimo__tercero__destino"),$("#septiembre__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#septiembre__origen__destino"),$("#septiembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#octubre__origen__decimo__tercero__ingresar__destino"),$("#octubre__origen__decimo__tercero__destino"),$("#octubre__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#octubre__origen__destino"),$("#octubre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#noviembre__origen__decimo__tercero__ingresar__destino"),$("#noviembre__origen__decimo__tercero__destino"),$("#noviembre__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#noviembre__origen__destino"),$("#noviembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#diciembre__origen__decimo__tercero__ingresar__destino"),$("#diciembre__origen__decimo__tercero__destino"),$("#diciembre__origen__decimo__tercero__restante__destino"),$(".origen__decimo__tercero__restante__clase__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$("#diciembre__origen__destino"),$("#diciembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__tercero__totales__ingresados__destino"),$(".origen__decimo__tercero__ingresar__clase__destino"));


					sumarSueldosModificaciones__destino($("#enero__origen__decimo__cuarto__ingresar__destino"),$("#enero__origen__decimo__cuarto__destino"),$("#enero__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#enero__origen__destino"),$("#enero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#febrero__origen__decimo__cuarto__ingresar__destino"),$("#febrero__origen__decimo__cuarto__destino"),$("#febrero__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#febrero__origen__destino"),$("#febrero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#marzo__origen__decimo__cuarto__ingresar__destino"),$("#marzo__origen__decimo__cuarto__destino"),$("#marzo__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#marzo__origen__destino"),$("#marzo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#abril__origen__decimo__cuarto__ingresar__destino"),$("#abril__origen__decimo__cuarto__destino"),$("#abril__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#abril__origen__destino"),$("#abril__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#mayo__origen__decimo__cuarto__ingresar__destino"),$("#mayo__origen__decimo__cuarto__destino"),$("#mayo__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#mayo__origen__destino"),$("#mayo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#junio__origen__decimo__cuarto__ingresar__destino"),$("#junio__origen__decimo__cuarto__destino"),$("#junio__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#junio__origen__destino"),$("#junio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#julio__origen__decimo__cuarto__ingresar__destino"),$("#julio__origen__decimo__cuarto__destino"),$("#julio__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#julio__origen__destino"),$("#julio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#agosto__origen__decimo__cuarto__ingresar__destino"),$("#agosto__origen__decimo__cuarto__destino"),$("#agosto__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#agosto__origen__destino"),$("#agosto__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#septiembre__origen__decimo__cuarto__ingresar__destino"),$("#septiembre__origen__decimo__cuarto__destino"),$("#septiembre__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#septiembre__origen__destino"),$("#septiembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#octubre__origen__decimo__cuarto__ingresar__destino"),$("#octubre__origen__decimo__cuarto__destino"),$("#octubre__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#octubre__origen__destino"),$("#octubre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#noviembre__origen__decimo__cuarto__ingresar__destino"),$("#noviembre__origen__decimo__cuarto__destino"),$("#noviembre__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#noviembre__origen__destino"),$("#noviembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#diciembre__origen__decimo__cuarto__ingresar__destino"),$("#diciembre__origen__decimo__cuarto__destino"),$("#diciembre__origen__decimo__cuarto__restante__destino"),$(".origen__decimo__cuarto__restante__clase__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$("#diciembre__origen__destino"),$("#diciembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__decimo__cuarto__totales__ingresados__destino"),$(".origen__decimo__cuarto__ingresar__clase__destino"));


					sumarSueldosModificaciones__destino($("#enero__origen__fondos__de__reserva__ingresar__destino"),$("#enero__origen__fondos__de__reserva__destino"),$("#enero__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#enero__origen__destino"),$("#enero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#febrero__origen__fondos__de__reserva__ingresar__destino"),$("#febrero__origen__fondos__de__reserva__destino"),$("#febrero__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#febrero__origen__destino"),$("#febrero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#marzo__origen__fondos__de__reserva__ingresar__destino"),$("#marzo__origen__fondos__de__reserva__destino"),$("#marzo__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#marzo__origen__destino"),$("#marzo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#abril__origen__fondos__de__reserva__ingresar__destino"),$("#abril__origen__fondos__de__reserva__destino"),$("#abril__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#abril__origen__destino"),$("#abril__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#mayo__origen__fondos__de__reserva__ingresar__destino"),$("#mayo__origen__fondos__de__reserva__destino"),$("#mayo__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#mayo__origen__destino"),$("#mayo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#junio__origen__fondos__de__reserva__ingresar__destino"),$("#junio__origen__fondos__de__reserva__destino"),$("#junio__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#junio__origen__destino"),$("#junio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#julio__origen__fondos__de__reserva__ingresar__destino"),$("#julio__origen__fondos__de__reserva__destino"),$("#julio__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#julio__origen__destino"),$("#julio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#agosto__origen__fondos__de__reserva__ingresar__destino"),$("#agosto__origen__fondos__de__reserva__destino"),$("#agosto__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#agosto__origen__destino"),$("#agosto__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#septiembre__origen__fondos__de__reserva__ingresar__destino"),$("#septiembre__origen__fondos__de__reserva__destino"),$("#septiembre__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#septiembre__origen__destino"),$("#septiembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#octubre__origen__fondos__de__reserva__ingresar__destino"),$("#octubre__origen__fondos__de__reserva__destino"),$("#octubre__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#octubre__origen__destino"),$("#octubre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#noviembre__origen__fondos__de__reserva__ingresar__destino"),$("#noviembre__origen__fondos__de__reserva__destino"),$("#noviembre__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#noviembre__origen__destino"),$("#noviembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#diciembre__origen__fondos__de__reserva__ingresar__destino"),$("#diciembre__origen__fondos__de__reserva__destino"),$("#diciembre__origen__fondos__de__reserva__restante__destino"),$(".origen__fondos__de__reserva__restante__clase__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$("#diciembre__origen__destino"),$("#diciembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__fondos__de__reserva__totales__ingresados__destino"),$(".origen__fondos__de__reserva__ingresar__clase__destino"));


					sumarSueldosModificaciones__destino($("#enero__origen__salarios__ingresar__destino"),$("#enero__origen__salarios__destino"),$("#enero__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#enero__origen__destino"),$("#enero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#febrero__origen__salarios__ingresar__destino"),$("#febrero__origen__salarios__destino"),$("#febrero__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#febrero__origen__destino"),$("#febrero__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#marzo__origen__salarios__ingresar__destino"),$("#marzo__origen__salarios__destino"),$("#marzo__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#marzo__origen__destino"),$("#marzo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#abril__origen__salarios__ingresar__destino"),$("#abril__origen__salarios__destino"),$("#abril__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#abril__origen__destino"),$("#abril__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#mayo__origen__salarios__ingresar__destino"),$("#mayo__origen__salarios__destino"),$("#mayo__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#mayo__origen__destino"),$("#mayo__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#junio__origen__salarios__ingresar__destino"),$("#junio__origen__salarios__destino"),$("#junio__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#junio__origen__destino"),$("#junio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#julio__origen__salarios__ingresar__destino"),$("#julio__origen__salarios__destino"),$("#julio__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#julio__origen__destino"),$("#julio__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#agosto__origen__salarios__ingresar__destino"),$("#agosto__origen__salarios__destino"),$("#agosto__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#agosto__origen__destino"),$("#agosto__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#septiembre__origen__salarios__ingresar__destino"),$("#septiembre__origen__salarios__destino"),$("#septiembre__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#septiembre__origen__destino"),$("#septiembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#octubre__origen__salarios__ingresar__destino"),$("#octubre__origen__salarios__destino"),$("#octubre__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#octubre__origen__destino"),$("#octubre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#noviembre__origen__salarios__ingresar__destino"),$("#noviembre__origen__salarios__destino"),$("#noviembre__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#noviembre__origen__destino"),$("#noviembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));
					sumarSueldosModificaciones__destino($("#diciembre__origen__salarios__ingresar__destino"),$("#diciembre__origen__salarios__destino"),$("#diciembre__origen__salarios__restante__destino"),$(".origen__salarios__restante__clase__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$("#diciembre__origen__destino"),$("#diciembre__origen__restante__destino"),$(".origen__restante__clase__destino"),$("#total__origen__n__a__destino"),$("#total__origen__salarios__totales__ingresados__destino"),$(".origen__salarios__ingresar__clase__destino"));


				});

			</script>
			';

			return $listas; 

		}else if($indicador==1032){

				$query="SELECT a.idProgramacionFinanciera,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='2023' AND a.idActividad='1' AND (a.idOrganismo='$idOrganismo' AND a.perioIngreso='2023' AND a.idActividad='1') AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='2023' AND a.idActividad='1';";
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

		}else if($indicador==1036){


				$desaucio__query="SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idHonorariosS' AND opcion='desahucio';";
				$desaucio__resultado = $conexionEstablecida->query($desaucio__query);


				$despido__query="SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idHonorariosS' AND opcion='despido';";
				$despido__resultado = $conexionEstablecida->query($despido__query);

				$renuncia__query="SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idHonorariosS' AND opcion='renuncia';";
				$renuncia__resultado = $conexionEstablecida->query($renuncia__query);


				$compensacion__query="SELECT idDesvinculacion,opcion,enero,febreo AS febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_desvinculacion WHERE idSueldos='$idHonorariosS' AND opcion LIKE 'compensa%';";
				$compensacion__resultado = $conexionEstablecida->query($compensacion__query);


				while($compensacion__registro = $compensacion__resultado->fetch()) {

					$enero__compensacion__query=$compensacion__registro["enero"];
					$febrero__compensacion__query=$compensacion__registro["febrero"];
					$marzo__compensacion__query=$compensacion__registro["marzo"];
					$abril__compensacion__query=$compensacion__registro["abril"];
					$mayo__compensacion__query=$compensacion__registro["mayo"];
					$junio__compensacion__query=$compensacion__registro["junio"];
					$julio__compensacion__query=$compensacion__registro["julio"];
					$agosto__compensacion__query=$compensacion__registro["agosto"];
					$septiembre__compensacion__query=$compensacion__registro["septiembre"];
					$octubre__compensacion__query=$compensacion__registro["octubre"];
					$noviembre__compensacion__query=$compensacion__registro["noviembre"];
					$diciembre__compensacion__query=$compensacion__registro["diciembre"];

				}


				while($desaucio__registro = $desaucio__resultado->fetch()) {

					$enero__desaucio__query=$desaucio__registro["enero"];
					$febrero__desaucio__query=$desaucio__registro["febrero"];
					$marzo__desaucio__query=$desaucio__registro["marzo"];
					$abril__desaucio__query=$desaucio__registro["abril"];
					$mayo__desaucio__query=$desaucio__registro["mayo"];
					$junio__desaucio__query=$desaucio__registro["junio"];
					$julio__desaucio__query=$desaucio__registro["julio"];
					$agosto__desaucio__query=$desaucio__registro["agosto"];
					$septiembre__desaucio__query=$desaucio__registro["septiembre"];
					$octubre__desaucio__query=$desaucio__registro["octubre"];
					$noviembre__desaucio__query=$desaucio__registro["noviembre"];
					$diciembre__desaucio__query=$desaucio__registro["diciembre"];

				}


				while($despido__registro = $despido__resultado->fetch()) {

					$enero__despido__query=$despido__registro["enero"];
					$febrero__despido__query=$despido__registro["febrero"];
					$marzo__despido__query=$despido__registro["marzo"];
					$abril__despido__query=$despido__registro["abril"];
					$mayo__despido__query=$despido__registro["mayo"];
					$junio__despido__query=$despido__registro["junio"];
					$julio__despido__query=$despido__registro["julio"];
					$agosto__despido__query=$despido__registro["agosto"];
					$septiembre__despido__query=$despido__registro["septiembre"];
					$octubre__despido__query=$despido__registro["octubre"];
					$noviembre__despido__query=$despido__registro["noviembre"];
					$diciembre__despido__query=$despido__registro["diciembre"];

				}


				while($renuncia__registro = $renuncia__resultado->fetch()) {

					$enero__renuncia__query=$renuncia__registro["enero"];
					$febrero__renuncia__query=$renuncia__registro["febrero"];
					$marzo__renuncia__query=$renuncia__registro["marzo"];
					$abril__renuncia__query=$renuncia__registro["abril"];
					$mayo__renuncia__query=$renuncia__registro["mayo"];
					$junio__renuncia__query=$renuncia__registro["junio"];
					$julio__renuncia__query=$renuncia__registro["julio"];
					$agosto__renuncia__query=$renuncia__registro["agosto"];
					$septiembre__renuncia__query=$renuncia__registro["septiembre"];
					$octubre__renuncia__query=$renuncia__registro["octubre"];
					$noviembre__renuncia__query=$renuncia__registro["noviembre"];
					$diciembre__renuncia__query=$renuncia__registro["diciembre"];

				}


				$listas.='<table class="col col-12 tabla__sueldos__anadidos">';

				$listas.='

							<thead>

				                <tr>

				                  <th align="center">Mes</th>
				                  <th align="center">Compensación</br>por</br>desahucio</th>
				                  <th align="center">Despido</br>Intempestivo</th>
				                  <th align="center">Por</br>renuncia<br>voluntaria</th>
				                  <th align="center">Compensación por<br>Vacaciones no Gozadas<br>por Cesación de Funciones</th>


				                </tr>

				              </thead>

				              <tbody>

				';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Enero (Monto inicial)</center>
			                </td>

				';

				if (empty($enero__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$enero__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($enero__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$enero__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($enero__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$enero__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($enero__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$enero__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Enero (Monto restante)</center>
			                </td>

				';

				if (empty($enero__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$enero__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($enero__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$enero__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($enero__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$enero__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($enero__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="enero__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$enero__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Enero (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="enero__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__enero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="enero__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__enero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="enero__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__enero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="enero__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__enero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Febrero (Monto inicial)</center>
			                </td>

				';

				if (empty($febrero__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$febrero__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($febrero__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$febrero__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($febrero__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$febrero__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($febrero__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$febrero__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Febrero (Monto restante)</center>
			                </td>

				';

				if (empty($febrero__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$febrero__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($febrero__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$febrero__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($febrero__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$febrero__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($febrero__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="febrero__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$febrero__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Febrero (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="febrero__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__febrero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="febrero__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__febrero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="febrero__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__febrero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="febrero__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__febrero__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Marzo (Monto inicial)</center>
			                </td>

				';

				if (empty($marzo__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$marzo__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($marzo__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$marzo__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($marzo__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$marzo__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($marzo__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$marzo__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Marzo (Monto restante)</center>
			                </td>

				';

				if (empty($marzo__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$marzo__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($marzo__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$marzo__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($marzo__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$marzo__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($marzo__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="marzo__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$marzo__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Marzo (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="marzo__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__marzo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="marzo__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__marzo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="marzo__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__marzo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="marzo__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__marzo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Abril (Monto inicial)</center>
			                </td>

				';

				if (empty($abril__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$abril__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($abril__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$abril__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($abril__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$abril__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($abril__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$abril__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Abril (Monto restante)</center>
			                </td>

				';

				if (empty($abril__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$abril__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($abril__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$abril__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($abril__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$abril__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($abril__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="abril__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$abril__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Abril (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="abril__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__abril__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="abril__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__abril__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="abril__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__abril__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="abril__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__abril__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Mayo (Monto inicial)</center>
			                </td>

				';

				if (empty($mayo__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$mayo__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($mayo__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$mayo__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($mayo__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$mayo__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($mayo__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$mayo__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Mayo (Monto restante)</center>
			                </td>

				';

				if (empty($mayo__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$mayo__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($mayo__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$mayo__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($mayo__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$mayo__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($mayo__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="mayo__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$mayo__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Mayo (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="mayo__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__mayo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="mayo__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__mayo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="mayo__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__mayo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="mayo__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__mayo__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';               	

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Junio (Monto inicial)</center>
			                </td>

				';

				if (empty($junio__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$junio__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($junio__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$junio__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($junio__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$junio__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($junio__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$junio__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Junio (Monto restante)</center>
			                </td>

				';

				if (empty($junio__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$junio__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($junio__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$junio__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($junio__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$junio__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($junio__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="junio__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$junio__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Junio (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="junio__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__junio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="junio__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__junio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="junio__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__junio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="junio__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__junio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';


				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Julio (Monto inicial)</center>
			                </td>

				';

				if (empty($julio__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$julio__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($julio__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$julio__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($julio__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$julio__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($julio__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$julio__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Julio (Monto restante)</center>
			                </td>

				';

				if (empty($julio__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$julio__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($julio__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$julio__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($julio__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$julio__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($julio__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="julio__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$julio__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Julio (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="julio__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__julio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="julio__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__julio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="julio__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__julio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="julio__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__julio__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';


				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Agosto (Monto inicial)</center>
			                </td>

				';

				if (empty($agosto__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$agosto__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($agosto__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$agosto__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($agosto__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$agosto__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($agosto__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$agosto__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Agosto (Monto restante)</center>
			                </td>

				';

				if (empty($agosto__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$agosto__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($agosto__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$agosto__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($agosto__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$agosto__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($agosto__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="agosto__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$agosto__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Agosto (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="agosto__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__agosto__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="agosto__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__agosto__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="agosto__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__agosto__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="agosto__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__agosto__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Septiembre (Monto inicial)</center>
			                </td>

				';

				if (empty($septiembre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$septiembre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($septiembre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$septiembre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($septiembre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$septiembre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($septiembre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$septiembre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Septiembre (Monto restante)</center>
			                </td>

				';

				if (empty($septiembre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$septiembre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($septiembre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$septiembre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($septiembre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$septiembre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($septiembre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="septiembre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$septiembre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Septiembre (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="septiembre__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__septiembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="septiembre__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__septiembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="septiembre__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__septiembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="septiembre__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__septiembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';               	

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Octubre (Monto inicial)</center>
			                </td>

				';

				if (empty($octubre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$octubre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($octubre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$octubre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($octubre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$octubre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($octubre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$octubre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Octubre (Monto restante)</center>
			                </td>

				';

				if (empty($octubre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$octubre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($octubre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$octubre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($octubre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$octubre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($octubre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="octubre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$octubre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Octubre (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="octubre__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__octubre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="octubre__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__octubre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="octubre__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__octubre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="octubre__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__octubre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Noviembre (Monto inicial)</center>
			                </td>

				';

				if (empty($noviembre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$noviembre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($noviembre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$noviembre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($noviembre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$noviembre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($noviembre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$noviembre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Noviembre (Monto restante)</center>
			                </td>

				';

				if (empty($noviembre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$noviembre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($noviembre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$noviembre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($noviembre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$noviembre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($noviembre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="noviembre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$noviembre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Noviembre (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="noviembre__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__noviembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="noviembre__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__noviembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="noviembre__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__noviembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="noviembre__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__noviembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';


               					$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Diciembre (Monto inicial)</center>
			                </td>

				';

				if (empty($diciembre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__desahucio" class="ancho__total__input form-control destino__desahucio__clase" readonly="" value="'.$diciembre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($diciembre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__despido__intenpestivo" class="ancho__total__input form-control destino__despido__intenpestivo__clase" readonly="" value="'.$diciembre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($diciembre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__renunia__voluntaria" class="ancho__total__input form-control destino__renunia__voluntaria__clase" readonly="" value="'.$diciembre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($diciembre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__vacaciones__no__gozadas" class="ancho__total__input form-control destino__vacaciones__no__gozadas__clase" readonly="" value="'.$diciembre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';

				$listas.='

			          	<tr>

			                <td class="vertical__aign" style="font-weight:bold;">
			                  <center>Diciembre (Monto restante)</center>
			                </td>

				';

				if (empty($diciembre__desaucio__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__desahucio__restante" class="ancho__total__input form-control destino__desahucio__restante__clase" readonly="" value="'.$diciembre__desaucio__query.'"/>
               				 </td>
               		';

				}

				if (empty($diciembre__despido__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__despido__intenpestivo__restante" class="ancho__total__input form-control destino__despido__intenpestivo__restante__clase" readonly="" value="'.$diciembre__despido__query.'"/>
               				 </td>
               		';

				}



				if (empty($diciembre__renuncia__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__renunia__voluntaria__restante" class="ancho__total__input form-control destino__renunia__voluntaria__restante__clase" readonly="" value="'.$diciembre__renuncia__query.'"/>
               				 </td>
               		';

				}


				if (empty($diciembre__compensacion__query)) {
					

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="0"/>
               				 </td>
               		';

				}else{

					$listas.='

							<td style="font-weight:bold;">
                  				<input style="font-size:10px!important;" id="diciembre__destino__vacaciones__no__gozadas__restante" class="ancho__total__input form-control destino__vacaciones__no__gozadas__restante__clase" readonly="" value="'.$diciembre__compensacion__query.'"/>
               				 </td>
               		';

				}


               	$listas.='</tr>';


               	$listas.='

               		    <tr>

			                <td>Diciembre (Monto modificado)</td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="diciembre__destino__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos destino__desahucio__ingresar__clase enlace__diciembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="diciembre__destino__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos destino__despido__intenpestivo__ingresar__clase enlace__diciembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="diciembre__destino__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos destino__renunia__voluntaria__ingresar__clase enlace__diciembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>

			                <td style="font-weight:bold;">
			                  <input style="font-size:10px!important;" id="diciembre__destino__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos destino__vacaciones__no__gozadas__ingresar__clase enlace__diciembre__destino sumador__global__montos__desvinculacion__destino" value="0"/>
			                </td>


             			</tr>

               	';

               	$listas.='


	               <tr>

	                <th>Compensación</br>por</br>desahucio</th>
	                <th>Despido</br>Intempestivo</th>
	                <th>Por</br>renuncia<br>voluntaria</th>
	                <th>Compensación por<br>Vacaciones no Gozadas<br>por Cesación de Funciones</th>
	                <th>Total</th>

	              </tr>

	              <tr>

	                <td>
	                  <input style="font-size:10px!important;" id="total__destino__compensacion" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0" />
	                </td>
	                <td>
	                  <input style="font-size:10px!important;" id="total__destino__despido__intempestivo" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
	                </td>
	                <td>
	                  <input style="font-size:10px!important;" id="total__destino__renuncia__voluntaria" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
	                </td>
	                <td>
	                   <input style="font-size:10px!important;" id="total__destino__vacaciones__no__gozadas" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
	                </td>
	   
	                <td>
	                  <div style="display:flex; flex-direction: column;">
	                    <input style="font-size:10px!important;" id="totalDestino__destinoD" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
	                    <button type="button" id="calcularTotalesDestino__desvinculacion" name="calcularTotalesDestino__desvinculacion" class="btn btn-primary">Calcular</button>
	                  </div>
	                </td>

	                <td>
	                    
	                </td>


	              </tr>


               	';

				$listas.='

							 <tbody>

					</table>';

				$listas.='

					<script>

						var funcion__solo__numero__montos=function(parametro1){
											
						$(parametro1).keypress(function(event) {

						var $this = $(this);
																    
						if ((event.which != 46 || $this.val().indexOf(".") != -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) {
							event.preventDefault();
						}

						var text = $(this).val();

						if ((event.which == 46) && (text.indexOf(".") == -1)) {

							setTimeout(function() {
								
								if ($this.val().substring($this.val().indexOf(".")).length > 3) {

									$this.val($this.val().substring(0, $this.val().indexOf(".") + 3));
								}

							}, 1);
						}

						if ((text.indexOf(".") != -1) && (text.substring(text.indexOf(".")).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2)) {
							event.preventDefault();
						}
																          
						});



						$(parametro1).on("input", function () {

							this.value = this.value.replace(/[^0-9,.]/g, "").replace(",",".");

						});

						}

						funcion__solo__numero__montos($(".solo__numero__montos"));


						var funcion__cambio__de__numero=function(parametro1){

						$(parametro1).on("click", function () {

							if ($(this).val()=="0") {

								$(this).val(" ");

							}

						});

						$(parametro1).on("blur", function () {

							if ($(this).val()==" " || $(this).val()=="") {

								$(this).val("0");

							}

						});

						}

						funcion__cambio__de__numero($(".solo__numero__montos"));

						var funcion__sumador__desvinculacion__destino=function(parametro1,parametro2,parametro3){
					
						$(parametro1).on("click", function () {

							let sumadorDesaucio=0;
							let sumadorDespido=0;
							let sumadorRenuncia=0;
							let sumadorVacaciones=0;

							$(".destino__desahucio__ingresar__clase").each(function(index) {
								sumadorDesaucio=parseFloat(sumadorDesaucio)+parseFloat($(this).val());
							});


							$(".destino__despido__intenpestivo__ingresar__clase").each(function(index) {
								sumadorDespido=parseFloat(sumadorDespido)+parseFloat($(this).val());
							});



							$(".destino__renunia__voluntaria__ingresar__clase").each(function(index) {
								sumadorRenuncia=parseFloat(sumadorRenuncia)+parseFloat($(this).val());
							});


							$(".destino__vacaciones__no__gozadas__ingresar__clase").each(function(index) {
								sumadorVacaciones=parseFloat(sumadorVacaciones)+parseFloat($(this).val());
							});

							$("#total__destino__compensacion").val(parseFloat(sumadorDesaucio).toFixed(2));
							$("#total__destino__despido__intempestivo").val(parseFloat(sumadorDespido).toFixed(2));
							$("#total__destino__renuncia__voluntaria").val(parseFloat(sumadorRenuncia).toFixed(2));
							$("#total__destino__vacaciones__no__gozadas").val(parseFloat(sumadorVacaciones).toFixed(2));

							let sumadorDeTotales=sumadorDesaucio+sumadorDespido+sumadorRenuncia+sumadorVacaciones;

							$("#totalDestino__destinoD").val(parseFloat(sumadorDeTotales).toFixed(2));


						});

					}

					funcion__sumador__desvinculacion__destino($("#calcularTotalesDestino__desvinculacion"));



					var funcion__actualizador__desvinculaciones=function(parametro1,parametro2,parametro3){
										
						$(parametro1).on("input", function () {

							restadores=parseFloat($(parametro2).val()) + parseFloat($(this).val());

							if ($(this).val()>$("#totalOrigen").val()) {

								$(parametro3).val(0);

								alertify.set("notifier","position", "top-center");
								alertify.notify("El valor ingresado supera al valor total asignado en el orígen", "error", 10, function(){}); 

								$(this).val(0);

								$(parametro3).val(parseFloat($(parametro2).val()).toFixed(2));

							}else{

								$(parametro3).val(parseFloat(restadores).toFixed(2));

							}

						});

					}

					funcion__actualizador__desvinculaciones($("#enero__destino__desahucio__ingresar"),$("#enero__destino__desahucio"),$("#enero__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#febrero__destino__desahucio__ingresar"),$("#febrero__destino__desahucio"),$("#febrero__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#marzo__destino__desahucio__ingresar"),$("#marzo__destino__desahucio"),$("#marzo__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#abril__destino__desahucio__ingresar"),$("#abril__destino__desahucio"),$("#abril__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#mayo__destino__desahucio__ingresar"),$("#mayo__destino__desahucio"),$("#mayo__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#junio__destino__desahucio__ingresar"),$("#junio__destino__desahucio"),$("#junio__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#julio__destino__desahucio__ingresar"),$("#julio__destino__desahucio"),$("#julio__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#agosto__destino__desahucio__ingresar"),$("#agosto__destino__desahucio"),$("#agosto__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#septiembre__destino__desahucio__ingresar"),$("#septiembre__destino__desahucio"),$("#septiembre__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#octubre__destino__desahucio__ingresar"),$("#octubre__destino__desahucio"),$("#octubre__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#noviembre__destino__desahucio__ingresar"),$("#noviembre__destino__desahucio"),$("#noviembre__destino__desahucio__restante"));
					funcion__actualizador__desvinculaciones($("#diciembre__destino__desahucio__ingresar"),$("#diciembre__destino__desahucio"),$("#diciembre__destino__desahucio__restante"));

					funcion__actualizador__desvinculaciones($("#enero__destino__despido__intenpestivo__ingresar"),$("#enero__destino__despido__intenpestivo"),$("#enero__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#febrero__destino__despido__intenpestivo__ingresar"),$("#febrero__destino__despido__intenpestivo"),$("#febrero__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#marzo__destino__despido__intenpestivo__ingresar"),$("#marzo__destino__despido__intenpestivo"),$("#marzo__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#abril__destino__despido__intenpestivo__ingresar"),$("#abril__destino__despido__intenpestivo"),$("#abril__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#mayo__destino__despido__intenpestivo__ingresar"),$("#mayo__destino__despido__intenpestivo"),$("#mayo__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#junio__destino__despido__intenpestivo__ingresar"),$("#junio__destino__despido__intenpestivo"),$("#junio__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#julio__destino__despido__intenpestivo__ingresar"),$("#julio__destino__despido__intenpestivo"),$("#julio__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#agosto__destino__despido__intenpestivo__ingresar"),$("#agosto__destino__despido__intenpestivo"),$("#agosto__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#septiembre__destino__despido__intenpestivo__ingresar"),$("#septiembre__destino__despido__intenpestivo"),$("#septiembre__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#octubre__destino__despido__intenpestivo__ingresar"),$("#octubre__destino__despido__intenpestivo"),$("#octubre__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#noviembre__destino__despido__intenpestivo__ingresar"),$("#noviembre__destino__despido__intenpestivo"),$("#noviembre__destino__despido__intenpestivo__restante"));
					funcion__actualizador__desvinculaciones($("#diciembre__destino__despido__intenpestivo__ingresar"),$("#diciembre__destino__despido__intenpestivo"),$("#diciembre__destino__despido__intenpestivo__restante"));


					funcion__actualizador__desvinculaciones($("#enero__destino__renunia__voluntaria__ingresar"),$("#enero__destino__renunia__voluntaria"),$("#enero__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#febrero__destino__renunia__voluntaria__ingresar"),$("#febrero__destino__renunia__voluntaria"),$("#febrero__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#marzo__destino__renunia__voluntaria__ingresar"),$("#marzo__destino__renunia__voluntaria"),$("#marzo__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#abril__destino__renunia__voluntaria__ingresar"),$("#abril__destino__renunia__voluntaria"),$("#abril__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#mayo__destino__renunia__voluntaria__ingresar"),$("#mayo__destino__renunia__voluntaria"),$("#mayo__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#junio__destino__renunia__voluntaria__ingresar"),$("#junio__destino__renunia__voluntaria"),$("#junio__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#julio__destino__renunia__voluntaria__ingresar"),$("#julio__destino__renunia__voluntaria"),$("#julio__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#agosto__destino__renunia__voluntaria__ingresar"),$("#agosto__destino__renunia__voluntaria"),$("#agosto__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#septiembre__destino__renunia__voluntaria__ingresar"),$("#septiembre__destino__renunia__voluntaria"),$("#septiembre__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#octubre__destino__renunia__voluntaria__ingresar"),$("#octubre__destino__renunia__voluntaria"),$("#octubre__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#noviembre__destino__renunia__voluntaria__ingresar"),$("#noviembre__destino__renunia__voluntaria"),$("#noviembre__destino__renunia__voluntaria__restante"));
					funcion__actualizador__desvinculaciones($("#diciembre__destino__renunia__voluntaria__ingresar"),$("#diciembre__destino__renunia__voluntaria"),$("#diciembre__destino__renunia__voluntaria__restante"));
					

					funcion__actualizador__desvinculaciones($("#enero__destino__vacaciones__no__gozadas__ingresar"),$("#enero__destino__vacaciones__no__gozadas"),$("#enero__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#febrero__destino__vacaciones__no__gozadas__ingresar"),$("#febrero__destino__vacaciones__no__gozadas"),$("#febrero__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#marzo__destino__vacaciones__no__gozadas__ingresar"),$("#marzo__destino__vacaciones__no__gozadas"),$("#marzo__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#abril__destino__vacaciones__no__gozadas__ingresar"),$("#abril__destino__vacaciones__no__gozadas"),$("#abril__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#mayo__destino__vacaciones__no__gozadas__ingresar"),$("#mayo__destino__vacaciones__no__gozadas"),$("#mayo__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#junio__destino__vacaciones__no__gozadas__ingresar"),$("#junio__destino__vacaciones__no__gozadas"),$("#junio__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#julio__destino__vacaciones__no__gozadas__ingresar"),$("#julio__destino__vacaciones__no__gozadas"),$("#julio__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#agosto__destino__vacaciones__no__gozadas__ingresar"),$("#agosto__destino__vacaciones__no__gozadas"),$("#agosto__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#septiembre__destino__vacaciones__no__gozadas__ingresar"),$("#septiembre__destino__vacaciones__no__gozadas"),$("#septiembre__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#octubre__destino__vacaciones__no__gozadas__ingresar"),$("#octubre__destino__vacaciones__no__gozadas"),$("#octubre__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#noviembre__destino__vacaciones__no__gozadas__ingresar"),$("#noviembre__destino__vacaciones__no__gozadas"),$("#noviembre__destino__vacaciones__no__gozadas__restante"));
					funcion__actualizador__desvinculaciones($("#diciembre__destino__vacaciones__no__gozadas__ingresar"),$("#diciembre__destino__vacaciones__no__gozadas"),$("#diciembre__destino__vacaciones__no__gozadas__restante"));


					</script>

				';

				return $listas;


		}else if($indicador==1037){

			$query="SELECT id,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(paisnombre , 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Í'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'','') AS paisnombre  FROM poa_pais ORDER BY paisnombre;";

			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige un país-</option>";

			while($registro = $resultado->fetch()) {
			
				$listas.="<option value='".$registro["paisnombre"]."'>".utf8_decode(utf8_encode($registro["paisnombre"]))."</option>";

			}

			return $listas;

		}else if ($indicador==1038) {

			$query="SELECT DISTINCT idProvincia,nombreProvincia FROM in_md_provincias ORDER BY nombreProvincia;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige una provincia--</option>";

			while($registro = $resultado->fetch()) {
			
				$listas.="<option value='".$registro["nombreProvincia"]."'>".utf8_decode(utf8_encode($registro["nombreProvincia"]))."</option>";

			}

			return $listas;

		}else if($indicador==1039){


			$query="SELECT DISTINCT idCanton,nombreCanton FROM in_md_canton  ORDER BY nombreCanton;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige un cantón-</option>";

			while($registro = $resultado->fetch()) {
			
				$listas.="<option value='".$registro["nombreCanton"]."'>".utf8_decode(utf8_encode($registro["nombreCanton"]))."</option>";

			}

			return $listas;

		}else if($indicador==1040){

			$query="SELECT DISTINCT idParroquia,nombreParroquia FROM in_md_parroquia ORDER BY nombreParroquia;";

			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige una parroquia-</option>";

			while($registro = $resultado->fetch()) {
			
				$listas.="<option value='".$registro["nombreParroquia"]."'>".utf8_decode(utf8_encode($registro["nombreParroquia"]))."</option>";

			}

			return $listas;

		}


		}

	}


	echo lugar::lugarFuncion($indicador);

