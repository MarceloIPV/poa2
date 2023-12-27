	<?php 	
	
	extract($_POST);
	require_once "../../config/config2.php";
	session_start();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();

	?>

	<div style="height:500px; overflow: scroll;">
		<TABLE BORDER>
			<TR>
				<TH ROWSPAN=1></TH>
				<TH COLSPAN=2>Origen</TH>
				<TH COLSPAN=2>Destino</TH>					
				<TH COLSPAN=2></TH>
			</TR>

			<tr align="center">
				<TH COLSPAN=1>No.</TH>
				<TH COLSPAN=1>Descripción</TH>
				<TH COLSPAN=1>Monto</TH>					
				<TH COLSPAN=1>Descripción</TH>
				<TH COLSPAN=1>Monto</TH>
				<TH COLSPAN=1>Justificación</TH>
			</TR>
			<tr align="center">
				<TH COLSPAN=6>1.-GESTIÓN ADMINISTRATIVA Y FUNCIONAMIENTO DE ESCENARIOS DEPORTIVOS</TH>
			</TR>

			

			<?php 

			$indicadorInformacion1=$objeto->getObtenerInformacionGeneral("SELECT * from poa_disminucion_sueldo_destino where idOrganismo='$idOrganismoSession'and estado='A' and estado_montos=1 order by actividad asc ");
			$jason['indicadorInformacion']=$indicadorInformacion1;
			?>
			
			<?php 
			foreach ($indicadorInformacion1 as $row1)
			{
				echo "<tr align='right'>";
				$c1=$c1+1;
				$actividad= $row1["actividad"];
				$idOrigen= $row1["idOrigen"];
				$monto= $row1["monto"];				
				$itemPresupuestario= $row1["itemPresupuestario"];
				?>
				<TH></TH>
			<TD>
					<?php 

					
						echo 'Sueldos y salarios';
						echo "<p>";
				
					?>


					<?php 

					$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT idModificacion,a.sueldoSalario as sueldo,
		b.nombres as nombre,
		a.mes as mes,
		a.aportePatronal as aporte,
		a.decimoTercero as descimoTercero,
		a.decimoCuarto as decimoCuarto,
		a.fondosReserva as fondosReserva,
		a.total as total,
		idModificacion
		FROM poa_modificaciones_sueldos_salarios as a,poa_sueldossalarios2022 as b where a.idSueldos=b.idSueldos and a.estado = 'D' and idModificacion=$idOrigen ");
					$jason['indicadorInformacion']=$indicadorInformacion3;	

					foreach ($indicadorInformacion3 as $row3)
					{
						$nombre= $row3["nombre"];
						$total= $row3["total"];
						echo $nombre;
					}
					?>
					</TD> 




				<TD>



<?php 

					$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT idModificacion,a.sueldoSalario as sueldo,
		b.nombres as nombre,
		a.mes as mes,
		a.aportePatronal as aporte,
		a.decimoTercero as descimoTercero,
		a.decimoCuarto as decimoCuarto,
		a.fondosReserva as fondosReserva,
		a.total as total,
		idModificacion
		FROM poa_modificaciones_sueldos_salarios as a,poa_sueldossalarios2022 as b where a.idSueldos=b.idSueldos and a.estado = 'D' and idModificacion=$idOrigen ");
					$jason['indicadorInformacion']=$indicadorInformacion3;	

					foreach ($indicadorInformacion3 as $row3)
					{
						$nombre= $row3["nombre"];
						$total= $row3["total"];
					echo '$'.$total;
					}
					?>



				</TD> 
				<TD>
					<?php 

					$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades FROM poa_actividades where idActividades=$actividad ");
					$jason['indicadorInformacion']=$indicadorInformacion2;	

					foreach ($indicadorInformacion2 as $row2)
					{
						$nombre= $row2["nombreActividades"];
						
					}
					?>


					<?php 

					$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreItem   FROM poa_item where itemPreesupuestario='$itemPresupuestario' ");
					$jason['indicadorInformacion']=$indicadorInformacion3;	

					foreach ($indicadorInformacion3 as $row3)
					{
						$nombre= $row3["nombreItem"];
						echo $nombre;
					}
					?>
					</TD> 
					<TD>$<?php echo $monto; ?></TD>
					<TD>



<?php 

					$indicadorInformacion4=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_modificaciones_sueldos_salarios where idModificacion=$idOrigen");
					$jason['indicadorInformacion']=$indicadorInformacion4;	

					foreach ($indicadorInformacion4 as $row4)
					{
						$justificacion= $row4["justificacion"];
					echo $justificacion;
					}
					?>



				</TD> 
				</TR>
			<?php }
			?> 


<?php 

	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();
	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select * from poa_modificacion_organismo_actividades where idOrganismo='$idOrganismoSession' order by actividadOrigen asc");
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
						<td>
							<center>
							<a href="modificacionesSueldosSalarios" class="btn btn-default" >
									<i class="fas fa-arrow-left"></i>  
								</a>
						
							</center>
						</td>

					


					</tr>
				<?php 	} ?>
			</tbody>



	</div>


