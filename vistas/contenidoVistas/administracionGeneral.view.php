<?php $componentes= new componentes();?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<section class="content__configuraciones row d d-flex justify-content-center">

		<?=$componentes->getLinksConfiguracion(["lineaPolitica"],["Línea política del plan decenal"]);?>

		<?=$componentes->getLinksConfiguracion(["programasModal"],["Programas"]);?>

		<?=$componentes->getLinksConfiguracion(["indicadoresModal"],["Indicadores"]);?>

		<?=$componentes->getLinksConfiguracion(["deportesModal"],["Deportes"]);?>

		<?=$componentes->getLinksConfiguracion(["alcanceModal"],["Alcance"]);?>

		<?=$componentes->getLinksConfiguracion(["tipoFinanModal"],["Objetivos estrategicos"]);?>

		<?=$componentes->getLinksConfiguracion(["tipoCargoModal"],["Tipo de cargo"]);?>

		<?=$componentes->getLinksConfiguracion(["areaAccionModal"],["Área de acción"]);?>

		<?=$componentes->getLinksConfiguracion(["areaEncargadaModal"],["Área encargada"]);?>

		<?=$componentes->getLinksConfiguracion(["objetivoModal"],["Objetivos"]);?>

		<?=$componentes->getLinksConfiguracion(["tipoOrganismoModal"],["Tipo organismo"]);?>

		<?=$componentes->getLinksConfiguracion(["grupoGastoModal"],["Grupo de gasto"]);?>

		<?=$componentes->getLinksConfiguracion(["itemsModal"],["Items"]);?>

		<?=$componentes->getLinksConfiguracion(["actividadesModal"],["Actividades"]);?>

	</section>

</div>

<!--=====================================
=            Sección modales            =
======================================-->
<!--=======================================
=            modales iniciales            =
========================================-->

<?=$componentes->getModalConfiguracion("actividadesModal","Actividades","actividadesContent","agregarActividades","verActividades","tablaActividades",["No.-","Actividades","Items","Indicadores","Grupo gasto"],"contenedorActividades");?>

<?=$componentes->getModalConfiguracion("itemsModal","Items","itemsContent","agregarItems","verItems","tablaItems",["Items","Còdigo item"],"contenedorItems");?>

<?=$componentes->getModalConfiguracion("grupoGastoModal","Grupo de gasto","grupoGastoContent","agregarGrupoGasto","verGrupoGasto","tablaGrupoGasto",["Grupo gasto"],"contenedorGrupoGasto");?>

<?=$componentes->getModalConfiguracion("lineaPolitica","Línea política","lineaPoliticaContent","agregarLineaP","verLineaP","tablaLineaP",["nombreLinea"],"contenedorLineaTabla");?>

<?=$componentes->getModalConfiguracion("programasModal","Programas","programasModalContent","agregarPrograma","verPrograma","tablaPrograma",["nombrePrograma"],"contenedorProgramaTabla");?>

<?=$componentes->getModalConfiguracion("indicadoresModal","Indicadores","indicadoresModalContent","agregarIndicadores","verIndicadores","tablaIndicadores",["nombreIndicador"],"contenedorIndicadores");?>

<?=$componentes->getModalConfiguracion("deportesModal","Deportes","deportesModalContent","agregarDeportes","verDeportes","tablaDeportes",["nombreDeporte"],"contenedorDeportesTabla");?>

<?=$componentes->getModalConfiguracion("alcanceModal","Alcance","alcanceModalContent","agregarAlcance","verAlcance","tablaAlcance",["nombreAlcanse"],"contenedorAlcanceTabla");?>

<?=$componentes->getModalConfiguracion("tipoFinanModal","Objetivo estrategico","financiamientoModalContent","agregarFinanciamiento","verFinanciamiento","tablaFinanciamiento",["Objetivo Estrategico"],"contenedorFinanciamientoTabla");?>

<?=$componentes->getModalConfiguracion("tipoCargoModal","Tipo de cargo","tipoCargoModalContent","agregarCargo","verCargo","tablaCargo",["nombreCargo"],"contenedorCargoTabla");?>

<?=$componentes->getModalConfiguracion("objetivoModal","OBJETIVO PND 2021 - 2025","objetivoodalContent","agregarObjetivo","verObjetivo","tablaObjetivo",["nombreObjetivo","Programa"],"contenedorObjetivoTabla");?>

<?=$componentes->getModalConfiguracion("tipoOrganismoModal","Tipos de organismo","tipoOrganismoModalContent","agregarTipoOrganismo","verTipoOrganismo","tablaTipoOrganismo",["nombreTipo","Acción","Nombre objetivo","Área encargada"],"contenedorTipoTabla");?>


<?=$componentes->getModalConfiguracion("areaAccionModal","Área de acción","areaAccionModalContent","agregarAreaAccion","verAreaAccion","tablaAreaAccion",["Área acción"],"contenedorAccionTabla");?>

<?=$componentes->getModalConfiguracion("areaEncargadaModal","Área encargada","areaEncargadaModalContent","agregarAreaEncargada","verAreaEncargada","tablaAreaEncargada",["Área encargada"],"contenedorAreaEncargadaTabla");?>

<?=$componentes->getModalConfiguracion("actividadesEditaModalAc","Items de ","itemsModalContentAc","agregarItemsAc","verItemsAc","tablaItemsAc",["Item"],"contenedorItemsTablaAc");?>

<!--====  End of modales iniciales  ====-->


<!--=====================================
=            	Modales editar            =
======================================-->

<?=$componentes->getModalEditargetModal("actividadesEditaModal","actividadesForm","Actividades",["input__1","select__grupoG","select__indiCadores","inputActividades","inputActividadesdos"],["Actividades","Grupo de gastos","Indicador","Nùmero de actividad","escondido"],"editarActividades");?>


<?=$componentes->getModalEditargetModal("grupoGastoEdita","grupoGastoForm","Grupo gasto",["input__1"],["Grupo Gasto"],"editarGrupoGasto");?>


<?=$componentes->getModalEditargetModal("lineaPoliticaEdita","lineaPoliticaForm","Línea política",["input__1"],["Línea política"],"editarLinea");?>

<?=$componentes->getModalEditargetModal("programaEditaModal","programaForm","Programa",["input__1"],["Programa"],"editarPrograma");?>

<?=$componentes->getModalEditargetModal("indicadoresEditaModal","indicadoresForm","Indicadores",["input__1"],["Indicadores"],"editarIndicadores");?>

<?=$componentes->getModalEditargetModal("deportesEditaModal","deportesForm","Deportes",["input__1"],["Deportes"],"editarDeportes");?>

<?=$componentes->getModalEditargetModal("alcanceEditaModal","alcanceForm","Alcance",["input__1"],["Alcance"],"editarAlcance");?>

<?=$componentes->getModalEditargetModal("fianncimientoEditaModal","financiamientoForm","Objetivos estaregicos",["input__1"],["Objetivo estategico"],"editarTipoFinan");?>

<?=$componentes->getModalEditargetModal("cargoEdita","cargoForm","Cargo",["input__1"],["Cargo"],"editarcargo");?>


<?=$componentes->getModalEditargetModal("objetivoEditaModal","objetivoForm","Objetivo",["input__1","select__2Objetivos"],["Objetivo","Programa"],"editarObjetivos");?>


<?=$componentes->getModalEditargetModal("areaAccionEdita","areaAccionForm","Àrea acción",["input__1"],["Àrea acción"],"editarAreaAccion");?>


<?=$componentes->getModalEditargetModal("areaEncargadaEdita","areaEncargadaForm","Àrea engarcada",["input__1"],["Àrea encargada"],"editaAreaEncargada");?>


<?=$componentes->getModalEditargetModal("tipoOrganismoEditaModal","tipoOrganismoForm","Tipo de organismo",["input__1","select__1","select__2","select__3"],["Tipo de organismo","Area de acción","Objetivo","Área encargada"],"editarTipoOrganismo");?>

<?=$componentes->getModalEditargetModal("itemsEditaModal","itemPrincipalForm","Item",["input__1","input__2Items"],["Nombre item","Item presupuestario"],"editaItemPrincipal");?>


<!--====  End of 	Modales editar  ====-->


<!--====  End of Sección modales  ====-->
