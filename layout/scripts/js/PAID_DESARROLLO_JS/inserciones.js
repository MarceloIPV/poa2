var insertar_tabla_rubos_itemDesarrollo = function (boton,identificador) {

    $(boton).click(function (e) {

        let idComponentes = $(this).attr('idcomponentes');
        let idAsignacion = $(this).attr('idAsignacion');
        let idRubros = $(this).attr('idRubros');
        let selectorA=$("#SelectorItemRubroDesarrollo").val();

        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar__items__financieros");
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);
        paqueteDeDatos.append("selector", selectorA);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
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
        

        $("#SelectorItemRubroDesarrollo option").remove(); 

        RecargarRubros__itemsDesarrollo("obtener__rubros__items__inversion",idComponentes,idAsignacion,idRubros,identificador);

        $("#SelectorItemRubroDesarrollo").val("0");


    });

}


var insertar_indicadores_organismo = function (boton) {


        let idComponentes= $(boton).attr('idComponentes');
        let identificador= $(boton).attr('identificador');
        let idIndicadores= $(boton).attr('idIndicadores');

        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar__indicadores_organismo_paid");
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idIndicadores", idIndicadores);
        paqueteDeDatos.append("identificador", identificador);


        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

             if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
				alertify.notify("Registro realizado correctamente", "success", 5, function(){});

            }

        }).catch((error) => {
           
        });
    
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Juegos Nacionales >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_encuentro_activoJN = function (boton) {

    $(boton).click(function (e) {

        
        
        if( parseFloat($("#valorTotal").val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

        combo = document.getElementById("categoriaDesarrolloJN");

        $(this).attr('nomEvento',$("#nomEvento").val());
        $(this).attr('sede',$("#sede").val());
        $(this).attr('istParticipante',$("#istParticipante").val());
        $(this).attr('fechaInicio',$("#fechaInicioJN").val());
        $(this).attr('fechaFin',$("#fechaFinJN").val());
        $(this).attr('nDeporte',$("#nDeporte").val());
        $(this).attr('categoriaDesarrolloJN',combo.options[combo.selectedIndex].text);
        $(this).attr('nDMujeres',$("#nDMujeres").val());
        $(this).attr('nDVarones',$("#nDVarones").val());
        $(this).attr('nEntrenadores',$("#nEntrenadores").val());
        $(this).attr('valorTotal',$("#valorTotal").val());
        $(this).attr('observaciones',$("#observaciones").val());
        
        
        let nomEvento = $(this).attr('nomEvento');
        let sede = $(this).attr('sede');
        let istParticipante = $(this).attr('istParticipante');
        let fechaInicio = $(this).attr('fechaInicio');
        let fechaFin = $(this).attr('fechaFin');
        let nDeporte = $(this).attr('nDeporte');
        let Categoria = $(this).attr('categoriaDesarrolloJN');
        let nDMujeres = $(this).attr('nDMujeres');
        let nDVarones = $(this).attr('nDVarones');
        let nEntrenadores = $(this).attr('nEntrenadores');
        let valorTotal = $(this).attr('valorTotal');
        let observaciones = $(this).attr('observaciones');
        
        
        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar_eventos_juegos_nacionales");
        paqueteDeDatos.append("nomEvento", nomEvento);
        paqueteDeDatos.append("sede", sede);
        paqueteDeDatos.append("istParticipante", istParticipante);
        paqueteDeDatos.append("fechaInicio", fechaInicio);
        paqueteDeDatos.append("fechaFin", fechaFin);
        paqueteDeDatos.append("nDeporte", nDeporte);
        paqueteDeDatos.append("Categoria", Categoria);
        paqueteDeDatos.append("nDMujeres", nDMujeres);
        paqueteDeDatos.append("nDVarones", nDVarones);
        paqueteDeDatos.append("nEntrenadores", nEntrenadores);
        paqueteDeDatos.append("valorTotal", valorTotal);
        paqueteDeDatos.append("observaciones", observaciones);
        
        
        

        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

           
            


            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($("#paidJuegosNacionales"));


            }

        }).catch((error) => {
        
        });

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
                $("#btnNuevoDesarrolloJN").show();
            },function(){} );

        }

        $("#nomEvento").val("");
        $("#sede").val("");
        $("#istParticipante").val("0");
        $("#fechaInicioJN").val("");
        $("#fechaFinJN").val("");
        $("#nDeporte").val("0");
        $("#categoriaDesarrolloJN").val("0");
        $("#nDMujeres").val("0");
        $("#nDVarones").val("0");
        $("#nEntrenadores").val("0");
        $("#valorTotal").val("0");
        $("#observaciones").val("");

    });
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar__contrataciones__publicas_paid_defecto=function(idComponentes,idRubros,idAsignacion,identificador,idItem){

          
    var paqueteDeDatos = new FormData();

    paqueteDeDatos.append('tipo','insertar__tipo__de__contratacion_paid');		

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
        url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
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


var insertar_datos_PAIDEnvio_Desarrollo = function (boton,identificador) {

    $(boton).click(function (e) {

        

        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar__datos__envio__paid");
        paqueteDeDatos.append("identificador", identificador);
        

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
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



//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Medallas Convencionales >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_medallas_convencionalesJN = function (boton,identificador) {

    $(boton).click(function (e) {

       

        if( parseFloat($("#valorTotalMedallas").val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

          

        let item = $("#itemMedallaJN").attr('idItem');
        let deporte = $("#DeporteMedallaJN").val();
        let medallasOro = $("#cantMedallasOro").val();
        let medallasPlata = $("#cantMedallasPlata").val();
        let medallasBronce = $("#cantMedallasBronce").val();
        let cantMedallas = $("#cantMedallasTotal").val();
        let valorUnitario =$("#valorUnitarioMedallas").val();
        let valorTotal =$("#valorTotalMedallas").val();


        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar_medallas_juegos_nacionales");
        paqueteDeDatos.append("item", item);
        paqueteDeDatos.append("deporte", deporte);
        paqueteDeDatos.append("medallasOro", medallasOro);
        paqueteDeDatos.append("medallasPlata", medallasPlata);
        paqueteDeDatos.append("medallasBronce", medallasBronce);
        paqueteDeDatos.append("cantMedallas", cantMedallas);
        paqueteDeDatos.append("valorUnitario", valorUnitario);
        paqueteDeDatos.append("valorTotal", valorTotal);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());
    
        let selectElementE = document.getElementById('eventoMedallasJN');

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
          
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){
        
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($("#paidMedallasJuegosNacionales"));

                AsignarMontoMedallasJN("obtener_valores_medallas");
               
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

            }

        }).catch((error) => {
        
        });
            }else{

                alertify.confirm('Eliminar', 'Debe Seleccionar un Evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }

        
        
        $("#item").val("0");
        $("#DeporteMedallaJN").val("");
        $("#cantMedallasOro").val("0");
        $("#cantMedallasPlata").val("0");
        $("#cantMedallasBronce").val("0");
        $("#valorUnitarioMedallas").val("0");
        $("#cantMedallasTotal").val("0");
        $("#valorTotalMedallas").val("0");

    });
}
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ------------------------------ >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Matrices Generales>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_generales_juegos_nacionales = function (boton,identificador,item,descripcion,cantidad,valorUnitario, valorTotal,nombreTabla,evento) {

    $(boton).click(function (e) {

        

        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo","insertar_matrices_generales_juegos_nacionales");

   

        console.log(item)

        if(!isNaN($("#"+item).val()) == false){
            paqueteDeDatos.append("item",  $("#"+item).attr('idItem'));
        }else{
            let selectElement = document.getElementById(item);

            let selectedOptionValue = selectElement.options[selectElement.selectedIndex].value;
          
            paqueteDeDatos.append("item",  selectedOptionValue);
        }
        
        paqueteDeDatos.append("descripcion", $(descripcion).val());

        if(cantidad==null && valorUnitario==null){
            paqueteDeDatos.append("cantidad", null);
            paqueteDeDatos.append("valorUnitario", null);
            
        }else{
            paqueteDeDatos.append("cantidad", $(cantidad).val());
            paqueteDeDatos.append("valorUnitario", $(valorUnitario).val());
        }
        
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("nombreMatriz",$("#selectPersonalizado").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
          
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){

        
       

        paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());
    
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));

                

                AsignarMatricesAuxiliaresJN("obtener_valores_matrices_auxiliares");
                
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

            }

        }).catch((error) => {
        
        });

            }else{

                alertify.confirm('Eliminar', 'Debe Seleccionar un Evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }
        
        $(descripcion).val("");
        $(cantidad).val("0");
        $(valorUnitario).val("0")
        $(valorTotal).val("0");

    });
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Hosp Alim DI >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_hops_alim = function (boton,identificador, deporte,deporte2, nroCupos,hospAlim, dias, valorTotal, nombreTabla,evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#SelectItemHosp_Alim1").attr('idItem1');
        let item2 = $("#SelectItemHosp_Alim2").attr('idItem2');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val(); 

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_matrices_Hospe_alim");
        paqueteDeDatos.append("item1", item1);
        paqueteDeDatos.append("item2", item2);        
        paqueteDeDatos.append("deporte", $(deporte).val()); 
        if(deporte2 == null){
            paqueteDeDatos.append("deporte2", null);
        }       
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());        
        paqueteDeDatos.append("hospAlim", $(hospAlim).val());        
        paqueteDeDatos.append("dias", $(dias).val());             
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecDIDC").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
                Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");

                Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
              }


        }).catch((error) => {
        
        });

            }else{

                alertify.confirm('Eliminar', 'Debe Seleccionar un Evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }
        $("#item1").val("0");
        $("#item2").val("0");
        $(deporte2).val("");
        $(nroCupos).val("0");
        $(hospAlim).val("0")
        $(dias).val("0")
        $(valorTotal).val("0");

        actualizaDatabletPorID($("#insertar_matrices_Hospe_alim"));

        
    });
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Hosp Alim DC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_hops_alimDC = function (boton,identificador, deporte, deporte2, nroCupos,hospAlim, dias, valorTotal, nombreTabla,evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#SelectItemHosp_AlimDC1").attr('idItem1');
        let item2 = $("#SelectItemHosp_AlimDC2").attr('idItem2');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val(); 


        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_matrices_Hospe_alim");
        paqueteDeDatos.append("item1", item1);
        paqueteDeDatos.append("item2", item2);        
        if(deporte == null){
            paqueteDeDatos.append("deporte", null);
        }      
        paqueteDeDatos.append("deporte2", $(deporte2).val()); 
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());        
        paqueteDeDatos.append("hospAlim", $(hospAlim).val());        
        paqueteDeDatos.append("dias", $(dias).val());             
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecDIDC").val());

       

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

      
        if(selectedOptionValueE !=0){
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
               
                Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");
                Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
            }

        }).catch((error) => {
        
        });

            }else{

                alertify.confirm('Eliminar', 'Debe seleccionar un Evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }
        $("#item1").val("0");
        $("#item2").val("0");
        $(deporte).val("0");
        $(nroCupos).val("0");
        $(hospAlim).val("0")
        $(dias).val("0")
        $(valorTotal).val("0");

        actualizaDatabletPorID($("#insertar_matrices_Hospe_alim"));

    });
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Hidr DI >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_HidDI = function (boton,identificador, deporte, deporte2,nroCupos,hidr, dias, valorTotal, nombreTabla,evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#SelectItemHidratacionDI").attr('idItem');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_matriz_Hid_DI");
        paqueteDeDatos.append("item1", item1);       
        paqueteDeDatos.append("deporte", $(deporte).val());   
        if(deporte2 == null){
            paqueteDeDatos.append("deporte2", null);
        }       
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());        
        paqueteDeDatos.append("hospAlim", $(hidr).val());        
        paqueteDeDatos.append("dias", $(dias).val());             
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecDIDCHI").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));                             
                Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");
                Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
            }

        }).catch((error) => {
        
        });

        }else{

            alertify.confirm('Eliminar', 'Debe Seleccionar un Evento', function() {
            },function(){} );
        }
        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );
        }

        $(deporte).val("");
        $(nroCupos).val("0");
        $(hidr).val("0")
        $(dias).val("0")
        $(valorTotal).val("0");

    });
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Hidr DC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_HidDC = function (boton,identificador, deporte, deporte2, nroCupos,hidr, dias, valorTotal, nombreTabla,evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#SelectItemHidratacionDI").attr('idItem');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_matriz_Hid_DI");
        paqueteDeDatos.append("item1", item1);       
        paqueteDeDatos.append("deporte2", $(deporte2).val()); 
        if(deporte == null){
            paqueteDeDatos.append("deporte", null);
        }       
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());        
        paqueteDeDatos.append("hospAlim", $(hidr).val());        
        paqueteDeDatos.append("dias", $(dias).val());             
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecDIDCHI").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
                Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");
                Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
            }

        }).catch((error) => {
        
        });
            }else{

                alertify.confirm('Eliminar', 'Debe seleccionar un evento', function() {
                },function(){} );
            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );
        }
        $("#item1").val("0");
        $(deporte).val("");
        $(nroCupos).val("0");
        $(hidr).val("0")
        $(dias).val("0")
        $(valorTotal).val("0");

    });
}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion PTC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_personal_tecnico_convensional = function (boton,identificador) {

    $(boton).click(function (e) {

       

        if( parseFloat($("#valorTotalPTC").val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

            let item = $("#itemPTC").attr('idItem');
            let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
            let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();
            let deporte = $("#idSelectDeportePTC").val();
            let jueces = $("#juecesPTC").val();
            let nJueces = $("#nDiasJuecesPTC").val();
            let comision = $("#comisionPTC").val();
            let nComision = $("#nDiasComisionPTC").val();
            let pApoyo =$("#pApoyoPTC").val();
            let nPApoyo =$("#nDiasPApoyoPTC").val();
            let vJueces =$("#vJuecesPTC").val();
            let vComision =$("#vComisionPTC").val();
            let vPApoyo =$("#vApoyoPTC").val();
            let valorTotal =$("#valorTotalPTC").val();
             
            let paqueteDeDatos = new FormData();
            
            paqueteDeDatos.append("tipo","insertar_datos_PTC");
            paqueteDeDatos.append("item", item);            
            paqueteDeDatos.append("deporte", deporte);
            paqueteDeDatos.append("jueces", jueces);
            paqueteDeDatos.append("nJueces", nJueces);
            paqueteDeDatos.append("comision", comision);
            paqueteDeDatos.append("nComision", nComision);
            paqueteDeDatos.append("pApoyo", pApoyo);
            paqueteDeDatos.append("nPApoyo", nPApoyo);
            paqueteDeDatos.append("vJueces", vJueces);
            paqueteDeDatos.append("vComision", vComision);
            paqueteDeDatos.append("vPApoyo", vPApoyo);
            paqueteDeDatos.append("valorTotal", valorTotal);
            paqueteDeDatos.append("identificador", identificador);
            paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
            paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
            
            let selectElementE = document.getElementById('eventoPTCJN');

            let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
            
            paqueteDeDatos.append("evento",  selectedOptionValueE);

            if(selectedOptionValueE !=0){

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

           console.log(response.data.mensaje);

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($("#paidMedallasJuegosNacionales"));
                total_jueces_PTC("obtener_total_jueces_PTC");
                valor_total_PTC("obtener_valor_total_PTC");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
               


            }

        }).catch((error) => {
        
        });
            }else{

                alertify.confirm('Eliminar', 'Debe seleccionar un evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }
        
        $("#item").val("0");
        $("#idSelectDeportePTC").val("");
        $("#juecesPTC").val("0");
        $("#nDiasJuecesPTC").val("0");
        $("#comisionPTC").val("0");
        $("#nDiasComisionPTC").val("0");
        $("#pApoyoPTC").val("0");
        $("#nDiasPApoyoPTC").val("0");
        $("#vJuecesPTC").val("0");
        $("#vComisionPTC").val("0");
        $("#vApoyoPTC").val("0");
        $("#valorTotal").val("0");

        actualizaDatabletPorID($("#paidJuegosNacionalesPTC"));


    });
}



//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Uniformes Adaptado >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_datos_uniformes = function (boton,identificador, deporte, delegaciones, pApoyo, vUnitario, valorTotal, nombreTabla,evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#itemUniformes").attr('idItem');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_datos_deporte_adaptado");
        paqueteDeDatos.append("item1", item1);       
        paqueteDeDatos.append("deporte", $(deporte).val());   
        paqueteDeDatos.append("delegaciones", $(delegaciones).val());   
        if(pApoyo == null){
            paqueteDeDatos.append("pApoyo", null);
        }       
        paqueteDeDatos.append("vUnitario", $(vUnitario).val());            
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecUnifAdaptados").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

      
        if(selectedOptionValueE !=0){
 
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
                total_uniformes_delegaciones("obtener_valor_total_uniformes_delegaciones");
                total_uniformes("obtener_valor_total_uniformes");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
            }

        }).catch((error) => {
        
        });

            }else{

                alertify.confirm('Eliminar', 'Debe seleccionar un Evento', function() {
                },function(){} );
            }
        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );
        }
        $("#item1").val("0");
        $(deporte).val("");
        $(delegaciones).val("");
        $(vUnitario).val("");
        $(valorTotal).val("0");

    });
}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Bono Deportivo >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_bono_deportivo_JN = function (boton,identificador) {

    $(boton).click(function (e) {

       

        if( parseFloat($("#valorTotalBonoDeportivo").val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

          

        let item = $("#itemBonoDeportivoJN").attr('idItem');
        
        let selectElement = document.getElementById("DeporteBonoDeportivoJN");
        let deporte = selectElement.options[selectElement.selectedIndex].value;
       
        let selectElementE = document.getElementById("eventoBonoDeportivoJN");
        let evento = selectElementE.options[selectElementE.selectedIndex].value;


        let nroDias = $("#nroDiasBonoDeportivo").val();
        let totalPersonal = $("#totalPersonalDeporteBonoDeportivo").val();
        let valorBono = $("#valorBonoDiarioBonoDeportivo").val();
        let valorTotal = $("#valorTotalBonoDeportivo").val();
       


        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo","insertar_bono_deportivo_JN");
        paqueteDeDatos.append("item", item);
        paqueteDeDatos.append("deporte", deporte);
        paqueteDeDatos.append("nroDias", nroDias);
        paqueteDeDatos.append("totalPersonal", totalPersonal);
        paqueteDeDatos.append("valorBono", valorBono);
        paqueteDeDatos.append("valorTotal", valorTotal);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idEvento", evento);

        paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());
    
        if(evento != 0){

        
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($("#paidBonoDeportivoJuegosNacionales"));

                AsignarMontoBonoDeportivoJN("obtener_valores_bono_deportivo");

                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")


            }

        }).catch((error) => {
        
        });
       
        }else{

            alertify.confirm('Eliminar', 'Debe Seleccionar un Evento', function() {
            },function(){} );

        }
        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }

    
        $("#DeporteBonoDeportivoJN").val("0");
        $("#nroDiasBonoDeportivo").val("0");
        $("#totalPersonalDeporteBonoDeportivo").val("0");
        $("#valorTotalBonoDeportivo").val("0");

    });
}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Hosp Alim JA >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_hops_alim_JA = function (boton,identificador, deporte,nroCupos,hospAlim, dias, valorTotal, nombreTabla,evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#SelectItemHosp_Alim1").attr('idItem1');
        let item2 = $("#SelectItemHosp_Alim2").attr('idItem2');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val(); 

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_matrices_Hospe_alim");
        paqueteDeDatos.append("item1", item1);
        paqueteDeDatos.append("item2", item2);        
        paqueteDeDatos.append("deporte", $(deporte).val());        
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());        
        paqueteDeDatos.append("hospAlim", $(hospAlim).val());        
        paqueteDeDatos.append("dias", $(dias).val());             
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecDIDC").val());
        
        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){
    

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
                Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");
                Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
            }

        }).catch((error) => {
        
        });
            }else{

                alertify.confirm('Eliminar', 'Debe seleccionar un evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }
        $("#item1").val("0");
        $("#item2").val("0");
        $(deporte).val("");
        $(nroCupos).val("0");
        $(hospAlim).val("0")
        $(dias).val("0")
        $(valorTotal).val("0");

    });
}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Hidr DC JA>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_matrices_HidDC_JA = function (boton,identificador, deporte,nroCupos,hidr, dias, valorTotal, nombreTabla) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#SelectItemHidratacionDI").attr('idItem');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_matriz_Hid_DI");
        paqueteDeDatos.append("item1", item1);       
        paqueteDeDatos.append("deporte", $(deporte).val());        
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());        
        paqueteDeDatos.append("hospAlim", $(hidr).val());        
        paqueteDeDatos.append("dias", $(dias).val());             
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecDIDCHI").val());
        
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
                Hosp_alim_num_total_cupos_DI("obtener_num_total_cupos_HADI");
                Hosp_alim_total_DI("Total_HOSP_ALIM_DI");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
            }

        }).catch((error) => {
        
        });

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );
        }
        $("#item1").val("0");
        $(deporte).val("");
        $(nroCupos).val("0");
        $(hidr).val("0")
        $(dias).val("0")
        $(valorTotal).val("0");

    });
}


/*********************************INSERCION SEGUROS******************************************************+ */
var insertar_matrices_seguro_desarollo = function (boton,identificador,item,deporte,provincia,cantidad,nroCupos,valorUnitario, valorTotal,nombreTabla,evento) {

    $(boton).click(function (e) {

        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo","insertar_seguro_desarrollo");

        

        if(!isNaN($(item).val()) == false){
            paqueteDeDatos.append("item",  $(item).attr('idItem'));
        }else{
            paqueteDeDatos.append("item",  $(item).val());
        }
        
        
        if(deporte==null){
            paqueteDeDatos.append("deporte", null);
            
        }else{

            let selectElement = document.getElementById(deporte);
            let deporteSelect = selectElement.options[selectElement.selectedIndex].value;
            
            paqueteDeDatos.append("deporte", deporteSelect);
        }

        if(provincia==null){
            paqueteDeDatos.append("provincia", null);
            
        }else{
            let selectElement = document.getElementById(provincia);
            let provinciaSelect = selectElement.options[selectElement.selectedIndex].value;
            
            paqueteDeDatos.append("provincia", provinciaSelect);
        }
        

        paqueteDeDatos.append("cantidad", $(cantidad).val());
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());
        paqueteDeDatos.append("valorUnitario", $(valorUnitario).val());
        
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);

        paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

        if(selectedOptionValueE !=0){
    

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));

               
                AsignarValorSeguro("obtener_valores_seguro");

                AsignarMatricesAuxiliaresJN("obtener_valores_matrices_auxiliares");
               
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")


            }

        }).catch((error) => {
        
        });
            }else{

                alertify.confirm('Eliminar', 'Debe Seleccionar un Evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }

        $(deporte).val("0");
        $(provincia).val("0");
        $(cantidad).val("0");
        $(valorUnitario).val("0")
        $(valorTotal).val("0");

    });
}

/*********************************INSERCION Transporte******************************************************+ */
var insertar_matrices_transporte_desarollo = function (boton,identificador,item,deporte,provincia,cantidad,nroCupos,valorUnitario, valorTotal,nombreTabla,evento) {

    $(boton).click(function (e) {

        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo","insertar_transporte_desarrollo");

        if(!isNaN($(item).val()) == false){
            paqueteDeDatos.append("item",  $(item).attr('idItem'));
        }else{
            paqueteDeDatos.append("item",  $(item).val());
        }
        
        
        if(deporte==null){
            paqueteDeDatos.append("deporte", null);
            
        }else{
            let selectElement = document.getElementById(deporte);
            let deporteSelect = selectElement.options[selectElement.selectedIndex].value;
            
            paqueteDeDatos.append("deporte", deporteSelect);
        }

        if(provincia==null){
            paqueteDeDatos.append("provincia", null);
            
        }else{

            let selectElement = document.getElementById(provincia);
            let provinciaSelect = selectElement.options[selectElement.selectedIndex].value;
            
            paqueteDeDatos.append("provincia", provinciaSelect);
            
        }

        

        paqueteDeDatos.append("cantidad", $(cantidad).val());
        paqueteDeDatos.append("nroCupos", $(nroCupos).val());
        paqueteDeDatos.append("valorUnitario", $(valorUnitario).val());
        
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);

        paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());
    
        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

      
        if(selectedOptionValueE !=0){

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));

                AsignarValorTransporte("obtener_valores_transporte");

               
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")


            }

        }).catch((error) => {
        
        });
        }else{

            alertify.confirm('Eliminar', 'Seleccione un Evento', function() {
            },function(){} );

        }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }

        $(deporte).val("0");
        $(provincia).val("0");
        $(cantidad).val("0");
        $(valorUnitario).val("0")
        $(valorTotal).val("0");

    });
}


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion Indumentaria P Apoyo >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
var insertar_datos_indumentario_pApoyo = function (boton,identificador, deporte, delegaciones, pApoyo, vUnitario, valorTotal, nombreTabla, evento) {

    $(boton).click(function (e) {
       
        if( parseFloat($(valorTotal).val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){
            
        let item1 = $("#itemIndumentariaPApoyo").attr('idItem');
        let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
        let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

        let paqueteDeDatos = new FormData();
       
        paqueteDeDatos.append("tipo","insertar_datos_deporte_adaptado");
        paqueteDeDatos.append("item1", item1);       
        paqueteDeDatos.append("deporte", $(deporte).val()); 
        if(delegaciones == null){
            paqueteDeDatos.append("delegaciones", null);
        }       
        paqueteDeDatos.append("pApoyo", $(pApoyo).val());      
        paqueteDeDatos.append("vUnitario", $(vUnitario).val());            
        paqueteDeDatos.append("valorTotal", $(valorTotal).val());
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
        paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
        paqueteDeDatos.append("nombreMatriz",$("#idSelecUnifAdaptados").val());

        let selectElementE = document.getElementById(evento);

        let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
        
        paqueteDeDatos.append("evento",  selectedOptionValueE);

      
        if(selectedOptionValueE !=0){
 
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($(nombreTabla));
                uniformes_num_totalPApoyo("obtener_num_total_PApoyo");
                uniformes_valor_total_PApoyo("obtener_valor_total_PApoyo");
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
                
            }

        }).catch((error) => {
        
        });
        }else{

            alertify.confirm('Eliminar', 'Debe seleccionar un Evento', function() {
            },function(){} );
        }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );
        }
        $("#item1").val("0");
        $(deporte).val("");
        $(pApoyo).val("")
        $(vUnitario).val("0")
        $(valorTotal).val("0");

        actualizaDatabletPorID($("#paidDeporteDelegacionHospAlimJA"))

    });
}



//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insercion PASAJES AEREOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//



var insertar_pasajes_aereos = function (boton,identificador) {

    $(boton).click(function (e) {

       

        if( parseFloat($("#valorTotalPasajesAereos").val()) <=  parseFloat($("#MontoPorAsignarJN").attr("valor"))){

            let item = $("#itemPasajesAereos").attr('idItem');
            let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
            let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();
            let deporte = $("#idSelectDeportePasajesAereos").val();
            let pasajesaereos = $("#pasajesAereos").val();
            let nDeportistas = $("#nDeportistasPasajesAereos").val();
            let nEntrenadores = $("#nEntrenadoresPasajesAereos").val();
            let numTotalPersonas = $("#numeroTotalPersonasPasajesAereos").val();
            let nDias =$("#nDiasPasajesAereos").val();
            let valorTotal =$("#valorTotalPasajesAereos").val();
    
            let paqueteDeDatos = new FormData();
            
            paqueteDeDatos.append("tipo","insertar_datos_pasajes_aereos");
            paqueteDeDatos.append("item", item);            
            paqueteDeDatos.append("deporte", deporte);
            paqueteDeDatos.append("pasajesaereos", pasajesaereos);
            paqueteDeDatos.append("nDeportistas", nDeportistas);
            paqueteDeDatos.append("nEntrenadores", nEntrenadores);
            paqueteDeDatos.append("numTotalPersonas", numTotalPersonas);
            paqueteDeDatos.append("nDias", nDias);;
            paqueteDeDatos.append("valorTotal", valorTotal);
            paqueteDeDatos.append("identificador", identificador);
            paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
            paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);

            let selectElementE = document.getElementById('eventoPasajesAereosJN');

            let selectedOptionValueE = selectElementE.options[selectElementE.selectedIndex].value;
            
            paqueteDeDatos.append("evento",  selectedOptionValueE);

            if(selectedOptionValueE !=0){
        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

           

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($("#paidPasajesAereos"));
                num_deportistas_pasajes_aereos("obtener_num_deportistas_pasaje_aereo");
                num_entrenadores_pasajes_aereos("obtener_num_entrenadores_pasaje_aereo");
                num_total_personas_pasajes_aereos("obtener_num_total_personas_pasaje_aereo");
                valor_total_pasajes_aereos("obtener_valor_total_pasaje_aereo");
                
                AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

            }

        }).catch((error) => {
        
        });
            }else{

                alertify.confirm('Eliminar', 'Debe Seleccionar Un Evento', function() {
                },function(){} );

            }

        }else{

            alertify.confirm('Eliminar', 'No puede Exceder el Monto Asignado', function() {
            },function(){} );

        }
        
        $("#item").val("0");
        $("#idSelectDeportePasajesAereos").val("");
        $("#pasajesAereos").val("0");
        $("#nDeportistasPasajesAereos").val("0");
        $("#nEntrenadoresPasajesAereos").val("0");
        $("#numTotalPersonasPasajesAereos").val("0");
        $("#nDiasPasajesAereos").val("0");
        $("#valorTotalPasajesAereos").val("0");

    });
}



var insertar_eventos_desarrollo = function (boton) {

    $(boton).click(function (e) {

        
            let nombre = $("#nombreEventoDesarrollo").val();
            let nombreSede = $("#nombreSede").val();
            let nombreSubsede = $("#nombreSubsede").val();
            let nroParticipantes = $("#nroParticipantes").val();
            let obj_General = $("#obj_General").val();
            let obj_Especificos =$("#obj_Especificos").val();
            let meta =$("#meta").val();
            
            let fechaInicioEvento = $("#fechaInicioEvento").val();
            let fechaFinEvento = $("#fechaFinEvento").val();
        
            let selectElementD = document.getElementById('idSelectDeporteEventos');
            let deporteSelect = selectElementD.options[selectElementD.selectedIndex].value;
            
            


            let selectElementM = document.getElementById('idSelectDeporteEventos');
            let modalidadSelect = selectElementM.options[selectElementM.selectedIndex].value;
            
           

            let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
            let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();
            
    
            let paqueteDeDatos = new FormData();
            
            paqueteDeDatos.append("tipo","insertar_datos_evento_desarrollo");
            paqueteDeDatos.append("nombre", nombre);            
            paqueteDeDatos.append("nombreSede", nombreSede);
            paqueteDeDatos.append("nombreSubsede", nombreSubsede);
            paqueteDeDatos.append("nroParticipantes", nroParticipantes);
            paqueteDeDatos.append("obj_General", obj_General);
            paqueteDeDatos.append("obj_Especificos", obj_Especificos);
            paqueteDeDatos.append("meta", meta);;
            paqueteDeDatos.append("fechaInicioEvento", fechaInicioEvento);
            paqueteDeDatos.append("fechaFinEvento", fechaFinEvento);
            paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
            paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);
            paqueteDeDatos.append("deporte", deporteSelect);
            paqueteDeDatos.append("modalidad", modalidadSelect);
            
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/inserta.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            
            mensaje =response.data.mensaje;

            if (mensaje==1) {

                alertify.set("notifier","position", "top-center");
                alertify.notify("Registro realizado correctamente", "success", 3, function(){});

                actualizaDatabletPorID($("#paidEventosDesarrollo"));

            }

        }).catch((error) => {
        
        });

        $("#nombreEventoDesarrollo").val("");
        $("#nombreSede").val("");
        $("#nombreSubsede").val("");
        $("#nroParticipantes").val("0");
        $("#obj_General").val("");
        $("#obj_Especificos").val("");
        $("#meta").val("");

        $("#fechaInicioEvento").val("");
        $("#fechaFinEvento").val("");

        
        $("#idSelectDeporteEventos").val("0");
        $("#idSelectModalidadEventos").val("0");
       

    });
}