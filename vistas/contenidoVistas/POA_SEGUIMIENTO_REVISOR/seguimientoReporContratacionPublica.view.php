<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="organismos__ContratacionPublica" class="col col-12 cell-border">

			<thead>

				<tr>
					<th rowspan="2"><center>Jurisdicción</center></th>
					<th rowspan="2"><center>RUC</center></th>
					<th rowspan="2"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>TIPO DE ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>PROVINCIA</center></th>
					<th rowspan="2"><center>CANTÓN</center></th>
					<th rowspan="2"><center>EMAIL</center></th>
					<th rowspan="2"><center>AÑO APROBACIÓN <br>POA</center></th>
					<th rowspan="1" colspan="8"><center>TRIMESTRE</center></th>

				</tr>

				<tr>

					<th><center>I</center></th>
					<th><center>FECHA</center></th>
					<th><center>II</center></th>
					<th><center>FECHA</center></th>
					<th><center>III</center></th>
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
  
  datatabletsSeguimientoRevisorVacio($("#organismos__ContratacionPublica"),"organismos__ContratacionPublica","Reporte de Bloqueos",objetosSeguimiento2023([8,10,12,14],["enlaces__enviado__documento","enlaces__enviado__documento","enlaces__enviado__documento","enlaces__enviado__documento"],[8,10,12,14],[$("#filesFrontend").val()+"seguimiento/declaracion_contratacion_publica/",$("#filesFrontend").val()+"seguimiento/declaracion_contratacion_publica/",$("#filesFrontend").val()+"seguimiento/declaracion_contratacion_publica/",$("#filesFrontend").val()+"seguimiento/declaracion_contratacion_publica/"],['documento','documento2','documento3','documento4'],['documento','documento2','documento3','documento4']),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],false);


});



</script>