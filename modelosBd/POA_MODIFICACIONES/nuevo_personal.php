<div class="modal fade" id="nuevoPersonal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Personal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="col-md-12">
					<section >

						<table class="table table-responsive">

							<thead >
								<th style="color: black">No. Cédula de ciudadanía / pasaporte</th>
								<th style="color: black">Apellidos y Nombres</th>
								<th style="color: black">Cargo</th>
								<th style="color: black">Tipo de cargo</th>
								<th style="color: black">Tiempo de trabajo (en meses)</th>
							</thead>
							<tbody >

								<tr >
									<td>
										<center>
											<input type="text" class="form-control" id="cedula"  value="vacante"/>
										</center>
									</td>
									<td>
										<center>
											<input type="text" class="form-control" id="nombres"  value="vacante"/>
										</center>
									</td>
									<td>
										<center>
											<input type="text"  class="form-control" id="cargo"  />
										</center>
									</td>
									<td>
										<center>
											<select name="select" class="form-control" id="tipo_cargo">
												<option value="value1">--Seleccione--</option>
												<option value="value2" >Administrativo</option>
												<option value="value2" >Mantenimiento</option>
												<option value="value3">Mantenimientos de Escenarios deportivos</option>
											</select>
										</center>
									</td>
									<td>
										<center>
											<input type="text" class="form-control" id="tiempo_trabajo"   value="0"/>
										</center>
									</td>
								</tr>
							</tbody>
						</table>
						<table class=" table table-responsive  ">

							<thead class="" style="color: red">
								<th style="color: black">Sueldo / Salario mensual</th>
								<th style="color: black">Aporte Patronal al IESS Mensual</th>
								<th style="color: black">Decimotercera remuneración</th>
								<th style="color: black">Mensualización Decimotercera remuneración</th>
								<th style="color: black">Decimocuarta remuneración</th>
								<th style="color: black">Mensualización Decimocuarta remuneración</th>
								<th style="color: black">Fondos de Reserva</th>
							</thead>
							<tbody >

								<td>
									<center>
										<input type="text" class="form-control" id="sueldo"  placeholder="0.00"/>
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="aporte_patronal"  placeholder="0.00"/>
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="decimotercero_valor"  placeholder="0.00"/>
									</center>
								</td>
								<td>
									<center>
										<select  class="form-control" id="decimotercero_mensualiza" >
											<option value="">--Seleccione--</option>
											<option value="si">Si</option>
											<option value="no">No</option>
										</select>
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="decimocuarto_valor"  placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<select class="form-control" id="decimocuarto_mensualiza" >
											<option value="">--Seleccione--</option>
											<option value="si">Si</option>
											<option value="no">No</option>
										</select>
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="fondos_reserva"  placeholder="0.00" />
									</center>
								</td>
							</tbody>
						</table>


						<table class=" table table-responsive  ">

							<thead class="" style="color: red">
								<th style="color: black">Enero</th>
								<th style="color: black">Febrero</th>
								<th style="color: black">Marzo</th>
								<th style="color: black">Abril</th>
								<th style="color: black">Mayo</th>
								<th style="color: black">Junio</th>
								<th style="color: black">Julio</th>
								<th style="color: black">Agosto</th>
								<th style="color: black">Septiembre</th>
								<th style="color: black">Octubre</th>
								<th style="color: black">Noviembre</th>
								<th style="color: black">Diciembre</th>
							</thead>
							<tbody >

								<td>
									<center>
										<input type="text" class="form-control" id="mes_1" placeholder="0.00"  />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_2" placeholder="0.00"  />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_3" placeholder="0.00"  />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_4" placeholder="0.00"  />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_5" placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_6" placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_7" placeholder="0.00" />
									</center>
								</td>								
								<td>
									<center>
										<input type="text" class="form-control" id="mes_8" placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_9" placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_10" placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_11" placeholder="0.00" />
									</center>
								</td>
								<td>
									<center>
										<input type="text" class="form-control" id="mes_12" placeholder="0.00" />
									</center>
								</td>

							</tbody>
						</table>


					</section>


				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" onclick="guardar_personal_nuevo()">Guardar</button>
			</div>
		</div>
	</div>
</div>