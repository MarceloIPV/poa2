// $(document).ready(function () {


function datatabletsConfiguration(tabla, columnDefs) {

    $(tabla).DataTable().destroy();
  var table = $(tabla).DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "No existen datos",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    dom: "Bfrtip",
    buttons: ["excel"],
    columnDefs: columnDefs,
    bLengthChange: false,
    pagingType: "full_numbers",
    Paginate: true,
    pagingType: "full_numbers",
    retrieve: true,
    paging: false,
    pageLength: false,
  });

  return table;
}

    var selectorExcel__poa__inicial=function(selector,contenedorExcel,contedorManual){

        $(selector).change(function(e){

            if($(this).val()=="manual"){
                $(contedorManual).show();
                $(contenedorExcel).hide();
            }else if($(this).val()=="excel"){
                $(contedorManual).hide();
                $(contenedorExcel).show();
            }else{
                $(contedorManual).hide();
                $(contenedorExcel).hide();
            }

        });
    
    }

    var visualizador__excel=function(boton,titulosArray,tipo,boleano,bodyArray,accionesMatriz){

        $(boton).click(function(e){

            
            let idActividad=$(this).attr("idActividad");

            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('tipo',tipo);
            paqueteDeDatos.append('documentoExcel', $("#cargar__archivo__"+idActividad)[0].files[0]); 
            paqueteDeDatos.append('idActividad',idActividad);
            paqueteDeDatos.append('accionesMatriz',accionesMatriz);

            $.ajax({

                type:"POST",
                url:"modelosBd/poaInicial2024/cargaExcel.md.php",
                contentType: false,
                data:paqueteDeDatos,
                processData: false,
                cache: false, 
                success:function(response){

                    var array = new Array(); 

                    let elementos=JSON.parse(response);

                    let array__errorItem__string=elementos['array__errorItem__string'];
                    let array__errorItemRepetido__string=elementos['array__errorItemRepetido__string'];
                    let array__camposVacios__string=elementos['array__camposVacios__string'];
                    let array__errorCampoNoCorresponde__string=elementos['array__errorCampoNoCorresponde__string'];

                    let array_errorItem = array__errorItem__string.split(";").filter(Boolean);
                    let array__errorItemRepetido = array__errorItemRepetido__string.split(";").filter(Boolean);
                    let array__camposVacios = array__camposVacios__string.split(";").filter(Boolean);
                    let array__errorCampoNoCorresponde = array__errorCampoNoCorresponde__string.split(";").filter(Boolean);
                    
                    
                    if(array__errorCampoNoCorresponde.length >0 || array__camposVacios.length >0 || array__errorItemRepetido.length >0 || array_errorItem.length >0){

                        alertify.set("notifier","position", "top-center");
                        alertify.notify("Error de carga de información ver la tabla de errores a continuación", "error", 5, function(){});

                        let aux=0;

                        $("#contenedorTabla__"+idActividad).html(" ");

                        $("#contenedorTabla__"+idActividad).append('<div class="table-responsive"><center><table id="tableErrores__'+idActividad+'"><thead><tr><th colspan="2"><center>No se puede cargar la información por los siguientes errores:</center></th></tr></thead><tbody id="bodyErrores__'+idActividad+'"></tbody></table></center></div>');

                        for(let i = 0; i < array__errorCampoNoCorresponde.length; i++){

                            aux++;

                            $("#bodyErrores__"+idActividad).append("<tr><td>"+aux+"</td><td>"+array__errorCampoNoCorresponde[i]+"</td></tr>");

                        }

                        for(let i = 0; i < array__camposVacios.length; i++){

                            aux++;

                            $("#bodyErrores__"+idActividad).append("<tr><td>"+aux+"</td><td>"+array__camposVacios[i]+"</td></tr>");
  
                        }

                        for(let i = 0; i < array__errorItemRepetido.length; i++){

                            aux++;

                            $("#bodyErrores__"+idActividad).append("<tr><td>"+aux+"</td><td>"+array__errorItemRepetido[i]+"</td></tr>");

                        }


                        for(let i = 0; i < array_errorItem.length; i++){

                            aux++;

                            $("#bodyErrores__"+idActividad).append("<tr><td>"+aux+"</td><td>"+array_errorItem[i]+"</td></tr>");

                        }

                    }else{

                        
                        $("#contenedorTabla__"+idActividad).html(" ");

                         if(tipo == "sueldos__salarios"){

                            $("#contenedorTabla__"+idActividad).append('<div class="col col-12 d-flex mt-4"><div class="col col-6"><center><strong>Seleccione un Régimen</strong></center></div><div class="col col-6"><center><select class="form-control" id="select__Regimen'+idActividad+'"><option value="0">--Seleccione--</option><option value="Costa">Costa</option><option value="Sierra">Sierra</option><option value="Amazonia">Amazonia</option></select></center></div></div>');

                            guardar__Regimen($("#select__Regimen"+idActividad));
                        }

                        $("#contenedorTabla__"+idActividad).append('<div class="table-responsive"><centre><table id="matriz_Actividad_'+idActividad+'"><thead><tr id="theadTabla"></tr></thead><tbody id="body__'+idActividad+'"></tbody></table></centre></div>');

                        /*=========================================================
                        =            Agregar meses dependiendo el caso            =
                        =========================================================*/
                        
                        
                        if (boleano==true) {

                            if(bodyArray.indexOf("enero__array") === -1){
                                bodyArray.push("enero__array","febrero__array","marzo__array","abril__array","mayo__array","junio__array","julio__array","agosto__array","septiembre__array","octubre__array","noviembre__array","diciembre__array","total__array");
                                titulosArray.push("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total");
                            }
                            
                        }

                        
                        /*=====  End of Agregar meses dependiendo el caso  ======*/

                        /*===============================================
                        =            Encabezados de la tabla            =
                        ===============================================*/
                        
                        for (let i = 0; i < titulosArray.length; i++) {
                            
                            $("#theadTabla").append("<th><center>"+titulosArray[i] +"</center></th>");

                        }

                        /*=====  End of Encabezados de la tabla  ======*/
                        

                        
                        /*==============================================================
                        =            Generar varaibles internas del backend            =
                        ==============================================================*/
                        
                        
                        for (var i = 0; i <  bodyArray.length; i++) {
                            var elemento=elementos[bodyArray[i]];
                            array.push(elemento);
                        }

                        
                        /*=====  End of Generar varaibles internas del backend  ======*/
                        
                        /*=====================================
                        =            Generar filas            =
                        =====================================*/
                        
                        let contadorM=array[0].length;

                        let auxIncremental=0;

                        var arrayFilas = new Array();

                        while(auxIncremental<contadorM){

                            var arrayFilasUnitarias = new Array();

                            for (var i = 0; i <  array.length; i++) {

                                arrayFilasUnitarias.push(array[i][auxIncremental]);

                            }

                            arrayFilas.push(arrayFilasUnitarias);

                            auxIncremental++;

                        }
                        
                        /*=====  End of Generar filas  ======*/
                        
                        /*================================================
                        =            Construcción datatablets            =
                        ================================================*/
                        
                        var table = datatabletsConfiguration($("#matriz_Actividad_"+idActividad),false);

                        

                        for (var i = 0; i <  arrayFilas.length; i++) {

                            var filaData=new Array();

                            for (var z = 0; z <  arrayFilas[i].length; z++) {

                                filaData.push(arrayFilas[i][z]);

                            }

                            table.row.add(filaData);

                        }

                        table.draw();

                        let numeroArray = array[0].length;

                        if(numeroArray > 0){
                            $("#contenedorTabla__"+idActividad).append('<div class="col col-12 mt-4"><center><a class="btn btn-success" id="guardarMatriz__'+idActividad+'">Guardar</a></center></div>');
                        }else if(numeroArray == 0){
                            alertify.set("notifier","position","top-center");
                            alertify.notify("No existen datos en el Archivo","error",6,function(){});
                        }


                        var arrayAct = ['id__deporte__array','id__provincia__array','id__pais__array','id__alcanse__array'];

                        if(tipo == "act__deportivas"){
                            for (var i = 0; i <  arrayAct.length; i++) {
                                var elemento=elementos[arrayAct[i]];
                                array.push(elemento);
                            }
                        }

                        if(tipo == "mantenimiento"){

                            var elemento=elementos['id__provincia__array'];
                            array.push(elemento);
                        }
                        
                        guardar__Matrices($("#guardarMatriz__"+idActividad),array,idActividad,tipo);

                        
                        /*=====  End of Construcción datatablets  ======*/

                    }

                    
                },
                error:function(){

                }

            });

        });
    
    }



    var construccion__modal__excel=function(boton,titulosArray,tipo,documento,boleano,bodyArray,accionesMatriz,tituloModal){

        $(boton).click(function(e){

            let idActividad=$(this).attr("idActividad");

            $("#divcontratcionActividades").html(" ");

            $(".modal-title").text("Carga de Archivo Excel "+tituloModal);

            $("#divcontratcionActividades").append("<div class='col col-3'><a class='btn btn-success' id='formatoDescarga__"+idActividad+"' download='formatoMatriz__"+tipo+"'>Descargar Formato "+tituloModal+"</a></div><div class='col col-3 font-bold'>Subir Archivo</div><input class='col col-3' type='file' id='cargar__archivo__"+idActividad+"' /> <div class='col col-3'><a class='btn btn-primary' id='visualizador__"+idActividad+"' idActividad='"+idActividad+"'>Visualizar</a></div><div class='col col-12' id='contenedorTabla__"+idActividad+"'></div>");

       
            $("#formatoDescarga__"+idActividad).attr("href",documento);


            visualizador__excel($("#visualizador__"+idActividad),titulosArray,tipo,boleano,bodyArray,accionesMatriz);

        });
    
    }


    var guardar__Matrices = function(boton,data,idActividad,tipo){

        $(boton).click(function(e){

            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append('tipo',tipo);
            paqueteDeDatos.append('idActividad',idActividad);
            paqueteDeDatos.append('data',JSON.stringify(data));

            alertify.confirm("¿Está seguro de guardar la matriz?", function(result) {
                if (result) {
                    
                    $.ajax({

                        type:"POST",
                        url:"modelosBd/poaInicial2024/insertaMatriz.md.php",
                        contentType: false,
                        data:paqueteDeDatos,
                        processData: false,
                        cache: false, 
                        success:function(response){
        
                            let elementos = JSON.parse(response);
                            let mensaje = elementos['mensaje'];
        
                            if (mensaje == 1) {
    
                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Registro realizado correctamente", "success", 5, function() {});

                                window.setTimeout(function() {
                                    window.location = "planificacion";
                                }, 3000);
        
                            }else if(mensaje == 2){

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Los montos totales superan el techo asignado", "error", 5, function() {});
    
                            }else if(mensaje == 3){

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("Los montos superan el monto programado", "error", 5, function() {});

                            }else if(mensaje == 4){

                                alertify.set("notifier", "position", "top-center");
                                alertify.notify("No se ha encontrado el regimen del organismo", "error", 5, function() {});
                            }
                            
                        },
                        error:function(){
        
                        }
        
                    });




                } else {

                    alertify.set("notifier", "position", "top-center");
                    alertify.notify("Acccion Cancelada", "error", 3, function() {});
                }
            });

        });
    }


    var guardar__Regimen = function(select){
        $(select).change(function (e) { 
            e.preventDefault();

            let paqueteDeDatos = new FormData();

            let idValor = $(this).val();
            let idOrganismo = $("#idOrganismoPrincipal").val();

            paqueteDeDatos.append("tipo","regimen");
            paqueteDeDatos.append("idValor",idValor);
            paqueteDeDatos.append("idOrganismo",idOrganismo);

            if(idValor == 0){
                alertify.set("notifier", "position", "top-center");
                alertify.notify("El régimen no puede ser vacío", "error", 5, function() {});
            }else{
                $.ajax({

                    type:"POST",
                    url:"modelosBd/inserta/insertaAcciones.md.php",
                    contentType: false,
                    data:paqueteDeDatos,
                    processData: false,
                    cache: false, 
                    success:function(response){
    
                        let elementos=JSON.parse(response);
                        let mensaje = elementos['mensaje'];
    
                        if (mensaje == 1) {
        
                            alertify.set("notifier", "position", "top-center");
                            alertify.notify("Registro actualizado", "success", 3, function() {});
    
                        }
    
                    },
                    error:function(){
    
                    }
    
                });
            }
            
        });
    }

// });