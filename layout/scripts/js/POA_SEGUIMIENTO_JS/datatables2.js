
var datatableSeguimientoRegistro=function(tabla,tipo){
  //alert("DATA TABLE2");
    
      /*==================================================
      =            Obtener número de columnas            =
      ==================================================*/
  
      let contadorCol=$('#'+tipo+' > thead > tr > th').length;
      let contadorRestar=contadorCol - 1;
  
      //=====  End of Obtener número de columnas  ======/
      
      /*=================================================================
      =            Construir columnas para editar y eliminar            =
      =================================================================*/
      //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
      $('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Eliminar</center></th>');
      //=====  End of Construir columnas para editar y eliminar  ======/
      
      /*==============================================
      =            Establecer datatablets            =
      ==============================================*/
      
      var table =$(tabla).DataTable({
      
        "language":{
      
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar MENU registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered":   "(filtrado de un total de MAX registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "No existen datos",
          "oPaginate":{
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },
  
       // dom: 'Bfrtip',
        // buttons: [
        //      'excel',
        //       {
        //         extend: 'pdf',
        //         text: 'PDF',
        //         orientation: 'landscape',
        //         customize:function(doc) {
  
        //             doc.defaultStyle.fontSize = 6;
  
        //             doc.styles.title = {
        //                 color: 'black',
        //                 fontSize: '8',
        //                 alignment: 'center',
        //                 margin:'0'                                                
        //             }
  
        //             doc.styles.tableHeader = {
  
        //                 fillColor:'#311b92',
        //                 fontSize: '8',
        //                 color:'white',
        //                 alignment:'center',
                                        
        //             }
  
        //         }
  
        //     }
        // ],
      
        "bLengthChange": false,
        "pagingType": "full_numbers",
        "Paginate": true,
        "pagingType": "full_numbers",
        "retrieve": true, 
        "paging": true, 
        "pageLength":4,
        
      
      
        //  "ajax":{
      
        //    "method":"POST",
        //   "url":"modelosBd/inserta/seleccionaAcciones.md.php", 
        //   "data": { 
        //      "tipo": tipo,
  
           
        //    }  
      
        //  },
      
        "aoColumnDefs":[
          
          /*{
            
            "aTargets":contadorCol, 
            "mRender": (function (data, type, row) {
      
              return '<div class="w-full flex justify-center" align="center"><button class="btn btn-success dt-editar"><i class="fas fa-pen"></i></button></div>';
      
             }) 
      
          },*/
      
          {
            
            "aTargets":(contadorCol), 
            "mRender": (function (data, type, row) {
      
              return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';
      
             }) 
      
          }   
      
        ]
      
      });
      
     //=====  End of Establecer datatablets  ======//
      
      funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
}

var datatableSeguimientoJurisdiccion=function(tabla,tipo){
  //alert("DATA TABLE2");
    
      /*==================================================
      =            Obtener número de columnas            =
      ==================================================*/
  
      let contadorCol=$('#'+tipo+' > thead > tr > th').length;
      let contadorRestar=contadorCol - 1;
  
      //=====  End of Obtener número de columnas  ======/
      
      /*=================================================================
      =            Construir columnas para editar y eliminar            =
      =================================================================*/
      //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
      $('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Eliminar</center></th>');
      //=====  End of Construir columnas para editar y eliminar  ======/
      
      /*==============================================
      =            Establecer datatablets            =
      ==============================================*/
      
      var table =$(tabla).DataTable({
      
        "language":{
      
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar MENU registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered":   "(filtrado de un total de MAX registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "No existen datos",
          "oPaginate":{
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },
  
       // dom: 'Bfrtip',
        // buttons: [
        //      'excel',
        //       {
        //         extend: 'pdf',
        //         text: 'PDF',
        //         orientation: 'landscape',
        //         customize:function(doc) {
  
        //             doc.defaultStyle.fontSize = 6;
  
        //             doc.styles.title = {
        //                 color: 'black',
        //                 fontSize: '8',
        //                 alignment: 'center',
        //                 margin:'0'                                                
        //             }
  
        //             doc.styles.tableHeader = {
  
        //                 fillColor:'#311b92',
        //                 fontSize: '8',
        //                 color:'white',
        //                 alignment:'center',
                                        
        //             }
  
        //         }
  
        //     }
        // ],
      
        "bLengthChange": false,
        "pagingType": "full_numbers",
        "Paginate": true,
        "pagingType": "full_numbers",
        "retrieve": true, 
        "paging": true, 
        "pageLength":4,
        
      
      
         "ajax":{
      
          type:"POST",
				url:"modelosBd/POA_SEGUIMIENTO/selector.md.php",
				contentType: false,
				data:paqueteDeDatos,
				processData: false,
				cache: false, 
				success:function(response){
  
             $.getScript("layout/scripts/js/seguimiento/seguimientoGlobal.js",function(){

              var elementos=JSON.parse(response);
  
              var indicadorInformacion=elementos['indicadorInformacion'];
  
              for (z of indicadorInformacion) {
  
                let trimestresV="";
  
                if($("#trimestreEvaluador").val()=="primerTrimestre"){
                  trimestresV=z.primertrimestre;
                }else if($("#trimestreEvaluador").val()=="segundoTrimestre"){
                  trimestresV=z.segundotrimestre;
                }else if($("#trimestreEvaluador").val()=="tercerTrimestre"){
                  trimestresV=z.tercertrimestre;
                }else if($("#trimestreEvaluador").val()=="cuartoTrimestre"){
                  trimestresV=z.cuartotrimestre;
                }
          
                  //$(parametro1).append('<tr class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.idActividades+'</center></td><td>'+z.nombreActividades+'</td><td>'+z.indicador+'</td><td><center><input type="checkbox" id="idActi'+z.idActividades+'" name="idActi'+z.idActividades+'" class="checkeds__dinamicos__indicadores"/></center></td></tr>');
                  //checkeds__recorridos($(".checkeds__dinamicos__indicadores"),$("#idActi"+z.idActividades),$("#contadorIndicador"),$(".oculto__trimestrales"),$(".contenedor__trimestres"),[z.idActividades,z.nombreActividades,z.indicador,trimestresV,z.metaindicador],parametro2,$("#trimestreEvaluador").val());
                  
                   $(parametro1).append('<tr id="filaIndicadora"class="filaIndicadora'+z.idActividades+'"><td style="font-weight:bold;"><center>'+z.idActividades+'</center></td><td>'+z.nombreActividades+'</td><td>'+z.indicador+'</td><td><input type="text" id="totalProgramado'+z.idActividades+'" name="totalProgramado'+z.idActividades+'" value="'+trimestresV+'" class="solo__numeros ancho__total__input text-center obligatorios" style="border:none;" disabled="disabled" /></td><td class="celdas'+z.idActividades+'"><input type="text" id="totalEjecutado'+z.idActividades+'" name="totalEjecutado'+z.idActividades+'" value="'+trimestresV+'" class="solo__numeros ancho__total__input text-center obligatorios" /><div class="rotulo'+z.idActividades+'" style="text-align:center; widht:100%;"></div></td><td><input type="file" accept="application/pdf" id="documentoSustento'+z.idActividades+'" name="documentoSustento'+z.idActividades+'" class="ancho__total__input obligatorios'+z.idActividades+'" /></td><td><a id="guardar'+z.idActividades+'" parametro7="'+parametro2+'" parametro8="'+$("#trimestreEvaluador").val()+'" name="guardar'+z.idActividades+'" idContador="'+z.idActividades+'" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td></tr>');								 
          
  
                   funcion__cambio__de__numero($("#totalEjecutado"+z.idActividades));
                   funcion__solo__numero($(".solo__numeros"));							 
                   //funcion_porcentajes__colores($("#totalEjecutado"+z.idActividades),$("#totalProgramado"+z.idActividades).val(),$(".celdas"+z.idActividades),$(".rotulo"+z.idActividades),z.metaindicador);
                  
                   $("#guardar"+z.idActividades).click(function(e) {
  
                    let idContador=$(this).attr('idContador');
                    let parametro7=$(this).attr('parametro7');
                    let parametro8=$(this).attr('parametro8');
  
                    console.log(idContador,parametro7,parametro8)
                    
                    funcion__guardado__general2023($("#guardar"+idContador),$(".obligatorios"+idContador),[$("#totalProgramado"+idContador).val(),$("#totalEjecutado"+idContador).val(),parametro7,idContador,parametro8],$("#documentoSustento"+idContador),"seguimiento__indicadores2023",$(".filaIndicadora"+idContador),$(".oculto__trimestrales"));
  
                  }); 
                // }
             
  
              }
  
  
            });		
  
           
           }  
      
         },
      
        "aoColumnDefs":[
          
          /*{
            
            "aTargets":contadorCol, 
            "mRender": (function (data, type, row) {
      
              return '<div class="w-full flex justify-center" align="center"><button class="btn btn-success dt-editar"><i class="fas fa-pen"></i></button></div>';
      
             }) 
      
          },*/
      
          {
            
            "aTargets":(contadorCol), 
            "mRender": (function (data, type, row) {
      
              return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';
      
             }) 
      
          }   
      
        ]
      
      });
      
     //=====  End of Establecer datatablets  ======//
      
      funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
}
      
  
      
      /*======================================
      =            Eliminar datos            =
      ======================================*/
      var funcion__eliminar=function(tbody,table,contadorCol,tipo){
  
      
  
      $(tbody).on("click","button.dt-delete",function(e){
  
        
  
      e.preventDefault();
      
      let data=table.row($(this).parents("tr")).data();
   
  
      $this = $(this);
      let dtRow = $this.parents('tr');
      
      alertify.confirm('Eliminar', '¿Está seguro de eliminar?', function(){ 
      
      let paqueteDeDatos = new FormData();
      paqueteDeDatos.append("tipo",tipo);
      paqueteDeDatos.append("id",data[contadorCol]);
  
      console.log(data[contadorCol])
      
      axios({
        method: "post",
        url: "modelosBd/POA_SEGUIMIENTO_JS/selector.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
      }).then((response) => {
      
        if (response.data.mensaje==true) {
          alertify.set("notifier","position", "top-center");
          alertify.notify("Registro realizado correctamente", "success", 1, function(){});
          table.row(dtRow[0].rowIndex-1).remove().draw( false );
  
        }
      
      }).catch(( error ) => {
        alertify.set("notifier","position", "top-center");
        alertify.notify("No se puede realizar la acción", "error", 2, function(){});
      });
      
      },
  
      function(){ 
        alertify.set("notifier","position", "top-center");
        alertify.notify("Acción cancelada", "error", 2, function(){});
      });
      
      });
      
      }
      
      //=====  End of Eliminar datos  ======//
  
  
      var datatabletsSeguimientoVacio=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos){

      
        /*==================================================
        =            Obtener número de columnas            =
        ==================================================*/
    
        let contadorCol=$('#'+tipo+' > thead > tr > th').length;
        let contadorRestar=contadorCol - 1;
    
        //=====  End of Obtener número de columnas  ======/
        
        /*=================================================================
        =            Construir columnas para editar y eliminar            =
        =================================================================*/
        //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
        //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Eliminar</center></th>');
        //=====  End of Construir columnas para editar y eliminar  ======/
        
        /*==============================================
        =            Establecer datatablets            =
        ==============================================*/
        
        var table =$(tabla).DataTable({
        
          "language":{
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar MENU registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de MAX registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "No existen datos",
            "oPaginate":{
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
    
          dom: 'Bfrtip',
          buttons: [
            {
              
              extend: 'excel',
              className: 'btn-excel',
              title:nombreDocumento,
              text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
          },
        
          {
            extend: 'pdf',
            title:nombreDocumento,
            text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
          
            orientation: 'landscape',
            customize:function(doc) {
    
                doc.defaultStyle.fontSize = 6;
    
                doc.styles.title = {
                    color: 'black',
                    fontSize: '6',
                    alignment: 'center',
                    margin:'0'                                                
                }
                doc.styles.tableHeader = {
    
                  fillColor:'#311b92',
                  fontSize: '6',
                  color:'white',
                  alignment:'center',
                                  
              }
              
    
              }
    
            }
        ],
        
          "bLengthChange": false,
          "pagingType": "full_numbers",
          "Paginate": true,
          "pagingType": "full_numbers",
          "retrieve": true, 
          "paging": true, 
          "pageLength":10,
  
          fixedHeader: true,
  
          "initComplete": function (settings, json) {  
            $(tabla).wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
          },
        
        
          "ajax":{
        
            "method":"POST",
          "url":"modelosBd/POA_SEGUIMIENTO/datatablets.PD.md.php", 
          "data": { 
            "tipo": tipo,
            "datos": datos
            
          }  
        
          },
        
      
            "aoColumnDefs":enlaceDocumento
          
        
        });
  
        
        
        
       //=====  End of Establecer datatablets  ======//
        
        funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
  
        funcion__reasignar__seguimientos__recorridos__anexos__reportes("#"+tipo+" tbody",table);
        
    }
  
  
  
  
  
    var datatabletsSeguimientoCompleto=function(tabla,tipo){
  
      /*==================================================
      =            Obtener número de columnas            =
      ==================================================*/
      let contadorCol=$('#'+tipo+' > thead > tr > th').length;
      let contadorRestar=contadorCol - 1;
      /=====  End of Obtener número de columnas  ======/
      
      /*=================================================================
      =            Construir columnas para editar y eliminar            =
      =================================================================*/
      $('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
      $('#'+tipo).find('th').eq(contadorCol).after('<th COLSPAN=1><center>Eliminar</center></th>');
      /=====  End of Construir columnas para editar y eliminar  ======/
      
      /*==============================================
      =            Establecer datatablets            =
      ==============================================*/
      
      var table =$(tabla).DataTable({
      
        "language":{
      
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar MENU registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered":   "(filtrado de un total de MAX registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "No existen datos",
          "oPaginate":{
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },
        dom: 'Bfrtip',
        buttons: [
                    {
                      
                      extend: 'excel',
                      className: 'btn-excel',
                      text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
         
                  
                      
    
                  },
                
                  {
                    extend: 'pdf',
                    text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
                   
                    orientation: 'landscape',
                    customize:function(doc) {
      
                        doc.defaultStyle.fontSize = 6;
      
                        doc.styles.title = {
                            color: 'black',
                            fontSize: '6',
                            alignment: 'center',
                            margin:'0'                                                
                        }
                        doc.styles.tableHeader = {
    
                          fillColor:'#311b92',
                          fontSize: '6',
                          color:'white',
                          alignment:'center',
                                          
                      }
                      
      
                      }
      
                    }
        ],
      
        "bLengthChange": false,
        "pagingType": "full_numbers",
        "Paginate": true,
        "pagingType": "full_numbers",
        "retrieve": true, 
        "paging": true, 
        "pageLength":4,
        "initComplete": function (settings, json) {  
          $(tabla).wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
      
      
        "ajax":{
      
          "method":"POST",
          "url":"modelosBd/POA_SEGUIMIENTO/datatablets.PD.md.php", 
          "data": { 
            "tipo": tipo,
          
          }  
      
        },
      
        "aoColumnDefs":[
      
          {
            
            "aTargets":contadorCol, 
            "mRender": (function (data, type, row) {
      
              return '<div class="w-full flex justify-center" align="center"><button data-bs-toggle="modal" class="btn btn-primary dt-editar"><i class="fas fa-pen"></i></button></div>'
      
             }) 
      
           },
      
          // {
            
          //   "aTargets":(contadorCol+1), 
          //   "mRender": (function (data, type, row) {
      
          //     return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';
      
          //    }) 
      
          // }   
      
        ]
      
      });
      
      /=====  End of Establecer datatablets  ======/
      
      funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
      
      
      }
  
  //*********************************************************************************//

  //     var datatablesSeguimientoZonales=function(tabla,tipo){

  //       /*==================================================
  //       =            Obtener número de columnas            =
  //       ==================================================*/
  //       let contadorCol=$('#'+tipo+' > thead > tr > th').length;
  //       let contadorRestar=contadorCol - 1;
  //       /=====  End of Obtener número de columnas  ======/
        
  //       /*=================================================================
  //       =            Construir columnas para editar y eliminar            =
  //       =================================================================*/
  //       $('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
  //       $('#'+tipo).find('th').eq(contadorCol).after('<th COLSPAN=1><center>Eliminar</center></th>');
  //       /=====  End of Construir columnas para editar y eliminar  ======/
        
  //       /*==============================================
  //       =            Establecer datatablets            =
  //       ==============================================*/
        
  //       var table =$(tabla).DataTable({
        
  //         "language":{
        
  //           "sProcessing":     "Procesando...",
  //           "sLengthMenu":     "Mostrar MENU registros",
  //           "sZeroRecords":    "No se encontraron resultados",
  //           "sEmptyTable":     "Ningún dato disponible en esta tabla",
  //           "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
  //           "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
  //           "sInfoFiltered":   "(filtrado de un total de MAX registros)",
  //           "sInfoPostFix":    "",
  //           "sSearch":         "Buscar:",
  //           "sUrl":            "",
  //           "sInfoThousands":  ",",
  //           "sLoadingRecords": "No existen datos",
  //           "oPaginate":{
  //             "sFirst":    "Primero",
  //             "sLast":     "Último",
  //             "sNext":     "Siguiente",
  //             "sPrevious": "Anterior"
  //           },
  //           "oAria": {
  //             "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
  //             "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  //           }
  //         },
  //         dom: 'Bfrtip',
  //         buttons: [
  //                     {
                        
  //                       extend: 'excel',
  //                       className: 'btn-excel',
  //                       text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',
           
                    
                        
      
  //                   },
                  
  //                   {
  //                     extend: 'pdf',
  //                     text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
                     
  //                     orientation: 'landscape',
  //                     customize:function(doc) {
        
  //                         doc.defaultStyle.fontSize = 6;
        
  //                         doc.styles.title = {
  //                             color: 'black',
  //                             fontSize: '6',
  //                             alignment: 'center',
  //                             margin:'0'                                                
  //                         }
  //                         doc.styles.tableHeader = {
      
  //                           fillColor:'#311b92',
  //                           fontSize: '6',
  //                           color:'white',
  //                           alignment:'center',
                                            
  //                       }
                        
        
  //                       }
        
  //                     }
  //         ],
        
  //         "bLengthChange": false,
  //         "pagingType": "full_numbers",
  //         "Paginate": true,
  //         "pagingType": "full_numbers",
  //         "retrieve": true, 
  //         "paging": true, 
  //         "pageLength":20,
        
        
  //         "ajax":{
        
  //           "method":"POST",
  //           "url":"modelosBd/POA_SEGUIMIENTO/datatablets.PD.md.php", 
  //           "data": { 
  //             "tipo": tipo,
             
  //           }  
        
  //         },
        
  //         "aoColumnDefs":[


  // // {
              
  //           //   "aTargets":(contadorCol+1), 
  //           //   "mRender": (function (data, type, row) {
        
  //           //     return '<nav id="colorNav" style="position: relative; top: -5em!important;"><tr><td><div class="col-md-12"><select class="form-select" id="idSelectJurisdiccion" aria-label="Default select example"><option value="0">Selecciona una opción</option><option value="9">Planta Central</option><option value="1">Zonal1</option><option value="2">Zonal2</option><option value="3">Zonal3</option><option value="4">Zonal4</option><option value="6">Zonal6</option><option value="7">Zonal7</option><option value="8">Zonal8</option></select></div></td><td><a id=""   name="" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></td></tr></nav>';
        
  //           //    }) 
        
  //           // } 



        
  //           // {
              
  //           //   "aTargets":contadorCol, 
  //           //   "mRender": (function (data, type, row) {
        
  //           //     return '<div class="w-full flex justify-center" align="center"><button data-bs-toggle="modal" class="btn btn-primary dt-editar"><i class="fas fa-pen"></i></button></div>'
        
  //           //    }) 
        
  //           // },
        
            
        
  //         ]
        
  //       });
        
  //       /=====  End of Establecer datatablets  ======/
        
  //       funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
        
        
  //       }

//********************************************************************************************//

var datatablesSeguimientoZonales = function (tabla, tipo) {

  // alert("Datatables");
  /*==================================================
  =            Obtener número de columnas            =
  ==================================================*/
  let contadorCol = $('#' + tipo + ' > thead > tr > th').length;
  let contadorRestar = contadorCol - 1;
//alert($('#' + tipo + ' > thead > tr > th')[6])

  //=====  End of Obtener número de columnas  ======//

  /*=================================================================
  =            Construir columnas para editar y eliminar            =
  =================================================================*/
  $('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>JURISDICCIÓN</center></th>');
  $('#'+tipo).find('th').eq(contadorCol).after('<th COLSPAN=1><center>ACCION</center></th>');
  //=====  End of Construir columnas para editar y eliminar  ======//

  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/

  var table = $(tabla).DataTable({

    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar MENU registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del START al END de un total de TOTAL",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de MAX registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
    buttons: [
        {
          
          extend: 'excel',
          className: 'btn-excel',
          text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',

      
          

      },
    
      {
        extend: 'pdf',
        text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
      
        orientation: 'landscape',
        customize:function(doc) {

            doc.defaultStyle.fontSize = 6;

            doc.styles.title = {
                color: 'black',
                fontSize: '6',
                alignment: 'center',
                margin:'0'                                                
            }
            doc.styles.tableHeader = {

              fillColor:'#311b92',
              fontSize: '6',
              color:'white',
              alignment:'center',
                              
          }
          

          }

        }
    ],

    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true,
    "paging": true,
    "pageLength": 50,
    "scrollX": true,


    "ajax": {

      "method":"POST",
      "url":"modelosBd/POA_SEGUIMIENTO/datatablets.PD.md.php", 
      "data": { 
      "tipo": tipo,
      }

    },

    "aoColumnDefs": [


      

      {

        "aTargets": (contadorCol),
        "mRender": (function (data, type, row) {

          return '<div class="col-md-12"><select class="form-select idSelectJurisdiccion" id="idSelectJurisdiccion" aria-label="Default select example"><option value="0">Selecciona una opción</option><option value="PLANTA CENTRAL">PLANTA CENTRAL</option><option value="ZONAL 1">ZONAL 1</option><option value="ZONAL 2">ZONAL 2</option><option value="ZONAL 3">ZONAL 3</option><option value="ZONAL 4">ZONAL 4</option><option value="ZONAL 6">ZONAL 6</option><option value="ZONAL 7">ZONAL 7</option><option value="ZONAL 8">ZONAL 8</option></select></div>';

        })

      },

      {
        //"aTargets": (contadorCol),
        "aTargets":(contadorCol+1), 
        "mRender": (function (data, type, row) {
  
           return '<div class="w-full flex justify-center" align="center"><button class="btn btn-primary guardar_datos"><i class="fa fa-floppy-o"></i></button></div>';

          //return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';

  
         }) 
  
      }  

    ]

  });

  //=====  End of Establecer datatablets  ======//

     funcion__actualizar_jurisdiccion("#"+tipo+" tbody", table, contadorCol, tipo);
  // funcion__actualizar_jurisdiccion($(".guardar_datos"),$("#idSelectJurisdiccion"));
  
  //funcion__eliminar("#" + tipo + " tbody", table, contadorCol, tipo);
  

  
}

/*======================================
=            Eliminar datos            =
======================================*/
var funcion__actualizar_jurisdiccion = function (tbody, table, contadorCol, tipo) {

  $(tbody).on("click", "button.guardar_datos", function (e) {
    
    e.preventDefault();
var row = $(this).closest('tr');
  var selectedValue = row.find('.idSelectJurisdiccion').val();
  console.log(selectedValue)

   
  let data=table.row($(this).parents("tr")).data();
 

  $this = $(this);
  let dtRow = $this.parents('tr');
    
    alertify.confirm('¿Está seguro de ACTUALIZAR?', '¿Está seguro de actualizar jurisdicción?', function () {      
 
     
      let paqueteDeDatos = new FormData();
      paqueteDeDatos.append("tipo", "actualizar_zona_jurisdiccion");
      paqueteDeDatos.append("id", data[contadorCol]);
      paqueteDeDatos.append("nombreZonal", selectedValue);

      axios({
        method: "post",
        url: "modelosBd/POA_SEGUIMIENTO/actualizacion.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
      }).then((response) => {

        if (response.data.mensaje == true) {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Registro realizado correctamente", "success", 5, function () { });
          table.ajax.reload();
          
          

        }

      }).catch((error) => {
        alertify.set("notifier", "position", "top-center");
        alertify.notify("No se puede realizar la acción", "error", 5, function () { });
      });

    },
      function () {
        alertify.set("notifier", "position", "top-center");
        alertify.notify("Acción cancelada", "error", 5, function () { });
      });

  });

}

//=====  End of Eliminar datos  ======//

// var funcion__actualizar_jurisdiccion=function(parametro1,parametro2){

//   $(parametro1).click(function(e){
//     alert("SIGO AQUI")

//       var confirm= alertify.confirm('¿Está seguro de guardar los información ingresada?','¿Está seguro de guardar los información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});  

//       confirm.set({transition:'slide'});  

//       confirm.set('onok', function(){ 
      

//         var paqueteDeDatos = new FormData();

        
//         paqueteDeDatos.append("tipo","consulta_datos_exite_pdf_contratacion__publicaa");

//         let idOrganismo=$("#organismoIdPrin").val();				
//         let trimestre=$("#trimestreEvaluador").val();
        
//         paqueteDeDatos.append("declaracion_cp",$(parametro3)[0].files[0]);					
//         paqueteDeDatos.append("trimestre",trimestre);
//         paqueteDeDatos.append("idOrganismo",idOrganismo);

//         $.ajax({

//           type:"POST",
//           url:"modelosBd/inserta/seleccionaAcciones.md.php",
//           contentType: false,
//           data:paqueteDeDatos,
//           processData: false,
//           cache: false, 
//           success:function(response){
//          var elementos=JSON.parse(response);	
//          console.log("RESPONSE33333");
//          console.log(response);

//           if(response.length > 0){
//             paqueteDeDatos.append("tipo","eliminar_declaracion_publica");
            
//             $.ajax({
//               type:"POST",
//               url:"modelosBd/inserta/seleccionaAcciones.md.php",
//               contentType: false,
//               data:paqueteDeDatos,
//               processData: false,
//               cache: false, 
//               success:function(response){							
                
//                 paqueteDeDatos.append("tipo","guardar_contratacion__publica");
//                 $.ajax({
//                   type:"POST",
//                   url:"modelosBd/inserta/insertaAcciones.md.php",
//                   contentType: false,
//                   data:paqueteDeDatos,
//                   processData: false,
//                   cache: false, 
//                   success:function(response){
                    
//                     var elementos=JSON.parse(response);							
                    
//                     var mensaje=elementos['mensaje'];
                    
//                     if(mensaje==1){
      
//                       alertify.set("notifier","position", "top-center");
//                       alertify.notify("Registro realizado correctamente", "success", 5, function(){});
      
//                       $(parametro1).show();	
//                     }
                    
//                   },
//                   error:function(){
//                   }
                  
//                 });
//               },
//               error:function(){
//               }
              
//             });
//           }else{
            
//               paqueteDeDatos.append("tipo","guardar_contratacion__publica");
//               $.ajax({

//                 type:"POST",
//                 url:"modelosBd/inserta/insertaAcciones.md.php",
//                 contentType: false,
//                 data:paqueteDeDatos,
//                 processData: false,
//                 cache: false, 
//                 success:function(response){
                
//                   var elementos=JSON.parse(response);				
//                   var mensaje=elementos['mensaje'];
                  
//                   if(mensaje==1){

//                     alertify.set("notifier","position", "top-center");
//                     alertify.notify("Registro realizado correctamente", "success", 5, function(){});

//                     $(parametro1).show();	
//                   }
                  
//                 },
//                 error:function(){
//                 }
                
//               });	

//           };
                      
//         },
//         error:function(){
//         }
          
//         });		

//       });  

//         confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
//         alertify.set("notifier","position", "top-center");
//         alertify.notify("Acción cancelada", "error", 1, function(){

//           $(parametro1).show();

//         }); 
//       }); 


    

//   });

// }
//=====  End of Editar datos  ======//


/*======================================
=            Eliminar datos            =
======================================*/
var funcion__eliminar = function (tbody, table, contadorCol, tipo) {

  $(tbody).on("click", "button.dt-delete", function (e) {

    e.preventDefault();

    let data = table.row($(this).parents("tr")).data();
    $this = $(this);
    let dtRow = $this.parents('tr');

    alertify.confirm('¿Está seguro de eliminar?', '', function () {

      let paqueteDeDatos = new FormData();
      paqueteDeDatos.append("tipo", tipo);
      paqueteDeDatos.append("id", data[contadorCol]);
      paqueteDeDatos.append("nombreZonal", nombreZonal);

      axios({
        method: "post",
        url: "modelosBd/POA_SEGUIMIENTO/actualizacion.md.php",
        data: paqueteDeDatos,
        headers: { "Content-Type": "multipart/form-data" },
      }).then((response) => {

        if (response.data.mensaje == true) {
          alertify.set("notifier", "position", "top-center");
          alertify.notify("Registro realizado correctamente", "success", 5, function () { });
          table.row(dtRow[0].rowIndex - 1).remove().draw(false);
          
        }

      }).catch((error) => {
        alertify.set("notifier", "position", "top-center");
        alertify.notify("No se puede realizar la acción", "error", 5, function () { });
      });

    },
      function () {
        alertify.set("notifier", "position", "top-center");
        alertify.notify("Acción cancelada", "error", 5, function () { });
      });

  });

}

//=====


var datatabletsDesarollo2=function(tabla,tipo){

  
  /*==================================================
  =            Obtener número de columnas            =
  ==================================================*/

  let contadorCol=$('#'+tipo+' > thead > tr > th').length;
  let contadorRestar=contadorCol - 1;

  //=====  End of Obtener número de columnas  ======/
  
  /*=================================================================
  =            Construir columnas para editar y eliminar            =
  =================================================================*/
  //$('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Editar</center></th>');
  $('#'+tipo).find('th').eq(contadorRestar).after('<th COLSPAN=1><center>Eliminar</center></th>');
  //=====  End of Construir columnas para editar y eliminar  ======/
  
  /*==============================================
  =            Establecer datatablets            =
  ==============================================*/
  
  var table =$(tabla).DataTable({
  
    "language":{
  
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar MENU registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del START al END de un total de TOTAL",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de MAX registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "No existen datos",
      "oPaginate":{
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    dom: 'Bfrtip',
    buttons: [
      {
        
        extend: 'excel',
        className: 'btn-excel',
        text: '<button  class="buttonD" ><i class="fas fa-file-excel" style="color: #277c41; font-size: 36px;" ></i></button>',

    
        

    },
  
    {
      extend: 'pdf',
      text: '<button  class="buttonD" ><i class="fas fa-file-pdf " style="color: #BF0D0D; font-size: 36px;"></i></button>',
     
      orientation: 'landscape',
      customize:function(doc) {

          doc.defaultStyle.fontSize = 6;

          doc.styles.title = {
              color: 'black',
              fontSize: '6',
              alignment: 'center',
              margin:'0'                                                
          }
          doc.styles.tableHeader = {

            fillColor:'#311b92',
            fontSize: '6',
            color:'white',
            alignment:'center',
                            
        }
        

        }

      }
  ],
  
    "bLengthChange": false,
    "pagingType": "full_numbers",
    "Paginate": true,
    "pagingType": "full_numbers",
    "retrieve": true, 
    "paging": true, 
    "pageLength":4,
    

  
    "ajax":{
  
      "method":"POST",
      "url":"modelosBd/POA_SEGUIMIENTO/datatablets.PD.md.php", 
      "data": { 
        "tipo": tipo,

        "idcomponentePAID": $("#JuegosNacionalesIDCOMPONENTE").val(),
        "idrubroPAID": $("#JuegosNacionalesIDRUBRO").val()
      }  
  
    },
  
    "aoColumnDefs":[
      
      /*{
        
        "aTargets":contadorCol, 
        "mRender": (function (data, type, row) {
  
          return '<div class="w-full flex justify-center" align="center"><button class="btn btn-success dt-editar"><i class="fas fa-pen"></i></button></div>';
  
         }) 
  
      },*/
  
      {
        
        "aTargets":(contadorCol), 
        "mRender": (function (data, type, row) {
  
          return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';
  
         }) 
  
      }   
  
    ]
  
  });
  
 //=====  End of Establecer datatablets  ======//
  
  funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
}
  

  
  /*======================================
  =            Eliminar datos            =
  ======================================*/
  var funcion__eliminar=function(tbody,table,contadorCol,tipo){



  $(tbody).on("click","button.dt-delete",function(e){

    alert("hhhhh")

  e.preventDefault();
  
  let data=table.row($(this).parents("tr")).data();


  $this = $(this);
  let dtRow = $this.parents('tr');
  
  alertify.confirm('Eliminar', '¿Está seguro de eliminar?', function(){ 
  
  let paqueteDeDatos = new FormData();
  paqueteDeDatos.append("tipo",tipo);
  paqueteDeDatos.append("id",data[contadorCol]);

  console.log(data[contadorCol])
  
  axios({
    method: "post",
    url: "modelosBd/POA_SEGUIMIENTO/actualizacion.md.php",
    data: paqueteDeDatos,
    headers: { "Content-Type": "multipart/form-data" },
  }).then((response) => {
  
    if (response.data.mensaje==true) {
      alertify.set("notifier","position", "top-center");
      alertify.notify("Registro realizado correctamente", "success", 1, function(){});
      table.row(dtRow[0].rowIndex-1).remove().draw( false );

     

    }
  
  }).catch(( error ) => {
    alertify.set("notifier","position", "top-center");
    alertify.notify("No se puede realizar la acción", "error", 2, function(){});
  });
  
  },

  function(){ 
    alertify.set("notifier","position", "top-center");
    alertify.notify("Acción cancelada", "error", 2, function(){});
  });
  
  });
  
  }
  
  //=====  End of Eliminar datos  ======//

