<?php $componentes= new componentes();?>

<?php $objetoInformacion = new usuarioAcciones(); ?>

<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>

<?php $idOrganismo = $informacionObjeto[0][idOrganismo]?>

<div class="content-wrapper">
	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"REPORTES NOTIFICACIÓN");?>

		<div class="row">

		<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="incremento" />

		<table id="notificacionIncrementoDecremento__v1" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>Fecha de Envío</center></th>
					<th><center>Hora</center></th>
					<th><center>Estado</center></th>
					<th><center>Tipo Trámite</center></th>
					<th><center>Monto</center></th>
					<th><center>Techo Actualizado</center></th>
					<th><center>Documento</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>
</div>

<!--=============================
=            Modales            =
==============================-->

<!--====  End of Modales  ====-->

<script type="text/javascript">

 var idOrganismo = "<?= $idOrganismo?>"; 

 var variableBack = $("#filesFrontend").val();

datatablets__notifica__incrementos__OD($("#notificacionIncrementoDecremento__v1"),"notificacionIncrementoDecremento__v1","seguimiento",idOrganismo,variableBack);

</script>

