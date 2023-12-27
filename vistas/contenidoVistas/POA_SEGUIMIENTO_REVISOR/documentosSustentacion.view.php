<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="documentos__verificasDocumentacion" class="col col-12 cell-border">

			<thead>

				<tr>

					<th rowspan="2"><center>JURISDICCIÓN</center></th>
					<th rowspan="2"><center>RUC</center></th>
					<th rowspan="2"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>TIPO DE ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>PROVINCIA</center></th>
					<th rowspan="2"><center>CANTON</center></th>
					<th rowspan="2"><center>PARROQUIA</center></th>
					<th rowspan="2"><center>AÑO APROBACIÓN POA</center></th>
					<th rowspan="1" colspan="8"><center>TRIMESTRE</center></th>				

				</tr>
				<tr>

					<th><center>I</center></th>
					<th><center>FECHA</center></th>
					<th><center>II</center></th>
					<th><center>FECHA</center></th>
					<th><center>IIII</center></th>
					<th><center>FECHA</center></th>
					<th><center>IV</center></th>
					<th><center>FECHA</center></th>
				</tr>

			</thead>

		</table>

	</section>

</div>

<script>


$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
	
	//datatabletsSeguimientoRevisorVacio($("#documentos__verificasDocumentacion"),"documentos__verificasDocumentacion","Reportes y Anexos",objetos([9],["enlace"],['documento'],["documentos/declaracionTerminos/"],["documento"]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],false);	
	
	datatabletsSeguimientoRevisorVacio($("#documentos__verificasDocumentacion"),"documentos__verificasDocumentacion","Reportes y Anexos",objetosSeguimiento2023([8,10,12,14],["enlaces__enviado__documento","enlaces__enviado__documento","enlaces__enviado__documento","enlaces__enviado__documento"],[8,10,12,14],[$("#filesFrontend").val()+"seguimiento/declaracion_recursos_publicos/",$("#filesFrontend").val()+"seguimiento/declaracion_recursos_publicos/", $("#filesFrontend").val()+"seguimiento/declaracion_recursos_publicos/", $("#filesFrontend").val()+"seguimiento/declaracion_recursos_publicos/"],["documento","documento2","documento3","documento4"],["documento","documento2","documento3","documento4"]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],false);	
	
	
});


</script>
