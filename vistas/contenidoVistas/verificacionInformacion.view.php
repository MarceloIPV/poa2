
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"APROBACIÓN DE USUARIOS");?>

		<div class="row">

		<table id="aprobacionUsuarios" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Acciones</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>



<!--=====================================
=            Sección modales            =
======================================-->

<?=$componentes->getModal("modalAprobar","formularioAprobacion","<div class='col col-12 justify-content-center flex-wrap' id='tituloModalGenerico'></div>",["generarNegacion","generarAprobacion"],["nomprePresidente","emailPresidente","celularPresidente","nombreProvincia","nombreCanton","nombreParroquia","acuerdoMinisterial","registroDirectorio","registroNombramiento","registroVigente","resolucionIntervenciones","nombreResponsablePoa","correoResponsablePoa","telefonoOficina"],['Presidente:','Correo','Célular','Provincia:','Cantón:','Parroquia:','Acuerdo ministerial:','Registro de directorio:','Registro nombramiento administrador financiero:','Registro vigente de nombramiento:','Resoluciones de intervenciones:','Nombre:','Correo:','Email:'],["Datos presidente del organismo deportivo","Datos del organismo deportivo","Documentos","Datos del representante legal"],[3,3,5,3],["Negar","Aprobar"],["btn-danger","btn-primary"],["primario__1","primario__2","primario__3","primario__4"],["atado__1","atado__2","atado__3","atado__4"]);?>

<!--====  End of Sección modales  ====-->
