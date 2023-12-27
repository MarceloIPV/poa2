
<?php $componentes= new componentes();

session_start();

$idOrganismoSession = $_SESSION["idOrganismoSession"];
?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"FORTALECIMIENTO DEL DEPORTE DE ALTO RENDIMIENTO DEL ECUADOR");?>

		<div class="row">

			


			<table id="" class="col col-12 cell-border">

				<thead>


					<TR>
						<TH COLSPAN=4></TH>
						<TH COLSPAN=4>Rubros</TH>
						<TH COLSPAN=1></TH>

					</TR>

					<tr align="center">

						<th COLSPAN=1><center>Presupuesto</center></th>
						<th COLSPAN=1><center>Fecha Envió</center></th>
						<th COLSPAN=1><center>Techo Presupuestario</center></th>
						<th COLSPAN=1><center>PAID General / Indicadores</center></th>	
						<th COLSPAN=1><center>Eventos de preparación y competencia</center></th>
						<th COLSPAN=1><center>Equipo Interdisciplinario</center></th>
						<th COLSPAN=1><center>Necesidades individuales</center></th>
						<th COLSPAN=1><center>Necesidades generales</center></th>
						<th COLSPAN=1><center>Acciones</center></th>
					</TR>
				</thead>
				<tbody>
					<tr>						
						<td> $0.00</td>
						<td> 2022-10-31</td>
						<td> <?php 
						$objeto1= new usuarioAcciones();
						$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_asignacion_dos where idOrganismo='$idOrganismoSession' and estado='A';");
						$jason['indicadorInformacion']=$indicadorInformacion1;
						echo("<label> $");

						foreach ($indicadorInformacion1 as $row1)
						{
							$valor= $row1["monto"];
							echo $valor;
						}
						echo("</label>");
						?></td>


						<td>	

							<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-example-modal-xl">PAID </button>



							<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-example-modal-xl1">INDICADORES </button>
						</td>
						<td> 
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT sum(valorTotal) as valor FROM poa_paid_eventos;");
							$jason['indicadorInformacion']=$indicadorInformacion1;
							echo("<label> $");

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["valor"];
								echo $valor;
							}
							echo("</label>");
							?>

						</td>
						<td> 
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT sum(valorTotal) as valor FROM poa_paid_interdisciplinario;");
							$jason['indicadorInformacion']=$indicadorInformacion1;
							echo("<label> $");

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["valor"];
								echo $valor;
							}
							echo("</label>");
							?>

						</td>
						<td> 
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT sum(valorTotal) as valor FROM poa_paid_necesidades_individuales;");
							$jason['indicadorInformacion']=$indicadorInformacion1;
							echo("<label>4");

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["valor"];
								echo $valor;
							}
							echo("</label>");
							?>

						</td>
						<td> 
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT sum(valorTotal) as valor FROM poa_paid_necesidades_generales;");
							$jason['indicadorInformacion']=$indicadorInformacion1;
							echo("<label>$");

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["valor"];
								echo $valor;
							}
							echo("</label>");
							?>

						</td>
							<td>
							<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_paid_envioinicial where idOrganismo='$idOrganismoSession' and year(fecha)= year(now()) and estado='A' and estadoEditar=100 ;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
								

										foreach ($indicadorInformacion1 as $row1)
											{
												$valor= $row1["num"];
												if($valor == 0){
													echo '	<button type="button" onclick="rubrosAREnvio()" class="btn btn-success" >Enviar</button>';											
												}else{
													echo "<label>PAID ENVIADO</label>";
												}
											
											}
										


								?>
						</td>
					</tr>
				</tbody>

			</table>

		</div>

	</section>

</div>





<!-- Small modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">PAID GENERAL</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">					
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Programa</center></label>
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_programa;");
										$jason['indicadorInformacion']=$indicadorInformacion1;

										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									
										foreach ($indicadorInformacion1 as $row1)
										{
											$nombre= $row1["nombrePrograma"];
											$id= $row1["idPrograma"];
											echo "<option value='".$id."'>".$nombre."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Proyecto</center></label>
										<select name="select" class="form-control">
										<option value="0">Fortalecimiento del deporte de alto rendimiento del ecuador</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Componentes</center></label>
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_componentes;");
										$jason['indicadorInformacion']=$indicadorInformacion1;

										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									
										foreach ($indicadorInformacion1 as $row1)
										{
											$nombre= $row1["nombreComponentes"];
											$id= $row1["idComponentes"];
											echo "<option value='".$id."'>".$nombre."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>
					
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Rubros</center></label>
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_rubros;");
										$jason['indicadorInformacion']=$indicadorInformacion1;

										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									
										foreach ($indicadorInformacion1 as $row1)
										{
											$nombre= $row1["nombreRubros"];
											$id= $row1["idRubros"];
											echo "<option value='".$id."'>".$nombre."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>


							
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Código Ítem Presupuestario</center></label>
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("select itemPreesupuestario,nombreItem from poa_paid_rubros_items as a, poa_item as b where a.idItem=b.idItem  group by itemPreesupuestario order by itemPreesupuestario");
										$jason['indicadorInformacion']=$indicadorInformacion1;

										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									
										foreach ($indicadorInformacion1 as $row1)
										{
											$nombre= $row1["nombreItem"];
											$id= $row1["itemPreesupuestario"];
											echo "<option value='".$id."'>".$id."-".$nombre."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>

						
						</div>
					</div>
					<div class="col-md-12 " style="overflow: scroll;">
						<div class="row">
							<table id="" class="col col-12 cell-border " >

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>ENE</center></th>
										<th COLSPAN=1><center>FEB</center></th>
										<th COLSPAN=1><center>MAR</center></th>	
										<th COLSPAN=1><center>ABR</center></th>
										<th COLSPAN=1><center>MAY</center></th>
										<th COLSPAN=1><center>JUN</center></th>	
										<th COLSPAN=1><center>JUL</center></th>								
									</TR>
								</thead>
								<tbody>
									<tr>
									<td><input type="number" id="enero"></td>
									<td><input type="number" id="febrero"></td>
									<td><input type="number" id="marzo"></td>
									<td><input type="number" id="abril"></td>
									<td><input type="number" id="mayo"></td>
									<td><input type="number" id="junio"></td>
									<td><input type="number" id="julio"></td>
								
							</tr>

						</tbody>

					</table>


					<table id="" class="col col-12 cell-border " >

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>AGO</center></th>
										<th COLSPAN=1><center>SEP</center></th>
										<th COLSPAN=1><center>OCT</center></th>
										<th COLSPAN=1><center>NOV</center></th>	
										<th COLSPAN=1><center>DIC</center></th>
										<th COLSPAN=1><center>Total Programado</center></th>										
										<th COLSPAN=1><center>Acción</center></th>
									</TR>
								</thead>
								<tbody>
									<tr>
								
									<td><input type="number" id="agosto"></td>
									<td><input type="number" id="septiembre"></td>
									<td><input type="number" id="octubre"></td>
									<td><input type="number" id="noviembre"></td>
									<td><input type="number" id="diciembre"></td>
									<td><input type="number" id="totalProgramado"></td>
									
								</td>

							

								<td><button class="form-control" onclick="guardarNuevoPaidGeneral()">Guardar</button>




								</td>
							</tr>

						</tbody>

					</table>






				</div>

			</div>
			<div class="modal-footer">
				<div id="pdf"></div>
			<button type="button" onclick="generarPaidGeneral()" class="btn btn-success" >Generar</button>
				<button type="button" onclick="rubroGuardarNuevoNecesidadesGenerales()" class="btn btn-primary"  data-dismiss="modal">Guardar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<div id="data"></div>
</div>



</div>





<!-- Small modal -->
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">PAID GENERAL</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">					
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Programa</center></label>
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_programa;");
										$jason['indicadorInformacion']=$indicadorInformacion1;

										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									
										foreach ($indicadorInformacion1 as $row1)
										{
											$nombre= $row1["nombrePrograma"];
											$id= $row1["idPrograma"];
											echo "<option value='".$id."'>".$nombre."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Proyecto</center></label>
										<select name="select">
										<option value="value1">Fortalecimiento del deporte de alto rendimiento del ecuador</option>
										<option value="value2">Encuentro activo del deporte para el desarrollo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Componentes</center></label>
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_indicadores;");
										$jason['indicadorInformacion']=$indicadorInformacion1;

										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									
										foreach ($indicadorInformacion1 as $row1)
										{
											$nombre= $row1["nombreIndicadores"];
											$id= $row1["idIndicadores"];
											echo "<option value='".$id."'>".$nombre."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Beneficiario</center></label>
										<td><select class="form-select" aria-label="Default select example">
										<option value="1">Masculino</option>
										<option value="2">Femenino</option>
									</select>
									</div>
								</div>
							</div>
						
						</div>
					</div>
					<div class="col-md-12 " style="overflow: scroll;">
						<div class="row">
							<table id="" class="col col-12 cell-border " >

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>ENE</center></th>
										<th COLSPAN=1><center>FEB</center></th>
										<th COLSPAN=1><center>MAR</center></th>	
										<th COLSPAN=1><center>ABR</center></th>
										<th COLSPAN=1><center>MAY</center></th>
										<th COLSPAN=1><center>JUN</center></th>	
										<th COLSPAN=1><center>JUL</center></th>								
									</TR>
								</thead>
								<tbody>
									<tr>
									<td><input type="number" id="enero"></td>
									<td><input type="number" id="febrero"></td>
									<td><input type="number" id="marzo"></td>
									<td><input type="number" id="abril"></td>
									<td><input type="number" id="mayo"></td>
									<td><input type="number" id="junio"></td>
									<td><input type="number" id="julio"></td>
								
							</tr>

						</tbody>

					</table>


					<table id="" class="col col-12 cell-border " >

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>AGO</center></th>
										<th COLSPAN=1><center>SEP</center></th>
										<th COLSPAN=1><center>OCT</center></th>
										<th COLSPAN=1><center>NOV</center></th>	
										<th COLSPAN=1><center>DIC</center></th>
										<th COLSPAN=1><center>Meta Anual</center></th>
									</TR>
								</thead>
								<tbody>
									<tr>
								
									<td><input type="number" id="agosto"></td>
									<td><input type="number" id="septiembre"></td>
									<td><input type="number" id="octubre"></td>
									<td><input type="number" id="noviembre"></td>
									<td><input type="number" id="diciembre"></td>
									<td><input type="number" id="meta"></td>
									
								</td>
							
								</td>
							</tr>

						</tbody>

					</table>






					<table id="" class="col col-12 cell-border">

						<thead>

							<tr align="center">
								<th COLSPAN=1><center>ENE</center></th>
								<th COLSPAN=1><center>FEB</center></th>
								<th COLSPAN=1><center>MAR</center></th>	
								<th COLSPAN=1><center>ABR</center></th>
								<th COLSPAN=1><center>MAY</center></th>
								<th COLSPAN=1><center>JUN</center></th>
								<th COLSPAN=1><center>JUL</center></th>	
								<th COLSPAN=1><center>AGO</center></th>
								<th COLSPAN=1><center>SEP</center></th>
								<th COLSPAN=1><center>OCT</center></th>
								<th COLSPAN=1><center>NOV</center></th>	
								<th COLSPAN=1><center>DIC</center></th>								
								<th COLSPAN=1><center>TOTAL</center></th>
								
							</TR>
						</thead>
						<tbody>
							
						
								
						</tbody>

					</table>
				</div>

			</div>
			<div class="modal-footer">
			<div id="pdf"></div>
			<button type="button" onclick="generarPaidGeneral()" class="btn btn-success" >Generar</button>
				<button type="button" onclick="rubroGuardarNuevoNecesidadesGenerales()" class="btn btn-primary"  data-dismiss="modal">Guardar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!-- Small modal -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>