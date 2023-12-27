<?php $componentes= new componentes();?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<?php $informacionFuncionario=$objetoInformacion->getInformacionGeneralFun($informacionObjeto[0]);?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"APROBADOS");?>

		<div class="row">

		<?php if (($informacionFuncionario[0][fisicamenteEstructura]==12 && $informacionObjeto[1]==2) || ($informacionFuncionario[0][fisicamenteEstructura]==14 && $informacionObjeto[1]==2) || ($informacionFuncionario[0][fisicamenteEstructura]==13 && $informacionObjeto[1]==2) || ($informacionFuncionario[0][fisicamenteEstructura]==19 && $informacionObjeto[1]==2)): ?>

		<table id="poasGestionados__finan__aprobado__dos" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Ruc</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Techo Notificado ( sin descuentos)</center></th>
					<th><center>Fecha de Aprobación de la Resolución POA (Fecha del quipux de la resolución)</center></th>
					<th><center>Fecha de aprobación</center></th>
					<th><center>Solicitar pago</center></th>

				</tr>

			</thead>

		</table>

			
		<?php else: ?>
			
		<table id="poasGestionados__finan__aprobado" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Ruc</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Techo Notificado ( sin descuentos)</center></th>
					<th><center>Fecha de Aprobación de la Resolución POA (Fecha del quipux de la resolución)</center></th>
					<th><center>Fecha de aprobación</center></th>

				</tr>

			</thead>

		</table>

		<?php endif ?>

		</div>

	</section>

</div>

<?=$componentes->getModalMatricezObserva("reasignarTra","formAsignarTraS","enviarTramite__Financiero__rechazos","Enviar");?>

<?=$componentes->getModalMatricezObserva__tres__aprobados("reasignarTra__dos","formAsignarTraS","enviarTramite__Financiero__rechazos","Enviar");?>

