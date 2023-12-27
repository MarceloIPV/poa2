<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>

<?php $anioActual = date('Y');?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $idOrganismos=$informacionObjeto[0][idOrganismo];?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>


<?php $primerTrimestre=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='primerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $segundoTrimestre=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='segundoTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $tercerTrimestre=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='tercerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $cuartoTrimestre=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='cuartoTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $primerTrimestreT=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='primerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND estadoR='T';");?>

<?php $segundoTrimestreT=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='segundoTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND estadoR='T';");?>

<?php $tercerTrimestreT=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='tercerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND estadoR='T';");?>


<?php $cuartoTrimestreT=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismos' AND a.tipoTrimestre='cuartoTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND estadoR='T';");?>

<?php $idOrganismoCambios=$objetoInformacion->getObtenerInformacionGeneral("SELECT justificacion,REPLACE(trimestre,'Trimestre','') AS trimestre,fecha,hora,estado FROM poa_seguimiento_control_cambios WHERE idOrganismo='$idOrganismos' AND (estado='P') AND perioIngreso='$aniosPeriodos__ingesos';");?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?php if (!empty($idOrganismoCambios[0][justificacion])): ?>
			
			<div class="col col-12 mt-2" style="font-weight: bold;">
				Usted tiene una petición de cambio pendiente con la siguiente descripción:
			</div>

			<table id="tabla__control__c" class="col col-12 cell-border mt-4">

				<thead>

					<tr>

						<th><center>Justificación</center></th>
						<th><center>Trimestre</center></th>
						<th><center>Fecha</center></th>
						<th><center>Hora</center></th>
						<th><center>Estado</center></th>

					</tr>

				</thead>	

				<tbody>

					<tr>

						<td><center><?=$idOrganismoCambios[0][justificacion]?></center></td>
						<td><center><?=$idOrganismoCambios[0][trimestre]?></center></td>
						<td><center><?=$idOrganismoCambios[0][fecha]?></center></td>
						<td><center><?=$idOrganismoCambios[0][hora]?></center></td>

						<?php if ($idOrganismoCambios[0][estado]=="P"): ?>
							<td><center>Pendiente</center></td>
						<?php endif ?>

						<?php if ($idOrganismoCambios[0][estado]=="A"): ?>
							<td><center>Su solicitud esta aprobada, tiene un tiempo de 72 horas para realizar los cambios solicitados</center></td>
						<?php endif ?>
						
						<?php if ($idOrganismoCambios[0][estado]=="T"): ?>
							<td><center>Proceso terminado</center></td>
						<?php endif ?>

					</tr>

				</tbody>							

			</table>

		<?php else: ?>
			
		<table id="tabla__control__c" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Trimestre</center></th>
					<th><center>Seleccionar</center></th>

				</tr>

			</thead>

			<tbody>
				
				<?php if (!empty($primerTrimestre[0][idEnviadorTrimestres])): ?>

				<tr>

					<td><center>Primero</center></td>

					<?php if (!empty($primerTrimestreT[0][idEnviadorTrimestres])): ?>
						<td style="font-weight: bold!important;"><center>NO PUEDE MODIFICAR INFORMACIÓN EN ESTE TRIMESTRE</center><td>
					<?php else: ?>
						<td><center><input type="radio" name="radio__control" class="radio__control" value="primerTrimestre" /></center></td>
					<?php endif ?>

				</tr>					
					
				<?php endif ?>

			
				<?php if (!empty($segundoTrimestre[0][idEnviadorTrimestres])): ?>

				<tr>

					<td><center>Segundo</center></td>

					<?php if (!empty($segundoTrimestreT[0][idEnviadorTrimestres])): ?>
						<td style="font-weight: bold!important;"><center>NO PUEDE MODIFICAR INFORMACIÓN EN ESTE TRIMESTRE</center><td>
					<?php else: ?>
						<td><center><input type="radio" name="radio__control" class="radio__control" value="segundoTrimestre" /></center></td>
					<?php endif ?>
					

				</tr>					
					
				<?php endif ?>

				<?php if (!empty($tercerTrimestre[0][idEnviadorTrimestres])): ?>

				<tr>

					<td><center>Tercero</center></td>

					<?php if (!empty($tercerTrimestreT[0][idEnviadorTrimestres])): ?>
						<td style="font-weight: bold!important;"><center>NO PUEDE MODIFICAR INFORMACIÓN EN ESTE TRIMESTRE</center><td>
					<?php else: ?>
						<td><center><input type="radio" name="radio__control" class="radio__control" value="tercerTrimestre" /></center></td>
					<?php endif ?>

					
				</tr>					
					
				<?php endif ?>


				<?php if (!empty($cuartoTrimestre[0][idEnviadorTrimestres])): ?>

				<tr>

					<td><center>Cuarto</center></td>

					<?php if (!empty($cuartoTrimestreT[0][idEnviadorTrimestres])): ?>
						<td style="font-weight: bold!important;"><center>NO PUEDE MODIFICAR INFORMACIÓN EN ESTE TRIMESTRE</center><td>
					<?php else: ?>
						<td><center><input type="radio" name="radio__control" class="radio__control" value="cuartoTrimestre" /></center></td>
					<?php endif ?>

				</tr>					
					
				<?php endif ?>


			</tbody>

		</table>

		<div class="col col-2 oculto__justificacion__control__seguimiento" style="font-weight: bold;">Justificación</div>
		<div class="col col-10 oculto__justificacion__control__seguimiento"><textarea id="justificacion" class="ancho__total__textareas"></textarea></div>

		<div class="oculto__justificacion__control__seguimiento col col-12 d d-flex justify-content-center mt-4">

			<button class="oculto__justificacion__control__seguimiento btn btn-primary" id="enviarSolicitud__Control">Enviar solicitud</button>

		</div>


		<?php endif ?>

	</section>

</div>

