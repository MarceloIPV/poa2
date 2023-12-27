<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<?php $objeto= new usuarioAcciones();?>

<?php $array = array();?>
<?php $array2 = array();?>


<?php $arrayInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idComponentes,a.nombreComponentes FROM poa_paid_componentes AS a INNER JOIN poa_paid_componentes_rubros AS b ON a.idComponentes=b.idComponente WHERE a.identificador='1' GROUP BY a.idComponentes;");?>

<?php foreach ($arrayInformacion as $valor): ?>

	<?php array_push($array, $valor["idComponentes"]);?>
	<?php array_push($array2, $valor["nombreComponentes"]);?>

<?php endforeach ?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Asignación de presupuesto para el proyecto fortalecimiento del deporte de alto rendimiento del Ecuador");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="1">

			<input type="hidden" id="texto__documentos" name="texto__documentos">

			<table id="asignarPresupuesto__paid" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>RUC</center></th>
						<th><center>Organismo deportivo</center></th>
						<th><center>Email</center></th>
						<th><center>Teléfonos</center></th>
						<th><center>Tipo organismo</center></th>
						<th><center>Provincia</center></th>
						<th><center>cédula<br>representante legal</center></th>
						<th><center>Nombre<br>representante legal</center></th>
						<th><center>Asignar</center></th>
						
					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<?=$componentesPaid->getModalAsignacion__paid("modalAsignarPre__paid","formAsignacion__paid",$array,$array2);?>