$(document).ready(function () {

   
    $("#DivTablaItemsRubrosDesarrollo").hide();
    $("#DivSelectorItemsRubrosDesarrollo").hide();
    $("#cerrarReportePaidGeneral").hide();
    $("#divReportePAIDGeneralDesarrollo").hide();

    $("#btnEnviarPAIDdesarrollo").hide();

    $("#divAdecentamiento").hide();
    $("#divBienes").hide();
    $("#divMedicinas").hide();
    $("#divAlqEquipos").hide();
    $("#divComEquipos").hide();
    $("#divLogEvento").hide();
    $("#divPublicidad").hide();
    $("#divAcreditaciones").hide();

    $("#divHospAlimDI").hide();
    $("#divHospAlimDC").hide();
    $("#divDeporteDelegacionHospAlimJA").hide();
    $("#divHidratacionDI").hide();
    $("#divHidratacionDC").hide();
    $("#divDeporteDelegacionHidrJA").hide();
    
    $("#selectDIDCT").hide();
    $("#selectDIDCTHI").hide();

    $("#divSeguroDeporte").hide();
    $("#divSeguroProvincia").hide();

    $("#divTransporteDeporte").hide();
    $("#divTransporteProvincia").hide();
    
    $("#divSeguroDeporte").hide();
    $("#divSeguroProvincia").hide();

    $("#divTransporteDeporte").hide();
    $("#divTransporteProvincia").hide();

    $("#divUniformes").hide();
    $("#iddivUniformes").hide();
    $("#divIndumentariaPApoyo").hide();
    $("#iddivIndumentariaPApoyo").hide();

    
    
    
    $.getScript("layout/scripts/js/validacionBasica.js",function(){

        funcion__solo__numero__montos($(".solo__numero__montos"));   

    });


    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/datatablets.js",function(){

        //datatabletsDesarollo($("#paidJuegosNacionales"), "paidJuegosNacionales","eliminarJN");
        
        
    });


    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/inserciones.js",function(){

        
        insertar_datos_PAIDEnvio_Desarrollo($("#btnEnviarPAIDdesarrollo"),$("#identificador").val());
        insertar_tabla_rubos_itemDesarrollo($("#guardarItemRubroDesarrollo"),$("#identificador").val());
        insertar_encuentro_activoJN($("#guardarEventosNacionales"));

        insertar_personal_tecnico_convensional($("#guardarDatosPTC"),$("#identificador").val());
        insertar_pasajes_aereos($("#guardarDatosPasajesAereos"),$("#identificador").val());
       
        insertar_medallas_convencionalesJN("#guardarMedallasJN",$("#identificador").val());

        insertar_bono_deportivo_JN("#guardarBonoDeportivoJN",$("#identificador").val());

        insertar_eventos_desarrollo("#guardarEventoDesarrollo");
        
        insertar_matrices_generales_juegos_nacionales($("#guardarBienes"),$("#identificador").val(),"itemBienes",$("#descripcionBienes"),null,null, $("#valorTotalBienes"),$("#paidBienesJN"),"selectEventoBienes");
        insertar_matrices_generales_juegos_nacionales($("#guardarAdecentamiento"),$("#identificador").val(),"itemAdecentamiento",$("#descripcionAdecentamiento"),null,null, $("#valorTotalAdecentamiento"),$("#paidAdecentameintoJN"),"selectEventoAdecentamiento");
        insertar_matrices_generales_juegos_nacionales($("#guardarMedicinas"),$("#identificador").val(),"itemMedicinas",$("#descripcionMedicinas"),null,null, $("#valorTotalMedicinas"),$("#paidMedicinasJN"),"selectEventoMedicinas");
        insertar_matrices_generales_juegos_nacionales($("#guardarAlqEquipos"),$("#identificador").val(),"itemAlqEquipos",$("#descripcionAlqEquipos"),null,null, $("#valorTotalAlqEquipos"),$("#paidAlqEquiposJN"),"selectEventoAlqEquipos");
        insertar_matrices_generales_juegos_nacionales($("#guardarComEquipos"),$("#identificador").val(),"itemComEquipos",$("#descripcionComEquipos"),null,null, $("#valorTotalComEquipos"),$("#paidComEquiposJN"),"selectEventoComEquipos");
        insertar_matrices_generales_juegos_nacionales($("#guardarLogEventos"),$("#identificador").val(),"itemLogEventos",$("#descripcionLogEventos"),null,null, $("#valorTotalLogEventos"),$("#paidLogEventosJN"),"selectEventoLogEvento");
        insertar_matrices_generales_juegos_nacionales($("#guardarPublicidad"),$("#identificador").val(),"itemPublicidad",$("#descripcionPublicidad"),null,null, $("#valorTotalPublicidad"),$("#paidPublicidadJN"),"selectEventoPublicidad");
        insertar_matrices_generales_juegos_nacionales($("#guardarAcreditaciones"),$("#identificador").val(),"itemAcreditaciones",$("#descripcionAcreditaciones"),$("#cantidadAcreditaciones"),$("#valorUnitarioAcreditaciones"), $("#valorTotalAcreditaciones"),$("#paidAcreditacionesJN"),"selectEventoAcreditaciones");   
        
        insertar_matrices_hops_alim($("#guardarHospAlimDI"),$("#identificador").val(),$("#deporteHospAlimDI"),null,$("#nroCuposHospAlimDI"),$("#HospAlimDI"),$("#diasHospAlimDI"), $("#valorTotalHospAlimDI"),$("#paidHospAlimDI"),"eventoHospAlimDI");   
        insertar_matrices_hops_alimDC($("#guardarHospAlimDC"),$("#identificador").val(),null,$("#deporteHospAlimDC"),$("#nroCuposHospAlimDC"),$("#HospAlimDC"),$("#diasHospAlimDC"), $("#valorTotalHospAlimDC"),$("#paidHospAlimDC"),"eventoHospAlimDC");   
        insertar_matrices_hops_alimDC($("#guardarHospAlimJA"),$("#identificador").val(),null,$("#deporteHospAlimJA"),$("#nroCuposHospAlimJA"),$("#HospAlimJA"),$("#diasHospAlimJA"), $("#valorTotalHospAlimJA"),$("#paidDeporteDelegacionHospAlimJA"),"eventoHospAlimJA");   
        insertar_matrices_HidDI($("#guardarHidratacionDI"),$("#identificador").val(),$("#deporteHidratacionDI"),null,$("#nroCuposHidratacionDI"),$("#HidratacionDI"),$("#diasHidratacionDI"), $("#valorTotalHidratacionDI"),$("#paidHidratacionDI"),"eventoHidratacionDI");   
        insertar_matrices_HidDC($("#guardarHidratacionDC"),$("#identificador").val(),null,$("#deporteHidratacionDC"),$("#nroCuposHidratacionDC"),$("#HidratacionDC"),$("#diasHidratacionDC"), $("#valorTotalHidratacionDC"),$("#paidHidratacionDC"),"eventoHidratacionDC");   
        insertar_matrices_HidDC($("#guardarHidratacionJA"),$("#identificador").val(),null,$("#deporteHidratacionJA"),$("#nroCuposHidratacionJA"),$("#HidratacionJA"),$("#diasHidratacionJA"), $("#valorTotalHidratacionJA"),$("#paidDeporteDelegacionHidrJA"),"eventoHidratacionJA");   
        
        
        insertar_datos_uniformes($("#guardarUniformes"),$("#identificador").val(),$("#deporteUniformes"),$("#delegacionesUniformes"),null,$("#vUnitarioUniformes"), $("#valorTotalUniformes"),$("#paidUniformes"),"eventoUniformes");   
        insertar_datos_indumentario_pApoyo($("#guardarIndumentariaPApoyo"),$("#identificador").val(),$("#deporteIndumentariaPApoyo"),null,$("#pApoyoIndumentariaPApoyo"),$("#vUnitarioIndumentariaPApoyo"),$("#valorTotalIndumentariaPApoyo"),$("#paidIndumentariaPApoyo"),"eventoIndumentaria");   

                
        insertar_matrices_seguro_desarollo($("#guardarSeguroDeporte"),$("#identificador").val(),"#itemSeguroDeporte","selectorSeguroDeporte",null, "#cantidadSeguroDeporte","#nroCuposSeguroDeporte","#valorUnitarioSeguroDeporte","#valorTotalSeguroDeporte","#paidSeguroDeporte","eventoSeguroDeporte");
        insertar_matrices_seguro_desarollo($("#guardarSeguroProvincia"),$("#identificador").val(),"#itemSeguroProvincia",null,"selectorSeguroProvincia", "#cantidadSeguroProvincia","#nroCuposSeguroProvincia","#valorUnitarioSeguroProvincia","#valorTotalSeguroProvincia","#paidSeguroProvincia","eventoSeguroProvincia");
        
        insertar_matrices_transporte_desarollo($("#guardarTransporteDeporte"),$("#identificador").val(),"#itemTransporteDeporte","selectorTransporteDeporte",null, "#cantidadTransporteDeporte","#nroCuposTransporteDeporte","#valorUnitarioTransporteDeporte","#valorTotalTransporteDeporte","#paidTransporteDeporte","eventoTransporteDeporte");
        insertar_matrices_transporte_desarollo($("#guardarTransporteProvincia"),$("#identificador").val(),"#itemTransporteProvincia",null,"selectorTransporteProvincia", "#cantidadTransporteProvincia","#nroCuposTransporteProvincia","#valorUnitarioTransporteProvincia","#valorTotalTransporteProvincia","#paidTransporteProvincia","eventoTransporteProvincia");
  
        
    });
    
    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/eliminaciones.js",function(){
        
        
    });

    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/actualizaciones.js",function(){
        
        actualizacion_indicadores_organismos_paid($("#guardarIndicadoresDesarrollo"));


        
  
       
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesAdecentamiento","actualizar_matrices_generales_auxiliares_JN","#paidAdecentameintoJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesBienes","actualizar_matrices_generales_auxiliares_JN","#paidBienesJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesMedicinas","actualizar_matrices_generales_auxiliares_JN","#paidMedicinasJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesAlqEquipos","actualizar_matrices_generales_auxiliares_JN","#paidAlqEquiposJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesComEquipos","actualizar_matrices_generales_auxiliares_JN","#paidComEquiposJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesLogEventos","actualizar_matrices_generales_auxiliares_JN","#paidLogEventosJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesPublicidad","actualizar_matrices_generales_auxiliares_JN","#paidPublicidadJN");
        actualizacion_Matrices_Generales_JN("#guardarEditorMatricesGeneralesAcreditaciones","actualizar_matriz_general_acreditaciones_JN","#paidAcreditacionesJN");
       
        
    });


   $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js",function(){

        
        
        tablaPrincipalDesarrollo("paid_general",$("#identificador").val());       

        obtenerRubrosItemsVer_Desarrollo("obtener__rubros__items__detalle", $("#guardarItemRubroDesarrollo"),$("#verItemsRubrosDesarrollo"));

        CargarSelector_Categorias_Paid_DesarrolloJN($("#btnNuevoDesarrolloJN"),"obtener_nombre_categorias",$("#identificador").val());


    
        

        obtenerRubros__items_Desarrollo($("#agregarItemsRubrosDesarrollo"), "obtener__rubros__items__inversion", $("#identificador").val());


        AsignarValorTransporte("obtener_valores_transporte");
        AsignarValorSeguro("obtener_valores_seguro");

        
        AsignarMontoBonoDeportivoJN("obtener_valores_bono_deportivo");
        AsignarMatricesAuxiliaresJN("obtener_valores_matrices_auxiliares");
        Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");
        Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
        total_jueces_PTC("obtener_total_jueces_PTC");
        valor_total_PTC("obtener_valor_total_PTC");
        total_uniformes_delegaciones("obtener_valor_total_uniformes_delegaciones");
        total_uniformes("obtener_valor_total_uniformes");
        uniformes_num_totalPApoyo("obtener_num_total_PApoyo");
        uniformes_valor_total_PApoyo("obtener_valor_total_PApoyo");
        num_deportistas_pasajes_aereos("obtener_num_deportistas_pasaje_aereo");
        num_entrenadores_pasajes_aereos("obtener_num_entrenadores_pasaje_aereo");
        num_total_personas_pasajes_aereos("obtener_num_total_personas_pasaje_aereo");
        valor_total_pasajes_aereos("obtener_valor_total_pasaje_aereo");

       
        

        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoMedallasJN"),"listar_Deportes",'DeporteMedallaJN');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoBonoDeportivoJN"),"listar_Deportes",'DeporteBonoDeportivoJN');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoHospAlimDC"),"listar_Deportes_HAHDC",'deporteHospAlimDC');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoHidratacionDC"),"listar_Deportes_HAHDC",'deporteHidratacionDC');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoPTC"),"listar_Deportes_PTC",'idSelectDeportePTC');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoUniAdaptado"),"listar_Deportes_PTC",'idSelectDeporteUA');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoSeguroDeporte"),"listar_Deportes_PTC",'selectorSeguroDeporte');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoTransporteDeporte"),"listar_Deportes_PTC",'selectorTransporteDeporte');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoUniformes"),"listar_Deportes_PTC",'deporteUniformes');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoIndumentariaPApoyo"),"listar_Deportes_PTC",'deporteIndumentariaPApoyo');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoEventoJN"),"listar_Deportes_PTC",'idSelectDeporteEventos');
        CargarSelector_Deportes_Paid_DesarrolloJN($("#btnNuevoEventoJN"),"listar_Deportes_PTC",'idSelectModalidadEventos');

        CargarSelector_eventos_DesarrolloJN($("#btnNuevoBonoDeportivoJN"),"listar_evento_desarrollo",'eventoBonoDeportivoJN');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoAdecentamiento"),"listar_evento_desarrollo",'selectEventoAdecentamiento');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoBienes"),"listar_evento_desarrollo",'selectEventoBienes');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoMedicinas"),"listar_evento_desarrollo",'selectEventoMedicinas');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoAlqEquipos"),"listar_evento_desarrollo",'selectEventoAlqEquipos');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoCompEquipos"),"listar_evento_desarrollo",'selectEventoComEquipos');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoLogEventos"),"listar_evento_desarrollo",'selectEventoLogEvento');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoPublicidad"),"listar_evento_desarrollo",'selectEventoPublicidad');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoAcreiditaciones"),"listar_evento_desarrollo",'selectEventoAcreditaciones');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoMedallasJN"),"listar_evento_desarrollo",'eventoMedallasJN');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoPasajesAereos"),"listar_evento_desarrollo",'eventoPasajesAereosJN');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoPTC"),"listar_evento_desarrollo",'eventoPTCJN');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoSeguroDeporte"),"listar_evento_desarrollo",'eventoSeguroDeporte');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoSeguroProvincia"),"listar_evento_desarrollo",'eventoSeguroProvincia');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoHospAlimDI"),"listar_evento_desarrollo",'eventoHospAlimDI');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoHospAlimDC"),"listar_evento_desarrollo",'eventoHospAlimDC');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoDeporteDelegacionHospAlimJA"),"listar_evento_desarrollo",'eventoHospAlimJA');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoHidratacionDI"),"listar_evento_desarrollo",'eventoHidratacionDI');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoHidratacionDC"),"listar_evento_desarrollo",'eventoHidratacionDC');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoDeporteDelegacionHidrJA"),"listar_evento_desarrollo",'eventoHidratacionJA');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoTransporteDeporte"),"listar_evento_desarrollo",'eventoTransporteDeporte');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoTransporteProvincia"),"listar_evento_desarrollo",'eventoTransporteProvincia');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoUniformes"),"listar_evento_desarrollo",'eventoUniformes');
        CargarSelector_eventos_DesarrolloJN($("#btnNuevoIndumentariaPApoyo"),"listar_evento_desarrollo",'eventoIndumentaria');

        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoAdecentamiento"),"obtener_items","itemAdecentamiento",$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoBienes"),"obtener_items",'itemBienes',$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoMedicinas"),"obtener_items",'itemMedicinas',$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoAlqEquipos"),"obtener_items",'itemAlqEquipos',$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoCompEquipos"),"obtener_items",'itemComEquipos',$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoLogEventos"),"obtener_items",'itemLogEventos',$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoPublicidad"),"obtener_items",'itemPublicidad',$("#identificador").val());
        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoAcreiditaciones"),"obtener_items",'itemAcreditaciones',$("#identificador").val());

        CargarSelector_items_Paid_DesarrolloJN($("#btnNuevoHospAlimDI"),"obtener_items_Hosp_Alim","SelectItemHosp_Alim",$("#identificador").val());
        CargarSelector_deporte_provincias_Paid_DesarrolloJN($("#btnNuevoHospAlimDI"),"obtener_deporte_Hosp_Alim","deporteHospAlimDI",$("#identificador").val());
        CargarSelector_deporte_provincias_Paid_DesarrolloJN($("#btnNuevoHidratacionDI"),"obtener_deporte_Hosp_Alim","deporteHidratacionDI",$("#identificador").val());
        CargarSelector_deporte_provincias_Paid_DesarrolloJN($("#btnNuevoSeguroProvincia"),"obtener_deporte_Hosp_Alim","selectorSeguroProvincia",$("#identificador").val());
        CargarSelector_deporte_provincias_Paid_DesarrolloJN($("#btnNuevoTransporteProvincia"),"obtener_deporte_Hosp_Alim","selectorTransporteProvincia",$("#identificador").val());

    });

    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/metodos.js",function(){
        sumarIndicadores($(".sumador__entrenadores__deportistas__pasajes__aereos"),$("#numeroTotalPersonasPasajesAereos"));
        sumarIndicadores($(".sumador__medallas"),$("#cantMedallasTotal"));  
        
        multiplicarIndicadoresD($(".multiplicar__valor__Deporte"),$("#valorTotalSeguroDeporte"));
        multiplicarIndicadoresD($(".multiplicar__valor__Provincia"),$("#valorTotalSeguroProvincia"));

        multiplicarIndicadoresD($(".multiplicar__valor__Deporte"),$("#valorTotalTransporteDeporte"));
        multiplicarIndicadoresD($(".multiplicar__valor__Provincia"),$("#valorTotalTransporteProvincia"));        
        

        multiplicarIndicadoresD($(".multiplicar__valor__Provincia"),$("#valorTotalSeguroProvincia"));
        multiplicarIndicadoresD($(".multiplicar__valor__Deporte"),$("#valorTotalSeguroDeporte"));

        multiplicarIndicadoresD($(".suma_montos"),$("#valorTotalAcreditaciones"));
        multiplicarIndicadoresD($(".multiplicar_valor_Bono"),$("#valorTotalBonoDeportivo"));
        multiplicarIndicadoresD($(".multiplicar__valor"),$("#valorTotalMedallas"));


        multiplicarIndicadoresD($(".suma_montosHADI"),$("#valorTotalHospAlimDI"));
        multiplicarIndicadoresD($(".suma_montosHADC"),$("#valorTotalHospAlimDC"));
        multiplicarIndicadoresD($(".suma_montosHIDDI"),$("#valorTotalHidratacionDI"));
        multiplicarIndicadoresD($(".suma_montosHIDDC"),$("#valorTotalHidratacionDC"));
        multiplicarIndicadoresD($(".suma_montosHAJA"),$("#valorTotalHospAlimJA"));
        multiplicarIndicadoresD($(".suma_montosHIJA"),$("#valorTotalHidratacionJA"));
        multiplicarIndicadoresD($(".suma_montosUniformes"),$("#valorTotalUniformes"));
        multiplicarIndicadoresD($(".suma_montosIPA"),$("#valorTotalIndumentariaPApoyo"));
        

        multiplicarIndicadoresConSumaD($(".suma_montos_valor_jueces_PTC"),$("#id_valor_jueces_PTC"),$(".sumador_valores_JCAP"),$("#valorTotalPTC"));
        multiplicarIndicadoresConSumaD($(".suma_montos_valor_comision_PTC"),$("#id_valor_comisionado_PTC"),$(".sumador_valores_JCAP"),$("#valorTotalPTC"));
        multiplicarIndicadoresConSumaD($(".suma_montos_valor_p_apoyo_PTC"),$("#id_valor_p_apoyo_PTC"),$(".sumador_valores_JCAP"),$("#valorTotalPTC"));


        mostrarinfoBotones();

        
        multiplicarIndicadoresD($(".suma_montos_pasajes_aereos"),$("#valorTotalPasajesAereos"));

         
        multiplicarIndicadoresConSumaDA($(".suma_montosUniformesUA"),$("#subTotalUniformesUA"),$(".sumador_total_UA"),$("#valorTotalUA"));
        multiplicarIndicadoresConSumaDA($(".suma_montosCamisetasUA"),$("#subTotalCamisetasUA"),$(".sumador_total_UA"),$("#valorTotalUA"));

        ocultarBtnyDivDesarrollo($("#verReportePaidGeneral"),$("#cerrarReportePaidGeneral"),$("#divPAIDGeneralDesarrollo"),$("#divReportePAIDGeneralDesarrollo"))
        ocultarBtnyDivDesarrollo($("#cerrarReportePaidGeneral"),$("#verReportePaidGeneral"),$("#divReportePAIDGeneralDesarrollo"),$("#divPAIDGeneralDesarrollo"))

        mostrar_divs_por_selector($("#selectPersonalizado"));
        mostrar_divs_por_selector_Hosp_Alim_Hid($("#idSelecHopAlimHid"));
        mostrar_matrices_DI_DC_HOSP_ALIM($("#idSelecDIDC"));
        mostrar_matrices_DI_DC_HIDR($("#idSelecDIDCHI"));
        mostrar_divs_por_selector_Seguros($("#selectSeguros"));

        mostrar_divs_por_selector_Transporte($("#selectTransporte"));
        mostrar_divs_por_selector_unifomres_adaptados($("#idSelecUnifAdaptados"));


        cerrarDivsDesarrollo("#cerrarBtnContratacionPublica","#divContratacionPublica");

        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesAdecentamiento","#tablaMatrizGeneralAdecentamiento");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesBienes","#tablaMatrizGeneralBienes");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesMedicinas","#tablaMatrizGeneralMedicinas");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesAlqEquipos","#tablaMatrizGeneralAlqEquipos");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesComEquipos","#tablaMatrizGeneralComEquipos");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesLogEventos","#tablaMatrizGeneralLogEventos");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesPublicidad","#tablaMatrizGeneralPublicidad");
        cerrarDivsDesarrollo("#btnCerrarMatricesGeneralesAcreditaciones","#tablaMatrizGeneralAcreditaciones");
        
        cerrarbtnDesarrollo("#itmDesarrollo","#rubroslistaDesarrollo");
        
        cerrarDivsDesarrollo("#btnCerrarIndicadoresDesarrollo","#tablaIndicadoresPaidDesarrollo");
        
        
        
        actualizaDatabletPorIDBoton($("#verReportePaidGeneral"),$("#paidReporteGeneralDesarrollo"));
        
        
        cerrarSelectorDesarrollo("#guardarEventoDesarrollo","#idSelectDeporteEventos");
        cerrarSelectorDesarrollo("#guardarEventoDesarrollo","#idSelectModalidadEventos");
        cerrarSelectorDesarrollo("#btnCerrarNuevoEventoDesarrollo","#idSelectDeporteEventos");
        cerrarSelectorDesarrollo("#btnCerrarNuevoEventoDesarrollo","#idSelectModalidadEventos");

        cerrarSelectorDesarrollo("#guardarUniformes","#eventoUniformes");
        cerrarSelectorDesarrollo("#cerrarUniformes","#eventoUniformes");
        cerrarSelectorDesarrollo("#guardarIndumentariaPApoyo","#eventoIndumentaria");
        cerrarSelectorDesarrollo("#cerrarIndumentariaPApoyo","#eventoIndumentaria");

        cerrarSelectorDesarrollo("#cerrarTransporteDeporte","#eventoTransporteDeporte");
        cerrarSelectorDesarrollo("#guardarTransporteDeporte","#eventoTransporteDeporte");
        cerrarSelectorDesarrollo("#cerrarTransporteProvincia","#eventoTransporteProvincia");
        cerrarSelectorDesarrollo("#guardarTransporteProvincia","#eventoTransporteProvincia");

        cerrarSelectorDesarrollo("#guardarBonoDeportivoJN","#eventoBonoDeportivoJN");
        cerrarSelectorDesarrollo("#btnCerrarNuevoBonoDeportivoJN","#eventoBonoDeportivoJN");

        cerrarSelectorDesarrollo("#cerrarAdecentamiento","#selectEventoAdecentamiento");
        cerrarSelectorDesarrollo("#guardarAdecentamiento","#selectEventoAdecentamiento");
        cerrarSelectorDesarrollo("#cerrarBienes","#selectEventoBienes");
        cerrarSelectorDesarrollo("#guardarBienes","#selectEventoBienes");
        cerrarSelectorDesarrollo("#cerrarMedicinas","#selectEventoMedicinas");
        cerrarSelectorDesarrollo("#guardarMedicinas","#selectEventoMedicinas");
        cerrarSelectorDesarrollo("#cerrarAlqEquipos","#selectEventoAlqEquipos");
        cerrarSelectorDesarrollo("#guardarAlqEquipos","#selectEventoAlqEquipos");
        cerrarSelectorDesarrollo("#cerrarComEquipos","#selectEventoComEquipos");
        cerrarSelectorDesarrollo("#guardarComEquipos","#selectEventoComEquipos");
        cerrarSelectorDesarrollo("#cerrarLogEventos","#selectEventoLogEvento");
        cerrarSelectorDesarrollo("#guardarLogEventos","#selectEventoLogEvento");
        cerrarSelectorDesarrollo("#cerrarPublicidad","#selectEventoPublicidad");
        cerrarSelectorDesarrollo("#guardarPublicidad","#selectEventoPublicidad");
        cerrarSelectorDesarrollo("#cerrarAcreditaciones","#selectEventoAcreditaciones");
        cerrarSelectorDesarrollo("#guardarAcreditaciones","#selectEventoAcreditaciones");

        cerrarSelectorDesarrollo("#guardarMedallasJN","#eventoMedallasJN");
        cerrarSelectorDesarrollo("#btnCerrarNuevoDesarrolloJN","#eventoMedallasJN");
      
        cerrarSelectorDesarrollo("#btnCerrarPasajesAereos","#eventoPasajesAereosJN");
        cerrarSelectorDesarrollo("#guardarDatosPasajesAereos","#eventoPasajesAereosJN");

        cerrarSelectorDesarrollo("#guardarDatosPTC","#eventoPTCJN");
        cerrarSelectorDesarrollo("#btnCerrarPTC","#eventoPTCJN");

        cerrarSelectorDesarrollo("#guardarSeguroDeporte","#eventoSeguroDeporte");
        cerrarSelectorDesarrollo("#cerrarSeguroDeporte","#eventoSeguroDeporte");
        cerrarSelectorDesarrollo("#guardarSeguroProvincia","#eventoSeguroProvincia");
        cerrarSelectorDesarrollo("#cerrarSeguroProvincia","#eventoSeguroProvincia");


        cerrarSelectorDesarrollo("#btnCerrarNuevoDesarrolloJN","#categoriaDesarrolloJN");
        cerrarSelectorDesarrollo("#guardarEventosNacionales","#categoriaDesarrolloJN");
        cerrarSelectorDesarrollo("#btnCerrarNuevoDesarrolloJN","#DeporteMedallaJN");
        cerrarSelectorDesarrollo("#btnNuevoBonoDeportivoJN","#DeporteBonoDeportivoJN");
        
        cerrarSelectorDesarrollo("#guardarMedallasJN","#DeporteMedallaJN");
        cerrarSelectorDesarrollo("#guardarBonoDeportivoJN","#DeporteBonoDeportivoJN");

        cerrarSelectorDesarrollo("#cerrarHospAlimDI","#eventoHospAlimDI");
        cerrarSelectorDesarrollo("#guardarHospAlimDI","#eventoHospAlimDI");
        cerrarSelectorDesarrollo("#cerrarHospAlimDC","#eventoHospAlimDC");
        cerrarSelectorDesarrollo("#guardarHospAlimDC","#eventoHospAlimDC");
        cerrarSelectorDesarrollo("#cerrarHospAlimJA","#eventoHospAlimJA");
        cerrarSelectorDesarrollo("#guardarHospAlimJA","#eventoHospAlimJA");
        cerrarSelectorDesarrollo("#cerrarHidratacionDI","#eventoHidratacionDI");
        cerrarSelectorDesarrollo("#guardarHidratacionDI","#eventoHidratacionDI");
        cerrarSelectorDesarrollo("#cerrarHidratacionDC","#eventoHidratacionDC");
        cerrarSelectorDesarrollo("#guardarHidratacionDC","#eventoHidratacionDC");
        cerrarSelectorDesarrollo("#cerrarHidratacionJA","#eventoHidratacionJA");
        cerrarSelectorDesarrollo("#guardarHidratacionJA","#eventoHidratacionJA");


        cerrarSelectorDesarrollo("#cerrarAdecentamiento","#itemAdecentamiento");
        cerrarSelectorDesarrollo("#guardarAdecentamiento","#itemAdecentamiento");
        cerrarSelectorDesarrollo("#cerrarBienes","#itemBienes");
        cerrarSelectorDesarrollo("#guardarBienes","#itemBienes");
        cerrarSelectorDesarrollo("#cerrarMedicinas","#itemMedicinas");
        cerrarSelectorDesarrollo("#guardarMedicinas","#itemMedicinas");
        cerrarSelectorDesarrollo("#cerrarAlqEquipos","#itemAlqEquipos");
        cerrarSelectorDesarrollo("#guardarAlqEquipos","#itemAlqEquipos");
        cerrarSelectorDesarrollo("#cerrarComEquipos","#itemComEquipos");
        cerrarSelectorDesarrollo("#guardarComEquipos","#itemComEquipos");
        cerrarSelectorDesarrollo("#cerrarLogEventos","#itemLogEventos");
        cerrarSelectorDesarrollo("#guardarLogEventos","#itemLogEventos");
        cerrarSelectorDesarrollo("#cerrarPublicidad","#itemPublicidad");
        cerrarSelectorDesarrollo("#guardarPublicidad","#itemPublicidad");
        cerrarSelectorDesarrollo("#cerrarAcreditaciones","#itemAcreditaciones");
        cerrarSelectorDesarrollo("#guardarAcreditaciones","#itemAcreditaciones");
        cerrarSelectorDesarrollo("#cerrarSeguroDeporte","#selectorSeguroDeporte");
        cerrarSelectorDesarrollo("#guardarSeguroDeporte","#selectorSeguroDeporte");
        cerrarSelectorDesarrollo("#cerrarSeguroProvincia","#selectorSeguroProvincia");
        cerrarSelectorDesarrollo("#guardarSeguroProvincia","#selectorSeguroProvincia");
        cerrarSelectorDesarrollo("#cerrarTransporteProvincia","#selectorTransporteProvincia");
        cerrarSelectorDesarrollo("#guardarTransporteProvincia","#selectorTransporteProvincia");
        cerrarSelectorDesarrollo("#cerrarTransporteDeporte","#selectorTransporteDeporte");
        cerrarSelectorDesarrollo("#guardarTransporteDeporte","#selectorTransporteDeporte");

        cerrarSelectorDesarrollo("#cerrarHospAlimDI","#deporteHospAlimDI");
        cerrarSelectorDesarrollo("#guardarHospAlimDI","#deporteHospAlimDI");
        cerrarSelectorDesarrollo("#cerrarHospAlimDC","#deporteHospAlimDC");
        cerrarSelectorDesarrollo("#guardarHospAlimDC","#deporteHospAlimDC");
        cerrarSelectorDesarrollo("#cerrarHidratacionDI","#deporteHidratacionDI");
        cerrarSelectorDesarrollo("#guardarHidratacionDI","#deporteHidratacionDI");
        cerrarSelectorDesarrollo("#cerrarHidratacionDC","#deporteHidratacionDC");
        cerrarSelectorDesarrollo("#guardarHidratacionDC","#deporteHidratacionDC");
        cerrarSelectorDesarrollo("#btnCerrarPTC","#idSelectDeportePTC");
        cerrarSelectorDesarrollo("#guardarDatosPTC","#idSelectDeportePTC");
        cerrarSelectorDesarrollo("#btnCerrarPasajesAereos","#idSelectDeportePasajesAereos");
        cerrarSelectorDesarrollo("#guardarDatosPTC","#idSelectDeportePasajesAereos");
        cerrarSelectorDesarrollo("#guardarUniformes","#deporteUniformes");
        cerrarSelectorDesarrollo("#cerrarUniformes","#deporteUniformes");
        cerrarSelectorDesarrollo("#guardarIndumentariaPApoyo","#deporteIndumentariaPApoyo");
        cerrarSelectorDesarrollo("#cerrarIndumentariaPApoyo","#deporteIndumentariaPApoyo");
        
        cerrarbtnNuevoJN("#btnCerrarNuevoDesarrolloJN");
        mostrarbtnEnviarPaid("#verReportePaidGeneral");
      
        cerrarbtnSelectorDesarrollo("#CerrarSelectorItemDesarrollo","#DivSelectorItemsRubrosDesarrollo","#SelectorItemRubroDesarrollo","#DivTablaItemsRubrosDesarrollo","#TablaItemsRubrosDesarrollo");
        ocultarVariables2Desarrollo($("#agregarItemsRubrosDesarrollo"),$("#DivTablaItemsRubrosDesarrollo"),$("#DivSelectorItemsRubrosDesarrollo"));
        ocultarVariables2Desarrollo($("#verItemsRubrosDesarrollo"),$("#DivSelectorItemsRubrosDesarrollo"),$("#DivTablaItemsRubrosDesarrollo"));

        

        limitarInputDateaIngresoActual("#fechaInicioJN");
        limitarInputDateaIngresoActual("#fechaFinJN");


        ocultarBtnDesarrollo($("#guardarEventosNacionales"),$("#btnNuevoDesarrolloJN")); 
        

        

        

        
   
        
    });

  
    
});
