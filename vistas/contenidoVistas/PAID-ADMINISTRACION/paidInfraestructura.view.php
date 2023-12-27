<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<?php $componentesTablas= new componentesTablas();?>

<input type="hidden" id="valorComparativo" value="2">

<input type="hidden" id="idUsados__items" />

<div class="content-wrapper d d-flex flex-column align-items-center">

	<?=$componentes->getComponentes(1,"Administración Optimización de Infraestructura Deportiva a Nivel Nacional");?>

	<section class="content__configuraciones row d d-flex justify-content-center">

		<!-- <?=$componentes->getLinksConfiguracion(["programaCargado"],["Programa"]);?> -->

		<?=$componentes->getLinksConfiguracion(["itemsCargados"],["Item Presupuestario"]);?>

		<?=$componentes->getLinksConfiguracion(["objetivosEstrategicosCargados"],["Objetivos estratégicos"]);?>

		<?=$componentes->getLinksConfiguracion(["areaEncargada"],["Área encargada"]);?>

		<?=$componentes->getLinksConfiguracion(["areaAccion"],["Área de acción"]);?>

		<?=$componentes->getLinksConfiguracion(["tipoOrganizacionDeportiva"],["Tipo de organización deportiva"]);?>

		<?=$componentes->getLinksConfiguracion(["indicadoresCargado"],["Indicadores"]);?>

		<?=$componentes->getLinksConfiguracion(["rubrosCargados"],["Rubros"]);?>

		<?=$componentes->getLinksConfiguracion(["componentesCargado"],["Componentes"]);?>

		<?=$componentes->getLinksConfiguracion(["tipoIntervencion"],["Tipo Intervención"]);?>

		<?=$componentes->getLinksConfiguracion(["estadoPropiedad"],["Estado de la Propiedad"]);?>

	</section>

</div>

<!--=====================================
=            Sección modales            =
======================================-->
<!--=======================================
=            modales iniciales            =
========================================-->

<?=$componentesPaid->getModalConfiguracion("programaCargado","Programa","programaContent","agregarProgramas","verProgramas","tablaProgramas",["Programa"],"contenedorProgramaTabla");?>

<?=$componentesPaid->getModalConfiguracion("componentesCargado","Componente","componenteContent","agregarComponente","verComponente","tablaComponente",["Componente","Rubros","Indicadores"],"contenedorComponenteTabla");?>

<?=$componentesPaid->getModalConfiguracion("itemsCargados","Item Presupuestario ","itemContent","agregarItem","verItem","tablaItem__paid",["Item","Ítem presupuestario"],"contenedorItemTabla");?>

<?=$componentesPaid->getModalConfiguracion("objetivosEstrategicosCargados","Objetivos Estratégicos","estrategicosContent","agregarEstrategicos","verEstrategicos","tablaEstrategicos",["Objetivo Estrategico"],"contenedorObjetivosEsTabla");?>

<?=$componentesPaid->getModalConfiguracion("areaEncargada","Área encargada","encargadaContent","agregarEncargada","verEncargada","tablaEncargada",["Área encargada"],"contenedorEncargadaTabla");?>

<?=$componentesPaid->getModalConfiguracion("areaAccion","Área acción","accionContent","agregarAccion","verAccion","tablaAccion",["Área acción"],"contenedorAccionTabla");?>

<?=$componentesPaid->getModalConfiguracion("tipoOrganizacionDeportiva","Tipo organización","tipoOrganizacionContent","agregarTipoOrganizacion","verTipoOrganizacion","tablaTipoOrganizacion",["Tipo organización","Área encargada","Área de acción"],"contenedorTipoOrganizacionTabla");?>

<?=$componentesPaid->getModalConfiguracion("indicadoresCargado","Indicadores","indicadoresContent","agregarIndicadores","verIndicadores","tablaIndicadores__paid",["Indicadores"],"contenedorIndicadoresTabla");?>

<?=$componentesPaid->getModalConfiguracion("rubrosCargados","Rubros","rubrosContent","agregarRubros","verRubros","tablaRubros",["Rubros","Ítems"],"contenedorRubrosTabla");?>

<?=$componentesPaid->getModalConfiguracion("tipoIntervencion","Tipo Intervención","deporteContent","agregarTipoIntervencion","verTipoInfraestructura","tablatipoInfraestructura__paid",["Tipo"],"contenedorDeporteTabla");?>


<?=$componentesPaid->getModalConfiguracion("estadoPropiedad","Estado de la Propiedad","modalidadContent","agregarEstPropiedad","verEstPropiedad","tablaEstadoPropiedad",["Estado Propiedad"],"contenedorModalidadTabla");?>

<?=$componentesPaid->getModalConfiguracion2("rubrosEditaModalAc","Items Rubros","itemsRubrosContent","agregarItemsRubros","verItemsRubros","tablaItemsRubros",["Ítem"],"contenedorItemsTabla");?>

<?=$componentesPaid->getModalConfiguracion("rubrosEditaModalComponentes","Rubros","rubrosContentPrincipal","agregarItemsRubrosContentPrincipal","verItemsRubrosContentPrincipal","tablaItemsRubrosContentPrincipal",["Ítem"],"contenedorRubosItemsPrincipalTabla");?>



<!--====  End of modales iniciales  ====-->

<!--========================================
=            Editar información            =
=========================================-->

<?=$componentesPaid->getModalEditargetModal("programaEdita","programaForm","Programa",["input__1"],["Programa"],"editarPrograma");?>

<?=$componentesPaid->getModalEditargetModal("componenteEdita","componenteForm","Componentes",["input__1","input__2__tipoPaid"],["Componentes"],"editarComponentes");?>

<?=$componentesPaid->getModalEditargetModal("itemEdita","itemPrincipalForm","Item",["input__1","input__2Items__paid"],["Nombre item","Item presupuestario"],"editaItemPaid");?>

<?=$componentesPaid->getModalEditargetModal("estrategicosEdita","estrategicosForm","Objetivos estrategicos",["input__1"],["Objetivo Estrategico"],"editarEstrategico");?>

<?=$componentesPaid->getModalEditargetModal("encargadaEdita","encargadaForm","Área encargada",["input__1"],["Área encargada"],"editarEncargada");?>

<?=$componentesPaid->getModalEditargetModal("accionEdita","accionForm","Área de acción",["input__1"],["Área de acción"],"editaAccion");?>

<?=$componentesPaid->getModalEditargetModal("tipoOrEdita","tipoOrForm","Tipo de organismo",["input__1","input__2__tipoPaid","input__3__tipoPaid"],["Tipo de organismo"],"editaTipoOr");?>

<?=$componentesPaid->getModalEditargetModal("indicadorEdita","indicadoresForm","Indicadores",["input__1"],["Indicadores"],"editaIndicador");?>

<?=$componentesPaid->getModalEditargetModal("rubrosEditaModal","rubrosForm","Rubros",["input__1"],["Rubros"],"editaRubro");?>

<?=$componentesPaid->getModalEditargetModal2("tipoInfraestructuraEdita","deportePaidForm","Tipo Infraestructura",["input__1"],["Tipo"],"editaTipoInfraestructuraPaid","btnCerrarTipoInfraestructura","inputTipoInfra");?>

<?=$componentesPaid->getModalEditargetModal2("estadoPropiedadEdita","modalidadPaidForm","Modalidad",["input__1"],["Estado Propiedad"],"editaEstadoPropiedad","btnCerrarEstadoPropiedad","inputEstadoPropiedad");?>



<!--====  End of Editar información  ====-->


<!--====  End of Sección modales  ====-->




