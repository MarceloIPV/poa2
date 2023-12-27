
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"APROBACIÓN DE USUARIOS");?>

		<div class="row">

		<table id="usuariosAplicativo" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Nombres</center></th>
					<th><center>Tipo Usuario</center></th>
					<th><center>Ver</center></th>
					<th><center>Eliminar</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

