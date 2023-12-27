<?php 

$parametro1= $_POST["parametro1"];
$parametro2= $_POST["parametro2"];
$parametro3= $_POST["parametro3"];
$parametro4= $_POST["parametro4"];
$parametro5= $_POST["parametro5"];
$parametro6= $_POST["parametro6"];
$parametro7= $_POST["parametro7"];
$parametro8= $_POST["parametro8"];
$parametro9= $_POST["parametro9"];
$parametro10= $_POST["parametro10"];
$parametro11= $_POST["parametro11"];
$parametro12= $_POST["parametro12"];
$parametro13= $_POST["parametro13"];
$parametro14= $_POST["parametro14"];
$parametro15= $_POST["parametro15"];
$parametro16= $_POST["parametro16"];
$parametro17= $_POST["parametro17"];

$tipo= $_POST["tipo"];



session_start();
$idOrganismo= $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";
$fecha = date("Y-m-d"); 
$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_general` (`idPrograma`, `idProyecto`, `idComponente`, `idRubros`, `idItem`, `idOrganismo`, `nombreItem`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `valorTotal`, `estado`, `fecha`) VALUES ('$parametro13', '0', '$parametro14', '$parametro15', '$parametro16', '$idOrganismo', '$parametro16', '$parametro1', '$parametro2', '$parametro3', '$parametro4', '$parametro5', '$parametro6', '$parametro7', '$parametro8', '$parametro9', '$parametro10', '$parametro11', '$parametro12', '$parametro17', '$tipo', '$fecha');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;

$mensaje=1;
echo '1';
?>



