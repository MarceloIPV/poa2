	<?php 	




	extract($_POST);
	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();

	$cantidad=$objeto->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_disminuciondestino;");
	//$cantidad2=$objeto->getObtenerInformacionGeneral("INSERT INTO poa_modificaciones_sueldos_salarios (`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `mes`) VALUES ('2691', '1', '1', '1', '1', '1', 'A', 'FEBERO');");
	foreach ($cantidad as $row)
	{
		$numero= $row["num"];
	}

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_disminuciondestino;");

	$jason['indicadorInformacion']=$indicadorInformacion;
	


	if($numero >= 1) {
		?>

		<table class='col col-12 table__bordes__ejecutados mt-4'>

			<thead>



				<tr class=''>

					<th class='vertical__aign'><center>Ítem</center></th>
					<th class='vertical__aign'><center>Mes</center></th>
					<th class='vertical__aign'><center>Monto</center></th>
				</tr>

			</thead>

			<tbody>
				<tr>
					<?php 


					foreach ($indicadorInformacion as $row)
					{
						$evento= $row["evento"];
						$actividad= $row["actividad"];
						$monto= $row["monto"];
						$mes= $row["mes"];
						$item= $row["item"];

						$nombre= $row["nombre"];




						?>


						<td>
							<center>
								<label><?php echo $actividad; ?></label>
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $evento; ?></label>
							</center>
						</td>




						<td>
							<center>

								<<?php 

								$itembusca=$objeto->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_disminuciondestino;");
								foreach ($cantidad as $row)
								{
									$numero= $row["num"];
								} ?>
								<label><?php echo $item; ?></label>
							</center>
						</td>


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
								<label><?php echo $monto; ?></label> 
							</center>
						</td>


					</tr>
				<?php 	} ?>
			</tbody>



		</table>
		<?php 	} ?>