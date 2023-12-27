
var datatabletsDesarollo=function(tabla,tipo){

  
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
        "url":"modelosBd/PAID_DESARROLLO/datatablets.PD.md.php", 
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
      url: "modelosBd/PAID_DESARROLLO/eliminar.md.php",
      data: paqueteDeDatos,
      headers: { "Content-Type": "multipart/form-data" },
    }).then((response) => {
    
      if (response.data.mensaje==true) {
        alertify.set("notifier","position", "top-center");
        alertify.notify("Registro realizado correctamente", "success", 1, function(){});
        table.row(dtRow[0].rowIndex-1).remove().draw( false );

       
        AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")
        
        AsignarMontoMedallasJN("obtener_valores_medallas");
        AsignarMatricesAuxiliaresJN("obtener_valores_matrices_auxiliares");
        AsignarValorTransporte("obtener_valores_transporte");
        AsignarValorSeguro("obtener_valores_seguro");
        AsignarMontoBonoDeportivoJN("obtener_valores_bono_deportivo");

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



    var datatabletsNormalDesarollo=function(tabla,tipo){

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
        "scrollX": true,
      
      
        "ajax":{
      
          "method":"POST",
          "url":"modelosBd/PAID_DESARROLLO/datatablets.PD.md.php", 
          "data": { 
            "tipo": tipo,
            "idcomponentePAID": $("#JuegosNacionalesIDCOMPONENTE").val(),
            "idrubroPAID": $("#JuegosNacionalesIDRUBRO").val()
          }  
      
        },
      
        /*"aoColumnDefs":[
      
          {
            
            "aTargets":contadorCol, 
            "mRender": (function (data, type, row) {
      
              return '<div class="w-full flex justify-center" align="center"><button class="btn btn-success dt-editar"><i class="fas fa-pen"></i></button></div>';
      
             }) 
      
          },
      
          {
            
            "aTargets":(contadorCol), 
            "mRender": (function (data, type, row) {
      
              return '';
      
             }) 
      
          }   
      
        ]*/
      
      });
      
     //=====  End of Establecer datatablets  ======//
      
      funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
      
  }





var datatabletsDesarolloCompleto=function(tabla,tipo){

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
  
  
    "ajax":{
  
      "method":"POST",
      "url":"modelosBd/PAID_DESARROLLO/datatablets.PD.md.php", 
      "data": { 
        "tipo": tipo,
        "idcomponentePAID": $("#JuegosNacionalesIDCOMPONENTE").val(),
        "idrubroPAID": $("#JuegosNacionalesIDRUBRO").val()
      }  
  
    },
  
    "aoColumnDefs":[
  
      {
        
        "aTargets":contadorCol, 
        "mRender": (function (data, type, row) {
  
          return '<div class="w-full flex justify-center" align="center"><button data-bs-toggle="modal" class="btn btn-primary dt-editar"><i class="fas fa-pen"></i></button></div>'
  
         }) 
  
      },
  
      {
        
        "aTargets":(contadorCol+1), 
        "mRender": (function (data, type, row) {
  
          return '<div class="w-full flex justify-center" align="center"><button class="btn btn-warning dt-delete"><i class="fas fa-trash"></i></button></div>';
  
         }) 
  
      }   
  
    ]
  
  });
  
  /=====  End of Establecer datatablets  ======/
  
  funcion__eliminar("#"+tipo+" tbody",table,contadorCol,tipo);
  
  
  }

