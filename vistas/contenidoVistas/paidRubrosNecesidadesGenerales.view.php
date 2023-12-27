
<?php $componentes= new componentes();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Necesidades Generales");?>

		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-10">
						
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo </button>


					</div>
				</div>
			</div>

			<table id="paidRubrosNecesidadesGenerales" class="col col-12 cell-border">

				<thead>

					<tr align="center">
						<th COLSPAN=1><center>Modalidad</center></th>
						<th COLSPAN=1><center>Articulo</center></th>
						<th COLSPAN=1><center>Cantidad</center></th>
						<th COLSPAN=1><center> Valor / Unidad US</center></th>	
						<th COLSPAN=1><center>Valor Total</center></th>
						<th COLSPAN=1><center>Sector</center></th>
					</TR>
				</thead>
				
			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo rubro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="row">
				
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Modalidad</label>
										
									</div>
									<div class="col-md-6">
									<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_modalidad;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="modalidad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["nombreModalidad"];
											echo "<option value='".$origen."'>".$origen."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										<label>Articulo</label>
										
									</div>
									<div class="col-md-9">
										<input type="input" id="articulo" class="form-control" >							
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Cantidad</label>
										
									</div>
									<div class="col-md-6">
									<input type="number" id="cantidad"  oninput="necesidadesGeneralesValorTotal()" class="form-control" >		
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Valor Unidad</label>
										
									</div>
									<div class="col-md-6">
											<input type="number" id="valorUnitario" oninput="necesidadesGeneralesValorTotal()" class="form-control" >				
									</div>
								</div>
							</div>
						
						
						

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Valor Total</label>
										
									</div>
									<div class="col-md-6">
										<input type="text" id="valorTotal" class="form-control" readonly="">							
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="row">
									<div class="col-md-4">
										<label>Sector</label>
										
									</div>
									<div class="col-md-8">
									<select name="select" id="sector" class="form-control">
											<option value="" selected>Seleccione</option>
											<option value="Convencional" >Convencional</option>
											<option value="Discapacidad">Discapacidad</option>
										</select>							
									</div>
								</div>
							</div>


						</div>


					</div>
					<div class="modal-footer">
						<button type="button" onclick="rubroGuardarNuevoNecesidadesGenerales()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

	<div id="data"></div>
	</div>



