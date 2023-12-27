
<?php $componentes= new componentes();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
$objeto= new usuarioAcciones();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"EQUIPO INTERDISCIPLINARIO");?>

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

			<table id="paidRubrosInterdisciplinario" class="col col-12 cell-border">

				<thead>

					<tr align="center">
						<th COLSPAN=1><center>Cédula</center></th>
						<th COLSPAN=1><center>Modalidad</center></th>
						<th COLSPAN=1><center>Sexo</center></th>	
						<th COLSPAN=1><center>Cargo o función</center></th>
						<th COLSPAN=1><center>Nombres</center></th>
						<th COLSPAN=1><center>Apellidos</center></th>
						<th COLSPAN=1><center>Fecha Inicio </center></th>
						<th COLSPAN=1><center>Fecha Fin</center></th>
						<th COLSPAN=1><center>Valor mes acordado. ATL.</center></th>
						<th COLSPAN=1><center>No. Meses</center></th>
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
										<label>Cedúla</label>
										
									</div>
									<div class="col-md-6">
										<input type="input" id="cedula" class="form-control" >	
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
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Sexo</label>
										
									</div>
									<div class="col-md-6">
										<select name="select" id="sexo" class="form-control">
											<option value="" selected>Seleccione</option>
											<option value="Hombre" >Hombre</option>
											<option value="Mujer">Mujer</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Cargo o función</label>
										
									</div>
									<div class="col-md-6">
										<select name="select" id="cargo" class="form-control">
											<option value="" selected>Seleccione</option>
											<option value="Entrenador" >Entrenador</option>
											<option value="Asistente Técnico">Asistente Técnico</option>
											<option value="Preparador Físico" >Preparador Físico</option>
											<option value="Otros Profesionales">Otros Profesionales</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Nombres</label>
										
									</div>
									<div class="col-md-6">
										<input type="input" id="nombres" class="form-control" >	
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										<label>Apellidos</label>
										
									</div>
									<div class="col-md-9">
										<input type="input" id="apellidos" class="form-control" >							
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
										<input type="date" id="fechaFin"  class="form-control" >
									</div>
								</div>
							</div>



							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<label>Valor/mes acordado incl impuestos</label>
										
									</div>
									<div class="col-md-6">
										<input type="number" id="valorMes" class="form-control" >							
									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="row">
									<div class="col-md-4">
										<label>N° Meses</label>
										
									</div>
									<div class="col-md-8">
										<input type="number" id="meses" oninput="interdisciplinarioMeses()" class="form-control" >					
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
						<button type="button" onclick="interdisciplinarioGuardarNuevo()" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

		<div id="data"></div>
	</div>



