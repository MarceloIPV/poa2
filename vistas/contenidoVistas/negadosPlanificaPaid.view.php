
<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"PAID RECOMENDACIÓN");?>

		<div class="row">

		<table id="organismoSubses__paid__negados__paid__planificacion" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Ruc</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo organismo</center></th>
					<th><center>Representante</center></th>
					<th><center>Fecha<br>envío PAID</center></th>
					<th><center>Provincia</center></th>
					<th><center>Reasignar</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>


<?=$componentesPaid->modalReenvioPaid__niegas("modalReenvioPaid__negados","formReenvio__paid__negados");?>