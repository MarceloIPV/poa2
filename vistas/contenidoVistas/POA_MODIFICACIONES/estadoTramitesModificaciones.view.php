
<?php 
session_start();
$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];
$objeto= new usuarioAcciones();
?>
<?php $componentesModificacion= new componentesModificacionRevisor();?>

<?php $informacionObjeto = $objeto->getInformacionCompletaOrganismoDeportivo(); ?>

<?php
date_default_timezone_set("America/Guayaquil");
$dia__actual = date('d');
$diaEntero=intval($dia__actual);
?>

<?php $consultaComparativa=$objeto->get__obtengoInformacion__modiIngresadas();?>

<?php $cierres__anios__modificaciones = $objeto->getObtenerInformacionGeneral("SELECT estado FROM poa_cierre_fiscal_paid_modificaciones WHERE periodo='$aniosPeriodos__ingesos' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='si';"); ?>

<?php $estado__modiM = $objeto->getObtenerInformacionGeneral("SELECT estado FROM poa_modificaciones_envio_inicial WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND periodoIngreso='$aniosPeriodos__ingesos' AND estado='E' ORDER BY idModificacionDerfinitiva DESC LIMIT 1;"); ?>



<!-- datatablets -->
<script type="text/javascript" src="layout/datatablets/datatables.min.js"></script>

<!--==============================================================
=            Botones exportadores para el DATATABLETS            =
===============================================================-->

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>


<!--====  End of Botones exportadores para el DATATABLETS  ====-->

<style type="text/css">
	
.dt-buttons{
	display: flex!important;
}

</style>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?php if ((empty($consultaComparativa[0][estado]) || $consultaComparativa[0][estado]=='T') && empty($estado__modiM[0][estado])  && empty($cierres__anios__modificaciones[0][estado])): ?>

			
			<div class="row">

				<div class="col col-8" style="font-weight: bold;">
					Seleccionar el mes al que corresponden las modificaciones
				</div>

				<div class="col col-4">
					<select id="select__meses" name="select__meses" style="width: 100%; height: 25px;">
						<option value="0">--Seleccione un mes--</option>
						<option value="enero">Enero</option>
						<option value="febrero">Febrero</option>
						<option value="marzo">Marzo</option>
						<option value="abril">Abril</option>
						<option value="mayo">Mayo</option>
						<option value="junio">Junio</option>
						<option value="julio">Julio</option>
						<option value="agosto">Agosto</option>
						<option value="septiembre">Septiembre</option>
						<option value="octubre">Octubre</option>
						<option value="noviembre">Noviembre</option>
						<option value="diciembre">Diciembre</option>
					</select>
				</div>

				<div class="col col-12 d d-flex justify-content-center">
					<button id="enviarTramites__conjunto" name="enviarTramites__conjunto" class="btn btn-primary mt-2 mb-2">
						Enviar Trámites
					</button>
				</div>
				
			</div>

			<input type="hidden" id="identificadorModificaciones" name="identificadorModificaciones" value="0"/>

		<?php endif ?>


		<?php if ($consultaComparativa[0][estado]=='E' || !empty($estado__modiM[0][estado])): ?>
			
			<h1>USTED TIENE UN TRÁMITE ENVIADO</h1>

			<input type="hidden" id="identificadorModificaciones" name="identificadorModificaciones" value="1"/>

		<?php endif ?>


		<?php if (!empty($cierres__anios__modificaciones[0][estado]) && $consultaComparativa[0][estado]!='E'): ?>
			
			<h1>FECHA DE ENVÍO MÁXIMO HASTA EL 15 DE CADA MES</h1>

			<input type="hidden" id="identificadorModificaciones" name="identificadorModificaciones" value="1"/>

		<?php endif ?>


		<div id="div1">

			<table class="table table-striped" id="tabla__principal__absoluta__modificaciones" border="1">

				
				<thead>

					<tr>
					
						<th class="bg-warning" colspan="8" align="center"><center>ORÍGEN&nbsp;&nbsp;<button style="margin-top:2em;padding: 1em;" class="btn-success" id="mostrarNuevo" attr="hiddenMostar" data-toggle="tooltip" data-placement="top" title="Mostrar columnas: Evento, Infraestructura y código">DESPLEGAR <i class="fa fa-eye" aria-hidden="true"></i></button></center></th>
						<th colspan="8"><center>DESTINO&nbsp;&nbsp;<button style="margin-top:2em;padding: 1em;" class="btn-success" id="mostrarNuevo1" attr="hiddenMostar" data-toggle="tooltip" data-placement="top" title="Mostrar columnas: Evento, Infraestructura y código">DESPLEGAR <i class="fa fa-eye" aria-hidden="true"></i></button></center></th>
						<th class="bg-warning" rowspan="2">Acciones</th>

					</tr>

					<tr>
					
						<th class="bg-warning" align="center">Nombre Actividad</th>
						<th class="bg-warning">Evento, Tarea o Intervencion o personal</th>
						<th class="bg-warning">Infraestructura Deportiva</th>
						<th class="bg-warning">Código</th>
						<th class="bg-warning">Ítem</th>
						<th class="bg-warning">Mes Programado</th>
						<th class="bg-warning">Monto / Disminución</th>
						<th class="bg-warning">Total Disminución</th>
						<th>Nombre Actividad</th>
						<th>Evento, Tarea o Intervencion o personal</th>
						<th>Infraestructura Deportiva</th>
						<th>Código</th>
						<th>Ítem</th>
						<th>Mes Programado</th>
						<th>Monto / Incremento</th>
						<th>Total Incremento</th>

					</tr>

				</thead>

			</table>
		</div>

	</section>

</div>

<style type="text/css">
	
#div1 {
     overflow:scroll;
     width:100%;
     height: 800px;
}
#div1 table {
    width:90%;
}

#tablaGeneral{
	width: 100%!important;
}

.div__scroll{
   overflow:scroll;
   width:100%;
}

#tabla__principal__absoluta__modificaciones {
  font-size: 8px;
}

td {
  font-size: 8px;
}

th {
  font-size: 8px;
}

</style>



<script type="text/javascript" src="layout/scripts/js/modificacion/insertaModificaciones.js?v=1.4.5"></script>
<script type="text/javascript" src="layout/scripts/js/modificacion/tramitesModificaciones.js"></script>
<script type="text/javascript">
$(document).ready(function () {
tablaConstruccion("modificaciones__enviadas",$("#tabla__principal__absoluta__modificaciones"));
});	
</script>

<!--=====================================
=            Sección modales          =
======================================-->

<?=$componentesModificacion->matricez__origen__destino__inicial("modalOrigenDestinoMatricez");?>

<?=$componentesModificacion->modal__bonificaciones__meses__sueldos("modal__bonificaciones__meses__sueldos");?>

<!--====  End of Sección modales  ====-->
