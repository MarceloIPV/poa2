
<?php $componentes= new componentes();?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<?php $informacionFuncionario=$objetoInformacion->getInformacionGeneralFun($informacionObjeto[0]);?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"ORGANISMOS INTERVENIDOS");?>

		<?php if ($informacionFuncionario[0][fisicamenteEstructura]!="23"): ?>

			<?=$componentes->getComponentes(1,"<button class='btn btn-info' id='agregarModal' data-toggle='modal' data-target='#modalIntervencion'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</button>");?>
			
		<?php endif ?>

		<div class="row">

		<table id="intervencionesAsuntos" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>CÉDULA INTERVENTOR</center></th>
					<th><center>INTERVENTOR</center></th>
					<th><center>FECHA DE INICIO<br>DE LA INTERVENCIÓN</center></th>
					<th><center>FECHA DE FINALIZACIÓN<br>DE LA INTERVENCIÓN</center></th>
					<th><center>ELIMINAR</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<!--========================================
=            Sección de modales            =
=========================================-->

<?=$componentes->getModalAgregar__informacion("modalIntervencion","Agregar intervención");?>


<?=$componentes->getModalEliminar__informacion("modalEliminarIntervencio","¿Está seguro de eliminar intervención?");?>

<!--====  End of Sección de modales  ====-->



