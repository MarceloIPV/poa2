// $(document).ready(function () {


function datatabletsConfiguration(tabla, columnDefs) {
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
                    
                    
                    if(array__errorCampoNoCorresponde.length >0){

                        for(let i = 0; i < array__errorCampoNoCorresponde.length; i++){

                            alertify.set("notifier","position","top-center");
                            alertify.notify(array__errorCampoNoCorresponde[i],"error",6,function(){});
                        }

                        $("#contenedorTabla__"+idActividad).html(" ");

                    }else if(array__camposVacios.length >0){

                        for(let i = 0; i < array__camposVacios.length; i++){

                            alertify.set("notifier","position","top-center");
                            alertify.notify(array__camposVacios[i],"error",6,function(){});
                        }

                        $("#contenedorTabla__"+idActividad).html(" ");

                    }else if(array__errorItemRepetido.length >0){

                        for(let i = 0; i < array__errorItemRepetido.length; i++){

                            alertify.set("notifier","position","top-center");
                            alertify.notify(array__errorItemRepetido[i],"error",6,function(){});
                        }

                        $("#contenedorTabla__"+idActividad).html(" ");

                    }else if(array_errorItem.length >0){

                        for(let i = 0; i < array_errorItem.length; i++){
                            alertify.set("notifier","position","top-center");
                            alertify.notify(array_errorItem[i],"error",6,function(){});
                        }

                        $("#contenedorTabla__"+idActividad).html(" ");

                    }else{

                        $("#contenedorTabla__"+idActividad).html(" ");

                        $("#contenedorTabla__"+idActividad).append('<div class="table-responsive"><centre><table id="matriz_Actividad_'+idActividad+'"><thead><tr id="theadTabla"></tr></thead><tbody id="body__'+idActividad+'"></tbody></table></centre></div>');

                        /*=========================================================
                        =            Agregar meses dependiendo el caso            =
                        =========================================================*/
                        
                        
                        if (boleano==true) {
                            bodyArray.push("enero__array","febrero__array","marzo__array","abril__array","mayo__array","junio__array","julio__array","agosto__array","septiembre__array","octubre__array","noviembre__array","diciembre__array","total__array");
                            titulosArray.push("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total");
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
                           
                            var filaData=[];

                            for (var z = 0; z <  arrayFilas[i].length; z++) {

                                filaData.push(arrayFilas[i][z]);

                            }


                            table.row.add(filaData);


                        }

                        table.draw();

                        
                        /*=====  End of Construcción datatablets  ======*/

                    }

                    
                },
                error:function(){

                }

            });

        });
    
    }



    var construccion__modal__excel=function(boton,titulosArray,tipo,documento,boleano,bodyArray,accionesMatriz){

        $(boton).click(function(e){

            let idActividad=$(this).attr("idActividad");

            $("#idTituloModalContratacion").text('Carga de Archivo Excel');

            $("#divcontratcionActividades").html(" ");

            $("#divcontratcionActividades").append("<div class='col col-3'><a class='btn btn-success' id='formatoDescarga__"+idActividad+"' download='formatoMatriz__"+idActividad+"'>Descargar Formato</a></div><div class='col col-3 font-bold'>Subir Archivo</div><input class='col col-3' type='file' id='cargar__archivo__"+idActividad+"' /> <div class='col col-3'><a class='btn btn-primary' id='visualizador__"+idActividad+"' idActividad='"+idActividad+"'>Visualizar</a></div><div class='col col-12' id='contenedorTabla__"+idActividad+"'></div>");

       
            $("#formatoDescarga__"+idActividad).attr("href",documento);


            visualizador__excel($("#visualizador__"+idActividad),titulosArray,tipo,boleano,bodyArray,accionesMatriz);

        });
    
    }

// });