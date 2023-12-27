n
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Analista");?>

		<div class="row">
<div class="col-md-2">
	<a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="poasGestionados" href="/msppoa/php/bandejas.xlsx"><span>Excel</span></a>
</div>
		<table class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Ruc</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo organismo</center></th>
					<th><center>Representante</center></th>
					<th><center>Fecha<br>envío</center></th>
					<th><center>Estado</center></th>
					<th><center>Acción</center></th>

				</tr>

			</thead>
			<tbody>
				<tr>

					<td><center>0291501850001</center></td>
					<td><center>FEDERACION DEPORTIVA PROVINCIAL DE BOLIVAR</center></td>
					<td><center>ccobena@deporte.gob.ec</center></td>
					<td><center>0967952971- 032984059</center></td>
					<td><center>i. Comité Olímpico Ecuatoriano</center></td>
					<td><center>ARMAS NAJERA JOSEPH ALEXANDER</center></td>
					<td><center>03/10/2022</center></td>
					<td><center>En proceso</center></td>
					<td><center><button class="btn btn-success"  data-toggle="modal" data-target="#nuevoItem" onclick="historial_sueldos_salarios6()">Ver</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Enviar
</button></center></td>

				</tr>
				
			</tbody>

		</table>

		</div>

	</section>

</div>


<div id="origen"></div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reasignar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <select name="select" class="form-control">

  <option value="value2" selected>SELECCIONE</option>
  <option value="value1">SUBSECRETARIA DE ALTO RENDIMIENTO</option>
</select>
 <a href="php/prueba5-signed.pdf" target="_blank">Descargar informe</a> 
 <form action="php/prueba5-signed-signed.pdf" method="post" enctype="multipart/form-data" target="_blank">
  <p>
    Subir archivo:
    <input type="file" name="archivossubidos[]" multiple>
    <input type="submit" value="Enviar datos">
  </p>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>




