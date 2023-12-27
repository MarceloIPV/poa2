<?php $componentes= new componentes();?>
<?php $componentesModificacion= new componentesModificacionRevisor();?>
<script type="text/javascript" src="layout/scripts/js/modificacionRevisor/index.js"></script>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"MODIFICACIONES PARA APROBACIÓN GENERAL");?>

		<div class="row" style="width: 100%; overflow: auto;">

		<br>

		<table id="reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales__doces" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC/SEMESTRE</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>ALTO RENDIMIENTO</center></th>
					<th><center>ACTIVIDAD FÍSICA</center></th>
					<th><center>ADMINISTRATIVA FINANCIERA</center></th>
					<th><center>PLANIFICACION Y GESTION ESTRATEGICA</center></th>
					<th><center>ADMINISTRACION E INFRAESTRUCTURA DEPORTIVA</center></th>
					<th><center>NOTIFICACIÓN</center></th>
					<th><center>REVISAR</center></th>
					<th><center>FECHA</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<!--=============================
=            modales            =
==============================-->

<?=$componentesModificacion->getModalAtributosPdfs__aprobar("modalAprobarD");?>

<?=$componentesModificacion->getModalMatricezObserva2("modalVisualizaMatrices","formVisualizaM");?>


<!--====  End of modales  ====-->
