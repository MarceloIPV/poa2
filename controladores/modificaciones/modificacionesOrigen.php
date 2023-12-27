	<?php 	
	
	extract($_POST);
	require_once "../../config/config2.php";
	session_start();
	
	$id= 1;
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();
	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select * from poa_modificacion_organismo_actividades where idOrganismo='$idOrganismoSession' ");
	$jason['indicadorInformacion']=$indicadorInformacion;
	

		?>
		<h5 align="center">Origen</h5>
		<div style="height:300px; overflow: scroll;">
		<table class='col col-12 table__bordes__ejecutados mt-4'>

			<thead>



				<tr class=''>

					<th class='vertical__aign'><center>Origen</center></th>          
					<th class='vertical__aign'><center>Item</center></th>   	
					<th class='vertical__aign'><center>Mes </center></th>
					<th class='vertical__aign'><center>Monto</center></th>
					<th class='vertical__aign'><center>Destino</center></th>          
					<th class='vertical__aign'><center>Item</center></th>   	
					<th class='vertical__aign'><center>Mes </center></th>
					<th class='vertical__aign'><center>Monto</center></th>
					<th class='vertical__aign'><center>Acción</center></th>
				</tr>

			</thead>

			<tbody>
				<tr>
					<?php 


					foreach ($indicadorInformacion as $row)
					{
						$mes1= $row["mesOrigen"];
						$mes2= $row["mesDestino"];
						$mes2= $row["mesDestino"];
						
						$actividadOrigen= $row["actividadOrigen"];						
						$actividadDestino= $row["actividadDestino"];
						
						$idFinacieroOrigen= $row["idFinancieroOrigen"];
						$idFinancieroDestino= $row["idFinancieroDestino"];

						$totalOrigen= $row["totalOrigen"];
						$totalDestino= $row["totalDestino"];
						$idModificacionOr= $row["idModificacionOr"];
						
						?>

						<td>
							<center>
								<label>
								<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("select * from poa_actividades where idActividades= '$actividadOrigen'");
									$jason['indicadorInformacion']=$indicadorInformacion1;
									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["nombreActividades"];
											echo $origen;
										}
								?>
							
							</label>


							</center>
						</td>
						<td>
							<center>
							<label>
								<?php 
									$objeto2= new usuarioAcciones();
									$indicadorInformacion2=$objeto2->getObtenerInformacionGeneral("SELECT * FROM poa_item where itemPreesupuestario='$idFinacieroOrigen'");
									$jason['indicadorInformacion']=$indicadorInformacion2;
									foreach ($indicadorInformacion2 as $row2)
										{
											$itemo= $row2["nombreItem"];
											echo $itemo;
										}
								?>
							
							</label>

							</center>
						</td>
						<td>
							<center>
								<label><?php echo $mes1; ?></label>
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $totalOrigen; ?></label>
							</center>
						</td>
						<td>
							<center>
								<label>
								<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("select * from poa_actividades where idActividades= '$actividadDestino'");
									$jason['indicadorInformacion']=$indicadorInformacion1;
									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["nombreActividades"];
											echo $origen;
										}
								?>
							
							</label>


							</center>
						</td>
						<td>
							<center>
							<label>
								<?php 
									$objeto2= new usuarioAcciones();
									$indicadorInformacion2=$objeto2->getObtenerInformacionGeneral("SELECT * FROM poa_item where itemPreesupuestario='$idFinancieroDestino'");
									$jason['indicadorInformacion']=$indicadorInformacion2;
									foreach ($indicadorInformacion2 as $row2)
										{
											$itemo= $row2["nombreItem"];
											echo $itemo;
										}
								?>
							
							</label>

							</center>
						</td>
						<td>
							<center>
								<label><?php echo $mes2; ?></label>
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $totalDestino; ?></label>
							</center>
						</td>
						<td>
							<center>
							<a href="#" class="btn btn-danger" onclick="sueldo_eliminar_destino(<?php  echo $idModificacionOr;?>)">
									<i class="fas fa-trash"></i>  
								</a>
						
							</center>
						</td>

					


					</tr>
				<?php 	} ?>
			</tbody>



		</table>
</div>
