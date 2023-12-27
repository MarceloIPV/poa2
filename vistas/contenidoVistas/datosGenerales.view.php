<?php 
$objetoInformacion= new usuarioAcciones();
?>



<?php
	
/*===================================================
=            Llamando Funciòn php mailer            =
===================================================*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
			
/*=====  End of Llamando Funciòn php mailer  ======*/

?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo__2();?>
<?php $componentes= new componentes();?>
<?php $anioActual = date('Y');?>


<?php $actividadesSeleccionadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE YEAR(a.fecha_quipux)='$anioActual' AND now()>=a.fecha_dias AND a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo ORDER BY a.idFinal;");?>

<div class="content-wrapper">

<section class="content row d d-flex justify-content-center">

<input type="hidden" id="idPronvincia" name="idPronvincia" value="<?= $informacionObjeto[0][idProvincia]?>" />
<input type="hidden" id="idCanton" name="idCanton" value="<?= $informacionObjeto[0][idCanton]?>" />
<input type="hidden" id="idParroquia" name="idParroquia" value="<?= $informacionObjeto[0][idParroquia]?>" />
<input type="hidden" id="tipoOrganismo" name="tipoOrganismo" value="<?= $informacionObjeto[0][idTipoOrganismo]?>" />

 <form id="informacionBasicaOrganismo" class="col-5 row">

 	<input type="hidden" id="idOrganismo" name="idOrganismo" value="<?= $informacionObjeto[0][idOrganismo]?>" />
 	<input type="hidden" id="idUsuario" name="idUsuario" value="<?= $informacionObjeto[0][idUsuario]?>" />

	<input type="hidden" id="nombreProvincia" name="nombreProvincia" value="<?= $informacionObjeto[0][nombreProvincia]?>" />
	<input type="hidden" id="nombreCanton" name="nombreCanton" value="<?= $informacionObjeto[0][nombreCanton]?>" />
	<input type="hidden" id="nombreParroquia" name="nombreParroquia" value="<?= $informacionObjeto[0][nombreParroquia]?>" />

	<div class="col col-12 text-center mt-4 titulo__enfasis">
	    
	 	INFORMACIÓN DEL ORGANISMO DEPORTIVO <?=$_SESSION["selectorAniosA"]?>

	</div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Ruc del organismo deportivo 

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<?=$informacionObjeto[0][ruc]?>

	  	<input type="hidden" id="organismoEnviado" name="organismoEnviado" value="<?=$informacionObjeto[0][ruc]?>" />


	  </div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Tipo Organismo deportivo

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	 <select type="text" id="tiposOrganimosDeportivos__Group" name="tiposOrganimosDeportivos__Group" class="input__registros tipo_organismoGroup campos__obligatorios"></select>

	  </div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Organismo deportivo 

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<?= $informacionObjeto[0][nombreOrganismo]?> 

	  	<input type="hidden" id="organismoRucEnviado" name="organismoRucEnviado" value="<?=$informacionObjeto[0][nombreOrganismo]?>" />

	  </div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Email

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="emailOrganismo" name="emailOrganismo"><?= $informacionObjeto[0][correo]?></textarea>

	  </div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Teléfono

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="celularPresidente" name="celularPresidente"><?= $informacionObjeto[0][celularPresidente]?></textarea>

	  </div>	

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Provincia

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<select id="provinciaDatos" name="provinciaDatos" class="ancho__totalText campos__obligatorios"></select>

	  </div>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Cantón

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<select id="cantonDatos" name="cantonDatos" class="ancho__totalText campos__obligatorios"></select>

	  </div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Parroquia

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<select id="parroquiaDatos" name="parroquiaDatos" class="ancho__totalText campos__obligatorios"></select>

	  </div>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Barrio

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="barrioOrganismo" name="barrioOrganismo"><?= $informacionObjeto[0][barrioPoa]?></textarea>

	  </div>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Dirección

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="direccionOrganismo" name="direccionOrganismo"><?= $informacionObjeto[0][direccion]?></textarea> 

	  </div>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Referencia dirección

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="referenciaDireccionOrganismo" name="referenciaDireccionOrganismo"><?= $informacionObjeto[0][referenciaDireccion]?></textarea>

	  </div>

	  <?php if (!empty($informacionObjeto[0][idInversion])): ?>
	  	
	  <div class="col col-5 mt-4 titulo__enfasis">
	    
	 	Acuerdo de asignación

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<a href="documentos/asignacionRecursos/<?= $informacionObjeto[0][idInversion]?>.pdf" target="_blank">Acuerdo de asignación</a>

	  </div>

	  <?php endif ?>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Acuerdo ministerial

	  </div>

	  <div class="col col-4 mt-4">
	  	
	  	<a href="documentos/acuerdosMinisteriales/<?= $informacionObjeto[0][documento]?>" target="_blank">Acuerdo ministerial</a>

	  </div>

	  <div class="col col-2 mt-4 d d-flex flex-column align-items-center">

	  	<input type="checkbox" id="generarFilasAcuerdoMinis" name="generarFilasAcuerdoMinis">

	  	<div class="enfacis__pequenio text-justify">(Presionar en caso de querer cambiar el documento)</div>

	  </div>


      <div class="row acuerdo__ministerial__oculto">

	      <div class="col col-6 col-md-5 d d-flex mt-4">

	        	Subir y enviar acuerdo ministerial

	      </div>

	      <div class="container-input d d-flex align-items-center col col-6 col-md-7 row">

	        <input type="file" class="inputfile inputfile-5" id="acuerdoMinisterialNuevo" name="acuerdoMinisterialNuevo" accept="application/pdf" nombreDocumento="<?=$informacionObjeto[0][numeroDeAcuerdo]."".$informacionObjeto[0][ruc]?>"/>

	        <label for="acuerdoMinisterialNuevo" class="col col-6 col-md-4">

	        	<figure>

	            	<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">

	                 	<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>

	            	</svg>

	        	</figure>

	        </label>

	        <span class="iborrainputfile nombre__direccionAcuerdoMinisterial col col-6 col-md-8">Ningún documento seleccionado</span>

	     </div>

      </div>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Número de acuerdo ministerial

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="numeroAcuerdoMinisterial" name="numeroAcuerdoMinisterial"><?= $informacionObjeto[0][numeroDeAcuerdo]?></textarea>

	  </div>



	  <div class="col col-5 titulo__enfasis mt-4">

	  	Fecha de acuerdo ministerial

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<input type="date" class="ancho__totalText campos__obligatorios" id="fechaAacuerdoMinisterial" name="fechaAacuerdoMinisterial" value="<?= $informacionObjeto[0][fechaAcuerdo]?>" />

	  </div>

	  <textarea class="ancho__totalText campos__obligatorios ocultos__elementos" id="cedulaPresidenteOrganismoDeportivo" name="cedulaPresidenteOrganismoDeportivo" ><?= $informacionObjeto[0][cedula]?></textarea>


	 <textarea class="ancho__totalText campos__obligatorios sin__bordes__cs ocultos__elementos" id="presidenteOrganismoDeportivo" name="presidenteOrganismoDeportivo" ><?= $informacionObjeto[0][nombrePresidente]?></textarea>


	 <textarea class="ancho__totalText campos__obligatorios ocultos__elementos" id="presidenteOrganismoDeportivoApe" name="presidenteOrganismoDeportivoApe"><?= $informacionObjeto[0][apellidoPresidente]?></textarea>


	  <div class="col col-5 titulo__enfasis mt-4 ocultos__elementos">

	  	Género presidente

	  </div>

	  <div class="col col-7 mt-4 ocultos__elementos">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios ocultos__elementos" id="generoPresidente" name="generoPresidente"><?= $informacionObjeto[0][sexoPresidente]?></textarea>

	  </div>	


	  <div class="col col-5 titulo__enfasis mt-4 ocultos__elementos">

	  	Fecha nacimiento presidente

	  </div>

	  <div class="col col-7 mt-4 ocultos__elementos">
	  	
	  	<input class="ancho__totalText campos__obligatorios ocultos__elementos" id="fechaNacimientoPresidente" name="fechaNacimientoPresidente" value="<?= $informacionObjeto[0][fechaPresidente]?>" readonly=""/>

	  </div>	


	  <div class="col col-5 titulo__enfasis mt-4 ocultos__elementos">

	  	Correo presidente

	  </div>

	  <div class="col col-7 mt-4 ocultos__elementos">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios ocultos__elementos" id="correoPresidente" name="correoPresidente"><?= $informacionObjeto[0][emailPresidente]?></textarea>

	  </div>	



	  <div class="col col-12 text-center mt-4 titulo__enfasis">
	    
	 	INFORMACIÓN REPRESENTANTE DEL ORGANISMO DEPORTIVO	

	  </div>


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Cédula representante

	  </div>

	  <div class="col col-6 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="cedulaRepresentanteOrganismoDeportivo" name="cedulaRepresentanteOrganismoDeportivo"><?= $informacionObjeto[0][cedulaResponsable]?></textarea>

	  </div>	

	  <i class="fas fa-search pointer__botones col col-1 mt-4" id="buscarCedulaRepresentanteEdicion"></i>

	  <div class="col col-5 titulo__enfasis mt-4">

	  	Nombre representante

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios sin__bordes__cs" readonly="" id="representanteOrganismoDeportivo" name="representanteOrganismoDeportivo"><?= $informacionObjeto[0][nombreResponsablePoa]?></textarea>

	  </div>	


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Correo representante

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="correoRepresentante" name="correoRepresentante"><?= $informacionObjeto[0][correoResponsablePoa]?></textarea>

	  </div>	


	  <div class="col col-5 titulo__enfasis mt-4">

	  	Célular representante

	  </div>

	  <div class="col col-7 mt-4">
	  	
	  	<textarea class="ancho__totalText campos__obligatorios" id="celularRepresentante" name="celularRepresentante"><?= $informacionObjeto[0][celularPresidente]?></textarea>

	  </div>	

	  <div class="col col-12 text-center mt-4">

	  	<button class="btn btn-primary" id="guardarInformacion" name="guardarInformacion">Enviar</button>

	  </div>

	  <div class="col col-12 text-center reload__registroOrganismos"></div>

  </form>

</section>

</div>

<script>
	window.onload = (event)=>{
		$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/selector.js",function(){
                verificarSuspensionesOD();
                
              
            });
	};
</script>