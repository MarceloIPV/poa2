
<?php 

$idUsuario= $_POST["idUsuario"];

require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql="SELECT * FROM poa_organismo where idUsuario=$idUsuario  ;";
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
foreach ($indicadorInformacion as $row){
	$idOrganismo= $row["idOrganismo"];
}


$sql01="SELECT count(*) as num FROM poa_honorarios2022 where idOrganismo=$idOrganismo and  nombres like 'vacante%';";
$indicadorInformacion01=$objeto->getObtenerInformacionGeneral($sql01);
$jason['indicadorInformacion01']=$indicadorInformacion01;
foreach ($indicadorInformacion01 as $row2){
	$num= $row2["num"];	
}

            
    

if ($num > 0) {


?>

<div class="row">
<div class="col-md-4">
	<img src="https://st2.depositphotos.com/27344914/47191/v/600/depositphotos_471919190-stock-illustration-yellow-alert-triangle-sign-on.jpg" 
	style="width: 100px; height: 100px" />
</div>

<div class="col-md-6" >

<table >
  <thead>
    <tr>
      <th >Puesto</th>
    </tr>
  </thead>
  <tbody>

<?php 

$sql2="SELECT * FROM poa_honorarios2022 where idOrganismo=$idOrganismo and  nombres like 'vacante%';";
$indicadorInformacion2=$objeto->getObtenerInformacionGeneral($sql2);
$jason['indicadorInformacion2']=$indicadorInformacion2;
foreach ($indicadorInformacion2 as $row2){
	$cargo= $row2["cargo"];
	echo "<tr><td>$cargo</td></tr>";
}


?>

   
   
  </tbody>
</table>


</div>
</div>
</div>

<?php } ?>