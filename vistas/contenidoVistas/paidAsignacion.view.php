<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<?php $objeto= new usuarioAcciones();?>

<?php $array = array();?>
<?php $array2 = array();?>

<?php $arrayInformacion=$objeto->getObtenerInformacionGeneral("SELECT nombreRubros FROM poa_paid_rubros WHERE identificador='0';");?>
<?php $arrayInformacion2=$objeto->getObtenerInformacionGeneral("SELECT idRubros FROM poa_paid_rubros WHERE identificador='0';");?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Asignación de presupuesto para el proyecto fortalecimiento del deporte de alto rendimiento del Ecuador");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="0">

			<input type="hidden" id="texto__documentos" name="texto__documentos">

			<?php foreach ($arrayInformacion as $clave => $valor): ?>

				<?php foreach ($valor as $clave2 => $valor2): ?>

					<?php array_push($array, $valor2);?>

				<?php endforeach ?>
				
			<?php endforeach ?>


			<?php foreach ($arrayInformacion2 as $clave => $valor): ?>

				<?php foreach ($valor as $clave2 => $valor2): ?>

					<?php array_push($array2, $valor2);?>

				<?php endforeach ?>
				
			<?php endforeach ?>


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