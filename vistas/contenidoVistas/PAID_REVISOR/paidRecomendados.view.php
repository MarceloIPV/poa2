
<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"ASIGNACIÓN DE PRESUPUESTO");?>

		<input type="hidden" id="idOrganismo__principalAsgnacion" />

		<div class="row">

		<table id="organismoSubses__paid__recomiendas" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>Ruc</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo organismo</center></th>
					<th><center>Representante</center></th>
					<th><center>Fecha<br>envío PAID</center></th>
					<th><center>Provincia</center></th>
					<th><center>Reasignar</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>


<?=$componentesPaid->modalReenvioPaid__recomiendas("modalReenvioPaid__recomiendas","formReenvio__paid__recomiendas");?>


<?=$componentes->modalReenvioPaid__datatablets__inicial("matrizPaidModales__revisor","form__paid__general","paidGeneral__revisor",["Componente","Indicador","Rubro","ID Item Presupuestario","Nombre Item","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Valor Total"]);?>

<?=$componentes->modalReenvioPaid__datatablets__inicial("indicadoresPaidModales","form__paid__indicadores","paidIndicadores__revisor",["Indicadores","Primer Trimestre","Segundo Trimestre","Tercer Trimestre","Cuarto Trimestre","Valor Total"]);?>

<?=$componentes->modalReenvioPaid__datatablets__inicial("eventosPaidModales","form__paid__eventosM","paidEventos__revisor",["Numero","Deporte","Modalidad","Evento","Atletas","Entrenadores","Categoria","País","Sede","Tipo Evento","Fecha Inicio","Fecha Fin","N. Entrenadores","N. Atletas","Días","Pax","Alojamiento","Alimentación","Hidratación","Transporte Aereo","Transporte Terrestre","Bono Deportivo","Inscripción","Visa","Fondo Emergencia","Específicos Deporte","Valor Total","Observaciones","Componente","Rubro"]);?>

<?=$componentes->modalReenvioPaid__datatablets__inicial("interdisiplinarioModal","form__interdiciplinarios__eventosM","paidInterdiciplinarios__revisor",["Numero","Cédula","Modalidad","Sexo","Cargo","Nombres","Apellidos","Fecha inicio","Fecha fin","Valor","N. Meses","Valor total","Sector","Componente","Rubro"]);?>

<?=$componentes->modalReenvioPaid__datatablets__inicial("necesidadesIndividualesModal","form__individuales__eventosM","paidIndividuales__revisor",["Modalidad","Nombres","Apellidos","Artículo","Cantidad","Valor unitario","Valor Total","Sector","Componente","Rubro"]);?>

<?=$componentes->modalReenvioPaid__datatablets__inicial("necesidadesGeneralesModal","form__necesidadesGenerales__eventosM","paidNecesidadesGenerales__revisor",["Numero","Deporte","Modalidad","Sector","Articulo","Cantidad","Valor unitario","Valor total","Componente","Rubro"]);?>



<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoMedallas","form__ecnuentro__medallasM","paidEncuentroMedallas__revisor",["Numero","Cod. Item","Nom. Item","Deporte","Cant. Medallas Oro","Cant. Medallas Plata","Cant. Medallas Bronce","Total Medallas","Valor Unitario","Valor Total","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoHospAli","form__ecnuentro__HospAliM","paidEncuentroHospAli__revisor",["Numero","Item 1","Item 2","Provincia","Deporte","Nro. Cupos","Valor Hosp/Alim/hidr","Nro. Días","Valor Total","Matriz","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoMatricesAux","form__ecnuentro__MatricesAuxM","paidEncuentroMatricesAux__revisor",["Numero","Cod. Item","Nom. Item","Descripción","Cantidad","Valor Unitario","Valor Total","Matriz","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoPersonalTecnico","form__ecnuentro__PersonalTecnico","paidEncuentroPersonalTecnico__revisor",["Numero","Item","Deporte","Jueces","Nro. Días Jueces","Comisionados","Nro. Días Comisionados","Personal Apoyo","Nro. Días P. Apoyo","Valor Jueces","Valor Comisionados","Valor P. Apoyo","Valor Total","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoBonoDeportivo","form__ecnuentro__BonoDeportivo","paidEncuentroBonoDeportivo__revisor",["Numero","Cod. Item","Nom. Item","Deporte","Nro. Días","Total Personal","Valor Bono","Valor Total","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoUniformes","form__ecnuentro__Uniformes","paidEncuentroUniformes__revisor",["Numero","Item","Deporte","Delegación","Personal Apoyo","Valor Unitario","Valor Total","Tipo","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoSeguros","form__ecnuentro__Seguros","paidEncuentroSeguros__revisor",["Numero","Cod. Item","Nom. Item","Provincia","Deporte","Cantidad","Nro. Cupos","Valor Unitario","Valor Total","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoTransporte","form__ecnuentro__Transporte","paidEncuentroTransporte__revisor",["Numero","Cod. Item","Nom. Item","Provincia","Deporte","Cantidad","Nro. Cupos","Valor Unitario","Valor Total","Componente","Rubro"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("ecuentroActivoPasajesAereos","form__ecnuentro__PasajesAereos","paidEncuentroPasajesAereos__revisor",["Numero","Item","Deporte","Pasajes","Nro. Deportistas","Nro. Entrenadores","Total Personal","Nro. Días","Valor Total","Componente","Rubro"]);?>


<?=$componentes->modalReenvioPaid__datatablets__inicial("matrizEjecucionObra","form__ejecucion__obra","paidEjecucionObraInfraestructura__revisor",["NÚMERO","DOCUMENTO","VALOR TOTAL"]);?>
<?=$componentes->modalReenvioPaid__datatablets__inicial("matrizFiscalizacion","form__fiscalizacion","paidFiscalizacionInfraestructura__revisor",["NÚMERO","DOCUMENTO","VALOR TOTAL"]);?>


<script>
	    
$.getScript("layout/scripts/js/PAID_REVISOR_JS/datatablets.js",function(){

	datatabletsPaidRevisor($("#organismoSubses__paid__recomiendas"),"organismoSubses__paid__recomiendas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([8],["boton"],["<center><button class='reasignarTramites__paid__recomiendas estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#modalReenvioPaid__recomiendas'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funrion__reasignar__paid__recomiendas"],[false],[false],false);

});

</script>