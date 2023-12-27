<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	
	$objeto= new usuarioAcciones();
	$anioA = date('Y');
	$anio = date('Y');

	session_start();


	$periodo__traido=$_SESSION["selectorAniosA"];

	switch ($identificador) {


		case "selecciona__documentos__e":

			$thefolder = "../../repositorio/documentosPOA2022";

			if ($handler = opendir($thefolder)) {

				 while (false !== ($file = readdir($handler))) {


					if ($codigoCompuesto.".pdf"==$file) {
						$jason['archivoD']=$codigoCompuesto.".pdf";
					}else{
						$jason['archivoD']=$codigoCompuesto.".xlsx";
					}

				 }

				closedir($handler);

			}

			echo json_encode($jason);

		break;		


		case "documentos__seguimiento__2022":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia LIMIT 1) AS provincia,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=b.idCanton LIMIT 1) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=b.idParroquia LIMIT 1) AS parroquia,a.rucOrganismo,if(a.trimestre='1','PRIMER TRIMESTRE',if(a.trimestre='2','SEGUNDO TRIMESTRE',if(a.trimestre='3','TERCER TRIMESTRE','CUARTO TRIMESTRE'))) AS trimestre, a.documento,a.codigoCompuesto FROM poa_documentos2022_anexos AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.tipo='seguimiento' AND a.periodo='$periodo__traido' ORDER BY a.rucOrganismo ASC;";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;		

		case "documentos__seguimiento__2022__modificacion":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia LIMIT 1) AS provincia,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=b.idCanton LIMIT 1) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=b.idParroquia LIMIT 1) AS parroquia,a.rucOrganismo,a.trimestre AS trimestre, a.documento,a.codigoCompuesto FROM poa_documentos2022_anexos AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.tipo='modificacion' AND a.periodo='$periodo__traido' ORDER BY a.rucOrganismo ASC;";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;		



		case "documentos__seguimiento__2022__od__organismo":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$query="SELECT if(a.trimestre='1','PRIMER TRIMESTRE',if(a.trimestre='2','SEGUNDO TRIMESTRE',if(a.trimestre='3','TERCER TRIMESTRE','CUARTO TRIMESTRE'))) AS trimestre, a.documento,a.codigoCompuesto,a.rucOrganismo FROM poa_documentos2022_anexos AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.tipo='seguimiento' AND a.idOrganismo='$idOrganismoSession' AND a.periodo='$periodo__traido'  ORDER BY a.rucOrganismo ASC;";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);


		break;		



		case "documentos__modificacion__2022__od__organismo":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$query="SELECT a.trimestre AS trimestre, a.documento,a.codigoCompuesto,a.rucOrganismo FROM poa_documentos2022_anexos AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.tipo='modificacion' AND a.idOrganismo='$idOrganismoSession' AND a.periodo='$periodo__traido' ORDER BY a.rucOrganismo ASC;";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;		



	}


