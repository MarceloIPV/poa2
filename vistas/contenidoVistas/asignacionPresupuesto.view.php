
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"ASIGNACIÓN DE PRESUPUESTO");?>

		<div class="row">

		<table id="asignarPresupuesto" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo organismo</center></th>
					<th><center>Provincia</center></th>
					<th><center>cédula<br>representante legal</center></th>
					<th><center>Nombre<br>representante legal</center></th>
					<th><center>Asignar</center></th>
					<th><center>Editar</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentes->getModalAtributosPdfs("modalAsignarPre","formAsignar","Asignar presupuesto","insertarAsignacion",["Ingrese asignación presupuestaria","Seleccione periodo"],["asignacionPresupuestaria","periodoAsignacion"],["input","select"],["monto","select"],"Asignar","asignacionTecho");?>

<?=$componentes->getModalEditargetModalAuxiliar("orgaModalOrga","orgasModalOrForm","Organismo",["input__1","select__tipoOrga"],["Correo","Tipo de organismo"],"editarOrganismoC");?>

<!--====  End of Modales  ====-->



