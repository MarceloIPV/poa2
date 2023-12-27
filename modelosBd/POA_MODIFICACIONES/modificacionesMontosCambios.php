	<?php 	




	extract($_POST);
	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();

	$cantidad=$objeto->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_honorarios2022_montos ");
	//$cantidad2=$objeto->getObtenerInformacionGeneral("INSERT INTO poa_modificaciones_sueldos_salarios (`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `mes`) VALUES ('2691', '1', '1', '1', '1', '1', 'A', 'FEBERO');");
	foreach ($cantidad as $row)
	{
		$numero= $row["num"];
	}

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT b.idHonorarios as id,a.nombres as nombres,b.nombres as mes,idvalornuevo as valor,b.estado as justificacion FROM poa_honorarios2022 as a,poa_honorarios2022_montos as b where a.idHonorarios= b.idHonorarios");

	$jason['indicadorInformacion']=$indicadorInformacion;
	


	if($numero >= 1) {
	?>

	<table class='col col-12 table__bordes__ejecutados mt-4'>

		<thead>



			<tr class=''>

				<th class='vertical__aign'><center>Apellidos Nombre</center></th>          
				<th class='vertical__aign'><center>Mes</center></th>   
				<th class='vertical__aign'><center>Sueldo</center></th> 

			</tr>

		</thead>

		<tbody>
<tr>
			<?php 


foreach ($indicadorInformacion as $row)
{
	$nombre= $row["nombres"];
	$mes= $row["mes"];
	$sueldo= $row["valor"];
	$justificacion= $row["justificacion"];
?>


				<td>
					<center>
						<label><?php echo $nombre; ?></label>
					</center>
				</td>
				<td>
					<center>
						<label><?php echo $mes; ?></label>
					</center>
				</td>

				<td>
					<center>
						<label><?php echo $sueldo; ?></label>
					</center>
				</td>

				<td>
					<center>
						<label><?php echo $aporte; ?></label>
					</center>
				</td>

				

			</tr>
<?php 	} ?>
		</tbody>



	</table>
	<?php 	} ?>