
<?php  

$tipoServicio= $_POST["tipoServicio"];

$idUsuario= $_POST["idUsuario"];
if ($tipoServicio == 1) {
	$tipo = "Agua Potable";
	# code...
}
if ($tipoServicio == 2) {
	$tipo = "Energía Eléctrica";
	# code...
}

?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo suministro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="col-md-12">
					<section >
						<table class=" table table-responsive  ">

							<thead class="" style="color: red">
								<th style="color: black">Tipo</th>
								<th style="color: black">Nombre del escenario deportivo o Residencia para Fomento Deportivo</th>
								<th style="color: black">Suministro <?php echo $tipo;  ?></th>
												</thead>
							<tbody >

								<td>
									<center>
										<select id="tipo" class="form-control">
											<option value="Administrativo" selected>Administrativo</option>
											<option value="Escenario deportivo/residencia para fomento deportivo">Escenario deportivo/residencia para fomento deportivo</option>
										</select>
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="nombre_escenario"  placeholder="0.00"/>
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="suministro"  placeholder="0.00"/>
									</center>
								</td>
								
							</tbody>
						</table>
					</section>

					<section >
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label>1.-Oficio dirigido al coordinador de planificación solicitando la aprobación de un suministro</label>
										</div>				
										<div class="col-md-4">
											<input type="file" class="form-control" id="oficio" />
										</div>	
									</div>
								</div>	
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label>2.-Informe de inspección favorable suscrito por la empresa prestadora del servicio público  correspondiente.</label>
										</div>				
										<div class="col-md-4">
											<input type="file" class="form-control" id="informe_inspeccion" />
										</div>	
									</div>
								</div>	
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<label>3.-Certificación de que las instalaciones cuentan con los medidores independientes de agua y  luz, emitida por la empresa prestadora del servicio público correspondiente</label>
										</div>				
										<div class="col-md-4">
											<input type="file" class="form-control" id="certificado" />
										</div>	
									</div>
								</div>	
								<div class="col-md-12">
								
										
							</div>								
						</div>
					</section>

				</div>
				<div class="modal-footer">
	                    <div class="col-md-12">
									<div class="row">
										<div class="col-md-4">
											
										</div>				
										<div class="col-md-4">
											<button class="form-control btn btn-success" onclick="suministros_guardar_nuevo(<?php  echo $tipoServicio; ?>,<?php  echo $idUsuario; ?>)">Guardar</button>
										</div>	
										<div class="col-md-4">
											
										</div>

									</div>
								</div>	
				</div>
			</div>