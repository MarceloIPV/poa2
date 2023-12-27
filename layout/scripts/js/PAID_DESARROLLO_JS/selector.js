var obtenerRubrosItemsVer_Desarrollo = function (tipo,boton1,boton) {

    $(boton).click(function (e){

        let idComponentes=$(boton1).attr('idComponentes');
        let idAsignacion=$(boton1).attr('idAsignacion');
        let idRubros=$(boton1).attr('idRubros');
        let identificador=$(boton1).attr('identificador');

        cerrarbtnDesarrollo($(boton),"#TablaItemsRubrosDesarrollo");

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            var tabla = document.getElementById('TablaItemsRubrosDesarrollo');

            let y=0;
    
            for (z of response.data.informacion) {
            
                var fila = tabla.insertRow();

                var celda1 = fila.insertCell(0);
                var celda2 = fila.insertCell(1);
                var celda3 = fila.insertCell(2);
                var celda4 = fila.insertCell(3);
                var celda5 = fila.insertCell(4);
                var celda6 = fila.insertCell(5);
                var celda7 = fila.insertCell(6);
                var celda8 = fila.insertCell(7);
                var celda9 = fila.insertCell(8);
                var celda10 = fila.insertCell(9);
                var celda11 = fila.insertCell(10);
                var celda12 = fila.insertCell(11);
                var celda13 = fila.insertCell(12);
                var celda14 = fila.insertCell(13);
                var celda15 = fila.insertCell(14);
                var celda16 = fila.insertCell(15);
                var celda17 = fila.insertCell(16);
                var celda18 = fila.insertCell(17);

                celda1.setAttribute('align','center');
                celda2.setAttribute('align','center');
                celda3.setAttribute('align','center');
                celda4.setAttribute('align','center');
                celda5.setAttribute('align','center');
                celda6.setAttribute('align','center');
                celda7.setAttribute('align','center');
                celda8.setAttribute('align','center');
                celda9.setAttribute('align','center');
                celda10.setAttribute('align','center');
                celda11.setAttribute('align','center');
                celda12.setAttribute('align','center');
                celda13.setAttribute('align','center');
                celda14.setAttribute('align','center');
                celda15.setAttribute('align','center');
                celda16.setAttribute('align','center');
                celda17.setAttribute('align','center');
                celda18.setAttribute('align','center');

                	

                celda1.innerHTML = '<p style="font-size: 15px">'+(y=y+1)+'</p>';
                celda2.innerHTML = '<p style="font-size: 15px"><textarea readonly>'+z.nombreItem+'</textarea></p>';
                celda3.innerHTML = '<input id="input_enero'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'" value="'+z.enero+'">';
                celda4.innerHTML = '<input id="input_febrero'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.febrero+'" >';
                celda5.innerHTML = '<input id="input_marzo'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.marzo+'" >';
                celda6.innerHTML = '<input id="input_abril'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.abril+'" >';
                celda7.innerHTML = '<input id="input_mayo'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.mayo+'" >';
                celda8.innerHTML = '<input id="input_junio'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.junio+'" >';
                celda9.innerHTML = '<input id="input_julio'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.julio+'"  >';
                celda10.innerHTML = '<input id="input_agosto'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.agosto+'"  >';
                celda11.innerHTML = '<input id="input_septiembre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.septiembre+'"  >';
                celda12.innerHTML = '<input id="input_octubre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.octubre+'"  >';
                celda13.innerHTML = '<input id="input_noviembre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class="solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.noviembre+'"  >';
                celda14.innerHTML = '<input id="input_diciembre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.diciembre+'"  >';
                celda15.innerHTML = '<input id="input_total'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px; border:none!important;" type="text" readonly="" value="'+z.totalSumaItem+'"/>';
                celda16.innerHTML = '<a data-dismiss="modal" id="contratacion__'+z.idProgramacionFinanciera+'"  class="btn btn-primary" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'" data-bs-toggle="modal" data-bs-target="#contrataciones__itemsPaid">Contratacion</i></a>';
                celda17.innerHTML = '<a data-dismiss="modal" id="guardar__'+z.idProgramacionFinanciera+'"  class="btn btn-primary" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'"><i class="fas fa-save"></i></a>';
                celda18.innerHTML = '<a data-dismiss="modal" id="eliminar__'+z.idProgramacionFinanciera+'"  class="btn btn-danger" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'"><i class="fas fa-trash"></i></a>';


                $("#eliminar__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('identificador',identificador);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idItem',z.idItem);

                $("#contratacion__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('identificador',identificador);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('idItem',z.idItem);

                $("#guardar__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#guardar__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#guardar__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#guardar__" +z.idProgramacionFinanciera).attr('identificador',identificador);
                $("#guardar__" +z.idProgramacionFinanciera).attr('idItem',z.idItem);


                sumarIndicadoresGlobal__principal($(".sumador__montos"+z.idProgramacionFinanciera),$("#input_total"+z.idProgramacionFinanciera));
                funcion__solo__numero__montos($(".solo__numero__montos"));
                funcion__cambio__de__numero($(".solo__numero__montos"));

                obtenerContrataciónPublicaDesarrollo($("#contratacion__" +z.idProgramacionFinanciera),"obtener_contratacion_Publica_desarrollo");

                actualizacion_tabla_rubos_itemDesarrollo($("#guardar__" +z.idProgramacionFinanciera));

                eliminar_tabla_rubos_itemDesarrollo($("#eliminar__" +z.idProgramacionFinanciera));

                eliminar_tabla_CatalogoCcontraloria_Paid_Desarrollo($("#eliminar__" +z.idProgramacionFinanciera));


                
                }

               


        }).catch((error) => {

        });

   

    });
}



var obtenerRubrosItemsVer2_Desarrollo = function (tipo,idComponentes,idAsignacion,idRubros,identificador) {

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
            var tabla = document.getElementById('TablaItemsRubrosDesarrollo');

            let y=0;
    
            for (z of response.data.informacion) {
            
                var fila = tabla.insertRow();

                var celda1 = fila.insertCell(0);
                var celda2 = fila.insertCell(1);
                var celda3 = fila.insertCell(2);
                var celda4 = fila.insertCell(3);
                var celda5 = fila.insertCell(4);
                var celda6 = fila.insertCell(5);
                var celda7 = fila.insertCell(6);
                var celda8 = fila.insertCell(7);
                var celda9 = fila.insertCell(8);
                var celda10 = fila.insertCell(9);
                var celda11 = fila.insertCell(10);
                var celda12 = fila.insertCell(11);
                var celda13 = fila.insertCell(12);
                var celda14 = fila.insertCell(13);
                var celda15 = fila.insertCell(14);
                var celda16 = fila.insertCell(15);
                var celda17 = fila.insertCell(16);
                var celda18 = fila.insertCell(17);

                celda1.setAttribute('align','center');
                celda2.setAttribute('align','center');
                celda3.setAttribute('align','center');
                celda4.setAttribute('align','center');
                celda5.setAttribute('align','center');
                celda6.setAttribute('align','center');
                celda7.setAttribute('align','center');
                celda8.setAttribute('align','center');
                celda9.setAttribute('align','center');
                celda10.setAttribute('align','center');
                celda11.setAttribute('align','center');
                celda12.setAttribute('align','center');
                celda13.setAttribute('align','center');
                celda14.setAttribute('align','center');
                celda15.setAttribute('align','center');
                celda16.setAttribute('align','center');
                celda17.setAttribute('align','center');
                celda18.setAttribute('align','center');

                	

                celda1.innerHTML = '<p style="font-size: 15px">'+(y=y+1)+'</p>';
                celda2.innerHTML = '<p style="font-size: 15px"><textarea readonly>'+z.nombreItem+'</textarea></p>';
                celda3.innerHTML = '<input id="input_enero'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'" value="'+z.enero+'">';
                celda4.innerHTML = '<input id="input_febrero'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.febrero+'" >';
                celda5.innerHTML = '<input id="input_marzo'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.marzo+'" >';
                celda6.innerHTML = '<input id="input_abril'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.abril+'" >';
                celda7.innerHTML = '<input id="input_mayo'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.mayo+'" >';
                celda8.innerHTML = '<input id="input_junio'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.junio+'" >';
                celda9.innerHTML = '<input id="input_julio'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.julio+'"  >';
                celda10.innerHTML = '<input id="input_agosto'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.agosto+'"  >';
                celda11.innerHTML = '<input id="input_septiembre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.septiembre+'"  >';
                celda12.innerHTML = '<input id="input_octubre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.octubre+'"  >';
                celda13.innerHTML = '<input id="input_noviembre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class="solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.noviembre+'"  >';
                celda14.innerHTML = '<input id="input_diciembre'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px" type="text" class=" solo__numero__montos sumador__montos'+z.idProgramacionFinanciera+'"  value="'+z.diciembre+'"  >';
                celda15.innerHTML = '<input id="input_total'+z.idProgramacionFinanciera+'" style="font-size: 15px; width:40px; border:none!important;" type="text" readonly="" value="'+z.totalSumaItem+'"/>';
                celda16.innerHTML = '<a data-dismiss="modal" id="contratacion__'+z.idProgramacionFinanciera+'"  class="btn btn-primary" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'" data-bs-toggle="modal" data-bs-target="#contrataciones__itemsPaid">Contratacion</i></a>';
                celda17.innerHTML = '<a data-dismiss="modal" id="guardar__'+z.idProgramacionFinanciera+'"  class="btn btn-primary" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'"><i class="fas fa-save"></i></a>';
                celda18.innerHTML = '<a data-dismiss="modal" id="eliminar__'+z.idProgramacionFinanciera+'"  class="btn btn-danger" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'"><i class="fas fa-trash"></i></a>';


                $("#eliminar__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('identificador',identificador);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idItem',z.idItem);

                $("#contratacion__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('identificador',identificador);
                $("#contratacion__" +z.idProgramacionFinanciera).attr('idItem',z.idItem);

                $("#guardar__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#guardar__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#guardar__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#guardar__" +z.idProgramacionFinanciera).attr('identificador',identificador);
                $("#guardar__" +z.idProgramacionFinanciera).attr('idItem',z.idItem);


                sumarIndicadoresGlobal__principal($(".sumador__montos"+z.idProgramacionFinanciera),$("#input_total"+z.idProgramacionFinanciera));
                funcion__solo__numero__montos($(".solo__numero__montos"));
                funcion__cambio__de__numero($(".solo__numero__montos"));

                obtenerContrataciónPublicaDesarrollo($("#contratacion__" +z.idProgramacionFinanciera),"obtener_contratacion_Publica_desarrollo");

                actualizacion_tabla_rubos_itemDesarrollo($("#guardar__" +z.idProgramacionFinanciera));

                eliminar_tabla_rubos_itemDesarrollo($("#eliminar__" +z.idProgramacionFinanciera));

                eliminar_tabla_CatalogoCcontraloria_Paid_Desarrollo($("#eliminar__" +z.idProgramacionFinanciera));


            }


        }).catch((error) => {

        });

   

  
}


var obtenerRubros__items_Desarrollo = function (boton, tipo, identificador) {

    $(boton).click(function (e) {

        $("#SelectorItemRubroDesarrollo option").remove(); 
     
        let idComponentes = $(this).attr('idComponentes');
        let idAsignacion = $(this).attr('idAsignacion');
        let idRubros = $(this).attr('idRubros');
        let nombre = $(this).attr('nombreRubro');

        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);

      

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {


            var titulo = document.getElementById('RubrosTituloDesarrollo');

            titulo.textContent='Rubro: '+nombre;


            var selector = document.getElementById('SelectorItemRubroDesarrollo');

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Opción--';
            opcion.value=0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value=z.idItem;

                opcion.text = '('+z.itemPreesupuestario+') '+z.nombreItem;

                selector.appendChild(opcion);

            }

            $("#guardarItemRubroDesarrollo").attr('idComponentes',idComponentes);
            $("#guardarItemRubroDesarrollo").attr('idRubros',idRubros);
            $("#guardarItemRubroDesarrollo").attr('idAsignacion',idAsignacion);
            $("#guardarItemRubroDesarrollo").attr('identificador',identificador);

            $("#agregarItemsRubrosDesarrollo").attr('idComponentes',idComponentes);
            $("#agregarItemsRubrosDesarrollo").attr('idRubros',idRubros);
            $("#agregarItemsRubrosDesarrollo").attr('idAsignacion',idAsignacion);
            $("#agregarItemsRubrosDesarrollo").attr('identificador',identificador);
            $("#agregarItemsRubrosDesarrollo").attr('nombreRubro',nombre);
            

            
        }).catch((error) => {

        });

          

    });

}


var obtenerRubrosDesarrollo = function (boton,tipo,identificador) {

        $(boton).click(function (e){
    
            let idComponentes=$(this).attr('idComponentes');
            let idAsignacion=$(this).attr('idAsignacion');
            
            let paqueteDeDatos = new FormData();
    
            paqueteDeDatos.append("tipo", tipo);
            paqueteDeDatos.append("idComponentes", idComponentes);
            paqueteDeDatos.append("idAsignacion", idAsignacion);
            paqueteDeDatos.append("identificador", identificador);

            
    
            axios({
                method: "post",
                url: "modelosBd/PAID_DESARROLLO/selector.md.php",
                data: paqueteDeDatos,
                headers: { "Content-Type": "multipart/form-data" },
            }).then((response) => {

                

                var tabla = document.getElementById('rubroslistaDesarrollo');

                let y=0;
        
                for (z of response.data.informacion) {

                    var valorMonto=parseFloat(z.montos)

                    
                    if(valorMonto>0){
                    
                    var fila = tabla.insertRow();

                    var celda1 = fila.insertCell(0);
                    var celda2 = fila.insertCell(1);
                    var celda3 = fila.insertCell(2);
                    var celda4 = fila.insertCell(3);
                    var celda5 = fila.insertCell(4);
                    var celda6 = fila.insertCell(5);

                    celda1.setAttribute('align','center');
                   
                    celda2.setAttribute('align','center');
                    celda3.setAttribute('align','center');
                    celda4.setAttribute('align','center');
                    celda5.setAttribute('align','center');
                    celda6.setAttribute('align','center');

                    
 
                    celda1.innerHTML = '<p style="font-size: 15px">'+(y=y+1)+'</p>';
                    celda2.innerHTML = '<p style="font-size: 15px">'+z.nombreRubros+'</p>';
                    celda3.innerHTML = '<p style="font-size: 15px">$ '+valorMonto.toLocaleString()+'</p>';
                    celda4.innerHTML = '<p style="font-size: 15px" id="valorAsignado'+z.idRubros+'" class="restar__montos"></p>';
                    celda5.innerHTML = '<p style="font-size: 15px" id="valorPorAsignar'+z.idRubros+'"></p>';
                    celda6.innerHTML = '<a data-dismiss="modal" id="rubros__'+z.idRubros+'__'+idComponentes+'"  class="btn btn-primary" data-bs-toggle="modal" nombreRubro="'+z.nombreRubros+'" idRubros="'+z.idRubros+'" idAsignacion="'+idAsignacion+'" idComponentes="'+idComponentes+'" identificador="'+identificador+'" data-bs-target="#itemsCargadosDesarrollo">Ver</a>';

                    obtenerRubros__items_Desarrollo($("#rubros__" +z.idRubros+"__"+idComponentes), "obtener__rubros__items__inversion", identificador);
            
                    AsignarMontoPlanificadosGENERALDesarrollo("obtener_valor_total_matrices_desarrollo",valorMonto.toFixed(2),idComponentes,z.idRubros,"valorAsignado"+z.idRubros,"valorPorAsignar"+z.idRubros);  

                    AsignarIdRubroJN("obtener_idRubro_JN",identificador);

                    $("#valorAsignado"+z.idRubros).text($("#montoAsignadoDesarrollo").attr("valor"));
                    $("#valorPorAsignar"+z.idRubros).text($("#montoPorAsignarDesarrollo").attr("valor"));

                    deshabilitarBtnPaidGeneral("#valorPorAsignar"+z.idRubros,"#rubros__" +z.idRubros+"__"+idComponentes,"#itemsCargadosDesarrollo","#modalDatosInconclusos")


                    }else{

                    }
                
                    
                }

            }).catch((error) => {

            });
    
        });
    
}

var obtenerIndicadoresRubroDesarrollo = function (boton,tipo) {

    $(boton).click(function (e){


        let idComponentes=$(this).attr('idComponentes');
        let identificador=$(this).attr('identificador');
        let idIndicadores=$(this).attr('idIndicadores');

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idIndicadores", idIndicadores);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var z = response.data.informacion;

            console.log(z);

            if(z.length < 1){

               
                insertar_indicadores_organismo(boton);

                obtenerIndicadoresRubro2Desarrollo($(boton),"obtener_indicadores_inversion");

        
            }else{

                
            var tabla = document.getElementById('tablaIndicadoresPaidDesarrollo');

            for (z of response.data.informacion) {
 
                tabla.insertAdjacentHTML('beforeend','<div  class="col col-4 titulo__enfasis mt-2">I Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div  class="col col-8 mt-2"><input id="primerTrimestre'+z.idPaidIndicador+'" type="text" class=" ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center"  value="'+z.primertrimestre+'"></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">II Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div   class="col col-8 mt-2"><input type="text" id="segundoTrimestre'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center" value="'+z.segundotrimestre+'"></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">III Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="tercerTrimestre'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center" value="'+z.tercertrimestre+'"></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">IV Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="cuartoTrimestre'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center" value="'+z.cuartotrimestre+'"></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">Meta Anual Del Idicador:</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="totalIndicador'+z.idPaidIndicador+'" style="border:none!important;" class="ancho__total__input solo__numero__montos campos__obligatorios text-center" readonly="" value="'+z.metaindicador+'"></div>');
    
               

                sumarIndicadoresGlobal__principal($(".sumador__montos"+z.idPaidIndicador),$("#totalIndicador"+z.idPaidIndicador));
                funcion__solo__numero__montos($(".solo__numero__montos"));
                funcion__cambio__de__numero($(".solo__numero__montos"));

                $("#guardarIndicadoresDesarrollo").attr('idPaidIndicador',z.idPaidIndicador);
    
            

            }

            }

        }).catch((error) => {



        });

    });

}

var obtenerIndicadoresRubro2Desarrollo = function (boton,tipo) {

        let idComponentes=$(boton).attr('idComponentes');
        let identificador=$(boton).attr('identificador');
        let idIndicadores=$(boton).attr('idIndicadores');

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idIndicadores", idIndicadores);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {


            var tabla = document.getElementById('tablaIndicadoresPaidDesarrollo');

            for (z of response.data.informacion) {
 
                tabla.insertAdjacentHTML('beforeend','<div  class="col col-4 titulo__enfasis mt-2">I Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div  class="col col-8 mt-2"><input id="primerTrimestre'+z.idPaidIndicador+'" type="text" class=" ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center"  value="'+z.primertrimestre+'"></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">II Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div   class="col col-8 mt-2"><input type="text" id="segundoTrimestre'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center" value="'+z.segundotrimestre+'"></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">III Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="tercerTrimestre'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center" value="'+z.tercertrimestre+'"></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">IV Trimestre</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="cuartoTrimestre'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos sumador__montos'+z.idPaidIndicador+' campos__obligatorios text-center" value="'+z.cuartotrimestre+'"></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4 titulo__enfasis mt-2">Meta Anual Del Idicador:</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 mt-2"><input type="text" id="totalIndicador'+z.idPaidIndicador+'" class="ancho__total__input solo__numero__montos  campos__obligatorios text-center" style="border:none!important;" readonly="" value="'+z.metaindicador+'"></div>');
    
               

                sumarIndicadoresGlobal__principal($(".sumador__montos"+z.idPaidIndicador),$("#totalIndicador"+z.idPaidIndicador));
                funcion__solo__numero__montos($(".solo__numero__montos"));
                funcion__cambio__de__numero($(".solo__numero__montos"));

                $("#guardarIndicadoresDesarrollo").attr('idPaidIndicador',z.idPaidIndicador);
    
            
            }

           
            

        }).catch((error) => {



        });


}



var tablaPrincipalDesarrollo = function (tipo, identificador) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);

   
    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        var tabla = document.getElementById('tablaPAIDGeneralDesarrollo');

        let y=0;

        for (z of response.data.informacion) {
            if(z.montos > 0){

           
            var fila = tabla.insertRow();
            

            var celda1 = fila.insertCell(0);
            var celda2 = fila.insertCell(1);
            var celda3 = fila.insertCell(2);
            var celda4 = fila.insertCell(3);
            var celda5 = fila.insertCell(4);

            celda1.setAttribute('align','center');
            celda2.setAttribute('align','center');
            celda3.setAttribute('align','center');
            celda4.setAttribute('align','center');
            celda5.setAttribute('align','center');

            celda1.innerHTML = (y=y+1);
            celda2.innerHTML = z.nombreComponentes;
            celda3.innerHTML = z.nombreIndicadores;
            celda4.innerHTML ='<button type"button" id="btnVerIndicador'+z.idComponentes+'" class="btn btn-success"style="width=200px;" data-bs-toggle="modal" data-bs-target="#modalActividadDesarrollo">VER</button>';
            celda5.innerHTML = '<button type"button" class="btn btn-success"style="width=200px;" id="item'+z.idComponentes+'" idComponentes="'+z.idComponentes+'" idAsignacion="'+z.idAsignacion+'" data-bs-toggle="modal" data-bs-target="#RubrosCargadosDesarrollo">VER</button>';

            $("#btnVerIndicador"+z.idComponentes).attr('idComponentes',z.idComponentes);
            $("#btnVerIndicador"+z.idComponentes).attr('identificador',identificador);
            $("#btnVerIndicador"+z.idComponentes).attr('idIndicadores',z.idIndicadores);
            
            obtenerRubrosDesarrollo($("#item"+z.idComponentes),"obtener_rubros_inversion",identificador);

            obtenerIndicadoresRubroDesarrollo($("#btnVerIndicador"+z.idComponentes),"obtener_indicadores_inversion")
        
            }
        }

        

    }).catch((error) => {

    });

}


var RecargarRubros__itemsDesarrollo = function (tipo,idComponentes,idAsignacion,idRubros, identificador) {

        let paqueteDeDatos = new FormData();
        
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);


        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('SelectorItemRubroDesarrollo');

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Opción--';
            opcion.value=0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value=z.idItem;

                opcion.text = '('+z.idItem+') '+z.nombreItem;

                selector.appendChild(opcion);

            }

           
      
        }).catch((error) => {

        });

}




var CargarMontoAsignado_Paid_Desarrollo = function (tipo, identificador) {

    let paqueteDeDatos = new FormData();
    
    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
   
    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        var tituloMonto = document.getElementById('montoPaidGeneralDesarrollo');

        for (z of response.data.informacion) {

            let num =parseFloat(z.monto);

            tituloMonto.textContent='Monto: $'+num.toLocaleString();

            $("#montoPaidGeneralDesarrollo").attr("valor",num.toFixed(2));

            

        }
  
    }).catch((error) => {

    });

    

}

//*************************** Juegos Nacionales *******************************//

var CargarSelector_Categorias_Paid_DesarrolloJN = function (boton,tipo,identificador) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('categoriaDesarrolloJN');

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Categoría--';
            opcion.value=0;

            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value=z.idCategoria;

                opcion.text = z.nombreCategoria;

                selector.appendChild(opcion);

            }

        }).catch((error) => {



        });

    });

}



var AsignarIdRubroJN = function (tipo,identificador) {    

    

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);

        paqueteDeDatos.append("identificador", identificador);      

        paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val()); 

     

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
        
            for (z of response.data.informacion) {      
                

                var tituloComponente = document.getElementById('tituloComponenteJN');

                tituloComponente.textContent= "Componente: "+z.nombreComponentes;
              

                var titulo = document.getElementById('tituloJN');

                titulo.textContent= "Rubro: "+z.nombreRubros;

                let num =parseFloat(z.montos);

                $("#MontoJN").text("$"+num.toLocaleString());
                $("#MontoJN").attr("valor", z.montos);
                
            }

        }).catch((error) => {           

        });  

        

        
}



//******************************************************************************//




var obtenerContrataciónPublicaDesarrollo = function (boton,tipo) {

    $(boton).click(function (e){


        var idComponentes = $(this).attr('idComponentes');
        var idRubros = $(this).attr('idRubros');
        var idAsignacion = $(this).attr('idAsignacion');
        var identificador = $(this).attr('identificador');
        var idItem = $(this).attr('idItem');

        

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idRubros", idRubros);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idItem", idItem);


        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var z = response.data.informacion;

            

            if(z.length < 1){

               
                insertar__contrataciones__publicas_paid_defecto(idComponentes,idRubros,idAsignacion,identificador,idItem);

                obtenerContrataciónPublicaDesarrollo2($(boton),"obtener_contratacion_Publica_desarrollo");

        
            }else{

                
                
            var tabla = document.getElementById('divContratacionPublica');

            for (z of response.data.informacion) {

               
 
                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios normalizados</div>');
                

                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Catálogo Electrónico</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__elect" name="catalogo__elect" class="catalogo__elect checkeds enlazados__checkeds__contratos" value="catalogo__elect" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__elect__texto" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Subasta Inversa Electrónica</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__subasta" name="catalogo__subasta" class="catalogo__subasta checkeds enlazados__checkeds__contratos" value="catalogo__subasta" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__subasta__texto" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Ínfima Cuantía</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__infima" name="catalogo__infima" class="catalogo__infima checkeds enlazados__checkeds__contratos" value="catalogo__infima" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__infima__texto" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__texto+'</textarea></div>');
                

                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios no normalizados</div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Menor Cuantía</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__menorCuantia" name="catalogo__menorCuantia" class="catalogo__menorCuantia checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantia" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__menorCuantia__texto" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__texto+'</textarea></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Cotización</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__cotizacion" name="catalogo__cotizacion" class="catalogo__cotizacion checkeds enlazados__checkeds__contratos" value="catalogo__cotizacion" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__cotizacion__texto" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__texto+'</textarea></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Licitación</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__licitacion" name="catalogo__licitacion" class="catalogo__licitacion checkeds enlazados__checkeds__contratos" value="catalogo__licitacion" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__licitacion__texto" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__texto+'</textarea></div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Obras</div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Menor Cuantía</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__menorCuantiaObras" name="catalogo__menorCuantiaObras" class="catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantiaObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__menorCuantiaObras__texto" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__texto+'</textarea></div>');

                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Cotización</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__cotizacionObras" name="catalogo__cotizacionObras" class="catalogo__cotizacionObras checkeds enlazados__checkeds__contratos" value="catalogo__cotizacionObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__cotizacionObras__texto" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__texto+'</textarea></div>');

                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Licitación</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__licitacionObras" name="catalogo__licitacionObras" class="catalogo__licitacionObras checkeds enlazados__checkeds__contratos" value="catalogo__licitacionObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__licitacionObras__texto" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Precio Fijo</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__precioObras" name="catalogo__precioObras" class="catalogo__precioObras checkeds enlazados__checkeds__contratos" value="catalogo__precioObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__precioObras__texto" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__texto+'</textarea></div>');
                

                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Consultoría</div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Contratación Directa</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__contratacionDirecta" name="catalogo__contratacionDirecta" class="catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionDirecta" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__contratacionDirecta__texto" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto">'+z.catalogo__contratacionDirecta__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Lista Corta</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__contratacionListaCorta" name="catalogo__contratacionListaCorta" class="catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionListaCorta" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__contratacionListaCorta__texto" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Concurso Público</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__contratacionConcursoPu" name="catalogo__contratacionConcursoPu" class="catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos" value="catalogo__contratacionConcursoPu" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__contratacionConcursoPu__texto" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas"></textarea>'+z.catalogo__contratacionConcursoPu__texto+'</div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">N/A</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 text-left"><input type="checkbox" id="noAplica__3" name="noAplica__3" class=" checkeds enlazados__checkeds__contratos__3" value="catalogo__contratacionConcursoPu" /></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-12 d d-flex justify-content-center flex-wrap"><a type="button" class="btn btn-primary  left__margen boton__enlacesOcultos" id="guardarCatalogoContraloriaDesarrollo" name="guardarIndicadoresDesarrollo" idpaidindicador="6288">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>');
                

                checkCatalogoContraloria__desdeBase(z.catalogo__elect,$("#catalogo__elect"), $(".catalogo__elect__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__subasta,$("#catalogo__subasta"), $(".catalogo__subasta__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__infima,$("#catalogo__infima"),$(".catalogo__infima__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantia,$("#catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__cotizacion,$("#catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__licitacion,$("#catalogo__licitacion"),$(".catalogo__licitacion__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantiaObras,$("#catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__cotizacionObras,$("#catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__licitacionObras,$("#catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__precioObras,$("#catalogo__precioObras"),$(".catalogo__precioObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__contratacionDirecta,$("#catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__contratacionListaCorta,$("#catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__contratacionConcursoPu,$("#catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));
                checkCatalogoContraloria__desdeBase(z.noAplica__3,$("#noAplica__3"),$(""));

             
                
                $("#inputIdItem" ).val(z.idCatalogo);
                $("#guardarCatalogoContraloriaDesarrollo" ).attr('idCatalogo',z.idCatalogo);
            
                checkboxFunciones($(".catalogo__elect"),$(".catalogo__elect__texto"));
                checkboxFunciones($(".catalogo__subasta"),$(".catalogo__subasta__texto"));
                checkboxFunciones($(".catalogo__infima"),$(".catalogo__infima__texto"));
                checkboxFunciones($(".catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
                checkboxFunciones($(".catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
                checkboxFunciones($(".catalogo__licitacion"),$(".catalogo__licitacion__texto"));
                checkboxFunciones($(".catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
                checkboxFunciones($(".catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
                checkboxFunciones($(".catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
                checkboxFunciones($(".catalogo__precioObras"),$(".catalogo__precioObras__texto"));
                checkboxFunciones($(".catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
                checkboxFunciones($(".catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
                checkboxFunciones($(".catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));

                insertar__contrataciones__publicas_paid($("#guardarCatalogoContraloriaDesarrollo"));

            }

            }

        }).catch((error) => {



        });

    });

}

var obtenerContrataciónPublicaDesarrollo2 = function (boton,tipo) {

    var idComponentes = $(boton).attr('idComponentes');
    var idRubros = $(boton).attr('idRubros');
    var idAsignacion = $(boton).attr('idAsignacion');
    var identificador = $(boton).attr('identificador');
    var idItem = $(boton).attr('idItem');


    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponentes", idComponentes);
    paqueteDeDatos.append("idRubros", idRubros);
    paqueteDeDatos.append("idAsignacion", idAsignacion);
    paqueteDeDatos.append("identificador", identificador);
    paqueteDeDatos.append("idItem", idItem);

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {


        var tabla = document.getElementById('divContratacionPublica');

            for (z of response.data.informacion) {

               
 
                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios normalizados</div>');
                

                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Catálogo Electrónico</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__elect" name="catalogo__elect" class="catalogo__elect checkeds enlazados__checkeds__contratos" value="catalogo__elect" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__elect__texto" name="catalogo__elect__texto" class="catalogo__elect__texto ancho__total__textareas">'+z.catalogo__elect__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Subasta Inversa Electrónica</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__subasta" name="catalogo__subasta" class="catalogo__subasta checkeds enlazados__checkeds__contratos" value="catalogo__subasta" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__subasta__texto" name="catalogo__subasta__texto" class="catalogo__subasta__texto ancho__total__textareas">'+z.catalogo__subasta__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Ínfima Cuantía</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__infima" name="catalogo__infima" class="catalogo__infima checkeds enlazados__checkeds__contratos" value="catalogo__infima" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__infima__texto" name="catalogo__infima__texto" class="catalogo__infima__texto ancho__total__textareas">'+z.catalogo__infima__texto+'</textarea></div>');
                

                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Bienes y servicios no normalizados</div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Menor Cuantía</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__menorCuantia" name="catalogo__menorCuantia" class="catalogo__menorCuantia checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantia" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__menorCuantia__texto" name="catalogo__menorCuantia__texto" class="catalogo__menorCuantia__texto ancho__total__textareas">'+z.catalogo__menorCuantia__texto+'</textarea></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Cotización</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__cotizacion" name="catalogo__cotizacion" class="catalogo__cotizacion checkeds enlazados__checkeds__contratos" value="catalogo__cotizacion" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__cotizacion__texto" name="catalogo__cotizacion__texto" class="catalogo__cotizacion__texto ancho__total__textareas">'+z.catalogo__cotizacion__texto+'</textarea></div>');
    
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Licitación</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__licitacion" name="catalogo__licitacion" class="catalogo__licitacion checkeds enlazados__checkeds__contratos" value="catalogo__licitacion" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__licitacion__texto" name="catalogo__licitacion__texto" class="catalogo__licitacion__texto ancho__total__textareas">'+z.catalogo__licitacion__texto+'</textarea></div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Obras</div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Menor Cuantía</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__menorCuantiaObras" name="catalogo__menorCuantiaObras" class="catalogo__menorCuantiaObras checkeds enlazados__checkeds__contratos" value="catalogo__menorCuantiaObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__menorCuantiaObras__texto" name="catalogo__menorCuantiaObras__texto" class="catalogo__menorCuantiaObras__texto ancho__total__textareas">'+z.catalogo__menorCuantiaObras__texto+'</textarea></div>');

                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Cotización</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__cotizacionObras" name="catalogo__cotizacionObras" class="catalogo__cotizacionObras checkeds enlazados__checkeds__contratos" value="catalogo__cotizacionObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__cotizacionObras__texto" name="catalogo__cotizacionObras__texto" class="catalogo__cotizacionObras__texto ancho__total__textareas">'+z.catalogo__cotizacionObras__texto+'</textarea></div>');

                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Licitación</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__licitacionObras" name="catalogo__licitacionObras" class="catalogo__licitacionObras checkeds enlazados__checkeds__contratos" value="catalogo__licitacionObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__licitacionObras__texto" name="catalogo__licitacionObras__texto" class="catalogo__licitacionObras__texto ancho__total__textareas">'+z.catalogo__licitacionObras__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Precio Fijo</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__precioObras" name="catalogo__precioObras" class="catalogo__precioObras checkeds enlazados__checkeds__contratos" value="catalogo__precioObras" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__precioObras__texto" name="catalogo__precioObras__texto" class="catalogo__precioObras__texto ancho__total__textareas">'+z.catalogo__precioObras__texto+'</textarea></div>');
                

                tabla.insertAdjacentHTML('beforeend','<div class="col col-12" style="font-weight:bold; text-align:center;">Consultoría</div>');


                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Contratación Directa</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__contratacionDirecta" name="catalogo__contratacionDirecta" class="catalogo__contratacionDirecta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionDirecta" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__contratacionDirecta__texto" name="catalogo__contratacionDirecta__texto" class="ancho__total__textareas catalogo__contratacionDirecta__texto">'+z.catalogo__contratacionDirecta__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Lista Corta</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__contratacionListaCorta" name="catalogo__contratacionListaCorta" class="catalogo__contratacionListaCorta checkeds enlazados__checkeds__contratos" value="catalogo__contratacionListaCorta" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__contratacionListaCorta__texto" name="catalogo__contratacionListaCorta__texto" class="catalogo__contratacionListaCorta__texto ancho__total__textareas">'+z.catalogo__contratacionListaCorta__texto+'</textarea></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">Concurso Público</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-2 text-left"><input type="checkbox" id="catalogo__contratacionConcursoPu" name="catalogo__contratacionConcursoPu" class="catalogo__contratacionConcursoPu checkeds enlazados__checkeds__contratos" value="catalogo__contratacionConcursoPu" /></div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-6 text-left"><textarea id="catalogo__contratacionConcursoPu__texto" name="catalogo__contratacionConcursoPu__texto" class="catalogo__contratacionConcursoPu__texto ancho__total__textareas"></textarea>'+z.catalogo__contratacionConcursoPu__texto+'</div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-4">N/A</div>');
                tabla.insertAdjacentHTML('beforeend','<div class="col col-8 text-left"><input type="checkbox" id="noAplica__3" name="noAplica__3" class=" checkeds enlazados__checkeds__contratos__3" value="catalogo__contratacionConcursoPu" /></div>');
                
                tabla.insertAdjacentHTML('beforeend','<div class="col col-12 d d-flex justify-content-center flex-wrap"><a type="button" class="btn btn-primary  left__margen boton__enlacesOcultos" id="guardarCatalogoContraloriaDesarrollo" name="guardarIndicadoresDesarrollo" idpaidindicador="6288">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>');
                

                checkCatalogoContraloria__desdeBase(z.catalogo__elect,$("#catalogo__elect"), $(".catalogo__elect__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__subasta,$("#catalogo__subasta"), $(".catalogo__subasta__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__infima,$("#catalogo__infima"),$(".catalogo__infima__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantia,$("#catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__cotizacion,$("#catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__licitacion,$("#catalogo__licitacion"),$(".catalogo__licitacion__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__menorCuantiaObras,$("#catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__cotizacionObras,$("#catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__licitacionObras,$("#catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__precioObras,$("#catalogo__precioObras"),$(".catalogo__precioObras__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__contratacionDirecta,$("#catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__contratacionListaCorta,$("#catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
                checkCatalogoContraloria__desdeBase(z.catalogo__contratacionConcursoPu,$("#catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));
                checkCatalogoContraloria__desdeBase(z.noAplica__3,$("#noAplica__3"),$(""));

             
                
                $("#inputIdItem" ).val(z.idCatalogo);
                $("#guardarCatalogoContraloriaDesarrollo" ).attr('idCatalogo',z.idCatalogo);
            
                checkboxFunciones($(".catalogo__elect"),$(".catalogo__elect__texto"));
                checkboxFunciones($(".catalogo__subasta"),$(".catalogo__subasta__texto"));
                checkboxFunciones($(".catalogo__infima"),$(".catalogo__infima__texto"));
                checkboxFunciones($(".catalogo__menorCuantia"),$(".catalogo__menorCuantia__texto"));
                checkboxFunciones($(".catalogo__cotizacion"),$(".catalogo__cotizacion__texto"));
                checkboxFunciones($(".catalogo__licitacion"),$(".catalogo__licitacion__texto"));
                checkboxFunciones($(".catalogo__menorCuantiaObras"),$(".catalogo__menorCuantiaObras__texto"));
                checkboxFunciones($(".catalogo__cotizacionObras"),$(".catalogo__cotizacionObras__texto"));
                checkboxFunciones($(".catalogo__licitacionObras"),$(".catalogo__licitacionObras__texto"));
                checkboxFunciones($(".catalogo__precioObras"),$(".catalogo__precioObras__texto"));
                checkboxFunciones($(".catalogo__contratacionDirecta"),$(".catalogo__contratacionDirecta__texto"));
                checkboxFunciones($(".catalogo__contratacionListaCorta"),$(".catalogo__contratacionListaCorta__texto"));
                checkboxFunciones($(".catalogo__contratacionConcursoPu"),$(".catalogo__contratacionConcursoPu__texto"));

                insertar__contrataciones__publicas_paid($("#guardarCatalogoContraloriaDesarrollo"));

            }

       
        

    }).catch((error) => {



    });


}


var CargarSelector_Deportes_Paid_DesarrolloJN = function (boton,tipo,idSelector) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
       

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById(idSelector);

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Un Deporte--';
            opcion.value=0;

            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value = z.nombre_deporte;

                opcion.text = z.nombre_deporte;

                selector.appendChild(opcion);

            }

        }).catch((error) => {



        });

    });

}



var CargarSelector_items_Paid_DesarrolloJN = function (boton,tipo,idSelector,identificador) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubros", $("#JuegosNacionalesIDRUBRO").val());

        paqueteDeDatos.append("identificador", identificador);       

        
        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById(idSelector);

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Opción--';
            opcion.value=0;
            selector.appendChild(opcion);
            
            for (z of response.data.informacion) {
            
                var opcion = document.createElement("option");
            
                opcion.value=z.idItem;

                opcion.text = '('+z.itemPreesupuestario+') '+z.nombreItem;
            
                selector.appendChild(opcion);
            
            }

        }).catch((error) => {



        });

    });

}

//------------------------------Asignacion de Montos Medallas-----------------------------------

var AsignarMontoMedallasJN = function (tipo) {

   

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());
    

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

           
            if(z.valorTotal==null){

                $("#TotalMedallasOro").text(": 0");
                $("#TotalMedallasOro").attr("valor",0);
                $("#TotalMedallasBronce").text(": 0");
                $("#TotalMedallasBronce").attr("valor",0);
                $("#TotalMedallasPlata").text(": 0");
                $("#TotalMedallasPlata").attr("valor",0);

                $("#TotalMedallas").text("$ 0");
                $("#TotalMedallas").attr("valor",0);

                
                

            }else{
                $("#TotalMedallasOro").text(": "+z.totalOro);
                $("#TotalMedallasOro").attr("valor",z.totalOro);
                $("#TotalMedallasPlata").text(": "+z.totalPlata);
                $("#TotalMedallasPlata").attr("valor",z.totalPlata);
                $("#TotalMedallasBronce").text(": "+z.totalBronce);
                $("#TotalMedallasBronce").attr("valor",z.totalBronce);

                $("#TotalMedallas").text("$ "+z.valorTotal.toLocaleString());
                $("#TotalMedallas").attr("valor",z.valorTotal);

               
               
            }
        }

    }).catch((error) => {

      

    });


}
//----------------------------------------------------------------------------------------------

var CargarSelector_deporte_provincias_Paid_DesarrolloJN = function (boton,tipo,idSelector,identificador) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", $("#JuegosNacionalesIDComponentes").val());
        paqueteDeDatos.append("idRubros", $("#JuegosNacionalesIDRubro").val());
        paqueteDeDatos.append("idAsignacion", $("#JuegosNacionalesIDAsignacion").val());
        paqueteDeDatos.append("identificador", identificador);       

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById(idSelector);

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Opción--';
            opcion.value=0;
            selector.appendChild(opcion);
            
            for (z of response.data.informacion) {
            
                var opcion = document.createElement("option");
            
                opcion.value=z.nombreProvincia;

                opcion.text = z.nombreProvincia;
            
                selector.appendChild(opcion);
            
            }

        }).catch((error) => {



        });

    });

}



//------------------------------Asignacion de Montos Bono Deportivo-----------------------------------

var AsignarMontoBonoDeportivoJN = function (tipo) {

   

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);

    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());
    

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

           
            if(z.TotalInvertido==null){

                $("#TotalPersonasBonoDeporteJN").text(": 0");
                $("#TotalPersonasBonoDeporteJN").attr("valor",0);


                $("#TotalInvertidoBonoDeporteJN").text("$ 0");
                $("#TotalInvertidoBonoDeporteJN").attr("valor",0);

                
                

            }else{
                $("#TotalPersonasBonoDeporteJN").text(": "+z.totalPersonas);
                $("#TotalPersonasBonoDeporteJN").attr("valor",z.totalPersonas);


                $("#TotalInvertidoBonoDeporteJN").text("$ "+z.TotalInvertido.toLocaleString());
                $("#TotalInvertidoBonoDeporteJN").attr("valor",z.TotalInvertido);

               
               
            }
        }

    }).catch((error) => {

      

    });


}

//------------------------------Asignacion de Montos Matrices Auxiliares-----------------------------------

var AsignarMatricesAuxiliaresJN = function (tipo) {

   

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());

    

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

        
            if(z.TotalInvertido==null){

                $("#TotalInvertidoMatricesAuxiliaresJN").text(": 0");
                $("#TotalInvertidoMatricesAuxiliaresJN").attr("valor",0);


            }else{
                let num=parseFloat(z.TotalInvertido);
                $("#TotalInvertidoMatricesAuxiliaresJN").text(": "+num.toLocaleString());
                $("#TotalInvertidoMatricesAuxiliaresJN").attr("valor",z.TotalInvertido.toFixed(2));

            
            }
        }

    }).catch((error) => {

      

    });


}


//------------------------------ HOSP ALIM num total cupos DI -----------------------------------

var Hosp_alim_num_total_cupos_DI = function (tipo) {   


    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo);    
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {       
            if(z.num_cupos_HADI==null){
                $("#numCuposTotalHAHI").text(": 0");
                $("#numCuposTotalHAHI").attr("valor",0);
            }else{
                $("#numCuposTotalHAHI").text(": "+z.num_cupos_HADI);
                $("#numCuposTotalHAHI").attr("valor",z.num_cupos_HADI);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ HOSP ALIM Total DI -----------------------------------

var Hosp_alim_total_DI = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo); 
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());   

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {       
            if(z.valorTotalHADI==null){
                $("#valorTotalHAHI").text(": 0");
                $("#valorTotalHAHI").attr("valor",0);
            }else{
                let num = parseFloat(z.valorTotalHADI)
                $("#valorTotalHAHI").text(": "+num.toLocaleString());
                $("#valorTotalHAHI").attr("valor",z.valorTotalHADI.toFixed(2));            
            }
        }
    }).catch((error) => {     

    });
}



//------------------------------ PTC - TOTAL JUECES -----------------------------------

var total_jueces_PTC = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo);  
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val()); 

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.totalJueces==null){
                $("#valortotalJuecesPTC").text(": 0");
                $("#valortotalJuecesPTC").attr("valor",0);
            }else{
                $("#valortotalJuecesPTC").text(": "+z.totalJueces);
                $("#valortotalJuecesPTC").attr("valor",z.totalJueces);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ PTC - TOTAL -----------------------------------

var valor_total_PTC = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());    

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.total_PTC==null){
                $("#TotalPTC").text(": 0");
                $("#TotalPTC").attr("valor",0);
            }else{
                $("#TotalPTC").text(": "+z.total_PTC);
                $("#TotalPTC").attr("valor",z.total_PTC);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------Asignacion de Montos Seguro-----------------------------------

var AsignarValorSeguro = function (tipo) {

   

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());

    

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

        
            if(z.TotalInvertido==null){

                $("#TotalInvertidoSeguro").text(": 0");
                $("#TotalInvertidoSeguro").attr("valor",0);


            }else{
                let num=parseFloat(z.TotalInvertido)
                $("#TotalInvertidoSeguro").text(": "+num.toLocaleString());
                $("#TotalInvertidoSeguro").attr("valor",z.TotalInvertido);

            
            }
        }

    }).catch((error) => {

      

    });


}

//------------------------------Asignacion de Montos Transporte-----------------------------------

var AsignarValorTransporte = function (tipo) {

   

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());

    

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

        
            if(z.TotalInvertido==null){

                $("#TotalInvertidoTransporte").text(": 0");
                $("#TotalInvertidoTransporte").attr("valor",0);


            }else{
                let num=parseFloat(z.TotalInvertido)
                $("#TotalInvertidoTransporte").text(": "+num.toLocaleString());
                $("#TotalInvertidoTransporte").attr("valor",z.TotalInvertido);

            
            }
        }

    }).catch((error) => {

      

    });


}


//------------------------------ UNIFORMES TOTAL DELEGACIONES -----------------------------------

var total_uniformes_delegaciones = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo);  
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());  

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.total_delegaciones==null){
                $("#numTotalDelegaciones").text(": 0");
                $("#numTotalDelegaciones").attr("valor",0);
            }else{
                $("#numTotalDelegaciones").text(": "+z.total_delegaciones);
                $("#numTotalDelegaciones").attr("valor",z.total_delegaciones);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ UNIFORMES VALOR TOTAL -----------------------------------

var total_uniformes = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo); 
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());   

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.valorTotal==null){
                $("#valorTotalDelegaciones").text(": 0");
                $("#valorTotalDelegaciones").attr("valor",0);
            }else{
                let num =parseFloat(z.valorTotal)
                $("#valorTotalDelegaciones").text(": "+num.toLocaleString());
                $("#valorTotalDelegaciones").attr("valor",z.valorTotal);            
            }
        }
    }).catch((error) => {     

    });
}


//------------------------------ UNIFORMES NUM TOTAL P APOYO -----------------------------------

var uniformes_num_totalPApoyo = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo);    
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.numPApoyo==null){
                $("#numTotalPApoyo").text(": 0");
                $("#numTotalPApoyo").attr("valor",0);
            }else{
                $("#numTotalPApoyo").text(": "+z.numPApoyo);
                $("#numTotalPApoyo").attr("valor",z.numPApoyo);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ UNIFORMES VALOR TOTAL P APOYO -----------------------------------

var uniformes_valor_total_PApoyo = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo); 
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());   

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.valorTotal==null){
                $("#valorTotalPApoyo").text(": 0");
                $("#valorTotalPApoyo").attr("valor",0);
            }else{
                let num=parseFloat(z.valorTotal)
                $("#valorTotalPApoyo").text(": "+num.toLocaleString());
                $("#valorTotalPApoyo").attr("valor",z.valorTotal);            
            }
        }
    }).catch((error) => {     

    });
}


//------------------------------ NUM DEPORTISTAS PASAJES AEREOS -----------------------------------

var num_deportistas_pasajes_aereos = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo); 
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());   

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.numDeportistas==null){
                $("#numDeportistasPasajesAereos").text(": 0");
                $("#numDeportistasPasajesAereos").attr("valor",0);
            }else{
                $("#numDeportistasPasajesAereos").text(": "+z.numDeportistas);
                $("#numDeportistasPasajesAereos").attr("valor",z.numDeportistas);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ NUM ENTRENADORES PASAJES AEREOS -----------------------------------

var num_entrenadores_pasajes_aereos = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo); 
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());   

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.numEntrenadores==null){
                $("#numEntrenadoresPasajesAereos").text(": 0");
                $("#numEntrenadoresPasajesAereos").attr("valor",0);
            }else{
                $("#numEntrenadoresPasajesAereos").text(": "+z.numEntrenadores);
                $("#numEntrenadoresPasajesAereos").attr("valor",z.numEntrenadores);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ NUM TOTAL DE PERSONAS PASAJES AEREOS -----------------------------------

var num_total_personas_pasajes_aereos = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo); 
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val());   

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.numPersoans==null){
                $("#numTotalPersonasPasajesAereos").text(": 0");
                $("#numTotalPersonasPasajesAereos").attr("valor",0);
            }else{
                $("#numTotalPersonasPasajesAereos").text(": "+z.numPersoans);
                $("#numTotalPersonasPasajesAereos").attr("valor",z.numPersoans);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ VALOR TOTAL PASAJES AEREOS -----------------------------------

var valor_total_pasajes_aereos = function (tipo) {   

    let paqueteDeDatos = new FormData();
    paqueteDeDatos.append("tipo", tipo);   
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val()); 

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.valorTotal==null){
                $("#TotalPasajaesAereos").text(": 0");
                $("#TotalPasajaesAereos").attr("valor",0);
            }else{
                let num=parseFloat(z.valorTotal)
                $("#TotalPasajaesAereos").text(": "+num.toLocaleString());
                $("#TotalPasajaesAereos").attr("valor",z.valorTotal);            
            }
        }
    }).catch((error) => {     

    });
}

var AsignarMontoPlanificadosDesarrollo = function (tipo) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val()); 

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

            

            if(z.TotalPlanificado==null){
                $("#MontoAsignadoJN").text("$ 0");
                $("#MontoAsignadoJN").attr("valor",0);

                

                var val = parseFloat( $("#MontoJN").attr("valor"));

                var sum = 0;

                var res = val - sum;

               

                $("#MontoPorAsignarJN").attr("valor", res.toFixed(2));

                $("#MontoPorAsignarJN").text("$ " + res.toLocaleString());


            }else{

                let num=parseFloat(z.TotalPlanificado)

                $("#MontoAsignadoJN").text("$ "+num.toLocaleString());
                $("#MontoAsignadoJN").attr("valor",z.TotalPlanificado);

                var val = parseFloat(z.montos);

                var res = val - z.TotalPlanificado;

                $("#MontoPorAsignarJN").attr("valor", res.toFixed(2));

                $("#MontoPorAsignarJN").text("$ " + res.toLocaleString());
                

            }
        }

    }).catch((error) => {

       

    });


}


var AsignarMontoPlanificadosGENERALDesarrollo = function (tipo,valoren0, idComponente, idRubro, valorPlanificado,valorporPlanificar) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", idComponente);
    paqueteDeDatos.append("idRubro", idRubro); 

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

           

            if(z.TotalPlanificado==null){
               
                $("#"+valorPlanificado).text("$ 0");
                $("#"+valorPlanificado).attr("valor",0);

                var val = parseFloat(valoren0);

                var sum = 0;

                var res = val - sum;

                $("#"+valorporPlanificar).attr("valor", res.toFixed(2));

                $("#"+valorporPlanificar).text("$ " + res.toLocaleString());

               
            }else{
                var totalPlanificado = parseFloat(z.TotalPlanificado);

                $("#"+valorPlanificado).text("$ "+totalPlanificado.toLocaleString());
                $("#"+valorPlanificado).attr("valor",totalPlanificado.toFixed(2));
                
                var val = parseFloat(z.montos);

                var res = val - z.TotalPlanificado;

                $("#"+valorporPlanificar).attr("valor", res.toFixed(2));

                $("#"+valorporPlanificar).text("$ " + res.toLocaleString());


            }
        }

    }).catch((error) => {

       

    });


}



var AsignarMontoPlanificadosGENERALTOTALDesarrollo = function (tipo,valoren0, identificador, valorPlanificado,valorporPlanificar) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
  

    axios({
        method: "post",
        url: "modelosBd/PAID_DESARROLLO/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

           

            if(z.TotalPlanificado==null){
               
                $("#"+valorPlanificado).text("Monto Planificado $ 0");
                $("#"+valorPlanificado).attr("valor",0);

                var val = ($("#montoPaidGeneralDesarrollo").attr("valor"));

                

                var sum = 0;

                var res = val - sum;

                $("#"+valorporPlanificar).attr("valor", res.toFixed(2));

                $("#"+valorporPlanificar).text("Monto Por Planificar $ " + res.toLocaleString());

               
            }else{

              

                var totalPlanificado = parseFloat(z.TotalPlanificado);

                $("#"+valorPlanificado).text("Monto Planificado $ "+totalPlanificado.toLocaleString());
                $("#"+valorPlanificado).attr("valor",totalPlanificado.toFixed(2));
                
                var val = parseFloat(z.monto);

                var res = val - z.TotalPlanificado;

                $("#"+valorporPlanificar).attr("valor", res.toFixed(2));

                $("#"+valorporPlanificar).text("Monto Por Planificar $ " + res.toLocaleString());


            }
        }

    }).catch((error) => {

       

    });


}

//selector eventos

var CargarSelector_eventos_DesarrolloJN = function (boton,tipo,idSelector) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", $("#JuegosNacionalesIDCOMPONENTE").val());
        paqueteDeDatos.append("idRubros", $("#JuegosNacionalesIDRUBRO").val());     

        axios({
            method: "post",
            url: "modelosBd/PAID_DESARROLLO/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById(idSelector);

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Opción--';
            opcion.value=0;
            opcion.selected;
            selector.appendChild(opcion);
            
            for (z of response.data.informacion) {
            
                var opcion = document.createElement("option");
            
                opcion.value=z.idEvento;

                opcion.text = z.nombre;
            
                selector.appendChild(opcion);
            
            }

        }).catch((error) => {



        });

    });

}
