<?php
	
	extract($_POST);
	require_once "../../config/config2.php";
	$objeto= new usuarioAcciones();
	
	session_start();
	  $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
    $idOrganismoSession=$_SESSION["idOrganismoSession"];

    switch ($tipo) {



    case "obtener_contratacion_Publica_desarrollo":
      $informacion=$objeto->getObtenerInformacionGeneral("select * from poa_paid_catalogo_contraloria where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponentes' and idRubros='$idRubros' and idAsignacion='$idAsignacion' and identificador='$identificador' and idItem='$idItem'");
      $jason['informacion']=$informacion;
    break;

    




    }




    echo json_encode($jason);






