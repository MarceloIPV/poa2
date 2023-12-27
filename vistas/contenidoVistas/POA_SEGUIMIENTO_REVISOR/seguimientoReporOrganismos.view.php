<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="organismos__totalesVerificas" class="col col-12 cell-border">

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
  
  datatabletsSeguimientoRevisorVacio($("#organismos__totalesVerificas"),"organismos__totalesVerificas","Reporte Estado Envió Información Trimestral",objetosSeguimiento2023([8,10,12,14],["enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2"],[8,10,12,14],[8,10,12,14],[false]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__bloqueos__seguimientos2023"]);


});



</script>