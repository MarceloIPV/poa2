
<?php $componentes= new componentes();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
$objeto= new usuarioAcciones();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Eventos");?>

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

			<table id="paidRubrosEventos" class="col col-12 cell-border">

				<thead>

					<tr align="center">
						<th COLSPAN=1><center>A.D</center></th>
						<th COLSPAN=1><center>Deporte</center></th>
						<th COLSPAN=1><center>Modalidad</center></th>
						<th COLSPAN=1><center>Nombre del evento</center></th>	
						<th COLSPAN=1><center>Prueba</center></th>
						<th COLSPAN=1><center>Categoria</center></th>
						<th COLSPAN=1><center>Fecha Inicio</center></th>
						<th COLSPAN=1><center>Fecha Fin</center></th>
						<th COLSPAN=1><center>Sede  Ciudad  Pais</center></th>
						<th COLSPAN=1><center>No. ATL.</center></th>
						<th COLSPAN=1><center>No. Ent. Ofic.</center></th>
						<th COLSPAN=1><center>No. DIAS</center></th>
						<th COLSPAN=1><center>No. PAX</center></th>
						<th COLSPAN=1><center>Valor Total</center></th>
						<th COLSPAN=1><center>Observaciones</center></th>
						<th COLSPAN=1><center>Editar</center></th>
						<th COLSPAN=1><center>Eliminar</center></th>
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
										<label>Deporte</label>
										
									</div>
									<div class="col-md-6">



										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_deporte;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="deporte" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["nombreDeporte"];
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
										<label>Modalidad</label>
										
									</div>
									<div class="col-md-6">


										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_modalidad;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="idModalidad" aria-label="Default select example">';
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

							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<label>Nombres</label>
										
									</div>
									<div class="col-md-9">
										<input type="input" id="idNombres" class="form-control" >							
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Prueba</label>
										
									</div>
									<div class="col-md-6">
										
										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_prueba;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="idprueba" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["nombrePrueba"];
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
										<label>Categoria</label>
										
									</div>
									<div class="col-md-6">

									

											<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_categoria;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="idategoria" aria-label="Default select example">';
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
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<label>Fecha Inicio</label>
										
									</div>
									<div class="col-md-6">
										<input type="date" id="fechaInicio" class="form-control" >
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<label>Fecha Fin</label>
										
									</div>
									<div class="col-md-6">
										<input type="date" id="fechaFin"  class="form-control" >
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-4">
										<label>Sede  Ciudad  Pais</label>
										
									</div>
									<div class="col-md-6">

										<?php 
										$objeto1= new usuarioAcciones();
										$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_ciudad;");
										$jason['indicadorInformacion']=$indicadorInformacion1;
										echo '<select class="form-select" id="ciudad" aria-label="Default select example">';
										echo "	<option selected>Seleccione</option>";									foreach ($indicadorInformacion1 as $row1)
										{
											$origen= $row1["estadonombre"];
											echo "<option value='".$origen."'>".$origen."</option>";
										}
										echo "	</select>";
										?>
									</div>
								</div>
							</div>



							<div class="col-md-3">
								<div class="row">
									<div class="col-md-6">
										<label>No.  ENT.  OFIC.</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="oficina" oninput="eventosDias()" class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="row">
									<div class="col-md-5">
										<label>No.  Atl.</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="atletas" oninput="eventosNumeroAtletas()"class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="row">
									<div class="col-md-5">
										<label>No. Días.</label>
										
									</div>
									<div class="col-md-6">
										<input type="text" id="dias"  class="form-control" readonly="">
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="row">
									<div class="col-md-5">
										<label>No.  Pax.</label>
										
									</div>
									<div class="col-md-6">
										<input type="text" id="pax" class="form-control" readonly="" >
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


							<div class="col-md-6">
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
						<button type="button" onclick="rubroGuardarNuevo()" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

		<div id="data"></div>
	</div>



