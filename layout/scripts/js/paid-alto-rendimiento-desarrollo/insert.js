var insertar_tabla_rubos_item = function (boton, identificador) {

    $(boton).click(function (e) {

        var idComponentes = $(this).attr('idComponentes');
        var idAsignacion = $(this).attr('idAsignacion');
        var idRubros = $(this).attr('idRubros');
        var selectorA = $("#SelectorItemRubro").val();

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", "insertar_items_financieros");
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);
        paqueteDeDatos.append("selector", selectorA);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            mensaje = response.data.mensaje;
            if (mensaje == 1) {

                alertify.set("notifier", "position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 5, function () { });
                obtenerRubrosItemsVer();
            }

        }).catch((error) => {

        });

        $("#SelectorItemRubro").val("0");

    });

}

var insertar_indicadores_organismo = function (boton) {


    var idComponentes = $(boton).attr('idComponentes');
    var identificador = $(boton).attr('identificador');
    var idIndicadores = $(boton).attr('idIndicadores');

    var paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", "insertar__indicadores_organismo_paid");
    paqueteDeDatos.append("idComponentes", idComponentes);
    paqueteDeDatos.append("idIndicadores", idIndicadores);
    paqueteDeDatos.append("identificador", identificador);

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        mensaje = response.data.mensaje;

        if (mensaje == 1) {

            alertify.set("notifier", "position", "top-center");
            alertify.notify("Registro realizado correctamente", "success", 5, function () { });

        }

    }).catch((error) => {

    });

}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Eventos >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_datos_eventos = function (boton) {

    $(boton).click(function (e) {
        if (parseFloat($("#valorTotal").val()) <= parseFloat($("#montoPorAsignarEventos").attr("valor"))) {



            combo_deporte = document.getElementById("idSelectDeporte");
            combo_modalidad = document.getElementById("idSelectModalidad");
            combo_categoria = document.getElementById("idSelectCategoria");
            combo_pais = document.getElementById("idSelectpais");
            combo_ciudad = document.getElementById("idSelectCiudad");
            combo_tipoEvento = document.getElementById("idSelecttipoEvento");

            var deporteEV = combo_deporte.options[combo_deporte.selectedIndex].text;
            var modalidadEV = combo_modalidad.options[combo_modalidad.selectedIndex].text;
            var nombresEV = $("#idNombres").val();
            var nombresAtletasEV = $("#idNombresAtletas").val();
            var nombresEntrenadoresEV = $("#idNombresEntOfi").val();
            var categoriaEV = combo_categoria.options[combo_categoria.selectedIndex].text;
            var paisEV = combo_pais.options[combo_pais.selectedIndex].text;
            var ciudadEV = combo_ciudad.options[combo_ciudad.selectedIndex].text;
            var tipoEventoEV = combo_tipoEvento.options[combo_tipoEvento.selectedIndex].text;
            var fechaInicioEV = $("#fechaInicio").val();
            var fechaFinEV = $("#fechaFin").val();
            var numEntrenadoresEV = $("#oficina").val();
            var numAtletasEV = $("#atletas").val();
            var numDiasEV = $("#dias").val();
            var paxEV = $("#pax").val();
            var alojamientoEV = $("#idAlojamiento").val();
            var alimentacionEV = $("#idAlimentacion").val();
            var hidratacioEV = $("#idHidratacion").val();
            var tranporteAereoEV = $("#idTransporteAereo").val();
            var transporteTerresteEV = $("#idTranporteTerrestre").val();
            var bonoDeportivoEV = $("#idBonoDeportivo").val();
            var inscripcionEV = $("#idInscripcion").val();
            var visaEV = $("#idVisa").val();
            var fondoEmergenciaEV = $("#idfondoEmergencia").val();
            var especificosDeporteEV = $("#idEspecificosDeporte").val();
            var valorTotalEV = $("#valorTotal").val();
            var ObservacionesEV = $("#Observaciones").val();
            var JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
            var JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append("tipo", "insertar_datos_eventos_table");
            paqueteDeDatos.append("deporteEV", deporteEV);
            paqueteDeDatos.append("modalidadEV", modalidadEV);
            paqueteDeDatos.append("nombresEV", nombresEV);
            paqueteDeDatos.append("nombresAtletasEV", nombresAtletasEV);
            paqueteDeDatos.append("nombresEntrenadoresEV", nombresEntrenadoresEV);
            paqueteDeDatos.append("categoriaEV", categoriaEV);  
            paqueteDeDatos.append("paisEV", paisEV);
            paqueteDeDatos.append("ciudadEV", ciudadEV);
            paqueteDeDatos.append("tipoEventoEV", tipoEventoEV);
            paqueteDeDatos.append("fechaInicioEV", fechaInicioEV);
            paqueteDeDatos.append("fechaFinEV", fechaFinEV);
            paqueteDeDatos.append("numEntrenadoresEV", numEntrenadoresEV);
            paqueteDeDatos.append("numAtletasEV", numAtletasEV);
            paqueteDeDatos.append("numDiasEV", numDiasEV);
            paqueteDeDatos.append("paxEV", paxEV);
            paqueteDeDatos.append("alojamientoEV", alojamientoEV);
            paqueteDeDatos.append("alimentacionEV", alimentacionEV);
            paqueteDeDatos.append("hidratacioEV", hidratacioEV);
            paqueteDeDatos.append("tranporteAereoEV", tranporteAereoEV);
            paqueteDeDatos.append("transporteTerresteEV", transporteTerresteEV);
            paqueteDeDatos.append("bonoDeportivoEV", bonoDeportivoEV);
            paqueteDeDatos.append("inscripcionEV", inscripcionEV);
            paqueteDeDatos.append("visaEV", visaEV);
            paqueteDeDatos.append("fondoEmergenciaEV", fondoEmergenciaEV);
            paqueteDeDatos.append("especificosDeporteEV", especificosDeporteEV);
            paqueteDeDatos.append("valorTotalEV", valorTotalEV);
            paqueteDeDatos.append("ObservacionesEV", ObservacionesEV);
            paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
            paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);

            axios({
                method: "post",
                url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
                data: paqueteDeDatos,
                headers: { "Content-Type": "multipart/form-data" },
            }).then((response) => {

                mensaje = response.data.mensaje;
                if (mensaje == 1) {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Registro realizado correctamente", "success", 5, function () { });
                    actualizarDatablePorIdAR($("#paidRubrosEventos"));
                    sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Eventos", "MontoAsignadoEventos",".restaDeMontos", "#montoPorAsignarEventos");

                    valor_total_eventos("obtener_valor_Total_Eventos")
                    sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Eventos", "#MontoAsignadoEventos", ".restaDeMontos", "#montoPorAsignarEventos");

                    

                }

            }).catch((error) => {

            });
        } else {

            alertify.confirm('Eliminar', 'No puede exceder el monto', function () {
            }, function () { });
        }

        $("#idSelectDeporte").val("0");
        $("#idSelectModalidad").val("0");
        $("#idNombres").val(" ");
        $("#idNombresAtletas").val(" ");
        $("#idNombresEntOfi").val(" ");
        $("#idSelectPrueba").val("0");
        $("#idSelectCategoria").val("0");
        $("#idSelectpais").val("0");
        $("#idSelectCiudad").val("0");
        $("#idSelecttipoEvento").val("0");
        $("#fechaInicio").val("0");
        $("#fechaFin").val("0");
        $("#oficina").val("0");
        $("#atletas").val("0");
        $("#dias").val("0");
        $("#pax").val("0");
        $("#idAlojamiento").val("0");
        $("#idAlimentacion").val("0");
        $("#idHidratacion").val("0");
        $("#idTransporteAereo").val("0");
        $("#idTranporteTerrestre").val("0");
        $("#idBonoDeportivo").val("0");
        $("#idInscripcion").val("0");
        $("#idVisa").val("0");
        $("#idfondoEmergencia").val("0");
        $("#idEspecificosDeporte").val("0");
        $("#valorTotal").val("0");
        $("#Observaciones").val(" ");

        actualizarDatablePorIdAR($("#paidRubrosEventos"));


    });

}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercio Necesidades Individuales >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//

var insertar_necesidades_individuales = function (boton) {

    $(boton).click(function (e) {
        if (parseFloat($("#valorTotalNecesidadesIndividuales").val()) <= parseFloat($("#MontoPorAsignarNecesidadesIndividuales").attr("valor"))) {

            comboModalidad = document.getElementById("modalidaSelectordNecesidadesIndividuales");
            comboSector = document.getElementById("sectorSelectorNecesidadesIndividuales");

            var modalidad = comboModalidad.options[comboModalidad.selectedIndex].text;
            var articulo = $("#articuloNecesidadesIndividuales").val();
            var nombres = $("#nombresNecesidadesIndividuales").val();
            var apellidos = $("#apellidosNecesidadesIndividuales").val();
            var cantidad = $("#cantidadNecesidadesIndividuales").val();
            var valorInd = $("#valorIndNecesidadesIndividuales").val();
            var valorTotal = $("#valorTotalNecesidadesIndividuales").val();
            var sector = comboSector.options[comboSector.selectedIndex].text;

            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append("tipo", "insertar_necesidades_individuales");
            paqueteDeDatos.append("modalidad", modalidad);
            paqueteDeDatos.append("articulo", articulo);
            paqueteDeDatos.append("nombres", nombres);
            paqueteDeDatos.append("apellidos", apellidos);
            paqueteDeDatos.append("cantidad", cantidad);
            paqueteDeDatos.append("valorInd", valorInd);
            paqueteDeDatos.append("valorTotal", valorTotal);
            paqueteDeDatos.append("sector", sector);
            paqueteDeDatos.append("idRubro",  $("#JuegosNacionalesIDRUBRO").val());
            paqueteDeDatos.append("idComponente",  $("#JuegosNacionalesIDCOMPONENTE").val());

            axios({
                method: "post",
                url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
                data: paqueteDeDatos,
                headers: { "Content-Type": "multipart/form-data" },
            }).then((response) => {

                mensaje = response.data.mensaje;

                if (mensaje == 1) {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Registro realizado correctamente", "success", 5, function () { });

                    sumaRestaMontosRubrosAR("obtener_suma_valorTotal_nece_Individuales","#MontoAsignadoNecesidadesIndividuales",".restaDeMontosNecesidadesInd","#MontoPorAsignarNecesidadesIndividuales");

                }

            }).catch((error) => {

            });
        } else {
            alertify.confirm('Eliminar', 'No puede exceder el monto', function () {
            }, function () { });
        }

        $("#modalidaSelectordNecesidadesIndividuales").val("0");
        $("#articuloNecesidadesIndividuales").val("");
        $("#nombresNecesidadesIndividuales").val("");
        $("#apellidosNecesidadesIndividuales").val("");
        $("#cantidadNecesidadesIndividuales").val("0");
        $("#valorIndNecesidadesIndividuales").val("0");
        $("#valorTotalNecesidadesIndividuales").val("0");
        $("#sectorSelectorNecesidadesIndividuales").val("0");


        actualizaDatabletPorID($("#paidNecesidadesIndividuales1"))

    });
}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Interdiciplinario >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_datos_interdisciplinario = function (boton) {

    $(boton).click(function (e) {
        if (parseFloat($("#valorTotal").val()) <= parseFloat($("#montoPorAsignarInterdisciplinario").attr("valor"))) {


            combo_modalidad_inter = document.getElementById("idSelectModalidadInter");
            combo_sexo_inter = document.getElementById("sexo");
            combo_cargo_inter = document.getElementById("cargo");
            combo_sector_inter = document.getElementById("sector");

            var cedulaEI = $("#cedula").val();
            var modalidadEI = combo_modalidad_inter.options[combo_modalidad_inter.selectedIndex].text;
            var sexoEI = combo_sexo_inter.options[combo_sexo_inter.selectedIndex].text;
            var cargoEI = combo_cargo_inter.options[combo_cargo_inter.selectedIndex].text;
            var nombresEI = $("#nombres").val();
            var apellidosEI = $("#apellidos").val();
            var fechaInicioEI = $("#fechaInicio").val();
            var fechaFinEI = $("#fechaFin").val();
            var valorMesEI = $("#valorMes").val();
            var mesEI = $("#meses").val();
            var valorTotalEI = $("#valorTotal").val();
            var sectorlEI = $("#sector").val();
            var JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
            var JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();


            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append("tipo", "insertar_datos_interdisciplinario_table");
            paqueteDeDatos.append("cedulaEI", cedulaEI);
            paqueteDeDatos.append("modalidadEI", modalidadEI);
            paqueteDeDatos.append("sexoEI", sexoEI);
            paqueteDeDatos.append("cargoEI", cargoEI);
            paqueteDeDatos.append("nombresEI", nombresEI);
            paqueteDeDatos.append("apellidosEI", apellidosEI);
            paqueteDeDatos.append("fechaInicioEI", fechaInicioEI);
            paqueteDeDatos.append("fechaFinEI", fechaFinEI);
            paqueteDeDatos.append("valorMesEI", valorMesEI);
            paqueteDeDatos.append("mesEI", mesEI);
            paqueteDeDatos.append("valorTotalEI", valorTotalEI);
            paqueteDeDatos.append("sectorlEI", sectorlEI);
            paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
            paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);


            axios({
                method: "post",
                url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
                data: paqueteDeDatos,
                headers: { "Content-Type": "multipart/form-data" },
            }).then((response) => {

                mensaje = response.data.mensaje;
                if (mensaje == 1) {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Registro realizado correctamente", "success", 5, function () { });

                    actualizarDatablePorIdAR($("#paidRubrosInterdisciplinario"))
                    sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Interdisciplinario", "MontoAsignadoInterdisciplinario",".restaDeMontosInter", "#montoPorAsignarInterdisciplinario");
                    valor_total_equipo_interdisciplinario("obtener_suma_valorTotal_Equipo_Interdisciplinario");
                    sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Interdisciplinario", "#MontoAsignadoInterdisciplinario", ".restaDeMontosInter", "#montoPorAsignarInterdisciplinario");

                    
                    
                }

            }).catch((error) => {

            });
        } else {

            alertify.confirm('Eliminar', 'No puede exceder el monto', function () {
            }, function () { });
        }

        $("#cedula").val("");
        $("#idSelectModalidadInter").val("0");
        $("#sexo").val("0");
        $("#cargo").val("0");
        $("#nombres").val("");
        $("#apellidos").val("");
        $("#fechaInicio").val("");
        $("#fechaFin").val("");
        $("#valorMes").val("");
        $("#meses").val("");
        $("#valorTotal").val("");
        $("#sector").val("0");

        actualizarDatablePorIdAR($("#paidRubrosInterdisciplinario"))

    });
}


var insertar__contrataciones__publicas_paid_defectoAR=function(idComponentes,idRubros,idAsignacion,identificador,idItem){

          
    var paqueteDeDatos = new FormData();

    paqueteDeDatos.append('tipo','insertar__tipo__de__contratacion_paidAR');		

    var other_data = $('#formulario__tipo__contrataciones').serializeArray();

    $.each(other_data,function(key,input){
        paqueteDeDatos.append(input.name,input.value);
    });

    paqueteDeDatos.append("idComponentes",idComponentes);
    paqueteDeDatos.append("idRubros",idRubros);
    paqueteDeDatos.append("idAsignacion",idAsignacion);
    paqueteDeDatos.append("identificador",identificador);
    paqueteDeDatos.append("idItem",idItem);
  

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {
        
        mensaje =response.data.mensaje;

        if (mensaje==1) {

            alertify.set("notifier","position", "top-center");
            alertify.notify("Registro realizado correctamente", "success", 3, function(){});

        }

    }).catch((error) => {
    
    });

}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Necesidades Generales >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//

var insertar_necesidades_generales = function (boton) {

    $(boton).click(function (e) {

        if( parseFloat($("#valorTotalNecesidadesGenerales").val()) <=  parseFloat($("#MontoPorAsignarNecesidadesGenerales").attr("valor"))){

        comboDeporte = document.getElementById("deporteSelectordNecesidadesGenerales"); 
        comboModalidad = document.getElementById("modalidaSelectordNecesidadesGenerales");
        comboSector = document.getElementById("sectorSelectorNecesidadesGenerales"); 

        var modalidad = comboModalidad.options[comboModalidad.selectedIndex].text;
        var deporte = comboDeporte.options[comboDeporte.selectedIndex].value
        var articulo = $("#articuloNecesidadesGenerales").val();
        var cantidad = $("#cantidadNecesidadesGenerales").val();
        var valorInd = $("#valorIndNecesidadesGenerales").val();
        var valorTotal = $("#valorTotalNecesidadesGenerales").val();
        var sector = comboSector.options[comboSector.selectedIndex].text;
        

        
        var paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar_necesidades_generales");
        paqueteDeDatos.append("modalidad", modalidad);
        paqueteDeDatos.append("articulo", articulo);
        paqueteDeDatos.append("cantidad", cantidad);
        paqueteDeDatos.append("valorInd", valorInd);
        paqueteDeDatos.append("valorTotal", valorTotal);
        paqueteDeDatos.append("sector", sector);
        paqueteDeDatos.append("deporte", deporte);
        paqueteDeDatos.append("idRubro",  $("#JuegosNacionalesIDRUBRO").val());
        paqueteDeDatos.append("idComponente",  $("#JuegosNacionalesIDCOMPONENTE").val());

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 5, function(){});

                sumaRestaMontosRubrosAR("obtener_suma_valorTotal_nece_generales","#MontoAsignadoNecesidadesGenerales",".restaDeMontosNecesidadesGenerales","#MontoPorAsignarNecesidadesGenerales");

            }

        }).catch((error) => {
        
        });

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }

        $("#deporteSelectordNecesidadesGenerales").val("0");
        $("#modalidaSelectordNecesidadesGenerales").val("0");
        $("#articuloNecesidadesGenerales").val("");
        $("#cantidadNecesidadesGenerales").val("0");
        $("#valorIndNecesidadesGenerales").val("0");
        $("#valorTotalNecesidadesGenerales").val("0");
        $("#sectorSelectorNecesidadesGenerales").val("0");
       

        actualizaDatabletPorID($("#paidNecesidadesGenerales_"))

       



    });
}


var insertar_datos_PAIDEnvio_AR = function (boton,identificador) {

    $(boton).click(function (e) {

        

        var paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar__datos__envio__paid");
        paqueteDeDatos.append("identificador", identificador);
        

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/insert.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

             if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 1, function(){});

            }

        }).catch((error) => {
           
        });
        

    });

}




