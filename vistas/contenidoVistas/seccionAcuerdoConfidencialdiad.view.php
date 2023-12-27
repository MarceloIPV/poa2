
	  <div class="col col-12 text-center mt-2 titulo__enfasis">
	    
	 	DOCUMENTACIÓN RELACIONADA AL ORGANISMO	

	  </div>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Acuerdo de responsabilidad

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<a href="documentos/acuerdosResponsabilidad/<?= $informacionObjeto[0][nombreDocumentoDeAprobacion]?>" target="_blank" id="acuerdoConfidencialidadEnlace" name="acuerdoConfidencialidadEnlace" nombreArchivo="<?=$informacionObjeto[0][cedula]."__".$informacionObjeto[0][ruc]?>" rucBuscador="<?= $informacionObjeto[0][ruc]?>">Acuerdo de responsabilidad</a>

	  </div>

	  <?php if ($informacionObjeto[0][activado]=="I"): ?>
	  	
	  <div class="col col-11 mt-2">

	  	¿Desea volver a generar el acuerdo de responsabilidad con la información editada? 

	  </div>

	  <div class="col col-1 mt-2 text-right">

	  	<input type="checkbox" id="generarFilasAcuerdo" name="generarFilasAcuerdo">

	  </div>

	  <div class="acuerdo__responsabilidad__oculto row d d-flex justify-content-center">

	     <div class="col col-4 text-center acuerdo__responsabilidad__oculto">

	     	<button id="editarArchivoCon" name="editarArchivoCon" class="btn btn-info">Generar acuerdo</button>

	     </div>

	     <div class="col col-12 text-center reloadConfi"></div>

      </div>

      <div class="row acuerdo__responsabilidad__oculto__2">

	      <div class="col col-6 col-md-5 d d-flex mt-4">

	        	Subir y enviar acuerdo de confidencialidad correctamente firmado

	      </div>

	      <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

	        <input type="file" class="inputfile inputfile-5" id="acuerdoDeConfidencialidad" name="acuerdoDeConfidencialidad" accept="application/pdf"/>

	        <label for="acuerdoDeConfidencialidad" class="col col-6 col-md-4">

	        	<figure>

	            	<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

	                 	<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

	            	</svg>

	        	</figure>

	        </label>

	        <span class="iborrainputfile nombre__direccionAcuerdoConfidencialidad col col-6 col-md-8">Ningún documento seleccionado</span>

	     </div>

	     <div class="col col-12 documento__embebidoConfidencialidad"></div>

        <div class="col col-12 d d-flex justify-content-center">

          <button type="button" class="btn btn-primary" id="guardarAcuerdoConfidencialidad" name="guardarAcuerdoConfidencialidad"><i class="fas fa-save"></i>&nbsp;&nbsp;ENVIAR</button>

        </div>

      </div>

	  <?php endif ?>