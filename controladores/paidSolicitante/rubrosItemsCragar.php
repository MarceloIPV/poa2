<?php 
require_once "../../config/config2.php";
$objeto1= new usuarioAcciones();
$items= $_POST["items"];

$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT idRubros,b.idItem,nombreItem,itemPreesupuestario FROM poa_paid_rubros_items as a,poa_item as b where a.idItem=b.idItem and idRubros=$items;");


$jason['indicadorInformacion']=$indicadorInformacion1;
echo '<select class="form-select" id="rubrospgitems" aria-label="Default select example">';
echo "	<option selected>Seleccione</option>";									
foreach ($indicadorInformacion1 as $row1)
{
	$nombre= $row1["nombreItem"];
	$id= $row1["idItem"];
	$item= $row1["itemPreesupuestario"];
	echo "<option value='".$id."' >".$item." - ".$nombre."</option>";
}
echo "	</select>";
?>

