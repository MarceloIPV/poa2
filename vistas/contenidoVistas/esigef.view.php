
<?php $componentes= new componentes();?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<?php $informacionFuncionario=$objetoInformacion->getInformacionGeneralFun($informacionObjeto[0]);?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"ESIGEF");?>

		<?=$componentes->getComponentes(1,"<div class='row'><div class='col col-10'><select class='ancho__total__input obligatorios' id='organismosSegumiento'></select></div><div class='col col-2'><a class='btn btn-warning' id='agregarOrganismoEsigef'><i class='fa fa-floppy-o' aria-hidden='true'></i></a></div></div>");?>


		<div class="row">

		<table id="esigef" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>ELIMINAR</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>





