
<?php $componentes= new componentes();?>

<?php $anio__actuales = date('Y');?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"MODIFICACIONES AÑO $anio__actuales");?>

		<div class="row">

		<table id="organismoGeneralEn__modificaciones" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Ruc</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo organismo</center></th>
					<th><center>Representante</center></th>
					<th><center>Fecha<br>envío POA</center></th>
					<th><center>Revisar</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>



<?=$componentes->getModalMatricezObserva("reasignarTra","formAsignarTraS","enviarTramite","Enviar");?>

<?=$componentes->getModalMatricezObserva2("modalVisualizaMatrices","formVisualizaM");?>