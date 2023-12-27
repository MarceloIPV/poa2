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

					<?php if ($informacionFuncionario[0][fisicamenteEstructura]=="18" && $informacionObjeto[1]=="2"): ?>

						<th>
							<center>Editar</center>
							<input type="hidden" id="usuarioP" name="usuarioP" value="si">
						</th>

					<?php else: ?>

						<input type="hidden" id="usuarioP" name="usuarioP" value="no">
						
					<?php endif ?>

					<th><center>VER</center></th>

					
				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<?=$componentes->getModal__inforDefinitivas("editarInfor__gestionados","EDITAR INFORMACIÓN","editarInfor","form__editarInfors");?>

<?=$componentes->getModalMatricezObserva__terminar("verPoaGe","formPoaVer");?>
