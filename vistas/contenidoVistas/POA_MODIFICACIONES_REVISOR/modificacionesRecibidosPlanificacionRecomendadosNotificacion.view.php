<?php $componentes= new componentes();?>
<?php $componentesModificacion= new componentesModificacionRevisor();?>
<script type="text/javascript" src="layout/scripts/js/modificacionRevisor/index.js"></script>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"MODIFICACIONES RECIBIDAS");?>

		<div class="row">

		<br>

		<table id="reasignacionModificaciones__recomendaciones__planificacion__recomendacion__quipux" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Tipo Organismo</center></th>
					<th><center>Provincia</center></th>
					<th><center>Reasignar</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>


<!--=====================================
=            Sección modales          =
======================================-->

<?=$componentesModificacion->recomendacion__modificacion__planificacion__recomendacion__quipux("modalModificaciones__reasignaciones");?>
<?=$componentesModificacion->matricez__origen__destino__inicial("modalOrigenDestinoMatricez");?>

<!--====  End of Sección modales  ====-->
