<?php

	require_once "conexion/conexion.php";

	$conexionRecuperada= new conexion();
	$conexionEstablecida=$conexionRecuperada->cConexion();	

	$thefolder = "repositorio/poa/documentos/seguimiento/facturas__administrativo";
	$contador=0;
	$data1=array();

	$variable;

	if ($handler = opendir($thefolder)) {

	    while (false !== ($file = readdir($handler))) {

	    	$contador++;

		 	$query="SELECT documento FROM poa_seguimiento_facturas_administrativo WHERE documento='$file';";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {
				$variable=$registro['documento'];
			}

			if ($variable!=$file) {
				array_push($data1, $file);
			}


	    }

	    foreach ($data1 as $value) {
	    	

	    	if(unlink("repositorio/poa/documentos/seguimiento/facturas__administrativo/".$value)) {
			  echo "si<br>";
			} else {
			  echo "no<br>";
			}


	    }

	    closedir($handler);

	}
