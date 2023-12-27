
<?php $objeto= new usuarioAcciones();?>

<?php session_start();?>

<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<?php $informacionSeleccionada=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo  FROM poa_catalogo_contraloria AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo GROUP BY a.idOrganismo;");?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="col col-12 d d-flex justify-content-center">

			<button type="button" class="btn btn-success excelProyectosMatricez col col-1"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;EXCEL</button>

		</div>

		<div class="row">

			<table class="valores__adicionales" id="valores__adicionales">
				<thead>
					<tr>
						<th align="center">Organismo</th>
						<th align="center">Tipo de contratación</th>
						<th align="center">Número de contratación</th>
						<th align="center">Monto</th>
					</tr>
				</thead>
				
				<?php foreach ($informacionSeleccionada as  $clave =>  $valor): ?>

					<?php

						$obtenerInformacion__1=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__elect='si' GROUP BY idOrganismo;");
						$obtenerInformacion__2=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__subasta='si' GROUP BY idOrganismo;");
						$obtenerInformacion__3=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__infima='si' GROUP BY idOrganismo;");
						$obtenerInformacion__4=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__menorCuantia='si' GROUP BY idOrganismo;");
						$obtenerInformacion__5=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__cotizacion='si' GROUP BY idOrganismo;");
						$obtenerInformacion__6=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__licitacion='si' GROUP BY idOrganismo;");
						$obtenerInformacion__7=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__menorCuantiaObras='si' GROUP BY idOrganismo;");
						$obtenerInformacion__8=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__cotizacionObras='si' GROUP BY idOrganismo;");
						$obtenerInformacion__9=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__licitacionObras='si' GROUP BY idOrganismo;");
						$obtenerInformacion__10=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__precioObras='si' GROUP BY idOrganismo;");
						$obtenerInformacion__11=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__contratacionDirecta='si' GROUP BY idOrganismo;");
						$obtenerInformacion__12=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__contratacionListaCorta='si' GROUP BY idOrganismo;");
						$obtenerInformacion__13=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idCatalogo) AS contadorCatalogo FROM poa_catalogo_contraloria WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='".$valor['idOrganismo']."' AND catalogo__contratacionConcursoPu='si' GROUP BY idOrganismo;");


						$obtenerInformacion__sumas__1=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__elect='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__2=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__subasta='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__3=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__infima='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__4=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__menorCuantia='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__5=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__cotizacion='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__6=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__licitacion='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__7=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__menorCuantiaObras='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__8=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__cotizacionObras='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__9=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__licitacionObras='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__10=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__precioObras='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__11=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__contratacionDirecta='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__12=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__contratacionListaCorta='si' GROUP BY a.idOrganismo;");
						$obtenerInformacion__sumas__13=$objeto->getObtenerInformacionGeneral("SELECT ROUND(SUM(b.totalTotales),2) AS sumadorTotales FROM poa_catalogo_contraloria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='".$valor['idOrganismo']."' AND a.catalogo__contratacionConcursoPu='si' GROUP BY a.idOrganismo;");

					?>

					<tr>

						<td  align="center" rowspan="13" style="vertical-align: middle; font-weight: bold;"><?= $valor['nombreOrganismo']?></td>

						<td  align="center">Catálogo Electrónico</td>

					 	<?php foreach ($obtenerInformacion__1 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__1 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>
					


					<tr>

						<td  align="center">Subasta Inversa Electrónica</td>

					 	<?php foreach ($obtenerInformacion__2 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__2 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>


					<tr>

						<td  align="center">Ínfima Cuantía</td>

					 	<?php foreach ($obtenerInformacion__3 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__3 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Menor Cuantía</td>

					 	<?php foreach ($obtenerInformacion__4 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__4 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Cotización</td>

					 	<?php foreach ($obtenerInformacion__5 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__5 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>


					<tr>

						<td  align="center">Licitación</td>

					 	<?php foreach ($obtenerInformacion__6 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__6 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Menor Cuantía</td>

					 	<?php foreach ($obtenerInformacion__7 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__7 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Cotización</td>

					 	<?php foreach ($obtenerInformacion__8 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__8 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Licitación</td>

					 	<?php foreach ($obtenerInformacion__9 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__9 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Precio Fijo</td>

					 	<?php foreach ($obtenerInformacion__10 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__10 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Contratación Directa</td>

					 	<?php foreach ($obtenerInformacion__11 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__11 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

					<tr>

						<td  align="center">Lista Corta</td>

					 	<?php foreach ($obtenerInformacion__12 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__12 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>


					<tr>

						<td  align="center">Concurso Público</td>

					 	<?php foreach ($obtenerInformacion__13 as $valor2): ?>

						<td  align="center" style="width:10%!important"><?= $valor2['contadorCatalogo']?></td>
				
						<?php endforeach ?>

						<?php foreach ($obtenerInformacion__sumas__13 as $valor3): ?>

						<td  align="center"><?= number_format($valor3['sumadorTotales'], 2, ',', '.')?></td>

						<?php endforeach ?>

					</tr>

				<?php endforeach ?>

			</table>

		</div>

	</section>

</div>

<script type="text/javascript">

	
var execelGenerados=function(parametro1,parametro2,parametro3){

$(parametro1).click(function (e){

  var table = document.getElementById(parametro2); // id of table
  var tableHTML = table.outerHTML;
  var fileName = parametro3;

  var msie = window.navigator.userAgent.indexOf("MSIE ");

  // If Internet Explorer
  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {

    dummyFrame.document.open('txt/html', 'replace');
    dummyFrame.document.write(tableHTML);
    dummyFrame.document.close();
    dummyFrame.focus();
    return dummyFrame.document.execCommand('SaveAs', true, fileName);

  }else {

    var a = document.createElement('a');
    tableHTML = tableHTML.replace(/  /g, '').replace(/ /g, '%20'); // replaces spaces
    a.href = 'data:application/vnd.ms-excel,' + tableHTML;
    a.setAttribute('download', fileName);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);

  }  

});

}

execelGenerados($(".excelProyectosMatricez"),"valores__adicionales","Contratación");


</script>