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

$parametro17= $_POST["parametro17"];
$parametro18= $_POST["parametro18"];
$tipo= $_POST["tipo"];




session_start();
$idOrganismo= $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";
$fecha = date("Y-m-d"); 
$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_general_indicadores` (`idPrograma`, `idIndicadores`, `idComponente`, `idOrganismo`,`enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `valorTotal`,`beneficiario`, `estado`, `fecha`) VALUES ('$parametro13','$parametro15', '$parametro14','$idOrganismo', '$parametro1', '$parametro2', '$parametro3', '$parametro4', '$parametro5', '$parametro6', '$parametro7', '$parametro8', '$parametro9', '$parametro10', '$parametro11', '$parametro12', '$parametro17', '$parametro18', '$tipo', '$fecha');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;

echo $sql;
$mensaje=1;
echo '1';
?>



