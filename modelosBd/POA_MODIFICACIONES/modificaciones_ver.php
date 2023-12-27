	<?php 	




	extract($_POST);
	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();

	$cantidad=$objeto->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_modificaciones_origen_destino WHERE estado_montos='ORIGEN';");
	//$cantidad2=$objeto->getObtenerInformacionGeneral("INSERT INTO poa_modificaciones_sueldos_salarios (`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `mes`) VALUES ('2691', '1', '1', '1', '1', '1', 'A', 'FEBERO');");
	foreach ($cantidad as $row)
	{
		$numero= $row["num"];
	}

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_modificaciones_origen_destino WHERE estado_montos='ORIGEN';");

	$jason['indicadorInformacion']=$indicadorInformacion;
	


	if($numero >= 1) {


		?>

<h5 style="text-align: center">Origen</h5>
		<table class='col col-12 table__bordes__ejecutados mt-4'>

			<thead>



				<tr class=''>
					<th class='vertical__aign'><center>Item Presupuestario</center></th>

					<th class='vertical__aign'><center>Actividad</center></th>
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
						$item= $row["itemPresupuestario"];
						$nombre= $row["nombre"];




						?>
						<td>
							<center>

								
								<label><?php echo $item; ?></label>
							</center>
						</td>

						<td>
							<center>	
								<?php 
								$objeto1= new usuarioAcciones();

								$sql2="SELECT * FROM poa_actividades where idActividades=$actividad;";
								$indicadorInformacion2=$objeto1->getObtenerInformacionGeneral($sql2);
								$jason['indicadorInformacion2']=$indicadorInformacion2;
								foreach ($indicadorInformacion2 as $row2){
									$nombre= $row2["nombreActividades"];	
									?>
									<label><?php echo $nombre; ?></label>
									<?PHP
								}
								?>
							</center>
						</td>


						<td>
							<center>	
								<?php 
								$objeto3= new usuarioAcciones();

								$sql3="SELECT * FROM poa_item where itemPreesupuestario=$item;";
								$indicadorInformacion3=$objeto3->getObtenerInformacionGeneral($sql3);
								$jason['indicadorInformacion3']=$indicadorInformacion3;
								foreach ($indicadorInformacion3 as $row3){
									$nombreItem= $row3["nombreItem"];	
									?>
									<label><?php echo $nombreItem; ?></label>
									<?PHP
								}
								?>
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