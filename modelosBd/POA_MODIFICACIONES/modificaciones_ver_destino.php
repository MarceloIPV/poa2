	<?php 	




	extract($_POST);
	require_once "../../config/config2.php";

	$objetoa= new usuarioAcciones();

	$cantidad=$objetoa->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_modificaciones_origen_destino WHERE estado_montos='DESTINO';");
	//$cantidad2=$objeto->getObtenerInformacionGeneral("INSERT INTO poa_modificaciones_sueldos_salarios (`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `mes`) VALUES ('2691', '1', '1', '1', '1', '1', 'A', 'FEBERO');");
	foreach ($cantidad as $row)
	{
		$numero= $row["num"];
	}

	$indicadorInformaciona=$objetoa->getObtenerInformacionGeneral("SELECT * FROM poa_modificaciones_origen_destino WHERE estado_montos='DESTINO';");

	$jason['indicadorInformacion']=$indicadorInformaciona;
	
  

	if($numero >= 1) {


		?>
		<h5 style="text-align: center">Destino</h5>
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


					foreach ($indicadorInformaciona as $row)
					{
						$evento1= $row["evento"];
						$actividad1= $row["actividad"];
						$monto1= $row["monto"];
						$mes1= $row["mes"];
						$item1= $row["itemPresupuestario"];
						$nombre1= $row["nombre"];




						?>
						<td>
							<center>

								
								<label><?php echo $item1; ?></label>
							</center>
						</td>

						<td>
							<center>	
								<?php 
								$objeto1= new usuarioAcciones();

								$sql2="SELECT * FROM poa_actividades where idActividades=$actividad1;";
								$indicadorInformacion2=$objeto1->getObtenerInformacionGeneral($sql2);
								$jason['indicadorInformacion2']=$indicadorInformacion2;
								foreach ($indicadorInformacion2 as $row2){
									$nombre1= $row2["nombreActividades"];	
									?>
									<label><?php echo $nombre1; ?></label>
									<?PHP
								}
								?>
							</center>
						</td>


						<td>
							<center>	
								<?php 
								$objeto3= new usuarioAcciones();

								$sql3="SELECT * FROM poa_item where itemPreesupuestario=$item1;";
								$indicadorInformacion3=$objeto3->getObtenerInformacionGeneral($sql3);
								$jason['indicadorInformacion3']=$indicadorInformacion3;
								foreach ($indicadorInformacion3 as $row3){
									$nombreItem1= $row3["nombreItem"];	
									?>
									<label><?php echo $nombreItem1; ?></label>
									<?PHP
								}
								?>
							</center>
						</td>

						<td>
							<center>
								<label><?php echo $mes1; ?></label>
							</center>
						</td>

						<td>
							<center>
								<label><?php echo $monto1; ?></label>
							</center>
						</td>





					</tr>
				<?php 	} ?>
			</tbody>
		</table>






		<?php 	} ?>