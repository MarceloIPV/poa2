<?php $componentes= new componentes();?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<?php $informacionFuncionario=$objetoInformacion->getInformacionGeneralFun($informacionObjeto[0]);?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"POAS GESTIONADOS");?>

		<div class="row">

			<table id="poasGestionados" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>PROVINCIA</center></th>
						<th><center>CANTÓN</center></th>
						<th><center>PARROQUIA</center></th>
						<th><center>NÚMERO DE<br>RESOLUCIÓN</center></th>
						<th><center>RESOLUCIÓN</center></th>
						<th><center>FECHA TRAMITADO</center></th>
						<th><center>TECHO NOTIFICADO (SIN DESCUENTOS)</center></th>


						<th>
							<center>Editar</center>
							<input type="hidden" id="usuarioP" name="usuarioP" value="si">
						</th>

						<input type="hidden" id="usuarioP" name="usuarioP" value="no">
						

						<th><center>VER</center></th>


					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<?=$componentes->getModal__inforDefinitivas("editarInfor__gestionados","EDITAR INFORMACIÓN","editarInfor","form__editarInfors");?>

<?=$componentes->getModalMatricezObserva__terminar("verPoaGe","formPoaVer");?>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <div style="height:500px; overflow: scroll;">
			<table >

				<thead class="">
					<th  scope="col">No. Cédula de ciudadanía / pasaporte</th>
					<th class="th_enlaces1 header" scope="col">Apellidos y Nombres</th>
					<th class="th_enlaces1 header" scope="col">Cargo</th>
					<th class="th_enlaces1 header" scope="col">Tipo de cargo</th>
					<th class="th_enlaces1 header" scope="col">Tiempo de trabajo (en meses)</th>
					<th class="th_enlaces1 header" scope="col">Sueldo / Salario mensual</th>
					<th class="th_enlaces1 header" scope="col">Aporte Patronal al IESS Mensual</th>
					<th class="th_enlaces1 header" scope="col">Decimotercera remuneración</th>
					<th class="th_enlaces1 header" scope="col">Mensualización Decimotercera remuneración</th>
					<th class="th_enlaces1 header" scope="col">Decimocuarta remuneración</th>
					<th class="th_enlaces1 header" scope="col">Mensualización Decimocuarta remuneración</th>
					<th class="th_enlaces1 header" scope="col">Fondos de Reserva</th>
				</thead>
				<tbody class="cuerpoMatriz1">

					<tr class="item__Pre'+sumadorSueldosSalarios+' tr__enlaces'+sumadorSueldosSalarios+'">
						<td>
							<center>
								<label>MOYON TOAPANTA LILIAN MARIANA</label>
							</center>
						</td>
						<td>
							<center>
								<label>ADMINISTRADORA GENERAL</label>
							</center>
						</td>
						<td>
							<center>
								<label>Administrativo</label>
							</center>
						</td>
						<td>
							<center>
								<label>201</label>
							</center>
						</td>
						<td>
							<center>
								<label>227.81</label>
							</center>
						</td>
						<td>
						<center>
								<label>1875.00</label>
							</center>
						</td>
						<td>
							<center>
								<label>si</label>
							</center>
						</td>
						<td>
							<center>
								<label>425</label>
							</center>
						</td>
						<td>
							<center>
								<label>si</label>
							</center>
						</td>
						<td>
							<center>
								<label>156.19</label>
							</center>
						</td>
						<td>
							<center>
								<label>si</label>
							</center>
						</td>
						<td>
							<center>
								<label>156.19</label>
							</center>
						</td>
					</tr>
				</tbody>
			</table>
			 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


