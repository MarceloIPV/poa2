<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="resumen_revisores_reactivaciones_suspenciones_plazos" class="col col-12 cell-border">

			<thead>

				<tr>
					<th rowspan="2"><center>Jurisdicción</center></th>
					<th rowspan="2"><center>RUC</center></th>
					<th rowspan="2"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>TIPO DE ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>PROVINCIA</center></th>
					<th rowspan="2"><center>CORREO</center></th>
					<th rowspan="2"><center>AÑO APROBACIÓN <br>POA</center></th>
					<th rowspan="1" colspan="36"><center>TRIMESTRE</center></th>
					

				</tr>

				<tr>

					<th><center>I</center></th>
					<th><center>FECHA</center></th>
					<th><center>ESTADO PLAZO</center></th>
					<th><center>FECHA PLAZO</center></th>
					<th><center>DOCUMENTO PLAZO</center></th>
					<th><center>ESTADO TRANSFERENCIA</center></th>
					<th><center>FECHA TRANSFERENCIA</center></th>
					<th><center>DOCUMENTO TRANSFERENCIA</center></th>
					<th><center>ACCION</center></th>
					

					<th style="background-color: #B03A2E;"><center>II</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA</center></th>
					<th style="background-color: #B03A2E;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>ESTADO TRANSFERENCIA</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA TRANSFERENCIA</center></th>
					<th style="background-color: #B03A2E;"><center>DOCUMENTO TRANSFERENCIA</center></th>
					<th style="background-color: #B03A2E;"><center>ACCION</center></th>

					<th style="background-color: #1D8348;"><center>IIII</center></th>
					<th style="background-color: #1D8348;"><center>FECHA</center></th>
					<th style="background-color: #1D8348;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>FECHA PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>ESTADO TRANSFERENCIA</center></th>
					<th style="background-color: #1D8348;"><center>FECHA TRANSFERENCIA</center></th>
					<th style="background-color: #1D8348;"><center>DOCUMENTO TRANSFERENCIA</center></th>
					<th style="background-color: #1D8348;"><center>ACCION</center></th>

					<th style="background-color: goldenrod;"><center>IV</center></th>
					<th style="background-color: goldenrod;"><center>FECHA</center></th>
					<th style="background-color: goldenrod;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>FECHA PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>ESTADO TRANSFERENCIA</center></th>
					<th style="background-color: goldenrod;"><center>FECHA TRANSFERENCIA</center></th>
					<th style="background-color: goldenrod;"><center>DOCUMENTO TRANSFERENCIA</center></th>
					<th style="background-color: goldenrod;"><center>ACCION</center></th>
					

				</tr>

			</thead>

		</table>

	</section>

</div>



<script>

$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
  datatabletsSeguimientoRevisorVacio($("#resumen_revisores_reactivaciones_suspenciones_plazos"),"resumen_revisores_reactivaciones_suspenciones_plazos","Reporte de Bloqueos",objetosSeguimiento2023([7,16,25,34,11,20,29,38,14,23,32,41,15,24,33,42],["enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","boton_plazos_suspenciones","boton_plazos_suspenciones","boton_plazos_suspenciones","boton_plazos_suspenciones"],[7,14,21,28,43,12,21,30,39],[7,14,21,28,10,17,24,31],[$("#filesFrontend").val()+'seguimiento/documentos_plazos/',]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__bloqueos__seguimientos2023"]);


});



</script>