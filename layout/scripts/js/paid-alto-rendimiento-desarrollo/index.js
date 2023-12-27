$(document).ready(function () {

    

    $("#DivTablaItemsRubros").hide();
    $("#DivSelectorItemsRubros").hide();
    $("#cerrarReportePaidGeneralAR").hide();
    $("#divReportePAIDGeneralAR").hide();

    $("#btnEnviarPAIDAR").hide();

    $.getScript("layout/scripts/js/validacionBasica.js", function () {

        funcion__solo__numero__montos($(".solo__numero__montos"));
        cedulaBuscadora($("#buscar__CedulaPersonaContacto"),$(".reload__personaContacto"),$("#cedulaRepresentante"),$("#nombreRepresentante"),$("#sexoCiudadano"),$("#fechaDeNacimientoCiudadano"),$("#apellidoRepresentante"));
        
    });



    $.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/insert.js", function () {

        insertar_datos_PAIDEnvio_AR($("#btnEnviarPAIDAR"),$("#ïdentificador").val());

        insertar_tabla_rubos_item($("#guardarItemRubro"), $("#identificador").val());

        insertar_datos_eventos($("#idBtnGuardarEventos"));
        insertar_datos_interdisciplinario($("#idBtnGuardarInterdisciplinario"));

        insertar_necesidades_individuales($("#guardarNecesidadesIndividuales"));
        insertar_necesidades_generales($("#guardarNecesidadesGenerales"));

    });

    $.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/delete.js", function () {


    });


    $.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/update.js", function () {
        
        actualizacion_indicadores_organismos_paid($("#guardarIndicadores"));

    });


    $.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function () {

        tablaPrincipal("paid_general", $(".body__paid"), $("#ïdentificador").val());        

        obtenerRubrosItemsVer("obtener__rubros__items__detalle", $("#guardarItemRubro"),$("#verItemsRubros"));

        mostrar_datos_deporte($("#btnNuevo"), "obtener_datos_deporte", $("#ïdentificador").val() );
        mostrar_datos_modalidad($("#btnNuevo"), "obtener_datos_modalidad", $("#ïdentificador").val() );
        mostrar_datos_prueba($("#btnNuevo"), "obtener_datos_prueba", $("#ïdentificador").val() );
        mostrar_datos_categoria($("#btnNuevo"), "obtener_datos_categoria", $("#ïdentificador").val() );
        mostrar_datos_pais($("#btnNuevo"), "obtener_datos_pais", $("#ïdentificador").val() );
       // mostrar_datos_ciudad($("#btnNuevo"), "obtener_datos_ciudad", $("#ïdentificador").val() );
       

       

        AsignarCiudadesSegunPais("obtener_datos_ciudad");
        pasar_monto_evento_general_principal("mostrar_titulo_eventos_general", $("#ïdentificador").val());
        pasar_monto_interdisciplinario_general_principal("mostrar_titulo_eventos_general", $("#ïdentificador").val());
        pasar_monto_NecesidadesIndividuales_general_principal("mostrar_titulo_eventos_general", $("#ïdentificador").val());
        pasar_monto_NecesidadesGenerales_general_principal("mostrar_titulo_eventos_general", $("#ïdentificador").val());
      
        mostrar_datos_modalidad_inter($("#InterBtnNuevo"), "obtener_datos_modalidad_inter", $("#ïdentificador").val());
        
        CargarSelector_Modalidad_Paid_NecesidadesInd($("#btnNuevoNecesidadesIndividuales"), "cargar_selector_modalidad_nece_individuales", $("#identificador").val());
        CargarSelector_Modalidad_Paid_NecesidadesGen($("#btnNuevoNecesidadesGenerales"), "cargar_selector_modalidad_nece_generales", $("#identificador").val());

        CargarSelector_Deportes_Paid_AR($("#btnNuevoNecesidadesGenerales"),"listar_Deportes",'deporteSelectordNecesidadesGenerales');

    });


    $.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/metodos.js", function () {

        ocultarBtnyDivAR($("#verReportePaidGeneralAR"),$("#cerrarReportePaidGeneralAR"),$("#divPAIDGeneralAR"),$("#divReportePAIDGeneralAR"))
        ocultarBtnyDivAR($("#cerrarReportePaidGeneralAR"),$("#verReportePaidGeneralAR"),$("#divReportePAIDGeneralAR"),$("#divPAIDGeneralAR"))

        cerrarbtn("#itm","#rubroslistaD");
        cerrarDivs("#btnCerrarIndicadores","#tablaIndicadoresPaid");
        cerrarDivs("#cerrarBtnContratacionPublicaAR","#divContratacionPublicaAR");

        cerrarSelector("#btnCerrarModalEventos","#idSelectDeporte");
        cerrarSelector("#btnCerrarModalEventos","#idSelectModalidad");
        cerrarSelector("#btnCerrarModalEventos","#idSelectPrueba");
        cerrarSelector("#btnCerrarModalEventos","#idSelectCategoria");
        cerrarSelector("#btnCerrarNuevoNecesidadesGenerales","#modalidaSelectordNecesidadesGenerales");

        cerrarSelector("#btnCerrarModalInter","#idSelectModalidadInter");

        cerrarSelector("#btnCerrarNuevoNecesidadesIndividuales","#modalidaSelectordNecesidadesIndividuales");

        cerrarSelector("#btnCerrarNuevoNecesidadesGenerales","#deporteSelectordNecesidadesGenerales");
       

        mostrarbtnEnviarPaidAR("#verReportePaidGeneralAR");
       

        cerrarbtnSelector("#CerrarSelectorItem","#DivSelectorItemsRubros","#SelectorItemRubro","#DivTablaItemsRubros","#TablaItemsRubros");
        ocultarVariables2($("#agregarItemsRubros"),$("#DivTablaItemsRubros"),$("#DivSelectorItemsRubros"));
        ocultarVariables2($("#verItemsRubros"),$("#DivSelectorItemsRubros"),$("#DivTablaItemsRubros"));
        multiplicarIndicadoresAR($(".sumador__montosNecesidadesIndividuales"),$("#valorTotalNecesidadesIndividuales")); 
        multiplicarIndicadoresAR($(".sumador__montosNecesidadesGenerales"),$("#valorTotalNecesidadesGenerales")); 
       
        multiplicarIndicadoresAR($(".sumador__montosNecesidadesGenerales"),$("#valorTotalNecesidadesGenerales"));
        limitarInputDateaIngresoActualAR($("#fechaInicio"));
        limitarInputDateaIngresoActualAR($("#fechaFin"));        
        sumarIndicadoresAR($(".sumador__num_ent_num_atle"),$("#pax"));
        multiplicarIndicadoresAR($(".sumador__valor_mes_num_mes"),$("#valorTotal"));
        sumarIndicadoresAR($(".sumador__num_items"),$("#valorTotal"));
        

    });


});