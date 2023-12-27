<?php 

$mes= $_POST["mes"];
$idHonorarios= $_POST["idHonorarios"];
$sueldo= $_POST["sueldo"];
$justificacion= $_POST["justificacion"];



require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_honorarios2022_montos` (`idHonorarios`, `idvalornuevo`, `nombres`, `estado`) VALUES ('$idHonorarios', '$sueldo', '$mes', '$justificacion');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;

?>
<script type="text/javascript">
	alertify.set("notifier", "position", "top-center");
		alertify.notify("Se guardo correctamente", "success", 5, function () { });
</script>





