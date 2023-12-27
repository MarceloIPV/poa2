
	<?php 	




	extract($_POST);

	$idHonorarios= $_POST["idHonorarios"];
	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();

	$sql="SELECT * FROM poa_honorarios2022 where idHonorarios= $idHonorarios  ";

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);

	$jason['indicadorInformacion']=$indicadorInformacion;
	?>


	<div class="modal fade" id="reemplazo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class='modal-header row'>

					<div class='col col-11 text-center'>
						<h5 class='modal-title titulo__modalItems'>Reemplazo</h5>
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
									</tr>

								</thead>

								<tbody>
									<tr>
										<?php 
										foreach ($indicadorInformacion as $row)
										{
											$nombre= $row["nombres"];
											$justificacion= $row["justificacion"];
											?>
											<td>
												<center>
													<label><?php echo $nombre; ?></label>
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

										<th class='vertical__aign'><center>Apellidos Nombre</center></th>          
									</tr>

								</thead>

								<tbody>
									<tr>
										
											<td>
												<select name="select" class="form-control">
								<option value="value1">Seleccione</option>
							<?php  

							$sql1="SELECT * FROM poa_honorarios2022 where idOrganismo= 1085";

							$indicadorInformacion1=$objeto->getObtenerInformacionGeneral($sql1);

							$jason['indicadorInformacion1']=$indicadorInformacion1;

							foreach ($indicadorInformacion1 as $row)
							{
								$nombre= $row["nombres"];	

								$idHonorarios2= $row["idHonorarios"];								
								$cedula= $row["cedula"];
								$justificacion= $row["justificacion"];
								?>

								<center>
									<option <?php echo $nombre; ?>><?php echo $nombre; ?></option>
								</center>
								
							<?php 	} ?>

								
							</select>
							  
											</td>
											<td> <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="guardar_reemplazo('<?php echo $nombre;  ?>','<?php echo $cedula;  ?>','<?php echo $idHonorarios;  ?>')" >Guardar</button></td>

										</tr>    
										<tr><td><h6>Reemplazo de datos</h6><td></tr>                     
								
											<tr>
												<td><input class="form-control" type="text" id="nombre" placeholder="Ingres nombre"></td>
												<td><input class="form-control"  type="number" id="cedula2" placeholder="Ingrese cedula"></td>
												 <td><button type="button" class="btn btn-primary" data-dismiss="modal"   onclick="guardar_reemplazo2('<?php echo $idHonorarios;  ?>')"  >Guardar</button></td>
											</tr>
								</tbody>
							</table>
							

						</div>
					</div>
				</div>

				 <div class="modal-footer">
                            
      </div>
			</div>
		</div>
	</div>


