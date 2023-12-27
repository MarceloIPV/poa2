
 <?php 	

	require_once "../../config/config2.php";
	session_start();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();


	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_sueldossalarios2022 where idActividad=1 and idOrganismo=	$idOrganismoSession;");

	$jason['indicadorInformacion']=$indicadorInformacion;
	echo'<select  id="carga_personal_sueldos" class="ancho__total__input obligatorios">';
	foreach ($indicadorInformacion as $row)
	{
		$nombre= $row["nombres"];
		$idSueldo= $row["idSueldos"];
?>

 
  <option value="<?php echo $nombre;  ?>"  onclick="cargar_sueldos_honarios_act1(<?php echo $idSueldo;  ?>)" ><?php echo $nombre; ?></option>

  

  <?php  } ?>
</select>
