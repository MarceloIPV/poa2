 <?php 	

	require_once "../../config/config2.php";

	$objeto= new usua
	$actividad= $_POST["actividad"];rioAcciones();
	$sql="select nombreActividades,nombreEvento from poa_actividades as c, poa_programacion_financiera as a,poa_actdeportivas as b 
		where c.idActividades = a.idActividad
		and a.idProgramacionFinanciera=b.idProgramacionFinanciera
		and a.idActividad= '$actividad' 
		and a.idProgramacionFinanciera group by nombreEvento";
			$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);

	$jason['indicadorInformacion']=$indicadorInformacion;
	echo'<select name="select">';
	foreach ($indicadorInformacion as $row)
	{
		$nombreEvento= $row["nombreEvento"];
?>

 
  <option value="value1"><?php echo $nombreEvento;  ?></option>

  

  <?php  } ?>
</select>