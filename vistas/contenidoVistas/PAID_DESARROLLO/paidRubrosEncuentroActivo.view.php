
<?php $componentes= new componentes();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
$objeto= new usuarioAcciones();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Encuentro Activo");?>

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

			<table id="paidEncuentroActivo" class="col col-12 cell-border">

				<thead>

					<tr align="center">
						<th COLSPAN=1><center>Nombre del evento</center></th>
						<th COLSPAN=1><center>Sede Satélite o subsede</center></th>
						<th COLSPAN=1><center>Nro. OD o instituciones participantes</center></th>
						<th COLSPAN=1><center>Fecha inicio</center></th>	
						<th COLSPAN=1><center>Fecha fin</center></th>
						<th COLSPAN=1><center>Nro. Deportes</center></th>
						<th COLSPAN=1><center>CATEGORÍA</center></th>
						<th COLSPAN=1><center>No. Deportistas Damas</center></th>
						<th COLSPAN=1><center>No. Deportistas Damas</center></th>
						<th COLSPAN=1><center>No. De Entrenadores.</center></th>
						<th COLSPAN=1><center>Valor Total</center></th>
						<th COLSPAN=1><center>Observaciones</center></th>
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
					<h5 class="modal-title" id="exampleModalLabel">Nuevo </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="row">


							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<label>Nombre del evento</label>
										
									</div>
									<div class="col-md-9">
										<input type="input" id="idNombres" class="form-control" >							
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Sede Satélite o subsede</label>
										
									</div>
									<div class="col-md-6">
										<input type="input" id="sede" class="form-control" >	
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>No. OD o instituciones participantes</label>
										
									</div>
									<div class="col-md-6">
										<input type="input" id="instituciones" class="form-control" >	
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Fecha Inicio</label>
										
									</div>
									<div class="col-md-6">
										<input type="date" id="fechaInicio" class="form-control" >
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Fecha Fin</label>
										
									</div>
									<div class="col-md-6">
										<input type="date" id="fechaFin" class="form-control" >
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>No. Deportes</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="deportes" class="form-control" >
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Categoría</label>
										
									</div>
									<div class="col-md-6">

										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_categoria;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="categoria" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["nombreCategoria"];
											echo "<option value='".$origen."'>".$origen."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>No. Deportistas damas</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="damas" class="form-control" >
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>No. Deportistas caballeros</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="caballeros" class="form-control" >
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>No. De Entrenadores</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="entrenadores" class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Valor Total</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="valorTotal" class="form-control" >							
									</div>
								</div>
							</div>
			

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<label>Observaciones</label>

								</div>
								<div class="col-md-8">
									<input type="input" id="observaciones" class="form-control" >							
								</div>
							</div>
						</div>


					</div>


				</div>
				<div class="modal-footer">
					<button type="button" onclick="encuentroActivoGuardarNuevo()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<div id="data"></div>
</div>




