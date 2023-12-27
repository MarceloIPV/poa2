
<?php 
$componentes= new componentes();
require_once "config/files.php";
?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $anioActual = date('Y');?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $informacionSeleccionada=$objetoInformacion->getObtenerInformacionGeneral("SELECT idInterventor FROM poa_interventores WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos'");?>

<?php $informacionSeleccionadaDos=$objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE YEAR(b.fecha)='$anioActual' AND  a.idOrganismo='".$informacionObjeto[0][idOrganismo]."';");?>

<?php $informacionSeleccionadaTres=$objetoInformacion->getObtenerInformacionGeneral("SELECT idFinancieroD,polizaOriginal,caucionOrginal,copiaCertificadoBancario,copiaRegistroD,copia_adminFinanciero,copia_adminGeneral,copia__registroIn,copia_acuerdoRegistro,copia_ruc,fecha FROM poa_financiero_documentos WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND  perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $informacionCuatro=$objetoInformacion->getObtenerInformacionGeneral("SELECT b.polizaOriginal,b.caucionOrginal,b.copiaCertificadoBancario,b.copiaRegistroD,b.copia_adminFinanciero,b.copia_adminGeneral,b.copia__registroIn,b.copia_acuerdoRegistro,b.copia_ruc,b.observa__polizaOriginal,b.observa__caucionOrginal,b.observa__copiaCertificadoBancario,b.observa__copiaRegistroD,b.observa__copia_adminFinanciero,b.observa__copia_adminGeneral,b.observa__copia__registroIn,b.observa__copia_acuerdoRegistro,b.observa__copia_ruc FROM poa_financiero_documentos AS a INNER JOIN poa_documentos_calificados AS b ON b.idOrganismo=a.idOrganismo WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND  a.perioIngreso='$aniosPeriodos__ingesos' AND (a.rechazo='r' OR a.rechazo='A' OR a.rechazo='p') ORDER BY b.idDocumentos DESC LIMIT 1;");?>

<div class="content-wrapper">

	<?=$componentes->getComponentes(1,"REGISTRO DE TRANSFERENCIAS");?>

	<div class="row d d-flex align-items-center justify-content-center mt-4">

		<?php if (!empty($informacionSeleccionadaTres[0][idFinancieroD])): ?>

		<div class="col col-12 text-center textos__titulos mb-4" style="font-weight:bold; color:black!important;">

			Los documentos fueron enviados el <?=$informacionSeleccionadaTres[0][fecha]?>

		</div>

		<?php endif ?>
		
		<div class="col col-6 justify textos__titulos">

			1)* Póliza original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado; 

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][polizaOriginal])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="polizaVigencia" class="file-picker clase__polizaVigencia">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="polizaVigencia" name="polizaVigencia" class="obligatorios__archivos" accept="application/pdf"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/polizaOriginal/<?=$informacionSeleccionadaTres[0][polizaOriginal]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][polizaOriginal])): ?>

			<?php if ($informacionCuatro[0][polizaOriginal]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


			<div class="col col-2 d d-flex">

				<label for="polizaVigencia" class="file-picker clase__polizaVigencia">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

				<input type="file" id="polizaVigencia" name="polizaVigencia" class="obligatorios__archivos" accept="application/pdf"/>

			</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">

					<?php if ($informacionCuatro[0][polizaOriginal]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][polizaOriginal]) && $informacionCuatro[0][polizaOriginal]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__polizaOriginal]?>

			</div>

					
			<div class="col col-4" id="visualizaPolizaOriginal"></div>

			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazo__poliza" name="guardarRechazo__poliza" attr="polizaVigencia">Guardar</button></div>

		<?php else: ?>

			<div class="col col-4" id="visualizaPolizaOriginal"></div>

		<?php endif ?>

		<hr>
			

	</div>

	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			2)* Caución original con vigencia de por lo menos 18 meses, garantizando mínimo el 10% del recurso aprobado;

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][caucionOrginal])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="caucionOriginal" class="file-picker clase__caucionOriginal">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="caucionOriginal" name="caucionOriginal" class="obligatorios__archivos" accept="application/pdf"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/caucionOrginal/<?=$informacionSeleccionadaTres[0][caucionOrginal]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][caucionOrginal])): ?>

			<?php if ($informacionCuatro[0][caucionOrginal]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">

					<label for="caucionOriginal" class="file-picker clase__caucionOriginal">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="caucionOriginal" name="caucionOriginal" class="obligatorios__archivos" accept="application/pdf"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">

					<?php if ($informacionCuatro[0][caucionOrginal]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][caucionOrginal]) && $informacionCuatro[0][caucionOrginal]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__caucionOrginal]?>

			</div>

					
			<div class="col col-4" id="visualizaCausion"></div>

			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazoCaucion" name="guardarRechazoCaucion" attr="caucionOriginal">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualizaCausion"></div>
			
		<?php endif ?>

		<hr>
				
	</div>


	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			3)* Copia del certificado bancario;

		</div>


		<?php if (empty($informacionSeleccionadaTres[0][copiaCertificadoBancario])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="copiaBancario" class="file-picker clase__copiaBancario">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaBancario" name="copiaBancario" class="obligatorios__archivos" accept="application/pdf"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copiaCertificadoBancario/<?=$informacionSeleccionadaTres[0][copiaCertificadoBancario]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copiaCertificadoBancario])): ?>

			<?php if ($informacionCuatro[0][copiaCertificadoBancario]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">

					<label for="copiaBancario" class="file-picker clase__copiaBancario">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaBancario" name="copiaBancario" class="obligatorios__archivos" accept="application/pdf"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
					
					
					<?php if ($informacionCuatro[0][copiaCertificadoBancario]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>
				

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copiaCertificadoBancario]) && $informacionCuatro[0][copiaCertificadoBancario]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copiaCertificadoBancario]?>

			</div>

					
			<div class="col col-4" id="visualizacopiaBancario"></div>

			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazoCertificado__bancario" name="guardarRechazoCertificado__bancario" attr="certificadoBancario">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualizacopiaBancario"></div>
			
		<?php endif ?>

		<hr>
		

	</div>


	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			4)* Copia de registro de Directorio actualizado y vigente;

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][copiaRegistroD])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="copiaRegistro__directorio" class="file-picker clase__copiaRegistro__directorio">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaRegistro__directorio" name="copiaRegistro__directorio" class="obligatorios__archivos" accept="application/pdf"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copiaRegistroD/<?=$informacionSeleccionadaTres[0][copiaRegistroD]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>


		<?php if (!empty($informacionCuatro[0][copiaRegistroD])): ?>

			<?php if ($informacionCuatro[0][copiaRegistroD]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">

					<label for="copiaRegistro__directorio" class="file-picker clase__copiaRegistro__directorio">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaRegistro__directorio" name="copiaRegistro__directorio" class="obligatorios__archivos" accept="application/pdf"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
					
					<?php if ($informacionCuatro[0][copiaRegistroD]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>
				

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copiaRegistroD]) && $informacionCuatro[0][copiaRegistroD]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copiaRegistroD]?>

			</div>

					
			<div class="col col-4" id="visualiza__copiaRegistro__directorio"></div>


			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazoCopia__registroD" name="guardarRechazoCopia__registroD" attr="copiaRegistroD">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualiza__copiaRegistro__directorio"></div>

			
		<?php endif ?>

		<hr>		

	</div>

	<?php if (floatval($informacionSeleccionadaDos[0][nombreInversion])>=101699.20): ?>
		
	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			5)* Copia del registro de Administrador Financiero actualizado y vigente, solo si aplica;

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][copia_adminFinanciero])): ?>
			
		<div class="col col-2  d d-flex">

			<label for="copiaFinanciero" class="file-picker clase__copiaFinanciero">Cargar pdf opcional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaFinanciero" name="copiaFinanciero" accept="application/pdf" class="obligatorios__archivos"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copia_adminFinanciero/<?=$informacionSeleccionadaTres[0][copia_adminFinanciero]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>


		<?php if (!empty($informacionCuatro[0][copia_adminFinanciero])): ?>

			<?php if ($informacionCuatro[0][copia_adminFinanciero]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">

					<label for="copiaFinanciero" class="file-picker clase__copiaFinanciero">Cargar pdf opcional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaFinanciero" name="copiaFinanciero" accept="application/pdf" class="obligatorios__archivos"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
					
										
					<?php if ($informacionCuatro[0][copia_adminFinanciero]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>
				

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copia_adminFinanciero]) && $informacionCuatro[0][copia_adminFinanciero]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copia_adminFinanciero]?>

			</div>

					
			<div class="col col-4" id="visualizaFinanciero"></div>


			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazoVisualiza__financiero" name="guardarRechazoVisualiza__financiero" attr="financieroCopia">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualizaFinanciero"></div>

			
		<?php endif ?>

		<hr>

	</div>

	<?php else: ?>

		<div style="display: none;">

			<input type="hidden" id="copiaFinanciero" name="copiaFinanciero" value="texto"/>
		
		</div>

	<?php endif ?>

	<?php if (floatval($informacionSeleccionadaDos[0][nombreInversion])>=101699.20): ?>
		

	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			6)* Copia del registro de Administrador General actualizado y vigente; solo si aplica;

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][copia_adminGeneral])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="copiaGeneral" class="file-picker clase__copiaGeneral">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaGeneral" name="copiaGeneral" accept="application/pdf" class="obligatorios__archivos"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copia_adminGeneral/<?=$informacionSeleccionadaTres[0][copia_adminGeneral]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copia_adminGeneral])): ?>

			<?php if ($informacionCuatro[0][copia_adminGeneral]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">
					
					<label for="copiaGeneral" class="file-picker clase__copiaGeneral">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaGeneral" name="copiaGeneral" accept="application/pdf" class="obligatorios__archivos"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
							
					<?php if ($informacionCuatro[0][copia_adminGeneral]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copia_adminGeneral]) && $informacionCuatro[0][copia_adminGeneral]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copia_adminGeneral]?>

			</div>

					
			<div class="col col-4" id="visualizaCopiaGeneral"></div>


			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazo__copiaAdmin__general" name="guardarRechazo__copiaAdmin__general" attr="copiaAdminGeneral">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualizaCopiaGeneral"></div>

			
		<?php endif ?>

		<hr>
		

	</div>

	<?php else: ?>
		
		<div style="display: none;">

			<input type="hidden" id="copiaGeneral" name="copiaGeneral" value="texto"/>
		
		</div>

	<?php endif ?>

	<?php if (!empty($informacionSeleccionada[0][idInterventor])): ?>
		
	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			7)* Copia del registro de Intervención actualizado y vigente, solo si aplica;

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][copia__registroIn])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="copiaIntervencion" class="file-picker clase__copiaIntervencion">Cargar pdf opcional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaIntervencion" name="copiaIntervencion" class="obligatorios__archivos"  accept="application/pdf"/>
				
		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copia__registroIn/<?=$informacionSeleccionadaTres[0][copia__registroIn]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>		

		<?php if (!empty($informacionCuatro[0][copia__registroIn])): ?>

			<?php if ($informacionCuatro[0][copia__registroIn]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">
					
					<label for="copiaIntervencion" class="file-picker clase__copiaIntervencion">Cargar pdf opcional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaIntervencion" name="copiaIntervencion" class="obligatorios__archivos"  accept="application/pdf"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
					
					<?php if ($informacionCuatro[0][copia__registroIn]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copia__registroIn]) && $informacionCuatro[0][copia__registroIn]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copia__registroIn]?>

			</div>

					
			<div class="col col-4" id="visualiza__copiaIntervencion"></div>


			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazo__copia__intervencion" name="guardarRechazo__copia__intervencion" attr="copiaIntervencion">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualiza__copiaIntervencion"></div>

			
		<?php endif ?>

		<hr>
		

	</div>

	<?php else: ?>

		<div style="display:none!important;">

			<input type="hidden" id="copiaIntervencion" name="copiaIntervencion" class="obligatorios__archivos" value="texto" />
		
		</div>

	<?php endif ?>


	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			8)* Copia del Acuerdo de registro de estatutos vigente;

		</div>

		<?php if (empty($informacionSeleccionadaTres[0][copia_acuerdoRegistro])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="copiaEstatutos" class="file-picker clase__copiaEstatutos">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaEstatutos" name="copiaEstatutos" class="obligatorios__archivos" accept="application/pdf"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copia_acuerdoRegistro/<?=$informacionSeleccionadaTres[0][copia_acuerdoRegistro]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>		

		<?php if (!empty($informacionCuatro[0][copia_acuerdoRegistro])): ?>

			<?php if ($informacionCuatro[0][copia_acuerdoRegistro]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">


					<label for="copiaEstatutos" class="file-picker clase__copiaEstatutos">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaEstatutos" name="copiaEstatutos" class="obligatorios__archivos" accept="application/pdf"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
					
					<?php if ($informacionCuatro[0][copia_acuerdoRegistro]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copia_acuerdoRegistro]) && $informacionCuatro[0][copia_acuerdoRegistro]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copia_acuerdoRegistro]?>

			</div>

					
			<div class="col col-4" id="visualiza__copiaEstatutos"></div>


			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazo__copia__acuerdo__registro" name="guardarRechazo__copia__acuerdo__registro" attr="copiaRegistro">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualiza__copiaEstatutos"></div>

			
		<?php endif ?>

		<hr>		

	</div>



	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos">

			9)* Copia del RUC actualizado, vigente y activo;

		</div>


		<?php if (empty($informacionSeleccionadaTres[0][copia_ruc])): ?>
			
		<div class="col col-2 d d-flex">

			<label for="copiaRucA" class="file-picker clase__copiaRucA">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

			<input type="file" id="copiaRucA" name="copiaRucA"  class="obligatorios__archivos" accept="application/pdf"/>

		</div>

		<?php else: ?>

		<div class="col col-2 d d-flex">

			<a href="<?=VARIABLE__FRONTENT?>financiero/copia_ruc/<?=$informacionSeleccionadaTres[0][copia_ruc]?>" target="_blank" class="text-center">Documento<br>(click para visualizar)</a>

		</div>
			
		<?php endif ?>		

		<?php if (!empty($informacionCuatro[0][copia_ruc])): ?>

			<?php if ($informacionCuatro[0][copia_ruc]=='r'): ?>

				<div class="col col-2 text-center textos__titulos">
					
					Rechazado

				</div>


				<div class="col col-2 d d-flex">

					<label for="copiaRucA" class="file-picker clase__copiaRucA">Cargar pdf obligatorio&nbsp;&nbsp; <i class="fas fa-search pointer__botones col col-1 mt-4 posicion__lupas"></i></label>

					<input type="file" id="copiaRucA" name="copiaRucA"  class="obligatorios__archivos" accept="application/pdf"/>

				</div>

			<?php else: ?>

				<div class="col col-4 text-center textos__titulos">
					
					<?php if ($informacionCuatro[0][copia_ruc]=='p'): ?>

						Pendiente
						
					<?php else: ?>

						Aprobado
						
					<?php endif ?>

				</div>
				
			<?php endif ?>
				
		<?php endif ?>

		<?php if (!empty($informacionCuatro[0][copia_ruc]) && $informacionCuatro[0][copia_ruc]=="r"): ?>

			<div class="col col-6 justify">
						
				<span style="font-weight: bold;">Observación:</span> <?=$informacionCuatro[0][observa__copia_ruc]?>

			</div>

					
			<div class="col col-4" id="visualiza__copiaRucA"></div>


			<div class="col col-2 text-center d d-flex justify-content-center"><button class="btn-primary" id="guardarRechazo__copia__acuerdo__registro__ruc" name="guardarRechazo__copia__acuerdo__registro__ruc" attr="copiaRegistro__acuerdos">Guardar</button></div>
			
		<?php else: ?>

			<div class="col col-4" id="visualiza__copiaRucA"></div>

			
		<?php endif ?>

		<hr>
		

	</div>


	<?php if (empty($informacionSeleccionadaTres[0][idFinancieroD])): ?>
			
	<div class="row d d-flex align-items-center justify-content-center mt-4">
		
		<div class="col col-6 justify textos__titulos text-center">

			<button class="btn btn-primary" id="enviarTramitesFinancieros">ENVIAR</button>
			<div class="reload__Enviosrealizados"></div>

		</div>

	</div>

	<?php endif ?>	

</div>
