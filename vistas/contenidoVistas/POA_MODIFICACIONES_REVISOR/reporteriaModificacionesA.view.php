<?php $componentes= new componentes();?>
<?php $componentesModificacion= new componentesModificacionRevisor();?>

<script type="text/javascript" src="layout/scripts/js/modificacionRevisor/index.js"></script>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="row">

			<table id="reasignacionModificaciones__recomendaciones__planificacion__general__organismo__funcionario" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>N.-<br>Modificación</center></th>
						<th><center>Fecha</center></th>
						<th><center>RUC</center></th>
						<th><center>Organismo<br>deportivo</center></th>
						<th><center>Tipo<br>Organismo</center></th>
						<th><center>Provincia</center></th>
						<th><center>Ver</center></th>

					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<!--=====================================
=            Sección modales        =
======================================-->

<?=$componentesModificacion->modal__total__modificaciones("modalModificaciones__reasignaciones");?>

<?=$componentesModificacion->matricez__origen__destino__inicial("modalOrigenDestinoMatricez");?>

<!--====  End of Sección modales  ====-->
