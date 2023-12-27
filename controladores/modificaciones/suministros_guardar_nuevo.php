   
<?php 



require_once "../../config/config2.php";
$tipo= $_POST["tipo"];
$nombre_escenario= $_POST["nombre_escenario"];
$suministro= $_POST["suministro"];
$tipoServicio= $_POST["tipoServicio"];
$idUsuario= $_POST["idUsuario"];


$objeto01= new usuarioAcciones();

$sql01="SELECT * FROM poa_organismo where idUsuario=$idUsuario  ;";
$indicadorInformacion01=$objeto01->getObtenerInformacionGeneral($sql01);
$jason['indicadorInformacion01']=$indicadorInformacion01;
foreach ($indicadorInformacion01 as $row){
	$idOrganismo= $row["idOrganismo"];

}


echo $tipoServicio;
echo "<br>";

$objeto02= new usuarioAcciones();
$sql02="SELECT max(idSumi) as num FROM poa_suministrosn ;";
$indicadorInformacion02=$objeto02->getObtenerInformacionGeneral($sql02);
$jason['indicadorInformacion02']=$indicadorInformacion02;
foreach ($indicadorInformacion02 as $row){
	$num= $row["num"];

}
$num2=$num+1;
echo $sql01;
echo "<br>";
echo $sql02;

echo "<br>";
$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_suministrosn` (`idSumi`,`tipo`, `nombreEscenario`, `idOrganismo`, `fecha`) VALUES ('$num2','$tipo', '$nombre_escenario', '$idOrganismo',DATE_FORMAT(now(), '%Y-%m-%d'));";
echo "<br>";
echo $sql;
echo "<br>";
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;

if ($tipoServicio == 1) {
$objeto2= new usuarioAcciones();

$sql2 ="INSERT INTO `poa_suministros` (`luz`, `agua`, `idSumiN`) VALUES ('N/A','$suministro', $num2);";

echo $sql2;
echo "<br>";
$indicadorInformacion2=$objeto2->getObtenerInformacionGeneral($sql2);
	$jason['indicadorInformacion2']=$indicadorInformacion2;


}
if ($tipoServicio == 2) {
	$objeto3= new usuarioAcciones();

$sql3 ="INSERT INTO `poa_suministros` (`luz`, `agua`, `idSumiN`) VALUES ( '$suministro','N/A','$num2');";
echo $sql3;
echo "<br>";
$indicadorInformacion3=$objeto3->getObtenerInformacionGeneral($sql3);
	$jason['indicadorInformacion3']=$indicadorInformacion3;


}



?>


