$(document).ready(function () {

    
    $.getScript("layout/scripts/js/validacionBasica.js",function(){

        


    });




    $.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatables2.js",function(){

       // datatableSeguimientoRegistro($("#mostrado_jurisdicion_zonales"),"mostrar_datos_jurisdiccion");

        //datatableSeguimientoJurisdiccion($(".datos_juridiccion"),$("#organismoIdPrin").val(),$("#idIndicadores"),"mostrar__jurisdiccion__seguimiento__2023");

       // datatabletsSeguimientoCompleto($("#mostrado_jurisdicion_zonales"),"mostrar_datos_jurisdiccion");
	

    });




    $.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/inserciones.js",function(){

        guardar_estado_cuenta2023($("#guardar_estado_cuenta"),$(".obligatorios_estado_cuenta"),$("#estado_cuenta"));
        guardar_estado_cuenta_indicadores2023($("#guardar_estado_cuenta_indicadores"),$(".obligatorios_estado_cuenta_indicadores"),$("#estado_cuenta_indicadores"));
        guardar__declaracion_recursos_publicos($("#guardar_declaracion_rp"),$(".obligatorios_declaracion_rp"),$("#declaracion_rp"));
        guardar__declaracion_contratacion_publica($("#guardar_declaracion_cp"),$(".obligatorios_declaracion_cp"),$("#declaracion_cp"));

        enviarCorreo($("#guardar_"));

    });


    
    $.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/eliminaciones.js",function(){
        
        
    });



    $.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/actualizaciones.js",function(){
        
     

    });




   $.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/selector.js",function(){


    indicadores__seguimientos2023($(".body__indicadores__tablas"),$("#organismoIdPrin").val(),$("#idIndicadores2023"),"mostrar__indicadores__seguimiento__2023",$('#trimestreEvaluador').val());
    sueldos__salarios__seguimientos2023($(".body__sueldos__salarios__tablas"),$("#organismoIdPrin").val(),$("#idSueldosS2023"),$(".contenedor__pestanas"),$("#trimestreEvaluador").val());	
    
    mantenimiento__capacitacion_PRESUPUESTARIO($(".body__capacitacion__tablas"),$("#organismoIdPrin").val(),$("#idCapacitacionS2023"),$(".contenedor__pestanas__capacitacion__tecnicos"),$("#trimestreEvaluador").val());			
    actividades__deportivas__competencia_PRESUPUESTARIO($(".body__competencia__tablas"),$("#organismoIdPrin").val(),$("#idCompetenciaS2023"),$(".contenedor__pestanas__competencia"),$("#trimestreEvaluador").val());				
    mantenimiento__seguimientos_PRESUPUESTARIO($(".body__mantenimiento__tablas"),$("#organismoIdPrin").val(),$("#idMantenimientoS2023"),$(".contenedor__pestanas__mantenimientos"),$("#trimestreEvaluador").val());			
	recreativo__checkeds_PRESUPUESTARIO($(".body__recreativo__tablas"),$("#organismoIdPrin").val(),$("#idRecreativaS2023"),$(".contenedor__pestanas__recreativo"),$("#trimestreEvaluador").val());			
    administrativas__seguimientos_PRESUPUESTARIO($(".body__adminsitrativas__tablas"),$("#organismoIdPrin").val(),$("#idAdministrativoS2023"),$(".contenedor__pestanas__administrativas"),$("#trimestreEvaluador").val());			
    
    implementacion__checkeds_TECNICO($(".body__implementacion__tablas"),$("#organismoIdPrin").val(),$("#idImplementacionS2023"),$(".contenedor__pestanas__implementacion"),$("#trimestreEvaluador").val());			
    honorarios__seguimientos_TECNICO($(".body__honorarios__tablas"),$("#organismoIdPrin").val(),$("#idHonorariosS2023"),$(".contenedor__pestanas__honorarios"),$("#trimestreEvaluador").val());			
    mantenimiento__seguimientos__tecnicos($(".body__mantenimiento__tecnicos__tablas"),$("#organismoIdPrin").val(),$("#idMantenimientoTecnicoS2023"),$(".contenedor__pestanas__mantenimientos__tecnicos"),$("#trimestreEvaluador").val());		
    capacitacion__alto_TECNICO($(".body__competencia__alto__tablas"),$("#organismoIdPrin").val(),$("#idCompetencia__altoRenS2023"),$(".contenedor__pestanas__competencia__alto"),$("#trimestreEvaluador").val());		
	mantenimiento__capacitacion__tecnico($(".body__capacitacion__tecnica__tablas"),$("#organismoIdPrin").val(),$("#idCapacitacionTecnicoS2023"),$(".contenedor__pestanas__capacitacion__tecnicos__tecnicos"),$("#trimestreEvaluador").val());			
    capacitacion__formativo_TECNICO($(".body__competencia__formativa__tablas"),$("#organismoIdPrin").val(),$("#idCompetencia__FormativaS2023"),$(".contenedor__pestanas__competencia__formativas"),$("#trimestreEvaluador").val());		
	recreativo__tecnicos($(".body__recreativo__tecnico__tablas"),$("#organismoIdPrin").val(),$("#idRecreativaTecnicoS2023"),$(".contenedor__pestanas__tecnico__recreativo"),$("#trimestreEvaluador").val());		

    guardar_zonales_juridicciones($(".obligatorios_seleccionar_zonal"),"paid","checkeds__seleccionables");
   
    visores_actividades_seguimiento2023($("#idAdministrativoME2023"),$(".cuerpo__administrativo__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'administrativo__seguimientos__tablas');
    
    visores_actividades_seguimiento2023($("#idCapacitacionME2023"),$(".cuerpo__capacitacion__vs"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'capacitacion__seguimiento__tablas__ms');
    visores_actividades_seguimiento2023($("#idCompetenciaME2023"),$(".cuerpo__competencia__administrativos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'competencia__seguimientos__tablas');
    visores_actividades_seguimiento2023($("#idImplementacionME2023"),$(".cuerpo__competencia__implementaciones"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'competencia__implementacion__tablas');
    visores_actividades_seguimiento2023($("#idRecreativaME2023"),$(".cuerpo__recreativo__segumientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__seguimiento__tablas');
    
    visores_actividades_seguimiento2023($("#idMantenimientoME2023"),$(".cuerpo__mantenimiento__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'mantenimiento__seguimientos__tablas');
    visores_actividades_seguimiento2023($("#idhonorariosME2023"),$(".cuerpo__honorarios__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'honorarios__seguimientos__tablas');
    visores_actividades_seguimiento2023($("#idSueldosME2023"),$(".cuerpo__sueldos__slaraios__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'sueldos__seguimientos__tablas');
    visores_actividades_seguimiento2023($("#idCompetencia__formativaME2023"),$(".cuerpo__formativos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__formativo__seguimiento');

    visores_actividades_seguimiento2023($("#idCapacitacionTecnicoME2023"),$(".cuerpo__capacitacion"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'capacitacion__seguimiento__tablas');
    visores_actividades_seguimiento2023($("#idMantenimientoTecnicoME2023"),$(".cuerpo__mantenimiento__tecnicos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'mantenimiento__tecnicos__seguimiento__tablas');
    visores_actividades_seguimiento2023($("#idCompetencia__altoRenME2023"),$(".cuerpo__altos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__altos__seguimiento');
    visores_actividades_seguimiento2023($("#idRecreativaTecnicoME2023"),$(".cuerpo__recreacion"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreacion__seguimiento__tablas');

    });



    $.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/metodos2.js",function(){

        indicadores__funcionales_estado_cuenta($(".body__indicadores__tablas1"),$("#organismoIdPrin").val(),$("#idIndicadores_estadoCuenta2023"),"mostrar__indicadores__seguimiento__2023",$('#trimestreEvaluador').val());
	
	
        visualizarOpcionesCambiar($("#tipo__cambiosSeguimientos"),$(".contenidos__formularios__enviados2023"));

        funcion_click_boton_datatable_EditarContratcion("#contratcionActividadAdministrativo","divcontratcionActividades","#idTituloModalContratacion","Editar Contratacion Administracion","tablaContratacionAdministracion","tbodyContratacionAdministracion",["Código Ítem","Nombre Ítem","Estado Contratación","Justificación","Acciones"],"listar_estado_contratacion_seguimiento",$("#trimestreEvaluador").val(),"1");
        funcion_click_boton_datatable_EditarContratcion("#contratcionActividadesImplementacion","divcontratcionActividades","#idTituloModalContratacion","Editar Contratacion Implementación","tablaContratacionAdministracion","tbodyContratacionAdministracion",["Código Ítem","Nombre Ítem","Estado Contratación","Justificación","Acciones"],"listar_estado_contratacion_seguimiento",$("#trimestreEvaluador").val(),"7");
        funcion_click_boton_datatable_EditarContratcion("#contratcionActividadesRecreativo","divcontratcionActividades","#idTituloModalContratacion","Editar Contratacion Recreativo","tablaContratacionAdministracion","tbodyContratacionAdministracion",["Código Ítem","Nombre Ítem","Estado Contratación","Justificación","Acciones"],"listar_estado_contratacion_seguimiento",$("#trimestreEvaluador").val(),"6");
        funcion_click_boton_datatable_EditarContratcion("#contratcionActividadesCompetencia","divcontratcionActividades","#idTituloModalContratacion","Editar Contratacion Competencia","tablaContratacionAdministracion","tbodyContratacionAdministracion",["Código Ítem","Nombre Ítem","Estado Contratación","Justificación","Acciones"],"listar_estado_contratacion_seguimiento",$("#trimestreEvaluador").val(),"5");
        funcion_click_boton_datatable_EditarContratcion("#contratcionActividadesCapacitacion","divcontratcionActividades","#idTituloModalContratacion","Editar Contratacion Capacitación","tablaContratacionAdministracion","tbodyContratacionAdministracion",["Código Ítem","Nombre Ítem","Estado Contratación","Justificación","Acciones"],"listar_estado_contratacion_seguimiento",$("#trimestreEvaluador").val(),"3");
        funcion_click_boton_datatable_EditarContratcion("#contratcionActividadesMantenimiento","divcontratcionActividades","#idTituloModalContratacion","Editar Contratacion Mantenimiento","tablaContratacionAdministracion","tbodyContratacionAdministracion",["Código Ítem","Nombre Ítem","Estado Contratación","Justificación","Acciones"],"listar_estado_contratacion_seguimiento",$("#trimestreEvaluador").val(),"2");

        funcion_click_boton_datatable_Implementacion_Presupuestario(".cuerpo__competencia__implementaciones","a.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Implementacion","facturasImplementacion","tbodyFacturaImplementacion",["Código Ítem","Nombre Ítem","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"competencia__implementacion__tablas",$("#filesFrontend").val()+"seguimiento/facturasMantenimiento/")
        funcion_click_boton_datatable_Implementacion_Presupuestario(".cuerpo__competencia__implementaciones","a.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Implementacion","DocumentosImplementacion","tbodyDocumentosImplementacion",["Código Ítem","Nombre Ítem","Documento","Mes","Trimestre","Acciones"],"competencia__implementacion__tablas",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento/")


        funcion_click_boton_datatable_Recreativo_Presupuestario(".cuerpo__recreativo__segumientos","a.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Recreativo","facturasRecreativo","tbodyFacturaRecreativo",["Código Ítem","Nombre Ítem","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"recreativos__seguimiento__tablas",$("#filesFrontend").val()+"seguimiento/facturasMantenimiento/")
        funcion_click_boton_datatable_Recreativo_Presupuestario(".cuerpo__recreativo__segumientos","a.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Recreativo","DocumentosRecreativo","tbodyDocumentosRecreativo",["Código Ítem","Nombre Ítem","Documento","Mes","Trimestre","Acciones"],"recreativos__seguimiento__tablas",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento/")


        funcion_click_boton_datatable_Competencia_Presupuestario(".cuerpo__competencia__administrativos","a.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Competencia","facturasCompetencia","tbodyFacturaCompetencia",["Código Ítem","Nombre Ítem","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"competencia__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/facturasMantenimiento/")
        funcion_click_boton_datatable_Competencia_Presupuestario(".cuerpo__competencia__administrativos","a.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Competencia","DocumentosCompetencia","tbodyDocumentosCompetencia",["Código Ítem","Nombre Ítem","Documento","Mes","Trimestre","Acciones"],"competencia__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento/")

        funcion_click_boton_datatable_Honorarios(".cuerpo__honorarios__seguimientos","a.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Honorarios","facturasHonorarios","tbodyFacturaHonorarios",["Cédula","Nombre","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"honorarios__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/facturasMantenimiento/")
        funcion_click_boton_datatable_Honorarios(".cuerpo__honorarios__seguimientos","a.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Honorarios","DocumentosHonorarios","tbodyDocumentosHonorarios",["Cédula","Nombre","Documento","Mes","Trimestre","Acciones"],"honorarios__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento/")

        funcion_click_boton_datatable_Capacitacion_Presupuestario(".cuerpo__capacitacion__vs","a.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Capacitación","facturasCapacitación","tbodyFacturasCapacitación",["Código Ítem","Nombre Ítem","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"capacitacion__seguimiento__tablas__ms",$("#filesFrontend").val()+"seguimiento/facturasMantenimiento/")
        funcion_click_boton_datatable_Capacitacion_Presupuestario(".cuerpo__capacitacion__vs","a.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Capacitación","DocumentosCapacitación","tbodyDocumentosCapacitación",["Código Ítem","Nombre Ítem","Documento","Mes","Trimestre","Acciones"],"capacitacion__seguimiento__tablas__ms",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento/")


        funcion_click_boton_datatable_Mantenimiento_Presupuestario(".cuerpo__mantenimiento__seguimientos","a.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Mantenimiento","facturasMantenimiento","tbodyFacturasMantenimiento",["Código Ítem","Nombre Ítem","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"mantenimiento__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/facturasMantenimiento/")
        funcion_click_boton_datatable_Mantenimiento_Presupuestario(".cuerpo__mantenimiento__seguimientos","a.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Mantenimiento","DocumentosMantenimiento","tbodyDocumentosMantenimiento",["Código Ítem","Nombre Ítem","Documento","Mes","Trimestre","Acciones"],"mantenimiento__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/otrosMantenimiento/")

        funcion_click_boton_datatable_Administrativo(".cuerpo__administrativo__seguimientos","button.btnFacturas","divDocumentos","#idTituloModalDocumentos","Facturas Administrativo","facturasAdministrativo","tbodyFacturasAdministrativo",["Código Ítem","Nombre Ítem","Documento","Número de factura","Fecha factura","Ruc","Autorización","Monto","Mes","Trimestre","Acciones"],"administrativo__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/facturas__administrativo/")
        funcion_click_boton_datatable_Administrativo(".cuerpo__administrativo__seguimientos","button.btnDocumentos","divDocumentos","#idTituloModalDocumentos","Documentos Administrativos","DocumentosAdministrativo","tbodyDocumentosAdministrativo",["Código Ítem","Nombre Ítem","Documento","Mes","Trimestre","Acciones"],"administrativo__seguimientos__tablas",$("#filesFrontend").val()+"seguimiento/otrosHabilitantes__administrativo/")


        

        cerrarDivsDesarrollo("#cerrarBtnContratacionPublica","#divContratacionPublicaSeguimiento");
        
        agregarDatatablets($("#documentacionGenerada__in"),"seguimiento__documentacionGenerada","Uso_Correcto_Recursos",objetos([2],["enlace"],['documento'],[$("#filesFrontend").val()+"seguimiento/declaracion_recursos_publicos/"],["documento"]),"");
        agregarDatatablets($("#documentacionGenerada__in__final"),"seguimiento__documentacionGenerada__2","Reporte_Trimestral",objetos([2],["enlace"],['documentoSIF'],[$("#filesFrontend").val()+"final__seguimiento/"],["documentoSIF"]),"");

        agregarDatatablets($("#autogestionPoas__in"),"seguimiento__autogestiones","Autogestion","");
        agregarDatatablets($("#administrativo__in"),"seguimiento__administrativas","001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria","","");
        agregarDatatablets($("#indicadores__in"),"seguimiento__indicadores","Indicadores","","");
        agregarDatatablets($("#recreativo__in"),"seguimiento__recreativo","006 - Actividades recreativas - Ejecución presupuestaria","","");
        agregarDatatablets($("#recreativoTec__in"),"seguimiento__recreativoTec","006 - Actividades recreativas - Información técnica","","");
        agregarDatatablets($("#sueldos__in"),"seguimiento__sueldos__salarios","004 - Operación deportiva - Sueldos y salarios","","");
        agregarDatatablets($("#honorarios__in"),"seguimiento__honorarios","004 - Operación deportiva - Honorarios","","");
        agregarDatatablets($("#mantenimiento__in"),"seguimiento__mantenimientos","002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria","","");
        agregarDatatablets($("#mantenimientoTec__in"),"seguimiento__mantenimientosTec","002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica","","");
        agregarDatatablets($("#competencia__in"),"seguimiento__competencia","005 - Eventos de preparación y competencia - Ejecución presupuestaria","","");
        agregarDatatablets($("#competenciaFormativa__in"),"seguimiento__competenciaFor","005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica","","");
        agregarDatatablets($("#implementacion__in"),"seguimiento__implementacion","007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica","","");
        agregarDatatablets($("#competenciaAlto__in"),"seguimiento__competenciaAlto","005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica","","");
        agregarDatatablets($("#capacitacionTec__in"),"seguimiento__capacitacionTecni","003 - Capacitación deportiva o de recreación - Información técnica","","");
        agregarDatatablets($("#capacitacion__in"),"seguimiento__capacitacion","003 - Capacitación deportiva o de recreación - Ejecución presupuestaria","","");     

    
        agregarDatatablets($("#btn_documentacion__Generada__cp"),"dt_seguimiento__documentacionGenerada_cp","Uso_Correcto_Contratacion_Publica",objetos([2],["enlace"],['documentoCP'],[$("#filesFrontend").val()+"seguimiento/declaracion_contratacion_publica/"],["documentoCP"]),"");
    
        
        buscador_datos($("#idSueldosME"),$(".cuerpo__sueldos__slaraios__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'sueldos__seguimientos__tablas',$("#buscar__sueldos"));
        buscador_datos_indicadores($("#indicadoresME"),$(".cuerpo__indicadores__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'indicadores__seguimientos__tablas',$("#buscar__indicador"));
        buscador_datos_Administracion_001($("#administrativoME"),$(".cuerpo__administrativo__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'administrativo__seguimientos__tablas',$("#buscar__administracion_001"));
        buscador_datos_Administracion_001_2($("#administrativoME"),$(".cuerpo__administrativo__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'administrativo__seguimientos__tablas',$("#buscar__administracion_001_2"));
        buscador_datos__mantenimiento_002($("#mantenimientoME"),$(".cuerpo__mantenimiento__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'mantenimiento__seguimientos__tablas',$("#buscar__mantenimiento_002"));
        buscador_datos_mantenimientoTecnico_IT_002($("#mantenimientoTecnicoME"),$(".cuerpo__mantenimiento__tecnicos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'mantenimiento__tecnicos__seguimiento__tablas',$("#buscar__mantenimiento_IT_002"));
        buscador_datos_honorarios($("#honorariosME"),$(".cuerpo__honorarios__seguimientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'honorarios__seguimientos__tablas',$("#buscar__honorarios"));
        buscador_datos_competencia_ep_005($("#competenciaME"),$(".cuerpo__competencia__administrativos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'competencia__seguimientos__tablas',$("#buscar__evento_ep"));
        buscador_datos_competencia_it_005($("#competencia__formativaME"),$(".cuerpo__formativos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__formativo__seguimiento',$("#buscar__competencia_formativa_it"));
        buscador_datos_competencia_altoRen_it_005($("#competencia__altoRenME"),$(".cuerpo__altos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__altos__seguimiento',$("#buscar__competencia__altoRen"));
        buscador_datos_recreativo_EP_006($("#RecreativaME"),$(".cuerpo__recreativo__segumientos"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreativos__seguimiento__tablas',$("#buscar__recreativoEP_006"));
        buscador_datos_recreativo_tecnico_IT_006($("#RecreativaTecnicoME"),$(".cuerpo__recreacion"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'recreacion__seguimiento__tablas',$("#buscar__recreativoIT_006"));
        buscador_datos__implementacion__007($("#implementacionME"),$(".cuerpo__competencia__implementaciones"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'competencia__implementacion__tablas',$("#buscar__recreativo__Implementacion__007"));
        buscador_datos_capacitacion_EP_003($("#cpacitacionME"),$(".cuerpo__capacitacion__vs"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'capacitacion__seguimiento__tablas__ms',$("#buscar__capacitacion_EP_003"));
        buscador_datos_capacitacion_tecnico_IT_003($("#cpacitacionTecnicoME2023"),$(".cuerpo__capacitacion"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'capacitacion__seguimiento__tablas',$("#buscar__capacitacion_tecnico_IT_003"));
        buscador_datos_indicadores_estado_cuenta($("#indicadoresMEindicadoresM_estadoCuenta"),$(".cuerpo__indicadores__seguimientos_estado_cuenta"),$("#organismoIdPrin").val(),$("#trimestreEvaluador").val(),'indicadores__seguimientos__tablas_estado_cuenta',$("#buscar__indicador_estado_cuenta"));

        //buscador_datos($("#sueldosME"),$("#searchInput").attr("id"), $("#sueldos__salarios__seguimientos"));
        

    });


    
});
