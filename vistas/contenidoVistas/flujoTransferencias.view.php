
<?php $componentes= new componentes();?>
<?php $objetoInformacion= new usuarioAcciones();?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT a.idActividad,b.nombreActividades,sum(a.enero) AS enero,SUM(a.febrero) AS febrero,SUM(a.marzo) AS marzo,SUM(a.abril) AS abril,SUM(a.mayo) AS mayo,SUM(a.junio) AS junio,SUM(a.julio) AS julio,SUM(a.agosto) AS agosto,SUM(a.septiembre) AS septiembre,SUM(a.octubre) AS octubre,SUM(a.noviembre) AS noviembre,SUM(a.diciembre) AS diciembre,SUM(a.totalTotales) AS totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad;";
	$resultado = $conexionEstablecida->query($query);


 	$query2="SELECT a.idActividad,b.nombreActividades,sum(a.enero) AS enero,SUM(a.febrero) AS febrero,SUM(a.marzo) AS marzo,SUM(a.abril) AS abril,SUM(a.mayo) AS mayo,SUM(a.junio) AS junio,SUM(a.julio) AS julio,SUM(a.agosto) AS agosto,SUM(a.septiembre) AS septiembre,SUM(a.octubre) AS octubre,SUM(a.noviembre) AS noviembre,SUM(a.diciembre) AS diciembre,SUM(a.totalTotales) AS totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad ORDER BY a.idActividad;";
	$resultado2 = $conexionEstablecida->query($query2);

?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"FLUJO DE TRANSFERENCIA");?>

		<div class="row">

			<table id="flujoTransferencia" class="col col-12 cell-border">

				<thead>

					<tr>

						<th colspan="14">
							<center>
								Matriz con valores totales por actividad y por mes
							</center>
						</th>

					</tr>

					<tr>

						<th><center>Actividad</center></th>
						<th><center>Enero</center></th>
						<th><center>Febrero</center></th>
						<th><center>Marzo</center></th>
						<th><center>Abril</center></th>
						<th><center>Mayo</center></th>
						<th><center>Junio</center></th>
						<th><center>Julio</center></th>
						<th><center>Agosto</center></th>
						<th><center>Septiembre</center></th>
						<th><center>Octubre</center></th>
						<th><center>Noviembre</center></th>
						<th><center>Diciembre</center></th>
						<th><center>Total</center></th>

					</tr>

				</thead>

				<tbody>
					
					<?php while($registro = $resultado->fetch()) { ?>

					<tr>

						<td>
							<?= $registro['nombreActividades'];?>			
						</td>

						<td>
							<?=$registro['enero']?>			
						</td>

						<td>
							<?=$registro['febrero']?>			
						</td>


						<td>
							<?=$registro['marzo']?>			
						</td>


						<td>
							<?=$registro['abril']?>			
						</td>


						<td>
							<?=$registro['mayo']?>			
						</td>

						<td>
							<?=$registro['junio']?>			
						</td>


						<td>
							<?=$registro['julio']?>			
						</td>


						<td>
							<?=$registro['agosto']?>			
						</td>


						<td>
							<?=$registro['septiembre']?>			
						</td>


						<td>
							<?=$registro['octubre']?>			
						</td>


						<td>
							<?=$registro['noviembre']?>			
						</td>


						<td>
							<?=$registro['diciembre']?>			
						</td>


						<td>
							<?=$registro['diciembre']?>			
						</td>


					</tr>

					<?php } ?>	

				</tbody>

			</table>

			<br>

			<table id="flujoTransferencia" class="col col-12 cell-border">

				<thead>

					<tr>

						<th colspan="14">
							<center>
								Matriz con valores para transferencia
							</center>
						</th>

					</tr>

					<tr>

						<th><center>Actividad</center></th>
						<th><center>Enero</center></th>
						<th><center>Febrero</center></th>
						<th><center>Marzo</center></th>
						<th><center>Abril</center></th>
						<th><center>Mayo</center></th>
						<th><center>Junio</center></th>
						<th><center>Julio</center></th>
						<th><center>Agosto</center></th>
						<th><center>Septiembre</center></th>
						<th><center>Octubre</center></th>
						<th><center>Noviembre</center></th>
						<th><center>Diciembre</center></th>
						<th><center>Total</center></th>

					</tr>

				</thead>

				<tbody>
					
					<?php while($registro2 = $resultado2->fetch()) { ?>

					<tr>

						<td>
							<?= $registro2['nombreActividades'];?>			
						</td>

						<td>
							<?=floatval($registro2['enero']) + floatval($registro2['febrero']) + floatval($registro2['marzo'])?>			
						</td>

						<td>
							<?=$registro2['febrero']?>			
						</td>


						<td>
							<?=$registro2['marzo']?>			
						</td>


						<td>
							<?=$registro2['abril']?>			
						</td>


						<td>
							<?=$registro2['mayo']?>			
						</td>

						<td>
							<?=$registro2['junio']?>			
						</td>


						<td>
							<?=$registro2['julio']?>			
						</td>


						<td>
							<?=$registro2['agosto']?>			
						</td>


						<td>
							<?=$registro2['septiembre']?>			
						</td>


						<td>
							<?=$registro2['octubre']?>			
						</td>


						<td>
							<?=$registro2['noviembre']?>			
						</td>


						<td>
							<?=$registro2['diciembre']?>			
						</td>


						<td>
							<?=$registro2['diciembre']?>			
						</td>


					</tr>

					<?php } ?>	

				</tbody>

			</table>

		</div>

	</section>

</div>



