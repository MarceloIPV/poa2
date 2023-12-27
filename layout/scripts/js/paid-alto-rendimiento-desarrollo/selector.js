var obtenerRubrosItemsVer = function (tipo,boton1,boton) {

    $(boton).click(function (e) {

            let idComponentes=$(boton1).attr('idComponentes');
            let idAsignacion=$(boton1).attr('idAsignacion');
            let idRubros=$(boton1).attr('idRubros');
            let identificador=$(boton1).attr('identificador');

            cerrarbtn($(boton),"#TablaItemsRubros");
       

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);
        paqueteDeDatos.append("idRubros", idRubros);
        //paqueteDeDatos.append("selector", selectorA);

       

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var tabla = document.getElementById('TablaItemsRubros');

            let y = 0;
            
            for (z of response.data.informacion) {
                //alert ('tabla no sale');
;
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
                celda2.innerHTML = '<p style="font-size: 15px"><textarea>'+z.nombreItem+'</textarea></p>';
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
                celda16.innerHTML = '<a data-dismiss="modal" id="contratacion__'+z.idProgramacionFinanciera+'"  class="btn btn-primary" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'" data-bs-toggle="modal" data-bs-target="#contrataciones__itemsPaidAR">Contratacion</i></a>';
                celda17.innerHTML = '<a data-dismiss="modal" id="guardar__'+z.idProgramacionFinanciera+'"  class="btn btn-primary" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'"><i class="fas fa-save"></i></a>';
                celda18.innerHTML = '<a data-dismiss="modal" id="eliminar__'+z.idProgramacionFinanciera+'"  class="btn btn-danger" idProbramacionFinanciera="'+z.idProgramacionFinanciera+'"><i class="fas fa-trash"></i></a>';

                $("#eliminar__" +z.idProgramacionFinanciera).attr('idComponentes',idComponentes);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idRubros',idRubros);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('idAsignacion',idAsignacion);
                $("#eliminar__" +z.idProgramacionFinanciera).attr('identificador',identificador);

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

               // alert(z.idItem);

                sumarIndicadoresGlobal__principal($(".sumador__montos"+z.idProgramacionFinanciera),$("#input_total"+z.idProgramacionFinanciera));
                funcion__solo__numero__montos($(".solo__numero__montos"));
                funcion__cambio__de__numero($(".solo__numero__montos"));

                obtenerContrataciónPublicaAR($("#contratacion__" +z.idProgramacionFinanciera),"obtener_contratacion_Publica_AR");
    
                actualizacion_tabla_rubos_item($("#guardar__" +z.idProgramacionFinanciera));
    
                eliminar_tabla_rubos_item($("#eliminar__" +z.idProgramacionFinanciera));
    
                cerrarbtn($("#eliminar__" +z.idProgramacionFinanciera),"#TablaItemsRubros");
    
                obtenerRubrosItemsVer("obtener__rubros__items__detalle", $("#guardarItemRubro"),$("#eliminar__" +z.idProgramacionFinanciera));
                
                eliminar_tabla_CatalogoCcontraloria_Paid_AR($("#eliminar__" +z.idProgramacionFinanciera));
                
            }


        }).catch((error) => {
            
        });
    });


}
//*********************************************** obtenerRubros__items **********************************************//
var obtenerRubros__items = function (boton, tipo, identificador) {

    $(boton).click(function (e) {

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
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var titulo = document.getElementById('RubrosTítulo');

            titulo.textContent='Rubro: '+nombre;
            var selector = document.getElementById('SelectorItemRubro');

            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value = z.idItem;

                opcion.text = '(' + z.itemPreesupuestario + ') ' + z.nombreItem;

                selector.appendChild(opcion);

            }

            $("#guardarItemRubro").attr('idComponentes', idComponentes);
            $("#guardarItemRubro").attr('idRubros', idRubros);
            $("#guardarItemRubro").attr('idAsignacion', idAsignacion);
            $("#guardarItemRubro").attr('identificador', identificador);

            obtenerRubrosItemsVer("obtener__rubros__items__detalle", idComponentes, idAsignacion, identificador, idRubros, $("#verItemsRubros"));

        }).catch((error) => {

        });

    });

}


var obtenerRubros = function (boton, tipo, identificador) {

    $(boton).click(function (e) {

        let idComponentes = $(this).attr('idComponentes');
        let idAsignacion = $(this).attr('idAsignacion');

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("idComponentes", idComponentes);
        paqueteDeDatos.append("idAsignacion", idAsignacion);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var tabla = document.getElementById('rubroslistaD');

            let y = 0;

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

                celda1.setAttribute('align', 'center');
                celda2.setAttribute('align', 'center');
                celda3.setAttribute('align', 'center');
                celda4.setAttribute('align', 'center');
                celda5.setAttribute('align', 'center');
                celda6.setAttribute('align', 'center');

                celda1.innerHTML = '<p style="font-size: 15px">' + (y = y + 1) + '</p>';
                celda2.innerHTML = '<p style="font-size: 15px">' + z.nombreRubros + '</p>';
                celda3.innerHTML = '<p style="font-size: 15px">$ '+valorMonto.toLocaleString()+ '</p>';
                celda4.innerHTML = '<p style="font-size: 15px" id="valorAsignadoAR'+z.idRubros+'"></p>';
                celda5.innerHTML = '<p style="font-size: 15px" id="valorPorAsignarAR'+z.idRubros+'"></p>';
                
                celda6.innerHTML = '<a data-dismiss="modal" id="rubros__' + z.idRubros + '__' + idComponentes + '"  class="btn btn-primary" data-bs-toggle="modal" nombreRubro="'+z.nombreRubros+'" idRubros="'+z.idRubros+'" idAsignacion="'+idAsignacion+'" idComponentes="'+idComponentes+'" identificador="'+identificador+'" data-bs-target="#itemsCargados">Ver</a>';
                
                
                AsignarMontoPlanificadosGENERALRubrosAR("obtener_valor_total_matrices_rubro_AR",valorMonto.toFixed(2),idComponentes,z.idRubros,"valorAsignadoAR"+z.idRubros,"valorPorAsignarAR"+z.idRubros);  

                
                obtenerRubros__items($("#rubros__" + z.idRubros + "__" + idComponentes), "obtener__rubros__items__inversion", identificador);
                
                deshabilitarBtnPaidGeneralAR("#valorPorAsignarAR"+z.idRubros,"#rubros__" +z.idRubros+"__"+idComponentes,"#itemsCargados","#modalDatosInconclusos")
                
                }else{

                }
            }


        }).catch((error) => {

        });

    });

}

//*********************************************** obtenerIndicadoresRubro ***************************************//
var obtenerIndicadoresRubro = function (boton,tipo) {

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
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {
            
        
            var z = response.data.informacion;

            console.log(z);

            if(z.length < 1){

               
                insertar_indicadores_organismo(boton);

                obtenerIndicadoresRubro2($(boton),"obtener_indicadores_inversion");

        
            }else{

                
            var tabla = document.getElementById('tablaIndicadoresPaid');

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

                $("#guardarIndicadores").attr('idPaidIndicador',z.idPaidIndicador);            

            }

            }
           
      
        }).catch((error) => {

        });

    });

}

//***************************************** obtenerIndicadoresRubro2 ****************************************//
var obtenerIndicadoresRubro2 = function (boton,tipo) {

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
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {


        var tabla = document.getElementById('tablaIndicadoresPaid');

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

            $("#guardarIndicadores").attr('idPaidIndicador',z.idPaidIndicador);

        
        }

       
        

    }).catch((error) => {



    });


}

//******************************************** CargarMontoAsignado_Paid *********************************************//
var CargarMontoAsignado_Paid = function (tipo, identificador) {
    

    let paqueteDeDatos = new FormData();
    
    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
  //  alert(tipo);
    //alert(identificador);

   
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        var tituloMonto = document.getElementById('montoPaidGneral');
       
        for (z of response.data.informacion) {

            let num =parseFloat(z.monto);

            
            tituloMonto.textContent='Monto: $'+num.toLocaleString();
            $("#montoPaidGneral").attr("valor",num.toFixed(2))
        }
  
    }).catch((error) => {

    });

}

//********************************************* tablaPrincipal ***********************************************************//
var tablaPrincipal = function (tipo, body, identificador) {

   

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
    
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {
        
        var tabla = document.getElementById('tablaPAIDGeneral');
        let y = 0;
       
        for (x of response.data.informacion) {

            
            if(x.montos > 0){
            
            let fila = tabla.insertRow();

            

            let celda1 = fila.insertCell(0);
            let celda2 = fila.insertCell(1);
            let celda3 = fila.insertCell(2);
            let celda4 = fila.insertCell(3);
            let celda5 = fila.insertCell(4);

            celda1.setAttribute('align', 'center');
            celda2.setAttribute('align', 'center');
            celda3.setAttribute('align', 'center');
            celda4.setAttribute('align', 'center');
            celda5.setAttribute('align', 'center');

            celda1.innerHTML = (y = y + 1);
            celda2.innerHTML = x.nombreComponentes;
            celda3.innerHTML = x.nombreIndicadores;
            celda4.innerHTML = '<button type"button" id = "btnVerIndicador'+x.idComponentes+'" class="btn btn-success"style="width=200px;" data-bs-toggle="modal" data-bs-target="#modalActividad">VER</button>';
            celda5.innerHTML = '<button type"button" class="btn btn-success" style="width=200px;" " id="item' + x.idComponentes + '" idComponentes="' + x.idComponentes + '" idAsignacion="' + x.idAsignacion + '" data-bs-toggle="modal" data-bs-target="#itemsCargados1">VER</button>';


            $("#btnVerIndicador"+x.idComponentes).attr('idComponentes',x.idComponentes);
            $("#btnVerIndicador"+x.idComponentes).attr('identificador',identificador);
            $("#btnVerIndicador"+x.idComponentes).attr('idIndicadores',x.idIndicadores);
      
            obtenerRubros($("#item" + x.idComponentes), "obtener__rubros__inversion", identificador);
            obtenerIndicadoresRubro($("#btnVerIndicador"+x.idComponentes),"obtener_indicadores_inversion")
        }
    }


    }).catch((error) => {

    });

}

//************************************************ RecargarRubros__items ************************************************//
var RecargarRubros__items = function (tipo,idComponentes1,idAsignacion1,idRubros1, identificador1) {

    let idComponentes = idComponentes1;
    let idAsignacion = idAsignacion1;
    let idRubros = idRubros1;

    let paqueteDeDatos = new FormData();
    
    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponentes", idComponentes);
    paqueteDeDatos.append("idAsignacion", idAsignacion);
    paqueteDeDatos.append("identificador", identificador1);
    paqueteDeDatos.append("idRubros", idRubros);


    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        var selector = document.getElementById('SelectorItemRubro');

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


//************************************************ mostrar_datos_deporte ****************************************************//
var mostrar_datos_deporte = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectDeporte');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.idDeporte;
                opcion.text = z.nombreDeporte;
                selector.appendChild(opcion);
            }

        }).catch((error) => {

        });
    });
}


//*********************************************** mostrar_datos_prueba *********************************************//
var mostrar_datos_prueba = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectPrueba');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.idPrueba;
                opcion.text = z.nombrePrueba;
                selector.appendChild(opcion);
            }
        }).catch((error) => {

        });
    });
}

//************************************************ mostrar_datos_modalidad **********************************************************//
var mostrar_datos_modalidad = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectModalidad');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.idModalidad;
                opcion.text = z.nombreModalidad;
                selector.appendChild(opcion);
            }

        }).catch((error) => {

        });
    });
}

//*************************************************** mostrar_datos_categoria ********************************************************//
var mostrar_datos_categoria = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectCategoria');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.idCategoria;
                opcion.text = z.nombreCategoria;
                selector.appendChild(opcion);
            }

        }).catch((error) => {

        });
    });
}

//*************************************************** mostrar_datos_ciudad ********************************************************//
var mostrar_datos_ciudad = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectCiudad');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.id;
                opcion.text = z.estadonombre;
                selector.appendChild(opcion);
            }

        }).catch((error) => {

        });
    });
}




//*************************** INTERDICIPLINARIO *******************************//
var mostrar_datos_modalidad_inter = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectModalidadInter');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);

            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.idModalidad;
                opcion.text = z.nombreModalidad;
                selector.appendChild(opcion);
            }

        }).catch((error) => {

        });
    });
}



//*************************** Mostrar COMPONNETE Y RUBRO *******************************//

var mostrar_titulo_monto_rubros_principal = function (tipo, identificador) {
     

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val() );
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
       
    }).then((response) => { 

       
        x=response.data.informacion;
        for (i=0; i<x.length; i++) {

                var titulo1 = document.getElementById('tituloComponenteAR');
                titulo1.textContent="Componente: "+x[i].nombreComponentes; 

                var titulo2 = document.getElementById('tituloRubroAR');
                titulo2.textContent="Rubro: "+x[i].nombreRubros; 
                
                let num =parseFloat(x[i].montos)

                $("#MontoAR").text("$"+num.toLocaleString());
                $("#MontoAR").attr("valor",x[i].montos);
                $("#MontoAR").val(x[i].montos);

            
        }

    }).catch((error) => {

    });

}

//********************************************* CargarSelector_Modalidad_Paid_NecesidadesInd **************************************//
var CargarSelector_Modalidad_Paid_NecesidadesInd = function (boton,tipo,identificador) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('modalidaSelectordNecesidadesIndividuales');

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Modalidad--';
            opcion.value=0;

            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value=z.idModalidad;

                opcion.text = z.nombreModalidad;

                selector.appendChild(opcion);

            }

        }).catch((error) => {



        });

    });

}
//************************************ sumaRestaMontosRubrosAR *************************************************///
var sumaRestaMontosRubrosAR = function (tipo,idMontoAsignado,restaMontos,MontoPorAsignar) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val() );
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());


    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {

        

            if(z.valorAsignado==null){

                $(idMontoAsignado).text("$ 0");
                $(idMontoAsignado).attr("valor",0);


                var val = parseFloat($("#MontoAR").attr("valor"));

                var sum=0;
                
                var res= val - sum;	

            

                $(MontoPorAsignar).attr("valor", res.toFixed(2));
                $(MontoPorAsignar).text("$ " + res.toLocaleString());
                $(MontoPorAsignar).val(res.toFixed(2));



            }else{
                let num=parseFloat(z.valorAsignado)
                $(idMontoAsignado).text("$ "+num.toLocaleString());
                $(idMontoAsignado).attr("valor",z.valorAsignado);


                var val = parseFloat(z.montos);
                
                var res= val - z.valorAsignado;	

                $(MontoPorAsignar).attr("valor", res.toFixed(2));
                $(MontoPorAsignar).text("$ " + res.toLocaleString());
                $(MontoPorAsignar).val(res.toFixed(2));


            }
        }

    }).catch((error) => {       

    });

}


//*************************************** MOSTRAR MONTO ASIGNADO Y MONTO POR ASIGNAR  EVENTOS *******************************************//
var pasar_monto_evento_general_principal = function (tipo, identificador) {
  
    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
       
    }).then((response) => { 
       
        x=response.data.informacion;
        for (i=0; i<x.length; i++) {

            if(x[i].nombreRubros == 'Eventos de preparación y competencia'){
        
                
                $("#montoGeneralEventosAR").attr("valor",x[i].montos);               
              
            }            
            
        }

    }).catch((error) => {

    });

}



var AsignarMontoAsignadoPaidGeneralEventosAR = function (tipo) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {       

        for (z of response.data.informacion) {

            if(z.valorAsignado==null){
                
                $("#montoAsignadoGeneralEventosAr").val(0);
                $("#montoAsignadoGeneralEventosAr").attr("valor",0);

 
                restarIndicadoresGeneralAR($("#montoGeneralEventosAR"),$(".restaDeMontosEventos"),$("#montoPorAsignarGeneralEventosAR"));
               
            }else{
                
                $("#montoAsignadoGeneralEventosAr").val(z.valorAsignado);

                $("#montoAsignadoGeneralEventosAr").attr("valor",z.valorAsignado);

                restarIndicadoresGeneralAR($("#montoGeneralEventosAR"),$(".restaDeMontosEventos"),$("#montoPorAsignarGeneralEventosAR"));
                
            }
        }

    }).catch((error) => {       

    });

}


//*************************************** MOSTRAR MONTO ASIGNADO Y MONTO POR ASIGNAR  INTERDISCIPLINARIO *******************************************//
var pasar_monto_interdisciplinario_general_principal = function (tipo, identificador) {
  
    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
       
    }).then((response) => { 
       
        x=response.data.informacion;
        for (i=0; i<x.length; i++) {

            if(x[i].nombreRubros == 'Equipo Interdisciplinario'){
        
                
                $("#montoGeneralInterdisciplinarioAR").attr("valor",x[i].montos);               
              
            }            
            
        }

    }).catch((error) => {

    });

}

var AsignarMontoAsignadoPaidGeneralInterdisciplinarioAR = function (tipo) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {       

        for (z of response.data.informacion) {

            if(z.valorAsignado==null){
                
                $("#montoAsignadoGeneralInterdisciplinarioAr").val(0);
                $("#montoAsignadoGeneralInterdisciplinarioAr").attr("valor",0);

 
                restarIndicadoresGeneralAR($("#montoGeneralInterdisciplinarioAR"),$(".restaDeMontosInter"),$("#montoPorAsignarGeneralInterdisciplinarioAR"));
               
                
            }else{
                $("#montoAsignadoGeneralInterdisciplinarioAr").val(z.valorAsignado);

                $("#montoAsignadoGeneralInterdisciplinarioAr").attr("valor",z.valorAsignado);

                restarIndicadoresGeneralAR($("#montoGeneralInterdisciplinarioAR"),$(".restaDeMontosInter"),$("#montoPorAsignarGeneralInterdisciplinarioAR"));               
            }
        }

    }).catch((error) => {       

    });

}

//*************************************** MOSTRAR MONTO ASIGNADO Y MONTO POR ASIGNAR  Necesidades Individuales *******************************************//

var pasar_monto_NecesidadesIndividuales_general_principal = function (tipo, identificador) {
  
    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
       
    }).then((response) => { 
       
        x=response.data.informacion;
        for (i=0; i<x.length; i++) {

            if(x[i].nombreRubros == 'Necesidades individuales'){
        
                
                $("#montoGeneralNeceIndividialesAR").attr("valor",x[i].montos);
               
              
            }
            
            
        }

    }).catch((error) => {

    });

}

var AsignarMontoAsignadoPaidGeneralNecesidadesIndividualesAR = function (tipo) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {       

        for (z of response.data.informacion) {

            if(z.valorAsignado==null){
                
                $("#montoAsignadoGeneralNeceIndividialesAr").val(0);
                $("#montoAsignadoGeneralNeceIndividialesAr").attr("valor",0);

 
                restarIndicadoresGeneralAR($("#montoGeneralNeceIndividialesAR"),$(".restaDeMontosNecesidadesInd"),$("#montoPorAsignarGeneralNeceIndividialesAR"));
               
                
            }else{
                $("#montoAsignadoGeneralNeceIndividialesAr").val(z.valorAsignado);

                $("#montoAsignadoGeneralNeceIndividialesAr").attr("valor",z.valorAsignado);

                restarIndicadoresGeneralAR($("#montoGeneralNeceIndividialesAR"),$(".restaDeMontosNecesidadesInd"),$("#montoPorAsignarGeneralNeceIndividialesAR"));
            }

        }

    }).catch((error) => {       

    });

}


//****************************************************** SELECT PAIS *************************************************//


var mostrar_datos_pais = function (boton, tipo, identificador) {

    $(boton).click(function (e) {
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);
               
        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectpais');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);
            
            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.id;
                opcion.text = z.paisnombre;
                selector.appendChild(opcion);
                
                
            }
               

        }).catch((error) => {

        });
    });
}

//***************************************************** SELECCION PAIS Y CIUDAD **********************************************************************//
var AsignarCiudadesSegunPais = function (tipo) {  
    $("#idSelectpais").on("change", function() {        
         $("#idSelectCiudad"+" option").remove();
        let id=$("#idSelectpais").val();
        let paqueteDeDatos = new FormData();
        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("id", id);  
      

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('idSelectCiudad');
            var opcion = document.createElement("option");
            opcion.text = '--Seleccione Una Opción--';
            opcion.value = 0;
            selector.appendChild(opcion);
            
            for (z of response.data.informacion) {
                var opcion = document.createElement("option");
                opcion.value = z.ubicacionpaisid;
                opcion.text = z.estadonombre;
                selector.appendChild(opcion);           
                    
            }           

        }).catch((error) => {

        });
    });
}

//********************************************** obtenerContrataciónPublicaAR *******************************************************//
var obtenerContrataciónPublicaAR = function (boton,tipo) {

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
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var z = response.data.informacion;            

            if(z.length < 1){
               
                insertar__contrataciones__publicas_paid_defectoAR(idComponentes,idRubros,idAsignacion,identificador,idItem);
                obtenerContrataciónPublicaDesarrollo2AR($(boton),"obtener_contratacion_Publica_AR");        
            }else{                
                
            var tabla = document.getElementById('divContratacionPublicaAR');

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

                insertar__contrataciones__publicas_paidAR($("#guardarCatalogoContraloriaDesarrollo"));

            }

            }

        }).catch((error) => {



        });

    });

}

var obtenerContrataciónPublicaDesarrollo2AR = function (boton,tipo) {

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
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {


        var tabla = document.getElementById('divContratacionPublicaAR');

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

                insertar__contrataciones__publicas_paidAR($("#guardarCatalogoContraloriaDesarrollo"));

            }

       
        

    }).catch((error) => {



    });


}


var CargarSelector_Modalidad_Paid_NecesidadesGen = function (boton,tipo,identificador) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);
        paqueteDeDatos.append("identificador", identificador);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
            data: paqueteDeDatos,
            headers: { "Content-Type": "multipart/form-data" },
        }).then((response) => {

            var selector = document.getElementById('modalidaSelectordNecesidadesGenerales');

            var opcion = document.createElement("option");
            opcion.text='--Seleccione Una Modalidad--';
            opcion.value=0;

            selector.appendChild(opcion);

            for (z of response.data.informacion) {

                var opcion = document.createElement("option");

                opcion.value=z.idModalidad;

                opcion.text = z.nombreModalidad;

                selector.appendChild(opcion);

            }

        }).catch((error) => {



        });

    });

}




//*************************************** MOSTRAR MONTO ASIGNADO Y MONTO POR ASIGNAR  Necesidades Generales******************************************//

var pasar_monto_NecesidadesGenerales_general_principal = function (tipo, identificador) {
  
    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);
    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
       
    }).then((response) => { 
       
        x=response.data.informacion;
        for (i=0; i<x.length; i++) {

            if(x[i].nombreRubros == 'Necesidades generales'){
        
                
                $("#montoGeneralNeceGeneralesAR").attr("valor",x[i].montos);
               
              
            }
            
            
        }

    }).catch((error) => {

    });

}

var AsignarMontoAsignadoPaidGeneralNecesidadesGeneralesAR = function (tipo) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {       

        for (z of response.data.informacion) {

            if(z.valorAsignado==null){
                
                $("#montoAsignadoGeneralNeceGeneralesAR").val(0);
                $("#montoAsignadoGeneralNeceGeneralesAR").attr("valor",0);

 
                restarIndicadoresGeneralAR($("#montoGeneralNeceGeneralesAR"),$(".restaDeMontosNecesidadesInd"),$("#montoPorAsignarGeneralNeceIndividialesAR"));
                sumarIndicadoresRubrosAR($(".sumador__valor_rubros_monto_asignado"),"montos_asignados_rubros", "monto planificado: $"); 
                sumarIndicadoresRubrosAR($(".sumador__valor_rubros_monto_por_asignar"),"montos_por_asignar_rubros", "monto por Planificar: $");
            
                
            }else{
                $("#montoAsignadoGeneralNeceGeneralesAR").val(z.valorAsignado);

                $("#montoAsignadoGeneralNeceGeneralesAR").attr("valor",z.valorAsignado);

                restarIndicadoresGeneralAR($("#montoGeneralNeceGeneralesAR"),$(".restaDeMontosNecesidadesGen"),$("#montoPorAsignarGeneralNeceGeneralesAR"));
                sumarIndicadoresRubrosAR($(".sumador__valor_rubros_monto_asignado"),"montos_asignados_rubros", "monto planificado: $"); 
                sumarIndicadoresRubrosAR($(".sumador__valor_rubros_monto_por_asignar"),"montos_por_asignar_rubros", "monto por Planificar: $");
            }

        }

    }).catch((error) => {       

    });

}

var CargarSelector_Deportes_Paid_AR = function (boton,tipo,idSelector) {

    $(boton).click(function (e){

        let paqueteDeDatos = new FormData();

        paqueteDeDatos.append("tipo", tipo);

        axios({
            method: "post",
            url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
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


//------------------------------ VALOR TOTAL EVENTOS -----------------------------------

var valor_total_eventos = function (tipo) {   

    let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
    let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();

    let paqueteDeDatos = new FormData();
    
    paqueteDeDatos.append("tipo", tipo);  
    paqueteDeDatos.append("JuegosNacionalesIDComponentes", JuegosNacionalesIDComponentes);
    paqueteDeDatos.append("JuegosNacionalesIDRubro", JuegosNacionalesIDRubro);


    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.valorTotal==null){
                $("#total_eventos_preparacion").text(": 0");
                $("#total_eventos_preparacion").attr("valor",0);
            }else{
                let num=parseFloat(z.valorTotal);
                $("#total_eventos_preparacion").text(": "+num.toLocaleString());
                $("#total_eventos_preparacion").attr("valor",z.valorTotal);            
            }
        }
    }).catch((error) => {     

    });
}

//------------------------------ VALOR TOTAL EQUIPO INTERDISCIPLINARIO-----------------------------------

var valor_total_equipo_interdisciplinario = function (tipo) {   


    let JuegosNacionalesIDComponentes =$("#JuegosNacionalesIDCOMPONENTE").val();    
    let JuegosNacionalesIDRubro =$("#JuegosNacionalesIDRUBRO").val();
    

    let paqueteDeDatos = new FormData();
   
    paqueteDeDatos.append("tipo", tipo);  
    paqueteDeDatos.append("idComponente", JuegosNacionalesIDComponentes);
    paqueteDeDatos.append("idRubro", JuegosNacionalesIDRubro);
;

    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

        for (z of response.data.informacion) {    
            if(z.valorAsignado==null){
                $("#total_equipo_interdiciplinario").text(": 0");
                $("#total_equipo_interdiciplinario").attr("valor",0);
            }else{
                let num=parseFloat(z.valorAsignado)
                $("#total_equipo_interdiciplinario").text(": "+num.toLocaleString());
                $("#total_equipo_interdiciplinario").attr("valor",z.valorAsignado);            
            }
        }
    }).catch((error) => {     

    });
}

/*************************************MONTONES GENERALES*************************************************************** */
var AsignarMontoPlanificadosGENERALRubrosAR = function (tipo,valoren0, idComponente, idRubro, valorPlanificado,valorporPlanificar) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    
    paqueteDeDatos.append("idComponente", idComponente);
    paqueteDeDatos.append("idRubro", idRubro);
  


    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {
        
        for (z of response.data.informacion) {


            if(z.TotalPlanificado==null){
               
                $("#"+valorPlanificado).text(" $ 0");
                $("#"+valorPlanificado).attr("valor",0);

                var val = parseFloat(valoren0);

                var sum = 0;

                var res = val - sum;

                

                $("#"+valorporPlanificar).attr("valor", res.toFixed(2));

                $("#"+valorporPlanificar).text(" $ " + res.toLocaleString());

               
            }else{

            

                var totalPlanificado = parseFloat(z.TotalPlanificado);

                $("#"+valorPlanificado).text(" $ "+totalPlanificado.toLocaleString());
                $("#"+valorPlanificado).attr("valor",totalPlanificado.toFixed(2));
                
                var val = parseFloat(z.montos);


                var res = val - z.TotalPlanificado;

    
                $("#"+valorporPlanificar).attr("valor", res.toFixed(2));

                $("#"+valorporPlanificar).text("$ " + res.toLocaleString());


            }
        }

    }).catch((error) => {
    
        alert("error")

    });


}


var AsignarMontoPlanificadosGENERALTOTALAR = function (tipo, identificador, valorPlanificado,valorporPlanificar) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);


    axios({
        method: "post",
        url: "modelosBd/paid-alto-rendimiento-modelos/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {

       

        for (z of response.data.informacion) {

          
            if(z.TotalPlanificado==null){
               
                $("#"+valorPlanificado).text("Monto Planificado $ 0");
                $("#"+valorPlanificado).attr("valor",0);

                var val = ($("#montoPaidGneral").attr("valor"));

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


