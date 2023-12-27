
<?php
extract($_POST);
session_start();
require_once "../../config/config2.php";
 
$idOrganismoSession = $_SESSION["idOrganismoSession"];
?>

<div class="modal fade" id="nuevoItem" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Historial</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="row">	

<?php 

	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();
	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select * from poa_modificacion_organismo_actividades where idOrganismo='$idOrganismoSession' or actividadOrigen=3 or actividadOrigen=5 or actividadOrigen=6 or actividadOrigen=7 order by actividadOrigen asc");
	$jason['indicadorInformacion']=$indicadorInformacion;
?>


		</TABLE>

		<table class='col col-12 table__bordes__ejecutados mt-4'>

			<thead>



				<tr class=''>
					<th class='vertical__aign'><center>id</center></th>     
					<th class='vertical__aign'><center>Origen</center></th>          
					<th class='vertical__aign'><center>Item</center></th>   	
					<th class='vertical__aign'><center>Mes </center></th>
					<th class='vertical__aign'><center>Monto</center></th>

					<th class='vertical__aign'><center>id</center></th>  
					<th class='vertical__aign'><center>Destino</center></th>          
					<th class='vertical__aign'><center>Item</center></th>   	
					<th class='vertical__aign'><center>Mes </center></th>
					<th class='vertical__aign'><center>Monto</center></th>
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
								<label><?php echo $actividadOrigen; ?></label>
							</center>
						</td>

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
								<label><?php echo $actividadDestino; ?></label>
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
						

					


					</tr>
				<?php 	} ?>
			</tbody>




					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
</div>