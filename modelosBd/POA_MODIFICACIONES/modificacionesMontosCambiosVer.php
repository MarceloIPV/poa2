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

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT idMontos, b.idHonorarios as id,a.nombres as nombres,b.nombres as mes,idvalornuevo as valor,b.estado as justificacion FROM poa_honorarios2022 as a,poa_honorarios2022_montos as b where a.idHonorarios= b.idHonorarios");

	$jason['indicadorInformacion']=$indicadorInformacion;
	


		?>


		<div class="modal fade" id="ver_historial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class='modal-header row'>

						<div class='col col-11 text-center'>
							<h5 class='modal-title titulo__modalItems'>Historial</h5>
						</div>
						<div class='col-md-1'>
							<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-dismiss="modal"  aria-label='Close'>
								<i class='far fa-times-circle'></i>
							</button>
						</div>

					</div>
					<div class='col-md-12'>	<br/>
						<div class='row'>
							<div class='col-md-6'>	
								<h5 style="text-align: center">Origen</h5>
								<table class='col col-12 table__bordes__ejecutados mt-4'>

									<thead>



										<tr class=''>

											<th class='vertical__aign'><center>Apellidos Nombre</center></th>          
											<th class='vertical__aign'><center>Mes</center></th>   
											<th class='vertical__aign'><center>Sueldo</center></th> 
											<th class='vertical__aign'><center>Acción</center></th> 

										</tr>

									</thead>

									<tbody>
										<tr>
											<?php 


											foreach ($indicadorInformacion as $row)
											{
												$nombre= $row["nombres"];
												$mes= $row["mes"];
												$idMontos= $row["idMontos"];
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
														<button onclick="eliminar_origen_monto(<?php echo $idMontos; ?>)" class="btn btn-danger form-control">
															<i class="fas fa-trash"></i>
														<button>
															</center>
														</td>



													</tr>
												<?php 	} ?>
											</tbody>
										</table>
									</div>

									<div class='col-md-6'>	
										<h5 style="text-align: center">Destino</h5>
										<table class='col col-12 table__bordes__ejecutados mt-4'>

			<thead>



				<tr class=''>

					<th class='vertical__aign'><center>Código Ítem</center></th>
					<th class='vertical__aign'><center>Ítem</center></th>
					<th class='vertical__aign'><center>Mes</center></th>
					<th class='vertical__aign'><center>Monto</center></th>
				</tr>

			</thead>

			<tbody>
				<tr>
					<?php 

$indicadorInformacion5=$objeto->getObtenerInformacionGeneral("SELECT itemPresupuestario,nombreItem,mes,monto FROM poa_item as a,poa_disminuciondestino as b where a.itemPreesupuestario=b.itemPresupuestario AND estado_montos='MONTOS';");

	$jason['indicadorInformacion5']=$indicadorInformacion5;
	

					foreach ($indicadorInformacion5 as $row)
					{

						$itemPresupuestario= $row["itemPresupuestario"];
						$actividad= $row["nombreItem"];
						$monto= $row["monto"];
						$mes= $row["mes"];
						$item= $row["item"];
						?>

<td>
							<center>
								<label><?php echo $itemPresupuestario; ?></label>
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $actividad; ?></label>
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
