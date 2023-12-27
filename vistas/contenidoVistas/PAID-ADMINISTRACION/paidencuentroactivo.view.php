<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<input type="hidden" id="valorComparativo" value="1">

<input type="hidden" id="idUsados__items" />

<div class="content-wrapper d d-flex flex-column align-items-center">

	<?=$componentes->getComponentes(1,"Administración encuentro activo para el desarrollo");?>

	<section class="content__configuraciones row d d-flex justify-content-center">

		<!-- <?=$componentes->getLinksConfiguracion(["programaCargado"],["Programa"]);?> -->

		
		<?=$componentes->getLinksConfiguracion(["itemsCargados"],["Items"]);?>

		<?=$componentes->getLinksConfiguracion(["objetivosEstrategicosCargados"],["Objetivos estratégicos"]);?>

		<?=$componentes->getLinksConfiguracion(["areaEncargada"],["Área encargada"]);?>

		<?=$componentes->getLinksConfiguracion(["areaAccion"],["Área de acción"]);?>

		<?=$componentes->getLinksConfiguracion(["tipoOrganizacionDeportiva"],["Tipo de organización deportiva"]);?>

		<?=$componentes->getLinksConfiguracion(["indicadoresCargado"],["Indicadores"]);?>

		<?=$componentes->getLinksConfiguracion(["rubrosCargados"],["Rubros"]);?>

		<?=$componentes->getLinksConfiguracion(["componentesCargado"],["Componentes"]);?>

		<?=$componentes->getLinksConfiguracion(["deportesCargados"],["Deporte"]);?>

		<?=$componentes->getLinksConfiguracion(["modalidadCargados"],["Modalidad"]);?>

		<?=$componentes->getLinksConfiguracion(["pruebaCargados"],["Prueba"]);?>

		<?=$componentes->getLinksConfiguracion(["categoriaCargados"],["Categoría"]);?>


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

<?=$componentesPaid->getModalConfiguracion("itemsCargados","Ítem","itemContent","agregarItem","verItem","tablaItem__paid",["Item","Ítem presupuestario"],"contenedorItemTabla");?>

<?=$componentesPaid->getModalConfiguracion("objetivosEstrategicosCargados","Objetivos Estratégicos","estrategicosContent","agregarEstrategicos","verEstrategicos","tablaEstrategicos",["Objetivo Estrategico"],"contenedorObjetivosEsTabla");?>

<?=$componentesPaid->getModalConfiguracion("areaEncargada","Área encargada","encargadaContent","agregarEncargada","verEncargada","tablaEncargada",["Área encargada"],"contenedorEncargadaTabla");?>

<?=$componentesPaid->getModalConfiguracion("areaAccion","Área acción","accionContent","agregarAccion","verAccion","tablaAccion",["Área acción"],"contenedorAccionTabla");?>

<?=$componentesPaid->getModalConfiguracion("tipoOrganizacionDeportiva","Tipo organización","tipoOrganizacionContent","agregarTipoOrganizacion","verTipoOrganizacion","tablaTipoOrganizacion",["Tipo organización","Área encargada","Área de acción"],"contenedorTipoOrganizacionTabla");?>

<?=$componentesPaid->getModalConfiguracion("indicadoresCargado","Indicadores","indicadoresContent","agregarIndicadores","verIndicadores","tablaIndicadores__paid",["Indicadores"],"contenedorIndicadoresTabla");?>

<?=$componentesPaid->getModalConfiguracion("rubrosCargados","Rubros","rubrosContent","agregarRubros__ec","verRubros","tablaRubros",["Rubros","Ítems"],"contenedorRubrosTabla");?>

<?=$componentesPaid->getModalConfiguracion("deportesCargados","Deporte","deporteContent","agregardeporte","verdeporte","tabladeporte__paid",["Deporte"],"contenedorDeporteTabla");?>


<?=$componentesPaid->getModalConfiguracion("modalidadCargados","Modalidad","modalidadContent","agregarModalidad","verModalidad","tablaModalidad",["Modalidad"],"contenedorModalidadTabla");?>


<?=$componentesPaid->getModalConfiguracion("pruebaCargados","Prueba","pruebaContent","agregarPrueba","verPrueba","tablaPrueba",["Prueba"],"contenedorPruebaTabla");?>

<?=$componentesPaid->getModalConfiguracion("categoriaCargados","Categoría","categoriaContent","agregarCategoria","verCategoria","tablaCategoria",["Categoría"],"contenedorCategoriaTabla");?>

<?=$componentesPaid->getModalConfiguracion("rubrosEditaModalAc","Items Rubros","itemsRubrosContent","agregarItemsRubros","verItemsRubros","tablaItemsRubros",["Ítem"],"contenedorItemsTabla");?>

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

<?=$componentesPaid->getModalEditargetModal("deportePaidEdita","deportePaidForm","Deporte",["input__1"],["Deporte"],"editaDeportePaid");?>

<?=$componentesPaid->getModalEditargetModal("modalidadEdita","modalidadPaidForm","Modalidad",["input__1"],["Modalidad"],"editaModalidad");?>

<?=$componentesPaid->getModalEditargetModal("pruebaEdita","pruebaForm","Prueba",["input__1"],["Prueba"],"editaPrueba");?>

<?=$componentesPaid->getModalEditargetModal("categoriaEdita","categoriaForm","Categoría",["input__1"],["Categoría"],"editaCategoria");?>

<!--====  End of Editar información  ====-->


<!--====  End of Sección modales  ====-->
