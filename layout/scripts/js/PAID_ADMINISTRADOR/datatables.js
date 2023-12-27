var datatabletsSeguimientoPaidAdminstradorVacio=function(tabla,tipo,nombreDocumento,enlaceDocumento,datos,reasignacion){


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
      "url":"modelosBd/PAID_ADMINISTRADOR/datatablets.PD.md.php", 
      
      "data": { 
        "tipo": tipo,
        "datos": datos
        
      }
    
      },
    
  
        "aoColumnDefs":enlaceDocumento
      
    
        
    });




    

    
}
