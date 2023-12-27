<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"]; ?>
<?php $objeto= new usuarioAcciones(); ?>
<?php $componentesModificacion= new componentesModificacionRevisor();?>

<?php $variableRequest= $_SERVER['REQUEST_URI']; ?>

<?php $arrayResquest= explode("?idOrganismo=", $variableRequest); ?>

<input type="hidden" id="idOrganismoAd" name="idOrganismoAd" value="<?=$arrayResquest[1]?>">


<?php $nombreOrganismos = $objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo  FROM poa_organismo WHERE idOrganismo='$arrayResquest[1]';"); ?>

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

		<div class="col col-12 d d-flex justify-content-center" style="font-size: 20px; font-weight: bold; text-transform: uppercase;;">
			<?=$nombreOrganismos[0][nombreOrganismo]?>
		</div>

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
						<th style="color:black;">Nombre Actividad</th>
						<th style="color:black;">Evento, Tarea o Intervencion o personal</th>
						<th style="color:black;">Infraestructura Deportiva</th>
						<th style="color:black;">Código</th>
						<th style="color:black;">Ítem</th>
						<th style="color:black;">Mes Programado</th>
						<th style="color:black;">Monto / Incremento</th>
						<th style="color:black;">Total Incremento</th>

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



<script type="text/javascript" src="layout/scripts/js/modificacionRevisor/tramitesModificaciones.js"></script>
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
