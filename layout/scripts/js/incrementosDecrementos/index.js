$(document).ready(function () {

    
    $.getScript("layout/scripts/js/incrementosDecrementos/selector.js",function(){

        actividades__selector__incrementos($("#actividades__incremento__od"));

        items__selector__incrementos($("#actividades__incremento__od"), $("#items__incrementos__od"),$("#eventos_intervencion_od"),$("#infraestructura_od"));

        item_presupuestario_o__meses__autocompletados__incrementos($("#items__incrementos__od"),$("#meses_incrementos"),$("#idOrganismoPrincipal").val(),"otros");

        agregarValores__Tabla__incrementos($("#items__incrementos__od"),$("#valores__Incrementos__Meses__script"));

        valoresEventos__select("#eventos_intervencion_od");

        valoresHonorarios__select("#honorarios_od");

        sumaTotalDatos__Base($(".valoresBase__In"));
        
        guardar__incrementos__tramites($("#guardarIncrementos__OD__"),"incrementos_guardar_tramite",[$("#actividades__incremento__od"),$("#eventos_intervencion_od"), $("#infraestructura_od"), $("#items__incrementos__od"),$("#codigo__presupuestarios__incrementos"),$("#incrementos_justificacion"),$("#documento__justificacion__incremento"),$("#tipoTramite")]);

    });

    

    $.getScript("layout/scripts/js/incrementosDecrementos/datatablets.js",function(){
        var variableFront = $("#filesFrontend").val();

        datatablets__tramite__incrementos__v($("#incrementos_Tramites_Guardados__OD"),"incrementos_Tramites_Guardados_OD_",variableFront);

        let identificador = $("#identificador__pagina").val();

        if(identificador == "incremento"){
            datatablets__funcio__repor__incrementos__v__1($("#asignarPresupuestoMo__incrementos__v__1"), "asignarPresupuestoMo__incrementos__v__1", "seguimiento");
        }else if(identificador == "decremento"){
            datatablets__funcio__repor__incrementos__v__1($("#asignarPresupuestoMo__incrementos__v__1"), "asignarPresupuestoMo__decrementos__v__1", "seguimiento");
        }
        


        datatablets__Incrementos__reasignacion($("#reasignacion__Incremento"),"reasignacion__Incremento");

        datatablets__Incrementos__recomendacion($("#recomendacion__Incremento__Revisores"),"recomendacion__Incremento__Revisores");
        

        var variableBack = $("#filesFrontend").val();
        datatablets__funcio__repor__incrementos__v__2__aprobados($("#asignarPresupuestoMo__revisor__v__1__aprobados"),"asignarPresupuestoMo__revisor__v__1__aprobados","seguimiento",variableBack);

        datatablets__notifica__incrementos__v__1($("#notificacionIncrementoDecremento__v1__"),"notificacionIncrementoDecremento__v1__","seguimiento",variableBack);

        datatablets__funcio__repor__incrementos__v__2($("#asignarPresupuestoMo__revisor__v__1"),"asignarPresupuestoMo__revisor__v__1","seguimiento");

        datatablets__recomendados__CoordinacionDireccion__Planificacion($("#incrementos_Subir_Resolucion_Pla"),"recomendacion_Coordinador_Director_Planificacion");

        datatablets__recorridoTramites__Incrementos($("#recorridoIncrementos__tramites"),"recorridoIncrementos__tramites")
    });

    $.getScript("layout/scripts/js/incrementosDecrementos/metodos.js",function(){

        let identificador = $("#identificador__pagina").val();

        if(identificador == "incremento"){
            guardar__incrementos($("#ingrementarValoGuardar"), "incrementos__guardar", [$("#idOrganismo__m"), $("#montoIngresadoModificacion__incrementos"), $("#total__Incrementos_M_"), $("#montoTotal__Modificacion__incrementos")]);

	        guardar__envioNotifica($("#envioIncrementoNotificacion"), "incrementos__guardar__notificacion", [$("#idOrganismo__m__"), $("#fileSubidaNotifica"), $("#montoIngresadoModificacion__incrementos_N"), $("#total__Incrementos_M_N")]);

        }else if(identificador == "decremento"){
            
            guardar__decrementos($("#ingrementarValoGuardar"), "decrementos__guardar", [$("#idOrganismo__m"), $("#montoIngresadoModificacion__incrementos"), $("#total__Incrementos_M_"), $("#montoTotal__Modificacion__incrementos")]);

	        guardar__envioNotificaD($("#envioIncrementoNotificacion"), "incrementos__guardar__notificacion", [$("#idOrganismo__m__"), $("#fileSubidaNotifica"), $("#montoIngresadoModificacion__incrementos_N"), $("#total__Incrementos_M_N")]);
        }

    
        envio__incrementos($("#enviarFinalTramiteIncremento"), "envioOrganismoDeportivo", [$("#idOrganismo_S"),$("#tipoTramite")]);
        
        guardar__incrementos__revisores($("#guardarResolucion__incrementos"),"incrementos__guardar__resolucion",[$("#idOrganismo__m__n"),$("#resolucionSubidas"),$("#resolucionSubidas__fecha")]);

        activar_boton_envioTramite($("#enviarFinalTramiteIncremento"));

        bloquear_Guardar_Tramites($("#guardarIncrementos__OD__"));

        verificar__Pdf__Tamanio($("#documento__justificacion__incremento"));

        verificar__Pdf__Tamanio($("#fileSubidaNotifica"));
        
        verificar__Pdf__Tamanio($("#resolucionSubidas"));

        ocultarSeccionesModal($(".ocultos_incrementos"));
        ocultarSeccionesModal($(".ocultos_incrementosOb"));
        ocultarSeccionesModal($(".ocultos_incrementosO"));

        quitarBotonEnvio($("#enviarFinalTramiteIncremento"));

        Agregar_Fila_Tablas($("#agregarNombreBeneficiarios"),$("#tablaNombresBeneficiarios tbody"),3,["","solo__numero__montos","",""],["nombresB","cedulaB","cargoB","tipoB"]);

        EliminarFilaTabla($("#tablaNombresBeneficiarios"));

        Agregar_Fila_Tablas($("#agregar__beneficiarios"),$("#tablaRangosBeneficiarios tbody"),9,["solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos","solo__numero__montos"],["desdeEdad","hastaEdad","masculino","femenino","mestizo","montubio","indigena","blanco","afro","total"]);

        EliminarFilaTabla($("#tablaRangosBeneficiarios"));


        Agregar_Fila_Tablas($("#agregar__beneficiariosIndirectos"),$("#tablaBeneficiariosIndirectos tbody"),2,["","solo__numero__montos",""],["indirecto","totalI","justificacion"]);

        EliminarFilaTabla($("#tablaBeneficiariosIndirectos"));

        Agregar_Fila_Tablas($("#agregarMantenimiento"),$("#tablaMantenimiento tbody"),2,["","","solo__numero__montos"],["actividadM","periodicidadM","costoM"]);

        EliminarFilaTabla($("#tablaMantenimiento"));

        verTablaIncrementosPoa($("#verTablaIncrementos"),$("#contenedorTablaTramitesIncrementos"));

        activarBotonObservacionesOrganismo($("#contenedorObservaciones"),$("#contenedorObservacionesTabla"));

        setTimeout(function () {
            envioSubsanacionObservacionesOrganismo($("#observacionesSubOd"));
        }, 3000);

        cerrarModales();

        agregarSelectReasignacionRecomendacion($("#contenedorReasignaciones"),$("#identificadorPaginaRevisor"));

        
    });
    
    $('#ver__TramitesIncrementos_G').click(function() {
        $.getScript("layout/scripts/js/incrementosDecrementos/datatablets.js", function() {
            
            var parametro1 = "ver__Tramites__incrementos__v2_";
            var identificador = "ver__Tramites__incrementos__v2";
            var idOrganismo = $("#idOrganismo__m__n").val();
            var variableFront = $("#filesFrontend").val();

            funcion__Traer__Datatablets("#ver__Tramites__incrementos__v2_L",identificador,idOrganismo,variableFront)
        });
    });

});
