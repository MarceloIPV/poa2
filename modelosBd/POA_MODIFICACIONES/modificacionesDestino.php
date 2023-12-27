	<?php 	
	
	extract($_POST);
	require_once "../../config/config2.php";
	session_start();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();

	


	$indicadorInformacion1=$objeto->getObtenerInformacionGeneral("SELECT count(*) as num from poa_disminucion_sueldo_destino where idOrganismo=$idOrganismoSession and estado='A' and estado_montos=1");

	$jason['indicadorInformacion']=$indicadorInformacion1;


					foreach ($indicadorInformacion1 as $row1)
					{
						$num= $row1["num"];
					}
	
	if ($num >= 1) {
		
	

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT * from poa_disminucion_sueldo_destino where idOrganismo=$idOrganismoSession and estado='A' and estado_montos=1");

	$jason['indicadorInformacion']=$indicadorInformacion;
	?>
	<h5 align="center">Destino</h5>
	<div style="height:300px; overflow: scroll;">
		<table class='col col-12 table__bordes__ejecutados mt-4'>

			<thead>



				<tr class=''>

					<th class='vertical__aign'><center>Actividad</center></th>          
					<th class='vertical__aign'><center>Item</center></th>   
					<th class='vertical__aign'><center>Mes</center></th>   
					<th class='vertical__aign'><center>Monto</center></th>
					<th class='vertical__aign'><center>Acción</center></th>
				</tr>

			</thead>

			<tbody>
				<tr>
					<?php 


					foreach ($indicadorInformacion as $row)
					{
						$actividad= $row["actividad"];
						$itemPresupuestario= $row["itemPresupuestario"];
						$mes= $row["mes"];
						$valor= $row["monto"];
						$idDestino= $row["idDestino"];
						$idOrigen= $row["idOrigen"];							
						?>

						<td>
							<center>
								<?php 
								$objeto= new usuarioAcciones();

								$cantidad=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_actividades where idActividades=$actividad");
								foreach ($cantidad as $row)
								{
									$nombreActividades= $row["nombreActividades"];
								}
								?>
								<label><?php echo $nombreActividades; ?></label>
							</center>
						</td>
						<td>
							<center>
									<?php 
								$objeto1= new usuarioAcciones();

								$cantidad1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_item where itemPreesupuestario=$itemPresupuestario;");
								foreach ($cantidad1 as $row1)
								{
									$nombreItem= $row1["nombreItem"];
								}
								?>
								<label><?php echo $nombreItem; ?></label>
							</center>
						</td>

						<td>
							<center>
								<label><?php echo $mes; ?></label>
							</center>
						</td>

						<td>
							<center>
								<label>$<?php echo $valor; ?></label> 
							</center>
						</td>
						<td>
							<center>
								<a href="#" class="btn btn-danger" onclick="sueldo_eliminar_destino(<?php  echo $idDestino?>,<?php  echo $idOrigen?>)">
									<i class="fas fa-trash"></i>  
								</a>
							</center>
						</td>
					</tr>
				<?php 	} ?>
			</tbody>
		</table>
	</div>


<?php } ?>