<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentes__modificaciones= new componentes__modificaciones();?>

<?php $anioActual = date('Y');?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>


<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>


<?php $actividadesSeleccionadas__sueldos__salarios=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_sueldossalarios2022 AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."';");?>

<?php $actividadesSeleccionadas__honorarios=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_honorarios2022 AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."';");?>

<?php $actividadesSeleccionadas__mantenimientoAdmin=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."' GROUP BY a.idProgramacionFinanciera ORDER BY a.idMantenimiento DESC;");?>

<?php $actividadesSeleccionadas__actividadesAdmi=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idActividadAd FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."';");?>

<?php $actividadesSeleccionadas__actividadesDeportivas__capacitacion=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."' AND b.idActividad='3';");?>

<?php $actividadesSeleccionadas__actividadesDeportivas__competencia=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."' AND b.idActividad='5';");?>

<?php $actividadesSeleccionadas__actividadesDeportivas__recreativa=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."' AND b.idActividad='6';");?>

<?php $actividadesSeleccionadas__actividadesDeportivas__implementaciones=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.perioIngreso)='".$aniosPeriodos__ingesos."' AND b.idActividad='7';");?>

<?php $idOrganismo__modificaciones__enviadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT idModificacion FROM poa_modificacion_2022 WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<?=$componentes->getComponentes(1,"ETAPA DE MODIFICACIÓN");?>


	<section class="content row d d-flex justify-content-left align-items-center mt-4"> 

		<div class="row separador__objetos mt-4">

			<?php if (!empty($idOrganismo__modificaciones__enviadas[0][idModificacion])): ?>
				
				<?=$componentes->getComponentes(1,"EL organismo deportivo envió la información de modificación");?>

				<input type="hidden" id="variable__2022" value="1" />

			<?php else: ?>
				

			<div class="col col-12 d d-flex justify-content-center">

				<span style="font-weight: bold; font-size: 14px;">Enviar</span>&nbsp;&nbsp;<a id="enviarModificas__2022" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>

				<input type="hidden" id="variable__2022" value="0" />

			</div>

			<?php endif ?>


		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de poa (Mátriz general del poa)

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/POA.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__poa__general" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__poa__general"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__general__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__general" data-bs-toggle="modal" data-bs-target="#modalVerM2022"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__poa__general__con">
				
				<table class="tabla__poa__general__exeles"><thead><tr><th colspan="7"><a class="btn btn-warning" id="vuelvesSeleccionas__poa__general">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="9"><a class="btn btn-primary" id="guardar__poa__general">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Actividad</th><th>Ítem</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__poa__general"></tbody></table>

			</div>

		</div> 



		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de Indicadores

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ INDICADORES OK.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__indicadores" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__indicadores"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__indicadores__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__item__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__indicadores" data-bs-toggle="modal" data-bs-target="#modalVerM2022__item"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>


			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador_indicadores__con">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="3"><a class="btn btn-warning" id="vuelvesSeleccionas__indicadores">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="3"><a class="btn btn-primary" id="guardar__indicadores">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Actividad</th><th>Primer<br>trimestre</th><th>Segundo<br>trimestre</th><th>Tercer<br>trimestre</th><th>Cuarto<br>trimestre</th><th>Meta<br>Indicador</th></tr></thead><tbody class="visualizador__indicadores"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de suministros

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ SUMINISTROS ACT 001.xls"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>			

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__suministros" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__suministros"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__suministros__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__suministros__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__suministros" data-bs-toggle="modal" data-bs-target="#modalVerM2022__suministros"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>


			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador_suministros__con">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="3"><a class="btn btn-warning" id="vuelvesSeleccionas__suministros">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="3"><a class="btn btn-primary" id="guardar__suministros">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Tipo</th><th>Escenario deportivo</th><th>Luz</th><th>Agua</th></tr></thead><tbody class="visualizador__suministros"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de Sueldos y salarios

			</div>


			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ SUELDOS GENERAL OK.xls"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__sueldos__salarios" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__sueldos__salarios"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__seuldos__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__sueldos__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>


			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__seuldos" data-bs-toggle="modal" data-bs-target="#modalVerM2022__sueldos"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>


			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__sueldos__y__salarios__con">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="13"><a class="btn btn-warning" id="vuelvesSeleccionas__sueldos">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="13"><a class="btn btn-primary" id="guardar__sueldosSalarios">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Actividad</th><th>Cédula</th><th>Cargo</th><th>Nombres</th><th>Tipo Cargo</th><th>Tiempo trabajo<br>meses</th><th>Sueldo<br>salario</th><th>Aporte<br>patronal</th><th>Décimo<br>tercer<br>sueldo</th><th>Mensualiza<br>décimo tercer<br>sueldo</th><th>Décimo<br>cuarto<br>sueldo</th><th>Mensualiza<br>décimo cuarto<br>sueldo</th><th>Fondos<br>de<br>reserva</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__sueldos__y__salarios"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de Desvinculaciones

			</div>


			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ DESVINCULACIÓN.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__sueldos__salarios__desvinculaciones" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__sueldos__salarios__desvinculaciones"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__seuldos__desvinculaciones__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__sueldos__desvinculaciones__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>


			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__seuldos__desvinculaciones" data-bs-toggle="modal" data-bs-target="#modalVerM2022__sueldos__desvinculaciones"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>


			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__sueldos__y__salarios__con__desvinculaciones">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="13"><a class="btn btn-warning" id="vuelvesSeleccionas__sueldos__desvinculaciones">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="13"><a class="btn btn-primary" id="guardar__sueldosSalarios__desvinculaciones">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Actividad</th><th>Cédula</th><th>Cargo</th><th>Nombres</th><th>Tipo Cargo</th><th>Compensación por Desahucio</th><th>Despido Intempestivo</th><th>Por Renuncia Voluntaria</th><th>Compensación por Vacaciones no Gozadas por Cesación de Funciones</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__sueldos__y__salarios__desvinculaciones"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de Honorarios

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/Matriz de honorarios.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__honorarios" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__honorarios"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__honorarios__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__honorarios__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__honorarios" data-bs-toggle="modal" data-bs-target="#modalVerM2022__honorarios"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__honorarios__con">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="13"><a class="btn btn-warning" id="vuelvesSeleccionas__honorarios">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="13"><a class="btn btn-primary" id="guardar__honorarios">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Actividad</th><th>Cédula</th><th>Nombres</th><th>Cargo</th><th>Honorario<br>mensual</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__honorarios"></tbody></table>

			</div>

		</div>

		
		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo excel de Mantenimiento

			</div>


			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ ACT 002 OK.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__mantenimiento" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__mantenimiento"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__mantenimiento__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__mantenimiento__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__mantenimiento" data-bs-toggle="modal" data-bs-target="#modalVerM2022__mantenimiento"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__mantenimiento__con">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="13"><a class="btn btn-warning" id="vuelvesSeleccionas__mantenimiento">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="13"><a class="btn btn-primary" id="guardar__mantenimiento">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Ítem</th><th>Nombre<br> infraestructura</th><th>Provincia</th><th>Dirección</th><th>Estado</th><th>Tipo<br>recursos</th><th>Tipo<br>intervención</th><th>Detallar<br>tipo<br>de<br>intervención</th><th>Tipo<br>Mantenimiento</th><th>Materiales<br>servicios</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__mantenimiento"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo actividades administrativas

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ ACT 001 OK.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__administrativo" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__administrativo"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__administrativas__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__administrativas__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__administrativas" data-bs-toggle="modal" data-bs-target="#modalVerM2022__administrativas"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__administrativo__con">
				
				<table class="tabla__modificaciones__exeles"><thead><tr><th colspan="13"><a class="btn btn-warning" id="vuelvesSeleccionas__administrativo">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="13"><a class="btn btn-primary" id="guardar__administrativo">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Ítem<</th><th>Justificación</th><th>Cantidad</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__administrativos"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo capacitación  (Mátriz de actividades deportivas solo actividad 3)

			</div>


			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ ACT. 003 OK.xls"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__actividades__deportivas" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__actividades__deportivas"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>



			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__capacitacion__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__capacitacion__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__capacitacion" data-bs-toggle="modal" data-bs-target="#modalVerM2022__capacitacion"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__actividades__deportivas__con">
				
				<table class="tabla__modificaciones__exeles" cellspacing="0" width="100%"><thead><tr><th colspan="17"><a class="btn btn-warning" id="vuelvesSeleccionas__actividades__deportivas">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="16"><a class="btn btn-primary" id="guardar__actividades__deportivas">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Ítem</th><th>Tipo<br>financiamiento</th><th>Evento</th><th>Deporte</th><th>Provincia</th><th>País</th><th>Alcance</th><th>Fecha<br>Inicio</th><th>Fecha<br>fin</th><th>Genero</th><th>Categoría</th><th>Número<br>entrenadores</th><th>Número<br>atletas</th><th>Total</th><th>Benefeciarios</th><th>Beneficiarios 2</th><th>Justificación</th><th>Cantidad<br>bienes</th><th>Detalle<br>adquisición</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__actividades__deportivas"></tbody></table>

			</div>

		</div>



		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo competencia  (Mátriz de actividades deportivas solo actividad 5)

			</div>


			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ ACT. 005 OK.xls"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>


			<div class="col col-3 mt-4">

				<input type="file" id="archivo__actividades__deportivas__competencia" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__actividades__deportivas__competencia"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__competencia__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__competencias__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__competencia" data-bs-toggle="modal" data-bs-target="#modalVerM2022__competencias"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>


			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__actividades__deportivas__con__competencia">
				
				<table class="tabla__modificaciones__exeles" cellspacing="0" width="100%"><thead><tr><th colspan="17"><a class="btn btn-warning" id="vuelvesSeleccionas__actividades__deportivas__competencia">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="16"><a class="btn btn-primary" id="guardar__actividades__deportivas__competencia">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Ítem</th><th>Tipo<br>financiamiento</th><th>Evento</th><th>Deporte</th><th>Provincia</th><th>País</th><th>Alcance</th><th>Fecha<br>Inicio</th><th>Fecha<br>fin</th><th>Genero</th><th>Categoría</th><th>Número<br>entrenadores</th><th>Número<br>atletas</th><th>Total</th><th>Benefeciarios</th><th>Beneficiarios 2</th><th>Justificación</th><th>Cantidad<br>bienes</th><th>Detalle<br>adquisición</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__actividades__deportivas__competencia"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo recreación  (Mátriz de actividades deportivas solo actividad 6)

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ ACT. 006 OK.xls"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__actividades__deportivas__recreativo" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__actividades__deportivas__recreativo"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__recreativas__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__recreativas__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>			

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__recreativas" data-bs-toggle="modal" data-bs-target="#modalVerM2022__recreativas"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__actividades__deportivas__con__recreativo">
				
				<table class="tabla__modificaciones__exeles" cellspacing="0" width="100%"><thead><tr><th colspan="17"><a class="btn btn-warning" id="vuelvesSeleccionas__actividades__deportivas__recreativo">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="16"><a class="btn btn-primary" id="guardar__actividades__deportivas__recreativo">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Ítem</th><th>Tipo<br>financiamiento</th><th>Evento</th><th>Deporte</th><th>Provincia</th><th>País</th><th>Alcance</th><th>Fecha<br>Inicio</th><th>Fecha<br>fin</th><th>Genero</th><th>Categoría</th><th>Número<br>entrenadores</th><th>Número<br>atletas</th><th>Total</th><th>Benefeciarios</th><th>Beneficiarios 2</th><th>Justificación</th><th>Cantidad<br>bienes</th><th>Detalle<br>adquisición</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__actividades__deportivas__recreativo"></tbody></table>

			</div>

		</div>


		<div class="row separador__objetos mt-4">

			<div class="col col-4 mt-4 textos__titulos">
						
				Subir archivo implementación  (Mátriz de actividades deportivas solo actividad 7)

			</div>

			<div class="col col-2 mt-4 textos__titulos">
						
				<a class="btn btn-info" href="excelD/MATRIZ ACT. 007 OK.xls"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>

			</div>

			<div class="col col-3 mt-4">

				<input type="file" id="archivo__actividades__deportivas__implementaciones" class="ancho__total__input ocultar__enviado__elementos" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>

			</div>

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-warning ocultar__enviado__elementos" id="guardar__excel__actividades__deportivas__implementaciones"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>

			</div>


			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-info" id="ver__excel__poa__implementacion__anterior" data-bs-toggle="modal" data-bs-target="#modalVerM2022__implementacion__anterior"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>anterior

				</div>

			</div>		

			<div class="col col-1 mt-4 text-center">
						
				<button class="btn btn-success" id="ver__excel__poa__implementacion" data-bs-toggle="modal" data-bs-target="#modalVerM2022__implementacion"><i class="fa fa-eye" aria-hidden="true"></i></button>

				<div style="font-weight: bold; font-size: 8px;">

					Información</br>actual

				</div>

			</div>			

			<div class="col col-12 mt-2 modificas__exeles__dis" id="visualizador__actividades__deportivas__con__implementaciones">
				
				<table class="tabla__modificaciones__exeles" cellspacing="0" width="100%"><thead><tr><th colspan="17"><a class="btn btn-warning" id="vuelvesSeleccionas__actividades__deportivas__implementaciones">Volver a seleccionar Archivo&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i></a></th><th colspan="16"><a class="btn btn-primary" id="guardar__actividades__deportivas__implementaciones">Guardar&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></a></th></tr><tr><th>Ítem</th><th>Tipo<br>financiamiento</th><th>Evento</th><th>Deporte</th><th>Provincia</th><th>País</th><th>Alcance</th><th>Fecha<br>Inicio</th><th>Fecha<br>fin</th><th>Genero</th><th>Categoría</th><th>Número<br>entrenadores</th><th>Número<br>atletas</th><th>Total</th><th>Benefeciarios</th><th>Beneficiarios 2</th><th>Justificación</th><th>Cantidad<br>bienes</th><th>Detalle<br>adquisición</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>Julio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Total</th></tr></thead><tbody class="visualizador__actividades__deportivas__implementaciones"></tbody></table>

			</div>

		</div>


	</section>

</div>


<!--==========================================
=            Modal de información            =
===========================================-->

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022","Sección de visualización de información POA","visualizador__informacion__ediciones__poa");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__item","Sección de visualización de información ITEMS","visualizador__informacion__ediciones__item");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__sueldos","Sección de visualización de información Sueldos y salarios","visualizador__informacion__ediciones__sueldos");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__sueldos__desvinculaciones","Sección de visualización de información Desvinculaciones","visualizador__informacion__ediciones__sueldos__desvinculaciones");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__honorarios","Sección de visualización de información Honorarios","visualizador__informacion__ediciones__honorarios");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__mantenimiento","Sección de visualización de información Mantenimiento","visualizador__informacion__ediciones__mantenimiento");?>



<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__administrativas","Sección de visualización de información Administrativo","visualizador__informacion__ediciones__administrativo");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__capacitacion","Sección de visualización de información Capacitación","visualizador__informacion__ediciones__capacitacion");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__competencias","Sección de visualización de información Competencia","visualizador__informacion__ediciones__competencia");?>



<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__recreativas","Sección de visualización de información Recreativas","visualizador__informacion__ediciones__recreativas");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__implementacion","Sección de visualización de información Implementación deportiva","visualizador__informacion__ediciones__implementacion");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__suministros","Sección de visualización de suministros","visualizador__informacion__ediciones__suministros");?>


<!--====  End of Modal de información  ====-->

<!--================================================
=            Modal información anterior            =
=================================================-->


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__anterior","Sección de visualización de información POA (Información anterior)","visualizador__informacion__ediciones__poa__anterior");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__item__anterior","Sección de visualización de información ITEMS (Información anterior)","visualizador__informacion__ediciones__item__anterior");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__sueldos__anterior","Sección de visualización de información Sueldos y salarios (Información anterior)","visualizador__informacion__ediciones__sueldos__anterior");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__sueldos__desvinculaciones__anterior","Sección de visualización de información Desvinculaciones (Información anterior)","visualizador__informacion__ediciones__sueldos__desvinculaciones__anterior");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__honorarios__anterior","Sección de visualización de información Honorarios (Información anterior)","visualizador__informacion__ediciones__honorarios__anterior");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__mantenimiento__anterior","Sección de visualización de información Mantenimiento (Información anterior)","visualizador__informacion__ediciones__mantenimiento__anterior");?>



<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__administrativas__anterior","Sección de visualización de información Administrativo (Información anterior)","visualizador__informacion__ediciones__administrativo__anterior");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__capacitacion__anterior","Sección de visualización de información Capacitación (Información anterior)","visualizador__informacion__ediciones__capacitacion__anterior");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__competencias__anterior","Sección de visualización de información Competencia (Información anterior)","visualizador__informacion__ediciones__competencia__anterior");?>



<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__recreativas__anterior","Sección de visualización de información Recreativas (Información anterior)","visualizador__informacion__ediciones__recreativas__anterior");?>


<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__implementacion__anterior","Sección de visualización de información Implementación deportiva (Información anterior)","visualizador__informacion__ediciones__implementacion__anterior");?>

<?=$componentes__modificaciones->componentes__modificaciones__2022("modalVerM2022__suministros__anterior","Sección de visualización de suministros (Información anterior)","visualizador__informacion__ediciones__suministros__anterior");?>


<!--====  End of Modal información anterior  ====-->
